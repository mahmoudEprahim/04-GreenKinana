-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 11 مارس 2020 الساعة 14:36
-- إصدار الخادم: 5.6.41-84.1
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infosas_greenkinana`
--

-- --------------------------------------------------------

--
-- بنية الجدول `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'infosas', 'infosas2019@infoics.com', '$2y$10$6wXsA25MH9Vywq9z5/5FEeAu2q8cpTLORfJPeReO6IMTi7T69Z.2C', NULL, 'vf8ufH0Vu4TvxBZZlAtqPACxZb9KxQf8myiiy01fxE1Gb0WebMyw0axagZAp', NULL, NULL),
(4, 'admin', 'landscape@greenkinana.online', '$2y$10$ec9iR/uYrghbOglvgLE09OSXtFYhxBs7XNOGlM0AtR/hZgpYYT1iu', 'admins/bxqpcf99cSmh8D0LdutNmySMM9fnn0qPcZq1hEhb.jpeg', 'W9kG3ewpuoSStKy6iqANMxw59j8qLjEFMFBJBiIzeNjgKt3ls5YNE9GidQSO', '2020-03-09 21:19:28', '2020-03-09 21:30:07');

-- --------------------------------------------------------

--
-- بنية الجدول `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_receivables` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accrued_income` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `box_account` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fee_income` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mini_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `Cat_No` smallint(6) DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` text COLLATE utf8mb4_unicode_ci,
  `name_en` text COLLATE utf8mb4_unicode_ci,
  `desc_ar` text COLLATE utf8mb4_unicode_ci,
  `desc_en` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `images`
--

INSERT INTO `images` (`id`, `image`, `name_ar`, `name_en`, `desc_ar`, `desc_en`, `created_at`, `updated_at`) VALUES
(31, 'files/Image 3.png_1580909838.png', 'Arabic Name', 'English Name', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'الوصف بالعربي', '2020-02-05 13:37:18', '2020-02-16 21:16:21'),
(32, 'files/img (70).jpg_1580909839.jpg', 'Arabic Name', 'English Name', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2020-02-05 13:37:19', '2020-02-05 13:37:19'),
(33, 'files/slider.jpg_1580909839.jpg', 'الأسرة السعيدة', 'Happy Family', '(الأسرة - التعاون - السعادة  - البهجة - الفرحة ) كلها معان تتجسد في هذه الصورة وجمعتها الحديقة المنزلية', '(Family - cooperation - happiness - joy - joy) all of the gloss embodied in this picture and collected by the home garden', '2020-02-05 13:37:19', '2020-02-17 17:04:55'),
(34, 'files/item492466.jpg_1581625471.jpg', 'منظر طبيعي', 'landscaping', 'اجعل البهجة تعلو وجهك عند دخولك على أطفالك فرؤية منظر بديع وتصميم رائع لحديقة منزلك ترسم البسمة على وجهك وتزيل عنك آثار التعب والإرهاق الذي عانيته في يوم عملك', 'Make your face feel better when you enter your children, seeing a beautiful view and a beautiful design of your garden paint a smile on your face and remove the effects of the fatigue and fatigue you experienced on your work day.', '2020-02-14 04:24:31', '2020-02-17 16:52:26'),
(35, 'files/15fc22bc-a1c1-4253-a9e7-b14519b09643.jpg_1581625515.jpg', 'ممر حديقة منزلك', 'Your garden lane.', 'روعة التصميم واتقان العمل يريح أعصابك ويزل عنك هموما عانيتها في يوم عمل شاق ومن ذلك ممر بيتك من الخارج إلى عند أطفالك', 'The beauty of the design and mastery of work relaxes your nerves and relieves you of what you suffered on a hard day of work, including the corridor of your home from the outside to your children', '2020-02-14 04:25:15', '2020-02-17 16:55:47'),
(36, 'files/79f3010809aa7f2cac6267ffdc3459a8.jpg_1581625550.jpg', 'النافورة', 'The fountain.', 'هل هناك أجمل من جلسة وسط عائلتك في منزلك تحيط بكم المناظر الطبيعية الخلابة وخرير الماء المتدفق الأمر يحتاج فكرة', 'Is there more beautiful than a session in the middle of your family in your home surrounded by stunning landscapes and the water-flowing water it needs an idea', '2020-02-14 04:25:50', '2020-02-17 16:58:27');

-- --------------------------------------------------------

--
-- بنية الجدول `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(13, 'Raghda Yasser', 'raghdayasser47@gmail.com', NULL, '0123456789999', '2020-03-08 18:09:09', '2020-03-08 18:09:09'),
(15, 'abu abdallah', 'ahmedsherbeny996@gmail.com', NULL, 'محتوى الرسالة 2020/3/9', '2020-03-10 02:46:25', '2020-03-10 02:46:25'),
(16, 'jess', 'jess@gmail.com', NULL, 'dsa;lfksa;\'flka;l\'sfksa;\'lfka;s\'fk;sa\'flka;s\'flk;sa\'lfksa;lfksa;\'flka;s\'lkf;salfk;salfk', '2020-03-10 15:10:00', '2020-03-10 15:10:00'),
(17, 'Ahmed Hamouda', 'ahmedsherbeny_96@outlook.com', NULL, '12345678910.325555555', '2020-03-10 16:05:19', '2020-03-10 16:05:19');

