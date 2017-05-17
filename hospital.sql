-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2016 at 11:59 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--
CREATE DATABASE IF NOT EXISTS `hospital` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hospital`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `pic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Name`, `email`, `password`, `pic`) VALUES
(1, 'Hamza Omar', 'hamza_omar@live.com', '1992', 'hamza.jpg'),
(2, '', '', '', ''),
(3, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `Doc_ID` varchar(20) NOT NULL,
  `patient_ID` varchar(20) NOT NULL,
  `schedule_ID` varchar(20) NOT NULL,
  `Sepc_ID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `date`, `Doc_ID`, `patient_ID`, `schedule_ID`, `Sepc_ID`) VALUES
(17, '2019-08-16', '3', '13', '21', '4'),
(18, '2019-08-16', '10', '12', '21', '8'),
(19, '2019-08-16', '5', ' 1', '21', '6'),
(20, '2020-08-16', '4', '12', '16', '7'),
(21, '2016-08-08', '1', '1', '18', '9'),
(22, '2021-08-16', '7', ' 1', '22', '5'),
(23, '2021-08-16', '1', ' 1', '14', '1'),
(24, '2023-08-16', '5', ' 1', '24', '3');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_ID`, `Name`, `email`, `message`) VALUES
(1, 'khaked fahmy', 'fahmy@yaho.com', 'The Masterstudy Education Center Is Complete And An Integral Part Of Local Education In Washington! The Masterstudy Education Center Is Complete And An Integral Part Of Local Education In Washington!\r\n'),
(4, 'hamed khaled', 'hamed@yahoo.com', 'This course introduces students to basic web design using HTML (Hypertext Markup Language) and CSS (Cascading Style Sheets). The course does not require any prior knowledge of HTML or web design. Throughout the course students are introduced to planning and designing effective web pages; implementing web pages by writing HTML and CSS code; enhancing web pages with the use of page layout techniques, text formatting, graphics, images, and multimedia; and producing a functional, multi-page website.'),
(5, 'hany', 'hany@tahoo.com', 'This course introduces students to basic web design using HTML (Hypertext Markup Language) and CSS (Cascading Style Sheets). The course does not require any prior knowledge of HTML or web design. Throughout the course students are introduced to planning and designing effective web pages; implementing web pages by writing HTML and CSS code; enhancing web pages with the use of page layout techniques, text formatting, graphics, images, and multimedia; and producing a functional, multi-page website.'),
(6, 'ahemd', 'ahmed_nasser@live.com', 'اريد عرض اعلان فى الموقع الرجاء الاتصال بى  الرقم الخاص بى هو 010245782158');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `Doc_ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `achievement` text NOT NULL,
  `mobile` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `Admin_ID` varchar(100) NOT NULL,
  `Sepc_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`Doc_ID`, `Name`, `achievement`, `mobile`, `email`, `pic`, `Admin_ID`, `Sepc_ID`) VALUES
(1, 'hamza', 'gradutated from cairo unv ', 125445, 'hamza @yaho.com', 'doc5.jpg', '', '1'),
(2, 'ahemd mosa', 'gradutated from cairo unv ', 21547, 'ahemd @yaho.com', 'doc1.jpg', '', '2'),
(3, 'khaled ahemd', 'gradutated from cairo unv ', 2105487, 'khaled@yaho.com', 'doc2.jpg', '', '3'),
(4, 'mossa mohamed', 'gradutated from cairo unv ', 2365478, 'mosa@yaho.com', 'doc3.jpg', '', '4'),
(5, 'hany fawzy', 'gradutated from cairo unv ', 21577520, 'hany@hotmail', 'doc4.jpg', '', '5'),
(6, 'madkor shref', 'gradutated from cairo unv ', 124884152, 'shref@yahoo.om', 'doc5.jpg', '', '6'),
(7, 'mohamed ahemd', 'gradutated from cairo unv ', 10236547, 'mohamed@yaho.com', 'doc1.jpg', '', '6'),
(9, 'amr mamdoh', 'gradutated from cairo unv ', 234234234, 'amr@yaho.com', 'img2.jpg', '', '9'),
(10, 'fahmy khaled', 'gradutated from cairo unv ', 1236547, 'fahmy@yaho.com', 'doc4.jpg', '', '7'),
(12, 'ala el Dardery', 'gradutated from cairo unv ', 145102, 'dardery@yaho.com', 'img2.jpg', '', '3'),
(15, 'wael magy', 'gradutated from cairo unv ', 21577, 'wael magdi', 'doc1.jpg', '', '6'),
(31, 'reaham El sayd ahemd', 'gradutated from cairo unv	', 10258851, 'reham@ahmed.com', 'img1.jpg', '1', '8');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_schedule`
--

