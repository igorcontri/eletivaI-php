<?php
  session_start();
  if(!$_SESSION['acesso']){
    header("location: index.php?mensagem=acesso_negado");
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exemplo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  </head>
  <body>

  <nav class="navbar navbar-expand-lg" style="background-color: #0d3b66">
    <div class="container-fluid">
      <a class="navbar-brand" href="principal.php">
        <img src="imagens/logo/logotipo.png" alt="Logo" style="height: 30px;">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        <!-- Links da esquerda -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-white" href="imoveis.php">Imóveis</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="proprietarios.php">Proprietários</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="locatarios.php">Locatários</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="alterar_dados.php">Alterar Dados</a>
          </li>
        </ul>

        <!-- Link "Sair" alinhado à direita -->
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-danger fw-bold" href="sair.php">Sair</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>

  <main class="mb-5">