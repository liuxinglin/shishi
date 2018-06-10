/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : shishi

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-06-11 00:22:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bak_coms_flow
-- ----------------------------
DROP TABLE IF EXISTS `bak_coms_flow`;
CREATE TABLE `bak_coms_flow` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL COMMENT '推广员id',
  `pro_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '推广码',
  `gamer` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '玩家充值金额',
  `amount` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT '充值金额',
  `total_amount` decimal(15,2) DEFAULT '0.00' COMMENT '累积充值金额',
  `commission` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT '佣金',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '佣金状态（0：未领取  1：已领取）',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of bak_coms_flow
-- ----------------------------

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

-- ----------------------------
-- Records of bak_email
-- ----------------------------

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
-- Table structure for bak_promoter
-- ----------------------------
DROP TABLE IF EXISTS `bak_promoter`;
CREATE TABLE `bak_promoter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户名',
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
  `nickname` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '用户昵称',
  `code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '推广码',
  `commission` decimal(15,2) DEFAULT NULL COMMENT '佣金',
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '手机号码',
  `headimg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '头像',
  `email` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '邮箱',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '推广员状态（0：禁用  1：启用）',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `signed_at` datetime DEFAULT NULL COMMENT '登录时间',
  `signed_ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '登录IP',
  `register_ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '注册IP',
  `last_login_time` datetime DEFAULT NULL COMMENT '上次登录时间',
  `last_login_ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '上次登录IP',
  `appid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_code` (`code`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of bak_promoter
-- ----------------------------
INSERT INTO `bak_promoter` VALUES ('1', 'liuxl', '', null, null, null, null, null, null, '1', null, null, null, null, null, null, null, null);
INSERT INTO `bak_promoter` VALUES ('2', 'test', 'eyJpdiI6ImIybE1lYnY2Rm5WU3QyRm1T', '测试', '2569', null, null, null, null, '1', '1527044820', '1527044820', null, null, '127.0.0.1', null, null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of bak_user
-- ----------------------------
INSERT INTO `bak_user` VALUES ('1', 'admin', '123456a', '测试', null, null, null, '1', '1', null, null, '1523174423', '2018-04-08 08:00:23', '127.0.0.1', null, '2018-04-08 01:15:17', '127.0.0.1', '0');

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

-- ----------------------------
-- Table structure for ss_banner
-- ----------------------------
DROP TABLE IF EXISTS `ss_banner`;
CREATE TABLE `ss_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL COMMENT 'Banner标题',
  `imgurl` varchar(255) NOT NULL COMMENT 'Banner图片地址',
  `linkurl` varchar(255) DEFAULT NULL COMMENT 'Banner外链地址',
  `position_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'Banner位置ID',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'Banner排序',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ss_banner
-- ----------------------------

-- ----------------------------
-- Table structure for ss_enrolment
-- ----------------------------
DROP TABLE IF EXISTS `ss_enrolment`;
CREATE TABLE `ss_enrolment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL DEFAULT '0' COMMENT '报名人ID',
  `nickname` varchar(20) DEFAULT NULL COMMENT '报名人昵称',
  `phone` varchar(11) DEFAULT NULL COMMENT '报名人电话号码',
  `tryout_id` int(11) NOT NULL DEFAULT '0' COMMENT '试用信息ID',
  `product_id` int(11) DEFAULT NULL COMMENT '试用产品ID',
  `votes_num` int(11) NOT NULL DEFAULT '0' COMMENT '获得票数',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ss_enrolment
-- ----------------------------

-- ----------------------------
-- Table structure for ss_member
-- ----------------------------
DROP TABLE IF EXISTS `ss_member`;
CREATE TABLE `ss_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户名',
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
  `nickname` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `headimg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '邮箱地址',
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '电话号码',
  `realname` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT '是否为超级管理员',
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ss_member
-- ----------------------------

