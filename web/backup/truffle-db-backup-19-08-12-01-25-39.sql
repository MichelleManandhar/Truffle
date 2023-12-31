DROP TABLE IF EXISTS audit_log;

CREATE TABLE `audit_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) NOT NULL,
  `action` text NOT NULL,
  `type` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

INSERT INTO `audit_log` VALUES("1","2","<b>Administrator</b> Logged out of the system","user","2019-07-19 15:37:14");
INSERT INTO `audit_log` VALUES("2","1","Database has been backuped by the user <b>Superadmin</b>","database","2019-07-19 15:37:36");
INSERT INTO `audit_log` VALUES("3","1","Database has been backuped by the user <b>Superadmin</b>","database","2019-07-19 15:39:01");
INSERT INTO `audit_log` VALUES("4","2","<b>Admin</b> Logged onto the system","user","2019-07-19 15:39:12");
INSERT INTO `audit_log` VALUES("5","2","New table has been created named Table - 1","table","2019-07-19 15:39:22");
INSERT INTO `audit_log` VALUES("6","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2019-07-19 15:39:58");
INSERT INTO `audit_log` VALUES("7","2","New table has been created named Table - 2","table","2019-07-19 15:40:37");
INSERT INTO `audit_log` VALUES("8","2","Table \'<b>Table - 2</b>\' has been occupied ","table","2019-07-19 15:41:42");
INSERT INTO `audit_log` VALUES("9","1","Table order KOT number 190731-1 has been send","order","2019-07-31 14:12:21");
INSERT INTO `audit_log` VALUES("10","2","<b>Administrator</b> Logged out of the system","user","2019-08-06 11:55:07");
INSERT INTO `audit_log` VALUES("11","1","Table order KOT number 190806-1 has been send","order","2019-08-06 11:56:57");
INSERT INTO `audit_log` VALUES("12","1","Table order KOT number 190806-2 has been send","order","2019-08-06 11:57:46");
INSERT INTO `audit_log` VALUES("13","1","Table order KOT number 190806-3 has been send","order","2019-08-06 12:01:44");
INSERT INTO `audit_log` VALUES("14","1","Table order KOT number 190806-4 has been send","order","2019-08-06 12:05:35");
INSERT INTO `audit_log` VALUES("15","1","Table order KOT number 190806-5 has been send","order","2019-08-06 12:05:57");
INSERT INTO `audit_log` VALUES("16","2","<b>Admin</b> Logged onto the system","user","2019-08-07 14:43:11");
INSERT INTO `audit_log` VALUES("17","2","New debtor named -test\' has been created","debtor","2019-08-07 14:43:59");
INSERT INTO `audit_log` VALUES("18","2","300 - pitho has been sold","stock","2019-08-07 14:47:14");
INSERT INTO `audit_log` VALUES("19","2","Cash payment for table order has been made for the amount of Rs. 1139","billing","2019-08-07 14:47:15");
INSERT INTO `audit_log` VALUES("20","2","Table \'<b>Table - 2</b>\' has been closed ","table","2019-08-07 14:47:17");
INSERT INTO `audit_log` VALUES("21","2","Table \'<b>Table - 2</b>\' has been occupied ","table","2019-08-07 14:47:21");
INSERT INTO `audit_log` VALUES("22","2","Table order KOT number 190807-1 has been send","order","2019-08-07 14:47:31");
INSERT INTO `audit_log` VALUES("23","2","200 - pitho has been sold","stock","2019-08-07 14:47:47");
INSERT INTO `audit_log` VALUES("24","2","Credit table order has been made for the amount of Rs. 759 on the debtor named -test","billing","2019-08-07 14:47:47");
INSERT INTO `audit_log` VALUES("25","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2019-08-07 14:49:04");
INSERT INTO `audit_log` VALUES("26","2","Table order KOT number 190807-2 has been send","order","2019-08-07 14:49:09");
INSERT INTO `audit_log` VALUES("27","2","100 - pitho has been sold","stock","2019-08-07 14:49:28");
INSERT INTO `audit_log` VALUES("28","2","Credit table order has been made for the amount of Rs. 380 on the debtor named -test","billing","2019-08-07 14:49:28");
INSERT INTO `audit_log` VALUES("29","2","Table \'<b>Table - 1</b>\' has been closed ","table","2019-08-07 14:49:29");
INSERT INTO `audit_log` VALUES("30","2","<b>Administrator</b> Logged out of the system","user","2019-08-12 13:12:57");
INSERT INTO `audit_log` VALUES("31","1","Take away order KOT 190812-1 has been send","order","2019-08-12 13:13:48");
INSERT INTO `audit_log` VALUES("32","1","Take away order KOT 190812-2 has been send","order","2019-08-12 13:14:11");
INSERT INTO `audit_log` VALUES("33","1","Table order KOT number 190812-3 has been send","order","2019-08-12 13:14:24");
INSERT INTO `audit_log` VALUES("34","1","Take away order KOT 190812-4 has been send","order","2019-08-12 13:14:44");
INSERT INTO `audit_log` VALUES("35","1","Table order KOT number 190812-5 has been send","order","2019-08-12 13:19:16");
INSERT INTO `audit_log` VALUES("36","1","New debtor named -test2\' has been created","debtor","2019-08-12 13:20:05");
INSERT INTO `audit_log` VALUES("37","1","Database has been backuped by the user <b>Superadmin</b>","database","2019-08-12 13:25:39");



DROP TABLE IF EXISTS booked_tables;

CREATE TABLE `booked_tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `last_edited_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `floor_id` (`floor_id`),
  KEY `table_id` (`table_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS break_down_items;

