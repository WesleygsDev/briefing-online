<?php
  if (!empty($_POST['inserir'])) {
    // incluir a classe de notificações
    include_once('Notifications.class.php');
 
    $notif = new Notifications();
 
    $msgs = $_POST['messages'];
    $messages = explode(';', $msgs);
 
    $notif->putMessage($messages);
 
    echo '<p>As mensagens foram inseridas. <a href="mostraNotificacoes.php">Ver mensagens</a></p>';
  }
?>
 
<form method="POST">
<p>Introduza as notificações. Para passar várias mensagens, separe-as por ; (ponto e vírgula)</p>
<textarea name="messages"></textarea>
<input type="submit" name="inserir" value="Adicionar" />
</form>