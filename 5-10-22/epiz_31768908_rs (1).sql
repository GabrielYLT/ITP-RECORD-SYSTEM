-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql102.byetcluster.com
-- Generation Time: Jun 24, 2022 at 04:46 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_31768908_rs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AID` int(255) NOT NULL,
  `AName` varchar(30) NOT NULL,
  `AFirst` varchar(50) NOT NULL,
  `ALast` varchar(50) NOT NULL,
  `AEmail` varchar(255) NOT NULL,
  `APassword` varchar(255) NOT NULL,
  `AStatus` varchar(255) NOT NULL DEFAULT 'Active',
  `ADate` date NOT NULL DEFAULT current_timestamp(),
  `Department` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AID`, `AName`, `AFirst`, `ALast`, `AEmail`, `APassword`, `AStatus`, `ADate`, `Department`) VALUES
(1, 'admin', 'Superadmin', '', '1181203162@student.mmu.edu.my', 'Qwer@1234', 'Active', '2022-05-09', 'All Department'),
(2, 'product', 'Product', 'test', '', 'Qwer@1234', 'Active', '2022-05-11', 'Product'),
(3, 'general', 'General', 'test', 'CharisLeeeee@gmail.com', 'Qwer@1234', 'Active', '2022-05-11', 'General Use'),
(4, 'SAdmin', 'S', 'Admin', '1201201535@student.mmu.edu.my', 'Yong@021211', 'Active', '2022-06-01', 'All Department'),
(5, 'RawMaterial', 'Raw', 'Material', 'test@gmail.com', 'Qwer@1234', 'Active', '2022-06-17', 'Raw Material'),
(6, 'ahmad', 'Ahmad', 'Kashah', 'kashah8860@gmail.com', 'Qwer@1234', 'Active', '2022-06-23', 'Raw Material');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CID` int(11) NOT NULL,
  `CName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CID`, `CName`) VALUES
(1, 'New Year Cookies'),
(2, 'Raya Cookies'),
(3, 'Mooncakes'),
(4, 'Raw Material'),
(5, 'Packing Material'),
(6, 'General Use');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PCode` varchar(255) NOT NULL,
  `PName` varchar(255) NOT NULL,
  `PQty` int(255) NOT NULL,
  `QType` varchar(255) NOT NULL,
  `Stor` varchar(255) NOT NULL,
  `CID` int(30) NOT NULL,
  `PImage` varchar(255) NOT NULL,
  `AID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PCode`, `PName`, `PQty`, `QType`, `Stor`, `CID`, `PImage`, `AID`) VALUES
