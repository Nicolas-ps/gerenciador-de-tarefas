<?php 

    define('PATH', '../../../tarefas.txt');
    loadArchiveTasks(PATH);
    loadInputForm();
    
    function loadArchiveTasks (string $caminho) {

        global $file, $tasks, $task;
        $file = file_get_contents($caminho);
        $tasks = explode("\n", $file);
        $task = [];

        foreach($tasks as $line){
            if($line != ""){
                array_push($task, explode("%", $line));
            }
        } 
    }

    function loadInputForm () {
        global $title, $status,$description, $date;

        if($_POST){
            $title = filter_input(INPUT_POST, "titulo");
            $status = filter_input(INPUT_POST, "status");
            $description = filter_input(INPUT_POST, "descricao");
            $date = filter_input(INPUT_POST, "data");
        }

        if($title){
            $taskInput = "$title%$status%$description%$date\n";
            addTasks($taskInput);
        }
    }

    function addTasks ($taskInput) {
        $fileOpen = fopen(PATH, 'a');
        fwrite($fileOpen, $taskInput);
        fclose($fileOpen);
        header("location: ../pages/home.php");
    }

    $index = filter_input(INPUT_GET, "index");
    if(isset($index)){

        array_splice($tasks, $index, 1);
        $arquivoAberto = fopen(PATH, "w");
        fwrite($arquivoAberto, implode("\n", $tasks));
        fclose($arquivoAberto);
        header("location: ../pages/home.php");
    }
 
?>