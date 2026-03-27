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

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_aluno'])) {
    $id = (int)$_GET['id_aluno'];
    $dbh = getPdo();
    
    if ($dbh) {
        $stmt = $dbh->prepare("DELETE FROM alunos WHERE id_aluno = :id");
        $stmt->execute([':id' => $id]);
        
        $_SESSION['toast'] = "Aluno removido do sistema!";
        $_SESSION['toast_type'] = "error"; // To show red
    }
}

header("Location: ../paginas/alunolista.php");
exit;
