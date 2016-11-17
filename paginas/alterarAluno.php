<?php

	session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:index.html');
    }
    if($_SESSION['categoria'] != 'G'){
        
die("<center><h1>Você não tem permissão!</h1></center>");
    
   }

	$matricula = filter_input(INPUT_GET, "matricula");
	$nome = filter_input(INPUT_GET, "nome");
	$sexo = filter_input(INPUT_GET, "sexo");
	$dtnasc = filter_input(INPUT_GET, "dtnasc");
	$cidade = filter_input(INPUT_GET, "cidade");
	$uf = filter_input(INPUT_GET, "uf");

	$str_conexao = "host=127.0.0.1 dbname=projetointegrador port=5432 user=postgres
password=postgres";

$con = pg_connect ($str_conexao);

if($con){
	$query = pg_query ($con, "update aluno set nome = '$nome', sexo='$sexo', dtnasc='$dtnasc', cidade='$cidade',uf='$uf' where matricula = '$matricula';");
	if (query){
	header("Location: listagemAluno.php");
	}else{
	  die("Erro: " . pg_error($con));
	}
}else {
	die("Erro: " . pg_error($con));
}
?>
