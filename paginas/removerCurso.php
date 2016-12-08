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

	//Verifica se a sessão é diferente de C (Coordenador) se for diferente será emitido uma mensagem de permissão 		negada

    	if($_SESSION['categoria'] != 'C'){
        
					echo "

                    			<script type='text/javascript'>                                          

                       			 window.alert('Voce não tem permissão!');
                        		 window.location.href = 'listagemCurso.php'; 

                                                                             
                    			</script>


              				 ";

    
   	}

	//Declaração das variáveis

	$numero = filter_input(INPUT_GET, "numero");

	 //Conexão com o Banco de Dados

	$str_conexao = "host=127.0.0.1 dbname=projetointegrador port=5432 user=postgres
	password=postgres";

	$con = pg_connect ($str_conexao);
	
	//pg_query — Executa uma consulta (query)

	if($con){

		$query = pg_query ($con, "delete from curso where numero = '$numero'");
	
	//Se query for execultado corretamente será redirecionado para a página contida em header

	if (query){

		header("Location: listagemCurso.php");

	//Se ocorrer um erro será mostrada uma mensagem e termina o script atual

	}else{

	  die("Erro: " . pg_error($con));
	}
	
	}else {

	die("Erro: " . pg_error($con));
	
	}
?>
