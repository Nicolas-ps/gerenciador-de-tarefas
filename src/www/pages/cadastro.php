<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/css/global.css">
    <link rel="stylesheet" type="text/css" href="../styles/css/index.css">
    <link rel="stylesheet" type="text/css" href="../styles/css/cadastro.css">
    <title>A Hora!</title>
</head>
<body>
<div class="containerPrincipal">

<div class="containerApresentacao">
    <div class="subcontainerApresentacao">
        <div class="apresentacao">
            <div class="titulo">
                Seja bem vindo ao Hora!
            </div>
            <div class="textos">
                <div class="texto">
                    O Hora! é uma plataforma de gerenciamento de tarefas online simples e dinâmica. Aqui você faz seu controle de tarefas e pendências sem complicacões. Com alguns cliques, uma nota de texto e <i>voilà</i>, a tarefa foi adicionada à sua lista!
                </div>
                <div class="texto">
                    O Hora! é uma plataforma de gerenciamento de tarefas online simples e dinâmica. Aqui você faz seu controle de tarefas e pendências sem complicacões. Com alguns cliques, uma nota de texto e <i>voilà</i>, a tarefa foi adicionada à sua lista!
                </div>
            </div>
        </div>
    </div>
</div>

<div class="containerLogin">
    <div class="containerLogo">
            <div class="logo">
                <img src="../../../public/img/logo-hora-removebg.png" alt="Logo do Hora!">
            </div>
            <div class="logomarca">
                <img src="../../../public/img/logo-texto-ssimbol-removebg.png">
            </div>
    </div>
    <div class="containerFormulario">
        <form method="post" action="../../app/cadastrando.php">

            <div class="inputs">        
                <input type="text" placeholder="Digite seu nome" name="nome">
                <input type="email" placeholder="Digite seu email" name="email">
                <input type="password" placeholder="Digite sua senha" name="senha">
                <input type="password" placeholder="Repita sua senha" name="senhaConfirmada">
                <span><a href="#">Esqueceu sua senha?</a></span>
            </div>

            <div class="botao">
                <button type="submit">Cadastrar</button>
                <div class="span">
                    <span>Já tem uma conta? <a href="../../../index.php">Faça login</a> </span>
                </div>  
            </div>

        </form>
    </div>
</div>

</div>
</body>
</html>