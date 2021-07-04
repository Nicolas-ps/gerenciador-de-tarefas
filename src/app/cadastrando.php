<?php  
    require_once("database/conexaoBD.php");

    //Funções que configura o navegador para exibir os erros com status 500.
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 'On'); 
    error_reporting(E_ALL);  

    //Recebendo os dados da variável $_POST
    if($_POST){
        $nome = filter_input(INPUT_POST, 'nome');
        $emailCadastro = filter_input(INPUT_POST, 'email');
        $senha = filter_input(INPUT_POST, 'senha');
        $senhaVerif = filter_input(INPUT_POST, 'senhaConfirmada');

        $count = 0;
        if(empty($nome) != false ){ $count++; }
        if(empty($emailCadastro) != false ){ $count++; }
        if(empty($senha) != false ){ $count++; }
        if(empty($senhaVerif) != false ){ $count++; }

    }

    $sqlDadosUsuario = "INSERT INTO USUARIO (NOME, EMAIL, SENHA) VALUES ('$nome', '$emailCadastro', '$senha')"; 

    //Função que insere os dados na tabela
    function insereDados (bool $confirmacao, $conexao,  $sql) {

        if($confirmacao == true){
            mysqli_select_db($conexao, 'usuario');

            $insereEmUsuario = mysqli_query($conexao, $sql);

            if($insereEmUsuario){
                echo "Dados Salvos!";
            }else{
                echo mysqli_error($conexao);
            }
        }
    }
    
    $sqlVerificaEmail = "SELECT * FROM USUARIO WHERE EMAIL = '$emailCadastro'";

    function verificaEmail ($conexao, $sql, $emailVerificando) {
        mysqli_select_db($conexao, 'usuario');

        $verificaEmUsuario = mysqli_query($conexao, $sql);

        if($verificaEmUsuario){
            echo mysqli_affected_rows($conexao);
        }else{
            echo mysqli_error($conexao);
        }

        if(mysqli_affected_rows($conexao) != 0){
            return true;
        }else{
            return false;
        }
    }

    if($count != 0){
        header("Location: ../www/pages/cadastro.php?vazio=true");
    
    }else{

        $emailExistente = verificaEmail($conexao, $sqlVerificaEmail, $emailCadastro);

        if($emailExistente == false){
            if($senha == $senhaVerif){
                $bool = true;
                insereDados($bool, $conexao, $sqlDadosUsuario);
                header("Location: ../../index.php?cadastrado=true");
            }else{
                header("Location: ../www/pages/cadastro.php?confirmado=false");
            }
        }else{
            header("Location: ../www/pages/cadastro.php?emailExistente=true");   
        }
    }    



?>