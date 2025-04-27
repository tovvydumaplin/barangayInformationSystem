-- Database backup of db_barangay created on 20250427190750



-- Creating table tbl_account --
CREATE TABLE `tbl_account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`account_id`),
  UNIQUE KEY `account_id_UNIQUE` (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 COMMENT='	';


-- Inserting data into tbl_account --
INSERT INTO `tbl_account` (account_id,firstname,middlename,lastname,suffix,position,username,password,role,status,token,image,created_at,updated_at) VALUES ('17','Admin','B','Test','Jr.','Barangay Head','admin@gmail.com','$2y$10$L1Q4Gnff/8g1T6tECVroheOlXeg2xrGj3q6Z5YGIWScsaao6ZrroG','administrator','1','8d6818189ad53cc7c058e1fe142a4ffd2cc5c9f16106ca00b083e21b9a1e281f','uploads/1745278317_b1776094147578d2de79.jpg','2025-03-15 10:47:25','2025-04-27 18:42:01');
INSERT INTO `tbl_account` (account_id,firstname,middlename,lastname,suffix,position,username,password,role,status,token,image,created_at,updated_at) VALUES ('21','john','D','doe','','Barangay Head','johndoe@gmail.com','$2y$10$17.ZKBqMd9bLzoDhRIG1y.xub7lN07u/7aqhuOJ87rQnqlyA.g3nm','administrator','1','35938cc8980a040cdd211505dd7a3261b2d2891dd6b104a4e7c6ec49711a3b9f','uploads/1744678514_832eb99ba00d6146174c.jpg','2025-04-15 08:55:15','2025-04-22 07:31:24');
INSERT INTO `tbl_account` (account_id,firstname,middlename,lastname,suffix,position,username,password,role,status,token,image,created_at,updated_at) VALUES ('22','Jack','Geruda','Monroe','','null','tovvydumaplin@gmail.com','$2y$10$YiSluImBmsPJ.weXEyyjru2khQ5SXikRQapUAQeApdIKQDNR.EzuC','user','1','33183dc4fc2b779cc0d7982bb67483d7540e0984037ab988dd483d9512f1c3b7','uploads/1745281355_9da195dcf18614b76229.jpg','2025-04-22 08:22:35','2025-04-27 18:41:28');


-- Creating table tbl_audit --
CREATE TABLE `tbl_audit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;


