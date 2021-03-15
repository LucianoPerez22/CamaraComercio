-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-03-2021 a las 21:43:31
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `CamaraComercio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercios`
--

CREATE TABLE `comercios` (
  `id` int(11) NOT NULL,
  `id_rubro` int(10) NOT NULL,
  `id_subrubro` int(10) NOT NULL,
  `premium` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefonos` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `url_premium` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `comercios`
--

INSERT INTO `comercios` (`id`, `id_rubro`, `id_subrubro`, `premium`, `nombre`, `descripcion`, `logo`, `direccion`, `telefonos`, `url_premium`) VALUES
(2, 1, 1, 'SI', 'EL CARRITO FELIZ SIEMPRE', 'Panchos, Lomos, Papas Fritas, Cerveza, Gaseosas, Postres', 'logo_el_carrito.jpg', 'Av. Costanera 786 BIS', '3794908927', 'https://bsapp.site/desdecasa/comercio3_beta.php?id=24'),
(3, 9, 7, 'NO', 'EL PERRITO LOCO', 'Panchos, Lomos, Papas Fritas y SandWich', 'logo_el_perrito.jpeg', 'Av. Costanera 786 Bis', '(0299) 15-2345999', ''),
(4, 1, 2, 'SI', 'PARADOR LA PARRILLA OBRERA', 'Carnes, pollo, pescado, pastas, ensaladas, postres y bebidas', 'logo_donia_ana.jpg', 'Gregorio Alvarez y Calamuchita', '(0299) 15-6789036', 'https://bsapp.site/desdecasa/lasbrujas'),
(7, 1, 1, 'NO', 'VERDULERIA EL GRINGO', 'FRUTAS Y VERDURAS', 'CAM1-verduleria_tito.jpg', 'SAN JORGE 789', '888888888', ''),
(14, 7, 8, 'NO', 'FRUTERIA PEPON', 'LAS MEJORES FRUTAS FRESCAS', 'CAM1-FRUTASJOSE.jpg', 'SAN JUSTO 75', '2994190983', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubro`
--

CREATE TABLE `rubro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `imagen` varchar(254) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `rubro`
--

INSERT INTO `rubro` (`id`, `nombre`, `imagen`) VALUES
(7, 'MUEBLERIA-pepe', 'muebleria.jpg'),
(8, 'COMIDA', ''),
(9, 'FRUTERIA', 'fruteria.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subrubro`
--

CREATE TABLE `subrubro` (
  `id` int(11) NOT NULL,
  `id_rubro` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `subrubro`
--

INSERT INTO `subrubro` (`id`, `id_rubro`, `nombre`) VALUES
(1, 2, 'SILLONES'),
(4, 3, 'PIZZERIA MIMI'),
(5, 7, 'LA CASA DE LAS EMPANADAS'),
(6, 7, 'VERDULERIAS'),
(7, 9, 'FRESCAS'),
(8, 9, 'CONGELADAS'),
(10, 0, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comercios`
--
ALTER TABLE `comercios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rubro`
--
ALTER TABLE `rubro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subrubro`
--
ALTER TABLE `subrubro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comercios`
--
ALTER TABLE `comercios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `rubro`
--
ALTER TABLE `rubro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `subrubro`
--
ALTER TABLE `subrubro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
