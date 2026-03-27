<?php
require_once __DIR__ . '/../banco.php';

session_start();

function getPdo(): ?PDO
{
    try {
        $dbh = Banco::conectar();
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;
    } catch (Throwable $e) {
        return null;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_pagamento'])) {
    $id = (int)$_GET['id_pagamento'];
    $dbh = getPdo();
    
    if ($dbh) {
        $stmt = $dbh->prepare("DELETE FROM financeiro WHERE id_pagamento = :id");
        $stmt->execute([':id' => $id]);
        
        $_SESSION['toast'] = "Registro financeiro apagado!";
        $_SESSION['toast_type'] = "error"; 
    }
}

header("Location: ../paginas/pagamentolista.php");
exit;
