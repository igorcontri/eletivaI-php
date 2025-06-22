<?php
require_once("cabecalho.php");

function consultaImovel($id){
    require("conexao.php");
    try {
        $sql = "SELECT * FROM imoveis WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $imovel = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$imovel){
            die("Erro ao consultar o imóvel!");
        } else {
            return $imovel;
        }
    } catch(Exception $e) {
        die("Erro ao consultar imóvel: " . $e->getMessage());
    }
}

function alterarImovel($endereco, $valor, $area_total, $area_util, $id){
    require("conexao.php");
    try {
        $sql = "UPDATE imoveis SET endereco = ?, valor = ?, area_total = ?, area_util = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$endereco, $valor, $area_total, $area_util, $id])){
            header('location: imoveis.php?edicao=true');
        } else {
            header('location: imoveis.php?edicao=false');
        }
    } catch (Exception $e) {
        die("Erro ao alterar imóvel: " . $e->getMessage());
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $endereco = $_POST['endereco'];
    $valor = floatval(str_replace(',', '.', str_replace('.', '', $_POST['valor'])));
    $area_total = floatval($_POST['area_total']);
    $area_util = floatval($_POST['area_util']);
    $id = $_POST['id'];
    alterarImovel($endereco, $valor, $area_total, $area_util, $id);
} else {
    if (!isset($_GET['id'])) {
        die("ID do imóvel não informado.");
    }
    $imovel = consultaImovel($_GET['id']);
}
?>

<div class="container mt-5 mb-5">
    <h2>Alterar Dados do Imóvel</h2>

    <form method="post">
        <input type="hidden" name="id" value="<?= $imovel['id'] ?>">

        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input id="endereco" name="endereco" type="text" class="form-control" required value="<?= htmlspecialchars($imovel['endereco']) ?>">
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">Valor (R$)</label>
            <input id="valor" name="valor" type="text" class="form-control" required value="<?= number_format($imovel['valor'], 2, ',', '.') ?>">
        </div>

        <div class="mb-3">
            <label for="area_total" class="form-label">Área Total (m²)</label>
            <input id="area_total" name="area_total" type="number" step="0.01" class="form-control" required value="<?= htmlspecialchars($imovel['area_total']) ?>">
        </div>

        <div class="mb-3">
            <label for="area_util" class="form-label">Área Útil (m²)</label>
            <input id="area_util" name="area_util" type="number" step="0.01" class="form-control" required value="<?= htmlspecialchars($imovel['area_util']) ?>">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
        <button type="button" class="btn btn-secondary" onclick="history.back()">Voltar</button>
    </form>
</div>

<?php
require_once("rodape.php");
?>
