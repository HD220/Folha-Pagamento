<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public $page_title = "Dashboard";

    public function index() {

        $data = [
            'page_title' => $this->page_title
        ];
        $this->view('dashboard/index', $data);
    }

}
