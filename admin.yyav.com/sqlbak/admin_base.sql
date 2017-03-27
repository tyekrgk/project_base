/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : admin_base

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-03-24 15:06:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sys_node
-- ----------------------------
DROP TABLE IF EXISTS `sys_node`;
CREATE TABLE `sys_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(81) NOT NULL COMMENT '结点名字',
  `title` varchar(81) NOT NULL COMMENT '中文标题',
  `status` tinyint(1) NOT NULL COMMENT '状态',
  `sort` smallint(6) NOT NULL COMMENT '排序号',
  `pid` int(11) NOT NULL COMMENT '所属上级',
  `level` tinyint(1) NOT NULL COMMENT '级别',
  `type` varchar(20) NOT NULL COMMENT '类型',
  `is_menu` tinyint(1) NOT NULL COMMENT '是否为菜单',
  `icon` varchar(100) DEFAULT NULL COMMENT '图标',
  `is_public` tinyint(1) NOT NULL COMMENT '是否是公共权限',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=482 DEFAULT CHARSET=utf8 COMMENT='权限结点';

-- ----------------------------
-- Records of sys_node
-- ----------------------------
INSERT INTO `sys_node` VALUES ('24', 'Main', '系统信息', '1', '0', '0', '1', 'controller', '1', 'icon-dashboard', '1');
INSERT INTO `sys_node` VALUES ('25', 'welcome', '欢迎信息', '1', '1', '24', '2', 'action', '1', 'icon-heart', '1');
INSERT INTO `sys_node` VALUES ('26', 'Admin', '系统权限', '1', '100', '0', '1', 'controller', '1', 'icon-cog', '0');
INSERT INTO `sys_node` VALUES ('27', 'user_group', '用户组', '1', '3', '26', '2', 'action', '1', 'icon-th-list', '0');
INSERT INTO `sys_node` VALUES ('28', 'node', '权限节点', '1', '1', '26', '2', 'action', '1', 'icon-flag', '0');
INSERT INTO `sys_node` VALUES ('29', 'mycount', '我的账户', '1', '2', '24', '2', 'action', '1', 'icon-book', '1');
INSERT INTO `sys_node` VALUES ('30', 'admin', '管理员', '1', '2', '26', '3', 'action', '1', 'icon-user', '0');
INSERT INTO `sys_node` VALUES ('31', 'index', '主面板主页', '1', '0', '24', '2', 'action', '0', '', '1');
INSERT INTO `sys_node` VALUES ('32', 'update_password', '登录用户修改自己的密码', '1', '0', '24', '2', 'action', '0', '', '1');
INSERT INTO `sys_node` VALUES ('33', 'do_update_password', '执行更改管理员密码', '1', '0', '24', '2', 'action', '0', '', '1');
INSERT INTO `sys_node` VALUES ('36', 'edit_node', '添加（编辑）权限节点', '1', '1', '26', '2', 'action', '0', '', '0');
INSERT INTO `sys_node` VALUES ('37', 'do_edit_node', '执行添加（编辑）节点', '1', '0', '26', '2', 'action', '0', '', '0');
INSERT INTO `sys_node` VALUES ('38', 'add_user_group', '添加用户组界面', '1', '0', '26', '2', 'action', '0', '', '0');
INSERT INTO `sys_node` VALUES ('39', 'update_group', '编辑用户组界面', '1', '0', '26', '2', 'action', '0', '', '0');
INSERT INTO `sys_node` VALUES ('40', 'do_update_group', '执行修改用户组', '1', '0', '26', '2', 'action', '0', '', '0');
INSERT INTO `sys_node` VALUES ('41', 'check_user_group_name ', '验证用户名称', '1', '0', '26', '2', 'action', '0', '', '0');
INSERT INTO `sys_node` VALUES ('42', 'do_add_user_group', '执行添加用户组', '1', '0', '26', '2', 'action', '0', '', '0');
INSERT INTO `sys_node` VALUES ('43', 'delete_group', '执行删除用户组', '1', '0', '26', '2', 'action', '0', '', '0');
INSERT INTO `sys_node` VALUES ('44', 'role_node', '用户组角色权限编辑', '1', '0', '26', '2', 'action', '0', '', '0');
INSERT INTO `sys_node` VALUES ('48', 'do_role_node', '执行添加角色权限', '1', '0', '26', '2', 'action', '0', '', '0');
INSERT INTO `sys_node` VALUES ('49', 'update_admin', '更新管理界面', '1', '0', '26', '2', 'action', '0', '', '0');
INSERT INTO `sys_node` VALUES ('50', 'delete_node', '执行删除节点', '1', '0', '26', '2', 'action', '0', '', '0');
INSERT INTO `sys_node` VALUES ('51', 'user_role', '管理员-角色-角色管理界面', '1', '0', '26', '2', 'action', '0', '', '0');
INSERT INTO `sys_node` VALUES ('53', 'add_admin', '管理员-新增管理员界面', '1', '0', '26', '2', 'action', '0', '', '0');
INSERT INTO `sys_node` VALUES ('54', 'do_add_admin', '管理员-执行添加管理员', '1', '0', '26', '2', 'action', '0', '', '0');
INSERT INTO `sys_node` VALUES ('55', 'check_user_email', '验证用户邮箱', '1', '0', '26', '2', 'action', '0', '', '0');
INSERT INTO `sys_node` VALUES ('56', 'do_delete_admin', '执行删除管理员', '1', '0', '26', '2', 'action', '0', '', '0');
INSERT INTO `sys_node` VALUES ('58', 'do_user_role', '执行保存用户对应角色', '1', '0', '26', '2', 'action', '0', '', '0');
INSERT INTO `sys_node` VALUES ('69', 'Upload', '上传类', '1', '99', '0', '1', 'controller', '0', '', '0');
INSERT INTO `sys_node` VALUES ('70', 'upload_pic', '上传图片', '1', '0', '69', '2', 'action', '0', '', '0');
INSERT INTO `sys_node` VALUES ('71', 'upload_pic_aws', '上传图片到亚马逊', '1', '0', '69', '2', 'action', '0', '', '0');
INSERT INTO `sys_node` VALUES ('82', 'diy_menu_show', '新增未编辑', '0', '0', '26', '2', 'action', '0', '', '0');
INSERT INTO `sys_node` VALUES ('121', 'Refresh', '缓存管理', '1', '98', '0', '1', 'controller', '0', '', '0');
INSERT INTO `sys_node` VALUES ('122', 'refresh_cache', '更新缓存', '1', '0', '121', '2', 'action', '0', '', '0');
INSERT INTO `sys_node` VALUES ('124', 'upload_audio_aws', '音频上传', '1', '0', '69', '2', 'action', '0', '', '0');

-- ----------------------------
-- Table structure for sys_role
-- ----------------------------
DROP TABLE IF EXISTS `sys_role`;
CREATE TABLE `sys_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(81) NOT NULL COMMENT '角色名字',
  `pid` int(11) NOT NULL COMMENT '所属上级',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '角色状态',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  `is_sys` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否系统组，系统组不能删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of sys_role
