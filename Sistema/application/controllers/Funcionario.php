<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Funcionario extends MY_Controller {

    public $page_title = "Funcionario";

    public function __construct() {
        parent::__construct();
        $this->load->model('Funcionario_model','funcionario');
    }
    
    public function index() {
        $this->listar();
    }
    
    public function listar($header = false) {

        $data = array(
            "header" => $header,
            "page_title" => $this->page_title,
            "page_subtitle" => "",
            "dados" => $this->funcionario->listar()
        );

        $this->view('funcionario/listar', $data);
    }
    
    public function novo() {
        return $this->view('funcionario/novo',array(),FALSE,TRUE);
    }
    
    public function editar($id) {
        $campos = $this->funcionario->ler($id);
        return $this->view('funcionario/editar',$campos,FALSE,TRUE);
        
    }

    public function salvar() {
                
        if(is_array($this->input->post('novo'))){
            $this->funcionario->save($this->input->post('novo'));
        }
        
        if (is_array($this->input->post('alterar'))) {
            $this->funcionario->update($this->input->post('alterar'));
        } else {
            $this->session->set_flashdata("form_error", "<div class='alert alert-warning' role='alert'>Não foi possivel salvar</div>");
        }
       
    }
    

}
