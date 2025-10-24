<?php
include "conexao.php";
$tipo = basename(__FILE__) === "login-professores.php" ? "professores" : "alunos";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = $_POST["email"];
  $senha = $_POST["senha"];

  $stmt = $conn->prepare("SELECT * FROM $tipo WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $resultado = $stmt->get_result();

  if ($usuario = $resultado->fetch_assoc()) {
    if (password_verify($senha, $usuario["senha"])) {
      echo "<script>alert('Login bem-sucedido!');</script>";
    } else {
      echo "<script>alert('Senha incorreta.');</script>";
    }
  } else {
    echo "<script>alert('Usuário não encontrado.');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login <?= ucfirst($tipo) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h2 class="text-center">Login de <?= ucfirst($tipo) ?></h2>
    <form method="POST" class="mx-auto mt-4" style="max-width: 400px;">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" name="senha" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Entrar</button>
    </form>
  </div>
</body>
</html>
