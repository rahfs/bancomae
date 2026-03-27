<?php
require_once __DIR__ . '/../banco.php';

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

$dbh = null;
$turmaA = [];
$turmaB = [];

try {
    $dbh = Banco::conectar();
    // 14:00 (Turma 1)
    $turmaA = $dbh->query("SELECT nome FROM alunos WHERE turma = 1 ORDER BY nome ASC")->fetchAll(PDO::FETCH_ASSOC);
    // 19:00 (Turma 2)
    $turmaB = $dbh->query("SELECT nome FROM alunos WHERE turma = 2 ORDER BY nome ASC")->fetchAll(PDO::FETCH_ASSOC);
} catch (Throwable $e) {
    $dbh = null;
}
?>

<?php require_once __DIR__ . '/../components/header_lista.php'; ?>

<section>
    <div class="main-container">
        <!-- Turma A (14:00) -->
        <div class="table-container">
            <div class="table-row title-row">
                <div class="row-item"><p>Quinta / 14:00</p></div>
            </div>
            <div class="table-row heading">
                <div class="row-item">Nome do Aluno</div>
            </div>
            <?php foreach ($turmaA as $row): ?>
            <div class="table-row">
                <div class="row-item"><?= e((string)$row['nome']) ?></div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Turma B (19:00) -->
        <div class="table-container">
            <div class="table-row title-row">
                <div class="row-item"><p>Quinta / 19:00</p></div>
            </div>
            <div class="table-row heading">
                <div class="row-item">Nome do Aluno</div>
            </div>
            <?php foreach ($turmaB as $row): ?>
            <div class="table-row">
                <div class="row-item"><?= e((string)$row['nome']) ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

</body>
</html>
