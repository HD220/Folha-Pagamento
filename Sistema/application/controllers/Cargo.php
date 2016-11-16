<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cargo extends MY_Controller {

    public $page_title = "Cargos";

    public function __construct() {
        parent::__construct();
        $this->load->model('Cargo_model','cargo');
    }
    
    public function index() {
        $this->listar();
    }
    
    public function listar($header = false) {

        $data = array(
            "header" => $header,
            "page_title" => $this->page_title,
            "page_subtitle" => "",
            "dados" => $this->cargo->listar()
        );

        $this->view('cargo/listar', $data);
    }
    
    public function novo() {
        return $this->view('cargo/novo',array(),FALSE,TRUE);
    }
    
    public function editar($id) {
        $campos = $this->cargo->ler($id);
        return $this->view('cargo/editar',$campos,FALSE,TRUE);
        
    }

    public function salvar() {
                
        if(is_array($this->input->post('novo'))){
            $this->cargo->save($this->input->post('novo'));
        }
        
        if (is_array($this->input->post('alterar'))) {
            $this->cargo->update($this->input->post('alterar'));
        } else {
            $this->session->set_flashdata("form_error", "<div class='alert alert-warning' role='alert'>Não foi possivel salvar</div>");
        }
       
    }
    

}
