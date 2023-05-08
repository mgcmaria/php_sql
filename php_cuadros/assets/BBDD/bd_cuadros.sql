-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-01-2023 a las 10:01:22
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_cuadros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuadros`
--

CREATE TABLE `cuadros` (
  `cua_id` int(11) NOT NULL,
  `cua_nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cua_foto` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cua_precio` int(11) NOT NULL,
  `cua_pin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `cuadros`
--

INSERT INTO `cuadros` (`cua_id`, `cua_nombre`, `cua_foto`, `cua_precio`, `cua_pin_id`) VALUES
(1, 'Las meninas', 'tcve0014-velazquez.jpg', 895, 1),
(2, 'Venus del espejo', 'velazquez-venus-espejo_1.jpg', 335, 1),
(5, 'Cristo crucificado', 'velazquez-cristo-crucificado.jpg', 225, 1),
(6, 'La fábula de Aracne', 'velazquez-fabula-aracne-hilanderas.jpg', 895, 1),
(7, 'La fragua de vulcano', 'velazquez-fragua-vulcano.jpg', 335, 1),
(8, 'Coronación de la Virgen', 'velazquez-coronacion-virgen.jpg', 895, 1),
(9, 'La infanta Margarita en azul', 'tcve0014-velazquez.jpg', 225, 1),
(10, 'Cabeza de venado', 'velazquez-cabeza-venado.jpg', 225, 1),
(13, 'Felipe IV', 'velazquez-felipe-iv.jpg', 225, 1),
(14, 'El triunfo de Baco', 'triunfo-baco-borrachos-velazquez_1.jpg', 879, 1),
(15, 'San Antonio Abad y San Pablo primer ermitaño', 'velazquez-san-antonio-abad-san-pablo.jpg', 335, 1),
(16, 'Adoración de los Magos', 'velazquez-adoracion-magos.jpg', 879, 1),
(17, 'Vieja friendo huevos', 'velazquez-vieja-friendo-huevos.jpg', 335, 1),
(18, 'Cabeza de apóstol', 'velazquez-cabeza-apostol.jpg', 225, 1),
(19, 'Tres músicos', 'velazquez-tres-musicos.jpg', 355, 1),
(20, 'Tres hombres a la mesa', 'velazquez-tres-hombres-mesa.jpg', 355, 1),
(21, 'La rendición de Breda', 'velazquez-rendicion-breda.jpg', 879, 1),
(22, 'El príncipe Baltasar Carlos a caballo', 'tcve0015-velazquez.jpg', 355, 1),
(23, 'Francisco Lezcano, \"el Niño de Vallecas\"', 'velazquez-francisco-lezcano-nino-vallecas.jpg', 225, 1),
(24, 'Cristo en casa de Marta y María', 'velazquez-cristo-casa-marta-y-maria.jpg', 335, 1),
(25, 'El bufón don Sebastián de Morra', 'velazquez-bufon-sebastian-morra.jpg', 225, 1),
(26, 'Cuadro personalizado', 'encargar-cuadro-personalizado.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pintores`
--

CREATE TABLE `pintores` (
  `pin_id` int(11) NOT NULL,
  `pin_nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `pintores`
--

INSERT INTO `pintores` (`pin_id`, `pin_nombre`) VALUES
(1, 'Velázquez'),
(2, 'Goya'),
(3, 'Rubens');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuadros`
--
ALTER TABLE `cuadros`
  ADD PRIMARY KEY (`cua_id`),
  ADD KEY `r_cua_pintores` (`cua_pin_id`);

--
-- Indices de la tabla `pintores`
--
ALTER TABLE `pintores`
  ADD PRIMARY KEY (`pin_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuadros`
--
ALTER TABLE `cuadros`
  MODIFY `cua_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `pintores`
--
ALTER TABLE `pintores`
  MODIFY `pin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuadros`
--
ALTER TABLE `cuadros`
  ADD CONSTRAINT `r_cua_pintores` FOREIGN KEY (`cua_pin_id`) REFERENCES `pintores` (`pin_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
