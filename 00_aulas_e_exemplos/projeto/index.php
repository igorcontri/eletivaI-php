<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exemplo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="d-flex flex-column container justify-content-center align-items-center vh-100">
    
    <h1>Sistema de Imobiliária</h1>

    <?php
      require_once('conexao.php');
      session_start();
      if($_SERVER['REQUEST_METHOD'] == "POST"){

        try{

          $email = $_POST['email'];
          $senha = $_POST['senha'];
          $stmt = $pdo->prepare('SELECT * FROM usuario WHERE email = ?');
          $stmt->execute([$email]);
          $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

          if ($usuario && password_verify($senha, $usuario['senha'])){
            session_start();
            $_SESSION['usuario'] = $usuario['nome'];
            $_SESSION['acesso'] = true;
            $_SESSION['id'] = $usuario['id'];
            header('location: principal.php');

          } else {
            $mensagem['erro'] = "Usuário e/ou senha incorretos!";
          }
        } catch(Exception $e){
          echo "Erro: ".$e->getMessage();
          die();
        }

      }
    ?>

    <?php if (isset($mensagem['erro'])) : ?>
      <div class="alert alert-danger mt-3">
        <?= $mensagem['erro'] ?>
      </div>
    <?php endif ?>

    <?php if (isset(($_GET['mensagem'])) && ($_GET['mensagem'] == "acesso_negado")): ?>
      <div class="alert alert-danger mt-3">
        Faça login para acessar o sistema!
      </div>
    <?php endif ?>

    <form action="" method="post" class="border w-50 p-3">
      <div class="row mt-3">
        <div class="col">
          <label for="email" class="form-label">Informe o Email</label>
          <input type="text" id="email" name="email" class="form-control">
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="senha" class="form-label">Informe a senha</label>
          <input type="password" id="senha" name="senha" class="form-control">
        </div>
      </div>
      <div class="row">
        <div class="col">
          <button type="submit" class="btn btn-primary mt-3"> Acessar </button>
        </div>
        <div class="row">
          <div class="col">
            Não possui acesso? Clique <a href="novo_usuario.php">Aqui</a>
          </div>
        </div>
      </div>
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>