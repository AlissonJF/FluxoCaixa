<?php

class Lancamento extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('lancamento/lancamento.js');
    }
    
    function index() {
        $this->view->title = 'Lancamentos';
		$this->view->render('header');
        $this->view->render('lancamento/index');
		$this->view->render('footer');
    }
     function addLanc()
    {
        $this->model->insert();
    }
    
	function listaLanc()
    {
        $this->model->listaLanc();
    }

    function v1()
    {
        $this->model->v1();
    }

    function v2()
    {
        $this->model->v2();
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
    
    // --------- Relatório -----------

    function addRel(){
        $this->model->insertRel();
    }

	function listaRel(){
        $this->model->listaRel();
    }
	
	function loadDataRel($id){
        $this->model->loadDataRel($id);
    }

    function busca(){
        $this->model->busca();
    }

}