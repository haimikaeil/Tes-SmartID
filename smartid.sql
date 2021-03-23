/*
 Navicat Premium Data Transfer

 Source Server         : LOKAL
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : smartid

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 24/03/2021 03:02:48
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id_kategori` int NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kategori`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (4, 'Kedisiplinan');
INSERT INTO `kategori` VALUES (5, 'Realisasi Target');
INSERT INTO `kategori` VALUES (6, 'Skill Improvement');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `parent` int NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tipe` int NULL DEFAULT NULL COMMENT '1 = dashboard || 2 = general || 3 = setting || 4 = SKP',
  `status` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_menu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (30, 'Dashboard', 'dashboard', 0, 'icon-home', 1, 'Y');
INSERT INTO `menu` VALUES (31, 'User', 'user', 0, 'icon-users', 2, 'Y');
INSERT INTO `menu` VALUES (32, 'Pegawai', 'pegawai', 0, 'icon-users', 2, 'Y');
INSERT INTO `menu` VALUES (33, 'Kategori Penilaian', 'kategori', 0, 'icon-star', 2, 'Y');
INSERT INTO `menu` VALUES (34, 'Sub Kategori Penilaian', 'sub_kategori', 0, 'icon-badge', 2, 'Y');
INSERT INTO `menu` VALUES (35, 'Penilaian', 'penilaian', 0, 'icon-note', 3, 'Y');

-- ----------------------------
-- Table structure for pegawai
-- ----------------------------
DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai`  (
  `id_pegawai` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pegawai
-- ----------------------------
INSERT INTO `pegawai` VALUES (4, 'Jhon Doe', 'jalan jalan sore', '0811231313', 'team-3.jpg');
INSERT INTO `pegawai` VALUES (5, 'anastasya doe', 'malang', '1231313', 'team-2.jpg');
INSERT INTO `pegawai` VALUES (6, 'park jun doe', 'jalan jalan', '131', 'team_1.jpg');
INSERT INTO `pegawai` VALUES (8, 'doe doe', 'malang', '1231313', 'author-4.jpg');

-- ----------------------------
-- Table structure for penilaian
-- ----------------------------
DROP TABLE IF EXISTS `penilaian`;
CREATE TABLE `penilaian`  (
  `id_penilaian` int NOT NULL AUTO_INCREMENT,
  `id_pegawai` int NULL DEFAULT NULL,
  `id_sub_kategori` int NULL DEFAULT NULL,
  `nilai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_penilaian`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penilaian
-- ----------------------------
INSERT INTO `penilaian` VALUES (10, 4, 5, '60');
INSERT INTO `penilaian` VALUES (11, 4, 6, '30');
INSERT INTO `penilaian` VALUES (12, 4, 7, '40');
INSERT INTO `penilaian` VALUES (13, 4, 8, '60');
INSERT INTO `penilaian` VALUES (14, 4, 9, '80');
INSERT INTO `penilaian` VALUES (15, 5, 5, '60');
INSERT INTO `penilaian` VALUES (16, 5, 6, '80');
INSERT INTO `penilaian` VALUES (17, 5, 7, '70');
INSERT INTO `penilaian` VALUES (18, 5, 8, '80');
INSERT INTO `penilaian` VALUES (19, 5, 9, '90');
INSERT INTO `penilaian` VALUES (20, 6, 5, '20');
INSERT INTO `penilaian` VALUES (21, 6, 6, '30');
INSERT INTO `penilaian` VALUES (22, 6, 7, '50');
INSERT INTO `penilaian` VALUES (23, 6, 8, '70');
INSERT INTO `penilaian` VALUES (24, 6, 9, '70');
INSERT INTO `penilaian` VALUES (26, 8, 6, '20');
INSERT INTO `penilaian` VALUES (27, 8, 7, '30');
INSERT INTO `penilaian` VALUES (28, 8, 8, '10');
INSERT INTO `penilaian` VALUES (29, 8, 9, '20');

-- ----------------------------
-- Table structure for sub_kategori
-- ----------------------------
DROP TABLE IF EXISTS `sub_kategori`;
CREATE TABLE `sub_kategori`  (
  `id_sub_kategori` int NOT NULL AUTO_INCREMENT,
  `sub_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_kategori` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_sub_kategori`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sub_kategori
-- ----------------------------
INSERT INTO `sub_kategori` VALUES (5, 'Komunikasi', 4);
INSERT INTO `sub_kategori` VALUES (6, 'Manajemen', 4);
INSERT INTO `sub_kategori` VALUES (7, 'Kerja Sama', 4);
INSERT INTO `sub_kategori` VALUES (8, 'Improvisasi', 6);
INSERT INTO `sub_kategori` VALUES (9, 'Produktifitas', 5);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', 'administrator', '21232f297a57a5a743894a0e4a801fc3');

SET FOREIGN_KEY_CHECKS = 1;