-- Inserting data into tbl_audit --
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('1','Logged in','2025-04-27 18:25:55','Admin Test','2025-04-27 18:25:55','2025-04-27 18:25:55');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('2','Created a new pin point','2025-04-27 18:26:07','Admin Test','2025-04-27 18:26:07','2025-04-27 18:26:07');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('3','Created a new pin point','2025-04-27 18:26:08','Admin Test','2025-04-27 18:26:08','2025-04-27 18:26:08');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('4','Created a new pin point','2025-04-27 18:26:08','Admin Test','2025-04-27 18:26:08','2025-04-27 18:26:08');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('5','Created a new pin point','2025-04-27 18:26:09','Admin Test','2025-04-27 18:26:09','2025-04-27 18:26:09');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('6','Created a new pin point','2025-04-27 18:27:23','Admin Test','2025-04-27 18:27:23','2025-04-27 18:27:23');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('7','Created a new pin point','2025-04-27 18:27:23','Admin Test','2025-04-27 18:27:23','2025-04-27 18:27:23');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('8','Created a new pin point','2025-04-27 18:27:23','Admin Test','2025-04-27 18:27:23','2025-04-27 18:27:23');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('9','Created a new pin point','2025-04-27 18:27:24','Admin Test','2025-04-27 18:27:24','2025-04-27 18:27:24');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('10','Locally saved a member','2025-04-27 18:28:22','Admin Test','2025-04-27 18:28:22','2025-04-27 18:28:22');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('11','Added new residents','2025-04-27 18:28:36','Admin Test','2025-04-27 18:28:36','2025-04-27 18:28:36');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('12','Created a new pin point','2025-04-27 18:28:37','Admin Test','2025-04-27 18:28:37','2025-04-27 18:28:37');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('13','Created a new pin point','2025-04-27 18:28:37','Admin Test','2025-04-27 18:28:37','2025-04-27 18:28:37');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('14','Created a new pin point','2025-04-27 18:28:38','Admin Test','2025-04-27 18:28:38','2025-04-27 18:28:38');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('15','Created a new pin point','2025-04-27 18:28:38','Admin Test','2025-04-27 18:28:38','2025-04-27 18:28:38');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('16','Archived a resident','2025-04-27 18:28:44','Admin Test','2025-04-27 18:28:44','2025-04-27 18:28:44');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('17','Reactivated a resident','2025-04-27 18:28:50','Admin Test','2025-04-27 18:28:50','2025-04-27 18:28:50');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('18','Updated a resident','2025-04-27 18:28:59','Admin Test','2025-04-27 18:28:59','2025-04-27 18:28:59');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('19','Created a new pin point','2025-04-27 18:29:06','Admin Test','2025-04-27 18:29:06','2025-04-27 18:29:06');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('20','Created a new pin point','2025-04-27 18:29:06','Admin Test','2025-04-27 18:29:06','2025-04-27 18:29:06');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('21','Created a new pin point','2025-04-27 18:29:07','Admin Test','2025-04-27 18:29:07','2025-04-27 18:29:07');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('22','Created a new pin point','2025-04-27 18:29:07','Admin Test','2025-04-27 18:29:07','2025-04-27 18:29:07');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('23','Locally saved a member','2025-04-27 18:29:50','Admin Test','2025-04-27 18:29:50','2025-04-27 18:29:50');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('24','Added new residents','2025-04-27 18:29:53','Admin Test','2025-04-27 18:29:53','2025-04-27 18:29:53');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('25','Created a new pin point','2025-04-27 18:29:54','Admin Test','2025-04-27 18:29:54','2025-04-27 18:29:54');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('26','Created a new pin point','2025-04-27 18:29:54','Admin Test','2025-04-27 18:29:54','2025-04-27 18:29:54');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('27','Created a new pin point','2025-04-27 18:29:55','Admin Test','2025-04-27 18:29:55','2025-04-27 18:29:55');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('28','Created a new pin point','2025-04-27 18:29:55','Admin Test','2025-04-27 18:29:55','2025-04-27 18:29:55');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('29','Removed a resident','2025-04-27 18:30:00','Admin Test','2025-04-27 18:30:00','2025-04-27 18:30:00');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('30','Created a new pin point','2025-04-27 18:30:40','Admin Test','2025-04-27 18:30:40','2025-04-27 18:30:40');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('31','Created a new pin point','2025-04-27 18:30:40','Admin Test','2025-04-27 18:30:40','2025-04-27 18:30:40');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('32','Created a new pin point','2025-04-27 18:30:41','Admin Test','2025-04-27 18:30:41','2025-04-27 18:30:41');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('33','Created a new pin point','2025-04-27 18:30:41','Admin Test','2025-04-27 18:30:41','2025-04-27 18:30:41');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('34','Created a new pin point','2025-04-27 18:30:55','Admin Test','2025-04-27 18:30:55','2025-04-27 18:30:55');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('35','Created a new pin point','2025-04-27 18:30:56','Admin Test','2025-04-27 18:30:56','2025-04-27 18:30:56');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('36','Created a new pin point','2025-04-27 18:30:56','Admin Test','2025-04-27 18:30:56','2025-04-27 18:30:56');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('37','Created a new pin point','2025-04-27 18:30:56','Admin Test','2025-04-27 18:30:56','2025-04-27 18:30:56');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('38','Removed a resident','2025-04-27 18:30:59','Admin Test','2025-04-27 18:30:59','2025-04-27 18:30:59');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('39','Updated a resident','2025-04-27 18:31:10','Admin Test','2025-04-27 18:31:10','2025-04-27 18:31:10');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('40','Updated a resident','2025-04-27 18:31:14','Admin Test','2025-04-27 18:31:14','2025-04-27 18:31:14');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('41','Created a new pin point','2025-04-27 18:31:21','Admin Test','2025-04-27 18:31:21','2025-04-27 18:31:21');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('42','Created a new pin point','2025-04-27 18:31:22','Admin Test','2025-04-27 18:31:22','2025-04-27 18:31:22');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('43','Created a new pin point','2025-04-27 18:31:22','Admin Test','2025-04-27 18:31:22','2025-04-27 18:31:22');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('44','Created a new pin point','2025-04-27 18:31:23','Admin Test','2025-04-27 18:31:23','2025-04-27 18:31:23');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('45','Updated a resident','2025-04-27 18:31:29','Admin Test','2025-04-27 18:31:29','2025-04-27 18:31:29');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('46','Created a new pin point','2025-04-27 18:31:41','Admin Test','2025-04-27 18:31:41','2025-04-27 18:31:41');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('47','Created a new pin point','2025-04-27 18:31:41','Admin Test','2025-04-27 18:31:41','2025-04-27 18:31:41');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('48','Created a new pin point','2025-04-27 18:31:42','Admin Test','2025-04-27 18:31:42','2025-04-27 18:31:42');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('49','Created a new pin point','2025-04-27 18:31:42','Admin Test','2025-04-27 18:31:42','2025-04-27 18:31:42');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('50','Updated a resident','2025-04-27 18:31:49','Admin Test','2025-04-27 18:31:49','2025-04-27 18:31:49');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('51','Updated a resident','2025-04-27 18:31:58','Admin Test','2025-04-27 18:31:58','2025-04-27 18:31:58');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('52','Created a new pin point','2025-04-27 18:32:03','Admin Test','2025-04-27 18:32:03','2025-04-27 18:32:03');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('53','Created a new pin point','2025-04-27 18:32:04','Admin Test','2025-04-27 18:32:04','2025-04-27 18:32:04');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('54','Created a new pin point','2025-04-27 18:32:04','Admin Test','2025-04-27 18:32:04','2025-04-27 18:32:04');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('55','Created a new pin point','2025-04-27 18:32:04','Admin Test','2025-04-27 18:32:04','2025-04-27 18:32:04');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('56','Created a new pin point','2025-04-27 18:32:07','Admin Test','2025-04-27 18:32:07','2025-04-27 18:32:07');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('57','Created a new pin point','2025-04-27 18:32:08','Admin Test','2025-04-27 18:32:08','2025-04-27 18:32:08');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('58','Created a new pin point','2025-04-27 18:32:08','Admin Test','2025-04-27 18:32:08','2025-04-27 18:32:08');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('59','Created a new pin point','2025-04-27 18:32:08','Admin Test','2025-04-27 18:32:08','2025-04-27 18:32:08');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('60','Created a new pin point','2025-04-27 18:32:18','Admin Test','2025-04-27 18:32:18','2025-04-27 18:32:18');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('61','Created a new pin point','2025-04-27 18:32:18','Admin Test','2025-04-27 18:32:18','2025-04-27 18:32:18');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('62','Created a new pin point','2025-04-27 18:32:18','Admin Test','2025-04-27 18:32:18','2025-04-27 18:32:18');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('63','Created a new pin point','2025-04-27 18:32:19','Admin Test','2025-04-27 18:32:19','2025-04-27 18:32:19');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('64','Created a new pin point','2025-04-27 18:32:38','Admin Test','2025-04-27 18:32:38','2025-04-27 18:32:38');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('65','Created a new pin point','2025-04-27 18:32:38','Admin Test','2025-04-27 18:32:38','2025-04-27 18:32:38');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('66','Created a new pin point','2025-04-27 18:32:38','Admin Test','2025-04-27 18:32:38','2025-04-27 18:32:38');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('67','Created a new pin point','2025-04-27 18:32:38','Admin Test','2025-04-27 18:32:38','2025-04-27 18:32:38');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('68','Created a new pin point','2025-04-27 18:33:07','Admin Test','2025-04-27 18:33:07','2025-04-27 18:33:07');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('69','Created a new pin point','2025-04-27 18:33:07','Admin Test','2025-04-27 18:33:07','2025-04-27 18:33:07');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('70','Created a new pin point','2025-04-27 18:33:07','Admin Test','2025-04-27 18:33:07','2025-04-27 18:33:07');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('71','Created a new pin point','2025-04-27 18:33:08','Admin Test','2025-04-27 18:33:08','2025-04-27 18:33:08');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('72','Created a new pin point','2025-04-27 18:33:11','Admin Test','2025-04-27 18:33:11','2025-04-27 18:33:11');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('73','Created a new pin point','2025-04-27 18:33:11','Admin Test','2025-04-27 18:33:11','2025-04-27 18:33:11');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('74','Created a new pin point','2025-04-27 18:33:12','Admin Test','2025-04-27 18:33:12','2025-04-27 18:33:12');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('75','Created a new pin point','2025-04-27 18:33:12','Admin Test','2025-04-27 18:33:12','2025-04-27 18:33:12');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('76','Created a new pin point','2025-04-27 18:33:20','Admin Test','2025-04-27 18:33:20','2025-04-27 18:33:20');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('77','Created a new pin point','2025-04-27 18:33:20','Admin Test','2025-04-27 18:33:20','2025-04-27 18:33:20');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('78','Created a new pin point','2025-04-27 18:33:21','Admin Test','2025-04-27 18:33:21','2025-04-27 18:33:21');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('79','Created a new pin point','2025-04-27 18:33:21','Admin Test','2025-04-27 18:33:21','2025-04-27 18:33:21');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('80','Removed a resident','2025-04-27 18:33:29','Admin Test','2025-04-27 18:33:29','2025-04-27 18:33:29');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('81','Updated a resident','2025-04-27 18:33:37','Admin Test','2025-04-27 18:33:37','2025-04-27 18:33:37');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('82','Created a new pin point','2025-04-27 18:34:36','Admin Test','2025-04-27 18:34:36','2025-04-27 18:34:36');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('83','Created a new pin point','2025-04-27 18:34:36','Admin Test','2025-04-27 18:34:36','2025-04-27 18:34:36');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('84','Created a new pin point','2025-04-27 18:34:36','Admin Test','2025-04-27 18:34:36','2025-04-27 18:34:36');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('85','Created a new pin point','2025-04-27 18:34:36','Admin Test','2025-04-27 18:34:36','2025-04-27 18:34:36');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('86','Viewed an item','2025-04-27 18:35:02','Admin Test','2025-04-27 18:35:02','2025-04-27 18:35:02');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('87','Updated an item','2025-04-27 18:35:09','Admin Test','2025-04-27 18:35:09','2025-04-27 18:35:09');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('88','Viewed an item','2025-04-27 18:37:06','Admin Test','2025-04-27 18:37:06','2025-04-27 18:37:06');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('89','Updated an item','2025-04-27 18:37:14','Admin Test','2025-04-27 18:37:14','2025-04-27 18:37:14');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('90','Viewed an item','2025-04-27 18:37:15','Admin Test','2025-04-27 18:37:15','2025-04-27 18:37:15');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('91','Updated an item','2025-04-27 18:37:24','Admin Test','2025-04-27 18:37:24','2025-04-27 18:37:24');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('92','Viewed an item','2025-04-27 18:39:51','Admin Test','2025-04-27 18:39:51','2025-04-27 18:39:51');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('93','Updated an item','2025-04-27 18:39:56','Admin Test','2025-04-27 18:39:56','2025-04-27 18:39:56');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('94','Viewed an event','2025-04-27 18:40:16','Admin Test','2025-04-27 18:40:16','2025-04-27 18:40:16');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('95','Updated an event','2025-04-27 18:40:20','Admin Test','2025-04-27 18:40:20','2025-04-27 18:40:20');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('96','Viewed an event','2025-04-27 18:40:22','Admin Test','2025-04-27 18:40:22','2025-04-27 18:40:22');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('97','Deactivated an event','2025-04-27 18:40:24','Admin Test','2025-04-27 18:40:24','2025-04-27 18:40:24');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('98','Viewed an event','2025-04-27 18:40:28','Admin Test','2025-04-27 18:40:28','2025-04-27 18:40:28');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('99','Reactivated an event','2025-04-27 18:40:30','Admin Test','2025-04-27 18:40:30','2025-04-27 18:40:30');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('100','Viewed an event','2025-04-27 18:40:32','Admin Test','2025-04-27 18:40:32','2025-04-27 18:40:32');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('101','Approved an event','2025-04-27 18:40:35','Admin Test','2025-04-27 18:40:35','2025-04-27 18:40:35');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('102','Updated an official','2025-04-27 18:40:44','Admin Test','2025-04-27 18:40:44','2025-04-27 18:40:44');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('103','Complaint marked as completed','2025-04-27 18:40:55','Admin Test','2025-04-27 18:40:55','2025-04-27 18:40:55');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('104','Complaint marked as completed','2025-04-27 18:41:00','Admin Test','2025-04-27 18:41:00','2025-04-27 18:41:00');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('105','Exported data to PDF','2025-04-27 18:41:01','Admin Test','2025-04-27 18:41:01','2025-04-27 18:41:01');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('106','Generated a Barangay Certificate','2025-04-27 18:41:10','Admin Test','2025-04-27 18:41:10','2025-04-27 18:41:10');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('107','Generated a new PDF','2025-04-27 18:41:11','Admin Test','2025-04-27 18:41:11','2025-04-27 18:41:11');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('108','Generated a Certification of Indigency','2025-04-27 18:41:14','Admin Test','2025-04-27 18:41:14','2025-04-27 18:41:14');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('109','Generated a new PDF','2025-04-27 18:41:14','Admin Test','2025-04-27 18:41:14','2025-04-27 18:41:14');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('110','Edited profile information','2025-04-27 18:41:57','Admin Testx','2025-04-27 18:41:57','2025-04-27 18:41:57');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('111','Edited profile information','2025-04-27 18:42:01','Admin Test','2025-04-27 18:42:01','2025-04-27 18:42:01');
INSERT INTO `tbl_audit` (id,action,date,user,created_at,updated_at) VALUES ('112','Database Restoration','2025-04-27 19:06:14','Admin Test','2025-04-27 19:06:14','2025-04-27 19:06:14');


