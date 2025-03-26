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
        function addContatos(array $nomes, array $telefones, array &$contatosOrdenados): void {
          for($i=0; $i<count($nomes); $i++){
            
            if (in_array($nomes[$i], array_keys($contatosOrdenados)))
              echo "Nome $nomes[$i] já existe na lista de contatos";

            elseif (in_array($telefones[$i], array_values($contatosOrdenados)))
              echo "Telefone $telefones[$i] já existe na lista de contatos";

            else
              $contatosOrdenados[$nomes[$i]] = $telefones[$i];
          }

          ksort($contatosOrdenados);

        }

        function exibirContatos(array $contatosOrdenados): void {
          echo "<h3>Contatos</h3>";
          echo "<ul class='list-group'>";
          foreach ($contatosOrdenados as $nome => $telefone) {
              echo "<li class='list-group-item'>Nome: $nome - Telefone: " . $telefone . "</li>";
          }
          echo "</ul>";
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          try {
            $nomes = $_POST['nome'];
            $telefones = $_POST['telefone'];           
            $contatosOrdenados = [];

            addContatos($nomes, $telefones, $contatosOrdenados);
            exibirContatos($contatosOrdenados);
            
          } catch(Exception $e){
              echo $e->getMessage();
          }
        } 
        

      ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>