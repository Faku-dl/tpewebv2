-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2020 a las 19:50:34
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id_alumno` int(11) NOT NULL,
  `nombre_alumno` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `conducta` varchar(50) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `materia` varchar(50) NOT NULL,
  `imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id_alumno`, `nombre_alumno`, `email`, `conducta`, `calificacion`, `materia`, `imagen`) VALUES
(1, 'Cristian Amici', 'cristianamici@gmail.com', 'no participa', 0, 'Web2', ''),
(2, 'Facundo', 'facudeluca@gmail.com', 'nunca', 0, 'Programación', ''),
(7, 'Cristian Amici', 'cristianamici@gmail.com', 'Ausente', 2, 'Programación', ''),
(8, 'Facundo De Luca', 'delaluca@gmail.com', 'Ausente', 1, 'Programación', ''),
(24, 'Cristian Amici', 'cristianamici@gmail.com', 'Demasiado Buena', 10, 'Programación', ''),
(25, 'pepa', 'pepa@soyundibujo.com', 'buena', 10, 'Programación', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL,
  `nombre_materia` varchar(50) NOT NULL,
  `profesor` varchar(50) NOT NULL,
  `curso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `nombre_materia`, `profesor`, `curso`) VALUES
(2, 'Web2', 'Franco Stramana', 'El Mejor'),
(6, 'Programación', 'Luis', 'El 2do mejor'),
(56, 'TIO', 'LA SEÑORA', 'los mejorcitos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `administrador` tinyint(1) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password_u` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `administrador`, `email`, `password_u`) VALUES
(3, 'Pepe', 0, 'carlitos@bala.com', '$2y$10$IScdROdcpnwVQUb1ainztezAULvcy5Fh6iNbBCtClb.El2qTeknqW'),
(5, 'Peron', 1, 'general@peron.com', '$2y$10$Ww9smg4t3q7L69LS9KUrq.5NYddaU1r.GrTbDPFicVNh6xbKqcGGC'),
(8, 'Lalala', 0, 'lalala@gmail.com', '$2y$10$v2xhJtZqtTYCdWsjekPSbeO3b.FoiB0ymntKk0ZybVbZM3Mb9G/rK'),
(9, 'LeroLero', 0, 'lerolero@gmail.com', '$2y$10$Dr.e3ReOJUkNm9InbGsVfu7pDrv/gdYb68cG.vdlVTrXdrWEVeR.i'),
(10, 'papelito', 0, 'cristianamici@gmail.com', '$2y$10$rknsIAjqJ2voj/KtfpeqKefYlcOzYU7.LFbJGMwnw2y5boYZYDTKa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id_alumno`),
  ADD KEY `materia` (`materia`),
  ADD KEY `materia_2` (`materia`),
  ADD KEY `nombre_alumno` (`nombre_alumno`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`),
  ADD KEY `nombre_materia` (`nombre_materia`),
  ADD KEY `nombre_materia_2` (`nombre_materia`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `nombre_usuario` (`nombre_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`materia`) REFERENCES `materia` (`nombre_materia`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
