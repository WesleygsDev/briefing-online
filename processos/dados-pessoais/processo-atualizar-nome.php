<?php
include "config.php";

session_start();

$id = $_SESSION['id'];
$nome = $_POST['nome'];
    
$updateBriefing = "UPDATE `usuario` SET `nome` = '$nome' WHERE `usuario`.`id` = '$id'";

    mysqli_query($con,$updateBriefing);
  

echo "<span style='padding:10px;border:solid 1px green; color:green;'>O seu nome foi atualizado para</span>";
echo "<script>location.reload();</script>";    

?>
