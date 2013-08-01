# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.29)
# Database: Friendly
# Generation Time: 2013-08-01 13:35:32 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table messages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `messageId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(200) DEFAULT '',
  `senderId` int(11) unsigned NOT NULL,
  `recieverId` int(11) unsigned NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`messageId`),
  KEY `sender_fk` (`senderId`),
  KEY `reciever_fk` (`recieverId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;

INSERT INTO `messages` (`messageId`, `message`, `senderId`, `recieverId`, `date`)
VALUES
	(1,'this is a test message',22,67,'2012-12-12 00:00:00'),
	(2,'this is a second message',22,67,'2012-12-13 00:00:00'),
	(3,'this is a different message',22,2,'2012-01-14 00:00:00'),
	(5,'asdfasdf',22,3,'2012-01-14 00:00:00'),
	(6,'asdfasdfasdfffff',22,67,'2013-07-30 00:00:00'),
	(7,'jasldkfjasldkfja;sldkfj',22,67,'2013-07-30 00:00:00'),
	(8,'hey whats up?',22,67,'2013-07-30 00:00:00'),
	(9,'nothing much you',22,67,'2013-07-30 00:00:00'),
	(10,'hahahahha',22,2,'2013-07-30 00:00:00'),
	(11,'aslfjkasldkfjasdf',22,2,'2013-07-30 00:00:00'),
	(12,'aslkdjflskdjfsd',22,2,'2013-07-30 00:00:00'),
	(13,'asdfasdfasdfsdf',22,68,'2013-07-30 00:00:00'),
	(14,'jklajsdfl;kjasdf',22,68,'2013-07-30 00:00:00'),
	(15,'asdlkfjsldkfjsldkjfsdf',22,68,'2013-07-30 00:00:00'),
	(16,'jksdkfjlskdfjsdlfkjj',22,68,'2013-07-30 00:00:00'),
	(17,'asdfsdfsdfasdf',22,68,'2013-07-30 00:00:00'),
	(18,'asdfasdfasdf',22,67,'2013-07-30 00:00:00'),
	(19,'asdfasdfasdf',22,67,'2013-07-30 00:00:00'),
	(20,'asdflkjasdfkljasdlfkjasdf',22,67,'2013-07-30 00:00:00'),
	(21,'asdfasdfasdfasdf',22,68,'2013-07-30 00:00:00'),
	(22,'dfasdasdfasdf',71,71,'2013-07-30 00:00:00'),
	(23,'asdfasdfasdf',71,69,'2013-07-30 00:00:00'),
	(24,'hahahaha',71,68,'2013-07-30 00:00:00'),
	(25,'yeah i dont know',71,68,'2013-07-30 00:00:00'),
	(26,'blah blah',71,68,'2013-07-30 00:00:00'),
	(27,'asdfasdf',71,68,'2013-07-30 00:00:00'),
	(28,'asdfasdf',71,68,'2013-07-30 00:00:00'),
	(29,'asdfasdf',71,68,'2013-07-30 00:00:00'),
	(30,'sdffff',71,68,'2013-07-30 00:00:00'),
	(31,'asdfasdf',71,68,'2013-07-30 00:00:00'),
	(32,'ffffff',71,68,'2013-07-30 00:00:00'),
	(33,'asdfasdfasdf',71,68,'2013-07-30 11:13:00'),
	(34,'sdfsdfd',22,2,'2013-07-30 11:54:07'),
	(35,'hadsfaksdjfa;sldkfja;lksgjas;ldkfjasdf',22,73,'2013-07-30 11:56:57'),
	(36,'kjsdflkjasdfasdjf;lkajsdf;lsakdj;lfjkgs;lkrj',22,71,'2013-07-30 11:57:03'),
	(38,'asdfasdfasdfasd',22,2,'2013-07-30 12:06:44'),
	(39,'sdfasdfasdf',22,2,'2013-07-30 12:06:46'),
	(40,'asdfasdasdf',22,71,'2013-07-30 13:28:31'),
	(41,'asdfasdasdf',22,69,'2013-07-30 13:29:49'),
	(42,'asdasdf',22,71,'2013-07-30 13:41:04'),
	(43,'asdfasdf',22,68,'2013-08-01 09:18:26');

/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `uname_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`userId`, `username`, `password`, `email`)
VALUES
	(22,'Michael','401002df7467a32c109120bb6317bf29','mfleming7024@gmail.com'),
	(67,'user1','912ec803b2ce49e4a541068d495ab570','asdf@gmail.com'),
	(68,'My username','d1e97d8e06870ad36b6333a694bb1c59','fffffff@gmail.com'),
	(69,'asfff','f11f16e2a77afb80cb4e4232a8d04b7e','asdfasdf@gm.com'),
	(71,'asdfasdfasdfffwewe','b89c40ab76a918f46df5df86ecc0290a','asdff@gmail.com'),
	(73,'dsffff','3342441d2431c27d19fcb7cf5529c974','asdfasdf@gm.com');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
