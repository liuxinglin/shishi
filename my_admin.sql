/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : my_admin

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-04-16 21:55:22
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of bak_email
-- ----------------------------
INSERT INTO `bak_email` VALUES ('6', '1', '找回密码验证码', '找回密码验证码：2392', '2392', '1523207684', 'lxlclever@163.com', '183393021@qq.com', 'Example', null, '1523207084', '1523207084');
INSERT INTO `bak_email` VALUES ('5', '1', '找回密码验证码', '找回密码验证码：3179', '3179', '1523207593', 'lxlclever@163.com', '183393021@qq.com', 'Example', null, '1523206993', '1523206993');
INSERT INTO `bak_email` VALUES ('4', '1', '找回密码验证码', '找回密码验证码：5722', '5722', '1523207569', 'lxlclever@163.com', '183393021@qq.com', 'Example', null, '1523206969', '1523206969');

-- ----------------------------
-- Table structure for bak_permission
-- ----------------------------
DROP TABLE IF EXISTS `bak_permission`;
CREATE TABLE `bak_permission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父级权限id',
  `sort` tinyint(4) NOT NULL DEFAULT '1' COMMENT '排序',
  `is_menu` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否为菜单',
  `is_func` tinyint(4) NOT NULL DEFAULT '0',
  `color` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '权限名称',
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'icon图标',
  `route` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '权限描述',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '权限状态（0：禁用  1：启用）',
  `level` int(11) NOT NULL DEFAULT '1',
  `appid` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT '0',
  `updated_at` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of bak_permission
-- ----------------------------

-- ----------------------------
-- Table structure for bak_role
-- ----------------------------
DROP TABLE IF EXISTS `bak_role`;
CREATE TABLE `bak_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sort` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序',
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '角色名',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态（0：禁用  1：启用）',
  `desc` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '角色描述',
  `rank` tinyint(4) NOT NULL DEFAULT '0',
  `appid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of bak_role
-- ----------------------------

-- ----------------------------
-- Table structure for bak_role_permission
-- ----------------------------
DROP TABLE IF EXISTS `bak_role_permission`;
CREATE TABLE `bak_role_permission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of bak_role_permission
-- ----------------------------

-- ----------------------------
-- Table structure for bak_user
-- ----------------------------
DROP TABLE IF EXISTS `bak_user`;
CREATE TABLE `bak_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户名',
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
  `nickname` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `headimg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '邮箱地址',
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '电话号码',
  `is_super` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否为超级管理员',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '用户状态',
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `signed_at` datetime DEFAULT NULL COMMENT '登录时间',
  `signed_ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '登录ip',
  `register_ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '注册IP地址',
  `last_login_time` datetime DEFAULT NULL COMMENT '上次登录时间',
  `last_login_ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '上次登录ip',
  `appid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `bak_user_username_unique` (`username`) USING BTREE,
  UNIQUE KEY `bak_user_email_unique` (`email`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of bak_user
-- ----------------------------
INSERT INTO `bak_user` VALUES ('3', 'admin', '123456a', '测试', null, null, null, '1', '1', null, null, '1523112616', '2018-04-07 14:50:16', '127.0.0.1', null, '2018-04-07 07:28:57', '127.0.0.1', '0');

-- ----------------------------
-- Table structure for bak_user_role
-- ----------------------------
DROP TABLE IF EXISTS `bak_user_role`;
CREATE TABLE `bak_user_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of bak_user_role
-- ----------------------------
