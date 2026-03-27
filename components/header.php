<?php
// Certifica-se de que a sessão foi iniciada para os Toasts e o Login
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$baseUrl = '/bancomae';
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BancoMãe - Gestão Escolar</title>
    <!-- CSS Base unificado do Index (que contém flexbox e os estilos das tabelas) -->
    <link rel="stylesheet" href="<?= $baseUrl ?>/css/index.css" />
    <!-- Fonte padrão e icones -->
    <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <style>
      /* TOASTS */
      .toast-success { position: fixed; top: 20px; right: 20px; background-color: #4caf50; color: white; padding: 16px 24px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.15); font-family: inherit; font-size: 15px; z-index: 9999; animation: fadeinout 4s forwards; }
      .toast-danger { background-color: #f44336; }
      @keyframes fadeinout { 0% { opacity: 0; transform: translateY(-20px); } 10% { opacity: 1; transform: translateY(0); } 90% { opacity: 1; transform: translateY(0); } 100% { opacity: 0; transform: translateY(-20px); pointer-events: none; } }
      
      /* NATIVE MODALS */
      .modal { display: none; position: fixed; z-index: 10000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.5); }
      .modal-dialog { background-color: #fff; margin: 3% auto; padding: 0; border-radius: 8px; width: 90%; max-width: 500px; box-shadow: 0 8px 30px rgba(0,0,0,0.2); position: relative; font-family: Helvetica, Arial, sans-serif; overflow: hidden;}
      .modal-header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; padding: 15px 25px; background: #fafafa; }
      .modal-title { margin: 0; font-size: 20px; font-weight: bold; color: #333; }
      .close { background: none; border: none; font-size: 28px; cursor: pointer; color: #999; line-height: 1; padding: 0; }
      .close:hover { color: #333; }
      .modal-body { padding: 20px 25px; }
      .form-group { margin-bottom: 15px; text-align: left; }
      .form-group label { display: block; margin-bottom: 5px; font-weight: bold; color: #555; font-size: 14px; }
      .form-control { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box; font-size: 15px; font-family: inherit;}
      .modal-footer { border-top: 1px solid #eee; padding: 15px 25px; text-align: right; background: #fafafa;}
      .btn { padding: 10px 20px; border-radius: 6px; cursor: pointer; border: none; font-size: 15px; font-weight: bold; font-family: inherit; }
      .btn-info { background-color: #3ca0e7; color: white; }
      .btn-info:hover { background-color: #2a8ccc; }
      .btn-default { background-color: #e0e0e0; color: #555; margin-right: 10px; text-decoration: none; }
      .btn-default:hover { background-color: #ccc; }
    </style>
  </head>
  <body>

    <!-- TOAST NOTIFICATIONS -->
    <?php if (isset($_SESSION['toast'])): ?>
      <div class="toast-success <?= isset($_SESSION['toast_type']) && $_SESSION['toast_type'] == 'error' ? 'toast-danger' : '' ?>">
          <?= htmlspecialchars($_SESSION['toast']) ?>
      </div>
      <?php 
         unset($_SESSION['toast']);
         unset($_SESSION['toast_type']);
      endif; 
    ?>

    <!-- HEADER ÚNICO MODERNO -->
    <header class="main-header unified-header">
      <div class="header-content">
        <img src="<?= $baseUrl ?>/css/logo-school.svg" alt="Logo" class="header-logo" onerror="this.style.display='none'"/>
        <div class="header-titles">
          <h1 class="header-title">Curso Marta Freitas</h1>
          <span class="header-desc">Gestão de alunos, turmas e pagamentos</span>
        </div>
        <nav role="navigation" class="primary-navigation main-nav">
          <ul>
            <li><a href="<?= $baseUrl ?>/index.php">Início</a></li>
            <li>
              <a href="#">Turmas</a>
              <ul class="dropdown">
                <li><a href="<?= $baseUrl ?>/turmas/quinta.php">Quinta</a></li>
                <li><a href="<?= $baseUrl ?>/turmas/sexta.php">Sexta</a></li>
                <li><a href="<?= $baseUrl ?>/turmas/sabado.php">Sábado</a></li>
                <li><a href="<?= $baseUrl ?>/turmas/quarta.php">Quarta</a></li>
              </ul>
            </li>
            <li>
              <a href="#">Alunos</a>
              <ul class="dropdown">
                <li><a href="<?= $baseUrl ?>/paginas/alunolista.php">Todos Alunos</a></li>
                <li><a href="<?= $baseUrl ?>/paginas/alunolista2.php">Alunos sem Turma</a></li>
                <li><a href="javascript:void(0);" onclick="document.getElementById('addaluno').style.display='block'">Adicionar Aluno</a></li>
              </ul>
            </li>
            <li>
              <a href="#">Pagamentos</a>
              <ul class="dropdown">
                <li><a href="<?= $baseUrl ?>/paginas/pagamentolista.php">Lista de pagamentos</a></li>
                <li><a href="javascript:void(0);" onclick="document.getElementById('addpagamento').style.display='block'">Adicionar Pagamento</a></li>
              </ul>
          </ul>
        </nav>
      </div>
    </header>
    
    <!-- MODAIS GLOBAIS EMBUTIDOS NO HEADER -->
    <div id="addaluno" class="modal">
        <div class="modal-dialog">
            <form action="<?= $baseUrl ?>/crud/alunoadd.php" method="POST">
                <div class="modal-header"> 
                    <h4 class="modal-title">Cadastrar Aluno</h4>
                    <button type="button" class="close" onclick="document.getElementById('addaluno').style.display='none'">&times;</button>
                </div>
                <div class="modal-body"> 
                    <div class="form-group">
                        <label>Nome Completo</label>
                        <input type="text" class="form-control" name="nome" placeholder="Digite o Nome Completo" required>
                    </div>
                    <div class="form-group">
                        <label>Endereço</label>
                        <input type="text" class="form-control" name="endereco" placeholder="Digite o Endereço">
                    </div> 
                    <div class="form-group">
                        <label>Turma</label>
                        <select class="form-control" name="turma">
                            <option value="0">Sem Turma</option>
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
                        <label>Data de Entrada</label>
                        <input type="date" class="form-control" name="data_ent"> 
                    </div>
                    <div class="form-group">
                        <label>Vencimento</label>
                        <input type="date" class="form-control" name="data_venc">
                    </div>
                    <div class="form-group">
                        <label>Telefone 1</label>
                        <input type="text" class="form-control" name="tel1" placeholder="Digite o telefone primário" required>
                    </div>
                    <div class="form-group">
                        <label>Telefone 2</label>
                        <input type="text" class="form-control" name="tel2" placeholder="Digite o telefone secundário">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" onclick="document.getElementById('addaluno').style.display='none'">Cancelar</button>
                    <input type="submit" class="btn btn-info" value="Salvar Aluno">
                </div>
            </form>
        </div>
    </div>

    <div id="addpagamento" class="modal">
        <div class="modal-dialog">
            <form action="<?= $baseUrl ?>/crud/pagamentoadd.php" method="POST">
                <div class="modal-header"> 
                    <h4 class="modal-title">Registrar Pagamento</h4>
                    <button type="button" class="close" onclick="document.getElementById('addpagamento').style.display='none'">&times;</button>
                </div>
                <div class="modal-body"> 
                    <div class="form-group">
                        <label>Nome do Aluno</label>
                        <select class="form-control" id="id_pagaluno" name="id_pagaluno">
                            <option value=""></option>
                            <?php
                            $sqlaluno="SELECT * from alunos inner join turma on turma=id_turma 
                            order by nome asc";            
                            foreach($dbh->query($sqlaluno) as $row){
                    
                            $id_pagaluno=$row['id_aluno'];
                            echo'
                            <option value= '.$row['id_aluno'].' >' .$row['nome'].' </option>';
                             }?>
                    
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mês de Referência</label>
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
                        <label>Forma de Pagamento</label>
                        <select class="form-control" name="forma_pag">
                            <option value="1">Dinheiro</option>
                            <option value="2">Cartão</option>
                            <option value="3">Pix</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Valor do Pagamento</label>
                        <input type="text" class="form-control" name="valor_pago" placeholder="Ex: 150.00" required>
                    </div>
                    <div class="form-group">
                        <label>Data de Pagamento</label>
                        <input type="date" class="form-control" name="data_pag" required>
                    </div>
                    <div class="form-group">
                        <label>Descrição / Observação</label>
                        <textarea class="form-control" name="descricao" placeholder ="Opcional..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" onclick="document.getElementById('addpagamento').style.display='none'">Cancelar</button>
                    <input type="submit" class="btn btn-info" value="Registrar">
                </div>
            </form>
        </div>
    </div>

    <!-- Script global de suporte aos modais -->
    <script>
      window.onclick = function(event) {
          if (event.target.classList.contains('modal')) {
              event.target.style.display = "none";
          }
      }
    </script>
