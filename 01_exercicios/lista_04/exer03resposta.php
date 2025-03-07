<?php
  declare(strict_types=1); //obriga tipagens para variáveis
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resposta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="d-flex flex-column justify-content-center align-items-center vh-100">
    <h1>Reposta do Exercicio 03</h1>
    <div class="border w-50 p-3">

      <?php 
        function isInside(string $palavra1, string $palavra2): void {
          $posicao_palavra = strpos($palavra1, $palavra2);

          echo $posicao_palavra ? "A palavra $palavra2 esté em $palavra1" : "Palavra $palavra2 não encontrada em $palavra1";

          // if ($posicao_palavra)
          //   echo "A palavra $palavra2 esté em $palavra1";
          // else 
          //   echo "Palavra $palavra2 não encontrada em $palavra1";
          
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          try {
            $palavra1 = $_POST['palavra1'];
            $palavra2 = $_POST['palavra2'];
            isInside(strtolower($palavra1), strtolower($palavra2));

          } catch(Exception $e){
              echo $e->getMessage();
          }
        } 
        

      ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>