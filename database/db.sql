-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 11, 2013 at 10:37 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `bakeryshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `IDAd` int(11) NOT NULL AUTO_INCREMENT,
  `LevelAD` int(1) NOT NULL,
  `UserAd` varchar(25) NOT NULL,
  `PassAd` varchar(32) NOT NULL,
  `NameAd` varchar(30) NOT NULL,
  `PhoneAd` varchar(20) NOT NULL,
  `EmailAd` varchar(50) NOT NULL,
  `StatusAd` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`IDAd`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`IDAd`, `LevelAD`, `UserAd`, `PassAd`, `NameAd`, `PhoneAd`, `EmailAd`, `StatusAd`) VALUES
(20, 2, 'lamdt', 'e10adc3949ba59abbe56e057f20f883e', 'Đặng Tùng Lâm', '01656666664', 'lamdt@familug.org', 1),
(3, 2, 'phamngoclong', '47abe9c8481f1d5163db2966c2860197', 'Phạm Ngọc Long', '01656666664', 'phamjngocjlong@gmail.com', 1),
(1, 1, 'ngoha', '4fa1ab658e1ec79ba3ee836cf8217014', 'Ngô Cẩm Hà', '0983733328', 'saclychan@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `adminfunction`
--

CREATE TABLE IF NOT EXISTS `adminfunction` (
  `IDAd` int(11) NOT NULL,
  `FID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adminfunction`
--

INSERT INTO `adminfunction` (`IDAd`, `FID`) VALUES
(20, 4),
(3, 1),
(2, 1),
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `CateID` int(11) NOT NULL AUTO_INCREMENT,
  `CateName` varchar(30) NOT NULL,
  `CateStatus` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`CateID`),
  FULLTEXT KEY `CateName` (`CateName`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CateID`, `CateName`, `CateStatus`) VALUES