-- ----------------------------
INSERT INTO `sys_role` VALUES ('1', '系统用户', '0', '1', '1440910659', '1440910659', '1');
INSERT INTO `sys_role` VALUES ('16', '系统管理员', '1', '1', '1441024186', '1441024186', '1');
INSERT INTO `sys_role` VALUES ('43', '运营', '0', '1', '1442387008', '1442387008', '0');
INSERT INTO `sys_role` VALUES ('44', 'ios频道', '43', '1', '1442387030', '1442387030', '0');
INSERT INTO `sys_role` VALUES ('45', '安卓频道', '43', '1', '1442387039', '1442387039', '0');
INSERT INTO `sys_role` VALUES ('46', '主站频道', '43', '1', '1443164172', '1443164172', '0');
INSERT INTO `sys_role` VALUES ('47', '测试', '0', '1', '1443190982', '1443190982', '0');
INSERT INTO `sys_role` VALUES ('48', '测试用户组', '47', '1', '1443191005', '1443191005', '0');
INSERT INTO `sys_role` VALUES ('49', '铃声频道', '43', '1', '1445322659', '1445322659', '0');
INSERT INTO `sys_role` VALUES ('50', '壁纸频道', '43', '1', '1447746898', '1447746898', '0');
INSERT INTO `sys_role` VALUES ('51', '游戏频道', '43', '1', '1448504421', '1448504421', '0');
INSERT INTO `sys_role` VALUES ('54', '评测频道', '43', '1', '1465983638', '1465983638', '0');
INSERT INTO `sys_role` VALUES ('55', 'WP频道', '43', '1', '1466658622', '1466658622', '0');
INSERT INTO `sys_role` VALUES ('56', 'ios客户端管理', '43', '1', '1470655978', '1470655978', '0');
INSERT INTO `sys_role` VALUES ('58', '教程频道', '43', '1', '1473325509', '1473325720', '0');

