-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2019 at 09:33 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `nickname` varchar(10) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(100) NOT NULL,
  `emailAddress` text NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nickname`, `username`, `password`, `emailAddress`, `token`) VALUES
(1, 'admin', 'user_admin', '729c75c1c29ab8de6761711fd2bf28e0', 'inder.velocityconsultancy@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `associations`
--

CREATE TABLE `associations` (
  `associationsId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `associationsName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `associations`
--

INSERT INTO `associations` (`associationsId`, `locationId`, `associationsName`) VALUES
(8, 1, 'Association One'),
(9, 2, 'Association One'),
(30, 7, 'BBA Accrediated'),
(31, 7, 'Upwork'),
(42, 9, 'BBA Accrediated'),
(43, 9, 'Upwork'),
(50, 10, 'BBA Accrediated'),
(51, 10, 'Upwork'),
(54, 8, 'BBA Accrediated'),
(55, 8, 'Upwork');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brandsId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `brandsName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brandsId`, `locationId`, `brandsName`) VALUES
(1, 1, 'Levis'),
(2, 1, 'Denim'),
(3, 2, 'Dolce Gabbana'),
(4, 2, 'Elvin'),
(25, 7, 'Divi Theme'),
(26, 7, 'Wordpress'),
(37, 9, 'Divi Theme'),
(38, 9, 'Wordpress'),
(45, 10, 'Divi Theme'),
(46, 10, 'Wordpress'),
(49, 8, 'Divi Theme'),
(50, 8, 'Wordpress');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoriesId` int(10) NOT NULL,
  `categoryID` int(20) NOT NULL,
  `locationId` int(10) NOT NULL,
  `categoriesName` text NOT NULL,
  `categoriesNameAlias` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoriesId`, `categoryID`, `locationId`, `categoriesName`, `categoriesNameAlias`) VALUES
(1, 13, 1, 'Restaurants', 'restaurants'),
(2, 12, 1, 'Mexican Restaurants', 'mexican-restaurants'),
(3, 11, 2, 'Chinese Restaurants', 'chinese-restaurants'),
(4, 10, 2, 'Uncle\'s Restaurants', 'uncles-restaurants'),
(25, 21, 7, 'Web Development', 'web-development'),
(26, 22, 7, 'Web Designing', 'web-designing'),
(37, 21, 9, 'Web Development', 'web-development'),
(38, 22, 9, 'Web Designing', 'web-designing'),
(45, 99, 10, 'Balling Hard', 'balling-hard'),
(46, 4999, 10, 'Getting money', 'getting-money'),
(49, 21, 8, 'Web Development', 'web-development'),
(50, 22, 8, 'Web Designing', 'web-designing');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` int(10) NOT NULL,
  `reviewId` int(10) NOT NULL,
  `commentTimestamp` datetime NOT NULL,
  `commentAuthorName` text NOT NULL,
  `commentContent` text NOT NULL,
  `commentAuthorPhotoUrl` text NOT NULL,
  `commentOwnerResponse` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentId`, `reviewId`, `commentTimestamp`, `commentAuthorName`, `commentContent`, `commentAuthorPhotoUrl`, `commentOwnerResponse`) VALUES
(1, 1, '2019-05-15 13:26:48', 'Lionel Messi', 'This year we will win treble too..... Forca BARCA', 'https://www.barcelona.com/lionelMessi', 0),
(2, 1, '2019-05-15 13:26:48', 'Lionel Messi', 'Ya I know I comment same thing Every year', 'https://www.barcelona.com/lionelMessi', 0),
(3, 2, '2019-05-15 13:26:48', 'Lionel Messi', 'This year we will win treble too..... Forca BARCA', 'https://www.barcelona.com/lionelMessi', 0),
(4, 2, '2019-05-15 13:26:48', 'Lionel Messi', 'This year we will win treble too..... Forca BARCA', 'https://www.barcelona.com/lionelMessi', 0),
(5, 3, '2019-05-15 13:26:48', 'Lionel Messi', 'This year we will win treble too..... Forca BARCA', 'https://www.barcelona.com/lionelMessi', 0),
(6, 3, '2019-05-15 13:26:48', 'Lionel Messi', 'This year we will win treble too..... Forca BARCA', 'https://www.barcelona.com/lionelMessi', 0),
(7, 4, '2019-05-15 13:26:48', 'Lionel Messi', 'This year we will win treble too..... Forca BARCA', 'https://www.barcelona.com/lionelMessi', 0),
(8, 4, '2019-05-15 13:26:48', 'Lionel Messi', 'This year we will win treble too..... Forca BARCA', 'https://www.barcelona.com/lionelMessi', 0),
(10, 7, '2019-06-19 11:44:45', 'Author Name', 'Comment Content', 'authorPhotoUrl.com/link.png', 0),
(11, 8, '2019-06-19 11:44:51', 'Author Name', 'Comment Content', 'authorPhotoUrl.com/link.png', 0),
(12, 8, '2019-06-20 07:12:38', 'Author Name', 'Comment Content', 'authorPhotoUrl.com/link.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `emailsId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `emailsAddress` text,
  `emailsDescription` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`emailsId`, `locationId`, `emailsAddress`, `emailsDescription`) VALUES
