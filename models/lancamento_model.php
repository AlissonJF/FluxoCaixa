<?php

class Lancamento_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
	public function listaLanc() 
    {  
        $sql="SELECT
                t2.descricao AS tipodesc,
                t.descricao AS fluxodesc,
                l.sequencia,
                DATE_FORMAT(l.data, '%d/%m/%Y') AS data,
                tipo,
                valor,
                fluxo,
                obs
            FROM
                lancamento l
            JOIN tipofluxo t ON
                l.fluxo = t.codigo
            JOIN tipolancamento t2 ON
                l.tipo = t2.sequencia
            ORDER BY
                sequencia";
        $result=$this->db->select($sql);
		echo(json_encode($result));
    }
    
    public function v1()
    {

        $sql = "SELECT sequencia AS tipo, 
        descricao AS tipodesc FROM tipolancamento";
        $result=$this->db->select($sql);
		echo(json_encode($result));

    }
    
    public function v2()
    {

        $sql = "SELECT codigo AS fluxo, 
        descricao AS fluxodesc FROM tipofluxo";
        $result=$this->db->select($sql);
		echo(json_encode($result));

    }

    public function insert() 
    {
        $x=file_get_contents('php://input');
        $x=json_decode($x);
        $tipo=$x->txttipo;
        $valor=$x->txtvalor;
        $fluxo=$x->txtfluxo;
        $obs=$x->txtobs;
        
        $result=$this->db->insert('lancamento', array('data'=>date('Y-m-d'),
        'tipo'=>$tipo,
        'valor'=>$valor,
        'fluxo'=>$fluxo,
        'obs'=>$obs));
        if($result){
            $msg=array("sequencia"=>1,"texto"=>"Registro inserido com sucesso.");
        }
        else{
            $msg=array("sequencia"=>0,"texto"=>"Erro ao inserir.");
        }
        echo(json_encode($msg));
    }
	
	public function del() 
    {  
        
		//o sequencia deve ser um inteiro
        $seq=(int)$_GET['id'];
        $msg=array("sequencia"=>0,"texto"=>"Erro ao excluir.");
		if($seq>0){                     
            $result=$this->db->delete('lancamento',"sequencia='$seq'");
            if($result){
                $msg=array("sequencia"=>1,"texto"=>"Registro excluído com sucesso.");
            }
        }
        echo(json_encode($msg));        
	}
	
	public function loadData($id) 
    {  
		//o sequencia deve ser um inteiro
		$cod=(int)$id;
        $result=$this->db->select('SELECT t2.descricao AS tipodesc,
        t.descricao AS fluxodesc,
        l.sequencia,
        DATE_FORMAT(l.data, "%d/%m/%Y") as data,
        tipo, valor,fluxo,obs
        FROM lancamento l 
        JOIN tipofluxo t ON
        l.fluxo = t.codigo 
        JOIN tipolancamento t2 ON
        l.tipo = t2.sequencia
        where l.sequencia=:cod',array(":cod"=>$cod));
		$result = json_encode($result);
		echo($result);
	}
	
	
	public function save() 
    {
        $x=file_get_contents('php://input');
        $x=json_decode($x);
        $seq=$x->hdnseq;
        $tipo=$x->txttipo;
        $valor=$x->txtvalor;
        $fluxo=$x->txtfluxo;
        $obs=$x->txtobs;
        $msg=array("sequencia"=>0,"texto"=>"Erro ao atualizar.");
		if($seq>0){
                $dadosSave=array('tipo'=>$tipo,'valor'=>$valor,'fluxo'=>$fluxo,'obs'=>$obs);
                        
            $result=$this->db->update('lancamento', $dadosSave,"sequencia='$seq'");
            if($result){
                    $msg=array("sequencia"=>1,"texto"=>"Registro atualizado com sucesso.");
                }
        }
        echo(json_encode($msg));
	   
    }

    //----------------------- Relatório -----------------------

    public function listaRel()
    {
        $l=file_get_contents('php://input');
        $l=json_decode($l);

        $sql='SELECT DATE_FORMAT(data, "%d/%m/%Y") AS dataRel,valor AS valorRel FROM lancamento l ';
        $result=$this->db->select($sql);
        echo(json_encode($result));
    }

    public function busca()
    {
        $x=file_get_contents('php://input');
        $x=json_decode($x);
        $date=$x->txtdate;
        $date2=$x->txtdate2;
        $sql = 'SELECT DATE_FORMAT(data, "%d/%m/%Y") AS dataRel,
        sum(l.valor) AS valorRel,
        (
            SELECT sum(valor) 
            FROM lancamento 
            WHERE data >= str_to_date("'.$date.'","%Y-%m-%d") 
            AND data <= str_to_date("'.$date2.'","%Y-%m-%d")
        )AS total
        FROM lancamento l
        WHERE data >= str_to_date("'.$date.'","%Y-%m-%d") 
        AND data <= str_to_date("'.$date2.'","%Y-%m-%d")
        GROUP BY l.data';
        $result = $this->db->select($sql);

        if ($date > 0 && $date2 > 0) {
            echo(json_encode($result));
        }
    }

}