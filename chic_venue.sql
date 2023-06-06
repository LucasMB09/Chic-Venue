-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2023 a las 03:52:26
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chic_venue`
--
CREATE DATABASE IF NOT EXISTS `chic_venue` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `chic_venue`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(30) NOT NULL,
  `correo_electronico` varchar(30) NOT NULL,
  `contraseña` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `correo_electronico`, `contraseña`) VALUES
(1, 'admin1@gmail.com', '987654321'),
(2, 'admin2@gmail.com', '321654987');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id_articulo` int(30) NOT NULL,
  `id_administrador` int(30) NOT NULL,
  `precio` double NOT NULL,
  `nombre_articulo` varchar(30) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id_articulo`, `id_administrador`, `precio`, `nombre_articulo`, `descripcion`, `fecha`, `imagen`) VALUES
(1, 1, 145, 'Blusa con 1 bordado', 'Blusa con 1 bordado', '2023-05-20', ''),
(2, 1, 155, 'Blusa con 2 bordado y guipur', 'Blusa con 2 bordado y guipur', '2023-05-20', ''),
(3, 2, 160, 'Blusa con 3 bordados', 'Blusa con 3 bordados', '2023-05-20', ''),
(4, 1, 180, 'Bluson con 1 bordado', 'Bluson con 1 bordado', '2023-05-20', ''),
(5, 2, 180, 'Vestido corto', 'Vestido corto', '2023-05-20', ''),
(6, 1, 190, 'Vestido largo', 'Vestido largo', '2023-05-20', ''),
(7, 1, 220, 'Short y saco', 'Short y saco', '2023-05-20', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `correo_electronico` varchar(30) NOT NULL,
  `contraseña` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellido`, `correo_electronico`, `contraseña`) VALUES
(1, 'Uriel', 'Vargas', 'cochs7534@gmail.com', 'Contr@7534'),
(2, 'Ulises', 'Mora', 'ulisesmora@gmail.com', 'Uli$1234'),
(3, 'Yoshi', 'Vargas', 'cochs1729@gmail.com', 'Contr@7534'),
(5, 'Uriel', 'Vargas', 'cochs75@gmail.com', 'Contr@7534');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `id_cliente` int(30) NOT NULL,
  `id_articulo` int(30) NOT NULL,
  `fecha` date NOT NULL,
  `monto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id_compra`, `id_cliente`, `id_articulo`, `fecha`, `monto`) VALUES
(1, 1, 4, '2023-05-20', 150);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta_bancaria`
--

CREATE TABLE `tarjeta_bancaria` (
  `numero_tarjeta` int(30) NOT NULL,
  `vencimiento` date NOT NULL,
  `cvv` int(30) NOT NULL,
  `id_cliente` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`) USING BTREE;

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id_articulo`),
  ADD KEY `administrador_id_administrador` (`id_administrador`) USING BTREE;

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `cliente_id_cliente` (`id_cliente`),
  ADD KEY `articulo_id_articulo` (`id_articulo`);

--
-- Indices de la tabla `tarjeta_bancaria`
--
ALTER TABLE `tarjeta_bancaria`
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id_articulo` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `administador_id_administrador` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id_administrador`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`id_articulo`) REFERENCES `articulo` (`id_articulo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tarjeta_bancaria`
--
ALTER TABLE `tarjeta_bancaria`
  ADD CONSTRAINT `tarjeta_bancaria_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
