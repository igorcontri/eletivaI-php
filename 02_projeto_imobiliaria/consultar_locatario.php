<?php
require_once("cabecalho.php");

if (!isset($_GET['id'])) {
    die("ID do locatário não informado.");
}

require("conexao.php");

$id = (int) $_GET['id'];

try {
    $sql = "SELECT * FROM locatarios WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $locatario = $stmt->fetch();

    if (!$locatario) {
        die("Locatário não encontrado.");
    }
} catch (Exception $e) {
    die("Erro ao consultar o locatário: " . $e->getMessage());
}
?>

<div class="container mt-5 mb-5">
    <h2>Consultar Locatário</h2>

    <div class="mb-2">
        <p><strong>Nome:</strong> <?= htmlspecialchars($locatario['nome']) ?></p>
    </div>

    <div class="mb-2">
        <p><strong>CPF/CNPJ:</strong> <?= htmlspecialchars($locatario['cpf_cnpj_locatario']) ?></p>
    </div>

    <div class="mb-2">
        <p><strong>Imóveis Locados:</strong> <?= htmlspecialchars($locatario['imoveis_locados']) ?></p>
    </div>

    <div class="mb-2">
        <button type="button" class="btn btn-secondary" onclick="history.back()">Voltar</button>
    </div>
</div>

<?php
require_once("rodape.php");
?>
