<?php
require_once __DIR__ . '/../banco.php';

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

$dbh = null;
$turmaA = []; // 08:00
$turmaB = []; // 13:00
$turmaC = []; // 15:00

try {
    $dbh = Banco::conectar();
    // 08:00 (Turma 5)
    $turmaA = $dbh->query("SELECT nome FROM alunos WHERE turma = 5 ORDER BY nome ASC")->fetchAll(PDO::FETCH_ASSOC);
    // 13:00 (Turma 6)
    $turmaB = $dbh->query("SELECT nome FROM alunos WHERE turma = 6 ORDER BY nome ASC")->fetchAll(PDO::FETCH_ASSOC);
    // 15:00 (Turma 7)
    $turmaC = $dbh->query("SELECT nome FROM alunos WHERE turma = 7 ORDER BY nome ASC")->fetchAll(PDO::FETCH_ASSOC);
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
                <div class="row-item"><p>Sábado / 08:00</p></div>
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

        <!-- Turma B (13:00) -->
        <div class="table-container">
            <div class="table-row title-row">
                <div class="row-item"><p>Sábado / 13:00</p></div>
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

        <!-- Turma C (15:00) -->
        <div class="table-container">
            <div class="table-row title-row">
                <div class="row-item"><p>Sábado / 15:00</p></div>
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
