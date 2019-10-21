/*
 Navicat Premium Data Transfer

 Source Server         : php_root
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : exam1

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 21/10/2019 17:05:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for em_admin
-- ----------------------------
DROP TABLE IF EXISTS `em_admin`;
CREATE TABLE `em_admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '密码',
  `tel` int(20) NOT NULL COMMENT '手机号',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '状态:1是,0否',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of em_admin
-- ----------------------------
INSERT INTO `em_admin` VALUES (4, 'admin', '123456', 2147483647, 1, '2019-10-08 21:21:11');
INSERT INTO `em_admin` VALUES (5, 'tom', '123456', 2147483647, 1, '2019-10-09 08:39:47');
INSERT INTO `em_admin` VALUES (20, 'user', '123456', 153456454, 1, '2019-10-09 10:00:29');
INSERT INTO `em_admin` VALUES (30, 'li', '123456', 1234564, 1, '2019-10-09 10:10:29');
INSERT INTO `em_admin` VALUES (32, 'check', '123456', 123123, 1, '2019-10-09 10:24:57');
INSERT INTO `em_admin` VALUES (35, 'peter', '123456', 111, 1, '2019-10-10 08:42:30');
INSERT INTO `em_admin` VALUES (36, 'tomk', '123456', 456151, 1, '2019-10-18 08:47:37');

-- ----------------------------
-- Table structure for em_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `em_admin_role`;
CREATE TABLE `em_admin_role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL DEFAULT 0 COMMENT '用户ID',
  `role_id` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '角色ID',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of em_admin_role
-- ----------------------------
INSERT INTO `em_admin_role` VALUES (6, 20, '4,5');
INSERT INTO `em_admin_role` VALUES (11, 30, '4,5');
INSERT INTO `em_admin_role` VALUES (13, 32, '4,5');
INSERT INTO `em_admin_role` VALUES (16, 4, '1');
INSERT INTO `em_admin_role` VALUES (17, 5, '5');
INSERT INTO `em_admin_role` VALUES (18, 35, '4,5');
INSERT INTO `em_admin_role` VALUES (19, 36, '1,4,7');

-- ----------------------------
-- Table structure for em_judge
-- ----------------------------
DROP TABLE IF EXISTS `em_judge`;
CREATE TABLE `em_judge`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id编号',
  `judge_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '题目',
  `right_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '正确答案',
  `status` smallint(4) NOT NULL DEFAULT 1 COMMENT '状态:1是,0否',
  `major_id` int(10) NOT NULL COMMENT '对应专业表的id',
  `subject_id` int(10) NOT NULL COMMENT '对应科目表的id',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '判断题' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of em_judge
-- ----------------------------
INSERT INTO `em_judge` VALUES (1, 'php中,双引号字符串支持变量解析以及转义字符.', '1', 1, 4, 1, '2019-09-29 17:31:16');
INSERT INTO `em_judge` VALUES (2, '在返回数组中的所有值，可以使用array_value( )函数', '1', 1, 1, 2, '2019-09-29 17:31:57');
INSERT INTO `em_judge` VALUES (3, 'php语言中的数值型字符串可以和数字变量进行混合运算. ', '1', 1, 3, 1, '2019-09-29 17:32:04');
INSERT INTO `em_judge` VALUES (4, '这是题目', '1', 0, 1, 1, '2019-09-29 17:32:23');
INSERT INTO `em_judge` VALUES (5, '运算符“++”可以对常量和变量进行累加1 ', '0', 1, 1, 1, '2019-09-29 17:39:03');

-- ----------------------------
-- Table structure for em_major
-- ----------------------------
DROP TABLE IF EXISTS `em_major`;
CREATE TABLE `em_major`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id编号',
  `major_name` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '专业名称',
  `status` smallint(4) NOT NULL DEFAULT 1 COMMENT '状态:1是,0否',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '专业表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of em_major
-- ----------------------------
INSERT INTO `em_major` VALUES (1, '软件开发', 1, '2019-09-28 16:41:52');
INSERT INTO `em_major` VALUES (2, 'ui设计', 1, '2019-09-28 20:44:41');
INSERT INTO `em_major` VALUES (3, '平面设计', 1, '2019-09-29 08:45:59');
INSERT INTO `em_major` VALUES (4, '电子商务', 1, '2019-09-29 08:46:00');

-- ----------------------------
-- Table structure for em_operation
-- ----------------------------
DROP TABLE IF EXISTS `em_operation`;
CREATE TABLE `em_operation`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id编号',
  `operation_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '题目',
  `status` smallint(4) NOT NULL DEFAULT 1 COMMENT '状态:1是,0否',
  `major_id` int(10) NOT NULL COMMENT '对应专业表的id',
  `subject_id` int(10) NOT NULL COMMENT '对应科目表的id',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '操作题' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of em_operation
-- ----------------------------
INSERT INTO `em_operation` VALUES (1, '操作题', 0, 1, 1, '2019-09-29 17:53:29');
INSERT INTO `em_operation` VALUES (2, '请简述一下htmlspecialchars和htmlentities的区别？', 1, 1, 1, '2019-09-29 17:53:39');
INSERT INTO `em_operation` VALUES (3, '请简述func_get_args和func_num_args的功能。\n', 1, 2, 2, '2019-09-29 17:53:43');
INSERT INTO `em_operation` VALUES (4, '请简述echo、print和print_r的区别？\n', 1, 2, 2, '2019-09-29 17:53:49');

-- ----------------------------
-- Table structure for em_role
-- ----------------------------
DROP TABLE IF EXISTS `em_role`;
CREATE TABLE `em_role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `role_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '角色名称',
  `content` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '描述',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '状态:1是,0否',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of em_role
-- ----------------------------
INSERT INTO `em_role` VALUES (1, '超级管理员', '最高权限', 1, '2019-10-15 09:35:44');
INSERT INTO `em_role` VALUES (4, '学生管理员', '描述', 1, '2019-10-10 21:46:08');
INSERT INTO `em_role` VALUES (5, '分类管理员', '描述', 1, '2019-10-10 21:46:11');
INSERT INTO `em_role` VALUES (6, '专业管理员', '描述', 1, '2019-10-11 21:59:05');
INSERT INTO `em_role` VALUES (7, '商品管理员', '描述、。', 1, '2019-10-11 22:14:33');
INSERT INTO `em_role` VALUES (8, 'qq管理员', '啊', 1, '2019-10-17 12:08:30');

-- ----------------------------
-- Table structure for em_role_rule
-- ----------------------------
DROP TABLE IF EXISTS `em_role_rule`;
CREATE TABLE `em_role_rule`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT 0 COMMENT '角色ID',
  `rule_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '权限ID',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of em_role_rule
-- ----------------------------
INSERT INTO `em_role_rule` VALUES (1, 6, '2,3,5,45');
INSERT INTO `em_role_rule` VALUES (2, 7, '10,4,24,28');
INSERT INTO `em_role_rule` VALUES (3, 5, '1,2,36,41');
INSERT INTO `em_role_rule` VALUES (4, 4, '9,10,4,24,28,45');
INSERT INTO `em_role_rule` VALUES (5, 8, '5,6,8,9,31');

-- ----------------------------
-- Table structure for em_rule
-- ----------------------------
DROP TABLE IF EXISTS `em_rule`;
CREATE TABLE `em_rule`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '权限名称',
  `module_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '模型名称',
  `controller_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '控制器名称',
  `action_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '方法名称',
  `parent_id` int(11) NOT NULL DEFAULT 0 COMMENT '上级权限ID 0表示顶级权限',
  `is_show` tinyint(1) NOT NULL DEFAULT 1 COMMENT '是否导航菜单显示1  显示 0 不显示',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 60 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of em_rule
-- ----------------------------
INSERT INTO `em_rule` VALUES (1, '学生管理', 'admin', '#', '#', 0, 1, '2019-10-17 10:58:59');
INSERT INTO `em_rule` VALUES (2, '学生列表', 'admin', 'students', 'index', 1, 1, '2019-10-17 11:02:28');
INSERT INTO `em_rule` VALUES (3, '学生添加', 'admin', 'students', 'add', 1, 0, '2019-10-17 11:02:48');
INSERT INTO `em_rule` VALUES (4, '学生编辑', 'admin', 'students', 'edit', 1, 0, '2019-10-17 11:03:09');
INSERT INTO `em_rule` VALUES (5, '学生删除', 'admin', 'students', 'del', 1, 0, '2019-10-17 11:03:18');
INSERT INTO `em_rule` VALUES (6, '学生列表回收站', 'admin', 'students', 'trash', 2, 1, '2019-10-17 16:12:29');
INSERT INTO `em_rule` VALUES (7, '学生列表回收站恢复', 'admin', 'students', 'recover', 2, 0, '2019-10-17 16:13:06');
INSERT INTO `em_rule` VALUES (8, '学生列表回收站删除', 'admin', 'students', 'remove', 2, 0, '2019-10-17 16:13:31');
INSERT INTO `em_rule` VALUES (9, '题库管理', 'admin', '#', '#', 0, 1, '2019-10-17 10:34:23');
INSERT INTO `em_rule` VALUES (10, '单选题列表', 'admin', 'single', 'index', 9, 1, '2019-10-17 10:42:56');
INSERT INTO `em_rule` VALUES (11, '单选题添加', 'admin', 'single', 'add', 9, 0, '2019-10-17 10:43:37');
INSERT INTO `em_rule` VALUES (12, '单选题编辑', 'admin', 'single', 'edit', 9, 0, '2019-10-17 10:44:20');
INSERT INTO `em_rule` VALUES (13, '单选题删除', 'admin', 'single', 'del', 9, 0, '2019-10-17 10:44:40');
INSERT INTO `em_rule` VALUES (14, '单选题回收站', 'admin', 'single', 'trash', 10, 1, '2019-10-17 11:16:54');
INSERT INTO `em_rule` VALUES (15, '单选题回收站恢复', 'admin', 'single', 'recover', 10, 0, '2019-10-17 15:10:21');
INSERT INTO `em_rule` VALUES (16, '单选题回收站删除', 'admin', 'single', 'remove', 10, 0, '2019-10-17 15:11:08');
INSERT INTO `em_rule` VALUES (17, '多选题列表', 'admin', 'selection', 'index', 9, 1, '2019-10-17 10:45:49');
INSERT INTO `em_rule` VALUES (18, '多选题添加', 'admin', 'selection', 'add', 9, 0, '2019-10-17 10:46:44');
INSERT INTO `em_rule` VALUES (19, '多选题编辑', 'admin', 'selection', 'edit', 9, 0, '2019-10-17 10:47:16');
INSERT INTO `em_rule` VALUES (20, '多选题删除', 'admin', 'selection', 'del', 9, 0, '2019-10-17 10:47:33');
INSERT INTO `em_rule` VALUES (21, '多选题题回收站', 'admin', 'selection', 'trash', 17, 1, '2019-10-17 11:16:54');
INSERT INTO `em_rule` VALUES (22, '多选题回收站恢复', 'admin', 'selection', 'recover', 17, 0, '2019-10-17 15:10:21');
INSERT INTO `em_rule` VALUES (23, '多选题回收站删除', 'admin', 'selection', 'remove', 17, 0, '2019-10-17 15:11:08');
INSERT INTO `em_rule` VALUES (24, '判断题列表', 'admin', 'judge', 'index', 9, 1, '2019-10-17 10:50:33');
INSERT INTO `em_rule` VALUES (25, '判断题添加', 'admin', 'judge', 'add', 9, 0, '2019-10-17 10:52:52');
INSERT INTO `em_rule` VALUES (26, '判断题编辑', 'admin', 'judge', 'edit', 9, 0, '2019-10-17 10:53:09');
INSERT INTO `em_rule` VALUES (27, '判断题删除', 'admin', 'judge', 'del', 9, 0, '2019-10-17 10:53:24');
INSERT INTO `em_rule` VALUES (28, '判断题回收站', 'admin', 'judge', 'trash', 24, 1, '2019-10-17 11:16:54');
INSERT INTO `em_rule` VALUES (29, '判断题回收站恢复', 'admin', 'judge', 'recover', 24, 0, '2019-10-17 15:10:21');
INSERT INTO `em_rule` VALUES (30, '判断题回收站删除', 'admin', 'judge', 'remove', 24, 0, '2019-10-17 15:11:08');
INSERT INTO `em_rule` VALUES (31, '操作题列表', 'admin', 'operation', 'index', 9, 1, '2019-10-17 10:53:59');
INSERT INTO `em_rule` VALUES (32, '操作题添加', 'admin', 'operation', 'add', 9, 0, '2019-10-17 10:54:11');
INSERT INTO `em_rule` VALUES (33, '操作题编辑', 'admin', 'operation', 'edit', 9, 0, '2019-10-17 10:54:28');
INSERT INTO `em_rule` VALUES (34, '操作题删除', 'admin', 'operation', 'del', 9, 0, '2019-10-17 10:54:37');
INSERT INTO `em_rule` VALUES (35, '操作题题回收站', 'admin', 'operation', 'trash', 31, 1, '2019-10-17 09:45:28');
INSERT INTO `em_rule` VALUES (36, '操作题回收站恢复', 'admin', 'operation', 'recover', 31, 0, '2019-10-17 10:06:14');
INSERT INTO `em_rule` VALUES (37, '操作题回收站删除', 'admin', 'operation', 'remove', 31, 0, '2019-10-10 22:38:11');
INSERT INTO `em_rule` VALUES (38, '考试管理', 'admin', '#', '#', 0, 1, '2019-10-10 22:38:11');
INSERT INTO `em_rule` VALUES (39, '专业列表', 'admin', 'major', 'index', 38, 1, '2019-10-15 10:05:55');
INSERT INTO `em_rule` VALUES (40, '专业添加', 'admin', 'major', 'add', 38, 0, '2019-10-10 22:51:37');
INSERT INTO `em_rule` VALUES (41, '专业编辑', 'admin', 'major', 'edit', 38, 0, '2019-10-10 22:52:11');
INSERT INTO `em_rule` VALUES (42, '专业删除', 'admin', 'major', 'del', 38, 0, '2019-10-11 08:41:45');
INSERT INTO `em_rule` VALUES (43, '科目列表', 'admin', 'subject', 'index', 38, 1, '2019-10-17 09:21:46');
INSERT INTO `em_rule` VALUES (44, '科目添加', 'admin', 'subject', 'add', 38, 0, '2019-10-17 09:26:20');
INSERT INTO `em_rule` VALUES (45, '科目编辑', 'admin', 'subject', 'edit', 38, 0, '2019-10-17 09:26:59');
INSERT INTO `em_rule` VALUES (46, '科目删除', 'admin', 'subject', 'del', 38, 0, '2019-10-17 09:26:59');
INSERT INTO `em_rule` VALUES (47, '管理员管理', 'admin', '#', '#', 0, 1, '2019-10-17 09:42:42');
INSERT INTO `em_rule` VALUES (48, '管理员列表', 'admin', 'admin', 'index', 47, 1, '2019-10-17 09:45:28');
INSERT INTO `em_rule` VALUES (49, '管理员添加', 'admin', 'admin', 'add', 47, 0, '2019-10-17 09:46:28');
INSERT INTO `em_rule` VALUES (50, '管理员编辑', 'admin', 'admin', 'edit', 47, 0, '2019-10-17 09:50:52');
INSERT INTO `em_rule` VALUES (51, '管理员删除', 'admin', 'admin', 'del', 47, 0, '2019-10-17 09:52:07');
INSERT INTO `em_rule` VALUES (52, '角色列表', 'admin', 'role', 'index', 47, 1, '2019-10-17 09:55:04');
INSERT INTO `em_rule` VALUES (53, '角色添加', 'admin', 'role', 'add', 47, 0, '2019-10-17 10:01:22');
INSERT INTO `em_rule` VALUES (54, '角色编辑', 'admin', 'role', 'edit', 47, 0, '2019-10-17 10:04:43');
INSERT INTO `em_rule` VALUES (55, '角色删除', 'admin', 'role', 'del', 47, 0, '2019-10-17 10:04:57');
INSERT INTO `em_rule` VALUES (56, '权限列表', 'admin', 'rule', 'index', 47, 1, '2019-10-17 10:06:14');
INSERT INTO `em_rule` VALUES (57, '权限添加', 'admin', 'rule', 'add', 47, 0, '2019-10-17 10:06:33');
INSERT INTO `em_rule` VALUES (58, '权限编辑', 'admin', 'rule', 'edit', 47, 0, '2019-10-17 10:06:47');
INSERT INTO `em_rule` VALUES (59, '权限删除', 'admin', 'rule', 'del', 47, 0, '2019-10-17 10:07:14');

-- ----------------------------
-- Table structure for em_selection
-- ----------------------------
DROP TABLE IF EXISTS `em_selection`;
CREATE TABLE `em_selection`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id编号',
  `selection_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '题目',
  `A` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'A选项',
  `B` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'B选项',
  `C` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'C选项',
  `D` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'D选项',
  `right_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '正确答案',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '状态:1是,0否',
  `major_id` int(10) NOT NULL COMMENT '专业id',
  `subject_id` int(10) NOT NULL COMMENT '科目id',
  `add_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '多选题' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of em_selection
-- ----------------------------
INSERT INTO `em_selection` VALUES (1, '使用CSS对文本进行修饰，若使文本闪烁，text-decoration的取值为 ', 'none', 'underline', 'overline', 'blink', 'B,C', 1, 1, 1, '2019-09-28 11:33:55');
INSERT INTO `em_selection` VALUES (2, 'JavaScript脚本语言的前身是', 'Basic', 'Live Script', 'VBScript', 'Oak', 'A,B', 1, 1, 1, '2019-09-28 15:28:35');
INSERT INTO `em_selection` VALUES (3, '阿萨德 ', '阿萨德', '阿萨德阿萨德阿三', '掉分速度', '斯蒂芬', '斯蒂芬', 0, 1, 2, '2019-09-28 16:04:46');
INSERT INTO `em_selection` VALUES (4, 'XML基于的标准是', 'HTML   ', 'MIME ', 'SGML', 'CGI', 'B,C,D', 1, 2, 3, '2019-09-29 15:27:47');

-- ----------------------------
-- Table structure for em_single
-- ----------------------------
DROP TABLE IF EXISTS `em_single`;
CREATE TABLE `em_single`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id编号',
  `single_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '题目',
  `A` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'A选项',
  `B` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'B选项',
  `C` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'C选项',
  `D` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'D选项',
  `right_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '正确答案',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '状态:1是,0否',
  `major_id` int(10) NOT NULL COMMENT '专业id',
  `subject_id` int(10) NOT NULL COMMENT '科目id',
  `add_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '单选题' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of em_single
-- ----------------------------
INSERT INTO `em_single` VALUES (1, '这是题目    ', '选项', '选项', '选项', '选项', '答案', 0, 2, 1, '2019-09-28 11:33:55');
INSERT INTO `em_single` VALUES (2, '的 ', '的', '的', '的', '的', '的', 0, 1, 2, '2019-09-28 15:28:35');
INSERT INTO `em_single` VALUES (3, '单选题', '单选题', '单选题', '单选题', '单选题', '单选题', 0, 2, 3, '2019-09-29 15:31:26');
INSERT INTO `em_single` VALUES (4, 'PHP考试题---单选题', '', '', '', '', '', 0, 2, 6, '2019-10-09 18:03:22');
INSERT INTO `em_single` VALUES (5, ' JavaScript脚本语言的前身是', 'Basic', 'Live Script', 'Oak', 'VBScript', 'B', 1, 2, 6, '2019-10-09 18:03:22');
INSERT INTO `em_single` VALUES (6, '使用CSS对文本进行修饰，若使文本闪烁，text-decoration的取值为', 'none', 'underline', 'overline', 'blink', 'D', 1, 2, 6, '2019-10-09 18:03:22');
INSERT INTO `em_single` VALUES (7, 'XML基于的标准是', 'HTML   ', 'MIME ', 'SGML', 'CGI', 'C', 1, 2, 6, '2019-10-09 18:03:22');
INSERT INTO `em_single` VALUES (8, '标记符title是放在标记符什么之间的', 'html与html ', 'head与head  ', 'body与body  ', 'head与body', 'B', 1, 2, 6, '2019-10-09 18:03:22');
INSERT INTO `em_single` VALUES (9, '＜img＞标记符中连接图片的参数是：', 'href  ', 'src', 'type', 'align', 'B', 1, 2, 6, '2019-10-09 18:03:22');
INSERT INTO `em_single` VALUES (10, ' JavaScript脚本语言的前身是', 'Basic', 'Live Script', 'Oak', 'VBScript', 'B', 1, 1, 1, '2019-10-10 14:37:16');
INSERT INTO `em_single` VALUES (11, '使用CSS对文本进行修饰，若使文本闪烁，text-decoration的取值为', 'none', 'underline', 'overline', 'blink', 'D', 1, 1, 1, '2019-10-10 14:37:16');
INSERT INTO `em_single` VALUES (12, 'XML基于的标准是', 'HTML   ', 'MIME ', 'SGML', 'CGI', 'C', 1, 1, 1, '2019-10-10 14:37:16');
INSERT INTO `em_single` VALUES (13, '标记符title是放在标记符什么之间的', 'html与html ', 'head与head  ', 'body与body  ', 'head与body', 'B', 1, 1, 1, '2019-10-10 14:37:16');
INSERT INTO `em_single` VALUES (14, '＜img＞标记符中连接图片的参数是：', 'href  ', 'src', 'type', 'align', 'B', 1, 1, 1, '2019-10-10 14:37:16');

-- ----------------------------
-- Table structure for em_students
-- ----------------------------
DROP TABLE IF EXISTS `em_students`;
CREATE TABLE `em_students`  (
  `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id编号',
  `id_card` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '学生身份证',
  `username` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '姓名',
  `sex` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '性别',
  `password` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码',
  `tel` int(20) NOT NULL COMMENT '电话号码',
  `class_name` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '班级',
  `major_id` int(10) NOT NULL COMMENT '专业id',
  `class_teacher` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '班主任',
  `status` smallint(4) NOT NULL DEFAULT 1 COMMENT '状态:1是,0否',
  `add_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '学生表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of em_students
-- ----------------------------
INSERT INTO `em_students` VALUES (1, '123', '老李', '男', '123', 1000, '17软件3', 1, '校长', 1, '2019-09-27 23:50:53');
INSERT INTO `em_students` VALUES (2, '1515121231151', '老狗', '女', '123456', 1000, '17软件3', 4, '校长', 1, '2019-09-27 23:44:57');
INSERT INTO `em_students` VALUES (3, '5165564564', '老金', '男', '123456', 1000, '17软件3', 3, '校长', 1, '2019-09-27 23:44:52');
INSERT INTO `em_students` VALUES (4, '132353453453', '阿三', '女', '123456', 1000, '17软件3', 4, '校长', 1, '2019-09-28 00:16:24');
INSERT INTO `em_students` VALUES (5, '1561512315654', '阿长', '男', '123456', 1000, '17软件3', 1, '校长', 1, '2019-09-28 00:15:42');
INSERT INTO `em_students` VALUES (6, '5103120123123', '老李', '男', '123456', 1000, '17软件3', 2, '校长', 1, '2019-09-28 00:46:30');
INSERT INTO `em_students` VALUES (7, '1515121231151', '老狗', '男', '123456', 1000, '17软件3', 1, '校长', 1, '2019-09-28 00:46:36');
INSERT INTO `em_students` VALUES (8, '12312425235', '玩儿是', '男', '123456', 1000, '17软件3', 2, '校长', 1, '2019-09-28 00:53:33');
INSERT INTO `em_students` VALUES (9, '51013212312', '阿萨德', '男', '123456', 1000, '17软件3', 1, '校长', 1, '2019-09-28 09:21:40');

-- ----------------------------
-- Table structure for em_subject
-- ----------------------------
DROP TABLE IF EXISTS `em_subject`;
CREATE TABLE `em_subject`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id编号',
  `subject_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '科目名称',
  `status` smallint(4) NOT NULL DEFAULT 1 COMMENT '状态:1是,0否',
  `major_id` int(10) NOT NULL COMMENT '关联专业表id',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '科目表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of em_subject
-- ----------------------------
INSERT INTO `em_subject` VALUES (1, '数学', 1, 1, '2019-09-29 08:55:16');
INSERT INTO `em_subject` VALUES (2, '英语', 1, 3, '2019-09-29 09:49:59');
INSERT INTO `em_subject` VALUES (3, '物理', 1, 2, '2019-09-29 09:54:46');
INSERT INTO `em_subject` VALUES (4, '化学', 1, 1, '2019-10-09 15:06:39');
INSERT INTO `em_subject` VALUES (5, '地理', 1, 4, '2019-10-09 15:59:11');
INSERT INTO `em_subject` VALUES (6, '数学', 1, 2, '2019-10-09 16:04:21');

-- ----------------------------
-- Table structure for em_topic
-- ----------------------------
DROP TABLE IF EXISTS `em_topic`;
CREATE TABLE `em_topic`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `single` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '单选题',
  `selection` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '多选题',
  `judge` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '判断题',
  `operation` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '操作题',
  `username` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '学生名字',
  `class_name` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '班级',
  `major_id` int(10) NOT NULL COMMENT '专业id',
  `subject_id` int(10) NOT NULL COMMENT '科目id',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  `scroe` int(10) NOT NULL COMMENT '总分数',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '提交试卷' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of em_topic
-- ----------------------------
INSERT INTO `em_topic` VALUES (1, 'single13-C,single10-B,single14-B,single12-B,single11-C', 'single13-C,single10-B,single14-B,single12-B,single11-C,selection2-BC,selection1-AB', 'judge5-1', 'operation2-阿萨德', '老李', '17软件3', 1, 1, '2019-10-21 16:15:24', 6);
INSERT INTO `em_topic` VALUES (2, 'single13-B,single12-B,single10-C,single11-B,single14-A', 'single13-B,single12-B,single10-C,single11-B,single14-A,selection2-BC,selection1-AB', 'judge5-1', 'operation2-打完去', '老李', '17软件3', 1, 1, '2019-10-21 16:38:07', 3);
INSERT INTO `em_topic` VALUES (3, 'single11-B,single14-C,single12-B,single10-B,single13-B', 'single11-B,single14-C,single12-B,single10-B,single13-B,selection2-BC,selection1-BC', 'judge5-1', 'operation2-dasdas', '老李', '17软件3', 1, 1, '2019-10-21 16:39:17', 9);
INSERT INTO `em_topic` VALUES (4, 'single11-B,single10-C,single12-D,single14-C,single13-B', 'single11-B,single10-C,single12-D,single14-C,single13-B,selection2-BC,selection1-BC', 'judge5-1', 'operation2-dasdasd', '老李', '17软件3', 1, 1, '2019-10-21 16:43:37', 6);
INSERT INTO `em_topic` VALUES (5, 'single11-B,single10-C,single12-D,single14-C,single13-B', 'single11-B,single10-C,single12-D,single14-C,single13-B,selection2-BC,selection1-BC', 'judge5-1', 'operation2-dasdasd', '老李', '17软件3', 1, 1, '2019-10-21 16:43:47', 6);
INSERT INTO `em_topic` VALUES (6, 'single13-C,single14-D,single10-C,single11-C,single12-D', 'single13-C,single14-D,single10-C,single11-C,single12-D,selection2-BC,selection1-BC', 'judge5-1', 'operation2-das', '老李', '17软件3', 1, 1, '2019-10-21 16:44:26', 3);

SET FOREIGN_KEY_CHECKS = 1;
