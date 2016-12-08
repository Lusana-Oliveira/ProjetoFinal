<!DOCTYPE html>
<html lang="en">
	<head>
    		<meta charset="utf-8">
    		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    		<meta name="viewport" content="width=device-width, initial-scale=1">
    		<title>Acessar P.I</title>
    		<link href=" bootstrap/css/bootstrap.min.css" rel="stylesheet">
    		<link href="estilo.css" rel="stylesheet">
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
		<h2>P.I  dos alunos (as) associado ao curso</h2><hr>
   
		<div class="panel-body">
                	<div class="table-responsive">
                           	<table class="table table-hover">
                            
				    <!--campos da tabela-->
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Curso</th>
                                            <th>Acessar o Projeto Integrador</th>
                                           
                                        </tr>
                                    </thead>
                                 
	<?php 

		$str_conexao = "host=127.0.0.1 dbname=projetointegrador port=5432 user=postgres
		password=postgres";

		$con = pg_connect ($str_conexao);
  		
		//Select usando join para a junção/ligação das tabelas 

		$sql = "SELECT a.nome, c.nome, a.matricula from aluno a
		join participa p on a.matricula = p.matricula
		join grupo g on p.id_grupo = g.id
		join projeto t on g.num_proj = t.numero
		join curso c on t.num_curso = c.numero 
		order by a.nome";

        	$consulta = pg_query($con, $sql);
        
        	$linhas = pg_num_rows($consulta); 
                                
        	for($i=0; $i<$linhas; $i++){  
            		$dados = pg_fetch_row($consulta); 
      
                	echo "
				<tr>
                        	<td>".$dados[0]."</td>
                        	<td>".$dados[1]."</td>
                        	<td><a href='http://www.go.senac.br/faculdade/site/".trim($dados[2])."/' 					target='_blank'>Projeto Integrador</a></td>
                        
                   
                   	 	</tr>";
      	        }
                          ".$dados[2]."              
                                        
	?>

                                   
                                </table></br><br>
			
                        
			</div>            
                    

	</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  
  </body>
</html>