-- ----------------------------
-- Table structure for ss_member_sns
-- ----------------------------
DROP TABLE IF EXISTS `ss_member_sns`;
CREATE TABLE `ss_member_sns` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) NOT NULL DEFAULT '0' COMMENT '顾客ID',
  `unionid` varchar(32) DEFAULT NULL COMMENT '平台登录唯一ID',
  `openid` varchar(32) DEFAULT NULL,
  `nickanme` varchar(32) DEFAULT NULL COMMENT '昵称',
  `sex` tinyint(4) DEFAULT '0' COMMENT '性别',
  `headimgurl` varchar(255) DEFAULT NULL COMMENT '头像',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ss_member_sns
-- ----------------------------

-- ----------------------------
-- Table structure for ss_product
-- ----------------------------
DROP TABLE IF EXISTS `ss_product`;
CREATE TABLE `ss_product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) NOT NULL COMMENT '商品分类ID',
  `name` varchar(100) NOT NULL COMMENT '商品名称',
  `description` varchar(255) NOT NULL COMMENT '商品描述',
  `quantity` int(255) NOT NULL DEFAULT '0' COMMENT '商品数量',
  `image` varchar(255) DEFAULT NULL COMMENT '商品缩略图',
  `price` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT '商品价格',
  `sort` tinyint(4) DEFAULT '0' COMMENT '商品排序',
  `status` tinyint(4) DEFAULT '0',
  `viewed` int(11) NOT NULL DEFAULT '0' COMMENT '商品被浏览次数',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ss_product
-- ----------------------------

-- ----------------------------
-- Table structure for ss_product_comment
-- ----------------------------
DROP TABLE IF EXISTS `ss_product_comment`;
CREATE TABLE `ss_product_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL DEFAULT '0' COMMENT '评论商品ID',
  `member_id` int(11) NOT NULL DEFAULT '0' COMMENT '评价人id',
  `content` text COMMENT '评价内容',
  `genral_feel` tinyint(4) DEFAULT NULL COMMENT '总体感受（1：好评  2：中评  3：差评）',
  `desc_score` smallint(5) DEFAULT '0' COMMENT '商品描述评分',
  `speed_score` smallint(5) DEFAULT '0' COMMENT '发货速度评分',
  `quality_score` smallint(5) DEFAULT '0' COMMENT '产品质量评分',
  `pictures` varchar(255) DEFAULT NULL COMMENT '评价图片',
  `created_at` int(255) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ss_product_comment
-- ----------------------------

-- ----------------------------
-- Table structure for ss_tryout_product
-- ----------------------------
DROP TABLE IF EXISTS `ss_tryout_product`;
CREATE TABLE `ss_tryout_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '商品id',
  `quantity` smallint(5) NOT NULL DEFAULT '0' COMMENT '试用商品数量',
  `signup_num` smallint(5) DEFAULT NULL COMMENT '报名人数',
  `begin_date` int(11) NOT NULL DEFAULT '0' COMMENT '免费试用报名开始时间',
  `end_date` int(11) NOT NULL DEFAULT '0' COMMENT '免费试用报名结束时间',
  `vote_end_date` int(11) NOT NULL DEFAULT '0' COMMENT '试用投票结束时间',
  `status` tinyint(4) DEFAULT '1' COMMENT '试用产品状态',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ss_tryout_product
-- ----------------------------

-- ----------------------------
-- Table structure for ss_vote_log
-- ----------------------------
DROP TABLE IF EXISTS `ss_vote_log`;
CREATE TABLE `ss_vote_log` (
  `id` int(11) NOT NULL,
  `enlt_id` int(11) NOT NULL DEFAULT '0' COMMENT '报名id',
  `nickname` varchar(20) DEFAULT NULL COMMENT '投票人昵称',
  `headimgurl` varchar(255) DEFAULT NULL COMMENT '投票人头像',
  `created_at` int(255) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ss_vote_log
-- ----------------------------
