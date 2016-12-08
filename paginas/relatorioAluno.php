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
    
    
?>

<!DOCTYPE html>
<html lang="en">
	<head>
    		<meta charset="utf-8">
    		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    		<meta name="viewport" content="width=device-width, initial-scale=1">
    		<title>Relatorio Aluno</title>
    		<link href=" bootstrap/css/bootstrap.min.css" rel="stylesheet">
    		<link href="estilo.css" rel="stylesheet">

  		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>


     		<script type="text/javascript">
            
		//Criação de uma variável utilizando var

      		var cursos = { <?php
            
			//Conexão com o Banco de Dados

          		$strCon = "host=localhost dbname=projetointegrador port=5432 user=postgres password=postgres";
  	 		$con = pg_connect($strCon);

			//Executar uma consulta

            		$sql = "SELECT * from curso ORDER by numero";
            		$consulta = pg_query($con, $sql);
        
            		$linhas = pg_num_rows($consulta); 
                                
            	for($i=0; $i<$linhas; $i++){  
                	$dados = pg_fetch_row($consulta);       
               			echo $i . ":'" . $dados[0] ."',";
            	}                                  
            
            ?> null:'' }

        var fillCurso = function(sel) {
            if(sel.selectedIndex >= 0) {
                document.getElementById('txtNumCurso').value = cursos[ sel.selectedIndex ]
            }
        }
       
    		</script>
  
  	</head>
  
<body>
    
	<div class="container">
		<div class="jumbotron" align="center">
    			<img  width="400px" height="100px" src="imagens/siistema.png"/>
		</div>
		
		<div class="menu-container">	
			<ul class="menu clearfix" >
				<li><a href="principal.php">Home</a></li>
					
				<div align="right">
					<a href="logout.php">LOGOUT</a>
				</div>
			</ul>
		</div>
	
                            <h2>Relação aluno e nota</h2><hr>

                        
                        <form name="" action="relatorio1.php" method="POST">
                            <div class="panel-body">
                               
                                <div class="tab-content">
                                  
                                    <br>
                                        <div class="form-group col-md-4 id="an">
                                            <label>Ano</label>
                                            	<input type="text" class="form-control" required="" maxlength="4" pattern="[0-9]+$" title="Apenas números" name="txtAno">     
                                        </div>

                                        <div class="form-group col-md-4" id="semestre">
                                            <label>Semestre</label>
                                            	<input type="number" class="form-control" required name="txtSem" min="1" max="2">
                                        </div>
                                      
                                        <div class="form-group col-md-4" id="fCurso">
                                            <label>Curso</label>
                                            	<select class="form-control" id="txtNum" required name="txtNum" 							onchange="fillCurso(this)">


	<?php 

		//Conexão com o Banco de Dados

    		$strCon = "host=localhost dbname=projetointegrador port=5432 user=postgres password=postgres";
  		$con = pg_connect($strCon);

		//Executar uma consulta
    
        	$sql = "SELECT * from curso ORDER by numero";
        	$consulta = pg_query($con, $sql);
        
        	$linhas = pg_num_rows($consulta); 
                                
        	for($i=0; $i<$linhas; $i++){
  
            		$dados = pg_fetch_row($consulta);  
     
            		echo "<option>".$dados[1]."</option>";
        	} 

        	echo "<option selected>Selecione o curso</option>";
                                        
	?>

                                            </select>
                                        </div>
                                       
	<input type="hidden" id="txtNumCurso" name="txtNumCurso">
	
	<div class="clearfix"></div>
	</br>

	<div class="container" align="center">
		<button type="submit"name="Enviar" value = "Enviar" class="btn btn-primary">Gerar</button>
    		<a href="principal.php"><button type="button" name="Cancelar" value = "Cancelar" class="btn btn-danger">Cancelar</button></a> 
        </div>

		</form>
	</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  
  </body>
</html>
