<?php
require_once __DIR__ . '/../banco.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$id = $_GET['id_aluno'] ?? null;

if ($id) {
    try {
        $dbh = Banco::conectar();
        $sql = "DELETE FROM alunos WHERE id_aluno = ?";
        $q = $dbh->prepare($sql);
        $q->execute([$id]);
        
        $_SESSION['toast'] = "Aluno excluído com sucesso!";
    } catch (PDOException $e) {
        $_SESSION['toast'] = "Erro ao excluir: " . $e->getMessage();
    }
}

header("Location: ../paginas/alunolista.php");
exit();
?>
