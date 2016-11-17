<?php

	session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:index.html');
    }
    if($_SESSION['categoria'] != 'C'){
        
die("<center><h1>Você não tem permissão!</h1></center>");
    
   }

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
