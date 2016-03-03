-- phpMyAdmin SQL Dump
-- version 4.4.14.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-03-03 12:22:39
-- 服务器版本： 5.6.28-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eb_lms`
--

-- --------------------------------------------------------

--
-- 表的结构 `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `category_id` int(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `book_copies` int(11) NOT NULL,
  `book_pub` varchar(100) NOT NULL,
  `publisher_name` varchar(100) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `copyright_year` int(11) NOT NULL,
  `date_receive` varchar(20) NOT NULL,
  `date_added` datetime NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `category_id`, `author`, `book_copies`, `book_pub`, `publisher_name`, `isbn`, `copyright_year`, `date_receive`, `date_added`, `status`) VALUES
(1, '三体', 5, '刘慈欣', 1, '', ' 重庆出版社', '9787536692930', 2008, '', '2015-09-21 14:22:23', '新书'),
(2, '浪潮之巅', 1, '吴军', 2, '', '电子工业出版社', '9787121139512', 2011, '', '2015-09-21 14:46:18', '新书'),
(3, '黑客与画家', 1, 'Paul Graham ', 2, '', '人民邮电出版社', '9787115249494', 2011, '', '2015-09-21 14:49:29', '旧书'),
(4, 'JavaScript高级程序设计（第3版）', 2, 'Nicholas C. Zakas', 1, '', '人民邮电出版社', '9787115275790', 2012, '', '2015-09-21 14:50:58', '旧书'),
(5, 'HTTP权威指南', 4, 'David Gourley / Brian Totty ', 1, '', '人民邮电出版社', '9787115281487', 2012, '', '2015-09-21 14:52:40', '旧书'),
(6, 'JavaScript DOM编程艺术 （第2版）', 4, ' [英]Jeremy Keith / [加] Jeffrey Sambells ', 1, '', '人民邮电出版社', '9787115249999', 2011, '', '2015-09-21 14:54:09', '旧书'),
(7, '鸟哥的Linux私房菜 基础学习篇（第三版）', 10, ' 鸟哥 ', 1, '', ' 人民邮电出版社', '9787115226266', 2010, '', '2015-09-21 14:56:36', '旧书'),
(8, '史蒂夫·乔布斯传', 1, ' [美] 沃尔特·艾萨克森 ', 1, '', '中信出版社', '9787508630069', 2011, '', '2015-09-21 14:58:48', '旧书'),
(9, '写给大家看的设计书（第3版）', 9, '[美] Robin Williams', 1, '', '人民邮电出版社', '9787115188120', 2009, '', '2015-09-21 15:00:28', '旧书'),
(10, 'Web全栈工程师的自我修养', 4, '余果 ', 1, '', '人民邮电出版社', '9787115399021', 2015, '', '2015-09-21 15:02:17', '新书'),
(11, 'JavaScript语言精粹', 4, 'Douglas Crockford ', 1, '', ' 电子工业出版社', '9787121084379', 2009, '', '2015-09-21 15:03:27', '旧书'),
(12, 'JavaScript权威指南(第6版)', 4, ' David Flanagan', 1, '', '机械工业出版社华章公司', '9787111376613', 2012, '', '2015-09-21 15:05:35', '旧书'),
(13, '从0到1', 1, '彼得·蒂尔 / 布莱克·马斯特斯 ', 1, '', '中信出版股份有限公司', '9787508649719', 2015, '', '2015-09-23 13:02:12', '新书'),
(14, '创业维艰', 8, '本·霍洛维茨 Ben Horowitz', 1, '', '中信出版社', '9787508646640', 2015, '', '2015-09-23 13:03:41', '新书'),
(15, 'In The Plex', 1, 'Steven Levy', 1, '', 'Simon & Schuster', '9781416596585', 2011, '', '2015-09-23 13:06:51', '旧书'),
(16, '失控', 1, '[美] 凯文·凯利', 1, '', '新星出版社', '9787513300711', 2010, '', '2015-09-23 13:08:44', '新书'),
(17, '乌合之众：大众心理研究', 11, '(法)古斯塔夫.勒庞', 1, '', '中央编译出版社', '9787801093660', 1998, '', '2015-09-23 13:11:26', '旧书'),
(18, '技术元素', 1, '[美] 凯文·凯利', 1, '', '电子工业出版社', '9787121167331', 2012, '', '2015-09-23 13:12:49', '新书'),
(19, '文字设计的原理', 9, '(日)伊达千代 / (日)内藤孝彦', 2, '', '中信出版社', '9787508629919', 2011, '', '2015-09-23 14:42:28', '新书'),
(20, '精通CSS', 2, ' [英] Andy Budd / [英] Simon Collison / [英] Cameron ', 1, '', '人民邮电出版社', '9787115226730', 2010, '', '2015-09-24 21:15:33', '新书'),
(26, '疯狂Ajax讲义', 2, '李刚', 2, '', '电子工业出版社', '9787121084409', 2009, '', '2015-09-25 03:00:53', 'Archive'),
(27, '用AngularJS开发下一代Web应用', 2, '格林 (Green.B.)', 1, '', '电子工业出版社', '9787121215742', 2013, '', '2015-09-25 03:07:54', '新书'),
(28, '设计中的设计 | 全本', 9, '[日] 原研哉', 1, '', '广西师范大学出版社', '9787563394180', 2010, '', '2015-09-27 17:37:13', '新书');

