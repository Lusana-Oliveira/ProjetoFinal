<html>
<body>
<?php

	session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:index.html');
    }
    if($_SESSION['categoria'] != 'C'){
        
die("<center><h1>Você não tem permissão!</h1></center>");
    
   }

$str_conexao = "host=127.0.0.1 dbname=projetointegrador port=5432 user=postgres
password=postgres";

$con = pg_connect ($str_conexao);

if ($con){

$numero = $_POST ['numero'];
$sigla = $_POST ['sigla'];
$nome = $_POST ['nome'];


$sql = "select * from curso where nome = '". $nome ."'";
$consulta = pg_query($con, $sql);
$linhas = pg_num_rows($consulta);
if($linhas > 0 ){
pg_close($con);

}elseif ($linhas==0) {
$sql = "INSERT INTO curso (numero, sigla, nome) VALUES ('$numero','$sigla', '$nome');";
$res = pg_query($con, $sql);
$qtd_linhas = pg_affected_rows($res);

if ($qtd_linhas > 0){
echo 'Cadastro realizado com sucesso.';
pg_close($con);
}
}
}

?>

</body>
</html>
