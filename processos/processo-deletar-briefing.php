<?php
    include "config.php";

    $id_briefing = $_POST['id_briefing'];
    $deletBriefing = "DELETE FROM `briefing` WHERE id_briefing='$id_briefing'";

    mysqli_query($con,$deletBriefing);
  

$retorno['mensagem'] = "E-mail enviado";
echo json_encode($retorno);
    

?>
