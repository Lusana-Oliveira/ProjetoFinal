<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alterar Usuário</title>
    <link href=" bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">
	<?php

	$login = filter_input(INPUT_GET, "login");
	$nome = filter_input(INPUT_GET, "nome");
	$categoria = filter_input(INPUT_GET, "categoria");
	$situacao = filter_input(INPUT_GET, "situacao");

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
	<li><a href="cadastroUsuario.html">Novo Usuário</a></li>
	<li><a href="listagemUsuario.php">Alterações do Usuário</a></li>
	<div align="right">
	<a href="logout.php">LOGOUT</a>
	</div>
	</ul>
	</div>
	</br>
	
	<div id="conteudo">

	<h2>Alterações Usuário</h2>
		<p>
		<form action="alterarUsuario.php">
		<input type="hidden" name="login" value="<?php echo $login ?>"/>
		Nome: <input type="text" name="nome" value="<?php echo $nome ?>"/></br></br>
		Categoria: <input type="text" name="categoria" value="<?php echo $categoria ?>"/></br></br>	
		Situação: <input type="text" name="situacao" value="<?php echo $situacao ?>"/></br></br>
		<input type="submit" value="Alterar"/>
		<input type="submit" href="listagemUsuario.php" value="Voltar"/>	
		</form>
		</p>
	</div>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  
  </body>
</html>
	
