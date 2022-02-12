-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2022 a las 20:15:40
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `matelaslux`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `ID` int(5) NOT NULL,
  `NAME` text NOT NULL,
  `ADRESS` varchar(255) NOT NULL,
  `BLOQUE` varchar(90) NOT NULL,
  `WILAYA` varchar(40) NOT NULL,
  `CODEPOSTAL` int(5) NOT NULL,
  `TEL` int(10) NOT NULL,
  `FAX` int(10) NOT NULL,
  `EMAIL` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_productos` int(6) NOT NULL,
  `nombre_productos` varchar(255) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_productos`, `nombre_productos`, `fecha`) VALUES
(1, 'Matelas 190 * 160 ', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `ID` int(6) NOT NULL,
  `NAME` text NOT NULL,
  `AGE` date NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`ID`, `NAME`, `AGE`, `EMAIL`, `PASSWORD`) VALUES
(1, 'MATELASLUX 190 * 160 ', '2021-12-01', 'siphax@mail.com', '01030103'),
(2, 'admin', '2002-02-07', 'admin', 'admin'),
(3, 'siphax', '1111-01-01', 'adminyuuyiyiyi', 'iyuiyuyui'),
(4, 'ALBA', '0122-02-02', '+34612228741', '0103'),
(5, 'ALBA', '1222-12-01', 'elbossinmobilgdfiaria@gmail.com', 'sddsdsds'),
(6, 'siphax', '1995-02-01', 'zerrouki', 'spax'),
(7, 'ALBA', '2022-02-16', '+34612228741D55', '0103'),
(8, 'siphax', '2022-02-24', 'elbossinmobiliaria@gmail.com', '01030103'),
(9, 'siphax', '2022-02-05', '+34612228741P', '01030103');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_productos`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_productos` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