CREATE TABLE `break_down_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `break_down_receipt_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS break_down_receipt;

CREATE TABLE `break_down_receipt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `debtor_id` (`debtor_id`),
  KEY `delivery_id` (`delivery_id`),
  KEY `occupy_id` (`occupy_id`),
  KEY `order_id` (`order_id`),
  KEY `pick_up_id` (`pick_up_id`),
  KEY `retail_id` (`retail_id`),
  KEY `take_away_id` (`take_away_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `break_down_receipt` VALUES("1","1","1564561651","0","0","0","0","0","","690","0","0","10","69","0","0","0","759","0","759","0","0","0","0","","0","0","0","3","2019-07-31 14:12:31","1");
INSERT INTO `break_down_receipt` VALUES("2","2","1565072011","0","0","0","0","0","","200","0","0","10","20","0","0","0","220","0","220","0","0","0","0","","0","0","0","3","2019-08-06 11:58:31","1");
INSERT INTO `break_down_receipt` VALUES("3","3","1565072213","0","0","0","0","0","","345","0","0","10","34.5","0","0","0","380","0","380","0","0","0","0","","0","0","0","3","2019-08-06 12:01:53","1");
INSERT INTO `break_down_receipt` VALUES("4","4","1565168533","0","0","0","0","0","","1035","0","0","10","103.5","0","0","0","1139","0","1139","0","0","0","0","","0","0","0","3","2019-08-07 14:47:13","2");
INSERT INTO `break_down_receipt` VALUES("5","5","1565168566","0","0","0","0","0","Test","690","0","0","10","69","0","0","0","759","0","0","0","0","0","0","","1","0","1","4","2019-08-07 14:47:46","2");
INSERT INTO `break_down_receipt` VALUES("6","6","1565168668","0","0","0","0","0","Test","345","0","0","10","34.5","0","0","0","380","0","0","0","0","0","0","","1","0","1","4","2019-08-07 14:49:28","2");
INSERT INTO `break_down_receipt` VALUES("7","7","1565595308","0","0","0","0","0","Test2","1380","0","0","10","138","0","0","0","1518","0","0","0","0","0","0","","1","0","2","4","2019-08-12 13:20:08","1");
INSERT INTO `break_down_receipt` VALUES("8","8","0","0","0","0","0","0","","0","0","0","0","0","0","0","0","1000","0","0","0","0","1","0","","0","0","1","0","2019-08-12 13:21:38","1");



DROP TABLE IF EXISTS capacity;

CREATE TABLE `capacity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `capacity` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS close_day_log;

CREATE TABLE `close_day_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS customer;

CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS debtors;

CREATE TABLE `debtors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `debtors` VALUES("1","test","1345","987456321","asdas","3417","1000","0","0","0000-00-00 00:00:00","2019-08-07 14:43:59","1");
INSERT INTO `debtors` VALUES("2","test2","34678876","987654000","rfsfsfs","1518","0","0","0","0000-00-00 00:00:00","2019-08-12 13:20:05","1");



DROP TABLE IF EXISTS delivery;

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(150) NOT NULL,
  `customer_pan` int(11) NOT NULL,
  `customer_address` varchar(150) NOT NULL,
  `customer_phone` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_confirmed` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS design_invoice;

CREATE TABLE `design_invoice` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `show_customer_name` tinyint(4) NOT NULL,
  `show_pan_no` tinyint(4) NOT NULL,
  `show_amount_text` tinyint(4) NOT NULL,
  `show_greeting_note` tinyint(4) NOT NULL,
  `show_operator_name` tinyint(4) NOT NULL,
  `show_customer_address` tinyint(4) NOT NULL,
  `width` float NOT NULL,
  `last_edited_on` datetime NOT NULL,
  `last_edited_by` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `design_invoice` VALUES("1","1","1","1","1","1","1","750","2017-12-18 16:18:28","2");



DROP TABLE IF EXISTS duplicate_bill;

CREATE TABLE `duplicate_bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL,
  `is_printed` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS fiscal_year;

CREATE TABLE `fiscal_year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `fiscal_year` VALUES("8","2018-12-19","2019-12-18","1");



DROP TABLE IF EXISTS floor;

