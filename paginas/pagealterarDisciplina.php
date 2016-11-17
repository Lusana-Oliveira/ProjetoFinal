<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alterar Disciplina</title>
    <link href=" bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">
	<?php

	$codigo = filter_input(INPUT_GET, "codigo");
	$nome = filter_input(INPUT_GET, "nome");
	$ch = filter_input(INPUT_GET, "ch");

	?>
  </head>
  
  <body>
    
    <div class="container">
	<div class="jumbotron" align="center">
    	<img  width="400px" height="100px" src="imagens/siistema.png"/>
	</div>
	
	<div class="menu-container">	
	<ul class="menu clearfix" >
	<li><a href="principal.php">Home</a></li>
	<li><a href="cadastroDisciplina.html">Nova Disciplina</a></li>
	<li><a href="listagemDisciplina.php">Alterações da Disciplina</a></li>
	<div align="right">
	<a href="logout.php">LOGOUT</a>
	</div>
	</ul>
	</div>
	</br>
	
	<div id="conteudo">

	<h2>Alterações da Disciplina</h2>
		<p>
		<form action="alterarDisciplina.php">
		<input type="hidden" name="codigo" value="<?php echo $codigo ?>"/>
		Nome: <input type="text" name="nome" value="<?php echo $nome ?>"/></br></br>
		Ch: <input type="text" name="ch" value="<?php echo $ch ?>"/></br></br>	
		<input type="submit" value="Alterar"/>
		<input type="submit" href="listagemDisciplina.php" value="Voltar"/>	
		</form>
		</p>
	</div>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  
  </body>
</html>
	