-- --------------------------------------------------------

--
-- بنية الجدول `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2019_01_09_090550_create_admins_table', 1),
(8, '2019_01_10_112522_create_branches_table', 1),
(9, '2019_01_11_131556_create_permission_tables', 1),
(10, '2019_01_13_101525_create_files_table', 1),
(11, '2019_09_18_091042_create_settings_table', 1),
(12, '2020_02_01_164435_create_messages_table', 1),
(13, '2020_02_02_121016_create_categories_table', 1),
(14, '2020_02_02_144707_create_sub_categories_table', 1),
(15, '2020_02_02_152434_create_slider_table', 1),
(16, '2020_02_03_105701_create_videos_table', 2),
(17, '2020_02_03_131531_create_images_table', 3),
(18, '2020_02_04_105313_create_services_table', 4),
(19, '2020_02_06_075811_create_orders_table', 5);

-- --------------------------------------------------------

--
-- بنية الجدول `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Admin', 4),
(2, 'App\\Admin', 4),
(3, 'App\\Admin', 4);

-- --------------------------------------------------------

--
-- بنية الجدول `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Admin', 1),
(2, 'App\\Admin', 1),
(3, 'App\\Admin', 1),
(4, 'App\\Admin', 1),
(5, 'App\\Admin', 1),
(1, 'App\\Admin', 4),
(2, 'App\\Admin', 4),
(3, 'App\\Admin', 4),
(4, 'App\\Admin', 4),
(5, 'App\\Admin', 4);

-- --------------------------------------------------------

--
-- بنية الجدول `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `message`, `service_id`, `created_at`, `updated_at`) VALUES
(2, 'Kamal ahmed', 'ahmedsherbeny996@gmail.com', '01009430914', 'my first order', 6, '2020-02-06 09:46:25', '2020-02-06 09:46:25'),
(9, 'Awadh Raafat Abomosallem', 'abo.tasneem207@gmail.com', '0562166607', 'test of your wark', 2, '2020-03-10 17:36:03', '2020-03-10 17:36:03');

-- --------------------------------------------------------

