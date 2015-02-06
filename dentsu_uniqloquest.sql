-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 06, 2015 at 07:01 PM
-- Server version: 5.5.40
-- PHP Version: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dentsu_uniqloquest`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_captcha`
--

CREATE TABLE IF NOT EXISTS `tbl_captcha` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `time` int(11) DEFAULT NULL,
  `ip_address` varchar(16) DEFAULT NULL,
  `word` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=263 ;

--
-- Dumping data for table `tbl_captcha`
--

INSERT INTO `tbl_captcha` (`id`, `time`, `ip_address`, `word`) VALUES
(262, 1418275929, '::1', 'FouAT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ci_sessions`
--

CREATE TABLE IF NOT EXISTS `tbl_ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ci_sessions`
--

INSERT INTO `tbl_ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('5d0d36ac990b20a324b8fd39bf5e892e', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:35.0) Gecko/20100101 Firefox/35.0', 1423201566, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_configurations`
--

CREATE TABLE IF NOT EXISTS `tbl_configurations` (
  `parameter` varchar(150) NOT NULL DEFAULT '',
  `value` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`parameter`,`value`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_configurations`
--

INSERT INTO `tbl_configurations` (`parameter`, `value`) VALUES
('environment', '0'),
('install', '0'),
('maintenance', '0'),
('theme', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fb_temp`
--

CREATE TABLE IF NOT EXISTS `tbl_fb_temp` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fb_id` bigint(20) NOT NULL,
  `fb_name` varchar(255) NOT NULL,
  `fb_email` varchar(255) NOT NULL,
  `fb_pic` varchar(255) NOT NULL,
  `added` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_fb_temp`
--

INSERT INTO `tbl_fb_temp` (`id`, `user_id`, `fb_id`, `fb_name`, `fb_email`, `fb_pic`, `added`, `modified`) VALUES
(0, 0, 1526856040926706, 'Nairfed Ifray', 'dyarfi20@gmail.com', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xaf1/v/t1.0-1/p50x50/10258601_1527531144192529_2406647537038847347_n.jpg?oh=017019810baf14df64b6771e5bbfeb1d&oe=552DA3D4&__gda__=1429280857_a17737954e1bac4a373cb84e3734d687', 0, 0),
(0, 0, 10205891041175646, 'Defrian Yarfi', 'deffsidefry@ymail.com', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xpa1/v/t1.0-1/c102.20.462.462/s50x50/1916319_1530429981164_1977049_n.jpg?oh=fff2752b168dcee48e6c83eb67b6aafc&oe=55260E6F&__gda__=1428396112_59b1b321d1c8ab0ab539b95e729bfd37', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_permissions`
--

CREATE TABLE IF NOT EXISTS `tbl_group_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `value` smallint(1) NOT NULL,
  `added` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=193 ;

--
-- Dumping data for table `tbl_group_permissions`
--

INSERT INTO `tbl_group_permissions` (`id`, `permission_id`, `group_id`, `value`, `added`, `modified`) VALUES
(1, 1, 1, 1, 1421127110, 0),
(2, 2, 1, 1, 1421127110, 0),
(3, 3, 1, 1, 1421127110, 0),
(4, 19, 1, 1, 1421127110, 0),
(5, 4, 1, 1, 1421127110, 0),
(6, 5, 1, 1, 1421127110, 0),
(7, 6, 1, 1, 1421127110, 0),
(8, 7, 1, 1, 1421127110, 0),
(9, 8, 1, 1, 1421127110, 0),
(10, 9, 1, 1, 1421127110, 0),
(11, 10, 1, 1, 1421127110, 0),
(12, 11, 1, 1, 1421127110, 0),
(13, 12, 1, 1, 1421127110, 0),
(14, 13, 1, 1, 1421127110, 0),
(15, 14, 1, 1, 1421127110, 0),
(16, 15, 1, 1, 1421127110, 0),
(17, 16, 1, 1, 1421127110, 0),
(18, 17, 1, 1, 1421127110, 0),
(19, 18, 1, 1, 1421127110, 0),
(20, 20, 1, 1, 1421127110, 0),
(21, 21, 1, 1, 1421127110, 0),
(22, 22, 1, 1, 1421127110, 0),
(23, 23, 1, 1, 1421127110, 0),
(24, 24, 1, 1, 1421127110, 0),
(25, 1, 2, 1, 1421127110, 0),
(26, 2, 2, 1, 1421127110, 0),
(27, 3, 2, 1, 1421127110, 0),
(28, 19, 2, 1, 1421127110, 0),
(29, 4, 2, 1, 1421127110, 0),
(30, 5, 2, 1, 1421127110, 0),
(31, 6, 2, 1, 1421127110, 0),
(32, 7, 2, 1, 1421127110, 0),
(33, 8, 2, 1, 1421127110, 0),
(34, 9, 2, 1, 1421127110, 0),
(35, 10, 2, 1, 1421127110, 0),
(36, 11, 2, 1, 1421127110, 0),
(37, 12, 2, 1, 1421127110, 0),
(38, 13, 2, 1, 1421127110, 0),
(39, 14, 2, 1, 1421127110, 0),
(40, 15, 2, 1, 1421127110, 0),
(41, 16, 2, 1, 1421127110, 0),
(42, 17, 2, 1, 1421127110, 0),
(43, 18, 2, 1, 1421127110, 0),
(44, 20, 2, 1, 1421127110, 0),
(45, 21, 2, 1, 1421127110, 0),
(46, 22, 2, 1, 1421127110, 0),
(47, 23, 2, 1, 1421127110, 0),
(48, 24, 2, 1, 1421127110, 0),
(49, 1, 99, 0, 1421127110, 0),
(50, 2, 99, 0, 1421127110, 0),
(51, 3, 99, 0, 1421127110, 0),
(52, 19, 99, 0, 1421127110, 0),
(53, 4, 99, 0, 1421127110, 0),
(54, 5, 99, 0, 1421127110, 0),
(55, 6, 99, 0, 1421127110, 0),
(56, 7, 99, 0, 1421127110, 0),
(57, 8, 99, 0, 1421127110, 0),
(58, 9, 99, 0, 1421127110, 0),
(59, 10, 99, 0, 1421127110, 0),
(60, 11, 99, 0, 1421127110, 0),
(61, 12, 99, 0, 1421127110, 0),
(62, 13, 99, 0, 1421127110, 0),
(63, 14, 99, 0, 1421127110, 0),
(64, 15, 99, 0, 1421127110, 0),
(65, 16, 99, 0, 1421127110, 0),
(66, 17, 99, 0, 1421127110, 0),
(67, 18, 99, 0, 1421127110, 0),
(68, 20, 99, 0, 1421127110, 0),
(69, 21, 99, 0, 1421127110, 0),
(70, 22, 99, 0, 1421127110, 0),
(71, 23, 99, 0, 1421127110, 0),
(72, 24, 99, 0, 1421127110, 0),
(73, 1, 111, 0, 1421127110, 0),
(74, 2, 111, 0, 1421127110, 0),
(75, 3, 111, 0, 1421127110, 0),
(76, 19, 111, 0, 1421127110, 0),
(77, 4, 111, 0, 1421127110, 0),
(78, 5, 111, 0, 1421127110, 0),
(79, 6, 111, 0, 1421127110, 0),
(80, 7, 111, 0, 1421127110, 0),
(81, 8, 111, 0, 1421127110, 0),
(82, 9, 111, 0, 1421127110, 0),
(83, 10, 111, 0, 1421127110, 0),
(84, 11, 111, 0, 1421127110, 0),
(85, 12, 111, 0, 1421127110, 0),
(86, 13, 111, 0, 1421127110, 0),
(87, 14, 111, 0, 1421127110, 0),
(88, 15, 111, 0, 1421127110, 0),
(89, 16, 111, 0, 1421127110, 0),
(90, 17, 111, 0, 1421127110, 0),
(91, 18, 111, 0, 1421127110, 0),
(92, 20, 111, 0, 1421127110, 0),
(93, 21, 111, 0, 1421127110, 0),
(94, 22, 111, 0, 1421127110, 0),
(95, 23, 111, 0, 1421127110, 0),
(96, 24, 111, 0, 1421127110, 0),
(97, 1, 112, 0, 1421127110, 0),
(98, 2, 112, 0, 1421127110, 0),
(99, 3, 112, 0, 1421127110, 0),
(100, 19, 112, 0, 1421127110, 0),
(101, 4, 112, 0, 1421127110, 0),
(102, 5, 112, 0, 1421127110, 0),
(103, 6, 112, 0, 1421127110, 0),
(104, 7, 112, 0, 1421127110, 0),
(105, 8, 112, 0, 1421127110, 0),
(106, 9, 112, 0, 1421127110, 0),
(107, 10, 112, 0, 1421127110, 0),
(108, 11, 112, 0, 1421127110, 0),
(109, 12, 112, 0, 1421127110, 0),
(110, 13, 112, 0, 1421127110, 0),
(111, 14, 112, 0, 1421127110, 0),
(112, 15, 112, 0, 1421127110, 0),
(113, 16, 112, 0, 1421127110, 0),
(114, 17, 112, 0, 1421127110, 0),
(115, 18, 112, 0, 1421127110, 0),
(116, 20, 112, 0, 1421127110, 0),
(117, 21, 112, 0, 1421127110, 0),
(118, 22, 112, 0, 1421127110, 0),
(119, 23, 112, 0, 1421127110, 0),
(120, 24, 112, 0, 1421127110, 0),
(121, 1, 113, 0, 1421127110, 0),
(122, 2, 113, 0, 1421127110, 0),
(123, 3, 113, 0, 1421127110, 0),
(124, 19, 113, 0, 1421127110, 0),
(125, 4, 113, 0, 1421127110, 0),
(126, 5, 113, 0, 1421127110, 0),
(127, 6, 113, 0, 1421127110, 0),
(128, 7, 113, 0, 1421127110, 0),
(129, 8, 113, 0, 1421127110, 0),
(130, 9, 113, 0, 1421127110, 0),
(131, 10, 113, 0, 1421127110, 0),
(132, 11, 113, 0, 1421127110, 0),
(133, 12, 113, 0, 1421127110, 0),
(134, 13, 113, 0, 1421127110, 0),
(135, 14, 113, 0, 1421127110, 0),
(136, 15, 113, 0, 1421127110, 0),
(137, 16, 113, 0, 1421127110, 0),
(138, 17, 113, 0, 1421127110, 0),
(139, 18, 113, 0, 1421127110, 0),
(140, 20, 113, 0, 1421127110, 0),
(141, 21, 113, 0, 1421127110, 0),
(142, 22, 113, 0, 1421127110, 0),
(143, 23, 113, 0, 1421127110, 0),
(144, 24, 113, 0, 1421127110, 0),
(145, 1, 114, 0, 1421127110, 0),
(146, 2, 114, 0, 1421127110, 0),
(147, 3, 114, 0, 1421127110, 0),
(148, 19, 114, 0, 1421127110, 0),
(149, 4, 114, 0, 1421127110, 0),
(150, 5, 114, 0, 1421127110, 0),
(151, 6, 114, 0, 1421127110, 0),
(152, 7, 114, 0, 1421127110, 0),
(153, 8, 114, 0, 1421127110, 0),
(154, 9, 114, 0, 1421127110, 0),
(155, 10, 114, 0, 1421127110, 0),
(156, 11, 114, 0, 1421127110, 0),
(157, 12, 114, 0, 1421127110, 0),
(158, 13, 114, 0, 1421127110, 0),
(159, 14, 114, 0, 1421127110, 0),
(160, 15, 114, 0, 1421127110, 0),
(161, 16, 114, 0, 1421127110, 0),
(162, 17, 114, 0, 1421127110, 0),
(163, 18, 114, 0, 1421127110, 0),
(164, 20, 114, 0, 1421127110, 0),
(165, 21, 114, 0, 1421127110, 0),
(166, 22, 114, 0, 1421127110, 0),
(167, 23, 114, 0, 1421127110, 0),
(168, 24, 114, 0, 1421127110, 0),
(169, 1, 116, 0, 1421127110, 0),
(170, 2, 116, 0, 1421127110, 0),
(171, 3, 116, 0, 1421127110, 0),
(172, 19, 116, 0, 1421127110, 0),
(173, 4, 116, 0, 1421127110, 0),
(174, 5, 116, 0, 1421127110, 0),
(175, 6, 116, 0, 1421127110, 0),
(176, 7, 116, 0, 1421127110, 0),
(177, 8, 116, 0, 1421127110, 0),
(178, 9, 116, 0, 1421127110, 0),
(179, 10, 116, 0, 1421127110, 0),
(180, 11, 116, 0, 1421127110, 0),
(181, 12, 116, 0, 1421127110, 0),
(182, 13, 116, 0, 1421127110, 0),
(183, 14, 116, 0, 1421127110, 0),
(184, 15, 116, 0, 1421127110, 0),
(185, 16, 116, 0, 1421127110, 0),
(186, 17, 116, 0, 1421127110, 0),
(187, 18, 116, 0, 1421127110, 0),
(188, 20, 116, 0, 1421127110, 0),
(189, 21, 116, 0, 1421127110, 0),
(190, 22, 116, 0, 1421127110, 0),
(191, 23, 116, 0, 1421127110, 0),
(192, 24, 116, 0, 1421127110, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_model_lists`
--

CREATE TABLE IF NOT EXISTS `tbl_model_lists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_model_lists`
--

INSERT INTO `tbl_model_lists` (`id`, `module_id`, `model`) VALUES
(1, 1, 'Users'),
(2, 1, 'UserGroups'),
(3, 1, 'UserProfiles'),
(4, 1, 'UserHistories'),
(5, 1, 'ModulePermissions'),
(6, 5, 'Settings');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_module_lists`
--

CREATE TABLE IF NOT EXISTS `tbl_module_lists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `module_link` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_module_lists`
--

INSERT INTO `tbl_module_lists` (`id`, `parent_id`, `module_name`, `module_link`, `order`) VALUES
(1, 0, 'admin', '#', 0),
(2, 1, 'Dashboard Panel', 'dashboard/index', 0),
(3, 1, 'User Listings', 'user/index', 1),
(4, 1, 'User Group Listings', 'usergroup/index', 2),
(5, 0, 'setting', '#', 1),
(6, 5, 'Setting Listings', 'setting/index', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_module_permissions`
--

CREATE TABLE IF NOT EXISTS `tbl_module_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `module_link` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tbl_module_permissions`
--

INSERT INTO `tbl_module_permissions` (`id`, `module_id`, `module_name`, `module_link`, `order`) VALUES
(1, 1, 'Dashboard Panel', 'dashboard/index', 0),
(2, 1, 'User Listings', 'user/index', 1),
(3, 1, 'User Group Listings', 'usergroup/index', 2),
(4, 1, 'Add New Dashboard', 'dashboard/add', 3),
(5, 1, 'View Dashboard Details', 'dashboard/view', 4),
(6, 1, 'Edit Dashboard Details', 'dashboard/edit', 5),
(7, 1, 'Delete Dashboard', 'dashboard/delete', 6),
(8, 1, 'Change Dashboard Status', 'dashboard/change', 7),
(9, 1, 'Add User Details', 'user/add', 8),
(10, 1, 'View User Details', 'user/view', 9),
(11, 1, 'Edit User Details', 'user/edit', 10),
(12, 1, 'Delete User Details', 'user/delete', 11),
(13, 1, 'Change User Status', 'user/change', 12),
(14, 1, 'Add User Group Details', 'usergroup/add', 13),
(15, 1, 'View User Group Details', 'usergroup/view', 14),
(16, 1, 'Edit User Group Details', 'usergroup/edit', 15),
(17, 1, 'Delete User Group Details', 'usergroup/delete', 16),
(18, 1, 'Change User Group Status', 'usergroup/change', 17),
(19, 5, 'Setting Listings', 'setting/index', 0),
(20, 5, 'Add Setting Details', 'setting/add', 1),
(21, 5, 'View Setting Details', 'setting/view', 2),
(22, 5, 'Edit Setting Details', 'setting/edit', 3),
(23, 5, 'Delete Setting Details', 'setting/delete', 4),
(24, 5, 'Change Setting Status', 'setting/change', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_participant`
--

CREATE TABLE IF NOT EXISTS `tbl_participant` (
  `part_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` text,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `shirt_size` varchar(3) NOT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `fb_id` varchar(255) DEFAULT NULL,
  `fb_pic_url` varchar(255) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`part_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_participant`
--

INSERT INTO `tbl_participant` (`part_id`, `name`, `address`, `email`, `phone_number`, `shirt_size`, `twitter`, `fb_id`, `fb_pic_url`, `join_date`) VALUES
(5, 'Nairfed Ifray', 'Jl. Jend Sudriman Kav. 54-55 Jakarta 12190, Indonesia', 'dyarfi20@gmail.com', '081807244697', '', '@dyarfi', '1526856040926706', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xfp1/v/t1.0-1/c15.0.50.50/p50x50/10354686_10150004552801856_220367501106153455_n.jpg?oh=0f671ca943cfc6f05bc77ef6702afafa&oe=55348F2F&__gda__=1429815769_fb504deb5984163f89fac8303f2c1265', '2015-01-14 09:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_questionnaires`
--

CREATE TABLE IF NOT EXISTS `tbl_questionnaires` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `questionnaire_text` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `added` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_questionnaires`
--

INSERT INTO `tbl_questionnaires` (`id`, `user_id`, `questionnaire_text`, `status`, `added`, `modified`) VALUES
(1, 1, '<p>\n	Anda memilih Uniqlo karena memiliki kualitas produk yang baik.</p>\n', 1, 0, 0),
(2, 1, '<p>\n	Uniqlo Airism nyaman dipakai sejak pertama kali.</p>\n', 1, 0, 0),
(3, 1, '<p>\n	Uniqlo Airism mempunyai berbagai macam desain &amp; model yang menarik.</p>\n', 1, NULL, NULL),
(4, 1, '<p>\n	Kualitas desain dan warna Uniqlo Airism tidak mudah rusak/luntur.</p>\n', 1, NULL, NULL),
(5, 1, '<p>\n	Harga yang ditawarkan sepadan dengan kualitas yang ditawarkan.</p>\n', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_questions`
--

CREATE TABLE IF NOT EXISTS `tbl_questions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `questionnaire_id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `added` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbl_questions`
--

INSERT INTO `tbl_questions` (`id`, `user_id`, `questionnaire_id`, `question_text`, `status`, `added`, `modified`) VALUES
(1, 1, 1, '<p>\n	SS: Sangat Setuju</p>\n', 1, NULL, NULL),
(2, 1, 1, '<p>\n	S: Setuju</p>\n', 1, NULL, NULL),
(3, 1, 1, '<p>\n	N: Normal</p>\n', 1, NULL, NULL),
(4, 1, 1, '<p>\n	TS: Tidak Setuju</p>\n', 1, NULL, NULL),
(5, 1, 1, '<p>\n	STS: Sangat Tidak Setuju</p>\n', 1, NULL, NULL),
(6, 1, 2, '<p>\n	SS: Sangat Setuju</p>\n', 1, NULL, NULL),
(7, 1, 2, '<p>\n	S: Setuju</p>\n', 1, NULL, NULL),
(8, 1, 2, '<p>\n	N: Normal</p>\n', 1, NULL, NULL),
(9, 1, 2, '<p>\n	TS: Tidak Setuju</p>\n', 1, NULL, NULL),
(10, 0, 2, '<p>\n	STS: Sangat Tidak Setuju</p>\n', 1, NULL, NULL),
(11, 1, 3, '<p>\r\n	SS: Sangat Setuju</p>\r\n', 1, NULL, NULL),
(12, 1, 3, '<p>\r\n	S: Setuju</p>\r\n', 1, NULL, NULL),
(13, 1, 3, '<p>\r\n	N: Normal</p>\r\n', 1, NULL, NULL),
(14, 1, 3, '<p>\r\n	TS: Tidak Setuju</p>\r\n', 1, NULL, NULL),
(15, 1, 3, '<p>\r\n	STS: Sangat Tidak Setuju</p>\r\n', 1, NULL, NULL),
(16, 1, 4, '<p>\r\n	SS: Sangat Setuju</p>\r\n', 1, NULL, NULL),
(17, 1, 4, '<p>\r\n	S: Setuju</p>\r\n', 1, NULL, NULL),
(18, 1, 4, '<p>\r\n	N: Normal</p>\r\n', 1, NULL, NULL),
(19, 1, 4, '<p>\r\n	TS: Tidak Setuju</p>\r\n', 1, NULL, NULL),
(20, 1, 4, '<p>\r\n	STS: Sangat Tidak Setuju</p>\r\n', 1, NULL, NULL),
(21, 1, 5, '<p>\r\n	SS: Sangat Setuju</p>\r\n', 1, NULL, NULL),
(22, 1, 5, '<p>\r\n	S: Setuju</p>\r\n', 1, NULL, NULL),
(23, 1, 5, '<p>\r\n	N: Normal</p>\r\n', 1, NULL, NULL),
(24, 1, 5, '<p>\r\n	TS: Tidak Setuju</p>\r\n', 1, NULL, NULL),
(25, 1, 5, '<p>\r\n	STS: Sangat Tidak Setuju</p>\r\n', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE IF NOT EXISTS `tbl_settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parameter` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `is_system` tinyint(1) DEFAULT '1',
  `status` tinyint(1) DEFAULT '1',
  `added` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`parameter`,`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `parameter`, `alias`, `value`, `is_system`, `status`, `added`, `modified`) VALUES
(1, 'email_marketing', 'Email Marketing', 'marketing@', 1, 1, 1334835773, NULL),
(2, 'email_administrator', 'Email Administrator', 'administrator@', 1, 1, 1334835773, 1336122482),
(3, 'email_hrd', 'Email HRD', 'hrd@', 1, 1, 1334835773, NULL),
(4, 'email_info', 'Email Info', 'info@d3.dentsu.co.id', 1, 1, 1334835773, NULL),
(5, 'email_template', 'Email Template', '&dash;', 1, 1, 1334835773, NULL),
(6, 'maintenance_template', 'Maintenance Mode Template', '<h2>The site is off for <span><h1>MAINTENANCE</h1></span></h2>', 1, 1, 1334835773, NULL),
(7, 'contactus_address', 'Contact Address', '22nd Floor, Mandiri Tower Plaza Bapindo <br/>\nJl. Jend. Sudirman Kav. 54-55 <br/>\nJakarta 12190, Indonesia', 1, 1, 1334835773, NULL),
(8, 'contactus_gmap', 'GMaps Location', 'http://maps.google.com/maps?q=-6.217668,106.812992&num=1&t=m&z=18', 1, 1, 1334835773, NULL),
(9, 'no_phone', 'Number Phone', '(021) 299-501-10 / (021) 526-0286', 1, 1, 1334835773, NULL),
(10, 'no_fax', 'Number Fax', '(021) 522.3718', 1, 1, 1334835773, NULL),
(11, 'title_default', 'Website Title Default', 'Connecting you to your consumer', 1, 1, NULL, NULL),
(12, 'title_name', 'Company Title Name', 'PT. Default (Web Agency in Jakarta)', 1, 1, NULL, 1336118568),
(13, 'language', 'Default Language', 'en', 1, 1, NULL, 1336118568),
(14, 'counter', 'Site Counter', '123', 1, 1, NULL, 1336118568),
(15, 'copyright', 'Copyright', '© 2012 COMPANY NAME COPYRIGHT. All Rights Reserved.', 1, 1, NULL, 1336118568),
(16, 'site_name', 'Site Name', 'PANASONIC Score The Selfie', 1, 1, NULL, 1336118568),
(17, 'site_quote', 'Quote', 'We provide solution for your Websites', 1, 1, NULL, 1336118568),
(18, 'site_description', 'Website Description', 'We provide solution for your Company Website ', 1, 1, NULL, 1336118568),
(19, 'socmed_facebook', 'Facebook', 'http://facebook.com', 1, 1, NULL, 1336118568),
(20, 'socmed_twitter', 'Twitter', 'http://twitter.com', 1, 1, NULL, 1336118568),
(21, 'socmed_gplus', 'Google Plus', 'http://plus.google.com', 1, 1, NULL, 1336118568),
(22, 'socmed_linkedin', 'LinkedIn', 'http://linkedin.com', 1, 1, NULL, 1336118568),
(23, 'socmed_pinterest', 'Pinterest', 'http://pinterest.com', 1, 1, NULL, 1336118568),
(24, 'registered_mark', 'Registered', 'We provide solution for your Websites', 1, 1, NULL, 1336118568),
(25, 'google_analytics', 'Analytics', 'Code Snippet', 1, 1, NULL, 1336118568),
(26, 'ext_link', 'Ext Link', 'http://www.apb-career.net', 1, 1, NULL, 1336118568);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `password`, `role`, `status`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `username` char(8) CHARACTER SET latin1 NOT NULL,
  `email` varchar(64) CHARACTER SET latin1 NOT NULL,
  `password` char(124) CHARACTER SET latin1 NOT NULL,
  `group_id` tinyint(1) unsigned NOT NULL,
  `last_login` int(11) NOT NULL,
  `logged_in` int(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `session` varchar(160) NOT NULL,
  `added` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `email`, `password`, `group_id`, `last_login`, `logged_in`, `status`, `session`, `added`, `modified`) VALUES
(1, 'admin', 'admin@admin.com', 'dd94709528bb1c83d08f3088d4043f4742891f4f', 1, 1418274077, 1, 1, '', 0, 0),
(2, 'joni', 'admin1@admin.com', '9003d1df22eb4d3820015070385194c8', 2, 1417003004, 0, 1, '', 0, 0),
(3, 'qc', 'asdf@asdf.com', 'fb00378895cf135de3b135f385c0012f3823e4fb', 3, 1417001008, 0, 1, '', 0, 0),
(29, 'dyarfi', 'dyarfi20@gmail.com', '647dc5d75f6ce3c6a859eb3b91fa6ccaab05b245', 116, 0, 0, 1, '', 1417065898, 0),
(7, 'gmp', 'defrian.yarfi@gmail.com', '4d60cf3ac1381a533090412a84466000437eee1f', 4, 1417003001, 0, 1, '', 0, 0),
(28, 'public', 'defrian.yarfi@yahoo.com', '616eae925a4c10a70f2675d13d5c9e909f4d60c6', 110, 1417001002, 1, 1, '', 1416993998, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_answers`
--

CREATE TABLE IF NOT EXISTS `tbl_user_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `part_id` int(11) NOT NULL,
  `user_questionnaire_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `added` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_user_answers`
--

INSERT INTO `tbl_user_answers` (`id`, `part_id`, `user_questionnaire_id`, `question_id`, `added`, `modified`) VALUES
(1, 4, 4, 16, 1417065898, 1417065898),
(2, 4, 5, 22, 1417065898, 1417065898),
(8, 5, 4, 16, 1417065898, 1417065898),
(9, 5, 4, 17, 1417065898, 1417065898),
(10, 4, 5, 23, 1417065898, 1417065898),
(11, 4, 5, 24, 1417065898, 1417065898),
(12, 5, 4, 18, 1417065898, 1417065898),
(13, 5, 4, 19, 1417065898, 1417065898),
(14, 4, 4, 16, 1417065898, 1417065898),
(15, 4, 4, 16, 1417065898, 1417065898),
(16, 4, 4, 16, 1417065898, 1417065898),
(17, 4, 5, 24, 1417065898, 1417065898),
(18, 3, 3, 11, 1417065898, 1417065898),
(19, 3, 3, 11, 1417065898, 1417065898),
(20, 3, 3, 11, 1417065898, 1417065898),
(21, 3, 3, 11, 1417065898, 1417065898);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_groups`
--

CREATE TABLE IF NOT EXISTS `tbl_user_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `backend_access` tinyint(1) DEFAULT NULL,
  `full_backend_access` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_system` tinyint(1) NOT NULL DEFAULT '0',
  `added` int(11) unsigned NOT NULL,
  `modified` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=117 ;

--
-- Dumping data for table `tbl_user_groups`
--

INSERT INTO `tbl_user_groups` (`id`, `name`, `backend_access`, `full_backend_access`, `status`, `is_system`, `added`, `modified`) VALUES
(1, 'Super Administrator', 1, 1, 1, 1, 1416499923, 0),
(2, 'Administrator', 1, 1, 1, 1, 1416499923, 0),
(99, 'User', 0, 0, 1, 1, 1416499923, 0),
(111, 'Manager', 0, 0, 1, 0, 0, 0),
(112, 'Executive', 0, 0, 1, 0, 0, 0),
(113, 'Director', 0, 0, 1, 0, 0, 0),
(114, 'General', 0, 0, 1, 0, 0, 0),
(116, 'Publisher', 1, 1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_histories`
--

CREATE TABLE IF NOT EXISTS `tbl_user_histories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(24) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `controller` varchar(160) NOT NULL,
  `action` char(20) DEFAULT NULL,
  `time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`module`,`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_user_histories`
--

INSERT INTO `tbl_user_histories` (`id`, `module`, `user_id`, `controller`, `action`, `time`) VALUES
(1, 'user', 1, 'history', 'index', 1416281220),
(2, 'user', 1, 'history', 'index', 1416281220);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_images`
--

CREATE TABLE IF NOT EXISTS `tbl_user_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `part_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `added` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_user_images`
--

INSERT INTO `tbl_user_images` (`id`, `part_id`, `file_name`, `title`, `status`, `added`, `modified`) VALUES
(1, 5, 'Screen Shot 2014-10-15 at 6.45.57 PM.png', '', 1, 1417065898, 1417065898),
(2, 5, 'Screen Shot 2014-12-22 at 6.02.28 PM.png', '', 1, 1417065898, 1417065898),
(3, 5, 'Screen Shot 2014-12-24 at 1.32.54 PM.png', '', 1, 1417065898, 1417065898),
(19, 7, 'Screen Shot 2014-09-01 at 10.46.40 AM.png', '', 1, 0, 0),
(5, 5, '19-HiroyukiABE.jpg', '', 1, 0, 0),
(7, 5, '23-YosukeIDEGUCHI.jpg', '', 1, 0, 0),
(8, 5, '27-NaokiOGAWA.jpg', '', 1, 0, 0),
(9, 5, 'selfie-totti.jpg', '', 1, 0, 0),
(10, 5, 'article-2677678-1F5292E500000578-683_634x640.jpg', '', 1, 0, 0),
(11, 5, 'drogba-24-11-2013-23-50-22.jpg', '', 1, 0, 0),
(12, 5, 'lewan456633428.jpg', '', 1, 0, 0),
(13, 5, 'trio1.jpg', '', 1, 0, 0),
(14, 6, '988635_10151717844023684_552927803_n.jpg', '', 1, 0, 0),
(15, 6, 'ney1selfie.jpg', '', 1, 0, 0),
(16, 6, 'ney21297570042942_ORIGINAL.jpg', '', 1, 0, 0),
(17, 6, '10537035_10204422046581691_3019590600192884490_n.jpg', '', 1, 0, 0),
(18, 6, '32488341_l.jpg', '', 1, 0, 0),
(20, 7, 'Screen Shot 2014-09-04 at 11.43.28 AM.png', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_profiles`
--

CREATE TABLE IF NOT EXISTS `tbl_user_profiles` (
  `user_id` int(11) unsigned NOT NULL,
  `gender` enum('male','female') NOT NULL DEFAULT 'male',
  `about` text,
  `first_name` varchar(64) DEFAULT NULL,
  `last_name` varchar(64) DEFAULT NULL,
  `division` varchar(64) DEFAULT NULL,
  `country` varchar(64) DEFAULT NULL,
  `state` varchar(64) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `address` text,
  `postal_code` varchar(8) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `mobile_phone` varchar(16) DEFAULT NULL,
  `fax` varchar(16) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `file_type` varchar(64) DEFAULT NULL,
  `file_name` varchar(48) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `added` int(11) unsigned NOT NULL,
  `modified` int(11) unsigned NOT NULL,
  KEY `user_id` (`user_id`,`phone`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_profiles`
--

INSERT INTO `tbl_user_profiles` (`user_id`, `gender`, `about`, `first_name`, `last_name`, `division`, `country`, `state`, `city`, `address`, `postal_code`, `birthday`, `phone`, `mobile_phone`, `fax`, `website`, `file_type`, `file_name`, `status`, `added`, `modified`) VALUES
(1, 'male', 'Top Administrator of this website and portal', 'Administrator', 'Website', 'Web Programmer', 'DKI Jakarta', 'Jakarta', 'Jl. Gading Putih 1 F2 No. 4', '14240', '', '2010-09-06', '1234', '081807244697', '0', 'http://google.com', 'image/jpeg', 'users_default.png', 1, 1283760138, 1283831030),
(2, 'male', 'Administrator of this Website', '', '', 'Web Designer', 'DKI Jakarta', 'Jakarta', 'Jl. Gading Putih 1 F2 No. 4', '14240', '', '2010-09-06', '1234', '081807244697', '0', '', 'image/jpeg', '78d57b4b5a0c6048b75bb0c9d91a8392.jpg', 1, 1283760138, 1283831030),
(3, 'male', 'User of this Website', '', '', 'Jakarta', '', '', 'Jl. Pulomas Barat 1 No. 31', '', '', '0000-00-00', '1234', '', '', '', 'image/jpeg', 'a8a484572c007e1e17648ae2c7ad629c.jpg', 1, 1285152397, 0),
(28, 'male', 'Test', 'Public', 'Viewers', 'Web Programmer', NULL, NULL, NULL, NULL, NULL, '0000-00-00', '909090090', '909090090', NULL, NULL, NULL, NULL, 1, 1416993998, 0),
(29, 'male', 'Web Programmer not a full stack', 'Defrian', 'Yarfi', 'Web Programmer', NULL, NULL, NULL, NULL, NULL, '0000-00-00', '081807244697', '081807244697', NULL, NULL, NULL, NULL, 1, 1417065898, 0),
(111, 'male', '', 'Web Developer', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', 1, 1333442128, 1333442192),
(110, 'male', '', 'Web Developer', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', 1, 1333441986, 1333442058);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_questionnaires_completed`
--

CREATE TABLE IF NOT EXISTS `tbl_user_questionnaires_completed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `part_id` int(11) NOT NULL,
  `questionnaire_id` int(11) NOT NULL,
  `date_completed` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `added` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_user_questionnaires_completed`
--

INSERT INTO `tbl_user_questionnaires_completed` (`id`, `part_id`, `questionnaire_id`, `date_completed`, `status`, `added`, `modified`) VALUES
(1, 5, 1, 6756363, 1, 0, 0),
(2, 4, 2, 5858585, 1, 0, 0),
(3, 3, 3, 5858585, 1, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
