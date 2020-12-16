-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2020 a las 07:54:44
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `academico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_ad` int(11) NOT NULL,
  `id_us` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_ad`, `id_us`) VALUES
(1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `id_do` int(11) NOT NULL,
  `id_us` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`id_do`, `id_us`) VALUES
(1, 2),
(2, 3),
(3, 6),
(4, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id_es` int(11) NOT NULL,
  `id_us` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id_es`, `id_us`) VALUES
(1, 1),
(2, 4),
(3, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_hor` int(11) NOT NULL,
  `hora_ini` varchar(30) DEFAULT NULL,
  `hora_fin` varchar(30) DEFAULT NULL,
  `dias` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id_hor`, `hora_ini`, `hora_fin`, `dias`) VALUES
(1, '8:00', '12:00', 'lun-vie'),
(2, '12:00', '16:00', 'lun-vie'),
(3, '8:00', '12:00', 'lun-vie'),
(4, '12:00', '14:00', 'lun_vie');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id_ins` int(11) NOT NULL,
  `id_mat` int(11) DEFAULT NULL,
  `id_es` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`id_ins`, `id_mat`, `id_es`) VALUES
(10, 4, 2),
(34, 1, 2),
(35, 2, 1),
(36, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_mat` int(11) NOT NULL,
  `id_do` int(11) DEFAULT NULL,
  `id_pre` int(11) DEFAULT NULL,
  `id_hor` int(11) DEFAULT NULL,
  `materia` varchar(40) DEFAULT NULL,
  `sigla` varchar(10) DEFAULT NULL,
  `cupo_min` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_mat`, `id_do`, `id_pre`, `id_hor`, `materia`, `sigla`, `cupo_min`) VALUES
(1, 1, 1, 1, 'Sistemas de gestion', 'INF-41', 60),
(2, 2, 2, 2, 'Assembler', 'INF-153', 60),
(3, 3, 3, 3, 'Analisis Matematico III', 'MAT-134', 60),
(4, 4, 4, 4, 'Operativa I', 'INF-155', 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prerequisito`
--

CREATE TABLE `prerequisito` (
  `id_pre` int(11) NOT NULL,
  `materia` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prerequisito`
--

INSERT INTO `prerequisito` (`id_pre`, `materia`) VALUES
(1, 'Estructura de datos'),
(2, 'Fundamentos digitales'),
(3, 'Analisis Matematico II'),
(4, 'Estadistica II');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_us` int(11) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `contrasena` varchar(40) DEFAULT NULL,
  `rol` varchar(2) DEFAULT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `apelido` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_us`, `username`, `contrasena`, `rol`, `nombre`, `apelido`, `email`) VALUES
(1, 'maya', '123', 'e', 'Mayda', 'Aduviri', 'may@mail.com'),
(2, 'pedro', '123', 'd', 'Pedro', 'Perez', 'pedro@mail.com'),
(3, 'mar', '123', 'd', 'Maria', 'Zapata', 'mar@mail.com'),
(4, 'grover', '123', 'e', 'Grover', 'Pucho', 'gro@mail.com'),
(5, 'eddy', '123', 'e', 'Edwin', 'Sanchez', 'ed@gmail.com'),
(6, 'mon', '123', 'd', 'Monica', 'Zegarra', 'mon@mail.com'),
(7, 'edu', '123', 'd', 'Eduardo', 'Bazan', 'edu@mail.com'),
(8, 'admi', '123', 'a', 'Susana', 'Rosales', 'sus@mail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_ad`),
  ADD KEY `id_us` (`id_us`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id_do`),
  ADD KEY `id_us` (`id_us`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id_es`),
  ADD KEY `id_us` (`id_us`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_hor`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`id_ins`),
  ADD KEY `id_mat` (`id_mat`),
  ADD KEY `id_es` (`id_es`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_mat`),
  ADD KEY `id_do` (`id_do`),
  ADD KEY `id_pre` (`id_pre`),
  ADD KEY `id_hor` (`id_hor`);

--
-- Indices de la tabla `prerequisito`
--
ALTER TABLE `prerequisito`
  ADD PRIMARY KEY (`id_pre`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_us`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_ad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id_do` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id_es` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id_hor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `id_ins` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id_mat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `prerequisito`
--
ALTER TABLE `prerequisito`
  MODIFY `id_pre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_us` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`id_us`) REFERENCES `usuario` (`id_us`);

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`id_us`) REFERENCES `usuario` (`id_us`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`id_us`) REFERENCES `usuario` (`id_us`);

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `inscripcion_ibfk_1` FOREIGN KEY (`id_mat`) REFERENCES `materia` (`id_mat`),
  ADD CONSTRAINT `inscripcion_ibfk_2` FOREIGN KEY (`id_es`) REFERENCES `estudiante` (`id_es`);

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `materia_ibfk_1` FOREIGN KEY (`id_do`) REFERENCES `docente` (`id_do`),
  ADD CONSTRAINT `materia_ibfk_2` FOREIGN KEY (`id_pre`) REFERENCES `prerequisito` (`id_pre`),
  ADD CONSTRAINT `materia_ibfk_3` FOREIGN KEY (`id_hor`) REFERENCES `horario` (`id_hor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
