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


$sql="INSERT INTO pagamento( id_pagaluno,id_mes, valor_pago,forma_pag,descricao) 
VALUES ('.$id_pagaluno.','.$id_mes.','$valor_pago','.$forma_pag.','.$descricao.')";
$count = $dbh->exec($sql);
/*


<div class="form-group">

                       <label>Forma de pagamento </label>
                            <select class="form-control" name="forma_pag">
                                <option value=""></option>
                                <?php
                                $sqlforma="SELECT nome_forma from formadepagamento inner join pagamento on forma_pag = id_forma";            
                                foreach($dbh->query($sqlforma) as $row){
                                
                                echo'
                                <option value=" '.$forma_pag.' ">' .$row['nome_forma'].' </option>';
                                 }?>
                                
                            </select>
                        </div>

                           <div class="form-group">
                            <label>Mês </label>
                            <select class="form-control" name="id_mes">
                                <option value=""></option>
                                <?php
                                $sqlmes="SELECT * from mes inner join pagamento on pagamento.id_mes = mes.id_mes";            
                                foreach($dbh->query($sqlmes) as $row){
                                
                                echo'
                                <option value=" '.$id_mes.' ">' .$row['nome_mes'].' </option>';
                                 }?>
                                
                            </select>
                        </div> 
                        $id_mes = $_POST['id_mes'];
                        $forma_pag = $_POST['forma_pag'];
                        
                        
                        */

                        header("Location: ../pagamento/listapagamento.php");
                        ?>