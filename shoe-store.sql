-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2025 at 04:32 PM
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
-- Database: `shoe-store`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `account_name` text NOT NULL,
  `account_lastname` varchar(16) NOT NULL,
  `account_address` varchar(32) NOT NULL,
  `account_password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_name`, `account_lastname`, `account_address`, `account_password`) VALUES
(1, 'Olti', 'Zeqa', 'oltizeqa@outlook.com', '$2y$10$K.saDv9Lwf/0Z811koIQl.VqT');

-- --------------------------------------------------------

--
-- Table structure for table `blogs_table`
--

CREATE TABLE `blogs_table` (
  `blog_id` int(11) NOT NULL,
  `blog_title` text NOT NULL,
  `blog_content` text NOT NULL,
  `blog_creation_date` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs_table`
--

INSERT INTO `blogs_table` (`blog_id`, `blog_title`, `blog_content`, `blog_creation_date`) VALUES
(1, 'Exciting Launch of Our Shoe Store!', 'Our team has been eagerly waiting for the launch of our new shoe store, and it’s finally here! The excitement has been palpable in every department, as we all worked hard to bring this dream to life. From the sales team to customer support, everyone played an essential role in making this happen. <br><br>\r\n\r\nThe sales team has been preparing for weeks, organizing special promotions and setting up the online store. Sales Manager Jim Halpert shared his excitement: ‘It’s been incredible to see how much effort the team has put into this. I can’t wait to see the customers react when they finally get their hands on our products!’ <br><br>\r\n\r\nMeanwhile, the customer support team has been ready to offer top-notch service to our future customers. Pam Beesly, one of our best customer service representatives, mentioned, ‘I love helping people find the perfect shoe for them. It’s going to be amazing to see how our store can make customers happy.’ <br><br>\r\n\r\nOf course, we can’t forget about Toby Flenderson, our legal and HR guru. Toby has worked tirelessly to ensure everything is compliant with regulations and that our team members are taken care of. He joked, ‘My job might not seem exciting, but without it, none of this would be possible!’ <br><br>\r\n\r\nThe atmosphere in the office has been filled with anticipation, and we can’t wait to welcome you all to the store. Whether you\'re looking for a new pair of sneakers or a sleek dress shoe, we’re confident you’ll find exactly what you’re looking for. <br><br>\r\n\r\nSo, here\'s to a successful launch and a bright future ahead! Let’s continue working hard and making our customers\' shoe shopping experience unforgettable. <br><br>\r\n\r\nStay tuned for more updates and exciting promotions coming your way soon!', '2024-12-09'),
(2, 'Exciting New Partnership with Wuphf!', 'We’re thrilled to announce an exciting new partnership between our shoe store and Wuphf, the innovative communication platform from the popular show The Office! This collaboration is set to bring a whole new level of customer interaction and engagement, combining our high-quality footwear with Wuphf’s cutting-edge communication technology. <br><br>\r\n\r\nSales Manager Jim Halpert couldn’t contain his excitement, saying, ‘When we first heard about Wuphf, we knew it was something special. The potential to reach customers in new ways is immense, and we\'re excited to bring this experience to life.’ <br><br>\r\n\r\nPam Beesly from Customer Support also expressed her enthusiasm: ‘This partnership opens up a whole new avenue for us to interact with customers. It’s going to be so much fun seeing how Wuphf can change the way we communicate with our buyers.’ <br><br>\r\n\r\nToby Flenderson, our HR and legal expert, was naturally a little more cautious but still pleased with the collaboration: ‘We’ve worked through the necessary legalities to ensure that everything is in place. It\'s a great opportunity for growth, and I’m excited to see how it all unfolds.’ <br><br>\r\n\r\nWith this partnership, our store will be integrating Wuphf’s communication services directly into our customer service platform, allowing customers to easily reach out through multiple channels. Whether it’s by phone, chat, or even carrier pigeon (okay, maybe not the pigeon), we’ll be able to provide faster, more efficient service than ever before. <br><br>\r\n\r\nAs part of the partnership, we’re also rolling out exclusive promotions and special offers for customers who sign up for our Wuphf-powered communication updates. It’s a win-win for everyone involved! <br><br>\r\n\r\nThis collaboration is just the beginning. We are looking forward to future opportunities that will help us continue to innovate and provide top-tier service to our customers. With Wuphf’s cutting-edge technology and our commitment to quality, the future is bright for this partnership! <br><br>\r\n\r\nStay tuned for more exciting updates and future collaborations as we work to bring you the best shoe shopping experience possible!\r\n\r\n', '2024-12-10'),
(3, 'Facing Possible Bankruptcy – A Difficult Time for Our Store', 'It’s with a heavy heart that we share the news that our shoe store is currently facing the possibility of bankruptcy. After months of financial struggles and unforeseen challenges, we find ourselves in a difficult situation. However, we remain hopeful and committed to turning things around. <br><br>\r\n\r\nThe past few months have been particularly tough. Our sales have not met expectations, and despite our best efforts, we’ve struggled to gain traction in a competitive market. Sales Manager Jim Halpert admitted, ‘It’s been hard to keep up with the competition, and while we’ve made some great strides, it’s just not been enough to cover our expenses.’ <br><br>\r\n\r\nPam Beesly from Customer Support echoed Jim’s concerns: ‘Our customers have been incredibly supportive, but we’ve seen a decline in traffic. It’s disheartening to see such a great team working so hard, and we’re hoping for a turnaround soon.’ <br><br>\r\n\r\nToby Flenderson, who has worked tirelessly on the legal and HR side, has also been a pillar of strength during this time. ‘We’ve been exploring all our options to restructure and avoid bankruptcy,’ Toby shared. ‘I’m hopeful we can find a solution that will allow us to continue operating and keep our team intact.’ <br><br>\r\n\r\nWhile bankruptcy is not an easy situation to face, we are not giving up. Our team is working around the clock to find a viable solution, whether through restructuring, securing new investments, or exploring alternative strategies. Our primary goal is to keep the business running and provide for our employees, customers, and the community. <br><br>\r\n\r\nDespite the challenges, we are incredibly grateful for the support we’ve received from our loyal customers and team members. We’re optimistic that we can weather this storm and emerge even stronger. <br><br>\r\n\r\nWe’ll continue to update you on our progress and appreciate your understanding and support during this uncertain time. Stay with us as we navigate these challenges and work towards a brighter future for our store and everyone involved. <br><br>\r\n\r\nThank you for being a part of our journey, and we look forward to what’s to come.', '2024-12-20'),
(4, `Exciting News: We\'ve Been Given A Second Chance By Sabre!`, 'We are thrilled to announce that our shoe store has been acquired by Sabre, a global leader in technology and travel services! This marks a new chapter in our journey, and we couldn\'t be more excited about the future. <br><br>\r\n\r\nThe deal was finalized last week, and we’re already starting to see the benefits of being part of such a renowned company. Sabre’s vast resources, technology, and expertise will allow us to innovate and improve our customer experience in ways we’ve never been able to before. <br><br>\r\n\r\nJim Halpert, our Sales Manager, was over the moon about the acquisition: ‘This is a huge opportunity for us. Sabre’s network and technological capabilities will help us reach new heights. It’s an exciting time to be part of this team!’ <br><br>\r\n\r\nPam Beesly from Customer Support also shared her excitement: ‘Being part of a bigger company means more opportunities for our team to grow and thrive. We’re looking forward to using Sabre’s cutting-edge tools to serve our customers even better!’ <br><br>\r\n\r\nToby Flenderson, who was involved in the negotiations from the legal and HR side, expressed his optimism as well: ‘The acquisition went smoothly, and we’re excited to see how Sabre will help us streamline our operations. This is a positive step forward for our employees and customers alike.’ <br><br>\r\n\r\nThe integration with Sabre will bring many changes, but we’re committed to keeping the essence of what made our shoe store special. We’ll continue to focus on offering high-quality products, excellent customer service, and a unique shopping experience. <br><br>\r\n\r\nThis partnership opens the door to new possibilities, including the ability to expand our reach and improve our technology. We’re excited to explore these opportunities and continue growing as part of the Sabre family. <br><br>\r\n\r\nAs we move forward with this exciting new phase, we want to thank our loyal customers and employees for their support throughout the years. The best is yet to come, and we’re looking forward to sharing this journey with you all! <br><br>\r\n\r\nStay tuned for more updates on our integration with Sabre and the exciting changes ahead!', '2024-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `color_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_name`) VALUES
(10, 'Beige'),
(12, 'Black'),
(5, 'Blue'),
(11, 'Brown'),
(7, 'Gold'),
(9, 'Gray'),
(4, 'Green'),
(3, 'Orange'),
(6, 'Purple'),
(1, 'Red'),
(8, 'Silver'),
(13, 'White'),
(2, 'Yellow');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `material_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `material_name`) VALUES
(2, 'Canvas'),
(1, 'Cotton'),
(3, 'Leather'),
(5, 'Mesh'),
(6, 'Nylon'),
(8, 'Rubber'),
(4, 'Sued'),
(7, 'Synthetic');

-- --------------------------------------------------------

--
-- Table structure for table `shoes`
--

CREATE TABLE `shoes` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `color_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `gender` enum('Men','Women','Children') NOT NULL,
  `discount` decimal(5,2) DEFAULT 0.00,
  `date_added` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`id`, `name`, `brand`, `description`, `image_path`, `image2`, `image3`, `image4`, `price`, `color_id`, `material_id`, `gender`, `discount`, `date_added`) VALUES
