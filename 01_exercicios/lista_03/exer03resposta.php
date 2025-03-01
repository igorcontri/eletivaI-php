<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resposta Exercicio 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Reposta do Exercicio 03</h1>
    <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          try {
            $valor1 = $_POST['valor1'];
            $valor2 = $_POST['valor2'];
            
            if ($valor1 == $valor2)
              echo "Valores iguais: $valor1";

            else {
              if ($valor1 < $valor2){
                while ($valor1 <= $valor2)
                  echo $valor1++; 

              } else {
                while($valor2 <= $valor1)
                  echo $valor2++;
              }
            }
          } catch(Exception $e){
            echo $e->getMessage();
          }

        } 
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>