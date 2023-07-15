DROP TABLE audit_log;

CREATE TABLE `audit_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) NOT NULL,
  `action` text NOT NULL,
  `type` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=793 DEFAULT CHARSET=latin1;

INSERT INTO `audit_log` VALUES("1","2","Floor has been added","table","2017-04-13 10:38:35");
INSERT INTO `audit_log` VALUES("2","2","New table has been created named Table - 1","table","2017-04-13 10:38:49");
INSERT INTO `audit_log` VALUES("3","2","Table \'<b>Table - 1</b>\' has been occupied ","table","2017-04-13 10:38:53");
INSERT INTO `audit_log` VALUES("4","2","New menu category has been created named -food item","menu","2017-04-13 10:44:12");
INSERT INTO `audit_log` VALUES("5","2","New menu category has been created named -hot breverage","menu","2017-04-13 10:44:39");
INSERT INTO `audit_log` VALUES("6","2","New menu category has been created named -cold breverage","menu","2017-04-13 10:44:48");
INSERT INTO `audit_log` VALUES("7","2","Menu item has been added","menu","2017-04-13 10:49:13");
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



DROP TABLE booked_tables;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `booked_tables` VALUES("1","asdf","123123123","2","1","1","2017-04-17","01:00:00","02:00:00","2017-04-17 01:00:00","1","2017-04-17 17:42:45","2","2017-04-17 17:42:45","2");
INSERT INTO `booked_tables` VALUES("2","qwer","123123123","1","0","0","2017-04-17","10:00:00","11:00:00","2017-04-17 10:00:00","0","2017-04-17 17:51:32","2","2017-04-17 17:51:32","2");
INSERT INTO `booked_tables` VALUES("3","test123","9845478569","3","7","2","2017-05-23","12:45:00","14:00:00","2017-05-23 12:45:00","0","2017-05-23 12:51:51","2","2017-05-23 12:51:51","2");



DROP TABLE break_down_items;

CREATE TABLE `break_down_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `break_down_receipt_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

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



DROP TABLE break_down_receipt;

CREATE TABLE `break_down_receipt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `occupy_id` int(11) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

INSERT INTO `break_down_receipt` VALUES("1","1","1","0","0","0","0","Cash Customer","0","0","0","0","0","0","0","0","114","0","114","0","0","0","0","","0","0","0","3","2017-04-20 13:25:02","2");
INSERT INTO `break_down_receipt` VALUES("2","2","2","0","0","0","0","Cash Customer","100","0","0","10","10","110","13","14.3","124","-0.3","0","0","0","0","0","","0","0","0","2","2017-04-20 14:05:26","2");
INSERT INTO `break_down_receipt` VALUES("3","3","2","0","0","0","0","Cash Customer","0","0","0","0","0","0","0","0","373","0","373","0","0","0","0","","0","0","0","3","2017-04-20 14:07:29","2");
INSERT INTO `break_down_receipt` VALUES("4","4","9","0","0","0","0","Cash Customer","200","0","0","10","20","220","13","28.6","249","0.4","0","0","0","0","0","","0","0","0","2","2017-04-20 16:45:03","2");
INSERT INTO `break_down_receipt` VALUES("5","5","9","0","0","0","0","Cash Customer","0","0","0","0","0","0","0","0","124","0","124","0","0","0","0","","0","0","0","3","2017-04-20 16:45:15","2");
INSERT INTO `break_down_receipt` VALUES("6","6","12","0","0","0","0","Asdf","0","0","0","0","0","0","0","0","87","0","87","0","0","0","0","","0","0","0","3","2017-04-20 17:07:13","2");
INSERT INTO `break_down_receipt` VALUES("7","7","11","0","0","0","0","Asdf","0","0","0","0","0","0","0","0","746","0","746","0","0","0","0","","0","0","0","3","2017-04-20 17:07:14","2");
INSERT INTO `break_down_receipt` VALUES("8","8","14","0","0","0","0","Asdf","0","0","0","0","0","0","0","0","200","0","200","0","0","0","0","","0","0","0","3","2017-04-20 17:08:57","2");
INSERT INTO `break_down_receipt` VALUES("9","9","13","0","0","0","0","Asdf","0","0","0","0","0","0","0","0","249","0","249","0","0","0","0","","0","0","0","3","2017-04-20 17:08:58","2");
INSERT INTO `break_down_receipt` VALUES("10","10","16","0","0","0","0","Asdfasdf","43.5","0","0","0","0","43.5","13","6.5","50","0","50","0","0","0","0","","0","0","0","3","2017-04-20 17:15:33","2");
INSERT INTO `break_down_receipt` VALUES("11","11","15","0","0","0","0","Asdfasdf","0","0","0","0","0","0","0","0","622","0","622","0","0","0","0","","0","0","0","3","2017-04-20 17:15:33","2");
INSERT INTO `break_down_receipt` VALUES("12","12","17","0","0","0","0","Sugen","200","0","0","10","20","220","13","28.6","249","0.4","0","0","0","0","0","","1","0","1","2","2017-04-21 08:22:33","2");
INSERT INTO `break_down_receipt` VALUES("13","13","17","0","0","0","0","Cash Customer","0","0","0","0","0","0","0","0","497","0","497","0","0","0","0","","0","0","0","3","2017-04-21 08:22:46","2");
INSERT INTO `break_down_receipt` VALUES("14","14","18","0","0","0","0","Sugen","400","0","0","10","40","440","13","57.2","497","-0.2","0","0","0","0","0","","1","0","1","2","2017-04-21 08:23:47","2");
INSERT INTO `break_down_receipt` VALUES("15","15","18","0","0","0","0","Cash Customer","0","0","0","0","0","0","0","0","249","0","249","0","0","0","0","","0","0","0","3","2017-04-21 08:23:56","2");
INSERT INTO `break_down_receipt` VALUES("16","16","19","0","0","0","0","Cash Customer","0","0","0","0","0","0","0","0","497","0","497","0","0","0","0","","0","0","0","3","2017-04-21 08:34:04","2");
INSERT INTO `break_down_receipt` VALUES("20","17","22","0","0","0","0","Cash Customer","100","0","0","10","10","110","13","14.3","124","-0.3","0","0","0","0","0","","0","0","0","2","2017-04-23 16:54:12","2");
INSERT INTO `break_down_receipt` VALUES("21","18","22","0","0","0","0","Cash Customer","0","0","0","0","0","0","0","0","373","0","373","0","0","0","0","","0","0","0","3","2017-04-23 17:05:04","2");
INSERT INTO `break_down_receipt` VALUES("22","19","23","0","0","0","0","Sugen","200","0","0","10","20","220","13","28.6","249","0.4","0","0","0","0","0","","1","0","1","2","2017-04-23 17:05:34","2");
INSERT INTO `break_down_receipt` VALUES("23","20","23","0","0","0","0","Cash Customer","100","0","0","10","10","110","13","14.3","124","-0.3","0","0","0","0","0","","0","0","0","2","2017-04-23 17:05:50","2");
INSERT INTO `break_down_receipt` VALUES("24","21","23","0","0","0","0","Cash Customer","0","0","0","0","0","0","0","0","124","0","124","0","0","0","0","","0","0","0","3","2017-04-23 17:06:04","2");
INSERT INTO `break_down_receipt` VALUES("25","22","24","0","0","0","0","Cash Customer","200","0","0","10","20","220","13","28.6","249","0.4","0","0","0","0","0","","0","0","0","2","2017-04-23 17:17:05","2");
INSERT INTO `break_down_receipt` VALUES("26","23","24","0","0","0","0","sugen","0","0","0","0","0","0","0","0","248","0","0","0","0","0","0","","1","0","1","4","2017-04-23 17:17:18","2");
INSERT INTO `break_down_receipt` VALUES("27","24","25","0","0","0","0","Cash Customer","200","0","0","10","20","220","13","28.6","249","0.4","0","0","0","0","0","","0","0","0","2","2017-04-23 17:32:20","2");
INSERT INTO `break_down_receipt` VALUES("28","25","25","0","0","0","0","sugen","0","0","0","0","0","0","0","0","745","0","0","0","0","0","0","","1","0","1","4","2017-04-23 17:32:34","2");
INSERT INTO `break_down_receipt` VALUES("29","26","26","0","0","0","0","Sugen","100","0","0","10","10","110","13","14.3","124","-0.3","0","0","0","0","0","","1","0","1","2","2017-04-23 18:20:18","2");
INSERT INTO `break_down_receipt` VALUES("30","27","26","0","0","0","0","Cash Customer","0","0","0","0","0","0","0","0","373","0","373","0","0","0","0","","0","0","0","3","2017-04-23 18:20:27","2");
INSERT INTO `break_down_receipt` VALUES("31","28","27","0","0","0","0","Cash Customer","200","0","0","10","20","220","13","28.6","249","0.4","0","0","0","0","0","","0","0","0","2","2017-04-23 18:21:49","2");
INSERT INTO `break_down_receipt` VALUES("32","29","27","0","0","0","0","sugen","0","0","0","0","0","0","0","0","248","0","0","0","0","0","0","","1","0","1","4","2017-04-23 18:22:03","2");
INSERT INTO `break_down_receipt` VALUES("65","30","50","0","0","0","0","Cash Customer","0","0","0","0","0","0","0","0","100","0","0","0","0","0","0","","0","0","0","1","2017-04-24 17:04:41","2");
INSERT INTO `break_down_receipt` VALUES("66","31","50","0","0","0","0","Cash Customer","100","0","0","10","10","110","13","14.3","124","-0.3","0","0","0","0","0","","0","0","0","2","2017-04-24 17:04:53","2");
INSERT INTO `break_down_receipt` VALUES("67","32","50","0","0","0","0","Cash Customer","400","0","0","10","40","440","13","57.2","273","0","497","0","0","0","0","","0","0","0","3","2017-04-24 17:07:31","2");
INSERT INTO `break_down_receipt` VALUES("68","33","51","0","0","0","0","Cash Customer","0","0","0","0","0","0","0","0","100","0","0","0","0","0","0","","0","0","0","1","2017-04-25 08:12:00","2");
INSERT INTO `break_down_receipt` VALUES("69","34","51","0","0","0","0","Cash Customer","100","0","0","10","10","110","13","14.3","124","-0.3","0","0","0","0","0","","0","0","0","2","2017-04-25 08:12:16","2");
INSERT INTO `break_down_receipt` VALUES("70","35","51","0","0","0","0","Cash Customer","500","0","0","10","50","550","13","71.5","398","0","622","0","0","0","0","","0","0","0","3","2017-04-25 08:12:26","2");
INSERT INTO `break_down_receipt` VALUES("71","36","52","0","0","0","0","Cash Customer","100","0","0","10","10","110","13","14.3","124","-0.3","0","0","0","0","0","","0","0","0","2","2017-04-25 08:13:24","2");
INSERT INTO `break_down_receipt` VALUES("72","37","52","0","0","0","0","Sugen","400","0","0","10","40","440","13","57.2","497","0","0","0","0","0","0","","1","0","1","4","2017-04-25 08:13:35","2");
INSERT INTO `break_down_receipt` VALUES("73","38","54","0","0","0","0","Cash Customer","100","0","0","10","10","110","13","14.3","124","-0.3","0","0","0","0","0","","0","0","0","2","2017-04-25 08:24:15","2");
INSERT INTO `break_down_receipt` VALUES("74","39","54","0","0","0","0","Sugen","400","0","0","10","40","440","13","57.2","497","0","0","0","0","0","0","","1","0","1","4","2017-04-25 08:24:27","2");
INSERT INTO `break_down_receipt` VALUES("75","40","57","0","0","0","0","Sugen","200","0","0","10","20","220","13","28.6","249","0.4","0","0","0","0","0","","1","0","1","2","2017-04-25 08:39:34","2");
INSERT INTO `break_down_receipt` VALUES("76","41","57","0","0","0","0","Cash Customer","100","0","0","10","10","110","13","14.3","124","-0.3","0","0","0","0","0","","0","0","0","2","2017-04-25 08:39:45","2");
INSERT INTO `break_down_receipt` VALUES("77","42","57","0","0","0","0","Sugen","400","0","0","10","40","440","13","57.2","497","0","0","0","0","0","0","","1","0","1","4","2017-04-25 08:39:56","2");
INSERT INTO `break_down_receipt` VALUES("78","43","60","0","0","0","0","Cash Customer","600","0","0","10","60","660","13","85.8","746","0","746","0","0","0","0","","0","0","0","3","2017-04-27 10:55:02","2");
INSERT INTO `break_down_receipt` VALUES("79","44","61","0","0","0","0","Cash Customer","350","0","0","10","35","385","13","50.05","435","0","435","0","0","0","0","","0","0","0","3","2017-04-27 10:55:56","2");
INSERT INTO `break_down_receipt` VALUES("80","45","62","0","0","0","0","Cash Customer","200","0","0","10","20","220","13","28.6","249","0","249","0","0","0","0","","0","0","0","3","2017-04-27 10:58:07","2");
INSERT INTO `break_down_receipt` VALUES("81","46","63","0","0","0","0","Sugen","200","0","0","10","20","220","13","28.6","249","0","0","0","0","0","0","","1","0","1","4","2017-05-15 12:36:33","2");
INSERT INTO `break_down_receipt` VALUES("82","47","67","0","0","0","0","Cash Customer","1000","0","0","10","100","1100","13","143","1243","0","1243","0","0","0","0","","0","0","0","3","2017-05-15 16:20:54","2");
INSERT INTO `break_down_receipt` VALUES("83","48","68","0","0","0","0","Cash Customer","950","0","0","10","95","1045","13","135.85","1181","0","1181","0","0","0","0","","0","0","0","3","2017-05-15 16:20:58","2");
INSERT INTO `break_down_receipt` VALUES("84","49","69","0","0","0","0","Cash Customer","100","0","0","10","10","110","13","14.3","124","-0.3","0","0","0","0","0","","0","0","0","2","2017-05-15 16:21:56","2");
INSERT INTO `break_down_receipt` VALUES("85","50","69","0","0","0","0","Sugen","100","0","0","10","10","110","13","14.3","124","-0.3","0","0","0","0","0","","1","0","1","2","2017-05-15 16:22:17","2");
INSERT INTO `break_down_receipt` VALUES("86","51","69","0","0","0","0","Sugen","500","0","0","10","50","550","13","71.5","622","0","0","0","0","0","0","","1","0","1","4","2017-05-15 16:22:32","2");
INSERT INTO `break_down_receipt` VALUES("87","52","70","0","0","0","0","Sugen","300","0","0","10","30","330","13","42.9","373","0","0","0","0","0","0","","1","0","1","4","2017-05-18 16:37:19","2");
INSERT INTO `break_down_receipt` VALUES("88","53","71","0","0","0","0","Cash Customer","200","0","0","10","20","220","13","28.6","249","0","249","0","0","0","0","","0","0","0","3","2017-05-18 16:37:36","2");
INSERT INTO `break_down_receipt` VALUES("89","54","73","0","0","0","0","Cash Customer","100","0","0","10","10","110","13","14.3","124","0","124","0","0","0","0","","0","0","0","3","2017-05-18 16:38:03","2");
INSERT INTO `break_down_receipt` VALUES("90","55","74","0","0","0","0","Dsfgdsfg","400","0","0","10","40","440","13","57.2","497","0","497","0","0","0","0","","0","0","0","3","2017-05-18 16:38:43","2");
INSERT INTO `break_down_receipt` VALUES("91","56","75","0","0","0","0","Sugen","300","0","0","10","30","330","13","42.9","373","0","0","0","0","0","0","","1","0","1","4","2017-05-18 16:39:33","2");
INSERT INTO `break_down_receipt` VALUES("92","57","76","0","0","0","0","Asdfasdf","300","0","0","10","30","330","13","42.9","373","0","373","0","0","0","0","","0","0","0","3","2017-05-18 16:41:24","2");
INSERT INTO `break_down_receipt` VALUES("93","58","77","0","0","0","0","Asdfasdf","69.6","0","0","0","0","69.6","13","10.4","80","0","80","0","0","0","0","","0","0","0","5","2017-05-18 16:41:32","2");
INSERT INTO `break_down_receipt` VALUES("94","59","78","0","0","0","0","Binit","100","0","0","10","10","110","13","14.3","124","0","0","0","0","0","0","","1","0","2","4","2017-05-23 12:05:56","2");
INSERT INTO `break_down_receipt` VALUES("95","60","79","0","0","0","0","Abhijeet","200","0","0","10","20","220","13","28.6","249","0.4","0","0","0","0","0","","1","0","3","2","2017-05-23 12:08:14","2");
INSERT INTO `break_down_receipt` VALUES("96","61","79","0","0","0","0","Cash Customer","0","0","0","0","0","0","0","0","100","0","1000","900","0","0","0","","0","0","0","1","2017-05-23 12:10:30","2");
INSERT INTO `break_down_receipt` VALUES("97","62","0","0","0","0","0","","0","0","0","0","0","0","0","0","249","0","0","0","0","1","0","","0","0","3","0","2017-05-23 12:22:00","2");
INSERT INTO `break_down_receipt` VALUES("98","63","80","0","0","0","0","Cash Customer","0","0","0","0","0","0","0","0","500","0","0","0","0","0","0","","0","0","0","1","2017-05-23 15:57:30","2");
INSERT INTO `break_down_receipt` VALUES("99","64","80","0","0","0","0","Cash Customer","100","0","0","10","10","110","13","14.3","124","-0.3","200","76","0","0","0","","0","0","0","2","2017-05-23 15:58:17","2");
INSERT INTO `break_down_receipt` VALUES("100","65","80","0","0","0","0","Sugen","600","0","0","10","60","660","13","85.8","746","0","0","0","0","0","0","","1","0","1","4","2017-05-23 15:59:14","2");
INSERT INTO `break_down_receipt` VALUES("101","66","93","0","0","0","0","Cash Customer","0","0","0","0","0","0","0","0","1000","0","0","0","0","0","0","","0","0","0","1","2017-05-23 16:05:40","2");
INSERT INTO `break_down_receipt` VALUES("102","67","93","0","0","0","0","Cash Customer","1300","0","0","10","130","1430","13","185.9","1616","0.1","1616","0","0","0","0","","0","0","0","2","2017-05-23 16:06:48","2");
INSERT INTO `break_down_receipt` VALUES("103","68","81","0","0","0","0","Sugen","200","0","0","10","20","220","13","28.6","249","0","0","0","0","0","0","","1","0","1","4","2017-05-31 12:42:06","2");
INSERT INTO `break_down_receipt` VALUES("104","69","82","0","0","0","0","Cash Customer","200","0","0","10","20","220","13","28.6","249","0","249","0","0","0","0","","0","0","0","3","2017-05-31 12:50:06","2");
INSERT INTO `break_down_receipt` VALUES("105","70","83","0","0","0","0","Cash Customer","200","0","0","10","20","220","13","28.6","249","0","249","0","0","0","0","","0","0","0","3","2017-05-31 12:50:32","2");
INSERT INTO `break_down_receipt` VALUES("106","71","84","0","0","0","0","Sugen","300","0","0","10","30","330","13","42.9","373","0","0","0","0","0","0","","1","0","1","4","2017-05-31 12:51:02","2");
INSERT INTO `break_down_receipt` VALUES("107","72","85","0","0","0","0","Asdfasdf","200","0","0","10","20","220","13","28.6","249","0","249","0","0","0","0","","0","0","0","3","2017-06-02 17:13:27","2");
INSERT INTO `break_down_receipt` VALUES("108","73","87","0","0","0","0","Cash Customer","100","0","0","10","10","110","13","14.3","124","0","124","0","0","0","0","","0","0","0","3","2017-06-21 15:35:09","2");
INSERT INTO `break_down_receipt` VALUES("109","74","88","0","0","0","0","Cash Customer","100","0","0","10","10","110","13","14.3","124","0","124","0","0","0","0","","0","0","0","3","2017-06-22 11:32:55","2");
INSERT INTO `break_down_receipt` VALUES("110","75","89","0","0","0","0","Cash Customer","100","0","0","10","10","110","13","14.3","124","0","124","0","0","0","0","","0","0","0","3","2017-06-22 11:33:38","2");
INSERT INTO `break_down_receipt` VALUES("111","76","90","0","0","0","0","Cash Customer","100","0","0","10","10","110","13","14.3","124","0","124","0","0","0","0","","0","0","0","3","2017-06-22 11:33:38","2");
INSERT INTO `break_down_receipt` VALUES("112","77","91","0","0","0","0","Asdfasdf","100","0","0","10","10","110","13","14.3","124","0","124","0","0","0","0","","0","0","0","3","2017-06-22 11:34:39","2");
INSERT INTO `break_down_receipt` VALUES("113","78","92","0","0","0","0","Asdfdsdf","100","0","0","10","10","110","13","14.3","124","0","124","0","0","0","0","","0","0","0","3","2017-06-22 11:34:55","2");
INSERT INTO `break_down_receipt` VALUES("114","79","93","0","0","0","0","Cash Customer","2600","0","0","10","260","2860","13","371.8","616","0","3232","0","0","0","0","","0","0","0","3","2017-06-22 11:35:06","2");
INSERT INTO `break_down_receipt` VALUES("115","80","94","0","0","0","0","Cash Customer","300","0","0","10","30","330","13","42.9","373","0","373","0","0","0","0","","0","0","0","3","2017-06-22 17:17:11","2");
INSERT INTO `break_down_receipt` VALUES("116","81","95","0","0","0","0","Cash Customer","150","0","0","10","15","165","13","21.45","186","0","186","0","0","0","0","","0","0","0","3","2017-06-22 17:17:12","2");
INSERT INTO `break_down_receipt` VALUES("117","82","96","0","0","0","0","Cash Customer","150","0","0","10","15","165","13","21.45","186","0","186","0","0","0","0","","0","0","0","3","2017-07-07 15:23:13","2");
INSERT INTO `break_down_receipt` VALUES("118","83","97","0","0","0","0","Sugen","100","0","0","10","10","110","13","14.3","124","0","0","0","0","0","0","","1","0","1","4","2017-07-07 15:28:08","2");
INSERT INTO `break_down_receipt` VALUES("119","84","98","0","0","0","0","Cash Customer","200","0","0","10","20","220","13","28.6","249","0","249","0","0","0","0","","0","0","0","3","2017-07-07 15:28:21","2");
INSERT INTO `break_down_receipt` VALUES("120","85","99","0","0","0","0","Cash Customer","100","0","0","10","10","110","13","14.3","124","0","124","0","0","0","0","","0","0","0","3","2017-07-07 15:33:47","2");
INSERT INTO `break_down_receipt` VALUES("121","86","100","0","0","0","0","Cash Customer","200","0","0","10","20","220","13","28.6","249","0","249","0","0","0","0","","0","0","0","3","2017-07-07 15:36:02","2");
INSERT INTO `break_down_receipt` VALUES("122","87","101","0","0","0","0","Cash Customer","400","0","0","10","40","440","13","57.2","497","0","497","0","0","0","0","","0","0","0","3","2017-07-07 15:37:50","2");
INSERT INTO `break_down_receipt` VALUES("123","88","102","0","0","0","0","Binit","200","0","0","10","20","220","13","28.6","249","0","0","0","0","0","0","","1","0","2","4","2017-07-07 15:43:33","2");
INSERT INTO `break_down_receipt` VALUES("124","89","103","0","0","0","0","Cash Customer","100","0","0","10","10","110","13","14.3","124","0","124","0","0","0","0","","0","0","0","3","2017-07-07 15:55:51","2");
INSERT INTO `break_down_receipt` VALUES("125","90","104","0","0","0","0","Cash Customer","550","0","0","10","55","605","13","78.66","684","0","684","0","0","0","0","","0","0","0","3","2017-07-07 17:25:13","2");
INSERT INTO `break_down_receipt` VALUES("126","91","105","0","0","0","0","","100","0","0","10","10","110","13","14.3","124","0","124","0","0","0","0","","0","0","0","3","2017-07-07 17:27:22","2");



