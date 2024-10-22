-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/10/2024 às 01:37
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `receita_a_la_web`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `ingredientes`
--

CREATE TABLE `ingredientes` (
  `id` int(11) NOT NULL,
  `receita_id` int(11) NOT NULL,
  `ingrediente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `receita`
--

CREATE TABLE `receita` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `minutos` int(11) NOT NULL,
  `porcao` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receita_id` (`receita_id`);

--
-- Índices de tabela `receita`
--
ALTER TABLE `receita`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `receita`
--
ALTER TABLE `receita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD CONSTRAINT `ingredientes_ibfk_1` FOREIGN KEY (`receita_id`) REFERENCES `receita` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
