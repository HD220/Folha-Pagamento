<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public $page_title = "Módulos";

    public function index() {

        $data = array(
            "page_title" => $this->page_title,
        );
        $this->view('usuario/login', $data);
    }

    public function _remap($method = "", $var = "") {
        if ($this->session->userdata("usuario")) {
            redirect("dashboard");
        } else {
            $this->$method();
        }
    }

}
