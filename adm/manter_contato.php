<?php

include_once("../classes/funcoessql.php"); 	

													// Permitir usar os métodos da classe funcoessql

if(isset($_GET['funcao']))  						// verifica se existe uma variável chamada funcao
{
	$controle = $_GET['funcao']; 					// se existe ele vai pegar o conteúdo desta funcao

	}else

	{
	$controle = "";

	}

if($controle == "excluir")   						// se a funcao foi igual a excluir 
{
	
	echo "<form method=post>
	<label>Deseja realmente excluir?</label>
	<input type=submit name=sim value=Sim></input>
	<input type=submit name=nao value=Não></input>

	</form>";
	
	if(isset($_POST['sim']))
	{
		
		if(isset($_GET['id']))  						// verifica se existe o id 
		{
		
		$id = $_GET['id'];  						// pega o conteúdo do id valor numérico e único
		
		}else
		{
		$id = 0;  									// senao id = 0
		}
	
		if($id > 0)
		{
		$excluir = new funcoessql();
		$excluir->setconsulta("delete from contato where id_contato = $id");
	
		if($excluir->excluir() > -1)
		{
			echo"<script>
		
			alert('Registro excluído com sucesso!');
			window.location.replace('index.php');
		
			</script>";
		}else
		{
			echo "Erro ao excluir";
		}
		}
	
	}else if(isset($_POST['nao'])) 
	{
		
		echo "<script>
		
			alert('Operação cancelada!');
			window.location.replace('index.php');
		
			</script>";
		
		
	}
	
}else if($controle == "alterar")

{
	
	if(isset($_GET['id']))
	{
		$id    = $_GET['id'];
		$form  = new funcoessql();
		$form->setconsulta("select * from contato where Id_contato = $id");
		if($form->total() > 0)
		{
			foreach($form->ler() as $f)
			{
				$id_contato = $f[0];
				$nome 		= $f[1];
				$apelido 	= $f[2];
				$empresa 	= $f[3];
				$ddd 		= $f[4];
				$celular 	= $f[5];
				$email 		= $f[6];
				
			}
			echo  "
				
				<form method=post>
				<label>ID:</label>
				<input type=text name=id value=$id_contato  ></input><br>
				<label>NOME:</label>
				<input type=text value=$nome disabled ></input><br>
				<label>APELIDO:</label>
				<input type=text name=apelido value=$apelido></input><br>
				<label>EMPRESA:</label>
				<input type=text name=empresa value=$empresa></input><br>
				<label>DDD:</label>
				<input type=text name=ddd value=$ddd></input><br>
				<label>CELULAR:</label>
				<input type=text name=celular value=$celular></input><br>
				<label>E-MAIL:</label>
				<input type=text value=$email disabled ></input><br>
				<input type=submit name=alt value=Alterar>
				</form>";
			
		}
		if(isset($_POST['alt']))
		{
			$idalterado  = $_POST['id'];
			$novoapelido = $_POST['apelido'];
			$novaempresa = $_POST['empresa'];
			$novoddd     = $_POST['ddd'];
			$novocelular = $_POST['celular'];
			
			$altera = new funcoessql();
			
			$altera->setconsulta(" update contato
									set apelido       = '$novoapelido',
									    empresa       = '$novaempresa',
										ddd           = '$novoddd',
										celular       = '$novocelular'
									where id_contato  =  $idalterado");
									
		if($altera->alterar() > -1)
		{
			
			
			echo "<script>
		
				alert('Alterado com sucesso!');
				window.location.replace('index.php');
		
				</script>";
	
			}else{
			
			echo"<script>
		
				alert('Erro ao alterar');
				window.location.replace('index.php');
		
				</script>";
		}
		
		}
		
	}
	
} else 
{
	if(isset($_POST['inserir']))
{	
	$inserir = new funcoessql();
	
	$nome 	   = $_POST['nome'];
	$apelido   = $_POST['apelido'];
	$empresa   = $_POST['empresa'];
	$ddd       = $_POST['ddd'];
	$celular   = $_POST['telefone'];
	$email     = $_POST['email'];
	
	$inserir->setconsulta("insert into contato values(null, '$nome', '$apelido', '$empresa', '$ddd', '$celular', '$email') ");
	
	if($inserir->inserir() > -1)
	{
		echo " <script>
		
				alert('Inserido com sucesso!');
				window.location.replace('index.php');
		
				</script>";
		
	}
	
}
}

?>