<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
	public function index($res="ok"){
		$this->load->view('login/header');
		$this->load->view('login/login',array('res'=>$res));
		$this->load->view('login/footer');
	}
	public function ingresar(){
		$where=array(
			"usu_login"=>$_POST["login"],
			"usu_clave"=>$_POST["clave"],
			"usu_estado"=>"A"
		);
		$this->load->model("mgeneral");
		$result=$this->mgeneral->login($where);
		if($result==false){
			redirect(site_url("login/index/".md5("false")));
		}
		else{
			$session=array(
				"10g!n"=>"s3esmun1pun0",
				"usu_ide"=>$result[0]->usu_ide,
				"usu_nomb"=>$result[0]->usu_nomb,
				"usu_ape"=>$result[0]->usu_ape,
				"ofi_nombre"=>$result[0]->ofi_nombre,
			);
			$this->session->set_userdata($session);
			redirect(site_url("modulo1"));
		}
	}
	public function usuarios(){
		$where=array(
			"usu_login"=>"internet",
			"usu_clave"=>"internet",
			"usu_estado"=>"A"
		);
		$this->load->model("mgeneral");
		$result=$this->mgeneral->login($where);
		if($result==false){
			redirect(site_url("login/index/".md5("false")));
		}
		else{
			$session=array(
				"10g!n"=>"s3esmun1pun0",
				"usu_ide"=>$result[0]->usu_ide,
				"usu_nomb"=>$result[0]->usu_nomb,
				"usu_ape"=>$result[0]->usu_ape,
				"ofi_nombre"=>$result[0]->ofi_nombre,
			);
			$this->session->set_userdata($session);
			redirect(site_url("modulo1"));
		}
	}
}
?>