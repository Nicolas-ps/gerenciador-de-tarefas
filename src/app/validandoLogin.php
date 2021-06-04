<?php   

    //Funções que configura o navegador para exibir os erros com status 500.
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 'On'); 
    error_reporting(E_ALL);

    if($_POST){

        global $login;

        $email = filter_input(INPUT_POST, 'email');
        $senha = filter_input(INPUT_POST, 'senha');

    }

    define('CAMINHO', '../../login.txt');
    $cadastros = explode("\n\n", file_get_contents(CAMINHO));
    $usuario = [];

    foreach($cadastros as $cadastro){
        array_push($usuario, explode("\n", $cadastro));
    }  

    $count = 0;

    $emailConfirmado = false;
    $senhaConfirmado = false;

    foreach($usuario as $dados){

        foreach($dados as $chave => $dado){

            if($chave == 1){

                if($dado == $email){
                    $emailConfirmado = true;
                }else{
                    $emailConfirmado = false;
                }

            }

            if($chave == 2){

                if($dado == $senha){
                    $senhaConfirmado = true;
                }else{
                    $senhaConfirmado = false;
                }
            }
        }
    }

    if($senhaConfirmado == true && $emailConfirmado == true){
        header("Location: ../www/pages/home.php");
    }else{
        header("Location: ../../index.php?login=false");
    }   

?>