DROP TABLE capacity;

CREATE TABLE `capacity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `capacity` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `capacity` VALUES("1","50","2017-04-13 10:34:43","2");



DROP TABLE close_day_log;

CREATE TABLE `close_day_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `close_day_log` VALUES("1","2017-06-08 16:49:23","2");
INSERT INTO `close_day_log` VALUES("2","2017-06-08 16:49:30","2");
INSERT INTO `close_day_log` VALUES("3","2017-06-08 16:49:37","2");
INSERT INTO `close_day_log` VALUES("4","2017-06-13 12:41:18","2");
INSERT INTO `close_day_log` VALUES("5","2017-06-13 12:43:46","2");



DROP TABLE debtors;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `debtors` VALUES("1","sugen","11991199","9819119911","lazimpat","8152","800","100","0","0000-00-00 00:00:00","2017-04-13 12:09:11","1");
INSERT INTO `debtors` VALUES("2","binit","0","0980001100","thapathali","373","0","0","-10000","0000-00-00 00:00:00","2017-05-16 15:35:53","1");
INSERT INTO `debtors` VALUES("3","abhijeet","0","983746583","bishalnagar","0","249","0","0","0000-00-00 00:00:00","2017-05-23 12:07:57","1");



DROP TABLE delivery;

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `delivery` VALUES("1","sugen","0","lazimpat","9819119911","2017-04-13 12:02:36","2","1","0");
INSERT INTO `delivery` VALUES("2","asdf","123","asdfasdf","123","2017-04-18 11:25:02","2","1","0");
INSERT INTO `delivery` VALUES("3","asdf","123","asdasdf","123123","2017-04-19 15:49:42","2","0","0");
INSERT INTO `delivery` VALUES("4","asdf","123","asdfasdf","123134213123","2017-04-20 12:47:39","2","0","0");
INSERT INTO `delivery` VALUES("5","asdf","123","asdfasdf","123","2017-04-20 16:53:51","2","0","0");
INSERT INTO `delivery` VALUES("6","asdf","123","asdfasdf","123123123","2017-04-20 17:08:39","2","1","0");
INSERT INTO `delivery` VALUES("7","asdfasdf","123123","asdfasdf","123123","2017-04-20 17:14:59","2","1","0");
INSERT INTO `delivery` VALUES("8","asdf","123","asdasd","123","2017-04-24 13:56:34","2","1","0");
INSERT INTO `delivery` VALUES("9","asdf","123123","adsasdf","123123","2017-05-15 12:34:59","2","1","0");
INSERT INTO `delivery` VALUES("10","asdfasdf","123123","asdfasdf","123123","2017-05-18 16:39:49","2","1","0");
INSERT INTO `delivery` VALUES("11","asdfasdf","0","asdfasdf","123123123","2017-05-31 12:50:41","2","1","0");
INSERT INTO `delivery` VALUES("12","asdfdsdf","0","sadfasdfsadf","123123123","2017-06-22 11:34:47","2","1","0");



DROP TABLE duplicate_bill;

CREATE TABLE `duplicate_bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `is_printed` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `duplicate_bill` VALUES("1","69","1","2","2017-05-16 17:25:21");
INSERT INTO `duplicate_bill` VALUES("2","69","1","2","2017-05-16 17:25:25");
INSERT INTO `duplicate_bill` VALUES("3","68","1","2","2017-05-16 17:26:48");
INSERT INTO `duplicate_bill` VALUES("4","68","1","2","2017-05-16 17:26:54");
INSERT INTO `duplicate_bill` VALUES("5","68","1","2","2017-05-16 17:26:58");
INSERT INTO `duplicate_bill` VALUES("6","69","1","2","2017-05-17 13:30:16");
INSERT INTO `duplicate_bill` VALUES("7","79","1","2","2017-05-23 12:19:25");
INSERT INTO `duplicate_bill` VALUES("8","103","1","2","2017-07-10 14:15:49");



DROP TABLE floor;

CREATE TABLE `floor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `display_order` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `floor` VALUES("1","first floor","1","1","2017-04-13 10:38:35","2");
INSERT INTO `floor` VALUES("2","second floor","2","1","2017-05-10 13:04:12","2");
INSERT INTO `floor` VALUES("3","third section","3","1","2017-05-10 13:04:39","2");
INSERT INTO `floor` VALUES("4","fourth floor","4","1","2017-05-10 13:09:36","2");



DROP TABLE foc;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `foc` VALUES("1","1","FOC Customer","0","","0","1","1","2017-04-13 13:36:49","2");
INSERT INTO `foc` VALUES("2","2","FOC Customer","0","","0","1","1","2017-04-13 13:44:39","2");
INSERT INTO `foc` VALUES("3","3","FOC Customer","0","","2","1","1","2017-04-18 11:33:30","2");



DROP TABLE foc_items;

