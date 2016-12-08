<?php 

	session_start();

	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
	{

    		unset($_SESSION['login']);
    		unset($_SESSION['senha']);
    		session_destroy();
    		header('location: index.html');
	}
	
	 if($_SESSION['categoria'] != 'G'){
        
					echo "

                    			<script type='text/javascript'>                                          

                       			 window.alert('Voce não tem permissão!');
                        		 window.location.href = 'cadastroProjeto.php'; 

                                                                             
                    			</script>


              				 ";

    
        }
 
    $strCon = "host=localhost dbname=projetointegrador port=5432 user=postgres password=postgres";

    $con = pg_connect($strCon);
    

    if ($con) {


        $tema= $_POST['tema'];
        $descricao = $_POST['descricao'];
	$ano = $_POST['ano'];
        $semestre = $_POST["semestre"];
        $modulo = $_POST['modulo'];
        $numeroCurso = $_POST['numeroCurso'];
        $dtInicio = $_POST['dtInicio'];
        $dtTermino = $_POST['dtTermino'];

     
        
        $sql = "select c.nome from curso c where  c.numero = '". $numeroCurso ."'";

        $resultados = pg_query($con, $sql);
        $linhas = pg_num_rows($resultados);

        if($linhas > 0 ){
            $sql="";
            $sql = "INSERT INTO projeto (ano, semestre, modulo, dt_inicio, dt_termino, tema, descricao, num_curso) VALUES ('".$ano."', '".$semestre."', '".$modulo."','".$dtInicio."','".$dtTermino."', '".$tema."' , '".$descricao."' , '".$numeroCurso."');";
           
           
            $res = pg_query($con, $sql);

            $qtd_linhas = pg_affected_rows($res);

            if ($qtd_linhas > 0){
               
		echo "

                    <script type='text/javascript'>                                          

                        window.alert('Cadastro realizado com sucesso!');
                        window.location.href = 'ordem.php'; 

                                                                             
                    </script>


               ";

             
        
            }else{

                echo "

                    <script type='text/javascript'>                                          

                        window.alert('ERRO!');
                        window.location.href = 'ordem.php'; 

                                                                             
                    </script>


               ";

            }

            
         
            }else{

            echo var_dump($numeroCurso);

            die("erro");


           }

                

          }else{

         	die("Impossivel conectar! Erro.");
          }
    
	

?>