(1, 1, 'kitskitchen2336@gmail.com', 'Manager\'s email'),
(2, 1, 'info@bbq.com', 'Customer Service'),
(3, 2, 'uncleskitchen2336@gmail.com', 'Owner\'s email'),
(4, 2, 'info@bbq.com', 'Customer Service'),
(35, 7, 'velocity.consult@gmail.com', 'Gmails email'),
(36, 7, 'info@velocityconsultancy.com', 'Owners emails'),
(37, 7, 'developers@velocityconsultancy.com', 'Employees emails'),
(53, 9, 'velocity.consult@gmail.com', 'Gmails email'),
(54, 9, 'info@velocityconsultancy.com', 'Owners emails'),
(55, 9, 'developers@velocityconsultancy.com', 'Employees emails'),
(65, 10, 'velocity.consult@gmail.com', 'Gmails email'),
(66, 10, 'info@velocityconsultancy.com', 'Owners emails'),
(67, 10, 'developers@velocityconsultancy.com', 'Employees emails'),
(71, 8, 'velocity.consult@gmail.com', 'Gmails email'),
(72, 8, 'info@velocityconsultancy.com', 'Owners emails'),
(73, 8, 'developers@velocityconsultancy.com', 'Employees emails');

-- --------------------------------------------------------

--
-- Table structure for table `friday`
--

