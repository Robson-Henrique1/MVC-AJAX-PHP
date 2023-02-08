<?php
require '../config/conexao.php';
class SaidaModel
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
        $sql = "INSERT INTO Saidas (id_saida,id_tipo_saida,descricao,data_hora_saida) VALUES ($id,$id_tipo,'$descricao','$date')";
        mysqli_query($this->conexao, $sql);
        return true;
        
    }
    public function listarModel()
    {
        $sql = "SELECT Saidas.id_saida,Tipos_Saida.id_tipo_saida, Tipos_Saida.nome, Saidas.descricao, Saidas.data_hora_saida
        FROM Saidas
        INNER JOIN Tipos_Saidas
        ON Saidas.id_tipo_saida = Tipos_Saida.id_tipo_saida;";
        $result = mysqli_query($this->conexao, $sql);
        return  mysqli_fetch_all($result);
    }
    public function deletarModel($id)
    {
        $query = "DELETE FROM saidas WHERE id_saida = $id";
        mysqli_query($this->conexao, $query);
        return true;
    }
    public function editarModel($id,$id2,$descricao,$date)
    {
        $query = "UPDATE saidas SET id_tipo_saida = '$id2',descricao = $descricao, data_hora_saida = $date  WHERE id_saida = $id";
        mysqli_query($this->conexao, $query);
        return true;
    }
}
