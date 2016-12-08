<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href=" bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">
	 

            <script type="text/javascript">
                 
		//Criação de uma variavel 
                     
        	var ds = { <?php
            
           		$str_conexao = "host=127.0.0.1 dbname=projetointegrador port=5432 user=postgres
   			 password=postgres";
    			$con = pg_connect ($str_conexao);

            		if ($con) {

                		$sql = "SELECT * from disciplina ORDER by codigo";
                		$consulta = pg_query($con, $sql);
        
                		$linhas = pg_num_rows($consulta); 
                                
                		for($i=0; $i<$linhas; $i++){  
                    			$dados = pg_fetch_row($consulta);       
                   		 	echo $i . ":'" . $dados[0] ."',";
                		}                                  
            		}
            		?> null:'' }
        	var fillDisciplina = function(sel) {
            		if(sel.selectedIndex >= 0) {
                		document.getElementById('teste').value = ds[ sel.selectedIndex ]
            		}
        	}
        	
		var projeto = { <?php
           
            		$str_conexao = "host=127.0.0.1 dbname=projetointegrador port=5432 user=postgres
    			password=postgres";
    			$con = pg_connect ($str_conexao);
           
            		if ($con) {
                		$sql = "SELECT * from projeto";
                		$consulta = pg_query($con, $sql);
        
                		$linhas = pg_num_rows($consulta); 
                                
                		for($i=0; $i<$linhas; $i++){  
                   			 $dados = pg_fetch_row($consulta);       
                    			echo $i . ":'" . $dados[0] ."',";
                	}                                  
            	}
            	?> null:'' }

            	var fillProjeto = function(sel2) {
                 	if(sel2.selectedIndex >= 0) {
                    		document.getElementById('id_proj').value = projeto[ sel2.selectedIndex ]
                    
                    
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

	</br>

        <h2>Descrição das atividades</h2><hr>

    	<form action="cadastroOrdem.php" method="post" name="form" id="form">

		<div class="panel-body">
                         <div class="tab-content">
				<div>
                                        
                                      <div class="form-group col-md-5" id="fProj">
                                            <label>Tema do projeto</label>
                                            <select class="form-control" onchange="fillProjeto(this)" id="txtSel" required>
					

				<?php 
    					$str_conexao = "host=127.0.0.1 dbname=projetointegrador port=5432 user=postgres
    					password=postgres";
    					$con = pg_connect ($str_conexao);
    					$sql = "select * from projeto";
    					$consulta = pg_query($con, $sql);
        
    					$linhas = pg_num_rows($consulta); 
                             
    					for($i=0; $i<$linhas; $i++){  
        
      
        					$dados = pg_fetch_row($consulta); 
              
        					echo "<option>".$dados[6]."</option>
                        			";
    					} 
    					
						echo "<option selected>Escolha o tema do projeto</option>";                                 
        
				?>
       
                                            </select>
			<div>    
    				<input type="hidden" class="form-control" id="id_proj" name="p">
			</div>

                                        </div>

                                       <div class="form-group col-md-5" id="fDis">
                                            <label>Disciplina</label>
                                            	<select class="form-control"  onchange="fillDisciplina(this)" required>
			<?php 
   				$str_conexao = "host=127.0.0.1 dbname=projetointegrador port=5432 user=postgres
    				password=postgres";
    				$con = pg_connect ($str_conexao);
    
    				$sql = "SELECT * from disciplina ORDER by codigo";
    				$consulta = pg_query($con, $sql);    
    				$linhas = pg_num_rows($consulta); 
                                
    				for($i=0; $i<$linhas; $i++){  
        				$dados = pg_fetch_row($consulta);
            				echo "<option>".$dados[1]."</option>
                        		";
    				} 
    				echo "<option selected>Escolha a disciplina</option>";                                 
    
			?>
                                            </select>

		<div class="clearfix"></div>   
		<div >    
    			<input type="hidden" class="form-control" id="teste" name="d">
		</div>
  

                                 </div>
                                  <div class="clearfix"></div>
                                        

                                        <div class="form-group col-md-5" id="fDesc">
					
					    <label>Descrição:</label>
                                            <textarea class="form-control" rows="4" name="txtDesc" id="txtDesc" required x-moz-errormessage="Preencha o campo DESCRIÇÃO"></textarea>

                                        </div><br>
                                        

                                    </div>
                                
                                </div>
			<div class="clearfix"></div>
                             
			<div class="container" align="center">

                            <button type="submit"name="Enviar" value = "Enviar" class="btn btn-primary">Gravar</button>
                            <a href="principal.php"><button type="button" name="Cancelar" value = "Cancelar" class="btn 						btn-danger">Cancelar</button></a> 
                        </div>


                </div>


	</form>

                      

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  
  </body>
</html>
