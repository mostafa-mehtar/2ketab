-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 13, 2012 at 05:02 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gilas2`
--

-- --------------------------------------------------------

--
-- Table structure for table `gl_acos`
--

DROP TABLE IF EXISTS `gl_acos`;
CREATE TABLE IF NOT EXISTS `gl_acos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=162 ;

--
-- Dumping data for table `gl_acos`
--

INSERT INTO `gl_acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 310),
(2, 1, NULL, NULL, 'Comments', 2, 23),
(3, 2, NULL, NULL, 'admin_index', 3, 4),
(5, 2, NULL, NULL, 'admin_view', 7, 8),
(6, 2, NULL, NULL, 'admin_publish_comment', 9, 10),
(7, 2, NULL, NULL, 'admin_unpublish_comment', 11, 12),
(8, 2, NULL, NULL, 'admin_delete', 13, 14),
(9, 2, NULL, NULL, 'admin_replyComment', 15, 16),
(10, 2, NULL, NULL, 'admin_editComment', 17, 18),
(11, 2, NULL, NULL, 'admin_dispatch', 19, 20),
(12, 1, NULL, NULL, 'ContactDetails', 24, 41),
(13, 12, NULL, NULL, 'admin_add', 25, 26),
(14, 12, NULL, NULL, 'admin_edit', 27, 28),
(15, 12, NULL, NULL, 'admin_delete', 29, 30),
(16, 12, NULL, NULL, 'admin_index', 31, 32),
(17, 12, NULL, NULL, 'admin_getLinkItem', 33, 34),
(19, 12, NULL, NULL, 'admin_dispatch', 37, 38),
(20, 1, NULL, NULL, 'ContentCategories', 42, 59),
(21, 20, NULL, NULL, 'admin_add', 43, 44),
(22, 20, NULL, NULL, 'admin_index', 45, 46),
(23, 20, NULL, NULL, 'admin_delete', 47, 48),
(24, 20, NULL, NULL, 'admin_edit', 49, 50),
(25, 20, NULL, NULL, 'admin_publish', 51, 52),
(26, 20, NULL, NULL, 'admin_unPublish', 53, 54),
(27, 20, NULL, NULL, 'admin_getLinkItem', 55, 56),
(28, 20, NULL, NULL, 'admin_dispatch', 57, 58),
(29, 1, NULL, NULL, 'Contents', 60, 115),
(30, 29, NULL, NULL, 'admin_index', 61, 62),
(31, 29, NULL, NULL, 'admin_add', 63, 64),
(32, 29, NULL, NULL, 'admin_delete', 65, 66),
(33, 29, NULL, NULL, 'admin_edit', 67, 68),
(34, 29, NULL, NULL, 'admin_move', 69, 70),
(35, 29, NULL, NULL, 'admin_publish', 71, 72),
(36, 29, NULL, NULL, 'admin_unPublish', 73, 74),
(37, 29, NULL, NULL, 'admin_addToFrontPage', 75, 76),
(38, 29, NULL, NULL, 'admin_removeFromFrontPage', 77, 78),
(39, 29, NULL, NULL, 'admin_allowComment', 79, 80),
(40, 29, NULL, NULL, 'admin_disallowComment', 81, 82),
(41, 29, NULL, NULL, 'admin_getLinkItem', 83, 84),
(48, 29, NULL, NULL, 'admin_dispatch', 97, 98),
(49, 1, NULL, NULL, 'Dashboards', 116, 121),
(50, 49, NULL, NULL, 'admin_index', 117, 118),
(51, 49, NULL, NULL, 'admin_dispatch', 119, 120),
(52, 1, NULL, NULL, 'GalleryCategories', 122, 143),
(53, 52, NULL, NULL, 'admin_index', 123, 124),
(54, 52, NULL, NULL, 'admin_add', 125, 126),
(55, 52, NULL, NULL, 'admin_edit', 127, 128),
(56, 52, NULL, NULL, 'admin_delete', 129, 130),
(57, 52, NULL, NULL, 'admin_publish', 131, 132),
(58, 52, NULL, NULL, 'admin_unPublish', 133, 134),
(59, 52, NULL, NULL, 'admin_getLinkItem', 135, 136),
(61, 52, NULL, NULL, 'admin_dispatch', 139, 140),
(62, 1, NULL, NULL, 'GalleryItems', 144, 171),
(63, 62, NULL, NULL, 'admin_index', 145, 146),
(64, 62, NULL, NULL, 'admin_add', 147, 148),
(65, 62, NULL, NULL, 'admin_edit', 149, 150),
(66, 62, NULL, NULL, 'admin_delete', 151, 152),
(67, 62, NULL, NULL, 'admin_unPublish', 153, 154),
(68, 62, NULL, NULL, 'admin_publish', 155, 156),
(71, 62, NULL, NULL, 'admin_move', 161, 162),
(72, 62, NULL, NULL, 'admin_getLinkItem', 163, 164),
(73, 62, NULL, NULL, 'admin_dispatch', 165, 166),
(74, 1, NULL, NULL, 'MenuTypes', 172, 185),
(75, 74, NULL, NULL, 'admin_index', 173, 174),
(76, 74, NULL, NULL, 'admin_add', 175, 176),
(77, 74, NULL, NULL, 'admin_edit', 177, 178),
(78, 74, NULL, NULL, 'admin_getTypes', 179, 180),
(79, 74, NULL, NULL, 'admin_delete', 181, 182),
(80, 74, NULL, NULL, 'admin_dispatch', 183, 184),
(81, 1, NULL, NULL, 'Menus', 186, 207),
(82, 81, NULL, NULL, 'admin_index', 187, 188),
(83, 81, NULL, NULL, 'admin_add', 189, 190),
(84, 81, NULL, NULL, 'admin_edit', 191, 192),
(85, 81, NULL, NULL, 'admin_delete', 193, 194),
(86, 81, NULL, NULL, 'admin_move', 195, 196),
(87, 81, NULL, NULL, 'admin_publish', 197, 198),
(88, 81, NULL, NULL, 'admin_unPublish', 199, 200),
(90, 81, NULL, NULL, 'admin_dispatch', 203, 204),
(91, 1, NULL, NULL, 'Pages', 208, 215),
(93, 91, NULL, NULL, 'admin_dispatch', 211, 212),
(94, 1, NULL, NULL, 'Settings', 216, 225),
(95, 94, NULL, NULL, 'admin_index', 217, 218),
(97, 94, NULL, NULL, 'admin_dispatch', 221, 222),
(98, 1, NULL, NULL, 'SliderItems', 226, 247),
(99, 98, NULL, NULL, 'admin_index', 227, 228),
(100, 98, NULL, NULL, 'admin_add', 229, 230),
(101, 98, NULL, NULL, 'admin_edit', 231, 232),
(102, 98, NULL, NULL, 'admin_delete', 233, 234),
(103, 98, NULL, NULL, 'admin_move', 235, 236),
(104, 98, NULL, NULL, 'admin_publish', 237, 238),
(105, 98, NULL, NULL, 'admin_unPublish', 239, 240),
(107, 98, NULL, NULL, 'admin_dispatch', 243, 244),
(108, 1, NULL, NULL, 'Users', 248, 261),
(109, 108, NULL, NULL, 'admin_login', 249, 250),
(110, 108, NULL, NULL, 'admin_logout', 251, 252),
(112, 108, NULL, NULL, 'admin_dispatch', 255, 256),
(113, 1, NULL, NULL, 'WeblinkCategories', 262, 275),
(114, 113, NULL, NULL, 'admin_index', 263, 264),
(115, 113, NULL, NULL, 'admin_add', 265, 266),
(116, 113, NULL, NULL, 'admin_edit', 267, 268),
(117, 113, NULL, NULL, 'admin_delete', 269, 270),
(118, 113, NULL, NULL, 'admin_getLinkItem', 271, 272),
(119, 113, NULL, NULL, 'admin_dispatch', 273, 274),
(120, 1, NULL, NULL, 'Weblinks', 276, 295),
(121, 120, NULL, NULL, 'admin_index', 277, 278),
(122, 120, NULL, NULL, 'admin_add', 279, 280),
(123, 120, NULL, NULL, 'admin_edit', 281, 282),
(124, 120, NULL, NULL, 'admin_delete', 283, 284),
(125, 120, NULL, NULL, 'admin_publish', 285, 286),
(126, 120, NULL, NULL, 'admin_unPublish', 287, 288),
(128, 120, NULL, NULL, 'admin_dispatch', 291, 292),
(135, 1, NULL, NULL, 'TinyMCE', 296, 297),
(136, 1, NULL, NULL, 'UploadPack', 298, 299),
(137, 1, NULL, NULL, 'AclPermissions', 300, 309),
(138, 137, NULL, NULL, 'admin_index', 301, 302),
(139, 137, NULL, NULL, 'admin_editPermission', 303, 304),
(140, 137, NULL, NULL, 'admin_sync', 305, 306),
(141, 137, NULL, NULL, 'admin_dispatch', 307, 308),
(161, 29, NULL, NULL, 'index', 113, 114);

-- --------------------------------------------------------

--
-- Table structure for table `gl_aros`
--

DROP TABLE IF EXISTS `gl_aros`;
CREATE TABLE IF NOT EXISTS `gl_aros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gl_aros`
--

INSERT INTO `gl_aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'Roles', 1, 4),
(2, 1, 'Role', 1, 'Admin', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `gl_aros_acos`
--

DROP TABLE IF EXISTS `gl_aros_acos`;
CREATE TABLE IF NOT EXISTS `gl_aros_acos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aro_id` int(11) DEFAULT NULL,
  `aco_id` int(11) DEFAULT NULL,
  `_create` varchar(2) COLLATE utf8_persian_ci DEFAULT NULL,
  `_read` varchar(2) COLLATE utf8_persian_ci DEFAULT NULL,
  `_update` varchar(2) COLLATE utf8_persian_ci DEFAULT NULL,
  `_delete` varchar(2) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aco_id` (`aco_id`),
  KEY `aro_id` (`aro_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=99 ;

--
-- Dumping data for table `gl_aros_acos`
--

INSERT INTO `gl_aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 2, 3, '1', '1', '1', '1'),
(2, 2, 50, '1', '1', '1', '1'),
(3, 2, 138, '1', '1', '1', '1'),
(4, 2, 78, '1', '1', '1', '1'),
(5, 2, 30, '1', '1', '1', '1'),
(6, 2, 110, '1', '1', '1', '1'),
(7, 2, 109, '1', '1', '1', '1'),
(8, 2, 140, '1', '1', '1', '1'),
(9, 2, 139, '1', '1', '1', '1'),
(10, 2, 141, '1', '1', '1', '1'),
(11, 2, 53, '1', '1', '1', '1'),
(12, 2, 54, '1', '1', '1', '1'),
(13, 2, 55, '1', '1', '1', '1'),
(14, 2, 14, '1', '1', '1', '1'),
(15, 2, 16, '1', '1', '1', '1'),
(16, 2, 11, '1', '1', '1', '1'),
(17, 2, 19, '1', '1', '1', '1'),
(18, 2, 28, '1', '1', '1', '1'),
(19, 2, 10, '1', '1', '1', '1'),
(20, 2, 9, '1', '1', '1', '1'),
(21, 2, 8, '1', '1', '1', '1'),
(22, 2, 5, '1', '1', '1', '1'),
(23, 2, 6, '1', '1', '1', '1'),
(24, 2, 7, '1', '1', '1', '1'),
(25, 2, 13, '1', '1', '1', '1'),
(26, 2, 17, '1', '1', '1', '1'),
(27, 2, 31, '1', '1', '1', '1'),
(28, 2, 32, '1', '1', '1', '1'),
(29, 2, 34, '1', '1', '1', '1'),
(30, 2, 35, '1', '1', '1', '1'),
(31, 2, 36, '1', '1', '1', '1'),
(32, 2, 37, '1', '1', '1', '1'),
(33, 2, 38, '1', '1', '1', '1'),
(34, 2, 39, '1', '1', '1', '1'),
(35, 2, 40, '1', '1', '1', '1'),
(36, 2, 41, '1', '1', '1', '1'),
(37, 2, 48, '1', '1', '1', '1'),
(38, 2, 15, '1', '1', '1', '1'),
(39, 2, 21, '1', '1', '1', '1'),
(40, 2, 22, '1', '1', '1', '1'),
(41, 2, 23, '1', '1', '1', '1'),
(42, 2, 24, '1', '1', '1', '1'),
(43, 2, 25, '1', '1', '1', '1'),
(44, 2, 26, '1', '1', '1', '1'),
(45, 2, 27, '1', '1', '1', '1'),
(46, 2, 33, '1', '1', '1', '1'),
(47, 2, 121, '1', '1', '1', '1'),
(48, 2, 122, '1', '1', '1', '1'),
(49, 2, 123, '1', '1', '1', '1'),
(50, 2, 124, '1', '1', '1', '1'),
(51, 2, 125, '1', '1', '1', '1'),
(52, 2, 126, '1', '1', '1', '1'),
(53, 2, 128, '1', '1', '1', '1'),
(54, 2, 114, '1', '1', '1', '1'),
(55, 2, 115, '1', '1', '1', '1'),
(56, 2, 116, '1', '1', '1', '1'),
(57, 2, 117, '1', '1', '1', '1'),
(58, 2, 118, '1', '1', '1', '1'),
(59, 2, 119, '1', '1', '1', '1'),
(60, 2, 112, '1', '1', '1', '1'),
(61, 2, 99, '1', '1', '1', '1'),
(62, 2, 100, '1', '1', '1', '1'),
(63, 2, 101, '1', '1', '1', '1'),
(64, 2, 102, '1', '1', '1', '1'),
(65, 2, 103, '1', '1', '1', '1'),
(66, 2, 104, '1', '1', '1', '1'),
(67, 2, 105, '1', '1', '1', '1'),
(68, 2, 107, '1', '1', '1', '1'),
(69, 2, 95, '1', '1', '1', '1'),
(70, 2, 97, '1', '1', '1', '1'),
(71, 2, 82, '1', '1', '1', '1'),
(72, 2, 83, '1', '1', '1', '1'),
(73, 2, 84, '1', '1', '1', '1'),
(74, 2, 85, '1', '1', '1', '1'),
(75, 2, 86, '1', '1', '1', '1'),
(76, 2, 87, '1', '1', '1', '1'),
(77, 2, 88, '1', '1', '1', '1'),
(78, 2, 90, '1', '1', '1', '1'),
(79, 2, 75, '1', '1', '1', '1'),
(80, 2, 76, '1', '1', '1', '1'),
(81, 2, 77, '1', '1', '1', '1'),
(82, 2, 79, '1', '1', '1', '1'),
(83, 2, 80, '1', '1', '1', '1'),
(84, 2, 63, '1', '1', '1', '1'),
(85, 2, 64, '1', '1', '1', '1'),
(86, 2, 65, '1', '1', '1', '1'),
(87, 2, 66, '1', '1', '1', '1'),
(88, 2, 67, '1', '1', '1', '1'),
(89, 2, 68, '1', '1', '1', '1'),
(90, 2, 71, '1', '1', '1', '1'),
(91, 2, 72, '1', '1', '1', '1'),
(92, 2, 73, '1', '1', '1', '1'),
(93, 2, 56, '1', '1', '1', '1'),
(94, 2, 57, '1', '1', '1', '1'),
(95, 2, 58, '1', '1', '1', '1'),
(96, 2, 59, '1', '1', '1', '1'),
(97, 2, 61, '1', '1', '1', '1'),
(98, 2, 51, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `gl_comments`
--

DROP TABLE IF EXISTS `gl_comments`;
CREATE TABLE IF NOT EXISTS `gl_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT 'id of comment for replying from users for example administrator reply a comment which posted from Mohammad and it will be show in a quote tag in below the parent comment \r\n default is set to 0 for the main(parent) comments',
  `content_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'first name of user who add the comment this field is for guest users who haven''t user account in site',
  `email` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'user email address',
  `website` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'web site address',
  `content` text COLLATE utf8_persian_ci COMMENT 'comment body',
  `published` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'comment is published or not By default all comment is published => published = 1',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `content_id` (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gl_comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `gl_contact_details`
--

DROP TABLE IF EXISTS `gl_contact_details`;
CREATE TABLE IF NOT EXISTS `gl_contact_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'title of contact',
  `manager` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'manager name of company or web site',
  `telephone_1` varchar(11) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'company tel #1 example : 05118456628',
  `telephone_2` varchar(11) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'company tel #2 example : 05118456629',
  `fax` varchar(11) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'company fax number',
  `mobile` varchar(11) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'manger mobile number or company mobile number',
  `sms_center` varchar(14) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'company sms center for example : 3000662849',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gl_contact_details`
--

INSERT INTO `gl_contact_details` (`id`, `title`, `manager`, `telephone_1`, `telephone_2`, `fax`, `mobile`, `sms_center`) VALUES
(1, 'تماس با اتحادیه محصولات فرهنگی مشهد', 'اسکافی', '05118456628', '05118456629', '05118404006', '09158068518', '10000915');

-- --------------------------------------------------------

--
-- Table structure for table `gl_contents`
--

DROP TABLE IF EXISTS `gl_contents`;
CREATE TABLE IF NOT EXISTS `gl_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT 'the id of user from users table who post the content',
  `content_category_id` int(11) NOT NULL COMMENT 'id of content category',
  `title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `intro` text COLLATE utf8_persian_ci NOT NULL,
  `content` text COLLATE utf8_persian_ci,
  `allow_comment` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'determine users can adding comments to this post or not?',
  `published_comment` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'this field determine comment show after added by users or after published by administrator',
  `frontpage` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'status of content to show on the frontpage or not in the other pages By default all content is in other pages!',
  `published` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'status of content to be published or not By default all content is published',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_gl_contents_slug` (`slug`),
  KEY `content_category_id` (`content_category_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gl_contents`
--

INSERT INTO `gl_contents` (`id`, `user_id`, `content_category_id`, `title`, `slug`, `intro`, `content`, `allow_comment`, `published_comment`, `frontpage`, `published`, `created`, `modified`, `lft`, `rght`, `parent_id`) VALUES
(1, 1, 4, 'نتایج انتخابات هیئت رئیسه', 'نتایج_انتخابات_هیئت_رئیسه', '<p>با سلام خدمت اعضای محترم صنف عرضه کنندگان محصولات فرهنگی</p>\r\n<p>با عرض تشکر و امتنان زیاداز حضور تمامی عزیزانی که در انتخابات مرحله اول و دوم حضور فعال داشتند تعداد آرای کاندیداهای منتخب شما به اطلاع می رسانیم .</p>\r\n<p>1- آقای مرتضی اسکافی نوغانی با تعداد آراء 257&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; به عنوان رئیس اتحادیه محصولات فرهنگی</p>\r\n<p>&nbsp;2- آقای عباسعلی یعقوبی با تعداد آراء  132&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; به عنوان نائب رئیس اتحادیه</p>\r\n<p>3- خانم پریسا میر شاهی با تعدا آراء &nbsp;&nbsp; 154&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; به عنوان خزانه دار اتحادیه</p>\r\n<p>4- آقای مختار آدمیان با تعداد آراء &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 110&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; به عنوان دبیر اتحادیه</p>\r\n<p>5- آقای علی پور منافی با تعداد آراء &nbsp;&nbsp;&nbsp; 83&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; به عنوان بازرس اتحادیه</p>\r\n<p>مدت اعتبار این هیئت رئیسه به مدت 4 سال می باشد .</p>\r\n<p>اعضای علی البدل</p>\r\n<p>1- احسان نصر آبادی &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 68 رای</p>\r\n<p>2- علی بیسجردی&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 67 رای</p>', NULL, 0, 0, 1, 1, '1391-07-15 16:46:56', '1391-07-15 16:46:56', 1, 2, NULL),
(2, 1, 3, 'درباره', 'درباره', '<p>درباره اتحادیه محصولات فرهنگی مشهد درباره اتحادیه محصولات فرهنگی مشهددرباره اتحادیه محصولات فرهنگی مشهددرباره اتحادیه محصولات فرهنگی مشهددرباره اتحادیه محصولات فرهنگی مشهددرباره اتحادیه محصولات فرهنگی مشهددرباره اتحادیه محصولات فرهنگی مشهددرباره اتحادیه محصولات فرهنگی مشهددرباره اتحادیه محصولات فرهنگی مشهددرباره اتحادیه محصولات فرهنگی مشهددرباره اتحادیه محصولات فرهنگی مشهددرباره اتحادیه محصولات فرهنگی مشهددرباره اتحادیه محصولات فرهنگی مشهددرباره اتحادیه محصولات فرهنگی مشهددرباره اتحادیه محصولات فرهنگی مشهددرباره اتحادیه محصولات فرهنگی مشهددرباره اتحادیه محصولات فرهنگی مشهددرباره اتحادیه محصولات فرهنگی مشهددرباره اتحادیه محصولات فرهنگی مشهددرباره اتحادیه محصولات فرهنگی مشهددرباره اتحادیه محصولات فرهنگی مشهددرباره اتحادیه محصولات فرهنگی مشهددرباره اتحادیه محصولات فرهنگی مشهددرباره اتحادیه محصولات فرهنگی مشهددرباره اتحادیه محصولات فرهنگی مشهد درباره اتحادیه محصولات فرهنگی مشهد درباره اتحادیه محصولات فرهنگی مشهد</p>', NULL, 0, 0, 0, 1, '1391-07-15 17:21:02', '1391-07-15 17:21:02', 3, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gl_content_categories`
--

DROP TABLE IF EXISTS `gl_content_categories`;
CREATE TABLE IF NOT EXISTS `gl_content_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0' COMMENT 'parent id of a category default is 0 this mean the category is parent! ',
  `name` varchar(30) COLLATE utf8_persian_ci NOT NULL COMMENT 'name of category',
  `published` tinyint(4) NOT NULL DEFAULT '1',
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gl_content_categories`
--

INSERT INTO `gl_content_categories` (`id`, `parent_id`, `name`, `published`, `lft`, `rght`, `level`) VALUES
(1, NULL, 'اخبار', 1, 1, 2, 0),
(2, NULL, 'بخش نامه', 1, 3, 4, 0),
(3, NULL, 'مطالب', 1, 5, 6, 0),
(4, NULL, 'انتخابات', 1, 7, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gl_gallery_categories`
--

DROP TABLE IF EXISTS `gl_gallery_categories`;
CREATE TABLE IF NOT EXISTS `gl_gallery_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL COMMENT 'category parent id  By default all category added to the app is parent while the admin did ''nt  select a parent for its',
  `name` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `folder_name` varchar(50) COLLATE utf8_persian_ci NOT NULL COMMENT 'category folder name for inserting images! for example image category folder is stored to : app/webroot/images/gallery \r\n and category name is MyFreinds so the images which added to this category will stored into :  app/webroot/images/gallery/MyFreinds',
  `published` int(11) DEFAULT NULL,
  `lft` tinyint(4) NOT NULL,
  `rght` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gl_gallery_categories`
--

INSERT INTO `gl_gallery_categories` (`id`, `parent_id`, `name`, `folder_name`, `published`, `lft`, `rght`) VALUES
(1, NULL, 'سیاحت شرق', 'election', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `gl_gallery_items`
--

DROP TABLE IF EXISTS `gl_gallery_items`;
CREATE TABLE IF NOT EXISTS `gl_gallery_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT 'user id who added this image!',
  `gallery_category_id` int(11) NOT NULL,
  `title` varchar(30) COLLATE utf8_persian_ci NOT NULL COMMENT 'image title',
  `image_file_name` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'image name for accessing to it on gallery category folder',
  `description` text COLLATE utf8_persian_ci COMMENT 'image descriptions',
  `published` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'By default all images is published!',
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_category_id` (`gallery_category_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gl_gallery_items`
--

INSERT INTO `gl_gallery_items` (`id`, `user_id`, `gallery_category_id`, `title`, `image_file_name`, `description`, `published`, `lft`, `rght`, `parent_id`) VALUES
(1, 1, 1, 'کوه', 'Hamid_Picture.jpg', 'توضیحات برای تصویر فوق که در پایین تصویر با پس زمینه سیاه و رنگ سفید قرار می گیرد. این متن بین دو دگمه بعدی و قبلی قرار می گیرد. ', 1, 1, 2, 0),
(2, 1, 1, 'دسته گل', '2.jpg', '', 1, 5, 6, 0),
(3, 1, 1, 'دسته گل', '6.jpg', 'توضیحات برای تصویر فوق که در پایین تصویر با پس زمینه سیاه و رنگ سفید قرار می گیرد. این متن بین دو دگمه بعدی و قبلی قرار می گیرد. ', 1, 3, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gl_gilas_sessions`
--

DROP TABLE IF EXISTS `gl_gilas_sessions`;
CREATE TABLE IF NOT EXISTS `gl_gilas_sessions` (
  `id` varchar(255) NOT NULL DEFAULT '',
  `data` text,
  `expires` int(11) DEFAULT NULL,
  `ip` char(15) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gl_gilas_sessions`
--

INSERT INTO `gl_gilas_sessions` (`id`, `data`, `expires`, `ip`, `user_id`, `path`) VALUES
('j7ikm0o8nq5ar4vlqa2ohpov51', 'Config|a:3:{s:9:"userAgent";s:32:"dad8f69d91bf2de189007ea5806ed8fa";s:4:"time";i:1350105374;s:9:"countdown";i:10;}Message|a:0:{}Auth|a:1:{s:4:"User";a:9:{s:2:"id";s:1:"1";s:8:"username";s:5:"admin";s:4:"name";s:17:"جمال طوسی";s:5:"email";s:19:"jamal4533@yahoo.com";s:6:"active";s:1:"0";s:7:"role_id";s:1:"1";s:15:"registered_date";s:19:"0000-00-00 00:00:00";s:14:"last_logged_in";s:19:"0000-00-00 00:00:00";s:17:"last_ip_logged_in";s:0:"";}}', 1350105375, '127.0.0.1', 1, '/gallery_items/view/1/3');

-- --------------------------------------------------------

--
-- Table structure for table `gl_link_types`
--

DROP TABLE IF EXISTS `gl_link_types`;
CREATE TABLE IF NOT EXISTS `gl_link_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `gl_link_types`
--

INSERT INTO `gl_link_types` (`id`, `name`, `path`) VALUES
(1, 'مطلب', 'Contents'),
(2, 'مجموعه مطالب', 'ContentCategories'),
(3, 'تماس', 'ContactDetails'),
(4, 'مجموعه گالری', 'GalleryCategories'),
(5, 'گالری', 'GalleryItems'),
(6, 'مجموعه لینک', 'WeblinkCategories'),
(8, 'لینک خارجی', NULL),
(9, 'صفحه اصلی', '/'),
(10, 'جدا کننده', '#');

-- --------------------------------------------------------

--
-- Table structure for table `gl_menus`
--

DROP TABLE IF EXISTS `gl_menus`;
CREATE TABLE IF NOT EXISTS `gl_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT 'menu parent id for example a gallery menu which link''s to My Friends Gallery is a Child of Gallery menu which was an separator menu type   By default all menu is parent=>0',
  `title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'menu alias for using on slugs',
  `link_type_id` int(11) DEFAULT NULL,
  `menu_type_id` int(11) NOT NULL COMMENT 'menu type for example :  1) contact 2) gallery 3) static page(linked to content) 4) web links 5) register 6) menu separator 7) site map ,.....',
  `published` int(1) NOT NULL DEFAULT '1' COMMENT 'By default all menu is published',
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `gl_menus`
--

INSERT INTO `gl_menus` (`id`, `parent_id`, `title`, `link`, `link_type_id`, `menu_type_id`, `published`, `lft`, `rght`, `level`) VALUES
(1, 0, 'صفحه اصلی', '/', 9, 1, 1, 1, 2, 0),
(2, 0, 'اخبار', '/contents/category/1-اخبار', 2, 2, 1, 3, 4, 0),
(3, 0, 'بخش نامه', '/contents/category/2-بخش نامه', 2, 2, 1, 5, 6, 0),
(4, 0, 'انتخابات', '/contents/category/4-انتخابات', 2, 2, 1, 7, 8, 0),
(5, 0, 'درباره', '/contents/view/2-درباره', 1, 1, 1, 9, 10, 0),
(6, 0, 'تماس با ما', '/contact_details/view/1', 3, 1, 1, 11, 12, 0),
(7, 0, 'مجموعه', '/gallery_items/getItems/1', 4, 1, 1, 13, 14, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gl_menu_types`
--

DROP TABLE IF EXISTS `gl_menu_types`;
CREATE TABLE IF NOT EXISTS `gl_menu_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gl_menu_types`
--

INSERT INTO `gl_menu_types` (`id`, `type`, `title`, `description`) VALUES
(1, 'main_menu', 'منوی اصلی', ''),
(2, 'right_manu', 'منوی راست', '');

-- --------------------------------------------------------

--
-- Table structure for table `gl_roles`
--

DROP TABLE IF EXISTS `gl_roles`;
CREATE TABLE IF NOT EXISTS `gl_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gl_roles`
--

INSERT INTO `gl_roles` (`id`, `name`, `title`, `lft`, `rght`, `parent_id`) VALUES
(1, 'Admin', 'مدیریت', 1, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gl_settings`
--

DROP TABLE IF EXISTS `gl_settings`;
CREATE TABLE IF NOT EXISTS `gl_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `key` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `gl_settings`
--

INSERT INTO `gl_settings` (`id`, `section`, `key`, `value`, `alias`, `modified`) VALUES
(1, 'Site', 'Name', 'اتحادیه صنف محصولات فرهنگی مشهد مقدس', 'عنوان سایت', '1391-07-19 11:00:37'),
(2, 'Site', 'Keywords', 'اتحادیه صنف محصولات فرهنگی مشهد مقدس', 'توضیحات', '1391-07-19 11:00:37'),
(3, 'Site', 'Description', 'اتحادیه صنف محصولات فرهنگی مشهد مقدس', 'توضیحات', '1391-07-19 11:00:37'),
(4, 'Site', 'FootNote', 'کلیه حقوق مادی و معنوی متعلق به اتحادیه محصولات فرهنگی مشهد مقدس می باشد.', 'پانویس', '1391-07-19 11:00:37'),
(5, 'Site', 'AdminAddress', 'admin', 'آدرس مدیریت', '1391-07-19 11:00:37'),
(6, 'Error', 'Code-11', 'خطای شماره 11 - امکان ورود به سیستم وجود ندارد!', 'خطای شماره 11', '1391-07-19 11:00:37'),
(7, 'Error', 'Code-12', 'خطای شماره 12 - درخواست شما نا معتبر است و امکان بررسی آن وجود ندارد!', 'خطای شماره 12', '1391-07-19 11:00:37'),
(8, 'Error', 'Code-13', 'خطای شماره 13 - اطلاعات وارد شده معتبر نمی باشد. لطفا به خطاهای سیستم دقت کرده و مجددا تلاش نمایید!', 'خطای شماره 13', '1391-07-19 11:00:37'),
(9, 'Error', 'Code-14', 'خطای شماره 14 – امکان انجام عملیات درخواستی بدلیل ارسال نادرست اطلاعات وجود ندارد!', 'خطای شماره 14', '1391-07-19 11:00:37'),
(10, 'Error', 'Code-15', 'خطای شماره 15 – امکان حذف به علت دارا بودن آیتم های زیر مجموعه وجود ندارد. لطفا ابتدا آیتم های زیر مجموعه را حذف نمایید!', 'خطای شماره 15', '1391-07-19 11:00:37'),
(11, 'Error', 'Code-16', 'خطای شماره 16 - به هر دلیلی امکان حذف وجود ندارد!', 'خطای شماره 16', '1391-07-19 11:00:37'),
(12, 'Site', 'Email', 'info@emfm.ir', 'site email', '1391-07-19 11:00:37'),
(13, 'Error', 'Code-17', 'خطای شماره 17 - اشکال در انجام تراکنش', 'خطای شماره 17', '1391-07-19 11:00:37'),
(14, 'Site', 'Template', 'Asnaf', 'پوسته', '1391-07-19 11:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `gl_slider_items`
--

DROP TABLE IF EXISTS `gl_slider_items`;
CREATE TABLE IF NOT EXISTS `gl_slider_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'reference link for this slide',
  `title` varchar(50) COLLATE utf8_persian_ci NOT NULL COMMENT 'image title',
  `description` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'image description for displaying under title!',
  `image_file_name` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'image name for accessing the true image on the slider folder! for example :  app/webroot/images/slider/slide_01.jpg',
  `published` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'By default all images in slider is published!',
  `created` datetime NOT NULL,
  `link_type_id` int(11) NOT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gl_slider_items`
--

INSERT INTO `gl_slider_items` (`id`, `link`, `title`, `description`, `image_file_name`, `published`, `created`, `link_type_id`, `lft`, `rght`, `parent_id`) VALUES
(1, '/contents/view/1-نتایج_انتخابات_هیئت_رئیسه', 'نتایج انتخابات هیئت رئیسه', 'نتایج انتخابات هئیت رئیسه مشخص شد. برای مشاهده کلیک نمایید.', 'n.png', 1, '1391-07-15 16:48:53', 1, 1, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gl_users`
--

DROP TABLE IF EXISTS `gl_users`;
CREATE TABLE IF NOT EXISTS `gl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_persian_ci NOT NULL COMMENT 'username must be unique',
  `password` varchar(40) COLLATE utf8_persian_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'Both Of first name and last name',
  `email` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'activation status of users By default all users is deactivated',
  `role_id` int(11) NOT NULL,
  `registered_date` datetime NOT NULL,
  `last_logged_in` datetime NOT NULL COMMENT 'latest login of user to the web site',
  `last_ip_logged_in` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_gl_users_username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gl_users`
--

INSERT INTO `gl_users` (`id`, `username`, `password`, `name`, `email`, `active`, `role_id`, `registered_date`, `last_logged_in`, `last_ip_logged_in`) VALUES
(1, 'admin', '9ee2c9367485427679bd7a0ec1c7f3263869b387', 'جمال طوسی', 'jamal4533@yahoo.com', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(2, 'hamid', '9ee2c9367485427679bd7a0ec1c7f3263869b387', 'حمید ممدوحی', NULL, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `gl_weblinks`
--

DROP TABLE IF EXISTS `gl_weblinks`;
CREATE TABLE IF NOT EXISTS `gl_weblinks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weblink_category_id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_persian_ci NOT NULL COMMENT 'links title',
  `description` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'links description',
  `address` varchar(100) COLLATE utf8_persian_ci NOT NULL COMMENT 'link address',
  `hits` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'number of link hits after each click on link hits +1',
  `published` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'By default all link is published',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `weblink_category_id` (`weblink_category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gl_weblinks`
--


-- --------------------------------------------------------

--
-- Table structure for table `gl_weblink_categories`
--

DROP TABLE IF EXISTS `gl_weblink_categories`;
CREATE TABLE IF NOT EXISTS `gl_weblink_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gl_weblink_categories`
--

