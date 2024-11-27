<?php
session_start();
$erro = '';

// Conectar ao banco de dados
$servername = "localhost";
$username = "root"; // padrão do XAMPP
$password = ""; // padrão do XAMPP (deixe vazio)
$dbname = "estockmaster";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Preparar e executar a consulta
    $stmt = $conn->prepare("SELECT senha FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
	$stmt->execute();
    $stmt->store_result();

    // Verifica se o usuário existe
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($senha_hash);
        $stmt->fetch();
			
        // Debug: imprime o hash da senha que foi buscado
       /* echo "Hash armazenado no banco: " . $senha_hash . "<br>"; */
        
        // Verifica a senha
        if (password_verify($senha, $senha_hash)) {
            $_SESSION['usuario'] = $usuario;
			echo ($senha_hash);
            header("Location: cliente.php");
            exit();
        } else {
            $erro = "Usuário ou senha incorretos."; // Se a senha não corresponder
        }
    } else {
        $erro = "Usuário não cadastrado."; // Se o usuário não for encontrado 
    }
	header("Location: inicio.php");
    $stmt->close();
}


$conn->close();

// Gerar um token CSRF
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EstockMaster - Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 14px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            border: none;
            border-radius: 14px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <?php if ($erro): ?>
            <div style="color: red; text-align: center;"><?= $erro; ?></div>
        <?php endif; ?>
        <form action="" method="post">
            <label for="usuario">Usuário:</label>
            <input type="text" id="usuario" name="usuario" required><br><br>
            
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required><br><br>
            
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
            <input type="submit" value="Entrar">
        </form>
    </div>
</body>
</html>