-- Creating table tbl_complaint --
CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_of_complaint` varchar(255) DEFAULT NULL,
  `complainant_id` varchar(255) DEFAULT NULL,
  `complainant_name` varchar(255) DEFAULT NULL,
  `complain_against` varchar(255) DEFAULT NULL,
  `complain_against_id` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `complain_title` varchar(255) DEFAULT NULL,
  `complain_details` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `complainant_age` varchar(255) DEFAULT NULL,
  `complainant_address` varchar(255) DEFAULT NULL,
  `location_of_incident` varchar(255) DEFAULT NULL,
  `barangay_action` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`complaint_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


-- Inserting data into tbl_complaint --
INSERT INTO `tbl_complaint` (complaint_id,type_of_complaint,complainant_id,complainant_name,complain_against,complain_against_id,date,complain_title,complain_details,status,created_at,updated_at,complainant_age,complainant_address,location_of_incident,barangay_action) VALUES ('2','blotter','40','John Doe','Lois Smith','','2025-04-14','Pollution','Too much trash outside the street.              ','1','2025-04-14 09:56:05','2025-04-22 07:28:47','','','','');
INSERT INTO `tbl_complaint` (complaint_id,type_of_complaint,complainant_id,complainant_name,complain_against,complain_against_id,date,complain_title,complain_details,status,created_at,updated_at,complainant_age,complainant_address,location_of_incident,barangay_action) VALUES ('3','blotter','40','John Doe','Jane Doe','42','2025-04-22','Loitering','Dog poop, trash bins, etc.','0','2025-04-22 07:23:10','2025-04-22 07:30:16','25','B5 L99 Lizario St','Lizario St.','Clean up');
INSERT INTO `tbl_complaint` (complaint_id,type_of_complaint,complainant_id,complainant_name,complain_against,complain_against_id,date,complain_title,complain_details,status,created_at,updated_at,complainant_age,complainant_address,location_of_incident,barangay_action) VALUES ('4','blotter','','Tovvy Dumaplin','Chaun McCaunary','','2025-04-21','Abuse','Physical','1','2025-04-22 09:16:15','2025-04-22 09:16:35','24','Elvinda San Pedro','Crismor St.','Report');
INSERT INTO `tbl_complaint` (complaint_id,type_of_complaint,complainant_id,complainant_name,complain_against,complain_against_id,date,complain_title,complain_details,status,created_at,updated_at,complainant_age,complainant_address,location_of_incident,barangay_action) VALUES ('5','complaint','','Tovvy Dumaplin','City Hall','','2025-04-24','Noisy Construction','10 weeks construction noise pollution','0','2025-04-24 08:46:36','2025-04-27 18:41:00','','','','');


