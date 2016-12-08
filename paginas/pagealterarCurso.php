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
                        		 window.location.href = 'listagemCurso.php'; 

                                                                             
                    			</script>


              				 ";

    
   }

	$str_conexao = "host=127.0.0.1 dbname=projetointegrador port=5432 user=postgres
	password=postgres";

   	$con = pg_connect ($str_conexao);


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
	
