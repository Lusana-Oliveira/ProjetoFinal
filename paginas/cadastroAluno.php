<html>
<body>

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
        
					echo "

                    			<script type='text/javascript'>                                          

                       			 window.alert('Voce não tem permissão!');
                        		 window.location.href = 'cadastroAluno.html'; 

                                                                             
                    			</script>


              				 ";

    
   }

	$str_conexao = "host=127.0.0.1 dbname=projetointegrador port=5432 user=postgres
	password=postgres";
	$con = pg_connect ($str_conexao);

	if ($con){

		$matricula = $_POST ['matricula'];
		$nome = $_POST ['nome'];
		$sexo = $_POST ['sexo'];
		$dtnasc = $_POST ['dtnasc'];
		$cidade = $_POST ['cidade'];
		$uf = $_POST ['uf'];

		$sql = "select * from aluno where nome = '". $nome ."'";
		$consulta = pg_query($con, $sql);
		$linhas = pg_num_rows($consulta);

		if($linhas > 0 ){
			pg_close($con);
		}elseif ($linhas==0) {
			$sql = "INSERT INTO aluno (matricula, nome, sexo, dtnasc, cidade, uf) VALUES ('$matricula','$nome','$sexo','$dtnasc','$cidade', '$uf');";
			$res = pg_query($con, $sql);
			$qtd_linhas = pg_affected_rows($res);

			if ($qtd_linhas > 0){

				echo "

                    			<script type='text/javascript'>                                          

                       			 window.alert('Cadastro realizado com sucesso!');
                        		 window.location.href = 'cadastroAluno.html'; 

                                                                             
                    			</script>


              				 ";


			}else{

				echo "

                    			<script type='text/javascript'>                                          

                       			 window.alert('ERRO ao cadastrar aluno!');
                        		 window.location.href = 'cadastroAluno.html'; 

                                                                             
                    			</script>


              				 ";

			}
		  }
	}
?>

</body>
</html>
