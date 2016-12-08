<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro do Projeto</title>
    <link href=" bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">

	<script type="text/javascript">
            
                                                       
            
        var cursos = { <?php
            $strCon = "host=localhost dbname=projetointegrador port=5432 user=postgres password=postgres";

            $con = pg_connect($strCon);
    
            if ($con) {
                $sql = "SELECT * from curso ORDER by numero";
                $resultados = pg_query($con, $sql);
        
                $linhas = pg_num_rows($resultados); 
                                
                for($i=0; $i<$linhas; $i++){  
                    $dados = pg_fetch_row($resultados);       
                    echo $i . ":'" . $dados[1] ."',";
                }                                  
            }
            ?> null:'' }
        var fillCurso = function(sel) {
            if(sel.selectedIndex >= 0) {
                document.getElementById('proj').value = cursos[ sel.selectedIndex ]
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

	<h2>Dados do Projeto</h2><hr>

    	<form method="post" name="form" id="form" action="projeto.php">
			 		
			<div class="form-group col-md-4">
			   <label for="ano">Ano</label>
			   <input class="form-control" name="ano" id="ano"  type="text" size="20" required="" maxlength="4" pattern="[0-9]+$" title="Apenas números" /> 
			</div>

			<div class="form-group col-md-4">
			    <label for="semestre">Semestre</label>
			    <input class="form-control" name="semestre" id="semestre" type="number" size="20" required 					min="1" max="2" required x-moz-errormessage="Preencha o campo SEMESTRE"/>
  			</div>

			<div class="form-group col-md-4">
			    <label for="modulo">Modulo:</label>
                                            <select  class="form-control" name="modulo" id="modulo" required x-moz-errormessage="Selecione o campo MODULO">
						<option>Selecione o modulo</option>
                                                <option>I</option>
                                                <option>II</option>
                                                <option>III</option>
                                                <option>IV</option>
                                                <option>V</option>    
                                            </select> 
			</div>

			<div class="clearfix"></div>

			<div class="form-group col-md-4">
			    <label for="dtInicio">Data Inicio:</label>
			    <input class="form-control" name="dtInicio" id="dtInicio"  type="text" size="20" required x-moz-errormessage="Preencha o campo DATA INICIO"/> 
			</div>

			<div class="form-group col-md-4">
			     <label for="dtTermino">Data Término:</label>
			     <input class="form-control" name="dtTermino" id="dtTermino" type="text" size="20" required x-moz-errormessage="Preencha o campo DATA TERMINO"/> 
			</div>

			<div class="form-group col-md-4">
				<label for="numeroCurso">Número do Curso:</label>
					<select class="form-control" id="numeroCurso" name="numeroCurso" onchange="fillCurso(this)" required x-moz-errormessage="Selecione o campo NUMERO DO CURSO">
					<option>Selecione o número do Curso</option>
				
	<?php 
            
	    $strCon = "host=localhost dbname=projetointegrador port=5432 user=postgres password=postgres";
            $con = pg_connect($strCon);
    
            if ($con) {
                $sql = "SELECT * from curso ORDER by numero";
                $resultados = pg_query($con, $sql);
        
                $linhas = pg_num_rows($resultados); 
                                
                for($i=0; $i<$linhas; $i++){  
                    $dados = pg_fetch_row($resultados);       
                    echo "<option>".$dados[0] . "</option>";
                }                                  
            }
        ?>
					</select> 
				</div>

		
                           <div class="form-group col-md-6">

				<label>Tema do Projeto:</label>
                                <textarea class="form-control" rows="2" placeholder="Máximo 100 caracteres" name="tema" id="tema" required x-moz-errormessage="Preencha o campo TEMA DO PROJETO" maxlength="100"></textarea>
                                        
			   </div>
                           
			   <div class="form-group col-md-6">
				<label>Descrição do Projeto:</label>
                                <textarea class="form-control" rows="2" name="descricao" id="descricao" required x-moz-errormessage="Preencha o campo DESCRIÇÃO DO PROJETO"></textarea>
                           </div>
			
			   <div class="clearfix"></div>

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
