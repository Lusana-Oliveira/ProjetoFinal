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

    //Verifica se a sessão é diferente de C (Coordenador) se for diferente será emitido uma mensagem de permissão 	negada

    if($_SESSION['categoria'] != 'C'){
        
	echo "

                    			<script type='text/javascript'>                                          

                       			 window.alert('Voce não tem permissão!');
                        		 window.location.href = 'listagemDisciplina.php'; 

                                                                             
                    			</script>


              				 ";

    
   }

	$str_conexao = "host=127.0.0.1 dbname=projetointegrador port=5432 user=postgres
	password=postgres";

   	$con = pg_connect ($str_conexao);

		//Declaração das variáveis

		$codigo = filter_input(INPUT_GET, "codigo");
		$nome = filter_input(INPUT_GET, "nome");
		$ch = filter_input(INPUT_GET, "ch");

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
			<li><a href="cadastroDisciplina.html">Nova Disciplina</a></li>
			<li><a href="listagemDisciplina.php">Alterações da Disciplina</a></li>
		<div align="right">
			<a href="logout.php">LOGOUT</a>
		</div>
		</ul>
	</div>
	</br>
	
	<div id="conteudo">

	<!-- Dados a serem alterados -->

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
	
