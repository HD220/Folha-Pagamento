<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Escala extends MY_Controller {

    public $page_title = "Escala de folgas";
    public $empresas = array();

    public function __construct() {
        parent::__construct();
        $this->load->model('Escala_model', 'escala');
    }

    public function index() {
        $this->listar();
    }

    public function listar($header = false) {
        
        $mesano = ($this->input->post("mesano"))?$this->input->post("mesano"):date("m/Y");
        
        list($mes,$ano) = explode("/", $mesano);
        
        $search = [
            'IDEMPRESA' => $this->session->userdata('empresa')['ID'], 
            'SEMANA'    => $this->input->post("semana"), 
            'MES'       => $mes, 
            'ANO'       => $ano
        ];
        
        
        $data = [
            "header" => $header,
            "page_title" => $this->page_title,
            "page_subtitle" => "",
            "dados" => $this->escala->listar($search['IDEMPRESA'], $search['SEMANA'],$search['MES'], $search['ANO']),
            "folga" => $this->escala->folga_semana_domingo($search['IDEMPRESA'], $search['SEMANA'],$search['MES'], $search['ANO'])
        ];


        if ($this->input->post('jquery')) {
            $this->view('escala/lista', $data, FALSE);
        } else {
            $this->view('escala/listar', $data);
        }
    }

    public function novo($data = NULL) {
        $this->load->model("Funcionario_model", "func");

        $dados = [
            "data" => ($data) ? $data : date("Y-m-d")
        ];

        $funcionarios = $this->func->get_dropdown($this->session->userdata('empresa')['ID']);

        $dados['funcionarios'] = $funcionarios;

        return $this->view('escala/novo', $dados, FALSE);
    }

    public function editar($idfolgante, $idfolguista, $data) {
        $this->load->model("Funcionario_model", "func");
        $funcionarios = $this->func->get_dropdown($this->session->userdata('empresa')['ID']);
        $campos = ['escala' => $this->escala->ler($this->session->userdata('empresa')['ID'], str_replace("_", "-", $data), $idfolgante, $idfolguista),
            'funcionarios' => $funcionarios];
        return $this->view('escala/editar', $campos, FALSE);
    }

    public function deletar($idfolgante, $idfolguista, $data) {
        $this->escala->deletar(
                $this->session->userdata('empresa')['ID'], 
                str_replace("_", "-", $data),
                $idfolgante, 
                $idfolguista);
        
    }

    public function salvar() {

        $var = $this->input->post();
        unset($var['form']);
        $var['IDEMPRESA'] = $this->session->userdata('empresa')['ID'];
        if ($this->input->post('form') == "Salvar") {
            $return = $this->escala->update($var);
        } else {
            $return = $this->escala->save($var);
        }
        if ($return !== TRUE) {
            $this->session->set_flashdata("error", "<div class='alert alert-danger' role='alert'>$return".var_dump($return)."</div>");
        } else {
            $this->session->set_flashdata("error", "<div class='alert alert-success' role='alert'>Folga adicionada</div>");
        }
        redirect('escala');
    }

    public function imprimir($semana,$mes,$ano) {
        $idempresa = $this->session->userdata('empresa')['ID'];
        $escalas = $this->escala->imprimir($idempresa, $semana,$mes, $ano);
        
        $inicio = str_replace('-','/',($escalas['diassemana'][0]));
        $fim    = str_replace('-','/',($escalas['diassemana'][6]));

        $data = [
            "page_title" => "Escala de folgas de $inicio á $fim",
            "escala" => $escalas
            ];
        $this->view('escala/escala', $data);
    }
}
