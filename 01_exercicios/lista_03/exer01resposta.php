<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resposta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="d-flex flex-column justify-content-center align-items-center vh-100">

    <div class="border w-50 p-3">
      <h1>Reposta do Exercicio 01</h1>

      <?php 
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {

              for ($i=1; $i <= 7; $i++){
                $valor = $_POST["valor{$i}"];

                if ($i == 1){
                  $menor_valor = $valor;
                  $maior_valor = $valor;
                }

                if ($valor <= $menor_valor){
                  $menor_valor = $valor;
                  $pos_menor = $i;
                }
                
                if ($valor >= $maior_valor){
                  $maior_valor = $valor;
                  $pos_maior = $i;
                }
              }
              
              echo "O maior valor é: $maior_valor na posição: $pos_maior <br/>"; //perdão
              echo "O menor valor é: $menor_valor na posição: $pos_menor";

            } catch(Exception $e){
                echo $e->getMessage();
            }
          } 
      ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>