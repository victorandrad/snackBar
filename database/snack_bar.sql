-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/06/2019 às 23:05
-- Versão do servidor: 5.6.37
-- Versão do PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `snack_bar`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cardapio`
--

CREATE TABLE IF NOT EXISTS `cardapio` (
  `cod_produto` int(11) NOT NULL,
  `nome_produto` varchar(50) NOT NULL,
  `valor_prod` decimal(5,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `cardapio`
--

INSERT INTO `cardapio` (`cod_produto`, `nome_produto`, `valor_prod`) VALUES
(1, 'Porção de batata', 12.00),
(2, 'Porção de calabresa', 14.00),
(3, 'Porção de peixe', 16.00),
(4, 'Porção de cebola', 10.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `frase_secreta` varchar(10) NOT NULL,
  `lanchonete` varchar(18) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `login`, `senha`, `frase_secreta`, `lanchonete`) VALUES
(1, 'Juliana', 'Juliana_01', '123', 'nome', '95.124.240/0001-04'),
(7, 'teste', 'teste', 'teste', 'teste', '95.124.240/0001-04');

-- --------------------------------------------------------

--
-- Estrutura para tabela `lanchonete`
--

CREATE TABLE IF NOT EXISTS `lanchonete` (
  `cnpj` varchar(18) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `endereco` varchar(30) NOT NULL,
  `razao_social` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `lanchonete`
--

INSERT INTO `lanchonete` (`cnpj`, `telefone`, `cep`, `endereco`, `razao_social`) VALUES
('95.124.240/0001-04', '(11) 4022-8459', '13311123', 'Rua Cleto Fanchini', 'Shalow Now');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `data_pedido` date NOT NULL,
  `num_pedido` int(11) NOT NULL,
  `num_mesa` int(2) NOT NULL,
  `status_ped` enum('aberto','encerrado') CHARACTER SET latin1 NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `quantidade_produto_pedido`
--

CREATE TABLE IF NOT EXISTS `quantidade_produto_pedido` (
  `num_pedido` int(11) NOT NULL,
  `cod_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `cardapio`
--
ALTER TABLE `cardapio`
  ADD PRIMARY KEY (`cod_produto`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `fk_lanchonete` (`lanchonete`);

--
-- Índices de tabela `lanchonete`
--
ALTER TABLE `lanchonete`
  ADD PRIMARY KEY (`cnpj`),
  ADD UNIQUE KEY `endereco` (`endereco`),
  ADD UNIQUE KEY `razao_social` (`razao_social`),
  ADD UNIQUE KEY `telefone` (`telefone`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`num_pedido`);

--
-- Índices de tabela `quantidade_produto_pedido`
--
ALTER TABLE `quantidade_produto_pedido`
  ADD PRIMARY KEY (`num_pedido`,`cod_produto`),
  ADD KEY `cod_produto` (`cod_produto`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `cardapio`
--
ALTER TABLE `cardapio`
  MODIFY `cod_produto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `num_pedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`lanchonete`) REFERENCES `lanchonete` (`cnpj`);

--
-- Restrições para tabelas `quantidade_produto_pedido`
--
ALTER TABLE `quantidade_produto_pedido`
  ADD CONSTRAINT `quantidade_produto_pedido_ibfk_1` FOREIGN KEY (`num_pedido`) REFERENCES `pedido` (`num_pedido`),
  ADD CONSTRAINT `quantidade_produto_pedido_ibfk_2` FOREIGN KEY (`cod_produto`) REFERENCES `cardapio` (`cod_produto`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
