<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mgeneral extends CI_Model
{
	function query($query)
	{
		$this->db->query($query);
	}
	function query2($query)
	{
		$query = $this->db->query($query);
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	function insertar($tabla, $data)
	{
		$this->db->insert($tabla, $data);
		$result = $this->db->affected_rows();
		return $result;
	}
	function actualizar($tabla, $where, $data)
	{
		$this->db->where($where);
		$this->db->update($tabla, $data);
		$result = $this->db->affected_rows();
		return $result;
	}
	function eliminar($tabla, $where)
	{
		$this->db->delete($tabla, $where);
		$result = $this->db->affected_rows();
		return $result;
	}
	function login($where)
	{
		$this->db->select("
			u.*,
			o.ofi_nombre
		", false);
		$this->db->from("
			seg_usuario u,
			oficinas o
		");
		$this->db->where($where);
		$this->db->where("u.ofi_ide = o.ofi_ide");
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		}
		return false;
	}
	function get_roles()
	{
		$this->db->select("*");
		$this->db->from("
			seg_acceso a,
			seg_roles r
		");
		$this->db->where("r.rol_ide = a.rol_ide");
		$this->db->where("r.rol_esta = 'A'");
		$this->db->where("a.usu_ide", $this->session->userdata("usu_ide"));
		$this->db->order_by("r.rol_cont asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	function existe($tabla, $where)
	{
		$this->db->select("*");
		$this->db->from("
			$tabla
		");
		$this->db->where($where);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return true;
		}
		return false;
	}
	function get_data($tabla, $where = false, $like = false, $order = false)
	{
		$this->db->select("*");
		$this->db->from($tabla);
		if ($where != false)
			$this->db->where($where);
		if ($like != false)
			$this->db->like($like);
		if ($order != false)
			$this->db->order_by($order);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	function get_data_select($select, $tabla, $where = false, $like = false, $order = false)
	{
		$this->db->select($select, false);
		$this->db->from($tabla);
		if ($where != false)
			$this->db->where($where);
		if ($like != false)
			$this->db->like($like);
		if ($order != false)
			$query = $this->db->order_by($order);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	function ultimo_id()
	{
		$this->db->select("
			last_insert_id() as id
		", false);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	function get_tramite($tra_ide)
	{
		$this->db->select("o.*,t.*,s.*,round(tra_monto_total,2) as tra_mt", false);
		$this->db->from("
			lic_tramite t,
			lic_sector_eco s,
			lic_tipo_orden o
		");
		$this->db->where("t.tra_ide", $tra_ide);
		$this->db->where("t.see_ide_est = s.see_ide");
		$this->db->where("o.tor_ide = 1");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	function get_fecha()
	{
		$this->db->select("now() as fecha");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	function get_ordenes($where)
	{
		$this->db->select("*");
		$this->db->from("lic_tipo_orden");
		$this->db->where_in('tor_ide', $where);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	function get_tramites($dato)
	{
		$this->db->select("*");
		$this->db->from("lic_tramite");
		$this->db->like("tra_nombre", $dato);
		$this->db->or_like("tra_dni_ce", $dato);
		$this->db->or_like("tra_ruc", $dato);
		$this->db->or_like("tra_rep_nom", $dato);
		$this->db->or_like("tra_rep_nr_doc", $dato);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	function get_tramites_ide($ide)
	{
		$this->db->select("*");
		$this->db->from("lic_tramite");
		$this->db->where("tra_ide", $ide);
		$this->db->where("usu_ide", $this->session->userdata("usu_ide"));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	function get_licenciasf_fecha($ini, $fin)
	{
		$this->db->select("*");
		$this->db->from("
			lic_licencia l,
			lic_tramite t
		");
		$this->db->where("l.tra_ide = t.tra_ide");
		$this->db->like("t.tra_tit_ides", "1,");
		$this->db->where("l.lic_fech_emi >= '$ini' and l.lic_fech_emi <= '$fin'");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	function get_actividades($act)
	{
		$this->db->select("l.tra_actividad as elem", false);
		$this->db->from("
			lic_tramite l
		");
		$this->db->like("l.tra_actividad", $act);
		$this->db->group_by("l.tra_actividad");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	function get_direcciones($act)
	{
		$this->db->select("l.tra_est_dire as elem", false);
		$this->db->from("
			lic_tramite l
		");
		$this->db->like("l.tra_est_dire", $act);
		$this->db->group_by("l.tra_est_dire");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	function get_representantes($txt)
	{
		$this->db->select("l.tra_rep_nom as elem", false);
		$this->db->from("
			lic_tramite l
		");
		$this->db->like("l.tra_rep_nom", $txt);
		$this->db->group_by("l.tra_rep_nom");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	function get_conceptos_boletas($like = false)
	{
		$this->db->select("a.bol_concepto as opcion", false);
		$this->db->from("
			act_boletas a
		");
		if ($like != false) {
			$this->db->like("a.bol_concepto", $like);
		}
		$this->db->group_by("a.bol_concepto");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	/*****************************************************************************************************/
	function get_comerciantes($dato)
	{
		$query = "
			select
				c.*,
				m.*
			from
				mer_comerciantes c,
				mer_mercados m
			where
				c.mer_ide = m.mer_ide
				and
				(
					c.com_nro_puesto like '%$dato%'
					or
					c.com_datos like '%$dato%'
					or
					c.com_dni like '%$dato%'
				)
			order by
				c.mer_ide
		";
		$query = $this->db->query($query);
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	function get_boleta_anual($ord_ide)
	{
		$this->db->select("
			*
		", false);
		$this->db->from("
			mer_orden_pago o,
			mer_comerciantes c,
			mer_mercados m
		");
		$this->db->where("o.ord_ide", $ord_ide);
		$this->db->where("o.com_ide = c.com_ide");
		$this->db->where("c.mer_ide = m.mer_ide");
		$this->db->where("o.ord_tipo_pago = 'ANUAL'");
		$this->db->where("o.ord_estado = 'GENERADO'");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	function get_boleta_mensual($ord_ide)
	{
		$this->db->select("
			*
		", false);
		$this->db->from("
			mer_orden_pago o,
			mer_comerciantes c,
			mer_mercados m
		");
		$this->db->where("o.ord_ide", $ord_ide);
		$this->db->where("o.com_ide = c.com_ide");
		$this->db->where("c.mer_ide = m.mer_ide");
		$this->db->where("o.ord_tipo_pago = 'MENSUAL'");
		$this->db->where("o.ord_estado = 'GENERADO'");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	function get_ultimo_pago_mensual($com_ide)
	{
		$this->db->select("
			*
		", false);
		$this->db->from("
			mer_recaudacion r
		");
		$this->db->where("r.com_ide", $com_ide);
		$this->db->order_by("r.rec_anio desc,rec_mes desc");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	function get_ultimo_pago_anual($com_ide)
	{
		$this->db->select("
			*
		", false);
		$this->db->from("
			mer_alquileres a
		");
		$this->db->where("a.com_ide", $com_ide);
		$this->db->order_by("a.alq_anio desc");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	function get_anio_mes_actual()
	{
		$this->db->select("
			year(now()) as anio,month(now()) as mes
		", false);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	function get_monto_comer($com_ide)
	{
		$this->db->select("
			c.com_pago
		", false);
		$this->db->from("
			mer_comerciantes c
		");
		$this->db->where("c.com_ide", $com_ide);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	function get_cuentas_anual($mer_ide)
	{
		$this->db->select("
			a.com_ide,
			c.com_datos,
			concat('MERCADO ',m.mer_nombre) as mercado,
			concat(c.com_tipo_puesto,' ',c.com_nro_puesto) as puesto,
			c.com_negocio,
			m.mer_tipo_pago,
			concat(min(alq_anio),' - ',max(alq_anio)) as pagado,
			if(year(now()) = max(alq_anio),' - ',if(year(now())-1 = max(alq_anio),year(now()),concat(max(alq_anio)+1,' - ',year(now())))) as debe
		", false);
		$this->db->from("
			mer_alquileres a,
			mer_comerciantes c,
			mer_mercados m
		");
		$this->db->where("a.com_ide = c.com_ide");
		$this->db->where("c.mer_ide = m.mer_ide");
		$this->db->where("m.mer_ide", $mer_ide);
		$this->db->group_by("a.com_ide");
		$this->db->order_by("c.com_datos");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	function get_cuentas_mensual($mer_ide)
	{
		$this->db->select("
			r.com_ide,
			c.com_datos,
			concat('MERCADO ',m.mer_nombre) as mercado,
			concat(c.com_tipo_puesto,' ',c.com_nro_puesto) as puesto,
			c.com_negocio,
			m.mer_tipo_pago,
			concat(
				if((min(r.rec_anio*12+r.rec_mes)%12)=0,12,min(r.rec_anio*12+r.rec_mes)%12),
				'/',
				if((min(r.rec_anio*12+r.rec_mes)%12)=0,
					round((min(r.rec_anio*12+r.rec_mes)-min(r.rec_anio*12+r.rec_mes)%12)/12,0)-1,
					round((min(r.rec_anio*12+r.rec_mes)-min(r.rec_anio*12+r.rec_mes)%12)/12,0)
				),
				' - ',
				if((max(r.rec_anio*12+r.rec_mes)%12)=0,12,max(r.rec_anio*12+r.rec_mes)%12),
				'/',
				if((max(r.rec_anio*12+r.rec_mes)%12)=0,
					round((max(r.rec_anio*12+r.rec_mes)-max(r.rec_anio*12+r.rec_mes)%12)/12,0)-1,
					round((max(r.rec_anio*12+r.rec_mes)-max(r.rec_anio*12+r.rec_mes)%12)/12,0)
				)
			) as pagado,
			
			concat(
				if(max(r.rec_anio*12+r.rec_mes) = (year(now())*12 + month(now())),
					' - ',
					if(max(r.rec_anio*12+r.rec_mes) = (year(now())*12 + month(now())-1),
						concat(
							month(now()),
							'/',
							year(now())
						),
						if((max(r.rec_anio*12+r.rec_mes)%12)=0,
							concat(
								1,
								'/',
								round((max(r.rec_anio*12+r.rec_mes)-max(r.rec_anio*12+r.rec_mes)%12)/12,0),
								' - ',
								month(now()),
								'/',
								year(now())
							),
							concat(
								max(r.rec_anio*12+r.rec_mes)%12+1,
								'/',
								round((max(r.rec_anio*12+r.rec_mes)-max(r.rec_anio*12+r.rec_mes)%12)/12,0),
								' - ',
								month(now()),
								'/',
								year(now())
							)
						)
					)
				)
			) as debe
		", false);
		$this->db->from("
			mer_recaudacion r,
			mer_comerciantes c,
			mer_mercados m
		");
		$this->db->where("r.com_ide = c.com_ide");
		$this->db->where("c.mer_ide = m.mer_ide");
		$this->db->where("m.mer_ide", $mer_ide);
		$this->db->group_by("r.com_ide");
		$this->db->order_by("c.com_datos");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	function get_titulares($titu)
	{
		$this->db->select("
			m.mer_nombre,
			c.*
		", false);
		$this->db->from("
			mer_comerciantes c,
			mer_mercados m
		");
		$this->db->where("c.mer_ide = m.mer_ide");
		$this->db->like("c.com_datos", $titu);
		$this->db->order_by("c.com_datos");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	function get_lic_tram()
	{
		$this->db->select("
			*
		", false);
		$this->db->from("
			lic_tramite
		");
		$this->db->where("tra_ide >= 9000");
		$this->db->order_by("tra_ide asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	public function get_enum($tabla, $campo)
	{
		$query = "SHOW COLUMNS FROM $tabla LIKE '$campo';";
		$query = $this->db->query($query);
		if ($query->num_rows() > 0) {
			$result = $query->result();
			$result = $result[0]->Type;
			$result = str_replace("enum", "", $result);
			$result = str_replace("(", "", $result);
			$result = str_replace(")", "", $result);
			$result = str_replace("'", "", $result);
			$valores = explode(",", $result);
			$cad = "";
			$len = count($valores);
			for ($i = 0; $i < $len; $i++) {
				if ($i == $len - 1) {
					$cad = $cad . $valores[$i] . ":" . $valores[$i];
				} else {
					$cad = $cad . $valores[$i] . ":" . $valores[$i] . ";";
				}
			}
			return $cad;
		}
		return "";
	}
}
