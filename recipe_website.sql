-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 04:12 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipe_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(300) NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `time` varchar(300) NOT NULL,
  `tag` varchar(300) NOT NULL,
  `instructions` varchar(3000) NOT NULL,
  `ingredients` varchar(300) NOT NULL,
  `tools` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `image`, `title`, `description`, `time`, `tag`, `instructions`, `ingredients`, `tools`) VALUES
(1, 'recipe-4.jpeg', 'Banana Pancakes', 'Shabby chic humblebrag banh mi bushwick, banjo kale chips meggings. Cred selfies sartorial, cloud bread disrupt blue bottle seitan. Dreamcatcher tousled bitters, health goth vegan venmo whatever street art lyft shabby chic pitchfork beard. Drinking vinegar poke tbh, iPhone coloring book polaroid truffaut tousled ramps pug trust fund letterpress. Portland four loko austin chicharrones bitters single-origin coffee. Leggings letterpress occupy pour-over.', '30, 15 , 6', 'pancakes, food', 'Im baby mustache man braid fingerstache small batch venmo succulents shoreditch.,Pabst pitchfork you probably havent heard of them, asymmetrical seitan tousled succulents wolf banh mi man bun bespoke selfies freegan ethical hexagon.,Polaroid iPhone bitters chambray. Cornhole swag kombucha live-edge.', '1 1/2 cups dry pancake mix,1/2 cup flax seed meal,1 cup skim milk', 'Hand Blender,Large Heavy Pot With Lid,Measuring Spoons,Measuring Cups'),
(2, 'recipe-1.jpeg', 'Carne Asada', 'Shabby chic humblebrag banh mi bushwick, banjo kale chips meggings. Cred selfies sartorial, cloud bread disrupt blue bottle seitan. Dreamcatcher tousled bitters, health goth vegan venmo whatever street art lyft shabby chic pitchfork beard. Drinking vinegar poke tbh, iPhone coloring book polaroid truffaut tousled ramps pug trust fund letterpress. Portland four loko austin chicharrones bitters single-origin coffee. Leggings letterpress occupy pour-over.', '15, 5 , 6 ', 'mutton, food', 'Im baby mustache man braid fingerstache small batch venmo succulents shoreditch.,Pabst pitchfork you probably havent heard of them, asymmetrical seitan tousled succulents wolf banh mi man bun bespoke selfies freegan ethical hexagon.,Polaroid iPhone bitters chambray. Cornhole swag kombucha live-edge.', '1 1/2 cups dry pancake mix,1/2 cup flax seed meal,1 cup skim milk', 'Hand Blender, Large Heavy Pot With Lid, Measuring Spoons,Measuring Cups'),
(3, 'recipe-3.jpeg', 'Vegetable Soup', 'Shabby chic humblebrag banh mi bushwick, banjo kale chips meggings. Cred selfies sartorial, cloud bread disrupt blue bottle seitan. Dreamcatcher tousled bitters, health goth vegan venmo whatever street art lyft shabby chic pitchfork beard. Drinking vinegar poke tbh, iPhone coloring book polaroid truffaut tousled ramps pug trust fund letterpress. Portland four loko austin chicharrones bitters single-origin coffee. Leggings letterpress occupy pour-over.', '15,5,6', 'Soup, food,drinks', 'Im baby mustache man braid fingerstache small batch venmo succulents shoreditch.,Pabst pitchfork you probably havent heard of them, asymmetrical seitan tousled succulents wolf banh mi man bun bespoke selfies freegan ethical hexagon.,Polaroid iPhone bitters chambray. Cornhole swag kombucha live-edge.', '1 1/2 cups dry pancake mix,1/2 cup flax seed meal,1 cup skim milk', 'Hand Blender,Large Heavy Pot With Lid,Measuring Spoons,Measuring Cups'),
(4, 'recipe-2.jpeg', 'Greek Ribs', 'Shabby chic humblebrag banh mi bushwick, banjo kale chips meggings. Cred selfies sartorial, cloud bread disrupt blue bottle seitan. Dreamcatcher tousled bitters, health goth vegan venmo whatever street art lyft shabby chic pitchfork beard. Drinking vinegar poke tbh, iPhone coloring book polaroid truffaut tousled ramps pug trust fund letterpress. Portland four loko austin chicharrones bitters single-origin coffee. Leggings letterpress occupy pour-over.', '15,5,6', 'mutton, food', 'Im baby mustache man braid fingerstache small batch venmo succulents shoreditch.,Pabst pitchfork you probably havent heard of them,asymmetrical seitan tousled succulents wolf banh mi man bun bespoke selfies freegan ethical hexagon.,Polaroid iPhone bitters chambray. Cornhole swag kombucha live-edge.', '1 1/2 cups dry pancake mix,1/2 cup flax seed meal,1 cup skim milk', 'Hand Blender,Large Heavy Pot With Lid,Measuring Spoons,Measuring Cups');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
