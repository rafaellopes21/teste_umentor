-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 31/07/2024 às 01:13
-- Versão do servidor: 8.0.30
-- Versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste_umentor`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `situacao` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `data_admissao` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `situacao`, `data_admissao`, `created_at`, `updated_at`) VALUES
(1, 'Ana Silva', 'ana.silva@teste.com', 'Inativo', '2023-01-01', '2024-07-30 21:59:34', '2024-07-30 21:59:34'),
(2, 'Bruno Costa', 'bruno.costa@teste.com', 'Ativo', '2023-01-02', '2024-07-30 21:59:34', '2024-07-30 21:59:34'),
(3, 'Carla Mendes', 'carla.mendes@teste.com', 'Ativo', '2023-01-03', '2024-07-30 21:59:34', '2024-07-30 21:59:34'),
(4, 'Daniel Souza', 'daniel.souza@teste.com', 'Ativo', '2023-01-04', '2024-07-30 21:59:34', '2024-07-30 21:59:34'),
(5, 'Elisa Ferreira', 'elisa.ferreira@teste.com', 'Ativo', '2023-01-05', '2024-07-30 21:59:34', '2024-07-30 21:59:34'),
(6, 'Felipe Lima', 'felipe.lima@teste.com', 'Inativo', '2023-01-06', '2024-07-30 21:59:34', '2024-07-30 21:59:34'),
(7, 'Gabriela Rocha', 'gabriela.rocha@teste.com', 'Ativo', '2023-01-07', '2024-07-30 21:59:34', '2024-07-30 21:59:34'),
(8, 'Henrique Alves', 'henrique.alves@teste.com', 'Ativo', '2023-01-08', '2024-07-30 21:59:34', '2024-07-30 21:59:34'),
(9, 'Isabela Martins', 'isabela.martins@teste.com', 'Inativo', '2023-01-09', '2024-07-30 21:59:34', '2024-07-30 21:59:34'),
(10, 'João Pereira', 'joao.pereira@teste.com', 'Inativo', '2023-01-10', '2024-07-30 21:59:34', '2024-07-30 21:59:34'),
(11, 'Karina Oliveira', 'karina.oliveira@teste.com', 'Inativo', '2023-01-11', '2024-07-30 21:59:34', '2024-07-30 21:59:34'),
(12, 'Lucas Santos', 'lucas.santos@teste.com', 'Ativo', '2023-01-12', '2024-07-30 21:59:34', '2024-07-30 21:59:34'),
(13, 'Mariana Gomes', 'mariana.gomes@teste.com', 'Ativo', '2023-01-13', '2024-07-30 21:59:34', '2024-07-30 21:59:34'),
(14, 'Natan Ribeiro', 'natan.ribeiro@teste.com', 'Ativo', '2023-01-14', '2024-07-30 21:59:34', '2024-07-30 21:59:34'),
(15, 'Olivia Cardoso', 'olivia.cardoso@teste.com', 'Inativo', '2023-01-15', '2024-07-30 21:59:34', '2024-07-30 21:59:34'),
(16, 'Pedro Almeida', 'pedro.almeida@teste.com', 'Ativo', '2023-01-16', '2024-07-30 21:59:34', '2024-07-30 21:59:34'),
(17, 'Quésia Nunes', 'quesia.nunes@teste.com', 'Ativo', '2023-01-17', '2024-07-30 21:59:34', '2024-07-30 21:59:34'),
(18, 'Rafael Teixeira', 'rafael.teixeira@teste.com', 'Inativo', '2023-01-18', '2024-07-30 21:59:34', '2024-07-30 21:59:34'),
(19, 'Sofia Barros', 'sofia.barros@teste.com', 'Ativo', '2024-07-30', '2024-07-30 21:59:34', '2024-07-31 01:13:11'),
(20, 'Tiago Moreira', 'tiago.moreira@teste.com', 'Inativo', '2023-01-20', '2024-07-30 21:59:34', '2024-07-30 21:59:34');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
