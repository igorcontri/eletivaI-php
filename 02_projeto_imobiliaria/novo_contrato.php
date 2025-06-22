<?php
require_once("cabecalho.php");

function listaProprietarios(){
    require("conexao.php");
    return $pdo->query("SELECT * FROM proprietarios")->fetchAll();
}

function listaLocatarios(){
    require("conexao.php");
    return $pdo->query("SELECT * FROM locatarios")->fetchAll();
}

function listaImoveis(){
    require("conexao.php");
    return $pdo->query("SELECT * FROM imoveis")->fetchAll();
}

function inserirContrato($data_inicio, $data_fim, $id_proprietario, $id_locatario, $id_imovel){
    require("conexao.php");
    try {
        $sql = "INSERT INTO contratos_locacao (data_inicio, data_fim, id_proprietario, id_locatario, id_imovel) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$data_inicio, $data_fim, $id_proprietario, $id_locatario, $id_imovel])){
            header("Location: contratos.php?cadastro=true");
        } else {
            header("Location: contratos.php?cadastro=false");
        }
    } catch (Exception $e) {
        die("Erro ao inserir contrato: " . $e->getMessage());
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    inserirContrato($_POST['data_inicio'], $_POST['data_fim'], $_POST['id_proprietario'], $_POST['id_locatario'], $_POST['id_imovel']);
}

$proprietarios = listaProprietarios();
$locatarios = listaLocatarios();
$imoveis = listaImoveis();
?>

<div class="container mt-5 mb-5">
    <h2>Novo Contrato de Locação</h2>
    <form method="post">

        <div class="mb-3">
            <label>Data de Início</label>
            <input type="date" name="data_inicio" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Data de Fim</label>
            <input type="date" name="data_fim" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Proprietário</label>
            <select name="id_proprietario" class="form-control" required>
                <option value="">Selecione</option>
                <?php foreach($proprietarios as $p): ?>
                    <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['nome']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Locatário</label>
            <select name="id_locatario" class="form-control" required>
                <option value="">Selecione</option>
                <?php foreach($locatarios as $l): ?>
                    <option value="<?= $l['id'] ?>"><?= htmlspecialchars($l['nome']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Imóvel</label>
            <select name="id_imovel" class="form-control" required>
                <option value="">Selecione</option>
                <?php foreach($imoveis as $i): ?>
                    <option value="<?= $i['id'] ?>"><?= htmlspecialchars($i['endereco']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <button type="button" class="btn btn-secondary" onclick="history.back()">Voltar</button>
    </form>
</div>

<?php
require_once("rodape.php");
?>
