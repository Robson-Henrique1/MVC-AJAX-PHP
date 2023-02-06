<?php
require '../config/conexao.php';
class EntradasModel
{
    private $conexaoInstance;
    private $conexao;
    public function __construct()
    {
        $this->conexaoInstance = new Conexao();
        $this->conexao = $this->conexaoInstance->getConnection();
    }
    public function salvarModel($id,$id_tipo,$descricao,$date)
    {
        $sql = "INSERT INTO Entradas (id_entrada,id_tipo_entrada,descricao,data_hora_entrada) VALUES ($id,$id_tipo,'$descricao','$date')";
        mysqli_query($this->conexao, $sql);
        return true;
        
    }
    public function listarModel()
    {
        $sql = "SELECT Entradas.id_entrada,Tipos_Entradas.id_tipo_entrada, Tipos_Entradas.nome, Entradas.descricao, Entradas.data_hora_entrada
        FROM Entradas
        INNER JOIN Tipos_Entradas
        ON Entradas.id_tipo_entrada = Tipos_Entradas.id_tipo_entrada;";
        $result = mysqli_query($this->conexao, $sql);
        return  mysqli_fetch_all($result);
    }
    public function deletarModel($id)
    {
        $query = "DELETE FROM entradas WHERE id_entrada = $id";
        mysqli_query($this->conexao, $query);
        return true;
    }
    public function editarModel($id,$id2,$descricao,$date)
    {
        $query = "UPDATE entradas SET id_tipo_entrada = '$id2',descricao = $descricao, data_hora_entrada = $date  WHERE id_entrada = $id";
        mysqli_query($this->conexao, $query);
        return true;
    }
}
