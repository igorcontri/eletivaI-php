<?php
require_once("cabecalho.php");

function inserirLocatario($nome, $documento, $imoveis){
    require("conexao.php");
    try {
        $sql = "INSERT INTO locatarios (nome, cpf_cnpj_locatario, imoveis_locados) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$nome, $documento, $imoveis])) {
            header('location: locatarios.php?cadastro=true');
        } else {
            header('location: locatarios.php?cadastro=false');
        }
    } catch (Exception $e) {
        die("Erro ao inserir locatário: " . $e->getMessage());
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nome = $_POST['nome'];
    $documento = $_POST['cpf_cnpj_locatario'];
    $imoveis = $_POST['imoveis'];
    inserirLocatario($nome, $documento, $imoveis);
}
?>

<div class="container mt-5 mb-5">
    <h2>Novo Locatário</h2>
    <form method="post">

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input id="nome" name="nome" type="text" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="cpf_cnpj_locatario" class="form-label">CPF ou CNPJ</label>
            <input id="cpf_cnpj_locatario" name="cpf_cnpj_locatario" type="text" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <button type="button" class="btn btn-secondary" onclick="history.back()">Voltar</button>
    </form>
</div>

<?php
require_once("rodape.php");
?>
