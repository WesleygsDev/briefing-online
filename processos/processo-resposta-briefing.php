<?php 
include'config.php';

$titulo_briefing = $_POST['titulo_briefing'];

$resposta = implode(",",$_POST['resposta']);

$status = $_POST['status'];
$link_ref = $_POST['link_ref'];
$id_usuario = $_POST['id_usuario'];

$inserirRespostas = "INSERT INTO `respostas`  VALUES (NULL, '$titulo_briefing', '', '$resposta', '$status', '$link_ref', '','$id_usuario');";

$exe = mysqli_query($con,$inserirRespostas);


$updateBriefing = "UPDATE briefing SET estado = '2' WHERE link_ref='$link_ref'";
$exe = mysqli_query($con,$updateBriefing);


echo "<script>window.location.replace('../briefing-respondido.php');</script>";





?>