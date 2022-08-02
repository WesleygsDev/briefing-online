<?php
/**
 * Sistema de Notificações Simples
 * Dependências:
 *  -> funcionalidade de sessões do PHP
 *  -> PHP 5 ou superior
 */
class Notifications {
 
	private $notifications;
 
	/**
	 * Construtor da classe, inicializa as sessões
	 */
	function Notifications() {
		if (!@session_start())
			die ('Unable to start Notifications class!');
        
        include 'processos/config.php';
		if (!isset($_SESSION['Notifications']))
            $id_usuario = $_SESSION['id']
            $query = "SELECT * FROM briefing WHERE id_usuario='$id_usuario'";
            $exe = mysqli_query($con,$query);
            while($dados=mysqli_fetch_array($exe))
            {
                $_SESSION['Notifications'] = $dados;
            }
        
			
 
		$this->notifications = &$_SESSION['Notifications'];
	}
 
	/**
	 * Obtém a mensagem mais antiga disponível, e remove-a da lista
	 * Devolve FALSE se não existirem mensagens
	 */
	function getMessage() {
		$result = $this->notifications;
 
		if (empty($result))
			return FALSE;
 
		return array_shift($this->notifications);
	}
 
	/**
	 * Devolve todas as mensagens existentes e elimina-as da lista
	 * Devolve FALSE se não existirem mensagens
	 */
	function getAllMessages() {
		$result = $this->notifications;
		$this->notifications = array();
 
		return (!empty($result) ? $result : FALSE);
	}
 
	/**
	 * Devolve o número de mensagens existentes na lista
	 */
	function numMessages() {
		return count($this->notifications);
	}
 
	/**
	 * Verifica se existem mensagens em espera
	 */
	function hasMessages() {
		return ! empty($this->notifications);
	}
 
	/**
	 * Coloca uma mensagem no fim da lista
	 * Se for usado um array, as mensagens são adicionadas individualmente
	 */
	function putMessage($theMessage) {
		if (is_array($theMessage))
			$this->putMessages($theMessage);
		else
			$this->notifications[] = $theMessage;
	}
 
	/**
	 * Coloca várias mensagens de um array na lista
	 * Se for usado um array multidimensional, cada campo será extraido e colocado na lista
	 * Uma vez que esta função é privada, deve-se usar a função putMessage para colocar
	 * mensagens em arrays
	 */
	private function putMessages($messageArray) {
		foreach ($messageArray as $m)
			$this->putMessage($m);
	}
 
	/**
	 * Limpa a lista de mensagens, eliminando mensagens exisitentes, sem as devolver
	 */
	function clearMessages() {
		$this->notifications = array();
	}
}