<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Turno extends MY_Controller {

    public $page_title = "Turnos";
    public $empresas = array();

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
            "dados" => $this->turno->listar($this->input->post('flativo'),$this->input->post('texto'),$this->session->userdata('empresa')['ID'])
        );
        
        if($this->input->post('flativo')){
            $this->view('turno/lista', $data, FALSE);
        }else{
            $this->view('turno/listar', $data);
        }
        
    }
    
    public function novo() {
        return $this->view('turno/novo',array(),FALSE);
    }
    
    public function editar($id,$idempresa) {
        $campos = ['turno' => $this->turno->ler($id,$idempresa)];
        return $this->view('turno/editar',$campos,FALSE);
        
    }

    public function salvar() {
                
        $var = $this->input->post();
        unset($var['form']);
        $var['IDEMPRESA'] = $this->session->userdata('empresa')['ID'];
        
        if ($this->input->post('form') == "Salvar") {
            $this->turno->update($var);
        }else {
            $this->turno->save($var);
        }
        $this->session->set_flashdata("error", "<div class='alert alert-success' role='alert'>Registro salvo com sucesso.</div>");
        redirect('turno');
    }
    

}
