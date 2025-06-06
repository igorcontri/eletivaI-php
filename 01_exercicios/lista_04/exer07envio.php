<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="d-flex flex-column justify-content-center align-items-center vh-100">
      
      <h1>Exercicio 07</h1>

     <form method="post" action="exer07resposta.php" class="border w-50 p-3">  
      <div class="mb-3">
          <label for="valor1" class="form-label">DATA 1 (dd/mm/YYYY)</label>
          <input type="text" id="valor1" name="valor1" class="form-control" required="">
      </div>
   
      <div class="mb-3">
          <label for="valor2" class="form-label">DATA 2 (dd/mm/YYYY)</label>
          <input type="text" id="valor2" name="valor2" class="form-control" required="">
      </div>

      <button type="submit" class="btn btn-primary">Enviar</button'>
    </form>
            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>