<?php
require_once __DIR__ . '/../banco.php';

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

$dbh = null;
$turmaA = []; // 08:00
$turmaB = []; // 10:30
$turmaC = []; // 14:00

try {
    $dbh = Banco::conectar();
    // 08:00 (Turma 3)
    $turmaA = $dbh->query("SELECT nome FROM alunos WHERE turma = 3 ORDER BY nome ASC")->fetchAll(PDO::FETCH_ASSOC);
    // 10:30 (Turma 4)
    $turmaB = $dbh->query("SELECT nome FROM alunos WHERE turma = 4 ORDER BY nome ASC")->fetchAll(PDO::FETCH_ASSOC);
    // 14:00 (Turma 11)
    $turmaC = $dbh->query("SELECT nome FROM alunos WHERE turma = 11 ORDER BY nome ASC")->fetchAll(PDO::FETCH_ASSOC);
} catch (Throwable $e) {
    $dbh = null;
}
?>

<?php require_once __DIR__ . '/../components/header_lista.php'; ?>

<section>
    <div class="main-container">
        <!-- Turma A (08:00) -->
        <div class="table-container">
            <div class="table-row title-row">
                <div class="row-item"><p>Sexta / 08:00</p></div>
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

        <!-- Turma B (10:30) -->
        <div class="table-container">
            <div class="table-row title-row">
                <div class="row-item"><p>Sexta / 10:30</p></div>
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

        <!-- Turma C (14:00) -->
        <div class="table-container">
            <div class="table-row title-row">
                <div class="row-item"><p>Sexta / 14:00</p></div>
            </div>
            <div class="table-row heading">
                <div class="row-item">Nome do Aluno</div>
            </div>
            <?php foreach ($turmaC as $row): ?>
            <div class="table-row">
                <div class="row-item"><?= e((string)$row['nome']) ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

</body>
</html>
