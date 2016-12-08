<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alterar Aluno</title>
    <link href=" bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">
	<?php

	//Início da sessão

    session_start();

    //Verifica se a variável existe

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);

	//Resetar/Destruir a sessão	
	
        session_destroy();
        header('location:index.html');
    }

    //Verifica se a sessão é diferente de G (Gerente do Projeto) se for diferente será emitido uma mensagem de permissão 	negada

    if($_SESSION['categoria'] != 'G'){
        
	echo "

                    			<script type='text/javascript'>                                          

                       			 window.alert('Voce não tem permissão!');
                        		 window.location.href = 'listagemAluno.php'; 

                                                                             
                    			</script>


              				 ";

    
   }

	$str_conexao = "host=127.0.0.1 dbname=projetointegrador port=5432 user=postgres
	password=postgres";

   	$con = pg_connect ($str_conexao);

	 //Declaração das variáveis

	$matricula = filter_input(INPUT_GET, "matricula");
	$nome = filter_input(INPUT_GET, "nome");
	$sexo = filter_input(INPUT_GET, "sexo");
	$dtnasc = filter_input(INPUT_GET, "dtnasc");
	$cidade = filter_input(INPUT_GET, "cidade");
	$uf = filter_input(INPUT_GET, "uf");

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
	<li><a href="cadastroAluno.html">Novo Aluno</a></li>
	<li><a href="listagemAluno.php">Alterações do Aluno</a></li>
	<div align="right">
	<a href="logout.php">LOGOUT</a>
	</div>
	</ul>
	</div>
	</br>
	
	<div id="conteudo">

	<!-- Dados a serem alterados -->

	<h2>Alterações do Aluno</h2><hr>
		<p>
		<form action="alterarAluno.php">
		<input type="hidden" name="matricula" value="<?php echo $matricula ?>"/>
		Nome: <input type="text" name="nome" value="<?php echo $nome ?>"/></br></br>
		Sexo: <input type="text" name="sexo" value="<?php echo $sexo ?>"/></br></br>
		Data de Nascimento: <input type="text" name="dtnasc" value="<?php echo $dtnasc ?>"/></br></br>
		Cidade: <input type="text" name="cidade" value="<?php echo $cidade ?>"/></br></br>
		Uf: <input type="text" name="uf" value="<?php echo $uf ?>"/></br></br>	
		<input type="submit" value="Alterar"/>
		<input type="submit" href="listagemAluno.php" value="Voltar"/>	
		</form>
		</p>
	</div>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  
  </body>
</html>
	
