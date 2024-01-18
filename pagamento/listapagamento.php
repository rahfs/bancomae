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
<link rel="stylesheet" href="listapagamento.css" type="text/css">
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

                <a href="#" class="dashboard-nav-item">
                    <i class="fas fa-file-upload"></i> Upload
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
                    <a href="#" class="dashboard-nav-dropdown-item">Todos Alunos</a>
                    <a href="#" class="dashboard-nav-dropdown-item">Cadastrar Alunos</a>
                </div>
             </div>
             <div class='dashboard-nav-dropdown'>
                 <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle active">
                     <i class="fas fa-money-check-alt"></i> Pagamento
                 </a>
                 <div class='dashboard-nav-dropdown-menu'>
                     <a href="../pagamento/listapagamento.php" class="dashboard-nav-dropdown-item ">Lista de pagamentos</a>
                     <a href="#addEmployeeModal" class="dashboard-nav-dropdown-item" data-toggle="modal">Adicionar Pagamento</a>
                     
                 </div>
             </div>
             </nav>
        </div><!--fim div nav-->
        <div class="dashboard-nav2">   
            <div class="divhead">
                <center>Lista de pagamento</center>
                
                    
            </div>
			<hr class ="hr1">
			<table>
				<tr>
                    <th>ID</th>
					<th >Nome</th>
                    <th>Mês</th>
                    <th>Valor Mensal</th>
		    <th style="padding-left:20px;">Data de Pagamento</th>
                    <th style="padding-left:20px;">Forma de Pagamento</th>
					<th>Opções</th>
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
                inner join pagamento on id_pagaluno = id_aluno 
                inner join mes on mes.id_mes = pagamento.id_mes 
                inner join formadepagamento on id_forma = forma_pag order by id_pagamento  desc';

				foreach($dbh->query($sql)as $row) {
							  
					echo '<tr>';
                    echo '<td scope="row">'. $row['id_pagamento'] . '</td>';
                    echo '<td>'. $row['nome'] . '</td>';
                    echo '<td >'. $row['nome_mes'] . '</td>';
					echo '<td class="icon" style="padding-left:15px;">'. $row['valor_pago'] . '</td>';
echo '<td style="padding-left:40px;">'. $row['data_pag'] . '</td>';
					echo '<td style="padding-left:20px;">'. $row['nome_forma'] .'</td>';
                    
                    echo'<td>
					<a href="infopagamento.php?id='.$row['id_pagamento'].'" style="color:#4286F0" >
                        <i class="material-icons" data-toggle="tooltip" title="Detalhes Pagamento">&#xe853;</i>
                    </a>
					<a href="editapagamento.php?id_pagamento='.$row['id_pagamento'].'" >
					    <i class="material-icons calendar_today" style="color:#68DF82;" title="Editar Consulta">&#xE254;</i>
					</a>
					</td>';
                      
					}
						?>	
					
					
				</table>
			</div>
			
            <!-- Adicionar pagamento HTML -->
            <div id="addEmployeeModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="../crud/addpagamento.php" method="POST">
                            <div class="modal-header"> 
                                <h4 class="modal-title">Cadastrar pagamento</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body"> 

                                <div class="form-group">
                                    <label>Nome </label>
                                    <select class="form-control" id="id_pagaluno" name="id_pagaluno">
                                        <option value=""></option>
                                        <?php
                                        $sqlaluno="SELECT * from alunos 
                                        order by nome asc";            
                                        foreach($dbh->query($sqlaluno) as $row){
                                
                                        $id_pagaluno=$row['id_aluno'];
                                        echo'
                                        <option value= '.$row['id_aluno'].' >' .$row['nome'].' </option>';
                                         }?>
                                
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Mês </label>
                                    <select class="form-control" id="id_mes" name="id_mes">
                                        <!--<option value="1">Janeiro</option>-->
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
                                        <option value="1">Dinheiro</option>
                                        <option value="2">Cartão</option>
                                        <option value="3">Pix</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Valor pagamento </label>
                                    <input type="text" class="form-control" name="valor_pago" placeholder="Digite o valor do pagamento" >
                                </div>

                                <div class="form-group">
                                    <label>Data do pagamento </label>
                                    <input type="date" class="form-control" name="data_pag">
                                </div>
                        
                                <div class="form-group " >
                                    <label>Descrição </label>
                                    <textarea class="form-control" name="descricao" placeholder ="Digite uma descrição"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-default"><a href="../../pagina/consulta/agenda.php">Cancelar</a></button>
                                <input type="submit" class="btn btn-info" value="Save">
                            </div>
                        </form>
                    </div><!-- modal content -->
                </div><!-- modal dialog -->
            </div><!-- fim cadastro -->

             <!-- Adicionar pagamento HTML -->
            <div id="addaluno" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="../crud/addaluno.php" method="POST">
                            <div class="modal-header"> 
                                <h4 class="modal-title">Cadastrar pagamento</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body"> 

                                <div class="form-group">
                                    <label>Nome </label>
                                    <input type="text" class="form-control" name="nome_aluno" placeholder="Digite o Nome Completo" >
                                </div>

                                <div class="form-group">
                                    <label>Endereço </label>
                                    <input type="text" class="form-control" name="endereco_aluno" placeholder="Digite o endereço">
                                </div> 

                                <div class="form-group">
                               <label>Turma </label>
                                    <input type="text" class="form-control" name="turma_aluno" >
                                </div>

                                <div class="form-group">
                                <label> Data de Entrada </label>
                                   <input type="date" class="form-control" name="data_entrada" > 
                                </div>

                                <div class="form-group">
                                    <label>Data do pagamento </label>
                                    <input type="date" class="form-control" name="data_pag">
                                </div>
                        
                                <div class="form-group " >
                                    <label>Telefone 1 </label>
                                    <input type="text" class="form-control" name="tel_aluno1" placeholder="Digite o telefone" >
                                </div>
                                <div class="form-group " >
                                    <label>Telefone 2 </label>
                                    <input type="text" class="form-control" name="tel_aluno2" placeholder="Digite o telefone" >
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-default"><a href="../../pagina/consulta/agenda.php">Cancelar</a></button>
                                <input type="submit" class="btn btn-info" value="Save">
                            </div>
                        </form>
                    </div><!-- modal content -->
                </div><!-- modal dialog -->
            </div><!-- fim cadastro -->
     </div>
 </div>
          

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>