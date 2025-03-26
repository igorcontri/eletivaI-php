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
        function contarLivros(array $titulos, array $quantidades, array &$livros): void {

          foreach ($titulos as $indice => $titulo) {
            $quantidade = intval($quantidades[$indice]);
            $livros[$titulo] = $quantidade;
          }
          ksort($livros); 
        }

        function apresentarLivros(array $livros): void {
          echo "<h3>Livros</h3>";
          echo "<ul class='list-group'>";
          foreach ($livros as $titulo => $quantidade) {
            if ($quantidade <5)
              echo "<li class='list-group-item'> Titulo: $titulo - Quantidade: $quantidade <span class='text-danger'> (Alerta, Baixo estoque!)</span> </li>";
            else
              echo "<li class='list-group-item'> Titulo: $titulo - Quantidade: $quantidade</li>";
          }
          echo "</ul>"; 
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          try {

            $titulos = $_POST['titulo'];  
            $quantidades = $_POST['quantidade'];  
            
            $livros = [];
        
            contarLivros($titulos, $quantidades, $livros);
            apresentarLivros($livros);
        
          } catch(Exception $e){
              echo $e->getMessage();
          }
        } 
        

      ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>