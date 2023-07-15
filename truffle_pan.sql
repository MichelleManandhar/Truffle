-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2020 at 11:09 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `truffle_pan`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_log`
--

CREATE TABLE `audit_log` (
  `id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `action` text NOT NULL,
  `type` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_log`
--

INSERT INTO `audit_log` (`id`, `created_by`, `action`, `type`, `created_at`) VALUES
(1, 2, '<b>Admin</b> Logged onto the system', 'user', '2019-09-25 14:15:17'),
(2, 2, 'New debtor named -MacKensie George\' has been created', 'debtor', '2019-09-25 14:17:01'),
(3, 2, '<b>Admin</b> Logged onto the system', 'user', '2019-09-25 20:01:23'),
(4, 2, 'New table has been created named Table - 1', 'table', '2019-09-25 20:02:27'),
(5, 2, 'New table has been created named Table - 2', 'table', '2019-09-25 20:02:31'),
(6, 2, 'Table \'<b>Table - 1</b>\' has been occupied ', 'table', '2019-09-25 22:17:01'),
(7, 2, 'Table order KOT number 190925-1 has been send', 'order', '2019-09-25 22:17:14'),
(8, 2, 'Table order KOT number 190925-2 has been send', 'order', '2019-09-25 22:19:17'),
(9, 2, '<b>Admin</b> Logged onto the system', 'user', '2019-09-26 09:19:30'),
(10, 2, '<b>Admin</b> Logged onto the system', 'user', '2019-09-27 10:56:39'),
(11, 2, '<b>Admin</b> Logged onto the system', 'user', '2019-09-27 15:34:35'),
(12, 1, 'Database has been backuped by the user <b>Superadmin</b>', 'database', '2020-01-03 11:54:43'),
(13, 2, '<b>Admin</b> Logged onto the system', 'user', '2020-01-03 11:54:53'),
(14, 2, 'New table has been created named Table - 3', 'table', '2020-01-03 11:55:08'),
(15, 2, 'New obstacle has been created named -Obstacle - 1 on the floor no. 1', 'table', '2020-01-03 11:55:18'),
(16, 2, 'Table \'<b>Table - 2</b>\' has been occupied ', 'table', '2020-01-03 11:55:43'),
(17, 2, 'Table order KOT number 200103-1 has been send', 'order', '2020-01-03 11:56:02'),
(18, 2, 'Table order KOT number 200103-2 has been send', 'order', '2020-01-03 11:57:19'),
(19, 2, 'Table order KOT number 200103-3 has been send', 'order', '2020-01-03 11:57:57'),
(20, 2, 'Table order KOT number 200103-4 has been send', 'order', '2020-01-03 11:58:06'),
(21, 2, 'Table order KOT number 200103-5 has been send', 'order', '2020-01-03 11:58:39'),
(22, 2, 'Item wise payment has been made for the amount of Rs. 380', 'billing', '2020-01-03 11:59:33'),
(23, 2, 'Advance payment has been made for the amount of Rs. 2000', 'billing', '2020-01-03 11:59:57'),
(24, 2, 'Updated pin code of user -Administrator\'admin', 'user', '2020-01-03 12:00:50'),
(25, 2, 'Cash payment for table order has been made for the amount of Rs. 7211', 'billing', '2020-01-03 12:02:28'),
(26, 2, 'Table \'<b>Table - 2</b>\' has been closed ', 'table', '2020-01-03 12:02:28'),
(27, 2, 'Setting has been updated from yes to no', 'setting', '2020-01-03 12:13:07'),
(28, 2, 'Table order KOT number 200103-6 has been send', 'order', '2020-01-03 12:40:26'),
(29, 2, 'Cash payment for table order has been made for the amount of Rs. 6072', 'billing', '2020-01-03 12:40:45'),
(30, 2, 'Table \'<b>Table - 1</b>\' has been closed ', 'table', '2020-01-03 12:40:45'),
(31, 2, 'Table \'<b>Table - 1</b>\' has been occupied ', 'table', '2020-01-03 12:41:07'),
(32, 2, 'Table order KOT number 200103-7 has been send', 'order', '2020-01-03 12:41:12'),
(33, 2, 'Cash payment for table order has been made for the amount of Rs. 380', 'billing', '2020-01-03 12:41:29'),
(34, 2, 'Table \'<b>Table - 1</b>\' has been closed ', 'table', '2020-01-03 12:41:30'),
(35, 2, 'Table \'<b>Table - 1</b>\' has been occupied ', 'table', '2020-01-03 12:45:09'),
(36, 2, 'Table order KOT number 200103-8 has been send', 'order', '2020-01-03 12:45:12'),
(37, 2, 'Cash payment for table order has been made for the amount of Rs. 342', 'billing', '2020-01-03 12:46:10'),
(38, 2, 'Table \'<b>Table - 1</b>\' has been closed ', 'table', '2020-01-03 12:46:10'),
(39, 1, 'Table order KOT number 200109-1 has been send', 'order', '2020-01-09 15:10:15'),
(40, 1, 'Table order KOT number 200109-2 has been send', 'order', '2020-01-09 15:10:29'),
(41, 1, 'Table order KOT number 200109-3 has been send', 'order', '2020-01-09 15:10:35'),
(42, 1, 'Table order KOT number 200109-4 has been send', 'order', '2020-01-09 15:10:38'),
(43, 1, 'Table order KOT number 200109-5 has been send', 'order', '2020-01-09 15:21:13'),
(44, 1, 'Table order KOT number 200109-6 has been send', 'order', '2020-01-09 15:22:23'),
(45, 1, 'Table order KOT number 200109-7 has been send', 'order', '2020-01-09 15:24:03'),
(46, 1, 'Table order KOT number 200109-8 has been send', 'order', '2020-01-09 15:24:59'),
(47, 1, 'Table order KOT number 200109-9 has been send', 'order', '2020-01-09 15:25:10'),
(48, 1, 'Table order KOT number 200113-1 has been send', 'order', '2020-01-13 10:32:39'),
(49, 1, 'Table order KOT number 200113-2 has been send', 'order', '2020-01-13 10:34:08'),
(50, 1, 'Table order KOT number 200113-3 has been send', 'order', '2020-01-13 10:45:34'),
(51, 1, 'Table order KOT number 200113-4 has been send', 'order', '2020-01-13 11:10:19'),
(52, 1, 'Table order KOT number 200115-1 has been send', 'order', '2020-01-15 10:52:40'),
(53, 1, 'Table order KOT number 200115-2 has been send', 'order', '2020-01-15 10:52:56'),
(54, 1, 'Table order KOT number 200121-1 has been send', 'order', '2020-01-21 17:45:29'),
(55, 1, 'Changed pin code of user -Super Admin\'superadmin\'', 'user', '2020-01-21 17:46:10'),
(56, 1, 'Table order KOT number 200206-1 has been send', 'order', '2020-02-06 14:25:18'),
(57, 1, 'Table order KOT number 200206-2 has been send', 'order', '2020-02-06 14:57:56'),
(58, 1, 'Table order KOT number 200206-3 has been send', 'order', '2020-02-06 15:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `booked_tables`
--

CREATE TABLE `booked_tables` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booked_tables`
--

