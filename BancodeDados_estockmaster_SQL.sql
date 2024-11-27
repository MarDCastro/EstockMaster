-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Nov-2024 às 03:01
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `estockmaster`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome`, `email`, `telefone`, `endereco`, `created_at`) VALUES
(2, 'Maria Eduarda Gomes', 'eduarda@hotmail.com', '92 984575612', 'Av Savio Belota 159 - Centro', '2024-11-26 22:53:03'),
(3, 'João Silva', 'joao.silva1234@gmail.com', '(92) 99123-4567', 'Rua das Acácias, 123, Bairro Centro, Manaus - AM', '2024-11-27 00:01:03'),
(4, 'Maria Oliveira', 'maria.oliveira5678@gmail.com', '(92) 99234-5678', 'Avenida Efigênio Salles, 456, Bairro Chapada, Manaus - AM', '2024-11-27 00:01:03'),
(5, 'Pedro Santos', 'pedro.santos9012@gmail.com', '(92) 99345-6789', 'Rua 10 de Julho, 789, Bairro São Francisco, Manaus - AM', '2024-11-27 00:01:03'),
(6, 'Ana Costa', 'ana.costa3456@gmail.com', '(92) 99456-7890', 'Rua Rio Negro, 321, Bairro Ponta Negra, Manaus - AM', '2024-11-27 00:01:03'),
(7, 'Lucas Pereira', 'lucas.pereira7890@gmail.com', '(92) 99567-8901', 'Avenida Constantino Nery, 654, Bairro Parque Dez, Manaus - AM', '2024-11-27 00:01:03'),
(8, 'Beatriz Rocha', 'beatriz.rocha1122@gmail.com', '(92) 99678-9012', 'Rua dos Tucunarés, 987, Bairro Adrianópolis, Manaus - AM', '2024-11-27 00:01:03'),
(9, 'Gabriel Almeida', 'gabriel.almeida3344@gmail.com', '(92) 99789-0123', 'Rua da Paz, 234, Bairro Aleixo, Manaus - AM', '2024-11-27 00:01:03'),
(10, 'Sofia Martins', 'sofia.martins5566@gmail.com', '(92) 99890-1234', 'Rua do Comércio, 567, Bairro Educandos, Manaus - AM', '2024-11-27 00:01:03'),
(11, 'Thiago Ferreira', 'thiago.ferreira7788@gmail.com', '(92) 99901-2345', 'Avenida Djalma Batista, 890, Bairro Flores, Manaus - AM', '2024-11-27 00:01:03'),
(12, 'Camila Souza', 'camila.souza9900@gmail.com', '(92) 99112-3456', 'Rua São José, 345, Bairro Redenção, Manaus - AM', '2024-11-27 00:01:03'),
(13, 'Rafael Gomes', 'rafael.gomes2233@gmail.com', '(92) 99223-4567', 'Rua Amazonas, 678, Bairro Alvorada, Manaus - AM', '2024-11-27 00:01:03'),
(14, 'Mariana Lima', 'mariana.lima4455@gmail.com', '(92) 99334-5678', 'Avenida Mário Ypiranga Monteiro, 123, Bairro Tancredo Neves, Manaus - AM', '2024-11-27 00:01:03'),
(15, 'André Barbosa', 'andre.barbosa6677@gmail.com', '(92) 99445-6789', 'Rua Porto Alegre, 234, Bairro Morro da Liberdade, Manaus - AM', '2024-11-27 00:01:03'),
(16, 'Larissa Cruz', 'larissa.cruz8899@gmail.com', '(92) 99556-7890', 'Rua Getúlio Vargas, 567, Bairro São Raimundo, Manaus - AM', '2024-11-27 00:01:03'),
(17, 'Felipe Ribeiro', 'felipe.ribeiro1010@gmail.com', '(92) 99667-8901', 'Rua das Orquídeas, 890, Bairro Novo Aleixo, Manaus - AM', '2024-11-27 00:01:03'),
(18, 'Juliana Vieira', 'juliana.vieira2323@gmail.com', '(92) 99778-9012', 'Avenida do Turismo, 112, Bairro Tarumã, Manaus - AM', '2024-11-27 00:01:03'),
(19, 'Vinícius Duarte', 'vinicius.duarte3434@gmail.com', '(92) 99889-0123', 'Rua do Sol, 334, Bairro Cidade Nova, Manaus - AM', '2024-11-27 00:01:03'),
(20, 'Carolina Pinto', 'carolina.pinto4545@gmail.com', '(92) 99990-1234', 'Rua Brasil, 567, Bairro Dom Pedro, Manaus - AM', '2024-11-27 00:01:03'),
(21, 'Hugo Almeida', 'hugo.almeida5656@gmail.com', '(92) 99101-2345', 'Rua Beira Rio, 890, Bairro São Jorge, Manaus - AM', '2024-11-27 00:01:03'),
(22, 'Vanessa Alves', 'vanessa.alves6767@gmail.com', '(92) 99212-3456', 'Rua Bela Vista, 123, Bairro Parque das Laranjeiras, Manaus - AM', '2024-11-27 00:01:03'),
(23, 'Rodrigo Carvalho', 'rodrigo.carvalho7878@gmail.com', '(92) 99323-4567', 'Rua da Alegria, 456, Bairro Santa Etelvina, Manaus - AM', '2024-11-27 00:01:03'),
(24, 'Isabela Silva', 'isabela.silva8989@gmail.com', '(92) 99434-5678', 'Avenida Princesa Isabel, 789, Bairro Cachoeirinha, Manaus - AM', '2024-11-27 00:01:03'),
(25, 'Matheus Gomes', 'matheus.gomes9090@gmail.com', '(92) 99545-6789', 'Rua do Mar, 234, Bairro Novo Horizonte, Manaus - AM', '2024-11-27 00:01:03'),
(26, 'Gabriela Pereira', 'gabriela.pereira1212@gmail.com', '(92) 99656-7890', 'Rua João Valério, 567, Bairro Aparecida, Manaus - AM', '2024-11-27 00:01:03'),
(27, 'Carlos Barbosa', 'carlos.barbosa2323@gmail.com', '(92) 99767-8901', 'Avenida Tancredo Neves, 890, Bairro São Vicente, Manaus - AM', '2024-11-27 00:01:03'),
(28, 'Renata Costa', 'renata.costa3434@gmail.com', '(92) 99878-9012', 'Rua do Poço, 112, Bairro Coroado, Manaus - AM', '2024-11-27 00:01:03'),
(29, 'Leonardo Rocha', 'leonardo.rocha4545@gmail.com', '(92) 99989-0123', 'Rua dos Navegantes, 334, Bairro Compensa, Manaus - AM', '2024-11-27 00:01:03'),
(30, 'Laura Santos', 'laura.santos5656@gmail.com', '(92) 99123-4567', 'Rua Niterói, 567, Bairro São Felipe, Manaus - AM', '2024-11-27 00:01:03'),
(31, 'Diego Souza', 'diego.souza6767@gmail.com', '(92) 99234-5678', 'Rua Ilha de Marajó, 890, Bairro Tarumã-Açu, Manaus - AM', '2024-11-27 00:01:03'),
(32, 'Fernanda Martins', 'fernanda.martins7878@gmail.com', '(92) 99345-6789', 'Rua Maceió, 123, Bairro Bela Vista, Manaus - AM', '2024-11-27 00:01:03'),
(33, 'Ricardo Lima', 'ricardo.lima8989@gmail.com', '(92) 99456-7890', 'Rua do Sul, 456, Bairro Nossa Senhora das Graças, Manaus - AM', '2024-11-27 00:01:03'),
(34, 'Clara Ribeiro', 'clara.ribeiro1010@gmail.com', '(92) 99567-8901', 'Avenida dos Bandeirantes, 789, Bairro Santa Luzia, Manaus - AM', '2024-11-27 00:01:03'),
(35, 'Eduardo Ferreira', 'eduardo.ferreira2323@gmail.com', '(92) 99678-9012', 'Rua Vitória, 234, Bairro Conjunto Eldorado, Manaus - AM', '2024-11-26 04:00:00'),
(36, 'Tatiane Oliveira', 'tatiane.oliveira3434@gmail.com', '(92) 99789-0123', 'Rua Floresta, 567, Bairro Morro da Liberdade, Manaus - AM', '2024-11-27 00:01:03'),
(37, 'Bruno Almeida', 'bruno.almeida4545@gmail.com', '(92) 99890-1234', 'Rua da Liberdade, 890, Bairro Cidade de Deus, Manaus - AM', '2024-11-27 00:01:03'),
(38, 'Cíntia Rocha', 'cintia.rocha5656@gmail.com', '(92) 99901-2345', 'Avenida Floriano Peixoto, 123, Bairro Conjunto Nova Cidade, Manaus - AM', '2024-11-27 00:01:03'),
(39, 'Gustavo Santos', 'gustavo.santos6767@gmail.com', '(92) 99112-3456', 'Rua São Francisco, 456, Bairro Colônia Antônio Aleixo, Manaus - AM', '2024-11-27 00:01:03'),
(40, 'Mariana Costa', 'mariana.costa7878@gmail.com', '(92) 99223-4567', 'Rua Recanto do Sol, 789, Bairro Parque Residencial 1, Manaus - AM', '2024-11-27 00:01:03'),
(41, 'Fábio Pinto', 'fabio.pinto8989@gmail.com', '(92) 99334-5678', 'Rua Cacau, 234, Bairro Chapada, Manaus - AM', '2024-11-27 00:01:03'),
(42, 'Luciana Gomes', 'luciana.gomes9090@gmail.com', '(92) 99445-6789', 'Avenida Amazonas, 567, Bairro Centro, Manaus - AM', '2024-11-27 00:01:03'),
(43, 'Marcelo Barbosa', 'marcelo.barbosa0101@gmail.com', '(92) 99556-7890', 'Rua do Jacaré, 890, Bairro Presidente Vargas, Manaus - AM', '2024-11-27 00:01:03'),
(44, 'Priscila Oliveira', 'priscila.oliveira1212@gmail.com', '(92) 99667-8901', 'Rua do Rio, 123, Bairro Ponte Rio Negro, Manaus - AM', '2024-11-27 00:01:03'),
(45, 'Alexandre Lima', 'alexandre.lima2323@gmail.com', '(92) 99778-9012', 'Avenida dos Trabalhadores, 456, Bairro Cachoeirinha, Manaus - AM', '2024-11-27 00:01:03'),
(46, 'Larissa Pereira', 'larissa.pereira3434@gmail.com', '(92) 99889-0123', 'Rua das Mangueiras, 789, Bairro Petrópolis, Manaus - AM', '2024-11-27 00:01:03'),
(47, 'Caio Silva', 'caio.silva4545@gmail.com', '(92) 99990-1234', 'Rua Cipriano Santos, 234, Bairro São José, Manaus - AM', '2024-11-27 00:01:03'),
(48, 'Alessandra Souza', 'alessandra.souza5656@gmail.com', '(92) 99101-2345', 'Rua São Sebastião, 567, Bairro Adrianópolis, Manaus - AM', '2024-11-27 00:01:03'),
(49, 'Rafael Martins', 'rafael.martins6767@gmail.com', '(92) 99212-3456', 'Rua Almirante Barroso, 890, Bairro Nossa Senhora do Perpétuo Socorro, Manaus - AM', '2024-11-27 00:01:03'),
(50, 'Alice Costa', 'alice.costa7878@gmail.com', '(92) 99323-4567', 'Rua do Comércio, 123, Bairro Redenção, Manaus - AM', '2024-11-27 00:01:03'),
(51, 'Rodrigo Pinto', 'rodrigo.pinto8989@gmail.com', '(92) 99434-5678', 'Avenida Nilton Lins, 456, Bairro Dom Pedro, Manaus - AM', '2024-11-27 00:01:03'),
(52, 'Thais Ribeiro', 'thais.ribeiro9090@gmail.com', '(92) 99545-6789', 'Rua das Palmeiras, 789, Bairro Nova Esperança, Manaus - AM', '2024-11-27 00:01:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `data_pedido` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos_produtos`
--

