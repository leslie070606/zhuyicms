-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016-06-26 15:14:22
-- 服务器版本: 5.5.47-0ubuntu0.14.04.1-log
-- PHP 版本: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `zhuyicms`
--

-- --------------------------------------------------------

--
-- 表的结构 `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/*', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/assignment/*', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/assignment/assign', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/assignment/index', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/assignment/revoke', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/assignment/view', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/default/*', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/default/index', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/menu/*', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/menu/create', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/menu/delete', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/menu/index', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/menu/update', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/menu/view', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/permission/*', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/permission/assign', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/permission/create', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/permission/delete', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/permission/index', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/permission/remove', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/permission/update', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/permission/view', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/role/*', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/role/assign', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/role/create', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/role/delete', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/role/index', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/role/remove', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/role/update', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/role/view', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/route/*', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/route/assign', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/route/create', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/route/index', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/route/refresh', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/route/remove', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/rule/*', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/rule/create', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/rule/delete', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/rule/index', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/rule/update', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/rule/view', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/user/*', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/user/activate', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/user/change-password', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/user/delete', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/user/index', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/user/login', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/user/logout', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/user/request-password-reset', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/user/reset-password', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/user/signup', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/admin/user/view', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/debug/*', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/debug/default/*', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/debug/default/db-explain', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/debug/default/download-mail', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/debug/default/index', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/debug/default/toolbar', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/debug/default/view', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/designer/*', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/gii/*', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/gii/default/*', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/gii/default/action', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/gii/default/diff', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/gii/default/index', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/gii/default/preview', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/gii/default/view', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/index/*', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/index/index', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/login/*', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/login/captcha', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/login/index', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/login/logout', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/site/*', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/site/error', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/site/index', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/site/login', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/site/logout', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/upload/*', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/upload/upload', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('用户管理', 2, '用户管理', NULL, NULL, 1466654691, 1466654691),
('超级管理员', 1, '超级管理员', NULL, NULL, 1466654830, 1466654830);

-- --------------------------------------------------------

--
-- 表的结构 `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('用户管理', '/admin/user/*'),
('用户管理', '/admin/user/activate'),
('用户管理', '/admin/user/change-password'),
('用户管理', '/admin/user/delete'),
('用户管理', '/admin/user/index'),
('用户管理', '/admin/user/login'),
('用户管理', '/admin/user/logout'),
('用户管理', '/admin/user/request-password-reset'),
('用户管理', '/admin/user/reset-password'),
('用户管理', '/admin/user/signup'),
('用户管理', '/admin/user/view'),
('超级管理员', '用户管理');

-- --------------------------------------------------------

