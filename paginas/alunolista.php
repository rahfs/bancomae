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
    <title>Lista de alunos com turma</title>
    <link rel="stylesheet" href="../css/listaaluno.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Arvo&display=swap"
      rel="stylesheet"
    /><meta charset="UTF-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
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
              <!--<li><a href="quarta.php">Quarta</a></li>-->
              <li><a href="../turmas/quinta.php">Quinta</a></li>
              <li><a href="../turmas/sexta.php">Sexta</a></li>
              <li><a href="../turmas/sabado.php">Sabado</a></li>
            </ul>
          </li>

          <li>
            <a href="#">Alunos</a>
            <ul class="dropdown">
              <li><a href="../paginas/alunolista.php">Todos Alunos</a></li>
              <li><a href="../paginas/alunolista2.php">Alunos sem Turma</a></li>
              <li>
                <a href="#addaluno"  data-toggle="modal">Adicionar Aluno</a>
              </li>
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

      <div class="main-container"  ><!-- começo tabela LISTA -->
        <div class="table-container"  ><!-- coluna 1 -->
            <div class="row-item"><p>Lista de Alunos com turma</p></div>
                    	<div class="table-row">
        					<div class="row-item">ID</div>
        					<div class="row-item">Nome</div>
        					<div class="row-item">Endereço</div>
                            <div class="row-item">Telefone</div>
        					<div class="row-item"> Data de Aula</div>
        					<div class="row-item">Horario de Aulato</div>
        					<div class="row-item">Opções</div>
        				</div>
                   
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
                
                inner join turma on turma = id_turma order by nome asc';

				foreach($dbh->query($sql)as $row) {
							  
					echo '
                            <div class="table-row" >
                            <div class="row-item">'. $row['id_aluno'] .'</div>
                            <div class="row-item">'. $row['nome'] .'</div>
                            <div class="row-item">'. $row['endereco'] .'</div>
                            <div class="row-item">'. $row['tel1'] .'</div>
                            <div class="row-item">'. $row['dia'] .'</div>
                            <div class="row-item">'. $row['horario'] .'</div>
                            <div class="row-item">
                                <a href="alunoinfo.php?id='.$row['id_aluno'].'" style="color:#4286F0" >C</a>
					            <a href="../crud/alunoedita.php?id_aluno='.$row['id_aluno'].'" >E </a>
					        </div>
                            </div>  ';
					        }?>
        </div><!-- table conteiner -->
      </div> <!-- main--> 
      </section>

             <!-- Adicionar aluno HTML -->
            <div id="addaluno" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="../crud/alunoadd.php" method="POST">
                            <div class="modal-header"> 
                                <h4 class="modal-title">Cadastrar pagamento</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body"> 

                                <div class="form-group">
                                    <label>Nome </label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o Nome Completo" >
                                </div>

                                <div class="form-group">
                                    <label>Endereço </label>
                                    <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite o endereço">
                                </div> 

                                
                                <div class="form-group">
                                    <label>Turma </label>
                                    <select class="form-control" id="turma" name="turma">
                                        <option value="0">--------------</option>
                                            <option value="1">Quinta / 14:00</option>
                                            <option value="2">Quinta / 19:00</option>
                                            <option value="3">Sexta / 08:00</option>
                                            <option value="4">Sexta / 10:30</option>
                                            <option value="11">Sexta / 14:00</option>
                                            <option value="5">Sabado / 08:00</option>
                                            <option value="6">Sabado / 13:00</option>
                                            <option value="7">Sabado / 15:00</option>
                                        </select>
                                </div>

                                <div class="form-group">
                                <label> Data de Entrada </label>
                                   <input type="date" class="form-control" id="data_ent" name="data_ent" > 
                                </div>

                                <div class="form-group">
                                    <label>Data do pagamento </label>
                                    <input type="date" class="form-control" id="data_venc" name="data_venc">
                                </div>
                        
                                <div class="form-group " >
                                    <label>Telefone 1 </label>
                                    <input type="text" class="form-control" id="tel1" name="tel1" placeholder="Digite o telefone" >
                                </div>
                                <div class="form-group " >
                                    <label>Telefone 2 </label>
                                    <input type="text" class="form-control" id="tel2" name="tel2" placeholder="Digite o telefone" >
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
     </body>

</html>