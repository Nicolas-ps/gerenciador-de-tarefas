<?php

define("SERVIDOR", "localhost");
define("USUARIO", "root");

global $conexao;
$conexao = mysqli_connect(SERVIDOR, USUARIO, "16814532");

if(!$conexao){
    echo mysqli_connect_error();
    die();
}


?>