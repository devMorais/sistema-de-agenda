<?php

include_once("classes/funcoessql.php");

$fsql = new funcoessql();

$fsql->setconsulta("SELECT * FROM contato");

if($fsql->total() > 0 )
{
	echo "<table border=1>
		<tr>
			<td>Nome</td>
			<td>Apelido</td>
			<td>Email</td>
			<td>DDD</td>
			<td>Telefone</td>
		</tr>
			";
	foreach($fsql->ler() as $cont) 
	{		
		echo"<tr>
				<td>".$cont['Nome']."</td>
				<td>".$cont['Apelido']."</td>
				<td>".$cont['Email']."</td>
				<td>".$cont['Ddd']."</td>
				<td>".$cont['Celular']."</td>
			</tr>";
	}
	
		echo "</table>";
	
}


?>