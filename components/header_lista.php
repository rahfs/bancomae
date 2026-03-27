<?php
// Header compacto para páginas de lista (alunolista, pagamentolista, turmas, etc.)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$baseUrl = '/bancomae';

// Detecta a página atual para highlight de nav
$currentFile = basename($_SERVER['PHP_SELF']);
$currentDir  = basename(dirname($_SERVER['PHP_SELF']));
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BancoMãe - Gestão Escolar</title>
    <link rel="stylesheet" href="<?= $baseUrl ?>/css/listapagamento.css" />
    <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  </head>
  <body>

    <!-- TOAST NOTIFICATIONS -->
    <?php if (isset($_SESSION['toast'])): ?>
      <div class="toast-lista <?= isset($_SESSION['toast_type']) && $_SESSION['toast_type'] == 'error' ? 'toast-danger' : '' ?>">
          <?= htmlspecialchars($_SESSION['toast']) ?>
      </div>
      <?php
         unset($_SESSION['toast']);
         unset($_SESSION['toast_type']);
      ?>
    <?php endif; ?>

    <!-- HEADER LISTA COMPACTO -->
    <header class="lista-header">
      <div class="lista-header-inner">
        <div class="lista-header-brand">
          <img src="<?= $baseUrl ?>/css/logo-school.svg" alt="Logo" class="lista-logo" onerror="this.style.display='none'"/>
          <span class="lista-title">Curso Marta Freitas</span>
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
            </li>
          </ul>
        </nav>
      </div>
    </header>
