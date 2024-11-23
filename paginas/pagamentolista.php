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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Menu com JavaScript</title>
    <link rel="stylesheet" href="../css/listapagamento.css" />
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
          <li><a href="../index.php">Início</a></li>
          <li>
            <a href="#">Turmas</a>
            <ul class="dropdown">
              <li><a href="../turmas/quarta.php">Quarta</a></li>
              <li><a href="../turmas/quinta.html">Quinta</a></li>
              <li><a href="../turmas/sexta.html">Sexta</a></li>
              <li><a href="../turmas/sabado.html">Sabado</a></li>
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
                <a href="paginas/pagamentolista.php">Lista de pagamentos</a>
              </li>
              <li>
                <a href="paginas/pagamentolista.php">Adicionar pagamentos</a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>

    <!-- header e menu acima-->

    <section>

      <div class="main-container"  ><!-- começo tabela numero aluno -->
                <div class="table-container"  ><!-- coluna 1 -->
                    	<div class="row-item"><p>Lista de Pagamentos</p></div>
                    	<div class="table-row">
        					<div class="row-item">ID</div>
        					<div class="row-item">Nome</div>
        					<div class="row-item">Mês</div>
                            <div class="row-item">Valor Mensal</div>
        					<div class="row-item"> Data de Pagamento</div>
        					<div class="row-item">Forma de Pagamento</div>
        					<div class="row-item">Opções</div>
        				</div>

                        <div class="table-row" >
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
                    inner join pagamento on id_pagaluno = id_aluno 
                    inner join mes on mes.id_mes = pagamento.id_mes 
                    inner join formadepagamento on id_forma = forma_pag order by id_pagamento  desc';
                    
                    foreach($dbh->query($sql)as $row) {
           
           
                   echo'  
                    
                       <div class="row-item">'. $row['id_pagamento'] .'</div>   
                       <div class="row-item">'. $row['nome'] .'</div>
                       <div class="row-item">'. $row['nome_mes'] .'</div>
                       <div class="row-item">'. $row['valor_pago'] .'</div>
                       <div class="row-item">'. $row['data_pag'] .'</div>
                       <div class="row-item">'. $row['nome_forma'] .'</div>
                       <div class="row-item">
                        <a href="pagamentoinfo.php?id='.$row['id_pagamento'].'" style="color:#4286F0" >
                        a
                        </a>
                        <a href="../crud/pagamentoedita.php?id_pagamento='.$row['id_pagamento'].'" >
                        b
                        </a>
                        </div>';
                  
                
                    }?>
                    </div>
                </div><!-- table conteiner -->

        </div> <!-- main--> 
        
        </section>
    
     </div>
 </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>

