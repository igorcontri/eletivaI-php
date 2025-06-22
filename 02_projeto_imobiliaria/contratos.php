<?php
require_once("cabecalho.php");

function retornaContratos() {
    require("conexao.php");
    try {
        $sql = "SELECT c.*, 
                       p.nome AS nome_proprietario, 
                       l.nome AS nome_locatario, 
                       i.endereco AS endereco_imovel
                FROM contratos_locacao c
                INNER JOIN proprietarios p ON c.id_proprietario = p.id
                INNER JOIN locatarios l ON c.id_locatario = l.id
                INNER JOIN imoveis i ON c.id_imovel = i.id";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    } catch (Exception $e) {
        die("Erro ao consultar contratos: " . $e->getMessage());
    }
}

$contratos = retornaContratos();
?>

<div class="container mt-5 mb-5">
    <h2>Contratos de Locação</h2>
    <a href="novo_contrato.php" class="btn btn-primary mb-3">Novo Contrato</a>

    <?php
    if (isset($_GET['cadastro']) && $_GET['cadastro'] == true){
        echo '<p class="text-success">Contrato salvo com sucesso!</p>';
    } elseif (isset($_GET['cadastro']) && $_GET['cadastro'] == false){
        echo '<p class="text-danger">Erro ao inserir o contrato!</p>';
    }
    if (isset($_GET['edicao']) && $_GET['edicao'] == true){
        echo '<p class="text-success">Contrato alterado com sucesso!</p>';
    } elseif (isset($_GET['edicao']) && $_GET['edicao'] == false){
        echo '<p class="text-danger">Erro ao alterar o contrato!</p>';
    }
    if (isset($_GET['exclusao']) && $_GET['exclusao'] == true){
        echo '<p class="text-success">Contrato excluído com sucesso!</p>';
    } elseif (isset($_GET['exclusao']) && $_GET['exclusao'] == false){
        echo '<p class="text-danger">Erro ao excluir o contrato!</p>';
    }
    ?>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Proprietário</th>
                <th>Locatário</th>
                <th>Imóvel</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($contratos as $c): ?>
                <tr>
                    <td><?= $c['id'] ?></td>
                    <td><?= htmlspecialchars($c['nome_proprietario']) ?></td>
                    <td><?= htmlspecialchars($c['nome_locatario']) ?></td>
                    <td><?= htmlspecialchars($c['endereco_imovel']) ?></td>
                    <td>
                        <a href="editar_contrato.php?id=<?= $c['id'] ?>" class="btn btn-dark">Editar</a>
                        <a href="consultar_contrato.php?id=<?= $c['id'] ?>" class="btn btn-dark">Consultar</a>
                        <a href="remover_contrato.php?id=<?= $c['id'] ?>" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
require_once("rodape.php");
?>
