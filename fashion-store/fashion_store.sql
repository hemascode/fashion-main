-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2024 at 12:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashion_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adverisements`
--

CREATE TABLE `adverisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adverisements`
--

INSERT INTO `adverisements` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'homepage_secion_banner_one', '{\"banner_one\":{\"banner_url\":\"fsadfasdfsd\",\"status\":1,\"banner_image\":\"uploads\\/media_644cf1a03b212.png\"}}', NULL, NULL),
(2, 'productpage_banner_section', '{\"banner_one\":{\"banner_url\":\"#\",\"status\":1,\"banner_image\":\"uploads\\/media_65fb5e1360683.jpg\"}}', '2024-03-20 16:37:15', '2024-03-20 16:54:05'),
(3, 'homepage_secion_banner_three', '{\"banner_one\":{\"banner_url\":\"#\",\"status\":1,\"banner_image\":\"uploads\\/media_65fb631876c96.jpg\"},\"banner_two\":{\"banner_url\":\"#\",\"status\":1,\"banner_image\":\"uploads\\/media_65fb62f8a28b6.jpg\"},\"banner_three\":{\"banner_url\":\"#\",\"status\":1,\"banner_image\":\"uploads\\/media_65fb62f8a2d64.jpg\"}}', '2024-03-20 16:58:08', '2024-03-20 16:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `logo`, `name`, `slug`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(1, 'uploads/media_65fa04229c31f.png', 'Prada', 'prada', 1, 1, '2024-03-19 16:01:14', '2024-03-19 16:01:14'),
(2, 'uploads/media_65fa0442d0bbf.png', 'Zara', 'zara', 1, 1, '2024-03-19 16:01:46', '2024-03-19 16:01:46'),
(4, 'uploads/media_65fa05692437b.png', 'Celine', 'celine', 1, 1, '2024-03-19 16:06:41', '2024-03-19 16:06:41'),
(5, 'uploads/media_65fa058c2c37c.png', 'Gucci', 'gucci', 1, 1, '2024-03-19 16:07:16', '2024-03-19 16:07:16'),
(7, 'uploads/media_65fa082ba311e.png', 'Zara', 'zara', 1, 1, '2024-03-19 16:18:27', '2024-03-19 16:18:27'),
(8, 'uploads/media_65fa084de6052.png', 'Dior', 'dior', 1, 1, '2024-03-19 16:19:01', '2024-03-19 16:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Men', 'men', 'fas fa-shopping-bag', 1, '2024-03-17 15:41:25', '2024-03-17 15:41:25'),
(3, 'women', 'women', 'fas fa-shopping-bag', 1, '2024-03-18 03:56:30', '2024-03-18 03:56:30'),
(4, 'kids', 'kids', 'fas fa-address-card', 1, '2024-03-19 14:24:22', '2024-03-19 14:24:22'),
(5, 'New', 'new', 'far fa-address-book', 1, '2024-03-19 14:25:35', '2024-03-19 14:25:35'),
(6, 'Season', 'season', 'fab fa-500px', 1, '2024-03-19 14:34:28', '2024-03-19 14:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `child_categories`
--

CREATE TABLE `child_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `child_categories`
--

