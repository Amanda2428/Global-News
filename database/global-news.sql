-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2025 at 07:52 PM
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
-- Database: `global-news`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `bio`, `profile`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(11, 'Sarah Johnson', 'Sarah Johnson brings in-depth world news coverage with a focus on international politics and human rights. Her goal is to connect global events with l', '1736308216.jpg', '09977485432', 'sarah.johnson@example.com', '123 Main Street, Springfield, IL, 62704', '2025-01-07 09:15:15', '2025-01-07 21:20:16'),
(12, 'David Lee', 'As a sports journalist, David Lee covers a wide array of international sporting events, providing insightful analysis and stories of athletic triumphs', '1736265067.jpg', '442079460958', 'david.lee@example.com', '45 Oxford Road, London, UK, W1D 2DA', '2025-01-07 09:21:07', '2025-01-07 09:21:07'),
(13, 'Priya Patel', 'Priya Patel reports on the latest developments in the business world, highlighting emerging markets, corporate strategies, and economic trends shaping', '1736265152.jpg', '919876543210', 'priya.patel@example.com', '12 Greenway Avenue, Mumbai, Maharashtra, 400001', '2025-01-07 09:21:48', '2025-01-07 09:22:32'),
(14, 'James Smith', 'James Smith provides expert commentary on education policies and reforms. He covers how global education systems are evolving to meet the demands of t', '1736265139.jpg', '2125550123', 'james.smith@example.com', '50 Fifth Avenue, New York, NY, 10011', '2025-01-07 09:22:19', '2025-01-07 09:22:19'),
(15, 'Maria Gonzalez', 'Maria Gonzalez focuses on the intersection of entertainment and culture, analyzing the latest trends in film, music, and the arts that are shaping mod', '1736265208.jpg', '34911234567', 'maria.gonzalez@example.com', '78 Plaza Mayor, Madrid, Spain, 28013', '2025-01-07 09:23:28', '2025-01-07 09:23:28'),
(16, 'Ahmed Khan', 'Ahmed Khan covers world news with an emphasis on the Middle East, reporting on political developments, economic shifts, and how regional events affect', '1736265241.jpg', '971501234567', 'ahmed.khan@example.com', '23 Sheikh Zayed Road, Dubai, UAE, 00000', '2025-01-07 09:24:01', '2025-01-07 09:24:01'),
(17, 'Emily Zhang', 'Emily Zhang reports on the booming entertainment industry in Asia, focusing on how Chinese and Korean media are influencing global pop culture and ent', '1736265283.jpg', '861012345678', 'emily.zhang@example.com', '56 Zhongguancun Street, Beijing, China, 100080', '2025-01-07 09:24:43', '2025-01-07 09:24:43'),
(18, 'Liam O’Connor', 'Liam O’Connor covers the latest developments in business and economics, particularly in the European Union, exploring how policy decisions shape marke', '1736265333.jpg', '35311234567', 'liam.oconnor@example.com', '99 St. Patrick\'s Street, Dublin, Ireland, D02 A389', '2025-01-07 09:25:33', '2025-01-07 09:25:33'),
(19, 'Chloe Martin', 'Chloe Martin explores the intersections of education and technology, focusing on how innovations in digital learning are transforming educational acce', '1736265372.jpg', '61298765432', 'chloe.martin@example.com', '34 Queen Street, Sydney, NSW, 2000, Australia', '2025-01-07 09:26:12', '2025-01-07 09:26:12'),
(20, 'Robert Harris', 'Robert Harris specializes in global business news, focusing on trends in finance, technology, and the corporate world. His insights help readers under', '1736265459.jpg', '441632960961', 'robert.harris@example.com', '88 Shibuya Street, Tokyo, Japan, 150-0002', '2025-01-07 09:27:39', '2025-01-07 09:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('doc@gmail.com|127.0.0.1', 'i:1;', 1736652269),
('doc@gmail.com|127.0.0.1:timer', 'i:1736652269;', 1736652269),
('may@gmail.com|127.0.0.1', 'i:5;', 1736648545),
('may@gmail.com|127.0.0.1:timer', 'i:1736648545;', 1736648545);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `social_media_link` varchar(255) DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `category_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `image`, `video`, `social_media_link`, `author_id`, `category_type_id`, `created_at`, `updated_at`) VALUES
(6, 'Howell McGlynn', 'Doloremque eveniet et exercitationem fugit ducimus. Quas consectetur dolores magni facilis eveniet. Porro rem recusandae sit sunt possimus.\n\nAdipisci ad et velit iure asperiores unde voluptate. Consequatur amet consectetur culpa laboriosam aut. Hic asperiores in voluptatibus qui eos maxime hic. Totam ea molestiae dicta.', 'aGwYGP7Nd3', '9xNFZlUCvA', 'https://www.google.com', 6, 6, '2025-01-07 09:00:58', '2025-01-07 09:00:58'),
(7, 'Mr. Toni Ferry Jr.', 'Voluptate aliquid beatae alias. Officiis ipsa nulla mollitia occaecati error dolores. Nihil qui aut reprehenderit sequi eligendi dolorem. Non ut quaerat et vel nobis.\n\nEst et dolor animi voluptatem. Eum doloremque est ad exercitationem. Ullam consequatur fuga enim. Qui impedit totam quo nulla quia expedita voluptatem.', 'xHOO8xenYh', 'vdKXY17afn', 'https://www.google.com', 7, 7, '2025-01-07 09:00:58', '2025-01-07 09:00:58'),
(8, 'Ms. Joannie Schaefer', 'Distinctio fugiat praesentium numquam repellendus eius vel reiciendis. Ex voluptatem repellendus eum eaque quis vel provident. Nostrum quia saepe velit rerum quos. Et non dolorem nisi iure adipisci quia.\n\nVeritatis rem et iusto delectus quis dolores soluta. Adipisci commodi est deserunt dicta. Qui doloribus sint quam. Hic eveniet molestiae qui quo.', 'pqSo8w8PuZ', 'rnHxRIEOWo', 'https://www.google.com', 8, 8, '2025-01-07 09:00:58', '2025-01-07 09:00:58'),
(9, 'Casper Gislason IV', 'Tempore nihil ullam qui reprehenderit. Distinctio magni laboriosam sunt sed minus. In alias voluptate vel quod consequatur fuga numquam. Expedita temporibus quod voluptatum enim. Recusandae quidem esse corporis nostrum.\n\nSit quia et ut explicabo laborum eligendi. Perspiciatis id enim aut eius quia asperiores optio. Quibusdam esse sint consequatur placeat maiores accusantium laboriosam. Fugiat et iste corrupti officiis.', 'hrBOsyQdCX', 'mfMVbBUEhm', 'https://www.google.com', 9, 9, '2025-01-07 09:00:58', '2025-01-07 09:00:58'),
(10, 'Lynn Fritsch', 'Repellat atque quibusdam aspernatur corporis alias reprehenderit. Aut placeat dolor delectus sunt. Qui nisi delectus saepe et.\n\nVeniam qui sunt dolorem et quis aperiam repudiandae molestiae. Labore dolores libero nobis qui id voluptatem. Explicabo quam soluta quo qui.', '5ko19Nly6z', 'x7mT4rMk8H', 'https://www.google.com', 10, 10, '2025-01-07 09:00:58', '2025-01-07 09:00:58'),
(12, 'Spurs trigger extension in Son contract until 2026', 'Tottenham have triggered an option to extend forward Son Heung-min contract by a year, until the summer of 2026.\r\n\r\nThe 32-year-old joined Spurs from Bayer Leverkusen in 2015 and has scored 169 goals in 431 appearances for the club.\r\n\r\nThe South Korea international has 125 goals and 68 assists in 320 Premier League outings.\r\n\r\n\"Brilliant,\" said Tottenham boss Ange Postecoglou. \"Hes already had an outstanding career at this football club.\r\n\r\n\"He is played a big role in the last sort of 10 years, made an impact at the club and in the Premier League. It is great to extend his stay.\r\n\r\n\"The ambition is to make sure he finishes his Tottenham career with some silverware.\"\r\n\r\nSon was part of a Tottenham side that reached the club first Champions League final in 2019, which Spurs lost to Liverpool, but he is yet to win a trophy with the club.\r\n\r\nThe north London side have made the announcement about his contract extension prior to the first leg of their Carabao Cup semi-final at home to Liverpool on Wednesday.\r\n\r\nSpurs are 12th in the Premier League this season, with Son scoring five goals and registering six assists in 17 top-flight appearances.', '1736266843.webp', '1736266843.mp4', 'https://www.bbc.com/sport/football/articles/cn08lkqvzvzo', 12, 2, '2025-01-07 09:50:43', '2025-01-07 09:50:43'),
(13, 'Ex-champions Guangzhou expelled from Chinese leagues', 'Chinas most successful side Guangzhou FC will not play professionally next season because of their failure to pay off enough of their substantial debt.\r\n\r\nThe eight-time Chinese Super League (CSL) champions have been refused permission by the Chinese Football Association to play in professional domestic football when the new campaign begins.\r\n\r\nIt is a spectacular fall from grace and brings to an end an era of lavish spending that propelled them to two AFC Champions League titles in three years in 2013 and 2015.\r\n\r\nDuring that successful period they finished fourth at the Club World Cup, agreed an academy partnership with Real Madrid and revealed plans for a 100,000-capacity stadium.\r\nGuangzhou mirror crisis in Chinese football\r\nGuangzhou rapid ascent began when property developers China Evergrande bought the club in 2010 when it was in the Chinese second tier.\r\n\r\nThe new ownership group renamed the side Guangzhou Evergrande and invested heavily on and off the pitch, aligning with China president Xi Jinpings ambition to turn the country into a football superpower that could host - and win - the World Cup.\r\n\r\nItalys World Cup-winning coach Marcello Lippi was appointed manager in 2012 and masterminded three CSL titles, a Chinese FA Cup and the AFC Champions League.\r\n\r\nLuiz Felipe Scolari, who led Brazil to World Cup glory in 2002, was even more successful, winning seven trophies in two-and-a-half years.\r\n\r\nFormer Tottenham and Barcelona midfielder Paulinho, ex-Italy striker Alberto Gilardino and former Colombia forward Jackson Martinez were among the foreign stars to arrive for big transfer fees and equally large wages.\r\n\r\nBut Guangzhou were far from alone in their enormous spending.\r\n\r\nAn array of international players moved to China as the CSL sought to compete with powerhouses such as the Premier League, La Liga, Serie A and Bundesliga.\r\n\r\nBrazil striker Hulk joined Shanghai SIPG, who were managed by former England boss Sven-Goran Eriksson, for £46m.\r\n\r\nChelsea midfielder Oscar soon followed for £60m while ex-Manchester City and United striker Carlos Tevez moved to Shanghai Shenhua for a reported £40m.\r\n\r\nAll were on huge wages and in 2016 Chelsea manager Antonio Conte said the money spent on players by Chinese clubs was a \"danger for all teams in the world\".\r\n\r\nArsenal boss Arsene Wenger added that \"China looks to have the financial power to move a whole European league to China\".\r\n\r\nIn 2019, Real Madrids Gareth Bale - at one point the most expensive player in the world - was linked with a move to Jiangsu Suning on wages worth £1m-a-week.\r\n\r\nBut things quickly began to change. The Chinese Football Association, wary of the spiralling spending, introduced a \"luxury tax\" that made big-money transfers prohibitively expensive.\r\n\r\nA salary cap was also introduced and sponsors were banned from naming teams after themselves, meaning Guangzhou Evergrande were renamed Guangzhou FC.\r\n\r\nEvergrande were already in financial difficulty by that point and in 2021 they defaulted on debt payments amid a wider real estate crisis in China that was exacerbated by the impact of the Covid-19 pandemic.\r\n\r\nThe company filed for bankruptcy in 2022, plunging Guangzhou into crisis. Their ambitious stadium plans were cancelled and players were sold, culminating in relegation later that year.\r\n\r\nAfter narrowly missing out on promotion in the 2024 season, Guangzhou have now been refused permission to compete in the upcoming campaign because of their ongoing financial issues.\r\n\r\nHowever the club remain hopeful of existing in some form.\r\n\r\n\"We regret that we failed to make it, hence our sincerest apologies to fans and the people from all walks of life that support the club,\" Guangzhou said in a statement.\r\n\r\n\"We will not change our original intention and do our best to deal with the aftermath and support the development of Chinese football and Guangdong and Guangzhou football.\"', '1736267746.webp', '1736267746.mp4', 'https://www.bbc.com/sport/football/articles/c86w87lee83o', 14, 2, '2025-01-07 10:05:46', '2025-01-07 10:05:46'),
(14, 'Why Liverpool contract conundrum could create \"toxic atmosphere\"', 'The Athletics senior writer Rory Smith explains why Liverpool might not be in full control of contract negotiations and how this could result in a \"toxic atmosphere\".', '1736267897.png', '1736267897.mp4', 'https://www.bbc.com/sport/football/videos/c0ewvrg81gdo', 11, 2, '2025-01-07 10:08:17', '2025-01-07 10:08:17'),
(15, 'I have been his level & I want it again - Guardiola on Grealish', 'Manchester City boss Pep Guardiola says Jack Grealish must prove he deserves to regain his spot in the team  starting line-up by showing the quality he displayed when the club won the Treble in 2023.', '1736268044.png', '1736268044.mp4', 'https://www.bbc.com/sport/videos/crmnyg8pnxno', 18, 2, '2025-01-07 10:10:44', '2025-01-07 10:10:44'),
(16, 'Moment over 100,000 teddy bears fly onto ice rink', 'A world record 102,343 stuffed toys hit the ice rink in a moment of \"sweet, cuddly mayhem\", according to an American Hockey League team.\r\n\r\nAt the game in Hershey, Pennsylvania, footage shows stuffed toys flying over the glass after the Hershey Bears scored against the Providence Bruins.\r\n\r\nThe annual teddy bear toss has been held by the Hershey Bears hockey club since 2001, with this year event beating the previous record of 74,599 collected in 2024.\r\n\r\nThe stuffed toys will be distributed across a total of 35 local charities, according to the club.', '1736268227.png', '1736268227.mp4', 'https://www.bbc.com/news/videos/cr7vg45y0g7o', 14, 2, '2025-01-07 10:13:47', '2025-01-07 10:13:47'),
(17, 'The next few games are enormous for Postecoglou - Sutton', 'The Monday Night Clubs Chris Sutton explains why Ange Postecoglous next few games are so \"enormous\" and why he might have to adapt his style of play.', '1736268325.png', '1736268325.mp4', 'https://www.bbc.com/sport/football/videos/cwyp48v48vwo', 17, 2, '2025-01-07 10:15:25', '2025-01-07 10:15:25'),
(18, '\"I just can not believe it\" - Luke Littler after win', 'Teenage darts sensation Luke Littler said \"it is not sunk in\" after he become the youngest PDC World Championship winner in history.\r\n\r\nLittler etched his name into darting history with a crushing 7-3 victory over Michael van Gerwen at Alexandra Palace.\r\n\r\nHe said \"the tears came\" when he saw the crowd on their feet after his winning throw.', '1736268592.jpg', '1736268592.mp4', 'https://www.bbc.com/news/videos/c20e9z8l5e6o', 16, 2, '2025-01-07 10:19:52', '2025-01-07 10:19:52'),
(19, 'No pressure on me in final - Littler', 'Luke Littler says he does not feel any pressure to win the PDC World Darts Championship title as he prepares to face Michael van Gerwen in the final at Alexandra Palace on Friday.', '1736268732.jpg', '1736268732.mp4', 'https://www.bbc.com/sport/darts/videos/c5y4lmpj3g3o', 14, 2, '2025-01-07 10:22:13', '2025-01-07 10:22:13'),
(20, 'Ancelotti responds to Alexander-Arnold Madrid rumours', 'Real Madrid manager Carlo Ancelotti responds to the rumours that the club will make a bid for Liverpool\'s Trent Alexander-Arnold in the January transfer window.', '1736268853.jpg', '1736268853.mp4', 'https://www.bbc.com/sport/football/videos/c2ldq2249l2o', 19, 2, '2025-01-07 10:24:13', '2025-01-07 10:24:13'),
(21, 'No resting players against Man Utd - Slot', 'Liverpool head coach Arne Slot says he will not rest players on Sunday against a Manchester United side in poor form - adding that they are a much better team than the Premier League table suggests.', '1736268950.jpg', '1736268950.mp4', 'https://www.bbc.com/sport/football/videos/c5ygw0q0l73o', 19, 2, '2025-01-07 10:25:50', '2025-01-07 10:25:50'),
(22, 'Tibet earthquake rescuers search for survivors in freezing temperatures', 'Rescue workers are searching for survivors after a major earthquake killed dozens of people and damaged more than 1,000 buildings in a remote region of Tibet, near Everest.\r\n\r\nAt least 126 people were killed, with another 188 injured, after the earthquake hit the foothills of the Himalayas at around 09:00 local time (01:00 GMT) on Tuesday, according to Chinese state media.\r\n\r\nA large-scale rescue operation was launched, with survivors under additional pressure as temperatures were predicted to fall as low as -16C (3.2F) overnight.\r\n\r\nEarthquakes are common in the region, which lies on a major geological fault line, but Tuesdays was one of Chinas deadliest in recent years.\r\n\r\nThe magnitude 7.1 quake, which struck at a depth of 10 kilometres (six miles), according to data from the US Geological Survey, was also felt in Nepal and parts of India, which neighbour Tibet.\r\n\r\nVideos published by Chinas state broadcaster CCTV showed destroyed houses and collapsed buildings in Tibets holy Shigatse city, with rescue workers wading through debris and handing out thick blankets to locals.\r\n\r\nTemperatures in Tingri county, near the earthquakes epicentre in the northern foothills of the Himalayas, were already as low as -8C (17.6F) before night fell, according to the China Meteorological Administration.\r\n\r\nSangji Dangzhi - whose supermarket was damaged in the earthquake - said the damage to homes had been extensive.\r\n\r\n\"Here the houses are made from dirt so when the earthquake came... lots of houses collapsed,\" the 34-year-old told news agency AFP by phone, adding that ambulances had been taking people to hospital through out the day.\r\n\r\nA hotel resident in Shigatse told Chinese media outlet Fengmian News that he was jolted awake by a wave of shaking. He said he grabbed his socks and rushed out onto the street, where he saw helicopters circling above.\r\n\r\n\"It felt like even the bed was being lifted,\" he said, adding that he immediately knew it was an earthquake because Tibet recently experienced multiple smaller quakes.\r\n\r\nBoth power and water in the region have been disrupted. There were more than 40 aftershocks in the first few hours following the quake.', '1736269182.webp', '1736269182.mp4', 'https://www.bbc.com/news/articles/c3rqg95n9n1o', 19, 1, '2025-01-07 10:29:42', '2025-01-07 10:29:42'),
(23, 'Meta to replace \"biased\" fact-checkers with moderation by users', 'Meta is abandoning the use of independent fact-checkers on Facebook and Instagram, replacing them with X-style \"community notes\" where commenting on the accuracy of posts is left to users.\r\n\r\nIn a video posted alongside a blog post by the company on Tuesday, chief executive Mark Zuckerberg said third-party moderators were \"too politically biased\" and it was \"time to get back to our roots around free expression\".\r\n\r\nJoel Kaplan, who is replacing Sir Nick Clegg as Meta head of global affairs, wrote that the companys reliance on independent moderators was \"well-intentioned\" but had too often resulted in the censoring of users.\r\n\r\nHowever, campaigners against hate speech online have reacted to the change with dismay.\r\n\"Zuckerbergs announcement is a blatant attempt to cozy up to the incoming Trump administration – with harmful implications\", said Ava Lee, from Global Witness, a campaign group which describes itself as seeking to hold big tech to account.\r\n\r\n\"Claiming to avoid \"censorship\" is a political move to avoid taking responsibility for hate and disinformation that platforms encourage and facilitate\", she added.', '1736269511.webp', '1736269511.mp4', 'https://www.bbc.com/news/articles/cly74mpy8klo', 15, 1, '2025-01-07 10:35:11', '2025-01-07 10:35:11'),
(24, '\"French far-right politician Jean-Marie Le Pen dies at 96\"', '\"French far-right politician Jean-Marie Le Pen has died aged 96.\r\n\r\nLe Pen, who had been in a care facility for several weeks, died at midday on Tuesday \"surrounded by his loved ones\", the family said.\r\n\r\nLe Pen - who repeatedly played down the Holocaust and was an unrepentant extremist on race, gender and immigration - founded the French far-right National Front party in 1972.\r\n\r\nHe reached the presidential election-run off against Jacques Chirac in 2002.\r\n\r\nLe Pens daughter, Marine, took over as party chief in 2011. She has since rebranded the party as National Rally, turning it into one of Frances main political forces.\r\n\r\nAccording to French media, she had just landed in Nairobi, Kenya when she heard the news and is flying back to France.\r\n\r\nJordan Bardella, who succeeded Marine Le Pen as party chair in 2022, said Jean-Marie had \"always served France\" and \"defended its identity and sovereignty\".\r\n\r\nObituary: Jean-Marie Le Pen - founder of French far right and \"Devil of the Republic\"\r\nFrench President Emmanuel Macron described Le Pen as a \"historic figure of the far right\", adding that \"history will judge\" his role in the country`s political life.\r\n\r\nFar-right nationalist Eric Zemmour said on X that \"beyond the controversies and the scandals\" Le Pen would be remembered for being \"among the first to alert France of the existential threats lurking\".\r\n\r\nOn the other end of the political spectrum, Jean-Luc Mélenchon, leader of the radical left France Unbowed (LFI), said that respecting the dignity of the dead and the grief of their family \"does not cancel out the right to judge their actions. Those of Jean-Marie Le Pen are unbearable.\r\n\r\n\"The struggle against the man is over. That against the hatred, racism, Islamophobia and antisemitism that he spread continues.\"\r\n\r\nFor several decades, Le Pen was France`s most controversial political figure. His critics denounced him as a far-right bigot and the courts convicted him several times for his radical remarks.\r\n\r\nIn a notorious interview in 1987, he pointedly played down the Holocaust - Nazi Germany`s murder of six million Jews. \"I do not say that the gas chambers did not exist. I never personally saw them,\" he told an interviewer. \"I have never particularly studied the issue, but I believe they are a point of detail in the history of World War Two.\"\r\n\r\nFrance has strict laws against Holocaust denial and Le Pen was convicted of contesting crimes against humanity and fined €30,000 ($31,180; £24,875).\r\n\r\nThe former National Front chief was convicted of the same charge in 2012 after saying France`s Nazi occupation had been \"not particularly inhumane\".\r\n\r\nStill, Le Pen`s strident anti-immigration policies attracted voters. In the 1988 presidential election, he took 14% of the vote. That figure rose to 15% in 1995, and in 2002 Le Pen reached the final round of the presidential election.\r\n\r\nHowever, parties across the political spectrum called on their supporters to vote against him, and his opponent Chirac won with 82%.\r\n\r\nIn 2015, Le Pen was expelled from the National Rally after repeating his infamous Holocaust denial.\r\n\r\nThe dismissal also came during a public feud with his daughter, who accused him of reiterating Holocaust denial to try to \"rescue himself from obscurity\".\r\n\r\n\"Maybe by getting rid of me she wanted to make some kind of gesture to the establishment,\" Le Pen would later tell the BBCs Hugh Schofield.\"', '1736269653.webp', '1736269653.mp4', 'https://www.bbc.com/news/articles/cvgm2jvkl2yo', 11, 1, '2025-01-07 10:37:33', '2025-01-07 10:37:45'),
(25, 'What you need to know about HMPV', 'In recent weeks, scenes of hospitals in China overrun with masked people have made their rounds on social media, sparking worries of another pandemic.\r\n\r\nBeijing has since acknowledged a surge in cases of the flu-like human metapneumovirus (HMPV), especially among children, and it attributed this to a seasonal spike.\r\n\r\nBut HMPV is not like Covid-19, public health experts have said, noting that the virus has been around for decades, with almost every child being infected by their fifth birthday.\r\n\r\nHowever, in some very young children and people with weakened immune systems, it can cause more serious illness. Here is what you need to know.\r\n\r\nWhat is HMPV and how does it spread?\r\nHMPV is a virus that will lead to a mild upper respiratory tract infection - practically indistinguishable from flu - for most people.\r\n\r\nFirst identified in the Netherlands in 2001, the virus spreads through direct contact between people or when someone touches surfaces contaminated with it.\r\n\r\nSymptoms for most people include cough, fever and nasal congestion.\r\n\r\nThe very young, including children under two, are most vulnerable to the virus, along with those with weakened immune systems, including the elderly and those with advanced cancer, says Hsu Li Yang, an infectious diseases physician in Singapore.\r\n\r\nIf infected, a \"small but significant proportion\" among the immunocompromised will develop more severe disease where the lungs are affected, with wheezing, breathlessness and symptoms of croup.\r\n\r\n\"Many will require hospital care, with a smaller proportion at risk of dying from the infection,\" Dr Hsu said.', '1736269755.webp', '1736269755.mp4', 'https://www.bbc.com/news/articles/c23vjg7v7k0o', 12, 1, '2025-01-07 10:39:15', '2025-01-07 10:39:15'),
(26, 'Thousands without water and electricity as cold snap grips RoI', 'Thousands of customers in the Republic of Ireland are still without water and electricity as snow and icy weather conditions continue to grip much of the country.\r\n\r\nAll non-urgent outpatients appointments in a number of hospitals have been cancelled and thousands of homes are without power.\r\n\r\nSchools in several counties were closed on the first day of term.\r\n\r\nBus and rail services were also impacted as a result of the conditions, which were most prominently felt in counties Cork, Kerry, Tipperary and Limerick, and southern Leinster.\r\n\r\nIrish national weather forecaster Met Éireann issued a fresh yellow warning for snow and ice on Monday afternoon for the entire country until 06:00 local time on Friday.\r\n\r\nAn orange warning for low temperatures and ice has been issued for 22 counties, due to come into effect at 20:00 until 10:00 on Wednesday.\r\n\r\nThe warning is for Carlow, Kildare, Kilkenny, Laois, Longford, Meath, Offaly, Westmeath, Wicklow, Cavan, Monaghan, Munster and Connacht.\r\nd.', '1736269992.webp', '1736269992.mp4', 'https://www.bbc.com/news/articles/cr7vg535vvro', 20, 1, '2025-01-07 10:43:12', '2025-01-07 10:43:12'),
(27, 'Two people found dead in JetBlue plane landing gear', 'The bodies of two people were found in a landing gear compartment of a JetBlue plane at the Fort Lauderdale airport in Florida, according to the company.\r\n\r\nThe two deceased people were found during a routine inspection on Monday night after the plane landed, JetBlue said.\r\n\r\n\"The circumstances surrounding how they accessed the aircraft remain under investigation,\" the company said in a statement.\r\n\r\n\"This is a heartbreaking situation, and we are committed to working closely with authorities to support their efforts to understand how this occurred.\"', '1736270267.webp', '1736270267.mp4', 'https://www.bbc.com/news/articles/cj90m8gxn3xo', 12, 1, '2025-01-07 10:47:47', '2025-01-07 10:47:47'),
(28, 'Italian village forbids residents from becoming ill', 'A  small Italian village has banned its residents from becoming seriously ill.\r\n\r\nPeople living in Belcastro \"are ... ordered to avoid contracting any illness that may require emergency medical assistance,\" a decree from local Mayor Antonio Torchia states.\r\n\r\nBelcastro sits in the southern region of Calabria - one of Italys poorest.\r\n\r\nTorchia said the move was \"obviously a humorous provocation\", but that it was having more of an effect than the urgent notices he had sent to regional authorities to highlight the shortcomings of the local healthcare system.\r\nAround half of Belcastros 1,200 residents are over the age of 65 and the nearest Accident & Emergency (A&E) department is over 45km (28 miles) away, the mayor said.\r\n\r\nHe added that the A&E was only reachable by a road with a 30kmh (18mph) speed limit.\r\n\r\nThe villages on-call doctor surgery is also only open sporadically and offers no cover during weekends, holidays or after hours.\r\n\r\nTorchia told Italian TV that it was hard to \"feel safe when you know that if you need assistance, your only hope is to make it to [A&E] on time\" - and that the roads were almost \"more of a risk than any illness\".\r\n\r\nAs part of the decree, residents have also been ordered \"not to engage in behaviours that may be harmful and to avoid domestic accidents\", and \"not to leave the house too often, travel or practise sports, and to [instead] rest for the majority of the time\".\r\nIt is unclear how these new rules will be enforced, if at all.\r\n\r\nThe sparsely populated region of Calabria - the tip of Italys boot - is one of the countrys poorest.\r\n\r\nPolitical mismanagement and mafia interference have decimated its healthcare system, which was put under special administration from the central government almost 15 years ago.\r\n\r\nRome-appointed commissioners have had difficulties tackling the vast levels of debt faced by hospitals, meaning Calabrians remain crippled by a serious lack of medical personnel and beds, as well as interminable waiting lists.', '1736270724.webp', '1736270724.mp4', 'https://www.bbc.com/news/articles/c4gxnv6ng7yo', 11, 1, '2025-01-07 10:55:24', '2025-01-07 10:55:24'),
(29, 'Iran reportedly executed at least 901 people in 2024, UN says', 'At least 901 people were reportedly executed in Iran last year, including about 40 in a single week in December, according to the UN human rights chief.\r\n\r\n\"It is deeply disturbing that yet again we see an increase in the number of people subjected to the death penalty in Iran year-on-year,\" Volker Türk said. \"It is high time Iran stemmed this ever-swelling tide of executions.\"\r\n\r\nThe total is the highest recorded in nine years and marks a 6% increase from 2023, when 853 people were executed.\r\n\r\nMost of the executions were for drug-related offences, but dissidents and people connected to the 2022 protests were also executed, according to the UN. There was also a rise in the number of women executed.\r\n\r\nTürk urged Iranian authorities to halt all further executions and to place a moratorium on the use of the death penalty with a view to ultimately abolishing it.\r\n\r\n\"The death penalty is incompatible with the fundamental right to life and raises the unacceptable risk of executing innocent people. And, to be clear, it can never be imposed for conduct that is protected under international human rights law,\" he warned.\r\n\r\nA spokeswoman for the UN human rights office told reporters that its figures had come from several organisations which it considered reliable, including Irans Human Rights Activists News Agency (HRANA), Iran Human Rights (IHR) and Hengaw.\r\n\r\nOn Monday, Norway-based IHR said in a report that in at least 31 women were executed during 2024 - the highest number since it began monitoring the death penalty 17 years ago.\r\n\r\nNineteen of them were sentenced to death after being convicted of murder, according to the report. They included, Leila Ghaemi, who IHR said had strangled her husband after she came home one day to find him and his friends raping her young daughter.\r\n\r\nThe other 12 women were convicted of drug-related offences. Among them was Parvin Mousavi, who IHR said had been her familys breadwinner and had been paid about €15 ($15.60) to transport what she was told was medicine, but turned out to be 5kg of morphine.\r\n\r\nActivists say drugs offences do not meet the threshold of \"most serious crimes\" to which the death penalty must be restricted under international law,\r\n\r\nA separate report from Hengaw, a Kurdish human rights group, said that more than half of those executed last year were from Irans ethnic minorities, including 183 Kurds.\r\n\r\nThe UNs fact-finding mission on Iran said in August that ethnic and religious minorities had been disproportionately impacted by the governments crackdown on dissent since 2022, when the nationwide \"Woman, Life, Freedom\" protests erupted in response to the death in custody of a young Kurdish woman detained by morality police for not wearing a \"proper\" hijab.\r\n\r\nHRANA, meanwhile, reported that it had documented the execution of five juvenile offenders. International law prohibits the use of capital punishment in all cases in which the accused was under 18 at the time of their alleged offence.\r\n\r\nIran accounted for 74% of all recorded executions worldwide in 2023, according to the human rights group Amnesty International.\r\n\r\nThose figures excluded China, which Amnesty said was thought to execute thousands of people each year, but where data on the death penalty was classified.', '1736270866.webp', '1736270866.mp4', 'https://www.bbc.com/news/articles/ced8qw8q62jo', 20, 1, '2025-01-07 10:57:46', '2025-01-07 10:57:46'),
(30, 'Nvidia unveils robot ambitions and powerful new gaming chips', 'The boss of US chip giant Nvidia has unveiled the firms next-generation of gaming chips and pledged the \"ChatGPT moment for general robotics is just around the corner\".\r\n\r\nThe announcements were part of CEO Jensen Huangs keynote address at CES, the major annual technology show in Las Vegas.\r\n\r\nThe new family of gaming chips will use Nvidias Blackwell artificial intelligence (AI) technology to create movie-quality images, he told a packed arena.\r\n\r\nThe chips will range in price from $549 (£438) to $1,999, and are twice as fast as their predecessors, he added.\r\nHe also introduced an AI model, called Cosmos, which he said could generate video that can be used to train robots and self-driving cars at a much lower cost than current methods.\r\n\r\nBy creating what is known in the industry as \"synthetic\" training data, the model can help robots and cars better understand the physical world.\r\n\r\nUsers will be able to give Cosmos a text description that can be used to generate video of a world that obeys the laws of physics.\r\n\r\n\"All of the enabling technologies that Ive been talking about is going to make it possible for us in the next several years to see very rapid breakthroughs, surprising breakthroughs in general robotics,\" he predicted, though he added much more training data would be needed.\r\n\r\nMr Huang carried out a real-time demonstration of the new gaming chip that showed off highly detailed graphics featuring an array of textures and manoeuvres.\r\n\r\n\"It was awesome that they can do this in real time,\" said Gary Yang, a graduate student in robotics at the California Institute of Technology.\r\n\r\n\"Previously wed think of these graphics as pre-rendered.\"\r\n\r\nThe new chips will start making their way to consumers starting in late January.\r\n\r\n\"I thought it was incredible,\" said Scott Epstein of technology start-up Agenovate AI.\r\n\r\n\"They are continuing to innovate.\"\r\n\r\nMr Yang and Mr Epstein were among thousands of people who watched the speech both in person and virtually on the eve of the official opening of CES.', '1736271054.webp', '1736271054.mp4', 'https://www.bbc.com/news/articles/c0q0jl8pl9ko', 13, 3, '2025-01-07 11:00:54', '2025-01-07 11:00:54'),
(31, 'UFC boss to join board of Facebook owner Meta', 'Meta has announced the appointment of three new board members including the chief executive of the Ultimate Fighting Championship (UFC) and close Donald Trump ally, Dana White.\r\n\r\nIt comes as Metas chief executive, Mark Zuckerberg, appears to be making efforts to mend ties with Trump, ahead of the US president-elect inauguration this month.\r\n\r\nDays ago former UK deputy prime minister and Liberal Democrat leader Sir Nick Clegg left his job as president of global affairs at the social media giant.\r\n\r\nThe other new members of Metas board include John Elkann, who leads European investment firm Exor, and Charlie Songhurst, a former Microsoft executive.', '1736271300.webp', '1736271300.mp4', 'https://www.bbc.com/news/articles/c627p8leww1o', 15, 3, '2025-01-07 11:05:00', '2025-01-07 11:05:00'),
(32, 'Euro zone inflation rose to 2.4% in December, meeting expectations', 'Annual inflation in the euro zone rose for a third straight month to reach 2.4% in December, statistics agency Eurostat said Tuesday.\r\n\r\nThe preliminary reading was in line with the forecast of economists polled by Reuters and marked an increase from a revised 2.2% print in November. Core inflation held at 2.7% for a fourth straight month, also meeting economists expectations, while services inflation nudged up to 4% from 3.9%.\r\n\r\nHeadline inflation was widely expected to accelerate after hitting a low of 1.7% in September, as base effects from lower energy prices fade. The full extent of increases in the reading — along with persistence in services and core inflation — will be closely watched by the European Central Bank, which markets currently expect to cut interest rates from 3% to 2% across several trims this year.\r\n\r\nThe pace of price rises in the euro zones largest economy, Germany, hit a higher-than-expected 2.8% in December, according to figures published separately this week. Inflation in France meanwhile came in at 1.8% last month, below a Reuters analyst poll forecasting a 1.9% print.\r\n\r\nThe euro\r\n held early-morning gains against the U.S. dollar following the print, trading 0.33% higher at $1.0424 at 10:43 a.m. in London. Traders are assessing whether the euro could decline to parity with the greenback this year, if the U.S. Federal Reserve proves significantly more hawkish than the ECB.', '1736271658.webp', '1736271658.mp4', 'https://www.cnbc.com/2025/01/07/euro-zone-inflation-december-2024.html', 14, 3, '2025-01-07 11:10:58', '2025-01-07 11:10:58'),
(33, '\"Trump reportedly considering important alteration to tariff plans\"', '\"President-elect Donald Trump is considering a plan that still would apply tariffs to all nations but narrow the focus to a select set of goods and services, according to a Washington Post report.\r\n\r\nThe new approach to tariffs likely wouldnt be as powerful as Trumps earlier ideas but still would cause major changes to global commerce, the paper said, citing people familiar with Trumps thinking.\r\n\r\nTrump, however, disputed the report in a post on Truth Social.\r\n\r\n“The story in the Washington Post, quoting so-called anonymous sources, which don’t exist, incorrectly states that my tariff policy will be pared back. That is wrong,” he wrote.\r\n\r\nThe report comes amid concerns that the incoming presidents insistence on imposing universal tariffs of 10% or 20% and specifically targeting China and Mexico would cause another spike in inflation.\r\n\r\nDuring Trumps first term, duties on a wide range of imports did little to raise prices broadly and in fact were kept in place when Joe Biden took over as president. However, economists worry that conditions are different now and aggressive tariffs would have a greater impact.\r\n\r\nThe Post report said its still not clear which sectors would be affected by the plans, though early discussions are looking at various industrial metals, medical supplies and energy.\r\n\r\nThe U.S. is running a $74 billion monthly trade deficit that exploded during the Covid pandemic.\"', '1736272069.webp', '1736272069.mp4', 'https://www.cnbc.com/2025/01/06/trump-reportedly-considering-important-alteration-to-tariff-plans.html', 17, 3, '2025-01-07 11:17:49', '2025-01-07 11:29:46'),
(34, 'Wall Street notches another win as Feds Barr clears the way for gentler banking regulator', 'The early departure of the Federal Reserves top financial regulator allows for a more industry-friendly official to take his place, the latest boon for U.S. banks riding a wave of post-election optimism.\r\n\r\nFederal Reserve Vice Chair for Supervision Michael Barr said Monday that he plans to step down from his role by next month to avoid a protracted legal battle with the Trump administration, which had weighed seeking his removal.\r\n\r\nThe announcement, a reversal from Barrs previous comments on the matter, ends his supervisory role roughly 18 months earlier than planned. It also removes a possible impediment to Donald Trumps deregulatory agenda.\r\n\r\nBanks and other financial stocks were among the big winners after the election of Trump in November on speculation that softer regulation and increased deal activity, including mergers, were on the way. Weeks after his victory, Trump selected hedge fund manager Scott Bessent as his choice for Treasury secretary.\r\n\r\nTrump has yet to name picks for the three major bank regulatory agencies — the Federal Deposit Insurance Corp., Office of the Comptroller of the Currency and the Consumer Financial Protection Bureau.\r\n\r\nNow, with Barrs resignation, a more precise image of incoming bank regulation is forming.\r\n\r\nTrump is limited to picking one of two Republican Fed governors for vice chair of supervision: Michelle Bowman or Christopher Waller.\r\n\r\nWaller declined to comment, while Bowman didnt immediately respond to request for comment.\r\n\r\nBowman, whose name had already appeared on short lists for possible Trump administration roles and is considered the front-runner, has been a critic of Barr attempt to force American banks to hold more capital — a proposal known as the Basel III Endgame.\r\n\r\n“The regulatory approach we took failed to consider or deliver a reasonable proposal, one aligned with the original Basel agreement yet suited to the particulars of the U.S. banking system,” Bowman said in a November speech.\r\n\r\nBowman, a former community banker and Kansas bank commissioner, could take on “industry-friendly reforms” around a number of sore spots for banks, according to Alexandra Steinberg Barrage, a former FDIC executive and partner at Troutman Pepper Locke.\r\n\r\nThat includes what bank executives have called an opaque Fed stress test process, long turnaround times for merger approvals and what bankers have said are sometimes unfair confidential bank exams, Barrage said.', '1736272405.webp', '1736272405.mp4', 'https://www.cnbc.com/2025/01/07/fed-michael-barr-clears-way-gentler-banking-regulator.html', 12, 3, '2025-01-07 11:23:25', '2025-01-07 11:23:25'),
(35, 'Target-date funds — the most popular 401(k) plan investment — dont work for everyone', 'Target-date funds are a way for 401(k) participants to put their retirement savings on autopilot — and they capture the lions share of investor contributions to 401(k) plans.\r\n\r\nAbout 29% of assets in the average 401(k) plan were held in TDFs as of 2023, according to the Plan Sponsor Council of America, a trade group. That share is the largest of any fund category, and is up from 16% in 2014, according to PSCA data.\r\n\r\nBy 2027, target-date funds will capture roughly 66% of all 401(k) contributions, and about 46% of total 401(k) assets will be in TDFs, according to a 2023 estimate by Cerulli Associates, a market research firm.\r\nMore from Personal Finance:\r\nBiden signs bill to raise Social Security benefits for public workers\r\nHow to maximize your 401(k) plan in 2025\r\nTime to tweak your investments after lofty stock returns\r\n\r\nThat popularity is largely due to employers broad adoption of TDFs as the default investment for workers who are automatically enrolled into their company 401(k) plan.\r\n\r\nWhile the funds carry benefits for many investors, they may have drawbacks for others, financial advisors said.\r\n\r\n“Target funds have a place for some investors, but they certainly arent and shouldn be used for everyone,” said Winnie Sun, managing partner of Sun Group Wealth Partners, based in Irvine, California, and a member of CNBCs Financial Advisor Council.', '1736272641.webp', '1736272641.mp4', 'https://www.cnbc.com/2025/01/06/are-target-date-funds-the-most-popular-401k-investment-right-for-you.html', 17, 3, '2025-01-07 11:27:21', '2025-01-07 11:27:21'),
(36, 'While Apple negotiates Indonesia sales ban, another Chinese smartphone maker is entering the country', 'BEIJING — Huawei spinoff Honor announced Tuesday it plans to launch smartphone sales in Indonesia by the end of March, becoming the latest Chinese company to enter a market that has banned Apples iPhone 16 over domestic production requirements.\r\n\r\nIndonesia requires that for smartphones sold in the country, 40% of their components must be domestically sourced. That rule has prevented Apple from selling its newest phone in the market, where it is reportedly negotiating a $1 billion investment.\r\n\r\nHonor has an office in Indonesia and is working with one local manufacturing partner, Justin Li, the Chinese company president of South Pacific operations, told reporters last week. He said a folding phone will be among Honor first set of locally sold products — 10 items in the medium to high-end segment.\r\n\r\nThe company aims to offer around 30 products from phones to tablets in Indonesia by the end of the year. The Southeast Asian country is home to the world fourth-largest country by population, just behind the United States.\r\n\r\n“Although 80% of the market is dominated by devices priced under $200, as Southeast Asia largest and fastest-growing economy, Indonesia presents immense potential for long-term growth,” Canalys analyst Chiew Le Xuan said in an email.', '1736272780.webp', '1736272780.mp4', 'https://www.cnbc.com/2025/01/07/apple-faces-indonesia-ban-as-chinese-smartphone-honor-enters.html', 14, 3, '2025-01-07 11:29:40', '2025-01-07 11:29:40'),
(37, 'U.S. records its first human bird flu death', 'The U.S. has recorded its first human death from bird flu, a grim milestone that comes as at least 67 cases have been recorded in the country.\r\n\r\nThe patient, who was over 65 and had underlying medical conditions, was hospitalized in Louisiana in December; the case was considered the countrys first severe human H5N1 infection.\r\n\r\nThe Louisiana Department of Health said the patient had been exposed to a combination of a backyard flock and wild birds. \r\n\r\n“The Department expresses its deepest condolences to the patient family and friends as they mourn the loss of their loved one,” it said in a statement. “Due to patient confidentiality and respect for the family, this will be the final update about the patient.”\r\n\r\nAll but one of the human bird flu infections confirmed so far in the U.S. were diagnosed in the last 10 months, according to the Centers for Disease Control and Prevention. Most cases have been relatively mild, with symptoms including pinkeye, coughs or sneezes.\r\nThe majority of the patients became sick after exposure to infected cattle or poultry. The Louisiana patient was the first case linked to exposure to a backyard flock.\r\n\r\nJust two cases have involved patients who did not have known exposure to animals. One was a person in Missouri who was hospitalized with bird flu in September but recovered after being treated with antiviral medications. The other was a child in California who experienced mild symptoms in November.\r\n\r\nThe CDC maintains that the immediate risk to public health is low. Public health officials have not found any evidence that the virus has spread person-to-person, which would mark a dire step in bird flu evolution.\r\n\r\n“While tragic, a death from H5N1 bird flu in the United States is not unexpected because of the known potential for infection with these viruses to cause severe illness and death,” the agency said in a statement on Monday.\r\n\r\n“There are no concerning virologic changes actively spreading in wild birds, poultry, or cows that would raise the risk to human health,” the statement added.\r\n\r\nHowever, samples of the virus collected from the Louisiana patient showed signs of mutations that could make it more transmissible to humans, according to the agency.\r\n\r\nThe strain of bird flu behind the ongoing outbreak began spreading globally among wild birds and poultry in 2020. Since it took root in the U.S. in 2022, more than 130 million birds have been infected or culled. The virus has also spread to dairy cows and other mammals. More than 900 bird flu cases have been detected in cattle since March.', '1736273020.webp', '1736273020.mp4', 'https://www.cnbc.com/2025/01/06/us-records-its-first-human-bird-flu-death.html', 16, 3, '2025-01-07 11:33:40', '2025-01-07 11:33:40'),
(38, '\"The hidden meanings in a 16th-Century female nude\"', '\"How a rarely-seen drawing of the Three Graces by Raphael reveals the eras ideas about nudity, modesty, shame – and the artists genius. Its part of an exhibition, Drawing the Italian Renaissance – at The King Gallery, Buckingham Palace – of drawings from 1450 to 1600, the biggest of its kind ever shown in the UK.\r\n\r\nA wandering lobster and a sturdy ostrich feature among the 150 chalk, metalpoint and ink drawings on show at Drawing The Italian Renaissance, at the Kins Gallery, Buckingham Palace. Created by Renaissance giants such as Leonardo da Vinci, Michelangelo, Raphael and Titian, often in preparation for larger painted tableaux, the works are thought to have entered the Royal Collection in the 17th Century under Charles II, several as gifts. For more than 30 of them, its their first time ever on public display. Rarely shown due to their fragility, these fascinating drawings – which, at the time, were beginning to be recognised as artworks in their own right – make up the broadest exhibition of Italian drawings from 1450 to 1600 ever shown in the UK.\"', '1736273565.webp', '1736273793.mp4', 'https://www.bbc.com/culture/article/20241119-the-hidden-meanings-in-a-16th-century-female-nude', 11, 5, '2025-01-07 11:42:45', '2025-01-07 11:46:33'),
(39, 'The rare blue the Maya invented', 'The colour survives in the work of 17th Century Spanish colonial painters, a symbol of the wealth that ultimately doomed the Maya, writes Devon Van Houten Maldonado.\r\n\r\nIn 17th Century Europe, when Michelangelo Merisi da Caravaggio and Peter Paul Rubens painted their famous masterworks, ultramarine blue pigment made from the semi-precious lapis lazuli stone was mined far away in Afghanistan and cost more than its weight in gold. Only the most illustrious painters were allowed to use the costly material, while lesser artists were forced to use duller colours that faded under the sun. It was not until the industrial revolution in the 19th Century that a synthetic alternative was invented, and true ultramarine blue finally became widely available.\r\nAcross the Atlantic Ocean, colonial Baroque works created by artists like José Juárez, Baltasar de Echave Ibia and Cristóbal de Villalpando in early 17th Century Mexico – New Spain – were full of this beautiful blue. How could this be? Lapis lazuli was even rarer in the New World. It wasn’t until the middle of the 20th Century that archaeologists discovered the Maya had invented a resilient and brilliant blue, centuries before their land was colonised and their resources exploited.', '1736273932.webp', '1736273932.mp4', 'https://www.bbc.com/culture/article/20180816-the-rare-blue-the-mayans-invented', 17, 5, '2025-01-07 11:48:52', '2025-01-07 11:48:52'),
(40, 'Paul McCartney\'s missing bass and other mysterious musical instrument disappearances', 'From a 17th-Century Italian violin stolen from Japan to Drake\'s lost Blackberry in Mexico, here are musical lost and found mysteries that rival Sir Paul McCartney\'s.\r\n\r\nIn musical happy endings, last week, Sir Paul McCartney was reunited with his bass guitar that was stolen 51 years ago in London. The instrument, which McCartney purchased in 1961, was subsequently nabbed from a band van in 1972. Now, thanks to the Lost Bass search project, the Beatle has been reunited with the bass, which had been until recently stashed in a Sussex attic. Both McCartney and Höfner, the instrument manufacturer, authenticated the found item upon its rediscovery, and a spokesperson for McCartney told BBC News he was \"incredibly grateful\" for the return of his lost guitar.', '1736274124.webp', '1736274124.mp4', 'https://www.bbc.com/culture/article/20240219-paul-mccartney-bass-missing-famous-stolen-musical-instruments', 14, 5, '2025-01-07 11:52:04', '2025-01-07 11:52:04');
INSERT INTO `categories` (`id`, `title`, `description`, `image`, `video`, `social_media_link`, `author_id`, `category_type_id`, `created_at`, `updated_at`) VALUES
(41, 'The national park that draws mushroom hunters from around the world', 'In Lithuanias Dzūkija National Park, losing yourself amongst the pine trees while hunting for mushrooms is an occurrence so common it has its own word: \"nugrybauti\".\r\n\r\nThe thickening canopy of trees swallowed the last trace of sunlight, and with it, our sense of direction. Lifting our gaze from the forest floor, we noticed that the surrounding woods – minutes ago a familiar landscape of sun-dappled clearings and winding tracks – had been replaced by an expanse of dense brown shadows, suddenly foreign and disorienting.\r\n\r\nOur guide Tom Baltušis, owner of the foraging tour company Dzūkijos Uoga, had noticed it too. \"In Lithuania, we have a specific word for this sensation. Nugrybauti: lost in the forest whilst hunting for mushrooms.\"\r\n\r\nTo a nation so fixated with foraging, these woods in Djūkija National Park in southern Lithuania hold a particular allure. Just an hours drive from the capital Vilnius, the park – Lithuanias largest – is blanketed by dense pine forests, concealing a sprawling tapestry of bogs, black alder swamps and smoky marshland. Its a protected landscape that supports an astonishing abundance and variety of edible mushrooms. \r\n\r\nForaging has long been a cornerstone of local life here, and the practice – once a necessity but now a beloved pastime – has shaped the regions living habits, cuisine and economy over the centuries.', '1736274347.webp', '1736274347.mp4', 'https://www.bbc.com/travel/article/20250106-the-national-park-that-draws-mushroom-hunters-from-around-the-world', 17, 5, '2025-01-07 11:55:47', '2025-01-07 11:55:47'),
(42, '\"Thunder tea rice: The 2,000-year-old healthy grain bowl\"', '\"Thousands of miles from where the 2,000-year-old grain bowl called lei cha, or \"thunder tea rice\", was first created in China, Hakka chef Pang Kok Keong has reworked the ancient delicacy in his Singapore kitchen for a new generation of healthy eaters.\r\n\r\nThunder tea rice – a bowl of rice topped with a balanced mix of vegetables, peanuts, dried fish and more, served alongside a boldy flavoured green \"tea soup\" – is a specialty of the Hakka people in Guangdong Province. The Hakka, of which there are many groups, originated in China Central Plains. Over centuries of war, they migrated in many directions. In the 4th Century, they moved south to escape famine and war, making their home in the mountains. It was here they were given a new name by locals.\r\n\r\n\"[They were] called Kejia Ren (Guest People) because they do not have a province of their own,\" says anthropologist Dr Vivienne Wee. Centuries later, the Hakka journeyed further to countries such as Taiwan, Singapore, Malaysia and Indonesia, taking their recipes with them, including thunder tea rice. \r\n\r\nAt one time, Kok Keong Pang, a former award-winning French pastry chef and owner of Antoinette, one of Singapores most well-known patisseries (now closed), made a living by piping chocolate into macaron shells or calmly checking orders of violet mousse cakes garnished with black sugar. But when he turned 40, he started to think more about his heritage. Pang noticed that Hakka food outlets in Singapore were few and far between. He wanted to go back to his roots and make the herby green thunder tea rice and other dishes that he ate as a child. \r\n\r\nPang scoured the internet, bought books about Hakka culture and worked with his mother on perfecting heritage flavours. \"She did have any recipes written down, so I would test something and let her try it,\" Pang says.\"', '1736274580.webp', '1736274580.mp4', 'https://www.bbc.com/travel/article/20250103-thunder-tea-rice-the-2000-year-old-healthy-grain-bowl', 19, 5, '2025-01-07 11:59:40', '2025-01-07 12:05:12'),
(43, 'The seven travel trends that will shape 2025', 'As you start to look at the year ahead, have you thought about how you will be travelling? The worlds travel firms – from Airbnb to Booking.com – have.\r\n\r\nTheir predictions, gathered from survey data, user behaviour and forward bookings, function as an annual showcase for new ideas in the industry, from identifying future hotspots to considering how and why we will explore the world in the upcoming year.\r\n\r\n\"People are drawn to trends because they offer a sense of structure and understanding in an increasingly complex and fast-paced world,\" explains Jenny Southern, CEO of Globetrender, the worlds leading travel trend forecasting agency. \"When it comes to travel, trends provide clarity and a roadmap for how to engage with the world around us.\r\n\r\nFor cultural futurist Jasmine Bina, CEO of Concept Bureau and an experienced analyst of consumer behaviour, they are a signifier of our deepest longings. \"Travel trends are a window into what people really desire when the rules of everyday life are suspended,\" she says. \"Right now, what they really want is to feel transformed.\"\r\n\r\nWhile the travel industry has largely returned to pre-pandemic levels, economic uncertainty, the ongoing wars in Ukraine and the Middle East and the change of presidency in the US is making 2025 feel anything but predictable.', '1736274717.webp', '1736274717.mp4', 'https://www.bbc.com/travel/article/20250106-the-seven-travel-trends-that-will-shape-2025', 11, 5, '2025-01-07 12:01:57', '2025-01-07 12:01:57'),
(44, 'Severance season 2 review: The dystopian office drama \'works the same magic but is even more mind-bending\'', 'When it premiered in 2022, Apple TV+\'s surreal workplace show was a hit. Now it\'s finally back – and from the playful storytelling to the layered performances, there\'s a lot to savour.\r\n\r\nIn the second season of Severance, one character spends hours practising how to put paper clips on properly (apparently there\'s a right and a wrong way). Other characters find a room full of goats in their office building, and out of the office someone finds a working phone booth on the street, as if that\'s an everyday thing. Yet viewers of season one of the series – among the most bracing and imaginative of recent years – know that its bizarro world is also relatable to anyone who has ever been bored at their job.\r\n\r\nWith a perfect balance of the real and surreal, the show follows four employees who sort numbers floating on their computer screens at Lumon Industries, and who chose to have a chip put in their brains that cuts their memories in half. The person working inside the office, called the innie, has no knowledge of who they are beyond its walls – and their outside counterpart, or outie, has no memory of the working day. Identity crisis doesn\'t begin to describe it. The show\'s creator, Dan Erickson, was inspired by wishing that his tedious office temp job while he was a struggling screenwriter could zoom by as if it never happened, and his idea of being able to turn off your brain resonates especially well in our age of information overload.', '1736274907.webp', '1736274907.mp4', 'https://www.bbc.com/culture/article/20250107-severance-season-2-review', 17, 5, '2025-01-07 12:05:07', '2025-01-07 12:05:07'),
(45, 'Sixth-form teachers strike amid pay dispute', 'Teachers at some sixth-form colleges in Sussex have walked out amid a pay dispute with the government.\r\n\r\nSome 8,000 students at Brighton, Hove and Sussex Sixth Form College (BHASVIC), Varndean College and Collyer\'s in Horsham are being affected by three consecutive days of strike action that started on Tuesday.\r\n\r\nThe National Education Union said it was taking action after the government failed to resolve a \"clear pay discrepancy\" between non-academy sixth-form colleges and their academy counterparts.\r\n\r\nA Department for Education spokesperson said: \"Sixth form colleges are responsible for the setting of appropriate pay for their workforce and for managing their own industrial relations.\"', '1736275168.webp', '1736275168.mp4', 'https://www.bbc.com/news/articles/c98lxdepxn6o', 18, 4, '2025-01-07 12:09:28', '2025-01-07 12:09:28'),
(46, 'Send is the \"biggest issue\" for schools - Ofsted', 'Special educational needs and disabilities (Send) is the \"biggest issue\" affecting schools in England, Ofsteds chief inspector has said.\r\n\r\nSir Martyn Oliver told the education committee that the Send systems high costs and poor outcomes represented a \"lose-lose situation\".\r\n\r\nGovernment figures for the 2023/24 academic year showed more than 1.6 million children had Send, an increase of 101,000 from 2023.\r\n\r\nSir Martyn said the inspectorate had a duty to support the government in its plans to provide for Send children.', '1736275317.webp', '1736275317.mp4', 'https://www.bbc.com/news/articles/cy7kre3yz8do', 14, 4, '2025-01-07 12:11:57', '2025-01-07 12:11:57'),
(47, 'Why is VAT being added to private school fees?', 'VAT is now being added to private school fees after new rules came into force on 1 January.\r\n\r\nThe government plans to spend the money raised on more teachers for state schools in England.\r\n\r\nPrivate schools say they have already seen a drop in secondary school pupil numbers because of higher fees.\r\n\r\nWhat is VAT and when was it added to private school fees?\r\nValue added tax (VAT) is one of the governments main sources of income. It is payable on top of the purchase price of many goods or services and the standard rate is 20%.\r\n\r\nPreviously, private schools did not have to charge VAT on their fees because of an exemption for organisations providing education.\r\n\r\nPrivate school fees are liable for 20% VAT from 1 January.\r\n\r\nThe government previously said the tax would apply to all payments made for the January term after 29 July 2024.\r\n\r\nAbout half of Englands private schools are also charities, so receive an 80% reduction on business rates (taxes on properties used for commercial purposes).\r\n\r\nSeparate legislation will be introduced to remove this tax relief from April 2025, but plans to remove private schools charitable status have been dropped.', '1736275444.webp', '1736275444.mp4', 'https://www.bbc.com/news/articles/c033dp0z1edo', 17, 4, '2025-01-07 12:14:04', '2025-01-07 12:14:04'),
(48, '\"My autistic sons have taught me so much\"', 'James Hunt used to spend his days commuting to London, where he ran a successful marketing firm.\r\n\r\nBut his children Jude and Tommy were diagnosed as autistic when they were toddlers, and he later decided to care for them and his parents full-time.\r\n\r\nJames, from Burnham-on-Crouch in Essex, started blogging about their lives nine years ago and now has more than a million followers on social media.\r\n\r\nHere, in his own words, James speaks about his hopes for the future for his teenage sons.\r\n\r\nWhen my eldest son Jude was a baby, he was slow to crawl and did not know respond to his name. He used to stare out of the window, he was quite distant and almost in a different world.\r\n\r\nHis mum Charlotte, my ex-wife, first raised concerns when he was eight months old but I just thought he was a bit behind because he was premature.\r\n\r\nWe went back to the doctor quite a few times before we got an autism diagnosis in 2009 when he was 18 months old.\r\n\r\nAt the time, the information out there was very clinical, most things we were reading were from the NHS website and medical journals. I felt like I could not take it in and I had so many unanswered questions.', '1736275723.webp', '1736275723.mp4', 'https://www.bbc.com/news/articles/c2ldj0p4vkdo', 20, 4, '2025-01-07 12:18:43', '2025-01-07 12:18:43'),
(49, 'How working parents can get 15 and 30 hours free childcare', 'Working parents of children from nine months old can now access 15 hours a week of free childcare.\r\n\r\nThe government hopes the scheme, which will expand to include all under-5s from late 2025, will help parents return to work.\r\n\r\nHowever, critics say there are not enough places.\r\nWhat free childcare can I get?\r\nExtra help with childcare costs in England is being rolled out in stages. Some free hours were already available.\r\n\r\nThe help you can get depends on the age of your child, and whether you are working, or receiving certain benefits.\r\n\r\nWorking parents can get:\r\n\r\n15 hours free childcare a week for two-year-olds from April 2024\r\n15 hours free childcare for nine month olds from September 2024\r\n30 hours free childcare for three and four-year-olds was already available\r\n30 hours free childcare for all under-fives from September 2025\r\nTo qualify for the new hours, the majority of parents must earn more than £9,518, but less than £100,000 per year.\r\n\r\nThose on certain benefits can already get:\r\n\r\n15 hours free childcare for two-year-olds\r\n15 hours free childcare for three and four-year-olds\r\nIf you do not work, you might still be eligible for 30 hours of free childcare if your partner works, or you receive certain benefits.\r\n\r\nHow do you apply for 15 or 30 hours free childcare?\r\nParents should apply before the start of the term when their child will be eligible.\r\n\r\nYou have to reconfirm your details every three months so if you do apply early, remember you will have to confirm your details have not changed before term begins.\r\n\r\nThe next term begins in January and parents of children from nine months old who are eligible for 15 or 30 hours can apply.', '1736288106.webp', '1736288106.mp4', 'https://www.bbc.com/news/education-62036045', 15, 4, '2025-01-07 15:45:06', '2025-01-07 15:45:06'),
(50, 'Pay us what we deserve, striking teachers say', 'Staff at a sixth-form college have said they are worth just as much as teachers in other sectors after walking out over pay.\r\n\r\nMembers of the National Education Union (NEU) at Wyke Sixth-Form College, in Hull, said it was \"totally unfair\" that sixth-form colleges were not included in the 5.5% pay award received by most teachers in schools in September.\r\n\r\nA spokesperson from the Department for Education said sixth-form colleges were \"responsible for the setting of appropriate pay\" and \"for managing their own industrial relations\".\r\n\r\nWyke college said it was \"very frustrated\" because it had received no additional funding for teacher pay in the current academic year.\r\nIt is the fifth organised strike this academic year by NEU members at Wyke and another Hull sixth-form, Wilberforce College.', '1736288364.webp', '1736288364.mp4', 'https://www.bbc.com/news/articles/cvg921nn5g7o', 11, 4, '2025-01-07 15:49:24', '2025-01-07 15:49:24'),
(51, 'School closures in Northern Ireland', 'When there is severe weather in Northern Ireland, the BBC will share information here about schools that have been affected', '1736288470.webp', '1736288470.mp4', 'https://www.bbc.com/news/articles/cm5x4r82114o', 14, 4, '2025-01-07 15:51:10', '2025-01-07 15:51:10'),
(52, '£2,600 raised for school left \"in pieces\" after fire', 'Parents and teachers have raised more than £2,600 after a fire left parts of a primary school \"literally in pieces\".\r\n\r\nAround 40 firefighters tackled the blaze at St Michaels Primary School in South Gloucestershire on 9 December which damaged an outbuilding and classrooms.\r\n\r\nThe school reopens to pupils on Tuesday, and headteacher Peter Bernard said staff had \"moved mountains to make sure classes can take place elsewhere\" on site.\r\n\r\nChair of the schools parent teacher and friends association Gillian Coleman, said it had been \"quite an emotional\" and \"difficult\" time for the children.\r\n\"Its not just the classrooms, one of the areas - the conservatory - is literally in pieces,\" Ms Coleman said.\r\n\r\n\"It has been quite an emotional time for our community. Its been really hard on some of the children who have found it difficult moving classrooms.\r\n\r\n\"There arent just spare classrooms for the children to move into, its been logistically quite difficult.\r\n\r\n\"One of the classes has had to move into the art room, so the school community has lost that dedicated space, and the same has happened with the room they use for children with special educational needs. \"\r\n\r\nMs Coleman said one teacher lost nine years worth of supplies and displays.', '1736288658.webp', '1736288658.mp4', 'https://www.bbc.com/news/articles/cn541wrn7vpo', 20, 4, '2025-01-07 15:54:18', '2025-01-07 15:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `category_types`
--

CREATE TABLE `category_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_types`
--

INSERT INTO `category_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'World News', '2025-01-07 09:00:58', '2025-01-07 09:02:06'),
(2, 'Sport News', '2025-01-07 09:00:58', '2025-01-07 09:02:15'),
(3, 'Business News', '2025-01-07 09:00:58', '2025-01-11 19:17:05'),
(4, 'Education News', '2025-01-07 09:00:58', '2025-01-07 09:02:33'),
(5, 'Entertainment News', '2025-01-07 09:00:58', '2025-01-07 09:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `description`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(11, 'Yes Way to go!', 17, 29, '2025-01-07 12:21:19', '2025-01-07 12:21:19'),
(12, 'So Sorry to heard that!!!', 17, 26, '2025-01-07 12:24:14', '2025-01-07 12:24:14'),
(14, 'Wow that was though', 17, 48, '2025-01-07 12:24:56', '2025-01-07 12:25:17'),
(15, 'Why is VAT being added to private school fees? This will make education even more expensive for many families. What\'s the reasoning behind this move?', 18, 47, '2025-01-07 12:28:36', '2025-01-07 12:28:36'),
(16, 'Fascinating to see how much symbolism and hidden messages are embedded in art from that era. It shows how complex and layered these works can be!', 18, 38, '2025-01-07 12:29:45', '2025-01-07 12:29:45'),
(17, 'Shocking news about Guangzhou\'s expulsion! It\'s a huge blow to their fans and Chinese football. What led to such a drastic decision?', 18, 13, '2025-01-07 12:30:08', '2025-01-07 12:30:08'),
(18, 'It\'s amazing how the Maya created such a vibrant and enduring blue pigment centuries ago. Their innovation still fascinates scientists today!', 18, 39, '2025-01-07 12:31:14', '2025-01-07 12:31:14'),
(19, 'Ancelotti\'s response to the Alexander-Arnold rumours is intriguing. Could there really be a move to Madrid in the works?', 19, 20, '2025-01-07 12:55:58', '2025-01-07 12:55:58'),
(20, 'Brave rescuers are battling harsh conditions to find survivors in Tibet. Hoping for more lives to be saved despite the freezing temperatures.', 19, 22, '2025-01-07 12:57:03', '2025-01-07 12:57:03'),
(21, 'Wow That\'s Amazing!', 20, 12, '2025-01-07 21:18:15', '2025-01-07 21:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_02_170332_create_category_types_table', 1),
(5, '2024_09_02_170547_create_authors_table', 1),
(6, '2024_09_02_171719_create_categories_table', 1),
(7, '2024_09_02_173938_create_comments_table', 1),
(8, '2024_09_02_175554_create_views_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('X8UQ0VOpYDKEDRx3pYn1LUVYGy6OAhvhAI6ipAMV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTzhTRno2V3ZSeTM1QXRwc2gwd2FmdDg1eGo3VDJEbXlmRElZZU4xeiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1736707773);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `subscribed` int(11) NOT NULL DEFAULT 0,
  `owner` int(11) NOT NULL DEFAULT 0,
  `category_type` int(11) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `profile`, `password`, `role`, `subscribed`, `owner`, `category_type`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(9, 'Ottis Botsford', 'liliane.larkin@example.net', NULL, '$2y$12$G5TjvPc0ab.G81bbMOrSou9haKAu8a6OYW.zPYFQxf2qjiiQVVu0W', 0, 0, 0, NULL, 'Tg3ppTxSse', '2025-01-07 09:00:58', '2025-01-07 09:00:58', '2025-01-07 09:00:58'),
(10, 'Christa Bode', 'pkoch@example.com', NULL, '$2y$12$G5TjvPc0ab.G81bbMOrSou9haKAu8a6OYW.zPYFQxf2qjiiQVVu0W', 0, 0, 0, NULL, 'awQFMbr4yo', '2025-01-07 09:00:58', '2025-01-07 09:00:58', '2025-01-07 09:00:58'),
(11, 'admin', 'admin@gmail.com', 'profile_pictures/rFGjqRrheYAunGkigMwiLONUt21cofMIYLTwzkv5.jpg', '$2y$12$FNcxZ8UstjD/Ryj4e/j2xe4HdAtZUR/F7nQlefZduJdeF4PH4SDvu', 1, 1, 1, NULL, 'lJtnNlewj5jyHIqBkwEMAT6Z4nH5MS5ludi8ECBIpv7El77bWqGd4HLtY4yM', '2025-01-07 09:00:58', '2025-01-07 09:00:58', '2025-01-07 09:28:25'),
(12, 'Khant', 'khant@gmail.com', 'profile_pictures/JRl8IVzl0hMXInyoOLQd5dFpk8lXr0ETZzvg6MJE.jpg', '$2y$12$uvBnEWBe/VRB.FmQITFvbu8e8NMK/t4OueBYCFZ/JK8FkN4RyWm4W', 1, 0, 0, 2, 'Xf2p6K5wI8Am6zHJtvyn7VkQ86tcmNSQ66tYzP67JYiSQhdoBuGG3jgEwp31', NULL, '2025-01-07 09:29:13', '2025-01-07 09:31:16'),
(13, 'Yati', 'yati@gmail.com', 'profile_pictures/3BB0BVmTOB7LNdsKzpd9u73VAtzk2on04XwIjjtK.png', '$2y$12$YvYVUe0q591L7nzWLxvE6Oa9ldUzPU6VdoJu57iP00DA8ovovxtk6', 1, 0, 0, 3, '0Evly6ueNyMSv1pdm8IIy7rOm3tCkdIeQTIanJtwIkZ7TfETA5DJNhuFa05C', NULL, '2025-01-07 09:29:41', '2025-01-07 09:31:35'),
(15, 'Hnin', 'hnin@gmail.com', 'profile_pictures/QbxRXnSRTyYZWHho242QeF4zH1mcVu022RWS1Zrj.jpg', '$2y$12$QEojDz6tHspiv.mzixj66OogbAxOdFMVRldg34CXiqT3WQEMtReW6', 1, 0, 0, 5, 'feZhVWHLprWrdcaYUlfTgLIWm2KoMZ2vxWKBjiwcT5b5ewf5SHYC2yPVj2A5', NULL, '2025-01-07 09:30:37', '2025-01-07 09:33:12'),
(16, 'May', 'may@gmail.com', NULL, '$2y$12$ttgqVtmqXiNMlvibZ5KttOeSo.I5ei.niw6nqDMCjOkGPVA.K4bRO', 1, 0, 0, NULL, 'kcXWwdDspNgJSlMKWPwCpLSESRLdA3fYq88IlPjBkL4vjxZO2R6qXxdYqOy9', NULL, '2025-01-07 09:37:37', '2025-01-12 09:21:29'),
(17, 'Sly', 'sly@gmail.com', 'profile_pictures/A7rI3qnb0LPerd2sStorm3HS6wSRGNJ3XE4y54eo.jpg', '$2y$12$hdatvRrF1Z5Iju/oBwpe3O/rvdqstlmtKS3btp1gMD.pcnldNchem', 0, 1, 0, NULL, NULL, NULL, '2025-01-07 12:21:01', '2025-01-07 12:23:53'),
(18, 'sawlay', 'sawlay@gmail.com', 'profile_pictures/Vt07CHIpFQh0AzuKL1CDil63n3rNdc0jRMwCzOUo.jpg', '$2y$12$1df6XEY2NNIv5YZcBPmpku/YfSmhYpsQFpN5An7590cBQzIJiV1YK', 0, 1, 0, NULL, NULL, NULL, '2025-01-07 12:26:52', '2025-01-07 12:28:49'),
(19, 'khantsithu', 'khantsithu@gmail.com', NULL, '$2y$12$sCpaqGNN.EGHHY1iD3oA6etusrOQYocXR6dpuEhqHSCOMmEfH9wtC', 0, 1, 0, NULL, NULL, NULL, '2025-01-07 12:55:14', '2025-01-07 12:55:14'),
(20, 'alice', 'alice@gmail.com', 'profile_pictures/koZEbQgO0FiEPB2alK7CVhiRnvQ61XI6fP03nJNv.jpg', '$2y$12$15E6bgHqkvEjIRCaRFqGse9qGR3QQN9L5uHp0hqwFx0w4K7gnxx2C', 0, 1, 0, NULL, NULL, NULL, '2025-01-07 21:16:32', '2025-01-07 21:18:35'),
(22, 'saw', 'saw@gmail.com', NULL, '$2y$12$6/ZpwuQszn2qbgYCe13nWenkuw.V/uH1QSqyUuCxtAYO2pg4XJpI2', 1, 0, 0, 3, 'qZaoYxqrO3j4o0rAJW4RLOZP2DkCIviztDD1ogUl6MFzz2Jc6WDCUDq28BrU', NULL, '2025-01-12 09:59:42', '2025-01-12 09:59:42');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 11, 12, '2025-01-07 09:50:53', '2025-01-07 09:50:53'),
(3, 11, 12, '2025-01-07 10:16:07', '2025-01-07 10:16:07'),
(4, 11, 14, '2025-01-07 10:16:17', '2025-01-07 10:16:17'),
(5, 11, 18, '2025-01-07 10:22:17', '2025-01-07 10:22:17'),
(6, 11, 19, '2025-01-07 10:22:21', '2025-01-07 10:22:21'),
(7, 11, 19, '2025-01-07 10:22:31', '2025-01-07 10:22:31'),
(8, 11, 19, '2025-01-07 10:25:58', '2025-01-07 10:25:58'),
(9, 11, 27, '2025-01-07 10:47:52', '2025-01-07 10:47:52'),
(10, 11, 27, '2025-01-07 10:55:31', '2025-01-07 10:55:31'),
(11, 17, 29, '2025-01-07 12:21:05', '2025-01-07 12:21:05'),
(12, 17, 29, '2025-01-07 12:21:09', '2025-01-07 12:21:09'),
(13, 17, 29, '2025-01-07 12:21:19', '2025-01-07 12:21:19'),
(14, 17, 29, '2025-01-07 12:23:31', '2025-01-07 12:23:31'),
(15, 17, 26, '2025-01-07 12:24:00', '2025-01-07 12:24:00'),
(16, 17, 26, '2025-01-07 12:24:14', '2025-01-07 12:24:14'),
(17, 17, 33, '2025-01-07 12:24:23', '2025-01-07 12:24:23'),
(18, 17, 33, '2025-01-07 12:24:34', '2025-01-07 12:24:34'),
(19, 17, 33, '2025-01-07 12:24:39', '2025-01-07 12:24:39'),
(20, 17, 48, '2025-01-07 12:24:47', '2025-01-07 12:24:47'),
(21, 17, 48, '2025-01-07 12:24:56', '2025-01-07 12:24:56'),
(22, 17, 48, '2025-01-07 12:25:17', '2025-01-07 12:25:17'),
(23, 18, 47, '2025-01-07 12:27:11', '2025-01-07 12:27:11'),
(24, 18, 47, '2025-01-07 12:28:36', '2025-01-07 12:28:36'),
(25, 18, 38, '2025-01-07 12:28:57', '2025-01-07 12:28:57'),
(26, 18, 38, '2025-01-07 12:29:45', '2025-01-07 12:29:45'),
(27, 18, 13, '2025-01-07 12:29:52', '2025-01-07 12:29:52'),
(28, 18, 13, '2025-01-07 12:30:08', '2025-01-07 12:30:08'),
(29, 18, 39, '2025-01-07 12:30:56', '2025-01-07 12:30:56'),
(30, 18, 39, '2025-01-07 12:31:14', '2025-01-07 12:31:14'),
(31, 18, 39, '2025-01-07 12:31:20', '2025-01-07 12:31:20'),
(32, 19, 20, '2025-01-07 12:55:20', '2025-01-07 12:55:20'),
(33, 19, 20, '2025-01-07 12:55:58', '2025-01-07 12:55:58'),
(34, 19, 20, '2025-01-07 12:56:02', '2025-01-07 12:56:02'),
(35, 19, 20, '2025-01-07 12:56:30', '2025-01-07 12:56:30'),
(36, 19, 22, '2025-01-07 12:56:40', '2025-01-07 12:56:40'),
(37, 19, 22, '2025-01-07 12:56:47', '2025-01-07 12:56:47'),
(38, 19, 22, '2025-01-07 12:57:04', '2025-01-07 12:57:04'),
(39, 19, 48, '2025-01-07 12:58:32', '2025-01-07 12:58:32'),
(40, 19, 47, '2025-01-07 12:58:36', '2025-01-07 12:58:36'),
(41, 19, 45, '2025-01-07 12:58:38', '2025-01-07 12:58:38'),
(42, 19, 29, '2025-01-07 12:58:40', '2025-01-07 12:58:40'),
(43, 19, 46, '2025-01-07 12:58:42', '2025-01-07 12:58:42'),
(44, 19, 26, '2025-01-07 12:58:45', '2025-01-07 12:58:45'),
(45, 19, 27, '2025-01-07 12:58:46', '2025-01-07 12:58:46'),
(46, 19, 28, '2025-01-07 12:58:48', '2025-01-07 12:58:48'),
(47, 19, 24, '2025-01-07 12:58:50', '2025-01-07 12:58:50'),
(48, 19, 24, '2025-01-07 12:58:53', '2025-01-07 12:58:53'),
(49, 19, 24, '2025-01-07 12:58:55', '2025-01-07 12:58:55'),
(50, 19, 23, '2025-01-07 12:58:58', '2025-01-07 12:58:58'),
(51, 19, 23, '2025-01-07 12:58:59', '2025-01-07 12:58:59'),
(52, 19, 23, '2025-01-07 12:59:01', '2025-01-07 12:59:01'),
(53, 11, 19, '2025-01-07 13:00:17', '2025-01-07 13:00:17'),
(54, 11, 19, '2025-01-07 13:00:20', '2025-01-07 13:00:20'),
(55, 11, 22, '2025-01-07 13:01:42', '2025-01-07 13:01:42'),
(56, 11, 22, '2025-01-07 13:01:44', '2025-01-07 13:01:44'),
(57, 11, 22, '2025-01-07 13:02:14', '2025-01-07 13:02:14'),
(58, 11, 29, '2025-01-07 16:00:04', '2025-01-07 16:00:04'),
(59, 11, 29, '2025-01-07 16:00:08', '2025-01-07 16:00:08'),
(60, 11, 32, '2025-01-07 21:11:37', '2025-01-07 21:11:37'),
(61, 20, 12, '2025-01-07 21:17:42', '2025-01-07 21:17:42'),
(62, 20, 12, '2025-01-07 21:17:54', '2025-01-07 21:17:54'),
(63, 20, 12, '2025-01-07 21:18:15', '2025-01-07 21:18:15'),
(64, 20, 38, '2025-01-07 21:18:49', '2025-01-07 21:18:49'),
(65, 11, 38, '2025-01-07 21:20:24', '2025-01-07 21:20:24'),
(66, 11, 38, '2025-01-07 21:21:06', '2025-01-07 21:21:06'),
(67, 11, 38, '2025-01-07 21:21:11', '2025-01-07 21:21:11'),
(68, 20, 44, '2025-01-07 21:30:29', '2025-01-07 21:30:29'),
(69, 20, 28, '2025-01-07 21:41:41', '2025-01-07 21:41:41'),
(70, 20, 28, '2025-01-07 21:42:06', '2025-01-07 21:42:06'),
(71, 11, 23, '2025-01-08 01:27:55', '2025-01-08 01:27:55'),
(72, 11, 23, '2025-01-08 01:28:17', '2025-01-08 01:28:17'),
(73, 21, 23, '2025-01-10 08:01:34', '2025-01-10 08:01:34'),
(74, 21, 23, '2025-01-10 08:01:47', '2025-01-10 08:01:47'),
(75, 21, 24, '2025-01-10 08:01:55', '2025-01-10 08:01:55'),
(76, 21, 25, '2025-01-10 08:01:59', '2025-01-10 08:01:59'),
(77, 21, 25, '2025-01-10 08:02:10', '2025-01-10 08:02:10'),
(78, 11, 50, '2025-01-10 12:14:46', '2025-01-10 12:14:46'),
(79, 11, 50, '2025-01-10 12:14:51', '2025-01-10 12:14:51'),
(80, 11, 52, '2025-01-11 19:16:43', '2025-01-11 19:16:43'),
(81, 11, 23, '2025-01-11 19:52:40', '2025-01-11 19:52:40'),
(82, 11, 26, '2025-01-11 19:52:52', '2025-01-11 19:52:52'),
(83, 11, 26, '2025-01-11 20:20:38', '2025-01-11 20:20:38'),
(84, 11, 52, '2025-01-11 20:50:36', '2025-01-11 20:50:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `authors_phone_unique` (`phone`),
  ADD UNIQUE KEY `authors_email_unique` (`email`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_types`
--
ALTER TABLE `category_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_types_name_unique` (`name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_category_id_foreign` (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `views_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `category_types`
--
ALTER TABLE `category_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `views_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
