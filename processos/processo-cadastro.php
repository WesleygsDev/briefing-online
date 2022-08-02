<?php 
include 'config.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = sha1($_POST['senha']);
$repetirsenha = sha1($_POST['repetirsenha']);
$flag = 1;

$list = "SELECT * FROM usuario WHERE email='$email'";
$exe = mysqli_query($con,$list);
$row = mysqli_num_rows($exe);
if($row > 1)
{
    echo "Ops Essa conta já existe";
}

else
{
    
    
    $insert = "INSERT INTO usuario  VALUES (NULL, '$nome', '$email', '', '$senha', '$flag');";
    mysqli_query($con,$insert);
    
    
    $listUser = "SELECT * FROM usuario WHERE email='$email'";
    $exeIn = mysqli_query($con,$listUser);
    $dados = mysqli_fetch_array($exeIn);
    
    
    session_start();
    $_SESSION['id'] = $dados['id'];
    
    
    echo "<script>window.location.href = '../new-briefing.php';</script>";
    
}

?>