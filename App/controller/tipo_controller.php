<?php
require '../model/tipo_model.php';

Class Tipo{
    private $tipoModel;
    public function __construct() {
        $this->tipoModel = new TipoModel();
    }
    public function salvarTipo(){
        $nomeTipo = $_POST['nome'];
        if(trim($nomeTipo) == null){
            echo 'error nulo';
        }else if (is_numeric($nomeTipo) ){
                echo 'e numeros';
        }else if(strlen($nomeTipo) > 15){
            echo 'error';
        }else{
            $this->tipoModel->salvar($nomeTipo);
        }
       
        header("Location: http://localhost:3000/view/tipos/tipo_view.html#");

    }
    public function listarTipo(){
        $tipos = $this->tipoModel->listar();
        echo json_encode($tipos);
    }
    public function delet(){
        $data = json_decode(file_get_contents('php://input'), true);
       $del= $this->tipoModel->deletar($data['id']);
       echo json_encode($del);
    }
}
$funcao = $_GET['funcao'];
$classe = new Tipo();

$classe->$funcao();