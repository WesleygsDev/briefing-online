<?php
include'config.php';
$flag = 2;
$linkref = $_POST['link_ref'];
$id_usuario = $_POST['id_usuario'];
$nome = $_POST['nome'];
$email = $_POST['email'];


$list = "SELECT * FROM clientes WHERE email='$email'";
$exe = mysqli_query($con,$list);
$row = mysqli_num_rows($exe);
if($row > 1)
{
    echo "<script>alert('Já existe uma conta com esse E-mail');</script>";
    echo "<script>alert('Já existe uma conta com esse E-mail');</script>";
}else
{
    $insertClient = "INSERT INTO clientes  VALUES (NULL, '$nome', '$email', '', '', '$linkref', '$id_usuario', '$flag');";
    $exe = mysqli_query($con,$insertClient);
}






?>