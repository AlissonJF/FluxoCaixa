<?php

class Cadastro extends Controller {

    function __construct() {
        parent::__construct();
        Auth::teste();
        $this->view->js = array('cadastro/js/cadastro.js');
    }
    
    function index() {
        $this->view->title = 'Identificação do Usuário';
		$this->view->render('header');
        $this->view->render('cadastro/index');
		$this->view->render('footer');
    }
     function ver()
    {
        $this->model->ver();
    }
}