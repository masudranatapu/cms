-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2023 at 06:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'backend/image/default-user.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Supper Admin', 'arobil@gmail.com', '2022-07-25 05:09:47', '$2y$10$/iBkG/TQacrA2KOj9l7XoeE85CQm6oKVCswEzsb13Mj7k2hELCcBe', 'backend/image/default-user.png', 'wArU8bg7sIvacA4XN3oHVijlS7yXn2Jy6Aew70dhQ1pcTUFYqGXkF7oOWDWe', '2022-07-25 05:09:47', '2022-11-17 19:10:59'),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$/iBkG/TQacrA2KOj9l7XoeE85CQm6oKVCswEzsb13Mj7k2hELCcBe', 'backend/image/default-user.png', NULL, '2022-08-22 05:56:33', '2022-08-22 05:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(3) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `details` text NOT NULL,
  `tags` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_number` int(11) NOT NULL DEFAULT 0,
  `status` int(3) NOT NULL DEFAULT 0 COMMENT '0 = inactive,\r\n1 = Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(10) UNSIGNED NOT NULL,
  `config_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `config_key`, `config_value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'MTPro.me', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(2, 'currency', 'USD', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(3, 'timezone', 'America/New_York', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(4, 'paypal_mode', 'sandbox', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(5, 'paypal_client_id', 'Aa8_7OJaxmCZQpkx3hbzdySDz7haM0Wu6c6MmzX5JQsaywY1i8HMJo2ddnr9-pEEoRP3qvjflrxOVoXL', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(6, 'paypal_secret', 'ELMx8Z_ddA0Z597lD-dDPssM4VxBbnWvvoxb1mjuIiMCHLRSzbSN6owESivW4moqRPPYOTyl1J9QxSx0', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(7, 'razorpay_key', 'YOUR_RAZORPAY_KEY', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(8, 'razorpay_secret', 'YOUR_RAZORPAY_SECRET', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(9, 'term', 'monthly', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(10, 'stripe_publishable_key', 'pk_test_51M9pqYBIRmXVjgUGW3b1i91X0uTNeU6umRaoD9UprcFLotiHpfdBwgr4MnkbZoPuKKPFmdWJFVzWTwvUgxBrcl1d00OcqJU0Ta', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(11, 'stripe_secret', 'sk_test_51M9pqYBIRmXVjgUG4VjKaH21Jm0s6KvLTcIZ6fgTqpvfIbfuVocHbjn4vOeVHX6yrJekPPw4xfphkU4EN7ItAqr500Q3kUMHc8', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(12, 'app_theme', 'blue', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(13, 'primary_image', '/frontend/assets/elements/home.gif', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(14, 'secondary_image', '/frontend/assets/elements/home.svg', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(15, 'tax_type', 'exclusive', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(16, 'invoice_prefix', 'INV-', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(17, 'invoice_name', 'mtgpro', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(18, 'invoice_email', 'sales@mtgpro.me', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(19, 'invoice_phone', '+88 01767671133', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(20, 'invoice_address', '123, lorem ipsum', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(21, 'invoice_city', 'dhaka', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(22, 'invoice_state', 'dhaka', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(23, 'invoice_zipcode', '1212', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(24, 'invoice_country', 'Bangaldesh', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(25, 'tax_name', 'Goods and Service Tax', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(26, 'tax_value', '0', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(27, 'tax_number', '0', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(28, 'email_heading', 'Thanks for using mtgpro.me. This is an invoice for your recent purchase.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(29, 'email_footer', 'If you’re having trouble with the button above, please login into your web browser.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(30, 'invoice_footer', 'Thank you very much for doing business with us. We look forward to working with you again!', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(31, 'share_content', 'Welcome to { business_name }, Here is my digital Digital Business Card, { business_url } \r\nPowered by: { appName }', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(32, 'bank_transfer', 'Bank: FARM CREDIT BANK DN P&I\r\nBank Account Number: 18539734757                     \r\nRouting Number: 21054734\r\nIBAN: IN94769888520201207044719366\r\n\r\nBank: FARM CREDIT BANK DN P&I\r\nBank Account Number: 18539734757                     \r\nRouting Number: 21054734\r\nIBAN: IN94769888520201207044719366', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(33, 'stripe_endpoint_secret', 'whsec_akol6QZWkkwjhIsX5crV0PwYNGyLnRcx', '2022-06-28 16:41:12', '2022-06-28 16:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL DEFAULT 0,
  `reason` varchar(255) NOT NULL DEFAULT '0',
  `message` text NOT NULL DEFAULT 0,
  `status` int(3) NOT NULL DEFAULT 0 COMMENT '0 = inactive,\r\n1 = Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `priority` int(11) NOT NULL,
  `iso_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subunit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subunit_to_unit` int(11) NOT NULL,
  `symbol_first` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `html_entity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decimal_mark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thousands_separator` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_numeric` int(11) NOT NULL,
  `is_default` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `priority`, `iso_code`, `name`, `symbol`, `subunit`, `subunit_to_unit`, `symbol_first`, `html_entity`, `decimal_mark`, `thousands_separator`, `iso_numeric`, `is_default`) VALUES
