/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : lvyou

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 05/07/2018 16:26:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '名称',
  `password` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (4, 'admin', 'f9e2679ac9189b0018fb73eb4d1e52ed', 1522118427, 1523772079);

-- ----------------------------
-- Table structure for banner
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `banner_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '缩略图',
  `is_active` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否第一个',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO `banner` VALUES (4, '/uploads/20180703\\2d3bd19b2d3730f23ea22b1d9efbd7fd.jpg', 1, 1530615099, 1530672922);
INSERT INTO `banner` VALUES (5, '/uploads/20180704\\12ba4fc07a3fec3070638703a90e8a31.jpg', 0, 1530670355, 1530672268);
INSERT INTO `banner` VALUES (6, '/uploads/20180704\\86e3ad90ab9dd14455778870e473a558.jpg', 0, 1530670373, 1530670373);
INSERT INTO `banner` VALUES (8, '/uploads/20180704\\0654d36657c227b40855b5afef9748e0.jpg', 0, 1530670446, 1530670446);
INSERT INTO `banner` VALUES (10, '/uploads/20180704\\ad1462c0bf99f8fd1be6cbce5cbc8089.jpg', 0, 1530671988, 1530671988);

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '分类名称',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (1, '环球创新 ', 1530615768, 1530615768);
INSERT INTO `category` VALUES (2, '亲子教育', 1530673026, 1530673026);
INSERT INTO `category` VALUES (3, '人文体验', 1530673039, 1530673039);
INSERT INTO `category` VALUES (4, '学术探访', 1530673052, 1530673052);

-- ----------------------------
-- Table structure for detail
-- ----------------------------
DROP TABLE IF EXISTS `detail`;
CREATE TABLE `detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '标题',
  `scenic` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '多个景点',
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '描述',
  `money` double NOT NULL COMMENT '旅游金额',
  `content` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '内容',
  `detail_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '图片',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL COMMENT '更新时间',
  `start_time` date NOT NULL DEFAULT '0000-00-00',
  `end_time` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail
-- ----------------------------
INSERT INTO `detail` VALUES (11, 1, '哈哈哈哈哈哈哈', '阿尔巴尼亚|金字塔| 历史博物馆| 清真寺', '哈哈哈哈哈哈哈', 1000, '<p>哈哈哈哈哈哈哈对的<img src=\"/public/Ueditor/php/upload/image/20180704/1530676310.jpg\" title=\"1530676310.jpg\" alt=\"u=1977804817,1381775671&amp;fm=200&amp;gp=0.jpg\"/></p>', '/uploads/20180703\\71632f86234a03c72b6eafb2f799f3f2.jpg', 1530618453, 1530676529, '2018-07-04', '2018-07-26');
INSERT INTO `detail` VALUES (12, 2, '测试111111', '', '测试111111', 0, '<p>测试111111</p>', '/uploads/20180704\\654e7b6ae9673092b3ae16608ee67f2b.jpg', 1530667201, 1530667490, '2018-07-04', '2018-07-31');
INSERT INTO `detail` VALUES (13, 1, '哈哈哈哈', '', '哈哈哈哈', 0, '<p>哈哈哈哈</p>', '/uploads/20180704\\e9910aa399397b55ebea528af8abea69.jpg', 1530673765, 1530673876, '2018-07-04', '2018-07-18');

-- ----------------------------
-- Table structure for join
-- ----------------------------
DROP TABLE IF EXISTS `join`;
CREATE TABLE `join`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `card` varchar(11) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `pass_num` int(255) NULL DEFAULT NULL,
  `pass_last` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `pass_term` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `pass_first` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `create_time` int(11) UNSIGNED NULL DEFAULT NULL,
  `outfit` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `job` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `z_username` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `z_number` char(11) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `z_card` varchar(11) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `tel` char(11) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for send
-- ----------------------------
DROP TABLE IF EXISTS `send`;
CREATE TABLE `send`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tel` char(11) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `create_time` int(10) UNSIGNED NOT NULL,
  `update_time` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of send
-- ----------------------------
INSERT INTO `send` VALUES (1, '13573172302', 1530753713, 1530753713);

SET FOREIGN_KEY_CHECKS = 1;
