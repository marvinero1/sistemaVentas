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
  `imagen_novedad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen_promocion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag_carrito` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL,
  `promocion` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.articulos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `articulos` DISABLE KEYS */;
/*!40000 ALTER TABLE `articulos` ENABLE KEYS */;

-- Volcando estructura para tabla ventas.carritos
CREATE TABLE IF NOT EXISTS `carritos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_id` bigint(20) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_carritos_users` (`user_id`),
  CONSTRAINT `FK_carritos_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.carritos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `carritos` DISABLE KEYS */;
/*!40000 ALTER TABLE `carritos` ENABLE KEYS */;

-- Volcando estructura para tabla ventas.carrito_detalles
CREATE TABLE IF NOT EXISTS `carrito_detalles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_comprobante` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad_pedido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_barras` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio_venta` double(8,2) NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen_novedad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carro_id` bigint(20) unsigned NOT NULL,
  `categoria_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carrito_detalles_carro_id_foreign` (`carro_id`),
  CONSTRAINT `carrito_detalles_carro_id_foreign` FOREIGN KEY (`carro_id`) REFERENCES `carritos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.carrito_detalles: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `carrito_detalles` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrito_detalles` ENABLE KEYS */;

-- Volcando estructura para tabla ventas.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.categorias: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `user`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(3, 'Placas Madres', 'Placas Madre para computadoras y laptops', 'marvin fernandez', NULL, '2021-04-30 00:37:40', '2021-04-30 00:37:40'),
	(4, 'Placas Madres', 'Placas Madre para computadoras y laptops', 'marvin fernandez', NULL, '2021-04-30 00:37:40', '2021-04-30 00:37:40'),
	(5, 'Placas Madres', 'Placas Madre para computadoras y laptops', 'marvin fernandez', NULL, '2021-04-30 00:37:40', '2021-04-30 00:37:40'),
	(6, 'Placas Madres', 'Placas Madre para computadoras y laptops', 'marvin fernandez', NULL, '2021-04-30 00:37:40', '2021-04-30 00:37:40'),
	(7, 'Placas Madres', 'Placas Madre para computadoras y laptops', 'marvin fernandez', NULL, '2021-04-30 00:37:40', '2021-04-30 00:37:40'),
	(8, 'Placas Madres', 'Placas Madre para computadoras y laptops', 'marvin fernandez', NULL, '2021-04-30 00:37:40', '2021-04-30 00:37:40');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.favoritos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `favoritos` DISABLE KEYS */;
/*!40000 ALTER TABLE `favoritos` ENABLE KEYS */;

-- Volcando estructura para tabla ventas.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.migrations: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_04_23_203520_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2020_12_14_185834_create_categorias_table', 1),
	(5, '2020_12_14_185834_create_subcategorias_table', 1),
	(6, '2020_12_14_185850_create_articulos_table', 1),
	(7, '2020_12_14_185860_create_favoritos_table', 1),
	(8, '2020_12_14_192040_create_clientes_table', 1),
	(9, '2020_12_14_192041_create_ventas_table', 1),
	(10, '2021_04_29_185001_create_carritos_table', 1),
	(11, '2021_04_29_200110_create_pedidos_table', 1),
	(12, '2021_05_30_163948_create_carrito_detalles_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.pedidos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;

-- Volcando estructura para tabla ventas.subcategorias
CREATE TABLE IF NOT EXISTS `subcategorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoria_id` bigint(20) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subcategorias_categorias_id_foreign` (`categoria_id`),
  CONSTRAINT `subcategorias_categorias_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.subcategorias: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `subcategorias` DISABLE KEYS */;
INSERT INTO `subcategorias` (`id`, `nombre`, `descripcion`, `categoria_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(3, 'Placas Madres TUF GAMING Z490-PLUS DDR5', 'asdasd', 3, NULL, '2021-07-19 16:50:05', '2021-07-19 16:50:05'),
	(4, 'Placas Madres TUF GAMING Z490-PLUS DDR5', 'asdasd', 3, NULL, '2021-07-19 16:50:05', '2021-07-19 16:50:05'),
	(5, 'Placas Madres TUF GAMING Z490-PLUS DDR5', 'asdasd', 3, NULL, '2021-07-19 16:50:05', '2021-07-19 16:50:05');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.users: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `apellido`, `direccion`, `telefono`, `pais`, `ciudad`, `whatsapp`, `nit`, `imagen`, `rol`, `email_verified_at`, `password`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@gmail.com', NULL, NULL, NULL, 'Bolivia', NULL, NULL, NULL, 'images/default-person.jpg', 'admin', NULL, '$2y$10$cyfwUoP5zyX5vYBgl1U.duCfk/G0/SQWtM1xbRvx3z5o4tW4rP1gG', NULL, '2021-04-30 00:35:49', '2021-04-30 00:35:49'),
	(3, 'cliente', 'cliente@gmail.com', 'cliente', 'cliente', '98488', 'cliente', 'cliente', '498848', NULL, NULL, 'cliente', NULL, '$2y$10$wylYET4hD.DEvqPS.viiDu2Pqk6s.ap4qaDfYdgzY6tsneB4rDJR6', NULL, '2021-05-30 15:53:03', '2021-05-30 15:53:03'),
	(5, 'empresa', 'empresa@gmail.com', 'empresa', 'Av.America 1684', '77848757', 'Bolivia', 'Cochabamba', '7847574', NULL, NULL, 'cliente', NULL, '$2y$10$JRdERU/G8IlqyrcJJafJ2.Mi0nD.vxnDnESLoVbI74JJ2SzZ/VvoS', NULL, '2021-07-12 18:36:09', '2021-07-12 18:36:09'),
	(7, 'despacho', 'despacho@gmail.com', 'despacho', 'Av.America 1684', '76964607', 'Bolivia', 'Cochabamba', '434', NULL, NULL, 'despacho', NULL, '$2y$10$8.0Demdko4U9W6JRuyw9p.Kqcy1mX99ovlxB2FGhkyXcSIJKk.F/G', NULL, '2021-07-19 17:22:13', '2021-07-19 17:22:13');
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
