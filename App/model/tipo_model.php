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
        $sql = "SELECT name FROM tipos";
        $result = mysqli_query($this->conexao->getConnection(), $sql);
        return  mysqli_fetch_all($result);
    }
}
