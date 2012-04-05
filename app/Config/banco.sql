-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2012 at 09:16 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `categoria_posts`
--

INSERT INTO `categoria_posts` (`id`, `titulo`, `publicado`) VALUES
(1, 'Categoria 1', 'ativo'),
(12, 'Categoria 0', 'ativo'),
(4, 'Categoria 3', 'ativo'),
(11, 'Categoria 0', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `categoria_post_id`, `hash`, `titulo`, `texto`, `publicado`) VALUES
(1, 4, 'post-1', 'Post 1', 'Desc Post 1', 'ativo'),
(2, 1, 'post-2', 'Post2', 'Post2', 'ativo'),
(4, 1, '', 'Post 4', 'Desco Posta 4', 'inativo'),
(5, 4, '', 'Post Categoria 3', 'Desc', 'ativo'),
(8, 12, '', 'Teste 0', 'teste', 'ativo');
