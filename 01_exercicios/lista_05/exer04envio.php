<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="d-flex flex-column justify-content-center align-items-center min-vh-100">
      
      <h1>Exercicio 04</h1>

     <form method="post" action="exer04resposta.php" class="border w-50 p-3">

        <?php for($i=0; $i<=4; $i++): ?>
          <h3>Produto <?=$i+1?> </h3>

          <div class="mb-3">
            <label for="nome" class="form-label">Nome do Produto</label>
            <input type="text" id="nome" name="nome[]" class="form-control" placeholder="Informe o nome" required="">
          </div>

          <div class="mb-3">
            <label for="preco" class="form-label">Preço do Produto</label>
            <input type="text" id="preco" name="preco[]" class="form-control" placeholder="Informe o preço" required="">
          </div>
       
          <div class="border-bottom mb-3 mt-3"></div>
        <?php endfor; ?>  
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>