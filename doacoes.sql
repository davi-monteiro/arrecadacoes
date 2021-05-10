-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 10-Maio-2021 às 01:28
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `arrecadacoes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `doacoes`
--

DROP TABLE IF EXISTS `doacoes`;
CREATE TABLE IF NOT EXISTS `doacoes` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `usuario_id` bigint NOT NULL,
  `valor` float NOT NULL,
  `instituicao_id` bigint NOT NULL,
  `recorrencia` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `doacoes`
--

INSERT INTO `doacoes` (`id`, `usuario_id`, `valor`, `instituicao_id`, `recorrencia`, `created_at`, `updated_at`) VALUES
(1, 1, 1000, 1, 1, '2021-05-10 01:53:54', '2021-05-10 01:53:54'),
(2, 1, 500.52, 2, 1, '2021-05-10 01:57:00', '2021-05-10 01:57:00'),
(3, 1, 5, 2, 1, '2021-05-10 02:00:22', '2021-05-10 02:00:22'),
(4, 1, 2500, 2, 0, '2021-05-10 02:02:33', '2021-05-10 02:02:33'),
(5, 1, 50, 2, 0, '2021-05-10 02:03:07', '2021-05-10 02:03:07'),
(6, 1, 1000, 1, 1, '2021-05-10 02:07:20', '2021-05-10 02:07:20'),
(7, 2, 20000, 2, 0, '2021-05-10 02:47:17', '2021-05-10 02:47:17'),
(8, 1, 6, 1, 0, '2021-05-10 04:06:18', '2021-05-10 04:06:18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `favoritos`
--

DROP TABLE IF EXISTS `favoritos`;
CREATE TABLE IF NOT EXISTS `favoritos` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `usuario_id` bigint NOT NULL,
  `instituicao_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `favoritos`
--

INSERT INTO `favoritos` (`id`, `usuario_id`, `instituicao_id`, `created_at`, `updated_at`) VALUES
(6, 1, 2, '2021-05-10 04:21:45', '2021-05-10 04:21:45'),
(5, 1, 1, '2021-05-10 04:21:42', '2021-05-10 04:21:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicoes`
--

DROP TABLE IF EXISTS `instituicoes`;
CREATE TABLE IF NOT EXISTS `instituicoes` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resumo` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `instituicoes`
--

INSERT INTO `instituicoes` (`id`, `nome`, `email`, `resumo`, `created_at`, `updated_at`) VALUES
(1, 'Instituição da criança', 'contato@crianca.com.br', 'Fazemos trabalhos voluntários para crianças que tem uma renda familiar pequena.', '2021-05-09 17:14:24', '2021-05-09 20:54:38'),
(2, 'Insituicao do pulmão', 'contato@instpulmao.com.br', 'Arrecamamos doações para pessoas de baixa renda com problemas pulmonares.', '2021-05-09 17:22:53', '2021-05-09 18:09:11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `created_at`, `updated_at`) VALUES
(1, 'davi Moreira Monteiro', 'davimoreira@outlook.com.br', '$2y$10$ONOz2.SQrM5VSGvpD6GGJeTWIn6A0/DUQjY0iOA/digP5wkBSYR5S', '2021-05-09 22:37:04', '2021-05-10 03:52:56'),
(2, 'davi monteiro', 'master@trainning.com.br', '$2y$10$Pq86dokuA8OGl4xyU5eSUO/Fd2sLGfUvH2zLP1xptPVDfGOldNMv.', '2021-05-09 22:45:17', '2021-05-09 22:45:17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
