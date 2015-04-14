-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2015 at 07:45 am
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lady-luck`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `contactType` enum('phone','post','email') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `description`, `contactType`, `created_at`, `updated_at`) VALUES
(1, '0278139613 - Sean', 'phone', '2015-04-14 04:30:33', '2015-04-13 16:30:33'),
(3, '188 Hutt Road, Kaiwharwhara', 'post', '2015-04-10 06:24:57', '2015-04-09 18:24:57'),
(4, '38 Caledonia Street, Miramar', 'post', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'ladyluckcaravan@gmail.com', 'email', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '0274775344 - Gemma', 'phone', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `img` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `lat` double(11,8) NOT NULL,
  `lng` double(11,8) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `description`, `img`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
(1, 'Lady Luck Caravan, Kaiwharawhara', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Screen Shot 2015-03-06 at 4.44.41 pm.png', -41.25645900, 174.79512300, '0000-00-00 00:00:00', '2015-04-13 16:24:34'),
(3, 'Lady Luck Miramar', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Screen Shot 2015-03-27 at 6.12.54 pm.png', -41.32149640, 174.81285870, '0000-00-00 00:00:00', '2015-04-13 16:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `merches`
--

CREATE TABLE IF NOT EXISTS `merches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `img` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` double(4,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `merches`
--

INSERT INTO `merches` (`id`, `name`, `description`, `img`, `price`, `created_at`, `updated_at`) VALUES
(2, 'Lady Luck Pants', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Screen Shot 2015-03-27 at 6.12.54 pm.png', 30.00, '0000-00-00 00:00:00', '2015-04-13 16:23:54'),
(3, 'Lady Luck T-shirt', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Screen Shot 2015-03-27 at 6.12.54 pm.png', 20.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'lady luck cup', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Screen Shot 2015-03-27 at 6.12.54 pm.png', 20.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_03_27_041940_CreateProductsTable', 1),
('2015_04_02_041853_CreateOrdersTable', 1),
('2015_04_08_035658_createOrderedProductsTable', 1),
('2015_04_08_043051_createMerchTable', 1),
('2015_04_08_051227_createLocationsTable', 1),
('2015_04_09_034319_create_contacts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ordered_products`
--

CREATE TABLE IF NOT EXISTS `ordered_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `productID` smallint(6) NOT NULL,
  `quantity` smallint(6) NOT NULL,
  `price` double(4,2) NOT NULL,
  `orderID` mediumint(9) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ordered_products`
--

INSERT INTO `ordered_products` (`id`, `productID`, `quantity`, `price`, `orderID`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 3.50, 1, '2015-04-13 16:54:08', '2015-04-13 16:54:08'),
(2, 4, 2, 5.50, 1, '2015-04-13 16:54:08', '2015-04-13 16:54:08'),
(3, 5, 2, 3.50, 1, '2015-04-13 16:54:08', '2015-04-13 16:54:08'),
(4, 3, 3, 3.50, 2, '2015-04-13 17:14:06', '2015-04-13 17:14:06'),
(5, 9, 2, 5.50, 2, '2015-04-13 17:14:06', '2015-04-13 17:14:06'),
(6, 3, 3, 3.50, 3, '2015-04-13 17:18:50', '2015-04-13 17:18:50'),
(7, 8, 5, 6.00, 3, '2015-04-13 17:18:50', '2015-04-13 17:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerName` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `customerAddress` text COLLATE utf8_unicode_ci NOT NULL,
  `customerEmail` text COLLATE utf8_unicode_ci NOT NULL,
  `delivery` enum('deliver','pickup') COLLATE utf8_unicode_ci NOT NULL,
  `deliveryDate` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('paid','intransit','complete') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customerName`, `customerAddress`, `customerEmail`, `delivery`, `deliveryDate`, `status`, `created_at`, `updated_at`) VALUES
(3, 'jake', '27 pretend ave rangiora new zealand', 'ex@mp.le', 'deliver', '2015-04-14', 'paid', '2015-04-13 17:18:50', '2015-04-13 17:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `img` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` double(4,2) NOT NULL,
  `type` enum('hot','cold','drink') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `img`, `price`, `type`, `created_at`, `updated_at`) VALUES
(3, 'slice', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'mushroom-pie.jpg', 3.50, 'cold', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'pies', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Screen Shot 2015-03-18 at 5.39.36 pm.png', 5.50, 'hot', '0000-00-00 00:00:00', '2015-04-13 16:22:36'),
(5, 'sausage roll', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'mushroom-pie.jpg', 3.50, 'hot', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'jakesitem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Screen Shot 2015-03-27 at 6.12.54 pm.png', 6.00, 'cold', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Steak Pie', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Screen Shot 2015-03-27 at 6.12.54 pm.png', 5.50, 'hot', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ladyluckadmin', '-', '$2y$10$sRwQXUTkrA8YJKfSB7mjPe6imISnPc35ivGc8UBG2oBUExLcvFIxm', 'rbMCVpH95nDXbnQnZsuyzGUgbRj5GwZGSn4yOOrcmUacJnWyfOIeTjzAFfoj', '0000-00-00 00:00:00', '2015-04-13 17:29:03');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
