-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2018 at 01:30 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `llcoprofile`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contacts`
--

CREATE TABLE `tbl_contacts` (
  `contact_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT '0',
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `position` varchar(255) NOT NULL,
  `course` varchar(30) NOT NULL,
  `rating` varchar(30) NOT NULL,
  `cert` varchar(5) NOT NULL,
  `region` varchar(255) NOT NULL,
  `office_assgn` varchar(255) NOT NULL,
  `profession` text NOT NULL,
  `duties` text NOT NULL,
  `contact_no1` varchar(255) NOT NULL,
  `contact_no2` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL COMMENT 'Status',
  `birthday` date NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contacts`
--

INSERT INTO `tbl_contacts` (`contact_id`, `user_id`, `first_name`, `middle_name`, `last_name`, `sex`, `position`, `course`, `rating`, `cert`, `region`, `office_assgn`, `profession`, `duties`, `contact_no1`, `contact_no2`, `email_address`, `status`, `birthday`, `profile_pic`, `username`, `password`) VALUES
(1, 0, 'Louie Ann', 'N.', 'Abello', 'F', 'Senior LEO', 'Level 1A, Level 1B', 'Very Satisfactory', 'Yes', 'NCR', 'Makati-Pasay Field Office', 'BS Electronics and Communication Engineering', 'Hearing Officer/ LLCS/ DO 18-A Verification/ Officer of the Day/ Resource Person', '09989633863', '09258841661', 'lasnarvaez@yahoo.com', 'Active', '1982-08-04', '1398009865_inesta.jpg', 'Laabello', 'WSiWAvyx'),
(2, 0, 'Ma. Elena', 'T.', 'Abueg', 'F', 'Senior LEO', 'Level 1A', '', '', 'NCR', 'Makati-Pasay Field Office', 'Bachelor in Business Education/MPA', '', '09208004477', '', 'althea0009@gmail.com', 'Active', '1966-01-28', 'ozil.jpg', 'eabueg', 'WwK3fbnJ'),
(3, 0, 'Eduvigis', 'A.', 'Acero', 'M', 'Senior LEO', 'Level 1A', '', 'Yes', 'NCR', 'Manila Field Office', 'BS Civil Engineering', '', '09178499749', '', 'gigiacero@yahoo.com', 'Active', '1961-10-16', '1398010176_Rafael_Nadal.jpg', 'eacero', '4NtHNMv9'),
(4, 0, 'Florante', 'DG.', 'Aguilan', 'M', 'Senior LEO', 'Level 1A, Level 1B', 'Very Satisfactory', 'Yes', 'NCR', 'TSSD- LRLS', 'Professional Electrical Engineer', '', '09155517324', '', 'aguilan_dd@yahoo.com', 'Active', '1958-10-27', '1398010215_shahrukh-khan.jpg', 'faguilan', 'Oa7Ximae'),
(5, 1, 'Catherine', 'D.', 'Alcantara', 'F', 'Senior LEO', 'Level 1A, Level 1B', 'Very Satisfactory', '', 'NCR', 'Quezon City Field Office', 'Computer Science Grad - MA Engineering Management (39 units)', '', '09088209247', '', 'cdalcantara2012@gmail.com', 'Active', '1981-06-08', '1398010484_anushka-sharma.jpg', 'calcantara', 'CH7sxVFg'),
(6, 2, 'Melanie', 'P', 'Banayos', 'F', 'Senior LEO', 'Level 1A', 'Very Satisfactory', 'Yes', 'CAR', 'Field Office', 'Professional Mechanical Engineer', '', '09395566590', '', '', 'Active', '1974-05-18', '1479440834_2.png', 'bmelanie', 'J7vmgzxK'),
(7, 2, 'Isabelita', 'M.', 'Codamon', 'F', 'Senior LEO', 'Level 1A', '', '', 'CAR', 'Field Office', '', '', '09989642377', '', 'codamonlita@yahoo.com', 'Active', '1966-02-19', '', 'iscodamon', 'XVk52Qb5'),
(8, 2, 'Emmanuel', '', 'Barcellano', 'M', 'LEO III', 'Level 1A, Level 1B', '', '', 'CAR', 'Field Office', '', '', '09053501466', '', '', 'Active', '1980-09-30', '1398010649_bale.jpg', 'Embarcellano', 'aZgb9r6r'),
(9, 2, 'Jessie', 'D.', 'Bumidang', 'M', 'LEO III', 'Level 1A', '', '', 'CAR', 'Field Office', 'Electrical Engineer', '', '09989622210', '', 'jessiebumidang@gmail.com', 'Active', '1982-07-20', '1398010973_Cristiano_Ronaldo.jpg', 'Jebumidang', 'InCMuGnk'),
(10, 2, 'Jose', 'R.', 'Gamad, Jr.', 'M', 'LEO III', 'Level 1A', '', '', 'CAR', 'Field Office', 'Electrical Engineer', '', '09214423140', '', 'jrgamad@yahoo.com', 'Active', '1965-04-01', '1398011013_david-beckham.jpg', 'Jogamad', 'ErmV2JYn'),
(11, 1, 'Joewena Anna Marie', '', 'Almayda', 'F', 'Senior LEO', 'Level 1A, Level 1B', 'Very Satisfactory', 'Yes', 'NCR', 'Quezon City Field Office', 'BSBA-Marketing & MBA (39 units)', '', '09087725648', '', 'joeyalmayda@gmail.com', 'Active', '1989-05-24', '', 'JAAlmayda', 'NLQg8Lud'),
(12, 3, 'Marlon', 'T', 'De Leon', 'M', 'Senior LEO', 'Level 1A, Level 1B', 'Very Satisfactory', 'Yes', 'RO I', 'La Union Field Office', 'Civil Engineer', 'LLCS/CSHP/BOSH/CST', '09163576646', '', 'marlon_deleon2002@yahoo.com', 'Active', '1977-09-03', '', 'mdeleon', 'RxgxFf7g'),
(13, 3, 'Amanteflor', '', 'Gascon', 'M', 'Senior LEO', 'Level 1A, Level 1B', 'Very Satisfactory', 'Yes', 'RO I', 'Eastern Pangasinan Field Office', 'Civil Engineer', 'LLCS/CSHP', '09498933765', '', 'flor_gascon@yahoo.com', 'Active', '1966-02-24', '', 'gamanteflor', 'xC49Chvt'),
(17, 1, 'Apolonio', '', 'Alvarez  Jr.', 'F', 'Senior LEO', '', '', '', 'NCR', 'PAMAMARISAN Field Office', 'BSC-Accounting', 'LLCS', '09065508857', '', 'apolalvarez@yahoo.com', '', '1965-02-19', '', 'aalvarez', 'DhhDunW1'),
(18, 2, 'Leonardo', 'M.', 'Doguil', 'M', 'Senior LEO', '', '', '', 'CAR', '', '', 'LLCS, DILEEP', '09989642379', '09176282562', 'nardz_bgo@yahoo.com', 'Active', '1969-12-10', '', 'ledoguil', 'wFOlrm81'),
(19, 4, 'Evangeline', 'N.', 'Aguisanda', 'F', 'Senior LEO', '', '', '', 'RO II', 'Isabela Field Office', '', 'LLCS, Livelihood', '09053394898', '', 'evangeline_aguisanda@yahoo.com', '', '1962-09-21', '', 'aevangeline', 'sKpTFjc7'),
(20, 0, 'Jelyn', 'E.', 'Abella', 'F', 'Senior LEO', '', '', '', 'RO III', 'Pampanga Field Office', 'BA/ MA (Education)', 'LLCS', '09175019243', '', 'jelyn_mahal@yahoo.com', 'Active', '1979-10-16', '', 'jabella', 'M7sLmKwq'),
(21, 0, 'Lemuel', '', 'Aguilar', 'M', 'Senior LEO', '', '', '', 'RO IV-A', 'Batangas Field Office', 'REE', 'Technical Inspector/ Hearing Officer', '09163936003', '', 'lem.aguilar820@gmail.com', '', '1967-08-20', '', 'laguilar', 'grh3crCk'),
(22, 0, 'Loreta', 'D.', 'Catapang', 'F', 'Senior LEO', '', '', '', 'RO IV-B', 'Oriental Mindoro Field Office', '', '- CSHP\r\n- Labor Communication Officer Designate\r\n- Issuance of Working Child Permit\r\n- LLCS', '09228710707', '', 'catapang_loreta@yahoo.com', 'Active', '1985-04-21', '', 'lcatapang', 'RLT4VdmH'),
(23, 0, 'Ma. Janette', 'B.', 'Alpajaro', 'F', 'Senior LEO', '', '', '', 'RO V', 'Camarines Norte Field Office', 'BSE', 'LLCS', '09203825897', '', 'ma.janettealpajaro@yahoo.com', 'Active', '1969-06-24', '', 'Mjalparo', '5NhMA43K'),
(24, 0, 'Danilo', 'J.', 'Alcoriza', 'M', 'Senior LEO', '', '', '', 'RO VI', 'Iloilo-Guimaras Field Office', '', 'Assessment', '09292856877', '', 'djalcoriza@yahoo.com', 'Active', '1958-01-21', '', 'djalcoriza', 'u3Rkjj5w'),
(25, 0, 'Joji', 'B.', 'Alia', 'F', 'Senior LEO', '', '', '', 'RO VII', 'Tri-City Field Office', 'AB Political Science', 'Assessment', '09228238289', '', 'joji781016@gmail.com', 'Active', '1957-05-26', '', 'JoAlia', 'ZcNP3yLY'),
(26, 0, 'Aleksei Ceasar', 'D.', 'Abellar', 'M', 'Senior LEO', '', '', '', 'RO VIII', 'Eastern Samar Field Office', 'REE', 'LLCO, Tech. Safety Inspector, Hearing Officer, SEADO/FO SENA Focal', '09193785015', '', 'aleksei_75@yahoo.com', '', '1975-03-08', '', 'Acabellar', 'k2gMnw96'),
(27, 0, 'Marcelina', 'B.', 'Arcaya', 'F', 'Senior LEO', '', '', '', 'RO IX', 'Isabela City Field Office', '', 'TIPC, WODP, SRS, FWP, SPRS Focal', '09273172747', '', 'marciearcaya@yahoo.com', '', '1959-04-26', '', 'Maarcaya', 'Bzj3J27T'),
(28, 0, 'Ebba', 'B.', 'Acosta', 'F', 'Senior LEO', '', '', '', 'RO X', 'Misamis Occidental Field Office', 'LLB, MPA', 'SENA, TCCLS,LIVELIHOOD MONITORING', '09272836737', '', ' ebbaacosta@yahoo.com', 'Active', '1961-09-26', '', 'edacosta', 'mWqy1jsV'),
(29, 0, 'Julieta', 'J.', 'Aguilar', 'F', 'Senior LEO', '', '', '', 'RO XI', 'Davao City Field Office', 'Med. Tech.', 'LLCS,SENA, FWP,GAD', '09177019811', '', 'jojiaguilar@yahoo.com', 'Active', '1959-06-29', '', 'ajulieta', 'fFgM47wJ'),
(30, 0, 'Lourdes', 'C.', 'Ali', 'F', 'Senior LEO', '', '', '', 'RO XII', 'Sarangani Field Office', 'BSC Accounting/\r\nMPA 12 units', 'LLCS', '09205440996', '', 'nenengcerialali@gmail.com', 'Active', '1962-11-13', '', 'lali', 'pz4CbVzr'),
(31, 0, 'Lilibeth', '', 'Delicana', 'F', 'Senior LEO', '', '', '', 'CARAGA', 'Agusan Del Norte Field Office', '', 'Focal Person: Labor Relations,  LLCS; SEADO\r\nOther functions:  Internal Auditor (ISO); Member (PRAISE Committee)', '09155150715', '', 'lilibeth_delicana@yahoo.com', 'Active', '1963-12-30', '', 'LPDelicana', 'qjYro9PJ'),
(32, 0, 'Erlinda', 'W.', 'Apale', 'F', 'Senior LEO', '', '', '', 'RO XI', 'Davao del Norte Field Office', '', 'LLCS, SENA, LHP, LR, LS', '09395433000', '', 'erlinda731@yahoo.com', 'Active', '1957-07-31', '', 'ErApale', 'OzGrptay'),
(36, 0, 'fasdfa', '', 'fdas', '', '', '', '', '', 'CAR', '', '', '', 'dfas', '', 'fdasfdsadfa', '', '0000-00-00', '', 'fdas', 'fdas'),
(37, 0, 'Jeanette', '', 'Guevarra', '', '', '', '', '', 'RO XII', '', '', '', 'fdsaf', '', 'fasddfasf', '', '0000-00-00', '1521270822_9813bb37-74db-4cfd-8795-a82f16e38621.jpg', 'fdasdfas', 'fdsafdasdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `contact_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT '0',
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `pw` varchar(30) NOT NULL,
  `region` varchar(20) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `contact_no1` varchar(30) NOT NULL,
  `email_address` varchar(30) NOT NULL,
  `ncr` tinyint(1) DEFAULT '0',
  `car` tinyint(1) DEFAULT '0',
  `ro1` tinyint(1) DEFAULT '0',
  `ro2` tinyint(1) DEFAULT '0',
  `ro3` tinyint(1) DEFAULT '0',
  `admin` tinyint(1) DEFAULT '1',
  `can_add` tinyint(1) DEFAULT '0',
  `can_edit` tinyint(1) DEFAULT '0',
  `can_delete` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`contact_id`, `user_id`, `username`, `password`, `pw`, `region`, `last_name`, `first_name`, `contact_no1`, `email_address`, `ncr`, `car`, `ro1`, `ro2`, `ro3`, `admin`, `can_add`, `can_edit`, `can_delete`) VALUES
