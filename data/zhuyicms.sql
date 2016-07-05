-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-07-05 05:49:41
-- 服务器版本： 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zhuyicms`
--

-- --------------------------------------------------------

--
-- 表的结构 `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('超级管理员', '1', 1467003072);

-- --------------------------------------------------------

--
-- 表的结构 `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
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
('/designer/add', 2, NULL, NULL, NULL, 1467003082, 1467003082),
('/designer/delete', 2, NULL, NULL, NULL, 1467003082, 1467003082),
('/designer/detail', 2, NULL, NULL, NULL, 1467003082, 1467003082),
('/designer/edit', 2, NULL, NULL, NULL, 1467003082, 1467003082),
('/designer/index', 2, NULL, NULL, NULL, 1467003082, 1467003082),
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
('/project/*', 2, NULL, NULL, NULL, 1467003082, 1467003082),
('/project/create', 2, NULL, NULL, NULL, 1467003082, 1467003082),
('/project/delete', 2, NULL, NULL, NULL, 1467003082, 1467003082),
('/project/index', 2, NULL, NULL, NULL, 1467003082, 1467003082),
('/project/update', 2, NULL, NULL, NULL, 1467003082, 1467003082),
('/project/view', 2, NULL, NULL, NULL, 1467003082, 1467003082),
('/site/*', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/site/error', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/site/index', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/site/login', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/site/logout', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/upload/*', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('/upload/upload', 2, NULL, NULL, NULL, 1466654499, 1466654499),
('超级管理员', 1, '超级管理员', NULL, NULL, 1466654830, 1467003513);

-- --------------------------------------------------------

--
-- 表的结构 `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('超级管理员', '/*'),
('超级管理员', '/admin/*'),
('超级管理员', '/admin/assignment/*'),
('超级管理员', '/admin/assignment/assign'),
('超级管理员', '/admin/assignment/index'),
('超级管理员', '/admin/assignment/revoke'),
('超级管理员', '/admin/assignment/view'),
('超级管理员', '/admin/default/*'),
('超级管理员', '/admin/default/index'),
('超级管理员', '/admin/menu/*'),
('超级管理员', '/admin/menu/create'),
('超级管理员', '/admin/menu/delete'),
('超级管理员', '/admin/menu/index'),
('超级管理员', '/admin/menu/update'),
('超级管理员', '/admin/menu/view'),
('超级管理员', '/admin/permission/*'),
('超级管理员', '/admin/permission/assign'),
('超级管理员', '/admin/permission/create'),
('超级管理员', '/admin/permission/delete'),
('超级管理员', '/admin/permission/index'),
('超级管理员', '/admin/permission/remove'),
('超级管理员', '/admin/permission/update'),
('超级管理员', '/admin/permission/view'),
('超级管理员', '/admin/role/*'),
('超级管理员', '/admin/role/assign'),
('超级管理员', '/admin/role/create'),
('超级管理员', '/admin/role/delete'),
('超级管理员', '/admin/role/index'),
('超级管理员', '/admin/role/remove'),
('超级管理员', '/admin/role/update'),
('超级管理员', '/admin/role/view'),
('超级管理员', '/admin/route/*'),
('超级管理员', '/admin/route/assign'),
('超级管理员', '/admin/route/create'),
('超级管理员', '/admin/route/index'),
('超级管理员', '/admin/route/refresh'),
('超级管理员', '/admin/route/remove'),
('超级管理员', '/admin/rule/*'),
('超级管理员', '/admin/rule/create'),
('超级管理员', '/admin/rule/delete'),
('超级管理员', '/admin/rule/index'),
('超级管理员', '/admin/rule/update'),
('超级管理员', '/admin/rule/view'),
('超级管理员', '/admin/user/*'),
('超级管理员', '/admin/user/activate'),
('超级管理员', '/admin/user/change-password'),
('超级管理员', '/admin/user/delete'),
('超级管理员', '/admin/user/index'),
('超级管理员', '/admin/user/login'),
('超级管理员', '/admin/user/logout'),
('超级管理员', '/admin/user/request-password-reset'),
('超级管理员', '/admin/user/reset-password'),
('超级管理员', '/admin/user/signup'),
('超级管理员', '/admin/user/view'),
('超级管理员', '/debug/*'),
('超级管理员', '/debug/default/*'),
('超级管理员', '/debug/default/db-explain'),
('超级管理员', '/debug/default/download-mail'),
('超级管理员', '/debug/default/index'),
('超级管理员', '/debug/default/toolbar'),
('超级管理员', '/debug/default/view'),
('超级管理员', '/designer/*'),
('超级管理员', '/designer/add'),
('超级管理员', '/designer/delete'),
('超级管理员', '/designer/detail'),
('超级管理员', '/designer/edit'),
('超级管理员', '/designer/index'),
('超级管理员', '/gii/*'),
('超级管理员', '/gii/default/*'),
('超级管理员', '/gii/default/action'),
('超级管理员', '/gii/default/diff'),
('超级管理员', '/gii/default/index'),
('超级管理员', '/gii/default/preview'),
('超级管理员', '/gii/default/view'),
('超级管理员', '/index/*'),
('超级管理员', '/index/index'),
('超级管理员', '/login/*'),
('超级管理员', '/login/captcha'),
('超级管理员', '/login/index'),
('超级管理员', '/login/logout'),
('超级管理员', '/project/*'),
('超级管理员', '/project/create'),
('超级管理员', '/project/delete'),
('超级管理员', '/project/index'),
('超级管理员', '/project/update'),
('超级管理员', '/project/view'),
('超级管理员', '/site/*'),
('超级管理员', '/site/error'),
('超级管理员', '/site/index'),
('超级管理员', '/site/login'),
('超级管理员', '/site/logout'),
('超级管理员', '/upload/*'),
('超级管理员', '/upload/upload');

