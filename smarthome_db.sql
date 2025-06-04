-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jun 2025 pada 13.08
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smarthome_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `energies`
--

CREATE TABLE `energies` (
  `id` int(11) NOT NULL,
  `total_today` float DEFAULT NULL,
  `total_month` float DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `energies`
--

INSERT INTO `energies` (`id`, `total_today`, `total_month`, `created_at`, `updated_at`) VALUES
(1, 12.5, 320, '2025-06-03 07:05:25', '2025-06-03 07:05:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `humidities`
--

CREATE TABLE `humidities` (
  `id` int(11) NOT NULL,
  `value` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `humidities`
--

INSERT INTO `humidities` (`id`, `value`, `created_at`, `updated_at`) VALUES
(1, 60, '2025-06-03 07:03:30', '2025-06-03 07:34:11'),
(2, 52, '2025-06-03 07:03:30', '2025-06-03 07:03:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `securities`
--

CREATE TABLE `securities` (
  `id` int(11) NOT NULL,
  `door_status` enum('OPEN','CLOSED') DEFAULT NULL,
  `alarm_status` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `securities`
--

INSERT INTO `securities` (`id`, `door_status`, `alarm_status`, `created_at`, `updated_at`) VALUES
(1, 'OPEN', 'ON', '2025-06-03 07:58:10', '2025-06-03 07:58:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temperatures`
--

CREATE TABLE `temperatures` (
  `id` int(11) NOT NULL,
  `value` float DEFAULT NULL,
  `heating` int(11) DEFAULT NULL,
  `fan_speed` int(11) DEFAULT NULL,
  `fan1_status` enum('ON','OFF') DEFAULT NULL,
  `fan2_status` enum('ON','OFF') DEFAULT NULL,
  `fan3_status` enum('ON','OFF') DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `temperatures`
--

INSERT INTO `temperatures` (`id`, `value`, `heating`, `fan_speed`, `fan1_status`, `fan2_status`, `fan3_status`, `created_at`, `updated_at`) VALUES
(1, 31, 52, 43, 'OFF', 'ON', 'ON', '2025-06-03 06:43:38', '2025-06-03 06:49:01'),
(2, 26, 40, 30, 'ON', 'OFF', 'OFF', '2025-05-31 06:06:57', '2025-06-03 06:47:11');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `energies`
--
ALTER TABLE `energies`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `humidities`
--
ALTER TABLE `humidities`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `securities`
--
ALTER TABLE `securities`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `temperatures`
--
ALTER TABLE `temperatures`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `energies`
--
ALTER TABLE `energies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `humidities`
--
ALTER TABLE `humidities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `securities`
--
ALTER TABLE `securities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `temperatures`
--
ALTER TABLE `temperatures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
