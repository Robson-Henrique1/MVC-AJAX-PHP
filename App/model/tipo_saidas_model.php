<?php
require '../config/conexao.php';
class TipoSaidaModel
{
    private $conexaoInstance;
    private $conexao;
    public function __construct()
    {
        $this->conexaoInstance = new Conexao();
        $this->conexao = $this->conexaoInstance->getConnection();
    }
    public function salvar($nome)
    {
        $sql = "INSERT INTO tipos_saidas (nome) VALUES ('$nome')";
        mysqli_query($this->conexao, $sql);
        $id = mysqli_insert_id($this->conexao);
        return $id;
    }
    public function listar()
    {
        $sql = "SELECT * FROM tipos_saidas";
        $result = mysqli_query($this->conexao, $sql);
        return  mysqli_fetch_all($result);
    }
    public function deletar($id)
    {
        $query = "DELETE FROM tipos_saidas WHERE id_tipo_saida = $id";
        mysqli_query($this->conexao, $query);
        return true;
    }
    public function editar($nomeEditar,$id)
    {
        $query = "UPDATE tipos_saida SET nome = '$nomeEditar' WHERE id_tipo_saida = $id";
        mysqli_query($this->conexao, $query);
        return true;
    }
}
