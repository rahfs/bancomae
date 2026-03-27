<?php
require_once 'banco.php';

$dbh = null;
$turmas = [];
$totalAlunos = 0;

try {
    $dbh = Banco::conectar();
    
    // Consulta 1 - alunos por turma
    $sqlTurmas = "
        SELECT t.dia, t.horario, COUNT(a.id_aluno) AS total 
        FROM alunos a
        INNER JOIN turma t ON a.turma = t.id_turma
        GROUP BY t.dia, t.horario
        ORDER BY t.id_turma
    ";
    $turmas = $dbh->query($sqlTurmas)->fetchAll(PDO::FETCH_ASSOC);

    // Consulta 2 - total geral ativos
    $sqlTotal = "SELECT COUNT(id_aluno) AS total FROM alunos WHERE turma > 0";
    $totalAlunos = $dbh->query($sqlTotal)->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

} catch (PDOException $e) {
    die('Conexão ao banco falhou: ' . $e->getMessage());
}
?>

<?php require_once 'components/header.php'; ?>

<section>
    <div class="main-container">
        <!-- Dashboard Principal: Alunos por Turma -->
        <div class="table-container">
            <div class="table-row title-row">
                <div class="row-item"><p>Alunos por Turma</p></div>
            </div>
            <div class="table-row heading">
                <div class="row-item">Dia</div>
                <div class="row-item">Horário</div>
                <div class="row-item">Total</div>
            </div>
            <?php foreach ($turmas as $row): ?>
            <div class="table-row">
                <div class="row-item"><?= htmlspecialchars($row['dia']) ?></div>
                <div class="row-item"><?= htmlspecialchars($row['horario']) ?></div>
                <div class="row-item"><?= htmlspecialchars($row['total']) ?></div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Dashboard Secundário: Resumo Geral -->
        <div class="table-container">
            <div class="table-row title-row">
                <div class="row-item"><p>Resumo Total</p></div>
            </div>
            <div class="table-row">
                <div class="row-item"><strong>Ativos Totais</strong></div>
                <div class="row-item"><?= htmlspecialchars($totalAlunos) ?></div>
            </div>
        </div>
    </div>
</section>

</body>
</html>
