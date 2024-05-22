-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2024 at 02:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_register`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` varchar(20) NOT NULL,
  `itemname` varchar(20) NOT NULL,
  `picture` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `itemname`, `picture`, `quantity`, `description`) VALUES
('1234', 'Spaghetti Carbonara', 'https://img-global.cpcdn.com/recipes/d53c122d6928ede6/400x400cq70/photo.jpg', 10, 'Served immediately with extra grated Parmesan cheese.'),
('1111', 'Chicken Alfredo', 'https://iambaker.net/wp-content/uploads/2019/03/pasta-blog5-400x400.jpg', 30, 'Served with mustard');

-- --------------------------------------------------------

--
-- Table structure for table `management_staff`
--

CREATE TABLE `management_staff` (
  `M_ID` varchar(10) NOT NULL,
  `PICTURE` varchar(40) DEFAULT NULL,
  `NAME` varchar(40) DEFAULT NULL,
  `SPECIALITY` varchar(40) DEFAULT NULL,
  `POSITION` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `management_staff`
--

INSERT INTO `management_staff` (`M_ID`, `PICTURE`, `NAME`, `SPECIALITY`, `POSITION`) VALUES
('22101802', 'https://pbs.twimg.com/profile_images/771', 'mafhr', 'aa', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `RecipeID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Instructions` text NOT NULL,
  `Ingredients` text NOT NULL,
  `Nutrition` text DEFAULT NULL,
  `Tips` text DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`RecipeID`, `Name`, `Instructions`, `Ingredients`, `Nutrition`, `Tips`, `Image`) VALUES
(1, 'Spaghetti Carbonara', '1. Cook spaghetti according to package instructions. 2. In a large skillet, cook the pancetta until crispy. 3. In a bowl, whisk together eggs, Parmesan cheese, and black pepper. 4. Drain spaghetti and add to skillet with pancetta. 5. Pour egg mixture over spaghetti and toss to coat.', '8 oz spaghetti, 4 oz pancetta, 2 eggs, 1/2 cup grated Parmesan cheese, 1/2 tsp black pepper', 'Calories: 450, Fat: 20g, Carbs: 40g, Protein: 25g', 'Serve immediately with extra grated Parmesan cheese on top.', 'https://www.twopeasandtheirpod.com/wp-content/uploads/2023/01/Spaghetti-Carbonara168766.jpg'),
(2, 'Chicken Alfredo Pasta', '1. Cook pasta according to package instructions. 2. In a separate skillet, cook chicken until no longer pink. 3. Add garlic and cook until fragrant. 4. Stir in heavy cream, Parmesan cheese, and cooked pasta. 5. Cook until sauce thickens. 6. Serve hot.', '8 oz fettuccine, 1 lb chicken breast, 2 cloves garlic, 1 cup heavy cream, 1 cup grated Parmesan cheese', 'Calories: 600, Fat: 30g, Carbs: 45g, Protein: 40g', 'Garnish with chopped parsley before serving.', 'https://www.budgetbytes.com/wp-content/uploads/2022/07/Chicken-Alfredo-V3-768x1024.jpg'),
(3, 'Vegetable Stir-Fry', '1. Heat oil in a wok or skillet over high heat. 2. Add chopped vegetables and stir-fry until tender-crisp. 3. Stir in soy sauce and oyster sauce. 4. Serve hot over cooked rice.', '2 cups mixed vegetables (bell peppers, broccoli, carrots, snow peas), 2 tbsp oil, 2 tbsp soy sauce, 1 tbsp oyster sauce', 'Calories: 250, Fat: 10g, Carbs: 30g, Protein: 8g', 'You can add tofu or chicken for extra protein.', 'https://therecipecritic.com/wp-content/uploads/2019/08/vegetable_stir_fry.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(11, 'Mahrin', 'ilovewwais'),
(12, 'ahnaf.warid@g.bracu.ac.bd', '1234'),
(13, 'ahnaf.warid@g.bracu.ac.bd', '1234'),
(14, 'ahnaf.warid@g.bracu.ac.bd', '1234'),
(15, 'ahnaf.warid@g.bracu.ac.bd', '1234'),
(16, '2322374', '1234'),
(17, '2322374', '1234'),
(18, 'aaa', '123'),
(19, 'op', '1234'),
(20, '22101802', 'hhjnkj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `management_staff`
--
ALTER TABLE `management_staff`
  ADD PRIMARY KEY (`M_ID`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`RecipeID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `RecipeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
