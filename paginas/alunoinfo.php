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


$id_aluno= $_GET['id'];

$sql = "SELECT * FROM alunos 
                inner join turma on turma=id_turma  where id_aluno=$id_aluno";

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
                                    <input type="text" class="form-control" id="nome" name="nome" value="'.$row['nome'].'" disabled >
                                </div>

                                <div class="form-group">
                                    <label>Endereço </label>
                                    <input type="text" class="form-control" id=endereco"" name="endereco" value="'.$row['endereco'].'" disabled>
                                </div> 

                                <div class="form-group">
                                    <label>Turma </label>
                                    <input type="text" class="form-control" id="nome" name="nome" value="'.$row['dia'].' / '.$row['horario'].'" disabled>
                                        
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                <label> Data de Entrada </label>
                                   <input type="date" class="form-control" id="data_ent" name="data_ent" value="'.$row['data_ent'].'" disabled> 
                                </div>

                                <div class="form-group">
                                    <label>Data do pagamento </label>
                                    <input type="date" class="form-control" id="data_venc" name="data_venc" value="'.$row['data_venc'].'" disabled>
                                </div>
                        
                                <div class="form-group " >
                                    <label>Telefone 1 </label>
                                    <input type="text" class="form-control" id="tel1" name="tel1" value="'.$row['tel1'].'" disabled>
                                </div>
                                <div class="form-group " >
                                    <label>Telefone 2 </label>
                                    <input type="text" class="form-control" id="tel2" name="tel2" value="'.$row['tel2'].'" disabled>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-default"><a href="../paginas/alunolista.php">Cancelar</a></button>
                                <input type="submit" class="btn btn-info" value="Save">
                            </div>
                        </form>
                    </div><!-- modal content -->
                </div><!-- modal dialog -->
            </div><!-- fim cadastro -->
           ';}?>
    
</body>

</html>