-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for admin_paper_size
CREATE DATABASE IF NOT EXISTS `admin_paper_size` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `admin_paper_size`;

-- Dumping structure for table admin_paper_size.amenties
CREATE TABLE IF NOT EXISTS `amenties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table admin_paper_size.amenties: ~4 rows (approximately)
DELETE FROM `amenties`;
/*!40000 ALTER TABLE `amenties` DISABLE KEYS */;
INSERT INTO `amenties` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'City 1', '2018-04-01 11:04:22', '2020-02-16 17:04:59', '2020-02-16 17:04:59'),
	(2, 'wifi', '2018-04-01 11:10:22', '2020-02-16 18:11:04', '2020-02-16 18:11:04'),
	(3, 'C', '2018-04-01 19:56:49', '2020-02-16 17:16:54', NULL),
	(23, 'lol', '2020-02-16 16:59:46', '2020-02-16 17:04:29', NULL),
	(24, 'kjk', '2020-02-16 18:12:55', '2020-02-16 18:12:55', NULL);
/*!40000 ALTER TABLE `amenties` ENABLE KEYS */;

-- Dumping structure for table admin_paper_size.bookmarked
CREATE TABLE IF NOT EXISTS `bookmarked` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table admin_paper_size.bookmarked: ~0 rows (approximately)
DELETE FROM `bookmarked`;
/*!40000 ALTER TABLE `bookmarked` DISABLE KEYS */;
/*!40000 ALTER TABLE `bookmarked` ENABLE KEYS */;

-- Dumping structure for table admin_paper_size.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `show_nav` tinyint(4) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `show_nav` (`show_nav`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table admin_paper_size.categories: ~20 rows (approximately)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `description`, `show_nav`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'A', 'a', '', '<p>The dimensions of the A series paper sizes are defined by the ISO 216 international paper size standard. The A series was adopted in Europe in the 19th century, and is currently used all around the world, apart from in the USA and Canada. The most common paper size used in English speaking countries around the world is A4, which is 210mm x 297mm (8.27 inches x 11.7 inches). The largest sheet from the A series is the A0 size of paper. It has an area of 1m2, and the dimensions are 841mm x 1189mm. The A series uses an aspect ratio of 1:√2, and other sizes in the series are defined by folding the paper in half, parallel to its smaller sides. For example, cutting an A4 in half, will create an two A5 sheets, and so forth. Any size of brochure can be made using paper from the next larger size, for example A3 sheets are folded to make A4 brochures. The standard lengths and widths of the A series are rounded to the nearest millimetre.<br></p>', 1, '2018-04-01 11:04:22', '2020-02-16 17:12:42', NULL),
	(2, 'B', 'b', '', '<p>The dimensions of the B series paper sizes are defined by the ISO 216 international paper size standard. The B series is not as common as the A series. It was created to provide paper sizes that were not included in the A series. The B series uses an aspect ratio of 1:√2. The area of the B series paper sheets is the geometric mean of the A series sheets. For example, B1 is between A0 and A1 in size. While the B series is less common in office use, it is more regularly used in other special situations, such as posters, books, envelopes and passports.<br></p>', 1, '2018-04-01 11:10:22', '2018-04-01 17:31:47', NULL),
	(3, 'C', 'c', '', '<p>The dimensions of the C series sizes are defined by the ISO 269 paper size standard. The C series is most commonly used for envelopes. The area of C series paper is the geometric mean of the areas of the A and B series paper of the same number. For example, C4 has a bigger area than A4, but smaller area than B4. Therefore an A4 piece of paper will fit into a C4 envelope. The aspect ratio of C series envelopes is 1:√2, and this means that an A4 sheet of paper when folded in half, parallel to its smaller sides, will fit nicely into a C5 envelope. When it is folded twice, it will fit into a C6 envelope, and so on.<br></p>', 1, '2018-04-01 19:56:49', '2018-04-01 19:56:49', NULL),
	(4, 'US', 'us', '', '<p>Loose Sizes</p><p>Paper sizes in North America do not follow a logical system like the ISO standard does. They have their own system that they follow. This means that scaling the paper sizes is more difficult. The US Letter paper size is the most popular size used throughout the US. It is also commonly used in Chile and the Philippines.</p><p><br></p><p>ANSI</p><p>The American National Standards Institute (ANSI) adopted ANSI/ASME Y14.1, which defined a series of paper sizes in 1996, based on the standard 8.5 inches x 11 inches (216mm x 279mm) Letter size, which was named ‘ANSI A’. This series is fairly similar to the ISO standard, in that if you cut a sheet in half, you will product two sheets of the next smaller size. Ledger/Tabloid is known as ‘ANSI B’. The most common and widely used size is ANSI A, also known as ‘Letter’.</p><p><br></p><p>Architectural Sizes</p><p>The Architectural series (ARCH) is used by architects in North America, and they prefer to use this series instead of ANSI, because the aspect ratios are ratios of smaller whole numbers (4:3 and 3:2). The ARCH series of paper sizes is defined in the ANSI/ASME Y14.1 standard. The ARCH sizes are commonly used by architects for their large format drawings.</p>', 1, '2018-04-01 20:17:10', '2018-04-01 20:17:10', NULL),
	(5, 'US Envelope', 'us-envelope', '', '<p>There are three main types of envelopes used in the US and they do not correspond to the ISO standard of paper sizes. They are known as Commercial, Announcement and Catalog. Other less known styles of envelope are Baronial, Booklet and Square. To identify the difference between a ISO size and the US size, a hyphen is often inserted between the letter and number. For example, A2 becomes A-2.</p><p><br></p><p>Commercial envelopes, also referred to as Office envelopes, are most commonly used in business situations as they are suitable for automated franking and filling. They are long and thin, with an aspect ration of between 1:1.6 and 1:2.2. The most well known commercial envelope is No.10, as it is able to fit Letter size paper folded three times, or Legal size paper folded four times parallel to the shorter side.</p><p><br></p><p>Announcement envelopes, also known as A series envelopes, are used for greeting cards, invitations and photographs. Their aspect ratio ranges between 1:1.3 to 1:1.6, which makes them more of a square shape, rather than long and thin like the Commercial envelopes. The most popular announcement envelopes are Lady Grey (A2) and Diplomat (A9).</p><p><br></p><p>Catalog envelopes are most commonly used for catalogs, brochures, and are made with a center seam to make them more durable.Their aspect ratio ranges between 1:1.3 and 1:1.5, making them very similar shape to the announcement envelopes.</p>', 1, '2018-04-01 20:40:04', '2018-04-01 20:40:04', NULL),
	(6, 'Intl. Envelope', 'intl-envelope', '', '<p>The standard envelope sizes are defined by the international standard ISO 269. They are generally designed to be used with paper sizes that follow the ISO 216 standard. The most commonly used envelope sizes are from the C series. An A4 piece of paper will fit into a C4 envelope. The DL envelope has a different aspect ratio to the C series, which is why it does not appear in that series. The DL envelope is the most common envelope used in business. DL is short for ‘Dimension Lengthwise’, however it was previously known as DIN Lang in Germany where it originated in the 1920s. An A4 sheet of paper folded three times, parallel to its smaller sides, will fit into a DL envelope.<br></p>', 1, '2018-04-01 22:26:53', '2018-04-01 22:26:53', NULL),
	(7, 'Photography', 'photography', '', '<p>Standard photographic sizes are often named with a format ‘nR’, where the number ‘n’ represents the length of the shortest side in inches. In the normal series, the longest side is the length of the shortest side plus 2 inches, when it is 10 inches or less. When it is 11 inches and above, 3 inches is added to the shortest side. There is an alternative Super series, which is named with a format ‘SnR’. This series has an aspect ratio of approximately 3:2. The aspect ratios of photographic prints tend to vary, so exact scaling of prints is not always a possibility. The Japanese photographic standard are the same print sizes, but are known by different names. For example, the Japanese L corresponds to 3R, while 2L matches 5R.<br></p>', 1, '2018-04-01 22:41:46', '2018-04-02 10:27:21', NULL),
	(8, 'Canadian', 'canadian', '', '<p>The dimensions of the Canadian series paper sizes are defined by the CAN 2-9.60M Canadian paper size standard. These canadian paper sizes are the US ANSI paper sizes rounded to the nearest 5mm. The P series includes paper sizes P1 to P6, which corresponds to the ANSI A,B,C and D, as well as two additional sizes smaller than ANSI A. The sizes now appear to be no longer used and are obsolete. The Canadian P series doesn’t have a single aspect ratio like the ISO standard sizes, which makes enlarging and reducing the sizes harder. The Canadian P series are also occasionally referred to as PA1, PA2 etc.<br></p>', 1, '2018-04-01 22:51:21', '2018-04-01 22:51:21', NULL),
	(9, 'Japanese', 'japanese', '', '<p>The Japanese Industrial Standards (JIS), defines two main series of paper sizes. They are the JIS A Series, and the JIS B Series. Both of the these series are widely available in Japan, as well as China and Taiwan. The JIS A Series is exactly the same as the ISO A Series, but with different tolerances. Both the JIS A Series and the JIS B Series have the same aspect ratio, but the area of the B Series paper is 1.5 times larger than the A Series. As well as the JIS A and B Series, there are a number of traditional Japanese paper sizes used mostly by printers. These include Shiroku-ban and Kiku, which are the most commonly used.<br></p>', 1, '2018-04-01 23:11:55', '2018-04-02 10:27:23', NULL),
	(10, 'Books', 'books', '', '<p>There are a series of common terms to describe the sizes of modern books. These range from folio, which is the largest, to quarto, and octavo, which are respectively smaller. Book sizes are usually measured by the height and width of a leaf, or the height and width of its cover. The size and proportions of a book depends on the size of the original sheet of paper that was used to produce the book. The most common book sizes today are octavo and quarto. However, many books are still produced in larger and smaller sizes. There are some other terms for book sizes. These include elephant folio (up to 23 inches tall), atlas folio (25 inches tall), and a double elephant folio (50 inches tall). The B-format, such as the Penguin Classics, are 129mm by 198mm, which are a common paperback size in the UK.<br></p>', 1, '2018-04-01 23:30:26', '2018-04-02 10:27:24', NULL),
	(11, 'Business Card', 'business-card', '', '<p>The standard business card size used in Europe is 85mm x 55mm, which is a similar size to banking cards, making them easier to store. The standard business card size in the US and Canada is 3.5 inches x 2 inches (89mm x 51mm). It is fairly common nowadays to move away from the traditional rectangular business card, and be more creative by having square and rounded rectangular shapes. The business card based on the ISO 216 standard is the same size as A8 which is 74mm x 52mm.<br></p>', 1, '2018-04-01 23:41:18', '2020-02-15 16:46:23', NULL),
	(12, 'Newspaper', 'newspaper', '', '<p>There are many different newspaper formats, and they vary from country to country. The largest newspaper format is known as a Broadsheet, and takes its name from types of popular prints which are usually just on a single sheet containing different types of material and content. A broadsheet is known for having long vertical pages. Other popular newspaper formats include the Berliner and Tabloid, which are smaller than a Broadsheet.<br></p>', 1, '2018-04-01 23:45:33', '2020-02-15 16:46:25', NULL),
	(13, 'Chinese', 'chinese', '', '<p>The dimensions of the Chinese series paper sizes are defined by the GB/T 148-1997 Chinese paper size standard. This standard documents the ISO series, but it does not follow the same principles. Originating from the Republic of China, 1912-1949, the Chinese format is a custom series known as the D series. It is different from the D Series in Sweden. The aspect ratio is approximately √2. The longest side of a Chinese D Series is exactly two times larger than the short side of the next smallest size.<br></p>', 1, '2018-04-01 23:57:00', '2020-02-15 16:46:27', NULL),
	(14, 'Billboard', 'billboard', '', '<p>A billboard (or a hoarding) is a large structure used for advertising, and is usually placed outdoors in areas where there is a lot of traffic, such as busy roads. Billboards are used to advertise products to passing pedestrians and drivers, and are very effective, due to their size and positioning in designated market areas. Billboards have many standard sizes, and the names of the billboards originate from the old days when posters were made up of a specific number of panels. Popular billboard sizes start from ‘1 Sheet’ which is 508mm x 762mm, and one of the largest is ‘96 Sheet’ which is 12192mm x 3048mm (40ft x 10ft). The largest standard sized billboard is known as a Bulletin, and is 48ft x 14ft.<br></p>', 1, '2018-04-02 00:08:29', '2020-02-15 16:46:28', NULL),
	(15, 'Imperial', 'imperial', '', '<p>Before the United Kingdom adopted the ISO 216 standard, British Imperial paper sizes were used. The Imperial paper sizes were used to define large sheets of paper, and the naming convention was derived from the sheet name, and how many times it was folded. For example ‘Royal’ paper is 508mm x 635mm, and when it is folded three times, it makes 8 sheets and goes by the name ‘Royal Octavo’ which is 253 mm x 158 mm. This is a name given to modern hardbound books.<br></p>', 1, '2018-04-02 00:18:08', '2020-02-15 16:46:30', NULL),
	(16, 'Colombian', 'colombian', '', '<p>The dimensions of the Colombian series paper sizes are based on ISO B1 (707mm x 1000mm), which is referred to as pliego. These paper sizes are most commonly used for industrial and commercial printing. A fraction prefix is added for smaller sizes which are halved, e.g ½ pliego, ¼ pliego and ⅛ pliego. Other Colombian paper sizes include Carta, Oficio and Extra Tabloide.<br></p>', 1, '2018-04-02 00:41:44', '2020-02-15 16:46:31', NULL),
	(17, 'French', 'french', '', '<p>In 1967 France started using the ISO paper size standard. However before this, France had their own paper size system. The paper formats in this system follow the AFNOR standard which was established in 1926. Some of these paper formats are still used today. When the paper is handcrafted, they are branded with watermarks. The watermarks are where the names of the paper come from. Some of the formats are known as double and quadruple versions. An example of a double version is Carré (450mm x 560mm) and Grande Monde (900mm x 1260mm), whereby the smallest side is doubled. An example of a quadruple version is Cloche (300mm x 400mm) and Soleil (600mm x 800mm), whereby both sides are doubled.<br></p>', 1, '2018-04-02 00:45:59', '2020-02-15 16:46:38', NULL),
	(18, 'RAW', 'raw', '', '<p>The dimensions of the RAW series paper sizes are defined by the ISO 217:1995 paper size standard. The format consists of the RA series and the SRA series. RA stands for ‘Raw Format A’, and SRA stands for ‘Supplementary Raw Format A’. The untrimmed raw paper is used for commercial printing, and as it is slightly larger than the A series format, it allows the ink to bleed to the edge of the paper, before being cut to match the A format.<br></p>', 1, '2018-04-02 00:56:15', '2020-02-15 16:46:36', NULL),
	(19, 'Transitional', 'transitional', '', '<p>The transitional paper size formats consist of the PA Series and the F Series. The PA Series proposed to be included into the ISO 216 standard in 1975. They were rejected by the committee who decided that the number of standardised paper formats should be kept to a minimum. However this series is still used today, in particular PA4 (or L4). Its width is that of the ISO standard A4, and height of Canadian P4 (210mm x 280mm). The PA4 format can easily be printed on equipment designed for A4 or US Letter size, which is why it is used by many international magazines, and is a good solution as the format of presentation slides. PA4 is more of a page format than a paper size. It has a 4:3 aspect ratio when in landscape orientation.</p><p><br></p><p>In Southeast Asia, a common size used is the non-standard F4. The longer side is 330mm, which is the same as the British Foolscap. The shorter side is 210mm, which is the same as the ISO A4. The F4 is occasionally known as (metric) Foolscap or Folio.</p>', 1, '2018-04-02 01:02:57', '2020-02-15 16:46:35', NULL),
	(20, 'Traditional British', 'traditional-british', '', '<p>When the United Kingdom started using ISO sizes, the traditional paper sizes were no longer commonly used. Most of the traditional sizes were used in the production of books, and were never used for other stationery purposes. ‘Folio’ or ‘Foolscap’ is an alias for Foolscap Folio, as is ‘Kings’ being an alias for ‘Foolscap Quarto’.<br></p>', 1, '2018-04-02 01:16:06', '2020-02-15 16:46:40', NULL),
	(21, 'asdasd', 'asdasd', NULL, '<p>asdasd</p>', 0, '2020-02-15 17:30:41', '2020-02-15 17:30:41', NULL),
	(22, 'adsfsdfsdfsd', 'adsfsdfsdfsd', 'image1882562469.jpg', '<p>sdfsdf</p>', 0, '2020-02-15 17:33:30', '2020-02-15 17:33:45', NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table admin_paper_size.catpaper
CREATE TABLE IF NOT EXISTS `catpaper` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `paper_id` float NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- Dumping data for table admin_paper_size.catpaper: ~41 rows (approximately)
DELETE FROM `catpaper`;
/*!40000 ALTER TABLE `catpaper` DISABLE KEYS */;
INSERT INTO `catpaper` (`id`, `cat_id`, `paper_id`, `created_at`, `updated_at`) VALUES
	(2, 2, 14, '2018-04-02 10:27:40', '2018-04-02 10:27:40'),
	(3, 2, 16, '2018-04-02 10:27:40', '2018-04-02 10:27:40'),
	(4, 2, 17, '2018-04-02 10:27:40', '2018-04-02 10:27:40'),
	(5, 2, 18, '2018-04-02 10:27:40', '2018-04-02 10:27:40'),
	(15, 4, 43, '2018-04-05 15:46:48', '2018-04-05 15:46:48'),
	(16, 4, 44, '2018-04-05 15:46:48', '2018-04-05 15:46:48'),
	(17, 4, 45, '2018-04-05 15:46:48', '2018-04-05 15:46:48'),
	(18, 5, 63, '2018-04-05 15:47:17', '2018-04-05 15:47:17'),
	(19, 5, 64, '2018-04-05 15:47:17', '2018-04-05 15:47:17'),
	(20, 5, 65, '2018-04-05 15:47:17', '2018-04-05 15:47:17'),
	(21, 5, 66, '2018-04-05 15:47:17', '2018-04-05 15:47:17'),
	(22, 6, 93, '2018-04-05 15:48:37', '2018-04-05 15:48:37'),
	(23, 6, 94, '2018-04-05 15:48:37', '2018-04-05 15:48:37'),
	(24, 6, 95, '2018-04-05 15:48:37', '2018-04-05 15:48:37'),
	(25, 6, 296, '2018-04-05 15:48:37', '2018-04-05 15:48:37'),
	(26, 6, 297, '2018-04-05 15:48:37', '2018-04-05 15:48:37'),
	(27, 9, 118, '2018-04-05 15:49:12', '2018-04-05 15:49:12'),
	(28, 9, 119, '2018-04-05 15:49:12', '2018-04-05 15:49:12'),
	(29, 9, 120, '2018-04-05 15:49:12', '2018-04-05 15:49:12'),
	(30, 9, 121, '2018-04-05 15:49:12', '2018-04-05 15:49:12'),
	(31, 9, 122, '2018-04-05 15:49:12', '2018-04-05 15:49:12'),
	(32, 7, 97, '2018-04-05 15:49:48', '2018-04-05 15:49:48'),
	(33, 7, 98, '2018-04-05 15:49:48', '2018-04-05 15:49:48'),
	(34, 7, 99, '2018-04-05 15:49:48', '2018-04-05 15:49:48'),
	(35, 7, 100, '2018-04-05 15:49:48', '2018-04-05 15:49:48'),
	(36, 8, 112, '2018-04-05 15:50:13', '2018-04-05 15:50:13'),
	(37, 8, 113, '2018-04-05 15:50:13', '2018-04-05 15:50:13'),
	(38, 8, 114, '2018-04-05 15:50:13', '2018-04-05 15:50:13'),
	(39, 8, 115, '2018-04-05 15:50:13', '2018-04-05 15:50:13'),
	(40, 10, 136, '2018-04-05 15:50:44', '2018-04-05 15:50:44'),
	(41, 10, 137, '2018-04-05 15:50:44', '2018-04-05 15:50:44'),
	(42, 10, 138, '2018-04-05 15:50:44', '2018-04-05 15:50:44'),
	(43, 1, 1, '2018-04-16 12:43:46', '2018-04-16 12:43:46'),
	(44, 1, 2, '2018-04-16 12:43:46', '2018-04-16 12:43:46'),
	(45, 1, 3, '2018-04-16 12:43:46', '2018-04-16 12:43:46'),
	(46, 1, 4, '2018-04-16 12:43:46', '2018-04-16 12:43:46'),
	(47, 3, 30, '2018-04-16 12:52:51', '2018-04-16 12:52:51'),
	(48, 3, 31, '2018-04-16 12:52:51', '2018-04-16 12:52:51'),
	(49, 3, 32, '2018-04-16 12:52:51', '2018-04-16 12:52:51'),
	(50, 3, 33, '2018-04-16 12:52:51', '2018-04-16 12:52:51'),
	(51, 3, 34, '2018-04-16 12:52:51', '2018-04-16 12:52:51');
/*!40000 ALTER TABLE `catpaper` ENABLE KEYS */;

-- Dumping structure for table admin_paper_size.city
CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `show_nav` tinyint(4) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `show_nav` (`show_nav`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table admin_paper_size.city: ~4 rows (approximately)
DELETE FROM `city`;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` (`id`, `name`, `slug`, `image`, `show_nav`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'City 1', 'a', '', 1, '2018-04-01 11:04:22', '2020-02-16 17:04:59', '2020-02-16 17:04:59'),
	(2, 'CIty 2', 'b', '', 0, '2018-04-01 11:10:22', '2020-02-16 17:16:49', NULL),
	(3, 'C', 'c', '', 0, '2018-04-01 19:56:49', '2020-02-16 17:16:54', NULL),
	(23, 'lol', 'lol', 'image1575332979.jpg', 0, '2020-02-16 16:59:46', '2020-02-16 17:04:29', NULL),
	(24, 'sdgsdg pass', 'sdgsdg-pass', NULL, 0, '2020-02-16 18:11:55', '2020-02-16 18:11:55', NULL);
