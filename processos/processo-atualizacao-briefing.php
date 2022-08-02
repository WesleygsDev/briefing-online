<?php
    include "config.php";
    session_start();

    foreach($_POST as $dados);
    $perguntas = implode(", ", $dados);

    

    
    $id_briefing = $_POST['id_briefing'];
    $titulo_briefing = $_POST['titulo_briefing'];


    // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
    date_default_timezone_set('America/Sao_Paulo');
    // CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
    $data = date('d/m/Y H:i:s', time());

    //Inserit briefing no banco de dados

    

    $updateBriefing = "UPDATE `briefing` SET `titulo_briefing` = '$titulo_briefing', `perguntas` = '$perguntas', `data` = '$data' WHERE `briefing`.`id_briefing` = '$id_briefing';";

    mysqli_query($con,$updateBriefing);
  

    echo "<script>window.location.replace('../briefing-criado.php');</script>";
    

?>
