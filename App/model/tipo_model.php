<?php
require '../config/conexao.php';
class TipoModel
{
    private $conexao;
    public function __construct()
    {
        $this->conexao = new Conexao();
    }
    public function salvar($nome)
    {
        $sql = "INSERT INTO tipos (name) VALUES ('$nome')";
        $result = mysqli_query($this->conexao->getConnection(), $sql);
        return $result;
    }
    public function listar()
    {
        $sql = "SELECT * FROM tipos";
        $result = mysqli_query($this->conexao->getConnection(), $sql);
        return  mysqli_fetch_all($result);
    }
    public function deletar($id)
    {
        $query = "DELETE FROM tipos WHERE id = $id";
        mysqli_query($this->conexao->getConnection(), $query);
        return true;
    }
    
}
