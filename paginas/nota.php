<?php

session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:index.html');
    }

    
    if($_SESSION['categoria'] != 'P'){
        
					echo "

                    			<script type='text/javascript'>                                          

                       			 window.alert('Voce não tem permissão!');
                        		 window.location.href = 'cadastroNotas.php'; 

                                                                             
                    			</script>


              				 ";

    
   }


	$strCon = "host=localhost dbname=projetointegrador port=5432 user=postgres password=postgres";
  	$con = pg_connect($strCon);

	if($con){

		$sql = "select * from participa where  matricula = '". $_GET['matricula'] ."'";
        	$consulta = pg_query($con, $sql);
 
        	$linhas = pg_num_rows($consulta);

        if($linhas > 0 ){

		$sql = "UPDATE participa SET nota = " . $_GET['txtNota'] . " where  matricula = '". $_GET['matricula'] ."'";
		$result = pg_query($con, $sql);
		if(pg_affected_rows($result) > 0){
		
			echo "
	
        	        <script type='text/javascript'>  
                                        
                        window.alert('Nota cadastrada com sucesso!');
                        window.location.href = 'cadastroNotas.php'; 
                                                                        
                        
                       </script>
    
                      ";
		
		}else{
			echo "
	
        	        <script type='text/javascript'>  
                                        
                        window.alert('ERRO ao cadastrar nota!');
                        window.location.href = 'cadastroNotas.php'; 
                                                                        
                        
                       </script>
    
                      ";
		}
	
		}else{

		echo "<script type='text/javascript'>  
                                        
                        window.alert('Aluno não está cadastrado em nenhum grupo do projeto integrador');
                        window.location.href = 'cadastroNotas.php'; 
                                                                        
                        
                       </script>";
		}
	
		}else{

			echo "Conexao falhou!";
		}

		pg_close($con);

?>
