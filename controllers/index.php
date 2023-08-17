<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        Auth::autentica(['']);
    }
    
    function index() {
        $this->view->title = 'Página Inicial';
		$this->view->render('header');
        $this->view->render('index/index');
		$this->view->render('footer');
    }
    
}