<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Configuracao extends MY_Controller {

    public $page_title = "Configuracões";

    public function __construct() {
        parent::__construct();
        $this->load->model('Configuracao_model','configuracao');
    }
    
    public function index() {
        $this->listar();
    }
    
    public function listar($header = false) {

        $data = array(
            "header" => $header,
            "page_title" => $this->page_title,
            "page_subtitle" => "",
            "dados" => $this->configuracao->listar()
        );

        $this->view('configuracao/listar', $data);
    }
    
    public function novo() {
        return $this->view('configuracao/novo',array(),FALSE,TRUE);
    }
    
    public function editar($id) {
        $campos = $this->configuracao->ler($id);
        return $this->view('configuracao/editar',$campos,FALSE,TRUE);
        
    }

    public function salvar() {
                
        if(is_array($this->input->post('novo'))){
            $this->configuracao->save($this->input->post('novo'));
        }
        
        if (is_array($this->input->post('alterar'))) {
            $this->configuracao->update($this->input->post('alterar'));
        } else {
            $this->session->set_flashdata("form_error", "<div class='alert alert-warning' role='alert'>Não foi possivel salvar</div>");
        }
       
    }
    

}