INSERT INTO `booked_tables` (`id`, `customer_name`, `customer_phone`, `customer_pax`, `table_id`, `floor_id`, `start_date`, `start_time`, `end_time`, `datetime`, `status`, `created_on`, `created_by`, `last_edited_on`, `last_edited_by`) VALUES
(1, 'xa xing', '23123123123', 2, 3, 1, '2020-01-16', '13:00:00', '13:00:00', '2020-01-16 13:00:00', 0, '2020-01-09 15:27:02', 1, '2020-01-09 15:27:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `break_down_items`
--

CREATE TABLE `break_down_items` (
  `id` int(11) NOT NULL,
  `break_down_receipt_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `break_down_items`
--

INSERT INTO `break_down_items` (`id`, `break_down_receipt_id`, `item_id`, `quantity`, `price`, `type`) VALUES
(1, 1, 1, 1, 345, 0);

-- --------------------------------------------------------

--
-- Table structure for table `break_down_receipt`
--

CREATE TABLE `break_down_receipt` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `break_down_receipt`
--

INSERT INTO `break_down_receipt` (`id`, `invoice_no`, `order_id`, `occupy_id`, `retail_id`, `take_away_id`, `pick_up_id`, `delivery_id`, `customer_name`, `sub_total`, `discount_rate`, `discount_amount`, `service_charge_rate`, `service_charge_amount`, `taxable_amount`, `vat_rate`, `vat_amount`, `total`, `round_value`, `received_amount`, `change_amount`, `paid_against`, `is_credit_paid`, `is_payment_return`, `cheque_no`, `payment_type`, `debtor_payment_type`, `debtor_id`, `type`, `created_on`, `created_by`) VALUES
(1, 1, 1578032247, 0, 0, 0, 0, 0, '', 345, 0, 0, 10, 34.5, 0, 0, 0, 380, 0.5, 380, 0, 0, 0, 0, '', 0, 0, 0, 2, '2020-01-03 11:59:33', 2),
(2, 2, 1578032247, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 2000, 0, 2200, 200, 0, 0, 0, '', 0, 0, 0, 1, '2020-01-03 11:59:56', 2),
(3, 3, 1578032247, 0, 0, 0, 0, 0, '', 6555, 0, 0, 10, 655.5, 0, 0, 0, 4831, 0, 5000, 0, 0, 0, 0, '', 0, 0, 0, 3, '2020-01-03 12:02:28', 2),
(4, 4, 1578034544, 0, 0, 0, 0, 0, '', 5520, 0, 0, 10, 552, 0, 0, 0, 6072, 0, 6072, 0, 0, 0, 0, '', 0, 0, 0, 3, '2020-01-03 12:40:44', 2),
(5, 5, 1578034589, 0, 0, 0, 0, 0, '', 345, 0, 0, 10, 34.5, 0, 0, 0, 380, 0, 400, 0, 0, 0, 0, '', 0, 0, 0, 3, '2020-01-03 12:41:29', 2),
(6, 6, 1578034869, 0, 0, 0, 0, 0, '', 345, 10, 34.5, 10, 31.05, 0, 0, 0, 342, 0, 342, 0, 0, 0, 0, '', 0, 0, 0, 3, '2020-01-03 12:46:09', 2),
(7, 7, 1578562579, 0, 0, 0, 0, 0, '', 100, 0, 0, 10, 10, 0, 0, 0, 110, 0, 110, 0, 0, 0, 0, '', 0, 0, 0, 3, '2020-01-09 15:21:19', 1),
(8, 8, 1578562883, 0, 0, 0, 0, 0, '', 395, 0, 0, 10, 39.5, 0, 0, 0, 435, 0, 435, 0, 0, 0, 0, '', 0, 0, 0, 3, '2020-01-09 15:26:24', 1),
(9, 9, 1578890934, 0, 0, 0, 0, 0, '', 1035, 5, 51.75, 10, 98.325, 0, 0, 0, 1082, 0, 1082, 0, 0, 0, 0, '', 0, 0, 0, 3, '2020-01-13 10:33:54', 1),
(10, 10, 1579064850, 0, 0, 0, 0, 0, '', 740, 0, 0, 10, 74, 0, 0, 0, 814, 0, 814, 0, 0, 0, 0, '', 0, 0, 0, 3, '2020-01-15 10:52:30', 1),
(11, 11, 1580978427, 0, 0, 0, 0, 0, '', 1430, 0, 0, 10, 143, 0, 0, 0, 1573, 0, 1573, 0, 0, 0, 0, '', 0, 0, 0, 3, '2020-02-06 14:25:28', 1),
(12, 12, 1580980467, 0, 0, 0, 0, 0, '', 545, 0, 0, 10, 54.5, 0, 0, 0, 600, 0, 600, 0, 0, 0, 0, '', 0, 0, 0, 3, '2020-02-06 14:59:28', 1),
(13, 13, 1581415430, 0, 0, 0, 0, 0, '', 150, 0, 0, 10, 15, 0, 0, 0, 165, 0, 165, 0, 0, 0, 0, '', 0, 0, 0, 3, '2020-02-11 15:48:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `capacity`
--

CREATE TABLE `capacity` (
  `id` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `close_day_log`
--

CREATE TABLE `close_day_log` (
  `id` int(11) NOT NULL,
  `log_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `slug`, `phone`) VALUES
(1, 'Cash Customer', 'cash-customer', '5454');

-- --------------------------------------------------------

--
-- Table structure for table `debtors`
--

CREATE TABLE `debtors` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debtors`
--

INSERT INTO `debtors` (`id`, `name`, `pan`, `phone`, `address`, `credit_amount`, `paid_amount`, `return_amount`, `opening_balance`, `last_edited_on`, `created_on`, `is_active`) VALUES
(1, 'MacKensie George', '34', '98098988', 'Quod dolorem tempora', 0, 0, 0, 51, '0000-00-00 00:00:00', '2019-09-25 14:17:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_pan` int(11) NOT NULL,
  `customer_address` varchar(150) NOT NULL,
  `customer_phone` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_confirmed` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `design_invoice`
--

CREATE TABLE `design_invoice` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `design_invoice`
--

INSERT INTO `design_invoice` (`id`, `show_customer_name`, `show_pan_no`, `show_amount_text`, `show_greeting_note`, `show_operator_name`, `show_customer_address`, `width`, `last_edited_on`, `last_edited_by`) VALUES
(1, 1, 1, 1, 1, 1, 1, 750, '2017-12-18 16:18:28', 2);

-- --------------------------------------------------------

--
-- Table structure for table `duplicate_bill`
--

CREATE TABLE `duplicate_bill` (
  `id` int(11) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `is_printed` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `duplicate_bill`
--

INSERT INTO `duplicate_bill` (`id`, `order_id`, `is_printed`, `created_by`, `created_on`) VALUES
(1, 1580980467, 1, 1, '2020-02-06 15:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `fiscal_year`
--

CREATE TABLE `fiscal_year` (
  `id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fiscal_year`
--

INSERT INTO `fiscal_year` (`id`, `start_date`, `end_date`, `is_active`) VALUES
(8, '2018-12-19', '2019-12-18', 1),
(9, '2019-12-19', '2020-12-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `floor`
--

CREATE TABLE `floor` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `display_order` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `floor`
--

INSERT INTO `floor` (`id`, `name`, `display_order`, `status`, `created_on`, `created_by`) VALUES
(1, 'Section one', 1, 1, '2019-02-27 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `foc`
--

CREATE TABLE `foc` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `foc_items`
--

CREATE TABLE `foc_items` (
  `id` int(11) NOT NULL,
  `foc_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kot`
--

CREATE TABLE `kot` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kot`
--

INSERT INTO `kot` (`id`, `display_number`, `table_id`, `floor_id`, `occupy_id`, `retail_id`, `take_away_id`, `pick_up_id`, `delivery_id`, `order_id`, `foc_id`, `created_on`, `created_by`, `status`, `kitchen_status`, `return_against`, `return_against_display_number`, `return_note`) VALUES
(1, '190925-1', 1, 1, 0, 0, 0, 0, 0, 1578034544, 0, '2019-09-25 22:17:14', 2, 1, 1, 0, '', ''),
(2, '190925-2', 1, 1, 0, 0, 0, 0, 0, 1578034544, 0, '2019-09-25 22:19:17', 2, 1, 1, 0, '', ''),
(3, '200103-1', 2, 1, 0, 0, 0, 0, 0, 1578032247, 0, '2020-01-03 11:56:02', 2, 1, 1, 0, '', ''),
(4, '200103-2', 2, 1, 0, 0, 0, 0, 0, 1578032247, 0, '2020-01-03 11:57:19', 2, 1, 1, 0, '', ''),
(5, '200103-3', 2, 1, 0, 0, 0, 0, 0, 1578032247, 0, '2020-01-03 11:57:57', 2, 1, 1, 0, '', ''),
(6, '200103-4', 2, 1, 0, 0, 0, 0, 0, 1578032247, 0, '2020-01-03 11:58:06', 2, 1, 1, 0, '', ''),
(7, '200103-5', 2, 1, 0, 0, 0, 0, 0, 1578032247, 0, '2020-01-03 11:58:38', 2, 1, 1, 0, '', ''),
(8, '200103-6', 1, 1, 0, 0, 0, 0, 0, 1578034544, 0, '2020-01-03 12:40:25', 2, 1, 1, 0, '', ''),
(9, '200103-7', 1, 1, 0, 0, 0, 0, 0, 1578034589, 0, '2020-01-03 12:41:12', 2, 1, 1, 0, '', ''),
(10, '200103-8', 1, 1, 0, 0, 0, 0, 0, 1578034869, 0, '2020-01-03 12:45:12', 2, 1, 1, 0, '', ''),
(11, '200109-1', 1, 1, 0, 0, 0, 0, 0, 1578562020, 0, '2020-01-09 15:10:15', 1, 1, 1, 0, '', ''),
(12, '200109-2', 1, 1, 0, 0, 0, 0, 0, 1578562020, 0, '2020-01-09 15:10:29', 1, 1, 1, 0, '', ''),
(13, '200109-3', 1, 1, 0, 0, 0, 0, 0, 1578562020, 0, '2020-01-09 15:10:35', 1, 1, 1, 0, '', ''),
(14, '200109-4', 1, 1, 0, 0, 0, 0, 0, 1578562020, 0, '2020-01-09 15:10:38', 1, 1, 1, 0, '', ''),
(15, '200109-5', 1, 1, 0, 0, 0, 0, 0, 1578562579, 0, '2020-01-09 15:21:13', 1, 1, 1, 0, '', ''),
(16, '200109-6', 1, 1, 0, 0, 0, 0, 0, 1579064850, 0, '2020-01-09 15:22:23', 1, 1, 1, 0, '', ''),
(17, '', 1, 1, 0, 0, 0, 0, 0, 1579064850, 0, '2020-01-09 15:22:42', 1, 2, 1, 16, '200109-6', 'mistake'),
(18, '200109-7', 2, 1, 5, 0, 0, 0, 0, 0, 0, '2020-01-09 15:24:03', 1, 0, 1, 0, '', ''),
(19, '200109-8', 3, 1, 0, 0, 0, 0, 0, 1578562883, 0, '2020-01-09 15:24:59', 1, 1, 1, 0, '', ''),
(20, '200109-9', 3, 1, 0, 0, 0, 0, 0, 1578562883, 0, '2020-01-09 15:25:10', 1, 1, 1, 0, '', ''),
(21, '200113-1', 3, 1, 0, 0, 0, 0, 0, 1578890934, 0, '2020-01-13 10:32:39', 1, 1, 1, 0, '', ''),
(22, '200113-2', 3, 1, 8, 0, 0, 0, 0, 0, 0, '2020-01-13 10:34:08', 1, 0, 1, 0, '', ''),
(23, '200113-3', 1, 1, 0, 0, 0, 0, 0, 1579064850, 0, '2020-01-13 10:45:33', 1, 1, 1, 0, '', ''),
(24, '200113-4', 1, 1, 0, 0, 0, 0, 0, 1579064850, 0, '2020-01-13 11:10:19', 1, 1, 1, 0, '', ''),
(25, '200115-1', 1, 1, 0, 0, 0, 0, 0, 1580978427, 0, '2020-01-15 10:52:40', 1, 1, 1, 0, '', ''),
(26, '200115-2', 1, 1, 0, 0, 0, 0, 0, 1580978427, 0, '2020-01-15 10:52:56', 1, 1, 1, 0, '', ''),
(27, '', 1, 1, 0, 0, 0, 0, 0, 1580978427, 0, '2020-01-15 10:53:36', 1, 2, 1, 25, '200115-1', 'test'),
(28, '', 1, 1, 0, 0, 0, 0, 0, 1580978427, 0, '2020-01-15 10:53:37', 1, 2, 1, 26, '200115-2', 'test'),
(29, '200121-1', 1, 1, 0, 0, 0, 0, 0, 1580978427, 0, '2020-01-21 17:45:29', 1, 1, 1, 0, '', ''),
(30, '200206-1', 1, 1, 0, 0, 0, 0, 0, 1580978427, 0, '2020-02-06 14:25:17', 1, 1, 1, 0, '', ''),
(31, '200206-2', 1, 1, 0, 0, 0, 0, 0, 1580980467, 0, '2020-02-06 14:57:55', 1, 1, 1, 0, '', ''),
(32, '200206-3', 1, 1, 0, 0, 0, 0, 0, 1581415430, 0, '2020-02-06 15:03:05', 1, 1, 1, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kot_items`
--

CREATE TABLE `kot_items` (
  `id` int(11) NOT NULL,
  `kot_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `returned_quantity` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kot_items`
--

INSERT INTO `kot_items` (`id`, `kot_id`, `item_id`, `price`, `quantity`, `returned_quantity`, `type`, `status`) VALUES
(1, 1, 1, 345, 4, 0, 0, 0),
(2, 2, 1, 345, 6, 0, 0, 0),
(3, 3, 1, 345, 1, 0, 0, 0),
(4, 4, 1, 345, 2, 0, 0, 0),
(5, 5, 1, 345, 3, 0, 0, 0),
(6, 6, 1, 345, 6, 0, 0, 0),
(7, 7, 1, 345, 7, 0, 0, 0),
(8, 8, 1, 345, 6, 0, 0, 0),
(9, 9, 1, 345, 1, 0, 0, 0),
(10, 10, 1, 345, 1, 0, 0, 0),
(11, 11, 1, 345, 1, 0, 0, 0),
(12, 12, 1, 345, 1, 0, 0, 0),
(13, 13, 1, 345, 1, 0, 0, 0),
(14, 14, 1, 345, 1, 0, 0, 0),
(15, 15, 2, 50, 2, 0, 0, 0),
(16, 16, 2, 50, 2, 1, 0, 0),
(17, 17, 2, 50, 1, 0, 0, 0),
(18, 18, 1, 345, 1, 0, 0, 0),
(19, 19, 1, 345, 1, 0, 0, 0),
(20, 20, 2, 50, 1, 0, 0, 0),
(21, 21, 1, 345, 3, 0, 0, 0),
(22, 22, 1, 345, 1, 0, 0, 0),
(23, 23, 1, 345, 1, 0, 0, 0),
(24, 24, 1, 345, 1, 0, 0, 0),
(25, 25, 1, 345, 2, 2, 0, 0),
(26, 26, 1, 345, 2, 1, 0, 0),
(27, 27, 1, 345, 2, 0, 0, 0),
(28, 28, 1, 345, 1, 0, 0, 0),
(29, 29, 1, 345, 2, 0, 0, 0),
(30, 30, 1, 345, 1, 0, 0, 0),
(31, 30, 2, 50, 1, 0, 0, 0),
(32, 31, 1, 345, 1, 0, 0, 0),
(33, 31, 2, 50, 4, 0, 0, 0),
(34, 32, 2, 50, 3, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_discount`
--

CREATE TABLE `member_discount` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `discount_allowed` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_order_category`
--

CREATE TABLE `member_order_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `discount_rate` float NOT NULL,
  `discount_amount` float NOT NULL,
  `total` float NOT NULL,
  `member_report_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_privillege_threshold`
--

CREATE TABLE `member_privillege_threshold` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `end_amount` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `till_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_report`
--

CREATE TABLE `member_report` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu_category`
--

CREATE TABLE `menu_category` (
  `id` int(11) NOT NULL,
  `category` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `type` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `display_order` int(11) NOT NULL,
  `bill_type` int(11) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_category`
--

INSERT INTO `menu_category` (`id`, `category`, `slug`, `type`, `is_active`, `display_order`, `bill_type`, `created_on`) VALUES
(1, 'test', 'test', 0, 1, 1, 6, '2019-07-04 10:16:21'),
(2, 'Visit nepal', 'visit-nepal', 0, 1, 2, 9, '2020-01-13 10:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE `menu_item` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`id`, `name`, `category_id`, `price`, `description`, `image`, `slug`, `display_order`, `created_on`, `created_by`, `last_edited_on`, `last_edited_by`, `is_active`, `is_discountable`) VALUES
(1, 'Mangit Maharjan', 1, 345, 'fsdfsdfsdf', '', 'mangit-maharjan', 1, '2019-07-04 10:16:36', 1, '2019-07-04 10:16:36', 1, 1, 0),
(2, 'Fanta', 1, 50, 'sdfsdfsdffsdf', '', 'fanta', 2, '2020-01-09 15:14:43', 1, '2020-01-09 15:14:43', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu_item_price`
--

CREATE TABLE `menu_item_price` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `previous_price` float NOT NULL,
  `changed_price` float NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu_stock_items`
--

CREATE TABLE `menu_stock_items` (
  `id` int(11) NOT NULL,
  `menu_item_id` int(11) NOT NULL,
  `stock_item_id` int(11) NOT NULL,
  `used_quantity` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_stock_items`
--

INSERT INTO `menu_stock_items` (`id`, `menu_item_id`, `stock_item_id`, `used_quantity`) VALUES
(1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `monthly_target`
--

CREATE TABLE `monthly_target` (
  `id` int(11) NOT NULL,
  `month` varchar(25) NOT NULL,
  `full_date` date NOT NULL,
  `target` float NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_edited_on` datetime NOT NULL,
  `last_edited_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `obstacles` (
  `id` int(11) NOT NULL,
  `obstacle_name` varchar(150) NOT NULL,
  `floor` int(11) NOT NULL,
  `x_pos` float NOT NULL,
  `y_pos` float NOT NULL,
  `height` float NOT NULL,
  `width` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obstacles`
--

INSERT INTO `obstacles` (`id`, `obstacle_name`, `floor`, `x_pos`, `y_pos`, `height`, `width`) VALUES
(1, 'Obstacle - 1', 1, 62.8089, 5.02283, 70.0152, 8.63836);

-- --------------------------------------------------------

--
-- Table structure for table `occupy`
--

CREATE TABLE `occupy` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `occupy`
--

INSERT INTO `occupy` (`id`, `customer_name`, `customer_pan`, `customer_address`, `customer_pax`, `customer_phone`, `table_id`, `floor_id`, `start_date`, `start_time`, `end_date`, `end_time`, `created_on`, `created_by`, `occupy_type`, `status`, `is_foc`, `last_edited_on`, `last_edited_by`, `capacity_id`, `is_occupied`) VALUES
(1, '', 0, '', 2, '', 1, 1, '2020-01-03', '12:45:09', '2020-01-03', '12:46:10', '2020-01-03 12:45:09', 2, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, 1),
(2, '', 0, '', 2, '', 1, 1, '2020-01-09', '15:09:59', '2020-01-09', '15:12:01', '2020-01-09 15:09:59', 1, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, 1),
(3, '', 0, '', 2, '', 1, 1, '2020-01-09', '15:13:14', '2020-01-09', '15:21:20', '2020-01-09 15:13:14', 1, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, 1),
(4, '', 0, '', 2, '5454', 1, 1, '2020-01-09', '15:22:18', '2020-01-15', '10:52:31', '2020-01-09 15:22:18', 1, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, 1),
(5, '', 0, '', 0, '', 2, 1, '2020-01-09', '15:23:28', '0000-00-00', '00:00:00', '2020-01-09 15:23:28', 1, 0, 1, 1, '0000-00-00 00:00:00', 0, 0, 0),
(6, '', 0, '', 2, '', 3, 1, '2020-01-09', '15:24:54', '2020-01-09', '15:26:24', '2020-01-09 15:24:54', 1, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, 1),
(7, '', 0, '', 2, '', 3, 1, '2020-01-13', '10:31:15', '2020-01-13', '10:33:55', '2020-01-13 10:31:15', 1, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, 1),
(8, '', 0, '', 0, '', 3, 1, '2020-01-13', '10:33:59', '0000-00-00', '00:00:00', '2020-01-13 10:33:59', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0),
(9, '', 0, '', 1, '', 1, 1, '2020-01-15', '10:52:35', '2020-02-06', '14:25:29', '2020-01-15 10:52:35', 1, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, 1),
(10, '', 0, '', 2, '', 1, 1, '2020-02-06', '14:54:48', '2020-02-06', '14:59:28', '2020-02-06 14:54:48', 1, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, 1),
(11, '', 0, '', 2, '', 1, 1, '2020-02-06', '15:02:58', '2020-02-11', '15:48:51', '2020-02-06 15:02:58', 1, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
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
(1578034869, 1, '20-1', 0, 0, '', '0', '', 2, '', 1, 1, 345, 10, 31.05, 0, 0, 0, 10, 34.5, 342, 0.45, 342, 342, 0, 0, 0, '2020-01-03 12:46:09', 2, 0, '', 0, 0, 0, 0, '', '', 0, 0),
(1578562020, 2, '20-2', 0, 0, '', '0', '', 2, '', 1, 1, 1380, 10, 138, 0, 0, 0, 0, 0, 1518, 0, 1518, 1518, 0, 2, 0, '2020-01-09 15:12:00', 1, 0, '', 0, 0, 0, 0, '', '', 0, 0),
(1578562579, 3, '20-3', 0, 0, '', '0', '', 2, '', 1, 1, 100, 10, 10, 0, 0, 0, 0, 0, 110, 0, 110, 110, 0, 0, 0, '2020-01-09 15:21:19', 1, 0, '', 0, 0, 0, 0, '', '', 0, 0),
(1578562883, 6, '20-4', 0, 0, '', '0', '', 2, '', 3, 1, 395, 10, 39.5, 0, 0, 0, 0, 0, 435, 0.5, 435, 435, 0, 0, 0, '2020-01-09 15:26:23', 1, 0, '', 0, 0, 0, 0, '', '', 0, 0),
(1578890934, 7, '20-5', 0, 0, '', '0', '', 2, '', 3, 1, 1035, 10, 98.325, 0, 0, 0, 5, 51.75, 1082, 0.42, 1082, 1082, 0, 0, 0, '2020-01-13 10:33:54', 1, 0, '', 0, 0, 0, 0, '', '', 0, 0),
(1579064850, 4, '20-6', 0, 0, '', '0', '', 2, '5454', 1, 1, 740, 10, 74, 0, 0, 0, 0, 0, 814, 0, 814, 814, 0, 0, 0, '2020-01-15 10:52:30', 1, 0, '', 0, 0, 0, 0, '', '', 0, 0),
(1580978427, 9, '20-7', 0, 0, '', '0', '', 1, '', 1, 1, 1430, 10, 143, 0, 0, 0, 0, 0, 1573, 0, 1573, 1573, 0, 0, 0, '2020-02-06 14:25:27', 1, 0, '', 0, 0, 0, 0, '', '', 0, 0),
(1580980467, 10, '20-8', 0, 1, '', '0', '', 2, '', 1, 1, 545, 10, 54.5, 0, 0, 0, 0, 0, 600, 0.5, 600, 600, 0, 0, 0, '2020-02-06 14:59:28', 1, 0, '', 0, 0, 0, 0, '', '', 0, 0),
(1581415430, 11, '20-9', 0, 0, '', '0', '', 2, '', 1, 1, 150, 10, 15, 0, 0, 0, 0, 0, 165, 0, 165, 165, 0, 0, 0, '2020-02-11 15:48:50', 1, 0, '', 0, 0, 0, 0, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `item_id`, `quantity`, `price`, `type`) VALUES
(1, 1578034869, 1, 1, 345, 0),
(2, 1578562020, 1, 4, 345, 0),
(3, 1578562579, 2, 2, 50, 0),
(4, 1578562883, 1, 1, 345, 0),
(5, 1578562883, 2, 1, 50, 0),
(6, 1578890934, 1, 3, 345, 0),
(7, 1579064850, 2, 1, 50, 0),
(8, 1579064850, 1, 2, 345, 0),
(9, 1580978427, 1, 4, 345, 0),
(10, 1580978427, 2, 1, 50, 0),
(11, 1580980467, 1, 1, 345, 0),
(12, 1580980467, 2, 4, 50, 0),
(13, 1581415430, 2, 3, 50, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pick_up`
--

CREATE TABLE `pick_up` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_pan` int(11) NOT NULL,
  `customer_address` varchar(150) NOT NULL,
  `customer_phone` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_confirmed` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `printers`
--

CREATE TABLE `printers` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `printer_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `printers`
--

INSERT INTO `printers` (`id`, `name`, `slug`, `printer_name`) VALUES
(5, 'bill', 'bill', 'POS-58-Series'),
(6, 'kitchen', 'kitchen', 'POS-58-Series'),
(7, 'bar', 'bar', 'Microsoft Print to PDF'),
(8, 'bakery', 'bakery', 'POS-58-Series'),
(9, 'harish', 'harish', 'Samsung SCX-3400 Series (USB002)'),
(10, 'harish', 'harish-2', 'Samsung SCX-3400 Series (USB002)');

-- --------------------------------------------------------

--
-- Table structure for table `printer_list`
--

CREATE TABLE `printer_list` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `printer_lists`
--

CREATE TABLE `printer_lists` (
  `id` int(11) NOT NULL,
  `name` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `printer_lists`
--

INSERT INTO `printer_lists` (`id`, `name`) VALUES
(1, '[{\"NAME\":\"Send To OneNote 2013\",\"DESCRIPTION\":\"Send To OneNote 2013,Send to Microsoft OneNote 15 Driver,\",\"COMMENT\":\"\"},{\"NAME\":\"Samsung SCX-3400 Series (USB002)\",\"DESCRIPTION\":\"Samsung SCX-3400 Series (USB002),Samsung Universal Print Driver 3,\",\"COMMENT\":\"\"},{\"NAME\":\"RONGTA 58mm Series Printer\",\"DESCRIPTION\":\"RONGTA 58mm Series Printer,58Normal,\",\"COMMENT\":\"\"},{\"NAME\":\"POS-X Impact Printer(COPY 1)\",\"DESCRIPTION\":\"POS-X Impact Printer(COPY 1),POS-X Impact Printer,\",\"COMMENT\":\"\"},{\"NAME\":\"POS-76C\",\"DESCRIPTION\":\"POS-76C,POS-76C,\",\"COMMENT\":\"\"},{\"NAME\":\"POS-58-Series\",\"DESCRIPTION\":\"POS-58-Series,POS-58-Series Driver,\",\"COMMENT\":\"\"},{\"NAME\":\"Microsoft XPS Document Writer\",\"DESCRIPTION\":\"Microsoft XPS Document Writer,Microsoft XPS Document Writer v4,\",\"COMMENT\":\"\"},{\"NAME\":\"Microsoft Print to PDF\",\"DESCRIPTION\":\"Microsoft Print to PDF,Microsoft Print To PDF,\",\"COMMENT\":\"\"},{\"NAME\":\"Fax\",\"DESCRIPTION\":\"Fax,Microsoft Shared Fax Driver,\",\"COMMENT\":\"\"},{\"NAME\":\"EPSON TM-U220 Receipt\",\"DESCRIPTION\":\"EPSON TM-U220 Receipt,EPSON TM-U220 ReceiptE4,\",\"COMMENT\":\"\"},{\"NAME\":\"Brother DCP-T700W Printer\",\"DESCRIPTION\":\"Brother DCP-T700W Printer,Brother DCP-T700W Printer,\",\"COMMENT\":\"\"},{\"NAME\":\"Brother DCP-T700W\",\"DESCRIPTION\":\"Brother DCP-T700W,Brother DCP-T700W Printer,\",\"COMMENT\":\"\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `item_id`, `quantity`, `created_on`, `created_by`) VALUES
(1, 1, 10, '2020-01-09 15:20:14', 1),
(2, 2, 1000, '2020-01-13 11:09:20', 1),
(3, 1, 10, '2020-01-13 11:09:33', 1),
(4, 2, 1000, '2020-01-13 11:09:44', 1),
(5, 1, 10, '2020-02-06 15:07:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `random`
--

CREATE TABLE `random` (
  `id` int(11) NOT NULL,
  `field_name` text NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `random`
--

INSERT INTO `random` (`id`, `field_name`, `value`) VALUES
(2, 'admin_mac_address', 'F8-A9-63-27-FC-B7'),
(7, 'delivery_charge_amount', '50'),
(8, 'delivery_charge_vat_status', 'inclusive'),
(10, 'current_year_for_invoice', '2017-07-16'),
(11, 'document', '<h3>Information, Terms & User Manual for TRUFFLE</h3>        	<h3>Following User Guide aims to inform about some of the variations on Truffle Software.</h3>        	<p>The information pertained in this documents relates to the following versions of TRUFFLE software.</p>    		<ol>        		<li>TRUFFLE Lite PAN</li>        		<li>TRUFFLE Lite VAT</li>        		<li>TRUFFLE Pro PAN</li>        		<li>TRUFFLE Pro VAT</li>    		</ol>        	<h3>License:</h3>        	<p>TRUFFLE Software and all its variations are the property of Klient Scape Software Pvt. Ltd. The License to use the software must be authorised by Klient Scape Software Pvt. Ltd.</p>         	<p>For the purposes of this manual, unless otherwise stated, all versions are collective named ‘Truffle’. Klient Scape Software will be named as ‘Company’ and the license holders to use the software will be called ‘Clients’. Anyone using the software will be collectively called in as ‘Users’.</p>        	<h3>Agreement</h3>        	<p>Users are authorised to use the functions provided within the software. Users are not allowed to copy, distribute or share any information within the software to anyone without the consent of the Company. Users may not change the functionality of the software under any circumstance and failure to abide by these terms are considered breach of contract, and the company may pursue legal action.</p>        	<h3>How To:</h3>        	<h3>Create Users:</h3>        	<p>Administrators are allowed to create users, the number of users allowed to create depends on the version. Pro versions allow for unlimited number of users.</p>        	<h3>Assign Access Roles</h3>        	<p>There are 2 access roles – Admin and Staff</p>        	<p>Users with admin levels access are privy to all the features available in Truffle. Admin can provide up to 90% in discounts and authorise sales returns. Admins can also view all the analysis and are entered into a dashboard view once logged in to see the overview of the restaurant.</p>        	<p>Users with Staff access roles are directly logged into the restaurant view and are not privy to all the data within the software. Staff can also be enrolled with up to 90% discounts. However, an admin must assign which staff to allocate the % of discount.</p>        	<h3>Dashboard View:</h3>        	<p>Dashboard view allows a quick glance of the restaurant in terms of financial prospective. Debtors list and transaction history are conveniently located at the upper left corner of the dashboard view. A large section occupies a bar graph relating to total sales and total cash-in. Note: Total sales can be different from total cash in.</p>        	<p>The three boxes underneath shows overall sales, current month sales, and current day sales.</p>        	<p>The total report section shows the total number of customers, average sales per customer and average sales per person along with average time each table gets occupied.</p>        	<p>The today’s summary section in the dashboard is one of the handiest tools that shows all the relevant information of current day status.</p>        	<h3>Capacity Rate:</h3>        	<p>The capacity rate shows the rate in which the restaurant capacity is being utilised. If the restaurant has a capacity of 100 seats, 100 customers a day would make a 100% capacity rate. </p>        	<p>The dashboard offers to set a capacity rate under the heading of ‘Change Restaurant Capacity.’</p>        	<p>Difference between Total Sales and Cash IN:</p>        	<p>The Total sales amount shows the actual sales the restaurant has made, that is all cash sales, all credit sales and does not include service charge or the VAT payable from sales.</p>        	<p>The Cash in amount shows only the cash that has been received, i.e Cash sales, credit collection, tips received, service charge, VAT amount etc. This feature is handy to calculate all the sum received during the day.</p>        	<h3>Best Sellers:</h3>        	<p>The dashboard offers a best sellers section conveniently placed to show the best selling items for current day, current month, current year and ALL time.</p>        	<h3>Best Sellers – Gross sales.</h3>        	<p>The dashboard also offers a best sellers in accordance to the revenue generated by each item in the menu. </p>        	<h3>Table View:</h3>        	<h3>Table Layout</h3>        	<p>Pro versions allow for unlimited sections and tables. In lite version, sections are limited but unlimited tables can be created, provided it fits the screen. </p>        	<p>To create a new table, drag the table icon to section area and place it there. From there you can resize, rename any tables. You can also create obstacles to create a restaurant design that best suits the user.</p>        	<p>Once the design of the restaurant is complete, admins can lock the tables and the obstacles.</p>        	<p>Merge Table:To merge table, check if the lock key in the table area is set to unlocked. Drag a the table you want to merge and connect it to another table. The colour of the table changes if it is merged.</p>        	<h3>Take-away, pick-up and delivery:</h3>        	<p>These areas are useful to take orders in accordance to their needs, for customers that are not eating in. You can choose to charge ‘service charge’ according to your desire through the settings area, i.e. you can choose if eat in customers have service charge and take away customers be exempt from it or charge 5% delivery rate. </p>        	<h3>Taking orders:</h3>        	<p>In order to take orders, a menu must be created. To create a menu, under the third settings, under the category of Menu Items, you can add, edit and deactivate menu items. Once menu items are created, orders can be taken through tables or through pick-ups and deliveries.<p>        	<p>To take an order in a table, users should click on the items on the order screen and send to KOT. Once KOT is created, it automatically sends it to the billing area. Users can take more KOTs and send to respective areas, and billing is automatically adjusted.</p>        	<h3>Menu Category:</h3>        	<p>Truffle allows for sending KOT’s to different printers; i.e you can print kitchen orders to kitchen, bar orders to bar. You can create unlimited categories in the pro versions, while the category numbers are restricted to Lite versions.</p>        	<p>Categories are also useful for analysis in terms of items of how certain categories are being sold compared to others. This can be checked through category summary under the second setting sections.</p>        	<h3>Stock:</h3>        	<p>TRUFLLE Pro allows for stock counting. In order to utilize this feature, entries should be made to show opening stock and menu items should reflect the items that it requires to finish producing a menu item.</p>        	<h3>FOC:</h3>        	<p>FOC refers to free-of-cost, as these items will deduct stock but for various reason, requires the cost to be FOC. FOC requires a password that can be set by admins in the settings section.</p>        	<h3>Utensils Stock Manager:</h3>        	<p>Utensils Stock manager allows users to count and adjust all the utensils, i.e. spoons, knives, ash-tray, plates etc. </p>        	<h3>Bill payment:</h3>        	<p>When a customer asks for a bill in their table, under the billing list in the order view, the $ sign allows to make bill payment. Here users can choose to make full cash payments, make partial payments, bank payments or provide full credit payments. Regardless of the payment method, Truffle will create a bill and save it. The print button will print the customer bill, and print and close button will print the bill and close the table. The print temporary option allows to check the printed version of the bill for corrections before closing the bill. Note: The print temporary bill is not an actual invoice, but a mock-up that does not show the companies name, VAT information etc.</p>         	<h3>VAT REPORT:</h3>        	<p>Vat report shows the VAT report in the manner of Nepal VAT sales ledger book. It shows Total Amount, Total taxable amount, VAT percent and VAT Amount with breakdown of all the invoices. The date allows you to sort through VAT reports in accordance to their dates.</p>        	<h3>Fiscal Year</h3>        	<p>Fiscal Years are automatically calculated. Truffle uses proprietary methods to not allow users to make entries as dates are set and all entries time-stamped within the software. Users are not allowed to make entries on a different date. Users are allowed make new entries for up to 10 days after the fiscal year ends, to make changes wherever necessary. </p>        	<p class=\"text-center\">For further help, Contact <span class=\"text-decoration-underline\"> KlientScape Software, 01-4425513 or 01-6201374 </span> or visit us at our Offices in BIshalnagar-5.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `retail`
--

CREATE TABLE `retail` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_pan` int(11) NOT NULL,
  `customer_address` varchar(150) NOT NULL,
  `customer_phone` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_confirmed` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retail`
--

INSERT INTO `retail` (`id`, `customer_name`, `customer_pan`, `customer_address`, `customer_phone`, `created_on`, `created_by`, `status`, `is_confirmed`) VALUES
(1, '', 0, '', '', '2020-01-03 11:48:38', 1, 0, 0),
(2, '', 0, '', '', '2020-01-03 12:17:33', 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `slug` varchar(100) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `is_permanent` tinyint(4) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(40, 'lock table', 'yes', 'lock-table', 1, 1, '2016-11-04 10:25:17'),
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
(55, 'cancel order password', 'administrator', 'cancel-order-password', 1, 1, '2018-06-15 03:03:03'),
(56, 'is_activated', '1', 'is_activated', 1, 1, '2019-09-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `special_order_items`
--

CREATE TABLE `special_order_items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `remarks` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_entries`
--

CREATE TABLE `stock_entries` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_entries`
--

INSERT INTO `stock_entries` (`id`, `stock_item_id`, `stock_in`, `stock_out`, `is_os`, `adjusted_quantity`, `adjusted_date`, `remarks`, `created_on`, `created_by`) VALUES
(1, 1, 10, 0, 1, 0, '0000-00-00 00:00:00', '', '2020-01-09 15:13:06', 1),
(2, 1, 10, 0, 0, 0, '0000-00-00 00:00:00', '', '2020-01-09 15:20:14', 1),
(3, 1, 0, 0, 0, -1, '2020-01-09 15:21:00', 'sdfsdfsdfsdf', '2020-01-09 15:21:00', 1),
(4, 1, 0, 2, 0, 0, '0000-00-00 00:00:00', '', '2020-01-09 15:21:19', 1),
(5, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2020-01-09 15:26:24', 1),
(6, 2, 2, 0, 1, 0, '0000-00-00 00:00:00', '', '2020-01-13 11:08:51', 1),
(7, 2, 1000, 0, 0, 0, '0000-00-00 00:00:00', '', '2020-01-13 11:09:21', 1),
(8, 1, 10, 0, 0, 0, '0000-00-00 00:00:00', '', '2020-01-13 11:09:34', 1),
(9, 2, 1000, 0, 0, 0, '0000-00-00 00:00:00', '', '2020-01-13 11:09:44', 1),
(10, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2020-01-15 10:52:31', 1),
(11, 1, 0, 1, 0, 0, '0000-00-00 00:00:00', '', '2020-02-06 14:25:28', 1),
(12, 1, 0, 4, 0, 0, '0000-00-00 00:00:00', '', '2020-02-06 14:59:28', 1),
(13, 1, 10, 0, 0, 0, '0000-00-00 00:00:00', '', '2020-02-06 15:07:58', 1),
(14, 1, 0, 3, 0, 0, '0000-00-00 00:00:00', '', '2020-02-11 15:48:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock_items`
--

CREATE TABLE `stock_items` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `quantity` float NOT NULL,
  `quantity_type` tinyint(4) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_items`
--

INSERT INTO `stock_items` (`id`, `category_id`, `name`, `quantity`, `quantity_type`, `is_active`, `created_on`, `created_by`) VALUES
(1, 1, 'Fanta', 10, 1, 1, '2020-01-09 15:13:06', 1),
(2, 1, 'zvxxcvxvxcv', 2, 0, 1, '2020-01-13 11:08:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_details`
--

CREATE TABLE `table_details` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_details`
--

INSERT INTO `table_details` (`id`, `table_name`, `code`, `floor`, `status`, `start_time`, `end_time`, `type`, `x_pos`, `y_pos`, `height`, `width`, `merge`, `order_id`, `is_deleted`) VALUES
(1, 'Table - 1', '1', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 18.5922, 36.311, 15.9817, 8.05271, '', 0, 0),
(2, 'Table - 2', '2', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 49.2657, 4.80166, 15.9817, 8.05271, '', 0, 0),
(3, 'Table - 3', '3', 1, 1, '2020-01-09 15:27:02', '2020-01-09 15:27:02', 2, 20.8604, 6.39032, 15.2207, 5.49048, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `take_away`
--

CREATE TABLE `take_away` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_pan` int(11) NOT NULL,
  `customer_address` varchar(150) NOT NULL,
  `customer_phone` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_confirmed` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_items`
--

CREATE TABLE `temp_items` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_items`
--

INSERT INTO `temp_items` (`id`, `occupy_id`, `retail_id`, `take_away_id`, `pick_up_id`, `delivery_id`, `item_id`, `quantity`, `price`, `type`) VALUES
(8, 5, 0, 0, 0, 0, 1, 1, 345, 0),
(12, 8, 0, 0, 0, 0, 1, 1, 345, 0);

-- --------------------------------------------------------

--
-- Table structure for table `temp_order_list`
--

CREATE TABLE `temp_order_list` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tips`
--

CREATE TABLE `tips` (
  `id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `type` tinyint(1) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tips`
--

INSERT INTO `tips` (`id`, `amount`, `type`, `created_on`, `created_by`) VALUES
(1, 100, 0, '2020-01-09 15:24:18', 1),
(2, 100, 1, '2020-01-09 15:24:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `address`, `mobile`, `phone`, `email`, `profile_picture`, `username`, `password`, `role`, `position`, `pin`, `salt`, `discount_upto`, `is_active`, `created_at`, `created_by`, `updated_at`, `encrypt`) VALUES
(1, 'Super Admin', '', 0, 0, '', '0', 'superadmin', '$2y$13$zNgfxhx1KILBSqPSy2G0n.AWRmCt4DQojmDuiQcTlYuYoB38E8fUS', '5VmLKVrUUGUPgnXEp9IuqaVdk7pXQxXK', '', 'ziL+nRM8HBE=', 't3K2xHBL', 100, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '7b7335bb94f9731f29e49bd1c5f9ec19'),
(2, 'Administrator', 'Kathmandu', 9801116771, 15639419, 'test@test.com', 'user-profile-pic_1494500116.jpg', 'admin', '$2y$13$CBNtJJVV3sM8HgzGVyrA/uUlh5zuqgeWPdo2/0OnZMLyO/ho5hpn2', 'kAdzZNRkmZu6RbNfz3L4fTEdtfrWWb6h', 'Owner', 'tgu9d2PPFQ4=', '&T!#XC7G', 90, 1, '2016-08-25 06:49:46', 1, '2019-06-21 14:19:50', '17bdd6fb75c638cf559c05d4d668cba1');

-- --------------------------------------------------------

--
-- Table structure for table `utensils_stock_entries`
--

CREATE TABLE `utensils_stock_entries` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utensils_stock_items`
--

CREATE TABLE `utensils_stock_items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `floor_id` (`floor_id`),
  ADD KEY `table_id` (`table_id`);

--
-- Indexes for table `break_down_items`
--
ALTER TABLE `break_down_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `break_down_receipt`
--
ALTER TABLE `break_down_receipt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `debtor_id` (`debtor_id`),
  ADD KEY `delivery_id` (`delivery_id`),
  ADD KEY `occupy_id` (`occupy_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `pick_up_id` (`pick_up_id`),
  ADD KEY `retail_id` (`retail_id`),
  ADD KEY `take_away_id` (`take_away_id`);

--
-- Indexes for table `capacity`
--
ALTER TABLE `capacity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `close_day_log`
--
ALTER TABLE `close_day_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debtors`
--
ALTER TABLE `debtors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `floor_id` (`floor_id`),
  ADD KEY `table_id` (`table_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `foc_items`
--
ALTER TABLE `foc_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foc_id` (`foc_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `kot`
--
ALTER TABLE `kot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kot_items`
--
ALTER TABLE `kot_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `booked_tables`
--
ALTER TABLE `booked_tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `break_down_items`
--
ALTER TABLE `break_down_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `break_down_receipt`
--
ALTER TABLE `break_down_receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `capacity`
--
ALTER TABLE `capacity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `close_day_log`
--
ALTER TABLE `close_day_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `debtors`
--
ALTER TABLE `debtors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `design_invoice`
--
ALTER TABLE `design_invoice`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `duplicate_bill`
--
ALTER TABLE `duplicate_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fiscal_year`
--
ALTER TABLE `fiscal_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `floor`
--
ALTER TABLE `floor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `foc`
--
ALTER TABLE `foc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foc_items`
--
ALTER TABLE `foc_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kot`
--
ALTER TABLE `kot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `kot_items`
--
ALTER TABLE `kot_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_discount`
--
ALTER TABLE `member_discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_order_category`
--
ALTER TABLE `member_order_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_privillege_threshold`
--
ALTER TABLE `member_privillege_threshold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_report`
--
ALTER TABLE `member_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_category`
--
ALTER TABLE `menu_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu_item_price`
--
ALTER TABLE `menu_item_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_stock_items`
--
ALTER TABLE `menu_stock_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `monthly_target`
--
ALTER TABLE `monthly_target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `obstacles`
--
ALTER TABLE `obstacles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `occupy`
--
ALTER TABLE `occupy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pick_up`
--
ALTER TABLE `pick_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `printers`
--
ALTER TABLE `printers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `printer_list`
--
ALTER TABLE `printer_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `printer_lists`
--
ALTER TABLE `printer_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `random`
--
ALTER TABLE `random`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `retail`
--
ALTER TABLE `retail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `special_order_items`
--
ALTER TABLE `special_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_entries`
--
ALTER TABLE `stock_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `stock_items`
--
ALTER TABLE `stock_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_details`
--
ALTER TABLE `table_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `take_away`
--
ALTER TABLE `take_away`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_items`
--
ALTER TABLE `temp_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `temp_order_list`
--
ALTER TABLE `temp_order_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tips`
--
ALTER TABLE `tips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `utensils_stock_entries`
--
ALTER TABLE `utensils_stock_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utensils_stock_items`
--
ALTER TABLE `utensils_stock_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