--
-- 表的结构 `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(256) NOT NULL,
  `password_reset_token` varchar(256) DEFAULT NULL,
  `email` varchar(256) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `zyj_designer_additional`
--

CREATE TABLE IF NOT EXISTS `zyj_designer_additional` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID主键',
  `designer_id` int(10) unsigned NOT NULL COMMENT '设计师ID',
  `ideal_customer` varchar(30) DEFAULT NULL COMMENT '理想的服务对象',
  `ideal_process` varchar(30) DEFAULT NULL COMMENT '理想的服务流程',
  `pain_point` varchar(30) DEFAULT NULL COMMENT '现有痛点',
  `source` varchar(20) DEFAULT NULL COMMENT '设计师推荐来源',
  `custom_service` varchar(10) NOT NULL COMMENT '设计师内部对接人员（客服）',
  `recommend` varchar(10) DEFAULT NULL COMMENT '设计师推荐的其他设计师（最多5名）',
  `ideas` varchar(30) NOT NULL COMMENT '三句话的设计理念',
  `works` varchar(50) NOT NULL COMMENT '代表作品（x条）',
  `share_video` varchar(50) CHARACTER SET ucs2 DEFAULT NULL COMMENT '设计师可以分享的视频内容（3条',
  `shared_video` varchar(50) DEFAULT NULL COMMENT '设计师已经分享了的视频内容（3条）',
  `share_text` text COMMENT '设计师可以分享的文字内容（3条）',
  `shared_text` text COMMENT '设计师已经分享了的文字内容（3条）',
  `phone` varchar(11) NOT NULL COMMENT '设计师电话',
  `wechat` varchar(10) NOT NULL COMMENT '设计师微信',
  `email` varchar(30) NOT NULL COMMENT '设计师邮箱',
  `address` varchar(30) NOT NULL COMMENT '设计师住址',
  `card_no` varchar(100) NOT NULL COMMENT '设计师银行账号',
  `bank` varchar(15) NOT NULL COMMENT '设计师开户银行',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='设计师附加信息表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `zyj_designer_basic`
--

CREATE TABLE IF NOT EXISTS `zyj_designer_basic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID主键自增',
  `sign` tinyint(1) unsigned DEFAULT NULL COMMENT '设计师签约状态0ture,1false',
  `status` varchar(11) DEFAULT NULL COMMENT '设计师的接洽状态',
  `picture` varchar(50) DEFAULT NULL COMMENT '设计师头像',
  `service_pre` varchar(11) NOT NULL COMMENT '设计师洽谈人员',
  `name` varchar(11) NOT NULL COMMENT '设计师姓名',
  `tag` varchar(11) DEFAULT NULL COMMENT '设计师标签以逗号隔开',
  `sex` tinyint(1) unsigned NOT NULL COMMENT '设计师性别',
  `birth` varchar(11) NOT NULL COMMENT '设计师出生日期',
  `job_year` varchar(11) NOT NULL COMMENT '设计师从业年限',
  `company` varchar(11) NOT NULL COMMENT '设计师所属机构',
  `ever_office` varchar(11) NOT NULL COMMENT '设计师以往服务的大事务所',
  `alma_mater` varchar(11) DEFAULT NULL COMMENT '设计师毕业院校',
  `winning` text COMMENT '获奖经历',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='设计师基本信息表' AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `zyj_designer_basic`
--

