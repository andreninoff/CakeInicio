-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2012 at 09:43 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `cakephp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria_posts`
--

CREATE TABLE IF NOT EXISTS `categoria_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(300) NOT NULL,
  `publicado` enum('ativo','inativo') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `categoria_posts`
--

INSERT INTO `categoria_posts` (`id`, `titulo`, `publicado`) VALUES
(1, 'Categoria 1', 'ativo'),
(20, 'Nova', 'ativo'),
(4, 'Categoria 3', 'ativo'),
(11, 'Categoria 4', 'ativo'),
(13, 'aaaa', 'ativo'),
(19, 'apagarr', 'ativo'),
(21, 'aaaa', 'ativo');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(300) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `login` varchar(300) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `publicado` enum('ativo','inativo') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `login`, `senha`, `publicado`) VALUES
(1, 'AndrÃ© Luis Lins Smolianinoff', 'andre.ninoff@gmail.com', 'andreninoff', '36f056add9e0949aabceea427be583d8', 'ativo');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `categoria_post_id` int(11) NOT NULL,
  `hash` varchar(300) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `texto` text,
  `publicado` enum('ativo','inativo') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `categoria_post_id`, `hash`, `titulo`, `texto`, `publicado`) VALUES
(1, 4, 'post-1', 'Post 1', 'Desc Post 1', 'ativo'),
(2, 1, 'post-2', 'Post2', 'Post2', 'ativo'),
(11, 1, 'novo', 'novo', 'novo', 'ativo'),
(5, 4, 'post-categoria-3', 'Post Categoria 3', 'Desc', 'ativo'),
(10, 4, 'teste-da-hash', 'teste da hash', 'teste', 'ativo');
