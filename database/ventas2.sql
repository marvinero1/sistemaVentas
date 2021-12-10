-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para ventas
CREATE DATABASE IF NOT EXISTS `ventas` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `ventas`;

-- Volcando estructura para tabla ventas.articulos
CREATE TABLE IF NOT EXISTS `articulos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_comprobante` enum('factura','recibo','nota') COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_comprobante` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_barras` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio_compra` double(8,2) NOT NULL,
  `precio_venta` double(8,2) NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen_promocion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag_carrito` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `promocion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `imagen_novedad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `novedad` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoria_nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoria_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `subcategoria_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articulos_categoria_id_foreign` (`categoria_id`),
  KEY `articulos_subcategoria_id_foreign` (`subcategoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.articulos: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `articulos` DISABLE KEYS */;
INSERT INTO `articulos` (`id`, `nombre`, `tipo_comprobante`, `num_comprobante`, `fecha`, `cantidad`, `unidad`, `codigo_barras`, `precio_compra`, `precio_venta`, `descripcion`, `imagen`, `imagen_promocion`, `flag_carrito`, `promocion`, `imagen_novedad`, `novedad`, `categoria_nombre`, `categoria_id`, `subcategoria_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(15, 'Coca cola', 'factura', '321231', '2021-09-17', '78', 'piezas', '123547896501', 10.00, 13.00, 'Coca-Cola es una bebida gaseosa y refrescante vendida a nivel mundial en tiendas, restaurantes y máquinas expendedoras en más de doscientos países o territorios. Es el principal producto de The Coca-Cola Company', 'images/articulos/1-122101-7.jpg', NULL, 'false', '', NULL, NULL, NULL, 'Refrescos', 'Refrescos con azucar', NULL, '2021-09-17 08:21:01', '2021-12-09 18:42:39'),
	(16, 'Coca cola zero de 2L', 'factura', '321232', '2021-09-17', '27', 'piezas', '123547896502', 8.00, 11.00, 'Coca-Cola Zero es una bebida producida por The Coca-Cola Company, que es un versión de Coca-Cola sin azúcar. Su eslogan es "Zero calorías", sin embargo, en otros países también se conoce como "Zero azúcar"', 'images/articulos/5-122350-7.jpg', NULL, 'false', '', NULL, NULL, NULL, 'Refrescos', 'Refrescos de dieta', NULL, '2021-09-17 08:23:50', '2021-12-10 04:12:21'),
	(17, 'Tampico 3L', 'factura', '321233', '2021-09-17', '48', 'piezas', '123547896503', 9.00, 12.00, 'Bebida refrescante elaborada con jugo concentrado de frutas', 'images/articulos/5-122543-9.jpg', NULL, 'false', '', 'images/articulos/10-030459-6.jpg', 'true', NULL, 'Jugos', 'jugos de pulpa', NULL, '2021-09-17 08:25:43', '2021-12-10 15:04:59'),
	(18, 'Pura vida 2L', 'factura', '321204', '2021-09-16', '57', 'piezas', '123547896504', 9.50, 12.00, 'Es un producto elaborado con puré y/o jugos concentrados de frutas frescas y agua tratada', 'images/articulos/8-122742-10.jpg', NULL, 'false', NULL, NULL, 'false', NULL, 'Jugos', 'jugos sin pulpa', NULL, '2021-09-17 08:27:42', '2021-12-10 14:22:34'),
	(19, 'Paceña 750ml', 'factura', '321205', '2021-09-17', '60', 'piezas', '123547896505', 10.00, 15.00, 'Paceña es la cerveza que representa el orgullo nacional y el genuino gusto cervecero de Bolivia, con más de 130 años de tradición', 'images/articulos/3-123028-10.jpg', 'images/articulos/3-024544-8.jpg', 'false', 'true', 'images/articulos/10-030441-5.jpg', 'true', NULL, 'Bebidas alcholicas', 'Cerveza', NULL, '2021-09-17 08:30:28', '2021-12-10 15:04:41'),
	(20, 'Black Label 1L', 'factura', '321206', '2021-09-17', '18', 'piezas', '123547896506', 170.00, 240.00, 'Johnnie Walker Black Label es un verdadero ícono. Creado usando whiskies de los cuatro rincones de Escocia, es un whisky excepcional', 'images/articulos/9-123239-6.jpg', 'images/articulos/7-024356-6.jpg', 'false', 'true', 'images/articulos/3-030426-4.jpg', 'true', NULL, 'Bebidas alcholicas', 'licores', NULL, '2021-09-17 08:32:39', '2021-12-10 15:04:26'),
	(25, 'sprite 3L', 'factura', '3212312', '2021-12-04', '45', 'piezas', '123547896526', 10.00, 50.00, NULL, 'images/articulos/5-014908-5.jpg', NULL, 'false', NULL, NULL, NULL, NULL, 'Refrescos', 'Refrescos con azucar', NULL, '2021-12-04 09:49:08', '2021-12-10 13:51:40'),
	(26, 'Leche Pil', 'factura', '01124', '2021-12-29', '19', 'piezas', '784845421547', 10.00, 58.00, NULL, 'images/articulos/5-024545-9.jpeg', NULL, 'false', 'false', 'images/articulos/8-030252-2.jpg', 'false', NULL, 'Leche', 'Cerveza', NULL, '2021-12-10 02:45:45', '2021-12-10 15:04:04'),
	(27, 'Pura vida 2L', 'factura', '321204', '2021-09-16', '57', 'piezas', '123547896504', 9.50, 12.00, 'Es un producto elaborado con puré y/o jugos concentrados de frutas frescas y agua tratada', 'images/articulos/8-122742-10.jpg', NULL, 'false', NULL, 'images/articulos/3-030516-5.jpg', 'true', NULL, 'Jugos', 'jugos sin pulpa', NULL, '2021-09-17 08:27:42', '2021-12-10 15:05:16'),
	(28, 'Pura vida 2L', 'factura', '321204', '2021-09-16', '57', 'piezas', '123547896504', 9.50, 12.00, 'Es un producto elaborado con puré y/o jugos concentrados de frutas frescas y agua tratada', 'images/articulos/8-122742-10.jpg', NULL, 'false', NULL, NULL, NULL, NULL, 'Jugos', 'jugos sin pulpa', NULL, '2021-09-17 08:27:42', '2021-12-10 00:09:34'),
	(29, 'Pura vida 2L', 'factura', '321204', '2021-09-16', '57', 'piezas', '123547896504', 9.50, 12.00, 'Es un producto elaborado con puré y/o jugos concentrados de frutas frescas y agua tratada', 'images/articulos/8-122742-10.jpg', NULL, 'false', NULL, NULL, NULL, NULL, 'Jugos', 'jugos sin pulpa', NULL, '2021-09-17 08:27:42', '2021-12-10 00:09:34'),
	(30, 'Pura vida 2L', 'factura', '321204', '2021-09-16', '57', 'piezas', '123547896504', 9.50, 12.00, 'Es un producto elaborado con puré y/o jugos concentrados de frutas frescas y agua tratada', 'images/articulos/8-122742-10.jpg', NULL, 'false', NULL, NULL, NULL, NULL, 'Jugos', 'jugos sin pulpa', NULL, '2021-09-17 08:27:42', '2021-12-10 00:09:34');
/*!40000 ALTER TABLE `articulos` ENABLE KEYS */;

-- Volcando estructura para tabla ventas.carritos
CREATE TABLE IF NOT EXISTS `carritos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_cliente` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destino` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_carritos_users` (`user_id`),
  CONSTRAINT `FK_carritos_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.carritos: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `carritos` DISABLE KEYS */;
INSERT INTO `carritos` (`id`, `estado`, `nombre_cliente`, `destino`, `nit`, `telefono`, `confirmacion`, `descripcion`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(20, 'true', 'prueba', 'avenida', '324234', '44444', 'true', 'aqweqwe', 1, NULL, '2021-12-07 10:16:50', '2021-12-07 11:10:01'),
	(21, 'true', 'maervin', 'mi casas', '76964', '78848484', 'true', 'adasdasdasd', 1, NULL, '2021-12-07 11:11:08', '2021-12-07 11:19:05'),
	(22, 'true', 'prueba', 'avenida', '74848484', '777777', 'true', 'prueba', 1, NULL, '2021-12-09 18:42:31', '2021-12-09 18:53:44'),
	(23, 'true', 'pruebaccccc', 'avenido', '345345345', '7777', 'false', 'sdff', 1, NULL, '2021-12-10 04:05:10', '2021-12-10 04:10:51'),
	(24, 'true', 'NNNN', 'NNNN', '6666', '66666', 'false', 'NNNN', 1, NULL, '2021-12-10 04:11:46', '2021-12-10 04:12:40');
/*!40000 ALTER TABLE `carritos` ENABLE KEYS */;

-- Volcando estructura para tabla ventas.carrito_detalles
CREATE TABLE IF NOT EXISTS `carrito_detalles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `num_comprobante` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad_pedido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_barras` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio_venta` double(8,2) NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen_novedad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carro_id` bigint(20) unsigned NOT NULL,
  `articulo_id` bigint(20) unsigned NOT NULL,
  `categoria_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carrito_detalles_carro_id_foreign` (`carro_id`),
  KEY `articulo_id` (`articulo_id`),
  CONSTRAINT `FK_carrito_detalles_articulos` FOREIGN KEY (`articulo_id`) REFERENCES `articulos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `carrito_detalles_carro_id_foreign` FOREIGN KEY (`carro_id`) REFERENCES `carritos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.carrito_detalles: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `carrito_detalles` DISABLE KEYS */;
INSERT INTO `carrito_detalles` (`id`, `num_comprobante`, `nombre`, `cantidad_pedido`, `codigo_barras`, `precio_venta`, `descripcion`, `imagen`, `imagen_novedad`, `carro_id`, `articulo_id`, `categoria_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(43, '321231', 'Coca cola', '3', '123547896501', 13.00, 'Coca-Cola es una bebida gaseosa y refrescante vendida a nivel mundial en tiendas, restaurantes y máquinas expendedoras en más de doscientos países o territorios. Es el principal producto de The Coca-Cola Company', 'images/articulos/1-122101-7.jpg', NULL, 20, 15, 'Refrescos', NULL, '2021-12-07 10:43:18', '2021-12-07 10:43:18'),
	(44, '321206', 'Black Label 1L', '2', '123547896506', 240.00, 'Johnnie Walker Black Label es un verdadero ícono. Creado usando whiskies de los cuatro rincones de Escocia, es un whisky excepcional', 'images/articulos/9-123239-6.jpg', 'images/articulos/4-123334-3.jpg', 21, 20, 'Bebidas alcholicas', NULL, '2021-12-07 11:11:17', '2021-12-07 11:11:17'),
	(45, '321231', 'Coca cola', '2', '123547896501', 13.00, 'Coca-Cola es una bebida gaseosa y refrescante vendida a nivel mundial en tiendas, restaurantes y máquinas expendedoras en más de doscientos países o territorios. Es el principal producto de The Coca-Cola Company', 'images/articulos/1-122101-7.jpg', NULL, 22, 15, 'Refrescos', NULL, '2021-12-09 18:42:39', '2021-12-09 18:42:39'),
	(46, '3212312', 'sprite 3L', '5', '123547896526', 50.00, NULL, 'images/articulos/5-014908-5.jpg', 'images/articulos/5-024153-1.jpeg', 23, 25, 'Refrescos', NULL, '2021-12-10 04:09:05', '2021-12-10 04:09:05'),
	(47, '01124', 'Leche Pil', '6', '784845421547', 58.00, NULL, 'images/articulos/5-024545-9.jpeg', 'images/articulos/4-024557-7.jpeg', 24, 26, 'Leche', NULL, '2021-12-10 04:12:07', '2021-12-10 04:12:07'),
	(48, '321232', 'Coca cola zero de 2L', '7', '123547896502', 11.00, 'Coca-Cola Zero es una bebida producida por The Coca-Cola Company, que es un versión de Coca-Cola sin azúcar. Su eslogan es "Zero calorías", sin embargo, en otros países también se conoce como "Zero azúcar"', 'images/articulos/5-122350-7.jpg', NULL, 24, 16, 'Refrescos', NULL, '2021-12-10 04:12:22', '2021-12-10 04:12:22');
/*!40000 ALTER TABLE `carrito_detalles` ENABLE KEYS */;

-- Volcando estructura para tabla ventas.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.categorias: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `user`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(13, 'Refrescos', NULL, 'admin', NULL, '2021-09-17 08:16:29', '2021-09-17 08:16:29'),
	(17, 'Bebidas alcholicas', NULL, 'admin', NULL, '2021-09-17 08:17:02', '2021-09-17 08:17:02'),
	(18, 'Jugos', NULL, 'admin', NULL, '2021-09-17 08:17:46', '2021-09-17 08:17:46'),
	(19, 'Leche', 'leche pil', 'admin', NULL, '2021-09-17 11:33:16', '2021-09-17 11:33:16');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla ventas.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_carnet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.clientes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Volcando estructura para tabla ventas.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla ventas.favoritos
CREATE TABLE IF NOT EXISTS `favoritos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_comprobante` enum('factura','recibo','nota') COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_comprobante` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio_compra` double(8,2) NOT NULL,
  `precio_venta` double(8,2) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen_novedad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag_carrito` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL,
  `novedad` enum('true','false') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `articulo_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `favoritos_articulo_id_foreign` (`articulo_id`),
  KEY `favoritos_user_id_foreign` (`user_id`),
  CONSTRAINT `favoritos_articulo_id_foreign` FOREIGN KEY (`articulo_id`) REFERENCES `articulos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `favoritos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.favoritos: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `favoritos` DISABLE KEYS */;
INSERT INTO `favoritos` (`id`, `nombre`, `tipo_comprobante`, `num_comprobante`, `fecha`, `cantidad`, `unidad`, `precio_compra`, `precio_venta`, `descripcion`, `imagen`, `imagen_novedad`, `flag_carrito`, `novedad`, `articulo_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(6, 'Coca cola', 'factura', '321231', '2021-09-17', '83', 'piezas', 10.00, 13.00, 'Coca-Cola es una bebida gaseosa y refrescante vendida a nivel mundial en tiendas, restaurantes y máquinas expendedoras en más de doscientos países o territorios. Es el principal producto de The Coca-Cola Company', 'images/articulos/1-122101-7.jpg', NULL, 'false', NULL, 15, 1, NULL, '2021-12-07 10:40:46', '2021-12-07 10:40:46'),
	(7, 'sprite 3L', 'factura', '3212312', '2021-12-04', '121', 'piezas', 10.00, 12.00, NULL, 'images/articulos/5-014908-5.jpg', NULL, 'false', NULL, 25, 1, NULL, '2021-12-07 10:41:24', '2021-12-07 10:41:24'),
	(8, 'sprite 3L', 'factura', '3212312', '2021-12-04', '121', 'piezas', 10.00, 12.00, NULL, 'images/articulos/5-014908-5.jpg', NULL, 'false', NULL, 25, 1, NULL, '2021-12-07 10:41:24', '2021-12-07 10:41:24');
/*!40000 ALTER TABLE `favoritos` ENABLE KEYS */;

-- Volcando estructura para tabla ventas.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.migrations: ~17 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(18, '2014_04_23_203520_create_users_table', 1),
	(19, '2014_10_12_100000_create_password_resets_table', 1),
	(20, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
	(21, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
	(22, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
	(23, '2016_06_01_000004_create_oauth_clients_table', 1),
	(24, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
	(25, '2019_08_19_000000_create_failed_jobs_table', 1),
	(26, '2020_12_14_185834_create_categorias_table', 1),
	(27, '2020_12_14_185834_create_subcategorias_table', 1),
	(28, '2020_12_14_185850_create_articulos_table', 1),
	(29, '2020_12_14_185860_create_favoritos_table', 1),
	(30, '2020_12_14_192040_create_clientes_table', 1),
	(31, '2020_12_14_192041_create_ventas_table', 1),
	(32, '2021_04_29_185001_create_carritos_table', 1),
	(33, '2021_04_29_200110_create_pedidos_table', 1),
	(34, '2021_05_30_163948_create_carrito_detalles_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla ventas.oauth_access_tokens
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.oauth_access_tokens: ~13 rows (aproximadamente)
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
	('149e8201dd2a3ebc71cd05b92fa7697941fbd1110cd291239a409660d5cdf202a4e35c1b2586e808', 1, '950', 'personal', '[]', 0, '2021-12-10 04:04:07', '2021-12-10 04:04:07', '2022-12-10 04:04:07'),
	('3a714ddce4eb7a4e13af8949b8d721f1ea56d8d7034ed0283833094afc0fb8b6e7174d6d66c1d590', 1, '950', 'personal', '[]', 0, '2021-12-07 09:26:41', '2021-12-07 09:26:41', '2022-12-07 09:26:41'),
	('742f0a15071b1fa72ec294899388483b7d4af67f1a8641d9844bda983ce30d18bd7f4dd2867ebfa1', 1, '950', 'personal', '[]', 0, '2021-12-09 18:32:38', '2021-12-09 18:32:38', '2022-12-09 18:32:38'),
	('789d8dd826ae96977260c80e42f7790025120060c986598483219daa5c1134513c27c5c452f51345', 1, '950', 'personal', '[]', 0, '2021-12-07 09:52:50', '2021-12-07 09:52:50', '2022-12-07 09:52:50'),
	('80932a9e0656e61e269a9badd9b630ae04df28e4b7f758348a609894c2ab5cd88e1be3dbd2591097', 1, '950', 'personal', '[]', 0, '2021-12-07 09:49:28', '2021-12-07 09:49:28', '2022-12-07 09:49:28'),
	('8da74cab74f7cfb16291399c778199568adeb7e1062dc40bd358279324d08f2bb8e237062a07907a', 1, '950', 'personal', '[]', 0, '2021-12-07 09:47:10', '2021-12-07 09:47:10', '2022-12-07 09:47:10'),
	('a242f13937950540aaa03fe820af694820d9ffa2a0738165f5728b6935f7ea8cdefa58d691d5e4f4', 1, '950', 'personal', '[]', 0, '2021-12-10 02:32:20', '2021-12-10 02:32:20', '2022-12-10 02:32:20'),
	('afaff6890a8bedcfdd61ad70059f3f64bf4a5064b05648f5b63ecd80751f44ef7f2bdebd8b13db79', 1, '950', 'personal', '[]', 0, '2021-12-07 09:41:56', '2021-12-07 09:41:56', '2022-12-07 09:41:56'),
	('b68ae52b0895fc2d7205a950ffc7d45460f300caced220278273ff46e2f91a0f2d4d07658e308312', 1, '950', 'personal', '[]', 0, '2021-12-07 10:56:44', '2021-12-07 10:56:44', '2022-12-07 10:56:44'),
	('be8f9fc12514c1a72535f1257457b25eb4deee5c09d6c6b9f6ddea1c456a8ae8862c95dbc5a74c58', 1, '950', 'personal', '[]', 0, '2021-12-07 09:13:16', '2021-12-07 09:13:16', '2022-12-07 09:13:16'),
	('d5086a75446b6fd2f3add3aa6e7169ef76d030a80a2948d7e9841ef63a9e7891751d52d7b3e3b01a', 14, '950', 'personal', '[]', 0, '2021-12-10 04:29:25', '2021-12-10 04:29:25', '2022-12-10 04:29:25'),
	('d9aad330dfe3f7426c8ffe6114c74d7bac53144ec5f6d201a9075dab93dd359cd12194d185c77c4e', 1, '950', 'personal', '[]', 0, '2021-12-07 09:55:52', '2021-12-07 09:55:52', '2022-12-07 09:55:52'),
	('f19d366d9a0b420f05fa276788b2def777b62181949d419610faa80f6efe34cda1a786260829f237', 1, '950', 'personal', '[]', 0, '2021-12-07 09:30:20', '2021-12-07 09:30:20', '2022-12-07 09:30:20');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;

-- Volcando estructura para tabla ventas.oauth_auth_codes
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.oauth_auth_codes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;

-- Volcando estructura para tabla ventas.oauth_clients
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.oauth_clients: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
	('950ddc3b-f76d-4c96-b435-f9d543345dc4', NULL, 'Pro-Ventas Personal Access Client', 'Y02jq0ZrHDQdBljsjVd0w9pSKl3fmoE5wIadxQDd', NULL, 'http://localhost', 1, 0, 0, '2021-12-07 09:00:20', '2021-12-07 09:00:20'),
	('950ddc3b-fc66-44d0-aad6-17ab39e570fa', NULL, 'personal', 'EJC7TpEhxzh4UahFSdreInWI6FRbn1BdPIULKGwa', 'users', 'http://localhost', 0, 1, 0, '2021-12-07 09:00:20', '2021-12-07 09:00:20');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;

-- Volcando estructura para tabla ventas.oauth_personal_access_clients
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.oauth_personal_access_clients: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
	(1, '950ddc3b-f76d-4c96-b435-f9d543345dc4', '2021-12-07 09:00:20', '2021-12-07 09:00:20');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;

-- Volcando estructura para tabla ventas.oauth_refresh_tokens
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.oauth_refresh_tokens: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;

-- Volcando estructura para tabla ventas.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla ventas.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `carrito_id` bigint(20) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pedidos_users` (`user_id`),
  KEY `FK_pedidos_carritos` (`carrito_id`),
  CONSTRAINT `FK_pedidos_carritos` FOREIGN KEY (`carrito_id`) REFERENCES `carritos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_pedidos_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.pedidos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` (`id`, `estado`, `file`, `descripcion`, `user_id`, `carrito_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(17, 'true', '1_1639075651_cotizacion_ProVentas (7).pdf', 'Pruebasss', 1, 22, NULL, '2021-12-09 18:47:31', '2021-12-09 18:47:31');
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;

-- Volcando estructura para tabla ventas.subcategorias
CREATE TABLE IF NOT EXISTS `subcategorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci,
  `categoria_id` bigint(20) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subcategorias_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `subcategorias_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.subcategorias: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `subcategorias` DISABLE KEYS */;
INSERT INTO `subcategorias` (`id`, `nombre`, `descripcion`, `categoria_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(12, 'Refrescos de dieta', NULL, 13, NULL, '2021-09-17 08:18:09', '2021-09-17 08:18:09'),
	(13, 'Refrescos con azucar', NULL, 13, NULL, '2021-09-17 08:18:23', '2021-09-17 08:18:23'),
	(14, 'jugos de pulpa', NULL, 18, NULL, '2021-09-17 08:18:31', '2021-09-17 08:18:31'),
	(15, 'jugos sin pulpa', NULL, 18, NULL, '2021-09-17 08:18:41', '2021-09-17 08:18:41'),
	(16, 'Cerveza', NULL, 17, NULL, '2021-09-17 08:18:56', '2021-09-17 08:18:56'),
	(17, 'licores', NULL, 17, NULL, '2021-09-17 08:19:08', '2021-09-17 08:19:08'),
	(18, 'leche deslactosada', NULL, 19, NULL, '2021-09-17 11:33:34', '2021-09-17 11:33:34');
/*!40000 ALTER TABLE `subcategorias` ENABLE KEYS */;

-- Volcando estructura para tabla ventas.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rol` enum('admin','cliente','despacho') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.users: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `apellido`, `direccion`, `telefono`, `pais`, `ciudad`, `whatsapp`, `nit`, `imagen`, `rol`, `email_verified_at`, `password`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@gmail.com', 'Admin', NULL, NULL, 'Bolivia', NULL, NULL, NULL, 'images/default-person.jpg', 'admin', NULL, '$2y$10$cyfwUoP5zyX5vYBgl1U.duCfk/G0/SQWtM1xbRvx3z5o4tW4rP1gG', NULL, '2021-04-29 20:35:49', '2021-04-29 20:35:49'),
	(3, 'cliente', 'cliente@gmail.com', 'cliente', 'cliente', '98488', 'cliente', 'cliente', '498848', NULL, NULL, 'cliente', NULL, '$2y$10$wylYET4hD.DEvqPS.viiDu2Pqk6s.ap4qaDfYdgzY6tsneB4rDJR6', NULL, '2021-05-30 11:53:03', '2021-05-30 11:53:03'),
	(5, 'empresa', 'empresa@gmail.com', 'empresa', 'Av.America 1684', '77848757', 'Bolivia', 'Cochabamba', '7847574', NULL, NULL, 'cliente', NULL, '$2y$10$JRdERU/G8IlqyrcJJafJ2.Mi0nD.vxnDnESLoVbI74JJ2SzZ/VvoS', NULL, '2021-07-12 14:36:09', '2021-07-12 14:36:09');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Volcando estructura para tabla ventas.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_comprobante` enum('factura','recibo','nota') COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_comprobante` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_barras` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio_compra` double(8,2) NOT NULL,
  `precio_venta` double(8,2) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen_novedad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag_carrito` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL,
  `novedad` enum('true','false') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoria_nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `articulo_id` bigint(20) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ventas_articulo_id_foreign` (`articulo_id`),
  CONSTRAINT `ventas_articulo_id_foreign` FOREIGN KEY (`articulo_id`) REFERENCES `articulos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.ventas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
