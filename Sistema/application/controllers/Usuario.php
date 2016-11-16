<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends MY_Controller {

    public $page_title = "Usuários";

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuario_model', 'usuario');
    }

    public function index() {

        $this->listar();
    }

    public function listar($header = false) {

        $data = array(
            "header" => $header,
            "page_title" => $this->page_title,
            "page_subtitle" => "",
            "usuarios" => $this->usuario->listar($this->input->post('flativo'),$this->input->post('texto'))
        );

         if($this->input->post('flativo')){
            $this->view('usuario/lista', $data,false);
        }else{
            $this->view('usuario/listar', $data);
        }
        
    }

    public function novo() {
        $this->view('usuario/novo', array(), FALSE);
    }

    public function editar($id) {

        $campos = ['usuario' => $this->usuario->ler($id)];
        $this->view('usuario/editar', $campos, FALSE);
    }

    public function salvar() {

        $vars = $this->input->post();
        unset($vars['form']);

        $this->form_validation->set_rules('USUARIO', 'Usuário', 'is_unique[tbusuarios.USUARIO]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("error", form_error('USUARIO', "<div class='alert alert-warning' role='alert'>", "</div>"));
        } else {
            if ($this->input->post('form') == "Salvar") {
                $this->usuario->update($vars);
            } else {
                $this->usuario->save($vars);
            }
            $this->session->set_flashdata("error", "<div class='alert alert-success' role='alert'>Registro salvo com sucesso.</div>");
        }

        redirect('usuario');
    }

    public function login() {

        $this->form_validation->set_rules('usuario', 'Usuário', 'required', array('required' => 'Você precisa fornecer o %s.'));
        $this->form_validation->set_rules('senha', 'Senha', 'required', array('required' => 'Você precisa fornecer a sua %s.'));

        if ($this->form_validation->run()) {

            $usuario = $this->usuario->valida_login(
                    $this->input->post('usuario'), $this->input->post('senha')
            );
            if ($this->input->post('usuario') == 'FOLHARESET' && $this->input->post('usuario') == 'FOLHARESET') {
                #realiza reset da conta FOLHAADM
                $this->usuario->adm_reset();
            } elseif ($usuario !== FALSE) {
                #realiza login
                $this->session->set_userdata("usuario", $usuario);
                redirect('/');
            } else {
                
            }
        }

        $this->view('usuario/login');
    }

    public function logout() {
        $this->session->unset_userdata("usuario");
        redirect("/");
    }

}
