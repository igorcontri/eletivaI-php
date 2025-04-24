<?php 
    require_once('conexao.php');

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        try{

          $nome = $_POST['nome'];
          $email = $_POST['email'];
          $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
          $stmt = $pdo->prepare("INSERT INTO usuario (nome, email, senha) VALUES(?, ?, ?)");

          if($stmt->execute([$nome, $email, $senha]))
            header("location: index.php?cadastro=true");
          else 
            echo "<p> Erro ao inserir o usuário </p>";
        } catch(Exception $e){
          echo "Erro ao inserir usuário".$e->getMessage();
          die();
        }

      }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exemplo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="d-flex flex-column container justify-content-center align-items-center vh-100">
    
    <h1>Novo Usuario</h1>


    <form action="" method="post" class="border w-50 p-3">
      <div class="row mt-3">
        <div class="col">
          <label for="nome" class="form-label">Informe o Nome</label>
          <input type="text" id="nome" name="nome" class="form-control">
        </div>
      </div>
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
          <button type="submit" class="btn btn-primary mt-3"> Cadastrar </button>
        </div>
      </div>
      <div class="row">
        <div class="col">
          Já possui conta? Clique <a href="index.php">Aqui</a>
        </div>
      </div>
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>