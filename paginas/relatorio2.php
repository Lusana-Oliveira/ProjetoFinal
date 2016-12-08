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
	
                            <h2>Relação projeto (Ano/Semestre)</h2><hr>

                        
                        <form name="" action="relatorioProjeto.php" method="POST">
                            

			    <div class="panel-body">
                               
                                <div class="tab-content">
                                  
                                    <br>
                                        <div class="form-group col-md-5" id="an">
                                            <label>Ano</label>
                                            	<input type="text" class="form-control" required="" maxlength="4" pattern="[0-9]+$" title="Apenas números" name="txtAno">     
                                        </div>

                                        <div class="form-group col-md-5" id="semestre">
                                            <label>Semestre</label>
                                            	<input type="number" class="form-control" required name="txtSem" min="1" max="2">
                                        </div>
                                      
                                       <div class="clearfix"></div></br>

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
