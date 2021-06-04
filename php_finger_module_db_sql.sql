-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.1.71-community - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for php_finger_module_db
CREATE DATABASE IF NOT EXISTS `php_finger_module_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `php_finger_module_db`;


-- Dumping structure for table php_finger_module_db.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `reg_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `empno` varchar(50) NOT NULL DEFAULT '',
  `f_no1` tinyint(4) NOT NULL,
  `fptemplate1` varchar(3000) NOT NULL,
  `f_no2` tinyint(4) NOT NULL,
  `fptemplate2` varchar(3000) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `empfname` varchar(50) NOT NULL,
  `empsname` varchar(50) NOT NULL,
  PRIMARY KEY (`empno`),
  UNIQUE KEY `reg_id` (`reg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table php_finger_module_db.employees: 2 rows
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
