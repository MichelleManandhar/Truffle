-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2018 at 04:46 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `truffle_pan`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_log`
--

CREATE TABLE IF NOT EXISTS `audit_log` (
`id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `action` text NOT NULL,
  `type` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2208 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_log`
--

INSERT INTO `audit_log` (`id`, `created_by`, `action`, `type`, `created_at`) VALUES
(8, 2, 'Updated menu category', 'menu', '2017-04-13 10:56:03'),
(9, 2, 'Updated menu category', 'menu', '2017-04-13 10:56:07'),
(10, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-13 11:17:02'),
(11, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-04-13 11:26:02'),
(12, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-13 11:26:15'),
(13, 2, 'New menu category has been created named -liquor', 'menu', '2017-04-13 11:27:27'),
(14, 2, 'Product named -Stock Item 1 has been added', 'misc', '2017-04-13 11:33:07'),
(15, 2, 'Product named -Stock Item 2 has been added', 'misc', '2017-04-13 11:33:18'),
(16, 2, 'Product named -Stock Item 3 has been added', 'misc', '2017-04-13 11:33:31'),
(17, 2, 'Product named -Stock Item 4 has been added', 'misc', '2017-04-13 11:33:48'),
(18, 2, 'Product named -Stock Item 5 has been added', 'misc', '2017-04-13 11:34:00'),
(19, 2, 'Product named -Stock Item 6 has been added', 'misc', '2017-04-13 11:34:11'),
(20, 2, 'Menu item has been added', 'menu', '2017-04-13 11:38:35'),
(21, 2, 'Table order KOT number 170413-1 has been send', 'order', '2017-04-13 11:47:02'),
(22, 2, 'Table order KOT number 170413-2 has been send', 'order', '2017-04-13 11:48:11'),
(23, 2, 'Item wise payment has been made for the amount of Rs. 330', 'order', '2017-04-13 11:49:44'),
(24, 2, 'Advance payment has been made for the amount of Rs. 200', 'order', '2017-04-13 11:58:04'),
(25, 2, 'Table order KOT number 170413-3 has been send', 'order', '2017-04-13 11:59:34'),
(26, 2, '2 - stock item 1 has been sold', 'stock', '2017-04-13 12:00:57'),
(27, 2, '20 - stock item 2 has been sold', 'stock', '2017-04-13 12:00:58'),
(28, 2, 'Cash payment for table order has been made for the amount of Rs. 2035', 'order', '2017-04-13 12:00:59'),
(29, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-04-13 12:01:00'),
(30, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-04-13 12:01:43'),
(31, 2, 'Take away order KOT 170413-4 has been send', 'order', '2017-04-13 12:02:53'),
(32, 2, 'Take away order KOT 170413-5 has been send', 'order', '2017-04-13 12:08:43'),
(33, 2, 'New debtor named -sugen'' has been created', 'debtor', '2017-04-13 12:09:11'),
(34, 2, 'Item wise payment has been made for the amount of Rs. 1100', 'order', '2017-04-13 12:09:15'),
(35, 2, 'Credit delivery order has been made for the amount of Rs.1980 on the debtor named -sugen', 'order', '2017-04-13 12:09:41'),
(36, 2, 'Credit delivery charge has been made for the amount of Rs.50 on the debtor named -sugen', 'order', '2017-04-13 12:09:42'),
(37, 2, 'Take away order KOT 170413-6 has been send', 'order', '2017-04-13 12:10:52'),
(38, 2, 'Item wise payment has been made for the amount of Rs. 220', 'order', '2017-04-13 12:22:41'),
(39, 2, 'Advance payment has been made for the amount of Rs. 100', 'order', '2017-04-13 12:22:53'),
(40, 2, 'Item wise payment has been made for the amount of Rs. 220', 'order', '2017-04-13 12:23:10'),
(41, 2, 'Cash payment for take away order has been made for the amount of Rs. 1100', 'order', '2017-04-13 12:23:23'),
(42, 2, 'New table has been created named Table - 2', 'table', '2017-04-13 12:23:34'),
(43, 2, 'Table order KOT number 170413-7 has been send', 'order', '2017-04-13 12:36:57'),
(44, 2, '2 - stock item 1 has been sold', 'stock', '2017-04-13 12:37:14'),
(45, 2, '20 - stock item 2 has been sold', 'stock', '2017-04-13 12:37:14'),
(46, 2, 'Cash payment for table order has been made for the amount of Rs. 1320', 'order', '2017-04-13 12:37:15'),
(47, 2, 'Table order KOT number 170413-8 has been send', 'order', '2017-04-13 12:37:29'),
(48, 2, '2 - stock item 1 has been sold', 'stock', '2017-04-13 12:58:41'),
(49, 2, '20 - stock item 2 has been sold', 'stock', '2017-04-13 12:58:41'),
(50, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-04-13 12:58:42'),
(51, 2, 'Cash payment for table order has been made for the amount of Rs. 880', 'order', '2017-04-13 12:58:42'),
(52, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-04-13 13:16:38'),
(53, 2, 'Table order KOT number 170413-9 has been send', 'order', '2017-04-13 13:16:51'),
(54, 2, 'FOC has been made', 'order', '2017-04-13 13:36:50'),
(55, 2, 'Table order KOT number 170413-10 has been send', 'order', '2017-04-13 13:41:37'),
(56, 2, 'FOC has been made', 'order', '2017-04-13 13:44:39'),
(57, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-04-13 14:53:45'),
(58, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-13 14:53:55'),
(59, 2, 'Tip amount of Rs. 200 has been added', 'order', '2017-04-13 14:54:14'),
(60, 2, 'Tip amount 50 has been distributed', 'tip', '2017-04-13 14:55:52'),
(61, 2, 'Table order KOT number 170413-11 has been send', 'order', '2017-04-13 17:06:44'),
(62, 2, 'Cash payment for table order has been made for the amount of Rs. 550', 'order', '2017-04-13 17:07:21'),
(63, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-13 19:32:55'),
(64, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-15 10:22:05'),
(65, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-16 10:40:07'),
(66, 2, 'Table order KOT number 170416-1 has been send', 'order', '2017-04-16 15:37:37'),
(67, 2, 'Cash payment for table order has been made for the amount of Rs. 660', 'order', '2017-04-16 15:37:57'),
(68, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-04-16 15:37:58'),
(69, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-04-16 15:38:29'),
(70, 2, 'Payment returned the amount of Rs. 100to debtor named -sugen', 'debtor', '2017-04-16 16:05:28'),
(71, 2, 'Table order KOT number 170416-2 has been send', 'order', '2017-04-16 16:59:36'),
(72, 2, 'Cash payment for table order has been made for the amount of Rs. 594', 'order', '2017-04-16 17:00:05'),
(73, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-04-16 17:00:07'),
(74, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-04-16 18:03:20'),
(75, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-16 20:37:59'),
(76, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-17 08:59:09'),
(77, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-17 11:12:12'),
(78, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-04-17 11:13:07'),
(79, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-17 13:12:25'),
(80, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-04-17 13:12:37'),
(81, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-17 13:47:06'),
(82, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-04-17 13:57:27'),
(83, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-17 14:23:41'),
(84, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-04-17 14:51:06'),
(85, 2, 'Table order KOT number 170417-1 has been send', 'order', '2017-04-17 15:17:47'),
(86, 2, 'Table order KOT number 170417-2 has been send', 'order', '2017-04-17 15:18:07'),
(87, 2, 'Table order KOT number 170417-3 has been send', 'order', '2017-04-17 15:18:32'),
(88, 2, 'Table ''<b>Table - 2</b>'' has been occupied ', 'table', '2017-04-17 15:19:07'),
(89, 2, 'Table order KOT number 170417-4 has been send', 'order', '2017-04-17 15:19:14'),
(90, 2, 'Table order KOT number 170417-5 has been send', 'order', '2017-04-17 15:19:20'),
(91, 2, 'New table has been created named Table - 3', 'table', '2017-04-17 15:19:31'),
(92, 2, 'New table has been created named Table - 4', 'table', '2017-04-17 15:19:34'),
(93, 2, 'Table ''<b>Table - 3</b>'' has been occupied ', 'table', '2017-04-17 15:19:39'),
(94, 2, 'Table order KOT number 170417-6 has been send', 'order', '2017-04-17 15:19:47'),
(95, 2, 'Table order KOT number 170417-7 has been send', 'order', '2017-04-17 15:19:53'),
(96, 2, 'Table ''<b>Table - 4</b>'' has been occupied ', 'table', '2017-04-17 15:22:20'),
(97, 2, 'Table order KOT number 170417-8 has been send', 'order', '2017-04-17 15:22:29'),
(98, 2, 'Table order KOT number 170417-9 has been send', 'order', '2017-04-17 15:22:36'),
(99, 2, 'Take away order KOT 170417-10 has been send', 'order', '2017-04-17 15:56:35'),
(100, 2, 'New obstacle has been created named -Obstacle - 1 on the floor no. 1', 'table', '2017-04-17 16:05:18'),
(101, 2, 'Obstacle has been deleted', 'table', '2017-04-17 16:40:57'),
(102, 2, 'New obstacle has been created named -Obstacle - 1 on the floor no. 1', 'table', '2017-04-17 16:41:02'),
(103, 2, 'New obstacle has been created named -Obstacle - 3 on the floor no. 1', 'table', '2017-04-17 16:41:03'),
(104, 2, 'Obstacle has been deleted', 'table', '2017-04-17 16:47:17'),
(105, 2, 'New obstacle has been created named -Obstacle - 4 on the floor no. 1', 'table', '2017-04-17 16:47:55'),
(106, 2, 'New obstacle has been created named -Obstacle - 5 on the floor no. 1', 'table', '2017-04-17 16:48:04'),
(107, 2, 'Obstacle has been deleted', 'table', '2017-04-17 16:49:24'),
(108, 2, 'New table has been created named Table - 5', 'table', '2017-04-17 16:49:32'),
(109, 2, 'New table has been created named Table - 6', 'table', '2017-04-17 16:49:34'),
(110, 2, 'New table has been created named Table - 7', 'table', '2017-04-17 16:49:35'),
(111, 2, 'Table named ''Table - 7'' has been deleted', 'table', '2017-04-17 16:49:39'),
(112, 2, 'Table named ''Table - 5'' has been deleted', 'table', '2017-04-17 16:49:45'),
(113, 2, 'Table named ''Table - 6'' has been deleted', 'table', '2017-04-17 16:49:48'),
(114, 2, 'Booking has been made', 'table', '2017-04-17 17:42:45'),
(115, 2, 'Booking has been made', 'table', '2017-04-17 17:51:32'),
(116, 5, '<b>Staff</b> Logged onto the system', 'user', '2017-04-18 10:15:24'),
(117, 5, 'Table ''<b>Table - 4</b>'' has been closed ', 'table', '2017-04-18 10:16:21'),
(118, 5, 'Table ''<b>Table - 4</b>'' has been occupied ', 'table', '2017-04-18 10:16:53'),
(119, 5, 'Table ''<b>Table - 4</b>'' has been closed ', 'table', '2017-04-18 10:17:06'),
(120, 5, 'Table ''<b>Table - 3</b>'' has been closed ', 'table', '2017-04-18 10:18:46'),
(121, 5, '<b>Staff</b> Logged out of the system', 'user', '2017-04-18 10:19:03'),
(122, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-18 10:19:12'),
(123, 2, 'Table ''<b>Table - 2</b>'' has been closed ', 'table', '2017-04-18 10:19:25'),
(124, 2, 'Table ''<b>Table - 4</b>'' has been closed ', 'table', '2017-04-18 10:24:43'),
(125, 2, 'Table ''<b>Table - 3</b>'' has been closed ', 'table', '2017-04-18 10:24:48'),
(126, 2, 'Table ''<b>Table - 4</b>'' has been closed ', 'table', '2017-04-18 10:27:16'),
(127, 2, 'Obstacle has been deleted', 'table', '2017-04-18 10:27:57'),
(128, 2, 'New table has been created named Table - 5', 'table', '2017-04-18 10:30:54'),
(129, 2, 'Table named ''Table - 5'' has been deleted', 'table', '2017-04-18 10:30:59'),
(130, 2, 'Table ''<b>Table - 4</b>'' has been closed ', 'table', '2017-04-18 10:38:26'),
(131, 2, 'Table named ''Table - 4'' has been deleted', 'table', '2017-04-18 10:38:30'),
(132, 2, 'New obstacle has been created named -Obstacle - 4 on the floor no. 1', 'table', '2017-04-18 10:39:41'),
(133, 2, 'New obstacle has been created named -Obstacle - 7 on the floor no. 1', 'table', '2017-04-18 10:39:42'),
(134, 2, 'New table has been created named Table - 4', 'table', '2017-04-18 10:39:44'),
(135, 2, 'New table has been created named Table - 5', 'table', '2017-04-18 10:39:45'),
(136, 2, 'New table has been created named Table - 6', 'table', '2017-04-18 10:39:46'),
(137, 2, 'Table named ''Table - 4'' has been deleted', 'table', '2017-04-18 10:41:11'),
(138, 2, 'Table named ''Table - 5'' has been deleted', 'table', '2017-04-18 10:41:15'),
(139, 2, 'Table named ''Table - 6'' has been deleted', 'table', '2017-04-18 10:41:18'),
(140, 2, 'Take away order KOT 170418-1 has been send', 'order', '2017-04-18 10:42:48'),
(141, 2, 'Obstacle has been deleted', 'table', '2017-04-18 10:46:46'),
(142, 2, 'Obstacle has been deleted', 'table', '2017-04-18 10:49:58'),
(143, 2, 'New obstacle has been created named -Obstacle - 2 on the floor no. 1', 'table', '2017-04-18 10:50:09'),
(144, 2, 'New obstacle has been created named -Obstacle - 3 on the floor no. 1', 'table', '2017-04-18 10:50:12'),
(145, 2, 'New obstacle has been created named -Obstacle - 4 on the floor no. 1', 'table', '2017-04-18 10:50:13'),
(146, 2, 'New obstacle has been created named -Obstacle - 5 on the floor no. 1', 'table', '2017-04-18 10:50:14'),
(147, 2, 'New obstacle has been created named -Obstacle - 6 on the floor no. 1', 'table', '2017-04-18 10:50:16'),
(148, 2, 'New obstacle has been created named -Obstacle - 7 on the floor no. 1', 'table', '2017-04-18 10:50:17'),
(149, 2, 'Obstacle has been deleted', 'table', '2017-04-18 10:50:39'),
(150, 2, 'Obstacle has been deleted', 'table', '2017-04-18 10:50:42'),
(151, 2, 'Obstacle has been deleted', 'table', '2017-04-18 10:50:45'),
(152, 2, 'Obstacle has been deleted', 'table', '2017-04-18 10:50:48'),
(153, 2, 'Obstacle has been deleted', 'table', '2017-04-18 10:50:51'),
(154, 2, 'Obstacle has been deleted', 'table', '2017-04-18 10:50:54'),
(155, 2, 'Obstacle has been deleted', 'table', '2017-04-18 10:50:57'),
(156, 2, 'Table ''<b>Table - 3</b>'' has been closed ', 'table', '2017-04-18 10:56:57'),
(157, 2, 'Cash payment for table order has been made for the amount of Rs. 248', 'order', '2017-04-18 10:56:57'),
(158, 2, 'Advance payment has been made for the amount of Rs. 100', 'order', '2017-04-18 11:23:04'),
(159, 2, 'Item wise payment has been made for the amount of Rs. 220', 'order', '2017-04-18 11:23:32'),
(160, 2, 'Cash payment for table order has been made for the amount of Rs. 935', 'order', '2017-04-18 11:23:48'),
(161, 2, 'Table ''<b>Table - 2</b>'' has been closed ', 'table', '2017-04-18 11:23:49'),
(162, 2, 'Take away order KOT 170418-2 has been send', 'order', '2017-04-18 11:25:28'),
(163, 2, 'Item wise payment has been made for the amount of Rs. 110', 'order', '2017-04-18 11:25:43'),
(164, 2, 'Advance payment has been made for the amount of Rs. 100', 'order', '2017-04-18 11:25:57'),
(165, 2, 'Item wise payment has been made for the amount of Rs. 110', 'order', '2017-04-18 11:26:18'),
(166, 2, 'Cash payment for delivery order has been made for the amount of Rs. 660', 'order', '2017-04-18 11:26:41'),
(167, 2, 'Table order KOT number 170418-3 has been send', 'order', '2017-04-18 11:33:24'),
(168, 2, 'FOC has been made', 'order', '2017-04-18 11:33:31'),
(169, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-04-18 11:52:06'),
(170, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-04-18 12:00:40'),
(171, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-04-18 12:01:55'),
(172, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-04-18 12:40:33'),
(173, 2, 'Table order KOT number 170418-4 has been send', 'order', '2017-04-18 12:40:43'),
(174, 2, 'Item wise payment has been made for the amount of Rs. 220', 'order', '2017-04-18 12:41:01'),
(175, 2, 'Cash payment for table order has been made for the amount of Rs. 935', 'order', '2017-04-18 12:41:30'),
(176, 2, 'Table order KOT number 170418-5 has been send', 'order', '2017-04-18 12:45:13'),
(177, 2, 'Item wise payment has been made for the amount of Rs. 220', 'order', '2017-04-18 12:45:27'),
(178, 2, 'Credit item wise table order has been made for the amount of Rs. 440 on the debtor named -sugen', 'order', '2017-04-18 12:53:30'),
(179, 2, 'Cash payment for table order has been made for the amount of Rs. 935', 'order', '2017-04-18 13:04:16'),
(180, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-04-18 13:04:18'),
(181, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-04-18 13:11:03'),
(182, 2, 'Table order KOT number 170418-6 has been send', 'order', '2017-04-18 13:11:12'),
(183, 2, 'Credit item wise table order has been made for the amount of Rs. 220 on the debtor named -sugen', 'order', '2017-04-18 13:11:29'),
(184, 2, 'Item wise payment has been made for the amount of Rs. 165', 'order', '2017-04-18 13:11:42'),
(185, 2, 'Cash payment for table order has been made for the amount of Rs. 935', 'order', '2017-04-18 13:11:59'),
(186, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-04-18 13:12:00'),
(187, 5, '<b>Staff</b> Logged onto the system', 'user', '2017-04-19 08:52:07'),
(188, 5, '<b>Staff</b> Logged out of the system', 'user', '2017-04-19 08:55:43'),
(189, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-19 08:55:53'),
(190, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-04-19 09:10:23'),
(191, 5, '<b>Staff</b> Logged onto the system', 'user', '2017-04-19 09:10:32'),
(192, 5, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-04-19 09:10:52'),
(193, 5, '<b>Staff</b> Logged out of the system', 'user', '2017-04-19 09:11:06'),
(194, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-19 09:11:15'),
(195, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-04-19 09:12:31'),
(196, 5, '<b>Staff</b> Logged onto the system', 'user', '2017-04-19 09:12:40'),
(197, 5, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-04-19 09:12:45'),
(198, 5, 'Booked table Table - 1 has been occupied ', 'table', '2017-04-19 09:13:03'),
(199, 5, '<b>Staff</b> Logged out of the system', 'user', '2017-04-19 09:13:21'),
(200, 5, '<b>Staff</b> Logged onto the system', 'user', '2017-04-19 09:15:55'),
(201, 5, '<b>Staff</b> Logged out of the system', 'user', '2017-04-19 09:16:12'),
(202, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-19 09:16:24'),
(203, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-04-19 09:16:44'),
(204, 5, '<b>Staff</b> Logged onto the system', 'user', '2017-04-19 09:16:53'),
(205, 5, '<b>Staff</b> Logged out of the system', 'user', '2017-04-19 09:17:19'),
(206, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-19 10:42:57'),
(207, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-04-19 11:48:47'),
(208, 5, '<b>Staff</b> Logged onto the system', 'user', '2017-04-19 11:48:58'),
(209, 5, '<b>Staff</b> Logged out of the system', 'user', '2017-04-19 11:49:06'),
(210, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-19 11:49:14'),
(211, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-04-19 11:49:30'),
(212, 5, '<b>Staff</b> Logged onto the system', 'user', '2017-04-19 11:49:40'),
(213, 5, 'Table order KOT number 170419-1 has been send', 'order', '2017-04-19 11:51:34'),
(214, 5, '<b>Staff</b> Logged out of the system', 'user', '2017-04-19 12:05:09'),
(215, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-19 12:05:20'),
(216, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-04-19 12:05:45'),
(217, 5, '<b>Staff</b> Logged onto the system', 'user', '2017-04-19 12:05:54'),
(218, 5, '<b>Staff</b> Logged out of the system', 'user', '2017-04-19 13:07:14'),
(219, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-19 13:07:25'),
(220, 2, 'Sales has been returned for the invoice number - 9', 'order', '2017-04-19 13:39:27'),
(221, 2, 'Tip amount 20 has been distributed', 'tip', '2017-04-19 14:33:48'),
(222, 2, 'Table order KOT number 170419-2 has been send', 'order', '2017-04-19 14:43:09'),
(223, 2, 'Cash payment for table order has been made for the amount of Rs. 1815', 'order', '2017-04-19 14:43:20'),
(224, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-04-19 14:43:21'),
(225, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-04-19 14:59:16'),
(226, 2, 'Table order KOT number 170419-3 has been send', 'order', '2017-04-19 15:03:56'),
(227, 2, 'Table order KOT number 170419-4 has been send', 'order', '2017-04-19 15:10:24'),
(228, 2, 'Item wise payment has been made for the amount of Rs. 110', 'order', '2017-04-19 15:10:33'),
(229, 2, 'Advance payment has been made for the amount of Rs. 10', 'order', '2017-04-19 15:10:45'),
(230, 2, 'Credit item wise table order has been made for the amount of Rs. 55 on the debtor named -sugen', 'order', '2017-04-19 15:10:59'),
(231, 2, 'Cash payment for table order has been made for the amount of Rs. 220', 'order', '2017-04-19 15:16:30'),
(232, 2, 'Table order KOT number 170419-5 has been send', 'order', '2017-04-19 15:17:10'),
(233, 2, 'Cash payment for table order has been made for the amount of Rs. 660', 'order', '2017-04-19 15:17:27'),
(234, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-04-19 15:17:28'),
(235, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-04-19 15:20:36'),
(236, 2, 'Table order KOT number 170419-6 has been send', 'order', '2017-04-19 15:20:44'),
(237, 2, 'Cash payment for table order has been made for the amount of Rs. 220', 'order', '2017-04-19 15:21:50'),
(238, 2, 'Table order KOT number 170419-7 has been send', 'order', '2017-04-19 15:22:26'),
(239, 2, 'Cash payment for table order has been made for the amount of Rs. 110', 'order', '2017-04-19 15:23:50'),
(240, 2, 'Table order KOT number 170419-8 has been send', 'order', '2017-04-19 15:27:32'),
(241, 2, 'Cash payment for table order has been made for the amount of Rs. 220', 'order', '2017-04-19 15:27:38'),
(242, 2, 'Table order KOT number 170419-9 has been send', 'order', '2017-04-19 15:27:50'),
(243, 2, 'Cash payment for table order has been made for the amount of Rs. 220', 'order', '2017-04-19 15:28:00'),
(244, 2, 'Table order KOT number 170419-10 has been send', 'order', '2017-04-19 15:28:13'),
(245, 2, 'Cash payment for table order has been made for the amount of Rs. 220', 'order', '2017-04-19 15:28:26'),
(246, 2, 'Table order KOT number 170419-11 has been send', 'order', '2017-04-19 15:29:00'),
(247, 2, 'Cash payment for table order has been made for the amount of Rs. 110', 'order', '2017-04-19 15:29:10'),
(248, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-04-19 15:29:11'),
(249, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-04-19 15:29:18'),
(250, 2, 'Table order KOT number 170419-12 has been send', 'order', '2017-04-19 15:29:24'),
(251, 2, 'Take away order KOT 170419-13 has been send', 'order', '2017-04-19 15:45:57'),
(252, 2, 'Take away order KOT 170419-14 has been send', 'order', '2017-04-19 15:46:09'),
(253, 2, 'Take away order KOT 170419-15 has been send', 'order', '2017-04-19 15:49:48'),
(254, 2, 'Take away order KOT 170419-16 has been send', 'order', '2017-04-19 15:49:57'),
(255, 2, 'New setting has been added of field name = vat rate and value = 13', 'setting', '2017-04-19 16:44:35'),
(256, 2, 'Take away order KOT 170419-17 has been send', 'order', '2017-04-19 18:02:58'),
(257, 5, '<b>Staff</b> Logged out of the system', 'user', '2017-04-20 12:37:42'),
(258, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-20 12:37:54'),
(259, 2, 'Take away order KOT 170420-1 has been send', 'order', '2017-04-20 12:47:48'),
(260, 2, 'Take away order KOT 170420-2 has been send', 'order', '2017-04-20 12:51:47'),
(261, 2, 'Cash payment for table order has been made for the amount of Rs. 124', 'order', '2017-04-20 13:25:01'),
(262, 2, 'Table order KOT number 170420-3 has been send', 'order', '2017-04-20 13:25:55'),
(263, 2, 'Table order KOT number 170420-4 has been send', 'order', '2017-04-20 14:03:59'),
(264, 2, 'Item wise payment has been made for the amount of Rs. 124', 'order', '2017-04-20 14:05:27'),
(265, 2, 'Cash payment for table order has been made for the amount of Rs. 497', 'order', '2017-04-20 14:07:29'),
(266, 2, 'Table order KOT number 170420-5 has been send', 'order', '2017-04-20 14:32:54'),
(267, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-04-20 15:29:39'),
(268, 2, 'Cash payment for table order has been made for the amount of Rs. 497', 'order', '2017-04-20 15:29:39'),
(269, 2, 'Cash payment for take away order has been made for the amount of Rs. 124', 'order', '2017-04-20 15:29:53'),
(270, 2, 'Sales has been returned for the invoice number - 1', 'order', '2017-04-20 15:47:57'),
(271, 2, 'Sales has been returned for the invoice number - 2', 'order', '2017-04-20 15:50:24'),
(272, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-04-20 16:44:45'),
(273, 2, 'Table order KOT number 170420-6 has been send', 'order', '2017-04-20 16:44:56'),
(274, 2, 'Item wise payment has been made for the amount of Rs. 249', 'order', '2017-04-20 16:45:03'),
(275, 2, 'Cash payment for table order has been made for the amount of Rs. 373', 'order', '2017-04-20 16:45:14'),
(276, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-04-20 16:45:15'),
(277, 2, 'Take away order KOT 170420-7 has been send', 'order', '2017-04-20 16:54:01'),
(278, 2, 'Cash payment for delivery order has been made for the amount of Rs. 746', 'order', '2017-04-20 17:03:25'),
(279, 2, 'Cash payment for delivery order has been made for the amount of Rs. 746', 'order', '2017-04-20 17:07:12'),
(280, 2, 'Cash payment for delivery charge has been made for the amount of Rs. 87', 'order', '2017-04-20 17:07:13'),
(281, 2, 'Take away order KOT 170420-8 has been send', 'order', '2017-04-20 17:08:45'),
(282, 2, 'Cash payment for delivery order has been made for the amount of Rs. 249', 'order', '2017-04-20 17:08:56'),
(283, 2, 'Cash payment for delivery charge has been made for the amount of Rs. 174', 'order', '2017-04-20 17:08:57'),
(284, 2, 'Take away order KOT 170420-9 has been send', 'order', '2017-04-20 17:15:13'),
(285, 2, 'Cash payment for delivery order has been made for the amount of Rs. 622', 'order', '2017-04-20 17:15:32'),
(286, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-04-20 17:23:11'),
(287, 2, 'Table order KOT number 170420-10 has been send', 'order', '2017-04-20 17:23:19'),
(288, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-21 08:04:19'),
(289, 2, 'Credit item wise table order has been made for the amount of Rs. 249 on the debtor named -sugen', 'order', '2017-04-21 08:22:33'),
(290, 2, 'Cash payment for table order has been made for the amount of Rs. 746', 'order', '2017-04-21 08:22:45'),
(291, 2, 'Table order KOT number 170421-1 has been send', 'order', '2017-04-21 08:23:29'),
(292, 2, 'Credit item wise table order has been made for the amount of Rs. 497 on the debtor named -sugen', 'order', '2017-04-21 08:23:47'),
(293, 2, 'Cash payment for table order has been made for the amount of Rs. 746', 'order', '2017-04-21 08:23:55'),
(294, 2, 'Table order KOT number 170421-2 has been send', 'order', '2017-04-21 08:33:58'),
(295, 2, 'Cash payment for table order has been made for the amount of Rs. 497', 'order', '2017-04-21 08:34:04'),
(296, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-04-21 13:43:35'),
(297, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-21 13:43:46'),
(298, 2, 'Table order KOT number 170421-3 has been send', 'order', '2017-04-21 13:44:30'),
(299, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-04-21 14:21:25'),
(300, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-21 14:21:34'),
(301, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-23 15:01:14'),
(302, 2, 'Credit item wise table order has been made for the amount of Rs. 249 on the debtor named -sugen', 'order', '2017-04-23 15:02:56'),
(303, 2, 'Cash payment for table order has been made for the amount of Rs. 746', 'order', '2017-04-23 15:03:08'),
(304, 2, 'Table order KOT number 170423-1 has been send', 'order', '2017-04-23 15:05:44'),
(305, 2, 'Cash payment for table order has been made for the amount of Rs. 249', 'order', '2017-04-23 15:05:51'),
(306, 2, 'Table order KOT number 170423-2 has been send', 'order', '2017-04-23 16:53:55'),
(307, 2, 'Item wise payment has been made for the amount of Rs. 124', 'order', '2017-04-23 16:54:12'),
(308, 2, 'Cash payment for table order has been made for the amount of Rs. 497', 'order', '2017-04-23 17:05:03'),
(309, 2, 'Table order KOT number 170423-3 has been send', 'order', '2017-04-23 17:05:17'),
(310, 2, 'Credit item wise table order has been made for the amount of Rs. 249 on the debtor named -sugen', 'order', '2017-04-23 17:05:34'),
(311, 2, 'Item wise payment has been made for the amount of Rs. 124', 'order', '2017-04-23 17:05:50'),
(312, 2, 'Cash payment for table order has been made for the amount of Rs. 497', 'order', '2017-04-23 17:06:04'),
(313, 2, 'Table order KOT number 170423-4 has been send', 'order', '2017-04-23 17:16:58'),
(314, 2, 'Item wise payment has been made for the amount of Rs. 249', 'order', '2017-04-23 17:17:05'),
(315, 2, 'Credit table order has been made for the amount of Rs. 497 on the debtor named -sugen', 'order', '2017-04-23 17:17:18'),
(316, 2, 'Table order KOT number 170423-5 has been send', 'order', '2017-04-23 17:32:09'),
(317, 2, 'Item wise payment has been made for the amount of Rs. 249', 'order', '2017-04-23 17:32:20'),
(318, 2, 'Credit table order has been made for the amount of Rs. 994 on the debtor named -sugen', 'order', '2017-04-23 17:32:34'),
(319, 2, 'Table order KOT number 170423-6 has been send', 'order', '2017-04-23 18:19:43'),
(320, 2, 'Credit item wise table order has been made for the amount of Rs. 124 on the debtor named -sugen', 'order', '2017-04-23 18:20:18'),
(321, 2, 'Cash payment for table order has been made for the amount of Rs. 497', 'order', '2017-04-23 18:20:27'),
(322, 2, 'Table order KOT number 170423-7 has been send', 'order', '2017-04-23 18:21:41'),
(323, 2, 'Item wise payment has been made for the amount of Rs. 249', 'order', '2017-04-23 18:21:49'),
(324, 2, 'Credit table order has been made for the amount of Rs. 497 on the debtor named -sugen', 'order', '2017-04-23 18:22:03'),
(325, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-24 10:21:48'),
(326, 2, 'Table order KOT number 170424-1 has been send', 'order', '2017-04-24 11:35:15'),
(327, 2, 'Advance payment has been made for the amount of Rs. 100', 'order', '2017-04-24 11:35:24'),
(328, 2, 'Credit item wise table order has been made for the amount of Rs. 124 on the debtor named -sugen', 'order', '2017-04-24 11:36:50'),
(329, 2, 'Cash payment for table order has been made for the amount of Rs. 249', 'order', '2017-04-24 11:42:24'),
(330, 2, 'Table order KOT number 170424-2 has been send', 'order', '2017-04-24 11:46:52'),
(331, 2, 'Table order KOT number 170424-3 has been send', 'order', '2017-04-24 11:49:22'),
(332, 2, 'Advance payment has been made for the amount of Rs. 100', 'order', '2017-04-24 11:49:30'),
(333, 2, 'Credit item wise table order has been made for the amount of Rs. 124 on the debtor named -sugen', 'order', '2017-04-24 11:49:53'),
(334, 2, 'Cash payment for table order has been made for the amount of Rs. 497', 'order', '2017-04-24 11:50:06'),
(335, 2, 'Debtor named -sugen paid the amount of Rs. 100', 'debtor', '2017-04-24 12:16:01'),
(336, 2, 'Table order KOT number 170424-4 has been send', 'order', '2017-04-24 12:22:27'),
(337, 2, 'Advance payment has been made for the amount of Rs. 100', 'order', '2017-04-24 12:22:39'),
(338, 2, 'Item wise payment has been made for the amount of Rs. 124', 'order', '2017-04-24 12:22:51'),
(339, 2, 'Credit table order has been made for the amount of Rs. 746 on the debtor named -sugen', 'order', '2017-04-24 12:23:05'),
(340, 2, 'Debtor named -sugen paid the amount of Rs. 500', 'debtor', '2017-04-24 12:24:03'),
(341, 2, 'Debtor named -sugen paid the amount of Rs. 100', 'debtor', '2017-04-24 12:24:15'),
(342, 2, 'Table order KOT number 170424-5 has been send', 'order', '2017-04-24 12:26:31'),
(343, 2, 'Take away order KOT 170424-6 has been send', 'order', '2017-04-24 13:56:59'),
(344, 2, 'Cash payment for delivery order has been made for the amount of Rs. 124', 'order', '2017-04-24 13:58:09'),
(345, 2, 'Cash payment for delivery order has been made for the amount of Rs. 124', 'order', '2017-04-24 13:58:52'),
(346, 2, 'Take away order KOT 170424-7 has been send', 'order', '2017-04-24 14:12:05'),
(347, 2, 'Advance payment has been made for the amount of Rs. 100', 'order', '2017-04-24 14:12:20'),
(348, 2, 'Item wise payment has been made for the amount of Rs. 124', 'order', '2017-04-24 14:12:34'),
(349, 2, 'Cash payment for delivery order has been made for the amount of Rs. 497', 'order', '2017-04-24 14:16:58'),
(350, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-04-24 15:10:47'),
(351, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-24 15:10:59'),
(352, 2, 'Credit table order has been made for the amount of Rs. 249 on the debtor named -sugen', 'order', '2017-04-24 15:11:36'),
(353, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-04-24 15:11:52'),
(354, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-04-24 15:12:45'),
(355, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-04-24 15:13:35'),
(356, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-04-24 15:15:07'),
(357, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-04-24 15:15:25'),
(358, 2, 'Debtor named -sugen paid the amount of Rs. 100', 'debtor', '2017-04-24 15:25:26'),
(359, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-04-24 16:36:04'),
(360, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-24 16:36:14'),
(361, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-04-24 16:36:27'),
(362, 2, 'Table order KOT number 170424-8 has been send', 'order', '2017-04-24 16:36:43'),
(363, 2, 'Advance payment has been made for the amount of Rs. 100', 'order', '2017-04-24 16:37:37'),
(364, 2, 'Item wise payment has been made for the amount of Rs. 124', 'order', '2017-04-24 16:38:18'),
(365, 2, 'Advance payment has been made for the amount of Rs. 100', 'order', '2017-04-24 16:42:49'),
(366, 2, 'Item wise payment has been made for the amount of Rs. 124', 'order', '2017-04-24 16:43:04'),
(367, 2, 'Cash payment for table order has been made for the amount of Rs. 497', 'order', '2017-04-24 16:43:55'),
(368, 2, 'Table order KOT number 170424-9 has been send', 'order', '2017-04-24 16:44:59'),
(369, 2, 'Cash payment for table order has been made for the amount of Rs. 497', 'order', '2017-04-24 16:45:10'),
(370, 2, 'Table order KOT number 170424-10 has been send', 'order', '2017-04-24 16:48:42'),
(371, 2, 'Cash payment for table order has been made for the amount of Rs. 497', 'order', '2017-04-24 16:51:58'),
(372, 2, 'Table order KOT number 170424-11 has been send', 'order', '2017-04-24 16:53:01'),
(373, 2, 'Cash payment for table order has been made for the amount of Rs. 497', 'order', '2017-04-24 16:53:16'),
(374, 2, 'Table order KOT number 170424-12 has been send', 'order', '2017-04-24 16:53:53'),
(375, 2, 'Advance payment has been made for the amount of Rs. 100', 'order', '2017-04-24 16:54:02'),
(376, 2, 'Item wise payment has been made for the amount of Rs. 124', 'order', '2017-04-24 16:54:15'),
(377, 2, 'Cash payment for table order has been made for the amount of Rs. 497', 'order', '2017-04-24 16:54:25'),
(378, 2, 'Table order KOT number 170424-13 has been send', 'order', '2017-04-24 17:00:25'),
(379, 2, 'Advance payment has been made for the amount of Rs. 100', 'order', '2017-04-24 17:00:32'),
(380, 2, 'Item wise payment has been made for the amount of Rs. 124', 'order', '2017-04-24 17:00:54'),
(381, 2, 'Cash payment for table order has been made for the amount of Rs. 497', 'order', '2017-04-24 17:01:22'),
(382, 2, 'Table order KOT number 170424-14 has been send', 'order', '2017-04-24 17:04:35'),
(383, 2, 'Advance payment has been made for the amount of Rs. 100', 'order', '2017-04-24 17:04:41'),
(384, 2, 'Item wise payment has been made for the amount of Rs. 124', 'order', '2017-04-24 17:04:53'),
(385, 2, 'Cash payment for table order has been made for the amount of Rs. 497', 'order', '2017-04-24 17:07:32'),
(386, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-25 08:09:07'),
(387, 2, 'Table order KOT number 170425-1 has been send', 'order', '2017-04-25 08:11:38'),
(388, 2, 'Advance payment has been made for the amount of Rs. 100', 'order', '2017-04-25 08:12:00'),
(389, 2, 'Item wise payment has been made for the amount of Rs. 124', 'order', '2017-04-25 08:12:17'),
(390, 2, 'Cash payment for table order has been made for the amount of Rs. 622', 'order', '2017-04-25 08:12:27'),
(391, 2, 'Table order KOT number 170425-2 has been send', 'order', '2017-04-25 08:13:16'),
(392, 2, 'Item wise payment has been made for the amount of Rs. 124', 'order', '2017-04-25 08:13:25'),
(393, 2, 'Credit table order has been made for the amount of Rs. 497 on the debtor named -sugen', 'order', '2017-04-25 08:13:37'),
(394, 2, 'Sales has been returned for the invoice number - 26', 'order', '2017-04-25 08:21:07'),
(395, 2, 'Table order KOT number 170425-3 has been send', 'order', '2017-04-25 08:24:02'),
(396, 2, 'Item wise payment has been made for the amount of Rs. 124', 'order', '2017-04-25 08:24:15'),
(397, 2, 'Credit table order has been made for the amount of Rs. 497 on the debtor named -sugen', 'order', '2017-04-25 08:24:28'),
(398, 2, 'Sales has been returned for the invoice number - 25', 'order', '2017-04-25 08:33:55'),
(399, 2, 'Sales has been returned for the invoice number - 27', 'order', '2017-04-25 08:34:21'),
(400, 2, 'Table order KOT number 170425-4 has been send', 'order', '2017-04-25 08:39:19'),
(401, 2, 'Credit item wise table order has been made for the amount of Rs. 249 on the debtor named -sugen', 'order', '2017-04-25 08:39:34'),
(402, 2, 'Item wise payment has been made for the amount of Rs. 124', 'order', '2017-04-25 08:39:45'),
(403, 2, 'Credit table order has been made for the amount of Rs. 497 on the debtor named -sugen', 'order', '2017-04-25 08:39:57'),
(404, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-25 10:40:48'),
(405, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-25 18:39:03'),
(406, 2, 'New table has been created named Table - 4', 'table', '2017-04-25 18:42:31'),
(407, 2, 'New table has been created named Table - 5', 'table', '2017-04-25 18:42:33'),
(408, 2, 'Table ''<b>Table - 4</b>'' has been occupied ', 'table', '2017-04-25 18:43:01'),
(409, 2, 'Table order KOT number 170425-5 has been send', 'order', '2017-04-25 18:43:42'),
(410, 2, 'Table order KOT number 170425-6 has been send', 'order', '2017-04-25 18:44:03'),
(411, 2, 'Table ''<b>Table - 2</b>'' has been occupied ', 'table', '2017-04-25 18:45:29'),
(412, 2, 'Table order KOT number 170425-7 has been send', 'order', '2017-04-25 18:47:05'),
(413, 2, 'New table has been created named Table - 6', 'table', '2017-04-25 18:57:29'),
(414, 2, 'New obstacle has been created named -Obstacle - 1 on the floor no. 1', 'table', '2017-04-25 18:57:38'),
(415, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-04-26 10:58:03'),
(416, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-04-27 10:40:17'),
(417, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-27 10:40:28'),
(418, 2, 'Cash payment for table order has been made for the amount of Rs. 746', 'order', '2017-04-27 10:55:04'),
(419, 2, 'Table ''<b>Table - 2</b>'' has been closed ', 'table', '2017-04-27 10:55:20'),
(420, 2, 'Cash payment for table order has been made for the amount of Rs. 435', 'order', '2017-04-27 10:55:57'),
(421, 2, 'Table order KOT number 170427-1 has been send', 'order', '2017-04-27 10:58:01'),
(422, 2, 'Cash payment for table order has been made for the amount of Rs. 249', 'order', '2017-04-27 10:58:08'),
(423, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-04-27 11:38:16'),
(424, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-27 11:38:32'),
(425, 2, 'Table order KOT number 170427-2 has been send', 'order', '2017-04-27 11:45:42'),
(426, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-04-27 14:52:36'),
(427, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-27 14:52:54'),
(428, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-04-30 11:57:23'),
(429, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-02 10:36:13'),
(430, 2, 'Table ''<b>Table - 4</b>'' has been closed ', 'table', '2017-05-02 10:52:36'),
(431, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-08 11:26:33'),
(432, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-08 13:23:24'),
(433, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-08 13:23:35'),
(434, 2, 'Table order KOT number 170508-1 has been send', 'order', '2017-05-08 13:23:54'),
(435, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-05-10 10:47:39'),
(436, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-10 10:47:41'),
(437, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-10 10:49:46'),
(438, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-05-10 10:49:54'),
(439, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-10 10:49:55'),
(440, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-05-10 10:50:13'),
(441, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-10 10:50:14'),
(442, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-10 10:57:19'),
(443, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-10 10:58:54'),
(444, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-10 12:10:28'),
(445, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-10 12:30:51'),
(446, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-10 12:31:18'),
(447, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-10 12:35:20'),
(448, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-10 12:43:29'),
(449, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-10 12:48:59'),
(450, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-10 12:49:09'),
(451, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-10 12:52:02'),
(452, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-10 12:52:41'),
(453, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-10 12:58:05'),
(454, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-10 12:58:08'),
(455, 2, 'New obstacle has been created named -Obstacle - 2 on the floor no. 1', 'table', '2017-05-10 13:02:26'),
(456, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-10 13:03:50'),
(457, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-10 13:03:53'),
(458, 2, 'Floor has been added', 'table', '2017-05-10 13:04:12'),
(459, 2, 'Floor has been added', 'table', '2017-05-10 13:04:39'),
(460, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-10 13:05:38'),
(461, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-10 13:05:49'),
(462, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-10 13:07:31'),
(463, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-10 13:07:55'),
(464, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-10 13:07:58'),
(465, 2, 'Floor has been added', 'table', '2017-05-10 13:09:36'),
(466, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-10 14:47:41'),
(467, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-10 14:47:44'),
(468, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-10 15:29:15'),
(469, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-11 10:54:43'),
(470, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-11 10:54:53'),
(471, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-11 14:12:00'),
(472, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-11 16:33:07'),
(473, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-05-11 16:39:25'),
(474, 2, 'Deleted profile picture of the user -Administrator''administrator', 'user', '2017-05-11 16:39:47'),
(475, 2, 'Uploaded profile picture of the user -Administrator''administrator', 'user', '2017-05-11 16:40:18'),
(476, 2, 'Table order KOT number 170511-1 has been send', 'order', '2017-05-11 16:41:16'),
(477, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-11 16:44:56'),
(478, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-11 16:49:20'),
(479, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-05-11 16:49:58'),
(480, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-11 16:49:59'),
(481, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-11 16:56:00'),
(482, 2, 'Table order KOT number 170511-2 has been send', 'order', '2017-05-11 16:57:59'),
(483, 2, 'Table order KOT number 170511-3 has been send', 'order', '2017-05-11 16:59:19'),
(484, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-15 10:45:56'),
(485, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-15 10:51:13'),
(486, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-15 10:51:23'),
(487, 2, 'Table order KOT number 170515-1 has been send', 'order', '2017-05-15 10:59:12'),
(488, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-15 12:34:37'),
(489, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-15 12:34:48'),
(490, 2, 'Take away order KOT 170515-2 has been send', 'order', '2017-05-15 12:35:09'),
(491, 2, 'Credit delivery order has been made for the amount of Rs.249 on the debtor named -sugen', 'order', '2017-05-15 12:36:36'),
(492, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-15 16:10:24'),
(493, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-15 16:10:34'),
(494, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-05-15 16:20:59'),
(495, 2, 'Cash payment for table order has been made for the amount of Rs. 1181', 'order', '2017-05-15 16:20:59'),
(496, 2, 'Table ''<b>Table - 4</b>'' has been occupied ', 'table', '2017-05-15 16:21:35'),
(497, 2, 'Table order KOT number 170515-3 has been send', 'order', '2017-05-15 16:21:45'),
(498, 2, 'Item wise payment has been made for the amount of Rs. 124', 'order', '2017-05-15 16:21:56'),
(499, 2, 'Credit item wise table order has been made for the amount of Rs. 124 on the debtor named -sugen', 'order', '2017-05-15 16:22:17'),
(500, 2, 'Credit table order has been made for the amount of Rs. 622 on the debtor named -sugen', 'order', '2017-05-15 16:22:34'),
(501, 2, 'Table ''<b>Table - 4</b>'' has been closed ', 'table', '2017-05-15 16:22:36'),
(502, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-15 17:30:05'),
(503, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-15 17:30:16'),
(504, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-16 10:44:04'),
(505, 2, 'Table ''<b>Table - 6</b>'' has been occupied ', 'table', '2017-05-16 11:11:23'),
(506, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-16 12:50:09'),
(507, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-16 12:50:32'),
(508, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-16 14:46:28'),
(509, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-16 14:50:52'),
(510, 2, 'New debtor named -binit'' has been created', 'debtor', '2017-05-16 15:35:53'),
(511, 2, 'Duplicate Invoice of the original invoice number ''40'' has been printed', 'bill', '2017-05-16 17:23:51'),
(512, 2, 'Duplicate Invoice of the original invoice number ''40'' has been printed', 'bill', '2017-05-16 17:23:59'),
(513, 2, 'Duplicate Invoice of the original invoice number ''40'' has been printed', 'bill', '2017-05-16 17:25:21'),
(514, 2, 'Duplicate Invoice of the original invoice number ''40'' has been printed', 'bill', '2017-05-16 17:25:25'),
(515, 2, 'Duplicate Invoice of the original invoice number ''39'' has been printed', 'bill', '2017-05-16 17:26:48'),
(516, 2, 'Duplicate Invoice of the original invoice number ''39'' has been printed', 'bill', '2017-05-16 17:26:54'),
(517, 2, 'Duplicate Invoice of the original invoice number ''39'' has been printed', 'bill', '2017-05-16 17:26:58'),
(518, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-17 11:12:52'),
(519, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-05-17 11:28:17'),
(520, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-17 11:28:23'),
(521, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-17 11:45:06'),
(522, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-05-17 11:51:02'),
(523, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-17 11:51:03'),
(524, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-17 11:52:05'),
(525, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-05-17 11:52:19'),
(526, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-17 11:52:20'),
(527, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-05-17 12:08:17'),
(528, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-17 12:08:19'),
(529, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-17 12:09:07'),
(530, 2, 'Duplicate Invoice of the original invoice number ''40'' has been printed', 'bill', '2017-05-17 13:30:16'),
(531, 2, 'Setting has been updated from Klientscape Pvt. Ltd. to Company Name Pvt. Ltd.', 'setting', '2017-05-17 14:16:50'),
(532, 2, 'Setting has been updated from bishalnagar, ktm, nepal to company address', 'setting', '2017-05-17 14:16:56'),
(533, 2, 'Setting has been updated from 01-4425513 to company phone no.', 'setting', '2017-05-17 14:17:04'),
(534, 2, 'Setting has been updated from 663546515 to company vat no.', 'setting', '2017-05-17 14:17:13'),
(535, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-17 14:47:27'),
(536, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-17 14:47:37'),
(537, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-17 14:55:28'),
(538, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-18 11:56:53'),
(539, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-18 11:57:05'),
(540, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-18 15:26:17');
INSERT INTO `audit_log` (`id`, `created_by`, `action`, `type`, `created_at`) VALUES
(541, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-18 15:26:27'),
(542, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-18 16:36:30'),
(543, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-18 16:36:41'),
(544, 2, 'Table order KOT number 170518-1 has been send', 'order', '2017-05-18 16:37:00'),
(545, 2, 'Invoice number 41 has been printed', 'bill', '2017-05-18 16:37:20'),
(546, 2, 'Credit table order has been made for the amount of Rs. 373 on the debtor named -sugen', 'order', '2017-05-18 16:37:21'),
(547, 2, 'Table order KOT number 170518-2 has been send', 'order', '2017-05-18 16:37:29'),
(548, 2, 'Invoice number 42 has been printed', 'bill', '2017-05-18 16:37:37'),
(549, 2, 'Cash payment for table order has been made for the amount of Rs. 249', 'order', '2017-05-18 16:37:37'),
(550, 2, 'Table order KOT number 170518-3 has been send', 'order', '2017-05-18 16:37:46'),
(551, 2, 'Invoice number 43 has been printed', 'bill', '2017-05-18 16:38:02'),
(552, 2, 'Invoice number 44 has been printed', 'bill', '2017-05-18 16:38:05'),
(553, 2, 'Table ''<b>Table - 6</b>'' has been closed ', 'table', '2017-05-18 16:38:08'),
(554, 2, 'Cash payment for table order has been made for the amount of Rs. 124', 'order', '2017-05-18 16:38:10'),
(555, 2, 'Take away order KOT 170518-4 has been send', 'order', '2017-05-18 16:38:33'),
(556, 2, 'Invoice number 45 has been printed', 'bill', '2017-05-18 16:38:46'),
(557, 2, 'Cash payment for take away order has been made for the amount of Rs. 497', 'order', '2017-05-18 16:38:47'),
(558, 2, 'Take away order KOT 170518-5 has been send', 'order', '2017-05-18 16:39:07'),
(559, 2, 'Invoice number 46 has been printed', 'bill', '2017-05-18 16:39:35'),
(560, 2, 'Credit take away order has been made for the amount of Rs.373 on the debtor named -sugen', 'order', '2017-05-18 16:39:35'),
(561, 2, 'Take away order KOT 170518-6 has been send', 'order', '2017-05-18 16:40:33'),
(562, 2, 'Invoice number 47 has been printed', 'bill', '2017-05-18 16:41:26'),
(563, 2, 'Cash payment for delivery order has been made for the amount of Rs. 373', 'order', '2017-05-18 16:41:27'),
(564, 2, 'Utensils item named -Utensils Item 1 has been added', 'misc', '2017-05-22 17:42:35'),
(565, 2, 'Utensils item named -Utensils Item 2 has been added', 'misc', '2017-05-22 17:42:35'),
(566, 2, 'Utensils item named -Utensils Item 3 has been added', 'misc', '2017-05-22 17:42:35'),
(567, 2, 'Utensils item named -Utensils Item 4 has been added', 'misc', '2017-05-22 17:42:36'),
(568, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-23 11:07:09'),
(569, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-23 11:52:19'),
(570, 2, 'Take away order KOT 170523-1 has been send', 'order', '2017-05-23 12:03:12'),
(571, 2, 'Invoice number 49 has been printed', 'bill', '2017-05-23 12:05:57'),
(572, 2, 'Credit take away order has been made for the amount of Rs.124 on the debtor named -binit', 'order', '2017-05-23 12:05:57'),
(573, 2, 'Table ''<b>Table - 4</b>'' has been occupied ', 'table', '2017-05-23 12:06:28'),
(574, 2, 'Table order KOT number 170523-2 has been send', 'order', '2017-05-23 12:06:38'),
(575, 2, 'New debtor named -abhijeet'' has been created', 'debtor', '2017-05-23 12:07:57'),
(576, 2, 'Credit item wise table order has been made for the amount of Rs. 249 on the debtor named -abhijeet', 'order', '2017-05-23 12:08:14'),
(577, 2, 'Advance payment has been made for the amount of Rs. 100', 'order', '2017-05-23 12:10:30'),
(578, 2, '1 - stock item 1 has been sold', 'stock', '2017-05-23 12:11:00'),
(579, 2, '10 - stock item 2 has been sold', 'stock', '2017-05-23 12:11:01'),
(580, 2, 'Invoice number 50 has been printed', 'bill', '2017-05-23 12:11:02'),
(581, 2, 'Cash payment for table order has been made for the amount of Rs. 746', 'order', '2017-05-23 12:11:02'),
(582, 2, 'Table ''<b>Table - 4</b>'' has been closed ', 'table', '2017-05-23 12:11:03'),
(583, 2, 'Menu item has been added', 'menu', '2017-05-23 12:13:36'),
(584, 2, 'New menu category has been created named -bakery', 'menu', '2017-05-23 12:15:00'),
(585, 2, 'Table ''<b>Table - 5</b>'' has been occupied ', 'table', '2017-05-23 12:15:29'),
(586, 2, 'Duplicate Invoice of the original invoice number ''50'' has been printed', 'bill', '2017-05-23 12:19:26'),
(587, 2, 'Debtor named -abhijeet paid the amount of Rs. 249', 'debtor', '2017-05-23 12:22:00'),
(588, 2, 'Utensils item named -Item 1 has been added', 'misc', '2017-05-23 12:25:35'),
(589, 2, 'Utensils item named -Item  2 has been added', 'misc', '2017-05-23 12:25:35'),
(590, 2, 'Utensils item named -Item 3 has been added', 'misc', '2017-05-23 12:25:35'),
(591, 2, 'Product named -Stock Item 7 has been added', 'misc', '2017-05-23 12:29:50'),
(592, 2, 'Menu item has been added', 'menu', '2017-05-23 12:32:14'),
(593, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-05-23 12:38:50'),
(594, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-23 12:38:51'),
(595, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-23 12:42:57'),
(596, 2, 'Table ''<b>Table - 2</b>'' has been occupied ', 'table', '2017-05-23 12:46:09'),
(597, 2, 'New table has been created named Table - 7', 'table', '2017-05-23 12:48:29'),
(598, 2, 'New table has been created named Table - 8', 'table', '2017-05-23 12:48:33'),
(599, 2, 'New table has been created named Table - 9', 'table', '2017-05-23 12:48:35'),
(600, 2, 'New obstacle has been created named -Obstacle - 3 on the floor no. 2', 'table', '2017-05-23 12:48:51'),
(601, 2, 'New obstacle has been created named -Obstacle - 4 on the floor no. 2', 'table', '2017-05-23 12:48:55'),
(602, 2, 'New table has been created named Table - 10', 'table', '2017-05-23 12:48:57'),
(603, 2, 'New table has been created named Table - 11', 'table', '2017-05-23 12:48:58'),
(604, 2, 'New table has been created named Table - 12', 'table', '2017-05-23 12:49:02'),
(605, 2, 'New table has been created named Table - 13', 'table', '2017-05-23 12:49:03'),
(606, 2, 'Table ''<b>Table - 7</b>'' has been occupied ', 'table', '2017-05-23 12:49:41'),
(607, 2, 'Booking has been made', 'table', '2017-05-23 12:51:51'),
(608, 2, 'New menu category has been created named -cakes and icecreams', 'menu', '2017-05-23 13:05:01'),
(609, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-23 14:56:20'),
(610, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-23 15:51:03'),
(611, 2, 'Table ''<b>Table - 4</b>'' has been occupied ', 'table', '2017-05-23 15:51:21'),
(612, 2, 'Table order KOT number 170523-3 has been send', 'order', '2017-05-23 15:56:11'),
(613, 2, 'Advance payment has been made for the amount of Rs. 500', 'order', '2017-05-23 15:57:30'),
(614, 2, 'Item wise payment has been made for the amount of Rs. 124', 'order', '2017-05-23 15:58:17'),
(615, 2, '1 - stock item 1 has been sold', 'stock', '2017-05-23 15:59:14'),
(616, 2, '10 - stock item 2 has been sold', 'stock', '2017-05-23 15:59:14'),
(617, 2, 'Invoice number 51 has been printed', 'bill', '2017-05-23 15:59:15'),
(618, 2, 'Credit table order has been made for the amount of Rs. 746 on the debtor named -sugen', 'order', '2017-05-23 15:59:16'),
(619, 2, 'Table ''<b>Table - 4</b>'' has been closed ', 'table', '2017-05-23 15:59:16'),
(620, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-05-23 16:00:51'),
(621, 2, 'Table order KOT number 170523-4 has been send', 'order', '2017-05-23 16:01:09'),
(622, 2, 'Table order KOT number 170523-5 has been send', 'order', '2017-05-23 16:04:44'),
(623, 2, 'Advance payment has been made for the amount of Rs. 1000', 'order', '2017-05-23 16:05:40'),
(624, 2, 'Item wise payment has been made for the amount of Rs. 1616', 'order', '2017-05-23 16:06:49'),
(625, 2, 'Product named -Stock Item 8 has been added', 'misc', '2017-05-23 16:11:43'),
(626, 2, 'Product named -Stock Item 8 has been added', 'misc', '2017-05-23 16:11:48'),
(627, 2, '2000 stock item 8 has been purchased', 'stock', '2017-05-23 16:12:45'),
(628, 2, 'Product has been updated', 'misc', '2017-05-23 16:14:31'),
(629, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-30 11:29:32'),
(630, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-30 11:29:41'),
(631, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-30 14:57:41'),
(632, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-30 14:57:55'),
(633, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-05-31 12:41:17'),
(634, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-05-31 12:41:29'),
(635, 2, 'Table order KOT number 170531-1 has been send', 'order', '2017-05-31 12:41:49'),
(636, 2, 'Cash payment for table order has been made for the amount of Rs. 249', 'order', '2017-05-31 12:50:07'),
(637, 2, 'Table ''<b>Table - 2</b>'' has been closed ', 'table', '2017-05-31 12:50:08'),
(638, 2, 'Take away order KOT 170531-2 has been send', 'order', '2017-05-31 12:50:23'),
(639, 2, 'Cash payment for take away order has been made for the amount of Rs. 249', 'order', '2017-05-31 12:50:33'),
(640, 2, 'Take away order KOT 170531-3 has been send', 'order', '2017-05-31 12:50:50'),
(641, 2, 'Credit delivery order has been made for the amount of Rs.373 on the debtor named -sugen', 'order', '2017-05-31 12:51:03'),
(642, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-06-02 12:58:29'),
(643, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-06-02 17:02:44'),
(644, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-06-02 17:02:56'),
(645, 2, 'New setting has been added of field name = pick up service charge rate and value = 10', 'setting', '2017-06-02 17:04:27'),
(646, 2, 'Pick Up order KOT 170602-1 has been send', 'order', '2017-06-02 17:13:01'),
(647, 2, 'Cash payment for pick up order has been made for the amount of Rs. 249', 'order', '2017-06-02 17:13:29'),
(648, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-06-08 16:16:46'),
(649, 2, 'Setting has been updated from test1@gmail.com to sugentuladhar@gmail.com', 'setting', '2017-06-08 16:48:17'),
(650, 2, 'Setting has been updated from test2@gmail.com to gaurav@gmail.com', 'setting', '2017-06-08 16:48:42'),
(651, 2, 'Setting has been updated from test3@gmail.com to sugen@klientscape.com', 'setting', '2017-06-08 16:48:53'),
(652, 2, 'Setting has been updated from test2@gmail.com to gaurav@klientscape.com', 'setting', '2017-06-08 16:49:03'),
(653, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-06-08 16:49:38'),
(654, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-06-08 16:49:40'),
(655, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-06-09 11:55:00'),
(656, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-06-09 11:55:10'),
(657, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-06-09 13:35:49'),
(658, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-06-09 13:36:12'),
(659, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-06-09 13:36:41'),
(660, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-06-09 13:37:38'),
(661, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-06-09 13:37:42'),
(662, 5, '<b>Staff</b> Logged onto the system', 'user', '2017-06-09 13:37:57'),
(663, 5, '<b>Staff</b> Logged out of the system', 'user', '2017-06-09 13:38:42'),
(664, 5, '<b>Staff</b> Logged onto the system', 'user', '2017-06-09 13:38:56'),
(665, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-06-13 12:36:42'),
(666, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-06-13 12:41:18'),
(667, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-06-13 12:41:19'),
(668, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-06-13 12:43:30'),
(669, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-06-13 12:43:46'),
(670, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-06-13 12:43:47'),
(671, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-06-13 14:11:54'),
(672, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-06-14 16:20:19'),
(673, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-06-16 17:23:49'),
(674, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-06-16 17:23:59'),
(675, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-06-19 10:28:12'),
(676, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-06-19 10:28:19'),
(677, 2, 'Sales has been returned for the invoice number - 48', 'order', '2017-06-19 10:34:15'),
(678, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-06-19 14:18:23'),
(679, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-06-19 14:18:31'),
(680, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-06-19 14:37:06'),
(681, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-06-19 14:37:13'),
(682, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-06-20 17:39:55'),
(683, 2, 'Product named -Stock Item 10 has been added', 'misc', '2017-06-20 17:42:01'),
(684, 2, 'Table ''<b>Table - 4</b>'' has been occupied ', 'table', '2017-06-20 17:43:26'),
(685, 2, 'Table order KOT number 170620-1 has been send', 'order', '2017-06-20 17:43:49'),
(686, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-06-20 17:49:22'),
(687, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-06-20 17:49:23'),
(688, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-06-21 14:05:32'),
(689, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-06-21 14:10:17'),
(690, 2, 'Cash payment for table order has been made for the amount of Rs. 124', 'order', '2017-06-21 15:35:09'),
(691, 2, 'Table ''<b>Table - 4</b>'' has been closed ', 'table', '2017-06-21 15:35:10'),
(692, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-06-22 11:32:37'),
(693, 2, 'Table order KOT number 170622-1 has been send', 'order', '2017-06-22 11:32:50'),
(694, 2, 'Cash payment for table order has been made for the amount of Rs. 124', 'order', '2017-06-22 11:32:55'),
(695, 2, 'Table ''<b>Table - 5</b>'' has been closed ', 'table', '2017-06-22 11:32:55'),
(696, 2, 'Take away order KOT 170622-2 has been send', 'order', '2017-06-22 11:33:31'),
(697, 2, 'Cash payment for take away order has been made for the amount of Rs. 124', 'order', '2017-06-22 11:33:38'),
(698, 2, 'Pick Up order KOT 170622-3 has been send', 'order', '2017-06-22 11:34:34'),
(699, 2, 'Cash payment for pick up order has been made for the amount of Rs. 124', 'order', '2017-06-22 11:34:39'),
(700, 2, 'Delivery order KOT 170622-4 has been send', 'order', '2017-06-22 11:34:50'),
(701, 2, 'Cash payment for delivery order has been made for the amount of Rs. 124', 'order', '2017-06-22 11:34:55'),
(702, 2, 'Table order KOT number 170622-5 has been send', 'order', '2017-06-22 11:35:01'),
(703, 2, '2 - stock item 1 has been sold', 'stock', '2017-06-22 11:35:06'),
(704, 2, '20 - stock item 2 has been sold', 'stock', '2017-06-22 11:35:06'),
(705, 2, 'Cash payment for table order has been made for the amount of Rs. 3232', 'order', '2017-06-22 11:35:07'),
(706, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-06-22 11:35:07'),
(707, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-06-22 11:39:44'),
(708, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-06-22 11:39:45'),
(709, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-06-22 17:16:31'),
(710, 2, 'Table order KOT number 170622-6 has been send', 'order', '2017-06-22 17:16:54'),
(711, 2, 'Table order KOT number 170622-7 has been send', 'order', '2017-06-22 17:17:01'),
(712, 2, 'Table ''<b>Table - 7</b>'' has been closed ', 'table', '2017-06-22 17:17:12'),
(713, 2, 'Cash payment for table order has been made for the amount of Rs. 186', 'order', '2017-06-22 17:17:12'),
(714, 2, 'Take away order KOT 170622-8 has been send', 'order', '2017-06-22 17:18:54'),
(715, 2, 'Take away order KOT 170622-9 has been send', 'order', '2017-06-22 17:19:15'),
(716, 2, 'Take away order KOT 170622-10 has been send', 'order', '2017-06-22 17:19:23'),
(717, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-06-22 17:21:19'),
(718, 2, 'Take away order KOT 170622-11 has been send', 'order', '2017-06-22 17:31:41'),
(719, 2, 'Take away order KOT 170622-12 has been send', 'order', '2017-06-22 17:31:58'),
(720, 2, 'Take away order KOT 170622-13 has been send', 'order', '2017-06-22 17:32:01'),
(721, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-06-22 17:34:04'),
(722, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-06-22 17:34:06'),
(723, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-07-04 15:29:15'),
(724, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-04 15:29:22'),
(725, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-07-04 16:04:50'),
(726, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-04 16:05:04'),
(727, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-07-07 12:48:26'),
(728, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-07 12:48:34'),
(729, 2, 'Table order KOT number 170707-1 has been send', 'order', '2017-07-07 15:23:04'),
(730, 2, 'Cash payment for table order has been made for the amount of Rs. 186', 'order', '2017-07-07 15:23:14'),
(731, 2, 'Table order KOT number 170707-2 has been send', 'order', '2017-07-07 15:28:00'),
(732, 2, 'Credit table order has been made for the amount of Rs. 124 on the debtor named -sugen', 'order', '2017-07-07 15:28:09'),
(733, 2, 'Table order KOT number 170707-3 has been send', 'order', '2017-07-07 15:28:16'),
(734, 2, 'Cash payment for table order has been made for the amount of Rs. 249', 'order', '2017-07-07 15:28:21'),
(735, 2, 'Table order KOT number 170707-4 has been send', 'order', '2017-07-07 15:33:43'),
(736, 2, 'Cash payment for table order has been made for the amount of Rs. 124', 'order', '2017-07-07 15:33:48'),
(737, 2, 'Table order KOT number 170707-5 has been send', 'order', '2017-07-07 15:35:59'),
(738, 2, 'Cash payment for table order has been made for the amount of Rs. 249', 'order', '2017-07-07 15:36:03'),
(739, 2, 'Table order KOT number 170707-6 has been send', 'order', '2017-07-07 15:37:46'),
(740, 2, 'Table order KOT number 170707-7 has been send', 'order', '2017-07-07 15:37:46'),
(741, 2, 'Cash payment for table order has been made for the amount of Rs. 497', 'order', '2017-07-07 15:37:51'),
(742, 2, 'Table order KOT number 170707-8 has been send', 'order', '2017-07-07 15:43:27'),
(743, 2, 'Credit table order has been made for the amount of Rs. 249 on the debtor named -binit', 'order', '2017-07-07 15:43:34'),
(744, 2, 'Table order KOT number 170707-9 has been send', 'order', '2017-07-07 15:55:48'),
(745, 2, 'Cash payment for table order has been made for the amount of Rs. 124', 'order', '2017-07-07 15:55:52'),
(746, 2, 'Table order KOT number 170707-10 has been send', 'order', '2017-07-07 16:52:45'),
(747, 2, 'Table order KOT number 170707-11 has been send', 'order', '2017-07-07 17:25:07'),
(748, 2, 'Cash payment for table order has been made for the amount of Rs. 684', 'billing', '2017-07-07 17:25:14'),
(749, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-07-07 17:25:15'),
(750, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-07-07 17:27:14'),
(751, 2, 'Table order KOT number 170707-12 has been send', 'order', '2017-07-07 17:27:16'),
(752, 2, 'Cash payment for table order has been made for the amount of Rs. 124', 'billing', '2017-07-07 17:27:23'),
(753, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-07-07 17:27:24'),
(754, 2, 'Sales has been returned for the invoice number - 17-75', 'billing', '2017-07-07 17:41:27'),
(755, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-10 10:23:04'),
(756, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-10 12:02:40'),
(757, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-07-10 12:02:55'),
(758, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-07-10 12:02:57'),
(759, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-10 12:07:36'),
(760, 2, 'Table ''<b>Table - 5</b>'' has been occupied ', 'table', '2017-07-10 12:18:26'),
(761, 2, 'Table ''<b>Table - 5</b>'' has been closed ', 'table', '2017-07-10 12:25:47'),
(762, 2, 'Table ''<b>Table - 4</b>'' has been occupied ', 'table', '2017-07-10 12:28:59'),
(763, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-07-10 12:29:12'),
(764, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-10 12:29:19'),
(765, 2, 'Setting has been updated from company vat no. to 123213', 'setting', '2017-07-10 12:43:20'),
(766, 2, 'Setting has been updated from 123213 to 9', 'setting', '2017-07-10 12:45:07'),
(767, 2, 'Setting has been updated from 9 to 921212', 'setting', '2017-07-10 12:46:26'),
(768, 2, 'Setting has been updated from 9 to 9212122222222', 'setting', '2017-07-10 12:46:30'),
(769, 2, 'Setting has been updated from 9 to 92121222222222222', 'setting', '2017-07-10 12:46:32'),
(770, 2, 'Setting has been updated from 92121222222222222 to 111111', 'setting', '2017-07-10 12:47:25'),
(771, 2, 'Setting has been updated from 111111 to 1111111111', 'setting', '2017-07-10 12:49:20'),
(772, 2, 'Setting has been updated from 111111 to 1111111111111', 'setting', '2017-07-10 12:49:22'),
(773, 2, 'Setting has been updated from 1111111111111 to 111111111111111', 'setting', '2017-07-10 12:49:45'),
(774, 2, 'Setting has been updated from 111111111111111 to 11', 'setting', '2017-07-10 12:52:45'),
(775, 2, 'Setting has been updated from 11 to 123456789', 'setting', '2017-07-10 12:54:11'),
(776, 2, 'Setting has been updated from 11 to 1234567891', 'setting', '2017-07-10 12:54:20'),
(777, 2, 'Setting has been updated from 1234567891 to 12345678', 'setting', '2017-07-10 12:54:50'),
(778, 2, 'Setting has been updated from 12345678 to 123456781', 'setting', '2017-07-10 12:56:03'),
(779, 2, 'Setting has been updated from 123456781 to 1234567811', 'setting', '2017-07-10 12:57:11'),
(780, 2, 'Setting has been updated from 1234567811 to 12345678', 'setting', '2017-07-10 13:06:08'),
(781, 2, 'Setting has been updated from 1234567811 to 1111111111', 'setting', '2017-07-10 13:06:14'),
(782, 2, 'Setting has been updated from 1111111111 to 111111111', 'setting', '2017-07-10 13:08:33'),
(783, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-07-10 13:52:14'),
(784, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-10 13:52:39'),
(785, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-07-10 14:05:02'),
(786, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-10 14:05:09'),
(787, 2, 'Sales has been returned for the invoice number - 17-74', 'billing', '2017-07-10 14:14:29'),
(788, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-07-10 16:27:37'),
(789, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-10 16:27:44'),
(790, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-07-10 16:28:08'),
(791, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-10 16:36:11'),
(792, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-07-10 16:36:33'),
(793, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-10 16:39:15'),
(794, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-07-10 17:13:40'),
(795, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-07-10 17:13:41'),
(796, 5, '<b>Staff</b> Logged onto the system', 'user', '2017-07-10 17:13:47'),
(797, 5, '<b>Staff</b> Logged out of the system', 'user', '2017-07-10 17:14:04'),
(798, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-11 12:35:53'),
(799, 2, 'Table order KOT number 170711-1 has been send', 'order', '2017-07-11 13:40:56'),
(800, 2, 'Table order KOT number 170711-2 has been send', 'order', '2017-07-11 13:57:10'),
(801, 2, 'New setting has been added of field name = foc password and value = foc', 'setting', '2017-07-11 14:04:19'),
(802, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-07-11 14:05:33'),
(803, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-11 14:05:40'),
(804, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-07-11 16:03:22'),
(805, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-11 16:03:38'),
(806, 2, 'Table order KOT number 170711-3 has been send', 'order', '2017-07-11 16:30:17'),
(807, 2, 'New table has been created named Table - 14', 'table', '2017-07-11 17:08:17'),
(808, 2, 'New table has been created named Table - 15', 'table', '2017-07-11 17:17:47'),
(809, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-07-11 17:53:31'),
(810, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-11 17:53:38'),
(811, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-12 10:19:52'),
(812, 2, 'Sales has been returned for the invoice number - 17-73', 'billing', '2017-07-12 11:30:27'),
(813, 2, 'Sales has been returned for the invoice number - 17-72', 'billing', '2017-07-12 11:31:47'),
(814, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-07-12 12:27:43'),
(815, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-12 12:42:10'),
(816, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-07-12 13:54:26'),
(817, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-07-12 17:33:05'),
(818, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-12 17:36:42'),
(819, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-07-12 17:58:49'),
(820, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-14 12:48:04'),
(822, 2, 'Table ''<b>Table - 7</b>'' has been occupied ', 'table', '2017-07-17 12:31:32'),
(823, 2, 'New table has been created named Table - 16', 'table', '2017-07-17 12:40:17'),
(824, 2, 'New table has been created named Table - 17', 'table', '2017-07-17 12:43:55'),
(825, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-07-17 12:44:11'),
(826, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-07-17 12:44:11'),
(827, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-17 12:49:11'),
(828, 2, 'New table has been created named Table - 18', 'table', '2017-07-17 13:56:55'),
(829, 2, 'Booking has been made', 'table', '2017-07-17 15:02:46'),
(830, 2, 'Booking has been made', 'table', '2017-07-17 15:06:09'),
(831, 2, 'New debtor named -Sushov'' has been created', 'debtor', '2017-07-17 17:24:40'),
(832, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-18 15:27:45'),
(833, 2, 'Table ''<b>Table - 15</b>'' has been occupied ', 'table', '2017-07-18 15:27:58'),
(834, 2, 'Table order KOT number 170718-1 has been send', 'order', '2017-07-18 15:28:03'),
(835, 2, '10 - stock item 7 has been sold', 'stock', '2017-07-18 15:28:24'),
(836, 2, '2 - stock item 6 has been sold', 'stock', '2017-07-18 15:28:24'),
(837, 2, '50 - stock item 5 has been sold', 'stock', '2017-07-18 15:28:24'),
(838, 2, 'Cash payment for table order has been made for the amount of Rs. 876', 'billing', '2017-07-18 15:28:28'),
(839, 2, 'Table ''<b>Table - 15</b>'' has been closed ', 'table', '2017-07-18 15:28:29'),
(840, 2, 'Menu item has been added', 'menu', '2017-07-18 16:29:54'),
(841, 2, 'FOC has been made', 'billing', '2017-07-18 17:00:23'),
(842, 2, 'Table ''<b>Table - 4</b>'' has been closed ', 'table', '2017-07-18 17:00:42'),
(843, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-19 10:42:19'),
(844, 2, 'Table ''<b>Table - 4</b>'' has been occupied ', 'table', '2017-07-19 10:42:39'),
(845, 2, 'Table order KOT number 170719-1 has been send', 'order', '2017-07-19 10:43:01'),
(846, 2, 'Table order KOT number 170719-2 has been send', 'order', '2017-07-19 10:43:18'),
(847, 2, '10 - stock item 7 has been sold', 'stock', '2017-07-19 10:44:03'),
(848, 2, '2 - stock item 6 has been sold', 'stock', '2017-07-19 10:44:04'),
(849, 2, '50 - stock item 5 has been sold', 'stock', '2017-07-19 10:44:04'),
(850, 2, 'Cash payment for table order has been made for the amount of Rs. 1591', 'billing', '2017-07-19 10:44:06'),
(851, 2, 'Table ''<b>Table - 4</b>'' has been closed ', 'table', '2017-07-19 10:44:19'),
(852, 2, 'New menu category has been created named -test', 'menu', '2017-07-19 10:45:12'),
(853, 2, 'Updated menu category', 'menu', '2017-07-19 10:45:18'),
(854, 2, '50 stock item 1 has been purchased', 'stock', '2017-07-19 10:46:08'),
(855, 2, 'Utensils item named -Test has been added', 'misc', '2017-07-19 10:48:55'),
(856, 2, 'Table ''<b>Table - 4</b>'' has been occupied ', 'table', '2017-07-19 17:12:08'),
(857, 2, 'Table order KOT number 170719-3 has been send', 'order', '2017-07-19 17:12:35'),
(858, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-20 10:10:22'),
(859, 2, 'New menu category has been created named -testing 1', 'menu', '2017-07-20 12:39:14'),
(860, 2, 'New menu category has been created named -testing 2', 'menu', '2017-07-20 12:39:23'),
(861, 2, 'New menu category has been created named -testing 3', 'menu', '2017-07-20 12:39:31'),
(862, 2, 'New menu category has been created named -testing 4', 'menu', '2017-07-20 12:39:40'),
(863, 2, 'Table order KOT number 170720-1 has been send', 'order', '2017-07-20 17:51:39'),
(864, 2, 'Table order KOT number 170720-2 has been send', 'order', '2017-07-20 17:51:57'),
(865, 2, 'Table order KOT number 170720-3 has been send', 'order', '2017-07-20 17:52:00'),
(866, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-07-21 10:55:47'),
(867, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-21 10:55:54'),
(868, 2, 'Table order KOT number 170721-1 has been send', 'order', '2017-07-21 14:29:54'),
(869, 2, 'Table order KOT number 170721-2 has been send', 'order', '2017-07-21 14:30:43'),
(870, 2, '1 - stock item 1 has been sold', 'stock', '2017-07-21 15:10:56'),
(871, 2, '10 - stock item 2 has been sold', 'stock', '2017-07-21 15:10:56'),
(872, 2, 'Cash payment for table order has been made for the amount of Rs. 1535', 'billing', '2017-07-21 15:10:59'),
(873, 2, 'Table order KOT number 170721-3 has been send', 'order', '2017-07-21 15:11:11'),
(874, 2, 'Table order KOT number 170721-4 has been send', 'order', '2017-07-21 15:22:46'),
(875, 2, '1 - stock item 1 has been sold', 'stock', '2017-07-21 17:18:41'),
(876, 2, '10 - stock item 2 has been sold', 'stock', '2017-07-21 17:18:41'),
(877, 2, 'Cash payment for table order has been made for the amount of Rs. 704', 'billing', '2017-07-21 17:18:42'),
(878, 2, 'Table order KOT number 170721-5 has been send', 'order', '2017-07-21 17:19:25'),
(879, 2, '1 - stock item 1 has been sold', 'stock', '2017-07-21 17:24:42'),
(880, 2, '10 - stock item 2 has been sold', 'stock', '2017-07-21 17:24:42'),
(881, 2, 'Cash payment for table order has been made for the amount of Rs. 758', 'billing', '2017-07-21 17:24:43'),
(882, 2, 'Table order KOT number 170721-6 has been send', 'order', '2017-07-21 17:25:51'),
(883, 2, '1 - stock item 1 has been sold', 'stock', '2017-07-21 17:26:04'),
(884, 2, '10 - stock item 2 has been sold', 'stock', '2017-07-21 17:26:04'),
(885, 2, 'Cash payment for table order has been made for the amount of Rs. 634', 'billing', '2017-07-21 17:26:05'),
(886, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-24 10:04:05'),
(887, 2, 'Table order KOT number 170724-1 has been send', 'order', '2017-07-24 12:35:48'),
(888, 2, 'Table order KOT number 170724-2 has been send', 'order', '2017-07-24 13:48:37'),
(889, 2, '2 - stock item 1 has been sold', 'stock', '2017-07-24 15:17:36'),
(890, 2, '20 - stock item 2 has been sold', 'stock', '2017-07-24 15:17:36'),
(891, 2, 'Cash payment for table order has been made for the amount of Rs. 1444', 'billing', '2017-07-24 15:17:37'),
(892, 2, 'Table order KOT number 170724-3 has been send', 'order', '2017-07-24 15:19:52'),
(893, 2, '2 - stock item 1 has been sold', 'stock', '2017-07-24 15:21:25'),
(894, 2, '20 - stock item 2 has been sold', 'stock', '2017-07-24 15:21:25'),
(895, 2, 'Cash payment for table order has been made for the amount of Rs. 1444', 'billing', '2017-07-24 15:21:26'),
(896, 2, 'Table order KOT number 170724-4 has been send', 'order', '2017-07-24 15:30:35'),
(897, 2, '1 - stock item 1 has been sold', 'stock', '2017-07-24 15:31:25'),
(898, 2, '10 - stock item 2 has been sold', 'stock', '2017-07-24 15:31:25'),
(899, 2, 'Cash payment for table order has been made for the amount of Rs. 764', 'billing', '2017-07-24 15:31:26'),
(900, 2, 'Table order KOT number 170724-5 has been send', 'order', '2017-07-24 15:36:13'),
(901, 2, 'Table order KOT number 170724-6 has been send', 'order', '2017-07-24 15:47:33'),
(902, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-25 10:08:16'),
(903, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-07-25 10:10:11'),
(904, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-25 10:10:18'),
(905, 2, 'Table order KOT number 170725-1 has been send', 'order', '2017-07-25 14:35:24'),
(906, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-07-25 16:33:20'),
(907, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-25 16:33:32'),
(908, 2, 'Table ''<b>Table - 14</b>'' has been occupied ', 'table', '2017-07-25 16:33:37'),
(909, 2, 'Table ''<b>Table - 2</b>'' has been occupied ', 'table', '2017-07-25 16:33:42'),
(910, 2, 'Cash payment for table order has been made for the amount of Rs. 1659', 'billing', '2017-07-25 17:05:57'),
(911, 2, 'Table order KOT number 170725-2 has been send', 'order', '2017-07-25 17:06:24'),
(912, 2, 'Table order KOT number 170725-3 has been send', 'order', '2017-07-25 17:06:34'),
(913, 2, '1 - stock item 1 has been sold', 'stock', '2017-07-25 17:16:16'),
(914, 2, '10 - stock item 2 has been sold', 'stock', '2017-07-25 17:16:16'),
(915, 2, 'Cash payment for table order has been made for the amount of Rs. 1462', 'billing', '2017-07-25 17:16:17'),
(916, 2, 'Table order KOT number 170725-4 has been send', 'order', '2017-07-25 17:17:51'),
(917, 2, 'Table order KOT number 170725-5 has been send', 'order', '2017-07-25 17:18:06'),
(918, 2, '1 - stock item 1 has been sold', 'stock', '2017-07-25 17:29:48'),
(919, 2, '10 - stock item 2 has been sold', 'stock', '2017-07-25 17:29:48'),
(920, 2, 'Cash payment for table order has been made for the amount of Rs. 1535', 'billing', '2017-07-25 17:29:49'),
(921, 2, 'Table order KOT number 170725-6 has been send', 'order', '2017-07-25 17:30:30'),
(922, 2, 'Table order KOT number 170725-7 has been send', 'order', '2017-07-25 17:30:39'),
(923, 2, '1 - stock item 1 has been sold', 'stock', '2017-07-25 17:30:53'),
(924, 2, '10 - stock item 2 has been sold', 'stock', '2017-07-25 17:30:53'),
(925, 2, 'Cash payment for table order has been made for the amount of Rs. 1311', 'billing', '2017-07-25 17:30:53'),
(926, 2, 'Table order KOT number 170725-8 has been send', 'order', '2017-07-25 17:31:21'),
(927, 2, 'Table order KOT number 170725-9 has been send', 'order', '2017-07-25 17:31:29'),
(928, 2, '1 - stock item 1 has been sold', 'stock', '2017-07-25 17:31:59'),
(929, 2, '10 - stock item 2 has been sold', 'stock', '2017-07-25 17:31:59'),
(930, 2, 'Cash payment for table order has been made for the amount of Rs. 1261', 'billing', '2017-07-25 17:32:00'),
(931, 2, 'Table ''<b>Table - 2</b>'' has been closed ', 'table', '2017-07-25 18:04:44'),
(932, 2, 'Table ''<b>Table - 14</b>'' has been closed ', 'table', '2017-07-25 18:04:47'),
(933, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-26 10:29:27'),
(934, 2, 'Table ''<b>Table - 7</b>'' has been closed ', 'table', '2017-07-26 11:05:42'),
(935, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-07-26 11:15:24'),
(936, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-07-26 11:15:31'),
(937, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-07-26 11:15:54'),
(938, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-07-26 11:16:09'),
(939, 2, 'Table ''<b>Table - 15</b>'' has been occupied ', 'table', '2017-07-26 11:31:54'),
(940, 2, 'Table ''<b>Table - 6</b>'' has been occupied ', 'table', '2017-07-26 11:31:58'),
(941, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-07-26 11:41:42'),
(942, 2, 'Table ''<b>Table - 14</b>'' has been occupied ', 'table', '2017-07-26 11:41:46'),
(943, 2, 'Table ''<b>Table - 2</b>'' has been occupied ', 'table', '2017-07-26 11:41:50'),
(944, 2, 'Table ''<b>Table - 3</b>'' has been occupied ', 'table', '2017-07-26 11:41:54'),
(945, 2, 'Table ''<b>Table - 5</b>'' has been occupied ', 'table', '2017-07-26 11:41:59'),
(946, 2, 'Table ''<b>Table - 17</b>'' has been occupied ', 'table', '2017-07-26 11:42:05'),
(947, 2, 'Table ''<b>Table - 7</b>'' has been occupied ', 'table', '2017-07-26 11:42:11'),
(948, 2, 'Table ''<b>Table - 8</b>'' has been occupied ', 'table', '2017-07-26 11:42:16'),
(949, 2, 'Table ''<b>Table - 9</b>'' has been occupied ', 'table', '2017-07-26 11:42:21'),
(950, 2, 'Table ''<b>Table - 10</b>'' has been occupied ', 'table', '2017-07-26 11:42:26'),
(951, 2, 'Table ''<b>Table - 16</b>'' has been occupied ', 'table', '2017-07-26 11:42:31'),
(952, 2, 'Table ''<b>Table - 11</b>'' has been occupied ', 'table', '2017-07-26 11:42:37'),
(953, 2, 'Table ''<b>Table - 12</b>'' has been occupied ', 'table', '2017-07-26 11:42:42'),
(954, 2, 'Table ''<b>Table - 13</b>'' has been occupied ', 'table', '2017-07-26 11:42:46'),
(955, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-26 13:09:44'),
(956, 2, 'Table order KOT number 170726-1 has been send', 'order', '2017-07-26 14:33:44'),
(957, 2, 'Table order KOT number 170726-2 has been send', 'order', '2017-07-26 14:33:55'),
(958, 2, 'Table order KOT number 170726-3 has been send', 'order', '2017-07-26 14:34:04'),
(959, 2, 'Take away order KOT 170726-4 has been send', 'order', '2017-07-26 14:49:41'),
(960, 2, '1 - stock item 1 has been sold', 'stock', '2017-07-26 14:51:18'),
(961, 2, '10 - stock item 2 has been sold', 'stock', '2017-07-26 14:51:18'),
(962, 2, 'Cash payment for take away order has been made for the amount of Rs. 658', 'billing', '2017-07-26 14:51:19'),
(963, 2, 'Take away order KOT 170726-5 has been send', 'order', '2017-07-26 14:52:25'),
(964, 2, 'Cash payment for take away order has been made for the amount of Rs. 444', 'billing', '2017-07-26 14:52:56'),
(965, 2, 'Pick Up order KOT 170726-6 has been send', 'order', '2017-07-26 14:53:28'),
(966, 2, '1 - stock item 1 has been sold', 'stock', '2017-07-26 14:53:53'),
(967, 2, '10 - stock item 2 has been sold', 'stock', '2017-07-26 14:53:53'),
(968, 2, 'Cash payment for pick up order has been made for the amount of Rs. 658', 'billing', '2017-07-26 14:53:53'),
(969, 2, 'Pick Up order KOT 170726-7 has been send', 'order', '2017-07-26 14:54:50'),
(970, 2, 'Cash payment for pick up order has been made for the amount of Rs. 800', 'billing', '2017-07-26 14:55:34'),
(971, 2, 'Delivery order KOT 170726-8 has been send', 'order', '2017-07-26 15:25:32'),
(972, 2, '1 - stock item 1 has been sold', 'stock', '2017-07-26 15:26:00'),
(973, 2, '10 - stock item 2 has been sold', 'stock', '2017-07-26 15:26:01'),
(974, 2, 'Cash payment for delivery order has been made for the amount of Rs. 658', 'billing', '2017-07-26 15:26:03'),
(975, 2, 'Delivery order KOT 170726-9 has been send', 'order', '2017-07-26 15:26:41'),
(976, 2, 'Cash payment for delivery order has been made for the amount of Rs. 308', 'billing', '2017-07-26 15:27:03'),
(977, 2, 'Table ''<b>Table - 17</b>'' has been closed ', 'table', '2017-07-26 15:31:37'),
(978, 2, 'Table ''<b>Table - 7</b>'' has been closed ', 'table', '2017-07-26 15:31:40'),
(979, 2, 'Table ''<b>Table - 8</b>'' has been closed ', 'table', '2017-07-26 15:31:44'),
(980, 2, 'Table ''<b>Table - 9</b>'' has been closed ', 'table', '2017-07-26 15:31:46'),
(981, 2, 'Table ''<b>Table - 11</b>'' has been closed ', 'table', '2017-07-26 15:31:49'),
(982, 2, 'Table ''<b>Table - 13</b>'' has been closed ', 'table', '2017-07-26 15:31:51'),
(983, 2, 'Table ''<b>Table - 16</b>'' has been closed ', 'table', '2017-07-26 15:31:54'),
(984, 2, 'Table ''<b>Table - 10</b>'' has been closed ', 'table', '2017-07-26 15:31:57'),
(985, 2, 'Table ''<b>Table - 12</b>'' has been closed ', 'table', '2017-07-26 15:32:00'),
(986, 2, 'Table ''<b>Table - 6</b>'' has been closed ', 'table', '2017-07-26 15:32:07'),
(987, 2, 'Table ''<b>Table - 5</b>'' has been closed ', 'table', '2017-07-26 15:32:09'),
(988, 2, 'Table ''<b>Table - 3</b>'' has been closed ', 'table', '2017-07-26 15:32:12'),
(989, 2, 'Cash payment for table order has been made for the amount of Rs. 932', 'billing', '2017-07-26 15:36:08'),
(990, 2, 'Table ''<b>Table - 4</b>'' has been closed ', 'table', '2017-07-26 15:36:08'),
(991, 2, 'Table ''<b>Table - 4</b>'' has been occupied ', 'table', '2017-07-26 15:36:12'),
(992, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-07-26 15:36:18'),
(993, 2, 'Table ''<b>Table - 15</b>'' has been occupied ', 'table', '2017-07-26 15:36:26'),
(994, 2, 'Table order KOT number 170726-10 has been send', 'order', '2017-07-26 15:36:35'),
(995, 2, 'Table order KOT number 170726-11 has been send', 'order', '2017-07-26 15:36:45'),
(996, 2, 'Table order KOT number 170726-12 has been send', 'order', '2017-07-26 15:36:59'),
(997, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-07-26 15:48:55'),
(998, 2, 'Table order KOT number 170726-13 has been send', 'order', '2017-07-26 15:49:14'),
(999, 2, 'Table order KOT number 170726-14 has been send', 'order', '2017-07-26 15:49:17'),
(1000, 2, 'Item wise payment has been made for the amount of Rs. 373', 'billing', '2017-07-26 15:49:23'),
(1001, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-07-26 16:31:51'),
(1002, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-07-26 16:34:34'),
(1003, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-07-26 16:36:02'),
(1004, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-27 10:11:24'),
(1005, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-07-27 10:11:56'),
(1006, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-07-27 10:11:57'),
(1007, 5, '<b>Staff</b> Logged onto the system', 'user', '2017-07-27 10:12:06'),
(1008, 5, '2 - stock item 1 has been sold', 'stock', '2017-07-27 10:25:13'),
(1009, 5, '20 - stock item 2 has been sold', 'stock', '2017-07-27 10:25:13'),
(1010, 5, 'Cash payment for table order has been made for the amount of Rs. 1813', 'billing', '2017-07-27 10:25:14'),
(1011, 5, 'Table ''<b>Table - 4</b>'' has been closed ', 'table', '2017-07-27 10:25:14'),
(1012, 5, '<b>Staff</b> Logged out of the system', 'user', '2017-07-27 10:25:37'),
(1013, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-07-27 10:27:28'),
(1014, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-27 10:27:36'),
(1015, 2, 'Table ''<b>Table - 4</b>'' has been occupied ', 'table', '2017-07-27 10:27:42'),
(1016, 2, 'Table order KOT number 170727-1 has been send', 'order', '2017-07-27 10:27:52'),
(1017, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-07-27 11:26:23'),
(1018, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-27 11:26:38'),
(1019, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-31 10:11:00'),
(1020, 2, 'Cash payment for table order has been made for the amount of Rs. 845', 'billing', '2017-07-31 11:08:32'),
(1021, 2, 'Table ''<b>Table - 4</b>'' has been closed ', 'table', '2017-07-31 11:08:32'),
(1022, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-07-31 11:13:38'),
(1023, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-07-31 11:13:40'),
(1024, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-07-31 11:14:04'),
(1025, 2, 'Floor has been added', 'table', '2017-07-31 11:14:52'),
(1026, 2, 'New table has been created named Table - 19', 'table', '2017-07-31 11:16:30'),
(1027, 2, 'Table ''<b>Table - 19</b>'' has been occupied ', 'table', '2017-07-31 11:18:15'),
(1028, 2, 'Table order KOT number 170731-1 has been send', 'order', '2017-07-31 11:19:36'),
(1029, 2, 'Item wise payment has been made for the amount of Rs. 224', 'billing', '2017-07-31 11:22:48'),
(1030, 2, 'Sales has been returned for the invoice number - 18-18', 'billing', '2017-07-31 11:28:01'),
(1031, 2, 'Product named -Stock Item 20 Ml has been added', 'misc', '2017-07-31 11:33:07'),
(1032, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-07-31 11:50:02'),
(1033, 5, '<b>Staff</b> Logged onto the system', 'user', '2017-08-02 17:21:13'),
(1034, 5, '<b>Staff</b> Logged out of the system', 'user', '2017-08-02 17:21:35'),
(1035, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-08-02 17:21:42'),
(1036, 2, 'Cash payment for table order has been made for the amount of Rs. 814', 'billing', '2017-08-02 17:21:57'),
(1037, 2, 'Table ''<b>Table - 19</b>'' has been closed ', 'table', '2017-08-02 17:21:57'),
(1038, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-08-02 17:22:13'),
(1039, 5, '<b>Staff</b> Logged onto the system', 'user', '2017-08-02 17:27:03'),
(1040, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-08-03 10:14:41'),
(1041, 2, 'Table ''<b>Table - 14</b>'' has been occupied ', 'table', '2017-08-03 12:58:53'),
(1042, 2, 'Table order KOT number 170803-1 has been send', 'order', '2017-08-03 12:59:01'),
(1043, 2, 'Item wise payment has been made for the amount of Rs. 213', 'billing', '2017-08-03 13:05:04'),
(1044, 2, 'Cash payment for table order has been made for the amount of Rs. 461', 'billing', '2017-08-03 13:05:53'),
(1045, 2, 'Table ''<b>Table - 14</b>'' has been closed ', 'table', '2017-08-03 13:05:53'),
(1046, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-08-11 10:42:59'),
(1047, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-08-11 10:47:48'),
(1048, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-08-11 10:47:58'),
(1049, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-08-11 10:53:08'),
(1050, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-08-11 10:53:22'),
(1051, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-08-23 12:44:11'),
(1052, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-08-23 12:44:23'),
(1053, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-08-23 15:22:27'),
(1054, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-08-30 12:16:23'),
(1055, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-08-30 14:24:39'),
(1056, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-08-30 14:24:40'),
(1057, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-08-30 14:25:31'),
(1058, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-09-04 13:25:11'),
(1059, 2, 'New table has been created named Table - 20', 'table', '2017-09-04 13:25:52'),
(1060, 2, 'Table order KOT number 170904-1 has been send', 'order', '2017-09-04 13:26:12'),
(1061, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-09-05 17:15:41'),
(1062, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-09-06 16:11:28'),
(1063, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-09-13 10:42:54'),
(1064, 2, 'Changed password of user -Administrator''administrator''', 'user', '2017-09-13 10:43:14'),
(1065, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-09-13 10:43:26'),
(1066, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-09-13 10:43:27'),
(1067, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-09-13 10:43:36'),
(1068, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-09-13 10:45:14'),
(1069, 2, 'Tip amount 100 has been distributed', 'tip', '2017-09-13 10:58:27'),
(1070, 2, 'New table has been created named Table - 21', 'table', '2017-09-13 11:01:34'),
(1071, 2, 'New obstacle has been created named -Obstacle - 5 on the floor no. 1', 'table', '2017-09-13 11:01:40'),
(1072, 2, 'Table ''<b>Table - 15</b>'' has been occupied ', 'table', '2017-09-13 11:01:47'),
(1073, 2, 'Table order KOT number 170913-1 has been send', 'order', '2017-09-13 11:01:59'),
(1074, 2, 'Item wise payment has been made for the amount of Rs. 224', 'billing', '2017-09-13 11:02:45'),
(1075, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-09-13 11:09:15'),
(1076, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-09-13 15:51:37'),
(1077, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-09-13 15:52:21'),
(1078, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-09-13 15:52:29'),
(1079, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-09-13 15:52:32'),
(1080, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-09-13 15:53:14'),
(1081, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-09-26 12:38:37'),
(1082, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-10-16 15:38:17'),
(1083, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-10-30 12:30:00'),
(1084, 2, 'Cash payment for table order has been made for the amount of Rs. 566', 'billing', '2017-10-30 12:30:31'),
(1085, 2, 'Table ''<b>Table - 15</b>'' has been closed ', 'table', '2017-10-30 12:30:32'),
(1086, 2, 'Cash payment for table order has been made for the amount of Rs. 665', 'billing', '2017-10-30 12:30:46'),
(1087, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-10-30 12:30:47'),
(1088, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-10-30 12:54:10');
INSERT INTO `audit_log` (`id`, `created_by`, `action`, `type`, `created_at`) VALUES
(1089, 2, 'Table order KOT number 171030-1 has been send', 'order', '2017-10-30 12:54:17'),
(1090, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-11-02 11:56:27'),
(1091, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-11-10 16:08:51'),
(1092, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-11-22 13:21:49'),
(1093, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-11-22 13:21:57'),
(1094, 2, 'Retail order KOT 171122-1 has been send', 'order', '2017-11-22 13:58:15'),
(1095, 2, 'Retail order KOT 171122-2 has been send', 'order', '2017-11-22 13:59:35'),
(1096, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-11-22 14:04:39'),
(1097, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-11-22 14:04:46'),
(1098, 2, 'Retail order KOT 171122-3 has been send', 'order', '2017-11-22 14:05:27'),
(1099, 2, 'Cash payment for retail order has been made for the amount of Rs. 311', 'billing', '2017-11-22 14:08:42'),
(1100, 2, 'Cash payment for table order has been made for the amount of Rs. 472', 'billing', '2017-11-22 14:15:31'),
(1101, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-11-22 14:15:31'),
(1102, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-04 12:36:50'),
(1103, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2017-12-04 12:38:11'),
(1104, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2017-12-04 12:40:41'),
(1105, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-04 17:06:58'),
(1106, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-05 11:40:34'),
(1107, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-05 12:21:53'),
(1108, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-05 12:21:59'),
(1109, 2, 'Table ''<b>Table - 15</b>'' has been occupied ', 'table', '2017-12-05 15:07:42'),
(1110, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-05 16:11:34'),
(1111, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-06 10:33:01'),
(1112, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-06 11:07:35'),
(1113, 2, 'Table order KOT number 171206-1 has been send', 'order', '2017-12-06 14:17:34'),
(1114, 2, 'Take away order KOT 171206-2 has been send', 'order', '2017-12-06 14:32:53'),
(1115, 2, 'Cash payment for take away order has been made for the amount of Rs. 249', 'billing', '2017-12-06 14:33:08'),
(1116, 2, 'Take away order KOT 171206-3 has been send', 'order', '2017-12-06 14:33:18'),
(1117, 2, 'Cash payment for take away order has been made for the amount of Rs. 249', 'billing', '2017-12-06 14:33:24'),
(1118, 2, 'Take away order KOT 171206-4 has been send', 'order', '2017-12-06 14:34:44'),
(1119, 2, 'Cash payment for take away order has been made for the amount of Rs. 249', 'billing', '2017-12-06 14:34:49'),
(1120, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-06 14:42:31'),
(1121, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-06 14:42:38'),
(1122, 2, 'Cash payment for table order has been made for the amount of Rs. 566', 'billing', '2017-12-06 14:44:10'),
(1123, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-06 14:44:10'),
(1124, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-06 15:34:32'),
(1125, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-06 15:34:39'),
(1126, 2, 'Table order KOT number 171206-5 has been send', 'order', '2017-12-06 15:49:06'),
(1127, 2, 'Table order KOT number 171206-6 has been send', 'order', '2017-12-06 15:54:09'),
(1128, 2, 'Credit table order has been made for the amount of Rs. 1380 on the debtor named -sugen', 'billing', '2017-12-06 16:05:08'),
(1129, 2, 'Table ''<b>Table - 15</b>'' has been closed ', 'table', '2017-12-06 16:05:09'),
(1130, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-06 17:09:46'),
(1131, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-08 10:36:33'),
(1132, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-08 10:36:38'),
(1133, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-08 10:36:40'),
(1134, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-08 10:37:40'),
(1135, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-08 10:38:01'),
(1136, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-08 10:38:02'),
(1137, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-08 10:38:12'),
(1138, 2, 'Table order KOT number 171208-1 has been send', 'order', '2017-12-08 12:39:10'),
(1139, 2, 'Cash payment for table order has been made for the amount of Rs. 317', 'billing', '2017-12-08 12:39:57'),
(1140, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-08 12:39:57'),
(1141, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-08 12:50:07'),
(1142, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-08 12:50:33'),
(1143, 2, 'Table ''<b>Table - 4</b>'' has been occupied ', 'table', '2017-12-08 13:10:49'),
(1144, 2, 'Table ''<b>Table - 4</b>'' has been closed ', 'table', '2017-12-08 13:11:06'),
(1145, 2, 'Updated user detail of -Administrator''administrator'' from ''1'' to ''0''', 'user', '2017-12-08 13:14:13'),
(1146, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-08 13:15:04'),
(1147, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-08 13:15:05'),
(1148, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-08 13:15:15'),
(1149, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-08 17:06:32'),
(1150, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-08 17:06:43'),
(1151, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-08 17:52:45'),
(1152, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-08 17:52:53'),
(1153, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-11 10:30:06'),
(1154, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-11 10:47:55'),
(1155, 2, 'Setting has been updated from NPR to usd', 'setting', '2017-12-11 11:48:14'),
(1156, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-11 11:52:30'),
(1157, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-11 11:52:32'),
(1158, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-11 11:54:00'),
(1159, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-11 11:54:06'),
(1160, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-11 11:57:38'),
(1161, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-11 11:58:26'),
(1162, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-11 11:59:18'),
(1163, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-11 12:00:22'),
(1164, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-11 12:01:28'),
(1165, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-11 12:02:20'),
(1166, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-11 12:02:39'),
(1167, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-11 12:03:06'),
(1168, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-11 12:04:38'),
(1169, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-11 12:04:44'),
(1170, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-11 12:05:34'),
(1171, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-11 12:05:41'),
(1172, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-11 12:11:28'),
(1173, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-11 12:11:28'),
(1174, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-11 12:11:35'),
(1175, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-11 12:41:28'),
(1176, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-11 12:41:29'),
(1177, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-11 12:42:23'),
(1178, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-11 12:42:32'),
(1179, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-11 12:56:33'),
(1180, 2, 'Setting has been updated from usd to npr', 'setting', '2017-12-11 13:06:12'),
(1181, 2, 'Table order KOT number 171211-1 has been send', 'order', '2017-12-11 13:09:57'),
(1182, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-12 10:40:53'),
(1183, 2, 'Table named ''Table - 18'' has been deleted', 'table', '2017-12-12 12:12:12'),
(1184, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-12 12:20:12'),
(1185, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-12 12:20:19'),
(1186, 2, 'Booking has been made', 'table', '2017-12-12 12:21:15'),
(1187, 2, 'Booking has been made', 'table', '2017-12-12 12:21:33'),
(1188, 2, 'Booking has been made', 'table', '2017-12-12 12:23:30'),
(1189, 2, 'Table ''<b>Table - 17</b>'' has been occupied ', 'table', '2017-12-12 12:35:29'),
(1190, 2, 'Table ''<b>Table - 17</b>'' has been closed ', 'table', '2017-12-12 12:35:38'),
(1191, 2, 'Table ''<b>Table - 15</b>'' has been occupied ', 'table', '2017-12-12 12:40:16'),
(1192, 2, 'Table ''<b>Table - 15</b>'' has been closed ', 'table', '2017-12-12 12:40:50'),
(1193, 2, 'Table ''<b>Table - 15</b>'' has been occupied ', 'table', '2017-12-12 13:04:53'),
(1194, 2, 'Table ''<b>Table - 15</b>'' has been closed ', 'table', '2017-12-12 13:05:04'),
(1195, 2, 'Table ''<b>Table - 21</b>'' has been occupied ', 'table', '2017-12-12 13:05:08'),
(1196, 2, 'Table order KOT number 171212-1 has been send', 'order', '2017-12-12 13:05:13'),
(1197, 2, 'Occupancy has been moved to the table ''<b>Table - 15</b>''', 'table', '2017-12-12 13:05:26'),
(1198, 2, 'Occupancy has been moved to the table ''<b>Table - 5</b>''', 'table', '2017-12-12 13:06:22'),
(1199, 2, 'Occupancy has been moved to the table ''<b>Table - 21</b>''', 'table', '2017-12-12 13:06:38'),
(1200, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-12 14:50:38'),
(1201, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-12 15:23:39'),
(1202, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-12 15:41:33'),
(1203, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-12 15:41:41'),
(1204, 2, 'Setting has been updated from 13 to -1', 'setting', '2017-12-12 15:46:25'),
(1205, 2, 'Setting has been updated from -1 to 13', 'setting', '2017-12-12 15:48:33'),
(1206, 2, 'Setting has been updated from -1 to 1', 'setting', '2017-12-12 15:48:40'),
(1207, 2, 'Setting has been updated from -1 to 13', 'setting', '2017-12-12 15:48:42'),
(1208, 2, 'Setting has been updated from 10 to 10sadfadsf', 'setting', '2017-12-12 15:51:01'),
(1209, 2, 'Setting has been updated from 10 to 10', 'setting', '2017-12-12 15:51:05'),
(1210, 2, 'Setting has been updated from 10 to 12', 'setting', '2017-12-12 15:53:55'),
(1211, 2, 'Setting has been updated from 10 to 10', 'setting', '2017-12-12 15:53:58'),
(1212, 2, 'Occupancy has been moved to the table ''<b>Table - 4</b>''', 'table', '2017-12-12 15:56:42'),
(1213, 2, 'Occupancy has been moved to the table ''<b>Table - 3</b>''', 'table', '2017-12-12 15:57:03'),
(1214, 2, 'Occupancy has been moved to the table ''<b>Table - 20</b>''', 'table', '2017-12-12 15:57:17'),
(1215, 2, 'Occupancy has been moved to the table ''<b>Table - 2</b>''', 'table', '2017-12-12 16:02:12'),
(1216, 2, 'Occupancy has been moved to the table ''<b>Table - 20</b>''', 'table', '2017-12-12 16:03:09'),
(1217, 2, 'Occupancy has been moved to the table ''<b>Table - 2</b>''', 'table', '2017-12-12 16:03:18'),
(1218, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-12 16:14:04'),
(1219, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-12 16:14:05'),
(1220, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-12 17:17:56'),
(1221, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-12 17:18:07'),
(1222, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-13 10:33:05'),
(1223, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-13 10:39:51'),
(1224, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-13 10:39:52'),
(1225, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-13 10:40:04'),
(1226, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-13 10:40:33'),
(1227, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-13 10:40:33'),
(1228, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-13 10:40:40'),
(1229, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-13 10:43:51'),
(1230, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-13 10:43:51'),
(1231, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-13 10:44:07'),
(1232, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-13 10:52:48'),
(1233, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-13 10:52:48'),
(1234, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-13 10:52:55'),
(1235, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-13 10:53:26'),
(1236, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-13 10:53:27'),
(1237, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-13 10:53:34'),
(1238, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-13 10:53:52'),
(1239, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-13 10:53:53'),
(1240, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-13 10:54:00'),
(1241, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-13 11:09:21'),
(1242, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-13 11:09:21'),
(1243, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-13 11:09:28'),
(1244, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-13 12:00:53'),
(1245, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-13 12:00:54'),
(1246, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-13 12:01:03'),
(1247, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-13 12:01:44'),
(1248, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-13 12:01:45'),
(1249, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-13 12:02:08'),
(1250, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-13 12:02:45'),
(1251, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-13 12:02:46'),
(1252, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-13 12:08:44'),
(1253, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-13 12:41:20'),
(1254, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-13 12:41:21'),
(1255, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-13 12:41:29'),
(1256, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-13 12:41:47'),
(1257, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-13 12:41:48'),
(1258, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-13 13:14:39'),
(1259, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-13 13:14:40'),
(1260, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-13 14:13:38'),
(1261, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-13 14:13:43'),
(1262, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-13 14:13:44'),
(1263, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-13 14:14:59'),
(1264, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-13 14:15:31'),
(1265, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-13 14:15:32'),
(1266, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-13 14:16:00'),
(1267, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-13 14:16:08'),
(1282, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-13 14:31:56'),
(1283, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-13 14:32:47'),
(1284, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-13 14:32:47'),
(1285, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-13 14:33:06'),
(1286, 2, 'Cash payment for table order has been made for the amount of Rs. 342', 'billing', '2017-12-13 14:38:39'),
(1287, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-13 14:38:40'),
(1288, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-13 14:40:58'),
(1289, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-13 14:40:59'),
(1296, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-13 14:42:44'),
(1297, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-13 14:45:11'),
(1298, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-13 14:45:11'),
(1299, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-13 14:45:19'),
(1300, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-13 15:56:51'),
(1301, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-13 15:56:52'),
(1302, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-13 16:05:43'),
(1303, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-14 10:12:15'),
(1304, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-14 10:47:12'),
(1305, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-14 10:47:14'),
(1306, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-14 11:00:13'),
(1307, 2, 'Menu item has been added', 'menu', '2017-12-14 11:24:27'),
(1308, 2, 'Table order KOT number 171214-1 has been send', 'order', '2017-12-14 11:25:47'),
(1309, 2, 'Table order KOT number 171214-2 has been send', 'order', '2017-12-14 15:02:11'),
(1310, 2, 'Cash payment for table order has been made for the amount of Rs. 761', 'billing', '2017-12-14 15:29:35'),
(1311, 2, 'Table ''<b>Table - 2</b>'' has been closed ', 'table', '2017-12-14 15:29:36'),
(1312, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-14 15:30:18'),
(1313, 2, 'Table order KOT number 171214-3 has been send', 'order', '2017-12-14 15:30:55'),
(1314, 2, 'Table order KOT number 171214-4 has been send', 'order', '2017-12-14 15:31:31'),
(1315, 2, 'Cash payment for table order has been made for the amount of Rs. 3014', 'billing', '2017-12-14 15:31:46'),
(1316, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-14 15:31:46'),
(1317, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-14 16:12:40'),
(1318, 2, 'Table order KOT number 171214-5 has been send', 'order', '2017-12-14 16:12:51'),
(1319, 2, 'Cash payment for table order has been made for the amount of Rs. 509', 'billing', '2017-12-14 16:14:12'),
(1320, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-14 16:14:13'),
(1321, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-14 18:54:11'),
(1322, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-14 21:22:38'),
(1323, 2, 'Table order KOT number 171214-6 has been send', 'order', '2017-12-14 21:30:38'),
(1324, 2, 'Take away order KOT 171214-7 has been send', 'order', '2017-12-14 21:37:26'),
(1325, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-15 10:49:44'),
(1326, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-16 12:43:14'),
(1327, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-16 15:19:37'),
(1328, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-17 07:50:33'),
(1329, 2, 'Table order KOT number 171217-1 has been send', 'order', '2017-12-17 08:53:29'),
(1330, 2, 'Credit table order has been made for the amount of Rs. 2663 on the debtor named -sugen', 'billing', '2017-12-17 10:41:17'),
(1331, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-17 10:41:18'),
(1332, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-17 13:22:16'),
(1333, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-17 13:41:02'),
(1334, 2, 'Table order KOT number 171217-2 has been send', 'order', '2017-12-17 13:51:49'),
(1335, 2, 'Table order KOT number 171217-3 has been send', 'order', '2017-12-17 13:52:22'),
(1336, 2, 'Table order KOT number 171217-4 has been send', 'order', '2017-12-17 13:59:42'),
(1337, 2, 'Table order KOT number 171217-5 has been send', 'order', '2017-12-17 14:07:23'),
(1338, 2, 'Table order KOT number 171217-6 has been send', 'order', '2017-12-17 14:15:31'),
(1339, 2, 'Take away order KOT 171217-7 has been send', 'order', '2017-12-17 14:51:22'),
(1340, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-18 10:06:04'),
(1341, 2, 'Cash payment for table order has been made for the amount of Rs. 2113', 'billing', '2017-12-18 10:07:45'),
(1342, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-18 10:07:46'),
(1343, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-18 10:08:38'),
(1344, 2, 'Table order KOT number 171218-1 has been send', 'order', '2017-12-18 10:08:47'),
(1345, 2, 'Table order KOT number 171218-2 has been send', 'order', '2017-12-18 10:08:55'),
(1346, 2, 'Take away order KOT 171218-3 has been send', 'order', '2017-12-18 10:59:33'),
(1347, 2, 'Table order KOT number 171218-4 has been send', 'order', '2017-12-18 11:11:14'),
(1348, 2, 'Cash payment for table order has been made for the amount of Rs. 1481', 'billing', '2017-12-18 11:11:33'),
(1349, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-18 11:11:33'),
(1350, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-18 11:13:12'),
(1351, 2, 'Table order KOT number 171218-5 has been send', 'order', '2017-12-18 11:13:17'),
(1352, 2, 'Cash payment for table order has been made for the amount of Rs. 1243', 'billing', '2017-12-18 11:13:24'),
(1353, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-18 11:13:24'),
(1354, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-18 11:13:50'),
(1355, 2, 'Table order KOT number 171218-6 has been send', 'order', '2017-12-18 11:13:55'),
(1356, 2, 'Cash payment for table order has been made for the amount of Rs. 895', 'billing', '2017-12-18 11:14:14'),
(1357, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-18 11:14:14'),
(1358, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-18 11:14:21'),
(1359, 2, 'Table order KOT number 171218-7 has been send', 'order', '2017-12-18 11:14:51'),
(1360, 2, 'Table order KOT number 171218-8 has been send', 'order', '2017-12-18 11:14:58'),
(1361, 2, 'Cash payment for table order has been made for the amount of Rs. 1119', 'billing', '2017-12-18 11:16:57'),
(1362, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-18 11:16:58'),
(1363, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-18 11:42:29'),
(1364, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-18 11:42:31'),
(1365, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-18 11:42:38'),
(1366, 2, 'Booking has been made', 'table', '2017-12-18 11:56:37'),
(1367, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-18 12:11:18'),
(1368, 2, 'Table order KOT number 171218-9 has been send', 'order', '2017-12-18 12:12:18'),
(1369, 2, 'Cash payment for table order has been made for the amount of Rs. 1119', 'billing', '2017-12-18 12:12:41'),
(1370, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-18 12:12:41'),
(1371, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-18 12:13:33'),
(1372, 2, 'Table order KOT number 171218-10 has been send', 'order', '2017-12-18 12:13:40'),
(1373, 2, 'Cash payment for table order has been made for the amount of Rs. 1119', 'billing', '2017-12-18 12:14:11'),
(1374, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-18 12:14:12'),
(1375, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-18 12:14:40'),
(1376, 2, 'Table order KOT number 171218-11 has been send', 'order', '2017-12-18 12:14:45'),
(1377, 2, 'Cash payment for table order has been made for the amount of Rs. 1119', 'billing', '2017-12-18 12:15:05'),
(1378, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-18 12:15:05'),
(1379, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-18 13:47:13'),
(1380, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-18 13:47:14'),
(1381, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-18 13:47:21'),
(1382, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-18 14:02:55'),
(1383, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-18 14:02:56'),
(1384, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-18 14:03:05'),
(1385, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-18 14:05:13'),
(1386, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-18 14:05:14'),
(1387, 6, '<b>Sugen</b> Logged onto the system', 'user', '2017-12-18 14:05:35'),
(1388, 6, '<b>Sugen</b> Logged out of the system', 'user', '2017-12-18 14:05:39'),
(1389, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-18 14:05:49'),
(1390, 2, 'Updated user detail of -sugen''sugen'' from ''staff'' to ''floor_supervisor''', 'user', '2017-12-18 14:05:57'),
(1391, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-18 14:06:02'),
(1392, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-18 14:06:02'),
(1393, 6, '<b>Sugen</b> Logged onto the system', 'user', '2017-12-18 14:06:07'),
(1394, 6, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-18 14:10:42'),
(1395, 6, 'Table order KOT number 171218-12 has been send', 'order', '2017-12-18 14:19:58'),
(1396, 6, '<b>Sugen</b> Logged out of the system', 'user', '2017-12-18 14:23:32'),
(1397, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-18 14:23:38'),
(1398, 2, 'Cash payment for table order has been made for the amount of Rs. 249', 'billing', '2017-12-18 14:23:50'),
(1399, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-18 14:23:51'),
(1400, 2, 'Setting has been updated from  to klientscape', 'setting', '2017-12-18 14:51:09'),
(1401, 2, 'Setting has been updated from  to gairidhara', 'setting', '2017-12-18 14:51:26'),
(1402, 2, 'Setting has been updated from  to 01444444', 'setting', '2017-12-18 14:51:38'),
(1403, 2, 'Setting has been updated from  to 123456789', 'setting', '2017-12-18 14:51:43'),
(1404, 2, 'Setting has been updated from  to Happy customer...', 'setting', '2017-12-18 14:51:55'),
(1405, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-18 15:37:59'),
(1406, 2, 'Table order KOT number 171218-13 has been send', 'order', '2017-12-18 15:38:17'),
(1407, 2, 'Table order KOT number 171218-14 has been send', 'order', '2017-12-18 16:31:44'),
(1408, 2, 'Table order KOT number 171218-15 has been send', 'order', '2017-12-18 16:32:00'),
(1409, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-18 16:54:55'),
(1410, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-18 16:54:56'),
(1411, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-18 17:47:01'),
(1412, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-19 10:30:50'),
(1413, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-19 11:53:36'),
(1414, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-19 11:53:38'),
(1415, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-19 11:53:47'),
(1416, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-19 11:54:19'),
(1417, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-19 11:54:19'),
(1418, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-19 11:54:27'),
(1419, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-19 11:54:56'),
(1420, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-19 11:54:56'),
(1421, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-19 11:55:05'),
(1422, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-19 11:55:46'),
(1423, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-19 11:55:46'),
(1424, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-19 11:55:52'),
(1425, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-19 11:56:53'),
(1426, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-19 11:56:53'),
(1427, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-19 11:57:55'),
(1428, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-19 11:59:13'),
(1429, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-19 11:59:21'),
(1430, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-19 11:59:42'),
(1431, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-19 11:59:53'),
(1432, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-19 13:00:47'),
(1433, 2, 'Cash payment for table order has been made for the amount of Rs. 201', 'billing', '2017-12-19 13:22:57'),
(1434, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-19 13:22:57'),
(1435, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-19 17:28:26'),
(1436, 2, 'Table order KOT number 171219-1 has been send', 'order', '2017-12-19 17:28:38'),
(1437, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-20 10:25:22'),
(1438, 2, 'Cash payment for table order has been made for the amount of Rs. 224', 'billing', '2017-12-20 14:39:54'),
(1439, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-20 14:41:20'),
(1440, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-20 14:41:24'),
(1441, 2, 'Table order KOT number 171220-1 has been send', 'order', '2017-12-20 14:41:31'),
(1442, 2, '10 - stock item 7 has been sold', 'stock', '2017-12-20 14:41:44'),
(1443, 2, '2 - stock item 6 has been sold', 'stock', '2017-12-20 14:41:44'),
(1444, 2, '50 - stock item 5 has been sold', 'stock', '2017-12-20 14:41:44'),
(1445, 2, 'Cash payment for table order has been made for the amount of Rs. 0', 'billing', '2017-12-20 14:41:44'),
(1446, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-20 14:42:59'),
(1447, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-20 14:43:03'),
(1448, 2, 'Table order KOT number 171220-2 has been send', 'order', '2017-12-20 14:43:09'),
(1449, 2, '10 - stock item 7 has been sold', 'stock', '2017-12-20 14:43:22'),
(1450, 2, '2 - stock item 6 has been sold', 'stock', '2017-12-20 14:43:22'),
(1451, 2, '50 - stock item 5 has been sold', 'stock', '2017-12-20 14:43:22'),
(1452, 2, 'Cash payment for table order has been made for the amount of Rs. 0', 'billing', '2017-12-20 14:43:22'),
(1453, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-20 14:43:29'),
(1454, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-20 14:43:33'),
(1455, 2, 'Table order KOT number 171220-3 has been send', 'order', '2017-12-20 14:43:40'),
(1456, 2, 'Table order KOT number 171220-4 has been send', 'order', '2017-12-20 14:43:53'),
(1457, 2, 'Cash payment for table order has been made for the amount of Rs. 1577', 'billing', '2017-12-20 14:47:08'),
(1458, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-20 14:48:54'),
(1459, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-20 14:48:59'),
(1460, 2, 'Table order KOT number 171220-5 has been send', 'order', '2017-12-20 14:49:02'),
(1461, 2, 'Cash payment for table order has been made for the amount of Rs. 224', 'billing', '2017-12-20 14:49:11'),
(1462, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-20 14:50:25'),
(1463, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-20 14:50:29'),
(1464, 2, 'Table order KOT number 171220-6 has been send', 'order', '2017-12-20 14:50:35'),
(1465, 2, '10 - stock item 7 has been sold', 'stock', '2017-12-20 14:50:40'),
(1466, 2, '2 - stock item 6 has been sold', 'stock', '2017-12-20 14:50:40'),
(1467, 2, '50 - stock item 5 has been sold', 'stock', '2017-12-20 14:50:40'),
(1468, 2, 'Cash payment for table order has been made for the amount of Rs. 2585', 'billing', '2017-12-20 14:50:40'),
(1469, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-20 14:53:34'),
(1470, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-20 14:53:41'),
(1471, 2, 'Table order KOT number 171220-7 has been send', 'order', '2017-12-20 14:53:52'),
(1472, 2, 'Table order KOT number 171220-8 has been send', 'order', '2017-12-20 14:54:03'),
(1473, 2, '20 - stock item 7 has been sold', 'stock', '2017-12-20 14:54:11'),
(1474, 2, '4 - stock item 6 has been sold', 'stock', '2017-12-20 14:54:11'),
(1475, 2, '100 - stock item 5 has been sold', 'stock', '2017-12-20 14:54:11'),
(1476, 2, 'Cash payment for table order has been made for the amount of Rs. 5171', 'billing', '2017-12-20 14:54:12'),
(1477, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-20 14:58:36'),
(1478, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-20 14:58:41'),
(1479, 2, 'Table order KOT number 171220-9 has been send', 'order', '2017-12-20 14:58:53'),
(1480, 2, '20 - stock item 7 has been sold', 'stock', '2017-12-20 14:59:06'),
(1481, 2, '4 - stock item 6 has been sold', 'stock', '2017-12-20 14:59:06'),
(1482, 2, '100 - stock item 5 has been sold', 'stock', '2017-12-20 14:59:06'),
(1483, 2, 'Cash payment for table order has been made for the amount of Rs. 5171', 'billing', '2017-12-20 14:59:06'),
(1484, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-20 14:59:39'),
(1485, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-20 15:00:32'),
(1486, 2, 'Table order KOT number 171220-10 has been send', 'order', '2017-12-20 15:01:01'),
(1487, 2, 'Cash payment for table order has been made for the amount of Rs. 0', 'billing', '2017-12-20 15:01:13'),
(1488, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-20 15:06:00'),
(1489, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-20 15:06:05'),
(1490, 2, 'Table order KOT number 171220-11 has been send', 'order', '2017-12-20 15:06:43'),
(1491, 2, 'Cash payment for table order has been made for the amount of Rs. 472', 'billing', '2017-12-20 15:06:48'),
(1492, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-20 15:07:18'),
(1493, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-20 15:07:28'),
(1494, 2, 'Table order KOT number 171220-12 has been send', 'order', '2017-12-20 15:07:32'),
(1495, 2, 'Table order KOT number 171220-13 has been send', 'order', '2017-12-20 16:04:56'),
(1496, 2, 'Cash payment for table order has been made for the amount of Rs. 783', 'billing', '2017-12-20 16:10:28'),
(1497, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-20 16:10:36'),
(1498, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-20 16:10:42'),
(1499, 2, 'Table order KOT number 171220-14 has been send', 'order', '2017-12-20 16:10:56'),
(1500, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-20 16:39:42'),
(1501, 2, 'Cash payment for table order has been made for the amount of Rs. 497', 'billing', '2017-12-20 16:39:42'),
(1502, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-20 16:44:17'),
(1503, 2, 'Table order KOT number 171220-15 has been send', 'order', '2017-12-20 16:44:24'),
(1504, 2, '10 - stock item 7 has been sold', 'stock', '2017-12-20 16:55:19'),
(1505, 2, '2 - stock item 6 has been sold', 'stock', '2017-12-20 16:55:19'),
(1506, 2, '50 - stock item 5 has been sold', 'stock', '2017-12-20 16:55:19'),
(1507, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-20 16:55:20'),
(1508, 2, 'Cash payment for table order has been made for the amount of Rs. 2020', 'billing', '2017-12-20 16:55:20'),
(1509, 2, 'Table order KOT number 171220-16 has been send', 'order', '2017-12-20 16:55:59'),
(1510, 2, 'Cash payment for table order has been made for the amount of Rs. 1585', 'billing', '2017-12-20 16:56:23'),
(1511, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-20 16:57:35'),
(1512, 2, 'Table order KOT number 171220-17 has been send', 'order', '2017-12-20 16:57:51'),
(1513, 2, '10 - stock item 7 has been sold', 'stock', '2017-12-20 17:03:27'),
(1514, 2, '2 - stock item 6 has been sold', 'stock', '2017-12-20 17:03:27'),
(1515, 2, '50 - stock item 5 has been sold', 'stock', '2017-12-20 17:03:27'),
(1516, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-20 17:03:28'),
(1517, 2, 'Cash payment for table order has been made for the amount of Rs. 528', 'billing', '2017-12-20 17:03:28'),
(1518, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-20 17:26:20'),
(1519, 2, 'Table order KOT number 171220-18 has been send', 'order', '2017-12-20 17:26:28'),
(1520, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-21 10:01:44'),
(1521, 2, 'Item wise payment has been made for the amount of Rs. 224', 'billing', '2017-12-21 10:33:38'),
(1522, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-21 11:14:18'),
(1523, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-21 11:14:31'),
(1524, 2, 'Table order KOT number 171221-1 has been send', 'order', '2017-12-21 13:00:21'),
(1525, 2, 'Sales has been returned for the invoice number - 18-81', 'billing', '2017-12-21 14:52:29'),
(1526, 2, 'Sales has been returned for the invoice number - 18-82', 'billing', '2017-12-21 14:53:15'),
(1527, 2, 'Sales has been returned for the invoice number - 18-80', 'billing', '2017-12-21 14:53:51'),
(1528, 2, 'Sales has been returned for the invoice number - 18-79', 'billing', '2017-12-21 14:55:00'),
(1529, 2, 'Debtor named -sugen paid the amount of Rs. 100', 'debtor', '2017-12-21 15:49:56'),
(1530, 2, 'Debtor named -sugen paid the amount of Rs. 100', 'debtor', '2017-12-21 15:50:43'),
(1531, 2, 'Debtor named -sugen paid the amount of Rs. 100', 'debtor', '2017-12-21 15:51:32'),
(1532, 2, 'Payment returned the amount of Rs. 100to debtor named -sugen', 'debtor', '2017-12-21 15:52:34'),
(1533, 2, 'Payment returned the amount of Rs. 100to debtor named -sugen', 'debtor', '2017-12-21 15:53:51'),
(1534, 2, 'Payment returned the amount of Rs. 100to debtor named -sugen', 'debtor', '2017-12-21 15:54:15'),
(1535, 2, 'Payment returned the amount of Rs. 100to debtor named -sugen', 'debtor', '2017-12-21 15:54:55'),
(1536, 2, 'Payment returned the amount of Rs. 100to debtor named -sugen', 'debtor', '2017-12-21 15:55:35'),
(1537, 2, 'Debtor named -sugen paid the amount of Rs. 100', 'debtor', '2017-12-21 15:55:56'),
(1538, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-21 16:28:14'),
(1539, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-21 16:28:26'),
(1540, 2, 'Take away order KOT 171221-2 has been send', 'order', '2017-12-21 16:47:00'),
(1541, 2, 'Cash payment for take away order has been made for the amount of Rs. 566', 'billing', '2017-12-21 16:47:19'),
(1542, 2, 'Item wise payment has been made for the amount of Rs. 84', 'billing', '2017-12-21 17:00:09'),
(1543, 2, 'Credit table order has been made for the amount of Rs. 556 on the debtor named -sugen', 'billing', '2017-12-21 17:04:45'),
(1544, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-21 17:04:45'),
(1545, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-21 17:08:58'),
(1546, 2, 'Table order KOT number 171221-3 has been send', 'order', '2017-12-21 17:09:03'),
(1547, 2, 'Credit table order has been made for the amount of Rs. 2057 on the debtor named -sugen', 'billing', '2017-12-21 17:09:12'),
(1548, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-21 17:09:13'),
(1549, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-21 17:09:17'),
(1550, 2, 'Table order KOT number 171221-4 has been send', 'order', '2017-12-21 17:09:52'),
(1551, 2, 'Credit table order has been made for the amount of Rs. 2057 on the debtor named -sugen', 'billing', '2017-12-21 17:10:02'),
(1552, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-21 17:10:02'),
(1553, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-21 17:12:12'),
(1554, 2, 'Table order KOT number 171221-5 has been send', 'order', '2017-12-21 17:12:17'),
(1555, 2, 'Credit table order has been made for the amount of Rs. 2057 on the debtor named -sugen', 'billing', '2017-12-21 17:12:30'),
(1556, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-22 10:07:46'),
(1557, 2, 'Retail order KOT 171222-1 has been send', 'order', '2017-12-22 10:09:34'),
(1558, 2, 'Retail order KOT 171222-2 has been send', 'order', '2017-12-22 10:09:46'),
(1559, 2, 'Table order KOT number 171222-3 has been send', 'order', '2017-12-22 10:46:52'),
(1560, 2, 'Cash payment for table order has been made for the amount of Rs. 2057', 'billing', '2017-12-22 10:53:57'),
(1561, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-22 10:54:13'),
(1562, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-22 10:54:17'),
(1563, 2, 'Table order KOT number 171222-4 has been send', 'order', '2017-12-22 10:54:21'),
(1564, 2, 'Cash payment for table order has been made for the amount of Rs. 2057', 'billing', '2017-12-22 10:54:31'),
(1565, 2, 'Table order KOT number 171222-5 has been send', 'order', '2017-12-22 10:54:47'),
(1566, 2, 'Cash payment for table order has been made for the amount of Rs. 472', 'billing', '2017-12-22 10:54:52'),
(1567, 2, 'Table order KOT number 171222-6 has been send', 'order', '2017-12-22 10:55:10'),
(1568, 2, 'Cash payment for table order has been made for the amount of Rs. 472', 'billing', '2017-12-22 10:55:14'),
(1569, 2, 'Table order KOT number 171222-7 has been send', 'order', '2017-12-22 11:03:54'),
(1570, 2, 'Cash payment for table order has been made for the amount of Rs. 0', 'billing', '2017-12-22 11:04:03'),
(1571, 2, 'Table order KOT number 171222-8 has been send', 'order', '2017-12-22 11:10:23'),
(1572, 2, 'Retail order KOT 171222-9 has been send', 'order', '2017-12-22 11:15:52'),
(1573, 2, 'Cash payment for retail order has been made for the amount of Rs. 429', 'billing', '2017-12-22 11:40:47'),
(1574, 2, 'Cash payment for table order has been made for the amount of Rs. 566', 'billing', '2017-12-22 11:40:58'),
(1575, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-22 11:41:04'),
(1576, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-22 11:41:12'),
(1577, 2, 'Table order KOT number 171222-10 has been send', 'order', '2017-12-22 11:41:16'),
(1578, 2, 'Cash payment for table order has been made for the amount of Rs. 566', 'billing', '2017-12-22 11:41:24'),
(1579, 2, 'Table order KOT number 171222-11 has been send', 'order', '2017-12-22 11:42:19'),
(1580, 2, 'Cash payment for table order has been made for the amount of Rs. 472', 'billing', '2017-12-22 11:42:24'),
(1581, 2, 'Delivery order KOT 171222-12 has been send', 'order', '2017-12-22 11:43:09'),
(1582, 2, 'Cash payment for delivery order has been made for the amount of Rs. 814', 'billing', '2017-12-22 11:43:19'),
(1583, 2, 'Delivery order KOT 171222-13 has been send', 'order', '2017-12-22 11:46:25'),
(1584, 2, 'Cash payment for delivery order has been made for the amount of Rs. 566', 'billing', '2017-12-22 11:46:33'),
(1585, 2, 'Delivery order KOT 171222-14 has been send', 'order', '2017-12-22 11:47:46'),
(1586, 2, 'Cash payment for delivery order has been made for the amount of Rs. 566', 'billing', '2017-12-22 11:47:54'),
(1587, 2, 'Delivery order KOT 171222-15 has been send', 'order', '2017-12-22 11:52:14'),
(1588, 2, 'Credit delivery order has been made for the amount of Rs.566 on the debtor named -sugen', 'billing', '2017-12-22 11:52:25'),
(1589, 2, 'Credit delivery charge has been made for the amount of Rs.123 on the debtor named -sugen', 'billing', '2017-12-22 11:52:25'),
(1590, 2, 'Delivery order KOT 171222-16 has been send', 'order', '2017-12-22 11:53:16'),
(1591, 2, 'Cash payment for delivery order has been made for the amount of Rs. 566', 'billing', '2017-12-22 11:53:21'),
(1592, 2, 'Delivery order KOT 171222-17 has been send', 'order', '2017-12-22 11:58:38'),
(1593, 2, 'Cash payment for delivery order has been made for the amount of Rs. 566', 'billing', '2017-12-22 12:18:06'),
(1594, 2, 'Cash payment for delivery order has been made for the amount of Rs. 696', 'billing', '2017-12-22 12:19:27'),
(1595, 2, 'Credit delivery order has been made for the amount of Rs.895 on the debtor named -sugen', 'billing', '2017-12-22 12:20:15'),
(1596, 2, 'Credit delivery charge has been made for the amount of Rs.87 on the debtor named -sugen', 'billing', '2017-12-22 12:20:15'),
(1597, 2, 'Delivery order KOT 171222-18 has been send', 'order', '2017-12-22 12:21:10'),
(1598, 2, 'Credit delivery order has been made for the amount of Rs.566 on the debtor named -sugen', 'billing', '2017-12-22 12:21:19'),
(1599, 2, 'Credit delivery charge has been made for the amount of Rs.435 on the debtor named -sugen', 'billing', '2017-12-22 12:21:20'),
(1600, 2, 'Pick Up order KOT 171222-19 has been send', 'order', '2017-12-22 12:22:42'),
(1601, 2, 'Cash payment for pick up order has been made for the amount of Rs. 472', 'billing', '2017-12-22 12:22:45'),
(1602, 2, 'Take away order KOT 171222-20 has been send', 'order', '2017-12-22 12:22:59'),
(1603, 2, 'Cash payment for take away order has been made for the amount of Rs. 1492', 'billing', '2017-12-22 12:28:57'),
(1604, 2, 'Take away order KOT 171222-21 has been send', 'order', '2017-12-22 12:31:10'),
(1605, 2, 'Cash payment for take away order has been made for the amount of Rs. 1616', 'billing', '2017-12-22 12:31:26'),
(1606, 2, 'Table order KOT number 171222-22 has been send', 'order', '2017-12-22 12:43:09'),
(1607, 2, 'Cash payment for table order has been made for the amount of Rs. 814', 'billing', '2017-12-22 12:43:17'),
(1608, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-22 12:43:25'),
(1609, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-22 12:44:14'),
(1610, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-22 12:44:24'),
(1611, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-22 12:44:39'),
(1612, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-22 12:45:07'),
(1613, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-22 12:45:25'),
(1614, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-22 12:48:30'),
(1615, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-22 12:48:42'),
(1616, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-22 12:49:35'),
(1617, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-22 12:49:43'),
(1618, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-22 12:50:08'),
(1619, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-22 12:50:15'),
(1620, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-22 12:50:33'),
(1621, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-22 12:51:03'),
(1622, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-22 12:51:09'),
(1623, 2, 'Table order KOT number 171222-23 has been send', 'order', '2017-12-22 12:55:46'),
(1624, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-22 13:07:53'),
(1625, 2, 'Cash payment for table order has been made for the amount of Rs. 373', 'billing', '2017-12-22 13:07:53'),
(1626, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-22 13:10:46'),
(1627, 2, 'Table order KOT number 171222-24 has been send', 'order', '2017-12-22 13:10:53'),
(1628, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-22 13:11:08'),
(1629, 2, 'Cash payment for table order has been made for the amount of Rs. 1243', 'billing', '2017-12-22 13:11:08'),
(1630, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-22 13:12:34'),
(1631, 2, 'Table order KOT number 171222-25 has been send', 'order', '2017-12-22 13:12:39'),
(1632, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-22 13:13:17'),
(1633, 2, 'Cash payment for table order has been made for the amount of Rs. 124', 'billing', '2017-12-22 13:13:17'),
(1634, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-22 13:14:44'),
(1635, 2, 'Table order KOT number 171222-26 has been send', 'order', '2017-12-22 13:14:48'),
(1636, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-22 13:14:59'),
(1637, 2, 'Cash payment for table order has been made for the amount of Rs. 1585', 'billing', '2017-12-22 13:14:59'),
(1638, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-22 13:15:31');
INSERT INTO `audit_log` (`id`, `created_by`, `action`, `type`, `created_at`) VALUES
(1639, 2, 'Table order KOT number 171222-27 has been send', 'order', '2017-12-22 13:15:38'),
(1640, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-22 13:15:47'),
(1641, 2, 'Cash payment for table order has been made for the amount of Rs. 1492', 'billing', '2017-12-22 13:15:47'),
(1642, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-22 13:16:29'),
(1643, 2, 'Table order KOT number 171222-28 has been send', 'order', '2017-12-22 13:16:32'),
(1644, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-22 13:16:42'),
(1645, 2, 'Cash payment for table order has been made for the amount of Rs. 342', 'billing', '2017-12-22 13:16:42'),
(1646, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-22 13:17:18'),
(1647, 2, 'Table order KOT number 171222-29 has been send', 'order', '2017-12-22 13:17:21'),
(1648, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-22 13:19:13'),
(1649, 2, 'Cash payment for table order has been made for the amount of Rs. 342', 'billing', '2017-12-22 13:19:13'),
(1650, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-22 13:20:19'),
(1651, 2, 'Table order KOT number 171222-30 has been send', 'order', '2017-12-22 13:20:25'),
(1652, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-22 13:20:38'),
(1653, 2, 'Cash payment for table order has been made for the amount of Rs. 342', 'billing', '2017-12-22 13:20:38'),
(1654, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-22 13:21:56'),
(1655, 2, 'Table order KOT number 171222-31 has been send', 'order', '2017-12-22 13:22:00'),
(1656, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-22 13:22:10'),
(1657, 2, 'Cash payment for table order has been made for the amount of Rs. 342', 'billing', '2017-12-22 13:22:10'),
(1658, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-22 13:22:28'),
(1659, 2, 'Table order KOT number 171222-32 has been send', 'order', '2017-12-22 13:22:33'),
(1660, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-22 13:22:41'),
(1661, 2, 'Cash payment for table order has been made for the amount of Rs. 342', 'billing', '2017-12-22 13:22:41'),
(1662, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-22 13:48:52'),
(1663, 2, 'Table order KOT number 171222-33 has been send', 'order', '2017-12-22 13:48:56'),
(1664, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-22 13:49:08'),
(1665, 2, 'Cash payment for table order has been made for the amount of Rs. 342', 'billing', '2017-12-22 13:49:08'),
(1666, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-22 13:49:48'),
(1667, 2, 'Table order KOT number 171222-34 has been send', 'order', '2017-12-22 13:49:53'),
(1668, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-22 13:50:07'),
(1669, 2, 'Cash payment for table order has been made for the amount of Rs. 1492', 'billing', '2017-12-22 13:50:08'),
(1670, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-22 13:51:13'),
(1671, 2, 'Table order KOT number 171222-35 has been send', 'order', '2017-12-22 13:51:18'),
(1672, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-22 13:51:29'),
(1673, 2, 'Cash payment for table order has been made for the amount of Rs. 1709', 'billing', '2017-12-22 13:51:29'),
(1674, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-22 13:51:42'),
(1675, 2, 'Table order KOT number 171222-36 has been send', 'order', '2017-12-22 13:51:47'),
(1676, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-22 13:52:02'),
(1677, 2, 'Cash payment for table order has been made for the amount of Rs. 1367', 'billing', '2017-12-22 13:52:02'),
(1678, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-22 13:52:14'),
(1679, 2, 'Table order KOT number 171222-37 has been send', 'order', '2017-12-22 13:52:20'),
(1680, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-22 13:52:36'),
(1681, 2, 'Cash payment for table order has been made for the amount of Rs. 1367', 'billing', '2017-12-22 13:52:36'),
(1682, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-22 14:01:23'),
(1683, 2, 'Table order KOT number 171222-38 has been send', 'order', '2017-12-22 14:01:28'),
(1684, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-22 14:08:12'),
(1685, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-22 14:08:26'),
(1686, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-25 11:16:19'),
(1687, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-25 11:16:31'),
(1688, 2, 'Setting has been updated from 123456789 to 123456789asdfasdfadsf', 'setting', '2017-12-25 11:17:00'),
(1689, 2, 'Setting has been updated from 123456789asdfasdfadsf to 123456789', 'setting', '2017-12-25 11:17:07'),
(1690, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-25 11:18:15'),
(1691, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-25 11:19:21'),
(1692, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-25 11:19:22'),
(1693, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-25 11:21:58'),
(1694, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-25 11:22:05'),
(1695, 2, 'Cash payment for table order has been made for the amount of Rs. 1931', 'billing', '2017-12-25 11:41:33'),
(1696, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-25 11:41:44'),
(1697, 2, 'Take away order KOT 171225-1 has been send', 'order', '2017-12-25 11:42:04'),
(1698, 2, 'Cash payment for take away order has been made for the amount of Rs. 576', 'billing', '2017-12-25 11:42:15'),
(1699, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-25 12:16:45'),
(1700, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-25 12:35:06'),
(1701, 2, 'Floor has been added', 'table', '2017-12-25 12:35:39'),
(1702, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-25 12:58:49'),
(1703, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-25 12:58:50'),
(1704, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-25 13:00:07'),
(1705, 2, 'Menu item has been added', 'menu', '2017-12-25 13:55:18'),
(1706, 2, 'New menu category has been created named -test', 'menu', '2017-12-25 13:55:27'),
(1707, 2, 'Product named -Testasdfasdfasdf has been added', 'misc', '2017-12-25 13:55:48'),
(1708, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-25 14:25:51'),
(1709, 2, 'Table order KOT number 171225-2 has been send', 'order', '2017-12-25 14:25:56'),
(1710, 2, '1 - stock item 1 has been sold', 'stock', '2017-12-25 15:03:14'),
(1711, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-25 15:03:15'),
(1712, 2, 'Cash payment for table order has been made for the amount of Rs. 303', 'billing', '2017-12-25 15:03:15'),
(1713, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2017-12-25 15:04:24'),
(1714, 2, '<b>Administrator</b> Logged out of the system', 'user', '2017-12-25 15:04:25'),
(1715, 2, '<b>Administrator</b> Logged onto the system', 'user', '2017-12-25 15:14:38'),
(1716, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2017-12-25 15:34:31'),
(1717, 2, 'Table order KOT number 171225-3 has been send', 'order', '2017-12-25 15:34:36'),
(1718, 2, '1 - stock item 1 has been sold', 'stock', '2017-12-25 15:34:42'),
(1719, 2, 'Cash payment for table order has been made for the amount of Rs. 721', 'billing', '2017-12-25 15:34:42'),
(1720, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2017-12-25 15:34:49'),
(1721, 2, 'Take away order KOT 171225-4 has been send', 'order', '2017-12-25 15:36:05'),
(1722, 2, 'Cash payment for take away order has been made for the amount of Rs. 220', 'billing', '2017-12-25 15:36:09'),
(1723, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-01-09 12:33:19'),
(1724, 2, 'Table has been updated from table - 12 to table - 12', 'table', '2018-01-09 13:08:46'),
(1725, 2, 'Table ''<b>table - 12</b>'' has been occupied ', 'table', '2018-01-09 13:10:44'),
(1726, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-01-09 13:18:20'),
(1727, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-01-09 13:56:56'),
(1728, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-01-09 13:57:04'),
(1729, 2, 'Table ''<b>Table - 17</b>'' has been occupied ', 'table', '2018-01-09 14:12:00'),
(1730, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2018-01-09 14:49:31'),
(1731, 2, 'Table order KOT number 180109-1 has been send', 'order', '2018-01-09 14:49:35'),
(1732, 2, '1 - stock item 1 has been sold', 'stock', '2018-01-09 14:50:49'),
(1733, 2, 'Cash payment for table order has been made for the amount of Rs. 418', 'billing', '2018-01-09 14:50:49'),
(1734, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2018-01-09 14:50:49'),
(1735, 2, 'Table ''<b>Table - 7</b>'' has been occupied ', 'table', '2018-01-09 14:58:16'),
(1736, 2, 'Table order KOT number 180109-2 has been send', 'order', '2018-01-09 14:58:20'),
(1737, 2, 'Table ''<b>Table - 17</b>'' has been closed ', 'table', '2018-01-09 15:02:05'),
(1738, 2, '1 - stock item 1 has been sold', 'stock', '2018-01-09 15:02:17'),
(1739, 2, 'Cash payment for table order has been made for the amount of Rs. 198', 'billing', '2018-01-09 15:02:18'),
(1740, 2, 'Table ''<b>Table - 7</b>'' has been closed ', 'table', '2018-01-09 15:02:18'),
(1741, 2, 'Table ''<b>table - 12</b>'' has been closed ', 'table', '2018-01-09 15:02:24'),
(1742, 2, 'Take away order KOT 180109-3 has been send', 'order', '2018-01-09 16:30:12'),
(1743, 2, 'Item wise payment has been made for the amount of Rs. 198', 'billing', '2018-01-09 16:30:18'),
(1744, 2, '1 - stock item 1 has been sold', 'stock', '2018-01-09 16:32:37'),
(1745, 2, 'Credit take away order has been made for the amount of Rs.418 on the debtor named -sugen', 'billing', '2018-01-09 16:32:38'),
(1746, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2018-01-09 16:41:03'),
(1747, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-01-09 16:41:05'),
(1748, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-01-09 16:46:52'),
(1749, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-01-10 11:49:06'),
(1750, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-01-10 11:49:13'),
(1751, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2018-01-10 11:49:19'),
(1752, 2, 'Table ''<b>Table - 4</b>'' has been occupied ', 'table', '2018-01-10 11:49:36'),
(1753, 2, 'Table ''<b>Table - 4</b>'' has been occupied ', 'table', '2018-01-10 11:54:18'),
(1754, 2, 'Table order KOT number 180110-1 has been send', 'order', '2018-01-10 11:54:25'),
(1755, 2, '1 - stock item 1 has been sold', 'stock', '2018-01-10 11:54:41'),
(1756, 2, 'Cash payment for table order has been made for the amount of Rs. 501', 'billing', '2018-01-10 11:54:41'),
(1757, 2, 'Table ''<b>Table - 4</b>'' has been closed ', 'table', '2018-01-10 11:54:42'),
(1758, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-01-11 10:57:45'),
(1759, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-01-11 10:57:53'),
(1760, 2, 'Take away order KOT 180111-1 has been send', 'order', '2018-01-11 10:58:19'),
(1761, 2, 'Delivery order KOT 180111-2 has been send', 'order', '2018-01-11 10:59:17'),
(1762, 2, '1 - stock item 1 has been sold', 'stock', '2018-01-11 10:59:22'),
(1763, 2, 'Cash payment for delivery order has been made for the amount of Rs. 501', 'billing', '2018-01-11 10:59:23'),
(1764, 2, 'Cash payment for delivery charge has been made for the amount of Rs. 100', 'billing', '2018-01-11 10:59:23'),
(1765, 2, 'Delivery order KOT 180111-3 has been send', 'order', '2018-01-11 10:59:35'),
(1766, 2, '1 - stock item 1 has been sold', 'stock', '2018-01-11 10:59:43'),
(1767, 2, 'Credit delivery order has been made for the amount of Rs.501 on the debtor named -sugen', 'billing', '2018-01-11 10:59:43'),
(1768, 2, 'Delivery order KOT 180111-4 has been send', 'order', '2018-01-11 11:01:29'),
(1769, 2, '1 - stock item 1 has been sold', 'stock', '2018-01-11 11:01:37'),
(1770, 2, 'Credit delivery order has been made for the amount of Rs.501 on the debtor named -sugen', 'billing', '2018-01-11 11:01:38'),
(1771, 2, 'Credit delivery charge has been made for the amount of Rs.100 on the debtor named -sugen', 'billing', '2018-01-11 11:01:38'),
(1772, 2, 'Delivery order KOT 180111-5 has been send', 'order', '2018-01-11 11:06:01'),
(1773, 2, '1 - stock item 1 has been sold', 'stock', '2018-01-11 11:06:18'),
(1774, 2, 'Cash payment for delivery order has been made for the amount of Rs. 721', 'billing', '2018-01-11 11:06:18'),
(1775, 2, 'Cash payment for delivery charge has been made for the amount of Rs. 100', 'billing', '2018-01-11 11:06:18'),
(1776, 2, 'Table ''<b>Table - 4</b>'' has been occupied ', 'table', '2018-01-11 11:06:28'),
(1777, 2, 'Table order KOT number 180111-6 has been send', 'order', '2018-01-11 11:06:34'),
(1778, 2, '1 - stock item 1 has been sold', 'stock', '2018-01-11 11:06:49'),
(1779, 2, '1 - stock item 1 has been sold', 'stock', '2018-01-11 11:08:25'),
(1780, 2, '1 - stock item 1 has been sold', 'stock', '2018-01-11 11:09:54'),
(1781, 2, 'Table ''<b>Table - 4</b>'' has been closed ', 'table', '2018-01-11 11:09:55'),
(1782, 2, 'Cash payment for table order has been made for the amount of Rs. 303', 'billing', '2018-01-11 11:09:56'),
(1783, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2018-01-11 11:15:31'),
(1784, 2, 'Table order KOT number 180111-7 has been send', 'order', '2018-01-11 11:15:35'),
(1785, 2, '1 - stock item 1 has been sold', 'stock', '2018-01-11 11:15:46'),
(1786, 2, '1 - stock item 1 has been sold', 'stock', '2018-01-11 11:21:00'),
(1787, 2, '1 - stock item 1 has been sold', 'stock', '2018-01-11 11:21:30'),
(1788, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2018-01-11 11:21:30'),
(1789, 2, 'Cash payment for table order has been made for the amount of Rs. 303', 'billing', '2018-01-11 11:21:30'),
(1790, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-01-11 12:28:01'),
(1791, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2018-01-11 12:33:26'),
(1792, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-01-11 12:33:27'),
(1793, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-01-11 12:33:33'),
(1794, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2018-01-11 12:36:01'),
(1795, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-01-11 12:36:01'),
(1796, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-01-11 12:36:07'),
(1797, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-01-11 12:37:10'),
(1798, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-01-11 12:37:16'),
(1799, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2018-01-11 12:39:28'),
(1800, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-01-11 12:39:28'),
(1801, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-01-11 12:39:43'),
(1802, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-01-11 16:10:11'),
(1803, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-01-11 16:10:17'),
(1804, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-01-11 16:10:25'),
(1805, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-01-11 16:10:37'),
(1806, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2018-01-11 16:23:39'),
(1807, 2, 'Table order KOT number 180111-8 has been send', 'order', '2018-01-11 16:23:47'),
(1808, 2, '1 - stock item 1 has been sold', 'stock', '2018-01-11 16:23:53'),
(1809, 2, 'Cash payment for table order has been made for the amount of Rs. 501', 'billing', '2018-01-11 16:23:53'),
(1810, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2018-01-11 16:23:54'),
(1811, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-01-15 10:43:08'),
(1812, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2018-01-15 10:43:27'),
(1813, 2, 'Table order KOT number 180115-1 has been send', 'order', '2018-01-15 10:43:31'),
(1814, 2, '1 - stock item 1 has been sold', 'stock', '2018-01-15 10:43:44'),
(1815, 2, 'Cash payment for table order has been made for the amount of Rs. 501', 'billing', '2018-01-15 10:43:45'),
(1816, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2018-01-15 10:43:45'),
(1817, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2018-01-15 10:46:59'),
(1818, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2018-01-15 10:47:15'),
(1819, 2, 'Table ''<b>Table - 15</b>'' has been occupied ', 'table', '2018-01-15 10:49:07'),
(1820, 2, 'Table ''<b>Table - 15</b>'' has been closed ', 'table', '2018-01-15 10:52:46'),
(1821, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2018-01-15 12:44:46'),
(1822, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-01-25 10:37:35'),
(1823, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-02-19 14:07:04'),
(1824, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2018-02-19 14:07:09'),
(1825, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-02-19 14:07:10'),
(1826, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-02-23 10:36:10'),
(1827, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2018-02-23 10:36:54'),
(1828, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-03-02 10:59:12'),
(1829, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-03-02 10:59:19'),
(1830, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2018-03-02 10:59:27'),
(1831, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-03-15 11:14:03'),
(1832, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-03-19 16:59:01'),
(1833, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-03-20 15:55:04'),
(1834, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-03-20 16:08:25'),
(1835, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-03-20 16:08:37'),
(1836, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-03-21 14:43:43'),
(1837, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2018-03-21 14:49:41'),
(1838, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-03-21 14:49:43'),
(1839, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-03-22 14:17:56'),
(1840, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-03-22 14:18:20'),
(1841, 2, 'Table order KOT number 180322-1 has been send', 'order', '2018-03-22 14:18:40'),
(1842, 2, 'Table order KOT number 180322-2 has been send', 'order', '2018-03-22 14:30:27'),
(1843, 2, 'Table order KOT number 180322-3 has been send', 'order', '2018-03-22 14:31:52'),
(1844, 2, 'Table order KOT number 180322-4 has been send', 'order', '2018-03-22 14:32:10'),
(1845, 2, 'Table order KOT number 180322-5 has been send', 'order', '2018-03-22 14:32:58'),
(1846, 2, 'Table order KOT number 180322-6 has been send', 'order', '2018-03-22 14:33:51'),
(1847, 2, 'Table order KOT number 180322-7 has been send', 'order', '2018-03-22 14:34:07'),
(1848, 2, 'Table order KOT number 180322-8 has been send', 'order', '2018-03-22 14:38:18'),
(1849, 2, 'Table order KOT number 180322-9 has been send', 'order', '2018-03-22 14:38:54'),
(1850, 2, 'Table order KOT number 180322-10 has been send', 'order', '2018-03-22 14:56:07'),
(1851, 2, 'Table order KOT number 180322-11 has been send', 'order', '2018-03-22 14:58:01'),
(1852, 2, 'Table order KOT number 180322-12 has been send', 'order', '2018-03-22 14:58:53'),
(1853, 2, 'Table order KOT number 180322-13 has been send', 'order', '2018-03-22 14:59:12'),
(1854, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-03-28 10:30:19'),
(1855, 2, '40 - stock item 7 has been sold', 'stock', '2018-03-28 10:34:54'),
(1856, 2, '8 - stock item 6 has been sold', 'stock', '2018-03-28 10:34:54'),
(1857, 2, '200 - stock item 5 has been sold', 'stock', '2018-03-28 10:34:54'),
(1858, 2, '2 - stock item 1 has been sold', 'stock', '2018-03-28 10:34:54'),
(1859, 2, '20 - stock item 2 has been sold', 'stock', '2018-03-28 10:34:54'),
(1860, 2, '16 - stock item 1 has been sold', 'stock', '2018-03-28 10:34:54'),
(1861, 2, 'Cash payment for table order has been made for the amount of Rs. 71355127', 'billing', '2018-03-28 10:34:54'),
(1862, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2018-03-28 10:34:55'),
(1863, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2018-03-28 10:40:17'),
(1864, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-04-02 10:21:37'),
(1865, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-04-02 10:38:19'),
(1866, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-04-02 10:38:26'),
(1867, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2018-04-02 10:38:33'),
(1868, 2, 'Table ''<b>Table - 2</b>'' has been occupied ', 'table', '2018-04-02 10:47:26'),
(1869, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2018-04-02 11:36:30'),
(1870, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-04-02 11:36:31'),
(1871, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-04-02 11:36:49'),
(1872, 2, 'New table has been created named Table - 22', 'table', '2018-04-02 11:39:49'),
(1873, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2018-04-02 15:27:19'),
(1874, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-04-02 15:27:21'),
(1875, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-04-04 12:26:49'),
(1876, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-04-06 11:20:09'),
(1877, 2, 'Updated password of user -sugen''sugen', 'user', '2018-04-06 11:20:43'),
(1878, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2018-04-06 11:20:47'),
(1879, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-04-06 11:20:48'),
(1880, 6, '<b>Sugen</b> Logged onto the system', 'user', '2018-04-06 11:20:54'),
(1881, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-04-11 14:25:17'),
(1882, 2, 'Table order KOT number 180411-1 has been send', 'order', '2018-04-11 14:29:28'),
(1883, 2, 'Table order KOT number 180411-2 has been send', 'order', '2018-04-11 14:32:45'),
(1884, 2, '20 - stock item 7 has been sold', 'stock', '2018-04-11 14:55:33'),
(1885, 2, '4 - stock item 6 has been sold', 'stock', '2018-04-11 14:55:33'),
(1886, 2, '100 - stock item 5 has been sold', 'stock', '2018-04-11 14:55:33'),
(1887, 2, 'Cash payment for table order has been made for the amount of Rs. 1128', 'billing', '2018-04-11 14:55:33'),
(1888, 2, 'Table ''<b>Table - 2</b>'' has been closed ', 'table', '2018-04-11 14:55:34'),
(1889, 2, 'Table ''<b>Table - 2</b>'' has been occupied ', 'table', '2018-04-11 14:56:26'),
(1890, 2, 'Table order KOT number 180411-3 has been send', 'order', '2018-04-11 14:56:35'),
(1891, 2, '2 - stock item 1 has been sold', 'stock', '2018-04-11 14:57:09'),
(1892, 2, 'Cash payment for table order has been made for the amount of Rs. 1441', 'billing', '2018-04-11 14:57:09'),
(1893, 2, 'Table ''<b>Table - 2</b>'' has been closed ', 'table', '2018-04-11 14:57:09'),
(1894, 2, 'Table ''<b>Table - 2</b>'' has been occupied ', 'table', '2018-04-11 15:03:37'),
(1895, 2, 'Table order KOT number 180411-4 has been send', 'order', '2018-04-11 15:03:49'),
(1896, 2, '2 - stock item 1 has been sold', 'stock', '2018-04-11 15:04:17'),
(1897, 2, 'Cash payment for table order has been made for the amount of Rs. 1441', 'billing', '2018-04-11 15:04:17'),
(1898, 2, 'Table ''<b>Table - 2</b>'' has been closed ', 'table', '2018-04-11 15:04:18'),
(1899, 2, 'Table ''<b>Table - 2</b>'' has been occupied ', 'table', '2018-04-11 15:09:41'),
(1900, 2, 'Table order KOT number 180411-5 has been send', 'order', '2018-04-11 15:09:48'),
(1901, 2, '10 - stock item 7 has been sold', 'stock', '2018-04-11 15:10:18'),
(1902, 2, '2 - stock item 6 has been sold', 'stock', '2018-04-11 15:10:18'),
(1903, 2, '50 - stock item 5 has been sold', 'stock', '2018-04-11 15:10:18'),
(1904, 2, 'Cash payment for table order has been made for the amount of Rs. 468', 'billing', '2018-04-11 15:10:18'),
(1905, 2, 'Table order KOT number 180411-6 has been send', 'order', '2018-04-11 15:19:11'),
(1906, 2, '4 - stock item 1 has been sold', 'stock', '2018-04-11 15:20:15'),
(1907, 2, 'Cash payment for table order has been made for the amount of Rs. 2882', 'billing', '2018-04-11 15:20:16'),
(1908, 2, 'Table ''<b>Table - 2</b>'' has been closed ', 'table', '2018-04-11 15:20:16'),
(1909, 2, 'Table ''<b>Table - 2</b>'' has been occupied ', 'table', '2018-04-11 15:21:22'),
(1910, 2, 'Table order KOT number 180411-7 has been send', 'order', '2018-04-11 15:21:29'),
(1911, 2, '2 - stock item 1 has been sold', 'stock', '2018-04-11 15:31:19'),
(1912, 2, 'Cash payment for table order has been made for the amount of Rs. 1441', 'billing', '2018-04-11 15:31:19'),
(1913, 2, 'Table ''<b>Table - 2</b>'' has been closed ', 'table', '2018-04-11 15:31:19'),
(1914, 2, 'Table ''<b>Table - 2</b>'' has been occupied ', 'table', '2018-04-11 15:36:01'),
(1915, 2, 'Table order KOT number 180411-8 has been send', 'order', '2018-04-11 15:36:19'),
(1916, 2, 'Cash payment for table order has been made for the amount of Rs. 990', 'billing', '2018-04-11 16:04:49'),
(1917, 2, 'Table ''<b>Table - 2</b>'' has been closed ', 'table', '2018-04-11 16:04:50'),
(1918, 2, 'Table ''<b>Table - 2</b>'' has been occupied ', 'table', '2018-04-11 16:13:05'),
(1919, 2, 'Table order KOT number 180411-9 has been send', 'order', '2018-04-11 16:13:12'),
(1920, 2, '1 - stock item 1 has been sold', 'stock', '2018-04-11 16:13:43'),
(1921, 2, 'Cash payment for table order has been made for the amount of Rs. 1161', 'billing', '2018-04-11 16:13:44'),
(1922, 2, 'Table ''<b>Table - 2</b>'' has been closed ', 'table', '2018-04-11 16:13:44'),
(1923, 2, 'Table ''<b>Table - 2</b>'' has been occupied ', 'table', '2018-04-12 11:27:42'),
(1924, 2, 'Table order KOT number 180412-1 has been send', 'order', '2018-04-12 11:27:55'),
(1925, 2, 'Table order KOT number 180412-2 has been send', 'order', '2018-04-12 11:42:49'),
(1926, 2, 'Table order KOT number 180412-3 has been send', 'order', '2018-04-12 11:45:03'),
(1927, 2, '7 - stock item 1 has been sold', 'stock', '2018-04-12 11:49:13'),
(1928, 2, 'Cash payment for table order has been made for the amount of Rs. 3504', 'billing', '2018-04-12 11:49:13'),
(1929, 2, 'Table ''<b>Table - 2</b>'' has been closed ', 'table', '2018-04-12 11:49:15'),
(1930, 2, 'Table ''<b>Table - 2</b>'' has been occupied ', 'table', '2018-04-12 12:02:10'),
(1931, 2, 'Table order KOT number 180412-4 has been send', 'order', '2018-04-12 12:02:19'),
(1932, 2, 'Cash payment for table order has been made for the amount of Rs. 303', 'billing', '2018-04-12 12:02:39'),
(1933, 2, 'Table ''<b>Table - 2</b>'' has been closed ', 'table', '2018-04-12 12:02:40'),
(1934, 2, 'Table ''<b>Table - 2</b>'' has been occupied ', 'table', '2018-04-12 12:18:50'),
(1935, 2, 'Table order KOT number 180412-5 has been send', 'order', '2018-04-12 12:18:57'),
(1936, 2, '2 - stock item 1 has been sold', 'stock', '2018-04-12 12:23:54'),
(1937, 2, 'Cash payment for table order has been made for the amount of Rs. 1001', 'billing', '2018-04-12 12:23:55'),
(1938, 2, 'Table ''<b>Table - 2</b>'' has been closed ', 'table', '2018-04-12 12:23:55'),
(1939, 2, 'Table ''<b>Table - 2</b>'' has been occupied ', 'table', '2018-04-12 12:27:05'),
(1940, 2, 'Table order KOT number 180412-6 has been send', 'order', '2018-04-12 12:27:13'),
(1941, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-04-13 11:05:13'),
(1942, 2, 'Table order KOT number 180413-1 has been send', 'order', '2018-04-13 11:31:16'),
(1943, 2, '4 - stock item 1 has been sold', 'stock', '2018-04-13 11:31:48'),
(1944, 2, 'Cash payment for table order has been made for the amount of Rs. 2305', 'billing', '2018-04-13 11:31:48'),
(1945, 2, 'Table ''<b>Table - 2</b>'' has been closed ', 'table', '2018-04-13 11:31:49'),
(1946, 2, 'Table ''<b>Table - 2</b>'' has been occupied ', 'table', '2018-04-13 11:32:26'),
(1947, 2, 'Table order KOT number 180413-2 has been send', 'order', '2018-04-13 11:32:32'),
(1948, 2, 'Table order KOT number 180413-3 has been send', 'order', '2018-04-13 11:32:41'),
(1949, 2, '1 - stock item 1 has been sold', 'stock', '2018-04-13 11:33:32'),
(1950, 2, 'Cash payment for table order has been made for the amount of Rs. 803', 'billing', '2018-04-13 11:33:32'),
(1951, 2, 'Table ''<b>Table - 2</b>'' has been closed ', 'table', '2018-04-13 11:33:33'),
(1952, 2, 'Table ''<b>Table - 2</b>'' has been occupied ', 'table', '2018-04-13 16:28:00'),
(1953, 2, 'Table order KOT number 180413-4 has been send', 'order', '2018-04-13 16:28:08'),
(1954, 2, 'Table order KOT number 180413-5 has been send', 'order', '2018-04-13 16:28:24'),
(1955, 2, '2 - stock item 1 has been sold', 'stock', '2018-04-13 16:29:13'),
(1956, 2, 'Cash payment for table order has been made for the amount of Rs. 1304', 'billing', '2018-04-13 16:29:13'),
(1957, 2, 'Table ''<b>Table - 2</b>'' has been closed ', 'table', '2018-04-13 16:29:14'),
(1958, 2, 'Table ''<b>Table - 2</b>'' has been occupied ', 'table', '2018-04-16 11:23:29'),
(1959, 2, 'Table order KOT number 180416-1 has been send', 'order', '2018-04-16 11:23:35'),
(1960, 2, 'Table order KOT number 180416-2 has been send', 'order', '2018-04-16 11:23:43'),
(1961, 2, 'Table order KOT number 180416-3 has been send', 'order', '2018-04-16 11:23:49'),
(1962, 2, '2 - stock item 1 has been sold', 'stock', '2018-04-16 11:24:34'),
(1963, 2, 'Cash payment for table order has been made for the amount of Rs. 1001', 'billing', '2018-04-16 11:24:34'),
(1964, 2, 'Table ''<b>Table - 2</b>'' has been closed ', 'table', '2018-04-16 11:24:35'),
(1965, 2, 'Table ''<b>Table - 2</b>'' has been occupied ', 'table', '2018-04-16 11:36:31'),
(1966, 2, 'Table order KOT number 180416-4 has been send', 'order', '2018-04-16 11:43:34'),
(1967, 2, 'Table order KOT number 180416-5 has been send', 'order', '2018-04-16 11:43:42'),
(1968, 2, '2 - stock item 1 has been sold', 'stock', '2018-04-16 11:44:10'),
(1969, 2, 'Cash payment for table order has been made for the amount of Rs. 1001', 'billing', '2018-04-16 11:44:11'),
(1970, 2, 'Table ''<b>Table - 2</b>'' has been closed ', 'table', '2018-04-16 11:44:12'),
(1971, 2, 'Table ''<b>Table - 2</b>'' has been occupied ', 'table', '2018-04-16 11:44:47'),
(1972, 2, 'Table order KOT number 180416-6 has been send', 'order', '2018-04-16 11:44:52'),
(1973, 2, 'Table order KOT number 180416-7 has been send', 'order', '2018-04-16 11:44:57'),
(1974, 2, '2 - stock item 1 has been sold', 'stock', '2018-04-16 12:13:08'),
(1975, 2, 'Cash payment for table order has been made for the amount of Rs. 1001', 'billing', '2018-04-16 12:13:08'),
(1976, 2, 'Table ''<b>Table - 2</b>'' has been closed ', 'table', '2018-04-16 12:13:09'),
(1977, 2, 'Table ''<b>Table - 2</b>'' has been occupied ', 'table', '2018-04-16 15:12:32'),
(1978, 2, 'Retail order KOT 180416-8 has been send', 'order', '2018-04-16 17:17:40'),
(1979, 2, '2 - stock item 1 has been sold', 'stock', '2018-04-16 17:17:44'),
(1980, 2, 'Cash payment for retail order has been made for the amount of Rs. 910', 'billing', '2018-04-16 17:17:44'),
(1981, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-04-17 10:17:30'),
(1982, 2, 'Table order KOT number 180417-1 has been send', 'order', '2018-04-17 10:29:51'),
(1983, 2, 'Table order KOT number 180417-2 has been send', 'order', '2018-04-17 10:30:04'),
(1984, 2, 'Table order KOT number 180417-3 has been send', 'order', '2018-04-17 10:38:55'),
(1985, 2, 'Table order KOT number 180417-4 has been send', 'order', '2018-04-17 10:41:43'),
(1986, 2, 'Table order KOT number 180417-5 has been send', 'order', '2018-04-17 10:42:36'),
(1987, 2, 'Table order KOT number 180417-6 has been send', 'order', '2018-04-17 10:48:54'),
(1988, 2, 'Table order KOT number 180417-7 has been send', 'order', '2018-04-17 10:50:53'),
(1989, 2, 'Table order KOT number 180417-8 has been send', 'order', '2018-04-17 10:53:40'),
(1990, 2, 'Table order KOT number 180417-9 has been send', 'order', '2018-04-17 10:54:06'),
(1991, 2, 'Table order KOT number 180417-10 has been send', 'order', '2018-04-17 10:56:36'),
(1992, 2, 'Table order KOT number 180417-11 has been send', 'order', '2018-04-17 11:01:44'),
(1993, 2, 'Table order KOT number 180417-12 has been send', 'order', '2018-04-17 11:02:05'),
(1994, 2, 'Table order KOT number 180417-13 has been send', 'order', '2018-04-17 11:07:44'),
(1995, 2, 'Table order KOT number 180417-14 has been send', 'order', '2018-04-17 11:08:28'),
(1996, 2, 'Table order KOT number 180417-15 has been send', 'order', '2018-04-17 11:09:47'),
(1997, 2, 'Table order KOT number 180417-16 has been send', 'order', '2018-04-17 11:11:51'),
(1998, 2, 'Table order KOT number 180417-17 has been send', 'order', '2018-04-17 11:13:10'),
(1999, 2, 'Table order KOT number 180417-18 has been send', 'order', '2018-04-17 11:14:52'),
(2000, 2, 'Table order KOT number 180417-19 has been send', 'order', '2018-04-17 11:16:42'),
(2001, 2, 'Table order KOT number 180417-20 has been send', 'order', '2018-04-17 11:26:15'),
(2002, 2, 'Table order KOT number 180417-21 has been send', 'order', '2018-04-17 11:28:27'),
(2003, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2018-04-17 15:09:21'),
(2004, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-04-17 15:09:22'),
(2005, 5, '<b>Staff</b> Logged onto the system', 'user', '2018-04-17 15:09:43'),
(2006, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-04-18 10:44:59'),
(2007, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2018-04-18 10:51:36'),
(2008, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-04-18 10:51:36'),
(2009, 5, '<b>Staff</b> Logged onto the system', 'user', '2018-04-18 10:51:42'),
(2010, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-04-23 12:26:56'),
(2011, 2, '10 - stock item 7 has been sold', 'stock', '2018-04-23 17:32:59'),
(2012, 2, '2 - stock item 6 has been sold', 'stock', '2018-04-23 17:32:59'),
(2013, 2, '50 - stock item 5 has been sold', 'stock', '2018-04-23 17:32:59'),
(2014, 2, '18 - stock item 1 has been sold', 'stock', '2018-04-23 17:32:59'),
(2015, 2, 'Cash payment for table order has been made for the amount of Rs. 13684', 'billing', '2018-04-23 17:33:04'),
(2016, 2, 'Table ''<b>Table - 2</b>'' has been closed ', 'table', '2018-04-23 17:33:05'),
(2017, 2, 'Table ''<b>Table - 2</b>'' has been occupied ', 'table', '2018-04-23 17:33:33'),
(2018, 2, 'Table order KOT number 180423-1 has been send', 'order', '2018-04-23 17:33:40'),
(2019, 2, 'Table ''<b>Table - 2</b>'' has been closed ', 'table', '2018-04-23 17:33:57'),
(2020, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-04-24 10:27:09'),
(2021, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2018-04-24 11:03:11'),
(2022, 2, 'Table order KOT number 180424-1 has been send', 'order', '2018-04-24 11:03:16'),
(2023, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2018-04-24 11:04:21'),
(2024, 2, 'Take away order KOT 180424-2 has been send', 'order', '2018-04-24 12:04:58'),
(2025, 2, 'Pick Up order KOT 180424-3 has been send', 'order', '2018-04-24 12:14:47'),
(2026, 2, 'Delivery order KOT 180424-4 has been send', 'order', '2018-04-24 12:15:46'),
(2027, 2, 'Retail order KOT 180424-5 has been send', 'order', '2018-04-24 12:17:15'),
(2028, 2, 'Table ''<b>Table - 15</b>'' has been occupied ', 'table', '2018-04-24 12:48:12'),
(2029, 2, 'Table order KOT number 180424-6 has been send', 'order', '2018-04-24 12:48:16'),
(2030, 2, 'Table order KOT number 180424-7 has been send', 'order', '2018-04-24 12:55:50'),
(2031, 2, 'Table order KOT number 180424-8 has been send', 'order', '2018-04-24 13:07:45'),
(2032, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-04-24 17:01:54'),
(2033, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-04-26 10:18:19'),
(2034, 2, '2 - stock item 1 has been sold', 'stock', '2018-04-26 11:31:35'),
(2035, 2, 'Cash payment for table order has been made for the amount of Rs. 1744', 'billing', '2018-04-26 11:31:37'),
(2036, 2, 'Table ''<b>Table - 15</b>'' has been closed ', 'table', '2018-04-26 11:31:37'),
(2037, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-05-01 16:10:37'),
(2038, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-05-15 16:43:49'),
(2039, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2018-05-15 16:51:24'),
(2040, 2, 'Table order KOT number 180515-1 has been send', 'order', '2018-05-15 16:51:28'),
(2041, 2, '1 - stock item 1 has been sold', 'stock', '2018-05-15 16:51:40'),
(2042, 2, 'Cash payment for table order has been made for the amount of Rs. 198', 'billing', '2018-05-15 16:51:41'),
(2043, 2, 'Table ''<b>Table - 1</b>'' has been closed ', 'table', '2018-05-15 16:51:50'),
(2044, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-05-16 11:53:12'),
(2045, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2018-05-16 11:53:23'),
(2046, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-05-16 11:53:24'),
(2047, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-05-16 11:54:23'),
(2048, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2018-05-16 11:54:27'),
(2049, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-05-16 11:54:28'),
(2050, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-05-28 11:34:24'),
(2051, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-05-31 10:45:19'),
(2052, 2, 'Table ''<b>Table - 1</b>'' has been occupied ', 'table', '2018-05-31 16:03:20'),
(2053, 2, 'Table order KOT number 180531-1 has been send', 'order', '2018-05-31 16:03:29'),
(2054, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-06-04 14:21:48'),
(2055, 2, 'Take away order KOT 180604-1 has been send', 'order', '2018-06-04 14:22:27'),
(2056, 2, '1 - stock item 1 has been sold', 'stock', '2018-06-04 14:23:51'),
(2057, 2, 'Cash payment for take away order has been made for the amount of Rs. 721', 'billing', '2018-06-04 14:23:52'),
(2058, 2, 'Take away order KOT 180604-2 has been send', 'order', '2018-06-04 14:24:20'),
(2059, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-06-07 11:09:46'),
(2060, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-06-13 11:38:48'),
(2061, 2, 'Take away order KOT 180613-1 has been send', 'order', '2018-06-13 11:39:40'),
(2062, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-06-14 10:49:52'),
(2063, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-06-15 10:43:10'),
(2064, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-06-20 11:01:18'),
(2065, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-06-21 14:28:43'),
(2066, 2, 'Take away order KOT 180621-1 has been send', 'order', '2018-06-21 14:42:37'),
(2067, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-07-04 10:19:29'),
(2068, 2, 'Table order KOT number 180704-1 has been send', 'order', '2018-07-04 10:19:44'),
(2069, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-07-09 16:25:57'),
(2070, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-07-19 11:37:14'),
(2071, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-07-19 12:06:38'),
(2072, 2, 'Table order KOT number 180719-1 has been send', 'order', '2018-07-19 15:13:51'),
(2073, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-07-20 11:55:37'),
(2074, 1, 'Database has been backuped by the user <b>Superadmin</b>', 'database', '2018-08-24 16:40:05'),
(2075, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-08-29 16:33:04'),
(2076, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-08-30 15:54:35'),
(2077, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-08-31 10:51:19'),
(2078, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2018-08-31 10:59:39'),
(2079, 2, 'Table order KOT number 180831-1 has been send', 'order', '2018-08-31 10:59:44'),
(2080, 2, 'Occupancy has been moved to the table ''<b>Table - 4</b>''', 'table', '2018-08-31 11:00:10'),
(2081, 2, 'Table ''<b>Table - 3</b>'' has been occupied ', 'table', '2018-08-31 11:00:39'),
(2082, 2, 'Table order KOT number 180831-2 has been send', 'order', '2018-08-31 11:00:43'),
(2083, 2, 'Occupancy has been moved to the table ''<b>Table - 22</b>''', 'table', '2018-08-31 11:00:56'),
(2084, 2, 'Occupancy has been moved to the table ''<b>Table - 14</b>''', 'table', '2018-08-31 11:04:37'),
(2085, 2, '1 - stock item 1 has been sold', 'stock', '2018-08-31 11:08:59'),
(2086, 2, 'Cash payment for table order has been made for the amount of Rs. 501', 'billing', '2018-08-31 11:09:00'),
(2087, 2, 'Table ''<b>Table - 14</b>'' has been closed ', 'table', '2018-08-31 11:09:00'),
(2088, 2, 'Table ''<b>Table - 14</b>'' has been occupied ', 'table', '2018-08-31 11:09:07'),
(2089, 2, 'Table order KOT number 180831-3 has been send', 'order', '2018-08-31 11:09:12'),
(2090, 2, 'Occupancy has been moved to the table ''<b>Table - 21</b>''', 'table', '2018-08-31 11:09:52'),
(2091, 2, 'Occupancy has been moved to the table ''<b>Table - 15</b>''', 'table', '2018-08-31 11:10:06'),
(2092, 2, 'Occupancy has been moved to the table ''<b>Table - 2</b>''', 'table', '2018-08-31 11:10:18'),
(2093, 2, 'Take away order KOT 180831-4 has been send', 'order', '2018-08-31 11:12:21'),
(2094, 2, 'Occupancy has been moved to the table ''<b>Table - 7</b>''', 'table', '2018-08-31 11:13:12'),
(2095, 2, 'Occupancy has been moved to the table ''<b>Table - 17</b>''', 'table', '2018-08-31 11:13:57'),
(2096, 2, 'Occupancy has been moved to the table ''<b>Table - 9</b>''', 'table', '2018-08-31 11:14:25'),
(2097, 2, 'Occupancy has been moved to the table ''<b>Table - 4</b>''', 'table', '2018-08-31 11:17:21'),
(2098, 2, 'Occupancy has been moved to the table ''<b>Table - 8</b>''', 'table', '2018-08-31 11:17:30'),
(2099, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2018-08-31 11:22:52'),
(2100, 2, 'Table order KOT number 180831-5 has been send', 'order', '2018-08-31 11:22:57'),
(2101, 2, 'Occupancy has been moved to the table ''<b>Table - 2</b>''', 'table', '2018-08-31 11:23:09'),
(2102, 2, 'Table ''<b>Table - 20</b>'' has been occupied ', 'table', '2018-08-31 11:23:32'),
(2103, 2, 'Table order KOT number 180831-6 has been send', 'order', '2018-08-31 11:23:45'),
(2104, 2, 'Occupancy has been moved to the table ''<b>Table - 6</b>''', 'table', '2018-08-31 11:38:06'),
(2105, 1, 'Database has been backuped by the user <b>Superadmin</b>', 'database', '2018-09-21 12:00:10'),
(2106, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-09-21 12:00:17'),
(2107, 2, 'Updated user detail of -sugen''sugen'' from ''30'' to ''5''', 'user', '2018-09-21 12:00:42'),
(2108, 2, 'Database has been backuped by the user <b>Administrator</b>', 'database', '2018-09-21 12:01:25'),
(2109, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-09-21 12:01:25'),
(2110, 5, '<b>Staff</b> Logged onto the system', 'user', '2018-09-21 12:01:35'),
(2111, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-09-21 16:35:22'),
(2112, 2, 'Take away order KOT 180921-1 has been send', 'order', '2018-09-21 16:50:29'),
(2113, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-10-04 16:48:53'),
(2114, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-10-08 12:13:19'),
(2115, 2, 'Occupancy has been moved to the table ''<b>Table - 15</b>''', 'table', '2018-10-08 12:13:35'),
(2116, 2, 'Occupancy has been moved to the table ''<b>Table - 22</b>''', 'table', '2018-10-08 12:13:48'),
(2117, 2, 'Occupancy has been moved to the table ''<b>Table - 4</b>''', 'table', '2018-10-08 12:13:58'),
(2118, 2, 'Occupancy has been moved to the table ''<b>Table - 1</b>''', 'table', '2018-10-08 12:14:06'),
(2119, 2, 'Occupancy has been moved to the table ''<b>Table - 3</b>''', 'table', '2018-10-08 12:14:17'),
(2120, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-10-10 10:51:50'),
(2121, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-10-11 11:38:49'),
(2122, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-10-11 11:38:56'),
(2123, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-10-11 12:33:13'),
(2124, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-10-11 12:33:21'),
(2125, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-10-11 12:34:02'),
(2126, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-10-11 12:34:08'),
(2127, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-10-11 12:42:44'),
(2128, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-10-11 12:42:50'),
(2129, 2, '<b>Administrator</b> Logged out of the system', 'user', '2018-10-11 12:49:58'),
(2130, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-10-11 12:50:09'),
(2131, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-10-11 14:44:02'),
(2132, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-10-12 12:13:51'),
(2133, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-11-01 12:22:53'),
(2134, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-11-02 11:33:00'),
(2135, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-11-15 14:45:05'),
(2136, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-11-16 08:41:23'),
(2137, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-11-16 09:23:17'),
(2138, 2, 'New table has been created named Table - 23', 'table', '2018-11-16 09:23:48'),
(2139, 2, 'Menu category order has been updated', 'menu', '2018-11-16 09:25:51'),
(2140, 2, 'Menu category order has been updated', 'menu', '2018-11-16 09:26:01'),
(2141, 2, '10 stock item 1 has been purchased', 'stock', '2018-11-16 09:32:11'),
(2142, 2, 'Utensils item named -Plate has been added', 'misc', '2018-11-16 09:33:43'),
(2143, 2, 'Utensils item named -Spoon has been added', 'misc', '2018-11-16 09:33:43'),
(2144, 2, 'New table has been created named Table - 24', 'table', '2018-11-16 09:35:35'),
(2145, 2, 'New table has been created named Table - 25', 'table', '2018-11-16 09:35:46'),
(2146, 2, 'Table ''<b>Table - 11</b>'' has been occupied ', 'table', '2018-11-16 09:36:22'),
(2147, 2, 'Table order KOT number 181116-1 has been send', 'order', '2018-11-16 09:37:24'),
(2148, 2, 'New debtor named -person 1'' has been created', 'debtor', '2018-11-16 09:43:02'),
(2149, 2, '5 - stock item 1 has been sold', 'stock', '2018-11-16 09:44:22'),
(2150, 2, 'Credit table order has been made for the amount of Rs. 891 on the debtor named -person 1', 'billing', '2018-11-16 09:44:23'),
(2151, 2, 'Table ''<b>Table - 11</b>'' has been closed ', 'table', '2018-11-16 09:44:24'),
(2152, 2, 'Booking has been made', 'table', '2018-11-16 09:46:12'),
(2153, 2, 'Booked table Table - 15 has been occupied ', 'table', '2018-11-16 09:46:53'),
(2154, 2, 'New obstacle has been created named -Obstacle - 6 on the floor no. 1', 'table', '2018-11-16 09:55:04'),
(2155, 2, 'Debtor named -sugen paid the amount of Rs. 10000', 'debtor', '2018-11-16 09:56:30'),
(2156, 2, 'Table order KOT number 181116-2 has been send', 'order', '2018-11-16 09:57:20'),
(2157, 2, 'Table ''<b>Table - 21</b>'' has been occupied ', 'table', '2018-11-16 09:57:31'),
(2158, 2, 'Table order KOT number 181116-3 has been send', 'order', '2018-11-16 09:58:04'),
(2159, 2, 'Setting has been updated from 10 to 0', 'setting', '2018-11-16 10:04:01'),
(2160, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-11-21 09:13:53'),
(2161, 2, '1 - stock item 1 has been sold', 'stock', '2018-11-21 09:29:01'),
(2162, 2, 'Credit table order has been made for the amount of Rs. 803 on the debtor named -sugen', 'billing', '2018-11-21 09:29:06'),
(2163, 2, 'Table ''<b>Table - 20</b>'' has been closed ', 'table', '2018-11-21 09:29:07'),
(2164, 2, 'Debtor named -sugen paid the amount of Rs. 1000', 'debtor', '2018-11-21 09:31:32'),
(2165, 2, 'Setting has been updated from 10 to 0', 'setting', '2018-11-21 09:34:13'),
(2166, 2, 'Setting has been updated from 10 to 10', 'setting', '2018-11-21 09:34:21'),
(2167, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-11-26 10:29:53'),
(2168, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-11-26 13:49:28'),
(2169, 2, 'User named - demo'' with username - demohas been created', 'user', '2018-11-26 13:50:45'),
(2170, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-11-28 11:46:36'),
(2171, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-12-04 09:32:08'),
(2172, 2, 'New table has been created named Table - 26', 'table', '2018-12-04 09:34:23'),
(2173, 2, 'New obstacle has been created named -Obstacle - 7 on the floor no. 1', 'table', '2018-12-04 09:34:30'),
(2174, 2, 'Menu category order has been updated', 'menu', '2018-12-04 09:37:11'),
(2175, 2, 'Menu category order has been updated', 'menu', '2018-12-04 09:37:13'),
(2176, 2, 'Utensils item named -Sdfhkl has been added', 'misc', '2018-12-04 09:49:04'),
(2177, 2, 'Utensils item named -Dsfghjhkl has been added', 'misc', '2018-12-04 09:49:04'),
(2178, 2, 'New table has been created named Table - 27', 'table', '2018-12-04 09:51:44'),
(2179, 2, 'New table has been created named Table - 28', 'table', '2018-12-04 09:51:54'),
(2180, 2, 'New table has been created named Table - 29', 'table', '2018-12-04 09:51:57'),
(2181, 2, 'New table has been created named Table - 30', 'table', '2018-12-04 09:54:17'),
(2182, 2, 'Setting has been updated from 10 to 0', 'setting', '2018-12-04 09:56:42');
INSERT INTO `audit_log` (`id`, `created_by`, `action`, `type`, `created_at`) VALUES
(2183, 2, 'Setting has been updated from 10 to 10', 'setting', '2018-12-04 09:56:48'),
(2184, 2, 'Booking has been made', 'table', '2018-12-04 09:59:28'),
(2185, 2, 'Table ''<b>Table - 29</b>'' has been occupied ', 'table', '2018-12-04 10:02:34'),
(2186, 2, 'Table order KOT number 181204-1 has been send', 'order', '2018-12-04 10:03:23'),
(2187, 2, 'Retail order KOT 181204-2 has been send', 'order', '2018-12-04 10:18:46'),
(2188, 2, 'Table ''<b>Table - 24</b>'' has been occupied ', 'table', '2018-12-04 10:20:30'),
(2189, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-12-04 15:06:18'),
(2190, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-12-05 09:22:41'),
(2191, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-12-07 10:25:17'),
(2192, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-12-10 16:15:22'),
(2193, 2, '<b>Administrator</b> Logged onto the system', 'user', '2018-12-11 09:58:59'),
(2194, 2, 'Setting has been updated from gaurav@klientscape.com to test@gmail.com', 'setting', '2018-12-11 09:59:33'),
(2195, 2, '1 - stock item 1 has been sold', 'stock', '2018-12-11 10:16:59'),
(2196, 2, 'Cash payment for table order has been made for the amount of Rs. 418', 'billing', '2018-12-11 10:17:05'),
(2197, 2, 'Table ''<b>Table - 6</b>'' has been closed ', 'table', '2018-12-11 10:17:06'),
(2198, 2, 'Table ''<b>Table - 6</b>'' has been occupied ', 'table', '2018-12-11 10:17:15'),
(2199, 2, 'Table order KOT number 181211-1 has been send', 'order', '2018-12-11 10:17:22'),
(2200, 2, '1 - stock item 1 has been sold', 'stock', '2018-12-11 10:17:56'),
(2201, 2, 'Cash payment for table order has been made for the amount of Rs. 418', 'billing', '2018-12-11 10:17:57'),
(2202, 2, 'Table ''<b>Table - 6</b>'' has been closed ', 'table', '2018-12-11 10:17:57'),
(2203, 2, '2 - stock item 1 has been sold', 'stock', '2018-12-11 10:18:12'),
(2204, 2, 'Cash payment for table order has been made for the amount of Rs. 699', 'billing', '2018-12-11 10:18:13'),
(2205, 2, 'Table ''<b>Table - 3</b>'' has been closed ', 'table', '2018-12-11 10:18:14'),
(2206, 2, 'Table ''<b>Table - 3</b>'' has been occupied ', 'table', '2018-12-11 10:18:20'),
(2207, 2, 'Table order KOT number 181211-2 has been send', 'order', '2018-12-11 10:18:31');

-- --------------------------------------------------------

--
-- Table structure for table `booked_tables`
--

CREATE TABLE IF NOT EXISTS `booked_tables` (
`id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `customer_pax` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `floor_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `datetime` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_edited_on` datetime NOT NULL,
  `last_edited_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booked_tables`
--

INSERT INTO `booked_tables` (`id`, `customer_name`, `customer_phone`, `customer_pax`, `table_id`, `floor_id`, `start_date`, `start_time`, `end_time`, `datetime`, `status`, `created_on`, `created_by`, `last_edited_on`, `last_edited_by`) VALUES
(3, 'test123', '9845478569', 3, 7, 2, '2017-05-23', '12:45:00', '14:00:00', '2017-05-23 12:45:00', 0, '2017-05-23 12:51:51', 2, '2017-05-23 12:51:51', 2),
(4, 'sushov', '9851058986', 50, 1, 1, '2017-07-17', '13:00:00', '13:00:00', '2017-07-17 13:00:00', 0, '2017-07-17 15:02:46', 2, '2017-07-17 15:02:46', 2),
(5, 'test', '4545454', 50, 17, 2, '2017-07-17', '13:00:00', '13:00:00', '2017-07-17 13:00:00', 0, '2017-07-17 15:06:09', 2, '2017-07-17 15:06:09', 2),
(6, 'asdf', '123456789', 1, 4, 1, '2017-12-12', '12:00:00', '13:00:00', '2017-12-12 12:00:00', 0, '2017-12-12 12:21:14', 2, '2017-12-12 12:21:14', 2),
(7, 'asdf', '123456789', 1, 1, 1, '2017-12-12', '12:00:00', '13:00:00', '2017-12-12 12:00:00', 0, '2017-12-12 12:21:33', 2, '2017-12-12 12:21:33', 2),
(8, 'asdf', '123121212', 1, 1, 1, '2017-12-12', '14:00:00', '15:00:00', '2017-12-12 14:00:00', 0, '2017-12-12 12:23:29', 2, '2017-12-12 12:23:29', 2),
(9, 'test', '1234567', 1, 4, 1, '2017-12-18', '12:00:00', '14:00:00', '2017-12-18 12:00:00', 0, '2017-12-18 11:56:37', 2, '2017-12-18 11:56:37', 2),
(10, 'asdf', '134123123', 2, 15, 1, '2018-11-17', '13:00:00', '14:00:00', '2018-11-17 13:00:00', 1, '2018-11-16 09:46:12', 2, '2018-11-16 09:46:12', 2),
(11, 'asdf', '23142578', 10, 29, 3, '2018-12-05', '13:00:00', '14:00:00', '2018-12-05 13:00:00', 0, '2018-12-04 09:59:28', 2, '2018-12-04 09:59:28', 2);

-- --------------------------------------------------------

--
-- Table structure for table `break_down_items`
--

CREATE TABLE IF NOT EXISTS `break_down_items` (
`id` int(11) NOT NULL,
  `break_down_receipt_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `break_down_items`
--

INSERT INTO `break_down_items` (`id`, `break_down_receipt_id`, `item_id`, `quantity`, `price`, `type`) VALUES
(1, 2, 1, 1, 100, 0),
(2, 4, 1, 2, 100, 0),
(3, 12, 1, 2, 100, 0),
(4, 14, 2, 2, 200, 0),
(6, 20, 1, 1, 100, 0),
(7, 22, 1, 2, 100, 0),
(8, 23, 1, 1, 100, 0),
(9, 25, 1, 2, 100, 0),
(10, 27, 2, 1, 200, 0),
(11, 29, 1, 1, 100, 0),
(12, 31, 1, 2, 100, 0),
(14, 37, 1, 1, 100, 0),
(15, 41, 1, 1, 100, 0),
(16, 48, 1, 1, 100, 0),
(17, 54, 1, 1, 100, 0),
(18, 56, 1, 1, 100, 0),
(19, 60, 1, 1, 100, 0),
(20, 63, 1, 1, 100, 0),
(21, 66, 1, 1, 100, 0),
(22, 69, 1, 1, 100, 0),
(23, 71, 1, 1, 100, 0),
(24, 73, 1, 1, 100, 0),
(25, 75, 1, 2, 100, 0),
(26, 76, 1, 1, 100, 0),
(27, 84, 1, 1, 100, 0),
(28, 85, 1, 1, 100, 0),
(29, 95, 1, 1, 100, 0),
(30, 95, 11, 1, 100, 0),
(31, 99, 1, 1, 100, 0),
(32, 102, 1, 2, 100, 0),
(33, 102, 31, 2, 300, 0),
(34, 102, 27, 1, 200, 0),
(35, 102, 12, 1, 200, 0),
(36, 102, 28, 2, 50, 0),
(37, 148, 31, 1, 300, 0),
(38, 151, 1, 1, 180, 0),
(39, 153, 1, 1, 180, 0),
(40, 155, 1, 1, 180, 0),
(41, 201, 1, 1, 180, 0),
(42, 212, 4, 1, 75, 0),
(43, 292, 1, 1, 180, 0);

-- --------------------------------------------------------

--
-- Table structure for table `break_down_receipt`
--

CREATE TABLE IF NOT EXISTS `break_down_receipt` (
`id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `occupy_id` int(11) NOT NULL,
  `retail_id` int(11) NOT NULL,
  `take_away_id` int(11) NOT NULL,
  `pick_up_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `sub_total` float NOT NULL,
  `discount_rate` float NOT NULL,
  `discount_amount` float NOT NULL,
  `service_charge_rate` float NOT NULL,
  `service_charge_amount` float NOT NULL,
  `taxable_amount` float NOT NULL,
  `vat_rate` float NOT NULL,
  `vat_amount` float NOT NULL,
  `total` float NOT NULL,
  `round_value` float NOT NULL,
  `received_amount` float NOT NULL,
  `change_amount` float NOT NULL,
  `paid_against` int(11) NOT NULL,
  `is_credit_paid` tinyint(4) NOT NULL,
  `is_payment_return` tinyint(4) NOT NULL,
  `cheque_no` varchar(50) NOT NULL,
  `payment_type` tinyint(4) NOT NULL,
  `debtor_payment_type` tinyint(4) NOT NULL,
  `debtor_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `break_down_receipt`
--

INSERT INTO `break_down_receipt` (`id`, `invoice_no`, `order_id`, `occupy_id`, `retail_id`, `take_away_id`, `pick_up_id`, `delivery_id`, `customer_name`, `sub_total`, `discount_rate`, `discount_amount`, `service_charge_rate`, `service_charge_amount`, `taxable_amount`, `vat_rate`, `vat_amount`, `total`, `round_value`, `received_amount`, `change_amount`, `paid_against`, `is_credit_paid`, `is_payment_return`, `cheque_no`, `payment_type`, `debtor_payment_type`, `debtor_id`, `type`, `created_on`, `created_by`) VALUES
(1, 1, 1515564580, 0, 0, 0, 0, 0, '', 455, 0, 0, 10, 45.5, 0, 0, 0, 501, 0, 501, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-01-10 11:54:41', 2),
(2, 2, 1515647662, 0, 0, 0, 0, 0, 'Asdasdf', 455, 0, 0, 10, 45.5, 0, 0, 0, 501, 0, 501, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-01-11 10:59:22', 2),
(3, 3, 1515647663, 0, 0, 0, 0, 0, 'Asdasdf', 100, 0, 0, 0, 0, 0, 0, 0, 100, 0, 100, 0, 0, 0, 0, '', 0, 0, 0, 5, '2018-01-11 10:59:23', 2),
(4, 4, 1515647682, 0, 0, 0, 0, 0, 'Sugen', 455, 0, 0, 10, 45.5, 0, 0, 0, 501, 0, 0, 0, 0, 0, 0, '', 1, 0, 1, 4, '2018-01-11 10:59:43', 2),
(5, 5, 1515647797, 0, 0, 0, 0, 0, 'Sugen', 455, 0, 0, 10, 45.5, 0, 0, 0, 501, 0, 0, 0, 0, 0, 0, '', 1, 0, 1, 4, '2018-01-11 11:01:37', 2),
(6, 6, 1515647798, 0, 0, 0, 0, 0, 'Asdadsf', 0, 0, 0, 0, 0, 0, 0, 0, 100, 0, 100, 0, 0, 0, 0, '', 1, 0, 0, 6, '2018-01-11 11:01:38', 2),
(7, 7, 1515648077, 0, 0, 0, 0, 0, 'Adfasd', 655, 0, 0, 10, 65.5, 0, 0, 0, 721, 0, 721, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-01-11 11:06:17', 2),
(8, 8, 1515648078, 0, 0, 0, 0, 0, 'Adfasd', 100, 0, 0, 0, 0, 0, 0, 0, 100, 0, 100, 0, 0, 0, 0, '', 0, 0, 0, 5, '2018-01-11 11:06:18', 2),
(9, 9, 1515648109, 0, 0, 0, 0, 0, '', 380, 0, 0, 10, 38, 0, 0, 0, 418, 0, 418, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-01-11 11:06:49', 2),
(10, 10, 1515648205, 0, 0, 0, 0, 0, '', 380, 0, 0, 10, 38, 0, 0, 0, 418, 0, 418, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-01-11 11:08:25', 2),
(11, 11, 1515648294, 0, 0, 0, 0, 0, '', 380, 0, 0, 10, 38, 0, 0, 0, 418, 0, 418, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-01-11 11:09:54', 2),
(12, 12, 1515648295, 0, 0, 0, 0, 0, '', 275, 0, 0, 10, 27.5, 0, 0, 0, 303, 0, 303, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-01-11 11:09:55', 2),
(13, 13, 1515648646, 0, 0, 0, 0, 0, '', 380, 0, 0, 10, 38, 0, 0, 0, 418, 0, 418, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-01-11 11:15:46', 2),
(14, 14, 1515648960, 0, 0, 0, 0, 0, '', 380, 0, 0, 10, 38, 0, 0, 0, 418, 0, 418, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-01-11 11:21:00', 2),
(15, 15, 1515648989, 0, 0, 0, 0, 0, '', 380, 0, 0, 10, 38, 0, 0, 0, 418, 0, 418, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-01-11 11:21:29', 2),
(16, 16, 1515648991, 0, 0, 0, 0, 0, '', 275, 0, 0, 10, 27.5, 0, 0, 0, 303, 0, 303, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-01-11 11:21:30', 2),
(17, 17, 1515667132, 0, 0, 0, 0, 0, '', 455, 0, 0, 10, 45.5, 0, 0, 0, 501, 0, 501, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-01-11 16:23:53', 2),
(18, 18, 1515992324, 0, 0, 0, 0, 0, '', 455, 0, 0, 10, 45.5, 0, 0, 0, 501, 0, 501, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-01-15 10:43:44', 2),
(19, 19, 1522212593, 0, 0, 0, 0, 0, '', 64868300, 0, 0, 10, 6486830, 0, 0, 0, 71355100, 0, 71355100, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-03-28 10:34:53', 2),
(20, 20, 1523437832, 0, 0, 0, 0, 0, '', 1025, 0, 0, 10, 102.5, 0, 0, 0, 1128, 0, 1128, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-04-11 14:55:33', 2),
(21, 21, 1523437928, 0, 0, 0, 0, 0, '', 1310, 0, 0, 10, 131, 0, 0, 0, 1441, 0, 1441, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-04-11 14:57:08', 2),
(22, 22, 1523438357, 0, 0, 0, 0, 0, '', 1310, 0, 0, 10, 131, 0, 0, 0, 1441, 0, 1441, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-04-11 15:04:17', 2),
(23, 23, 1523438717, 0, 0, 0, 0, 0, '', 425, 0, 0, 10, 42.5, 0, 0, 0, 468, 0, 468, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-04-11 15:10:17', 2),
(24, 24, 1523439315, 0, 0, 0, 0, 0, '', 2620, 0, 0, 10, 262, 0, 0, 0, 2882, 0, 2882, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-04-11 15:20:15', 2),
(25, 25, 1523439978, 0, 0, 0, 0, 0, '', 1310, 0, 0, 10, 131, 0, 0, 0, 1441, 0, 1441, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-04-11 15:31:19', 2),
(26, 26, 1523441989, 0, 0, 0, 0, 0, '', 900, 0, 0, 10, 90, 0, 0, 0, 990, 0, 990, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-04-11 16:04:49', 2),
(27, 27, 1523442523, 0, 0, 0, 0, 0, '', 1055, 0, 0, 10, 105.5, 0, 0, 0, 1161, 0, 1161, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-04-11 16:13:43', 2),
(28, 28, 1523513052, 0, 0, 0, 0, 0, '', 3185, 0, 0, 10, 318.5, 0, 0, 0, 3504, 0, 3504, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-04-12 11:49:12', 2),
(29, 29, 1523513859, 0, 0, 0, 0, 0, '', 275, 0, 0, 10, 27.5, 0, 0, 0, 303, 0, 303, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-04-12 12:02:39', 2),
(30, 30, 1523515134, 0, 0, 0, 0, 0, '', 910, 0, 0, 10, 91, 0, 0, 0, 1001, 0, 1001, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-04-12 12:23:54', 2),
(31, 31, 1523598408, 0, 0, 0, 0, 0, '', 2095, 0, 0, 10, 209.5, 0, 0, 0, 2305, 0, 2305, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-04-13 11:31:48', 2),
(32, 32, 1523598511, 0, 0, 0, 0, 0, '', 730, 0, 0, 10, 73, 0, 0, 0, 803, 0, 803, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-04-13 11:33:32', 2),
(33, 33, 1523616253, 0, 0, 0, 0, 0, '', 1185, 0, 0, 10, 118.5, 0, 0, 0, 1304, 0, 1304, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-04-13 16:29:13', 2),
(34, 34, 1523857173, 0, 0, 0, 0, 0, '', 910, 0, 0, 10, 91, 0, 0, 0, 1001, 0, 1001, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-04-16 11:24:34', 2),
(35, 35, 1523858350, 0, 0, 0, 0, 0, '', 910, 0, 0, 10, 91, 0, 0, 0, 1001, 0, 1001, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-04-16 11:44:10', 2),
(36, 36, 1523860088, 0, 0, 0, 0, 0, '', 910, 0, 0, 10, 91, 0, 0, 0, 1001, 0, 1001, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-04-16 12:13:08', 2),
(37, 37, 1523878364, 0, 0, 0, 0, 0, '', 910, 0, 0, 0, 0, 0, 0, 0, 910, 0, 910, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-04-16 17:17:44', 2),
(38, 38, 1524484078, 0, 0, 0, 0, 0, '', 12440, 0, 0, 10, 1244, 0, 0, 0, 13684, 0, 13684, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-04-23 17:32:59', 2),
(39, 39, 1524721595, 0, 0, 0, 0, 0, '', 1585, 0, 0, 10, 158.5, 0, 0, 0, 1744, 0, 1744, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-04-26 11:31:35', 2),
(40, 40, 1526382400, 0, 0, 0, 0, 0, '', 180, 0, 0, 10, 18, 0, 0, 0, 198, 0, 198, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-05-15 16:51:40', 2),
(41, 41, 1528101530, 0, 0, 0, 0, 0, 'Sugen', 655, 0, 0, 10, 65.5, 0, 0, 0, 721, 0, 721, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-06-04 14:23:51', 2),
(42, 42, 1535693038, 0, 0, 0, 0, 0, '', 455, 0, 0, 10, 45.5, 0, 0, 0, 501, 0, 501, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-08-31 11:08:59', 2),
(43, 43, 1542340762, 0, 0, 0, 0, 0, 'Person 1', 900, 10, 90, 10, 81, 0, 0, 0, 891, 0, 0, 0, 0, 0, 0, '', 1, 0, 5, 4, '2018-11-16 09:44:22', 2),
(44, 44, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 10000, 0, 0, 0, 0, 1, 0, '', 0, 0, 1, 0, '2018-11-16 09:56:30', 2),
(45, 45, 1542771841, 0, 0, 0, 0, 0, 'Sugen', 730, 0, 0, 10, 73, 0, 0, 0, 803, 0, 0, 0, 0, 0, 0, '', 1, 0, 1, 4, '2018-11-21 09:29:01', 2),
(46, 46, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 1000, 0, 0, 0, 0, 1, 0, '', 0, 0, 1, 0, '2018-11-21 09:31:32', 2),
(47, 47, 1544502718, 0, 0, 0, 0, 0, '', 380, 0, 0, 10, 38, 0, 0, 0, 418, 0, 418, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-12-11 10:16:59', 2),
(48, 48, 1544502776, 0, 0, 0, 0, 0, '', 380, 0, 0, 10, 38, 0, 0, 0, 418, 0, 418, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-12-11 10:17:56', 2),
(49, 49, 1544502792, 0, 0, 0, 0, 0, '', 635, 0, 0, 10, 63.5, 0, 0, 0, 699, 0, 699, 0, 0, 0, 0, '', 0, 0, 0, 3, '2018-12-11 10:18:12', 2);

-- --------------------------------------------------------

--
-- Table structure for table `capacity`
--

CREATE TABLE IF NOT EXISTS `capacity` (
`id` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `capacity`
--

INSERT INTO `capacity` (`id`, `capacity`, `created_on`, `created_by`) VALUES
(1, 50, '2017-04-13 10:34:43', 2),
(2, 100, '2018-12-05 10:09:30', 2);

-- --------------------------------------------------------

--
-- Table structure for table `close_day_log`
--

CREATE TABLE IF NOT EXISTS `close_day_log` (
`id` int(11) NOT NULL,
  `log_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `close_day_log`
--

INSERT INTO `close_day_log` (`id`, `log_date`, `created_by`) VALUES
(1, '2017-06-08 16:49:23', 2),
(2, '2017-06-08 16:49:30', 2),
(3, '2017-06-08 16:49:37', 2),
(4, '2017-06-13 12:41:18', 2),
(5, '2017-06-13 12:43:46', 2),
(6, '2017-12-25 12:58:49', 2),
(7, '2018-01-09 16:41:03', 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `debtors`
--

CREATE TABLE IF NOT EXISTS `debtors` (
`id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `pan` varchar(15) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `credit_amount` double NOT NULL,
  `paid_amount` float NOT NULL,
  `return_amount` float NOT NULL,
  `opening_balance` float NOT NULL,
  `last_edited_on` datetime NOT NULL,
  `created_on` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debtors`
--

INSERT INTO `debtors` (`id`, `name`, `pan`, `phone`, `address`, `credit_amount`, `paid_amount`, `return_amount`, `opening_balance`, `last_edited_on`, `created_on`, `is_active`) VALUES
(1, 'sugen', '11991199', '9819119911', 'lazimpat', 31613, 12200, 600, 11376, '2017-07-17 17:27:09', '2017-04-13 12:09:11', 1),
(2, 'binit', '0', '0980001100', 'thapathali', 0, 0, 0, 2373, '0000-00-00 00:00:00', '2017-05-16 15:35:53', 1),
(3, 'abhijeet', '0', '983746583', 'bishalnagar', -498, 0, 0, 249, '0000-00-00 00:00:00', '2017-05-23 12:07:57', 1),
(4, 'Sushov', '999999999', '9851058986', 'ratopul', 0, 0, 0, 2000, '2017-08-03 13:07:01', '2017-07-17 17:24:40', 1),
(5, 'person 1', '234234234', '23423434', 'dfasdf', 891, 0, 0, 0, '0000-00-00 00:00:00', '2018-11-16 09:43:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
`id` int(11) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_pan` int(11) NOT NULL,
  `customer_address` varchar(150) NOT NULL,
  `customer_phone` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_confirmed` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `customer_name`, `customer_pan`, `customer_address`, `customer_phone`, `created_on`, `created_by`, `status`, `is_confirmed`) VALUES
(1, 'asdasdf', 123123123, 'asdfasdfasdf', '1123123', '2018-01-11 10:58:35', 2, 1, 0),
(2, 'asdadsf', 123123123, 'asdfasdf', '1231231', '2018-01-11 10:59:30', 2, 1, 0),
(3, 'adfasd', 234234234, '234sdfsdfg', '234234234', '2018-01-11 11:05:54', 2, 1, 0),
(4, 'test', 0, 'test', '123456789', '2018-04-24 12:15:40', 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `design_invoice`
--

CREATE TABLE IF NOT EXISTS `design_invoice` (
`id` tinyint(4) NOT NULL,
  `show_customer_name` tinyint(4) NOT NULL,
  `show_pan_no` tinyint(4) NOT NULL,
  `show_amount_text` tinyint(4) NOT NULL,
  `show_greeting_note` tinyint(4) NOT NULL,
  `show_operator_name` tinyint(4) NOT NULL,
  `show_customer_address` tinyint(4) NOT NULL,
  `width` float NOT NULL,
  `last_edited_on` datetime NOT NULL,
  `last_edited_by` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `design_invoice`
--

INSERT INTO `design_invoice` (`id`, `show_customer_name`, `show_pan_no`, `show_amount_text`, `show_greeting_note`, `show_operator_name`, `show_customer_address`, `width`, `last_edited_on`, `last_edited_by`) VALUES
(1, 1, 1, 1, 1, 1, 1, 750, '2017-12-18 16:18:28', 2);

-- --------------------------------------------------------

--
-- Table structure for table `duplicate_bill`
--

CREATE TABLE IF NOT EXISTS `duplicate_bill` (
`id` int(11) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `is_printed` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `duplicate_bill`
--

INSERT INTO `duplicate_bill` (`id`, `order_id`, `is_printed`, `created_by`, `created_on`) VALUES
(1, 1515564580, 1, 2, '2018-01-10 12:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `fiscal_year`
--

CREATE TABLE IF NOT EXISTS `fiscal_year` (
`id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fiscal_year`
--

INSERT INTO `fiscal_year` (`id`, `start_date`, `end_date`, `is_active`) VALUES
(1, '2016-12-19', '2017-12-18', 1),
(7, '2017-12-19', '2018-12-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `floor`
--

CREATE TABLE IF NOT EXISTS `floor` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `display_order` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `floor`
--

INSERT INTO `floor` (`id`, `name`, `display_order`, `status`, `created_on`, `created_by`) VALUES
(1, 'first floor', 1, 1, '2017-04-13 10:38:35', 2),
(2, 'second floor', 2, 1, '2017-05-10 13:04:12', 2),
(3, 'third section', 3, 1, '2017-05-10 13:04:39', 2),
(4, 'fourth floor', 4, 1, '2017-05-10 13:09:36', 2),
(5, 'bar section', 5, 1, '2017-07-31 11:14:52', 2),
(6, 'test', 6, 1, '2017-12-25 12:35:39', 2);

-- --------------------------------------------------------

--
-- Table structure for table `foc`
--

CREATE TABLE IF NOT EXISTS `foc` (
`id` int(11) NOT NULL,
  `foc_no` int(11) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_pan` varchar(15) NOT NULL,
  `customer_address` varchar(150) NOT NULL,
  `customer_pax` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `floor_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foc`
--

INSERT INTO `foc` (`id`, `foc_no`, `customer_name`, `customer_pan`, `customer_address`, `customer_pax`, `table_id`, `floor_id`, `created_on`, `created_by`) VALUES
(1, 1, 'FOC Customer', '0', '', 0, 1, 1, '2017-04-13 13:36:49', 2),
(2, 2, 'FOC Customer', '0', '', 0, 1, 1, '2017-04-13 13:44:39', 2),
(3, 3, 'FOC Customer', '0', '', 2, 1, 1, '2017-04-18 11:33:30', 2),
(4, 4, 'FOC Customer', '0', '', 0, 4, 1, '2017-07-18 17:00:23', 2);

-- --------------------------------------------------------

--
-- Table structure for table `foc_items`
--

CREATE TABLE IF NOT EXISTS `foc_items` (
`id` int(11) NOT NULL,
  `foc_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foc_items`
--

INSERT INTO `foc_items` (`id`, `foc_id`, `item_id`, `quantity`, `price`, `type`) VALUES
(1, 1, 1, 2, 100, 0),
(2, 1, 11, 2, 100, 0),
(3, 1, 26, 2, 100, 0),
(4, 2, 1, 2, 100, 0),
(5, 2, 1, 3, 200, 1),
(6, 2, 2, 3, 200, 1),
(7, 2, 11, 2, 100, 0),
(8, 3, 1, 2, 100, 0),
(9, 3, 1, 5, 200, 1),
(10, 3, 2, 5, 200, 1),
(11, 3, 11, 4, 100, 0),
(12, 3, 12, 2, 200, 0),
(13, 3, 4, 2, 75, 0),
(14, 3, 13, 1, 50, 0),
(15, 3, 28, 1, 50, 0),
(16, 4, 1, 2, 180, 0),
(17, 4, 1, 1, 200, 1),
(18, 4, 4, 1, 75, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kot`
--

CREATE TABLE IF NOT EXISTS `kot` (
`id` int(11) NOT NULL,
  `display_number` varchar(100) NOT NULL,
  `table_id` int(11) NOT NULL,
  `floor_id` int(11) NOT NULL,
  `occupy_id` int(11) NOT NULL,
  `retail_id` int(11) NOT NULL,
  `take_away_id` int(11) NOT NULL,
  `pick_up_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `foc_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `kitchen_status` tinyint(4) NOT NULL,
  `return_against` int(11) NOT NULL,
  `return_against_display_number` varchar(100) NOT NULL,
  `return_note` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kot`
--

INSERT INTO `kot` (`id`, `display_number`, `table_id`, `floor_id`, `occupy_id`, `retail_id`, `take_away_id`, `pick_up_id`, `delivery_id`, `order_id`, `foc_id`, `created_on`, `created_by`, `status`, `kitchen_status`, `return_against`, `return_against_display_number`, `return_note`) VALUES
(1, '180110-1', 4, 1, 0, 0, 0, 0, 0, 1515564580, 0, '2018-01-10 11:54:25', 2, 1, 1, 0, '', ''),
(2, '180111-1', 0, 0, 0, 0, 1, 0, 0, 0, 0, '2018-01-11 10:58:19', 2, 0, 1, 0, '', ''),
(3, '180111-2', 0, 0, 0, 0, 0, 0, 0, 1515647662, 0, '2018-01-11 10:59:17', 2, 1, 1, 0, '', ''),
(4, '180111-3', 0, 0, 0, 0, 0, 0, 0, 1515647682, 0, '2018-01-11 10:59:35', 2, 1, 1, 0, '', ''),
(5, '180111-4', 0, 0, 0, 0, 0, 0, 0, 1515647797, 0, '2018-01-11 11:01:29', 2, 1, 1, 0, '', ''),
(6, '180111-5', 0, 0, 0, 0, 0, 0, 0, 1515648077, 0, '2018-01-11 11:06:01', 2, 1, 1, 0, '', ''),
(7, '180111-6', 4, 1, 0, 0, 0, 0, 0, 1515648295, 0, '2018-01-11 11:06:34', 2, 1, 1, 0, '', ''),
(8, '180111-7', 20, 1, 0, 0, 0, 0, 0, 1515648991, 0, '2018-01-11 11:15:35', 2, 1, 1, 0, '', ''),
(9, '180111-8', 20, 1, 0, 0, 0, 0, 0, 1515667132, 0, '2018-01-11 16:23:47', 2, 1, 1, 0, '', ''),
(10, '180115-1', 20, 1, 0, 0, 0, 0, 0, 1515992324, 0, '2018-01-15 10:43:31', 2, 1, 1, 0, '', ''),
(11, '180322-1', 1, 1, 0, 0, 0, 0, 0, 1522212593, 0, '2018-03-22 14:18:40', 2, 1, 1, 0, '', ''),
(12, '180322-2', 1, 1, 0, 0, 0, 0, 0, 1522212593, 0, '2018-03-22 14:30:27', 2, 1, 1, 0, '', ''),
(13, '180322-3', 1, 1, 0, 0, 0, 0, 0, 1522212593, 0, '2018-03-22 14:31:52', 2, 1, 1, 0, '', ''),
(14, '180322-4', 1, 1, 0, 0, 0, 0, 0, 1522212593, 0, '2018-03-22 14:32:10', 2, 1, 1, 0, '', ''),
(15, '180322-5', 1, 1, 0, 0, 0, 0, 0, 1522212593, 0, '2018-03-22 14:32:58', 2, 1, 1, 0, '', ''),
(16, '180322-6', 1, 1, 0, 0, 0, 0, 0, 1522212593, 0, '2018-03-22 14:33:51', 2, 1, 1, 0, '', ''),
(17, '180322-7', 1, 1, 0, 0, 0, 0, 0, 1522212593, 0, '2018-03-22 14:34:07', 2, 1, 1, 0, '', ''),
(18, '180322-8', 1, 1, 0, 0, 0, 0, 0, 1522212593, 0, '2018-03-22 14:38:18', 2, 1, 1, 0, '', ''),
(19, '180322-9', 1, 1, 0, 0, 0, 0, 0, 1522212593, 0, '2018-03-22 14:38:54', 2, 1, 1, 0, '', ''),
(20, '180322-10', 1, 1, 0, 0, 0, 0, 0, 1522212593, 0, '2018-03-22 14:56:07', 2, 1, 1, 0, '', ''),
(21, '180322-11', 1, 1, 0, 0, 0, 0, 0, 1522212593, 0, '2018-03-22 14:58:01', 2, 1, 1, 0, '', ''),
(22, '180322-12', 1, 1, 0, 0, 0, 0, 0, 1522212593, 0, '2018-03-22 14:58:53', 2, 1, 1, 0, '', ''),
(23, '180322-13', 1, 1, 0, 0, 0, 0, 0, 1522212593, 0, '2018-03-22 14:59:12', 2, 1, 1, 0, '', ''),
(24, '180411-1', 2, 1, 0, 0, 0, 0, 0, 1523437832, 0, '2018-04-11 14:29:28', 2, 1, 1, 0, '', ''),
(25, '', 2, 1, 0, 0, 0, 0, 0, 1523437832, 0, '2018-04-11 14:29:49', 2, 1, 1, 24, '180411-1', ''),
(26, '180411-2', 2, 1, 0, 0, 0, 0, 0, 1523437832, 0, '2018-04-11 14:32:44', 2, 1, 1, 0, '', ''),
(27, '', 2, 1, 0, 0, 0, 0, 0, 1523437832, 0, '2018-04-11 14:32:53', 2, 1, 1, 26, '180411-2', ''),
(28, '180411-3', 2, 1, 0, 0, 0, 0, 0, 1523437928, 0, '2018-04-11 14:56:35', 2, 1, 1, 0, '', ''),
(29, '', 2, 1, 0, 0, 0, 0, 0, 1523437928, 0, '2018-04-11 14:56:44', 2, 2, 1, 28, '180411-3', 'test'),
(30, '180411-4', 2, 1, 0, 0, 0, 0, 0, 1523438357, 0, '2018-04-11 15:03:49', 2, 1, 1, 0, '', ''),
(36, '180411-6', 2, 1, 0, 0, 0, 0, 0, 1523439315, 0, '2018-04-11 15:19:11', 2, 1, 1, 0, '', ''),
(37, '180411-7', 2, 1, 0, 0, 0, 0, 0, 1523439978, 0, '2018-04-11 15:21:29', 2, 1, 1, 0, '', ''),
(38, '', 2, 1, 0, 0, 0, 0, 0, 1523439978, 0, '2018-04-11 15:30:53', 2, 1, 1, 37, '180411-7', 'test'),
(39, '', 2, 1, 0, 0, 0, 0, 0, 1523439978, 0, '2018-04-11 15:31:01', 2, 1, 1, 37, '180411-7', 'test'),
(40, '', 2, 1, 0, 0, 0, 0, 0, 1523439978, 0, '2018-04-11 15:31:10', 2, 1, 1, 37, '180411-7', 'test'),
(41, '180411-8', 2, 1, 0, 0, 0, 0, 0, 1523441989, 0, '2018-04-11 15:36:19', 2, 1, 1, 0, '', ''),
(42, '', 2, 1, 0, 0, 0, 0, 0, 1523441989, 0, '2018-04-11 15:36:27', 2, 1, 1, 41, '180411-8', 'test'),
(43, '180411-9', 2, 1, 0, 0, 0, 0, 0, 1523442523, 0, '2018-04-11 16:13:12', 2, 1, 1, 0, '', ''),
(44, '', 2, 1, 0, 0, 0, 0, 0, 1523442523, 0, '2018-04-11 16:13:22', 2, 2, 1, 43, '180411-9', 'test'),
(45, '', 2, 1, 0, 0, 0, 0, 0, 1523442523, 0, '2018-04-11 16:13:31', 2, 2, 1, 43, '180411-9', 'test'),
(46, '180412-1', 2, 1, 0, 0, 0, 0, 0, 1523513052, 0, '2018-04-12 11:27:55', 2, 1, 1, 0, '', ''),
(48, '180412-3', 2, 1, 0, 0, 0, 0, 0, 1523513052, 0, '2018-04-12 11:45:03', 2, 1, 1, 0, '', ''),
(49, '', 2, 1, 0, 0, 0, 0, 0, 1523513052, 0, '2018-04-12 11:45:53', 2, 2, 1, 48, '180412-3', ''),
(50, '180412-4', 2, 1, 0, 0, 0, 0, 0, 1523513859, 0, '2018-04-12 12:02:19', 2, 1, 1, 0, '', ''),
(51, '', 2, 1, 0, 0, 0, 0, 0, 1523513859, 0, '2018-04-12 12:02:30', 2, 2, 1, 50, '180412-4', 'test'),
(52, '180412-5', 2, 1, 0, 0, 0, 0, 0, 1523515134, 0, '2018-04-12 12:18:57', 2, 1, 1, 0, '', ''),
(53, '', 2, 1, 0, 0, 0, 0, 0, 1523515134, 0, '2018-04-12 12:19:06', 2, 2, 1, 52, '180412-5', 'test1'),
(54, '', 2, 1, 0, 0, 0, 0, 0, 1523515134, 0, '2018-04-12 12:19:25', 2, 2, 1, 52, '180412-5', 'test'),
(55, '180412-6', 2, 1, 0, 0, 0, 0, 0, 1523598408, 0, '2018-04-12 12:27:13', 2, 1, 1, 0, '', ''),
(56, '180413-1', 2, 1, 0, 0, 0, 0, 0, 1523598408, 0, '2018-04-13 11:31:15', 2, 1, 1, 0, '', ''),
(57, '', 2, 1, 0, 0, 0, 0, 0, 1523598408, 0, '2018-04-13 11:31:31', 2, 2, 1, 56, '180413-1', 'test1'),
(58, '', 2, 1, 0, 0, 0, 0, 0, 1523598408, 0, '2018-04-13 11:31:41', 2, 2, 1, 56, '180413-1', 'test2'),
(59, '180413-2', 2, 1, 0, 0, 0, 0, 0, 1523598511, 0, '2018-04-13 11:32:32', 2, 1, 1, 0, '', ''),
(60, '180413-3', 2, 1, 0, 0, 0, 0, 0, 1523598511, 0, '2018-04-13 11:32:41', 2, 1, 1, 0, '', ''),
(61, '', 2, 1, 0, 0, 0, 0, 0, 1523598511, 0, '2018-04-13 11:32:53', 2, 2, 1, 59, '180413-2', 'test1'),
(62, '', 2, 1, 0, 0, 0, 0, 0, 1523598511, 0, '2018-04-13 11:33:05', 2, 2, 1, 59, '180413-2', 'test2'),
(63, '', 2, 1, 0, 0, 0, 0, 0, 1523598511, 0, '2018-04-13 11:33:15', 2, 2, 1, 60, '180413-3', 'test3'),
(64, '', 2, 1, 0, 0, 0, 0, 0, 1523598511, 0, '2018-04-13 11:33:25', 2, 2, 1, 60, '180413-3', 'test4'),
(65, '180413-4', 2, 1, 0, 0, 0, 0, 0, 1523616253, 0, '2018-04-13 16:28:08', 2, 1, 1, 0, '', ''),
(66, '180413-5', 2, 1, 0, 0, 0, 0, 0, 1523616253, 0, '2018-04-13 16:28:24', 2, 1, 1, 0, '', ''),
(67, '', 2, 1, 0, 0, 0, 0, 0, 1523616253, 0, '2018-04-13 16:28:38', 2, 2, 1, 65, '180413-4', 'test1'),
(68, '', 2, 1, 0, 0, 0, 0, 0, 1523616253, 0, '2018-04-13 16:28:50', 2, 2, 1, 65, '180413-4', 'test2'),
(69, '', 2, 1, 0, 0, 0, 0, 0, 1523616253, 0, '2018-04-13 16:28:58', 2, 2, 1, 66, '180413-5', 'test3'),
(70, '', 2, 1, 0, 0, 0, 0, 0, 1523616253, 0, '2018-04-13 16:29:07', 2, 2, 1, 66, '180413-5', 'test4'),
(71, '180416-1', 2, 1, 0, 0, 0, 0, 0, 1523857173, 0, '2018-04-16 11:23:35', 2, 1, 1, 0, '', ''),
(72, '180416-2', 2, 1, 0, 0, 0, 0, 0, 1523857173, 0, '2018-04-16 11:23:43', 2, 1, 1, 0, '', ''),
(73, '180416-3', 2, 1, 0, 0, 0, 0, 0, 1523857173, 0, '2018-04-16 11:23:49', 2, 1, 1, 0, '', ''),
(74, '', 2, 1, 0, 0, 0, 0, 0, 1523857173, 0, '2018-04-16 11:24:05', 2, 2, 1, 71, '180416-1', 'testing'),
(75, '', 2, 1, 0, 0, 0, 0, 0, 1523857173, 0, '2018-04-16 11:24:06', 2, 2, 1, 72, '180416-2', 'testing'),
(76, '', 2, 1, 0, 0, 0, 0, 0, 1523857173, 0, '2018-04-16 11:24:06', 2, 2, 1, 73, '180416-3', 'testing'),
(77, '', 2, 1, 0, 0, 0, 0, 0, 1523857173, 0, '2018-04-16 11:24:24', 2, 2, 1, 71, '180416-1', 'testing2'),
(78, '', 2, 1, 0, 0, 0, 0, 0, 1523857173, 0, '2018-04-16 11:24:24', 2, 2, 1, 72, '180416-2', 'testing2'),
(79, '', 2, 1, 0, 0, 0, 0, 0, 1523857173, 0, '2018-04-16 11:24:25', 2, 2, 1, 73, '180416-3', 'testing2'),
(80, '180416-4', 2, 1, 0, 0, 0, 0, 0, 1523858350, 0, '2018-04-16 11:43:34', 2, 1, 1, 0, '', ''),
(81, '180416-5', 2, 1, 0, 0, 0, 0, 0, 1523858350, 0, '2018-04-16 11:43:42', 2, 1, 1, 0, '', ''),
(82, '', 2, 1, 0, 0, 0, 0, 0, 1523858350, 0, '2018-04-16 11:43:59', 2, 2, 1, 80, '180416-4', 'test1'),
(83, '', 2, 1, 0, 0, 0, 0, 0, 1523858350, 0, '2018-04-16 11:43:59', 2, 2, 1, 81, '180416-5', 'test1'),
(84, '180416-6', 2, 1, 0, 0, 0, 0, 0, 1523860088, 0, '2018-04-16 11:44:52', 2, 1, 1, 0, '', ''),
(85, '180416-7', 2, 1, 0, 0, 0, 0, 0, 1523860088, 0, '2018-04-16 11:44:57', 2, 1, 1, 0, '', ''),
(86, '', 2, 1, 0, 0, 0, 0, 0, 1523860088, 0, '2018-04-16 12:13:01', 2, 2, 1, 84, '180416-6', 'test1asdf asdf asdfa sdf asdf asdf asdf asdf asdf asdf asd fasdf asdf asdfasdf asdf asd fasdf ads fasd fasd fasdfasd fasdf '),
(87, '', 2, 1, 0, 0, 0, 0, 0, 1523860088, 0, '2018-04-16 12:13:02', 2, 2, 1, 85, '180416-7', 'test1asdf asdf asdfa sdf asdf asdf asdf asdf asdf asdf asd fasdf asdf asdfasdf asdf asd fasdf ads fasd fasd fasdfasd fasdf '),
(88, '180416-8', 0, 0, 0, 0, 0, 0, 0, 1523878364, 0, '2018-04-16 17:17:40', 2, 1, 1, 0, '', ''),
(89, '180417-1', 2, 1, 0, 0, 0, 0, 0, 1524484078, 0, '2018-04-17 10:29:51', 2, 1, 1, 0, '', ''),
(90, '180417-2', 2, 1, 0, 0, 0, 0, 0, 1524484078, 0, '2018-04-17 10:30:04', 2, 1, 1, 0, '', ''),
(91, '180417-3', 2, 1, 0, 0, 0, 0, 0, 1524484078, 0, '2018-04-17 10:38:55', 2, 1, 1, 0, '', ''),
(92, '180417-4', 2, 1, 0, 0, 0, 0, 0, 1524484078, 0, '2018-04-17 10:41:43', 2, 1, 1, 0, '', ''),
(93, '180417-5', 2, 1, 0, 0, 0, 0, 0, 1524484078, 0, '2018-04-17 10:42:36', 2, 1, 1, 0, '', ''),
(94, '180417-6', 2, 1, 0, 0, 0, 0, 0, 1524484078, 0, '2018-04-17 10:48:54', 2, 1, 1, 0, '', ''),
(95, '180417-7', 2, 1, 0, 0, 0, 0, 0, 1524484078, 0, '2018-04-17 10:50:53', 2, 1, 1, 0, '', ''),
(96, '180417-8', 2, 1, 0, 0, 0, 0, 0, 1524484078, 0, '2018-04-17 10:53:40', 2, 1, 1, 0, '', ''),
(97, '180417-9', 2, 1, 0, 0, 0, 0, 0, 1524484078, 0, '2018-04-17 10:54:06', 2, 1, 1, 0, '', ''),
(98, '180417-10', 2, 1, 0, 0, 0, 0, 0, 1524484078, 0, '2018-04-17 10:56:36', 2, 1, 1, 0, '', ''),
(99, '180417-11', 2, 1, 0, 0, 0, 0, 0, 1524484078, 0, '2018-04-17 11:01:44', 2, 1, 1, 0, '', ''),
(100, '180417-12', 2, 1, 0, 0, 0, 0, 0, 1524484078, 0, '2018-04-17 11:02:05', 2, 1, 1, 0, '', ''),
(101, '180417-13', 2, 1, 0, 0, 0, 0, 0, 1524484078, 0, '2018-04-17 11:07:44', 2, 1, 1, 0, '', ''),
(102, '180417-14', 2, 1, 0, 0, 0, 0, 0, 1524484078, 0, '2018-04-17 11:08:28', 2, 1, 1, 0, '', ''),
(103, '180417-15', 2, 1, 0, 0, 0, 0, 0, 1524484078, 0, '2018-04-17 11:09:47', 2, 1, 1, 0, '', ''),
(104, '180417-16', 2, 1, 0, 0, 0, 0, 0, 1524484078, 0, '2018-04-17 11:11:51', 2, 1, 1, 0, '', ''),
(105, '180417-17', 2, 1, 0, 0, 0, 0, 0, 1524484078, 0, '2018-04-17 11:13:10', 2, 1, 1, 0, '', ''),
(106, '180417-18', 2, 1, 0, 0, 0, 0, 0, 1524484078, 0, '2018-04-17 11:14:51', 2, 1, 1, 0, '', ''),
(107, '180417-19', 2, 1, 0, 0, 0, 0, 0, 1524484078, 0, '2018-04-17 11:16:42', 2, 1, 1, 0, '', ''),
(108, '180417-20', 2, 1, 0, 0, 0, 0, 0, 1524484078, 0, '2018-04-17 11:26:15', 2, 1, 1, 0, '', ''),
(109, '180417-21', 2, 1, 0, 0, 0, 0, 0, 1524484078, 0, '2018-04-17 11:28:27', 2, 1, 1, 0, '', ''),
(110, '', 2, 1, 0, 0, 0, 0, 0, 1524484078, 0, '2018-04-18 10:45:18', 2, 2, 1, 89, '180417-1', 'test'),
(111, '180423-1', 2, 1, 28, 0, 0, 0, 0, 0, 0, '2018-04-23 17:33:40', 2, 0, 1, 0, '', ''),
(112, '', 2, 1, 28, 0, 0, 0, 0, 0, 0, '2018-04-23 17:33:49', 2, 2, 0, 111, '180423-1', 'test'),
(113, '180424-1', 20, 1, 29, 0, 0, 0, 0, 0, 0, '2018-04-24 11:03:16', 2, 0, 1, 0, '', ''),
(114, '', 20, 1, 29, 0, 0, 0, 0, 0, 0, '2018-04-24 11:03:44', 2, 2, 0, 113, '180424-1', 'test'),
(115, '', 20, 1, 29, 0, 0, 0, 0, 0, 0, '2018-04-24 11:04:13', 2, 2, 0, 113, '180424-1', 'test1'),
(116, '180424-2', 0, 0, 0, 0, 2, 0, 0, 0, 0, '2018-04-24 12:04:57', 2, 0, 1, 0, '', ''),
(117, '', 0, 0, 0, 0, 2, 0, 0, 0, 0, '2018-04-24 12:05:27', 2, 2, 0, 116, '180424-2', 'test'),
(118, '180424-3', 0, 0, 0, 0, 0, 1, 0, 0, 0, '2018-04-24 12:14:46', 2, 0, 1, 0, '', ''),
(119, '', 0, 0, 0, 0, 0, 1, 0, 0, 0, '2018-04-24 12:15:16', 2, 2, 0, 118, '180424-3', 'test'),
(120, '180424-4', 0, 0, 0, 0, 0, 0, 4, 0, 0, '2018-04-24 12:15:46', 2, 0, 1, 0, '', ''),
(121, '', 0, 0, 0, 0, 0, 0, 4, 0, 0, '2018-04-24 12:16:02', 2, 2, 0, 120, '180424-4', 'test'),
(122, '180424-5', 0, 0, 0, 2, 0, 0, 0, 0, 0, '2018-04-24 12:17:15', 2, 0, 1, 0, '', ''),
(123, '', 0, 0, 0, 2, 0, 0, 0, 0, 0, '2018-04-24 12:17:34', 2, 2, 0, 122, '180424-5', 'test'),
(124, '180424-6', 15, 1, 0, 0, 0, 0, 0, 1524721595, 0, '2018-04-24 12:48:16', 2, 1, 1, 0, '', ''),
(125, '', 15, 1, 0, 0, 0, 0, 0, 1524721595, 0, '2018-04-24 12:51:51', 2, 2, 1, 124, '180424-6', 'test'),
(126, '180424-7', 15, 1, 0, 0, 0, 0, 0, 1524721595, 0, '2018-04-24 12:55:50', 2, 1, 1, 0, '', ''),
(127, '180424-8', 15, 1, 0, 0, 0, 0, 0, 1524721595, 0, '2018-04-24 13:07:45', 2, 1, 1, 0, '', ''),
(128, '180515-1', 1, 1, 0, 0, 0, 0, 0, 1526382400, 0, '2018-05-15 16:51:28', 2, 1, 1, 0, '', ''),
(129, '180531-1', 1, 1, 0, 0, 0, 0, 0, 1544502792, 0, '2018-05-31 16:03:29', 2, 1, 1, 0, '', ''),
(130, '180604-1', 0, 0, 0, 0, 0, 0, 0, 1528101530, 0, '2018-06-04 14:22:27', 2, 1, 1, 0, '', ''),
(131, '180604-2', 0, 0, 0, 0, 4, 0, 0, 0, 0, '2018-06-04 14:24:19', 2, 0, 1, 0, '', ''),
(132, '180613-1', 0, 0, 0, 0, 5, 0, 0, 0, 0, '2018-06-13 11:39:40', 2, 0, 1, 0, '', ''),
(133, '180621-1', 0, 0, 0, 0, 6, 0, 0, 0, 0, '2018-06-21 14:42:37', 2, 0, 1, 0, '', ''),
(134, '180704-1', 1, 1, 0, 0, 0, 0, 0, 1544502792, 0, '2018-07-04 10:19:44', 2, 1, 1, 0, '', ''),
(135, '180719-1', 1, 1, 0, 0, 0, 0, 0, 1544502792, 0, '2018-07-19 15:13:51', 2, 1, 1, 0, '', ''),
(136, '180831-1', 20, 1, 33, 0, 0, 0, 0, 0, 0, '2018-08-31 10:59:44', 2, 0, 0, 0, '', ''),
(137, '180831-2', 3, 1, 0, 0, 0, 0, 0, 1535693038, 0, '2018-08-31 11:00:43', 2, 1, 1, 0, '', ''),
(138, '180831-3', 14, 1, 35, 0, 0, 0, 0, 0, 0, '2018-08-31 11:09:12', 2, 0, 1, 0, '', ''),
(139, '180831-4', 0, 0, 0, 0, 2, 0, 0, 0, 0, '2018-08-31 11:12:21', 2, 0, 1, 0, '', ''),
(140, '180831-5', 20, 1, 0, 0, 0, 0, 0, 1544502718, 0, '2018-08-31 11:22:56', 2, 1, 1, 0, '', ''),
(141, '180831-6', 20, 1, 0, 0, 0, 0, 0, 1542771841, 0, '2018-08-31 11:23:44', 2, 1, 1, 0, '', ''),
(142, '180921-1', 0, 0, 0, 0, 8, 0, 0, 0, 0, '2018-09-21 16:50:29', 2, 0, 1, 0, '', ''),
(143, '181116-1', 11, 2, 0, 0, 0, 0, 0, 1542340762, 0, '2018-11-16 09:37:24', 2, 1, 1, 0, '', ''),
(144, '181116-2', 20, 1, 0, 0, 0, 0, 0, 1542771841, 0, '2018-11-16 09:57:20', 2, 1, 1, 0, '', ''),
(145, '181116-3', 21, 1, 40, 0, 0, 0, 0, 0, 0, '2018-11-16 09:58:03', 2, 0, 0, 0, '', ''),
(146, '', 6, 1, 0, 0, 0, 0, 0, 1544502718, 0, '2018-11-21 09:44:26', 2, 2, 1, 140, '180831-5', ''),
(147, '181204-1', 29, 3, 41, 0, 0, 0, 0, 0, 0, '2018-12-04 10:03:23', 2, 0, 1, 0, '', ''),
(148, '', 29, 3, 41, 0, 0, 0, 0, 0, 0, '2018-12-04 10:04:07', 2, 2, 0, 147, '181204-1', 'eretrytu'),
(149, '181204-2', 0, 0, 0, 3, 0, 0, 0, 0, 0, '2018-12-04 10:18:46', 2, 0, 0, 0, '', ''),
(150, '181211-1', 6, 1, 0, 0, 0, 0, 0, 1544502776, 0, '2018-12-11 10:17:22', 2, 1, 1, 0, '', ''),
(151, '181211-2', 3, 1, 44, 0, 0, 0, 0, 0, 0, '2018-12-11 10:18:31', 2, 0, 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kot_items`
--

CREATE TABLE IF NOT EXISTS `kot_items` (
`id` int(11) NOT NULL,
  `kot_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `returned_quantity` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=553 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kot_items`
--

INSERT INTO `kot_items` (`id`, `kot_id`, `item_id`, `price`, `quantity`, `returned_quantity`, `type`, `status`) VALUES
(1, 1, 1, 0, 1, 0, 0, 0),
(2, 1, 2, 0, 1, 0, 0, 0),
(3, 1, 4, 0, 1, 0, 0, 0),
(4, 2, 1, 0, 1, 0, 0, 0),
(5, 2, 2, 0, 1, 0, 0, 0),
(6, 2, 4, 0, 1, 0, 0, 0),
(7, 3, 1, 0, 1, 0, 0, 0),
(8, 3, 2, 0, 1, 0, 0, 0),
(9, 3, 4, 0, 1, 0, 0, 0),
(10, 4, 1, 0, 1, 0, 0, 0),
(11, 4, 2, 0, 1, 0, 0, 0),
(12, 4, 4, 0, 1, 0, 0, 0),
(13, 5, 1, 0, 1, 0, 0, 0),
(14, 5, 2, 0, 1, 0, 0, 0),
(15, 5, 4, 0, 1, 0, 0, 0),
(16, 6, 1, 0, 1, 0, 0, 0),
(17, 6, 2, 0, 1, 0, 0, 0),
(18, 6, 4, 0, 1, 0, 0, 0),
(19, 6, 32, 0, 1, 0, 0, 0),
(20, 7, 1, 0, 1, 0, 0, 0),
(21, 7, 2, 0, 1, 0, 0, 0),
(22, 7, 4, 0, 1, 0, 0, 0),
(23, 7, 32, 0, 1, 0, 0, 0),
(24, 8, 1, 0, 1, 0, 0, 0),
(25, 8, 2, 0, 1, 0, 0, 0),
(26, 8, 4, 0, 1, 0, 0, 0),
(27, 8, 32, 0, 1, 0, 0, 0),
(28, 9, 1, 0, 1, 0, 0, 0),
(29, 9, 2, 0, 1, 0, 0, 0),
(30, 9, 4, 0, 1, 0, 0, 0),
(31, 10, 1, 0, 1, 0, 0, 0),
(32, 10, 2, 0, 1, 0, 0, 0),
(33, 10, 4, 0, 1, 0, 0, 0),
(34, 11, 1, 0, 1, 0, 0, 0),
(35, 11, 13, 0, 1, 0, 0, 0),
(36, 11, 14, 0, 1, 0, 0, 0),
(37, 11, 28, 0, 1, 0, 0, 0),
(38, 11, 27, 0, 1, 0, 0, 0),
(39, 11, 31, 0, 1, 0, 0, 0),
(40, 11, 34, 0, 1, 0, 0, 0),
(41, 12, 1, 0, 1, 0, 0, 0),
(42, 12, 6, 0, 1, 0, 0, 0),
(43, 12, 11, 0, 1, 0, 0, 0),
(44, 12, 12, 0, 1, 0, 0, 0),
(45, 12, 26, 0, 1, 0, 0, 0),
(46, 12, 27, 0, 1, 0, 0, 0),
(47, 12, 31, 0, 1, 0, 0, 0),
(48, 12, 34, 0, 1, 0, 0, 0),
(49, 13, 1, 0, 1, 0, 0, 0),
(50, 13, 2, 0, 1, 0, 0, 0),
(51, 13, 4, 0, 1, 0, 0, 0),
(52, 13, 32, 0, 1, 0, 0, 0),
(53, 13, 35, 0, 1, 0, 0, 0),
(54, 13, 6, 0, 1, 0, 0, 0),
(55, 13, 3, 0, 1, 0, 0, 0),
(56, 13, 5, 0, 1, 0, 0, 0),
(57, 13, 33, 0, 1, 0, 0, 0),
(58, 13, 36, 0, 1, 0, 0, 0),
(59, 13, 11, 0, 1, 0, 0, 0),
(60, 13, 13, 0, 1, 0, 0, 0),
(61, 13, 15, 0, 1, 0, 0, 0),
(62, 13, 12, 0, 1, 0, 0, 0),
(63, 13, 26, 0, 1, 0, 0, 0),
(64, 13, 28, 0, 1, 0, 0, 0),
(65, 13, 30, 0, 1, 0, 0, 0),
(66, 13, 27, 0, 1, 0, 0, 0),
(67, 13, 29, 0, 1, 0, 0, 0),
(68, 14, 1, 0, 1, 0, 0, 0),
(69, 14, 2, 0, 1, 0, 0, 0),
(70, 14, 4, 0, 1, 0, 0, 0),
(71, 14, 32, 0, 1, 0, 0, 0),
(72, 14, 35, 0, 1, 0, 0, 0),
(73, 14, 6, 0, 1, 0, 0, 0),
(74, 14, 3, 0, 1, 0, 0, 0),
(75, 14, 5, 0, 1, 0, 0, 0),
(76, 14, 33, 0, 1, 0, 0, 0),
(77, 14, 36, 0, 1, 0, 0, 0),
(78, 14, 11, 0, 1, 0, 0, 0),
(79, 14, 13, 0, 1, 0, 0, 0),
(80, 14, 15, 0, 1, 0, 0, 0),
(81, 14, 12, 0, 1, 0, 0, 0),
(82, 14, 26, 0, 1, 0, 0, 0),
(83, 14, 28, 0, 1, 0, 0, 0),
(84, 14, 30, 0, 1, 0, 0, 0),
(85, 14, 27, 0, 1, 0, 0, 0),
(86, 14, 29, 0, 1, 0, 0, 0),
(87, 15, 1, 0, 1, 0, 0, 0),
(88, 15, 2, 0, 1, 0, 0, 0),
(89, 15, 4, 0, 1, 0, 0, 0),
(90, 15, 32, 0, 1, 0, 0, 0),
(91, 15, 35, 0, 1, 0, 0, 0),
(92, 15, 6, 0, 1, 0, 0, 0),
(93, 15, 3, 0, 1, 0, 0, 0),
(94, 15, 5, 0, 1, 0, 0, 0),
(95, 15, 33, 0, 1, 0, 0, 0),
(96, 15, 36, 0, 1, 0, 0, 0),
(97, 15, 11, 0, 1, 0, 0, 0),
(98, 15, 13, 0, 1, 0, 0, 0),
(99, 15, 15, 0, 1, 0, 0, 0),
(100, 15, 12, 0, 1, 0, 0, 0),
(101, 15, 26, 0, 1, 0, 0, 0),
(102, 15, 28, 0, 1, 0, 0, 0),
(103, 15, 30, 0, 1, 0, 0, 0),
(104, 15, 27, 0, 1, 0, 0, 0),
(105, 15, 29, 0, 1, 0, 0, 0),
(106, 16, 1, 0, 1, 0, 0, 0),
(107, 17, 1, 0, 1, 0, 0, 0),
(108, 17, 2, 0, 1, 0, 0, 0),
(109, 17, 4, 0, 1, 0, 0, 0),
(110, 17, 32, 0, 1, 0, 0, 0),
(111, 17, 35, 0, 1, 0, 0, 0),
(112, 17, 36, 0, 1, 0, 0, 0),
(113, 17, 33, 0, 1, 0, 0, 0),
(114, 17, 5, 0, 1, 0, 0, 0),
(115, 17, 3, 0, 1, 0, 0, 0),
(116, 17, 6, 0, 1, 0, 0, 0),
(117, 17, 11, 0, 1, 0, 0, 0),
(118, 17, 13, 0, 1, 0, 0, 0),
(119, 17, 15, 0, 1, 0, 0, 0),
(120, 17, 14, 0, 1, 0, 0, 0),
(121, 17, 12, 0, 1, 0, 0, 0),
(122, 17, 26, 0, 1, 0, 0, 0),
(123, 17, 28, 0, 1, 0, 0, 0),
(124, 17, 30, 0, 1, 0, 0, 0),
(125, 17, 29, 0, 1, 0, 0, 0),
(126, 17, 27, 0, 1, 0, 0, 0),
(127, 18, 26, 0, 1, 0, 0, 0),
(128, 18, 28, 0, 1, 0, 0, 0),
(129, 18, 30, 0, 1, 0, 0, 0),
(130, 18, 27, 0, 1, 0, 0, 0),
(131, 18, 29, 0, 1, 0, 0, 0),
(132, 19, 1, 0, 1, 0, 0, 0),
(133, 19, 2, 0, 1, 0, 0, 0),
(134, 19, 4, 0, 1, 0, 0, 0),
(135, 19, 11, 0, 1, 0, 0, 0),
(136, 19, 13, 0, 1, 0, 0, 0),
(137, 19, 15, 0, 1, 0, 0, 0),
(138, 19, 26, 0, 1, 0, 0, 0),
(139, 19, 28, 0, 1, 0, 0, 0),
(140, 19, 30, 0, 1, 0, 0, 0),
(141, 20, 1, 0, 2, 0, 0, 0),
(142, 20, 2, 0, 1, 0, 0, 0),
(143, 20, 4, 0, 1, 0, 0, 0),
(144, 20, 11, 0, 1, 0, 0, 0),
(145, 20, 13, 0, 1, 0, 0, 0),
(146, 20, 15, 0, 1, 0, 0, 0),
(147, 20, 26, 0, 1, 0, 0, 0),
(148, 20, 28, 0, 1, 0, 0, 0),
(149, 20, 30, 0, 1, 0, 0, 0),
(150, 21, 1, 0, 2, 0, 0, 0),
(151, 21, 2, 0, 1, 0, 0, 0),
(152, 21, 4, 0, 1, 0, 0, 0),
(153, 21, 11, 0, 1, 0, 0, 0),
(154, 21, 13, 0, 1, 0, 0, 0),
(155, 21, 15, 0, 1, 0, 0, 0),
(156, 21, 26, 0, 1, 0, 0, 0),
(157, 21, 28, 0, 1, 0, 0, 0),
(158, 21, 30, 0, 1, 0, 0, 0),
(159, 22, 1, 0, 2, 0, 0, 0),
(160, 22, 2, 0, 1, 0, 0, 0),
(161, 22, 4, 0, 1, 0, 0, 0),
(162, 22, 11, 0, 1, 0, 0, 0),
(163, 22, 13, 0, 1, 0, 0, 0),
(164, 22, 15, 0, 1, 0, 0, 0),
(165, 22, 26, 0, 1, 0, 0, 0),
(166, 22, 28, 0, 1, 0, 0, 0),
(167, 22, 30, 0, 1, 0, 0, 0),
(168, 23, 1, 0, 2, 0, 0, 0),
(169, 23, 2, 0, 1, 0, 0, 0),
(170, 23, 4, 0, 1, 0, 0, 0),
(171, 23, 11, 0, 1, 0, 0, 0),
(172, 23, 13, 0, 1, 0, 0, 0),
(173, 23, 15, 0, 1, 0, 0, 0),
(174, 23, 26, 0, 1, 0, 0, 0),
(175, 23, 28, 0, 1, 0, 0, 0),
(176, 23, 30, 0, 1, 0, 0, 0),
(177, 24, 1, 0, 1, 1, 0, 0),
(178, 24, 2, 0, 1, 0, 0, 0),
(179, 24, 5, 0, 1, 0, 0, 0),
(180, 25, 1, 0, 1, 0, 0, 0),
(181, 26, 32, 0, 4, 2, 0, 0),
(182, 26, 33, 0, 4, 2, 0, 0),
(183, 27, 32, 0, 2, 0, 0, 0),
(184, 27, 33, 0, 2, 0, 0, 0),
(185, 28, 1, 0, 4, 2, 0, 0),
(186, 28, 2, 0, 4, 2, 0, 0),
(187, 28, 4, 0, 4, 2, 0, 0),
(188, 28, 32, 0, 4, 2, 0, 0),
(189, 29, 1, 0, 2, 0, 0, 0),
(190, 29, 2, 0, 2, 0, 0, 0),
(191, 29, 4, 0, 2, 0, 0, 0),
(192, 29, 32, 0, 2, 0, 0, 0),
(193, 30, 1, 0, 4, 2, 0, 0),
(194, 30, 2, 0, 4, 2, 0, 0),
(195, 30, 4, 0, 4, 2, 0, 0),
(196, 30, 32, 0, 4, 2, 0, 0),
(213, 37, 1, 0, 4, 2, 0, 0),
(214, 37, 2, 0, 4, 2, 0, 0),
(215, 37, 4, 0, 4, 2, 0, 0),
(216, 37, 32, 0, 4, 2, 0, 0),
(217, 38, 1, 0, 2, 0, 0, 0),
(218, 39, 2, 0, 2, 0, 0, 0),
(219, 39, 4, 0, 2, 0, 0, 0),
(220, 40, 32, 0, 2, 0, 0, 0),
(221, 41, 11, 0, 4, 2, 0, 0),
(222, 41, 13, 0, 4, 0, 0, 0),
(223, 41, 15, 0, 4, 0, 0, 0),
(224, 42, 11, 0, 2, 0, 0, 0),
(225, 43, 1, 0, 3, 2, 0, 0),
(226, 43, 2, 0, 3, 1, 0, 0),
(227, 43, 4, 0, 3, 2, 0, 0),
(228, 43, 32, 0, 3, 1, 0, 0),
(229, 44, 1, 0, 2, 0, 0, 0),
(230, 44, 2, 0, 1, 0, 0, 0),
(231, 45, 4, 0, 2, 0, 0, 0),
(232, 45, 32, 0, 1, 0, 0, 0),
(233, 46, 1, 0, 3, 0, 0, 0),
(234, 46, 2, 0, 3, 0, 0, 0),
(235, 46, 4, 0, 3, 0, 0, 0),
(236, 48, 1, 0, 3, 2, 0, 0),
(237, 48, 2, 0, 3, 2, 0, 0),
(238, 48, 4, 0, 3, 2, 0, 0),
(239, 49, 1, 0, 2, 0, 0, 0),
(240, 49, 2, 0, 2, 0, 0, 0),
(241, 49, 4, 0, 2, 0, 0, 0),
(242, 50, 11, 0, 3, 2, 0, 0),
(243, 50, 13, 0, 3, 2, 0, 0),
(244, 50, 15, 0, 3, 2, 0, 0),
(245, 51, 11, 0, 2, 0, 0, 0),
(246, 51, 13, 0, 2, 0, 0, 0),
(247, 51, 15, 0, 2, 0, 0, 0),
(248, 52, 1, 0, 4, 2, 0, 0),
(249, 52, 2, 0, 4, 2, 0, 0),
(250, 52, 4, 0, 4, 2, 0, 0),
(251, 53, 1, 0, 1, 0, 0, 0),
(252, 53, 2, 0, 1, 0, 0, 0),
(253, 53, 4, 0, 1, 0, 0, 0),
(254, 54, 1, 0, 1, 0, 0, 0),
(255, 54, 2, 0, 1, 0, 0, 0),
(256, 54, 4, 0, 1, 0, 0, 0),
(257, 55, 1, 0, 4, 0, 0, 0),
(258, 55, 2, 0, 4, 0, 0, 0),
(259, 55, 4, 0, 4, 0, 0, 0),
(260, 56, 11, 0, 3, 2, 0, 0),
(261, 56, 13, 0, 3, 2, 0, 0),
(262, 56, 15, 0, 3, 2, 0, 0),
(263, 57, 11, 0, 1, 0, 0, 0),
(264, 57, 13, 0, 1, 0, 0, 0),
(265, 57, 15, 0, 1, 0, 0, 0),
(266, 58, 11, 0, 1, 0, 0, 0),
(267, 58, 13, 0, 1, 0, 0, 0),
(268, 58, 15, 0, 1, 0, 0, 0),
(269, 59, 1, 0, 3, 2, 0, 0),
(270, 59, 2, 0, 3, 2, 0, 0),
(271, 59, 4, 0, 3, 2, 0, 0),
(272, 60, 11, 0, 3, 2, 0, 0),
(273, 60, 13, 0, 3, 2, 0, 0),
(274, 60, 15, 0, 3, 2, 0, 0),
(275, 61, 1, 0, 1, 0, 0, 0),
(276, 61, 2, 0, 1, 0, 0, 0),
(277, 61, 4, 0, 1, 0, 0, 0),
(278, 62, 1, 0, 1, 0, 0, 0),
(279, 62, 2, 0, 1, 0, 0, 0),
(280, 62, 4, 0, 1, 0, 0, 0),
(281, 63, 11, 0, 1, 0, 0, 0),
(282, 63, 13, 0, 1, 0, 0, 0),
(283, 63, 15, 0, 1, 0, 0, 0),
(284, 64, 11, 0, 1, 0, 0, 0),
(285, 64, 13, 0, 1, 0, 0, 0),
(286, 64, 15, 0, 1, 0, 0, 0),
(287, 65, 1, 0, 4, 2, 0, 0),
(288, 65, 2, 0, 4, 2, 0, 0),
(289, 65, 4, 0, 4, 2, 0, 0),
(290, 66, 11, 0, 3, 2, 0, 0),
(291, 66, 13, 0, 3, 2, 0, 0),
(292, 66, 15, 0, 3, 2, 0, 0),
(293, 67, 1, 0, 1, 0, 0, 0),
(294, 67, 2, 0, 1, 0, 0, 0),
(295, 67, 4, 0, 1, 0, 0, 0),
(296, 68, 1, 0, 1, 0, 0, 0),
(297, 68, 2, 0, 1, 0, 0, 0),
(298, 68, 4, 0, 1, 0, 0, 0),
(299, 69, 11, 0, 1, 0, 0, 0),
(300, 69, 13, 0, 1, 0, 0, 0),
(301, 69, 15, 0, 1, 0, 0, 0),
(302, 70, 11, 0, 1, 0, 0, 0),
(303, 70, 13, 0, 1, 0, 0, 0),
(304, 70, 15, 0, 1, 0, 0, 0),
(305, 71, 1, 0, 3, 2, 0, 0),
(306, 71, 2, 0, 3, 2, 0, 0),
(307, 71, 4, 0, 3, 2, 0, 0),
(308, 72, 1, 0, 3, 2, 0, 0),
(309, 72, 2, 0, 3, 2, 0, 0),
(310, 72, 4, 0, 3, 2, 0, 0),
(311, 73, 11, 0, 2, 2, 0, 0),
(312, 73, 13, 0, 2, 2, 0, 0),
(313, 73, 15, 0, 2, 2, 0, 0),
(314, 74, 1, 0, 1, 0, 0, 0),
(315, 74, 2, 0, 1, 0, 0, 0),
(316, 74, 4, 0, 1, 0, 0, 0),
(317, 75, 1, 0, 1, 0, 0, 0),
(318, 75, 2, 0, 1, 0, 0, 0),
(319, 75, 4, 0, 1, 0, 0, 0),
(320, 76, 11, 0, 1, 0, 0, 0),
(321, 76, 13, 0, 1, 0, 0, 0),
(322, 76, 15, 0, 1, 0, 0, 0),
(323, 77, 1, 0, 1, 0, 0, 0),
(324, 77, 2, 0, 1, 0, 0, 0),
(325, 77, 4, 0, 1, 0, 0, 0),
(326, 78, 1, 0, 1, 0, 0, 0),
(327, 78, 2, 0, 1, 0, 0, 0),
(328, 78, 4, 0, 1, 0, 0, 0),
(329, 79, 11, 0, 1, 0, 0, 0),
(330, 79, 13, 0, 1, 0, 0, 0),
(331, 79, 15, 0, 1, 0, 0, 0),
(332, 80, 1, 0, 2, 1, 0, 0),
(333, 80, 2, 0, 2, 1, 0, 0),
(334, 80, 4, 0, 2, 1, 0, 0),
(335, 81, 1, 0, 2, 1, 0, 0),
(336, 81, 2, 0, 2, 1, 0, 0),
(337, 81, 4, 0, 2, 1, 0, 0),
(338, 82, 1, 0, 1, 0, 0, 0),
(339, 82, 2, 0, 1, 0, 0, 0),
(340, 82, 4, 0, 1, 0, 0, 0),
(341, 83, 1, 0, 1, 0, 0, 0),
(342, 83, 2, 0, 1, 0, 0, 0),
(343, 83, 4, 0, 1, 0, 0, 0),
(344, 84, 1, 0, 2, 1, 0, 0),
(345, 84, 2, 0, 2, 1, 0, 0),
(346, 84, 4, 0, 2, 1, 0, 0),
(347, 85, 1, 0, 2, 1, 0, 0),
(348, 85, 2, 0, 2, 1, 0, 0),
(349, 85, 4, 0, 2, 1, 0, 0),
(350, 86, 1, 0, 1, 0, 0, 0),
(351, 86, 2, 0, 1, 0, 0, 0),
(352, 86, 4, 0, 1, 0, 0, 0),
(353, 87, 1, 0, 1, 0, 0, 0),
(354, 87, 2, 0, 1, 0, 0, 0),
(355, 87, 4, 0, 1, 0, 0, 0),
(356, 88, 1, 0, 2, 0, 0, 0),
(357, 88, 2, 0, 2, 0, 0, 0),
(358, 88, 4, 0, 2, 0, 0, 0),
(359, 89, 1, 0, 1, 1, 0, 0),
(360, 89, 2, 0, 1, 1, 0, 0),
(361, 89, 4, 0, 1, 1, 0, 0),
(362, 89, 32, 0, 1, 1, 0, 0),
(363, 89, 35, 0, 1, 0, 0, 0),
(364, 89, 6, 0, 1, 0, 0, 0),
(365, 89, 3, 0, 1, 0, 0, 0),
(366, 89, 5, 0, 1, 0, 0, 0),
(367, 89, 33, 0, 1, 0, 0, 0),
(368, 90, 1, 0, 1, 0, 1, 0),
(369, 91, 1, 0, 1, 0, 1, 0),
(370, 92, 1, 0, 1, 0, 0, 0),
(371, 92, 2, 0, 1, 0, 0, 0),
(372, 92, 6, 0, 1, 0, 1, 0),
(373, 93, 1, 0, 1, 0, 0, 0),
(374, 93, 2, 0, 1, 0, 0, 0),
(375, 93, 7, 0, 1, 0, 1, 0),
(376, 94, 1, 0, 1, 0, 0, 0),
(377, 94, 2, 0, 1, 0, 0, 0),
(378, 94, 7, 0, 1, 0, 1, 0),
(379, 95, 1, 0, 1, 0, 0, 0),
(380, 95, 2, 0, 1, 0, 0, 0),
(381, 95, 7, 0, 1, 0, 1, 0),
(382, 96, 1, 0, 1, 0, 0, 0),
(383, 96, 2, 0, 1, 0, 0, 0),
(384, 96, 7, 0, 1, 0, 1, 0),
(385, 97, 1, 0, 1, 0, 0, 0),
(386, 97, 2, 0, 1, 0, 0, 0),
(387, 97, 7, 0, 1, 0, 1, 0),
(388, 98, 1, 0, 1, 0, 0, 0),
(389, 98, 2, 0, 1, 0, 0, 0),
(390, 98, 7, 0, 1, 0, 1, 0),
(391, 99, 1, 0, 1, 0, 0, 0),
(392, 99, 2, 0, 1, 0, 0, 0),
(393, 99, 7, 0, 1, 0, 1, 0),
(394, 100, 1, 0, 1, 0, 0, 0),
(395, 100, 2, 0, 1, 0, 0, 0),
(396, 100, 7, 0, 1, 0, 1, 0),
(397, 100, 1, 0, 1, 0, 1, 0),
(398, 100, 2, 0, 1, 0, 1, 0),
(399, 101, 1, 0, 1, 0, 0, 0),
(400, 101, 2, 0, 1, 0, 0, 0),
(401, 101, 7, 0, 1, 0, 1, 0),
(402, 101, 1, 0, 1, 0, 1, 0),
(403, 101, 2, 0, 1, 0, 1, 0),
(404, 102, 1, 0, 1, 0, 0, 0),
(405, 102, 2, 0, 1, 0, 0, 0),
(406, 102, 7, 0, 1, 0, 1, 0),
(407, 102, 1, 0, 1, 0, 1, 0),
(408, 102, 2, 0, 1, 0, 1, 0),
(409, 103, 1, 0, 1, 0, 0, 0),
(410, 103, 2, 0, 1, 0, 0, 0),
(411, 103, 4, 0, 1, 0, 0, 0),
(412, 103, 1, 0, 1, 0, 1, 0),
(413, 103, 5, 0, 1, 0, 1, 0),
(414, 103, 6, 0, 1, 0, 1, 0),
(415, 104, 1, 0, 1, 0, 0, 0),
(416, 105, 1, 0, 1, 0, 0, 0),
(417, 105, 2, 0, 1, 0, 0, 0),
(418, 105, 4, 0, 1, 0, 0, 0),
(419, 105, 7, 0, 1, 0, 1, 0),
(420, 105, 6, 0, 1, 0, 1, 0),
(421, 105, 5, 0, 1, 0, 1, 0),
(422, 106, 1, 0, 1, 0, 0, 0),
(423, 106, 2, 0, 1, 0, 0, 0),
(424, 106, 4, 0, 1, 0, 0, 0),
(425, 106, 7, 0, 1, 0, 1, 0),
(426, 107, 1, 0, 1, 0, 0, 0),
(427, 107, 2, 0, 1, 0, 0, 0),
(428, 107, 6, 0, 1, 0, 1, 0),
(429, 108, 1, 0, 1, 0, 0, 0),
(430, 108, 2, 0, 1, 0, 0, 0),
(431, 108, 4, 0, 1, 0, 0, 0),
(432, 108, 7, 0, 1, 0, 1, 0),
(433, 109, 1, 0, 1, 0, 0, 0),
(434, 109, 2, 0, 1, 0, 0, 0),
(435, 109, 4, 0, 1, 0, 0, 0),
(436, 109, 5, 0, 1, 0, 1, 0),
(437, 109, 6, 0, 1, 0, 1, 0),
(438, 109, 7, 0, 1, 0, 1, 0),
(439, 110, 1, 0, 1, 0, 0, 0),
(440, 110, 2, 0, 1, 0, 0, 0),
(441, 110, 4, 0, 1, 0, 0, 0),
(442, 110, 32, 0, 1, 0, 0, 0),
(443, 111, 1, 180, 1, 1, 0, 0),
(444, 112, 1, 180, 1, 0, 0, 0),
(445, 113, 1, 180, 1, 1, 0, 0),
(446, 113, 2, 200, 1, 1, 0, 0),
(447, 113, 4, 75, 1, 1, 0, 0),
(448, 113, 32, 200, 1, 1, 0, 0),
(449, 114, 1, 180, 1, 0, 0, 0),
(450, 114, 2, 200, 1, 0, 0, 0),
(451, 115, 4, 75, 1, 0, 0, 0),
(452, 115, 32, 200, 1, 0, 0, 0),
(453, 116, 1, 180, 1, 1, 0, 0),
(454, 116, 2, 200, 1, 1, 0, 0),
(455, 116, 4, 75, 1, 1, 0, 0),
(456, 116, 32, 200, 1, 1, 0, 0),
(457, 117, 1, 180, 1, 0, 0, 0),
(458, 117, 2, 200, 1, 0, 0, 0),
(459, 117, 4, 75, 1, 0, 0, 0),
(460, 117, 32, 200, 1, 0, 0, 0),
(461, 118, 1, 180, 1, 1, 0, 0),
(462, 118, 2, 200, 1, 1, 0, 0),
(463, 118, 4, 75, 1, 1, 0, 0),
(464, 118, 32, 200, 1, 1, 0, 0),
(465, 119, 1, 180, 1, 0, 0, 0),
(466, 119, 2, 200, 1, 0, 0, 0),
(467, 119, 4, 75, 1, 0, 0, 0),
(468, 119, 32, 200, 1, 0, 0, 0),
(469, 120, 1, 180, 1, 1, 0, 0),
(470, 120, 2, 200, 1, 1, 0, 0),
(471, 120, 4, 75, 1, 1, 0, 0),
(472, 120, 32, 200, 1, 1, 0, 0),
(473, 121, 1, 180, 1, 0, 0, 0),
(474, 121, 2, 200, 1, 0, 0, 0),
(475, 121, 4, 75, 1, 0, 0, 0),
(476, 121, 32, 200, 1, 0, 0, 0),
(477, 122, 1, 180, 1, 1, 0, 0),
(478, 122, 2, 200, 1, 1, 0, 0),
(479, 122, 4, 75, 1, 1, 0, 0),
(480, 122, 32, 200, 1, 1, 0, 0),
(481, 123, 1, 180, 1, 0, 0, 0),
(482, 123, 2, 200, 1, 0, 0, 0),
(483, 123, 4, 75, 1, 0, 0, 0),
(484, 123, 32, 200, 1, 0, 0, 0),
(485, 124, 1, 180, 1, 1, 0, 0),
(486, 124, 2, 200, 1, 1, 0, 0),
(487, 124, 4, 75, 1, 0, 0, 0),
(488, 124, 32, 200, 1, 0, 0, 0),
(489, 125, 1, 180, 1, 0, 0, 0),
(490, 125, 2, 200, 1, 0, 0, 0),
(491, 126, 1, 180, 1, 0, 0, 0),
(492, 126, 2, 200, 1, 0, 0, 0),
(493, 126, 4, 75, 1, 0, 0, 0),
(494, 126, 32, 200, 1, 0, 0, 0),
(495, 127, 1, 180, 1, 0, 0, 0),
(496, 127, 2, 200, 1, 0, 0, 0),
(497, 127, 4, 75, 1, 0, 0, 0),
(498, 127, 32, 200, 1, 0, 0, 0),
(499, 128, 1, 180, 1, 0, 0, 0),
(500, 129, 1, 180, 1, 0, 0, 0),
(501, 130, 1, 180, 1, 0, 0, 0),
(502, 130, 2, 200, 1, 0, 0, 0),
(503, 130, 4, 75, 1, 0, 0, 0),
(504, 130, 32, 200, 1, 0, 0, 0),
(505, 131, 1, 180, 1, 0, 0, 0),
(506, 131, 2, 200, 1, 0, 0, 0),
(507, 131, 4, 75, 1, 0, 0, 0),
(508, 131, 32, 200, 1, 0, 0, 0),
(509, 132, 1, 180, 1, 0, 0, 0),
(510, 132, 2, 200, 1, 0, 0, 0),
(511, 133, 1, 180, 1, 0, 0, 0),
(512, 134, 1, 180, 1, 0, 0, 0),
(513, 135, 11, 100, 1, 0, 0, 0),
(514, 135, 13, 50, 1, 0, 0, 0),
(515, 135, 15, 125, 1, 0, 0, 0),
(516, 136, 1, 180, 1, 0, 0, 1),
(517, 136, 2, 200, 1, 0, 0, 1),
(518, 136, 4, 75, 1, 0, 0, 1),
(519, 137, 1, 180, 1, 0, 0, 0),
(520, 137, 2, 200, 1, 0, 0, 0),
(521, 137, 4, 75, 1, 0, 0, 0),
(522, 138, 6, 100, 1, 0, 0, 0),
(523, 138, 3, 50, 1, 0, 0, 0),
(524, 138, 5, 125, 1, 0, 0, 0),
(525, 138, 33, 150, 1, 0, 0, 0),
(526, 138, 36, 123, 1, 0, 0, 0),
(527, 139, 1, 180, 1, 0, 0, 0),
(528, 139, 2, 200, 1, 0, 0, 0),
(529, 140, 1, 180, 1, 0, 0, 0),
(530, 140, 2, 200, 1, 0, 0, 0),
(531, 140, 4, 75, 1, 1, 0, 0),
(532, 141, 1, 180, 1, 0, 0, 0),
(533, 141, 2, 200, 1, 0, 0, 0),
(534, 141, 4, 75, 1, 0, 0, 0),
(535, 142, 1, 180, 3, 0, 0, 0),
(536, 143, 1, 180, 5, 0, 0, 0),
(537, 144, 11, 100, 1, 0, 0, 1),
(538, 144, 13, 50, 1, 0, 0, 1),
(539, 144, 15, 125, 1, 0, 0, 1),
(540, 145, 1, 180, 1, 0, 0, 1),
(541, 145, 2, 200, 1, 0, 0, 1),
(542, 146, 4, 75, 1, 0, 0, 0),
(543, 147, 1, 180, 1, 1, 0, 0),
(544, 147, 2, 200, 1, 0, 0, 0),
(545, 147, 4, 75, 1, 0, 0, 0),
(546, 148, 1, 180, 1, 0, 0, 0),
(547, 149, 1, 180, 1, 0, 0, 0),
(548, 150, 1, 180, 1, 0, 0, 0),
(549, 150, 2, 200, 1, 0, 0, 0),
(550, 151, 1, 180, 1, 0, 0, 0),
(551, 151, 2, 200, 1, 0, 0, 0),
(552, 151, 4, 75, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `membership_number` varchar(100) NOT NULL,
  `membership_type` tinyint(4) NOT NULL,
  `membership_fee` float NOT NULL,
  `issued_date` datetime NOT NULL,
  `valid_date` datetime NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `threshold_claimed` int(11) NOT NULL,
  `threshold_end_claimed` int(11) NOT NULL,
  `current_threshold_exceeded` tinyint(4) NOT NULL,
  `current_threshold_end_exceeded` tinyint(4) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `phone`, `email`, `date_of_birth`, `membership_number`, `membership_type`, `membership_fee`, `issued_date`, `valid_date`, `is_active`, `threshold_claimed`, `threshold_end_claimed`, `current_threshold_exceeded`, `current_threshold_end_exceeded`, `created_on`, `created_by`) VALUES
(1, 'sugen', '9849542300', 'sugen@gmail.com', '2016-12-17', 'K-3', 1, 0, '2017-07-01 00:00:00', '2018-02-01 02:01:05', 1, 2, 0, 0, 0, '2017-07-20 13:47:57', 2),
(2, 'sushov', '9898989898', 'sushov@gmail.com', '2016-12-18', 'K-2', 1, 0, '2017-07-01 00:00:00', '2017-07-31 00:00:00', 1, 0, 0, 0, 0, '2017-07-19 17:02:52', 2),
(3, 'test', '123412341', 'test@gmail.com', '2017-12-01', 'K-4', 0, 0, '2017-12-31 00:00:00', '2018-08-31 00:00:00', 1, 0, 0, 0, 0, '2017-12-14 22:35:21', 2),
(4, 'test', '1234567890', 'test@gmail.com', '2016-12-27', 'K-5', 0, 0, '2017-10-01 00:00:00', '2018-10-31 00:00:00', 1, 0, 0, 0, 0, '2017-12-25 12:36:32', 2);

-- --------------------------------------------------------

--
-- Table structure for table `member_discount`
--

CREATE TABLE IF NOT EXISTS `member_discount` (
`id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `discount_allowed` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_discount`
--

INSERT INTO `member_discount` (`id`, `member_id`, `category_id`, `discount_allowed`) VALUES
(10, 0, 5, 10),
(11, 0, 6, 5),
(12, 0, 3, 15),
(13, 0, 1, 10),
(14, 0, 8, 5),
(15, 0, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `member_order_category`
--

CREATE TABLE IF NOT EXISTS `member_order_category` (
`id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `discount_rate` float NOT NULL,
  `discount_amount` float NOT NULL,
  `total` float NOT NULL,
  `member_report_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_order_category`
--

INSERT INTO `member_order_category` (`id`, `category_id`, `discount_rate`, `discount_amount`, `total`, `member_report_id`) VALUES
(3, 1, 10, 18, 180, 3),
(4, 3, 15, 15, 100, 3),
(8, 1, 10, 36, 360, 4),
(9, 1, 10, 7.5, 75, 4),
(10, 3, 15, 30, 200, 4),
(11, 1, 10, 18, 180, 5),
(12, 1, 10, 7.5, 75, 5),
(13, 3, 15, 15, 100, 5),
(20, 3, 15, 15, 100, 9),
(21, 1, 10, 25.5, 255, 9),
(22, 1, 10, 25.5, 255, 10),
(23, 1, 10, 25.5, 255, 11),
(24, 1, 10, 25.5, 255, 12),
(25, 3, 15, 30, 200, 1),
(26, 1, 10, 38, 380, 1),
(27, 3, 15, 375, 2500, 2),
(28, 1, 10, 45.5, 455, 3),
(29, 1, 10, 238, 2380, 4),
(30, 1, 10, 100, 1000, 5),
(31, 1, 10, 80, 800, 6),
(32, 1, 10, 100, 1000, 7),
(33, 1, 10, 100, 1000, 8),
(34, 1, 10, 100, 1000, 9),
(35, 1, 10, 100, 1000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `member_privillege_threshold`
--

CREATE TABLE IF NOT EXISTS `member_privillege_threshold` (
`id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `end_amount` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `till_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_privillege_threshold`
--

INSERT INTO `member_privillege_threshold` (`id`, `amount`, `end_amount`, `created_on`, `till_date`, `created_by`) VALUES
(1, 10000, 50000, '2017-12-10 12:51:49', '2017-12-14 16:21:37', 2),
(2, 15000, 75000, '2017-12-14 16:21:38', '2017-12-25 12:36:58', 2);

-- --------------------------------------------------------

--
-- Table structure for table `member_report`
--

CREATE TABLE IF NOT EXISTS `member_report` (
`id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_report`
--

INSERT INTO `member_report` (`id`, `member_id`, `order_id`, `created_on`) VALUES
(1, 1, 170, '2017-12-14 15:29:35'),
(2, 1, 171, '2017-12-14 15:31:45'),
(3, 1, 172, '2017-12-14 16:14:12'),
(4, 1, 180, '2017-12-17 10:41:16'),
(5, 1, 182, '2017-12-18 11:11:32'),
(6, 1, 184, '2017-12-18 11:14:13'),
(7, 1, 185, '2017-12-18 11:16:56'),
(8, 1, 184, '2017-12-18 12:12:40'),
(9, 1, 185, '2017-12-18 12:14:11'),
(10, 1, 186, '2017-12-18 12:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `menu_category`
--

CREATE TABLE IF NOT EXISTS `menu_category` (
`id` int(11) NOT NULL,
  `category` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `type` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `display_order` int(11) NOT NULL,
  `bill_type` int(11) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_category`
--

INSERT INTO `menu_category` (`id`, `category`, `slug`, `type`, `is_active`, `display_order`, `bill_type`, `created_on`) VALUES
(1, 'food item', 'food-item', 0, 1, 1, 6, '2017-04-13 10:44:12'),
(2, 'Hot Beverage', 'hot-beverage', 0, 1, 2, 7, '2017-04-13 10:44:39'),
(3, 'Cold Beverage', 'cold-beverage', 0, 1, 3, 7, '2017-04-13 10:44:48'),
(4, 'liquor', 'liquor', 1, 1, 4, 7, '2017-04-13 11:27:27'),
(5, 'bakery', 'bakery', 0, 1, 5, 6, '2017-05-23 12:15:00'),
(6, 'cakes and icecreams', 'cakes-and-icecreams', 0, 1, 6, 8, '2017-05-23 13:05:01'),
(7, 'Testing', 'testing', 0, 1, 7, 7, '2017-07-19 10:45:12'),
(8, 'testing 1', 'testing-1', 0, 1, 8, 7, '2017-07-20 12:39:14'),
(9, 'testing 2', 'testing-2', 0, 1, 9, 6, '2017-07-20 12:39:23'),
(10, 'testing 3', 'testing-3', 0, 1, 10, 7, '2017-07-20 12:39:31'),
(11, 'testing 4', 'testing-4', 0, 1, 11, 8, '2017-07-20 12:39:40'),
(12, 'test', 'test', 0, 1, 12, 7, '2017-12-25 13:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE IF NOT EXISTS `menu_item` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `display_order` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_edited_on` datetime NOT NULL,
  `last_edited_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_discountable` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`id`, `name`, `category_id`, `price`, `description`, `image`, `slug`, `display_order`, `created_on`, `created_by`, `last_edited_on`, `last_edited_by`, `is_active`, `is_discountable`) VALUES
(1, 'food item 10', 1, 180, 'asdfasdfasdf', '', 'food-item-10', 1, '2017-04-13 11:25:34', 2, '2017-12-25 13:25:51', 2, 1, 0),
(2, 'triggerhappy', 1, 200, 'asdf', '', 'triggerhappy', 4, '2017-04-13 11:25:34', 2, '2017-12-18 10:50:28', 2, 1, 0),
(3, 'Food Item Three', 1, 50, 'asdf', '', 'Food-Item-Three', 7, '2017-04-13 11:25:34', 2, '2017-12-18 10:50:48', 2, 1, 0),
(4, 'Food Item Four', 1, 75, 'asdf', '', 'Food-Item-Four', 10, '2017-04-13 11:25:34', 2, '2017-12-18 10:50:40', 2, 1, 0),
(5, 'Food Item Five', 1, 125, 'asdf', '', 'Food-Item-Five', 13, '2017-04-13 11:25:34', 2, '2017-12-18 10:50:37', 2, 1, 0),
(6, 'Food Item One', 1, 100, 'asdf', '', 'Food-Item-One', 2, '2017-04-13 11:25:34', 2, '2017-12-18 10:50:18', 2, 1, 0),
(11, 'Hot Breverage One', 2, 100, 'asdf', '', 'Hot-Breverage-One', 1, '2017-04-13 11:25:34', 2, '2017-12-18 10:50:12', 2, 1, 1),
(12, 'Hot Breverage Two', 2, 200, 'asdf', '', 'Hot-Breverage-Two', 3, '2017-04-13 11:25:34', 2, '2017-12-18 10:50:22', 2, 1, 0),
(13, 'Hot Breverage Three', 2, 50, 'asdf', '', 'Hot-Breverage-Three', 5, '2017-04-13 11:25:34', 2, '2017-12-18 10:50:53', 2, 1, 0),
(14, 'Hot Breverage Four', 2, 75, 'asdf', '', 'Hot-Breverage-Four', 7, '2017-04-13 11:25:34', 2, '2017-12-18 10:50:45', 2, 1, 0),
(15, 'Hot Breverage Five', 2, 125, 'asdf', '', 'Hot-Breverage-Five', 9, '2017-04-13 11:25:34', 2, '2017-12-18 10:50:42', 2, 1, 0),
(26, 'Cold Breverage One', 3, 100, 'asdf', '', 'Cold-Breverage-One', 1, '2017-04-13 11:25:34', 2, '2017-12-18 10:50:03', 2, 1, 0),
(27, 'Cold Breverage Two', 3, 200, 'asdf', '', 'Cold-Breverage-Two', 2, '2017-04-13 11:25:34', 2, '2017-12-18 10:50:20', 2, 1, 0),
(28, 'Cold Breverage Three', 3, 50, 'asdf', '', 'Cold-Breverage-Three', 3, '2017-04-13 11:25:34', 2, '2017-12-18 10:50:26', 2, 1, 0),
(29, 'Cold Breverage Four', 3, 75, 'asdf', '', 'Cold-Breverage-Four', 4, '2017-04-13 11:25:34', 2, '2017-12-18 10:50:55', 2, 1, 0),
(30, 'Cold Breverage Five', 3, 125, 'asdf', '', 'Cold-Breverage-Five', 5, '2017-04-13 11:25:34', 2, '2017-12-18 10:50:51', 2, 1, 0),
(31, 'liquor item 1', 4, 300, 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.', '', 'liquor-item-1', 1, '2017-04-13 11:35:43', 2, '2017-12-18 10:50:06', 2, 1, 0),
(32, 'momo', 1, 200, 'With meat inside(asdjas)', '', 'momo', 16, '2017-05-23 12:13:36', 2, '2017-12-18 10:50:34', 2, 1, 0),
(33, 'sandwich chicken', 1, 150, 'asdf  sadf', '', 'sandwich-chicken', 17, '2017-05-23 12:32:13', 2, '2017-12-18 10:50:32', 2, 1, 0),
(34, 'test', 5, 32423400, 'test', '', 'test', 1, '2017-07-18 16:29:54', 2, '2017-12-18 10:50:09', 2, 1, 0),
(35, 'new food item 1', 1, 1000, 'asdfasdf', '', 'new-food-item-1', 18, '2017-12-14 11:24:27', 2, '2017-12-18 10:51:01', 2, 1, 0),
(36, 'test1234', 1, 123, 'asdfasdf', '', 'test1234', 19, '2017-12-25 13:55:18', 2, '2017-12-25 13:55:18', 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu_item_price`
--

CREATE TABLE IF NOT EXISTS `menu_item_price` (
`id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `previous_price` float NOT NULL,
  `changed_price` float NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_item_price`
--

INSERT INTO `menu_item_price` (`id`, `item_id`, `previous_price`, `changed_price`, `created_on`, `created_by`) VALUES
(1, 1, 150, 160, '2017-07-10 11:43:26', 2),
(2, 1, 160, 170, '2017-07-10 11:44:22', 2),
(3, 1, 170, 180, '2017-07-10 11:53:46', 2);

-- --------------------------------------------------------

--
-- Table structure for table `menu_stock_items`
--

CREATE TABLE IF NOT EXISTS `menu_stock_items` (
`id` int(11) NOT NULL,
  `menu_item_id` int(11) NOT NULL,
  `stock_item_id` int(11) NOT NULL,
  `used_quantity` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_stock_items`
--

INSERT INTO `menu_stock_items` (`id`, `menu_item_id`, `stock_item_id`, `used_quantity`) VALUES
(3, 33, 7, 10),
(4, 33, 6, 2),
(5, 33, 5, 50),
(6, 31, 1, 1),
(7, 31, 2, 10),
(8, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `monthly_target`
--

CREATE TABLE IF NOT EXISTS `monthly_target` (
`id` int(11) NOT NULL,
  `month` varchar(25) NOT NULL,
  `full_date` date NOT NULL,
  `target` float NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_edited_on` datetime NOT NULL,
  `last_edited_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monthly_target`
--

INSERT INTO `monthly_target` (`id`, `month`, `full_date`, `target`, `created_on`, `created_by`, `last_edited_on`, `last_edited_by`) VALUES
(1, 'January', '2017-01-01', 150000, '2017-03-29 00:00:00', 2, '2017-03-29 16:47:31', 2),
(2, 'Feburary', '2017-02-01', 250000, '2017-03-29 00:00:00', 2, '2017-03-29 14:14:52', 2),
(3, 'March', '2017-03-01', 150000, '2017-03-29 00:00:00', 2, '2017-03-29 14:14:55', 2),
(4, 'April', '2017-04-01', 200000, '2017-03-29 00:00:00', 2, '2017-03-30 11:01:11', 2),
(5, 'May', '2017-05-01', 150000, '2017-03-29 00:00:00', 2, '2017-03-29 14:15:09', 2),
(6, 'June', '2017-06-01', 150000, '2017-03-29 00:00:00', 2, '2017-03-29 14:15:13', 2),
(7, 'July', '2017-07-01', 150000, '2017-03-29 00:00:00', 2, '2017-03-29 14:15:15', 2),
(8, 'August', '2017-08-01', 150000, '2017-03-29 00:00:00', 2, '2017-03-29 14:15:18', 2),
(9, 'September', '2017-09-01', 150000, '2017-03-29 00:00:00', 2, '2017-03-29 14:15:21', 2),
(10, 'Octuber', '2017-10-01', 150000, '2017-03-29 00:00:00', 2, '2017-03-29 14:15:23', 2),
(11, 'November', '2017-11-01', 150000, '2017-03-29 00:00:00', 2, '2017-03-29 14:15:25', 2),
(12, 'December', '2017-12-01', 150000, '2017-03-29 00:00:00', 2, '2017-03-29 14:15:28', 2);

-- --------------------------------------------------------

--
-- Table structure for table `obstacles`
--

CREATE TABLE IF NOT EXISTS `obstacles` (
`id` int(11) NOT NULL,
  `obstacle_name` varchar(150) NOT NULL,
  `floor` int(11) NOT NULL,
  `x_pos` float NOT NULL,
  `y_pos` float NOT NULL,
  `height` float NOT NULL,
  `width` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obstacles`
--

INSERT INTO `obstacles` (`id`, `obstacle_name`, `floor`, `x_pos`, `y_pos`, `height`, `width`) VALUES
(1, 'Obstacle - 1', 1, 72.837, 19.1437, 17.2742, 8.05271),
(2, 'Obstacle - 2', 1, 72.3611, 0, 17.1994, 7.68668),
(3, 'Obstacle - 3', 2, 32.5083, 131.234, 15.674, 8.05271),
(4, 'Obstacle - 4', 2, 32.4064, 153.085, 15.1057, 8.05271),
(5, 'Obstacle - 5', 1, 36.3824, 38.7431, 15.8295, 8.05271),
(6, 'Obstacle - 6', 1, 37.3353, 19.7869, 15.2207, 8.05271),
(7, 'Obstacle - 7', 1, 50.366, 19.3303, 13.0898, 8.05271);

-- --------------------------------------------------------

--
-- Table structure for table `occupy`
--

CREATE TABLE IF NOT EXISTS `occupy` (
`id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_pan` int(11) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `customer_pax` int(11) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `table_id` int(11) NOT NULL,
  `floor_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `occupy_type` tinyint(1) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_foc` tinyint(1) NOT NULL,
  `last_edited_on` datetime NOT NULL,
  `last_edited_by` int(11) NOT NULL,
  `capacity_id` int(11) NOT NULL,
  `is_occupied` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `occupy`
--

INSERT INTO `occupy` (`id`, `customer_name`, `customer_pan`, `customer_address`, `customer_pax`, `customer_phone`, `table_id`, `floor_id`, `start_date`, `start_time`, `end_date`, `end_time`, `created_on`, `created_by`, `occupy_type`, `status`, `is_foc`, `last_edited_on`, `last_edited_by`, `capacity_id`, `is_occupied`) VALUES
(1, '', 0, '', 1, '', 4, 1, '2018-01-10', '11:54:18', '2018-01-10', '11:54:41', '2018-01-10 11:54:18', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(2, '', 0, '', 1, '', 4, 1, '2018-01-11', '11:06:28', '0000-00-00', '11:09:55', '2018-01-11 11:06:28', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(3, '', 0, '', 1, '', 20, 1, '2018-01-11', '11:15:30', '0000-00-00', '11:21:30', '2018-01-11 11:15:30', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(4, '', 0, '', 1, '', 20, 1, '2018-01-11', '16:23:39', '2018-01-11', '16:23:54', '2018-01-11 16:23:39', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(5, '', 0, '', 1, '', 20, 1, '2018-01-15', '10:43:26', '2018-01-15', '10:43:45', '2018-01-15 10:43:26', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(6, '', 0, '', 0, '', 20, 1, '2018-01-15', '10:46:59', '2018-01-15', '10:47:15', '2018-01-15 10:46:59', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(7, '', 0, '', 0, '', 15, 1, '2018-01-15', '10:49:07', '2018-01-15', '10:52:46', '2018-01-15 10:49:07', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(8, '', 0, '', 0, '', 20, 1, '2018-01-15', '12:44:45', '2018-02-23', '10:36:53', '2018-01-15 12:44:45', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(9, '', 0, '', 20, '', 1, 1, '2018-03-02', '10:59:27', '2018-03-28', '10:34:55', '2018-03-02 10:59:27', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(10, '', 0, '', 0, '', 1, 1, '2018-03-28', '10:40:16', '2018-04-02', '10:38:32', '2018-03-28 10:40:16', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(11, '', 0, '', 1, '', 2, 1, '2018-04-02', '10:47:25', '2018-04-11', '14:55:34', '2018-04-02 10:47:25', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(12, '', 0, '', 1, '', 2, 1, '2018-04-11', '14:56:26', '2018-04-11', '14:57:09', '2018-04-11 14:56:26', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(13, '', 0, '', 1, '', 2, 1, '2018-04-11', '15:03:37', '2018-04-11', '15:04:18', '2018-04-11 15:03:37', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(14, '', 0, '', 1, '', 2, 1, '2018-04-11', '15:09:41', '2018-04-11', '15:20:16', '2018-04-11 15:09:41', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(15, '', 0, '', 1, '', 2, 1, '2018-04-11', '15:21:22', '2018-04-11', '15:31:19', '2018-04-11 15:21:22', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(16, '', 0, '', 1, '', 2, 1, '2018-04-11', '15:36:01', '2018-04-11', '16:04:50', '2018-04-11 15:36:01', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(17, '', 0, '', 1, '', 2, 1, '2018-04-11', '16:13:05', '2018-04-11', '16:13:44', '2018-04-11 16:13:05', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(18, '', 0, '', 1, '', 2, 1, '2018-04-12', '11:27:42', '2018-04-12', '11:49:14', '2018-04-12 11:27:42', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(19, '', 0, '', 1, '', 2, 1, '2018-04-12', '12:02:09', '2018-04-12', '12:02:40', '2018-04-12 12:02:09', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(20, '', 0, '', 1, '', 2, 1, '2018-04-12', '12:18:49', '2018-04-12', '12:23:55', '2018-04-12 12:18:49', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(21, '', 0, '', 1, '', 2, 1, '2018-04-12', '12:27:05', '2018-04-13', '11:31:49', '2018-04-12 12:27:05', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(22, '', 0, '', 1, '', 2, 1, '2018-04-13', '11:32:26', '2018-04-13', '11:33:33', '2018-04-13 11:32:26', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(23, '', 0, '', 1, '', 2, 1, '2018-04-13', '16:28:00', '2018-04-13', '16:29:14', '2018-04-13 16:28:00', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(24, '', 0, '', 1, '', 2, 1, '2018-04-16', '11:23:29', '2018-04-16', '11:24:35', '2018-04-16 11:23:29', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(25, '', 0, '', 1, '', 2, 1, '2018-04-16', '11:36:31', '2018-04-16', '11:44:11', '2018-04-16 11:36:31', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(26, '', 0, '', 1, '', 2, 1, '2018-04-16', '11:44:47', '2018-04-16', '12:13:09', '2018-04-16 11:44:47', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(27, '', 0, '', 12, '', 2, 1, '2018-04-16', '15:12:31', '2018-04-23', '17:33:05', '2018-04-16 15:12:31', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(28, '', 0, '', 0, '', 2, 1, '2018-04-23', '17:33:33', '2018-04-23', '17:33:57', '2018-04-23 17:33:33', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(29, '', 0, '', 0, '', 20, 1, '2018-04-24', '11:03:11', '2018-04-24', '11:04:21', '2018-04-24 11:03:11', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(30, '', 0, '', 1, '', 15, 1, '2018-04-24', '12:48:12', '2018-04-26', '11:31:37', '2018-04-24 12:48:12', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(31, '', 0, '', 1, '', 1, 1, '2018-05-15', '16:51:24', '2018-05-15', '16:51:49', '2018-05-15 16:51:24', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 0),
(32, '', 0, '', 1, '', 3, 1, '2018-05-31', '16:03:20', '2018-12-11', '10:18:14', '2018-05-31 16:03:20', 2, 0, 0, 0, '2018-10-08 12:14:17', 2, 1, 1),
(33, '', 0, '', 0, '', 8, 2, '2018-08-31', '10:59:39', '0000-00-00', '00:00:00', '2018-08-31 10:59:39', 2, 0, 1, 0, '2018-08-31 11:17:30', 2, 1, 0),
(34, '', 0, '', 1, '', 14, 1, '2018-08-31', '11:00:39', '2018-08-31', '11:09:00', '2018-08-31 11:00:39', 2, 0, 0, 0, '2018-08-31 11:04:37', 2, 1, 1),
(35, '', 0, '', 0, '', 9, 2, '2018-08-31', '11:09:06', '0000-00-00', '00:00:00', '2018-08-31 11:09:06', 2, 0, 1, 0, '2018-08-31 11:14:25', 2, 1, 0),
(36, '', 0, '', 1, '', 6, 1, '2018-08-31', '11:22:52', '2018-12-11', '10:17:06', '2018-08-31 11:22:52', 2, 0, 0, 0, '2018-08-31 11:38:06', 2, 1, 1),
(37, '', 0, '', 1, '', 20, 1, '2018-08-31', '11:23:31', '2018-11-21', '09:29:07', '2018-08-31 11:23:31', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(38, '', 0, '', 2, '', 11, 2, '2018-11-16', '09:36:21', '2018-11-16', '09:44:24', '2018-11-16 09:36:21', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(39, 'asdf', 0, '', 2, '', 15, 1, '2018-11-16', '09:46:52', '0000-00-00', '00:00:00', '2018-11-16 09:46:52', 2, 1, 0, 0, '0000-00-00 00:00:00', 0, 1, 1),
(40, '', 0, '', 0, '', 21, 1, '2018-11-16', '09:57:30', '0000-00-00', '00:00:00', '2018-11-16 09:57:30', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, 1, 0),
(41, '', 0, '', 2, '9841443344', 29, 3, '2018-12-04', '10:02:33', '0000-00-00', '00:00:00', '2018-12-04 10:02:33', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, 1, 0),
(42, '', 0, '', 0, '', 24, 1, '2018-12-04', '10:20:29', '0000-00-00', '00:00:00', '2018-12-04 10:20:29', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, 1, 0),
(43, '', 0, '', 1, '', 6, 1, '2018-12-11', '10:17:15', '2018-12-11', '10:17:57', '2018-12-11 10:17:15', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 2, 1),
(44, '', 0, '', 0, '', 3, 1, '2018-12-11', '10:18:19', '0000-00-00', '00:00:00', '2018-12-11 10:18:19', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` bigint(20) NOT NULL,
  `occupy_id` int(11) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `cancel_no` int(11) NOT NULL,
  `duplicate_bill_count` int(11) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_pan` varchar(15) NOT NULL,
  `customer_address` varchar(150) NOT NULL,
  `customer_pax` int(11) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `table_id` int(11) NOT NULL,
  `floor_id` int(11) NOT NULL,
  `sub_total` float NOT NULL,
  `service_charge_rate` float NOT NULL,
  `service_charge_amount` float NOT NULL,
  `vat_rate` float NOT NULL,
  `taxable_amount` float NOT NULL,
  `vat_amount` float NOT NULL,
  `discount_rate` float NOT NULL,
  `discount_amount` float NOT NULL,
  `total` float NOT NULL,
  `round_value` float NOT NULL,
  `payable_total` float NOT NULL,
  `received_amount` float NOT NULL,
  `change_amount` float NOT NULL,
  `payment_type` tinyint(1) NOT NULL,
  `debtor_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `delivery_charge_against_inv` varchar(255) NOT NULL,
  `is_printed` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `printed_by` int(11) NOT NULL,
  `is_cancel` tinyint(1) NOT NULL,
  `cancel_against_inv` varchar(255) NOT NULL,
  `cancelled_reason` text NOT NULL,
  `member_id` int(11) NOT NULL,
  `privillege_threshold_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `occupy_id`, `invoice_no`, `cancel_no`, `duplicate_bill_count`, `customer_name`, `customer_pan`, `customer_address`, `customer_pax`, `customer_phone`, `table_id`, `floor_id`, `sub_total`, `service_charge_rate`, `service_charge_amount`, `vat_rate`, `taxable_amount`, `vat_amount`, `discount_rate`, `discount_amount`, `total`, `round_value`, `payable_total`, `received_amount`, `change_amount`, `payment_type`, `debtor_id`, `created_on`, `created_by`, `type`, `delivery_charge_against_inv`, `is_printed`, `is_active`, `printed_by`, `is_cancel`, `cancel_against_inv`, `cancelled_reason`, `member_id`, `privillege_threshold_id`) VALUES
(0, 0, '18-5', 0, 0, 'Sugen', '123123123', 'asdfasdf', 0, '', 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 100, 0, 0, 0, 0, 1, 1, '2018-01-11 10:59:43', 2, 3, '18-4', 0, 0, 0, 0, '', '', 0, 0),
(1515564580, 1, '18-1', 0, 1, '', '0', '', 1, '', 4, 1, 455, 10, 45.5, 0, 0, 0, 0, 0, 501, 0.5, 501, 501, 0, 0, 0, '2018-01-10 11:54:40', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1515647662, 0, '18-2', 0, 0, 'Asdasdf', '123123123', 'asdfasdfasdf', 0, '1123123', 0, 0, 455, 10, 45.5, 0, 0, 0, 0, 0, 501, 0.5, 501, 501, 0, 0, 0, '2018-01-11 10:59:22', 2, 2, '', 0, 0, 0, 0, '', '', 0, 2),
(1515647663, 0, '18-3', 0, 0, 'Asdasdf', '123123123', 'Asdfasdfasdf', 0, '', 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 100, 0, 0, 0, 0, 0, 0, '2018-01-11 10:59:23', 2, 3, '18-2', 0, 0, 0, 0, '', '', 0, 0),
(1515647682, 0, '18-4', 0, 0, 'Sugen', '123123123', 'asdfasdf', 0, '1231231', 0, 0, 455, 10, 45.5, 0, 0, 0, 0, 0, 501, 0.5, 501, 0, 0, 1, 1, '2018-01-11 10:59:43', 2, 2, '', 0, 0, 0, 0, '', '', 0, 2),
(1515647797, 0, '18-6', 0, 0, 'Sugen', '123123123', 'asdfasdf', 0, '1231231', 0, 0, 455, 10, 45.5, 0, 0, 0, 0, 0, 501, 0.5, 501, 0, 0, 1, 1, '2018-01-11 11:01:37', 2, 2, '', 0, 0, 0, 0, '', '', 0, 2),
(1515647798, 0, '18-7', 0, 0, 'Sugen', '123123123', 'asdfasdf', 0, '', 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 100, 0, 0, 0, 0, 1, 1, '2018-01-11 11:01:38', 2, 3, '18-6', 0, 0, 0, 0, '', '', 0, 0),
(1515648077, 0, '18-8', 0, 0, 'Adfasd', '234234234', '234sdfsdfg', 0, '234234234', 0, 0, 655, 10, 65.5, 0, 0, 0, 0, 0, 721, 0.5, 721, 721, 0, 0, 0, '2018-01-11 11:06:17', 2, 2, '', 0, 0, 0, 0, '', '', 0, 2),
(1515648078, 0, '18-9', 0, 0, 'Adfasd', '234234234', '234sdfsdfg', 0, '', 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 100, 0, 0, 0, 0, 0, 0, '2018-01-11 11:06:18', 2, 3, '18-8', 0, 0, 0, 0, '', '', 0, 0),
(1515648109, 2, '18-10', 0, 0, '', '0', '', 0, '', 4, 1, 380, 10, 38, 0, 0, 0, 0, 0, 418, 0, 418, 418, 0, 0, 0, '2018-01-11 11:06:49', 2, 0, '', 0, 0, 0, 0, '', '', 0, 0),
(1515648205, 2, '18-11', 0, 0, '', '0', '', 0, '', 4, 1, 380, 10, 38, 0, 0, 0, 0, 0, 418, 0, 418, 418, 0, 0, 0, '2018-01-11 11:08:25', 2, 0, '', 0, 0, 0, 0, '', '', 0, 0),
(1515648294, 2, '18-12', 0, 0, '', '0', '', 0, '', 4, 1, 380, 10, 38, 0, 0, 0, 0, 0, 418, 0, 418, 418, 0, 0, 0, '2018-01-11 11:09:54', 2, 0, '', 0, 0, 0, 0, '', '', 0, 0),
(1515648295, 2, '18-13', 0, 0, '', '0', '', 0, '', 4, 1, 275, 10, 27.5, 0, 0, 0, 0, 0, 303, 0.5, 303, 303, 0, 0, 0, '2018-01-11 11:09:55', 2, 0, '', 0, 0, 0, 0, '', '', 0, 0),
(1515648646, 3, '18-14', 0, 0, '', '0', '', 0, '', 20, 1, 380, 10, 38, 0, 0, 0, 0, 0, 418, 0, 418, 418, 0, 0, 0, '2018-01-11 11:15:46', 2, 0, '', 0, 0, 0, 0, '', '', 0, 0),
(1515648960, 3, '18-15', 0, 0, '', '0', '', 0, '', 20, 1, 380, 10, 38, 0, 0, 0, 0, 0, 418, 0, 418, 418, 0, 0, 0, '2018-01-11 11:21:00', 2, 0, '', 0, 0, 0, 0, '', '', 0, 0),
(1515648989, 3, '18-16', 0, 0, '', '0', '', 0, '', 20, 1, 380, 10, 38, 0, 0, 0, 0, 0, 418, 0, 418, 418, 0, 0, 0, '2018-01-11 11:21:29', 2, 0, '', 0, 0, 0, 0, '', '', 0, 0),
(1515648991, 3, '18-17', 0, 0, '', '0', '', 0, '', 20, 1, 275, 10, 27.5, 0, 0, 0, 0, 0, 303, 0.5, 303, 303, 0, 0, 0, '2018-01-11 11:21:30', 2, 0, '', 0, 0, 0, 0, '', '', 0, 0),
(1515667132, 4, '18-18', 0, 0, '', '0', '', 1, '', 20, 1, 455, 10, 45.5, 0, 0, 0, 0, 0, 501, 0.5, 501, 501, 0, 0, 0, '2018-01-11 16:23:52', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1515992324, 5, '18-19', 0, 0, '', '0', '', 1, '', 20, 1, 455, 10, 45.5, 0, 0, 0, 0, 0, 501, 0.5, 501, 501, 0, 0, 0, '2018-01-15 10:43:44', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1522212593, 9, '18-20', 0, 0, '', '0', '', 20, '', 1, 1, 600000, 10, 60000, 0, 0, 0, 0, 0, 660000, 0, 660000, 660000, 0, 0, 0, '2018-03-28 10:34:53', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1523437832, 11, '18-21', 0, 0, '', '0', '', 1, '', 2, 1, 1025, 10, 102.5, 0, 0, 0, 0, 0, 1128, 0.5, 1128, 1128, 0, 0, 0, '2018-04-11 14:55:32', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1523437928, 12, '18-22', 0, 0, '', '0', '', 1, '', 2, 1, 1310, 10, 131, 0, 0, 0, 0, 0, 1441, 0, 1441, 1441, 0, 0, 0, '2018-04-11 14:57:08', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1523438357, 13, '18-23', 0, 0, '', '0', '', 1, '', 2, 1, 1310, 10, 131, 0, 0, 0, 0, 0, 1441, 0, 1441, 1441, 0, 0, 0, '2018-04-11 15:04:17', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1523439315, 14, '18-25', 0, 0, '', '0', '', 1, '', 2, 1, 2620, 10, 262, 0, 0, 0, 0, 0, 2882, 0, 2882, 2882, 0, 0, 0, '2018-04-11 15:20:15', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1523439978, 15, '18-26', 0, 0, '', '0', '', 1, '', 2, 1, 1310, 10, 131, 0, 0, 0, 0, 0, 1441, 0, 1441, 1441, 0, 0, 0, '2018-04-11 15:31:18', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1523441989, 16, '18-27', 0, 0, '', '0', '', 1, '', 2, 1, 900, 10, 90, 0, 0, 0, 0, 0, 990, 0, 990, 990, 0, 0, 0, '2018-04-11 16:04:49', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1523442523, 17, '18-28', 0, 0, '', '0', '', 1, '', 2, 1, 1055, 10, 105.5, 0, 0, 0, 0, 0, 1161, 0.5, 1161, 1161, 0, 0, 0, '2018-04-11 16:13:43', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1523513052, 18, '18-29', 0, 0, '', '0', '', 1, '', 2, 1, 3185, 10, 318.5, 0, 0, 0, 0, 0, 3504, 0.5, 3504, 3504, 0, 0, 0, '2018-04-12 11:49:12', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1523513859, 19, '18-30', 0, 0, '', '0', '', 1, '', 2, 1, 275, 10, 27.5, 0, 0, 0, 0, 0, 303, 0.5, 303, 303, 0, 0, 0, '2018-04-12 12:02:39', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1523515134, 20, '18-31', 0, 0, '', '0', '', 1, '', 2, 1, 910, 10, 91, 0, 0, 0, 0, 0, 1001, 0, 1001, 1001, 0, 0, 0, '2018-04-12 12:23:54', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1523598408, 21, '18-32', 0, 0, '', '0', '', 1, '', 2, 1, 2095, 10, 209.5, 0, 0, 0, 0, 0, 2305, 0.5, 2305, 2305, 0, 0, 0, '2018-04-13 11:31:48', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1523598511, 22, '18-33', 0, 0, '', '0', '', 1, '', 2, 1, 730, 10, 73, 0, 0, 0, 0, 0, 803, 0, 803, 803, 0, 0, 0, '2018-04-13 11:33:31', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1523616253, 23, '18-34', 0, 0, '', '0', '', 1, '', 2, 1, 1185, 10, 118.5, 0, 0, 0, 0, 0, 1304, 0.5, 1304, 1304, 0, 0, 0, '2018-04-13 16:29:13', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1523857173, 24, '18-35', 0, 0, '', '0', '', 1, '', 2, 1, 910, 10, 91, 0, 0, 0, 0, 0, 1001, 0, 1001, 1001, 0, 0, 0, '2018-04-16 11:24:33', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1523858350, 25, '18-36', 0, 0, '', '0', '', 1, '', 2, 1, 910, 10, 91, 0, 0, 0, 0, 0, 1001, 0, 1001, 1001, 0, 0, 0, '2018-04-16 11:44:10', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1523860088, 26, '18-37', 0, 0, '', '0', '', 1, '', 2, 1, 910, 10, 91, 0, 0, 0, 0, 0, 1001, 0, 1001, 1001, 0, 0, 0, '2018-04-16 12:13:08', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1523878364, 0, '18-38', 0, 0, '', '0', '', 0, '', 0, 0, 910, 0, 0, 0, 0, 0, 0, 0, 910, 0, 910, 910, 0, 0, 0, '2018-04-16 17:17:44', 2, 5, '', 0, 0, 0, 0, '', '', 0, 2),
(1524484078, 27, '18-39', 0, 0, '', '0', '', 12, '', 2, 1, 12440, 10, 1244, 0, 0, 0, 0, 0, 13684, 0, 13684, 13684, 0, 0, 0, '2018-04-23 17:32:58', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1524721595, 30, '18-40', 0, 0, '', '0', '', 1, '', 15, 1, 1585, 10, 158.5, 0, 0, 0, 0, 0, 1744, 0.5, 1744, 1744, 0, 0, 0, '2018-04-26 11:31:35', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1526382400, 31, '18-41', 0, 0, '', '0', '', 1, '', 1, 1, 180, 10, 18, 0, 0, 0, 0, 0, 198, 0, 198, 198, 0, 0, 0, '2018-05-15 16:51:40', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1528101530, 0, '18-42', 0, 0, 'Sugen', '98989898', 'lazimpat', 0, '', 0, 0, 655, 10, 65.5, 0, 0, 0, 0, 0, 721, 0.5, 721, 721, 0, 0, 0, '2018-07-16 14:23:51', 2, 1, '', 0, 0, 0, 0, '', '', 0, 2),
(1535693038, 34, '18-43', 0, 0, '', '0', '', 1, '', 14, 1, 455, 10, 45.5, 0, 0, 0, 0, 0, 501, 0.5, 501, 501, 0, 0, 0, '2018-08-31 11:08:58', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1542340762, 38, '18-44', 0, 0, 'Person 1', '0', '', 2, '', 11, 2, 900, 10, 81, 0, 0, 0, 10, 90, 891, 0, 891, 0, 0, 1, 5, '2018-11-16 09:44:22', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1542771841, 37, '18-45', 0, 0, 'Sugen', '0', '', 1, '', 20, 1, 730, 10, 73, 0, 0, 0, 0, 0, 803, 0, 803, 0, 0, 1, 1, '2018-11-21 09:29:01', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1543898030, 0, '18-46', 0, 0, '', '0', '', 0, '', 0, 0, 180, 0, 0, 0, 0, 0, 0, 0, 180, 0, 180, 180, 0, 0, 0, '2018-12-04 10:18:50', 2, 5, '', 0, 0, 0, 0, '', '', 0, 2),
(1544502718, 36, '18-47', 0, 0, '', '0', '', 1, '', 6, 1, 380, 10, 38, 0, 0, 0, 0, 0, 418, 0, 418, 418, 0, 0, 0, '2018-12-11 10:16:58', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1544502776, 43, '18-48', 0, 0, '', '0', '', 1, '', 6, 1, 380, 10, 38, 0, 0, 0, 0, 0, 418, 0, 418, 418, 0, 0, 0, '2018-12-11 10:17:56', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2),
(1544502792, 32, '18-49', 0, 0, '', '0', '', 1, '', 3, 1, 635, 10, 63.5, 0, 0, 0, 0, 0, 699, 0.5, 699, 699, 0, 0, 0, '2018-12-11 10:18:12', 2, 0, '', 0, 0, 0, 0, '', '', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
`id` int(11) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `item_id`, `quantity`, `price`, `type`) VALUES
(1, 1515564580, 1, 1, 180, 0),
(2, 1515564580, 2, 1, 200, 0),
(3, 1515564580, 4, 1, 75, 0),
(4, 1515647662, 1, 1, 180, 0),
(5, 1515647662, 2, 1, 200, 0),
(6, 1515647662, 4, 1, 75, 0),
(7, 1515647682, 1, 1, 180, 0),
(8, 1515647682, 2, 1, 200, 0),
(9, 1515647682, 4, 1, 75, 0),
(10, 1515647797, 1, 1, 180, 0),
(11, 1515647797, 2, 1, 200, 0),
(12, 1515647797, 4, 1, 75, 0),
(13, 1515648077, 1, 1, 180, 0),
(14, 1515648077, 2, 1, 200, 0),
(15, 1515648077, 4, 1, 75, 0),
(16, 1515648077, 32, 1, 200, 0),
(17, 1515648109, 2, 1, 200, 0),
(18, 1515648109, 1, 1, 180, 0),
(19, 1515648205, 1, 1, 180, 0),
(20, 1515648205, 2, 1, 200, 0),
(21, 1515648294, 1, 1, 180, 0),
(22, 1515648294, 2, 1, 200, 0),
(23, 1515648295, 4, 1, 75, 0),
(24, 1515648295, 32, 1, 200, 0),
(25, 1515648646, 1, 1, 180, 0),
(26, 1515648646, 2, 1, 200, 0),
(27, 1515648960, 1, 1, 180, 0),
(28, 1515648960, 2, 1, 200, 0),
(29, 1515648989, 1, 1, 180, 0),
(30, 1515648989, 2, 1, 200, 0),
(31, 1515648991, 4, 1, 75, 0),
(32, 1515648991, 32, 1, 200, 0),
(33, 1515667132, 1, 1, 180, 0),
(34, 1515667132, 2, 1, 200, 0),
(35, 1515667132, 4, 1, 75, 0),
(36, 1515992324, 1, 1, 180, 0),
(37, 1515992324, 2, 1, 200, 0),
(38, 1515992324, 4, 1, 75, 0),
(39, 1522212593, 1, 16, 180, 0),
(40, 1522212593, 2, 9, 200, 0),
(41, 1522212593, 13, 10, 50, 0),
(42, 1522212593, 14, 2, 75, 0),
(43, 1522212593, 28, 11, 50, 0),
(44, 1522212593, 27, 7, 200, 0),
(45, 1522212593, 31, 2, 300, 0),
(46, 1522212593, 34, 2, 32423400, 0),
(47, 1522212593, 6, 5, 100, 0),
(48, 1522212593, 11, 10, 100, 0),
(49, 1522212593, 12, 5, 200, 0),
(50, 1522212593, 26, 11, 100, 0),
(51, 1522212593, 4, 9, 75, 0),
(52, 1522212593, 32, 4, 200, 0),
(53, 1522212593, 35, 4, 1000, 0),
(54, 1522212593, 3, 4, 50, 0),
(55, 1522212593, 5, 4, 125, 0),
(56, 1522212593, 33, 4, 150, 0),
(57, 1522212593, 36, 4, 123, 0),
(58, 1522212593, 15, 9, 125, 0),
(59, 1522212593, 30, 10, 125, 0),
(60, 1522212593, 29, 5, 75, 0),
(61, 1523437832, 2, 1, 200, 0),
(62, 1523437832, 5, 1, 125, 0),
(63, 1523437832, 32, 2, 200, 0),
(64, 1523437832, 33, 2, 150, 0),
(65, 1523437928, 1, 2, 180, 0),
(66, 1523437928, 2, 2, 200, 0),
(67, 1523437928, 4, 2, 75, 0),
(68, 1523437928, 32, 2, 200, 0),
(69, 1523438357, 1, 2, 180, 0),
(70, 1523438357, 2, 2, 200, 0),
(71, 1523438357, 4, 2, 75, 0),
(72, 1523438357, 32, 2, 200, 0),
(73, 1523438717, 6, 1, 100, 0),
(74, 1523438717, 3, 1, 50, 0),
(75, 1523438717, 5, 1, 125, 0),
(76, 1523438717, 33, 1, 150, 0),
(77, 1523439315, 1, 4, 180, 0),
(78, 1523439315, 2, 4, 200, 0),
(79, 1523439315, 4, 4, 75, 0),
(80, 1523439315, 32, 4, 200, 0),
(81, 1523439978, 1, 2, 180, 0),
(82, 1523439978, 2, 2, 200, 0),
(83, 1523439978, 4, 2, 75, 0),
(84, 1523439978, 32, 2, 200, 0),
(85, 1523441989, 11, 2, 100, 0),
(86, 1523441989, 13, 4, 50, 0),
(87, 1523441989, 15, 4, 125, 0),
(88, 1523442523, 1, 1, 180, 0),
(89, 1523442523, 2, 2, 200, 0),
(90, 1523442523, 4, 1, 75, 0),
(91, 1523442523, 32, 2, 200, 0),
(92, 1523513052, 1, 7, 180, 0),
(93, 1523513052, 2, 7, 200, 0),
(94, 1523513052, 4, 7, 75, 0),
(95, 1523513859, 11, 1, 100, 0),
(96, 1523513859, 13, 1, 50, 0),
(97, 1523513859, 15, 1, 125, 0),
(98, 1523515134, 1, 2, 180, 0),
(99, 1523515134, 2, 2, 200, 0),
(100, 1523515134, 4, 2, 75, 0),
(101, 1523598408, 1, 4, 180, 0),
(102, 1523598408, 2, 4, 200, 0),
(103, 1523598408, 4, 4, 75, 0),
(104, 1523598408, 11, 1, 100, 0),
(105, 1523598408, 13, 1, 50, 0),
(106, 1523598408, 15, 1, 125, 0),
(107, 1523598511, 1, 1, 180, 0),
(108, 1523598511, 2, 1, 200, 0),
(109, 1523598511, 4, 1, 75, 0),
(110, 1523598511, 11, 1, 100, 0),
(111, 1523598511, 13, 1, 50, 0),
(112, 1523598511, 15, 1, 125, 0),
(113, 1523616253, 1, 2, 180, 0),
(114, 1523616253, 2, 2, 200, 0),
(115, 1523616253, 4, 2, 75, 0),
(116, 1523616253, 11, 1, 100, 0),
(117, 1523616253, 13, 1, 50, 0),
(118, 1523616253, 15, 1, 125, 0),
(119, 1523857173, 1, 2, 180, 0),
(120, 1523857173, 2, 2, 200, 0),
(121, 1523857173, 4, 2, 75, 0),
(122, 1523858350, 1, 2, 180, 0),
(123, 1523858350, 2, 2, 200, 0),
(124, 1523858350, 4, 2, 75, 0),
(125, 1523860088, 1, 2, 180, 0),
(126, 1523860088, 2, 2, 200, 0),
(127, 1523860088, 4, 2, 75, 0),
(128, 1523878364, 1, 2, 180, 0),
(129, 1523878364, 2, 2, 200, 0),
(130, 1523878364, 4, 2, 75, 0),
(131, 1524484078, 1, 18, 180, 0),
(132, 1524484078, 2, 17, 200, 0),
(133, 1524484078, 4, 5, 75, 0),
(134, 1524484078, 35, 1, 1000, 0),
(135, 1524484078, 6, 1, 100, 0),
(136, 1524484078, 3, 1, 50, 0),
(137, 1524484078, 5, 1, 125, 0),
(138, 1524484078, 33, 1, 150, 0),
(139, 1524484078, 1, 6, 200, 1),
(140, 1524484078, 6, 5, 100, 1),
(141, 1524484078, 7, 14, 100, 1),
(142, 1524484078, 2, 3, 200, 1),
(143, 1524484078, 5, 3, 100, 1),
(144, 1524721595, 4, 3, 75, 0),
(145, 1524721595, 32, 3, 200, 0),
(146, 1524721595, 1, 2, 180, 0),
(147, 1524721595, 2, 2, 200, 0),
(148, 1526382400, 1, 1, 180, 0),
(149, 1528101530, 1, 1, 180, 0),
(150, 1528101530, 2, 1, 200, 0),
(151, 1528101530, 4, 1, 75, 0),
(152, 1528101530, 32, 1, 200, 0),
(153, 1535693038, 1, 1, 180, 0),
(154, 1535693038, 2, 1, 200, 0),
(155, 1535693038, 4, 1, 75, 0),
(156, 1542340762, 1, 5, 180, 0),
(157, 1542771841, 1, 1, 180, 0),
(158, 1542771841, 2, 1, 200, 0),
(159, 1542771841, 4, 1, 75, 0),
(160, 1542771841, 11, 1, 100, 0),
(161, 1542771841, 13, 1, 50, 0),
(162, 1542771841, 15, 1, 125, 0),
(163, 1544502718, 1, 1, 180, 0),
(164, 1544502718, 2, 1, 200, 0),
(165, 1544502776, 1, 1, 180, 0),
(166, 1544502776, 2, 1, 200, 0),
(167, 1544502792, 1, 2, 180, 0),
(168, 1544502792, 11, 1, 100, 0),
(169, 1544502792, 13, 1, 50, 0),
(170, 1544502792, 15, 1, 125, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pick_up`
--

CREATE TABLE IF NOT EXISTS `pick_up` (
`id` int(11) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_pan` int(11) NOT NULL,
  `customer_address` varchar(150) NOT NULL,
  `customer_phone` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_confirmed` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pick_up`
--

INSERT INTO `pick_up` (`id`, `customer_name`, `customer_pan`, `customer_address`, `customer_phone`, `created_on`, `created_by`, `status`, `is_confirmed`) VALUES
(1, 'test', 0, '', '123456789', '2018-04-24 12:14:05', 2, 0, 0),
(2, 'asdfasdf', 0, 'adsfasdf', '', '2018-11-15 14:50:46', 2, 0, 0),
(3, 'asdfasdf', 0, '', '', '2018-11-15 14:51:09', 2, 0, 0),
(4, 'sdfgh', 0, '', '3435467', '2018-12-04 10:17:24', 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `printers`
--

CREATE TABLE IF NOT EXISTS `printers` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `printer_name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `printers`
--

INSERT INTO `printers` (`id`, `name`, `slug`, `printer_name`) VALUES
(5, 'bill', 'bill', 'epson'),
(6, 'kitchen', 'kitchen', 'epson'),
(7, 'bar', 'bar', 'epson'),
(8, 'bakery', 'bakery', 'epson');

-- --------------------------------------------------------

--
-- Table structure for table `printer_list`
--

CREATE TABLE IF NOT EXISTS `printer_list` (
`id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `printer_lists`
--

CREATE TABLE IF NOT EXISTS `printer_lists` (
`id` int(11) NOT NULL,
  `name` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `printer_lists`
--

INSERT INTO `printer_lists` (`id`, `name`) VALUES
(1, '[{"NAME":"Send To OneNote 2013","DESCRIPTION":"Send To OneNote 2013,Send to Microsoft OneNote 15 Driver,","COMMENT":""},{"NAME":"Samsung SCX-3400 Series","DESCRIPTION":"Samsung SCX-3400 Series,Samsung SCX-3400 Series Class Driver,","COMMENT":""},{"NAME":"Microsoft XPS Document Writer","DESCRIPTION":"Microsoft XPS Document Writer,Microsoft XPS Document Writer v4,","COMMENT":""},{"NAME":"Microsoft Print to PDF","DESCRIPTION":"Microsoft Print to PDF,Microsoft Print To PDF,","COMMENT":""},{"NAME":"Fax","DESCRIPTION":"Fax,Microsoft Shared Fax Driver,","COMMENT":""},{"NAME":"epson","DESCRIPTION":"epson,EPSON TM-U220 ReceiptE4,","COMMENT":""},{"NAME":"Brother DCP-T700W Printer","DESCRIPTION":"Brother DCP-T700W Printer,Brother Generic Jpeg Type2 Class Driver,","COMMENT":""},{"NAME":"Brother DCP-T700W","DESCRIPTION":"Brother DCP-T700W,Brother Generic Jpeg Type2 Class Driver,","COMMENT":""}]');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
`id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `item_id`, `quantity`, `created_on`, `created_by`) VALUES
(1, 9, 2000, '2017-05-23 16:12:45', 2),
(2, 1, 50, '2017-07-19 10:46:08', 2),
(3, 1, 10, '2018-11-16 09:32:09', 2);

-- --------------------------------------------------------

--
-- Table structure for table `random`
--

CREATE TABLE IF NOT EXISTS `random` (
`id` int(11) NOT NULL,
  `field_name` text NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `random`
--

INSERT INTO `random` (`id`, `field_name`, `value`) VALUES
(2, 'admin_mac_address', 'F8-A9-63-27-FC-B7'),
(7, 'delivery_charge_amount', '50'),
(8, 'delivery_charge_vat_status', 'inclusive'),
(10, 'current_year_for_invoice', '2017-07-16'),
(11, 'document', '<h3>Information, Terms & User Manual for TRUFFLE</h3>        	<h3>Following User Guide aims to inform about some of the variations on Truffle Software.</h3>        	<p>The information pertained in this documents relates to the following versions of TRUFFLE software.</p>    		<ol>        		<li>TRUFFLE Lite PAN</li>        		<li>TRUFFLE Lite VAT</li>        		<li>TRUFFLE Pro PAN</li>        		<li>TRUFFLE Pro VAT</li>    		</ol>        	<h3>License:</h3>        	<p>TRUFFLE Software and all its variations are the property of Klient Scape Software Pvt. Ltd. The License to use the software must be authorised by Klient Scape Software Pvt. Ltd.</p>         	<p>For the purposes of this manual, unless otherwise stated, all versions are collective named ‘Truffle’. Klient Scape Software will be named as ‘Company’ and the license holders to use the software will be called ‘Clients’. Anyone using the software will be collectively called in as ‘Users’.</p>        	<h3>Agreement</h3>        	<p>Users are authorised to use the functions provided within the software. Users are not allowed to copy, distribute or share any information within the software to anyone without the consent of the Company. Users may not change the functionality of the software under any circumstance and failure to abide by these terms are considered breach of contract, and the company may pursue legal action.</p>        	<h3>How To:</h3>        	<h3>Create Users:</h3>        	<p>Administrators are allowed to create users, the number of users allowed to create depends on the version. Pro versions allow for unlimited number of users.</p>        	<h3>Assign Access Roles</h3>        	<p>There are 2 access roles – Admin and Staff</p>        	<p>Users with admin levels access are privy to all the features available in Truffle. Admin can provide up to 90% in discounts and authorise sales returns. Admins can also view all the analysis and are entered into a dashboard view once logged in to see the overview of the restaurant.</p>        	<p>Users with Staff access roles are directly logged into the restaurant view and are not privy to all the data within the software. Staff can also be enrolled with up to 90% discounts. However, an admin must assign which staff to allocate the % of discount.</p>        	<h3>Dashboard View:</h3>        	<p>Dashboard view allows a quick glance of the restaurant in terms of financial prospective. Debtors list and transaction history are conveniently located at the upper left corner of the dashboard view. A large section occupies a bar graph relating to total sales and total cash-in. Note: Total sales can be different from total cash in.</p>        	<p>The three boxes underneath shows overall sales, current month sales, and current day sales.</p>        	<p>The total report section shows the total number of customers, average sales per customer and average sales per person along with average time each table gets occupied.</p>        	<p>The today’s summary section in the dashboard is one of the handiest tools that shows all the relevant information of current day status.</p>        	<h3>Capacity Rate:</h3>        	<p>The capacity rate shows the rate in which the restaurant capacity is being utilised. If the restaurant has a capacity of 100 seats, 100 customers a day would make a 100% capacity rate. </p>        	<p>The dashboard offers to set a capacity rate under the heading of ‘Change Restaurant Capacity.’</p>        	<p>Difference between Total Sales and Cash IN:</p>        	<p>The Total sales amount shows the actual sales the restaurant has made, that is all cash sales, all credit sales and does not include service charge or the VAT payable from sales.</p>        	<p>The Cash in amount shows only the cash that has been received, i.e Cash sales, credit collection, tips received, service charge, VAT amount etc. This feature is handy to calculate all the sum received during the day.</p>        	<h3>Best Sellers:</h3>        	<p>The dashboard offers a best sellers section conveniently placed to show the best selling items for current day, current month, current year and ALL time.</p>        	<h3>Best Sellers – Gross sales.</h3>        	<p>The dashboard also offers a best sellers in accordance to the revenue generated by each item in the menu. </p>        	<h3>Table View:</h3>        	<h3>Table Layout</h3>        	<p>Pro versions allow for unlimited sections and tables. In lite version, sections are limited but unlimited tables can be created, provided it fits the screen. </p>        	<p>To create a new table, drag the table icon to section area and place it there. From there you can resize, rename any tables. You can also create obstacles to create a restaurant design that best suits the user.</p>        	<p>Once the design of the restaurant is complete, admins can lock the tables and the obstacles.</p>        	<p>Merge Table:To merge table, check if the lock key in the table area is set to unlocked. Drag a the table you want to merge and connect it to another table. The colour of the table changes if it is merged.</p>        	<h3>Take-away, pick-up and delivery:</h3>        	<p>These areas are useful to take orders in accordance to their needs, for customers that are not eating in. You can choose to charge ‘service charge’ according to your desire through the settings area, i.e. you can choose if eat in customers have service charge and take away customers be exempt from it or charge 5% delivery rate. </p>        	<h3>Taking orders:</h3>        	<p>In order to take orders, a menu must be created. To create a menu, under the third settings, under the category of Menu Items, you can add, edit and deactivate menu items. Once menu items are created, orders can be taken through tables or through pick-ups and deliveries.<p>        	<p>To take an order in a table, users should click on the items on the order screen and send to KOT. Once KOT is created, it automatically sends it to the billing area. Users can take more KOTs and send to respective areas, and billing is automatically adjusted.</p>        	<h3>Menu Category:</h3>        	<p>Truffle allows for sending KOT’s to different printers; i.e you can print kitchen orders to kitchen, bar orders to bar. You can create unlimited categories in the pro versions, while the category numbers are restricted to Lite versions.</p>        	<p>Categories are also useful for analysis in terms of items of how certain categories are being sold compared to others. This can be checked through category summary under the second setting sections.</p>        	<h3>Stock:</h3>        	<p>TRUFLLE Pro allows for stock counting. In order to utilize this feature, entries should be made to show opening stock and menu items should reflect the items that it requires to finish producing a menu item.</p>        	<h3>FOC:</h3>        	<p>FOC refers to free-of-cost, as these items will deduct stock but for various reason, requires the cost to be FOC. FOC requires a password that can be set by admins in the settings section.</p>        	<h3>Utensils Stock Manager:</h3>        	<p>Utensils Stock manager allows users to count and adjust all the utensils, i.e. spoons, knives, ash-tray, plates etc. </p>        	<h3>Bill payment:</h3>        	<p>When a customer asks for a bill in their table, under the billing list in the order view, the $ sign allows to make bill payment. Here users can choose to make full cash payments, make partial payments, bank payments or provide full credit payments. Regardless of the payment method, Truffle will create a bill and save it. The print button will print the customer bill, and print and close button will print the bill and close the table. The print temporary option allows to check the printed version of the bill for corrections before closing the bill. Note: The print temporary bill is not an actual invoice, but a mock-up that does not show the companies name, VAT information etc.</p>         	<h3>VAT REPORT:</h3>        	<p>Vat report shows the VAT report in the manner of Nepal VAT sales ledger book. It shows Total Amount, Total taxable amount, VAT percent and VAT Amount with breakdown of all the invoices. The date allows you to sort through VAT reports in accordance to their dates.</p>        	<h3>Fiscal Year</h3>        	<p>Fiscal Years are automatically calculated. Truffle uses proprietary methods to not allow users to make entries as dates are set and all entries time-stamped within the software. Users are not allowed to make entries on a different date. Users are allowed make new entries for up to 10 days after the fiscal year ends, to make changes wherever necessary. </p>        	<p class="text-center">For further help, Contact <span class="text-decoration-underline"> KlientScape Software, 01-4425513 or 01-6201374 </span> or visit us at our Offices in BIshalnagar-5.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `retail`
--

CREATE TABLE IF NOT EXISTS `retail` (
`id` int(11) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_pan` int(11) NOT NULL,
  `customer_address` varchar(150) NOT NULL,
  `customer_phone` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_confirmed` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retail`
--

INSERT INTO `retail` (`id`, `customer_name`, `customer_pan`, `customer_address`, `customer_phone`, `created_on`, `created_by`, `status`, `is_confirmed`) VALUES
(1, '', 0, '', '', '2018-04-16 17:17:35', 2, 1, 2),
(2, '', 0, '', '', '2018-04-24 12:17:08', 2, 1, 2),
(3, '', 0, '', '', '2018-11-15 14:54:44', 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
`id` int(11) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `slug` varchar(100) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `is_permanent` tinyint(4) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `field_name`, `value`, `slug`, `is_active`, `is_permanent`, `created_on`) VALUES
(30, 'master password', 'admin', 'master-password', 1, 1, '2016-09-22 10:13:40'),
(31, 'name in bill', 'klientscape Pvt. Ltd', 'name-in-bill', 1, 1, '2016-09-28 20:30:25'),
(32, 'address in bill', 'gairidhara, ktm', 'address-in-bill', 1, 1, '2016-09-28 20:30:58'),
(33, 'phone no in bill', '01444444', 'phone-no-in-bill', 1, 1, '2016-09-28 20:31:31'),
(34, 'pan no in bill', '123456789', 'pan-no-in-bill', 1, 1, '2016-09-28 20:32:15'),
(35, 'thank you note in bill', 'Happy customer...', 'thank-you-note-in-bill', 1, 1, '2016-09-28 20:32:44'),
(37, 'lock obstacle', 'no', 'lock-obstacle', 1, 1, '2016-10-29 21:44:17'),
(40, 'lock table', 'no', 'lock-table', 1, 1, '2016-11-04 10:25:17'),
(41, 'service charge rate', '10', 'service-charge-rate', 1, 1, '2016-11-04 12:51:14'),
(42, 'take away service charge rate', '10', 'take-away-service-charge-rate', 1, 1, '2016-11-17 17:07:58'),
(45, 'delivery service charge rate', '0', 'delivery-service-charge-rate', 1, 1, '2017-01-10 15:40:45'),
(46, 'send report email 1', 'sugentuladhar@gmail.com', 'send-report-email-1', 1, 1, '2017-03-29 14:43:50'),
(47, 'send report email 2', 'test@gmail.com', 'send-report-email-2', 1, 1, '2017-03-29 14:44:10'),
(48, 'send report email 3', 'sugen@klientscape.com', 'send-report-email-3', 1, 1, '2017-03-29 14:44:23'),
(49, 'vat rate', '13', 'vat-rate', 1, 1, '2017-04-19 16:44:35'),
(50, 'pick up service charge rate', '10', 'pick-up-service-charge-rate', 1, 1, '2017-06-02 17:04:27'),
(51, 'foc password', 'foc', 'foc-password', 1, 1, '2017-07-11 14:04:19'),
(52, 'retail service charge rate', '0', 'retail-service-charge-rate', 1, 1, '2017-11-22 02:06:18'),
(53, 'currency', 'npr', 'currency', 1, 1, '2017-12-11 11:08:05'),
(54, 'member birthday reminder day', '2', 'member-birthday-reminder-day', 1, 1, '2017-12-15 01:03:12'),
(55, 'cancel order password', 'administrator', 'cancel-order-password', 1, 1, '2018-06-15 03:03:03');

-- --------------------------------------------------------

--
-- Table structure for table `special_order_items`
--

CREATE TABLE IF NOT EXISTS `special_order_items` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `remarks` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `special_order_items`
--

INSERT INTO `special_order_items` (`id`, `name`, `price`, `description`, `remarks`, `category_id`, `image`, `created_on`, `created_by`) VALUES
(1, 'special item 1 asdfsadfsadf', 200, 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident', 'asdf sadsadfasdf asdf asdfasdf asd fasd fasdf asd f', 1, '', '2017-04-13 11:46:30', 2),
(2, 'special item 2', 200, 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident', 'asdf asdf asdf sadf asdf asdf asdf asdf asd fasd fasdf asdf asdf asd fasd f', 4, '', '2017-04-13 11:46:49', 2),
(3, 'testint123', 100, 'test', 'test', 1, '', '2018-04-17 10:39:59', 2),
(4, 'testint123', 100, 'test', 'test', 1, '', '2018-04-17 10:40:06', 2),
(5, 'testing1234', 100, 'test', 'test', 1, '', '2018-04-17 10:40:41', 2),
(6, 'testing12345', 100, 'test', 'test', 1, '', '2018-04-17 10:41:30', 2),
(7, 'testint112233', 100, 'test', 'test', 1, '', '2018-04-17 10:42:23', 2);

-- --------------------------------------------------------

--
-- Table structure for table `stock_entries`
--

CREATE TABLE IF NOT EXISTS `stock_entries` (
`id` int(11) NOT NULL,
  `stock_item_id` int(11) NOT NULL,
  `stock_in` float NOT NULL,
  `stock_out` float NOT NULL,
  `is_os` int(11) NOT NULL,
  `adjusted_quantity` float NOT NULL,
  `adjusted_date` datetime NOT NULL,
  `remarks` text NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_entries`
--

INSERT INTO `stock_entries` (`id`, `stock_item_id`, `stock_in`, `stock_out`, `is_os`, `adjusted_quantity`, `adjusted_date`, `remarks`, `created_on`, `created_by`) VALUES
(1, 1, 0, 0, 1, 0, '0000-00-00 00:00:00', '', '2017-04-13 11:33:07', 2),
(2, 2, 1000, 0, 1, 0, '0000-00-00 00:00:00', '', '2017-04-13 11:33:18', 2),
(3, 3, 500, 0, 1, 0, '0000-00-00 00:00:00', '', '2017-04-13 11:33:31', 2),
(4, 4, 1000, 0, 1, 0, '0000-00-00 00:00:00', '', '2017-04-13 11:33:48', 2),
(5, 5, 200, 0, 1, 0, '0000-00-00 00:00:00', '', '2017-04-13 11:34:00', 2),
(6, 6, 100, 0, 1, 0, '0000-00-00 00:00:00', '', '2017-04-13 11:34:11', 2),
(7, 1, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2017-04-13 12:00:57', 2),
(8, 2, 0, 20, 0, 0, '0000-00-00 00:00:00', '', '2017-04-13 12:00:58', 2),
(9, 1, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2017-04-13 12:37:14', 2),
(10, 2, 0, 20, 0, 0, '0000-00-00 00:00:00', '', '2017-04-13 12:37:14', 2),
(11, 1, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2017-04-13 12:58:40', 2),
(12, 2, 0, 20, 0, 0, '0000-00-00 00:00:00', '', '2017-04-13 12:58:41', 2),
(13, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2017-05-23 12:11:00', 2),
(14, 2, 0, 10, 0, 0, '0000-00-00 00:00:00', '', '2017-05-23 12:11:01', 2),
(15, 7, 100, 0, 1, 0, '0000-00-00 00:00:00', '', '2017-05-23 12:29:50', 2),
(16, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2017-05-23 15:59:14', 2),
(17, 2, 0, 10, 0, 0, '0000-00-00 00:00:00', '', '2017-05-23 15:59:14', 2),
(18, 8, 1000, 0, 1, 0, '0000-00-00 00:00:00', '', '2017-05-23 16:11:43', 2),
(19, 9, 1000, 0, 1, 0, '0000-00-00 00:00:00', '', '2017-05-23 16:11:48', 2),
(20, 9, 2000, 0, 0, 0, '0000-00-00 00:00:00', '', '2017-05-23 16:12:45', 2),
(21, 10, 1000, 0, 1, 0, '0000-00-00 00:00:00', '', '2017-06-20 17:42:01', 2),
(22, 1, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2017-06-22 11:35:06', 2),
(23, 2, 0, 20, 0, 0, '0000-00-00 00:00:00', '', '2017-06-22 11:35:06', 2),
(24, 7, 0, 10, 0, 0, '0000-00-00 00:00:00', '', '2017-07-18 15:28:24', 2),
(25, 6, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2017-07-18 15:28:24', 2),
(26, 5, 0, 50, 0, 0, '0000-00-00 00:00:00', '', '2017-07-18 15:28:24', 2),
(27, 7, 0, 10, 0, 0, '0000-00-00 00:00:00', '', '2017-07-19 10:44:03', 2),
(28, 6, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2017-07-19 10:44:04', 2),
(29, 5, 0, 50, 0, 0, '0000-00-00 00:00:00', '', '2017-07-19 10:44:04', 2),
(30, 1, 50, 0, 0, 0, '0000-00-00 00:00:00', '', '2017-07-19 10:46:08', 2),
(31, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2017-07-21 15:10:56', 2),
(32, 2, 0, 10, 0, 0, '0000-00-00 00:00:00', '', '2017-07-21 15:10:56', 2),
(33, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2017-07-21 17:18:41', 2),
(34, 2, 0, 10, 0, 0, '0000-00-00 00:00:00', '', '2017-07-21 17:18:41', 2),
(35, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2017-07-21 17:24:42', 2),
(36, 2, 0, 10, 0, 0, '0000-00-00 00:00:00', '', '2017-07-21 17:24:42', 2),
(37, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2017-07-21 17:26:04', 2),
(38, 2, 0, 10, 0, 0, '0000-00-00 00:00:00', '', '2017-07-21 17:26:04', 2),
(39, 1, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2017-07-24 15:17:36', 2),
(40, 2, 0, 20, 0, 0, '0000-00-00 00:00:00', '', '2017-07-24 15:17:36', 2),
(41, 1, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2017-07-24 15:21:25', 2),
(42, 2, 0, 20, 0, 0, '0000-00-00 00:00:00', '', '2017-07-24 15:21:25', 2),
(43, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2017-07-24 15:31:25', 2),
(44, 2, 0, 10, 0, 0, '0000-00-00 00:00:00', '', '2017-07-24 15:31:25', 2),
(45, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2017-07-25 17:16:16', 2),
(46, 2, 0, 10, 0, 0, '0000-00-00 00:00:00', '', '2017-07-25 17:16:16', 2),
(47, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2017-07-25 17:29:48', 2),
(48, 2, 0, 10, 0, 0, '0000-00-00 00:00:00', '', '2017-07-25 17:29:48', 2),
(49, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2017-07-25 17:30:53', 2),
(50, 2, 0, 10, 0, 0, '0000-00-00 00:00:00', '', '2017-07-25 17:30:53', 2),
(51, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2017-07-25 17:31:59', 2),
(52, 2, 0, 10, 0, 0, '0000-00-00 00:00:00', '', '2017-07-25 17:31:59', 2),
(53, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2017-07-26 14:51:18', 2),
(54, 2, 0, 10, 0, 0, '0000-00-00 00:00:00', '', '2017-07-26 14:51:18', 2),
(55, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2017-07-26 14:53:53', 2),
(56, 2, 0, 10, 0, 0, '0000-00-00 00:00:00', '', '2017-07-26 14:53:53', 2),
(57, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2017-07-26 15:26:00', 2),
(58, 2, 0, 10, 0, 0, '0000-00-00 00:00:00', '', '2017-07-26 15:26:01', 2),
(59, 1, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2017-07-27 10:25:13', 5),
(60, 2, 0, 20, 0, 0, '0000-00-00 00:00:00', '', '2017-07-27 10:25:13', 5),
(61, 11, 1000, 0, 1, 0, '0000-00-00 00:00:00', '', '2017-07-31 11:33:07', 2),
(62, 1, 0, 0, 0, 1, '2017-07-31 11:35:56', 'asdfasdf', '2017-07-31 11:35:56', 2),
(63, 1, 0, 0, 0, 1, '2017-12-08 12:44:54', 'asdfasdf', '2017-12-08 12:44:54', 2),
(64, 7, 0, 10, 0, 0, '0000-00-00 00:00:00', '', '2017-12-20 14:41:44', 2),
(65, 6, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2017-12-20 14:41:44', 2),
(66, 5, 0, 50, 0, 0, '0000-00-00 00:00:00', '', '2017-12-20 14:41:44', 2),
(67, 7, 0, 10, 0, 0, '0000-00-00 00:00:00', '', '2017-12-20 14:43:22', 2),
(68, 6, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2017-12-20 14:43:22', 2),
(69, 5, 0, 50, 0, 0, '0000-00-00 00:00:00', '', '2017-12-20 14:43:22', 2),
(70, 7, 0, 10, 0, 0, '0000-00-00 00:00:00', '', '2017-12-20 14:50:39', 2),
(71, 6, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2017-12-20 14:50:40', 2),
(72, 5, 0, 50, 0, 0, '0000-00-00 00:00:00', '', '2017-12-20 14:50:40', 2),
(73, 7, 0, 20, 0, 0, '0000-00-00 00:00:00', '', '2017-12-20 14:54:11', 2),
(74, 6, 0, 4, 0, 0, '0000-00-00 00:00:00', '', '2017-12-20 14:54:11', 2),
(75, 5, 0, 100, 0, 0, '0000-00-00 00:00:00', '', '2017-12-20 14:54:11', 2),
(76, 7, 0, 20, 0, 0, '0000-00-00 00:00:00', '', '2017-12-20 14:59:05', 2),
(77, 6, 0, 4, 0, 0, '0000-00-00 00:00:00', '', '2017-12-20 14:59:06', 2),
(78, 5, 0, 100, 0, 0, '0000-00-00 00:00:00', '', '2017-12-20 14:59:06', 2),
(79, 7, 0, 10, 0, 0, '0000-00-00 00:00:00', '', '2017-12-20 16:55:19', 2),
(80, 6, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2017-12-20 16:55:19', 2),
(81, 5, 0, 50, 0, 0, '0000-00-00 00:00:00', '', '2017-12-20 16:55:19', 2),
(82, 7, 0, 10, 0, 0, '0000-00-00 00:00:00', '', '2017-12-20 17:03:27', 2),
(83, 6, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2017-12-20 17:03:27', 2),
(84, 5, 0, 50, 0, 0, '0000-00-00 00:00:00', '', '2017-12-20 17:03:27', 2),
(85, 1, 0, 0, 0, 1, '2017-12-25 12:16:06', 'asdfasdf', '2017-12-25 12:16:06', 2),
(86, 12, 12, 0, 1, 0, '0000-00-00 00:00:00', '', '2017-12-25 13:55:48', 2),
(87, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2017-12-25 15:03:14', 2),
(88, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2017-12-25 15:34:42', 2),
(89, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2018-01-09 14:50:49', 2),
(90, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2018-01-09 15:02:17', 2),
(91, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2018-01-09 16:32:37', 2),
(92, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2018-01-10 11:54:41', 2),
(93, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2018-01-11 10:59:22', 2),
(94, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2018-01-11 10:59:43', 2),
(95, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2018-01-11 11:01:37', 2),
(96, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2018-01-11 11:06:18', 2),
(97, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2018-01-11 11:06:49', 2),
(98, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2018-01-11 11:08:25', 2),
(99, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2018-01-11 11:09:54', 2),
(100, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2018-01-11 11:15:46', 2),
(101, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2018-01-11 11:21:00', 2),
(102, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2018-01-11 11:21:30', 2),
(103, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2018-01-11 16:23:53', 2),
(104, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2018-01-15 10:43:44', 2),
(105, 7, 0, 40, 0, 0, '0000-00-00 00:00:00', '', '2018-03-28 10:34:54', 2),
(106, 6, 0, 8, 0, 0, '0000-00-00 00:00:00', '', '2018-03-28 10:34:54', 2),
(107, 5, 0, 200, 0, 0, '0000-00-00 00:00:00', '', '2018-03-28 10:34:54', 2),
(108, 1, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2018-03-28 10:34:54', 2),
(109, 2, 0, 20, 0, 0, '0000-00-00 00:00:00', '', '2018-03-28 10:34:54', 2),
(110, 1, 0, 16, 0, 0, '0000-00-00 00:00:00', '', '2018-03-28 10:34:54', 2),
(111, 7, 0, 20, 0, 0, '0000-00-00 00:00:00', '', '2018-04-11 14:55:33', 2),
(112, 6, 0, 4, 0, 0, '0000-00-00 00:00:00', '', '2018-04-11 14:55:33', 2),
(113, 5, 0, 100, 0, 0, '0000-00-00 00:00:00', '', '2018-04-11 14:55:33', 2),
(114, 1, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2018-04-11 14:57:09', 2),
(115, 1, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2018-04-11 15:04:17', 2),
(116, 7, 0, 10, 0, 0, '0000-00-00 00:00:00', '', '2018-04-11 15:10:17', 2),
(117, 6, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2018-04-11 15:10:18', 2),
(118, 5, 0, 50, 0, 0, '0000-00-00 00:00:00', '', '2018-04-11 15:10:18', 2),
(119, 1, 0, 4, 0, 0, '0000-00-00 00:00:00', '', '2018-04-11 15:20:15', 2),
(120, 1, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2018-04-11 15:31:19', 2),
(121, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2018-04-11 16:13:43', 2),
(122, 1, 0, 7, 0, 0, '0000-00-00 00:00:00', '', '2018-04-12 11:49:13', 2),
(123, 1, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2018-04-12 12:23:54', 2),
(124, 1, 0, 4, 0, 0, '0000-00-00 00:00:00', '', '2018-04-13 11:31:48', 2),
(125, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2018-04-13 11:33:32', 2),
(126, 1, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2018-04-13 16:29:13', 2),
(127, 1, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2018-04-16 11:24:34', 2),
(128, 1, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2018-04-16 11:44:10', 2),
(129, 1, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2018-04-16 12:13:08', 2),
(130, 1, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2018-04-16 17:17:44', 2),
(131, 7, 0, 10, 0, 0, '0000-00-00 00:00:00', '', '2018-04-23 17:32:59', 2),
(132, 6, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2018-04-23 17:32:59', 2),
(133, 5, 0, 50, 0, 0, '0000-00-00 00:00:00', '', '2018-04-23 17:32:59', 2),
(134, 1, 0, 18, 0, 0, '0000-00-00 00:00:00', '', '2018-04-23 17:32:59', 2),
(135, 1, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2018-04-26 11:31:35', 2),
(136, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2018-05-15 16:51:40', 2),
(137, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2018-06-04 14:23:51', 2),
(138, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2018-08-31 11:08:59', 2),
(139, 1, 10, 0, 0, 0, '0000-00-00 00:00:00', '', '2018-11-16 09:32:11', 2),
(140, 1, 0, 5, 0, 0, '0000-00-00 00:00:00', '', '2018-11-16 09:44:22', 2),
(141, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2018-11-21 09:29:01', 2),
(142, 1, 0, 0, 0, 165, '2018-11-21 09:47:22', 'rtyu', '2018-11-21 09:47:22', 2),
(143, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2018-12-11 10:16:59', 2),
(144, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2018-12-11 10:17:56', 2),
(145, 1, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2018-12-11 10:18:12', 2);

-- --------------------------------------------------------

--
-- Table structure for table `stock_items`
--

CREATE TABLE IF NOT EXISTS `stock_items` (
`id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `quantity` float NOT NULL,
  `quantity_type` tinyint(4) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_items`
--

INSERT INTO `stock_items` (`id`, `category_id`, `name`, `quantity`, `quantity_type`, `is_active`, `created_on`, `created_by`) VALUES
(1, 4, 'stock item 1', 0, 1, 1, '2017-04-13 11:33:07', 2),
(2, 4, 'stock item 2', 1000, 0, 1, '2017-04-13 11:33:18', 2),
(3, 4, 'stock item 3', 500, 1, 1, '2017-04-13 11:33:31', 2),
(4, 4, 'stock item 4', 1000, 0, 1, '2017-04-13 11:33:47', 2),
(5, 4, 'stock item 5', 200, 0, 1, '2017-04-13 11:34:00', 2),
(6, 4, 'stock item 6', 100, 1, 1, '2017-04-13 11:34:10', 2),
(7, 5, 'stock item 7', 100, 2, 1, '2017-05-23 12:29:50', 2),
(8, 4, 'Stock Item 9', 1000, 0, 1, '2017-05-23 16:11:43', 2),
(9, 4, 'stock item 8', 1000, 0, 1, '2017-05-23 16:11:48', 2),
(10, 1, 'stock item 10', 1000, 1, 1, '2017-06-20 17:42:01', 2),
(11, 4, 'stock item 20 ml', 1000, 0, 1, '2017-07-31 11:33:07', 2),
(12, 1, 'testasdfasdfasdf', 12, 1, 1, '2017-12-25 13:55:48', 2);

-- --------------------------------------------------------

--
-- Table structure for table `table_details`
--

CREATE TABLE IF NOT EXISTS `table_details` (
`id` int(11) NOT NULL,
  `table_name` text NOT NULL,
  `code` varchar(10) NOT NULL,
  `floor` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `type` int(11) NOT NULL,
  `x_pos` float NOT NULL,
  `y_pos` float NOT NULL,
  `height` float NOT NULL,
  `width` float NOT NULL,
  `merge` text NOT NULL,
  `order_id` int(11) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_details`
--

INSERT INTO `table_details` (`id`, `table_name`, `code`, `floor`, `status`, `start_time`, `end_time`, `type`, `x_pos`, `y_pos`, `height`, `width`, `merge`, `order_id`, `is_deleted`) VALUES
(1, 'Table - 1', '1', 1, 0, '2017-12-12 12:23:30', '2017-12-12 12:23:30', 2, 8.43133, 2.99212, 15.8295, 15.3734, '', 0, 0),
(2, 'Table - 2', '2', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 47.1587, 3.09556, 15.8295, 11.7862, '["1"]', 0, 0),
(3, 'Table - 3', '3', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 0, 37.2326, 17.0472, 7.54026, '', 0, 0),
(4, 'Table - 4', '4', 1, 0, '2017-12-18 11:56:37', '2017-12-18 11:56:37', 2, 0, 2.7767, 32.2679, 7.54026, '', 0, 0),
(5, 'Table - 5', '5', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 24.9725, 38.4444, 15.8479, 9.0776, '', 0, 0),
(6, 'Table - 6', '6', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 60.4823, 3.22312, 15.6773, 9.51684, '', 0, 0),
(7, 'Table - 7', '7', 2, 0, '2017-05-23 12:51:51', '2017-05-23 12:51:51', 2, 15.0555, 112.238, 17.3516, 8.05271, '', 0, 0),
(8, 'Table - 8', '8', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 32.1875, 106.04, 12.9754, 8.04688, '', 0, 0),
(9, 'Table - 9', '9', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 50.1242, 111.756, 17.2414, 8.05153, '', 0, 0),
(10, 'Table - 10', '10', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 8.52057, 137.635, 15.6986, 8.05271, '', 0, 0),
(11, 'Table - 11', '11', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 57.657, 139.511, 15.1057, 8.05271, '', 0, 0),
(12, 'table - 12', '12', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 11.3253, 165.856, 15.674, 8.05271, '', 0, 0),
(13, 'Table - 13', '13', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 53.729, 166.538, 15.1057, 8.05271, '', 0, 0),
(14, 'Table - 14', '14', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 0.158996, 56.9099, 15.6986, 7.54026, '', 0, 0),
(15, 'Table - 15', '15', 1, 0, '2018-11-16 09:46:12', '2018-11-16 09:46:12', 2, 35.5189, 3.28444, 15.8295, 9.80966, '', 0, 0),
(16, 'Table - 16', '16', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 21.5772, 141.207, 15.8479, 8.05271, '', 0, 0),
(17, 'Table - 17', '17', 2, 0, '2017-07-17 15:06:09', '2017-07-17 15:06:09', 2, 2.65612, 112.931, 15.6986, 8.05271, '', 0, 0),
(18, 'Table - 18', '18', 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 9.01554, 223.793, 17.2414, 8.05153, '', 0, 1),
(19, 'Table - 19', '19', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 72.5464, 38.4385, 15.8295, 8.05271, '', 0, 0),
(20, 'Table - 20', '20', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 24.7518, 2.94187, 15.8295, 9.29722, '[]', 0, 0),
(21, 'Table - 21', '21', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 46.3385, 38.7604, 15.8479, 8.49195, '', 0, 0),
(22, 'Table - 22', '22', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 24.8902, 21.0998, 15.8295, 9.0776, '', 0, 0),
(23, 'Table - 23', '23', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 10.3198, 25.8752, 15.2207, 8.05271, '', 0, 0),
(24, 'Table - 24', '24', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 15.1537, 51.9026, 15.2207, 8.05271, '', 0, 0),
(25, 'Table - 25', '25', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 41.8444, 132.877, 22.07, 13.3236, '', 0, 0),
(26, 'Table - 26', '26', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 36.0908, 62.4049, 13.0898, 8.05271, '', 0, 0),
(27, 'Table - 27', '27', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 54.7584, 59.3607, 13.0898, 8.05271, '', 0, 0),
(28, 'Table - 28', '28', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 69.7657, 111.111, 13.0898, 8.05271, '', 0, 0),
(29, 'Table - 29', '29', 3, 1, '2018-12-04 09:59:28', '2018-12-04 09:59:28', 2, 5.41728, 200, 13.0898, 8.05271, '', 0, 0),
(30, 'Table - 30', '30', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 10.6149, 70.4718, 15.2207, 8.05271, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `take_away`
--

CREATE TABLE IF NOT EXISTS `take_away` (
`id` int(11) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_pan` int(11) NOT NULL,
  `customer_address` varchar(150) NOT NULL,
  `customer_phone` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_confirmed` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `take_away`
--

INSERT INTO `take_away` (`id`, `customer_name`, `customer_pan`, `customer_address`, `customer_phone`, `created_on`, `created_by`, `status`, `is_confirmed`) VALUES
(1, '', 0, '', '', '2018-01-11 10:58:00', 2, 1, 0),
(2, '', 0, '', '', '2018-04-24 12:04:51', 2, 1, 0),
(3, 'sugen', 98989898, 'lazimpat', '', '2018-06-04 14:22:10', 2, 1, 0),
(4, '', 0, '', '', '2018-06-04 14:24:14', 2, 1, 0),
(5, '', 0, '', '', '2018-06-13 11:39:33', 2, 1, 2),
(6, '', 0, '', '', '2018-06-21 14:42:32', 2, 1, 0),
(7, '', 0, '', '', '2018-08-31 11:11:27', 2, 1, 0),
(8, '', 0, '', '', '2018-09-21 16:50:16', 2, 0, 0),
(9, '', 0, '', '', '2018-11-15 14:50:28', 2, 0, 0),
(10, '', 0, '', '', '2018-11-16 09:54:25', 2, 0, 0),
(11, '', 0, '', '', '2018-12-04 10:16:41', 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `temp_items`
--

CREATE TABLE IF NOT EXISTS `temp_items` (
`id` int(11) NOT NULL,
  `occupy_id` int(11) NOT NULL,
  `retail_id` int(11) NOT NULL,
  `take_away_id` int(11) NOT NULL,
  `pick_up_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_items`
--

INSERT INTO `temp_items` (`id`, `occupy_id`, `retail_id`, `take_away_id`, `pick_up_id`, `delivery_id`, `item_id`, `quantity`, `price`, `type`) VALUES
(4, 0, 0, 1, 0, 0, 1, 1, 180, 0),
(5, 0, 0, 1, 0, 0, 2, 1, 200, 0),
(6, 0, 0, 1, 0, 0, 4, 1, 75, 0),
(13, 0, 0, 4, 0, 0, 1, 1, 180, 0),
(14, 0, 0, 4, 0, 0, 2, 1, 200, 0),
(15, 0, 0, 4, 0, 0, 4, 1, 75, 0),
(16, 0, 0, 4, 0, 0, 32, 1, 200, 0),
(17, 0, 0, 5, 0, 0, 1, 1, 180, 0),
(18, 0, 0, 5, 0, 0, 2, 1, 200, 0),
(19, 0, 0, 6, 0, 0, 1, 1, 180, 0),
(23, 33, 0, 0, 0, 0, 1, 1, 180, 0),
(24, 33, 0, 0, 0, 0, 2, 1, 200, 0),
(25, 33, 0, 0, 0, 0, 4, 1, 75, 0),
(29, 35, 0, 0, 0, 0, 6, 1, 100, 0),
(30, 35, 0, 0, 0, 0, 3, 1, 50, 0),
(31, 35, 0, 0, 0, 0, 5, 1, 125, 0),
(32, 35, 0, 0, 0, 0, 33, 1, 150, 0),
(33, 35, 0, 0, 0, 0, 36, 1, 123, 0),
(34, 0, 0, 2, 0, 0, 1, 1, 180, 0),
(35, 0, 0, 2, 0, 0, 2, 1, 200, 0),
(42, 0, 0, 8, 0, 0, 1, 3, 180, 0),
(47, 40, 0, 0, 0, 0, 1, 1, 180, 0),
(48, 40, 0, 0, 0, 0, 2, 1, 200, 0),
(50, 41, 0, 0, 0, 0, 2, 1, 200, 0),
(51, 41, 0, 0, 0, 0, 4, 1, 75, 0),
(52, 0, 3, 0, 0, 0, 1, 1, 180, 0),
(55, 44, 0, 0, 0, 0, 1, 1, 180, 0),
(56, 44, 0, 0, 0, 0, 2, 1, 200, 0),
(57, 44, 0, 0, 0, 0, 4, 1, 75, 0);

-- --------------------------------------------------------

--
-- Table structure for table `temp_order_list`
--

CREATE TABLE IF NOT EXISTS `temp_order_list` (
`id` int(11) NOT NULL,
  `occupy_id` int(11) NOT NULL,
  `retail_id` int(11) NOT NULL,
  `take_away_id` int(11) NOT NULL,
  `pick_up_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_order_list`
--

INSERT INTO `temp_order_list` (`id`, `occupy_id`, `retail_id`, `take_away_id`, `pick_up_id`, `delivery_id`, `item_id`, `quantity`, `price`, `type`) VALUES
(6, 41, 0, 0, 0, 0, 1, 1, 200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tips`
--

CREATE TABLE IF NOT EXISTS `tips` (
`id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `type` tinyint(1) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tips`
--

INSERT INTO `tips` (`id`, `amount`, `type`, `created_on`, `created_by`) VALUES
(1, 200, 0, '2017-04-13 14:54:14', 2),
(2, 50, 1, '2017-04-13 14:55:52', 2),
(3, 20, 1, '2017-04-19 14:33:48', 2),
(4, 100, 1, '2017-09-13 10:58:27', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` varchar(32) NOT NULL,
  `position` varchar(30) NOT NULL,
  `pin` varchar(50) NOT NULL,
  `salt` varchar(50) NOT NULL,
  `discount_upto` float NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `encrypt` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `address`, `mobile`, `phone`, `email`, `profile_picture`, `username`, `password`, `role`, `position`, `pin`, `salt`, `discount_upto`, `is_active`, `created_at`, `created_by`, `updated_at`, `encrypt`) VALUES
(1, 'Super Admin', '', 0, 0, '', '0', 'superadmin', '$2y$13$zNgfxhx1KILBSqPSy2G0n.AWRmCt4DQojmDuiQcTlYuYoB38E8fUS', '5VmLKVrUUGUPgnXEp9IuqaVdk7pXQxXK', '', '', '', 100, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '78380218ec20ce96a11460da7c0c58ca'),
(2, 'Administrator', 'Kathmandu', 9801116771, 15639419, 'gaurav@klientscape.com', 'user-profile-pic_1494500116.jpg', 'administrator', '$2y$13$b8jIHLAva0J3ukLP5mcCx.qETPq6aqhTseOyGA0HUKF4QiKRpVore', 'kAdzZNRkmZu6RbNfz3L4fTEdtfrWWb6h', 'Owner', 'p7K4ZugASjo=', '%!4Txj)p', 90, 1, '2016-08-25 06:49:46', 1, '2017-12-08 13:14:13', '3ee6bbcb3839ac2eda5d86efe8eb7acc'),
(5, 'Dinesh Prajapati', 'thimi', 9801116780, 0, 'dinesh@klientscape.com', '0', 'staff', '$2y$13$38ZLZVJacCDv8seaHZJiU.0ec0jseBkuyHTuPZyd8M7w7O3KYQGre', '1P863mId6OnFEhCCD9zdkH9O5n7h6Kj7', 'web developer', 'A8gtUstg4RI=', 'iDzZY[(E', 20, 1, '2016-09-13 14:24:32', 2, '2017-02-27 13:24:34', '3e52fc67dbf227291d5e8a68ae6aa923'),
(6, 'sugen', 'lazimpat', 9810110011, 0, 'sugen@gmail.com', '', 'sugen', '$2y$13$jqYJUULa47WjQhDAtrw72uMpqawVHMkVYuG1/vYllQXYXDzG4GAMm', 'naQhEJ9I1yLYtN1ppQF6YtN1ppQF6asd', 'web developer', 'YVeSpbqHIwI=', 'gc-tBp{A', 5, 1, '2017-01-04 15:36:09', 2, '2018-09-21 12:00:42', '546f875415923dede99a77bb9bcce983'),
(7, 'Promish', 'bishalnagar', 9801110011, 0, 'promish@gmail.com', '', 'promish', '$2y$13$YANvx9YA.yNyNwaaO6fQMeQsl3VQbttKfhs65/o69MVv9k3kyDodu', '1P863mId6OnFEhCCD9zdkH9O5n7h6Kj7', 'Designer', 'osfU97qXUTY=', 'z@bdpui0', 50, 1, '2017-03-09 10:40:06', 2, '0000-00-00 00:00:00', ''),
(8, 'demo', 'demo', 9898989898, 0, 'demo@demo.com', '', 'demo', '$2y$13$ZsFbsWFnYSputlrvL.6WPukoq.iTTATQaqqM/4XCIuJusSSu.sar.', 'kAdzZNRkmZu6RbNfz3L4fTEdtfrWWb6h', 'admin', 'bVLyMB/Mdkg=', '78aY-]t$', 10, 1, '2018-11-26 13:50:45', 2, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `utensils_stock_entries`
--

CREATE TABLE IF NOT EXISTS `utensils_stock_entries` (
`id` int(11) NOT NULL,
  `stock_item_id` int(11) NOT NULL,
  `stock_in` float NOT NULL,
  `stock_out` float NOT NULL,
  `is_os` tinyint(4) NOT NULL,
  `adjusted_quantity` float NOT NULL,
  `adjusted_date` datetime NOT NULL,
  `remarks` text NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utensils_stock_entries`
--

INSERT INTO `utensils_stock_entries` (`id`, `stock_item_id`, `stock_in`, `stock_out`, `is_os`, `adjusted_quantity`, `adjusted_date`, `remarks`, `created_on`, `created_by`) VALUES
(6, 5, 10, 0, 1, 0, '0000-00-00 00:00:00', '', '2017-05-22 17:42:35', 2),
(7, 6, 15, 0, 1, 0, '0000-00-00 00:00:00', '', '2017-05-22 17:42:35', 2),
(8, 7, 5, 0, 1, 0, '0000-00-00 00:00:00', '', '2017-05-22 17:42:35', 2),
(9, 8, 20, 0, 1, 0, '0000-00-00 00:00:00', '', '2017-05-22 17:42:36', 2),
(10, 5, 0, 0, 0, 5, '2017-05-22 17:42:52', 'asdfasdf asdf ', '2017-05-22 17:42:52', 2),
(11, 5, 0, 0, 0, 1, '2017-05-23 12:24:10', 'asdfjlk', '2017-05-23 12:24:10', 2),
(12, 9, 10, 0, 1, 0, '0000-00-00 00:00:00', '', '2017-05-23 12:25:35', 2),
(13, 10, 2, 0, 1, 0, '0000-00-00 00:00:00', '', '2017-05-23 12:25:35', 2),
(14, 11, 5, 0, 1, 0, '0000-00-00 00:00:00', '', '2017-05-23 12:25:35', 2),
(15, 5, 0, 0, 0, -1, '2017-05-23 13:08:48', 'Fork damage due to trolley.', '2017-05-23 13:08:48', 2),
(16, 5, 0, 0, 0, 5, '2017-05-23 16:16:14', 'Bought 5 utensils item 1', '2017-05-23 16:16:14', 2),
(17, 12, 50, 0, 1, 0, '0000-00-00 00:00:00', '', '2017-07-19 10:48:55', 2),
(18, 13, 10, 0, 1, 0, '0000-00-00 00:00:00', '', '2018-11-16 09:33:43', 2),
(19, 14, 10, 0, 1, 0, '0000-00-00 00:00:00', '', '2018-11-16 09:33:43', 2),
(20, 15, 100, 0, 1, 0, '0000-00-00 00:00:00', '', '2018-12-04 09:49:04', 2),
(21, 16, 12, 0, 1, 0, '0000-00-00 00:00:00', '', '2018-12-04 09:49:04', 2),
(22, 5, 0, 0, 0, -1, '2018-12-04 09:50:27', 'ewrtyuio;&#039;;ljkhj', '2018-12-04 09:50:27', 2);

-- --------------------------------------------------------

--
-- Table structure for table `utensils_stock_items`
--

CREATE TABLE IF NOT EXISTS `utensils_stock_items` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utensils_stock_items`
--

INSERT INTO `utensils_stock_items` (`id`, `name`, `quantity`, `is_active`, `created_on`, `created_by`) VALUES
(5, 'utensils item 1', 10, 1, '2017-05-22 17:42:35', 2),
(6, 'utensils item 2', 15, 1, '2017-05-22 17:42:35', 2),
(7, 'utensils item 3', 5, 1, '2017-05-22 17:42:35', 2),
(8, 'utensils item 4', 20, 1, '2017-05-22 17:42:35', 2),
(9, 'item 1', 10, 1, '2017-05-23 12:25:35', 2),
(10, 'item  2', 2, 1, '2017-05-23 12:25:35', 2),
(11, 'item 3', 5, 1, '2017-05-23 12:25:35', 2),
(12, 'test', 50, 1, '2017-07-19 10:48:55', 2),
(13, 'plate', 10, 1, '2018-11-16 09:33:42', 2),
(14, 'spoon', 10, 1, '2018-11-16 09:33:43', 2),
(15, 'sdfhkl', 100, 1, '2018-12-04 09:49:04', 2),
(16, 'dsfghjhkl', 12, 1, '2018-12-04 09:49:04', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_log`
--
ALTER TABLE `audit_log`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booked_tables`
--
ALTER TABLE `booked_tables`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `break_down_items`
--
ALTER TABLE `break_down_items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `break_down_receipt`
--
ALTER TABLE `break_down_receipt`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `capacity`
--
ALTER TABLE `capacity`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `close_day_log`
--
ALTER TABLE `close_day_log`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debtors`
--
ALTER TABLE `debtors`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `design_invoice`
--
ALTER TABLE `design_invoice`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `duplicate_bill`
--
ALTER TABLE `duplicate_bill`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fiscal_year`
--
ALTER TABLE `fiscal_year`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floor`
--
ALTER TABLE `floor`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foc`
--
ALTER TABLE `foc`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foc_items`
--
ALTER TABLE `foc_items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kot`
--
ALTER TABLE `kot`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kot_items`
--
ALTER TABLE `kot_items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `member_discount`
--
ALTER TABLE `member_discount`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_order_category`
--
ALTER TABLE `member_order_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_privillege_threshold`
--
ALTER TABLE `member_privillege_threshold`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_report`
--
ALTER TABLE `member_report`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_category`
--
ALTER TABLE `menu_category`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `menu_item`
--
ALTER TABLE `menu_item`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `menu_item_price`
--
ALTER TABLE `menu_item_price`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_stock_items`
--
ALTER TABLE `menu_stock_items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_target`
--
ALTER TABLE `monthly_target`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obstacles`
--
ALTER TABLE `obstacles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `occupy`
--
ALTER TABLE `occupy`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pick_up`
--
ALTER TABLE `pick_up`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `printers`
--
ALTER TABLE `printers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `printer_list`
--
ALTER TABLE `printer_list`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `printer_lists`
--
ALTER TABLE `printer_lists`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `random`
--
ALTER TABLE `random`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retail`
--
ALTER TABLE `retail`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_order_items`
--
ALTER TABLE `special_order_items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_entries`
--
ALTER TABLE `stock_entries`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_items`
--
ALTER TABLE `stock_items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_details`
--
ALTER TABLE `table_details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `take_away`
--
ALTER TABLE `take_away`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_items`
--
ALTER TABLE `temp_items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_order_list`
--
ALTER TABLE `temp_order_list`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `tips`
--
ALTER TABLE `tips`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utensils_stock_entries`
--
ALTER TABLE `utensils_stock_entries`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utensils_stock_items`
--
ALTER TABLE `utensils_stock_items`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_log`
--
ALTER TABLE `audit_log`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2208;
--
-- AUTO_INCREMENT for table `booked_tables`
--
ALTER TABLE `booked_tables`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `break_down_items`
--
ALTER TABLE `break_down_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `break_down_receipt`
--
ALTER TABLE `break_down_receipt`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `capacity`
--
ALTER TABLE `capacity`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `close_day_log`
--
ALTER TABLE `close_day_log`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `debtors`
--
ALTER TABLE `debtors`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `design_invoice`
--
ALTER TABLE `design_invoice`
MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `duplicate_bill`
--
ALTER TABLE `duplicate_bill`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fiscal_year`
--
ALTER TABLE `fiscal_year`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `floor`
--
ALTER TABLE `floor`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `foc`
--
ALTER TABLE `foc`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `foc_items`
--
ALTER TABLE `foc_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `kot`
--
ALTER TABLE `kot`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=152;
--
-- AUTO_INCREMENT for table `kot_items`
--
ALTER TABLE `kot_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=553;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `member_discount`
--
ALTER TABLE `member_discount`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `member_order_category`
--
ALTER TABLE `member_order_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `member_privillege_threshold`
--
ALTER TABLE `member_privillege_threshold`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `member_report`
--
ALTER TABLE `member_report`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `menu_category`
--
ALTER TABLE `menu_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `menu_item`
--
ALTER TABLE `menu_item`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `menu_item_price`
--
ALTER TABLE `menu_item_price`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menu_stock_items`
--
ALTER TABLE `menu_stock_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `monthly_target`
--
ALTER TABLE `monthly_target`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `obstacles`
--
ALTER TABLE `obstacles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `occupy`
--
ALTER TABLE `occupy`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=171;
--
-- AUTO_INCREMENT for table `pick_up`
--
ALTER TABLE `pick_up`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `printers`
--
ALTER TABLE `printers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `printer_list`
--
ALTER TABLE `printer_list`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `printer_lists`
--
ALTER TABLE `printer_lists`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `random`
--
ALTER TABLE `random`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `retail`
--
ALTER TABLE `retail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `special_order_items`
--
ALTER TABLE `special_order_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `stock_entries`
--
ALTER TABLE `stock_entries`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=146;
--
-- AUTO_INCREMENT for table `stock_items`
--
ALTER TABLE `stock_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `table_details`
--
ALTER TABLE `table_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `take_away`
--
ALTER TABLE `take_away`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `temp_items`
--
ALTER TABLE `temp_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `temp_order_list`
--
ALTER TABLE `temp_order_list`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tips`
--
ALTER TABLE `tips`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `utensils_stock_entries`
--
ALTER TABLE `utensils_stock_entries`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `utensils_stock_items`
--
ALTER TABLE `utensils_stock_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
