<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*MDOULO DE LICENCIAS*/
class Modulo1 extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata("10g!n")!="s3esmun1pun0"){
			$this->load->view("session_expire");
		}
	}
	/**************************************************************************************************************/
	public function index(){
		$this->load->model("mgeneral");
		$roles=$this->mgeneral->get_roles();
		//print_r($roles);
		$data['menu'] = array();
		$i=0;
		if($roles!=false){
			foreach($roles as $rol){
				$data['menu'][$i++]=array('nom'=>$rol->rol_nom,'url'=>$rol->rol_func,'icon'=>$rol->rol_icono);
			}
		}
		$this->load->view('vheader',$data);
		$this->load->view('modulo1/inicio');
		$this->load->view('vfooter');
	}
	/**************************************************************************************************************/
	public function solicita(){
		$this->load->model("mgeneral");
		$data=array(
			"modal"=>$this->mgeneral->get_data("lic_tipo_tramite",$where=array("tit_estado"=>"A")),
			"sector"=>$this->mgeneral->get_data("lic_sector_eco",$where=array("see_estado"=>"A")),
			"orden"=>$this->mgeneral->get_data("lic_tipo_orden",$where=array("tor_estado"=>"A")),
			"tipo_habi"=>$this->mgeneral->get_enum("lic_tramite","tra_tipo_habilitacion"),
			"tipo_via"=>$this->mgeneral->get_enum("lic_tramite","tra_tipo_via"),
			"tipo_itse"=>$this->mgeneral->get_enum("lic_tramite","tra_tipo_itse"),
		);
		$this->load->view("modulo1/vsolicita",$data);
	}
	public function guardar_tramite(){
		$_POST['usu_ide']=$this->session->userdata('usu_ide');
		$this->load->model("mgeneral");
		$this->mgeneral->insertar("lic_tramite",$_POST);
		$ide=$this->mgeneral->ultimo_id();
		echo $ide[0]->id;
	}
	public function actualiza_tramite($tra_ide,$flag=0){
		if($flag==1){
			$_POST["tra_tit_ides"]=$_GET["lll1"];
			$_POST["tra_tor_ides"]=$_GET["lll2"];
			$_POST["tra_monto_total"]=$_GET["ccc1"];
			
		}
		$this->load->model("mgeneral");
		$f=$this->mgeneral->get_fecha();
		$_POST["tra_fech_modi"]=$f[0]->fecha;
		$result=$this->mgeneral->actualizar("lic_tramite",array("tra_ide"=>$tra_ide),$_POST);
		echo "Se actualizaron $result registros";
	}
	public function pdf_tramite($tra_ide){
		$this->load->model("mgeneral");
		$modal=$this->mgeneral->get_data("lic_tipo_tramite",$where=array("tit_estado"=>"A"));
		$sector=$this->mgeneral->get_data("lic_sector_eco",$where=array("see_estado"=>"A"));
		$orden=$this->mgeneral->get_data("lic_tipo_orden",$where=array("tor_estado"=>"A"));
		$tra=$this->mgeneral->get_tramite($tra_ide);
		$tra=$tra[0];
		$fechaact=$this->mgeneral->get_fecha();

		$alto=5;
		$borde=0;
		$this->load->library('Pdf');
		$pdf = new pdf('P', 'mm', 'A4', true, 'UTF-8', false);
					
		$pdf->SetMargins(5,10,5,5);		
        $pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
				
		$pdf->AddPage('P');
		$pdf->SetFont('helvetica', '', 9, '', true);
		$pdf->Cell(0,$alto,"SOLICITUD DE DECLARACION JURADA PARA LA LICENCIA DE FUNCIONAMIENTO", $borde, 1, 'C',0);
		$pdf->SetFont('helvetica', '', 6, '', true);
		$pdf->Cell(0,$alto,"(original y copias)", $borde, 1, 'C',0);

		$file=site_url("img/munipuno.jpg");
		$pdf->Image($file, 20, 15, $largo=15, 0, 'JPG', '', '', false, 300, '', false, false, 0, 'C', false, false);

		$alto=3;
		$pdf->SetFillColor(200,200,200);
		$pdf->Cell(150,$alto,"", $borde=0, 0, 'C',0);	
		$pdf->Cell(50,$alto,"Nro. de Expediente", $borde=1, 1, 'L',1);
		$alto=5;
		$pdf->Cell(150,$alto,"", $borde=0, 0, 'C',0);	
		$pdf->Cell(50,$alto,"", $borde=1, 1, 'L',0);

		$alto=3;
		$pdf->SetFillColor(200,200,200);
		$pdf->Cell(150,$alto,"", $borde=0, 0, 'C',0);	
		$pdf->Cell(50,$alto,"Fecha de recepcion", $borde=1, 1, 'L',1);
		$alto=5;
		$pdf->Cell(150,$alto,"", $borde=0, 0, 'C',0);	
		$pdf->Cell(50,$alto,"", $borde=1, 1, 'L',0);

		$borde=0;
		$alto=3;
		$pdf->SetFillColor(200,200,200);
		$pdf->Cell(50,$alto,"Municipalidad Provincial de Puno", $borde=0, 0, 'C',0);
		$pdf->Cell(100,$alto,"", $borde=0, 0, 'C',0);
		$pdf->Cell(50,$alto,"Nro. de recibo de pago", $borde=1, 1, 'L',1);
		$alto=5;
		$pdf->Cell(50,$alto,"Gerencia de Turismo y Desarrollo Económico", $borde=0, 0, 'C',0);
		$pdf->Cell(100,$alto,"", $borde=0, 0, 'C',0);
		$pdf->Cell(50,$alto,"", $borde=1, 1, 'L',0);

		$alto=3;
		$pdf->SetFillColor(200,200,200);
		$pdf->Cell(50,$alto,"Sub Gerencia de Actividades Económicas", $borde=0, 1, 'C',0);
		$pdf->Cell(50,$alto,"", $borde=0, 0, 'C',0);
		$pdf->Cell(150,$alto,"Código de trámite: ".$tra_ide, $borde=0, 1, 'R',0);
		
		$alto=3.9;
		$pdf->SetFont('helvetica', 'B', 8, '', true);
		$pdf->Cell(0,2*$alto,"I. MODALIDAD DE TRAMITE QUE SE SOLICITA", $borde, 1, 'L',0);

		$borde=0;
		$equis=array("","","","","","","","");
		$tmptit=$tra->tra_tit_ides;
		$tmptit=explode(",",$tmptit);
		for($i=0;$i<count($tmptit);$i++){
			$equis[$tmptit[$i]-1]="X";
		}
		$pdf->SetFont('helvetica', '', 7, '', true);
		//print_r($modal);
		$pdf->MultiCell(5,$alto,$equis[0], $borde=1,'C',0,0);
		$pdf->MultiCell(65,2*$alto,"1. ".ucwords(strtolower($modal[0]->tit_nombre)), $borde=0,'L',0,0);
		$pdf->MultiCell(5,$alto,$equis[4], $borde=1,'C',0,0);
		$pdf->MultiCell(70,2*$alto,"5. ".ucwords(strtolower($modal[4]->tit_nombre)), $borde=0,'L',0,0);
		$pdf->MultiCell(55,2*$alto,"", "LRT", 'L',0,1);

		$pdf->MultiCell(5,$alto,$equis[1], $borde=1,'C',0,0);
		$pdf->MultiCell(65,2*$alto,"2. ".ucwords(strtolower($modal[1]->tit_nombre)), $borde=0,'L',0,0);
		$pdf->MultiCell(5,$alto,$equis[5], $borde=1,'C',0,0);
		$pdf->MultiCell(70,2*$alto,"6. ".ucwords(strtolower($modal[5]->tit_nombre)), $borde=0,'L',0,0);
		$pdf->MultiCell(55,2*$alto,"", "LR", 'L',0,1);
		
		$pdf->MultiCell(5,$alto,$equis[2], $borde=1,'C',0,0);
		$pdf->MultiCell(65,2*$alto,"3. ".ucwords(strtolower($modal[2]->tit_nombre)), $borde=0,'L',0,0);
		$pdf->MultiCell(5,$alto,$equis[6], $borde=1,'C',0,0);
		$pdf->MultiCell(70,2*$alto,"7. ".ucwords(strtolower($modal[6]->tit_nombre)), $borde=0,'L',0,0);
		$pdf->MultiCell(55,2*$alto,"", "LR", 'L',0,1);

		$pdf->MultiCell(5,$alto,$equis[3], $borde=1,'C',0,0);
		$pdf->MultiCell(65,2*$alto,"4. ".ucwords(strtolower($modal[3]->tit_nombre)), $borde=0,'L',0,0);
		$pdf->MultiCell(5,$alto,$equis[7], $borde=1,'C',0,0);
		$pdf->MultiCell(70,2*$alto,"8. ".ucwords(strtolower($modal[7]->tit_nombre)).": ".$tra->tra_tit_obs, $borde=0,'L',0,0);
		$pdf->MultiCell(55,2*$alto,"", "LRB", 'L',0,1);

		$pdf->SetFont('helvetica', 'B', 8, '', true);
		$pdf->Cell(0,2*$alto,"II. DATOS DEL SOLICITANTE", $borde, 1, 'L',0);

		$borde=1;
		$pdf->SetFont('helvetica', '', 7, '', true);
		$pdf->Cell(0,$alto,$tra->tra_nombre, $borde, 1, 'L',0);
		$pdf->Cell(0,$alto,"9. Apellidos y nombres o Razón Social", $borde, 1, 'L',1);

		$pdf->Cell(30,$alto,$tra->tra_dni_ce, $borde, $ln=0, 'L',$fill=0);
		$pdf->Cell(70,$alto,$tra->tra_email, $borde, $ln=0, 'L',$fill=0);
		$pdf->Cell(30,$alto,$tra->tra_tel, $borde, $ln=0, 'L',$fill=0);
		$pdf->Cell(70,$alto,$tra->tra_ruc, $borde, $ln=1, 'L',$fill=0);
		$pdf->Cell(30,$alto,"10. Nro. de DNI o CE", $borde, $ln=0, 'L',$fill=1);
		$pdf->Cell(70,$alto,"11. Correo electrónico/e-mail", $borde, $ln=0, 'L',$fill=1);
		$pdf->Cell(30,$alto,"12. Nro. de telefono", $borde, $ln=0, 'L',$fill=1);
		$pdf->Cell(70,$alto,"13. RUC", $borde, $ln=1, 'L',$fill=1);

		$pdf->Cell(120,$alto,$tra->tra_direc, $borde, $ln=0, 'L',$fill=0);
		$pdf->Cell(20,$alto,$tra->tra_dir_nro, $borde, $ln=0, 'L',$fill=0);
		$pdf->Cell(20,$alto,$tra->tra_dir_int, $borde, $ln=0, 'L',$fill=0);
		$pdf->Cell(20,$alto,$tra->tra_dir_mz, $borde, $ln=0, 'L',$fill=0);
		$pdf->Cell(20,$alto,$tra->tra_dir_lt, $borde, $ln=1, 'L',$fill=0);
		$pdf->Cell(120,$alto,"14. Av./Jr/Ca/Pje", $borde, $ln=0, 'L',$fill=1);
		$pdf->Cell(20,$alto,"15. Nro.", $borde, $ln=0, 'L',$fill=1);
		$pdf->Cell(20,$alto,"Int", $borde, $ln=0, 'L',$fill=1);
		$pdf->Cell(20,$alto,"Mz", $borde, $ln=0, 'L',$fill=1);
		$pdf->Cell(20,$alto,"Lt", $borde, $ln=1, 'L',$fill=1);
		
		$pdf->Cell(50,$alto,$tra->tra_urb, $borde, $ln=0, 'L',$fill=0);
		$pdf->Cell(50,$alto,$tra->tra_dist, $borde, $ln=0, 'L',$fill=0);
		$pdf->Cell(50,$alto,$tra->tra_prov, $borde, $ln=0, 'L',$fill=0);
		$pdf->Cell(50,$alto,$tra->tra_depa, $borde, $ln=1, 'L',$fill=0);
		$pdf->Cell(50,$alto,"16. Urb., AA.HH, Barrio, Otros", $borde, $ln=0, 'L',$fill=1);
		$pdf->Cell(50,$alto,"17. Distrito", $borde, $ln=0, 'L',$fill=1);
		$pdf->Cell(50,$alto,"18. Provincia", $borde, $ln=0, 'L',$fill=1);
		$pdf->Cell(50,$alto,"19. Departamento", $borde, $ln=1, 'L',$fill=1);

		$pdf->SetFont('helvetica', 'B', 8, '', true);
		$pdf->Cell(0,2*$alto,"III. REPRESENTANTE LEGAL", $borde=0, 1, 'L',0);

		$borde=1;
		$pdf->SetFont('helvetica', '', 7, '', true);
		$pdf->Cell(100,$alto,$tra->tra_rep_nom, $borde, $ln=0, 'L',$fill=0);
		$pdf->Cell(30,$alto,$tra->tra_rep_nr_doc, $borde, $ln=0, 'L',$fill=0);
		$pdf->Cell(40,$alto,$tra->tra_rep_nsunarp, $borde, $ln=0, 'L',$fill=0);
		$pdf->Cell(30,$alto,$tra->tra_rep_tel, $borde, $ln=1, 'L',$fill=0);
		$pdf->Cell(100,$alto,"20. Apellidos y nombres", $borde, $ln=0, 'L',$fill=1);
		$pdf->Cell(30,$alto,"21. Nro. de DNI o CE", $borde, $ln=0, 'L',$fill=1);
		$pdf->Cell(40,$alto,"22. Nro. de Partida P.(SUNARP)", $borde, $ln=0, 'L',$fill=1);
		$pdf->Cell(30,$alto,"23. Nro. de Telefono", $borde, $ln=1, 'L',$fill=1);

		$pdf->SetFont('helvetica', 'B', 8, '', true);
		$pdf->Cell(0,2*$alto,"IV. DATOS DEL ESTABLECIMIENTO", $borde=0, 1, 'L',0);

		$borde=1;
		$pdf->SetFont('helvetica', '', 7, '', true);
		$pdf->Cell(100,$alto,$tra->tra_est_nomb, $borde, $ln=0, 'L',$fill=0);
		$pdf->Cell(100,$alto,$tra->tra_actividad, $borde, $ln=1, 'L',$fill=0);
		$pdf->Cell(100,$alto,"24. Nombre comercial", $borde, $ln=0, 'L',$fill=1);
		$pdf->Cell(100,$alto,"25. Giro o actividad", $borde, $ln=1, 'L',$fill=1);

		$pdf->SetFont('helvetica', '', 7, '', true);
		$pdf->Cell(100,$alto,$tra->tra_est_dire, $borde, $ln=0, 'L',$fill=0);
		$pdf->Cell(15,$alto,$tra->tra_est_nro, $borde, $ln=0, 'L',$fill=0);
		$pdf->Cell(15,$alto,$tra->tra_est_int, $borde, $ln=0, 'L',$fill=0);
		$pdf->Cell(15,$alto,$tra->tra_est_mz, $borde, $ln=0, 'L',$fill=0);
		$pdf->Cell(15,$alto,$tra->tra_est_lt, $borde, $ln=0, 'L',$fill=0);
		$pdf->Cell(40,$alto,$tra->tra_est_urb, $borde, $ln=1, 'L',$fill=0);
		$pdf->Cell(100,$alto,"26. Av./Jr./Ca./Pje.", $borde, $ln=0, 'L',$fill=1);
		$pdf->Cell(15,$alto,"27. Nro.", $borde, $ln=0, 'L',$fill=1);
		$pdf->Cell(15,$alto,"Int", $borde, $ln=0, 'L',$fill=1);
		$pdf->Cell(15,$alto,"Mz", $borde, $ln=0, 'L',$fill=1);
		$pdf->Cell(15,$alto,"Lt", $borde, $ln=0, 'L',$fill=1);
		$pdf->Cell(40,$alto,"28. Urb., AA.HH, Barrio, otros", $borde, $ln=1, 'L',$fill=1);

		$tmpsector=array(
			"COMERCIO"=>"",
			"INDUSTRIA"=>"",
			"SERVICIO"=>"",
		);
		$tmpsector[$tra->see_nombre]="X";
		foreach($sector as $reg){
			if($reg->see_nombre!=""){
				$pdf->Cell(20,$alto,$reg->see_nombre, $borde, $ln=0, 'L',$fill=0);
				$pdf->Cell(5,$alto,$tmpsector[$reg->see_nombre], $borde, $ln=0, 'C',$fill=0);
			}
		}
		$pdf->Cell(15,$alto,"", "TLR", $ln=0, 'C',$fill=0);
		$pdf->Cell(20,$alto,$tra->tra_est_lar, $borde, $ln=0, 'C',$fill=0);
		$pdf->Cell(10,$alto,"mts.", $borde, $ln=0, 'L',$fill=0);
		$pdf->Cell(10,$alto,"X", "TLR", $ln=0, 'C',$fill=0);
		$pdf->Cell(20,$alto,$tra->tra_est_anc, $borde, $ln=0, 'C',$fill=0);
		$pdf->Cell(10,$alto,"mts.", $borde, $ln=0, 'L',$fill=0);
		$pdf->Cell(10,$alto,"=", "TLR", $ln=0, 'C',$fill=0);
		$pdf->Cell(20,$alto,$tra->tra_est_lar*$tra->tra_est_anc, $borde, $ln=0, 'C',$fill=0);
		$pdf->Cell(10,$alto,"M2", $borde, $ln=1, 'L',$fill=0);

		$pdf->Cell(75,$alto,"29. Sector Económico", $borde, $ln=0, 'L',$fill=1);
		$pdf->Cell(15,$alto,"", "LBR", $ln=0, 'L',$fill=0);
		$pdf->Cell(30,$alto,"30. Área Largo", $borde, $ln=0, 'L',$fill=1);
		$pdf->Cell(10,$alto,"", "LBR", $ln=0, 'L',$fill=0);
		$pdf->Cell(30,$alto,"31. Área Ancho", $borde, $ln=0, 'L',$fill=1);
		$pdf->Cell(10,$alto,"", "LBR", $ln=0, 'L',$fill=0);
		$pdf->Cell(30,$alto,"32. Área Total", $borde, $ln=1, 'L',$fill=1);

		$pdf->SetFont('helvetica', 'B', 8, '', true);
		$pdf->Cell(0,2*$alto,"V. OTROS DATOS DEL ESTABLECIMIENTO", $borde=0, 1, 'L',0);

		$pdf->SetFont('helvetica', '', 7, '', true);
		$pdf->Cell(0,$alto,"33. Croquis de ubicación", "LTR", $ln=1, 'L',$fill=0);
		$file=site_url("img/croquis.jpg");
		$pdf->Image($file, 4.5, 190, $largo=105, 0, 'JPG', '', '', false, 300, '', false, false, 0, 'C', false, false);

		$pdf->Cell(110,$alto,"", "L", $ln=0, 'L',$fill=0);
		$pdf->Cell(60,$alto,"34. Capacidad a foro (CA)", $borde=0, $ln=0, 'L',$fill=0);
		$pdf->Cell(30,$alto,$tra->tra_oest_aforo, $borde=1, $ln=1, 'C',$fill=0);

		$pdf->Cell(110,$alto,"", "L", $ln=0, 'L',$fill=0);
		$pdf->Cell(60,$alto,"", $borde=0, $ln=0, 'L',$fill=0);
		$pdf->Cell(30,$alto,"Cantidad de personas", $borde=1, $ln=1, 'L',$fill=1);

		$pdf->Cell(110,$alto,"", "L", $ln=0, 'L',$fill=0);
		$pdf->Cell(60,$alto,"CA=Capacidad de aforo área público (CP) + ", $borde=0, $ln=0, 'L',$fill=0);
		$pdf->Cell(30,$alto,"", "R", $ln=1, 'L',$fill=0);

		$pdf->Cell(110,$alto,"", "L", $ln=0, 'L',$fill=0);
		$pdf->Cell(90,$alto,"       Capacidad de aforo área administrativa o de transformación (CT)", "R", $ln=1, 'L',$fill=0);

		$pdf->Cell(110,$alto,"", "L", $ln=0, 'L',$fill=0);
		$pdf->Cell(60,$alto,"CP=3 personas x m2        CT=1 persona x 3 m2", $borde=0, $ln=0, 'L',$fill=0);
		$pdf->Cell(30,$alto,"", "R", $ln=1, 'L',$fill=0);

		$pdf->Cell(0,$alto,"", "RL", $ln=1, 'L',$fill=0);

		$tmptox=array("SI"=>"","NO"=>"");
		$tmpmat=array("NOBLE"=>"","RUSTICO"=>"");

		$tmptox[$tra->tra_oest_mat_tox]="X";
		$tmpmat[$tra->tra_oest_mat_cont]="X";

		$pdf->Cell(110,$alto,"", "L", $ln=0, 'L',$fill=0);
		$pdf->Cell(60,$alto,"35. Manipulación y/o uso de materiales", $borde=0, $ln=0, 'L',$fill=0);
		$pdf->Cell(15,$alto,$tmptox["SI"], $borde=1, $ln=0, 'C',$fill=0);
		$pdf->Cell(15,$alto,$tmptox["NO"], $borde=1, $ln=1, 'C',$fill=0);

		$pdf->Cell(110,$alto,"", "L", $ln=0, 'L',$fill=0);
		$pdf->Cell(60,$alto,"     combustibles y/o tóxicos y/o inflamables", $borde=0, $ln=0, 'L',$fill=0);
		$pdf->Cell(15,$alto,"SI", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(15,$alto,"NO", $borde=1, $ln=1, 'C',$fill=1);

		$pdf->Cell(0,$alto,"", "LR", $ln=1, 'L',$fill=0);

		$pdf->Cell(110,$alto,"", "L", $ln=0, 'L',$fill=0);
		$pdf->Cell(60,$alto,"36. Material de construcción predominante", $borde=0, $ln=0, 'L',$fill=0);
		$pdf->Cell(15,$alto,$tmpmat["NOBLE"], $borde=1, $ln=0, 'C',$fill=0);
		$pdf->Cell(15,$alto,$tmpmat["RUSTICO"], $borde=1, $ln=1, 'C',$fill=0);

		$pdf->Cell(110,$alto,"", "LB", $ln=0, 'L',$fill=0);
		$pdf->Cell(60,$alto,"", "B", $ln=0, 'L',$fill=0);
		$pdf->Cell(15,$alto,"Noble", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(15,$alto,"Rustico", $borde=1, $ln=1, 'C',$fill=1);

		$borde=1;
		$pdf->SetFont('helvetica', '', 7, '', true);		
		$pdf->Cell(0,$alto,"37. DECLARO BAJO JURAMENTO QUE:", "LTR", $ln=1, 'L',$fill=0);
		$tmptxtjura1="
		- Los datos consignados anteriormente expresan la verdad y que la documentación presentada es veraz.

		- Tengo conocimiento que la presente declaración y la documentación presentada esta sujeta a verificación posterior de su veracidad, en caso de haber 
		   proporcionado información, documentación y/o declaraciones que no correspondan a la verdad, se me aplicarán las sanciones administrativas y/o penales 
		   correspondientes a, RECAVANDOSE AUTOMATICAMENTE las autorizaciones que se me otorguen como consecuencia de esta solicitud.
		
		- Tengo conocimiento que la emisión de la Licencia de Funcionamiento para el establecimiento esta 
		  sujeta a la aprobación de la inspección básica.
		
		- Brindare las facilidades necesarias para las acciones de fiscalización y control a las autoridades 
		  municipales competentes
		";
		$pdf->MultiCell(0,10*$alto,$tmptxtjura1, "LRB",'J',0,0);

		$file=site_url("img/firma.jpg");
		$pdf->Image($file, 135, 260, $largo=60, 0, 'JPG', '', '', false, 300, '', false, false, 0, 'C', false, false);

		$pdf->AddPage('P');

		$pdf->SetFont('helvetica', 'B', 8, '', true);
		$pdf->Cell(0,$alto,"38. VI. DECLARACION JURADA SECTorIAL", "LTR", $ln=1, 'L',$fill=0);
		$tmptxtjura2="  Declaro bajo juramento que cuento con los permisos sectoriales necesarios para desarrollar la actividad o
		giro mencionado (en el punto 29), de acuerdo al Plan de Director y Zonificación establecida por la 
		Municipalidad Provincial de Puno
		";
		$pdf->SetFont('helvetica', '', 7, '', true);
		$pdf->MultiCell(0,$alto,$tmptxtjura2, "LR",'J',$fill=0,$ln=1);
		$pdf->Cell(100,$alto,"El establecimiento es clasificado como uso compatible", "LTRB", $ln=0, 'L',$fill=1);
		$pdf->Cell(100,$alto,"", "R", $ln=1, 'L',$fill=0);
		$pdf->MultiCell(100,2*$alto,$tra->tra_est_uso_comp, "LRTB",'J',$fill=0,$ln=0);
		$pdf->MultiCell(100,2*$alto,"", "BR",'J',$fill=0,$ln=1);

		$file=site_url("img/firma.jpg");
		$pdf->Image($file, 135, 25, $largo=60, 0, 'JPG', '', '', false, 300, '', false, false, 0, 'C', false, false);

		$pdf->Cell(0,$alto,"", $borde=0, $ln=1, 'L',$fill=0);

		$pdf->SetFont('helvetica', 'B', 8, '', true);
		$pdf->Cell(0,$alto,"39. VII. DECLARACION JURADA DE PROCESO DE INSPECCION TECNICA DE SEGURIDAD EN EDIFICACIONES - ITSE (D.S.058-2014-PCM)", "LTR", $ln=1, 'L',$fill=0);
		$tmptxtjura3="  - Modelo 1A (EX-POST): Establecimientos con un área de hasta 100 m2 y con una capacidad de almacenamiento no mayor del 30% del área total, donde no se manipulan ni utilizan materiales inflamables , combustibles o tóxicos. Este modelo no incluye centros de recreación de espectáculos, deportivos, culturales o de salud.

		- Tengo conocimiento que la presente declaración y la documentación presentada está sujeta a verificación posterior para su inspección Técnica de Seguridad en Edificaciones Básicas Ex Post, en caso de haber proporcionado información, documentación y/o declaraciones que no respondan a la verdad, se me aplicarán las sanciones administrativas y/o penales correspondientes, REVOCANDOSE AUTOMATICAMENTE las autorizaciones que se me otorguen como consecuencia de esta solicitud, de acuerdo a las normativas vigentes Ley Nº 28976, Decreto Legislativo Nº 776 D.S. 058-2014-PCM. O.M. Nº 421-2014-CMPP.
		
		Declaro bajo juramento que mi establecimiento cuenta con las siguientes medidas y equipo básico de seguridad.
		";
		$pdf->SetFont('helvetica', '', 7, '', true);
		$pdf->MultiCell(0,$alto,$tmptxtjura3, "LR",'J',$fill=0,$ln=1);

		$tmppqs="";if($tra->tra_ins_pqs=="SI")$tmppqs="X";else if($tra->tra_ins_pqs=="NO")$tmppqs="";
		
		$tmpco2="";if($tra->tra_ins_co2=="SI")$tmpco2="X";else if($tra->tra_ins_co2=="NO")$tmpco2="";
		
		$tmpsenasi="";
		$tmpsenano="";	
		if($tra->tra_ins_sen=="SI"){
			$tmpsenasi="X";
			$tmpsenano="";
		}
		else if($tra->tra_ins_sen=="NO"){
			$tmpsenasi="";
			$tmpsenano="X";
		}

		$tmptermo="";if($tra->tra_ins_llav_termo=="SI")$tmptermo="X";else if($tra->tra_ins_llav_termo=="NO")$tmptermo="";
		$tmpboti="";if($tra->tra_ins_boti=="SI")$tmpboti="X";else if($tra->tra_ins_boti=="NO")$tmpboti="";
		$tmpentu="";if($tra->tra_ins_cab_en=="SI")$tmpentu="X";else if($tra->tra_ins_cab_en=="NO")$tmpentu="";

		$pdf->Cell(30,$alto,"- Extintor Tipo: ", "L", $ln=0, 'L',$fill=0);
		$pdf->Cell(10,$alto,"PQS", $borde=0, $ln=0, 'L',$fill=0);
		$pdf->Cell(5,$alto,$tmppqs, $borde=1, $ln=0, 'C',$fill=0);
		$pdf->Cell(20,$alto,"Kilos", $borde=0, $ln=0, 'L',$fill=0);
		$pdf->Cell(10,$alto,$tra->tra_ins_pqs_kilos, $borde=1, $ln=0, 'R',$fill=0);
		$pdf->Cell(20,$alto,"", $borde=0, $ln=0, 'R',$fill=0);
		$pdf->Cell(40,$alto,"- Llaves termomagnéticas: ", $borde=0, $ln=0, 'L',$fill=0);
		$pdf->Cell(5,$alto,$tmptermo, $borde=1, $ln=0, 'C',$fill=0);
		$pdf->Cell(60,$alto,"", "R", $ln=1, 'C',$fill=0);

		$pdf->Cell(30,$alto,"", "L", $ln=0, 'L',$fill=0);
		$pdf->Cell(10,$alto,"CO2", $borde=0, $ln=0, 'L',$fill=0);
		$pdf->Cell(5,$alto,$tmpco2, $borde=1, $ln=0, 'C',$fill=0);
		$pdf->Cell(20,$alto,"Kilos", $borde=0, $ln=0, 'L',$fill=0);
		$pdf->Cell(10,$alto,$tra->tra_ins_co2_kilos, $borde=1, $ln=0, 'R',$fill=0);
		$pdf->Cell(20,$alto,"", $borde=0, $ln=0, 'R',$fill=0);
		$pdf->Cell(40,$alto,"", $borde=0, $ln=0, 'L',$fill=0);
		$pdf->Cell(5,$alto,"", $borde=0, $ln=0, 'C',$fill=0);
		$pdf->Cell(60,$alto,"", "R", $ln=1, 'C',$fill=0);

		$pdf->Cell(0,$alto,"", "LR", $ln=1, 'C',$fill=0);

		$pdf->Cell(30,$alto,"- Señalización: ", "L", $ln=0, 'L',$fill=0);
		$pdf->Cell(10,$alto,"SI", $borde=0, $ln=0, 'L',$fill=0);
		$pdf->Cell(5,$alto,$tmpsenasi, $borde=1, $ln=0, 'C',$fill=0);
		$pdf->Cell(20,$alto,"", $borde=0, $ln=0, 'L',$fill=0);
		$pdf->Cell(10,$alto,"", $borde=0, $ln=0, 'R',$fill=0);
		$pdf->Cell(20,$alto,"", $borde=0, $ln=0, 'R',$fill=0);
		$pdf->Cell(40,$alto,"- Botiquín implementado: ", $borde=0, $ln=0, 'L',$fill=0);
		$pdf->Cell(5,$alto,$tmpboti, $borde=1, $ln=0, 'C',$fill=0);
		$pdf->Cell(60,$alto,"", "R", $ln=1, 'C',$fill=0);

		$pdf->Cell(30,$alto,"", "L", $ln=0, 'L',$fill=0);
		$pdf->Cell(10,$alto,"NO", $borde=0, $ln=0, 'L',$fill=0);
		$pdf->Cell(5,$alto,$tmpsenano, $borde=1, $ln=0, 'C',$fill=0);
		$pdf->Cell(20,$alto,"", $borde=0, $ln=0, 'L',$fill=0);
		$pdf->Cell(10,$alto,"", $borde=0, $ln=0, 'R',$fill=0);
		$pdf->Cell(20,$alto,"", $borde=0, $ln=0, 'R',$fill=0);
		$pdf->Cell(40,$alto,"", $borde=0, $ln=0, 'L',$fill=0);
		$pdf->Cell(5,$alto,"", $borde=0, $ln=0, 'C',$fill=0);
		$pdf->Cell(60,$alto,"", "R", $ln=1, 'C',$fill=0);

		$pdf->Cell(30,$alto,"", "L", $ln=0, 'L',$fill=0);
		$pdf->Cell(10,$alto,"", $borde=0, $ln=0, 'L',$fill=0);
		$pdf->Cell(5,$alto,"", $borde=0, $ln=0, 'C',$fill=0);
		$pdf->Cell(20,$alto,"", $borde=0, $ln=0, 'L',$fill=0);
		$pdf->Cell(10,$alto,"", $borde=0, $ln=0, 'R',$fill=0);
		$pdf->Cell(20,$alto,"", $borde=0, $ln=0, 'R',$fill=0);
		$pdf->Cell(40,$alto,"- Cables entubados o empotrados", $borde=0, $ln=0, 'L',$fill=0);
		$pdf->Cell(5,$alto,$tmpentu, $borde=1, $ln=0, 'C',$fill=0);
		$pdf->Cell(60,$alto,"", "R", $ln=1, 'C',$fill=0);

		$tmptxtjura4="Así mismo declaro bajo juramento que en caso de observaciones formuladas por el inspector, me comprometo a llevarlas en un plazo no mayor de 7 días hábiles, me afirmo y me rectifico en lo expresado, en señal de lo cual firmo el presente documento
		";
		$pdf->Cell(0,$alto,"", "LR", $ln=1, 'L',$fill=0);
		$pdf->MultiCell(130,3*$alto,$tmptxtjura4, "L",'J',$fill=0,$ln=0);
		$pdf->MultiCell(70,3*$alto,"", "R",'J',$fill=0,$ln=1);
		$pdf->Cell(0,$alto,"", "T", $ln=1, 'L',$fill=0);

		$file=site_url("img/firma.jpg");
		$pdf->Image($file, 140, 102.5, $largo=60, 0, 'JPG', '', '', false, 300, '', false, false, 0, 'C', false, false);

		$pdf->SetFont('helvetica', 'B', 8, '', true);
		$pdf->Cell(0,$alto,"40. VIII. DECLARACION JURADA DE ANUNCIO ADOSADO A FACHADA Y/O CARACTERISTICAS DEL ANUNCIO", "LTR", $ln=1, 'L',$fill=0);
		
		$pdf->SetFont('helvetica', '', 7, '', true);
		$tmptxtjura5="Declaro bajo juramento que mi establecimiento contará con un anuncio adosado a fachada.";
		$pdf->Cell(0,$alto,$tmptxtjura5, "LR", $ln=1, 'L',$fill=0);

		$tmplumisi="";
		$tmplumino="";
		if($tra->tra_anu_lumi=="SI"){
			$tmplumisi="X";
			$tmplumino="";
		}
		else if($tra->tra_anu_lumi=="NO"){
			$tmplumisi="";
			$tmplumino="X";
		}

		$pdf->Cell(0,$alto,"", "LR", $ln=1, 'L',$fill=0);

		$pdf->Cell(15,$alto,"Luminoso", "L", $ln=0, 'L',$fill=0);
		$pdf->Cell(5,$alto,"SI", $borde=1, $ln=0, 'L',$fill=0);
		$pdf->Cell(5,$alto,$tmplumisi, $borde=1, $ln=0, 'C',$fill=0);
		$pdf->Cell(5,$alto,"NO", $borde=1, $ln=0, 'L',$fill=0);
		$pdf->Cell(5,$alto,$tmplumino, $borde=1, $ln=0, 'C',$fill=0);

		$pdf->Cell(30,$alto,"Características", $borde=0, $ln=0, 'R',$fill=0);
		$pdf->Cell(50,$alto,$tra->tra_anu_cara, $borde=1, $ln=0, 'L',$fill=0);

		$pdf->Cell(30,$alto,"Material", $borde=0, $ln=0, 'R',$fill=0);
		$pdf->Cell(50,$alto,$tra->tra_anu_mat, $borde=1, $ln=0, 'L',$fill=0);

		$pdf->Cell(5,$alto,"", "R", $ln=1, 'L',$fill=0);

		$pdf->Cell(0,$alto,"", "LR", $ln=1, 'L',$fill=0);

		$pdf->Cell(85,$alto,"Medidas:", "LR", $ln=0, 'R',$fill=0);
		$pdf->Cell(20,$alto,$tra->tra_anu_largo, $borde, $ln=0, 'C',$fill=0);
		$pdf->Cell(10,$alto,"mts.", $borde, $ln=0, 'L',$fill=0);
		$pdf->Cell(10,$alto,"X", "LR", $ln=0, 'C',$fill=0);
		$pdf->Cell(20,$alto,$tra->tra_anu_alto, $borde, $ln=0, 'C',$fill=0);
		$pdf->Cell(10,$alto,"mts.", $borde, $ln=0, 'L',$fill=0);
		$pdf->Cell(10,$alto,"=", "LR", $ln=0, 'C',$fill=0);
		$pdf->Cell(20,$alto,$tra->tra_anu_alto*$tra->tra_anu_largo, $borde, $ln=0, 'C',$fill=0);
		$pdf->Cell(10,$alto,"M2", $borde, $ln=0, 'L',$fill=0);
		$pdf->Cell(5,$alto,"", "R", $ln=1, 'C',$fill=0);

		$pdf->Cell(85,$alto,"", "L", $ln=0, 'L',$fill=0);
		$pdf->Cell(30,$alto,"Largo", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(10,$alto,"", "LR", $ln=0, 'L',$fill=0);
		$pdf->Cell(30,$alto,"Alto", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(10,$alto,"", "LR", $ln=0, 'L',$fill=0);
		$pdf->Cell(30,$alto,"Total", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(5,$alto,"", "R", $ln=1, 'C',$fill=0);

		$pdf->Cell(120,$alto,"Gráfico", "LB", $ln=0, 'L',$fill=0);
		$pdf->Cell(80,$alto,"", "R", $ln=1, 'C',$fill=0);

		$pdf->MultiCell(120,4*$alto,"", "LRTB",'J',$fill=0,$ln=0);
		$pdf->MultiCell(80,4*$alto,"", "R",'J',$fill=0,$ln=1);

		$pdf->Cell(120,$alto,"Estructura, Materiales, Características, Color", $borde=1, $ln=0, 'L',$fill=1);
		$pdf->Cell(80,$alto,"", "R", $ln=1, 'C',$fill=0);

		$pdf->Cell(120,$alto,$tra->tra_anu_est_mat_car_col, $borde=1, $ln=0, 'L',$fill=0);
		$pdf->Cell(80,$alto,"", "RB", $ln=1, 'C',$fill=0);

		$file=site_url("img/firma.jpg");
		$pdf->Image($file, 140, 162.5, $largo=60, 0, 'JPG', '', '', false, 300, '', false, false, 0, 'C', false, false);

		$pdf->SetFont('helvetica', 'B', 8, '', true);
		$pdf->Cell(0,2*$alto,"41. orDEN DE PAGO", $borde=0, $ln=1, 'L',$fill=0);
		
		$pdf->SetFont('helvetica', '', 7, '', true);
		$tmptxt6="El administrativo solicitante, debe de abonar en caja un único pago correspondiente al derecho de tramite por:";
		$pdf->Cell(0,$alto,$tmptxt6, $borde=0, $ln=1, 'L',$fill=0);

		$equis2=array("","","","","","","","");
		$tmptor=$tra->tra_tor_ides;
		$tmptor=explode(",",$tmptor);
		for($i=0;$i<count($tmptor);$i++){
			$equis2[$tmptor[$i]-1]="X";
		}

		$i=0;
		$alto=3;
		foreach($orden as $reg){
			$pdf->MultiCell(100,$alto,($i+1).". ".ucwords(strtolower($reg->tor_nombre)), $borde=0,'L',$fill=0,$ln=0);
			$pdf->MultiCell(5,$alto,$equis2[$i++], $borde=1,'C',$fill=0,$ln=1);
			$pdf->MultiCell(0,3,"", $borde=0,'L',$fill=0,$ln=1);
		}

		$alto=10;
		$pdf->Cell(25,$alto,"Derecho de trámite:", $borde=0, $ln=0, 'L',$fill=0);
		$pdf->SetFont('helvetica', '', 14, '', true);
		$pdf->Cell(10,$alto,"S/.", $borde=0, $ln=0, 'R',$fill=0);
		$pdf->Cell(30,$alto,$tra->tra_mt, $borde=1, $ln=1, 'L',$fill=0);

		$pdf->SetFont('helvetica', '', 7, '', true);
		$fechaact=$fechaact[0]->fecha;
		$alto=4;
		$pdf->Cell(00,3*$alto,"", "", $ln=1, 'C',$fill=0);
		$pdf->Cell(50,$alto,"", "B", $ln=0, 'L',$fill=0);
		$pdf->Cell(50,$alto,"", "", $ln=0, 'L',$fill=0);
		$pdf->Cell(50,$alto,$fechaact, "B", $ln=1, 'C',$fill=0);

		$pdf->Cell(50,$alto,"VºBº orientador", "", $ln=0, 'C',$fill=0);
		$pdf->Cell(50,$alto,"", "", $ln=0, 'L',$fill=0);
		$pdf->Cell(50,$alto,"Fecha/Hora", "", $ln=1, 'C',$fill=0);

		$pdf->Cell(50,$alto,"NOTA: En caso se deje abandonado el presente trámite, se archivará automaáticamente a los 10 días de su inicio de presentación.", "", $ln=1, 'L',$fill=0);
		$pdf->Cell(50,$alto,"NO TIENE VALIDEZ SIN EL VºBº DE LA SUBGERENCIA DE ACTIVIDADES ECONOMICAS", "", $ln=1, 'L',$fill=0);
		
		$nombre_archivo = utf8_decode("SOLICITUD ".$tra_ide);
		$pdf->Output($nombre_archivo, 'I');
	}
	public function get_tramite(){
		$this->load->model("mgeneral");
		$result=$this->mgeneral->get_data("lic_tramite",$where=array("tra_ide"=>$_POST["tra_ide"]));
		echo json_encode($result);
	}
	/**************************************************************************************************************/
	public function edita(){
		$this->load->model("mgeneral");
		$data=array(
			"modal"=>$this->mgeneral->get_data("lic_tipo_tramite",$where=array("tit_estado"=>"A")),
			"sector"=>$this->mgeneral->get_data("lic_sector_eco",$where=array("see_estado"=>"A")),
			"orden"=>$this->mgeneral->get_data("lic_tipo_orden",$where=array("tor_estado"=>"A")),
		);
		$this->load->view("modulo1/vedita",$data);
	}
	/**************************************************************************************************************/
	public function buscalice(){
		$this->load->view("modulo1/vbuscalice");
	}
	public function get_licencias(){
		$this->load->model("mgeneral");
		$result=$this->mgeneral->query2("
			select 
				t.*,
				l.*
			from 
				lic_tramite t, 
				lic_licencia l
			where
				(
					t.tra_ide = l.tra_ide
				)
				and 
				(
					t.tra_nombre like '%".$_POST["dato"]."%'
					or
					t.tra_dni_ce like '%".$_POST["dato"]."%'
					or 
					t.tra_ruc like '%".$_POST["dato"]."%'
					or 
					t.tra_rep_nom like '%".$_POST["dato"]."%'
					or 
					t.tra_rep_nr_doc like '%".$_POST["dato"]."%'
					or
					l.lic_ide = '".$_POST["dato"]."'
					or
					t.tra_est_dire like '%".$_POST["dato"]."%'
					or
					t.tra_urb like '%".$_POST["dato"]."%'
					or
					t.tra_direc like '%".$_POST["dato"]."%'
				)
		");
		$data=array(
			"dato"=>$_POST["dato"],
			"result"=>$result
		);
		$this->load->view("modulo1/vbuscalice_result",$data);
	}
	/**************************************************************************************************************/
	public function buscatram(){
		$this->load->view("modulo1/vbuscatram");
	}
	public function get_tramites(){
		$this->load->model("mgeneral");
		$result=$this->mgeneral->get_tramites($_POST["dato"]);
		$data=array(
			"dato"=>$_POST["dato"],
			"result"=>$result
		);
		$this->load->view("modulo1/vbuscatram_result",$data);
	}
	/**************************************************************************************************************/
	public function repobl(){
		$this->load->view("modulo1/vrepobl");
	}
	public function get_datos_tramite(){
		$this->load->model("mgeneral");
		$result=$this->mgeneral->get_data("lic_tramite",$where=array("tra_ide"=>$_POST["tra_ide"]));
		$data=array(
			"result"=>$result
		);
		$this->load->view("modulo1/vrepobl_result",$data);
	}
	public function pdf_boleta($tra_ide,$nro_lice,$bol_nro){//para imprimir boletas de licencias de funcionamiento
		$this->load->model("mgeneral");
		if($this->mgeneral->existe("lic_tramite",array("tra_cpag"=>$bol_nro))==true){
			echo "<h3>El número de boleta $bol_nro ya existe en el sistema.</h3>";
			return;
		}
		if($this->mgeneral->existe("lic_tramite",array("tra_nro_lice"=>$nro_lice,"tra_nro_lice > 0"=>NULL))==true){
			echo "<h3>El número de licencia $nro_lice ya existe en el sistema.</h3>";
			return;
		}		
		$tra=$this->mgeneral->get_tramite($tra_ide);
		$tra=$tra[0];
		if($tra->tra_estado!="REGISTRADO"){
			if($tra->tra_estado=="CON LICENCIA"){
				echo "<h3>La licencia ya fue generada para el Código de Trámite Nro. $tra_ide.</h3>";
				return;	
			}
			else if($tra->tra_estado=="CON ORDEN DE PAGO"){
				echo "<h3>El Código de Trámite Nro. $tra_ide se encuentra con Orden de Pago Nro. $tra->tra_cpag.</h3>";
				return;	
			}
		}
		$this->mgeneral->query("update lic_tramite set tra_cpag=$bol_nro, tra_nro_lice=$nro_lice, tra_fech_cpag=now() where tra_ide=$tra_ide");
		$this->mgeneral->actualizar("lic_tramite",array("tra_ide"=>$tra_ide,"tra_estado"=>"REGISTRADO"),array("tra_estado"=>"CON ORDEN DE PAGO"));
		if($tra==false){
			echo "<h3>El codigo de trámite $tra_ide no existe en el sistema.</h3>";
			return;
		}
		$fechaact=$this->mgeneral->get_fecha();
		$fechaact=$fechaact[0]->fecha;
		$fechaact=explode(" ",$fechaact);
		$fechaact=$fechaact[0];

		$alto=6;
		$borde=0;
		$this->load->library('Pdf');
		$pdf = new pdf('P', 'mm', 'A4', true, 'UTF-8', false);
					
		$pdf->SetMargins(5,10,5,5);		
        $pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		
		$pdf->AddPage('P');
		$pdf->SetFont('helvetica', 'B', 10, '', true);
		$pdf->MultiCell(150,$alto,$tra->tra_rep_nom." - ".$tra->tra_nombre, $borde=0,'L',0,0,'40','42');

		$tmp=explode(",",$tra->tra_tor_ides);
		$tmp2=array(0);
		for($i=0;$i<count($tmp)-1;$i++){
			$tmp2[]=$tmp[$i];
		}
		$orden=$this->mgeneral->get_ordenes($tmp2);

		$i=0;
		if($orden!=false){
			foreach($orden as $reg){
				$pdf->MultiCell(95,$alto,$reg->tor_nombre, $borde=0,'L',0,0,33,86+$alto*$i);
				$i++;
			}
		}
		//$i--;
		$pdf->MultiCell(25,$alto,$nro_lice, $borde=0,'L',0,0,135,86);//NUMERO DE LICENCIA
		$pdf->MultiCell(25,$alto,$tra->tra_mt, $borde=0,'L',0,0,165,86);//MONTO TOTAL
		$i++;
		$pdf->MultiCell(95,$alto,$tra->tra_actividad."   ''".$tra->tra_est_nomb."''", $borde=0,'L',0,0,33,86+$alto*$i++);//ACTIVIDAD O ACTIVIDADES
		$pdf->MultiCell(95,$alto,$tra->tra_est_dire." ".$tra->tra_est_nro." ".$tra->tra_est_int, $borde=0,'L',0,0,33,86+$alto*$i++);//DIRECCION
		$pdf->MultiCell(30,$alto,$fechaact, $borde=0,'L',0,0,160,33);//FECHA

		
		$letras=strtoupper($this->get_letras($tra->tra_monto_total));
		$pdf->MultiCell(150,$alto,$letras, $borde=0,'L',0,0,25,113);

		$nombre_archivo = utf8_decode("BOLETA ".$tra_ide.".pdf");
		$pdf->Output($nombre_archivo, 'I');
	}
	public function get_letras($cantidad){
		$this->load->library('Letras');
		$V=new Letras();
		return $V->ValorEnLetras($cantidad,"");
	}
	/**************************************************************************************************************/
	public function repolice(){
		$this->load->view("modulo1/vrepolice");
	}
	public function pdf_licencia($tra_ide,$op="imprimir"){
		$this->load->model("mgeneral");
		if($op=="imprimir"){
			$this->mgeneral->actualizar("lic_tramite",array("tra_ide"=>$tra_ide,"tra_estado"=>"CON ORDEN DE PAGO"),array("tra_nro_expe"=>$_GET["expe"],"tra_obs_tecnico"=>$_GET["obsetec"]));
		}
		$tra=$this->mgeneral->get_tramite($tra_ide);
		$tra=$tra[0];
		if($tra==false){
			echo "<h3>El codigo de trámite $tra_ide no existe</h3>";
			return;
		}
		if($this->mgeneral->existe("lic_tramite",array("tra_ide"=>$tra_ide,"tra_estado"=>"REGISTRADO"))){
			echo "<h3>La licencia de funcionamiento no se puede generar por que aun no posee una orden de pago</h3>";
			return;	
		}
		if($op=="imprimir"){
			if($this->mgeneral->existe("lic_tramite",array("tra_ide"=>$tra_ide,"tra_estado"=>"CON LICENCIA"))){
				echo "<h3>La licencia de funcionamiento $tra->tra_nro_lice ya fue generada</h3>";
				return;	
			}
		}
		$fechaact=$this->mgeneral->get_fecha();
		$fechaact=$fechaact[0]->fecha;
		$fechaact2=$fechaact;
		$fechaact=explode(" ",$fechaact);
		$fechaact=$fechaact[0];

		$alto=6;
		$borde=0;
		$this->load->library('Pdf');
		$pdf = new pdf('P', 'mm', 'A4', true, 'UTF-8', false);
					
		$pdf->SetMargins(5,10,5,5);
        $pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		
		$pdf->AddPage('P');
		$pdf->SetFont('helvetica', 'B', 11, '', true);
		$pdf->MultiCell(50,$alto,"C.T. ".$tra->tra_ide, $borde=0,'L',0,0,30,78);
		$pdf->MultiCell(175,$alto,"RUC. ".$tra->tra_ruc, $borde=0,'C',0,0,30,78);
		if($tra->tra_rep_nom==""){//COMO PERSONA NATURAL
			$pdf->MultiCell(175,$alto,$tra->tra_nombre, $borde=0,'L',0,0,30,110);//AP. PAT    AP. MAT     NOMBRES			
		}
		else{//COMO EMPRESA
			$pdf->MultiCell(175,$alto,$tra->tra_rep_nom, $borde=0,'L',0,0,30,110);//AP. PAT    AP. MAT     NOMBRES
			$pdf->MultiCell(175,$alto,$tra->tra_nombre, $borde=0,'L',0,0,30,127);//RAZON SOCIAL	
		}
		
		$tmp_dire=$tra->tra_est_dire;//." Nro. ".$tra->tra_est_nro." ".$tra->tra_est_int;
		if(trim($tra->tra_est_nro)!=""){
			$tmp_dire.=" NRO.".$tra->tra_est_nro;
		}
		if(trim($tra->tra_est_int)!=""){
			$tmp_dire.=" INT.".$tra->tra_est_int;
		}
		if(trim($tra->tra_est_mz)!=""){
			$tmp_dire.=" MZ.".$tra->tra_est_mz;
		}
		if(trim($tra->tra_est_lt)!=""){
			$tmp_dire.=" LT.".$tra->tra_est_lt;
		}

		$pdf->MultiCell(175,$alto,$tra->tra_actividad."   ''".$tra->tra_est_nomb."''", $borde=0,'L',0,0,30,145);//CLASE EST COMERCIAL
		$pdf->MultiCell(175,$alto,$tmp_dire, $borde=0,'L',0,0,30,162);//DIRECCCION
		$pdf->MultiCell(175,$alto,$tra->tra_obs_tecnico, $borde=0,'L',0,0,30,175);//OBS DEL TECNICO
		$pdf->MultiCell(175,$alto,$tra->tra_obs, $borde=0,'L',0,0,30,180);//OBS
		
		$area=$tra->tra_est_lar*$tra->tra_est_anc;
		$mmm=0;

		$tit=$tra->tra_tit_ides;
		$tit=explode(",",$tit);
		$flag=false;		
		foreach ($tit as $t) {
			if($t>=4 && $t<=6){
				$flag=true;
			}
		}

		if($flag==true){
			$mmm=$tra->tra_monto_total;
		}
		else if($area>=0 && $area<=100){
        	$mmm=$tra->tor_monto;
        }
        else if($area>=101 && $area<=500){
        	$mmm=$tra->tor_monto2;
        }
		else if($area>=501){
        	$mmm=$tra->tor_monto3;
        }
		$pdf->MultiCell(175,$alto,$mmm, $borde=0,'L',0,0,70,190);
		//$pdf->MultiCell(175,$alto,$tra->tra_mt, $borde=0,'L',0,0,70,190);//IMPORTE ABONADO
		
		$pdf->MultiCell(175,$alto,strtoupper($this->get_letras($mmm)), $borde=0,'L',0,0,105,190);//EN LETRAS
		$pdf->MultiCell(175,$alto,"SOLES", $borde=0,'L',0,0,30,197);//NUEVO SOLES
		$pdf->MultiCell(175,$alto,$tra->tra_nro_expe, $borde=0,'L',0,0,60,206);//NRO. DE EXPEDIENTE
		$pdf->MultiCell(175,$alto,$tra->tra_cpag, $borde=0,'L',0,0,140,206);//NRO. DE COMPROBANTE DE PAGO

		$pdf->MultiCell(60,$alto,substr($tra->tra_fech_reg,0,10), $borde=0,'C',0,0,70,219);
		$pdf->MultiCell(60,$alto,substr($tra->tra_fech_cpag,0,10), $borde=0,'C',0,0,70,225);
		//$pdf->MultiCell(60,$alto,$fechaact2, $borde=0,'C',0,0,70,219);

		if($op=="imprimir"){
			$this->mgeneral->actualizar("lic_tramite",array("tra_ide"=>$tra_ide,"tra_estado"=>"CON ORDEN DE PAGO"),array("tra_estado"=>"CON LICENCIA"));
		}
		if($op=="imprimir"){
			if(!$this->mgeneral->existe("lic_licencia",array("tra_ide"=>$tra_ide))){
				$usu_ide=$this->session->userdata("usu_ide");
				$this->mgeneral->query("insert into lic_licencia (tra_ide,usu_ide,lic_fech_emi) VALUES ($tra_ide,$usu_ide,now());");
			}
		}
		$nombre_archivo = utf8_decode("LICENCIA ".$tra_ide.".pdf");
		$pdf->Output($nombre_archivo, 'I');
	}
	/**************************************************************************************************************/
	public function pdf_reporte_licencias($result,$titulo){
		$fechaact=$this->mgeneral->get_fecha();
		$fechaact=$fechaact[0]->fecha;

		$alto=6;
		$borde=0;
		$this->load->library('Pdf');
		$pdf = new pdf('L', 'mm', 'A4', true, 'UTF-8', false);
					
		$pdf->SetMargins(5,10,5,5);
        $pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		
		$pdf->AddPage('L');
		$pdf->SetFont('helvetica', 'B', 8, '', true);
		$pdf->Cell(0,$alto,$titulo, $borde, 1, 'C',0);
		$pdf->Cell(0,$alto,"", $borde, 1, 'C',0);

		$pdf->SetFont('helvetica', '', 6, '', true);		
		$pdf->SetFillColor(200,200,200);

		$pdf->Cell(8,$alto,"Nro.", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(17,$alto,"RUC", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(12,$alto,"C.Tram.", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(12,$alto,"Exp.", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(12,$alto,"C.Pag.", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(20,$alto,"DNI/CE R.L.", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(35,$alto,"Representante Legal", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(35,$alto,"Razon Social", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(25,$alto,"Giro o Actividad", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(35,$alto,"Direccion del Est.", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(25,$alto,"Estado Lic.", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(20,$alto,"Fecha de Emision", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(25,$alto,"Fecha de Trámite", $borde=1, $ln=1, 'C',$fill=1);

		$pdf->SetFillColor(255,255,255);
		if($result!=false){
			$cont=1;
			foreach($result as $reg){
				$pdf->Cell(8,$alto,$cont++, $borde=1, $ln=0, 'C',$fill=1);
				$pdf->Cell(17,$alto,$reg->tra_ruc, $borde=1, $ln=0, 'L',$fill=1);
				$pdf->Cell(12,$alto,$reg->tra_ide, $borde=1, $ln=0, 'L',$fill=1);
				$pdf->Cell(12,$alto,$reg->tra_nro_expe, $borde=1, $ln=0, 'L',$fill=1);
				$pdf->Cell(12,$alto,$reg->tra_cpag, $borde=1, $ln=0, 'L',$fill=1);
				$pdf->Cell(20,$alto,$reg->tra_dni_ce, $borde=1, $ln=0, 'L',$fill=1);
				$pdf->Cell(35,$alto,$reg->tra_rep_nom, $borde=1, $ln=0, 'L',$fill=1);
				$pdf->Cell(35,$alto,$reg->tra_nombre, $borde=1, $ln=0, 'L',$fill=1);
				$pdf->Cell(25,$alto,$reg->tra_actividad, $borde=1, $ln=0, 'L',$fill=1);
				$pdf->Cell(35,$alto,$reg->tra_est_dire." ".$reg->tra_est_nro, $borde=1, $ln=0, 'L',$fill=1);
				$pdf->Cell(25,$alto,$reg->lic_estado, $borde=1, $ln=0, 'C',$fill=1);
				$pdf->Cell(20,$alto,$reg->lic_fech_emi, $borde=1, $ln=0, 'L',$fill=1);
				$pdf->Cell(25,$alto,$reg->lic_fech_reg, $borde=1, $ln=1, 'L',$fill=1);
			}
		}

		$nombre_archivo = utf8_decode("LICENCIAS");
		$pdf->Output($nombre_archivo, 'I');
	}
	/**************************************************************************************************************/
	public function repolicenciasf(){
		$this->load->view("modulo1/vrepolicenciasf");
	}
	public function pdf_repo_licenciasf($ini,$fin){
		$this->load->model("mgeneral");
		$result=$this->mgeneral->get_licenciasf_fecha($ini,$fin);
		$this->pdf_reporte_licencias($result,"REPORTE DE LICENCIAS DE FUNCIONAMIENTO HABILITADAS DEL $ini AL $fin");	
	}
	public function get_lista_actividades(){
		$this->load->model("mgeneral");
		if($_POST["tipo"]=="giro")
			$activ=$this->mgeneral->get_actividades($_POST["giro"]);
		if($_POST["tipo"]=="direccion")
			$activ=$this->mgeneral->get_direcciones($_POST["giro"]);
		echo json_encode($activ);
	}
	public function pdf_repo_licencias_giro(){
		$this->load->model("mgeneral");
		$query="
			select
				*
			from 
				lic_licencia l,
				lic_tramite t
			where
				l.tra_ide = t.tra_ide and (
		";
		$lista=explode(",",$_GET["lista"]);
		$tmp="";
		if($_GET["tipo"]=="giro"){
			for($i=0;$i<count($lista)-1;$i++){
				$or="or";
				if($i==count($lista)-2)
					$or="";
				$tmp=$tmp." t.tra_actividad = '".$lista[$i]."' $or ";
			}
		}
		else if($_GET["tipo"]=="direccion"){
			for($i=0;$i<count($lista)-1;$i++){
				$or="or";
				if($i==count($lista)-2)
					$or="";
				$tmp=$tmp." t.tra_est_dire = '".$lista[$i]."' $or ";
			}
		}
		$tmp=$tmp.") ";
		$query=$query.$tmp;
		$result=$this->mgeneral->query2($query);
		$this->pdf_reporte_licencias($result,"REPORTE DE LICENCIAS DE FUNCIONAMIENTO HABILITADAS");
	}
	/**************************************************************************************************************/
	public function repoletreros(){
		$this->load->view("modulo1/vrepoletreros");
	}
	public function get_tipos_elem(){
		$this->load->model("mgeneral");
		if($_POST["tipo"]=="giro")
			$activ=$this->mgeneral->get_actividades($_POST["txt"]);
		if($_POST["tipo"]=="direccion")
			$activ=$this->mgeneral->get_direcciones($_POST["txt"]);
		if($_POST["tipo"]=="representante")
			$activ=$this->mgeneral->get_representantes($_POST["txt"]);
		echo json_encode($activ);
	}
	public function pdf_repo_letreros_giro(){
		$this->load->model("mgeneral");
		$query="
			select
				*
			from
				lic_tramite t
			where
				(
					t.tra_estado = 'CON LICENCIA'
					or
					t.tra_estado = 'CON AUT. ANUNCIO PUBLICITARIO'
				)
				and
				(
		";
		$lista=explode(",",$_GET["lista"]);
		$tmp="";
		if($_GET["tipo"]=="giro"){
			$order="tra_est_dire";
			for($i=0;$i<count($lista)-1;$i++){
				$or="or";
				if($i==count($lista)-2)
					$or="";
				$tmp=$tmp." t.tra_actividad = '".$lista[$i]."' $or ";
			}
		}
		else if($_GET["tipo"]=="direccion"){
			$order="tra_est_dire";
			for($i=0;$i<count($lista)-1;$i++){
				$or="or";
				if($i==count($lista)-2)
					$or="";
				$tmp=$tmp." t.tra_est_dire = '".$lista[$i]."' $or ";
			}
		}
		else if($_GET["tipo"]=="representante"){
			$order="tra_rep_nom";
			for($i=0;$i<count($lista)-1;$i++){
				$or="or";
				if($i==count($lista)-2)
					$or="";
				$tmp=$tmp." t.tra_rep_nom = '".$lista[$i]."' $or ";
			}
		}
		$tmp=$tmp.") order by $order asc";
		$query=$query.$tmp;
		$result=$this->mgeneral->query2($query);
		$this->pdf_reporte_letreros($result,"REPORTE DE LETREROS HABILITADOS");
	}
	public function pdf_reporte_letreros($result,$titulo){
		$fechaact=$this->mgeneral->get_fecha();
		$fechaact=$fechaact[0]->fecha;

		$alto=6;
		$borde=0;
		$this->load->library('Pdf');
		$pdf = new pdf('L', 'mm', 'A4', true, 'UTF-8', false);
					
		$pdf->SetMargins(5,10,5,5);
        $pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		
		$pdf->AddPage('L');
		$pdf->SetFont('helvetica', 'B', 8, '', true);
		$pdf->Cell(0,$alto,$titulo, $borde, 1, 'C',0);
		$pdf->Cell(0,$alto,"", $borde, 1, 'C',0);

		$pdf->SetFont('helvetica', '', 6, '', true);		
		$pdf->SetFillColor(200,200,200);
		
		/*$pdf->Cell(10,$alto,"Nro.", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(20,$alto,"Nro.Licencia", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(20,$alto,"DNI/CE R.L.", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(75,$alto,"Representante Legal", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(75,$alto,"Giro o Actividad", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(80,$alto,"Direccion del Est.", $borde=1, $ln=1, 'C',$fill=1);
*/
		$pdf->Cell(10,$alto,"Nro.", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(12,$alto,"C.Pag", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(17,$alto,"DNI/CE R.L.", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(40,$alto,"Representante Legal", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(40,$alto,"Giro o Actividad", $borde=1, $ln=0, 'C',$fill=1);		
		$pdf->Cell(40,$alto,"Direccion del Est.", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(30,$alto,"Dimensiones", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(30,$alto,"Tipo Let.", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(50,$alto,"Caract. y Material", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(15,$alto,"F.Tramite.", $borde=1, $ln=1, 'C',$fill=1);

		$pdf->SetFillColor(255,255,255);

		if($result!=false){
			$cont=1;
			foreach($result as $reg){
				$pdf->Cell(10,$alto,$cont++, $borde=1, $ln=0, 'C',$fill=0);
				$pdf->Cell(12,$alto,$reg->tra_cpag, $borde=1, $ln=0, 'L',$fill=0);
				$pdf->Cell(17,$alto,$reg->tra_dni_ce, $borde=1, $ln=0, 'L',$fill=0);
				$pdf->Cell(40,$alto,$reg->tra_rep_nom, $borde=1, $ln=0, 'L',$fill=0);
				$pdf->Cell(40,$alto,$reg->tra_actividad, $borde=1, $ln=0, 'L',$fill=0);
				$pdf->Cell(40,$alto,$reg->tra_est_dire." ".$reg->tra_est_nro, $borde=1, $ln=0, 'L',$fill=0);
				$pdf->Cell(30,$alto,$reg->tra_anu_largo." x ".$reg->tra_anu_alto, $borde=1, $ln=0, 'L',$fill=0);
				$pdf->Cell(30,$alto,$reg->tra_anu_lumi, $borde=1, $ln=0, 'L',$fill=0);
				$pdf->Cell(50,$alto,$reg->tra_anu_cara." ".$reg->tra_anu_mat, $borde=1, $ln=0, 'L',$fill=0);
				$pdf->Cell(15,$alto,$reg->tra_fech_reg, $borde=1, $ln=1, 'L',$fill=0);
			}
		}

		$nombre_archivo = utf8_decode("LICENCIAS");
		$pdf->Output($nombre_archivo, 'I');
	}
	/**************************************************************************************************************/
	public function ceseact(){
		$this->load->view("modulo1/vceseact");	
	}
	public function get_datos_licencia(){
		$this->load->model("mgeneral");
		$result=$this->mgeneral->get_data("lic_tramite t,lic_licencia l",$where=array("t.tra_ide = l.tra_ide"=>NULL,"t.tra_ide"=>$_POST["ide"]));
		$data=array(
			"result"=>$result
		);
		$this->load->view("modulo1/vlice_result",$data);
	}
	public function setcese(){
		$this->load->model("mgeneral");
		$r=$this->mgeneral->actualizar("lic_licencia",array("tra_ide"=>$_POST["ide"]),array("lic_estado"=>$_POST["estado"],"lic_obs"=>$_POST["obs"]));
		echo "Se actualizaron $r registros";
	}
	/**************************************************************************************************************/
	public function imp_bol(){
		$this->load->model("mgeneral");
		$this->load->view("modulo1/vimp_bol",array("lista"=>$this->mgeneral->get_conceptos_boletas()));
	}
	public function guardar_bol_oa(){
		$this->load->model("mgeneral");
		$this->mgeneral->insertar("act_boletas",$_POST);
		$tmp=$this->mgeneral->ultimo_id();
		echo $tmp[0]->id;
	}
	public function pdf_otra_boleta($ide){
		$this->load->model("mgeneral");
		$bol=$this->mgeneral->get_data("act_boletas",array("bol_ide"=>$ide));
		$bol=$bol[0];

		$fechaact=$bol->bol_fecha_reg;
		$fechaact=explode(" ",$fechaact);
		$fechaact=$fechaact[0];

		$alto=6;
		$borde=0;
		$this->load->library('Pdf');
		$pdf = new pdf('P', 'mm', 'A4', true, 'UTF-8', false);
					
		$pdf->SetMargins(5,10,5,5);		
        $pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		
		$pdf->AddPage('P');
		$pdf->SetFont('helvetica', 'B', 10, '', true);

		$pdf->MultiCell(30,$alto,$fechaact, $borde=0,'L',0,0,160,40);
		$pdf->MultiCell(150,$alto,$bol->bol_contri, $borde=0,'L',0,0,40,42);
		$pdf->MultiCell(80,5*$alto,$bol->bol_concepto, $borde=0,'L',0,0,33,86);
		$pdf->MultiCell(80,$alto,"Vigencia al: ".$bol->bol_fecha_vigencia, $borde=0,'L',0,0,33,86+3.5*$alto);
		$pdf->MultiCell(25,$alto,$bol->bol_monto, $borde=0,'L',0,0,165,86);
		$letras=strtoupper($this->get_letras($bol->bol_monto));
		$pdf->MultiCell(25,$alto,$bol->bol_ide, $borde=0,'L',0,0,160,20);
		$pdf->MultiCell(150,$alto,$letras, $borde=0,'L',0,0,25,113);

		$nombre_archivo = utf8_decode("BOLETA ".$bol->bol_ide);
		$pdf->Output($nombre_archivo, 'I');
	}
	/**************************************************************************************************************/
	public function repobolotras(){
		$this->load->view("modulo1/vrepobolotras");
	}
	public function get_tipos_conceptos(){
		$this->load->model("mgeneral");
		$result=$this->mgeneral->get_conceptos_boletas($_POST["txt"]);
		echo json_encode($result);
	}
	public function pdf_repoboltras(){
		$this->load->model("mgeneral");
		$query="
			select
				*,round(bol_monto,2) as monto
			from
				act_boletas t
			where
				(
		";
		$lista=explode(",",$_GET["lista"]);
		$tmp="";
		$order="bol_concepto";
		for($i=0;$i<count($lista)-1;$i++){
			$or="or";
			if($i==count($lista)-2)
				$or="";
			$tmp=$tmp." t.bol_concepto = '".$lista[$i]."' $or ";
		}
		$tmp=$tmp.") order by $order asc";
		$query=$query.$tmp;
		$result=$this->mgeneral->query2($query);

		$this->pdf_reporte_otras_actividades($result,"REPORTE DE BOLETAS");
	}
	public function pdf_reporte_otras_actividades($result,$titulo){
		$fechaact=$this->mgeneral->get_fecha();
		$fechaact=$fechaact[0]->fecha;

		$alto=6;
		$borde=0;
		$this->load->library('Pdf');
		$pdf = new pdf('P', 'mm', 'A4', true, 'UTF-8', false);
					
		$pdf->SetMargins(5,10,5,5);
        $pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		
		$pdf->AddPage('P');
		$pdf->SetFont('helvetica', 'B', 8, '', true);
		$pdf->Cell(0,$alto,$titulo, $borde, 1, 'C',0);
		$pdf->Cell(0,$alto,"", $borde, 1, 'C',0);

		$pdf->SetFont('helvetica', '', 8, '', true);		
		$pdf->SetFillColor(200,200,200);
		$pdf->Cell(10,$alto,"Nro.", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(55,$alto,"Contribuyente", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(50,$alto,"Concepto", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(20,$alto,"Monto (S/.)", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(15,$alto,"C.P.Nro.", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(18,$alto,"F.Vigencia", $borde=1, $ln=0, 'C',$fill=1);
		$pdf->Cell(31,$alto,"Fecha/Hora", $borde=1, $ln=1, 'C',$fill=1);

		//$pdf->Cell(25,$alto,"Estado Lic.", $borde=1, $ln=0, 'C',$fill=1);
		//$pdf->Cell(25,$alto,"Fecha de Emision", $borde=1, $ln=1, 'C',$fill=1);

		if($result!=false){
			$cont=1;
			foreach($result as $reg){
				$pdf->Cell(10,$alto,$cont++, $borde=1, $ln=0, 'C',$fill=0);
				$pdf->Cell(55,$alto,$reg->bol_contri, $borde=1, $ln=0, 'L',$fill=0);
				$pdf->Cell(50,$alto,$reg->bol_concepto, $borde=1, $ln=0, 'L',$fill=0);
				$pdf->Cell(20,$alto,"S/. ".$reg->monto, $borde=1, $ln=0, 'L',$fill=0);
				$pdf->Cell(15,$alto,$reg->bol_nro, $borde=1, $ln=0, 'L',$fill=0);
				$pdf->Cell(18,$alto,$reg->bol_fecha_vigencia, $borde=1, $ln=0, 'L',$fill=0);
				$pdf->Cell(31,$alto,$reg->bol_fecha_reg, $borde=1, $ln=1, 'L',$fill=0);
			}
		}

		$nombre_archivo = utf8_decode("REPORTE DE BOLETAS");
		$pdf->Output($nombre_archivo, 'I');
	}
	/**************************************************************************************************************/
	public function editalice(){
		$this->load->model("mgeneral");
		$data=array(
			"modal"=>$this->mgeneral->get_data("lic_tipo_tramite",$where=array("tit_estado"=>"A")),
			"sector"=>$this->mgeneral->get_data("lic_sector_eco",$where=array("see_estado"=>"A")),
			"orden"=>$this->mgeneral->get_data("lic_tipo_orden",$where=array("tor_estado"=>"A")),
		);
		$this->load->view("modulo1/veditalice",$data);
	}
	/**************************************************************************************************************/
	public function autorizarap(){
		$this->load->view("modulo1/vaurotizap");
	}
	public function setautoap(){
		$this->load->model("mgeneral");
		//$r=$this->mgeneral->actualizar("lic_tramite",array("tra_ide"=>$_POST["ide"],"tra_estado"=>"CON ORDEN DE PAGO"),array("tra_estado"=>$_POST["estado"]));
		$r=$this->mgeneral->actualizar("lic_tramite",array("tra_ide"=>$_POST["ide"]),array("tra_estado"=>$_POST["estado"]));
		echo "Se actualizaron $r registros";
	}
	/**************************************************************************************************************/
	public function salir(){
		$this->session->sess_destroy();
		redirect(site_url());
	}
	/**************************************************************************************************************/
	public function anutram(){
		$this->load->model("mgeneral");
		$this->load->view("modulo1/anutram");
	}
	public function get_tramites_ide(){
		$this->load->model("mgeneral");
		$result=$this->mgeneral->get_tramites_ide($_POST["dato"]);
		$data=array(
			"dato"=>$_POST["dato"],
			"result"=>$result
		);
		$this->load->view("modulo1/vanu_tram_result",$data);
	}
	public function anulartram(){
		$this->load->model("mgeneral");
		$f=$this->mgeneral->get_fecha();
		$tra_ide=$_POST["ide"];
		$result=$this->mgeneral->actualizar("lic_tramite",array("tra_ide"=>$tra_ide),array("tra_estado"=>"ANULADO"));
		echo "Se actualizaron $result registros";
	}
	/**************************************************************************************************************/
	public function loginuser(){
		$this->session->sess_destroy();
		echo "
			<script type='text/javascript'>
				location.href='".site_url()."';
			</script>
		";
	}
	/**************************************************************************************************************/
	/**************************************************************************************************************/
	/**************************************************************************************************************/
}
?>
