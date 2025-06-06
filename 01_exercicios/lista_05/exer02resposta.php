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
    <h1>Reposta do Exercicio 01</h1>
    <div class="border w-50 p-3">

      <?php 
        function calcularMedias(array $nomes, array $notas, array &$medias): void {
          
          foreach ($nomes as $indice => $nome) {
            $media = array_sum($notas[$indice]) / count($notas[$indice]);
            $medias[$nome] = $media; 
          }
          
          arsort($medias);
        }

        function apresentarMedias(array $medias): void {
          echo "<h3>Medias</h3>";
          echo "<ul class='list-group'>";
          foreach ($medias as $nome => $media) {
              echo "<li class='list-group-item'>$nome - Média: " . number_format($media, 2) . "</li>";
          }
          echo "</ul>";
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          try {
            $nomes = $_POST['nome'];  
            $notas = $_POST['nota'];  
            
            $medias = [];
        
            calcularMedias($nomes, $notas, $medias);
            apresentarMedias($medias);
        
          } catch(Exception $e){
              echo $e->getMessage();
          }
        } 
        

      ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>