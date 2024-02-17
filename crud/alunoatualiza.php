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
$id_aluno=$_POST['id_aluno'];
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$turma = $_POST['turma'];
$data_ent = $_POST['data_ent'];
//$data = date_create_from_format('dd-mm-YYYY',$data_ent);
//$data=$data_ent;
$data_venc=$_POST['data_venc'];
//$data2 = date_create_from_format('dd-mm-YYYY', $data_venc); 
//$data2=$data_venc;
$tel1 = $_POST['tel1'];
$tel2 = $_POST['tel2'];


$sql="update alunos set 
id_aluno='$id_aluno',
nome='$nome',
endereco='$endereco',
turma='$turma',
data_ent='$data_ent',
data_venc='$data_venc',
tel1='$tel1',
tel2='$tel2' 
where id_aluno=$id_aluno";

$count = $dbh->exec($sql);

 header("Location: ../paginas/alunolista.php");
?>