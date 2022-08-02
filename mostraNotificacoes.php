<h1>Página de notificações</h1>
<?php
  // incluir a classe de notificações
  include_once('Notifications.class.php');
 
  $notif = new Notifications();
 
  if ($notif->hasMessages()) {
    $total = $notif->numMessages();
    printf('Tem %d notificações<br/>', $total);
 
    echo '<ul>';
    foreach ($notif->getAllMessages() as $msg)
      printf('<li>%s</li>', $msg);
 
    echo '</ul>';
 
    echo '<p>As notificações foram apagadas</p>';
 
  } else {
    echo "Não tem notificações";
 
  }
?>
<a href="insereNotificacoes.php">Inserir notificações</a>