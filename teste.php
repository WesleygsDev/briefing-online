<?php 

// aqui estou pegando o id do briefing e o id do usuário para se caso o cliente quiser efetuar o cadastro armazena o id usuario na tebela clientes.

var_dump($_GET);
$get = $_GET['link_ref'];


$arr = explode("s",$get);
print_r($arr);

echo $arr[1];

?>