-- Creating table tbl_db_history --
CREATE TABLE `tbl_db_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


-- Inserting data into tbl_db_history --
INSERT INTO `tbl_db_history` (id,date,type,user,size,created_at,updated_at) VALUES ('1','2025-04-27 19:06:14','Database Backup','Admin Test, Jr.','','2025-04-27 19:06:14','2025-04-27 19:06:14');


-- Creating table tbl_event --
CREATE TABLE `tbl_event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(255) DEFAULT NULL,
  `event_description` varchar(255) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;


-- Inserting data into tbl_event --
INSERT INTO `tbl_event` (event_id,event_title,event_description,start_date,end_date,status,created_at,updated_at) VALUES ('23','Barangay Fiesta 2025','Barangay events will be held on the date.','2025-04-17 10:00:00','2025-04-17 17:00:00','1','2025-04-14 09:05:47','2025-04-15 13:48:19');
INSERT INTO `tbl_event` (event_id,event_title,event_description,start_date,end_date,status,created_at,updated_at) VALUES ('24','Sinugbaan Festival 2024 - All Members','Eating content for the barangay officials','2025-04-15 09:38:00','2025-04-14 15:38:00','1','2025-04-14 09:38:48','2025-04-15 13:49:20');
INSERT INTO `tbl_event` (event_id,event_title,event_description,start_date,end_date,status,created_at,updated_at) VALUES ('25','Street Costume Festival','Test Description for street festival','2025-04-15 09:14:00','2025-04-17 09:14:00','1','2025-04-15 09:14:52','2025-04-22 07:21:18');
INSERT INTO `tbl_event` (event_id,event_title,event_description,start_date,end_date,status,created_at,updated_at) VALUES ('26','Sinugbaan Festival','Food contest for residents ~','2025-04-22 09:16:00','2025-04-24 09:16:00','1','2025-04-22 09:17:03','2025-04-27 18:40:34');