(1, 'Uranium Runner 308', 'Nokia', 'Engineered for speed and style, the Uranium Runner 308 combines lightweight design with durable grip and advanced cushioning. Perfect for runners who want a sleek edge on every stride.', 'Prod_1/uranium.png', 'Prod_1/uranium_1.png', 'Prod_1/uranium_2.png', 'Prod_1/uranium_3.png', 120.00, 2, 8, 'Men', 15.00, '2025-01-02'),
(2, 'Turbo Tread X500', 'Motorola', 'A powerhouse sneaker built for speed and durability, the Turbo Tread X500 features advanced traction control and shock-absorbing tech for a smooth ride. Sleek, bold, and built to "dial up" your performance.', 'Prod_2/turbo.png', 'Prod_2/turbo_1.png', 'Prod_2/turbo_2.png', 'Prod_2/turbo_3.png', 95.00, 5, 8, 'Men', 10.00, '2025-01-02'),
(3, 'Velocity Vertex 3D', 'LG', 'Step into ultimate comfort and futuristic style with the Velocity Vertex 3D. Designed for peak motion, its lightweight design and breathable build ensure you move fast while keeping life good.', 'Prod_3/velocity.png', 'Prod_3/velocity_1.png', 'Prod_3/velocity_2.png', 'Prod_3/velocity_3.png', 110.00, 4, 8, 'Men', 25.00, '2025-01-02'),
(4, 'StrideMaster Pro XT', 'Sony', 'Master every stride with these high-tech sneakers, featuring precision cushioning and adaptive grip for any surface. The StrideMaster Pro XT brings cinematic style and comfort to every step.', 'Prod_4/stride.png', 'Prod_4/stride_1.png', 'Prod_4/stride_2.png', 'Prod_4/stride_3.png', 150.00, 3, 8, 'Men', 30.00, '2025-01-02'),
(9, 'Scarlet Sprint', 'TimberTrack', 'Vibrant red leather sneakers brought to you by &quot;TimberTrack,&quot; a brand renowned for rugged hiking boots. These sneakers boast a sleek, sporty design that’s clearly meant for city streets, but the label insists they’re &quot;trail-ready.&quot; Perfect for anyone who wants to look sharp while totally avoiding dirt.', 'Prod_5/image1.png', 'Prod_5/image2.png', 'Prod_5/image3.png', 'Prod_5/image4.png', 199.99, 1, 4, 'Men', 70.00, '2025-01-16'),
(10, 'Cognitive Kicks', 'IBM', 'A forward-thinking green leather sneaker from IBM—because even your shoes should be as innovative as your tech. These bold sneakers feature a rich green base with crisp white accents, combining sleek design with a touch of digital flair. The tagline: &quot;Step Into Innovation,&quot; though they don&#039;t come with a virtual assistant... yet. Perfect for those who want to stay ahead of the curve, both in tech and style.', 'Prod_6/image1.png', 'Prod_6/image2.png', 'Prod_6/image3.png', 'Prod_6/image4.png', 249.99, 4, 4, 'Men', 70.00, '2025-01-16'),
(11, 'Shadow Step', 'UrbanTech', 'A sleek, all-black leather sneaker from UrbanTech, the brand known for merging tech with city style. With its minimalistic design and subtle white accents, these shoes are perfect for navigating urban streets while looking sharp. The tagline &quot;Powered for the City, Styled for You.&quot; While they don’t come with built-in GPS, they’ll make sure you’re always on the right path—fashionably.', 'Prod_7/image1.png', 'Prod_7/image2.png', 'Prod_7/image3.png', 'Prod_7/image4.png', 179.99, 12, 3, 'Men', 60.00, '2025-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `shoe_sizes`
--

CREATE TABLE `shoe_sizes` (
  `shoe_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `size_value` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `shoe_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs_table`
--
ALTER TABLE `blogs_table`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `color_name` (`color_name`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `material_name` (`material_name`);

--
-- Indexes for table `shoes`
--
ALTER TABLE `shoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `material_id` (`material_id`);

--
-- Indexes for table `shoe_sizes`
--
ALTER TABLE `shoe_sizes`
  ADD PRIMARY KEY (`shoe_id`,`size_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `size_value` (`size_value`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shoe_id` (`shoe_id`),
  ADD KEY `size_id` (`size_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs_table`
--
ALTER TABLE `blogs_table`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shoes`
--
ALTER TABLE `shoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `shoes`
--
ALTER TABLE `shoes`
  ADD CONSTRAINT `shoes_ibfk_1` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `shoes_ibfk_2` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`);

--
-- Constraints for table `shoe_sizes`
--
ALTER TABLE `shoe_sizes`
  ADD CONSTRAINT `shoe_sizes_ibfk_1` FOREIGN KEY (`shoe_id`) REFERENCES `shoes` (`id`),
  ADD CONSTRAINT `shoe_sizes_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`shoe_id`) REFERENCES `shoes` (`id`),
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