CREATE TABLE `doctors_schedule` (
  `doc_ID` int(11) NOT NULL,
  `schedule_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors_schedule`
--

INSERT INTO `doctors_schedule` (`doc_ID`, `schedule_ID`) VALUES
(1, 1),
(2, 2),
(3, 4),
(5, 5),
(6, 7),
(7, 8),
(9, 9),
(10, 10),
(12, 11),
(6, 2),
(5, 8),
(1, 10),
(8, 2),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_ID` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `mobile` int(11) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password_` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_ID`, `p_name`, `mobile`, `gender`, `email`, `password_`) VALUES
(1, 'ahmed el sayd', 1026515, 'm', 'ahmed@yaho', '1'),
(12, 'hanny ali khaled', 1092462941, 'm', 'hany_omar@Live.com', '1234'),
(13, ' reham ahmed fathy', 1092462941, 'm', 'ahmed_omar@Live.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_ID` int(11) NOT NULL,
  `Day` varchar(50) CHARACTER SET utf8 NOT NULL,
  `start` varchar(50) CHARACTER SET utf8 NOT NULL,
  `end` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Date` date NOT NULL,
  `Doc_ID` varchar(11) NOT NULL,
  `Sepc_ID` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_ID`, `Day`, `start`, `end`, `Date`, `Doc_ID`, `Sepc_ID`) VALUES
(14, 'السبت', '5 م', '9 م', '2016-08-03', '1', '1'),
(15, 'الاحد', '5 م', '10 م', '2016-08-03', '10', '5'),
(16, 'الاثين', '3', '8 م', '2016-08-16', '3', '4'),
(17, 'الاثنين', '2 م', '5 م', '2016-08-16', '15', '7'),
(18, 'الثلاثاء', '2 م', '6 م', '2016-08-02', '4', '9'),
(19, 'الثلاثاء', '2 م', '7 م', '2016-08-02', '12', '8'),
(20, 'الاربعاء', '3 م', '8 م', '2016-08-03', '2', '7'),
(21, 'الاربعاء', '2 م', ' 7 م', '2016-08-03', '9', '6'),
(22, 'الخميس', '2 م', '6 م', '2016-08-04', '7', '5'),
(23, 'الخميس', '3 م', '7 م', '2016-08-04', '6', '2'),
(24, 'الاحد', '2 م', '7 م', '2016-08-16', '5', '3');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_specialties`
--

CREATE TABLE `schedule_specialties` (
  `schedule_ID` int(11) NOT NULL,
  `Sepc_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule_specialties`
--

INSERT INTO `schedule_specialties` (`schedule_ID`, `Sepc_ID`) VALUES
(1, 1),
(2, 2),
(4, 3),
(5, 4),
(6, 5),
(7, 6),
(8, 7),
(9, 8),
(10, 9);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serv_ID` int(11) NOT NULL,
  `Title` varchar(50) CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL,
  `pic` varchar(200) CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL,
  `Admin_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serv_ID`, `Title`, `description`, `pic`, `Admin_ID`) VALUES