(8, 'BirthDay Cakes', 1),
(9, 'Funny Cakes', 1),
(10, 'Special Cakes', 1),
(6, 'Bánh Mỹ', 1),
(13, 'Super Cake', 1),
(14, 'Mega cake', 1),
(15, 'Salamander Cake', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `ComID` int(11) NOT NULL AUTO_INCREMENT,
  `CusID` int(11) NOT NULL,
  `ProID` int(11) NOT NULL,
  `DateSend` datetime NOT NULL,
  `Content` text,
  `Status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ComID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=583 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`ComID`, `CusID`, `ProID`, `DateSend`, `Content`, `Status`) VALUES
(582, 25, 61, '2013-11-13 09:32:39', 'Mình đã đi ị đc 10 lần / ngày! Khỏi táo bón rồi!!!', 1),
(581, 23, 60, '2013-11-01 08:52:40', 'Ngon thật! M đã thử! Các bạn hãy thử cùng mình nhá ^^!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `counselors`
--

CREATE TABLE IF NOT EXISTS `counselors` (
  `conID` int(11) NOT NULL AUTO_INCREMENT,
  `conName` varchar(30) NOT NULL,
  `conPhone` varchar(15) NOT NULL,
  `conYahoo` varchar(50) NOT NULL,
  `conStatus` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`conID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `counselors`
--

INSERT INTO `counselors` (`conID`, `conName`, `conPhone`, `conYahoo`, `conStatus`) VALUES
(2, 'Phạm Ngọc Long', '0981819181', 'phamjngocjlong@yahaoo,com', 1),
(3, 'Prof.XXX', '+84-xxx-xxx', 'hungham2806@yahoo.com', 1),
(6, 'Đặng Tùng Lâm', '0912234568', 'lamdt', 1),
(7, 'Ngô Cẩm Hà', '0983733328', 'saclychan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `CusID` int(11) NOT NULL AUTO_INCREMENT,
  `RegDate` date NOT NULL,
  `CusUser` varchar(25) NOT NULL,
  `CusPass` varchar(32) NOT NULL,
  `CusName` varchar(50) NOT NULL,
  `CusPhone` varchar(30) DEFAULT NULL,
  `CusAdd` varchar(255) NOT NULL,
  `CusEmail` varchar(50) NOT NULL,
  `CusGender` tinyint(4) NOT NULL DEFAULT '1',
  `CusQues` tinyint(4) NOT NULL,
  `CusAns` varchar(250) NOT NULL,
  `CusStatus` tinyint(4) NOT NULL DEFAULT '1',
  `TotalPurchase` int(11) NOT NULL,
  `CusImage` varchar(100) DEFAULT 'default.png',
  PRIMARY KEY (`CusID`),
  UNIQUE KEY `CusUser` (`CusUser`),
  UNIQUE KEY `CusEmail` (`CusEmail`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CusID`, `RegDate`, `CusUser`, `CusPass`, `CusName`, `CusPhone`, `CusAdd`, `CusEmail`, `CusGender`, `CusQues`, `CusAns`, `CusStatus`, `TotalPurchase`, `CusImage`) VALUES
(23, '0000-00-00', 'ngocamha', '4fa1ab658e1ec79ba3ee836cf8217014', 'Ngô Cẩm Hà', '0983733328', 'Hà Tĩnh City', 'saclychan@gmail.com', 1, 5, 'tất nhiên là đẹp troai rồi', 1, 39504064, 'default.png'),
(25, '0000-00-00', 'hamgagent', 'e10adc3949ba59abbe56e057f20f883e', 'Họ và tên', '0983733330', '123 h', 'ham@shit.com', 1, 4, 'gái', 1, 14000, 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `function`
--

CREATE TABLE IF NOT EXISTS `function` (
  `FID` int(11) NOT NULL,
  `FName` varchar(100) NOT NULL,
  PRIMARY KEY (`FID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `function`
--

INSERT INTO `function` (`FID`, `FName`) VALUES
(1, 'Quản lý Bánh'),
(2, 'Quản lý Hóa đơn'),
(3, 'Quản lý khách hàng'),
(4, 'Quản lý tin tức, tin khuyến mãi'),
(5, 'Quản lý ý kiến khách hàng'),
(6, 'Quản lý mẹo vặt, hướng dẫn');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `imgID` int(11) NOT NULL AUTO_INCREMENT,
  `imgUrl` varchar(255) NOT NULL,
  `imgName` varchar(255) NOT NULL,
  PRIMARY KEY (`imgID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `images`
--


-- --------------------------------------------------------

--
-- Table structure for table `leadings`
--

CREATE TABLE IF NOT EXISTS `leadings` (
  `LeadID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `LeadName` varchar(225) NOT NULL,
  `LeadNote` varchar(500) NOT NULL,
  `LeadContent` longtext NOT NULL,
  `LeadImage` varchar(100) DEFAULT NULL,
  `LeadVideo` varchar(100) DEFAULT NULL,
  `LeadStatus` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`LeadID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `leadings`
--

INSERT INTO `leadings` (`LeadID`, `LeadName`, `LeadNote`, `LeadContent`, `LeadImage`, `LeadVideo`, `LeadStatus`) VALUES
(11, 'Tên gọi và phân biệt các loại bánh phương Tây', 'Người Việt thường hay gọi chung các loại bánh với nguyên liệu chính là bột mì và nướng trong lò nướng với những danh từ chung như bánh ngọt, bánh Âu. ', '<p>\r\n	<span id="1995918070947396145">Người Việt thường hay gọi chung c&aacute;c loại b&aacute;nh với nguy&ecirc;n liệu ch&iacute;nh l&agrave; bột m&igrave; v&agrave; nướng trong l&ograve; nướng với những danh từ chung như b&aacute;nh ngọt, b&aacute;nh &Acirc;u. </span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span id="1995918070947396145">C&aacute;c loại b&aacute;nh ngọt ng&agrave;y nay c&oacute; nguồn gốc từ phương T&acirc;y, cụ thể l&agrave; cả v&ugrave;ng ch&acirc;u &Acirc;u sau đ&oacute; sang Mỹ, chứ ko phải như nhiều người lầm tưởng Ph&aacute;p l&agrave; c&aacute;i n&ocirc;i bắt nguồn c&aacute;c sản phẩm b&aacute;nh m&igrave; b&aacute;nh ngọt. Nếu &quot;truy t&igrave;m&quot; nguồn gốc một c&aacute;ch chi li th&igrave; phải kể đến c&ocirc;ng lao của những người Ai Cập v&agrave; Hy Lạp cổ đ&atilde; ph&aacute;t minh ra l&ograve; nướng, v&agrave; h&agrave;ng thế kỉ sau, đ&oacute; l&agrave; c&ocirc;ng lao của tổ ti&ecirc;n người Rome.<br />\r\n	<br />\r\n	Trong b&agrave;i viết n&agrave;y m&igrave;nh cũng kh&ocirc;ng định t&igrave;m hiểu s&acirc;u xa g&igrave; về kh&iacute;a cạnh nguồn gốc lịch sử (vốn dốt sử v&agrave; chưa đọc được nhiều t&agrave;i liệu), m&agrave; chỉ d&aacute;m khi&ecirc;m tốn đưa ra những c&aacute;ch ph&acirc;n biệt cơ bản về t&ecirc;n gọi c&aacute;c loại b&aacute;nh &Acirc;u Mỹ vốn c&agrave;ng ng&agrave;y c&agrave;ng hấp dẫn với nhiều người Việt muốn được ăn thử v&agrave; l&agrave;m thử. M&igrave;nh cũng chỉ c&oacute; thể nhắc đến t&ecirc;n gọi chung của c&aacute;c loại b&aacute;nh quen thuộc, c&ograve;n t&ecirc;n gọi ri&ecirc;ng th&igrave; c&oacute; rất rất nhiều m&igrave;nh cũng kh&ocirc;ng thể biết được hết.<br />\r\n	<br />\r\n	Tất cả c&aacute;c sản phẩm li&ecirc;n quan đến việc sử dụng bột, trứng, chất b&eacute;o v&agrave; nướng l&ecirc;n được gọi chung l&agrave; PASTRY. V&igrave; thế, người đầu bếp chuy&ecirc;n phụ tr&aacute;ch việc l&agrave;m ra những sản phẩm n&agrave;y được gọi l&agrave; Pastry Chef. Từ &quot;cake&quot; m&agrave; người Việt hay gọi l&agrave; &quot;b&aacute;nh ngọt&quot; chỉ l&agrave; 1 mảng rất hẹp trong Pastry m&agrave; th&ocirc;i.<br />\r\n	<br />\r\n	1. Bread &ndash; B&aacute;nh m&igrave; </span></p>\r\n<p>\r\n	<span><img alt="Bánh mỳ" src="../images/l1.jpg" style="height: 250px; width: 291px; border-width: 0px; border-style: solid; margin-left: 0px; margin-right: 0px; float: left;" /></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span id="1995918070947396145">Ph&acirc;n biệt 2 loại:<br />\r\n	<br />\r\n	- B&aacute;nh m&igrave; thường: (lean yeast bread) th&agrave;nh phần chỉ c&oacute; bột v&agrave; nước, c&oacute; thể c&oacute; d&ugrave;ng men hoặc kh&ocirc;ng d&ugrave;ng men, v&igrave; thế c&oacute; loại b&aacute;nh m&igrave; cần qua qu&aacute; tr&igrave;nh ủ nở l&ecirc;n men v&agrave; c&oacute; loại kh&ocirc;ng qua qu&aacute; tr&igrave;nh n&agrave;y.<br />\r\n	<br />\r\n	- B&aacute;nh m&igrave; &quot;ngọt&quot;: (rich yeast bread) từ &quot;ngọt&quot; được dịch kh&aacute; phiến diện, đ&acirc;y l&agrave; những loại b&aacute;nh m&igrave; ngo&agrave;i bột, nước, men, c&oacute; sử dụng th&ecirc;m c&aacute;c th&agrave;nh phần kh&aacute;c như đường, chất b&eacute;o, sữa, bột sữa, v&igrave; thế b&aacute;nh m&igrave; c&oacute; th&ecirc;m nhiều m&ugrave;i vị thơm ngon v&agrave; kết cấu kh&aacute;c với b&aacute;nh m&igrave; thường.<br />\r\n	<br />\r\n	2. Quick bread &ndash; B&aacute;nh m&igrave; nhanh</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span><img alt="Bánh mì nhanh" dir="ltr" id="quick" longdesc="bánh ngon ngon" src="../images/l2.jpg" style="width: 376px; height: 250px;" /></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span id="1995918070947396145">- Đ&acirc;y l&agrave; t&ecirc;n gọi chung cho c&aacute;c loại b&aacute;nh-dạng-b&aacute;nh-m&igrave; nhưng kh&ocirc;ng qua c&ocirc;ng đoạn ủ v&agrave; l&ecirc;n men tự nhi&ecirc;n (khoảng v&agrave;i tiếng) m&agrave; d&ugrave;ng c&aacute;c chất h&oacute;a học g&acirc;y t&aacute;c dụng nở nhanh, v&igrave; thế l&agrave;m rất nhanh. Quick bread cũng thường c&oacute; kết cấu mềm hơn v&agrave; &quot;rich&quot; hơn, kh&ocirc;ng c&oacute; được độ dai như với b&aacute;nh m&igrave; nở bằng men tự nhi&ecirc;n.<br />\r\n	<br />\r\n	- Quick breads bao gồm c&aacute;c loại b&aacute;nh với t&ecirc;n gọi như: muffins, scones, loaf bread, coffee cakes.<br />\r\n	<br />\r\n	+ Muffins: c&oacute; dạng giống chiếc b&aacute;nh nhỏ h&igrave;nh cốc, c&oacute; thể được để trong cốc giấy hoặc kh&ocirc;ng cần. Muffins ngọt hoặc mặn đều c&oacute;.<br />\r\n	<br />\r\n	+ Scone: dạng h&igrave;nh n&oacute;n, h&igrave;nh tam gi&aacute;c bẹt.<br />\r\n	<br />\r\n	+ Loaf: h&igrave;nh khối chữ nhật<br />\r\n	<br />\r\n	+ Coffee cake: l&agrave;m với khu&ocirc;n tr&ograve;n, vu&ocirc;ng, chữ nhật, vv..<br />\r\n	<br />\r\n	3. B&aacute;nh kh&ocirc;ng d&ugrave;ng l&ograve; nướng:<br />\r\n	<br />\r\n	Đ&acirc;y l&agrave; những loại b&aacute;nh d&ugrave;ng phương ph&aacute;p r&aacute;n bằng chất b&eacute;o. C&aacute;c loại phổ biến:<br />\r\n	<br />\r\n	- Doughnuts (donut): b&aacute;nh ngọt c&oacute; h&igrave;nh b&aacute;nh xe tr&ograve;n, l&agrave;m ch&iacute;n bằng c&aacute;ch r&aacute;n ngập dầu.<br />\r\n	<br />\r\n	</span></p>\r\n<div align="center">\r\n	<span id="1995918070947396145"><img alt="" src="../images/l3.jpg" style="border-width: 0px; border-style: solid; width: 400px; height: 268px;" /></span></div>\r\n<div align="center">\r\n	&nbsp;</div>\r\n<div align="center">\r\n	&nbsp;</div>\r\n<div align="center">\r\n	<span id="1995918070947396145">- Pancake: b&aacute;nh r&aacute;n chảo l&agrave;m ch&iacute;n bằng c&aacute;ch qu&eacute;t lớp dầu/bơ mỏng l&ecirc;n mặt chảo, b&aacute;nh dẹt, mỏng.<br />\r\n	<br />\r\n	- Crepe: gần giống như pancake nhưng được tr&aacute;ng mỏng hơn rất nhiều.<br />\r\n	<br />\r\n	- Waffles: b&aacute;nh c&oacute; dạng mỏng, dẹt v&agrave; thường l&agrave;m v&agrave;o khu&ocirc;n ri&ecirc;ng.<br />\r\n	<br />\r\n	- Fritters: b&aacute;nh c&oacute; vị ngọt v&agrave; mặn t&ugrave;y nguy&ecirc;n liệu sử dụng, kh&ocirc;ng c&oacute; h&igrave;nh dạng cố định, l&agrave;m ch&iacute;n bằng r&aacute;n ngập dầu.<br />\r\n	<br />\r\n	</span>\r\n	<div align="center">\r\n		<span id="1995918070947396145"><img alt="" src="../images/l4.jpg" style="border-width: 0px; border-style: solid;" /></span></div>\r\n	<div align="center">\r\n		&nbsp;</div>\r\n	<div align="center">\r\n		4. Pie v&agrave; tart:<br />\r\n		<br />\r\n		Hai loại b&aacute;nh n&agrave;y dễ bị nhầm lẫn với nhau.<br />\r\n		<br />\r\n		- Pie: b&aacute;nh vỏ k&iacute;n c&oacute; chứa nh&acirc;n b&ecirc;n trong, tất cả gọi chung l&agrave; vỏ pie. Bột cho vỏ pie được chia l&agrave;m 2 phần, 1 phần c&aacute;n mỏng l&agrave;m đế, xếp nh&acirc;n b&ecirc;n trong, rồi phần c&ograve;n lại c&aacute;n mỏng phủ l&ecirc;n tr&ecirc;n, gắn k&iacute;n c&aacute;c m&eacute;p v&agrave; xi&ecirc;n thủng v&agrave;i chỗ tr&ecirc;n vỏ bề mặt để hơi tho&aacute;t ra trong qu&aacute; tr&igrave;nh nướng.<br />\r\n		<br />\r\n		<div align="center">\r\n			<img alt="" src="../images/l5.jpg" style="border-width: 0px; border-style: solid;" /></div>\r\n		<div align="center">\r\n			&nbsp;</div>\r\n		<div align="center">\r\n			<div align="center">\r\n				Pumpkin Pie</div>\r\n			<br />\r\n			- Tart: b&aacute;nh ko c&oacute; vỏ, nướng hở phần nh&acirc;n. Tart l&agrave; 1 dạng đặc biệt của pie m&agrave; ko cần 1 lớp vỏ bọc k&iacute;n nh&acirc;n.<br />\r\n			<br />\r\n			<div align="center">\r\n				<img alt="" src="../images/l6.jpg" style="border-width: 0px; border-style: solid; width: 400px; height: 400px;" /><br />\r\n				Belajar buat tart..???</div>\r\n		</div>\r\n	</div>\r\n</div>\r\n', '', NULL, 1),
(2, 'Tên gọi và phân biệt các loại bánh phương Tây', 'Người Việt thường hay gọi chung các loại bánh với nguyên liệu chính là bột mì và nướng trong lò nướng với những danh từ chung như bánh ngọt, bánh Âu', 'Người Việt thường hay gọi chung các loại bánh với nguyên liệu chính là bột mì và nướng trong lò nướng với những danh từ chung như bánh ngọt, bánh Âu. Các loại bánh ngọt ngày nay có nguồn gốc từ phương Tây, cụ thể là cả vùng châu Âu sau đó sang Mỹ, chứ ko phải như nhiều người lầm tưởng Pháp là cái nôi bắt nguồn các sản phẩm bánh mì bánh ngọt. Nếu "truy tìm" nguồn gốc một cách chi li thì phải kể đến công lao của những người Ai Cập và Hy Lạp cổ đã phát minh ra lò nướng, và hàng thế kỉ sau, đó là công lao của tổ tiên người Rome.\r\n\r\nTrong bài viết này mình cũng không định tìm hiểu sâu xa gì về khía cạnh nguồn gốc lịch sử (vốn dốt sử và chưa đọc được nhiều tài liệu), mà chỉ dám khiêm tốn đưa ra những cách phân biệt cơ bản về tên gọi các loại bánh Âu Mỹ vốn càng ngày càng hấp dẫn với nhiều người Việt muốn được ăn thử và làm thử. Mình cũng chỉ có thể nhắc đến tên gọi chung của các loại bánh quen thuộc, còn tên gọi riêng thì có rất rất nhiều mình cũng không thể biết được hết.\r\n\r\nTất cả các sản phẩm liên quan đến việc sử dụng bột, trứng, chất béo và nướng lên được gọi chung là PASTRY. Vì thế, người đầu bếp chuyên phụ trách việc làm ra những sản phẩm này được gọi là Pastry Chef. Từ "cake" mà người Việt hay gọi là "bánh ngọt" chỉ là 1 mảng rất hẹp trong Pastry mà thôi. \r\n1. Bread – Bánh mì \r\n\r\n', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `NewsId` int(11) NOT NULL AUTO_INCREMENT,
  `NewsContent` longtext NOT NULL,
  `NewsTitle` varchar(200) NOT NULL,
  `NewsNote` varchar(500) NOT NULL,
  `NewsDate` datetime NOT NULL,
  `NewsImage` varchar(100) NOT NULL,
  `NewsStatus` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`NewsId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`NewsId`, `NewsContent`, `NewsTitle`, `NewsNote`, `NewsDate`, `NewsImage`, `NewsStatus`) VALUES
(29, '<p>\r\n	Xibala xiboloXibala xiboloXibala xiboloXibala xiboloXibala xiboloXibala xiboloXibala xiboloXibala xiboloXibala xiboloXibala xiboloXibala xiboloXibala xiboloXibala xibolo</p>\r\n<p>\r\n	Xibala xiboloXibala xiboloXibala xiboloXibala xiboloXibala xiboloXibala xiboloXibala xiboloXibala xiboloXibala xiboloXibala xiboloXibala xiboloXibala xiboloXibala xibolo</p>\r\n', 'Xibala xibolo', '', '2013-11-03 04:29:59', 'bakery-3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE IF NOT EXISTS `orderdetail` (
  `OrdID` int(11) NOT NULL,
  `ProID` int(11) NOT NULL,
  `OdQty` int(11) NOT NULL,
  `OdPrice` double NOT NULL,
  PRIMARY KEY (`OrdID`,`ProID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`OrdID`, `ProID`, `OdQty`, `OdPrice`) VALUES
(100, 32, 2, 500000),
(100, 31, 1, 500000),
(101, 33, 1, 500000),
(102, 33, 1, 500000),
(103, 31, 5, 500000),
(104, 29, 1, 200000),
(105, 37, 5, 12500),
(106, 57, 2, 75000),
(107, 57, 6, 75000),
(107, 49, 3, 53000),
(107, 51, 2, 75000),
(108, 36, 3, 45000),
(109, 55, 1, 325000),
(110, 45, 1, 150000),
(111, 57, 2, 75000),
(112, 46, 2, 250000),
(113, 46, 6, 250000),
(113, 52, 4, 35000),
(114, 33, 7, 500000),
(114, 59, 4, 1000000),
(116, 26, 5, 500000),
(117, 30, 15, 345000),
(118, 59, 15, 1000000),
(119, 59, 20, 1000000),
(120, 59, 4, 1000000),
(121, 46, 3, 250000),
(122, 59, 3, 1000000),
(123, 58, 5, 300000),
(124, 46, 144, 250000),
(125, 33, 7, 500000),
(126, 59, 3, 1000000),
(127, 59, 3, 1000000),
(128, 58, 12, 300000),
(129, 59, 3, 1000000),
(130, 59, 4, 1000000),
(131, 59, 3, 1000000),
(132, 59, 3, 1000000),
(133, 59, 4, 1000000),
(134, 59, 5, 1000000),
(135, 59, 11, 1000000),
(136, 60, 1, 1000),
(137, 60, 3, 1000),
(138, 60, 1, 1000),
(139, 60, 13, 1000),
(140, 69, 4, 12),
(141, 61, 10, 2350000);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `OrdID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `OrdStatus` tinyint(4) NOT NULL,
  `OrdShipDate` date DEFAULT NULL,
  `OrdName` varchar(50) NOT NULL,
  `OrdAdd` varchar(50) NOT NULL,
  `OrdPhone` varchar(25) NOT NULL,
  `PayID` int(11) NOT NULL,
  `CusID` int(11) NOT NULL,
  PRIMARY KEY (`OrdID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=142 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrdID`, `Date`, `OrdStatus`, `OrdShipDate`, `OrdName`, `OrdAdd`, `OrdPhone`, `PayID`, `CusID`) VALUES
(141, '2013-11-04', 1, '2013-11-08', '', '', '', 2, 23),
(140, '2013-11-02', 1, '2013-11-15', '', '', '', 1, 23),
(138, '2013-11-13', 0, '0000-00-00', '', '', '', 2, 25),
(139, '2013-11-13', 0, '0000-00-00', '', '', '', 2, 25);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `PayID` int(11) NOT NULL AUTO_INCREMENT,
  `PayType` varchar(25) NOT NULL,
  PRIMARY KEY (`PayID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PayID`, `PayType`) VALUES
(1, 'Credist_Card'),
(2, 'Tiền mặt');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `ProID` int(11) NOT NULL AUTO_INCREMENT,
  `ProName` varchar(30) NOT NULL,
  `ProDesc` varchar(255) NOT NULL,
  `ProDate` date NOT NULL,
  `ProQty` int(11) NOT NULL,
  `ProPrice` float NOT NULL,
  `ProImage` varchar(200) NOT NULL,
  `ProWarranty` tinyint(4) NOT NULL,
  `ProStatus` tinyint(4) NOT NULL,
  `CateID` int(11) NOT NULL,
  PRIMARY KEY (`ProID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProID`, `ProName`, `ProDesc`, `ProDate`, `ProQty`, `ProPrice`, `ProImage`, `ProWarranty`, `ProStatus`, `CateID`) VALUES
(61, 'Tắc kè hoa', 'Bánh làm từ cứt thằn lằn hoa trộn tinh dầu ốc sên có tác dụng nhuận tràng.', '2013-11-01', 90, 2.35e+006, '20100905mbtcupcakehoaquanl2.jpg', 100, 1, 15),
(60, 'Shaporo Cakes', 'Ăn vào ngon lắm. Hà đã thử!', '2013-11-01', 12, 100000, '110225MBTocquesp2.jpg', 1, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `PromoID` int(11) NOT NULL AUTO_INCREMENT,
  `PromoTitle` varchar(200) NOT NULL,
  `PromoNote` varchar(500) NOT NULL,
  `PromoIcon` varchar(100) NOT NULL,
  `PromoContent` varchar(500) NOT NULL,
  `PromoStatus` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`PromoID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`PromoID`, `PromoTitle`, `PromoNote`, `PromoIcon`, `PromoContent`, `PromoStatus`) VALUES
(12, 'Xibala xibolo', '', 'bm1.jpg', '<p>\r\n	Xibala xibolo</p>\r\n<p>\r\n	Xibala xibolo</p>\r\n<p>\r\n	Xibala xibolo</p>\r\n<p>\r\n	Xibala xibolo</p>\r\n<p>\r\n	Xibala xibolo</p>\r\n<p>\r\n	Xibala xibolo</p>\r\n<p>\r\n	Xibala xibolo</p>\r\n<p>\r\n	Xibala xibolo</p>\r\n<p>\r\n	Xibala xibolo</p>\r\n<p>\r\n	Xibala xibolo</p>\r\n<p>\r\n	Xibala xibolo</p>\r\n<p>\r\n	Xibala xibolo</p>\r\n', 1);
