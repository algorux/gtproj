-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2020 a las 22:05:24
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gtproj`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories_laguages`
--

CREATE TABLE `categories_laguages` (
  `id` int(11) NOT NULL,
  `cat_categories_id` int(11) NOT NULL,
  `cat_languages_id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_categories`
--

CREATE TABLE `cat_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cat_categories`
--

INSERT INTO `cat_categories` (`id`, `name`) VALUES
(1, 'giantess'),
(2, 'heels');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_languages`
--

CREATE TABLE `cat_languages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `signature` varchar(3) NOT NULL DEFAULT 'en'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `collection`
--

CREATE TABLE `collection` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `private` tinyint(4) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `image_url` varchar(250) DEFAULT NULL,
  `user_id` int(12) UNSIGNED NOT NULL,
  `media_id` int(11) DEFAULT NULL,
  `collection_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `user_id` int(12) UNSIGNED NOT NULL,
  `private` tinyint(4) NOT NULL DEFAULT 0,
  `url` varchar(500) NOT NULL,
  `mediatype` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `media`
--

INSERT INTO `media` (`id`, `user_id`, `private`, `url`, `mediatype`, `description`, `created_at`) VALUES
(21, 1, 0, '/gtproj/assets/uploads/media/1587974673_b1bda10d712afd85e3d6.jpg', 'image/jpeg', NULL, '2020-04-27 03:04:33'),
(22, 1, 0, '/gtproj/assets/uploads/media/1587974673_319273d96f2f1e8dfbc9.jpeg', 'image/jpeg', NULL, '2020-04-27 03:04:33'),
(23, 1, 0, '/gtproj/assets/uploads/media/1587974673_975aaa81c38a0833eecc.jpg', 'image/jpeg', NULL, '2020-04-27 03:04:33'),
(24, 1, 0, '/gtproj/assets/uploads/media/1587974673_2d2c6e80d8bb6cfc4713.jpeg', 'image/jpeg', NULL, '2020-04-27 03:04:33'),
(25, 1, 0, '/gtproj/assets/uploads/media/1587974756_0efe30e2f9f145ce1d3d.jpg', 'image/jpeg', NULL, '2020-04-27 03:05:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media_category`
--

CREATE TABLE `media_category` (
  `id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `cat_categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media_collection`
--

CREATE TABLE `media_collection` (
  `id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `collection_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id_from` int(12) UNSIGNED NOT NULL,
  `user_id_to` int(12) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responses`
--

CREATE TABLE `responses` (
  `id` int(11) NOT NULL,
  `comments_id` int(11) NOT NULL,
  `response` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(12) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `created_at`, `name`, `lastname`, `gender`, `birthday`) VALUES
(1, 'creator', 'creator@validemail.com', '$2y$10$b4tUyesLiK/rJzlZGkcEm.IRkKC07jNFVpd.25/HtYXZa1rMfXrye', '2020-04-24 20:57:13', 'Mr x', 'XX', 'm', '1990-04-01 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_categories`
--

CREATE TABLE `user_categories` (
  `id` int(11) NOT NULL,
  `user_id` int(12) UNSIGNED NOT NULL,
  `cat_categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories_laguages`
--
ALTER TABLE `categories_laguages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categories_laguages_cat_categories1_idx` (`cat_categories_id`),
  ADD KEY `fk_categories_laguages_cat_languages1_idx` (`cat_languages_id`);

--
-- Indices de la tabla `cat_categories`
--
ALTER TABLE `cat_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cat_languages`
--
ALTER TABLE `cat_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_user1_idx` (`user_id`),
  ADD KEY `fk_comments_media1_idx` (`media_id`),
  ADD KEY `fk_comments_collection1_idx` (`collection_id`);

--
-- Indices de la tabla `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_media_user_idx` (`user_id`);

--
-- Indices de la tabla `media_category`
--
ALTER TABLE `media_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_media_category_media1_idx` (`media_id`),
  ADD KEY `fk_media_category_cat_categories1_idx` (`cat_categories_id`);

--
-- Indices de la tabla `media_collection`
--
ALTER TABLE `media_collection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_media_collection_media1_idx` (`media_id`),
  ADD KEY `fk_media_collection_collection1_idx` (`collection_id`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_messages_user1_idx` (`user_id_from`),
  ADD KEY `fk_messages_user2_idx` (`user_id_to`);

--
-- Indices de la tabla `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_responses_comments1_idx` (`comments_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_categories`
--
ALTER TABLE `user_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_categories_user1_idx` (`user_id`),
  ADD KEY `fk_user_categories_cat_categories1_idx` (`cat_categories_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories_laguages`
--
ALTER TABLE `categories_laguages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cat_categories`
--
ALTER TABLE `cat_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cat_languages`
--
ALTER TABLE `cat_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `collection`
--
ALTER TABLE `collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `media_category`
--
ALTER TABLE `media_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `media_collection`
--
ALTER TABLE `media_collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `user_id_from` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `responses`
--
ALTER TABLE `responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user_categories`
--
ALTER TABLE `user_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categories_laguages`
--
ALTER TABLE `categories_laguages`
  ADD CONSTRAINT `fk_categories_laguages_cat_categories1` FOREIGN KEY (`cat_categories_id`) REFERENCES `cat_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_categories_laguages_cat_languages1` FOREIGN KEY (`cat_languages_id`) REFERENCES `cat_languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_collection1` FOREIGN KEY (`collection_id`) REFERENCES `collection` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comments_media1` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comments_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `fk_media_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `media_category`
--
ALTER TABLE `media_category`
  ADD CONSTRAINT `fk_media_category_cat_categories1` FOREIGN KEY (`cat_categories_id`) REFERENCES `cat_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_media_category_media1` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `media_collection`
--
ALTER TABLE `media_collection`
  ADD CONSTRAINT `fk_media_collection_collection1` FOREIGN KEY (`collection_id`) REFERENCES `collection` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_media_collection_media1` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_messages_user1` FOREIGN KEY (`user_id_from`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_messages_user2` FOREIGN KEY (`user_id_to`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `responses`
--
ALTER TABLE `responses`
  ADD CONSTRAINT `fk_responses_comments1` FOREIGN KEY (`comments_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user_categories`
--
ALTER TABLE `user_categories`
  ADD CONSTRAINT `fk_user_categories_cat_categories1` FOREIGN KEY (`cat_categories_id`) REFERENCES `cat_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_categories_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