CREATE TABLE `foc_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foc_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

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



DROP TABLE kot;

CREATE TABLE `kot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `display_number` varchar(100) NOT NULL,
  `table_id` int(11) NOT NULL,
  `floor_id` int(11) NOT NULL,
  `occupy_id` int(11) NOT NULL,
  `take_away_id` int(11) NOT NULL,
  `pick_up_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `foc_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `kitchen_status` tinyint(4) NOT NULL,
  `return_against` int(11) NOT NULL,
  `return_against_display_number` varchar(100) NOT NULL,
  `return_note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=latin1;

INSERT INTO `kot` VALUES("1","170413-1","1","1","0","0","0","0","1","0","2017-04-13 11:47:01","2","1","1","0","","");
INSERT INTO `kot` VALUES("2","170413-2","1","1","0","0","0","0","1","0","2017-04-13 11:48:11","2","1","1","0","","");
INSERT INTO `kot` VALUES("3","","1","1","0","0","0","0","1","0","2017-04-13 11:48:59","2","1","1","1","170413-1","asd fasdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf ");
INSERT INTO `kot` VALUES("4","","1","1","0","0","0","0","1","0","2017-04-13 11:49:00","2","1","1","2","170413-2","asd fasdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf ");
INSERT INTO `kot` VALUES("5","170413-3","1","1","0","0","0","0","1","0","2017-04-13 11:59:34","2","1","1","0","","");
INSERT INTO `kot` VALUES("6","170413-4","0","0","0","0","0","0","2","0","2017-04-13 12:02:53","2","1","1","0","","");
INSERT INTO `kot` VALUES("7","170413-5","0","0","0","0","0","0","2","0","2017-04-13 12:08:43","2","1","1","0","","");
INSERT INTO `kot` VALUES("8","170413-6","0","0","0","0","0","0","4","0","2017-04-13 12:10:52","2","1","1","0","","");
INSERT INTO `kot` VALUES("9","","0","0","0","0","0","0","4","0","2017-04-13 12:11:06","2","1","1","8","170413-6","dasdf ");
INSERT INTO `kot` VALUES("10","170413-7","1","1","0","0","0","0","5","0","2017-04-13 12:36:57","2","1","1","0","","");
INSERT INTO `kot` VALUES("11","170413-8","1","1","0","0","0","0","7","0","2017-04-13 12:37:29","2","1","1","0","","");
INSERT INTO `kot` VALUES("12","170413-9","1","1","0","0","0","0","0","1","2017-04-13 13:16:51","2","1","1","0","","");
INSERT INTO `kot` VALUES("13","170413-10","1","1","0","0","0","0","0","2","2017-04-13 13:41:37","2","1","0","0","","");
INSERT INTO `kot` VALUES("14","170413-11","1","1","0","0","0","0","8","0","2017-04-13 17:06:44","2","1","1","0","","");
INSERT INTO `kot` VALUES("15","170416-1","1","1","0","0","0","0","9","0","2017-04-16 15:37:37","2","1","1","0","","");
INSERT INTO `kot` VALUES("16","170416-2","1","1","0","0","0","0","10","0","2017-04-16 16:59:36","2","1","1","0","","");
INSERT INTO `kot` VALUES("17","170417-1","1","1","0","0","0","0","0","3","2017-04-17 15:17:47","2","1","0","0","","");
INSERT INTO `kot` VALUES("18","170417-2","1","1","0","0","0","0","0","3","2017-04-17 15:18:07","2","1","0","0","","");
INSERT INTO `kot` VALUES("19","170417-3","1","1","0","0","0","0","0","3","2017-04-17 15:18:32","2","1","0","0","","");
INSERT INTO `kot` VALUES("20","170417-4","2","1","0","0","0","0","14","0","2017-04-17 15:19:14","2","1","1","0","","");
INSERT INTO `kot` VALUES("21","170417-5","2","1","0","0","0","0","14","0","2017-04-17 15:19:19","2","1","1","0","","");
INSERT INTO `kot` VALUES("22","170417-6","3","1","0","0","0","0","13","0","2017-04-17 15:19:47","2","1","1","0","","");
INSERT INTO `kot` VALUES("23","170417-7","3","1","0","0","0","0","13","0","2017-04-17 15:19:52","2","1","1","0","","");
INSERT INTO `kot` VALUES("24","170417-8","4","1","8","0","0","0","0","0","2017-04-17 15:22:29","2","0","0","0","","");
INSERT INTO `kot` VALUES("25","170417-9","4","1","8","0","0","0","0","0","2017-04-17 15:22:36","2","0","0","0","","");
INSERT INTO `kot` VALUES("26","170417-10","0","0","0","3","0","0","0","0","2017-04-17 15:56:35","2","0","0","0","","");
INSERT INTO `kot` VALUES("27","170418-1","0","0","0","4","0","0","0","0","2017-04-18 10:42:48","2","0","1","0","","");
INSERT INTO `kot` VALUES("28","170418-2","0","0","0","0","0","0","15","0","2017-04-18 11:25:28","2","1","1","0","","");
INSERT INTO `kot` VALUES("29","170418-3","1","1","0","0","0","0","0","3","2017-04-18 11:33:24","2","1","0","0","","");
INSERT INTO `kot` VALUES("30","170418-4","1","1","0","0","0","0","16","0","2017-04-18 12:40:43","2","1","1","0","","");
INSERT INTO `kot` VALUES("31","170418-5","1","1","0","0","0","0","17","0","2017-04-18 12:45:13","2","1","1","0","","");
INSERT INTO `kot` VALUES("32","170418-6","1","1","0","0","0","0","18","0","2017-04-18 13:11:12","2","1","1","0","","");
INSERT INTO `kot` VALUES("33","170419-1","1","1","0","0","0","0","20","0","2017-04-19 11:51:34","5","1","1","0","","");
INSERT INTO `kot` VALUES("34","170419-2","1","1","0","0","0","0","20","0","2017-04-19 14:43:09","2","1","1","0","","");
INSERT INTO `kot` VALUES("35","170419-3","1","1","0","0","0","0","21","0","2017-04-19 15:03:56","2","1","1","0","","");
INSERT INTO `kot` VALUES("36","170419-4","1","1","0","0","0","0","21","0","2017-04-19 15:10:24","2","1","1","0","","");
INSERT INTO `kot` VALUES("37","170419-5","1","1","0","0","0","0","22","0","2017-04-19 15:17:10","2","1","1","0","","");
INSERT INTO `kot` VALUES("38","170419-6","1","1","0","0","0","0","23","0","2017-04-19 15:20:44","2","1","1","0","","");
INSERT INTO `kot` VALUES("39","170419-7","1","1","0","0","0","0","24","0","2017-04-19 15:22:26","2","1","1","0","","");
INSERT INTO `kot` VALUES("40","170419-8","1","1","0","0","0","0","25","0","2017-04-19 15:27:31","2","1","1","0","","");
INSERT INTO `kot` VALUES("41","170419-9","1","1","0","0","0","0","26","0","2017-04-19 15:27:50","2","1","1","0","","");
INSERT INTO `kot` VALUES("42","170419-10","1","1","0","0","0","0","27","0","2017-04-19 15:28:13","2","1","1","0","","");
INSERT INTO `kot` VALUES("43","170419-11","1","1","0","0","0","0","28","0","2017-04-19 15:29:00","2","1","1","0","","");
INSERT INTO `kot` VALUES("44","170419-12","1","1","0","0","0","0","1","0","2017-04-19 15:29:24","2","1","1","0","","");
INSERT INTO `kot` VALUES("45","170419-13","0","0","0","5","0","0","0","0","2017-04-19 15:45:57","2","0","0","0","","");
INSERT INTO `kot` VALUES("46","170419-14","0","0","0","5","0","0","0","0","2017-04-19 15:46:09","2","0","0","0","","");
INSERT INTO `kot` VALUES("47","","0","0","0","5","0","0","0","0","2017-04-19 15:46:18","2","2","0","46","170419-14","");
INSERT INTO `kot` VALUES("48","","0","0","0","5","0","0","0","0","2017-04-19 15:48:52","2","2","0","46","170419-14","");
INSERT INTO `kot` VALUES("49","170419-15","0","0","0","0","0","3","0","0","2017-04-19 15:49:48","2","0","0","0","","");
INSERT INTO `kot` VALUES("50","170419-16","0","0","0","0","0","3","0","0","2017-04-19 15:49:57","2","0","0","0","","");
INSERT INTO `kot` VALUES("51","","0","0","0","0","0","3","0","0","2017-04-19 15:50:04","2","2","0","50","170419-16","");
INSERT INTO `kot` VALUES("52","170419-17","0","0","0","0","0","0","6","0","2017-04-19 18:02:58","2","1","1","0","","");
INSERT INTO `kot` VALUES("53","170420-1","0","0","0","0","0","4","0","0","2017-04-20 12:47:48","2","0","0","0","","");
INSERT INTO `kot` VALUES("54","170420-2","0","0","0","0","0","4","0","0","2017-04-20 12:51:47","2","0","0","0","","");
INSERT INTO `kot` VALUES("55","170420-3","1","1","0","0","0","0","2","0","2017-04-20 13:25:54","2","1","1","0","","");
INSERT INTO `kot` VALUES("56","170420-4","1","1","0","0","0","0","2","0","2017-04-20 14:03:59","2","1","1","0","","");
INSERT INTO `kot` VALUES("57","170420-5","1","1","0","0","0","0","4","0","2017-04-20 14:32:54","2","1","1","0","","");
INSERT INTO `kot` VALUES("58","170420-6","1","1","0","0","0","0","9","0","2017-04-20 16:44:55","2","1","1","0","","");
INSERT INTO `kot` VALUES("59","170420-7","0","0","0","0","0","0","11","0","2017-04-20 16:54:01","2","1","1","0","","");
INSERT INTO `kot` VALUES("60","170420-8","0","0","0","0","0","0","13","0","2017-04-20 17:08:45","2","1","1","0","","");
INSERT INTO `kot` VALUES("61","170420-9","0","0","0","0","0","0","15","0","2017-04-20 17:15:13","2","1","1","0","","");
INSERT INTO `kot` VALUES("62","170420-10","1","1","0","0","0","0","17","0","2017-04-20 17:23:19","2","1","1","0","","");
INSERT INTO `kot` VALUES("63","170421-1","1","1","0","0","0","0","18","0","2017-04-21 08:23:29","2","1","1","0","","");
INSERT INTO `kot` VALUES("64","170421-2","1","1","0","0","0","0","19","0","2017-04-21 08:33:58","2","1","1","0","","");
INSERT INTO `kot` VALUES("65","170421-3","1","1","0","0","0","0","20","0","2017-04-21 13:44:29","2","1","1","0","","");
INSERT INTO `kot` VALUES("66","170423-1","1","1","0","0","0","0","21","0","2017-04-23 15:05:44","2","1","1","0","","");
INSERT INTO `kot` VALUES("67","170423-2","1","1","0","0","0","0","22","0","2017-04-23 16:53:55","2","1","1","0","","");
INSERT INTO `kot` VALUES("68","170423-3","1","1","0","0","0","0","23","0","2017-04-23 17:05:17","2","1","1","0","","");
INSERT INTO `kot` VALUES("69","170423-4","1","1","0","0","0","0","24","0","2017-04-23 17:16:57","2","1","1","0","","");
INSERT INTO `kot` VALUES("70","170423-5","1","1","0","0","0","0","25","0","2017-04-23 17:32:09","2","1","1","0","","");
INSERT INTO `kot` VALUES("71","170423-6","1","1","0","0","0","0","26","0","2017-04-23 18:19:43","2","1","1","0","","");
INSERT INTO `kot` VALUES("72","170423-7","1","1","0","0","0","0","27","0","2017-04-23 18:21:41","2","1","1","0","","");
INSERT INTO `kot` VALUES("73","170424-1","1","1","0","0","0","0","30","0","2017-04-24 11:35:15","2","1","1","0","","");
INSERT INTO `kot` VALUES("74","170424-2","1","1","0","0","0","0","31","0","2017-04-24 11:46:52","2","1","1","0","","");
INSERT INTO `kot` VALUES("75","170424-3","1","1","0","0","0","0","31","0","2017-04-24 11:49:22","2","1","1","0","","");
INSERT INTO `kot` VALUES("76","170424-4","1","1","0","0","0","0","32","0","2017-04-24 12:22:27","2","1","1","0","","");
INSERT INTO `kot` VALUES("77","170424-5","1","1","0","0","0","0","39","0","2017-04-24 12:26:31","2","1","1","0","","");
INSERT INTO `kot` VALUES("78","170424-6","0","0","0","0","0","0","37","0","2017-04-24 13:56:59","2","1","1","0","","");
INSERT INTO `kot` VALUES("79","170424-7","0","0","0","0","0","0","37","0","2017-04-24 14:12:05","2","1","1","0","","");
INSERT INTO `kot` VALUES("80","170424-8","1","1","0","0","0","0","42","0","2017-04-24 16:36:42","2","1","1","0","","");
INSERT INTO `kot` VALUES("81","170424-9","1","1","0","0","0","0","43","0","2017-04-24 16:44:59","2","1","1","0","","");
INSERT INTO `kot` VALUES("82","170424-10","1","1","0","0","0","0","46","0","2017-04-24 16:48:41","2","1","1","0","","");
INSERT INTO `kot` VALUES("83","170424-11","1","1","0","0","0","0","47","0","2017-04-24 16:53:01","2","1","1","0","","");
INSERT INTO `kot` VALUES("84","170424-12","1","1","0","0","0","0","48","0","2017-04-24 16:53:53","2","1","1","0","","");
INSERT INTO `kot` VALUES("85","170424-13","1","1","0","0","0","0","49","0","2017-04-24 17:00:25","2","1","1","0","","");
INSERT INTO `kot` VALUES("86","170424-14","1","1","0","0","0","0","50","0","2017-04-24 17:04:35","2","1","1","0","","");
INSERT INTO `kot` VALUES("87","170425-1","1","1","0","0","0","0","51","0","2017-04-25 08:11:38","2","1","1","0","","");
INSERT INTO `kot` VALUES("88","170425-2","1","1","0","0","0","0","52","0","2017-04-25 08:13:16","2","1","1","0","","");
INSERT INTO `kot` VALUES("89","170425-3","1","1","0","0","0","0","54","0","2017-04-25 08:24:02","2","1","1","0","","");
INSERT INTO `kot` VALUES("90","170425-4","1","1","0","0","0","0","57","0","2017-04-25 08:39:19","2","1","1","0","","");
INSERT INTO `kot` VALUES("91","170425-5","4","1","0","0","0","0","61","0","2017-04-25 18:43:42","2","1","1","0","","");
INSERT INTO `kot` VALUES("92","170425-6","4","1","0","0","0","0","61","0","2017-04-25 18:44:03","2","1","1","0","","");
INSERT INTO `kot` VALUES("93","","4","1","0","0","0","0","61","0","2017-04-25 18:45:10","2","1","1","91","170425-5","lak;sjdf alsjf");
INSERT INTO `kot` VALUES("94","170425-7","2","1","0","0","0","0","60","0","2017-04-25 18:47:04","2","1","1","0","","");
INSERT INTO `kot` VALUES("95","170427-1","4","1","0","0","0","0","62","0","2017-04-27 10:58:01","2","1","1","0","","");
INSERT INTO `kot` VALUES("96","170427-2","1","1","0","0","0","0","68","0","2017-04-27 11:45:42","2","1","1","0","","");
INSERT INTO `kot` VALUES("97","","1","1","0","0","0","0","68","0","2017-04-27 11:47:23","2","1","1","96","170427-2","");
INSERT INTO `kot` VALUES("98","170508-1","1","1","0","0","0","0","68","0","2017-05-08 13:23:53","2","1","1","0","","");
INSERT INTO `kot` VALUES("99","170511-1","1","1","0","0","0","0","68","0","2017-05-11 16:41:16","2","1","1","0","","");
INSERT INTO `kot` VALUES("100","170511-2","1","1","0","0","0","0","68","0","2017-05-11 16:57:59","2","1","1","0","","");
INSERT INTO `kot` VALUES("101","170511-3","1","1","0","0","0","0","68","0","2017-05-11 16:59:19","2","1","1","0","","");
INSERT INTO `kot` VALUES("102","170515-1","1","1","0","0","0","0","68","0","2017-05-15 10:59:11","2","1","1","0","","");
INSERT INTO `kot` VALUES("103","170515-2","0","0","0","0","0","0","63","0","2017-05-15 12:35:09","2","1","1","0","","");
INSERT INTO `kot` VALUES("104","170515-3","4","1","0","0","0","0","69","0","2017-05-15 16:21:45","2","1","1","0","","");
INSERT INTO `kot` VALUES("105","170518-1","6","1","0","0","0","0","70","0","2017-05-18 16:37:00","2","1","1","0","","");
INSERT INTO `kot` VALUES("106","170518-2","6","1","0","0","0","0","71","0","2017-05-18 16:37:29","2","1","1","0","","");
INSERT INTO `kot` VALUES("107","170518-3","6","1","0","0","0","0","73","0","2017-05-18 16:37:46","2","1","1","0","","");
INSERT INTO `kot` VALUES("108","170518-4","0","0","0","0","0","0","74","0","2017-05-18 16:38:33","2","1","1","0","","");
INSERT INTO `kot` VALUES("109","170518-5","0","0","0","0","0","0","75","0","2017-05-18 16:39:07","2","1","1","0","","");
INSERT INTO `kot` VALUES("110","170518-6","0","0","0","0","0","0","76","0","2017-05-18 16:40:33","2","1","1","0","","");
INSERT INTO `kot` VALUES("111","170523-1","0","0","0","0","0","0","78","0","2017-05-23 12:03:11","2","1","1","0","","");
INSERT INTO `kot` VALUES("112","","0","0","0","0","0","0","78","0","2017-05-23 12:03:45","2","1","1","111","170523-1","");
INSERT INTO `kot` VALUES("113","170523-2","4","1","0","0","0","0","79","0","2017-05-23 12:06:38","2","1","1","0","","");
INSERT INTO `kot` VALUES("114","170523-3","4","1","0","0","0","0","80","0","2017-05-23 15:56:11","2","1","1","0","","");
INSERT INTO `kot` VALUES("115","170523-4","1","1","0","0","0","0","93","0","2017-05-23 16:01:09","2","1","1","0","","");
INSERT INTO `kot` VALUES("116","170523-5","1","1","0","0","0","0","93","0","2017-05-23 16:04:44","2","1","1","0","","");
INSERT INTO `kot` VALUES("117","170531-1","2","1","0","0","0","0","82","0","2017-05-31 12:41:49","2","1","1","0","","");
INSERT INTO `kot` VALUES("118","170531-2","0","0","0","0","0","0","83","0","2017-05-31 12:50:23","2","1","1","0","","");
INSERT INTO `kot` VALUES("119","170531-3","0","0","0","0","0","0","84","0","2017-05-31 12:50:50","2","1","1","0","","");
INSERT INTO `kot` VALUES("120","170602-1","0","0","0","0","0","0","85","0","2017-06-02 17:13:01","2","1","1","0","","");
INSERT INTO `kot` VALUES("121","170620-1","4","1","0","0","0","0","87","0","2017-06-20 17:43:49","2","1","1","0","","");
INSERT INTO `kot` VALUES("122","170622-1","5","1","0","0","0","0","88","0","2017-06-22 11:32:49","2","1","1","0","","");
INSERT INTO `kot` VALUES("123","170622-2","0","0","0","0","0","0","90","0","2017-06-22 11:33:31","2","1","1","0","","");
INSERT INTO `kot` VALUES("124","170622-3","0","0","0","0","0","0","91","0","2017-06-22 11:34:34","2","1","1","0","","");
INSERT INTO `kot` VALUES("125","170622-4","0","0","0","0","0","0","92","0","2017-06-22 11:34:50","2","1","1","0","","");
INSERT INTO `kot` VALUES("126","170622-5","1","1","0","0","0","0","93","0","2017-06-22 11:35:01","2","1","1","0","","");
INSERT INTO `kot` VALUES("127","170622-6","7","2","0","0","0","0","95","0","2017-06-22 17:16:54","2","1","1","0","","");
INSERT INTO `kot` VALUES("128","170622-7","7","2","0","0","0","0","95","0","2017-06-22 17:17:01","2","1","1","0","","");
INSERT INTO `kot` VALUES("129","170622-8","0","0","0","12","0","0","0","0","2017-06-22 17:18:54","2","0","0","0","","");
INSERT INTO `kot` VALUES("130","170622-9","0","0","0","12","0","0","0","0","2017-06-22 17:19:15","2","0","0","0","","");
INSERT INTO `kot` VALUES("131","170622-10","0","0","0","12","0","0","0","0","2017-06-22 17:19:23","2","0","0","0","","");
INSERT INTO `kot` VALUES("132","170622-11","0","0","0","12","0","0","0","0","2017-06-22 17:31:41","2","0","0","0","","");
INSERT INTO `kot` VALUES("133","170622-12","0","0","0","12","0","0","0","0","2017-06-22 17:31:58","2","0","0","0","","");
INSERT INTO `kot` VALUES("134","170622-13","0","0","0","12","0","0","0","0","2017-06-22 17:32:00","2","0","0","0","","");
INSERT INTO `kot` VALUES("135","170707-1","1","1","0","0","0","0","96","0","2017-07-07 15:23:04","2","1","1","0","","");
INSERT INTO `kot` VALUES("136","170707-2","1","1","0","0","0","0","97","0","2017-07-07 15:28:00","2","1","1","0","","");
INSERT INTO `kot` VALUES("137","170707-3","1","1","0","0","0","0","98","0","2017-07-07 15:28:16","2","1","1","0","","");
INSERT INTO `kot` VALUES("138","170707-4","1","1","0","0","0","0","99","0","2017-07-07 15:33:43","2","1","1","0","","");
INSERT INTO `kot` VALUES("139","170707-5","1","1","0","0","0","0","100","0","2017-07-07 15:35:59","2","1","1","0","","");
INSERT INTO `kot` VALUES("140","170707-6","1","1","0","0","0","0","101","0","2017-07-07 15:37:46","2","1","1","0","","");
INSERT INTO `kot` VALUES("141","170707-7","1","1","0","0","0","0","101","0","2017-07-07 15:37:46","2","1","1","0","","");
INSERT INTO `kot` VALUES("142","170707-8","1","1","0","0","0","0","102","0","2017-07-07 15:43:27","2","1","1","0","","");
INSERT INTO `kot` VALUES("143","170707-9","1","1","0","0","0","0","103","0","2017-07-07 15:55:48","2","1","1","0","","");
INSERT INTO `kot` VALUES("144","170707-10","1","1","0","0","0","0","104","0","2017-07-07 16:52:45","2","1","1","0","","");
INSERT INTO `kot` VALUES("145","170707-11","1","1","0","0","0","0","104","0","2017-07-07 17:25:07","2","1","1","0","","");
INSERT INTO `kot` VALUES("146","170707-12","1","1","0","0","0","0","105","0","2017-07-07 17:27:16","2","1","1","0","","");



DROP TABLE kot_items;

CREATE TABLE `kot_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kot_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `returned_quantity` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=269 DEFAULT CHARSET=latin1;

