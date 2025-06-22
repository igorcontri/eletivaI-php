<?php
require_once("cabecalho.php");

function retornaImoveis(){
    require("conexao.php");
    try {
        $sql = "SELECT * FROM imoveis";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    } catch (Exception $e) {
        die("Erro ao consultar imóveis: " . $e->getMessage());
    }
}

$imoveis = retornaImoveis();
?>

<div class="container mt-5 mb-5">
    <h2>Imóveis</h2>
    <a href="novo_imovel.php" class="btn btn-primary mb-3">Novo Registro</a>

    <?php
    if (isset($_GET['cadastro']) && $_GET['cadastro'] == true){
        echo '<p class="text-success">Registro salvo com sucesso!</p>';
    } elseif (isset($_GET['cadastro']) && $_GET['cadastro'] == false){
        echo '<p class="text-danger">Erro ao inserir o registro!</p>';
    }
    if (isset($_GET['edicao']) && $_GET['edicao'] == true){
        echo '<p class="text-success">Registro alterado com sucesso!</p>';
    } elseif (isset($_GET['edicao']) && $_GET['edicao'] == false){
        echo '<p class="text-danger">Erro ao alterar o registro!</p>';
    }
    if (isset($_GET['exclusao']) && $_GET['exclusao'] == true){
        echo '<p class="text-success">Registro excluído com sucesso!</p>';
    } elseif (isset($_GET['exclusao']) && $_GET['exclusao'] == false){
        echo '<p class="text-danger">Erro ao excluir o registro!</p>';
    }
    ?>

    <table class="table table-hover table-striped" id="tabela">
        <thead>
            <tr>
                <th>ID</th>
                <th>Endereço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($imoveis as $i): ?>
                <tr>
                    <td><?= $i['id'] ?></td>
                    <td><?= htmlspecialchars($i['endereco']) ?></td>
                    <td>
                        <a href="editar_imovel.php?id=<?= $i['id'] ?>" class="btn btn-dark">Editar</a>
                        <a href="consultar_imovel.php?id=<?= $i['id'] ?>" class="btn btn-dark">Consultar</a>
                        <button class="btn btn-danger btn-excluir" data-id="<?= $i['id'] ?>" data-endereco="<?= htmlspecialchars($i['endereco'], ENT_QUOTES) ?>">Excluir</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.querySelectorAll('.btn-excluir').forEach(button => {
    button.addEventListener('click', () => {
        const id = button.getAttribute('data-id');
        const endereco = button.getAttribute('data-endereco');

        Swal.fire({
            title: 'Tem certeza?',
            text: `Confirma a exclusão do imóvel localizado em "${endereco}"?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `remover_imovel.php?id=${id}`;
            }
        });
    });
});
</script>

<?php
require_once("rodape.php");
?>
