<?php
require_once("cabecalho.php");

if (!isset($_GET['id'])) {
    die("ID do contrato não informado.");
}

require("conexao.php");

$id = (int) $_GET['id'];

try {
    $sql = "SELECT c.*, 
                   p.nome AS nome_proprietario,
                   l.nome AS nome_locatario,
                   i.endereco AS endereco_imovel
            FROM contratos_locacao c
            INNER JOIN proprietarios p ON c.id_proprietario = p.id
            INNER JOIN locatarios l ON c.id_locatario = l.id
            INNER JOIN imoveis i ON c.id_imovel = i.id
            WHERE c.id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $contrato = $stmt->fetch();

    if (!$contrato) {
        die("Contrato não encontrado.");
    }
} catch (Exception $e) {
    die("Erro ao consultar contrato: " . $e->getMessage());
}
?>

<div class="container mt-5 mb-5">
    <h2>Detalhes do Contrato de Locação</h2>

    <div class="mb-2"><strong>ID:</strong> <?= $contrato['id'] ?></div>
    <div class="mb-2"><strong>Data Início:</strong> <?= $contrato['data_inicio'] ?></div>
    <div class="mb-2"><strong>Data Fim:</strong> <?= $contrato['data_fim'] ?></div>
    <div class="mb-2"><strong>Proprietário:</strong> <?= htmlspecialchars($contrato['nome_proprietario']) ?></div>
    <div class="mb-2"><strong>Locatário:</strong> <?= htmlspecialchars($contrato['nome_locatario']) ?></div>
    <div class="mb-2"><strong>Imóvel:</strong> <?= htmlspecialchars($contrato['endereco_imovel']) ?></div>

    <button type="button" class="btn btn-secondary" onclick="history.back()">Voltar</button>
</div>

<?php require_once("rodape.php"); ?>
