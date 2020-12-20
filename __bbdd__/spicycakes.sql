-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:8889
-- Tiempo de generación: 18-07-2016 a las 16:40:34
-- Versión del servidor: 5.5.42
-- Versión de PHP: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `spicycakes`
--
CREATE DATABASE IF NOT EXISTS `spicycakes` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `spicycakes`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `idPrd` tinyint(3) unsigned NOT NULL,
  `prdNombre` varchar(45) NOT NULL COMMENT 'Nombre de los productos',
    `prdPrecio` int(7) unsigned NOT NULL,
  `idCategoria` tinyint(2) unsigned NOT NULL COMMENT 'Relación a la tabla categorias',
  `prdPresentacion` TEXT NOT NULL,
  `prdImagen` tinytext
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idPrd`, `prdNombre`, `prdPrecio`, `idCategoria`, `prdPresentacion`, `prdImagen`) VALUES
(1, 'Tarta de ricota', 499.99, 1, 'Descripcion:', 'P001.jpg'),
(2, 'Torta de pastrafrola', 599.99, 1, 'Descripcion:', 'P002.jpg'),
(3, 'ButterCream', 299.99, 2, 'Descripcion:', 'P003.jpg'),
(4, 'Marquise', 459.9, 2, 'Descripcion:', 'P004.jpg'),
(5, 'Maizena', 489.99, 3, 'Descripcion:', 'P005.jpg'),
(6, 'Marplatense', 489.99, 3, 'Descripcion:', 'P006.jpg'),
(7, 'Biscochitos', 199.69, 4, 'Descripcion:', 'P007.jpg'),
(8, 'Cuernitos', 199.69, 4, 'Descripcion:', 'P008.jpg');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--


CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` tinyint(2) unsigned NOT NULL,
  `catNombre` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='Categorias';



INSERT INTO `categoria` (`idCategoria`, `catNombre`) VALUES
(1, 'Tartas'),
(2, 'Tortas'),
(3, 'Alfajores'),
(4, 'Salado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuID` int(11) NOT NULL,
  `usuLogin` varchar(12) DEFAULT NULL,
  `usuClave` varchar(12) NOT NULL,
  `usuNombre` varchar(150) NOT NULL,
  `usuEmail` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuID`, `usuLogin`, `usuClave`, `usuNombre`, `usuEmail`) VALUES
(1, 'admin', 'admin', 'Administrador de Sistema', 'admin@hell.com'),
(2, 'test', 'test', 'Usuario de prueba', 'test@hell.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idPrd`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuID`),
  ADD UNIQUE KEY `usuLogin_UNIQUE` (`usuLogin`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idPrd` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `Categoria`
--
ALTER TABLE `Categoria`
  MODIFY `idCategoria` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
