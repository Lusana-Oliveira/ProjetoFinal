<html>
<body>
<?php
$str_conexao = "host=127.0.0.1 dbname=projetointegrador port=5432 user=postgres
password=postgres";

$con = pg_connect ($str_conexao);

if ($con){

$login = $_POST ['login'];
$senha = $_POST ['senha'];
$nome = $_POST ['nome'];
$categoria = $_POST ['categoria'];
$situacao = $_POST ['situacao'];


$sql = "select * from usuario where nome = '". $nome ."'";
$consulta = pg_query($con, $sql);
$linhas = pg_num_rows($consulta);
if($linhas > 0 ){
pg_close($con);

}elseif ($linhas==0) {
$sql = "INSERT INTO usuario (login, senha, nome, categoria, situacao) VALUES ('$login','$senha', '$nome', '$categoria', '$situacao');";
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
