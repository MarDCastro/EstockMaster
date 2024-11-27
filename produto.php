<?php
// Configurações de conexão
$host = 'localhost';  
$usuario = 'root';    
$senha = '';         
$banco = 'Estockmaster'; 

// Conectar ao banco de dados
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificar se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar se todos os campos estão presentes
    if (isset($_POST['nome']) && isset($_POST['tipo']) && isset($_POST['quantidade']) && isset($_POST['preco'])) {
        // Receber os dados do formulário
        $produto = $_POST['nome'];
        $tipo = $_POST['tipo'];
        $quantidade = $_POST['quantidade'];

        // Remover a formatação do preço
        $preco = str_replace(['R$', '.', ' '], '', $_POST['preco']); 
        $preco = str_replace(',', '.', $preco); // Corrigir vírgula para ponto
        $preco = floatval($preco); // Converter para valor numérico

        // Prepara a consulta SQL para inseri os dados na tabela 'produtos'
        $sql = "INSERT INTO produtos (nome, tipo, quantidade, preco) 
                VALUES ('$produto', '$tipo', '$quantidade', '$preco')";

        // Executar a consulta e verifica se foi bem-sucedida
        if ($conn->query($sql) === TRUE) {
            echo '<div id="successMessage" class="success-message">Produto cadastrado com sucesso!</div>';
        } else {
            echo "Erro ao cadastrar produto: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Verifica se algum campo esta faltando
        echo "Por favor, preencha todos os campos do formulário.";
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
    <title>EstockMaster - Cadastro de Produto</title>
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
		.sidebar {
            width: 200px; /* Largura da barra lateral */
            background-color: #5cb85c; /* Cor de fundo da barra lateral */
            padding: 15px;
            height: 100vh; /* Altura total da tela */
            position: fixed; /* Fixa a barra lateral */
		}

        .sidebar h2 {
            color: white; /* Cor do título da barra lateral */
        }

        .sidebar a {
            display: block; /* Cada link ocupa uma linha inteira */
            color: white; /* Cor dos links */
            padding: 10px; /* Espaçamento interno dos links */
            text-decoration: none; /* Remove o sublinhado dos links */
            margin: 5px 0; /* Espaçamento entre os links */
        }

        .sidebar a:hover {
            background-color: #4cae4c; /* Cor ao passar o mouse sobre os links */
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px; /*tamanho da borda*/
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
        input[type="number"] {
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
		
		/* Estilização para o campo select (combo box) */
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
	
		/* Estilização para o hover do select */
			select:hover {
			background-color: #f1f1f1; /* Cor de fundo mais clara ao passar o mouse */
			}
		/* Contêiner que envolve o campo de preço */
			.input-preco {
				position: relative;
				wdth: 93%; /* Largura similar aos outros campos */
				mrgin-bottom: 15px;
			}

		/* Estilo para o símbolo "R$" */
			.input-preco .currency-symbol {
				position: absolute;
				left: 10px; /* Distância da borda esquerda */
				top: 40%;
				transform: translateY(-50%);
				font-size: 16px;
				color: #555;
			}

		/* Estilo para o campo de input */
			.input-preco input {
				width: 93%;
				padding-left: 30px; /* Deixa espaço à esquerda para o símbolo */
				padding: 10px;
				margin-bottom: 15px;
				border: 1px solid #ccc;
				border-radius: 14px;
				font-size: 16px;
				color: #555;
			}

		/* Estilo para o campo de input quando o mouse passar */
			.input-preco input:hover {
				background-color: #f1f1f1;
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
    <?php include('layout.php'); // Incluindo layout CSS ?>

    <div class="container">
        <h1>Cadastro de Produto</h1>
        <form action="produto.php" method="post">
            <label for="nome">Nome do Produto:</label>
            <input type="text" id="nome" name="nome" required placeholder="Digite o nome do produto">

            <label for="tipo">Tipo do Produto:</label>
            <select id="tipo" name="tipo" required>
                <option value="">Selecione o tipo...</option>
                <option value="Perfume">Perfumes & Colônias</option>
                <option value="Hidratante">Hidratantes</option>
                <option value="Maquiagens">Maquiagens</option>
                <option value="Bodysplash">Bodysplash</option>
                <option value="Sabonete">Sabonetes</option>
            </select>

            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" required placeholder="Digite a quantidade de produtos">

            <label for="preco">Preço:</label>
            <input type="text" id="preco" name="preco" value="R$ " required>

            <input type="submit" value="Cadastrar">
        </form>
    </div>

</body>
</html>
<script>
			// FORMATAÇÃO DO PRECO, conforme o usuário digita
			document.getElementById('preco').addEventListener('input', function(e) {
				let valor = e.target.value;
			
				// Remover tudo o que não for número
				valor = valor.replace(/\D/g, '');
			
				// Colocar ponto como separador de milhar
				valor = valor.replace(/(\d)(\d{4})(?=\d)/g, '$1.$2');
			
				// Colocar vírgula como separador decimal
				if (valor.length > 2) {
				valor = valor.slice(0, -2) + ',' + valor.slice(-2);
				}
			
				// Adicionar o símbolo "R$"
				valor = 'R$ ' + valor;
			
				// Atualizar o valor do campo de entrada
				e.target.value = valor;
			});
</script>

   <script>
        // Executa o script POP-UP - CADASTRO DE PRODUTO
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