INSERT INTO `child_categories` (`id`, `category_id`, `sub_category_id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 't-shirt', 't-shirt', 1, '2024-03-19 16:44:27', '2024-03-19 16:44:27'),
(2, 3, 6, 'Long-kruta\'s', 'long-krutas', 1, '2024-03-19 16:44:52', '2024-03-19 16:44:52'),
(3, 4, 10, 'cotton-pajama', 'cotton-pajama', 1, '2024-03-19 16:45:13', '2024-03-19 16:45:13'),
(4, 5, 11, 'All', 'all', 1, '2024-03-19 16:45:30', '2024-03-19 16:45:30'),
(5, 6, 13, 'pure cotton', 'pure-cotton', 1, '2024-03-19 16:45:58', '2024-03-19 16:45:58'),
(6, 1, 3, 'Boxer', 'boxer', 1, '2024-03-20 01:28:44', '2024-03-20 01:28:44'),
(7, 4, 15, 'Mid-ni', 'mid-ni', 1, '2024-03-20 02:03:05', '2024-03-20 02:03:05'),
(8, 4, 3, 'Casual', 'casual', 1, '2024-03-20 17:52:12', '2024-03-20 17:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `cod_settings`
--

CREATE TABLE `cod_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `max_use` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `discount_type` varchar(255) NOT NULL,
  `discount` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `total_used` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_configurations`
--

CREATE TABLE `email_configurations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `host` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `port` varchar(255) NOT NULL,
  `encryption` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flash_sales`
--

CREATE TABLE `flash_sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flash_sale_items`
--

CREATE TABLE `flash_sale_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `flash_sale_id` int(11) NOT NULL,
  `show_at_home` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_grid_threes`
--

CREATE TABLE `footer_grid_threes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_grid_twos`
--

CREATE TABLE `footer_grid_twos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_infos`
--

CREATE TABLE `footer_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_socials`
--

CREATE TABLE `footer_socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_titles`
--

CREATE TABLE `footer_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `footer_grid_two_title` varchar(255) DEFAULT NULL,
  `footer_grid_three_title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `layout` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `contact_address` varchar(255) DEFAULT NULL,
  `map` text DEFAULT NULL,
  `currency_name` varchar(255) NOT NULL,
  `currency_icon` varchar(255) NOT NULL,
  `time_zone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `site_name`, `layout`, `contact_email`, `contact_phone`, `contact_address`, `map`, `currency_name`, `currency_icon`, `time_zone`, `created_at`, `updated_at`) VALUES