-- Creating table tbl_house --
CREATE TABLE `tbl_house` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `house_no` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `house_street` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unq_house_status` (`house_no`,`status`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;


-- Inserting data into tbl_house --
INSERT INTO `tbl_house` (id,house_no,longitude,latitude,status,house_street,type) VALUES ('29','43','121.05259369487295','14.345462539599186','1','Pacita Avenue','residential');
INSERT INTO `tbl_house` (id,house_no,longitude,latitude,status,house_street,type) VALUES ('30','50','121.05933066774597','14.346250416930992','1','Champaca Street','residential');
INSERT INTO `tbl_house` (id,house_no,longitude,latitude,status,house_street,type) VALUES ('31','25','121.06832738601193','14.349504876516592','1','Landayan Avenue','government');
INSERT INTO `tbl_house` (id,house_no,longitude,latitude,status,house_street,type) VALUES ('32','16','121.06551571231986','14.344041881044165','1','P.Ocampo Drive','commercial');


-- Creating table tbl_inventory --
CREATE TABLE `tbl_inventory` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(45) DEFAULT NULL,
  `item_quantity` varchar(45) DEFAULT NULL,
  `item_description` varchar(255) DEFAULT NULL,
  `in_out_reason` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;


-- Inserting data into tbl_inventory --
INSERT INTO `tbl_inventory` (item_id,item_name,item_quantity,item_description,in_out_reason,image,status,created_at,updated_at) VALUES ('34','Walis','10','Broom for barangay','test','1744246357_c3b9d7f2849a964e1c22.jpg','1','2025-04-10 08:52:37','2025-04-27 18:39:56');
INSERT INTO `tbl_inventory` (item_id,item_name,item_quantity,item_description,in_out_reason,image,status,created_at,updated_at) VALUES ('35','Upuan','0','Chairs for barangay','Broken','1744246443_7039e88ca9e933e42ffd.jpg','1','2025-04-10 08:54:03','2025-04-23 09:19:27');
INSERT INTO `tbl_inventory` (item_id,item_name,item_quantity,item_description,in_out_reason,image,status,created_at,updated_at) VALUES ('36','Premium Chair','50','Chairs for barangay','','1744591073_b434f17d0e529f544fdb.jpg','1','2025-04-14 08:37:53','2025-04-14 09:03:50');
INSERT INTO `tbl_inventory` (item_id,item_name,item_quantity,item_description,in_out_reason,image,status,created_at,updated_at) VALUES ('37','Test Chair','10','Chairs for barangay','','1744687853_ddc20935b67d61cfa525.jpg','1','2025-04-15 11:30:53','2025-04-15 11:30:53');


-- Creating table tbl_inventory_history --
CREATE TABLE `tbl_inventory_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `old_quantity` varchar(255) DEFAULT NULL,
  `new_quantity` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `in_out_reason` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;


