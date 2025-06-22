<?php
require_once("cabecalho.php");

if (!isset($_GET['id'])) {
    die("ID do proprietário não informado.");
}

require("conexao.php");

$id = (int) $_GET['id'];

try {
    $sql = "SELECT * FROM proprietarios WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $proprietario = $stmt->fetch();

    if (!$proprietario) {
        die("Proprietário não encontrado.");
    }
} catch (Exception $e) {
    die("Erro ao consultar o proprietário: " . $e->getMessage());
}
?>

<div class="container mt-5 mb-5">
    <h2>Consultar Proprietário</h2>

    <div class="mb-2">
        <p><strong>Nome:</strong> <?= htmlspecialchars($proprietario['nome']) ?></p>
    </div>

    <div class="mb-2">
        <p><strong>CPF/CNPJ:</strong> <?= htmlspecialchars($proprietario['cpf_cnpj_proprietario']) ?></p>
    </div>

    <div class="mb-2">
        <p><strong>Imóveis Adquiridos:</strong> <?= htmlspecialchars($proprietario['imoveis_adquiridos']) ?></p>
    </div>

    <div class="mb-2">
        <button type="button" class="btn btn-secondary" onclick="history.back()">Voltar</button>
    </div>
</div>

<?php
require_once("rodape.php");
?>
