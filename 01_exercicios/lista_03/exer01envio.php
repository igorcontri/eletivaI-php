<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="d-flex flex-column justify-content-center align-items-center vh-100">
      
      <h1>Exercicio 01</h1>

     <form method="post" action="exer01resposta.php" class="border w-50 p-3">  
      <div class="mb-3">
          <label for="valor1" class="form-label">Informar primeiro valor</label>
          <input type="number" id="valor1" name="valor1" class="form-control" required="">
      </div>
  
      <div class="mb-3">
          <label for="valor2" class="form-label">Informar segundo valor</label>
          <input type="number" id="valor2" name="valor2" class="form-control" required="">
      </div>
      <div class="mb-3">
          <label for="valor3" class="form-label">Informar terceiro valor</label>
          <input type="number" id="valor3" name="valor3" class="form-control" required="">
      </div>
      <div class="mb-3">
          <label for="valor4" class="form-label">Informar quarto valor</label>
          <input type="number" id="valor4" name="valor4" class="form-control" required="">
      </div>
      <div class="mb-3">
          <label for="valor5" class="form-label">Informar quinto valor</label>
          <input type="number" id="valor5" name="valor5" class="form-control" required="">
      </div>
      <div class="mb-3">
          <label for="valor6" class="form-label">Informar sexto valor</label>
          <input type="number" id="valor6" name="valor6" class="form-control" required="">
      </div>
      <div class="mb-3">
          <label for="valor7" class="form-label">Informar sétimo valor</label>
          <input type="number" id="valor7" name="valor7" class="form-control" required="">
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>