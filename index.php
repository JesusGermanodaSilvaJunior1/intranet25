<?php include "conexao.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Escola Estadual Presidente Dutra</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="assets/img/logo.png" alt="Logo" width="40" height="40" class="me-2">
        Presidente Dutra
      </a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="escola.php">Escola</a></li>
          <li class="nav-item"><a class="nav-link" href="cursos.php">Cursos</a></li>
          <li class="nav-item"><a class="nav-link" href="professores.php">Professores</a></li>
          <li class="nav-item"><a class="nav-link" href="alunos.php">Alunos</a></li>
          <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Carrossel -->
  <div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <?php for ($i = 1; $i <= 8; $i++): ?>
        <div class="col">
          <div class="card h-100">
            <img src="https://via.placeholder.com/300x150?text=Card+<?= $i ?>" class="card-img-top" alt="Card <?= $i ?>">
            <div class="card-body">
              <h5 class="card-title">Informativo <?= $i ?></h5>
              <p class="card-text">Descrição do conteúdo informativo número <?= $i ?>.</p>
            </div>
          </div>
        </div>
      <?php endfor; ?>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
