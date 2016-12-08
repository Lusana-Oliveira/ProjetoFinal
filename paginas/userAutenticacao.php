<?php
	
	session_start();

	try {
      		$str_conexao = "host=127.0.0.1 dbname=projetointegrador port=5432 user=postgres password=postgres";

		$con = pg_connect ($str_conexao);

        if(!$con){
                    
            throw new Exception("Verifique a conexão com seu banco", 1);
                    
        }
       
        $login = $_POST['login'];
        $senha = $_POST['senha'];                       
        
        $user = "select * from usuario where login = '".$login."' and senha = '".$senha."'";
        $userRes = pg_query($con, $user);

        if(pg_num_rows($userRes) > 0 ){
            
            $arrayLista = pg_fetch_array($userRes);
            $login = $arrayLista['login'];
            $senha = $arrayLista['senha'];
            $nome = $arrayLista['nome'];
            $categoria = $arrayLista['categoria'];
            $situacao = $arrayLista['situacao'];
            
            $_SESSION['login'] = $login;
            $_SESSION['senha'] = $senha;
            $_SESSION['categoria']  = $categoria;
            $_SESSION['nome']  = $nome;
            $_SESSION['situacao']  = $situacao;

            if($_SESSION['situacao'] == "I"){
                echo "
                    <script type='text/javascript'>                                          
                        window.alert('Você está inativo!');
                        window.location.href = 'index.html'; 
                                                                        
                        
                    </script>
               ";
            }else{
		
                header("location:principal.php");
            }
         
         }else{

            echo "
                    <script type='text/javascript'>                                          
                        window.alert('Usuário não está cadastrado!');
                        window.location.href = 'index.html'; 
                                                                        
                        
                    </script>
               ";
         }
                
    } 
    catch (Exception $e) {
                
        echo $e->getMessage(), "\n";
        
    }
        
    
        
    	   
?>
