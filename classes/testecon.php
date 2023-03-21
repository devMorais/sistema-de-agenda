<?php
include_once("conexao.php");

class testcon extends conexao {
	
	 
}

$x = new conexao();
if($x){
	echo "estou conectado";
}


?>