-- ----------------------------
-- Table structure for sys_rolenode
-- ----------------------------
DROP TABLE IF EXISTS `sys_rolenode`;
CREATE TABLE `sys_rolenode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL COMMENT '角色编号',
  `node_id` int(11) NOT NULL COMMENT '权限结点编号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1805 DEFAULT CHARSET=utf8 COMMENT='角色权限对应表';

-- ----------------------------
-- Records of sys_rolenode
-- ----------------------------
INSERT INTO `sys_rolenode` VALUES ('199', '48', '78');
INSERT INTO `sys_rolenode` VALUES ('866', '50', '193');
INSERT INTO `sys_rolenode` VALUES ('867', '50', '312');
INSERT INTO `sys_rolenode` VALUES ('868', '50', '311');
INSERT INTO `sys_rolenode` VALUES ('869', '50', '310');
INSERT INTO `sys_rolenode` VALUES ('870', '50', '309');
INSERT INTO `sys_rolenode` VALUES ('871', '50', '308');
INSERT INTO `sys_rolenode` VALUES ('872', '50', '209');
INSERT INTO `sys_rolenode` VALUES ('873', '50', '208');
INSERT INTO `sys_rolenode` VALUES ('874', '50', '207');
INSERT INTO `sys_rolenode` VALUES ('875', '50', '206');
INSERT INTO `sys_rolenode` VALUES ('876', '50', '204');
INSERT INTO `sys_rolenode` VALUES ('877', '50', '203');
INSERT INTO `sys_rolenode` VALUES ('878', '50', '202');
INSERT INTO `sys_rolenode` VALUES ('879', '50', '200');
INSERT INTO `sys_rolenode` VALUES ('880', '50', '199');
INSERT INTO `sys_rolenode` VALUES ('881', '50', '198');
INSERT INTO `sys_rolenode` VALUES ('882', '50', '196');
INSERT INTO `sys_rolenode` VALUES ('883', '50', '195');
INSERT INTO `sys_rolenode` VALUES ('884', '50', '307');
INSERT INTO `sys_rolenode` VALUES ('885', '50', '121');
INSERT INTO `sys_rolenode` VALUES ('886', '50', '122');
INSERT INTO `sys_rolenode` VALUES ('887', '50', '70');
INSERT INTO `sys_rolenode` VALUES ('888', '50', '71');
INSERT INTO `sys_rolenode` VALUES ('918', '51', '285');
INSERT INTO `sys_rolenode` VALUES ('919', '51', '319');
INSERT INTO `sys_rolenode` VALUES ('920', '51', '301');
INSERT INTO `sys_rolenode` VALUES ('921', '51', '302');
INSERT INTO `sys_rolenode` VALUES ('922', '51', '303');
INSERT INTO `sys_rolenode` VALUES ('923', '51', '304');
INSERT INTO `sys_rolenode` VALUES ('924', '51', '305');
INSERT INTO `sys_rolenode` VALUES ('925', '51', '313');
INSERT INTO `sys_rolenode` VALUES ('926', '51', '314');
INSERT INTO `sys_rolenode` VALUES ('927', '51', '315');
INSERT INTO `sys_rolenode` VALUES ('928', '51', '317');
INSERT INTO `sys_rolenode` VALUES ('929', '51', '318');
INSERT INTO `sys_rolenode` VALUES ('930', '51', '299');
INSERT INTO `sys_rolenode` VALUES ('931', '51', '298');
INSERT INTO `sys_rolenode` VALUES ('932', '51', '297');
INSERT INTO `sys_rolenode` VALUES ('933', '51', '289');
INSERT INTO `sys_rolenode` VALUES ('934', '51', '290');
INSERT INTO `sys_rolenode` VALUES ('935', '51', '291');
INSERT INTO `sys_rolenode` VALUES ('936', '51', '292');
INSERT INTO `sys_rolenode` VALUES ('937', '51', '293');
INSERT INTO `sys_rolenode` VALUES ('938', '51', '294');
INSERT INTO `sys_rolenode` VALUES ('939', '51', '295');
INSERT INTO `sys_rolenode` VALUES ('940', '51', '296');
INSERT INTO `sys_rolenode` VALUES ('941', '51', '286');
INSERT INTO `sys_rolenode` VALUES ('942', '51', '287');
INSERT INTO `sys_rolenode` VALUES ('943', '51', '288');
INSERT INTO `sys_rolenode` VALUES ('944', '51', '121');
INSERT INTO `sys_rolenode` VALUES ('945', '51', '122');
INSERT INTO `sys_rolenode` VALUES ('946', '51', '70');
INSERT INTO `sys_rolenode` VALUES ('947', '51', '71');
INSERT INTO `sys_rolenode` VALUES ('1141', '49', '100');
INSERT INTO `sys_rolenode` VALUES ('1142', '49', '356');
INSERT INTO `sys_rolenode` VALUES ('1143', '49', '165');
INSERT INTO `sys_rolenode` VALUES ('1144', '49', '164');
INSERT INTO `sys_rolenode` VALUES ('1145', '49', '162');
INSERT INTO `sys_rolenode` VALUES ('1146', '49', '160');
INSERT INTO `sys_rolenode` VALUES ('1147', '49', '159');
INSERT INTO `sys_rolenode` VALUES ('1148', '49', '158');
INSERT INTO `sys_rolenode` VALUES ('1149', '49', '157');
INSERT INTO `sys_rolenode` VALUES ('1150', '49', '156');
INSERT INTO `sys_rolenode` VALUES ('1151', '49', '155');
INSERT INTO `sys_rolenode` VALUES ('1152', '49', '154');
INSERT INTO `sys_rolenode` VALUES ('1153', '49', '153');
INSERT INTO `sys_rolenode` VALUES ('1154', '49', '166');
INSERT INTO `sys_rolenode` VALUES ('1155', '49', '167');
INSERT INTO `sys_rolenode` VALUES ('1156', '49', '355');
INSERT INTO `sys_rolenode` VALUES ('1157', '49', '351');
INSERT INTO `sys_rolenode` VALUES ('1158', '49', '326');
INSERT INTO `sys_rolenode` VALUES ('1159', '49', '325');
INSERT INTO `sys_rolenode` VALUES ('1160', '49', '324');
INSERT INTO `sys_rolenode` VALUES ('1161', '49', '323');
INSERT INTO `sys_rolenode` VALUES ('1162', '49', '322');
INSERT INTO `sys_rolenode` VALUES ('1163', '49', '321');
INSERT INTO `sys_rolenode` VALUES ('1164', '49', '185');
INSERT INTO `sys_rolenode` VALUES ('1165', '49', '178');
INSERT INTO `sys_rolenode` VALUES ('1166', '49', '177');
INSERT INTO `sys_rolenode` VALUES ('1167', '49', '152');
INSERT INTO `sys_rolenode` VALUES ('1168', '49', '135');
INSERT INTO `sys_rolenode` VALUES ('1169', '49', '138');
INSERT INTO `sys_rolenode` VALUES ('1170', '49', '137');
INSERT INTO `sys_rolenode` VALUES ('1171', '49', '136');
INSERT INTO `sys_rolenode` VALUES ('1172', '49', '125');
INSERT INTO `sys_rolenode` VALUES ('1173', '49', '126');
INSERT INTO `sys_rolenode` VALUES ('1174', '49', '133');
INSERT INTO `sys_rolenode` VALUES ('1175', '49', '127');
INSERT INTO `sys_rolenode` VALUES ('1176', '49', '129');
INSERT INTO `sys_rolenode` VALUES ('1177', '49', '123');
INSERT INTO `sys_rolenode` VALUES ('1178', '49', '106');
INSERT INTO `sys_rolenode` VALUES ('1179', '49', '148');
INSERT INTO `sys_rolenode` VALUES ('1180', '49', '147');
INSERT INTO `sys_rolenode` VALUES ('1181', '49', '146');
INSERT INTO `sys_rolenode` VALUES ('1182', '49', '145');
INSERT INTO `sys_rolenode` VALUES ('1183', '49', '144');
INSERT INTO `sys_rolenode` VALUES ('1184', '49', '143');
INSERT INTO `sys_rolenode` VALUES ('1185', '49', '102');
INSERT INTO `sys_rolenode` VALUES ('1186', '49', '141');
INSERT INTO `sys_rolenode` VALUES ('1187', '49', '128');
INSERT INTO `sys_rolenode` VALUES ('1188', '49', '101');
INSERT INTO `sys_rolenode` VALUES ('1189', '49', '132');
INSERT INTO `sys_rolenode` VALUES ('1190', '49', '139');
INSERT INTO `sys_rolenode` VALUES ('1191', '49', '161');
INSERT INTO `sys_rolenode` VALUES ('1192', '49', '320');
INSERT INTO `sys_rolenode` VALUES ('1193', '49', '142');
INSERT INTO `sys_rolenode` VALUES ('1194', '49', '176');
INSERT INTO `sys_rolenode` VALUES ('1195', '49', '149');
INSERT INTO `sys_rolenode` VALUES ('1196', '49', '108');
INSERT INTO `sys_rolenode` VALUES ('1197', '49', '193');
INSERT INTO `sys_rolenode` VALUES ('1198', '49', '121');
INSERT INTO `sys_rolenode` VALUES ('1199', '49', '122');
INSERT INTO `sys_rolenode` VALUES ('1200', '49', '69');
INSERT INTO `sys_rolenode` VALUES ('1201', '49', '70');
INSERT INTO `sys_rolenode` VALUES ('1202', '49', '71');
INSERT INTO `sys_rolenode` VALUES ('1203', '49', '124');
INSERT INTO `sys_rolenode` VALUES ('1236', '46', '59');
INSERT INTO `sys_rolenode` VALUES ('1237', '46', '93');
INSERT INTO `sys_rolenode` VALUES ('1238', '46', '88');
INSERT INTO `sys_rolenode` VALUES ('1239', '46', '89');
INSERT INTO `sys_rolenode` VALUES ('1240', '46', '90');
INSERT INTO `sys_rolenode` VALUES ('1241', '46', '91');
INSERT INTO `sys_rolenode` VALUES ('1242', '46', '92');
INSERT INTO `sys_rolenode` VALUES ('1243', '46', '169');
INSERT INTO `sys_rolenode` VALUES ('1244', '46', '134');
INSERT INTO `sys_rolenode` VALUES ('1245', '46', '60');
INSERT INTO `sys_rolenode` VALUES ('1246', '46', '327');
INSERT INTO `sys_rolenode` VALUES ('1247', '46', '109');
INSERT INTO `sys_rolenode` VALUES ('1248', '46', '130');
INSERT INTO `sys_rolenode` VALUES ('1249', '46', '61');
INSERT INTO `sys_rolenode` VALUES ('1250', '46', '85');
INSERT INTO `sys_rolenode` VALUES ('1251', '46', '84');
INSERT INTO `sys_rolenode` VALUES ('1252', '46', '81');
INSERT INTO `sys_rolenode` VALUES ('1253', '46', '76');
INSERT INTO `sys_rolenode` VALUES ('1254', '46', '75');
INSERT INTO `sys_rolenode` VALUES ('1255', '46', '72');
INSERT INTO `sys_rolenode` VALUES ('1256', '46', '68');
INSERT INTO `sys_rolenode` VALUES ('1257', '46', '67');
INSERT INTO `sys_rolenode` VALUES ('1258', '46', '62');
INSERT INTO `sys_rolenode` VALUES ('1259', '46', '63');
INSERT INTO `sys_rolenode` VALUES ('1260', '46', '64');
INSERT INTO `sys_rolenode` VALUES ('1261', '46', '95');
INSERT INTO `sys_rolenode` VALUES ('1262', '46', '96');
INSERT INTO `sys_rolenode` VALUES ('1263', '46', '97');
INSERT INTO `sys_rolenode` VALUES ('1264', '46', '98');
INSERT INTO `sys_rolenode` VALUES ('1265', '46', '65');
INSERT INTO `sys_rolenode` VALUES ('1266', '46', '121');
INSERT INTO `sys_rolenode` VALUES ('1267', '46', '122');
INSERT INTO `sys_rolenode` VALUES ('1268', '46', '69');
INSERT INTO `sys_rolenode` VALUES ('1269', '46', '70');
INSERT INTO `sys_rolenode` VALUES ('1270', '46', '71');
INSERT INTO `sys_rolenode` VALUES ('1538', '54', '410');
INSERT INTO `sys_rolenode` VALUES ('1539', '54', '423');
INSERT INTO `sys_rolenode` VALUES ('1540', '54', '422');
INSERT INTO `sys_rolenode` VALUES ('1541', '54', '421');
INSERT INTO `sys_rolenode` VALUES ('1542', '54', '420');
INSERT INTO `sys_rolenode` VALUES ('1543', '54', '419');
INSERT INTO `sys_rolenode` VALUES ('1544', '54', '417');
INSERT INTO `sys_rolenode` VALUES ('1545', '54', '416');
INSERT INTO `sys_rolenode` VALUES ('1546', '54', '415');
INSERT INTO `sys_rolenode` VALUES ('1547', '54', '414');
INSERT INTO `sys_rolenode` VALUES ('1548', '54', '413');
INSERT INTO `sys_rolenode` VALUES ('1549', '54', '411');
INSERT INTO `sys_rolenode` VALUES ('1550', '54', '412');
INSERT INTO `sys_rolenode` VALUES ('1551', '54', '121');
INSERT INTO `sys_rolenode` VALUES ('1552', '54', '122');
INSERT INTO `sys_rolenode` VALUES ('1553', '54', '69');
INSERT INTO `sys_rolenode` VALUES ('1554', '54', '70');
INSERT INTO `sys_rolenode` VALUES ('1555', '54', '71');
INSERT INTO `sys_rolenode` VALUES ('1556', '54', '124');
INSERT INTO `sys_rolenode` VALUES ('1557', '45', '170');
INSERT INTO `sys_rolenode` VALUES ('1558', '45', '424');
INSERT INTO `sys_rolenode` VALUES ('1559', '45', '372');
INSERT INTO `sys_rolenode` VALUES ('1560', '45', '377');
INSERT INTO `sys_rolenode` VALUES ('1561', '45', '378');
INSERT INTO `sys_rolenode` VALUES ('1562', '45', '380');
INSERT INTO `sys_rolenode` VALUES ('1563', '45', '381');
INSERT INTO `sys_rolenode` VALUES ('1564', '45', '382');
INSERT INTO `sys_rolenode` VALUES ('1565', '45', '383');
INSERT INTO `sys_rolenode` VALUES ('1566', '45', '384');
INSERT INTO `sys_rolenode` VALUES ('1567', '45', '385');
INSERT INTO `sys_rolenode` VALUES ('1568', '45', '390');
INSERT INTO `sys_rolenode` VALUES ('1569', '45', '391');
INSERT INTO `sys_rolenode` VALUES ('1570', '45', '392');
INSERT INTO `sys_rolenode` VALUES ('1571', '45', '394');
INSERT INTO `sys_rolenode` VALUES ('1572', '45', '370');
INSERT INTO `sys_rolenode` VALUES ('1573', '45', '369');
INSERT INTO `sys_rolenode` VALUES ('1574', '45', '368');
INSERT INTO `sys_rolenode` VALUES ('1575', '45', '172');
INSERT INTO `sys_rolenode` VALUES ('1576', '45', '179');
INSERT INTO `sys_rolenode` VALUES ('1577', '45', '180');
INSERT INTO `sys_rolenode` VALUES ('1578', '45', '183');
INSERT INTO `sys_rolenode` VALUES ('1579', '45', '184');
INSERT INTO `sys_rolenode` VALUES ('1580', '45', '357');
INSERT INTO `sys_rolenode` VALUES ('1581', '45', '358');
INSERT INTO `sys_rolenode` VALUES ('1582', '45', '359');
INSERT INTO `sys_rolenode` VALUES ('1583', '45', '360');
INSERT INTO `sys_rolenode` VALUES ('1584', '45', '363');
INSERT INTO `sys_rolenode` VALUES ('1585', '45', '364');
INSERT INTO `sys_rolenode` VALUES ('1586', '45', '365');
INSERT INTO `sys_rolenode` VALUES ('1587', '45', '171');
INSERT INTO `sys_rolenode` VALUES ('1588', '45', '366');
INSERT INTO `sys_rolenode` VALUES ('1589', '45', '393');
INSERT INTO `sys_rolenode` VALUES ('1590', '45', '371');
INSERT INTO `sys_rolenode` VALUES ('1591', '45', '121');
INSERT INTO `sys_rolenode` VALUES ('1592', '45', '122');
INSERT INTO `sys_rolenode` VALUES ('1593', '45', '70');
INSERT INTO `sys_rolenode` VALUES ('1594', '45', '71');
INSERT INTO `sys_rolenode` VALUES ('1613', '55', '436');
INSERT INTO `sys_rolenode` VALUES ('1614', '55', '458');
INSERT INTO `sys_rolenode` VALUES ('1615', '55', '457');
INSERT INTO `sys_rolenode` VALUES ('1616', '55', '451');
INSERT INTO `sys_rolenode` VALUES ('1617', '55', '450');
INSERT INTO `sys_rolenode` VALUES ('1618', '55', '449');
INSERT INTO `sys_rolenode` VALUES ('1619', '55', '448');
INSERT INTO `sys_rolenode` VALUES ('1620', '55', '447');
INSERT INTO `sys_rolenode` VALUES ('1621', '55', '446');
INSERT INTO `sys_rolenode` VALUES ('1622', '55', '445');
INSERT INTO `sys_rolenode` VALUES ('1623', '55', '444');
INSERT INTO `sys_rolenode` VALUES ('1624', '55', '443');
INSERT INTO `sys_rolenode` VALUES ('1625', '55', '442');
INSERT INTO `sys_rolenode` VALUES ('1626', '55', '440');
INSERT INTO `sys_rolenode` VALUES ('1627', '55', '439');
INSERT INTO `sys_rolenode` VALUES ('1628', '55', '438');
INSERT INTO `sys_rolenode` VALUES ('1629', '55', '437');
INSERT INTO `sys_rolenode` VALUES ('1630', '55', '453');
INSERT INTO `sys_rolenode` VALUES ('1631', '55', '455');
INSERT INTO `sys_rolenode` VALUES ('1632', '55', '456');
INSERT INTO `sys_rolenode` VALUES ('1633', '55', '459');
INSERT INTO `sys_rolenode` VALUES ('1634', '55', '454');
INSERT INTO `sys_rolenode` VALUES ('1635', '55', '121');
INSERT INTO `sys_rolenode` VALUES ('1636', '55', '122');
INSERT INTO `sys_rolenode` VALUES ('1637', '55', '69');
INSERT INTO `sys_rolenode` VALUES ('1638', '55', '70');
INSERT INTO `sys_rolenode` VALUES ('1639', '55', '71');
INSERT INTO `sys_rolenode` VALUES ('1640', '55', '124');
INSERT INTO `sys_rolenode` VALUES ('1704', '44', '77');
INSERT INTO `sys_rolenode` VALUES ('1705', '44', '338');
INSERT INTO `sys_rolenode` VALUES ('1706', '44', '334');
INSERT INTO `sys_rolenode` VALUES ('1707', '44', '389');
INSERT INTO `sys_rolenode` VALUES ('1708', '44', '336');
INSERT INTO `sys_rolenode` VALUES ('1709', '44', '337');
INSERT INTO `sys_rolenode` VALUES ('1710', '44', '388');
INSERT INTO `sys_rolenode` VALUES ('1711', '44', '339');
INSERT INTO `sys_rolenode` VALUES ('1712', '44', '340');
INSERT INTO `sys_rolenode` VALUES ('1713', '44', '343');
INSERT INTO `sys_rolenode` VALUES ('1714', '44', '344');
INSERT INTO `sys_rolenode` VALUES ('1715', '44', '345');
INSERT INTO `sys_rolenode` VALUES ('1716', '44', '333');
INSERT INTO `sys_rolenode` VALUES ('1717', '44', '332');
INSERT INTO `sys_rolenode` VALUES ('1718', '44', '83');
INSERT INTO `sys_rolenode` VALUES ('1719', '44', '86');
INSERT INTO `sys_rolenode` VALUES ('1720', '44', '117');
INSERT INTO `sys_rolenode` VALUES ('1721', '44', '118');
INSERT INTO `sys_rolenode` VALUES ('1722', '44', '119');
INSERT INTO `sys_rolenode` VALUES ('1723', '44', '120');
INSERT INTO `sys_rolenode` VALUES ('1724', '44', '328');
INSERT INTO `sys_rolenode` VALUES ('1725', '44', '329');
INSERT INTO `sys_rolenode` VALUES ('1726', '44', '330');
INSERT INTO `sys_rolenode` VALUES ('1727', '44', '331');
INSERT INTO `sys_rolenode` VALUES ('1728', '44', '350');
INSERT INTO `sys_rolenode` VALUES ('1729', '44', '78');
INSERT INTO `sys_rolenode` VALUES ('1730', '44', '335');
INSERT INTO `sys_rolenode` VALUES ('1731', '44', '387');
INSERT INTO `sys_rolenode` VALUES ('1732', '44', '395');
INSERT INTO `sys_rolenode` VALUES ('1733', '44', '401');
INSERT INTO `sys_rolenode` VALUES ('1734', '44', '400');
INSERT INTO `sys_rolenode` VALUES ('1735', '44', '405');
INSERT INTO `sys_rolenode` VALUES ('1736', '44', '406');
INSERT INTO `sys_rolenode` VALUES ('1737', '44', '407');
INSERT INTO `sys_rolenode` VALUES ('1738', '44', '408');
INSERT INTO `sys_rolenode` VALUES ('1739', '44', '409');
INSERT INTO `sys_rolenode` VALUES ('1740', '44', '61');
INSERT INTO `sys_rolenode` VALUES ('1741', '44', '85');
INSERT INTO `sys_rolenode` VALUES ('1742', '44', '84');
INSERT INTO `sys_rolenode` VALUES ('1743', '44', '81');
INSERT INTO `sys_rolenode` VALUES ('1744', '44', '76');
INSERT INTO `sys_rolenode` VALUES ('1745', '44', '75');
INSERT INTO `sys_rolenode` VALUES ('1746', '44', '72');
INSERT INTO `sys_rolenode` VALUES ('1747', '44', '68');
INSERT INTO `sys_rolenode` VALUES ('1748', '44', '67');
INSERT INTO `sys_rolenode` VALUES ('1749', '44', '62');
INSERT INTO `sys_rolenode` VALUES ('1750', '44', '63');
INSERT INTO `sys_rolenode` VALUES ('1751', '44', '64');
INSERT INTO `sys_rolenode` VALUES ('1752', '44', '95');
INSERT INTO `sys_rolenode` VALUES ('1753', '44', '96');
INSERT INTO `sys_rolenode` VALUES ('1754', '44', '97');
INSERT INTO `sys_rolenode` VALUES ('1755', '44', '98');
INSERT INTO `sys_rolenode` VALUES ('1756', '44', '65');
INSERT INTO `sys_rolenode` VALUES ('1757', '44', '453');
INSERT INTO `sys_rolenode` VALUES ('1758', '44', '455');
INSERT INTO `sys_rolenode` VALUES ('1759', '44', '456');
INSERT INTO `sys_rolenode` VALUES ('1760', '44', '459');
INSERT INTO `sys_rolenode` VALUES ('1761', '44', '454');
INSERT INTO `sys_rolenode` VALUES ('1762', '44', '460');
INSERT INTO `sys_rolenode` VALUES ('1763', '44', '121');
INSERT INTO `sys_rolenode` VALUES ('1764', '44', '122');
INSERT INTO `sys_rolenode` VALUES ('1765', '44', '69');
INSERT INTO `sys_rolenode` VALUES ('1766', '44', '70');
INSERT INTO `sys_rolenode` VALUES ('1767', '44', '71');
INSERT INTO `sys_rolenode` VALUES ('1779', '56', '461');
INSERT INTO `sys_rolenode` VALUES ('1780', '56', '462');
INSERT INTO `sys_rolenode` VALUES ('1781', '56', '464');
INSERT INTO `sys_rolenode` VALUES ('1782', '56', '465');
INSERT INTO `sys_rolenode` VALUES ('1783', '56', '466');
INSERT INTO `sys_rolenode` VALUES ('1784', '56', '467');
INSERT INTO `sys_rolenode` VALUES ('1785', '56', '468');
INSERT INTO `sys_rolenode` VALUES ('1786', '56', '469');
INSERT INTO `sys_rolenode` VALUES ('1787', '56', '470');
INSERT INTO `sys_rolenode` VALUES ('1788', '56', '463');
INSERT INTO `sys_rolenode` VALUES ('1794', '58', '471');
INSERT INTO `sys_rolenode` VALUES ('1795', '58', '472');
INSERT INTO `sys_rolenode` VALUES ('1796', '58', '476');
INSERT INTO `sys_rolenode` VALUES ('1797', '58', '477');
INSERT INTO `sys_rolenode` VALUES ('1798', '58', '479');
INSERT INTO `sys_rolenode` VALUES ('1799', '58', '121');
INSERT INTO `sys_rolenode` VALUES ('1800', '58', '122');
INSERT INTO `sys_rolenode` VALUES ('1801', '58', '69');
INSERT INTO `sys_rolenode` VALUES ('1802', '58', '70');
INSERT INTO `sys_rolenode` VALUES ('1803', '58', '71');
INSERT INTO `sys_rolenode` VALUES ('1804', '58', '124');

-- ----------------------------
-- Table structure for sys_user
-- ----------------------------
DROP TABLE IF EXISTS `sys_user`;
CREATE TABLE `sys_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(21) NOT NULL,
  `nic_name` varchar(21) NOT NULL,
  `password` char(32) NOT NULL,
  `reg_time` int(11) NOT NULL COMMENT '注册时间',
  `last_login_time` int(11) NOT NULL COMMENT '上次登录时间',
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL COMMENT '登录状态 0离线 1上线',
  `last_login_ip` int(11) NOT NULL COMMENT '最后登陆ip',
  `is_sys` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否系统用户',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of sys_user
