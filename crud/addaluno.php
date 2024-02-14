<?php
$dsn ='mysql:dbname=bancocurso;host=127.0.0.1';
$user ='root';
$password='';
try{
    $dbh= new PDO($dsn, $user, $password);
}
catch(PDOException $e){
    echo 'Connection failed'. $e->getMessage();
}

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$turma = $_POST['turma'];
$data_entrada = $_POST['data_entrada'];
$data_pag = $_POST['data_pag'];
$tel1 = $_POST['tel1'];
$tel2 = $_POST['tel2'];


$sql="INSERT INTO alunos
( nome,endereco,turma,data_entrada,data_pag,tel1,tel2) 
VALUES (
'.$nome.',
'.$endereco.',
'$turma',
'.$data_entrada.',
'$data_pag',
'.$tel1.',
'.$tel2.'
)";
$count = $dbh->exec($sql);

 header("Location: ../pagamento/listaaluno.php");
?>