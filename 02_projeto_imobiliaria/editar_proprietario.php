<?php

    require_once("cabecalho.php");

    function consultaProprietario($id){
        require("conexao.php");
        try{
            $sql = "SELECT * FROM proprietarios WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            $proprietario = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$proprietario){
                die("Erro ao consultar o registro!");
            } else{
                return $proprietario;
            }
        } catch(Exception $e){
            die("Erro ao consultar proprietario: " . $e->getMessage());
        }
    }
    
    function alterarProprietario($nome, $documento, $imoveis, $id){
        require("conexao.php");
        try{
            $sql = "UPDATE proprietarios SET nome = ?, cpf_cnpj_proprietario = ?, imoveis_adquiridos = ? WHERE id=?";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$nome, $documento, $imoveis, $id])){
                header('location: proprietarios.php?edicao=true');
            } else {
                header('location: proprietarios.php?edicao=false');
            }
        } catch (Exception $e){
            die("Erro ao alterar a proprietario: ".$e->getMessage());
        }
    }
    
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $nome = $_POST['nome'];
        $documento = $_POST['cpf_cnpj_proprietario'];
        $imoveis = $_POST['imoveis'];
        $id = $_POST['id'];
        alterarProprietario($nome, $documento,$imoveis, $id);
    } else {
        $proprietario = consultaProprietario($_GET['id']);
    }
    
    ?>

<h2>Alterar Dados do Proprietario</h2>

<p><?= $proprietario['nome'] ?></p>
<p><?= $proprietario['cpf_cnpj_proprietario'] ?></p>
<p><?= $proprietario['imoveis_adquiridos'] ?></p>
        
<form method="post">

    <input type="hidden" name="id" value="<?= $proprietario['id'] ?>" >
                        
    <div class="mb-3">
        <label for="nome" class="form-label">Informe o Novo Nome</label>
        <input type="text" id="nome" name="nome" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="cpf_cnpj_proprietario" class="form-label">Informe o novo CPF ou CNPJ</label>
        <input id="cpf_cnpj_proprietario" name="cpf_cnpj_proprietario" class="form-control" rows="4" required=""></input>
    </div>

    <div class="mb-3">
        <label for="imoveis" class="form-label">Informe a nova quantidade de Imoveis </label>
        <input id="imoveis" name="imoveis" class="form-control" rows="4" required=""></input>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>


<?php 
    require_once("rodape.php");

?>