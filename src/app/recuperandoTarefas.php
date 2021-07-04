<?php
session_start();
$id_usuario = $_SESSION["idUsuario"];
require_once('database/conexaoBD.php');


$sql = "SELECT * FROM TAREFAS WHERE ID_USUARIO = $id_usuario";

function recuperaTarefa ($conexao, $sql) {

    mysqli_select_db($conexao, 'usuario');

    $insere = mysqli_query($conexao, $sql);

    return $insere;
}

$retornoTarefas = recuperaTarefa($conexao, $sql);

$tarefas = [];

while($tarefa = mysqli_fetch_assoc($retornoTarefas)){
    array_push($tarefas, $tarefa);
}

?>