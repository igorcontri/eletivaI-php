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
        function cadastrarProdutos(array $codigos, array $nomes, array $precos, array &$produtos): void {
          
          foreach ($codigos as $indice => $codigo) {
            $preco = floatval($precos[$indice]);
            
            if ($preco > 100)
              $preco *= 0.9;

            $produtos[$codigo] = [
              'nome' => $nomes[$indice],
              'preco' => $preco
            ];
          }
          asort($produtos);
        }

        function apresentarProdutos(array $produtos): void {
          echo "<h3>Produtos</h3>";
          echo "<ul class='list-group'>";
          foreach ($produtos as $codigo => $produto) {
            echo "<li class='list-group-item'> {$produto['nome']} - Código: $codigo - Preço: R$ " . number_format($produto['preco'], 2, ',', '.') . "</li>";
          }
          echo "</ul>"; 
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          try {
            $codigos = $_POST['codigo'];  
            $nomes = $_POST['nome'];  
            $precos = $_POST['preco'];  
            
            $produtos = [];
        
            cadastrarProdutos($codigos, $nomes, $precos, $produtos);
            apresentarProdutos($produtos);
        
          } catch(Exception $e){
              echo $e->getMessage();
          }
        } 
        

      ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>