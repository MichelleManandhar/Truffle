DROP TABLE IF EXISTS audit_log;

CREATE TABLE `audit_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) NOT NULL,
  `action` text NOT NULL,
  `type` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2227 DEFAULT CHARSET=latin1;

INSERT INTO `audit_log` VALUES("8","2","Updated menu category","menu","2017-04-13 10:56:03");
INSERT INTO `audit_log` VALUES("9","2","Updated menu category","menu","2017-04-13 10:56:07");
INSERT INTO `audit_log` VALUES("10","2","<b>Administrator</b> Logged onto the system","user","2017-04-13 11:17:02");
INSERT INTO `audit_log` VALUES("11","2","<b>Administrator</b> Logged out of the system","user","2017-04-13 11:26:02");
INSERT INTO `audit_log` VALUES("12","2","<b>Administrator</b> Logged onto the system","user","2017-04-13 11:26:15");
INSERT INTO `audit_log` VALUES("13","2","New menu category has been created named -liquor","menu","2017-04-13 11:27:27");
INSERT INTO `audit_log` VALUES("14","2","Product named -Stock Item 1 has been added","misc","2017-04-13 11:33:07");
INSERT INTO `audit_log` VALUES("15","2","Product named -Stock Item 2 has been added","misc","2017-04-13 11:33:18");
INSERT INTO `audit_log` VALUES("16","2","Product named -Stock Item 3 has been added","misc","2017-04-13 11:33:31");
INSERT INTO `audit_log` VALUES("17","2","Product named -Stock Item 4 has been added","misc","2017-04-13 11:33:48");
INSERT INTO `audit_log` VALUES("18","2","Product named -Stock Item 5 has been added","misc","2017-04-13 11:34:00");
INSERT INTO `audit_log` VALUES("19","2","Product named -Stock Item 6 has been added","misc","2017-04-13 11:34:11");
INSERT INTO `audit_log` VALUES("20","2","Menu item has been added","menu","2017-04-13 11:38:35");
INSERT INTO `audit_log` VALUES("21","2","Table order KOT number 170413-1 has been send","order","2017-04-13 11:47:02");
INSERT INTO `audit_log` VALUES("22","2","Table order KOT number 170413-2 has been send","order","2017-04-13 11:48:11");
INSERT INTO `audit_log` VALUES("23","2","Item wise payment has been made for the amount of Rs. 330","order","2017-04-13 11:49:44");
INSERT INTO `audit_log` VALUES("24","2","Advance payment has been made for the amount of Rs. 200","order","2017-04-13 11:58:04");
INSERT INTO `audit_log` VALUES("25","2","Table order KOT number 170413-3 has been send","order","2017-04-13 11:59:34");
INSERT INTO `audit_log` VALUES("26","2","2 - stock item 1 has been sold","stock","2017-04-13 12:00:57");
INSERT INTO `audit_log` VALUES("27","2","20 - stock item 2 has been sold","stock","2017-04-13 12:00:58");
INSERT INTO `audit_log` VALUES("28","2","Cash payment for table order has been made for the amount of Rs. 2035","order","2017-04-13 12:00:59");
INSERT INTO `audit_log` VALUES("29","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-04-13 12:01:00");
INSERT INTO `audit_log` VALUES("30","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-04-13 12:01:43");
INSERT INTO `audit_log` VALUES("31","2","Take away order KOT 170413-4 has been send","order","2017-04-13 12:02:53");
INSERT INTO `audit_log` VALUES("32","2","Take away order KOT 170413-5 has been send","order","2017-04-13 12:08:43");
INSERT INTO `audit_log` VALUES("33","2","New debtor named -sugen\' has been created","debtor","2017-04-13 12:09:11");
INSERT INTO `audit_log` VALUES("34","2","Item wise payment has been made for the amount of Rs. 1100","order","2017-04-13 12:09:15");
INSERT INTO `audit_log` VALUES("35","2","Credit delivery order has been made for the amount of Rs.1980 on the debtor named -sugen","order","2017-04-13 12:09:41");
INSERT INTO `audit_log` VALUES("36","2","Credit delivery charge has been made for the amount of Rs.50 on the debtor named -sugen","order","2017-04-13 12:09:42");
INSERT INTO `audit_log` VALUES("37","2","Take away order KOT 170413-6 has been send","order","2017-04-13 12:10:52");
INSERT INTO `audit_log` VALUES("38","2","Item wise payment has been made for the amount of Rs. 220","order","2017-04-13 12:22:41");
INSERT INTO `audit_log` VALUES("39","2","Advance payment has been made for the amount of Rs. 100","order","2017-04-13 12:22:53");
INSERT INTO `audit_log` VALUES("40","2","Item wise payment has been made for the amount of Rs. 220","order","2017-04-13 12:23:10");
INSERT INTO `audit_log` VALUES("41","2","Cash payment for take away order has been made for the amount of Rs. 1100","order","2017-04-13 12:23:23");
INSERT INTO `audit_log` VALUES("42","2","New table has been created named Table - 2","table","2017-04-13 12:23:34");
INSERT INTO `audit_log` VALUES("43","2","Table order KOT number 170413-7 has been send","order","2017-04-13 12:36:57");
INSERT INTO `audit_log` VALUES("44","2","2 - stock item 1 has been sold","stock","2017-04-13 12:37:14");
INSERT INTO `audit_log` VALUES("45","2","20 - stock item 2 has been sold","stock","2017-04-13 12:37:14");
INSERT INTO `audit_log` VALUES("46","2","Cash payment for table order has been made for the amount of Rs. 1320","order","2017-04-13 12:37:15");
INSERT INTO `audit_log` VALUES("47","2","Table order KOT number 170413-8 has been send","order","2017-04-13 12:37:29");
INSERT INTO `audit_log` VALUES("48","2","2 - stock item 1 has been sold","stock","2017-04-13 12:58:41");
INSERT INTO `audit_log` VALUES("49","2","20 - stock item 2 has been sold","stock","2017-04-13 12:58:41");
INSERT INTO `audit_log` VALUES("50","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-04-13 12:58:42");
INSERT INTO `audit_log` VALUES("51","2","Cash payment for table order has been made for the amount of Rs. 880","order","2017-04-13 12:58:42");
INSERT INTO `audit_log` VALUES("52","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-04-13 13:16:38");
INSERT INTO `audit_log` VALUES("53","2","Table order KOT number 170413-9 has been send","order","2017-04-13 13:16:51");
INSERT INTO `audit_log` VALUES("54","2","FOC has been made","order","2017-04-13 13:36:50");
INSERT INTO `audit_log` VALUES("55","2","Table order KOT number 170413-10 has been send","order","2017-04-13 13:41:37");
INSERT INTO `audit_log` VALUES("56","2","FOC has been made","order","2017-04-13 13:44:39");
INSERT INTO `audit_log` VALUES("57","2","<b>Administrator</b> Logged out of the system","user","2017-04-13 14:53:45");
INSERT INTO `audit_log` VALUES("58","2","<b>Administrator</b> Logged onto the system","user","2017-04-13 14:53:55");
INSERT INTO `audit_log` VALUES("59","2","Tip amount of Rs. 200 has been added","order","2017-04-13 14:54:14");
INSERT INTO `audit_log` VALUES("60","2","Tip amount 50 has been distributed","tip","2017-04-13 14:55:52");
INSERT INTO `audit_log` VALUES("61","2","Table order KOT number 170413-11 has been send","order","2017-04-13 17:06:44");
INSERT INTO `audit_log` VALUES("62","2","Cash payment for table order has been made for the amount of Rs. 550","order","2017-04-13 17:07:21");
INSERT INTO `audit_log` VALUES("63","2","<b>Administrator</b> Logged onto the system","user","2017-04-13 19:32:55");
INSERT INTO `audit_log` VALUES("64","2","<b>Administrator</b> Logged onto the system","user","2017-04-15 10:22:05");
INSERT INTO `audit_log` VALUES("65","2","<b>Administrator</b> Logged onto the system","user","2017-04-16 10:40:07");
INSERT INTO `audit_log` VALUES("66","2","Table order KOT number 170416-1 has been send","order","2017-04-16 15:37:37");
INSERT INTO `audit_log` VALUES("67","2","Cash payment for table order has been made for the amount of Rs. 660","order","2017-04-16 15:37:57");
INSERT INTO `audit_log` VALUES("68","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-04-16 15:37:58");
INSERT INTO `audit_log` VALUES("69","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-04-16 15:38:29");
INSERT INTO `audit_log` VALUES("70","2","Payment returned the amount of Rs. 100to debtor named -sugen","debtor","2017-04-16 16:05:28");
INSERT INTO `audit_log` VALUES("71","2","Table order KOT number 170416-2 has been send","order","2017-04-16 16:59:36");
INSERT INTO `audit_log` VALUES("72","2","Cash payment for table order has been made for the amount of Rs. 594","order","2017-04-16 17:00:05");
INSERT INTO `audit_log` VALUES("73","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-04-16 17:00:07");
INSERT INTO `audit_log` VALUES("74","2","<b>Administrator</b> Logged out of the system","user","2017-04-16 18:03:20");
INSERT INTO `audit_log` VALUES("75","2","<b>Administrator</b> Logged onto the system","user","2017-04-16 20:37:59");
INSERT INTO `audit_log` VALUES("76","2","<b>Administrator</b> Logged onto the system","user","2017-04-17 08:59:09");
INSERT INTO `audit_log` VALUES("77","2","<b>Administrator</b> Logged onto the system","user","2017-04-17 11:12:12");
INSERT INTO `audit_log` VALUES("78","2","<b>Administrator</b> Logged out of the system","user","2017-04-17 11:13:07");
INSERT INTO `audit_log` VALUES("79","2","<b>Administrator</b> Logged onto the system","user","2017-04-17 13:12:25");
INSERT INTO `audit_log` VALUES("80","2","<b>Administrator</b> Logged out of the system","user","2017-04-17 13:12:37");
INSERT INTO `audit_log` VALUES("81","2","<b>Administrator</b> Logged onto the system","user","2017-04-17 13:47:06");
INSERT INTO `audit_log` VALUES("82","2","<b>Administrator</b> Logged out of the system","user","2017-04-17 13:57:27");
INSERT INTO `audit_log` VALUES("83","2","<b>Administrator</b> Logged onto the system","user","2017-04-17 14:23:41");
INSERT INTO `audit_log` VALUES("84","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-04-17 14:51:06");
INSERT INTO `audit_log` VALUES("85","2","Table order KOT number 170417-1 has been send","order","2017-04-17 15:17:47");
INSERT INTO `audit_log` VALUES("86","2","Table order KOT number 170417-2 has been send","order","2017-04-17 15:18:07");
INSERT INTO `audit_log` VALUES("87","2","Table order KOT number 170417-3 has been send","order","2017-04-17 15:18:32");
INSERT INTO `audit_log` VALUES("88","2","Table \'<b>Table - 2</b>\' has been occupied ","table","2017-04-17 15:19:07");
INSERT INTO `audit_log` VALUES("89","2","Table order KOT number 170417-4 has been send","order","2017-04-17 15:19:14");
INSERT INTO `audit_log` VALUES("90","2","Table order KOT number 170417-5 has been send","order","2017-04-17 15:19:20");
INSERT INTO `audit_log` VALUES("91","2","New table has been created named Table - 3","table","2017-04-17 15:19:31");
INSERT INTO `audit_log` VALUES("92","2","New table has been created named Table - 4","table","2017-04-17 15:19:34");
INSERT INTO `audit_log` VALUES("93","2","Table \'<b>Table - 3</b>\' has been occupied ","table","2017-04-17 15:19:39");
INSERT INTO `audit_log` VALUES("94","2","Table order KOT number 170417-6 has been send","order","2017-04-17 15:19:47");
INSERT INTO `audit_log` VALUES("95","2","Table order KOT number 170417-7 has been send","order","2017-04-17 15:19:53");
INSERT INTO `audit_log` VALUES("96","2","Table \'<b>Table - 4</b>\' has been occupied ","table","2017-04-17 15:22:20");
INSERT INTO `audit_log` VALUES("97","2","Table order KOT number 170417-8 has been send","order","2017-04-17 15:22:29");
INSERT INTO `audit_log` VALUES("98","2","Table order KOT number 170417-9 has been send","order","2017-04-17 15:22:36");
INSERT INTO `audit_log` VALUES("99","2","Take away order KOT 170417-10 has been send","order","2017-04-17 15:56:35");
INSERT INTO `audit_log` VALUES("100","2","New obstacle has been created named -Obstacle - 1 on the floor no. 1","table","2017-04-17 16:05:18");
INSERT INTO `audit_log` VALUES("101","2","Obstacle has been deleted","table","2017-04-17 16:40:57");
INSERT INTO `audit_log` VALUES("102","2","New obstacle has been created named -Obstacle - 1 on the floor no. 1","table","2017-04-17 16:41:02");
INSERT INTO `audit_log` VALUES("103","2","New obstacle has been created named -Obstacle - 3 on the floor no. 1","table","2017-04-17 16:41:03");
INSERT INTO `audit_log` VALUES("104","2","Obstacle has been deleted","table","2017-04-17 16:47:17");
INSERT INTO `audit_log` VALUES("105","2","New obstacle has been created named -Obstacle - 4 on the floor no. 1","table","2017-04-17 16:47:55");
INSERT INTO `audit_log` VALUES("106","2","New obstacle has been created named -Obstacle - 5 on the floor no. 1","table","2017-04-17 16:48:04");
INSERT INTO `audit_log` VALUES("107","2","Obstacle has been deleted","table","2017-04-17 16:49:24");
INSERT INTO `audit_log` VALUES("108","2","New table has been created named Table - 5","table","2017-04-17 16:49:32");
INSERT INTO `audit_log` VALUES("109","2","New table has been created named Table - 6","table","2017-04-17 16:49:34");
INSERT INTO `audit_log` VALUES("110","2","New table has been created named Table - 7","table","2017-04-17 16:49:35");
INSERT INTO `audit_log` VALUES("111","2","Table named \'Table - 7\' has been deleted","table","2017-04-17 16:49:39");
INSERT INTO `audit_log` VALUES("112","2","Table named \'Table - 5\' has been deleted","table","2017-04-17 16:49:45");
INSERT INTO `audit_log` VALUES("113","2","Table named \'Table - 6\' has been deleted","table","2017-04-17 16:49:48");
INSERT INTO `audit_log` VALUES("114","2","Booking has been made","table","2017-04-17 17:42:45");
INSERT INTO `audit_log` VALUES("115","2","Booking has been made","table","2017-04-17 17:51:32");
INSERT INTO `audit_log` VALUES("116","5","<b>Staff</b> Logged onto the system","user","2017-04-18 10:15:24");
INSERT INTO `audit_log` VALUES("117","5","Table \'<b>Table - 4</b>\' has been closed ","table","2017-04-18 10:16:21");
INSERT INTO `audit_log` VALUES("118","5","Table \'<b>Table - 4</b>\' has been occupied ","table","2017-04-18 10:16:53");
INSERT INTO `audit_log` VALUES("119","5","Table \'<b>Table - 4</b>\' has been closed ","table","2017-04-18 10:17:06");
INSERT INTO `audit_log` VALUES("120","5","Table \'<b>Table - 3</b>\' has been closed ","table","2017-04-18 10:18:46");
INSERT INTO `audit_log` VALUES("121","5","<b>Staff</b> Logged out of the system","user","2017-04-18 10:19:03");
INSERT INTO `audit_log` VALUES("122","2","<b>Administrator</b> Logged onto the system","user","2017-04-18 10:19:12");
INSERT INTO `audit_log` VALUES("123","2","Table \'<b>Table - 2</b>\' has been closed ","table","2017-04-18 10:19:25");
INSERT INTO `audit_log` VALUES("124","2","Table \'<b>Table - 4</b>\' has been closed ","table","2017-04-18 10:24:43");
INSERT INTO `audit_log` VALUES("125","2","Table \'<b>Table - 3</b>\' has been closed ","table","2017-04-18 10:24:48");
INSERT INTO `audit_log` VALUES("126","2","Table \'<b>Table - 4</b>\' has been closed ","table","2017-04-18 10:27:16");
INSERT INTO `audit_log` VALUES("127","2","Obstacle has been deleted","table","2017-04-18 10:27:57");
INSERT INTO `audit_log` VALUES("128","2","New table has been created named Table - 5","table","2017-04-18 10:30:54");
INSERT INTO `audit_log` VALUES("129","2","Table named \'Table - 5\' has been deleted","table","2017-04-18 10:30:59");
INSERT INTO `audit_log` VALUES("130","2","Table \'<b>Table - 4</b>\' has been closed ","table","2017-04-18 10:38:26");
INSERT INTO `audit_log` VALUES("131","2","Table named \'Table - 4\' has been deleted","table","2017-04-18 10:38:30");
INSERT INTO `audit_log` VALUES("132","2","New obstacle has been created named -Obstacle - 4 on the floor no. 1","table","2017-04-18 10:39:41");
INSERT INTO `audit_log` VALUES("133","2","New obstacle has been created named -Obstacle - 7 on the floor no. 1","table","2017-04-18 10:39:42");
INSERT INTO `audit_log` VALUES("134","2","New table has been created named Table - 4","table","2017-04-18 10:39:44");
INSERT INTO `audit_log` VALUES("135","2","New table has been created named Table - 5","table","2017-04-18 10:39:45");
INSERT INTO `audit_log` VALUES("136","2","New table has been created named Table - 6","table","2017-04-18 10:39:46");
INSERT INTO `audit_log` VALUES("137","2","Table named \'Table - 4\' has been deleted","table","2017-04-18 10:41:11");
INSERT INTO `audit_log` VALUES("138","2","Table named \'Table - 5\' has been deleted","table","2017-04-18 10:41:15");
INSERT INTO `audit_log` VALUES("139","2","Table named \'Table - 6\' has been deleted","table","2017-04-18 10:41:18");
INSERT INTO `audit_log` VALUES("140","2","Take away order KOT 170418-1 has been send","order","2017-04-18 10:42:48");
INSERT INTO `audit_log` VALUES("141","2","Obstacle has been deleted","table","2017-04-18 10:46:46");
INSERT INTO `audit_log` VALUES("142","2","Obstacle has been deleted","table","2017-04-18 10:49:58");
INSERT INTO `audit_log` VALUES("143","2","New obstacle has been created named -Obstacle - 2 on the floor no. 1","table","2017-04-18 10:50:09");
INSERT INTO `audit_log` VALUES("144","2","New obstacle has been created named -Obstacle - 3 on the floor no. 1","table","2017-04-18 10:50:12");
INSERT INTO `audit_log` VALUES("145","2","New obstacle has been created named -Obstacle - 4 on the floor no. 1","table","2017-04-18 10:50:13");
INSERT INTO `audit_log` VALUES("146","2","New obstacle has been created named -Obstacle - 5 on the floor no. 1","table","2017-04-18 10:50:14");
INSERT INTO `audit_log` VALUES("147","2","New obstacle has been created named -Obstacle - 6 on the floor no. 1","table","2017-04-18 10:50:16");
INSERT INTO `audit_log` VALUES("148","2","New obstacle has been created named -Obstacle - 7 on the floor no. 1","table","2017-04-18 10:50:17");
INSERT INTO `audit_log` VALUES("149","2","Obstacle has been deleted","table","2017-04-18 10:50:39");
INSERT INTO `audit_log` VALUES("150","2","Obstacle has been deleted","table","2017-04-18 10:50:42");
INSERT INTO `audit_log` VALUES("151","2","Obstacle has been deleted","table","2017-04-18 10:50:45");
INSERT INTO `audit_log` VALUES("152","2","Obstacle has been deleted","table","2017-04-18 10:50:48");
INSERT INTO `audit_log` VALUES("153","2","Obstacle has been deleted","table","2017-04-18 10:50:51");
INSERT INTO `audit_log` VALUES("154","2","Obstacle has been deleted","table","2017-04-18 10:50:54");
INSERT INTO `audit_log` VALUES("155","2","Obstacle has been deleted","table","2017-04-18 10:50:57");
INSERT INTO `audit_log` VALUES("156","2","Table \'<b>Table - 3</b>\' has been closed ","table","2017-04-18 10:56:57");
INSERT INTO `audit_log` VALUES("157","2","Cash payment for table order has been made for the amount of Rs. 248","order","2017-04-18 10:56:57");
INSERT INTO `audit_log` VALUES("158","2","Advance payment has been made for the amount of Rs. 100","order","2017-04-18 11:23:04");
INSERT INTO `audit_log` VALUES("159","2","Item wise payment has been made for the amount of Rs. 220","order","2017-04-18 11:23:32");
INSERT INTO `audit_log` VALUES("160","2","Cash payment for table order has been made for the amount of Rs. 935","order","2017-04-18 11:23:48");
INSERT INTO `audit_log` VALUES("161","2","Table \'<b>Table - 2</b>\' has been closed ","table","2017-04-18 11:23:49");
INSERT INTO `audit_log` VALUES("162","2","Take away order KOT 170418-2 has been send","order","2017-04-18 11:25:28");
INSERT INTO `audit_log` VALUES("163","2","Item wise payment has been made for the amount of Rs. 110","order","2017-04-18 11:25:43");
INSERT INTO `audit_log` VALUES("164","2","Advance payment has been made for the amount of Rs. 100","order","2017-04-18 11:25:57");
INSERT INTO `audit_log` VALUES("165","2","Item wise payment has been made for the amount of Rs. 110","order","2017-04-18 11:26:18");
INSERT INTO `audit_log` VALUES("166","2","Cash payment for delivery order has been made for the amount of Rs. 660","order","2017-04-18 11:26:41");
INSERT INTO `audit_log` VALUES("167","2","Table order KOT number 170418-3 has been send","order","2017-04-18 11:33:24");
INSERT INTO `audit_log` VALUES("168","2","FOC has been made","order","2017-04-18 11:33:31");
INSERT INTO `audit_log` VALUES("169","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-04-18 11:52:06");
INSERT INTO `audit_log` VALUES("170","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-04-18 12:00:40");
INSERT INTO `audit_log` VALUES("171","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-04-18 12:01:55");
INSERT INTO `audit_log` VALUES("172","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-04-18 12:40:33");
INSERT INTO `audit_log` VALUES("173","2","Table order KOT number 170418-4 has been send","order","2017-04-18 12:40:43");
INSERT INTO `audit_log` VALUES("174","2","Item wise payment has been made for the amount of Rs. 220","order","2017-04-18 12:41:01");
INSERT INTO `audit_log` VALUES("175","2","Cash payment for table order has been made for the amount of Rs. 935","order","2017-04-18 12:41:30");
INSERT INTO `audit_log` VALUES("176","2","Table order KOT number 170418-5 has been send","order","2017-04-18 12:45:13");
INSERT INTO `audit_log` VALUES("177","2","Item wise payment has been made for the amount of Rs. 220","order","2017-04-18 12:45:27");
INSERT INTO `audit_log` VALUES("178","2","Credit item wise table order has been made for the amount of Rs. 440 on the debtor named -sugen","order","2017-04-18 12:53:30");
INSERT INTO `audit_log` VALUES("179","2","Cash payment for table order has been made for the amount of Rs. 935","order","2017-04-18 13:04:16");
INSERT INTO `audit_log` VALUES("180","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-04-18 13:04:18");
INSERT INTO `audit_log` VALUES("181","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-04-18 13:11:03");
INSERT INTO `audit_log` VALUES("182","2","Table order KOT number 170418-6 has been send","order","2017-04-18 13:11:12");
INSERT INTO `audit_log` VALUES("183","2","Credit item wise table order has been made for the amount of Rs. 220 on the debtor named -sugen","order","2017-04-18 13:11:29");
INSERT INTO `audit_log` VALUES("184","2","Item wise payment has been made for the amount of Rs. 165","order","2017-04-18 13:11:42");
INSERT INTO `audit_log` VALUES("185","2","Cash payment for table order has been made for the amount of Rs. 935","order","2017-04-18 13:11:59");
INSERT INTO `audit_log` VALUES("186","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-04-18 13:12:00");
INSERT INTO `audit_log` VALUES("187","5","<b>Staff</b> Logged onto the system","user","2017-04-19 08:52:07");
INSERT INTO `audit_log` VALUES("188","5","<b>Staff</b> Logged out of the system","user","2017-04-19 08:55:43");
INSERT INTO `audit_log` VALUES("189","2","<b>Administrator</b> Logged onto the system","user","2017-04-19 08:55:53");
INSERT INTO `audit_log` VALUES("190","2","<b>Administrator</b> Logged out of the system","user","2017-04-19 09:10:23");
INSERT INTO `audit_log` VALUES("191","5","<b>Staff</b> Logged onto the system","user","2017-04-19 09:10:32");
INSERT INTO `audit_log` VALUES("192","5","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-04-19 09:10:52");
INSERT INTO `audit_log` VALUES("193","5","<b>Staff</b> Logged out of the system","user","2017-04-19 09:11:06");
INSERT INTO `audit_log` VALUES("194","2","<b>Administrator</b> Logged onto the system","user","2017-04-19 09:11:15");
INSERT INTO `audit_log` VALUES("195","2","<b>Administrator</b> Logged out of the system","user","2017-04-19 09:12:31");
INSERT INTO `audit_log` VALUES("196","5","<b>Staff</b> Logged onto the system","user","2017-04-19 09:12:40");
INSERT INTO `audit_log` VALUES("197","5","Table \'<b>Table - 1</b>\' has been closed ","table","2017-04-19 09:12:45");
INSERT INTO `audit_log` VALUES("198","5","Booked table Table - 1 has been occupied ","table","2017-04-19 09:13:03");
INSERT INTO `audit_log` VALUES("199","5","<b>Staff</b> Logged out of the system","user","2017-04-19 09:13:21");
INSERT INTO `audit_log` VALUES("200","5","<b>Staff</b> Logged onto the system","user","2017-04-19 09:15:55");
INSERT INTO `audit_log` VALUES("201","5","<b>Staff</b> Logged out of the system","user","2017-04-19 09:16:12");
INSERT INTO `audit_log` VALUES("202","2","<b>Administrator</b> Logged onto the system","user","2017-04-19 09:16:24");
INSERT INTO `audit_log` VALUES("203","2","<b>Administrator</b> Logged out of the system","user","2017-04-19 09:16:44");
INSERT INTO `audit_log` VALUES("204","5","<b>Staff</b> Logged onto the system","user","2017-04-19 09:16:53");
INSERT INTO `audit_log` VALUES("205","5","<b>Staff</b> Logged out of the system","user","2017-04-19 09:17:19");
INSERT INTO `audit_log` VALUES("206","2","<b>Administrator</b> Logged onto the system","user","2017-04-19 10:42:57");
INSERT INTO `audit_log` VALUES("207","2","<b>Administrator</b> Logged out of the system","user","2017-04-19 11:48:47");
INSERT INTO `audit_log` VALUES("208","5","<b>Staff</b> Logged onto the system","user","2017-04-19 11:48:58");
INSERT INTO `audit_log` VALUES("209","5","<b>Staff</b> Logged out of the system","user","2017-04-19 11:49:06");
INSERT INTO `audit_log` VALUES("210","2","<b>Administrator</b> Logged onto the system","user","2017-04-19 11:49:14");
INSERT INTO `audit_log` VALUES("211","2","<b>Administrator</b> Logged out of the system","user","2017-04-19 11:49:30");
INSERT INTO `audit_log` VALUES("212","5","<b>Staff</b> Logged onto the system","user","2017-04-19 11:49:40");
INSERT INTO `audit_log` VALUES("213","5","Table order KOT number 170419-1 has been send","order","2017-04-19 11:51:34");
INSERT INTO `audit_log` VALUES("214","5","<b>Staff</b> Logged out of the system","user","2017-04-19 12:05:09");
INSERT INTO `audit_log` VALUES("215","2","<b>Administrator</b> Logged onto the system","user","2017-04-19 12:05:20");
INSERT INTO `audit_log` VALUES("216","2","<b>Administrator</b> Logged out of the system","user","2017-04-19 12:05:45");
INSERT INTO `audit_log` VALUES("217","5","<b>Staff</b> Logged onto the system","user","2017-04-19 12:05:54");
INSERT INTO `audit_log` VALUES("218","5","<b>Staff</b> Logged out of the system","user","2017-04-19 13:07:14");
INSERT INTO `audit_log` VALUES("219","2","<b>Administrator</b> Logged onto the system","user","2017-04-19 13:07:25");
INSERT INTO `audit_log` VALUES("220","2","Sales has been returned for the invoice number - 9","order","2017-04-19 13:39:27");
INSERT INTO `audit_log` VALUES("221","2","Tip amount 20 has been distributed","tip","2017-04-19 14:33:48");
INSERT INTO `audit_log` VALUES("222","2","Table order KOT number 170419-2 has been send","order","2017-04-19 14:43:09");
INSERT INTO `audit_log` VALUES("223","2","Cash payment for table order has been made for the amount of Rs. 1815","order","2017-04-19 14:43:20");
INSERT INTO `audit_log` VALUES("224","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-04-19 14:43:21");
INSERT INTO `audit_log` VALUES("225","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-04-19 14:59:16");
INSERT INTO `audit_log` VALUES("226","2","Table order KOT number 170419-3 has been send","order","2017-04-19 15:03:56");
INSERT INTO `audit_log` VALUES("227","2","Table order KOT number 170419-4 has been send","order","2017-04-19 15:10:24");
INSERT INTO `audit_log` VALUES("228","2","Item wise payment has been made for the amount of Rs. 110","order","2017-04-19 15:10:33");
INSERT INTO `audit_log` VALUES("229","2","Advance payment has been made for the amount of Rs. 10","order","2017-04-19 15:10:45");
INSERT INTO `audit_log` VALUES("230","2","Credit item wise table order has been made for the amount of Rs. 55 on the debtor named -sugen","order","2017-04-19 15:10:59");
INSERT INTO `audit_log` VALUES("231","2","Cash payment for table order has been made for the amount of Rs. 220","order","2017-04-19 15:16:30");
INSERT INTO `audit_log` VALUES("232","2","Table order KOT number 170419-5 has been send","order","2017-04-19 15:17:10");
INSERT INTO `audit_log` VALUES("233","2","Cash payment for table order has been made for the amount of Rs. 660","order","2017-04-19 15:17:27");
INSERT INTO `audit_log` VALUES("234","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-04-19 15:17:28");
INSERT INTO `audit_log` VALUES("235","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-04-19 15:20:36");
INSERT INTO `audit_log` VALUES("236","2","Table order KOT number 170419-6 has been send","order","2017-04-19 15:20:44");
INSERT INTO `audit_log` VALUES("237","2","Cash payment for table order has been made for the amount of Rs. 220","order","2017-04-19 15:21:50");
INSERT INTO `audit_log` VALUES("238","2","Table order KOT number 170419-7 has been send","order","2017-04-19 15:22:26");
INSERT INTO `audit_log` VALUES("239","2","Cash payment for table order has been made for the amount of Rs. 110","order","2017-04-19 15:23:50");
INSERT INTO `audit_log` VALUES("240","2","Table order KOT number 170419-8 has been send","order","2017-04-19 15:27:32");
INSERT INTO `audit_log` VALUES("241","2","Cash payment for table order has been made for the amount of Rs. 220","order","2017-04-19 15:27:38");
INSERT INTO `audit_log` VALUES("242","2","Table order KOT number 170419-9 has been send","order","2017-04-19 15:27:50");
INSERT INTO `audit_log` VALUES("243","2","Cash payment for table order has been made for the amount of Rs. 220","order","2017-04-19 15:28:00");
INSERT INTO `audit_log` VALUES("244","2","Table order KOT number 170419-10 has been send","order","2017-04-19 15:28:13");
INSERT INTO `audit_log` VALUES("245","2","Cash payment for table order has been made for the amount of Rs. 220","order","2017-04-19 15:28:26");
INSERT INTO `audit_log` VALUES("246","2","Table order KOT number 170419-11 has been send","order","2017-04-19 15:29:00");
INSERT INTO `audit_log` VALUES("247","2","Cash payment for table order has been made for the amount of Rs. 110","order","2017-04-19 15:29:10");
INSERT INTO `audit_log` VALUES("248","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-04-19 15:29:11");
INSERT INTO `audit_log` VALUES("249","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-04-19 15:29:18");
INSERT INTO `audit_log` VALUES("250","2","Table order KOT number 170419-12 has been send","order","2017-04-19 15:29:24");
INSERT INTO `audit_log` VALUES("251","2","Take away order KOT 170419-13 has been send","order","2017-04-19 15:45:57");
INSERT INTO `audit_log` VALUES("252","2","Take away order KOT 170419-14 has been send","order","2017-04-19 15:46:09");
INSERT INTO `audit_log` VALUES("253","2","Take away order KOT 170419-15 has been send","order","2017-04-19 15:49:48");
INSERT INTO `audit_log` VALUES("254","2","Take away order KOT 170419-16 has been send","order","2017-04-19 15:49:57");
INSERT INTO `audit_log` VALUES("255","2","New setting has been added of field name = vat rate and value = 13","setting","2017-04-19 16:44:35");
INSERT INTO `audit_log` VALUES("256","2","Take away order KOT 170419-17 has been send","order","2017-04-19 18:02:58");
INSERT INTO `audit_log` VALUES("257","5","<b>Staff</b> Logged out of the system","user","2017-04-20 12:37:42");
INSERT INTO `audit_log` VALUES("258","2","<b>Administrator</b> Logged onto the system","user","2017-04-20 12:37:54");
INSERT INTO `audit_log` VALUES("259","2","Take away order KOT 170420-1 has been send","order","2017-04-20 12:47:48");
INSERT INTO `audit_log` VALUES("260","2","Take away order KOT 170420-2 has been send","order","2017-04-20 12:51:47");
INSERT INTO `audit_log` VALUES("261","2","Cash payment for table order has been made for the amount of Rs. 124","order","2017-04-20 13:25:01");
INSERT INTO `audit_log` VALUES("262","2","Table order KOT number 170420-3 has been send","order","2017-04-20 13:25:55");
INSERT INTO `audit_log` VALUES("263","2","Table order KOT number 170420-4 has been send","order","2017-04-20 14:03:59");
INSERT INTO `audit_log` VALUES("264","2","Item wise payment has been made for the amount of Rs. 124","order","2017-04-20 14:05:27");
INSERT INTO `audit_log` VALUES("265","2","Cash payment for table order has been made for the amount of Rs. 497","order","2017-04-20 14:07:29");
INSERT INTO `audit_log` VALUES("266","2","Table order KOT number 170420-5 has been send","order","2017-04-20 14:32:54");
INSERT INTO `audit_log` VALUES("267","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-04-20 15:29:39");
INSERT INTO `audit_log` VALUES("268","2","Cash payment for table order has been made for the amount of Rs. 497","order","2017-04-20 15:29:39");
INSERT INTO `audit_log` VALUES("269","2","Cash payment for take away order has been made for the amount of Rs. 124","order","2017-04-20 15:29:53");
INSERT INTO `audit_log` VALUES("270","2","Sales has been returned for the invoice number - 1","order","2017-04-20 15:47:57");
INSERT INTO `audit_log` VALUES("271","2","Sales has been returned for the invoice number - 2","order","2017-04-20 15:50:24");
INSERT INTO `audit_log` VALUES("272","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-04-20 16:44:45");
INSERT INTO `audit_log` VALUES("273","2","Table order KOT number 170420-6 has been send","order","2017-04-20 16:44:56");
INSERT INTO `audit_log` VALUES("274","2","Item wise payment has been made for the amount of Rs. 249","order","2017-04-20 16:45:03");
INSERT INTO `audit_log` VALUES("275","2","Cash payment for table order has been made for the amount of Rs. 373","order","2017-04-20 16:45:14");
INSERT INTO `audit_log` VALUES("276","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-04-20 16:45:15");
INSERT INTO `audit_log` VALUES("277","2","Take away order KOT 170420-7 has been send","order","2017-04-20 16:54:01");
INSERT INTO `audit_log` VALUES("278","2","Cash payment for delivery order has been made for the amount of Rs. 746","order","2017-04-20 17:03:25");
INSERT INTO `audit_log` VALUES("279","2","Cash payment for delivery order has been made for the amount of Rs. 746","order","2017-04-20 17:07:12");
INSERT INTO `audit_log` VALUES("280","2","Cash payment for delivery charge has been made for the amount of Rs. 87","order","2017-04-20 17:07:13");
INSERT INTO `audit_log` VALUES("281","2","Take away order KOT 170420-8 has been send","order","2017-04-20 17:08:45");
INSERT INTO `audit_log` VALUES("282","2","Cash payment for delivery order has been made for the amount of Rs. 249","order","2017-04-20 17:08:56");
INSERT INTO `audit_log` VALUES("283","2","Cash payment for delivery charge has been made for the amount of Rs. 174","order","2017-04-20 17:08:57");
INSERT INTO `audit_log` VALUES("284","2","Take away order KOT 170420-9 has been send","order","2017-04-20 17:15:13");
INSERT INTO `audit_log` VALUES("285","2","Cash payment for delivery order has been made for the amount of Rs. 622","order","2017-04-20 17:15:32");
INSERT INTO `audit_log` VALUES("286","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-04-20 17:23:11");
INSERT INTO `audit_log` VALUES("287","2","Table order KOT number 170420-10 has been send","order","2017-04-20 17:23:19");
INSERT INTO `audit_log` VALUES("288","2","<b>Administrator</b> Logged onto the system","user","2017-04-21 08:04:19");
INSERT INTO `audit_log` VALUES("289","2","Credit item wise table order has been made for the amount of Rs. 249 on the debtor named -sugen","order","2017-04-21 08:22:33");
INSERT INTO `audit_log` VALUES("290","2","Cash payment for table order has been made for the amount of Rs. 746","order","2017-04-21 08:22:45");
INSERT INTO `audit_log` VALUES("291","2","Table order KOT number 170421-1 has been send","order","2017-04-21 08:23:29");
INSERT INTO `audit_log` VALUES("292","2","Credit item wise table order has been made for the amount of Rs. 497 on the debtor named -sugen","order","2017-04-21 08:23:47");
INSERT INTO `audit_log` VALUES("293","2","Cash payment for table order has been made for the amount of Rs. 746","order","2017-04-21 08:23:55");
INSERT INTO `audit_log` VALUES("294","2","Table order KOT number 170421-2 has been send","order","2017-04-21 08:33:58");
INSERT INTO `audit_log` VALUES("295","2","Cash payment for table order has been made for the amount of Rs. 497","order","2017-04-21 08:34:04");
INSERT INTO `audit_log` VALUES("296","2","<b>Administrator</b> Logged out of the system","user","2017-04-21 13:43:35");
INSERT INTO `audit_log` VALUES("297","2","<b>Administrator</b> Logged onto the system","user","2017-04-21 13:43:46");
INSERT INTO `audit_log` VALUES("298","2","Table order KOT number 170421-3 has been send","order","2017-04-21 13:44:30");
INSERT INTO `audit_log` VALUES("299","2","<b>Administrator</b> Logged out of the system","user","2017-04-21 14:21:25");
INSERT INTO `audit_log` VALUES("300","2","<b>Administrator</b> Logged onto the system","user","2017-04-21 14:21:34");
INSERT INTO `audit_log` VALUES("301","2","<b>Administrator</b> Logged onto the system","user","2017-04-23 15:01:14");
INSERT INTO `audit_log` VALUES("302","2","Credit item wise table order has been made for the amount of Rs. 249 on the debtor named -sugen","order","2017-04-23 15:02:56");
INSERT INTO `audit_log` VALUES("303","2","Cash payment for table order has been made for the amount of Rs. 746","order","2017-04-23 15:03:08");
INSERT INTO `audit_log` VALUES("304","2","Table order KOT number 170423-1 has been send","order","2017-04-23 15:05:44");
INSERT INTO `audit_log` VALUES("305","2","Cash payment for table order has been made for the amount of Rs. 249","order","2017-04-23 15:05:51");
INSERT INTO `audit_log` VALUES("306","2","Table order KOT number 170423-2 has been send","order","2017-04-23 16:53:55");
INSERT INTO `audit_log` VALUES("307","2","Item wise payment has been made for the amount of Rs. 124","order","2017-04-23 16:54:12");
INSERT INTO `audit_log` VALUES("308","2","Cash payment for table order has been made for the amount of Rs. 497","order","2017-04-23 17:05:03");
INSERT INTO `audit_log` VALUES("309","2","Table order KOT number 170423-3 has been send","order","2017-04-23 17:05:17");
INSERT INTO `audit_log` VALUES("310","2","Credit item wise table order has been made for the amount of Rs. 249 on the debtor named -sugen","order","2017-04-23 17:05:34");
INSERT INTO `audit_log` VALUES("311","2","Item wise payment has been made for the amount of Rs. 124","order","2017-04-23 17:05:50");
INSERT INTO `audit_log` VALUES("312","2","Cash payment for table order has been made for the amount of Rs. 497","order","2017-04-23 17:06:04");
INSERT INTO `audit_log` VALUES("313","2","Table order KOT number 170423-4 has been send","order","2017-04-23 17:16:58");
INSERT INTO `audit_log` VALUES("314","2","Item wise payment has been made for the amount of Rs. 249","order","2017-04-23 17:17:05");
INSERT INTO `audit_log` VALUES("315","2","Credit table order has been made for the amount of Rs. 497 on the debtor named -sugen","order","2017-04-23 17:17:18");
INSERT INTO `audit_log` VALUES("316","2","Table order KOT number 170423-5 has been send","order","2017-04-23 17:32:09");
INSERT INTO `audit_log` VALUES("317","2","Item wise payment has been made for the amount of Rs. 249","order","2017-04-23 17:32:20");
INSERT INTO `audit_log` VALUES("318","2","Credit table order has been made for the amount of Rs. 994 on the debtor named -sugen","order","2017-04-23 17:32:34");
INSERT INTO `audit_log` VALUES("319","2","Table order KOT number 170423-6 has been send","order","2017-04-23 18:19:43");
INSERT INTO `audit_log` VALUES("320","2","Credit item wise table order has been made for the amount of Rs. 124 on the debtor named -sugen","order","2017-04-23 18:20:18");
INSERT INTO `audit_log` VALUES("321","2","Cash payment for table order has been made for the amount of Rs. 497","order","2017-04-23 18:20:27");
INSERT INTO `audit_log` VALUES("322","2","Table order KOT number 170423-7 has been send","order","2017-04-23 18:21:41");
INSERT INTO `audit_log` VALUES("323","2","Item wise payment has been made for the amount of Rs. 249","order","2017-04-23 18:21:49");
INSERT INTO `audit_log` VALUES("324","2","Credit table order has been made for the amount of Rs. 497 on the debtor named -sugen","order","2017-04-23 18:22:03");
INSERT INTO `audit_log` VALUES("325","2","<b>Administrator</b> Logged onto the system","user","2017-04-24 10:21:48");
INSERT INTO `audit_log` VALUES("326","2","Table order KOT number 170424-1 has been send","order","2017-04-24 11:35:15");
INSERT INTO `audit_log` VALUES("327","2","Advance payment has been made for the amount of Rs. 100","order","2017-04-24 11:35:24");
INSERT INTO `audit_log` VALUES("328","2","Credit item wise table order has been made for the amount of Rs. 124 on the debtor named -sugen","order","2017-04-24 11:36:50");
INSERT INTO `audit_log` VALUES("329","2","Cash payment for table order has been made for the amount of Rs. 249","order","2017-04-24 11:42:24");
INSERT INTO `audit_log` VALUES("330","2","Table order KOT number 170424-2 has been send","order","2017-04-24 11:46:52");
INSERT INTO `audit_log` VALUES("331","2","Table order KOT number 170424-3 has been send","order","2017-04-24 11:49:22");
INSERT INTO `audit_log` VALUES("332","2","Advance payment has been made for the amount of Rs. 100","order","2017-04-24 11:49:30");
INSERT INTO `audit_log` VALUES("333","2","Credit item wise table order has been made for the amount of Rs. 124 on the debtor named -sugen","order","2017-04-24 11:49:53");
INSERT INTO `audit_log` VALUES("334","2","Cash payment for table order has been made for the amount of Rs. 497","order","2017-04-24 11:50:06");
INSERT INTO `audit_log` VALUES("335","2","Debtor named -sugen paid the amount of Rs. 100","debtor","2017-04-24 12:16:01");
INSERT INTO `audit_log` VALUES("336","2","Table order KOT number 170424-4 has been send","order","2017-04-24 12:22:27");
INSERT INTO `audit_log` VALUES("337","2","Advance payment has been made for the amount of Rs. 100","order","2017-04-24 12:22:39");
INSERT INTO `audit_log` VALUES("338","2","Item wise payment has been made for the amount of Rs. 124","order","2017-04-24 12:22:51");
INSERT INTO `audit_log` VALUES("339","2","Credit table order has been made for the amount of Rs. 746 on the debtor named -sugen","order","2017-04-24 12:23:05");
INSERT INTO `audit_log` VALUES("340","2","Debtor named -sugen paid the amount of Rs. 500","debtor","2017-04-24 12:24:03");
INSERT INTO `audit_log` VALUES("341","2","Debtor named -sugen paid the amount of Rs. 100","debtor","2017-04-24 12:24:15");
INSERT INTO `audit_log` VALUES("342","2","Table order KOT number 170424-5 has been send","order","2017-04-24 12:26:31");
INSERT INTO `audit_log` VALUES("343","2","Take away order KOT 170424-6 has been send","order","2017-04-24 13:56:59");
INSERT INTO `audit_log` VALUES("344","2","Cash payment for delivery order has been made for the amount of Rs. 124","order","2017-04-24 13:58:09");
INSERT INTO `audit_log` VALUES("345","2","Cash payment for delivery order has been made for the amount of Rs. 124","order","2017-04-24 13:58:52");
INSERT INTO `audit_log` VALUES("346","2","Take away order KOT 170424-7 has been send","order","2017-04-24 14:12:05");
INSERT INTO `audit_log` VALUES("347","2","Advance payment has been made for the amount of Rs. 100","order","2017-04-24 14:12:20");
INSERT INTO `audit_log` VALUES("348","2","Item wise payment has been made for the amount of Rs. 124","order","2017-04-24 14:12:34");
INSERT INTO `audit_log` VALUES("349","2","Cash payment for delivery order has been made for the amount of Rs. 497","order","2017-04-24 14:16:58");
INSERT INTO `audit_log` VALUES("350","2","<b>Administrator</b> Logged out of the system","user","2017-04-24 15:10:47");
INSERT INTO `audit_log` VALUES("351","2","<b>Administrator</b> Logged onto the system","user","2017-04-24 15:10:59");
INSERT INTO `audit_log` VALUES("352","2","Credit table order has been made for the amount of Rs. 249 on the debtor named -sugen","order","2017-04-24 15:11:36");
INSERT INTO `audit_log` VALUES("353","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-04-24 15:11:52");
INSERT INTO `audit_log` VALUES("354","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-04-24 15:12:45");
INSERT INTO `audit_log` VALUES("355","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-04-24 15:13:35");
INSERT INTO `audit_log` VALUES("356","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-04-24 15:15:07");
INSERT INTO `audit_log` VALUES("357","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-04-24 15:15:25");
INSERT INTO `audit_log` VALUES("358","2","Debtor named -sugen paid the amount of Rs. 100","debtor","2017-04-24 15:25:26");
INSERT INTO `audit_log` VALUES("359","2","<b>Administrator</b> Logged out of the system","user","2017-04-24 16:36:04");
INSERT INTO `audit_log` VALUES("360","2","<b>Administrator</b> Logged onto the system","user","2017-04-24 16:36:14");
INSERT INTO `audit_log` VALUES("361","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-04-24 16:36:27");
INSERT INTO `audit_log` VALUES("362","2","Table order KOT number 170424-8 has been send","order","2017-04-24 16:36:43");
INSERT INTO `audit_log` VALUES("363","2","Advance payment has been made for the amount of Rs. 100","order","2017-04-24 16:37:37");
INSERT INTO `audit_log` VALUES("364","2","Item wise payment has been made for the amount of Rs. 124","order","2017-04-24 16:38:18");
INSERT INTO `audit_log` VALUES("365","2","Advance payment has been made for the amount of Rs. 100","order","2017-04-24 16:42:49");
INSERT INTO `audit_log` VALUES("366","2","Item wise payment has been made for the amount of Rs. 124","order","2017-04-24 16:43:04");
INSERT INTO `audit_log` VALUES("367","2","Cash payment for table order has been made for the amount of Rs. 497","order","2017-04-24 16:43:55");
INSERT INTO `audit_log` VALUES("368","2","Table order KOT number 170424-9 has been send","order","2017-04-24 16:44:59");
INSERT INTO `audit_log` VALUES("369","2","Cash payment for table order has been made for the amount of Rs. 497","order","2017-04-24 16:45:10");
INSERT INTO `audit_log` VALUES("370","2","Table order KOT number 170424-10 has been send","order","2017-04-24 16:48:42");
INSERT INTO `audit_log` VALUES("371","2","Cash payment for table order has been made for the amount of Rs. 497","order","2017-04-24 16:51:58");
INSERT INTO `audit_log` VALUES("372","2","Table order KOT number 170424-11 has been send","order","2017-04-24 16:53:01");
INSERT INTO `audit_log` VALUES("373","2","Cash payment for table order has been made for the amount of Rs. 497","order","2017-04-24 16:53:16");
INSERT INTO `audit_log` VALUES("374","2","Table order KOT number 170424-12 has been send","order","2017-04-24 16:53:53");
INSERT INTO `audit_log` VALUES("375","2","Advance payment has been made for the amount of Rs. 100","order","2017-04-24 16:54:02");
INSERT INTO `audit_log` VALUES("376","2","Item wise payment has been made for the amount of Rs. 124","order","2017-04-24 16:54:15");
INSERT INTO `audit_log` VALUES("377","2","Cash payment for table order has been made for the amount of Rs. 497","order","2017-04-24 16:54:25");
INSERT INTO `audit_log` VALUES("378","2","Table order KOT number 170424-13 has been send","order","2017-04-24 17:00:25");
INSERT INTO `audit_log` VALUES("379","2","Advance payment has been made for the amount of Rs. 100","order","2017-04-24 17:00:32");
INSERT INTO `audit_log` VALUES("380","2","Item wise payment has been made for the amount of Rs. 124","order","2017-04-24 17:00:54");
INSERT INTO `audit_log` VALUES("381","2","Cash payment for table order has been made for the amount of Rs. 497","order","2017-04-24 17:01:22");
INSERT INTO `audit_log` VALUES("382","2","Table order KOT number 170424-14 has been send","order","2017-04-24 17:04:35");
INSERT INTO `audit_log` VALUES("383","2","Advance payment has been made for the amount of Rs. 100","order","2017-04-24 17:04:41");
INSERT INTO `audit_log` VALUES("384","2","Item wise payment has been made for the amount of Rs. 124","order","2017-04-24 17:04:53");
INSERT INTO `audit_log` VALUES("385","2","Cash payment for table order has been made for the amount of Rs. 497","order","2017-04-24 17:07:32");
INSERT INTO `audit_log` VALUES("386","2","<b>Administrator</b> Logged onto the system","user","2017-04-25 08:09:07");
INSERT INTO `audit_log` VALUES("387","2","Table order KOT number 170425-1 has been send","order","2017-04-25 08:11:38");
INSERT INTO `audit_log` VALUES("388","2","Advance payment has been made for the amount of Rs. 100","order","2017-04-25 08:12:00");
INSERT INTO `audit_log` VALUES("389","2","Item wise payment has been made for the amount of Rs. 124","order","2017-04-25 08:12:17");
INSERT INTO `audit_log` VALUES("390","2","Cash payment for table order has been made for the amount of Rs. 622","order","2017-04-25 08:12:27");
INSERT INTO `audit_log` VALUES("391","2","Table order KOT number 170425-2 has been send","order","2017-04-25 08:13:16");
INSERT INTO `audit_log` VALUES("392","2","Item wise payment has been made for the amount of Rs. 124","order","2017-04-25 08:13:25");
INSERT INTO `audit_log` VALUES("393","2","Credit table order has been made for the amount of Rs. 497 on the debtor named -sugen","order","2017-04-25 08:13:37");
INSERT INTO `audit_log` VALUES("394","2","Sales has been returned for the invoice number - 26","order","2017-04-25 08:21:07");
INSERT INTO `audit_log` VALUES("395","2","Table order KOT number 170425-3 has been send","order","2017-04-25 08:24:02");
INSERT INTO `audit_log` VALUES("396","2","Item wise payment has been made for the amount of Rs. 124","order","2017-04-25 08:24:15");
INSERT INTO `audit_log` VALUES("397","2","Credit table order has been made for the amount of Rs. 497 on the debtor named -sugen","order","2017-04-25 08:24:28");
INSERT INTO `audit_log` VALUES("398","2","Sales has been returned for the invoice number - 25","order","2017-04-25 08:33:55");
INSERT INTO `audit_log` VALUES("399","2","Sales has been returned for the invoice number - 27","order","2017-04-25 08:34:21");
INSERT INTO `audit_log` VALUES("400","2","Table order KOT number 170425-4 has been send","order","2017-04-25 08:39:19");
INSERT INTO `audit_log` VALUES("401","2","Credit item wise table order has been made for the amount of Rs. 249 on the debtor named -sugen","order","2017-04-25 08:39:34");
INSERT INTO `audit_log` VALUES("402","2","Item wise payment has been made for the amount of Rs. 124","order","2017-04-25 08:39:45");
INSERT INTO `audit_log` VALUES("403","2","Credit table order has been made for the amount of Rs. 497 on the debtor named -sugen","order","2017-04-25 08:39:57");
INSERT INTO `audit_log` VALUES("404","2","<b>Administrator</b> Logged onto the system","user","2017-04-25 10:40:48");
INSERT INTO `audit_log` VALUES("405","2","<b>Administrator</b> Logged onto the system","user","2017-04-25 18:39:03");
INSERT INTO `audit_log` VALUES("406","2","New table has been created named Table - 4","table","2017-04-25 18:42:31");
INSERT INTO `audit_log` VALUES("407","2","New table has been created named Table - 5","table","2017-04-25 18:42:33");
INSERT INTO `audit_log` VALUES("408","2","Table \'<b>Table - 4</b>\' has been occupied ","table","2017-04-25 18:43:01");
INSERT INTO `audit_log` VALUES("409","2","Table order KOT number 170425-5 has been send","order","2017-04-25 18:43:42");
INSERT INTO `audit_log` VALUES("410","2","Table order KOT number 170425-6 has been send","order","2017-04-25 18:44:03");
INSERT INTO `audit_log` VALUES("411","2","Table \'<b>Table - 2</b>\' has been occupied ","table","2017-04-25 18:45:29");
INSERT INTO `audit_log` VALUES("412","2","Table order KOT number 170425-7 has been send","order","2017-04-25 18:47:05");
INSERT INTO `audit_log` VALUES("413","2","New table has been created named Table - 6","table","2017-04-25 18:57:29");
INSERT INTO `audit_log` VALUES("414","2","New obstacle has been created named -Obstacle - 1 on the floor no. 1","table","2017-04-25 18:57:38");
INSERT INTO `audit_log` VALUES("415","2","<b>Administrator</b> Logged out of the system","user","2017-04-26 10:58:03");
INSERT INTO `audit_log` VALUES("416","2","<b>Administrator</b> Logged out of the system","user","2017-04-27 10:40:17");
INSERT INTO `audit_log` VALUES("417","2","<b>Administrator</b> Logged onto the system","user","2017-04-27 10:40:28");
INSERT INTO `audit_log` VALUES("418","2","Cash payment for table order has been made for the amount of Rs. 746","order","2017-04-27 10:55:04");
INSERT INTO `audit_log` VALUES("419","2","Table \'<b>Table - 2</b>\' has been closed ","table","2017-04-27 10:55:20");
INSERT INTO `audit_log` VALUES("420","2","Cash payment for table order has been made for the amount of Rs. 435","order","2017-04-27 10:55:57");
INSERT INTO `audit_log` VALUES("421","2","Table order KOT number 170427-1 has been send","order","2017-04-27 10:58:01");
INSERT INTO `audit_log` VALUES("422","2","Cash payment for table order has been made for the amount of Rs. 249","order","2017-04-27 10:58:08");
INSERT INTO `audit_log` VALUES("423","2","<b>Administrator</b> Logged out of the system","user","2017-04-27 11:38:16");
INSERT INTO `audit_log` VALUES("424","2","<b>Administrator</b> Logged onto the system","user","2017-04-27 11:38:32");
INSERT INTO `audit_log` VALUES("425","2","Table order KOT number 170427-2 has been send","order","2017-04-27 11:45:42");
INSERT INTO `audit_log` VALUES("426","2","<b>Administrator</b> Logged out of the system","user","2017-04-27 14:52:36");
INSERT INTO `audit_log` VALUES("427","2","<b>Administrator</b> Logged onto the system","user","2017-04-27 14:52:54");
INSERT INTO `audit_log` VALUES("428","2","<b>Administrator</b> Logged onto the system","user","2017-04-30 11:57:23");
INSERT INTO `audit_log` VALUES("429","2","<b>Administrator</b> Logged onto the system","user","2017-05-02 10:36:13");
INSERT INTO `audit_log` VALUES("430","2","Table \'<b>Table - 4</b>\' has been closed ","table","2017-05-02 10:52:36");
INSERT INTO `audit_log` VALUES("431","2","<b>Administrator</b> Logged onto the system","user","2017-05-08 11:26:33");
INSERT INTO `audit_log` VALUES("432","2","<b>Administrator</b> Logged out of the system","user","2017-05-08 13:23:24");
INSERT INTO `audit_log` VALUES("433","2","<b>Administrator</b> Logged onto the system","user","2017-05-08 13:23:35");
INSERT INTO `audit_log` VALUES("434","2","Table order KOT number 170508-1 has been send","order","2017-05-08 13:23:54");
INSERT INTO `audit_log` VALUES("435","2","Database has been backuped by the user <b>Administrator</b>","database","2017-05-10 10:47:39");
INSERT INTO `audit_log` VALUES("436","2","<b>Administrator</b> Logged out of the system","user","2017-05-10 10:47:41");
INSERT INTO `audit_log` VALUES("437","2","<b>Administrator</b> Logged onto the system","user","2017-05-10 10:49:46");
INSERT INTO `audit_log` VALUES("438","2","Database has been backuped by the user <b>Administrator</b>","database","2017-05-10 10:49:54");
INSERT INTO `audit_log` VALUES("439","2","<b>Administrator</b> Logged out of the system","user","2017-05-10 10:49:55");
INSERT INTO `audit_log` VALUES("440","2","Database has been backuped by the user <b>Administrator</b>","database","2017-05-10 10:50:13");
INSERT INTO `audit_log` VALUES("441","2","<b>Administrator</b> Logged out of the system","user","2017-05-10 10:50:14");
INSERT INTO `audit_log` VALUES("442","2","<b>Administrator</b> Logged onto the system","user","2017-05-10 10:57:19");
INSERT INTO `audit_log` VALUES("443","2","<b>Administrator</b> Logged onto the system","user","2017-05-10 10:58:54");
INSERT INTO `audit_log` VALUES("444","2","<b>Administrator</b> Logged onto the system","user","2017-05-10 12:10:28");
INSERT INTO `audit_log` VALUES("445","2","<b>Administrator</b> Logged out of the system","user","2017-05-10 12:30:51");
INSERT INTO `audit_log` VALUES("446","2","<b>Administrator</b> Logged onto the system","user","2017-05-10 12:31:18");
INSERT INTO `audit_log` VALUES("447","2","<b>Administrator</b> Logged out of the system","user","2017-05-10 12:35:20");
INSERT INTO `audit_log` VALUES("448","2","<b>Administrator</b> Logged onto the system","user","2017-05-10 12:43:29");
INSERT INTO `audit_log` VALUES("449","2","<b>Administrator</b> Logged out of the system","user","2017-05-10 12:48:59");
INSERT INTO `audit_log` VALUES("450","2","<b>Administrator</b> Logged onto the system","user","2017-05-10 12:49:09");
INSERT INTO `audit_log` VALUES("451","2","<b>Administrator</b> Logged out of the system","user","2017-05-10 12:52:02");
INSERT INTO `audit_log` VALUES("452","2","<b>Administrator</b> Logged onto the system","user","2017-05-10 12:52:41");
INSERT INTO `audit_log` VALUES("453","2","<b>Administrator</b> Logged onto the system","user","2017-05-10 12:58:05");
INSERT INTO `audit_log` VALUES("454","2","<b>Administrator</b> Logged onto the system","user","2017-05-10 12:58:08");
INSERT INTO `audit_log` VALUES("455","2","New obstacle has been created named -Obstacle - 2 on the floor no. 1","table","2017-05-10 13:02:26");
INSERT INTO `audit_log` VALUES("456","2","<b>Administrator</b> Logged onto the system","user","2017-05-10 13:03:50");
INSERT INTO `audit_log` VALUES("457","2","<b>Administrator</b> Logged onto the system","user","2017-05-10 13:03:53");
INSERT INTO `audit_log` VALUES("458","2","Floor has been added","table","2017-05-10 13:04:12");
INSERT INTO `audit_log` VALUES("459","2","Floor has been added","table","2017-05-10 13:04:39");
INSERT INTO `audit_log` VALUES("460","2","<b>Administrator</b> Logged out of the system","user","2017-05-10 13:05:38");
INSERT INTO `audit_log` VALUES("461","2","<b>Administrator</b> Logged onto the system","user","2017-05-10 13:05:49");
INSERT INTO `audit_log` VALUES("462","2","<b>Administrator</b> Logged out of the system","user","2017-05-10 13:07:31");
INSERT INTO `audit_log` VALUES("463","2","<b>Administrator</b> Logged onto the system","user","2017-05-10 13:07:55");
INSERT INTO `audit_log` VALUES("464","2","<b>Administrator</b> Logged onto the system","user","2017-05-10 13:07:58");
INSERT INTO `audit_log` VALUES("465","2","Floor has been added","table","2017-05-10 13:09:36");
INSERT INTO `audit_log` VALUES("466","2","<b>Administrator</b> Logged onto the system","user","2017-05-10 14:47:41");
INSERT INTO `audit_log` VALUES("467","2","<b>Administrator</b> Logged onto the system","user","2017-05-10 14:47:44");
INSERT INTO `audit_log` VALUES("468","2","<b>Administrator</b> Logged onto the system","user","2017-05-10 15:29:15");
INSERT INTO `audit_log` VALUES("469","2","<b>Administrator</b> Logged out of the system","user","2017-05-11 10:54:43");
INSERT INTO `audit_log` VALUES("470","2","<b>Administrator</b> Logged onto the system","user","2017-05-11 10:54:53");
INSERT INTO `audit_log` VALUES("471","2","<b>Administrator</b> Logged onto the system","user","2017-05-11 14:12:00");
INSERT INTO `audit_log` VALUES("472","2","<b>Administrator</b> Logged onto the system","user","2017-05-11 16:33:07");
INSERT INTO `audit_log` VALUES("473","2","Database has been backuped by the user <b>Administrator</b>","database","2017-05-11 16:39:25");
INSERT INTO `audit_log` VALUES("474","2","Deleted profile picture of the user -Administrator\'administrator","user","2017-05-11 16:39:47");
INSERT INTO `audit_log` VALUES("475","2","Uploaded profile picture of the user -Administrator\'administrator","user","2017-05-11 16:40:18");
INSERT INTO `audit_log` VALUES("476","2","Table order KOT number 170511-1 has been send","order","2017-05-11 16:41:16");
INSERT INTO `audit_log` VALUES("477","2","<b>Administrator</b> Logged onto the system","user","2017-05-11 16:44:56");
INSERT INTO `audit_log` VALUES("478","2","<b>Administrator</b> Logged onto the system","user","2017-05-11 16:49:20");
INSERT INTO `audit_log` VALUES("479","2","Database has been backuped by the user <b>Administrator</b>","database","2017-05-11 16:49:58");
INSERT INTO `audit_log` VALUES("480","2","<b>Administrator</b> Logged out of the system","user","2017-05-11 16:49:59");
INSERT INTO `audit_log` VALUES("481","2","<b>Administrator</b> Logged onto the system","user","2017-05-11 16:56:00");
INSERT INTO `audit_log` VALUES("482","2","Table order KOT number 170511-2 has been send","order","2017-05-11 16:57:59");
INSERT INTO `audit_log` VALUES("483","2","Table order KOT number 170511-3 has been send","order","2017-05-11 16:59:19");
INSERT INTO `audit_log` VALUES("484","2","<b>Administrator</b> Logged onto the system","user","2017-05-15 10:45:56");
INSERT INTO `audit_log` VALUES("485","2","<b>Administrator</b> Logged out of the system","user","2017-05-15 10:51:13");
INSERT INTO `audit_log` VALUES("486","2","<b>Administrator</b> Logged onto the system","user","2017-05-15 10:51:23");
INSERT INTO `audit_log` VALUES("487","2","Table order KOT number 170515-1 has been send","order","2017-05-15 10:59:12");
INSERT INTO `audit_log` VALUES("488","2","<b>Administrator</b> Logged out of the system","user","2017-05-15 12:34:37");
INSERT INTO `audit_log` VALUES("489","2","<b>Administrator</b> Logged onto the system","user","2017-05-15 12:34:48");
INSERT INTO `audit_log` VALUES("490","2","Take away order KOT 170515-2 has been send","order","2017-05-15 12:35:09");
INSERT INTO `audit_log` VALUES("491","2","Credit delivery order has been made for the amount of Rs.249 on the debtor named -sugen","order","2017-05-15 12:36:36");
INSERT INTO `audit_log` VALUES("492","2","<b>Administrator</b> Logged out of the system","user","2017-05-15 16:10:24");
INSERT INTO `audit_log` VALUES("493","2","<b>Administrator</b> Logged onto the system","user","2017-05-15 16:10:34");
INSERT INTO `audit_log` VALUES("494","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-05-15 16:20:59");
INSERT INTO `audit_log` VALUES("495","2","Cash payment for table order has been made for the amount of Rs. 1181","order","2017-05-15 16:20:59");
INSERT INTO `audit_log` VALUES("496","2","Table \'<b>Table - 4</b>\' has been occupied ","table","2017-05-15 16:21:35");
INSERT INTO `audit_log` VALUES("497","2","Table order KOT number 170515-3 has been send","order","2017-05-15 16:21:45");
INSERT INTO `audit_log` VALUES("498","2","Item wise payment has been made for the amount of Rs. 124","order","2017-05-15 16:21:56");
INSERT INTO `audit_log` VALUES("499","2","Credit item wise table order has been made for the amount of Rs. 124 on the debtor named -sugen","order","2017-05-15 16:22:17");
INSERT INTO `audit_log` VALUES("500","2","Credit table order has been made for the amount of Rs. 622 on the debtor named -sugen","order","2017-05-15 16:22:34");
INSERT INTO `audit_log` VALUES("501","2","Table \'<b>Table - 4</b>\' has been closed ","table","2017-05-15 16:22:36");
INSERT INTO `audit_log` VALUES("502","2","<b>Administrator</b> Logged out of the system","user","2017-05-15 17:30:05");
INSERT INTO `audit_log` VALUES("503","2","<b>Administrator</b> Logged onto the system","user","2017-05-15 17:30:16");
INSERT INTO `audit_log` VALUES("504","2","<b>Administrator</b> Logged onto the system","user","2017-05-16 10:44:04");
INSERT INTO `audit_log` VALUES("505","2","Table \'<b>Table - 6</b>\' has been occupied ","table","2017-05-16 11:11:23");
INSERT INTO `audit_log` VALUES("506","2","<b>Administrator</b> Logged out of the system","user","2017-05-16 12:50:09");
INSERT INTO `audit_log` VALUES("507","2","<b>Administrator</b> Logged onto the system","user","2017-05-16 12:50:32");
INSERT INTO `audit_log` VALUES("508","2","<b>Administrator</b> Logged onto the system","user","2017-05-16 14:46:28");
INSERT INTO `audit_log` VALUES("509","2","<b>Administrator</b> Logged onto the system","user","2017-05-16 14:50:52");
INSERT INTO `audit_log` VALUES("510","2","New debtor named -binit\' has been created","debtor","2017-05-16 15:35:53");
INSERT INTO `audit_log` VALUES("511","2","Duplicate Invoice of the original invoice number \'40\' has been printed","bill","2017-05-16 17:23:51");
INSERT INTO `audit_log` VALUES("512","2","Duplicate Invoice of the original invoice number \'40\' has been printed","bill","2017-05-16 17:23:59");
INSERT INTO `audit_log` VALUES("513","2","Duplicate Invoice of the original invoice number \'40\' has been printed","bill","2017-05-16 17:25:21");
INSERT INTO `audit_log` VALUES("514","2","Duplicate Invoice of the original invoice number \'40\' has been printed","bill","2017-05-16 17:25:25");
INSERT INTO `audit_log` VALUES("515","2","Duplicate Invoice of the original invoice number \'39\' has been printed","bill","2017-05-16 17:26:48");
INSERT INTO `audit_log` VALUES("516","2","Duplicate Invoice of the original invoice number \'39\' has been printed","bill","2017-05-16 17:26:54");
INSERT INTO `audit_log` VALUES("517","2","Duplicate Invoice of the original invoice number \'39\' has been printed","bill","2017-05-16 17:26:58");
INSERT INTO `audit_log` VALUES("518","2","<b>Administrator</b> Logged onto the system","user","2017-05-17 11:12:52");
INSERT INTO `audit_log` VALUES("519","2","Database has been backuped by the user <b>Administrator</b>","database","2017-05-17 11:28:17");
INSERT INTO `audit_log` VALUES("520","2","<b>Administrator</b> Logged out of the system","user","2017-05-17 11:28:23");
INSERT INTO `audit_log` VALUES("521","2","<b>Administrator</b> Logged onto the system","user","2017-05-17 11:45:06");
INSERT INTO `audit_log` VALUES("522","2","Database has been backuped by the user <b>Administrator</b>","database","2017-05-17 11:51:02");
INSERT INTO `audit_log` VALUES("523","2","<b>Administrator</b> Logged out of the system","user","2017-05-17 11:51:03");
INSERT INTO `audit_log` VALUES("524","2","<b>Administrator</b> Logged onto the system","user","2017-05-17 11:52:05");
INSERT INTO `audit_log` VALUES("525","2","Database has been backuped by the user <b>Administrator</b>","database","2017-05-17 11:52:19");
INSERT INTO `audit_log` VALUES("526","2","<b>Administrator</b> Logged out of the system","user","2017-05-17 11:52:20");
INSERT INTO `audit_log` VALUES("527","2","Database has been backuped by the user <b>Administrator</b>","database","2017-05-17 12:08:17");
INSERT INTO `audit_log` VALUES("528","2","<b>Administrator</b> Logged out of the system","user","2017-05-17 12:08:19");
INSERT INTO `audit_log` VALUES("529","2","<b>Administrator</b> Logged onto the system","user","2017-05-17 12:09:07");
INSERT INTO `audit_log` VALUES("530","2","Duplicate Invoice of the original invoice number \'40\' has been printed","bill","2017-05-17 13:30:16");
INSERT INTO `audit_log` VALUES("531","2","Setting has been updated from Klientscape Pvt. Ltd. to Company Name Pvt. Ltd.","setting","2017-05-17 14:16:50");
INSERT INTO `audit_log` VALUES("532","2","Setting has been updated from bishalnagar, ktm, nepal to company address","setting","2017-05-17 14:16:56");
INSERT INTO `audit_log` VALUES("533","2","Setting has been updated from 01-4425513 to company phone no.","setting","2017-05-17 14:17:04");
INSERT INTO `audit_log` VALUES("534","2","Setting has been updated from 663546515 to company vat no.","setting","2017-05-17 14:17:13");
INSERT INTO `audit_log` VALUES("535","2","<b>Administrator</b> Logged out of the system","user","2017-05-17 14:47:27");
INSERT INTO `audit_log` VALUES("536","2","<b>Administrator</b> Logged onto the system","user","2017-05-17 14:47:37");
INSERT INTO `audit_log` VALUES("537","2","<b>Administrator</b> Logged onto the system","user","2017-05-17 14:55:28");
INSERT INTO `audit_log` VALUES("538","2","<b>Administrator</b> Logged out of the system","user","2017-05-18 11:56:53");
INSERT INTO `audit_log` VALUES("539","2","<b>Administrator</b> Logged onto the system","user","2017-05-18 11:57:05");
INSERT INTO `audit_log` VALUES("540","2","<b>Administrator</b> Logged out of the system","user","2017-05-18 15:26:17");
INSERT INTO `audit_log` VALUES("541","2","<b>Administrator</b> Logged onto the system","user","2017-05-18 15:26:27");
INSERT INTO `audit_log` VALUES("542","2","<b>Administrator</b> Logged out of the system","user","2017-05-18 16:36:30");
INSERT INTO `audit_log` VALUES("543","2","<b>Administrator</b> Logged onto the system","user","2017-05-18 16:36:41");
INSERT INTO `audit_log` VALUES("544","2","Table order KOT number 170518-1 has been send","order","2017-05-18 16:37:00");
INSERT INTO `audit_log` VALUES("545","2","Invoice number 41 has been printed","bill","2017-05-18 16:37:20");
INSERT INTO `audit_log` VALUES("546","2","Credit table order has been made for the amount of Rs. 373 on the debtor named -sugen","order","2017-05-18 16:37:21");
INSERT INTO `audit_log` VALUES("547","2","Table order KOT number 170518-2 has been send","order","2017-05-18 16:37:29");
INSERT INTO `audit_log` VALUES("548","2","Invoice number 42 has been printed","bill","2017-05-18 16:37:37");
INSERT INTO `audit_log` VALUES("549","2","Cash payment for table order has been made for the amount of Rs. 249","order","2017-05-18 16:37:37");
INSERT INTO `audit_log` VALUES("550","2","Table order KOT number 170518-3 has been send","order","2017-05-18 16:37:46");
INSERT INTO `audit_log` VALUES("551","2","Invoice number 43 has been printed","bill","2017-05-18 16:38:02");
INSERT INTO `audit_log` VALUES("552","2","Invoice number 44 has been printed","bill","2017-05-18 16:38:05");
INSERT INTO `audit_log` VALUES("553","2","Table \'<b>Table - 6</b>\' has been closed ","table","2017-05-18 16:38:08");
INSERT INTO `audit_log` VALUES("554","2","Cash payment for table order has been made for the amount of Rs. 124","order","2017-05-18 16:38:10");
INSERT INTO `audit_log` VALUES("555","2","Take away order KOT 170518-4 has been send","order","2017-05-18 16:38:33");
INSERT INTO `audit_log` VALUES("556","2","Invoice number 45 has been printed","bill","2017-05-18 16:38:46");
INSERT INTO `audit_log` VALUES("557","2","Cash payment for take away order has been made for the amount of Rs. 497","order","2017-05-18 16:38:47");
INSERT INTO `audit_log` VALUES("558","2","Take away order KOT 170518-5 has been send","order","2017-05-18 16:39:07");
INSERT INTO `audit_log` VALUES("559","2","Invoice number 46 has been printed","bill","2017-05-18 16:39:35");
INSERT INTO `audit_log` VALUES("560","2","Credit take away order has been made for the amount of Rs.373 on the debtor named -sugen","order","2017-05-18 16:39:35");
INSERT INTO `audit_log` VALUES("561","2","Take away order KOT 170518-6 has been send","order","2017-05-18 16:40:33");
INSERT INTO `audit_log` VALUES("562","2","Invoice number 47 has been printed","bill","2017-05-18 16:41:26");
INSERT INTO `audit_log` VALUES("563","2","Cash payment for delivery order has been made for the amount of Rs. 373","order","2017-05-18 16:41:27");
INSERT INTO `audit_log` VALUES("564","2","Utensils item named -Utensils Item 1 has been added","misc","2017-05-22 17:42:35");
INSERT INTO `audit_log` VALUES("565","2","Utensils item named -Utensils Item 2 has been added","misc","2017-05-22 17:42:35");
INSERT INTO `audit_log` VALUES("566","2","Utensils item named -Utensils Item 3 has been added","misc","2017-05-22 17:42:35");
INSERT INTO `audit_log` VALUES("567","2","Utensils item named -Utensils Item 4 has been added","misc","2017-05-22 17:42:36");
INSERT INTO `audit_log` VALUES("568","2","<b>Administrator</b> Logged onto the system","user","2017-05-23 11:07:09");
INSERT INTO `audit_log` VALUES("569","2","<b>Administrator</b> Logged onto the system","user","2017-05-23 11:52:19");
INSERT INTO `audit_log` VALUES("570","2","Take away order KOT 170523-1 has been send","order","2017-05-23 12:03:12");
INSERT INTO `audit_log` VALUES("571","2","Invoice number 49 has been printed","bill","2017-05-23 12:05:57");
INSERT INTO `audit_log` VALUES("572","2","Credit take away order has been made for the amount of Rs.124 on the debtor named -binit","order","2017-05-23 12:05:57");
INSERT INTO `audit_log` VALUES("573","2","Table \'<b>Table - 4</b>\' has been occupied ","table","2017-05-23 12:06:28");
INSERT INTO `audit_log` VALUES("574","2","Table order KOT number 170523-2 has been send","order","2017-05-23 12:06:38");
INSERT INTO `audit_log` VALUES("575","2","New debtor named -abhijeet\' has been created","debtor","2017-05-23 12:07:57");
INSERT INTO `audit_log` VALUES("576","2","Credit item wise table order has been made for the amount of Rs. 249 on the debtor named -abhijeet","order","2017-05-23 12:08:14");
INSERT INTO `audit_log` VALUES("577","2","Advance payment has been made for the amount of Rs. 100","order","2017-05-23 12:10:30");
INSERT INTO `audit_log` VALUES("578","2","1 - stock item 1 has been sold","stock","2017-05-23 12:11:00");
INSERT INTO `audit_log` VALUES("579","2","10 - stock item 2 has been sold","stock","2017-05-23 12:11:01");
INSERT INTO `audit_log` VALUES("580","2","Invoice number 50 has been printed","bill","2017-05-23 12:11:02");
INSERT INTO `audit_log` VALUES("581","2","Cash payment for table order has been made for the amount of Rs. 746","order","2017-05-23 12:11:02");
INSERT INTO `audit_log` VALUES("582","2","Table \'<b>Table - 4</b>\' has been closed ","table","2017-05-23 12:11:03");
INSERT INTO `audit_log` VALUES("583","2","Menu item has been added","menu","2017-05-23 12:13:36");
INSERT INTO `audit_log` VALUES("584","2","New menu category has been created named -bakery","menu","2017-05-23 12:15:00");
INSERT INTO `audit_log` VALUES("585","2","Table \'<b>Table - 5</b>\' has been occupied ","table","2017-05-23 12:15:29");
INSERT INTO `audit_log` VALUES("586","2","Duplicate Invoice of the original invoice number \'50\' has been printed","bill","2017-05-23 12:19:26");
INSERT INTO `audit_log` VALUES("587","2","Debtor named -abhijeet paid the amount of Rs. 249","debtor","2017-05-23 12:22:00");
INSERT INTO `audit_log` VALUES("588","2","Utensils item named -Item 1 has been added","misc","2017-05-23 12:25:35");
INSERT INTO `audit_log` VALUES("589","2","Utensils item named -Item  2 has been added","misc","2017-05-23 12:25:35");
INSERT INTO `audit_log` VALUES("590","2","Utensils item named -Item 3 has been added","misc","2017-05-23 12:25:35");
INSERT INTO `audit_log` VALUES("591","2","Product named -Stock Item 7 has been added","misc","2017-05-23 12:29:50");
INSERT INTO `audit_log` VALUES("592","2","Menu item has been added","menu","2017-05-23 12:32:14");
INSERT INTO `audit_log` VALUES("593","2","Database has been backuped by the user <b>Administrator</b>","database","2017-05-23 12:38:50");
INSERT INTO `audit_log` VALUES("594","2","<b>Administrator</b> Logged out of the system","user","2017-05-23 12:38:51");
INSERT INTO `audit_log` VALUES("595","2","<b>Administrator</b> Logged onto the system","user","2017-05-23 12:42:57");
INSERT INTO `audit_log` VALUES("596","2","Table \'<b>Table - 2</b>\' has been occupied ","table","2017-05-23 12:46:09");
INSERT INTO `audit_log` VALUES("597","2","New table has been created named Table - 7","table","2017-05-23 12:48:29");
INSERT INTO `audit_log` VALUES("598","2","New table has been created named Table - 8","table","2017-05-23 12:48:33");
INSERT INTO `audit_log` VALUES("599","2","New table has been created named Table - 9","table","2017-05-23 12:48:35");
INSERT INTO `audit_log` VALUES("600","2","New obstacle has been created named -Obstacle - 3 on the floor no. 2","table","2017-05-23 12:48:51");
INSERT INTO `audit_log` VALUES("601","2","New obstacle has been created named -Obstacle - 4 on the floor no. 2","table","2017-05-23 12:48:55");
INSERT INTO `audit_log` VALUES("602","2","New table has been created named Table - 10","table","2017-05-23 12:48:57");
INSERT INTO `audit_log` VALUES("603","2","New table has been created named Table - 11","table","2017-05-23 12:48:58");
INSERT INTO `audit_log` VALUES("604","2","New table has been created named Table - 12","table","2017-05-23 12:49:02");
INSERT INTO `audit_log` VALUES("605","2","New table has been created named Table - 13","table","2017-05-23 12:49:03");
INSERT INTO `audit_log` VALUES("606","2","Table \'<b>Table - 7</b>\' has been occupied ","table","2017-05-23 12:49:41");
INSERT INTO `audit_log` VALUES("607","2","Booking has been made","table","2017-05-23 12:51:51");
INSERT INTO `audit_log` VALUES("608","2","New menu category has been created named -cakes and icecreams","menu","2017-05-23 13:05:01");
INSERT INTO `audit_log` VALUES("609","2","<b>Administrator</b> Logged onto the system","user","2017-05-23 14:56:20");
INSERT INTO `audit_log` VALUES("610","2","<b>Administrator</b> Logged onto the system","user","2017-05-23 15:51:03");
INSERT INTO `audit_log` VALUES("611","2","Table \'<b>Table - 4</b>\' has been occupied ","table","2017-05-23 15:51:21");
INSERT INTO `audit_log` VALUES("612","2","Table order KOT number 170523-3 has been send","order","2017-05-23 15:56:11");
INSERT INTO `audit_log` VALUES("613","2","Advance payment has been made for the amount of Rs. 500","order","2017-05-23 15:57:30");
INSERT INTO `audit_log` VALUES("614","2","Item wise payment has been made for the amount of Rs. 124","order","2017-05-23 15:58:17");
INSERT INTO `audit_log` VALUES("615","2","1 - stock item 1 has been sold","stock","2017-05-23 15:59:14");
INSERT INTO `audit_log` VALUES("616","2","10 - stock item 2 has been sold","stock","2017-05-23 15:59:14");
INSERT INTO `audit_log` VALUES("617","2","Invoice number 51 has been printed","bill","2017-05-23 15:59:15");
INSERT INTO `audit_log` VALUES("618","2","Credit table order has been made for the amount of Rs. 746 on the debtor named -sugen","order","2017-05-23 15:59:16");
INSERT INTO `audit_log` VALUES("619","2","Table \'<b>Table - 4</b>\' has been closed ","table","2017-05-23 15:59:16");
INSERT INTO `audit_log` VALUES("620","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-05-23 16:00:51");
INSERT INTO `audit_log` VALUES("621","2","Table order KOT number 170523-4 has been send","order","2017-05-23 16:01:09");
INSERT INTO `audit_log` VALUES("622","2","Table order KOT number 170523-5 has been send","order","2017-05-23 16:04:44");
INSERT INTO `audit_log` VALUES("623","2","Advance payment has been made for the amount of Rs. 1000","order","2017-05-23 16:05:40");
INSERT INTO `audit_log` VALUES("624","2","Item wise payment has been made for the amount of Rs. 1616","order","2017-05-23 16:06:49");
INSERT INTO `audit_log` VALUES("625","2","Product named -Stock Item 8 has been added","misc","2017-05-23 16:11:43");
INSERT INTO `audit_log` VALUES("626","2","Product named -Stock Item 8 has been added","misc","2017-05-23 16:11:48");
INSERT INTO `audit_log` VALUES("627","2","2000 stock item 8 has been purchased","stock","2017-05-23 16:12:45");
INSERT INTO `audit_log` VALUES("628","2","Product has been updated","misc","2017-05-23 16:14:31");
INSERT INTO `audit_log` VALUES("629","2","<b>Administrator</b> Logged out of the system","user","2017-05-30 11:29:32");
INSERT INTO `audit_log` VALUES("630","2","<b>Administrator</b> Logged onto the system","user","2017-05-30 11:29:41");
INSERT INTO `audit_log` VALUES("631","2","<b>Administrator</b> Logged out of the system","user","2017-05-30 14:57:41");
INSERT INTO `audit_log` VALUES("632","2","<b>Administrator</b> Logged onto the system","user","2017-05-30 14:57:55");
INSERT INTO `audit_log` VALUES("633","2","<b>Administrator</b> Logged out of the system","user","2017-05-31 12:41:17");
INSERT INTO `audit_log` VALUES("634","2","<b>Administrator</b> Logged onto the system","user","2017-05-31 12:41:29");
INSERT INTO `audit_log` VALUES("635","2","Table order KOT number 170531-1 has been send","order","2017-05-31 12:41:49");
INSERT INTO `audit_log` VALUES("636","2","Cash payment for table order has been made for the amount of Rs. 249","order","2017-05-31 12:50:07");
INSERT INTO `audit_log` VALUES("637","2","Table \'<b>Table - 2</b>\' has been closed ","table","2017-05-31 12:50:08");
INSERT INTO `audit_log` VALUES("638","2","Take away order KOT 170531-2 has been send","order","2017-05-31 12:50:23");
INSERT INTO `audit_log` VALUES("639","2","Cash payment for take away order has been made for the amount of Rs. 249","order","2017-05-31 12:50:33");
INSERT INTO `audit_log` VALUES("640","2","Take away order KOT 170531-3 has been send","order","2017-05-31 12:50:50");
INSERT INTO `audit_log` VALUES("641","2","Credit delivery order has been made for the amount of Rs.373 on the debtor named -sugen","order","2017-05-31 12:51:03");
INSERT INTO `audit_log` VALUES("642","2","<b>Administrator</b> Logged onto the system","user","2017-06-02 12:58:29");
INSERT INTO `audit_log` VALUES("643","2","<b>Administrator</b> Logged out of the system","user","2017-06-02 17:02:44");
INSERT INTO `audit_log` VALUES("644","2","<b>Administrator</b> Logged onto the system","user","2017-06-02 17:02:56");
INSERT INTO `audit_log` VALUES("645","2","New setting has been added of field name = pick up service charge rate and value = 10","setting","2017-06-02 17:04:27");
INSERT INTO `audit_log` VALUES("646","2","Pick Up order KOT 170602-1 has been send","order","2017-06-02 17:13:01");
INSERT INTO `audit_log` VALUES("647","2","Cash payment for pick up order has been made for the amount of Rs. 249","order","2017-06-02 17:13:29");
INSERT INTO `audit_log` VALUES("648","2","<b>Administrator</b> Logged onto the system","user","2017-06-08 16:16:46");
INSERT INTO `audit_log` VALUES("649","2","Setting has been updated from test1@gmail.com to sugentuladhar@gmail.com","setting","2017-06-08 16:48:17");
INSERT INTO `audit_log` VALUES("650","2","Setting has been updated from test2@gmail.com to gaurav@gmail.com","setting","2017-06-08 16:48:42");
INSERT INTO `audit_log` VALUES("651","2","Setting has been updated from test3@gmail.com to sugen@klientscape.com","setting","2017-06-08 16:48:53");
INSERT INTO `audit_log` VALUES("652","2","Setting has been updated from test2@gmail.com to gaurav@klientscape.com","setting","2017-06-08 16:49:03");
INSERT INTO `audit_log` VALUES("653","2","Database has been backuped by the user <b>Administrator</b>","database","2017-06-08 16:49:38");
INSERT INTO `audit_log` VALUES("654","2","<b>Administrator</b> Logged out of the system","user","2017-06-08 16:49:40");
INSERT INTO `audit_log` VALUES("655","2","<b>Administrator</b> Logged out of the system","user","2017-06-09 11:55:00");
INSERT INTO `audit_log` VALUES("656","2","<b>Administrator</b> Logged onto the system","user","2017-06-09 11:55:10");
INSERT INTO `audit_log` VALUES("657","2","Database has been backuped by the user <b>Administrator</b>","database","2017-06-09 13:35:49");
INSERT INTO `audit_log` VALUES("658","2","<b>Administrator</b> Logged out of the system","user","2017-06-09 13:36:12");
INSERT INTO `audit_log` VALUES("659","2","<b>Administrator</b> Logged onto the system","user","2017-06-09 13:36:41");
INSERT INTO `audit_log` VALUES("660","2","Database has been backuped by the user <b>Administrator</b>","database","2017-06-09 13:37:38");
INSERT INTO `audit_log` VALUES("661","2","<b>Administrator</b> Logged out of the system","user","2017-06-09 13:37:42");
INSERT INTO `audit_log` VALUES("662","5","<b>Staff</b> Logged onto the system","user","2017-06-09 13:37:57");
INSERT INTO `audit_log` VALUES("663","5","<b>Staff</b> Logged out of the system","user","2017-06-09 13:38:42");
INSERT INTO `audit_log` VALUES("664","5","<b>Staff</b> Logged onto the system","user","2017-06-09 13:38:56");
INSERT INTO `audit_log` VALUES("665","2","<b>Administrator</b> Logged onto the system","user","2017-06-13 12:36:42");
INSERT INTO `audit_log` VALUES("666","2","Database has been backuped by the user <b>Administrator</b>","database","2017-06-13 12:41:18");
INSERT INTO `audit_log` VALUES("667","2","<b>Administrator</b> Logged out of the system","user","2017-06-13 12:41:19");
INSERT INTO `audit_log` VALUES("668","2","<b>Administrator</b> Logged onto the system","user","2017-06-13 12:43:30");
INSERT INTO `audit_log` VALUES("669","2","Database has been backuped by the user <b>Administrator</b>","database","2017-06-13 12:43:46");
INSERT INTO `audit_log` VALUES("670","2","<b>Administrator</b> Logged out of the system","user","2017-06-13 12:43:47");
INSERT INTO `audit_log` VALUES("671","2","<b>Administrator</b> Logged onto the system","user","2017-06-13 14:11:54");
INSERT INTO `audit_log` VALUES("672","2","<b>Administrator</b> Logged onto the system","user","2017-06-14 16:20:19");
INSERT INTO `audit_log` VALUES("673","2","<b>Administrator</b> Logged out of the system","user","2017-06-16 17:23:49");
INSERT INTO `audit_log` VALUES("674","2","<b>Administrator</b> Logged onto the system","user","2017-06-16 17:23:59");
INSERT INTO `audit_log` VALUES("675","2","<b>Administrator</b> Logged out of the system","user","2017-06-19 10:28:12");
INSERT INTO `audit_log` VALUES("676","2","<b>Administrator</b> Logged onto the system","user","2017-06-19 10:28:19");
INSERT INTO `audit_log` VALUES("677","2","Sales has been returned for the invoice number - 48","order","2017-06-19 10:34:15");
INSERT INTO `audit_log` VALUES("678","2","<b>Administrator</b> Logged out of the system","user","2017-06-19 14:18:23");
INSERT INTO `audit_log` VALUES("679","2","<b>Administrator</b> Logged onto the system","user","2017-06-19 14:18:31");
INSERT INTO `audit_log` VALUES("680","2","<b>Administrator</b> Logged out of the system","user","2017-06-19 14:37:06");
INSERT INTO `audit_log` VALUES("681","2","<b>Administrator</b> Logged onto the system","user","2017-06-19 14:37:13");
INSERT INTO `audit_log` VALUES("682","2","<b>Administrator</b> Logged onto the system","user","2017-06-20 17:39:55");
INSERT INTO `audit_log` VALUES("683","2","Product named -Stock Item 10 has been added","misc","2017-06-20 17:42:01");
INSERT INTO `audit_log` VALUES("684","2","Table \'<b>Table - 4</b>\' has been occupied ","table","2017-06-20 17:43:26");
INSERT INTO `audit_log` VALUES("685","2","Table order KOT number 170620-1 has been send","order","2017-06-20 17:43:49");
INSERT INTO `audit_log` VALUES("686","2","Database has been backuped by the user <b>Administrator</b>","database","2017-06-20 17:49:22");
INSERT INTO `audit_log` VALUES("687","2","<b>Administrator</b> Logged out of the system","user","2017-06-20 17:49:23");
INSERT INTO `audit_log` VALUES("688","2","<b>Administrator</b> Logged out of the system","user","2017-06-21 14:05:32");
INSERT INTO `audit_log` VALUES("689","2","<b>Administrator</b> Logged onto the system","user","2017-06-21 14:10:17");
INSERT INTO `audit_log` VALUES("690","2","Cash payment for table order has been made for the amount of Rs. 124","order","2017-06-21 15:35:09");
INSERT INTO `audit_log` VALUES("691","2","Table \'<b>Table - 4</b>\' has been closed ","table","2017-06-21 15:35:10");
INSERT INTO `audit_log` VALUES("692","2","<b>Administrator</b> Logged onto the system","user","2017-06-22 11:32:37");
INSERT INTO `audit_log` VALUES("693","2","Table order KOT number 170622-1 has been send","order","2017-06-22 11:32:50");
INSERT INTO `audit_log` VALUES("694","2","Cash payment for table order has been made for the amount of Rs. 124","order","2017-06-22 11:32:55");
INSERT INTO `audit_log` VALUES("695","2","Table \'<b>Table - 5</b>\' has been closed ","table","2017-06-22 11:32:55");
INSERT INTO `audit_log` VALUES("696","2","Take away order KOT 170622-2 has been send","order","2017-06-22 11:33:31");
INSERT INTO `audit_log` VALUES("697","2","Cash payment for take away order has been made for the amount of Rs. 124","order","2017-06-22 11:33:38");
INSERT INTO `audit_log` VALUES("698","2","Pick Up order KOT 170622-3 has been send","order","2017-06-22 11:34:34");
INSERT INTO `audit_log` VALUES("699","2","Cash payment for pick up order has been made for the amount of Rs. 124","order","2017-06-22 11:34:39");
INSERT INTO `audit_log` VALUES("700","2","Delivery order KOT 170622-4 has been send","order","2017-06-22 11:34:50");
INSERT INTO `audit_log` VALUES("701","2","Cash payment for delivery order has been made for the amount of Rs. 124","order","2017-06-22 11:34:55");
INSERT INTO `audit_log` VALUES("702","2","Table order KOT number 170622-5 has been send","order","2017-06-22 11:35:01");
INSERT INTO `audit_log` VALUES("703","2","2 - stock item 1 has been sold","stock","2017-06-22 11:35:06");
INSERT INTO `audit_log` VALUES("704","2","20 - stock item 2 has been sold","stock","2017-06-22 11:35:06");
INSERT INTO `audit_log` VALUES("705","2","Cash payment for table order has been made for the amount of Rs. 3232","order","2017-06-22 11:35:07");
INSERT INTO `audit_log` VALUES("706","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-06-22 11:35:07");
INSERT INTO `audit_log` VALUES("707","2","Database has been backuped by the user <b>Administrator</b>","database","2017-06-22 11:39:44");
INSERT INTO `audit_log` VALUES("708","2","<b>Administrator</b> Logged out of the system","user","2017-06-22 11:39:45");
INSERT INTO `audit_log` VALUES("709","2","<b>Administrator</b> Logged onto the system","user","2017-06-22 17:16:31");
INSERT INTO `audit_log` VALUES("710","2","Table order KOT number 170622-6 has been send","order","2017-06-22 17:16:54");
INSERT INTO `audit_log` VALUES("711","2","Table order KOT number 170622-7 has been send","order","2017-06-22 17:17:01");
INSERT INTO `audit_log` VALUES("712","2","Table \'<b>Table - 7</b>\' has been closed ","table","2017-06-22 17:17:12");
INSERT INTO `audit_log` VALUES("713","2","Cash payment for table order has been made for the amount of Rs. 186","order","2017-06-22 17:17:12");
INSERT INTO `audit_log` VALUES("714","2","Take away order KOT 170622-8 has been send","order","2017-06-22 17:18:54");
INSERT INTO `audit_log` VALUES("715","2","Take away order KOT 170622-9 has been send","order","2017-06-22 17:19:15");
INSERT INTO `audit_log` VALUES("716","2","Take away order KOT 170622-10 has been send","order","2017-06-22 17:19:23");
INSERT INTO `audit_log` VALUES("717","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-06-22 17:21:19");
INSERT INTO `audit_log` VALUES("718","2","Take away order KOT 170622-11 has been send","order","2017-06-22 17:31:41");
INSERT INTO `audit_log` VALUES("719","2","Take away order KOT 170622-12 has been send","order","2017-06-22 17:31:58");
INSERT INTO `audit_log` VALUES("720","2","Take away order KOT 170622-13 has been send","order","2017-06-22 17:32:01");
INSERT INTO `audit_log` VALUES("721","2","Database has been backuped by the user <b>Administrator</b>","database","2017-06-22 17:34:04");
INSERT INTO `audit_log` VALUES("722","2","<b>Administrator</b> Logged out of the system","user","2017-06-22 17:34:06");
INSERT INTO `audit_log` VALUES("723","2","<b>Administrator</b> Logged out of the system","user","2017-07-04 15:29:15");
INSERT INTO `audit_log` VALUES("724","2","<b>Administrator</b> Logged onto the system","user","2017-07-04 15:29:22");
INSERT INTO `audit_log` VALUES("725","2","<b>Administrator</b> Logged out of the system","user","2017-07-04 16:04:50");
INSERT INTO `audit_log` VALUES("726","2","<b>Administrator</b> Logged onto the system","user","2017-07-04 16:05:04");
INSERT INTO `audit_log` VALUES("727","2","<b>Administrator</b> Logged out of the system","user","2017-07-07 12:48:26");
INSERT INTO `audit_log` VALUES("728","2","<b>Administrator</b> Logged onto the system","user","2017-07-07 12:48:34");
INSERT INTO `audit_log` VALUES("729","2","Table order KOT number 170707-1 has been send","order","2017-07-07 15:23:04");
INSERT INTO `audit_log` VALUES("730","2","Cash payment for table order has been made for the amount of Rs. 186","order","2017-07-07 15:23:14");
INSERT INTO `audit_log` VALUES("731","2","Table order KOT number 170707-2 has been send","order","2017-07-07 15:28:00");
INSERT INTO `audit_log` VALUES("732","2","Credit table order has been made for the amount of Rs. 124 on the debtor named -sugen","order","2017-07-07 15:28:09");
INSERT INTO `audit_log` VALUES("733","2","Table order KOT number 170707-3 has been send","order","2017-07-07 15:28:16");
INSERT INTO `audit_log` VALUES("734","2","Cash payment for table order has been made for the amount of Rs. 249","order","2017-07-07 15:28:21");
INSERT INTO `audit_log` VALUES("735","2","Table order KOT number 170707-4 has been send","order","2017-07-07 15:33:43");
INSERT INTO `audit_log` VALUES("736","2","Cash payment for table order has been made for the amount of Rs. 124","order","2017-07-07 15:33:48");
INSERT INTO `audit_log` VALUES("737","2","Table order KOT number 170707-5 has been send","order","2017-07-07 15:35:59");
INSERT INTO `audit_log` VALUES("738","2","Cash payment for table order has been made for the amount of Rs. 249","order","2017-07-07 15:36:03");
INSERT INTO `audit_log` VALUES("739","2","Table order KOT number 170707-6 has been send","order","2017-07-07 15:37:46");
INSERT INTO `audit_log` VALUES("740","2","Table order KOT number 170707-7 has been send","order","2017-07-07 15:37:46");
INSERT INTO `audit_log` VALUES("741","2","Cash payment for table order has been made for the amount of Rs. 497","order","2017-07-07 15:37:51");
INSERT INTO `audit_log` VALUES("742","2","Table order KOT number 170707-8 has been send","order","2017-07-07 15:43:27");
INSERT INTO `audit_log` VALUES("743","2","Credit table order has been made for the amount of Rs. 249 on the debtor named -binit","order","2017-07-07 15:43:34");
INSERT INTO `audit_log` VALUES("744","2","Table order KOT number 170707-9 has been send","order","2017-07-07 15:55:48");
INSERT INTO `audit_log` VALUES("745","2","Cash payment for table order has been made for the amount of Rs. 124","order","2017-07-07 15:55:52");
INSERT INTO `audit_log` VALUES("746","2","Table order KOT number 170707-10 has been send","order","2017-07-07 16:52:45");
INSERT INTO `audit_log` VALUES("747","2","Table order KOT number 170707-11 has been send","order","2017-07-07 17:25:07");
INSERT INTO `audit_log` VALUES("748","2","Cash payment for table order has been made for the amount of Rs. 684","billing","2017-07-07 17:25:14");
INSERT INTO `audit_log` VALUES("749","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-07-07 17:25:15");
INSERT INTO `audit_log` VALUES("750","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-07-07 17:27:14");
INSERT INTO `audit_log` VALUES("751","2","Table order KOT number 170707-12 has been send","order","2017-07-07 17:27:16");
INSERT INTO `audit_log` VALUES("752","2","Cash payment for table order has been made for the amount of Rs. 124","billing","2017-07-07 17:27:23");
INSERT INTO `audit_log` VALUES("753","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-07-07 17:27:24");
INSERT INTO `audit_log` VALUES("754","2","Sales has been returned for the invoice number - 17-75","billing","2017-07-07 17:41:27");
INSERT INTO `audit_log` VALUES("755","2","<b>Administrator</b> Logged onto the system","user","2017-07-10 10:23:04");
INSERT INTO `audit_log` VALUES("756","2","<b>Administrator</b> Logged onto the system","user","2017-07-10 12:02:40");
INSERT INTO `audit_log` VALUES("757","2","Database has been backuped by the user <b>Administrator</b>","database","2017-07-10 12:02:55");
INSERT INTO `audit_log` VALUES("758","2","<b>Administrator</b> Logged out of the system","user","2017-07-10 12:02:57");
INSERT INTO `audit_log` VALUES("759","2","<b>Administrator</b> Logged onto the system","user","2017-07-10 12:07:36");
INSERT INTO `audit_log` VALUES("760","2","Table \'<b>Table - 5</b>\' has been occupied ","table","2017-07-10 12:18:26");
INSERT INTO `audit_log` VALUES("761","2","Table \'<b>Table - 5</b>\' has been closed ","table","2017-07-10 12:25:47");
INSERT INTO `audit_log` VALUES("762","2","Table \'<b>Table - 4</b>\' has been occupied ","table","2017-07-10 12:28:59");
INSERT INTO `audit_log` VALUES("763","2","<b>Administrator</b> Logged out of the system","user","2017-07-10 12:29:12");
INSERT INTO `audit_log` VALUES("764","2","<b>Administrator</b> Logged onto the system","user","2017-07-10 12:29:19");
INSERT INTO `audit_log` VALUES("765","2","Setting has been updated from company vat no. to 123213","setting","2017-07-10 12:43:20");
INSERT INTO `audit_log` VALUES("766","2","Setting has been updated from 123213 to 9","setting","2017-07-10 12:45:07");
INSERT INTO `audit_log` VALUES("767","2","Setting has been updated from 9 to 921212","setting","2017-07-10 12:46:26");
INSERT INTO `audit_log` VALUES("768","2","Setting has been updated from 9 to 9212122222222","setting","2017-07-10 12:46:30");
INSERT INTO `audit_log` VALUES("769","2","Setting has been updated from 9 to 92121222222222222","setting","2017-07-10 12:46:32");
INSERT INTO `audit_log` VALUES("770","2","Setting has been updated from 92121222222222222 to 111111","setting","2017-07-10 12:47:25");
INSERT INTO `audit_log` VALUES("771","2","Setting has been updated from 111111 to 1111111111","setting","2017-07-10 12:49:20");
INSERT INTO `audit_log` VALUES("772","2","Setting has been updated from 111111 to 1111111111111","setting","2017-07-10 12:49:22");
INSERT INTO `audit_log` VALUES("773","2","Setting has been updated from 1111111111111 to 111111111111111","setting","2017-07-10 12:49:45");
INSERT INTO `audit_log` VALUES("774","2","Setting has been updated from 111111111111111 to 11","setting","2017-07-10 12:52:45");
INSERT INTO `audit_log` VALUES("775","2","Setting has been updated from 11 to 123456789","setting","2017-07-10 12:54:11");
INSERT INTO `audit_log` VALUES("776","2","Setting has been updated from 11 to 1234567891","setting","2017-07-10 12:54:20");
INSERT INTO `audit_log` VALUES("777","2","Setting has been updated from 1234567891 to 12345678","setting","2017-07-10 12:54:50");
INSERT INTO `audit_log` VALUES("778","2","Setting has been updated from 12345678 to 123456781","setting","2017-07-10 12:56:03");
INSERT INTO `audit_log` VALUES("779","2","Setting has been updated from 123456781 to 1234567811","setting","2017-07-10 12:57:11");
INSERT INTO `audit_log` VALUES("780","2","Setting has been updated from 1234567811 to 12345678","setting","2017-07-10 13:06:08");
INSERT INTO `audit_log` VALUES("781","2","Setting has been updated from 1234567811 to 1111111111","setting","2017-07-10 13:06:14");
INSERT INTO `audit_log` VALUES("782","2","Setting has been updated from 1111111111 to 111111111","setting","2017-07-10 13:08:33");
INSERT INTO `audit_log` VALUES("783","2","<b>Administrator</b> Logged out of the system","user","2017-07-10 13:52:14");
INSERT INTO `audit_log` VALUES("784","2","<b>Administrator</b> Logged onto the system","user","2017-07-10 13:52:39");
INSERT INTO `audit_log` VALUES("785","2","<b>Administrator</b> Logged out of the system","user","2017-07-10 14:05:02");
INSERT INTO `audit_log` VALUES("786","2","<b>Administrator</b> Logged onto the system","user","2017-07-10 14:05:09");
INSERT INTO `audit_log` VALUES("787","2","Sales has been returned for the invoice number - 17-74","billing","2017-07-10 14:14:29");
INSERT INTO `audit_log` VALUES("788","2","<b>Administrator</b> Logged out of the system","user","2017-07-10 16:27:37");
INSERT INTO `audit_log` VALUES("789","2","<b>Administrator</b> Logged onto the system","user","2017-07-10 16:27:44");
INSERT INTO `audit_log` VALUES("790","2","Database has been backuped by the user <b>Administrator</b>","database","2017-07-10 16:28:08");
INSERT INTO `audit_log` VALUES("791","2","<b>Administrator</b> Logged onto the system","user","2017-07-10 16:36:11");
INSERT INTO `audit_log` VALUES("792","2","Database has been backuped by the user <b>Administrator</b>","database","2017-07-10 16:36:33");
INSERT INTO `audit_log` VALUES("793","2","<b>Administrator</b> Logged onto the system","user","2017-07-10 16:39:15");
INSERT INTO `audit_log` VALUES("794","2","Database has been backuped by the user <b>Administrator</b>","database","2017-07-10 17:13:40");
INSERT INTO `audit_log` VALUES("795","2","<b>Administrator</b> Logged out of the system","user","2017-07-10 17:13:41");
INSERT INTO `audit_log` VALUES("796","5","<b>Staff</b> Logged onto the system","user","2017-07-10 17:13:47");
INSERT INTO `audit_log` VALUES("797","5","<b>Staff</b> Logged out of the system","user","2017-07-10 17:14:04");
INSERT INTO `audit_log` VALUES("798","2","<b>Administrator</b> Logged onto the system","user","2017-07-11 12:35:53");
INSERT INTO `audit_log` VALUES("799","2","Table order KOT number 170711-1 has been send","order","2017-07-11 13:40:56");
INSERT INTO `audit_log` VALUES("800","2","Table order KOT number 170711-2 has been send","order","2017-07-11 13:57:10");
INSERT INTO `audit_log` VALUES("801","2","New setting has been added of field name = foc password and value = foc","setting","2017-07-11 14:04:19");
INSERT INTO `audit_log` VALUES("802","2","<b>Administrator</b> Logged out of the system","user","2017-07-11 14:05:33");
INSERT INTO `audit_log` VALUES("803","2","<b>Administrator</b> Logged onto the system","user","2017-07-11 14:05:40");
INSERT INTO `audit_log` VALUES("804","2","<b>Administrator</b> Logged out of the system","user","2017-07-11 16:03:22");
INSERT INTO `audit_log` VALUES("805","2","<b>Administrator</b> Logged onto the system","user","2017-07-11 16:03:38");
INSERT INTO `audit_log` VALUES("806","2","Table order KOT number 170711-3 has been send","order","2017-07-11 16:30:17");
INSERT INTO `audit_log` VALUES("807","2","New table has been created named Table - 14","table","2017-07-11 17:08:17");
INSERT INTO `audit_log` VALUES("808","2","New table has been created named Table - 15","table","2017-07-11 17:17:47");
INSERT INTO `audit_log` VALUES("809","2","<b>Administrator</b> Logged out of the system","user","2017-07-11 17:53:31");
INSERT INTO `audit_log` VALUES("810","2","<b>Administrator</b> Logged onto the system","user","2017-07-11 17:53:38");
INSERT INTO `audit_log` VALUES("811","2","<b>Administrator</b> Logged onto the system","user","2017-07-12 10:19:52");
INSERT INTO `audit_log` VALUES("812","2","Sales has been returned for the invoice number - 17-73","billing","2017-07-12 11:30:27");
INSERT INTO `audit_log` VALUES("813","2","Sales has been returned for the invoice number - 17-72","billing","2017-07-12 11:31:47");
INSERT INTO `audit_log` VALUES("814","2","Database has been backuped by the user <b>Administrator</b>","database","2017-07-12 12:27:43");
INSERT INTO `audit_log` VALUES("815","2","<b>Administrator</b> Logged onto the system","user","2017-07-12 12:42:10");
INSERT INTO `audit_log` VALUES("816","2","Database has been backuped by the user <b>Administrator</b>","database","2017-07-12 13:54:26");
INSERT INTO `audit_log` VALUES("817","2","Database has been backuped by the user <b>Administrator</b>","database","2017-07-12 17:33:05");
INSERT INTO `audit_log` VALUES("818","2","<b>Administrator</b> Logged onto the system","user","2017-07-12 17:36:42");
INSERT INTO `audit_log` VALUES("819","2","Database has been backuped by the user <b>Administrator</b>","database","2017-07-12 17:58:49");
INSERT INTO `audit_log` VALUES("820","2","<b>Administrator</b> Logged onto the system","user","2017-07-14 12:48:04");
INSERT INTO `audit_log` VALUES("822","2","Table \'<b>Table - 7</b>\' has been occupied ","table","2017-07-17 12:31:32");
INSERT INTO `audit_log` VALUES("823","2","New table has been created named Table - 16","table","2017-07-17 12:40:17");
INSERT INTO `audit_log` VALUES("824","2","New table has been created named Table - 17","table","2017-07-17 12:43:55");
INSERT INTO `audit_log` VALUES("825","2","Database has been backuped by the user <b>Administrator</b>","database","2017-07-17 12:44:11");
INSERT INTO `audit_log` VALUES("826","2","<b>Administrator</b> Logged out of the system","user","2017-07-17 12:44:11");
INSERT INTO `audit_log` VALUES("827","2","<b>Administrator</b> Logged onto the system","user","2017-07-17 12:49:11");
INSERT INTO `audit_log` VALUES("828","2","New table has been created named Table - 18","table","2017-07-17 13:56:55");
INSERT INTO `audit_log` VALUES("829","2","Booking has been made","table","2017-07-17 15:02:46");
INSERT INTO `audit_log` VALUES("830","2","Booking has been made","table","2017-07-17 15:06:09");
INSERT INTO `audit_log` VALUES("831","2","New debtor named -Sushov\' has been created","debtor","2017-07-17 17:24:40");
INSERT INTO `audit_log` VALUES("832","2","<b>Administrator</b> Logged onto the system","user","2017-07-18 15:27:45");
INSERT INTO `audit_log` VALUES("833","2","Table \'<b>Table - 15</b>\' has been occupied ","table","2017-07-18 15:27:58");
INSERT INTO `audit_log` VALUES("834","2","Table order KOT number 170718-1 has been send","order","2017-07-18 15:28:03");
INSERT INTO `audit_log` VALUES("835","2","10 - stock item 7 has been sold","stock","2017-07-18 15:28:24");
INSERT INTO `audit_log` VALUES("836","2","2 - stock item 6 has been sold","stock","2017-07-18 15:28:24");
INSERT INTO `audit_log` VALUES("837","2","50 - stock item 5 has been sold","stock","2017-07-18 15:28:24");
INSERT INTO `audit_log` VALUES("838","2","Cash payment for table order has been made for the amount of Rs. 876","billing","2017-07-18 15:28:28");
INSERT INTO `audit_log` VALUES("839","2","Table \'<b>Table - 15</b>\' has been closed ","table","2017-07-18 15:28:29");
INSERT INTO `audit_log` VALUES("840","2","Menu item has been added","menu","2017-07-18 16:29:54");
INSERT INTO `audit_log` VALUES("841","2","FOC has been made","billing","2017-07-18 17:00:23");
INSERT INTO `audit_log` VALUES("842","2","Table \'<b>Table - 4</b>\' has been closed ","table","2017-07-18 17:00:42");
INSERT INTO `audit_log` VALUES("843","2","<b>Administrator</b> Logged onto the system","user","2017-07-19 10:42:19");
INSERT INTO `audit_log` VALUES("844","2","Table \'<b>Table - 4</b>\' has been occupied ","table","2017-07-19 10:42:39");
INSERT INTO `audit_log` VALUES("845","2","Table order KOT number 170719-1 has been send","order","2017-07-19 10:43:01");
INSERT INTO `audit_log` VALUES("846","2","Table order KOT number 170719-2 has been send","order","2017-07-19 10:43:18");
INSERT INTO `audit_log` VALUES("847","2","10 - stock item 7 has been sold","stock","2017-07-19 10:44:03");
INSERT INTO `audit_log` VALUES("848","2","2 - stock item 6 has been sold","stock","2017-07-19 10:44:04");
INSERT INTO `audit_log` VALUES("849","2","50 - stock item 5 has been sold","stock","2017-07-19 10:44:04");
INSERT INTO `audit_log` VALUES("850","2","Cash payment for table order has been made for the amount of Rs. 1591","billing","2017-07-19 10:44:06");
INSERT INTO `audit_log` VALUES("851","2","Table \'<b>Table - 4</b>\' has been closed ","table","2017-07-19 10:44:19");
INSERT INTO `audit_log` VALUES("852","2","New menu category has been created named -test","menu","2017-07-19 10:45:12");
INSERT INTO `audit_log` VALUES("853","2","Updated menu category","menu","2017-07-19 10:45:18");
INSERT INTO `audit_log` VALUES("854","2","50 stock item 1 has been purchased","stock","2017-07-19 10:46:08");
INSERT INTO `audit_log` VALUES("855","2","Utensils item named -Test has been added","misc","2017-07-19 10:48:55");
INSERT INTO `audit_log` VALUES("856","2","Table \'<b>Table - 4</b>\' has been occupied ","table","2017-07-19 17:12:08");
INSERT INTO `audit_log` VALUES("857","2","Table order KOT number 170719-3 has been send","order","2017-07-19 17:12:35");
INSERT INTO `audit_log` VALUES("858","2","<b>Administrator</b> Logged onto the system","user","2017-07-20 10:10:22");
INSERT INTO `audit_log` VALUES("859","2","New menu category has been created named -testing 1","menu","2017-07-20 12:39:14");
INSERT INTO `audit_log` VALUES("860","2","New menu category has been created named -testing 2","menu","2017-07-20 12:39:23");
INSERT INTO `audit_log` VALUES("861","2","New menu category has been created named -testing 3","menu","2017-07-20 12:39:31");
INSERT INTO `audit_log` VALUES("862","2","New menu category has been created named -testing 4","menu","2017-07-20 12:39:40");
INSERT INTO `audit_log` VALUES("863","2","Table order KOT number 170720-1 has been send","order","2017-07-20 17:51:39");
INSERT INTO `audit_log` VALUES("864","2","Table order KOT number 170720-2 has been send","order","2017-07-20 17:51:57");
INSERT INTO `audit_log` VALUES("865","2","Table order KOT number 170720-3 has been send","order","2017-07-20 17:52:00");
INSERT INTO `audit_log` VALUES("866","2","<b>Administrator</b> Logged out of the system","user","2017-07-21 10:55:47");
INSERT INTO `audit_log` VALUES("867","2","<b>Administrator</b> Logged onto the system","user","2017-07-21 10:55:54");
INSERT INTO `audit_log` VALUES("868","2","Table order KOT number 170721-1 has been send","order","2017-07-21 14:29:54");
INSERT INTO `audit_log` VALUES("869","2","Table order KOT number 170721-2 has been send","order","2017-07-21 14:30:43");
INSERT INTO `audit_log` VALUES("870","2","1 - stock item 1 has been sold","stock","2017-07-21 15:10:56");
INSERT INTO `audit_log` VALUES("871","2","10 - stock item 2 has been sold","stock","2017-07-21 15:10:56");
INSERT INTO `audit_log` VALUES("872","2","Cash payment for table order has been made for the amount of Rs. 1535","billing","2017-07-21 15:10:59");
INSERT INTO `audit_log` VALUES("873","2","Table order KOT number 170721-3 has been send","order","2017-07-21 15:11:11");
INSERT INTO `audit_log` VALUES("874","2","Table order KOT number 170721-4 has been send","order","2017-07-21 15:22:46");
INSERT INTO `audit_log` VALUES("875","2","1 - stock item 1 has been sold","stock","2017-07-21 17:18:41");
INSERT INTO `audit_log` VALUES("876","2","10 - stock item 2 has been sold","stock","2017-07-21 17:18:41");
INSERT INTO `audit_log` VALUES("877","2","Cash payment for table order has been made for the amount of Rs. 704","billing","2017-07-21 17:18:42");
INSERT INTO `audit_log` VALUES("878","2","Table order KOT number 170721-5 has been send","order","2017-07-21 17:19:25");
INSERT INTO `audit_log` VALUES("879","2","1 - stock item 1 has been sold","stock","2017-07-21 17:24:42");
INSERT INTO `audit_log` VALUES("880","2","10 - stock item 2 has been sold","stock","2017-07-21 17:24:42");
INSERT INTO `audit_log` VALUES("881","2","Cash payment for table order has been made for the amount of Rs. 758","billing","2017-07-21 17:24:43");
INSERT INTO `audit_log` VALUES("882","2","Table order KOT number 170721-6 has been send","order","2017-07-21 17:25:51");
INSERT INTO `audit_log` VALUES("883","2","1 - stock item 1 has been sold","stock","2017-07-21 17:26:04");
INSERT INTO `audit_log` VALUES("884","2","10 - stock item 2 has been sold","stock","2017-07-21 17:26:04");
INSERT INTO `audit_log` VALUES("885","2","Cash payment for table order has been made for the amount of Rs. 634","billing","2017-07-21 17:26:05");
INSERT INTO `audit_log` VALUES("886","2","<b>Administrator</b> Logged onto the system","user","2017-07-24 10:04:05");
INSERT INTO `audit_log` VALUES("887","2","Table order KOT number 170724-1 has been send","order","2017-07-24 12:35:48");
INSERT INTO `audit_log` VALUES("888","2","Table order KOT number 170724-2 has been send","order","2017-07-24 13:48:37");
INSERT INTO `audit_log` VALUES("889","2","2 - stock item 1 has been sold","stock","2017-07-24 15:17:36");
INSERT INTO `audit_log` VALUES("890","2","20 - stock item 2 has been sold","stock","2017-07-24 15:17:36");
INSERT INTO `audit_log` VALUES("891","2","Cash payment for table order has been made for the amount of Rs. 1444","billing","2017-07-24 15:17:37");
INSERT INTO `audit_log` VALUES("892","2","Table order KOT number 170724-3 has been send","order","2017-07-24 15:19:52");
INSERT INTO `audit_log` VALUES("893","2","2 - stock item 1 has been sold","stock","2017-07-24 15:21:25");
INSERT INTO `audit_log` VALUES("894","2","20 - stock item 2 has been sold","stock","2017-07-24 15:21:25");
INSERT INTO `audit_log` VALUES("895","2","Cash payment for table order has been made for the amount of Rs. 1444","billing","2017-07-24 15:21:26");
INSERT INTO `audit_log` VALUES("896","2","Table order KOT number 170724-4 has been send","order","2017-07-24 15:30:35");
INSERT INTO `audit_log` VALUES("897","2","1 - stock item 1 has been sold","stock","2017-07-24 15:31:25");
INSERT INTO `audit_log` VALUES("898","2","10 - stock item 2 has been sold","stock","2017-07-24 15:31:25");
INSERT INTO `audit_log` VALUES("899","2","Cash payment for table order has been made for the amount of Rs. 764","billing","2017-07-24 15:31:26");
INSERT INTO `audit_log` VALUES("900","2","Table order KOT number 170724-5 has been send","order","2017-07-24 15:36:13");
INSERT INTO `audit_log` VALUES("901","2","Table order KOT number 170724-6 has been send","order","2017-07-24 15:47:33");
INSERT INTO `audit_log` VALUES("902","2","<b>Administrator</b> Logged onto the system","user","2017-07-25 10:08:16");
INSERT INTO `audit_log` VALUES("903","2","<b>Administrator</b> Logged out of the system","user","2017-07-25 10:10:11");
INSERT INTO `audit_log` VALUES("904","2","<b>Administrator</b> Logged onto the system","user","2017-07-25 10:10:18");
INSERT INTO `audit_log` VALUES("905","2","Table order KOT number 170725-1 has been send","order","2017-07-25 14:35:24");
INSERT INTO `audit_log` VALUES("906","2","<b>Administrator</b> Logged out of the system","user","2017-07-25 16:33:20");
INSERT INTO `audit_log` VALUES("907","2","<b>Administrator</b> Logged onto the system","user","2017-07-25 16:33:32");
INSERT INTO `audit_log` VALUES("908","2","Table \'<b>Table - 14</b>\' has been occupied ","table","2017-07-25 16:33:37");
INSERT INTO `audit_log` VALUES("909","2","Table \'<b>Table - 2</b>\' has been occupied ","table","2017-07-25 16:33:42");
INSERT INTO `audit_log` VALUES("910","2","Cash payment for table order has been made for the amount of Rs. 1659","billing","2017-07-25 17:05:57");
INSERT INTO `audit_log` VALUES("911","2","Table order KOT number 170725-2 has been send","order","2017-07-25 17:06:24");
INSERT INTO `audit_log` VALUES("912","2","Table order KOT number 170725-3 has been send","order","2017-07-25 17:06:34");
INSERT INTO `audit_log` VALUES("913","2","1 - stock item 1 has been sold","stock","2017-07-25 17:16:16");
INSERT INTO `audit_log` VALUES("914","2","10 - stock item 2 has been sold","stock","2017-07-25 17:16:16");
INSERT INTO `audit_log` VALUES("915","2","Cash payment for table order has been made for the amount of Rs. 1462","billing","2017-07-25 17:16:17");
INSERT INTO `audit_log` VALUES("916","2","Table order KOT number 170725-4 has been send","order","2017-07-25 17:17:51");
INSERT INTO `audit_log` VALUES("917","2","Table order KOT number 170725-5 has been send","order","2017-07-25 17:18:06");
INSERT INTO `audit_log` VALUES("918","2","1 - stock item 1 has been sold","stock","2017-07-25 17:29:48");
INSERT INTO `audit_log` VALUES("919","2","10 - stock item 2 has been sold","stock","2017-07-25 17:29:48");
INSERT INTO `audit_log` VALUES("920","2","Cash payment for table order has been made for the amount of Rs. 1535","billing","2017-07-25 17:29:49");
INSERT INTO `audit_log` VALUES("921","2","Table order KOT number 170725-6 has been send","order","2017-07-25 17:30:30");
INSERT INTO `audit_log` VALUES("922","2","Table order KOT number 170725-7 has been send","order","2017-07-25 17:30:39");
INSERT INTO `audit_log` VALUES("923","2","1 - stock item 1 has been sold","stock","2017-07-25 17:30:53");
INSERT INTO `audit_log` VALUES("924","2","10 - stock item 2 has been sold","stock","2017-07-25 17:30:53");
INSERT INTO `audit_log` VALUES("925","2","Cash payment for table order has been made for the amount of Rs. 1311","billing","2017-07-25 17:30:53");
INSERT INTO `audit_log` VALUES("926","2","Table order KOT number 170725-8 has been send","order","2017-07-25 17:31:21");
INSERT INTO `audit_log` VALUES("927","2","Table order KOT number 170725-9 has been send","order","2017-07-25 17:31:29");
INSERT INTO `audit_log` VALUES("928","2","1 - stock item 1 has been sold","stock","2017-07-25 17:31:59");
INSERT INTO `audit_log` VALUES("929","2","10 - stock item 2 has been sold","stock","2017-07-25 17:31:59");
INSERT INTO `audit_log` VALUES("930","2","Cash payment for table order has been made for the amount of Rs. 1261","billing","2017-07-25 17:32:00");
INSERT INTO `audit_log` VALUES("931","2","Table \'<b>Table - 2</b>\' has been closed ","table","2017-07-25 18:04:44");
INSERT INTO `audit_log` VALUES("932","2","Table \'<b>Table - 14</b>\' has been closed ","table","2017-07-25 18:04:47");
INSERT INTO `audit_log` VALUES("933","2","<b>Administrator</b> Logged onto the system","user","2017-07-26 10:29:27");
INSERT INTO `audit_log` VALUES("934","2","Table \'<b>Table - 7</b>\' has been closed ","table","2017-07-26 11:05:42");
INSERT INTO `audit_log` VALUES("935","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-07-26 11:15:24");
INSERT INTO `audit_log` VALUES("936","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-07-26 11:15:31");
INSERT INTO `audit_log` VALUES("937","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-07-26 11:15:54");
INSERT INTO `audit_log` VALUES("938","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-07-26 11:16:09");
INSERT INTO `audit_log` VALUES("939","2","Table \'<b>Table - 15</b>\' has been occupied ","table","2017-07-26 11:31:54");
INSERT INTO `audit_log` VALUES("940","2","Table \'<b>Table - 6</b>\' has been occupied ","table","2017-07-26 11:31:58");
INSERT INTO `audit_log` VALUES("941","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-07-26 11:41:42");
INSERT INTO `audit_log` VALUES("942","2","Table \'<b>Table - 14</b>\' has been occupied ","table","2017-07-26 11:41:46");
INSERT INTO `audit_log` VALUES("943","2","Table \'<b>Table - 2</b>\' has been occupied ","table","2017-07-26 11:41:50");
INSERT INTO `audit_log` VALUES("944","2","Table \'<b>Table - 3</b>\' has been occupied ","table","2017-07-26 11:41:54");
INSERT INTO `audit_log` VALUES("945","2","Table \'<b>Table - 5</b>\' has been occupied ","table","2017-07-26 11:41:59");
INSERT INTO `audit_log` VALUES("946","2","Table \'<b>Table - 17</b>\' has been occupied ","table","2017-07-26 11:42:05");
INSERT INTO `audit_log` VALUES("947","2","Table \'<b>Table - 7</b>\' has been occupied ","table","2017-07-26 11:42:11");
INSERT INTO `audit_log` VALUES("948","2","Table \'<b>Table - 8</b>\' has been occupied ","table","2017-07-26 11:42:16");
INSERT INTO `audit_log` VALUES("949","2","Table \'<b>Table - 9</b>\' has been occupied ","table","2017-07-26 11:42:21");
INSERT INTO `audit_log` VALUES("950","2","Table \'<b>Table - 10</b>\' has been occupied ","table","2017-07-26 11:42:26");
INSERT INTO `audit_log` VALUES("951","2","Table \'<b>Table - 16</b>\' has been occupied ","table","2017-07-26 11:42:31");
INSERT INTO `audit_log` VALUES("952","2","Table \'<b>Table - 11</b>\' has been occupied ","table","2017-07-26 11:42:37");
INSERT INTO `audit_log` VALUES("953","2","Table \'<b>Table - 12</b>\' has been occupied ","table","2017-07-26 11:42:42");
INSERT INTO `audit_log` VALUES("954","2","Table \'<b>Table - 13</b>\' has been occupied ","table","2017-07-26 11:42:46");
INSERT INTO `audit_log` VALUES("955","2","<b>Administrator</b> Logged onto the system","user","2017-07-26 13:09:44");
INSERT INTO `audit_log` VALUES("956","2","Table order KOT number 170726-1 has been send","order","2017-07-26 14:33:44");
INSERT INTO `audit_log` VALUES("957","2","Table order KOT number 170726-2 has been send","order","2017-07-26 14:33:55");
INSERT INTO `audit_log` VALUES("958","2","Table order KOT number 170726-3 has been send","order","2017-07-26 14:34:04");
INSERT INTO `audit_log` VALUES("959","2","Take away order KOT 170726-4 has been send","order","2017-07-26 14:49:41");
INSERT INTO `audit_log` VALUES("960","2","1 - stock item 1 has been sold","stock","2017-07-26 14:51:18");
INSERT INTO `audit_log` VALUES("961","2","10 - stock item 2 has been sold","stock","2017-07-26 14:51:18");
INSERT INTO `audit_log` VALUES("962","2","Cash payment for take away order has been made for the amount of Rs. 658","billing","2017-07-26 14:51:19");
INSERT INTO `audit_log` VALUES("963","2","Take away order KOT 170726-5 has been send","order","2017-07-26 14:52:25");
INSERT INTO `audit_log` VALUES("964","2","Cash payment for take away order has been made for the amount of Rs. 444","billing","2017-07-26 14:52:56");
INSERT INTO `audit_log` VALUES("965","2","Pick Up order KOT 170726-6 has been send","order","2017-07-26 14:53:28");
INSERT INTO `audit_log` VALUES("966","2","1 - stock item 1 has been sold","stock","2017-07-26 14:53:53");
INSERT INTO `audit_log` VALUES("967","2","10 - stock item 2 has been sold","stock","2017-07-26 14:53:53");
INSERT INTO `audit_log` VALUES("968","2","Cash payment for pick up order has been made for the amount of Rs. 658","billing","2017-07-26 14:53:53");
INSERT INTO `audit_log` VALUES("969","2","Pick Up order KOT 170726-7 has been send","order","2017-07-26 14:54:50");
INSERT INTO `audit_log` VALUES("970","2","Cash payment for pick up order has been made for the amount of Rs. 800","billing","2017-07-26 14:55:34");
INSERT INTO `audit_log` VALUES("971","2","Delivery order KOT 170726-8 has been send","order","2017-07-26 15:25:32");
INSERT INTO `audit_log` VALUES("972","2","1 - stock item 1 has been sold","stock","2017-07-26 15:26:00");
INSERT INTO `audit_log` VALUES("973","2","10 - stock item 2 has been sold","stock","2017-07-26 15:26:01");
INSERT INTO `audit_log` VALUES("974","2","Cash payment for delivery order has been made for the amount of Rs. 658","billing","2017-07-26 15:26:03");
INSERT INTO `audit_log` VALUES("975","2","Delivery order KOT 170726-9 has been send","order","2017-07-26 15:26:41");
INSERT INTO `audit_log` VALUES("976","2","Cash payment for delivery order has been made for the amount of Rs. 308","billing","2017-07-26 15:27:03");
INSERT INTO `audit_log` VALUES("977","2","Table \'<b>Table - 17</b>\' has been closed ","table","2017-07-26 15:31:37");
INSERT INTO `audit_log` VALUES("978","2","Table \'<b>Table - 7</b>\' has been closed ","table","2017-07-26 15:31:40");
INSERT INTO `audit_log` VALUES("979","2","Table \'<b>Table - 8</b>\' has been closed ","table","2017-07-26 15:31:44");
INSERT INTO `audit_log` VALUES("980","2","Table \'<b>Table - 9</b>\' has been closed ","table","2017-07-26 15:31:46");
INSERT INTO `audit_log` VALUES("981","2","Table \'<b>Table - 11</b>\' has been closed ","table","2017-07-26 15:31:49");
INSERT INTO `audit_log` VALUES("982","2","Table \'<b>Table - 13</b>\' has been closed ","table","2017-07-26 15:31:51");
INSERT INTO `audit_log` VALUES("983","2","Table \'<b>Table - 16</b>\' has been closed ","table","2017-07-26 15:31:54");
INSERT INTO `audit_log` VALUES("984","2","Table \'<b>Table - 10</b>\' has been closed ","table","2017-07-26 15:31:57");
INSERT INTO `audit_log` VALUES("985","2","Table \'<b>Table - 12</b>\' has been closed ","table","2017-07-26 15:32:00");
INSERT INTO `audit_log` VALUES("986","2","Table \'<b>Table - 6</b>\' has been closed ","table","2017-07-26 15:32:07");
INSERT INTO `audit_log` VALUES("987","2","Table \'<b>Table - 5</b>\' has been closed ","table","2017-07-26 15:32:09");
INSERT INTO `audit_log` VALUES("988","2","Table \'<b>Table - 3</b>\' has been closed ","table","2017-07-26 15:32:12");
INSERT INTO `audit_log` VALUES("989","2","Cash payment for table order has been made for the amount of Rs. 932","billing","2017-07-26 15:36:08");
INSERT INTO `audit_log` VALUES("990","2","Table \'<b>Table - 4</b>\' has been closed ","table","2017-07-26 15:36:08");
INSERT INTO `audit_log` VALUES("991","2","Table \'<b>Table - 4</b>\' has been occupied ","table","2017-07-26 15:36:12");
INSERT INTO `audit_log` VALUES("992","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-07-26 15:36:18");
INSERT INTO `audit_log` VALUES("993","2","Table \'<b>Table - 15</b>\' has been occupied ","table","2017-07-26 15:36:26");
INSERT INTO `audit_log` VALUES("994","2","Table order KOT number 170726-10 has been send","order","2017-07-26 15:36:35");
INSERT INTO `audit_log` VALUES("995","2","Table order KOT number 170726-11 has been send","order","2017-07-26 15:36:45");
INSERT INTO `audit_log` VALUES("996","2","Table order KOT number 170726-12 has been send","order","2017-07-26 15:36:59");
INSERT INTO `audit_log` VALUES("997","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-07-26 15:48:55");
INSERT INTO `audit_log` VALUES("998","2","Table order KOT number 170726-13 has been send","order","2017-07-26 15:49:14");
INSERT INTO `audit_log` VALUES("999","2","Table order KOT number 170726-14 has been send","order","2017-07-26 15:49:17");
INSERT INTO `audit_log` VALUES("1000","2","Item wise payment has been made for the amount of Rs. 373","billing","2017-07-26 15:49:23");
INSERT INTO `audit_log` VALUES("1001","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-07-26 16:31:51");
INSERT INTO `audit_log` VALUES("1002","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-07-26 16:34:34");
INSERT INTO `audit_log` VALUES("1003","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-07-26 16:36:02");
INSERT INTO `audit_log` VALUES("1004","2","<b>Administrator</b> Logged onto the system","user","2017-07-27 10:11:24");
INSERT INTO `audit_log` VALUES("1005","2","Database has been backuped by the user <b>Administrator</b>","database","2017-07-27 10:11:56");
INSERT INTO `audit_log` VALUES("1006","2","<b>Administrator</b> Logged out of the system","user","2017-07-27 10:11:57");
INSERT INTO `audit_log` VALUES("1007","5","<b>Staff</b> Logged onto the system","user","2017-07-27 10:12:06");
INSERT INTO `audit_log` VALUES("1008","5","2 - stock item 1 has been sold","stock","2017-07-27 10:25:13");
INSERT INTO `audit_log` VALUES("1009","5","20 - stock item 2 has been sold","stock","2017-07-27 10:25:13");
INSERT INTO `audit_log` VALUES("1010","5","Cash payment for table order has been made for the amount of Rs. 1813","billing","2017-07-27 10:25:14");
INSERT INTO `audit_log` VALUES("1011","5","Table \'<b>Table - 4</b>\' has been closed ","table","2017-07-27 10:25:14");
INSERT INTO `audit_log` VALUES("1012","5","<b>Staff</b> Logged out of the system","user","2017-07-27 10:25:37");
INSERT INTO `audit_log` VALUES("1013","2","<b>Administrator</b> Logged out of the system","user","2017-07-27 10:27:28");
INSERT INTO `audit_log` VALUES("1014","2","<b>Administrator</b> Logged onto the system","user","2017-07-27 10:27:36");
INSERT INTO `audit_log` VALUES("1015","2","Table \'<b>Table - 4</b>\' has been occupied ","table","2017-07-27 10:27:42");
INSERT INTO `audit_log` VALUES("1016","2","Table order KOT number 170727-1 has been send","order","2017-07-27 10:27:52");
INSERT INTO `audit_log` VALUES("1017","2","<b>Administrator</b> Logged out of the system","user","2017-07-27 11:26:23");
INSERT INTO `audit_log` VALUES("1018","2","<b>Administrator</b> Logged onto the system","user","2017-07-27 11:26:38");
INSERT INTO `audit_log` VALUES("1019","2","<b>Administrator</b> Logged onto the system","user","2017-07-31 10:11:00");
INSERT INTO `audit_log` VALUES("1020","2","Cash payment for table order has been made for the amount of Rs. 845","billing","2017-07-31 11:08:32");
INSERT INTO `audit_log` VALUES("1021","2","Table \'<b>Table - 4</b>\' has been closed ","table","2017-07-31 11:08:32");
INSERT INTO `audit_log` VALUES("1022","2","Database has been backuped by the user <b>Administrator</b>","database","2017-07-31 11:13:38");
INSERT INTO `audit_log` VALUES("1023","2","<b>Administrator</b> Logged out of the system","user","2017-07-31 11:13:40");
INSERT INTO `audit_log` VALUES("1024","2","<b>Administrator</b> Logged onto the system","user","2017-07-31 11:14:04");
INSERT INTO `audit_log` VALUES("1025","2","Floor has been added","table","2017-07-31 11:14:52");
INSERT INTO `audit_log` VALUES("1026","2","New table has been created named Table - 19","table","2017-07-31 11:16:30");
INSERT INTO `audit_log` VALUES("1027","2","Table \'<b>Table - 19</b>\' has been occupied ","table","2017-07-31 11:18:15");
INSERT INTO `audit_log` VALUES("1028","2","Table order KOT number 170731-1 has been send","order","2017-07-31 11:19:36");
INSERT INTO `audit_log` VALUES("1029","2","Item wise payment has been made for the amount of Rs. 224","billing","2017-07-31 11:22:48");
INSERT INTO `audit_log` VALUES("1030","2","Sales has been returned for the invoice number - 18-18","billing","2017-07-31 11:28:01");
INSERT INTO `audit_log` VALUES("1031","2","Product named -Stock Item 20 Ml has been added","misc","2017-07-31 11:33:07");
INSERT INTO `audit_log` VALUES("1032","2","Database has been backuped by the user <b>Administrator</b>","database","2017-07-31 11:50:02");
INSERT INTO `audit_log` VALUES("1033","5","<b>Staff</b> Logged onto the system","user","2017-08-02 17:21:13");
INSERT INTO `audit_log` VALUES("1034","5","<b>Staff</b> Logged out of the system","user","2017-08-02 17:21:35");
INSERT INTO `audit_log` VALUES("1035","2","<b>Administrator</b> Logged onto the system","user","2017-08-02 17:21:42");
INSERT INTO `audit_log` VALUES("1036","2","Cash payment for table order has been made for the amount of Rs. 814","billing","2017-08-02 17:21:57");
INSERT INTO `audit_log` VALUES("1037","2","Table \'<b>Table - 19</b>\' has been closed ","table","2017-08-02 17:21:57");
INSERT INTO `audit_log` VALUES("1038","2","Database has been backuped by the user <b>Administrator</b>","database","2017-08-02 17:22:13");
INSERT INTO `audit_log` VALUES("1039","5","<b>Staff</b> Logged onto the system","user","2017-08-02 17:27:03");
INSERT INTO `audit_log` VALUES("1040","2","<b>Administrator</b> Logged onto the system","user","2017-08-03 10:14:41");
INSERT INTO `audit_log` VALUES("1041","2","Table \'<b>Table - 14</b>\' has been occupied ","table","2017-08-03 12:58:53");
INSERT INTO `audit_log` VALUES("1042","2","Table order KOT number 170803-1 has been send","order","2017-08-03 12:59:01");
INSERT INTO `audit_log` VALUES("1043","2","Item wise payment has been made for the amount of Rs. 213","billing","2017-08-03 13:05:04");
INSERT INTO `audit_log` VALUES("1044","2","Cash payment for table order has been made for the amount of Rs. 461","billing","2017-08-03 13:05:53");
INSERT INTO `audit_log` VALUES("1045","2","Table \'<b>Table - 14</b>\' has been closed ","table","2017-08-03 13:05:53");
INSERT INTO `audit_log` VALUES("1046","2","<b>Administrator</b> Logged onto the system","user","2017-08-11 10:42:59");
INSERT INTO `audit_log` VALUES("1047","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-08-11 10:47:48");
INSERT INTO `audit_log` VALUES("1048","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-08-11 10:47:58");
INSERT INTO `audit_log` VALUES("1049","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-08-11 10:53:08");
INSERT INTO `audit_log` VALUES("1050","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-08-11 10:53:22");
INSERT INTO `audit_log` VALUES("1051","2","<b>Administrator</b> Logged out of the system","user","2017-08-23 12:44:11");
INSERT INTO `audit_log` VALUES("1052","2","<b>Administrator</b> Logged onto the system","user","2017-08-23 12:44:23");
INSERT INTO `audit_log` VALUES("1053","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-08-23 15:22:27");
INSERT INTO `audit_log` VALUES("1054","2","<b>Administrator</b> Logged onto the system","user","2017-08-30 12:16:23");
INSERT INTO `audit_log` VALUES("1055","2","Database has been backuped by the user <b>Administrator</b>","database","2017-08-30 14:24:39");
INSERT INTO `audit_log` VALUES("1056","2","<b>Administrator</b> Logged out of the system","user","2017-08-30 14:24:40");
INSERT INTO `audit_log` VALUES("1057","2","<b>Administrator</b> Logged onto the system","user","2017-08-30 14:25:31");
INSERT INTO `audit_log` VALUES("1058","2","<b>Administrator</b> Logged onto the system","user","2017-09-04 13:25:11");
INSERT INTO `audit_log` VALUES("1059","2","New table has been created named Table - 20","table","2017-09-04 13:25:52");
INSERT INTO `audit_log` VALUES("1060","2","Table order KOT number 170904-1 has been send","order","2017-09-04 13:26:12");
INSERT INTO `audit_log` VALUES("1061","2","<b>Administrator</b> Logged onto the system","user","2017-09-05 17:15:41");
INSERT INTO `audit_log` VALUES("1062","2","<b>Administrator</b> Logged onto the system","user","2017-09-06 16:11:28");
INSERT INTO `audit_log` VALUES("1063","2","<b>Administrator</b> Logged onto the system","user","2017-09-13 10:42:54");
INSERT INTO `audit_log` VALUES("1064","2","Changed password of user -Administrator\'administrator\'","user","2017-09-13 10:43:14");
INSERT INTO `audit_log` VALUES("1065","2","Database has been backuped by the user <b>Administrator</b>","database","2017-09-13 10:43:26");
INSERT INTO `audit_log` VALUES("1066","2","<b>Administrator</b> Logged out of the system","user","2017-09-13 10:43:27");
INSERT INTO `audit_log` VALUES("1067","2","<b>Administrator</b> Logged onto the system","user","2017-09-13 10:43:36");
INSERT INTO `audit_log` VALUES("1068","2","<b>Administrator</b> Logged onto the system","user","2017-09-13 10:45:14");
INSERT INTO `audit_log` VALUES("1069","2","Tip amount 100 has been distributed","tip","2017-09-13 10:58:27");
INSERT INTO `audit_log` VALUES("1070","2","New table has been created named Table - 21","table","2017-09-13 11:01:34");
INSERT INTO `audit_log` VALUES("1071","2","New obstacle has been created named -Obstacle - 5 on the floor no. 1","table","2017-09-13 11:01:40");
INSERT INTO `audit_log` VALUES("1072","2","Table \'<b>Table - 15</b>\' has been occupied ","table","2017-09-13 11:01:47");
INSERT INTO `audit_log` VALUES("1073","2","Table order KOT number 170913-1 has been send","order","2017-09-13 11:01:59");
INSERT INTO `audit_log` VALUES("1074","2","Item wise payment has been made for the amount of Rs. 224","billing","2017-09-13 11:02:45");
INSERT INTO `audit_log` VALUES("1075","2","<b>Administrator</b> Logged onto the system","user","2017-09-13 11:09:15");
INSERT INTO `audit_log` VALUES("1076","2","<b>Administrator</b> Logged onto the system","user","2017-09-13 15:51:37");
INSERT INTO `audit_log` VALUES("1077","2","Database has been backuped by the user <b>Administrator</b>","database","2017-09-13 15:52:21");
INSERT INTO `audit_log` VALUES("1078","2","Database has been backuped by the user <b>Administrator</b>","database","2017-09-13 15:52:29");
INSERT INTO `audit_log` VALUES("1079","2","<b>Administrator</b> Logged out of the system","user","2017-09-13 15:52:32");
INSERT INTO `audit_log` VALUES("1080","2","<b>Administrator</b> Logged onto the system","user","2017-09-13 15:53:14");
INSERT INTO `audit_log` VALUES("1081","2","<b>Administrator</b> Logged onto the system","user","2017-09-26 12:38:37");
INSERT INTO `audit_log` VALUES("1082","2","<b>Administrator</b> Logged onto the system","user","2017-10-16 15:38:17");
INSERT INTO `audit_log` VALUES("1083","2","<b>Administrator</b> Logged onto the system","user","2017-10-30 12:30:00");
INSERT INTO `audit_log` VALUES("1084","2","Cash payment for table order has been made for the amount of Rs. 566","billing","2017-10-30 12:30:31");
INSERT INTO `audit_log` VALUES("1085","2","Table \'<b>Table - 15</b>\' has been closed ","table","2017-10-30 12:30:32");
INSERT INTO `audit_log` VALUES("1086","2","Cash payment for table order has been made for the amount of Rs. 665","billing","2017-10-30 12:30:46");
INSERT INTO `audit_log` VALUES("1087","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-10-30 12:30:47");
INSERT INTO `audit_log` VALUES("1088","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-10-30 12:54:10");
INSERT INTO `audit_log` VALUES("1089","2","Table order KOT number 171030-1 has been send","order","2017-10-30 12:54:17");
INSERT INTO `audit_log` VALUES("1090","2","<b>Administrator</b> Logged onto the system","user","2017-11-02 11:56:27");
INSERT INTO `audit_log` VALUES("1091","2","<b>Administrator</b> Logged out of the system","user","2017-11-10 16:08:51");
INSERT INTO `audit_log` VALUES("1092","2","<b>Administrator</b> Logged out of the system","user","2017-11-22 13:21:49");
INSERT INTO `audit_log` VALUES("1093","2","<b>Administrator</b> Logged onto the system","user","2017-11-22 13:21:57");
INSERT INTO `audit_log` VALUES("1094","2","Retail order KOT 171122-1 has been send","order","2017-11-22 13:58:15");
INSERT INTO `audit_log` VALUES("1095","2","Retail order KOT 171122-2 has been send","order","2017-11-22 13:59:35");
INSERT INTO `audit_log` VALUES("1096","2","<b>Administrator</b> Logged out of the system","user","2017-11-22 14:04:39");
INSERT INTO `audit_log` VALUES("1097","2","<b>Administrator</b> Logged onto the system","user","2017-11-22 14:04:46");
INSERT INTO `audit_log` VALUES("1098","2","Retail order KOT 171122-3 has been send","order","2017-11-22 14:05:27");
INSERT INTO `audit_log` VALUES("1099","2","Cash payment for retail order has been made for the amount of Rs. 311","billing","2017-11-22 14:08:42");
INSERT INTO `audit_log` VALUES("1100","2","Cash payment for table order has been made for the amount of Rs. 472","billing","2017-11-22 14:15:31");
INSERT INTO `audit_log` VALUES("1101","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-11-22 14:15:31");
INSERT INTO `audit_log` VALUES("1102","2","<b>Administrator</b> Logged onto the system","user","2017-12-04 12:36:50");
INSERT INTO `audit_log` VALUES("1103","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-12-04 12:38:11");
INSERT INTO `audit_log` VALUES("1104","2","Table \'<b>Table - 1</b>\' has been closed ","table","2017-12-04 12:40:41");
INSERT INTO `audit_log` VALUES("1105","2","<b>Administrator</b> Logged onto the system","user","2017-12-04 17:06:58");
INSERT INTO `audit_log` VALUES("1106","2","<b>Administrator</b> Logged onto the system","user","2017-12-05 11:40:34");
INSERT INTO `audit_log` VALUES("1107","2","<b>Administrator</b> Logged out of the system","user","2017-12-05 12:21:53");
INSERT INTO `audit_log` VALUES("1108","2","<b>Administrator</b> Logged onto the system","user","2017-12-05 12:21:59");
INSERT INTO `audit_log` VALUES("1109","2","Table \'<b>Table - 15</b>\' has been occupied ","table","2017-12-05 15:07:42");
INSERT INTO `audit_log` VALUES("1110","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-05 16:11:34");
INSERT INTO `audit_log` VALUES("1111","2","<b>Administrator</b> Logged onto the system","user","2017-12-06 10:33:01");
INSERT INTO `audit_log` VALUES("1112","2","<b>Administrator</b> Logged onto the system","user","2017-12-06 11:07:35");
INSERT INTO `audit_log` VALUES("1113","2","Table order KOT number 171206-1 has been send","order","2017-12-06 14:17:34");
INSERT INTO `audit_log` VALUES("1114","2","Take away order KOT 171206-2 has been send","order","2017-12-06 14:32:53");
INSERT INTO `audit_log` VALUES("1115","2","Cash payment for take away order has been made for the amount of Rs. 249","billing","2017-12-06 14:33:08");
INSERT INTO `audit_log` VALUES("1116","2","Take away order KOT 171206-3 has been send","order","2017-12-06 14:33:18");
INSERT INTO `audit_log` VALUES("1117","2","Cash payment for take away order has been made for the amount of Rs. 249","billing","2017-12-06 14:33:24");
INSERT INTO `audit_log` VALUES("1118","2","Take away order KOT 171206-4 has been send","order","2017-12-06 14:34:44");
INSERT INTO `audit_log` VALUES("1119","2","Cash payment for take away order has been made for the amount of Rs. 249","billing","2017-12-06 14:34:49");
INSERT INTO `audit_log` VALUES("1120","2","<b>Administrator</b> Logged out of the system","user","2017-12-06 14:42:31");
INSERT INTO `audit_log` VALUES("1121","2","<b>Administrator</b> Logged onto the system","user","2017-12-06 14:42:38");
INSERT INTO `audit_log` VALUES("1122","2","Cash payment for table order has been made for the amount of Rs. 566","billing","2017-12-06 14:44:10");
INSERT INTO `audit_log` VALUES("1123","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-06 14:44:10");
INSERT INTO `audit_log` VALUES("1124","2","<b>Administrator</b> Logged out of the system","user","2017-12-06 15:34:32");
INSERT INTO `audit_log` VALUES("1125","2","<b>Administrator</b> Logged onto the system","user","2017-12-06 15:34:39");
INSERT INTO `audit_log` VALUES("1126","2","Table order KOT number 171206-5 has been send","order","2017-12-06 15:49:06");
INSERT INTO `audit_log` VALUES("1127","2","Table order KOT number 171206-6 has been send","order","2017-12-06 15:54:09");
INSERT INTO `audit_log` VALUES("1128","2","Credit table order has been made for the amount of Rs. 1380 on the debtor named -sugen","billing","2017-12-06 16:05:08");
INSERT INTO `audit_log` VALUES("1129","2","Table \'<b>Table - 15</b>\' has been closed ","table","2017-12-06 16:05:09");
INSERT INTO `audit_log` VALUES("1130","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-06 17:09:46");
INSERT INTO `audit_log` VALUES("1131","2","<b>Administrator</b> Logged onto the system","user","2017-12-08 10:36:33");
INSERT INTO `audit_log` VALUES("1132","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-08 10:36:38");
INSERT INTO `audit_log` VALUES("1133","2","<b>Administrator</b> Logged out of the system","user","2017-12-08 10:36:40");
INSERT INTO `audit_log` VALUES("1134","2","<b>Administrator</b> Logged onto the system","user","2017-12-08 10:37:40");
INSERT INTO `audit_log` VALUES("1135","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-08 10:38:01");
INSERT INTO `audit_log` VALUES("1136","2","<b>Administrator</b> Logged out of the system","user","2017-12-08 10:38:02");
INSERT INTO `audit_log` VALUES("1137","2","<b>Administrator</b> Logged onto the system","user","2017-12-08 10:38:12");
INSERT INTO `audit_log` VALUES("1138","2","Table order KOT number 171208-1 has been send","order","2017-12-08 12:39:10");
INSERT INTO `audit_log` VALUES("1139","2","Cash payment for table order has been made for the amount of Rs. 317","billing","2017-12-08 12:39:57");
INSERT INTO `audit_log` VALUES("1140","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-08 12:39:57");
INSERT INTO `audit_log` VALUES("1141","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-08 12:50:07");
INSERT INTO `audit_log` VALUES("1142","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-08 12:50:33");
INSERT INTO `audit_log` VALUES("1143","2","Table \'<b>Table - 4</b>\' has been occupied ","table","2017-12-08 13:10:49");
INSERT INTO `audit_log` VALUES("1144","2","Table \'<b>Table - 4</b>\' has been closed ","table","2017-12-08 13:11:06");
INSERT INTO `audit_log` VALUES("1145","2","Updated user detail of -Administrator\'administrator\' from \'1\' to \'0\'","user","2017-12-08 13:14:13");
INSERT INTO `audit_log` VALUES("1146","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-08 13:15:04");
INSERT INTO `audit_log` VALUES("1147","2","<b>Administrator</b> Logged out of the system","user","2017-12-08 13:15:05");
INSERT INTO `audit_log` VALUES("1148","2","<b>Administrator</b> Logged onto the system","user","2017-12-08 13:15:15");
INSERT INTO `audit_log` VALUES("1149","2","<b>Administrator</b> Logged out of the system","user","2017-12-08 17:06:32");
INSERT INTO `audit_log` VALUES("1150","2","<b>Administrator</b> Logged onto the system","user","2017-12-08 17:06:43");
INSERT INTO `audit_log` VALUES("1151","2","<b>Administrator</b> Logged out of the system","user","2017-12-08 17:52:45");
INSERT INTO `audit_log` VALUES("1152","2","<b>Administrator</b> Logged onto the system","user","2017-12-08 17:52:53");
INSERT INTO `audit_log` VALUES("1153","2","<b>Administrator</b> Logged out of the system","user","2017-12-11 10:30:06");
INSERT INTO `audit_log` VALUES("1154","2","<b>Administrator</b> Logged onto the system","user","2017-12-11 10:47:55");
INSERT INTO `audit_log` VALUES("1155","2","Setting has been updated from NPR to usd","setting","2017-12-11 11:48:14");
INSERT INTO `audit_log` VALUES("1156","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-11 11:52:30");
INSERT INTO `audit_log` VALUES("1157","2","<b>Administrator</b> Logged out of the system","user","2017-12-11 11:52:32");
INSERT INTO `audit_log` VALUES("1158","2","<b>Administrator</b> Logged out of the system","user","2017-12-11 11:54:00");
INSERT INTO `audit_log` VALUES("1159","2","<b>Administrator</b> Logged onto the system","user","2017-12-11 11:54:06");
INSERT INTO `audit_log` VALUES("1160","2","<b>Administrator</b> Logged out of the system","user","2017-12-11 11:57:38");
INSERT INTO `audit_log` VALUES("1161","2","<b>Administrator</b> Logged out of the system","user","2017-12-11 11:58:26");
INSERT INTO `audit_log` VALUES("1162","2","<b>Administrator</b> Logged out of the system","user","2017-12-11 11:59:18");
INSERT INTO `audit_log` VALUES("1163","2","<b>Administrator</b> Logged out of the system","user","2017-12-11 12:00:22");
INSERT INTO `audit_log` VALUES("1164","2","<b>Administrator</b> Logged out of the system","user","2017-12-11 12:01:28");
INSERT INTO `audit_log` VALUES("1165","2","<b>Administrator</b> Logged out of the system","user","2017-12-11 12:02:20");
INSERT INTO `audit_log` VALUES("1166","2","<b>Administrator</b> Logged out of the system","user","2017-12-11 12:02:39");
INSERT INTO `audit_log` VALUES("1167","2","<b>Administrator</b> Logged out of the system","user","2017-12-11 12:03:06");
INSERT INTO `audit_log` VALUES("1168","2","<b>Administrator</b> Logged out of the system","user","2017-12-11 12:04:38");
INSERT INTO `audit_log` VALUES("1169","2","<b>Administrator</b> Logged onto the system","user","2017-12-11 12:04:44");
INSERT INTO `audit_log` VALUES("1170","2","<b>Administrator</b> Logged out of the system","user","2017-12-11 12:05:34");
INSERT INTO `audit_log` VALUES("1171","2","<b>Administrator</b> Logged onto the system","user","2017-12-11 12:05:41");
INSERT INTO `audit_log` VALUES("1172","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-11 12:11:28");
INSERT INTO `audit_log` VALUES("1173","2","<b>Administrator</b> Logged out of the system","user","2017-12-11 12:11:28");
INSERT INTO `audit_log` VALUES("1174","2","<b>Administrator</b> Logged onto the system","user","2017-12-11 12:11:35");
INSERT INTO `audit_log` VALUES("1175","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-11 12:41:28");
INSERT INTO `audit_log` VALUES("1176","2","<b>Administrator</b> Logged out of the system","user","2017-12-11 12:41:29");
INSERT INTO `audit_log` VALUES("1177","2","<b>Administrator</b> Logged out of the system","user","2017-12-11 12:42:23");
INSERT INTO `audit_log` VALUES("1178","2","<b>Administrator</b> Logged onto the system","user","2017-12-11 12:42:32");
INSERT INTO `audit_log` VALUES("1179","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-11 12:56:33");
INSERT INTO `audit_log` VALUES("1180","2","Setting has been updated from usd to npr","setting","2017-12-11 13:06:12");
INSERT INTO `audit_log` VALUES("1181","2","Table order KOT number 171211-1 has been send","order","2017-12-11 13:09:57");
INSERT INTO `audit_log` VALUES("1182","2","<b>Administrator</b> Logged onto the system","user","2017-12-12 10:40:53");
INSERT INTO `audit_log` VALUES("1183","2","Table named \'Table - 18\' has been deleted","table","2017-12-12 12:12:12");
INSERT INTO `audit_log` VALUES("1184","2","<b>Administrator</b> Logged out of the system","user","2017-12-12 12:20:12");
INSERT INTO `audit_log` VALUES("1185","2","<b>Administrator</b> Logged onto the system","user","2017-12-12 12:20:19");
INSERT INTO `audit_log` VALUES("1186","2","Booking has been made","table","2017-12-12 12:21:15");
INSERT INTO `audit_log` VALUES("1187","2","Booking has been made","table","2017-12-12 12:21:33");
INSERT INTO `audit_log` VALUES("1188","2","Booking has been made","table","2017-12-12 12:23:30");
INSERT INTO `audit_log` VALUES("1189","2","Table \'<b>Table - 17</b>\' has been occupied ","table","2017-12-12 12:35:29");
INSERT INTO `audit_log` VALUES("1190","2","Table \'<b>Table - 17</b>\' has been closed ","table","2017-12-12 12:35:38");
INSERT INTO `audit_log` VALUES("1191","2","Table \'<b>Table - 15</b>\' has been occupied ","table","2017-12-12 12:40:16");
INSERT INTO `audit_log` VALUES("1192","2","Table \'<b>Table - 15</b>\' has been closed ","table","2017-12-12 12:40:50");
INSERT INTO `audit_log` VALUES("1193","2","Table \'<b>Table - 15</b>\' has been occupied ","table","2017-12-12 13:04:53");
INSERT INTO `audit_log` VALUES("1194","2","Table \'<b>Table - 15</b>\' has been closed ","table","2017-12-12 13:05:04");
INSERT INTO `audit_log` VALUES("1195","2","Table \'<b>Table - 21</b>\' has been occupied ","table","2017-12-12 13:05:08");
INSERT INTO `audit_log` VALUES("1196","2","Table order KOT number 171212-1 has been send","order","2017-12-12 13:05:13");
INSERT INTO `audit_log` VALUES("1197","2","Occupancy has been moved to the table \'<b>Table - 15</b>\'","table","2017-12-12 13:05:26");
INSERT INTO `audit_log` VALUES("1198","2","Occupancy has been moved to the table \'<b>Table - 5</b>\'","table","2017-12-12 13:06:22");
INSERT INTO `audit_log` VALUES("1199","2","Occupancy has been moved to the table \'<b>Table - 21</b>\'","table","2017-12-12 13:06:38");
INSERT INTO `audit_log` VALUES("1200","2","<b>Administrator</b> Logged onto the system","user","2017-12-12 14:50:38");
INSERT INTO `audit_log` VALUES("1201","2","<b>Administrator</b> Logged onto the system","user","2017-12-12 15:23:39");
INSERT INTO `audit_log` VALUES("1202","2","<b>Administrator</b> Logged out of the system","user","2017-12-12 15:41:33");
INSERT INTO `audit_log` VALUES("1203","2","<b>Administrator</b> Logged onto the system","user","2017-12-12 15:41:41");
INSERT INTO `audit_log` VALUES("1204","2","Setting has been updated from 13 to -1","setting","2017-12-12 15:46:25");
INSERT INTO `audit_log` VALUES("1205","2","Setting has been updated from -1 to 13","setting","2017-12-12 15:48:33");
INSERT INTO `audit_log` VALUES("1206","2","Setting has been updated from -1 to 1","setting","2017-12-12 15:48:40");
INSERT INTO `audit_log` VALUES("1207","2","Setting has been updated from -1 to 13","setting","2017-12-12 15:48:42");
INSERT INTO `audit_log` VALUES("1208","2","Setting has been updated from 10 to 10sadfadsf","setting","2017-12-12 15:51:01");
INSERT INTO `audit_log` VALUES("1209","2","Setting has been updated from 10 to 10","setting","2017-12-12 15:51:05");
INSERT INTO `audit_log` VALUES("1210","2","Setting has been updated from 10 to 12","setting","2017-12-12 15:53:55");
INSERT INTO `audit_log` VALUES("1211","2","Setting has been updated from 10 to 10","setting","2017-12-12 15:53:58");
INSERT INTO `audit_log` VALUES("1212","2","Occupancy has been moved to the table \'<b>Table - 4</b>\'","table","2017-12-12 15:56:42");
INSERT INTO `audit_log` VALUES("1213","2","Occupancy has been moved to the table \'<b>Table - 3</b>\'","table","2017-12-12 15:57:03");
INSERT INTO `audit_log` VALUES("1214","2","Occupancy has been moved to the table \'<b>Table - 20</b>\'","table","2017-12-12 15:57:17");
INSERT INTO `audit_log` VALUES("1215","2","Occupancy has been moved to the table \'<b>Table - 2</b>\'","table","2017-12-12 16:02:12");
INSERT INTO `audit_log` VALUES("1216","2","Occupancy has been moved to the table \'<b>Table - 20</b>\'","table","2017-12-12 16:03:09");
INSERT INTO `audit_log` VALUES("1217","2","Occupancy has been moved to the table \'<b>Table - 2</b>\'","table","2017-12-12 16:03:18");
INSERT INTO `audit_log` VALUES("1218","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-12 16:14:04");
INSERT INTO `audit_log` VALUES("1219","2","<b>Administrator</b> Logged out of the system","user","2017-12-12 16:14:05");
INSERT INTO `audit_log` VALUES("1220","2","<b>Administrator</b> Logged out of the system","user","2017-12-12 17:17:56");
INSERT INTO `audit_log` VALUES("1221","2","<b>Administrator</b> Logged onto the system","user","2017-12-12 17:18:07");
INSERT INTO `audit_log` VALUES("1222","2","<b>Administrator</b> Logged onto the system","user","2017-12-13 10:33:05");
INSERT INTO `audit_log` VALUES("1223","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-13 10:39:51");
INSERT INTO `audit_log` VALUES("1224","2","<b>Administrator</b> Logged out of the system","user","2017-12-13 10:39:52");
INSERT INTO `audit_log` VALUES("1225","2","<b>Administrator</b> Logged onto the system","user","2017-12-13 10:40:04");
INSERT INTO `audit_log` VALUES("1226","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-13 10:40:33");
INSERT INTO `audit_log` VALUES("1227","2","<b>Administrator</b> Logged out of the system","user","2017-12-13 10:40:33");
INSERT INTO `audit_log` VALUES("1228","2","<b>Administrator</b> Logged onto the system","user","2017-12-13 10:40:40");
INSERT INTO `audit_log` VALUES("1229","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-13 10:43:51");
INSERT INTO `audit_log` VALUES("1230","2","<b>Administrator</b> Logged out of the system","user","2017-12-13 10:43:51");
INSERT INTO `audit_log` VALUES("1231","2","<b>Administrator</b> Logged onto the system","user","2017-12-13 10:44:07");
INSERT INTO `audit_log` VALUES("1232","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-13 10:52:48");
INSERT INTO `audit_log` VALUES("1233","2","<b>Administrator</b> Logged out of the system","user","2017-12-13 10:52:48");
INSERT INTO `audit_log` VALUES("1234","2","<b>Administrator</b> Logged onto the system","user","2017-12-13 10:52:55");
INSERT INTO `audit_log` VALUES("1235","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-13 10:53:26");
INSERT INTO `audit_log` VALUES("1236","2","<b>Administrator</b> Logged out of the system","user","2017-12-13 10:53:27");
INSERT INTO `audit_log` VALUES("1237","2","<b>Administrator</b> Logged onto the system","user","2017-12-13 10:53:34");
INSERT INTO `audit_log` VALUES("1238","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-13 10:53:52");
INSERT INTO `audit_log` VALUES("1239","2","<b>Administrator</b> Logged out of the system","user","2017-12-13 10:53:53");
INSERT INTO `audit_log` VALUES("1240","2","<b>Administrator</b> Logged onto the system","user","2017-12-13 10:54:00");
INSERT INTO `audit_log` VALUES("1241","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-13 11:09:21");
INSERT INTO `audit_log` VALUES("1242","2","<b>Administrator</b> Logged out of the system","user","2017-12-13 11:09:21");
INSERT INTO `audit_log` VALUES("1243","2","<b>Administrator</b> Logged onto the system","user","2017-12-13 11:09:28");
INSERT INTO `audit_log` VALUES("1244","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-13 12:00:53");
INSERT INTO `audit_log` VALUES("1245","2","<b>Administrator</b> Logged out of the system","user","2017-12-13 12:00:54");
INSERT INTO `audit_log` VALUES("1246","2","<b>Administrator</b> Logged onto the system","user","2017-12-13 12:01:03");
INSERT INTO `audit_log` VALUES("1247","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-13 12:01:44");
INSERT INTO `audit_log` VALUES("1248","2","<b>Administrator</b> Logged out of the system","user","2017-12-13 12:01:45");
INSERT INTO `audit_log` VALUES("1249","2","<b>Administrator</b> Logged onto the system","user","2017-12-13 12:02:08");
INSERT INTO `audit_log` VALUES("1250","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-13 12:02:45");
INSERT INTO `audit_log` VALUES("1251","2","<b>Administrator</b> Logged out of the system","user","2017-12-13 12:02:46");
INSERT INTO `audit_log` VALUES("1252","2","<b>Administrator</b> Logged onto the system","user","2017-12-13 12:08:44");
INSERT INTO `audit_log` VALUES("1253","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-13 12:41:20");
INSERT INTO `audit_log` VALUES("1254","2","<b>Administrator</b> Logged out of the system","user","2017-12-13 12:41:21");
INSERT INTO `audit_log` VALUES("1255","2","<b>Administrator</b> Logged onto the system","user","2017-12-13 12:41:29");
INSERT INTO `audit_log` VALUES("1256","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-13 12:41:47");
INSERT INTO `audit_log` VALUES("1257","2","<b>Administrator</b> Logged out of the system","user","2017-12-13 12:41:48");
INSERT INTO `audit_log` VALUES("1258","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-13 13:14:39");
INSERT INTO `audit_log` VALUES("1259","2","<b>Administrator</b> Logged out of the system","user","2017-12-13 13:14:40");
INSERT INTO `audit_log` VALUES("1260","2","<b>Administrator</b> Logged onto the system","user","2017-12-13 14:13:38");
INSERT INTO `audit_log` VALUES("1261","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-13 14:13:43");
INSERT INTO `audit_log` VALUES("1262","2","<b>Administrator</b> Logged out of the system","user","2017-12-13 14:13:44");
INSERT INTO `audit_log` VALUES("1263","2","<b>Administrator</b> Logged onto the system","user","2017-12-13 14:14:59");
INSERT INTO `audit_log` VALUES("1264","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-13 14:15:31");
INSERT INTO `audit_log` VALUES("1265","2","<b>Administrator</b> Logged out of the system","user","2017-12-13 14:15:32");
INSERT INTO `audit_log` VALUES("1266","2","<b>Administrator</b> Logged out of the system","user","2017-12-13 14:16:00");
INSERT INTO `audit_log` VALUES("1267","2","<b>Administrator</b> Logged onto the system","user","2017-12-13 14:16:08");
INSERT INTO `audit_log` VALUES("1282","2","<b>Administrator</b> Logged onto the system","user","2017-12-13 14:31:56");
INSERT INTO `audit_log` VALUES("1283","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-13 14:32:47");
INSERT INTO `audit_log` VALUES("1284","2","<b>Administrator</b> Logged out of the system","user","2017-12-13 14:32:47");
INSERT INTO `audit_log` VALUES("1285","2","<b>Administrator</b> Logged onto the system","user","2017-12-13 14:33:06");
INSERT INTO `audit_log` VALUES("1286","2","Cash payment for table order has been made for the amount of Rs. 342","billing","2017-12-13 14:38:39");
INSERT INTO `audit_log` VALUES("1287","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-13 14:38:40");
INSERT INTO `audit_log` VALUES("1288","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-13 14:40:58");
INSERT INTO `audit_log` VALUES("1289","2","<b>Administrator</b> Logged out of the system","user","2017-12-13 14:40:59");
INSERT INTO `audit_log` VALUES("1296","2","<b>Administrator</b> Logged onto the system","user","2017-12-13 14:42:44");
INSERT INTO `audit_log` VALUES("1297","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-13 14:45:11");
INSERT INTO `audit_log` VALUES("1298","2","<b>Administrator</b> Logged out of the system","user","2017-12-13 14:45:11");
INSERT INTO `audit_log` VALUES("1299","2","<b>Administrator</b> Logged onto the system","user","2017-12-13 14:45:19");
INSERT INTO `audit_log` VALUES("1300","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-13 15:56:51");
INSERT INTO `audit_log` VALUES("1301","2","<b>Administrator</b> Logged out of the system","user","2017-12-13 15:56:52");
INSERT INTO `audit_log` VALUES("1302","2","<b>Administrator</b> Logged onto the system","user","2017-12-13 16:05:43");
INSERT INTO `audit_log` VALUES("1303","2","<b>Administrator</b> Logged onto the system","user","2017-12-14 10:12:15");
INSERT INTO `audit_log` VALUES("1304","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-14 10:47:12");
INSERT INTO `audit_log` VALUES("1305","2","<b>Administrator</b> Logged out of the system","user","2017-12-14 10:47:14");
INSERT INTO `audit_log` VALUES("1306","2","<b>Administrator</b> Logged onto the system","user","2017-12-14 11:00:13");
INSERT INTO `audit_log` VALUES("1307","2","Menu item has been added","menu","2017-12-14 11:24:27");
INSERT INTO `audit_log` VALUES("1308","2","Table order KOT number 171214-1 has been send","order","2017-12-14 11:25:47");
INSERT INTO `audit_log` VALUES("1309","2","Table order KOT number 171214-2 has been send","order","2017-12-14 15:02:11");
INSERT INTO `audit_log` VALUES("1310","2","Cash payment for table order has been made for the amount of Rs. 761","billing","2017-12-14 15:29:35");
INSERT INTO `audit_log` VALUES("1311","2","Table \'<b>Table - 2</b>\' has been closed ","table","2017-12-14 15:29:36");
INSERT INTO `audit_log` VALUES("1312","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-14 15:30:18");
INSERT INTO `audit_log` VALUES("1313","2","Table order KOT number 171214-3 has been send","order","2017-12-14 15:30:55");
INSERT INTO `audit_log` VALUES("1314","2","Table order KOT number 171214-4 has been send","order","2017-12-14 15:31:31");
INSERT INTO `audit_log` VALUES("1315","2","Cash payment for table order has been made for the amount of Rs. 3014","billing","2017-12-14 15:31:46");
INSERT INTO `audit_log` VALUES("1316","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-14 15:31:46");
INSERT INTO `audit_log` VALUES("1317","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-14 16:12:40");
INSERT INTO `audit_log` VALUES("1318","2","Table order KOT number 171214-5 has been send","order","2017-12-14 16:12:51");
INSERT INTO `audit_log` VALUES("1319","2","Cash payment for table order has been made for the amount of Rs. 509","billing","2017-12-14 16:14:12");
INSERT INTO `audit_log` VALUES("1320","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-14 16:14:13");
INSERT INTO `audit_log` VALUES("1321","2","<b>Administrator</b> Logged onto the system","user","2017-12-14 18:54:11");
INSERT INTO `audit_log` VALUES("1322","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-14 21:22:38");
INSERT INTO `audit_log` VALUES("1323","2","Table order KOT number 171214-6 has been send","order","2017-12-14 21:30:38");
INSERT INTO `audit_log` VALUES("1324","2","Take away order KOT 171214-7 has been send","order","2017-12-14 21:37:26");
INSERT INTO `audit_log` VALUES("1325","2","<b>Administrator</b> Logged onto the system","user","2017-12-15 10:49:44");
INSERT INTO `audit_log` VALUES("1326","2","<b>Administrator</b> Logged onto the system","user","2017-12-16 12:43:14");
INSERT INTO `audit_log` VALUES("1327","2","<b>Administrator</b> Logged onto the system","user","2017-12-16 15:19:37");
INSERT INTO `audit_log` VALUES("1328","2","<b>Administrator</b> Logged onto the system","user","2017-12-17 07:50:33");
INSERT INTO `audit_log` VALUES("1329","2","Table order KOT number 171217-1 has been send","order","2017-12-17 08:53:29");
INSERT INTO `audit_log` VALUES("1330","2","Credit table order has been made for the amount of Rs. 2663 on the debtor named -sugen","billing","2017-12-17 10:41:17");
INSERT INTO `audit_log` VALUES("1331","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-17 10:41:18");
INSERT INTO `audit_log` VALUES("1332","2","<b>Administrator</b> Logged onto the system","user","2017-12-17 13:22:16");
INSERT INTO `audit_log` VALUES("1333","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-17 13:41:02");
INSERT INTO `audit_log` VALUES("1334","2","Table order KOT number 171217-2 has been send","order","2017-12-17 13:51:49");
INSERT INTO `audit_log` VALUES("1335","2","Table order KOT number 171217-3 has been send","order","2017-12-17 13:52:22");
INSERT INTO `audit_log` VALUES("1336","2","Table order KOT number 171217-4 has been send","order","2017-12-17 13:59:42");
INSERT INTO `audit_log` VALUES("1337","2","Table order KOT number 171217-5 has been send","order","2017-12-17 14:07:23");
INSERT INTO `audit_log` VALUES("1338","2","Table order KOT number 171217-6 has been send","order","2017-12-17 14:15:31");
INSERT INTO `audit_log` VALUES("1339","2","Take away order KOT 171217-7 has been send","order","2017-12-17 14:51:22");
INSERT INTO `audit_log` VALUES("1340","2","<b>Administrator</b> Logged onto the system","user","2017-12-18 10:06:04");
INSERT INTO `audit_log` VALUES("1341","2","Cash payment for table order has been made for the amount of Rs. 2113","billing","2017-12-18 10:07:45");
INSERT INTO `audit_log` VALUES("1342","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-18 10:07:46");
INSERT INTO `audit_log` VALUES("1343","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-18 10:08:38");
INSERT INTO `audit_log` VALUES("1344","2","Table order KOT number 171218-1 has been send","order","2017-12-18 10:08:47");
INSERT INTO `audit_log` VALUES("1345","2","Table order KOT number 171218-2 has been send","order","2017-12-18 10:08:55");
INSERT INTO `audit_log` VALUES("1346","2","Take away order KOT 171218-3 has been send","order","2017-12-18 10:59:33");
INSERT INTO `audit_log` VALUES("1347","2","Table order KOT number 171218-4 has been send","order","2017-12-18 11:11:14");
INSERT INTO `audit_log` VALUES("1348","2","Cash payment for table order has been made for the amount of Rs. 1481","billing","2017-12-18 11:11:33");
INSERT INTO `audit_log` VALUES("1349","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-18 11:11:33");
INSERT INTO `audit_log` VALUES("1350","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-18 11:13:12");
INSERT INTO `audit_log` VALUES("1351","2","Table order KOT number 171218-5 has been send","order","2017-12-18 11:13:17");
INSERT INTO `audit_log` VALUES("1352","2","Cash payment for table order has been made for the amount of Rs. 1243","billing","2017-12-18 11:13:24");
INSERT INTO `audit_log` VALUES("1353","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-18 11:13:24");
INSERT INTO `audit_log` VALUES("1354","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-18 11:13:50");
INSERT INTO `audit_log` VALUES("1355","2","Table order KOT number 171218-6 has been send","order","2017-12-18 11:13:55");
INSERT INTO `audit_log` VALUES("1356","2","Cash payment for table order has been made for the amount of Rs. 895","billing","2017-12-18 11:14:14");
INSERT INTO `audit_log` VALUES("1357","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-18 11:14:14");
INSERT INTO `audit_log` VALUES("1358","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-18 11:14:21");
INSERT INTO `audit_log` VALUES("1359","2","Table order KOT number 171218-7 has been send","order","2017-12-18 11:14:51");
INSERT INTO `audit_log` VALUES("1360","2","Table order KOT number 171218-8 has been send","order","2017-12-18 11:14:58");
INSERT INTO `audit_log` VALUES("1361","2","Cash payment for table order has been made for the amount of Rs. 1119","billing","2017-12-18 11:16:57");
INSERT INTO `audit_log` VALUES("1362","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-18 11:16:58");
INSERT INTO `audit_log` VALUES("1363","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-18 11:42:29");
INSERT INTO `audit_log` VALUES("1364","2","<b>Administrator</b> Logged out of the system","user","2017-12-18 11:42:31");
INSERT INTO `audit_log` VALUES("1365","2","<b>Administrator</b> Logged onto the system","user","2017-12-18 11:42:38");
INSERT INTO `audit_log` VALUES("1366","2","Booking has been made","table","2017-12-18 11:56:37");
INSERT INTO `audit_log` VALUES("1367","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-18 12:11:18");
INSERT INTO `audit_log` VALUES("1368","2","Table order KOT number 171218-9 has been send","order","2017-12-18 12:12:18");
INSERT INTO `audit_log` VALUES("1369","2","Cash payment for table order has been made for the amount of Rs. 1119","billing","2017-12-18 12:12:41");
INSERT INTO `audit_log` VALUES("1370","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-18 12:12:41");
INSERT INTO `audit_log` VALUES("1371","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-18 12:13:33");
INSERT INTO `audit_log` VALUES("1372","2","Table order KOT number 171218-10 has been send","order","2017-12-18 12:13:40");
INSERT INTO `audit_log` VALUES("1373","2","Cash payment for table order has been made for the amount of Rs. 1119","billing","2017-12-18 12:14:11");
INSERT INTO `audit_log` VALUES("1374","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-18 12:14:12");
INSERT INTO `audit_log` VALUES("1375","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-18 12:14:40");
INSERT INTO `audit_log` VALUES("1376","2","Table order KOT number 171218-11 has been send","order","2017-12-18 12:14:45");
INSERT INTO `audit_log` VALUES("1377","2","Cash payment for table order has been made for the amount of Rs. 1119","billing","2017-12-18 12:15:05");
INSERT INTO `audit_log` VALUES("1378","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-18 12:15:05");
INSERT INTO `audit_log` VALUES("1379","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-18 13:47:13");
INSERT INTO `audit_log` VALUES("1380","2","<b>Administrator</b> Logged out of the system","user","2017-12-18 13:47:14");
INSERT INTO `audit_log` VALUES("1381","2","<b>Administrator</b> Logged onto the system","user","2017-12-18 13:47:21");
INSERT INTO `audit_log` VALUES("1382","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-18 14:02:55");
INSERT INTO `audit_log` VALUES("1383","2","<b>Administrator</b> Logged out of the system","user","2017-12-18 14:02:56");
INSERT INTO `audit_log` VALUES("1384","2","<b>Administrator</b> Logged onto the system","user","2017-12-18 14:03:05");
INSERT INTO `audit_log` VALUES("1385","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-18 14:05:13");
INSERT INTO `audit_log` VALUES("1386","2","<b>Administrator</b> Logged out of the system","user","2017-12-18 14:05:14");
INSERT INTO `audit_log` VALUES("1387","6","<b>Sugen</b> Logged onto the system","user","2017-12-18 14:05:35");
INSERT INTO `audit_log` VALUES("1388","6","<b>Sugen</b> Logged out of the system","user","2017-12-18 14:05:39");
INSERT INTO `audit_log` VALUES("1389","2","<b>Administrator</b> Logged onto the system","user","2017-12-18 14:05:49");
INSERT INTO `audit_log` VALUES("1390","2","Updated user detail of -sugen\'sugen\' from \'staff\' to \'floor_supervisor\'","user","2017-12-18 14:05:57");
INSERT INTO `audit_log` VALUES("1391","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-18 14:06:02");
INSERT INTO `audit_log` VALUES("1392","2","<b>Administrator</b> Logged out of the system","user","2017-12-18 14:06:02");
INSERT INTO `audit_log` VALUES("1393","6","<b>Sugen</b> Logged onto the system","user","2017-12-18 14:06:07");
INSERT INTO `audit_log` VALUES("1394","6","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-18 14:10:42");
INSERT INTO `audit_log` VALUES("1395","6","Table order KOT number 171218-12 has been send","order","2017-12-18 14:19:58");
INSERT INTO `audit_log` VALUES("1396","6","<b>Sugen</b> Logged out of the system","user","2017-12-18 14:23:32");
INSERT INTO `audit_log` VALUES("1397","2","<b>Administrator</b> Logged onto the system","user","2017-12-18 14:23:38");
INSERT INTO `audit_log` VALUES("1398","2","Cash payment for table order has been made for the amount of Rs. 249","billing","2017-12-18 14:23:50");
INSERT INTO `audit_log` VALUES("1399","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-18 14:23:51");
INSERT INTO `audit_log` VALUES("1400","2","Setting has been updated from  to klientscape","setting","2017-12-18 14:51:09");
INSERT INTO `audit_log` VALUES("1401","2","Setting has been updated from  to gairidhara","setting","2017-12-18 14:51:26");
INSERT INTO `audit_log` VALUES("1402","2","Setting has been updated from  to 01444444","setting","2017-12-18 14:51:38");
INSERT INTO `audit_log` VALUES("1403","2","Setting has been updated from  to 123456789","setting","2017-12-18 14:51:43");
INSERT INTO `audit_log` VALUES("1404","2","Setting has been updated from  to Happy customer...","setting","2017-12-18 14:51:55");
INSERT INTO `audit_log` VALUES("1405","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-18 15:37:59");
INSERT INTO `audit_log` VALUES("1406","2","Table order KOT number 171218-13 has been send","order","2017-12-18 15:38:17");
INSERT INTO `audit_log` VALUES("1407","2","Table order KOT number 171218-14 has been send","order","2017-12-18 16:31:44");
INSERT INTO `audit_log` VALUES("1408","2","Table order KOT number 171218-15 has been send","order","2017-12-18 16:32:00");
INSERT INTO `audit_log` VALUES("1409","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-18 16:54:55");
INSERT INTO `audit_log` VALUES("1410","2","<b>Administrator</b> Logged out of the system","user","2017-12-18 16:54:56");
INSERT INTO `audit_log` VALUES("1411","2","<b>Administrator</b> Logged onto the system","user","2017-12-18 17:47:01");
INSERT INTO `audit_log` VALUES("1412","2","<b>Administrator</b> Logged onto the system","user","2017-12-19 10:30:50");
INSERT INTO `audit_log` VALUES("1413","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-19 11:53:36");
INSERT INTO `audit_log` VALUES("1414","2","<b>Administrator</b> Logged out of the system","user","2017-12-19 11:53:38");
INSERT INTO `audit_log` VALUES("1415","2","<b>Administrator</b> Logged onto the system","user","2017-12-19 11:53:47");
INSERT INTO `audit_log` VALUES("1416","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-19 11:54:19");
INSERT INTO `audit_log` VALUES("1417","2","<b>Administrator</b> Logged out of the system","user","2017-12-19 11:54:19");
INSERT INTO `audit_log` VALUES("1418","2","<b>Administrator</b> Logged onto the system","user","2017-12-19 11:54:27");
INSERT INTO `audit_log` VALUES("1419","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-19 11:54:56");
INSERT INTO `audit_log` VALUES("1420","2","<b>Administrator</b> Logged out of the system","user","2017-12-19 11:54:56");
INSERT INTO `audit_log` VALUES("1421","2","<b>Administrator</b> Logged onto the system","user","2017-12-19 11:55:05");
INSERT INTO `audit_log` VALUES("1422","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-19 11:55:46");
INSERT INTO `audit_log` VALUES("1423","2","<b>Administrator</b> Logged out of the system","user","2017-12-19 11:55:46");
INSERT INTO `audit_log` VALUES("1424","2","<b>Administrator</b> Logged onto the system","user","2017-12-19 11:55:52");
INSERT INTO `audit_log` VALUES("1425","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-19 11:56:53");
INSERT INTO `audit_log` VALUES("1426","2","<b>Administrator</b> Logged out of the system","user","2017-12-19 11:56:53");
INSERT INTO `audit_log` VALUES("1427","2","<b>Administrator</b> Logged onto the system","user","2017-12-19 11:57:55");
INSERT INTO `audit_log` VALUES("1428","2","<b>Administrator</b> Logged out of the system","user","2017-12-19 11:59:13");
INSERT INTO `audit_log` VALUES("1429","2","<b>Administrator</b> Logged onto the system","user","2017-12-19 11:59:21");
INSERT INTO `audit_log` VALUES("1430","2","<b>Administrator</b> Logged out of the system","user","2017-12-19 11:59:42");
INSERT INTO `audit_log` VALUES("1431","2","<b>Administrator</b> Logged onto the system","user","2017-12-19 11:59:53");
INSERT INTO `audit_log` VALUES("1432","2","<b>Administrator</b> Logged onto the system","user","2017-12-19 13:00:47");
INSERT INTO `audit_log` VALUES("1433","2","Cash payment for table order has been made for the amount of Rs. 201","billing","2017-12-19 13:22:57");
INSERT INTO `audit_log` VALUES("1434","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-19 13:22:57");
INSERT INTO `audit_log` VALUES("1435","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-19 17:28:26");
INSERT INTO `audit_log` VALUES("1436","2","Table order KOT number 171219-1 has been send","order","2017-12-19 17:28:38");
INSERT INTO `audit_log` VALUES("1437","2","<b>Administrator</b> Logged onto the system","user","2017-12-20 10:25:22");
INSERT INTO `audit_log` VALUES("1438","2","Cash payment for table order has been made for the amount of Rs. 224","billing","2017-12-20 14:39:54");
INSERT INTO `audit_log` VALUES("1439","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-20 14:41:20");
INSERT INTO `audit_log` VALUES("1440","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-20 14:41:24");
INSERT INTO `audit_log` VALUES("1441","2","Table order KOT number 171220-1 has been send","order","2017-12-20 14:41:31");
INSERT INTO `audit_log` VALUES("1442","2","10 - stock item 7 has been sold","stock","2017-12-20 14:41:44");
INSERT INTO `audit_log` VALUES("1443","2","2 - stock item 6 has been sold","stock","2017-12-20 14:41:44");
INSERT INTO `audit_log` VALUES("1444","2","50 - stock item 5 has been sold","stock","2017-12-20 14:41:44");
INSERT INTO `audit_log` VALUES("1445","2","Cash payment for table order has been made for the amount of Rs. 0","billing","2017-12-20 14:41:44");
INSERT INTO `audit_log` VALUES("1446","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-20 14:42:59");
INSERT INTO `audit_log` VALUES("1447","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-20 14:43:03");
INSERT INTO `audit_log` VALUES("1448","2","Table order KOT number 171220-2 has been send","order","2017-12-20 14:43:09");
INSERT INTO `audit_log` VALUES("1449","2","10 - stock item 7 has been sold","stock","2017-12-20 14:43:22");
INSERT INTO `audit_log` VALUES("1450","2","2 - stock item 6 has been sold","stock","2017-12-20 14:43:22");
INSERT INTO `audit_log` VALUES("1451","2","50 - stock item 5 has been sold","stock","2017-12-20 14:43:22");
INSERT INTO `audit_log` VALUES("1452","2","Cash payment for table order has been made for the amount of Rs. 0","billing","2017-12-20 14:43:22");
INSERT INTO `audit_log` VALUES("1453","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-20 14:43:29");
INSERT INTO `audit_log` VALUES("1454","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-20 14:43:33");
INSERT INTO `audit_log` VALUES("1455","2","Table order KOT number 171220-3 has been send","order","2017-12-20 14:43:40");
INSERT INTO `audit_log` VALUES("1456","2","Table order KOT number 171220-4 has been send","order","2017-12-20 14:43:53");
INSERT INTO `audit_log` VALUES("1457","2","Cash payment for table order has been made for the amount of Rs. 1577","billing","2017-12-20 14:47:08");
INSERT INTO `audit_log` VALUES("1458","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-20 14:48:54");
INSERT INTO `audit_log` VALUES("1459","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-20 14:48:59");
INSERT INTO `audit_log` VALUES("1460","2","Table order KOT number 171220-5 has been send","order","2017-12-20 14:49:02");
INSERT INTO `audit_log` VALUES("1461","2","Cash payment for table order has been made for the amount of Rs. 224","billing","2017-12-20 14:49:11");
INSERT INTO `audit_log` VALUES("1462","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-20 14:50:25");
INSERT INTO `audit_log` VALUES("1463","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-20 14:50:29");
INSERT INTO `audit_log` VALUES("1464","2","Table order KOT number 171220-6 has been send","order","2017-12-20 14:50:35");
INSERT INTO `audit_log` VALUES("1465","2","10 - stock item 7 has been sold","stock","2017-12-20 14:50:40");
INSERT INTO `audit_log` VALUES("1466","2","2 - stock item 6 has been sold","stock","2017-12-20 14:50:40");
INSERT INTO `audit_log` VALUES("1467","2","50 - stock item 5 has been sold","stock","2017-12-20 14:50:40");
INSERT INTO `audit_log` VALUES("1468","2","Cash payment for table order has been made for the amount of Rs. 2585","billing","2017-12-20 14:50:40");
INSERT INTO `audit_log` VALUES("1469","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-20 14:53:34");
INSERT INTO `audit_log` VALUES("1470","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-20 14:53:41");
INSERT INTO `audit_log` VALUES("1471","2","Table order KOT number 171220-7 has been send","order","2017-12-20 14:53:52");
INSERT INTO `audit_log` VALUES("1472","2","Table order KOT number 171220-8 has been send","order","2017-12-20 14:54:03");
INSERT INTO `audit_log` VALUES("1473","2","20 - stock item 7 has been sold","stock","2017-12-20 14:54:11");
INSERT INTO `audit_log` VALUES("1474","2","4 - stock item 6 has been sold","stock","2017-12-20 14:54:11");
INSERT INTO `audit_log` VALUES("1475","2","100 - stock item 5 has been sold","stock","2017-12-20 14:54:11");
INSERT INTO `audit_log` VALUES("1476","2","Cash payment for table order has been made for the amount of Rs. 5171","billing","2017-12-20 14:54:12");
INSERT INTO `audit_log` VALUES("1477","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-20 14:58:36");
INSERT INTO `audit_log` VALUES("1478","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-20 14:58:41");
INSERT INTO `audit_log` VALUES("1479","2","Table order KOT number 171220-9 has been send","order","2017-12-20 14:58:53");
INSERT INTO `audit_log` VALUES("1480","2","20 - stock item 7 has been sold","stock","2017-12-20 14:59:06");
INSERT INTO `audit_log` VALUES("1481","2","4 - stock item 6 has been sold","stock","2017-12-20 14:59:06");
INSERT INTO `audit_log` VALUES("1482","2","100 - stock item 5 has been sold","stock","2017-12-20 14:59:06");
INSERT INTO `audit_log` VALUES("1483","2","Cash payment for table order has been made for the amount of Rs. 5171","billing","2017-12-20 14:59:06");
INSERT INTO `audit_log` VALUES("1484","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-20 14:59:39");
INSERT INTO `audit_log` VALUES("1485","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-20 15:00:32");
INSERT INTO `audit_log` VALUES("1486","2","Table order KOT number 171220-10 has been send","order","2017-12-20 15:01:01");
INSERT INTO `audit_log` VALUES("1487","2","Cash payment for table order has been made for the amount of Rs. 0","billing","2017-12-20 15:01:13");
INSERT INTO `audit_log` VALUES("1488","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-20 15:06:00");
INSERT INTO `audit_log` VALUES("1489","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-20 15:06:05");
INSERT INTO `audit_log` VALUES("1490","2","Table order KOT number 171220-11 has been send","order","2017-12-20 15:06:43");
INSERT INTO `audit_log` VALUES("1491","2","Cash payment for table order has been made for the amount of Rs. 472","billing","2017-12-20 15:06:48");
INSERT INTO `audit_log` VALUES("1492","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-20 15:07:18");
INSERT INTO `audit_log` VALUES("1493","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-20 15:07:28");
INSERT INTO `audit_log` VALUES("1494","2","Table order KOT number 171220-12 has been send","order","2017-12-20 15:07:32");
INSERT INTO `audit_log` VALUES("1495","2","Table order KOT number 171220-13 has been send","order","2017-12-20 16:04:56");
INSERT INTO `audit_log` VALUES("1496","2","Cash payment for table order has been made for the amount of Rs. 783","billing","2017-12-20 16:10:28");
INSERT INTO `audit_log` VALUES("1497","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-20 16:10:36");
INSERT INTO `audit_log` VALUES("1498","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-20 16:10:42");
INSERT INTO `audit_log` VALUES("1499","2","Table order KOT number 171220-14 has been send","order","2017-12-20 16:10:56");
INSERT INTO `audit_log` VALUES("1500","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-20 16:39:42");
INSERT INTO `audit_log` VALUES("1501","2","Cash payment for table order has been made for the amount of Rs. 497","billing","2017-12-20 16:39:42");
INSERT INTO `audit_log` VALUES("1502","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-20 16:44:17");
INSERT INTO `audit_log` VALUES("1503","2","Table order KOT number 171220-15 has been send","order","2017-12-20 16:44:24");
INSERT INTO `audit_log` VALUES("1504","2","10 - stock item 7 has been sold","stock","2017-12-20 16:55:19");
INSERT INTO `audit_log` VALUES("1505","2","2 - stock item 6 has been sold","stock","2017-12-20 16:55:19");
INSERT INTO `audit_log` VALUES("1506","2","50 - stock item 5 has been sold","stock","2017-12-20 16:55:19");
INSERT INTO `audit_log` VALUES("1507","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-20 16:55:20");
INSERT INTO `audit_log` VALUES("1508","2","Cash payment for table order has been made for the amount of Rs. 2020","billing","2017-12-20 16:55:20");
INSERT INTO `audit_log` VALUES("1509","2","Table order KOT number 171220-16 has been send","order","2017-12-20 16:55:59");
INSERT INTO `audit_log` VALUES("1510","2","Cash payment for table order has been made for the amount of Rs. 1585","billing","2017-12-20 16:56:23");
INSERT INTO `audit_log` VALUES("1511","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-20 16:57:35");
INSERT INTO `audit_log` VALUES("1512","2","Table order KOT number 171220-17 has been send","order","2017-12-20 16:57:51");
INSERT INTO `audit_log` VALUES("1513","2","10 - stock item 7 has been sold","stock","2017-12-20 17:03:27");
INSERT INTO `audit_log` VALUES("1514","2","2 - stock item 6 has been sold","stock","2017-12-20 17:03:27");
INSERT INTO `audit_log` VALUES("1515","2","50 - stock item 5 has been sold","stock","2017-12-20 17:03:27");
INSERT INTO `audit_log` VALUES("1516","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-20 17:03:28");
INSERT INTO `audit_log` VALUES("1517","2","Cash payment for table order has been made for the amount of Rs. 528","billing","2017-12-20 17:03:28");
INSERT INTO `audit_log` VALUES("1518","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-20 17:26:20");
INSERT INTO `audit_log` VALUES("1519","2","Table order KOT number 171220-18 has been send","order","2017-12-20 17:26:28");
INSERT INTO `audit_log` VALUES("1520","2","<b>Administrator</b> Logged onto the system","user","2017-12-21 10:01:44");
INSERT INTO `audit_log` VALUES("1521","2","Item wise payment has been made for the amount of Rs. 224","billing","2017-12-21 10:33:38");
INSERT INTO `audit_log` VALUES("1522","2","<b>Administrator</b> Logged out of the system","user","2017-12-21 11:14:18");
INSERT INTO `audit_log` VALUES("1523","2","<b>Administrator</b> Logged onto the system","user","2017-12-21 11:14:31");
INSERT INTO `audit_log` VALUES("1524","2","Table order KOT number 171221-1 has been send","order","2017-12-21 13:00:21");
INSERT INTO `audit_log` VALUES("1525","2","Sales has been returned for the invoice number - 18-81","billing","2017-12-21 14:52:29");
INSERT INTO `audit_log` VALUES("1526","2","Sales has been returned for the invoice number - 18-82","billing","2017-12-21 14:53:15");
INSERT INTO `audit_log` VALUES("1527","2","Sales has been returned for the invoice number - 18-80","billing","2017-12-21 14:53:51");
INSERT INTO `audit_log` VALUES("1528","2","Sales has been returned for the invoice number - 18-79","billing","2017-12-21 14:55:00");
INSERT INTO `audit_log` VALUES("1529","2","Debtor named -sugen paid the amount of Rs. 100","debtor","2017-12-21 15:49:56");
INSERT INTO `audit_log` VALUES("1530","2","Debtor named -sugen paid the amount of Rs. 100","debtor","2017-12-21 15:50:43");
INSERT INTO `audit_log` VALUES("1531","2","Debtor named -sugen paid the amount of Rs. 100","debtor","2017-12-21 15:51:32");
INSERT INTO `audit_log` VALUES("1532","2","Payment returned the amount of Rs. 100to debtor named -sugen","debtor","2017-12-21 15:52:34");
INSERT INTO `audit_log` VALUES("1533","2","Payment returned the amount of Rs. 100to debtor named -sugen","debtor","2017-12-21 15:53:51");
INSERT INTO `audit_log` VALUES("1534","2","Payment returned the amount of Rs. 100to debtor named -sugen","debtor","2017-12-21 15:54:15");
INSERT INTO `audit_log` VALUES("1535","2","Payment returned the amount of Rs. 100to debtor named -sugen","debtor","2017-12-21 15:54:55");
INSERT INTO `audit_log` VALUES("1536","2","Payment returned the amount of Rs. 100to debtor named -sugen","debtor","2017-12-21 15:55:35");
INSERT INTO `audit_log` VALUES("1537","2","Debtor named -sugen paid the amount of Rs. 100","debtor","2017-12-21 15:55:56");
INSERT INTO `audit_log` VALUES("1538","2","<b>Administrator</b> Logged out of the system","user","2017-12-21 16:28:14");
INSERT INTO `audit_log` VALUES("1539","2","<b>Administrator</b> Logged onto the system","user","2017-12-21 16:28:26");
INSERT INTO `audit_log` VALUES("1540","2","Take away order KOT 171221-2 has been send","order","2017-12-21 16:47:00");
INSERT INTO `audit_log` VALUES("1541","2","Cash payment for take away order has been made for the amount of Rs. 566","billing","2017-12-21 16:47:19");
INSERT INTO `audit_log` VALUES("1542","2","Item wise payment has been made for the amount of Rs. 84","billing","2017-12-21 17:00:09");
INSERT INTO `audit_log` VALUES("1543","2","Credit table order has been made for the amount of Rs. 556 on the debtor named -sugen","billing","2017-12-21 17:04:45");
INSERT INTO `audit_log` VALUES("1544","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-21 17:04:45");
INSERT INTO `audit_log` VALUES("1545","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-21 17:08:58");
INSERT INTO `audit_log` VALUES("1546","2","Table order KOT number 171221-3 has been send","order","2017-12-21 17:09:03");
INSERT INTO `audit_log` VALUES("1547","2","Credit table order has been made for the amount of Rs. 2057 on the debtor named -sugen","billing","2017-12-21 17:09:12");
INSERT INTO `audit_log` VALUES("1548","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-21 17:09:13");
INSERT INTO `audit_log` VALUES("1549","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-21 17:09:17");
INSERT INTO `audit_log` VALUES("1550","2","Table order KOT number 171221-4 has been send","order","2017-12-21 17:09:52");
INSERT INTO `audit_log` VALUES("1551","2","Credit table order has been made for the amount of Rs. 2057 on the debtor named -sugen","billing","2017-12-21 17:10:02");
INSERT INTO `audit_log` VALUES("1552","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-21 17:10:02");
INSERT INTO `audit_log` VALUES("1553","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-21 17:12:12");
INSERT INTO `audit_log` VALUES("1554","2","Table order KOT number 171221-5 has been send","order","2017-12-21 17:12:17");
INSERT INTO `audit_log` VALUES("1555","2","Credit table order has been made for the amount of Rs. 2057 on the debtor named -sugen","billing","2017-12-21 17:12:30");
INSERT INTO `audit_log` VALUES("1556","2","<b>Administrator</b> Logged onto the system","user","2017-12-22 10:07:46");
INSERT INTO `audit_log` VALUES("1557","2","Retail order KOT 171222-1 has been send","order","2017-12-22 10:09:34");
INSERT INTO `audit_log` VALUES("1558","2","Retail order KOT 171222-2 has been send","order","2017-12-22 10:09:46");
INSERT INTO `audit_log` VALUES("1559","2","Table order KOT number 171222-3 has been send","order","2017-12-22 10:46:52");
INSERT INTO `audit_log` VALUES("1560","2","Cash payment for table order has been made for the amount of Rs. 2057","billing","2017-12-22 10:53:57");
INSERT INTO `audit_log` VALUES("1561","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-22 10:54:13");
INSERT INTO `audit_log` VALUES("1562","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-22 10:54:17");
INSERT INTO `audit_log` VALUES("1563","2","Table order KOT number 171222-4 has been send","order","2017-12-22 10:54:21");
INSERT INTO `audit_log` VALUES("1564","2","Cash payment for table order has been made for the amount of Rs. 2057","billing","2017-12-22 10:54:31");
INSERT INTO `audit_log` VALUES("1565","2","Table order KOT number 171222-5 has been send","order","2017-12-22 10:54:47");
INSERT INTO `audit_log` VALUES("1566","2","Cash payment for table order has been made for the amount of Rs. 472","billing","2017-12-22 10:54:52");
INSERT INTO `audit_log` VALUES("1567","2","Table order KOT number 171222-6 has been send","order","2017-12-22 10:55:10");
INSERT INTO `audit_log` VALUES("1568","2","Cash payment for table order has been made for the amount of Rs. 472","billing","2017-12-22 10:55:14");
INSERT INTO `audit_log` VALUES("1569","2","Table order KOT number 171222-7 has been send","order","2017-12-22 11:03:54");
INSERT INTO `audit_log` VALUES("1570","2","Cash payment for table order has been made for the amount of Rs. 0","billing","2017-12-22 11:04:03");
INSERT INTO `audit_log` VALUES("1571","2","Table order KOT number 171222-8 has been send","order","2017-12-22 11:10:23");
INSERT INTO `audit_log` VALUES("1572","2","Retail order KOT 171222-9 has been send","order","2017-12-22 11:15:52");
INSERT INTO `audit_log` VALUES("1573","2","Cash payment for retail order has been made for the amount of Rs. 429","billing","2017-12-22 11:40:47");
INSERT INTO `audit_log` VALUES("1574","2","Cash payment for table order has been made for the amount of Rs. 566","billing","2017-12-22 11:40:58");
INSERT INTO `audit_log` VALUES("1575","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-22 11:41:04");
INSERT INTO `audit_log` VALUES("1576","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-22 11:41:12");
INSERT INTO `audit_log` VALUES("1577","2","Table order KOT number 171222-10 has been send","order","2017-12-22 11:41:16");
INSERT INTO `audit_log` VALUES("1578","2","Cash payment for table order has been made for the amount of Rs. 566","billing","2017-12-22 11:41:24");
INSERT INTO `audit_log` VALUES("1579","2","Table order KOT number 171222-11 has been send","order","2017-12-22 11:42:19");
INSERT INTO `audit_log` VALUES("1580","2","Cash payment for table order has been made for the amount of Rs. 472","billing","2017-12-22 11:42:24");
INSERT INTO `audit_log` VALUES("1581","2","Delivery order KOT 171222-12 has been send","order","2017-12-22 11:43:09");
INSERT INTO `audit_log` VALUES("1582","2","Cash payment for delivery order has been made for the amount of Rs. 814","billing","2017-12-22 11:43:19");
INSERT INTO `audit_log` VALUES("1583","2","Delivery order KOT 171222-13 has been send","order","2017-12-22 11:46:25");
INSERT INTO `audit_log` VALUES("1584","2","Cash payment for delivery order has been made for the amount of Rs. 566","billing","2017-12-22 11:46:33");
INSERT INTO `audit_log` VALUES("1585","2","Delivery order KOT 171222-14 has been send","order","2017-12-22 11:47:46");
INSERT INTO `audit_log` VALUES("1586","2","Cash payment for delivery order has been made for the amount of Rs. 566","billing","2017-12-22 11:47:54");
INSERT INTO `audit_log` VALUES("1587","2","Delivery order KOT 171222-15 has been send","order","2017-12-22 11:52:14");
INSERT INTO `audit_log` VALUES("1588","2","Credit delivery order has been made for the amount of Rs.566 on the debtor named -sugen","billing","2017-12-22 11:52:25");
INSERT INTO `audit_log` VALUES("1589","2","Credit delivery charge has been made for the amount of Rs.123 on the debtor named -sugen","billing","2017-12-22 11:52:25");
INSERT INTO `audit_log` VALUES("1590","2","Delivery order KOT 171222-16 has been send","order","2017-12-22 11:53:16");
INSERT INTO `audit_log` VALUES("1591","2","Cash payment for delivery order has been made for the amount of Rs. 566","billing","2017-12-22 11:53:21");
INSERT INTO `audit_log` VALUES("1592","2","Delivery order KOT 171222-17 has been send","order","2017-12-22 11:58:38");
INSERT INTO `audit_log` VALUES("1593","2","Cash payment for delivery order has been made for the amount of Rs. 566","billing","2017-12-22 12:18:06");
INSERT INTO `audit_log` VALUES("1594","2","Cash payment for delivery order has been made for the amount of Rs. 696","billing","2017-12-22 12:19:27");
INSERT INTO `audit_log` VALUES("1595","2","Credit delivery order has been made for the amount of Rs.895 on the debtor named -sugen","billing","2017-12-22 12:20:15");
INSERT INTO `audit_log` VALUES("1596","2","Credit delivery charge has been made for the amount of Rs.87 on the debtor named -sugen","billing","2017-12-22 12:20:15");
INSERT INTO `audit_log` VALUES("1597","2","Delivery order KOT 171222-18 has been send","order","2017-12-22 12:21:10");
INSERT INTO `audit_log` VALUES("1598","2","Credit delivery order has been made for the amount of Rs.566 on the debtor named -sugen","billing","2017-12-22 12:21:19");
INSERT INTO `audit_log` VALUES("1599","2","Credit delivery charge has been made for the amount of Rs.435 on the debtor named -sugen","billing","2017-12-22 12:21:20");
INSERT INTO `audit_log` VALUES("1600","2","Pick Up order KOT 171222-19 has been send","order","2017-12-22 12:22:42");
INSERT INTO `audit_log` VALUES("1601","2","Cash payment for pick up order has been made for the amount of Rs. 472","billing","2017-12-22 12:22:45");
INSERT INTO `audit_log` VALUES("1602","2","Take away order KOT 171222-20 has been send","order","2017-12-22 12:22:59");
INSERT INTO `audit_log` VALUES("1603","2","Cash payment for take away order has been made for the amount of Rs. 1492","billing","2017-12-22 12:28:57");
INSERT INTO `audit_log` VALUES("1604","2","Take away order KOT 171222-21 has been send","order","2017-12-22 12:31:10");
INSERT INTO `audit_log` VALUES("1605","2","Cash payment for take away order has been made for the amount of Rs. 1616","billing","2017-12-22 12:31:26");
INSERT INTO `audit_log` VALUES("1606","2","Table order KOT number 171222-22 has been send","order","2017-12-22 12:43:09");
INSERT INTO `audit_log` VALUES("1607","2","Cash payment for table order has been made for the amount of Rs. 814","billing","2017-12-22 12:43:17");
INSERT INTO `audit_log` VALUES("1608","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-22 12:43:25");
INSERT INTO `audit_log` VALUES("1609","2","<b>Administrator</b> Logged onto the system","user","2017-12-22 12:44:14");
INSERT INTO `audit_log` VALUES("1610","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-22 12:44:24");
INSERT INTO `audit_log` VALUES("1611","2","<b>Administrator</b> Logged out of the system","user","2017-12-22 12:44:39");
INSERT INTO `audit_log` VALUES("1612","2","<b>Administrator</b> Logged onto the system","user","2017-12-22 12:45:07");
INSERT INTO `audit_log` VALUES("1613","2","<b>Administrator</b> Logged onto the system","user","2017-12-22 12:45:25");
INSERT INTO `audit_log` VALUES("1614","2","<b>Administrator</b> Logged out of the system","user","2017-12-22 12:48:30");
INSERT INTO `audit_log` VALUES("1615","2","<b>Administrator</b> Logged onto the system","user","2017-12-22 12:48:42");
INSERT INTO `audit_log` VALUES("1616","2","<b>Administrator</b> Logged out of the system","user","2017-12-22 12:49:35");
INSERT INTO `audit_log` VALUES("1617","2","<b>Administrator</b> Logged onto the system","user","2017-12-22 12:49:43");
INSERT INTO `audit_log` VALUES("1618","2","<b>Administrator</b> Logged out of the system","user","2017-12-22 12:50:08");
INSERT INTO `audit_log` VALUES("1619","2","<b>Administrator</b> Logged onto the system","user","2017-12-22 12:50:15");
INSERT INTO `audit_log` VALUES("1620","2","<b>Administrator</b> Logged onto the system","user","2017-12-22 12:50:33");
INSERT INTO `audit_log` VALUES("1621","2","<b>Administrator</b> Logged out of the system","user","2017-12-22 12:51:03");
INSERT INTO `audit_log` VALUES("1622","2","<b>Administrator</b> Logged onto the system","user","2017-12-22 12:51:09");
INSERT INTO `audit_log` VALUES("1623","2","Table order KOT number 171222-23 has been send","order","2017-12-22 12:55:46");
INSERT INTO `audit_log` VALUES("1624","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-22 13:07:53");
INSERT INTO `audit_log` VALUES("1625","2","Cash payment for table order has been made for the amount of Rs. 373","billing","2017-12-22 13:07:53");
INSERT INTO `audit_log` VALUES("1626","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-22 13:10:46");
INSERT INTO `audit_log` VALUES("1627","2","Table order KOT number 171222-24 has been send","order","2017-12-22 13:10:53");
INSERT INTO `audit_log` VALUES("1628","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-22 13:11:08");
INSERT INTO `audit_log` VALUES("1629","2","Cash payment for table order has been made for the amount of Rs. 1243","billing","2017-12-22 13:11:08");
INSERT INTO `audit_log` VALUES("1630","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-22 13:12:34");
INSERT INTO `audit_log` VALUES("1631","2","Table order KOT number 171222-25 has been send","order","2017-12-22 13:12:39");
INSERT INTO `audit_log` VALUES("1632","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-22 13:13:17");
INSERT INTO `audit_log` VALUES("1633","2","Cash payment for table order has been made for the amount of Rs. 124","billing","2017-12-22 13:13:17");
INSERT INTO `audit_log` VALUES("1634","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-22 13:14:44");
INSERT INTO `audit_log` VALUES("1635","2","Table order KOT number 171222-26 has been send","order","2017-12-22 13:14:48");
INSERT INTO `audit_log` VALUES("1636","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-22 13:14:59");
INSERT INTO `audit_log` VALUES("1637","2","Cash payment for table order has been made for the amount of Rs. 1585","billing","2017-12-22 13:14:59");
INSERT INTO `audit_log` VALUES("1638","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-22 13:15:31");
INSERT INTO `audit_log` VALUES("1639","2","Table order KOT number 171222-27 has been send","order","2017-12-22 13:15:38");
INSERT INTO `audit_log` VALUES("1640","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-22 13:15:47");
INSERT INTO `audit_log` VALUES("1641","2","Cash payment for table order has been made for the amount of Rs. 1492","billing","2017-12-22 13:15:47");
INSERT INTO `audit_log` VALUES("1642","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-22 13:16:29");
INSERT INTO `audit_log` VALUES("1643","2","Table order KOT number 171222-28 has been send","order","2017-12-22 13:16:32");
INSERT INTO `audit_log` VALUES("1644","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-22 13:16:42");
INSERT INTO `audit_log` VALUES("1645","2","Cash payment for table order has been made for the amount of Rs. 342","billing","2017-12-22 13:16:42");
INSERT INTO `audit_log` VALUES("1646","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-22 13:17:18");
INSERT INTO `audit_log` VALUES("1647","2","Table order KOT number 171222-29 has been send","order","2017-12-22 13:17:21");
INSERT INTO `audit_log` VALUES("1648","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-22 13:19:13");
INSERT INTO `audit_log` VALUES("1649","2","Cash payment for table order has been made for the amount of Rs. 342","billing","2017-12-22 13:19:13");
INSERT INTO `audit_log` VALUES("1650","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-22 13:20:19");
INSERT INTO `audit_log` VALUES("1651","2","Table order KOT number 171222-30 has been send","order","2017-12-22 13:20:25");
INSERT INTO `audit_log` VALUES("1652","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-22 13:20:38");
INSERT INTO `audit_log` VALUES("1653","2","Cash payment for table order has been made for the amount of Rs. 342","billing","2017-12-22 13:20:38");
INSERT INTO `audit_log` VALUES("1654","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-22 13:21:56");
INSERT INTO `audit_log` VALUES("1655","2","Table order KOT number 171222-31 has been send","order","2017-12-22 13:22:00");
INSERT INTO `audit_log` VALUES("1656","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-22 13:22:10");
INSERT INTO `audit_log` VALUES("1657","2","Cash payment for table order has been made for the amount of Rs. 342","billing","2017-12-22 13:22:10");
INSERT INTO `audit_log` VALUES("1658","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-22 13:22:28");
INSERT INTO `audit_log` VALUES("1659","2","Table order KOT number 171222-32 has been send","order","2017-12-22 13:22:33");
INSERT INTO `audit_log` VALUES("1660","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-22 13:22:41");
INSERT INTO `audit_log` VALUES("1661","2","Cash payment for table order has been made for the amount of Rs. 342","billing","2017-12-22 13:22:41");
INSERT INTO `audit_log` VALUES("1662","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-22 13:48:52");
INSERT INTO `audit_log` VALUES("1663","2","Table order KOT number 171222-33 has been send","order","2017-12-22 13:48:56");
INSERT INTO `audit_log` VALUES("1664","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-22 13:49:08");
INSERT INTO `audit_log` VALUES("1665","2","Cash payment for table order has been made for the amount of Rs. 342","billing","2017-12-22 13:49:08");
INSERT INTO `audit_log` VALUES("1666","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-22 13:49:48");
INSERT INTO `audit_log` VALUES("1667","2","Table order KOT number 171222-34 has been send","order","2017-12-22 13:49:53");
INSERT INTO `audit_log` VALUES("1668","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-22 13:50:07");
INSERT INTO `audit_log` VALUES("1669","2","Cash payment for table order has been made for the amount of Rs. 1492","billing","2017-12-22 13:50:08");
INSERT INTO `audit_log` VALUES("1670","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-22 13:51:13");
INSERT INTO `audit_log` VALUES("1671","2","Table order KOT number 171222-35 has been send","order","2017-12-22 13:51:18");
INSERT INTO `audit_log` VALUES("1672","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-22 13:51:29");
INSERT INTO `audit_log` VALUES("1673","2","Cash payment for table order has been made for the amount of Rs. 1709","billing","2017-12-22 13:51:29");
INSERT INTO `audit_log` VALUES("1674","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-22 13:51:42");
INSERT INTO `audit_log` VALUES("1675","2","Table order KOT number 171222-36 has been send","order","2017-12-22 13:51:47");
INSERT INTO `audit_log` VALUES("1676","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-22 13:52:02");
INSERT INTO `audit_log` VALUES("1677","2","Cash payment for table order has been made for the amount of Rs. 1367","billing","2017-12-22 13:52:02");
INSERT INTO `audit_log` VALUES("1678","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-22 13:52:14");
INSERT INTO `audit_log` VALUES("1679","2","Table order KOT number 171222-37 has been send","order","2017-12-22 13:52:20");
INSERT INTO `audit_log` VALUES("1680","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-22 13:52:36");
INSERT INTO `audit_log` VALUES("1681","2","Cash payment for table order has been made for the amount of Rs. 1367","billing","2017-12-22 13:52:36");
INSERT INTO `audit_log` VALUES("1682","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-22 14:01:23");
INSERT INTO `audit_log` VALUES("1683","2","Table order KOT number 171222-38 has been send","order","2017-12-22 14:01:28");
INSERT INTO `audit_log` VALUES("1684","2","<b>Administrator</b> Logged out of the system","user","2017-12-22 14:08:12");
INSERT INTO `audit_log` VALUES("1685","2","<b>Administrator</b> Logged onto the system","user","2017-12-22 14:08:26");
INSERT INTO `audit_log` VALUES("1686","2","<b>Administrator</b> Logged out of the system","user","2017-12-25 11:16:19");
INSERT INTO `audit_log` VALUES("1687","2","<b>Administrator</b> Logged onto the system","user","2017-12-25 11:16:31");
INSERT INTO `audit_log` VALUES("1688","2","Setting has been updated from 123456789 to 123456789asdfasdfadsf","setting","2017-12-25 11:17:00");
INSERT INTO `audit_log` VALUES("1689","2","Setting has been updated from 123456789asdfasdfadsf to 123456789","setting","2017-12-25 11:17:07");
INSERT INTO `audit_log` VALUES("1690","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-25 11:18:15");
INSERT INTO `audit_log` VALUES("1691","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-25 11:19:21");
INSERT INTO `audit_log` VALUES("1692","2","<b>Administrator</b> Logged out of the system","user","2017-12-25 11:19:22");
INSERT INTO `audit_log` VALUES("1693","2","<b>Administrator</b> Logged out of the system","user","2017-12-25 11:21:58");
INSERT INTO `audit_log` VALUES("1694","2","<b>Administrator</b> Logged onto the system","user","2017-12-25 11:22:05");
INSERT INTO `audit_log` VALUES("1695","2","Cash payment for table order has been made for the amount of Rs. 1931","billing","2017-12-25 11:41:33");
INSERT INTO `audit_log` VALUES("1696","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-25 11:41:44");
INSERT INTO `audit_log` VALUES("1697","2","Take away order KOT 171225-1 has been send","order","2017-12-25 11:42:04");
INSERT INTO `audit_log` VALUES("1698","2","Cash payment for take away order has been made for the amount of Rs. 576","billing","2017-12-25 11:42:15");
INSERT INTO `audit_log` VALUES("1699","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-25 12:16:45");
INSERT INTO `audit_log` VALUES("1700","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-25 12:35:06");
INSERT INTO `audit_log` VALUES("1701","2","Floor has been added","table","2017-12-25 12:35:39");
INSERT INTO `audit_log` VALUES("1702","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-25 12:58:49");
INSERT INTO `audit_log` VALUES("1703","2","<b>Administrator</b> Logged out of the system","user","2017-12-25 12:58:50");
INSERT INTO `audit_log` VALUES("1704","2","<b>Administrator</b> Logged onto the system","user","2017-12-25 13:00:07");
INSERT INTO `audit_log` VALUES("1705","2","Menu item has been added","menu","2017-12-25 13:55:18");
INSERT INTO `audit_log` VALUES("1706","2","New menu category has been created named -test","menu","2017-12-25 13:55:27");
INSERT INTO `audit_log` VALUES("1707","2","Product named -Testasdfasdfasdf has been added","misc","2017-12-25 13:55:48");
INSERT INTO `audit_log` VALUES("1708","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-25 14:25:51");
INSERT INTO `audit_log` VALUES("1709","2","Table order KOT number 171225-2 has been send","order","2017-12-25 14:25:56");
INSERT INTO `audit_log` VALUES("1710","2","1 - stock item 1 has been sold","stock","2017-12-25 15:03:14");
INSERT INTO `audit_log` VALUES("1711","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-25 15:03:15");
INSERT INTO `audit_log` VALUES("1712","2","Cash payment for table order has been made for the amount of Rs. 303","billing","2017-12-25 15:03:15");
INSERT INTO `audit_log` VALUES("1713","2","Database has been backuped by the user <b>Administrator</b>","database","2017-12-25 15:04:24");
INSERT INTO `audit_log` VALUES("1714","2","<b>Administrator</b> Logged out of the system","user","2017-12-25 15:04:25");
INSERT INTO `audit_log` VALUES("1715","2","<b>Administrator</b> Logged onto the system","user","2017-12-25 15:14:38");
INSERT INTO `audit_log` VALUES("1716","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2017-12-25 15:34:31");
INSERT INTO `audit_log` VALUES("1717","2","Table order KOT number 171225-3 has been send","order","2017-12-25 15:34:36");
INSERT INTO `audit_log` VALUES("1718","2","1 - stock item 1 has been sold","stock","2017-12-25 15:34:42");
INSERT INTO `audit_log` VALUES("1719","2","Cash payment for table order has been made for the amount of Rs. 721","billing","2017-12-25 15:34:42");
INSERT INTO `audit_log` VALUES("1720","2","Table \'<b>Table - 20</b>\' has been closed ","table","2017-12-25 15:34:49");
INSERT INTO `audit_log` VALUES("1721","2","Take away order KOT 171225-4 has been send","order","2017-12-25 15:36:05");
INSERT INTO `audit_log` VALUES("1722","2","Cash payment for take away order has been made for the amount of Rs. 220","billing","2017-12-25 15:36:09");
INSERT INTO `audit_log` VALUES("1723","2","<b>Administrator</b> Logged onto the system","user","2018-01-09 12:33:19");
INSERT INTO `audit_log` VALUES("1724","2","Table has been updated from table - 12 to table - 12","table","2018-01-09 13:08:46");
INSERT INTO `audit_log` VALUES("1725","2","Table \'<b>table - 12</b>\' has been occupied ","table","2018-01-09 13:10:44");
INSERT INTO `audit_log` VALUES("1726","2","<b>Administrator</b> Logged out of the system","user","2018-01-09 13:18:20");
INSERT INTO `audit_log` VALUES("1727","2","<b>Administrator</b> Logged out of the system","user","2018-01-09 13:56:56");
INSERT INTO `audit_log` VALUES("1728","2","<b>Administrator</b> Logged onto the system","user","2018-01-09 13:57:04");
INSERT INTO `audit_log` VALUES("1729","2","Table \'<b>Table - 17</b>\' has been occupied ","table","2018-01-09 14:12:00");
INSERT INTO `audit_log` VALUES("1730","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2018-01-09 14:49:31");
INSERT INTO `audit_log` VALUES("1731","2","Table order KOT number 180109-1 has been send","order","2018-01-09 14:49:35");
INSERT INTO `audit_log` VALUES("1732","2","1 - stock item 1 has been sold","stock","2018-01-09 14:50:49");
INSERT INTO `audit_log` VALUES("1733","2","Cash payment for table order has been made for the amount of Rs. 418","billing","2018-01-09 14:50:49");
INSERT INTO `audit_log` VALUES("1734","2","Table \'<b>Table - 20</b>\' has been closed ","table","2018-01-09 14:50:49");
INSERT INTO `audit_log` VALUES("1735","2","Table \'<b>Table - 7</b>\' has been occupied ","table","2018-01-09 14:58:16");
INSERT INTO `audit_log` VALUES("1736","2","Table order KOT number 180109-2 has been send","order","2018-01-09 14:58:20");
INSERT INTO `audit_log` VALUES("1737","2","Table \'<b>Table - 17</b>\' has been closed ","table","2018-01-09 15:02:05");
INSERT INTO `audit_log` VALUES("1738","2","1 - stock item 1 has been sold","stock","2018-01-09 15:02:17");
INSERT INTO `audit_log` VALUES("1739","2","Cash payment for table order has been made for the amount of Rs. 198","billing","2018-01-09 15:02:18");
INSERT INTO `audit_log` VALUES("1740","2","Table \'<b>Table - 7</b>\' has been closed ","table","2018-01-09 15:02:18");
INSERT INTO `audit_log` VALUES("1741","2","Table \'<b>table - 12</b>\' has been closed ","table","2018-01-09 15:02:24");
INSERT INTO `audit_log` VALUES("1742","2","Take away order KOT 180109-3 has been send","order","2018-01-09 16:30:12");
INSERT INTO `audit_log` VALUES("1743","2","Item wise payment has been made for the amount of Rs. 198","billing","2018-01-09 16:30:18");
INSERT INTO `audit_log` VALUES("1744","2","1 - stock item 1 has been sold","stock","2018-01-09 16:32:37");
INSERT INTO `audit_log` VALUES("1745","2","Credit take away order has been made for the amount of Rs.418 on the debtor named -sugen","billing","2018-01-09 16:32:38");
INSERT INTO `audit_log` VALUES("1746","2","Database has been backuped by the user <b>Administrator</b>","database","2018-01-09 16:41:03");
INSERT INTO `audit_log` VALUES("1747","2","<b>Administrator</b> Logged out of the system","user","2018-01-09 16:41:05");
INSERT INTO `audit_log` VALUES("1748","2","<b>Administrator</b> Logged onto the system","user","2018-01-09 16:46:52");
INSERT INTO `audit_log` VALUES("1749","2","<b>Administrator</b> Logged out of the system","user","2018-01-10 11:49:06");
INSERT INTO `audit_log` VALUES("1750","2","<b>Administrator</b> Logged onto the system","user","2018-01-10 11:49:13");
INSERT INTO `audit_log` VALUES("1751","2","Database has been backuped by the user <b>Administrator</b>","database","2018-01-10 11:49:19");
INSERT INTO `audit_log` VALUES("1752","2","Table \'<b>Table - 4</b>\' has been occupied ","table","2018-01-10 11:49:36");
INSERT INTO `audit_log` VALUES("1753","2","Table \'<b>Table - 4</b>\' has been occupied ","table","2018-01-10 11:54:18");
INSERT INTO `audit_log` VALUES("1754","2","Table order KOT number 180110-1 has been send","order","2018-01-10 11:54:25");
INSERT INTO `audit_log` VALUES("1755","2","1 - stock item 1 has been sold","stock","2018-01-10 11:54:41");
INSERT INTO `audit_log` VALUES("1756","2","Cash payment for table order has been made for the amount of Rs. 501","billing","2018-01-10 11:54:41");
INSERT INTO `audit_log` VALUES("1757","2","Table \'<b>Table - 4</b>\' has been closed ","table","2018-01-10 11:54:42");
INSERT INTO `audit_log` VALUES("1758","2","<b>Administrator</b> Logged out of the system","user","2018-01-11 10:57:45");
INSERT INTO `audit_log` VALUES("1759","2","<b>Administrator</b> Logged onto the system","user","2018-01-11 10:57:53");
INSERT INTO `audit_log` VALUES("1760","2","Take away order KOT 180111-1 has been send","order","2018-01-11 10:58:19");
INSERT INTO `audit_log` VALUES("1761","2","Delivery order KOT 180111-2 has been send","order","2018-01-11 10:59:17");
INSERT INTO `audit_log` VALUES("1762","2","1 - stock item 1 has been sold","stock","2018-01-11 10:59:22");
INSERT INTO `audit_log` VALUES("1763","2","Cash payment for delivery order has been made for the amount of Rs. 501","billing","2018-01-11 10:59:23");
INSERT INTO `audit_log` VALUES("1764","2","Cash payment for delivery charge has been made for the amount of Rs. 100","billing","2018-01-11 10:59:23");
INSERT INTO `audit_log` VALUES("1765","2","Delivery order KOT 180111-3 has been send","order","2018-01-11 10:59:35");
INSERT INTO `audit_log` VALUES("1766","2","1 - stock item 1 has been sold","stock","2018-01-11 10:59:43");
INSERT INTO `audit_log` VALUES("1767","2","Credit delivery order has been made for the amount of Rs.501 on the debtor named -sugen","billing","2018-01-11 10:59:43");
INSERT INTO `audit_log` VALUES("1768","2","Delivery order KOT 180111-4 has been send","order","2018-01-11 11:01:29");
INSERT INTO `audit_log` VALUES("1769","2","1 - stock item 1 has been sold","stock","2018-01-11 11:01:37");
INSERT INTO `audit_log` VALUES("1770","2","Credit delivery order has been made for the amount of Rs.501 on the debtor named -sugen","billing","2018-01-11 11:01:38");
INSERT INTO `audit_log` VALUES("1771","2","Credit delivery charge has been made for the amount of Rs.100 on the debtor named -sugen","billing","2018-01-11 11:01:38");
INSERT INTO `audit_log` VALUES("1772","2","Delivery order KOT 180111-5 has been send","order","2018-01-11 11:06:01");
INSERT INTO `audit_log` VALUES("1773","2","1 - stock item 1 has been sold","stock","2018-01-11 11:06:18");
INSERT INTO `audit_log` VALUES("1774","2","Cash payment for delivery order has been made for the amount of Rs. 721","billing","2018-01-11 11:06:18");
INSERT INTO `audit_log` VALUES("1775","2","Cash payment for delivery charge has been made for the amount of Rs. 100","billing","2018-01-11 11:06:18");
INSERT INTO `audit_log` VALUES("1776","2","Table \'<b>Table - 4</b>\' has been occupied ","table","2018-01-11 11:06:28");
INSERT INTO `audit_log` VALUES("1777","2","Table order KOT number 180111-6 has been send","order","2018-01-11 11:06:34");
INSERT INTO `audit_log` VALUES("1778","2","1 - stock item 1 has been sold","stock","2018-01-11 11:06:49");
INSERT INTO `audit_log` VALUES("1779","2","1 - stock item 1 has been sold","stock","2018-01-11 11:08:25");
INSERT INTO `audit_log` VALUES("1780","2","1 - stock item 1 has been sold","stock","2018-01-11 11:09:54");
INSERT INTO `audit_log` VALUES("1781","2","Table \'<b>Table - 4</b>\' has been closed ","table","2018-01-11 11:09:55");
INSERT INTO `audit_log` VALUES("1782","2","Cash payment for table order has been made for the amount of Rs. 303","billing","2018-01-11 11:09:56");
INSERT INTO `audit_log` VALUES("1783","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2018-01-11 11:15:31");
INSERT INTO `audit_log` VALUES("1784","2","Table order KOT number 180111-7 has been send","order","2018-01-11 11:15:35");
INSERT INTO `audit_log` VALUES("1785","2","1 - stock item 1 has been sold","stock","2018-01-11 11:15:46");
INSERT INTO `audit_log` VALUES("1786","2","1 - stock item 1 has been sold","stock","2018-01-11 11:21:00");
INSERT INTO `audit_log` VALUES("1787","2","1 - stock item 1 has been sold","stock","2018-01-11 11:21:30");
INSERT INTO `audit_log` VALUES("1788","2","Table \'<b>Table - 20</b>\' has been closed ","table","2018-01-11 11:21:30");
INSERT INTO `audit_log` VALUES("1789","2","Cash payment for table order has been made for the amount of Rs. 303","billing","2018-01-11 11:21:30");
INSERT INTO `audit_log` VALUES("1790","2","<b>Administrator</b> Logged onto the system","user","2018-01-11 12:28:01");
INSERT INTO `audit_log` VALUES("1791","2","Database has been backuped by the user <b>Administrator</b>","database","2018-01-11 12:33:26");
INSERT INTO `audit_log` VALUES("1792","2","<b>Administrator</b> Logged out of the system","user","2018-01-11 12:33:27");
INSERT INTO `audit_log` VALUES("1793","2","<b>Administrator</b> Logged onto the system","user","2018-01-11 12:33:33");
INSERT INTO `audit_log` VALUES("1794","2","Database has been backuped by the user <b>Administrator</b>","database","2018-01-11 12:36:01");
INSERT INTO `audit_log` VALUES("1795","2","<b>Administrator</b> Logged out of the system","user","2018-01-11 12:36:01");
INSERT INTO `audit_log` VALUES("1796","2","<b>Administrator</b> Logged onto the system","user","2018-01-11 12:36:07");
INSERT INTO `audit_log` VALUES("1797","2","<b>Administrator</b> Logged out of the system","user","2018-01-11 12:37:10");
INSERT INTO `audit_log` VALUES("1798","2","<b>Administrator</b> Logged onto the system","user","2018-01-11 12:37:16");
INSERT INTO `audit_log` VALUES("1799","2","Database has been backuped by the user <b>Administrator</b>","database","2018-01-11 12:39:28");
INSERT INTO `audit_log` VALUES("1800","2","<b>Administrator</b> Logged out of the system","user","2018-01-11 12:39:28");
INSERT INTO `audit_log` VALUES("1801","2","<b>Administrator</b> Logged onto the system","user","2018-01-11 12:39:43");
INSERT INTO `audit_log` VALUES("1802","2","<b>Administrator</b> Logged out of the system","user","2018-01-11 16:10:11");
INSERT INTO `audit_log` VALUES("1803","2","<b>Administrator</b> Logged onto the system","user","2018-01-11 16:10:17");
INSERT INTO `audit_log` VALUES("1804","2","<b>Administrator</b> Logged out of the system","user","2018-01-11 16:10:25");
INSERT INTO `audit_log` VALUES("1805","2","<b>Administrator</b> Logged onto the system","user","2018-01-11 16:10:37");
INSERT INTO `audit_log` VALUES("1806","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2018-01-11 16:23:39");
INSERT INTO `audit_log` VALUES("1807","2","Table order KOT number 180111-8 has been send","order","2018-01-11 16:23:47");
INSERT INTO `audit_log` VALUES("1808","2","1 - stock item 1 has been sold","stock","2018-01-11 16:23:53");
INSERT INTO `audit_log` VALUES("1809","2","Cash payment for table order has been made for the amount of Rs. 501","billing","2018-01-11 16:23:53");
INSERT INTO `audit_log` VALUES("1810","2","Table \'<b>Table - 20</b>\' has been closed ","table","2018-01-11 16:23:54");
INSERT INTO `audit_log` VALUES("1811","2","<b>Administrator</b> Logged onto the system","user","2018-01-15 10:43:08");
INSERT INTO `audit_log` VALUES("1812","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2018-01-15 10:43:27");
INSERT INTO `audit_log` VALUES("1813","2","Table order KOT number 180115-1 has been send","order","2018-01-15 10:43:31");
INSERT INTO `audit_log` VALUES("1814","2","1 - stock item 1 has been sold","stock","2018-01-15 10:43:44");
INSERT INTO `audit_log` VALUES("1815","2","Cash payment for table order has been made for the amount of Rs. 501","billing","2018-01-15 10:43:45");
INSERT INTO `audit_log` VALUES("1816","2","Table \'<b>Table - 20</b>\' has been closed ","table","2018-01-15 10:43:45");
INSERT INTO `audit_log` VALUES("1817","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2018-01-15 10:46:59");
INSERT INTO `audit_log` VALUES("1818","2","Table \'<b>Table - 20</b>\' has been closed ","table","2018-01-15 10:47:15");
INSERT INTO `audit_log` VALUES("1819","2","Table \'<b>Table - 15</b>\' has been occupied ","table","2018-01-15 10:49:07");
INSERT INTO `audit_log` VALUES("1820","2","Table \'<b>Table - 15</b>\' has been closed ","table","2018-01-15 10:52:46");
INSERT INTO `audit_log` VALUES("1821","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2018-01-15 12:44:46");
INSERT INTO `audit_log` VALUES("1822","2","<b>Administrator</b> Logged onto the system","user","2018-01-25 10:37:35");
INSERT INTO `audit_log` VALUES("1823","2","<b>Administrator</b> Logged onto the system","user","2018-02-19 14:07:04");
INSERT INTO `audit_log` VALUES("1824","2","Database has been backuped by the user <b>Administrator</b>","database","2018-02-19 14:07:09");
INSERT INTO `audit_log` VALUES("1825","2","<b>Administrator</b> Logged out of the system","user","2018-02-19 14:07:10");
INSERT INTO `audit_log` VALUES("1826","2","<b>Administrator</b> Logged onto the system","user","2018-02-23 10:36:10");
INSERT INTO `audit_log` VALUES("1827","2","Table \'<b>Table - 20</b>\' has been closed ","table","2018-02-23 10:36:54");
INSERT INTO `audit_log` VALUES("1828","2","<b>Administrator</b> Logged out of the system","user","2018-03-02 10:59:12");
INSERT INTO `audit_log` VALUES("1829","2","<b>Administrator</b> Logged onto the system","user","2018-03-02 10:59:19");
INSERT INTO `audit_log` VALUES("1830","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2018-03-02 10:59:27");
INSERT INTO `audit_log` VALUES("1831","2","<b>Administrator</b> Logged onto the system","user","2018-03-15 11:14:03");
INSERT INTO `audit_log` VALUES("1832","2","<b>Administrator</b> Logged onto the system","user","2018-03-19 16:59:01");
INSERT INTO `audit_log` VALUES("1833","2","<b>Administrator</b> Logged onto the system","user","2018-03-20 15:55:04");
INSERT INTO `audit_log` VALUES("1834","2","<b>Administrator</b> Logged out of the system","user","2018-03-20 16:08:25");
INSERT INTO `audit_log` VALUES("1835","2","<b>Administrator</b> Logged onto the system","user","2018-03-20 16:08:37");
INSERT INTO `audit_log` VALUES("1836","2","<b>Administrator</b> Logged onto the system","user","2018-03-21 14:43:43");
INSERT INTO `audit_log` VALUES("1837","2","Database has been backuped by the user <b>Administrator</b>","database","2018-03-21 14:49:41");
INSERT INTO `audit_log` VALUES("1838","2","<b>Administrator</b> Logged out of the system","user","2018-03-21 14:49:43");
INSERT INTO `audit_log` VALUES("1839","2","<b>Administrator</b> Logged out of the system","user","2018-03-22 14:17:56");
INSERT INTO `audit_log` VALUES("1840","2","<b>Administrator</b> Logged onto the system","user","2018-03-22 14:18:20");
INSERT INTO `audit_log` VALUES("1841","2","Table order KOT number 180322-1 has been send","order","2018-03-22 14:18:40");
INSERT INTO `audit_log` VALUES("1842","2","Table order KOT number 180322-2 has been send","order","2018-03-22 14:30:27");
INSERT INTO `audit_log` VALUES("1843","2","Table order KOT number 180322-3 has been send","order","2018-03-22 14:31:52");
INSERT INTO `audit_log` VALUES("1844","2","Table order KOT number 180322-4 has been send","order","2018-03-22 14:32:10");
INSERT INTO `audit_log` VALUES("1845","2","Table order KOT number 180322-5 has been send","order","2018-03-22 14:32:58");
INSERT INTO `audit_log` VALUES("1846","2","Table order KOT number 180322-6 has been send","order","2018-03-22 14:33:51");
INSERT INTO `audit_log` VALUES("1847","2","Table order KOT number 180322-7 has been send","order","2018-03-22 14:34:07");
INSERT INTO `audit_log` VALUES("1848","2","Table order KOT number 180322-8 has been send","order","2018-03-22 14:38:18");
INSERT INTO `audit_log` VALUES("1849","2","Table order KOT number 180322-9 has been send","order","2018-03-22 14:38:54");
INSERT INTO `audit_log` VALUES("1850","2","Table order KOT number 180322-10 has been send","order","2018-03-22 14:56:07");
INSERT INTO `audit_log` VALUES("1851","2","Table order KOT number 180322-11 has been send","order","2018-03-22 14:58:01");
INSERT INTO `audit_log` VALUES("1852","2","Table order KOT number 180322-12 has been send","order","2018-03-22 14:58:53");
INSERT INTO `audit_log` VALUES("1853","2","Table order KOT number 180322-13 has been send","order","2018-03-22 14:59:12");
INSERT INTO `audit_log` VALUES("1854","2","<b>Administrator</b> Logged onto the system","user","2018-03-28 10:30:19");
INSERT INTO `audit_log` VALUES("1855","2","40 - stock item 7 has been sold","stock","2018-03-28 10:34:54");
INSERT INTO `audit_log` VALUES("1856","2","8 - stock item 6 has been sold","stock","2018-03-28 10:34:54");
INSERT INTO `audit_log` VALUES("1857","2","200 - stock item 5 has been sold","stock","2018-03-28 10:34:54");
INSERT INTO `audit_log` VALUES("1858","2","2 - stock item 1 has been sold","stock","2018-03-28 10:34:54");
INSERT INTO `audit_log` VALUES("1859","2","20 - stock item 2 has been sold","stock","2018-03-28 10:34:54");
INSERT INTO `audit_log` VALUES("1860","2","16 - stock item 1 has been sold","stock","2018-03-28 10:34:54");
INSERT INTO `audit_log` VALUES("1861","2","Cash payment for table order has been made for the amount of Rs. 71355127","billing","2018-03-28 10:34:54");
INSERT INTO `audit_log` VALUES("1862","2","Table \'<b>Table - 1</b>\' has been closed ","table","2018-03-28 10:34:55");
INSERT INTO `audit_log` VALUES("1863","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2018-03-28 10:40:17");
INSERT INTO `audit_log` VALUES("1864","2","<b>Administrator</b> Logged onto the system","user","2018-04-02 10:21:37");
INSERT INTO `audit_log` VALUES("1865","2","<b>Administrator</b> Logged out of the system","user","2018-04-02 10:38:19");
INSERT INTO `audit_log` VALUES("1866","2","<b>Administrator</b> Logged onto the system","user","2018-04-02 10:38:26");
INSERT INTO `audit_log` VALUES("1867","2","Table \'<b>Table - 1</b>\' has been closed ","table","2018-04-02 10:38:33");
INSERT INTO `audit_log` VALUES("1868","2","Table \'<b>Table - 2</b>\' has been occupied ","table","2018-04-02 10:47:26");
INSERT INTO `audit_log` VALUES("1869","2","Database has been backuped by the user <b>Administrator</b>","database","2018-04-02 11:36:30");
INSERT INTO `audit_log` VALUES("1870","2","<b>Administrator</b> Logged out of the system","user","2018-04-02 11:36:31");
INSERT INTO `audit_log` VALUES("1871","2","<b>Administrator</b> Logged onto the system","user","2018-04-02 11:36:49");
INSERT INTO `audit_log` VALUES("1872","2","New table has been created named Table - 22","table","2018-04-02 11:39:49");
INSERT INTO `audit_log` VALUES("1873","2","Database has been backuped by the user <b>Administrator</b>","database","2018-04-02 15:27:19");
INSERT INTO `audit_log` VALUES("1874","2","<b>Administrator</b> Logged out of the system","user","2018-04-02 15:27:21");
INSERT INTO `audit_log` VALUES("1875","2","<b>Administrator</b> Logged onto the system","user","2018-04-04 12:26:49");
INSERT INTO `audit_log` VALUES("1876","2","<b>Administrator</b> Logged onto the system","user","2018-04-06 11:20:09");
INSERT INTO `audit_log` VALUES("1877","2","Updated password of user -sugen\'sugen","user","2018-04-06 11:20:43");
INSERT INTO `audit_log` VALUES("1878","2","Database has been backuped by the user <b>Administrator</b>","database","2018-04-06 11:20:47");
INSERT INTO `audit_log` VALUES("1879","2","<b>Administrator</b> Logged out of the system","user","2018-04-06 11:20:48");
INSERT INTO `audit_log` VALUES("1880","6","<b>Sugen</b> Logged onto the system","user","2018-04-06 11:20:54");
INSERT INTO `audit_log` VALUES("1881","2","<b>Administrator</b> Logged onto the system","user","2018-04-11 14:25:17");
INSERT INTO `audit_log` VALUES("1882","2","Table order KOT number 180411-1 has been send","order","2018-04-11 14:29:28");
INSERT INTO `audit_log` VALUES("1883","2","Table order KOT number 180411-2 has been send","order","2018-04-11 14:32:45");
INSERT INTO `audit_log` VALUES("1884","2","20 - stock item 7 has been sold","stock","2018-04-11 14:55:33");
INSERT INTO `audit_log` VALUES("1885","2","4 - stock item 6 has been sold","stock","2018-04-11 14:55:33");
INSERT INTO `audit_log` VALUES("1886","2","100 - stock item 5 has been sold","stock","2018-04-11 14:55:33");
INSERT INTO `audit_log` VALUES("1887","2","Cash payment for table order has been made for the amount of Rs. 1128","billing","2018-04-11 14:55:33");
INSERT INTO `audit_log` VALUES("1888","2","Table \'<b>Table - 2</b>\' has been closed ","table","2018-04-11 14:55:34");
INSERT INTO `audit_log` VALUES("1889","2","Table \'<b>Table - 2</b>\' has been occupied ","table","2018-04-11 14:56:26");
INSERT INTO `audit_log` VALUES("1890","2","Table order KOT number 180411-3 has been send","order","2018-04-11 14:56:35");
INSERT INTO `audit_log` VALUES("1891","2","2 - stock item 1 has been sold","stock","2018-04-11 14:57:09");
INSERT INTO `audit_log` VALUES("1892","2","Cash payment for table order has been made for the amount of Rs. 1441","billing","2018-04-11 14:57:09");
INSERT INTO `audit_log` VALUES("1893","2","Table \'<b>Table - 2</b>\' has been closed ","table","2018-04-11 14:57:09");
INSERT INTO `audit_log` VALUES("1894","2","Table \'<b>Table - 2</b>\' has been occupied ","table","2018-04-11 15:03:37");
INSERT INTO `audit_log` VALUES("1895","2","Table order KOT number 180411-4 has been send","order","2018-04-11 15:03:49");
INSERT INTO `audit_log` VALUES("1896","2","2 - stock item 1 has been sold","stock","2018-04-11 15:04:17");
INSERT INTO `audit_log` VALUES("1897","2","Cash payment for table order has been made for the amount of Rs. 1441","billing","2018-04-11 15:04:17");
INSERT INTO `audit_log` VALUES("1898","2","Table \'<b>Table - 2</b>\' has been closed ","table","2018-04-11 15:04:18");
INSERT INTO `audit_log` VALUES("1899","2","Table \'<b>Table - 2</b>\' has been occupied ","table","2018-04-11 15:09:41");
INSERT INTO `audit_log` VALUES("1900","2","Table order KOT number 180411-5 has been send","order","2018-04-11 15:09:48");
INSERT INTO `audit_log` VALUES("1901","2","10 - stock item 7 has been sold","stock","2018-04-11 15:10:18");
INSERT INTO `audit_log` VALUES("1902","2","2 - stock item 6 has been sold","stock","2018-04-11 15:10:18");
INSERT INTO `audit_log` VALUES("1903","2","50 - stock item 5 has been sold","stock","2018-04-11 15:10:18");
INSERT INTO `audit_log` VALUES("1904","2","Cash payment for table order has been made for the amount of Rs. 468","billing","2018-04-11 15:10:18");
INSERT INTO `audit_log` VALUES("1905","2","Table order KOT number 180411-6 has been send","order","2018-04-11 15:19:11");
INSERT INTO `audit_log` VALUES("1906","2","4 - stock item 1 has been sold","stock","2018-04-11 15:20:15");
INSERT INTO `audit_log` VALUES("1907","2","Cash payment for table order has been made for the amount of Rs. 2882","billing","2018-04-11 15:20:16");
INSERT INTO `audit_log` VALUES("1908","2","Table \'<b>Table - 2</b>\' has been closed ","table","2018-04-11 15:20:16");
INSERT INTO `audit_log` VALUES("1909","2","Table \'<b>Table - 2</b>\' has been occupied ","table","2018-04-11 15:21:22");
INSERT INTO `audit_log` VALUES("1910","2","Table order KOT number 180411-7 has been send","order","2018-04-11 15:21:29");
INSERT INTO `audit_log` VALUES("1911","2","2 - stock item 1 has been sold","stock","2018-04-11 15:31:19");
INSERT INTO `audit_log` VALUES("1912","2","Cash payment for table order has been made for the amount of Rs. 1441","billing","2018-04-11 15:31:19");
INSERT INTO `audit_log` VALUES("1913","2","Table \'<b>Table - 2</b>\' has been closed ","table","2018-04-11 15:31:19");
INSERT INTO `audit_log` VALUES("1914","2","Table \'<b>Table - 2</b>\' has been occupied ","table","2018-04-11 15:36:01");
INSERT INTO `audit_log` VALUES("1915","2","Table order KOT number 180411-8 has been send","order","2018-04-11 15:36:19");
INSERT INTO `audit_log` VALUES("1916","2","Cash payment for table order has been made for the amount of Rs. 990","billing","2018-04-11 16:04:49");
INSERT INTO `audit_log` VALUES("1917","2","Table \'<b>Table - 2</b>\' has been closed ","table","2018-04-11 16:04:50");
INSERT INTO `audit_log` VALUES("1918","2","Table \'<b>Table - 2</b>\' has been occupied ","table","2018-04-11 16:13:05");
INSERT INTO `audit_log` VALUES("1919","2","Table order KOT number 180411-9 has been send","order","2018-04-11 16:13:12");
INSERT INTO `audit_log` VALUES("1920","2","1 - stock item 1 has been sold","stock","2018-04-11 16:13:43");
INSERT INTO `audit_log` VALUES("1921","2","Cash payment for table order has been made for the amount of Rs. 1161","billing","2018-04-11 16:13:44");
INSERT INTO `audit_log` VALUES("1922","2","Table \'<b>Table - 2</b>\' has been closed ","table","2018-04-11 16:13:44");
INSERT INTO `audit_log` VALUES("1923","2","Table \'<b>Table - 2</b>\' has been occupied ","table","2018-04-12 11:27:42");
INSERT INTO `audit_log` VALUES("1924","2","Table order KOT number 180412-1 has been send","order","2018-04-12 11:27:55");
INSERT INTO `audit_log` VALUES("1925","2","Table order KOT number 180412-2 has been send","order","2018-04-12 11:42:49");
INSERT INTO `audit_log` VALUES("1926","2","Table order KOT number 180412-3 has been send","order","2018-04-12 11:45:03");
INSERT INTO `audit_log` VALUES("1927","2","7 - stock item 1 has been sold","stock","2018-04-12 11:49:13");
INSERT INTO `audit_log` VALUES("1928","2","Cash payment for table order has been made for the amount of Rs. 3504","billing","2018-04-12 11:49:13");
INSERT INTO `audit_log` VALUES("1929","2","Table \'<b>Table - 2</b>\' has been closed ","table","2018-04-12 11:49:15");
INSERT INTO `audit_log` VALUES("1930","2","Table \'<b>Table - 2</b>\' has been occupied ","table","2018-04-12 12:02:10");
INSERT INTO `audit_log` VALUES("1931","2","Table order KOT number 180412-4 has been send","order","2018-04-12 12:02:19");
INSERT INTO `audit_log` VALUES("1932","2","Cash payment for table order has been made for the amount of Rs. 303","billing","2018-04-12 12:02:39");
INSERT INTO `audit_log` VALUES("1933","2","Table \'<b>Table - 2</b>\' has been closed ","table","2018-04-12 12:02:40");
INSERT INTO `audit_log` VALUES("1934","2","Table \'<b>Table - 2</b>\' has been occupied ","table","2018-04-12 12:18:50");
INSERT INTO `audit_log` VALUES("1935","2","Table order KOT number 180412-5 has been send","order","2018-04-12 12:18:57");
INSERT INTO `audit_log` VALUES("1936","2","2 - stock item 1 has been sold","stock","2018-04-12 12:23:54");
INSERT INTO `audit_log` VALUES("1937","2","Cash payment for table order has been made for the amount of Rs. 1001","billing","2018-04-12 12:23:55");
INSERT INTO `audit_log` VALUES("1938","2","Table \'<b>Table - 2</b>\' has been closed ","table","2018-04-12 12:23:55");
INSERT INTO `audit_log` VALUES("1939","2","Table \'<b>Table - 2</b>\' has been occupied ","table","2018-04-12 12:27:05");
INSERT INTO `audit_log` VALUES("1940","2","Table order KOT number 180412-6 has been send","order","2018-04-12 12:27:13");
INSERT INTO `audit_log` VALUES("1941","2","<b>Administrator</b> Logged onto the system","user","2018-04-13 11:05:13");
INSERT INTO `audit_log` VALUES("1942","2","Table order KOT number 180413-1 has been send","order","2018-04-13 11:31:16");
INSERT INTO `audit_log` VALUES("1943","2","4 - stock item 1 has been sold","stock","2018-04-13 11:31:48");
INSERT INTO `audit_log` VALUES("1944","2","Cash payment for table order has been made for the amount of Rs. 2305","billing","2018-04-13 11:31:48");
INSERT INTO `audit_log` VALUES("1945","2","Table \'<b>Table - 2</b>\' has been closed ","table","2018-04-13 11:31:49");
INSERT INTO `audit_log` VALUES("1946","2","Table \'<b>Table - 2</b>\' has been occupied ","table","2018-04-13 11:32:26");
INSERT INTO `audit_log` VALUES("1947","2","Table order KOT number 180413-2 has been send","order","2018-04-13 11:32:32");
INSERT INTO `audit_log` VALUES("1948","2","Table order KOT number 180413-3 has been send","order","2018-04-13 11:32:41");
INSERT INTO `audit_log` VALUES("1949","2","1 - stock item 1 has been sold","stock","2018-04-13 11:33:32");
INSERT INTO `audit_log` VALUES("1950","2","Cash payment for table order has been made for the amount of Rs. 803","billing","2018-04-13 11:33:32");
INSERT INTO `audit_log` VALUES("1951","2","Table \'<b>Table - 2</b>\' has been closed ","table","2018-04-13 11:33:33");
INSERT INTO `audit_log` VALUES("1952","2","Table \'<b>Table - 2</b>\' has been occupied ","table","2018-04-13 16:28:00");
INSERT INTO `audit_log` VALUES("1953","2","Table order KOT number 180413-4 has been send","order","2018-04-13 16:28:08");
INSERT INTO `audit_log` VALUES("1954","2","Table order KOT number 180413-5 has been send","order","2018-04-13 16:28:24");
INSERT INTO `audit_log` VALUES("1955","2","2 - stock item 1 has been sold","stock","2018-04-13 16:29:13");
INSERT INTO `audit_log` VALUES("1956","2","Cash payment for table order has been made for the amount of Rs. 1304","billing","2018-04-13 16:29:13");
INSERT INTO `audit_log` VALUES("1957","2","Table \'<b>Table - 2</b>\' has been closed ","table","2018-04-13 16:29:14");
INSERT INTO `audit_log` VALUES("1958","2","Table \'<b>Table - 2</b>\' has been occupied ","table","2018-04-16 11:23:29");
INSERT INTO `audit_log` VALUES("1959","2","Table order KOT number 180416-1 has been send","order","2018-04-16 11:23:35");
INSERT INTO `audit_log` VALUES("1960","2","Table order KOT number 180416-2 has been send","order","2018-04-16 11:23:43");
INSERT INTO `audit_log` VALUES("1961","2","Table order KOT number 180416-3 has been send","order","2018-04-16 11:23:49");
INSERT INTO `audit_log` VALUES("1962","2","2 - stock item 1 has been sold","stock","2018-04-16 11:24:34");
INSERT INTO `audit_log` VALUES("1963","2","Cash payment for table order has been made for the amount of Rs. 1001","billing","2018-04-16 11:24:34");
INSERT INTO `audit_log` VALUES("1964","2","Table \'<b>Table - 2</b>\' has been closed ","table","2018-04-16 11:24:35");
INSERT INTO `audit_log` VALUES("1965","2","Table \'<b>Table - 2</b>\' has been occupied ","table","2018-04-16 11:36:31");
INSERT INTO `audit_log` VALUES("1966","2","Table order KOT number 180416-4 has been send","order","2018-04-16 11:43:34");
INSERT INTO `audit_log` VALUES("1967","2","Table order KOT number 180416-5 has been send","order","2018-04-16 11:43:42");
INSERT INTO `audit_log` VALUES("1968","2","2 - stock item 1 has been sold","stock","2018-04-16 11:44:10");
INSERT INTO `audit_log` VALUES("1969","2","Cash payment for table order has been made for the amount of Rs. 1001","billing","2018-04-16 11:44:11");
INSERT INTO `audit_log` VALUES("1970","2","Table \'<b>Table - 2</b>\' has been closed ","table","2018-04-16 11:44:12");
INSERT INTO `audit_log` VALUES("1971","2","Table \'<b>Table - 2</b>\' has been occupied ","table","2018-04-16 11:44:47");
INSERT INTO `audit_log` VALUES("1972","2","Table order KOT number 180416-6 has been send","order","2018-04-16 11:44:52");
INSERT INTO `audit_log` VALUES("1973","2","Table order KOT number 180416-7 has been send","order","2018-04-16 11:44:57");
INSERT INTO `audit_log` VALUES("1974","2","2 - stock item 1 has been sold","stock","2018-04-16 12:13:08");
INSERT INTO `audit_log` VALUES("1975","2","Cash payment for table order has been made for the amount of Rs. 1001","billing","2018-04-16 12:13:08");
INSERT INTO `audit_log` VALUES("1976","2","Table \'<b>Table - 2</b>\' has been closed ","table","2018-04-16 12:13:09");
INSERT INTO `audit_log` VALUES("1977","2","Table \'<b>Table - 2</b>\' has been occupied ","table","2018-04-16 15:12:32");
INSERT INTO `audit_log` VALUES("1978","2","Retail order KOT 180416-8 has been send","order","2018-04-16 17:17:40");
INSERT INTO `audit_log` VALUES("1979","2","2 - stock item 1 has been sold","stock","2018-04-16 17:17:44");
INSERT INTO `audit_log` VALUES("1980","2","Cash payment for retail order has been made for the amount of Rs. 910","billing","2018-04-16 17:17:44");
INSERT INTO `audit_log` VALUES("1981","2","<b>Administrator</b> Logged onto the system","user","2018-04-17 10:17:30");
INSERT INTO `audit_log` VALUES("1982","2","Table order KOT number 180417-1 has been send","order","2018-04-17 10:29:51");
INSERT INTO `audit_log` VALUES("1983","2","Table order KOT number 180417-2 has been send","order","2018-04-17 10:30:04");
INSERT INTO `audit_log` VALUES("1984","2","Table order KOT number 180417-3 has been send","order","2018-04-17 10:38:55");
INSERT INTO `audit_log` VALUES("1985","2","Table order KOT number 180417-4 has been send","order","2018-04-17 10:41:43");
INSERT INTO `audit_log` VALUES("1986","2","Table order KOT number 180417-5 has been send","order","2018-04-17 10:42:36");
INSERT INTO `audit_log` VALUES("1987","2","Table order KOT number 180417-6 has been send","order","2018-04-17 10:48:54");
INSERT INTO `audit_log` VALUES("1988","2","Table order KOT number 180417-7 has been send","order","2018-04-17 10:50:53");
INSERT INTO `audit_log` VALUES("1989","2","Table order KOT number 180417-8 has been send","order","2018-04-17 10:53:40");
INSERT INTO `audit_log` VALUES("1990","2","Table order KOT number 180417-9 has been send","order","2018-04-17 10:54:06");
INSERT INTO `audit_log` VALUES("1991","2","Table order KOT number 180417-10 has been send","order","2018-04-17 10:56:36");
INSERT INTO `audit_log` VALUES("1992","2","Table order KOT number 180417-11 has been send","order","2018-04-17 11:01:44");
INSERT INTO `audit_log` VALUES("1993","2","Table order KOT number 180417-12 has been send","order","2018-04-17 11:02:05");
INSERT INTO `audit_log` VALUES("1994","2","Table order KOT number 180417-13 has been send","order","2018-04-17 11:07:44");
INSERT INTO `audit_log` VALUES("1995","2","Table order KOT number 180417-14 has been send","order","2018-04-17 11:08:28");
INSERT INTO `audit_log` VALUES("1996","2","Table order KOT number 180417-15 has been send","order","2018-04-17 11:09:47");
INSERT INTO `audit_log` VALUES("1997","2","Table order KOT number 180417-16 has been send","order","2018-04-17 11:11:51");
INSERT INTO `audit_log` VALUES("1998","2","Table order KOT number 180417-17 has been send","order","2018-04-17 11:13:10");
INSERT INTO `audit_log` VALUES("1999","2","Table order KOT number 180417-18 has been send","order","2018-04-17 11:14:52");
INSERT INTO `audit_log` VALUES("2000","2","Table order KOT number 180417-19 has been send","order","2018-04-17 11:16:42");
INSERT INTO `audit_log` VALUES("2001","2","Table order KOT number 180417-20 has been send","order","2018-04-17 11:26:15");
INSERT INTO `audit_log` VALUES("2002","2","Table order KOT number 180417-21 has been send","order","2018-04-17 11:28:27");
INSERT INTO `audit_log` VALUES("2003","2","Database has been backuped by the user <b>Administrator</b>","database","2018-04-17 15:09:21");
INSERT INTO `audit_log` VALUES("2004","2","<b>Administrator</b> Logged out of the system","user","2018-04-17 15:09:22");
INSERT INTO `audit_log` VALUES("2005","5","<b>Staff</b> Logged onto the system","user","2018-04-17 15:09:43");
INSERT INTO `audit_log` VALUES("2006","2","<b>Administrator</b> Logged onto the system","user","2018-04-18 10:44:59");
INSERT INTO `audit_log` VALUES("2007","2","Database has been backuped by the user <b>Administrator</b>","database","2018-04-18 10:51:36");
INSERT INTO `audit_log` VALUES("2008","2","<b>Administrator</b> Logged out of the system","user","2018-04-18 10:51:36");
INSERT INTO `audit_log` VALUES("2009","5","<b>Staff</b> Logged onto the system","user","2018-04-18 10:51:42");
INSERT INTO `audit_log` VALUES("2010","2","<b>Administrator</b> Logged onto the system","user","2018-04-23 12:26:56");
INSERT INTO `audit_log` VALUES("2011","2","10 - stock item 7 has been sold","stock","2018-04-23 17:32:59");
INSERT INTO `audit_log` VALUES("2012","2","2 - stock item 6 has been sold","stock","2018-04-23 17:32:59");
INSERT INTO `audit_log` VALUES("2013","2","50 - stock item 5 has been sold","stock","2018-04-23 17:32:59");
INSERT INTO `audit_log` VALUES("2014","2","18 - stock item 1 has been sold","stock","2018-04-23 17:32:59");
INSERT INTO `audit_log` VALUES("2015","2","Cash payment for table order has been made for the amount of Rs. 13684","billing","2018-04-23 17:33:04");
INSERT INTO `audit_log` VALUES("2016","2","Table \'<b>Table - 2</b>\' has been closed ","table","2018-04-23 17:33:05");
INSERT INTO `audit_log` VALUES("2017","2","Table \'<b>Table - 2</b>\' has been occupied ","table","2018-04-23 17:33:33");
INSERT INTO `audit_log` VALUES("2018","2","Table order KOT number 180423-1 has been send","order","2018-04-23 17:33:40");
INSERT INTO `audit_log` VALUES("2019","2","Table \'<b>Table - 2</b>\' has been closed ","table","2018-04-23 17:33:57");
INSERT INTO `audit_log` VALUES("2020","2","<b>Administrator</b> Logged onto the system","user","2018-04-24 10:27:09");
INSERT INTO `audit_log` VALUES("2021","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2018-04-24 11:03:11");
INSERT INTO `audit_log` VALUES("2022","2","Table order KOT number 180424-1 has been send","order","2018-04-24 11:03:16");
INSERT INTO `audit_log` VALUES("2023","2","Table \'<b>Table - 20</b>\' has been closed ","table","2018-04-24 11:04:21");
INSERT INTO `audit_log` VALUES("2024","2","Take away order KOT 180424-2 has been send","order","2018-04-24 12:04:58");
INSERT INTO `audit_log` VALUES("2025","2","Pick Up order KOT 180424-3 has been send","order","2018-04-24 12:14:47");
INSERT INTO `audit_log` VALUES("2026","2","Delivery order KOT 180424-4 has been send","order","2018-04-24 12:15:46");
INSERT INTO `audit_log` VALUES("2027","2","Retail order KOT 180424-5 has been send","order","2018-04-24 12:17:15");
INSERT INTO `audit_log` VALUES("2028","2","Table \'<b>Table - 15</b>\' has been occupied ","table","2018-04-24 12:48:12");
INSERT INTO `audit_log` VALUES("2029","2","Table order KOT number 180424-6 has been send","order","2018-04-24 12:48:16");
INSERT INTO `audit_log` VALUES("2030","2","Table order KOT number 180424-7 has been send","order","2018-04-24 12:55:50");
INSERT INTO `audit_log` VALUES("2031","2","Table order KOT number 180424-8 has been send","order","2018-04-24 13:07:45");
INSERT INTO `audit_log` VALUES("2032","2","<b>Administrator</b> Logged onto the system","user","2018-04-24 17:01:54");
INSERT INTO `audit_log` VALUES("2033","2","<b>Administrator</b> Logged onto the system","user","2018-04-26 10:18:19");
INSERT INTO `audit_log` VALUES("2034","2","2 - stock item 1 has been sold","stock","2018-04-26 11:31:35");
INSERT INTO `audit_log` VALUES("2035","2","Cash payment for table order has been made for the amount of Rs. 1744","billing","2018-04-26 11:31:37");
INSERT INTO `audit_log` VALUES("2036","2","Table \'<b>Table - 15</b>\' has been closed ","table","2018-04-26 11:31:37");
INSERT INTO `audit_log` VALUES("2037","2","<b>Administrator</b> Logged onto the system","user","2018-05-01 16:10:37");
INSERT INTO `audit_log` VALUES("2038","2","<b>Administrator</b> Logged onto the system","user","2018-05-15 16:43:49");
INSERT INTO `audit_log` VALUES("2039","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2018-05-15 16:51:24");
INSERT INTO `audit_log` VALUES("2040","2","Table order KOT number 180515-1 has been send","order","2018-05-15 16:51:28");
INSERT INTO `audit_log` VALUES("2041","2","1 - stock item 1 has been sold","stock","2018-05-15 16:51:40");
INSERT INTO `audit_log` VALUES("2042","2","Cash payment for table order has been made for the amount of Rs. 198","billing","2018-05-15 16:51:41");
INSERT INTO `audit_log` VALUES("2043","2","Table \'<b>Table - 1</b>\' has been closed ","table","2018-05-15 16:51:50");
INSERT INTO `audit_log` VALUES("2044","2","<b>Administrator</b> Logged onto the system","user","2018-05-16 11:53:12");
INSERT INTO `audit_log` VALUES("2045","2","Database has been backuped by the user <b>Administrator</b>","database","2018-05-16 11:53:23");
INSERT INTO `audit_log` VALUES("2046","2","<b>Administrator</b> Logged out of the system","user","2018-05-16 11:53:24");
INSERT INTO `audit_log` VALUES("2047","2","<b>Administrator</b> Logged onto the system","user","2018-05-16 11:54:23");
INSERT INTO `audit_log` VALUES("2048","2","Database has been backuped by the user <b>Administrator</b>","database","2018-05-16 11:54:27");
INSERT INTO `audit_log` VALUES("2049","2","<b>Administrator</b> Logged out of the system","user","2018-05-16 11:54:28");
INSERT INTO `audit_log` VALUES("2050","2","<b>Administrator</b> Logged onto the system","user","2018-05-28 11:34:24");
INSERT INTO `audit_log` VALUES("2051","2","<b>Administrator</b> Logged onto the system","user","2018-05-31 10:45:19");
INSERT INTO `audit_log` VALUES("2052","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2018-05-31 16:03:20");
INSERT INTO `audit_log` VALUES("2053","2","Table order KOT number 180531-1 has been send","order","2018-05-31 16:03:29");
INSERT INTO `audit_log` VALUES("2054","2","<b>Administrator</b> Logged onto the system","user","2018-06-04 14:21:48");
INSERT INTO `audit_log` VALUES("2055","2","Take away order KOT 180604-1 has been send","order","2018-06-04 14:22:27");
INSERT INTO `audit_log` VALUES("2056","2","1 - stock item 1 has been sold","stock","2018-06-04 14:23:51");
INSERT INTO `audit_log` VALUES("2057","2","Cash payment for take away order has been made for the amount of Rs. 721","billing","2018-06-04 14:23:52");
INSERT INTO `audit_log` VALUES("2058","2","Take away order KOT 180604-2 has been send","order","2018-06-04 14:24:20");
INSERT INTO `audit_log` VALUES("2059","2","<b>Administrator</b> Logged onto the system","user","2018-06-07 11:09:46");
INSERT INTO `audit_log` VALUES("2060","2","<b>Administrator</b> Logged onto the system","user","2018-06-13 11:38:48");
INSERT INTO `audit_log` VALUES("2061","2","Take away order KOT 180613-1 has been send","order","2018-06-13 11:39:40");
INSERT INTO `audit_log` VALUES("2062","2","<b>Administrator</b> Logged onto the system","user","2018-06-14 10:49:52");
INSERT INTO `audit_log` VALUES("2063","2","<b>Administrator</b> Logged onto the system","user","2018-06-15 10:43:10");
INSERT INTO `audit_log` VALUES("2064","2","<b>Administrator</b> Logged onto the system","user","2018-06-20 11:01:18");
INSERT INTO `audit_log` VALUES("2065","2","<b>Administrator</b> Logged onto the system","user","2018-06-21 14:28:43");
INSERT INTO `audit_log` VALUES("2066","2","Take away order KOT 180621-1 has been send","order","2018-06-21 14:42:37");
INSERT INTO `audit_log` VALUES("2067","2","<b>Administrator</b> Logged onto the system","user","2018-07-04 10:19:29");
INSERT INTO `audit_log` VALUES("2068","2","Table order KOT number 180704-1 has been send","order","2018-07-04 10:19:44");
INSERT INTO `audit_log` VALUES("2069","2","<b>Administrator</b> Logged onto the system","user","2018-07-09 16:25:57");
INSERT INTO `audit_log` VALUES("2070","2","<b>Administrator</b> Logged onto the system","user","2018-07-19 11:37:14");
INSERT INTO `audit_log` VALUES("2071","2","<b>Administrator</b> Logged onto the system","user","2018-07-19 12:06:38");
INSERT INTO `audit_log` VALUES("2072","2","Table order KOT number 180719-1 has been send","order","2018-07-19 15:13:51");
INSERT INTO `audit_log` VALUES("2073","2","<b>Administrator</b> Logged onto the system","user","2018-07-20 11:55:37");
INSERT INTO `audit_log` VALUES("2074","1","Database has been backuped by the user <b>Superadmin</b>","database","2018-08-24 16:40:05");
INSERT INTO `audit_log` VALUES("2075","2","<b>Administrator</b> Logged onto the system","user","2018-08-29 16:33:04");
INSERT INTO `audit_log` VALUES("2076","2","<b>Administrator</b> Logged onto the system","user","2018-08-30 15:54:35");
INSERT INTO `audit_log` VALUES("2077","2","<b>Administrator</b> Logged onto the system","user","2018-08-31 10:51:19");
INSERT INTO `audit_log` VALUES("2078","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2018-08-31 10:59:39");
INSERT INTO `audit_log` VALUES("2079","2","Table order KOT number 180831-1 has been send","order","2018-08-31 10:59:44");
INSERT INTO `audit_log` VALUES("2080","2","Occupancy has been moved to the table \'<b>Table - 4</b>\'","table","2018-08-31 11:00:10");
INSERT INTO `audit_log` VALUES("2081","2","Table \'<b>Table - 3</b>\' has been occupied ","table","2018-08-31 11:00:39");
INSERT INTO `audit_log` VALUES("2082","2","Table order KOT number 180831-2 has been send","order","2018-08-31 11:00:43");
INSERT INTO `audit_log` VALUES("2083","2","Occupancy has been moved to the table \'<b>Table - 22</b>\'","table","2018-08-31 11:00:56");
INSERT INTO `audit_log` VALUES("2084","2","Occupancy has been moved to the table \'<b>Table - 14</b>\'","table","2018-08-31 11:04:37");
INSERT INTO `audit_log` VALUES("2085","2","1 - stock item 1 has been sold","stock","2018-08-31 11:08:59");
INSERT INTO `audit_log` VALUES("2086","2","Cash payment for table order has been made for the amount of Rs. 501","billing","2018-08-31 11:09:00");
INSERT INTO `audit_log` VALUES("2087","2","Table \'<b>Table - 14</b>\' has been closed ","table","2018-08-31 11:09:00");
INSERT INTO `audit_log` VALUES("2088","2","Table \'<b>Table - 14</b>\' has been occupied ","table","2018-08-31 11:09:07");
INSERT INTO `audit_log` VALUES("2089","2","Table order KOT number 180831-3 has been send","order","2018-08-31 11:09:12");
INSERT INTO `audit_log` VALUES("2090","2","Occupancy has been moved to the table \'<b>Table - 21</b>\'","table","2018-08-31 11:09:52");
INSERT INTO `audit_log` VALUES("2091","2","Occupancy has been moved to the table \'<b>Table - 15</b>\'","table","2018-08-31 11:10:06");
INSERT INTO `audit_log` VALUES("2092","2","Occupancy has been moved to the table \'<b>Table - 2</b>\'","table","2018-08-31 11:10:18");
INSERT INTO `audit_log` VALUES("2093","2","Take away order KOT 180831-4 has been send","order","2018-08-31 11:12:21");
INSERT INTO `audit_log` VALUES("2094","2","Occupancy has been moved to the table \'<b>Table - 7</b>\'","table","2018-08-31 11:13:12");
INSERT INTO `audit_log` VALUES("2095","2","Occupancy has been moved to the table \'<b>Table - 17</b>\'","table","2018-08-31 11:13:57");
INSERT INTO `audit_log` VALUES("2096","2","Occupancy has been moved to the table \'<b>Table - 9</b>\'","table","2018-08-31 11:14:25");
INSERT INTO `audit_log` VALUES("2097","2","Occupancy has been moved to the table \'<b>Table - 4</b>\'","table","2018-08-31 11:17:21");
INSERT INTO `audit_log` VALUES("2098","2","Occupancy has been moved to the table \'<b>Table - 8</b>\'","table","2018-08-31 11:17:30");
INSERT INTO `audit_log` VALUES("2099","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2018-08-31 11:22:52");
INSERT INTO `audit_log` VALUES("2100","2","Table order KOT number 180831-5 has been send","order","2018-08-31 11:22:57");
INSERT INTO `audit_log` VALUES("2101","2","Occupancy has been moved to the table \'<b>Table - 2</b>\'","table","2018-08-31 11:23:09");
INSERT INTO `audit_log` VALUES("2102","2","Table \'<b>Table - 20</b>\' has been occupied ","table","2018-08-31 11:23:32");
INSERT INTO `audit_log` VALUES("2103","2","Table order KOT number 180831-6 has been send","order","2018-08-31 11:23:45");
INSERT INTO `audit_log` VALUES("2104","2","Occupancy has been moved to the table \'<b>Table - 6</b>\'","table","2018-08-31 11:38:06");
INSERT INTO `audit_log` VALUES("2105","1","Database has been backuped by the user <b>Superadmin</b>","database","2018-09-21 12:00:10");
INSERT INTO `audit_log` VALUES("2106","2","<b>Administrator</b> Logged onto the system","user","2018-09-21 12:00:17");
INSERT INTO `audit_log` VALUES("2107","2","Updated user detail of -sugen\'sugen\' from \'30\' to \'5\'","user","2018-09-21 12:00:42");
INSERT INTO `audit_log` VALUES("2108","2","Database has been backuped by the user <b>Administrator</b>","database","2018-09-21 12:01:25");
INSERT INTO `audit_log` VALUES("2109","2","<b>Administrator</b> Logged out of the system","user","2018-09-21 12:01:25");
INSERT INTO `audit_log` VALUES("2110","5","<b>Staff</b> Logged onto the system","user","2018-09-21 12:01:35");
INSERT INTO `audit_log` VALUES("2111","2","<b>Administrator</b> Logged onto the system","user","2018-09-21 16:35:22");
INSERT INTO `audit_log` VALUES("2112","2","Take away order KOT 180921-1 has been send","order","2018-09-21 16:50:29");
INSERT INTO `audit_log` VALUES("2113","2","<b>Administrator</b> Logged onto the system","user","2018-10-04 16:48:53");
INSERT INTO `audit_log` VALUES("2114","2","<b>Administrator</b> Logged onto the system","user","2018-10-08 12:13:19");
INSERT INTO `audit_log` VALUES("2115","2","Occupancy has been moved to the table \'<b>Table - 15</b>\'","table","2018-10-08 12:13:35");
INSERT INTO `audit_log` VALUES("2116","2","Occupancy has been moved to the table \'<b>Table - 22</b>\'","table","2018-10-08 12:13:48");
INSERT INTO `audit_log` VALUES("2117","2","Occupancy has been moved to the table \'<b>Table - 4</b>\'","table","2018-10-08 12:13:58");
INSERT INTO `audit_log` VALUES("2118","2","Occupancy has been moved to the table \'<b>Table - 1</b>\'","table","2018-10-08 12:14:06");
INSERT INTO `audit_log` VALUES("2119","2","Occupancy has been moved to the table \'<b>Table - 3</b>\'","table","2018-10-08 12:14:17");
INSERT INTO `audit_log` VALUES("2120","2","<b>Administrator</b> Logged onto the system","user","2018-10-10 10:51:50");
INSERT INTO `audit_log` VALUES("2121","2","<b>Administrator</b> Logged out of the system","user","2018-10-11 11:38:49");
INSERT INTO `audit_log` VALUES("2122","2","<b>Administrator</b> Logged onto the system","user","2018-10-11 11:38:56");
INSERT INTO `audit_log` VALUES("2123","2","<b>Administrator</b> Logged out of the system","user","2018-10-11 12:33:13");
INSERT INTO `audit_log` VALUES("2124","2","<b>Administrator</b> Logged onto the system","user","2018-10-11 12:33:21");
INSERT INTO `audit_log` VALUES("2125","2","<b>Administrator</b> Logged out of the system","user","2018-10-11 12:34:02");
INSERT INTO `audit_log` VALUES("2126","2","<b>Administrator</b> Logged onto the system","user","2018-10-11 12:34:08");
INSERT INTO `audit_log` VALUES("2127","2","<b>Administrator</b> Logged out of the system","user","2018-10-11 12:42:44");
INSERT INTO `audit_log` VALUES("2128","2","<b>Administrator</b> Logged onto the system","user","2018-10-11 12:42:50");
INSERT INTO `audit_log` VALUES("2129","2","<b>Administrator</b> Logged out of the system","user","2018-10-11 12:49:58");
INSERT INTO `audit_log` VALUES("2130","2","<b>Administrator</b> Logged onto the system","user","2018-10-11 12:50:09");
INSERT INTO `audit_log` VALUES("2131","2","<b>Administrator</b> Logged onto the system","user","2018-10-11 14:44:02");
INSERT INTO `audit_log` VALUES("2132","2","<b>Administrator</b> Logged onto the system","user","2018-10-12 12:13:51");
INSERT INTO `audit_log` VALUES("2133","2","<b>Administrator</b> Logged onto the system","user","2018-11-01 12:22:53");
INSERT INTO `audit_log` VALUES("2134","2","<b>Administrator</b> Logged onto the system","user","2018-11-02 11:33:00");
INSERT INTO `audit_log` VALUES("2135","2","<b>Administrator</b> Logged onto the system","user","2018-11-15 14:45:05");
INSERT INTO `audit_log` VALUES("2136","2","<b>Administrator</b> Logged onto the system","user","2018-11-16 08:41:23");
INSERT INTO `audit_log` VALUES("2137","2","<b>Administrator</b> Logged onto the system","user","2018-11-16 09:23:17");
INSERT INTO `audit_log` VALUES("2138","2","New table has been created named Table - 23","table","2018-11-16 09:23:48");
INSERT INTO `audit_log` VALUES("2139","2","Menu category order has been updated","menu","2018-11-16 09:25:51");
INSERT INTO `audit_log` VALUES("2140","2","Menu category order has been updated","menu","2018-11-16 09:26:01");
INSERT INTO `audit_log` VALUES("2141","2","10 stock item 1 has been purchased","stock","2018-11-16 09:32:11");
INSERT INTO `audit_log` VALUES("2142","2","Utensils item named -Plate has been added","misc","2018-11-16 09:33:43");
INSERT INTO `audit_log` VALUES("2143","2","Utensils item named -Spoon has been added","misc","2018-11-16 09:33:43");
INSERT INTO `audit_log` VALUES("2144","2","New table has been created named Table - 24","table","2018-11-16 09:35:35");
INSERT INTO `audit_log` VALUES("2145","2","New table has been created named Table - 25","table","2018-11-16 09:35:46");
INSERT INTO `audit_log` VALUES("2146","2","Table \'<b>Table - 11</b>\' has been occupied ","table","2018-11-16 09:36:22");
INSERT INTO `audit_log` VALUES("2147","2","Table order KOT number 181116-1 has been send","order","2018-11-16 09:37:24");
INSERT INTO `audit_log` VALUES("2148","2","New debtor named -person 1\' has been created","debtor","2018-11-16 09:43:02");
INSERT INTO `audit_log` VALUES("2149","2","5 - stock item 1 has been sold","stock","2018-11-16 09:44:22");
INSERT INTO `audit_log` VALUES("2150","2","Credit table order has been made for the amount of Rs. 891 on the debtor named -person 1","billing","2018-11-16 09:44:23");
INSERT INTO `audit_log` VALUES("2151","2","Table \'<b>Table - 11</b>\' has been closed ","table","2018-11-16 09:44:24");
INSERT INTO `audit_log` VALUES("2152","2","Booking has been made","table","2018-11-16 09:46:12");
INSERT INTO `audit_log` VALUES("2153","2","Booked table Table - 15 has been occupied ","table","2018-11-16 09:46:53");
INSERT INTO `audit_log` VALUES("2154","2","New obstacle has been created named -Obstacle - 6 on the floor no. 1","table","2018-11-16 09:55:04");
INSERT INTO `audit_log` VALUES("2155","2","Debtor named -sugen paid the amount of Rs. 10000","debtor","2018-11-16 09:56:30");
INSERT INTO `audit_log` VALUES("2156","2","Table order KOT number 181116-2 has been send","order","2018-11-16 09:57:20");
INSERT INTO `audit_log` VALUES("2157","2","Table \'<b>Table - 21</b>\' has been occupied ","table","2018-11-16 09:57:31");
INSERT INTO `audit_log` VALUES("2158","2","Table order KOT number 181116-3 has been send","order","2018-11-16 09:58:04");
INSERT INTO `audit_log` VALUES("2159","2","Setting has been updated from 10 to 0","setting","2018-11-16 10:04:01");
INSERT INTO `audit_log` VALUES("2160","2","<b>Administrator</b> Logged onto the system","user","2018-11-21 09:13:53");
INSERT INTO `audit_log` VALUES("2161","2","1 - stock item 1 has been sold","stock","2018-11-21 09:29:01");
INSERT INTO `audit_log` VALUES("2162","2","Credit table order has been made for the amount of Rs. 803 on the debtor named -sugen","billing","2018-11-21 09:29:06");
INSERT INTO `audit_log` VALUES("2163","2","Table \'<b>Table - 20</b>\' has been closed ","table","2018-11-21 09:29:07");
INSERT INTO `audit_log` VALUES("2164","2","Debtor named -sugen paid the amount of Rs. 1000","debtor","2018-11-21 09:31:32");
INSERT INTO `audit_log` VALUES("2165","2","Setting has been updated from 10 to 0","setting","2018-11-21 09:34:13");
INSERT INTO `audit_log` VALUES("2166","2","Setting has been updated from 10 to 10","setting","2018-11-21 09:34:21");
INSERT INTO `audit_log` VALUES("2167","2","<b>Administrator</b> Logged onto the system","user","2018-11-26 10:29:53");
INSERT INTO `audit_log` VALUES("2168","2","<b>Administrator</b> Logged onto the system","user","2018-11-26 13:49:28");
INSERT INTO `audit_log` VALUES("2169","2","User named - demo\' with username - demohas been created","user","2018-11-26 13:50:45");
INSERT INTO `audit_log` VALUES("2170","2","<b>Administrator</b> Logged onto the system","user","2018-11-28 11:46:36");
INSERT INTO `audit_log` VALUES("2171","2","<b>Administrator</b> Logged onto the system","user","2018-12-04 09:32:08");
INSERT INTO `audit_log` VALUES("2172","2","New table has been created named Table - 26","table","2018-12-04 09:34:23");
INSERT INTO `audit_log` VALUES("2173","2","New obstacle has been created named -Obstacle - 7 on the floor no. 1","table","2018-12-04 09:34:30");
INSERT INTO `audit_log` VALUES("2174","2","Menu category order has been updated","menu","2018-12-04 09:37:11");
INSERT INTO `audit_log` VALUES("2175","2","Menu category order has been updated","menu","2018-12-04 09:37:13");
INSERT INTO `audit_log` VALUES("2176","2","Utensils item named -Sdfhkl has been added","misc","2018-12-04 09:49:04");
INSERT INTO `audit_log` VALUES("2177","2","Utensils item named -Dsfghjhkl has been added","misc","2018-12-04 09:49:04");
INSERT INTO `audit_log` VALUES("2178","2","New table has been created named Table - 27","table","2018-12-04 09:51:44");
INSERT INTO `audit_log` VALUES("2179","2","New table has been created named Table - 28","table","2018-12-04 09:51:54");
INSERT INTO `audit_log` VALUES("2180","2","New table has been created named Table - 29","table","2018-12-04 09:51:57");
INSERT INTO `audit_log` VALUES("2181","2","New table has been created named Table - 30","table","2018-12-04 09:54:17");
INSERT INTO `audit_log` VALUES("2182","2","Setting has been updated from 10 to 0","setting","2018-12-04 09:56:42");
INSERT INTO `audit_log` VALUES("2183","2","Setting has been updated from 10 to 10","setting","2018-12-04 09:56:48");
INSERT INTO `audit_log` VALUES("2184","2","Booking has been made","table","2018-12-04 09:59:28");
INSERT INTO `audit_log` VALUES("2185","2","Table \'<b>Table - 29</b>\' has been occupied ","table","2018-12-04 10:02:34");
INSERT INTO `audit_log` VALUES("2186","2","Table order KOT number 181204-1 has been send","order","2018-12-04 10:03:23");
INSERT INTO `audit_log` VALUES("2187","2","Retail order KOT 181204-2 has been send","order","2018-12-04 10:18:46");
INSERT INTO `audit_log` VALUES("2188","2","Table \'<b>Table - 24</b>\' has been occupied ","table","2018-12-04 10:20:30");
INSERT INTO `audit_log` VALUES("2189","2","<b>Administrator</b> Logged onto the system","user","2018-12-04 15:06:18");
INSERT INTO `audit_log` VALUES("2190","2","<b>Administrator</b> Logged onto the system","user","2018-12-05 09:22:41");
INSERT INTO `audit_log` VALUES("2191","2","<b>Administrator</b> Logged onto the system","user","2018-12-07 10:25:17");
INSERT INTO `audit_log` VALUES("2192","2","<b>Administrator</b> Logged onto the system","user","2018-12-10 16:15:22");
INSERT INTO `audit_log` VALUES("2193","2","<b>Administrator</b> Logged onto the system","user","2018-12-11 09:58:59");
INSERT INTO `audit_log` VALUES("2194","2","Setting has been updated from gaurav@klientscape.com to test@gmail.com","setting","2018-12-11 09:59:33");
INSERT INTO `audit_log` VALUES("2195","2","1 - stock item 1 has been sold","stock","2018-12-11 10:16:59");
INSERT INTO `audit_log` VALUES("2196","2","Cash payment for table order has been made for the amount of Rs. 418","billing","2018-12-11 10:17:05");
INSERT INTO `audit_log` VALUES("2197","2","Table \'<b>Table - 6</b>\' has been closed ","table","2018-12-11 10:17:06");
INSERT INTO `audit_log` VALUES("2198","2","Table \'<b>Table - 6</b>\' has been occupied ","table","2018-12-11 10:17:15");
INSERT INTO `audit_log` VALUES("2199","2","Table order KOT number 181211-1 has been send","order","2018-12-11 10:17:22");
INSERT INTO `audit_log` VALUES("2200","2","1 - stock item 1 has been sold","stock","2018-12-11 10:17:56");
INSERT INTO `audit_log` VALUES("2201","2","Cash payment for table order has been made for the amount of Rs. 418","billing","2018-12-11 10:17:57");
INSERT INTO `audit_log` VALUES("2202","2","Table \'<b>Table - 6</b>\' has been closed ","table","2018-12-11 10:17:57");
INSERT INTO `audit_log` VALUES("2203","2","2 - stock item 1 has been sold","stock","2018-12-11 10:18:12");
INSERT INTO `audit_log` VALUES("2204","2","Cash payment for table order has been made for the amount of Rs. 699","billing","2018-12-11 10:18:13");
INSERT INTO `audit_log` VALUES("2205","2","Table \'<b>Table - 3</b>\' has been closed ","table","2018-12-11 10:18:14");
INSERT INTO `audit_log` VALUES("2206","2","Table \'<b>Table - 3</b>\' has been occupied ","table","2018-12-11 10:18:20");
INSERT INTO `audit_log` VALUES("2207","2","Table order KOT number 181211-2 has been send","order","2018-12-11 10:18:31");
INSERT INTO `audit_log` VALUES("2208","2","<b>Administrator</b> Logged onto the system","user","2019-02-12 08:58:37");
INSERT INTO `audit_log` VALUES("2209","2","<b>Administrator</b> Logged onto the system","user","2019-02-14 12:07:56");
INSERT INTO `audit_log` VALUES("2210","2","Database has been backuped by the user <b>Administrator</b>","database","2019-02-14 12:08:16");
INSERT INTO `audit_log` VALUES("2211","2","<b>Administrator</b> Logged out of the system","user","2019-02-14 12:08:19");
INSERT INTO `audit_log` VALUES("2212","2","<b>Administrator</b> Logged onto the system","user","2019-02-18 12:07:51");
INSERT INTO `audit_log` VALUES("2213","2","<b>Administrator</b> Logged onto the system","user","2019-02-19 11:16:49");
INSERT INTO `audit_log` VALUES("2214","2","<b>Administrator</b> Logged onto the system","user","2019-02-19 13:32:37");
INSERT INTO `audit_log` VALUES("2215","2","New table has been created named Table - 31","table","2019-02-19 13:33:15");
INSERT INTO `audit_log` VALUES("2216","2","Table \'<b>Table - 30</b>\' has been occupied ","table","2019-02-19 13:37:50");
INSERT INTO `audit_log` VALUES("2217","2","Table order KOT number 190219-1 has been send","order","2019-02-19 13:38:29");
INSERT INTO `audit_log` VALUES("2218","2","Table order KOT number 190219-2 has been send","order","2019-02-19 13:49:17");
INSERT INTO `audit_log` VALUES("2219","2","Item wise payment has been made for the amount of Rs. 198","billing","2019-02-19 14:06:02");
INSERT INTO `audit_log` VALUES("2220","2","Advance payment has been made for the amount of Rs. 20000","billing","2019-02-19 14:11:02");
INSERT INTO `audit_log` VALUES("2221","2","<b>Administrator</b> Logged onto the system","user","2019-02-20 09:47:22");
INSERT INTO `audit_log` VALUES("2222","2","<b>Administrator</b> Logged onto the system","user","2019-02-20 14:53:58");
INSERT INTO `audit_log` VALUES("2223","2","Delivery order KOT 190220-1 has been send","order","2019-02-20 15:26:22");
INSERT INTO `audit_log` VALUES("2224","2","<b>Administrator</b> Logged onto the system","user","2019-02-21 13:50:47");
INSERT INTO `audit_log` VALUES("2225","2","Table \'<b>Table - 31</b>\' has been occupied ","table","2019-02-21 13:54:52");
INSERT INTO `audit_log` VALUES("2226","2","Database has been backuped by the user <b>Administrator</b>","database","2019-02-21 14:36:17");



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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO `booked_tables` VALUES("3","test123","9845478569","3","7","2","2017-05-23","12:45:00","14:00:00","2017-05-23 12:45:00","0","2017-05-23 12:51:51","2","2017-05-23 12:51:51","2");
INSERT INTO `booked_tables` VALUES("4","sushov","9851058986","50","1","1","2017-07-17","13:00:00","13:00:00","2017-07-17 13:00:00","0","2017-07-17 15:02:46","2","2017-07-17 15:02:46","2");
INSERT INTO `booked_tables` VALUES("5","test","4545454","50","17","2","2017-07-17","13:00:00","13:00:00","2017-07-17 13:00:00","0","2017-07-17 15:06:09","2","2017-07-17 15:06:09","2");
INSERT INTO `booked_tables` VALUES("6","asdf","123456789","1","4","1","2017-12-12","12:00:00","13:00:00","2017-12-12 12:00:00","0","2017-12-12 12:21:14","2","2017-12-12 12:21:14","2");
INSERT INTO `booked_tables` VALUES("7","asdf","123456789","1","1","1","2017-12-12","12:00:00","13:00:00","2017-12-12 12:00:00","0","2017-12-12 12:21:33","2","2017-12-12 12:21:33","2");
INSERT INTO `booked_tables` VALUES("8","asdf","123121212","1","1","1","2017-12-12","14:00:00","15:00:00","2017-12-12 14:00:00","0","2017-12-12 12:23:29","2","2017-12-12 12:23:29","2");
INSERT INTO `booked_tables` VALUES("9","test","1234567","1","4","1","2017-12-18","12:00:00","14:00:00","2017-12-18 12:00:00","0","2017-12-18 11:56:37","2","2017-12-18 11:56:37","2");
INSERT INTO `booked_tables` VALUES("10","asdf","134123123","2","15","1","2018-11-17","13:00:00","14:00:00","2018-11-17 13:00:00","1","2018-11-16 09:46:12","2","2018-11-16 09:46:12","2");
INSERT INTO `booked_tables` VALUES("11","asdf","23142578","10","29","3","2018-12-05","13:00:00","14:00:00","2018-12-05 13:00:00","0","2018-12-04 09:59:28","2","2018-12-04 09:59:28","2");



DROP TABLE IF EXISTS break_down_items;

CREATE TABLE `break_down_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `break_down_receipt_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

INSERT INTO `break_down_items` VALUES("1","2","1","1","100","0");
INSERT INTO `break_down_items` VALUES("2","4","1","2","100","0");
INSERT INTO `break_down_items` VALUES("3","12","1","2","100","0");
INSERT INTO `break_down_items` VALUES("4","14","2","2","200","0");
INSERT INTO `break_down_items` VALUES("6","20","1","1","100","0");
INSERT INTO `break_down_items` VALUES("7","22","1","2","100","0");
INSERT INTO `break_down_items` VALUES("8","23","1","1","100","0");
INSERT INTO `break_down_items` VALUES("9","25","1","2","100","0");
INSERT INTO `break_down_items` VALUES("10","27","2","1","200","0");
INSERT INTO `break_down_items` VALUES("11","29","1","1","100","0");
INSERT INTO `break_down_items` VALUES("12","31","1","2","100","0");
INSERT INTO `break_down_items` VALUES("14","37","1","1","100","0");
INSERT INTO `break_down_items` VALUES("15","41","1","1","100","0");
INSERT INTO `break_down_items` VALUES("16","48","1","1","100","0");
INSERT INTO `break_down_items` VALUES("17","54","1","1","100","0");
INSERT INTO `break_down_items` VALUES("18","56","1","1","100","0");
INSERT INTO `break_down_items` VALUES("19","60","1","1","100","0");
INSERT INTO `break_down_items` VALUES("20","63","1","1","100","0");
INSERT INTO `break_down_items` VALUES("21","66","1","1","100","0");
INSERT INTO `break_down_items` VALUES("22","69","1","1","100","0");
INSERT INTO `break_down_items` VALUES("23","71","1","1","100","0");
INSERT INTO `break_down_items` VALUES("24","73","1","1","100","0");
INSERT INTO `break_down_items` VALUES("25","75","1","2","100","0");
INSERT INTO `break_down_items` VALUES("26","76","1","1","100","0");
INSERT INTO `break_down_items` VALUES("27","84","1","1","100","0");
INSERT INTO `break_down_items` VALUES("28","85","1","1","100","0");
INSERT INTO `break_down_items` VALUES("29","95","1","1","100","0");
INSERT INTO `break_down_items` VALUES("30","95","11","1","100","0");
INSERT INTO `break_down_items` VALUES("31","99","1","1","100","0");
INSERT INTO `break_down_items` VALUES("32","102","1","2","100","0");
INSERT INTO `break_down_items` VALUES("33","102","31","2","300","0");
INSERT INTO `break_down_items` VALUES("34","102","27","1","200","0");
INSERT INTO `break_down_items` VALUES("35","102","12","1","200","0");
INSERT INTO `break_down_items` VALUES("36","102","28","2","50","0");
INSERT INTO `break_down_items` VALUES("37","148","31","1","300","0");
INSERT INTO `break_down_items` VALUES("38","151","1","1","180","0");
INSERT INTO `break_down_items` VALUES("39","153","1","1","180","0");
INSERT INTO `break_down_items` VALUES("40","155","1","1","180","0");
INSERT INTO `break_down_items` VALUES("41","201","1","1","180","0");
INSERT INTO `break_down_items` VALUES("42","212","4","1","75","0");
INSERT INTO `break_down_items` VALUES("43","292","1","1","180","0");
INSERT INTO `break_down_items` VALUES("44","50","1","1","180","0");



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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

INSERT INTO `break_down_receipt` VALUES("1","1","1515564580","0","0","0","0","0","","455","0","0","10","45.5","0","0","0","501","0","501","0","0","0","0","","0","0","0","3","2018-01-10 11:54:41","2");
INSERT INTO `break_down_receipt` VALUES("2","2","1515647662","0","0","0","0","0","Asdasdf","455","0","0","10","45.5","0","0","0","501","0","501","0","0","0","0","","0","0","0","3","2018-01-11 10:59:22","2");
INSERT INTO `break_down_receipt` VALUES("3","3","1515647663","0","0","0","0","0","Asdasdf","100","0","0","0","0","0","0","0","100","0","100","0","0","0","0","","0","0","0","5","2018-01-11 10:59:23","2");
INSERT INTO `break_down_receipt` VALUES("4","4","1515647682","0","0","0","0","0","Sugen","455","0","0","10","45.5","0","0","0","501","0","0","0","0","0","0","","1","0","1","4","2018-01-11 10:59:43","2");
INSERT INTO `break_down_receipt` VALUES("5","5","1515647797","0","0","0","0","0","Sugen","455","0","0","10","45.5","0","0","0","501","0","0","0","0","0","0","","1","0","1","4","2018-01-11 11:01:37","2");
INSERT INTO `break_down_receipt` VALUES("6","6","1515647798","0","0","0","0","0","Asdadsf","0","0","0","0","0","0","0","0","100","0","100","0","0","0","0","","1","0","0","6","2018-01-11 11:01:38","2");
INSERT INTO `break_down_receipt` VALUES("7","7","1515648077","0","0","0","0","0","Adfasd","655","0","0","10","65.5","0","0","0","721","0","721","0","0","0","0","","0","0","0","3","2018-01-11 11:06:17","2");
INSERT INTO `break_down_receipt` VALUES("8","8","1515648078","0","0","0","0","0","Adfasd","100","0","0","0","0","0","0","0","100","0","100","0","0","0","0","","0","0","0","5","2018-01-11 11:06:18","2");
INSERT INTO `break_down_receipt` VALUES("9","9","1515648109","0","0","0","0","0","","380","0","0","10","38","0","0","0","418","0","418","0","0","0","0","","0","0","0","3","2018-01-11 11:06:49","2");
INSERT INTO `break_down_receipt` VALUES("10","10","1515648205","0","0","0","0","0","","380","0","0","10","38","0","0","0","418","0","418","0","0","0","0","","0","0","0","3","2018-01-11 11:08:25","2");
INSERT INTO `break_down_receipt` VALUES("11","11","1515648294","0","0","0","0","0","","380","0","0","10","38","0","0","0","418","0","418","0","0","0","0","","0","0","0","3","2018-01-11 11:09:54","2");
INSERT INTO `break_down_receipt` VALUES("12","12","1515648295","0","0","0","0","0","","275","0","0","10","27.5","0","0","0","303","0","303","0","0","0","0","","0","0","0","3","2018-01-11 11:09:55","2");
INSERT INTO `break_down_receipt` VALUES("13","13","1515648646","0","0","0","0","0","","380","0","0","10","38","0","0","0","418","0","418","0","0","0","0","","0","0","0","3","2018-01-11 11:15:46","2");
INSERT INTO `break_down_receipt` VALUES("14","14","1515648960","0","0","0","0","0","","380","0","0","10","38","0","0","0","418","0","418","0","0","0","0","","0","0","0","3","2018-01-11 11:21:00","2");
INSERT INTO `break_down_receipt` VALUES("15","15","1515648989","0","0","0","0","0","","380","0","0","10","38","0","0","0","418","0","418","0","0","0","0","","0","0","0","3","2018-01-11 11:21:29","2");
INSERT INTO `break_down_receipt` VALUES("16","16","1515648991","0","0","0","0","0","","275","0","0","10","27.5","0","0","0","303","0","303","0","0","0","0","","0","0","0","3","2018-01-11 11:21:30","2");
INSERT INTO `break_down_receipt` VALUES("17","17","1515667132","0","0","0","0","0","","455","0","0","10","45.5","0","0","0","501","0","501","0","0","0","0","","0","0","0","3","2018-01-11 16:23:53","2");
INSERT INTO `break_down_receipt` VALUES("18","18","1515992324","0","0","0","0","0","","455","0","0","10","45.5","0","0","0","501","0","501","0","0","0","0","","0","0","0","3","2018-01-15 10:43:44","2");
INSERT INTO `break_down_receipt` VALUES("19","19","1522212593","0","0","0","0","0","","64868300","0","0","10","6486830","0","0","0","71355100","0","71355100","0","0","0","0","","0","0","0","3","2018-03-28 10:34:53","2");
INSERT INTO `break_down_receipt` VALUES("20","20","1523437832","0","0","0","0","0","","1025","0","0","10","102.5","0","0","0","1128","0","1128","0","0","0","0","","0","0","0","3","2018-04-11 14:55:33","2");
INSERT INTO `break_down_receipt` VALUES("21","21","1523437928","0","0","0","0","0","","1310","0","0","10","131","0","0","0","1441","0","1441","0","0","0","0","","0","0","0","3","2018-04-11 14:57:08","2");
INSERT INTO `break_down_receipt` VALUES("22","22","1523438357","0","0","0","0","0","","1310","0","0","10","131","0","0","0","1441","0","1441","0","0","0","0","","0","0","0","3","2018-04-11 15:04:17","2");
INSERT INTO `break_down_receipt` VALUES("23","23","1523438717","0","0","0","0","0","","425","0","0","10","42.5","0","0","0","468","0","468","0","0","0","0","","0","0","0","3","2018-04-11 15:10:17","2");
INSERT INTO `break_down_receipt` VALUES("24","24","1523439315","0","0","0","0","0","","2620","0","0","10","262","0","0","0","2882","0","2882","0","0","0","0","","0","0","0","3","2018-04-11 15:20:15","2");
INSERT INTO `break_down_receipt` VALUES("25","25","1523439978","0","0","0","0","0","","1310","0","0","10","131","0","0","0","1441","0","1441","0","0","0","0","","0","0","0","3","2018-04-11 15:31:19","2");
INSERT INTO `break_down_receipt` VALUES("26","26","1523441989","0","0","0","0","0","","900","0","0","10","90","0","0","0","990","0","990","0","0","0","0","","0","0","0","3","2018-04-11 16:04:49","2");
INSERT INTO `break_down_receipt` VALUES("27","27","1523442523","0","0","0","0","0","","1055","0","0","10","105.5","0","0","0","1161","0","1161","0","0","0","0","","0","0","0","3","2018-04-11 16:13:43","2");
INSERT INTO `break_down_receipt` VALUES("28","28","1523513052","0","0","0","0","0","","3185","0","0","10","318.5","0","0","0","3504","0","3504","0","0","0","0","","0","0","0","3","2018-04-12 11:49:12","2");
INSERT INTO `break_down_receipt` VALUES("29","29","1523513859","0","0","0","0","0","","275","0","0","10","27.5","0","0","0","303","0","303","0","0","0","0","","0","0","0","3","2018-04-12 12:02:39","2");
INSERT INTO `break_down_receipt` VALUES("30","30","1523515134","0","0","0","0","0","","910","0","0","10","91","0","0","0","1001","0","1001","0","0","0","0","","0","0","0","3","2018-04-12 12:23:54","2");
INSERT INTO `break_down_receipt` VALUES("31","31","1523598408","0","0","0","0","0","","2095","0","0","10","209.5","0","0","0","2305","0","2305","0","0","0","0","","0","0","0","3","2018-04-13 11:31:48","2");
INSERT INTO `break_down_receipt` VALUES("32","32","1523598511","0","0","0","0","0","","730","0","0","10","73","0","0","0","803","0","803","0","0","0","0","","0","0","0","3","2018-04-13 11:33:32","2");
INSERT INTO `break_down_receipt` VALUES("33","33","1523616253","0","0","0","0","0","","1185","0","0","10","118.5","0","0","0","1304","0","1304","0","0","0","0","","0","0","0","3","2018-04-13 16:29:13","2");
INSERT INTO `break_down_receipt` VALUES("34","34","1523857173","0","0","0","0","0","","910","0","0","10","91","0","0","0","1001","0","1001","0","0","0","0","","0","0","0","3","2018-04-16 11:24:34","2");
INSERT INTO `break_down_receipt` VALUES("35","35","1523858350","0","0","0","0","0","","910","0","0","10","91","0","0","0","1001","0","1001","0","0","0","0","","0","0","0","3","2018-04-16 11:44:10","2");
INSERT INTO `break_down_receipt` VALUES("36","36","1523860088","0","0","0","0","0","","910","0","0","10","91","0","0","0","1001","0","1001","0","0","0","0","","0","0","0","3","2018-04-16 12:13:08","2");
INSERT INTO `break_down_receipt` VALUES("37","37","1523878364","0","0","0","0","0","","910","0","0","0","0","0","0","0","910","0","910","0","0","0","0","","0","0","0","3","2018-04-16 17:17:44","2");
INSERT INTO `break_down_receipt` VALUES("38","38","1524484078","0","0","0","0","0","","12440","0","0","10","1244","0","0","0","13684","0","13684","0","0","0","0","","0","0","0","3","2018-04-23 17:32:59","2");
INSERT INTO `break_down_receipt` VALUES("39","39","1524721595","0","0","0","0","0","","1585","0","0","10","158.5","0","0","0","1744","0","1744","0","0","0","0","","0","0","0","3","2018-04-26 11:31:35","2");
INSERT INTO `break_down_receipt` VALUES("40","40","1526382400","0","0","0","0","0","","180","0","0","10","18","0","0","0","198","0","198","0","0","0","0","","0","0","0","3","2018-05-15 16:51:40","2");
INSERT INTO `break_down_receipt` VALUES("41","41","1528101530","0","0","0","0","0","Sugen","655","0","0","10","65.5","0","0","0","721","0","721","0","0","0","0","","0","0","0","3","2018-06-04 14:23:51","2");
INSERT INTO `break_down_receipt` VALUES("42","42","1535693038","0","0","0","0","0","","455","0","0","10","45.5","0","0","0","501","0","501","0","0","0","0","","0","0","0","3","2018-08-31 11:08:59","2");
INSERT INTO `break_down_receipt` VALUES("43","43","1542340762","0","0","0","0","0","Person 1","900","10","90","10","81","0","0","0","891","0","0","0","0","0","0","","1","0","5","4","2018-11-16 09:44:22","2");
INSERT INTO `break_down_receipt` VALUES("44","44","0","0","0","0","0","0","","0","0","0","0","0","0","0","0","10000","0","0","0","0","1","0","","0","0","1","0","2018-11-16 09:56:30","2");
INSERT INTO `break_down_receipt` VALUES("45","45","1542771841","0","0","0","0","0","Sugen","730","0","0","10","73","0","0","0","803","0","0","0","0","0","0","","1","0","1","4","2018-11-21 09:29:01","2");
INSERT INTO `break_down_receipt` VALUES("46","46","0","0","0","0","0","0","","0","0","0","0","0","0","0","0","1000","0","0","0","0","1","0","","0","0","1","0","2018-11-21 09:31:32","2");
INSERT INTO `break_down_receipt` VALUES("47","47","1544502718","0","0","0","0","0","","380","0","0","10","38","0","0","0","418","0","418","0","0","0","0","","0","0","0","3","2018-12-11 10:16:59","2");
INSERT INTO `break_down_receipt` VALUES("48","48","1544502776","0","0","0","0","0","","380","0","0","10","38","0","0","0","418","0","418","0","0","0","0","","0","0","0","3","2018-12-11 10:17:56","2");
INSERT INTO `break_down_receipt` VALUES("49","49","1544502792","0","0","0","0","0","","635","0","0","10","63.5","0","0","0","699","0","699","0","0","0","0","","0","0","0","3","2018-12-11 10:18:12","2");
INSERT INTO `break_down_receipt` VALUES("50","50","0","45","0","0","0","0","","180","0","0","10","18","0","0","0","198","0","0","0","0","0","0","","0","0","0","2","2019-02-19 14:06:02","2");
INSERT INTO `break_down_receipt` VALUES("51","51","0","45","0","0","0","0","","0","0","0","0","0","0","0","0","20000","0","500","32","0","0","0","","0","0","0","1","2019-02-19 14:11:02","2");



DROP TABLE IF EXISTS capacity;

CREATE TABLE `capacity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `capacity` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `capacity` VALUES("1","50","2017-04-13 10:34:43","2");
INSERT INTO `capacity` VALUES("2","100","2018-12-05 10:09:30","2");



DROP TABLE IF EXISTS close_day_log;

CREATE TABLE `close_day_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `close_day_log` VALUES("1","2017-06-08 16:49:23","2");
INSERT INTO `close_day_log` VALUES("2","2017-06-08 16:49:30","2");
INSERT INTO `close_day_log` VALUES("3","2017-06-08 16:49:37","2");
INSERT INTO `close_day_log` VALUES("4","2017-06-13 12:41:18","2");
INSERT INTO `close_day_log` VALUES("5","2017-06-13 12:43:46","2");
INSERT INTO `close_day_log` VALUES("6","2017-12-25 12:58:49","2");
INSERT INTO `close_day_log` VALUES("7","2018-01-09 16:41:03","2");



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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `debtors` VALUES("1","sugen","11991199","9819119911","lazimpat","31613","12200","600","11376","2017-07-17 17:27:09","2017-04-13 12:09:11","1");
INSERT INTO `debtors` VALUES("2","binit","0","0980001100","thapathali","0","0","0","2373","0000-00-00 00:00:00","2017-05-16 15:35:53","1");
INSERT INTO `debtors` VALUES("3","abhijeet","0","983746583","bishalnagar","-498","0","0","249","0000-00-00 00:00:00","2017-05-23 12:07:57","1");
INSERT INTO `debtors` VALUES("4","Sushov","999999999","9851058986","ratopul","0","0","0","2000","2017-08-03 13:07:01","2017-07-17 17:24:40","1");
INSERT INTO `debtors` VALUES("5","person 1","234234234","23423434","dfasdf","891","0","0","0","0000-00-00 00:00:00","2018-11-16 09:43:02","1");



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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `delivery` VALUES("1","asdasdf","123123123","asdfasdfasdf","1123123","2018-01-11 10:58:35","2","1","0");
INSERT INTO `delivery` VALUES("2","asdadsf","123123123","asdfasdf","1231231","2018-01-11 10:59:30","2","1","0");
INSERT INTO `delivery` VALUES("3","adfasd","234234234","234sdfsdfg","234234234","2018-01-11 11:05:54","2","1","0");
INSERT INTO `delivery` VALUES("4","test","0","test","123456789","2018-04-24 12:15:40","2","0","0");
INSERT INTO `delivery` VALUES("5","asdfasdf","0","lazimpat","9898989898","2019-02-20 15:26:17","2","0","0");



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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `duplicate_bill` VALUES("1","1515564580","1","2","2018-01-10 12:19:27");



DROP TABLE IF EXISTS fiscal_year;

CREATE TABLE `fiscal_year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `fiscal_year` VALUES("1","2016-12-19","2017-12-18","1");
INSERT INTO `fiscal_year` VALUES("7","2017-12-19","2018-12-18","1");
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `floor` VALUES("1","first floor","1","1","2017-04-13 10:38:35","2");
INSERT INTO `floor` VALUES("2","second floor","2","1","2017-05-10 13:04:12","2");
INSERT INTO `floor` VALUES("3","third section","3","1","2017-05-10 13:04:39","2");
INSERT INTO `floor` VALUES("4","fourth floor","4","1","2017-05-10 13:09:36","2");
INSERT INTO `floor` VALUES("5","bar section","5","1","2017-07-31 11:14:52","2");
INSERT INTO `floor` VALUES("6","test","6","1","2017-12-25 12:35:39","2");



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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `foc` VALUES("1","1","FOC Customer","0","","0","1","1","2017-04-13 13:36:49","2");
INSERT INTO `foc` VALUES("2","2","FOC Customer","0","","0","1","1","2017-04-13 13:44:39","2");
INSERT INTO `foc` VALUES("3","3","FOC Customer","0","","2","1","1","2017-04-18 11:33:30","2");
INSERT INTO `foc` VALUES("4","4","FOC Customer","0","","0","4","1","2017-07-18 17:00:23","2");



DROP TABLE IF EXISTS foc_items;

CREATE TABLE `foc_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foc_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

INSERT INTO `foc_items` VALUES("1","1","1","2","100","0");
INSERT INTO `foc_items` VALUES("2","1","11","2","100","0");
INSERT INTO `foc_items` VALUES("3","1","26","2","100","0");
INSERT INTO `foc_items` VALUES("4","2","1","2","100","0");
INSERT INTO `foc_items` VALUES("5","2","1","3","200","1");
INSERT INTO `foc_items` VALUES("6","2","2","3","200","1");
INSERT INTO `foc_items` VALUES("7","2","11","2","100","0");
INSERT INTO `foc_items` VALUES("8","3","1","2","100","0");
INSERT INTO `foc_items` VALUES("9","3","1","5","200","1");
INSERT INTO `foc_items` VALUES("10","3","2","5","200","1");
INSERT INTO `foc_items` VALUES("11","3","11","4","100","0");
INSERT INTO `foc_items` VALUES("12","3","12","2","200","0");
INSERT INTO `foc_items` VALUES("13","3","4","2","75","0");
INSERT INTO `foc_items` VALUES("14","3","13","1","50","0");
INSERT INTO `foc_items` VALUES("15","3","28","1","50","0");
INSERT INTO `foc_items` VALUES("16","4","1","2","180","0");
INSERT INTO `foc_items` VALUES("17","4","1","1","200","1");
INSERT INTO `foc_items` VALUES("18","4","4","1","75","0");



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
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=latin1;

INSERT INTO `kot` VALUES("1","180110-1","4","1","0","0","0","0","0","1515564580","0","2018-01-10 11:54:25","2","1","1","0","","");
INSERT INTO `kot` VALUES("2","180111-1","0","0","0","0","1","0","0","0","0","2018-01-11 10:58:19","2","0","1","0","","");
INSERT INTO `kot` VALUES("3","180111-2","0","0","0","0","0","0","0","1515647662","0","2018-01-11 10:59:17","2","1","1","0","","");
INSERT INTO `kot` VALUES("4","180111-3","0","0","0","0","0","0","0","1515647682","0","2018-01-11 10:59:35","2","1","1","0","","");
INSERT INTO `kot` VALUES("5","180111-4","0","0","0","0","0","0","0","1515647797","0","2018-01-11 11:01:29","2","1","1","0","","");
INSERT INTO `kot` VALUES("6","180111-5","0","0","0","0","0","0","0","1515648077","0","2018-01-11 11:06:01","2","1","1","0","","");
INSERT INTO `kot` VALUES("7","180111-6","4","1","0","0","0","0","0","1515648295","0","2018-01-11 11:06:34","2","1","1","0","","");
INSERT INTO `kot` VALUES("8","180111-7","20","1","0","0","0","0","0","1515648991","0","2018-01-11 11:15:35","2","1","1","0","","");
INSERT INTO `kot` VALUES("9","180111-8","20","1","0","0","0","0","0","1515667132","0","2018-01-11 16:23:47","2","1","1","0","","");
INSERT INTO `kot` VALUES("10","180115-1","20","1","0","0","0","0","0","1515992324","0","2018-01-15 10:43:31","2","1","1","0","","");
INSERT INTO `kot` VALUES("11","180322-1","1","1","0","0","0","0","0","1522212593","0","2018-03-22 14:18:40","2","1","1","0","","");
INSERT INTO `kot` VALUES("12","180322-2","1","1","0","0","0","0","0","1522212593","0","2018-03-22 14:30:27","2","1","1","0","","");
INSERT INTO `kot` VALUES("13","180322-3","1","1","0","0","0","0","0","1522212593","0","2018-03-22 14:31:52","2","1","1","0","","");
INSERT INTO `kot` VALUES("14","180322-4","1","1","0","0","0","0","0","1522212593","0","2018-03-22 14:32:10","2","1","1","0","","");
INSERT INTO `kot` VALUES("15","180322-5","1","1","0","0","0","0","0","1522212593","0","2018-03-22 14:32:58","2","1","1","0","","");
INSERT INTO `kot` VALUES("16","180322-6","1","1","0","0","0","0","0","1522212593","0","2018-03-22 14:33:51","2","1","1","0","","");
INSERT INTO `kot` VALUES("17","180322-7","1","1","0","0","0","0","0","1522212593","0","2018-03-22 14:34:07","2","1","1","0","","");
INSERT INTO `kot` VALUES("18","180322-8","1","1","0","0","0","0","0","1522212593","0","2018-03-22 14:38:18","2","1","1","0","","");
INSERT INTO `kot` VALUES("19","180322-9","1","1","0","0","0","0","0","1522212593","0","2018-03-22 14:38:54","2","1","1","0","","");
INSERT INTO `kot` VALUES("20","180322-10","1","1","0","0","0","0","0","1522212593","0","2018-03-22 14:56:07","2","1","1","0","","");
INSERT INTO `kot` VALUES("21","180322-11","1","1","0","0","0","0","0","1522212593","0","2018-03-22 14:58:01","2","1","1","0","","");
INSERT INTO `kot` VALUES("22","180322-12","1","1","0","0","0","0","0","1522212593","0","2018-03-22 14:58:53","2","1","1","0","","");
INSERT INTO `kot` VALUES("23","180322-13","1","1","0","0","0","0","0","1522212593","0","2018-03-22 14:59:12","2","1","1","0","","");
INSERT INTO `kot` VALUES("24","180411-1","2","1","0","0","0","0","0","1523437832","0","2018-04-11 14:29:28","2","1","1","0","","");
INSERT INTO `kot` VALUES("25","","2","1","0","0","0","0","0","1523437832","0","2018-04-11 14:29:49","2","1","1","24","180411-1","");
INSERT INTO `kot` VALUES("26","180411-2","2","1","0","0","0","0","0","1523437832","0","2018-04-11 14:32:44","2","1","1","0","","");
INSERT INTO `kot` VALUES("27","","2","1","0","0","0","0","0","1523437832","0","2018-04-11 14:32:53","2","1","1","26","180411-2","");
INSERT INTO `kot` VALUES("28","180411-3","2","1","0","0","0","0","0","1523437928","0","2018-04-11 14:56:35","2","1","1","0","","");
INSERT INTO `kot` VALUES("29","","2","1","0","0","0","0","0","1523437928","0","2018-04-11 14:56:44","2","2","1","28","180411-3","test");
INSERT INTO `kot` VALUES("30","180411-4","2","1","0","0","0","0","0","1523438357","0","2018-04-11 15:03:49","2","1","1","0","","");
INSERT INTO `kot` VALUES("36","180411-6","2","1","0","0","0","0","0","1523439315","0","2018-04-11 15:19:11","2","1","1","0","","");
INSERT INTO `kot` VALUES("37","180411-7","2","1","0","0","0","0","0","1523439978","0","2018-04-11 15:21:29","2","1","1","0","","");
INSERT INTO `kot` VALUES("38","","2","1","0","0","0","0","0","1523439978","0","2018-04-11 15:30:53","2","1","1","37","180411-7","test");
INSERT INTO `kot` VALUES("39","","2","1","0","0","0","0","0","1523439978","0","2018-04-11 15:31:01","2","1","1","37","180411-7","test");
INSERT INTO `kot` VALUES("40","","2","1","0","0","0","0","0","1523439978","0","2018-04-11 15:31:10","2","1","1","37","180411-7","test");
INSERT INTO `kot` VALUES("41","180411-8","2","1","0","0","0","0","0","1523441989","0","2018-04-11 15:36:19","2","1","1","0","","");
INSERT INTO `kot` VALUES("42","","2","1","0","0","0","0","0","1523441989","0","2018-04-11 15:36:27","2","1","1","41","180411-8","test");
INSERT INTO `kot` VALUES("43","180411-9","2","1","0","0","0","0","0","1523442523","0","2018-04-11 16:13:12","2","1","1","0","","");
INSERT INTO `kot` VALUES("44","","2","1","0","0","0","0","0","1523442523","0","2018-04-11 16:13:22","2","2","1","43","180411-9","test");
INSERT INTO `kot` VALUES("45","","2","1","0","0","0","0","0","1523442523","0","2018-04-11 16:13:31","2","2","1","43","180411-9","test");
INSERT INTO `kot` VALUES("46","180412-1","2","1","0","0","0","0","0","1523513052","0","2018-04-12 11:27:55","2","1","1","0","","");
INSERT INTO `kot` VALUES("48","180412-3","2","1","0","0","0","0","0","1523513052","0","2018-04-12 11:45:03","2","1","1","0","","");
INSERT INTO `kot` VALUES("49","","2","1","0","0","0","0","0","1523513052","0","2018-04-12 11:45:53","2","2","1","48","180412-3","");
INSERT INTO `kot` VALUES("50","180412-4","2","1","0","0","0","0","0","1523513859","0","2018-04-12 12:02:19","2","1","1","0","","");
INSERT INTO `kot` VALUES("51","","2","1","0","0","0","0","0","1523513859","0","2018-04-12 12:02:30","2","2","1","50","180412-4","test");
INSERT INTO `kot` VALUES("52","180412-5","2","1","0","0","0","0","0","1523515134","0","2018-04-12 12:18:57","2","1","1","0","","");
INSERT INTO `kot` VALUES("53","","2","1","0","0","0","0","0","1523515134","0","2018-04-12 12:19:06","2","2","1","52","180412-5","test1");
INSERT INTO `kot` VALUES("54","","2","1","0","0","0","0","0","1523515134","0","2018-04-12 12:19:25","2","2","1","52","180412-5","test");
INSERT INTO `kot` VALUES("55","180412-6","2","1","0","0","0","0","0","1523598408","0","2018-04-12 12:27:13","2","1","1","0","","");
INSERT INTO `kot` VALUES("56","180413-1","2","1","0","0","0","0","0","1523598408","0","2018-04-13 11:31:15","2","1","1","0","","");
INSERT INTO `kot` VALUES("57","","2","1","0","0","0","0","0","1523598408","0","2018-04-13 11:31:31","2","2","1","56","180413-1","test1");
INSERT INTO `kot` VALUES("58","","2","1","0","0","0","0","0","1523598408","0","2018-04-13 11:31:41","2","2","1","56","180413-1","test2");
INSERT INTO `kot` VALUES("59","180413-2","2","1","0","0","0","0","0","1523598511","0","2018-04-13 11:32:32","2","1","1","0","","");
INSERT INTO `kot` VALUES("60","180413-3","2","1","0","0","0","0","0","1523598511","0","2018-04-13 11:32:41","2","1","1","0","","");
INSERT INTO `kot` VALUES("61","","2","1","0","0","0","0","0","1523598511","0","2018-04-13 11:32:53","2","2","1","59","180413-2","test1");
INSERT INTO `kot` VALUES("62","","2","1","0","0","0","0","0","1523598511","0","2018-04-13 11:33:05","2","2","1","59","180413-2","test2");
INSERT INTO `kot` VALUES("63","","2","1","0","0","0","0","0","1523598511","0","2018-04-13 11:33:15","2","2","1","60","180413-3","test3");
INSERT INTO `kot` VALUES("64","","2","1","0","0","0","0","0","1523598511","0","2018-04-13 11:33:25","2","2","1","60","180413-3","test4");
INSERT INTO `kot` VALUES("65","180413-4","2","1","0","0","0","0","0","1523616253","0","2018-04-13 16:28:08","2","1","1","0","","");
INSERT INTO `kot` VALUES("66","180413-5","2","1","0","0","0","0","0","1523616253","0","2018-04-13 16:28:24","2","1","1","0","","");
INSERT INTO `kot` VALUES("67","","2","1","0","0","0","0","0","1523616253","0","2018-04-13 16:28:38","2","2","1","65","180413-4","test1");
INSERT INTO `kot` VALUES("68","","2","1","0","0","0","0","0","1523616253","0","2018-04-13 16:28:50","2","2","1","65","180413-4","test2");
INSERT INTO `kot` VALUES("69","","2","1","0","0","0","0","0","1523616253","0","2018-04-13 16:28:58","2","2","1","66","180413-5","test3");
INSERT INTO `kot` VALUES("70","","2","1","0","0","0","0","0","1523616253","0","2018-04-13 16:29:07","2","2","1","66","180413-5","test4");
INSERT INTO `kot` VALUES("71","180416-1","2","1","0","0","0","0","0","1523857173","0","2018-04-16 11:23:35","2","1","1","0","","");
INSERT INTO `kot` VALUES("72","180416-2","2","1","0","0","0","0","0","1523857173","0","2018-04-16 11:23:43","2","1","1","0","","");
INSERT INTO `kot` VALUES("73","180416-3","2","1","0","0","0","0","0","1523857173","0","2018-04-16 11:23:49","2","1","1","0","","");
INSERT INTO `kot` VALUES("74","","2","1","0","0","0","0","0","1523857173","0","2018-04-16 11:24:05","2","2","1","71","180416-1","testing");
INSERT INTO `kot` VALUES("75","","2","1","0","0","0","0","0","1523857173","0","2018-04-16 11:24:06","2","2","1","72","180416-2","testing");
INSERT INTO `kot` VALUES("76","","2","1","0","0","0","0","0","1523857173","0","2018-04-16 11:24:06","2","2","1","73","180416-3","testing");
INSERT INTO `kot` VALUES("77","","2","1","0","0","0","0","0","1523857173","0","2018-04-16 11:24:24","2","2","1","71","180416-1","testing2");
INSERT INTO `kot` VALUES("78","","2","1","0","0","0","0","0","1523857173","0","2018-04-16 11:24:24","2","2","1","72","180416-2","testing2");
INSERT INTO `kot` VALUES("79","","2","1","0","0","0","0","0","1523857173","0","2018-04-16 11:24:25","2","2","1","73","180416-3","testing2");
INSERT INTO `kot` VALUES("80","180416-4","2","1","0","0","0","0","0","1523858350","0","2018-04-16 11:43:34","2","1","1","0","","");
INSERT INTO `kot` VALUES("81","180416-5","2","1","0","0","0","0","0","1523858350","0","2018-04-16 11:43:42","2","1","1","0","","");
INSERT INTO `kot` VALUES("82","","2","1","0","0","0","0","0","1523858350","0","2018-04-16 11:43:59","2","2","1","80","180416-4","test1");
INSERT INTO `kot` VALUES("83","","2","1","0","0","0","0","0","1523858350","0","2018-04-16 11:43:59","2","2","1","81","180416-5","test1");
INSERT INTO `kot` VALUES("84","180416-6","2","1","0","0","0","0","0","1523860088","0","2018-04-16 11:44:52","2","1","1","0","","");
INSERT INTO `kot` VALUES("85","180416-7","2","1","0","0","0","0","0","1523860088","0","2018-04-16 11:44:57","2","1","1","0","","");
INSERT INTO `kot` VALUES("86","","2","1","0","0","0","0","0","1523860088","0","2018-04-16 12:13:01","2","2","1","84","180416-6","test1asdf asdf asdfa sdf asdf asdf asdf asdf asdf asdf asd fasdf asdf asdfasdf asdf asd fasdf ads fasd fasd fasdfasd fasdf ");
INSERT INTO `kot` VALUES("87","","2","1","0","0","0","0","0","1523860088","0","2018-04-16 12:13:02","2","2","1","85","180416-7","test1asdf asdf asdfa sdf asdf asdf asdf asdf asdf asdf asd fasdf asdf asdfasdf asdf asd fasdf ads fasd fasd fasdfasd fasdf ");
INSERT INTO `kot` VALUES("88","180416-8","0","0","0","0","0","0","0","1523878364","0","2018-04-16 17:17:40","2","1","1","0","","");
INSERT INTO `kot` VALUES("89","180417-1","2","1","0","0","0","0","0","1524484078","0","2018-04-17 10:29:51","2","1","1","0","","");
INSERT INTO `kot` VALUES("90","180417-2","2","1","0","0","0","0","0","1524484078","0","2018-04-17 10:30:04","2","1","1","0","","");
INSERT INTO `kot` VALUES("91","180417-3","2","1","0","0","0","0","0","1524484078","0","2018-04-17 10:38:55","2","1","1","0","","");
INSERT INTO `kot` VALUES("92","180417-4","2","1","0","0","0","0","0","1524484078","0","2018-04-17 10:41:43","2","1","1","0","","");
INSERT INTO `kot` VALUES("93","180417-5","2","1","0","0","0","0","0","1524484078","0","2018-04-17 10:42:36","2","1","1","0","","");
INSERT INTO `kot` VALUES("94","180417-6","2","1","0","0","0","0","0","1524484078","0","2018-04-17 10:48:54","2","1","1","0","","");
INSERT INTO `kot` VALUES("95","180417-7","2","1","0","0","0","0","0","1524484078","0","2018-04-17 10:50:53","2","1","1","0","","");
INSERT INTO `kot` VALUES("96","180417-8","2","1","0","0","0","0","0","1524484078","0","2018-04-17 10:53:40","2","1","1","0","","");
INSERT INTO `kot` VALUES("97","180417-9","2","1","0","0","0","0","0","1524484078","0","2018-04-17 10:54:06","2","1","1","0","","");
INSERT INTO `kot` VALUES("98","180417-10","2","1","0","0","0","0","0","1524484078","0","2018-04-17 10:56:36","2","1","1","0","","");
INSERT INTO `kot` VALUES("99","180417-11","2","1","0","0","0","0","0","1524484078","0","2018-04-17 11:01:44","2","1","1","0","","");
INSERT INTO `kot` VALUES("100","180417-12","2","1","0","0","0","0","0","1524484078","0","2018-04-17 11:02:05","2","1","1","0","","");
INSERT INTO `kot` VALUES("101","180417-13","2","1","0","0","0","0","0","1524484078","0","2018-04-17 11:07:44","2","1","1","0","","");
INSERT INTO `kot` VALUES("102","180417-14","2","1","0","0","0","0","0","1524484078","0","2018-04-17 11:08:28","2","1","1","0","","");
INSERT INTO `kot` VALUES("103","180417-15","2","1","0","0","0","0","0","1524484078","0","2018-04-17 11:09:47","2","1","1","0","","");
INSERT INTO `kot` VALUES("104","180417-16","2","1","0","0","0","0","0","1524484078","0","2018-04-17 11:11:51","2","1","1","0","","");
INSERT INTO `kot` VALUES("105","180417-17","2","1","0","0","0","0","0","1524484078","0","2018-04-17 11:13:10","2","1","1","0","","");
INSERT INTO `kot` VALUES("106","180417-18","2","1","0","0","0","0","0","1524484078","0","2018-04-17 11:14:51","2","1","1","0","","");
INSERT INTO `kot` VALUES("107","180417-19","2","1","0","0","0","0","0","1524484078","0","2018-04-17 11:16:42","2","1","1","0","","");
INSERT INTO `kot` VALUES("108","180417-20","2","1","0","0","0","0","0","1524484078","0","2018-04-17 11:26:15","2","1","1","0","","");
INSERT INTO `kot` VALUES("109","180417-21","2","1","0","0","0","0","0","1524484078","0","2018-04-17 11:28:27","2","1","1","0","","");
INSERT INTO `kot` VALUES("110","","2","1","0","0","0","0","0","1524484078","0","2018-04-18 10:45:18","2","2","1","89","180417-1","test");
INSERT INTO `kot` VALUES("111","180423-1","2","1","28","0","0","0","0","0","0","2018-04-23 17:33:40","2","0","1","0","","");
INSERT INTO `kot` VALUES("112","","2","1","28","0","0","0","0","0","0","2018-04-23 17:33:49","2","2","0","111","180423-1","test");
INSERT INTO `kot` VALUES("113","180424-1","20","1","29","0","0","0","0","0","0","2018-04-24 11:03:16","2","0","1","0","","");
INSERT INTO `kot` VALUES("114","","20","1","29","0","0","0","0","0","0","2018-04-24 11:03:44","2","2","0","113","180424-1","test");
INSERT INTO `kot` VALUES("115","","20","1","29","0","0","0","0","0","0","2018-04-24 11:04:13","2","2","0","113","180424-1","test1");
INSERT INTO `kot` VALUES("116","180424-2","0","0","0","0","2","0","0","0","0","2018-04-24 12:04:57","2","0","1","0","","");
INSERT INTO `kot` VALUES("117","","0","0","0","0","2","0","0","0","0","2018-04-24 12:05:27","2","2","0","116","180424-2","test");
INSERT INTO `kot` VALUES("118","180424-3","0","0","0","0","0","1","0","0","0","2018-04-24 12:14:46","2","0","1","0","","");
INSERT INTO `kot` VALUES("119","","0","0","0","0","0","1","0","0","0","2018-04-24 12:15:16","2","2","0","118","180424-3","test");
INSERT INTO `kot` VALUES("120","180424-4","0","0","0","0","0","0","4","0","0","2018-04-24 12:15:46","2","0","1","0","","");
INSERT INTO `kot` VALUES("121","","0","0","0","0","0","0","4","0","0","2018-04-24 12:16:02","2","2","0","120","180424-4","test");
INSERT INTO `kot` VALUES("122","180424-5","0","0","0","2","0","0","0","0","0","2018-04-24 12:17:15","2","0","1","0","","");
INSERT INTO `kot` VALUES("123","","0","0","0","2","0","0","0","0","0","2018-04-24 12:17:34","2","2","0","122","180424-5","test");
INSERT INTO `kot` VALUES("124","180424-6","15","1","0","0","0","0","0","1524721595","0","2018-04-24 12:48:16","2","1","1","0","","");
INSERT INTO `kot` VALUES("125","","15","1","0","0","0","0","0","1524721595","0","2018-04-24 12:51:51","2","2","1","124","180424-6","test");
INSERT INTO `kot` VALUES("126","180424-7","15","1","0","0","0","0","0","1524721595","0","2018-04-24 12:55:50","2","1","1","0","","");
INSERT INTO `kot` VALUES("127","180424-8","15","1","0","0","0","0","0","1524721595","0","2018-04-24 13:07:45","2","1","1","0","","");
INSERT INTO `kot` VALUES("128","180515-1","1","1","0","0","0","0","0","1526382400","0","2018-05-15 16:51:28","2","1","1","0","","");
INSERT INTO `kot` VALUES("129","180531-1","1","1","0","0","0","0","0","1544502792","0","2018-05-31 16:03:29","2","1","1","0","","");
INSERT INTO `kot` VALUES("130","180604-1","0","0","0","0","0","0","0","1528101530","0","2018-06-04 14:22:27","2","1","1","0","","");
INSERT INTO `kot` VALUES("131","180604-2","0","0","0","0","4","0","0","0","0","2018-06-04 14:24:19","2","0","1","0","","");
INSERT INTO `kot` VALUES("132","180613-1","0","0","0","0","5","0","0","0","0","2018-06-13 11:39:40","2","0","1","0","","");
INSERT INTO `kot` VALUES("133","180621-1","0","0","0","0","6","0","0","0","0","2018-06-21 14:42:37","2","0","1","0","","");
INSERT INTO `kot` VALUES("134","180704-1","1","1","0","0","0","0","0","1544502792","0","2018-07-04 10:19:44","2","1","1","0","","");
INSERT INTO `kot` VALUES("135","180719-1","1","1","0","0","0","0","0","1544502792","0","2018-07-19 15:13:51","2","1","1","0","","");
INSERT INTO `kot` VALUES("136","180831-1","20","1","33","0","0","0","0","0","0","2018-08-31 10:59:44","2","0","0","0","","");
INSERT INTO `kot` VALUES("137","180831-2","3","1","0","0","0","0","0","1535693038","0","2018-08-31 11:00:43","2","1","1","0","","");
INSERT INTO `kot` VALUES("138","180831-3","14","1","35","0","0","0","0","0","0","2018-08-31 11:09:12","2","0","1","0","","");
INSERT INTO `kot` VALUES("139","180831-4","0","0","0","0","2","0","0","0","0","2018-08-31 11:12:21","2","0","1","0","","");
INSERT INTO `kot` VALUES("140","180831-5","20","1","0","0","0","0","0","1544502718","0","2018-08-31 11:22:56","2","1","1","0","","");
INSERT INTO `kot` VALUES("141","180831-6","20","1","0","0","0","0","0","1542771841","0","2018-08-31 11:23:44","2","1","1","0","","");
INSERT INTO `kot` VALUES("142","180921-1","0","0","0","0","8","0","0","0","0","2018-09-21 16:50:29","2","0","1","0","","");
INSERT INTO `kot` VALUES("143","181116-1","11","2","0","0","0","0","0","1542340762","0","2018-11-16 09:37:24","2","1","1","0","","");
INSERT INTO `kot` VALUES("144","181116-2","20","1","0","0","0","0","0","1542771841","0","2018-11-16 09:57:20","2","1","1","0","","");
INSERT INTO `kot` VALUES("145","181116-3","21","1","40","0","0","0","0","0","0","2018-11-16 09:58:03","2","0","0","0","","");
INSERT INTO `kot` VALUES("146","","6","1","0","0","0","0","0","1544502718","0","2018-11-21 09:44:26","2","2","1","140","180831-5","");
INSERT INTO `kot` VALUES("147","181204-1","29","3","41","0","0","0","0","0","0","2018-12-04 10:03:23","2","0","1","0","","");
INSERT INTO `kot` VALUES("148","","29","3","41","0","0","0","0","0","0","2018-12-04 10:04:07","2","2","0","147","181204-1","eretrytu");
INSERT INTO `kot` VALUES("149","181204-2","0","0","0","3","0","0","0","0","0","2018-12-04 10:18:46","2","0","0","0","","");
INSERT INTO `kot` VALUES("150","181211-1","6","1","0","0","0","0","0","1544502776","0","2018-12-11 10:17:22","2","1","1","0","","");
INSERT INTO `kot` VALUES("151","181211-2","3","1","44","0","0","0","0","0","0","2018-12-11 10:18:31","2","0","0","0","","");
INSERT INTO `kot` VALUES("152","190219-1","30","1","45","0","0","0","0","0","0","2019-02-19 13:38:29","2","0","0","0","","");
INSERT INTO `kot` VALUES("153","190219-2","30","1","45","0","0","0","0","0","0","2019-02-19 13:49:17","2","0","0","0","","");
INSERT INTO `kot` VALUES("154","190220-1","0","0","0","0","0","0","5","0","0","2019-02-20 15:26:22","2","0","0","0","","");
INSERT INTO `kot` VALUES("155","","21","1","40","0","0","0","0","0","0","2019-02-21 14:03:17","2","2","0","145","181116-3","asdasfj.");



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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=560 DEFAULT CHARSET=latin1;

INSERT INTO `kot_items` VALUES("1","1","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("2","1","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("3","1","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("4","2","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("5","2","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("6","2","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("7","3","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("8","3","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("9","3","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("10","4","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("11","4","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("12","4","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("13","5","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("14","5","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("15","5","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("16","6","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("17","6","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("18","6","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("19","6","32","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("20","7","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("21","7","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("22","7","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("23","7","32","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("24","8","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("25","8","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("26","8","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("27","8","32","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("28","9","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("29","9","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("30","9","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("31","10","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("32","10","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("33","10","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("34","11","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("35","11","13","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("36","11","14","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("37","11","28","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("38","11","27","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("39","11","31","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("40","11","34","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("41","12","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("42","12","6","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("43","12","11","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("44","12","12","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("45","12","26","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("46","12","27","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("47","12","31","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("48","12","34","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("49","13","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("50","13","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("51","13","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("52","13","32","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("53","13","35","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("54","13","6","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("55","13","3","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("56","13","5","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("57","13","33","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("58","13","36","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("59","13","11","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("60","13","13","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("61","13","15","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("62","13","12","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("63","13","26","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("64","13","28","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("65","13","30","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("66","13","27","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("67","13","29","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("68","14","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("69","14","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("70","14","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("71","14","32","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("72","14","35","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("73","14","6","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("74","14","3","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("75","14","5","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("76","14","33","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("77","14","36","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("78","14","11","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("79","14","13","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("80","14","15","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("81","14","12","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("82","14","26","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("83","14","28","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("84","14","30","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("85","14","27","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("86","14","29","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("87","15","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("88","15","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("89","15","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("90","15","32","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("91","15","35","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("92","15","6","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("93","15","3","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("94","15","5","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("95","15","33","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("96","15","36","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("97","15","11","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("98","15","13","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("99","15","15","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("100","15","12","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("101","15","26","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("102","15","28","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("103","15","30","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("104","15","27","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("105","15","29","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("106","16","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("107","17","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("108","17","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("109","17","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("110","17","32","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("111","17","35","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("112","17","36","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("113","17","33","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("114","17","5","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("115","17","3","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("116","17","6","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("117","17","11","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("118","17","13","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("119","17","15","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("120","17","14","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("121","17","12","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("122","17","26","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("123","17","28","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("124","17","30","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("125","17","29","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("126","17","27","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("127","18","26","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("128","18","28","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("129","18","30","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("130","18","27","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("131","18","29","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("132","19","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("133","19","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("134","19","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("135","19","11","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("136","19","13","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("137","19","15","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("138","19","26","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("139","19","28","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("140","19","30","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("141","20","1","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("142","20","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("143","20","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("144","20","11","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("145","20","13","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("146","20","15","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("147","20","26","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("148","20","28","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("149","20","30","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("150","21","1","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("151","21","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("152","21","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("153","21","11","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("154","21","13","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("155","21","15","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("156","21","26","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("157","21","28","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("158","21","30","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("159","22","1","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("160","22","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("161","22","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("162","22","11","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("163","22","13","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("164","22","15","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("165","22","26","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("166","22","28","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("167","22","30","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("168","23","1","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("169","23","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("170","23","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("171","23","11","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("172","23","13","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("173","23","15","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("174","23","26","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("175","23","28","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("176","23","30","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("177","24","1","0","1","1","0","0");
INSERT INTO `kot_items` VALUES("178","24","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("179","24","5","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("180","25","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("181","26","32","0","4","2","0","0");
INSERT INTO `kot_items` VALUES("182","26","33","0","4","2","0","0");
INSERT INTO `kot_items` VALUES("183","27","32","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("184","27","33","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("185","28","1","0","4","2","0","0");
INSERT INTO `kot_items` VALUES("186","28","2","0","4","2","0","0");
INSERT INTO `kot_items` VALUES("187","28","4","0","4","2","0","0");
INSERT INTO `kot_items` VALUES("188","28","32","0","4","2","0","0");
INSERT INTO `kot_items` VALUES("189","29","1","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("190","29","2","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("191","29","4","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("192","29","32","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("193","30","1","0","4","2","0","0");
INSERT INTO `kot_items` VALUES("194","30","2","0","4","2","0","0");
INSERT INTO `kot_items` VALUES("195","30","4","0","4","2","0","0");
INSERT INTO `kot_items` VALUES("196","30","32","0","4","2","0","0");
INSERT INTO `kot_items` VALUES("213","37","1","0","4","2","0","0");
INSERT INTO `kot_items` VALUES("214","37","2","0","4","2","0","0");
INSERT INTO `kot_items` VALUES("215","37","4","0","4","2","0","0");
INSERT INTO `kot_items` VALUES("216","37","32","0","4","2","0","0");
INSERT INTO `kot_items` VALUES("217","38","1","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("218","39","2","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("219","39","4","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("220","40","32","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("221","41","11","0","4","2","0","0");
INSERT INTO `kot_items` VALUES("222","41","13","0","4","0","0","0");
INSERT INTO `kot_items` VALUES("223","41","15","0","4","0","0","0");
INSERT INTO `kot_items` VALUES("224","42","11","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("225","43","1","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("226","43","2","0","3","1","0","0");
INSERT INTO `kot_items` VALUES("227","43","4","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("228","43","32","0","3","1","0","0");
INSERT INTO `kot_items` VALUES("229","44","1","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("230","44","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("231","45","4","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("232","45","32","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("233","46","1","0","3","0","0","0");
INSERT INTO `kot_items` VALUES("234","46","2","0","3","0","0","0");
INSERT INTO `kot_items` VALUES("235","46","4","0","3","0","0","0");
INSERT INTO `kot_items` VALUES("236","48","1","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("237","48","2","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("238","48","4","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("239","49","1","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("240","49","2","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("241","49","4","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("242","50","11","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("243","50","13","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("244","50","15","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("245","51","11","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("246","51","13","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("247","51","15","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("248","52","1","0","4","2","0","0");
INSERT INTO `kot_items` VALUES("249","52","2","0","4","2","0","0");
INSERT INTO `kot_items` VALUES("250","52","4","0","4","2","0","0");
INSERT INTO `kot_items` VALUES("251","53","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("252","53","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("253","53","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("254","54","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("255","54","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("256","54","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("257","55","1","0","4","0","0","0");
INSERT INTO `kot_items` VALUES("258","55","2","0","4","0","0","0");
INSERT INTO `kot_items` VALUES("259","55","4","0","4","0","0","0");
INSERT INTO `kot_items` VALUES("260","56","11","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("261","56","13","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("262","56","15","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("263","57","11","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("264","57","13","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("265","57","15","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("266","58","11","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("267","58","13","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("268","58","15","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("269","59","1","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("270","59","2","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("271","59","4","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("272","60","11","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("273","60","13","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("274","60","15","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("275","61","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("276","61","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("277","61","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("278","62","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("279","62","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("280","62","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("281","63","11","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("282","63","13","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("283","63","15","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("284","64","11","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("285","64","13","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("286","64","15","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("287","65","1","0","4","2","0","0");
INSERT INTO `kot_items` VALUES("288","65","2","0","4","2","0","0");
INSERT INTO `kot_items` VALUES("289","65","4","0","4","2","0","0");
INSERT INTO `kot_items` VALUES("290","66","11","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("291","66","13","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("292","66","15","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("293","67","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("294","67","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("295","67","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("296","68","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("297","68","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("298","68","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("299","69","11","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("300","69","13","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("301","69","15","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("302","70","11","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("303","70","13","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("304","70","15","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("305","71","1","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("306","71","2","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("307","71","4","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("308","72","1","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("309","72","2","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("310","72","4","0","3","2","0","0");
INSERT INTO `kot_items` VALUES("311","73","11","0","2","2","0","0");
INSERT INTO `kot_items` VALUES("312","73","13","0","2","2","0","0");
INSERT INTO `kot_items` VALUES("313","73","15","0","2","2","0","0");
INSERT INTO `kot_items` VALUES("314","74","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("315","74","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("316","74","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("317","75","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("318","75","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("319","75","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("320","76","11","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("321","76","13","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("322","76","15","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("323","77","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("324","77","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("325","77","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("326","78","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("327","78","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("328","78","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("329","79","11","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("330","79","13","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("331","79","15","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("332","80","1","0","2","1","0","0");
INSERT INTO `kot_items` VALUES("333","80","2","0","2","1","0","0");
INSERT INTO `kot_items` VALUES("334","80","4","0","2","1","0","0");
INSERT INTO `kot_items` VALUES("335","81","1","0","2","1","0","0");
INSERT INTO `kot_items` VALUES("336","81","2","0","2","1","0","0");
INSERT INTO `kot_items` VALUES("337","81","4","0","2","1","0","0");
INSERT INTO `kot_items` VALUES("338","82","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("339","82","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("340","82","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("341","83","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("342","83","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("343","83","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("344","84","1","0","2","1","0","0");
INSERT INTO `kot_items` VALUES("345","84","2","0","2","1","0","0");
INSERT INTO `kot_items` VALUES("346","84","4","0","2","1","0","0");
INSERT INTO `kot_items` VALUES("347","85","1","0","2","1","0","0");
INSERT INTO `kot_items` VALUES("348","85","2","0","2","1","0","0");
INSERT INTO `kot_items` VALUES("349","85","4","0","2","1","0","0");
INSERT INTO `kot_items` VALUES("350","86","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("351","86","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("352","86","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("353","87","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("354","87","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("355","87","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("356","88","1","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("357","88","2","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("358","88","4","0","2","0","0","0");
INSERT INTO `kot_items` VALUES("359","89","1","0","1","1","0","0");
INSERT INTO `kot_items` VALUES("360","89","2","0","1","1","0","0");
INSERT INTO `kot_items` VALUES("361","89","4","0","1","1","0","0");
INSERT INTO `kot_items` VALUES("362","89","32","0","1","1","0","0");
INSERT INTO `kot_items` VALUES("363","89","35","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("364","89","6","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("365","89","3","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("366","89","5","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("367","89","33","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("368","90","1","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("369","91","1","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("370","92","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("371","92","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("372","92","6","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("373","93","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("374","93","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("375","93","7","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("376","94","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("377","94","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("378","94","7","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("379","95","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("380","95","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("381","95","7","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("382","96","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("383","96","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("384","96","7","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("385","97","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("386","97","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("387","97","7","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("388","98","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("389","98","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("390","98","7","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("391","99","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("392","99","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("393","99","7","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("394","100","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("395","100","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("396","100","7","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("397","100","1","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("398","100","2","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("399","101","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("400","101","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("401","101","7","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("402","101","1","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("403","101","2","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("404","102","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("405","102","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("406","102","7","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("407","102","1","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("408","102","2","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("409","103","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("410","103","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("411","103","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("412","103","1","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("413","103","5","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("414","103","6","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("415","104","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("416","105","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("417","105","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("418","105","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("419","105","7","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("420","105","6","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("421","105","5","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("422","106","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("423","106","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("424","106","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("425","106","7","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("426","107","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("427","107","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("428","107","6","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("429","108","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("430","108","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("431","108","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("432","108","7","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("433","109","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("434","109","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("435","109","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("436","109","5","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("437","109","6","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("438","109","7","0","1","0","1","0");
INSERT INTO `kot_items` VALUES("439","110","1","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("440","110","2","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("441","110","4","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("442","110","32","0","1","0","0","0");
INSERT INTO `kot_items` VALUES("443","111","1","180","1","1","0","0");
INSERT INTO `kot_items` VALUES("444","112","1","180","1","0","0","0");
INSERT INTO `kot_items` VALUES("445","113","1","180","1","1","0","0");
INSERT INTO `kot_items` VALUES("446","113","2","200","1","1","0","0");
INSERT INTO `kot_items` VALUES("447","113","4","75","1","1","0","0");
INSERT INTO `kot_items` VALUES("448","113","32","200","1","1","0","0");
INSERT INTO `kot_items` VALUES("449","114","1","180","1","0","0","0");
INSERT INTO `kot_items` VALUES("450","114","2","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("451","115","4","75","1","0","0","0");
INSERT INTO `kot_items` VALUES("452","115","32","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("453","116","1","180","1","1","0","0");
INSERT INTO `kot_items` VALUES("454","116","2","200","1","1","0","0");
INSERT INTO `kot_items` VALUES("455","116","4","75","1","1","0","0");
INSERT INTO `kot_items` VALUES("456","116","32","200","1","1","0","0");
INSERT INTO `kot_items` VALUES("457","117","1","180","1","0","0","0");
INSERT INTO `kot_items` VALUES("458","117","2","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("459","117","4","75","1","0","0","0");
INSERT INTO `kot_items` VALUES("460","117","32","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("461","118","1","180","1","1","0","0");
INSERT INTO `kot_items` VALUES("462","118","2","200","1","1","0","0");
INSERT INTO `kot_items` VALUES("463","118","4","75","1","1","0","0");
INSERT INTO `kot_items` VALUES("464","118","32","200","1","1","0","0");
INSERT INTO `kot_items` VALUES("465","119","1","180","1","0","0","0");
INSERT INTO `kot_items` VALUES("466","119","2","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("467","119","4","75","1","0","0","0");
INSERT INTO `kot_items` VALUES("468","119","32","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("469","120","1","180","1","1","0","0");
INSERT INTO `kot_items` VALUES("470","120","2","200","1","1","0","0");
INSERT INTO `kot_items` VALUES("471","120","4","75","1","1","0","0");
INSERT INTO `kot_items` VALUES("472","120","32","200","1","1","0","0");
INSERT INTO `kot_items` VALUES("473","121","1","180","1","0","0","0");
INSERT INTO `kot_items` VALUES("474","121","2","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("475","121","4","75","1","0","0","0");
INSERT INTO `kot_items` VALUES("476","121","32","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("477","122","1","180","1","1","0","0");
INSERT INTO `kot_items` VALUES("478","122","2","200","1","1","0","0");
INSERT INTO `kot_items` VALUES("479","122","4","75","1","1","0","0");
INSERT INTO `kot_items` VALUES("480","122","32","200","1","1","0","0");
INSERT INTO `kot_items` VALUES("481","123","1","180","1","0","0","0");
INSERT INTO `kot_items` VALUES("482","123","2","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("483","123","4","75","1","0","0","0");
INSERT INTO `kot_items` VALUES("484","123","32","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("485","124","1","180","1","1","0","0");
INSERT INTO `kot_items` VALUES("486","124","2","200","1","1","0","0");
INSERT INTO `kot_items` VALUES("487","124","4","75","1","0","0","0");
INSERT INTO `kot_items` VALUES("488","124","32","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("489","125","1","180","1","0","0","0");
INSERT INTO `kot_items` VALUES("490","125","2","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("491","126","1","180","1","0","0","0");
INSERT INTO `kot_items` VALUES("492","126","2","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("493","126","4","75","1","0","0","0");
INSERT INTO `kot_items` VALUES("494","126","32","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("495","127","1","180","1","0","0","0");
INSERT INTO `kot_items` VALUES("496","127","2","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("497","127","4","75","1","0","0","0");
INSERT INTO `kot_items` VALUES("498","127","32","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("499","128","1","180","1","0","0","0");
INSERT INTO `kot_items` VALUES("500","129","1","180","1","0","0","0");
INSERT INTO `kot_items` VALUES("501","130","1","180","1","0","0","0");
INSERT INTO `kot_items` VALUES("502","130","2","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("503","130","4","75","1","0","0","0");
INSERT INTO `kot_items` VALUES("504","130","32","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("505","131","1","180","1","0","0","0");
INSERT INTO `kot_items` VALUES("506","131","2","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("507","131","4","75","1","0","0","0");
INSERT INTO `kot_items` VALUES("508","131","32","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("509","132","1","180","1","0","0","0");
INSERT INTO `kot_items` VALUES("510","132","2","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("511","133","1","180","1","0","0","0");
INSERT INTO `kot_items` VALUES("512","134","1","180","1","0","0","0");
INSERT INTO `kot_items` VALUES("513","135","11","100","1","0","0","0");
INSERT INTO `kot_items` VALUES("514","135","13","50","1","0","0","0");
INSERT INTO `kot_items` VALUES("515","135","15","125","1","0","0","0");
INSERT INTO `kot_items` VALUES("516","136","1","180","1","0","0","1");
INSERT INTO `kot_items` VALUES("517","136","2","200","1","0","0","1");
INSERT INTO `kot_items` VALUES("518","136","4","75","1","0","0","1");
INSERT INTO `kot_items` VALUES("519","137","1","180","1","0","0","0");
INSERT INTO `kot_items` VALUES("520","137","2","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("521","137","4","75","1","0","0","0");
INSERT INTO `kot_items` VALUES("522","138","6","100","1","0","0","0");
INSERT INTO `kot_items` VALUES("523","138","3","50","1","0","0","0");
INSERT INTO `kot_items` VALUES("524","138","5","125","1","0","0","0");
INSERT INTO `kot_items` VALUES("525","138","33","150","1","0","0","0");
INSERT INTO `kot_items` VALUES("526","138","36","123","1","0","0","0");
INSERT INTO `kot_items` VALUES("527","139","1","180","1","0","0","0");
INSERT INTO `kot_items` VALUES("528","139","2","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("529","140","1","180","1","0","0","0");
INSERT INTO `kot_items` VALUES("530","140","2","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("531","140","4","75","1","1","0","0");
INSERT INTO `kot_items` VALUES("532","141","1","180","1","0","0","0");
INSERT INTO `kot_items` VALUES("533","141","2","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("534","141","4","75","1","0","0","0");
INSERT INTO `kot_items` VALUES("535","142","1","180","3","0","0","0");
INSERT INTO `kot_items` VALUES("536","143","1","180","5","0","0","0");
INSERT INTO `kot_items` VALUES("537","144","11","100","1","0","0","1");
INSERT INTO `kot_items` VALUES("538","144","13","50","1","0","0","1");
INSERT INTO `kot_items` VALUES("539","144","15","125","1","0","0","1");
INSERT INTO `kot_items` VALUES("540","145","1","180","1","1","0","1");
INSERT INTO `kot_items` VALUES("541","145","2","200","1","0","0","1");
INSERT INTO `kot_items` VALUES("542","146","4","75","1","0","0","0");
INSERT INTO `kot_items` VALUES("543","147","1","180","1","1","0","0");
INSERT INTO `kot_items` VALUES("544","147","2","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("545","147","4","75","1","0","0","0");
INSERT INTO `kot_items` VALUES("546","148","1","180","1","0","0","0");
INSERT INTO `kot_items` VALUES("547","149","1","180","1","0","0","0");
INSERT INTO `kot_items` VALUES("548","150","1","180","1","0","0","0");
INSERT INTO `kot_items` VALUES("549","150","2","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("550","151","1","180","1","0","0","1");
INSERT INTO `kot_items` VALUES("551","151","2","200","1","0","0","1");
INSERT INTO `kot_items` VALUES("552","151","4","75","1","0","0","1");
INSERT INTO `kot_items` VALUES("553","152","1","180","1","0","0","0");
INSERT INTO `kot_items` VALUES("554","152","2","200","1","0","0","0");
INSERT INTO `kot_items` VALUES("555","152","4","75","1","0","0","0");
INSERT INTO `kot_items` VALUES("556","153","11","100","1","0","0","0");
INSERT INTO `kot_items` VALUES("557","153","13","50","1","0","0","0");
INSERT INTO `kot_items` VALUES("558","154","1","180","1","0","0","0");
INSERT INTO `kot_items` VALUES("559","155","1","180","1","0","0","0");



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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `member` VALUES("1","sugen","9849542300","sugen@gmail.com","2016-12-17","K-3","1","0","2017-07-01 00:00:00","2018-02-01 02:01:05","1","2","0","0","0","2017-07-20 13:47:57","2");
INSERT INTO `member` VALUES("2","sushov","9898989898","sushov@gmail.com","2016-12-18","K-2","1","0","2017-07-01 00:00:00","2017-07-31 00:00:00","1","0","0","0","0","2017-07-19 17:02:52","2");
INSERT INTO `member` VALUES("3","test","123412341","test@gmail.com","2017-12-01","K-4","0","0","2017-12-31 00:00:00","2018-08-31 00:00:00","1","0","0","0","0","2017-12-14 22:35:21","2");
INSERT INTO `member` VALUES("4","test","1234567890","test@gmail.com","2016-12-27","K-5","0","0","2017-10-01 00:00:00","2018-10-31 00:00:00","1","0","0","0","0","2017-12-25 12:36:32","2");



DROP TABLE IF EXISTS member_discount;

CREATE TABLE `member_discount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `discount_allowed` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO `member_discount` VALUES("10","0","5","10");
INSERT INTO `member_discount` VALUES("11","0","6","5");
INSERT INTO `member_discount` VALUES("12","0","3","15");
INSERT INTO `member_discount` VALUES("13","0","1","10");
INSERT INTO `member_discount` VALUES("14","0","8","5");
INSERT INTO `member_discount` VALUES("15","0","4","5");



DROP TABLE IF EXISTS member_order_category;

CREATE TABLE `member_order_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `discount_rate` float NOT NULL,
  `discount_amount` float NOT NULL,
  `total` float NOT NULL,
  `member_report_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

INSERT INTO `member_order_category` VALUES("3","1","10","18","180","3");
INSERT INTO `member_order_category` VALUES("4","3","15","15","100","3");
INSERT INTO `member_order_category` VALUES("8","1","10","36","360","4");
INSERT INTO `member_order_category` VALUES("9","1","10","7.5","75","4");
INSERT INTO `member_order_category` VALUES("10","3","15","30","200","4");
INSERT INTO `member_order_category` VALUES("11","1","10","18","180","5");
INSERT INTO `member_order_category` VALUES("12","1","10","7.5","75","5");
INSERT INTO `member_order_category` VALUES("13","3","15","15","100","5");
INSERT INTO `member_order_category` VALUES("20","3","15","15","100","9");
INSERT INTO `member_order_category` VALUES("21","1","10","25.5","255","9");
INSERT INTO `member_order_category` VALUES("22","1","10","25.5","255","10");
INSERT INTO `member_order_category` VALUES("23","1","10","25.5","255","11");
INSERT INTO `member_order_category` VALUES("24","1","10","25.5","255","12");
INSERT INTO `member_order_category` VALUES("25","3","15","30","200","1");
INSERT INTO `member_order_category` VALUES("26","1","10","38","380","1");
INSERT INTO `member_order_category` VALUES("27","3","15","375","2500","2");
INSERT INTO `member_order_category` VALUES("28","1","10","45.5","455","3");
INSERT INTO `member_order_category` VALUES("29","1","10","238","2380","4");
INSERT INTO `member_order_category` VALUES("30","1","10","100","1000","5");
INSERT INTO `member_order_category` VALUES("31","1","10","80","800","6");
INSERT INTO `member_order_category` VALUES("32","1","10","100","1000","7");
INSERT INTO `member_order_category` VALUES("33","1","10","100","1000","8");
INSERT INTO `member_order_category` VALUES("34","1","10","100","1000","9");
INSERT INTO `member_order_category` VALUES("35","1","10","100","1000","10");



DROP TABLE IF EXISTS member_privillege_threshold;

CREATE TABLE `member_privillege_threshold` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `end_amount` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `till_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `member_privillege_threshold` VALUES("1","10000","50000","2017-12-10 12:51:49","2017-12-14 16:21:37","2");
INSERT INTO `member_privillege_threshold` VALUES("2","15000","75000","2017-12-14 16:21:38","2017-12-25 12:36:58","2");



DROP TABLE IF EXISTS member_report;

CREATE TABLE `member_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO `member_report` VALUES("1","1","170","2017-12-14 15:29:35");
INSERT INTO `member_report` VALUES("2","1","171","2017-12-14 15:31:45");
INSERT INTO `member_report` VALUES("3","1","172","2017-12-14 16:14:12");
INSERT INTO `member_report` VALUES("4","1","180","2017-12-17 10:41:16");
INSERT INTO `member_report` VALUES("5","1","182","2017-12-18 11:11:32");
INSERT INTO `member_report` VALUES("6","1","184","2017-12-18 11:14:13");
INSERT INTO `member_report` VALUES("7","1","185","2017-12-18 11:16:56");
INSERT INTO `member_report` VALUES("8","1","184","2017-12-18 12:12:40");
INSERT INTO `member_report` VALUES("9","1","185","2017-12-18 12:14:11");
INSERT INTO `member_report` VALUES("10","1","186","2017-12-18 12:15:04");



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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `menu_category` VALUES("1","food item","food-item","0","1","1","6","2017-04-13 10:44:12");
INSERT INTO `menu_category` VALUES("2","Hot Beverage","hot-beverage","0","1","2","7","2017-04-13 10:44:39");
INSERT INTO `menu_category` VALUES("3","Cold Beverage","cold-beverage","0","1","3","7","2017-04-13 10:44:48");
INSERT INTO `menu_category` VALUES("4","liquor","liquor","1","1","4","7","2017-04-13 11:27:27");
INSERT INTO `menu_category` VALUES("5","bakery","bakery","0","1","5","6","2017-05-23 12:15:00");
INSERT INTO `menu_category` VALUES("6","cakes and icecreams","cakes-and-icecreams","0","1","6","8","2017-05-23 13:05:01");
INSERT INTO `menu_category` VALUES("7","Testing","testing","0","1","7","7","2017-07-19 10:45:12");
INSERT INTO `menu_category` VALUES("8","testing 1","testing-1","0","1","8","7","2017-07-20 12:39:14");
INSERT INTO `menu_category` VALUES("9","testing 2","testing-2","0","1","9","6","2017-07-20 12:39:23");
INSERT INTO `menu_category` VALUES("10","testing 3","testing-3","0","1","10","7","2017-07-20 12:39:31");
INSERT INTO `menu_category` VALUES("11","testing 4","testing-4","0","1","11","8","2017-07-20 12:39:40");
INSERT INTO `menu_category` VALUES("12","test","test","0","1","12","7","2017-12-25 13:55:27");



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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

INSERT INTO `menu_item` VALUES("1","food item 10","1","180","asdfasdfasdf","","food-item-10","1","2017-04-13 11:25:34","2","2017-12-25 13:25:51","2","1","0");
INSERT INTO `menu_item` VALUES("2","triggerhappy","1","200","asdf","","triggerhappy","4","2017-04-13 11:25:34","2","2017-12-18 10:50:28","2","1","0");
INSERT INTO `menu_item` VALUES("3","Food Item Three","1","50","asdf","","Food-Item-Three","7","2017-04-13 11:25:34","2","2017-12-18 10:50:48","2","1","0");
INSERT INTO `menu_item` VALUES("4","Food Item Four","1","75","asdf","","Food-Item-Four","10","2017-04-13 11:25:34","2","2017-12-18 10:50:40","2","1","0");
INSERT INTO `menu_item` VALUES("5","Food Item Five","1","125","asdf","","Food-Item-Five","13","2017-04-13 11:25:34","2","2017-12-18 10:50:37","2","1","0");
INSERT INTO `menu_item` VALUES("6","Food Item One","1","100","asdf","","Food-Item-One","2","2017-04-13 11:25:34","2","2017-12-18 10:50:18","2","1","0");
INSERT INTO `menu_item` VALUES("11","Hot Breverage One","2","100","asdf","","Hot-Breverage-One","1","2017-04-13 11:25:34","2","2017-12-18 10:50:12","2","1","1");
INSERT INTO `menu_item` VALUES("12","Hot Breverage Two","2","200","asdf","","Hot-Breverage-Two","3","2017-04-13 11:25:34","2","2017-12-18 10:50:22","2","1","0");
INSERT INTO `menu_item` VALUES("13","Hot Breverage Three","2","50","asdf","","Hot-Breverage-Three","5","2017-04-13 11:25:34","2","2017-12-18 10:50:53","2","1","0");
INSERT INTO `menu_item` VALUES("14","Hot Breverage Four","2","75","asdf","","Hot-Breverage-Four","7","2017-04-13 11:25:34","2","2017-12-18 10:50:45","2","1","0");
INSERT INTO `menu_item` VALUES("15","Hot Breverage Five","2","125","asdf","","Hot-Breverage-Five","9","2017-04-13 11:25:34","2","2017-12-18 10:50:42","2","1","0");
INSERT INTO `menu_item` VALUES("26","Cold Breverage One","3","100","asdf","","Cold-Breverage-One","1","2017-04-13 11:25:34","2","2017-12-18 10:50:03","2","1","0");
INSERT INTO `menu_item` VALUES("27","Cold Breverage Two","3","200","asdf","","Cold-Breverage-Two","2","2017-04-13 11:25:34","2","2017-12-18 10:50:20","2","1","0");
INSERT INTO `menu_item` VALUES("28","Cold Breverage Three","3","50","asdf","","Cold-Breverage-Three","3","2017-04-13 11:25:34","2","2017-12-18 10:50:26","2","1","0");
INSERT INTO `menu_item` VALUES("29","Cold Breverage Four","3","75","asdf","","Cold-Breverage-Four","4","2017-04-13 11:25:34","2","2017-12-18 10:50:55","2","1","0");
INSERT INTO `menu_item` VALUES("30","Cold Breverage Five","3","125","asdf","","Cold-Breverage-Five","5","2017-04-13 11:25:34","2","2017-12-18 10:50:51","2","1","0");
INSERT INTO `menu_item` VALUES("31","liquor item 1","4","300","Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.","","liquor-item-1","1","2017-04-13 11:35:43","2","2017-12-18 10:50:06","2","1","0");
INSERT INTO `menu_item` VALUES("32","momo","1","200","With meat inside(asdjas)","","momo","16","2017-05-23 12:13:36","2","2017-12-18 10:50:34","2","1","0");
INSERT INTO `menu_item` VALUES("33","sandwich chicken","1","150","asdf  sadf","","sandwich-chicken","17","2017-05-23 12:32:13","2","2017-12-18 10:50:32","2","1","0");
INSERT INTO `menu_item` VALUES("34","test","5","32423400","test","","test","1","2017-07-18 16:29:54","2","2017-12-18 10:50:09","2","1","0");
INSERT INTO `menu_item` VALUES("35","new food item 1","1","1000","asdfasdf","","new-food-item-1","18","2017-12-14 11:24:27","2","2017-12-18 10:51:01","2","1","0");
INSERT INTO `menu_item` VALUES("36","test1234","1","123","asdfasdf","","test1234","19","2017-12-25 13:55:18","2","2017-12-25 13:55:18","2","1","0");



DROP TABLE IF EXISTS menu_item_price;

CREATE TABLE `menu_item_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `previous_price` float NOT NULL,
  `changed_price` float NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `menu_item_price` VALUES("1","1","150","160","2017-07-10 11:43:26","2");
INSERT INTO `menu_item_price` VALUES("2","1","160","170","2017-07-10 11:44:22","2");
INSERT INTO `menu_item_price` VALUES("3","1","170","180","2017-07-10 11:53:46","2");



DROP TABLE IF EXISTS menu_stock_items;

CREATE TABLE `menu_stock_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_item_id` int(11) NOT NULL,
  `stock_item_id` int(11) NOT NULL,
  `used_quantity` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `menu_stock_items` VALUES("3","33","7","10");
INSERT INTO `menu_stock_items` VALUES("4","33","6","2");
INSERT INTO `menu_stock_items` VALUES("5","33","5","50");
INSERT INTO `menu_stock_items` VALUES("6","31","1","1");
INSERT INTO `menu_stock_items` VALUES("7","31","2","10");
INSERT INTO `menu_stock_items` VALUES("8","1","1","1");



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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `obstacles` VALUES("1","Obstacle - 1","1","72.837","19.1437","17.1994","8.05271");
INSERT INTO `obstacles` VALUES("2","Obstacle - 2","1","72.3611","0","17.1994","7.68668");
INSERT INTO `obstacles` VALUES("3","Obstacle - 3","2","32.5083","131.234","15.674","8.05271");
INSERT INTO `obstacles` VALUES("4","Obstacle - 4","2","32.4064","153.085","15.1057","8.05271");
INSERT INTO `obstacles` VALUES("5","Obstacle - 5","1","37.404","36.1516","15.8295","8.05271");
INSERT INTO `obstacles` VALUES("6","Obstacle - 6","1","37.3353","19.7869","15.2207","8.05271");
INSERT INTO `obstacles` VALUES("7","Obstacle - 7","1","50.366","19.3303","15.2207","8.05271");



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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

INSERT INTO `occupy` VALUES("1","","0","","1","","4","1","2018-01-10","11:54:18","2018-01-10","11:54:41","2018-01-10 11:54:18","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("2","","0","","1","","4","1","2018-01-11","11:06:28","0000-00-00","11:09:55","2018-01-11 11:06:28","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("3","","0","","1","","20","1","2018-01-11","11:15:30","0000-00-00","11:21:30","2018-01-11 11:15:30","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("4","","0","","1","","20","1","2018-01-11","16:23:39","2018-01-11","16:23:54","2018-01-11 16:23:39","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("5","","0","","1","","20","1","2018-01-15","10:43:26","2018-01-15","10:43:45","2018-01-15 10:43:26","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("6","","0","","0","","20","1","2018-01-15","10:46:59","2018-01-15","10:47:15","2018-01-15 10:46:59","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("7","","0","","0","","15","1","2018-01-15","10:49:07","2018-01-15","10:52:46","2018-01-15 10:49:07","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("8","","0","","0","","20","1","2018-01-15","12:44:45","2018-02-23","10:36:53","2018-01-15 12:44:45","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("9","","0","","20","","1","1","2018-03-02","10:59:27","2018-03-28","10:34:55","2018-03-02 10:59:27","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("10","","0","","0","","1","1","2018-03-28","10:40:16","2018-04-02","10:38:32","2018-03-28 10:40:16","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("11","","0","","1","","2","1","2018-04-02","10:47:25","2018-04-11","14:55:34","2018-04-02 10:47:25","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("12","","0","","1","","2","1","2018-04-11","14:56:26","2018-04-11","14:57:09","2018-04-11 14:56:26","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("13","","0","","1","","2","1","2018-04-11","15:03:37","2018-04-11","15:04:18","2018-04-11 15:03:37","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("14","","0","","1","","2","1","2018-04-11","15:09:41","2018-04-11","15:20:16","2018-04-11 15:09:41","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("15","","0","","1","","2","1","2018-04-11","15:21:22","2018-04-11","15:31:19","2018-04-11 15:21:22","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("16","","0","","1","","2","1","2018-04-11","15:36:01","2018-04-11","16:04:50","2018-04-11 15:36:01","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("17","","0","","1","","2","1","2018-04-11","16:13:05","2018-04-11","16:13:44","2018-04-11 16:13:05","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("18","","0","","1","","2","1","2018-04-12","11:27:42","2018-04-12","11:49:14","2018-04-12 11:27:42","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("19","","0","","1","","2","1","2018-04-12","12:02:09","2018-04-12","12:02:40","2018-04-12 12:02:09","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("20","","0","","1","","2","1","2018-04-12","12:18:49","2018-04-12","12:23:55","2018-04-12 12:18:49","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("21","","0","","1","","2","1","2018-04-12","12:27:05","2018-04-13","11:31:49","2018-04-12 12:27:05","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("22","","0","","1","","2","1","2018-04-13","11:32:26","2018-04-13","11:33:33","2018-04-13 11:32:26","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("23","","0","","1","","2","1","2018-04-13","16:28:00","2018-04-13","16:29:14","2018-04-13 16:28:00","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("24","","0","","1","","2","1","2018-04-16","11:23:29","2018-04-16","11:24:35","2018-04-16 11:23:29","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("25","","0","","1","","2","1","2018-04-16","11:36:31","2018-04-16","11:44:11","2018-04-16 11:36:31","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("26","","0","","1","","2","1","2018-04-16","11:44:47","2018-04-16","12:13:09","2018-04-16 11:44:47","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("27","","0","","12","","2","1","2018-04-16","15:12:31","2018-04-23","17:33:05","2018-04-16 15:12:31","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("28","","0","","0","","2","1","2018-04-23","17:33:33","2018-04-23","17:33:57","2018-04-23 17:33:33","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("29","","0","","0","","20","1","2018-04-24","11:03:11","2018-04-24","11:04:21","2018-04-24 11:03:11","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("30","","0","","1","","15","1","2018-04-24","12:48:12","2018-04-26","11:31:37","2018-04-24 12:48:12","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("31","","0","","1","","1","1","2018-05-15","16:51:24","2018-05-15","16:51:49","2018-05-15 16:51:24","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("32","","0","","1","","3","1","2018-05-31","16:03:20","2018-12-11","10:18:14","2018-05-31 16:03:20","2","0","0","0","2018-10-08 12:14:17","2","1","1");
INSERT INTO `occupy` VALUES("33","","0","","0","","8","2","2018-08-31","10:59:39","0000-00-00","00:00:00","2018-08-31 10:59:39","2","0","1","0","2018-08-31 11:17:30","2","1","0");
INSERT INTO `occupy` VALUES("34","","0","","1","","14","1","2018-08-31","11:00:39","2018-08-31","11:09:00","2018-08-31 11:00:39","2","0","0","0","2018-08-31 11:04:37","2","1","1");
INSERT INTO `occupy` VALUES("35","","0","","0","","9","2","2018-08-31","11:09:06","0000-00-00","00:00:00","2018-08-31 11:09:06","2","0","1","0","2018-08-31 11:14:25","2","1","0");
INSERT INTO `occupy` VALUES("36","","0","","1","","6","1","2018-08-31","11:22:52","2018-12-11","10:17:06","2018-08-31 11:22:52","2","0","0","0","2018-08-31 11:38:06","2","1","1");
INSERT INTO `occupy` VALUES("37","","0","","1","","20","1","2018-08-31","11:23:31","2018-11-21","09:29:07","2018-08-31 11:23:31","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("38","","0","","2","","11","2","2018-11-16","09:36:21","2018-11-16","09:44:24","2018-11-16 09:36:21","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("39","asdf","0","","2","","15","1","2018-11-16","09:46:52","0000-00-00","00:00:00","2018-11-16 09:46:52","2","1","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("40","","0","","1","","21","1","2018-11-16","09:57:30","0000-00-00","00:00:00","2018-11-16 09:57:30","2","0","1","1","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("41","","0","","2","9841443344","29","3","2018-12-04","10:02:33","0000-00-00","00:00:00","2018-12-04 10:02:33","2","0","1","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("42","","0","","0","","24","1","2018-12-04","10:20:29","0000-00-00","00:00:00","2018-12-04 10:20:29","2","0","1","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("43","","0","","1","","6","1","2018-12-11","10:17:15","2018-12-11","10:17:57","2018-12-11 10:17:15","2","0","0","0","0000-00-00 00:00:00","0","2","1");
INSERT INTO `occupy` VALUES("44","","0","","0","","3","1","2018-12-11","10:18:19","0000-00-00","00:00:00","2018-12-11 10:18:19","2","0","1","0","0000-00-00 00:00:00","0","2","0");
INSERT INTO `occupy` VALUES("45","","0","","0","","30","1","2019-02-19","13:37:50","0000-00-00","00:00:00","2019-02-19 13:37:50","2","0","1","0","0000-00-00 00:00:00","0","2","0");
INSERT INTO `occupy` VALUES("46","","0","","0","","31","1","2019-02-21","13:54:52","0000-00-00","00:00:00","2019-02-21 13:54:52","2","0","1","0","0000-00-00 00:00:00","0","2","0");



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

INSERT INTO `order` VALUES("0","0","18-5","0","0","Sugen","123123123","asdfasdf","0","","0","0","100","0","0","0","0","0","0","0","100","0","0","0","0","1","1","2018-01-11 10:59:43","2","3","18-4","0","0","0","0","","","0","0");
INSERT INTO `order` VALUES("1515564580","1","18-1","0","1","","0","","1","","4","1","455","10","45.5","0","0","0","0","0","501","0.5","501","501","0","0","0","2018-01-10 11:54:40","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1515647662","0","18-2","0","0","Asdasdf","123123123","asdfasdfasdf","0","1123123","0","0","455","10","45.5","0","0","0","0","0","501","0.5","501","501","0","0","0","2018-01-11 10:59:22","2","2","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1515647663","0","18-3","0","0","Asdasdf","123123123","Asdfasdfasdf","0","","0","0","100","0","0","0","0","0","0","0","100","0","0","0","0","0","0","2018-01-11 10:59:23","2","3","18-2","0","0","0","0","","","0","0");
INSERT INTO `order` VALUES("1515647682","0","18-4","0","0","Sugen","123123123","asdfasdf","0","1231231","0","0","455","10","45.5","0","0","0","0","0","501","0.5","501","0","0","1","1","2018-01-11 10:59:43","2","2","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1515647797","0","18-6","0","0","Sugen","123123123","asdfasdf","0","1231231","0","0","455","10","45.5","0","0","0","0","0","501","0.5","501","0","0","1","1","2018-01-11 11:01:37","2","2","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1515647798","0","18-7","0","0","Sugen","123123123","asdfasdf","0","","0","0","100","0","0","0","0","0","0","0","100","0","0","0","0","1","1","2018-01-11 11:01:38","2","3","18-6","0","0","0","0","","","0","0");
INSERT INTO `order` VALUES("1515648077","0","18-8","0","0","Adfasd","234234234","234sdfsdfg","0","234234234","0","0","655","10","65.5","0","0","0","0","0","721","0.5","721","721","0","0","0","2018-01-11 11:06:17","2","2","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1515648078","0","18-9","0","0","Adfasd","234234234","234sdfsdfg","0","","0","0","100","0","0","0","0","0","0","0","100","0","0","0","0","0","0","2018-01-11 11:06:18","2","3","18-8","0","0","0","0","","","0","0");
INSERT INTO `order` VALUES("1515648109","2","18-10","0","0","","0","","0","","4","1","380","10","38","0","0","0","0","0","418","0","418","418","0","0","0","2018-01-11 11:06:49","2","0","","0","0","0","0","","","0","0");
INSERT INTO `order` VALUES("1515648205","2","18-11","0","0","","0","","0","","4","1","380","10","38","0","0","0","0","0","418","0","418","418","0","0","0","2018-01-11 11:08:25","2","0","","0","0","0","0","","","0","0");
INSERT INTO `order` VALUES("1515648294","2","18-12","0","0","","0","","0","","4","1","380","10","38","0","0","0","0","0","418","0","418","418","0","0","0","2018-01-11 11:09:54","2","0","","0","0","0","0","","","0","0");
INSERT INTO `order` VALUES("1515648295","2","18-13","0","0","","0","","0","","4","1","275","10","27.5","0","0","0","0","0","303","0.5","303","303","0","0","0","2018-01-11 11:09:55","2","0","","0","0","0","0","","","0","0");
INSERT INTO `order` VALUES("1515648646","3","18-14","0","0","","0","","0","","20","1","380","10","38","0","0","0","0","0","418","0","418","418","0","0","0","2018-01-11 11:15:46","2","0","","0","0","0","0","","","0","0");
INSERT INTO `order` VALUES("1515648960","3","18-15","0","0","","0","","0","","20","1","380","10","38","0","0","0","0","0","418","0","418","418","0","0","0","2018-01-11 11:21:00","2","0","","0","0","0","0","","","0","0");
INSERT INTO `order` VALUES("1515648989","3","18-16","0","0","","0","","0","","20","1","380","10","38","0","0","0","0","0","418","0","418","418","0","0","0","2018-01-11 11:21:29","2","0","","0","0","0","0","","","0","0");
INSERT INTO `order` VALUES("1515648991","3","18-17","0","0","","0","","0","","20","1","275","10","27.5","0","0","0","0","0","303","0.5","303","303","0","0","0","2018-01-11 11:21:30","2","0","","0","0","0","0","","","0","0");
INSERT INTO `order` VALUES("1515667132","4","18-18","0","0","","0","","1","","20","1","455","10","45.5","0","0","0","0","0","501","0.5","501","501","0","0","0","2018-01-11 16:23:52","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1515992324","5","18-19","0","0","","0","","1","","20","1","455","10","45.5","0","0","0","0","0","501","0.5","501","501","0","0","0","2018-01-15 10:43:44","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1522212593","9","18-20","0","0","","0","","20","","1","1","600000","10","60000","0","0","0","0","0","660000","0","660000","660000","0","0","0","2018-03-28 10:34:53","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1523437832","11","18-21","0","0","","0","","1","","2","1","1025","10","102.5","0","0","0","0","0","1128","0.5","1128","1128","0","0","0","2018-04-11 14:55:32","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1523437928","12","18-22","0","0","","0","","1","","2","1","1310","10","131","0","0","0","0","0","1441","0","1441","1441","0","0","0","2018-04-11 14:57:08","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1523438357","13","18-23","0","0","","0","","1","","2","1","1310","10","131","0","0","0","0","0","1441","0","1441","1441","0","0","0","2018-04-11 15:04:17","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1523439315","14","18-25","0","0","","0","","1","","2","1","2620","10","262","0","0","0","0","0","2882","0","2882","2882","0","0","0","2018-04-11 15:20:15","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1523439978","15","18-26","0","0","","0","","1","","2","1","1310","10","131","0","0","0","0","0","1441","0","1441","1441","0","0","0","2018-04-11 15:31:18","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1523441989","16","18-27","0","0","","0","","1","","2","1","900","10","90","0","0","0","0","0","990","0","990","990","0","0","0","2018-04-11 16:04:49","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1523442523","17","18-28","0","0","","0","","1","","2","1","1055","10","105.5","0","0","0","0","0","1161","0.5","1161","1161","0","0","0","2018-04-11 16:13:43","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1523513052","18","18-29","0","0","","0","","1","","2","1","3185","10","318.5","0","0","0","0","0","3504","0.5","3504","3504","0","0","0","2018-04-12 11:49:12","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1523513859","19","18-30","0","0","","0","","1","","2","1","275","10","27.5","0","0","0","0","0","303","0.5","303","303","0","0","0","2018-04-12 12:02:39","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1523515134","20","18-31","0","0","","0","","1","","2","1","910","10","91","0","0","0","0","0","1001","0","1001","1001","0","0","0","2018-04-12 12:23:54","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1523598408","21","18-32","0","0","","0","","1","","2","1","2095","10","209.5","0","0","0","0","0","2305","0.5","2305","2305","0","0","0","2018-04-13 11:31:48","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1523598511","22","18-33","0","0","","0","","1","","2","1","730","10","73","0","0","0","0","0","803","0","803","803","0","0","0","2018-04-13 11:33:31","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1523616253","23","18-34","0","0","","0","","1","","2","1","1185","10","118.5","0","0","0","0","0","1304","0.5","1304","1304","0","0","0","2018-04-13 16:29:13","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1523857173","24","18-35","0","0","","0","","1","","2","1","910","10","91","0","0","0","0","0","1001","0","1001","1001","0","0","0","2018-04-16 11:24:33","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1523858350","25","18-36","0","0","","0","","1","","2","1","910","10","91","0","0","0","0","0","1001","0","1001","1001","0","0","0","2018-04-16 11:44:10","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1523860088","26","18-37","0","0","","0","","1","","2","1","910","10","91","0","0","0","0","0","1001","0","1001","1001","0","0","0","2018-04-16 12:13:08","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1523878364","0","18-38","0","0","","0","","0","","0","0","910","0","0","0","0","0","0","0","910","0","910","910","0","0","0","2018-04-16 17:17:44","2","5","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1524484078","27","18-39","0","0","","0","","12","","2","1","12440","10","1244","0","0","0","0","0","13684","0","13684","13684","0","0","0","2018-04-23 17:32:58","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1524721595","30","18-40","0","0","","0","","1","","15","1","1585","10","158.5","0","0","0","0","0","1744","0.5","1744","1744","0","0","0","2018-04-26 11:31:35","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1526382400","31","18-41","0","0","","0","","1","","1","1","180","10","18","0","0","0","0","0","198","0","198","198","0","0","0","2018-05-15 16:51:40","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1528101530","0","18-42","0","0","Sugen","98989898","lazimpat","0","","0","0","655","10","65.5","0","0","0","0","0","721","0.5","721","721","0","0","0","2018-07-16 14:23:51","2","1","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1535693038","34","18-43","0","0","","0","","1","","14","1","455","10","45.5","0","0","0","0","0","501","0.5","501","501","0","0","0","2018-08-31 11:08:58","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1542340762","38","18-44","0","0","Person 1","0","","2","","11","2","900","10","81","0","0","0","10","90","891","0","891","0","0","1","5","2018-11-16 09:44:22","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1542771841","37","18-45","0","0","Sugen","0","","1","","20","1","730","10","73","0","0","0","0","0","803","0","803","0","0","1","1","2018-11-21 09:29:01","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1543898030","0","18-46","0","0","","0","","0","","0","0","180","0","0","0","0","0","0","0","180","0","180","180","0","0","0","2018-12-04 10:18:50","2","5","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1544502718","36","18-47","0","0","","0","","1","","6","1","380","10","38","0","0","0","0","0","418","0","418","418","0","0","0","2018-12-11 10:16:58","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1544502776","43","18-48","0","0","","0","","1","","6","1","380","10","38","0","0","0","0","0","418","0","418","418","0","0","0","2018-12-11 10:17:56","2","0","","0","0","0","0","","","0","2");
INSERT INTO `order` VALUES("1544502792","32","18-49","0","0","","0","","1","","3","1","635","10","63.5","0","0","0","0","0","699","0.5","699","699","0","0","0","2018-12-11 10:18:12","2","0","","0","0","0","0","","","0","2");



DROP TABLE IF EXISTS order_items;

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=latin1;

INSERT INTO `order_items` VALUES("1","1515564580","1","1","180","0");
INSERT INTO `order_items` VALUES("2","1515564580","2","1","200","0");
INSERT INTO `order_items` VALUES("3","1515564580","4","1","75","0");
INSERT INTO `order_items` VALUES("4","1515647662","1","1","180","0");
INSERT INTO `order_items` VALUES("5","1515647662","2","1","200","0");
INSERT INTO `order_items` VALUES("6","1515647662","4","1","75","0");
INSERT INTO `order_items` VALUES("7","1515647682","1","1","180","0");
INSERT INTO `order_items` VALUES("8","1515647682","2","1","200","0");
INSERT INTO `order_items` VALUES("9","1515647682","4","1","75","0");
INSERT INTO `order_items` VALUES("10","1515647797","1","1","180","0");
INSERT INTO `order_items` VALUES("11","1515647797","2","1","200","0");
INSERT INTO `order_items` VALUES("12","1515647797","4","1","75","0");
INSERT INTO `order_items` VALUES("13","1515648077","1","1","180","0");
INSERT INTO `order_items` VALUES("14","1515648077","2","1","200","0");
INSERT INTO `order_items` VALUES("15","1515648077","4","1","75","0");
INSERT INTO `order_items` VALUES("16","1515648077","32","1","200","0");
INSERT INTO `order_items` VALUES("17","1515648109","2","1","200","0");
INSERT INTO `order_items` VALUES("18","1515648109","1","1","180","0");
INSERT INTO `order_items` VALUES("19","1515648205","1","1","180","0");
INSERT INTO `order_items` VALUES("20","1515648205","2","1","200","0");
INSERT INTO `order_items` VALUES("21","1515648294","1","1","180","0");
INSERT INTO `order_items` VALUES("22","1515648294","2","1","200","0");
INSERT INTO `order_items` VALUES("23","1515648295","4","1","75","0");
INSERT INTO `order_items` VALUES("24","1515648295","32","1","200","0");
INSERT INTO `order_items` VALUES("25","1515648646","1","1","180","0");
INSERT INTO `order_items` VALUES("26","1515648646","2","1","200","0");
INSERT INTO `order_items` VALUES("27","1515648960","1","1","180","0");
INSERT INTO `order_items` VALUES("28","1515648960","2","1","200","0");
INSERT INTO `order_items` VALUES("29","1515648989","1","1","180","0");
INSERT INTO `order_items` VALUES("30","1515648989","2","1","200","0");
INSERT INTO `order_items` VALUES("31","1515648991","4","1","75","0");
INSERT INTO `order_items` VALUES("32","1515648991","32","1","200","0");
INSERT INTO `order_items` VALUES("33","1515667132","1","1","180","0");
INSERT INTO `order_items` VALUES("34","1515667132","2","1","200","0");
INSERT INTO `order_items` VALUES("35","1515667132","4","1","75","0");
INSERT INTO `order_items` VALUES("36","1515992324","1","1","180","0");
INSERT INTO `order_items` VALUES("37","1515992324","2","1","200","0");
INSERT INTO `order_items` VALUES("38","1515992324","4","1","75","0");
INSERT INTO `order_items` VALUES("39","1522212593","1","16","180","0");
INSERT INTO `order_items` VALUES("40","1522212593","2","9","200","0");
INSERT INTO `order_items` VALUES("41","1522212593","13","10","50","0");
INSERT INTO `order_items` VALUES("42","1522212593","14","2","75","0");
INSERT INTO `order_items` VALUES("43","1522212593","28","11","50","0");
INSERT INTO `order_items` VALUES("44","1522212593","27","7","200","0");
INSERT INTO `order_items` VALUES("45","1522212593","31","2","300","0");
INSERT INTO `order_items` VALUES("46","1522212593","34","2","32423400","0");
INSERT INTO `order_items` VALUES("47","1522212593","6","5","100","0");
INSERT INTO `order_items` VALUES("48","1522212593","11","10","100","0");
INSERT INTO `order_items` VALUES("49","1522212593","12","5","200","0");
INSERT INTO `order_items` VALUES("50","1522212593","26","11","100","0");
INSERT INTO `order_items` VALUES("51","1522212593","4","9","75","0");
INSERT INTO `order_items` VALUES("52","1522212593","32","4","200","0");
INSERT INTO `order_items` VALUES("53","1522212593","35","4","1000","0");
INSERT INTO `order_items` VALUES("54","1522212593","3","4","50","0");
INSERT INTO `order_items` VALUES("55","1522212593","5","4","125","0");
INSERT INTO `order_items` VALUES("56","1522212593","33","4","150","0");
INSERT INTO `order_items` VALUES("57","1522212593","36","4","123","0");
INSERT INTO `order_items` VALUES("58","1522212593","15","9","125","0");
INSERT INTO `order_items` VALUES("59","1522212593","30","10","125","0");
INSERT INTO `order_items` VALUES("60","1522212593","29","5","75","0");
INSERT INTO `order_items` VALUES("61","1523437832","2","1","200","0");
INSERT INTO `order_items` VALUES("62","1523437832","5","1","125","0");
INSERT INTO `order_items` VALUES("63","1523437832","32","2","200","0");
INSERT INTO `order_items` VALUES("64","1523437832","33","2","150","0");
INSERT INTO `order_items` VALUES("65","1523437928","1","2","180","0");
INSERT INTO `order_items` VALUES("66","1523437928","2","2","200","0");
INSERT INTO `order_items` VALUES("67","1523437928","4","2","75","0");
INSERT INTO `order_items` VALUES("68","1523437928","32","2","200","0");
INSERT INTO `order_items` VALUES("69","1523438357","1","2","180","0");
INSERT INTO `order_items` VALUES("70","1523438357","2","2","200","0");
INSERT INTO `order_items` VALUES("71","1523438357","4","2","75","0");
INSERT INTO `order_items` VALUES("72","1523438357","32","2","200","0");
INSERT INTO `order_items` VALUES("73","1523438717","6","1","100","0");
INSERT INTO `order_items` VALUES("74","1523438717","3","1","50","0");
INSERT INTO `order_items` VALUES("75","1523438717","5","1","125","0");
INSERT INTO `order_items` VALUES("76","1523438717","33","1","150","0");
INSERT INTO `order_items` VALUES("77","1523439315","1","4","180","0");
INSERT INTO `order_items` VALUES("78","1523439315","2","4","200","0");
INSERT INTO `order_items` VALUES("79","1523439315","4","4","75","0");
INSERT INTO `order_items` VALUES("80","1523439315","32","4","200","0");
INSERT INTO `order_items` VALUES("81","1523439978","1","2","180","0");
INSERT INTO `order_items` VALUES("82","1523439978","2","2","200","0");
INSERT INTO `order_items` VALUES("83","1523439978","4","2","75","0");
INSERT INTO `order_items` VALUES("84","1523439978","32","2","200","0");
INSERT INTO `order_items` VALUES("85","1523441989","11","2","100","0");
INSERT INTO `order_items` VALUES("86","1523441989","13","4","50","0");
INSERT INTO `order_items` VALUES("87","1523441989","15","4","125","0");
INSERT INTO `order_items` VALUES("88","1523442523","1","1","180","0");
INSERT INTO `order_items` VALUES("89","1523442523","2","2","200","0");
INSERT INTO `order_items` VALUES("90","1523442523","4","1","75","0");
INSERT INTO `order_items` VALUES("91","1523442523","32","2","200","0");
INSERT INTO `order_items` VALUES("92","1523513052","1","7","180","0");
INSERT INTO `order_items` VALUES("93","1523513052","2","7","200","0");
INSERT INTO `order_items` VALUES("94","1523513052","4","7","75","0");
INSERT INTO `order_items` VALUES("95","1523513859","11","1","100","0");
INSERT INTO `order_items` VALUES("96","1523513859","13","1","50","0");
INSERT INTO `order_items` VALUES("97","1523513859","15","1","125","0");
INSERT INTO `order_items` VALUES("98","1523515134","1","2","180","0");
INSERT INTO `order_items` VALUES("99","1523515134","2","2","200","0");
INSERT INTO `order_items` VALUES("100","1523515134","4","2","75","0");
INSERT INTO `order_items` VALUES("101","1523598408","1","4","180","0");
INSERT INTO `order_items` VALUES("102","1523598408","2","4","200","0");
INSERT INTO `order_items` VALUES("103","1523598408","4","4","75","0");
INSERT INTO `order_items` VALUES("104","1523598408","11","1","100","0");
INSERT INTO `order_items` VALUES("105","1523598408","13","1","50","0");
INSERT INTO `order_items` VALUES("106","1523598408","15","1","125","0");
INSERT INTO `order_items` VALUES("107","1523598511","1","1","180","0");
INSERT INTO `order_items` VALUES("108","1523598511","2","1","200","0");
INSERT INTO `order_items` VALUES("109","1523598511","4","1","75","0");
INSERT INTO `order_items` VALUES("110","1523598511","11","1","100","0");
INSERT INTO `order_items` VALUES("111","1523598511","13","1","50","0");
INSERT INTO `order_items` VALUES("112","1523598511","15","1","125","0");
INSERT INTO `order_items` VALUES("113","1523616253","1","2","180","0");
INSERT INTO `order_items` VALUES("114","1523616253","2","2","200","0");
INSERT INTO `order_items` VALUES("115","1523616253","4","2","75","0");
INSERT INTO `order_items` VALUES("116","1523616253","11","1","100","0");
INSERT INTO `order_items` VALUES("117","1523616253","13","1","50","0");
INSERT INTO `order_items` VALUES("118","1523616253","15","1","125","0");
INSERT INTO `order_items` VALUES("119","1523857173","1","2","180","0");
INSERT INTO `order_items` VALUES("120","1523857173","2","2","200","0");
INSERT INTO `order_items` VALUES("121","1523857173","4","2","75","0");
INSERT INTO `order_items` VALUES("122","1523858350","1","2","180","0");
INSERT INTO `order_items` VALUES("123","1523858350","2","2","200","0");
INSERT INTO `order_items` VALUES("124","1523858350","4","2","75","0");
INSERT INTO `order_items` VALUES("125","1523860088","1","2","180","0");
INSERT INTO `order_items` VALUES("126","1523860088","2","2","200","0");
INSERT INTO `order_items` VALUES("127","1523860088","4","2","75","0");
INSERT INTO `order_items` VALUES("128","1523878364","1","2","180","0");
INSERT INTO `order_items` VALUES("129","1523878364","2","2","200","0");
INSERT INTO `order_items` VALUES("130","1523878364","4","2","75","0");
INSERT INTO `order_items` VALUES("131","1524484078","1","18","180","0");
INSERT INTO `order_items` VALUES("132","1524484078","2","17","200","0");
INSERT INTO `order_items` VALUES("133","1524484078","4","5","75","0");
INSERT INTO `order_items` VALUES("134","1524484078","35","1","1000","0");
INSERT INTO `order_items` VALUES("135","1524484078","6","1","100","0");
INSERT INTO `order_items` VALUES("136","1524484078","3","1","50","0");
INSERT INTO `order_items` VALUES("137","1524484078","5","1","125","0");
INSERT INTO `order_items` VALUES("138","1524484078","33","1","150","0");
INSERT INTO `order_items` VALUES("139","1524484078","1","6","200","1");
INSERT INTO `order_items` VALUES("140","1524484078","6","5","100","1");
INSERT INTO `order_items` VALUES("141","1524484078","7","14","100","1");
INSERT INTO `order_items` VALUES("142","1524484078","2","3","200","1");
INSERT INTO `order_items` VALUES("143","1524484078","5","3","100","1");
INSERT INTO `order_items` VALUES("144","1524721595","4","3","75","0");
INSERT INTO `order_items` VALUES("145","1524721595","32","3","200","0");
INSERT INTO `order_items` VALUES("146","1524721595","1","2","180","0");
INSERT INTO `order_items` VALUES("147","1524721595","2","2","200","0");
INSERT INTO `order_items` VALUES("148","1526382400","1","1","180","0");
INSERT INTO `order_items` VALUES("149","1528101530","1","1","180","0");
INSERT INTO `order_items` VALUES("150","1528101530","2","1","200","0");
INSERT INTO `order_items` VALUES("151","1528101530","4","1","75","0");
INSERT INTO `order_items` VALUES("152","1528101530","32","1","200","0");
INSERT INTO `order_items` VALUES("153","1535693038","1","1","180","0");
INSERT INTO `order_items` VALUES("154","1535693038","2","1","200","0");
INSERT INTO `order_items` VALUES("155","1535693038","4","1","75","0");
INSERT INTO `order_items` VALUES("156","1542340762","1","5","180","0");
INSERT INTO `order_items` VALUES("157","1542771841","1","1","180","0");
INSERT INTO `order_items` VALUES("158","1542771841","2","1","200","0");
INSERT INTO `order_items` VALUES("159","1542771841","4","1","75","0");
INSERT INTO `order_items` VALUES("160","1542771841","11","1","100","0");
INSERT INTO `order_items` VALUES("161","1542771841","13","1","50","0");
INSERT INTO `order_items` VALUES("162","1542771841","15","1","125","0");
INSERT INTO `order_items` VALUES("163","1544502718","1","1","180","0");
INSERT INTO `order_items` VALUES("164","1544502718","2","1","200","0");
INSERT INTO `order_items` VALUES("165","1544502776","1","1","180","0");
INSERT INTO `order_items` VALUES("166","1544502776","2","1","200","0");
INSERT INTO `order_items` VALUES("167","1544502792","1","2","180","0");
INSERT INTO `order_items` VALUES("168","1544502792","11","1","100","0");
INSERT INTO `order_items` VALUES("169","1544502792","13","1","50","0");
INSERT INTO `order_items` VALUES("170","1544502792","15","1","125","0");



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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `pick_up` VALUES("1","test","0","","123456789","2018-04-24 12:14:05","2","0","0");
INSERT INTO `pick_up` VALUES("2","asdfasdf","0","adsfasdf","","2018-11-15 14:50:46","2","0","0");
INSERT INTO `pick_up` VALUES("3","asdfasdf","0","","","2018-11-15 14:51:09","2","0","0");
INSERT INTO `pick_up` VALUES("4","sdfgh","0","","3435467","2018-12-04 10:17:24","2","0","0");



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

INSERT INTO `printer_lists` VALUES("1","[{\"NAME\":\"Send To OneNote 2016\",\"DESCRIPTION\":\"Send To OneNote 2016,Send to Microsoft OneNote 16 Driver,\",\"COMMENT\":\"\"},{\"NAME\":\"Samsung SCX-3400 Series\",\"DESCRIPTION\":\"Samsung SCX-3400 Series,Samsung SCX-3400 Series Class Driver,\",\"COMMENT\":\"\"},{\"NAME\":\"Microsoft XPS Document Writer\",\"DESCRIPTION\":\"Microsoft XPS Document Writer,Microsoft XPS Document Writer v4,\",\"COMMENT\":\"\"},{\"NAME\":\"Microsoft Print to PDF\",\"DESCRIPTION\":\"Microsoft Print to PDF,Microsoft Print To PDF,\",\"COMMENT\":\"\"},{\"NAME\":\"Fax\",\"DESCRIPTION\":\"Fax,Microsoft Shared Fax Driver,\",\"COMMENT\":\"\"},{\"NAME\":\"Brother DCP-T700W Printer\",\"DESCRIPTION\":\"Brother DCP-T700W Printer,Brother Generic Jpeg Type2 Class Driver,\",\"COMMENT\":\"\"},{\"NAME\":\"Brother DCP-T700W\",\"DESCRIPTION\":\"Brother DCP-T700W,Brother DCP-T700W Printer,\",\"COMMENT\":\"\"}]");



DROP TABLE IF EXISTS printers;

CREATE TABLE `printers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `printer_name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `printers` VALUES("5","bill","bill","Brother DCP-T700W");
INSERT INTO `printers` VALUES("6","kitchen","kitchen","Brother DCP-T700W Printer");
INSERT INTO `printers` VALUES("7","bar","bar","Samsung SCX-3400 Series");
INSERT INTO `printers` VALUES("8","bakery","bakery","epson");



DROP TABLE IF EXISTS purchase;

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `purchase` VALUES("1","9","2000","2017-05-23 16:12:45","2");
INSERT INTO `purchase` VALUES("2","1","50","2017-07-19 10:46:08","2");
INSERT INTO `purchase` VALUES("3","1","10","2018-11-16 09:32:09","2");



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
INSERT INTO `random` VALUES("11","document","<h3>Information, Terms & User Manual for TRUFFLE</h3>        	<h3>Following User Guide aims to inform about some of the variations on Truffle Software.</h3>        	<p>The information pertained in this documents relates to the following versions of TRUFFLE software.</p>    		<ol>        		<li>TRUFFLE Lite PAN</li>        		<li>TRUFFLE Lite VAT</li>        		<li>TRUFFLE Pro PAN</li>        		<li>TRUFFLE Pro VAT</li>    		</ol>        	<h3>License:</h3>        	<p>TRUFFLE Software and all its variations are the property of Klient Scape Software Pvt. Ltd. The License to use the software must be authorised by Klient Scape Software Pvt. Ltd.</p>         	<p>For the purposes of this manual, unless otherwise stated, all versions are collective named ‘Truffle’. Klient Scape Software will be named as ‘Company’ and the license holders to use the software will be called ‘Clients’. Anyone using the software will be collectively called in as ‘Users’.</p>        	<h3>Agreement</h3>        	<p>Users are authorised to use the functions provided within the software. Users are not allowed to copy, distribute or share any information within the software to anyone without the consent of the Company. Users may not change the functionality of the software under any circumstance and failure to abide by these terms are considered breach of contract, and the company may pursue legal action.</p>        	<h3>How To:</h3>        	<h3>Create Users:</h3>        	<p>Administrators are allowed to create users, the number of users allowed to create depends on the version. Pro versions allow for unlimited number of users.</p>        	<h3>Assign Access Roles</h3>        	<p>There are 2 access roles – Admin and Staff</p>        	<p>Users with admin levels access are privy to all the features available in Truffle. Admin can provide up to 90% in discounts and authorise sales returns. Admins can also view all the analysis and are entered into a dashboard view once logged in to see the overview of the restaurant.</p>        	<p>Users with Staff access roles are directly logged into the restaurant view and are not privy to all the data within the software. Staff can also be enrolled with up to 90% discounts. However, an admin must assign which staff to allocate the % of discount.</p>        	<h3>Dashboard View:</h3>        	<p>Dashboard view allows a quick glance of the restaurant in terms of financial prospective. Debtors list and transaction history are conveniently located at the upper left corner of the dashboard view. A large section occupies a bar graph relating to total sales and total cash-in. Note: Total sales can be different from total cash in.</p>        	<p>The three boxes underneath shows overall sales, current month sales, and current day sales.</p>        	<p>The total report section shows the total number of customers, average sales per customer and average sales per person along with average time each table gets occupied.</p>        	<p>The today’s summary section in the dashboard is one of the handiest tools that shows all the relevant information of current day status.</p>        	<h3>Capacity Rate:</h3>        	<p>The capacity rate shows the rate in which the restaurant capacity is being utilised. If the restaurant has a capacity of 100 seats, 100 customers a day would make a 100% capacity rate. </p>        	<p>The dashboard offers to set a capacity rate under the heading of ‘Change Restaurant Capacity.’</p>        	<p>Difference between Total Sales and Cash IN:</p>        	<p>The Total sales amount shows the actual sales the restaurant has made, that is all cash sales, all credit sales and does not include service charge or the VAT payable from sales.</p>        	<p>The Cash in amount shows only the cash that has been received, i.e Cash sales, credit collection, tips received, service charge, VAT amount etc. This feature is handy to calculate all the sum received during the day.</p>        	<h3>Best Sellers:</h3>        	<p>The dashboard offers a best sellers section conveniently placed to show the best selling items for current day, current month, current year and ALL time.</p>        	<h3>Best Sellers – Gross sales.</h3>        	<p>The dashboard also offers a best sellers in accordance to the revenue generated by each item in the menu. </p>        	<h3>Table View:</h3>        	<h3>Table Layout</h3>        	<p>Pro versions allow for unlimited sections and tables. In lite version, sections are limited but unlimited tables can be created, provided it fits the screen. </p>        	<p>To create a new table, drag the table icon to section area and place it there. From there you can resize, rename any tables. You can also create obstacles to create a restaurant design that best suits the user.</p>        	<p>Once the design of the restaurant is complete, admins can lock the tables and the obstacles.</p>        	<p>Merge Table:To merge table, check if the lock key in the table area is set to unlocked. Drag a the table you want to merge and connect it to another table. The colour of the table changes if it is merged.</p>        	<h3>Take-away, pick-up and delivery:</h3>        	<p>These areas are useful to take orders in accordance to their needs, for customers that are not eating in. You can choose to charge ‘service charge’ according to your desire through the settings area, i.e. you can choose if eat in customers have service charge and take away customers be exempt from it or charge 5% delivery rate. </p>        	<h3>Taking orders:</h3>        	<p>In order to take orders, a menu must be created. To create a menu, under the third settings, under the category of Menu Items, you can add, edit and deactivate menu items. Once menu items are created, orders can be taken through tables or through pick-ups and deliveries.<p>        	<p>To take an order in a table, users should click on the items on the order screen and send to KOT. Once KOT is created, it automatically sends it to the billing area. Users can take more KOTs and send to respective areas, and billing is automatically adjusted.</p>        	<h3>Menu Category:</h3>        	<p>Truffle allows for sending KOT’s to different printers; i.e you can print kitchen orders to kitchen, bar orders to bar. You can create unlimited categories in the pro versions, while the category numbers are restricted to Lite versions.</p>        	<p>Categories are also useful for analysis in terms of items of how certain categories are being sold compared to others. This can be checked through category summary under the second setting sections.</p>        	<h3>Stock:</h3>        	<p>TRUFLLE Pro allows for stock counting. In order to utilize this feature, entries should be made to show opening stock and menu items should reflect the items that it requires to finish producing a menu item.</p>        	<h3>FOC:</h3>        	<p>FOC refers to free-of-cost, as these items will deduct stock but for various reason, requires the cost to be FOC. FOC requires a password that can be set by admins in the settings section.</p>        	<h3>Utensils Stock Manager:</h3>        	<p>Utensils Stock manager allows users to count and adjust all the utensils, i.e. spoons, knives, ash-tray, plates etc. </p>        	<h3>Bill payment:</h3>        	<p>When a customer asks for a bill in their table, under the billing list in the order view, the $ sign allows to make bill payment. Here users can choose to make full cash payments, make partial payments, bank payments or provide full credit payments. Regardless of the payment method, Truffle will create a bill and save it. The print button will print the customer bill, and print and close button will print the bill and close the table. The print temporary option allows to check the printed version of the bill for corrections before closing the bill. Note: The print temporary bill is not an actual invoice, but a mock-up that does not show the companies name, VAT information etc.</p>         	<h3>VAT REPORT:</h3>        	<p>Vat report shows the VAT report in the manner of Nepal VAT sales ledger book. It shows Total Amount, Total taxable amount, VAT percent and VAT Amount with breakdown of all the invoices. The date allows you to sort through VAT reports in accordance to their dates.</p>        	<h3>Fiscal Year</h3>        	<p>Fiscal Years are automatically calculated. Truffle uses proprietary methods to not allow users to make entries as dates are set and all entries time-stamped within the software. Users are not allowed to make entries on a different date. Users are allowed make new entries for up to 10 days after the fiscal year ends, to make changes wherever necessary. </p>        	<p class=\"text-center\">For further help, Contact <span class=\"text-decoration-underline\"> KlientScape Software, 01-4425513 or 01-6201374 </span> or visit us at our Offices in BIshalnagar-5.</p>");



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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `retail` VALUES("1","","0","","","2018-04-16 17:17:35","2","1","2");
INSERT INTO `retail` VALUES("2","","0","","","2018-04-24 12:17:08","2","1","2");
INSERT INTO `retail` VALUES("3","","0","","","2018-11-15 14:54:44","2","0","0");



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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `special_order_items` VALUES("1","special item 1 asdfsadfsadf","200","Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident","asdf sadsadfasdf asdf asdfasdf asd fasd fasdf asd f","1","","2017-04-13 11:46:30","2");
INSERT INTO `special_order_items` VALUES("2","special item 2","200","Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident","asdf asdf asdf sadf asdf asdf asdf asdf asd fasd fasdf asdf asdf asd fasd f","4","","2017-04-13 11:46:49","2");
INSERT INTO `special_order_items` VALUES("3","testint123","100","test","test","1","","2018-04-17 10:39:59","2");
INSERT INTO `special_order_items` VALUES("4","testint123","100","test","test","1","","2018-04-17 10:40:06","2");
INSERT INTO `special_order_items` VALUES("5","testing1234","100","test","test","1","","2018-04-17 10:40:41","2");
INSERT INTO `special_order_items` VALUES("6","testing12345","100","test","test","1","","2018-04-17 10:41:30","2");
INSERT INTO `special_order_items` VALUES("7","testint112233","100","test","test","1","","2018-04-17 10:42:23","2");



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
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=latin1;

INSERT INTO `stock_entries` VALUES("1","1","0","0","1","0","0000-00-00 00:00:00","","2017-04-13 11:33:07","2");
INSERT INTO `stock_entries` VALUES("2","2","1000","0","1","0","0000-00-00 00:00:00","","2017-04-13 11:33:18","2");
INSERT INTO `stock_entries` VALUES("3","3","500","0","1","0","0000-00-00 00:00:00","","2017-04-13 11:33:31","2");
INSERT INTO `stock_entries` VALUES("4","4","1000","0","1","0","0000-00-00 00:00:00","","2017-04-13 11:33:48","2");
INSERT INTO `stock_entries` VALUES("5","5","200","0","1","0","0000-00-00 00:00:00","","2017-04-13 11:34:00","2");
INSERT INTO `stock_entries` VALUES("6","6","100","0","1","0","0000-00-00 00:00:00","","2017-04-13 11:34:11","2");
INSERT INTO `stock_entries` VALUES("7","1","0","2","0","0","0000-00-00 00:00:00","","2017-04-13 12:00:57","2");
INSERT INTO `stock_entries` VALUES("8","2","0","20","0","0","0000-00-00 00:00:00","","2017-04-13 12:00:58","2");
INSERT INTO `stock_entries` VALUES("9","1","0","2","0","0","0000-00-00 00:00:00","","2017-04-13 12:37:14","2");
INSERT INTO `stock_entries` VALUES("10","2","0","20","0","0","0000-00-00 00:00:00","","2017-04-13 12:37:14","2");
INSERT INTO `stock_entries` VALUES("11","1","0","2","0","0","0000-00-00 00:00:00","","2017-04-13 12:58:40","2");
INSERT INTO `stock_entries` VALUES("12","2","0","20","0","0","0000-00-00 00:00:00","","2017-04-13 12:58:41","2");
INSERT INTO `stock_entries` VALUES("13","1","0","1","0","0","0000-00-00 00:00:00","","2017-05-23 12:11:00","2");
INSERT INTO `stock_entries` VALUES("14","2","0","10","0","0","0000-00-00 00:00:00","","2017-05-23 12:11:01","2");
INSERT INTO `stock_entries` VALUES("15","7","100","0","1","0","0000-00-00 00:00:00","","2017-05-23 12:29:50","2");
INSERT INTO `stock_entries` VALUES("16","1","0","1","0","0","0000-00-00 00:00:00","","2017-05-23 15:59:14","2");
INSERT INTO `stock_entries` VALUES("17","2","0","10","0","0","0000-00-00 00:00:00","","2017-05-23 15:59:14","2");
INSERT INTO `stock_entries` VALUES("18","8","1000","0","1","0","0000-00-00 00:00:00","","2017-05-23 16:11:43","2");
INSERT INTO `stock_entries` VALUES("19","9","1000","0","1","0","0000-00-00 00:00:00","","2017-05-23 16:11:48","2");
INSERT INTO `stock_entries` VALUES("20","9","2000","0","0","0","0000-00-00 00:00:00","","2017-05-23 16:12:45","2");
INSERT INTO `stock_entries` VALUES("21","10","1000","0","1","0","0000-00-00 00:00:00","","2017-06-20 17:42:01","2");
INSERT INTO `stock_entries` VALUES("22","1","0","2","0","0","0000-00-00 00:00:00","","2017-06-22 11:35:06","2");
INSERT INTO `stock_entries` VALUES("23","2","0","20","0","0","0000-00-00 00:00:00","","2017-06-22 11:35:06","2");
INSERT INTO `stock_entries` VALUES("24","7","0","10","0","0","0000-00-00 00:00:00","","2017-07-18 15:28:24","2");
INSERT INTO `stock_entries` VALUES("25","6","0","2","0","0","0000-00-00 00:00:00","","2017-07-18 15:28:24","2");
INSERT INTO `stock_entries` VALUES("26","5","0","50","0","0","0000-00-00 00:00:00","","2017-07-18 15:28:24","2");
INSERT INTO `stock_entries` VALUES("27","7","0","10","0","0","0000-00-00 00:00:00","","2017-07-19 10:44:03","2");
INSERT INTO `stock_entries` VALUES("28","6","0","2","0","0","0000-00-00 00:00:00","","2017-07-19 10:44:04","2");
INSERT INTO `stock_entries` VALUES("29","5","0","50","0","0","0000-00-00 00:00:00","","2017-07-19 10:44:04","2");
INSERT INTO `stock_entries` VALUES("30","1","50","0","0","0","0000-00-00 00:00:00","","2017-07-19 10:46:08","2");
INSERT INTO `stock_entries` VALUES("31","1","0","1","0","0","0000-00-00 00:00:00","","2017-07-21 15:10:56","2");
INSERT INTO `stock_entries` VALUES("32","2","0","10","0","0","0000-00-00 00:00:00","","2017-07-21 15:10:56","2");
INSERT INTO `stock_entries` VALUES("33","1","0","1","0","0","0000-00-00 00:00:00","","2017-07-21 17:18:41","2");
INSERT INTO `stock_entries` VALUES("34","2","0","10","0","0","0000-00-00 00:00:00","","2017-07-21 17:18:41","2");
INSERT INTO `stock_entries` VALUES("35","1","0","1","0","0","0000-00-00 00:00:00","","2017-07-21 17:24:42","2");
INSERT INTO `stock_entries` VALUES("36","2","0","10","0","0","0000-00-00 00:00:00","","2017-07-21 17:24:42","2");
INSERT INTO `stock_entries` VALUES("37","1","0","1","0","0","0000-00-00 00:00:00","","2017-07-21 17:26:04","2");
INSERT INTO `stock_entries` VALUES("38","2","0","10","0","0","0000-00-00 00:00:00","","2017-07-21 17:26:04","2");
INSERT INTO `stock_entries` VALUES("39","1","0","2","0","0","0000-00-00 00:00:00","","2017-07-24 15:17:36","2");
INSERT INTO `stock_entries` VALUES("40","2","0","20","0","0","0000-00-00 00:00:00","","2017-07-24 15:17:36","2");
INSERT INTO `stock_entries` VALUES("41","1","0","2","0","0","0000-00-00 00:00:00","","2017-07-24 15:21:25","2");
INSERT INTO `stock_entries` VALUES("42","2","0","20","0","0","0000-00-00 00:00:00","","2017-07-24 15:21:25","2");
INSERT INTO `stock_entries` VALUES("43","1","0","1","0","0","0000-00-00 00:00:00","","2017-07-24 15:31:25","2");
INSERT INTO `stock_entries` VALUES("44","2","0","10","0","0","0000-00-00 00:00:00","","2017-07-24 15:31:25","2");
INSERT INTO `stock_entries` VALUES("45","1","0","1","0","0","0000-00-00 00:00:00","","2017-07-25 17:16:16","2");
INSERT INTO `stock_entries` VALUES("46","2","0","10","0","0","0000-00-00 00:00:00","","2017-07-25 17:16:16","2");
INSERT INTO `stock_entries` VALUES("47","1","0","1","0","0","0000-00-00 00:00:00","","2017-07-25 17:29:48","2");
INSERT INTO `stock_entries` VALUES("48","2","0","10","0","0","0000-00-00 00:00:00","","2017-07-25 17:29:48","2");
INSERT INTO `stock_entries` VALUES("49","1","0","1","0","0","0000-00-00 00:00:00","","2017-07-25 17:30:53","2");
INSERT INTO `stock_entries` VALUES("50","2","0","10","0","0","0000-00-00 00:00:00","","2017-07-25 17:30:53","2");
INSERT INTO `stock_entries` VALUES("51","1","0","1","0","0","0000-00-00 00:00:00","","2017-07-25 17:31:59","2");
INSERT INTO `stock_entries` VALUES("52","2","0","10","0","0","0000-00-00 00:00:00","","2017-07-25 17:31:59","2");
INSERT INTO `stock_entries` VALUES("53","1","0","1","0","0","0000-00-00 00:00:00","","2017-07-26 14:51:18","2");
INSERT INTO `stock_entries` VALUES("54","2","0","10","0","0","0000-00-00 00:00:00","","2017-07-26 14:51:18","2");
INSERT INTO `stock_entries` VALUES("55","1","0","1","0","0","0000-00-00 00:00:00","","2017-07-26 14:53:53","2");
INSERT INTO `stock_entries` VALUES("56","2","0","10","0","0","0000-00-00 00:00:00","","2017-07-26 14:53:53","2");
INSERT INTO `stock_entries` VALUES("57","1","0","1","0","0","0000-00-00 00:00:00","","2017-07-26 15:26:00","2");
INSERT INTO `stock_entries` VALUES("58","2","0","10","0","0","0000-00-00 00:00:00","","2017-07-26 15:26:01","2");
INSERT INTO `stock_entries` VALUES("59","1","0","2","0","0","0000-00-00 00:00:00","","2017-07-27 10:25:13","5");
INSERT INTO `stock_entries` VALUES("60","2","0","20","0","0","0000-00-00 00:00:00","","2017-07-27 10:25:13","5");
INSERT INTO `stock_entries` VALUES("61","11","1000","0","1","0","0000-00-00 00:00:00","","2017-07-31 11:33:07","2");
INSERT INTO `stock_entries` VALUES("62","1","0","0","0","1","2017-07-31 11:35:56","asdfasdf","2017-07-31 11:35:56","2");
INSERT INTO `stock_entries` VALUES("63","1","0","0","0","1","2017-12-08 12:44:54","asdfasdf","2017-12-08 12:44:54","2");
INSERT INTO `stock_entries` VALUES("64","7","0","10","0","0","0000-00-00 00:00:00","","2017-12-20 14:41:44","2");
INSERT INTO `stock_entries` VALUES("65","6","0","2","0","0","0000-00-00 00:00:00","","2017-12-20 14:41:44","2");
INSERT INTO `stock_entries` VALUES("66","5","0","50","0","0","0000-00-00 00:00:00","","2017-12-20 14:41:44","2");
INSERT INTO `stock_entries` VALUES("67","7","0","10","0","0","0000-00-00 00:00:00","","2017-12-20 14:43:22","2");
INSERT INTO `stock_entries` VALUES("68","6","0","2","0","0","0000-00-00 00:00:00","","2017-12-20 14:43:22","2");
INSERT INTO `stock_entries` VALUES("69","5","0","50","0","0","0000-00-00 00:00:00","","2017-12-20 14:43:22","2");
INSERT INTO `stock_entries` VALUES("70","7","0","10","0","0","0000-00-00 00:00:00","","2017-12-20 14:50:39","2");
INSERT INTO `stock_entries` VALUES("71","6","0","2","0","0","0000-00-00 00:00:00","","2017-12-20 14:50:40","2");
INSERT INTO `stock_entries` VALUES("72","5","0","50","0","0","0000-00-00 00:00:00","","2017-12-20 14:50:40","2");
INSERT INTO `stock_entries` VALUES("73","7","0","20","0","0","0000-00-00 00:00:00","","2017-12-20 14:54:11","2");
INSERT INTO `stock_entries` VALUES("74","6","0","4","0","0","0000-00-00 00:00:00","","2017-12-20 14:54:11","2");
INSERT INTO `stock_entries` VALUES("75","5","0","100","0","0","0000-00-00 00:00:00","","2017-12-20 14:54:11","2");
INSERT INTO `stock_entries` VALUES("76","7","0","20","0","0","0000-00-00 00:00:00","","2017-12-20 14:59:05","2");
INSERT INTO `stock_entries` VALUES("77","6","0","4","0","0","0000-00-00 00:00:00","","2017-12-20 14:59:06","2");
INSERT INTO `stock_entries` VALUES("78","5","0","100","0","0","0000-00-00 00:00:00","","2017-12-20 14:59:06","2");
INSERT INTO `stock_entries` VALUES("79","7","0","10","0","0","0000-00-00 00:00:00","","2017-12-20 16:55:19","2");
INSERT INTO `stock_entries` VALUES("80","6","0","2","0","0","0000-00-00 00:00:00","","2017-12-20 16:55:19","2");
INSERT INTO `stock_entries` VALUES("81","5","0","50","0","0","0000-00-00 00:00:00","","2017-12-20 16:55:19","2");
INSERT INTO `stock_entries` VALUES("82","7","0","10","0","0","0000-00-00 00:00:00","","2017-12-20 17:03:27","2");
INSERT INTO `stock_entries` VALUES("83","6","0","2","0","0","0000-00-00 00:00:00","","2017-12-20 17:03:27","2");
INSERT INTO `stock_entries` VALUES("84","5","0","50","0","0","0000-00-00 00:00:00","","2017-12-20 17:03:27","2");
INSERT INTO `stock_entries` VALUES("85","1","0","0","0","1","2017-12-25 12:16:06","asdfasdf","2017-12-25 12:16:06","2");
INSERT INTO `stock_entries` VALUES("86","12","12","0","1","0","0000-00-00 00:00:00","","2017-12-25 13:55:48","2");
INSERT INTO `stock_entries` VALUES("87","1","0","1","0","0","0000-00-00 00:00:00","","2017-12-25 15:03:14","2");
INSERT INTO `stock_entries` VALUES("88","1","0","1","0","0","0000-00-00 00:00:00","","2017-12-25 15:34:42","2");
INSERT INTO `stock_entries` VALUES("89","1","0","1","0","0","0000-00-00 00:00:00","","2018-01-09 14:50:49","2");
INSERT INTO `stock_entries` VALUES("90","1","0","1","0","0","0000-00-00 00:00:00","","2018-01-09 15:02:17","2");
INSERT INTO `stock_entries` VALUES("91","1","0","1","0","0","0000-00-00 00:00:00","","2018-01-09 16:32:37","2");
INSERT INTO `stock_entries` VALUES("92","1","0","1","0","0","0000-00-00 00:00:00","","2018-01-10 11:54:41","2");
INSERT INTO `stock_entries` VALUES("93","1","0","1","0","0","0000-00-00 00:00:00","","2018-01-11 10:59:22","2");
INSERT INTO `stock_entries` VALUES("94","1","0","1","0","0","0000-00-00 00:00:00","","2018-01-11 10:59:43","2");
INSERT INTO `stock_entries` VALUES("95","1","0","1","0","0","0000-00-00 00:00:00","","2018-01-11 11:01:37","2");
INSERT INTO `stock_entries` VALUES("96","1","0","1","0","0","0000-00-00 00:00:00","","2018-01-11 11:06:18","2");
INSERT INTO `stock_entries` VALUES("97","1","0","1","0","0","0000-00-00 00:00:00","","2018-01-11 11:06:49","2");
INSERT INTO `stock_entries` VALUES("98","1","0","1","0","0","0000-00-00 00:00:00","","2018-01-11 11:08:25","2");
INSERT INTO `stock_entries` VALUES("99","1","0","1","0","0","0000-00-00 00:00:00","","2018-01-11 11:09:54","2");
INSERT INTO `stock_entries` VALUES("100","1","0","1","0","0","0000-00-00 00:00:00","","2018-01-11 11:15:46","2");
INSERT INTO `stock_entries` VALUES("101","1","0","1","0","0","0000-00-00 00:00:00","","2018-01-11 11:21:00","2");
INSERT INTO `stock_entries` VALUES("102","1","0","1","0","0","0000-00-00 00:00:00","","2018-01-11 11:21:30","2");
INSERT INTO `stock_entries` VALUES("103","1","0","1","0","0","0000-00-00 00:00:00","","2018-01-11 16:23:53","2");
INSERT INTO `stock_entries` VALUES("104","1","0","1","0","0","0000-00-00 00:00:00","","2018-01-15 10:43:44","2");
INSERT INTO `stock_entries` VALUES("105","7","0","40","0","0","0000-00-00 00:00:00","","2018-03-28 10:34:54","2");
INSERT INTO `stock_entries` VALUES("106","6","0","8","0","0","0000-00-00 00:00:00","","2018-03-28 10:34:54","2");
INSERT INTO `stock_entries` VALUES("107","5","0","200","0","0","0000-00-00 00:00:00","","2018-03-28 10:34:54","2");
INSERT INTO `stock_entries` VALUES("108","1","0","2","0","0","0000-00-00 00:00:00","","2018-03-28 10:34:54","2");
INSERT INTO `stock_entries` VALUES("109","2","0","20","0","0","0000-00-00 00:00:00","","2018-03-28 10:34:54","2");
INSERT INTO `stock_entries` VALUES("110","1","0","16","0","0","0000-00-00 00:00:00","","2018-03-28 10:34:54","2");
INSERT INTO `stock_entries` VALUES("111","7","0","20","0","0","0000-00-00 00:00:00","","2018-04-11 14:55:33","2");
INSERT INTO `stock_entries` VALUES("112","6","0","4","0","0","0000-00-00 00:00:00","","2018-04-11 14:55:33","2");
INSERT INTO `stock_entries` VALUES("113","5","0","100","0","0","0000-00-00 00:00:00","","2018-04-11 14:55:33","2");
INSERT INTO `stock_entries` VALUES("114","1","0","2","0","0","0000-00-00 00:00:00","","2018-04-11 14:57:09","2");
INSERT INTO `stock_entries` VALUES("115","1","0","2","0","0","0000-00-00 00:00:00","","2018-04-11 15:04:17","2");
INSERT INTO `stock_entries` VALUES("116","7","0","10","0","0","0000-00-00 00:00:00","","2018-04-11 15:10:17","2");
INSERT INTO `stock_entries` VALUES("117","6","0","2","0","0","0000-00-00 00:00:00","","2018-04-11 15:10:18","2");
INSERT INTO `stock_entries` VALUES("118","5","0","50","0","0","0000-00-00 00:00:00","","2018-04-11 15:10:18","2");
INSERT INTO `stock_entries` VALUES("119","1","0","4","0","0","0000-00-00 00:00:00","","2018-04-11 15:20:15","2");
INSERT INTO `stock_entries` VALUES("120","1","0","2","0","0","0000-00-00 00:00:00","","2018-04-11 15:31:19","2");
INSERT INTO `stock_entries` VALUES("121","1","0","1","0","0","0000-00-00 00:00:00","","2018-04-11 16:13:43","2");
INSERT INTO `stock_entries` VALUES("122","1","0","7","0","0","0000-00-00 00:00:00","","2018-04-12 11:49:13","2");
INSERT INTO `stock_entries` VALUES("123","1","0","2","0","0","0000-00-00 00:00:00","","2018-04-12 12:23:54","2");
INSERT INTO `stock_entries` VALUES("124","1","0","4","0","0","0000-00-00 00:00:00","","2018-04-13 11:31:48","2");
INSERT INTO `stock_entries` VALUES("125","1","0","1","0","0","0000-00-00 00:00:00","","2018-04-13 11:33:32","2");
INSERT INTO `stock_entries` VALUES("126","1","0","2","0","0","0000-00-00 00:00:00","","2018-04-13 16:29:13","2");
INSERT INTO `stock_entries` VALUES("127","1","0","2","0","0","0000-00-00 00:00:00","","2018-04-16 11:24:34","2");
INSERT INTO `stock_entries` VALUES("128","1","0","2","0","0","0000-00-00 00:00:00","","2018-04-16 11:44:10","2");
INSERT INTO `stock_entries` VALUES("129","1","0","2","0","0","0000-00-00 00:00:00","","2018-04-16 12:13:08","2");
INSERT INTO `stock_entries` VALUES("130","1","0","2","0","0","0000-00-00 00:00:00","","2018-04-16 17:17:44","2");
INSERT INTO `stock_entries` VALUES("131","7","0","10","0","0","0000-00-00 00:00:00","","2018-04-23 17:32:59","2");
INSERT INTO `stock_entries` VALUES("132","6","0","2","0","0","0000-00-00 00:00:00","","2018-04-23 17:32:59","2");
INSERT INTO `stock_entries` VALUES("133","5","0","50","0","0","0000-00-00 00:00:00","","2018-04-23 17:32:59","2");
INSERT INTO `stock_entries` VALUES("134","1","0","18","0","0","0000-00-00 00:00:00","","2018-04-23 17:32:59","2");
INSERT INTO `stock_entries` VALUES("135","1","0","2","0","0","0000-00-00 00:00:00","","2018-04-26 11:31:35","2");
INSERT INTO `stock_entries` VALUES("136","1","0","1","0","0","0000-00-00 00:00:00","","2018-05-15 16:51:40","2");
INSERT INTO `stock_entries` VALUES("137","1","0","1","0","0","0000-00-00 00:00:00","","2018-06-04 14:23:51","2");
INSERT INTO `stock_entries` VALUES("138","1","0","1","0","0","0000-00-00 00:00:00","","2018-08-31 11:08:59","2");
INSERT INTO `stock_entries` VALUES("139","1","10","0","0","0","0000-00-00 00:00:00","","2018-11-16 09:32:11","2");
INSERT INTO `stock_entries` VALUES("140","1","0","5","0","0","0000-00-00 00:00:00","","2018-11-16 09:44:22","2");
INSERT INTO `stock_entries` VALUES("141","1","0","1","0","0","0000-00-00 00:00:00","","2018-11-21 09:29:01","2");
INSERT INTO `stock_entries` VALUES("142","1","0","0","0","165","2018-11-21 09:47:22","rtyu","2018-11-21 09:47:22","2");
INSERT INTO `stock_entries` VALUES("143","1","0","1","0","0","0000-00-00 00:00:00","","2018-12-11 10:16:59","2");
INSERT INTO `stock_entries` VALUES("144","1","0","1","0","0","0000-00-00 00:00:00","","2018-12-11 10:17:56","2");
INSERT INTO `stock_entries` VALUES("145","1","0","2","0","0","0000-00-00 00:00:00","","2018-12-11 10:18:12","2");
INSERT INTO `stock_entries` VALUES("146","2","0","0","0","-20","2019-02-21 14:13:46","dfhlk;jjhgcjgxgdfbnbbvvbnbv","2019-02-21 14:13:46","2");
INSERT INTO `stock_entries` VALUES("147","2","0","0","0","-30","2019-02-21 14:14:42","test","2019-02-21 14:14:42","2");



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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `stock_items` VALUES("1","4","stock item 1","0","1","1","2017-04-13 11:33:07","2");
INSERT INTO `stock_items` VALUES("2","4","stock item 2","1000","0","1","2017-04-13 11:33:18","2");
INSERT INTO `stock_items` VALUES("3","4","stock item 3","500","1","1","2017-04-13 11:33:31","2");
INSERT INTO `stock_items` VALUES("4","4","stock item 4","1000","0","1","2017-04-13 11:33:47","2");
INSERT INTO `stock_items` VALUES("5","4","stock item 5","200","0","1","2017-04-13 11:34:00","2");
INSERT INTO `stock_items` VALUES("6","4","stock item 6","100","1","1","2017-04-13 11:34:10","2");
INSERT INTO `stock_items` VALUES("7","5","stock item 7","100","2","1","2017-05-23 12:29:50","2");
INSERT INTO `stock_items` VALUES("8","4","Stock Item 9","1000","0","1","2017-05-23 16:11:43","2");
INSERT INTO `stock_items` VALUES("9","4","stock item 8","1000","0","1","2017-05-23 16:11:48","2");
INSERT INTO `stock_items` VALUES("10","1","stock item 10","1000","1","1","2017-06-20 17:42:01","2");
INSERT INTO `stock_items` VALUES("11","4","stock item 20 ml","1000","0","1","2017-07-31 11:33:07","2");
INSERT INTO `stock_items` VALUES("12","1","testasdfasdfasdf","12","1","1","2017-12-25 13:55:48","2");



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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

INSERT INTO `table_details` VALUES("1","Table - 1","1","1","0","2017-12-12 12:23:30","2017-12-12 12:23:30","2","8.43133","2.99212","15.8295","15.3734","","0","0");
INSERT INTO `table_details` VALUES("2","Table - 2","2","1","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","47.1587","3.09556","15.8295","11.7862","[\"1\"]","0","0");
INSERT INTO `table_details` VALUES("3","Table - 3","3","1","1","0000-00-00 00:00:00","0000-00-00 00:00:00","2","0","37.2326","17.0472","7.54026","","0","0");
INSERT INTO `table_details` VALUES("4","Table - 4","4","1","0","2017-12-18 11:56:37","2017-12-18 11:56:37","2","0","2.7767","32.2679","7.54026","","0","0");
INSERT INTO `table_details` VALUES("5","Table - 5","5","1","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","25.6302","40.2706","15.8295","9.0776","","0","0");
INSERT INTO `table_details` VALUES("6","Table - 6","6","1","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","60.4823","3.22312","15.6773","9.51684","","0","0");
INSERT INTO `table_details` VALUES("7","Table - 7","7","2","0","2017-05-23 12:51:51","2017-05-23 12:51:51","2","15.0555","112.238","17.3516","8.05271","","0","0");
INSERT INTO `table_details` VALUES("8","Table - 8","8","2","1","0000-00-00 00:00:00","0000-00-00 00:00:00","2","32.1875","106.04","12.9754","8.04688","","0","0");
INSERT INTO `table_details` VALUES("9","Table - 9","9","2","1","0000-00-00 00:00:00","0000-00-00 00:00:00","2","50.1242","111.756","17.2414","8.05153","","0","0");
INSERT INTO `table_details` VALUES("10","Table - 10","10","2","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","8.52057","137.635","15.6986","8.05271","","0","0");
INSERT INTO `table_details` VALUES("11","Table - 11","11","2","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","57.657","139.511","15.1057","8.05271","","0","0");
INSERT INTO `table_details` VALUES("12","table - 12","12","2","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","11.3253","165.856","15.674","8.05271","","0","0");
INSERT INTO `table_details` VALUES("13","Table - 13","13","2","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","53.729","166.538","15.1057","8.05271","","0","0");
INSERT INTO `table_details` VALUES("14","Table - 14","14","1","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","0.158996","56.9099","15.6986","7.54026","","0","0");
INSERT INTO `table_details` VALUES("15","Table - 15","15","1","0","2018-11-16 09:46:12","2018-11-16 09:46:12","2","35.5189","3.28444","15.8295","9.80966","","0","0");
INSERT INTO `table_details` VALUES("16","Table - 16","16","2","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","21.5772","141.207","15.8479","8.05271","","0","0");
INSERT INTO `table_details` VALUES("17","Table - 17","17","2","0","2017-07-17 15:06:09","2017-07-17 15:06:09","2","2.65612","112.931","15.6986","8.05271","","0","0");
INSERT INTO `table_details` VALUES("18","Table - 18","18","3","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","9.01554","223.793","17.2414","8.05153","","0","1");
INSERT INTO `table_details` VALUES("19","Table - 19","19","1","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","72.5464","38.4385","15.8295","8.05271","","0","0");
INSERT INTO `table_details` VALUES("20","Table - 20","20","1","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","24.7518","2.94187","15.8295","9.29722","[]","0","0");
INSERT INTO `table_details` VALUES("21","Table - 21","21","1","1","0000-00-00 00:00:00","0000-00-00 00:00:00","2","46.3385","38.7604","15.8295","8.49195","","0","0");
INSERT INTO `table_details` VALUES("22","Table - 22","22","1","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","24.8902","21.0998","15.8295","9.0776","","0","0");
INSERT INTO `table_details` VALUES("23","Table - 23","23","1","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","8.4153","19.9391","15.2207","8.05271","","0","0");
INSERT INTO `table_details` VALUES("24","Table - 24","24","1","1","0000-00-00 00:00:00","0000-00-00 00:00:00","2","15.1537","51.9026","15.2207","8.05271","","0","0");
INSERT INTO `table_details` VALUES("25","Table - 25","25","2","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","41.8444","132.877","22.07","13.3236","","0","0");
INSERT INTO `table_details` VALUES("26","Table - 26","26","1","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","36.0908","62.4049","13.0898","8.05271","","0","0");
INSERT INTO `table_details` VALUES("27","Table - 27","27","1","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","54.7584","59.3607","13.0898","8.05271","","0","0");
INSERT INTO `table_details` VALUES("28","Table - 28","28","2","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","69.7657","111.111","13.0898","8.05271","","0","0");
INSERT INTO `table_details` VALUES("29","Table - 29","29","3","1","2018-12-04 09:59:28","2018-12-04 09:59:28","2","5.41728","200","13.0898","8.05271","","0","0");
INSERT INTO `table_details` VALUES("30","Table - 30","30","1","1","0000-00-00 00:00:00","0000-00-00 00:00:00","2","10.6149","70.4718","15.2207","8.05271","","0","0");
INSERT INTO `table_details` VALUES("31","Table - 31","31","1","1","0000-00-00 00:00:00","0000-00-00 00:00:00","2","59.3693","38.2825","15.2207","8.05271","","0","0");



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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `take_away` VALUES("1","","0","","","2018-01-11 10:58:00","2","1","0");
INSERT INTO `take_away` VALUES("2","","0","","","2018-04-24 12:04:51","2","1","0");
INSERT INTO `take_away` VALUES("3","sugen","98989898","lazimpat","","2018-06-04 14:22:10","2","1","0");
INSERT INTO `take_away` VALUES("4","","0","","","2018-06-04 14:24:14","2","1","0");
INSERT INTO `take_away` VALUES("5","","0","","","2018-06-13 11:39:33","2","1","2");
INSERT INTO `take_away` VALUES("6","","0","","","2018-06-21 14:42:32","2","1","0");
INSERT INTO `take_away` VALUES("7","","0","","","2018-08-31 11:11:27","2","1","0");
INSERT INTO `take_away` VALUES("8","","0","","","2018-09-21 16:50:16","2","0","0");
INSERT INTO `take_away` VALUES("9","","0","","","2018-11-15 14:50:28","2","0","0");
INSERT INTO `take_away` VALUES("10","","0","","","2018-11-16 09:54:25","2","0","0");
INSERT INTO `take_away` VALUES("11","","0","","","2018-12-04 10:16:41","2","0","0");
INSERT INTO `take_away` VALUES("12","","0","","","2019-02-19 13:36:31","2","0","0");



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
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

INSERT INTO `temp_items` VALUES("4","0","0","1","0","0","1","1","180","0");
INSERT INTO `temp_items` VALUES("5","0","0","1","0","0","2","1","200","0");
INSERT INTO `temp_items` VALUES("6","0","0","1","0","0","4","1","75","0");
INSERT INTO `temp_items` VALUES("13","0","0","4","0","0","1","1","180","0");
INSERT INTO `temp_items` VALUES("14","0","0","4","0","0","2","1","200","0");
INSERT INTO `temp_items` VALUES("15","0","0","4","0","0","4","1","75","0");
INSERT INTO `temp_items` VALUES("16","0","0","4","0","0","32","1","200","0");
INSERT INTO `temp_items` VALUES("17","0","0","5","0","0","1","1","180","0");
INSERT INTO `temp_items` VALUES("18","0","0","5","0","0","2","1","200","0");
INSERT INTO `temp_items` VALUES("19","0","0","6","0","0","1","1","180","0");
INSERT INTO `temp_items` VALUES("23","33","0","0","0","0","1","1","180","0");
INSERT INTO `temp_items` VALUES("24","33","0","0","0","0","2","1","200","0");
INSERT INTO `temp_items` VALUES("25","33","0","0","0","0","4","1","75","0");
INSERT INTO `temp_items` VALUES("29","35","0","0","0","0","6","1","100","0");
INSERT INTO `temp_items` VALUES("30","35","0","0","0","0","3","1","50","0");
INSERT INTO `temp_items` VALUES("31","35","0","0","0","0","5","1","125","0");
INSERT INTO `temp_items` VALUES("32","35","0","0","0","0","33","1","150","0");
INSERT INTO `temp_items` VALUES("33","35","0","0","0","0","36","1","123","0");
INSERT INTO `temp_items` VALUES("34","0","0","2","0","0","1","1","180","0");
INSERT INTO `temp_items` VALUES("35","0","0","2","0","0","2","1","200","0");
INSERT INTO `temp_items` VALUES("42","0","0","8","0","0","1","3","180","0");
INSERT INTO `temp_items` VALUES("48","40","0","0","0","0","2","1","200","0");
INSERT INTO `temp_items` VALUES("50","41","0","0","0","0","2","1","200","0");
INSERT INTO `temp_items` VALUES("51","41","0","0","0","0","4","1","75","0");
INSERT INTO `temp_items` VALUES("52","0","3","0","0","0","1","1","180","0");
INSERT INTO `temp_items` VALUES("55","44","0","0","0","0","1","1","180","0");
INSERT INTO `temp_items` VALUES("56","44","0","0","0","0","2","1","200","0");
INSERT INTO `temp_items` VALUES("57","44","0","0","0","0","4","1","75","0");
INSERT INTO `temp_items` VALUES("58","45","0","0","0","0","1","1","180","0");
INSERT INTO `temp_items` VALUES("59","45","0","0","0","0","2","1","200","0");
INSERT INTO `temp_items` VALUES("60","45","0","0","0","0","4","1","75","0");
INSERT INTO `temp_items` VALUES("61","45","0","0","0","0","11","1","100","0");
INSERT INTO `temp_items` VALUES("62","45","0","0","0","0","13","1","50","0");
INSERT INTO `temp_items` VALUES("63","0","0","0","0","5","1","1","180","0");



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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `temp_order_list` VALUES("6","41","0","0","0","0","1","1","200","1");



DROP TABLE IF EXISTS tips;

CREATE TABLE `tips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` float NOT NULL,
  `type` tinyint(1) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `tips` VALUES("1","200","0","2017-04-13 14:54:14","2");
INSERT INTO `tips` VALUES("2","50","1","2017-04-13 14:55:52","2");
INSERT INTO `tips` VALUES("3","20","1","2017-04-19 14:33:48","2");
INSERT INTO `tips` VALUES("4","100","1","2017-09-13 10:58:27","2");



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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `user` VALUES("1","Super Admin","","0","0","","0","superadmin","$2y$13$zNgfxhx1KILBSqPSy2G0n.AWRmCt4DQojmDuiQcTlYuYoB38E8fUS","5VmLKVrUUGUPgnXEp9IuqaVdk7pXQxXK","","","","100","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","78380218ec20ce96a11460da7c0c58ca");
INSERT INTO `user` VALUES("2","Administrator","Kathmandu","9801116771","15639419","gaurav@klientscape.com","user-profile-pic_1494500116.jpg","administrator","$2y$13$b8jIHLAva0J3ukLP5mcCx.qETPq6aqhTseOyGA0HUKF4QiKRpVore","kAdzZNRkmZu6RbNfz3L4fTEdtfrWWb6h","Owner","p7K4ZugASjo=","%!4Txj)p","90","1","2016-08-25 06:49:46","1","2017-12-08 13:14:13","83eb4da9fffc7a333e82d25fd13da293");
INSERT INTO `user` VALUES("5","Dinesh Prajapati","thimi","9801116780","0","dinesh@klientscape.com","0","staff","$2y$13$38ZLZVJacCDv8seaHZJiU.0ec0jseBkuyHTuPZyd8M7w7O3KYQGre","1P863mId6OnFEhCCD9zdkH9O5n7h6Kj7","web developer","A8gtUstg4RI=","iDzZY[(E","20","1","2016-09-13 14:24:32","2","2017-02-27 13:24:34","3e52fc67dbf227291d5e8a68ae6aa923");
INSERT INTO `user` VALUES("6","sugen","lazimpat","9810110011","0","sugen@gmail.com","","sugen","$2y$13$jqYJUULa47WjQhDAtrw72uMpqawVHMkVYuG1/vYllQXYXDzG4GAMm","naQhEJ9I1yLYtN1ppQF6YtN1ppQF6asd","web developer","YVeSpbqHIwI=","gc-tBp{A","5","1","2017-01-04 15:36:09","2","2018-09-21 12:00:42","546f875415923dede99a77bb9bcce983");
INSERT INTO `user` VALUES("7","Promish","bishalnagar","9801110011","0","promish@gmail.com","","promish","$2y$13$YANvx9YA.yNyNwaaO6fQMeQsl3VQbttKfhs65/o69MVv9k3kyDodu","1P863mId6OnFEhCCD9zdkH9O5n7h6Kj7","Designer","osfU97qXUTY=","z@bdpui0","50","1","2017-03-09 10:40:06","2","0000-00-00 00:00:00","");
INSERT INTO `user` VALUES("8","demo","demo","9898989898","0","demo@demo.com","","demo","$2y$13$ZsFbsWFnYSputlrvL.6WPukoq.iTTATQaqqM/4XCIuJusSSu.sar.","kAdzZNRkmZu6RbNfz3L4fTEdtfrWWb6h","admin","bVLyMB/Mdkg=","78aY-]t$","10","1","2018-11-26 13:50:45","2","0000-00-00 00:00:00","");



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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

INSERT INTO `utensils_stock_entries` VALUES("6","5","10","0","1","0","0000-00-00 00:00:00","","2017-05-22 17:42:35","2");
INSERT INTO `utensils_stock_entries` VALUES("7","6","15","0","1","0","0000-00-00 00:00:00","","2017-05-22 17:42:35","2");
INSERT INTO `utensils_stock_entries` VALUES("8","7","5","0","1","0","0000-00-00 00:00:00","","2017-05-22 17:42:35","2");
INSERT INTO `utensils_stock_entries` VALUES("9","8","20","0","1","0","0000-00-00 00:00:00","","2017-05-22 17:42:36","2");
INSERT INTO `utensils_stock_entries` VALUES("10","5","0","0","0","5","2017-05-22 17:42:52","asdfasdf asdf ","2017-05-22 17:42:52","2");
INSERT INTO `utensils_stock_entries` VALUES("11","5","0","0","0","1","2017-05-23 12:24:10","asdfjlk","2017-05-23 12:24:10","2");
INSERT INTO `utensils_stock_entries` VALUES("12","9","10","0","1","0","0000-00-00 00:00:00","","2017-05-23 12:25:35","2");
INSERT INTO `utensils_stock_entries` VALUES("13","10","2","0","1","0","0000-00-00 00:00:00","","2017-05-23 12:25:35","2");
INSERT INTO `utensils_stock_entries` VALUES("14","11","5","0","1","0","0000-00-00 00:00:00","","2017-05-23 12:25:35","2");
INSERT INTO `utensils_stock_entries` VALUES("15","5","0","0","0","-1","2017-05-23 13:08:48","Fork damage due to trolley.","2017-05-23 13:08:48","2");
INSERT INTO `utensils_stock_entries` VALUES("16","5","0","0","0","5","2017-05-23 16:16:14","Bought 5 utensils item 1","2017-05-23 16:16:14","2");
INSERT INTO `utensils_stock_entries` VALUES("17","12","50","0","1","0","0000-00-00 00:00:00","","2017-07-19 10:48:55","2");
INSERT INTO `utensils_stock_entries` VALUES("18","13","10","0","1","0","0000-00-00 00:00:00","","2018-11-16 09:33:43","2");
INSERT INTO `utensils_stock_entries` VALUES("19","14","10","0","1","0","0000-00-00 00:00:00","","2018-11-16 09:33:43","2");
INSERT INTO `utensils_stock_entries` VALUES("20","15","100","0","1","0","0000-00-00 00:00:00","","2018-12-04 09:49:04","2");
INSERT INTO `utensils_stock_entries` VALUES("21","16","12","0","1","0","0000-00-00 00:00:00","","2018-12-04 09:49:04","2");
INSERT INTO `utensils_stock_entries` VALUES("22","5","0","0","0","-1","2018-12-04 09:50:27","ewrtyuio;&#039;;ljkhj","2018-12-04 09:50:27","2");



DROP TABLE IF EXISTS utensils_stock_items;

CREATE TABLE `utensils_stock_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO `utensils_stock_items` VALUES("5","utensils item 1","10","1","2017-05-22 17:42:35","2");
INSERT INTO `utensils_stock_items` VALUES("6","utensils item 2","15","1","2017-05-22 17:42:35","2");
INSERT INTO `utensils_stock_items` VALUES("7","utensils item 3","5","1","2017-05-22 17:42:35","2");
INSERT INTO `utensils_stock_items` VALUES("8","utensils item 4","20","1","2017-05-22 17:42:35","2");
INSERT INTO `utensils_stock_items` VALUES("9","item 1","10","1","2017-05-23 12:25:35","2");
INSERT INTO `utensils_stock_items` VALUES("10","item  2","2","1","2017-05-23 12:25:35","2");
INSERT INTO `utensils_stock_items` VALUES("11","item 3","5","1","2017-05-23 12:25:35","2");
INSERT INTO `utensils_stock_items` VALUES("12","test","50","1","2017-07-19 10:48:55","2");
INSERT INTO `utensils_stock_items` VALUES("13","plate","10","1","2018-11-16 09:33:42","2");
INSERT INTO `utensils_stock_items` VALUES("14","spoon","10","1","2018-11-16 09:33:43","2");
INSERT INTO `utensils_stock_items` VALUES("15","sdfhkl","100","1","2018-12-04 09:49:04","2");
INSERT INTO `utensils_stock_items` VALUES("16","dsfghjhkl","12","1","2018-12-04 09:49:04","2");



