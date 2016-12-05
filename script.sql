-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2016 at 12:49 PM
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
-- Table structure for table `ad_types`
--

DROP TABLE IF EXISTS `ad_types`;
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
-- Truncate table before insert `ad_types`
--

TRUNCATE TABLE `ad_types`;
--
-- Dumping data for table `ad_types`
--

INSERT INTO `ad_types` (`id`, `name`, `description`, `price`, `duration_unit`, `active`, `created_at`, `updated_at`) VALUES
(4, 'Basic', 'Basic low priority job listing, response filters, resume shortlisting, interview scheduling, notes, communication and more.', 1200, 3, b'1', '2016-02-22 13:06:43', '2016-02-22 13:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
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
-- Truncate table before insert `admin_users`
--

TRUNCATE TABLE `admin_users`;
--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`ID`, `Name`, `Email`, `Password`, `Last_Login`, `Change_Password_Due`, `Last_Changed_Password`, `Last_Login_IP`, `Active`, `Date_Added`, `Date_Updated`) VALUES
(1, NULL, 'mhansari22@yahoo.com', 'cdhyfw', NULL, NULL, NULL, NULL, b'1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `after_expiry_actions`
--

DROP TABLE IF EXISTS `after_expiry_actions`;
CREATE TABLE IF NOT EXISTS `after_expiry_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `after_expiry_actions`
--

TRUNCATE TABLE `after_expiry_actions`;
--
-- Dumping data for table `after_expiry_actions`
--

INSERT INTO `after_expiry_actions` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(2, 'Keep The Job Active', 1, '2016-02-26 01:45:22', '2016-02-26 01:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `application_status`
--

DROP TABLE IF EXISTS `application_status`;
CREATE TABLE IF NOT EXISTS `application_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Truncate table before insert `application_status`
--

TRUNCATE TABLE `application_status`;
--
-- Dumping data for table `application_status`
--

INSERT INTO `application_status` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Pending', b'1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `applied`
--

DROP TABLE IF EXISTS `applied`;
CREATE TABLE IF NOT EXISTS `applied` (
  `job_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `additional_comments` varchar(500) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `resume_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `seen` bit(1) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `user_2_idx` (`user_id`),
  KEY `resume_2_idx` (`resume_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `applied`
--

TRUNCATE TABLE `applied`;
--
-- Dumping data for table `applied`
--

INSERT INTO `applied` (`job_id`, `user_id`, `created_at`, `additional_comments`, `updated_at`, `resume_id`, `status_id`, `seen`, `id`) VALUES
(2, 26, '2016-12-04 05:28:20', '', '2016-12-04 05:28:20', 2, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

DROP TABLE IF EXISTS `benefits`;
CREATE TABLE IF NOT EXISTS `benefits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Truncate table before insert `benefits`
--

TRUNCATE TABLE `benefits`;
--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Accomodation', b'1', '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(2, 'Communication', b'1', '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(3, 'Gratuity', b'1', '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(4, 'Incentive Bonus', b'1', '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(5, 'Leaves', b'1', '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(6, 'Life Insurance', b'1', '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(7, 'Medical', b'1', '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(8, 'Pension', b'1', '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(9, 'Provident Fund', b'1', '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(10, 'Sports & Entertainment', b'1', '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(11, 'Transport', b'1', '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(12, 'abc', b'1', '2016-02-26 01:49:51', '2016-02-26 01:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `career_levels`
--

DROP TABLE IF EXISTS `career_levels`;
CREATE TABLE IF NOT EXISTS `career_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `career_levels`
--

TRUNCATE TABLE `career_levels`;
--
-- Dumping data for table `career_levels`
--

INSERT INTO `career_levels` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(2, 'Entry Level', 1, '2016-02-26 01:47:36', '2016-02-26 08:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `seo` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Truncate table before insert `categories`
--

TRUNCATE TABLE `categories`;
--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `seo`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Administrative', 'administrative', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(2, 'Advertising, Marketing & PR', 'advertising-marketing-pr', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(3, 'Aviation', 'aviation', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(4, 'Agriculture', 'agriculture', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(5, 'Architect', 'architect', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(6, 'Media', 'media', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(7, 'Autos', 'autos', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(8, 'Biotechnology &amp; Pharma', 'biotechnology-pharma', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(9, 'Business Opportunity', 'business-opportunity', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(10, 'Career Fairs', 'career-fairs', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(11, 'Construction', 'construction', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(12, 'Consulting', 'consulting', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(13, 'Consumer', 'consumer', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(14, 'Customer Service and Call Center', 'customer-service-and-call-center', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(15, 'Education', 'education', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(16, 'Electronics', 'electronics', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(17, 'Recruitment Agency', 'recruitment-agency', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(18, 'Engineering', 'engineering', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(19, 'Finance', 'finance', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(20, 'Accounting', 'accounting', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(21, 'Banking', 'banking', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(22, 'Economics', 'economics', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(23, 'Financial Services', 'financial-services', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(24, 'Insurance', 'insurance', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(25, 'Government', 'government', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(26, 'Healthcare - Administration, Health IT', 'healthcare-administration-health-it', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(27, 'Healthcare - Allied Health/Therapy/Rehab Services', 'healthcare-allied-health-therapy-rehab-services', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(28, 'Healthcare - Business Office &amp; Finance', 'healthcare-business-office-finance', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(29, 'Healthcare - CNAs/Aides/MAs/Home Health', 'healthcare-cnas-aides-mas-home-health', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(30, 'Pathology', 'pathology', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(31, 'Medical &amp; Dental', 'medical-dental', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(32, 'Nursing', 'nursing', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(33, 'Healthcare - Other', 'healthcare-other', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(34, 'Pharmacy', 'pharmacy', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(35, 'Radiology', 'radiology', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(36, 'Nurse Management', 'nurse-management', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(37, 'Social Services', 'social-services', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(38, 'Support Services', 'support-services', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(39, 'Hospitality &amp; Hotel', 'hospitality-hotel', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(40, 'Housekeeping and Facilities Management', 'housekeeping-and-facilities-management', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(41, 'Human Resources &amp; Recruiting', 'human-resources-recruiting', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(42, 'Maintenance and Repair', 'maintenance-and-repair', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(43, 'Computer Hardware', 'computer-hardware', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(44, 'Web &amp; E-commerce', 'web-e-commerce', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(45, 'Computer Software', 'computer-software', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(46, 'Telecom', 'telecom', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(47, 'Information Technology', 'information-technology', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(48, 'Legal', 'legal', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(49, 'Production', 'production', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(50, 'Military', 'military', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(51, 'NGO', 'ngo', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(52, 'Oil &amp; Gas', 'oil-gas', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(53, 'Personal Care', 'personal-care', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(54, 'Security', 'security', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(55, 'Publishing', 'publishing', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(56, 'Procurement', 'procurement', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(57, 'Real Estate', 'real-estate', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(58, 'Restaurant', 'restaurant', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(59, 'Retail &amp; Wholesale', 'retail-wholesale', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(60, 'Sales', 'sales', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(61, 'Commission', 'commission', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(62, 'Science', 'science', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(63, 'Sports and Recreation', 'sports-and-recreation', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(64, 'Supply Chain', 'supply-chain', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(65, 'Management', 'management', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51'),
(66, 'Warehousing', 'warehousing', 1, '2016-02-26 01:49:51', '2016-02-26 01:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StateID` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `seo` varchar(45) NOT NULL,
  `Active` tinyint(1) DEFAULT NULL,
  `Created_At` timestamp NULL DEFAULT NULL,
  `Updated_At` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Truncate table before insert `cities`
--

TRUNCATE TABLE `cities`;
--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `StateID`, `Name`, `seo`, `Active`, `Created_At`, `Updated_At`) VALUES
(1, 3, 'Karachi', 'karachi', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'Karachi', 'karachi', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 9, 'Islamabad', 'islamabad', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 8, 'Hyderabad', 'hyderabad', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 8, 'Karachi', 'karachi', 1, '2016-02-01 16:14:30', '2016-02-02 04:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

DROP TABLE IF EXISTS `company_info`;
CREATE TABLE IF NOT EXISTS `company_info` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `company_name` varchar(255) DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `company_cover` varchar(255) DEFAULT NULL,
  `about_company` varchar(10000) NOT NULL,
  `designation` varchar(45) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `facebook` varchar(45) DEFAULT NULL,
  `twitter` varchar(45) DEFAULT NULL,
  `google` varchar(45) DEFAULT NULL,
  `linkedin` varchar(45) DEFAULT NULL,
  `business_incorporation_type` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `established_in` date DEFAULT NULL,
  `total_employees` int(11) DEFAULT NULL,
  `alerts` bit(1) DEFAULT NULL,
  `lat` double NOT NULL,
  `lan` double NOT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `company_info`
--

TRUNCATE TABLE `company_info`;
--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`user_id`, `company_name`, `company_logo`, `company_cover`, `about_company`, `designation`, `country_id`, `state_id`, `city_id`, `phone`, `mobile`, `fax`, `website`, `facebook`, `twitter`, `google`, `linkedin`, `business_incorporation_type`, `category_id`, `established_in`, `total_employees`, `alerts`, `lat`, `lan`, `active`, `created_at`, `updated_at`) VALUES
(26, 'CareerJin', 'logos/1478862282.jpg', 'covers/1478861855.jpg', 'An assembler of Motorcycle\n\nHero Motors Ltd, founded in the late 90s, is a private based company in Hyderabad, Pakistan. It is one of the leading companies in Hyderabad. We deal in Motor Bikes, Tractors, Construction and Textile.\n\nVision:\nThe Hero Motors Ltd will inspire its customer and provide them the best quality they can. we will engage in sustainable practice and anticipated the needs of the customers. We want to have our product in every home and we want our customer to experience the best ride at the affordable price\n\nMission\nSupplying the range of vehicles and services to meet the requirements.\nWant to gain trust of our customer on our products and services\nTo bring innovation and inspiration\nTo create value and make difference\nOur customers will be our first priority\nEnsuring the products are of outstanding quality value for money and instill pride of ownership.', 'C.E.O', 46, 8, 7, '3333036853', '3333036853', '3333036853', 'zumbeel.pk', 'careerjin', 'careerjin', 'careerjin', 'careerjin', 1, 26, '2002-06-11', 5, b'1', 24.8972276, 67.075342, NULL, '2016-11-08 14:36:26', '2016-11-11 06:04:42'),
(45, NULL, NULL, NULL, '', NULL, 46, 8, 4, NULL, '3333036853', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2016-11-08 14:46:03', '2016-11-08 14:46:03');

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

DROP TABLE IF EXISTS `configs`;
CREATE TABLE IF NOT EXISTS `configs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `k` varchar(255) NOT NULL,
  `v` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `configs`
--

TRUNCATE TABLE `configs`;
--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `k`, `v`) VALUES
(1, 'DEFAULT_COUNTRY', 'pk'),
(2, 'SHOW_NEW_OLD_DAYS', '1');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `seo` varchar(255) NOT NULL,
  `Active` tinyint(1) DEFAULT NULL,
  `Created_At` timestamp NULL DEFAULT NULL,
  `Updated_At` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Truncate table before insert `countries`
--

TRUNCATE TABLE `countries`;
--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `Name`, `seo`, `Active`, `Created_At`, `Updated_At`) VALUES
(46, 'Pakistan', 'pk', 1, '2016-02-01 15:28:56', '2016-02-02 04:16:33'),
(47, 'India', 'in', 1, '2016-02-02 04:16:33', '2016-02-02 04:16:33'),
(48, 'Bangladesh', 'bd', 1, '2016-02-02 04:16:33', '2016-02-02 04:16:33'),
(49, 'Sri Lanka', 'sl', 1, '2016-02-02 04:16:33', '2016-02-02 04:16:33'),
(50, 'China', 'ch', 1, '2016-02-02 04:16:33', '2016-02-02 04:16:33'),
(51, 'japan', 'jp', 1, '2016-02-02 04:16:33', '2016-02-02 04:16:33'),
(52, 'Singapore', 'sg', 1, '2016-02-02 04:16:33', '2016-02-02 04:16:33'),
(53, 'Malaysia', 'my', 1, '2016-02-02 04:16:33', '2016-02-02 04:16:33'),
(54, 'Iran', 'ir', 1, '2016-02-02 04:16:33', '2016-02-02 04:16:33'),
(55, 'Iraq', 'iq', 1, '2016-02-02 04:16:33', '2016-02-02 04:16:33'),
(56, 'Afghanistan', 'af', 1, '2016-02-02 04:16:33', '2016-02-02 04:16:33'),
(57, 'United Arab Emirates', 'ae', 1, '2016-02-02 04:16:33', '2016-02-02 04:16:33'),
(58, 'United States', 'us', 1, '2016-02-02 04:16:33', '2016-02-02 04:16:33'),
(59, 'United Kingdom', 'uk', 1, '2016-02-02 04:16:33', '2016-02-02 04:16:33'),
(60, 'Australia', 'au', 1, '2016-02-02 04:16:33', '2016-02-02 04:16:33'),
(61, 'Canada', 'cn', 1, '2016-02-02 04:16:33', '2016-02-02 04:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=164 ;

--
-- Truncate table before insert `currencies`
--

TRUNCATE TABLE `currencies`;
--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'AFN', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(2, 'ALL', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(3, 'DZD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(4, 'AOA', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(5, 'ARS', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(6, 'AMD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(7, 'AWG', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(8, 'AUD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(9, 'AZN', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(10, 'BSD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(11, 'BHD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(12, 'BDT', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(13, 'BBD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(14, 'BYR', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(15, 'BZD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(16, 'BMD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(17, 'BTN', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(18, 'BOB', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(19, 'BAM', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(20, 'BWP', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(21, 'BRL', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(22, 'BND', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(23, 'BGN', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(24, 'BIF', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(25, 'KHR', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(26, 'CAD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(27, 'CVE', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(28, 'KYD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(29, 'CLP', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(30, 'CNY', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(31, 'COP', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(32, 'XOF', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(33, 'XAF', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(34, 'KMF', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(35, 'XPF', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(36, 'CDF', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(37, 'CRC', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(38, 'HRK', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(39, 'CUC', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(40, 'CUP', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(41, 'CZK', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(42, 'DKK', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(43, 'DJF', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(44, 'DOP', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(45, 'XCD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(46, 'EGP', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(47, 'SVC', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(48, 'ERN', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(49, 'ETB', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(50, 'EUR', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(51, 'FKP', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(52, 'FJD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(53, 'GMD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(54, 'GEL', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(55, 'GHS', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(56, 'GIP', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(57, 'GTQ', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(58, 'GGP', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(59, 'GNF', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(60, 'GYD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(61, 'HTG', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(62, 'HNL', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(63, 'HKD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(64, 'HUF', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(65, 'ISK', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(66, 'INR', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(67, 'IDR', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(68, 'XDR', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(69, 'IRR', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(70, 'IQD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(71, 'IMP', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(72, 'ILS', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(73, 'JMD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(74, 'JPY', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(75, 'JEP', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(76, 'JOD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(77, 'KZT', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(78, 'KES', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(79, 'KPW', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(80, 'KRW', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(81, 'KWD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(82, 'KGS', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(83, 'LAK', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(84, 'LBP', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(85, 'LSL', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(86, 'LRD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(87, 'LYD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(88, 'LTL', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(89, 'MOP', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(90, 'MKD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(91, 'MGA', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(92, 'MWK', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(93, 'MYR', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(94, 'MVR', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(95, 'MRO', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(96, 'MUR', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(97, 'MXN', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(98, 'MDL', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(99, 'MNT', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(100, 'MAD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(101, 'MZN', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(102, 'MMK', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(103, 'NAD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(104, 'NPR', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(105, 'ANG', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(106, 'NZD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(107, 'NIO', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(108, 'NGN', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(109, 'NOK', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(110, 'OMR', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(111, 'PKR', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(112, 'PAB', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(113, 'PGK', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(114, 'PYG', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(115, 'PEN', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(116, 'PHP', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(117, 'PLN', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(118, 'QAR', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(119, 'RON', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(120, 'RUB', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(121, 'RWF', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(122, 'SHP', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(123, 'WST', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(124, 'SAR', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(125, 'SPL', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(126, 'RSD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(127, 'SCR', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(128, 'SLL', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(129, 'SGD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(130, 'SBD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(131, 'SOS', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(132, 'ZAR', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(133, 'LKR', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(134, 'SDG', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(135, 'SRD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(136, 'SZL', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(137, 'SEK', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(138, 'CHF', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(139, 'SYP', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(140, 'STD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(141, 'TWD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(142, 'TJS', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(143, 'TZS', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(144, 'THB', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(145, 'TOP', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(146, 'TTD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(147, 'TND', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(148, 'TRY', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(149, 'TMT', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(150, 'TVD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(151, 'UGX', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(152, 'UAH', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(153, 'AED', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(154, 'GBP', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(155, 'USD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(156, 'UYU', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(157, 'UZS', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(158, 'VUV', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(159, 'VEF', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(160, 'VND', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(161, 'YER', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(162, 'ZMW', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(163, 'ZWD', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `degree_levels`
--

DROP TABLE IF EXISTS `degree_levels`;
CREATE TABLE IF NOT EXISTS `degree_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Truncate table before insert `degree_levels`
--

TRUNCATE TABLE `degree_levels`;
--
-- Dumping data for table `degree_levels`
--

INSERT INTO `degree_levels` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'High School', b'1', '2016-11-17 19:00:00', '2016-11-17 19:00:00'),
(2, 'Intermediate', b'1', '2016-11-17 19:00:00', '2016-11-17 19:00:00'),
(3, 'Bachelor''s', b'1', '2016-11-17 19:00:00', '2016-11-17 19:00:00'),
(4, 'Master''s', b'1', '2016-11-17 19:00:00', '2016-11-17 19:00:00'),
(5, 'Doctorate (PhD)', b'1', '2016-11-17 19:00:00', '2016-11-17 19:00:00'),
(6, 'Vocational', b'1', '2016-11-17 19:00:00', '2016-11-17 19:00:00'),
(7, 'Associate Degree', b'1', '2016-11-17 19:00:00', '2016-11-17 19:00:00'),
(8, 'Certification', b'1', '2016-11-17 19:00:00', '2016-11-17 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employer_id` int(6) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Truncate table before insert `departments`
--

TRUNCATE TABLE `departments`;
--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `employer_id`, `name`, `country_id`, `state_id`, `city_id`, `description`, `active`, `created_at`, `updated_at`) VALUES
(1, 0, 'Software', NULL, NULL, NULL, NULL, 1, '2016-02-24 02:16:40', '2016-02-24 02:16:40'),
(2, 0, '46', 46, 8, 7, '7', 1, '2016-03-01 11:36:24', '2016-03-01 11:36:24'),
(3, 0, '46', 46, 8, 7, '7', 1, '2016-03-01 11:37:49', '2016-03-01 11:37:49'),
(4, 0, '46', 46, 8, 7, '7', 1, '2016-03-01 11:38:51', '2016-03-01 11:38:51'),
(5, 0, '46', 46, 8, 7, '7', 1, '2016-03-01 11:39:05', '2016-03-01 11:39:05'),
(6, 0, '46', 46, 8, 7, '7', 1, '2016-03-01 11:39:46', '2016-03-01 11:39:46'),
(7, 0, '45tt', 46, 8, 7, NULL, 1, '2016-03-01 11:40:51', '2016-03-01 11:40:51'),
(8, 0, '45tt', 46, 8, 7, 'dsfdsfdsf', 1, '2016-03-01 11:41:34', '2016-03-01 11:41:34'),
(9, 0, 'Software', 46, 8, 7, 'dcdc', 1, '2016-03-09 01:24:00', '2016-03-09 01:24:00'),
(10, 0, 'rvrv', 46, 8, 7, 'vrv', 1, '2016-03-09 01:27:36', '2016-03-09 01:27:36'),
(11, 0, 'verferf', 46, 8, 7, 'erfrfref', 1, '2016-03-09 01:34:03', '2016-03-09 01:34:03'),
(12, 0, 'ergerg', 46, 8, 7, 'ergerg', 1, '2016-03-09 01:44:45', '2016-03-09 01:44:45'),
(13, 0, 'dff', 46, 8, 7, 'dfdsf', 1, '2016-10-07 07:01:49', '2016-10-07 07:01:49'),
(14, 0, 'dff', 46, 8, 7, 'dfdsf', 1, '2016-10-07 07:01:49', '2016-10-07 07:01:49'),
(15, 0, 'test', 46, 8, 7, 'dsfdsf', 1, '2016-10-07 07:04:03', '2016-10-07 07:04:03'),
(16, 0, 'test', 46, 8, 7, 'sdff', 1, '2016-10-07 07:09:27', '2016-10-07 07:09:27'),
(17, 1, 'test1', 46, 8, 7, 'dsdsd', 1, '2016-10-07 07:11:30', '2016-10-07 07:11:30'),
(18, 26, 'test2', 46, 8, 7, 'ssdf', 1, '2016-10-07 07:15:29', '2016-10-07 07:15:29'),
(19, 26, 'test23', 46, 8, 7, 'dsfdf', 1, '2016-10-07 07:24:10', '2016-10-07 07:24:10'),
(20, 26, 'ios', 46, 8, 7, 'test', 1, '2016-10-26 06:25:03', '2016-10-26 06:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `experiance_levels`
--

DROP TABLE IF EXISTS `experiance_levels`;
CREATE TABLE IF NOT EXISTS `experiance_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `seo` varchar(45) NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `experiance_levels`
--

TRUNCATE TABLE `experiance_levels`;
--
-- Dumping data for table `experiance_levels`
--

INSERT INTO `experiance_levels` (`id`, `name`, `seo`, `active`, `created_at`, `updated_at`) VALUES
(2, 'Student', 'student', 1, '2016-02-26 01:51:42', '2016-02-26 08:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `fb`
--

DROP TABLE IF EXISTS `fb`;
CREATE TABLE IF NOT EXISTS `fb` (
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `fb_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `fb`
--

TRUNCATE TABLE `fb`;
-- --------------------------------------------------------

--
-- Table structure for table `incorporation_type`
--

DROP TABLE IF EXISTS `incorporation_type`;
CREATE TABLE IF NOT EXISTS `incorporation_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Truncate table before insert `incorporation_type`
--

TRUNCATE TABLE `incorporation_type`;
--
-- Dumping data for table `incorporation_type`
--

INSERT INTO `incorporation_type` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Private Limited Company', b'1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_benefits`
--

DROP TABLE IF EXISTS `job_benefits`;
CREATE TABLE IF NOT EXISTS `job_benefits` (
  `job_id` int(11) DEFAULT NULL,
  `benefit_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `benefits_idx` (`benefit_id`),
  KEY `jobs_` (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Truncate table before insert `job_benefits`
--

TRUNCATE TABLE `job_benefits`;
--
-- Dumping data for table `job_benefits`
--

INSERT INTO `job_benefits` (`job_id`, `benefit_id`, `created_at`, `updated_at`, `id`) VALUES
(52, 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_cities`
--

DROP TABLE IF EXISTS `job_cities`;
CREATE TABLE IF NOT EXISTS `job_cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cities_idx` (`city_id`),
  KEY `jobs_idx` (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=138 ;

--
-- Truncate table before insert `job_cities`
--

TRUNCATE TABLE `job_cities`;
--
-- Dumping data for table `job_cities`
--

INSERT INTO `job_cities` (`id`, `job_id`, `city_id`, `created_at`, `updated_at`) VALUES
(4, 7, 7, '2016-12-02 14:02:11', '2016-12-02 14:02:11'),
(5, 8, 3, '2016-12-02 14:02:46', '2016-12-02 14:02:46'),
(6, 9, 4, '2016-12-02 14:03:05', '2016-12-02 14:03:05'),
(7, 9, 7, '2016-12-02 14:03:05', '2016-12-02 14:03:05'),
(8, 9, 3, '2016-12-02 14:03:05', '2016-12-02 14:03:05'),
(21, 14, 3, '2016-12-02 14:09:54', '2016-12-02 14:09:54'),
(22, 14, 4, '2016-12-02 14:09:54', '2016-12-02 14:09:54'),
(23, 14, 7, '2016-12-02 14:09:54', '2016-12-02 14:09:54'),
(135, 52, 4, '2016-12-03 03:34:28', '2016-12-03 03:34:28'),
(136, 52, 3, '2016-12-03 03:34:28', '2016-12-03 03:34:28'),
(137, 52, 7, '2016-12-03 03:34:28', '2016-12-03 03:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `job_type`
--

DROP TABLE IF EXISTS `job_type`;
CREATE TABLE IF NOT EXISTS `job_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `seo` varchar(45) NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Truncate table before insert `job_type`
--

TRUNCATE TABLE `job_type`;
--
-- Dumping data for table `job_type`
--

INSERT INTO `job_type` (`id`, `name`, `seo`, `active`, `created_at`, `updated_at`) VALUES
(2, 'Full Time', 'full-time', 1, '2016-02-26 01:53:04', '2016-02-26 08:41:00'),
(3, 'Part Time', 'part-time', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
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
  `active` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `adtype_idx` (`ad_type_id`),
  KEY `expiry-actions_idx` (`after_expiry_actions_id`),
  KEY `career-level_idx` (`career_level_id`),
  KEY `categories_idx` (`category_id`),
  KEY `country_idx` (`country_id`),
  KEY `department_idx` (`department_id`),
  KEY `experiance-level_idx` (`experiance_level_id`),
  KEY `job-type_idx` (`job_type_id`),
  KEY `shift-timings_idx` (`shift_timings_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Truncate table before insert `jobs`
--

TRUNCATE TABLE `jobs`;
--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `ad_type_id`, `job_title`, `department_id`, `category_id`, `career_level_id`, `experiance_level_id`, `number_of_positions`, `description`, `required_skills`, `qualifications`, `job_type_id`, `shift_timings_id`, `required_travelling`, `currency_min`, `salary_max`, `salary_currency_id`, `country_id`, `state_ids`, `city_ids`, `job_expiry`, `after_expiry_actions_id`, `email_resume`, `active`, `created_at`, `updated_at`) VALUES
(2, 26, 4, 'SQA Engineer Required', 20, 45, 2, 2, 5, 'We require an efficient candidate who can handle customer queries and respond them back quickly. A well spoken and hardworking candidate is required for this position.', 'php,wordpress,mysql,jquery', 'bcs,mcs', 2, 2, b'1', 25000, 50000, 2, 46, '8', '7', '0000-00-00', 2, b'1', 1, '2016-11-05 13:06:43', '0000-00-00 00:00:00'),
(3, 26, 4, 'Pakistani Rupees', 18, 4, 2, 2, 5, '<p>sdfdsfds</p>\r\n', '<p>kljkljlk</p>\r\n', 'bcs, mcs', 2, 2, b'1', 15000, 25000, 111, 46, NULL, NULL, '0000-00-00', 2, b'1', 1, '2016-12-02 10:46:10', '2016-12-02 10:46:10'),
(7, 26, 4, 'Pakistani Rupees', 18, 16, 2, 2, 5, '<p>jhhljlkj</p>\r\n', '<p>kjkljlk</p>\r\n', 'Bca, Mcs', 2, 2, b'1', 15000, 25000, 111, 46, NULL, NULL, '0000-00-00', 2, b'1', 1, '2016-12-02 14:02:11', '2016-12-02 14:02:11'),
(8, 26, 4, 'Pakistani Rupees', 18, 16, 2, 2, 5, '<p>jhhljlkj</p>\r\n', '<p>kjkljlk</p>\r\n', 'Bca, Mcs', 2, 2, b'1', 15000, 25000, 111, 46, NULL, NULL, '0000-00-00', 2, b'1', 1, '2016-12-02 14:02:46', '2016-12-02 14:02:46'),
(9, 26, 4, 'Pakistani Rupees', 18, 16, 2, 2, 5, '<p>jhhljlkj</p>\r\n', '<p>kjkljlk</p>\r\n', 'Bca, Mcs', 2, 2, b'1', 15000, 25000, 111, 46, NULL, NULL, '0000-00-00', 2, b'1', 1, '2016-12-02 14:03:05', '2016-12-02 14:03:05'),
(14, 26, 4, 'Pakistani Rupees', 18, 12, 2, 2, 5, '<p>kljlkjk</p>\r\n', '<p>kljkljl</p>\r\n', 'Bcs, Mcs', 2, 2, b'1', 15000, 25000, 111, 46, NULL, NULL, '0000-00-00', 2, b'1', 1, '2016-12-02 14:09:54', '2016-12-02 14:09:54'),
(52, 26, 4, 'Pakistani Rupees', 18, 7, 2, 2, 5, '<p>jlkjkljkl</p>\r\n', '<p>jlkjlkl</p>\r\n', 'Bcs, Mcs', 2, 2, b'1', 150000, 500000, 111, 46, NULL, NULL, '0000-00-00', 2, b'1', 1, '2016-12-03 03:34:28', '2016-12-03 03:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=160 ;

--
-- Truncate table before insert `languages`
--

TRUNCATE TABLE `languages`;
--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Aboriginal Dialects', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(2, 'Afrikaans', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(3, 'Ainu', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(4, 'Akkadian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(5, 'Albanian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(6, 'Alurian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(7, 'American Sign Language', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(8, 'Ancient Greek', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(9, 'Arabic', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(10, 'Arkian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(11, 'Assamese', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(12, 'Assyrian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(13, 'Asturian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(14, 'Australian Sign Language', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(15, 'Aymara', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(16, 'Bahasa Indonesia', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(17, 'Basque', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(18, 'Basque Language-Euskara', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(19, 'Bengali', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(20, 'Berber', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(21, 'Bosnian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(22, 'Brazilian Portuguese', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(23, 'Breton', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(24, 'British Sign Language', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(25, 'Buhi', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(26, 'Bulgarian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(27, 'Burmese', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(28, 'Catalan', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(29, 'Cherokee', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(30, 'Chichewa', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(31, 'Chinese', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(32, 'Chinese - Cantonese', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(33, 'Chinese - Mandarin', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(34, 'Chinese - Taiwanese', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(35, 'Church Slavonic', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(36, 'Cornish', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(37, 'Corsican', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(38, 'Croatian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(39, 'Czech', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(40, 'Dakota', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(41, 'Danish', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(42, 'Degaspregos', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(43, 'Dilhok', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(44, 'Dongxiang', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(45, 'Dutch', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(46, 'Egyptian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(47, 'English', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(48, 'Esperanto', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(49, 'Estonian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(50, 'Eurolang', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(51, 'Faroese', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(52, 'Farsi', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(53, 'Finnish', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(54, 'Flemmish', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(55, 'French', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(56, 'Frisian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(57, 'Friulian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(58, 'Gaelic', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(59, 'Galician', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(60, 'Georgian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(61, 'German', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(62, 'Greek', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(63, 'Greenlandic', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(64, 'Guarani', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(65, 'Gujarati', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(66, 'Haponish', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(67, 'Hausa', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(68, 'Hawaiian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(69, 'Hawaiian Pidgin English', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(70, 'Hebrew', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(71, 'Hindi', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(72, 'Hindustan', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(73, 'Hmong', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(74, 'Hungarian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(75, 'Icelandic', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(76, 'Ido', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(77, 'Ingush', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(78, 'Irish', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(79, 'Irish Gaelic', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(80, 'Italian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(81, 'Jameld', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(82, 'Japanese', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(83, 'Kankonian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(84, 'Kannada', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(85, 'Kashmiri', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(86, 'Khmer', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(87, 'Kiswahili', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(88, 'Konkani', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(89, 'Korean', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(90, 'Kurdish', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(91, 'Ladin', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(92, 'Ladino', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(93, 'Lakhota', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(94, 'Latin', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(95, 'Latvian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(96, 'Lithuanian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(97, 'Loglan', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(98, 'Low Saxon', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(99, 'Luxembourgish', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(100, 'Malat', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(101, 'Malay', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(102, 'Malayalam', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(103, 'Manipuri', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(104, 'Manx Gaelic', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(105, 'Maori', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(106, 'Marathi', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(107, 'Mongolian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(108, 'Neelan', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(109, 'Nepali', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(110, 'Norwegian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(111, 'Novial', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(112, 'Occitan', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(113, 'Ojibwe', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(114, 'Oriya', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(115, 'Pashto', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(116, 'Pidgin', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(117, 'Polish', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(118, 'Portuguese', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(119, 'Prakrit', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(120, 'Punjabi', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(121, 'Quechua', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(122, 'Rhaeto -Romance', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(123, 'Romanian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(124, 'Romany', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(125, 'Russian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(126, 'Sami', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(127, 'Sanskrit', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(128, 'Scots', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(129, 'Scots Gaelic', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(130, 'Serbian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(131, 'Shiyeyi', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(132, 'Sicilian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(133, 'Sindhi', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(134, 'Sinhalese', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(135, 'Slovak', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(136, 'Slovene', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(137, 'Spanish', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(138, 'Swabian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(139, 'Swahili', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(140, 'Swedish', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(141, 'Tagalog', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(142, 'Tamil', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(143, 'Telugu', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(144, 'Tengwar', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(145, 'Thai', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(146, 'Tibetan', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(147, 'Tok Pisin', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(148, 'Turkish', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(149, 'Ukrainian', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(150, 'Urdu', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(151, 'Uzbek', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(152, 'Vietnamese', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(153, 'Vogu', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(154, 'Welsh', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(155, 'Xhamagas', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(156, 'Xhosa', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(157, 'Yiddish', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(158, 'Yoruba', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00'),
(159, 'Zulu', b'1', '2016-11-10 19:00:00', '2016-11-10 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `maritalstatus`
--

DROP TABLE IF EXISTS `maritalstatus`;
CREATE TABLE IF NOT EXISTS `maritalstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Truncate table before insert `maritalstatus`
--

TRUNCATE TABLE `maritalstatus`;
--
-- Dumping data for table `maritalstatus`
--

INSERT INTO `maritalstatus` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Single', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(2, 'Engaged', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(3, 'Married, have children', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(4, 'Married, no children', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(5, 'Widowed', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(6, 'Separated', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00'),
(7, 'Divorced', b'1', '2016-11-16 19:00:00', '2016-11-16 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `migration`
--

TRUNCATE TABLE `migration`;
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

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `migrations`
--

TRUNCATE TABLE `migrations`;
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

DROP TABLE IF EXISTS `other_benefits`;
CREATE TABLE IF NOT EXISTS `other_benefits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Truncate table before insert `other_benefits`
--

TRUNCATE TABLE `other_benefits`;
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

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `password_resets`
--

TRUNCATE TABLE `password_resets`;
--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
(NULL, '699844de3a8f61a3b9c06c2c41e385d0fe15aae1a25869ccb6fdb776c7950120', '2016-02-19 01:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_awards_type`
--

DROP TABLE IF EXISTS `portfolio_awards_type`;
CREATE TABLE IF NOT EXISTS `portfolio_awards_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Truncate table before insert `portfolio_awards_type`
--

TRUNCATE TABLE `portfolio_awards_type`;
--
-- Dumping data for table `portfolio_awards_type`
--

INSERT INTO `portfolio_awards_type` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Academic', b'1', NULL, NULL),
(2, 'Professional', b'1', NULL, NULL),
(3, 'Extracurricular', b'1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `proficiency_level`
--

DROP TABLE IF EXISTS `proficiency_level`;
CREATE TABLE IF NOT EXISTS `proficiency_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Truncate table before insert `proficiency_level`
--

TRUNCATE TABLE `proficiency_level`;
--
-- Dumping data for table `proficiency_level`
--

INSERT INTO `proficiency_level` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Basic - Familiar', b'1', NULL, NULL),
(2, 'Conversational - Limited', b'1', NULL, NULL),
(3, 'Conversational', b'1', NULL, NULL),
(4, 'Conversational - Advanced', b'1', NULL, NULL),
(5, 'Fluent - Wide Knowledge', b'1', NULL, NULL),
(6, 'Fluent - Full Knowledge', b'1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_type`
--

DROP TABLE IF EXISTS `project_type`;
CREATE TABLE IF NOT EXISTS `project_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Truncate table before insert `project_type`
--

TRUNCATE TABLE `project_type`;
--
-- Dumping data for table `project_type`
--

INSERT INTO `project_type` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Academic', b'1', NULL, NULL),
(2, 'Academic Research', b'1', NULL, NULL),
(3, 'Professional', b'1', NULL, NULL),
(4, 'Professional Research', b'1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `publication_type`
--

DROP TABLE IF EXISTS `publication_type`;
CREATE TABLE IF NOT EXISTS `publication_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Truncate table before insert `publication_type`
--

TRUNCATE TABLE `publication_type`;
--
-- Dumping data for table `publication_type`
--

INSERT INTO `publication_type` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Book', b'1', NULL, NULL),
(2, 'Book Chapters', b'1', NULL, NULL),
(3, 'Peer-Reviewed Journal Articles', b'1', NULL, NULL),
(4, 'Non-Peer-Reviewed Articles', b'1', NULL, NULL),
(5, 'Articles Presented As Prestigious Conferences', b'1', NULL, NULL),
(6, 'Report', b'1', NULL, NULL),
(7, 'Patents', b'1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reference_type`
--

DROP TABLE IF EXISTS `reference_type`;
CREATE TABLE IF NOT EXISTS `reference_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Truncate table before insert `reference_type`
--

TRUNCATE TABLE `reference_type`;
--
-- Dumping data for table `reference_type`
--

INSERT INTO `reference_type` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Professional', b'1', NULL, NULL),
(2, 'Personal', b'1', NULL, NULL),
(3, 'Superior', b'1', NULL, NULL),
(4, 'Peer', b'1', NULL, NULL),
(5, 'Subordinate', b'1', NULL, NULL),
(6, 'Professor', b'1', NULL, NULL),
(7, 'Client', b'1', NULL, NULL),
(8, 'Other', b'1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Truncate table before insert `regions`
--

TRUNCATE TABLE `regions`;
--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Africa', b'1', NULL, NULL),
(2, 'East Asia and Pacific', b'1', NULL, NULL),
(3, 'Europe and Central Asia', b'1', NULL, NULL),
(4, 'Latin America and the Caribbean', b'1', NULL, NULL),
(5, 'Middle East and North Africa', b'1', NULL, NULL),
(6, 'South Asia', b'1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resume_academics`
--

DROP TABLE IF EXISTS `resume_academics`;
CREATE TABLE IF NOT EXISTS `resume_academics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `resume_id` int(11) DEFAULT NULL,
  `degree_level_id` int(11) DEFAULT NULL,
  `degree` varchar(45) DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `grade` varchar(45) DEFAULT NULL,
  `institute` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `details` varchar(5000) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Truncate table before insert `resume_academics`
--

TRUNCATE TABLE `resume_academics`;
--
-- Dumping data for table `resume_academics`
--

INSERT INTO `resume_academics` (`id`, `user_id`, `resume_id`, `degree_level_id`, `degree`, `completion_date`, `start_date`, `grade`, `institute`, `country_id`, `state_id`, `city_id`, `details`, `active`, `created_at`, `updated_at`) VALUES
(3, 26, 2, 1, 'Bachlor''s of Arts', '2020-11-18', '2016-11-18', 'A', 'Karachi University', 46, 8, 7, '', b'1', '2016-11-19 14:54:58', '2016-11-19 14:58:15'),
(4, 26, 2, 4, 'Computer Science', '2010-01-28', NULL, '2.5 GPA', 'Iqra University', 46, 8, 7, '', b'1', '2016-11-22 08:03:06', '2016-11-22 08:03:06'),
(5, 26, 2, 3, 'BA-CS', '1970-01-01', NULL, '2.5 GPA', 'Karachi University', 46, 8, 7, '<p>sdhfkjdshfhdsfljsdfsd</p>\r\n\r\n<p>f</p>\r\n', b'1', '2016-11-28 07:52:18', '2016-11-28 07:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `resume_affiliations`
--

DROP TABLE IF EXISTS `resume_affiliations`;
CREATE TABLE IF NOT EXISTS `resume_affiliations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `resume_id` int(11) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `current_working` bit(1) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Truncate table before insert `resume_affiliations`
--

TRUNCATE TABLE `resume_affiliations`;
--
-- Dumping data for table `resume_affiliations`
--

INSERT INTO `resume_affiliations` (`id`, `user_id`, `resume_id`, `position`, `organization`, `country_id`, `state_id`, `city_id`, `start_date`, `end_date`, `current_working`, `active`, `created_at`, `updated_at`) VALUES
(1, 26, 4, 'test 2', '365x24host', 46, 8, 7, '2010-11-25', '2016-11-20', NULL, b'1', '2016-11-20 04:52:42', '2016-11-20 05:01:56');

-- --------------------------------------------------------

--
-- Table structure for table `resume_awards`
--

DROP TABLE IF EXISTS `resume_awards`;
CREATE TABLE IF NOT EXISTS `resume_awards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `resume_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `award_date` date DEFAULT NULL,
  `project_award_id` int(11) DEFAULT NULL,
  `details` varchar(5000) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `resume_awards`
--

TRUNCATE TABLE `resume_awards`;
--
-- Dumping data for table `resume_awards`
--

INSERT INTO `resume_awards` (`id`, `user_id`, `resume_id`, `title`, `award_date`, `project_award_id`, `details`, `organization`, `country_id`, `state_id`, `city_id`, `active`, `created_at`, `updated_at`) VALUES
(2, 26, 4, 'My 1st Resume', '1998-11-12', 3, 'fsdfsdfdsfdsfdsfdsf', 'PASHA', 46, 8, 7, b'1', '2016-11-20 02:26:35', '2016-11-20 02:26:35');

-- --------------------------------------------------------

--
-- Table structure for table `resume_certifications`
--

DROP TABLE IF EXISTS `resume_certifications`;
CREATE TABLE IF NOT EXISTS `resume_certifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `resume_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  `score` varchar(255) DEFAULT NULL,
  `institution` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `details` varchar(5000) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Truncate table before insert `resume_certifications`
--

TRUNCATE TABLE `resume_certifications`;
--
-- Dumping data for table `resume_certifications`
--

INSERT INTO `resume_certifications` (`id`, `user_id`, `resume_id`, `name`, `completion_date`, `score`, `institution`, `country_id`, `state_id`, `city_id`, `details`, `active`, `created_at`, `updated_at`) VALUES
(3, 26, 4, 'SCJP', '2003-05-14', '890', 'SSUET', 46, 8, 7, '<p>SDFGSFSDF</p>\r\n\r\n<p>DS</p>\r\n\r\n<p>FDS</p>\r\n\r\n<p>F</p>\r\n\r\n<p>DSF</p>\r\n\r\n<p>SD</p>\r\n\r\n<p>FDS</p>\r\n\r\n<p>F</p>\r\n\r\n<p>DSF</p>\r\n\r\n<p>DS</p>\r\n\r\n<p>F</p>\r\n', b'1', '2016-11-19 17:00:55', '2016-11-19 17:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `resume_experiances`
--

DROP TABLE IF EXISTS `resume_experiances`;
CREATE TABLE IF NOT EXISTS `resume_experiances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `resume_id` int(11) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `current_working` bit(1) DEFAULT NULL,
  `details` varchar(5000) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Truncate table before insert `resume_experiances`
--

TRUNCATE TABLE `resume_experiances`;
--
-- Dumping data for table `resume_experiances`
--

INSERT INTO `resume_experiances` (`id`, `user_id`, `resume_id`, `job_title`, `organization`, `country_id`, `state_id`, `city_id`, `start_date`, `end_date`, `current_working`, `details`, `active`, `created_at`, `updated_at`) VALUES
(2, 26, 2, 'Senior Advisory Software Engineer', 'Systems Ltd.', 46, 8, 7, '2015-04-15', '2016-01-15', NULL, 'Having more then 7 years experiance and has the Microsoft Certified Professional in Web & Windows Development, Also have the SCJP & SCWCD for java development for web, console and GUI.', b'1', '2016-11-19 15:48:28', '2016-11-19 15:48:28'),
(3, 26, 2, 'Senior System Analyst', 'Outreach Digital', 46, 8, 7, '2003-12-23', '2011-08-12', NULL, 'Having more then 7 years experiance and has the Microsoft Certified Professional in Web & Windows Development, Also have the SCJP & SCWCD for java development for web, console and GUI.', b'1', '2016-11-19 15:48:28', '2016-11-19 15:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `resume_languages`
--

DROP TABLE IF EXISTS `resume_languages`;
CREATE TABLE IF NOT EXISTS `resume_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `resume_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `proficiency_level_id` int(11) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `resume_languages`
--

TRUNCATE TABLE `resume_languages`;
--
-- Dumping data for table `resume_languages`
--

INSERT INTO `resume_languages` (`id`, `user_id`, `resume_id`, `language_id`, `proficiency_level_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 26, 4, 47, 3, b'1', '2016-11-21 04:13:16', '2016-11-21 04:13:16'),
(2, 26, 4, 150, 6, b'1', '2016-11-21 04:13:16', '2016-11-21 04:13:16');

-- --------------------------------------------------------

--
-- Table structure for table `resume_portfolios`
--

DROP TABLE IF EXISTS `resume_portfolios`;
CREATE TABLE IF NOT EXISTS `resume_portfolios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `resume_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `portfolio_date` date DEFAULT NULL,
  `project_award_id` int(11) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `details` varchar(5000) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Truncate table before insert `resume_portfolios`
--

TRUNCATE TABLE `resume_portfolios`;
--
-- Dumping data for table `resume_portfolios`
--

INSERT INTO `resume_portfolios` (`id`, `user_id`, `resume_id`, `title`, `portfolio_date`, `project_award_id`, `website`, `details`, `active`, `created_at`, `updated_at`) VALUES
(1, 26, 5, 'Pakistani Rupees', '2000-11-09', 3, 'shop.taiz.co', '<p>zxczxc</p>\r\n', b'1', '2016-11-20 04:33:55', '2016-11-20 04:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `resume_projects`
--

DROP TABLE IF EXISTS `resume_projects`;
CREATE TABLE IF NOT EXISTS `resume_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `resume_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `project_type_id` int(11) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `current_working` bit(1) DEFAULT NULL,
  `details` varchar(5000) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Truncate table before insert `resume_projects`
--

TRUNCATE TABLE `resume_projects`;
--
-- Dumping data for table `resume_projects`
--

INSERT INTO `resume_projects` (`id`, `user_id`, `resume_id`, `title`, `position`, `project_type_id`, `organization`, `country_id`, `state_id`, `city_id`, `start_date`, `end_date`, `current_working`, `details`, `active`, `created_at`, `updated_at`) VALUES
(4, 26, 4, 'CareerJib', 'Developer', NULL, 'CareerJib', 46, 8, 7, '2016-01-11', '2016-11-11', b'1', 'dsfsdfdsfdsfdsfdsfs', b'1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resume_publications`
--

DROP TABLE IF EXISTS `resume_publications`;
CREATE TABLE IF NOT EXISTS `resume_publications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `resume_id` int(11) DEFAULT NULL,
  `publication_type_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `publication_date` date DEFAULT NULL,
  `details` varchar(5000) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `resume_publications`
--

TRUNCATE TABLE `resume_publications`;
--
-- Dumping data for table `resume_publications`
--

INSERT INTO `resume_publications` (`id`, `user_id`, `resume_id`, `publication_type_id`, `title`, `author`, `publisher`, `country_id`, `state_id`, `city_id`, `publication_date`, `details`, `active`, `created_at`, `updated_at`) VALUES
(2, 26, 4, 1, 'test', 'myself', 'mass printers', 46, 8, 7, '2016-10-10', 'sjdkhdjhsdh', b'1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resume_references`
--

DROP TABLE IF EXISTS `resume_references`;
CREATE TABLE IF NOT EXISTS `resume_references` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `resume_id` int(11) DEFAULT NULL,
  `reference_type_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Truncate table before insert `resume_references`
--

TRUNCATE TABLE `resume_references`;
--
-- Dumping data for table `resume_references`
--

INSERT INTO `resume_references` (`id`, `user_id`, `resume_id`, `reference_type_id`, `name`, `job_title`, `organization`, `phone`, `email`, `country_id`, `state_id`, `city_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 26, 4, 2, 'Mumtaz Ansari', 'Soft Engineer', 'CareerJin', '3333036853', 'mhansari22@yahoo.com', 46, 8, 7, b'1', '2016-11-20 15:24:00', '2016-11-20 15:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `resume_sections`
--

DROP TABLE IF EXISTS `resume_sections`;
CREATE TABLE IF NOT EXISTS `resume_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `append_update_text` bit(1) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Truncate table before insert `resume_sections`
--

TRUNCATE TABLE `resume_sections`;
--
-- Dumping data for table `resume_sections`
--

INSERT INTO `resume_sections` (`id`, `title`, `description`, `url`, `append_update_text`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Personal Information', NULL, 'seekers/manage/update-personal-information', b'1', b'1', NULL, NULL),
(2, 'Academics', NULL, 'seekers/manage/resume-academics', b'1', b'1', NULL, NULL),
(3, 'Experiences', NULL, 'seekers/manage/resume-experiances', b'1', b'1', NULL, NULL),
(4, 'Projects', NULL, 'seekers/manage/resume-projects', b'1', b'1', NULL, NULL),
(5, 'Languages', NULL, 'seekers/manage/resume-languages', b'1', b'1', NULL, NULL),
(6, 'Skills', NULL, 'seekers/manage/resume-skills', b'1', b'1', NULL, NULL),
(7, 'Certifications', NULL, 'seekers/manage/resume-certifications', b'1', b'1', NULL, NULL),
(8, 'References', NULL, 'seekers/manage/resume-references', b'1', b'1', NULL, NULL),
(9, 'Publications', NULL, 'seekers/manage/resume-publications', b'1', b'1', NULL, NULL),
(10, 'Affiliations', NULL, 'seekers/manage/resume-affiliations', b'1', b'1', NULL, NULL),
(11, 'Honors & Awards', NULL, 'seekers/manage/resume-awards', b'1', b'1', NULL, NULL),
(12, 'Portfolio', NULL, 'seekers/manage/resume-portfolios', b'1', b'1', NULL, NULL),
(13, 'Preview Resume', NULL, 'seekers/manage/resume', NULL, b'1', NULL, NULL),
(14, 'Download Resume', NULL, 'seekers/manage/resume/download', NULL, b'1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resume_seeker_profile`
--

DROP TABLE IF EXISTS `resume_seeker_profile`;
CREATE TABLE IF NOT EXISTS `resume_seeker_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `resume_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `cnic` varchar(15) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `marital_status_id` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `phone_day` varchar(12) DEFAULT NULL,
  `phone_night` varchar(12) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postal_code` varchar(8) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `industry_id` int(11) DEFAULT NULL,
  `experiance_level_id` int(11) DEFAULT NULL,
  `current_salary` int(11) DEFAULT NULL,
  `current_salary_currency_id` int(11) DEFAULT NULL,
  `expected_salary` int(11) DEFAULT NULL,
  `expected_salary_currency_id` int(11) DEFAULT NULL,
  `professional_summary` varchar(5000) DEFAULT NULL,
  `facebook` varchar(45) DEFAULT NULL,
  `linkedin` varchar(45) DEFAULT NULL,
  `twitter` varchar(45) DEFAULT NULL,
  `blog` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Truncate table before insert `resume_seeker_profile`
--

TRUNCATE TABLE `resume_seeker_profile`;
--
-- Dumping data for table `resume_seeker_profile`
--

INSERT INTO `resume_seeker_profile` (`id`, `user_id`, `resume_id`, `first_name`, `last_name`, `father_name`, `cnic`, `gender`, `marital_status_id`, `dob`, `email`, `mobile`, `phone_day`, `phone_night`, `address`, `postal_code`, `country_id`, `state_id`, `city_id`, `industry_id`, `experiance_level_id`, `current_salary`, `current_salary_currency_id`, `expected_salary`, `expected_salary_currency_id`, `professional_summary`, `facebook`, `linkedin`, `twitter`, `blog`, `website`, `active`, `created_at`, `updated_at`) VALUES
(4, 26, 2, 'Mumtaz ul haque', 'Ansari', 'Riaz ul haque Ansari', '42101-8202535-5', 'M', 3, '1983-02-06', 'mhansari22@yahoo.com', '03333036853', '02136376472', '02136376472', 'R-381 Block 9, A-One Cottages, Yaseen Abad.', '75950', 46, 8, 7, 41, 2, 150000, 111, 250000, 111, '<p>To utilize my knowledge and skills for an organization, which offers opportunities for personal growth and career development</p>\r\n', 'mhansari22', 'mhansari22', 'mhansari22', 'mhansari22', 'www.facebook.com', b'1', '2016-11-18 02:27:52', '2016-11-24 02:27:02'),
(5, 26, 4, 'Mumtaz haque', 'Ansari', 'jkfhkjh', '42101-8202535-5', 'M', 1, '1980-08-31', 'mhansari22@yahoo.com', '3036853', '3333036853', '3333036853', 'House No. R-381/9, F.B Area, A-One Cottages', '75950', 46, 8, 7, 1, 2, 50000, 1, 55000, 1, 'Having more then 7 years experiance and has the Microsoft Certified Professional in Web & Windows Development, Also have the SCJP & SCWCD for java development for web, console and GUI.', 'careerjin', 'careerjin', 'careerjin', 'mhansari22@yahoo.com', 'shop.taiz.co', b'1', '2016-11-18 02:31:34', '2016-11-18 05:30:03'),
(6, 26, 6, 'Mumtaz ', 'Ansari', 'Riaz ul haque Ansari', '42101-8202535-5', 'M', 3, '1980-02-06', 'mhansari22@yahoo.com', '3036853', '3333036853', '3333036853', 'R-1222/15 F.B Area', '75950', 46, 8, 7, 14, 2, 150000, 111, 250000, 111, '', 'careerjin', 'careerjin', 'careerjin', 'mhansari22@yahoo.com', 'zumbeel.pk', b'1', '2016-11-24 13:08:57', '2016-11-24 13:08:57'),
(7, 26, 7, 'Mumtaz ', 'Ansari', 'Riaz ul haque Ansari', '42101-8202535-5', 'M', 3, '2016-12-12', 'mhansari22@yahoo.com', '3036853', '3333036853', '3333036853', 'R-1222/15 F.B Area', '75950', 46, 8, 7, 3, 2, 50000, 111, 55000, 111, '', 'CareerJin', 'CareerJin', 'CareerJin', 'mhansari22@yahoo.com', 'shop.taiz.co', b'1', '2016-11-28 07:51:38', '2016-11-28 07:51:38');

-- --------------------------------------------------------

--
-- Table structure for table `resume_skills`
--

DROP TABLE IF EXISTS `resume_skills`;
CREATE TABLE IF NOT EXISTS `resume_skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `resume_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `skill_level_id` int(11) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Truncate table before insert `resume_skills`
--

TRUNCATE TABLE `resume_skills`;
--
-- Dumping data for table `resume_skills`
--

INSERT INTO `resume_skills` (`id`, `user_id`, `resume_id`, `name`, `skill_level_id`, `active`, `created_at`, `updated_at`) VALUES
(2, 26, 4, '.Net', 3, b'1', '2016-11-21 03:42:11', '2016-11-21 03:42:11'),
(3, 26, 4, 'PHP', 3, b'1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

DROP TABLE IF EXISTS `resumes`;
CREATE TABLE IF NOT EXISTS `resumes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Truncate table before insert `resumes`
--

TRUNCATE TABLE `resumes`;
--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`id`, `user_id`, `title`, `resume`, `active`, `created_at`, `updated_at`) VALUES
(1, 26, NULL, 'uploads/42512.doc', b'1', '2016-11-15 06:42:50', '2016-11-15 06:42:50'),
(2, 26, 'My 1st Resume', 'uploads/68375.doc', b'1', '2016-11-15 06:48:48', '2016-11-15 06:48:48'),
(3, 26, 'My 1st Resume', 'uploads/55878.doc', b'1', '2016-11-15 06:48:56', '2016-11-15 06:48:56'),
(4, 26, 'My 2nd Resume', 'uploads/11116.doc', b'1', '2016-11-16 06:44:50', '2016-11-16 06:44:50'),
(5, 26, 'My 3rd Resume', 'uploads/64634.doc', b'1', '2016-11-16 07:46:14', '2016-11-16 07:46:14'),
(6, 26, 'test resume', 'uploads/30894.docx', b'1', '2016-11-24 12:40:51', '2016-11-24 12:40:51'),
(7, 26, 'Pakistani Rupees', 'uploads/82948.doc', b'1', '2016-11-28 07:50:17', '2016-11-28 07:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `salary_currency`
--

DROP TABLE IF EXISTS `salary_currency`;
CREATE TABLE IF NOT EXISTS `salary_currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `salary_currency`
--

TRUNCATE TABLE `salary_currency`;
--
-- Dumping data for table `salary_currency`
--

INSERT INTO `salary_currency` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(2, 'PKR', 1, '2016-02-26 01:55:02', '2016-02-26 08:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `saved_jobs`
--

DROP TABLE IF EXISTS `saved_jobs`;
CREATE TABLE IF NOT EXISTS `saved_jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Truncate table before insert `saved_jobs`
--

TRUNCATE TABLE `saved_jobs`;
--
-- Dumping data for table `saved_jobs`
--

INSERT INTO `saved_jobs` (`id`, `job_id`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 1, 26, '2016-11-30 04:17:14', '2016-11-30 04:17:14'),
(5, 2, 26, '2016-11-30 04:17:17', '2016-11-30 04:17:17'),
(6, 14, 26, '2016-12-04 08:36:22', '2016-12-04 08:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `securityquestions`
--

DROP TABLE IF EXISTS `securityquestions`;
CREATE TABLE IF NOT EXISTS `securityquestions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Active` tinyint(1) DEFAULT NULL,
  `Created_At` timestamp NULL DEFAULT NULL,
  `Updated_At` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `securityquestions`
--

TRUNCATE TABLE `securityquestions`;
--
-- Dumping data for table `securityquestions`
--

INSERT INTO `securityquestions` (`id`, `Name`, `Active`, `Created_At`, `Updated_At`) VALUES
(2, 'What is your city of birth?', 1, '2016-02-05 03:06:12', '2016-02-05 03:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `shift_timings`
--

DROP TABLE IF EXISTS `shift_timings`;
CREATE TABLE IF NOT EXISTS `shift_timings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `seo` varchar(45) NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `shift_timings`
--

TRUNCATE TABLE `shift_timings`;
--
-- Dumping data for table `shift_timings`
--

INSERT INTO `shift_timings` (`id`, `name`, `seo`, `active`, `created_at`, `updated_at`) VALUES
(2, 'Evening Shift', 'evening-shift', 1, '2016-02-26 01:57:50', '2016-02-26 08:38:47');

-- --------------------------------------------------------

--
-- Table structure for table `site_users`
--

DROP TABLE IF EXISTS `site_users`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Truncate table before insert `site_users`
--

TRUNCATE TABLE `site_users`;
--
-- Dumping data for table `site_users`
--

INSERT INTO `site_users` (`id`, `first_name`, `last_name`, `email`, `gender`, `dob`, `country_id`, `state_id`, `city_id`, `mobile_prefix`, `mobile_phone`, `password`, `question_id`, `answer`, `newsletter`, `active`, `suspended`, `suspended_comments`, `created_at`, `updated_at`, `date_suspended`, `date_last_login`, `user_type`, `code`, `remember_token`) VALUES
(24, NULL, NULL, 'mhansari2222@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$TqPUC.esY16fUr5TB1bq2ecRTDpZwbbXF1g6thdzKpH.fQpNxZP7u', NULL, NULL, NULL, NULL, NULL, NULL, '2016-02-19 08:45:08', '2016-02-21 02:32:12', NULL, NULL, NULL, NULL, 'Rr0TmzuRODFOUZSjTZ8f4XjZ25O5iQQr9rY2pgnybAkwS'),
(26, 'Mumtaz ', 'Ansari', 'mhansari22@yahoo.com', '', '2016-12-12', 46, 8, 7, '0333', '3036853', '$2y$10$58FguQjbGxbhPMZ7gW8MFuVcfGM/BvO2hz.H0cqQ9rZTYd8BVk.dK', 2, 'dsfsdf', 1, 1, 0, NULL, '2016-02-21 02:43:38', '2016-11-27 03:00:37', NULL, NULL, 1, 'PujgOlpsea', 'RWXm8pkawnRavsrznAVoRnIY3yJfHOXjnHb5ce7akY1HG'),
(27, 'Mumtaz ul', 'Ansari', 'mhansari@gmail.com', '', '1983-06-02', 46, 8, 7, '0333', '3036853', '$2y$10$omhSAom/GkxI3mofETBPQuwtTWOWG6s8KWOE8F7iljBYAsNiZ5.Cy', 2, 'karachi', 1, 0, 0, NULL, '2016-10-19 06:34:19', '2016-10-19 06:34:19', NULL, NULL, NULL, 'HvXHZFEqAC', NULL),
(28, 'Mumtaz ul', 'Ansari', 'mhansari22@yahoo.com', '', '2012-12-12', 46, 8, 7, '0333', '3333036853', '$2y$10$AF8F/8cOuvqecCNPZFkk4OJoSOk01OodG2aXhuFH.qasTvWEVw8Me', 2, 'wdwef', 1, 0, 0, NULL, '2016-10-19 06:39:22', '2016-10-19 06:39:22', NULL, NULL, NULL, 'gt6Nb2Q8Pn', NULL),
(29, 'hkjhkj', 'hkj', 'jkhkj@f.net', '', '2016-12-12', 46, 8, 7, '0222', '3333036853', '$2y$10$ps9OY4mdbz4sy95CmLmyTe3cuN/L1jh7Xupu1hm3rWKQvX3rFDctS', 2, 'jkh', 1, 0, 0, NULL, '2016-10-19 06:43:21', '2016-10-19 06:43:21', NULL, NULL, NULL, 'c1bqsG5fmS', NULL),
(30, 'Mumtaz ul', 'Ansari', 'mhansari22@yahoo.com', '', '2012-12-12', 46, 8, 7, '0333', '3333036853', '$2y$10$LDCihgqY11RFFwNAMGtBNubEKcJ5zUcyWim0GLz9BI5/yKgYOxf26', 2, 'dsfsdf', 1, 0, 0, NULL, '2016-10-19 06:46:01', '2016-10-19 06:46:01', NULL, NULL, NULL, 'wUdGSOH6qv', NULL),
(31, 'Mumtaz ul', 'Ansari', 'mhansari22@yahoo.com', '', '2016-12-12', 46, 8, 7, '0333', '3333036853', '$2y$10$xakyBJbgOuVMREbowDjF5eT89QT0QuV6TdydwyStLQqg5m2lgIbxO', 2, 'dsfsdf', 1, 0, 0, NULL, '2016-10-19 06:47:55', '2016-10-19 06:47:55', NULL, NULL, NULL, 'LeY8awVE54', NULL),
(32, 'Mumtaz ul', 'Ansari', 'mhansari22@yahoo.com', '', '2016-12-12', 46, 8, 7, '0333', '3333036853', '$2y$10$mqr1euJz4RaBAvJwQetiz.i2B8yzqEl1HSKrv4LpXyOMvfsqyxiRe', 2, 'dsfsdf', 1, 0, 0, NULL, '2016-10-19 06:49:04', '2016-10-19 06:49:04', NULL, NULL, 2, 'WUskGQnWKF', NULL),
(33, 'Mumtaz ul', 'Ansari', 'mhansari22@yahoo.com', '', '2016-12-12', 46, 8, 7, '0333', '3333036853', '$2y$10$C9aKTrMSyk1vQi49gDr1mupL1EtBClqTLXh9dP5BKrq4k8crIvfAW', 2, 'dsfsdf', 1, 0, 0, NULL, '2016-10-19 07:51:34', '2016-10-19 07:51:34', NULL, NULL, 2, 'j0wEjqC5so', NULL),
(34, 'Mumtaz ul', 'Ansari', 'mhansari22@yahoo.com', '', '2016-12-12', 46, 8, 7, '0333', '3333036853', '$2y$10$oCQHNg5rxAW5Aw80a5zlqeKVhjtA7BKxDtqAqxjR7WURIUieDlGAG', 2, 'dsfsdf', 1, 0, 0, NULL, '2016-10-19 07:51:39', '2016-10-19 07:51:39', NULL, NULL, 2, 'SssCV7dwDp', NULL),
(35, 'Mumtaz', 'Ansari', 'mhansari22@yahoo.com', '', '2016-12-12', NULL, NULL, NULL, NULL, NULL, '$2y$10$mzJGv50uurDIpJgoLg8x8.wjRrbMYZGAk0lQ0EPyqyfCQH6woWIEa', NULL, NULL, 1, 0, 0, NULL, '2016-11-08 02:47:02', '2016-11-08 02:47:02', NULL, NULL, 1, '3Bu6DL00Zn', NULL),
(36, 'Mumtaz', 'Ansari', 'mhansari22@yahoo.com', '', '2016-12-12', NULL, NULL, NULL, NULL, NULL, '$2y$10$Yu0CFeyLg7ffiHxg92ohluhbkNRe6MGSoDX3w37x7j3rM7cM6DLAq', NULL, NULL, 1, 0, 0, NULL, '2016-11-08 02:51:39', '2016-11-08 02:51:39', NULL, NULL, 1, '81Loxi5tSN', NULL),
(37, 'Mumtaz', 'Ansari', 'mhansari22@yahoo.com', '', '2016-12-12', NULL, NULL, NULL, NULL, NULL, '$2y$10$p1qTvBNV0VQcbYAKWQDEw.EfzweeUjyb47XuaeGo9wpSKxnGpKZT2', NULL, NULL, 1, 0, 0, NULL, '2016-11-08 02:59:21', '2016-11-08 02:59:21', NULL, NULL, 1, 'ctMfgmbEKs', NULL),
(38, 'Mumtaz', 'Ansari', 'mhansari22@yahoo.com', '', '2016-12-12', NULL, NULL, NULL, NULL, NULL, '$2y$10$5xi3/70s7W584FLQXlN1g.WDEVKdUW.2z4bAeD34ger.nh5ZelRJC', NULL, NULL, 1, 0, 0, NULL, '2016-11-08 03:02:53', '2016-11-08 03:02:53', NULL, NULL, 1, 'HBSoCSDcPK', NULL),
(39, 'Mumtaz', 'Ansari', 'mhansari22@yahoo.com', '', '2016-12-12', NULL, NULL, NULL, NULL, NULL, '$2y$10$RLZqqewnl0b8VvMtpQ5Ii.OlyloSJ3XoMd77EqkSH2U0p3UYNVKi2', NULL, NULL, 1, 0, 0, NULL, '2016-11-08 03:03:04', '2016-11-08 03:03:04', NULL, NULL, 1, 'RyM9sMqgdv', NULL),
(40, 'Mumtaz', 'Ansari', 'mhansari22@yahoo.com', '', '2016-12-12', 46, 8, 4, NULL, NULL, '$2y$10$ukN1.J6FdaeQHcpZ6x.GI.7C.GKV8KQMW45PDBddSaFGOwMDNDnaS', 2, 'dfdfdsf', 1, 0, 0, NULL, '2016-11-08 03:07:05', '2016-11-08 03:07:05', NULL, NULL, 1, 'q6XZI2D66P', NULL),
(41, 'Mumtaz', 'Ansari', 'mhansari22@yahoo.com', '', '2016-12-12', 46, 8, 4, NULL, NULL, '$2y$10$Bkbf.kt6SlAecuopT.PSH.ca0J6T4YMeE2FAOVRPKwv4GOQdZCNKW', 2, 'dfdfdsf', 1, 0, 0, NULL, '2016-11-08 04:11:05', '2016-11-08 04:11:05', NULL, NULL, 1, 'vMmmdmB6w1', NULL),
(42, 'Mumtaz', 'Ansari', 'mhan3sari22@yahoo.com', '', '2016-11-09', 46, 8, 4, NULL, NULL, '$2y$10$6BJodaSngCtikbV.CDK1neUyKCvQ/4qUbmp6MD4132X78qwCk9Glm', 2, 'dsfsdf', 0, 0, 0, NULL, '2016-11-08 14:35:13', '2016-11-08 14:35:13', NULL, NULL, 1, '0hx4Ex4ocO', NULL),
(43, 'Mumtaz', 'Ansari', 'mhan3sari242@yahoo.com', '', '2016-11-09', 46, 8, 4, NULL, NULL, '$2y$10$C13uCwwVfLRfkluhz9rMLOPzHu8Ap66sc8qM3Zvs3eP/fc2zjk3dO', 2, 'dsfsdf', 0, 0, 0, NULL, '2016-11-08 14:36:01', '2016-11-08 14:36:01', NULL, NULL, 1, 'baLkw6kJh4', NULL),
(44, 'Mumtaz', 'Ansari', 'mhan3sari242@yahoo.com', '', '2016-11-09', 46, 8, 4, NULL, NULL, '$2y$10$MDMAMoPyuLp/av65/TGOCusGXqesGzuiOlVRiUZCC6pqWUshlEZ9W', 2, 'dsfsdf', 0, 0, 0, NULL, '2016-11-08 14:36:26', '2016-11-08 14:36:26', NULL, NULL, 1, 'IP1BVktgqZ', NULL),
(45, 'Mumtaz', 'Ansari', 'mhan34sari242@yahoo.com', '', '2016-11-09', 46, 8, 4, NULL, '3333036853', '$2y$10$R/uNwBVWHerDw7GQ6vd/K.BnjnzeDjPwloMBQUSa2S2AWi6zjAM3K', 2, 'dsfsdf', 0, 0, 0, NULL, '2016-11-08 14:46:03', '2016-11-08 14:46:03', NULL, NULL, 1, 'meQeg5lele', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skill_level`
--

DROP TABLE IF EXISTS `skill_level`;
CREATE TABLE IF NOT EXISTS `skill_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Truncate table before insert `skill_level`
--

TRUNCATE TABLE `skill_level`;
--
-- Dumping data for table `skill_level`
--

INSERT INTO `skill_level` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Beginner', b'1', NULL, NULL),
(2, 'Intermediate', b'1', NULL, NULL),
(3, 'Expert', b'1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

DROP TABLE IF EXISTS `social_accounts`;
CREATE TABLE IF NOT EXISTS `social_accounts` (
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(45) DEFAULT NULL,
  `provider` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `social_accounts`
--

TRUNCATE TABLE `social_accounts`;
-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
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
-- Truncate table before insert `states`
--

TRUNCATE TABLE `states`;
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

DROP TABLE IF EXISTS `users`;
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
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ansari', 'mhansari22@yahoo.com', 'mhansari22@yahoo.com', '$2y$10$jZt7UYF4ebaR0TPRl9IBou4fqOwiQdJrC2oGDCSX7jXIguNtP65L6', NULL, NULL, NULL),
(2, '', '', 'mhansari222@yahoo.com', '$2y$10$rV8pDKWagKiUpxNMroSAye8TiEhDvDJKmUMzXxD0.iCHLYuutf1my', 'TNQ0GhsR8ttO8lsIA98GLnLGypflM423BgV37YoFV8mzTV1IJJWcn8W5vJBY', '2016-02-19 08:39:48', '2016-02-19 08:40:12');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applied`
--
ALTER TABLE `applied`
  ADD CONSTRAINT `resume_2` FOREIGN KEY (`resume_id`) REFERENCES `resumes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_2` FOREIGN KEY (`user_id`) REFERENCES `site_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `job_benefits`
--
ALTER TABLE `job_benefits`
  ADD CONSTRAINT `benefits` FOREIGN KEY (`benefit_id`) REFERENCES `benefits` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `jobs_` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_cities`
--
ALTER TABLE `job_cities`
  ADD CONSTRAINT `cities` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `jobs` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `ad-type` FOREIGN KEY (`ad_type_id`) REFERENCES `ad_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `career-level` FOREIGN KEY (`career_level_id`) REFERENCES `career_levels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `country` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `department` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `experiance-level` FOREIGN KEY (`experiance_level_id`) REFERENCES `experiance_levels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `expiry-actions` FOREIGN KEY (`after_expiry_actions_id`) REFERENCES `after_expiry_actions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `job-type` FOREIGN KEY (`job_type_id`) REFERENCES `job_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `shift-timings` FOREIGN KEY (`shift_timings_id`) REFERENCES `shift_timings` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