-- ----------------------------
INSERT INTO `sys_user` VALUES ('1', 'admin', 'admin', '42bd287c102c97d7686ce471b789ff18', '1440216041', '1477046833', 'admin@qq.com', '1', '0', '1');
INSERT INTO `sys_user` VALUES ('23', 'xjb1', 'ingman1', '26a45e401b1318ae9dc64fcde58c39ed', '1443164225', '1477383823', 'dongyuan@qq.com', '1', '0', '0');
INSERT INTO `sys_user` VALUES ('24', 'xjb2', 'ingman2', '6af13ef6fcc6a9aaec537e1f61a4f2d9', '1443166399', '1449046123', 'sunjinliang@qq.com', '1', '0', '0');
INSERT INTO `sys_user` VALUES ('27', 'xjb3', 'ingman3', '695778e270ee64910422bf96053d780b', '1466413416', '1467688582', 'limengyin@qq.com', '1', '0', '0');
INSERT INTO `sys_user` VALUES ('28', 'xjb4', 'ingman4', '9baab715c0688ec822ef54efe277aa52', '1466413519', '1477275313', 'vini@qq.com', '1', '0', '0');
INSERT INTO `sys_user` VALUES ('29', 'xjb5', 'ingman5', '520feff12e06a477a18b57790ab9b164', '1466413583', '1473217750', 'liziwei@qq.com', '1', '0', '0');
INSERT INTO `sys_user` VALUES ('30', 'xjb6', 'ingman6', '2c5d9062b6325e26750e48751475b273', '1470656049', '1472018858', 'loaryzhou@qq.com', '1', '0', '0');

