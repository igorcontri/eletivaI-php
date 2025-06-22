<?php 
  require_once("cabecalho.php");
?>

<!-- Banner -->
<div class="w-100 vh-50 overflow-hidden position-relative">
  <img src="imagens/banners/casa1.jpg" alt="Banner" class="w-100 h-100 object-fit-cover">

  <!-- Filtro preto -->
  <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.4);"></div>
  
  <!-- Texto por cima -->
  <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
    <img src="imagens/logo/logotipo.png" alt="Banner" class="w-100 h-100 object-fit-cover">
    <p>Gerencie imóveis, proprietários e locatários de forma simples!</p>
  </div>
</div>

<!-- Conteúdo principal -->
<div class="container mt-5">
  <h2>Bem vindo, <?= $_SESSION['usuario'] ?></h2>
  <p class="">Escolha uma das opções abaixo para gerenciar: </p>

  <div class="row g-4 mt-4">
    
    <!-- Card Imóveis -->
    <div class="col-md-4">
      <a href="imoveis.php" class="text-decoration-none text-dark">
        <div class="card shadow rounded-4 h-100 text-center p-3">
          <div class="mb-3">
            <i class="bi bi-house-door-fill" style="font-size: 3rem; color: #0d6efd;"></i>
          </div>
          <h5 class="card-title">Imóveis</h5>
          <p class="card-text">Gerencie todos os imóveis cadastrados na imobiliária.</p>
        </div>
      </a>
    </div>

    <!-- Card Proprietários -->
    <div class="col-md-4">
      <a href="proprietarios.php" class="text-decoration-none text-dark">
        <div class="card shadow rounded-4 h-100 text-center p-3">
          <div class="mb-3">
            <i class="bi bi-person-badge-fill" style="font-size: 3rem; color: #198754;"></i>
          </div>
          <h5 class="card-title">Proprietários</h5>
          <p class="card-text">Adicione, edite ou consulte proprietários de imóveis.</p>
        </div>
      </a>
    </div>

    <!-- Card Locatários -->
    <div class="col-md-4">
      <a href="locatarios.php" class="text-decoration-none text-dark">
        <div class="card shadow rounded-4 h-100 text-center p-3">
          <div class="mb-3">
            <i class="bi bi-people-fill" style="font-size: 3rem; color: #dc3545;"></i>
          </div>
          <h5 class="card-title">Locatários</h5>
          <p class="card-text">Gerencie os locatários ativos e históricos de contratos.</p>
        </div>
      </a>
    </div>

  </div>
</div>

<?php 
  require_once("rodape.php");
?>
