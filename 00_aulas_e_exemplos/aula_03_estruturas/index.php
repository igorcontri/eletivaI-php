
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  
    <?php
    
        // CONDICIONAL
        $idade = 20;
        if ($idade >= 18)
            echo "Você é maior de idade!";
        else {
            echo "Você é menor de idade!";
        }

        echo $idade >= 18 ? "Maior de idade!" : "Menor de idade";

        // clausula ? clausula_verdadeira : clausula_falsa;

        $nota = 6;
        if ($nota > 6)
            echo "Acima da média!";
        elseif ($nota == 6)
            echo "Na média!";
        else 
            echo "Abaixo da média!";

        echo "<br/>";

        $mes = 1;
        switch ($mes){
            case 1:
                echo "Janeiro";
                break;
            case 2:
                echo "Fevereiro";
                break;
            default:
                echo "Nenhuma das opções!";
        }

        echo "<br/>";

        $i = 1;
        while($i<=10){
            echo "$i <br/>";
            $valor = 10 + $i++; // 11, 12, 13 ...
            // echo "$valor <br/>";
        }

        echo "<br/>";

        $i = 1;
        do {
            echo "$i<br/>"; // 1, 2 ... 10
            $i++; // 2, 3 ... 11
        } while ($i<=10); 

        echo "<br/>";

        for ($i=0; $i<10; $i++){
            echo "$i<br/>"; 
        }
    ?> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