/*!40000 ALTER TABLE `city` ENABLE KEYS */;

-- Dumping structure for table admin_paper_size.listing
CREATE TABLE IF NOT EXISTS `listing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `website` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `video_url` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `social` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `validation_date` date DEFAULT NULL,
  `feature_image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_gallery` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table admin_paper_size.listing: ~0 rows (approximately)
DELETE FROM `listing`;
/*!40000 ALTER TABLE `listing` DISABLE KEYS */;
/*!40000 ALTER TABLE `listing` ENABLE KEYS */;

-- Dumping structure for table admin_paper_size.listing_amenities
CREATE TABLE IF NOT EXISTS `listing_amenities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) NOT NULL,
  `amenities_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table admin_paper_size.listing_amenities: ~0 rows (approximately)
DELETE FROM `listing_amenities`;
/*!40000 ALTER TABLE `listing_amenities` DISABLE KEYS */;
/*!40000 ALTER TABLE `listing_amenities` ENABLE KEYS */;

-- Dumping structure for table admin_paper_size.listing_business_hour
CREATE TABLE IF NOT EXISTS `listing_business_hour` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `close` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table admin_paper_size.listing_business_hour: ~0 rows (approximately)
DELETE FROM `listing_business_hour`;
/*!40000 ALTER TABLE `listing_business_hour` DISABLE KEYS */;
/*!40000 ALTER TABLE `listing_business_hour` ENABLE KEYS */;

-- Dumping structure for table admin_paper_size.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table admin_paper_size.migrations: ~2 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table admin_paper_size.page
CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table admin_paper_size.page: ~0 rows (approximately)
DELETE FROM `page`;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` (`id`, `name`, `slug`, `content`, `order`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'About', 'about', '<p>Test Content</p>', 10, 1, '2018-04-22 05:48:44', '2018-04-22 05:48:44', NULL);
/*!40000 ALTER TABLE `page` ENABLE KEYS */;

