-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 15 nov 2024 om 11:33
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rye1`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `vendors_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `img`, `desc`, `vendors_id`) VALUES
(1, 'ACER Aspire Go 15', '299', 'acer-aspire-go-15.webp', 'The Acer Aspire Go 15 is a versatile and lightweight laptop designed for on-the-go productivity. Featuring a sleek, modern design, it boasts a 15.6-inch Full HD display for vibrant visuals, making it ideal for both work and entertainment.', 1),
(2, 'ACER Aspire 3', '399', 'acer-aspire-3.webp', 'The ACER Aspire 3 is a versatile laptop designed for everyday computing. With its sleek design, powerful AMD Ryzen or Intel processors, and vibrant display, it offers smooth performance for work and entertainment. ', 1),
(3, 'ACER Predator Helios 16', '3299', 'acer-predator-helios.webp', 'The ACER Predator Helios 16 is a powerful gaming laptop featuring a sleek design, high-refresh-rate display, and robust cooling system. It boasts the latest Intel processors and NVIDIA graphics, ensuring top-tier performance for gamers. ', 1),
(4, 'HP 15-FC0055ND', '649', 'HP-15.webp', 'The HP 15 laptop combines power and portability, featuring a sleek design and a vibrant 15.6-inch display. Equipped with robust processors and ample storage, it’s perfect for everyday tasks, multimedia, and productivity.', 1),
(5, 'HP ENVY 17', '1399', 'HP-ENVY-17.webp', 'The HP ENVY 17 is a sleek, powerful laptop designed for creativity and performance. Featuring a stunning 17.3-inch Full HD display, it delivers vibrant visuals. Equipped with robust Intel processors and ample storage, it excels in multitasking and gaming.', 1),
(6, 'HP VICTUS 16', '1249', 'HP-VICTUS-16.webp', 'The HP Victus 16 is a powerful gaming laptop that blends performance with style. Featuring a Ryzen or Intel processor, dedicated NVIDIA graphics, and a vibrant 16.1-inch display, it delivers immersive gaming experiences.', 1),
(7, 'the matrix', '10', 'matrix.png', 'It is the first installment in the Matrix film series, starring Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss, Hugo Weaving, and Joe Pantoliano, and depicts a dystopian future in which humanity is unknowingly trapped inside the Matrix,', 2),
(8, 'The Karate Kid 2010', '8', 'karatekid.png', 'When his mothers career results in a move to China, 12-year-old Dre Parker (Jaden Smith) finds that he is a stranger in a strange land. Though he knows a little karate, his fighting skills are no match for Cheng, the school bully.', 2),
(9, 'How to Train Your Dragon', '15', 'httyd.png', 'A hapless young Viking who aspires to hunt dragons becomes the unlikely friend of a young dragon himself, and learns there may be more to the creatures than he assumed.', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `content`, `time`, `product_id`) VALUES
(1, 'w', 'ww', '0000-00-00 00:00:00', 7),
(2, 'jordy', 'rrrrrrrrrrrrrrrrrr', '0000-00-00 00:00:00', 7),
(3, 't', 't', '2024-11-15 11:32:07', 7);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `vendors_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `img`, `vendors_id`) VALUES
(1, 'laptops', 'img/laptops.png', 1),
(2, 'movies', 'img/movies.png', 2);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendors_id` (`vendors_id`);

--
-- Indexen voor tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexen voor tabel `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`vendors_id`) REFERENCES `vendors` (`id`);

--
-- Beperkingen voor tabel `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
