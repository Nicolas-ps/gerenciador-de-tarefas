<?php 

$caminho = '../../tarefas.txt'
$tarefas = file_get_contents($caminho);

echo $tarefas;