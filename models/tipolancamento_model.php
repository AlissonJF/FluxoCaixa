<?php

class TipoLancamento_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
        Auth::autentica(['']);
    }

    public function listaTipLanc()
    {
        $sql = "select * from tipolancamento order by sequencia";
        $result = $this->db->select($sql);
        echo (json_encode($result));
    }


    public function insert()
    {
        $x = file_get_contents('php://input');
        $x = json_decode($x);
        $desc = $x->txtdesc;

        $result = $this->db->insert('tipolancamento', array('descricao' => $desc));
        if ($result) {
            $msg = array("sequencia" => 1, "texto" => "Registro inserido com sucesso.");
        } else {
            $msg = array("sequencia" => 0, "texto" => "Erro ao inserir.");
        }
        echo (json_encode($msg));
    }

    public function del()
    {

        //o sequencia deve ser um inteiro
        $seq = (int)$_GET['id'];
        $msg = array("sequencia" => 0, "texto" => "Erro ao excluir.");
        if ($seq > 0) {
            $result = $this->db->delete('tipolancamento', "sequencia='$seq'");
            if ($result) {
                $msg = array("sequencia" => 1, "texto" => "Registro excluído com sucesso.");
            }
        }
        echo (json_encode($msg));
    }

    public function loadData($id)
    {
        //o sequencia deve ser um inteiro
        $cod = (int)$id;
        $result = $this->db->select('select sequencia,descricao from fluxocaixa.tipolancamento where sequencia=:cod', array(":cod" => $cod));
        $result = json_encode($result);
        echo ($result);
    }


    public function save()
    {
        $x = file_get_contents('php://input');
        $x = json_decode($x);
        $seq = $x->txtseq;
        $desc = $x->txtdesc;
        $msg = array("sequencia" => 0, "texto" => "Erro ao atualizar.");
        if ($seq > 0) {
            $dadosSave = array('descricao' => $desc);

            $result = $this->db->update('tipolancamento', $dadosSave, "sequencia='$seq'");
            if ($result) {
                $msg = array("sequencia" => 1, "texto" => "Registro atualizado com sucesso.");
            }
        }
        echo (json_encode($msg));
    }
}