--
-- بنية الجدول `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create', 'admin', NULL, NULL),
(2, 'edit', 'admin', NULL, NULL),
(3, 'delete', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'writer', 'admin', NULL, NULL),
(2, 'reader', 'admin', NULL, NULL),
(3, 'admin', 'admin', NULL, NULL),
(4, 'meeting', 'admin', NULL, NULL),
(5, 'account', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `services`
--

INSERT INTO `services` (`id`, `image`, `desc_en`, `desc_ar`, `created_at`, `updated_at`) VALUES
(1, 'service/HJfPBVtZace2qOGo66wK9mxQ2VzcSHvimiJKQqRS.jpeg', 'service one', 'تنسيق الحدائق المنزلية', '2020-02-05 09:40:43', '2020-02-14 16:07:12'),
(2, 'service/cIJwbrIyoVX5YXANwWZvzZSLo0Q4bkiG27Y8eCSq.jpeg', 'Sale and supply of natural and industrial grass', 'بيع وتوريد العشب الطبيعي والصناعي', '2020-02-05 09:40:58', '2020-02-14 16:09:06'),
(3, 'service/CRQcSmLqhWW2u6QmLXwfRQ6Mvdq1MduUiwwWuK4w.jpeg', 'Afforestation, gardening and home gardening, care and care for palms and fruit trees', 'التشجير ورعاية الحدائق العامة والمنزلية ورعاية والعناية بالنخيل والأشجار المثمرة', '2020-02-05 09:41:11', '2020-02-14 16:11:41'),
(4, 'service/tVI0rc8Mba0e10iWPTn48L1MlADpqlDbDserrl63.jpeg', 'Installation and extension of various irrigation systems', 'تمديد وتركيب شبكات الري المختلفة', '2020-02-05 09:41:25', '2020-02-14 16:16:55'),
(5, 'service/cLzHO6UkIintbAdY0aIRhuvlXEdCv14dg1IO8Lb7.jpeg', 'Design and installation of classical waterfall fountains and modern', 'تصميم وتركيب النوافير الشلالات الكلاسيكية والمودرن', '2020-02-05 09:41:35', '2020-02-14 16:20:29'),
(6, 'service/qt0johLCHwI0TVwoRZQwaAGOTrtgPzYpZtR1QoXK.jpeg', 'Exterior decorations and corridors', 'تصميم الديكورات الخارجية والممرات', '2020-02-05 09:41:46', '2020-02-14 16:35:11'),
(7, 'service/pqPoPh8nH4eSvPFszBAz6bS7Um5r00qGVdHZHbBQ.jpeg', 'Garden Umbrellas (Pergola)', 'مظلات الحدائق (برجولات)', '2020-03-10 18:31:03', '2020-03-10 18:31:03');

-- --------------------------------------------------------

--
-- بنية الجدول `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `sitename_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sitename_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qinana_added_val_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qinana_added_val_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_ar` text COLLATE utf8mb4_unicode_ci,
  `logo_en` text COLLATE utf8mb4_unicode_ci,
  `abou_us_bg_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ar',
  `main_currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fees` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_header_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_site_ar` longtext COLLATE utf8mb4_unicode_ci,
  `about_site_en` longtext COLLATE utf8mb4_unicode_ci,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snapshat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `settings`
--

