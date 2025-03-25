<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo arrays</title>
</head>
<body>
    
    <form action="" method="post">
        <?php
            session_start();// sessions persistem os dados no server side
            $_SESSION['usuario'] = "João"; //cria um elemento de chave e valor na session
            setcookie('usuario', 'Igor', time() + 3600); //cookie é um armazenamento temporário no browse
        ?>
        <h1> Usuário "<?= $_SESSION['usuario'] ?>" criado!</h1>
        <h1> Usuário "<?= $_COOKIE['usuario'] ?>" criado!</h1>
        <!-- <button type="submit">Enviar </button> -->
    </form>

</body>
</html>