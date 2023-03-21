<html>
<head>
	<title> Agenda PHP </title>
</head>
<body>


<form method =post action=manter_contato.php?funcao=inserir>

<h2> Formulário: </h2>
<label> Digite seu nome: </label>
<input type=text name=nome required></input><br>

<label> Digite seu apelido: </label>
<input type=text name=apelido></input><br>

<label> Informe a Empresa: </label>
<input type=text name=empresa required></input><br>

<label> Digite seu E-mail: </label>
<input type=text name=email required></input><br>

<label> Digite seu DDD: </label>
<input type=text name=ddd required></input><br>

<label> Digite seu telefone: </label>
<input type=text name=telefone required></input><br>

<input type=submit name=inserir value=Inserir></input>
<input type=reset value=Limpar></input>

</form>
<hr>

</body>
</html>

<?php

	include_once("../classes/funcoessql.php");
	
	$ler = new funcoessql();
	$ler->setconsulta("SELECT * FROM contato");
	if($ler->total() > 0)
	{
		echo "<table border=1>
		<tr>
			<td>ID</td>
			<td>NOME</td>
			<td>APELIDO</td>
			<td>EMPRESA</td>
			<td>DDD</td>
			<td>TELEFONE</td>
			<td>EMAIL</td>
			<td>ALTERAR</td>
			<td>EXCLUIR</td>
		</tr>
			";
		
		foreach($ler->ler() as $contato) 
	{		
		echo"<tr>
				<td>".$contato[0]."</td>
				<td>".$contato[1]."</td>
				<td>".$contato[2]."</td>
				<td>".$contato[3]."</td>
				<td>".$contato[4]."</td>
				<td>".$contato[5]."</td>
				<td>".$contato[6]."</td>
				<td><a href=manter_contato.php?funcao=alterar&id=$contato[0]>Alterar ✍</a></td>
				<td><a href=manter_contato.php?funcao=excluir&id=$contato[0]>Excluir ✘</a></td>
				<td><a href=manter_contato.php?funcao=inserir&id=$contato[0]></a></td>
				
			</tr>";
	}
	
		echo "</table>";
	}
	

?>

