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
?>

<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../css/quarta.css" type="text/css">
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
<body  style="background-color:#b8b7b4;">

<script type="text/javascript">
      $(document).ready(function(){
        $("input[name='nomepet']").blur(function(){
          var $nome = $("input[name='nome']");
          $.getJSON('function.php',{
            nomepet:$(this).val()
          },function(json){
              $nome.val(json.nome);
            });
        });
      });
</script>


<div class="d-flex flex-row">
    <div class="dashboard">
        <div class="dashboard-nav">
            <header>
                <a href="" class="brand-logo">
                <i class="fa fa-cog fa-spin fa-3x fa-fw"></i> <span>Marta Freitas</span></a>
            </header>
            <nav class="dashboard-nav-list">
            <div class="nav-item-divider"></div>

                <a href="../index.html" class="dashboard-nav-item active">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            <div class='dashboard-nav-dropdown'>
                <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                    <i class="fas fa-photo-video"></i> Turmas
                </a>
                <div class='dashboard-nav-dropdown-menu'>
                    <a href="../turmas/quarta.php" class="dashboard-nav-dropdown-item">Quarta</a>
                    <a href="../turmas/quinta.php" class="dashboard-nav-dropdown-item">Quinta</a>
                    <a href="../turmas/sexta.php" class="dashboard-nav-dropdown-item">Sexta</a>
                    <a href="../turmas/sabado.php" class="dashboard-nav-dropdown-item">Sabado</a>
                 </div>
            </div>
            <div class='dashboard-nav-dropdown'>
                <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                    <i class="fas fa-users"></i> Alunos
                </a>
                <div class='dashboard-nav-dropdown-menu'>
                    <a href="../paginas/alunolista.php" class="dashboard-nav-dropdown-item">Todos Alunos</a>
                    <a href="../paginas/alunolista2.php" class="dashboard-nav-dropdown-item">Alunos sem turma</a>
                     </div>
             </div>
             <div class='dashboard-nav-dropdown'>
                 <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle active">
                     <i class="fas fa-money-check-alt"></i> Pagamento
                 </a>
                 <div class='dashboard-nav-dropdown-menu'>
                     <a href="../paginas/pagamentolista.php" class="dashboard-nav-dropdown-item ">Lista de pagamentos</a>
                     
                 </div>
             </div>
             </nav>
        </div><!--fim div nav-->
		
			<div class="dashboard-nav2"><center>08:00</center>
				<hr class ="hr1">
				<table>
					<tr>
					  <th>Nome</th>
					  
					</tr>
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
					$sql='SELECT * FROM alunos 
					where turma = 1';

					foreach($dbh->query($sql)as $row) {
							  
					 echo '<tr>';
					 echo '<td class="td1">'. $row['nome'] . '</td>';
					 echo '<td >';
					 echo '<a  href="../paginas/alunoinfo.php?id='.$row['id_aluno'].'" style="color:#4286F0" >
					  <i class="material-icons assignment_late"  data-toggle="tooltip " title="Info Consulta">&#xe85f; </i>
					 </a>';
		 
					 echo '<a class="editpet" data-toggle="modal">
					 <i class="material-icons calendar_today" title="Editar Consulta">&#xe935;</i>
					  </a>';
					  echo '</td></tr>';
					 }
							
					?>
					
				  </table>
			</div>
			<div class="dashboard-nav2"><center>10:00</center>
				<hr class ="hr1">
				<table>
					<tr>
					  <th>Nome</th>
					  <th></th>
					</tr>
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
					$sql='SELECT * FROM alunos 
					where turma = 2';

					foreach($dbh->query($sql)as $row) {
							  
					 echo '<tr>';
					 echo '<td class="td1">'. $row['nome'] . '</td>';
					 echo '<td >';
					 echo '<a class="info" data-toggle="modal" href="../paginas/alunoinfo.php?id='.$row['id_aluno'].'" style="color:#4286F0" >
					  <i class="material-icons assignment_late"  data-toggle="tooltip"title="Info Consulta">&#xe85f; </i>
					 </a>';
		 
					 echo '<a class="editpet" data-toggle="modal">
					 <i class="material-icons calendar_today" title="Editar Consulta">&#xe935;</i>
					  </a>';
					  echo '</td>';
					 }
							
					?>
					
				  </table>
			</div>
		   
		
	</div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>