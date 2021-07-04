<?php 

session_start();

echo "<pre>";
require_once("errosServ.php");
require_once("database/consultaBD.php");
require_once("database/conexaoBD.php");

if($_POST){
    global $titulo, $data, $status, $descricao;
    $titulo = filter_input(INPUT_POST, "titulo");
    $data = filter_input(INPUT_POST, "data");
    $status = filter_input(INPUT_POST, "status");
    $descricao = filter_input(INPUT_POST, "descricao");
} 

$sqlInsereTarefa = "INSERT INTO `TAREFAS` (`ID`, `TITULO`, `STAT`, `DESCRICAO`, `DATA_ENTREGA`, `ID_USUARIO`) VALUES (NULL, '$titulo', '$status', '$descricao', '$data', {$_SESSION['idUsuario']});";

function insereTarefa ($conexao, $sql) {

    mysqli_select_db($conexao, 'usuario');

    $insere = mysqli_query($conexao, $sql);

    return mysqli_affected_rows($conexao);
    
}


$insereTarefa = insereTarefa($conexao, $sqlInsereTarefa);

if($insereTarefa != 0){
    header("Location: ../www/pages/home.php");
}

?>