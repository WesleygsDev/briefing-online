<?php
	require 'PHPMailer/PHPMailerAutoload.php';
	
	$Mailer = new PHPMailer();
	
	//Define que será usado SMTP
	$Mailer->IsSMTP();
	
	//Enviar e-mail em HTML
	$Mailer->isHTML(true);
	
	//Aceitar carasteres especiais
	$Mailer->Charset = 'UTF-8';
	
	//Configurações
	$Mailer->SMTPAuth = true;
	$Mailer->SMTPSecure = 'ssl';
	
	//nome do servidor
	$Mailer->Host = 'nome-do-servidor';
	//Porta de saida de e-mail 
	$Mailer->Port = 465;
	
	//Dados do e-mail de saida - autenticação
	$Mailer->Username = 'usuario@dominio.com';
	$Mailer->Password = 'senha';
	
	//E-mail remetente (deve ser o mesmo de quem fez a autenticação)
	$Mailer->From = 'usuario@dominio.com';
	
	//Nome do Remetente
	$Mailer->FromName = 'Celke';
	
	//Assunto da mensagem
	$Mailer->Subject = 'Confirme sua Inscrição';
	
	//Corpo da Mensagem
	$mensagem = "Olá <br>";
	$mensagem .= "Confirme seu e-mail para receber o material! <br> <br>";
	$mensagem .= "Clique aqui para confirmar seu e-mail<br> <br>";
	$mensagem .= "Se você recebeu este e-mail por engano, simplesmente o exclua.<br> <br>";
	$mensagem .= "Cesar - Celke";
	
	$Mailer->Body = '$mensagem';
	
	//Corpo da mensagem em texto
	$Mailer->AltBody = 'conteudo do E-mail em texto';
	
	//Destinatario 
	$Mailer->AddAddress('celkeadm@gmail.com');
	
	if($Mailer->Send()){
		echo "E-mail enviado com sucesso";
	}else{
		echo "Erro no envio do e-mail: " . $Mailer->ErrorInfo;
	}
	
?>



