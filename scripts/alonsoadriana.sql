-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-07-2014 a las 21:23:32
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `alonsoadriana`
--
CREATE DATABASE IF NOT EXISTS `alonsoadriana` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `alonsoadriana`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aa_images`
--

CREATE TABLE IF NOT EXISTS `aa_images` (
  `img_id` varchar(20) NOT NULL DEFAULT '0',
  `img_name` varchar(100) NOT NULL,
  `img_category` varchar(30) NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `aa_images`
--

INSERT INTO `aa_images` (`img_id`, `img_name`, `img_category`) VALUES
('14221156809', 'Libre expresión Óleo sobre tela 50 x 70 cm', 'abstracto'),
('14221256358', 'Paloma .Óleo sobre tela  60 x 80', 'abstracto'),
('14221302407', 'Creación .óleo técnica mixta 70 x 70', 'abstracto'),
('14221332249', 'Ventana intervenida en centro de arquitectura y construcción', 'abstracto'),
('14384687106', 'Resurrección Óleo sobre tela 50 x 70 cm', 'abstracto'),
('14404458081', 'Resurrección Óleo sobre tela 50 x 70 cm', 'abstracto');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
