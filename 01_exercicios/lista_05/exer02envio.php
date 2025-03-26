<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="d-flex flex-column justify-content-center align-items-center min-vh-100">
      
      <h1>Exercicio 02</h1>

     <form method="post" action="exer02resposta.php" class="border w-50 p-3">

        <?php for($i=0; $i<=4; $i++): ?>
          <h3>Aluno <?=$i+1?> </h3>

          <div class="mb-3">
            <label for="nome" class="form-label">Nome do Aluno</label>
            <input type="text" id="nome" name="nome[]" class="form-control" placeholder="Informe o nome" required="">
          </div>

          <?php for($j = 0; $j <= 2; $j++): ?>
          <div class="mb-3">
              <label for="nota<?=$i+1?>_<?=$j+1?>" class="form-label">Nota <?= $j+1 ?></label>
              <input type="number" id="nota<?=$i+1?>_<?=$j+1?>" name="nota[<?=$i?>][]" class="form-control" placeholder="Informe a <?= $j+1?>ª nota" required step="0.01" min="0" max="10">
            </div>
          <?php endfor; ?> 
          <div class="border-bottom mb-3 mt-3"></div>
        <?php endfor; ?>  
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>