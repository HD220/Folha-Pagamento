<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Escala extends MY_Controller {

    public $page_title = "Escalas";
    public $empresas = array();

    public function __construct() {
        parent::__construct();
        $this->load->model('Escala_model', 'escala');
    }

    public function index() {
        $this->listar();
    }

    public function listar($header = false) {
        
        $this->load->library('calendar',[
            'template' => LAYOUTCALENDARIO,
            'month_type'   => 'long',
            'day_type'     => 'long',
            'show_other_days' => TRUE
            ]);


        $data = [
            "header" => $header,
            "page_title" => $this->page_title,
            "page_subtitle" => "",
            "calendario" => $this->calendar->generate(date("Y"), date("m")),
            "dados" => $this->escala->listar($this->session->userdata('empresa')['ID'], $this->input->post("mes"), $this->input->post("ano"))
        ];


        if ($this->input->post('flativo')) {
            $this->view('escala/lista', $data, FALSE);
        } else {
            $this->view('escala/listar', $data);
        }
    }

    public function novo($data = NULL) {

        return $this->view('escala/novo', array("data" => $data), FALSE);
    }

    public function editar($data) {
        $campos = ['escala' => $this->escala->ler($this->session->userdata('empresa')['ID'],$data)];
        return $this->view('escala/editar', $campos, FALSE);
    }

    public function salvar() {

        $var = $this->input->post();
        unset($var['form']);
        $var['IDEMPRESA'] = $this->session->userdata('empresa')['ID'];
        if ($this->input->post('form') == "Salvar") {
            $this->escala->update($var);
        } else {
            $this->escala->save($var);
        }
        $this->session->set_flashdata("error", "<div class='alert alert-success' role='alert'>Registro salvo com sucesso.</div>");
        redirect('cargo');
    }

}
