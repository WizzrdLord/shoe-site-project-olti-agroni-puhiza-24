-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2024 at 04:29 PM
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
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"shoe-store\",\"table\":\"blogs-table\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'shoe-store', 'blogs-table', '{\"sorted_col\":\"`blogs-table`.`blog_creation_date` ASC\"}', '2024-12-19 15:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2024-12-19 15:28:56', '{\"Console\\/Mode\":\"collapse\",\"NavigationWidth\":244}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `shoe-store`
--
CREATE DATABASE IF NOT EXISTS `shoe-store` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `shoe-store`;

-- --------------------------------------------------------

--
-- Table structure for table `blogs-table`
--

CREATE TABLE `blogs-table` (
  `blog_id` int(255) NOT NULL,
  `blog_title` text NOT NULL,
  `blog_content` text NOT NULL,
  `blog_creation_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs-table`
--

INSERT INTO `blogs-table` (`blog_id`, `blog_title`, `blog_content`, `blog_creation_date`) VALUES
(0, 'Exciting Launch of Our Shoe Store!', 'Our team has been eagerly waiting for the launch of our new shoe store, and it’s finally here! The excitement has been palpable in every department, as we all worked hard to bring this dream to life. From the sales team to customer support, everyone played an essential role in making this happen. <br><br>\r\n\r\nThe sales team has been preparing for weeks, organizing special promotions and setting up the online store. Sales Manager Jim Halpert shared his excitement: ‘It’s been incredible to see how much effort the team has put into this. I can’t wait to see the customers react when they finally get their hands on our products!’ <br><br>\r\n\r\nMeanwhile, the customer support team has been ready to offer top-notch service to our future customers. Pam Beesly, one of our best customer service representatives, mentioned, ‘I love helping people find the perfect shoe for them. It’s going to be amazing to see how our store can make customers happy.’ <br><br>\r\n\r\nOf course, we can’t forget about Toby Flenderson, our legal and HR guru. Toby has worked tirelessly to ensure everything is compliant with regulations and that our team members are taken care of. He joked, ‘My job might not seem exciting, but without it, none of this would be possible!’ <br><br>\r\n\r\nThe atmosphere in the office has been filled with anticipation, and we can’t wait to welcome you all to the store. Whether you\'re looking for a new pair of sneakers or a sleek dress shoe, we’re confident you’ll find exactly what you’re looking for. <br><br>\r\n\r\nSo, here\'s to a successful launch and a bright future ahead! Let’s continue working hard and making our customers\' shoe shopping experience unforgettable. <br><br>\r\n\r\nStay tuned for more updates and exciting promotions coming your way soon!', '2024-12-09'),
(1, 'Exciting New Partnership with Wuphf!', 'We’re thrilled to announce an exciting new partnership between our shoe store and Wuphf, the innovative communication platform from the popular show The Office! This collaboration is set to bring a whole new level of customer interaction and engagement, combining our high-quality footwear with Wuphf’s cutting-edge communication technology. <br><br>\r\n\r\nSales Manager Jim Halpert couldn’t contain his excitement, saying, ‘When we first heard about Wuphf, we knew it was something special. The potential to reach customers in new ways is immense, and we\'re excited to bring this experience to life.’ <br><br>\r\n\r\nPam Beesly from Customer Support also expressed her enthusiasm: ‘This partnership opens up a whole new avenue for us to interact with customers. It’s going to be so much fun seeing how Wuphf can change the way we communicate with our buyers.’ <br><br>\r\n\r\nToby Flenderson, our HR and legal expert, was naturally a little more cautious but still pleased with the collaboration: ‘We’ve worked through the necessary legalities to ensure that everything is in place. It\'s a great opportunity for growth, and I’m excited to see how it all unfolds.’ <br><br>\r\n\r\nWith this partnership, our store will be integrating Wuphf’s communication services directly into our customer service platform, allowing customers to easily reach out through multiple channels. Whether it’s by phone, chat, or even carrier pigeon (okay, maybe not the pigeon), we’ll be able to provide faster, more efficient service than ever before. <br><br>\r\n\r\nAs part of the partnership, we’re also rolling out exclusive promotions and special offers for customers who sign up for our Wuphf-powered communication updates. It’s a win-win for everyone involved! <br><br>\r\n\r\nThis collaboration is just the beginning. We are looking forward to future opportunities that will help us continue to innovate and provide top-tier service to our customers. With Wuphf’s cutting-edge technology and our commitment to quality, the future is bright for this partnership! <br><br>\r\n\r\nStay tuned for more exciting updates and future collaborations as we work to bring you the best shoe shopping experience possible!\r\n\r\n', '2024-12-10'),
(2, 'Facing Possible Bankruptcy – A Difficult Time for Our Store', 'It’s with a heavy heart that we share the news that our shoe store is currently facing the possibility of bankruptcy. After months of financial struggles and unforeseen challenges, we find ourselves in a difficult situation. However, we remain hopeful and committed to turning things around. <br><br>\r\n\r\nThe past few months have been particularly tough. Our sales have not met expectations, and despite our best efforts, we’ve struggled to gain traction in a competitive market. Sales Manager Jim Halpert admitted, ‘It’s been hard to keep up with the competition, and while we’ve made some great strides, it’s just not been enough to cover our expenses.’ <br><br>\r\n\r\nPam Beesly from Customer Support echoed Jim’s concerns: ‘Our customers have been incredibly supportive, but we’ve seen a decline in traffic. It’s disheartening to see such a great team working so hard, and we’re hoping for a turnaround soon.’ <br><br>\r\n\r\nToby Flenderson, who has worked tirelessly on the legal and HR side, has also been a pillar of strength during this time. ‘We’ve been exploring all our options to restructure and avoid bankruptcy,’ Toby shared. ‘I’m hopeful we can find a solution that will allow us to continue operating and keep our team intact.’ <br><br>\r\n\r\nWhile bankruptcy is not an easy situation to face, we are not giving up. Our team is working around the clock to find a viable solution, whether through restructuring, securing new investments, or exploring alternative strategies. Our primary goal is to keep the business running and provide for our employees, customers, and the community. <br><br>\r\n\r\nDespite the challenges, we are incredibly grateful for the support we’ve received from our loyal customers and team members. We’re optimistic that we can weather this storm and emerge even stronger. <br><br>\r\n\r\nWe’ll continue to update you on our progress and appreciate your understanding and support during this uncertain time. Stay with us as we navigate these challenges and work towards a brighter future for our store and everyone involved. <br><br>\r\n\r\nThank you for being a part of our journey, and we look forward to what’s to come.', '2024-12-20'),
(3, 'Exciting News: We\'ve Been Given A Second Chance By Sabre!', 'We are thrilled to announce that our shoe store has been acquired by Sabre, a global leader in technology and travel services! This marks a new chapter in our journey, and we couldn\'t be more excited about the future. <br><br>\r\n\r\nThe deal was finalized last week, and we’re already starting to see the benefits of being part of such a renowned company. Sabre’s vast resources, technology, and expertise will allow us to innovate and improve our customer experience in ways we’ve never been able to before. <br><br>\r\n\r\nJim Halpert, our Sales Manager, was over the moon about the acquisition: ‘This is a huge opportunity for us. Sabre’s network and technological capabilities will help us reach new heights. It’s an exciting time to be part of this team!’ <br><br>\r\n\r\nPam Beesly from Customer Support also shared her excitement: ‘Being part of a bigger company means more opportunities for our team to grow and thrive. We’re looking forward to using Sabre’s cutting-edge tools to serve our customers even better!’ <br><br>\r\n\r\nToby Flenderson, who was involved in the negotiations from the legal and HR side, expressed his optimism as well: ‘The acquisition went smoothly, and we’re excited to see how Sabre will help us streamline our operations. This is a positive step forward for our employees and customers alike.’ <br><br>\r\n\r\nThe integration with Sabre will bring many changes, but we’re committed to keeping the essence of what made our shoe store special. We’ll continue to focus on offering high-quality products, excellent customer service, and a unique shopping experience. <br><br>\r\n\r\nThis partnership opens the door to new possibilities, including the ability to expand our reach and improve our technology. We’re excited to explore these opportunities and continue growing as part of the Sabre family. <br><br>\r\n\r\nAs we move forward with this exciting new phase, we want to thank our loyal customers and employees for their support throughout the years. The best is yet to come, and we’re looking forward to sharing this journey with you all! <br><br>\r\n\r\nStay tuned for more updates on our integration with Sabre and the exciting changes ahead!', '2024-12-30'),
(4, 'Michael Scott Wishes Our Customers a Happy New Year!', 'As the new year approaches, we at Hat Shoes want to take a moment to reflect on the past year and extend our heartfelt thanks to all of our incredible customers. And who better to kick off the celebration than our very own Michael Scott, Regional Manager of Dunder Mifflin and, of course, an honorary member of our store family! <br><br>\r\n\r\nMichael Scott had this to say: ‘Happy New Year, everyone! 2024 is going to be the best year yet! As the great philosopher once said, “New year, new shoes!” Okay, maybe that wasn’t a philosopher, maybe it was just something I thought of in the moment. But it’s true—this year, we’re bringing you more style, more comfort, and more amazing deals!’ <br><br>\r\n\r\nHe continued: ‘I’ve had the privilege of working with so many amazing people, both in the office and in this store. We’re all like family here. And like family, we have our ups and downs, but through it all, we stick together. So here’s to another year of success, great shoes, and great times with the best customers around!’ <br><br>\r\n\r\nMichael also took a moment to remind everyone of the importance of setting goals. ‘If there’s one thing I’ve learned, it’s that if you aim high, you can achieve great things! So in 2024, set your goals, and maybe one of them could be buying the best shoes on the market right here with us!’ <br><br>\r\n\r\nOn behalf of Michael and the entire [Your Shoe Store Name] team, we wish you all a Happy New Year full of happiness, health, and, of course, amazing footwear. We’re excited to continue serving you, and we have a lot of exciting things planned for this year. Stay tuned for new arrivals, sales, and much more! <br><br>\r\n\r\nHere’s to a fantastic 2024 and beyond! Cheers to new shoes, new beginnings, and a whole lot of fun!', '2024-12-31');
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
