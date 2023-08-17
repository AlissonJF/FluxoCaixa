<?php

class Cadastro_Model extends Model
{
    public function __construct(){
        
        parent::__construct();
        Auth::autentica([2]);
        Auth::autentica([3]);

    }

    public function ver()
    {
		$dados=array(':id' => $_POST['txtid']);
        $result = $this->db->select("SELECT count(*) as total FROM usuario
        WHERE id = :id",$dados);

        if($result[0]->total==0){

            $result = $this->db->insert('usuario',array('id'=>$_POST['txtid'],
            'nome'=>$_POST['txtnome'], 'senha'=>hash('sha256',$_POST['txtsenha']),
            'nivel'=>$_POST['txtnivel']));
            
        }
        
        $result= $this->db->select("SELECT id,nome,senha,nivel FROM usuario u 
        JOIN nivelusuario n ON
        n.codigo = u.nivel 
        where id=".$_POST['txtid']);
        $count = count($result);

        if ($count > 0) {
            // Cadastro
            Session::init();
            Session::set('nome', $result[0]->nome);
            Session::set('id', $result[0]->id);
            Session::set('senha',$result[0]->senha);
            Session::set('nivel',$result);
            echo("OK");
        } else {
            echo("Dados Incorretos.");
        }
        
    }
    
}