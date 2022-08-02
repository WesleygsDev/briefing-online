<?php 
include 'config.php';

$email = $_POST['email'];
$senha = sha1($_POST['senha']);



$list = "SELECT * FROM usuario WHERE email='$email' AND senha='$senha'";
$exe = mysqli_query($con,$list);
$row = mysqli_num_rows($exe);
if($row == true)
{
    
    $dados = mysqli_fetch_array($exe);
    session_start();
    $_SESSION['id'] = $dados['id'];
    echo "<script>window.location.href = '../index.php';</script>";
}

else
{
    
    echo "<script>window.location.href = '../login.php';</script>";
    
    
}

?>