INSERT INTO `settings` (`id`, `sitename_ar`, `sitename_en`, `qinana_added_val_en`, `qinana_added_val_ar`, `logo_ar`, `logo_en`, `abou_us_bg_img`, `email`, `main_lang`, `main_currency`, `fees`, `main_color`, `footer_header_color`, `about_site_ar`, `about_site_en`, `phone`, `phone_2`, `facebook`, `snapshat`, `pinterest`, `instagram`, `youtube`, `address_en`, `address_ar`, `keyword`, `created_at`, `updated_at`) VALUES
(1, 'الكنانة', 'alkinana', 'The best place to design your home garden.', '.أفضل مكان لتصميم حديقة منزلك', '', 'setting/erqRLy1ntMiYoya0iByZbQN7DKu2e0uE1J0vzAET.jpeg', 'setting/rvErxTnZ3IPlhvZGmWPrsN7gFEdHZZAd7b4jhsRM.jpeg', 'landscape@greenkinana.online', 'ar', '', NULL, '', '', 'نحن شركة الكنانة الخضراء بجدة ولنا تعاقدات بالطائف والرياض سجل تجاري رقم (4030374976)للمشاتل الزراعيه وتنسيق الحدائق وتركيب جميع انواع التيل الطبيعي والصناعي وتركيب الديكورات الزراعيه وتركيب شبكات الري وزراعة النخيل وتركيب وتخطيط ملاعب كره القدم وتركيب الديكورات والعشب الجداري واعمال المظلات الخشبية ومظلات السيارات والسواتر.\r\n وهذه نبذة بسيطة عن أنواع الحدائق وأساليب تنسيقها منها: 1. الحديقة اليابانية :- هذا النوع من الحدائق يشبه شكل الغابات بشكل كبير، لأنه يحتوي على مجموعة من التلال الصغيرة، بالإضافة إلى بعض الشلالات الخاصة بالمياه التي تعطي الحديقة منظر أروع. يتم زراعة أشجار طويلة وعريضة مثل أشجار الصفصاف، لأن مثل هذه الحدائق تكون هي الواجهة لمدخل المنزل.\r\n2. الحديقة الإسبانية :- في هذا النوع من الحدائق يرى الشخص القادم إلى المنزل الذوق العربي فيها، لأنها تحتوي على أشجار طويلة، كما أنها تحتوي على مجموعة أحواض خاصة بالورد، ويتم تنسيق هذه الحديقة بشكل جذاب ومميز. يفضل أن تحتوي الأرضية في هذه الحديقة على الفسيفساء لأنه متناسب بشكل أفضل من الحديقة الإسبانية. \r\n3. الحديقة الفرنسية :- تتميز هذه الحديقة بطابع الهدوء، لأنها تحتوي على الكثير من الأشجار، والورود، وكذلك تحتوي على إنجيل أخضر يغطي كل مساحة الحديقة. يضاف للحديقة الفرنسية بركة مياه، من حولها مساحة يمكن الجلوس فيها، وكذلك يكون المسبح الخاص بالمياه يسمح للنزول فيها والاستحمام. 4. الحديقة الإنجليزية :- هذه الحديقة تتميز بالرقة والبساطة، وتكون فيها الأشجار بأشكال متناسقة، ولا يفضل وضع الأشجار بشكل متناثر، ويجب أن تحتوي هذه الحديقة على جزء مخصص للجلوس يكون عبارة عن كراسي وطاولة بسيطة.', 'We are The Green Kinana company in Jeddah and we have contracts in Taif and Riyadh commercial record no. (4030374976) for agricultural nurseries and coordination of gardens and installation of all kinds of natural and industrial grass and installation of agricultural decorations and installation of irrigation systems and palm cultivation and installation and planning of football fields and installation Decorations, wall grass, wooden umbrellas, car umbrellas and fences.\r\n There are several methods through which to coordinate home gardens, including: 1. Japanese garden:- This type of garden is very similar to the shape of the forest, because it contains a set of small hills, in addition to some waterfalls of water that give The garden has a great view. Tall and wide trees are grown like willow trees, because such gardens are the façade of the entrance to the house.\r\n2. Spanish garden: - In this type of garden the person who comes to the house sees the Arabic taste in it, because it contains long trees, it also contains a set of basins special roses, and this garden is coordinated attractively and distinctively. The floor in this garden is preferred to have mosaics because it is better suited than the Spanish garden. \r\n3. French Garden: - This garden is quiet, because it contains a lot of trees and roses, as well as a green gospel covering the entire area of the garden. The French garden is added to a pool of water, around which it can sit, and the water pool allows to go down and bathe. 4. English Garden: - This garden is characterized by tenderness and simplicity, where trees are in harmonious forms, and it is not preferable to place trees scattered, and this garden must have a seating part consisting of chairs and a simple table.', '00966533824373', '00966562166607', 'https://www.facebook.com/profile.php?id=100046964941812', 'https://www.snapchat.com/add/thegkinana', 'https://www.pinterest.com/gkinana/', 'https://www.instagram.com/green.kinana/', NULL, 'Kingdom of Saudi Arabia - Jeddah - Rabwah neighborhood - Yahya Al-Muallami Street', 'المملكة العربية السعودية - جدة - حي الربوة - شارع يحيى المعلمي', 'الكنانة شركة سعودية تضم فريق عمل همه جودة مخرجات العمل بإتقان وتفان ونسعد دوما بخدمة عملائنا', NULL, '2020-03-09 21:26:38');

-- --------------------------------------------------------

--
-- بنية الجدول `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `desc_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `sliders`
--

