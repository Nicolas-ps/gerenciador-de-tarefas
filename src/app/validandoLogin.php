<?php   
    session_start();

    //Chamado pro arquivo
    require_once("errosServ.php");
    require_once("database/conexaoBD.php");
    require_once("database/consultaBD.php");

    //Recebe os valores dos campos de email e senha
    global $email;
    
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

            $_SESSION['login'] = $email;
            $_SESSION['senha'] = $senha;

            $sql = "SELECT ID FROM USUARIO WHERE EMAIL = '$email'";
            $Id_Usuario = consulta($conexao, $sql);
            $_SESSION['idUsuario'] = $Id_Usuario["ID"];

            header("Location: ../www/pages/home.php");

        }else{
            header("Location: ../../index.php?login=false");
        }  
    }else{
        header("Location: ../../index.php?vazio=true");
    }
?>