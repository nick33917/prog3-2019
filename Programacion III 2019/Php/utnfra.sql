-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2019 a las 03:05:38
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `utnfra`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `legajo` int(10) NOT NULL,
  `edad` int(10) NOT NULL,
  `id` int(18) NOT NULL,
  `idlocalidad` int(10) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`nombre`, `apellido`, `legajo`, `edad`, `id`, `idlocalidad`, `fecha`) VALUES
('nicolas', 'fattori', 12, 24, 1, 3, '2019-04-08 23:06:32'),
('jorge', 'almiron', 13, 25, 2, 2, '2019-04-08 23:06:32'),
('ernesto', 'diPalma', 56, 35, 3, 2, '2019-04-08 23:06:32'),
('alberto', 'fontana', 46, 95, 4, 1, '2019-04-08 23:06:32'),
('jonathan', 'hernandez', 36, 26, 5, 1, '2019-04-08 23:06:32'),
('armando', 'paredes', 19, 66, 7, 1, '2019-04-08 23:19:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `id` int(18) NOT NULL,
  `codigoPostal` int(18) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`id`, `codigoPostal`, `nombre`, `fecha`) VALUES
(1, 1828, 'laPlata', '2019-04-08 23:00:21'),
(2, 1824, 'lanus', '2019-04-08 23:00:21'),
(3, 2058, 'gralBelgrano', '2019-04-08 23:00:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id` int(18) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id`, `descripcion`, `fecha`) VALUES
(1, 'programacion', '2019-04-08 23:09:02'),
(2, 'laboratorio', '2019-04-08 23:09:02'),
(3, 'matematica', '2019-04-08 23:09:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiaalumno`
--

CREATE TABLE `materiaalumno` (
  `idmateria` int(18) NOT NULL,
  `idalumno` int(18) NOT NULL,
  `cuatrimestre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `nota` int(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `materiaalumno`
--

INSERT INTO `materiaalumno` (`idmateria`, `idalumno`, `cuatrimestre`, `nota`) VALUES
(1, 4, 'cuarto', 4),
(1, 1, 'primero', 10),
(2, 5, 'quinto', 2),
(2, 2, 'segundo', 8),
(3, 7, 'sexto', 1),
(3, 3, 'tercero', 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materiaalumno`
--
ALTER TABLE `materiaalumno`
  ADD PRIMARY KEY (`cuatrimestre`,`idalumno`,`idmateria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `id` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