-- --------------------------------------------------------

--
-- 表的结构 `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `menu`
--

INSERT INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
(1, '设计师管理', NULL, NULL, NULL, 0x7b2269636f6e223a202266612066612d65646974222c202276697369626c65223a20747275657d),
(2, '设计师列表', 1, '/designer/index', NULL, NULL),
(3, '添加设计师', 1, '/designer/add', NULL, NULL),
(4, '项目管理', NULL, NULL, NULL, 0x7b2269636f6e223a202266612066612d7468222c202276697369626c65223a20747275657d),
(5, '项目列表', 4, '/project/index', NULL, NULL),
(6, '首页管理', NULL, NULL, NULL, 0x7b2269636f6e223a202266612066612d686f6d65222c202276697369626c65223a20747275657d);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL COMMENT '自增id',
  `user_name` varchar(32) NOT NULL COMMENT '用户名(邮箱)',
  `pwd` varchar(65) NOT NULL COMMENT '密码',
  `nick_name` varchar(32) NOT NULL COMMENT '昵称',
  `mobile` varchar(32) NOT NULL COMMENT '电话',
  `email` varchar(65) NOT NULL COMMENT '邮箱',
  `status` tinyint(1) NOT NULL COMMENT '状态 启用 未启用',
  `create_time` int(11) NOT NULL COMMENT '注册时间',
  `update_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- 转存表中的数据 `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `pwd`, `nick_name`, `mobile`, `email`, `status`, `create_time`, `update_time`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '18210189803', 'yhl27ml@163.com', 1, 1462699058, 0),
(2, 'yhl27ml@126.com', 'e10adc3949ba59abbe56e057f20f883e', '小神龙', '192101892', 'yhl27ml@126.com', 1, 1462845591, 0),
(4, 'yhl27ml@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '小白白', '', 'yhl27ml@gmail.com', 1, 1464086505, 0),
(5, '627704769@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '远古的呼唤', '', '627704769@qq.com', 1, 1464087110, 0);

-- --------------------------------------------------------

--
-- 表的结构 `zyj_designer_additional`
--

CREATE TABLE `zyj_designer_additional` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID主键',
  `designer_id` int(10) UNSIGNED NOT NULL COMMENT '设计师ID',
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
  `bank` varchar(15) NOT NULL COMMENT '设计师开户银行'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='设计师附加信息表';

-- --------------------------------------------------------

--
-- 表的结构 `zyj_designer_basic`
--

CREATE TABLE `zyj_designer_basic` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID主键自增',
  `sign` tinyint(1) UNSIGNED DEFAULT NULL COMMENT '设计师签约状态0ture,1false',
  `status` varchar(11) DEFAULT NULL COMMENT '设计师的接洽状态',
  `picture` varchar(50) DEFAULT NULL COMMENT '设计师头像',
  `service_pre` varchar(11) NOT NULL COMMENT '设计师洽谈人员',
  `name` varchar(11) NOT NULL COMMENT '设计师姓名',
  `tag` varchar(11) DEFAULT NULL COMMENT '设计师标签以逗号隔开',
  `sex` tinyint(1) UNSIGNED NOT NULL COMMENT '设计师性别',
  `birth` varchar(11) NOT NULL COMMENT '设计师出生日期',
  `job_year` varchar(11) NOT NULL COMMENT '设计师从业年限',
  `company` varchar(11) NOT NULL COMMENT '设计师所属机构',
  `ever_office` varchar(11) NOT NULL COMMENT '设计师以往服务的大事务所',
  `alma_mater` varchar(11) DEFAULT NULL COMMENT '设计师毕业院校',
  `winning` text COMMENT '获奖经历'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='设计师基本信息表';

--
-- 转存表中的数据 `zyj_designer_basic`
--

INSERT INTO `zyj_designer_basic` (`id`, `sign`, `status`, `picture`, `service_pre`, `name`, `tag`, `sex`, `birth`, `job_year`, `company`, `ever_office`, `alma_mater`, `winning`) VALUES
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

CREATE TABLE `zyj_designer_work` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID主键',
  `designer_id` int(10) UNSIGNED NOT NULL COMMENT '设计师ID',
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
  `month_iswork` tinyint(5) UNSIGNED NOT NULL COMMENT '设计师本月是否能够接活（每月需要更新）',
  `nextm_iswork` tinyint(5) UNSIGNED NOT NULL COMMENT '设计师下个月是否能够接活（每月需要更新）',
  `nowork_time` varchar(10) NOT NULL COMMENT '设计师什么时间段不能接活（每月需要更新）',
  `now_customer` varchar(10) DEFAULT NULL COMMENT '设计师正在接洽的客户（每月需要更新）',
  `service_customer` varchar(10) DEFAULT NULL COMMENT '设计师正在服务的客户（每月需要更新）',
  `level` varchar(10) DEFAULT NULL COMMENT '设计师档次',
  `description1` text COMMENT '设计师个性描述1',
  `description2` text COMMENT '设计师个性描述2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='设计师业务信息表';

--
-- 转存表中的数据 `zyj_designer_work`
--

INSERT INTO `zyj_designer_work` (`id`, `designer_id`, `category`, `city`, `customer`, `work_domain`, `service_type`, `butt_joint`, `docking_area`, `include_project`, `pay_extra`, `lower_price`, `accept_area`, `lower_centiare`, `charge`, `charge_ls100`, `charge_ls300`, `charge_gt300`, `mtc`, `style`, `month_iswork`, `nextm_iswork`, `nowork_time`, `now_customer`, `service_customer`, `level`, `description1`, `description2`) VALUES
(2, 9, '2', '44', '4', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '444', 1, 1, '444', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `zyj_project`
--

CREATE TABLE `zyj_project` (
  `project_id` int(11) NOT NULL COMMENT 'ID',
  `user_id` int(11) NOT NULL COMMENT '用户id',
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
  `updatetime` int(11) NOT NULL COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci COMMENT='项目表';

-- --------------------------------------------------------

--
-- 表的结构 `zyj_project_photo`
--

CREATE TABLE `zyj_project_photo` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `name` varchar(128) COLLATE utf8_estonian_ci NOT NULL COMMENT '名称',
  `url` varchar(128) COLLATE utf8_estonian_ci NOT NULL COMMENT '地址',
  `status` tinyint(1) NOT NULL COMMENT '状态',
  `createtime` int(11) NOT NULL COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci COMMENT='项目关联照片表';

-- --------------------------------------------------------

--
-- 表的结构 `zy_images`
--

CREATE TABLE `zy_images` (
  `image_id` int(10) UNSIGNED NOT NULL COMMENT 'ID主键',
  `category` varchar(50) NOT NULL COMMENT '图片类型（头像，附件，效果图区分用户和设计师的）user_logo,',
  `url` varchar(50) NOT NULL COMMENT '图片地址',
  `related_id` int(11) UNSIGNED NOT NULL COMMENT '对应的客户ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='图片附件表';

--
-- 转存表中的数据 `zy_images`
--

INSERT INTO `zy_images` (`image_id`, `category`, `url`, `related_id`) VALUES
(1, 'user_logo', '#', 1),
(2, 'user_image', '123', 0);

-- --------------------------------------------------------

--
-- 表的结构 `zy_order`
--

CREATE TABLE `zy_order` (
  `order_id` int(10) UNSIGNED NOT NULL COMMENT 'ID主键',
  `user_id` int(10) UNSIGNED NOT NULL COMMENT '用户ID',
  `project_id` int(10) UNSIGNED NOT NULL COMMENT '项目ID',
  `status` int(11) NOT NULL COMMENT '订单状态',
  `appointment_location` varchar(50) DEFAULT NULL COMMENT '约见地点',
  `appointment_time` int(10) UNSIGNED NOT NULL COMMENT '约见时间',
  `remark` varchar(100) DEFAULT NULL COMMENT '订单备注',
  `service_type` varchar(50) DEFAULT NULL COMMENT '服务类型',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建订单',
  `update_time` int(10) UNSIGNED NOT NULL COMMENT '修改时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单表';

-- --------------------------------------------------------

--
-- 表的结构 `zy_style`
--

CREATE TABLE `zy_style` (
  `style_id` int(10) UNSIGNED NOT NULL COMMENT 'ID主键',
  `user_id` int(10) UNSIGNED NOT NULL COMMENT '用户ID',
  `type` varchar(200) DEFAULT NULL COMMENT '测试后的风格json'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='风格报告表';

--
-- 转存表中的数据 `zy_style`
--

INSERT INTO `zy_style` (`style_id`, `user_id`, `type`) VALUES
(1, 0, '北欧风格烦烦烦'),
(2, 0, '1232'),
(3, 0, '哈哈哈'),
(4, 1, '["6","\\u65e5\\u5f0f","5","\\u4e2d\\u5f0f","4","\\u5730\\u4e2d\\u6d77\\/\\u4e61\\u6751"]'),
(5, 1, '["6","\\u65e5\\u5f0f","5","\\u4e2d\\u5f0f","4","\\u5730\\u4e2d\\u6d77\\/\\u4e61\\u6751"]'),
(6, 1, '[""]');

-- --------------------------------------------------------

--
-- 表的结构 `zy_user`
--

CREATE TABLE `zy_user` (
  `user_id` int(11) NOT NULL,
  `project_id` int(11) UNSIGNED DEFAULT NULL COMMENT '需求ID',
  `style_id` int(10) UNSIGNED DEFAULT NULL COMMENT '风格报告ID',
  `favored_designer_ids` varchar(100) DEFAULT NULL COMMENT '收藏的设计师ID 以逗号隔开',
  `user_name` varchar(32) NOT NULL,
  `nickname` varchar(30) DEFAULT NULL COMMENT '用户昵称',
  `phone` int(10) UNSIGNED NOT NULL COMMENT '手机号',
  `email` varchar(256) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '10',
  `profession` varchar(50) DEFAULT NULL COMMENT '职业',
  `address` varchar(100) DEFAULT NULL COMMENT '住址',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `zy_video`
--

CREATE TABLE `zy_video` (
  `video_id` int(10) UNSIGNED NOT NULL COMMENT '视频ID',
  `video_url` varchar(100) NOT NULL COMMENT '视频URL',
  `video_image` varchar(100) DEFAULT NULL COMMENT '视频封面图',
  `designer_id` int(10) UNSIGNED NOT NULL COMMENT '设计师ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='视频表';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `zyj_designer_additional`
--
ALTER TABLE `zyj_designer_additional`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zyj_designer_basic`
--
ALTER TABLE `zyj_designer_basic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zyj_designer_work`
--
ALTER TABLE `zyj_designer_work`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zyj_project`
--
ALTER TABLE `zyj_project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `zyj_project_photo`
--
ALTER TABLE `zyj_project_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zy_images`
--
ALTER TABLE `zy_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `zy_order`
--
ALTER TABLE `zy_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `zy_style`
--
ALTER TABLE `zy_style`
  ADD PRIMARY KEY (`style_id`);

