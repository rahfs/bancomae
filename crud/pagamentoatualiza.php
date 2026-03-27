<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }

require_once __DIR__ . '/../banco.php';

function post(string $key): string {
    return isset($_POST[$key]) ? trim((string)$_POST[$key]) : '';
}

try {
    $dbh = Banco::conectar();
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->exec("SET NAMES utf8mb4");

    $id_pagamento = (int) post('id_pagamento');
    $id_pagaluno = (int) post('id_pagaluno');
    $id_mes = (int) post('id_mes');
    $valor_pago = post('valor_pago');
    $forma_pag = (int) post('forma_pag');
    $data_pag = post('data_pag');

    if ($id_pagamento > 0) {
        $stmt = $dbh->prepare(
            "UPDATE pagamento
             SET id_pagaluno = :id_pagaluno,
                 id_mes = :id_mes,
                 valor_pago = :valor_pago,
                 forma_pag = :forma_pag,
                 data_pag = :data_pag
             WHERE id_pagamento = :id_pagamento"
        );

        $stmt->execute([
            ':id_pagamento' => $id_pagamento,
            ':id_pagaluno' => $id_pagaluno,
            ':id_mes' => $id_mes,
            ':valor_pago' => $valor_pago,
            ':forma_pag' => $forma_pag,
            ':data_pag' => $data_pag !== '' ? $data_pag : date('Y-m-d')
        ]);
        
        $_SESSION['toast'] = "Pagamento atualizado com sucesso!";
    } else {
        $_SESSION['toast'] = "ID do pagamento é inválido.";
        $_SESSION['toast_type'] = "error";
    }
} catch (Throwable $e) {
    $_SESSION['toast'] = "Erro ao atualizar: " . substr($e->getMessage(), 0, 50);
    $_SESSION['toast_type'] = "error";
}

header("Location: ../paginas/pagamentolista.php");
exit;