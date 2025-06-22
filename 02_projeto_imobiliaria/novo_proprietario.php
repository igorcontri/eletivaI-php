<?php 
    require_once("cabecalho.php");

    function inserirProprietario($nome, $documento){
        require("conexao.php");
        try{
            $sql = "INSERT INTO proprietarios (nome, cpf_cnpj_proprietario) VALUES (?, ?)";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$nome, $documento]))
                header('location: proprietarios.php?cadastro=true');
            else
                header('location: proprietarios.php?cadastro=false');
        } catch (Exception $e){
            die("Erro ao inserir o proprietário: ". $e->getMessage());
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $nome = $_POST['nome'];
        $documento = $_POST['cpf_cnpj_proprietario'];
        inserirProprietario($nome, $documento);
    }
?>

<div class="container mt-5 mb-5">
    <h2>Novo Proprietário</h2>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Proprietário</label>
            <input type="text" id="nome" name="nome" class="form-control" required="">
        </div>

        <div class="mb-3">
            <label for="cpf_cnpj_proprietario" class="form-label">CPF/CNPJ</label>
            <input type="text" id="cpf_cnpj_proprietario" name="cpf_cnpj_proprietario" class="form-control" required="">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <button type="button" class="btn btn-secondary" onclick="history.back();">Voltar</button>
    </form>
</div>

<?php 
    require_once("rodape.php");
?>