('2208', '2208 GEL BASE FOOD COLOURING PURPLE ', 0, 'bottle', '', 4, '', 1),
('2211', '2211 GEL BASE FOOD COLOURING APPLE GREEN', 0, 'bottle', '', 4, '', 1),
('2218', '2218 GEL BASE FOOD COLOURING CHILI RED', 0, 'bottle', '', 4, '', 1),
('2223', '2223 GEL BASE FOOD COLOURING IVORY YELLOW', 0, 'bottle', '', 4, '', 1),
('2815', '2815 DARK COUVERTURE CHOCOLATE CALLETS 57.7% 2.5 KG', 0, 'pack', '', 4, '', 1),
('811', '811 DARK COUV 54.5% CALETS 2.5 KG', 0, 'pack', '', 4, '', 1),
('8PS', '83 MM/81.5 MM PRESSURE SEAL', 0, 'unit', '', 5, '', 1),
('9PS', '97.4 MM PRESSURE SEAL ', 0, 'unit', '', 5, '', 1),
('A5B', 'A5 X 3 BROCHURE', 0, 'unit', '', 5, '', 1),
('AB3', 'AIR BUBBLE 3 6/8(DL) (10000 PCS /BAG)', 0, 'unit', '', 5, '', 1),
('AB40', 'AIR BUBBLE 40\' X 100 M X 10 MM (ROLL)', 0, 'unit', '', 5, '', 1),
('AB5', 'AIR BUBBLE 5 1/2 DL (5000 PCS/BAG)', 0, 'unit', '', 5, '', 1),
('AB76', 'AIR BUBBLE 76MM (DL) (10000 PCS/BAG)', 0, 'unit', '', 5, '', 1),
('ABCT', 'AIR BUBBLE 300MM X 1 M CUT (500 PCS/ BAG)', 0, 'unit', '', 5, '', 1),
('ABS1', 'AIR BUBBLE ( AB-S1-10MM*40*100MM)', 0, 'roll', '', 5, '', 1),
('AFBD', 'ALMOND- FLAKE ( BLUE DIAMOND)', 0, 'kg', '', 4, '', 1),
('AFP', 'ALMOND FLAVOURING PASTE ', 0, 'kg', '', 4, '', 1),
('AGS', 'AAA GLUCOSE SYRUP A500', 0, 'jar', '', 4, '', 1),
('AGT', 'ALMOND-GROUND (TREEHOUSE)', 0, 'kg', '', 4, '', 1),
('AHCC', 'ANCHOR HIMELT CHEDDAR CHEESE', 0, 'ctn', '', 4, '', 1),
('ANT', 'ALMOND-NIB (TREEHOUSE)', 0, 'kg', '', 4, '', 1),
('AP', 'ALBUMEN POWDER ', 0, 'kg', '', 4, '', 1),
('ASBB', 'ANCHOR SALTED BULK BUTTER', 0, 'ctn', '', 4, '', 1),
('ASCCG', '100 MM ALUMINIUM SCREW CAP- GOLD', 0, 'unit', '', 5, '', 1),
('ASCS', '83 MM ALUMINIUM SCREW CAP-SLIVER', 0, 'unit', '', 5, '', 1),
('ASS4', 'ADELA SHORTENING S4 4952 16 KG', 0, 'ctn', '', 4, '', 1),
('AUFM', 'ANCHOR UHT FRESH MILK', 0, 'ctn', '', 4, '', 1),
('AUWC', 'ANCHOR UHT WHIPPING CREAM', 0, 'ctn', '', 4, '', 1),
('AZ5', 'AGELESS ZP-50 (6000 PCS /CTN)', 0, 'unit', '', 5, '', 1),
('B10', 'BOS 10015', 0, 'bag', '', 4, '', 1),
('B1M', 'BUBBLE 100 METER (GRADE A)', 0, 'roll', '', 4, '', 1),
('B6CB', 'BOS 6262-CRT BLOK', 0, 'bag', '', 4, '', 1),
('BCCP', 'BELGIUM CHOCOLATE COOKIE PREMIX', 0, 'bag', '', 4, '', 1),
('BCHA', 'BAMBOO CHARCOAL POWDER', 0, 'pack', '', 4, '', 1),
('BCP', 'BC COCOA POWDER (PD 4011)', 0, 'kg', '', 4, '', 1),
('BCPWD', 'BENSDORP COCOA PWD 22/24 DP', 0, 'kg', '', 4, '', 1),
('BETP', 'BEETROOT POWDER', 0, 'pack', '', 4, '', 1),
('BH', 'BIJIAN HITAM', 0, 'pack', '', 4, '', 1),
('BKF', 'BLUE KEY FLOUR', 0, 'bag', '', 4, '', 1),
('BKSR', 'BLUE KEY SELF RAISING FLOUR', 0, 'ctn', '', 4, '', 1),
('BL250', 'BUTTERCUP LUXURY 250 G SP MSIA', 0, 'ctn', '', 4, '', 1),
('BMCC', 'BISKUT MIX CHOCOLATE COOKIES', 0, 'kg', '', 4, '', 1),
('BP', 'BAKING POWDER', 0, 'bag', '', 4, '', 1),
('BPPR', 'BLEACH P.PAPER (ROUND)', 0, 'ream', '', 4, '', 1),
('BSE', 'BROWN SUGAR EMULCO 401031', 0, 'bottle', '', 4, '', 1),
('C.HM', 'Test0', 0, 'ctn', '', 4, '', 1),
('CASP', 'è…°è±†åŠ CASHEW SPLIT', 0, 'kg', '', 4, '', 1),
('CFE2', 'COFFEE FLAVOUR/ESSENCE (2008)', 0, 'bottle', '', 4, '', 1),
('CFHF', 'COCONUT FLAKES (HAWAIIAN) (FRANKLIN)', 0, 'kg', '', 4, '', 1),
('CM.WRT', 'Test1.0', 0, 'bag', '', 6, '', 4),
('CPBB', 'CORMAN PATISY BUTTER BLEND', 0, 'tube', '', 4, '', 1),
('CPHL', 'CUSTARD POWDER (HALAL)', 0, 'bag', '', 4, '', 1),
('CRE', 'CREMYVIT', 0, 'bag', '', 4, '', 1),
('CSA', 'CAP SAUH', 0, 'ctn', '', 4, '', 1),
('CST', 'CORN STARCH', 0, 'bag', '', 4, '', 1),
('CSV', 'CASHEWNUT SPLIT (V)', 0, 'kg', '', 4, '', 1),
('DCCC', 'DARK COMPOUND CHOCOLATE CHIPS (GCB)', 0, 'ctn', '', 4, '', 1),
('DCCP', 'DARK COMPOUND CHOCOLATE PASTE (GCB)', 0, 'ctn', '', 4, '', 1),
('DDC90', 'DLBB DIE CUT 10MM X 90 MM X 90 MM (10000 PCS /BAG)', 0, 'unit', '', 5, '', 1),
('DDC98', 'DLBB DIE CUT 10MM X 98 MM X 98 MM (5000 PCS/BAG)', 0, 'unit', '', 5, '', 1),
('DHA6', 'DRAGON HORSE ABALONE 6â€˜S (SOUP) ä¸Šæ±¤é²é±¼', 0, 'ctn', '', 4, '', 1),
('DHB5', 'DRAGON HORSE BRAISED ABALONE IN BROWN SAUCE 5â€™S çº¢çƒ§é²é±¼', 0, 'ctn', '', 4, '', 1),
('DSCP', 'DRIED SLICED CRANBERRY (PO 1198)', 0, 'kg', '', 4, '', 1),
('EGAG', 'EMB GRAN AMICI GRATED (PAMESAN CHEESE)', 0, 'ctn', '', 4, '', 1),
('FBLU', 'FRUITFIL BLUEBERRY', 0, 'kg', '', 4, '', 1),
('FDP', 'åç§æ¦´èŽ²æ³¥', 0, 'kg', '', 4, '', 1),
('FGP', 'FLAVORMONT GRATED PARMESAN', 0, 'pack', '', 4, '', 1),
('G(L)', 'GLOVE- 240 MM NITRILE DISPOSABLE P/FREE (L) (100 PCS X 10 BOXES (CTN))', 0, 'unit', '', 5, '', 1),
('G(M)', 'GLOVE- 240 MM NITRILE DISPOSABLE P/FREE (M) (100 PCS X 10 BOXES (CTN))', 0, 'unit', '', 5, '', 1),
('G(S)', 'GLOVE- 240 MM NITRILE DISPOSABLE P/FREE (S) (100 PCS X 10 BOXES (CTN))', 0, 'unit', '', 5, '', 1),
('GHV', 'GARAM HALUS VACUM', 0, 'bag', '', 4, '', 1),
('GIC', 'GULA ICING CSR', 0, 'bag', '', 4, '', 1),
('GMFF', 'GULA MELAKA FLAVOUR (FILLING)', 0, 'bottle', '', 4, '', 1),
('GMS4', 'GF MACADAMIAS NUT STYLE 4', 0, 'ctn', '', 4, '', 1),
('GMS6', 'GF MACADAMIAS NUT STYLE 6D ', 0, 'ctn', '', 4, '', 1),
('GTP', 'GREEN TEA POWDER', 0, 'ctn', '', 4, '', 1),
('HMS', 'HYDROGENATED MALTOSE SYRUP', 0, 'drum', '', 4, '', 1),
('HQ300', 'HQ300RJS8 300ML ROUND JAR', 0, 'unit', '', 5, '', 1),
('HQ750', 'HQ750RSJ10 750 ML ROUND JAR ', 0, 'unit', '', 5, '', 1),
('INCE', 'INSTANT CEREAL', 0, 'kg', '', 4, '', 1),
('JOF', 'JMM ORDER FORM', 0, 'unit', '', 5, '', 1),
('JV', 'JMM VOUCHER', 0, 'unit', '', 5, '', 1),
('K108', 'K 108 (2000 PCS/BAG)', 0, 'unit', '', 5, '', 1),
('LSBL', 'LAMSOON SHORTENING BLUE LB', 0, 'ctn', '', 4, '', 1),
('LTF04', 'LTF-04 (1200 PCS/BAG )', 0, 'unit', '', 5, '', 1),
('M60', 'MOONCAKE 60 PCS (520 x 320 X 200 / MM)', 0, 'unit', '', 5, '', 1),
('MBC', 'MACADAMS BUTTERSCOTCH CHIP', 0, 'kg', '', 4, '', 1),
('MCNN', 'MCNN FLOUR', 0, 'bag', '', 4, '', 1),
('MEM', 'MF ELITE MFR', 0, 'bag', '', 4, '', 1),
('MF', 'MANGO FROZEN', 0, 'kg', '', 4, '', 1),
('MFPB', 'MATCHA FLAVOUR POWDER BREWINGS S2', 0, 'pack', '', 4, '', 1),
('MKDP', 'çŒ«å±±çŽ‹æ¦´èŽ²æ³¥', 0, 'kg', '', 4, '', 1),
('MMJ', 'MAZOLA MINYAK JAGUNG', 0, 'ctn', '', 4, '', 1),
('MP', 'MANGO PUREE', 0, 'kg', '', 4, '', 1),
('MP1J', 'MATCHA POWDER LE-1 (JAPAN)', 0, 'kg', '', 4, '', 1),
('MS25', 'MELON SEED (25 KG )', 0, 'kg', '', 4, '', 1),
('MWCC', 'MACADAMS WHITE CHOCOLATE CHIP', 0, 'kg', '', 4, '', 1),
('NBRP', 'NATURAL BROWN RICE POWDER', 0, 'ctn', '', 4, '', 1),
('NELO', 'NESTUM (LOOSE)', 0, 'ctn', '', 4, '', 1),
('OT43', 'OPP TAPE (43 MIC) SIZE: 24MM X 40 MM (TRANS) (240 RLS / CTN)', 0, 'unit', '', 5, '', 1),
('OT45', 'OPP TAPE (45 MIC) SIZE: 18MM X 40 MM (TRANS) (320 RLS / CTN)', 0, 'unit', '', 5, '', 1),
('OT50', 'OPP TAPE (50 MIC) SIZE: 48MM X 100 MM (TRANS) (96 RLS/CTM)', 0, 'unit', '', 5, '', 1),
('OT53', 'OPP TAPE (53 MIC) SIZE: 48MM X 100 MM (FRAGILE) (96 RLS/CTN)', 0, 'unit', '', 5, '', 1),
('OU30', 'O-SORB U-30 (11 CTNS X 10000 PCS / CTN)', 0, 'unit', '', 5, '', 1),
('OU50', 'O-SORB UN 50 (300 PCS/BAG X 20 BAGS)', 0, 'unit', '', 5, '', 1),
('PEBS', 'PEANUT BUTTER SPREAD', 0, 'kg', '', 4, '', 1),
('PEBU', 'PEANUT BUTTER', 0, 'tube', '', 4, '', 1),
('PFF', 'PASSION FRUIT FROZEN', 0, 'kg', '', 4, '', 1),
('PFHK', 'PRIMA FAIRY (HONGKONG FLOUR)', 0, 'bag', '', 4, '', 1),
('PGRS', 'PXX GRADE REFINED SUGAR', 0, 'bag', '', 4, '', 1),
('PIPA', 'PINEAPPLE PASTE', 0, 'ctn', '', 4, '', 1),
('PKUS', 'PISTACHIO KERNEL(USA) SIZE 21/25', 0, 'kg', '', 4, '', 1),
('POFL', 'POTATO FLAKE', 0, 'kg', '', 4, '', 1),
('PSCB', '100MM PLASTIC SCREW CAP- BLACK', 0, 'unit', '', 5, '', 1),
('PSCN', '100MM PLASTIC SCREW CAP- NATURAL', 0, 'unit', '', 5, '', 1),
('PSCPG', '100MM PLASTIC SCREW CAP- PP GOLD', 0, 'unit', '', 5, '', 1),
('PSCTY', '100MM PLASTIC SCREW CAP- TINTED YELLOW', 0, 'unit', '', 5, '', 1),
('PSPP', 'PURPLE SWEET POTATO POWDER', 0, 'bag', '', 4, '', 1),
('PUKE', 'PUMPKIN KERNEL', 0, 'kg', '', 4, '', 1),
('PUPO', 'PUMPKIN POWDER', 0, 'bag', '', 4, '', 1),
('REOL', 'RED EAGLE OIL', 0, 'ctn', '', 4, '', 1),
('RFGP', 'RANI FRIED GREEN PEAS', 0, 'ctn', '', 4, '', 1),
('RRGN', 'RANI ROASTED GROUND NUT', 0, 'ctn', '', 4, '', 1),
('SBBH', '(S)-BISKUT BIJIAN HITAM(150 MM X 80 MM (6000))', 0, 'unit', '', 5, '', 1),
('SBBS', 'SODIUM BICARBONATE (BAKING SODA)', 0, 'bag', '', 4, '', 1),
('SBBT', '(S)-BISKUT BADAM TRADITIONAL(150 MM X 80 MM (6000))', 0, 'unit', '', 5, '', 1),
('SBC', '(S)-BISKUT COKLAT(150 MM X 80 MM (10000))', 0, 'unit', '', 5, '', 1),
('SBCM', '(S)-BISKUT COKLAT MATCHA(150 MM X 80 MM (10000))', 0, 'unit', '', 5, '', 1),
('SBJ', '(S)-BISKUT JAGUNG(150 MM X 80 MM (10000))', 0, 'unit', '', 5, '', 1),
('SBKB', '(S)-BISKUT KACANG BADAM(150 MM X 80 MM (10000))', 0, 'unit', '', 5, '', 1),
('SBKEM', '(S)-BISKUT KENTANG MANIS(150 MM X 80 MM (10000))', 0, 'unit', '', 5, '', 1),
('SBKG', '(S)-BISKUT KACANG GAJUS(150 MM X 80 MM (10000))', 0, 'unit', '', 5, '', 1),
('SBKM', '(S)-BISKUT KARAMEL MACCHIATO(150 MM X 80 MM (10000))', 0, 'unit', '', 5, '', 1),
('SBKP', '(S)-BISKUT KACANG PIS(150 MM X 80 MM (6000))', 0, 'unit', '', 5, '', 1),
('SBKT', '(S)-BISKUT KENTANG(150 MM X 80 MM (15000))', 0, 'unit', '', 5, '', 1),
('SBKW', '(S)-BISKUT KENTANG (WHEAT)(150 MM X 80 MM (6000))', 0, 'unit', '', 5, '', 1),
('SBN', '(S)- BISKUT NANAS (150 MM X 80 MM (20000))', 0, 'unit', '', 5, '', 1),
('SBNK', '(S)-BISKUT NANAS KEJU(150 MM X 80 MM (6000))', 0, 'unit', '', 5, '', 1),
('SBSSY', '(S)-BLACK SESAME YAM(16.5 MM X 40 MM (15000))', 0, 'unit', '', 5, '', 1),
('SDFC', '(S)-DRAGON FRUIT WITH CRANBERRY(16.5 MM X 40 MM (3000))', 0, 'unit', '', 5, '', 1),
('SEAP', 'SEAWEED POWDER', 0, 'pack', '', 4, '', 1),
('SEPT', 'SESAME PASTE', 0, 'ctn', '', 4, '', 1),
('SEST', 'SERBUK SANTAN', 0, 'ctn', '', 4, '', 1),
('SF500', 'STRETCH FILM (A GRADE) SIZE:500 MM (6 LOG/CTN)', 0, 'unit', '', 5, '', 1),
('SGMC', 'SINGLE MOONCAKE (2000 PCS/BAG)', 0, 'unit', '', 5, '', 1),
('SGMC(JM02)', 'SINGLE MOONCAKE BASE (JM 02) (2000 PCS / BAG)', 0, 'unit', '', 5, '', 1),
('SGRB', 'SB GRADE REFINED BROWN SUGAR - (SB)', 0, 'bag', '', 4, '', 1),
('SID', '(S)-IMPERIAL DURIAN(16.5 MM X 40 MM (15000))', 0, 'unit', '', 5, '', 1),
('SLBSS', '(S)-LAVA BLACK SESAME(16.5 MM X 40 MM (18000))', 0, 'unit', '', 5, '', 1),
('SLT', '(S)-LAVA TIRAMISU (16.5 MM X 40 MM (18000))', 0, 'unit', '', 5, '', 1),
('SMRB', '(S)-MATCHA RED BEAN (16.5 MM X 40 MM (18000))', 0, 'unit', '', 5, '', 1),
('SNPT', '(S)- NANYANG PINEAPPLE TART(80 MM X 180 MM)', 0, 'unit', '', 5, '', 1),
('SOCA', 'SODIUM CARBONATE', 0, 'drum', '', 4, '', 1),
('SP1115', 'SP 1115 PS', 0, 'pieces', '', 5, '', 1),
('SP168', 'SP 168 PS', 0, 'pieces', '', 5, '', 1),
('SP189', 'SP 189 PS', 0, 'unit', '', 5, '', 1),
('SP230', 'SP 230 PET JAR (NORMAL TP NATURAL CAP)', 0, 'pieces', '', 5, '', 1),
('SP250', 'SP 250 PET JAR', 0, 'pieces', '', 5, '', 1),
('SP8030(ARG)', 'SP 8030 PET JAR (ALUMINIUM ROSE GOLD)', 0, 'pieces', '', 5, '', 1),
('SP8066', 'SP 8066 PET JAT (NORMAL TP NATURAL CAP)', 0, 'pieces', '', 5, '', 1),
('SP8080(B)', 'SP 8080 (NORMAL TP BLACK CAP) ', 0, 'pieces', '', 5, '', 1),
('SP8080(N)', 'SP 8080 (NORMAL TP NATURAL CAP)', 0, 'pieces', '', 5, '', 1),
('SP8083(AR)', 'SP 8083 PET JAR (ALUMINIUM RED) ', 0, 'pieces', '', 5, '', 1),
('SP8083(G)', 'SP 8083 PET JAR (NORMAL GOLD CAP) ', 0, 'pieces', '', 5, '', 1),
('SP8090(AG)', 'SP 8090 PET JAR (ALUMINIUM GOLD)', 0, 'pieces', '', 5, '', 1),
('SP8090(ARG)', 'SP 8090 PET JAR (ALUMINIUM ROSE GOLD )', 0, 'pieces', '', 5, '', 1),
('SPMB', '(S)-PANDAN MUNG BEAN (16.5 MM X 40 MM (3000))', 0, 'unit', '', 5, '', 1),
('SPPY', 'SP_PINEAPPLE PASTE (Y)', 0, 'ctn', '', 4, '', 1),
('SSMKD', '(S)-SNOWSKIN MUSANG KING DURIAN (80 MM X 30 MM (40000))', 0, 'unit', '', 5, '', 1),
('SSMP', 'SESAME POWDER', 0, 'ctn', '', 4, '', 1),
('ST', 'SANTAN', 0, 'kg', '', 4, '', 1),
('T1', 'test1', 3, 'pack', '', 1, 'cheering_minions.gif', 1),
('T2', 'Test 2', 41, 'unit', '', 2, 'Randomness-random-5997130-1280-800.jpg', 1),
('T3', 'Test 3', 55, 'unit', '', 3, '8552.gif', 2),
('TDCF', 'TULIP DARK CHOC FILLING (DC3630F)', 0, 'kg', '', 4, '', 1),
('TILP', 'TIRAMISU LOTUS PASTE', 0, 'kg', '', 4, '', 1),
('TKMB', 'TELUR KUNING MASIN B', 0, 'pieces', '', 4, '', 1),
('TKP', 'TEPUNG KACANG PEAS', 0, 'bag', '', 4, '', 1),
('TPTG', 'TEPUNG PULUT-TIGA GAJAH', 0, 'ctn', '', 4, '', 1),
('TRHL', 'TREHALOSE', 0, 'bag', '', 4, '', 1),
('TTE4', 'TEH TARIK EMULCO 415041', 0, 'bottle', '', 4, '', 1),
('UMFL', 'UMGP FLOUR', 0, 'bag', '', 4, '', 1),
('WSSP', 'WHITE SESAME POWDER', 0, 'bag', '', 4, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `SID` int(255) NOT NULL,
  `PCode` varchar(255) NOT NULL,
  `Qty` int(255) NOT NULL,
  `AID` int(255) NOT NULL,
  `DateAdded` datetime NOT NULL DEFAULT current_timestamp(),
  `Remarks` varchar(255) DEFAULT NULL,
  `Status` varchar(255) NOT NULL,
  `exp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`SID`, `PCode`, `Qty`, `AID`, `DateAdded`, `Remarks`, `Status`, `exp`) VALUES
(51, 'T1', 10, 1, '2022-05-24 15:49:13', '', 'Stock In', '0000-00-00'),
(52, 'T1', 12, 1, '2022-05-24 16:43:40', '', 'Stock In', '0000-00-00'),
(53, 'T1', 15, 1, '2022-05-24 16:43:54', '', 'Stock In', '0000-00-00'),
(54, 'T1', 2, 1, '2022-05-24 23:47:25', '-', 'Stock In', '0000-00-00'),
(55, 'T1', 67, 1, '2022-05-25 09:53:00', '', 'Stock In', '0000-00-00'),
(56, 'T1', 10, 1, '2022-05-25 10:51:54', '', 'Stock In', '0000-00-00'),
(57, 'T2', 20, 1, '2022-05-25 11:00:33', '', 'Stock In', '0000-00-00'),
(58, 'T1', 25, 2, '2022-05-25 11:01:34', '', 'Stock In', '0000-00-00'),
(59, 'T2', 30, 2, '2022-05-25 11:01:46', '', 'Stock In', '0000-00-00'),
(60, 'T1', 8, 2, '2022-05-25 11:01:58', '', 'Stock Out', '0000-00-00'),
(61, 'T2', 9, 2, '2022-05-25 11:02:05', '', 'Stock Out', '0000-00-00'),
(62, 'T3', 60, 2, '2022-05-25 11:02:54', '', 'Stock In', '0000-00-00'),
(63, 'T3', 5, 2, '2022-05-25 11:03:04', '', 'Stock Out', '0000-00-00'),
(64, 'T1', 132, 1, '2022-05-30 09:29:42', '-', 'Stock Out', '0000-00-00'),
(65, 'T1', 1, 1, '2022-05-30 09:30:28', '', 'Stock Out', '0000-00-00'),
(66, 'T1', 133, 1, '2022-05-30 09:31:36', '', 'Stock In', '0000-00-00'),
(67, 'T1', 132, 1, '2022-05-30 09:32:18', '', 'Stock Out', '0000-00-00'),
(68, 'T1', 1, 1, '2022-05-30 09:34:11', '', 'Stock Out', '0000-00-00'),
(69, 'T1', 100, 1, '2022-05-30 09:42:04', '', 'Stock In', '0000-00-00'),
(70, 'T1', 99, 2, '2022-05-30 09:42:19', '', 'Stock Out', '0000-00-00'),
(71, 'T1', 100, 1, '2022-05-30 09:42:47', '', 'Stock In', '0000-00-00'),
(72, 'T1', 95, 1, '2022-05-30 09:43:20', '', 'Stock Out', '0000-00-00'),
(73, 'T1', 2, 1, '2022-05-31 09:24:40', '', 'Stock Out', '0000-00-00'),
(74, 'T1', 1, 2, '2022-05-31 09:25:59', '', 'Stock Out', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PCode`),
  ADD KEY `product_ibfk_1` (`CID`),
  ADD KEY `AID` (`AID`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`SID`),
  ADD KEY `AID` (`AID`),
  ADD KEY `PCode` (`PCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `SID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `category` (`CID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`AID`) REFERENCES `admin` (`AID`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`AID`) REFERENCES `admin` (`AID`),
  ADD CONSTRAINT `stock_ibfk_3` FOREIGN KEY (`PCode`) REFERENCES `product` (`PCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
