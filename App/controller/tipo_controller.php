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
        }else{
            $this->tipoModel->salvar($nomeTipo);
        }
       
        header("Location: http://localhost:3000/view/tipos/tipo_view.php#");

    }
    public function listarTipo(){
        $tipos = $this->tipoModel->listar();
        echo json_encode($tipos);
    }
}
$funcao = $_GET['funcao'];
$classe = new Tipo();

$classe->$funcao();