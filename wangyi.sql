-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015-12-25 15:38:21
-- 服务器版本: 5.5.46-0ubuntu0.14.04.2
-- PHP 版本: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `wangyi`
--

-- --------------------------------------------------------

--
-- 表的结构 `wy_category`
--

CREATE TABLE IF NOT EXISTS `wy_category` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` varchar(64) NOT NULL,
  `pid` smallint(5) unsigned NOT NULL,
  `sort` smallint(5) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='新闻分类表' AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `wy_category`
--

INSERT INTO `wy_category` (`id`, `name`, `description`, `pid`, `sort`, `created_at`, `updated_at`) VALUES
(2, '军事', '军事类新闻信息', 0, 0, 1447740069, 1447740069),
(3, '经济', '经济类型的新闻信息', 0, 0, 1447740111, 1447740111),
(8, '娱乐', '娱乐类新闻', 0, 0, 1447741202, 1447741980),
(7, '教育', '教育类的信息', 0, 0, 1447741050, 1447741050),
(9, '初中教育', '初中', 7, 0, 1447904637, 1447904637),
(10, '高中教育', '高中教育类新闻', 7, 0, 1447905070, 1447905553),
(11, '军事', '军事类的新闻信息', 2, 0, 1447906986, 1447906986),
(13, '影视娱乐', '影视新闻', 8, 0, 1447909944, 1447909944),
(14, '金融', '经济类新闻', 3, 0, 1447914035, 1447914035),
(15, '篮球', '篮球运动', 8, 0, 1450851697, 1450851697);

-- --------------------------------------------------------

--
-- 表的结构 `wy_comment`
--

CREATE TABLE IF NOT EXISTS `wy_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `news_id` int(11) unsigned NOT NULL COMMENT '外键news的id',
  `user_id` int(11) unsigned NOT NULL COMMENT '外键user的id',
  `username` varchar(32) NOT NULL,
  `content` text NOT NULL,
  `ip` varchar(15) NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='评论表' AUTO_INCREMENT=100 ;

--
-- 转存表中的数据 `wy_comment`
--

