<?php

class TipoLancamento extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('tipolancamento/tipolancamento.js');
    }
    
    function index() {
        $this->view->title = 'Tipos de Lancamentos';
		$this->view->render('header');
        $this->view->render('tipolancamento/index');
		$this->view->render('footer');
    }
     function addTipLanc()
    {
        $this->model->insert();
    }
    
	function listaTipLanc()
    {
        $this->model->listaTipLanc();
    }
	
	function del()
    {
        $this->model->del();
    }
	
	
	function loadData($id)
    {
        $this->model->loadData($id);
    }
	
	function save()
    {
        $this->model->save();
    }
}