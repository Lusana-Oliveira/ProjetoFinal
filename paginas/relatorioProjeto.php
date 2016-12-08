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

	
                            <h2><?php echo "Relatório do ano de ".$_POST['txtAno']."/".$_POST['txtSem']; ?></h2><hr>
                        
                     <!--Dados da tabela -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nome do curso</th>
	        			    <th>Mod</th>
                                            <th>Disciplina</th>
                                            <th>Tema do P.I</th>
                                            <th>Desc. do P.I</th>
                                            <th>Desc. da atividade</th>
                                            <th>Inicio do P.I</th>
					    <th>Fim do P.I</th>
                                           
                                        </tr>
                                    </thead>
                                 
<?php 

	$strCon = "host=localhost dbname=projetointegrador port=5432 user=postgres password=postgres";
  	$con = pg_connect($strCon);

	//Select usando join para a junção/ligação das tabelas 
  
        $sql = "SELECT c.nome, modulo, d.nome, tema, descricao, t.desc_atividade,dt_inicio,dt_termino
	from projeto p, curso c, composto t, disciplina d where p.num_curso = c.numero and p.numero = t.num_proj and t.cod_disc = d.codigo  and
         p.semestre = '".$_POST['txtSem']."' and p.ano = '".$_POST['txtAno']."' ";
	
        $consulta = pg_query($con, $sql);
        
        $linhas = pg_num_rows($consulta); 
                                
        for($i=0; $i<$linhas; $i++){  
            $dados = pg_fetch_row($consulta);       
                echo "<tr id='".trim($dados[0])."'>
                        <td>".$dados[0] . "</td>
                        <td>".$dados[1] . "</td>
                        <td >".$dados[2] . "</td>
                        <td>".$dados[3] . "</td>
                        <td>".$dados[4] . "</td>
                        <td >".$dados[5] . "</td>
                        <td>".$dados[6] . "</td>
                        <td>".$dados[7] . "</td>                   
                    </tr>";
        }
                                        
                                        
?>
                                   
</table>
	

	</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  
  </body>
</html>