-- ----------------------------
-- Table structure for sys_userrole
-- ----------------------------
DROP TABLE IF EXISTS `sys_userrole`;
CREATE TABLE `sys_userrole` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL COMMENT '角色编号',
  `user_id` int(11) DEFAULT NULL COMMENT '用户编号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=utf8 COMMENT='用户角色对应表';

-- ----------------------------
-- Records of sys_userrole
-- ----------------------------
INSERT INTO `sys_userrole` VALUES ('117', '46', '24');
INSERT INTO `sys_userrole` VALUES ('174', '55', '27');
INSERT INTO `sys_userrole` VALUES ('175', '54', '27');
INSERT INTO `sys_userrole` VALUES ('176', '45', '27');
INSERT INTO `sys_userrole` VALUES ('177', '44', '27');
INSERT INTO `sys_userrole` VALUES ('178', '55', '29');
INSERT INTO `sys_userrole` VALUES ('179', '54', '29');
INSERT INTO `sys_userrole` VALUES ('180', '45', '29');
INSERT INTO `sys_userrole` VALUES ('181', '44', '29');
INSERT INTO `sys_userrole` VALUES ('182', '55', '28');
INSERT INTO `sys_userrole` VALUES ('183', '54', '28');
INSERT INTO `sys_userrole` VALUES ('184', '45', '28');
INSERT INTO `sys_userrole` VALUES ('185', '44', '28');
INSERT INTO `sys_userrole` VALUES ('186', '56', '30');
INSERT INTO `sys_userrole` VALUES ('187', '43', '23');
INSERT INTO `sys_userrole` VALUES ('188', '58', '23');
INSERT INTO `sys_userrole` VALUES ('189', '55', '23');
INSERT INTO `sys_userrole` VALUES ('190', '54', '23');
INSERT INTO `sys_userrole` VALUES ('191', '51', '23');
INSERT INTO `sys_userrole` VALUES ('192', '50', '23');
INSERT INTO `sys_userrole` VALUES ('193', '49', '23');
INSERT INTO `sys_userrole` VALUES ('194', '46', '23');
INSERT INTO `sys_userrole` VALUES ('195', '45', '23');
INSERT INTO `sys_userrole` VALUES ('196', '44', '23');
