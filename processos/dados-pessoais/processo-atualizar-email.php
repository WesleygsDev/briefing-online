<?php
include "config.php";


session_start();

 $id = $_SESSION['id'];
$email = $_POST['email'];
$senhaantiga = $_POST['senhaantiga'];
$senhaatual = sha1($_POST['senhaatual']);

        

$list = "SELECT * FROM usuario WHERE id='$id'";
$exe = mysqli_query($con,$list);
while($dados=mysqli_fetch_array($exe))
{
    $senhadobanco = $dados['senha'];
    
}

if($senhadobanco == $senhaantiga){
    
        $updateEmail = "UPDATE `usuario` SET `email` = '$email ' WHERE `usuario`.`id` = '$id'";
        mysqli_query($con,$updateEmail); 
        echo "<span style='top:20px;position:relative;padding:10px;border:solid 1px green; color:#fff;border-radius:8px; background-color:#53d569;border:none'>E-mail atualizado com sucesso!</span>";
    
echo "<script>location.reload();</script>";
}
else
    
             echo "<span style='top:20px;position:relative;padding:10px;border:solid 1px green; color:#fff;border-radius:8px; background-color:#53d569;border:none'>Senha incorreta!</span>";
   
    



//if(empty($_POST['email']))
  //  {
    //    echo "<span style='top:20px;position:relative;padding:10px;border:solid 1px green; color:#fff;border-radius:8px; background-color:#53d569;border:none'>O campo e-mail precisa ser preenchido!</span>";
    //}
    //else if(empty($_POST['senha']))
    //{
      //  echo "<span style='top:20px;position:relative;padding:10px;border:solid 1px green; color:#fff;border-radius:8px; background-color:#53d569;border:none'>O campo senha precisa ser preenchido!</span>";   
    //}

//else(!empty($_POST['senha'] && $_POST['email']))
  //  {
    
?>
