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
    <h1>Reposta do Exercicio 07</h1>
    <div class="border w-50 p-3">

      <?php 
        function toDate(string $data1, string $data2): void {
            $dia1 = substr($data1, 0, 2);
            $mes1 = substr($data1, 3, 2);
            $ano1 = substr($data1, 6, 4);
            $dia2 = substr($data2, 0, 2);
            $mes2 = substr($data2, 3, 2);
            $ano2 = substr($data2, 6, 4);
            
            $timestamp1 = strtotime("$ano1-$mes1-$dia1");
            $timestamp2 = strtotime("$ano2-$mes2-$dia2");

            // timestamp devolve segundos
            $diferenca_segundos = abs($timestamp2 - $timestamp1);

            $dias = floor($diferenca_segundos / (60 * 60 * 24));
            
            echo "A diferença entre as datas $data1 e $data2 é de $dias dias.";
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          try {
            $data1 = $_POST['valor1'];
            $data2 = $_POST['valor2'];
            
            toDate($data1, $data2);

          } catch(Exception $e){
              echo $e->getMessage();
          }
        } 
        

      ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>