-- Inserting data into tbl_inventory_history --
INSERT INTO `tbl_inventory_history` (id,item_name,type,quantity,old_quantity,new_quantity,updated_by,in_out_reason,updated_at,created_at) VALUES ('5','Walis','out','6','7','1','Admin Test','Broken','2025-04-23 08:54:52','2025-04-23 08:54:52');
INSERT INTO `tbl_inventory_history` (id,item_name,type,quantity,old_quantity,new_quantity,updated_by,in_out_reason,updated_at,created_at) VALUES ('6','Walis','in','2','1','3','Admin Test','New sets','2025-04-23 08:55:00','2025-04-23 08:55:00');
INSERT INTO `tbl_inventory_history` (id,item_name,type,quantity,old_quantity,new_quantity,updated_by,in_out_reason,updated_at,created_at) VALUES ('7','Upuan','out','55','60','5','Admin Test','Replacement due to old stock','2025-04-23 09:15:26','2025-04-23 09:15:26');
INSERT INTO `tbl_inventory_history` (id,item_name,type,quantity,old_quantity,new_quantity,updated_by,in_out_reason,updated_at,created_at) VALUES ('8','Walis','out','3','3','0','Admin Test','Broken','2025-04-23 09:19:03','2025-04-23 09:19:03');
INSERT INTO `tbl_inventory_history` (id,item_name,type,quantity,old_quantity,new_quantity,updated_by,in_out_reason,updated_at,created_at) VALUES ('9','Upuan','out','5','5','0','Admin Test','Broken','2025-04-23 09:19:27','2025-04-23 09:19:27');
INSERT INTO `tbl_inventory_history` (id,item_name,type,quantity,old_quantity,new_quantity,updated_by,in_out_reason,updated_at,created_at) VALUES ('10','Walis','in','5','0','5','Admin Test','New items created','2025-04-23 09:58:29','2025-04-23 09:58:29');
INSERT INTO `tbl_inventory_history` (id,item_name,type,quantity,old_quantity,new_quantity,updated_by,in_out_reason,updated_at,created_at) VALUES ('11','Walis','out','3','5','2','Admin Test','Test','2025-04-24 09:14:23','2025-04-24 09:14:23');
INSERT INTO `tbl_inventory_history` (id,item_name,type,quantity,old_quantity,new_quantity,updated_by,in_out_reason,updated_at,created_at) VALUES ('12','Walis','in','5','2','7','Admin Test','Test','2025-04-27 18:35:08','2025-04-27 18:35:08');
INSERT INTO `tbl_inventory_history` (id,item_name,type,quantity,old_quantity,new_quantity,updated_by,in_out_reason,updated_at,created_at) VALUES ('13','Walis','out','2','7','5','Admin Test','Test Reason','2025-04-27 18:37:14','2025-04-27 18:37:14');
INSERT INTO `tbl_inventory_history` (id,item_name,type,quantity,old_quantity,new_quantity,updated_by,in_out_reason,updated_at,created_at) VALUES ('14','Walis','in','4','5','9','Admin Test','Test Reason IN','2025-04-27 18:37:24','2025-04-27 18:37:24');
INSERT INTO `tbl_inventory_history` (id,item_name,type,quantity,old_quantity,new_quantity,updated_by,in_out_reason,updated_at,created_at) VALUES ('15','Walis','in','1','9','10','Admin Test','test','2025-04-27 18:39:56','2025-04-27 18:39:56');


-- Creating table tbl_lending --
CREATE TABLE `tbl_lending` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `borrower_id` int(11) DEFAULT NULL,
  `borrowed_quantity` int(11) DEFAULT NULL,
  `borrower_desc` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date_borrowed` date DEFAULT NULL,
  `date_of_return` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;


-- Inserting data into tbl_lending --
INSERT INTO `tbl_lending` (id,item_id,item_name,borrower_id,borrowed_quantity,borrower_desc,status,date_borrowed,date_of_return,updated_at,created_at) VALUES ('19','34','Walis','40','10','General Cleaning ','1','2025-04-14','','2025-04-14 09:04:33','2025-04-14 09:04:33');
INSERT INTO `tbl_lending` (id,item_id,item_name,borrower_id,borrowed_quantity,borrower_desc,status,date_borrowed,date_of_return,updated_at,created_at) VALUES ('20','34','Walis','41','20','test','1','2025-04-15','','2025-04-15 11:32:01','2025-04-15 11:32:01');
INSERT INTO `tbl_lending` (id,item_id,item_name,borrower_id,borrowed_quantity,borrower_desc,status,date_borrowed,date_of_return,updated_at,created_at) VALUES ('21','34','Walis','44','2','For clearance','1','2025-04-22','2025-04-25','2025-04-22 07:20:45','2025-04-22 07:20:45');


-- Creating table tbl_officials --
CREATE TABLE `tbl_officials` (
  `official_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `start_service` date DEFAULT NULL,
  `end_service` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`official_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;


-- Inserting data into tbl_officials --
INSERT INTO `tbl_officials` (official_id,firstname,middlename,lastname,suffix,position,status,image,start_service,end_service,created_at,updated_at) VALUES ('4','Johnny','H','Doe','null','Captain','1','uploads/1744595261_9edf195fc8125cae9785.jpg','2025-04-14','2025-07-15','2025-04-14 09:47:41','2025-04-14 11:27:28');
INSERT INTO `tbl_officials` (official_id,firstname,middlename,lastname,suffix,position,status,image,start_service,end_service,created_at,updated_at) VALUES ('5','Lois','G','Smith','null','Chief Tanod','0','uploads/1744595469_6dccf3dda7d23a94de65.jpg','2025-04-14','2025-04-19','2025-04-14 09:51:09','2025-04-14 11:22:35');
INSERT INTO `tbl_officials` (official_id,firstname,middlename,lastname,suffix,position,status,image,start_service,end_service,created_at,updated_at) VALUES ('6','Captain','N','Test','null','Captain','0','uploads/1744601170_49ed577f3ab0c6980386.jpg','2025-04-14','2025-04-18','2025-04-14 11:26:10','2025-04-14 11:27:22');
INSERT INTO `tbl_officials` (official_id,firstname,middlename,lastname,suffix,position,status,image,start_service,end_service,created_at,updated_at) VALUES ('7','Test','test','test','','Deputy Tanod','1','uploads/1744616582_e8bd55a445ccb18a8c6c.jpg','2025-04-17','2025-04-16','2025-04-14 15:43:02','2025-04-14 15:43:02');
INSERT INTO `tbl_officials` (official_id,firstname,middlename,lastname,suffix,position,status,image,start_service,end_service,created_at,updated_at) VALUES ('8','John','B','Doe','null','Treasurer','1','uploads/1744616598_46628f463faa90bd2cd6.jpg','2025-04-14','2025-04-17','2025-04-14 15:43:18','2025-04-15 17:39:30');
INSERT INTO `tbl_officials` (official_id,firstname,middlename,lastname,suffix,position,status,image,start_service,end_service,created_at,updated_at) VALUES ('9','John','B','Doe','null','Member','1','uploads/1745277727_7cc809b4ef91b00b82fb.jpg','2025-04-22','2025-04-24','2025-04-22 07:22:07','2025-04-27 18:40:45');


-- Creating table tbl_positions --
CREATE TABLE `tbl_positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;


