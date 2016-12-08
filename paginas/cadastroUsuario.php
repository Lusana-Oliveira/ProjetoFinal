<html>
	<body>
	
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

	//Verifica se a sessão é diferente de C (Coordenador) se for diferente será emitido uma mensagem de 				permissão negada
    
	if($_SESSION['categoria'] != 'C'){
        
		echo "

                    			<script type='text/javascript'>                                          

                       			 window.alert('Voce não tem permissão!');
                        		 window.location.href = 'cadastroUsuario.html'; 

                                                                             
                    			</script>


              				 ";
    
   	}


	//Conexão com o Banco de Dados

	$str_conexao = "host=127.0.0.1 dbname=projetointegrador port=5432 user=postgres
	password=postgres";

	$con = pg_connect ($str_conexao);

	if ($con){

		//Declaração das variáveis

		$login = $_POST ['login'];
		$senha = $_POST ['senha'];
		$nome = $_POST ['nome'];
		$categoria = $_POST ['categoria'];
		$situacao = $_POST ['situacao'];

		//Executa a consulta

		$sql = "select * from usuario where nome = '". $nome ."'";
		$consulta = pg_query($con, $sql);
		$linhas = pg_num_rows($consulta);

	if($linhas > 0 ){

		pg_close($con);

	}elseif ($linhas==0) {

		$sql = "INSERT INTO usuario (login, senha, nome, categoria, situacao) VALUES ('$login','$senha', '$nome', '$categoria', '$situacao');";
		$res = pg_query($con, $sql);
		$qtd_linhas = pg_affected_rows($res);

	//Se a ação for execultado corretamente será dado uma mensagem de cadastro realizado com sucesso

	if ($qtd_linhas > 0){

		echo "

                    			<script type='text/javascript'>                                          

                       			 window.alert('Cadastro realizado com sucesso!');
                        		 window.location.href = 'cadastroUsuario.html'; 

                                                                             
                    			</script>


              				 ";


			}else{

				echo "

                    			<script type='text/javascript'>                                          

                       			 window.alert('ERRO ao cadastrar usuario!');
                        		 window.location.href = 'cadastroUsuario.html'; 

                                                                             
                    			</script>


              				 ";

			}
	
          }
}

?>

</body>
</html>
