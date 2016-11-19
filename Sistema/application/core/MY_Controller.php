<?php
class MY_Controller extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Empresa_model','empSessao');
    }
    
    function view($view, $vars = array(),$header= TRUE,$return = FALSE) {
        $vars['empresas'] = $this->empSessao->get_dropdown();
        $logado = ($this->session->userdata("usuario"))?"_logado":"";
                
        ($return)?ob_start():null; 
        
        if($header){
            $this->load->view('layout/header'.$logado,$vars);
        }
        $this->load->view($view,$vars);
        if($header){
            $this->load->view('layout/footer',$vars);
        }
        if($return){
            $content = ob_get_contents();
            ob_end_clean();
        }
        return (isset($content))?$content:"";
    }
    
    public function _remap($method = "",$var=""){
        if(!$this->session->userdata("usuario") && $method !== "login"){
            redirect("home");
        }else{
            $this->$method(isset($var[0])?$var[0]:$var,isset($var[1])?$var[1]:$var);
        }
    }
    
}