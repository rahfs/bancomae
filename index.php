<?php
require 'banco.php';


?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tela Inicial</title>
    <link rel="stylesheet" href="css/index.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Arvo&display=swap"
      rel="stylesheet"
    />
  </head>

  <body>
    <header>
      <p>Curso Marta Freitas</p>
    </header>

    <header>
      <nav role="navigation" class="primary-navigation">
        <ul>
          <li><a href="#">Início</a></li>
          <li>
            <a href="#">Turmas</a>
            <ul class="dropdown">
              
              <li><a href="turmas/quinta.php">Quinta</a></li>
              <li><a href="turmas/sexta.php">Sexta</a></li>
              <li><a href="turmas/sabado.php">Sabado</a></li>
            </ul>
          </li>

          <li>
            <a href="#">Alunos</a>
            <ul class="dropdown">
              <li><a href="paginas/alunolista.php">Todos Alunos</a></li>
            </ul>
          </li>

          <li>
            <a href="#">Pagamentos</a>

            <ul class="dropdown">
              <li>
                <a href="paginas/pagamentolista.php">Lista de pagamentos</a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>

    <!-- header e menu acima-->
    <section>

      <div class="main-container"><!-- começo tabela numero aluno -->
                <div class="table-container"><!-- coluna 1 -->
                <div class="table-row">
                    	<div class="row-item"><p>Numero de alunos por turma</p></div>
                        </div>
                    	<div class="table-row">
        					<div class="row-item">Dia</div>
        					<div class="row-item">Horario</div>
        					<div class="row-item">Alunos</div>
        				</div>


       <?php
            $dsn ='mysql:dbname=bancocurso;host=127.0.0.1';
            $user ='root';
            $password='';
            try{
            $dbh= new PDO($dsn, $user, $password);
            } catch(PDOException $e){
            echo 'Connection failed'. $e->getMessage(); } 
            
            $sql = "select dia,horario, count(id_aluno) from alunos 
inner join turma on turma= id_turma 
GROUP by dia asc, horario asc 
order by id_turma";
            foreach($dbh->query($sql)as $row){
           
           
           echo'  
            <div class="table-row">
               <div class="row-item">'.$row['dia'].'</div>
               <div class="row-item">'.$row['horario'].'</div>
               <div class="row-item">'.$row['count(id_aluno)'].'</div>
            </div>';	

            }?>
           </div><!-- table conteiner -->




           <div class="table-container"><!-- coluna 2 -->
           <div class="table-row">
                    	<div class="row-item"><p>Numero de alunos</p></div>
                        </div>
                    	
                        <div class="table-row flex space-around">
        					<div class="row-item">Dia</div>
        					<div class="row-item">Horario</div>
        					<div class="row-item">Alunos</div>
        				</div>


       <?php
            $dsn ='mysql:dbname=bancocurso;host=127.0.0.1';
            $user ='root';
            $password='';
            try{
            $dbh= new PDO($dsn, $user, $password);
            } catch(PDOException $e){
            echo 'Connection failed'. $e->getMessage(); } 
            
            $sql = "select dia,horario, count(id_aluno) from alunos 
inner join turma on turma= id_turma 
GROUP by dia asc, horario asc 
order by id_turma";
            foreach($dbh->query($sql)as $row){
           
           
           echo'  
            <div class="table-row ">
               <div class="row-item">'.$row['dia'].'</div>
               <div class="row-item">'.$row['horario'].'</div>
               <div class="row-item">'.$row['count(id_aluno)'].'</div>
            </div>';	

            }?>
           </div><!-- table conteiner -->




           <div class="table-container"><!-- coluna 3 -->
            <div class="table-row">
                    	<div class="row-item"><p>Numero de Alunos totais</p></div>
            </div>
                    	


       <?php
            $dsn ='mysql:dbname=bancocurso;host=127.0.0.1';
            $user ='root';
            $password='';
            try{
            $dbh= new PDO($dsn, $user, $password);
            } catch(PDOException $e){
            echo 'Connection failed'. $e->getMessage(); } 
            
            $sql = "select count(id_aluno) from alunos 
inner join turma on turma= id_turma 
where id_turma > 0  
order by id_turma";
            foreach($dbh->query($sql)as $row){
           
           
           echo'  
            <div class="table-row ">
               
               <div class="row-item">'.$row['count(id_aluno)'].'</div>
            </div>';	

            }?>
           </div><!-- table conteiner -->




        </div> <!-- main--> 
        
        </section>


   
  </body>
</html>
