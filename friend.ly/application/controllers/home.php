<?php

class Home extends CI_Controller{

    function __construct(){
        parent::__construct();
    }

    function index(){
        $this->load->library('session');
        $data['main'] = 'home';
        $this->load->view('includes/template', $data);
    }

    public function require_login(){
        $data['main'] = 'require_login';
        $this->load->view('includes/template', $data);
    }

}