-- --------------------------------------------------------

--
-- 表的结构 `book_sum`
--

CREATE TABLE IF NOT EXISTS `book_sum` (
  `id` int(50) NOT NULL,
  `data` int(50) DEFAULT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=675 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `book_sum`
--

INSERT INTO `book_sum` (`id`, `data`, `time`) VALUES
(671, 22, ''),
(672, 22, ''),
(673, 22, ''),
(674, 22, '');

-- --------------------------------------------------------

--
-- 表的结构 `borrow`
--

CREATE TABLE IF NOT EXISTS `borrow` (
  `borrow_id` int(11) NOT NULL,
  `member_id` bigint(50) NOT NULL,
  `date_borrow` varchar(100) NOT NULL,
  `due_date` varchar(100) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `borrow`
--

INSERT INTO `borrow` (`borrow_id`, `member_id`, `date_borrow`, `due_date`) VALUES
(1, 2, '2015-09-26 00:28:54', '29/09/2015'),
(2, 2, '2015-09-26 00:32:56', '29/09/2015'),
(3, 2, '2015-09-26 00:33:53', '30/09/2015'),
(4, 2, '2015-09-26 00:34:00', '30/09/2015'),
(5, 2, '2015-09-26 00:37:00', '30/09/2015'),
(6, 3, '2015-09-26 00:37:12', '29/09/2015'),
(7, 2, '2015-09-26 00:39:31', '29/09/2015'),
(8, 2, '2015-09-26 21:29:06', '30/09/2015'),
(9, 2, '2015-09-26 21:35:06', '29/09/2015'),
(10, 2, '2015-09-26 21:35:31', '28/09/2015'),
(11, 2, '2015-09-27 17:41:40', '29/09/2015'),
(12, 2, '2015-09-27 17:41:48', '29/09/2015'),
(13, 2, '2015-09-27 17:46:45', '30/09/2015'),
(14, 3, '2015-09-27 17:53:18', '29/09/2015'),
(15, 3, '2015-09-27 17:55:25', '29/09/2015'),
(16, 6, '2015-10-05 19:31:50', '13/10/2015'),
(17, 6, '2015-10-05 19:32:15', '13/10/2015'),
(18, 5, '2016-03-02 21:56:35', '09/03/2016');

-- --------------------------------------------------------

--
-- 表的结构 `borrowdetails`
--

CREATE TABLE IF NOT EXISTS `borrowdetails` (
  `borrow_details_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `borrow_id` int(11) NOT NULL,
  `borrower_name` varchar(50) NOT NULL,
  `borrow_status` varchar(50) NOT NULL,
  `date_return` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `borrowdetails`
--

INSERT INTO `borrowdetails` (`borrow_details_id`, `book_id`, `borrow_id`, `borrower_name`, `borrow_status`, `date_return`) VALUES
(1, 2, 1, '', 'returned', '2015-09-26 00:32:41'),
(2, 3, 1, '', 'returned', '2015-09-26 00:32:43'),
(3, 1, 2, '', 'returned', '2015-09-26 00:36:12'),
(4, 2, 2, '', 'returned', '2015-09-26 00:36:15'),
(5, 3, 3, '', 'returned', '2015-09-26 00:36:10'),
(6, 8, 4, '', 'returned', '2015-09-26 00:36:08'),
(7, 17, 5, '', 'returned', '2015-09-26 21:26:28'),
(8, 18, 5, '', 'returned', '2015-09-26 21:26:25'),
(9, 19, 5, '', 'returned', '2015-09-26 21:26:22'),
(10, 14, 6, '', 'returned', '2015-09-26 21:26:37'),
(11, 15, 6, '', 'returned', '2015-09-26 21:26:34'),
(12, 19, 6, '', 'returned', '2015-09-26 21:26:31'),
(13, 3, 7, '', 'returned', '2015-09-26 21:26:39'),
(14, 1, 8, '', 'returned', '2015-09-26 21:40:39'),
(15, 2, 8, '', 'returned', '2015-09-26 21:40:36'),
(16, 3, 9, '', 'returned', '2015-09-26 21:40:43'),
(17, 4, 9, '', 'returned', '2015-09-26 21:40:41'),
(18, 8, 10, '', 'returned', '2015-09-26 21:40:50'),
(19, 9, 10, '', 'returned', '2015-09-26 21:40:48'),
(20, 2, 11, '', 'returned', '2015-09-27 17:46:31'),
(21, 3, 11, '', 'returned', '2015-09-27 17:46:29'),
(22, 5, 12, '', 'returned', '2015-09-27 17:46:27'),
(23, 6, 12, '', 'returned', '2015-09-27 17:46:25'),
(24, 2, 13, '', 'returned', '2015-09-27 17:49:52'),
(25, 3, 13, '', 'returned', '2015-09-27 17:49:57'),
(26, 4, 13, '', 'returned', '2015-09-27 17:49:54'),
(27, 2, 14, '', 'returned', '2015-09-27 17:55:08'),
(28, 3, 14, '', 'returned', '2015-09-27 17:55:05'),
(29, 20, 15, '', 'returned', '2015-09-27 18:24:53'),
(30, 27, 15, '', 'returned', '2015-09-27 18:24:55'),
(31, 28, 15, '', 'returned', '2015-09-27 18:24:51'),
(32, 2, 16, '', 'returned', '2015-10-05 19:31:59'),
(33, 3, 16, '', 'returned', '2015-10-05 19:32:03'),
(34, 2, 17, '', 'returned', '2015-10-05 19:56:15'),
(35, 3, 17, '', 'returned', '2015-10-05 19:56:13'),
(36, 1, 18, '', 'pending', ''),
(37, 2, 18, '', 'pending', '');

--
-- 触发器 `borrowdetails`
--
DELIMITER $$
CREATE TRIGGER `tigger_dailysumup` BEFORE INSERT ON `borrowdetails`
 FOR EACH ROW Begin

INSERT INTO dailysumup_temp(summary_time)
VALUE(NOW());
 
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL,
  `classname` varchar(50) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`category_id`, `classname`) VALUES
(1, '互联网'),
(2, '编程语言'),
(3, '算法'),
(4, 'Web'),
(5, '文学'),
(6, '生活'),
(7, '文化'),
(8, '经济与管理'),
(9, '设计与用户体验'),
(10, '计算机与操作系统'),
(11, '社会心理学');

-- --------------------------------------------------------

--
-- 表的结构 `dailysumup_temp`
--

CREATE TABLE IF NOT EXISTS `dailysumup_temp` (
  `id` int(11) NOT NULL COMMENT '当天借阅条目编号',
  `borrow_id` int(11) NOT NULL COMMENT '借书条目',
  `summary_time` date NOT NULL,
  `sum_temp` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dailysumup_temp`
--

INSERT INTO `dailysumup_temp` (`id`, `borrow_id`, `summary_time`, `sum_temp`) VALUES
(1, 0, '2015-10-05', 0),
(2, 0, '2015-10-05', 0),
(3, 0, '2015-10-05', 0),
(4, 0, '2015-10-05', 0),
(5, 0, '2016-03-02', 0),
(6, 0, '2016-03-02', 0);

-- --------------------------------------------------------

--
-- 表的结构 `daily_sumup`
--

CREATE TABLE IF NOT EXISTS `daily_sumup` (
  `id` int(11) NOT NULL COMMENT '编号',
  `time` date NOT NULL COMMENT '统计日期',
  `sum_dnum` int(11) NOT NULL COMMENT '统计数量'
) ENGINE=InnoDB AUTO_INCREMENT=697 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `lost_book`
--

CREATE TABLE IF NOT EXISTS `lost_book` (
  `Book_ID` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `Member_No` varchar(50) NOT NULL,
  `Date Lost` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_number` varchar(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `year_level` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `open_id` varchar(60) DEFAULT NULL,
  `job_title` varchar(20) NOT NULL COMMENT '工作职称',
  `self_intro` varchar(100) NOT NULL COMMENT '相关描述信息'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sumup`
--

CREATE TABLE IF NOT EXISTS `sumup` (
  `id` int(11) NOT NULL COMMENT '统计条目',
  `sum_time` date NOT NULL COMMENT '统计时间',
  `sum_num` int(11) NOT NULL COMMENT '统计数量'
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL,
  `borrowertype` varchar(50) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `type`
--

INSERT INTO `type` (`id`, `borrowertype`) VALUES
(30, '成员'),
(31, '学生'),
(32, '老"湿"');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`) VALUES
(2, 'admin', 'admin', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_sum`
--
ALTER TABLE `book_sum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `borrowerid` (`member_id`),
  ADD KEY `borrowid` (`borrow_id`);

--
-- Indexes for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  ADD PRIMARY KEY (`borrow_details_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_id` (`category_id`),
  ADD KEY `classid` (`category_id`);

--
-- Indexes for table `dailysumup_temp`
--
ALTER TABLE `dailysumup_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_sumup`
--
ALTER TABLE `daily_sumup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lost_book`
--
ALTER TABLE `lost_book`
  ADD PRIMARY KEY (`Book_ID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `sumup`
--
ALTER TABLE `sumup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrowertype` (`borrowertype`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `book_sum`
--
ALTER TABLE `book_sum`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=675;
--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  MODIFY `borrow_details_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `dailysumup_temp`
--
ALTER TABLE `dailysumup_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '当天借阅条目编号',AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `daily_sumup`
--
ALTER TABLE `daily_sumup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',AUTO_INCREMENT=697;
--
-- AUTO_INCREMENT for table `lost_book`
--
ALTER TABLE `lost_book`
  MODIFY `Book_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sumup`
--
ALTER TABLE `sumup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '统计条目',AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
DELIMITER $$
--
-- 事件
--
CREATE DEFINER=`root`@`localhost` EVENT `auto_del_dailysumup` ON SCHEDULE EVERY 30 DAY STARTS '2015-09-26 21:16:00' ON COMPLETION NOT PRESERVE ENABLE DO delete from daily_sumup$$

CREATE DEFINER=`root`@`localhost` EVENT `Auto_dailysumup` ON SCHEDULE EVERY 1 DAY STARTS '2015-09-25 00:33:00' ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO daily_sumup(sum_dnum)
SELECT Count(*) FROM dailysumup_temp$$

CREATE DEFINER=`root`@`localhost` EVENT `auto_del` ON SCHEDULE EVERY 2 DAY STARTS '2015-09-26 00:32:00' ON COMPLETION NOT PRESERVE ENABLE DO delete from dailysumup_temp$$

CREATE DEFINER=`root`@`localhost` EVENT `auto_del_book_sum` ON SCHEDULE EVERY 30 DAY STARTS '2015-09-26 21:29:00' ON COMPLETION NOT PRESERVE ENABLE DO delete from book_sum$$

CREATE DEFINER=`root`@`localhost` EVENT `auto_sumup` ON SCHEDULE EVERY 1 DAY STARTS '2015-09-26 21:21:00' ON COMPLETION PRESERVE ENABLE DO INSERT INTO book_sum(data)
SELECT Count(*) FROM book WHERE STATUS !="Archive"$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
