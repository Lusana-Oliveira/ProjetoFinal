<html>
<body>
<?php
$str_conexao = "host=127.0.0.1 dbname=projetointegrador port=5432 user=postgres
password=postgres";

$con = pg_connect ($str_conexao);

if ($con){

$matricula = $_POST ['matricula'];
$nome = $_POST ['nome'];
$sexo = $_POST ['sexo'];
$dataNascimento = $_POST ['dataNascimento'];
$cidade = $_POST ['cidade'];
$uf = $_POST ['uf'];


$sql = "select * from aluno where nome = '". $nome ."'";
$consulta = pg_query($con, $sql);
$linhas = pg_num_rows($consulta);
if($linhas > 0 ){
pg_close($con);

}elseif ($linhas==0) {
$sql = "INSERT INTO aluno (matricula, nome, sexo, dtnasc, cidade, uf) VALUES ('$matricula','$nome', '$sexo','$dataNascimento','$cidade', '$uf');";
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
