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
    <h1>Reposta do Exercicio 05</h1>

      <?php 

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          try {

            $mes = $_POST['valor1'];

            echo "O numero $mes representa o mês de ";

            switch ($mes){
                case 1:
                  echo "Janeiro";
                  break;
                case 2:
                  echo "Fevereiro";
                  break;
                case 3:
                  echo "Março";
                  break;
                case 4:
                  echo "Abril";
                  break;
                case 5:
                  echo "Maio";
                  break;
                case 6:
                  echo "Junho";
                  break;
                case 7:
                  echo "Julho";
                  break;
                case 8:
                  echo "Agosto";
                  break;
                case 9:
                  echo "Setembro";
                  break;
                case 10:
                  echo "Outubro";
                  break;
                case 11:
                  echo "Novembro";
                  break;
                case 12:
                  echo "Dezembro";
                  break;
                default:
                  echo "Nenhuma das opções!";
            }
            
          } catch(Exception $e){
              echo $e->getMessage();
          }
        }
    ?>    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>