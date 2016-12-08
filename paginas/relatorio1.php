<?php  
    
    session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
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

	
                            <h2>Relatório</h2><hr>
                        
                     <!--Dados da tabela -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Matricula</th>
                                            <th>Nome</th>
                                            <th>Nota</th>
                                           
                                        </tr>
                                    </thead>
                                 
<?php 

	$strCon = "host=localhost dbname=projetointegrador port=5432 user=postgres password=postgres";
  	$con = pg_connect($strCon);

	//Select usando join para a junção/ligação das tabelas 
  
        $sql = "SELECT a.matricula, a.nome, c.nota 
                from aluno a
                join participa c on a.matricula = c.matricula 
                join grupo g on c.id_grupo= g.id
                join projeto e on g.num_proj = e.numero
                where e.semestre = '".$_POST['txtSem']."' and e.ano = '".$_POST['txtAno']."' and e.num_curso = '".$_POST['txtNumCurso']."' order by a.nome";
        $consulta = pg_query($con, $sql);
        
        $linhas = pg_num_rows($consulta); 
                                
        for($i=0; $i<$linhas; $i++){  
            $dados = pg_fetch_row($consulta); 
      
                echo "<tr id='".trim($dados[0])."'>
                        <td>".$dados[0] . "</td>
                        <td>".$dados[1] . "</td>
                        <td >".$dados[2] . "</td>
                   
                    </tr>";
        }
                                        
                                        
?>
                                   
</table>
	

	</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  
  </body>
</html>


