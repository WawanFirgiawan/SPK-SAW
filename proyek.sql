/*
 Navicat Premium Data Transfer

 Source Server         : data
 Source Server Type    : MySQL
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : proyek

 Target Server Type    : MySQL
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 05/08/2019 17:27:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa`  (
  `id_mahasiswa` int(3) NOT NULL AUTO_INCREMENT,
  `nama_mahasiswa` varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_pendaftaran` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat_mahasiswa` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `hp_mahasiswa` char(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `penghasilan_ot` int(7) NOT NULL,
  `status_rumah` int(2) NOT NULL,
  `keadaan_ot` int(2) NOT NULL,
  `jumlah_tanggungan` int(2) NOT NULL,
  `pemakaian_listrik` int(2) NOT NULL,
  `sumber_air` int(2) NOT NULL,
  `preferensi` int(3) NOT NULL,
  PRIMARY KEY (`id_mahasiswa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mahasiswa
-- ----------------------------
INSERT INTO `mahasiswa` VALUES (1, 'wawan', 'd0215614', 'asdasd', '08343', 10, 10, 25, 10, 5, 8, 68);

SET FOREIGN_KEY_CHECKS = 1;
