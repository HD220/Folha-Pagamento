<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public $page_title = "Dashboard";
    
    public function index() {
        $this->load->model('Usuario_model', 'usuario');
        $data = [
            'page_title' => $this->page_title,
            'usuario_count' => $this->usuario->ativos()
        ];
        $this->view('dashboard/index', $data);
    }
    
}
