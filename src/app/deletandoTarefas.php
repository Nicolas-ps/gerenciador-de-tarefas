<?php

require_once("errosServ.php");
require_once("database/conexaoBD.php");

$index = filter_input(INPUT_GET, 'index');

if(isset($index)){
    $sql = "DELETE FROM TAREFAS WHERE ID = $index";

    function deletaTarefa ($conexao, $sql){

        mysqli_select_db($conexao, 'usuario');
        
        $deletando = mysqli_query($conexao, $sql);

        header("Location: home.php");

    }

    deletaTarefa($conexao, $sql);
}

?>