<?php
class Conexao
{
    private $nomeservidor = "localhost";
    private $usuario = "Debaby";
    private $senha = "Aloc@12345";
    private $banco = "bisa_teste";
    public function getConnection()
    {
        $conn =  new mysqli($this->nomeservidor, $this->usuario, $this->senha, $this->banco);
        if ($conn->connect_error) {
            die("Failed to connect");
        }
        return $conn;
    }
}
