<?php

	$login = filter_input(INPUT_GET, "login");
	$nome = filter_input(INPUT_GET, "nome");
	$categoria = filter_input(INPUT_GET, "categoria");
	$situacao = filter_input(INPUT_GET, "situacao");


	$str_conexao = "host=127.0.0.1 dbname=projetointegrador port=5432 user=postgres
password=postgres";

$con = pg_connect ($str_conexao);

if($con){
	$query = pg_query ($con, "update usuario set nome = '$nome', categoria='$categoria' , situacao='$situacao' where login = '$login';");
	if (query){
	header("Location: listagemUsuario.php");
	}else{
	  die("Erro: " . pg_error($con));
	}
}else {
	die("Erro: " . pg_error($con));
}
?>
