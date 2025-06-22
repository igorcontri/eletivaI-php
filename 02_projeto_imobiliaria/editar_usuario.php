<?php 
    require_once('cabecalho.php');

    function retornaDadosUsuario(){
        require("conexao.php");
        try {
            $sql = "SELECT * FROM usuarios WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$_SESSION['id']]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$usuario){
                die("Erro ao consultar usuário");
            } else {
                return $usuario;
            }
        } catch (Exception $e){
            die("Erro ao consultar usuário". $e->getMessage());
        }
    }

    function alterarDadosUsuario($nome, $email){
        require("conexao.php");
        try {
            $sql = "UPDATE usuarios SET nome = ?, email = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            if($stmt->execute([$nome, $email, $_SESSION['id']]))
                echo "<p class='mt-3 text-success'> Dados alterados com sucesso! </p>";
            else
                echo "<p class='mt-3 text-danger'> Erro ao alterar dados! </p>";

        } catch (Exception $e) {
            die("Erro ao alterar dados do usuário: ".$e->getMessage());
        }
    }

    function alterarSenha($senhaAntiga, $novaSenha, $novaSenhaConfirm){
        require("conexao.php");
        try {
            if ($novaSenha == $novaSenhaConfirm){
                $usuario = retornaDadosUsuario();
                if (password_verify($senhaAntiga, $usuario['senha'])){
                    $sql = "UPDATE usuarios SET senha = ? WHERE id = ?";
                    $stmt = $pdo->prepare($sql);
                    $nova_senha = password_hash($novaSenha, PASSWORD_BCRYPT);
                    if($stmt->execute([$novaSenha, $_SESSION['id']]))
                        require("sair.php");
                    else
                        echo "<p class='mt-3 text-danger'> Erro ao alterar senha! </p>";
                }
            } else {
                echo "<p class='mt-3 text-danger'> Senhas não conferem </p>";
            }
        } catch (Exception $e) {
            die("Erro ao alterar senha: ".$e->getMessage());
        }
    }

    if($_SERVER['REQUEST_METHOD'] = "POST"){
        if (isset($_POST['nome']) && isset($_POST['email'])){
            alterarDadosUsuario($_POST['nome'], $_POST['email']);
        } else if (isset($_POST['nova_senha'])) {
            alterarSenha($_POST['senha'], $_POST['nova_senha'], $_POST['confirma_nova_senha']);
        }
    }
    $usuario = retornaDadosUsuario();
?>
<div class="container">
  <h3> Alteração de dados pessoais </h3>
  <form action="" method="post" class="border w-50 p-3">
      <div class="row mt-3">
        <div class="col">
          <label for="nome" class="form-label">Nome do Usuário: </label>
          <input value="<?= $usuario['nome'] ?>" type="text" id="nome" name="nome" class="form-control">
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="email" class="form-label">Email</label>
          <input value="<?= $usuario['email'] ?>" type="text" id="email" name="email" class="form-control">
        </div>
      </div>
      <div class="row">
        <div class="col">
          <button type="submit" class="btn btn-primary mt-3"> Alterar </button>
        </div>
      </div>
    </form>

    <h3> Alteração de Senha </h3>
    <form action="" method="post" class="border w-50 p-3">
      <div class="row mt-3">
        <div class="col">
          <label for="senha" class="form-label">Senha Atual: </label>
          <input type="password" id="senha" name="senha" class="form-control">
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="nova_senha" class="form-label">Nova Senha: </label>
          <input type="password" id="nova_senha" name="nova_senha" class="form-control">
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="confirma_nova_senha" class="form-label">Confirme a Nova Senha: </label>
          <input type="password" id="confirma_nova_senha" name="confirma_nova_senha" class="form-control">
        </div>
      </div>
      <div class="row">
        <div class="col">
          <button type="submit" class="btn btn-primary mt-3"> Alterar Senha </button>
        </div>
      </div>
    </form>
</div>
<?php 
    require_once('rodape.php');
?>