INSERT INTO `sliders` (`id`, `desc_en`, `desc_ar`, `image`, `created_at`, `updated_at`) VALUES
(7, NULL, NULL, 'slider/EJ5LDzx7RrqLOKvbJm4to4Cnwk7QgY50gRLuArqk.png', '2020-02-11 16:51:24', '2020-02-11 16:51:24'),
(8, NULL, NULL, 'slider/wGm3LkAZezcKa3Aetf5BohZlnjuBGZW3q7XONBAE.jpeg', '2020-02-11 17:44:06', '2020-02-11 17:44:06');

-- --------------------------------------------------------

--
-- بنية الجدول `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `sub_cat_No` smallint(6) DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_src` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` text COLLATE utf8mb4_unicode_ci,
  `name_en` text COLLATE utf8mb4_unicode_ci,
  `desc_ar` text COLLATE utf8mb4_unicode_ci,
  `desc_en` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `videos`
--

INSERT INTO `videos` (`id`, `image`, `video_src`, `name_ar`, `name_en`, `desc_ar`, `desc_en`, `created_at`, `updated_at`) VALUES
(1, NULL, 'https://www.youtube.com/embed/ARwB7xb--sQ', 'كيفية زراعة الزهور | رعاية الحديقة والحديقة', 'How to Plant Flowers | Lawn & Garden Care', 'هذا فيديو قصير عن كيفية زراعة الزهور. مثل أي نبات ، فإن أحد الأشياء الرئيسية التي تريد أن تتذكرها هو عدم زرعها بعمق كبير. كثير من الناس يرتكبون هذا الخطأ وينتهي بهم المطاف في صنع حوض استحمام صغير يتجمع فيه الماء وتعفن الجذور في النهاية لأنها رطبة للغاية. حتى إذا كنت قد حصلت على عينة جميلة مثل هذه rudbeckia triloba.', 'This is a short video on how to grow flowers. Like any plant, one of the main things you want to remember is not to plant it too deeply. Many people make this mistake and end up making a small tub where the water collects and the roots eventually rot because they are too wet. So if you\'ve got a nice sample like this rudbeckia triloba.', '2020-02-03 09:20:33', '2020-02-09 09:21:47'),
(2, NULL, 'https://www.youtube.com/embed/GwZ6d4cjfAY', 'تقنية ترتيب زهرة لولبية', 'Spiral flower arranging technique', 'زهور و لوازم الزهور بالجملة | تسليم المملكة المتحدة على الصعيد الوطني', 'This is the roof top garden on newly contructed house in Hyderabad suburbs.', '2020-02-03 10:39:11', '2020-02-09 09:19:36'),
(3, NULL, 'https://www.youtube.com/embed/vx4D9bHC_gY', 'زهرة السرير تحول بداية الى النهاية', 'Flower Bed Makeover Start to Finish', 'زهرة السرير تحول بداية الى النهاية', 'This is the roof top garden on newly contructed house in Hyderabad suburbs.', '2020-02-03 10:39:11', '2020-02-09 09:15:08'),
(4, NULL, 'https://www.youtube.com/embed/I7J5XogSnVE', 'حديقة على السطح', 'Rooftop Garden on our House.mp4', 'هذه هي الحديقة الموجودة على السطح في المنازل المشيدة حديثًا في ضواحي حيدر أباد.', 'This is the rooftop garden in newly built homes on the outskirts of Hyderabad.', '2020-02-08 11:15:37', '2020-02-09 09:21:24'),
(6, NULL, 'https://www.youtube.com/embed/YI5lz3jaPYY', 'زراعة النباتات والورد في المنزل', 'Growing plants and roses at home', 'افكار ابداعية لزراعة النباتات والورد في المنزل على البلكونة واسطح المنازل', 'Creative ideas for growing plants and roses at home on the balcony and rooftops', '2020-02-14 20:23:19', '2020-02-14 20:23:19'),
(7, NULL, 'https://www.youtube.com/embed/5N_vvVjnjQE', 'أجمل نباتات الزينة', 'The most beautiful ornamental plants', 'أشهر وأجمل نباتات الزينة المنزلية', 'The most famous and beautiful home decoration plants', '2020-02-14 20:31:42', '2020-02-14 20:31:42');

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
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_service_id_index` (`service_id`);

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
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON UPDATE CASCADE;

--
-- القيود للجدول `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
