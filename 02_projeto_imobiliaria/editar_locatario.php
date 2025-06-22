<?php
require_once("cabecalho.php");

function consultaLocatario($id){
    require("conexao.php");
    try {
        $sql = "SELECT * FROM locatarios WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $locatario = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$locatario){
            die("Erro ao consultar o registro!");
        } else {
            return $locatario;
        }
    } catch(Exception $e) {
        die("Erro ao consultar locatário: " . $e->getMessage());
    }
}

function alterarLocatario($nome, $documento, $imoveis, $id){
    require("conexao.php");
    try {
        $sql = "UPDATE locatarios SET nome = ?, cpf_cnpj_locatario = ?, imoveis_locados = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$nome, $documento, $imoveis, $id])){
            header('location: locatarios.php?edicao=true');
        } else {
            header('location: locatarios.php?edicao=false');
        }
    } catch (Exception $e) {
        die("Erro ao alterar o locatário: ".$e->getMessage());
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $nome = $_POST['nome'];
    $documento = $_POST['cpf_cnpj_locatario'];
    $imoveis = $_POST['imoveis'];
    $id = $_POST['id'];
    alterarLocatario($nome, $documento, $imoveis, $id);
} else {
    if (!isset($_GET['id'])) {
        die("ID do locatário não informado.");
    }
    $locatario = consultaLocatario($_GET['id']);
}
?>

<div class="container mt-5 mb-5">
    <h2>Alterar Dados do Locatário</h2>

    <p><strong>Nome Atual:</strong> <?= htmlspecialchars($locatario['nome']) ?></p>
    <p><strong>CPF/CNPJ Atual:</strong> <?= htmlspecialchars($locatario['cpf_cnpj_locatario']) ?></p>
    <p><strong>Imóveis Locados Atuais:</strong> <?= htmlspecialchars($locatario['imoveis_locados']) ?></p>

    <form method="post">
        <input type="hidden" name="id" value="<?= $locatario['id'] ?>" >

        <div class="mb-3">
            <label for="nome" class="form-label">Informe o Novo Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" required value="<?= htmlspecialchars($locatario['nome']) ?>">
        </div>

        <div class="mb-3">
            <label for="cpf_cnpj_locatario" class="form-label">Informe o novo CPF ou CNPJ</label>
            <input type="text" id="cpf_cnpj_locatario" name="cpf_cnpj_locatario" class="form-control" required value="<?= htmlspecialchars($locatario['cpf_cnpj_locatario']) ?>">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
        <button type="button" class="btn btn-secondary" onclick="history.back()">Voltar</button>
    </form>
</div>

<?php
    require_once("rodape.php");
?>
