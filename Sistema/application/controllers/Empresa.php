<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends MY_Controller {

    public $page_title = "Empresas";

    public function __construct() {
        parent::__construct();
        $this->load->model('Empresa_model', 'empresa');
    }

    public function index() {
        $this->listar();
    }

    public function listar() {

        $data = array(
            "page_title" => $this->page_title,
            "page_subtitle" => "",
            "dados" => $this->empresa->listar($this->input->post('flativo'), $this->input->post('texto'))
        );

        if ($this->input->post('flativo')) {
            $this->view('empresa/lista', $data, FALSE);
        } else {
            $this->view('empresa/listar', $data);
        }
    }

    public function novo() {
        $this->view('empresa/novo', array(), FALSE);
    }

    public function editar($id) {
        $campos = ['empresa' => $this->empresa->ler($id)];
        $this->view('empresa/editar', $campos, FALSE);
    }

    public function salvar() {
        $var = $this->input->post();
        unset($var['form']);

        if ($this->input->post('form') == "Salvar") {
            if ($this->empresa->update($var) !== TRUE) {
                $this->session->set_flashdata("error", "<div class='alert alert-danger' role='alert'>Ouve algum erro ao salvar</div>");
            }
        } else {
            if ($this->empresa->save($var) !== TRUE) {
                $this->session->set_flashdata("error", "<div class='alert alert-danger' role='alert'>Ouve algum erro ao salvar</div>");
            }
        }
        $this->session->set_flashdata("error", "<div class='alert alert-success' role='alert'>Registro salvo com sucesso.</div>");
        redirect('empresa');
    }

}