-- Inserting data into tbl_positions --
INSERT INTO `tbl_positions` (id,position_name,status,created_at,updated_at) VALUES ('1','Captain','0','2025-04-25 10:14:11','2025-04-25 11:12:34');
INSERT INTO `tbl_positions` (id,position_name,status,created_at,updated_at) VALUES ('2','Captain','1','2025-04-25 11:34:14','2025-04-25 11:34:14');
INSERT INTO `tbl_positions` (id,position_name,status,created_at,updated_at) VALUES ('3','Comm. On Peace & Order & Public Safety','1','2025-04-25 11:34:22','2025-04-25 11:34:22');
INSERT INTO `tbl_positions` (id,position_name,status,created_at,updated_at) VALUES ('4','Comm. On Public Works and Infrastructure','1','2025-04-25 11:34:28','2025-04-25 11:34:28');
INSERT INTO `tbl_positions` (id,position_name,status,created_at,updated_at) VALUES ('5','Comm. On Solid Waste Management','1','2025-04-25 11:34:35','2025-04-25 11:34:35');
INSERT INTO `tbl_positions` (id,position_name,status,created_at,updated_at) VALUES ('6','Comm. On Appropriations','1','2025-04-25 11:34:42','2025-04-25 11:34:42');
INSERT INTO `tbl_positions` (id,position_name,status,created_at,updated_at) VALUES ('7','Comm. On Nutrition','1','2025-04-25 11:34:47','2025-04-25 11:34:47');
INSERT INTO `tbl_positions` (id,position_name,status,created_at,updated_at) VALUES ('8','Comm. On Women & Family Welfare','1','2025-04-25 11:34:54','2025-04-25 11:34:54');
INSERT INTO `tbl_positions` (id,position_name,status,created_at,updated_at) VALUES ('9','Comm. On Disaster Preparedness','1','2025-04-25 11:35:01','2025-04-25 11:35:01');
INSERT INTO `tbl_positions` (id,position_name,status,created_at,updated_at) VALUES ('10','Chief Tanod','1','2025-04-25 11:35:08','2025-04-25 11:35:08');
INSERT INTO `tbl_positions` (id,position_name,status,created_at,updated_at) VALUES ('11','Deputy Tanod','1','2025-04-25 11:35:12','2025-04-25 11:35:12');
INSERT INTO `tbl_positions` (id,position_name,status,created_at,updated_at) VALUES ('12','Member','1','2025-04-25 11:35:17','2025-04-25 11:35:17');
INSERT INTO `tbl_positions` (id,position_name,status,created_at,updated_at) VALUES ('13','Sk Kagawad','1','2025-04-25 11:35:23','2025-04-25 11:35:23');
INSERT INTO `tbl_positions` (id,position_name,status,created_at,updated_at) VALUES ('14','Sk Chairperson','1','2025-04-25 11:35:28','2025-04-25 11:35:28');
INSERT INTO `tbl_positions` (id,position_name,status,created_at,updated_at) VALUES ('15','Secretary','1','2025-04-25 11:35:34','2025-04-25 11:35:34');
INSERT INTO `tbl_positions` (id,position_name,status,created_at,updated_at) VALUES ('16','Treasurer','1','2025-04-25 11:35:39','2025-04-25 11:35:39');
INSERT INTO `tbl_positions` (id,position_name,status,created_at,updated_at) VALUES ('17','Tanod','1','2025-04-25 11:35:47','2025-04-25 11:35:47');