(1, 'غرف العمليات', 'تشمل مستشفي الامل الشلالات على 5 غرف عمليات, 4 منها معدة للعمليات الكبري وغرفة معدة للجراحات الصغري وجراحات المناظير.\r\n\r\nملحق بغرف العمليات فريق كامل من أطباء التخدير للعمل مع فريق الجراحين.\r\n\r\nيتواجد المنسقين الطبيين طوال الوقت لتنظيم التعامل مع الحالات الجراحية لدينا ألى جانب طاقم المساعدين والفنيين.\r\n\r\nيتم دعم غرف العمليات من قبل وحدة رعاية حرجة ذات ثلاثة أسرة متخصصة لتسهيل الإفاقة والمتابعة بعد العمليات الجراحيةالحرجة\r\n\r\nتم تصميم غرف العمليات لتراعي الجودة والمعاييرالدولية لمكافحةالعدوى وتنظيم دخول و خروج الحالات. إلى جانب ضمان التعقيم الكامل للمواد والمعدات المستخدمة في غرف العمليات.', 'عمليات.jpg', 1),
(2, 'الاشعة التشخيصية', 'العمل قائم فى قسم الأشعة طوال اليوم للحالات العادية والحرجة على مدارالأسبوع .\r\n\r\nيشمل القسم العديد من الخدمات التشخيصية منها الأشعة العادية "إكس" و الأشعة التلفزيونية و المقطعية.', 'ash3a.PNG', 1),
(3, 'قسم التحاليل', 'يقدم المعمل جميع أنواع التحاليل الطبية على مدار 24ساعة بأعلى مستويات الدقة والأمان بالإضافة إلى ذلك وجود طاقم طبي متخصص فى التحاليل الطبية لتقديم الدعم الكافي لجميع الأطباء فى جميع التخصصات المختلفة عن طريق تقديم أدق النتائج فى أسرع وقت للوصول للتشخيص الصحيح وبدء خطة العلاج. من خلال معمل تحليل السلامة, يمكنكم الشعور بجودة الخدمة المقدمة التي تتميزبالدقة, الأطباءالمتخصصين , توافرالخدمة طوال اليوم , سرعة تسليم النتائج , إلى جانب العمل بنظام الباركود منعا للخلط بين العينات.', 'تحاليل.JPG', 1),
(4, 'الصيدلية', 'ننفرد فى مستشفيات الامل بتطبيق الصيدلة الأكلينيكية , و هو مجال صيدلي معني بالممارسةالصحيحة لاستخدام الدواء. و من خلاله يوفرالرعاية الدوائية المتكاملة للمرضي.\r\n\r\nيحصل المريض علي العديد من مزايا تطبيق الصيدلة الأكلينيكية: شفاء أفضل,التعامل مع الحالات الحرجة، ومنع الأخطاء الدوائية، وتثقيف المريض.', 'صيدلية.jpg', 1),
(5, 'العناية القلبيه', 'تعمل بسعة 7 أسرة بينهم سرير في غرفة مخصصة للعزل .\r\n\r\n.يتم تشغيل وحدة العناية القلبية تحت إشراف استشاريين القلب والأوعية الدموية', 'العناية_القلبية.PNG', 1),
(6, 'العناية المركزة', 'تعمل بسعة 16 سريرا بينهما اثنان في غرف مخصصة للعزل. وتقدم الرعاية من خلال ممرضة لكل مريض , كما يشرف أطباء الرعاية الحرجة والاستشاريين على الوحدة إلى جانب المتابعة الدورية لجميع المرضى يوميا لرصد التقدم فى الحالات و فعالية العلاج.\r\n\r\nكما تحتوي وحدة العناية المركزة على 16 جهاز تنفس صناعي و شاشات متابعة لكل مريض التي يتم عرضها مركزيا في قسم التمريض.', 'العناية_المركزة.PNG', 1),
(7, 'وحدة القسطرة', '\r\nمن خلالها تتم العديد من التدخلات العلاجية من خلال جهاز [GE - Model Q 3100] , و الذى يعد  من أحدث ابداعات التكنولوجيا الطبية, و يعمل الجهاز على مساعدة الأطباء فى الحصول على تصور واضح للحالات التى تتطلب القسطرة و القيام بتدخل علاجي أكثر فعالية.\r\n\r\nوحدة القسطرة تساهم فى توفير اجراء علاجي غير مؤلم ولا يتطلب القيام بالتخدير الكلي, ويساهم فى تسهيل علاج  الحالات الهامة بما في ذلك؛ قسطرةالقلب والشرايين التاجية والأوعية الدموية, توسيع الشرايين, تركيب الدعامات و القساطر الدماغية بالإضافة إلى حالات أخرى ككسور العمود الفقري والنزيف الداخلي، و الحالات التي تتطلب العلاج بالأشعة التداخلية.', 'القسطرة.PNG', 1),
(8, 'الوحدة المركزية لمعالجة الأدوية الوريدية', 'على مدار عملنا اليومي ،يتم أعطاء نسبة كبيرة من الأدوية عن طريق الحقن ويتم تجهيز هذة الأدوية بصورة فورية قبل الحقن من قبل طاقم التمريض. \r\n\r\nتوحيد و مركزية إعداد تجهيز هذة الأدوية بواسطة صيدلية مستشفيات أندلسية تساهم للحد من المخاطر والأخطاء المختلفة الناتجة عن هذة العملية .\r\n\r\nأصبحت هذة الوحدة عنصراً أساسياً في عمل صيدلية مستشفيات أندلسية حيث يتم إعداد الأدوية المختلفة تبعاً للمواصفات القياسية المستخدمة فى الأعداد والتعقيم والتي تقلل من المخاطر والأخطاء للحد الأدنى وزيادة فعالية الأدوية التى  قد يحتاجها المرضي عن طريق الحقن.', 'وحدة_معالجة_ادوية.PNG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `Sepc_ID` int(11) NOT NULL,
  `Specialty_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL,
  `img` varchar(200) CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL,
  `Admin_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`Sepc_ID`, `Specialty_name`, `img`, `Admin_ID`) VALUES
