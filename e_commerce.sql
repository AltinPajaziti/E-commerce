-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2024 at 11:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `administratoret`
--

CREATE TABLE `administratoret` (
  `ID_Administratori` int(11) NOT NULL,
  `Emri` varchar(255) NOT NULL,
  `passwordi` varchar(255) NOT NULL,
  `ID_Kontakti` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administratoret`
--

INSERT INTO `administratoret` (`ID_Administratori`, `Emri`, `passwordi`, `ID_Kontakti`) VALUES
(1, 'Altini', 'altini123', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategoria_produkteve`
--

CREATE TABLE `kategoria_produkteve` (
  `ID_Kategoria` int(11) NOT NULL,
  `Emri` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategoria_produkteve`
--

INSERT INTO `kategoria_produkteve` (`ID_Kategoria`, `Emri`) VALUES
(1, 'IT_Tech'),
(2, 'Elektroshtepiake'),
(3, 'RC_Control'),
(4, 'Telefona');

-- --------------------------------------------------------

--
-- Table structure for table `kontakti`
--

CREATE TABLE `kontakti` (
  `ID_Kontakti` int(11) NOT NULL,
  `Emri` varchar(255) NOT NULL,
  `Mbiemri` varchar(255) NOT NULL,
  `Nr_Telefonit` varchar(30) NOT NULL,
  `Adresa` varchar(40) DEFAULT NULL,
  `Emaili` varchar(40) DEFAULT NULL,
  `pershkrimi` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontakti`
--

INSERT INTO `kontakti` (`ID_Kontakti`, `Emri`, `Mbiemri`, `Nr_Telefonit`, `Adresa`, `Emaili`, `pershkrimi`) VALUES
(20, 'altin', 'pajaziti', '45990550', 'hello', 'altin.pajaziti.st@uni-gjilan.net', 'a'),
(21, 'altin', 'pajaziti', '45990550', 'hello', 'altin.pajaziti.st@uni-gjilan.net', 'a'),
(22, 'altin', 'pajaziti', '23', 'aa', 'altin.pajaziti.st@uni-gjilan.net', 'aaaa'),
(23, 'z', 'z', '23', 'sd', 'altin.pajaziti.st@uni-gjilan.net', 'sd'),
(24, 'Albi', 'Mehmeti', '213213', 'TEst', 'albi.mehmeti.st@uni-gjilan.net', 'asdad');

-- --------------------------------------------------------

--
-- Table structure for table `perdoruesi`
--

CREATE TABLE `perdoruesi` (
  `ID_Perdoruesi` int(11) NOT NULL,
  `Emri` varchar(255) NOT NULL,
  `Mbiemri` varchar(255) NOT NULL,
  `Adresa` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `ID_Produkti` int(11) DEFAULT NULL,
  `passwordi` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perdoruesi`
--

INSERT INTO `perdoruesi` (`ID_Perdoruesi`, `Emri`, `Mbiemri`, `Adresa`, `Email`, `ID_Produkti`, `passwordi`) VALUES
(10, 'lirimi', 'Petrevalia', 'stanqiq', 'lirim.ymeri.st@uni-gjilan.net', NULL, 'lirqo123'),
(26, 'Altin', 'Pajaziti', 'Viti', 'altin-pajaziti@outlook.com', NULL, 'altini123'),
(27, 'albi', 'Mehmeti', 'Ulqini', 'albimehmeti777@gmail.com', NULL, 'albi'),
(29, 'Lirim', 'Ymeri', 'Zheger', 'lirimymeri18@gmail.com', NULL, 'lirim'),
(30, 'li', 'ym', 'test', 'lirimymeri18@gmail.com', NULL, '123');

-- --------------------------------------------------------

--
-- Table structure for table `produktet`
--

CREATE TABLE `produktet` (
  `ID_Produkti` int(11) NOT NULL,
  `Emri` varchar(255) NOT NULL,
  `Lloji` varchar(255) NOT NULL,
  `Cmimi` float NOT NULL,
  `Foto` varchar(50) DEFAULT NULL,
  `Pershkrimi` varchar(250) DEFAULT NULL,
  `ID_Kategoria` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produktet`
--

INSERT INTO `produktet` (`ID_Produkti`, `Emri`, `Lloji`, `Cmimi`, `Foto`, `Pershkrimi`, `ID_Kategoria`) VALUES
(6, 'Iphone 11', 'Apple', 400, 'iphone11.jpg', 'iPhone 11 eshte nje smartfon i Apple, i cili u prezantua ne shtator te vitit 2019. Me nje dizajn modern dhe ngjyra te ndritshme, iPhone 11 ka nje ekran Liquid Retina, sistem te dyfishte kamerash per fotografi te shkelqyera, dhe perdor chipset-in A13 ', 4),
(8, 'Iphone 12', 'Apple', 500, 'iphone12.jpg', 'iPhone 12, prezantuar ne tetor te vitit 2020, sjell nje dizajn te ri kockor me nje ekran Super Retina XDR. Ai perdor chipset-in A14 Bionic dhe mbeshtet teknologjine e rrjetit 5G. Kamera e tij ofron fotografi te pershkelqyera, ndersa magjija e MagSafe', 4),
(9, 'Iphone 13', 'Apple', 600, 'iphone13.jpg', '\r\niPhone 13, i prezantuar ne shtator te vitit 2021, vazhdon rrugen e suksesit. Me nje ekran te permiresuar dhe kameren e fuqishme, perdor chipset-in A15 Bionic per performance te shkelqyer. Perveq kesaj, bateria eshte optimizuar per nje jete te zgjat', 4),
(10, 'Iphone 14', 'Apple', 700, 'iphone14.jpeg', 'Ky model sjelle permiresime ne dizajn, teknologji kamerash, dhe mund te perdor nje chipset te fuqishem te zbatuar nga Apple.', 4),
(11, 'Iphone 15', 'Apple', 800, 'iphone15.png', 'iPhone 15, nje vijues i linjes se suksesshme te smartfoneve te Apple,i cili te sjelle nje kombinim te inovacioneve te reja dhe permiresime te teknologjise aktuale. Me nje dizajn te riformuar dhe perdorimin e materialeve te avancuara.', 4),
(12, 'Samsung 21 Ultra', 'Samsung', 400, 'samsung21.jpg', 'Prezantuar ne fillim te vitit 2021, Galaxy S21 Ultra ka nje dizajn terheqes dhe nje ekran Dynamic AMOLED me teknologjine adaptive refresh rate per pervoje shikimi me te bute. Perforcon performancen me nje chipset te fuqishem, kamerat e tij te shumta ', 4),
(13, 'Samsung 22 Ultra', 'Samsung', 500, 'samsung22.png', 'Ne pritje te nje versioni te ardhshem,Galaxy S22 Ultra te sjelle permiresime ne performance, cilesine e kamerave dhe inovacione ne dizajn. Ka nje chipset me te fuqishem, nje ekran me te permiresuar, dhe karakteristika te reja te softuerit qe e permir', 4),
(14, 'Samsung 23 Ultra', 'Samsung', 800, 'samsung23.jpg', 'Galaxy S23 Ultra pritet te vijoje traditen e suksesit te serise se meparshme. Perveq nje chipset-i te fuqishem dhe nje ekrani te permiresuar, ka inovacione ne teknologjine e kamerave dhe permiresime te tjera qe e bejne ate nje zgjedhje terheqese.', 4),
(15, 'Dron DCenta', 'Dron rc', 450, 'dron1.webp', 'Dronet e pergjithshem jane modelet baze qe perdoren per shume qellime, perfshire fotografine ajrore, filmimin, dhe argetimin. Keta drone jane te dizajnuar per perdorim te gjere dhe kane shume karakteristika te pershtatshme per perdoruesin e pergjiths', 3),
(16, 'Dron HS100', 'Dron rc', 600, 'dron2.webp', 'Dronet fotografike jane specializuar per te ofruar cilesi te larte te imazheve dhe video. Permbajne kamera te fuqishme  dhe stabilizim te imazheve per te siguruar rezultate te persosura fotografike nga ajri.', 3),
(17, 'Dron HS230', 'Dron rc ', 1000, 'dron3.jpg', 'Dronet e shpejtesise jane te dizajnuar per garat e droneve. Ata jane te lehte, te afte per manovra te shpejta dhe kane sisteme te avancuara te drejtimtarise per garat adrenaline-fuqishme.', 3),
(18, 'Dron HS400', 'Dron rc', 850, 'dron4.jpg', 'Keta drone jane te perdorur per inspektim ne vendet te veshtira per t\'u arritur nga njerezit. Per shembull, ata mund te perdoren per te kontroluar lartesine e antenave ose per te inspektuar ndertesa te larta.', 3),
(19, 'Dron Wiltoys', 'Dron rc', 1200, 'dron5.webp', 'Perdoret ne bujqesi per monitorimin e kulturave dhe tokes. Dronet agrare mund te ndihmojne ne identifikimin e semundjeve, nevojat e ujit, dhe zhvillimin e kulturave bujqesore.', 3),
(20, 'Dron E88', 'Dron rc', 550, 'dron6.jpg', 'Keta drone perdoren per mbikeqyrjen dhe survejimin e territoreve. Mund te kene kamera te ndihmuara nga AI per te identifikuar dhe monitoruar aktivitetin e ndryshem.', 3),
(21, 'Dron Quadcopter', 'Dron rc', 680, 'dron7.jpg', 'Nje lloj droni qe operon nen uje per shperndarjen e eksplorimeve ne oqeane apo per te monitoruar strukturat nen uje.', 3),
(22, 'Dron Wondertech', 'Dron rc', 1500, 'dron8.webp', 'Perdoret per ndihme humanitare ne zonat e pasigurta apo emergjencat. Mund te barte furnizime te nevojshme ose te ndihmoje ne misionet e shpetimit.', 3),
(23, 'Klime smart', 'Klime', 1000, 'smartklime.jpg', 'Klima smart eshte nje paisje e nderthurur me teknologji te avancuar qe ka per qellim te beje menaxhimin e klimes ne nje ambient te brendshem me te pershtatshme dhe me efikase. ', 2),
(24, 'Smart TV Samsung', 'Samsung', 1350, 'samsung2.jpg', 'Ky Smart TV ofron nje eksperience te shkelqyer te pamjes me teknologjine QLED per ngjyrat e pasura dhe kontrastin e thelle. Perdor aplikacione te integruara dhe asistentin virtual Bixby per kontroll te lehte me ze ose me dore.', 2),
(25, 'LG smart tv', 'LGG', 1400, 'lg1.jpg', 'Perjetoni cilesi te larte te imazhit dhe kontrastit me ekranin OLED te ketij Smart TV. Sistemi operativ webOS mundeson navigim te lehte ne aplikacione dhe sherbimet e transmetimit.', 2),
(26, 'LG smartTV 100', 'LG', 800, 'lg2.jpg', 'Me sistem operativ Android TV, ky model ofron qasje te pershtatshme ne aplikacione dhe lojera nga Google Play. Ekrani HDR siguron detaje te pasura dhe ngjyra te qarta.', 2),
(27, 'Samsung 6 smart tv', 'Samsung', 1500, 'tv1.jpg', 'Ky Smart TV vjen me SmartCast, nje platforme qe lejon shperndarjen e permbajtjes nga pajisjet mobile ne televizor. Ndihmesja virtual Google Assistant dhe Amazon Alexa jane te perfshira per kontroll te lehte me ze.', 2),
(28, 'Philips Smart tv', 'Philips', 1800, 'philips.jpg', 'Kjo sere e Smart TV perdor platformen Roku per nje zgjedhje te gjere te aplikacioneve dhe kanaleve. Ekrani 4K UHD siguron nje pamje te mahnitshme.', 2),
(29, 'Nokia smart tv', 'Nokia', 850, 'nokiatv.jpg', 'Perdor teknologjine ULED per te permiresuar kontrastin dhe per te siguruar ngjyra te paster. Sistemi operativ VIDAA U ofron nje pervoje te perdoruesit intuitive.', 2),
(30, 'Nexus smart tv', 'Nexus', 950, 'nexus.png', 'Kjo Smart TV ofron nje imazh te qarte dhe realistik me teknologjine e imazhit HDR. Sistemi operativ My Home Screen 5.0 mundeson personalizim te lehte te skedareve dhe aplikacioneve te preferuara.', 2),
(31, 'Mini klime smart', 'Ninja', 500, 'klim2.jpg', 'Mini klima smart eshte nje pajisje kompakte dhe inteligjente per kontrollin e ambientit ne nje hapesire te vogel. Kjo mini klime perdor teknologjite e fundit per te rregulluar temperaturen, lageshtine dhe cilesine e ajrit ne menyre efikase.', 2),
(39, 'Samsung laptop tablet ', 'Samsung', 1800, 'samtablap.jpg', 'Nje tablet laptop, ndonjehere i njohur edhe si \"2-in-1\" ose \"hybrid,\" eshte nje paisje hibride qe kombinon karakteristikat e nje tablet dhe nje laptopi ne nje pajisje te vetme. Ky lloj pajisjeje ofron fleksibilitet per te perdorur nje ekran te preksh', 1),
(45, 'Microsoft Laptop', 'Microsoft', 2000, 'microsoft.jpg', 'Laptopi Microsoft Surface Laptop 4 eshte nje nga produktet me te fundit te Microsoft. Me nje dizajn terheqes dhe cilesi te larte te ndertimit, ofron nje eksperience te shkelqyer me ekranin PixelSense dhe performance te fuqishme. eshte ideal per perdo', 1),
(46, 'Acer laptop', 'Acer', 1500, 'acer.jpg', 'Acer Swift 3 eshte nje laptop i njohur per cilesine e tij te mire dhe performancen e pranueshme, duke ofruar nje zgjedhje te arsyeshme per perdoruesit qe kerkojne nje laptop te pershtatshem ekonomik.', 1),
(47, 'HP laptop ', 'HP', 2100, 'hp1.jpg', 'HP Spectre x360 eshte nje laptop konvertues me dizajn terheqes, i njohur per shkelqimin e tij ne cilesi dhe fleksibilitetin e tastieres se kthyeshme. Ekrani i tij IPS ofron pamje te qarta, ndersa performanca e tij e ben ate nje zgjedhje te duhur.', 1),
(48, 'HP Compaq', 'HP', 2300, 'hpcompaq.jpg', 'Laptopi HP Compaq eshte nje model i njohur per qendrueshmerine dhe performancen e tij te besueshme. Pershtatet per perdorim te perditshem ne zyre ose shtepi dhe ofron nje pervoje te perdoruesit te pershtatshme.', 1),
(49, 'Macbook', 'Apple', 3000, 'macbook.jpg', 'MacBook Air eshte nje ikone e produktit Apple, i njohur per dizajnin e tij te holle dhe performancen e larte. Me nje ekran te larte cilesie Retina dhe sistemin operativ MacOS, ofron nje pervoje te perdoruesit te sofistikuar.', 1),
(50, 'Sony PRO Projektor', 'Sony', 1000, 'sonypro.jpg', 'Projektoret Sony jane nje pjese e linjes se produkteve te kompanise qe shquhen per teknologjine e tyre te larte dhe cilesine e imazhit. Perveq se perdoren ne ambientet profesionale, projektoret Sony jane te njohur edhe per perdorim ne shtepi dhe kine', 1),
(51, 'Dell Laptop', 'Dell', 1500, 'dell.webp', 'XPS 13 eshte nje laptop i njohur per dizajnin e tij te holle dhe ekranin e bezel-less. Me ekranin e tij te cilesise se larte, performancen e shpejte, dhe ndertimin cilesor, eshte nje zgjedhje popullore per perdoruesit e avancuar.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shporta`
--

CREATE TABLE `shporta` (
  `ID_Shporta` int(11) NOT NULL,
  `Emri` varchar(255) NOT NULL,
  `Sasia` int(11) NOT NULL,
  `Cmimi` float NOT NULL,
  `ID_Perdoruesi` int(11) NOT NULL,
  `Foto` varchar(50) DEFAULT NULL,
  `Lloji` varchar(50) DEFAULT NULL,
  `Pershkrimi` varchar(300) DEFAULT NULL,
  `Adresa` varchar(200) DEFAULT NULL,
  `Koha_Azhurnimit` timestamp NOT NULL DEFAULT current_timestamp(),
  `Numri` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shporta`
--

INSERT INTO `shporta` (`ID_Shporta`, `Emri`, `Sasia`, `Cmimi`, `ID_Perdoruesi`, `Foto`, `Lloji`, `Pershkrimi`, `Adresa`, `Koha_Azhurnimit`, `Numri`) VALUES
(81, 'Iphone 11', 0, 400, 27, 'iphone11.jpg', 'Apple', 'iPhone 11 eshte nje smartfon i Apple, i cili u prezantua ne shtator te vitit 2019. Me nje dizajn modern dhe ngjyra te ndritshme, iPhone 11 ka nje ekran Liquid Retina, sistem te dyfishte kamerash per fotografi te shkelqyera, dhe perdor chipset-in A13 ', 'Ulqini', '2024-01-20 14:32:11', 'sad'),
(82, 'Iphone 13', 0, 600, 27, 'iphone13.jpg', 'Apple', '\r\niPhone 13, i prezantuar ne shtator te vitit 2021, vazhdon rrugen e suksesit. Me nje ekran te permiresuar dhe kameren e fuqishme, perdor chipset-in A15 Bionic per performance te shkelqyer. Perveq kesaj, bateria eshte optimizuar per nje jete te zgjat', 'Ulqini', '2024-01-20 14:37:05', 'sadsd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administratoret`
--
ALTER TABLE `administratoret`
  ADD PRIMARY KEY (`ID_Administratori`),
  ADD KEY `ID_Kontakti` (`ID_Kontakti`);

--
-- Indexes for table `kategoria_produkteve`
--
ALTER TABLE `kategoria_produkteve`
  ADD PRIMARY KEY (`ID_Kategoria`);

--
-- Indexes for table `kontakti`
--
ALTER TABLE `kontakti`
  ADD PRIMARY KEY (`ID_Kontakti`);

--
-- Indexes for table `perdoruesi`
--
ALTER TABLE `perdoruesi`
  ADD PRIMARY KEY (`ID_Perdoruesi`),
  ADD KEY `ID_Produkti` (`ID_Produkti`);

--
-- Indexes for table `produktet`
--
ALTER TABLE `produktet`
  ADD PRIMARY KEY (`ID_Produkti`),
  ADD KEY `fk_produktet_kategoria` (`ID_Kategoria`);

--
-- Indexes for table `shporta`
--
ALTER TABLE `shporta`
  ADD PRIMARY KEY (`ID_Shporta`),
  ADD KEY `ID_Perdoruesi` (`ID_Perdoruesi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administratoret`
--
ALTER TABLE `administratoret`
  MODIFY `ID_Administratori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategoria_produkteve`
--
ALTER TABLE `kategoria_produkteve`
  MODIFY `ID_Kategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kontakti`
--
ALTER TABLE `kontakti`
  MODIFY `ID_Kontakti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `perdoruesi`
--
ALTER TABLE `perdoruesi`
  MODIFY `ID_Perdoruesi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `produktet`
--
ALTER TABLE `produktet`
  MODIFY `ID_Produkti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `shporta`
--
ALTER TABLE `shporta`
  MODIFY `ID_Shporta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administratoret`
--
ALTER TABLE `administratoret`
  ADD CONSTRAINT `administratoret_ibfk_1` FOREIGN KEY (`ID_Kontakti`) REFERENCES `kontakti` (`ID_Kontakti`);

--
-- Constraints for table `perdoruesi`
--
ALTER TABLE `perdoruesi`
  ADD CONSTRAINT `perdoruesi_ibfk_1` FOREIGN KEY (`ID_Produkti`) REFERENCES `produktet` (`ID_Produkti`);

--
-- Constraints for table `produktet`
--
ALTER TABLE `produktet`
  ADD CONSTRAINT `fk_produktet_kategoria` FOREIGN KEY (`ID_Kategoria`) REFERENCES `kategoria_produkteve` (`ID_Kategoria`);

--
-- Constraints for table `shporta`
--
ALTER TABLE `shporta`
  ADD CONSTRAINT `shporta_ibfk_1` FOREIGN KEY (`ID_Perdoruesi`) REFERENCES `perdoruesi` (`ID_Perdoruesi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