(1, 100, 'AED', 'United Arab Emirates Dirham', 'د.إ', 'Fils', 100, 'true', '', '.', ',', 784, 0),
(2, 100, 'AFN', 'Afghan Afghani', '؋', 'Pul', 100, 'false', '', '.', ',', 971, 0),
(3, 100, 'ALL', 'Albanian Lek', 'L', 'Qintar', 100, 'false', '', '.', ',', 8, 0),
(4, 100, 'AMD', 'Armenian Dram', 'դր.', 'Luma', 100, 'false', '', '.', ',', 51, 0),
(5, 100, 'ANG', 'Netherlands Antillean Gulden', 'ƒ', 'Cent', 100, 'true', '&#x0192;', ',', '.', 532, 0),
(6, 100, 'AOA', 'Angolan Kwanza', 'Kz', 'Cêntimo', 100, 'false', '', '.', ',', 973, 0),
(7, 100, 'ARS', 'Argentine Peso', '$', 'Centavo', 100, 'true', '&#x20B1;', ',', '.', 32, 0),
(8, 4, 'AUD', 'Australian Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 36, 0),
(9, 100, 'AWG', 'Aruban Florin', 'ƒ', 'Cent', 100, 'false', '&#x0192;', '.', ',', 533, 0),
(10, 100, 'AZN', 'Azerbaijani Manat', 'null', 'Qəpik', 100, 'true', '', '.', ',', 944, 0),
(11, 100, 'BAM', 'Bosnia and Herzegovina Convertible Mark', 'КМ', 'Fening', 100, 'true', '', '.', ',', 977, 0),
(12, 100, 'BBD', 'Barbadian Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 52, 0),
(13, 100, 'BDT', 'Bangladeshi Taka', '৳', 'Paisa', 100, 'true', '', '.', ',', 50, 0),
(14, 100, 'BGN', 'Bulgarian Lev', 'лв', 'Stotinka', 100, 'false', '', '.', ',', 975, 0),
(15, 100, 'BHD', 'Bahraini Dinar', 'ب.د', 'Fils', 1000, 'true', '', '.', ',', 48, 0),
(16, 100, 'BIF', 'Burundian Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 108, 0),
(17, 100, 'BMD', 'Bermudian Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 60, 0),
(18, 100, 'BND', 'Brunei Dollar', '$', 'Sen', 100, 'true', '$', '.', ',', 96, 0),
(19, 100, 'BOB', 'Bolivian Boliviano', 'Bs.', 'Centavo', 100, 'true', '', '.', ',', 68, 0),
(20, 100, 'BRL', 'Brazilian Real', 'R$', 'Centavo', 100, 'true', 'R$', ',', '.', 986, 0),
(21, 100, 'BSD', 'Bahamian Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 44, 0),
(22, 100, 'BTN', 'Bhutanese Ngultrum', 'Nu.', 'Chertrum', 100, 'false', '', '.', ',', 64, 0),
(23, 100, 'BWP', 'Botswana Pula', 'P', 'Thebe', 100, 'true', '', '.', ',', 72, 0),
(24, 100, 'BYR', 'Belarusian Ruble', 'Br', 'Kapyeyka', 100, 'false', '', '.', ',', 974, 0),
(25, 100, 'BZD', 'Belize Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 84, 0),
(26, 5, 'CAD', 'Canadian Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 124, 0),
(27, 100, 'CDF', 'Congolese Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 976, 0),
(28, 100, 'CHF', 'Swiss Franc', 'Fr', 'Rappen', 100, 'true', '', '.', ',', 756, 0),
(29, 100, 'CLF', 'Unidad de Fomento', 'UF', 'Peso', 1, 'true', '&#x20B1;', ',', '.', 990, 0),
(30, 100, 'CLP', 'Chilean Peso', '$', 'Peso', 1, 'true', '&#36;', ',', '.', 152, 0),
(31, 100, 'CNY', 'Chinese Renminbi Yuan', '¥', 'Fen', 100, 'true', '&#20803;', '.', ',', 156, 0),
(32, 100, 'COP', 'Colombian Peso', '$', 'Centavo', 100, 'true', '&#x20B1;', ',', '.', 170, 0),
(33, 100, 'CRC', 'Costa Rican Colón', '₡', 'Céntimo', 100, 'true', '&#x20A1;', ',', '.', 188, 0),
(34, 100, 'CUC', 'Cuban Convertible Peso', '$', 'Centavo', 100, 'false', '', '.', ',', 931, 0),
(35, 100, 'CUP', 'Cuban Peso', '$', 'Centavo', 100, 'true', '&#x20B1;', '.', ',', 192, 0),
(36, 100, 'CVE', 'Cape Verdean Escudo', '$', 'Centavo', 100, 'false', '', '.', ',', 132, 0),
(37, 100, 'CZK', 'Czech Koruna', 'Kč', 'Haléř', 100, 'true', '', ',', '.', 203, 0),
(38, 100, 'DJF', 'Djiboutian Franc', 'Fdj', 'Centime', 100, 'false', '', '.', ',', 262, 0),
(39, 100, 'DKK', 'Danish Krone', 'kr', 'Øre', 100, 'false', '', ',', '.', 208, 0),
(40, 100, 'DOP', 'Dominican Peso', '$', 'Centavo', 100, 'true', '&#x20B1;', '.', ',', 214, 0),
(41, 100, 'DZD', 'Algerian Dinar', 'د.ج', 'Centime', 100, 'false', '', '.', ',', 12, 0),
(42, 100, 'EGP', 'Egyptian Pound', 'ج.م', 'Piastre', 100, 'true', '&#x00A3;', '.', ',', 818, 0),
(43, 100, 'ERN', 'Eritrean Nakfa', 'Nfk', 'Cent', 100, 'false', '', '.', ',', 232, 0),
(44, 100, 'ETB', 'Ethiopian Birr', 'Br', 'Santim', 100, 'false', '', '.', ',', 230, 0),
(45, 2, 'EUR', 'Euro', '€', 'Cent', 100, 'true', '&#x20AC;', ',', '.', 978, 0),
(46, 100, 'FJD', 'Fijian Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 242, 0),
(47, 100, 'FKP', 'Falkland Pound', '£', 'Penny', 100, 'false', '&#x00A3;', '.', ',', 238, 0),
(48, 3, 'GBP', 'British Pound', '£', 'Penny', 100, 'true', '&#x00A3;', '.', ',', 826, 0),
(49, 100, 'GEL', 'Georgian Lari', 'ლ', 'Tetri', 100, 'false', '', '.', ',', 981, 0),
(50, 100, 'GHS', 'Ghanaian Cedi', '₵', 'Pesewa', 100, 'true', '&#x20B5;', '.', ',', 936, 0),
(51, 100, 'GIP', 'Gibraltar Pound', '£', 'Penny', 100, 'true', '&#x00A3;', '.', ',', 292, 0),
(52, 100, 'GMD', 'Gambian Dalasi', 'D', 'Butut', 100, 'false', '', '.', ',', 270, 0),
(53, 100, 'GNF', 'Guinean Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 324, 0),
(54, 100, 'GTQ', 'Guatemalan Quetzal', 'Q', 'Centavo', 100, 'true', '', '.', ',', 320, 0),
(55, 100, 'GYD', 'Guyanese Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 328, 0),
(56, 100, 'HKD', 'Hong Kong Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 344, 0),
(57, 100, 'HNL', 'Honduran Lempira', 'L', 'Centavo', 100, 'true', '', '.', ',', 340, 0),
(58, 100, 'HRK', 'Croatian Kuna', 'kn', 'Lipa', 100, 'true', '', ',', '.', 191, 0),
(59, 100, 'HTG', 'Haitian Gourde', 'G', 'Centime', 100, 'false', '', '.', ',', 332, 0),
(60, 100, 'HUF', 'Hungarian Forint', 'Ft', 'Fillér', 100, 'false', '', ',', '.', 348, 0),
(61, 100, 'IDR', 'Indonesian Rupiah', 'Rp', 'Sen', 100, 'true', '', ',', '.', 360, 0),
(62, 100, 'ILS', 'Israeli New Sheqel', '₪', 'Agora', 100, 'true', '&#x20AA;', '.', ',', 376, 0),
(63, 100, 'INR', 'Indian Rupee', '₹', 'Paisa', 100, 'true', '&#x20b9;', '.', ',', 356, 0),
(64, 100, 'IQD', 'Iraqi Dinar', 'ع.د', 'Fils', 1000, 'false', '', '.', ',', 368, 0),
(65, 100, 'IRR', 'Iranian Rial', '﷼', 'Dinar', 100, 'true', '&#xFDFC;', '.', ',', 364, 0),
(66, 100, 'ISK', 'Icelandic Króna', 'kr', 'Eyrir', 100, 'true', '', ',', '.', 352, 0),
(67, 100, 'JMD', 'Jamaican Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 388, 0),
(68, 100, 'JOD', 'Jordanian Dinar', 'د.ا', 'Piastre', 100, 'true', '', '.', ',', 400, 0),
(69, 6, 'JPY', 'Japanese Yen', '¥', 'null', 1, 'true', '&#x00A5;', '.', ',', 392, 0),
(70, 100, 'KES', 'Kenyan Shilling', 'KSh', 'Cent', 100, 'true', '', '.', ',', 404, 0),
(71, 100, 'KGS', 'Kyrgyzstani Som', 'som', 'Tyiyn', 100, 'false', '', '.', ',', 417, 0),
(72, 100, 'KHR', 'Cambodian Riel', '៛', 'Sen', 100, 'false', '&#x17DB;', '.', ',', 116, 0),
(73, 100, 'KMF', 'Comorian Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 174, 0),
(74, 100, 'KPW', 'North Korean Won', '₩', 'Chŏn', 100, 'false', '&#x20A9;', '.', ',', 408, 0),
(75, 100, 'KRW', 'South Korean Won', '₩', 'null', 1, 'true', '&#x20A9;', '.', ',', 410, 0),
(76, 100, 'KWD', 'Kuwaiti Dinar', 'د.ك', 'Fils', 1000, 'true', '', '.', ',', 414, 0),
(77, 100, 'KYD', 'Cayman Islands Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 136, 0),
(78, 100, 'KZT', 'Kazakhstani Tenge', '〒', 'Tiyn', 100, 'false', '', '.', ',', 398, 0),
(79, 100, 'LAK', 'Lao Kip', '₭', 'Att', 100, 'false', '&#x20AD;', '.', ',', 418, 0),
(80, 100, 'LBP', 'Lebanese Pound', 'ل.ل', 'Piastre', 100, 'true', '&#x00A3;', '.', ',', 422, 0),
(81, 100, 'LKR', 'Sri Lankan Rupee', '₨', 'Cent', 100, 'false', '&#x0BF9;', '.', ',', 144, 0),
(82, 100, 'LRD', 'Liberian Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 430, 0),
(83, 100, 'LSL', 'Lesotho Loti', 'L', 'Sente', 100, 'false', '', '.', ',', 426, 0),
(84, 100, 'LTL', 'Lithuanian Litas', 'Lt', 'Centas', 100, 'false', '', '.', ',', 440, 0),
(85, 100, 'LVL', 'Latvian Lats', 'Ls', 'Santīms', 100, 'true', '', '.', ',', 428, 0),
(86, 100, 'LYD', 'Libyan Dinar', 'ل.د', 'Dirham', 1000, 'false', '', '.', ',', 434, 0),
(87, 100, 'MAD', 'Moroccan Dirham', 'د.م.', 'Centime', 100, 'false', '', '.', ',', 504, 0),
(88, 100, 'MDL', 'Moldovan Leu', 'L', 'Ban', 100, 'false', '', '.', ',', 498, 0),
(89, 100, 'MGA', 'Malagasy Ariary', 'Ar', 'Iraimbilanja', 5, 'true', '', '.', ',', 969, 0),
(90, 100, 'MKD', 'Macedonian Denar', 'ден', 'Deni', 100, 'false', '', '.', ',', 807, 0),
(91, 100, 'MMK', 'Myanmar Kyat', 'K', 'Pya', 100, 'false', '', '.', ',', 104, 0),
(92, 100, 'MNT', 'Mongolian Tögrög', '₮', 'Möngö', 100, 'false', '&#x20AE;', '.', ',', 496, 0),
(93, 100, 'MOP', 'Macanese Pataca', 'P', 'Avo', 100, 'false', '', '.', ',', 446, 0),
(94, 100, 'MRO', 'Mauritanian Ouguiya', 'UM', 'Khoums', 5, 'false', '', '.', ',', 478, 0),
(95, 100, 'MUR', 'Mauritian Rupee', '₨', 'Cent', 100, 'true', '&#x20A8;', '.', ',', 480, 0),
(96, 100, 'MVR', 'Maldivian Rufiyaa', 'MVR', 'Laari', 100, 'false', '', '.', ',', 462, 0),
(97, 100, 'MWK', 'Malawian Kwacha', 'MK', 'Tambala', 100, 'false', '', '.', ',', 454, 0),
(98, 100, 'MXN', 'Mexican Peso', '$', 'Centavo', 100, 'true', '$', '.', ',', 484, 0),
(99, 100, 'MYR', 'Malaysian Ringgit', 'RM', 'Sen', 100, 'true', '', '.', ',', 458, 0),
(100, 100, 'MZN', 'Mozambican Metical', 'MTn', 'Centavo', 100, 'true', '', ',', '.', 943, 0),
(101, 100, 'NAD', 'Namibian Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 516, 0),
(102, 100, 'NGN', 'Nigerian Naira', '₦', 'Kobo', 100, 'false', '&#x20A6;', '.', ',', 566, 0),
(103, 100, 'NIO', 'Nicaraguan Córdoba', 'C$', 'Centavo', 100, 'false', '', '.', ',', 558, 0),
(104, 100, 'NOK', 'Norwegian Krone', 'kr', 'Øre', 100, 'true', 'kr', ',', '.', 578, 0),
(105, 100, 'NPR', 'Nepalese Rupee', '₨', 'Paisa', 100, 'true', '&#x20A8;', '.', ',', 524, 0),
(106, 100, 'NZD', 'New Zealand Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 554, 0),
(107, 100, 'OMR', 'Omani Rial', 'ر.ع.', 'Baisa', 1000, 'true', '&#xFDFC;', '.', ',', 512, 0),
(108, 100, 'PAB', 'Panamanian Balboa', 'B/.', 'Centésimo', 100, 'false', '', '.', ',', 590, 0),
(109, 100, 'PEN', 'Peruvian Nuevo Sol', 'S/.', 'Céntimo', 100, 'true', 'S/.', '.', ',', 604, 0),
(110, 100, 'PGK', 'Papua New Guinean Kina', 'K', 'Toea', 100, 'false', '', '.', ',', 598, 0),
(111, 100, 'PHP', 'Philippine Peso', '₱', 'Centavo', 100, 'true', '&#x20B1;', '.', ',', 608, 0),
(112, 100, 'PKR', 'Pakistani Rupee', '₨', 'Paisa', 100, 'true', '&#x20A8;', '.', ',', 586, 0),
(113, 100, 'PLN', 'Polish Złoty', 'zł', 'Grosz', 100, 'false', 'z&#322;', ',', '', 985, 0),
(114, 100, 'PYG', 'Paraguayan Guaraní', '₲', 'Céntimo', 100, 'true', '&#x20B2;', '.', ',', 600, 0),
(115, 100, 'QAR', 'Qatari Riyal', 'ر.ق', 'Dirham', 100, 'false', '&#xFDFC;', '.', ',', 634, 0),
(116, 100, 'RON', 'Romanian Leu', 'Lei', 'Bani', 100, 'true', '', ',', '.', 946, 0),
(117, 100, 'RSD', 'Serbian Dinar', 'РСД', 'Para', 100, 'true', '', '.', ',', 941, 0),
(118, 100, 'RUB', 'Russian Ruble', 'р.', 'Kopek', 100, 'false', '&#x0440;&#x0443;&#x0431;', ',', '.', 643, 0),
(119, 100, 'RWF', 'Rwandan Franc', 'FRw', 'Centime', 100, 'false', '', '.', ',', 646, 0),
(120, 100, 'SAR', 'Saudi Riyal', 'ر.س', 'Hallallah', 100, 'true', '&#xFDFC;', '.', ',', 682, 0),
(121, 100, 'SBD', 'Solomon Islands Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 90, 0),
(122, 100, 'SCR', 'Seychellois Rupee', '₨', 'Cent', 100, 'false', '&#x20A8;', '.', ',', 690, 0),
(123, 100, 'SDG', 'Sudanese Pound', '£', 'Piastre', 100, 'true', '', '.', ',', 938, 0),
(124, 100, 'SEK', 'Swedish Krona', 'kr', 'Öre', 100, 'false', '', ',', '', 752, 0),
(125, 100, 'SGD', 'Singapore Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 702, 0),
(126, 100, 'SHP', 'Saint Helenian Pound', '£', 'Penny', 100, 'false', '&#x00A3;', '.', ',', 654, 0),
(127, 100, 'SKK', 'Slovak Koruna', 'Sk', 'Halier', 100, 'true', '', '.', ',', 703, 0),
(128, 100, 'SLL', 'Sierra Leonean Leone', 'Le', 'Cent', 100, 'false', '', '.', ',', 694, 0),
(129, 100, 'SOS', 'Somali Shilling', 'Sh', 'Cent', 100, 'false', '', '.', ',', 706, 0),
(130, 100, 'SRD', 'Surinamese Dollar', '$', 'Cent', 100, 'false', '', '.', ',', 968, 0),
(131, 100, 'SSP', 'South Sudanese Pound', '£', 'piaster', 100, 'false', '&#x00A3;', '.', ',', 728, 0),
(132, 100, 'STD', 'São Tomé and Príncipe Dobra', 'Db', 'Cêntimo', 100, 'false', '', '.', ',', 678, 0),
(133, 100, 'SVC', 'Salvadoran Colón', '₡', 'Centavo', 100, 'true', '&#x20A1;', '.', ',', 222, 0),
(134, 100, 'SYP', 'Syrian Pound', '£S', 'Piastre', 100, 'false', '&#x00A3;', '.', ',', 760, 0),
(135, 100, 'SZL', 'Swazi Lilangeni', 'L', 'Cent', 100, 'true', '', '.', ',', 748, 0),
(136, 100, 'THB', 'Thai Baht', '฿', 'Satang', 100, 'true', '&#x0E3F;', '.', ',', 764, 0),
(137, 100, 'TJS', 'Tajikistani Somoni', 'ЅМ', 'Diram', 100, 'false', '', '.', ',', 972, 0),
(138, 100, 'TMT', 'Turkmenistani Manat', 'T', 'Tenge', 100, 'false', '', '.', ',', 934, 0),
(139, 100, 'TND', 'Tunisian Dinar', 'د.ت', 'Millime', 1000, 'false', '', '.', ',', 788, 0),
(140, 100, 'TOP', 'Tongan Paʻanga', 'T$', 'Seniti', 100, 'true', '', '.', ',', 776, 0),
(141, 100, 'TRY', 'Turkish Lira', 'TL', 'kuruş', 100, 'false', '', ',', '.', 949, 0),
(142, 100, 'TTD', 'Trinidad and Tobago Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 780, 0),
(143, 100, 'TWD', 'New Taiwan Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 901, 0),
(144, 100, 'TZS', 'Tanzanian Shilling', 'Sh', 'Cent', 100, 'true', '', '.', ',', 834, 0),
(145, 100, 'UAH', 'Ukrainian Hryvnia', '₴', 'Kopiyka', 100, 'false', '&#x20B4;', '.', ',', 980, 0),
(146, 100, 'UGX', 'Ugandan Shilling', 'USh', 'Cent', 100, 'false', '', '.', ',', 800, 0),
(147, 1, 'USD', 'United States Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 840, 0),
(148, 100, 'UYU', 'Uruguayan Peso', '$', 'Centésimo', 100, 'true', '&#x20B1;', ',', '.', 858, 0),
(149, 100, 'UZS', 'Uzbekistani Som', 'null', 'Tiyin', 100, 'false', '', '.', ',', 860, 0),
(150, 100, 'VEF', 'Venezuelan Bolívar', 'Bs F', 'Céntimo', 100, 'true', '', ',', '.', 937, 0),
(151, 100, 'VND', 'Vietnamese Đồng', '₫', 'Hào', 10, 'true', '&#x20AB;', ',', '.', 704, 0),
(152, 100, 'VUV', 'Vanuatu Vatu', 'Vt', 'null', 1, 'true', '', '.', ',', 548, 0),
(153, 100, 'WST', 'Samoan Tala', 'T', 'Sene', 100, 'false', '', '.', ',', 882, 0),
(154, 100, 'XAF', 'Central African Cfa Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 950, 0),
(155, 100, 'XAG', 'Silver (Troy Ounce)', 'oz t', 'oz', 1, 'false', '', '.', ',', 961, 0),
(156, 100, 'XAU', 'Gold (Troy Ounce)', 'oz t', 'oz', 1, 'false', '', '.', ',', 959, 0),
(157, 100, 'XCD', 'East Caribbean Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 951, 0),
(158, 100, 'XDR', 'Special Drawing Rights', 'SDR', '', 1, 'false', '$', '.', ',', 960, 0),
(159, 100, 'XOF', 'West African Cfa Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 952, 0),
(160, 100, 'XPF', 'Cfp Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 953, 0),
(161, 100, 'YER', 'Yemeni Rial', '﷼', 'Fils', 100, 'false', '&#xFDFC;', '.', ',', 886, 0),
(162, 100, 'ZAR', 'South African Rand', 'R', 'Cent', 100, 'true', '&#x0052;', '.', ',', 710, 0),
(163, 100, 'ZMK', 'Zambian Kwacha', 'ZK', 'Ngwee', 100, 'false', '', '.', ',', 894, 0),
(164, 100, 'ZMW', 'Zambian Kwacha', 'ZK', 'Ngwee', 100, 'false', '', '.', ',', 967, 0),
(165, 1, 'USD', 'United States Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 840, 1);

-- --------------------------------------------------------

--
-- Table structure for table `custom_pages`
--

CREATE TABLE `custom_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_slug` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order_id` int(11) NOT NULL DEFAULT 1,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `position` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `display_in` enum('col-1','col-2','col-3','col-4') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `custom_pages`
--

INSERT INTO `custom_pages` (`id`, `title`, `url_slug`, `body`, `is_active`, `order_id`, `meta_keywords`, `meta_description`, `update_by`, `created_by`, `created_at`, `updated_at`, `position`, `updated_by`, `display_in`) VALUES
(4, 'Privacy Policy', 'privacy-policy', '<div class=\"content_wrap mb-5\" style=\"color: rgb(34, 34, 34); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgba(235, 237, 244, 0.23);\"><h3 style=\"margin-bottom: 16px; font-weight: 600; font-size: 18px; font-family: Raleway, sans-serif;\">What is Best Franchises: Privacy Policy</h3><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(102, 102, 102); line-height: 28px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget nunc ut neque vestibulum pellentesque. Vivamus vel mauris a nibh pulvinar laoreet. Curabitur dignissim mattis mi vel dictum. In at auctor urna, gravida blandit nisi. Aenean accumsan, augue id venenatis mollis, eros arcu tempus dolor, eget tempus sem velit et quam. Nam consectetur consectetur quam sed rhoncus. Aenean velit justo, varius ut arcu at, tincidunt lobortis lorem. Sed sollicitudin aliquet turpis at vestibulum. Ut in congue sapien. Sed vitae lectus id dolor pellentesque aliquet. Sed lectus massa, luctus ac ultricies id, dictum sed felis. Nam dignissim, diam a pharetra dapibus, risus dolor finibus augue, ut tincidunt turpis tellus eget est.&nbsp;<span style=\"font-weight: bolder;\">email info@gmail.com</span></p></div><div class=\"content_wrap mb-5\" style=\"color: rgb(34, 34, 34); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgba(235, 237, 244, 0.23);\"><h3 style=\"margin-bottom: 16px; font-weight: 600; font-size: 18px; font-family: Raleway, sans-serif;\">Where can I get some?</h3><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(102, 102, 102); line-height: 28px; text-align: justify;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p></div><div class=\"content_wrap mb-5\" style=\"color: rgb(34, 34, 34); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgba(235, 237, 244, 0.23);\"><h3 style=\"margin-bottom: 16px; font-weight: 600; font-size: 18px; font-family: Raleway, sans-serif;\">Where does it come from?</h3><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(102, 102, 102); line-height: 28px; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32</p></div><div class=\"content_wrap\" style=\"color: rgb(34, 34, 34); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgba(235, 237, 244, 0.23);\"><h3 style=\"margin-bottom: 16px; font-weight: 600; font-size: 18px; font-family: Raleway, sans-serif;\">Why do we use it?</h3><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(102, 102, 102); line-height: 28px; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p></div>', 1, 1, NULL, NULL, NULL, 1, '2022-11-26 10:03:52', '2023-02-01 11:44:20', NULL, 2, NULL),
(5, 'Terms and Conditions', 'terms-and-conditions', '<p><span style=\"font-size: 14px;\">﻿</span><span style=\"font-size: 14px;\">﻿</span><span style=\"color: rgb(32, 33, 36); font-family: consolas, &quot;lucida console&quot;, &quot;courier new&quot;, monospace; font-size: 12px; white-space: pre-wrap; letter-spacing: 0px;\">Terms and Conditions</span><br></p>', 1, 2, NULL, NULL, NULL, 1, '2022-11-26 10:17:15', '2022-12-06 23:17:32', 'footer', 1, 'col-3'),
(6, 'Data deletion instructions', 'data-deletion-instructions', '<h1 class=\"article-title text-capitalize py-md-2\"><span style=\"font-size: 14px;\">﻿</span><span style=\"font-size: 14px;\">﻿</span><span style=\"font-size: 14px;\">﻿</span><span style=\"font-size: 14px;\">﻿</span><span style=\"font-size: 14px;\">﻿</span><span style=\"font-size: 14px;\">﻿</span><span style=\"font-size: 14px;\">﻿</span><span style=\"font-size: 14px;\">﻿</span>How Can I Deactivate Or Delete My Account?</h1><div class=\"content\" style=\"\"><p class=\"card-text\" style=\"margin-bottom: 1rem; font-size: 15px; line-height: 30px;\"></p><p style=\"margin-bottom: 1rem; font-size: 1.1em; line-height: 30px;\">We\'re sorry to hear you want to remove or deactivate your mtgpro.me account. You have the option of temporarily deactivating your account and then reactivating it later, or permanently deleting your account. Please keep in mind that account termination is permanent and cannot be reversed. You must be signed in to fill out the account deactivation/deletion request form in order to deactivate or delete your account. Please see our privacy policy for more information.</p><p style=\"margin-bottom: 1rem; font-size: 1.1em; line-height: 30px;\"><span style=\"font-weight: bolder;\">When you have successfully deactivated your account:</span></p><p style=\"margin-bottom: 1rem; font-size: 1.1em; line-height: 30px;\">1) You will not be able to log in to your mtgpro.me account nor use the same credentials (email or phone number) to create a new account.<br></p><p style=\"margin-bottom: 1rem; font-size: 1.1em; line-height: 30px;\">3) Your profile will be hidden. Some information such as your product reviews may still be visible to others.</p><p style=\"margin-bottom: 1rem; font-size: 1.1em; line-height: 30px;\">4) Your account can still be reactivated. You will need to contact us Via Email at Info@MTGPro.me if you want to reactivate your account.</p><p style=\"margin-bottom: 1rem; font-size: 1.1em; line-height: 30px;\"><span style=\"font-weight: bolder;\">When you have successfully deleted your account:<br></span></p><p style=\"margin-bottom: 1rem; font-size: 1.1em; line-height: 30px;\">1) You will not be able to log in to your mtgpro.me account nor use the same credentials (email or phone number) to create a new account.</p><p style=\"margin-bottom: 1rem; font-size: 1.1em; line-height: 30px;\">2) You will not be able to reactivate or recover any data, including your reviews and past purchase history</p><p style=\"margin-bottom: 1rem; font-size: 1.1em; line-height: 30px;\">3) You will need to set up a new account using a different email and/or mobile number if you want to use mtgpro.me again.</p><p style=\"margin-bottom: 1rem; font-size: 1.1em; line-height: 30px;\">If you have trouble logging into your account or suspect that someone has logged into your account, please contact us through email (info@mtgpro.me).<span style=\"font-size: 14px;\">﻿</span></p></div>', 1, 1, 'sddrrr', 'sdadxxx', NULL, 1, '2022-11-26 10:18:13', '2023-01-22 05:31:04', NULL, 1, NULL),
(7, 'What Is MTGPro.me?', 'about', '<p class=\"MsoNormal\" style=\"margin-bottom:0in;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Segoe UI&quot;,sans-serif;mso-fareast-font-family:\r\n&quot;Times New Roman&quot;;color:#5E5E5E\">MTGPro.me is a digital business card helping\r\nmortgage professionals make their lasting first impression, amazing! We provide\r\nyou the tools and resources you need to stand out from the competition. With a\r\nquick tap, click or scan showcase all your content across any platform in one personally\r\nbranded PROfile . <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom:0in;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Segoe UI&quot;,sans-serif;mso-fareast-font-family:\r\n&quot;Times New Roman&quot;;color:#5E5E5E\">&nbsp;</span></p><p>\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\" style=\"margin-bottom:0in;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Segoe UI&quot;,sans-serif;mso-fareast-font-family:\r\n&quot;Times New Roman&quot;;color:#5E5E5E\">Our platform allows you to create a\r\nprofessional PROfile that includes your professional background, industry\r\ncertifications, NMLS ID. In addition to creating a profile, you can also\r\ncustomize your digital business card with your headshot, logo, contact\r\ninformation, websites, application pages and every social media account you\r\nhave. This allows you to easily share your information with potential clients,\r\nreferral partners, and other professionals. We also provide free marketing\r\nmaterial, social media posts, and other content to help you promote yourself\r\nand your business.&nbsp;</span></p><p class=\"MsoNormal\" style=\"margin-bottom:0in;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Segoe UI&quot;,sans-serif;mso-fareast-font-family:\r\n&quot;Times New Roman&quot;;color:#5E5E5E\"><br></span></p><p class=\"MsoNormal\" style=\"margin-bottom:0in;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Segoe UI&quot;,sans-serif;mso-fareast-font-family:\r\n&quot;Times New Roman&quot;;color:#5E5E5E\">Our Mission: </span></p><p class=\"MsoNormal\" style=\"margin-bottom:0in;line-height:normal\"><font color=\"#5e5e5e\" face=\"Segoe UI, sans-serif\"><span style=\"font-size: 12pt;\">To help every mortgage professional stay top of mind with every business connection they make and help you get the </span><span style=\"font-size: 16px;\">recognition</span><span style=\"font-size: 12pt;\">&nbsp;of the PRO that you are.</span></font></p>', 1, 1, NULL, NULL, NULL, 1, '2022-12-06 22:51:51', '2023-01-15 06:42:55', NULL, 1, NULL),
(8, 'Careers', 'careers', '<p><span style=\"font-size: 14px;\">﻿</span><span style=\"font-size: 14px;\">﻿</span>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br></p>', 1, 4, NULL, NULL, NULL, 1, '2022-12-06 22:53:09', '2022-12-06 23:16:19', 'footer', 1, 'col-2'),
(9, 'Contact us', 'contact-us', '<div class=\"contact_sec mb-5 mt-5\">\r\n        <div class=\"container\">\r\n            \r\n                <div class=\"row d-flex justify-content-center\">\r\n                    <div class=\"col-lg-8\">\r\n                        <div class=\"row\">\r\n                            <div class=\"col-md-6 mb-3\">\r\n                                <label for=\"name\" class=\"form-label\">Name <span class=\"text-danger\">*</span></label>\r\n                                <input type=\"text\" name=\"name\" id=\"name\" class=\"form-control\" placeholder=\"Enter your name\" =\"\"=\"\">\r\n                            </div>\r\n                            <div class=\"col-md-6 mb-3\">\r\n                                <label for=\"email\" class=\"form-label\">Email <span class=\"text-danger\">*</span></label>\r\n                                <input type=\"email\" name=\"email\" id=\"email\" class=\"form-control\" placeholder=\"Enter your email\">\r\n                            </div>\r\n                            <div class=\"col-md-6 mb-3\">\r\n                                <label for=\"phone\" class=\"form-label\">Phone <span class=\"text-danger\">*</span></label>\r\n                                <input type=\"phone\" name=\"phone\" id=\"phone\" class=\"form-control\" placeholder=\"Enter your phone\">\r\n                            </div>\r\n                            <div class=\"col-md-6 mb-3\">\r\n                                <label for=\"\" class=\"form-label\">Reason for Inquiry <span class=\"text-danger\">*</span></label>\r\n                                <select name=\"reason\" id=\"reason\" class=\"form-control\">\r\n                                    <option value=\"\" class=\"d-none\">Reason for Inquiry*</option>\r\n                                    <option value=\"Advertising\">Advertising</option>\r\n                                    <option value=\"Franchising my business\">Franchising my business</option>\r\n                                    <option value=\"Help in finding a franchise\">Help in finding a franchise</option>\r\n                                    <option value=\"Question about a franchise\">Question about a franchise</option>\r\n                                    <option value=\"Site suggestion\">Site suggestion</option>\r\n                                    <option value=\"Site question\">Site question</option>\r\n                                </select>\r\n                            </div>\r\n                            <div class=\"col-12 mb-3\">\r\n                                <label for=\"message\" class=\"form-label\">Message <span class=\"text-danger\">*</span></label>\r\n                                <textarea name=\"message\" id=\"message\" cols=\"30\" rows=\"5\" class=\"form-control\" required=\"\"></textarea>\r\n                            </div>\r\n                            <div class=\"mb-3\">\r\n                                <button type=\"submit\" class=\"btn btn-primary\">Send</button>\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            \r\n        </div>\r\n    </div>', 1, 1, NULL, NULL, NULL, 1, '2022-12-06 22:53:46', '2023-02-01 11:48:48', NULL, 2, NULL),
(10, 'Security', 'security', '<p><span style=\"font-size: 14px;\">﻿</span><span style=\"font-size: 14px;\">﻿</span><span style=\"font-size: 14px;\">﻿</span>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.<br></p>', 1, 1, NULL, NULL, NULL, 1, '2022-12-06 22:54:17', '2023-01-24 09:41:10', NULL, 1, NULL),
(11, 'Tutorials', 'tutorials', '<p><span style=\"font-size: 14px;\">﻿</span><span style=\"font-size: 14px;\">﻿</span><span style=\"font-size: 14px;\">﻿</span>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.<br></p>', 1, 5, NULL, NULL, NULL, 1, '2022-12-06 22:53:46', '2022-12-06 23:17:57', 'footer', 1, 'col-2'),
(12, 'Help', 'help', '<p><span style=\"font-size: 14px;\">﻿</span><span style=\"font-size: 14px;\">﻿</span><span style=\"font-size: 14px;\">﻿</span>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.<br></p>', 1, 5, NULL, NULL, NULL, 1, '2022-12-06 22:53:46', '2022-12-06 23:17:57', 'footer', 1, 'col-2'),
(13, 'Environment setup', 'environment', '<p><span style=\"font-size: 14px;\">﻿</span><span style=\"font-size: 14px;\">﻿</span><br></p>', 1, 1, 'env', NULL, NULL, 1, '2023-01-16 10:35:37', '2023-01-16 10:35:49', NULL, 1, NULL),
(14, 'Free Marketing Material', 'free-marketing-material', '<p><span style=\"font-size: 14px;\">﻿</span><span style=\"font-size: 14px;\">﻿</span>Free Marketing Material<br></p>', 1, 1, 'Free Marketing Material', 'Free Marketing Material', NULL, 1, '2023-01-16 15:53:06', '2023-01-18 14:22:45', NULL, 1, NULL),
(15, 'Test customer Pages Update', 'test-customer-pages', '<p><span style=\"font-size: 14px;\">﻿</span>This is the best tset</p>', 1, 1, 'test', 'This is the best test', NULL, 1, '2023-01-18 14:22:00', '2023-01-18 14:22:30', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order_id` int(11) NOT NULL DEFAULT 1,
  `update_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `body`, `is_active`, `order_id`, `update_by`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(3, 'What are Digital Business Cards?', 'Digital business cards are a modern way of exchanging a limitless amount contact information. They are digital versions of traditional paper business cards and provide a more efficient way to share every platform you utilize to maintian your brand.  Digital business cards are typically shared via text message, email, or other digital communication platforms. They are also often used with QR codes and today more commonly with NFC (Near Field Communication) technology to quickly and easily share contact.', 1, 1, NULL, 1, '2023-01-14 11:24:58', '2023-02-05 13:29:29', 2),
(4, 'What does NFC mean?', 'Near Field Communication (NFC) technology is a wireless technology that allows two devices to communicate with each other when they are close together. NFC tags can be used to store digital business cards, allowing users to quickly and easily share their contact information with others.', 1, 2, NULL, 1, '2023-01-15 05:15:20', '2023-01-27 06:13:31', 73),
(5, 'What are digital business cards?', 'Digital business cards are a modern way of exchanging a limitless amount contact information. They are digital versions of traditional paper business cards and provide a more efficient way to share every platform you utilize to maintain your brand.  Digital business cards are typically shared via text message, email, or other digital communication platforms. They are also often used with QR codes and today more commonly with NFC (Near Field Communication) technology to quickly and easily share contact information.', 1, 3, NULL, 1, '2023-01-16 10:36:48', '2023-01-20 10:10:09', 1),
(7, 'What are QR Codes', 'Those weird looking boxes that look like a funky art piece is really a QR code. A two-dimensional barcode that can be scanned using a smartphone camera. They can be used to quickly and easily share digital business cards with others. QR codes can be printed on traditional paper business cards or displayed on digital devices, such as tablets or laptops.', 1, 4, NULL, 73, '2023-01-27 06:14:35', NULL, NULL),
(8, 'Why MTGPRO.ME?', 'MTGPRO.ME is the number 1 digital business card solution tailored specifically to mortgage professionals. With industry features like a mortgage calculator on your PROfile, the ability to keep compliant displaying your NMLS ID and Equal Housing logo, and free marketing material with select plans, MTGPRO.ME will not only save you money but also make it easy to scale your business.', 1, 5, NULL, 73, '2023-01-27 06:27:03', '2023-01-28 08:25:03', 73);

-- --------------------------------------------------------

--
-- Table structure for table `franchises`
--

CREATE TABLE `franchises` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `min_hand_cash` varchar(255) NOT NULL,
  `investment` varchar(255) NOT NULL,
  `net_worth` varchar(255) DEFAULT NULL,
  `financing_availability` int(11) DEFAULT NULL,
  `founded_year` varchar(255) DEFAULT NULL,
  `franchising_start` varchar(255) DEFAULT NULL,
  `opportunities` text DEFAULT NULL,
  `awards` text DEFAULT NULL,
  `testimonials` text DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `franchise_fee` varchar(255) DEFAULT NULL,
  `royalty_fee` varchar(255) DEFAULT NULL,
  `ad_fee` varchar(255) DEFAULT NULL,
  `units_number` varchar(255) DEFAULT NULL,
  `order_number` int(11) NOT NULL DEFAULT 0,
  `status` int(3) NOT NULL DEFAULT 0 COMMENT '0 = inactive,\r\n1 = Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `franchises`
--

INSERT INTO `franchises` (`id`, `title`, `slug`, `description`, `banner_image`, `thumbnail`, `min_hand_cash`, `investment`, `net_worth`, `financing_availability`, `founded_year`, `franchising_start`, `opportunities`, `awards`, `testimonials`, `video`, `franchise_fee`, `royalty_fee`, `ad_fee`, `units_number`, `order_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sdfsdfsdf', 'sdfsdfsdf', '<p>ss</p>', 'uploads/franchises/1675675818_63e0c8aaa1129.jpg', 'uploads/franchises/1675675787_63e0c88be0801.png', '345325', 'sd5345', '345345', 1, '1901', '1902', '<p><b>zX sxZX</b> <u>xZXZX </u>Z<span style=\"background-color: rgb(255, 255, 0);\">xZXZx</span></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-02-06 01:21:02', '2023-02-06 03:35:23'),
(2, 'sdfsdfs', 'sdfsdfs', '<p>asdasd</p>', 'uploads/franchises/1675676682_63e0cc0a7b7f1.jpg', 'uploads/franchises/1675676682_63e0cc0a6c473.png', '34535', '435345', 'refe', 1, '1901', '1903', '<p>asda</p>', NULL, NULL, 'sdfsdf', '4423', '23423', '2342', '3242', 243, 1, '2023-02-06 03:44:42', '2023-02-06 03:44:42'),
(4, 'sdfsdfsdf', 'sdfsdfsdf_4', '<p>sdfsdf</p>', 'uploads/franchises/1675677309_63e0ce7d5e52f.jpg', 'uploads/franchises/1675677309_63e0ce7d4e0bb.jpg', '34534', '34r5325', '34534', 1, '1902', '1901', NULL, NULL, NULL, 'fdsd', '34534', '345', '34534', '435', 234, 1, '2023-02-06 03:55:09', '2023-02-06 03:55:09'),
(5, 'BUILD A SUCCESSFUL PROPERTY MANAGEMENT BUSINESS WITH US', 'build-a-successful-property-management-business-with-us', '<p style=\"margin-bottom: 20px; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); font-family: Roboto, sans-serif; background-color: rgba(235, 237, 244, 0.23);\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-bottom: 20px; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); font-family: Roboto, sans-serif; background-color: rgba(235, 237, 244, 0.23);\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-bottom: 20px; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); font-family: Roboto, sans-serif; background-color: rgba(235, 237, 244, 0.23);\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', 'uploads/franchises/1675677973_63e0d1156b7f6.jpg', 'uploads/franchises/1675677973_63e0d11556bea.jpg', '90000', '90000', 'SDAF', 1, '1939', '1914', NULL, NULL, '<div class=\"review_item\" style=\"border-bottom: 1px solid rgb(238, 238, 238); padding: 13px 0px; color: rgb(34, 34, 34); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgba(235, 237, 244, 0.23);\"><p style=\"margin-right: 0px; margin-bottom: 22px; margin-left: 0px; line-height: 28px; color: rgb(102, 102, 102);\">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam impedit praesentium voluptas fugiat, qui voluptate quaerat aut omnis quasi alias sequi nostrum quod iure? Ullam vitae quidem culpa et ut.</p><h3 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; font-size: 18px; font-family: Roboto, sans-serif; letter-spacing: 1px;\">Clint Rowley</h3><h5 style=\"font-size: 13px; font-family: Roboto, sans-serif; color: rgb(102, 102, 102);\">Franchisee Arizona</h5></div><div class=\"review_item\" style=\"border-bottom: 1px solid rgb(238, 238, 238); padding: 13px 0px; color: rgb(34, 34, 34); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgba(235, 237, 244, 0.23);\"><p style=\"margin-right: 0px; margin-bottom: 22px; margin-left: 0px; line-height: 28px; color: rgb(102, 102, 102);\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><h3 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; font-size: 18px; font-family: Roboto, sans-serif; letter-spacing: 1px;\">Clint Rowley</h3><h5 style=\"font-size: 13px; font-family: Roboto, sans-serif; color: rgb(102, 102, 102);\">Franchisee Arizona</h5></div>', NULL, '20000', '2000', '2222', NULL, 13, 1, '2023-02-06 04:06:13', '2023-02-06 04:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_number` int(11) NOT NULL DEFAULT 0,
  `status` int(3) NOT NULL DEFAULT 0 COMMENT '0 = inactive,\r\n1 = Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invesments`
--

CREATE TABLE `invesments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_number` int(11) NOT NULL DEFAULT 0,
  `status` int(3) NOT NULL DEFAULT 0 COMMENT '0 = inactive,\r\n1 = Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_number` int(11) NOT NULL DEFAULT 0,
  `status` int(3) NOT NULL DEFAULT 0 COMMENT '0 = inactive,\r\n1 = Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_18_050842_create_roles_table', 1),
(6, '2023_01_24_100950_create_posts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1),
(1, 'App\\Models\\User', 7),
(2, 'App\\Models\\Admin', 2),
(2, 'App\\Models\\Admin', 4),
(2, 'App\\Models\\Admin', 5),
(2, 'App\\Models\\Admin', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `discount` float(14,2) DEFAULT 0.00,
  `coupon_discount` float(14,2) NOT NULL DEFAULT 0.00,
  `total_price` float(14,2) DEFAULT 0.00,
  `payment_fee` float(14,2) NOT NULL DEFAULT 0.00,
  `vat` float(14,2) DEFAULT 0.00,
  `grand_total` float DEFAULT 0,
  `discount_percentage` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT 1 COMMENT '1=Photo Frame,2=gift card'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(124) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(124) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `group_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin.user.index', 'admin', 'admin', '2023-01-24 07:52:41', '2023-01-24 07:52:41'),
(2, 'admin.user.create', 'admin', 'admin', '2023-01-24 07:52:50', '2023-01-24 07:52:50'),
(3, 'admin.user.edit', 'admin', 'admin', NULL, NULL),
(4, 'admin.user.destroy', 'admin', 'admin', NULL, NULL),
(5, 'admin.cpage.index', 'custom-page', 'admin', NULL, NULL),
(6, 'admin.cpage.create', 'custom-page', 'admin', NULL, NULL),
(7, 'admin.cpage.store', 'custom-page', 'admin', NULL, NULL),
(8, 'admin.cpage.edit', 'custom-page', 'admin', NULL, NULL),
(9, 'admin.cpage.view', 'custom-page', 'admin', NULL, NULL),
(10, 'admin.cpage.update', 'custom-page', 'admin', NULL, NULL),
(11, 'admin.cpage.delete', 'custom-page', 'admin', NULL, NULL),
(16, 'admin.faq.index', 'faq', 'admin', '2023-01-24 01:52:41', '2023-01-24 01:52:41'),
(17, 'admin.faq.create', 'faq', 'admin', '2023-01-24 01:52:50', '2023-01-24 01:52:50'),
(18, 'admin.faq.store', 'faq', 'admin', '2023-01-24 01:52:41', '2023-01-24 01:52:41'),
(19, 'admin.faq.edit', 'faq', 'admin', '2023-01-24 01:52:50', '2023-01-24 01:52:50'),
(20, 'admin.faq.view', 'faq', 'admin', '2023-01-24 01:52:41', '2023-01-24 01:52:41'),
(21, 'admin.faq.update', 'faq', 'admin', '2023-01-24 01:52:50', '2023-01-24 01:52:50');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo_frames`
--

CREATE TABLE `photo_frames` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'auth id or guest session id',
  `status` int(11) DEFAULT NULL COMMENT '0=pending,1=complete',
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'from request browser info',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` int(10) DEFAULT NULL COMMENT 'if order is completed '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo_frame_childs`
--

CREATE TABLE `photo_frame_childs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo_frame_id` int(10) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_noir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_silver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_dramatic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_vivid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_winter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `selected_frame` enum('none','white','black') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selected_photo` enum('image','image_noir','image_silver','image_dramatic','image_vivid','image_winter') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selected_mat` enum('none','shallow','medium','deep') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(320) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'admin', '2023-01-17 23:50:17', NULL),
(2, 'admin', 'admin', '2023-01-17 23:50:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(5, 1),
(5, 2),
(6, 1),
(7, 1),
(8, 1),
(8, 2),
(9, 1),
(10, 1),
(11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `google_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tawk_chat_bot_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `host` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `port` int(11) NOT NULL,
  `encryption` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `application_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_mode` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'local/live',
  `facebook_client_id` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_client_secret` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_callback_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_client_id` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_client_secret` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_callback_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright_text` varchar(124) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_url` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram_url` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_number` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ios_app_url` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `android_app_url` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `google_key`, `google_analytics_id`, `site_name`, `site_logo`, `favicon`, `seo_meta_description`, `seo_keywords`, `seo_image`, `tawk_chat_bot_key`, `name`, `address`, `driver`, `host`, `port`, `encryption`, `username`, `password`, `status`, `created_at`, `updated_at`, `application_type`, `app_mode`, `facebook_client_id`, `facebook_client_secret`, `facebook_callback_url`, `google_client_id`, `google_client_secret`, `google_callback_url`, `copyright_text`, `office_address`, `facebook_url`, `youtube_url`, `twitter_url`, `linkedin_url`, `telegram_url`, `whatsapp_number`, `ios_app_url`, `android_app_url`, `email`, `phone_no`, `support_email`, `instagram_url`) VALUES
(1, NULL, 'G-12SD09FF03', 'Standard CMS', '/assets/images/IMG-1667822163.png', '/assets/images/IMG-1667822182.png', 'Welcome to LetsConnect. It’s more than a digital business card, it’s a networking sales generator.', 'keyword 1, keyword 2', '/assets/images/IMG-1667822182.png', NULL, 'Standard CMS', 'noreply@letsconnect.com', 'smtp', 'smtp.mailtrap.io', 2525, 'tls', 'maidul@gmailc.om', '123456', '1', '2022-03-12 14:54:38', '2022-12-12 01:17:55', NULL, NULL, '495920045706830', 'dcbac5562d862384bce2918bf025eeaf', 'https://letsconnectv2.webdevs4u.com/auth/facebook/callback', NULL, '', 'https://letsconnectv2.webdevs4u.com/auth/google/callback', 'Copyright © LetsConnect. All rights reserved.', NULL, 'https://www.facebook.com', 'https://www.youtube.com', 'https://twitter.com/Mr_LetsConnect', 'https://www.linkedin.com/feed', 'https://telegram.org', '+8801515262626', NULL, NULL, NULL, NULL, 'support@letsconnect.site', 'https://www.instagram .com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` int(1) NOT NULL DEFAULT 1 COMMENT '1=user,2=admin',
  `status` int(1) DEFAULT 1 COMMENT '1=active,0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `image`, `remember_token`, `created_at`, `updated_at`, `user_type`, `status`) VALUES
(1, 1, 'Super Admin', 'arobil@gmail.com', NULL, '$2y$10$2dL7R/ze5t3ONTwcvy5sve.gIQnk1xoOqzMI0Abpn.oicSACEvdHi', NULL, NULL, NULL, NULL, '2023-01-17 23:50:17', NULL, 2, 1),
(2, 2, 'User', 'user@gmail.com', NULL, '$2y$10$TLcxxfejxUNEpLDJhKiLHehCxJ.7Y4UZSXHEU7EaGzToDydg7d1ZC', NULL, NULL, NULL, NULL, '2023-01-17 23:50:17', NULL, 1, 1),
(4, 1, 'Super Admin', 'manager@gmail.com', NULL, '$2y$10$2dL7R/ze5t3ONTwcvy5sve.gIQnk1xoOqzMI0Abpn.oicSACEvdHi', NULL, NULL, NULL, NULL, '2023-01-17 23:50:17', NULL, 2, 1),
(5, 2, 'Kamal', 'kamal@gmail.com', NULL, '$2y$10$gRvScj179oVDvKh9cHGEu.WfT4mhlcmnnmmhutDbWSWFKpdzii4tG', NULL, NULL, NULL, NULL, '2023-01-24 06:16:46', '2023-01-24 06:16:46', 2, 1),
(6, 2, 'Jamal', 'jamal@gmail.com', NULL, '$2y$10$ZbRkZK8NgPCJ9pO3m4vENeT2My2/q45Cge2ZWB.gy5gRbk9lvvWn6', NULL, NULL, NULL, NULL, '2023-01-24 06:17:44', '2023-01-24 06:17:44', 1, 1),
(7, 2, 'Sakil', 'sakil@gmail.com', NULL, '$2y$10$ET7lfcXuc.NEKSesm.N0l.6WjsuZbXCfqYHlmJ43qjofyVXqX6kia', NULL, NULL, NULL, NULL, '2023-01-24 06:18:18', '2023-01-24 06:18:18', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_pages`
--
ALTER TABLE `custom_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `franchises`
--
ALTER TABLE `franchises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photo_frames`
--
ALTER TABLE `photo_frames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo_frame_childs`
--
ALTER TABLE `photo_frame_childs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `custom_pages`
--
ALTER TABLE `custom_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `franchises`
--
ALTER TABLE `franchises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo_frames`
--
ALTER TABLE `photo_frames`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo_frame_childs`
--
ALTER TABLE `photo_frame_childs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
