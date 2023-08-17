<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function ver()
    {
		$dados=array(':nome' => $_POST['txtnome'],':senha' => $_POST['txtsenha']);
        $result = $this->db->select("SELECT * FROM usuario 
        JOIN nivelusuario ON
        usuario.nivel = 
        nivelusuario.codigo
        WHERE nome = :nome AND senha = :senha",$dados);
        
        $count = count($result);

        if ($count > 0) {
            // login
            Session::init();
            Session::set('nome', $result[0]->nome);
            Session::set('id', $result[0]->id);
            Session::set('nivel',$result);
            echo("OK");
        } else {
            echo("Dados Incorretos.");
        }
        
    }
    
}