<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Escala extends MY_Controller {

    public $page_title = "Escalas";

    public function __construct() {
        parent::__construct();
        $this->load->model('Escala_model','escala');
    }
    
    public function index() {
        $this->listar();
    }
    
    public function listar($header = false) {

        $data = array(
            "header" => $header,
            "page_title" => $this->page_title,
            "page_subtitle" => "",
            "dados" => $this->escala->listar()
        );

        $this->view('escala/listar', $data);
    }
    
    public function novo() {
        return $this->view('escala/novo',array(),FALSE,TRUE);
    }
    
    public function editar($id) {
        $campos = $this->escala->ler($id);
        return $this->view('escala/editar',$campos,FALSE,TRUE);
        
    }

    public function salvar() {
                
        if(is_array($this->input->post('novo'))){
            $this->escala->save($this->input->post('novo'));
        }
        
        if (is_array($this->input->post('alterar'))) {
            $this->escala->update($this->input->post('alterar'));
        } else {
            $this->session->set_flashdata("form_error", "<div class='alert alert-warning' role='alert'>Não foi possivel salvar</div>");
        }
       
    }
    

}
