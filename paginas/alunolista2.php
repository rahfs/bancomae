<?php
require_once __DIR__ . '/../banco.php';

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

$dbh = null;
$alunosSemTurma = [];
try {
    $dbh = Banco::conectar();
    $sql = "SELECT id_aluno, nome, endereco, tel1 FROM alunos WHERE turma = 0 ORDER BY nome ASC";
    $alunosSemTurma = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
} catch (Throwable $e) {
    $dbh = null;
}
?>

<?php require_once __DIR__ . '/../components/header.php'; ?>

<section>
    <div class="main-container">
        <div class="table-container scrollable">
            <div class="table-row title-row">
                <div class="row-item"><p>Alunos Aguardando Turma</p></div>
            </div>
            <div class="table-row heading">
                <div class="row-item">Nome</div>
                <div class="row-item">Telefone</div>
                <div class="row-item">Ações</div>
            </div>
            
            <?php if (!$dbh): ?>
                <div class="table-row"><div class="row-item">Erro de conexão</div></div>
            <?php else: ?>
                <?php foreach ($alunosSemTurma as $row): ?>
                <div class="table-row">
                    <div class="row-item"><?= e((string)($row['nome'] ?? '')) ?></div>
                    <div class="row-item"><?= e((string)($row['tel1'] ?? '')) ?></div>
                    <div class="row-item">
                        <div class="table-actions">
                            <a href="alunoinfo.php?id_aluno=<?= $row['id_aluno'] ?>" class="action-btn btn-info-icon" title="Ver Detalhes">
                                <i class="material-icons">visibility</i>
                            </a>
                            <a href="../crud/alunoedita2.php?id_aluno=<?= $row['id_aluno'] ?>" class="action-btn btn-edit-icon" title="Editar">
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
