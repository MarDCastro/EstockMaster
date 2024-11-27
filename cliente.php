<?php
// Habilitar exibição de erros para depuração
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Conectar ao banco de dados
$servername = "localhost";
$username = "root"; // Verifique suas credenciais do banco de dados
$password = "";     // Verifique suas credenciais do banco de dados
$dbname = "Estockmaster"; // Nome do banco de dados

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificar se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se os dados necessários estão sendo enviados
    if (isset($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['end'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['end'];

        // Verificar se os campos não estão vazios
        if (!empty($nome) && !empty($email) && !empty($telefone) && !empty($endereco)) {

            // Validação de e-mail
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "E-mail inválido.";
                exit;
            }

            // Preparar a consulta SQL para inserção
            $stmt = $conn->prepare("INSERT INTO clientes (nome, email, telefone, endereco) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $nome, $email, $telefone, $endereco);

            // Executar a consulta SQL
            if ($stmt->execute()) {
                // Exibir a mensagem de sucesso
                echo '<div id="successMessage" class="success-message">Novo cliente cadastrado com sucesso!</div>';
            } else {
                // Exibir erro caso a consulta falhe
                echo "Erro ao cadastrar cliente: " . $stmt->error;
            }

            // Fechar a consulta
            $stmt->close();
        } else {
            echo "Por favor, preencha todos os campos.";
        }
    } else {
        echo "Dados do formulário não recebidos corretamente.";
    }
}

// Fechar a conexão
$conn->close();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EstockMaster - Cadastro de Cliente</title>
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
            width: 500px;
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
        input[type="email"],
        input[type="tel"] {
            width: 93%;
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

        /* Estilo do balão de notificação */
        .success-message {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #5bc0de;
            color: white;
            padding: 15px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            z-index: 9999;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            opacity: 1;
            transition: opacity 0.5s ease-out;
        }
    </style>
<link rel="stylesheet" type="text/css" href="global.css" media="screen" />	
</head>
<body>
 <?php include('layout.php'); // Incluindo layout CSS,  ?>
    <div class="container">
        <h1>Cadastro de Cliente</h1>
        <form action="" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required placeholder="Digite o nome completo">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="Digite o e-mail">
            
            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" required placeholder="(XX XXXXX-XXXX)">
            
            <label for="end">Endereço:</label>
            <input type="text" id="end" name="end" required placeholder="Digite o endereço completo">

            <input type="submit" value="Cadastrar">
        </form>
    </div>

    <script>
        // TELA POP-UP para CADASTRO DE CLIENTE COM SUCESSO
        window.onload = function() {
            // Verifica se a div de sucesso existe
            const successMessage = document.getElementById('successMessage');
            if (successMessage) {
                // Após 3 segundos, esconde a mensagem
                setTimeout(function() {
                    successMessage.style.opacity = '0';
                    setTimeout(function() {
                        successMessage.style.display = 'none';
                    }, 500); // Atraso de 500ms
                }, 3000); // 3000ms = 3 segundos
            }
        };
    </script>
</body>
</html>

