-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Lip 2020, 20:04
-- Wersja serwera: 10.4.6-MariaDB
-- Wersja PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `db_weather`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_open_weather` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weather` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ;

--
-- Zrzut danych tabeli `cities`
--

INSERT INTO `cities` (`id`, `id_open_weather`, `name`, `country`, `weather`, `created_at`, `updated_at`) VALUES
(1, 759734, 'Rzeszów', 'PL', '{\"coord\":{\"lon\":22,\"lat\":50.04},\"sys\":{\"country\":\"PL\",\"timezone\":7200,\"sunrise\":1595126652,\"sunset\":1595183522},\"weather\":[{\"id\":501,\"main\":\"Rain\",\"description\":\"umiarkowane opady deszczu\",\"icon\":\"10d\"}],\"main\":{\"temp\":294.12,\"feels_like\":291.78,\"temp_min\":292.59,\"temp_max\":295.15,\"pressure\":1015,\"humidity\":64},\"visibility\":10000,\"wind\":{\"speed\":5.1,\"deg\":20},\"clouds\":{\"all\":75},\"dt\":1595178554,\"id\":759734,\"name\":\"Rzesz\\u00f3w\"}', '2020-07-19 15:58:41', '2020-07-19 16:00:08'),
(2, 757026, 'Tarnów', 'PL', '{\"coord\":{\"lon\":20.99,\"lat\":50.01},\"sys\":{\"country\":\"PL\",\"timezone\":7200,\"sunrise\":1595126903,\"sunset\":1595183756},\"weather\":[{\"id\":500,\"main\":\"Rain\",\"description\":\"s\\u0142abe opady deszczu\",\"icon\":\"10d\"}],\"main\":{\"temp\":293.68,\"feels_like\":294.38,\"temp_min\":292.59,\"temp_max\":294.82,\"pressure\":1016,\"humidity\":78},\"visibility\":10000,\"wind\":{\"speed\":2.14,\"deg\":71},\"clouds\":{\"all\":16},\"dt\":1595178532,\"id\":757026,\"name\":\"Tarn\\u00f3w\"}', '2020-07-19 15:58:48', '2020-07-19 16:00:08');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_07_19_175346_create_table_cities', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
