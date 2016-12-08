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
        header('location: index.html');
    }
    
    
?>

<!DOCTYPE html>
	<html lang="en">
  		<head>
    			<meta charset="utf-8">
    			<meta http-equiv="X-UA-Compatible" content="IE=edge">
    			<meta name="viewport" content="width=device-width, initial-scale=1">
    			<title>Principal</title>
    			<link href=" bootstrap/css/bootstrap.min.css" rel="stylesheet">
    			<link href="estilo.css" rel="stylesheet">

  		</head>

	<!-- Barra de menu-->
  
            <body>
    
    		<div class="container">
			<div class="jumbotron" align="center">
    				<img  width="400px" height="100px" src="imagens/siistema.png"/>
			</div>
			
			<div class="entrada" align="center">	
				<h3><?php 
    				echo" Bem vinda (o): @" . $_SESSION['login'];
    			?></h3>
		</div>
	
		<div class="menu-container">	
			<ul class="menu clearfix" >
				<li><a href="principal.php">Home</a></li>
				<li><a href="#">Menu de cadastros</a>
					<ul class="sub-menu">
					  <li><a href="cadastroAluno.html">Cadastrar Aluno</a></li>
					  <li><a href="cadastroUsuario.html">Cadastrar Usuário</a></li>
					  <li><a href="cadastroDisciplina.html">Cadastrar Disciplina</a></li>
					  <li><a href="cadastroCurso.html">Cadastrar Curso</a></li>
					</ul>
				</li>
				</li>
				<li><a href="#">Menu do Projeto</a>
					<ul class="sub-menu">
					  <li><a href="cadastroProjeto.php">Cadastrar Projeto</a></li>
				</li>
					</ul>
				<li><a href="#">Menu do Grupo</a>
					<ul class="sub-menu">
					  <li><a href="cadastroGrupo.php">Cadastrar Grupo</a></li>
					  <li><a href="cadTbParticipa.php">Submeter aluno ao grupo</a></li>
				</li>
					</ul>
				<li><a href="cadastroNotas.php">Lançar Notas</a></li>
				<li><a href="#">Menu de Relatórios</a>
					<ul class="sub-menu">
					   <li><a href="relatorioAluno.php">Relação Alunos e Nota</a></li>
					</ul>
				</li>
				<li><a href="listaLink.php">Acesso ao P.I</a></li>
				<div align="right">
					<a href="logout.php">LOGOUT</a>
				</div>
			</ul>
		</div>
	
	</body>
</html>

		
