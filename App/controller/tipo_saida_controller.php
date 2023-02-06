<?php
require '../model/tipo_saidas_model.php';

class TipoSaida
{
    private $tipoModel;
    public function __construct()
    {
        $this->tipoModel = new TipoSaidaModel();
    }
    public function salvarTipo()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $nomeTipo = $data['nome'];
        if (trim($nomeTipo) == null) {
            echo 'error nulo';
        } else if (is_numeric($nomeTipo)) {
            echo 'e numeros';
        } else if (strlen($nomeTipo) > 15) {
            echo 'error';
        } else {
            $resposta = $this->tipoModel->salvar($nomeTipo);
           $arrayz['nome'] = $data['nome'];
           $arrayz['id'] = $resposta;
           echo json_encode($arrayz);
           
        }

        // header("Location: http://localhost:3000/view/tipos/tipo_view.html#");
    }
    public function listarTipo()
    {
        $tipos = $this->tipoModel->listar();
        echo json_encode($tipos);
    }
    public function delet()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $del = $this->tipoModel->deletar($data['id']);
        $arrayz['id'] = $data['id'];
        $arrayz['status'] = $del;
        $arrayz['msg'] = "DELETEI";
        echo json_encode($arrayz);
    }
    public function editar(){
        $data = json_decode(file_get_contents('php://input'), true);
        $this->tipoModel->editar( $data['nome'],$data['id']);
        $arrayz['id'] = $data['id'];
        $arrayz['nome'] = $data['nome'];
        echo json_encode($arrayz);
    }
    
}
$funcao = $_GET['funcao'];
$classe = new TipoSaida();

$classe->$funcao();
