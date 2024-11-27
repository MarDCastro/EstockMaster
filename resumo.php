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

// Consultar todas as vendas
$sql = "SELECT v.id_venda, c.nome AS cliente_nome, p.nome AS produto_nome, v.total, v.endereco, v.data_venda
        FROM vendas v
        JOIN clientes c ON v.id_cliente = c.id_cliente
        JOIN produtos p ON v.id_produto = p.id_produto";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumo de Vendas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1100px;
		    margin-left: 220px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
						
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
<link rel="stylesheet" type="text/css" href="global.css" media="screen" />
</head>
<body>
    <?php include('layout.php'); // Incluindo layout CSS ?>

    <div class="container">
        <h1>Relatório de Vendas Realizadas</h1>

        <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Produto</th>
                    <th>Total</th>
                    <th>Endereço</th>
                    <th>Data da Compra</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($venda = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $venda['id_venda']; ?></td>
                    <td><?php echo $venda['cliente_nome']; ?></td>
                    <td><?php echo $venda['produto_nome']; ?></td>
                    <td>R$ <?php echo number_format($venda['total'], 2, ',', '.'); ?></td>
                    <td><?php echo $venda['endereco']; ?></td>
                    <td><?php echo date('d/m/Y H:i:s', strtotime($venda['data_venda'])); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>Nenhuma venda realizada ainda.</p>
        <?php endif; ?>
    </div>

</body>
</html>

<?php
// Fechar a conexão com o banco de dados
$conn->close();
?>
