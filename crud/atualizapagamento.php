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
$descricao = $_POST['descricao'];
$id_pagamento =$_POST['id_pagamento'];
$data_pag = $_POST['data_pag'];
$data = date_create_from_format('dd-mm-YYYY', $data_pag);
$data=$data_pag;

$sql="update pagamento set 
id_pagaluno='$id_pagaluno',
id_mes='$id_mes',
valor_pago='$valor_pago',
forma_pag='$forma_pag',
data_pag='$data_pag',
descricao='$descricao'
where id_pagamento=$id_pagamento";

$count = $dbh->exec($sql);

header("Location: ../pagamento/listapagamento.php");
?>