CREATE TABLE `friday` (
  `fridayId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `starts` varchar(20) DEFAULT NULL,
  `ends` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friday`
--

INSERT INTO `friday` (`fridayId`, `locationId`, `starts`, `ends`) VALUES
(5, 2, '08:00:00', '08:00:00'),
(6, 2, '08:00:00', '08:00:00'),
(37, 7, '10:00:00', '13:30:00'),
(38, 7, '14:30:00', '17:00:00'),
(39, 7, '17:30:00', '19:20:00'),
(55, 9, '10:00:00', '13:30:00'),
(56, 9, '14:30:00', '17:00:00'),
(57, 9, '17:30:00', '19:20:00'),
(67, 10, '10:00:00', '14:00:00'),
(71, 8, '10:00:00', '13:30:00'),
(72, 8, '14:30:00', '17:00:00'),
(73, 8, '17:30:00', '19:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imagesId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `width` int(10) DEFAULT NULL,
  `imagesType` varchar(10) DEFAULT NULL,
  `imagesUrl` text,
  `height` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imagesId`, `locationId`, `width`, `imagesType`, `imagesUrl`, `height`) VALUES
(1, 1, 100, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/100x100.jpg', 100),
(2, 1, 284, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/284x100.jpg', 100),
(3, 1, 50, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/50x40.jpg', 40),
(4, 1, 200, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/200x150.jpg', 150),
(5, 2, 100, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/100x100.jpg', 100),
(6, 2, 284, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/284x100.jpg', 100),
(7, 2, 50, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/50x40.jpg', 40),
(8, 2, 200, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/200x150.jpg', 150),
(49, 7, 100, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/100x100.jpg', 100),
(50, 7, 284, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/284x100.jpg', 100),
(51, 7, 50, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/50x40.jpg', 40),
(52, 7, 200, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/200x150.jpg', 150),
(73, 9, 100, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/100x100.jpg', 100),
(74, 9, 284, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/284x100.jpg', 100),
(75, 9, 50, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/50x40.jpg', 40),
(76, 9, 200, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/200x150.jpg', 150),
(89, 10, 100, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/100x100.jpg', 100),
(90, 10, 284, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/284x100.jpg', 100),
(91, 10, 50, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/50x40.jpg', 40),
(92, 10, 200, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/200x150.jpg', 150),
(97, 8, 100, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/100x100.jpg', 100),
(98, 8, 284, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/284x100.jpg', 100),
(99, 8, 50, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/50x40.jpg', 40),
(100, 8, 200, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/200x150.jpg', 150);

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `keywordsId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `keywordsName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`keywordsId`, `locationId`, `keywordsName`) VALUES
(1, 1, 'keywordOne'),
(2, 1, 'keywordTwo'),
(3, 2, 'keywordThree'),
(4, 2, 'keywordFour'),
(55, 7, 'Web Development'),
(56, 7, 'SEO'),
(57, 7, 'Graphics'),
(58, 7, 'API'),
(59, 7, 'Web Design'),
(85, 9, 'Web Development'),
(86, 9, 'SEO'),
(87, 9, 'Graphics'),
(88, 9, 'API'),
(89, 9, 'Web Design'),
(105, 10, 'Web Development'),
(106, 10, 'SEO'),
(107, 10, 'Graphics'),
(108, 10, 'API'),
(109, 10, 'Web Design'),
(115, 8, 'Web Development'),
(116, 8, 'SEO'),
(117, 8, 'Graphics'),
(118, 8, 'API'),
(119, 8, 'Web Design');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `languagesId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `languagesName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`languagesId`, `locationId`, `languagesName`) VALUES
(1, 2, 'Language One'),
(2, 2, 'Language Two'),
(3, 1, 'Language One'),
(4, 1, 'Language Two'),
(45, 7, 'English'),
(46, 7, 'Hindi'),
(47, 7, 'Gujarati'),
(48, 7, 'Marathi'),
(61, 9, 'English'),
(62, 9, 'Hindi Updated'),
(73, 10, 'English'),
(74, 10, 'Hindi Updated'),
(77, 8, 'English'),
(78, 8, 'Hindi Updated');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `listsId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `listsName` text,
  `listsDescription` text,
  `listsType` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`listsId`, `locationId`, `listsName`, `listsDescription`, `listsType`) VALUES
(1, 1, 'Services We Offer', 'Products and Services', 'PRODUCTS'),
(2, 1, 'See My Products', 'Products and Services', 'PRODUCTS'),
(3, 2, 'Services We Offer', 'Products and Services', 'PRODUCTS'),
(4, 2, 'See My Products', 'Products and Services', 'PRODUCTS'),
(25, 7, 'Services We Offer', 'Products and Services', 'PRODUCTS'),
(26, 7, 'See My Products', 'Products and Services', 'PRODUCTS'),
(37, 9, 'Services We Offer', 'Products and Services', 'PRODUCTS'),
(38, 9, 'See My Products', 'Products and Services', 'PRODUCTS'),
(45, 10, 'Services We Offer', 'Products and Services', 'PRODUCTS'),
(46, 10, 'See My Products', 'Products and Services', 'PRODUCTS'),
(49, 8, 'Services We Offer', 'Products and Services', 'PRODUCTS'),
(50, 8, 'See My Products', 'Products and Services', 'PRODUCTS');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `locationId` int(10) NOT NULL,
  `yextID` int(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'BLOCKED',
  `name` text NOT NULL,
  `address` text NOT NULL,
  `visible` varchar(10) DEFAULT 'false',
  `address2` text,
  `city` text NOT NULL,
  `displayAddress` text,
  `countryCode` varchar(5) NOT NULL,
  `postalCode` varchar(10) NOT NULL,
  `state` varchar(10) NOT NULL,
  `description` text,
  `displayLatitude` text NOT NULL,
  `displayLongitude` text NOT NULL,
  `routableLatitude` text,
  `routableLongitude` text,
  `hoursDisplayText` varchar(100) DEFAULT NULL,
  `specialOfferMessage` text,
  `specialOfferUrl` text,
  `paymentOptions` text,
  `twitterHandle` text,
  `facebookPageUrl` text,
  `attributionImageWidth` int(10) DEFAULT NULL,
  `attributionImageDescription` text,
  `attributionImageUrl` text,
  `attributionImageHeight` int(10) DEFAULT NULL,
  `attributionUrl` text,
  `closed` varchar(10) DEFAULT NULL,
  `yearEstablished` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`locationId`, `yextID`, `status`, `name`, `address`, `visible`, `address2`, `city`, `displayAddress`, `countryCode`, `postalCode`, `state`, `description`, `displayLatitude`, `displayLongitude`, `routableLatitude`, `routableLongitude`, `hoursDisplayText`, `specialOfferMessage`, `specialOfferUrl`, `paymentOptions`, `twitterHandle`, `facebookPageUrl`, `attributionImageWidth`, `attributionImageDescription`, `attributionImageUrl`, `attributionImageHeight`, `attributionUrl`, `closed`, `yearEstablished`) VALUES
(1, 123456, 'ACTIVE', 'Kit\'s Kitchen', '2336 Gramercy', 'true', 'Second Floor', 'Houston', 'Near the astrodome', 'US', '77030', 'TX', 'Come on in and check out our newest additions!', '29.70468', '-95.41429', '29.70468', '-95.41429', 'M-Sa 9am-10pm, Su Closed', 'Sign up to receive our deals!', 'https://kits-kitchen.movylo.com/index.php?pag=get_deals&s=yext', 'American Express, Cash, Check, Traveler\'s Check, Visa', 'KitsKitchenTX', 'https://www.facebook.com/thebestbarbecueintexasthatanyoneiknowoflikestoeat/', 143, 'Yext PowerListings', 'http://www.yextstatic.com/cms/pl-synced/pl-synced.png', 20, 'http://www.yext.com/', 'false', 1992),
(2, 123456, 'ACTIVE', 'Kit\'s Kitchen', '2336 Gramercy', 'true', 'Second Floor', 'Houston', 'Near the astrodome', 'US', '77030', 'TX', 'Come on in and check out our newest additions!', '29.70468', '-95.41429', '29.70468', '-95.41429', 'M-Sa 9am-10pm, Su Closed', 'Sign up to receive our deals!', 'https://kits-kitchen.movylo.com/index.php?pag=get_deals&s=yext', 'American Express, Cash, Check, Traveler\'s Check, Visa', 'KitsKitchenTX', 'https://www.facebook.com/thebestbarbecueintexasthatanyoneiknowoflikestoeat/', 143, 'Yext PowerListings', 'http://www.yextstatic.com/cms/pl-synced/pl-synced.png', 20, 'http://www.yext.com/', 'false', 1992),
(7, 123456, 'ACTIVE', 'Velocity Consultancy', 'Sej Plaza', 'true', 'Ground Floor', 'Mumbai', 'G-4 Sej Plaza, Near Nutun School', 'IN', '400097', 'MH', 'Mumbai\'s number One Web development firm', '29.70468', '-95.41429', '29.70468', '-95.41429', 'Monday-Friday 10am-7pm, Saturaday 10am-2ox Sunday Closed', 'Sign up to receive our deals!', 'https://kits-kitchen.movylo.com/index.php?pag=get_deals', '', 'velocityConsultancy', 'https://www.facebook.com/velocityconsultancy/', 143, 'Yext PowerListings', 'http://www.yextstatic.com/cms/pl-synced/pl-synced.png', 20, 'http://www.yext.com/', 'false', 2008),
(8, 123456, 'ACTIVE', 'Velocity Consultancy', 'Sej Plaza', 'true', 'Ground Floor', 'Mumbai', 'G-4 Sej Plaza, Near Nutun School', 'IN', '400097', 'MH', 'Mumbai\'s number One Web development firm', '29.70468', '-95.41429', '29.70468', '-95.41429', 'Monday-Friday 10am-7pm, Saturaday 10am-2ox Sunday Closed', 'Sign up to receive our deals!', 'https://kits-kitchen.movylo.com/index.php?pag=get_deals', '', 'velocityConsultancy', 'https://www.facebook.com/velocityconsultancy/', 143, 'Yext PowerListings', 'http://www.yextstatic.com/cms/pl-synced/pl-synced.png', 20, 'http://www.yext.com/', 'false', 2008),
(9, 123456, 'SUPPRESSED', 'Velocity Consultancy', 'Sej Plaza', 'true', 'Ground Floor', 'Mumbai', 'G-4 Sej Plaza, Near Nutun School', 'IN', '400097', 'MH', 'Mumbai\'s number One Web development firm', '29.70468', '-95.41429', '29.70468', '-95.41429', 'Monday-Friday 10am-7pm, Saturaday 10am-2ox Sunday Closed', 'Sign up to receive our deals!', 'https://kits-kitchen.movylo.com/index.php?pag=get_deals', '', 'velocityConsultancy', 'https://www.facebook.com/velocityconsultancy/', 143, 'Yext PowerListings', 'http://www.yextstatic.com/cms/pl-synced/pl-synced.png', 20, 'http://www.yext.com/', 'false', 2008),
(10, 123456, 'ACTIVE', 'The Library', 'Sej Plaza', 'true', 'Ground Floor', 'Mumbai', 'G-4 Sej Plaza, Near Nutun School', 'IN', '400097', 'MH', 'Mumbai\'s number One Web development firm', '29.70468', '-95.41429', '29.70468', '-95.41429', 'Monday-Friday 10am-7pm, Saturaday 10am-2ox Sunday Closed', 'Sign up to receive our deals!', 'https://kits-kitchen.movylo.com/index.php?pag=get_deals', NULL, 'velocity_after_dark', 'https://www.facebook.com/velocityconsultancy/', 143, 'Yext PowerListings', 'http://www.yextstatic.com/cms/pl-synced/pl-synced.png', 20, 'http://www.yext.com/', 'false', 2008);

-- --------------------------------------------------------

--
-- Table structure for table `monday`
--

CREATE TABLE `monday` (
  `mondayId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `starts` varchar(20) DEFAULT NULL,
  `ends` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monday`
--

INSERT INTO `monday` (`mondayId`, `locationId`, `starts`, `ends`) VALUES
(1, 2, '08:00:00', '15:00:00'),
(2, 2, '17:00:00', '23:00:00'),
(33, 7, '10:00:00', '13:30:00'),
(34, 7, '14:30:00', '17:00:00'),
(35, 7, '17:30:00', '19:20:00'),
(51, 9, '10:00:00', '13:30:00'),
(52, 9, '14:30:00', '17:00:00'),
(53, 9, '17:30:00', '19:20:00'),
(63, 10, '10:00:00', '13:30:00'),
(67, 8, '10:00:00', '13:30:00'),
(68, 8, '14:30:00', '17:00:00'),
(69, 8, '17:30:00', '19:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `phoneId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `numbers` varchar(15) DEFAULT NULL,
  `phonesCountryCode` varchar(5) DEFAULT NULL,
  `phonesDescription` text,
  `phonesType` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`phoneId`, `locationId`, `numbers`, `phonesCountryCode`, `phonesDescription`, `phonesType`) VALUES
(1, 1, '2814105479', '1', 'Main', 'MAIN'),
(2, 1, '4568972254', '1', 'Alt', 'ALTERNATE'),
(3, 1, '8005467892', '1', 'Toll Free', 'TOLL_FREE'),
(4, 2, '2814105479', '1', 'Main', 'MAIN'),
(5, 2, '4568972254', '1', 'Alt', 'ALTERNATE'),
(6, 2, '8005467892', '1', 'Toll Free', 'TOLL_FREE'),
(47, 7, '022-12345678', '+91', 'Office', 'Office'),
(48, 7, '1234567890', '+91', 'Alt', 'Alt'),
(49, 7, '7894561230', '+91', 'Toll Free', 'Toll Free'),
(50, 7, '4578960231', '+91', 'Road Side', 'Road Side'),
(71, 9, '022-12345678', '+91', 'Office', 'Office'),
(72, 9, '022-12345679', '+91', 'Office2', 'Office2'),
(73, 9, '1234567890', '+91', 'Alt', 'Alt'),
(74, 9, '7894561230', '+91', 'Toll Free', 'Toll Free'),
(75, 9, '4578960231', '+91', 'Road Side', 'Road Side'),
(88, 10, '022-12345678', '+91', 'Office', 'Office'),
(89, 10, '1234567890', '+91', 'Alt', 'Alt'),
(90, 10, '7894561230', '+91', 'Toll Free', 'Toll Free'),
(91, 10, '4578960231', '+91', 'Road Side', 'Road Side'),
(96, 8, '022-12345678', '+91', 'Office', 'Office'),
(97, 8, '1234567890', '+91', 'Alt', 'Alt'),
(98, 8, '7894561230', '+91', 'Toll Free', 'Toll Free'),
(99, 8, '4578960231', '+91', 'Road Side', 'Road Side');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productsId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `productsName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productsId`, `locationId`, `productsName`) VALUES
(1, 1, 'Product One'),
(2, 1, 'Product Two'),
(3, 2, 'Product One'),
(4, 2, 'Product Two'),
(25, 7, 'Product One'),
(26, 7, 'Product Two'),
(37, 9, 'Product One'),
(38, 9, 'Product Two'),
(45, 10, 'Product One'),
(46, 10, 'Product Two'),
(49, 8, 'Product One'),
(50, 8, 'Product Two');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `reviewStatus` varchar(20) NOT NULL,
  `reviewTimestamp` datetime NOT NULL,
  `reviewAuthorName` varchar(100) NOT NULL,
  `reviewAuthorPhotoUrl` text NOT NULL,
  `reviewTitle` text NOT NULL,
  `reviewContent` text NOT NULL,
  `reviewUrl` text NOT NULL,
  `reviewSource` text NOT NULL,
  `reviewRating` float(2,1) NOT NULL,
  `reviewGenerated` tinyint(1) DEFAULT '0',
  `reviewFlagReason` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `locationId`, `reviewStatus`, `reviewTimestamp`, `reviewAuthorName`, `reviewAuthorPhotoUrl`, `reviewTitle`, `reviewContent`, `reviewUrl`, `reviewSource`, `reviewRating`, `reviewGenerated`, `reviewFlagReason`) VALUES
