<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('login/js/login.js');
    }
    
    function index() {
        $this->view->title = 'Identificação do Usuário';
		$this->view->render('header');
        $this->view->render('login/index');
		$this->view->render('footer');
    }
    
    function ver()
    {
        $this->model->ver();
    }
    
    function verificaPermissao()
    {
        @session_start();
        echo($_SESSION['nivel'][0]->nivel);
    }
}