-- Creating table tbl_residents --
CREATE TABLE `tbl_residents` (
  `resident_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `birthplace` varchar(255) DEFAULT NULL,
  `citizenship` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `civil_status` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `is_pwd` tinyint(1) DEFAULT NULL,
  `is_voter_of_barangay` tinyint(1) DEFAULT NULL,
  `is_family_head` tinyint(1) DEFAULT NULL,
  `household_name` varchar(255) DEFAULT NULL,
  `house_no` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `emergency_contact_no` varchar(255) DEFAULT NULL,
  `contact_relationship` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`resident_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;


-- Inserting data into tbl_residents --
INSERT INTO `tbl_residents` (resident_id,firstname,middlename,lastname,suffix,contact_no,birthdate,birthplace,citizenship,gender,civil_status,occupation,religion,is_pwd,is_voter_of_barangay,is_family_head,household_name,house_no,street,status,created_at,updated_at,contact_name,emergency_contact_no,contact_relationship) VALUES ('40','John','B','Doe','','09999999999','1995-06-14','City of San Pedro, Laguna','Filipino','Male','Single','Teller','Catholic','0','1','1','Doe','43','Pacita Avenue','1','2025-04-14 09:02:49','2025-04-14 09:03:10','Johnny Go','09888888888','Friend');
INSERT INTO `tbl_residents` (resident_id,firstname,middlename,lastname,suffix,contact_no,birthdate,birthplace,citizenship,gender,civil_status,occupation,religion,is_pwd,is_voter_of_barangay,is_family_head,household_name,house_no,street,status,created_at,updated_at,contact_name,emergency_contact_no,contact_relationship) VALUES ('41','Lois','D','Smith','','09323876554','2025-04-14','Binan Laguna','Filipino','Male','Single','Developer','Catholic','0','0','1','Smith','50','Champaca Street','1','2025-04-14 09:54:54','2025-04-14 09:54:54','Jane Dane','09323876554','Friend');
INSERT INTO `tbl_residents` (resident_id,firstname,middlename,lastname,suffix,contact_no,birthdate,birthplace,citizenship,gender,civil_status,occupation,religion,is_pwd,is_voter_of_barangay,is_family_head,household_name,house_no,street,status,created_at,updated_at,contact_name,emergency_contact_no,contact_relationship) VALUES ('42','Jane','B','Doe','','09323876554','2025-04-14','Binan Laguna','Filipino','Male','Single','Developer','Catholic','0','0','0','Doe','43','Pacita Avenue','0','2025-04-14 09:57:48','2025-04-14 10:02:54','John Doe','093293742827','Friend');
INSERT INTO `tbl_residents` (resident_id,firstname,middlename,lastname,suffix,contact_no,birthdate,birthplace,citizenship,gender,civil_status,occupation,religion,is_pwd,is_voter_of_barangay,is_family_head,household_name,house_no,street,status,created_at,updated_at,contact_name,emergency_contact_no,contact_relationship) VALUES ('43','Sean','G','Paton','','633213123','2025-04-14','Binan Laguna','Filipino','Male','Single','Developer','Catholic','0','0','0','Paton','50','Champaca Street','1','2025-04-14 10:04:13','2025-04-27 18:31:58','Jane Doe','093233876554','Friend');
INSERT INTO `tbl_residents` (resident_id,firstname,middlename,lastname,suffix,contact_no,birthdate,birthplace,citizenship,gender,civil_status,occupation,religion,is_pwd,is_voter_of_barangay,is_family_head,household_name,house_no,street,status,created_at,updated_at,contact_name,emergency_contact_no,contact_relationship) VALUES ('44','Jane','L','Doe','','09323876554','2009-03-15','Binan Laguna','Filipino','Female','Single','Developer','Catholic','0','0','0','Dumaplin','43','Champaca Street','1','2025-04-15 17:39:21','2025-04-22 10:25:14','Test','098988375672','Friend');
INSERT INTO `tbl_residents` (resident_id,firstname,middlename,lastname,suffix,contact_no,birthdate,birthplace,citizenship,gender,civil_status,occupation,religion,is_pwd,is_voter_of_barangay,is_family_head,household_name,house_no,street,status,created_at,updated_at,contact_name,emergency_contact_no,contact_relationship) VALUES ('45','Mike','G','Doe','','09999999999','1921-03-03','Binan Laguna','Filipino','Male','Married','Developer','Catholic','0','1','0','Dumaplin','43','Pacita Avenue','1','2025-04-27 18:28:36','2025-04-27 18:28:58','Jane Doe A','639834632637','Friend');
INSERT INTO `tbl_residents` (resident_id,firstname,middlename,lastname,suffix,contact_no,birthdate,birthplace,citizenship,gender,civil_status,occupation,religion,is_pwd,is_voter_of_barangay,is_family_head,household_name,house_no,street,status,created_at,updated_at,contact_name,emergency_contact_no,contact_relationship) VALUES ('46','Payton','A','Parlo','','0999923923','2025-04-27','Binan Laguna','Filipino','Male','Divorced','Developer','Catholic','0','1','0','Dumaplin','0','Champaca Street','1','2025-04-27 18:29:52','2025-04-27 18:33:37','Sean Patton','0999238372','Friend');


-- Creating table tbl_suffix --
CREATE TABLE `tbl_suffix` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `suffix_title` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;


-- Inserting data into tbl_suffix --
INSERT INTO `tbl_suffix` (id,suffix_title,status,created_at,updated_at) VALUES ('1','Jr.','1','2025-04-24 17:54:37','2025-04-24 18:28:19');
INSERT INTO `tbl_suffix` (id,suffix_title,status,created_at,updated_at) VALUES ('2','Sr.','1','2025-04-24 18:00:20','2025-04-24 18:00:20');
INSERT INTO `tbl_suffix` (id,suffix_title,status,created_at,updated_at) VALUES ('3','Sr','1','2025-04-24 18:22:48','2025-04-25 10:52:33');
INSERT INTO `tbl_suffix` (id,suffix_title,status,created_at,updated_at) VALUES ('4','iii','1','2025-04-24 18:25:14','2025-04-24 18:25:14');
INSERT INTO `tbl_suffix` (id,suffix_title,status,created_at,updated_at) VALUES ('5','Iv','1','2025-04-24 18:25:34','2025-04-24 18:25:34');
INSERT INTO `tbl_suffix` (id,suffix_title,status,created_at,updated_at) VALUES ('6','Leroy','0','2025-04-25 10:55:05','2025-04-25 10:55:27');