(1, 'انف واذن وحنجرة', 'اذن_وحنجرة.jpg', 1),
(2, 'باطنة', 'باطنة.jpg', 1),
(3, 'عيون', 'عيون.jpg', 1),
(4, 'جلدية', 'جلدية.jpg', 1),
(5, 'مخ واعصاب', 'مخ واعصاب.jpg', 1),
(6, 'امراض نسا وتوليد', 'توليد.jpg', 1),
(7, 'المسالك البوليه', 'مسالك.jpg', 1),
(8, 'اطفال', 'اطفال.jpg', 1),
(9, ' اسنان', 'اسنان.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `patient_ID` (`patient_ID`),
  ADD KEY `schedule_ID` (`schedule_ID`),
  ADD KEY `Sepc_ID` (`Sepc_ID`),
  ADD KEY `schedule_ID_2` (`schedule_ID`),
  ADD KEY `Doc_ID` (`Doc_ID`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_ID`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`Doc_ID`),
  ADD KEY `Admin_ID` (`Admin_ID`),
  ADD KEY `Sepc_ID` (`Sepc_ID`);

--
-- Indexes for table `doctors_schedule`
--
ALTER TABLE `doctors_schedule`
  ADD KEY `schedule_ID` (`schedule_ID`),
  ADD KEY `doc_ID` (`doc_ID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_ID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_ID`),
  ADD KEY `Doc_ID` (`Doc_ID`),
  ADD KEY `Sepc_ID` (`Sepc_ID`);

--
-- Indexes for table `schedule_specialties`
--
ALTER TABLE `schedule_specialties`
  ADD KEY `Sepc_ID` (`Sepc_ID`),
  ADD KEY `schedule_ID` (`schedule_ID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serv_ID`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`Sepc_ID`),
  ADD KEY `Admin_ID` (`Admin_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `Doc_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serv_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `Sepc_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctors_schedule`
--
ALTER TABLE `doctors_schedule`
  ADD CONSTRAINT `doctors_schedule_ibfk_1` FOREIGN KEY (`schedule_ID`) REFERENCES `_schedule` (`schedule_ID`),
  ADD CONSTRAINT `doctors_schedule_ibfk_2` FOREIGN KEY (`doc_ID`) REFERENCES `doctors` (`Doc_ID`);

--
-- Constraints for table `schedule_specialties`
--
ALTER TABLE `schedule_specialties`
  ADD CONSTRAINT `schedule_specialties_ibfk_1` FOREIGN KEY (`schedule_ID`) REFERENCES `_schedule` (`schedule_ID`),
  ADD CONSTRAINT `schedule_specialties_ibfk_2` FOREIGN KEY (`Sepc_ID`) REFERENCES `specialties` (`Sepc_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
