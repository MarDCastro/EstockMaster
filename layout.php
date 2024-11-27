<?php

// DEVIDO ALGUNS ERRO E SITUAÇÕES ADIVERSAS SERÁ EFETUADO A MANUTENÇAO DO LOGIN POSTERIORMENTE.

// Verifica se o usuário está autenticado
/*if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); // Redireciona se não estiver autenticado
    exit();
}*/
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EstockMaster</title>
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
        
        .content {
            margin-left: 220px; /* Espaço para a barra lateral */
            padding: 20px; /* Espaçamento interno do conteúdo */
            flex-grow: 1; /* Permite que o conteúdo ocupe o espaço restante */
        }
    </style>
<link rel="stylesheet" type="text/css" href="global.css" media="screen" />
</head>
<body> 
    <div class="sidebar">
        <h2>Início</h2>
        <a href="cliente.php">Clientes</a> <!--ir para tela cadastro de cliente --!>
        <a href="produto.php">Produtos</a>  <!--ir para tela cadastro de produto --!>
        <a href="venda.php">Processos de Vendas</a> <!--ir para tela de vendas --!>
        <a href="resumo.php">Relatório de Vendas</a>  <!-- exibir Relatório de vendas --!>
        <a href="login.php">Sair</a> <!--logout --!>
    </div>
   
</body>
</html>
