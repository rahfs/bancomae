<?php
require_once __DIR__ . '/../banco.php';

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

$dbh = null;
$alunos = [];

try {
    $dbh = Banco::conectar();
    // Quarta costuma ser ID 11 ou 12, buscamos pelo nome do dia para garantir
    $sql = "SELECT a.nome FROM alunos a INNER JOIN turma t ON a.turma = t.id_turma WHERE t.dia LIKE '%Quarta%' ORDER BY a.nome ASC";
    $alunos = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
} catch (Throwable $e) {
    $dbh = null;
}
?>

<?php require_once __DIR__ . '/../components/header_lista.php'; ?>

<section>
    <div class="main-container">
        <div class="table-container">
            <div class="table-row title-row">
                <div class="row-item"><p>Alunos da Quarta-Feira</p></div>
            </div>
            <div class="table-row heading">
                <div class="row-item">Nome do Aluno</div>
            </div>
            <?php if (!$dbh): ?>
                <div class="table-row"><div class="row-item">Erro de conexão com o banco.</div></div>
            <?php elseif (empty($alunos)): ?>
                <div class="table-row"><div class="row-item" style="color:#999">Nenhum aluno cadastrado para este dia.</div></div>
            <?php else: ?>
                <?php foreach ($alunos as $row): ?>
                <div class="table-row">
                    <div class="row-item"><?= e((string)$row['nome']) ?></div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

</body>
</html>
