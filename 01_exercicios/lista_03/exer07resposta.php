<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resposta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="d-flex flex-column justify-content-center align-items-center vh-100">
    <h1>Reposta do Exercicio 07</h1>
    <div class="border w-50 p-3">

      <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          try {
            $valor = $_POST['valor1'];
            $total = 0;
            $i = 1;

            echo "Somando cada número de 1 a $valor... <br>";
            while ($i <= $valor){
              echo "$total + $i <br>";
              $total += $i;
              $i += 1;
            }
            
            echo "Resultado: $total";
          } catch(Exception $e){
              echo $e->getMessage();
          }
        } 
       

      ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>