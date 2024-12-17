-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2022 at 05:50 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoomanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `role` enum('admin','manager','zookeeper') NOT NULL,
  `ad_archived` enum('false','true') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `role`, `ad_archived`) VALUES
(1, 'Admin', 'admin@mail.com', '$2y$10$7rLSvRVyTQORapkDOqmkhetjF6H9lJHngr4hJMSM2lHObJbW5EQh6', 'admin', 'false'),
(2, 'Manger Cavil', 'manager@mail.com', '$2y$10$GkhnM26eiN3ZdQb7XDtPNu2lfkzyx/zo4DSxcXyJkl2do13xLcP3y', 'manager', 'false'),
(3, 'Zookeeper Martin', 'zookeeper@mail.com', '$2y$10$RwopLcjYrzbZM5f61aQTLeWxynlicux/bW9XjYLEHyx4nnqQtgDtW', 'zookeeper', 'false'),
(5, 'Manager John', 'manager2@mail.com', '$2y$10$xmEjQDAfzIXw/CtJVppS/.m.mNhc2MgVhlmUSSmN2w0FlHhGuTRyO', 'manager', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `amphibians`
--

CREATE TABLE `amphibians` (
  `animal_id` int(11) NOT NULL,
  `am_rep_type` varchar(255) NOT NULL,
  `am_clutch_size` float NOT NULL,
  `am_num_offspring` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amphibians`
--

INSERT INTO `amphibians` (`animal_id`, `am_rep_type`, `am_clutch_size`, `am_num_offspring`) VALUES
(25, 'Egg layer', 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `animal_id` int(11) NOT NULL,
  `an_given_name` varchar(255) NOT NULL,
  `an_species_name` varchar(255) NOT NULL,
  `an_dob` date NOT NULL,
  `an_gender` enum('m','f') NOT NULL,
  `an_avg_lifespan` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL,
  `an_dietary_req` varchar(255) NOT NULL,
  `an_natural_habitat` varchar(255) NOT NULL,
  `an_pop_dist` varchar(255) NOT NULL,
  `an_joindate` date NOT NULL,
  `an_height` float NOT NULL,
  `an_weight` float NOT NULL,
  `an_description` longtext NOT NULL,
  `class_id` int(11) NOT NULL,
  `an_med_record` longtext NOT NULL,
  `an_transfer` varchar(255) NOT NULL,
  `an_transfer_reason` longtext NOT NULL,
  `an_death_date` date NOT NULL,
  `an_death_cause` longtext NOT NULL,
  `an_incineration` varchar(255) NOT NULL,
  `an_archived` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`animal_id`, `an_given_name`, `an_species_name`, `an_dob`, `an_gender`, `an_avg_lifespan`, `location_id`, `an_dietary_req`, `an_natural_habitat`, `an_pop_dist`, `an_joindate`, `an_height`, `an_weight`, `an_description`, `class_id`, `an_med_record`, `an_transfer`, `an_transfer_reason`, `an_death_date`, `an_death_cause`, `an_incineration`, `an_archived`) VALUES
(24, 'Cheetah', 'Acinonyx jubatus', '2020-04-04', 'm', '20 Years', 4, 'Meat', 'Grassland', '20,000 in Asia', '2020-04-11', 12, 12, 'lorem ipsum dolor sit amet', 1, '', '', '', '0000-00-00', '', '', 'false'),
(25, 'Becky the Frog', 'frog', '2020-04-16', 'm', '2 Days', 2, 'insect', 'pond', 'population dist', '2020-04-10', 1, 1, '', 5, '', '', '', '0000-00-00', '', '', 'false'),
(26, 'Hermit the Snake', 'snake', '2020-04-02', 'f', '3 months', 2, 'asd', 'asd', 'asd', '2020-04-17', 3, 3, '', 4, '', '', '', '0000-00-00', '', '', 'false'),
(27, 'Tim the Fish', 'fish', '2020-04-15', 'm', 'asd', 3, 'asd', 'asd', 'as', '2020-04-11', 21, 21, 'asd', 3, '', '', '', '0000-00-00', '', '', 'false'),
(28, 'Eagle', 'Bald eagle', '2020-04-09', 'm', '20', 1, 'Test', 'estuaries, large lakes, reservoirs, rivers', '311700', '2020-04-02', 12, 21, 'large, predatory raptors that are recognizable for their brown body and wings, white head and tail, and hooked yellow beak. Their feet, which are also yellow, are equipped with sharp black talons.', 2, '', '', '', '0000-00-00', '', '', 'false'),
(29, 'Pangolin', 'Pholidota', '2020-04-09', 'm', '1.5 Years', 4, '1.4 kg of grass per day', 'Grassland', '20,000 in Asia', '2020-04-08', 0.69, 0.7, 'lorem ipsum sit amet dolor', 1, 'Had its limb broken during transfer from Asia', '2019/04/02 - Manchester Zoo', 'For its treatment ', '2020-04-22', 'Lung infection', '2019/04/02 - Blackpool', 'false'),
(30, 'Panda examle changed', 'example changed', '2020-05-01', 'm', '2 Years', 4, '1.4 kg of grass per day', 'example', 'example', '2020-05-02', 1.4, 1.5, 'lorem ipsum', 1, 'Broken leg', '', '', '0000-00-00', '', '', 'true'),
(31, 'Dingo', 'Canis Lupus Dingo', '2020-02-11', 'm', '11', 4, 'About 1.5 KG of Meat', 'harsh deserts to lush rainforests', '10,000 to 50,000', '2021-06-22', 0.55, 11, 'Dingos are a dog-like wolf. They have a long muzzle, erect ears and strong claws. They usually have a ginger coat and most have white markings on their feet, tail tip and chest. Their bushy tail is 25â€“37 cm long.', 1, 'No records in the literature, yet.', 'none', 'none', '0001-01-01', 'none', 'none', 'false'),
(32, 'Myna Bird', 'Common myna', '2021-10-07', 'm', '4', 1, '0.4 KG', 'Open Woodland, Mangroves, Grasslands, Farmlands', '15', '2021-12-08', 0.23, 0.15, 'Mynas are medium-sized passerines with strong feet. Their flight is strong and direct, and they are gregarious. Their preferred habitat is fairly open country, and they eat insects and fruit. Plumage is typically dark, often brown, although some species have yellow head ornaments.', 2, 'This is sample text. This is sample text. This is sample text. This is sample text.', 'none', 'none', '0001-01-01', 'This is sample text.', 'This is sample text.', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `animal_images`
--

CREATE TABLE `animal_images` (
  `animal_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animal_images`
--

INSERT INTO `animal_images` (`animal_id`, `image_name`) VALUES
(24, 'cheetah2_1588351323.jpg'),
(24, 'cheetah_1588351323.jpg'),
(25, 'frog_1586331653.jfif'),
(26, 'snake_1586331752.jfif'),
(27, 'fish2_1586331820.jpg'),
(27, 'fish_1586331820.jpg'),
(28, 'eagle_1586331886.jpg'),
(29, 'pangolin_1587452434.jpg'),
(30, 'panda2_1588400959.jpg'),
(30, 'panda3_1588400959.jpg'),
(31, 'dingoo_1645274375.jpg'),
(32, 'mynabrd_1645334873.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `animal_of_the_week`
--

CREATE TABLE `animal_of_the_week` (
  `an_week_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `an_week_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animal_of_the_week`
--

INSERT INTO `animal_of_the_week` (`an_week_id`, `animal_id`, `an_week_date`) VALUES
(1, 24, '2020-04-08 07:57:15'),
(2, 25, '2020-04-08 07:57:53'),
(3, 26, '2020-04-08 08:40:10'),
(4, 25, '2020-04-08 08:43:01'),
(5, 29, '2020-05-01 16:43:18'),
(6, 28, '2020-05-02 06:30:34'),
(7, 26, '2020-05-02 06:48:05'),
(8, 32, '2022-02-20 16:19:31'),
(9, 31, '2022-02-20 16:43:18'),
(10, 32, '2022-02-20 16:49:02');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `application_id` int(11) NOT NULL,
  `a_fullname` varchar(255) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_phone` bigint(12) NOT NULL,
  `a_cv` varchar(255) NOT NULL,
  `vacancy_id` int(11) NOT NULL,
  `a_status` enum('unreviewed','accepted','rejected') NOT NULL DEFAULT 'unreviewed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`application_id`, `a_fullname`, `a_email`, `a_phone`, `a_cv`, `vacancy_id`, `a_status`) VALUES
(1, 'Margaret Sowell', 'margaret@mail.com', 7410001010, 'sample.pdf', 2, 'accepted'),
(2, 'Leonila Maddox', 'maddox@mail.com', 4500002036, 'sample.pdf', 3, 'rejected'),
(3, 'James Negron', 'negron@mail.com', 6578540126, 'sample.pdf', 3, 'accepted'),
(4, 'David Viens', 'david@mail.com', 7854785470, 'sample.pdf', 4, 'rejected'),
(5, 'Demo Name', 'demo@demo.com', 3333225550, 'sample.pdf', 5, 'accepted'),
(6, 'Joseph L. Matheny', 'joseph@mail.com', 7854500010, 'sample_1645287029.pdf', 6, 'unreviewed');

-- --------------------------------------------------------

--
-- Table structure for table `birds`
--

CREATE TABLE `birds` (
  `animal_id` int(11) NOT NULL,
  `b_nest_const` varchar(255) NOT NULL,
  `b_clutch_size` float NOT NULL,
  `b_wingspan` float NOT NULL,
  `b_ability_fly` enum('yes','no') NOT NULL,
  `b_color_variant` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `birds`
--

INSERT INTO `birds` (`animal_id`, `b_nest_const`, `b_clutch_size`, `b_wingspan`, `b_ability_fly`, `b_color_variant`) VALUES
(28, 'asd', 12, 12, 'yes', 'asd'),
(32, 'This is sample text.', 6, 18, 'yes', 'black, brown');

-- --------------------------------------------------------

--
-- Table structure for table `classifications`
--

CREATE TABLE `classifications` (
  `class_id` int(11) NOT NULL,
  `class_display_name` varchar(255) NOT NULL,
  `class_table_name` varchar(255) NOT NULL,
  `class_archived` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classifications`
--

INSERT INTO `classifications` (`class_id`, `class_display_name`, `class_table_name`, `class_archived`) VALUES
(1, 'Mammals', 'mammals', 'false'),
(2, 'Birds', 'birds', 'false'),
(3, 'Fish', 'fish', 'false'),
(4, 'Reptiles', 'reptiles', 'false'),
(5, 'Amphibians', 'amphibians', 'false'),
(9, 'Protozoa', 'protozoa', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `e_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `vacancy_id` int(11) NOT NULL,
  `e_archived` enum('true','false') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`e_id`, `application_id`, `vacancy_id`, `e_archived`) VALUES
(2, 1, 2, 'false'),
(3, 3, 3, 'true'),
(4, 5, 5, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_description` varchar(255) NOT NULL,
  `event_start_date` date NOT NULL,
  `event_image` varchar(255) NOT NULL,
  `event_duration` varchar(255) NOT NULL,
  `event_archived` enum('false','true') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_description`, `event_start_date`, `event_image`, `event_duration`, `event_archived`) VALUES
(2, 'Zoo nights', 'Nights in the zoo', '2020-04-02', 'Zoo_nights_1587391459.jpg', '2 days', 'true'),
(3, 'Open mic', 'lorem', '2020-05-08', 'open_mic_1588401599.png', '2 days', 'true'),
(4, 'Egg-Venture', 'Calling all explorers: get ready to discover Zoo in a whole new way! This spring guests can come and enjoy a virtual scavenger hunt at the park using an app on their mobile phones. While enjoying a stroll through the park families can use clues to find 12', '2022-03-07', 'estregg_1645347907.jpg', 'March 07, 2022 @ 10:00 AM - April 02, 2022 @ 4:00 PM', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `f_firstname` varchar(255) NOT NULL,
  `f_lastname` varchar(255) NOT NULL,
  `f_email` varchar(255) NOT NULL,
  `f_subject` varchar(255) NOT NULL,
  `f_message` longtext NOT NULL,
  `visitor_id` int(11) NOT NULL,
  `f_reviewed` enum('true','false') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `f_firstname`, `f_lastname`, `f_email`, `f_subject`, `f_message`, `visitor_id`, `f_reviewed`) VALUES
(1, 'David', 'Viens', 'david@mail.com', 'Regarding Animal Display', 'A demo feedback!', 2, 'true'),
(2, 'Henry', 'Foreman', 'henry@mail.com', 'Regarding Animal Display', 'All Good, Testing.', 4, 'true'),
(3, 'David', 'Viens', 'david@mail.com', 'test', 'Test Test', 2, 'false'),
(4, 'Teresa', 'Dumas', 'teresa@mail.com', 'Test Subject', 'Hey, this is a demo test.', 8, 'false'),
(5, 'Will', 'Williams', 'williams@mail.com', 'Demo Demo', 'This is a demo test from Will Williams!', 6, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `fish`
--

CREATE TABLE `fish` (
  `animal_id` int(11) NOT NULL,
  `f_body_temp` float NOT NULL,
  `f_water_type` varchar(255) NOT NULL,
  `f_color_variant` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fish`
--

INSERT INTO `fish` (`animal_id`, `f_body_temp`, `f_water_type`, `f_color_variant`) VALUES
(27, 2, 'sad', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `g_id` int(11) NOT NULL,
  `g_file_name` varchar(255) NOT NULL,
  `g_file_type` enum('image','video') NOT NULL,
  `g_archived` enum('true','false') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`g_id`, `g_file_name`, `g_file_type`, `g_archived`) VALUES
(2, 'elephant1_1586622081.jpg', 'image', 'false'),
(10, 'kangaroo_1586624178.jpg', 'image', 'false'),
(14, 'animal_life_1586624819.mp4', 'video', 'true'),
(15, 'black_panther_1586698550.jpg', 'image', 'false'),
(16, 'buck_1586698556.jpg', 'image', 'false'),
(17, 'lioness_1586698563.jpg', 'image', 'true'),
(18, 'swan1_1588401658.jpg', 'image', 'false'),
(19, 'animal_life101_1588401672.mp4', 'video', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `location_archived` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `location_name`, `location_archived`) VALUES
(1, 'The Aviary', 'false'),
(2, 'The Hothouse', 'false'),
(3, 'The Aquarium', 'false'),
(4, 'The Cages/Compounds', 'false'),
(5, 'The Sanctuary', 'true'),
(6, 'The Grassland', 'true'),
(8, 'The Pond', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `mammals`
--

CREATE TABLE `mammals` (
  `animal_id` int(11) NOT NULL,
  `m_gest_period` varchar(255) NOT NULL,
  `m_category` varchar(255) NOT NULL,
  `m_avg_body_temp` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mammals`
--

INSERT INTO `mammals` (`animal_id`, `m_gest_period`, `m_category`, `m_avg_body_temp`) VALUES
(24, '2 months', 'Clawed Mammal', 34),
(29, '2 months', 'Proletheria', 12),
(30, '2 months', 'Proletheria', 50.2),
(31, '61', 'Mammalia', 16);

-- --------------------------------------------------------

--
-- Table structure for table `reptiles`
--

CREATE TABLE `reptiles` (
  `animal_id` int(11) NOT NULL,
  `r_rep_type` varchar(255) NOT NULL,
  `r_clutch_size` float NOT NULL,
  `r_num_offspring` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reptiles`
--

INSERT INTO `reptiles` (`animal_id`, `r_rep_type`, `r_clutch_size`, `r_num_offspring`) VALUES
(26, 'egg ', 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `sponsored_animals`
--

CREATE TABLE `sponsored_animals` (
  `sa_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `sponsor_id` int(11) NOT NULL,
  `sponsor_band` varchar(1) NOT NULL,
  `total_price` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `signage_photo` varchar(255) NOT NULL,
  `s_url` varchar(255) NOT NULL,
  `s_status` enum('unreviewed','accepted','rejected') NOT NULL DEFAULT 'unreviewed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsored_animals`
--

INSERT INTO `sponsored_animals` (`sa_id`, `animal_id`, `sponsor_id`, `sponsor_band`, `total_price`, `start_date`, `end_date`, `signage_photo`, `s_url`, `s_status`) VALUES
(1, 27, 1, 'A', 3000, '2020-04-01', '2020-04-09', 'sponsor_image1_1586762250.jpg', 'www.facebook.com', 'accepted'),
(2, 27, 4, 'E', 1000, '2020-03-31', '2020-04-16', 'banner2_1586770270.jpg', 'www.facebook.com', 'rejected'),
(3, 24, 1, 'B', 2200, '2020-05-01', '2020-09-16', 'sponsor_image1_1588353692.jpg', 'www.facebook.com', 'rejected'),
(4, 24, 5, 'B', 2400, '2020-05-02', '2020-12-24', 'images_1588401946.jfif', 'www.facebook.com', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `sponsor_id` int(11) NOT NULL,
  `s_client_name` varchar(255) NOT NULL,
  `s_existing_customer` enum('yes','no') NOT NULL,
  `s_phone_number` bigint(15) NOT NULL,
  `s_client_address` varchar(255) NOT NULL,
  `s_yearly_revenue` int(11) NOT NULL,
  `s_email` varchar(255) NOT NULL,
  `s_password` varchar(255) NOT NULL,
  `s_business_type` varchar(255) NOT NULL,
  `s_approved` enum('true','false','rejected') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`sponsor_id`, `s_client_name`, `s_existing_customer`, `s_phone_number`, `s_client_address`, `s_yearly_revenue`, `s_email`, `s_password`, `s_business_type`, `s_approved`) VALUES
(1, 'Axis Group', 'no', 1450000010, '39 Hidden Pond Road', 69000, 'axgr@mail.com', '$2y$10$BnAhFmbCII4qbtdjEn5SJOgPR3fETUirjns3TK8ZLDeDjI.Htnkwm', 'Test', 'true'),
(4, 'Illustrious', 'yes', 4547777740, '177 Virginia Street', 123123, 'illustrious@mail.com', '$2y$10$BnAhFmbCII4qbtdjEn5SJOgPR3fETUirjns3TK8ZLDeDjI.Htnkwm', 'Test', 'true'),
(5, 'Merry Stand', 'yes', 7410250000, '4 Clarence Court', 12000, 'merryst@mail.com', '$2y$10$BnAhFmbCII4qbtdjEn5SJOgPR3fETUirjns3TK8ZLDeDjI.Htnkwm', 'Test', 'true'),
(6, 'Beelist', 'no', 145552100, '377 Seltice Way', 55000, 'beelist@mail.com', '$2y$10$IdJFjQsGWesFcIDeHHDLHOt7dc9SfhM4g4HFdO5cz5vXES.4aN2ci', 'Test', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `testimonial_id` int(11) NOT NULL,
  `sponsor_id` int(11) NOT NULL,
  `test_message` varchar(255) NOT NULL,
  `posted_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`testimonial_id`, `sponsor_id`, `test_message`, `posted_date`) VALUES
(1, 1, 'Sponsor lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatibus, laborum.\r\n', '2020-04-20 15:20:03'),
(2, 1, 'This is a demo message!!', '2020-04-20 18:15:00'),
(3, 4, 'You guys are the best! Keep up the great work!', '2020-04-20 15:20:03'),
(4, 4, 'I just wanted to share a quick note and let you know that you guys do a really good job. Iâ€™m glad I decided to work with you.', '2020-04-20 15:22:04'),
(5, 1, 'This is a second demo testimonial', '2020-05-01 17:13:38'),
(6, 5, 'This is just a demo testimonial', '2020-05-02 06:46:53'),
(7, 5, 'This is my second Testimonial for testing purpose.', '2022-02-20 16:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `child_num` int(11) NOT NULL,
  `student_num` int(11) NOT NULL,
  `regular_num` int(11) NOT NULL,
  `t_date` date NOT NULL,
  `visitor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `book_name`, `child_num`, `student_num`, `regular_num`, `t_date`, `visitor_id`) VALUES
(2, 'David Viens', 0, 0, 1, '2021-02-04', 2),
(3, 'David Viens', 1, 2, 1, '2021-03-10', 2),
(4, 'Henry Foreman', 0, 1, 1, '2021-03-25', 4),
(5, 'Christine Moore', 0, 0, 2, '2022-02-22', 5),
(6, 'Teresa Dumas', 1, 0, 4, '2022-02-23', 8),
(7, 'Felix Nielsen', 1, 1, 2, '2022-02-22', 7),
(8, 'Will Williams', 0, 0, 2, '2022-02-21', 6);

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

CREATE TABLE `vacancies` (
  `vacancy_id` int(11) NOT NULL,
  `v_position` varchar(255) NOT NULL,
  `v_description` longtext NOT NULL,
  `v_type` enum('temporary','permanent') NOT NULL,
  `v_start_date` date NOT NULL,
  `v_end_date` date NOT NULL,
  `v_archived` enum('true','false') NOT NULL DEFAULT 'false',
  `v_status` enum('available','closed') NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacancies`
--

INSERT INTO `vacancies` (`vacancy_id`, `v_position`, `v_description`, `v_type`, `v_start_date`, `v_end_date`, `v_archived`, `v_status`) VALUES
(2, 'Receptionist', 'To do paperwork', 'permanent', '2020-04-16', '0000-00-00', 'false', 'closed'),
(3, 'Officer', 'Officer for management', 'temporary', '2020-04-03', '2020-04-30', 'false', 'closed'),
(4, 'Medical Assistant', 'Physician', 'permanent', '2022-02-10', '2024-03-14', 'false', 'available'),
(5, 'Marketing manager', 'example', 'temporary', '2020-05-02', '2020-05-30', 'false', 'closed'),
(6, 'Demo Vacancy Announcement', 'This is a demo for testing purpose! This is a demo for testing purpose! This is a demo for testing purpose!', 'permanent', '2022-03-01', '0000-00-00', 'false', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `visitor_id` int(11) NOT NULL,
  `v_firstname` varchar(255) NOT NULL,
  `v_lastname` varchar(255) NOT NULL,
  `v_email` varchar(255) NOT NULL,
  `v_address` varchar(255) NOT NULL,
  `v_password` varchar(255) NOT NULL,
  `v_archived` enum('true','false') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`visitor_id`, `v_firstname`, `v_lastname`, `v_email`, `v_address`, `v_password`, `v_archived`) VALUES
(2, 'David', 'Viens', 'david@mail.com', '52 Sherwood Circle', '$2y$10$awCV8VjOeP5ZnLodVJhsxOWztKO/AU4wHWkusBPnivwcxnsKVb.Pu', 'false'),
(3, 'Margaret', 'Sowell', 'margaret@mail.com', '44 Glendale Avenue', '$2y$10$1hxw1tUmiN1JglFYEYv2BOll7yFuxEbjSHvXAKyiAmTRwGJ9ukeve', 'false'),
(4, 'Henry', 'Foreman', 'henry@mail.com', '97 West Virginia Avenue', '$2y$10$5L6GH0j/SfbGm503f/YinuqVOFXbO90/w3ogQbtK.Z.4iBVuqA/SG', 'true'),
(5, 'Christine', 'Moore', 'christine@mail.com', '4 Mesa Drive', '$2y$10$Rj4zujky260NlcP6IG35/.vyz/T3S21ziF.3mihwWIyi1GyR1cJ9C', 'false'),
(6, 'Will', 'Williams', 'williams@mail.com', '79 John Calvin Drive', '$2y$10$dwC5gTXZP4kL5Xtl8HdcduBfqvjWekCiSsnLQZENudm3aYhNTiBFu', 'false'),
(7, 'Felix', 'Nielsen', 'felix@mail.com', '91 Kimberly Way', '$2y$10$Ux2o5ZWyQPdRcOCvit7D1OKXqtin6xTjFwulBL91Rf7qXlnYzENPO', 'false'),
(8, 'Teresa', 'Dumas', 'teresa@mail.com', '7 Frosty Lane', '$2y$10$wvD4HqnfsJxYchEwUz1JN.eFy5PwFMeSt1flyn78GPstLoPKNpV6q', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `watch_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `watch_description` longtext NOT NULL,
  `watch_severity` enum('high','medium','low') NOT NULL,
  `watch_attended` enum('true','false') NOT NULL,
  `watch_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`watch_id`, `animal_id`, `watch_description`, `watch_severity`, `watch_attended`, `watch_date`) VALUES
(1, 24, 'Leg broken', 'medium', 'true', '2020-04-08'),
(2, 25, 'Respiration Problem', 'high', 'false', '2020-04-08'),
(3, 24, 'Example problem', 'high', 'false', '2020-05-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `amphibians`
--
ALTER TABLE `amphibians`
  ADD PRIMARY KEY (`animal_id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animal_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `animal_images`
--
ALTER TABLE `animal_images`
  ADD PRIMARY KEY (`animal_id`,`image_name`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Indexes for table `animal_of_the_week`
--
ALTER TABLE `animal_of_the_week`
  ADD PRIMARY KEY (`an_week_id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `vacancy_id` (`vacancy_id`);

--
-- Indexes for table `birds`
--
ALTER TABLE `birds`
  ADD PRIMARY KEY (`animal_id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Indexes for table `classifications`
--
ALTER TABLE `classifications`
  ADD PRIMARY KEY (`class_id`),
  ADD UNIQUE KEY `class_table_name` (`class_table_name`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`e_id`),
  ADD KEY `application_id` (`application_id`),
  ADD KEY `vacancy_id` (`vacancy_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `visitor_id` (`visitor_id`);

--
-- Indexes for table `fish`
--
ALTER TABLE `fish`
  ADD PRIMARY KEY (`animal_id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `mammals`
--
ALTER TABLE `mammals`
  ADD PRIMARY KEY (`animal_id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Indexes for table `reptiles`
--
ALTER TABLE `reptiles`
  ADD PRIMARY KEY (`animal_id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Indexes for table `sponsored_animals`
--
ALTER TABLE `sponsored_animals`
  ADD PRIMARY KEY (`sa_id`),
  ADD KEY `animal_id` (`animal_id`),
  ADD KEY `sponsor_id` (`sponsor_id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`sponsor_id`),
  ADD UNIQUE KEY `s_email` (`s_email`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`testimonial_id`),
  ADD KEY `sponsor_id` (`sponsor_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `visitor_id` (`visitor_id`);

--
-- Indexes for table `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`vacancy_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`visitor_id`),
  ADD UNIQUE KEY `v_email` (`v_email`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`watch_id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `animal_of_the_week`
--
ALTER TABLE `animal_of_the_week`
  MODIFY `an_week_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `classifications`
--
ALTER TABLE `classifications`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sponsored_animals`
--
ALTER TABLE `sponsored_animals`
  MODIFY `sa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `sponsor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `vacancy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `visitor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `watch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `amphibians`
--
ALTER TABLE `amphibians`
  ADD CONSTRAINT `fk_am_animals` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`);

--
-- Constraints for table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `fk_a_classifications` FOREIGN KEY (`class_id`) REFERENCES `classifications` (`class_id`),
  ADD CONSTRAINT `fk_a_locations` FOREIGN KEY (`location_id`) REFERENCES `locations` (`location_id`);

--
-- Constraints for table `animal_images`
--
ALTER TABLE `animal_images`
  ADD CONSTRAINT `fk_an_i_animals` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`);

--
-- Constraints for table `animal_of_the_week`
--
ALTER TABLE `animal_of_the_week`
  ADD CONSTRAINT `fk_w_animals` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`);

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `fk_app_vacancies` FOREIGN KEY (`vacancy_id`) REFERENCES `vacancies` (`vacancy_id`);

--
-- Constraints for table `birds`
--
ALTER TABLE `birds`
  ADD CONSTRAINT `fk_b_animals` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `fk_e_applications` FOREIGN KEY (`application_id`) REFERENCES `applications` (`application_id`),
  ADD CONSTRAINT `fk_e_vacancies` FOREIGN KEY (`vacancy_id`) REFERENCES `vacancies` (`vacancy_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_f_visitor` FOREIGN KEY (`visitor_id`) REFERENCES `visitors` (`visitor_id`);

--
-- Constraints for table `fish`
--
ALTER TABLE `fish`
  ADD CONSTRAINT `fk_f_animals` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`);

--
-- Constraints for table `mammals`
--
ALTER TABLE `mammals`
  ADD CONSTRAINT `fk_m_animals` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`);

--
-- Constraints for table `reptiles`
--
ALTER TABLE `reptiles`
  ADD CONSTRAINT `fk_r_animals` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`);

--
-- Constraints for table `sponsored_animals`
--
ALTER TABLE `sponsored_animals`
  ADD CONSTRAINT `fk_sa_animals` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`),
  ADD CONSTRAINT `fk_sa_sponsors` FOREIGN KEY (`sponsor_id`) REFERENCES `sponsors` (`sponsor_id`);

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `fk_t_sponsors` FOREIGN KEY (`sponsor_id`) REFERENCES `sponsors` (`sponsor_id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_t_visitors` FOREIGN KEY (`visitor_id`) REFERENCES `visitors` (`visitor_id`);

--
-- Constraints for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `fk_watchlist_animals` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
