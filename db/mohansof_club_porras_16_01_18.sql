-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2018 at 10:07 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mohansof_club_porras`
--

-- --------------------------------------------------------

--
-- Table structure for table `cobros`
--

CREATE TABLE `cobros` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_cobro` enum('uniformes','mensualidad','pistas','eventos','otros') COLLATE utf8_unicode_ci NOT NULL,
  `nombre_cobro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cobros`
--

INSERT INTO `cobros` (`id`, `tipo_cobro`, `nombre_cobro`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'uniformes', 'uniforme de gala', '2018-01-10 05:00:00', '2018-01-10 05:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `competencias`
--

CREATE TABLE `competencias` (
  `id` int(11) NOT NULL,
  `nombre_competencia` varchar(256) NOT NULL,
  `descripcion_competencia` varchar(256) NOT NULL,
  `posicion_competencia` varchar(256) NOT NULL,
  `lugar_competencia` varchar(256) NOT NULL,
  `fecha_competencia` date NOT NULL,
  `tipo_competencia` enum('locales','distritales','nacionales','internacionales','eventos') NOT NULL,
  `tipo_recurso` enum('video','imagen') NOT NULL,
  `url_recurso` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `competencias`
--

INSERT INTO `competencias` (`id`, `nombre_competencia`, `descripcion_competencia`, `posicion_competencia`, `lugar_competencia`, `fecha_competencia`, `tipo_competencia`, `tipo_recurso`, `url_recurso`, `created_at`, `updated_at`) VALUES
(1, 'prueba de talento 1', 'descripcion prueba de talento 1', 'tercer lugar', '', '2018-01-02', 'locales', 'video', 'U8hBIUH6i_Q', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'prueba de talento 2', 'descripcion prueba de talento 1', 'tercer lugar', '', '2018-01-02', 'distritales', 'video', 'U8hBIUH6i_Q', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'prueba de talento 3', 'descripcion prueba de talento 1', 'tercer lugar', '', '2018-01-02', 'locales', 'video', 'U8hBIUH6i_Q', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'prueba de talento 4', 'descripcion prueba de talento 1', 'tercer lugar', '', '2018-01-02', 'eventos', 'video', 'U8hBIUH6i_Q', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'prueba de talento 6', 'descripcion prueba de talento 1', 'tercer lugar', '', '2018-01-02', 'nacionales', 'video', 'U8hBIUH6i_Q', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'prueba de talento 8', 'descripcion prueba de talento 1', 'tercer lugar', '', '2018-01-02', 'locales', 'video', 'U8hBIUH6i_Q', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'prueba de talento 9', 'descripcion prueba de talento 1', 'tercer lugar', '', '2018-01-02', 'locales', 'video', 'U8hBIUH6i_Q', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'prueba de talento 10', 'descripcion prueba de talento 1', 'tercer lugar', '', '2018-01-02', 'internacionales', 'video', 'U8hBIUH6i_Q', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `deportistas`
--

CREATE TABLE `deportistas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto_perfil` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad` int(11) NOT NULL,
  `rh` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `documento_identidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expedicion_di` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `genero` enum('M','F') COLLATE utf8_unicode_ci NOT NULL,
  `direccion_vivienda` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eps` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cotizante_eps` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `toma_medicamentos` enum('SI','NO') COLLATE utf8_unicode_ci NOT NULL,
  `medicamentos` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alergia_medicamentos` enum('SI','NO') COLLATE utf8_unicode_ci NOT NULL,
  `ale_medicamentos` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enfermedades` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lesiones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en_caso_emergencia_nombre_uno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en_caso_emergencia_telefono_uno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en_caso_emergencia_parentezco_uno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en_caso_emergencia_nombre_dos` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en_caso_emergencia_telefono_dos` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en_caso_emergencia_parentezco_dos` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_id_usuario` int(10) UNSIGNED NOT NULL,
  `fk_id_grupo` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `deportistas`
--

INSERT INTO `deportistas` (`id`, `nombres`, `apellidos`, `foto_perfil`, `fecha_nacimiento`, `edad`, `rh`, `documento_identidad`, `expedicion_di`, `genero`, `direccion_vivienda`, `telefono`, `celular`, `eps`, `cotizante_eps`, `toma_medicamentos`, `medicamentos`, `alergia_medicamentos`, `ale_medicamentos`, `enfermedades`, `lesiones`, `en_caso_emergencia_nombre_uno`, `en_caso_emergencia_telefono_uno`, `en_caso_emergencia_parentezco_uno`, `en_caso_emergencia_nombre_dos`, `en_caso_emergencia_telefono_dos`, `en_caso_emergencia_parentezco_dos`, `fk_id_usuario`, `fk_id_grupo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'edgar', 'e', '', '2017-12-31', 0, 'e', 'e', 'e', 'F', 'e', 'e', 'e', 'e', 'e', 'SI', '', 'SI', '', 'e', NULL, 'e', 'e', 'e', '', '', '', 15, 1, '2017-12-24 08:23:25', '2017-12-24 08:23:25', NULL),
(9, 'edgar adrian', 'ed', '', '1985-01-02', 32, '0-', '123', '123', 'M', 'ddd', 'ddd', 'ddd', 'dd', 'dd', 'NO', '', 'NO', '', 'ninguna', 'ninguna', 'nadie', '123', 'nadie', '', '', '', 16, 1, '2017-12-24 09:02:09', '2017-12-24 09:02:09', NULL),
(11, 'edgaitar adrian', 'EEE', '25551819_478619009198726_4317718600503101803_n.png', '1985-01-01', 32, 'UJ', '123E', '12', 'M', '3', '123', 'E', 'D', 'D', 'NO', '', 'NO', '', 'ED', 'D', 'D', 'D', 'D', '', '', '', 18, 1, '2017-12-24 09:35:25', '2017-12-24 09:35:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detalle_abonos`
--

CREATE TABLE `detalle_abonos` (
  `id` int(10) UNSIGNED NOT NULL,
  `fk_id_detalle_cobro` int(10) UNSIGNED NOT NULL,
  `fk_id_deportista` int(10) UNSIGNED NOT NULL,
  `fk_id_usuario_registro_pago` int(10) UNSIGNED NOT NULL,
  `saldo_anterior` decimal(10,2) NOT NULL,
  `valor_abonado` decimal(10,2) NOT NULL,
  `nuevo_saldo` decimal(10,2) NOT NULL,
  `fecha_abono` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detalle_abonos`
--

INSERT INTO `detalle_abonos` (`id`, `fk_id_detalle_cobro`, `fk_id_deportista`, `fk_id_usuario_registro_pago`, `saldo_anterior`, `valor_abonado`, `nuevo_saldo`, `fecha_abono`, `created_at`, `updated_at`) VALUES
(4, 1, 11, 2, '60000.00', '2000.00', '58000.00', '2018-01-12 15:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 11, 2, '58000.00', '100.00', '57900.00', '2018-01-11 00:00:00', '2018-01-10 17:22:52', '2018-01-10 17:22:52'),
(6, 1, 11, 2, '57900.00', '12.00', '57888.00', '2018-01-23 00:00:00', '2018-01-10 17:23:58', '2018-01-10 17:23:58'),
(7, 1, 11, 2, '57888.00', '1.00', '57887.00', '2018-01-10 00:00:00', '2018-01-10 17:24:20', '2018-01-10 17:24:20'),
(8, 1, 11, 2, '57887.00', '12.00', '57875.00', '2018-01-09 00:00:00', '2018-01-10 17:26:57', '2018-01-10 17:26:57');

-- --------------------------------------------------------

--
-- Table structure for table `detalle_cobros`
--

CREATE TABLE `detalle_cobros` (
  `id` int(10) UNSIGNED NOT NULL,
  `fk_id_cobro` int(10) UNSIGNED NOT NULL,
  `fk_id_deportista` int(10) UNSIGNED NOT NULL,
  `numero_cuotas` int(11) NOT NULL,
  `total_a_pagar` decimal(10,2) NOT NULL,
  `pago_hasta_la_fecha` decimal(10,2) NOT NULL,
  `saldo_pendiente` decimal(10,2) NOT NULL,
  `saldo_a_favor` decimal(10,2) NOT NULL,
  `desde` date NOT NULL,
  `hasta` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `detalle_cobros`
--

INSERT INTO `detalle_cobros` (`id`, `fk_id_cobro`, `fk_id_deportista`, `numero_cuotas`, `total_a_pagar`, `pago_hasta_la_fecha`, `saldo_pendiente`, `saldo_a_favor`, `desde`, `hasta`, `created_at`, `updated_at`) VALUES
(1, 1, 11, 6, '60000.00', '2125.00', '57875.00', '0.00', '2018-01-01', '2018-01-17', '2018-01-10 05:00:00', '2018-01-11 03:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `experiencia_entrenadors`
--

CREATE TABLE `experiencia_entrenadors` (
  `id` int(10) UNSIGNED NOT NULL,
  `fk_id_profesor` int(10) UNSIGNED NOT NULL,
  `tipo` enum('curso','exp_laboral') COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desde` date NOT NULL,
  `hasta` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grupos`
--

CREATE TABLE `grupos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_grupo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fk_id_profesor` int(10) UNSIGNED NOT NULL,
  `estado_grupo` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `fk_id_nivel` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grupos`
--

INSERT INTO `grupos` (`id`, `nombre_grupo`, `fk_id_profesor`, `estado_grupo`, `fk_id_nivel`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'grupo a', 2, '', 1, NULL, NULL, NULL),
(2, 'grupo b', 2, '', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_12_15_175623_create_profesors_table', 1),
('2017_12_15_175715_create_nivels_table', 1),
('2017_12_15_175756_create_grupos_table', 1),
('2017_12_15_175824_create_cobros_table', 1),
('2017_12_15_175900_create_experiencia_entrenadors_table', 1),
('2017_12_15_175930_create_deportistas_table', 1),
('2017_12_15_180013_create_detalle_cobros_table', 1),
('2017_12_15_180044_create_notificacions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nivels`
--

CREATE TABLE `nivels` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_nivel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nivels`
--

INSERT INTO `nivels` (`id`, `nombre_nivel`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notificacions`
--

CREATE TABLE `notificacions` (
  `id` int(10) UNSIGNED NOT NULL,
  `mensaje` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fk_id_deportista` int(10) UNSIGNED NOT NULL,
  `fk_id_entrenador` int(10) UNSIGNED NOT NULL,
  `fecha_entraga` date NOT NULL,
  `estado_noti` enum('pendiente','enviado','leido') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre_producto` varchar(256) NOT NULL,
  `descripcion_producto` varchar(256) NOT NULL,
  `talla` varchar(256) NOT NULL,
  `color` varchar(256) NOT NULL,
  `material` varchar(256) NOT NULL,
  `tipo_producto` enum('uniformes','busos','tops','short','bows','personalizados','varios') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre_producto`, `descripcion_producto`, `talla`, `color`, `material`, `tipo_producto`, `created_at`, `updated_at`) VALUES
(1, 'producto 1', 'descripcion producto 1', 'S', 'NEGRO, ROJO , AZUL', 'LICRA', 'uniformes', '2018-01-15 00:00:00', '2018-01-15 00:00:00'),
(2, 'producto 2', 'descripcion producto 2', 'm', 'AZUL', 'platico', 'busos', '2018-01-15 00:00:00', '2018-01-15 00:00:00'),
(3, 'producto 3', 'descripcion producto 3', 'S', 'NEGRO, ROJO , AZUL', 'LICRA', 'short', '2018-01-15 00:00:00', '2018-01-15 00:00:00'),
(4, 'producto 4', 'descripcion producto 4', 'm', 'rojo', 'lana', 'personalizados', '2018-01-15 00:00:00', '2018-01-15 00:00:00'),
(5, 'producto 5', 'descripcion producto 5', 'L', 'GRIS , DORADO', 'LICRA', 'varios', '2018-01-15 00:00:00', '2018-01-15 00:00:00'),
(6, 'producto 6', 'descripcion producto 6', 'm', 'AZUL', 'platico', 'busos', '2018-01-15 00:00:00', '2018-01-15 00:00:00'),
(7, 'producto 7', 'descripcion producto 7', 'S', 'NEGRO, ROJO , AZUL', 'LICRA', 'bows', '2018-01-15 00:00:00', '2018-01-15 00:00:00'),
(8, 'producto 8', 'descripcion producto 8', 'm', 'rojo', 'lana', 'personalizados', '2018-01-15 00:00:00', '2018-01-15 00:00:00'),
(9, 'producto 8', 'descripcion producto 8', 'm', 'rojo', 'lana', 'tops', '2018-01-15 00:00:00', '2018-01-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `profesors`
--

CREATE TABLE `profesors` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto_perfil` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad` int(11) NOT NULL,
  `rh` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `documento_identidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expedicion_di` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `genero` enum('M','F') COLLATE utf8_unicode_ci NOT NULL,
  `direccion_vivienda` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eps` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cotizante_eps` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `toma_medicamentos` enum('SI','NO') COLLATE utf8_unicode_ci NOT NULL,
  `medicamentos` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alergia_medicamentos` enum('SI','NO') COLLATE utf8_unicode_ci NOT NULL,
  `ale_medicamentos` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enfermedades` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en_caso_emergencia_nombre_uno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en_caso_emergencia_telefono_uno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en_caso_emergencia_parentezco_uno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en_caso_emergencia_nombre_dos` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en_caso_emergencia_telefono_dos` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en_caso_emergencia_parentezco_dos` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_id_usuario` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profesors`
--

INSERT INTO `profesors` (`id`, `nombres`, `apellidos`, `foto_perfil`, `fecha_nacimiento`, `edad`, `rh`, `documento_identidad`, `expedicion_di`, `genero`, `direccion_vivienda`, `telefono`, `celular`, `eps`, `cotizante_eps`, `toma_medicamentos`, `medicamentos`, `alergia_medicamentos`, `ale_medicamentos`, `enfermedades`, `en_caso_emergencia_nombre_uno`, `en_caso_emergencia_telefono_uno`, `en_caso_emergencia_parentezco_uno`, `en_caso_emergencia_nombre_dos`, `en_caso_emergencia_telefono_dos`, `en_caso_emergencia_parentezco_dos`, `fk_id_usuario`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'edgar', 'guzman', 'foto.png', '1989-11-15', 28, 'o+', '1073684233', 'soacha', 'M', 'Calle 10D # 13B - 68 SUR', '7323251', '3172269546', 'compensar', 'edgar guzman', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(3, 'E', 'E', '', '2018-12-31', 0, 'E-', '123', '123', 'M', 'EeE', 'ER', 'E', 'E', 'E', 'SI', '', 'SI', '', NULL, 'E', 'E', 'E', '', '', '', 24, '2018-01-13 02:24:28', '2018-01-13 02:24:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suscripcions`
--

CREATE TABLE `suscripcions` (
  `id` int(11) NOT NULL,
  `correo` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suscripcions`
--

INSERT INTO `suscripcions` (`id`, `correo`, `created_at`, `updated_at`) VALUES
(1, 'edgar.guzman21@gmail.com', '2018-01-15 23:11:05', '2018-01-15 23:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rol` enum('admin','entrenador','deportista') COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `rol`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'edgar@sos.com', '123', 'admin', NULL, NULL, '2017-12-26 22:07:58'),
(15, 'edgar.guzman21@gmail.com', 'Uci2hs', 'admin', NULL, '2017-12-24 08:23:25', '2017-12-26 22:09:59'),
(16, 'edgar@mohansoft.com', '123', 'admin', NULL, '2017-12-24 09:02:09', '2017-12-24 09:02:09'),
(17, 'edgar.guzman1@gmail.com', '123', 'admin', NULL, '2017-12-24 09:34:16', '2017-12-24 09:34:16'),
(18, 'edgar.guzman@gmail.com', '123', 'deportista', NULL, '2017-12-24 09:35:25', '2017-12-24 09:35:25'),
(19, 'edgar.guzma@gmail.com', '123', 'deportista', NULL, '2017-12-24 09:42:56', '2017-12-24 09:42:56'),
(21, 'stalin@mohansoft.com', '123', 'deportista', NULL, '2018-01-10 22:09:50', '2018-01-10 22:09:50'),
(22, '123', '123', 'deportista', NULL, '2018-01-13 02:20:52', '2018-01-13 02:20:52'),
(23, '123@123.COM', '123', 'deportista', NULL, '2018-01-13 02:22:33', '2018-01-13 02:22:33'),
(24, '123@1-23.COM', '123', 'deportista', NULL, '2018-01-13 02:24:28', '2018-01-13 02:24:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cobros`
--
ALTER TABLE `cobros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competencias`
--
ALTER TABLE `competencias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deportistas`
--
ALTER TABLE `deportistas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `deportistas_documento_identidad_unique` (`documento_identidad`),
  ADD KEY `deportistas_fk_id_usuario_foreign` (`fk_id_usuario`),
  ADD KEY `deportistas_fk_id_grupo_foreign` (`fk_id_grupo`);

--
-- Indexes for table `detalle_abonos`
--
ALTER TABLE `detalle_abonos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_detalle_cobro` (`fk_id_detalle_cobro`),
  ADD KEY `fk_id_usuario_registro_pago` (`fk_id_usuario_registro_pago`),
  ADD KEY `fk_id_usuario_registro_pago_2` (`fk_id_usuario_registro_pago`),
  ADD KEY `fk_id_deportista` (`fk_id_deportista`);

--
-- Indexes for table `detalle_cobros`
--
ALTER TABLE `detalle_cobros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalle_cobros_fk_id_cobro_foreign` (`fk_id_cobro`),
  ADD KEY `detalle_cobros_fk_id_deportista_foreign` (`fk_id_deportista`);

--
-- Indexes for table `experiencia_entrenadors`
--
ALTER TABLE `experiencia_entrenadors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `experiencia_entrenadors_fk_id_profesor_foreign` (`fk_id_profesor`);

--
-- Indexes for table `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grupos_fk_id_profesor_foreign` (`fk_id_profesor`),
  ADD KEY `grupos_fk_id_nivel_foreign` (`fk_id_nivel`);

--
-- Indexes for table `nivels`
--
ALTER TABLE `nivels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notificacions`
--
ALTER TABLE `notificacions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notificacions_fk_id_deportista_foreign` (`fk_id_deportista`),
  ADD KEY `notificacions_fk_id_entrenador_foreign` (`fk_id_entrenador`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profesors`
--
ALTER TABLE `profesors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profesors_documento_identidad_unique` (`documento_identidad`),
  ADD KEY `profesors_fk_id_usuario_foreign` (`fk_id_usuario`);

--
-- Indexes for table `suscripcions`
--
ALTER TABLE `suscripcions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cobros`
--
ALTER TABLE `cobros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `competencias`
--
ALTER TABLE `competencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `deportistas`
--
ALTER TABLE `deportistas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `detalle_abonos`
--
ALTER TABLE `detalle_abonos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `detalle_cobros`
--
ALTER TABLE `detalle_cobros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `experiencia_entrenadors`
--
ALTER TABLE `experiencia_entrenadors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nivels`
--
ALTER TABLE `nivels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notificacions`
--
ALTER TABLE `notificacions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `profesors`
--
ALTER TABLE `profesors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `suscripcions`
--
ALTER TABLE `suscripcions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `deportistas`
--
ALTER TABLE `deportistas`
  ADD CONSTRAINT `deportistas_fk_id_grupo_foreign` FOREIGN KEY (`fk_id_grupo`) REFERENCES `grupos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deportistas_fk_id_usuario_foreign` FOREIGN KEY (`fk_id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detalle_abonos`
--
ALTER TABLE `detalle_abonos`
  ADD CONSTRAINT `fk_id_deportista` FOREIGN KEY (`fk_id_deportista`) REFERENCES `deportistas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_detalle_cobro` FOREIGN KEY (`fk_id_detalle_cobro`) REFERENCES `detalle_cobros` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_usuario_registro_pago` FOREIGN KEY (`fk_id_usuario_registro_pago`) REFERENCES `profesors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detalle_cobros`
--
ALTER TABLE `detalle_cobros`
  ADD CONSTRAINT `detalle_cobros_fk_id_cobro_foreign` FOREIGN KEY (`fk_id_cobro`) REFERENCES `cobros` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detalle_cobros_fk_id_deportista_foreign` FOREIGN KEY (`fk_id_deportista`) REFERENCES `deportistas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `experiencia_entrenadors`
--
ALTER TABLE `experiencia_entrenadors`
  ADD CONSTRAINT `experiencia_entrenadors_fk_id_profesor_foreign` FOREIGN KEY (`fk_id_profesor`) REFERENCES `profesors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `grupos_fk_id_nivel_foreign` FOREIGN KEY (`fk_id_nivel`) REFERENCES `nivels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `grupos_fk_id_profesor_foreign` FOREIGN KEY (`fk_id_profesor`) REFERENCES `profesors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notificacions`
--
ALTER TABLE `notificacions`
  ADD CONSTRAINT `notificacions_fk_id_deportista_foreign` FOREIGN KEY (`fk_id_deportista`) REFERENCES `deportistas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notificacions_fk_id_entrenador_foreign` FOREIGN KEY (`fk_id_entrenador`) REFERENCES `profesors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profesors`
--
ALTER TABLE `profesors`
  ADD CONSTRAINT `profesors_fk_id_usuario_foreign` FOREIGN KEY (`fk_id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