INSERT INTO `wy_comment` (`id`, `news_id`, `user_id`, `username`, `content`, `ip`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'admin', 'adfaasd', '', 1448418085, 1448418085),
(2, 2, 1, 'admin', 'adfaasd', '', 1448418105, 1448418105),
(3, 2, 1, 'admin', 'ssfaf', '', 1448418128, 1448418128),
(4, 2, 1, 'admin', '会报错吗', '', 1448418337, 1448418337),
(5, 2, 1, 'admin', '为什么会报错呢？\r\n', '', 1448418430, 1448418430),
(6, 1, 1, 'admin', '这里呢', '', 1448418559, 1448418559),
(7, 1, 1, 'admin', '这里呢', '', 1448418688, 1448418688),
(8, 1, 1, 'admin', '这样子了', '', 1448419690, 1448419690),
(9, 1, 1, 'admin', '这回怎可以了把\r\n', '', 1448420066, 1448420066),
(10, 1, 1, 'admin', '这回怎可以了把库\r\n', '', 1448420102, 1448420102),
(11, 1, 1, 'admin', '这回怎可以了吧\r\n', '', 1448420123, 1448420123),
(12, 1, 1, 'admin', '这回怎可以了吧！\r\n', '', 1448420263, 1448420263),
(13, 1, 1, 'admin', '阿达发', '', 1448420575, 1448420575),
(14, 1, 1, 'admin', 'johio', '', 1448421597, 1448421597),
(15, 1, 1, 'admin', 'johio', '', 1448421636, 1448421636),
(16, 1, 1, 'admin', 'johioasdf', '', 1448421648, 1448421648),
(17, 1, 1, 'admin', ']\r\npi[pu', '', 1448421862, 1448421862),
(18, 2, 1, 'admin', 'asdfs', '', 1448422168, 1448422168),
(19, 2, 1, 'admin', 'asdfs', '', 1448422172, 1448422172),
(20, 1, 1, 'admin', 'why', '', 1448423151, 1448423151),
(21, 1, 1, 'admin', 'whywhy', '', 1448423178, 1448423178),
(22, 1, 1, 'admin', 'whywhy1', '', 1448423721, 1448423721),
(23, 2, 1, 'admin', '15456', '', 1448423734, 1448423734),
(24, 2, 1, 'admin', '7983132', '', 1448423744, 1448423744),
(25, 2, 1, 'admin', '发广告更改', '', 1448425395, 1448425395),
(26, 1, 1, 'admin', '12一个', '', 1448425493, 1448425493),
(27, 1, 2, '网管', 'guagua', '', 1448425855, 1448425855),
(28, 1, 1, 'admin', 'adfaf', '', 1448507689, 1448507689),
(29, 1, 3, 'daniel', 'daniel', '', 1448508672, 1448508672),
(30, 1, 3, 'daniel', 'sdf', '', 1448511160, 1448511160),
(31, 1, 3, 'daniel', 'ddddddddd', '', 1448511211, 1448511211),
(32, 1, 3, 'daniel', 'sadfa', '', 1448511798, 1448511798),
(33, 1, 1, 'admin', 'tyutyghg', '', 1448513112, 1448513112),
(34, 1, 1, 'admin', 'dsgfgsd', '', 1448513405, 1448513405),
(35, 1, 1, 'admin', 'sfsfsdfsdf', '', 1448513419, 1448513419),
(36, 1, 1, 'admin', 'sdfs', '', 1448513461, 1448513461),
(37, 1, 1, 'admin', 'sdfsdfs', '', 1448513472, 1448513472),
(38, 1, 1, 'admin', 'sdfsdfasdfdsfasdfasd', '', 1448513476, 1448513476),
(39, 2, 1, 'admin', '你好啊', '', 1448517016, 1448517016),
(40, 1, 1, 'admin', '啊　啊', '', 1448517029, 1448517029),
(41, 1, 1, 'admin', '啊　啊　啊', '', 1448517095, 1448517095),
(42, 1, 1, 'admin', '阿三大赛发', '', 1448517102, 1448517102),
(43, 1, 3, 'daniel', 'ada', '', 1448517599, 1448517599),
(44, 1, 3, 'daniel', 'asdfas', '', 1448517612, 1448517612),
(45, 1, 3, 'daniel', 'afa', '', 1448517625, 1448517625),
(46, 1, 3, 'daniel', 'asfdsadf', '', 1448517641, 1448517641),
(47, 1, 3, 'daniel', '分页完成了\r\n', '', 1448531012, 1448531012),
(48, 1, 3, 'daniel', '这个时间怎么这样呢', '', 1448531047, 1448531047),
(49, 1, 3, 'daniel', 'ａａａ\r\n', '', 1448586857, 1448586857),
(50, 1, 3, 'daniel', '啊啊啊', '', 1448586864, 1448586864),
(56, 2, 3, 'daniel', 'kkkkk', '', 1448593244, 1448593244),
(57, 1, 5, 'qwert', 'fsdaf', '', 1448594661, 1448594661),
(55, 1, 1, 'admin', 'adsaffs', '', 1448592952, 1448592952),
(53, 1, 3, 'daniel', 'aaa', '', 1448587021, 1448587021),
(54, 1, 3, 'daniel', '睡得发', '', 1448589722, 1448589722),
(58, 1, 5, 'qwert', '阿凡', '', 1448605223, 1448605223),
(59, 1, 5, 'qwert', '看破库；', '', 1448605232, 1448605232),
(60, 1, 5, 'qwert', '睡得发', '', 1448605368, 1448605368),
(61, 1, 5, 'qwert', '46546', '', 1448606438, 1448606438),
(62, 1, 5, 'qwert', '撒阿达是否', '', 1448606445, 1448606445),
(63, 1, 5, 'qwert', '阿达发', '', 1448606451, 1448606451),
(64, 1, 5, 'qwert', '阿斯顿发', '', 1448606575, 1448606575),
(65, 1, 5, 'qwert', 'sss', '', 1448608583, 1448608583),
(66, 1, 5, 'qwert', '你好啊', '', 1448609216, 1448609216),
(67, 2, 5, 'qwert', '阿斯顿发送', '', 1448609237, 1448609237),
(68, 1, 5, 'qwert', 'asdfasdf', '127.0.0.1', 1448614977, 1448614977),
(69, 1, 5, 'qwert', 'agadsfgjhgj', '127.0.0.1', 1448614983, 1448614983),
(70, 1, 5, 'qwert', 'asdfsdfafsd', '127.0.0.1', 1448615189, 1448615189),
(71, 1, 5, 'qwert', '注入攻击\r\n', '127.0.0.1', 1448615203, 1448615203),
(72, 2, 5, 'qwert', '注入', '127.0.0.1', 1448615241, 1448615241),
(73, 1, 5, 'qwert', 'sadfas', '127.0.0.1', 1448854698, 1448854698),
(74, 1, 5, 'qwert', 'asdfsdfsda', '127.0.0.1', 1448854704, 1448854704),
(75, 1, 5, 'qwert', '<b>hi</b>', '127.0.0.1', 1448854724, 1448854724),
(76, 1, 5, 'qwert', '<script>alert(\\''hello\\'')</script>', '127.0.0.1', 1448854764, 1448854764),
(77, 1, 5, 'qwert', '&lt;h1&gt;nihao&lt;/h1&gt;&lt;script&gt;alert(''hello'')&lt;/script&gt;', '127.0.0.1', 1448855337, 1448855337),
(78, 1, 5, 'qwert', '&lt;script type = ''text/javascript''&gt;alert(''wqwe'');&lt;/script&gt;', '127.0.0.1', 1448862511, 1448862511),
(79, 1, 5, 'qwert', '&lt;h2&gt;nihapa;dfa&lt;/h2&gt;', '127.0.0.1', 1448862534, 1448862534),
(80, 2, 6, 'qwerty', 'zhuce', '127.0.0.1', 1448862696, 1448862696),
(81, 1, 7, 'leerais-1', 'aaaa', '127.0.0.1', 1448863079, 1448863079),
(82, 1, 7, 'leerais-1', 'asdf', '127.0.0.1', 1448865046, 1448865046),
(83, 1, 6, 'qwerty', 'asdfas', '127.0.0.1', 1448865677, 1448865677),
(84, 1, 6, 'qwerty', '阿达发', '127.0.0.1', 1448938478, 1448938478),
(85, 2, 6, 'qwerty', 'dfgsdfg', '127.0.0.1', 1448948775, 1448948775),
(86, 2, 1, 'admin1', 'asf', '127.0.0.1', 1449050189, 1449050189),
(87, 1, 1, 'admin', 'afsda', '127.0.0.1', 1449106488, 1449106488),
(88, 1, 1, 'admin', 'adfafds', '127.0.0.1', 1449106842, 1449106842),
(89, 1, 1, 'admin', 'asdfas', '127.0.0.1', 1449132454, 1449132454),
(90, 1, 1, 'admin', '<h1>a</h1>', '127.0.0.1', 1449132861, 1449132861),
(91, 1, 1, 'admin', '<script>alert(''adfas'')</script>', '127.0.0.1', 1449132894, 1449132894),
(92, 2, 1, 'admin', 'sdfsd', '127.0.0.1', 1449195632, 1449195632),
(93, 2, 1, 'admin', '<h1> hhh</h1>', '127.0.0.1', 1449195652, 1449195652),
(94, 4, 1, 'admin', 'adfaf', '127.0.0.1', 1450662629, 1450662629),
(95, 1, 2, 'adminm', 'sdfas', '127.0.0.1', 1450681123, 1450681123),
(96, 1, 2, 'adminm', '<h1>jiji\r\n</h1>', '127.0.0.1', 1450681149, 1450681149),
(97, 2, 2, 'adminm', 'adfs', '127.0.0.1', 1450681443, 1450681443),
(98, 4, 2, 'adminm', 'asdf', '127.0.0.1', 1450857495, 1450857495),
(99, 4, 2, 'adminm', '你好吗\r\n', '127.0.0.1', 1450857503, 1450857503);

