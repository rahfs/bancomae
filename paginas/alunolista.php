<?php
require_once __DIR__ . '/../banco.php';

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

$dbh = null;
$alunosComTurma = [];
try {
    $dbh = Banco::conectar();
    $sql = "SELECT a.id_aluno, a.nome, a.endereco, a.tel1, t.dia, t.horario
            FROM alunos a
            INNER JOIN turma t ON a.turma = t.id_turma
            ORDER BY a.nome ASC";
    $alunosComTurma = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
} catch (Throwable $e) {
    $dbh = null;
}
?>

<?php require_once __DIR__ . '/../components/header.php'; ?>

<section>
    <div class="main-container">
        <div class="table-container scrollable">
            <div class="table-row title-row">
                <div class="row-item"><p>Lista de Alunos Matriculados</p></div>
            </div>
            <div class="table-row heading">
                <div class="row-item">Nome</div>
                <div class="row-item">Endereço</div>
                <div class="row-item">Telefone</div>
                <div class="row-item">Dia</div>
                <div class="row-item">Horário</div>
                <div class="row-item">Ações</div>
            </div>
            
            <?php if (!$dbh): ?>
                <div class="table-row"><div class="row-item">Erro de conexão</div></div>
            <?php else: ?>
                <?php foreach ($alunosComTurma as $row): ?>
                <div class="table-row">
                    <div class="row-item"><?= e((string)($row['nome'] ?? '')) ?></div>
                    <div class="row-item"><?= e((string)($row['endereco'] ?? '')) ?></div>
                    <div class="row-item"><?= e((string)($row['tel1'] ?? '')) ?></div>
                    <div class="row-item"><?= e((string)($row['dia'] ?? '')) ?></div>
                    <div class="row-item"><?= e((string)($row['horario'] ?? '')) ?></div>
                    <div class="row-item">
                        <div class="table-actions">
                            <a href="alunoinfo.php?id_aluno=<?= $row['id_aluno'] ?>" class="action-btn btn-info-icon" title="Ver Detalhes">
                                <i class="material-icons">visibility</i>
                            </a>
                            <a href="../crud/alunoedita.php?id_aluno=<?= $row['id_aluno'] ?>" class="action-btn btn-edit-icon" title="Editar">
                                <i class="material-icons">edit</i>
                            </a>
                            <a href="../crud/alunodeleta.php?id_aluno=<?= $row['id_aluno'] ?>" 
                               class="action-btn btn-delete-icon" 
                               title="Excluir"
                               onclick="return confirm('Excluir aluno permanentemente?');">
                                <i class="material-icons">delete</i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

</body>
</html>
