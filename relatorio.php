<?php
// Iniciar a sessão para acessar os dados
session_start();

// Verificar se os dados da venda estão na sessão
if (isset($_SESSION['venda'])) {
    // Armazenar os dados da venda na variável
    $venda = $_SESSION['venda'];

    // Limpar a sessão após usar os dados (remover os dados da venda após exibi-los)
    unset($_SESSION['venda']);
} else {
    // Caso não haja dados de venda na sessão
    echo "<p>Não há dados de venda para exibir.</p>";
    exit; // Termina o script caso não haja venda registrada
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Vendas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 600px;
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

    </style>
</head>
<body>
    <?php include('layout.php'); // Incluindo layout CSS?>

    <div class="container">
        <h1>Relatório de Venda</h1>

        <table>
            <tr>
                <th>Nome do Cliente</th>
                <td><?php echo $venda['cliente_nome']; ?></td>
            </tr>
            <tr>
                <th>Nome do Produto</th>
                <td><?php echo $venda['produto_nome']; ?></td>
            </tr>
            <tr>
                <th>Quantidade</th>
                <td><?php echo $venda['quantidade']; ?></td>
            </tr>
            <tr>
                <th>Preço Unitário</th>
                <td>R$ <?php echo number_format($venda['preco_unitario'], 2, ',', '.'); ?></td>
            </tr>
            <tr>
                <th>Valor Total</th>
                <td>R$ <?php echo number_format($venda['total'], 2, ',', '.'); ?></td>
            </tr>
            <tr>
                <th>Endereço para entrega</th>
                <!-- exibe o endereço da venda -->
                <td><?php echo $venda['endereco']; ?></td>
            </tr>
        </table>
    </div>

</body>
</html>