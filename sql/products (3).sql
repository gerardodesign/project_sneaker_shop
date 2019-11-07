-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2019 a las 18:38:29
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `products`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brands`
--

CREATE TABLE `brands` (
  `id_brand` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `brands`
--

INSERT INTO `brands` (`id_brand`, `description`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(3, 'New Balance'),
(4, 'Lacoste'),
(5, 'Puma'),
(6, 'Topper'),
(7, 'Assics'),
(8, 'Le coq sportif'),
(9, 'Converse'),
(10, 'Fila'),
(11, 'otras'),
(12, 'Merrell'),
(13, 'Timberland');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colors`
--

CREATE TABLE `colors` (
  `id_colors` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `colors`
--

INSERT INTO `colors` (`id_colors`, `description`) VALUES
(1, 'Rojo'),
(2, 'Negro'),
(3, 'Azul'),
(4, 'Verde'),
(5, 'Amarillo'),
(6, 'Blanco'),
(7, 'Violeta'),
(8, 'Naranja'),
(9, 'Rosa'),
(10, 'Fucsia'),
(11, 'Gris'),
(12, 'Marrón'),
(13, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sneakers`
--

CREATE TABLE `sneakers` (
  `id_sneakers` int(11) NOT NULL,
  `model` varchar(50) NOT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `id_colors` int(11) NOT NULL,
  `id_brands` int(11) NOT NULL,
  `initial_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) DEFAULT NULL,
  `observation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sneakers`
--

INSERT INTO `sneakers` (`id_sneakers`, `model`, `price`, `id_colors`, `id_brands`, `initial_date`, `image`, `observation`) VALUES
(10, 'MS574CD', '2400.00', 3, 3, '2019-10-09 00:11:38', '../img/New_Balance_MS574CD.jpg', ''),
(11, 'Downshifer', '1999.00', 1, 1, '2019-10-10 21:28:47', '../img/Nike_Downshifter_7.jpg', 'Super Oferta!'),
(12, '10K', '3600.00', 11, 2, '2019-10-10 21:49:20', '../img/Adidas_10K.jpg', 'Creo que es gris'),
(13, 'ZAQUIM', '3999.00', 3, 9, '2019-10-15 21:29:27', '../img/Converse_Zakim.jpg', ''),
(14, 'Air Max Advantage', '5299.00', 3, 1, '2019-10-15 21:46:05', '../img/Nike_Air_Max_Advantage.jpg', ''),
(15, 'Gris Claro', '3200.00', 11, 2, '2019-10-22 21:20:55', '../img/Adidas_grey.jpg', ''),
(17, 'CTA Street High', '2100.00', 1, 9, '2019-10-22 22:23:00', '../img/Converse_CTA_Street_High.jpg', ''),
(18, 'Revolution', '3510.00', 9, 10, '2019-10-22 22:23:57', '../img/Fila_Revolution.jpg', ''),
(19, 'Strideur 116', '3000.00', 3, 4, '2019-10-22 22:24:43', '../img/Lacoste_Strideur_116.jpg', ''),
(20, 'Lona', '1800.00', 2, 6, '2019-10-22 22:27:39', '../img/Topper-Negras.jpg', ''),
(21, 'Md Runner 2', '4600.00', 2, 1, '2019-10-22 22:29:03', '../img/Nike_Md_Runner_2.jpg', ''),
(22, 'Flex Essential', '4555.00', 2, 1, '2019-10-22 22:31:00', '../img/Nike Flex Essential.jpg', ''),
(26, 'pruebatest', '0.00', 2, 6, '2019-10-24 21:13:28', '../img/Adidas_10K.jpg', 'pruebatest'),
(27, 'Delete444', '5000.00', 5, 2, '2019-10-24 21:14:26', '../img/Converse_CTA_Street_High.jpg', '   ');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indices de la tabla `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id_colors`);

--
-- Indices de la tabla `sneakers`
--
ALTER TABLE `sneakers`
  ADD PRIMARY KEY (`id_sneakers`),
  ADD KEY `colors_sneakers` (`id_colors`),
  ADD KEY `brands_sneakers` (`id_brands`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `brands`
--
ALTER TABLE `brands`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `colors`
--
ALTER TABLE `colors`
  MODIFY `id_colors` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `sneakers`
--
ALTER TABLE `sneakers`
  MODIFY `id_sneakers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sneakers`
--
ALTER TABLE `sneakers`
  ADD CONSTRAINT `brands_sneakers` FOREIGN KEY (`id_brands`) REFERENCES `brands` (`id_brand`),
  ADD CONSTRAINT `colors_sneakers` FOREIGN KEY (`id_colors`) REFERENCES `colors` (`id_colors`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
