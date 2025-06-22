<?php
require_once("cabecalho.php");

if (!isset($_GET['id'])) {
    die("ID do imóvel não informado.");
}

require("conexao.php");

$id = (int) $_GET['id'];

try {
    $sql = "SELECT * FROM imoveis WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $imovel = $stmt->fetch();

    if (!$imovel) {
        die("Imóvel não encontrado.");
    }
} catch (Exception $e) {
    die("Erro ao consultar o imóvel: " . $e->getMessage());
}
?>

<div class="container mt-5 mb-5">
    <h2>Consultar Imóvel</h2>

    <div class="mb-2">
        <p><strong>Endereço:</strong> <?= htmlspecialchars($imovel['endereco']) ?></p>
    </div>

    <div class="mb-2">
        <p><strong>Valor:</strong> R$ <?= number_format($imovel['valor'], 2, ',', '.') ?></p>
    </div>

    <div class="mb-2">
        <p><strong>Área Total (m²):</strong> <?= htmlspecialchars($imovel['area_total']) ?></p>
    </div>

    <div class="mb-2">
        <p><strong>Área Útil (m²):</strong> <?= htmlspecialchars($imovel['area_util']) ?></p>
    </div>

    <div class="mb-2">
        <button type="button" class="btn btn-secondary" onclick="history.back()">Voltar</button>
    </div>
</div>

<?php
require_once("rodape.php");
?>
