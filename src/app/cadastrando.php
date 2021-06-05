<?php   
    //Funções que configura o navegador para exibir os erros com status 500.
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 'On'); 
    error_reporting(E_ALL);  

    //Caminho para o arquivo de texto que servirá com arquivo fonte dos dados.
    define('CAMINHO', '../../login.txt');

    global $dados;

    if($_POST){
        

        $nome = filter_input(INPUT_POST, 'nome');
        $email = filter_input(INPUT_POST, 'email');
        $senha = filter_input(INPUT_POST, 'senha');
        $senhaConfirmada = filter_input(INPUT_POST, 'senhaConfirmada');
        $dados = "$nome\n$email\n$senha\n$senhaConfirmada\n\n";
    }

    function gravaDados (bool $confirmacao, $dados) {
        if($confirmacao = true){
            $arquivoAberto = fopen(CAMINHO, 'a');
            fwrite($arquivoAberto, $dados);
            fclose($arquivoAberto); 
        }
    }
    
    $count = 0;
    if(empty($nome) != false ){ $count++; }
    if(empty($email) != false ){ $count++; }
    if(empty($senha) != false ){ $count++; }
    if(empty($senhaConfirmada) != false ){ $count++; }

    if($count != 0){
        header("Location: ../www/pages/cadastro.php?vazio=true");
    }else{
        if($senha == $senhaConfirmada){
            $bool = true;
            gravaDados($bool, $dados);
            header("Location: ../../index.php?cadastrado=true");
        }else{
            header("Location: ../www/pages/cadastro.php?confirmado=false");
        }
    }
?>