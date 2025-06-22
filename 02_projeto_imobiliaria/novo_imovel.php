<?php
require_once("cabecalho.php");

function inserirImovel($endereco, $valor, $area_total, $area_util){
    require("conexao.php");
    try {
        $sql = "INSERT INTO imoveis (endereco, valor, area_total, area_util) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$endereco, $valor, $area_total, $area_util])) {
            header('location: imoveis.php?cadastro=true');
        } else {
            header('location: imoveis.php?cadastro=false');
        }
    } catch (Exception $e) {
        die("Erro ao inserir imóvel: " . $e->getMessage());
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $endereco = $_POST['endereco'];
    $valor = floatval(str_replace(',', '.', str_replace('.', '', $_POST['valor']))); // tratando valor decimal
    $area_total = floatval($_POST['area_total']);
    $area_util = floatval($_POST['area_util']);
    inserirImovel($endereco, $valor, $area_total, $area_util);
}
?>

<div class="container mt-5 mb-5">
    <h2>Novo Imóvel</h2>
    <form method="post">

        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input id="endereco" name="endereco" type="text" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">Valor (R$)</label>
            <input id="valor" name="valor" type="text" class="form-control" required placeholder="Ex: 150000,00">
        </div>

        <div class="mb-3">
            <label for="area_total" class="form-label">Área Total (m²)</label>
            <input id="area_total" name="area_total" type="number" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="area_util" class="form-label">Área Útil (m²)</label>
            <input id="area_util" name="area_util" type="number" step="0.01" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <button type="button" class="btn btn-secondary" onclick="history.back()">Voltar</button>
    </form>
</div>

<?php
require_once("rodape.php");
?>