(1, 1, 'corpepito', '597f723d027f1cb2adeb4560079b276f58f0d429', 'PhLaewi5', 'NCR', 'Pepito', 'Ma. Corazon', '003240062412', '', 1, 0, 0, 0, 0, 0, 0, 1, 0),
(2, 20, 'jeguevarra', 'fc97af8ddeb0d3eb4f2e1c99cd80003abd276486', 'Dz33xHST', 'BWC', 'Guevarra', 'Jeanette', '09988495401', '', 0, 0, 0, 0, 0, 1, 0, 0, 0),
(3, 2, 'HJalbuena', '6b8ddbd69a9a574e2a71b3cd8a56ec2b1155229f', 'BZTGBQom', 'CAR', 'Jalbuena', 'Henry John', '09189033743', 'red_cardinal2003@yahoo.com', 0, 1, 0, 0, 0, 0, 0, 1, 0),
(4, 3, 'GUrsua', '3c773d31df6288f0641261b152aa2b726f1b4517', 'mDeb45yB', 'RO I', 'Ursua', 'Grace', '', '', 0, 0, 1, 0, 0, 0, 0, 1, 0),
(5, 0, 'SRodriguez', 'cf4bdf175b80e519ac48b4ef70f891910cba93e8', '47L4BmnA', 'RO II', 'Rodriguez', 'Sixto', '0783045085', 'sixtopopoy@yahoo.com', 0, 0, 0, 0, 0, 1, 0, 0, 0),
(6, 0, 'Andione', 'd7272c6cc2f2f8396c3c4808c39c81d432558ba9', 'RBspxjA6', 'RO III', 'Dione', 'Ana', '0454551613', 'anacdione@yahoo.com', 0, 0, 0, 0, 0, 1, 0, 0, 0),
(7, 0, 'zcampita', '618e5e19613d569cdf4528b29910de1b2fe9bbd6', '3gPKbkvK', 'RO IV-A', 'Angara-Campita', 'Ma. Zenaida', '0495457360', 'zen8angara@gmail.com', 0, 0, 0, 0, 0, 1, 0, 0, 0),
(8, 0, 'TDelson', '1083a39c879a25cb2d0bc33f4d903ef5e1114fd5', '79LQJQfr', 'RO IV-B', 'Delson', 'Teodoro', '0432882078', 'doleregion4b@yahoo.com', 0, 0, 0, 0, 0, 1, 0, 0, 0),
(9, 0, 'Katrayvilla', '79832a473ae251e0ecb02a6f0455287a54ab24de', 'SV3ZR1O5', 'RO V', 'Trayvilla', 'Karina', '9176608450 ', 'karentrayvilla@gmail.com', 0, 0, 0, 0, 0, 1, 0, 0, 0),
(10, 0, 'SSiaton', 'dd543fb19b5b0a85979b733de0582a0da1a2f660', 'HRR3r5lW', 'RO VI', 'Siaton', 'Salome', '0333208026', 'tssdregion6@gmail.com', 0, 0, 0, 0, 0, 1, 0, 0, 0),
(11, 0, 'ExSarcauga', 'e2fa798df768ec711e82aeea588d355478abe16d', 'rTLwsd7D', 'RO VII', 'Sarcauga', 'Exequiel', '0322667922', 'ondosarcauga@yahoo.com', 0, 0, 0, 0, 0, 1, 0, 0, 0),
(12, 0, 'Eacayanong', '608e9a504b23d3164e19864aeed8e33dd33bafd1', 'k2gMnw96', 'RO VIII', 'Cayanong', 'Elias', '0533256293', 'ec4428@gmail.com', 0, 0, 0, 0, 0, 1, 0, 0, 0),
(13, 0, 'SBCano', '21889d6a5420ae29e317087095b2b076def194f1', 'YVyfFCAt', 'RO IX', 'Cano', 'Sisinio', '0629912673', 'sisiniocano@yahoo.com', 0, 0, 0, 0, 0, 1, 0, 0, 0),
(14, 0, 'reyagravante', '9a99eaaa15563cd9acd6fc94cbd6b1aa9b2a2f93', 'jFkHWz7r', 'RO X', 'Agravante', 'Raymundo', '0888571930', 'rayagravante@yahoo.com', 0, 0, 0, 0, 0, 1, 0, 0, 0),
(15, 0, 'Jsuyao', 'bf3a682c047d1bb7cc88e7a707dc01aa3536bc59', '52QGExS5', 'RO XI', 'Suyao', 'Joffrey', '0822274289', 'jofsuyao@yahoo.com.ph', 0, 0, 0, 0, 0, 1, 0, 0, 0),
(16, 0, 'aegutib', '34fc5dd17c6fa2f5c7bb6caf63a94b8925da89e5', 'wE4nb7Ls', 'RO XII', 'Gutib', 'Albert', '0832282190', 'albertgutib@yahoo.com', 0, 0, 0, 0, 0, 1, 0, 0, 0),
(17, 0, 'eramos', 'b104f8f42355848ceb0a7de4ddccc703b9a19ec0', 'mWpx6Hj5', 'CARAGA', 'Ramos', 'Evelyn', '0853429606', 'ordcaraga13@gmail.com', 0, 0, 0, 0, 0, 1, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`contact_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
