<!DOCTYPE html>
<html lang="en">
	<head>
    		<meta charset="utf-8">
    		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    		<meta name="viewport" content="width=device-width, initial-scale=1">
    		<title>Alterar Curso</title>
    		<link href=" bootstrap/css/bootstrap.min.css" rel="stylesheet">
    		<link href="estilo.css" rel="stylesheet">
		
		<?php

		//Declaração das variáveis

		$numero = filter_input(INPUT_GET, "numero");
		$nome = filter_input(INPUT_GET, "nome");
		$sigla = filter_input(INPUT_GET, "sigla");

		?>
 	 </head>
  
  <body>
    
	<!-- Top -->

    <div class="container">
	<div class="jumbotron" align="center">
    	<img  width="400px" height="100px" src="imagens/siistema.png"/>
	</div>

	<div class="menu-container">	
		<ul class="menu clearfix" >
			<li><a href="principal.php">Home</a></li>
			<li><a href="cadastroCurso.html">Novo Curso</a></li>
			<li><a href="listagemCurso.php">Alterações do Curso</a></li>
		<div align="right">
			<a href="logout.php">LOGOUT</a>
		</div>
		</ul>
	</div>
	</br>
	
	<div id="conteudo">

	<!-- Dados a serem alterados -->

	<h2>Alterações do Curso</h2>
		<p>
		<form action="alterarCurso.php">
		<input type="hidden" name="numero" value="<?php echo $numero ?>"/>
		Nome: <input type="text" name="nome" value="<?php echo $nome ?>"/></br></br>
		Sigla: <input type="text" name="sigla" value="<?php echo $sigla ?>"/></br></br>	
		<input type="submit" value="Alterar"/>
		<input type="submit" href="listagemCurso.php" value="Voltar"/>	
		</form>
		</p>
	</div>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  
  </body>
</html>
	
