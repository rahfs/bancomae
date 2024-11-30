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

<html lang="pt-BR">
  <head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Menu com JavaScript</title>
    <link rel="stylesheet" href="../css/quarta.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Arvo&display=swap"
      rel="stylesheet"
    /><meta charset="UTF-8"/>
  </head>

  <body>
    <header>
      <p>Curso Marta Freitas</p>
    </header>

    <header>
      <nav role="navigation" class="primary-navigation">
        <ul>
          <li><a href="../index.php">Início</a></li>
          <li>
            <a href="#">Turmas</a>
            <ul class="dropdown">
              <li><a href="quarta.php">Quarta</a></li>
              <li><a href="quinta.php">Quinta</a></li>
              <li><a href="sexta.php">Sexta</a></li>
              <li><a href="sabado.php">Sabado</a></li>
            </ul>
          </li>

          <li>
            <a href="#">Alunos</a>
            <ul class="dropdown">
              <li><a href="../paginas/alunolista.php">Todos Alunos</a></li>
              <li><a href="../paginas/alunolista2.php">Alunos sem Turma</a></li>
            </ul>
          </li>

          <li>
            <a href="#">Pagamentos</a>

            <ul class="dropdown">
              <li>
                <a href="../paginas/pagamentolista.php">Lista de pagamentos</a>
              </li>
              
            </ul>
          </li>
        </ul>
      </nav>
    </header>

    <!-- header e menu acima-->
<section>

      <div class="main-container"><!-- começo turma 8h -->
                <div class="table-container"><!-- coluna 1 -->
                    	<div class="row-item"><p>09:00</p></div>

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
					where turma = 4';

					foreach($dbh->query($sql)as $row) {
           
           
           echo'  
            <div class="table-row">
               <div class="row-item">'.$row['nome'].'</div>
               
            </div>';	

            }?>
           </div><!-- table conteiner -->
            
               
           </div>
        
        </section>

  </body>
</html>
