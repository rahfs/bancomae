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

$id_pagaluno = $_POST['id_pagaluno'];
$id_mes = $_POST['id_mes'];
$valor_pago = $_POST['valor_pago'];
$forma_pag = $_POST['forma_pag'];
$data_pag = $_POST['data_pag'];
$descricao = $_POST['descricao'];


$sql="INSERT INTO pagamento
( id_pagaluno,id_mes, valor_pago,forma_pag,data_pag,descricao) 
VALUES (
'.$id_pagaluno.',
'.$id_mes.',
'$valor_pago',
'.$forma_pag.',
'$data_pag',
'.$descricao.'
)";
$count = $dbh->exec($sql);

 header("Location: ../paginas/pagamentolista.php");
?>