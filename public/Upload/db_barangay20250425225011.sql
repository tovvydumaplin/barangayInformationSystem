-- Database backup of db_barangay created on 20250425225011



-- Creating table tbl_account --
CREATE TABLE `tbl_account` (
  `account_id` int NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1 COMMENT='	';


-- Inserting data into tbl_account --
INSERT INTO `tbl_account` (account_id,firstname,middlename,lastname,suffix,position,username,password,role,status,token,image,created_at,updated_at) VALUES ('17','Tovvy','B','Dumaplin','Jr.','Barangay Head','tovvydumaplin@gmail.com','$2y$10$oRHNB8QxiQg1DKwqAjNso.uNydJhzDRC2avW531hLy1r.sJqhiVda','administrator','1','8d6818189ad53cc7c058e1fe142a4ffd2cc5c9f16106ca00b083e21b9a1e281f','uploads/1744648823_f1d1b0f4d6bf4e9286ea.png','2025-03-15 10:47:25','2025-04-22 22:15:55');
INSERT INTO `tbl_account` (account_id,firstname,middlename,lastname,suffix,position,username,password,role,status,token,image,created_at,updated_at) VALUES ('27','Test','G','Admin','','Barangay Assistant','test@gmail.com','$2y$10$XECN3AAVnN4o1qTp/DXunuUQUxb6fJbeqrrlJlrrccmIMIc.uI5CS','administrator','0','927ba39ff8c57dd09f948b52a7071819c34ff7eda6fb68f9ade350efef5e6727','uploads/1742121281_faa000a51e8047412633.png','2025-03-16 10:32:52','2025-03-18 20:22:24');
INSERT INTO `tbl_account` (account_id,firstname,middlename,lastname,suffix,position,username,password,role,status,token,image,created_at,updated_at) VALUES ('28','123','123','123','Jr.','Barangay Assistant','123@gmail.com','$2y$10$AN/6RTH3Hvu/t/SyzIkPbuNlgtbJ6QQ8Ufx7paieTmdKxO3gJr5SK','administrator','1','21896c82ea26f33fa7aca3c99e1c60a1e60a577dcec7870939128448dda4322c','uploads/1742730006_d62adbd5e3b93f909122.png','2025-03-23 19:40:06','2025-03-23 19:40:06');
INSERT INTO `tbl_account` (account_id,firstname,middlename,lastname,suffix,position,username,password,role,status,token,image,created_at,updated_at) VALUES ('29','123','123','123','','Barangay Head','12zxczxc32@gmail.com','$2y$10$8e5O.d/W4F1W85i3pfQrrOcCpJ1neTEd4Zz3tiH5fHI7Cc.Z9wX2i','administrator','1','394bf4ba49251c65d0a63a067eb9abbaaefcdbd941d94df581b03030e6608c3f','uploads/1742730897_d5144861ea197ddd9526.png','2025-03-23 19:54:57','2025-03-23 19:54:57');
INSERT INTO `tbl_account` (account_id,firstname,middlename,lastname,suffix,position,username,password,role,status,token,image,created_at,updated_at) VALUES ('30','123','123','123','','Barangay Head','123@gzxc2.com','$2y$10$xrgM5NTL9VNdnRbHsF9AfezVnk28wH7fQmZ88mBfLWRKlxRQeMgXO','user','1','30b8cd2d951f2187d66502b96621f2dbf8d0dd957d4478d9b499a1fda8b813a6','uploads/1742731488_4d24295c269259aa9bc6.png','2025-03-23 20:04:48','2025-03-29 19:35:13');
INSERT INTO `tbl_account` (account_id,firstname,middlename,lastname,suffix,position,username,password,role,status,token,image,created_at,updated_at) VALUES ('31','tovvy','b','dumaplin','','Barangay Head','tovvydumaplin14@gmail.com','$2y$10$zJ/dki6B2WEayPTct680yegTlrtmU8NCabA3t8vzyrXz4MaepvIWi','user','1','a76d062096694b3384a0f982e814773ce8c04baf2955e9bd035df2f6f3b47e15','uploads/1744648609_68c3c49c44329758fdc1.png','2025-04-15 00:36:49','2025-04-21 15:51:42');


-- Creating table tbl_blotter --
CREATE TABLE `tbl_blotter` (
  `blotter_id` int NOT NULL AUTO_INCREMENT,
  `blotter_complainant_id` varchar(255) DEFAULT NULL,
  `blotter_complainant_name` varchar(255) DEFAULT NULL,
  `blotter_respondent_id` varchar(255) DEFAULT NULL,
  `blotter_respondent_name` varchar(255) DEFAULT NULL,
  `blotter_date` date DEFAULT NULL,
  `blotter_title` varchar(255) DEFAULT NULL,
  `blotter_details` varchar(255) DEFAULT NULL,
  `blotter_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`blotter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='	';


-- Inserting data into tbl_blotter --


-- Creating table tbl_complaint --
CREATE TABLE `tbl_complaint` (
  `complaint_id` int NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- Inserting data into tbl_complaint --
INSERT INTO `tbl_complaint` (complaint_id,type_of_complaint,complainant_id,complainant_name,complain_against,complain_against_id,date,complain_title,complain_details,status,created_at,updated_at,complainant_age,complainant_address,location_of_incident,barangay_action) VALUES ('1','','43','Tovvy Dumaplin','nailyn del mundo','44','2025-04-12','Abuse','              Physical Abuse','1','2025-04-12 18:20:18','2025-04-12 18:48:12','','','','');
INSERT INTO `tbl_complaint` (complaint_id,type_of_complaint,complainant_id,complainant_name,complain_against,complain_against_id,date,complain_title,complain_details,status,created_at,updated_at,complainant_age,complainant_address,location_of_incident,barangay_action) VALUES ('2','','43','Tovvy Dumaplin','nailyn del mundo','44','2025-04-14','Abuse','              Test','0','2025-04-13 15:21:06','2025-04-13 15:21:06','','','','');
INSERT INTO `tbl_complaint` (complaint_id,type_of_complaint,complainant_id,complainant_name,complain_against,complain_against_id,date,complain_title,complain_details,status,created_at,updated_at,complainant_age,complainant_address,location_of_incident,barangay_action) VALUES ('3','blotter','43','Tovvy Dumaplin','nailyn del mundo','44','2025-04-15','Abuse','              312','1','2025-04-13 15:23:42','2025-04-13 16:59:02','','','','');
INSERT INTO `tbl_complaint` (complaint_id,type_of_complaint,complainant_id,complainant_name,complain_against,complain_against_id,date,complain_title,complain_details,status,created_at,updated_at,complainant_age,complainant_address,location_of_incident,barangay_action) VALUES ('4','complaint','45','123 123','Test ASD','','2025-04-15','Trash','              Test','0','2025-04-13 16:51:14','2025-04-13 17:07:10','','','','');
INSERT INTO `tbl_complaint` (complaint_id,type_of_complaint,complainant_id,complainant_name,complain_against,complain_against_id,date,complain_title,complain_details,status,created_at,updated_at,complainant_age,complainant_address,location_of_incident,barangay_action) VALUES ('5','blotter','43','Tovvy Dumaplin','nailyn del mundo','','2025-04-16','Abuse','              test','0','2025-04-13 16:51:51','2025-04-13 17:07:08','','','','');
INSERT INTO `tbl_complaint` (complaint_id,type_of_complaint,complainant_id,complainant_name,complain_against,complain_against_id,date,complain_title,complain_details,status,created_at,updated_at,complainant_age,complainant_address,location_of_incident,barangay_action) VALUES ('6','blotter','43','Tovvy Dumaplin','nailyn del mundo','','2025-04-20','Abuse','Punch','0','2025-04-20 23:37:59','2025-04-20 23:37:59','','','','');
INSERT INTO `tbl_complaint` (complaint_id,type_of_complaint,complainant_id,complainant_name,complain_against,complain_against_id,date,complain_title,complain_details,status,created_at,updated_at,complainant_age,complainant_address,location_of_incident,barangay_action) VALUES ('7','blotter','43','Tovvy Dumaplin','Tovvy Dumaplin','','2025-04-21','TEST','TEST','0','2025-04-20 23:48:36','2025-04-20 23:48:36','','','','');
INSERT INTO `tbl_complaint` (complaint_id,type_of_complaint,complainant_id,complainant_name,complain_against,complain_against_id,date,complain_title,complain_details,status,created_at,updated_at,complainant_age,complainant_address,location_of_incident,barangay_action) VALUES ('8','blotter','43','Tovvy Dumaplin','Tovvy Dumaplin','','2025-04-20','Abuse','Fight','0','2025-04-20 23:51:21','2025-04-20 23:51:21','24','Elvinda San Pedro','','Attack');
INSERT INTO `tbl_complaint` (complaint_id,type_of_complaint,complainant_id,complainant_name,complain_against,complain_against_id,date,complain_title,complain_details,status,created_at,updated_at,complainant_age,complainant_address,location_of_incident,barangay_action) VALUES ('9','blotter','43','Tovvy Dumaplin','Tovvy Dumaplin','','2025-04-20','Abuse','Fight','0','2025-04-20 23:52:31','2025-04-20 23:52:31','24','Elvinda San Pedro','Crismor St.','Att');
INSERT INTO `tbl_complaint` (complaint_id,type_of_complaint,complainant_id,complainant_name,complain_against,complain_against_id,date,complain_title,complain_details,status,created_at,updated_at,complainant_age,complainant_address,location_of_incident,barangay_action) VALUES ('10','complaint','43','Tovvy Dumaplin','Tovvy Dumaplin','','2025-04-20','Test ','TEst','0','2025-04-20 23:55:33','2025-04-20 23:55:33','','','','');
INSERT INTO `tbl_complaint` (complaint_id,type_of_complaint,complainant_id,complainant_name,complain_against,complain_against_id,date,complain_title,complain_details,status,created_at,updated_at,complainant_age,complainant_address,location_of_incident,barangay_action) VALUES ('11','blotter','Tovvy Dumaplin','','','','2025-04-20','Pollution','Attack using pollution','0','2025-04-20 23:59:34','2025-04-20 23:59:34','24','B19 L99 Crismor Ave. Elvinda Village','Crismor St.','Clean');
INSERT INTO `tbl_complaint` (complaint_id,type_of_complaint,complainant_id,complainant_name,complain_against,complain_against_id,date,complain_title,complain_details,status,created_at,updated_at,complainant_age,complainant_address,location_of_incident,barangay_action) VALUES ('12','blotter','43','Tovvy Dumaplin','Nailyn Del Mundo','','2025-04-22','123','123','0','2025-04-21 00:10:05','2025-04-21 00:10:05','24','Elvinda San Pedro','Crismor St.','123');
INSERT INTO `tbl_complaint` (complaint_id,type_of_complaint,complainant_id,complainant_name,complain_against,complain_against_id,date,complain_title,complain_details,status,created_at,updated_at,complainant_age,complainant_address,location_of_incident,barangay_action) VALUES ('13','blotter','43','Tovvy Dumaplin','Chaun McCaunary','','2025-04-21','Abuse','test','0','2025-04-21 00:10:55','2025-04-21 00:10:55','24','Elvinda San Pedro TEST','Crismor St.','Attack');
INSERT INTO `tbl_complaint` (complaint_id,type_of_complaint,complainant_id,complainant_name,complain_against,complain_against_id,date,complain_title,complain_details,status,created_at,updated_at,complainant_age,complainant_address,location_of_incident,barangay_action) VALUES ('14','blotter','43','Tovvy DumaplIN','nailyn del mundo','','2025-04-21','123','123','0','2025-04-21 00:11:48','2025-04-21 00:11:48','24','Elvinda San Pedro','Crismor St.','123');
INSERT INTO `tbl_complaint` (complaint_id,type_of_complaint,complainant_id,complainant_name,complain_against,complain_against_id,date,complain_title,complain_details,status,created_at,updated_at,complainant_age,complainant_address,location_of_incident,barangay_action) VALUES ('15','blotter','43','Tovvy Dumaplin','Tovvy Dumaplin','','2025-04-21','test','test','0','2025-04-21 00:12:37','2025-04-21 00:12:37','24','test','test','test');
INSERT INTO `tbl_complaint` (complaint_id,type_of_complaint,complainant_id,complainant_name,complain_against,complain_against_id,date,complain_title,complain_details,status,created_at,updated_at,complainant_age,complainant_address,location_of_incident,barangay_action) VALUES ('16','blotter','43','Tovvy Dumaplin','nailyn del mundo','','2025-04-21','Abuse','test','0','2025-04-21 00:13:44','2025-04-21 00:13:44','24','Elvinda San Pedro','Crismor St.','Attack');
INSERT INTO `tbl_complaint` (complaint_id,type_of_complaint,complainant_id,complainant_name,complain_against,complain_against_id,date,complain_title,complain_details,status,created_at,updated_at,complainant_age,complainant_address,location_of_incident,barangay_action) VALUES ('17','blotter','43','Tovvy Dumaplin','nailyn del mundo','44','2025-04-15','Abuse','test','0','2025-04-21 00:14:37','2025-04-21 00:14:37','24','Elvinda San Pedro','Crismor St.','test');


-- Creating table tbl_db_history --
CREATE TABLE `tbl_db_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- Inserting data into tbl_db_history --


-- Creating table tbl_event --
CREATE TABLE `tbl_event` (
  `event_id` int NOT NULL AUTO_INCREMENT,
  `event_title` varchar(255) DEFAULT NULL,
  `event_description` varchar(255) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- Inserting data into tbl_event --
INSERT INTO `tbl_event` (event_id,event_title,event_description,start_date,end_date,status,created_at,updated_at) VALUES ('19','Sinugbaan Festival 2024','Full blown food contest for the residents','2025-04-21 21:42:00','2025-04-23 21:42:00','1','2025-04-21 21:42:21','2025-04-21 21:42:43');


-- Creating table tbl_house --
CREATE TABLE `tbl_house` (
  `id` int NOT NULL AUTO_INCREMENT,
  `house_no` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `house_street` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- Inserting data into tbl_house --
INSERT INTO `tbl_house` (id,house_no,longitude,latitude,status,house_street,type) VALUES ('9','44','121.05486129804318','14.356885962405793','1','Crismor Avenue','residential');
INSERT INTO `tbl_house` (id,house_no,longitude,latitude,status,house_street,type) VALUES ('10','123','121.0451725809158','14.363766535520401','1','Champaca Street','government');
INSERT INTO `tbl_house` (id,house_no,longitude,latitude,status,house_street,type) VALUES ('11','123','121.0523047459191','14.357655100415213','1','321','commercial');
INSERT INTO `tbl_house` (id,house_no,longitude,latitude,status,house_street,type) VALUES ('12','1q2','121.04918910256224','14.358808802473963','1','231','healthcare');
INSERT INTO `tbl_house` (id,house_no,longitude,latitude,status,house_street,type) VALUES ('13','1q23','121.05569017646675','14.359473997354533','1','231','education');
INSERT INTO `tbl_house` (id,house_no,longitude,latitude,status,house_street,type) VALUES ('14','1q23s','121.05403828882477','14.361157763059843','1','2312','transport');
INSERT INTO `tbl_house` (id,house_no,longitude,latitude,status,house_street,type) VALUES ('15','152','121.0522985756455','14.358736046663966','1','2312','commercial');
INSERT INTO `tbl_house` (id,house_no,longitude,latitude,status,house_street,type) VALUES ('16','12376','121.05884680910698','14.356345485466823','1','231','commercial');
INSERT INTO `tbl_house` (id,house_no,longitude,latitude,status,house_street,type) VALUES ('17','123','121.05260762939969','14.35553476761168','1','Kyle Korver','residential');
INSERT INTO `tbl_house` (id,house_no,longitude,latitude,status,house_street,type) VALUES ('18','123','121.05200631825481','14.353954898741076','1','Kyle Korver','residential');
INSERT INTO `tbl_house` (id,house_no,longitude,latitude,status,house_street,type) VALUES ('19','0091','121.02202902105748','14.307634846504268','1','Kyle Korver','residential');


-- Creating table tbl_inventory --
CREATE TABLE `tbl_inventory` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) DEFAULT NULL,
  `item_quantity` varchar(255) DEFAULT NULL,
  `item_description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- Inserting data into tbl_inventory --
INSERT INTO `tbl_inventory` (item_id,item_name,item_quantity,item_description,image,status,created_at,updated_at) VALUES ('1','Gcash','1','','1743763663_e1297c617416ce02cf93.png','1','2025-04-04 18:47:43','2025-04-23 00:46:17');
INSERT INTO `tbl_inventory` (item_id,item_name,item_quantity,item_description,image,status,created_at,updated_at) VALUES ('2','Airzzxxc','99','','1743788264_0942c28a840d296c3710.png','1','2025-04-04 18:48:34','2025-04-05 01:37:44');
INSERT INTO `tbl_inventory` (item_id,item_name,item_quantity,item_description,image,status,created_at,updated_at) VALUES ('3','test Paper','123','','1743765562_7ffca99f54aca6911ca7.png','1','2025-04-04 19:19:22','2025-04-04 19:19:22');
INSERT INTO `tbl_inventory` (item_id,item_name,item_quantity,item_description,image,status,created_at,updated_at) VALUES ('4','Tambo','100','','1743765884_a2633701d5226620b066.png','1','2025-04-04 19:24:44','2025-04-13 14:32:41');
INSERT INTO `tbl_inventory` (item_id,item_name,item_quantity,item_description,image,status,created_at,updated_at) VALUES ('5','123','321','','1743916450_1a219dde1df99ff137b0.png','1','2025-04-05 02:01:09','2025-04-13 14:31:04');
INSERT INTO `tbl_inventory` (item_id,item_name,item_quantity,item_description,image,status,created_at,updated_at) VALUES ('6','123','123','','1743916669_61bd1a314f733ca915d2.png','1','2025-04-06 13:17:49','2025-04-06 13:17:49');
INSERT INTO `tbl_inventory` (item_id,item_name,item_quantity,item_description,image,status,created_at,updated_at) VALUES ('7','123','123','','1743916688_ad9862af90d41cb22de9.png','1','2025-04-06 13:18:08','2025-04-06 13:18:08');
INSERT INTO `tbl_inventory` (item_id,item_name,item_quantity,item_description,image,status,created_at,updated_at) VALUES ('8','TEST!@#','TEST!@#','','1743916704_586c2c8208ae0f583192.png','1','2025-04-06 13:18:24','2025-04-06 13:18:24');
INSERT INTO `tbl_inventory` (item_id,item_name,item_quantity,item_description,image,status,created_at,updated_at) VALUES ('9','123','123','','1743916803_d690c1e98377e6e2f15d.png','1','2025-04-06 13:20:03','2025-04-06 13:20:03');
INSERT INTO `tbl_inventory` (item_id,item_name,item_quantity,item_description,image,status,created_at,updated_at) VALUES ('10','123','123','','1743916826_212188d9c99c7480e5ac.png','1','2025-04-06 13:20:26','2025-04-06 13:20:26');
INSERT INTO `tbl_inventory` (item_id,item_name,item_quantity,item_description,image,status,created_at,updated_at) VALUES ('11','1234312','123432','','1743916834_4fa37e65727b1771a970.png','1','2025-04-06 13:20:34','2025-04-06 13:20:34');
INSERT INTO `tbl_inventory` (item_id,item_name,item_quantity,item_description,image,status,created_at,updated_at) VALUES ('12','Air speedd','9999123','','1743916917_f353f6cdd184f9197730.png','1','2025-04-06 13:21:57','2025-04-06 13:21:57');
INSERT INTO `tbl_inventory` (item_id,item_name,item_quantity,item_description,image,status,created_at,updated_at) VALUES ('13','TEST REACT','190','','1743916968_7a6bac0017e8da2b2346.png','1','2025-04-06 13:22:48','2025-04-23 02:03:43');
INSERT INTO `tbl_inventory` (item_id,item_name,item_quantity,item_description,image,status,created_at,updated_at) VALUES ('14','123','123','','1744035679_f4cb5d45d4c50c08ebff.png','1','2025-04-07 22:21:19','2025-04-07 22:21:19');
INSERT INTO `tbl_inventory` (item_id,item_name,item_quantity,item_description,image,status,created_at,updated_at) VALUES ('15','test','23','','1745337190_a77852058cd6390bf5be.png','1','2025-04-22 23:53:10','2025-04-22 23:53:10');
INSERT INTO `tbl_inventory` (item_id,item_name,item_quantity,item_description,image,status,created_at,updated_at) VALUES ('16','test','23','','1745337214_0e42cd1b6fc37e969a31.png','1','2025-04-22 23:53:34','2025-04-22 23:53:34');
INSERT INTO `tbl_inventory` (item_id,item_name,item_quantity,item_description,image,status,created_at,updated_at) VALUES ('17','test','123','','1745337233_cd35f0ad3b849ec0445f.png','1','2025-04-22 23:53:53','2025-04-22 23:53:53');
INSERT INTO `tbl_inventory` (item_id,item_name,item_quantity,item_description,image,status,created_at,updated_at) VALUES ('18','test','123','','1745337245_4ca7b184ade27fa661d8.png','1','2025-04-22 23:54:05','2025-04-22 23:54:05');
INSERT INTO `tbl_inventory` (item_id,item_name,item_quantity,item_description,image,status,created_at,updated_at) VALUES ('19','test','123','[object HTMLTextAreaElement]','1745337314_2fa984808856631fad43.png','1','2025-04-22 23:55:14','2025-04-22 23:55:14');
INSERT INTO `tbl_inventory` (item_id,item_name,item_quantity,item_description,image,status,created_at,updated_at) VALUES ('20','test','123','543535','1745337528_bf0b8d7530dea47ac5f9.png','1','2025-04-22 23:58:48','2025-04-22 23:58:48');


-- Creating table tbl_inventory_history --
CREATE TABLE `tbl_inventory_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `old_quantity` varchar(255) DEFAULT NULL,
  `new_quantity` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `in_out_reason` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- Inserting data into tbl_inventory_history --


-- Creating table tbl_lending --
CREATE TABLE `tbl_lending` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item_id` int DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `borrower_id` int DEFAULT NULL,
  `borrowed_quantity` varchar(255) DEFAULT NULL,
  `borrower_desc` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date_borrowed` varchar(255) DEFAULT NULL,
  `date_of_return` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- Inserting data into tbl_lending --
INSERT INTO `tbl_lending` (id,item_id,item_name,borrower_id,borrowed_quantity,borrower_desc,status,date_borrowed,date_of_return,created_at,updated_at) VALUES ('1','30','Walis','93','3','','1','2025-04-04','','2025-04-04 18:47:43','2025-04-04 18:47:43');
INSERT INTO `tbl_lending` (id,item_id,item_name,borrower_id,borrowed_quantity,borrower_desc,status,date_borrowed,date_of_return,created_at,updated_at) VALUES ('2','13','Sample Item qqName','43','1','','1','2025-04-09','','2025-04-09 18:46:05','2025-04-09 18:46:05');
INSERT INTO `tbl_lending` (id,item_id,item_name,borrower_id,borrowed_quantity,borrower_desc,status,date_borrowed,date_of_return,created_at,updated_at) VALUES ('3','2','Sample Item Name','43','123','','1','2025-04-09','','2025-04-09 18:53:58','2025-04-09 18:53:58');
INSERT INTO `tbl_lending` (id,item_id,item_name,borrower_id,borrowed_quantity,borrower_desc,status,date_borrowed,date_of_return,created_at,updated_at) VALUES ('4','4','Sample Item Name','44','2','','1','2025-04-09','','2025-04-09 19:03:55','2025-04-09 19:03:55');
INSERT INTO `tbl_lending` (id,item_id,item_name,borrower_id,borrowed_quantity,borrower_desc,status,date_borrowed,date_of_return,created_at,updated_at) VALUES ('5','1','Sample Item Name','45','4','','2','2025-04-09','','2025-04-09 19:16:51','2025-04-13 14:32:19');
INSERT INTO `tbl_lending` (id,item_id,item_name,borrower_id,borrowed_quantity,borrower_desc,status,date_borrowed,date_of_return,created_at,updated_at) VALUES ('6','1','Sample Item Name','51','1','','1','2025-04-09','','2025-04-09 19:19:53','2025-04-09 19:19:53');
INSERT INTO `tbl_lending` (id,item_id,item_name,borrower_id,borrowed_quantity,borrower_desc,status,date_borrowed,date_of_return,created_at,updated_at) VALUES ('7','1','Sample Item Name','51','7','','1','2025-04-09','','2025-04-09 19:20:26','2025-04-09 19:20:26');
INSERT INTO `tbl_lending` (id,item_id,item_name,borrower_id,borrowed_quantity,borrower_desc,status,date_borrowed,date_of_return,created_at,updated_at) VALUES ('8','4','Tambo','51','1','','2','','','2025-04-09 19:23:43','2025-04-13 14:32:41');
INSERT INTO `tbl_lending` (id,item_id,item_name,borrower_id,borrowed_quantity,borrower_desc,status,date_borrowed,date_of_return,created_at,updated_at) VALUES ('9','1','Gcash','43','3','','1','2025-04-09','','2025-04-09 19:24:20','2025-04-09 19:24:20');
INSERT INTO `tbl_lending` (id,item_id,item_name,borrower_id,borrowed_quantity,borrower_desc,status,date_borrowed,date_of_return,created_at,updated_at) VALUES ('10','1','Gcash','43','1','test reason','1','2025-04-13','','2025-04-13 19:54:05','2025-04-13 19:54:05');
INSERT INTO `tbl_lending` (id,item_id,item_name,borrower_id,borrowed_quantity,borrower_desc,status,date_borrowed,date_of_return,created_at,updated_at) VALUES ('11','1','Gcash','43','23','test','1','2025-04-20','2025-04-21','2025-04-20 23:01:38','2025-04-20 23:01:38');
INSERT INTO `tbl_lending` (id,item_id,item_name,borrower_id,borrowed_quantity,borrower_desc,status,date_borrowed,date_of_return,created_at,updated_at) VALUES ('12','1',' Gcash ','43','100','test','1','2025-04-23','2025-04-25','2025-04-23 00:43:35','2025-04-23 00:43:35');
INSERT INTO `tbl_lending` (id,item_id,item_name,borrower_id,borrowed_quantity,borrower_desc,status,date_borrowed,date_of_return,created_at,updated_at) VALUES ('13','1',' Gcash ','43','1','test','1','2025-04-23','2025-04-25','2025-04-23 00:44:53','2025-04-23 00:44:53');
INSERT INTO `tbl_lending` (id,item_id,item_name,borrower_id,borrowed_quantity,borrower_desc,status,date_borrowed,date_of_return,created_at,updated_at) VALUES ('14','1',' Gcash ','43','1','test','1','2025-04-22','2025-04-25','2025-04-23 00:46:17','2025-04-23 00:46:17');


-- Creating table tbl_officials --
CREATE TABLE `tbl_officials` (
  `official_id` int NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- Inserting data into tbl_officials --
INSERT INTO `tbl_officials` (official_id,firstname,middlename,lastname,suffix,position,status,image,start_service,end_service,created_at,updated_at) VALUES ('13','test','test','test','','Captain','1','uploads/1744547423_bf3934aabdc477100324.png','2025-04-13','2025-04-16','2025-04-13 20:30:23','2025-04-13 20:30:23');
INSERT INTO `tbl_officials` (official_id,firstname,middlename,lastname,suffix,position,status,image,start_service,end_service,created_at,updated_at) VALUES ('14','test','test','test','Jr.','Secretary','1','uploads/1744547443_1013019f831403495bb8.png','2025-04-29','2025-04-08','2025-04-13 20:30:43','2025-04-13 20:30:43');
INSERT INTO `tbl_officials` (official_id,firstname,middlename,lastname,suffix,position,status,image,start_service,end_service,created_at,updated_at) VALUES ('15','nailyn','test','del mundo','','Secretary','1','uploads/1744547455_c014334701c649ad3d4f.png','2025-04-13','2025-04-15','2025-04-13 20:30:55','2025-04-13 20:30:55');
INSERT INTO `tbl_officials` (official_id,firstname,middlename,lastname,suffix,position,status,image,start_service,end_service,created_at,updated_at) VALUES ('16','test','test','test','','Secretary','1','uploads/1744547472_bb8e5a8fe1cc6a900bfa.png','2025-04-14','2025-04-15','2025-04-13 20:31:12','2025-04-13 20:31:12');
INSERT INTO `tbl_officials` (official_id,firstname,middlename,lastname,suffix,position,status,image,start_service,end_service,created_at,updated_at) VALUES ('17','nailyn','D','del mundo','null','Comm. On Peace & Order & Public Safety','1','uploads/1744553404_f0b82a6d46c7f327b4b8.png','2025-04-08','2025-04-26','2025-04-13 22:10:04','2025-04-13 22:19:11');


-- Creating table tbl_positions --
CREATE TABLE `tbl_positions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `position_name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- Inserting data into tbl_positions --
INSERT INTO `tbl_positions` (id,position_name,status,created_at,updated_at) VALUES ('1','test','0','2025-04-25 01:48:48','2025-04-25 01:58:16');
INSERT INTO `tbl_positions` (id,position_name,status,created_at,updated_at) VALUES ('2','Captain@','0','2025-04-25 01:58:22','2025-04-25 02:15:39');
INSERT INTO `tbl_positions` (id,position_name,status,created_at,updated_at) VALUES ('3','captain','0','2025-04-25 02:15:43','2025-04-25 02:20:44');
INSERT INTO `tbl_positions` (id,position_name,status,created_at,updated_at) VALUES ('4','Secretary','0','2025-04-25 02:19:26','2025-04-25 02:21:36');
INSERT INTO `tbl_positions` (id,position_name,status,created_at,updated_at) VALUES ('5','Captain','1','2025-04-25 21:09:09','2025-04-25 21:09:09');


-- Creating table tbl_residents --
CREATE TABLE `tbl_residents` (
  `resident_id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `birthdate` varchar(255) DEFAULT NULL,
  `birthplace` varchar(255) DEFAULT NULL,
  `citizenship` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `civil_status` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `is_pwd` varchar(255) DEFAULT NULL,
  `is_voter_of_barangay` varchar(255) DEFAULT NULL,
  `is_family_head` varchar(255) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- Inserting data into tbl_residents --
INSERT INTO `tbl_residents` (resident_id,firstname,middlename,lastname,suffix,contact_no,birthdate,birthplace,citizenship,gender,civil_status,occupation,religion,is_pwd,is_voter_of_barangay,is_family_head,household_name,house_no,street,status,created_at,updated_at,contact_name,emergency_contact_no,contact_relationship) VALUES ('43','Tovvy','burgos','Dumaplin','','09323876554','2025-03-12','Binan Laguna','Filipino','Male','Single','Developer','Catholic','1','1','1','Dumaplin','44','b5 l26 crismor ave elvinda village','1','2025-03-26 22:56:53','2025-03-26 22:56:53','nailyn del mundo','098988375672','Partner');
INSERT INTO `tbl_residents` (resident_id,firstname,middlename,lastname,suffix,contact_no,birthdate,birthplace,citizenship,gender,civil_status,occupation,religion,is_pwd,is_voter_of_barangay,is_family_head,household_name,house_no,street,status,created_at,updated_at,contact_name,emergency_contact_no,contact_relationship) VALUES ('44','nailyn','c','del mundo','','09323876554','2025-03-18','Binan Laguna','Filipino','Male','Single','Developer','Catholic','1','1','0','TEST','44','b5 l26 crismor ave elvinda village','1','2025-03-26 22:56:53','2025-03-29 20:07:33','Tovvy Dumaplin','098988375672','Partner');
INSERT INTO `tbl_residents` (resident_id,firstname,middlename,lastname,suffix,contact_no,birthdate,birthplace,citizenship,gender,civil_status,occupation,religion,is_pwd,is_voter_of_barangay,is_family_head,household_name,house_no,street,status,created_at,updated_at,contact_name,emergency_contact_no,contact_relationship) VALUES ('45','123','123','123','Jr.','123','2025-03-14','123','123','Female','Divorced','123','123','1','1','0','123','44','Crismor Avenue','1','2025-03-29 19:39:55','2025-04-06 13:33:58','123','123','123');
INSERT INTO `tbl_residents` (resident_id,firstname,middlename,lastname,suffix,contact_no,birthdate,birthplace,citizenship,gender,civil_status,occupation,religion,is_pwd,is_voter_of_barangay,is_family_head,household_name,house_no,street,status,created_at,updated_at,contact_name,emergency_contact_no,contact_relationship) VALUES ('46','123','123','123','Jr.','123','2025-03-12','213','213','Male','Single','123','123','1','1','0','123','44','Crismor Avenue','1','2025-03-29 20:07:04','2025-04-06 13:32:27','123','123','123');
INSERT INTO `tbl_residents` (resident_id,firstname,middlename,lastname,suffix,contact_no,birthdate,birthplace,citizenship,gender,civil_status,occupation,religion,is_pwd,is_voter_of_barangay,is_family_head,household_name,house_no,street,status,created_at,updated_at,contact_name,emergency_contact_no,contact_relationship) VALUES ('47','Jedo','D','Dumaplin','','09323876554','2025-04-16','123','123','Female','Married','123','123','0','0','0','123','44','Crismor Avenue','0','2025-04-01 14:00:55','2025-04-06 17:47:46','123','123','123');
INSERT INTO `tbl_residents` (resident_id,firstname,middlename,lastname,suffix,contact_no,birthdate,birthplace,citizenship,gender,civil_status,occupation,religion,is_pwd,is_voter_of_barangay,is_family_head,household_name,house_no,street,status,created_at,updated_at,contact_name,emergency_contact_no,contact_relationship) VALUES ('48','Tovvy','B','Dumaplin','','09323876554','2025-04-07','Binan Laguna','Filipino','Male','Single','Developer','Catholic','0','0','0','Dumaplin','44','Crismor Avenue','1','2025-04-07 21:14:01','2025-04-07 21:20:20','nailyn del mundo','098988375672','Partner');
INSERT INTO `tbl_residents` (resident_id,firstname,middlename,lastname,suffix,contact_no,birthdate,birthplace,citizenship,gender,civil_status,occupation,religion,is_pwd,is_voter_of_barangay,is_family_head,household_name,house_no,street,status,created_at,updated_at,contact_name,emergency_contact_no,contact_relationship) VALUES ('49','nailyn','123','del mundo','','123','2025-04-10','123','Andorran','Male','Single','123','123','0','0','1','123','152','2312','1','2025-04-07 21:28:30','2025-04-21 21:41:18','123','123','123');
INSERT INTO `tbl_residents` (resident_id,firstname,middlename,lastname,suffix,contact_no,birthdate,birthplace,citizenship,gender,civil_status,occupation,religion,is_pwd,is_voter_of_barangay,is_family_head,household_name,house_no,street,status,created_at,updated_at,contact_name,emergency_contact_no,contact_relationship) VALUES ('50','Test','ZXC','ASD','','09323876554','2025-04-08','123','Algerian','Female','Married','Developer','123','1','1','0','Dumaplin','44','Crismor Avenue','1','2025-04-07 21:28:30','2025-04-07 21:28:55','nailyn del mundo','098988375672','123');
INSERT INTO `tbl_residents` (resident_id,firstname,middlename,lastname,suffix,contact_no,birthdate,birthplace,citizenship,gender,civil_status,occupation,religion,is_pwd,is_voter_of_barangay,is_family_head,household_name,house_no,street,status,created_at,updated_at,contact_name,emergency_contact_no,contact_relationship) VALUES ('51','Kyle','Korver','C','','09323876554','2025-04-10','1','Afghan','Male','Married','Developer','Catholic','0','0','1','Korver','0091','Kyle Korver','1','2025-04-09 19:19:23','2025-04-09 19:19:23','Kyle Korver','Kyle Korver','Kyle Korver');
INSERT INTO `tbl_residents` (resident_id,firstname,middlename,lastname,suffix,contact_no,birthdate,birthplace,citizenship,gender,civil_status,occupation,religion,is_pwd,is_voter_of_barangay,is_family_head,household_name,house_no,street,status,created_at,updated_at,contact_name,emergency_contact_no,contact_relationship) VALUES ('52','test','test','test','Jr.','09323876554','2025-04-13','Binan Laguna','Afghan','Male','Single','Developer','Catholic','0','0','0','Dumaplin','44','Crismor Avenue','1','2025-04-13 19:34:01','2025-04-13 19:34:01','nailyn del mundo','098988375672','Partner');
INSERT INTO `tbl_residents` (resident_id,firstname,middlename,lastname,suffix,contact_no,birthdate,birthplace,citizenship,gender,civil_status,occupation,religion,is_pwd,is_voter_of_barangay,is_family_head,household_name,house_no,street,status,created_at,updated_at,contact_name,emergency_contact_no,contact_relationship) VALUES ('53','nailyn','123','del mundo','Jr.','09323876554','2025-04-14','Binan Laguna','Albanian','Male','Married','Developer','Catholic','0','0','0','213','44','Crismor Avenue','1','2025-04-13 19:34:30','2025-04-13 19:34:30','nailyn del mundo','098988375672','123');
INSERT INTO `tbl_residents` (resident_id,firstname,middlename,lastname,suffix,contact_no,birthdate,birthplace,citizenship,gender,civil_status,occupation,religion,is_pwd,is_voter_of_barangay,is_family_head,household_name,house_no,street,status,created_at,updated_at,contact_name,emergency_contact_no,contact_relationship) VALUES ('54','test','test','test','Sr.','09323876554','2025-04-13','Binan Laguna','Filipino','Male','Single','Developer','Catholic','0','0','0','123','44','Crismor Avenue','1','2025-04-13 19:39:38','2025-04-13 19:39:38','nailyn del mundo','098988375672','123');
INSERT INTO `tbl_residents` (resident_id,firstname,middlename,lastname,suffix,contact_no,birthdate,birthplace,citizenship,gender,civil_status,occupation,religion,is_pwd,is_voter_of_barangay,is_family_head,household_name,house_no,street,status,created_at,updated_at,contact_name,emergency_contact_no,contact_relationship) VALUES ('55','test','123','test','Sr.','09323876554','2025-04-13','123','Filipino','Male','Single','Developer','Catholic','0','0','1','test','44','Crismor Avenue','0','2025-04-13 20:05:28','2025-04-21 21:41:12','test','test','test');
INSERT INTO `tbl_residents` (resident_id,firstname,middlename,lastname,suffix,contact_no,birthdate,birthplace,citizenship,gender,civil_status,occupation,religion,is_pwd,is_voter_of_barangay,is_family_head,household_name,house_no,street,status,created_at,updated_at,contact_name,emergency_contact_no,contact_relationship) VALUES ('56','Test','AD','D','Jr.','09323876554','2022-04-26','Binan Laguna','Filipino','Male','Single','Developer','Catholic','0','0','0','Dumaplin','44','Crismor Avenue','1','2025-04-21 23:03:59','2025-04-21 23:03:59','nailyn del mundo','098988375672','123');
INSERT INTO `tbl_residents` (resident_id,firstname,middlename,lastname,suffix,contact_no,birthdate,birthplace,citizenship,gender,civil_status,occupation,religion,is_pwd,is_voter_of_barangay,is_family_head,household_name,house_no,street,status,created_at,updated_at,contact_name,emergency_contact_no,contact_relationship) VALUES ('57','nailyn','123','del mundo','','09323876554','2025-05-30','Binan Laguna','Filipino','Female','Single','Developer','Catholic','0','0','0','Dumaplin','44','b5 l26 crismor ave elvinda village','1','2025-04-21 23:05:41','2025-04-21 23:05:41','nailyn del mundo','123','123');
INSERT INTO `tbl_residents` (resident_id,firstname,middlename,lastname,suffix,contact_no,birthdate,birthplace,citizenship,gender,civil_status,occupation,religion,is_pwd,is_voter_of_barangay,is_family_head,household_name,house_no,street,status,created_at,updated_at,contact_name,emergency_contact_no,contact_relationship) VALUES ('58','Jers','123','del mundo','','09323876554','2025-05-30','Binan Laguna','Filipino','Male','Single','Developer','Catholic','0','0','0','Dumaplin','44','Crismor Avenue','1','2025-04-21 23:05:41','2025-04-21 23:05:41','nailyn del mundo','098988375672','Partner');
INSERT INTO `tbl_residents` (resident_id,firstname,middlename,lastname,suffix,contact_no,birthdate,birthplace,citizenship,gender,civil_status,occupation,religion,is_pwd,is_voter_of_barangay,is_family_head,household_name,house_no,street,status,created_at,updated_at,contact_name,emergency_contact_no,contact_relationship) VALUES ('59','nailyn','D','del mundo','','09323876554','2025-04-29','Binan Laguna','Filipino','Male','Single','Developer','Catholic','0','0','1','Dumaplin','0','b5 l26 crismor ave elvinda village','1','2025-04-22 22:16:35','2025-04-22 22:21:29','nailyn del mundo','123','Test 2');


-- Creating table tbl_suffix --
CREATE TABLE `tbl_suffix` (
  `id` int NOT NULL AUTO_INCREMENT,
  `suffix_title` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- Inserting data into tbl_suffix --
INSERT INTO `tbl_suffix` (id,suffix_title,status,created_at,updated_at) VALUES ('1','Jr','1','2025-04-25 01:03:45','2025-04-25 01:12:15');
INSERT INTO `tbl_suffix` (id,suffix_title,status,created_at,updated_at) VALUES ('2','Sr','1','2025-04-25 01:03:51','2025-04-25 01:03:51');
INSERT INTO `tbl_suffix` (id,suffix_title,status,created_at,updated_at) VALUES ('3','iii','1','2025-04-25 01:04:43','2025-04-25 01:23:30');
INSERT INTO `tbl_suffix` (id,suffix_title,status,created_at,updated_at) VALUES ('4','IV','1','2025-04-25 01:04:48','2025-04-25 01:04:48');
INSERT INTO `tbl_suffix` (id,suffix_title,status,created_at,updated_at) VALUES ('5','1','0','2025-04-25 02:21:20','2025-04-25 02:21:24');
INSERT INTO `tbl_suffix` (id,suffix_title,status,created_at,updated_at) VALUES ('6','test','1','2025-04-25 21:12:00','2025-04-25 21:12:00');
INSERT INTO `tbl_suffix` (id,suffix_title,status,created_at,updated_at) VALUES ('7','test2','1','2025-04-25 21:12:03','2025-04-25 21:12:03');
INSERT INTO `tbl_suffix` (id,suffix_title,status,created_at,updated_at) VALUES ('8','test3','1','2025-04-25 21:12:05','2025-04-25 21:12:05');
INSERT INTO `tbl_suffix` (id,suffix_title,status,created_at,updated_at) VALUES ('9','test4','1','2025-04-25 21:12:08','2025-04-25 21:12:08');
INSERT INTO `tbl_suffix` (id,suffix_title,status,created_at,updated_at) VALUES ('10','test5','1','2025-04-25 21:12:10','2025-04-25 21:12:10');
INSERT INTO `tbl_suffix` (id,suffix_title,status,created_at,updated_at) VALUES ('11','test65','1','2025-04-25 21:12:13','2025-04-25 21:12:13');
INSERT INTO `tbl_suffix` (id,suffix_title,status,created_at,updated_at) VALUES ('12','test7','1','2025-04-25 21:12:15','2025-04-25 21:12:15');
INSERT INTO `tbl_suffix` (id,suffix_title,status,created_at,updated_at) VALUES ('13','test6','1','2025-04-25 21:12:17','2025-04-25 21:12:17');
INSERT INTO `tbl_suffix` (id,suffix_title,status,created_at,updated_at) VALUES ('14','test8','1','2025-04-25 21:12:19','2025-04-25 21:12:19');
INSERT INTO `tbl_suffix` (id,suffix_title,status,created_at,updated_at) VALUES ('15','test9','1','2025-04-25 21:12:22','2025-04-25 21:12:22');
INSERT INTO `tbl_suffix` (id,suffix_title,status,created_at,updated_at) VALUES ('16','test11','1','2025-04-25 21:12:25','2025-04-25 21:12:25');
