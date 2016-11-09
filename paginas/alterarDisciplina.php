<?php

	$codigo = filter_input(INPUT_GET, "codigo");
	$nome = filter_input(INPUT_GET, "nome");
	$ch = filter_input(INPUT_GET, "ch");

	$str_conexao = "host=127.0.0.1 dbname=projetointegrador port=5432 user=postgres
password=postgres";

$con = pg_connect ($str_conexao);

if($con){
	$query = pg_query ($con, "update disciplina set nome = '$nome', ch ='$ch' where codigo = '$codigo';");
	if (query){
	header("Location: listagemDisciplina.php");
	}else{
	  die("Erro: " . pg_error($con));
	}
}else {
	die("Erro: " . pg_error($con));
}
?>
