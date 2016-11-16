<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Turno extends MY_Controller {

    public $page_title = "Turnos";

    public function __construct() {
        parent::__construct();
        $this->load->model('Turno_model','turno');
    }
    
    public function index() {
        $this->listar();
    }
    
    public function listar($header = false) {

        $data = array(
            "header" => $header,
            "page_title" => $this->page_title,
            "page_subtitle" => "",
            "dados" => $this->turno->listar()
        );

        $this->view('turno/listar', $data);
    }
    
    public function novo() {
        return $this->view('turno/novo',array(),FALSE,TRUE);
    }
    
    public function editar($id) {
        $campos = $this->turno->ler($id);
        return $this->view('turno/editar',$campos,FALSE,TRUE);
        
    }

    public function salvar() {
                
        if(is_array($this->input->post('novo'))){
            $this->turno->save($this->input->post('novo'));
        }
        
        if (is_array($this->input->post('alterar'))) {
            $this->turno->update($this->input->post('alterar'));
        } else {
            $this->session->set_flashdata("form_error", "<div class='alert alert-warning' role='alert'>Não foi possivel salvar</div>");
        }
       
    }
    

}
