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
                        		 window.location.href = 'cadTbParticipa.php'; 

                                                                             
                    			</script>


              				 ";

    
   }


    $strCon = "host=localhost dbname=projetointegrador port=5432 user=postgres password=postgres";
    $con = pg_connect($strCon); 

	if($con){
		$sql = "select * from participa where  matricula = '". $_GET['matricula'] ."'";
        	$consulta = pg_query($con, $sql);
        	$linhas = pg_num_rows($consulta);
        if($linhas == 0 ){
		$sql = "select count(*) FROM participa where  id_grupo = '". $_GET['txtID'] ."'";
		$consulta = pg_query($con, $sql);
		$linhas = pg_fetch_result($consulta,0);
		if($linhas<4){
			$sql = "INSERT INTO participa (matricula, id_grupo) VALUES " 
			. "('" . $_GET['matricula'] . "',"
			. $_GET['txtID'] . ")"
			;
			$result = pg_query($con, $sql);
			if(pg_affected_rows($result) > 0){
				echo "
        		        <script type='text/javascript'>                                          
                	        window.alert('Aluno cadastrado no grupo com sucesso');
                	        window.location.href = 'cadTbParticipa.php'; 
                  	        </script>
				";
			}else{
				die("Erro ao cadastrar o aluno!");
			}
		}else{
			echo "<script type='text/javascript'>                                          
                        window.alert('Grupo ja possui o maximo de alunos possiveis');
                        window.location.href = 'cadTbParticipa.php'; 
		        </script>";
		}
	
	}else{
		echo "<script type='text/javascript'>                                          
                window.alert('Aluno ja pertence a um grupo');
                window.location.href = 'cadTbParticipa.php'; 
                </script>";
	}
	
	}else{

	echo "Conexao falhou!";

	}

	pg_close($con);
?>