INSERT INTO `kot_items` VALUES("1","1","15","1","1","0");
INSERT INTO `kot_items` VALUES("2","1","30","1","1","0");
INSERT INTO `kot_items` VALUES("3","1","0","2","2","1");
INSERT INTO `kot_items` VALUES("4","1","0","2","0","1");
INSERT INTO `kot_items` VALUES("5","2","1","2","0","1");
INSERT INTO `kot_items` VALUES("6","2","2","2","1","1");
INSERT INTO `kot_items` VALUES("7","2","15","3","1","0");
INSERT INTO `kot_items` VALUES("8","2","1","3","2","0");
INSERT INTO `kot_items` VALUES("9","3","15","1","0","0");
INSERT INTO `kot_items` VALUES("10","3","30","1","0","0");
INSERT INTO `kot_items` VALUES("11","3","0","1","0","1");
INSERT INTO `kot_items` VALUES("12","3","0","1","0","1");
INSERT INTO `kot_items` VALUES("13","4","1","1","0","0");
INSERT INTO `kot_items` VALUES("14","4","2","1","0","1");
INSERT INTO `kot_items` VALUES("15","4","15","1","0","0");
INSERT INTO `kot_items` VALUES("16","4","1","1","0","0");
INSERT INTO `kot_items` VALUES("17","5","1","2","0","0");
INSERT INTO `kot_items` VALUES("18","5","11","2","0","0");
INSERT INTO `kot_items` VALUES("19","5","31","2","0","0");
INSERT INTO `kot_items` VALUES("20","5","3","2","0","0");
INSERT INTO `kot_items` VALUES("21","6","1","2","0","0");
INSERT INTO `kot_items` VALUES("22","6","11","2","0","0");
INSERT INTO `kot_items` VALUES("23","6","26","2","0","0");
INSERT INTO `kot_items` VALUES("24","7","1","3","0","1");
INSERT INTO `kot_items` VALUES("25","7","2","3","0","1");
INSERT INTO `kot_items` VALUES("26","8","1","2","0","0");
INSERT INTO `kot_items` VALUES("27","8","1","2","1","1");
INSERT INTO `kot_items` VALUES("28","8","2","2","0","0");
INSERT INTO `kot_items` VALUES("29","8","2","2","2","1");
INSERT INTO `kot_items` VALUES("30","8","26","2","0","0");
INSERT INTO `kot_items` VALUES("31","9","1","1","0","1");
INSERT INTO `kot_items` VALUES("32","9","2","1","0","1");
INSERT INTO `kot_items` VALUES("33","9","2","1","0","1");
INSERT INTO `kot_items` VALUES("34","10","1","2","0","0");
INSERT INTO `kot_items` VALUES("35","10","11","2","0","0");
INSERT INTO `kot_items` VALUES("36","10","26","2","0","0");
INSERT INTO `kot_items` VALUES("37","10","31","2","0","0");
INSERT INTO `kot_items` VALUES("38","11","26","2","0","0");
INSERT INTO `kot_items` VALUES("39","11","11","2","0","0");
INSERT INTO `kot_items` VALUES("40","11","2","2","0","0");
INSERT INTO `kot_items` VALUES("41","11","31","2","0","0");
INSERT INTO `kot_items` VALUES("42","12","1","2","0","0");
INSERT INTO `kot_items` VALUES("43","12","11","2","0","0");
INSERT INTO `kot_items` VALUES("44","12","26","2","0","0");
INSERT INTO `kot_items` VALUES("45","13","1","2","0","0");
INSERT INTO `kot_items` VALUES("46","13","1","3","0","1");
INSERT INTO `kot_items` VALUES("47","13","2","3","0","1");
INSERT INTO `kot_items` VALUES("48","13","11","2","0","0");
INSERT INTO `kot_items` VALUES("49","14","1","2","0","0");
INSERT INTO `kot_items` VALUES("50","14","2","2","0","0");
INSERT INTO `kot_items` VALUES("51","15","1","2","0","0");
INSERT INTO `kot_items` VALUES("52","15","2","2","0","0");
INSERT INTO `kot_items` VALUES("53","16","1","2","0","0");
INSERT INTO `kot_items` VALUES("54","16","2","2","0","0");
INSERT INTO `kot_items` VALUES("55","17","1","2","0","0");
INSERT INTO `kot_items` VALUES("56","17","11","2","0","0");
INSERT INTO `kot_items` VALUES("57","18","11","2","0","0");
INSERT INTO `kot_items` VALUES("58","19","12","2","0","0");
INSERT INTO `kot_items` VALUES("59","19","4","2","0","0");
INSERT INTO `kot_items` VALUES("60","20","1","2","0","0");
INSERT INTO `kot_items` VALUES("61","20","3","2","0","0");
INSERT INTO `kot_items` VALUES("62","21","2","2","0","0");
INSERT INTO `kot_items` VALUES("63","21","4","2","0","0");
INSERT INTO `kot_items` VALUES("64","22","1","2","0","0");
INSERT INTO `kot_items` VALUES("65","22","3","2","0","0");
INSERT INTO `kot_items` VALUES("66","23","11","2","0","0");
INSERT INTO `kot_items` VALUES("67","23","12","2","0","0");
INSERT INTO `kot_items` VALUES("68","24","1","2","0","0");
INSERT INTO `kot_items` VALUES("69","24","3","2","0","0");
INSERT INTO `kot_items` VALUES("70","25","2","2","0","0");
INSERT INTO `kot_items` VALUES("71","25","4","2","0","0");
INSERT INTO `kot_items` VALUES("72","26","1","2","0","0");
INSERT INTO `kot_items` VALUES("73","26","11","2","0","0");
INSERT INTO `kot_items` VALUES("74","26","12","2","0","0");
INSERT INTO `kot_items` VALUES("75","26","13","2","0","0");
INSERT INTO `kot_items` VALUES("76","27","1","2","0","0");
INSERT INTO `kot_items` VALUES("77","27","3","2","0","0");
INSERT INTO `kot_items` VALUES("78","27","5","2","0","0");
INSERT INTO `kot_items` VALUES("79","28","1","2","0","0");
INSERT INTO `kot_items` VALUES("80","28","11","2","0","0");
INSERT INTO `kot_items` VALUES("81","28","26","2","0","0");
INSERT INTO `kot_items` VALUES("82","29","1","5","0","1");
INSERT INTO `kot_items` VALUES("83","29","2","5","0","1");
INSERT INTO `kot_items` VALUES("84","29","13","1","0","0");
INSERT INTO `kot_items` VALUES("85","29","28","1","0","0");
INSERT INTO `kot_items` VALUES("86","30","1","2","0","0");
INSERT INTO `kot_items` VALUES("87","30","2","2","0","0");
INSERT INTO `kot_items` VALUES("88","30","3","2","0","0");
INSERT INTO `kot_items` VALUES("89","30","4","2","0","0");
INSERT INTO `kot_items` VALUES("90","31","1","2","0","0");
INSERT INTO `kot_items` VALUES("91","31","2","2","0","0");
INSERT INTO `kot_items` VALUES("92","31","3","2","0","0");
INSERT INTO `kot_items` VALUES("93","31","4","2","0","0");
INSERT INTO `kot_items` VALUES("94","32","1","2","0","0");
INSERT INTO `kot_items` VALUES("95","32","2","2","0","0");
INSERT INTO `kot_items` VALUES("96","32","3","2","0","0");
INSERT INTO `kot_items` VALUES("97","32","4","2","0","0");
INSERT INTO `kot_items` VALUES("98","33","1","3","0","0");
INSERT INTO `kot_items` VALUES("99","33","2","3","0","0");
INSERT INTO `kot_items` VALUES("100","33","3","3","0","0");
INSERT INTO `kot_items` VALUES("101","34","1","2","0","0");
INSERT INTO `kot_items` VALUES("102","34","2","2","0","0");
INSERT INTO `kot_items` VALUES("103","35","1","1","0","0");
INSERT INTO `kot_items` VALUES("104","36","3","2","0","0");
INSERT INTO `kot_items` VALUES("105","37","1","2","0","0");
INSERT INTO `kot_items` VALUES("106","37","2","2","0","0");
INSERT INTO `kot_items` VALUES("107","38","1","2","0","0");
INSERT INTO `kot_items` VALUES("108","39","1","1","0","0");
INSERT INTO `kot_items` VALUES("109","40","1","2","0","0");
INSERT INTO `kot_items` VALUES("110","41","1","2","0","0");
INSERT INTO `kot_items` VALUES("111","42","1","2","0","0");
INSERT INTO `kot_items` VALUES("112","43","3","2","0","0");
INSERT INTO `kot_items` VALUES("113","44","3","2","0","0");
INSERT INTO `kot_items` VALUES("114","45","1","1","0","0");
INSERT INTO `kot_items` VALUES("115","46","2","2","1","0");
INSERT INTO `kot_items` VALUES("116","46","4","2","1","0");
INSERT INTO `kot_items` VALUES("117","47","4","1","0","0");
INSERT INTO `kot_items` VALUES("118","48","2","1","0","0");
INSERT INTO `kot_items` VALUES("119","49","1","2","0","0");
INSERT INTO `kot_items` VALUES("120","50","2","2","1","0");
INSERT INTO `kot_items` VALUES("121","51","2","1","0","0");
INSERT INTO `kot_items` VALUES("122","52","1","2","0","0");
INSERT INTO `kot_items` VALUES("123","53","1","2","0","0");
INSERT INTO `kot_items` VALUES("124","54","1","2","0","0");
INSERT INTO `kot_items` VALUES("125","55","1","1","0","0");
INSERT INTO `kot_items` VALUES("126","56","1","3","0","0");
INSERT INTO `kot_items` VALUES("127","57","2","4","0","0");
INSERT INTO `kot_items` VALUES("128","58","1","2","0","0");
INSERT INTO `kot_items` VALUES("129","58","3","2","0","0");
INSERT INTO `kot_items` VALUES("130","59","1","2","0","0");
INSERT INTO `kot_items` VALUES("131","59","2","2","0","0");
INSERT INTO `kot_items` VALUES("132","60","1","2","0","0");
INSERT INTO `kot_items` VALUES("133","61","1","5","0","0");
INSERT INTO `kot_items` VALUES("134","62","1","2","0","0");
INSERT INTO `kot_items` VALUES("135","62","2","2","0","0");
INSERT INTO `kot_items` VALUES("136","63","1","2","0","0");
INSERT INTO `kot_items` VALUES("137","63","2","2","0","0");
INSERT INTO `kot_items` VALUES("138","64","1","4","0","0");
INSERT INTO `kot_items` VALUES("139","65","1","2","0","0");
INSERT INTO `kot_items` VALUES("140","65","2","2","0","0");
INSERT INTO `kot_items` VALUES("141","66","1","2","0","0");
INSERT INTO `kot_items` VALUES("142","67","1","4","0","0");
INSERT INTO `kot_items` VALUES("143","68","1","4","0","0");
INSERT INTO `kot_items` VALUES("144","69","1","4","0","0");
INSERT INTO `kot_items` VALUES("145","70","2","4","0","0");
INSERT INTO `kot_items` VALUES("146","71","1","4","0","0");
INSERT INTO `kot_items` VALUES("147","72","1","4","0","0");
INSERT INTO `kot_items` VALUES("148","73","1","2","0","0");
INSERT INTO `kot_items` VALUES("149","74","1","2","0","0");
INSERT INTO `kot_items` VALUES("150","75","1","2","0","0");
INSERT INTO `kot_items` VALUES("151","76","1","6","0","0");
INSERT INTO `kot_items` VALUES("152","77","1","2","0","0");
INSERT INTO `kot_items` VALUES("153","78","1","1","0","0");
INSERT INTO `kot_items` VALUES("154","79","1","3","0","0");
INSERT INTO `kot_items` VALUES("155","80","1","4","0","0");
INSERT INTO `kot_items` VALUES("156","81","1","4","0","0");
INSERT INTO `kot_items` VALUES("157","82","1","4","0","0");
INSERT INTO `kot_items` VALUES("158","83","1","4","0","0");
INSERT INTO `kot_items` VALUES("159","84","1","4","0","0");
INSERT INTO `kot_items` VALUES("160","85","1","4","0","0");
INSERT INTO `kot_items` VALUES("161","86","1","4","0","0");
INSERT INTO `kot_items` VALUES("162","87","1","5","0","0");
INSERT INTO `kot_items` VALUES("163","88","1","4","0","0");
INSERT INTO `kot_items` VALUES("164","89","1","4","0","0");
INSERT INTO `kot_items` VALUES("165","90","1","4","0","0");
INSERT INTO `kot_items` VALUES("166","91","1","1","1","0");
INSERT INTO `kot_items` VALUES("167","91","3","1","0","0");
INSERT INTO `kot_items` VALUES("168","92","1","3","0","0");
INSERT INTO `kot_items` VALUES("169","93","1","1","0","0");
INSERT INTO `kot_items` VALUES("170","94","1","2","0","0");
INSERT INTO `kot_items` VALUES("171","94","2","2","0","0");
INSERT INTO `kot_items` VALUES("172","95","1","2","0","0");
INSERT INTO `kot_items` VALUES("173","96","1","2","1","0");
INSERT INTO `kot_items` VALUES("174","96","2","2","0","0");
INSERT INTO `kot_items` VALUES("175","97","1","1","0","0");
INSERT INTO `kot_items` VALUES("176","98","1","2","0","0");
INSERT INTO `kot_items` VALUES("177","98","3","2","0","0");
INSERT INTO `kot_items` VALUES("178","98","4","2","0","0");
INSERT INTO `kot_items` VALUES("179","99","1","2","0","0");
INSERT INTO `kot_items` VALUES("180","100","1","2","0","0");
INSERT INTO `kot_items` VALUES("181","100","3","2","0","0");
INSERT INTO `kot_items` VALUES("182","101","1","2","0","0");
INSERT INTO `kot_items` VALUES("183","101","11","2","0","0");
INSERT INTO `kot_items` VALUES("184","102","1","1","0","0");
INSERT INTO `kot_items` VALUES("185","103","1","2","0","0");
INSERT INTO `kot_items` VALUES("186","104","1","5","0","0");
INSERT INTO `kot_items` VALUES("187","105","1","2","0","0");
INSERT INTO `kot_items` VALUES("188","105","3","2","0","0");
INSERT INTO `kot_items` VALUES("189","106","1","2","0","0");
INSERT INTO `kot_items` VALUES("190","107","1","2","0","0");
INSERT INTO `kot_items` VALUES("191","107","3","2","0","0");
INSERT INTO `kot_items` VALUES("192","108","1","4","0","0");
INSERT INTO `kot_items` VALUES("193","109","1","2","0","0");
INSERT INTO `kot_items` VALUES("194","109","3","2","0","0");
INSERT INTO `kot_items` VALUES("195","110","1","2","0","0");
INSERT INTO `kot_items` VALUES("196","110","3","2","0","0");
INSERT INTO `kot_items` VALUES("197","111","11","1","1","0");
INSERT INTO `kot_items` VALUES("198","111","1","1","0","0");
INSERT INTO `kot_items` VALUES("199","112","11","1","0","0");
INSERT INTO `kot_items` VALUES("200","113","1","1","0","0");
INSERT INTO `kot_items` VALUES("201","113","11","1","0","0");
INSERT INTO `kot_items` VALUES("202","113","26","1","0","0");
INSERT INTO `kot_items` VALUES("203","113","31","1","0","0");
INSERT INTO `kot_items` VALUES("204","114","1","1","0","0");
INSERT INTO `kot_items` VALUES("205","114","11","1","0","0");
INSERT INTO `kot_items` VALUES("206","114","26","1","0","0");
INSERT INTO `kot_items` VALUES("207","114","31","1","0","0");
INSERT INTO `kot_items` VALUES("208","115","1","2","0","0");
INSERT INTO `kot_items` VALUES("209","115","11","2","0","0");
INSERT INTO `kot_items` VALUES("210","115","26","1","0","0");
INSERT INTO `kot_items` VALUES("211","115","31","1","0","0");
INSERT INTO `kot_items` VALUES("212","115","27","1","0","0");
INSERT INTO `kot_items` VALUES("213","115","2","3","0","0");
INSERT INTO `kot_items` VALUES("214","115","12","1","0","0");
INSERT INTO `kot_items` VALUES("215","115","28","2","0","0");
INSERT INTO `kot_items` VALUES("216","116","1","2","0","0");
INSERT INTO `kot_items` VALUES("217","116","11","1","0","0");
INSERT INTO `kot_items` VALUES("218","116","31","1","0","0");
INSERT INTO `kot_items` VALUES("219","117","11","2","0","0");
INSERT INTO `kot_items` VALUES("220","118","1","2","0","0");
INSERT INTO `kot_items` VALUES("221","119","11","3","0","0");
INSERT INTO `kot_items` VALUES("222","120","1","2","0","0");
INSERT INTO `kot_items` VALUES("223","121","1","1","0","0");
INSERT INTO `kot_items` VALUES("224","122","1","1","0","0");
INSERT INTO `kot_items` VALUES("225","123","1","2","0","0");
INSERT INTO `kot_items` VALUES("226","124","1","1","0","0");
INSERT INTO `kot_items` VALUES("227","125","1","1","0","0");
INSERT INTO `kot_items` VALUES("228","126","1","1","0","0");
INSERT INTO `kot_items` VALUES("229","127","1","1","0","0");
INSERT INTO `kot_items` VALUES("230","128","6","1","0","0");
INSERT INTO `kot_items` VALUES("231","128","2","1","0","0");
INSERT INTO `kot_items` VALUES("232","128","3","1","0","0");
INSERT INTO `kot_items` VALUES("233","129","1","1","0","0");
INSERT INTO `kot_items` VALUES("234","129","6","1","0","0");
INSERT INTO `kot_items` VALUES("235","130","6","1","0","0");
INSERT INTO `kot_items` VALUES("236","130","2","2","0","0");
INSERT INTO `kot_items` VALUES("237","130","3","1","0","0");
INSERT INTO `kot_items` VALUES("238","130","4","2","0","0");
INSERT INTO `kot_items` VALUES("239","130","5","1","0","0");
INSERT INTO `kot_items` VALUES("240","131","2","1","0","0");
INSERT INTO `kot_items` VALUES("241","131","3","2","0","0");
INSERT INTO `kot_items` VALUES("242","131","4","1","0","0");
INSERT INTO `kot_items` VALUES("243","131","5","1","0","0");
INSERT INTO `kot_items` VALUES("244","132","11","2","0","0");
INSERT INTO `kot_items` VALUES("245","132","12","2","0","0");
INSERT INTO `kot_items` VALUES("246","132","13","2","0","0");
INSERT INTO `kot_items` VALUES("247","132","14","2","0","0");
INSERT INTO `kot_items` VALUES("248","132","15","2","0","0");
INSERT INTO `kot_items` VALUES("249","133","26","1","0","0");
INSERT INTO `kot_items` VALUES("250","133","28","1","0","0");
INSERT INTO `kot_items` VALUES("251","133","30","1","0","0");
INSERT INTO `kot_items` VALUES("252","133","27","1","0","0");
INSERT INTO `kot_items` VALUES("253","133","29","1","0","0");
INSERT INTO `kot_items` VALUES("254","134","31","1","0","0");
INSERT INTO `kot_items` VALUES("255","135","4","2","0","0");
INSERT INTO `kot_items` VALUES("256","136","1","1","0","0");
INSERT INTO `kot_items` VALUES("257","137","32","1","0","0");
INSERT INTO `kot_items` VALUES("258","138","1","1","0","0");
INSERT INTO `kot_items` VALUES("259","139","32","1","0","0");
INSERT INTO `kot_items` VALUES("260","140","32","1","0","0");
INSERT INTO `kot_items` VALUES("261","141","32","1","0","0");
INSERT INTO `kot_items` VALUES("262","142","32","1","0","0");
INSERT INTO `kot_items` VALUES("263","143","1","1","0","0");
INSERT INTO `kot_items` VALUES("264","144","1","1","0","0");
INSERT INTO `kot_items` VALUES("265","145","1","1","0","0");
INSERT INTO `kot_items` VALUES("266","145","2","1","0","0");
INSERT INTO `kot_items` VALUES("267","145","4","2","0","0");
INSERT INTO `kot_items` VALUES("268","146","1","1","0","0");



