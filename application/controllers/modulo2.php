<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/*MODULO DE MERCADOS*/
class Modulo2 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata("10g!n") != "s3esmun1pun0") {
            $this->load->view("session_expire");
        }
        $this->load->model("mgeneral");
    }
    public function get_letras($cantidad)
    {
        $this->load->library('Letras');
        $V = new Letras();
        return $V->ValorEnLetras($cantidad, "");
    }
    /**************************************************************************************************************/
    public function pagoalqui()
    {
        $this->load->view("modulo2/vpagoalqui");
    }
    public function get_comer()
    {
        $data = array(
            "result" => $this->mgeneral->get_comerciantes($_POST["dato"]),
        );
        $this->load->view("modulo2/vpagoalqui_res_bus", $data);
    }
    public function get_cuentas()
    {
        $comer = $this->mgeneral->get_data("mer_comerciantes", array("com_ide" => $_POST["comer"]));
        $tp = $_POST["tipo_pago"];
        $mercado = $_POST["mercado"];
        $idfi = $_POST["idfi"];
        $dni = $_POST["dni"];
        $this->mgeneral->actualizar("mer_comerciantes", array("com_ide" => $idfi), array("com_dni" => $dni));

        if ($tp == "ANUAL") {
            $ult_pago = $this->mgeneral->get_ultimo_pago_anual($_POST["comer"]);
            $anio_mes_actual = $this->mgeneral->get_anio_mes_actual();
            $cpag = $this->mgeneral->get_data("mer_alquileres", array("com_ide" => $_POST["comer"]), false, "alq_anio desc");
            $datos = array(
                "ult_pago" => $ult_pago,
                "anio_actual" => $anio_mes_actual[0]->anio,
                "cpag" => $cpag,
                "idfi" => $idfi,
                "comer" => $comer,
                "mercado" => $mercado,
            );
            $this->load->view("modulo2/vpagoalqui_resume_cuentas_anual", $datos);
        }
        if ($tp == "MENSUAL") {
            $ult_pago = $this->mgeneral->get_ultimo_pago_mensual($_POST["comer"]);
            $anio_mes_actual = $this->mgeneral->get_anio_mes_actual();
            $cpag = $this->mgeneral->get_data("mer_recaudacion", array("com_ide" => $_POST["comer"]), false, "rec_anio desc,rec_mes asc");
            $datos = array(
                "ult_pago" => $ult_pago,
                "anio_actual" => $anio_mes_actual[0]->anio,
                "mes_actual" => $anio_mes_actual[0]->mes,
                "cpag" => $cpag,
                "idfi" => $idfi,
                "comer" => $comer,
                "mercado" => $mercado,
            );
            $this->load->view("modulo2/vpagoalqui_resume_cuentas_mensual", $datos);
        }
    }
    public function guardar_orden_anual()
    {
        $data = array(
            "usu_ide" => $this->session->userdata('usu_ide'),
            "com_ide" => $_POST["idfi"],
            "ord_detalle" => $_POST["deta"],
            "ord_tipo_pago" => $_POST["tipo"],
        );
        $this->mgeneral->insertar("mer_orden_pago", $data);
        $ide = $this->mgeneral->ultimo_id();
        echo $ide[0]->id;
    }
    public function get_mes($txt)
    {
        $t = explode("-", $txt);
        $m = array(
            "1" => "Enero",
            "2" => "Febrero",
            "3" => "Marzo",
            "4" => "Abril",
            "5" => "Mayo",
            "6" => "Junio",
            "7" => "Julio",
            "8" => "Agosto",
            "9" => "Setiembre",
            "10" => "Octubre",
            "11" => "Noviembre",
            "12" => "Diciembre",
        );
        return $m[$t[1]] . " " . $t[0];
    }
    public function pdf_bol_pago_anual($ord_ide, $tipo)
    {
        if ($tipo == "ANUAL") {
            $bol = $this->mgeneral->get_boleta_anual($ord_ide);
        }

        if ($tipo == "MENSUAL") {
            $bol = $this->mgeneral->get_boleta_mensual($ord_ide);
        }

        $bol = $bol[0];

        $fechaact = $this->mgeneral->get_fecha();
        $fechaact = $fechaact[0]->fecha;
        $fechaact = explode(" ", $fechaact);
        $fechaact = $fechaact[0];

        $alto = 6;
        $borde = 0;
        $this->load->library('Pdf');
        $pdf = new pdf('P', 'mm', 'A4', true, 'UTF-8', false);

        $pdf->SetMargins(5, 10, 5, 5);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->AddPage('P');
        $pdf->SetFont('helvetica', '', 8, '', true);

        $tmp = explode(";", $bol->ord_detalle);
        $monto = 0;
        $detalle = "";
        for ($i = 0; $i < count($tmp) - 1; $i++) {
            $tmp2 = explode(":", $tmp[$i]);
            $monto = $monto + $tmp2[1];
            $detalle = $detalle . $tmp2[0] . ", ";
        }

        if ($tipo == "MENSUAL") {
            $tmp2 = explode(":", $tmp[0]);
            $del = $tmp2[0];
            $tmp2 = explode(":", $tmp[count($tmp) - 2]);
            $al = $tmp2[0];
            $del = $this->get_mes($del);
            $al = $this->get_mes($al);
            $detalle = "DE $del A $al";
        }

        $pdf->MultiCell(30, $alto, $fechaact, $borde = 0, 'L', 0, 0, 160, 40);
        $pdf->MultiCell(150, $alto, $bol->com_datos, $borde = 0, 'L', 0, 0, 42, 55);
        $pdf->MultiCell(80, $alto, "ALQUILER DEL PUESTO " . $bol->com_nro_puesto, $borde = 0, 'L', 0, 0, 40, 90);
        $pdf->MultiCell(80, $alto, "VENTA DE " . $bol->com_negocio, $borde = 0, 'L', 0, 0, 40, 95);
        $pdf->MultiCell(80, $alto, "MERCADO " . $bol->mer_nombre, $borde = 0, 'L', 0, 0, 40, 100);
        $pdf->MultiCell(80, $alto, "PAGO DEL PERIODO " . $detalle, $borde = 0, 'L', 0, 0, 40, 105);
        $pdf->MultiCell(25, $alto, $monto, $borde = 0, 'L', 0, 0, 170, 90);
        $letras = $this->get_letras($monto);
        $pdf->MultiCell(150, $alto, $letras, $borde = 0, 'L', 0, 0, 30, 120);

        $pdf->SetFont('helvetica', 'B', 10, '', true);
        $pdf->MultiCell(25, $alto, "CPN." . $bol->ord_ide, $borde = 0, 'L', 0, 0, 160, 20);

        $nombre_archivo = utf8_decode("BOLETA " . $bol->ord_ide);
        $pdf->Output($nombre_archivo, 'I');
    }
    /**************************************************************************************************************/
    public function regbolpag_anual()
    {
        $data = array(
            "completar" => $this->load->view("modulo2/vregpag_completar", array(), true),
        );
        $this->load->view("modulo2/vregbolpag_anual", $data);
    }
    public function get_datos_bpanual()
    {
        $bol = $this->mgeneral->get_boleta_anual($_POST["cpn"]);
        if ($bol == false) {
            $bol = false;
        } else {
            $bol = $bol[0];
        }

        $this->load->view("modulo2/vregbolpag_anual_resumen", array("bol" => $bol));
    }
    public function guardar_boleta_anios()
    {
        $tmp_anios = explode(",", $_POST["anios"]);
        $tmp_montos = explode(",", $_POST["montos"]);
        $cont1 = 0;
        $cont2 = 0;
        $obser = "-";
        if ($_POST["con_obse"] == "SI") {
            $obser = $_POST["obse"];
        }
        for ($i = 0; $i < count($tmp_anios) - 1; $i++) {
            $add = array(
                "usu_ide" => $this->session->userdata("usu_ide"),
                "com_ide" => $_POST["ide"],
                "alq_anio" => $tmp_anios[$i],
                "alq_monto" => $tmp_montos[$i],
                "alq_comprobante" => $_POST["nro_bol"],
                "alq_recibo_caja" => $_POST["nro_caja"],
                "alq_observaciones" => $obser,
            );
            $where = array(
                "com_ide" => $_POST["ide"],
                "alq_anio" => $tmp_anios[$i],
            );
            if (!$this->mgeneral->existe("mer_alquileres", $where)) {
                $cont1 = $cont1 + $this->mgeneral->insertar("mer_alquileres", $add);
            }

        }

        $declaraciones = array();
        $dec_a = explode(",", $_POST["aniosdj"]);
        $dec_n = explode(",", $_POST["numsdj"]);

        for ($i = 0; $i < count($dec_a); $i++) {
            $declaraciones[] = $dec_a[$i] . ":" . $dec_n[$i];
        }
        $declaraciones = implode(";", $declaraciones);

        $this->mgeneral->actualizar(
            "mer_orden_pago",
            array("ord_ide" => $_POST["cpn"]),
            array(
                "ord_comprobante" => $_POST["nro_bol"],
                "ord_recibo_caja" => $_POST["nro_caja"],
                "ord_declaraciones" => $declaraciones,
                "ord_observaciones" => $obser,
                "ord_estado" => "REGISTRADO",
            )
        );
        echo "Se agregaron $cont1 alquileres";
    }
    /**************************************************************************************************************/
    public function regbolpag_mensual()
    {
        $data = array(
            "completar" => $this->load->view("modulo2/vregpag_completar", array(), true),
        );
        $this->load->view("modulo2/vregbolpag_mensual", $data);
    }
    public function get_datos_bpmensual()
    {
        $bol = $this->mgeneral->get_boleta_mensual($_POST["cpn"]);
        if ($bol == false) {
            $bol = false;
        } else {
            $bol = $bol[0];
        }

        $this->load->view("modulo2/vregbolpag_mensual_resumen", array("bol" => $bol));
    }
    public function guardar_boleta_meses()
    {
        $tmp_anios = explode(",", $_POST["anios"]);
        $tmp_montos = explode(",", $_POST["montos"]);
        $cont1 = 0;
        $cont2 = 0;
        $obser = "-";
        if ($_POST["con_obse"] == "SI") {
            $obser = $_POST["obse"];
        }

        for ($i = 0; $i < count($tmp_anios) - 1; $i++) {
            $ttt = explode("-", $tmp_anios[$i]);
            $add = array(
                "usu_ide" => $this->session->userdata("usu_ide"),
                "com_ide" => $_POST["ide"],
                "rec_anio" => $ttt[0],
                "rec_mes" => $ttt[1],
                "rec_monto" => $tmp_montos[$i],
                "rec_comprobante" => $_POST["nro_bol"],
                "rec_recibo_caja" => $_POST["nro_caja"],
                "rec_observaciones" => $obser,
            );
            $where = array(
                "com_ide" => $_POST["ide"],
                "rec_anio" => $ttt[0],
                "rec_mes" => $ttt[1],
            );
            if (!$this->mgeneral->existe("mer_recaudacion", $where)) {
                $cont1 = $cont1 + $this->mgeneral->insertar("mer_recaudacion", $add);
            }

        }
        $declaraciones = array();
        $dec_a = explode(",", $_POST["aniosdj"]);
        $dec_n = explode(",", $_POST["numsdj"]);

        for ($i = 0; $i < count($dec_a); $i++) {
            $declaraciones[] = $dec_a[$i] . ":" . $dec_n[$i];
        }
        $declaraciones = implode(";", $declaraciones);

        $this->mgeneral->actualizar(
            "mer_orden_pago",
            array("ord_ide" => $_POST["cpn"]),
            array(
                "ord_comprobante" => $_POST["nro_bol"],
                "ord_recibo_caja" => $_POST["nro_caja"],
                "ord_declaraciones" => $declaraciones,
                "ord_observaciones" => $obser,
                "ord_estado" => "REGISTRADO",
            )
        );
        echo "Se agregaron $cont1 recaudaciones";
    }
    /**************************************************************************************************************/
    public function repocuentas()
    {
        $data = array(
            "mercados" => $this->mgeneral->get_data("mer_mercados"),
        );
        $this->load->view("modulo2/vrepocuentas", $data);
    }
    public function pdf_repocuentas($mercado, $tipo_pago)
    {
        if ($tipo_pago == "ANUAL") {
            $cuentas = $this->mgeneral->get_cuentas_anual($mercado);
        }
        if ($tipo_pago == "MENSUAL") {
            $cuentas = $this->mgeneral->get_cuentas_mensual($mercado);
        }
        $alto = 6;
        $borde = 0;
        $this->load->library('Pdf');
        $pdf = new pdf('L', 'mm', 'A4', true, 'UTF-8', false);

        $pdf->SetMargins(5, 10, 5, 5);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->SetFillColor(200, 200, 200);

        $pdf->AddPage('L');
        $pdf->SetFont('helvetica', 'B', 12, '', true);
        $pdf->Cell(0, $alto, "REPORTE DE CUENTAS ", $borde, 1, 'C', 0);

        $pdf->SetFont('helvetica', '', 8, '', true);
        $pdf->Cell(10, $alto, "Nro.", $borde = 1, $ln = 0, 'C', $fill = 1);
        $pdf->Cell(80, $alto, "DATOS", $borde = 1, $ln = 0, 'C', $fill = 1);
        $pdf->Cell(50, $alto, "MERCADO", $borde = 1, $ln = 0, 'C', $fill = 1);
        $pdf->Cell(25, $alto, "PUESTO", $borde = 1, $ln = 0, 'C', $fill = 1);
        $pdf->Cell(40, $alto, "NEGOCIO", $borde = 1, $ln = 0, 'C', $fill = 1);
        $pdf->Cell(20, $alto, "PAGO", $borde = 1, $ln = 0, 'C', $fill = 1);
        $pdf->Cell(30, $alto, "PAGADO", $borde = 1, $ln = 0, 'C', $fill = 1);
        $pdf->Cell(30, $alto, "DEBE", $borde = 1, $ln = 1, 'C', $fill = 1);

        if ($cuentas != false) {
            $cont = 1;
            foreach ($cuentas as $reg) {
                $pdf->Cell(10, $alto, $cont++, $borde = 1, $ln = 0, 'C', $fill = 0);
                $pdf->Cell(80, $alto, $reg->com_datos, $borde = 1, $ln = 0, 'L', $fill = 0);
                $pdf->Cell(50, $alto, $reg->mercado, $borde = 1, $ln = 0, 'L', $fill = 0);
                $pdf->Cell(25, $alto, $reg->puesto, $borde = 1, $ln = 0, 'L', $fill = 0);
                $pdf->Cell(40, $alto, $reg->com_negocio, $borde = 1, $ln = 0, 'L', $fill = 0);
                $pdf->Cell(20, $alto, $reg->mer_tipo_pago, $borde = 1, $ln = 0, 'C', $fill = 0);
                $pdf->Cell(30, $alto, $reg->pagado, $borde = 1, $ln = 0, 'L', $fill = 0);
                $pdf->Cell(30, $alto, $reg->debe, $borde = 1, $ln = 1, 'L', $fill = 0);
            }
        }

        $nombre_archivo = utf8_decode("CUENTAS " . $mercado);
        $pdf->Output($nombre_archivo, 'I');
    }
    /**************************************************************************************************************/
    public function fdecjurada()
    {
        $this->load->view("modulo2/vfdecjurada");
    }
    public function guarda_decjurada()
    {
        $this->mgeneral->insertar("declaraciones", $_POST);
        $ult = $this->mgeneral->ultimo_id();
        echo $ult[0]->id;
    }
    public function pdf_repo_decjurada($ide)
    {
        $decla = $this->mgeneral->get_data("declaraciones", array("dec_ide" => $ide));
        $decla = $decla[0];

        $alto = 6;
        $borde = 0;
        $this->load->library('Pdf');
        $pdf = new pdf('P', 'mm', 'A4', true, 'UTF-8', false);

        $pdf->SetMargins(5, 10, 5, 5);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->AddPage('P');
        $pdf->SetFont('helvetica', '', 8, '', true);

        $pdf->MultiCell(80, $alto, $decla->dec_anio, $borde = 0, 'L', 0, 0, 140, 55);
        $pdf->MultiCell(80, $alto, $decla->dec_nombre, $borde = 0, 'L', 0, 0, 70, 82);
        $pdf->MultiCell(80, $alto, $decla->dec_dni, $borde = 0, 'L', 0, 0, 45, 92);
        $pdf->MultiCell(80, $alto, $decla->dec_ruc, $borde = 0, 'L', 0, 0, 130, 92);
        $pdf->MultiCell(80, $alto, $decla->dec_dom_fis, $borde = 0, 'L', 0, 0, 60, 102);
        $pdf->MultiCell(80, $alto, $decla->dec_barrio, $borde = 0, 'L', 0, 0, 40, 112);
        $pdf->MultiCell(80, $alto, $decla->dec_ubi, $borde = 0, 'L', 0, 0, 105, 126);
        $pdf->MultiCell(80, $alto, $decla->dec_mercado, $borde = 0, 'L', 0, 0, 40, 146);
        $pdf->MultiCell(80, $alto, $decla->dec_giro, $borde = 0, 'L', 0, 0, 35, 168);
        $pdf->MultiCell(80, $alto, $decla->dec_lua, $borde = 0, 'L', 0, 0, 80, 177);
        $pdf->MultiCell(80, $alto, $decla->dec_defecha, $borde = 0, 'L', 0, 0, 145, 177);
        $pdf->MultiCell(80, $alto, $decla->dec_fecha, $borde = 0, 'L', 0, 0, 120, 205);

        $nombre_archivo = utf8_decode("DECLARACION " . $ide);
        $pdf->Output($nombre_archivo, 'I');
    }
    /**************************************************************************************************************/
    public function cambiopadron()
    {
        $this->load->view("modulo2/vcambiopadron");
    }
    public function get_titulares()
    {
        $titu = $this->mgeneral->get_titulares($_POST["titu"]);
        $this->load->view("modulo2/vcambiopadron_tabla", array("titu" => $titu));
    }
    public function cambiar_tupa()
    {
        if ($_POST["tupa_ide"] == 149) {
            $data = array(
                "com_datos" => $_POST["dato_new"],
            );
            $where = array(
                "com_ide" => $_POST["com_ide"],
            );
            $obs = array(
                "usu_ide" => $this->session->userdata("usu_ide"),
                "com_ide" => $_POST["com_ide"],
                "obs_detalle" => "PADRES A HIJOS: Se cambio " . $_POST["dato_act"] . " por " . $_POST["dato_new"],
                "obs_operacion" => $_POST["tupa_txt"],
            );
        }
        if ($_POST["tupa_ide"] == 150) {
            $data = array(
                "com_datos" => $_POST["dato_new"],
            );
            $where = array(
                "com_ide" => $_POST["com_ide"],
            );
            $obs = array(
                "usu_ide" => $this->session->userdata("usu_ide"),
                "com_ide" => $_POST["com_ide"],
                "obs_detalle" => "A TERCEROS: Se cambio " . $_POST["dato_act"] . " por " . $_POST["dato_new"],
                "obs_operacion" => $_POST["tupa_txt"],
            );
        }
        if ($_POST["tupa_ide"] == 152) {
            $data = array(
                "com_negocio" => $_POST["dato_new"],
            );
            $where = array(
                "com_ide" => $_POST["com_ide"],
            );
            $obs = array(
                "usu_ide" => $this->session->userdata("usu_ide"),
                "com_ide" => $_POST["com_ide"],
                "obs_detalle" => "GIRO DE NEGOCIO: Se cambio " . $_POST["dato_act"] . " por " . $_POST["dato_new"],
                "obs_operacion" => $_POST["tupa_txt"],
            );
        }
        //print_r($_POST);
        $r1 = $this->mgeneral->actualizar("mer_comerciantes", $where, $data);
        $r2 = $this->mgeneral->insertar("mer_observaciones", $obs);
        echo "Se actualizo $r1 registros<br>";
        echo "Se registro $r2 observacion";
    }
    /**************************************************************************************************************/
    public function adminrol()
    {
        $users = $this->mgeneral->get_data("seg_usuario");
        $roles = $this->mgeneral->get_data("seg_roles");
        $this->load->view("modulo2/vadminrol", array("users" => $users, "roles" => $roles));
    }
    public function get_roles()
    {
        $user = $_POST['us'];
        $res = $this->mgeneral->get_data("seg_acceso", array("usu_ide" => $user));
        echo json_encode($res);
    }
    /**************************************************************************************************************/
    public function reg_suge()
    {
        $data = array();
        $this->load->view("modulo2/vreg_suge", $data);
    }
    /**************************************************************************************************************/
    public function ver_promos()
    {
        $data = array();
        $this->load->view("modulo2/vverpromos", $data);
    }
    /**************************************************************************************************************/
    /**************************************************************************************************************/
    /**************************************************************************************************************/
}
