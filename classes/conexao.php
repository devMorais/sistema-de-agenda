<?php

class conexao{

private $endereco = "localhost";
private $usuario = "root";  //selecionar, alterar, excluir, atualizar.
private $senha = "senac";
private $bancodedados = "agenda";
private $con; // variavel lógica que retorna falso ou verdadeiro

function __construct(){ //metodo construtor
	
	$this->conectar();

	}

function conectar(){
	
	$con = mysqli_connect($this->endereco,$this->usuario,$this->senha,$this->bancodedados);
	return $con;
	
	}
}
?>