-- --------------------------------------------------------

--
-- 表的结构 `wy_manager`
--

CREATE TABLE IF NOT EXISTS `wy_manager` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL COMMENT '外键user的id',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员表' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `wy_manager`
--

INSERT INTO `wy_manager` (`id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 0),
(2, 2, 1, 0, 0),
(3, 3, 2, 1450776433, 1450836362);

-- --------------------------------------------------------

--
-- 表的结构 `wy_news`
--

CREATE TABLE IF NOT EXISTS `wy_news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` smallint(5) unsigned NOT NULL,
  `title` varchar(64) NOT NULL,
  `description` varchar(64) NOT NULL,
  `content` text NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='新闻表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `wy_news`
--

INSERT INTO `wy_news` (`id`, `category_id`, `title`, `description`, `content`, `created_at`, `updated_at`) VALUES
(1, 3, '魅族５发布', '魅族新品发布会', '魅族又发布新品了，还特么长得有点像苹果', 1448009331, 1448009331),
(2, 3, '中国经济大减速', '中国经济软着陆', '评论称中国经济面临软着陆', 1448330530, 1448330530),
(3, 3, '经济', '经济', '经济', 1449742722, 1449742722),
(4, 3, '还是经济', '还是经济', '还是经济', 1449742870, 1449742870),
(5, 15, '姚明退役了', '姚明', '退役了，脚伤了', 1450857189, 1450857189);

-- --------------------------------------------------------

--
-- 表的结构 `wy_user`
--

CREATE TABLE IF NOT EXISTS `wy_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` char(60) NOT NULL,
  `email` varchar(64) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `updated_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `wy_user`
--

INSERT INTO `wy_user` (`id`, `username`, `password`, `email`, `status`, `updated_at`, `created_at`) VALUES
(1, 'admin', '6f58c52d73ad02c28ea0c7216c86b077', 'admin@email.com', 1, 1450920473, 1450662601),
(2, 'adminm', '6f58c52d73ad02c28ea0c7216c86b077', 'adminm@email.com', 1, 1450662928, 1450662928),
(3, 'qwert', '0a2ede56f6523e16b6a2794c26921580', 'qwert@email.com', 1, 1450681793, 1450681515);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
