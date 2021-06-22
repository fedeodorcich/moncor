-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2021 a las 17:08:52
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
(8, 'CWJ287', 'fede.odorcich@gmail.com', 'Particular', '2021-04-23 12:52:04'),
(9, 'WQE312', 'fede.odorcich@gmail.com', 'Particular', '2021-04-23 13:31:38'),
(10, 'ASDASD', 'aaaaaa@gmail.com', 'Particular', '2021-04-23 14:34:47'),
(11, 'MNH543', 'josep@gmail.com', 'Particular', '2021-04-26 22:48:47'),
(12, 'CWJ287', 'fede.odorcich@gmail.com', 'Particular', '2021-04-28 13:55:24');

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
(1, 'Particular', '2021-04-14 12:42:40'),
(2, 'comisaria', '2021-04-20 22:28:24'),
(3, 'Comisaria 29', '2021-04-21 21:47:32'),
(4, 'Comisaria 5ta', '2021-04-26 22:46:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especificaciones`
--

CREATE TABLE `especificaciones` (
  `id` int(255) NOT NULL,
  `vehiculo` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cilindrada` int(10) NOT NULL,
  `km_service` int(255) NOT NULL,
  `km_cubiertas` int(255) NOT NULL,
  `anio_bateria` int(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `especificaciones`
--

INSERT INTO `especificaciones` (`id`, `vehiculo`, `cilindrada`, `km_service`, `km_cubiertas`, `anio_bateria`, `timestamp`) VALUES
(1, 'Moto', 150, 4000, 1000, 3, '2021-04-23 14:17:13'),
(2, 'Moto', 250, 13000, 2000, 2, '2021-04-20 22:35:19'),
(3, 'Moto', 200, 4000, 3000, 3, '2021-04-21 21:51:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(255) NOT NULL,
  `patente` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `patente`, `fecha`, `timestamp`) VALUES
(1, 'DRT786', '2021-04-20 12:00:00', '2021-04-21 21:51:02'),
(2, 'CWJ287', '2021-04-23 12:00:00', '2021-04-23 12:16:27'),
(3, 'CWJ287', '2021-04-23 12:00:00', '2021-04-23 12:21:41'),
(4, 'CWJ287', '2021-04-23 12:00:00', '2021-04-23 12:23:01'),
(5, 'MNH543', '2021-04-26 12:00:00', '2021-04-26 22:51:27'),
(6, 'ASDASD', '2021-05-07 12:00:00', '2021-05-07 13:04:34');

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
(1, 'Usuario', 'user', 'pass', '2021-04-14 12:26:19'),
(2, 'Javier Bustos', 'javier', 'Dylan353', '2021-04-21 21:53:30');

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
(1, 'Federico Odorcich', '2645094139', 'fede.odorcich@gmail.com', 'Particular', '2021-04-14 12:44:21'),
(2, 'asdsds', '264345678', 'aaaaaa@gmail.com', 'Particular', '2021-04-21 21:48:09'),
(3, 'jose perez', '2645678765', 'josep@gmail.com', 'Particular', '2021-04-26 22:47:13');

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
  `total_cubiertas` int(255) NOT NULL,
  `km_aux` int(255) NOT NULL,
  `km_cubiertas` int(255) NOT NULL,
  `km_diarios` int(255) NOT NULL,
  `last_service` datetime NOT NULL,
  `last_cubiertas` datetime NOT NULL,
  `last_battery` datetime NOT NULL,
  `fecha_carga` datetime NOT NULL,
  `notified` int(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `vehiculo`, `patente`, `cilindrada`, `km_total`, `total_cubiertas`, `km_aux`, `km_cubiertas`, `km_diarios`, `last_service`, `last_cubiertas`, `last_battery`, `fecha_carga`, `notified`, `timestamp`) VALUES
(9, 'moto', 'WQE312', 150, 22300, 0, 3200, 2800, 200, '2021-04-21 10:31:38', '2021-04-23 10:31:38', '2021-04-23 10:31:38', '2021-04-23 10:31:38', 0, '2021-05-07 13:05:38'),
(10, 'moto', 'ASDASD', 200, 16600, 0, 2100, 0, 150, '2021-04-23 11:34:47', '2021-05-07 12:00:00', '2021-04-23 11:34:47', '2021-04-23 11:34:47', 0, '2021-05-07 13:05:38');

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
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `entidades`
--
ALTER TABLE `entidades`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `especificaciones`
--
ALTER TABLE `especificaciones`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users_vehiculos`
--
ALTER TABLE `users_vehiculos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
