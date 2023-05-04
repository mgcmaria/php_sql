-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2023 a las 20:24:07
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id_contacto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `observaciones` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id_contacto`, `nombre`, `apellidos`, `telefono`, `email`, `observaciones`) VALUES
(1, 'Maria', 'García Carballo', '629509090', 'mgcmaria@gmail.com', 'Mi número de teléfono personal.\r\nEjemplo 1.\r\nPrueba 1'),
(2, 'Leticia', 'Pérez González', '666799279', 'leti@com', 'prueba número 2\r\nDatos de Eva'),
(3, 'Luis', 'Guerrero Lopez', '648243840', 'luis@hotmmail', 'Ejemplo de Luis'),
(4, 'Francisco José', 'Trueba perro', '7430473290', 'francisco@mail.com', 'Datos de Francisco');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id_contacto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
