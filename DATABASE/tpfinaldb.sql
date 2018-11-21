-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2018 a las 02:10:52
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpfinaldb`
--
CREATE DATABASE IF NOT EXISTS `tpfinaldb` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `tpfinaldb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artists`
--

CREATE TABLE `artists` (
  `idartist` int(11) NOT NULL,
  `artistname` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `artists`
--

INSERT INTO `artists` (`idartist`, `artistname`, `isactive`) VALUES
(1, 'xuxa', 1),
(2, 'batman y robin', 0),
(3, 'gatubela fff', 0),
(25, 'ironman', 1),
(26, 'popeye', 1),
(33, 'pepito', 1),
(34, 'jajaj', 0),
(35, 'iron man', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artistxpresentation`
--

CREATE TABLE `artistxpresentation` (
  `idartist` int(11) NOT NULL,
  `idpresentation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `artistxpresentation`
--

INSERT INTO `artistxpresentation` (`idartist`, `idpresentation`) VALUES
(1, 6),
(1, 9),
(25, 6),
(25, 9),
(26, 7),
(26, 10),
(33, 5),
(33, 7),
(33, 8),
(33, 10),
(35, 5),
(35, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `idcategory` int(11) NOT NULL,
  `categoryname` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`idcategory`, `categoryname`, `isactive`) VALUES
(1, 'show', 1),
(2, 'musical', 1),
(3, 'teatro', 1),
(4, 'festival de musica', 1),
(5, 'recital', 1),
(6, 'opera', 1),
(7, 'rock', 1),
(8, 'orgina lesbica', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoryxshow`
--

CREATE TABLE `categoryxshow` (
  `idshow` int(11) NOT NULL,
  `idcategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoryxshow`
--

INSERT INTO `categoryxshow` (`idshow`, `idcategory`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(4, 3),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(6, 2),
(6, 3),
(7, 1),
(7, 2),
(7, 3),
(8, 1),
(8, 2),
(8, 3),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(10, 3),
(11, 1),
(11, 2),
(11, 3),
(12, 1),
(12, 2),
(12, 3),
(13, 1),
(13, 2),
(13, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locations`
--

CREATE TABLE `locations` (
  `idlocation` int(11) NOT NULL,
  `idseat` int(11) NOT NULL,
  `idpresentation` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `sold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `locations`
--

INSERT INTO `locations` (`idlocation`, `idseat`, `idpresentation`, `price`, `quantity`, `sold`) VALUES
(3, 1, 1, 150, 500, 0),
(4, 3, 1, 150, 522, 0),
(5, 8, 1, 555, 500, 0),
(6, 1, 4, 150, 500, 0),
(7, 3, 4, 150, 522, 0),
(8, 8, 4, 555, 500, 0),
(9, 1, 7, 150, 500, 0),
(10, 3, 7, 150, 522, 0),
(11, 8, 7, 555, 500, 0),
(12, 1, 8, 150, 500, 0),
(13, 3, 8, 150, 522, 0),
(14, 8, 8, 555, 500, 0),
(15, 1, 9, 150, 500, 0),
(16, 3, 9, 150, 522, 0),
(17, 8, 9, 555, 500, 0),
(18, 1, 10, 150, 500, 0),
(19, 3, 10, 150, 522, 0),
(20, 8, 10, 555, 500, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentations`
--

CREATE TABLE `presentations` (
  `idpresentation` int(11) NOT NULL,
  `idshow` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `presentations`
--

INSERT INTO `presentations` (`idpresentation`, `idshow`, `date`) VALUES
(1, 1, '2018-11-20 00:00:00'),
(2, 11, '2018-11-01 00:00:00'),
(3, 11, '2018-11-14 00:00:00'),
(4, 11, '2018-11-21 00:00:00'),
(5, 12, '2018-11-01 00:00:00'),
(6, 12, '2018-11-14 00:00:00'),
(7, 12, '2018-11-21 00:00:00'),
(8, 13, '2018-11-01 00:00:00'),
(9, 13, '2018-11-14 00:00:00'),
(10, 13, '2018-11-21 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seats`
--

CREATE TABLE `seats` (
  `idseat` int(11) NOT NULL,
  `seatname` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `seats`
--

INSERT INTO `seats` (`idseat`, `seatname`, `isactive`) VALUES
(1, 'platea', 1),
(2, 'campos', 1),
(3, 'palco', 1),
(8, 'palco lateral', 1),
(9, 'bip bip', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shows`
--

CREATE TABLE `shows` (
  `idshow` int(11) NOT NULL,
  `showname` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_image` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `shows`
--

INSERT INTO `shows` (`idshow`, `showname`, `description`, `id_image`) VALUES
(1, 'nuevo show', 'algo', 0),
(2, 'nuevo show', 'algo', 0),
(3, 'nuevo show', 'algo', 0),
(4, 'nuevo show', 'algo', 0),
(5, 'nuevo show', 'algo', 0),
(6, 'nuevo show', 'algo', 0),
(7, 'nuevo show', 'algo', 0),
(8, 'nuevo show', 'algo', 0),
(9, 'nuevo show', 'algo', 0),
(10, 'nuevo show', 'algo', 0),
(11, 'nuevo show', 'algo', 0),
(12, 'nuevo show', 'algo', 0),
(13, 'nuevo show', 'algo', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `idticket` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idlocation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`iduser`, `name`, `email`, `password`) VALUES
(1, '123', '123@com', '123'),
(2, '1234', '1234@com', '1234'),
(3, 'admin', 'admin@admin.com', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`idartist`),
  ADD UNIQUE KEY `artistname` (`artistname`);

--
-- Indices de la tabla `artistxpresentation`
--
ALTER TABLE `artistxpresentation`
  ADD UNIQUE KEY `idartist` (`idartist`,`idpresentation`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idcategory`),
  ADD UNIQUE KEY `categoryname` (`categoryname`);

--
-- Indices de la tabla `categoryxshow`
--
ALTER TABLE `categoryxshow`
  ADD UNIQUE KEY `idshow` (`idshow`,`idcategory`);

--
-- Indices de la tabla `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`idlocation`);

--
-- Indices de la tabla `presentations`
--
ALTER TABLE `presentations`
  ADD PRIMARY KEY (`idpresentation`);

--
-- Indices de la tabla `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`idseat`),
  ADD UNIQUE KEY `seatname` (`seatname`);

--
-- Indices de la tabla `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`idshow`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`idticket`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artists`
--
ALTER TABLE `artists`
  MODIFY `idartist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `idcategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `locations`
--
ALTER TABLE `locations`
  MODIFY `idlocation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `presentations`
--
ALTER TABLE `presentations`
  MODIFY `idpresentation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `seats`
--
ALTER TABLE `seats`
  MODIFY `idseat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `shows`
--
ALTER TABLE `shows`
  MODIFY `idshow` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `idticket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
