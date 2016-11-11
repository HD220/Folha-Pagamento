<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends MY_Controller {

    public $page_title = "Empresa";

    public function __construct() {
        parent::__construct();
        $this->load->model('Empresa_model','empresa');
    }
    
    public function index() {

        $this->listar();
    }
    
    public function listar($header = false) {

        $data = array(
            "header" => $header,
            "page_title" => $this->page_title,
            "page_subtitle" => "",
            "dados" => $this->empresa->listar()
        );

        $this->view('empresa/index', $data);
    }

    public function salvar() {
                
        if(is_array($this->input->post('novo'))){
            $this->empresa->save_list($this->input->post('novo'));
        }
        
        if (is_array($this->input->post('dados'))) {
            $this->empresa->update_list($this->input->post('dados'));
        } else {
            $this->session->set_flashdata("form_error", "<div class='alert alert-warning' role='alert'>Não foi possivel salvar</div>");
        }
       
        redirect('empresa');
    }
    

}