CREATE TABLE `pedidos_produtos` (
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `quantidade` int(11) NOT NULL DEFAULT 0,
  `preco` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome`, `tipo`, `quantidade`, `preco`, `created_at`) VALUES
(4, 'Natura Homem Essence 100ml', 'Perfume', 1, 204.90, '2024-11-26 22:53:56'),
(5, 'Natura Ekos - Sabonete Líquido de Açaí', 'Sabonete', 1, 41.90, '2024-11-27 00:01:03'),
(6, 'Natura Tododia - Hidratante Corporal Amêndoas', 'Hidratante', 1, 52.90, '2024-11-27 00:01:03'),
(7, 'Natura Lumina - Shampoo Brilho e Sedosidade', 'Sabonete', 1, 55.90, '2024-11-27 00:01:03'),
(8, 'Natura Mamãe e Bebê - Loção Hidratante', 'Hidratante', 1, 44.90, '2024-11-27 00:01:03'),
(9, 'Natura Todo Dia - Sabonete em Barra', 'Sabonete', 1, 19.90, '2024-11-27 00:01:03'),
(10, 'Natura Kaiak - Perfume Masculino', 'Perfume', 1, 149.90, '2024-11-27 00:01:03'),
(11, 'Natura Humor - Desodorante Colônia', 'Perfume', 1, 119.90, '2024-11-27 00:01:03'),
(12, 'Natura Chronos - Creme Anti-Idade', 'Maquiagens', 1, 199.90, '2024-11-27 00:01:03'),
(13, 'Natura Ekos - Creme para as Mãos de Maracujá', 'Hidratante', 1, 31.90, '2024-11-27 00:01:03'),
(14, 'Natura Essencial - Deo Colônia Masculino', 'Perfume', 1, 229.90, '2024-11-27 00:01:03'),
(15, 'Natura Águas - Desodorante Colônia de Erva Doce', 'Perfume', 1, 79.90, '2024-11-27 00:01:03'),
(16, 'Natura Ekos - Creme de Mãos de Açaí', 'Hidratante', 1, 39.90, '2024-11-27 00:01:03'),
(17, 'Natura Kaiak - Desodorante Colônia', 'Perfume', 1, 129.90, '2024-11-27 00:01:03'),
(18, 'Natura Ekos - Óleo de Buriti', 'Hidratante', 1, 119.90, '2024-11-27 00:01:03'),
(19, 'Natura Tododia - Sabonete Líquido Cacau', 'Sabonete', 1, 32.90, '2024-11-27 00:01:03'),
(20, 'Natura Lumina - Máscara Capilar Reparadora', 'Maquiagens', 1, 85.90, '2024-11-27 00:01:03'),
(21, 'Natura Kaiak - Deo Colônia Fresh', 'Perfume', 1, 134.90, '2024-11-27 00:01:03'),
(22, 'Natura Ekos - Sabonete em Barra de Andiroba', 'Sabonete', 1, 23.90, '2024-11-27 00:01:03'),
(23, 'Natura Ekos - Óleo Corporal de Maracujá', 'Hidratante', 1, 54.90, '2024-11-27 00:01:03'),
(24, 'Natura Sou - Desodorante Colônia Feminina', 'Perfume', 1, 89.90, '2024-11-27 00:01:03'),
(25, 'Natura Todo Dia - Sabonete Líquido de Cacau', 'Sabonete', 1, 39.90, '2024-11-27 00:01:03'),
(26, 'Natura Chronos - Sérum Preenchedor', 'Maquiagens', 1, 169.90, '2024-11-27 00:01:03'),
(27, 'Natura Tododia - Desodorante Spray', 'Bodysplash', 1, 39.90, '2024-11-27 00:01:03'),
(28, 'Natura Ekos - Creme de Mãos de Açaí', 'Hidratante', 1, 39.90, '2024-11-27 00:01:03'),
(29, 'Natura Lumina - Condicionador Brilho e Sedosidade', 'Sabonete', 1, 55.90, '2024-11-27 00:01:03'),
(30, 'Natura Chronos - Protetor Solar Facial', 'Maquiagens', 1, 129.90, '2024-11-27 00:01:03'),
(31, 'Natura Kaiak - Gel Pós-Barba', 'Hidratante', 1, 49.90, '2024-11-27 00:01:03'),
(32, 'Natura Águas - Sabonete Líquido de Erva Doce', 'Sabonete', 1, 39.90, '2024-11-27 00:01:03'),
(33, 'Natura Tododia - Sabonete Líquido de Cereja e Avelã', 'Sabonete', 1, 39.90, '2024-11-27 00:01:03'),
(34, 'Natura Lumina - Shampoo e Condicionador 2 em 1', 'Sabonete', 1, 55.90, '2024-11-27 00:01:03'),
(35, 'Natura Ekos - Sabonete Líquido de Maracujá', 'Sabonete', 1, 41.90, '2024-11-27 00:01:03'),
(36, 'Natura Essencial - Creme Hidratante', 'Hidratante', 1, 79.90, '2024-11-27 00:01:03'),
(37, 'Natura Mamãe e Bebê - Sabonete Líquido', 'Sabonete', 1, 35.90, '2024-11-27 00:01:03'),
(38, 'Natura Humor - Desodorante Roll-On', 'Hidratante', 1, 29.90, '2024-11-27 00:01:03'),
(39, 'Natura Kaiak - Desodorante Aerosol', 'Hidratante', 1, 29.90, '2024-11-27 00:01:03'),
(40, 'Natura Ekos - Hidratante Corporal de Buriti', 'Hidratante', 1, 79.90, '2024-11-27 00:01:03'),
(41, 'Natura Chronos - Creme Anti-Idade para os Olhos', 'Hidratante', 1, 124.90, '2024-11-27 00:01:03'),
(42, 'Natura Lumina - Serum Rejuvenescedor', 'Maquiagens', 1, 179.90, '2024-11-27 00:01:03'),
(43, 'Natura Tododia - Loção Hidratante Manteiga de Karité', 'Hidratante', 1, 59.90, '2024-11-27 00:01:03'),
(44, 'Natura Kaiak - Shampoo e Condicionador 2 em 1', 'Sabonete', 1, 59.90, '2024-11-27 00:01:03'),
(45, 'Natura Chronos - Gel de Limpeza Facial', 'Maquiagens', 1, 59.90, '2024-11-27 00:01:03'),
(46, 'Natura Lumina - Reparador de Pontas', 'Hidratante', 1, 44.90, '2024-11-27 00:01:03'),
(47, 'Natura Tododia - Hidratante Corporal de Limão e Mel', 'Hidratante', 1, 49.90, '2024-11-27 00:01:03'),
(48, 'Natura Kaiak - Deodorante Roll-On Masculino', 'Hidratante', 1, 39.90, '2024-11-27 00:01:03'),
(49, 'Natura Mamãe e Bebê - Óleo Corporal', 'Bodysplash', 1, 49.90, '2024-11-27 00:01:03'),
(50, 'Natura Ekos - Sabonete em Barra de Castanha', 'Sabonete', 1, 22.90, '2024-11-27 00:01:03'),
(51, 'Natura Ekos - Óleo Trifásico', 'Bodysplash', 1, 99.90, '2024-11-27 00:01:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`) VALUES
(1, 'super', 'supermaster123'),
(2, 'man', 'teste123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id_venda` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `data_venda` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id_venda`, `id_cliente`, `id_produto`, `quantidade`, `endereco`, `total`, `data_venda`) VALUES
(6, 2, 4, 2, 'Av Savio Belota 158 - Centro', 409.80, '2024-11-26 22:54:34'),
(7, 2, 4, 2, 'Av Savio Belota 158 - Centro', 409.80, '2024-11-26 22:56:18'),
(8, 2, 4, 1, 'Av Savio Belota 158 - Centro', 204.90, '2024-11-26 22:56:41'),
(9, 2, 4, 1, 'Av Savio Belota 158 - Centro', 204.90, '2024-11-26 22:57:11'),
(10, 2, 4, 3, 'Av Savio Belota 158 - Centro', 614.70, '2024-11-26 22:58:48'),
(11, 5, 16, 3, 'Rua Getúlio Vargas, 567, Bairro São Raimundo, Manaus - AM', 119.70, '2024-11-27 00:57:14'),
(12, 31, 10, 1, 'Rua Almirante Barroso, 890, Bairro Nossa Senhora do Perpétuo Socorro, Manaus - AM', 149.90, '2024-11-27 01:02:06'),
(13, 49, 7, 2, 'Rua do Comércio, 123, Bairro Redenção, Manaus - AM', 111.80, '2024-11-27 01:02:43'),
(14, 4, 44, 1, 'Rua do Comércio, 123, Bairro Redenção, Manaus - AM', 59.90, '2024-11-27 01:07:45');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices para tabela `pedidos_produtos`
--
ALTER TABLE `pedidos_produtos`
  ADD PRIMARY KEY (`id_pedido`,`id_produto`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_produto` (`id_produto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `pedidos_produtos`
--
ALTER TABLE `pedidos_produtos`
  ADD CONSTRAINT `pedidos_produtos_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id_produto`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedidos_produtos_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `vendas_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id_produto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
