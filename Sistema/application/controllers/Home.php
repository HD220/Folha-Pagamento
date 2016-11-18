<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
    
    public $page_title = "Módulos";

    public function index() {
		$this->load->model('Empresa_model','empresa');
		
		$data = array(
			"page_title"=> $this->page_title,
			'empresas' => $this->empresa->get_dropdown()
		);
        $this->view('usuario/login',  $this->page_title);
    }
    
    public function _remap($method = "",$var = ""){
        if($this->session->userdata("usuario")){
            redirect("dashboard");
        }else{
            $this->$method();
        }
    }
    
}