CREATE TABLE `floor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `display_order` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `floor` VALUES("1","Section one","1","1","2019-02-27 00:00:00","1");
INSERT INTO `floor` VALUES("2","section 2","2","1","2019-08-12 13:23:21","1");



DROP TABLE IF EXISTS foc;

CREATE TABLE `foc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foc_no` int(11) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_pan` varchar(15) NOT NULL,
  `customer_address` varchar(150) NOT NULL,
  `customer_pax` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `floor_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `floor_id` (`floor_id`),
  KEY `table_id` (`table_id`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS foc_items;

CREATE TABLE `foc_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foc_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `foc_id` (`foc_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS kot;

CREATE TABLE `kot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `return_note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO `kot` VALUES("1","190731-1","1","1","0","0","0","0","0","1564561651","0","2019-07-31 14:12:21","1","1","1","0","","");
INSERT INTO `kot` VALUES("2","190806-1","1","1","0","0","0","0","0","1565072011","0","2019-08-06 11:56:57","1","1","1","0","","");
INSERT INTO `kot` VALUES("3","190806-2","1","1","0","0","0","0","0","1565072011","0","2019-08-06 11:57:46","1","1","1","0","","");
INSERT INTO `kot` VALUES("4","190806-3","2","1","0","0","0","0","0","1565072213","0","2019-08-06 12:01:44","1","1","1","0","","");
INSERT INTO `kot` VALUES("5","190806-4","2","1","0","0","0","0","0","1565168533","0","2019-08-06 12:05:34","1","1","1","0","","");
INSERT INTO `kot` VALUES("6","190806-5","2","1","0","0","0","0","0","1565168533","0","2019-08-06 12:05:57","1","1","1","0","","");
INSERT INTO `kot` VALUES("7","190807-1","2","1","0","0","0","0","0","1565168566","0","2019-08-07 14:47:31","2","1","1","0","","");
INSERT INTO `kot` VALUES("8","190807-2","1","1","0","0","0","0","0","1565168668","0","2019-08-07 14:49:09","2","1","1","0","","");
INSERT INTO `kot` VALUES("9","190812-1","0","0","0","0","1","0","0","0","0","2019-08-12 13:13:48","1","0","0","0","","");
INSERT INTO `kot` VALUES("10","190812-2","0","0","0","0","1","0","0","0","0","2019-08-12 13:14:11","1","0","0","0","","");
INSERT INTO `kot` VALUES("11","190812-3","1","1","7","0","0","0","0","0","0","2019-08-12 13:14:24","1","0","0","0","","");
INSERT INTO `kot` VALUES("12","190812-4","0","0","0","0","1","0","0","0","0","2019-08-12 13:14:43","1","0","0","0","","");
INSERT INTO `kot` VALUES("13","","1","1","7","0","0","0","0","0","0","2019-08-12 13:15:10","1","2","0","11","190812-3","test");
INSERT INTO `kot` VALUES("14","190812-5","2","1","0","0","0","0","0","1565595308","0","2019-08-12 13:19:16","1","1","1","0","","");



DROP TABLE IF EXISTS kot_items;

CREATE TABLE `kot_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kot_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `returned_quantity` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO `kot_items` VALUES("1","1","1","345","2","0","0","0");
INSERT INTO `kot_items` VALUES("2","2","1","100","1","0","1","0");
INSERT INTO `kot_items` VALUES("3","3","1","100","1","0","1","0");
INSERT INTO `kot_items` VALUES("4","4","1","345","1","0","0","0");
INSERT INTO `kot_items` VALUES("5","5","1","345","2","0","0","0");
INSERT INTO `kot_items` VALUES("6","6","1","345","1","0","0","0");
INSERT INTO `kot_items` VALUES("7","7","1","345","2","0","0","0");
INSERT INTO `kot_items` VALUES("8","8","1","345","1","0","0","0");
INSERT INTO `kot_items` VALUES("9","9","1","345","2","0","0","0");
INSERT INTO `kot_items` VALUES("10","10","1","345","1","0","0","0");
INSERT INTO `kot_items` VALUES("11","11","1","345","2","1","0","0");
INSERT INTO `kot_items` VALUES("12","12","1","345","1","0","0","0");
INSERT INTO `kot_items` VALUES("13","13","1","345","1","0","0","0");
INSERT INTO `kot_items` VALUES("14","14","1","345","4","0","0","0");



DROP TABLE IF EXISTS member;

CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS member_discount;

CREATE TABLE `member_discount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `discount_allowed` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS member_order_category;

CREATE TABLE `member_order_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `discount_rate` float NOT NULL,
  `discount_amount` float NOT NULL,
  `total` float NOT NULL,
  `member_report_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS member_privillege_threshold;

CREATE TABLE `member_privillege_threshold` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `end_amount` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `till_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS member_report;

CREATE TABLE `member_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS menu_category;

CREATE TABLE `menu_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `type` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `display_order` int(11) NOT NULL,
  `bill_type` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `menu_category` VALUES("1","test","test","0","1","1","6","2019-07-04 10:16:21");



DROP TABLE IF EXISTS menu_item;

CREATE TABLE `menu_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `is_discountable` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `menu_item` VALUES("1","Mangit Maharjan","1","345","fsdfsdfsdf","","mangit-maharjan","1","2019-07-04 10:16:36","1","2019-08-06 12:01:29","1","1","0");



DROP TABLE IF EXISTS menu_item_price;

CREATE TABLE `menu_item_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `previous_price` float NOT NULL,
  `changed_price` float NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS menu_stock_items;

CREATE TABLE `menu_stock_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_item_id` int(11) NOT NULL,
  `stock_item_id` int(11) NOT NULL,
  `used_quantity` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `menu_stock_items` VALUES("1","1","1","100");



DROP TABLE IF EXISTS monthly_target;

CREATE TABLE `monthly_target` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `month` varchar(25) NOT NULL,
  `full_date` date NOT NULL,
  `target` float NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_edited_on` datetime NOT NULL,
  `last_edited_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `monthly_target` VALUES("1","January","2017-01-01","150000","2017-03-29 00:00:00","2","2017-03-29 16:47:31","2");
INSERT INTO `monthly_target` VALUES("2","Feburary","2017-02-01","250000","2017-03-29 00:00:00","2","2017-03-29 14:14:52","2");
INSERT INTO `monthly_target` VALUES("3","March","2017-03-01","150000","2017-03-29 00:00:00","2","2017-03-29 14:14:55","2");
INSERT INTO `monthly_target` VALUES("4","April","2017-04-01","200000","2017-03-29 00:00:00","2","2017-03-30 11:01:11","2");
INSERT INTO `monthly_target` VALUES("5","May","2017-05-01","150000","2017-03-29 00:00:00","2","2017-03-29 14:15:09","2");
INSERT INTO `monthly_target` VALUES("6","June","2017-06-01","150000","2017-03-29 00:00:00","2","2017-03-29 14:15:13","2");
INSERT INTO `monthly_target` VALUES("7","July","2017-07-01","150000","2017-03-29 00:00:00","2","2017-03-29 14:15:15","2");
INSERT INTO `monthly_target` VALUES("8","August","2017-08-01","150000","2017-03-29 00:00:00","2","2017-03-29 14:15:18","2");
INSERT INTO `monthly_target` VALUES("9","September","2017-09-01","150000","2017-03-29 00:00:00","2","2017-03-29 14:15:21","2");
INSERT INTO `monthly_target` VALUES("10","Octuber","2017-10-01","150000","2017-03-29 00:00:00","2","2017-03-29 14:15:23","2");
INSERT INTO `monthly_target` VALUES("11","November","2017-11-01","150000","2017-03-29 00:00:00","2","2017-03-29 14:15:25","2");
INSERT INTO `monthly_target` VALUES("12","December","2017-12-01","150000","2017-03-29 00:00:00","2","2017-03-29 14:15:28","2");



DROP TABLE IF EXISTS obstacles;

CREATE TABLE `obstacles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `obstacle_name` varchar(150) NOT NULL,
  `floor` int(11) NOT NULL,
  `x_pos` float NOT NULL,
  `y_pos` float NOT NULL,
  `height` float NOT NULL,
  `width` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS occupy;

CREATE TABLE `occupy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `is_occupied` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `occupy` VALUES("1","","0","","1","","1","1","2019-07-19","15:39:58","2019-07-31","14:12:32","2019-07-19 15:39:58","2","0","0","0","0000-00-00 00:00:00","0","0","1");
INSERT INTO `occupy` VALUES("2","","0","","1","","2","1","2019-07-19","15:41:42","2019-08-06","12:01:54","2019-07-19 15:41:42","2","0","0","0","0000-00-00 00:00:00","0","0","1");
INSERT INTO `occupy` VALUES("3","","0","","2","","1","1","2019-07-31","14:12:46","2019-08-06","11:58:32","2019-07-31 14:12:46","1","0","0","0","0000-00-00 00:00:00","0","0","1");
INSERT INTO `occupy` VALUES("4","","0","","2","","2","1","2019-08-06","12:05:30","2019-08-07","14:47:16","2019-08-06 12:05:30","1","0","0","0","0000-00-00 00:00:00","0","0","1");
INSERT INTO `occupy` VALUES("5","","0","","2","","2","1","2019-08-07","14:47:21","2019-08-12","13:20:09","2019-08-07 14:47:21","2","0","0","0","0000-00-00 00:00:00","0","0","1");
INSERT INTO `occupy` VALUES("6","","0","","2","","1","1","2019-08-07","14:49:04","2019-08-07","14:49:29","2019-08-07 14:49:04","2","0","0","0","0000-00-00 00:00:00","0","0","1");
INSERT INTO `occupy` VALUES("7","","0","","0","","1","1","2019-08-12","13:13:22","0000-00-00","00:00:00","2019-08-12 13:13:22","1","0","1","1","0000-00-00 00:00:00","0","0","0");



DROP TABLE IF EXISTS order;

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
  `privillege_threshold_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `order` VALUES("1562230533","0","19-1","0","0","","0","","0","","0","0","345","10","34.5","0","0","0","0","0","380","0.5","380","380","0","0","0","2019-07-04 14:40:33","1","1","","0","0","0","0","","","0","0");
INSERT INTO `order` VALUES("1562231024","0","19-2","0","0","","0","","0","","0","0","345","10","34.5","0","0","0","0","0","380","0.5","380","380","0","0","0","2019-07-04 14:48:44","1","1","","0","0","0","0","","","0","0");
INSERT INTO `order` VALUES("1562231397","0","19-3","0","0","","0","","0","","0","0","345","10","34.5","0","0","0","0","0","380","0.5","380","380","0","0","0","2019-07-04 14:54:57","1","1","","0","0","0","0","","","0","0");
INSERT INTO `order` VALUES("1562231457","0","19-4","0","0","","0","","0","","0","0","345","10","34.5","0","0","0","0","0","380","0.5","380","380","0","0","0","2019-07-04 14:55:57","1","1","","0","0","0","0","","","0","0");
INSERT INTO `order` VALUES("1562231512","0","19-5","0","0","","0","","0","","0","0","345","10","34.5","0","0","0","0","0","380","0.5","380","380","0","0","0","2019-07-04 14:56:52","1","1","","0","0","0","0","","","0","0");
INSERT INTO `order` VALUES("1562231539","0","19-6","0","0","","0","","0","","0","0","690","10","69","0","0","0","0","0","759","0","759","759","0","0","0","2019-07-04 14:57:19","1","1","","0","0","0","0","","","0","0");
INSERT INTO `order` VALUES("1564561651","1","19-7","0","0","","0","","1","","1","1","690","10","69","0","0","0","0","0","759","0","759","759","0","0","0","2019-07-31 14:12:31","1","0","","0","0","0","0","","","0","0");
INSERT INTO `order` VALUES("1565072011","3","19-8","0","0","","0","","2","","1","1","200","10","20","0","0","0","0","0","220","0","220","220","0","0","0","2019-08-06 11:58:31","1","0","","0","0","0","0","","","0","0");
INSERT INTO `order` VALUES("1565072213","2","19-9","0","0","","0","","1","","2","1","345","10","34.5","0","0","0","0","0","380","0.5","380","380","0","0","0","2019-08-06 12:01:53","1","0","","0","0","0","0","","","0","0");
INSERT INTO `order` VALUES("1565168533","4","19-10","0","0","","0","","2","","2","1","1035","10","103.5","0","0","0","0","0","1139","0.5","1139","1139","0","0","0","2019-08-07 14:47:13","2","0","","0","0","0","0","","","0","0");
INSERT INTO `order` VALUES("1565168566","5","19-11","0","0","Test","0","","2","","2","1","690","10","69","0","0","0","0","0","759","0","759","0","0","1","1","2019-08-07 14:47:46","2","0","","0","0","0","0","","","0","0");
INSERT INTO `order` VALUES("1565168668","6","19-12","0","0","Test","0","","2","","1","1","345","10","34.5","0","0","0","0","0","380","0.5","380","0","0","1","1","2019-08-07 14:49:28","2","0","","0","0","0","0","","","0","0");
INSERT INTO `order` VALUES("1565595308","5","19-13","0","0","Test2","0","","2","","2","1","1380","10","138","0","0","0","0","0","1518","0","1518","0","0","1","2","2019-08-12 13:20:08","1","0","","0","0","0","0","","","0","0");



DROP TABLE IF EXISTS order_items;

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `order_items` VALUES("1","1562231024","1","1","345","0");
INSERT INTO `order_items` VALUES("2","1562231397","1","1","345","0");
INSERT INTO `order_items` VALUES("3","1562231457","1","1","345","0");
INSERT INTO `order_items` VALUES("4","1562231512","1","1","345","0");
INSERT INTO `order_items` VALUES("5","1562231539","1","2","345","0");
INSERT INTO `order_items` VALUES("6","1564561651","1","2","345","0");
INSERT INTO `order_items` VALUES("7","1565072011","1","2","100","1");
INSERT INTO `order_items` VALUES("8","1565072213","1","1","345","0");
INSERT INTO `order_items` VALUES("9","1565168533","1","3","345","0");
INSERT INTO `order_items` VALUES("10","1565168566","1","2","345","0");
INSERT INTO `order_items` VALUES("11","1565168668","1","1","345","0");
INSERT INTO `order_items` VALUES("12","1565595308","1","4","345","0");



DROP TABLE IF EXISTS pick_up;

CREATE TABLE `pick_up` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(150) NOT NULL,
  `customer_pan` int(11) NOT NULL,
  `customer_address` varchar(150) NOT NULL,
  `customer_phone` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_confirmed` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS printer_list;

CREATE TABLE `printer_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS printer_lists;

CREATE TABLE `printer_lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `printer_lists` VALUES("1","[{\"NAME\":\"Send To OneNote 2010\",\"DESCRIPTION\":\"Send To OneNote 2010,Send To Microsoft OneNote 2010 Driver,\",\"COMMENT\":\"\"},{\"NAME\":\"OneNote\",\"DESCRIPTION\":\"OneNote,Microsoft Software Printer Driver,\",\"COMMENT\":\"\"},{\"NAME\":\"RONGTA 58mm Series Printer\",\"DESCRIPTION\":\"RONGTA 58mm Series Printer,58Normal,\",\"COMMENT\":\"\"},{\"NAME\":\"POS-58-Series\",\"DESCRIPTION\":\"POS-58-Series,POS-58-Series Driver,\",\"COMMENT\":\"\"},{\"NAME\":\"Microsoft XPS Document Writer\",\"DESCRIPTION\":\"Microsoft XPS Document Writer,Microsoft XPS Document Writer v4,\",\"COMMENT\":\"\"},{\"NAME\":\"Microsoft Print to PDF\",\"DESCRIPTION\":\"Microsoft Print to PDF,Microsoft Print To PDF,\",\"COMMENT\":\"\"},{\"NAME\":\"Fax\",\"DESCRIPTION\":\"Fax,Microsoft Shared Fax Driver,\",\"COMMENT\":\"\"},{\"NAME\":\"Brother MFC-L2710DW series Printer\",\"DESCRIPTION\":\"Brother MFC-L2710DW series Printer,Brother Laser Type1 Class Driver,\",\"COMMENT\":\"\"},{\"NAME\":\"Brother DCP-T700W Printer\",\"DESCRIPTION\":\"Brother DCP-T700W Printer,Brother Generic Jpeg Type2 Class Driver,\",\"COMMENT\":\"\"}]");



DROP TABLE IF EXISTS printers;

CREATE TABLE `printers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `printer_name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `printers` VALUES("5","bill","bill","RONGTA 58mm Series Printer");
INSERT INTO `printers` VALUES("6","kitchen","kitchen","RONGTA 58mm Series Printer");
INSERT INTO `printers` VALUES("7","bar","bar","RONGTA 58mm Series Printer");
INSERT INTO `printers` VALUES("8","bakery","bakery","RONGTA 58mm Series Printer");



DROP TABLE IF EXISTS purchase;

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `purchase` VALUES("1","1","1000","2019-08-06 12:00:53","1");
INSERT INTO `purchase` VALUES("2","1","1000","2019-08-12 13:18:11","1");



DROP TABLE IF EXISTS random;

CREATE TABLE `random` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field_name` text NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO `random` VALUES("2","admin_mac_address","F8-A9-63-27-FC-B7");
INSERT INTO `random` VALUES("7","delivery_charge_amount","50");
INSERT INTO `random` VALUES("8","delivery_charge_vat_status","inclusive");
INSERT INTO `random` VALUES("10","current_year_for_invoice","2017-07-16");
INSERT INTO `random` VALUES("11","document","<h3>Information, Terms & User Manual for TRUFFLE</h3>        	<h3>Following User Guide aims to inform about some of the variations on Truffle Software.</h3>        	<p>The information pertained in this documents relates to the following versions of TRUFFLE software.</p>    		<ol>        		<li>TRUFFLE Lite PAN</li>        		<li>TRUFFLE Lite VAT</li>        		<li>TRUFFLE Pro PAN</li>        		<li>TRUFFLE Pro VAT</li>    		</ol>        	<h3>License:</h3>        	<p>TRUFFLE Software and all its variations are the property of Klient Scape Software Pvt. Ltd. The License to use the software must be authorised by Klient Scape Software Pvt. Ltd.</p>         	<p>For the purposes of this manual, unless otherwise stated, all versions are collective named �Truffle�. Klient Scape Software will be named as �Company� and the license holders to use the software will be called �Clients�. Anyone using the software will be collectively called in as �Users�.</p>        	<h3>Agreement</h3>        	<p>Users are authorised to use the functions provided within the software. Users are not allowed to copy, distribute or share any information within the software to anyone without the consent of the Company. Users may not change the functionality of the software under any circumstance and failure to abide by these terms are considered breach of contract, and the company may pursue legal action.</p>        	<h3>How To:</h3>        	<h3>Create Users:</h3>        	<p>Administrators are allowed to create users, the number of users allowed to create depends on the version. Pro versions allow for unlimited number of users.</p>        	<h3>Assign Access Roles</h3>        	<p>There are 2 access roles � Admin and Staff</p>        	<p>Users with admin levels access are privy to all the features available in Truffle. Admin can provide up to 90% in discounts and authorise sales returns. Admins can also view all the analysis and are entered into a dashboard view once logged in to see the overview of the restaurant.</p>        	<p>Users with Staff access roles are directly logged into the restaurant view and are not privy to all the data within the software. Staff can also be enrolled with up to 90% discounts. However, an admin must assign which staff to allocate the % of discount.</p>        	<h3>Dashboard View:</h3>        	<p>Dashboard view allows a quick glance of the restaurant in terms of financial prospective. Debtors list and transaction history are conveniently located at the upper left corner of the dashboard view. A large section occupies a bar graph relating to total sales and total cash-in. Note: Total sales can be different from total cash in.</p>        	<p>The three boxes underneath shows overall sales, current month sales, and current day sales.</p>        	<p>The total report section shows the total number of customers, average sales per customer and average sales per person along with average time each table gets occupied.</p>        	<p>The today�s summary section in the dashboard is one of the handiest tools that shows all the relevant information of current day status.</p>        	<h3>Capacity Rate:</h3>        	<p>The capacity rate shows the rate in which the restaurant capacity is being utilised. If the restaurant has a capacity of 100 seats, 100 customers a day would make a 100% capacity rate. </p>        	<p>The dashboard offers to set a capacity rate under the heading of �Change Restaurant Capacity.�</p>        	<p>Difference between Total Sales and Cash IN:</p>        	<p>The Total sales amount shows the actual sales the restaurant has made, that is all cash sales, all credit sales and does not include service charge or the VAT payable from sales.</p>        	<p>The Cash in amount shows only the cash that has been received, i.e Cash sales, credit collection, tips received, service charge, VAT amount etc. This feature is handy to calculate all the sum received during the day.</p>        	<h3>Best Sellers:</h3>        	<p>The dashboard offers a best sellers section conveniently placed to show the best selling items for current day, current month, current year and ALL time.</p>        	<h3>Best Sellers � Gross sales.</h3>        	<p>The dashboard also offers a best sellers in accordance to the revenue generated by each item in the menu. </p>        	<h3>Table View:</h3>        	<h3>Table Layout</h3>        	<p>Pro versions allow for unlimited sections and tables. In lite version, sections are limited but unlimited tables can be created, provided it fits the screen. </p>        	<p>To create a new table, drag the table icon to section area and place it there. From there you can resize, rename any tables. You can also create obstacles to create a restaurant design that best suits the user.</p>        	<p>Once the design of the restaurant is complete, admins can lock the tables and the obstacles.</p>        	<p>Merge Table:To merge table, check if the lock key in the table area is set to unlocked. Drag a the table you want to merge and connect it to another table. The colour of the table changes if it is merged.</p>        	<h3>Take-away, pick-up and delivery:</h3>        	<p>These areas are useful to take orders in accordance to their needs, for customers that are not eating in. You can choose to charge �service charge� according to your desire through the settings area, i.e. you can choose if eat in customers have service charge and take away customers be exempt from it or charge 5% delivery rate. </p>        	<h3>Taking orders:</h3>        	<p>In order to take orders, a menu must be created. To create a menu, under the third settings, under the category of Menu Items, you can add, edit and deactivate menu items. Once menu items are created, orders can be taken through tables or through pick-ups and deliveries.<p>        	<p>To take an order in a table, users should click on the items on the order screen and send to KOT. Once KOT is created, it automatically sends it to the billing area. Users can take more KOTs and send to respective areas, and billing is automatically adjusted.</p>        	<h3>Menu Category:</h3>        	<p>Truffle allows for sending KOT�s to different printers; i.e you can print kitchen orders to kitchen, bar orders to bar. You can create unlimited categories in the pro versions, while the category numbers are restricted to Lite versions.</p>        	<p>Categories are also useful for analysis in terms of items of how certain categories are being sold compared to others. This can be checked through category summary under the second setting sections.</p>        	<h3>Stock:</h3>        	<p>TRUFLLE Pro allows for stock counting. In order to utilize this feature, entries should be made to show opening stock and menu items should reflect the items that it requires to finish producing a menu item.</p>        	<h3>FOC:</h3>        	<p>FOC refers to free-of-cost, as these items will deduct stock but for various reason, requires the cost to be FOC. FOC requires a password that can be set by admins in the settings section.</p>        	<h3>Utensils Stock Manager:</h3>        	<p>Utensils Stock manager allows users to count and adjust all the utensils, i.e. spoons, knives, ash-tray, plates etc. </p>        	<h3>Bill payment:</h3>        	<p>When a customer asks for a bill in their table, under the billing list in the order view, the $ sign allows to make bill payment. Here users can choose to make full cash payments, make partial payments, bank payments or provide full credit payments. Regardless of the payment method, Truffle will create a bill and save it. The print button will print the customer bill, and print and close button will print the bill and close the table. The print temporary option allows to check the printed version of the bill for corrections before closing the bill. Note: The print temporary bill is not an actual invoice, but a mock-up that does not show the companies name, VAT information etc.</p>         	<h3>VAT REPORT:</h3>        	<p>Vat report shows the VAT report in the manner of Nepal VAT sales ledger book. It shows Total Amount, Total taxable amount, VAT percent and VAT Amount with breakdown of all the invoices. The date allows you to sort through VAT reports in accordance to their dates.</p>        	<h3>Fiscal Year</h3>        	<p>Fiscal Years are automatically calculated. Truffle uses proprietary methods to not allow users to make entries as dates are set and all entries time-stamped within the software. Users are not allowed to make entries on a different date. Users are allowed make new entries for up to 10 days after the fiscal year ends, to make changes wherever necessary. </p>        	<p class=\"text-center\">For further help, Contact <span class=\"text-decoration-underline\"> KlientScape Software, 01-4425513 or 01-6201374 </span> or visit us at our Offices in BIshalnagar-5.</p>");



DROP TABLE IF EXISTS retail;

CREATE TABLE `retail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(150) NOT NULL,
  `customer_pan` int(11) NOT NULL,
  `customer_address` varchar(150) NOT NULL,
  `customer_phone` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_confirmed` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS settings;

CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `slug` varchar(100) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `is_permanent` tinyint(4) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

INSERT INTO `settings` VALUES("30","master password","admin","master-password","1","1","2016-09-22 10:13:40");
INSERT INTO `settings` VALUES("31","name in bill","klientscape Pvt. Ltd","name-in-bill","1","1","2016-09-28 20:30:25");
INSERT INTO `settings` VALUES("32","address in bill","gairidhara, ktm","address-in-bill","1","1","2016-09-28 20:30:58");
INSERT INTO `settings` VALUES("33","phone no in bill","01444444","phone-no-in-bill","1","1","2016-09-28 20:31:31");
INSERT INTO `settings` VALUES("34","pan no in bill","123456789","pan-no-in-bill","1","1","2016-09-28 20:32:15");
INSERT INTO `settings` VALUES("35","thank you note in bill","Happy customer...","thank-you-note-in-bill","1","1","2016-09-28 20:32:44");
INSERT INTO `settings` VALUES("37","lock obstacle","no","lock-obstacle","1","1","2016-10-29 21:44:17");
INSERT INTO `settings` VALUES("40","lock table","no","lock-table","1","1","2016-11-04 10:25:17");
INSERT INTO `settings` VALUES("41","service charge rate","10","service-charge-rate","1","1","2016-11-04 12:51:14");
INSERT INTO `settings` VALUES("42","take away service charge rate","10","take-away-service-charge-rate","1","1","2016-11-17 17:07:58");
INSERT INTO `settings` VALUES("45","delivery service charge rate","0","delivery-service-charge-rate","1","1","2017-01-10 15:40:45");
INSERT INTO `settings` VALUES("46","send report email 1","sugentuladhar@gmail.com","send-report-email-1","1","1","2017-03-29 14:43:50");
INSERT INTO `settings` VALUES("47","send report email 2","test@gmail.com","send-report-email-2","1","1","2017-03-29 14:44:10");
INSERT INTO `settings` VALUES("48","send report email 3","sugen@klientscape.com","send-report-email-3","1","1","2017-03-29 14:44:23");
INSERT INTO `settings` VALUES("49","vat rate","13","vat-rate","1","1","2017-04-19 16:44:35");
INSERT INTO `settings` VALUES("50","pick up service charge rate","10","pick-up-service-charge-rate","1","1","2017-06-02 17:04:27");
INSERT INTO `settings` VALUES("51","foc password","foc","foc-password","1","1","2017-07-11 14:04:19");
INSERT INTO `settings` VALUES("52","retail service charge rate","0","retail-service-charge-rate","1","1","2017-11-22 02:06:18");
INSERT INTO `settings` VALUES("53","currency","npr","currency","1","1","2017-12-11 11:08:05");
INSERT INTO `settings` VALUES("54","member birthday reminder day","2","member-birthday-reminder-day","1","1","2017-12-15 01:03:12");
INSERT INTO `settings` VALUES("55","cancel order password","administrator","cancel-order-password","1","1","2018-06-15 03:03:03");



DROP TABLE IF EXISTS special_order_items;

CREATE TABLE `special_order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `remarks` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `special_order_items` VALUES("1","xyz","100","hhfh","fghgfhfh","1","","2019-08-06 11:55:42","1");



DROP TABLE IF EXISTS stock_entries;

CREATE TABLE `stock_entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_item_id` int(11) NOT NULL,
  `stock_in` float NOT NULL,
  `stock_out` float NOT NULL,
  `is_os` int(11) NOT NULL,
  `adjusted_quantity` float NOT NULL,
  `adjusted_date` datetime NOT NULL,
  `remarks` text NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `stock_entries` VALUES("1","1","0","0","1","0","0000-00-00 00:00:00","","2019-08-06 12:00:39","1");
INSERT INTO `stock_entries` VALUES("2","1","1000","0","0","0","0000-00-00 00:00:00","","2019-08-06 12:00:53","1");
INSERT INTO `stock_entries` VALUES("3","1","0","100","0","0","0000-00-00 00:00:00","","2019-08-06 12:01:53","1");
INSERT INTO `stock_entries` VALUES("4","1","0","300","0","0","0000-00-00 00:00:00","","2019-08-07 14:47:14","2");
INSERT INTO `stock_entries` VALUES("5","1","0","200","0","0","0000-00-00 00:00:00","","2019-08-07 14:47:47","2");
INSERT INTO `stock_entries` VALUES("6","1","0","100","0","0","0000-00-00 00:00:00","","2019-08-07 14:49:28","2");
INSERT INTO `stock_entries` VALUES("7","1","1000","0","0","0","0000-00-00 00:00:00","","2019-08-12 13:18:12","1");
INSERT INTO `stock_entries` VALUES("8","1","0","400","0","0","0000-00-00 00:00:00","","2019-08-12 13:20:09","1");



DROP TABLE IF EXISTS stock_items;

CREATE TABLE `stock_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `quantity` float NOT NULL,
  `quantity_type` tinyint(4) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `stock_items` VALUES("1","1","pitho","0","2","1","2019-08-06 12:00:39","1");



DROP TABLE IF EXISTS table_details;

CREATE TABLE `table_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `is_deleted` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `table_details` VALUES("1","Table - 1","1","1","1","0000-00-00 00:00:00","0000-00-00 00:00:00","2","6.19283","5.7106","17.0854","8.05153","","0","0");
INSERT INTO `table_details` VALUES("2","Table - 2","2","1","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","16.98","4.88998","16.7504","58.9372","","0","0");



DROP TABLE IF EXISTS take_away;

CREATE TABLE `take_away` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(150) NOT NULL,
  `customer_pan` int(11) NOT NULL,
  `customer_address` varchar(150) NOT NULL,
  `customer_phone` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_confirmed` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `take_away` VALUES("1","","0","","","2019-08-12 13:13:38","1","0","0");



DROP TABLE IF EXISTS temp_items;

CREATE TABLE `temp_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `occupy_id` int(11) NOT NULL,
  `retail_id` int(11) NOT NULL,
  `take_away_id` int(11) NOT NULL,
  `pick_up_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `temp_items` VALUES("6","0","0","1","0","0","1","4","345","0");
INSERT INTO `temp_items` VALUES("7","7","0","0","0","0","1","1","345","0");



DROP TABLE IF EXISTS temp_order_list;

CREATE TABLE `temp_order_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `occupy_id` int(11) NOT NULL,
  `retail_id` int(11) NOT NULL,
  `take_away_id` int(11) NOT NULL,
  `pick_up_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS tips;

CREATE TABLE `tips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` float NOT NULL,
  `type` tinyint(1) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS user;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `encrypt` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `user` VALUES("1","Super Admin","","0","0","","0","superadmin","$2y$13$zNgfxhx1KILBSqPSy2G0n.AWRmCt4DQojmDuiQcTlYuYoB38E8fUS","5VmLKVrUUGUPgnXEp9IuqaVdk7pXQxXK","","","","100","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","3003c67a130ad1fdd65d3544c8f657c4");
INSERT INTO `user` VALUES("2","Administrator","Kathmandu","9801116771","15639419","test@test.com","user-profile-pic_1494500116.jpg","admin","$2y$13$pQ/57w8cSk7nCmr3pjem.e3sLiXzqtQEtrXMmj76604dmCfWBLJne","kAdzZNRkmZu6RbNfz3L4fTEdtfrWWb6h","Owner","Sgj9Y0k+bLM=","WBjbstXq","90","1","2016-08-25 06:49:46","1","2019-06-21 14:19:50","a9a55f5bd4dd6fb50ac462a0a02aee41");



DROP TABLE IF EXISTS utensils_stock_entries;

CREATE TABLE `utensils_stock_entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_item_id` int(11) NOT NULL,
  `stock_in` float NOT NULL,
  `stock_out` float NOT NULL,
  `is_os` tinyint(4) NOT NULL,
  `adjusted_quantity` float NOT NULL,
  `adjusted_date` datetime NOT NULL,
  `remarks` text NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS utensils_stock_items;

CREATE TABLE `utensils_stock_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




