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
    <h1>Reposta do Exercicio 04</h1>
    <div class="border w-50 p-3">

      <?php 
        function cadastrarItens(array $nomes, array $precos, array &$itens): void {
          
          foreach ($nomes as $indice => $nome) {
            $preco = floatval($precos[$indice]) * 1.15;
          
            $itens[$nome] = [
              'nome' => $nomes[$indice],
              'preco' => $preco
            ];
          }
          uasort($itens, function ($a, $b) {
            return $a['preco'] <=> $b['preco'];
          });
        }

        function apresentarItens(array $itens): void {
          echo "<h3>itens</h3>";
          echo "<ul class='list-group'>";
          foreach ($itens as $nome=> $item) {
            echo "<li class='list-group-item'> Nome: {$nome} - Preço: R$ " . number_format($item['preco'], 2, ',', '.') . "</li>";
          }
          echo "</ul>"; 
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          try {

            $nomes = $_POST['nome'];  
            $precos = $_POST['preco'];  
            
            $itens = [];
        
            cadastrarItens($nomes, $precos, $itens);
            apresentarItens($itens);
        
          } catch(Exception $e){
              echo $e->getMessage();
          }
        } 
        

      ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>