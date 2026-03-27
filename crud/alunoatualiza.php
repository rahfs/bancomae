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

    $id_aluno = (int) post('id_aluno');
    $nome = post('nome');
    $endereco = post('endereco');
    $turma = (int) post('turma');
    $data_venc = post('data_venc');
    $tel1 = post('tel1');

    if ($id_aluno > 0 && $nome !== '') {
        $stmt = $dbh->prepare(
            "UPDATE alunos
             SET nome = :nome,
                 endereco = :endereco,
                 turma = :turma,
                 data_venc = :data_venc,
                 tel1 = :tel1
             WHERE id_aluno = :id_aluno"
        );

        $stmt->execute([
            ':id_aluno' => $id_aluno,
            ':nome' => $nome,
            ':endereco' => $endereco,
            ':turma' => $turma,
            ':data_venc' => $data_venc !== '' ? $data_venc : null,
            ':tel1' => $tel1 !== '' ? $tel1 : null
        ]);
        
        $_SESSION['toast'] = "Dados do aluno atualizados!";
    } else {
        $_SESSION['toast'] = "Erro: Dados incompletos para atualização.";
        $_SESSION['toast_type'] = "error";
    }
} catch (Throwable $e) {
    $_SESSION['toast'] = "Erro no banco: " . substr($e->getMessage(), 0, 50);
    $_SESSION['toast_type'] = "error";
}

header("Location: ../paginas/alunolista.php");
exit;