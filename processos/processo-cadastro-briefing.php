<?php
    include "config.php";
    session_start();

    foreach($_POST as $dados);
    $perguntas = implode(", ", $dados);

    

    
    $id = $_SESSION['id'];
    $titulo_briefing = $_POST['titulo_briefing'];


    // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
    date_default_timezone_set('America/Sao_Paulo');
    // CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
    $data = date('d/m/Y H:i:s', time());

    //Inserit briefing no banco de dados

    $status = 1;
    $linkref = rand(10000,50000);

    $insertBriefing = "INSERT INTO  briefing VALUES (NULL, '$titulo_briefing', '', '','', '$perguntas','', '$status', '$linkref', '$data', '$id','')";

    mysqli_query($con,$insertBriefing);
  

    echo "<script>window.location.replace('/../briefing-criado.php');</script>";
    

?>