-- Dumping structure for table admin_paper_size.papersize
CREATE TABLE IF NOT EXISTS `papersize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `width` float NOT NULL,
  `height` float NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=309 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table admin_paper_size.papersize: ~308 rows (approximately)
DELETE FROM `papersize`;
/*!40000 ALTER TABLE `papersize` DISABLE KEYS */;
INSERT INTO `papersize` (`id`, `name`, `slug`, `cat_id`, `width`, `height`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'A0', 'a0', 1, 841, 1189, '<p>test</p>', '2018-04-01 11:05:18', '2018-04-16 12:34:03', NULL),
	(2, 'A1', 'a1', 1, 594, 841, '<p>Testing</p>', '2018-04-01 17:12:28', '2018-04-18 18:04:42', NULL),
	(3, 'A2', 'a2', 1, 420, 594, NULL, '2018-04-01 17:13:08', '2018-04-01 17:13:08', NULL),
	(4, 'A3', 'a3', 1, 297, 420, NULL, '2018-04-01 17:19:12', '2018-04-01 17:19:12', NULL),
	(5, 'A4', 'a4', 1, 210, 297, NULL, '2018-04-01 17:19:39', '2018-04-01 17:19:39', NULL),
	(6, 'A5', 'a5', 1, 148, 210, NULL, '2018-04-01 17:20:07', '2018-04-01 17:20:07', NULL),
	(7, 'A6', 'a6', 1, 105, 148, NULL, '2018-04-01 17:22:51', '2018-04-01 17:22:51', NULL),
	(8, 'A7', 'a7', 1, 74, 105, NULL, '2018-04-01 17:25:44', '2018-04-01 17:25:44', NULL),
	(9, 'A8', 'a8', 1, 52, 74, NULL, '2018-04-01 17:26:25', '2018-04-01 17:26:25', NULL),
	(10, 'A9', 'a9', 1, 37, 52, NULL, '2018-04-01 17:26:50', '2018-04-01 17:26:50', NULL),
	(11, 'A10', 'a10', 1, 26, 37, NULL, '2018-04-01 17:28:36', '2018-04-01 17:28:36', NULL),
	(12, '2A0', '2a0', 1, 1189, 1682, NULL, '2018-04-01 17:29:14', '2018-04-01 17:29:14', NULL),
	(13, '4A0', '4a0', 1, 1682, 2378, NULL, '2018-04-01 17:29:44', '2018-04-01 17:29:44', NULL),
	(14, 'B0', 'b0', 2, 1000, 1414, NULL, '2018-04-01 17:32:19', '2018-04-01 17:32:19', NULL),
	(15, 'B1', 'b1', 1, 707, 1000, NULL, '2018-04-01 17:33:23', '2018-04-01 18:37:31', '2018-04-01 18:37:31'),
	(16, 'B1', 'b1', 2, 707, 1000, NULL, '2018-04-01 18:45:57', '2018-04-02 12:16:18', NULL),
	(17, 'B1+', 'b1', 2, 720, 1020, NULL, '2018-04-01 19:24:39', '2018-04-01 19:24:39', NULL),
	(18, 'B2', 'b2', 2, 500, 707, NULL, '2018-04-01 19:25:31', '2018-04-01 19:25:31', NULL),
	(19, 'B2+', 'b2', 2, 520, 720, NULL, '2018-04-01 19:26:20', '2018-04-01 19:26:20', NULL),
	(20, 'B3', 'b3', 2, 353, 500, NULL, '2018-04-01 19:47:47', '2018-04-01 19:47:47', NULL),
	(21, 'B4', 'b4', 2, 250, 353, NULL, '2018-04-01 19:48:15', '2018-04-01 19:48:15', NULL),
	(22, 'B5', 'b5', 2, 176, 250, NULL, '2018-04-01 19:49:27', '2018-04-01 19:49:27', NULL),
	(23, 'B6', 'b6', 2, 125, 176, NULL, '2018-04-01 19:51:06', '2018-04-01 19:51:06', NULL),
	(24, 'B7', 'b7', 2, 88, 125, NULL, '2018-04-01 19:52:57', '2018-04-01 19:52:57', NULL),
	(25, 'B8', 'b8', 2, 62, 88, NULL, '2018-04-01 19:53:23', '2018-04-01 19:53:23', NULL),
	(26, 'B9', 'b9', 2, 44, 62, NULL, '2018-04-01 19:53:50', '2018-04-01 19:53:50', NULL),
	(27, 'B10', 'b10', 2, 31, 44, NULL, '2018-04-01 19:54:10', '2018-04-01 19:54:10', NULL),
	(28, 'B11', 'b11', 2, 22, 32, NULL, '2018-04-01 19:54:34', '2018-04-01 19:54:34', NULL),
	(29, 'B12', 'b12', 2, 16, 22, NULL, '2018-04-01 19:55:04', '2018-04-01 19:55:04', NULL),
	(30, 'C0', 'c0', 3, 917, 1297, NULL, '2018-04-01 19:58:08', '2018-04-01 19:58:08', NULL),
	(31, 'C1', 'c1', 3, 648, 917, NULL, '2018-04-01 19:58:52', '2018-04-01 19:58:52', NULL),
	(32, 'C2', 'c2', 3, 458, 648, NULL, '2018-04-01 19:59:17', '2018-04-01 19:59:17', NULL),
	(33, 'C3', 'c3', 3, 324, 458, NULL, '2018-04-01 20:00:09', '2018-04-01 20:00:09', NULL),
	(34, 'C4', 'c4', 3, 229, 324, NULL, '2018-04-01 20:00:41', '2018-04-01 20:00:41', NULL),
	(35, 'C5', 'c5', 3, 162, 229, NULL, '2018-04-01 20:01:15', '2018-04-01 20:01:15', NULL),
	(36, 'C6', 'c6', 3, 114, 162, NULL, '2018-04-01 20:01:46', '2018-04-01 20:01:46', NULL),
	(37, 'C7', 'c7', 3, 81, 114, NULL, '2018-04-01 20:07:44', '2018-04-01 20:07:44', NULL),
	(38, 'C8', 'c8', 3, 57, 81, NULL, '2018-04-01 20:08:09', '2018-04-01 20:08:09', NULL),
	(39, 'C9', 'c9', 3, 40, 57, NULL, '2018-04-01 20:08:37', '2018-04-01 20:08:37', NULL),
	(40, 'C10', 'c10', 3, 28, 40, NULL, '2018-04-01 20:09:02', '2018-04-01 20:09:02', NULL),
	(41, 'C11', 'c11', 3, 22, 32, NULL, '2018-04-01 20:09:26', '2018-04-01 20:09:26', NULL),
	(42, 'C12', 'c12', 3, 16, 22, NULL, '2018-04-01 20:10:02', '2018-04-01 20:10:02', NULL),
	(43, 'Half Letter', 'half-letter', 4, 140, 216, NULL, '2018-04-01 20:18:11', '2018-04-01 20:18:11', NULL),
	(44, 'Letter', 'letter', 4, 216, 279, NULL, '2018-04-01 20:18:38', '2018-04-01 20:18:38', NULL),
	(45, 'Legal', 'legal', 4, 216, 356, NULL, '2018-04-01 20:19:58', '2018-04-01 20:19:58', NULL),
	(46, 'Junior Legal', 'junior-legal', 4, 127, 203, NULL, '2018-04-01 20:20:33', '2018-04-01 20:20:33', NULL),
	(47, 'Ledger/Tabloid', 'ledger-tabloid', 4, 279, 432, NULL, '2018-04-01 20:25:38', '2018-04-01 20:25:38', NULL),
	(48, 'Government Letter', 'government-letter', 4, 203, 267, NULL, '2018-04-01 20:28:05', '2018-04-01 20:28:05', NULL),
	(49, 'Government Legal', 'government-legal', 4, 216, 330, NULL, '2018-04-01 20:28:35', '2018-04-01 20:28:35', NULL),
	(50, 'ANSI A', 'ansi-a', 4, 216, 279, NULL, '2018-04-01 20:29:17', '2018-04-01 20:29:17', NULL),
	(51, 'ANSI B', 'ansi-b', 4, 279, 432, NULL, '2018-04-01 20:29:56', '2018-04-01 20:29:56', NULL),
	(52, 'ANSI C', 'ansi-c', 4, 432, 559, NULL, '2018-04-01 20:30:25', '2018-04-01 20:30:25', NULL),
	(53, 'ANSI D', 'ansi-d', 4, 559, 864, NULL, '2018-04-01 20:30:57', '2018-04-01 20:30:57', NULL),
	(54, 'ANSI E', 'ansi-e', 4, 864, 1118, NULL, '2018-04-01 20:31:28', '2018-04-01 20:31:28', NULL),
	(55, 'Arch A', 'arch-a', 4, 229, 305, NULL, '2018-04-01 20:32:47', '2018-04-01 20:32:47', NULL),
	(56, 'Arch B', 'arch-b', 4, 305, 457, NULL, '2018-04-01 20:33:22', '2018-04-01 20:33:22', NULL),
	(57, 'Arch C', 'arch-c', 4, 457, 610, NULL, '2018-04-01 20:34:11', '2018-04-01 20:34:11', NULL),
	(58, 'Arch D', 'arch-d', 4, 610, 914, NULL, '2018-04-01 20:34:46', '2018-04-01 20:34:46', NULL),
	(59, 'Arch E', 'arch-e', 4, 914, 1219, NULL, '2018-04-01 20:35:14', '2018-04-01 20:35:14', NULL),
	(60, 'Arch E1', 'arch-e1', 4, 762, 1067, NULL, '2018-04-01 20:35:50', '2018-04-01 20:35:50', NULL),
	(61, 'Arch E2', 'arch-e2', 4, 660, 965, NULL, '2018-04-01 20:36:24', '2018-04-01 20:36:24', NULL),
	(62, 'Arch E3', 'arch-e3', 4, 686, 991, NULL, '2018-04-01 20:36:58', '2018-04-01 20:36:58', NULL),
	(63, '6¼', '6-1-4', 5, 152.4, 88.9, NULL, '2018-04-01 20:41:21', '2018-04-01 20:41:21', NULL),
	(64, '6¾', '6-3-4', 5, 165.1, 92.1, NULL, '2018-04-01 20:44:26', '2018-04-01 20:44:26', NULL),
	(65, '7', '7', 5, 171.5, 95.3, NULL, '2018-04-01 20:44:54', '2018-04-01 20:44:54', NULL),
	(66, '7¾ Monarch', '7-3-4-monarch', 5, 190.5, 98.4, NULL, '2018-04-01 20:45:32', '2018-04-01 20:45:32', NULL),
	(67, '8⅝', '8-5-8', 5, 219.1, 92.1, NULL, '2018-04-01 20:46:35', '2018-04-01 20:46:35', NULL),
	(68, '9', '9', 5, 225.4, 98.4, NULL, '2018-04-01 20:47:15', '2018-04-01 20:47:15', NULL),
	(69, '10', '10', 5, 241.3, 104.8, NULL, '2018-04-01 20:48:06', '2018-04-01 20:48:06', NULL),
	(70, '11', '11', 5, 263.5, 114.3, NULL, '2018-04-01 20:48:32', '2018-04-01 20:48:32', NULL),
	(71, '12', '12', 5, 279.4, 120.7, NULL, '2018-04-01 20:49:06', '2018-04-01 20:49:06', NULL),
	(72, '14', '14', 5, 292.1, 127, NULL, '2018-04-01 20:49:59', '2018-04-01 20:49:59', NULL),
	(73, '16', '16', 5, 304.8, 152.4, NULL, '2018-04-01 20:50:33', '2018-04-01 20:50:33', NULL),
	(74, 'A2 Lady Grey', 'a2-lady-grey', 5, 146.1, 111.1, NULL, '2018-04-01 22:09:55', '2018-04-01 22:09:55', NULL),
	(75, 'A6 Thompson\'s Standard', 'a6-thompsons-standard', 5, 165.1, 120.7, NULL, '2018-04-01 22:11:44', '2018-04-01 22:11:44', NULL),
	(76, 'A7 Besselheim', 'a7-besselheim', 5, 184.2, 133.4, NULL, '2018-04-01 22:12:14', '2018-04-01 22:12:14', NULL),
	(77, 'A8 Carr\'s', 'a8-carrs', 5, 206.4, 139.7, NULL, '2018-04-01 22:13:14', '2018-04-01 22:13:14', NULL),
	(78, 'A9 Diplomat', 'a9-diplomat', 5, 222.3, 146.1, NULL, '2018-04-01 22:15:52', '2018-04-01 22:15:52', NULL),
	(79, 'A10 Willow', 'a10-willow', 5, 241.3, 152.4, NULL, '2018-04-01 22:16:34', '2018-04-01 22:16:34', NULL),
	(80, 'A Long', 'a-long', 5, 225.4, 98.4, NULL, '2018-04-01 22:17:06', '2018-04-01 22:17:06', NULL),
	(81, '1', '1', 5, 228.6, 152.4, NULL, '2018-04-01 22:17:40', '2018-04-01 22:17:40', NULL),
	(82, '1¾', '1-3-4', 5, 241.3, 152.4, NULL, '2018-04-01 22:18:20', '2018-04-01 22:18:20', NULL),
	(83, '3', '3', 5, 254, 177.8, NULL, '2018-04-01 22:19:32', '2018-04-01 22:19:32', NULL),
	(84, '6', '6', 5, 266.7, 190.5, NULL, '2018-04-01 22:20:01', '2018-04-01 22:20:01', NULL),
	(85, '8', '8', 5, 285.8, 209.6, NULL, '2018-04-01 22:20:33', '2018-04-01 22:20:33', NULL),
	(86, '9¾', '9-3-4', 5, 285.8, 222.3, NULL, '2018-04-01 22:21:15', '2018-04-01 22:21:15', NULL),
	(87, '10½', '10-1-2', 5, 304.8, 228.6, NULL, '2018-04-01 22:22:01', '2018-04-01 22:22:01', NULL),
	(88, '12½', '12-1-2', 5, 317.5, 241.3, NULL, '2018-04-01 22:22:39', '2018-04-01 22:22:39', NULL),
	(89, '13½', '13-1-2', 5, 330.2, 254, NULL, '2018-04-01 22:23:07', '2018-04-01 22:23:07', NULL),
	(90, '14½', '14-1-2', 5, 368.3, 292.1, NULL, '2018-04-01 22:23:42', '2018-04-01 22:23:42', NULL),
	(91, '15', '15', 5, 381, 254, NULL, '2018-04-01 22:24:13', '2018-04-01 22:24:13', NULL),
	(92, '15½', '15-1-2', 5, 393.7, 304.8, NULL, '2018-04-01 22:24:55', '2018-04-01 22:24:55', NULL),
	(93, 'DL', 'dl', 6, 220, 110, NULL, '2018-04-01 22:27:28', '2018-04-01 22:27:28', NULL),
	(94, 'C7/C6', 'c7-c6', 6, 162, 81, NULL, '2018-04-01 22:33:09', '2018-04-01 22:33:09', NULL),
	(95, 'C6/C5', 'c6-c5', 6, 227, 114, NULL, '2018-04-01 22:34:14', '2018-04-01 22:34:14', NULL),
	(96, 'E4', 'e4', 6, 400, 280, NULL, '2018-04-01 22:40:10', '2018-04-01 22:40:10', NULL),
	(97, 'Passport', 'passport', 7, 35, 45, NULL, '2018-04-01 22:42:17', '2018-04-01 22:42:17', NULL),
	(98, '2R', '2r', 7, 64, 89, NULL, '2018-04-01 22:42:48', '2018-04-01 22:42:48', NULL),
	(99, 'LD, DSC', 'ld-dsc', 7, 89, 119, NULL, '2018-04-01 22:43:36', '2018-04-01 22:43:36', NULL),
	(100, '3R, L', '3r-l', 7, 89, 127, NULL, '2018-04-01 22:43:56', '2018-04-01 22:43:56', NULL),
	(101, 'LW', 'lw', 7, 89, 133, NULL, '2018-04-01 22:44:22', '2018-04-01 22:44:22', NULL),
	(102, 'KGD', 'kgd', 7, 102, 136, NULL, '2018-04-01 22:44:42', '2018-04-01 22:44:42', NULL),
	(103, '4R, KG', '4r-kg', 7, 102, 152, NULL, '2018-04-01 22:45:21', '2018-04-01 22:45:21', NULL),
	(104, '2LD, DSCW', '2ld-dscw', 7, 127, 169, NULL, '2018-04-01 22:45:48', '2018-04-01 22:45:48', NULL),
	(105, '5R, 2L', '5r-2l', 7, 127, 178, NULL, '2018-04-01 22:46:20', '2018-04-01 22:46:20', NULL),
	(106, '2LW', '2lw', 7, 127, 190, NULL, '2018-04-01 22:46:48', '2018-04-01 22:46:48', NULL),
	(107, '6R', '6r', 7, 152, 203, NULL, '2018-04-01 22:47:17', '2018-04-01 22:47:17', NULL),
	(108, '8R, 6P', '8r-6p', 7, 203, 254, NULL, '2018-04-01 22:47:44', '2018-04-01 22:47:44', NULL),
	(109, 'S8R, 6PW', 's8r-6pw', 7, 203, 305, NULL, '2018-04-01 22:48:14', '2018-04-01 22:48:14', NULL),
	(110, '11R', '11r', 7, 279, 356, NULL, '2018-04-01 22:48:49', '2018-04-01 22:48:49', NULL),
	(111, 'A3+ Super B', 'a3-super-b', 7, 330, 483, NULL, '2018-04-01 22:49:15', '2018-04-01 22:49:15', NULL),
	(112, 'P1', 'p1', 8, 560, 860, NULL, '2018-04-01 22:52:34', '2018-04-01 22:52:34', NULL),
	(113, 'P2', 'p2', 8, 430, 560, NULL, '2018-04-01 22:53:09', '2018-04-01 22:53:09', NULL),
	(114, 'P3', 'p3', 8, 280, 430, NULL, '2018-04-01 22:53:39', '2018-04-01 22:53:39', NULL),
	(115, 'P4', 'p4', 8, 215, 280, NULL, '2018-04-01 22:54:02', '2018-04-01 22:54:02', NULL),
	(116, 'P5', 'p5', 8, 140, 215, NULL, '2018-04-01 22:54:39', '2018-04-01 22:54:39', NULL),
	(117, 'P6', 'p6', 8, 107, 140, NULL, '2018-04-01 22:54:58', '2018-04-01 22:54:58', NULL),
	(118, 'JB0', 'jb0', 9, 1030, 1456, NULL, '2018-04-01 23:19:13', '2018-04-01 23:19:13', NULL),
	(119, 'JB1', 'jb1', 9, 728, 1030, NULL, '2018-04-01 23:19:54', '2018-04-01 23:19:54', NULL),
	(120, 'JB2', 'jb2', 9, 515, 728, NULL, '2018-04-01 23:20:18', '2018-04-01 23:20:18', NULL),
	(121, 'JB3', 'jb3', 9, 364, 515, NULL, '2018-04-01 23:20:46', '2018-04-01 23:20:46', NULL),
	(122, 'JB4', 'jb4', 9, 257, 364, NULL, '2018-04-01 23:21:10', '2018-04-01 23:21:10', NULL),
	(123, 'JB5', 'jb5', 9, 182, 257, NULL, '2018-04-01 23:21:43', '2018-04-01 23:21:43', NULL),
	(124, 'JB6', 'jb6', 9, 128, 182, NULL, '2018-04-01 23:22:11', '2018-04-01 23:22:11', NULL),
	(125, 'JB7', 'jb7', 9, 91, 128, NULL, '2018-04-01 23:22:35', '2018-04-01 23:22:35', NULL),
	(126, 'JB8', 'jb8', 9, 64, 91, NULL, '2018-04-01 23:22:57', '2018-04-01 23:22:57', NULL),
	(127, 'JB9', 'jb9', 9, 45, 64, NULL, '2018-04-01 23:23:23', '2018-04-01 23:23:23', NULL),
	(128, 'JB10', 'jb10', 9, 32, 45, NULL, '2018-04-01 23:23:52', '2018-04-01 23:23:52', NULL),
	(129, 'JB11', 'jb11', 9, 22, 32, NULL, '2018-04-01 23:24:14', '2018-04-01 23:24:14', NULL),
	(130, 'JB12', 'jb12', 9, 16, 22, NULL, '2018-04-01 23:24:38', '2018-04-01 23:24:38', NULL),
	(131, 'Shiroku ban 4', 'shiroku-ban-4', 9, 264, 379, NULL, '2018-04-01 23:25:19', '2018-04-01 23:25:19', NULL),
	(132, 'Shiroku ban 5', 'shiroku-ban-5', 9, 189, 262, NULL, '2018-04-01 23:25:58', '2018-04-01 23:25:58', NULL),
	(133, 'Shiroku ban 6', 'shiroku-ban-6', 9, 127, 188, NULL, '2018-04-01 23:26:51', '2018-04-01 23:26:51', NULL),
	(134, 'Kiku 4', 'kiku-4', 9, 227, 306, NULL, '2018-04-01 23:27:17', '2018-04-01 23:27:17', NULL),
	(135, 'Kiku 5', 'kiku-5', 9, 151, 227, NULL, '2018-04-01 23:27:39', '2018-04-01 23:27:39', NULL),
	(136, 'Folio', 'folio', 10, 304.8, 482.6, NULL, '2018-04-01 23:31:02', '2018-04-01 23:31:02', NULL),
	(137, 'Quarto', 'quarto', 10, 241.3, 304.8, NULL, '2018-04-01 23:31:57', '2018-04-01 23:31:57', NULL),
	(138, 'Imperial Octavo', 'imperial-octavo', 10, 209.55, 292.1, NULL, '2018-04-01 23:32:27', '2018-04-01 23:32:27', NULL),
	(139, 'Super Octavo', 'super-octavo', 10, 177.8, 279.4, NULL, '2018-04-01 23:32:56', '2018-04-01 23:32:56', NULL),
	(140, 'Royal Octavo', 'royal-octavo', 10, 165.1, 254, NULL, '2018-04-01 23:33:36', '2018-04-01 23:33:36', NULL),
	(141, 'Medium Octavo', 'medium-octavo', 10, 165.1, 234.95, NULL, '2018-04-01 23:34:18', '2018-04-01 23:34:18', NULL),
	(142, 'Octavo', 'octavo', 10, 152.4, 228.6, NULL, '2018-04-01 23:34:46', '2018-04-01 23:34:46', NULL),
	(143, 'Crown Octavo', 'crown-octavo', 10, 136.525, 203.2, NULL, '2018-04-01 23:35:19', '2018-04-01 23:35:19', NULL),
	(144, '12mo', '12mo', 10, 127, 187.325, NULL, '2018-04-01 23:35:56', '2018-04-01 23:35:56', NULL),
	(145, '16mo', '16mo', 10, 101.6, 171.45, NULL, '2018-04-01 23:36:30', '2018-04-01 23:36:30', NULL),
	(146, '18mo', '18mo', 10, 101.6, 165.1, NULL, '2018-04-01 23:37:04', '2018-04-01 23:37:04', NULL),
	(147, '32mo', '32mo', 10, 88.9, 139.7, NULL, '2018-04-01 23:37:48', '2018-04-01 23:37:48', NULL),
	(148, '48mo', '48mo', 10, 63.5, 101.6, NULL, '2018-04-01 23:38:22', '2018-04-01 23:38:22', NULL),
	(149, '64mo', '64mo', 10, 50.8, 76.2, NULL, '2018-04-01 23:39:07', '2018-04-01 23:39:07', NULL),
	(150, 'B Format', 'b-format', 10, 129, 198, NULL, '2018-04-01 23:39:48', '2018-04-01 23:39:48', NULL),
	(151, 'Penguin', 'penguin', 10, 181, 111, NULL, '2018-04-01 23:40:15', '2018-04-01 23:40:15', NULL),
	(152, 'ISO 7810 ID-1', 'iso-7810-id-1', 11, 85.6, 53.98, NULL, '2018-04-01 23:42:02', '2018-04-01 23:42:02', NULL),
	(153, 'ISO 216', 'iso-216', 11, 74, 52, NULL, '2018-04-01 23:42:46', '2018-04-01 23:42:46', NULL),
	(154, 'US/Canada', 'us-canada', 11, 89, 51, NULL, '2018-04-01 23:43:13', '2018-04-01 23:43:13', NULL),
	(155, 'European', 'european', 11, 85, 55, NULL, '2018-04-01 23:43:35', '2018-04-01 23:43:35', NULL),
	(156, 'Scandinavia', 'scandinavia', 11, 90, 55, NULL, '2018-04-01 23:43:58', '2018-04-01 23:43:58', NULL),
	(157, 'China', 'china', 11, 90, 54, NULL, '2018-04-01 23:44:19', '2018-04-01 23:44:19', NULL),
	(158, 'Japan', 'japan', 11, 91, 55, NULL, '2018-04-01 23:44:46', '2018-04-01 23:44:46', NULL),
	(159, 'Broadsheet', 'broadsheet', 12, 600, 750, NULL, '2018-04-01 23:46:02', '2018-04-01 23:46:02', NULL),
	(160, 'Berliner', 'berliner', 12, 315, 470, NULL, '2018-04-01 23:46:41', '2018-04-01 23:46:41', NULL),
	(161, 'Tabloid', 'tabloid', 12, 280, 430, NULL, '2018-04-01 23:47:04', '2018-04-01 23:47:04', NULL),
	(162, 'Compact', 'compact', 12, 280, 430, NULL, '2018-04-01 23:47:35', '2018-04-01 23:47:35', NULL),
	(163, 'Nordisch', 'nordisch', 12, 400, 570, NULL, '2018-04-01 23:48:02', '2018-04-01 23:48:02', NULL),
	(164, 'Rhenish', 'rhenish', 12, 350, 520, NULL, '2018-04-01 23:48:29', '2018-04-01 23:48:29', NULL),
	(165, 'Swiss', 'swiss', 12, 320, 475, NULL, '2018-04-01 23:49:03', '2018-04-01 23:49:03', NULL),
	(166, 'Canadian Tabloid', 'canadian-tabloid', 12, 260, 368, NULL, '2018-04-01 23:49:29', '2018-04-01 23:49:29', NULL),
	(167, 'Ciner', 'ciner', 12, 350, 500, NULL, '2018-04-01 23:50:00', '2018-04-01 23:50:00', NULL),
	(168, 'Norwegian Tabloid', 'norwegian-tabloid', 12, 280, 400, NULL, '2018-04-01 23:50:25', '2018-04-01 23:50:25', NULL),
	(169, 'US Broadsheet', 'us-broadsheet', 12, 381, 578, NULL, '2018-04-01 23:52:08', '2018-04-01 23:52:08', NULL),
	(170, 'New York Times', 'new-york-times', 12, 305, 559, NULL, '2018-04-01 23:52:35', '2018-04-01 23:52:35', NULL),
	(171, 'Wall Street Journal', 'wall-street-journal', 12, 305, 578, NULL, '2018-04-01 23:53:13', '2018-04-01 23:53:13', NULL),
	(172, 'South African Broadsheet', 'south-african-broadsheet', 12, 410, 578, NULL, '2018-04-01 23:55:00', '2018-04-01 23:55:00', NULL),
	(173, 'British Broadsheet', 'british-broadsheet', 12, 375, 597, NULL, '2018-04-01 23:55:39', '2018-04-01 23:55:39', NULL),
	(174, 'D0', 'd0', 13, 764, 1064, NULL, '2018-04-01 23:58:10', '2018-04-01 23:58:10', NULL),
	(175, 'D1', 'd1', 13, 532, 760, NULL, '2018-04-01 23:58:50', '2018-04-01 23:58:50', NULL),
	(176, 'D2', 'd2', 13, 380, 528, NULL, '2018-04-01 23:59:21', '2018-04-01 23:59:21', NULL),
	(177, 'D3', 'd3', 13, 264, 376, NULL, '2018-04-02 00:00:28', '2018-04-02 00:00:28', NULL),
	(178, 'D4', 'd4', 13, 188, 260, NULL, '2018-04-02 00:01:04', '2018-04-02 00:01:04', NULL),
	(179, 'D5', 'd5', 13, 130, 184, NULL, '2018-04-02 00:01:46', '2018-04-02 00:01:46', NULL),
	(180, 'D6', 'd6', 13, 92, 126, NULL, '2018-04-02 00:02:20', '2018-04-02 00:02:20', NULL),
	(181, 'RD0', 'rd0', 13, 787, 1092, NULL, '2018-04-02 00:03:05', '2018-04-02 00:03:05', NULL),
	(182, 'RD1', 'rd1', 13, 546, 787, NULL, '2018-04-02 00:03:35', '2018-04-02 00:03:35', NULL),
	(183, 'RD2', 'rd2', 13, 393, 546, NULL, '2018-04-02 00:05:13', '2018-04-02 00:05:13', NULL),
	(184, 'RD3', 'rd3', 13, 273, 393, NULL, '2018-04-02 00:05:49', '2018-04-02 00:05:49', NULL),
	(185, 'RD4', 'rd4', 13, 196, 273, NULL, '2018-04-02 00:06:17', '2018-04-02 00:06:17', NULL),
	(186, 'RD5', 'rd5', 13, 136, 196, NULL, '2018-04-02 00:06:45', '2018-04-02 00:06:45', NULL),
	(187, 'RD6', 'rd6', 13, 98, 136, NULL, '2018-04-02 00:07:19', '2018-04-02 00:07:19', NULL),
	(188, '1 Sheet', '1-sheet', 14, 508, 762, NULL, '2018-04-02 00:09:23', '2018-04-02 00:09:23', NULL),
	(189, '2 Sheet', '2-sheet', 14, 762, 1016, NULL, '2018-04-02 00:10:01', '2018-04-02 00:10:01', NULL),
	(190, '4 Sheet', '4-sheet', 14, 1016, 1524, NULL, '2018-04-02 00:10:39', '2018-04-02 00:10:39', NULL),
	(191, '6 Sheet', '6-sheet', 14, 1200, 1800, NULL, '2018-04-02 00:11:13', '2018-04-02 00:11:13', NULL),
	(192, '12 Sheet', '12-sheet', 14, 3048, 1524, NULL, '2018-04-02 00:11:51', '2018-04-02 00:11:51', NULL),
	(193, '16 Sheet', '16-sheet', 14, 2032, 3048, NULL, '2018-04-02 00:12:34', '2018-04-02 00:12:34', NULL),
	(194, '32 Sheet', '32-sheet', 14, 4064, 3048, NULL, '2018-04-02 00:13:22', '2018-04-02 00:13:22', NULL),
	(195, '48 Sheet', '48-sheet', 14, 6096, 3048, NULL, '2018-04-02 00:14:07', '2018-04-02 00:14:07', NULL),
	(196, '64 Sheet', '64-sheet', 14, 8128, 3048, NULL, '2018-04-02 00:14:56', '2018-04-02 00:14:56', NULL),
	(197, '96 Sheet', '96-sheet', 14, 12192, 3048, NULL, '2018-04-02 00:16:45', '2018-04-02 00:16:45', NULL),
	(198, 'Emperor', 'emperor', 15, 1219, 1829, NULL, '2018-04-02 00:19:47', '2018-04-02 00:19:47', NULL),
	(199, 'Quad Demy', 'quad-demy', 15, 889, 1143, NULL, '2018-04-02 00:20:38', '2018-04-02 00:20:38', NULL),
	(200, 'Antiquarian', 'antiquarian', 15, 787, 1346, NULL, '2018-04-02 00:21:02', '2018-04-02 00:21:02', NULL),
	(201, 'Grand Eagle', 'grand-eagle', 15, 730, 1067, NULL, '2018-04-02 00:21:43', '2018-04-02 00:21:43', NULL),
	(202, 'Double Elephant', 'double-elephant', 15, 678, 1016, NULL, '2018-04-02 00:22:30', '2018-04-02 00:22:30', NULL),
	(203, 'Atlas', 'atlas', 15, 660, 864, NULL, '2018-04-02 00:23:07', '2018-04-02 00:23:07', NULL),
	(204, 'Columbier', 'columbier', 15, 597, 876, NULL, '2018-04-02 00:23:42', '2018-04-02 00:23:42', NULL),
	(205, 'Double Demy', 'double-demy', 15, 572, 902, NULL, '2018-04-02 00:24:13', '2018-04-02 00:24:13', NULL),
	(206, 'Imperial', 'imperial', 15, 559, 762, NULL, '2018-04-02 00:24:54', '2018-04-02 00:24:54', NULL),
	(207, 'Double Large Post', 'double-large-post', 15, 533, 838, NULL, '2018-04-02 00:25:52', '2018-04-02 00:25:52', NULL),
	(208, 'Elephant', 'elephant', 15, 584, 711, NULL, '2018-04-02 00:26:31', '2018-04-02 00:26:31', NULL),
	(209, 'Princess', 'princess', 15, 546, 711, NULL, '2018-04-02 00:27:05', '2018-04-02 00:27:05', NULL),
	(210, 'Cartridge', 'cartridge', 15, 533, 660, NULL, '2018-04-02 00:27:31', '2018-04-02 00:27:31', NULL),
	(211, 'Royal', 'royal', 15, 508, 635, NULL, '2018-04-02 00:28:03', '2018-04-02 00:28:03', NULL),
	(212, 'Sheet, Half Post', 'sheet-half-post', 15, 495, 597, NULL, '2018-04-02 00:28:46', '2018-04-02 00:28:46', NULL),
	(213, 'Double Post', 'double-post', 15, 483, 762, NULL, '2018-04-02 00:29:14', '2018-04-02 00:29:14', NULL),
	(214, 'Super Royal', 'super-royal', 15, 483, 686, NULL, '2018-04-02 00:29:51', '2018-04-02 00:29:51', NULL),
	(215, 'Medium', 'medium', 15, 470, 584, NULL, '2018-04-02 00:32:11', '2018-04-02 00:32:11', NULL),
	(216, 'Demy', 'demy', 15, 445, 572, NULL, '2018-04-02 00:32:43', '2018-04-02 00:32:43', NULL),
	(217, 'Copy Draught', 'copy-draught', 15, 406, 508, NULL, '2018-04-02 00:33:21', '2018-04-02 00:33:21', NULL),
	(218, 'Large Post', 'large-post', 15, 394, 508, NULL, '2018-04-02 00:34:54', '2018-04-02 00:34:54', NULL),
	(219, 'Post', 'post', 15, 394, 489, NULL, '2018-04-02 00:35:28', '2018-04-02 00:35:28', NULL),
	(220, 'Crown', 'crown', 15, 381, 508, NULL, '2018-04-02 00:35:54', '2018-04-02 00:35:54', NULL),
	(221, 'Pinched Post', 'pinched-post', 15, 375, 470, NULL, '2018-04-02 00:36:20', '2018-04-02 00:36:20', NULL),
	(222, 'Foolscap', 'foolscap', 15, 343, 432, NULL, '2018-04-02 00:36:51', '2018-04-02 00:36:51', NULL),
	(223, 'Small Foolscap', 'small-foolscap', 15, 337, 419, NULL, '2018-04-02 00:37:19', '2018-04-02 00:37:19', NULL),
	(224, 'Brief', 'brief', 15, 343, 406, NULL, '2018-04-02 00:37:43', '2018-04-02 00:37:43', NULL),
	(225, 'Pott', 'pott', 15, 318, 381, NULL, '2018-04-02 00:38:09', '2018-04-02 00:38:09', NULL),
	(226, 'Monarch', 'monarch', 15, 184, 267, NULL, '2018-04-02 00:39:32', '2018-04-02 00:39:32', NULL),
	(227, 'Carta', 'carta', 16, 216, 279, NULL, '2018-04-02 00:42:37', '2018-04-02 00:42:37', NULL),
	(228, 'Oficio', 'oficio', 16, 216, 330, NULL, '2018-04-02 00:43:04', '2018-04-02 00:43:04', NULL),
	(229, 'Extra Tabloide', 'extra-tabloide', 16, 304, 457.2, NULL, '2018-04-02 00:43:29', '2018-04-02 00:43:29', NULL),
	(230, '1/8 pliego', '1-8-pliego', 16, 250, 350, NULL, '2018-04-02 00:43:52', '2018-04-02 00:43:52', NULL),
	(231, '1/4 pliego', '1-4-pliego', 16, 350, 500, NULL, '2018-04-02 00:44:18', '2018-04-02 00:44:18', NULL),
	(232, '1/2 pliego', '1-2-pliego', 16, 500, 700, NULL, '2018-04-02 00:44:40', '2018-04-02 00:44:40', NULL),
	(233, 'Pliego', 'pliego', 16, 700, 1000, NULL, '2018-04-02 00:45:04', '2018-04-02 00:45:04', NULL),
	(234, 'Cloche', 'cloche', 17, 300, 400, NULL, '2018-04-02 00:46:24', '2018-04-02 00:46:24', NULL),
	(235, 'Pot, écolier', 'pot-colier', 17, 310, 400, NULL, '2018-04-02 00:46:55', '2018-04-02 00:46:55', NULL),
	(236, 'Tellière', 'telli-re', 17, 340, 440, NULL, '2018-04-02 00:47:24', '2018-04-02 00:47:24', NULL),
	(237, 'Couronne écriture', 'couronne-criture', 17, 360, 360, NULL, '2018-04-02 00:47:49', '2018-04-02 00:47:49', NULL),
	(238, 'Couronne édition', 'couronne-dition', 17, 370, 470, NULL, '2018-04-02 00:48:12', '2018-04-02 00:48:12', NULL),
	(239, 'Roberto', 'roberto', 17, 390, 500, NULL, '2018-04-02 00:48:31', '2018-04-02 00:48:31', NULL),
	(240, 'Écu', 'cu', 17, 400, 520, NULL, '2018-04-02 00:48:54', '2018-04-02 00:48:54', NULL),
	(241, 'Coquille', 'coquille', 17, 440, 560, NULL, '2018-04-02 00:49:15', '2018-04-02 00:49:15', NULL),
	(242, 'Carré', 'carr', 17, 450, 560, NULL, '2018-04-02 00:49:43', '2018-04-02 00:49:43', NULL),
	(243, 'Cavalier', 'cavalier', 17, 460, 620, NULL, '2018-04-02 00:50:09', '2018-04-02 00:50:09', NULL),
	(244, 'Demi-raisin', 'demi-raisin', 17, 325, 500, NULL, '2018-04-02 00:50:30', '2018-04-02 00:50:30', NULL),
	(245, 'Raisin', 'raisin', 17, 500, 650, NULL, '2018-04-02 00:50:53', '2018-04-02 00:50:53', NULL),
	(246, 'Double Raisin', 'double-raisin', 17, 650, 1000, NULL, '2018-04-02 00:51:24', '2018-04-02 00:51:24', NULL),
	(247, 'Jésus', 'j-sus', 17, 560, 760, NULL, '2018-04-02 00:51:48', '2018-04-02 00:51:48', NULL),
	(248, 'Soleil', 'soleil', 17, 600, 800, NULL, '2018-04-02 00:52:11', '2018-04-02 00:52:11', NULL),
	(249, 'Colombier affiche', 'colombier-affiche', 17, 600, 800, NULL, '2018-04-02 00:52:34', '2018-04-02 00:52:34', NULL),
	(250, 'Colombier commercial', 'colombier-commercial', 17, 630, 900, NULL, '2018-04-02 00:53:00', '2018-04-02 00:53:00', NULL),
	(251, 'Petit Aigle', 'petit-aigle', 17, 700, 940, NULL, '2018-04-02 00:53:28', '2018-04-02 00:53:28', NULL),
	(252, 'Grand Aigle', 'grand-aigle', 17, 750, 1050, NULL, '2018-04-02 00:54:08', '2018-04-02 00:54:08', NULL),
	(253, 'Grand Monde', 'grand-monde', 17, 900, 1260, NULL, '2018-04-02 00:54:39', '2018-04-02 00:54:39', NULL),
	(254, 'Univers', 'univers', 17, 1000, 1130, NULL, '2018-04-02 00:54:59', '2018-04-02 00:54:59', NULL),
	(255, 'RA0', 'ra0', 18, 860, 1220, NULL, '2018-04-02 00:56:52', '2018-04-02 00:56:52', NULL),
	(256, 'RA1', 'ra1', 18, 610, 860, NULL, '2018-04-02 00:57:22', '2018-04-02 00:57:22', NULL),
	(257, 'RA2', 'ra2', 18, 430, 610, NULL, '2018-04-02 00:58:04', '2018-04-02 00:58:04', NULL),
	(258, 'RA3', 'ra3', 18, 305, 430, NULL, '2018-04-02 00:58:28', '2018-04-02 00:58:28', NULL),
	(259, 'RA4', 'ra4', 18, 215, 305, NULL, '2018-04-02 00:58:48', '2018-04-02 00:58:48', NULL),
	(260, 'SRA0', 'sra0', 18, 900, 1280, NULL, '2018-04-02 00:59:10', '2018-04-02 00:59:10', NULL),
	(261, 'SRA1', 'sra1', 18, 640, 900, NULL, '2018-04-02 00:59:32', '2018-04-02 00:59:32', NULL),
	(262, 'SRA2', 'sra2', 18, 450, 640, NULL, '2018-04-02 00:59:57', '2018-04-02 00:59:57', NULL),
	(263, 'SRA3', 'sra3', 18, 320, 450, NULL, '2018-04-02 01:00:23', '2018-04-02 01:00:23', NULL),
	(264, 'SRA4', 'sra4', 18, 225, 320, NULL, '2018-04-02 01:00:49', '2018-04-02 01:00:49', NULL),
	(265, 'SRA1+', 'sra1', 18, 660, 920, NULL, '2018-04-02 01:01:11', '2018-04-02 01:01:11', NULL),
	(266, 'SRA2+', 'sra2', 18, 480, 650, NULL, '2018-04-02 01:01:34', '2018-04-02 01:01:34', NULL),
	(267, 'SRA3+', 'sra3', 18, 320, 460, NULL, '2018-04-02 01:01:57', '2018-04-02 01:01:57', NULL),
	(268, 'SRA3++', 'sra3', 18, 320, 464, NULL, '2018-04-02 01:02:20', '2018-04-02 01:02:20', NULL),
	(269, 'PA0', 'pa0', 19, 840, 1120, NULL, '2018-04-02 01:03:38', '2018-04-02 01:03:38', NULL),
	(270, 'PA1', 'pa1', 19, 560, 840, NULL, '2018-04-02 01:04:10', '2018-04-02 01:04:10', NULL),
	(271, 'PA2', 'pa2', 19, 420, 560, NULL, '2018-04-02 01:04:29', '2018-04-02 01:04:29', NULL),
	(272, 'PA3', 'pa3', 19, 280, 420, NULL, '2018-04-02 01:04:48', '2018-04-02 01:04:48', NULL),
	(273, 'PA4', 'pa4', 19, 210, 280, NULL, '2018-04-02 01:05:08', '2018-04-02 01:05:08', NULL),
	(274, 'PA5', 'pa5', 19, 140, 210, NULL, '2018-04-02 01:05:41', '2018-04-02 01:05:41', NULL),
	(275, 'PA6', 'pa6', 19, 105, 140, NULL, '2018-04-02 01:06:00', '2018-04-02 01:06:00', NULL),
	(276, 'PA7', 'pa7', 19, 70, 105, NULL, '2018-04-02 01:06:21', '2018-04-02 01:06:21', NULL),
	(277, 'PA8', 'pa8', 19, 52, 70, NULL, '2018-04-02 01:06:42', '2018-04-02 01:06:42', NULL),
	(278, 'PA9', 'pa9', 19, 35, 52, NULL, '2018-04-02 01:07:00', '2018-04-02 01:07:00', NULL),
	(279, 'PA10', 'pa10', 19, 26, 35, NULL, '2018-04-02 01:07:19', '2018-04-02 01:07:19', NULL),
	(280, 'F0', 'f0', 19, 841, 1321, NULL, '2018-04-02 01:11:37', '2018-04-02 01:11:37', NULL),
	(281, 'F1', 'f1', 19, 660, 841, NULL, '2018-04-02 01:12:00', '2018-04-02 01:12:00', NULL),
	(282, 'F2', 'f2', 19, 420, 660, NULL, '2018-04-02 01:12:28', '2018-04-02 01:12:28', NULL),
	(283, 'F3', 'f3', 19, 330, 420, NULL, '2018-04-02 01:12:48', '2018-04-02 01:12:48', NULL),
	(284, 'F4', 'f4', 19, 210, 330, NULL, '2018-04-02 01:13:06', '2018-04-02 01:13:06', NULL),
	(285, 'F5', 'f5', 19, 165, 210, NULL, '2018-04-02 01:13:31', '2018-04-02 01:13:31', NULL),
	(286, 'F6', 'f6', 19, 105, 165, NULL, '2018-04-02 01:13:53', '2018-04-02 01:13:53', NULL),
	(287, 'F7', 'f7', 19, 82, 105, NULL, '2018-04-02 01:14:12', '2018-04-02 01:14:12', NULL),
	(288, 'F8', 'f8', 19, 52, 82, NULL, '2018-04-02 01:14:33', '2018-04-02 01:14:33', NULL),
	(289, 'F9', 'f9', 19, 41, 52, NULL, '2018-04-02 01:14:52', '2018-04-02 01:14:52', NULL),
	(290, 'F10', 'f10', 19, 26, 41, NULL, '2018-04-02 01:15:12', '2018-04-02 01:15:12', NULL),
	(291, 'Kings', 'kings', 20, 165, 203, NULL, '2018-04-02 01:19:13', '2018-04-02 01:19:13', NULL),
	(292, 'Dukes', 'dukes', 20, 140, 178, NULL, '2018-04-02 01:19:34', '2018-04-02 01:19:34', NULL),
	(293, 'A0', 'a0', 2, 34, 12, NULL, '2018-04-02 09:44:51', '2018-04-02 09:45:17', '2018-04-02 09:45:17'),
	(294, 'A1', 'a1', 5, 92.1, 130.2, NULL, '2018-04-02 12:17:28', '2018-04-02 12:17:28', NULL),
	(295, 'A4', 'a4', 5, 158.7, 108, NULL, '2018-04-02 12:18:25', '2018-04-02 12:18:25', NULL),
	(296, 'C7', 'c7', 6, 114, 81, NULL, '2018-04-02 12:19:11', '2018-04-02 12:19:11', NULL),
	(297, 'C6', 'c6', 6, 162, 114, NULL, '2018-04-02 12:20:16', '2018-04-02 12:20:16', NULL),
	(298, 'C5', 'c5', 6, 229, 162, NULL, '2018-04-02 12:20:48', '2018-04-02 12:20:48', NULL),
	(299, 'C4', 'c4', 6, 324, 227, NULL, '2018-04-02 12:21:20', '2018-04-02 12:21:20', NULL),
	(300, 'C3', 'c3', 6, 458, 324, NULL, '2018-04-02 12:21:47', '2018-04-02 12:21:47', NULL),
	(301, 'B6', 'b6', 6, 176, 125, NULL, '2018-04-02 12:22:09', '2018-04-02 12:22:09', NULL),
	(302, 'B5', 'b5', 6, 250, 176, NULL, '2018-04-02 12:22:36', '2018-04-02 12:22:36', NULL),
	(303, 'B4', 'b4', 6, 353, 250, NULL, '2018-04-02 12:23:49', '2018-04-02 12:23:49', NULL),
	(304, 'Broadsheet', 'broadsheet', 15, 457, 610, NULL, '2018-04-02 12:25:48', '2018-04-02 12:25:48', NULL),
	(305, 'Quarto', 'quarto', 15, 229, 279, NULL, '2018-04-02 12:26:29', '2018-04-02 12:26:29', NULL),
	(306, 'Foolscap', 'foolscap', 20, 203, 330, NULL, '2018-04-02 12:27:47', '2018-04-02 12:27:47', NULL),
	(307, 'Quarto', 'quarto', 20, 203, 254, NULL, '2018-04-02 12:28:13', '2018-04-02 12:28:13', NULL),
	(308, 'Imperial', 'imperial', 20, 178, 229, NULL, '2018-04-02 12:28:39', '2018-04-02 12:28:39', NULL);
/*!40000 ALTER TABLE `papersize` ENABLE KEYS */;

-- Dumping structure for table admin_paper_size.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table admin_paper_size.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table admin_paper_size.review
CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` int(11) DEFAULT NULL,
  `description` int(11) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table admin_paper_size.review: ~0 rows (approximately)
