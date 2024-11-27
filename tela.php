<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EstockMaster - Início</title>
    <!-- Inclusão da fonte Roboto do Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="global.css" />
    <style>
	/* Corpo e estilo global */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url(C:\xampp\htdocs\img\123.jpg); /* Caminho para a imagem de fundo */
            background-size: cover;
            background-position: center;
			background-attachment: fixed; /* Mantém a imagem fixa enquanto rola o conteúdo */
            color: #333;
            line-height: 1.6;
        }

        /* Contêiner principal */
        .container {
            max-width: 1200px;
            width: 100%;
            background: rgba(255, 255, 255, 0.9); /* Fundo semi-transparente */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
		/* Estilos para o botão */
		.botao-container {
			position: fixed; /* Fixa o botão na tela */
			bottom: 20px; /* Distância do fundo da tela */
			left: 50%; /* Centraliza horizontalmente */
			transform: translateX(-50%); /* Ajusta o botão para centralizar corretamente */
			z-index: 1000; /* Garante que o botão fique acima de outros elementos */
		}
		/* Estilos para o botão */
		.botao {
			background-color: #e74c3c; /* Cor vermelha do botão */
			color: #fff; /* Cor do texto */
			padding: 10px 20px; /* Tamanho do botão */
			font-size: 18px; /* Tamanho da fonte */
			font-weight: 600; /* Negrito */
			border-radius: 5px; /* Bordas arredondadas */
			text-decoration: none; /* Remove o sublinhado */
			transition: background-color 0.3s ease; /* Efeito de transição */
			display: inline-block; /* Torna o link um bloco inline */
		}

		.botao:hover {
			background-color: #c0392b; /* Cor do botão ao passar o mouse */
		}
        /* Cabeçalho */
        header {
            text-align: center;
            margin-bottom: 10px;
        }

        h1 {
            font-size: 36px;
            font-weight: 700;
            color: #2980b9;
            margin-bottom: 10px;
        }

        p.intro {
            font-size: 18px;
            color: #7f8c8d;
        }

        /* Seções */
        .section {
            margin-bottom: 10px;
        }

        .section h2 {
            font-size: 28px;
            font-weight: 600;
            color: #2980b9;
            margin-bottom: 10px;
        }

        .section p, .section ul {
            font-size: 18px;
            color: #34495e;
        }

        .section ul {
            padding-left: 20px;
        }

        .section ul li {
            margin-bottom: 10px;
        }

        .section ul li::before {
            content: "• ";
            color: #2980b9;
            font-weight: 700;
        }

        /* Contato */
        .contact-info {
            font-size: 18px;
            color: #34495e;
            list-style: none;
            padding-left: 0;
        }

        .contact-info li {
            margin-bottom: 10px;
        }

        .contact-info li strong {
            color: #2980b9;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
                margin: 10px;
            }

            h1 {
                font-size: 20px;
            }

            p.intro {
                font-size: 10px;
            }

            .section h2 {
                font-size: 20px;
            }

            .section p, .section ul {
                font-size: 10px;
            }
			
        }
		
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Bem-vindo ao Projeto EstockMaster</h1>
            <p class="intro">Este sistema é um protótipo desenvolvido exclusivamente para fins acadêmicos</p>
        </header>

        <!-- Informações sobre a Projeto -->
        <div class="section">
            <h2>Informações sobre o Projeto</h2>
            <p><strong>Nome do Responsável:</strong> Marlon Dayvson R. de Castro</p>
            <p><strong>Descrição:</strong> Olá! Meu nome é Marlon Castro e sou acadêmico da Universidade Wyden, onde estou cursando o último período do curso de Análise e Desenvolvimento de Sistemas. O projeto Estockmaster tem como objetivo principal testar minhas capacidades técnicas e por consequência, auxiliar na informatização de uma pequena empresa no ramo de cosméticos: 'Duda Cosméticos e Consultoria.</p>
        </div>

        <!-- Missão e Visão -->
        <div class="section">
            <h2>Missão e Visão do Projeto</h2>
            <p><strong>Missão:</strong> Prover soluções inteligentes para o controle e gestão de estoque, proporcionando ao clientes eficiência, organização e rentabilidade.</p>
            <p><strong>Visão:</strong> Poder futuramente atuar neste nicho de desenvolvimento, levando inovação e tecnologias para a sociedade.</p>
        </div>

       <!-- Valores da Empresa -->
        <div class="section">
            <h2>Valores</h2>
            <ul>			
                <li><strong>Inovação:</strong> Buscar constantemente melhorias e conhecimento na área tecnologica</li>
                <li><strong>Comprometimento:</strong> Tenho como compromisso aprimorar a qualidade e a inovação, visando alcançar sucesso em novos projetos.</li>
                <li><strong>Transparência:</strong> Agimos com ética e transparência em todas as nossas ações.</li>
                <li><strong>Excelência:</strong> Buscar o aperfeiçoamento em tudo aquilo que me dispuser a fazer.</li>
			</u1>
        </div>

        <!-- Contato -->
        <!--<div class="section">
            <h2>Contato</h2>
            <ul class="contact-info">
                <li><strong>Email:</strong> Indisponível!</li> 
                <li><strong>Telefone:</strong> Indisponível!</li> 
                <li><strong>Endereço:</strong> Indisponível!</li>
            </ul>
        </div> --!>

        <!-- Agradecimentos -->
        <div class="section">
            <h2>Agradecimentos</h2>
            <p>Gostaria de expressar minha sincera gratidão a todos que me acompanharam e apoiaram ao longo deste projeto. A colaboração, o conhecimento compartilhado e a dedicação de todos foram fundamentais para o meu progresso e sucesso. Agradeço, especialmente, à minha família, amigos e colegas, que sempre estiveram ao meu lado, oferecendo suporte e incentivo. Sem vocês, nada disso seria possível.</p>
        <div class="botao-container">
    <a href="layout.php" class="botao">Sair</a> <!-- IR PARA PAGINA LAYOUT/ MENU -->
</body>
		</div>
    </div>
	
</div>

</html>
