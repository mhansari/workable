-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2016 at 03:37 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gethired`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Last_Login` timestamp NULL DEFAULT NULL,
  `Change_Password_Due` timestamp NULL DEFAULT NULL,
  `Last_Changed_Password` timestamp NULL DEFAULT NULL,
  `Last_Login_IP` varchar(45) DEFAULT NULL,
  `Active` bit(1) DEFAULT NULL,
  `Date_Added` timestamp NULL DEFAULT NULL,
  `Date_Updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`ID`, `Name`, `Email`, `Password`, `Last_Login`, `Change_Password_Due`, `Last_Changed_Password`, `Last_Login_IP`, `Active`, `Date_Added`, `Date_Updated`) VALUES
(1, NULL, 'mhansari22@yahoo.com', 'cdhyfw', NULL, NULL, NULL, NULL, b'1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ad_types`
--

CREATE TABLE IF NOT EXISTS `ad_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `duration_unit` int(11) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ad_types`
--

INSERT INTO `ad_types` (`id`, `name`, `description`, `price`, `duration_unit`, `active`, `created_at`, `updated_at`) VALUES
(4, 'Basic', 'Basic low priority job listing, response filters, resume shortlisting, interview scheduling, notes, communication and more.', 1200, 3, b'1', '2016-02-22 13:06:43', '2016-02-22 13:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `after_expiry_actions`
--

CREATE TABLE IF NOT EXISTS `after_expiry_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `after_expiry_actions`
--

INSERT INTO `after_expiry_actions` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(2, 'Keep The Job Active', 1, '2016-02-26 01:45:22', '2016-02-26 01:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `career_levels`
--

CREATE TABLE IF NOT EXISTS `career_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `career_levels`
--

INSERT INTO `career_levels` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(2, 'Entry Level', 1, '2016-02-26 01:47:36', '2016-02-26 08:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(2, 'Administrative and Support Services', 1, '2016-02-26 01:49:51', '2016-02-26 08:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StateID` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Active` tinyint(1) DEFAULT NULL,
  `Created_At` timestamp NULL DEFAULT NULL,
  `Updated_At` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `StateID`, `Name`, `Active`, `Created_At`, `Updated_At`) VALUES
(1, 3, 'Karachi', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'Karachi', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 5, 'sadd', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 'Karachi', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 8, 'Karachi', 1, '2016-02-01 16:14:30', '2016-02-02 04:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Active` tinyint(1) DEFAULT NULL,
  `Created_At` timestamp NULL DEFAULT NULL,
  `Updated_At` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `Name`, `Active`, `Created_At`, `Updated_At`) VALUES
(46, 'Pakistan', 1, '2016-02-01 15:28:56', '2016-02-01 15:28:56'),
(47, 'India', 1, '2016-02-02 04:16:33', '2016-02-02 04:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `country_id`, `state_id`, `city_id`, `description`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Software', NULL, NULL, NULL, NULL, 1, '2016-02-24 02:16:40', '2016-02-24 02:16:40'),
(2, '46', 46, 8, 7, '7', 1, '2016-03-01 11:36:24', '2016-03-01 11:36:24'),
(3, '46', 46, 8, 7, '7', 1, '2016-03-01 11:37:49', '2016-03-01 11:37:49'),
(4, '46', 46, 8, 7, '7', 1, '2016-03-01 11:38:51', '2016-03-01 11:38:51'),
(5, '46', 46, 8, 7, '7', 1, '2016-03-01 11:39:05', '2016-03-01 11:39:05'),
(6, '46', 46, 8, 7, '7', 1, '2016-03-01 11:39:46', '2016-03-01 11:39:46'),
(7, '45tt', 46, 8, 7, NULL, 1, '2016-03-01 11:40:51', '2016-03-01 11:40:51'),
(8, '45tt', 46, 8, 7, 'dsfdsfdsf', 1, '2016-03-01 11:41:34', '2016-03-01 11:41:34'),
(9, 'Software', 46, 8, 7, 'dcdc', 1, '2016-03-09 01:24:00', '2016-03-09 01:24:00'),
(10, 'rvrv', 46, 8, 7, 'vrv', 1, '2016-03-09 01:27:36', '2016-03-09 01:27:36'),
(11, 'verferf', 46, 8, 7, 'erfrfref', 1, '2016-03-09 01:34:03', '2016-03-09 01:34:03'),
(12, 'ergerg', 46, 8, 7, 'ergerg', 1, '2016-03-09 01:44:45', '2016-03-09 01:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `experiance_levels`
--

CREATE TABLE IF NOT EXISTS `experiance_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `experiance_levels`
--

INSERT INTO `experiance_levels` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(2, 'Student', 1, '2016-02-26 01:51:42', '2016-02-26 08:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `fb`
--

CREATE TABLE IF NOT EXISTS `fb` (
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `fb_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `ad_type_id` int(11) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `career_level_id` int(11) DEFAULT NULL,
  `experiance_level_id` int(11) DEFAULT NULL,
  `number_of_positions` int(11) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `required_skills` varchar(500) DEFAULT NULL,
  `qualifications` varchar(255) DEFAULT NULL,
  `job_type_id` int(11) DEFAULT NULL,
  `shift_timings_id` int(11) DEFAULT NULL,
  `required_travelling` bit(1) DEFAULT NULL,
  `currency_min` double DEFAULT NULL,
  `salary_max` double DEFAULT NULL,
  `salary_currency_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_ids` varchar(255) DEFAULT NULL,
  `city_ids` varchar(255) DEFAULT NULL,
  `job_expiry` date DEFAULT NULL,
  `after_expiry_actions_id` int(11) DEFAULT NULL,
  `email_resume` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `job_type`
--

CREATE TABLE IF NOT EXISTS `job_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `job_type`
--

INSERT INTO `job_type` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(2, 'Full Time', 1, '2016-02-26 01:53:04', '2016-02-26 08:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1453276150),
('m130524_201442_init', 1453276274);

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
('2016_01_27_193759_create_users_table', 1),
('2016_01_27_193831_add_email_to_users_table', 1),
('2016_01_27_193848_remove_email_from_users_table', 1),
('2016_01_27_193903_drop_users_table', 1),
('2016_02_19_122213_create_users_table', 2),
('2016_02_19_122617_create_users_table', 3),
('2016_02_19_122648_create_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `other_benefits`
--

CREATE TABLE IF NOT EXISTS `other_benefits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `other_benefits`
--

INSERT INTO `other_benefits` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(2, 'Accommodation', 1, '2016-02-26 13:47:18', '2016-02-26 13:48:39'),
(3, 'Communication', 1, '2016-02-26 13:48:57', '2016-02-26 13:48:57'),
(4, 'Gratuity', 1, '2016-02-26 13:49:04', '2016-02-26 13:49:04'),
(5, 'Health Insurance', 1, '2016-02-26 13:49:14', '2016-02-26 13:49:14'),
(6, 'Health Insurance', 1, '2016-02-26 13:49:15', '2016-02-26 13:49:15'),
(7, 'Incentive Bonus', 1, '2016-02-26 13:49:26', '2016-02-26 13:49:26'),
(8, 'Leaves', 1, '2016-02-26 13:49:34', '2016-02-26 13:49:34'),
(9, 'Life Insurance', 1, '2016-02-26 13:49:47', '2016-02-26 13:49:47'),
(10, 'Medical', 1, '2016-02-26 13:50:00', '2016-02-26 13:50:00'),
(11, 'Pension', 1, '2016-02-26 13:50:16', '2016-02-26 13:50:16'),
(12, 'Provident Fund', 1, '2016-02-26 13:50:25', '2016-02-26 13:50:25'),
(13, 'Sports & Entertainment', 1, '2016-02-26 13:50:37', '2016-02-26 13:50:37'),
(14, 'Transport', 1, '2016-02-26 13:50:48', '2016-02-26 13:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
(NULL, '699844de3a8f61a3b9c06c2c41e385d0fe15aae1a25869ccb6fdb776c7950120', '2016-02-19 01:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `salary_currency`
--

CREATE TABLE IF NOT EXISTS `salary_currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `salary_currency`
--

INSERT INTO `salary_currency` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(2, 'PKR - Pakistani Rupees', 1, '2016-02-26 01:55:02', '2016-02-26 08:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `securityquestions`
--

CREATE TABLE IF NOT EXISTS `securityquestions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Active` tinyint(1) DEFAULT NULL,
  `Created_At` timestamp NULL DEFAULT NULL,
  `Updated_At` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `securityquestions`
--

INSERT INTO `securityquestions` (`id`, `Name`, `Active`, `Created_At`, `Updated_At`) VALUES
(2, 'What is your city of birth?', 1, '2016-02-05 03:06:12', '2016-02-05 03:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `shift_timings`
--

CREATE TABLE IF NOT EXISTS `shift_timings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `shift_timings`
--

INSERT INTO `shift_timings` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(2, 'Evening Shift', 1, '2016-02-26 01:57:50', '2016-02-26 08:38:47');

-- --------------------------------------------------------

--
-- Table structure for table `site_users`
--

CREATE TABLE IF NOT EXISTS `site_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(400) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `mobile_prefix` varchar(45) DEFAULT NULL,
  `mobile_phone` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `question_id` int(5) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `newsletter` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `suspended` tinyint(1) DEFAULT NULL,
  `suspended_comments` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_suspended` timestamp NULL DEFAULT NULL,
  `date_last_login` timestamp NULL DEFAULT NULL,
  `user_type` tinyint(1) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `remember_token` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `site_users`
--

INSERT INTO `site_users` (`id`, `first_name`, `last_name`, `email`, `gender`, `dob`, `country_id`, `state_id`, `city_id`, `mobile_prefix`, `mobile_phone`, `password`, `question_id`, `answer`, `newsletter`, `active`, `suspended`, `suspended_comments`, `created_at`, `updated_at`, `date_suspended`, `date_last_login`, `user_type`, `code`, `remember_token`) VALUES
(24, NULL, NULL, 'mhansari2222@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$TqPUC.esY16fUr5TB1bq2ecRTDpZwbbXF1g6thdzKpH.fQpNxZP7u', NULL, NULL, NULL, NULL, NULL, NULL, '2016-02-19 08:45:08', '2016-02-21 02:32:12', NULL, NULL, NULL, NULL, 'Rr0TmzuRODFOUZSjTZ8f4XjZ25O5iQQr9rY2pgnybAkwS'),
(26, 'sdfds', 'fdsf', 'mhansari22@yahoo.com', '', '2016-12-12', 46, 8, 7, '0333', '3036853', '$2y$10$58FguQjbGxbhPMZ7gW8MFuVcfGM/BvO2hz.H0cqQ9rZTYd8BVk.dK', 2, 'dsfsdf', 1, 1, 0, NULL, '2016-02-21 02:43:38', '2016-02-21 02:43:38', NULL, NULL, 1, 'PujgOlpsea', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CountryID` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Active` bit(1) DEFAULT NULL,
  `Created_At` timestamp NULL DEFAULT NULL,
  `Updated_At` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Country_idx` (`CountryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `CountryID`, `Name`, `Active`, `Created_At`, `Updated_At`) VALUES
(8, 46, 'Sindh', b'1', '2016-02-01 15:29:08', '2016-02-01 15:29:08'),
(9, 46, 'Punjab', b'1', '2016-02-01 15:29:16', '2016-02-01 15:29:16'),
(10, 46, 'KPK', b'1', '2016-02-01 15:29:25', '2016-02-01 15:29:25'),
(11, 46, 'Gilgit Bultistan', b'1', '2016-02-01 15:29:37', '2016-02-01 15:29:37'),
(12, 46, 'Balochistan', b'1', '2016-02-01 15:29:48', '2016-02-01 15:29:48'),
(13, 46, 'Karachi', b'1', '2016-02-01 15:58:31', '2016-02-01 15:58:31'),
(14, 47, 'Rajhistan', b'1', '2016-02-02 04:16:44', '2016-02-02 04:16:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ansari', 'mhansari22@yahoo.com', 'mhansari22@yahoo.com', '$2y$10$jZt7UYF4ebaR0TPRl9IBou4fqOwiQdJrC2oGDCSX7jXIguNtP65L6', NULL, NULL, NULL),
(2, '', '', 'mhansari222@yahoo.com', '$2y$10$rV8pDKWagKiUpxNMroSAye8TiEhDvDJKmUMzXxD0.iCHLYuutf1my', 'TNQ0GhsR8ttO8lsIA98GLnLGypflM423BgV37YoFV8mzTV1IJJWcn8W5vJBY', '2016-02-19 08:39:48', '2016-02-19 08:40:12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
