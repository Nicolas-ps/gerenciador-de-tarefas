<?php

function consulta (mysqli $conexao, string $sql) {

    mysqli_select_db($conexao, 'usuario');
    $consulta = mysqli_query($conexao, $sql);
    //echo "".gettype($consulta);
    //echo "<hr>".gettype($conexao);
    //echo "<hr>".gettype($sql);

    if($consulta = mysqli_query($conexao, $sql)){
        $result = mysqli_fetch_assoc($consulta);
        return $result;
    }

}

?>