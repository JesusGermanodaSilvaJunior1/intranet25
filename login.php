<?php
// Conexão com o banco
$host = "localhost";
$db = "seu_banco";
$user = "seu_usuario";
$pass = "sua_senha";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Erro na conexão: " . $conn->connect_error);
}

$email = "";
$password = "";
$profilePhoto = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = $_POST["email"] ?? "";
  $password = $_POST["password"] ?? "";

  // Criptografar senha
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  // Processar imagem
  if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] === UPLOAD_ERR_OK) {
    $photoTmpPath = $_FILES["photo"]["tmp_name"];
    $photoData = base64_encode(file_get_contents($photoTmpPath));
    $profilePhoto = "data:" . $_FILES["photo"]["type"] . ";base64," . $photoData;
  }

  // Inserir no banco
  $stmt = $conn->prepare("INSERT INTO usuarios (email, senha, foto) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $email, $hashedPassword, $profilePhoto);

  if ($stmt->execute()) {
    echo "<script>alert('Login registrado com sucesso!');</script>";
  } else {
    echo "<script>alert('Erro: " . $stmt->error . "');</script>";
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center p-4">
  <form method="POST" enctype="multipart/form-data" class="w-full max-w-md bg-white shadow-xl rounded-lg overflow-hidden">
    <div class="p-6 space-y-4">
      <!-- Logomarca -->
      <div class="flex justify-center">
        <img src="https://via.placeholder.com/80x80.png?text=Logo" alt="Logo" class="h-20 w-20 object-cover rounded-full">
      </div>

      <div class="text-center">
        <h2 class="text-xl font-bold">Bem-vindo</h2>
        <p class="text-sm text-gray-600">Faça login para continuar</p>
      </div>

      <!-- Foto 3x4 -->
      <label for="photo" class="cursor-pointer flex flex-col items-center space-y-2">
        <div class="w-24 h-32 border-2 border-dashed border-gray-300 rounded-lg flex items-center justify-center bg-gray-50 overflow-hidden">
          <span class="text-xs text-gray-500 text-center">Adicionar foto 3x4</span>
        </div>
        <input type="file" name="photo" id="photo" accept="image/*" class="hidden">
      </label>

      <!-- Email -->
      <div class="space-y-2">
        <label for="email" class="block text-sm font-medium">Email</label>
        <input type="email" name="email" id="email" required placeholder="seu@email.com" class="w-full px-4 py-2 border rounded-lg">
      </div>

      <!-- Senha -->
      <div class="space-y-2">
        <label for="password" class="block text-sm font-medium">Senha</label>
        <input type="password" name="password" id="password" required placeholder="••••••••" class="w-full px-4 py-2 border rounded-lg">
      </div>

      <!-- Esqueceu a senha -->
      <div class="flex justify-end">
        <a href="#" class="text-sm text-blue-600 hover:underline">Esqueceu a senha?</a>
      </div>

      <!-- Botão Enviar -->
      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Enviar</button>

      <!-- Cadastrar -->
      <div class="text-center pt-2">
        <span class="text-sm text-gray-600">Não tem uma conta? </span>
        <a href="#" class="text-sm text-blue-600 hover:underline">Cadastrar</a>
      </div>
    </div>
  </form>
</body>
</html>
