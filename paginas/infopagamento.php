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
    <script>
        const mobileScreen = window.matchMedia("(max-width: 990px )");
$(document).ready(function () {
    $(".dashboard-nav-dropdown-toggle").click(function () {
        $(this).closest(".dashboard-nav-dropdown")
            .toggleClass("show")
            .find(".dashboard-nav-dropdown")
            .removeClass("show");
        $(this).parent()
            .siblings()
            .removeClass("show");
    });
    $(".menu-toggle").click(function () {
        if (mobileScreen.matches) {
            $(".dashboard-nav").toggleClass("mobile-show");
        } else {
            $(".dashboard").toggleClass("dashboard-compact");
        }
    });
});
    </script>
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


$id= $_GET['id'];

$sql = "SELECT * FROM alunos 
                inner join pagamento on id_pagaluno = id_aluno 
                inner join mes on mes.id_mes = pagamento.id_mes 
                inner join formadepagamento on id_forma = forma_pag  where id_pagamento=$id";
 foreach($dbh->query($sql)as $row){
echo'
<div id="editEmployeeModal" >
  <div class="modal-dialog">
   <div class="modal-content">
    <form action="listapagamento.php" method="GET">
     <div class="modal-header">      
      <h4 class="modal-title">Informação do pagamento</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body">

      <div class="form-group">
       <label>Nome </label>
       <input type="text" class="form-control"  
       name="nome" value="'.$row['nome'].'" disabled>
      </div>

      <div class="form-group">
       <label>Mês </label>
       <input type="text" class="form-control"
        name="id_mes" value="'.$row['nome_mes'].'" disabled>
      </div>

      <div class="form-group">
       <label>Forma de pagamento </label>
       <input type="text" class="form-control" 
       name="valor_pag" value="'.$row['nome_forma'].'" disabled>
      </div>
      
      <div class="form-group">
        <label>Valor pagamento </label>
        <input type="text" class="form-control" name="valor_pago" value="'.$row['valor_pago'].'" disabled>
      </div>
	<div class="form-group">
        <label>Data de pagamento </label>
        <input type="text" class="form-control" name="data_pag" value="'.$row['data_pag'].'" disabled>
      </div>
                        
      <div class="form-group " >
         <label>Descrição </label>
        <input type="text" class="form-control" name="descricao" value="'.$row['descricao'].'" disabled>
       </div>
     </div>
       <div class="modal-footer">
           <input type="submit" class="btn btn-info" value="Voltar">
       </div>
      
     </form>
   </div>
  </div>
 </div>  ';
}
    ?></body></html>