(1, 'fashion', 'LTR', 'contact@fashion.com', '+69522145000001', 'IND', NULL, 'INR', '₹', 'Asia/Kolkata', '2024-03-17 14:59:08', '2024-03-17 14:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_settings`
--

CREATE TABLE `home_page_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logo_settings`
--

CREATE TABLE `logo_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` text NOT NULL,
  `favicon` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_15_042304_create_sliders_table', 1),
(6, '2023_03_17_041346_create_categories_table', 1),
(7, '2023_03_18_040045_create_sub_categories_table', 1),
(8, '2023_03_18_093303_create_child_categories_table', 1),
(9, '2023_03_20_073728_create_brands_table', 1),
(10, '2023_03_21_042848_create_vendors_table', 1),
(11, '2023_03_21_093706_create_products_table', 1),
(12, '2023_03_23_052909_create_product_image_galleries_table', 1),
(13, '2023_03_23_111346_create_product_variants_table', 1),
(14, '2023_03_25_061804_create_product_variant_items_table', 1),
(15, '2023_03_28_060014_add_shop_name_to_vendors_table', 1),
(16, '2023_04_02_045506_create_flash_sales_table', 1),
(17, '2023_04_02_045530_create_flash_sale_items_table', 1),
(18, '2023_04_04_045608_create_general_settings_table', 1),
(19, '2023_04_04_094057_create_coupons_table', 1),
(20, '2023_04_05_042237_create_shipping_rules_table', 1),
(21, '2023_04_05_075356_create_user_addresses_table', 1),
(22, '2023_04_12_070712_create_paypal_settings_table', 1),
(23, '2023_04_13_071626_create_orders_table', 1),
(24, '2023_04_13_073423_create_order_products_table', 1),
(25, '2023_04_13_073819_create_transactions_table', 1),
(26, '2023_04_13_092825_create_stripe_settings_table', 1),
(27, '2023_04_15_035210_create_razorpay_settings_table', 1),
(28, '2023_04_17_091708_create_home_page_settings_table', 1),
(29, '2023_04_26_054246_create_wishlists_table', 1),
(30, '2023_04_26_103843_create_footer_infos_table', 1),
(31, '2023_04_27_032049_create_footer_socials_table', 1),
(32, '2023_04_27_045654_create_footer_grid_twos_table', 1),
(33, '2023_04_27_060549_create_footer_titles_table', 1),
(34, '2023_04_27_065446_create_footer_grid_threes_table', 1),
(35, '2023_04_27_093629_create_email_configurations_table', 1),
(36, '2023_04_27_104025_create_newsletter_subscribers_table', 1),
(37, '2023_04_29_060826_create_adverisements_table', 1),
(38, '2023_04_30_041753_create_product_reviews_table', 1),
(39, '2023_04_30_042756_create_product_review_galleries_table', 1),
(40, '2023_05_01_101558_create_vendor_conditions_table', 1),
(41, '2023_05_01_110235_create_abouts_table', 1),
(42, '2023_05_01_113433_create_terms_and_conditions_table', 1),
(43, '2023_05_03_035158_create_blog_categories_table', 1),
(44, '2023_05_03_053816_create_blogs_table', 1),
(45, '2023_05_03_111615_create_blog_comments_table', 1),
(46, '2023_05_06_063011_create_cod_settings_table', 1),
(47, '2023_05_06_094648_create_logo_settings_table', 1),
(48, '2024_03_20_185144_create_subcategories_table', 2),
(49, '2024_03_20_185948_create_subcategories_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `verified_token` varchar(255) NOT NULL,
  `is_verified` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invocie_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_total` double NOT NULL,
  `amount` double NOT NULL,
  `currency_name` varchar(255) NOT NULL,
  `currency_icon` varchar(255) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `order_address` text NOT NULL,
  `shpping_method` text NOT NULL,
  `coupon` text NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `variants` text NOT NULL,
  `variant_total` int(11) DEFAULT NULL,
  `unit_price` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paypal_settings`
--

CREATE TABLE `paypal_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `mode` tinyint(1) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `currency_name` varchar(255) NOT NULL,
  `currency_rate` double NOT NULL,
  `client_id` text NOT NULL,
  `secret_key` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `thumb_image` text NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `child_category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `short_description` text NOT NULL,
  `long_description` text NOT NULL,
  `video_link` text DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `price` double NOT NULL,
  `offer_price` double DEFAULT NULL,
  `offer_start_date` date DEFAULT NULL,
  `offer_end_date` date DEFAULT NULL,
  `product_type` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `thumb_image`, `vendor_id`, `category_id`, `sub_category_id`, `child_category_id`, `brand_id`, `qty`, `short_description`, `long_description`, `video_link`, `sku`, `price`, `offer_price`, `offer_start_date`, `offer_end_date`, `product_type`, `status`, `is_approved`, `seo_title`, `seo_description`, `created_at`, `updated_at`) VALUES
(2, 'Women Cotton Blend Kurta Pant Set', 'women-cotton-blend-kurta-pant-set', 'uploads/media_65fa85a272012.png', 1, 3, 6, 2, 2, 6, 'Experience comfort and style with our Women\'s Cotton Blend Kurta Pant Set.\r\nMade from a soft and breathable cotton blend fabric.\r\nEasy-care instructions: machine wash cold.\r\nTumble dry on low heat for best results.\r\nEffortlessly chic and versatile for any occasion.', '<div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 797.662px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif;\"><div class=\"col col-11-12 _2cLjiM\" style=\"margin: 0px; padding: 32px 0px 32px 24px; width: 731.138px; display: inline-block; vertical-align: top; font-size: 24px;\"><br></div><div class=\"col col-1-12 _2jufoV\" style=\"margin: 0px; padding: 40px 24px 0px 0px; width: 66.4375px; display: inline-block; vertical-align: top; text-align: center;\"><img src=\"data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNCIgaGVpZ2h0PSIyIj48cGF0aCBmaWxsPSIjODc4Nzg3IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0wIDJWMGgxNHYyeiIvPjwvc3ZnPg==\" style=\"margin: 0px; padding: 0px; color: inherit; border-width: initial; border-color: initial; border-image: initial; outline: none;\"></div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 797.662px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif;\"><div class=\"row _1v8OXw\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 797.662px;\"><div class=\"X3BRps _13swYk\" style=\"margin: 0px; padding: 0px 24px; width: 797.662px; max-height: 344px; overflow: hidden; position: relative;\"><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Fabric</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">Cotton Blend</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Type</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">Kurta and Pant Set</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Sales Package</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">1 KURTI , 1 PANT</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Style Code</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">TR-NORA</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Top fabric</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">Cotton Blend</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Bottom fabric</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">Cotton</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Top type</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">Kurta</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Bottom type</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">Pant</div></div></div></div></div>', NULL, '56478912', 399, 3485, '2024-03-22', '2024-04-03', 'new_arrival', 1, 1, NULL, NULL, '2024-03-20 01:13:46', '2024-03-20 01:13:46'),
(3, 'Men Regular Collar Casual Shirt', 'men-regular-collar-casual-shirt', 'uploads/media_65fa88e97e82e.png', 1, 1, 1, 1, 4, 98745612, 'Elevate your casual wardrobe with our Men\'s Regular Fit Solid Button Down Collar Casual Shirt. Crafted for both comfort and style, this shirt features a classic button-down collar and a regular fit that ensures a flattering silhouette. Whether you\'re dressing up for a casual outing or keeping it relaxed at work, this versatile shirt is a perfect choice. Made with high-quality materials, it offers both durability and comfort throughout the day. Pair it with your favorite jeans or chinos for a timeless and polished look.', '<div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 797.662px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif;\"><div class=\"col col-11-12 _2cLjiM\" style=\"margin: 0px; padding: 32px 0px 32px 24px; width: 731.138px; display: inline-block; vertical-align: top; font-size: 24px;\">Product Details</div><div class=\"col col-1-12 _2jufoV\" style=\"margin: 0px; padding: 40px 24px 0px 0px; width: 66.4375px; display: inline-block; vertical-align: top; text-align: center;\"><img src=\"data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNCIgaGVpZ2h0PSIyIj48cGF0aCBmaWxsPSIjODc4Nzg3IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0wIDJWMGgxNHYyeiIvPjwvc3ZnPg==\" style=\"margin: 0px; padding: 0px; color: inherit; border-width: initial; border-color: initial; border-image: initial; outline: none;\"></div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 797.662px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif;\"><div class=\"row _1v8OXw\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 797.662px;\"><div class=\"X3BRps _13swYk\" style=\"margin: 0px; padding: 0px 24px; width: 797.662px; max-height: 344px; overflow: hidden; position: relative;\"><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Type</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">Polo Neck</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Sleeve</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">Half Sleeve</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Fit</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">Regular</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Fabric</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">Polyester</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Sales Package</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">1 T shirt</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Pack of</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">1</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Style Code</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">TS36</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Neck Type</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">Polo Neck</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Ideal For</div></div></div></div></div>', NULL, '789456123', 1999, 399, '2024-03-21', '2024-05-03', 'new_arrival', 1, 1, NULL, NULL, '2024-03-20 01:27:45', '2024-03-20 17:39:59'),
(4, 'Pack of 2 Printed Men Boxer', 'pack-of-2-printed-men-boxer', 'uploads/media_65fa8b1790dbb.png', 1, 1, 4, NULL, 5, 14, 'Material: Made from a premium blend of cotton and spandex for the perfect combination of comfort and stretch.\r\nCare: Machine wash cold with like colors. Tumble dry low. Do not bleach. Iron on low heat if needed. Enjoy effortless maintenance for your favorite pair of boxers.', '<div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 603.2px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 150.8px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Color</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 452.4px; display: inline-block; vertical-align: top;\">Dark Green, Dark Blue</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 603.2px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 150.8px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Fabric</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 452.4px; display: inline-block; vertical-align: top;\">Pure Cotton</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 603.2px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 150.8px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Pattern</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 452.4px; display: inline-block; vertical-align: top;\">Printed</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 603.2px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 150.8px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Sales Package</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 452.4px; display: inline-block; vertical-align: top;\">2 Men\'s Boxers</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 603.2px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 150.8px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Style Code</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 452.4px; display: inline-block; vertical-align: top;\">WHITE-MBB-07.</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 603.2px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 150.8px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Other Details</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 452.4px; display: inline-block; vertical-align: top;\">Casual Pure Cotton Printed Boxers For Men</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 603.2px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 150.8px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Pack of</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 452.4px; display: inline-block; vertical-align: top;\">2</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 603.2px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 150.8px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Net Quantity</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 452.4px; display: inline-block; vertical-align: top;\">2</div></div>', NULL, '78945612', 249, 350, '2024-03-23', '2024-04-27', 'new_arrival', 1, 1, NULL, NULL, '2024-03-20 01:37:03', '2024-03-20 17:56:43'),
(5, 'Track Pant For Boys & Girls', 'track-pant-for-boys-girls', 'uploads/media_65fa8fa0637b7.png', 1, 4, 10, 3, 8, 56987412, 'Care:\r\nMachine wash cold with similar colors.\r\nTumble dry low.\r\nWarm iron if needed.\r\nAvoid dry cleaning to maintain the fabric\'s integrity.\r\nMedical Considerations:\r\nThese track pants are designed for general use and do not have specific medical properties.', '<div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 651.2px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif;\"><div class=\"col col-11-12 _2cLjiM\" style=\"margin: 0px; padding: 32px 0px 32px 24px; width: 596.888px; display: inline-block; vertical-align: top; font-size: 24px;\">Product Details</div><div class=\"col col-1-12 _2jufoV\" style=\"margin: 0px; padding: 40px 24px 0px 0px; width: 54.2375px; display: inline-block; vertical-align: top; text-align: center;\"><img src=\"data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNCIgaGVpZ2h0PSIyIj48cGF0aCBmaWxsPSIjODc4Nzg3IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0wIDJWMGgxNHYyeiIvPjwvc3ZnPg==\" style=\"margin: 0px; padding: 0px; color: inherit; border-width: initial; border-color: initial; border-image: initial; outline: none;\"></div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 651.2px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif;\"><div class=\"row _1v8OXw\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 651.2px;\"><div class=\"X3BRps _13swYk\" style=\"margin: 0px; padding: 0px 24px; width: 651.2px; max-height: 344px; overflow: hidden; position: relative;\"><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 603.2px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 150.8px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Number of Track Pants</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 452.4px; display: inline-block; vertical-align: top;\">6</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 603.2px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 150.8px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Brand</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 452.4px; display: inline-block; vertical-align: top;\">Twist Fab</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 603.2px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 150.8px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Style Code</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 452.4px; display: inline-block; vertical-align: top;\">Twistfab-01</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 603.2px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 150.8px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Brand Color</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 452.4px; display: inline-block; vertical-align: top;\">Multicolor</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 603.2px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 150.8px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Size</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 452.4px; display: inline-block; vertical-align: top;\">0 - 6 Months</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 603.2px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 150.8px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Fabric</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 452.4px; display: inline-block; vertical-align: top;\">Cotton Blend</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 603.2px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 150.8px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Primary Color</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 452.4px; display: inline-block; vertical-align: top;\">Multicolor</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 603.2px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 150.8px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Ideal For</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 452.4px; display: inline-block; vertical-align: top;\">Boys &amp; Girls</div></div></div></div></div>', NULL, '25836914', 300, 1200, '2024-03-25', '2024-05-17', 'new_arrival', 1, 1, NULL, NULL, '2024-03-20 01:56:24', '2024-03-20 01:56:24'),
(6, 'Girls Midi/Knee  Casual Dress', 'girls-midiknee-casual-dress', 'uploads/media_65fa9487255a9.png', 1, 4, 18, NULL, 7, 17, 'Indulge in the charm of our Girls Midi/Knee-Length Casual Dress, a delightful addition to your little one\'s wardrobe. Designed for comfort and style, this dress effortlessly blends playful elegance with everyday versatility. Its midi/knee-length silhouette offers a perfect balance, suitable for various occasions from casual outings to special events. Crafted from high-quality materials, it ensures a gentle touch against delicate skin while providing durability for active play. The vibrant colors and patterns add a fun and lively flair, appealing to young fashionistas.', '<div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 797.662px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif;\"><div class=\"col col-11-12 _2cLjiM\" style=\"margin: 0px; padding: 32px 0px 32px 24px; width: 731.138px; display: inline-block; vertical-align: top; font-size: 24px;\">Product Details</div><div class=\"col col-1-12 _2jufoV\" style=\"margin: 0px; padding: 40px 24px 0px 0px; width: 66.4375px; display: inline-block; vertical-align: top; text-align: center;\"><img src=\"data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNCIgaGVpZ2h0PSIyIj48cGF0aCBmaWxsPSIjODc4Nzg3IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0wIDJWMGgxNHYyeiIvPjwvc3ZnPg==\" style=\"margin: 0px; padding: 0px; color: inherit; border-width: initial; border-color: initial; border-image: initial; outline: none;\"></div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 797.662px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif;\"><div class=\"row _1v8OXw\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 797.662px;\"><div class=\"X3BRps _13swYk\" style=\"margin: 0px; padding: 0px 24px; width: 797.662px; max-height: 344px; overflow: hidden; position: relative;\"><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Brand</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">NautiNati</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Style Code</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">NN301-093--</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Brand Color</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">Navy Blue</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Size</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">6 - 12 Months</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Type</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">A- Line Dress</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Occasion</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">Casual</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Ideal For</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">Girls</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Pattern</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">Embroidered</div></div></div></div></div>', NULL, '789456123', 850, 900, '2024-03-23', '2024-04-20', 'new_arrival', 1, 1, NULL, NULL, '2024-03-20 02:17:19', '2024-03-20 17:56:58'),
(7, 'Girls Casual Top Shorts', 'girls-casual-top-shorts', 'uploads/media_65fb7088eed2e.png', 1, 4, 3, 8, 2, 15, 'Upgrade her casual wardrobe with our Girls Casual Top Shorts set, combining comfort and style effortlessly. Crafted from high-quality, breathable fabrics, the top features trendy designs while the shorts offer a snug yet flexible fit. Perfect for playdates, outings, or lounging at home, this set promises versatility and charm for your little one\'s everyday wear', '<div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 797.662px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif;\"><div class=\"col col-11-12 _2cLjiM\" style=\"margin: 0px; padding: 32px 0px 32px 24px; width: 731.138px; display: inline-block; vertical-align: top; font-size: 24px;\">Product Details</div><div class=\"col col-1-12 _2jufoV\" style=\"margin: 0px; padding: 40px 24px 0px 0px; width: 66.4375px; display: inline-block; vertical-align: top; text-align: center;\"><img src=\"data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNCIgaGVpZ2h0PSIyIj48cGF0aCBmaWxsPSIjODc4Nzg3IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0wIDJWMGgxNHYyeiIvPjwvc3ZnPg==\" style=\"margin: 0px; padding: 0px; color: inherit; border-width: initial; border-color: initial; border-image: initial; outline: none;\"></div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 797.662px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif;\"><div class=\"row _1v8OXw\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 797.662px;\"><div class=\"X3BRps _13swYk\" style=\"margin: 0px; padding: 0px 24px; width: 797.662px; max-height: 344px; overflow: hidden; position: relative;\"><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Sales Package</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">TOP + Shorts</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Brand</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">Haafa</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Style code</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">V White</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Size</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">2 - 3 Years</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Brand color</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">White</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Label size</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">3</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Ideal for</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">Girls</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.662px;\"><div class=\"col col-3-12 _2H87wv\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.413px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Primary product type</div><div class=\"col col-9-12 _2vZqPX\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.237px; display: inline-block; vertical-align: top;\">Top</div></div></div></div></div>', NULL, '78945613', 1000, 699, '2024-03-21', '2024-03-21', 'new_arrival', 1, 1, NULL, NULL, '2024-03-20 17:56:00', '2024-03-20 17:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_image_galleries`
--

CREATE TABLE `product_image_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_review_galleries`
--

CREATE TABLE `product_review_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_review_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variant_items`
--

CREATE TABLE `product_variant_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_variant_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `is_default` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `razorpay_settings`
--

CREATE TABLE `razorpay_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `currency_name` varchar(255) NOT NULL,
  `currency_rate` double NOT NULL,
  `razorpay_key` text NOT NULL,
  `razorpay_secret_key` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_rules`
--

CREATE TABLE `shipping_rules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `min_cost` double DEFAULT NULL,
  `cost` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner` text DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `starting_price` varchar(255) DEFAULT NULL,
  `btn_url` varchar(255) DEFAULT NULL,
  `serial` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stripe_settings`
--

CREATE TABLE `stripe_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `mode` tinyint(1) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `currency_name` varchar(255) NOT NULL,
  `currency_rate` double NOT NULL,
  `client_id` text NOT NULL,
  `secret_key` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `thumb_image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `thumb_image`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/media_65fb3eeaf0c47.jpg', 'T-shirts', 't-shirts', 1, '2024-03-20 14:24:18', '2024-03-20 14:24:18'),
(2, 3, 'uploads/media_65fb41a782290.jpg', 'dupatta', 'dupatta', 1, '2024-03-20 14:35:59', '2024-03-20 14:35:59'),
(3, 4, 'uploads/media_65fb465a3fe59.jpg', 'Infant', 'infant', 1, '2024-03-20 14:56:02', '2024-03-20 14:56:02'),
(4, 1, 'uploads/media_65fb4aa2863c5.jpg', 'Bottom-wear', 'bottom-wear', 1, '2024-03-20 15:14:18', '2024-03-20 15:14:18'),
(5, 1, 'uploads/media_65fb4abbd3833.jpg', 'Jackets', 'jackets', 1, '2024-03-20 15:14:43', '2024-03-20 15:14:43'),
(6, 1, 'uploads/media_65fb4ad32b85a.jpg', 'Shirts', 'shirts', 1, '2024-03-20 15:15:07', '2024-03-20 15:15:07'),
(7, 1, 'uploads/media_65fb4af2ea463.jpg', 'Waistcoat', 'waistcoat', 1, '2024-03-20 15:15:38', '2024-03-20 15:15:38'),
(8, 1, 'uploads/media_65fb4b2369d6b.jpg', 'Swetter', 'swetter', 1, '2024-03-20 15:16:27', '2024-03-20 15:16:27'),
(9, 1, 'uploads/media_65fb4b5197292.png', 'Bottomwear', 'bottomwear', 1, '2024-03-20 15:17:13', '2024-03-20 15:17:13'),
(10, 3, 'uploads/media_65fb6a9fb4a65.jpg', 'Women-Bottom-Wear', 'women-bottom-wear', 1, '2024-03-20 17:30:47', '2024-03-20 17:30:47'),
(11, 3, 'uploads/media_65fb6ad541fff.jpg', 'Kurtas', 'kurtas', 1, '2024-03-20 17:31:41', '2024-03-20 17:31:41'),
(12, 3, 'uploads/media_65fb6aeb554c9.jpg', 'saree', 'saree', 1, '2024-03-20 17:32:03', '2024-03-20 17:32:03'),
(13, 3, 'uploads/media_65fb6afe650ae.jpg', 'Skirts', 'skirts', 1, '2024-03-20 17:32:22', '2024-03-20 17:32:22'),
(14, 3, 'uploads/media_65fb6b11bca1c.jpg', 'Tops', 'tops', 1, '2024-03-20 17:32:41', '2024-03-20 17:32:41'),
(15, 3, 'uploads/media_65fb6b29929d6.jpg', 'Winter', 'winter', 1, '2024-03-20 17:33:05', '2024-03-20 17:33:05'),
(16, 4, 'uploads/media_65fb6b4751d6d.jpg', 'Combo-Set', 'combo-set', 1, '2024-03-20 17:33:35', '2024-03-20 17:33:35'),
(17, 4, 'uploads/media_65fb6b680164c.jpg', 'Shorts', 'shorts', 1, '2024-03-20 17:34:08', '2024-03-20 17:34:08'),
(18, 4, 'uploads/media_65fb6b8988678.jpg', 'Ethnic-Wear', 'ethnic-wear', 1, '2024-03-20 17:34:41', '2024-03-20 17:34:41'),
(19, 4, 'uploads/media_65fb6ba60b7be.jpg', 'Track-Pants', 'track-pants', 1, '2024-03-20 17:35:10', '2024-03-20 17:35:10'),
(20, 4, 'uploads/media_65fb6bc4ec8ff.jpg', 'Inner-wear', 'inner-wear', 1, '2024-03-20 17:35:40', '2024-03-20 17:35:40'),
(21, 4, 'uploads/media_65fb6bfacff33.jpg', 'Kids T-Shirts', 'kids-t-shirts', 1, '2024-03-20 17:36:34', '2024-03-20 17:36:34'),
(22, 5, 'uploads/media_65fb744c1580b.png', 'New Arrivals', 'new-arrivals', 1, '2024-03-20 18:12:04', '2024-03-20 18:12:04'),
(23, 5, 'uploads/media_65fb746480283.png', 'Hot Sales', 'hot-sales', 1, '2024-03-20 18:12:28', '2024-03-20 18:12:28'),
(24, 6, 'uploads/media_65fb748623821.png', 'Winter Collection', 'winter-collection', 1, '2024-03-20 18:13:02', '2024-03-20 18:13:02'),
(25, 6, 'uploads/media_65fb74a297114.png', 'Summer Collections', 'summer-collections', 1, '2024-03-20 18:13:30', '2024-03-20 18:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions`
--

CREATE TABLE `terms_and_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `amount_real_currency` double NOT NULL,
  `amount_real_currency_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','vendor','user') NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `image`, `phone`, `email`, `role`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin user', 'adminuser', '/uploads/1402625112_profile-pic.png', NULL, 'admin@gmail.com', 'admin', 'active', NULL, '$2y$12$NNqhwsp9bZTrob2/02R51urDL0kSDEqBMwFL6dtn51yme/AmrJA3K', NULL, NULL, '2024-03-20 17:29:14'),
(2, 'Vendor user', 'vendoruser', NULL, NULL, 'vendor@gmail.com', 'vendor', 'active', NULL, '$2y$12$hyTwSYN2WPYP4Wo4GNtDbe83Mj/2xAogbACU6wk6mb6pJNoGA0T66', NULL, NULL, NULL),
(3, 'user', 'user', NULL, NULL, 'user@gmail.com', 'user', 'active', NULL, '$2y$12$3p9XBAsKpq/uChvMrOZPRuwWQGQ5p1neZGY2jDWGeJ6tgvOGRgjOu', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `description` text NOT NULL,
  `fb_link` text DEFAULT NULL,
  `tw_link` text DEFAULT NULL,
  `insta_link` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `banner`, `phone`, `email`, `address`, `description`, `fb_link`, `tw_link`, `insta_link`, `user_id`, `status`, `created_at`, `updated_at`, `shop_name`) VALUES
(1, 'uploads/1343.jpg', '12321312', 'admin@gmail.com', 'Usa', 'shop description', NULL, NULL, NULL, 1, 0, '2024-03-17 14:59:08', '2024-03-17 14:59:08', NULL),
(2, 'uploads/1343.jpg', '12321312', 'vendor@gmail.com', 'Usa', 'shop description', NULL, NULL, NULL, 2, 1, '2024-03-17 14:59:08', '2024-03-17 14:59:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_conditions`
--

CREATE TABLE `vendor_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adverisements`
--
ALTER TABLE `adverisements`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_categories`
--
ALTER TABLE `child_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cod_settings`
--
ALTER TABLE `cod_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_configurations`
--
ALTER TABLE `email_configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `flash_sales`
--
ALTER TABLE `flash_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flash_sale_items`
--
ALTER TABLE `flash_sale_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_grid_threes`
--
ALTER TABLE `footer_grid_threes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_grid_twos`
--
ALTER TABLE `footer_grid_twos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_infos`
--
ALTER TABLE `footer_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_socials`
--
ALTER TABLE `footer_socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_titles`
--
ALTER TABLE `footer_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_settings`
--
ALTER TABLE `home_page_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo_settings`
--
ALTER TABLE `logo_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `paypal_settings`
--
ALTER TABLE `paypal_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image_galleries`
--
ALTER TABLE `product_image_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_review_galleries`
--
ALTER TABLE `product_review_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variant_items`
--
ALTER TABLE `product_variant_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `razorpay_settings`
--
ALTER TABLE `razorpay_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_rules`
--
ALTER TABLE `shipping_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stripe_settings`
--
ALTER TABLE `stripe_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_conditions`
--
ALTER TABLE `vendor_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adverisements`
--
ALTER TABLE `adverisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `child_categories`
--
ALTER TABLE `child_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cod_settings`
--
ALTER TABLE `cod_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_configurations`
--
ALTER TABLE `email_configurations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flash_sales`
--
ALTER TABLE `flash_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flash_sale_items`
--
ALTER TABLE `flash_sale_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_grid_threes`
--
ALTER TABLE `footer_grid_threes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_grid_twos`
--
ALTER TABLE `footer_grid_twos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_infos`
--
ALTER TABLE `footer_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_socials`
--
ALTER TABLE `footer_socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_titles`
--
ALTER TABLE `footer_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_page_settings`
--
ALTER TABLE `home_page_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logo_settings`
--
ALTER TABLE `logo_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paypal_settings`
--
ALTER TABLE `paypal_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_image_galleries`
--
ALTER TABLE `product_image_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_review_galleries`
--
ALTER TABLE `product_review_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_variant_items`
--
ALTER TABLE `product_variant_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `razorpay_settings`
--
ALTER TABLE `razorpay_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_rules`
--
ALTER TABLE `shipping_rules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stripe_settings`
--
ALTER TABLE `stripe_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor_conditions`
--
ALTER TABLE `vendor_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
