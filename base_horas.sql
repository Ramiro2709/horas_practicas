-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-11-2018 a las 00:07:22
-- Versión del servidor: 5.7.23
-- Versión de PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `base_horas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id_alumno` int(4) NOT NULL AUTO_INCREMENT,
  `nom_alumno` varchar(50) NOT NULL,
  `curso_alumno` int(3) NOT NULL,
  PRIMARY KEY (`id_alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `nom_alumno`, `curso_alumno`) VALUES
(1, 'Matias Aguilar', 1),
(2, 'Angel Aranda', 1),
(3, 'Aaron Barria', 1),
(4, 'Brian Cardenas', 1),
(5, 'Facundo Chiguay', 1),
(6, 'Enzo Contreras', 1),
(7, 'Agustin Josa', 1),
(8, 'Federico Maidana', 1),
(9, 'Martin Mansilla', 1),
(10, 'Gabriela Mu', 1),
(11, 'Lenadro Ojeda', 1),
(12, 'Nicolas Rodriguez', 1),
(13, 'Isaac Sa', 1),
(14, 'Juan Vargas&quot', 1),
(15, 'Facundo Bracamonte', 2),
(17, 'Andrea Cheuqueman', 2),
(18, 'Lucas Garcia', 2),
(19, 'Mariano Ojeda', 2),
(20, 'Tinon Elian', 2),
(22, 'Belen Mansilla', 2),
(23, 'Mauro Turner', 2),
(24, 'Miranda Sergio', 2),
(25, 'Ramiro Vargas', 2),
(26, 'Jordan Hinding', 2),
(27, 'Agustin Castro', 2),
(32, 'Alumno5bv', 4),
(33, 'Alumno7', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `id_curso` int(3) NOT NULL AUTO_INCREMENT,
  `nombre_curso` varchar(20) NOT NULL,
  `prof_curso` int(3) NOT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nombre_curso`, `prof_curso`) VALUES
(1, '5° INF', 1),
(2, '6° INF', 1),
(3, 'curso1', 3),
(4, 'curso2', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas`
--

DROP TABLE IF EXISTS `horas`;
CREATE TABLE IF NOT EXISTS `horas` (
  `id_hora` int(10) NOT NULL AUTO_INCREMENT,
  `alumno_hora` int(4) NOT NULL,
  `ing_hora` time NOT NULL,
  `sal_hora` time NOT NULL,
  `fecha_hora` date DEFAULT NULL,
  `desc_hora` varchar(50) NOT NULL,
  `sup_hora` varchar(50) NOT NULL,
  `total_hora` time NOT NULL,
  PRIMARY KEY (`id_hora`),
  UNIQUE KEY `Id_hora` (`id_hora`)
) ENGINE=InnoDB AUTO_INCREMENT=388 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horas`
--

INSERT INTO `horas` (`id_hora`, `alumno_hora`, `ing_hora`, `sal_hora`, `fecha_hora`, `desc_hora`, `sup_hora`, `total_hora`) VALUES
(358, 1, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Cluaudia', '01:30:00'),
(359, 2, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Cluaudia', '01:30:00'),
(360, 3, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Cluaudia', '01:30:00'),
(361, 4, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Cluaudia', '01:30:00'),
(362, 5, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Cluaudia', '01:30:00'),
(363, 6, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Cluaudia', '01:30:00'),
(364, 7, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Cluaudia', '01:30:00'),
(365, 8, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Cluaudia', '01:30:00'),
(366, 9, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Cluaudia', '01:30:00'),
(367, 10, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Cluaudia', '01:30:00'),
(368, 11, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Cluaudia', '01:30:00'),
(369, 12, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Cluaudia', '01:30:00'),
(370, 13, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Cluaudia', '01:30:00'),
(371, 14, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Cluaudia', '01:30:00'),
(372, 15, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Cluaudia', '01:30:00'),
(373, 17, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Cluaudia', '01:30:00'),
(374, 18, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Cluaudia', '01:30:00'),
(375, 19, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Cluaudia', '01:30:00'),
(376, 20, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Cluaudia', '01:30:00'),
(377, 22, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Cluaudia', '01:30:00'),
(378, 23, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Cluaudia', '01:30:00'),
(379, 24, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Cluaudia', '01:30:00'),
(380, 25, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Cluaudia', '01:30:00'),
(381, 26, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Cluaudia', '01:30:00'),
(382, 27, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Cluaudia', '01:30:00'),
(383, 15, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Claudia', '01:30:00'),
(384, 17, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Claudia', '01:30:00'),
(385, 18, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Claudia', '01:30:00'),
(386, 22, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Claudia', '01:30:00'),
(387, 24, '10:20:00', '11:50:00', '2018-11-26', 'Practicas Profesionalizantes', 'Gonzalez Claudia', '01:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

DROP TABLE IF EXISTS `profesores`;
CREATE TABLE IF NOT EXISTS `profesores` (
  `id_prof` int(3) NOT NULL AUTO_INCREMENT,
  `nom_prof` varchar(50) NOT NULL,
  `us_prof` varchar(20) NOT NULL,
  `psw_prof` varchar(20) NOT NULL,
  PRIMARY KEY (`id_prof`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id_prof`, `nom_prof`, `us_prof`, `psw_prof`) VALUES
(1, 'Gonzalez, Claudia', 'gonzalez', 'g123'),
(2, 'Cervilla, Alejandro', 'cervilla', 'c123'),
(3, 'usuario1', 'usuario1', '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
