
<?php 
    require_once("cabecalho.php");
    
    function retornaProprietarios(){
        require("conexao.php");
        try{
            $sql = "SELECT * from proprietarios";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll();
        } catch (Exception $e){
            die("Erro ao consultar os proprietários: ". $e->getMessage());
        }
    }

    $proprietarios = retornaProprietarios();
?>
    <h2>Proprietários</h2>
    <a href="#" class="btn btn-success mb-3">Novo Registro</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($proprietarios as $p):
            ?>
                <tr>
                    <td><?= $p['id'] ?></td>
                    <td><?= $p['nome'] ?></td>
                    <td>
                        <a href="editar_proprietario.php" class="btn btn-warning">Editar</a>
                        <a href="#" class="btn btn-info">Consultar</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
<?php 
    require_once("rodape.php") 
?>