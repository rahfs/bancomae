<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../css/listaaluno.css" type="text/css">
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


$id= $_GET['id_aluno'];

$sql = "SELECT * FROM alunos 
                where id_aluno=$id";

 foreach($dbh->query($sql)as $row){
echo'<div id="addaluno">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="../crud/alunoatualiza.php" method="POST">
                            <div class="modal-header"> 
                                <h4 class="modal-title">Cadastrar pagamento</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body"> 

                                <div class="form-group">
                                    <label>Nome </label>
                                    <input type="text" class="form-control" id="nome" name="nome" value="'.$row['nome'].'" >
                                </div>

                                <div class="form-group">
                                    <label>Endereço </label>
                                    <input type="text" class="form-control" id=endereco"" name="endereco" value="'.$row['endereco'].'">
                                </div> 

                                <div class="form-group">
                                    <label>Turma </label>
                                    <select class="form-control" id="turma" name="turma">';?>
                                    <?php
                                     $sql = "SELECT * FROM alunos inner join turma on turma=id_turma  where id_aluno=$id";

                                        foreach($dbh->query($sql)as $row){
                                            echo'
                                        <option value="'.$row['id_turma'].'"> '.$row['dia'].' / '.$row['horario'].'</option>';}?>
                                        
                                            <option value="0">--------------</option>
                                            <option value="1">Quarta / 08:00</option>
                                            <option value="2">Quarta / 10:00</option>
                                            <option value="3">Quinta / 14:00</option>
                                            <option value="4">Sexta / 09:00</option>
                                            <option value="5">Sabado / 08:00</option>
                                            <option value="6">Sabado / 13:00</option>
                                            <option value="7">Sabado / 15:00</option>
                                    </select>
                                </div>

                                <?php
                                echo'
                                <div class="form-group">
                                    <label> Data de Entrada </label>
                                    <input type="date" class="form-control"  name="data_ent" value="'.$row['data_ent'].'"> 
                                </div>

                                <div class="form-group">
                                    <label>Data do pagamento </label>
                                    <input type="date" class="form-control"  name="data_venc" value="'.$row['data_venc'].'">
                                </div>
                        
                                <div class="form-group " >
                                    <label>Telefone 1 </label>
                                    <input type="text" class="form-control"  name="tel1" value="'.$row['tel1'].'" >
                                </div>
                                <div class="form-group " >
                                    <label>Telefone 2 </label>
                                    <input type="text" class="form-control"  name="tel2" value="'.$row['tel2'].'" >
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-default"><a href="../paginas/alunolista2.php">Cancelar</a></button>
                                <input type="submit" class="btn btn-info" value="Save">
                            </div>
                         <input type="hidden" name="id_aluno" value="'.$row['id_aluno'].'">
                        </form>
                    </div><!-- modal content -->
                </div><!-- modal dialog -->
            </div><!-- fim cadastro -->
           ';}?>
    
</body>

</html>