DROP TABLE menu_category;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `menu_category` VALUES("1","food item","food-item","0","1","1","6","2017-04-13 10:44:12");
INSERT INTO `menu_category` VALUES("2","Hot Beverage","hot-beverage","0","1","2","7","2017-04-13 10:44:39");
INSERT INTO `menu_category` VALUES("3","Cold Beverage","cold-beverage","0","1","3","7","2017-04-13 10:44:48");
INSERT INTO `menu_category` VALUES("4","liquor","liquor","1","1","4","7","2017-04-13 11:27:27");
INSERT INTO `menu_category` VALUES("5","bakery","bakery","0","1","5","6","2017-05-23 12:15:00");
INSERT INTO `menu_category` VALUES("6","cakes and icecreams","cakes-and-icecreams","0","1","6","8","2017-05-23 13:05:01");



DROP TABLE menu_item;

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

INSERT INTO `menu_item` VALUES("1","food item 10","1","180","asdfasdfasdf","","food-item-10","1","2017-04-13 11:25:34","2","2017-07-10 11:53:46","2","1");
INSERT INTO `menu_item` VALUES("2","Food Item Two","1","200","asdf","","Food-Item-Two","4","2017-04-13 11:25:34","2","2017-04-13 11:25:34","2","1");
INSERT INTO `menu_item` VALUES("3","Food Item Three","1","50","asdf","","Food-Item-Three","7","2017-04-13 11:25:34","2","2017-04-13 11:25:34","2","1");
INSERT INTO `menu_item` VALUES("4","Food Item Four","1","75","asdf","","Food-Item-Four","10","2017-04-13 11:25:34","2","2017-04-13 11:25:34","2","1");
INSERT INTO `menu_item` VALUES("5","Food Item Five","1","125","asdf","","Food-Item-Five","13","2017-04-13 11:25:34","2","2017-04-13 11:25:34","2","1");
INSERT INTO `menu_item` VALUES("6","Food Item One","1","100","asdf","","Food-Item-One","2","2017-04-13 11:25:34","2","2017-04-13 11:25:34","2","1");
INSERT INTO `menu_item` VALUES("11","Hot Breverage One","2","100","asdf","","Hot-Breverage-One","1","2017-04-13 11:25:34","2","2017-04-13 11:25:34","2","1");
INSERT INTO `menu_item` VALUES("12","Hot Breverage Two","2","200","asdf","","Hot-Breverage-Two","3","2017-04-13 11:25:34","2","2017-04-13 11:25:34","2","1");
INSERT INTO `menu_item` VALUES("13","Hot Breverage Three","2","50","asdf","","Hot-Breverage-Three","5","2017-04-13 11:25:34","2","2017-04-13 11:25:34","2","1");
INSERT INTO `menu_item` VALUES("14","Hot Breverage Four","2","75","asdf","","Hot-Breverage-Four","7","2017-04-13 11:25:34","2","2017-04-13 11:25:34","2","1");
INSERT INTO `menu_item` VALUES("15","Hot Breverage Five","2","125","asdf","","Hot-Breverage-Five","9","2017-04-13 11:25:34","2","2017-04-13 11:25:34","2","1");
INSERT INTO `menu_item` VALUES("26","Cold Breverage One","3","100","asdf","","Cold-Breverage-One","1","2017-04-13 11:25:34","2","2017-04-13 11:25:34","2","1");
INSERT INTO `menu_item` VALUES("27","Cold Breverage Two","3","200","asdf","","Cold-Breverage-Two","2","2017-04-13 11:25:34","2","2017-04-13 11:25:34","2","1");
INSERT INTO `menu_item` VALUES("28","Cold Breverage Three","3","50","asdf","","Cold-Breverage-Three","3","2017-04-13 11:25:34","2","2017-04-13 11:25:34","2","1");
INSERT INTO `menu_item` VALUES("29","Cold Breverage Four","3","75","asdf","","Cold-Breverage-Four","4","2017-04-13 11:25:34","2","2017-04-13 11:25:34","2","1");
INSERT INTO `menu_item` VALUES("30","Cold Breverage Five","3","125","asdf","","Cold-Breverage-Five","5","2017-04-13 11:25:34","2","2017-04-13 11:25:34","2","1");
INSERT INTO `menu_item` VALUES("31","liquor item 1","4","300","Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.","","liquor-item-1","1","2017-04-13 11:35:43","2","2017-05-23 12:50:46","2","1");
INSERT INTO `menu_item` VALUES("32","momo","1","200","With meat inside(asdjas)","","momo","16","2017-05-23 12:13:36","2","2017-05-23 12:13:36","2","1");
INSERT INTO `menu_item` VALUES("33","sandwich chicken","1","150","asdf  sadf","","sandwich-chicken","17","2017-05-23 12:32:13","2","2017-05-23 12:32:13","2","1");



DROP TABLE menu_item_price;

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



DROP TABLE menu_stock_items;

CREATE TABLE `menu_stock_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_item_id` int(11) NOT NULL,
  `stock_item_id` int(11) NOT NULL,
  `used_quantity` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `menu_stock_items` VALUES("3","33","7","10");
INSERT INTO `menu_stock_items` VALUES("4","33","6","2");
INSERT INTO `menu_stock_items` VALUES("5","33","5","50");
INSERT INTO `menu_stock_items` VALUES("6","31","1","1");
INSERT INTO `menu_stock_items` VALUES("7","31","2","10");



DROP TABLE monthly_target;

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



DROP TABLE obstacles;

CREATE TABLE `obstacles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `obstacle_name` varchar(150) NOT NULL,
  `floor` int(11) NOT NULL,
  `x_pos` float NOT NULL,
  `y_pos` float NOT NULL,
  `height` float NOT NULL,
  `width` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `obstacles` VALUES("1","Obstacle - 1","1","62.6476","22.0048","15.1057","8.05271");
INSERT INTO `obstacles` VALUES("2","Obstacle - 2","1","29.6356","8.33332","16.6163","15.0073");
INSERT INTO `obstacles` VALUES("3","Obstacle - 3","2","32.5083","131.234","15.1057","8.05271");
INSERT INTO `obstacles` VALUES("4","Obstacle - 4","2","32.4064","153.085","15.1057","8.05271");



DROP TABLE occupy;

CREATE TABLE `occupy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `customer_pan` int(11) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `customer_pax` int(11) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

