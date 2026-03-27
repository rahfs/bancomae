<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }

require_once __DIR__ . '/../banco.php';

function post(string $key): string {
    return isset($_POST[$key]) ? trim((string)$_POST[$key]) : '';
}

try {
    $dbh = Banco::conectar();
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->exec("SET NAMES utf8mb4");

    $nome = post('nome');
    $endereco = post('endereco');
    $turma = (int) post('turma');
    $data_venc = post('data_venc');
    $tel1 = post('tel1');

    if ($nome !== '') {
        $stmt = $dbh->prepare(
            "INSERT INTO alunos (nome, endereco, turma, data_venc, tel1)
             VALUES (:nome, :endereco, :turma, :data_venc, :tel1)"
        );

        $stmt->execute([
            ':nome' => $nome,
            ':endereco' => $endereco,
            ':turma' => $turma,
            ':data_venc' => $data_venc !== '' ? $data_venc : null,
            ':tel1' => $tel1 !== '' ? $tel1 : null
        ]);
        
        $_SESSION['toast'] = "Aluno '" . htmlspecialchars($nome) . "' cadastrado com sucesso!";
    } else {
        $_SESSION['toast'] = "Erro: O nome do aluno é obrigatório.";
        $_SESSION['toast_type'] = "error";
    }
} catch (Throwable $e) {
    $_SESSION['toast'] = "Erro ao salvar: " . substr($e->getMessage(), 0, 50);
    $_SESSION['toast_type'] = "error";
}

header("Location: ../paginas/alunolista.php");
exit;