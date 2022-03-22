-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2021 at 05:35 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_activate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `created_at`, `updated_at`, `name`, `email`, `password`, `phone`, `photo`, `is_activate`) VALUES
(3, '2021-09-19 16:46:12', '2021-09-20 06:00:44', 'AmrHussien', 'amr@gmail.com', '$2y$10$ocN/JayLari2hmu2jttzV.PgY/EFOPl9yegouzBnrdKZ/0qxKi7Xe', '01533456789', 'admin/assets/images/admins/163212406996390.jpg', 1),
(5, '2021-09-20 06:34:09', '2021-09-20 06:34:09', 'Tasha Forbes', 'suriqorabu@mailinator.com', '$2y$10$gE07vuRHItIscKh.6BlZeefJfdKd6Nv24OWJDnS.3NeSRc9IXUIOi', '67', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `city` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_applied_of` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grandfather_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_of_birth` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` int(11) DEFAULT NULL,
  `employed_by_this_company` int(11) DEFAULT NULL,
  `start_working` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employed_now` int(11) DEFAULT NULL,
  `dependents` int(11) DEFAULT NULL,
  `G_O_S_I_O_available` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minimum_salary_required` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_data` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judicial_ruling` int(11) DEFAULT NULL,
  `reason_judicial_ruling` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `get_to_know_the_job` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `created_at`, `updated_at`, `city`, `position_applied_of`, `photo`, `first_name`, `father_name`, `grandfather_name`, `family_name`, `birth`, `place_of_birth`, `nationality`, `religion`, `marital_status`, `employed_by_this_company`, `start_working`, `employed_now`, `dependents`, `G_O_S_I_O_available`, `minimum_salary_required`, `other_data`, `judicial_ruling`, `reason_judicial_ruling`, `get_to_know_the_job`) VALUES
(1, '2021-09-20 16:45:54', '2021-09-20 16:45:54', 'القاهره', 'مدير', NULL, 'عمرو', 'حسين', 'حسن', 'عبدالله', '10/1/2020', 'مدينه نصر', 'مصر', 'مسلم', 1, 1, 'في اي وقت', 1, 1, '2-5-4-1-5-6-7-4-8', '2000', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees_company_previous`
--

CREATE TABLE `employees_company_previous` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `from` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_org` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_title` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allowance` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_for_quit` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employe_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees_company_previous`
--

INSERT INTO `employees_company_previous` (`id`, `created_at`, `updated_at`, `from`, `to`, `name_of_org`, `address`, `telephone`, `job_title`, `description`, `salary`, `allowance`, `reason_for_quit`, `employe_id`) VALUES
(1, '2020-11-22 04:41:20', '2020-11-22 04:40:36', '10/10/2020', '10/10/2020', 'aaaaaaaaa', 'aaaaaaaa aaaaaaaaa aaaaaaa aaaaaaaaaa aaaaaaaaaaaaaaaaa aaaaaaaaaaa', '1451211', 'asdasdasdads', 'asdaaaaaaaaa asdassaaaaaaaaaaadas asdas asdadddddddddd asdascasdasdasd', '2000', '1200', 'aaaa aaaaaa aaaaaaa aaaaaaaaa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees_contact`
--

CREATE TABLE `employees_contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_adderss` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employe_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees_contact`
--

INSERT INTO `employees_contact` (`id`, `created_at`, `updated_at`, `mobile`, `email`, `post`, `home_phone`, `work_phone`, `present_adderss`, `employe_id`) VALUES
(2, '2020-11-22 04:41:20', '2020-11-22 04:40:36', '56144445', 'amr@gmail.com', '55165516', '21212112', '454451', 'scascas sssssssssss aaaaaaaaaa ssssssssssssss ddddddddd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees_dependents`
--

CREATE TABLE `employees_dependents` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employe_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees_dependents`
--

INSERT INTO `employees_dependents` (`id`, `created_at`, `updated_at`, `name`, `age`, `relation`, `address`, `employe_id`) VALUES
(1, '2020-11-22 04:41:20', '2020-11-22 04:40:36', 'hklklklkl', '20', 'امي', 'aaaaaaaaa aaaaaaaaaaa dddddddddd wwwwwwwwww eeeeeeeeeeeeeee', 1),
(2, '2020-11-22 04:41:20', '2020-11-22 04:40:36', 'aassaass', '20', 'dad', '55aaaaaaaaa 55aaaaaaaaaaa 55dddddddddd 55wwwwwwwwww 55eeeeeeeeeeeeeee', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees_driving_licence`
--

CREATE TABLE `employees_driving_licence` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `number` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` int(10) UNSIGNED DEFAULT NULL,
  `date_of_issue` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_of_issue` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employe_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees_driving_licence`
--

INSERT INTO `employees_driving_licence` (`id`, `created_at`, `updated_at`, `number`, `expiry_date`, `blood_group`, `category`, `date_of_issue`, `place_of_issue`, `employe_id`) VALUES
(1, '2020-11-22 04:41:20', '2020-11-22 04:40:36', '614510645', '11/11/2030', 'as', 12, '20/2/2010', 'cairo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees_educations`
--

CREATE TABLE `employees_educations` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `place_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialize` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employe_id` int(10) UNSIGNED NOT NULL,
  `stage_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees_educations`
--

INSERT INTO `employees_educations` (`id`, `created_at`, `updated_at`, `place_name`, `country`, `city`, `from`, `to`, `specialize`, `grade`, `employe_id`, `stage_id`) VALUES
(1, '2020-11-22 04:41:20', '2020-11-22 04:40:36', 'aaaaaaaa', 'aaaaaaaaa', 'aaaaaaaa', '10/10/2020', '10/10/2020', 'sssssssssss', '50', 1, 2),
(2, '2020-11-22 04:41:20', '2020-11-22 04:40:36', '5555aaaaaaaa', '5555aaaaaaaaa', '55555aaaaaaaa', '55/10/2020', '55/10/2020', '5555555sssssssssss', '555550', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `employees_id`
--

CREATE TABLE `employees_id` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `card_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_of_issue` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_issue` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employe_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees_id`
--

INSERT INTO `employees_id` (`id`, `created_at`, `updated_at`, `card_id`, `place_of_issue`, `date_of_issue`, `employe_id`) VALUES
(1, '2020-11-22 04:41:20', '2020-11-22 04:40:36', '16454654654', 'cairo', '20/2/2010', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees_languages`
--

CREATE TABLE `employees_languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `speaking` int(11) DEFAULT NULL,
  `reading` int(11) DEFAULT NULL,
  `writing` int(11) DEFAULT NULL,
  `shorthand_speed` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typing_speed` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_skills` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employe_id` int(10) UNSIGNED NOT NULL,
  `lang_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees_languages`
--

INSERT INTO `employees_languages` (`id`, `created_at`, `updated_at`, `speaking`, `reading`, `writing`, `shorthand_speed`, `typing_speed`, `other_skills`, `employe_id`, `lang_id`) VALUES
(1, '2020-11-22 04:41:20', '2020-11-22 04:40:36', 1, 2, 1, '100', '100', NULL, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `employees_not_relatives_employed`
--

CREATE TABLE `employees_not_relatives_employed` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employe_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees_not_relatives_employed`
--

INSERT INTO `employees_not_relatives_employed` (`id`, `created_at`, `updated_at`, `name`, `position`, `company`, `telephone`, `address`, `employe_id`) VALUES
(1, '2020-11-22 04:41:20', '2020-11-22 04:40:36', 'amr', 'manger', 'jjjjjjjjjjjjjj', '1451211', 'hhhhhhhhhhh hhhhhhhhhhhhh jjjjjjjjjjjjj kkkkkkkkkkkkkkkkkkkk', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees_passport`
--

CREATE TABLE `employees_passport` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `passport` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_of_issue` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_issue` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employe_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees_passport`
--

INSERT INTO `employees_passport` (`id`, `created_at`, `updated_at`, `passport`, `place_of_issue`, `date_of_issue`, `employe_id`) VALUES
(1, '2020-11-22 04:41:20', '2020-11-22 04:40:36', '454156453146', 'cairo', '20/2/2010', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees_relatives_employed`
--

CREATE TABLE `employees_relatives_employed` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empolye_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees_relatives_employed`
--

INSERT INTO `employees_relatives_employed` (`id`, `created_at`, `updated_at`, `name`, `empolye_id`) VALUES
(1, '2020-11-22 04:41:20', '2020-11-22 04:40:36', 'amr', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees_skills`
--

CREATE TABLE `employees_skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `skills` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employe_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees_skills`
--

INSERT INTO `employees_skills` (`id`, `created_at`, `updated_at`, `skills`, `employe_id`) VALUES
(1, '2020-11-22 04:41:20', '2020-11-22 04:40:36', 'jjjjjjjjjjjjjnv fffffffffffffffff sdeeeeeeeeeeee ewwwwwwww', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees_trining_courses`
--

CREATE TABLE `employees_trining_courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_of_institute` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialize` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employe_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees_trining_courses`
--

INSERT INTO `employees_trining_courses` (`id`, `created_at`, `updated_at`, `name_of_institute`, `country`, `city`, `from`, `to`, `specialize`, `employe_id`) VALUES
(1, '2020-11-22 04:41:20', '2020-11-22 04:40:36', 'xcvxcxcvds', 'aaaaaaaaa', 'القاهره', '10/10/2020', '10/10/2020', 'sssssssssss', 1);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_07_03_121135_create_admins_table', 2),
(8, '2014_10_12_000000_create_users_table', 3),
(33, '2021_09_20_163619_create_employees_company_previous_table', 4),
(34, '2021_09_20_163619_create_employees_contact_table', 4),
(35, '2021_09_20_163619_create_employees_dependents_table', 4),
(36, '2021_09_20_163619_create_employees_driving_licence_table', 4),
(37, '2021_09_20_163619_create_employees_educations_table', 4),
(38, '2021_09_20_163619_create_employees_id_table', 4),
(39, '2021_09_20_163619_create_employees_languages_table', 4),
(40, '2021_09_20_163619_create_employees_passport_table', 4),
(41, '2021_09_20_163619_create_employees_relatives_employed_table', 4),
(42, '2021_09_20_163619_create_employees_skills_table', 4),
(43, '2021_09_20_163619_create_employees_table', 4),
(44, '2021_09_20_163619_create_employees_trining_courses_table', 4),
(45, '2021_09_20_163620_create_employees_not_relatives_employed_table', 4);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_activate` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `photo`, `is_activate`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Isadora Roach', 'gikahahi@mailinator.com', NULL, '$2y$10$C/sZSkrZVyAIMgD2jrKdquiOmHYVq6hH0r/UlrnTAQdPVr3xjxuPu', '+1 (692) 137-4391', NULL, 1, NULL, '2021-09-20 08:18:54', '2021-09-20 08:21:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees_company_previous`
--
ALTER TABLE `employees_company_previous`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees_contact`
--
ALTER TABLE `employees_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees_dependents`
--
ALTER TABLE `employees_dependents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees_driving_licence`
--
ALTER TABLE `employees_driving_licence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees_educations`
--
ALTER TABLE `employees_educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees_id`
--
ALTER TABLE `employees_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees_languages`
--
ALTER TABLE `employees_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees_not_relatives_employed`
--
ALTER TABLE `employees_not_relatives_employed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees_passport`
--
ALTER TABLE `employees_passport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees_relatives_employed`
--
ALTER TABLE `employees_relatives_employed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees_skills`
--
ALTER TABLE `employees_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees_trining_courses`
--
ALTER TABLE `employees_trining_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees_company_previous`
--
ALTER TABLE `employees_company_previous`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees_contact`
--
ALTER TABLE `employees_contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees_dependents`
--
ALTER TABLE `employees_dependents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees_driving_licence`
--
ALTER TABLE `employees_driving_licence`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees_educations`
--
ALTER TABLE `employees_educations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees_id`
--
ALTER TABLE `employees_id`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees_languages`
--
ALTER TABLE `employees_languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees_not_relatives_employed`
--
ALTER TABLE `employees_not_relatives_employed`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees_passport`
--
ALTER TABLE `employees_passport`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees_relatives_employed`
--
ALTER TABLE `employees_relatives_employed`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees_skills`
--
ALTER TABLE `employees_skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees_trining_courses`
--
ALTER TABLE `employees_trining_courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
