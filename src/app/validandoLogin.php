<?php   

    //Chamado pro arquivo cadastrando.php
    require_once("database/conexaoBD.php");

    //Funções que configura o navegador para exibir os erros com status 500.
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 'On'); 
    error_reporting(E_ALL);

    //Recebe os valores dos campos de email e senha
    if($_POST){

        $email = filter_input(INPUT_POST, 'email');
        $senha = filter_input(INPUT_POST, 'senha');

    }

    //String contendo o código SQL que será injetado no banco de dados
    $sqlValidaLogin = "SELECT * FROM USUARIO WHERE EMAIL = '$email' AND SENHA = '$senha'";

    //Função que injeta o SQL no banco e verifica se há retorno
    function validaLogin ($conexao, $sql){

        mysqli_select_db($conexao, 'usuario');

        $validaLogin = mysqli_query($conexao, $sql);
        
        if(mysqli_fetch_assoc($validaLogin)){
            return true;
        }else{
            return false;
        }

    }

    $count = 0;
    if(empty($email) != false ){ $count++; }
    if(empty($senha) != false ){ $count++; }

    if($count == 0){
        if(validaLogin($conexao, $sqlValidaLogin) == true){
            header("Location: ../www/pages/home.php");
        }else{
            header("Location: ../../index.php?login=false");
        }  
    }else{
        header("Location: ../../index.php?vazio=true");
    }
 

?>