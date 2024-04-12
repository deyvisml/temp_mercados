<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*MDOULO DE LICENCIAS*/
class Web extends CI_Controller {
	public function index(){
		$this->load->model("mgeneral");
		$roles=$this->mgeneral->get_roles();
		$data['menu'] = array();
		$i=0;
		if($roles!=false){
			foreach($roles as $rol){
				$data['menu'][$i++]=array('nom'=>$rol->rol_nom,'url'=>$rol->rol_func,'icon'=>$rol->rol_icono);
			}
		}
		$this->load->view('web/vheader',$data);
		$this->load->view('web/inicio');
		$this->load->view('web/vfooter');
	}
}
?>