(1, 1, 'ACTIVE', '2019-05-06 08:33:38', 'Luis Figo', 'http://www.somelinkto.uefa/cristianoRonaldo.png', 'We are the champions.', 'Winning UEFA Cup is best of ALL and losing it means nothing.', 'https://www.somelink.uefa/myreviewUrl', 'MyOfficialSite', 4.5, 0, ''),
(2, 1, 'ACTIVE', '2019-05-06 08:33:38', 'Cristiano Ronaldo', 'http://www.somelinkto.uefa/cristianoRonaldo.png', 'We are the champions.', 'Winning UEFA Cup is best of ALL and losing it means nothing.', 'https://www.somelink.uefa/myreviewUrl', 'MyOfficialSite', 4.0, 0, ''),
(3, 2, 'ACTIVE', '2019-05-06 08:33:38', 'Cristiano Ronaldo', 'http://www.somelinkto.uefa/cristianoRonaldo.png', 'We are the champions.', 'Winning UEFA Cup is best of ALL and losing it means nothing.', 'https://www.somelink.uefa/myreviewUrl', 'MyOfficialSite', 4.0, 0, ''),
(4, 2, 'ACTIVE', '2019-05-06 08:33:38', 'Cristiano Ronaldo', 'http://www.somelinkto.uefa/cristianoRonaldo.png', 'We are the champions.', 'Winning UEFA Cup is best of ALL and losing it means nothing.', 'https://www.somelink.uefa/myreviewUrl', 'MyOfficialSite', 3.0, 0, ''),
(5, 8, 'ACTIVE', '2019-05-06 08:33:38', 'Cristiano Ronaldo', 'http://www.somelinkto.uefa/cristianoRonaldo.png', 'We are the champions.', 'Winning UEFA Cup is best of ALL and losing it means nothing.', 'https://www.somelink.uefa/myreviewUrl', 'MyOfficialSite', 5.0, 0, ''),
(6, 8, 'ACTIVE', '2019-05-06 08:33:38', 'Cristiano Ronaldo', 'http://www.somelinkto.uefa/cristianoRonaldo.png', 'We are the champions.', 'Winning UEFA Cup is best of ALL and losing it means nothing.', 'https://www.somelink.uefa/myreviewUrl', 'MyOfficialSite', 4.0, 0, ''),
(7, 7, 'ACTIVE', '2019-05-06 08:33:38', 'Cristiano Ronaldo', 'http://www.somelinkto.uefa/cristianoRonaldo.png', 'We are the champions.', 'Winning UEFA Cup is best of ALL and losing it means nothing.', 'https://www.somelink.uefa/myreviewUrl', 'MyOfficialSite', 2.0, 0, ''),
(8, 7, 'ACTIVE', '2019-05-06 08:33:38', 'Cristiano Ronaldo', 'http://www.somelinkto.uefa/cristianoRonaldo.png', 'We are the champions.', 'Winning UEFA Cup is best of ALL and losing it means nothing.', 'https://www.somelink.uefa/myreviewUrl', 'MyOfficialSite', 4.0, 0, ''),
(9, 7, 'ACTIVE', '2019-06-20 08:45:53', 'Author Name', 'somerultoauthorphoto.com/123.jpg', 'Review Title', 'Review Content', 'reviewurl.com/reviews', 'Review Source', 4.0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `saturday`
--

CREATE TABLE `saturday` (
  `saturdayId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `starts` varchar(20) DEFAULT NULL,
  `ends` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saturday`
--

INSERT INTO `saturday` (`saturdayId`, `locationId`, `starts`, `ends`) VALUES
(5, 2, '08:00:00', '08:00:00'),
(6, 2, '08:00:00', '08:00:00'),
(17, 7, '10:00:00', '14:00:00'),
(23, 9, '10:00:00', '14:00:00'),
(28, 8, '10:00:00', '14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `servicesId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `servicesName` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`servicesId`, `locationId`, `servicesName`) VALUES
(3, 1, 'Fully Opimized Wesbite'),
(4, 1, 'Fully customised Wesbite'),
(5, 2, 'Fully Opimized Wesbite'),
(6, 2, 'Fully customised Wesbite'),
(37, 7, 'Fully Opimized Wesbite'),
(38, 7, 'Fully Customized Wesbite'),
(39, 7, 'SEO Friendly Wesbite'),
(47, 9, 'Fully Opimized Wesbite Once'),
(55, 10, 'Fully Opimized Wesbite Once'),
(57, 8, 'Fully Opimized Wesbite Once');

-- --------------------------------------------------------

--
-- Table structure for table `specialities`
--

CREATE TABLE `specialities` (
  `specialitiesId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `specialitiesName` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialities`
--

INSERT INTO `specialities` (`specialitiesId`, `locationId`, `specialitiesName`) VALUES
(1, 1, 'Specialities One'),
(2, 2, 'Specialities Two'),
(3, 2, 'Speciality Three'),
(84, 7, 'PHP'),
(85, 7, 'NodeJS'),
(86, 7, 'Express'),
(87, 7, 'MongoDB'),
(88, 7, 'HTML'),
(89, 7, 'CSS'),
(90, 7, 'Javascript'),
(91, 7, 'Angular'),
(132, 9, 'PHP'),
(133, 9, 'NodeJS'),
(134, 9, 'Express'),
(135, 9, 'MongoDB'),
(136, 9, 'HTML'),
(137, 9, 'CSS'),
(138, 9, 'Javascript'),
(139, 9, 'Angular'),
(164, 10, 'PHP'),
(165, 10, 'NodeJS'),
(166, 10, 'Express'),
(167, 10, 'MongoDB'),
(168, 10, 'HTML'),
(169, 10, 'CSS'),
(170, 10, 'Javascript'),
(171, 10, 'Angular'),
(180, 8, 'PHP'),
(181, 8, 'NodeJS'),
(182, 8, 'Express'),
(183, 8, 'MongoDB'),
(184, 8, 'HTML'),
(185, 8, 'CSS'),
(186, 8, 'Javascript'),
(187, 8, 'Angular');

-- --------------------------------------------------------

--
-- Table structure for table `sunday`
--

CREATE TABLE `sunday` (
  `sundayId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `starts` varchar(20) DEFAULT NULL,
  `ends` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thursday`
--

CREATE TABLE `thursday` (
  `thursdayId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `starts` varchar(20) DEFAULT NULL,
  `ends` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thursday`
--

INSERT INTO `thursday` (`thursdayId`, `locationId`, `starts`, `ends`) VALUES
(5, 2, '08:00:00', '08:00:00'),
(6, 2, '08:00:00', '08:00:00'),
(37, 7, '10:00:00', '13:30:00'),
(38, 7, '14:30:00', '17:00:00'),
(39, 7, '17:30:00', '19:20:00'),
(55, 9, '10:00:00', '13:30:00'),
(56, 9, '14:30:00', '17:00:00'),
(57, 9, '17:30:00', '19:20:00'),
(67, 10, '10:00:00', '13:30:00'),
(68, 10, '14:30:00', '17:00:00'),
(69, 10, '17:30:00', '19:20:00'),
(73, 8, '10:00:00', '13:30:00'),
(74, 8, '14:30:00', '17:00:00'),
(75, 8, '17:30:00', '19:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `tuesday`
--

CREATE TABLE `tuesday` (
  `tuesdayId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `starts` varchar(20) DEFAULT NULL,
  `ends` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuesday`
--

INSERT INTO `tuesday` (`tuesdayId`, `locationId`, `starts`, `ends`) VALUES
(3, 2, '08:00:00', '08:00:00'),
(4, 2, '08:00:00', '08:00:00'),
(35, 7, '10:00:00', '13:30:00'),
(36, 7, '14:30:00', '17:00:00'),
(37, 7, '17:30:00', '19:20:00'),
(53, 9, '10:00:00', '13:30:00'),
(54, 9, '14:30:00', '17:00:00'),
(55, 9, '17:30:00', '19:20:00'),
(65, 10, '10:00:00', '13:30:00'),
(66, 10, '14:30:00', '17:00:00'),
(67, 10, '17:30:00', '19:20:00'),
(71, 8, '10:00:00', '13:30:00'),
(72, 8, '14:30:00', '17:00:00'),
(73, 8, '17:30:00', '19:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `urls`
--

CREATE TABLE `urls` (
  `urlsId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `displayUrl` text,
  `urlsDescription` varchar(50) DEFAULT NULL,
  `urlsType` varchar(20) DEFAULT NULL,
  `urls` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `urls`
--

INSERT INTO `urls` (`urlsId`, `locationId`, `displayUrl`, `urlsDescription`, `urlsType`, `urls`) VALUES
(1, 1, 'http://www.stevenhightower.net/kk/menu.html', 'menu', 'MENU', 'http://www.stevenhightower.net/kk/menu.html'),
(2, 1, 'https://app.agendize.com/book/19171870', 'reservation', 'RESERVATION', 'ttps://app.agendize.com/book/19171870'),
(3, 1, 'http://www.kits-kitchen.com', 'website', 'WEBSITE', 'http://www.kits-kitchen.com'),
(4, 1, 'http://www.kits-kitchen.com', 'order', 'ORDER', 'http://www.kits-kitchen.com'),
(5, 2, 'http://www.stevenhightower.net/kk/menu.html', 'menu', 'MENU', 'http://www.stevenhightower.net/kk/menu.html'),
(6, 2, 'https://app.agendize.com/book/19171870', 'reservation', 'RESERVATION', 'ttps://app.agendize.com/book/19171870'),
(7, 2, 'http://www.kits-kitchen.com', 'website', 'WEBSITE', 'http://www.kits-kitchen.com'),
(8, 2, 'http://www.kits-kitchen.com', 'order', 'ORDER', 'http://www.kits-kitchen.com'),
(49, 7, 'http://www.stevenhightower.net/kk/menu.html', 'menu', 'MENU', 'http://www.stevenhightower.net/kk/menu.html'),
(50, 7, 'https://app.agendize.com/book/19171870', 'reservation', 'RESERVATION', 'ttps://app.agendize.com/book/19171870'),
(51, 7, 'http://www.kits-kitchen.com', 'website', 'WEBSITE', 'http://www.kits-kitchen.com'),
(52, 7, 'http://www.kits-kitchen.com', 'order', 'ORDER', 'http://www.kits-kitchen.com'),
(73, 9, 'http://www.stevenhightower.net/kk/menu.html', 'menu', 'MENU', 'http://www.stevenhightower.net/kk/menu.html'),
(74, 9, 'https://app.agendize.com/book/19171870', 'reservation', 'RESERVATION', 'ttps://app.agendize.com/book/19171870'),
(75, 9, 'http://www.kits-kitchen.com', 'website', 'WEBSITE', 'http://www.kits-kitchen.com'),
(76, 9, 'http://www.kits-kitchen.com', 'order', 'ORDER', 'http://www.kits-kitchen.com'),
(89, 10, 'http://www.stevenhightower.net/kk/menu.html', 'menu', 'MENU', 'http://www.stevenhightower.net/kk/menu.html'),
(90, 10, 'https://app.agendize.com/book/19171870', 'reservation', 'RESERVATION', 'ttps://app.agendize.com/book/19171870'),
(91, 10, 'http://www.kits-kitchen.com', 'website', 'WEBSITE', 'http://www.kits-kitchen.com'),
(92, 10, 'http://www.kits-kitchen.com', 'order', 'ORDER', 'http://www.kits-kitchen.com'),
(97, 8, 'http://www.stevenhightower.net/kk/menu.html', 'menu', 'MENU', 'http://www.stevenhightower.net/kk/menu.html'),
(98, 8, 'https://app.agendize.com/book/19171870', 'reservation', 'RESERVATION', 'ttps://app.agendize.com/book/19171870'),
(99, 8, 'http://www.kits-kitchen.com', 'website', 'WEBSITE', 'http://www.kits-kitchen.com'),
(100, 8, 'http://www.kits-kitchen.com', 'order', 'ORDER', 'http://www.kits-kitchen.com');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `videosId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `videosUrl` text,
  `videosDescription` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`videosId`, `locationId`, `videosUrl`, `videosDescription`) VALUES
(1, 1, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'youtube Videos'),
(2, 1, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'Vimeo Videos'),
(3, 2, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'youtube Videos'),
(4, 2, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'Vimeo Videos'),
(25, 7, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'youtube Videos'),
(26, 7, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'Vimeo Videos'),
(37, 9, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'youtube Videos'),
(38, 9, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'Vimeo Videos'),
(45, 10, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'youtube Videos'),
(46, 10, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'Vimeo Videos'),
(49, 8, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'youtube Videos'),
(50, 8, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'Vimeo Videos');

-- --------------------------------------------------------

--
-- Table structure for table `wednesday`
--

CREATE TABLE `wednesday` (
  `wednesdayId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `starts` varchar(20) DEFAULT NULL,
  `ends` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wednesday`
--

INSERT INTO `wednesday` (`wednesdayId`, `locationId`, `starts`, `ends`) VALUES
(5, 2, '08:00:00', '08:00:00'),
(6, 2, '08:00:00', '08:00:00'),
(37, 7, '10:00:00', '13:30:00'),
(38, 7, '14:30:00', '17:00:00'),
(39, 7, '17:30:00', '19:20:00'),
(55, 9, '10:00:00', '13:30:00'),
(56, 9, '14:30:00', '17:00:00'),
(57, 9, '17:30:00', '19:20:00'),
(67, 10, '10:00:00', '13:30:00'),
(68, 10, '14:30:00', '17:00:00'),
(69, 10, '17:30:00', '19:20:00'),
(73, 8, '10:00:00', '13:30:00'),
(74, 8, '14:30:00', '17:00:00'),
(75, 8, '17:30:00', '19:20:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `associations`
--
ALTER TABLE `associations`
  ADD PRIMARY KEY (`associationsId`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brandsId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoriesId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`emailsId`);

--
-- Indexes for table `friday`
--
ALTER TABLE `friday`
  ADD PRIMARY KEY (`fridayId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imagesId`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`keywordsId`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`languagesId`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`listsId`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`locationId`);

--
-- Indexes for table `monday`
--
ALTER TABLE `monday`
  ADD PRIMARY KEY (`mondayId`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`phoneId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productsId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`);

--
-- Indexes for table `saturday`
--
ALTER TABLE `saturday`
  ADD PRIMARY KEY (`saturdayId`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`servicesId`);

--
-- Indexes for table `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`specialitiesId`);

--
-- Indexes for table `sunday`
--
ALTER TABLE `sunday`
  ADD PRIMARY KEY (`sundayId`);

--
-- Indexes for table `thursday`
--
ALTER TABLE `thursday`
  ADD PRIMARY KEY (`thursdayId`);

--
-- Indexes for table `tuesday`
--
ALTER TABLE `tuesday`
  ADD PRIMARY KEY (`tuesdayId`);

--
-- Indexes for table `urls`
--
ALTER TABLE `urls`
  ADD PRIMARY KEY (`urlsId`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`videosId`);

--
-- Indexes for table `wednesday`
--
ALTER TABLE `wednesday`
  ADD PRIMARY KEY (`wednesdayId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `associations`
--
ALTER TABLE `associations`
  MODIFY `associationsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brandsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoriesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `emailsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `friday`
--
ALTER TABLE `friday`
  MODIFY `fridayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imagesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `keywordsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `languagesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `listsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `locationId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `monday`
--
ALTER TABLE `monday`
  MODIFY `mondayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `phoneId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `saturday`
--
ALTER TABLE `saturday`
  MODIFY `saturdayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `servicesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `specialities`
--
ALTER TABLE `specialities`
  MODIFY `specialitiesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `sunday`
--
ALTER TABLE `sunday`
  MODIFY `sundayId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thursday`
--
ALTER TABLE `thursday`
  MODIFY `thursdayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tuesday`
--
ALTER TABLE `tuesday`
  MODIFY `tuesdayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `urls`
--
ALTER TABLE `urls`
  MODIFY `urlsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `videosId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `wednesday`
--
ALTER TABLE `wednesday`
  MODIFY `wednesdayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