DELETE FROM `review`;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
/*!40000 ALTER TABLE `review` ENABLE KEYS */;

-- Dumping structure for table admin_paper_size.setting
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `setting_value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `setting_name` (`setting_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table admin_paper_size.setting: ~5 rows (approximately)
DELETE FROM `setting`;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` (`id`, `setting_name`, `setting_value`) VALUES
	(1, 'site_title', 'Paper Size 12'),
	(2, 'copy_right', '2018@gmail.c'),
	(3, 'logo', 'set_image2834.png'),
	(4, 'description', 'Base form control examples'),
	(5, 'keywords', 'bangladesh online grocery, bangladesh bazaar, best,test');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;

-- Dumping structure for table admin_paper_size.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '2',
  `image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table admin_paper_size.users: ~4 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `role`, `image`, `bio`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'sdfsdf sdf', 'asdfsdf@gmail.com', '$2y$10$/F2YZbWzeJTj6rZiz0TT5OpI.VxKEZEIQVLcXvSuA.Zl5t1I8Wuom', 1, 1, 'image24014.jpg', 'adfs dfgsafsdg', 'tr5k8YOklFDTLLWMebLHca3HidZaNy8brQRdLvo3ql5LNEXbr9x6yWdAdgUM', '2018-02-24 16:29:11', '2020-02-15 17:17:33'),
	(2, 'Admin', 'codepassenger@gmail.com', '$2y$10$nXi7XX6MOS.khQxct84oLOGO.ELiOTHIRYg7nZV3MmuXlo0xgVjia', 1, 2, NULL, 'lol', 'Rq6bb2uym3ZWtVjotpUfgEk1TPUMuCYzx2T1IjsgF13pBght7yKhPwvgQH7R', '2018-02-28 15:37:18', '2020-02-15 17:18:08'),
	(3, 'Manzur Ahammed Tipu', 'sfdsf@gmail.com', '$2y$10$cqJYJ6iDVZVMgY3/x2wE1OHyAvazsGITm9/Ze4sj.cIfwxUM6kmeO', 1, 2, NULL, NULL, NULL, '2018-02-28 15:39:47', '2018-02-28 15:39:47'),
	(4, 'movieshow', 'farhanmasuqe_j@yahoo.com', '$2y$10$XdOmO32A7bFHTXMPIGzQXuUnx4YMQsctw9Q3VbJ6AmjNtuL0P0mRG', 1, 2, 'image12947.jpg', NULL, NULL, '2018-02-28 15:44:15', '2018-02-28 15:44:15');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
