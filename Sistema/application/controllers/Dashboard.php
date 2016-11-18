<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public $page_title = "Dashboard";
    
    public function index() {
		$this->load->model('Empresa_model', 'empresa');
        $data = [
            'page_title' => $this->page_title,
			'empresas' => $this->empresa->get_dropdown()
        ];
        $this->view('dashboard/index', $data);
    }
    
}
