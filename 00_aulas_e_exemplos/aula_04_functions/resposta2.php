<?php
  declare(strict_types=1); //obriga tipagens para variáveis
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exemplo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="d-flex flex-column justify-content-center align-items-center vh-100">

    <div class="border w-50 p-3">
      <h1>Resposta</h1>

      <?php 
          function manipularString(string $palavra): void {
            echo "A palavra possui ". strlen($palavra). " caracteres <br>";
            echo "Letra A substituída por 4: ". str_replace("a", "4", $palavra);
          }

          function gerarValorAleatorio(int $inicial, int $final): int {
            return rand($inicial, $final);
          }

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {

                $palavra = $_POST['palavra'];
                manipularString(strtolower($palavra));

                $valor = gerarValorAleatorio(1, 20);
                echo "<p>O valor gerado foi: $valor</p>";

                $numero = 3000.55555;
                echo "<p?> Mostrando duas casas decimais: ".number_format($numero, 2, ",", ".")."</p>";
            } catch(Exception $e){
                echo "Erro: ".$e->getMessage();
            }
          } 
      ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>