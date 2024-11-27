<?php
// Configurações de conexão
$host = 'localhost';  // ou o endereço do seu servidor MySQL
$usuario = 'root';    // seu nome de usuário MySQL
$senha = '';          // sua senha MySQL
$banco = 'Estockmaster';  // nome do banco de dados

// Conectar ao banco de dados
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Inicialização de variáveis
$clientes = [];
$produtos = [];

// Recuperar os clientes cadastrados
$sql_clientes = "SELECT * FROM clientes";
$result_clientes = $conn->query($sql_clientes);
if ($result_clientes->num_rows > 0) {
    while ($cliente = $result_clientes->fetch_assoc()) {
        $clientes[] = $cliente;
    }
}

// Recuperar os produtos cadastrados
$sql_produtos = "SELECT * FROM produtos";
$result_produtos = $conn->query($sql_produtos);
if ($result_produtos->num_rows > 0) {
    while ($produto = $result_produtos->fetch_assoc()) {
        $produtos[] = $produto;
    }
}

// Verificar se o formulário de venda foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obter os valores do formulário
    $cliente_id = $_POST['cliente'];
    $produto_id = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $endereco = $conn->real_escape_string($_POST['endereco']);

    // Recuperar dados do produto selecionado
    $sql_produto = "SELECT nome, preco FROM produtos WHERE id_produto = $produto_id";
    $result_produto = $conn->query($sql_produto);
    if ($result_produto->num_rows > 0) {
        $produto = $result_produto->fetch_assoc();
        $preco_unitario = $produto['preco'];
        $nome_produto = $produto['nome'];

        // Calcular o total da venda
        $total_venda = $preco_unitario * $quantidade;

        // Preparar a consulta SQL
        $sql_insert = $conn->prepare("INSERT INTO vendas (id_cliente, id_produto, quantidade, endereco, total) 
                                      VALUES (?, ?, ?, ?, ?)");

        // Bind dos parâmetros
        $sql_insert->bind_param("iiiss", $cliente_id, $produto_id, $quantidade, $endereco, $total_venda);

        // Executar a consulta
        if ($sql_insert->execute()) {
        // Armazenar os dados da venda no BANCO DE DADOS
			session_start();
			$_SESSION['venda'] = [
			'id_cliente' => $cliente_id,
			'cliente_nome' => $clientes[array_search($cliente_id, array_column($clientes, 'id_cliente'))]['nome'],
			'produto_nome' => $nome_produto,
			'quantidade' => $quantidade,
			'preco_unitario' => $preco_unitario,
			'total' => $total_venda,
			'endereco' => $endereco, 
				];

            // Redirecionar para a página de relatórios de vendas
            header('Location: relatorio.php');
            exit;
        } else {
            echo "<p>Erro ao registrar a venda: " . $conn->error . "</p>";
        }
    } else {
        echo "<p>Produto não encontrado!</p>";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EstockMaster - Processos de Vendas</title>
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
        select {
            width: 93%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 14px;
        }
		
		input[type="number"],
		select {
            width: 93%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 14px;
        }
		
		select {
				width: 98%; /* Mesmo tamanho de largura que os outros campos */
				padding: 10px;
				margin-bottom: 15px;
				border: 1px solid #ccc;
				border-radius: 14px;
				background-color: #fff;
				font-size: 16px;
				color: #555;
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
<link rel="stylesheet" type="text/css" href="global.css" media="screen" />
</head>
<body>
    <?php include('layout.php'); // Incluindo layout CSS?>

    <div class="container">
        <h1>Processo de Vendas</h1>

        <!-- INSERIR DADOS DA VENDA -->
        <form action="venda.php" method="post">
            <label for="cliente">Cliente:</label>
            <select id="cliente" name="cliente" required>
                <option value="">Selecione o cliente...</option>
                <?php foreach ($clientes as $cliente) { ?>
                   <option value="<?php echo $cliente['id_cliente']; ?>"><?php echo $cliente['nome']; ?></option>
                <?php } ?>
            </select>

            <label for="produto">Produto:</label>
            <select id="produto" name="produto" required>
                <option value="">Selecione o produto...</option>
                <?php foreach ($produtos as $produto) { ?>
                    <option value="<?php echo $produto['id_produto']; ?>"><?php echo $produto['nome']; ?></option>
                <?php } ?>
            </select>

            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" min="1" required>

            <label for="endereco">Endereço de Entrega:</label>
            <select id="endereco" name="endereco" required>
			<option value="">Selecione o endereço...</option>
			<?php foreach ($clientes as $cliente) { ?>
			<option value="<?php echo $cliente['endereco']; ?>"><?php echo $cliente['endereco']; ?></option>
				<?php } ?>
			</select>
            <input type="submit" value="Finalizar Venda">
        </form>

    </div>

<script>
    // Função para exibir o preço automaticamente ao selecionar o produto
    document.getElementById('produto').addEventListener('change', function() {
        var produtoId = this.value;
        console.log("Produto selecionado: " + produtoId);  // Adicionar log para verificar o valor
        if (produtoId) {
            // Buscar preço do produto selecionado via AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_preco.php?id_produto=' + produtoId, true);
            xhr.onload = function() {
                if (xhr.status == 200) {
                    console.log("Resposta do servidor: " + xhr.responseText);  // Verifique a resposta
                    // Preenche o campo de preço
                    document.getElementById('preco').value = 'R$ ' + xhr.responseText;
                } else {
                    console.error("Erro na requisição AJAX: " + xhr.status);  // Logar erro se a requisição falhar
                }
            };
            xhr.onerror = function() {
                console.error("Erro de rede na requisição AJAX");
            };
            xhr.send();
        } else {
            document.getElementById('preco').value = '';  // Limpa o campo de preço
        }
    });
</script>
</body>
</html>
