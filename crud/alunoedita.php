<?php
require_once __DIR__ . '/../banco.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$id = $_GET['id_aluno'] ?? null;
$aluno = null;

if ($id) {
    try {
        $dbh = Banco::conectar();
        $q = $dbh->prepare("SELECT * FROM alunos WHERE id_aluno = ?");
        $q->execute([$id]);
        $aluno = $q->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erro ao carregar aluno: " . $e->getMessage());
    }
}

if (!$aluno) {
    header("Location: ../paginas/alunolista.php");
    exit();
}
?>

<?php require_once __DIR__ . '/../components/header.php'; ?>

<section>
    <div class="main-container">
        <div class="table-container" style="max-width: 600px; margin: 0 auto; padding: 30px;">
            <h2 style="margin-bottom: 20px; color: #3ca0e7;">Editar Aluno</h2>
            <form action="alunoatualiza.php" method="POST">
                <input type="hidden" name="id_aluno" value="<?= $aluno['id_aluno'] ?>">
                
                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: bold; margin-bottom: 5px;">Nome</label>
                    <input type="text" name="nome" value="<?= htmlspecialchars($aluno['nome']) ?>" 
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" required>
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: bold; margin-bottom: 5px;">Endereço</label>
                    <input type="text" name="endereco" value="<?= htmlspecialchars($aluno['endereco'] ?? '') ?>" 
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: bold; margin-bottom: 5px;">Turma</label>
                    <select name="turma" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                        <option value="0" <?= $aluno['turma'] == 0 ? 'selected' : '' ?>>Sem Turma</option>
                        <option value="1" <?= $aluno['turma'] == 1 ? 'selected' : '' ?>>Quinta / 14:00</option>
                        <option value="2" <?= $aluno['turma'] == 2 ? 'selected' : '' ?>>Quinta / 19:00</option>
                    </select>
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: bold; margin-bottom: 5px;">Telefone</label>
                    <input type="text" name="tel1" value="<?= htmlspecialchars($aluno['tel1'] ?? '') ?>" 
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                </div>

                <div style="margin-top: 20px;">
                    <button type="submit" style="background: #3ca0e7; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; font-weight: bold;">Salvar Alterações</button>
                    <a href="../paginas/alunolista.php" style="margin-left: 15px; color: #888;">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</section>

</body>
</html>
