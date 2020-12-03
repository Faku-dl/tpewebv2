-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2020 a las 03:11:55
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
(1, 'Cristian', 'cristianamici@gmail.com', 'no', 0, 'Programación', 'imgs/5fc8216b829a5.jpeg'),
(8, 'Facundo', 'delaluca@gmail.com', 'Ausente', 1, 'Programación', 'imgs/5fc8217888556.jpeg'),
(25, 'pepa', 'pepa@soyundibujo.com', 'buena', 10, 'Programación', 'imgs/5fc817585e350.jpeg'),
(26, 'Pepa', 'pepa@gmail.com', 'muy', 10, 'Programación', 'imgs/5fc8174f60875.jpeg'),
(27, 'angelito', 'angelito@gmail.com', 'buena', 10, 'Programación', 'imgs/5fc82180d6553.jpeg'),
(28, 'Pepa', 'cristianamici@gmail.com', 'MB', 10, 'Programación', 'imgs/5fc8172d1df3b.jpeg'),
(29, 'Pepa', 'cristianamici@gmail.com', 'Demasiado', 16, 'Programación', 'imgs/5fc81745e7d43.jpeg'),
(30, 'Pepa Ping', 'pepa@soyundibujo.com', 'Demasiado Buena', 1, 'Programación', ''),
(31, 'angelito', 'cristianamici@gmail.com', 'Demasiado Buena', 1, 'Programación', ''),
(32, 'PEPITO', 'cristianamici@gmail.com', 'Demasiado Buena', 5, 'Programación', ''),
(33, 'Marquitos', 'pepe@pepe.com', 'buenisima', 10, 'Programación', ''),
(34, 'mariana', 'mari@gmail.com', 'buena', 4, 'Web2', 'imgs/5fc81e2b2ecd8.jpeg'),
(35, 'Facu Pereyra', 'Elrasca@gmail.com', 'malisima', 1, 'Web2', 'imgs/5fc836fd561fb.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `nombre_alumno` varchar(50) NOT NULL,
  `contenido` text NOT NULL,
  `usuario_nombre` varchar(50) NOT NULL,
  `valoracion_alumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `nombre_alumno`, `contenido`, `usuario_nombre`, `valoracion_alumno`) VALUES
(180, 'Facundo', '', 'Peron', 1),
(181, 'Facundo', '', 'Peron', 1),
(182, 'angelito', 'ertyert', 'Pepe', 3),
(183, 'angelito', 'ertyert', 'Pepe', 3),
(184, 'angelito', 'ertyert', 'Pepe', 3),
(185, 'angelito', 'ertyert', 'Pepe', 3),
(186, 'angelito', 'ertyert', 'Pepe', 3),
(187, 'angelito', 'ertyert', 'Pepe', 3),
(189, 'Facundo', 'fdgyjf', 'Peron', 1),
(193, 'Pepa', 'zsdfgazsdfxcv', 'Peron', 1),
(205, 'Cristian', 'dsfgsdfsdfgsdfgsdddddd', 'Peron', 1),
(206, 'Cristian', 'dfghdf', 'Peron', 1),
(213, 'Cristian', 'qwqwerqwer', 'Peron', 1),
(214, 'Cristian', ' ', 'Peron', 1);

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
(9, 'LeroLero', 0, 'lerolero@gmail.com', '$2y$10$Dr.e3ReOJUkNm9InbGsVfu7pDrv/gdYb68cG.vdlVTrXdrWEVeR.i'),
(10, 'papelito', 0, 'cristianamici@gmail.com', '$2y$10$rknsIAjqJ2voj/KtfpeqKefYlcOzYU7.LFbJGMwnw2y5boYZYDTKa'),
(11, 'Peron', 1, 'peron@peron.com', '$2y$10$oEHyS25vt7CEoczvnublMOzCFxScLI2/M.LlDfh4M1k49cF5w7Ga2');

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
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `nombre_alumno` (`nombre_alumno`),
  ADD KEY `usuario_nombre` (`usuario_nombre`);

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
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`materia`) REFERENCES `materia` (`nombre_materia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`usuario_nombre`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`nombre_alumno`) REFERENCES `alumno` (`nombre_alumno`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
