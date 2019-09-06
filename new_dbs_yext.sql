-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2019 at 10:39 AM
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
-- Database: `new_dbs_yext`
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
(1, 'admin', 'user_admin', 'c20d2f456c2afc4309766fdce01637c0', 'inder.velocityconsultancy@gmail.com', 'd7f8718865e13786539c136793115cd08c3bb1e5056d3eb912e001df6d2873ce1303238143e133df6077f41805aaa8028c7a');

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
(42, 9, 'BBA Accrediated'),
(43, 9, 'Upwork');

-- --------------------------------------------------------

--
-- Table structure for table `bio_items`
--

CREATE TABLE `bio_items` (
  `bioItemsId` int(10) NOT NULL,
  `sectionId` int(10) NOT NULL,
  `bioItemsName` varchar(100) DEFAULT NULL,
  `bioItemsTitle` varchar(100) DEFAULT NULL,
  `bioItemsDescription` text,
  `bioItemsUrl` text,
  `bioItemsPhotoUrl` text,
  `bioItemsPhotoHeight` int(100) NOT NULL DEFAULT '0',
  `bioItemsPhotoWidth` int(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bio_items`
--

INSERT INTO `bio_items` (`bioItemsId`, `sectionId`, `bioItemsName`, `bioItemsTitle`, `bioItemsDescription`, `bioItemsUrl`, `bioItemsPhotoUrl`, `bioItemsPhotoHeight`, `bioItemsPhotoWidth`) VALUES
(1, 2, 'Dr. Allan', 'Dr. Allan Sicignano Title', 'Dr. Allan Sicignano is at the forefront of modern chiropractor techniques', 'http://www.superchiro.com', 'http://www.yext-static.com/cms/dr-allan-sicignano.jpg', 250, 250);

-- --------------------------------------------------------

--
-- Table structure for table `bio_items_certification`
--

CREATE TABLE `bio_items_certification` (
  `bioItemsCertificationId` int(10) NOT NULL,
  `sectionId` int(10) NOT NULL,
  `bioItemsId` int(10) NOT NULL,
  `bioItemsCertificationName` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bio_items_certification`
--

INSERT INTO `bio_items_certification` (`bioItemsCertificationId`, `sectionId`, `bioItemsId`, `bioItemsCertificationName`) VALUES
(1, 2, 1, 'Chiropractory United'),
(2, 2, 1, 'Verified Provider');

-- --------------------------------------------------------

--
-- Table structure for table `bio_items_education`
--

CREATE TABLE `bio_items_education` (
  `bioItemsEducationId` int(10) NOT NULL,
  `sectionId` int(10) NOT NULL,
  `bioItemsId` int(10) NOT NULL,
  `bioItemsEducationName` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bio_items_education`
--

INSERT INTO `bio_items_education` (`bioItemsEducationId`, `sectionId`, `bioItemsId`, `bioItemsEducationName`) VALUES
(1, 2, 1, 'Bachelor of Science, Cambridge University'),
(2, 2, 1, 'USD Medical School');

-- --------------------------------------------------------

--
-- Table structure for table `bio_items_service`
--

CREATE TABLE `bio_items_service` (
  `bioItemsServiceId` int(10) NOT NULL,
  `sectionId` int(10) NOT NULL,
  `bioItemsId` int(10) NOT NULL,
  `bioItemsServiceName` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bio_items_service`
--

INSERT INTO `bio_items_service` (`bioItemsServiceId`, `sectionId`, `bioItemsId`, `bioItemsServiceName`) VALUES
(1, 2, 1, 'Spinal Decompression'),
(2, 2, 1, 'Genetics Disorders');

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
(37, 9, 'Divi Theme'),
(38, 9, 'Wordpress');

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
(37, 21, 9, 'Web Development', 'web-development'),
(38, 22, 9, 'Web Designing', 'web-designing'),
(107, 61, 22, 'Office Supply Store', 'office-supply-store'),
(108, 766, 22, 'Writing Services', 'writing-services'),
(109, 2310, 22, 'School Supply Store', 'school-supply-store');

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
(53, 9, 'velocity.consult@gmail.com', 'Gmails email'),
(54, 9, 'info@velocityconsultancy.com', 'Owners emails'),
(55, 9, 'developers@velocityconsultancy.com', 'Employees emails'),
(93, 22, 'pencils@parking.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `events_items`
--

CREATE TABLE `events_items` (
  `eventsItemsId` int(10) NOT NULL,
  `sectionId` int(10) NOT NULL,
  `eventsItemsName` varchar(100) DEFAULT NULL,
  `eventsItemsType` varchar(200) DEFAULT NULL,
  `eventItemsStarts` varchar(20) DEFAULT NULL,
  `eventItemsEnds` varchar(20) DEFAULT NULL,
  `eventItemsDescription` text,
  `eventItemsVideo` text NOT NULL,
  `eventItemsUrl` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events_items`
--

INSERT INTO `events_items` (`eventsItemsId`, `sectionId`, `eventsItemsName`, `eventsItemsType`, `eventItemsStarts`, `eventItemsEnds`, `eventItemsDescription`, `eventItemsVideo`, `eventItemsUrl`) VALUES
(10, 19, 'Gaelic Storm', 'Concert', '2012-08-23T20:00-05', '2012-08-24T00:00-05', '$20 tickets.  Doors at 8pm, show at 9pm.', 'http://www.youtube.com/watch?v=jtCEvGxZVIM', 'http://www.boweryballroom.com/event/125975'),
(12, 21, 'Gaelic Storm', 'Concert', '2012-08-23T20:00-05', '2012-08-24T00:00-05', '$20 tickets.  Doors at 8pm, show at 9pm.', 'http://www.youtube.com/watch?v=jtCEvGxZVIM', 'http://www.boweryballroom.com/event/125975');

-- --------------------------------------------------------

--
-- Table structure for table `events_items_photos`
--

CREATE TABLE `events_items_photos` (
  `eventsItemsPhotosId` int(10) NOT NULL,
  `sectionId` int(10) NOT NULL,
  `eventsItemsId` int(10) NOT NULL,
  `eventsItemsPhotoUrl` text,
  `eventsItemsPhotoHeight` int(100) NOT NULL DEFAULT '0',
  `eventsItemsPhotoWidth` int(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events_items_photos`
--

INSERT INTO `events_items_photos` (`eventsItemsPhotosId`, `sectionId`, `eventsItemsId`, `eventsItemsPhotoUrl`, `eventsItemsPhotoHeight`, `eventsItemsPhotoWidth`) VALUES
(17, 21, 12, 'http://www.yext-static.com/cms/detail-sander.jpg', 250, 250),
(18, 21, 12, 'http://www.yext-static.com/cms/detail-sander2.jpg', 250, 250);

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
(55, 9, '10:00:00', '13:30:00'),
(56, 9, '14:30:00', '17:00:00'),
(57, 9, '17:30:00', '19:20:00'),
(91, 22, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imagesId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `width` int(10) DEFAULT '0',
  `imagesType` varchar(10) DEFAULT NULL,
  `imagesUrl` text,
  `height` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imagesId`, `locationId`, `width`, `imagesType`, `imagesUrl`, `height`) VALUES
(73, 9, 100, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/100x100.jpg', 100),
(74, 9, 284, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/284x100.jpg', 100),
(75, 9, 50, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/50x40.jpg', 40),
(76, 9, 200, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/200x150.jpg', 150),
(151, 22, 259, 'LOGO', 'http://a.mktgcdn.com/p/tuothFN_xWJRCPbya6TcXjlvIRI43C0rZpEgBbXm5xU/1.0000/259x259.jpg', 259),
(152, 22, 432, 'GALLERY', 'http://a.mktgcdn.com/p/J_dWbgHK-zjfkPfhzTY4g5VWcGQTTV9yzFLOEYR2IZQ/432x324.jpg', 324),
(153, 22, 259, 'GALLERY', 'http://a.mktgcdn.com/p/tuothFN_xWJRCPbya6TcXjlvIRI43C0rZpEgBbXm5xU/259x194.jpg', 194);

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
(85, 9, 'Web Development'),
(86, 9, 'SEO'),
(87, 9, 'Graphics'),
(88, 9, 'API'),
(89, 9, 'Web Design');

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
(61, 9, 'English'),
(62, 9, 'Hindi Updated');

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
(1, 9, 'Services We Offer', 'Products and Services', 'MENUS'),
(2, 9, 'See My Products', 'Products and Services', 'PRODUCTS'),
(3, 9, 'Services We Offer', 'Products and Services', 'BIOS'),
(8, 22, 'Catering Services', 'Products and Services', 'PRODUCTS'),
(9, 22, 'Brunch Menu', 'Menu', 'MENU'),
(10, 22, 'Nail Care3', 'Products and Services', 'PRODUCTS');

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
  `attributionImageWidth` int(10) NOT NULL DEFAULT '0',
  `attributionImageDescription` text,
  `attributionImageUrl` text,
  `attributionImageHeight` int(10) NOT NULL DEFAULT '0',
  `attributionUrl` text,
  `closed` varchar(10) DEFAULT NULL,
  `yearEstablished` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`locationId`, `yextID`, `status`, `name`, `address`, `visible`, `address2`, `city`, `displayAddress`, `countryCode`, `postalCode`, `state`, `description`, `displayLatitude`, `displayLongitude`, `routableLatitude`, `routableLongitude`, `hoursDisplayText`, `specialOfferMessage`, `specialOfferUrl`, `paymentOptions`, `twitterHandle`, `facebookPageUrl`, `attributionImageWidth`, `attributionImageDescription`, `attributionImageUrl`, `attributionImageHeight`, `attributionUrl`, `closed`, `yearEstablished`) VALUES
(9, 123456, 'SUPPRESSED', 'Velocity Consultancy', 'Sej Plaza', 'true', 'Ground Floor', 'Mumbai', 'G-4 Sej Plaza, Near Nutun School', 'IN', '400097', 'MH', 'Mumbai\'s number One Web development firm', '29.70468', '-95.41429', '29.70468', '-95.41429', 'Monday-Friday 10am-7pm, Saturaday 10am-2ox Sunday Closed', 'Sign up to receive our deals!', 'https://kits-kitchen.movylo.com/index.php?pag=get_deals', '', 'velocityConsultancy', 'https://www.facebook.com/velocityconsultancy/', 143, 'Yext PowerListings', 'http://www.yextstatic.com/cms/pl-synced/pl-synced.png', 20, 'http://www.yext.com/', 'false', 2008),
(22, 5235128, 'ACTIVE', 'Pen and Marker Store', '508 S 8th St', '1', '', 'Salina', 'at a mall', 'US', '67401', 'KS', 'We specialize in providing high quality pens and pencils. AND MARKERS', '38.831946', '-97.611913', '38.83193222424', '-97.6114905387', 'M-W 9am-5pm, Th 9am-12pm, 4pm-8pm, F 9am-5pm, Sa Closed, Su 24hr (Hours vary)', 'Call today!', '', NULL, 'crosspens', 'https://www.facebook.com/pages/Pen-and-Pencil-Store/1860256840717119', 143, 'Yext', 'http://www.yextstatic.com/cms/pl-synced/pl-synced.png', 20, '', '', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `menuItemsId` int(11) NOT NULL,
  `sectionId` int(11) NOT NULL,
  `menuItemsName` varchar(100) DEFAULT NULL,
  `menuItemsDescription` text,
  `menuItemsPhotoUrl` text,
  `menuItemsPhotoHeight` int(10) NOT NULL DEFAULT '0',
  `menuItemsPhotoWidth` int(10) NOT NULL DEFAULT '0',
  `menuItemsCaloriesType` varchar(50) DEFAULT NULL,
  `menuItemsCalories` int(10) NOT NULL DEFAULT '0',
  `menuItemsRangeTo` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`menuItemsId`, `sectionId`, `menuItemsName`, `menuItemsDescription`, `menuItemsPhotoUrl`, `menuItemsPhotoHeight`, `menuItemsPhotoWidth`, `menuItemsCaloriesType`, `menuItemsCalories`, `menuItemsRangeTo`) VALUES
(8, 17, 'Chocolate Croissant', 'A tantalizing treat', 'http://www.yext-static.com/cms/chocolate-croissant.jpg', 250, 250, 'RANGE', 300, 350);

-- --------------------------------------------------------

--
-- Table structure for table `menu_items_cost`
--

CREATE TABLE `menu_items_cost` (
  `menuItemsCostId` int(10) NOT NULL,
  `sectionId` int(10) NOT NULL,
  `menuItemsId` int(10) NOT NULL,
  `menuItemsCostType` varchar(50) DEFAULT NULL,
  `menuItemsCostPrice` varchar(50) DEFAULT NULL,
  `menuItemsCostUnit` varchar(50) DEFAULT NULL,
  `menuItemsCostRangeTo` varchar(50) DEFAULT NULL,
  `menuItemsCostOther` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_items_cost`
--

INSERT INTO `menu_items_cost` (`menuItemsCostId`, `sectionId`, `menuItemsId`, `menuItemsCostType`, `menuItemsCostPrice`, `menuItemsCostUnit`, `menuItemsCostRangeTo`, `menuItemsCostOther`) VALUES
(8, 17, 8, 'RANGE', '9.50', 'Per Sandwich', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items_cost_options`
--

CREATE TABLE `menu_items_cost_options` (
  `menuItemsCostOptionsId` int(10) NOT NULL,
  `sectionId` int(10) NOT NULL,
  `menuItemsCostId` int(10) NOT NULL,
  `costOptionName` varchar(100) DEFAULT NULL,
  `costOptionPrice` varchar(10) DEFAULT NULL,
  `costOptionCalorie` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_items_cost_options`
--

INSERT INTO `menu_items_cost_options` (`menuItemsCostOptionsId`, `sectionId`, `menuItemsCostId`, `costOptionName`, `costOptionPrice`, `costOptionCalorie`) VALUES
(3, 10, 6, 'Bacon', '1.00', 150),
(5, 17, 8, 'Bacon', '1.00', 150);

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
(51, 9, '10:00:00', '13:30:00'),
(52, 9, '14:30:00', '17:00:00'),
(53, 22, '17:30:00', '19:20:00'),
(87, 22, '17:30:00', '19:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `paymentoptions`
--

CREATE TABLE `paymentoptions` (
  `paymentOptionId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `paymentOptionsName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentoptions`
--

INSERT INTO `paymentoptions` (`paymentOptionId`, `locationId`, `paymentOptionsName`) VALUES
(17, 9, 'Discover'),
(18, 9, 'Direct Debit'),
(23, 22, 'Traveler\'s Check'),
(24, 22, 'Visa Electron');

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
(71, 9, '022-12345678', '+91', 'Office', 'Office'),
(72, 9, '022-12345679', '+91', 'Office2', 'Office2'),
(73, 9, '1234567890', '+91', 'Alt', 'Alt'),
(143, 22, '7329319999', '1', 'Main', 'Main'),
(144, 22, '7329319988', '1', 'Alt', 'Alt');

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
(37, 9, 'Product One'),
(38, 9, 'Product Two'),
(53, 22, 'BBQ'),
(54, 22, 'Barbecue'),
(55, 22, 'Grilling');

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
(23, 9, '10:00:00', '14:00:00'),
(30, 22, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `sectionId` int(10) NOT NULL,
  `listsId` int(10) NOT NULL,
  `sectionName` varchar(50) NOT NULL,
  `sectionDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`sectionId`, `listsId`, `sectionName`, `sectionDescription`) VALUES
(17, 1, 'Entree', 'Made fresh daily Entree.'),
(18, 2, 'Craftsman', 'Craftsman Antiques'),
(21, 4, 'Concerts', 'Long Description of concert type');

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
(47, 9, 'Fully Opimized Wesbite Once'),
(59, 22, 'Home cooked food all the time');

-- --------------------------------------------------------

--
-- Table structure for table `service_items`
--

CREATE TABLE `service_items` (
  `serviceItemsId` int(10) NOT NULL,
  `sectionId` int(10) NOT NULL,
  `serviceItemsName` varchar(100) DEFAULT NULL,
  `serviceItemsDescription` text NOT NULL,
  `serviceItemsVideoUrl` text NOT NULL,
  `serviceItemsUrl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_items`
--

INSERT INTO `service_items` (`serviceItemsId`, `sectionId`, `serviceItemsName`, `serviceItemsDescription`, `serviceItemsVideoUrl`, `serviceItemsUrl`) VALUES
(4, 9, 'Black &amp; Decker MOUSE Detail Sander with Dust Collection', 'Description of the product or service (long form)', 'http://www.youtube.com/watch?v=cGW0XKYeM6o', 'http://www.kmart.com/deal-of-the-day/dap-120000000279845'),
(5, 18, 'Black &amp; Decker MOUSE Detail Sander with Dust Collection', 'Description of the product or service (long form)', 'http://www.youtube.com/watch?v=cGW0XKYeM6o', 'http://www.kmart.com/deal-of-the-day/dap-120000000279845');

-- --------------------------------------------------------

--
-- Table structure for table `service_items_cost`
--

CREATE TABLE `service_items_cost` (
  `serviceItemsCostId` int(10) NOT NULL,
  `sectionId` int(10) NOT NULL,
  `serviceItemsId` int(10) NOT NULL,
  `serviceItemsCostType` varchar(50) DEFAULT NULL,
  `serviceItemsCostPrice` varchar(50) DEFAULT NULL,
  `serviceItemsCostUnit` varchar(50) DEFAULT NULL,
  `serviceItemsCostRangeTo` varchar(50) DEFAULT NULL,
  `serviceItemsCostOther` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_items_cost`
--

INSERT INTO `service_items_cost` (`serviceItemsCostId`, `sectionId`, `serviceItemsId`, `serviceItemsCostType`, `serviceItemsCostPrice`, `serviceItemsCostUnit`, `serviceItemsCostRangeTo`, `serviceItemsCostOther`) VALUES
(4, 9, 4, 'PRICE', '9.50', 'One Antique', '', ''),
(5, 18, 5, 'PRICE', '9.50', 'One Antique', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `service_items_cost_options`
--

CREATE TABLE `service_items_cost_options` (
  `serviceItemsCostOptionsId` int(10) NOT NULL,
  `sectionId` int(10) NOT NULL,
  `serviceItemsCostId` int(10) NOT NULL,
  `costOptionName` varchar(100) DEFAULT NULL,
  `costOptionPrice` varchar(10) DEFAULT NULL,
  `costOptionCalorie` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_items_cost_options`
--

INSERT INTO `service_items_cost_options` (`serviceItemsCostOptionsId`, `sectionId`, `serviceItemsCostId`, `costOptionName`, `costOptionPrice`, `costOptionCalorie`) VALUES
(5, 9, 4, 'Bacon', '1.00', 150),
(6, 18, 5, 'Bacon', '1.00', 150);

-- --------------------------------------------------------

--
-- Table structure for table `service_items_photos`
--

CREATE TABLE `service_items_photos` (
  `serviceItemsPhotosId` int(10) NOT NULL,
  `sectionId` int(10) NOT NULL,
  `serviceItemsId` int(10) NOT NULL,
  `serviceItemsPhotoUrl` text,
  `serviceItemsPhotoHeight` int(100) NOT NULL DEFAULT '0',
  `serviceItemsPhotoWidth` int(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_items_photos`
--

INSERT INTO `service_items_photos` (`serviceItemsPhotosId`, `sectionId`, `serviceItemsId`, `serviceItemsPhotoUrl`, `serviceItemsPhotoHeight`, `serviceItemsPhotoWidth`) VALUES
(3, 9, 4, 'http://www.yext-static.com/cms/detail-sander.jpg', 250, 250),
(4, 9, 4, 'http://www.yext-static.com/cms/detail-sander2.jpg', 250, 250),
(5, 18, 5, 'http://www.yext-static.com/cms/detail-sander.jpg', 250, 250),
(6, 18, 5, 'http://www.yext-static.com/cms/detail-sander2.jpg', 250, 250);

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
(132, 9, 'PHP'),
(133, 9, 'NodeJS'),
(134, 9, 'Express'),
(135, 9, 'MongoDB'),
(136, 9, 'HTML'),
(137, 9, 'CSS'),
(138, 9, 'Javascript'),
(139, 9, 'Angular'),
(204, 22, 'PHP'),
(205, 22, 'NodeJS'),
(206, 22, 'Express'),
(207, 22, 'MongoDB'),
(208, 22, 'HTML'),
(209, 22, 'CSS'),
(210, 22, 'Javascript'),
(211, 22, 'Angular');

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

--
-- Dumping data for table `sunday`
--

INSERT INTO `sunday` (`sundayId`, `locationId`, `starts`, `ends`) VALUES
(1, 9, '', ''),
(15, 22, '', '');

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
(55, 9, '10:00:00', '13:30:00'),
(56, 9, '14:30:00', '17:00:00'),
(57, 9, '17:30:00', '19:20:00'),
(101, 22, '', ''),
(102, 22, '', '');

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
(53, 9, '10:00:00', '13:30:00'),
(54, 9, '14:30:00', '17:00:00'),
(55, 9, '17:30:00', '19:20:00'),
(91, 22, '', '');

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
(73, 9, 'http://www.stevenhightower.net/kk/menu.html', 'menu', 'MENU', 'http://www.stevenhightower.net/kk/menu.html'),
(74, 9, 'https://app.agendize.com/book/19171870', 'reservation', 'RESERVATION', 'ttps://app.agendize.com/book/19171870'),
(75, 9, 'http://www.kits-kitchen.com', 'website', 'WEBSITE', 'http://www.kits-kitchen.com'),
(76, 9, 'http://www.kits-kitchen.com', 'order', 'ORDER', 'http://www.kits-kitchen.com'),
(130, 22, 'http://www.stevenhightower.net/kk/menu.html', 'menu', 'MENU', 'http://www.stevenhightower.net/kk/menu.html');

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
(37, 9, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'youtube Videos'),
(38, 9, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'Vimeo Videos'),
(67, 22, 'http://www.youtube.com/watch?v=H_OXoxymeho', 'The highest quality'),
(68, 22, 'http://www.youtube.com/watch?v=H_OXoxymeho', 'The highest quality'),
(69, 22, 'http://www.youtube.com/watch?v=H_OXoxymeho', 'The highest quality');

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
(5, 22, '08:00:00', '08:00:00'),
(6, 22, '08:00:00', '08:00:00'),
(37, 22, '10:00:00', '13:30:00'),
(38, 22, '14:30:00', '17:00:00'),
(55, 9, '10:00:00', '13:30:00'),
(56, 9, '14:30:00', '17:00:00'),
(57, 9, '17:30:00', '19:20:00');

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
-- Indexes for table `bio_items`
--
ALTER TABLE `bio_items`
  ADD PRIMARY KEY (`bioItemsId`);

--
-- Indexes for table `bio_items_certification`
--
ALTER TABLE `bio_items_certification`
  ADD PRIMARY KEY (`bioItemsCertificationId`);

--
-- Indexes for table `bio_items_education`
--
ALTER TABLE `bio_items_education`
  ADD PRIMARY KEY (`bioItemsEducationId`);

--
-- Indexes for table `bio_items_service`
--
ALTER TABLE `bio_items_service`
  ADD PRIMARY KEY (`bioItemsServiceId`);

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
-- Indexes for table `events_items`
--
ALTER TABLE `events_items`
  ADD PRIMARY KEY (`eventsItemsId`);

--
-- Indexes for table `events_items_photos`
--
ALTER TABLE `events_items_photos`
  ADD PRIMARY KEY (`eventsItemsPhotosId`);

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
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`menuItemsId`);

--
-- Indexes for table `menu_items_cost`
--
ALTER TABLE `menu_items_cost`
  ADD PRIMARY KEY (`menuItemsCostId`);

--
-- Indexes for table `menu_items_cost_options`
--
ALTER TABLE `menu_items_cost_options`
  ADD PRIMARY KEY (`menuItemsCostOptionsId`);

--
-- Indexes for table `monday`
--
ALTER TABLE `monday`
  ADD PRIMARY KEY (`mondayId`);

--
-- Indexes for table `paymentoptions`
--
ALTER TABLE `paymentoptions`
  ADD PRIMARY KEY (`paymentOptionId`);

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
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`sectionId`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`servicesId`);

--
-- Indexes for table `service_items`
--
ALTER TABLE `service_items`
  ADD PRIMARY KEY (`serviceItemsId`);

--
-- Indexes for table `service_items_cost`
--
ALTER TABLE `service_items_cost`
  ADD PRIMARY KEY (`serviceItemsCostId`);

--
-- Indexes for table `service_items_cost_options`
--
ALTER TABLE `service_items_cost_options`
  ADD PRIMARY KEY (`serviceItemsCostOptionsId`);

--
-- Indexes for table `service_items_photos`
--
ALTER TABLE `service_items_photos`
  ADD PRIMARY KEY (`serviceItemsPhotosId`);

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
  MODIFY `associationsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `bio_items`
--
ALTER TABLE `bio_items`
  MODIFY `bioItemsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bio_items_certification`
--
ALTER TABLE `bio_items_certification`
  MODIFY `bioItemsCertificationId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bio_items_education`
--
ALTER TABLE `bio_items_education`
  MODIFY `bioItemsEducationId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bio_items_service`
--
ALTER TABLE `bio_items_service`
  MODIFY `bioItemsServiceId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brandsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoriesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `emailsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `events_items`
--
ALTER TABLE `events_items`
  MODIFY `eventsItemsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `events_items_photos`
--
ALTER TABLE `events_items_photos`
  MODIFY `eventsItemsPhotosId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `friday`
--
ALTER TABLE `friday`
  MODIFY `fridayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imagesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `keywordsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `languagesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `listsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `locationId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `menuItemsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menu_items_cost`
--
ALTER TABLE `menu_items_cost`
  MODIFY `menuItemsCostId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menu_items_cost_options`
--
ALTER TABLE `menu_items_cost_options`
  MODIFY `menuItemsCostOptionsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `monday`
--
ALTER TABLE `monday`
  MODIFY `mondayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `paymentoptions`
--
ALTER TABLE `paymentoptions`
  MODIFY `paymentOptionId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `phoneId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `saturday`
--
ALTER TABLE `saturday`
  MODIFY `saturdayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `sectionId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `servicesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `service_items`
--
ALTER TABLE `service_items`
  MODIFY `serviceItemsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_items_cost`
--
ALTER TABLE `service_items_cost`
  MODIFY `serviceItemsCostId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_items_cost_options`
--
ALTER TABLE `service_items_cost_options`
  MODIFY `serviceItemsCostOptionsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_items_photos`
--
ALTER TABLE `service_items_photos`
  MODIFY `serviceItemsPhotosId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `specialities`
--
ALTER TABLE `specialities`
  MODIFY `specialitiesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `sunday`
--
ALTER TABLE `sunday`
  MODIFY `sundayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `thursday`
--
ALTER TABLE `thursday`
  MODIFY `thursdayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `tuesday`
--
ALTER TABLE `tuesday`
  MODIFY `tuesdayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `urls`
--
ALTER TABLE `urls`
  MODIFY `urlsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `videosId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `wednesday`
--
ALTER TABLE `wednesday`
  MODIFY `wednesdayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
