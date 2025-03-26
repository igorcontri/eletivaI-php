<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="d-flex flex-column justify-content-center align-items-center min-vh-100">
      
      <h1>Exercicio 05</h1>

     <form method="post" action="exer05resposta.php" class="border w-50 p-3">

        <?php for($i=0; $i<=4; $i++): ?>
          <h3>Livro <?=$i+1?> </h3>

          <div class="mb-3">
            <label for="titulo" class="form-label">Titulo</label>
            <input type="text" id="titulo" name="titulo[]" class="form-control" placeholder="Informe o titulo" required="">
          </div>

          <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="text" id="quantidade" name="quantidade[]" class="form-control" placeholder="Informe a quantidade" required="">
          </div>
       
          <div class="border-bottom mb-3 mt-3"></div>
        <?php endfor; ?>  
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>