<?php
require_once __DIR__ . '/../banco.php';

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

$dbh = null;
$listaPagamentos = [];
try {
    $dbh = Banco::conectar();
    $sql = "SELECT p.id_pagamento, p.valor_pago, p.data_pag, a.nome 
            FROM pagamento p 
            INNER JOIN alunos a ON p.id_pagaluno = a.id_aluno 
            ORDER BY p.id_pagamento DESC";
    $listaPagamentos = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
} catch (Throwable $e) {
    $dbh = null;
}
?>

<?php require_once __DIR__ . '/../components/header.php'; ?>

<section>
    <div class="main-container">
        <div class="table-container scrollable">
            <div class="table-row title-row">
                <div class="row-item"><p>Histórico de Pagamentos</p></div>
            </div>
            <div class="table-row heading">
                <div class="row-item">Aluno</div>
                <div class="row-item">Valor</div>
                <div class="row-item">Data</div>
                <div class="row-item">Ações</div>
            </div>
            
            <?php if (!$dbh): ?>
                <div class="table-row"><div class="row-item">Erro de conexão</div></div>
            <?php else: ?>
                <?php foreach ($listaPagamentos as $row): ?>
                <div class="table-row">
                    <div class="row-item"><?= e((string)($row['nome'] ?? '')) ?></div>
                    <div class="row-item">R$ <?= e((string)($row['valor_pago'] ?? '')) ?></div>
                    <div class="row-item"><?= e((string)($row['data_pag'] ?? '')) ?></div>
                    <div class="row-item">
                        <div class="table-actions">
                            <a href="pagamentoinfo.php?id_pagamento=<?= $row['id_pagamento'] ?>" class="action-btn btn-info-icon" title="Ver Detalhes">
                                <i class="material-icons">visibility</i>
                            </a>
                            <a href="../crud/pagamentoedita.php?id_pagamento=<?= $row['id_pagamento'] ?>" class="action-btn btn-edit-icon" title="Editar">
                                <i class="material-icons">edit</i>
                            </a>
                            <a href="../crud/pagamentodeleta.php?id_pagamento=<?= $row['id_pagamento'] ?>" 
                               class="action-btn btn-delete-icon" 
                               title="Excluir"
                               onclick="return confirm('Excluir registro financeiro?');">
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
