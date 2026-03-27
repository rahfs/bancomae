<?php
require_once __DIR__ . '/../banco.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$id = $_GET['id_pagamento'] ?? null;

if ($id) {
    try {
        $dbh = Banco::conectar();
        $sql = "DELETE FROM pagamento WHERE id_pagamento = ?";
        $q = $dbh->prepare($sql);
        $q->execute([$id]);
        
        $_SESSION['toast'] = "Registro de pagamento excluído!";
    } catch (PDOException $e) {
        $_SESSION['toast'] = "Erro ao excluir pagamento: " . $e->getMessage();
    }
}

header("Location: ../paginas/pagamentolista.php");
exit();
?>
