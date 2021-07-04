<?php   
    error_reporting(E_ALL);  
    ini_set('display_errors', 'On'); 
    require_once("../../app/recuperandoTarefas.php");   
    require_once("../../app/deletandoTarefas.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/css/global.css">
    <link rel="stylesheet" type="text/css" href="../styles/css/home.css">
    <title>A Hora!</title>
</head>
    <body>
        <div class="containerPrincipal">

            <aside class="containerLateral">
                <div class="subcontainerLateral">

                    <div class="containerLogo">
                        <img src="../../../public/img/logo-hora-removebg.png" alt="Logo do Hora!" class="logomarca">
                        <img src="../../../public/img/logo-texto-ssimbol-removebg.png" alt="Logo texto do Hora!" class="logotexto">
                    </div>

                    <div class="containerNavegacao">
                        <nav class="subcontainerNavegacao">
                            <ul class="lista">
                                <li class="item">Todas</li>
                                <li class="item">Pendetes</li>
                                <li class="item">Em andamento</li>
                                <li class="item">Concluídas</li>
                                <li class="item" id="botaoDrop">Adicionar Atividade +</li>
                            </ul>
                        </nav>
                    </div>
                    
                    <div class="containerBotao">
                        <button id="botaoSair">Sair</button>
                    </div>

                </div>
            </aside>

            <main class="containerMain">

                <section class="secaoAtividade">

                        <div class="topo">
                            <h1 id="titulo">Título da tarefa</h1>
                            <p id="status">Status: Lorem</p>
                        </div>

                        <div class="containerDescricao">
                            <h3>Descrição</h3>
                            <p id="descricao">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus dolores repellendus vero non obcaecatis.</p>
                        </div>

                </section>         
                
                <section class="secaoLista">
                    <nav class="containerListaTarefas" id="containerListaTarefas">

                        <?php if(empty($tarefas)){?>

                                <li id="tarefa" style="justify-content: center;">Não há tarefas em sua lista!</li>

                        <?php }else{ foreach($tarefas as $index => $tarefa){ ?>
            
                                <li id="tarefa">
                                        <input type="checkbox">
                                        <span><?= $tarefa["TITULO"]?></span>
                                        <span class="data">Data de entrega: <?= $tarefa["DATA_ENTREGA"]?></span>
                                        <a href="home.php?index=<?=$tarefa["ID"]?>">
                                            <button>
                                                <img src="../../../public/iconExcluir-removebg-preview.png" height="16px" width="24px">
                                            </button>
                                        </a>                               
                                </li>

                        <?php }}?>
            
                    </nav>
                </section>

            </main>      

             <div class="telaAddAtividade" id="telaAddAtividade">
                <div class="containerFormulario">

                    <div class="containerTopo">
                        <h1>Adicionar tarefa</h1>
                        <img src="../../../public/icon-close-removebg-preview.png" alt="Botão de fechar" height="16px" width="32px" id="botao">
                    </div>

                    <form class="form" method="POST" action="../../app/cadastrandoTarefas.php">

                        <div class="subcontainerUm subcontainer">
                            <label for="titulo">
                                Título
                                <br>
                                <input type="text" name="titulo">
                            </label>

                            <label for="data">
                                Data de entrega
                                <br>
                                <input type="date" name="data">
                            </label>
                        </div>

                        <div class="subcontainerDois subcontainer">

                            <label for="">
                                Status
                                <br>
                                <select name="status">
                                    <option value="Pendente" selected>Pendente</option>
                                    <option value="Em Andamento">Em andamento</option>
                                    <option value="Concluída">Concluída</option>
                                </select>
                            </label>

                            <label>
                                <input type="file" name="imagem" placeholder="Escolha um plano de fundo">
                            </label>
                        </div>

                        <div class="subcontainerTres subcontainer">

                            <label for="" >
                                Descricao
                                <br>
                                <textarea id="descricao" name="descricao"></textarea>
                            </label>
                        
                        </div>  

                        <a href="home.php?adicionado=true">
                            <button type="submit">Adicionar</button>
                        </a>
                    </form>   
                    

                </div>
                
            </div>

            <div class="dropSaida" id="dropSaida">
                <span>Você realmente deseja sair?</span>
                <div class="buttons">
                    <button type="button" id="botaoCancelar">Cancelar</button>
                    <a href="../../../index.php"><button type="button" id="botaoSair">Sair</button></a>
                </div>
            </div>

        </div>
        <script type="text/javascript" src="../../scripts/controleTelaAdd.js"></script>
        <script type="text/javascript" src="../../scripts/exibirConteudoTopo.js"></script>
        <script type="text/javascript" src="../../scripts/controleTelaSaida.js"></script>
    </body>
</html>