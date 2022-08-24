-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 30, 2022 at 10:47 AM
-- Server version: 10.3.34-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matrix`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `feature` tinyint(1) NOT NULL DEFAULT 0,
  `feature_position` int(11) NOT NULL DEFAULT 1000,
  `for` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'product',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position` int(11) DEFAULT 1000,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `background_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `status`, `feature`, `feature_position`, `for`, `title`, `slug`, `short_description`, `description`, `category_id`, `position`, `featured`, `meta_title`, `meta_description`, `meta_tags`, `image`, `media_id`, `background_color`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 1000, 'blog', 'Test category', NULL, 'Test category', '<p>Test category</p>', NULL, 1000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-11 13:29:08', '2021-12-11 13:29:08'),
(2, 1, 0, 1000, 'blog', 'Consequatur do quis', NULL, 'Omnis repellendus E', NULL, NULL, 1000, 0, 'Beatae ut aliquip ni', 'Temporibus rerum eu', 'Voluptates minim omn', '2022/01/1642348136.jpg', 86, NULL, NULL, '2022-01-17 04:48:57', '2022-01-17 04:48:57'),
(3, 1, 0, 1000, 'blog', 'Voluptatem voluptate', NULL, 'Commodo officia sunt', NULL, NULL, 1000, 0, 'Dolorem soluta dolor', 'Magni nisi necessita', 'Officiis omnis eius', NULL, NULL, NULL, NULL, '2022-01-17 04:51:34', '2022-05-15 12:25:32'),
(4, 1, 0, 1000, 'gallery', 'Test Medias', NULL, NULL, NULL, NULL, 1000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-03 09:38:25', '2022-05-12 06:34:12'),
(5, 1, 0, 1000, 'blog2', 'Category ond', NULL, 'Category ond', '<p>Category ond</p>', NULL, 1000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-10 10:43:01', '2022-05-10 10:43:01'),
(6, 1, 0, 1000, 'product', 'Category test', NULL, 'Category test', '<p>Category test</p>', NULL, 1000, 0, 'cat', 'cat', 'cat', '2022/05/1652180244.png', 141, NULL, NULL, '2022-05-10 10:57:24', '2022-05-10 10:57:24'),
(7, 1, 0, 1000, 'product', 'category two', NULL, NULL, '<p>category two</p>', NULL, 1000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-10 10:57:56', '2022-05-10 10:57:56'),
(8, 1, 0, 1000, 'blog2', 'Blog Category', NULL, 'Blog Category', '<p>Blog Category</p>', NULL, 1000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-10 11:07:41', '2022-05-10 11:07:41'),
(9, 1, 0, 1000, 'gallery', 'Test category', NULL, NULL, NULL, NULL, 1000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-12 06:35:07', '2022-05-12 06:35:07'),
(10, 1, 0, 1000, 'newsevent', 'News Event Categi', NULL, NULL, NULL, NULL, 1000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-15 06:21:33', '2022-05-15 07:03:50'),
(11, 1, 0, 1000, 'gallery', 'Event Category', 'event-category', NULL, NULL, NULL, 1000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-15 06:47:31', '2022-05-15 06:47:31'),
(12, 1, 0, 1000, 'newsevent', 'New Category', 'new-category', NULL, NULL, NULL, 1000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-15 06:48:35', '2022-05-15 06:48:35'),
(13, 1, 0, 1000, 'newsevent', 'news', 'news-cat', NULL, NULL, NULL, 1000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-15 06:48:49', '2022-05-15 06:48:49'),
(14, 1, 0, 1000, 'newsevent', 'Category one', 'category-one', NULL, NULL, NULL, 1000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-15 07:08:43', '2022-05-15 07:08:43'),
(15, 1, 0, 1000, 'news', 'News Categorys', 'news-category', NULL, NULL, NULL, 1000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-15 09:43:56', '2022-05-15 09:44:03'),
(16, 1, 0, 1000, 'news', 'Cat two', 'cat-two', NULL, NULL, NULL, 1000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-15 11:51:09', '2022-05-15 11:51:09'),
(17, 1, 0, 1000, 'product', 'Product tests', 'product-test', NULL, NULL, NULL, 1000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-21 12:16:12', '2022-05-21 12:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 7, 0, NULL, NULL),
(2, 6, 0, NULL, NULL),
(3, 17, 0, NULL, NULL),
(4, 7, 0, NULL, NULL),
(5, 6, 0, NULL, NULL),
(6, 7, 16, NULL, NULL),
(7, 6, 16, NULL, NULL),
(8, 7, 17, NULL, NULL),
(9, 6, 17, NULL, NULL),
(10, 7, 18, NULL, NULL),
(11, 6, 18, NULL, NULL),
(12, 7, 19, NULL, NULL),
(13, 6, 19, NULL, NULL),
(16, 7, 9, NULL, NULL),
(18, 6, 1, NULL, NULL),
(19, 7, 22, NULL, NULL),
(20, 6, 22, NULL, NULL),
(21, 7, 23, NULL, NULL),
(22, 6, 23, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `title`, `description`, `image`, `image_path`, `media_id`, `status`, `position`, `created_at`, `updated_at`) VALUES
(2, 'live site', '<p>live site</p>', '1653309372.png', '2022/05', 173, 1, '5', '2022-05-23 12:11:23', '2022-05-23 12:36:12'),
(3, 'Test Images', '<p>Hello wold</p>', '1653308694.png', '2022/05', 172, 1, '7', '2022-05-23 12:15:40', '2022-05-23 12:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customers` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emails` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `customers`, `emails`, `subject`, `body`, `created_at`, `updated_at`) VALUES
(1, '[7]', '[\"shahzadpursangbad@gmail.com\"]', 'dsf', '<p>dsfd</p>', '2022-01-17 05:01:06', '2022-01-17 05:01:06');

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
  `question` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `position` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Doloremque dolorem sit ipsa recusandae eum ut natus aliquam. Sunt itaque hic repellendus laboriosam. Nemo commodi deleniti ea.', 'Delectus quasi dolorem quia doloribus fugiat quae. Nostrum doloremque est quia dolor. Beatae iusto consequatur voluptatem tempora eaque.', 1, 1, '2022-05-24 11:34:20', '2022-05-24 11:34:20'),
(2, 'Perspiciatis odio sed non sit. Commodi ut ipsa nam nobis. Dolores itaque ut dolores quod voluptates omnis ut.', 'Eius minus eligendi recusandae enim. Ut officia aut praesentium molestiae. Nulla nulla et eum harum.', 1, 2, '2022-05-24 11:34:20', '2022-05-24 11:34:20'),
(3, 'In aliquam nihil commodi repellat ut. Vero earum perferendis ea ab et. Rerum officiis repellendus autem et et. Illum repellendus consequuntur amet nesciunt.', 'Placeat accusamus voluptas tempore et. Quas nihil sit nobis voluptatibus recusandae officiis vero. Dolorem illum doloribus fugit quia unde non aliquam sed.', 1, 3, '2022-05-24 11:34:20', '2022-05-24 11:34:20'),
(4, 'At qui quas assumenda. Facere fugiat minima ipsa quibusdam explicabo ducimus ipsa. Itaque autem voluptates tempora.', 'Sapiente qui voluptates commodi in doloribus. Tempora facilis ducimus ad laudantium hic alias eveniet qui. Animi eius voluptas rem in modi sunt omnis voluptas.', 1, 4, '2022-05-24 11:34:20', '2022-05-24 11:34:20'),
(5, 'Et est ab perferendis asperiores velit quia. Voluptatem quasi fugiat quos aut. Nam qui minima ipsa iusto veniam cumque. Voluptas sint ratione qui.', 'Eius consequuntur sit atque repellendus illo. Qui asperiores voluptas accusantium minus eligendi. Beatae nam voluptates qui perspiciatis.', 1, 5, '2022-05-24 11:34:20', '2022-05-24 11:34:20'),
(6, 'Omnis voluptas enim ullam accusantium vero corporis aspernatur. Iure neque error et magnam porro suscipit ex.', 'Qui blanditiis repudiandae omnis at corporis omnis. Aut aperiam quidem dicta corporis recusandae qui. Distinctio ut cupiditate veniam eius mollitia nesciunt non.', 1, 6, '2022-05-24 11:34:20', '2022-05-24 11:34:20'),
(7, 'Sed voluptas ut amet illum ipsam laboriosam. Consequatur pariatur quaerat quia eos. Rerum facere suscipit dolor dolorem sed. Ut quibusdam quibusdam nulla consequatur.', 'Dicta sint officia omnis quisquam eligendi. Facere eligendi repellendus aut suscipit aut. Perferendis autem odit nesciunt assumenda necessitatibus et ipsam vel.', 1, 7, '2022-05-24 11:34:20', '2022-05-24 11:34:20'),
(8, 'Asperiores dignissimos et nobis mollitia. Blanditiis debitis quis ut sit. Maxime eos error ut quia. Deserunt esse voluptate sint nostrum enim ut ex.', 'Consequatur vitae maxime est. Eos molestiae velit maxime ab asperiores. Quo aut autem veniam inventore. Hic doloribus dolorum voluptatem aliquid.', 1, 8, '2022-05-24 11:34:20', '2022-05-24 11:34:20'),
(9, 'Necessitatibus quo molestias et quidem qui. Qui culpa corporis fugiat ipsam sit. Pariatur dolor officia similique voluptatem iusto minima. Consectetur placeat corporis nostrum optio.', 'Explicabo minima corrupti maxime qui placeat illo. Suscipit neque et amet maiores. Suscipit laboriosam eveniet perferendis fuga inventore sunt. Accusantium molestiae fugit et ut consectetur.', 1, 9, '2022-05-24 11:34:20', '2022-05-24 11:34:20'),
(10, 'Doloremque ut doloremque ut sed repellendus. Pariatur velit consequatur sint sint earum quod reiciendis earum. Expedita praesentium qui aut error deserunt.', 'Et et quaerat reiciendis quae. Est sed animi qui eligendi dolorum. Cupiditate libero eveniet consectetur voluptates.', 1, 10, '2022-05-24 11:34:20', '2022-05-24 11:34:20'),
(11, 'Test Questions', '<p>Test Answer</p>', 1, 11, '2022-05-24 12:32:19', '2022-05-24 12:34:16');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 100,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `status`, `name`, `position`, `category_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'dg', 46546, 4, NULL, '2022-01-17 04:55:47', '2022-02-03 09:38:33'),
(2, 1, 'Test Gallery', 2, 4, NULL, '2022-04-03 08:58:02', '2022-04-03 08:58:02'),
(3, 1, 'Gallery Three', 3, 4, NULL, '2022-04-03 08:58:22', '2022-04-03 08:58:22'),
(4, 1, 'Gallery Four', 4, 4, NULL, '2022-04-03 08:58:35', '2022-04-03 08:58:35'),
(5, 1, 'Gallery 5 Gallery 5 Gallery 5 Gallery 5 Gallery 5', 5, NULL, NULL, '2022-04-03 08:58:46', '2022-04-06 10:39:13'),
(6, 1, 'Documents', 6, 4, NULL, '2022-05-12 06:28:35', '2022-05-12 06:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_items`
--

CREATE TABLE `gallery_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_embade_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=image,2=video,3=embade_code,4=pdf_file',
  `position` int(11) NOT NULL DEFAULT 100,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_items`
--

INSERT INTO `gallery_items` (`id`, `title`, `gallery_id`, `description`, `image`, `video`, `video_embade_code`, `pdf_file`, `type`, `position`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, NULL, '1643881072.jpeg', NULL, NULL, NULL, 1, 100, '2022-02-16 20:03:44', '2022-02-03 09:37:52', '2022-02-16 20:03:44'),
(2, NULL, 1, NULL, '1643881072.jpeg', NULL, NULL, NULL, 1, 100, '2022-02-16 20:03:49', '2022-02-03 09:37:52', '2022-02-16 20:03:49'),
(3, NULL, 1, NULL, '1645020239.jpeg', NULL, NULL, NULL, 1, 100, '2022-04-04 03:22:53', '2022-02-16 20:03:59', '2022-04-04 03:22:53'),
(4, NULL, 1, NULL, '1645020244.jpeg', NULL, NULL, NULL, 1, 100, '2022-04-04 03:22:56', '2022-02-16 20:04:04', '2022-04-04 03:22:56'),
(5, NULL, 1, NULL, '1645020252.jpeg', NULL, NULL, NULL, 1, 100, '2022-04-04 03:22:59', '2022-02-16 20:04:12', '2022-04-04 03:22:59'),
(6, NULL, 1, NULL, '1648974988.png', NULL, NULL, NULL, 1, 0, NULL, '2022-04-03 08:36:29', '2022-04-04 03:23:01'),
(7, NULL, 1, NULL, '1648974989.png', NULL, NULL, NULL, 1, 1, NULL, '2022-04-03 08:36:29', '2022-04-04 03:23:01'),
(8, NULL, 1, NULL, '1648974989.png', NULL, NULL, NULL, 1, 2, NULL, '2022-04-03 08:36:29', '2022-04-04 03:23:01'),
(9, NULL, 1, NULL, '1648974989.png', NULL, NULL, NULL, 1, 3, NULL, '2022-04-03 08:36:30', '2022-04-04 03:23:01'),
(10, NULL, 1, NULL, '1648974990.png', NULL, NULL, NULL, 1, 4, NULL, '2022-04-03 08:36:30', '2022-04-04 03:23:01'),
(11, NULL, 1, NULL, '1648974990.png', NULL, NULL, NULL, 1, 5, NULL, '2022-04-03 08:36:31', '2022-04-04 03:23:01'),
(12, 'image one 1', 5, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '1649655141.png', NULL, NULL, NULL, 1, 0, NULL, '2022-04-04 03:18:37', '2022-04-11 05:32:21'),
(13, 'Image one', 5, '<p>hello world</p>', '1649042317.jpg', NULL, NULL, NULL, 1, 1, NULL, '2022-04-04 03:18:37', '2022-04-11 05:34:46'),
(14, 'image two', 5, '<p>Hello image</p>', '1649655216.png', NULL, NULL, NULL, 1, 2, NULL, '2022-04-04 03:18:38', '2022-04-11 05:33:37'),
(15, NULL, 4, NULL, '1649042341.png', NULL, NULL, NULL, 1, 100, NULL, '2022-04-04 03:19:01', '2022-04-04 03:19:01'),
(16, NULL, 4, NULL, '1649042341.jpeg', NULL, NULL, NULL, 1, 100, NULL, '2022-04-04 03:19:02', '2022-04-04 03:19:02'),
(17, NULL, 3, NULL, '1649042403.jpg', NULL, NULL, NULL, 1, 100, NULL, '2022-04-04 03:20:03', '2022-04-04 03:20:03'),
(18, NULL, 3, NULL, '1649042404.png', NULL, NULL, NULL, 1, 100, NULL, '2022-04-04 03:20:04', '2022-04-04 03:20:04'),
(19, NULL, 3, NULL, '1649042404.png', NULL, NULL, NULL, 1, 100, NULL, '2022-04-04 03:20:05', '2022-04-04 03:20:05'),
(20, NULL, 2, NULL, '1649042443.jpg', NULL, NULL, NULL, 1, 100, NULL, '2022-04-04 03:20:43', '2022-04-04 03:20:43'),
(21, NULL, 2, NULL, '1649042443.png', NULL, NULL, NULL, 1, 100, NULL, '2022-04-04 03:20:43', '2022-04-04 03:20:43'),
(22, NULL, 5, NULL, '1649046089.png', NULL, NULL, NULL, 1, 100, '2022-04-04 04:25:28', '2022-04-04 04:21:30', '2022-04-04 04:25:28'),
(23, NULL, 5, NULL, '1649046090.png', NULL, NULL, NULL, 1, 100, '2022-04-04 04:25:25', '2022-04-04 04:21:31', '2022-04-04 04:25:25'),
(24, NULL, 5, NULL, '1649046091.jpeg', NULL, NULL, NULL, 1, 100, '2022-04-04 04:25:21', '2022-04-04 04:21:31', '2022-04-04 04:25:21'),
(25, 'image three', 5, NULL, '1649051658.png', NULL, NULL, NULL, 1, 3, NULL, '2022-04-04 05:54:18', '2022-04-04 10:13:22'),
(26, 'image four', 5, NULL, '1649051658.png', NULL, NULL, NULL, 1, 4, NULL, '2022-04-04 05:54:19', '2022-04-04 10:13:29'),
(27, 'Vedeo 1', 5, NULL, NULL, '/uploads/gallery/video/1649051715_video.mp4', NULL, NULL, 2, 5, NULL, '2022-04-04 05:55:15', '2022-04-11 04:28:51'),
(28, 'Gojol', 5, '<p>embedded code change</p>', NULL, NULL, '<iframe width=\"364\" height=\"240\" src=\"https://www.youtube.com/embed/utGiplsKBkU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, 3, 6, NULL, '2022-04-04 05:57:03', '2022-04-11 06:09:06'),
(29, 'Pdf test', 5, '<p>pdf file change</p>', NULL, NULL, NULL, '/uploads/gallery/pdf/1649657246_1wds (4).pdf', 4, 7, NULL, '2022-04-04 06:24:44', '2022-04-11 06:07:26'),
(30, NULL, 6, NULL, '1652337782.png', NULL, NULL, NULL, 1, 0, NULL, '2022-05-12 06:43:02', '2022-05-12 08:36:03'),
(31, NULL, 6, NULL, '1652337782.png', NULL, NULL, NULL, 1, 3, NULL, '2022-05-12 06:43:03', '2022-05-12 08:36:09'),
(32, NULL, 6, NULL, '1652337783.png', NULL, NULL, NULL, 1, 2, NULL, '2022-05-12 06:43:03', '2022-05-12 08:36:09'),
(33, NULL, 6, NULL, '1652337783.png', NULL, NULL, NULL, 1, 1, NULL, '2022-05-12 06:43:03', '2022-05-12 08:36:03'),
(34, NULL, 6, NULL, '1653282369.png', NULL, NULL, NULL, 1, 100, NULL, '2022-05-23 05:06:10', '2022-05-23 05:06:10'),
(35, NULL, 6, NULL, '1653282370.png', NULL, NULL, NULL, 1, 100, NULL, '2022-05-23 05:06:10', '2022-05-23 05:06:10'),
(36, NULL, 19, NULL, '1653295811.png', NULL, NULL, NULL, 1, 100, NULL, '2022-05-23 08:50:12', '2022-05-23 08:50:12'),
(37, NULL, 19, NULL, '1653295812.png', NULL, NULL, NULL, 1, 100, NULL, '2022-05-23 08:50:12', '2022-05-23 08:50:12'),
(38, NULL, 19, NULL, '1653295812.png', NULL, NULL, NULL, 1, 100, NULL, '2022-05-23 08:50:12', '2022-05-23 08:50:12'),
(39, NULL, 19, NULL, '1653296071.png', NULL, NULL, NULL, 1, 100, NULL, '2022-05-23 08:54:31', '2022-05-23 08:54:31'),
(40, NULL, 19, NULL, '1653296071.png', NULL, NULL, NULL, 1, 100, NULL, '2022-05-23 08:54:31', '2022-05-23 08:54:31'),
(41, NULL, 19, NULL, '1653296071.png', NULL, NULL, NULL, 1, 100, NULL, '2022-05-23 08:54:32', '2022-05-23 08:54:32'),
(42, NULL, 19, NULL, '1653297604.png', NULL, NULL, NULL, 1, 100, NULL, '2022-05-23 09:20:05', '2022-05-23 09:20:05'),
(43, NULL, 19, NULL, '1653297605.png', NULL, NULL, NULL, 1, 100, NULL, '2022-05-23 09:20:05', '2022-05-23 09:20:05'),
(44, NULL, 19, NULL, '1653297605.png', NULL, NULL, NULL, 1, 100, NULL, '2022-05-23 09:20:05', '2022-05-23 09:20:05'),
(45, NULL, 19, NULL, '1653297605.png', NULL, NULL, NULL, 1, 100, NULL, '2022-05-23 09:20:06', '2022-05-23 09:20:06'),
(46, NULL, 19, NULL, '1653297641.png', NULL, NULL, NULL, 1, 100, NULL, '2022-05-23 09:20:41', '2022-05-23 09:20:41'),
(47, NULL, 19, NULL, '1653297641.png', NULL, NULL, NULL, 1, 100, NULL, '2022-05-23 09:20:41', '2022-05-23 09:20:41'),
(48, NULL, 19, NULL, '1653297641.png', NULL, NULL, NULL, 1, 100, NULL, '2022-05-23 09:20:42', '2022-05-23 09:20:42'),
(49, NULL, 6, NULL, '1653371415.png', NULL, NULL, NULL, 1, 100, NULL, '2022-05-24 05:50:16', '2022-05-24 05:50:16'),
(50, NULL, 6, NULL, '1653371416.png', NULL, NULL, NULL, 1, 100, NULL, '2022-05-24 05:50:16', '2022-05-24 05:50:16'),
(51, NULL, 6, NULL, '1653371416.png', NULL, NULL, NULL, 1, 100, NULL, '2022-05-24 05:50:17', '2022-05-24 05:50:17'),
(52, NULL, 6, NULL, '1653389948.png', NULL, NULL, NULL, 1, 100, NULL, '2022-05-24 10:59:08', '2022-05-24 10:59:08'),
(53, NULL, 6, NULL, '1653389948.png', NULL, NULL, NULL, 1, 100, NULL, '2022-05-24 10:59:09', '2022-05-24 10:59:09'),
(54, NULL, 6, NULL, '1653389949.png', NULL, NULL, NULL, 1, 100, NULL, '2022-05-24 10:59:09', '2022-05-24 10:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `home_sections`
--

CREATE TABLE `home_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_background_color` tinyint(4) DEFAULT 1,
  `col` int(11) NOT NULL DEFAULT 1,
  `row` int(11) NOT NULL DEFAULT 3,
  `section_name_is_show` tinyint(1) NOT NULL DEFAULT 0,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_design_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 1000,
  `text_align` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=left,2=right',
  `is_image_inner_border` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `raised_amount` double DEFAULT NULL,
  `raised_percentage` double DEFAULT NULL,
  `parallax_option` tinyint(4) DEFAULT NULL COMMENT '1=vote,2=opinion',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_sections`
--

INSERT INTO `home_sections` (`id`, `section_name`, `background_color`, `background_image`, `is_background_color`, `col`, `row`, `section_name_is_show`, `title`, `sub_title`, `section_design_type_id`, `position`, `text_align`, `is_image_inner_border`, `image`, `image_path`, `media_id`, `short_description`, `description`, `button_name`, `button_url`, `raised_amount`, `raised_percentage`, `parallax_option`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(8, NULL, NULL, NULL, 1, 1, 3, 0, 'dsgfds', 'gfdsgfd', 2, 3, 1, 0, '1639033118.png', '2021/12', 17, '<p>gfdgfd</p>', '<p>gfdsgfdsgf</p>', 'gfdsgf', 'gfdsgf', NULL, NULL, NULL, 1, NULL, NULL, '2021-12-11 07:26:42', '2021-12-09 06:16:19', '2021-12-11 07:26:42'),
(9, NULL, NULL, NULL, 1, 1, 3, 0, 'dsads', 'dsdsa', 2, 5, 1, 0, '1639033106.jpg', '2021/12', 16, '<p>dsads</p>', '<p>dsadsads</p>', 'd', 'dsa', NULL, NULL, NULL, 1, 1, NULL, '2021-12-11 07:26:36', '2021-12-09 06:43:53', '2021-12-11 07:26:36'),
(10, NULL, NULL, NULL, 1, 1, 3, 0, 'Test', 'test', 3, 4, 1, 1, '1639032904.jpg', '2021/12', 15, '<p>dfsd afdsa fds</p>', '<p>fsa fdsa fdsa fd</p>', 'Donate', 'http://127.0.0.1:8000/', 20, 20, NULL, 1, 1, NULL, '2021-12-11 07:26:39', '2021-12-09 06:55:05', '2021-12-11 07:26:39'),
(11, NULL, NULL, NULL, 1, 1, 3, 0, 'OUR MISSION AND VISION STATEMENT', 'Test sub title', 1, 1, 1, 0, '1639033398.jpg', '2021/12', 18, '<p><span style=\"color: rgb(51, 51, 51);\">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad voluptatum labore commodi ex rerum tenetur veritatis ipsum libero, ullam dolorum tempore placeat beatae, corporis recusandae nostrum fuga quibusdam! Aperiam, beatae? Lorem ipsum dolor sit amet consectetur adipisicing elit.</span><br style=\"color: rgb(51, 51, 51);\"><br style=\"color: rgb(51, 51, 51);\"><span style=\"color: rgb(51, 51, 51);\">Ducimus sunt consequuntur sit repudiandae pariatur cupiditate numquam tempore rem impedit enim modi consectetur sequi, amet consectetur, adipisicing elit. Inventore possimus delectus quibusdam distinctio? Sint tempora Eaque, sapiente.</span><br style=\"color: rgb(51, 51, 51);\"><br style=\"color: rgb(51, 51, 51);\"><span style=\"color: rgb(51, 51, 51);\">Inventore possimus delectus quibusdam distinctio? Sint tempora aliquid earum labore error temporibus laudantium consequuntur provident facere. Fugiat laboriosam at labore? Eaque, sapiente.</span><br></p>', '<p><span style=\"color: rgb(51, 51, 51);\">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad voluptatum labore commodi ex rerum tenetur veritatis ipsum libero, ullam dolorum tempore placeat beatae, corporis recusandae nostrum fuga quibusdam! Aperiam, beatae? Lorem ipsum dolor sit amet consectetur adipisicing elit.</span><br style=\"color: rgb(51, 51, 51);\"><br style=\"color: rgb(51, 51, 51);\"><span style=\"color: rgb(51, 51, 51);\">Ducimus sunt consequuntur sit repudiandae pariatur cupiditate numquam tempore rem impedit enim modi consectetur sequi, amet consectetur, adipisicing elit. Inventore possimus delectus quibusdam distinctio? Sint tempora Eaque, sapiente.</span><br style=\"color: rgb(51, 51, 51);\"><br style=\"color: rgb(51, 51, 51);\"><span style=\"color: rgb(51, 51, 51);\">Inventore possimus delectus quibusdam distinctio? Sint tempora aliquid earum labore error temporibus laudantium consequuntur provident facere. Fugiat laboriosam at labore? Eaque, sapiente.</span><br></p>', 'CONTINUE READING', 'http://127.0.0.1:8000/', NULL, NULL, NULL, 1, 1, NULL, '2021-12-11 07:26:48', '2021-12-09 07:03:18', '2021-12-11 07:26:48'),
(12, NULL, NULL, NULL, 1, 1, 3, 0, 'MESSAGE FROM PRESIDENT', NULL, 1, 0, 2, 0, '1639033534.png', '2021/12', 19, '<p><span style=\"color: rgb(51, 51, 51);\">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis ad ratione voluptatibus veritatis, atque odio repellat provident at, doloremque officia aspernatur. Nesciunt inventore, quisquam quibusdam ut ipsum repellendus.</span><br style=\"color: rgb(51, 51, 51);\"><br style=\"color: rgb(51, 51, 51);\"><span style=\"color: rgb(51, 51, 51);\">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis ad ratione voluptatibus veritatis, atque odio repellat provident at, doloremque officia aspernatur. Nesciunt inventore, quisquam quibusdam ut ipsum repellendus.</span><br style=\"color: rgb(51, 51, 51);\"><br style=\"color: rgb(51, 51, 51);\"><span style=\"color: rgb(51, 51, 51);\">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis ad ratione voluptatibus veritatis, atque odio repellat provident at, doloremque officia aspernatur. Nesciunt inventore, quisquam quibusdam ut ipsum repellendus.</span><br></p>', '<p><span style=\"color: rgb(51, 51, 51);\">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis ad ratione voluptatibus veritatis, atque odio repellat provident at, doloremque officia aspernatur. Nesciunt inventore, quisquam quibusdam ut ipsum repellendus.</span><br style=\"color: rgb(51, 51, 51);\"><br style=\"color: rgb(51, 51, 51);\"><span style=\"color: rgb(51, 51, 51);\">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis ad ratione voluptatibus veritatis, atque odio repellat provident at, doloremque officia aspernatur. Nesciunt inventore, quisquam quibusdam ut ipsum repellendus.</span><br style=\"color: rgb(51, 51, 51);\"><br style=\"color: rgb(51, 51, 51);\"><span style=\"color: rgb(51, 51, 51);\">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis ad ratione voluptatibus veritatis, atque odio repellat provident at, doloremque officia aspernatur. Nesciunt inventore, quisquam quibusdam ut ipsum repellendus.</span><br></p>', 'CONTINUE READING', 'http://127.0.0.1:8000/', NULL, NULL, NULL, 1, 1, NULL, '2021-12-11 07:26:52', '2021-12-09 07:05:34', '2021-12-11 07:26:52'),
(13, NULL, NULL, NULL, 1, 1, 3, 0, 'Spread environmental awareness, mitigate global hunger, and encourage healthy living', NULL, 5, 2, 1, 0, '1639058073.png', '2021/12', 20, 'Spread environmental awareness, mitigate global hunger, and encourage healthy living', '<p>Spread environmental awareness, mitigate global hunger, and encourage healthy living<br></p>', NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2021-12-11 07:26:46', '2021-12-09 13:54:34', '2021-12-11 07:26:46'),
(14, 'About Me', '#ffffff', NULL, 1, 1, 3, 0, 'About Me', NULL, 1, 0, 1, 0, '1645020386.jpeg', '2022/02', 111, '<p class=\"ql-align-justify\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p><p class=\"ql-align-justify\">\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p><p><br></p>', '<h3><strong>The standard Lorem Ipsum passage, used since the 1500s</strong></h3><p class=\"ql-align-justify\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p><h3><strong>Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</strong></h3><p class=\"ql-align-justify\">\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p><h3><strong>1914 translation by H. Rackham</strong></h3><p class=\"ql-align-justify\">\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"</p><p><br></p>', 'Read More', NULL, NULL, NULL, NULL, 1, 1, 1, '2022-03-29 10:05:56', '2021-12-11 07:29:25', '2022-03-29 10:05:56'),
(15, 'President Message Test', NULL, NULL, 1, 1, 3, 0, 'Message from the President', NULL, 1, 1, 2, 0, '1639207859.png', '2021/12', 22, '<p>Dear Members, Sponsors and Colleagues,</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>', '<p>CONTINUE READING</p>', 'Read More', 'http://127.0.0.1:8000/', NULL, NULL, NULL, 1, 1, 1, '2022-02-02 14:04:59', '2021-12-11 07:31:00', '2022-02-02 14:04:59'),
(16, 'Test', NULL, NULL, 1, 1, 3, 0, 'Test1', NULL, 1, 3, 1, 0, '1639218776.png', '2021/12', 23, '<p>Test1</p>', '<p>Test1</p>', NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2021-12-11 13:50:29', '2021-12-11 10:32:57', '2021-12-11 13:50:29'),
(17, 'Publication', '#ffffff', NULL, 1, 3, 2, 1, '', NULL, 2, 1, 1, 0, NULL, NULL, NULL, 'null', 'null', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2022-05-25 06:17:45', '2021-12-11 10:37:33', '2022-05-25 06:17:45'),
(18, 'Test 2', NULL, NULL, 1, 1, 3, 0, '', NULL, 6, 5, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2021-12-30 21:48:17', '2021-12-11 10:38:26', '2021-12-30 21:48:17'),
(19, 'Contribution', '#ededed', NULL, 1, 3, 1, 1, '', NULL, 3, 5, 1, 0, NULL, NULL, NULL, 'null', 'null', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2022-02-02 13:42:02', '2021-12-11 13:01:48', '2022-02-02 13:42:02'),
(20, 'Full Parallax', '#ffffff', NULL, 1, 1, 3, 0, 'Join us', NULL, 5, 4, 1, 0, '1645020436.jpeg', '2022/02', 113, '<h6 class=\"ql-align-center\"><span style=\"color: rgb(255, 255, 255);\">Whether you’re a government, city, private business, NGO, journalist, civil society organization or individual, we want to hear from you. We can provide you with multimedia content in several languages to share, and to support your World Food&nbsp;Day activity. </span><a href=\"mailto:info@noe.org\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(255, 255, 255);\">Contact us</a><span style=\"color: rgb(255, 255, 255);\"> if you need more information.</span></h6>', '<p>null</p>', 'Contact Us', 'https://stylezworld.com/projects/nourishourearth.org/contact-us', NULL, NULL, NULL, 1, 1, 1, '2022-05-25 06:17:35', '2021-12-11 13:21:01', '2022-05-25 06:17:35'),
(21, 'Half Parallax', NULL, NULL, 1, 1, 3, 0, 'Half Parallax', NULL, 4, 5, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2021-12-14 05:07:26', '2021-12-11 13:52:46', '2021-12-14 05:07:26'),
(22, 'Vote', NULL, NULL, 1, 1, 3, 0, 'Vote', 'Vote', 4, 8, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, '2021-12-14 05:23:21', '2021-12-14 05:07:07', '2021-12-14 05:23:21'),
(23, 'Testimonial', '#f7f7f7', NULL, 1, 1, 3, 1, 'Title', 'Sub Title', 4, 0, 1, 0, '1649251720.png', '2022/04', 139, 'null', 'null', 'Button', '#', NULL, NULL, 1, 1, 1, 1, '2022-05-25 06:17:49', '2021-12-14 05:08:17', '2022-05-25 06:17:49'),
(24, 'Board Members', '#f7f7f7', NULL, 1, 1, 3, 1, '', NULL, 7, 6, 1, 0, NULL, NULL, NULL, 'null', 'null', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2022-02-02 13:37:22', '2021-12-14 05:09:09', '2022-02-02 13:37:22'),
(25, 'Executive Members', '#ffffff', NULL, 1, 1, 3, 1, '', NULL, 8, 7, 1, 0, NULL, NULL, NULL, 'null', 'null', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2022-02-02 13:37:27', '2021-12-14 05:10:19', '2022-02-02 13:37:27'),
(26, 'Half Parallax', NULL, NULL, 1, 1, 3, 0, 'Half Parallax', NULL, 4, 1000, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, '2021-12-14 18:53:25', '2021-12-14 18:41:47', '2021-12-14 18:53:25'),
(27, 'Upcoming Events', '#ffffff', NULL, 1, 1, 3, 1, '', NULL, 6, 2, 1, 0, NULL, NULL, NULL, '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus totam sequi eos eligendi iste quos.</p>', 'null', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2022-05-25 06:17:42', '2021-12-24 18:42:45', '2022-05-25 06:17:42'),
(28, 'Media', '#ebebeb', NULL, 1, 1, 3, 1, '', NULL, 9, 5, 1, 0, NULL, NULL, NULL, 'null', 'null', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2022-05-25 06:17:31', '2022-02-03 09:37:17', '2022-05-25 06:17:31'),
(29, 'About Me', '#ffffff', NULL, 1, 1, 3, 1, 'About Me', 'MATRIX Engineering Services', 1, 3, 1, 0, '1648980307.png', '2022/04', 123, '<p>.</p>', '<p>I\'m a Social Justice advocate, an expert Diversity, Equity, and Inclusion leader, and an innovative thinker. I’ve been a Critical Time Intervention Specialist and Community Engagement Worker at Elizabeth Fry Toronto since 2018. I\'ve been in this role since I completed my M.A. in Social Justice Education with a collab degree in Women and Gender Studies at UofT in 2017. I decided to work in the NGO sector because I felt it would help me bridge the gap between theory and praxis in advocacy work. I was right.</p><p><br></p><p>The wealth of knowledge and experience I have gained over the last four years working in the NGO sector in varying degrees has been immeasurable. As CTI Specialist, I\'ve been able to support survivors of sex trafficking and many of our city\'s most vulnerable citizens. Many are battling homelessness, addictions, and co-occurring mental health barriers. I\'ve also had the amazing opportunity to build relationships, partnerships and collaborate with stakeholders in ways I\'d never previously imagined.</p><p><br></p><p>As Community Engagement Officer, some of the partnerships I\'ve established are with agencies like Grant House and Homestead, Palmerston, and Renascent. I have a knack for establishing and maintaining healthy partnerships. The experience gained from supporting clients to make changes in their lives is as valuable as my degrees, and I absolutely love working in NGO. I\'m ready to incorporate all my skillsets to create new and exciting career pathways.</p><p><br></p><p>I have a rich history in Anti-Racist/Anti-Oppression, Diversity, Equity, and Inclusion initiatives and strategic planning since 2011. As the ESU Massage Therapy Centre manager, I designed and implemented the wellness centre’s ARAO two-year work plan. This project was highly successful. Staff and client retention increased, and workplace culture improved.</p><p><br></p><p>By 2014 when I left to start my graduate studies, ESU looked dramatically different than it did in 2011. I organized, arranged, and facilitated small and large-scale ARAO and DEI events, conferences, and symposiums during my undergraduate and graduate studies. My experience with ARAO and DEI strategic planning, implementation, and leadership span over ten years.</p><p><br></p><p>At this point in my career, I am passionate about incorporating the knowledge and strategies I have honed over the years in the service of advocacy. Returning to leadership roles is also an objective. I am excited about my new chapter and all its possibilities. If what I\'ve said here interests you, please feel free to send me a quick message. I\'d love to hear from you.</p><p><br></p><p>Be well.</p>', 'see details', '#', NULL, NULL, NULL, 1, 1, 1, '2022-05-25 06:17:39', '2022-03-29 10:14:22', '2022-05-25 06:17:39'),
(30, 'Feature Product', '#088f7d', NULL, 1, 4, 2, 0, '', NULL, 3, 1000, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2022-05-27 08:48:12', '2022-05-25 06:53:46', '2022-05-27 08:48:12'),
(31, 'MESSAGE FROM CEO', '#000000', NULL, 1, 1, 3, 0, 'MESSAGE FROM CEO', NULL, 1, 1000, 1, 0, '1653641801.png', '2022/05', 219, '<p>null</p>', '<p><span style=\"color: rgb(32, 33, 36);\">We are becoming a research and development center for elevator &amp; escalator now, and we have owned cooperated &amp; affiliated companies all over the world.Our main products include Passenger lift, freight lift, panoramic lift, hospital lift, car lift, escalator and autowalk/moving sidewalk. Elevator with machine room and machine room less, speed from 0.5m/s to 6m/s. Escalator with VVVF drive and smart sensor control. They are applicable for residence, business buildings, factories, shopping centers, airports, bus stations and other places.</span></p>', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, '2022-05-27 08:48:03', '2022-06-29 12:37:50'),
(32, 'FEATURE PRODUCTS', '#191a1a', NULL, 1, 3, 1, 0, '', NULL, 3, 1000, 1, 0, NULL, NULL, NULL, 'null', 'null', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, '2022-05-27 09:06:05', '2022-05-27 09:34:48'),
(33, 'OUR PROJECT', '#088f7d', NULL, 1, 4, 1, 0, '', NULL, 10, 1000, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, '2022-05-27 10:04:12', '2022-05-27 10:04:12'),
(34, 'Our Services', '#050505', NULL, 1, 4, 1, 0, '', NULL, 6, 1000, 1, 0, NULL, NULL, NULL, 'null', 'null', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, '2022-05-27 10:21:42', '2022-05-27 10:33:12'),
(35, 'OUR VALUE', '#088f7d', NULL, 1, 4, 1, 0, '', NULL, 11, 1000, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, '2022-05-27 10:37:05', '2022-05-27 10:37:05'),
(36, 'Testimonials', '#088f7d', NULL, 1, 1, 3, 0, '', NULL, 12, 1000, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, '2022-05-27 10:52:56', '2022-05-27 10:52:56'),
(37, 'OUR VALUABLE CLIENTS', '#0d0d0d', NULL, 1, 1, 3, 1, '', NULL, 9, 1000, 1, 0, NULL, NULL, NULL, 'null', 'null', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, '2022-05-27 11:04:12', '2022-05-27 11:04:21'),
(38, 'LASTEST NEWS', '#088f7d', NULL, 1, 3, 1, 0, '', NULL, 2, 1000, 1, 0, NULL, NULL, NULL, 'null', 'null', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, '2022-05-27 11:13:03', '2022-05-27 11:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `file_name`, `year`, `month`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1638773014.png', '2021', '12', NULL, '2021-12-06 06:43:34', '2021-12-06 06:43:34'),
(2, '1638773143.jpg', '2021', '12', NULL, '2021-12-06 06:45:43', '2021-12-06 06:45:43'),
(3, '1638773292.jpg', '2021', '12', NULL, '2021-12-06 06:48:13', '2021-12-06 06:48:13'),
(4, '1638793601.jpg', '2021', '12', NULL, '2021-12-06 12:26:41', '2021-12-06 12:26:41'),
(5, '1638797882.jpg', '2021', '12', NULL, '2021-12-06 13:38:02', '2021-12-06 13:38:02'),
(6, '1638798032.png', '2021', '12', NULL, '2021-12-06 13:40:33', '2021-12-06 13:40:33'),
(7, '1638798179.png', '2021', '12', NULL, '2021-12-06 13:43:01', '2021-12-06 13:43:01'),
(8, '1638798701.png', '2021', '12', NULL, '2021-12-06 13:51:42', '2021-12-06 13:51:42'),
(9, '1638799111.png', '2021', '12', NULL, '2021-12-06 13:58:32', '2021-12-06 13:58:32'),
(10, '1638866644.png', '2021', '12', NULL, '2021-12-07 08:44:06', '2021-12-07 08:44:06'),
(11, '1639030472.jpg', '2021', '12', NULL, '2021-12-09 06:14:32', '2021-12-09 06:14:32'),
(12, '1639030551.jpg', '2021', '12', NULL, '2021-12-09 06:15:51', '2021-12-09 06:15:51'),
(13, '1639030578.jpg', '2021', '12', NULL, '2021-12-09 06:16:19', '2021-12-09 06:16:19'),
(14, '1639032233.jpg', '2021', '12', NULL, '2021-12-09 06:43:53', '2021-12-09 06:43:53'),
(15, '1639032904.jpg', '2021', '12', NULL, '2021-12-09 06:55:05', '2021-12-09 06:55:05'),
(16, '1639033106.jpg', '2021', '12', NULL, '2021-12-09 06:58:26', '2021-12-09 06:58:26'),
(17, '1639033118.png', '2021', '12', NULL, '2021-12-09 06:58:39', '2021-12-09 06:58:39'),
(18, '1639033398.jpg', '2021', '12', NULL, '2021-12-09 07:03:18', '2021-12-09 07:03:18'),
(19, '1639033534.png', '2021', '12', NULL, '2021-12-09 07:05:34', '2021-12-09 07:05:34'),
(20, '1639058073.png', '2021', '12', NULL, '2021-12-09 13:54:34', '2021-12-09 13:54:34'),
(21, '1639207765.jpg', '2021', '12', NULL, '2021-12-11 07:29:25', '2021-12-11 07:29:25'),
(22, '1639207859.png', '2021', '12', NULL, '2021-12-11 07:31:00', '2021-12-11 07:31:00'),
(23, '1639218776.png', '2021', '12', NULL, '2021-12-11 10:32:57', '2021-12-11 10:32:57'),
(24, '1639225973.jpg', '2021', '12', NULL, '2021-12-11 12:32:53', '2021-12-11 12:32:53'),
(25, '1639225995.jpg', '2021', '12', NULL, '2021-12-11 12:33:15', '2021-12-11 12:33:15'),
(26, '1639227097.png', '2021', '12', NULL, '2021-12-11 12:51:38', '2021-12-11 12:51:38'),
(27, '1639227164.png', '2021', '12', NULL, '2021-12-11 12:52:45', '2021-12-11 12:52:45'),
(28, '1639229387.png', '2021', '12', NULL, '2021-12-11 13:29:47', '2021-12-11 13:29:47'),
(29, '1639230571.png', '2021', '12', NULL, '2021-12-11 13:49:32', '2021-12-11 13:49:32'),
(30, '1639242645.png', '2021', '12', NULL, '2021-12-12 06:10:46', '2021-12-12 06:10:46'),
(31, '1639242708.png', '2021', '12', NULL, '2021-12-12 06:11:49', '2021-12-12 06:11:49'),
(32, '1639242725.png', '2021', '12', NULL, '2021-12-12 06:12:06', '2021-12-12 06:12:06'),
(33, '1639412615.jpg', '2021', '12', NULL, '2021-12-14 05:23:35', '2021-12-14 05:23:35'),
(34, '1639460554.png', '2021', '12', NULL, '2021-12-14 18:42:35', '2021-12-14 18:42:35'),
(35, '1639461168.png', '2021', '12', NULL, '2021-12-14 18:52:49', '2021-12-14 18:52:49'),
(36, '1639461312.jpg', '2021', '12', NULL, '2021-12-14 18:55:12', '2021-12-14 18:55:12'),
(37, '1640077401.jpg', '2021', '12', NULL, '2021-12-21 22:03:25', '2021-12-21 22:03:25'),
(38, '1640104145.jpg', '2021', '12', NULL, '2021-12-22 05:29:05', '2021-12-22 05:29:05'),
(39, '1640104303.jpg', '2021', '12', NULL, '2021-12-22 05:31:43', '2021-12-22 05:31:43'),
(40, '1640105302.jpg', '2021', '12', NULL, '2021-12-22 05:48:22', '2021-12-22 05:48:22'),
(41, '1640105585.jpg', '2021', '12', NULL, '2021-12-22 05:53:05', '2021-12-22 05:53:05'),
(42, '1640105914.jpg', '2021', '12', NULL, '2021-12-22 05:58:34', '2021-12-22 05:58:34'),
(43, '1640106241.jpg', '2021', '12', NULL, '2021-12-22 06:04:02', '2021-12-22 06:04:02'),
(44, '1640275831.jpg', '2021', '12', NULL, '2021-12-24 05:10:31', '2021-12-24 05:10:31'),
(45, '1640276230.png', '2021', '12', NULL, '2021-12-24 05:17:11', '2021-12-24 05:17:11'),
(46, '1640277161.png', '2021', '12', NULL, '2021-12-24 05:32:42', '2021-12-24 05:32:42'),
(47, '1640277296.jpg', '2021', '12', NULL, '2021-12-24 05:34:56', '2021-12-24 05:34:56'),
(48, '1640277537.jpg', '2021', '12', NULL, '2021-12-24 05:38:57', '2021-12-24 05:38:57'),
(49, '1640277753.jpg', '2021', '12', NULL, '2021-12-24 05:42:33', '2021-12-24 05:42:33'),
(50, '1640277837.jpg', '2021', '12', NULL, '2021-12-24 05:43:57', '2021-12-24 05:43:57'),
(51, '1640277985.jpg', '2021', '12', NULL, '2021-12-24 05:46:25', '2021-12-24 05:46:25'),
(52, '1640278007.jpg', '2021', '12', NULL, '2021-12-24 05:46:47', '2021-12-24 05:46:47'),
(53, '1640278024.jpg', '2021', '12', NULL, '2021-12-24 05:47:04', '2021-12-24 05:47:04'),
(54, '1640278050.jpg', '2021', '12', NULL, '2021-12-24 05:47:30', '2021-12-24 05:47:30'),
(55, '1641201387.png', '2022', '01', NULL, '2022-01-03 22:16:29', '2022-01-03 22:16:29'),
(56, '1641446092.png', '2022', '01', NULL, '2022-01-06 18:14:52', '2022-01-06 18:14:52'),
(57, '1641446218.png', '2022', '01', NULL, '2022-01-06 18:16:58', '2022-01-06 18:16:58'),
(58, '1641446426.png', '2022', '01', NULL, '2022-01-06 18:20:26', '2022-01-06 18:20:26'),
(59, '1641446622.png', '2022', '01', NULL, '2022-01-06 18:23:42', '2022-01-06 18:23:42'),
(60, '1641446960.png', '2022', '01', NULL, '2022-01-06 18:29:20', '2022-01-06 18:29:20'),
(61, '1641447043.png', '2022', '01', NULL, '2022-01-06 18:30:44', '2022-01-06 18:30:44'),
(62, '1641447195.png', '2022', '01', NULL, '2022-01-06 18:33:16', '2022-01-06 18:33:16'),
(63, '1641447291.png', '2022', '01', NULL, '2022-01-06 18:34:51', '2022-01-06 18:34:51'),
(64, '1641447320.png', '2022', '01', NULL, '2022-01-06 18:35:21', '2022-01-06 18:35:21'),
(65, '1641447378.png', '2022', '01', NULL, '2022-01-06 18:36:18', '2022-01-06 18:36:18'),
(66, '1641447507.png', '2022', '01', NULL, '2022-01-06 18:38:28', '2022-01-06 18:38:28'),
(67, '1641449279.jpeg', '2022', '01', NULL, '2022-01-06 19:07:59', '2022-01-06 19:07:59'),
(68, '1641480905.jpg', '2022', '01', NULL, '2022-01-07 03:55:05', '2022-01-07 03:55:05'),
(69, '1641495688.png', '2022', '01', NULL, '2022-01-07 08:01:28', '2022-01-07 08:01:28'),
(70, '1641495942.png', '2022', '01', NULL, '2022-01-07 08:05:43', '2022-01-07 08:05:43'),
(71, '1641629997.png', '2022', '01', NULL, '2022-01-08 21:19:58', '2022-01-08 21:19:58'),
(72, '1641742505.jpg', '2022', '01', NULL, '2022-01-10 04:35:18', '2022-01-10 04:35:18'),
(73, '1641744208.jpg', '2022', '01', NULL, '2022-01-10 05:03:28', '2022-01-10 05:03:28'),
(74, '1641744288.jpg', '2022', '01', NULL, '2022-01-10 05:04:48', '2022-01-10 05:04:48'),
(75, '1641744534.jpg', '2022', '01', NULL, '2022-01-10 05:08:55', '2022-01-10 05:08:55'),
(76, '1641745319.jpg', '2022', '01', NULL, '2022-01-10 05:21:59', '2022-01-10 05:21:59'),
(77, '1641745639.jpg', '2022', '01', NULL, '2022-01-10 05:27:19', '2022-01-10 05:27:19'),
(78, '1641746076.png', '2022', '01', NULL, '2022-01-10 05:34:36', '2022-01-10 05:34:36'),
(79, '1641746119.png', '2022', '01', NULL, '2022-01-10 05:35:20', '2022-01-10 05:35:20'),
(80, '1641746204.png', '2022', '01', NULL, '2022-01-10 05:36:45', '2022-01-10 05:36:45'),
(81, '1641746651.jpg', '2022', '01', NULL, '2022-01-10 05:44:11', '2022-01-10 05:44:11'),
(82, '1641749570.jpg', '2022', '01', NULL, '2022-01-10 06:32:50', '2022-01-10 06:32:50'),
(83, '1641753174.jpg', '2022', '01', NULL, '2022-01-10 07:32:54', '2022-01-10 07:32:54'),
(84, '1642256454.jpg', '2022', '01', NULL, '2022-01-16 03:20:54', '2022-01-16 03:20:54'),
(85, '1642347949.jpg', '2022', '01', NULL, '2022-01-17 04:45:49', '2022-01-17 04:45:49'),
(86, '1642348136.jpg', '2022', '01', NULL, '2022-01-17 04:48:57', '2022-01-17 04:48:57'),
(87, '1642348294.jpg', '2022', '01', NULL, '2022-01-17 04:51:34', '2022-01-17 04:51:34'),
(88, '1642348432.jpg', '2022', '01', NULL, '2022-01-17 04:53:52', '2022-01-17 04:53:52'),
(89, '1642348487.jpg', '2022', '01', NULL, '2022-01-17 04:54:47', '2022-01-17 04:54:47'),
(90, '1642348526.jpg', '2022', '01', NULL, '2022-01-17 04:55:26', '2022-01-17 04:55:26'),
(91, '1642348696.jpg', '2022', '01', NULL, '2022-01-17 04:58:17', '2022-01-17 04:58:17'),
(92, '1642348915.jpg', '2022', '01', NULL, '2022-01-17 05:01:55', '2022-01-17 05:01:55'),
(93, '1642349043.jpg', '2022', '01', NULL, '2022-01-17 05:04:03', '2022-01-17 05:04:03'),
(94, '1642349132.jpg', '2022', '01', NULL, '2022-01-17 05:05:33', '2022-01-17 05:05:33'),
(95, '1642349275.jpg', '2022', '01', NULL, '2022-01-17 05:07:55', '2022-01-17 05:07:55'),
(96, '1642366993.jpg', '2022', '01', NULL, '2022-01-17 10:03:13', '2022-01-17 10:03:13'),
(97, '1642376738.jpg', '2022', '01', NULL, '2022-01-17 12:45:41', '2022-01-17 12:45:41'),
(98, '1642377032.jpg', '2022', '01', NULL, '2022-01-17 12:50:37', '2022-01-17 12:50:37'),
(99, '1642873183.png', '2022', '01', NULL, '2022-01-23 06:39:44', '2022-01-23 06:39:44'),
(100, '1643874052.jpeg', '2022', '02', NULL, '2022-02-03 07:40:52', '2022-02-03 07:40:52'),
(101, '1643874096.jpeg', '2022', '02', NULL, '2022-02-03 07:41:36', '2022-02-03 07:41:36'),
(102, '1643880182.jpeg', '2022', '02', NULL, '2022-02-03 09:23:02', '2022-02-03 09:23:02'),
(103, '1643880236.jpeg', '2022', '02', NULL, '2022-02-03 09:23:56', '2022-02-03 09:23:56'),
(104, '1644302177.jpeg', '2022', '02', NULL, '2022-02-08 06:36:17', '2022-02-08 06:36:17'),
(105, '1644302274.jpeg', '2022', '02', NULL, '2022-02-08 06:37:54', '2022-02-08 06:37:54'),
(106, '1644302479.jpeg', '2022', '02', NULL, '2022-02-08 06:41:19', '2022-02-08 06:41:19'),
(107, '1644994694.jpeg', '2022', '02', NULL, '2022-02-16 06:58:14', '2022-02-16 06:58:14'),
(108, '1644994708.jpeg', '2022', '02', NULL, '2022-02-16 06:58:28', '2022-02-16 06:58:28'),
(109, '1645018419.jpeg', '2022', '02', NULL, '2022-02-16 19:33:39', '2022-02-16 19:33:39'),
(110, '1645018471.jpeg', '2022', '02', NULL, '2022-02-16 19:34:31', '2022-02-16 19:34:31'),
(111, '1645020386.jpeg', '2022', '02', NULL, '2022-02-16 20:06:26', '2022-02-16 20:06:26'),
(112, '1645020417.jpeg', '2022', '02', NULL, '2022-02-16 20:06:57', '2022-02-16 20:06:57'),
(113, '1645020436.jpeg', '2022', '02', NULL, '2022-02-16 20:07:16', '2022-02-16 20:07:16'),
(114, '1645081676.jpeg', '2022', '02', NULL, '2022-02-17 13:07:56', '2022-02-17 13:07:56'),
(115, '1645082261.jpg', '2022', '02', NULL, '2022-02-17 13:17:43', '2022-02-17 13:17:43'),
(116, '1648535201.jpg', '2022', '03', NULL, '2022-03-29 06:26:41', '2022-03-29 06:26:41'),
(117, '1648535273.jpg', '2022', '03', NULL, '2022-03-29 06:27:53', '2022-03-29 06:27:53'),
(118, '1648548987.png', '2022', '03', NULL, '2022-03-29 10:16:28', '2022-03-29 10:16:28'),
(119, '1648628199.png', '2022', '03', NULL, '2022-03-30 08:16:40', '2022-03-30 08:16:40'),
(120, '1648824054.jpg', '2022', '04', NULL, '2022-04-01 14:40:54', '2022-04-01 14:40:54'),
(121, '1648824377.jpg', '2022', '04', NULL, '2022-04-01 14:46:18', '2022-04-01 14:46:18'),
(122, '1648828858.jpg', '2022', '04', NULL, '2022-04-01 16:00:58', '2022-04-01 16:00:58'),
(123, '1648980307.png', '2022', '04', NULL, '2022-04-03 10:05:08', '2022-04-03 10:05:08'),
(124, '1648985098.png', '2022', '04', NULL, '2022-04-03 11:24:58', '2022-04-03 11:24:58'),
(125, '1649215963.jpg', '2022', '04', NULL, '2022-04-06 03:32:43', '2022-04-06 03:32:43'),
(126, '1649228947.jpg', '2022', '04', NULL, '2022-04-06 07:09:07', '2022-04-06 07:09:07'),
(127, '1649229081.jpg', '2022', '04', NULL, '2022-04-06 07:11:21', '2022-04-06 07:11:21'),
(128, '1649229323.png', '2022', '04', NULL, '2022-04-06 07:15:24', '2022-04-06 07:15:24'),
(129, '1649229579.png', '2022', '04', NULL, '2022-04-06 07:19:39', '2022-04-06 07:19:39'),
(130, '1649229717.png', '2022', '04', NULL, '2022-04-06 07:21:58', '2022-04-06 07:21:58'),
(131, '1649229802.png', '2022', '04', NULL, '2022-04-06 07:23:22', '2022-04-06 07:23:22'),
(132, '1649232309.png', '2022', '04', NULL, '2022-04-06 08:05:10', '2022-04-06 08:05:10'),
(133, '1649232319.png', '2022', '04', NULL, '2022-04-06 08:05:19', '2022-04-06 08:05:19'),
(134, '1649234026.jpg', '2022', '04', NULL, '2022-04-06 08:33:46', '2022-04-06 08:33:46'),
(135, '1649234183.jpeg', '2022', '04', NULL, '2022-04-06 08:36:23', '2022-04-06 08:36:23'),
(136, '1649234630.png', '2022', '04', NULL, '2022-04-06 08:43:50', '2022-04-06 08:43:50'),
(137, '1649234652.png', '2022', '04', NULL, '2022-04-06 08:44:13', '2022-04-06 08:44:13'),
(138, '1649234868.png', '2022', '04', NULL, '2022-04-06 08:47:48', '2022-04-06 08:47:48'),
(139, '1649251720.png', '2022', '04', NULL, '2022-04-06 13:28:40', '2022-04-06 13:28:40'),
(140, '1652178181.png', '2022', '05', NULL, '2022-05-10 10:23:02', '2022-05-10 10:23:02'),
(141, '1652180244.png', '2022', '05', NULL, '2022-05-10 10:57:24', '2022-05-10 10:57:24'),
(142, '1652245144.png', '2022', '05', NULL, '2022-05-11 04:59:04', '2022-05-11 04:59:04'),
(143, '1652248080.png', '2022', '05', NULL, '2022-05-11 05:48:01', '2022-05-11 05:48:01'),
(144, '1652249327.png', '2022', '05', NULL, '2022-05-11 06:08:47', '2022-05-11 06:08:47'),
(145, '1652702217.png', '2022', '05', NULL, '2022-05-16 11:56:58', '2022-05-16 11:56:58'),
(146, '1652767195.png', '2022', '05', NULL, '2022-05-17 05:59:55', '2022-05-17 05:59:55'),
(147, '1652767430.png', '2022', '05', NULL, '2022-05-17 06:03:51', '2022-05-17 06:03:51'),
(148, '1652787622.png', '2022', '05', NULL, '2022-05-17 11:40:23', '2022-05-17 11:40:23'),
(149, '1652787677.png', '2022', '05', NULL, '2022-05-17 11:41:18', '2022-05-17 11:41:18'),
(150, '1652787808.png', '2022', '05', NULL, '2022-05-17 11:43:29', '2022-05-17 11:43:29'),
(151, '1652787882.png', '2022', '05', NULL, '2022-05-17 11:44:42', '2022-05-17 11:44:42'),
(152, '1652788010.png', '2022', '05', NULL, '2022-05-17 11:46:50', '2022-05-17 11:46:50'),
(153, '1652873484.png', '2022', '05', NULL, '2022-05-18 11:31:24', '2022-05-18 11:31:24'),
(154, '1652873519.png', '2022', '05', NULL, '2022-05-18 11:32:00', '2022-05-18 11:32:00'),
(155, '1652876020.png', '2022', '05', NULL, '2022-05-18 12:13:41', '2022-05-18 12:13:41'),
(156, '1652876450.png', '2022', '05', NULL, '2022-05-18 12:20:51', '2022-05-18 12:20:51'),
(157, '1653116469.png', '2022', '05', NULL, '2022-05-21 07:01:09', '2022-05-21 07:01:09'),
(158, '1653288848.png', '2022', '05', NULL, '2022-05-23 06:54:08', '2022-05-23 06:54:08'),
(159, '1653288894.png', '2022', '05', NULL, '2022-05-23 06:54:54', '2022-05-23 06:54:54'),
(160, '1653288943.png', '2022', '05', NULL, '2022-05-23 06:55:43', '2022-05-23 06:55:43'),
(161, '1653288999.png', '2022', '05', NULL, '2022-05-23 06:56:39', '2022-05-23 06:56:39'),
(162, '1653289048.png', '2022', '05', NULL, '2022-05-23 06:57:29', '2022-05-23 06:57:29'),
(163, '1653289094.png', '2022', '05', NULL, '2022-05-23 06:58:14', '2022-05-23 06:58:14'),
(164, '1653289884.png', '2022', '05', NULL, '2022-05-23 07:11:25', '2022-05-23 07:11:25'),
(165, '1653290014.png', '2022', '05', NULL, '2022-05-23 07:13:34', '2022-05-23 07:13:34'),
(166, '1653290551.png', '2022', '05', NULL, '2022-05-23 07:22:31', '2022-05-23 07:22:31'),
(167, '1653294501.jpg', '2022', '05', NULL, '2022-05-23 08:28:21', '2022-05-23 08:28:21'),
(168, '1653294956.jpg', '2022', '05', NULL, '2022-05-23 08:35:56', '2022-05-23 08:35:56'),
(169, '1653295545.jpg', '2022', '05', NULL, '2022-05-23 08:45:45', '2022-05-23 08:45:45'),
(170, '1653300359.jpg', '2022', '05', NULL, '2022-05-23 10:05:59', '2022-05-23 10:05:59'),
(171, '1653308139.png', '2022', '05', NULL, '2022-05-23 12:15:40', '2022-05-23 12:15:40'),
(172, '1653308694.png', '2022', '05', NULL, '2022-05-23 12:24:55', '2022-05-23 12:24:55'),
(173, '1653309372.png', '2022', '05', NULL, '2022-05-23 12:36:12', '2022-05-23 12:36:12'),
(174, '1653373984.png', '2022', '05', NULL, '2022-05-24 06:33:04', '2022-05-24 06:33:04'),
(175, '1653373984.png', '2022', '05', NULL, '2022-05-24 06:33:05', '2022-05-24 06:33:05'),
(176, '1653373985.png', '2022', '05', NULL, '2022-05-24 06:33:05', '2022-05-24 06:33:05'),
(177, '1653373985.png', '2022', '05', NULL, '2022-05-24 06:33:05', '2022-05-24 06:33:05'),
(178, '1653373985.png', '2022', '05', NULL, '2022-05-24 06:33:06', '2022-05-24 06:33:06'),
(179, '1653381451.png', '2022', '05', NULL, '2022-05-24 08:37:31', '2022-05-24 08:37:31'),
(180, '1653381451.png', '2022', '05', NULL, '2022-05-24 08:37:32', '2022-05-24 08:37:32'),
(181, '1653381452.png', '2022', '05', NULL, '2022-05-24 08:37:32', '2022-05-24 08:37:32'),
(182, '1653381452.png', '2022', '05', NULL, '2022-05-24 08:37:33', '2022-05-24 08:37:33'),
(183, '1653381702.png', '2022', '05', NULL, '2022-05-24 08:41:42', '2022-05-24 08:41:42'),
(184, '1653381729.png', '2022', '05', NULL, '2022-05-24 08:42:10', '2022-05-24 08:42:10'),
(185, '1653383564.png', '2022', '05', NULL, '2022-05-24 09:12:44', '2022-05-24 09:12:44'),
(186, '1653383578.png', '2022', '05', NULL, '2022-05-24 09:12:59', '2022-05-24 09:12:59'),
(187, '1653386850.png', '2022', '05', NULL, '2022-05-24 10:07:30', '2022-05-24 10:07:30'),
(188, '1653386850.png', '2022', '05', NULL, '2022-05-24 10:07:30', '2022-05-24 10:07:30'),
(189, '1653386850.png', '2022', '05', NULL, '2022-05-24 10:07:31', '2022-05-24 10:07:31'),
(190, '1653386851.png', '2022', '05', NULL, '2022-05-24 10:07:31', '2022-05-24 10:07:31'),
(191, '1653399863.png', '2022', '05', NULL, '2022-05-24 13:44:23', '2022-05-24 13:44:23'),
(192, '1653399969.png', '2022', '05', NULL, '2022-05-24 13:46:10', '2022-05-24 13:46:10'),
(193, '1653471424.png', '2022', '05', NULL, '2022-05-25 09:37:05', '2022-05-25 09:37:05'),
(194, '1653473638.png', '2022', '05', NULL, '2022-05-25 10:13:59', '2022-05-25 10:13:59'),
(195, '1653473764.webp', '2022', '05', NULL, '2022-05-25 10:16:04', '2022-05-25 10:16:04'),
(196, '1653487541.png', '2022', '05', NULL, '2022-05-25 14:05:41', '2022-05-25 14:05:41'),
(197, '1653487541.png', '2022', '05', NULL, '2022-05-25 14:05:41', '2022-05-25 14:05:41'),
(198, '1653487541.png', '2022', '05', NULL, '2022-05-25 14:05:42', '2022-05-25 14:05:42'),
(199, '1653539431.png', '2022', '05', NULL, '2022-05-26 04:30:31', '2022-05-26 04:30:31'),
(200, '1653539431.jpg', '2022', '05', NULL, '2022-05-26 04:30:32', '2022-05-26 04:30:32'),
(201, '1653539742.png', '2022', '05', NULL, '2022-05-26 04:35:43', '2022-05-26 04:35:43'),
(202, '1653539743.png', '2022', '05', NULL, '2022-05-26 04:35:43', '2022-05-26 04:35:43'),
(203, '1653539743.png', '2022', '05', NULL, '2022-05-26 04:35:44', '2022-05-26 04:35:44'),
(204, '1653539911.png', '2022', '05', NULL, '2022-05-26 04:38:31', '2022-05-26 04:38:31'),
(205, '1653539911.png', '2022', '05', NULL, '2022-05-26 04:38:31', '2022-05-26 04:38:31'),
(206, '1653539911.png', '2022', '05', NULL, '2022-05-26 04:38:32', '2022-05-26 04:38:32'),
(207, '1653539914.png', '2022', '05', NULL, '2022-05-26 04:38:35', '2022-05-26 04:38:35'),
(208, '1653539959.png', '2022', '05', NULL, '2022-05-26 04:39:20', '2022-05-26 04:39:20'),
(209, '1653540001.png', '2022', '05', NULL, '2022-05-26 04:40:02', '2022-05-26 04:40:02'),
(210, '1653540067.png', '2022', '05', NULL, '2022-05-26 04:41:07', '2022-05-26 04:41:07'),
(211, '1653540067.png', '2022', '05', NULL, '2022-05-26 04:41:08', '2022-05-26 04:41:08'),
(212, '1653540070.jpg', '2022', '05', NULL, '2022-05-26 04:41:10', '2022-05-26 04:41:10'),
(213, '1653540159.png', '2022', '05', NULL, '2022-05-26 04:42:39', '2022-05-26 04:42:39'),
(214, '1653540159.png', '2022', '05', NULL, '2022-05-26 04:42:39', '2022-05-26 04:42:39'),
(215, '1653540159.png', '2022', '05', NULL, '2022-05-26 04:42:40', '2022-05-26 04:42:40'),
(216, '1653540162.png', '2022', '05', NULL, '2022-05-26 04:42:43', '2022-05-26 04:42:43'),
(217, '1653556055.png', '2022', '05', NULL, '2022-05-26 09:07:36', '2022-05-26 09:07:36'),
(218, '1653641766.png', '2022', '05', NULL, '2022-05-27 08:56:06', '2022-05-27 08:56:06'),
(219, '1653641801.png', '2022', '05', NULL, '2022-05-27 08:56:41', '2022-05-27 08:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `status`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Test Menu', '2022-01-06 17:29:27', '2021-12-05 07:16:54', '2022-01-06 17:29:27'),
(2, 1, 'Main Menu', NULL, '2021-12-05 10:09:05', '2021-12-05 10:09:05'),
(3, 1, 'Footer', NULL, '2022-01-21 07:22:05', '2022-01-21 07:22:05'),
(4, 1, 'sidebar menu', NULL, '2022-05-11 06:35:37', '2022-05-11 06:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `relation_with` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 1000,
  `menu_item_id` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `status`, `menu_id`, `text`, `url`, `relation_id`, `relation_with`, `position`, `menu_item_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, 1, 'page', 1000, NULL, NULL, '2021-12-05 07:28:45', '2021-12-05 07:28:45'),
(2, 1, 1, NULL, NULL, 1, 'page', 1000, NULL, NULL, '2021-12-05 07:28:51', '2021-12-05 07:28:51'),
(3, 1, 1, NULL, NULL, 1, 'page', 1000, NULL, NULL, '2021-12-05 07:28:54', '2021-12-05 07:28:54'),
(16, 1, 3, NULL, NULL, 1, 'page', 0, NULL, NULL, '2022-01-21 07:22:31', '2022-01-21 07:23:43'),
(17, 1, 3, 'Events', 'https://stylezworld.com/projects/nourishourearth.org/event/page/all', NULL, NULL, 1, NULL, NULL, '2022-01-21 07:22:53', '2022-05-11 08:43:27'),
(18, 1, 3, 'Journal', 'https://stylezworld.com/projects/nourishourearth.org/news/page/all', NULL, NULL, 2, NULL, NULL, '2022-01-21 07:23:03', '2022-05-11 06:50:25'),
(19, 1, 3, 'Members', 'https://stylezworld.com/projects/nourishourearth.org/member/list', NULL, NULL, 3, NULL, NULL, '2022-01-21 07:23:20', '2022-01-21 07:23:43'),
(20, 1, 3, 'Sponsors And Donors', '#', NULL, NULL, 4, NULL, NULL, '2022-01-21 07:23:29', '2022-01-21 07:23:43'),
(21, 1, 3, 'Contact Us', 'https://stylezworld.com/projects/nourishourearth.org/contact-us', NULL, NULL, 5, NULL, NULL, '2022-01-21 07:23:39', '2022-01-21 07:23:43'),
(30, 1, 2, NULL, NULL, 1, 'page', 0, NULL, NULL, '2022-03-30 08:17:17', '2022-03-30 08:17:23'),
(31, 1, 2, NULL, NULL, 3, 'page', 1, NULL, NULL, '2022-03-30 08:24:12', '2022-03-30 09:33:33'),
(32, 1, 2, NULL, NULL, 4, 'page', 2, NULL, NULL, '2022-03-30 11:46:50', '2022-03-30 11:46:54'),
(33, 1, 2, NULL, NULL, 5, 'page', 3, NULL, NULL, '2022-03-30 12:46:32', '2022-03-31 10:14:28'),
(35, 1, 2, NULL, NULL, 7, 'page', 4, NULL, NULL, '2022-03-31 10:14:23', '2022-03-31 10:14:28'),
(36, 1, 3, NULL, NULL, 1, 'page', 6, NULL, NULL, '2022-05-11 06:23:44', '2022-05-11 08:43:43'),
(37, 1, 4, NULL, NULL, 8, 'page', 1000, NULL, NULL, '2022-05-11 06:35:49', '2022-05-11 06:35:49'),
(38, 1, 4, NULL, NULL, 7, 'page', 1000, NULL, NULL, '2022-05-11 06:35:49', '2022-05-11 06:35:49'),
(39, 1, 2, NULL, NULL, 3, 'page', 1000, NULL, NULL, '2022-05-11 06:47:59', '2022-05-11 06:47:59'),
(40, 1, 3, NULL, NULL, 2, 'page', 7, NULL, NULL, '2022-05-11 07:35:31', '2022-05-11 08:43:43'),
(41, 1, 3, 'Googles', 'google.com', NULL, NULL, 8, NULL, NULL, '2022-05-11 07:35:57', '2022-05-11 08:43:43');

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
(4, '2021_03_08_110020_create_settings_table', 1),
(5, '2021_03_08_120921_create_media_table', 1),
(6, '2021_03_08_121341_create_categories_table', 1),
(7, '2021_03_09_054506_create_pages_table', 1),
(8, '2021_03_13_120036_create_sliders_table', 1),
(10, '2021_03_14_083335_create_menus_table', 1),
(11, '2021_03_14_083447_create_menu_items_table', 1),
(12, '2021_04_18_044508_create_emails_table', 1),
(19, '2021_12_06_164323_create_home_sections_table', 2),
(20, '2021_12_07_154536_create_section_design_types_table', 3),
(21, '2021_12_07_155509_create_section_names_table', 4),
(26, '2022_02_03_170804_create_testimonials_table', 9),
(33, '2022_02_03_170328_create_tags_table', 14),
(34, '2022_05_14_151557_create_news_table', 14),
(44, '2022_05_18_125859_create_people_table', 19),
(45, '2022_05_18_130002_create_people_lists_table', 19),
(46, '2022_05_18_130035_create_people_qualifications_table', 19),
(47, '2022_05_18_130100_create_people_qualification_categories_table', 19),
(48, '2022_05_18_130127_create_people_qualification_values_table', 19),
(49, '2022_05_21_160629_create_products_table', 20),
(50, '2022_05_21_160742_create_product_galleries_table', 20),
(51, '2022_05_21_160825_create_product_specifications_table', 20),
(52, '2022_05_21_160924_create_product_specification_values_table', 20),
(53, '2022_05_23_130815_category_product', 21),
(54, '2022_05_23_165126_create_customers_table', 22),
(55, '2022_05_24_170726_create_faqs_table', 23),
(56, '2022_05_24_184140_create_testimonials_table', 24),
(57, '2022_05_25_143254_create_services_table', 25),
(58, '2022_05_25_155114_create_values_table', 26),
(59, '2022_05_25_164944_create_widgets_table', 27),
(60, '2022_05_25_183436_create_portfolios_table', 28),
(61, '2022_05_26_130713_create_request_contacts_table', 29),
(62, '2022_05_29_130750_add_bread_to_pages_table', 30),
(63, '2022_06_30_145804_create_roles_table', 31),
(64, '2022_06_30_145844_create_permissions_table', 31);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int(11) DEFAULT 1000,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=image,1=video',
  `feature_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'File',
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_embade_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `source_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `publish_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category_id`, `title`, `sub_title`, `slug`, `description`, `position`, `featured`, `meta_title`, `meta_description`, `meta_tags`, `feature_type`, `feature_video`, `image`, `image_path`, `video_type`, `video`, `video_embade_code`, `media_id`, `source_name`, `source_link`, `status`, `deleted_at`, `publish_date`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Lorem velit quos vel', NULL, '', NULL, 1000, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'File', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-05-15 11:55:05', '2022-05-15 11:55:05'),
(2, 16, 'Soluta anim nihil vo', 'Pariatur Voluptas s', 'soluta-anim-nihil-vo', '<p>Pariatur Voluptas s</p>', 1000, 0, 'Est ipsa nesciunt', 'Maxime nisi amet es', 'Impedit dolorem aut', 1, 'https://www.youtube.com/watch?v=tb_Ng4pT8so', NULL, NULL, 'Embade Code', NULL, 'Fuga A ea animi ve', NULL, 'Justin Pacheco', 'https://www.suwapeq.me', 1, NULL, '2000-05-07', '2022-05-26 05:21:47', '2022-05-26 05:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int(11) DEFAULT 1000,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `template` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `breadcrumb_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_color` tinyint(4) NOT NULL DEFAULT 1,
  `breadcrumb_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `status`, `title`, `slug`, `short_description`, `description`, `position`, `featured`, `meta_title`, `meta_description`, `meta_tags`, `image`, `media_id`, `template`, `deleted_at`, `created_at`, `updated_at`, `breadcrumb_title`, `is_color`, `breadcrumb_background`) VALUES
(1, 1, 'About', 'about-us', 'About', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 1000, 0, NULL, NULL, NULL, '2022/03/1648628199.png', 119, NULL, NULL, '2021-12-05 07:17:39', '2022-03-30 08:16:40', NULL, 1, NULL),
(2, 1, 'Ullam accusamus offi', 'ullam-accusamus-offi', 'Voluptatem qui volu', NULL, 1000, 0, 'In cillum quidem dol', 'Maiores saepe mollit', 'Incidunt elit odio', '2022/01/1642349043.jpg', 93, NULL, NULL, '2022-01-17 05:04:03', '2022-01-17 05:04:03', NULL, 1, NULL),
(3, 1, 'Services', 'services', NULL, NULL, 1000, 0, NULL, NULL, NULL, NULL, NULL, 'services.all', NULL, '2022-03-30 08:23:53', '2022-03-30 08:23:53', NULL, 1, NULL),
(4, 1, 'Publications', 'publications', NULL, NULL, 1000, 0, NULL, NULL, NULL, NULL, NULL, 'news.allNews', NULL, '2022-03-30 11:46:30', '2022-03-30 11:46:30', NULL, 1, NULL),
(5, 1, 'Testimonial', 'testimonial', NULL, NULL, 1000, 0, NULL, NULL, NULL, NULL, NULL, 'testimonial.all', NULL, '2022-03-30 12:46:13', '2022-03-30 12:46:13', NULL, 1, NULL),
(6, 1, 'Contact Us', 'contact-us', NULL, NULL, 1000, 0, NULL, NULL, NULL, NULL, NULL, 'contactUs', NULL, '2022-03-30 13:10:47', '2022-03-30 13:10:47', NULL, 1, NULL),
(7, 1, 'Media', 'media', NULL, NULL, 1000, 0, NULL, NULL, NULL, NULL, NULL, 'gallery.galleries', NULL, '2022-03-31 10:13:51', '2022-03-31 10:13:51', NULL, 1, NULL),
(8, 1, 'In Nam', 'in-nam', NULL, '<p>quos magnam a</p>', 1000, 0, 'Ut cupiditate archit', 'Quo dolor et eos do', 'Enim tempore ut ea', '2022/05/1652249327.png', 144, 'services.all', NULL, '2022-05-11 05:48:01', '2022-05-11 06:08:47', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mdsatu.stylzmedia@gmail.com', '$2y$10$E1b/i5tWefNFkZdIbwtY/.m6lU29L1XzpLbq5Fi4o6h92oZbqqn3q', '2022-01-16 07:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `role_id`, `permission`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"news\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\",\"list\":\"1\"},\"product\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\",\"list\":\"1\"},\"customer\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\",\"list\":\"1\"},\"faq\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\",\"list\":\"1\"},\"testimonial\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\",\"list\":\"1\"},\"service\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\",\"list\":\"1\"},\"value\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\",\"list\":\"1\"},\"galleries\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\",\"list\":\"1\"},\"pages\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\",\"list\":\"1\"},\"menus\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\",\"list\":\"1\"},\"settings\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\",\"list\":\"1\"},\"request-contact\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\",\"list\":\"1\"},\"role\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\",\"list\":\"1\"},\"permissions\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\",\"list\":\"1\"},\"admins\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\",\"list\":\"1\"}}', '2022-06-30 09:41:45', '2022-06-30 10:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_capacity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `product_id`, `title`, `description`, `client_name`, `location`, `total_capacity`, `image`, `image_path`, `media_id`, `position`, `status`, `meta_title`, `meta_description`, `meta_tags`, `created_at`, `updated_at`) VALUES
(6, 24, 'Similique reiciendis', '<p>Similique reiciendis</p>', 'Sara Bauer', 'Consequuntur hic rat', 'Quis numquam incidun', '1653540162.png', '2022/05', 216, 1, 1, 'Atque velit duis au', 'Amet accusantium su', 'Fugit fugit in con', '2022-05-26 04:42:43', '2022-05-26 05:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_media`
--

CREATE TABLE `portfolio_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `portfolio_id` bigint(20) UNSIGNED NOT NULL,
  `media_id` bigint(20) UNSIGNED NOT NULL,
  `position` int(11) NOT NULL DEFAULT 1000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_media`
--

INSERT INTO `portfolio_media` (`id`, `portfolio_id`, `media_id`, `position`, `created_at`, `updated_at`) VALUES
(1, 6, 213, 0, '2022-05-26 04:42:43', '2022-05-26 04:42:43'),
(2, 6, 214, 1, '2022-05-26 04:42:43', '2022-05-26 04:42:43'),
(3, 6, 215, 2, '2022-05-26 04:42:43', '2022-05-26 04:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '	0=image,1=video	',
  `freature_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL,
  `pdf_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `feature_type`, `freature_image`, `image_path`, `media_id`, `video`, `position`, `pdf_file`, `status`, `created_at`, `updated_at`, `meta_title`, `meta_description`, `meta_tags`) VALUES
(1, 'Mrs. Otilia Beckere', '<p>Voluptatem provident porro cumque ut hic eos. Ad dolor et eos unde at rerum labore. Odit ea cupiditate sequi sit tenetur optio. Vel dolor rem officiis molestias. Ut harum molestias aliquam illum.</p>', 0, 'aperiam', NULL, 0, NULL, 10, 'alias', 1, '2022-05-21 10:51:39', '2022-05-23 12:43:26', NULL, NULL, NULL),
(2, 'Kasandra Grant', 'Et magnam ea non odio id a sed. Est officiis est enim dolorem qui dicta nisi. Voluptatem dignissimos et qui tempora ea sit autem animi. Velit sunt dolorem animi repudiandae nulla sapiente nisi.', 0, 'dolores', NULL, 0, 'illum', 8626, 'velit', 1, '2022-05-21 10:51:39', '2022-05-21 10:51:39', NULL, NULL, NULL),
(3, 'Birdie Hegmann I', 'Cumque numquam pariatur quas ex. Odio repellendus nam aut iure incidunt. Iusto ut ex doloribus molestias. Rerum quaerat nulla vel itaque cum.', 0, 'aut', NULL, 0, 'consequatur', 380, 'ex', 1, '2022-05-21 10:51:39', '2022-05-21 10:51:39', NULL, NULL, NULL),
(4, 'Else DuBuque', 'Corporis consectetur odit tenetur aspernatur voluptatem officiis. Sit commodi illum ut et qui corporis dolor et. Enim sint quas optio ipsum est consequatur voluptas.', 0, 'qui', NULL, 0, 'nihil', -8658, 'ratione', 1, '2022-05-21 10:51:39', '2022-05-21 10:51:39', NULL, NULL, NULL),
(5, 'Roger Medhurst DDS', 'Possimus nostrum excepturi nesciunt veniam et optio. Perferendis molestias impedit qui molestiae itaque esse. Aut blanditiis sint itaque autem laudantium.', 0, 'eos', NULL, 0, 'tempore', -1472, 'veritatis', 1, '2022-05-21 10:51:39', '2022-05-21 10:51:39', NULL, NULL, NULL),
(6, 'Prof. Silas Gislason DVM', 'Cupiditate et explicabo facilis cum necessitatibus ullam. Sed in et cupiditate. Aut illum aut asperiores ipsa aut tempore.', 0, 'non', NULL, 0, 'earum', 668, 'veritatis', 1, '2022-05-21 10:51:39', '2022-05-21 10:51:39', NULL, NULL, NULL),
(7, 'Mr. Tyler Robel II', 'Doloribus voluptatem eius ut voluptatem qui. Tempora neque molestiae ab corrupti itaque deserunt in ut. Aut voluptas est mollitia.', 0, 'enim', NULL, 0, 'corrupti', 7795, 'dolor', 1, '2022-05-21 10:51:39', '2022-05-21 10:51:39', NULL, NULL, NULL),
(8, 'Kamron Sipes', 'Et laudantium nihil perspiciatis dolores aliquid qui. Perspiciatis consequuntur eum nesciunt quo est ratione. Reprehenderit consequatur deserunt corrupti in aut.', 0, 'labore', NULL, 0, 'facilis', 9295, 'corrupti', 1, '2022-05-21 10:51:39', '2022-05-21 10:51:39', NULL, NULL, NULL),
(9, 'Roselyn Gaylord', '<p>Quod velit voluptates beatae quod enim inventore vel. Eligendi rem consequatur laborum aperiam quia quidem iure. Dolor consequatur possimus est recusandae tempora sequi.</p>', 0, '1653300359.jpg', '2022/05', 170, NULL, 10, 'odio', 1, '2022-05-21 10:51:39', '2022-05-23 10:05:59', NULL, NULL, NULL),
(22, 'Erin Brewer', '<p>Erin Brewer</p>', 1, NULL, NULL, NULL, 'Dolore voluptas opti', 0, '', 1, '2022-05-24 06:24:59', '2022-05-24 06:24:59', NULL, NULL, NULL),
(23, 'Test Product', '<p>Test Product</p>', 0, '1653381702.png', '2022/05', 183, NULL, 10, '', 0, '2022-05-24 08:41:42', '2022-05-24 08:41:42', 'product one', 'product one', 'product one'),
(24, 'Test Product', '<p>Test Product</p>', 0, '1653381729.png', '2022/05', 184, NULL, 10, '', 1, '2022-05-24 08:42:10', '2022-05-24 08:42:10', 'product one', 'product one', 'product one'),
(25, '', '', 0, NULL, NULL, NULL, NULL, 0, '', 0, '2022-05-24 10:36:17', '2022-05-24 10:36:17', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_media`
--

CREATE TABLE `product_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `media_id` bigint(20) UNSIGNED NOT NULL,
  `position` int(11) NOT NULL DEFAULT 1000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_media`
--

INSERT INTO `product_media` (`id`, `product_id`, `media_id`, `position`, `created_at`, `updated_at`) VALUES
(1, 24, 179, 0, '2022-05-24 08:42:10', '2022-05-24 08:42:10'),
(2, 24, 180, 1, '2022-05-24 08:42:10', '2022-05-24 08:42:10'),
(3, 24, 181, 2, '2022-05-24 08:42:10', '2022-05-24 08:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `product_specifications`
--

CREATE TABLE `product_specifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_specifications`
--

INSERT INTO `product_specifications` (`id`, `product_id`, `name`, `position`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Document Tests', 1, 1, '2022-05-23 13:26:24', '2022-05-23 13:26:35');

-- --------------------------------------------------------

--
-- Table structure for table `product_specification_values`
--

CREATE TABLE `product_specification_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_specification_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_specification_values`
--

INSERT INTO `product_specification_values` (`id`, `product_specification_id`, `name`, `position`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Arif Hossain Sarker', 20, 1, '2022-05-23 13:43:53', '2022-05-23 13:59:39'),
(2, 1, 'Documents', 6, 1, '2022-05-23 13:48:35', '2022-05-23 13:48:35');

-- --------------------------------------------------------

--
-- Table structure for table `request_contacts`
--

CREATE TABLE `request_contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_quote` tinyint(4) NOT NULL DEFAULT 0,
  `is_replay` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_contacts`
--

INSERT INTO `request_contacts` (`id`, `subject`, `name`, `email`, `phone`, `message`, `is_quote`, `is_replay`, `created_at`, `updated_at`) VALUES
(1, 'natus', 'Theodora Koss', 'wkuhn@example.com', '+18019402253', 'Tempore et omnis dolor id officiis. Aut sint fugit asperiores. Deserunt perspiciatis tempore quod placeat. Perferendis porro laborum enim ut delectus rem magnam.', 0, 0, '2022-05-26 08:22:17', '2022-05-26 08:22:17'),
(2, 'placeat', 'Milo Sanford', 'amber.heller@example.com', '+13109538487', 'Delectus expedita necessitatibus pariatur autem. Est nostrum sit adipisci et et ullam. Nostrum vitae quaerat non iste quas. Sunt repudiandae blanditiis ad enim velit et commodi.', 0, 0, '2022-05-26 08:22:17', '2022-05-26 08:22:17'),
(3, 'odio', 'Meda Hoppe Sr.', 'kennedi.muller@example.net', '870-494-9833', 'Harum cupiditate id dicta neque ipsa accusantium. Quos mollitia odio et ex sequi eos. Fuga nulla sunt odit pariatur neque hic dolore.', 0, 0, '2022-05-26 08:22:17', '2022-05-26 08:22:17'),
(4, 'ducimus', 'Mr. Kody Kshlerin Sr.', 'schuppe.enrico@example.com', '1-708-325-7693', 'Et ut voluptas corporis hic consequatur nobis et. Qui odio recusandae dolor laborum sapiente doloremque et. Asperiores sed eum sed ut et quia iusto perferendis.', 0, 0, '2022-05-26 08:22:17', '2022-05-26 08:22:17'),
(5, 'reprehenderit', 'Rosie Murray', 'proob@example.org', '+19856004265', 'Molestiae quae et sit quam. Temporibus quod molestias et voluptate ut libero a. Vero delectus debitis excepturi enim expedita.', 0, 0, '2022-05-26 08:22:17', '2022-05-26 08:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `reunions`
--

CREATE TABLE `reunions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2022-06-30 09:32:38', '2022-06-30 09:32:38');

-- --------------------------------------------------------

--
-- Table structure for table `section_design_types`
--

CREATE TABLE `section_design_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section_design_types`
--

INSERT INTO `section_design_types` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Text Image Card', 1, NULL, NULL),
(2, 'News', 1, NULL, NULL),
(3, 'Featured products', 1, NULL, NULL),
(4, 'Half Parallax', 1, NULL, NULL),
(5, 'Full Parallax', 1, NULL, NULL),
(6, 'Services', 1, NULL, NULL),
(7, 'Product Gallery', 1, NULL, NULL),
(8, 'Counter', 1, NULL, NULL),
(9, 'Clients', 1, NULL, NULL),
(10, 'Projects', 1, NULL, NULL),
(11, 'Values', 1, NULL, NULL),
(12, 'Testimonials', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `section_names`
--

CREATE TABLE `section_names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_align` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=left,1=center,2=right',
  `position` int(10) UNSIGNED NOT NULL DEFAULT 1000,
  `section_design_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `background_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `col` int(10) UNSIGNED NOT NULL DEFAULT 4,
  `row` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `title_is_show` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section_names`
--

INSERT INTO `section_names` (`id`, `title`, `title_align`, `position`, `section_design_type_id`, `background_color`, `col`, `row`, `title_is_show`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(9, 'A', 1, 1000, 1, NULL, 4, 1, 0, NULL, NULL, NULL, '2021-12-11 07:28:06', '2021-12-11 07:28:06'),
(10, 'B', 1, 1000, 1, NULL, 4, 1, 0, NULL, NULL, NULL, '2021-12-11 07:30:04', '2021-12-11 07:30:04'),
(11, 'News', 1, 1000, 2, NULL, 3, 1, 0, NULL, NULL, NULL, '2021-12-11 07:31:37', '2021-12-11 07:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `image`, `image_path`, `media_id`, `position`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Omnis ut accusantium quas.', 'Amet omnis sed facilis dolores. Neque libero consectetur facere quia ut aut ex. A assumenda delectus non sint totam nam veritatis delectus.', '1551', NULL, NULL, 1, 1, '2022-05-25 09:11:24', '2022-05-25 09:11:24'),
(2, 'Consequuntur sunt rem.', 'Est officiis sit reiciendis sit impedit. Iusto laborum itaque architecto voluptatem. Qui deserunt qui harum non expedita. Nulla animi totam odit ut atque et quia.', '-4535', NULL, NULL, 2, 1, '2022-05-25 09:11:24', '2022-05-25 09:11:24'),
(3, 'Cumque distinctio accusamus ut aut.', 'Molestiae adipisci in sit accusamus aut. Harum non omnis laborum omnis corporis excepturi. Laudantium neque eligendi ut quia.', '2505', NULL, NULL, 3, 1, '2022-05-25 09:11:24', '2022-05-25 09:11:24'),
(4, 'Eius quidem error.', 'Commodi est enim et doloribus. Porro eum ut et molestiae quisquam impedit officiis magnam. Qui recusandae architecto corporis. Debitis omnis et deserunt magnam quod neque repudiandae.', '-5542', NULL, NULL, 4, 1, '2022-05-25 09:11:24', '2022-05-25 09:11:24'),
(5, 'Veniam et et qui.', 'Vero error et enim. Rerum et sed dolores itaque repellendus dignissimos.', '-5077', NULL, NULL, 5, 1, '2022-05-25 09:11:24', '2022-05-25 09:11:24'),
(6, 'Winter Frank', '<p>Winter Frank</p>', '1653471424.png', '2022/05', 193, 6, 1, '2022-05-25 09:37:05', '2022-05-25 09:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `group`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'general', 'title', 'MATRIX Engineering Services', NULL, NULL),
(2, 'general', 'slogan', 'elevate comfortable living', NULL, NULL),
(3, 'general', 'mobile_number', '8801713018796', NULL, NULL),
(4, 'general', 'email', 'info@matrixlift.com.bd', NULL, NULL),
(5, 'general', 'tel', '0197301879', NULL, NULL),
(6, 'general', 'copyright', 'all right reserved', NULL, NULL),
(7, 'general', 'city', 'Dhaka', NULL, NULL),
(8, 'general', 'state', 'Dhaka', NULL, NULL),
(9, 'general', 'country', 'Bangladesh', NULL, NULL),
(10, 'general', 'zip', '1213', NULL, NULL),
(11, 'general', 'street', 'Suite # 01, House – 120, Road – 1, Block – F, Banani', NULL, NULL),
(12, 'general', 'tax', NULL, NULL, NULL),
(13, 'general', 'tax_type', NULL, NULL, NULL),
(14, 'general', 'currency_name', NULL, NULL, NULL),
(15, 'general', 'currency_symbol', NULL, NULL, NULL),
(16, 'general', 'meta_description', NULL, NULL, NULL),
(17, 'general', 'keywords', NULL, NULL, NULL),
(18, 'home_banner', 'title_text_1', NULL, NULL, NULL),
(19, 'home_banner', 'title_text_2', NULL, NULL, NULL),
(20, 'home_banner', 'short_description', NULL, NULL, NULL),
(21, 'home_banner', 'button_text', NULL, NULL, NULL),
(22, 'home_banner', 'button_url', NULL, NULL, NULL),
(23, 'social', 'facebook', 'https://www.facebook.com', NULL, NULL),
(24, 'social', 'twitter', 'https://www.tw.com', NULL, NULL),
(25, 'social', 'youtube', 'https://www.youtube.com', NULL, NULL),
(26, 'social', 'instagram', 'https://www.instagram.com', NULL, NULL),
(27, 'social', 'linkedin', 'https://www.linkedin.com', NULL, NULL),
(28, 'general', 'logo', 'logo.png', NULL, NULL),
(29, 'general', 'favicon', 'favicon.png', NULL, NULL),
(30, 'general', 'og_image', 'og_image.png', NULL, NULL),
(31, 'media', 'small_width', '150', NULL, NULL),
(32, 'media', 'small_height', '150', NULL, NULL),
(33, 'media', 'medium_width', '400', NULL, NULL),
(34, 'media', 'medium_height', '500', NULL, NULL),
(35, 'media', 'large_width', '1280', NULL, NULL),
(36, 'media', 'large_height', '720', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `position` int(11) NOT NULL DEFAULT 1000,
  `text_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_1_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_1_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_2_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_2_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `slider_type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=image,2=video,3=script',
  `bg_opacity` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=hide,1=show',
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_script` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `status`, `position`, `text_1`, `text_2`, `text_3`, `button_1_text`, `button_1_url`, `button_2_text`, `button_2_url`, `short_description`, `description`, `image`, `image_path`, `media_id`, `slider_type`, `bg_opacity`, `video`, `slider_script`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1000, 'Test', NULL, NULL, 'test', NULL, NULL, NULL, NULL, 'dsadsadsa', '1638773143.jpg', '2021/12', 2, 1, 0, NULL, NULL, '2021-12-12 06:09:16', '2021-12-06 06:43:34', '2021-12-12 06:09:16'),
(2, 1, 1000, 'test2', NULL, NULL, 'test2', NULL, NULL, NULL, NULL, 'dsfds fsd fsda fds', '1638773292.jpg', '2021/12', 3, 1, 0, NULL, NULL, '2021-12-12 06:09:19', '2021-12-06 06:48:13', '2021-12-12 06:09:19'),
(3, 1, 1000, '.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '.', '1639242708.png', '2021/12', 31, 1, 0, NULL, NULL, '2021-12-18 19:02:21', '2021-12-12 06:10:46', '2021-12-18 19:02:21'),
(4, 1, 1000, '.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '.', '1639242725.png', '2021/12', 32, 1, 0, NULL, NULL, '2021-12-18 19:02:25', '2021-12-12 06:12:06', '2021-12-18 19:02:25'),
(5, 1, 1000, 'Video', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Video', NULL, NULL, NULL, 2, 0, '1639807397_Nourish_original_intro.mp4', NULL, '2022-02-03 07:06:06', '2021-12-18 19:03:17', '2022-02-03 07:06:06'),
(6, 1, 1000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, '1640278343_Nourish_original_intro.mp4', NULL, '2022-02-02 13:25:43', '2021-12-24 05:52:23', '2022-02-02 13:25:43'),
(7, 1, 1000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1643874052.jpeg', '2022/02', 100, 1, 0, NULL, NULL, '2022-02-03 07:53:38', '2022-02-03 07:40:52', '2022-02-03 07:53:38'),
(8, 1, 1000, 'Advance your career', 'Unlimited', 'Online Learning', 'view courses', '#', NULL, NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat voluptatem incidunt doloribus obcaecati quidem, repellendus vero ullam fugiat libero suscipit?', '1648535201.jpg', '2022/03', 116, 1, 0, NULL, NULL, '2022-04-06 03:32:28', '2022-02-03 07:41:36', '2022-04-06 03:32:28'),
(9, 1, 1000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, '1644994640_2022-01-29 14-37-26.mp4', NULL, '2022-02-16 19:46:38', '2022-02-16 06:57:20', '2022-02-16 19:46:38'),
(10, 1, 0, 'Advance your career', 'Unlimited', 'Online Learning', 'view courses', '#', NULL, NULL, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '1649215963.jpg', '2022/04', 125, 1, 1, NULL, NULL, NULL, '2022-02-16 06:58:28', '2022-05-26 09:08:17'),
(11, 1, 1, 'Advance your career', NULL, NULL, 'view courses', '#', NULL, NULL, NULL, 'Hello World', '1653556055.png', '2022/05', 217, 1, 0, NULL, NULL, NULL, '2022-05-26 09:07:36', '2022-05-26 09:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 1000,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `position` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `email`, `phone`, `image`, `image_path`, `media_id`, `message`, `status`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Rowena Pacocha MD', 'jones.karine@example.com', '435-287-2495', 'et', NULL, NULL, '<p>Hello world</p>', 1, 1, '2022-05-24 13:12:17', '2022-05-25 04:38:02'),
(5, 'Jude Kessler', 'yadira.yost@example.org', '+1-947-950-6578', 'aut', NULL, NULL, '<p>jude kessler</p>', 1, 2, '2022-05-24 13:12:17', '2022-05-25 04:39:04'),
(6, 'Arif Hossain', 'admin@email.com', '01671971362', '1653399969.png', '2022/05', 192, '<p>Hello worlds</p>', 1, 3, '2022-05-24 13:44:23', '2022-05-25 04:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `role_id` bigint(20) DEFAULT NULL,
  `status` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` timestamp NULL DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `role_id`, `status`, `first_name`, `last_name`, `email`, `mobile_number`, `dob`, `profile_image`, `address`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', 1, 'approved', 'Jhon', 'Doe', 'admin@me.com', '123456789', NULL, '1652676351.png', 'Dhaka', '$2y$10$Tyv8gttaJA9QJDe57SZ5dutdEGXrMnJRpokHJWnk1hQikFH2mhp/e', NULL, NULL, '2021-12-16 05:56:51', '2022-05-16 04:55:11'),
(18, 'member', 0, 'approved', 'Test2', 'Test', 'test@email.com', '4315432', NULL, NULL, 'vdsa fdsa fd', '$2y$10$MbJRBDUHjRFgOHLsm93ds.n.GntSCpjbUGFxCpyPMR0GSgvxsoFNe', NULL, NULL, '2022-02-16 10:11:26', '2022-02-16 10:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `values`
--

CREATE TABLE `values` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `values`
--

INSERT INTO `values` (`id`, `title`, `description`, `image`, `image_path`, `media_id`, `position`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Test Value', '<p>Test Value</p>', '1653473764.webp', '2022/05', 195, 10, 1, '2022-05-25 10:16:04', '2022-05-25 10:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE `widgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `placement` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` bigint(20) NOT NULL DEFAULT 1000,
  `text` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`id`, `status`, `placement`, `title`, `type`, `position`, `text`, `menu_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Footer', 'Footer Menu One', 'Menu', 1, NULL, 3, NULL, '2022-05-25 11:49:39', '2022-05-25 11:57:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_items`
--
ALTER TABLE `gallery_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_sections`
--
ALTER TABLE `home_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_media`
--
ALTER TABLE `portfolio_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_media`
--
ALTER TABLE `product_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_specifications`
--
ALTER TABLE `product_specifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_specification_values`
--
ALTER TABLE `product_specification_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_contacts`
--
ALTER TABLE `request_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reunions`
--
ALTER TABLE `reunions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_design_types`
--
ALTER TABLE `section_design_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_names`
--
ALTER TABLE `section_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `values`
--
ALTER TABLE `values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `widgets_menu_id_foreign` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gallery_items`
--
ALTER TABLE `gallery_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `home_sections`
--
ALTER TABLE `home_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `portfolio_media`
--
ALTER TABLE `portfolio_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_media`
--
ALTER TABLE `product_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_specifications`
--
ALTER TABLE `product_specifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_specification_values`
--
ALTER TABLE `product_specification_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request_contacts`
--
ALTER TABLE `request_contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reunions`
--
ALTER TABLE `reunions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `section_design_types`
--
ALTER TABLE `section_design_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `section_names`
--
ALTER TABLE `section_names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `values`
--
ALTER TABLE `values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `widgets`
--
ALTER TABLE `widgets`
  ADD CONSTRAINT `widgets_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
