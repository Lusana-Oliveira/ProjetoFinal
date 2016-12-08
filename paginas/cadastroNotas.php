<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notas</title>
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

	<h2>Lançar Nota</h2><hr>

    	<form name="form" id="form" action="nota.php" method="get"">
		
		<div class="form-group col-md-4">
						
			<label for="matricula">Selecione um aluno:</label> <br>
				<select name="matricula" class="form-control" required x-moz-errormessage="Selecione o campo ALUNO">
					<option value=""></option>



					     <?php

						$strCon = "host=localhost dbname=projetointegrador port=5432 user=postgres 							password=postgres";
  	 					$con = pg_connect($strCon);
						
			
						if($con){

							$sql = "SELECT * from aluno";
							$result = pg_query($con, $sql);
							$linhas = pg_num_rows($result); 
							for($i=0; $i<$linhas; $i++){  
								$dados = pg_fetch_row($result); 
								?>  
								<option name="ativo" value="<?php echo $dados[0]; ?>" /><?php 									echo $dados[1]; ?>
								<?php
							}
						}else{
	
							echo "Conexao falhou!";
						}

						pg_close($con);

						?>
						</select>

			</div>
			<div class="form-group col-md-4">
				<label for="txtNota">Nota:</label>
				<input class="form-control" name="txtNota" id="txtNota" required x-moz-errormessage="Preencha o campo NOTA">
  			</div>
			<div class="clearfix"></div></br></br>


			<div class="container" align="center">
                             <button type="submit"name="Enviar" value = "Enviar" class="btn btn-primary">Gravar</button>
                             <a href="principal.php"><button type="button" name="Cancelar" value = "Cancelar" class="btn btn-danger">Cancelar</button></a>
 
                        </div>

		</form>
	</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  
  </body>
</html>
