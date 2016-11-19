<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Funcionario extends MY_Controller {

    public $page_title = "Funcionários";
    public $empresas = array();

    public function __construct() {
        parent::__construct();
        $this->load->model('Funcionario_model','funcionario');
        $this->load->model('Turno_model','turno');
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
            "dados" => $this->funcionario->listar($this->input->post('flativo'),$this->input->post('texto'),$this->session->userdata('empresa')['ID'])
        );
        
        if($this->input->post('flativo')){
            $this->view('funcionario/lista', $data, FALSE);
        }else{
            $this->view('funcionario/listar', $data);
        }
        
    }
    
    public function novo() {
        $campos = [
            'turnos' => $this->turno->get_dropdown($this->session->userdata('empresa')['ID']),
            'cargos' => $this->cargo->get_dropdown($this->session->userdata('empresa')['ID'])
         ];
        return $this->view('funcionario/novo',$campos,FALSE);
    }
    
    public function editar($id,$idempresa) {
        $campos = [
            'turnos' => $this->turno->get_dropdown($idempresa),
            'cargos' => $this->cargo->get_dropdown($idempresa),
            'funcionario' => $this->funcionario->ler($id,$idempresa),
        ];
        return $this->view('funcionario/editar',$campos,FALSE);
        
    }

    public function salvar() {
                
        $var = $this->input->post();
        unset($var['form']);
        $var['IDEMPRESA'] = $this->session->userdata('empresa')['ID'];
        
        if ($this->input->post('form') == "Salvar") {
            $this->funcionario->update($var);
        }else {
            $this->funcionario->save($var);
        }
        $this->session->set_flashdata("error", "<div class='alert alert-success' role='alert'>Registro salvo com sucesso.</div>");
        redirect('funcionario');
    }
    

}