--
-- Indexes for table `zy_user`
--
ALTER TABLE `zy_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `zy_video`
--
ALTER TABLE `zy_video`
  ADD PRIMARY KEY (`video_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id', AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `zyj_designer_additional`
--
ALTER TABLE `zyj_designer_additional`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID主键';
--
-- 使用表AUTO_INCREMENT `zyj_designer_basic`
--
ALTER TABLE `zyj_designer_basic`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID主键自增', AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `zyj_designer_work`
--
ALTER TABLE `zyj_designer_work`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID主键', AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `zyj_project`
--
ALTER TABLE `zyj_project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID';
--
-- 使用表AUTO_INCREMENT `zyj_project_photo`
--
ALTER TABLE `zyj_project_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID';
--
-- 使用表AUTO_INCREMENT `zy_images`
--
ALTER TABLE `zy_images`
  MODIFY `image_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID主键', AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `zy_order`
--
ALTER TABLE `zy_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID主键';
--
-- 使用表AUTO_INCREMENT `zy_style`
--
ALTER TABLE `zy_style`
  MODIFY `style_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID主键', AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `zy_user`
--
ALTER TABLE `zy_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `zy_video`
--
ALTER TABLE `zy_video`
  MODIFY `video_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '视频ID';
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
