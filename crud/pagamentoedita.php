<?php
require_once __DIR__ . '/../banco.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$id = $_GET['id_pagamento'] ?? null;
$pagamento = null;

if ($id) {
    try {
        $dbh = Banco::conectar();
        $q = $dbh->prepare("SELECT p.*, a.nome FROM pagamento p INNER JOIN alunos a ON p.id_pagaluno = a.id_aluno WHERE p.id_pagamento = ?");
        $q->execute([$id]);
        $pagamento = $q->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erro ao carregar pagamento: " . $e->getMessage());
    }
}

if (!$pagamento) {
    header("Location: ../paginas/pagamentolista.php");
    exit();
}
?>

<?php require_once __DIR__ . '/../components/header.php'; ?>

<section>
    <div class="main-container">
        <div class="table-container" style="max-width: 600px; margin: 0 auto; padding: 30px;">
            <h2 style="margin-bottom: 20px; color: #3ca0e7;">Editar Pagamento</h2>
            <form action="pagamentoatualiza.php" method="POST">
                <input type="hidden" name="id_pagamento" value="<?= $pagamento['id_pagamento'] ?>">
                <input type="hidden" name="id_pagaluno" value="<?= $pagamento['id_pagaluno'] ?>">
                
                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: bold; margin-bottom: 5px;">Aluno</label>
                    <input type="text" value="<?= htmlspecialchars($pagamento['nome']) ?>" 
                           style="width: 100%; padding: 10px; background: #f0f0f0; border: 1px solid #ddd; border-radius: 4px;" readonly>
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: bold; margin-bottom: 5px;">Mês Referência (1-12)</label>
                    <input type="number" name="id_mes" value="<?= htmlspecialchars($pagamento['id_mes']) ?>" 
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" required>
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: bold; margin-bottom: 5px;">Valor (R$)</label>
                    <input type="text" name="valor_pago" value="<?= htmlspecialchars($pagamento['valor_pago']) ?>" 
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" required>
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: bold; margin-bottom: 5px;">Data Pagamento</label>
                    <input type="date" name="data_pag" value="<?= htmlspecialchars($pagamento['data_pag']) ?>" 
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" required>
                </div>

                <div style="margin-top: 20px;">
                    <button type="submit" style="background: #3ca0e7; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; font-weight: bold;">Salvar Pagamento</button>
                    <a href="../paginas/pagamentolista.php" style="margin-left: 15px; color: #888;">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</section>

</body>
</html>
