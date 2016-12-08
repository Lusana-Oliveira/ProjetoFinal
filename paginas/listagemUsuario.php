<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alterações de Usuario</title>
    <link href=" bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">
	<?php
	
	//Declaração das variáveis

	$parametro = filter_input (INPUT_GET, "parametro");

	//Conexão com o Banco de Dados

	$str_conexao = "host=127.0.0.1 dbname=projetointegrador port=5432 user=postgres password=postgres";

	$con = pg_connect ($str_conexao);

	//Executa a consulta
	
	if($parametro){

		$dados = pg_query ("select login, nome, categoria, situacao from usuario where nome like '$parametro%' order by nome");

	}else{

		$dados = pg_query ("select login, nome, categoria, situacao from usuario order by nome");
	}

	$linha = pg_fetch_assoc ($dados);
	$total = pg_num_rows ($dados);

 	pg_close($con);

	?>
  </head>
  
  <body>
    
    <div class="container">
	<div class="jumbotron" align="center">
    		<img  width="400px" height="100px" src="imagens/siistema.png"/>
	</div>

	<div class="menu-container">	
		<ul class="menu clearfix" >
			<li><a href="principal.php">Home</a></li>
			<li><a href="cadastroUsuario.html">Novo Usuário</a></li>
		<div align="right">
			<a href="logout.php">LOGOUT</a>
		</div>
		</ul>
	</div>
	</br>

	<div id="conteudo" align="center">
 	<form name="form" id="form" action="<?php echo $_SERVER ['PHP_SELF'];?>">
		<h3>Consultar Usuário</h3>
         	<input name="parametro" type="text" placeholder="Insira o nome">
                 <button class="btn btn-primary" type="submit">
                     <span class="glyphicon glyphicon-search"></span>
                 </button></br><hr>
	</form>

	<div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>

                                            <th>Login</th>
					    <th>Nome</th>
                                            <th>Categoria</th>
					    <th>Situação</th>
                                          
                                        </tr>
				     </thead>
		<?php

		if ($total){ do{
		
		?>
	
				<thead>
                                        <tr>
                                            <th><?php echo $linha ['login']?></th>
                                            <th><?php echo $linha ['nome']?></th>
                                            <th><?php echo $linha ['categoria']?></th>
					    <th><?php echo $linha ['situacao']?></th>
					    <th><a href="<?php echo "pagealterarUsuario.php?login=".$linha['login']."&nome=".$linha['nome']."&categoria=".$linha['categoria']."&situacao=".$linha['situacao']?>">Alterar</a></th>
					    <th><a href="<?php echo "removerUsuario.php?login=" . $linha ['login']?>">Excluir</a></th>
                                           
                                        </tr>
				</thead>
		<?php

		} while ($linha = pg_fetch_assoc($dados));
	
		pg_free_result ($dados);}

		
		pg_close($con);

		?>
	
	
                
      
	</div>

	</div>
	</div>
	</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  
  </body>
</html>
	