INSERT INTO `occupy` VALUES("2","","0","","2","1","1","2017-04-13","12:01:43","2017-04-13","12:58:42","2017-04-13 12:01:43","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("3","","0","","2","1","1","2017-04-13","13:16:37","2017-04-13","15:37:58","2017-04-13 13:16:37","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("4","","0","","2","1","1","2017-04-16","15:38:29","2017-04-16","17:00:06","2017-04-16 15:38:29","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("5","","0","","2","1","1","2017-04-17","14:51:06","2017-04-18","11:52:06","2017-04-17 14:51:06","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("6","","0","","5","2","1","2017-04-17","15:19:07","2017-04-18","11:23:49","2017-04-17 15:19:07","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("7","","0","","2","3","1","2017-04-17","15:19:38","2017-04-18","10:56:57","2017-04-17 15:19:38","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("8","","0","","0","4","1","2017-04-17","15:22:20","2017-04-18","10:16:20","2017-04-17 15:22:20","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("9","","0","","0","4","1","2017-04-18","10:16:53","2017-04-18","10:38:26","2017-04-18 10:16:53","5","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("10","","0","","2","1","1","2017-04-18","12:00:40","2017-04-18","12:01:55","2017-04-18 12:00:40","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("11","","0","","5","1","1","2017-04-18","12:40:33","2017-04-18","13:04:18","2017-04-18 12:40:33","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("12","","0","","2","1","1","2017-04-18","13:11:02","2017-04-18","13:11:59","2017-04-18 13:11:02","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("13","","0","","0","1","1","2017-04-19","09:10:52","2017-04-19","09:12:45","2017-04-19 09:10:52","5","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("14","asdf","0","","2","1","1","2017-04-17","01:00:00","2017-04-19","14:43:21","2017-04-19 09:13:02","5","1","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("15","","0","","2","1","1","2017-04-19","14:59:16","2017-04-19","15:17:28","2017-04-19 14:59:16","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("16","","0","","2","1","1","2017-04-19","15:20:36","2017-04-19","15:29:11","2017-04-19 15:20:36","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("17","","0","","2","1","1","2017-04-19","15:29:17","0000-00-00","15:29:38","2017-04-19 15:29:17","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("18","","0","","2","1","1","2017-04-20","16:44:45","2017-04-20","16:45:15","2017-04-20 16:44:45","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("19","","0","","2","1","1","2017-04-20","17:23:11","2017-04-24","15:11:52","2017-04-20 17:23:11","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("20","","0","","0","1","1","2017-04-24","15:12:45","2017-04-24","15:13:35","2017-04-24 15:12:45","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("21","","0","","50","1","1","2017-04-24","15:15:07","2017-04-24","15:15:25","2017-04-24 15:15:07","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("22","","0","","2","1","1","2017-04-24","16:36:27","0000-00-00","16:20:59","2017-04-24 16:36:27","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("23","","0","","1","4","1","2017-04-25","18:43:01","2017-05-02","10:52:35","2017-04-25 18:43:01","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("24","","0","","2","2","1","2017-04-25","18:45:28","2017-04-27","10:55:20","2017-04-25 18:45:28","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("25","","0","","2","4","1","2017-05-15","16:21:35","2017-05-15","16:22:35","2017-05-15 16:21:35","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("26","","0","","2","6","1","2017-05-16","11:11:22","0000-00-00","16:38:06","2017-05-16 11:11:22","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("27","","0","","5","4","1","2017-05-23","12:06:28","2017-05-23","12:11:02","2017-05-23 12:06:28","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("28","","0","","1","5","1","2017-05-23","12:15:28","2017-06-22","11:32:55","2017-05-23 12:15:28","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("29","","0","","0","2","1","2017-05-23","12:46:08","0000-00-00","00:00:00","2017-05-23 12:46:08","2","0","1","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("30","","0","","2","2","1","2017-05-23","12:46:09","2017-05-31","12:50:08","2017-05-23 12:46:09","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("31","","0","","0","7","2","2017-05-23","12:49:41","0000-00-00","00:00:00","2017-05-23 12:49:41","2","0","1","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("32","","0","","0","7","2","2017-05-23","12:50:33","0000-00-00","00:00:00","2017-05-23 12:50:33","2","0","1","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("33","","0","","0","7","2","2017-05-23","12:51:57","0000-00-00","00:00:00","2017-05-23 12:51:57","2","0","1","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("34","","0","","1","7","2","2017-05-23","12:52:02","0000-00-00","17:17:12","2017-05-23 12:52:02","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("35","","0","","5","4","1","2017-05-23","15:51:21","2017-05-23","15:59:16","2017-05-23 15:51:21","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("36","","0","","0","4","1","2017-05-23","15:51:22","0000-00-00","00:00:00","2017-05-23 15:51:22","2","0","1","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("37","","0","","1","1","1","2017-05-23","16:00:51","2017-06-22","11:35:07","2017-05-23 16:00:51","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("38","","0","","1","4","1","2017-06-20","17:43:26","2017-06-21","15:35:09","2017-06-20 17:43:26","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("39","","0","","1","1","1","2017-06-22","17:21:19","2017-07-07","17:25:14","2017-06-22 17:21:19","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("40","","0","","1","1","1","2017-07-07","17:27:14","2017-07-07","17:27:24","2017-07-07 17:27:14","2","0","0","0","0000-00-00 00:00:00","0","1","0");
INSERT INTO `occupy` VALUES("41","","0","","0","5","1","2017-07-10","12:18:26","2017-07-10","12:25:46","2017-07-10 12:18:26","2","0","0","0","0000-00-00 00:00:00","0","1","1");
INSERT INTO `occupy` VALUES("42","","0","","0","4","1","2017-07-10","12:28:58","0000-00-00","00:00:00","2017-07-10 12:28:58","2","0","1","0","0000-00-00 00:00:00","0","1","1");



DROP TABLE order;

CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `delivery_charge_against_inv` int(11) NOT NULL,
  `is_printed` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `printed_by` int(11) NOT NULL,
  `is_cancel` tinyint(1) NOT NULL,
  `cancel_against_inv` varchar(255) NOT NULL,
  `cancelled_reason` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;

INSERT INTO `order` VALUES("1","0","1","0","0","Cash Customer","0","","2","","1","1","100","10","10","13","110","14.3","0","0","124","-0.3","114","124","0","0","0","2017-04-20 13:25:00","2","0","0","0","0","0","1","0","");
INSERT INTO `order` VALUES("2","0","2","0","0","Cash Customer","0","","2","","1","1","400","10","40","13","440","57.2","0","0","497","-0.2","373","497","0","0","0","2017-04-20 14:07:28","2","0","0","0","0","0","1","0","");
INSERT INTO `order` VALUES("3","0","3","0","0","Cash Customer","0","","0","","1","1","400","10","40","13","440","57.2","0","0","497","-0.2","497","497","0","0","0","2017-04-20 15:29:37","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("4","0","4","0","0","Cash Customer","0","","0","","1","1","400","10","40","13","440","57.2","0","0","497","-0.2","497","497","0","0","0","2017-04-20 15:29:37","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("5","0","5","0","0","Cash Customer","0","","0","","0","0","100","10","10","13","110","14.3","0","0","124","-0.3","124","124","0","0","0","2017-04-20 15:29:51","2","1","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("6","0","6","0","0","Cash Customer","0","","0","","0","0","100","10","10","13","110","14.3","0","0","124","-0.3","124","124","0","0","0","2017-04-20 15:29:52","2","1","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("7","0","0","1","0","Cash Customer","0","","2","","1","1","100","10","10","13","110","14.3","0","0","124","-0.3","114","124","0","0","0","2017-04-20 15:47:57","2","0","0","0","0","0","1","1","sdasdfdsf");
INSERT INTO `order` VALUES("8","0","0","2","0","Cash Customer","0","","2","","1","1","400","10","40","13","440","57.2","0","0","497","-0.2","373","497","0","0","0","2017-04-20 15:50:23","2","0","0","0","0","0","1","2","qwerq wer ");
INSERT INTO `order` VALUES("9","0","7","0","0","Cash Customer","0","","2","","1","1","300","10","30","13","330","42.9","0","0","373","0.1","124","373","0","0","0","2017-04-20 16:45:13","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("10","0","8","0","0","Asdf","123","asdfasdf","0","123","0","0","600","10","60","13","660","85.8","0","0","746","0.2","746","746","0","0","0","2017-04-20 17:03:24","2","2","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("11","0","9","0","0","Asdf","123","asdfasdf","0","123","0","0","600","10","60","13","660","85.8","0","0","746","0.2","746","746","0","0","0","2017-04-20 17:07:11","2","2","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("12","0","10","0","0","Asdf","123","asdfasdf","0","","0","0","87","0","0","13","87","13","0","0","100","0","0","0","0","0","0","2017-04-20 17:07:12","2","3","9","0","0","0","0","0","");
INSERT INTO `order` VALUES("13","0","11","0","0","Asdf","123","asdfasdf","0","123123123","0","0","200","10","20","13","220","28.6","0","0","249","0.4","249","249","0","0","0","2017-04-20 17:08:55","2","2","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("14","0","12","0","0","Asdf","123","asdfasdf","0","","0","0","174","0","0","13","174","26","0","0","200","0","0","0","0","0","0","2017-04-20 17:08:56","2","3","11","0","0","0","0","0","");
INSERT INTO `order` VALUES("15","0","13","0","0","Asdfasdf","123123","asdfasdf","0","123123","0","0","500","10","50","13","550","71.5","0","0","622","0.5","622","622","0","0","0","2017-04-20 17:15:30","2","2","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("16","0","14","0","0","Asdfasdf","123123","asdfasdf","0","","0","0","43.5","0","0","13","43.5","6.5","0","0","50","0","0","0","0","0","0","2017-04-20 17:15:32","2","3","13","0","0","0","0","0","");
INSERT INTO `order` VALUES("17","0","15","0","0","Cash Customer","0","","2","","1","1","600","10","60","13","660","85.8","0","0","746","0.2","497","746","0","0","0","2017-04-21 08:22:44","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("18","0","16","0","0","Cash Customer","0","","2","","1","1","600","10","60","13","660","85.8","0","0","746","0.2","249","746","0","0","0","2017-04-21 08:23:54","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("19","0","17","0","0","Cash Customer","0","","2","","1","1","400","10","40","13","440","57.2","0","0","497","-0.2","497","497","0","0","0","2017-04-21 08:34:03","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("22","0","18","0","0","Cash Customer","0","","2","","1","1","400","10","40","13","440","57.2","0","0","497","-0.2","373","497","0","0","0","2017-04-23 17:05:02","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("23","0","19","0","0","Cash Customer","0","","2","","1","1","400","10","40","13","440","57.2","0","0","497","-0.2","124","497","0","0","0","2017-04-23 17:06:03","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("24","0","20","0","0","Sugen","0","","2","","1","1","400","10","40","13","440","57.2","0","0","497","-0.2","248","0","0","1","1","2017-04-23 17:17:16","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("25","0","21","0","0","Sugen","0","","2","","1","1","800","10","80","13","880","114.4","0","0","994","-0.4","745","0","0","1","1","2017-04-23 17:32:33","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("26","0","22","0","0","Cash Customer","0","","2","","1","1","400","10","40","13","440","57.2","0","0","497","-0.2","373","497","0","0","0","2017-04-23 18:20:26","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("27","0","23","0","0","Sugen","0","","2","","1","1","400","10","40","13","440","57.2","0","0","497","-0.2","248","0","0","1","1","2017-04-23 18:22:02","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("50","0","24","0","0","Cash Customer","0","","2","","1","1","400","10","40","13","440","57.2","0","0","497","-0.2","273","497","0","0","0","2017-04-24 17:07:31","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("51","0","25","0","0","Cash Customer","0","","2","","1","1","500","10","50","13","550","71.5","0","0","622","0.5","398","622","0","0","0","2017-04-25 08:12:26","2","0","0","0","0","0","1","0","");
INSERT INTO `order` VALUES("52","0","26","0","0","Sugen","0","","2","","1","1","400","10","40","13","440","57.2","0","0","497","-0.2","373","0","0","1","1","2017-04-25 08:13:35","2","0","0","0","0","0","1","0","");
INSERT INTO `order` VALUES("53","0","0","3","0","Sugen","0","","2","","1","1","400","10","40","13","440","57.2","0","0","497","-0.2","373","0","0","1","0","2017-04-25 08:21:07","2","0","0","0","0","0","1","26","sadasdfasdf");
INSERT INTO `order` VALUES("54","0","27","0","0","Sugen","0","","2","","1","1","400","10","40","13","440","57.2","0","0","497","-0.2","373","0","0","1","1","2017-04-25 08:24:27","2","0","0","0","0","0","1","0","");
INSERT INTO `order` VALUES("55","0","0","4","0","Cash Customer","0","","2","","1","1","500","10","50","13","550","71.5","0","0","622","0.5","398","622","0","0","0","2017-04-25 08:33:55","2","0","0","0","0","0","1","25","dfgasdf");
INSERT INTO `order` VALUES("56","0","0","5","0","Sugen","0","","2","","1","1","400","10","40","13","440","57.2","0","0","497","-0.2","373","0","0","1","0","2017-04-25 08:34:20","2","0","0","0","0","0","1","27","asdfasdf");
INSERT INTO `order` VALUES("57","0","28","0","0","Sugen","0","","2","","1","1","400","10","40","13","440","57.2","0","0","497","-0.2","124","0","0","1","1","2017-04-25 08:39:56","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("58","0","29","0","0","Cash Customer","0","","2","","2","1","600","10","60","13","660","85.8","0","0","746","0.2","746","746","0","0","0","2017-04-27 10:51:54","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("59","0","30","0","0","Cash Customer","0","","2","","2","1","600","10","60","13","660","85.8","0","0","746","0.2","746","746","0","0","0","2017-04-27 10:53:25","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("60","0","31","0","0","Cash Customer","0","","2","","2","1","600","10","60","13","660","85.8","0","0","746","0.2","746","746","0","0","0","2017-04-27 10:55:02","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("61","0","32","0","0","Cash Customer","0","","1","","4","1","350","10","35","13","385","50.05","0","0","435","-0.05","435","435","0","0","0","2017-04-27 10:55:56","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("62","0","33","0","0","Cash Customer","0","","1","","4","1","200","10","20","13","220","28.6","0","0","249","0.4","249","249","0","0","0","2017-04-27 10:58:07","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("63","0","34","0","0","Sugen","123123","adsasdf","0","123123","0","0","200","10","20","13","220","28.6","0","0","249","0.4","249","0","0","1","1","2017-05-15 12:36:33","2","2","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("64","0","35","0","0","Sadf","123","sadf","0","","1","1","1100","10","110","13","1210","157.31","0","0","1367","-0.31","1367","1400","33","0","0","2017-05-15 16:11:47","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("65","0","36","0","0","Cash Customer","0","","0","","1","1","1000","10","100","13","1100","143","0","0","1243","0","1243","1243","0","0","0","2017-05-15 16:16:24","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("66","0","37","0","0","Cash Customer","0","","0","","1","1","1000","10","100","13","1100","143","0","0","1243","0","1243","1243","0","0","0","2017-05-15 16:20:14","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("67","0","38","0","0","Cash Customer","0","","0","","1","1","1000","10","100","13","1100","143","0","0","1243","0","1243","1243","0","0","0","2017-05-15 16:20:54","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("68","0","39","0","3","Cash Customer","0","","0","","1","1","950","10","95","13","1045","135.85","0","0","1181","0.15","1181","1181","0","0","0","2017-05-15 16:20:58","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("69","0","40","0","3","Sugen","0","","2","","4","1","500","10","50","13","550","71.5","0","0","622","0.5","374","0","0","1","1","2017-05-15 16:22:32","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("70","0","41","0","0","Sugen","0","","2","","6","1","300","10","30","13","330","42.9","0","0","373","0.1","373","0","0","1","1","2017-05-18 16:37:19","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("71","0","42","0","0","Cash Customer","0","","2","","6","1","200","10","20","13","220","28.6","0","0","249","0.4","249","249","0","0","0","2017-05-18 16:37:36","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("72","0","43","0","0","Cash Customer","0","","0","","6","1","200","10","20","13","220","28.6","0","0","249","0.4","249","249","0","2","0","2017-05-18 16:38:01","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("73","0","44","0","0","Cash Customer","0","","0","","6","1","100","10","10","13","110","14.3","0","0","124","-0.3","124","124","0","0","0","2017-05-18 16:38:03","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("74","0","45","0","0","Dsfgdsfg","123213","dsfsdg","0","12341234","0","0","400","10","40","13","440","57.2","0","0","497","-0.2","497","497","0","0","0","2017-05-18 16:38:42","2","1","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("75","0","46","0","0","Sugen","123123","asdasdf","0","123123","0","0","300","10","30","13","330","42.9","0","0","373","0.1","373","0","0","1","1","2017-05-18 16:39:33","2","1","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("76","0","47","0","0","Asdfasdf","123123","asdfasdf","0","123123","0","0","300","10","30","13","330","42.9","0","0","373","0.1","373","373","0","0","0","2017-05-18 16:41:23","2","2","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("77","0","48","0","1","Asdfasdf","123123","asdfasdf","0","","0","0","69.6","0","0","13","69.6","10.4","0","0","80","0","0","0","0","0","0","2017-05-18 16:41:28","2","3","47","0","0","0","1","0","");
INSERT INTO `order` VALUES("78","0","49","0","0","Binit","0","thapathali","0","937944","0","0","100","10","10","13","110","14.3","0","0","124","-0.3","124","0","0","1","2","2017-05-23 12:05:56","2","1","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("79","0","50","0","1","Cash Customer","0","","5","","4","1","600","10","60","13","660","85.8","0","0","746","0.2","397","746","0","2","0","2017-05-23 12:11:00","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("80","0","51","0","0","Sugen","0","","5","","4","1","600","10","60","13","660","85.8","0","0","746","0.2","122","0","0","1","1","2017-05-23 15:59:14","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("81","0","52","0","0","Sugen","0","","2","","2","1","200","10","20","13","220","28.6","0","0","249","0.4","249","0","0","1","1","2017-05-31 12:42:06","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("82","0","53","0","0","Cash Customer","0","","2","","2","1","200","10","20","13","220","28.6","0","0","249","0.4","249","249","0","0","0","2017-05-31 12:50:06","2","0","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("83","0","54","0","0","Cash Customer","0","","0","","0","0","200","10","20","13","220","28.6","0","0","249","0.4","249","249","0","0","0","2017-05-31 12:50:31","2","1","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("84","0","55","0","0","Sugen","0","asdfasdf","0","123123123","0","0","300","10","30","13","330","42.9","0","0","373","0.1","373","0","0","1","1","2017-05-31 12:51:02","2","2","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("85","0","17-56","0","0","Asdfasdf","0","","0","123123123123","0","0","200","10","20","13","220","28.6","0","0","249","0.4","249","249","0","0","0","2017-06-02 17:13:27","2","4","0","0","0","0","0","0","");
INSERT INTO `order` VALUES("86","0","0","6","0","Asdfasdf","123123","asdfasdf","0","","0","0","69.6","0","0","13","69.6","10.4","0","0","80","0","0","0","0","0","0","2017-06-19 10:34:15","2","3","0","0","0","0","1","48","asdfasdf");
INSERT INTO `order` VALUES("87","0","17-57","0","1","Cash Customer","0","","1","","4","1","100","10","10","13","110","14.3","0","0","124","-0.3","124","124","0","0","0","2017-06-21 15:35:09","2","0","0","0","0","0","0","","");
INSERT INTO `order` VALUES("88","28","17-58","0","1","Cash Customer","0","","1","","5","1","100","10","10","13","110","14.3","0","0","124","-0.3","124","124","0","0","0","2017-06-22 11:32:55","2","0","0","0","0","0","0","","");
INSERT INTO `order` VALUES("89","0","17-59","0","0","Cash Customer","0","","0","","0","0","100","10","10","13","110","14.3","0","0","124","-0.3","124","124","0","0","0","2017-06-22 11:33:38","2","1","0","0","0","0","0","","");
INSERT INTO `order` VALUES("90","0","17-60","0","0","Cash Customer","0","","0","","0","0","100","10","10","13","110","14.3","0","0","124","-0.3","124","124","0","0","0","2017-06-22 11:33:38","2","1","0","0","0","0","0","","");
INSERT INTO `order` VALUES("91","0","17-61","0","0","Asdfasdf","0","","0","123123123","0","0","100","10","10","13","110","14.3","0","0","124","-0.3","124","124","0","0","0","2017-06-22 11:34:38","2","4","0","0","0","0","0","","");
INSERT INTO `order` VALUES("92","0","17-62","0","0","Asdfdsdf","0","sadfasdfsadf","0","123123123","0","0","100","10","10","13","110","14.3","0","0","124","-0.3","124","124","0","0","0","2017-06-22 11:34:55","2","2","0","0","0","0","0","","");
INSERT INTO `order` VALUES("93","37","17-63","0","1","Cash Customer","0","","1","","1","1","2600","10","260","13","2860","371.8","0","0","3232","0.2","616","3232","0","0","0","2017-06-22 11:35:06","2","0","0","0","0","0","0","","");
INSERT INTO `order` VALUES("94","34","17-64","0","0","Cash Customer","0","","0","","7","2","300","10","30","13","330","42.9","0","0","373","0.1","373","373","0","0","0","2017-06-22 17:17:11","2","0","0","0","0","0","0","","");
INSERT INTO `order` VALUES("95","34","17-65","0","0","Cash Customer","0","","0","","7","2","150","10","15","13","165","21.45","0","0","186","-0.45","186","186","0","0","0","2017-06-22 17:17:12","2","0","0","0","0","0","0","","");
INSERT INTO `order` VALUES("96","39","17-66","0","0","Cash Customer","0","","1","","1","1","150","10","15","13","165","21.45","0","0","186","-0.45","186","186","0","0","0","2017-07-07 15:23:12","2","0","0","0","0","0","0","","");
INSERT INTO `order` VALUES("97","39","17-67","0","0","Sugen","0","","1","","1","1","100","10","10","13","110","14.3","0","0","124","-0.3","124","0","0","1","1","2017-07-07 15:28:08","2","0","0","0","0","0","0","","");
INSERT INTO `order` VALUES("98","39","17-68","0","0","Cash Customer","0","","1","","1","1","200","10","20","13","220","28.6","0","0","249","0.4","249","249","0","0","0","2017-07-07 15:28:20","2","0","0","0","0","0","0","","");
INSERT INTO `order` VALUES("99","39","17-69","0","0","Cash Customer","0","","1","","1","1","100","10","10","13","110","14.3","0","0","124","-0.3","124","124","0","0","0","2017-07-07 15:33:47","2","0","0","0","0","0","0","","");
INSERT INTO `order` VALUES("100","39","17-70","0","0","Cash Customer","0","","1","","1","1","200","10","20","13","220","28.6","0","0","249","0.4","249","249","0","0","0","2017-07-07 15:36:02","2","0","0","0","0","0","0","","");
INSERT INTO `order` VALUES("101","39","17-71","0","0","Cash Customer","0","","1","","1","1","400","10","40","13","440","57.2","0","0","497","-0.2","497","497","0","0","0","2017-07-07 15:37:50","2","0","0","0","0","0","0","","");
INSERT INTO `order` VALUES("102","39","17-72","0","0","Binit","0","","1","","1","1","200","10","20","13","220","28.6","0","0","249","0.4","249","0","0","1","2","2017-07-07 15:43:33","2","0","0","0","0","0","0","","");
INSERT INTO `order` VALUES("103","39","17-73","0","1","Cash Customer","0","","1","","1","1","100","10","10","13","110","14.3","0","0","124","-0.3","124","124","0","0","0","2017-07-07 15:55:51","2","0","0","0","0","0","0","","");
INSERT INTO `order` VALUES("104","39","17-74","0","0","Cash Customer","0","","1","","1","1","550","10","55","13","605","78.66","0","0","684","0.34","684","684","0","0","0","2017-07-07 17:25:13","2","0","0","0","1","0","1","","");
INSERT INTO `order` VALUES("105","40","17-75","0","0","","0","","1","","1","1","100","10","10","13","110","14.3","0","0","124","-0.3","124","124","0","0","0","2017-07-07 17:27:22","2","0","0","0","0","0","1","","");
INSERT INTO `order` VALUES("106","0","","7","0","","0","","1","","1","1","100","10","10","13","110","14.3","0","0","124","-0.3","124","124","0","0","0","2017-07-07 17:41:27","2","0","0","0","0","0","1","17-75","sasdasd");
INSERT INTO `order` VALUES("107","0","","8","0","Cash Customer","0","","1","","1","1","550","10","55","13","605","78.66","0","0","684","0.34","684","684","0","0","0","2017-07-10 14:14:29","2","0","0","0","0","0","1","17-74","dasfasdf");



DROP TABLE order_items;

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

INSERT INTO `order_items` VALUES("1","1","3","2","50","0");
INSERT INTO `order_items` VALUES("2","2","1","4","100","0");
INSERT INTO `order_items` VALUES("3","3","2","2","200","0");
INSERT INTO `order_items` VALUES("4","4","2","2","200","0");
INSERT INTO `order_items` VALUES("5","5","1","1","100","0");
INSERT INTO `order_items` VALUES("6","6","1","1","100","0");
INSERT INTO `order_items` VALUES("7","9","1","2","100","0");
INSERT INTO `order_items` VALUES("8","9","3","2","50","0");
INSERT INTO `order_items` VALUES("9","10","1","2","100","0");
INSERT INTO `order_items` VALUES("10","10","2","2","200","0");
INSERT INTO `order_items` VALUES("11","11","1","2","100","0");
INSERT INTO `order_items` VALUES("12","11","2","2","200","0");
INSERT INTO `order_items` VALUES("13","13","1","2","100","0");
INSERT INTO `order_items` VALUES("14","15","1","5","100","0");
INSERT INTO `order_items` VALUES("15","17","1","2","100","0");
INSERT INTO `order_items` VALUES("16","17","2","2","200","0");
INSERT INTO `order_items` VALUES("23","22","1","4","100","0");
INSERT INTO `order_items` VALUES("24","23","1","4","100","0");
INSERT INTO `order_items` VALUES("25","24","1","4","100","0");
INSERT INTO `order_items` VALUES("26","25","2","4","200","0");
INSERT INTO `order_items` VALUES("27","26","1","4","100","0");
INSERT INTO `order_items` VALUES("42","50","1","4","100","0");
INSERT INTO `order_items` VALUES("43","51","1","5","100","0");
INSERT INTO `order_items` VALUES("44","52","1","4","100","0");
INSERT INTO `order_items` VALUES("45","54","1","4","100","0");
INSERT INTO `order_items` VALUES("46","57","1","4","100","0");
INSERT INTO `order_items` VALUES("47","60","1","2","100","0");
INSERT INTO `order_items` VALUES("48","60","2","2","200","0");
INSERT INTO `order_items` VALUES("49","61","1","3","100","0");
INSERT INTO `order_items` VALUES("50","61","3","1","50","0");
INSERT INTO `order_items` VALUES("51","62","1","2","100","0");
INSERT INTO `order_items` VALUES("52","63","1","2","100","0");
INSERT INTO `order_items` VALUES("53","67","1","10","100","0");
INSERT INTO `order_items` VALUES("54","68","2","2","200","0");
INSERT INTO `order_items` VALUES("55","68","3","4","50","0");
INSERT INTO `order_items` VALUES("56","68","11","2","100","0");
INSERT INTO `order_items` VALUES("57","68","4","2","75","0");
INSERT INTO `order_items` VALUES("58","69","1","5","100","0");
INSERT INTO `order_items` VALUES("59","70","1","2","100","0");
INSERT INTO `order_items` VALUES("60","70","3","2","50","0");
INSERT INTO `order_items` VALUES("61","71","1","2","100","0");
INSERT INTO `order_items` VALUES("62","72","1","2","100","0");
INSERT INTO `order_items` VALUES("63","73","3","2","50","0");
INSERT INTO `order_items` VALUES("64","74","1","4","100","0");
INSERT INTO `order_items` VALUES("65","75","1","2","100","0");
INSERT INTO `order_items` VALUES("66","75","3","2","50","0");
INSERT INTO `order_items` VALUES("67","76","1","2","100","0");
INSERT INTO `order_items` VALUES("68","76","3","2","50","0");
INSERT INTO `order_items` VALUES("69","78","1","1","100","0");
INSERT INTO `order_items` VALUES("70","79","1","1","100","0");
INSERT INTO `order_items` VALUES("71","79","11","1","100","0");
INSERT INTO `order_items` VALUES("72","79","26","1","100","0");
INSERT INTO `order_items` VALUES("73","79","31","1","300","0");
INSERT INTO `order_items` VALUES("74","80","1","1","100","0");
INSERT INTO `order_items` VALUES("75","80","11","1","100","0");
INSERT INTO `order_items` VALUES("76","80","26","1","100","0");
INSERT INTO `order_items` VALUES("77","80","31","1","300","0");
INSERT INTO `order_items` VALUES("78","81","11","2","100","0");
INSERT INTO `order_items` VALUES("79","82","11","2","100","0");
INSERT INTO `order_items` VALUES("80","83","1","2","100","0");
INSERT INTO `order_items` VALUES("81","84","11","3","100","0");
INSERT INTO `order_items` VALUES("82","85","1","2","100","0");
INSERT INTO `order_items` VALUES("83","87","1","1","100","0");
INSERT INTO `order_items` VALUES("84","88","1","1","100","0");
INSERT INTO `order_items` VALUES("85","89","1","1","100","0");
INSERT INTO `order_items` VALUES("86","90","1","1","100","0");
INSERT INTO `order_items` VALUES("87","91","1","1","100","0");
INSERT INTO `order_items` VALUES("88","92","1","1","100","0");
INSERT INTO `order_items` VALUES("89","93","1","5","100","0");
INSERT INTO `order_items` VALUES("90","93","2","3","200","0");
INSERT INTO `order_items` VALUES("91","93","11","3","100","0");
INSERT INTO `order_items` VALUES("92","93","26","1","100","0");
INSERT INTO `order_items` VALUES("93","93","31","2","300","0");
INSERT INTO `order_items` VALUES("94","93","27","1","200","0");
INSERT INTO `order_items` VALUES("95","93","12","1","200","0");
INSERT INTO `order_items` VALUES("96","93","28","2","50","0");
INSERT INTO `order_items` VALUES("97","94","1","1","100","0");
INSERT INTO `order_items` VALUES("98","94","2","1","200","0");
INSERT INTO `order_items` VALUES("99","95","6","1","100","0");
INSERT INTO `order_items` VALUES("100","95","3","1","50","0");
INSERT INTO `order_items` VALUES("101","96","4","2","75","0");
INSERT INTO `order_items` VALUES("102","97","1","1","100","0");
INSERT INTO `order_items` VALUES("103","98","32","1","200","0");
INSERT INTO `order_items` VALUES("104","99","1","1","100","0");
INSERT INTO `order_items` VALUES("105","100","32","1","200","0");
INSERT INTO `order_items` VALUES("106","101","32","2","200","0");
INSERT INTO `order_items` VALUES("107","102","32","1","200","0");
INSERT INTO `order_items` VALUES("108","103","1","1","100","0");
INSERT INTO `order_items` VALUES("109","104","1","2","100","0");
INSERT INTO `order_items` VALUES("110","104","2","1","200","0");
INSERT INTO `order_items` VALUES("111","104","4","2","75","0");
INSERT INTO `order_items` VALUES("112","105","1","1","100","0");



DROP TABLE pick_up;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO `pick_up` VALUES("4","asdf","0","","1231213123","2017-06-02 17:03:11","2","0","0");
INSERT INTO `pick_up` VALUES("5","asdfasdf","0","","123123123","2017-06-02 17:05:42","2","0","0");
INSERT INTO `pick_up` VALUES("6","asdfasdf","0","","123123123123","2017-06-02 17:11:34","2","1","1");
INSERT INTO `pick_up` VALUES("7","asdfasdf","0","","123123123","2017-06-22 11:34:31","2","1","0");
INSERT INTO `pick_up` VALUES("8","asdfasdfsadf","0","","1231231223","2017-06-22 17:21:32","2","0","0");
INSERT INTO `pick_up` VALUES("9","asdf","0","asdfasdf","12312323142","2017-07-04 15:48:17","2","0","0");



DROP TABLE printer_list;

CREATE TABLE `printer_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE printer_lists;

CREATE TABLE `printer_lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `printer_lists` VALUES("1","[{\"NAME\":\"Send To OneNote 2013\",\"DESCRIPTION\":\"Send To OneNote 2013,Send to Microsoft OneNote 15 Driver,\",\"COMMENT\":\"\"},{\"NAME\":\"Samsung SCX-3400 Series\",\"DESCRIPTION\":\"Samsung SCX-3400 Series,Samsung SCX-3400 Series Class Driver,\",\"COMMENT\":\"\"},{\"NAME\":\"Microsoft XPS Document Writer\",\"DESCRIPTION\":\"Microsoft XPS Document Writer,Microsoft XPS Document Writer v4,\",\"COMMENT\":\"\"},{\"NAME\":\"Microsoft Print to PDF\",\"DESCRIPTION\":\"Microsoft Print to PDF,Microsoft Print To PDF,\",\"COMMENT\":\"\"},{\"NAME\":\"Fax\",\"DESCRIPTION\":\"Fax,Microsoft Shared Fax Driver,\",\"COMMENT\":\"\"},{\"NAME\":\"epson\",\"DESCRIPTION\":\"epson,EPSON TM-U220 ReceiptE4,\",\"COMMENT\":\"\"},{\"NAME\":\"Brother DCP-T700W\",\"DESCRIPTION\":\"Brother DCP-T700W,Brother Generic Jpeg Type2 Class Driver,\",\"COMMENT\":\"\"}]");



DROP TABLE printers;

CREATE TABLE `printers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `printer_name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `printers` VALUES("5","bill","bill","epson");
INSERT INTO `printers` VALUES("6","kitchen","kitchen","");
INSERT INTO `printers` VALUES("7","bar","bar","");
INSERT INTO `printers` VALUES("8","bakery","bakery","");



DROP TABLE purchase;

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `purchase` VALUES("1","9","2000","2017-05-23 16:12:45","2");



DROP TABLE random;

CREATE TABLE `random` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field_name` text NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO `random` VALUES("1","current_year","2017");
INSERT INTO `random` VALUES("2","admin_mac_address","F8-A9-63-27-FC-B7");
INSERT INTO `random` VALUES("7","delivery_charge_amount","80");
INSERT INTO `random` VALUES("8","delivery_charge_vat_status","inclusive");
INSERT INTO `random` VALUES("10","current_year_for_invoice","2017-07-16");
INSERT INTO `random` VALUES("11","document","<h3>Information, Terms & User Manual for TRUFFLE</h3>        	<h3>Following User Guide aims to inform about some of the variations on Truffle Software.</h3>        	<p>The information pertained in this documents relates to the following versions of TRUFFLE software.</p>    		<ol>        		<li>TRUFFLE Lite PAN</li>        		<li>TRUFFLE Lite VAT</li>        		<li>TRUFFLE Pro PAN</li>        		<li>TRUFFLE Pro VAT</li>    		</ol>        	<h3>License:</h3>        	<p>TRUFFLE Software and all its variations are the property of Klient Scape Software Pvt. Ltd. The License to use the software must be authorised by Klient Scape Software Pvt. Ltd.</p>         	<p>For the purposes of this manual, unless otherwise stated, all versions are collective named ‘Truffle’. Klient Scape Software will be named as ‘Company’ and the license holders to use the software will be called ‘Clients’. Anyone using the software will be collectively called in as ‘Users’.</p>        	<h3>Agreement</h3>        	<p>Users are authorised to use the functions provided within the software. Users are not allowed to copy, distribute or share any information within the software to anyone without the consent of the Company. Users may not change the functionality of the software under any circumstance and failure to abide by these terms are considered breach of contract, and the company may pursue legal action.</p>        	<h3>How To:</h3>        	<h3>Create Users:</h3>        	<p>Administrators are allowed to create users, the number of users allowed to create depends on the version. Pro versions allow for unlimited number of users.</p>        	<h3>Assign Access Roles</h3>        	<p>There are 2 access roles – Admin and Staff</p>        	<p>Users with admin levels access are privy to all the features available in Truffle. Admin can provide up to 90% in discounts and authorise sales returns. Admins can also view all the analysis and are entered into a dashboard view once logged in to see the overview of the restaurant.</p>        	<p>Users with Staff access roles are directly logged into the restaurant view and are not privy to all the data within the software. Staff can also be enrolled with up to 90% discounts. However, an admin must assign which staff to allocate the % of discount.</p>        	<h3>Dashboard View:</h3>        	<p>Dashboard view allows a quick glance of the restaurant in terms of financial prospective. Debtors list and transaction history are conveniently located at the upper left corner of the dashboard view. A large section occupies a bar graph relating to total sales and total cash-in. Note: Total sales can be different from total cash in.</p>        	<p>The three boxes underneath shows overall sales, current month sales, and current day sales.</p>        	<p>The total report section shows the total number of customers, average sales per customer and average sales per person along with average time each table gets occupied.</p>        	<p>The today’s summary section in the dashboard is one of the handiest tools that shows all the relevant information of current day status.</p>        	<h3>Capacity Rate:</h3>        	<p>The capacity rate shows the rate in which the restaurant capacity is being utilised. If the restaurant has a capacity of 100 seats, 100 customers a day would make a 100% capacity rate. </p>        	<p>The dashboard offers to set a capacity rate under the heading of ‘Change Restaurant Capacity.’</p>        	<p>Difference between Total Sales and Cash IN:</p>        	<p>The Total sales amount shows the actual sales the restaurant has made, that is all cash sales, all credit sales and does not include service charge or the VAT payable from sales.</p>        	<p>The Cash in amount shows only the cash that has been received, i.e Cash sales, credit collection, tips received, service charge, VAT amount etc. This feature is handy to calculate all the sum received during the day.</p>        	<h3>Best Sellers:</h3>        	<p>The dashboard offers a best sellers section conveniently placed to show the best selling items for current day, current month, current year and ALL time.</p>        	<h3>Best Sellers – Gross sales.</h3>        	<p>The dashboard also offers a best sellers in accordance to the revenue generated by each item in the menu. </p>        	<h3>Table View:</h3>        	<h3>Table Layout</h3>        	<p>Pro versions allow for unlimited sections and tables. In lite version, sections are limited but unlimited tables can be created, provided it fits the screen. </p>        	<p>To create a new table, drag the table icon to section area and place it there. From there you can resize, rename any tables. You can also create obstacles to create a restaurant design that best suits the user.</p>        	<p>Once the design of the restaurant is complete, admins can lock the tables and the obstacles.</p>        	<p>Merge Table:To merge table, check if the lock key in the table area is set to unlocked. Drag a the table you want to merge and connect it to another table. The colour of the table changes if it is merged.</p>        	<h3>Take-away, pick-up and delivery:</h3>        	<p>These areas are useful to take orders in accordance to their needs, for customers that are not eating in. You can choose to charge ‘service charge’ according to your desire through the settings area, i.e. you can choose if eat in customers have service charge and take away customers be exempt from it or charge 5% delivery rate. </p>        	<h3>Taking orders:</h3>        	<p>In order to take orders, a menu must be created. To create a menu, under the third settings, under the category of Menu Items, you can add, edit and deactivate menu items. Once menu items are created, orders can be taken through tables or through pick-ups and deliveries.<p>        	<p>To take an order in a table, users should click on the items on the order screen and send to KOT. Once KOT is created, it automatically sends it to the billing area. Users can take more KOTs and send to respective areas, and billing is automatically adjusted.</p>        	<h3>Menu Category:</h3>        	<p>Truffle allows for sending KOT’s to different printers; i.e you can print kitchen orders to kitchen, bar orders to bar. You can create unlimited categories in the pro versions, while the category numbers are restricted to Lite versions.</p>        	<p>Categories are also useful for analysis in terms of items of how certain categories are being sold compared to others. This can be checked through category summary under the second setting sections.</p>        	<h3>Stock:</h3>        	<p>TRUFLLE Pro allows for stock counting. In order to utilize this feature, entries should be made to show opening stock and menu items should reflect the items that it requires to finish producing a menu item.</p>        	<h3>FOC:</h3>        	<p>FOC refers to free-of-cost, as these items will deduct stock but for various reason, requires the cost to be FOC. FOC requires a password that can be set by admins in the settings section.</p>        	<h3>Utensils Stock Manager:</h3>        	<p>Utensils Stock manager allows users to count and adjust all the utensils, i.e. spoons, knives, ash-tray, plates etc. </p>        	<h3>Bill payment:</h3>        	<p>When a customer asks for a bill in their table, under the billing list in the order view, the $ sign allows to make bill payment. Here users can choose to make full cash payments, make partial payments, bank payments or provide full credit payments. Regardless of the payment method, Truffle will create a bill and save it. The print button will print the customer bill, and print and close button will print the bill and close the table. The print temporary option allows to check the printed version of the bill for corrections before closing the bill. Note: The print temporary bill is not an actual invoice, but a mock-up that does not show the companies name, VAT information etc.</p>         	<h3>VAT REPORT:</h3>        	<p>Vat report shows the VAT report in the manner of Nepal VAT sales ledger book. It shows Total Amount, Total taxable amount, VAT percent and VAT Amount with breakdown of all the invoices. The date allows you to sort through VAT reports in accordance to their dates.</p>        	<h3>Fiscal Year</h3>        	<p>Fiscal Years are automatically calculated. Truffle uses proprietary methods to not allow users to make entries as dates are set and all entries time-stamped within the software. Users are not allowed to make entries on a different date. Users are allowed make new entries for up to 10 days after the fiscal year ends, to make changes wherever necessary. </p>        	<p class=\"text-center\">For further help, Contact <span class=\"text-decoration-underline\"> KlientScape Software, 01-4425513 or 01-6201374 </span> or visit us at our Offices in BIshalnagar-5.</p>");



DROP TABLE settings;

CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `slug` varchar(100) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `is_permanent` tinyint(4) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

INSERT INTO `settings` VALUES("30","master password","admin","master-password","1","1","2016-09-22 10:13:40");
INSERT INTO `settings` VALUES("31","name in bill","Company Name Pvt. Ltd.","name-in-bill","1","1","2016-09-28 20:30:25");
INSERT INTO `settings` VALUES("32","address in bill","company address","address-in-bill","1","1","2016-09-28 20:30:58");
INSERT INTO `settings` VALUES("33","phone no in bill","company phone no.","phone-no-in-bill","1","1","2016-09-28 20:31:31");
INSERT INTO `settings` VALUES("34","vat no in bill","111111111","vat-no-in-bill","1","1","2016-09-28 20:32:15");
INSERT INTO `settings` VALUES("35","thank you note in bill","Happy customer.","thank-you-note-in-bill","1","1","2016-09-28 20:32:44");
INSERT INTO `settings` VALUES("37","lock obstacle","no","lock-obstacle","1","1","2016-10-29 21:44:17");
INSERT INTO `settings` VALUES("40","lock table","no","lock-table","1","1","2016-11-04 10:25:17");
INSERT INTO `settings` VALUES("41","service charge rate","10","service-charge-rate","1","1","2016-11-04 12:51:14");
INSERT INTO `settings` VALUES("42","take away service charge rate","10","take-away-service-charge-rate","1","1","2016-11-17 17:07:58");
INSERT INTO `settings` VALUES("45","delivery service charge rate","10","delivery-service-charge-rate","1","1","2017-01-10 15:40:45");
INSERT INTO `settings` VALUES("46","send report email 1","sugentuladhar@gmail.com","send-report-email-1","1","1","2017-03-29 14:43:50");
INSERT INTO `settings` VALUES("47","send report email 2","gaurav@klientscape.com","send-report-email-2","1","1","2017-03-29 14:44:10");
INSERT INTO `settings` VALUES("48","send report email 3","sugen@klientscape.com","send-report-email-3","1","1","2017-03-29 14:44:23");
INSERT INTO `settings` VALUES("49","vat rate","13","vat-rate","1","1","2017-04-19 16:44:35");
INSERT INTO `settings` VALUES("50","pick up service charge rate","10","pick-up-service-charge-rate","1","1","2017-06-02 17:04:27");



DROP TABLE special_order_items;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `special_order_items` VALUES("1","special item 1 asdfsadfsadf","200","Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident","asdf sadsadfasdf asdf asdfasdf asd fasd fasdf asd f","1","","2017-04-13 11:46:30","2");
INSERT INTO `special_order_items` VALUES("2","special item 2","200","Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident","asdf asdf asdf sadf asdf asdf asdf asdf asd fasd fasdf asdf asdf asd fasd f","4","","2017-04-13 11:46:49","2");



DROP TABLE stock_entries;

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

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



DROP TABLE stock_items;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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



DROP TABLE sync_detail;

CREATE TABLE `sync_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order` int(11) NOT NULL,
  `order_items` int(11) NOT NULL,
  `menu_category` int(11) NOT NULL,
  `menu_item` int(11) NOT NULL,
  `settings` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `last_updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE table_details;

CREATE TABLE `table_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` text NOT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO `table_details` VALUES("1","Table - 1","1","0","2017-04-17 17:42:45","2017-04-17 17:42:45","2","0.767526","19.8405","18.7311","7.68668","","0");
INSERT INTO `table_details` VALUES("2","Table - 2","1","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","28.5619","67.9616","16.6163","26.2811","","0");
INSERT INTO `table_details` VALUES("3","Table - 3","1","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","62.7357","38.5338","15.1057","8.05271","","0");
INSERT INTO `table_details` VALUES("4","Table - 4","1","1","0000-00-00 00:00:00","0000-00-00 00:00:00","2","14.1211","13.1991","33.4452","7.57812","","0");
INSERT INTO `table_details` VALUES("5","Table - 5","1","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","33.9035","37.0728","13.0872","7.34375","","0");
INSERT INTO `table_details` VALUES("6","Table - 6","1","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","62.7582","0","20.8459","7.9063","","0");
INSERT INTO `table_details` VALUES("7","Table - 7","2","0","2017-05-23 12:51:51","2017-05-23 12:51:51","2","15.0577","112.238","15.1057","8.05271","","0");
INSERT INTO `table_details` VALUES("8","Table - 8","2","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","32.1875","106.04","12.9754","8.04688","","0");
INSERT INTO `table_details` VALUES("9","Table - 9","2","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","50.1316","111.756","15.1057","8.05271","","0");
INSERT INTO `table_details` VALUES("10","Table - 10","2","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","8.52057","137.635","15.1057","8.05271","","0");
INSERT INTO `table_details` VALUES("11","Table - 11","2","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","57.657","139.511","15.1057","8.05271","","0");
INSERT INTO `table_details` VALUES("12","Table - 12","2","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","11.2532","165.856","15.1057","8.05271","","0");
INSERT INTO `table_details` VALUES("13","Table - 13","2","0","0000-00-00 00:00:00","0000-00-00 00:00:00","2","53.729","166.538","15.1057","8.05271","","0");



DROP TABLE take_away;

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

INSERT INTO `take_away` VALUES("1","asdf","0","asdf","123","2017-04-13 10:35:40","2","0","0");
INSERT INTO `take_away` VALUES("2","asdf","0","asdfasdf","123","2017-04-13 12:10:30","2","1","0");
INSERT INTO `take_away` VALUES("3","asdf","0","asdf","123","2017-04-17 15:56:24","2","0","0");
INSERT INTO `take_away` VALUES("4","asdfasdf","213123","asdf","123","2017-04-18 10:42:39","2","0","0");
INSERT INTO `take_away` VALUES("5","asdf","12","sadasf","2134234","2017-04-19 15:45:44","2","0","0");
INSERT INTO `take_away` VALUES("6","adsf","123","asdf","123","2017-04-19 18:02:51","2","1","0");
INSERT INTO `take_away` VALUES("7","dsfgdsfg","123213","dsfsdg","12341234","2017-05-18 16:38:23","2","1","0");
INSERT INTO `take_away` VALUES("8","asdfasdf","123123","asdasdf","123123","2017-05-18 16:38:58","2","1","0");
INSERT INTO `take_away` VALUES("9","binit","0","thapathali","937944","2017-05-23 12:01:51","2","1","0");
INSERT INTO `take_away` VALUES("10","","0","","","2017-05-31 12:50:13","2","1","0");
INSERT INTO `take_away` VALUES("11","","0","","","2017-06-22 11:33:27","2","1","0");
INSERT INTO `take_away` VALUES("12","","0","","","2017-06-22 17:18:48","2","0","0");



DROP TABLE temp_items;

CREATE TABLE `temp_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `occupy_id` int(11) NOT NULL,
  `take_away_id` int(11) NOT NULL,
  `pick_up_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

INSERT INTO `temp_items` VALUES("13","8","0","0","0","1","2","100","0");
INSERT INTO `temp_items` VALUES("14","8","0","0","0","3","2","50","0");
INSERT INTO `temp_items` VALUES("15","8","0","0","0","2","2","200","0");
INSERT INTO `temp_items` VALUES("16","8","0","0","0","4","2","75","0");
INSERT INTO `temp_items` VALUES("17","0","3","0","0","1","2","100","0");
INSERT INTO `temp_items` VALUES("18","0","3","0","0","11","2","100","0");
INSERT INTO `temp_items` VALUES("19","0","3","0","0","12","2","200","0");
INSERT INTO `temp_items` VALUES("20","0","3","0","0","13","2","50","0");
INSERT INTO `temp_items` VALUES("21","0","4","0","0","1","2","100","0");
INSERT INTO `temp_items` VALUES("22","0","4","0","0","3","2","50","0");
INSERT INTO `temp_items` VALUES("23","0","4","0","0","5","2","125","0");
INSERT INTO `temp_items` VALUES("38","0","5","0","0","1","1","100","0");
INSERT INTO `temp_items` VALUES("39","0","5","0","0","2","1","200","0");
INSERT INTO `temp_items` VALUES("40","0","5","0","0","4","1","75","0");
INSERT INTO `temp_items` VALUES("41","0","0","0","3","1","2","100","0");
INSERT INTO `temp_items` VALUES("42","0","0","0","3","2","1","200","0");
INSERT INTO `temp_items` VALUES("44","0","0","0","4","1","4","100","0");
INSERT INTO `temp_items` VALUES("72","0","12","0","0","1","1","100","0");
INSERT INTO `temp_items` VALUES("73","0","12","0","0","6","2","100","0");
INSERT INTO `temp_items` VALUES("74","0","12","0","0","2","3","200","0");
INSERT INTO `temp_items` VALUES("75","0","12","0","0","3","3","50","0");
INSERT INTO `temp_items` VALUES("76","0","12","0","0","4","3","75","0");
INSERT INTO `temp_items` VALUES("77","0","12","0","0","5","2","125","0");
INSERT INTO `temp_items` VALUES("78","0","12","0","0","11","2","100","0");
INSERT INTO `temp_items` VALUES("79","0","12","0","0","12","2","200","0");
INSERT INTO `temp_items` VALUES("80","0","12","0","0","13","2","50","0");
INSERT INTO `temp_items` VALUES("81","0","12","0","0","14","2","75","0");
INSERT INTO `temp_items` VALUES("82","0","12","0","0","15","2","125","0");
INSERT INTO `temp_items` VALUES("83","0","12","0","0","26","1","100","0");
INSERT INTO `temp_items` VALUES("84","0","12","0","0","28","1","50","0");
INSERT INTO `temp_items` VALUES("85","0","12","0","0","30","1","125","0");
INSERT INTO `temp_items` VALUES("86","0","12","0","0","27","1","200","0");
INSERT INTO `temp_items` VALUES("87","0","12","0","0","29","1","75","0");
INSERT INTO `temp_items` VALUES("88","0","12","0","0","31","1","300","0");



DROP TABLE temp_order_list;

CREATE TABLE `temp_order_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `occupy_id` int(11) NOT NULL,
  `take_away_id` int(11) NOT NULL,
  `pick_up_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;




DROP TABLE tips;

CREATE TABLE `tips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` float NOT NULL,
  `type` tinyint(1) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `tips` VALUES("1","200","0","2017-04-13 14:54:14","2");
INSERT INTO `tips` VALUES("2","50","1","2017-04-13 14:55:52","2");
INSERT INTO `tips` VALUES("3","20","1","2017-04-19 14:33:48","2");



DROP TABLE user;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `user` VALUES("1","Super Admin","","0","0","","0","superadmin","$2y$13$zNgfxhx1KILBSqPSy2G0n.AWRmCt4DQojmDuiQcTlYuYoB38E8fUS","5VmLKVrUUGUPgnXEp9IuqaVdk7pXQxXK","","","","100","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","2d2d525d0ab95e524caa3f915b61b66c");
INSERT INTO `user` VALUES("2","Administrator","Kathmandu","9801116771","15639419","gaurav@klientscape.com","user-profile-pic_1494500116.jpg","administrator","$2y$13$xMfbB8n1BhIpWy0MjJPQmesxt3C/OxCmVPSvJ.AYDbJ.Yyz0GQu0G","kAdzZNRkmZu6RbNfz3L4fTEdtfrWWb6h","Owner","p7K4ZugASjo=","%!4Txj)p","90","1","2016-08-25 06:49:46","1","2017-02-27 13:24:07","1f0b1416f1fed6a41c067e2c87c72f94");
INSERT INTO `user` VALUES("5","Dinesh Prajapati","thimi","9801116780","0","dinesh@klientscape.com","0","staff","$2y$13$38ZLZVJacCDv8seaHZJiU.0ec0jseBkuyHTuPZyd8M7w7O3KYQGre","1P863mId6OnFEhCCD9zdkH9O5n7h6Kj7","web developer","A8gtUstg4RI=","iDzZY[(E","20","1","2016-09-13 14:24:32","2","2017-02-27 13:24:34","3eab4691860ef2cd94e85727a089ac94");
INSERT INTO `user` VALUES("6","sugen","lazimpat","9810110011","0","sugen@gmail.com","","sugen","$2y$13$UQwGgEUsr1sLsGKuDtgXGuDND7SMbC8ZC9VCD49RRX9kwe7lWKduu","1P863mId6OnFEhCCD9zdkH9O5n7h6Kj7","web developer","YVeSpbqHIwI=","gc-tBp{A","30","1","2017-01-04 15:36:09","2","2017-03-09 10:37:16","fc6046fd0e52fb77828ab6f5c6b60b44");
INSERT INTO `user` VALUES("7","Promish","bishalnagar","9801110011","0","promish@gmail.com","","promish","$2y$13$YANvx9YA.yNyNwaaO6fQMeQsl3VQbttKfhs65/o69MVv9k3kyDodu","1P863mId6OnFEhCCD9zdkH9O5n7h6Kj7","Designer","osfU97qXUTY=","z@bdpui0","50","1","2017-03-09 10:40:06","2","0000-00-00 00:00:00","");



DROP TABLE utensils_stock_entries;

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

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



DROP TABLE utensils_stock_items;

CREATE TABLE `utensils_stock_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO `utensils_stock_items` VALUES("5","utensils item 1","10","1","2017-05-22 17:42:35","2");
INSERT INTO `utensils_stock_items` VALUES("6","utensils item 2","15","1","2017-05-22 17:42:35","2");
INSERT INTO `utensils_stock_items` VALUES("7","utensils item 3","5","1","2017-05-22 17:42:35","2");
INSERT INTO `utensils_stock_items` VALUES("8","utensils item 4","20","1","2017-05-22 17:42:35","2");
INSERT INTO `utensils_stock_items` VALUES("9","item 1","10","1","2017-05-23 12:25:35","2");
INSERT INTO `utensils_stock_items` VALUES("10","item  2","2","1","2017-05-23 12:25:35","2");
INSERT INTO `utensils_stock_items` VALUES("11","item 3","5","1","2017-05-23 12:25:35","2");



