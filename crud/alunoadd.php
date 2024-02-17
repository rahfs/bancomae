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
$data_ent= $_POST['data_ent'];
$data_venc = $_POST['data_venc'];
$tel1 = $_POST['tel1'];
$tel2 = $_POST['tel2'];


$sql="INSERT INTO alunos
( nome,endereco,turma,data_ent,data_venc,tel1,tel2) 
VALUES (
'$nome',
'$endereco',
'$turma',
'$data_ent',
'$data_venc',
'.$tel1.',
'.$tel2.'
)";
$count = $dbh->exec($sql);

 header("Location: ../paginas/alunolista.php");
?>