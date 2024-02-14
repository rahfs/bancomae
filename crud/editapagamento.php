<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../css/listapagamento.css" type="text/css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
    <style>
    button a {
      color: black;
    }

    button a:hover{
      text-decoration: none;
    }
    </style>
    
</head>
<body>
 <?php
$dsn ='mysql:dbname=bancocurso;host=127.0.0.1';
$user ='root';
$password='';

try{
    $dbh= new PDO($dsn, $user, $password);
} catch(PDOException $e){
    echo 'Connection failed'. $e->getMessage();
}


$id= $_GET['id_pagamento'];

$sql = "SELECT * FROM alunos 
                inner join pagamento on id_pagaluno = id_aluno 
                inner join mes on mes.id_mes = pagamento.id_mes 
                inner join formadepagamento on id_forma = forma_pag  where id_pagamento=$id";
 foreach($dbh->query($sql)as $row){
echo'<div id="addEmployeeModal" >
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../crud/atualizapagamento.php" method="POST">
                    <div class="modal-header"> 
                        <h4 class="modal-title">Editar pagamento</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body"> 

                        <div class="form-group">
                            <label>Nome </label>
                            <select class="form-control" id="id_pagaluno" name="id_pagaluno">
                                <option value="'.$row['id_pagaluno'].'">'.$row['nome'].'</option>';}?>
                             <?php
                                        $sqlaluno="SELECT * from alunos inner join pagamento on id_pagamento = alunopag order by nome asc";            
                                        foreach($dbh->query($sqlaluno) as $row){
                                        echo'
                                        <option value= '.$row['id_pagaluno'].' >' .$row['nome'].' </option>';
                                         }?>
                          </select>
                        </div>
                        <div class="form-group">
                        <label>Mês </label>
                        <select class="form-control" id="id_mes" name="id_mes" >

                        
                                
                                <?php
                                $sqlmes = "SELECT * FROM mes m 
                                inner join pagamento p on m.id_mes = p.id_mes 
                                where id_pagamento=$id";
                                foreach($dbh->query($sqlmes)as $row){
                                
                                echo'
                                <option value="'.$row['id_mes'].'">'.$row['nome_mes'].'</option>';}?>
                                
                                
                                <option value="1">Janeiro</option>
                                <option value="2">Fevereiro</option>
                                <option value="3">Março</option>
                                <option value="4">Abril</option>
                                <option value="5">Maio</option>
                                <option value="6">Junho</option>
                                <option value="7">Julho</option>
                                <option value="8">Agosto</option>
                                <option value="9">Setembro</option>
                                <option value="10">Outubro</option>
                                <option value="11">Novembro</option>
                                <option value="12">Dezembro</option>
                        </select>
                        </div> 

                        <div class="form-group">
                            <label>Forma de pagamento </label>
                                <select class="form-control" id="forma_pag" name="forma_pag">

                                <?php
                                $sql = "SELECT * FROM pagamento  
                                inner join formadepagamento on id_forma = forma_pag  
                                where id_pagamento=$id";
                                foreach($dbh->query($sql)as $row){

                                    echo'<option value="'.$row['id_forma'].'">'.$row['nome_forma'].'</option>';}?>
                                    <option value="1">Dinheiro</option>
                                    <option value="2">Cartão</option>
                                    <option value="3">Pix</option>
                                </select>
                        </div>
                        <?php
                        echo'
                        <div class="form-group">
                            <label>Valor pagamento </label>
                            <input type="text" class="form-control" name="valor_pago"  value="'.$row['valor_pago'].'">
                        </div>
			            <div class="form-group">
                            <label>Data do pagamento </label>
                            <input type="date" class="form-control" name="data_pag"  value="'.$row['data_pag'].'">
                        </div>
                        
                        <div class="form-group " >
                            <label>Descrição </label>
                            <input type="text" class="form-control" name="descricao" value="'.$row['descricao'].'">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default"><a href="../pagamento/listapagamento.php">Cancelar</a></button>
                        <input type="submit" class="btn btn-info" value="Save">
                    </div>
                    <input type="hidden" name="id_pagamento" value="'.$row['id_pagamento'].'">
                </form>
            </div>
        </div>
    </div>';
 ?>}
    ?>
</body>

</html>