INSERT INTO `zyj_designer_basic` (`id`, `sign`, `status`, `picture`, `service_pre`, `name`, `tag`, `sex`, `birth`, `job_year`, `company`, `ever_office`, `alma_mater`, `winning`) VALUES
(1, NULL, '11', NULL, '111', '1111', '11', 1, '11111', '1111', '11111', '111111', '1111', '111'),
(2, NULL, '', '', '1111', '1111111', '', 1, '11', '11', '11', '1', '', ''),
(3, NULL, '', '', '2', '111', '', 1, '2', '2', '2', '2', '', ''),
(4, NULL, '', '', '22', '2', '', 1, '2', '2', '2', '2', '', ''),
(5, NULL, '', '', 'wwww', 'ww', '', 1, 'www', 'wwww', 'www', 'www', '', ''),
(6, NULL, '', '', 'www', 'www', '', 1, 'www', 'www', 'www', 'ww', '', ''),
(7, NULL, '', '', 'qqq', 'qqq', '', 0, 'qqq', 'qqqq', 'ww', 'ww', '', ''),
(8, NULL, '', '', '222', '2', '', 0, '222', '222', '222', '2222', '', ''),
(9, NULL, '', '', '444', '123', '', 1, '3333', '444', '545', '5', '', ''),
(10, NULL, '', '', '3', '3333', '', 1, '3', '33', '3', '333333', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `zyj_designer_work`
--

CREATE TABLE IF NOT EXISTS `zyj_designer_work` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID主键',
  `designer_id` int(10) unsigned NOT NULL COMMENT '设计师ID',
  `category` varchar(20) DEFAULT NULL COMMENT '设计师类别',
  `city` varchar(10) DEFAULT NULL COMMENT '所在城市',
  `customer` varchar(10) NOT NULL COMMENT '设计师客户对象',
  `work_domain` varchar(20) DEFAULT NULL COMMENT '业务领域',
  `service_type` varchar(50) DEFAULT NULL COMMENT '设计师的服务类型',
  `butt_joint` varchar(10) DEFAULT NULL COMMENT '是否有施工对接',
  `docking_area` varchar(10) DEFAULT NULL COMMENT '设计师配套施工服务的区域',
  `include_project` varchar(100) DEFAULT NULL COMMENT '设计师设计费包含项目',
  `pay_extra` varchar(100) DEFAULT NULL COMMENT '其它提供并且需要额外付费的项目',
  `lower_price` varchar(10) DEFAULT NULL COMMENT '能够接受的最低设计费总额',
  `accept_area` varchar(20) DEFAULT NULL COMMENT '能够接受的面积范围',
  `lower_centiare` varchar(10) DEFAULT NULL COMMENT '能够接受的每平米建设费最低要求',
  `charge` varchar(15) DEFAULT NULL COMMENT '设计费收费标准（范围）',
  `charge_ls100` varchar(10) DEFAULT NULL COMMENT '设计费收费标准（100平米以下）',
  `charge_ls300` varchar(10) DEFAULT NULL COMMENT '设计费收费标准（100平米-300平米）',
  `charge_gt300` varchar(10) DEFAULT NULL COMMENT '设计费收费标准（300平米以上）',
  `mtc` varchar(10) DEFAULT NULL COMMENT '设计师收费方式',
  `style` varchar(20) NOT NULL COMMENT '设计师的风格擅长(10选3以逗号隔开)',
  `month_iswork` tinyint(5) unsigned NOT NULL COMMENT '设计师本月是否能够接活（每月需要更新）',
  `nextm_iswork` tinyint(5) unsigned NOT NULL COMMENT '设计师下个月是否能够接活（每月需要更新）',
  `nowork_time` varchar(10) NOT NULL COMMENT '设计师什么时间段不能接活（每月需要更新）',
  `now_customer` varchar(10) DEFAULT NULL COMMENT '设计师正在接洽的客户（每月需要更新）',
  `service_customer` varchar(10) DEFAULT NULL COMMENT '设计师正在服务的客户（每月需要更新）',
  `level` varchar(10) DEFAULT NULL COMMENT '设计师档次',
  `description1` text COMMENT '设计师个性描述1',
  `description2` text COMMENT '设计师个性描述2',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='设计师业务信息表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `zyj_designer_work`
--

INSERT INTO `zyj_designer_work` (`id`, `designer_id`, `category`, `city`, `customer`, `work_domain`, `service_type`, `butt_joint`, `docking_area`, `include_project`, `pay_extra`, `lower_price`, `accept_area`, `lower_centiare`, `charge`, `charge_ls100`, `charge_ls300`, `charge_gt300`, `mtc`, `style`, `month_iswork`, `nextm_iswork`, `nowork_time`, `now_customer`, `service_customer`, `level`, `description1`, `description2`) VALUES
(1, 1, '', '', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '123123', 1, 1, '123123', '', '', '', '', ''),
(2, 9, '2', '44', '4', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '444', 1, 1, '444', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `zyj_project`
--

CREATE TABLE IF NOT EXISTS `zyj_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uid` int(11) NOT NULL COMMENT '用户id',
  `province` int(11) NOT NULL COMMENT '省份',
  `city` int(11) NOT NULL COMMENT '城市',
  `house_type` tinyint(1) NOT NULL COMMENT '房子类型',
  `completion_time` tinyint(1) NOT NULL COMMENT '完工时间',
  `room_area` varchar(20) COLLATE utf8_estonian_ci NOT NULL COMMENT '房间使用面积',
  `budget_ceiling` varchar(20) COLLATE utf8_estonian_ci NOT NULL COMMENT '预算上限',
  `service_item` tinyint(4) NOT NULL COMMENT '服务的项目',
  `generic_require` tinyint(1) NOT NULL COMMENT '共性要求',
  `description` text COLLATE utf8_estonian_ci NOT NULL COMMENT '详细描述',
  `residential_district` varchar(20) COLLATE utf8_estonian_ci NOT NULL COMMENT '居住小区',
  `photo` varchar(255) COLLATE utf8_estonian_ci NOT NULL COMMENT '照片',
  `status` tinyint(1) NOT NULL COMMENT '状态',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  `updatetime` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci COMMENT='项目表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `zyj_project_photo`
--

CREATE TABLE IF NOT EXISTS `zyj_project_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(128) COLLATE utf8_estonian_ci NOT NULL COMMENT '名称',
  `url` varchar(128) COLLATE utf8_estonian_ci NOT NULL COMMENT '地址',
  `status` tinyint(1) NOT NULL COMMENT '状态',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci COMMENT='项目关联照片表' AUTO_INCREMENT=1 ;

--
-- 限制导出的表
--

--
-- 限制表 `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- 限制表 `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
