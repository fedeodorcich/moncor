-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-03-2021 a las 14:55:56
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sjbikes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asociacion`
--

CREATE TABLE `asociacion` (
  `id` int(255) NOT NULL,
  `patente` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `user` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `entidad` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `asociacion`
--

INSERT INTO `asociacion` (`id`, `patente`, `user`, `entidad`, `timestamp`) VALUES
(4, 'CWJ 287', 'Odin', 'Comisaria 5ta', '2021-03-09 22:53:54'),
(5, 'CWJ 287', 'Thor', 'Comisaria 5ta', '2021-03-09 22:53:54'),
(6, 'ABC 123', 'Odin', 'Comisaria 5ta', '2021-03-09 23:08:44'),
(7, 'ABC 123', 'Thor', 'Comisaria 5ta', '2021-03-09 23:08:44'),
(8, 'FNO992', 'Odin', 'Comisaria 5ta', '2021-03-13 05:23:48'),
(9, 'FNO992', 'Thor', 'Comisaria 5ta', '2021-03-13 05:23:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidades`
--

CREATE TABLE `entidades` (
  `id` int(255) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `entidades`
--

INSERT INTO `entidades` (`id`, `nombre`, `timestamp`) VALUES
(1, 'Comisaria 5ta', '2021-02-25 15:51:49'),
(2, 'Valhalla', '2021-02-25 16:47:38'),
(3, 'Lorencia', '2021-03-15 13:08:15'),
(4, 'Devias', '2021-03-15 13:10:02'),
(5, 'Lost Tower', '2021-03-15 13:10:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especificaciones`
--

CREATE TABLE `especificaciones` (
  `id` int(255) NOT NULL,
  `vehiculo` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cilindrada` int(10) NOT NULL,
  `km_service` int(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `especificaciones`
--

INSERT INTO `especificaciones` (`id`, `vehiculo`, `cilindrada`, `km_service`, `timestamp`) VALUES
(2, 'moto', 150, 210, '2021-03-10 15:19:17'),
(3, 'moto', 125, 100, '2021-03-12 14:21:02'),
(4, 'auto', 13, 234, '2021-03-12 16:13:19'),
(6, 'Moto', 350, 200, '2021-03-12 16:37:21'),
(7, 'Moto', 777, 888, '2021-03-13 03:47:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `user` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `pass` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `user`, `pass`, `timestamp`) VALUES
(1, 'Walter Juarez', 'walter', '1234', '2021-02-23 15:29:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_vehiculos`
--

CREATE TABLE `users_vehiculos` (
  `id` int(255) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `entidad` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `users_vehiculos`
--

INSERT INTO `users_vehiculos` (`id`, `nombre`, `telefono`, `email`, `entidad`, `timestamp`) VALUES
(2, 'Odin', '2643453', 'fede.odorcich@gmail.com', 'Comisaria 5ta', '2021-02-25 16:48:27'),
(19, 'Thor', '2643453', 'qweqweq@gmail.com', 'Comisaria 5ta', '2021-02-25 16:11:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(255) NOT NULL,
  `vehiculo` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `patente` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cilindrada` int(11) NOT NULL,
  `km_total` int(255) NOT NULL,
  `km_aux` int(255) NOT NULL,
  `km_diarios` int(255) NOT NULL,
  `last_service` datetime NOT NULL,
  `fecha_carga` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `vehiculo`, `patente`, `cilindrada`, `km_total`, `km_aux`, `km_diarios`, `last_service`, `fecha_carga`, `timestamp`) VALUES
(9, 'auto', 'CWJ287', 100, 0, 0, 150, '2021-03-09 19:53:54', '2021-03-09 19:53:54', '2021-03-13 05:36:06'),
(10, 'auto', 'ABC 123', 0, 0, 0, 123, '2021-03-09 20:08:44', '2021-03-09 20:08:44', '2021-03-09 23:08:44'),
(12, 'moto', 'FNO992', 150, 0, 0, 130, '2021-03-13 02:23:48', '2021-03-13 02:23:48', '2021-03-13 05:23:48');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asociacion`
--
ALTER TABLE `asociacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entidades`
--
ALTER TABLE `entidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especificaciones`
--
ALTER TABLE `especificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_vehiculos`
--
ALTER TABLE `users_vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asociacion`
--
ALTER TABLE `asociacion`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `entidades`
--
ALTER TABLE `entidades`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `especificaciones`
--
ALTER TABLE `especificaciones`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users_vehiculos`
--
ALTER TABLE `users_vehiculos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
