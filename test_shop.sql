/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : test_shop

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2014-09-21 20:20:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_buy`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_buy`;
CREATE TABLE `tbl_buy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_users_id` int(11) DEFAULT NULL,
  `tbl_products_id` int(11) DEFAULT NULL,
  `product_qty` int(11) DEFAULT NULL,
  `buy_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_buy
-- ----------------------------
INSERT INTO `tbl_buy` VALUES ('5', '1', '2', '1', '2014-05-24 07:43:28');
INSERT INTO `tbl_buy` VALUES ('6', '1', '4', '4', '2014-05-24 07:43:28');
INSERT INTO `tbl_buy` VALUES ('7', '1', '2', '1', '2014-05-24 07:45:42');
INSERT INTO `tbl_buy` VALUES ('8', '1', '4', '4', '2014-05-24 07:45:42');
INSERT INTO `tbl_buy` VALUES ('9', '1', '2', '1', '2014-05-24 07:47:18');
INSERT INTO `tbl_buy` VALUES ('10', '1', '4', '4', '2014-05-24 07:47:18');
INSERT INTO `tbl_buy` VALUES ('11', '1', '2', '1', '2014-05-24 07:48:50');
INSERT INTO `tbl_buy` VALUES ('12', '1', '4', '4', '2014-05-24 07:48:50');
INSERT INTO `tbl_buy` VALUES ('13', '1', '2', '1', '2014-05-24 07:49:04');
INSERT INTO `tbl_buy` VALUES ('14', '1', '4', '4', '2014-05-24 07:49:04');
INSERT INTO `tbl_buy` VALUES ('15', '1', '2', '1', '2014-05-24 09:56:33');
INSERT INTO `tbl_buy` VALUES ('16', '1', '3', '1', '2014-08-28 16:06:33');
INSERT INTO `tbl_buy` VALUES ('17', '1', '2', '1', '2014-08-28 16:06:33');
INSERT INTO `tbl_buy` VALUES ('18', '1', '3', '1', '2014-09-10 18:58:19');

-- ----------------------------
-- Table structure for `tbl_products`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_products`;
CREATE TABLE `tbl_products` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(50) DEFAULT NULL,
  `productImage` varchar(250) DEFAULT NULL,
  `productPrice` float(7,2) DEFAULT NULL,
  `productDescription` text,
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_products
-- ----------------------------
INSERT INTO `tbl_products` VALUES ('1', 'Classic Shoe', 's8.jpg', '95.00', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod');
INSERT INTO `tbl_products` VALUES ('2', 'Modarate Shoe', 's7.jpg', '38.00', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod');
INSERT INTO `tbl_products` VALUES ('3', 'Deg Shoe', 's9.jpg', '129.00', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod');
INSERT INTO `tbl_products` VALUES ('4', 'Sport Shoe', 's6.jpg', '100.00', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod');

-- ----------------------------
-- Table structure for `tbl_users`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(35) DEFAULT NULL,
  `lastname` varchar(35) DEFAULT NULL,
  `email_address` varchar(150) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_users
-- ----------------------------
INSERT INTO `tbl_users` VALUES ('1', 'sampath', 'gamage', 'sampathgamage3@gmail.com', 'admin', 'admin');
INSERT INTO `tbl_users` VALUES ('2', 'sanka', 'ravin', 'sanka@sank.com', 'sanka', 'sanka123');
INSERT INTO `tbl_users` VALUES ('3', 'sampath', 'gamage', 'user@gmail.com', 'user123', 'user');
