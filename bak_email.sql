/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : my_admin

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-04-08 16:03:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bak_email
-- ----------------------------
DROP TABLE IF EXISTS `bak_email`;
CREATE TABLE `bak_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '邮件类型',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '邮件标题',
  `content` text COLLATE utf8mb4_unicode_ci COMMENT '邮件内容',
  `code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '邮箱验证码',
  `deadline` int(11) DEFAULT NULL COMMENT '过期时间',
  `from` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '邮件发件人地址',
  `to` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '邮件接受人地址',
  `sender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '发件人昵称',
  `sendee` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '收件人',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
