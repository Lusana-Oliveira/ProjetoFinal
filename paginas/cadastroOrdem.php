<?php  

	session_start();

	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
	{

    		unset($_SESSION['login']);
    		unset($_SESSION['senha']);
    		session_destroy();
    		header('location: index.html');
	}
	
	 if($_SESSION['categoria'] != 'G'){
        
					echo "

                    			<script type='text/javascript'>                                          

                       			 window.alert('Voce não tem permissão!');
                        		 window.location.href = 'ordem.php'; 

                                                                             
                    			</script>


              				 ";

    
        }

	$numProj = $_POST['p'];
	$codDis = $_POST['d'];
	$desc = $_POST['txtDesc'];

	if(isset($numProj) && isset($codDis) && isset($desc)){
    		if(!empty($numProj) && !empty($codDis) && !empty($desc)){

    			$str_conexao = "host=127.0.0.1 dbname=projetointegrador port=5432 user=postgres
    			password=postgres";
    			$con = pg_connect ($str_conexao);
   
    			$sql = "INSERT INTO composto (num_proj, cod_disc, desc_atividade) VALUES ('".$numProj."', '".$codDis."', '".$desc."')";
        		$result = pg_query($con, $sql);
        		$uol = pg_affected_rows($result);
        
        		if($uol > 0){
                   
         			echo "

                    			<script type='text/javascript'>                                          

                        		window.alert('Inserido com sucesso!');
                        		window.location.href = 'principal.php'; 

                                                                        
                        
                    			</script>


               			    ";   
	

        		}else{
           
           			 echo "

                    			<script type='text/javascript'>                                          

                        		window.alert('ERRO ao inserir!');
                       			window.location.href = 'ordem.php'; 

                                                                        
                        
                    			</script>


               				";
                    
        		}
   		}
    }
echo json_encode($b);
pg_close($con);
    
    
?>
