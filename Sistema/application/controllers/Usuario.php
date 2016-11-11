<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends MY_Controller {

    public $page_title = "Usuários";

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuario_model','usuario');
    }
    
    public function index() {

        $this->listar();
    }
    
    public function listar($header = false) {

        $data = array(
            "header" => $header,
            "page_title" => $this->page_title,
            "page_subtitle" => "",
            "usuarios" => $this->usuario->listar()
        );

        $this->view('usuario/index', $data);
    }

    public function salvar() {
                
        if(is_array($this->input->post('novo'))){
            $this->usuario->save_list($this->input->post('novo'));
        }
        
        if (is_array($this->input->post('usuario'))) {
            $this->usuario->update_list($this->input->post('usuario'));
        } else {
            $this->session->set_flashdata("form_error", "<div class='alert alert-warning' role='alert'>Não foi possivel salvar</div>");
        }
       
        redirect('usuario');
    }
    
    public function login() {
        
        $this->form_validation->set_rules('usuario', 'Usuário', 'required', array('required' => 'Você precisa fornecer o %s.'));
        $this->form_validation->set_rules('senha', 'Senha', 'required', array('required' => 'Você precisa fornecer a sua %s.'));
        
        if($this->form_validation->run()){
            
            $usuario = $this->usuario->valida_login(
                $this->input->post('usuario'), 
                $this->input->post('senha')
            );
            var_dump(md5($this->input->post('senha')));
            if( $this->input->post('usuario') == 'FOLHARESET' && $this->input->post('usuario') == 'FOLHARESET'){
                #realiza reset da conta FOLHAADM
                $this->usuario->adm_reset();
            }elseif ( $usuario !== FALSE ) {
                #realiza login
                $this->session->set_userdata("usuario", $usuario );
                redirect('/');
            }else{
                
            }
        }
        
        $this->view('usuario/login');
    }
    
    public function logout() {
        $this->session->unset_userdata("usuario");
        redirect("/");
    }

}
