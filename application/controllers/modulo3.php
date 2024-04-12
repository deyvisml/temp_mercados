<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Modulo3 extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata("10g!n")!="s3esmun1pun0"){
			$this->load->view("session_expire");
		}
		$this->load->model("mgeneral");
	}
	public function index(){
		$result=$this->mgeneral->get_lic_tram();
		$cont=10001;
		foreach($result as $reg){
			if($reg->tra_ide!=$cont){
				echo $cont."<br>";
				$cont++;
			}
			$cont++;
		}
	}
	
}
?>