-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2022 a las 03:05:46
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `coffekonecta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `cedula` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `cedula`, `first_name`, `last_name`, `phone`, `email`) VALUES
(1, 1143858861, 'Gustavo', 'Risueño', '3218603967', 'gustavoriu@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `creation_date` date NOT NULL DEFAULT current_timestamp(),
  `update_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `payment_method`
--

INSERT INTO `payment_method` (`id`, `name`, `creation_date`, `update_date`) VALUES
(1, 'Credito/Debito', '2022-06-12', '2022-06-12'),
(2, 'Efectivo', '2022-06-12', '2022-06-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(4) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `reference` varchar(10) NOT NULL,
  `price` int(11) NOT NULL,
  `wegith` int(11) NOT NULL,
  `category` int(2) NOT NULL,
  `stock` int(11) NOT NULL,
  `creation_date` date NOT NULL DEFAULT current_timestamp(),
  `update_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `product_name`, `reference`, `price`, `wegith`, `category`, `stock`, `creation_date`, `update_date`) VALUES
(38, 'Pastel de pollo', 'REF34546', 3000, 150, 4, 332, '2022-06-12', '2022-06-12'),
(40, 'Huevos perico', 'REF12945', 7000, 250, 1, 781, '2022-06-12', '2022-06-12'),
(41, 'Café en leche', 'REF96700', 2500, 150, 3, 685, '2022-06-12', '2022-06-12'),
(42, 'Pandebono', 'REFpaan565', 2000, 1, 4, 0, '2022-06-12', '2022-06-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_category`
--

CREATE TABLE `product_category` (
  `id` int(2) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `creation_date` date NOT NULL DEFAULT current_timestamp(),
  `update_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `product_category`
--

INSERT INTO `product_category` (`id`, `category_name`, `creation_date`, `update_date`) VALUES
(1, 'Desayunos', '2022-06-10', '2022-06-10'),
(2, 'Almuerzos', '2022-06-10', '2022-06-10'),
(3, 'Bebidas', '2022-06-10', '2022-06-10'),
(4, 'Panadería', '2022-06-10', '2022-06-10'),
(5, 'Acompañantes', '2022-06-10', '2022-06-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale_order`
--

CREATE TABLE `sale_order` (
  `id` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_method` int(2) NOT NULL,
  `user` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale_order_product`
--

CREATE TABLE `sale_order_product` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(4) NOT NULL,
  `quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `cedula` int(10) NOT NULL,
  `first_name` varchar(180) NOT NULL,
  `last_name` varchar(180) NOT NULL,
  `user` varchar(25) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `creation_date` date NOT NULL DEFAULT current_timestamp(),
  `update_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `cedula`, `first_name`, `last_name`, `user`, `pass`, `creation_date`, `update_date`) VALUES
(1, 1143858861, 'Gustavo', 'Risueño', 'grisueno', '1234', '2022-06-11', '2022-06-11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category` (`category`);

--
-- Indices de la tabla `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sale_order`
--
ALTER TABLE `sale_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sale_order_client` (`client`),
  ADD KEY `fk_sale_order_products` (`payment_method`),
  ADD KEY `fk_sale_order_user` (`user`);

--
-- Indices de la tabla `sale_order_product`
--
ALTER TABLE `sale_order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sale_order_product_sale_order` (`order_id`),
  ADD KEY `fk_sale_order_products_products` (`product_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sale_order`
--
ALTER TABLE `sale_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `sale_order_product`
--
ALTER TABLE `sale_order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`category`) REFERENCES `product_category` (`id`);

--
-- Filtros para la tabla `sale_order`
--
ALTER TABLE `sale_order`
  ADD CONSTRAINT `fk_sale_order_client` FOREIGN KEY (`client`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `fk_sale_order_products` FOREIGN KEY (`payment_method`) REFERENCES `payment_method` (`id`),
  ADD CONSTRAINT `fk_sale_order_user` FOREIGN KEY (`user`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `sale_order_product`
--
ALTER TABLE `sale_order_product`
  ADD CONSTRAINT `fk_sale_order_product_sale_order` FOREIGN KEY (`order_id`) REFERENCES `sale_order` (`id`),
  ADD CONSTRAINT `fk_sale_order_products_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
