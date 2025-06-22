<?php
require_once("cabecalho.php");

function consultaContrato($id){
    require("conexao.php");
    try {
        $sql = "SELECT * FROM contratos_locacao WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die("Erro ao consultar contrato: " . $e->getMessage());
    }
}

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

function alterarContrato($data_inicio, $data_fim, $id_proprietario, $id_locatario, $id_imovel, $id){
    require("conexao.php");
    try {
        $sql = "UPDATE contratos_locacao SET data_inicio = ?, data_fim = ?, id_proprietario = ?, id_locatario = ?, id_imovel = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$data_inicio, $data_fim, $id_proprietario, $id_locatario, $id_imovel, $id])){
            header("Location: contratos.php?edicao=true");
        } else {
            header("Location: contratos.php?edicao=false");
        }
    } catch (Exception $e) {
        die("Erro ao alterar contrato: " . $e->getMessage());
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    alterarContrato($_POST['data_inicio'], $_POST['data_fim'], $_POST['id_proprietario'], $_POST['id_locatario'], $_POST['id_imovel'], $_POST['id']);
} else {
    $contrato = consultaContrato($_GET['id']);
    $proprietarios = listaProprietarios();
    $locatarios = listaLocatarios();
    $imoveis = listaImoveis();
}
?>

<div class="container mt-5 mb-5">
    <h2>Editar Contrato de Locação</h2>

    <form method="post">
        <input type="hidden" name="id" value="<?= $contrato['id'] ?>">

        <div class="mb-3">
            <label>Data de Início</label>
            <input type="date" name="data_inicio" class="form-control" value="<?= $contrato['data_inicio'] ?>" required>
        </div>

        <div class="mb-3">
            <label>Data de Fim</label>
            <input type="date" name="data_fim" class="form-control" value="<?= $contrato['data_fim'] ?>" required>
        </div>

        <div class="mb-3">
            <label>Proprietário</label>
            <select name="id_proprietario" class="form-control" required>
                <?php foreach($proprietarios as $p): ?>
                    <option value="<?= $p['id'] ?>" <?= ($p['id'] == $contrato['id_proprietario']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($p['nome']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Locatário</label>
            <select name="id_locatario" class="form-control" required>
                <?php foreach($locatarios as $l): ?>
                    <option value="<?= $l['id'] ?>" <?= ($l['id'] == $contrato['id_locatario']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($l['nome']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Imóvel</label>
            <select name="id_imovel" class="form-control" required>
                <?php foreach($imoveis as $i): ?>
                    <option value="<?= $i['id'] ?>" <?= ($i['id'] == $contrato['id_imovel']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($i['endereco']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <button type="button" class="btn btn-secondary" onclick="history.back()">Voltar</button>
    </form>
</div>

<?php require_once("rodape.php"); ?>
