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

--
-- Ownership: add user_id to recipe and index
--
ALTER TABLE `recipe`
  ADD COLUMN `user_id` int(10) UNSIGNED NULL AFTER `id`;
ALTER TABLE `recipe`
  ADD INDEX `idx_recipe_user_id` (`user_id`);

-- (Optional) If FK constraints are desired and supported in environment, uncomment:
-- ALTER TABLE `recipe` ADD CONSTRAINT `fk_recipe_user` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_users_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,    
  `recipe_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `content` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_comments_recipe_id` (`recipe_id`),
  KEY `idx_comments_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- (Optional) foreign keys, uncomment if desired
-- ALTER TABLE `comments` ADD CONSTRAINT `fk_comments_recipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipe`(`id`) ON DELETE CASCADE;
-- ALTER TABLE `comments` ADD CONSTRAINT `fk_comments_user` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
