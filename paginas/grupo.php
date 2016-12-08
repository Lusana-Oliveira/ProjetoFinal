<?php

	session_start();

    	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    	{

        	unset($_SESSION['login']);
        	unset($_SESSION['senha']);
        	session_destroy();
        	header('location:index.html');
    	}


	$strCon = "host=localhost dbname=projetointegrador port=5432 user=postgres password=postgres";
  	$con = pg_connect($strCon);


	if($con){

		$sql = "INSERT INTO grupo (id, nome,num_proj) VALUES " 
		. "('" . $_GET['id'] . "',"
		. "'" . $_GET['nomeGrupo'] . "',"
		. $_GET['proj'] . ")"
		;
		$result = pg_query($con, $sql);
	
	if(pg_affected_rows($result) > 0){
		
		echo "
                    <script type='text/javascript'>  
                                        
                        window.alert('Grupo cadastrado com sucesso!');
                        window.location.href = 'cadastroGrupo.php'; 
                                                                        
                        
                    </script>
               ";
		
	}else{

		echo "
                    <script type='text/javascript'>  
                                        
                        window.alert('Erro ao cadastrar grupo!');
                        window.location.href = 'cadastroGrupo.php'; 
                                                                        
                        
                    </script>
               ";
	}
	
	
	
	}else{
		echo "Conexao falhou!";
	
	}
	
	
	pg_close($con);
?>
