-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 10, 2017 at 01:09 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitbeanz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` smallint(1) DEFAULT '1',
  `reset_pass_type` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `reset_key` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `active`, `reset_pass_type`, `reset_key`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@test.com', '$2y$10$KDiOA9LDpYxBzhKAWIDxUe3CjXOMLIajqTnILKnYzH/bPgBCm.EFS', '0kTzE38Tg1LQe4GdKfePcbU0nfkiE7y7eSR01wK0vVibu50Dsf1ggHnGdGph', 1, 'no', '', '2016-05-22 23:29:08', '2017-10-09 13:17:00'),
(91, 'D Gym', 'deepak.mohan1589@gmail.com', '$2y$10$IwrV5/ZjGfxyzLzhW2v3dOEztpnDztwwYwl3uDYqAqYYvmWg1v3DW', 'n2aM8KgDJQ39G1KO1GcnLjNvDqmYfA3rYBKjGNoJSMZEvjqXQfokvZyp44tB', 1, 'no', '', '2017-03-12 06:38:37', '2017-09-13 08:43:59'),
(92, 'A Gym', 'desk@ozonemotors.in', '$2y$10$6zP4bo8IWi5CKrOmrTR7zejvfP0ZTQch8FjcVFPj5RFkIVyyEc9hK', 'l5IaH1upgBpDbIVfuMLZjYuEIHZANuBuIFhjyfRbzKuYfWtW2gyJnUSSAL9s', 1, 'no', '', '2017-03-12 06:39:57', '2017-07-28 10:48:47'),
(93, 'B Gym', 'deepak@ozonemotors.in', '$2y$10$JpKGABAreEnET5eVNGDBHuzwiKlKQEe/6CLU03ajEE69TNAZLRGYq', 'WoiqMFRNz4yCMcRzO8DqaFXJcplPkDkIE1I4d4c57dHJUmnhYZPSLrEl6Pbc', 1, 'no', '', '2017-03-12 06:49:59', '2017-09-08 13:09:19'),
(94, 'C Gym', 'care@ozogarages.com', '$2y$10$7jlqC.KcHV/KbBPqrZHrn.im/b.Wye/OuZdk.IPKV0I4sJhQ2GSFa', 'dom9D6n2QmKegtenejYOFROw5JNXEu68JR8DOfmhAlirvHFrPInRdg5j0HQy', 1, 'no', '', '2017-03-12 06:50:35', '2017-07-28 10:48:45'),
(95, 'E Gym', 'ozonemotorsindia@gmail.com', '$2y$10$IgOPVk0WY4BMnINiLpkmQuiJkqy92BzqIj8Rg3tBDzV3a8a3.QZ.C', '2pQ4DkswHMOdsTyWQFdmjandYO9LOaW28wyEgmpXubRoJwVdOO1aG7qgShYU', 1, 'no', '', '2017-03-12 06:51:06', '2017-07-28 10:48:44'),
(100, 'balasubramanian', 'balasrain1@gmail.com', '$2y$10$KDiOA9LDpYxBzhKAWIDxUe3CjXOMLIajqTnILKnYzH/bPgBCm.EFS', NULL, 1, 'no', '', '2017-03-15 11:56:45', '2017-03-15 11:56:45'),
(101, 'bala', 'balasrain2@gmail.com', '$2y$10$LlPzSGO/.Q4HVN2MDAo5TOc.KxA6ubBCrgLcUBrEa6aizljAbkEMG', 'lbZ44E50N5C4cK2854KkZLWGtpty9zzsQJXnZBS6Pi9UllejGTF31HjnPqo4', 1, 'no', '', '2017-03-24 11:44:05', '2017-03-24 11:48:36'),
(102, 'bala', 'balasrain@gmail.com', '$2y$10$FIzhzjMaOGdM8BuXICVMAOLiyuNVrmuOcYZJu7M1ur0BavI4fKjwO', 'h3SrwRKeI3poIAO1GyDusLknUSsPduYgS2HSX0VuwmaPGngCulAafwa0rC0a', 1, 'no', 'K59FHK6jQvPEKurMF', '2017-03-24 12:31:28', '2017-08-03 11:13:56'),
(103, 'Reuben Gym', 'reuben@gmail.com', '$2y$10$0dQJhXDV8Pkwx0fucsq.Ue00LMCBSQFpkcZ.yh6X4ewcefLTVUS82', NULL, 1, 'no', '', '2017-04-07 12:07:14', '2017-04-07 12:07:14'),
(104, 'SMB', 'shambabufriend@gmail.com', '$2y$10$/8k8K7.6WmMfmmZtlCdZHOrJJL2xxhCb/pkt1TLGSxnqee2QHn6mi', '6TdUUn7ogpeVkwDtxNdkKAvXCuAPKUuk3QKalmFQ9VPbPtQrsvqSdWHEnOLo', 1, 'no', '', '2017-04-08 03:59:07', '2017-09-15 12:02:04'),
(105, 'Reub Fitness', 'reuben.abrahammat@gmail.com', '$2y$10$H7fCTd.WuRqryVlQnkTwm.t3f5OPyyUeaHFDk9iIZSPXeUdqcJpTO', 'yQg1XFZoBHwuFLQGTfaQg5FlpWs7pd9DD3Sj6PiHzbUWrE0aKwNO9xi8sNO1', 1, 'no', '', '2017-04-10 04:17:48', '2017-05-05 06:40:23'),
(106, 'Sample Gym 2', 'ashokmanor3366@gmail.com', '$2y$10$lGa8un.726VVdGqV9qd8sukFBsrRg274y/2tmq6bW0zq6KlVos5O.', NULL, 1, 'no', '', '2017-04-10 04:31:36', '2017-04-10 04:31:36'),
(107, 'V.S.T Fitness Studio ', 'promise.thebest@gmail.com', '$2y$10$fhBGYpcPBlYYoWKRfO67MuRkJ5KaO5wH.k/2OQInSV9PjxDYqrLJu', '1nLTqsdWJG4MmOdigqvwaRdVmAO0ZqqsktvYM1nHUZiuyzc9pTysdSrYQKcX', 1, 'no', '', '2017-04-15 06:01:39', '2017-05-09 05:32:24'),
(108, 'Juvantas Fitness ', 'fitnessjuvantas@gmail.com', '$2y$10$5iw6ew7u7HeC/Q9JULGgBOImrVb8CosNeuMDhw3I6Q6w0h4Y6bjrW', 'BFbB1CDTfzb84Zx0clPQpoz3fZH0UIl13QsE1gxcGD29saBdpb2sGEve5R6B', 1, 'no', '', '2017-05-03 05:24:26', '2017-05-11 12:40:24'),
(109, 'Sandow Gym', 'sandoww2011@gmail.com', '$2y$10$lF318cgz6Zs5TTVqph.27OkK7LwvGs3kfcXKsWHLePBQ2xWq3FbwO', 'TZMai887gg7X4t13ESme58C0oUr1doAXrPZU8jQjSpebspEwo5DAoMufWPzE', 1, 'no', '', '2017-05-03 05:35:38', '2017-08-05 07:12:49'),
(110, 'Ateliers Fitness : Velachery', 'atliersfitness@gmail.com', '$2y$10$vZeaDsMKtZNwe6R0gYnGB.FEF0QQ5rNJMgyaCU7c8XcBhzj9pIMUK', NULL, 0, 'no', '', '2017-05-03 06:37:41', '2017-05-08 09:40:13'),
(111, 'Ateliers Fitness : Velachery', 'ateliersfitness@gmail.com', '$2y$10$wPQqv0WubUIyYob1d0ZRae/VOJw8Lp8lLELXzqO8NNlRCFyTeqp6C', NULL, 0, 'no', '', '2017-05-03 06:47:54', '2017-05-03 07:24:40'),
(112, 'Ateliers Fitness : Velachery', 'ateliersfitnes@gmail.com', '$2y$10$cYGCL/7bMhSUmsa75990veuLYMtT05/S8rg92tYp5MatsOx4zchza', 'pUp41lqWsdq1BL4bsZvhWm3r6LXSjEuU0xluEm2ORLE5CYIkr50xb0ilZMj5', 1, 'no', '', '2017-05-03 07:27:27', '2017-05-22 10:26:51'),
(113, 'Ateliers Fitness : Medavakkam', 'ateliersmedavakkam@gmail.com', '$2y$10$lmW4zU/i76zdb.7EufbG3u3I7PiidvE2XfkCXxMsQz8QyPqYknYke', 'mRjFHMAnFedsudNo7vjktgdjRAkZale54VL0BKjSoIRUJEdtdIBRGzwZrFy4', 1, 'no', '', '2017-05-04 06:09:37', '2017-05-22 10:28:12'),
(114, 'Ateliers Fitness : Sembakkam', 'atelierssembakkam@gmail.com', '$2y$10$H2.pxJTeT2teI2dbtrkgouIQfrXBZtoZM4oY/6TDOnb9RDU0oKBNe', NULL, 0, 'no', '', '2017-05-04 06:13:44', '2017-05-12 08:17:57'),
(115, 'Ateliers Fitness : AlwarthiruNagar', 'alwarthirunagarateliers@gmail.com', '$2y$10$gcBSS6NVpELW6uu/6ZVDrOp.shnPigQawNqlwiyA99abZkrjapXHu', 'o23YC3naKHVeYKZEJMm3T1U15tGIn0YQv1IjyBifqRONIHq2JfwREfdGmpd9', 1, 'no', '', '2017-05-04 06:17:28', '2017-05-22 10:27:39'),
(116, 'Ateliers Fitness : T.Nagar', 'ateliersfitnesstnagar@gmail.com', '$2y$10$gpNGmH3J4SC/EiXK3p7vxe7atoxTsPjbh4b2HXU52fMzKeU0JuUPq', '2O8Hy4bHPVoAh9lZcsoJMBFxwsACUdxYdS4SsMPO9rWp0BSfmA2Vr1EVDifn', 1, 'no', '', '2017-05-04 06:23:30', '2017-05-18 08:10:37'),
(117, 'Ateliers Fitness : Royapettah', 'ateliersroyapet@gmail.com', '$2y$10$NRFwjRHyjRtvmumTglOV3eAEwdycr46uwsI41iDLFFdrOvDgEeeQe', 'I9xv2HgZEFxu80cm8dqeT6VogZUYDgwWnUgtwLDRjgVUPqsfVcGehwXnHuKP', 1, 'no', '', '2017-05-04 06:26:40', '2017-05-20 14:36:35'),
(118, 'Ateliers Fitness: Sembakkam', 'ateliersembakkam@gmail.com', '$2y$10$8ATDxl9dlJ/Mqrkl0ixKbOEdigB5ZcE/ZyVvddmHMfdVEbd55Jn1m', 'ruUD6QrVA0yCwpRwsZ04dsrMYizHaP9Wdx1BhJHpgSoaXUAnbXB9BHiHcZUp', 1, 'no', '', '2017-05-04 10:40:59', '2017-05-22 10:49:28'),
(119, 'Non Stop Fitness :Thiruvanmiyur', 'nsgkumar@yahoo.com', '$2y$10$HzvQJYsoAyTQFymMsOa8VObFVEUbsiE5KgHKxULa8mrL5x6MlMgFC', NULL, 0, 'no', '', '2017-05-06 07:07:31', '2017-05-15 06:49:29'),
(120, 'Contours Womens Fitness Studio : Velachery', 'rathi.jayaraj@gmail.com', '$2y$10$EpcxIjB7QX6R4Pg0yNIAEOoNrNuXg6nyA0bZbxSWsmNF0KLn5QHlO', 'q7KGySPrNRgBm2gwA4Vxj3ZMG534kZeix8FPxCWGDb6uTFt4feJuRkhgoBBC', 1, 'no', '', '2017-05-06 07:21:25', '2017-05-16 06:45:01'),
(121, '5R Fitness Studio', 'enquiry@5rfitnessstudio.in', '$2y$10$yyO76dPJ/uYd5ME7v.XWDOf31nSFbeiBReCo8Hhboyy4BDV/BUpyW', NULL, 1, 'no', '', '2017-05-08 07:09:09', '2017-05-22 07:43:05'),
(122, 'Non Stop Fitness', 'nsfkumar@yahoo.com', '$2y$10$kfTXmYdRVwcSSU48FPERj.izKYXMfdda4lxFI92CD3HhOYke2Ej1G', NULL, 1, 'no', '', '2017-05-09 13:11:21', '2017-05-15 06:32:14'),
(123, 'Arun Gym : Test', 'sarunkumar1406@gmail.com', '$2y$10$CQze3y9m5CtGX/w6nBHJ1Oq3ULBqy8QqND6DXr98CaRDEKkDdC8UW', '2MVqTnjkNNc5wMDBRZEWUgy3cnFBKW6chSIEQfhRGaCriOGNGemCwiiJz0yN', 1, 'no', '', '2017-05-11 05:27:36', '2017-05-15 06:51:10'),
(124, 'Body Focus Gym', 'rajesh_mrchennai@yahoo.com', '$2y$10$BWIAQu4m.K7aWkjTdjP09e4UDz9YTOh/ab3ybLwjxq33ce9qlZ9xu', NULL, 1, 'no', '', '2017-05-12 06:13:35', '2017-05-12 06:19:09'),
(125, 'Fitbeanz', 'fitbeanzfitness@gmail.com', '$2y$10$VzSXt7OCaVJFyqQEzZX5Qu85NQA/PLDQXzMKkDLYa/H9BsAWBrov6', NULL, 1, 'no', '', '2017-05-15 06:52:32', '2017-05-15 06:52:32'),
(126, 'bala', 'bala@systimanx.com', '$2y$10$ms3rBwTFhEI5qV6jtiBoieGugSOv9FtJhFlHeTd3CyGM2gDOBkPbe', NULL, 1, 'no', '', '2017-05-15 06:57:17', '2017-05-15 06:57:57'),
(127, 'dummy', 'balass@systimanx.com', '$2y$10$0Mg/l3eKLHF1DLrpl28mfuPEahKnIhPPeKfLKG5v13MFQI24Pxm7i', NULL, 1, 'no', '', '2017-05-15 07:18:21', '2017-05-15 07:18:21'),
(128, 'New Gold Fitness Centre', 'newgoldfitnesscentre@yahoo.in', '$2y$10$OAbK4Y2dADKhCfMk77OAGu81WhwZuLkR5PXn5CqXtfe6/Ys/nTOlm', '9cIQRbrfVeRLoV13LURnqfQPezE58KC7Lt69O23YJZ3yEsQBCmUK8UCGN4ey', 1, 'no', '', '2017-05-19 13:36:11', '2017-05-19 13:59:20'),
(129, 'F1 Fitness Center', 'f1fitnesscenter@gmail.com', '$2y$10$5ogFEnZdBk2pxnDYWSjPF.9x9vJjm/yGbeMYLXneXoEQ9jK3K7vsa', 'Qu6NJIuumc9SrmTOnc5Ue2oeHJzMfyRU2PvDdcGbWvTlQ7GQbwcr7z3JkY2d', 1, 'no', '', '2017-05-19 15:31:59', '2017-08-01 15:12:18'),
(130, 'Master Flitness Studio', 'sriramm2009@gmail.com', '$2y$10$bdA/B.rW6/l1SNrrLPA24O82.E5FvXc9N.Tm9hOFHUJDRP8B6ssNa', 'lt6dWqB7AZjKVarFq2zeW8BqadvA2on9rPFYvGGhMyvBU7pTRrz8apeyJhYg', 1, 'no', '', '2017-05-23 12:33:05', '2017-08-01 14:46:26'),
(131, 'Body Life Gym and Fitness Center', 'kayalviziprabakaran@gmail.com', '$2y$10$f74GGszuqlpFnKAtgLlFU.rG0D2.hm9BkHazyBxdv8.iKbankU0o.', 'TkEdrn4lqWAGay6fHYRw3R46yWk5GjJaSJPXOFalnmF8pT2u9gGvEq2tD6h0', 1, 'no', '', '2017-05-26 03:38:21', '2017-05-26 04:18:50'),
(132, 'Gold Gym and Fitness Centre', 'manivelan5778@gmail.com', '$2y$10$9v1glqV8bZv27Rq4sS0YU.sKahTQAoLU0OkaWIoaqk0HofCVXeoZO', 'FReQcs6jPd7PhlvoDiYa64niEQLEyBd0uzfzH4H1xmdRXpw8HAsnT4LxHduj', 1, 'no', '', '2017-06-01 14:32:31', '2017-06-01 15:24:19'),
(133, 'OMR Fitness Gym', 'satish123omrfitness@gmail.com', '$2y$10$BDtAJDehRNejWipNZO4mfeOTO5hWd3uTOXQa2UKS8fsZoDFIgV8Y.', NULL, 0, 'no', '', '2017-06-12 13:20:57', '2017-08-01 12:37:37'),
(134, 'OMR Fitness Gym', 'sathish123omrfitness@gmail.com', '$2y$10$/O4MU/QML5QKUF8dNh5oA.ESndVXLmKOHQMau5LDA7OXa67zDD3C2', 'VlIGfTixivIxGxDtKCGN3ARSdZ5V9h1NhtAwuzUuMLgEsLNsy0IjmrbPgW9V', 1, 'no', '', '2017-06-12 13:25:22', '2017-08-01 12:59:38'),
(135, 'Snap Fitness', 'velachery@snapfitnessindia.com', '$2y$10$7mdEPAVcFy7MHraqzruThOfNc5Wg2Lr.qUY9cZR96roUDxHpMLnEa', NULL, 1, 'no', '', '2017-06-22 09:33:08', '2017-06-22 10:12:13'),
(136, 'Adze Fittness', 'manir8881@gmail.com', '$2y$10$OSsl9xXM0LjWNuHTCRmDb.eSVsqj/Sf.wZBQRprNoxwuF1vldhGb2', NULL, 1, 'no', '', '2017-07-07 03:42:06', '2017-07-07 03:44:50'),
(137, 'Friend\'s Fitness Centre : Shanthi Nagar', 'friendspowergym2@gmail.com', '$2y$10$axrNEVK4GahkGiGphg3GTua7WZqrUkZqlH.OJo9wS.cRk1tgXygt.', NULL, 1, 'no', '', '2017-07-10 11:25:19', '2017-07-20 12:49:28'),
(138, 'Ronnie Fitness Gym', 'ronniefitnessgym@gmail.com', '$2y$10$KjiIhWvS7sLjC9VWfcy6OOdeitBA6xyk8Z9.VFY2YMSHcj7X6UeBy', NULL, 1, 'no', '', '2017-07-10 13:59:18', '2017-07-10 14:01:41'),
(139, 'House of Fitness: Kottivakkam', 'hfsportsclub@gmail.com', '$2y$10$3Ku4hA2e53wTueV4p9qNMe8xCB8G66.t0nCuCV23J/Col9W79A2Eu', NULL, 1, 'no', '', '2017-07-13 12:27:56', '2017-08-05 10:41:13'),
(140, 'House of Fitness Sports Club: Palavakkam', 'mohanbabu0023@gmail.com', '$2y$10$t6XFSb5jG8ltLW69mbgsJemTwCKDKutCBRCEkNV39w6l9WfN0k5f.', 'vxaftY6Yrc56y59e8KM42nFFBBWET7uNWBUwPE0953UTg4LLyqGUj1kDoDda', 1, 'no', '', '2017-07-13 12:31:44', '2017-08-03 12:46:18'),
(141, 'House of Fitness: Neelankarai', 'hffitnesschennai@gmail.com', '$2y$10$pft2aeOP3FqQyCx3BChpQeiCSBD3Xf4EOxOqDvu3BJTosvmhq7zWu', 'e47WrNWukYyF7llPxwicjXxzYMqmRkgdZiXTk2exXUHIKlSMzdrgMlB1r9Z2', 1, 'no', 'LhpRugfpZSmY42uwV', '2017-07-13 13:03:42', '2017-08-03 13:03:28'),
(142, 'Friends Power Gym :  NGGO Colony', 'charles_july11@yahoo.com', '$2y$10$M0RdV1UnSBnK2BEC73dhEOvH9rUCtjQNaypwi6OXUtMoh0RUIaCRe', NULL, 1, 'no', '', '2017-07-20 12:51:59', '2017-07-20 12:54:07'),
(143, 'SampleTest', 'sankar2389@gmail.com', '$2y$10$r0FNAIl5nyyiJ9w3Ad7SNOt6/XGHafs/LdXWr/3oyzlJqv3rx3dd2', '77eDvjzvFUgyGqqCsfuOQii72JFa7f8ndZCyq0fGBZQEqTSvA3krjdi5VMm0', 1, 'no', '', '2017-08-03 13:32:36', '2017-08-03 13:40:59'),
(144, 'Wax Fitness Factory: Madipakkam', 'teamwaxmode.nk@gmail.com', '$2y$10$12U0bIEHUaAZ.zENZyLCCOfi0EuKslWCETPZUkXGWftGReORfGEvK', NULL, 1, 'no', '', '2017-08-07 14:04:11', '2017-08-07 14:04:11'),
(145, 'Wax Fitness Factory: Madipakkam', 'teamwax.nk@gmail.com', '$2y$10$Z5gSyMTJdP5qhKyMFS9U/enysGDUj6Uf6jHUs9jpodIrpF2qtxBtu', NULL, 1, 'no', '', '2017-08-07 14:12:24', '2017-08-07 14:12:24'),
(146, 'Fitnesh Plus Ladies Gym & Aerobics', 'fitnessplushealthstudio@gmail.com', '$2y$10$8ZwUyTF2wbzwVf32hCJ7yugC71WPrZBO1Tnjiksc6eny7LMldllwm', 'RGdc6QxIl48ruvPyRSvIfoywPYkRhwerK8RtgKJLrkgjChINYF0MqgFT1Yfo', 1, 'no', '', '2017-08-26 14:04:00', '2017-08-28 11:48:07'),
(147, 'Max Muscle Gym', 'fly2malai83@yahoo.com', '$2y$10$2QBfufmFqn26fHyff0znp.gd1WcJOvPhrBtB9a8DWq8SsKfarrtCq', NULL, 1, 'no', '', '2017-08-26 14:34:52', '2017-08-26 14:34:52'),
(148, 'Epic Gym', 'epicgym42@gmail.com', '$2y$10$bOFBBxWi8C67Zc2rIaOmc.QcxXHzRiaK4ef8ZyM2YCdjhxKXQcs4C', 'p0cXFyyqj8aow2MAC5a8lrmxyYF98xmnCRV7Aopv5Swv7ghTWMyp5QimwKSy', 1, 'no', '', '2017-08-30 14:37:45', '2017-08-30 14:40:54'),
(149, 'U vs U Fitness', 'fitnessuvsu@gmail.com', '$2y$10$QxgMxvu/YXti1jbXdXBJCO8AtcE7Mr01bPXIXY923VmiXef9BgBpy', NULL, 1, 'no', '', '2017-08-31 05:23:35', '2017-08-31 05:23:35'),
(150, 'Test 2', 'jacksonrajil@gmail.com', '$2y$10$HZso4j/CpjB.BkbAKffOMO.JxskUxFd4fAsa/XaWhY9.K1iBytMti', 'gxSgNBh2NPPNIPhiqfxBba5fzM5Pi26IQccqMOjxKTNAznaZ9SqgHB6yas86', 1, 'no', '', '2017-09-04 15:51:50', '2017-10-10 13:01:38'),
(151, 'Elixir Fitness Studio', 'elixirfitnessstudio@yahoo.com', '$2y$10$lbTfid6.rMf8uiGYjIVen.Set07sTatAdP/vyTjRogI00ePS57l3u', NULL, 1, 'no', '', '2017-09-06 07:09:22', '2017-09-06 07:09:22'),
(152, 'JVS Fitness center', 'jvssaravanan@gmail.com', '$2y$10$yJedfvc4V6kwprsQ5T2IYuqzM5WfOt9ppOL92bPHiFLurg.cUoAzW', NULL, 1, 'no', '', '2017-09-12 14:02:40', '2017-09-12 14:10:56'),
(153, 'Lime Exclusive Women Fitness Studio', 'limefitnessprm@gmail.com', '$2y$10$wSz3qwI7deQIzLgmKAAf8OZGA5D0J4jm6hRVM40l.4UiBVq/4gjW6', NULL, 1, 'no', '', '2017-09-15 13:16:54', '2017-09-15 13:16:54'),
(154, 'Go Fit Fitness Studio', 'gofitfitnessstudio@gmail.com', '$2y$10$q/9lCpyv2ehNkusDn6L1Z.4T8cgGhufY0C23j3Hswh8gIDtjTI482', NULL, 1, 'no', '', '2017-09-16 04:55:23', '2017-09-16 04:55:23'),
(155, 'Fitness 360 : Pammal', 'senthilnathan.fitnesstrainer@gmail.com', '$2y$10$bjCHO9PH/fuoCtsB0XZpqeHh/58RCZKYE84v6WYrLeW0PB2XFqLIi', NULL, 1, 'no', '', '2017-09-20 04:01:07', '2017-09-20 04:01:07'),
(156, 'Bharath B2 Fitness Health Studio', 'bharathb2fitnesshealthstudio@gmail.com', '$2y$10$/1BGaTZ3.ojnu9n.UJRuR.RbkLDQKnTnQmD6LZe0BjHHyAwmZ9gUu', NULL, 1, 'no', '', '2017-09-21 12:33:38', '2017-09-21 12:45:10'),
(157, 'Emerge Gym', 'kannapiran1907@gmail.com', '$2y$10$jTFc7puncSXUUo1HB0gfJeZBZRVT9xbJtSMr6jNQQD.c9kSlsv.qi', NULL, 0, 'no', '', '2017-09-26 13:06:44', '2017-09-26 13:10:00'),
(158, 'Emerge Gym', 'kannabiran1907@gmail.com', '$2y$10$CL6DOc8IlapLl/8BgV3UKu.JuyGaL38Pcmp.KSmnLuKgxZd12BOD.', 'ycbOK0a5L7AqnwL70sAuilH2U5HNQ13UbOxLXjvpvgJjoTvOUZnrH5lIcktB', 1, 'no', '', '2017-09-26 13:11:38', '2017-09-26 13:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `gym_banner_master`
--

CREATE TABLE `gym_banner_master` (
  `ban_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ban_title` varchar(100) DEFAULT NULL,
  `img_path` varchar(150) DEFAULT NULL,
  `view_order` int(2) DEFAULT NULL,
  `active` smallint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gym_banner_master`
--

INSERT INTO `gym_banner_master` (`ban_id`, `user_id`, `ban_title`, `img_path`, `view_order`, `active`) VALUES
(7, 91, NULL, '471932_1489301979_png', NULL, 1),
(8, 91, NULL, '941973_1489301992_jpg', NULL, 1),
(9, 91, NULL, '441788_1489302011_jpg', NULL, 1),
(10, 91, NULL, '418391_1489302017_jpg', NULL, 1),
(11, 92, NULL, '281455_1489302126_png', NULL, 1),
(12, 92, NULL, '325727_1489302130_jpg', NULL, 1),
(13, 92, NULL, '683907_1489302134_jpg', NULL, 1),
(14, 92, NULL, '328273_1489302141_jpg', NULL, 1),
(15, 92, NULL, '679894_1489302150_jpg', NULL, 1),
(16, 92, NULL, '94749_1489302157_JPG', NULL, 1),
(17, 94, NULL, '311350_1489302261_JPG', NULL, 1),
(18, 94, NULL, '448293_1489302265_JPG', NULL, 1),
(19, 94, NULL, '829938_1489302270_png', NULL, 1),
(20, 94, NULL, '540768_1489302275_jpg', NULL, 1),
(21, 93, NULL, '596774_1489302370_jpg', NULL, 1),
(22, 93, NULL, '431146_1489302374_jpg', NULL, 1),
(23, 95, NULL, '523225_1489302449_png', NULL, 1),
(24, 95, NULL, '609835_1489302453_jpg', NULL, 1),
(25, 104, NULL, '251143_1491798407_jpg', NULL, 1),
(26, 105, NULL, '213304_1491816766_jpg', NULL, 1),
(27, 107, NULL, '772565_1492258172_jpg', NULL, 1),
(28, 107, NULL, '795105_1492258176_jpg', NULL, 1),
(37, 116, NULL, '410540_1494223643_jpg', NULL, 1),
(38, 116, NULL, '504728_1494223655_jpg', NULL, 1),
(39, 116, NULL, '882236_1494223665_jpg', NULL, 1),
(40, 116, NULL, '801813_1494223677_jpg', NULL, 1),
(41, 116, NULL, '556151_1494223700_jpg', NULL, 1),
(42, 117, NULL, '907910_1494224809_jpg', NULL, 1),
(43, 117, NULL, '659579_1494224857_jpg', NULL, 1),
(44, 117, NULL, '6175_1494224869_jpg', NULL, 1),
(45, 117, NULL, '100014_1494224879_jpg', NULL, 1),
(55, 123, NULL, '822740_1494480645_jpg', NULL, 1),
(56, 123, NULL, '765809_1494480650_jpg', NULL, 1),
(57, 123, NULL, '427211_1494480654_jpg', NULL, 1),
(58, 108, NULL, '52584_1494505617_jpg', NULL, 1),
(59, 108, NULL, '982329_1494505669_jpg', NULL, 1),
(60, 108, NULL, '96913_1494505883_jpg', NULL, 1),
(61, 122, NULL, '327984_1494678540_jpg', NULL, 1),
(62, 122, NULL, '182298_1494678580_jpg', NULL, 1),
(63, 122, NULL, '155363_1494678626_jpg', NULL, 1),
(64, 122, NULL, '494514_1494678672_jpg', NULL, 1),
(65, 122, NULL, '286747_1494678768_jpg', NULL, 1),
(66, 122, NULL, '632236_1494678825_jpg', NULL, 1),
(67, 120, NULL, '829118_1494913995_jpg', NULL, 1),
(68, 120, NULL, '930928_1494914158_jpg', NULL, 1),
(69, 120, NULL, '936341_1494914227_jpg', NULL, 1),
(70, 120, NULL, '458350_1494914304_jpg', NULL, 1),
(71, 112, NULL, '142353_1495090151_jpg', NULL, 1),
(72, 112, NULL, '976277_1495090378_jpg', NULL, 1),
(73, 112, NULL, '969276_1495090417_jpg', NULL, 1),
(74, 112, NULL, '731256_1495090654_jpg', NULL, 1),
(75, 112, NULL, '682004_1495090745_jpg', NULL, 1),
(76, 112, NULL, '216809_1495090865_jpg', NULL, 1),
(77, 115, NULL, '76003_1495096326_jpg', NULL, 1),
(78, 115, NULL, '195734_1495096335_jpg', NULL, 1),
(79, 115, NULL, '352042_1495096345_jpg', NULL, 1),
(80, 115, NULL, '158434_1495096357_jpg', NULL, 1),
(81, 113, NULL, '591278_1495097653_JPG', NULL, 1),
(82, 113, NULL, '195020_1495097690_jpg', NULL, 1),
(83, 113, NULL, '566729_1495097697_jpg', NULL, 1),
(84, 113, NULL, '740324_1495097747_JPG', NULL, 1),
(86, 128, NULL, '473038_1495202689_jpg', NULL, 0),
(87, 128, NULL, '160377_1495202770_jpg', NULL, 1),
(88, 128, NULL, '830300_1495207870_jpg', NULL, 1),
(89, 128, NULL, '37712_1495208411_jpg', NULL, 1),
(90, 128, NULL, '344752_1495208857_jpg', NULL, 0),
(91, 129, NULL, '656051_1495208979_JPG', NULL, 1),
(92, 129, NULL, '130444_1495208998_JPG', NULL, 1),
(93, 129, NULL, '265183_1495209032_JPG', NULL, 1),
(94, 128, NULL, '77131_1495209034_jpg', NULL, 1),
(95, 129, NULL, '415045_1495209052_JPG', NULL, 1),
(96, 129, NULL, '578303_1495209074_JPG', NULL, 1),
(97, 129, NULL, '731931_1495209092_JPG', NULL, 1),
(98, 121, NULL, '423362_1495439286_JPG', NULL, 1),
(99, 121, NULL, '575574_1495439303_JPG', NULL, 1),
(100, 118, NULL, '628889_1495449182_jpg', NULL, 1),
(101, 118, NULL, '198637_1495449215_jpg', NULL, 1),
(102, 118, NULL, '922344_1495449273_jpg', NULL, 1),
(103, 118, NULL, '806360_1495449309_jpg', NULL, 1),
(104, 118, NULL, '8039_1495449393_jpg', NULL, 1),
(105, 118, NULL, '910099_1495449423_jpg', NULL, 1),
(106, 130, NULL, '616422_1495543319_jpg', NULL, 1),
(107, 130, NULL, '542518_1495543557_jpg', NULL, 1),
(108, 130, NULL, '629819_1495543648_jpg', NULL, 1),
(109, 130, NULL, '171066_1495543700_jpg', NULL, 1),
(110, 131, NULL, '219124_1495770927_jpg', NULL, 1),
(111, 131, NULL, '461716_1495771157_jpg', NULL, 1),
(112, 131, NULL, '651336_1495771347_jpg', NULL, 1),
(113, 131, NULL, '401856_1495771451_jpg', NULL, 1),
(114, 131, NULL, '172238_1495771589_jpg', NULL, 1),
(115, 131, NULL, '374903_1495771762_jpg', NULL, 1),
(116, 132, NULL, '276406_1496330476_jpg', NULL, 1),
(117, 134, NULL, '198469_1497274460_jpg', NULL, 1),
(118, 134, NULL, '393688_1497274563_jpg', NULL, 1),
(119, 135, NULL, '57563_1498125545_jpg', NULL, 1),
(120, 136, NULL, '992358_1499399448_JPG', NULL, 1),
(121, 137, NULL, '350923_1499686267_jpg', NULL, 1),
(122, 138, NULL, '882014_1499696302_jpg', NULL, 1),
(123, 138, NULL, '927253_1499696339_jpg', NULL, 1),
(124, 138, NULL, '299775_1499696359_jpg', NULL, 1),
(125, 138, NULL, '347374_1499696376_jpg', NULL, 1),
(126, 138, NULL, '152505_1499696419_jpg', NULL, 1),
(127, 140, NULL, '462143_1499950067_jpg', NULL, 1),
(128, 138, NULL, '128382_1500040501_jpg', NULL, 1),
(129, 141, NULL, '790325_1501765224_jpg', NULL, 1),
(130, 141, NULL, '447062_1501765236_jpg', NULL, 1),
(131, 109, NULL, '775903_1501916354_jpg', NULL, 1),
(132, 109, NULL, '531590_1501916364_jpg', NULL, 1),
(133, 109, NULL, '555439_1501916380_jpg', NULL, 1),
(134, 109, NULL, '695000_1501916392_jpg', NULL, 1),
(137, 146, NULL, '847212_1503920345_jpg', NULL, 1),
(138, 146, NULL, '948988_1503920363_jpg', NULL, 1),
(139, 146, NULL, '606089_1503920380_jpg', NULL, 1),
(140, 146, NULL, '382900_1503920403_jpg', NULL, 1),
(141, 146, NULL, '705555_1503920510_jpg', NULL, 1),
(142, 146, NULL, '968002_1503920524_jpg', NULL, 1),
(143, 150, NULL, '866166_1504543687_png', NULL, 1),
(144, 156, NULL, '636158_1505998064_JPG', NULL, 1),
(145, 156, NULL, '850920_1505998160_JPG', NULL, 1),
(146, 156, NULL, '589462_1505998385_JPG', NULL, 1),
(147, 158, NULL, '97069_1506432258_jpg', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gym_category_mapping`
--

CREATE TABLE `gym_category_mapping` (
  `cat_map_id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `active` smallint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gym_category_mapping`
--

INSERT INTO `gym_category_mapping` (`cat_map_id`, `cat_id`, `user_id`, `active`) VALUES
(39, 1, 95, 1),
(40, 2, 95, 1),
(45, 1, 93, 1),
(46, 2, 93, 1),
(47, 1, 94, 1),
(48, 2, 94, 1),
(49, 1, 96, 1),
(50, 1, 97, 1),
(51, 1, 98, 1),
(52, 1, 99, 1),
(53, 1, 100, 1),
(56, 1, 92, 1),
(57, 2, 92, 1),
(58, 1, 101, 1),
(59, 1, 102, 1),
(60, 2, 103, 1),
(61, 1, 104, 1),
(62, 1, 105, 1),
(63, 2, 106, 1),
(81, 2, 110, 1),
(87, 2, 111, 1),
(105, 1, 107, 1),
(106, 2, 107, 1),
(107, 1, 108, 1),
(108, 2, 108, 1),
(109, 1, 109, 1),
(110, 2, 109, 1),
(142, 1, 121, 1),
(143, 2, 121, 1),
(152, 1, 124, 1),
(153, 2, 124, 1),
(172, 1, 116, 1),
(173, 2, 116, 1),
(184, 1, 113, 1),
(185, 2, 113, 1),
(186, 1, 114, 1),
(187, 2, 114, 1),
(188, 1, 115, 1),
(189, 2, 115, 1),
(190, 1, 117, 1),
(191, 2, 117, 1),
(192, 1, 118, 1),
(193, 2, 118, 1),
(194, 1, 122, 1),
(195, 1, 91, 1),
(196, 2, 91, 1),
(197, 1, 119, 1),
(200, 1, 123, 1),
(201, 2, 123, 1),
(202, 1, 125, 1),
(205, 1, 126, 1),
(206, 2, 126, 1),
(207, 1, 127, 1),
(208, 2, 127, 1),
(211, 1, 120, 1),
(212, 2, 120, 1),
(213, 1, 112, 1),
(214, 2, 112, 1),
(215, 1, 128, 1),
(216, 1, 129, 1),
(217, 1, 130, 1),
(218, 1, 131, 1),
(219, 1, 132, 1),
(221, 1, 133, 1),
(222, 1, 134, 1),
(224, 1, 135, 1),
(225, 2, 135, 1),
(226, 1, 136, 1),
(228, 1, 138, 1),
(231, 1, 140, 1),
(232, 2, 140, 1),
(233, 1, 141, 1),
(234, 2, 141, 1),
(235, 1, 137, 1),
(236, 1, 142, 1),
(237, 1, 143, 1),
(238, 2, 143, 1),
(243, 1, 139, 1),
(244, 2, 139, 1),
(245, 1, 144, 1),
(246, 2, 144, 1),
(247, 1, 145, 1),
(248, 2, 145, 1),
(249, 1, 146, 1),
(250, 1, 147, 1),
(251, 1, 148, 1),
(252, 1, 149, 1),
(253, 2, 150, 1),
(254, 1, 151, 1),
(255, 2, 151, 1),
(256, 1, 152, 1),
(257, 1, 153, 1),
(258, 2, 153, 1),
(259, 1, 154, 1),
(260, 1, 155, 1),
(261, 1, 156, 1),
(263, 1, 157, 1),
(264, 1, 158, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gym_category_master`
--

CREATE TABLE `gym_category_master` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) DEFAULT NULL,
  `active` smallint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gym_category_master`
--

INSERT INTO `gym_category_master` (`cat_id`, `cat_name`, `active`) VALUES
(1, 'Economic', 1),
(2, 'Premium', 1),
(3, 'Throwaway', 0),
(4, 'Luxury', 0),
(5, 'Offers', 0),
(6, 'mid range', 0),
(7, 'Combo pack', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gym_duration_master`
--

CREATE TABLE `gym_duration_master` (
  `dur_id` int(11) NOT NULL,
  `dur_name` varchar(50) DEFAULT NULL,
  `active` smallint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gym_duration_master`
--

INSERT INTO `gym_duration_master` (`dur_id`, `dur_name`, `active`) VALUES
(1, 'Hourly', 1),
(2, 'Monthly', 1),
(3, 'Yearly', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gym_features`
--

CREATE TABLE `gym_features` (
  `fe_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `features_name` varchar(100) DEFAULT NULL,
  `active` smallint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gym_features`
--

INSERT INTO `gym_features` (`fe_id`, `user_id`, `features_name`, `active`) VALUES
(1, 1, 'Treadmill', 1),
(2, 1, 'EFX', 1),
(3, 1, 'A/C Floor', 1),
(4, 1, 'Cycling', 1),
(5, 1, 'Carpet Flooring', 1),
(6, 1, 'Power Equipments', 1),
(7, 1, 'Hydraulic Equipments', 0),
(8, 1, 'Premium Weights', 1),
(9, 1, 'Holistic Trainer', 1),
(10, 1, 'Social Activities', 1),
(11, 1, 'Manual Equipments', 1),
(12, 1, 'Manual Weights', 1),
(13, 1, 'Indoor', 1),
(14, 1, 'Outdoor', 1),
(15, 1, 'Trainer', 1),
(16, 1, 'Certified Trainer', 1),
(17, 1, 'Door step services', 1),
(18, 1, 'Dietitian', 1),
(19, 1, 'Steam Bath', 1),
(20, 1, 'Boxing', 1),
(21, 1, 'Shuttle', 1),
(22, 1, 'Varma Massage', 1),
(23, 1, 'Boot Camp', 1),
(24, 1, 'Gymnastics', 1),
(25, 1, 'Karate', 1),
(26, 1, 'Silambam', 1),
(27, 1, 'Elliptical', 0),
(28, 1, 'Cross Trainer', 0),
(29, 1, 'Recumbent Bike', 0),
(30, 1, 'Spin Bike', 0),
(31, 1, 'Leg press', 0),
(32, 1, 'Chess press', 0),
(33, 1, 'Shoulder press', 0),
(34, 1, 'Chest press', 0),
(35, 1, 'Cable cross over', 0),
(36, 1, 'Leg Curl', 0),
(37, 1, 'Leg extension', 0),
(38, 1, 'Tirceps', 0),
(39, 1, 'Biceps', 0),
(40, 1, 'Rotary torso', 0),
(41, 1, 'Abcrunch', 0),
(42, 1, 'Precher curl', 0),
(43, 1, 'Hyper extn', 0),
(44, 1, 'Pec dec', 0),
(45, 1, 'Assisted chin dip', 0),
(46, 1, 'Rowing machine', 0),
(47, 1, 'Smith machine', 0),
(48, 1, 'Circuit Training', 0),
(49, 1, 'Body Toning', 0),
(50, 1, 'Cardio core', 1),
(51, 1, 'Group workouts', 1),
(52, 1, 'Assured Fat Loss', 1),
(53, 1, 'Fun, Fast, Fitness', 1),
(54, 1, 'Machine designed for women', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gym_features_mapping`
--

CREATE TABLE `gym_features_mapping` (
  `fea_map_id` int(11) NOT NULL,
  `fe_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `active` smallint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gym_features_mapping`
--

INSERT INTO `gym_features_mapping` (`fea_map_id`, `fe_id`, `user_id`, `active`) VALUES
(39, 1, 95, 1),
(40, 2, 95, 1),
(46, 2, 93, 1),
(47, 3, 93, 1),
(48, 4, 93, 1),
(49, 2, 94, 1),
(50, 3, 94, 1),
(51, 1, 96, 1),
(52, 1, 97, 1),
(53, 1, 98, 1),
(54, 1, 99, 1),
(55, 1, 100, 1),
(60, 1, 92, 1),
(61, 1, 101, 1),
(62, 1, 102, 1),
(63, 2, 103, 1),
(64, 1, 104, 1),
(65, 1, 105, 1),
(66, 2, 106, 1),
(225, 1, 110, 1),
(226, 2, 110, 1),
(227, 3, 110, 1),
(228, 4, 110, 1),
(229, 5, 110, 1),
(230, 6, 110, 1),
(231, 8, 110, 1),
(232, 9, 110, 1),
(233, 10, 110, 1),
(234, 13, 110, 1),
(235, 14, 110, 1),
(236, 16, 110, 1),
(237, 18, 110, 1),
(238, 19, 110, 1),
(292, 1, 111, 1),
(293, 2, 111, 1),
(294, 3, 111, 1),
(295, 4, 111, 1),
(296, 5, 111, 1),
(297, 6, 111, 1),
(298, 8, 111, 1),
(299, 9, 111, 1),
(300, 10, 111, 1),
(301, 13, 111, 1),
(302, 14, 111, 1),
(303, 15, 111, 1),
(304, 16, 111, 1),
(305, 18, 111, 1),
(306, 19, 111, 1),
(463, 1, 107, 1),
(464, 3, 107, 1),
(465, 4, 107, 1),
(466, 5, 107, 1),
(467, 6, 107, 1),
(468, 8, 107, 1),
(469, 9, 107, 1),
(470, 10, 107, 1),
(471, 13, 107, 1),
(472, 15, 107, 1),
(473, 16, 107, 1),
(474, 17, 107, 1),
(475, 21, 107, 1),
(476, 1, 108, 1),
(477, 2, 108, 1),
(478, 3, 108, 1),
(479, 4, 108, 1),
(480, 5, 108, 1),
(481, 6, 108, 1),
(482, 8, 108, 1),
(483, 13, 108, 1),
(484, 14, 108, 1),
(485, 16, 108, 1),
(486, 17, 108, 1),
(487, 19, 108, 1),
(488, 20, 108, 1),
(489, 1, 109, 1),
(490, 2, 109, 1),
(491, 3, 109, 1),
(492, 4, 109, 1),
(493, 5, 109, 1),
(494, 6, 109, 1),
(495, 8, 109, 1),
(496, 9, 109, 1),
(497, 10, 109, 1),
(498, 13, 109, 1),
(499, 16, 109, 1),
(664, 1, 121, 1),
(665, 2, 121, 1),
(666, 3, 121, 1),
(667, 4, 121, 1),
(668, 5, 121, 1),
(669, 6, 121, 1),
(670, 8, 121, 1),
(671, 9, 121, 1),
(672, 13, 121, 1),
(673, 15, 121, 1),
(674, 16, 121, 1),
(709, 1, 124, 1),
(710, 2, 124, 1),
(711, 4, 124, 1),
(712, 6, 124, 1),
(713, 8, 124, 1),
(714, 9, 124, 1),
(715, 10, 124, 1),
(716, 13, 124, 1),
(717, 14, 124, 1),
(718, 16, 124, 1),
(719, 17, 124, 1),
(720, 20, 124, 1),
(721, 23, 124, 1),
(722, 24, 124, 1),
(723, 25, 124, 1),
(724, 26, 124, 1),
(1030, 1, 116, 1),
(1031, 2, 116, 1),
(1032, 3, 116, 1),
(1033, 4, 116, 1),
(1034, 5, 116, 1),
(1035, 6, 116, 1),
(1036, 8, 116, 1),
(1037, 9, 116, 1),
(1038, 10, 116, 1),
(1039, 13, 116, 1),
(1040, 15, 116, 1),
(1041, 16, 116, 1),
(1042, 18, 116, 1),
(1043, 19, 116, 1),
(1044, 27, 116, 1),
(1045, 28, 116, 1),
(1046, 29, 116, 1),
(1047, 30, 116, 1),
(1048, 31, 116, 1),
(1049, 33, 116, 1),
(1050, 34, 116, 1),
(1051, 35, 116, 1),
(1052, 36, 116, 1),
(1053, 37, 116, 1),
(1054, 38, 116, 1),
(1055, 39, 116, 1),
(1056, 40, 116, 1),
(1057, 41, 116, 1),
(1058, 42, 116, 1),
(1059, 43, 116, 1),
(1060, 44, 116, 1),
(1061, 45, 116, 1),
(1062, 46, 116, 1),
(1063, 47, 116, 1),
(1234, 1, 113, 1),
(1235, 2, 113, 1),
(1236, 3, 113, 1),
(1237, 4, 113, 1),
(1238, 5, 113, 1),
(1239, 6, 113, 1),
(1240, 8, 113, 1),
(1241, 9, 113, 1),
(1242, 10, 113, 1),
(1243, 13, 113, 1),
(1244, 15, 113, 1),
(1245, 16, 113, 1),
(1246, 18, 113, 1),
(1247, 19, 113, 1),
(1248, 27, 113, 1),
(1249, 28, 113, 1),
(1250, 29, 113, 1),
(1251, 30, 113, 1),
(1252, 31, 113, 1),
(1253, 33, 113, 1),
(1254, 34, 113, 1),
(1255, 35, 113, 1),
(1256, 36, 113, 1),
(1257, 37, 113, 1),
(1258, 38, 113, 1),
(1259, 39, 113, 1),
(1260, 40, 113, 1),
(1261, 41, 113, 1),
(1262, 42, 113, 1),
(1263, 43, 113, 1),
(1264, 44, 113, 1),
(1265, 45, 113, 1),
(1266, 46, 113, 1),
(1267, 47, 113, 1),
(1268, 1, 114, 1),
(1269, 2, 114, 1),
(1270, 3, 114, 1),
(1271, 4, 114, 1),
(1272, 5, 114, 1),
(1273, 6, 114, 1),
(1274, 8, 114, 1),
(1275, 9, 114, 1),
(1276, 10, 114, 1),
(1277, 13, 114, 1),
(1278, 15, 114, 1),
(1279, 16, 114, 1),
(1280, 18, 114, 1),
(1281, 19, 114, 1),
(1282, 27, 114, 1),
(1283, 28, 114, 1),
(1284, 29, 114, 1),
(1285, 30, 114, 1),
(1286, 31, 114, 1),
(1287, 33, 114, 1),
(1288, 34, 114, 1),
(1289, 35, 114, 1),
(1290, 36, 114, 1),
(1291, 37, 114, 1),
(1292, 38, 114, 1),
(1293, 39, 114, 1),
(1294, 40, 114, 1),
(1295, 41, 114, 1),
(1296, 42, 114, 1),
(1297, 43, 114, 1),
(1298, 44, 114, 1),
(1299, 45, 114, 1),
(1300, 46, 114, 1),
(1301, 47, 114, 1),
(1302, 1, 115, 1),
(1303, 2, 115, 1),
(1304, 3, 115, 1),
(1305, 4, 115, 1),
(1306, 5, 115, 1),
(1307, 6, 115, 1),
(1308, 8, 115, 1),
(1309, 9, 115, 1),
(1310, 10, 115, 1),
(1311, 13, 115, 1),
(1312, 15, 115, 1),
(1313, 16, 115, 1),
(1314, 18, 115, 1),
(1315, 19, 115, 1),
(1316, 27, 115, 1),
(1317, 28, 115, 1),
(1318, 29, 115, 1),
(1319, 30, 115, 1),
(1320, 31, 115, 1),
(1321, 33, 115, 1),
(1322, 34, 115, 1),
(1323, 35, 115, 1),
(1324, 36, 115, 1),
(1325, 37, 115, 1),
(1326, 38, 115, 1),
(1327, 39, 115, 1),
(1328, 40, 115, 1),
(1329, 41, 115, 1),
(1330, 42, 115, 1),
(1331, 43, 115, 1),
(1332, 44, 115, 1),
(1333, 45, 115, 1),
(1334, 46, 115, 1),
(1335, 47, 115, 1),
(1336, 1, 117, 1),
(1337, 2, 117, 1),
(1338, 3, 117, 1),
(1339, 4, 117, 1),
(1340, 5, 117, 1),
(1341, 6, 117, 1),
(1342, 8, 117, 1),
(1343, 9, 117, 1),
(1344, 10, 117, 1),
(1345, 13, 117, 1),
(1346, 15, 117, 1),
(1347, 16, 117, 1),
(1348, 18, 117, 1),
(1349, 19, 117, 1),
(1350, 27, 117, 1),
(1351, 28, 117, 1),
(1352, 29, 117, 1),
(1353, 30, 117, 1),
(1354, 31, 117, 1),
(1355, 33, 117, 1),
(1356, 34, 117, 1),
(1357, 35, 117, 1),
(1358, 36, 117, 1),
(1359, 37, 117, 1),
(1360, 38, 117, 1),
(1361, 39, 117, 1),
(1362, 40, 117, 1),
(1363, 41, 117, 1),
(1364, 42, 117, 1),
(1365, 43, 117, 1),
(1366, 44, 117, 1),
(1367, 45, 117, 1),
(1368, 46, 117, 1),
(1369, 47, 117, 1),
(1370, 1, 118, 1),
(1371, 2, 118, 1),
(1372, 3, 118, 1),
(1373, 4, 118, 1),
(1374, 5, 118, 1),
(1375, 6, 118, 1),
(1376, 8, 118, 1),
(1377, 9, 118, 1),
(1378, 10, 118, 1),
(1379, 13, 118, 1),
(1380, 15, 118, 1),
(1381, 16, 118, 1),
(1382, 18, 118, 1),
(1383, 19, 118, 1),
(1384, 27, 118, 1),
(1385, 28, 118, 1),
(1386, 29, 118, 1),
(1387, 30, 118, 1),
(1388, 31, 118, 1),
(1389, 33, 118, 1),
(1390, 34, 118, 1),
(1391, 35, 118, 1),
(1392, 36, 118, 1),
(1393, 37, 118, 1),
(1394, 38, 118, 1),
(1395, 39, 118, 1),
(1396, 40, 118, 1),
(1397, 41, 118, 1),
(1398, 42, 118, 1),
(1399, 43, 118, 1),
(1400, 44, 118, 1),
(1401, 45, 118, 1),
(1402, 46, 118, 1),
(1403, 47, 118, 1),
(1404, 1, 122, 1),
(1405, 2, 122, 1),
(1406, 4, 122, 1),
(1407, 5, 122, 1),
(1408, 6, 122, 1),
(1409, 8, 122, 1),
(1410, 10, 122, 1),
(1411, 13, 122, 1),
(1412, 14, 122, 1),
(1413, 15, 122, 1),
(1414, 16, 122, 1),
(1415, 17, 122, 1),
(1416, 22, 122, 1),
(1417, 1, 91, 1),
(1418, 2, 91, 1),
(1419, 3, 91, 1),
(1420, 4, 91, 1),
(1421, 10, 91, 1),
(1422, 13, 91, 1),
(1423, 14, 91, 1),
(1424, 18, 91, 1),
(1425, 19, 91, 1),
(1426, 1, 119, 1),
(1427, 2, 119, 1),
(1428, 4, 119, 1),
(1429, 5, 119, 1),
(1430, 6, 119, 1),
(1431, 8, 119, 1),
(1432, 9, 119, 1),
(1433, 10, 119, 1),
(1434, 13, 119, 1),
(1435, 14, 119, 1),
(1436, 16, 119, 1),
(1437, 17, 119, 1),
(1438, 22, 119, 1),
(1444, 1, 123, 1),
(1445, 2, 123, 1),
(1446, 1, 125, 1),
(1449, 3, 126, 1),
(1450, 45, 127, 1),
(1451, 46, 127, 1),
(1452, 47, 127, 1),
(1469, 3, 120, 1),
(1470, 4, 120, 1),
(1471, 5, 120, 1),
(1472, 13, 120, 1),
(1473, 15, 120, 1),
(1474, 16, 120, 1),
(1475, 18, 120, 1),
(1476, 29, 120, 1),
(1477, 31, 120, 1),
(1478, 33, 120, 1),
(1479, 34, 120, 1),
(1480, 36, 120, 1),
(1481, 37, 120, 1),
(1482, 38, 120, 1),
(1483, 39, 120, 1),
(1484, 43, 120, 1),
(1485, 48, 120, 1),
(1486, 49, 120, 1),
(1487, 50, 120, 1),
(1488, 51, 120, 1),
(1489, 52, 120, 1),
(1490, 53, 120, 1),
(1491, 54, 120, 1),
(1492, 1, 112, 1),
(1493, 3, 112, 1),
(1494, 4, 112, 1),
(1495, 5, 112, 1),
(1496, 6, 112, 1),
(1497, 8, 112, 1),
(1498, 9, 112, 1),
(1499, 10, 112, 1),
(1500, 13, 112, 1),
(1501, 15, 112, 1),
(1502, 16, 112, 1),
(1503, 18, 112, 1),
(1504, 19, 112, 1),
(1505, 27, 112, 1),
(1506, 28, 112, 1),
(1507, 29, 112, 1),
(1508, 30, 112, 1),
(1509, 31, 112, 1),
(1510, 33, 112, 1),
(1511, 34, 112, 1),
(1512, 35, 112, 1),
(1513, 36, 112, 1),
(1514, 37, 112, 1),
(1515, 38, 112, 1),
(1516, 39, 112, 1),
(1517, 40, 112, 1),
(1518, 41, 112, 1),
(1519, 42, 112, 1),
(1520, 43, 112, 1),
(1521, 44, 112, 1),
(1522, 45, 112, 1),
(1523, 46, 112, 1),
(1524, 47, 112, 1),
(1525, 1, 128, 1),
(1526, 5, 128, 1),
(1527, 6, 128, 1),
(1528, 8, 128, 1),
(1529, 9, 128, 1),
(1530, 13, 128, 1),
(1531, 15, 128, 1),
(1532, 16, 128, 1),
(1533, 17, 128, 1),
(1534, 1, 129, 1),
(1535, 2, 129, 1),
(1536, 3, 129, 1),
(1537, 4, 129, 1),
(1538, 5, 129, 1),
(1539, 6, 129, 1),
(1540, 8, 129, 1),
(1541, 9, 129, 1),
(1542, 13, 129, 1),
(1543, 15, 129, 1),
(1544, 16, 129, 1),
(1545, 17, 129, 1),
(1546, 1, 130, 1),
(1547, 4, 130, 1),
(1548, 5, 130, 1),
(1549, 6, 130, 1),
(1550, 13, 130, 1),
(1551, 15, 130, 1),
(1552, 16, 130, 1),
(1553, 1, 131, 1),
(1554, 2, 131, 1),
(1555, 3, 131, 1),
(1556, 4, 131, 1),
(1557, 5, 131, 1),
(1558, 6, 131, 1),
(1559, 8, 131, 1),
(1560, 9, 131, 1),
(1561, 13, 131, 1),
(1562, 16, 131, 1),
(1563, 1, 132, 1),
(1564, 2, 132, 1),
(1565, 4, 132, 1),
(1566, 5, 132, 1),
(1567, 9, 132, 1),
(1568, 13, 132, 1),
(1569, 15, 132, 1),
(1570, 16, 132, 1),
(1571, 17, 132, 1),
(1581, 1, 133, 1),
(1582, 4, 133, 1),
(1583, 6, 133, 1),
(1584, 8, 133, 1),
(1585, 9, 133, 1),
(1586, 13, 133, 1),
(1587, 15, 133, 1),
(1588, 16, 133, 1),
(1589, 17, 133, 1),
(1590, 1, 134, 1),
(1591, 4, 134, 1),
(1592, 6, 134, 1),
(1593, 8, 134, 1),
(1594, 9, 134, 1),
(1595, 13, 134, 1),
(1596, 15, 134, 1),
(1597, 16, 134, 1),
(1598, 17, 134, 1),
(1610, 1, 135, 1),
(1611, 2, 135, 1),
(1612, 3, 135, 1),
(1613, 4, 135, 1),
(1614, 6, 135, 1),
(1615, 8, 135, 1),
(1616, 9, 135, 1),
(1617, 10, 135, 1),
(1618, 13, 135, 1),
(1619, 15, 135, 1),
(1620, 16, 135, 1),
(1621, 1, 136, 1),
(1622, 2, 136, 1),
(1623, 3, 136, 1),
(1624, 4, 136, 1),
(1625, 6, 136, 1),
(1626, 8, 136, 1),
(1627, 9, 136, 1),
(1628, 15, 136, 1),
(1629, 16, 136, 1),
(1642, 5, 138, 1),
(1643, 6, 138, 1),
(1644, 8, 138, 1),
(1645, 9, 138, 1),
(1646, 13, 138, 1),
(1647, 14, 138, 1),
(1648, 15, 138, 1),
(1649, 16, 138, 1),
(1650, 17, 138, 1),
(1664, 1, 140, 1),
(1665, 2, 140, 1),
(1666, 3, 140, 1),
(1667, 4, 140, 1),
(1668, 6, 140, 1),
(1669, 8, 140, 1),
(1670, 9, 140, 1),
(1671, 10, 140, 1),
(1672, 13, 140, 1),
(1673, 15, 140, 1),
(1674, 16, 140, 1),
(1675, 17, 140, 1),
(1676, 19, 140, 1),
(1677, 21, 140, 1),
(1678, 1, 141, 1),
(1679, 2, 141, 1),
(1680, 3, 141, 1),
(1681, 4, 141, 1),
(1682, 6, 141, 1),
(1683, 8, 141, 1),
(1684, 9, 141, 1),
(1685, 10, 141, 1),
(1686, 13, 141, 1),
(1687, 15, 141, 1),
(1688, 16, 141, 1),
(1689, 17, 141, 1),
(1690, 18, 141, 1),
(1691, 19, 141, 1),
(1692, 1, 137, 1),
(1693, 2, 137, 1),
(1694, 3, 137, 1),
(1695, 4, 137, 1),
(1696, 5, 137, 1),
(1697, 6, 137, 1),
(1698, 8, 137, 1),
(1699, 9, 137, 1),
(1700, 13, 137, 1),
(1701, 15, 137, 1),
(1702, 16, 137, 1),
(1703, 17, 137, 1),
(1704, 1, 142, 1),
(1705, 4, 142, 1),
(1706, 5, 142, 1),
(1707, 6, 142, 1),
(1708, 8, 142, 1),
(1709, 9, 142, 1),
(1710, 13, 142, 1),
(1711, 14, 142, 1),
(1712, 15, 142, 1),
(1713, 16, 142, 1),
(1714, 1, 143, 1),
(1715, 2, 143, 1),
(1716, 3, 143, 1),
(1743, 1, 139, 1),
(1744, 2, 139, 1),
(1745, 3, 139, 1),
(1746, 4, 139, 1),
(1747, 6, 139, 1),
(1748, 8, 139, 1),
(1749, 9, 139, 1),
(1750, 10, 139, 1),
(1751, 13, 139, 1),
(1752, 15, 139, 1),
(1753, 16, 139, 1),
(1754, 19, 139, 1),
(1755, 21, 139, 1),
(1756, 9, 144, 1),
(1757, 14, 144, 1),
(1758, 15, 144, 1),
(1759, 16, 144, 1),
(1760, 9, 145, 1),
(1761, 14, 145, 1),
(1762, 15, 145, 1),
(1763, 16, 145, 1),
(1764, 1, 146, 1),
(1765, 2, 146, 1),
(1766, 3, 146, 1),
(1767, 4, 146, 1),
(1768, 5, 146, 1),
(1769, 6, 146, 1),
(1770, 8, 146, 1),
(1771, 9, 146, 1),
(1772, 16, 146, 1),
(1773, 17, 146, 1),
(1774, 5, 147, 1),
(1775, 6, 147, 1),
(1776, 13, 147, 1),
(1777, 15, 147, 1),
(1778, 16, 147, 1),
(1779, 1, 148, 1),
(1780, 6, 148, 1),
(1781, 8, 148, 1),
(1782, 9, 148, 1),
(1783, 13, 148, 1),
(1784, 15, 148, 1),
(1785, 16, 148, 1),
(1786, 1, 149, 1),
(1787, 2, 149, 1),
(1788, 3, 149, 1),
(1789, 4, 149, 1),
(1790, 5, 149, 1),
(1791, 6, 149, 1),
(1792, 8, 149, 1),
(1793, 9, 149, 1),
(1794, 10, 149, 1),
(1795, 13, 149, 1),
(1796, 14, 149, 1),
(1797, 15, 149, 1),
(1798, 16, 149, 1),
(1799, 18, 149, 1),
(1800, 19, 149, 1),
(1801, 1, 150, 1),
(1802, 2, 150, 1),
(1803, 3, 150, 1),
(1804, 4, 150, 1),
(1805, 1, 151, 1),
(1806, 2, 151, 1),
(1807, 3, 151, 1),
(1808, 4, 151, 1),
(1809, 6, 151, 1),
(1810, 9, 151, 1),
(1811, 10, 151, 1),
(1812, 13, 151, 1),
(1813, 15, 151, 1),
(1814, 16, 151, 1),
(1815, 19, 151, 1),
(1816, 23, 151, 1),
(1817, 1, 152, 1),
(1818, 4, 152, 1),
(1819, 5, 152, 1),
(1820, 6, 152, 1),
(1821, 8, 152, 1),
(1822, 9, 152, 1),
(1823, 12, 152, 1),
(1824, 13, 152, 1),
(1825, 15, 152, 1),
(1826, 16, 152, 1),
(1827, 17, 152, 1),
(1828, 1, 153, 1),
(1829, 2, 153, 1),
(1830, 3, 153, 1),
(1831, 4, 153, 1),
(1832, 5, 153, 1),
(1833, 6, 153, 1),
(1834, 8, 153, 1),
(1835, 13, 153, 1),
(1836, 15, 153, 1),
(1837, 16, 153, 1),
(1838, 20, 153, 1),
(1839, 1, 154, 1),
(1840, 2, 154, 1),
(1841, 3, 154, 1),
(1842, 4, 154, 1),
(1843, 5, 154, 1),
(1844, 6, 154, 1),
(1845, 8, 154, 1),
(1846, 9, 154, 1),
(1847, 10, 154, 1),
(1848, 11, 154, 1),
(1849, 12, 154, 1),
(1850, 13, 154, 1),
(1851, 15, 154, 1),
(1852, 16, 154, 1),
(1853, 17, 154, 1),
(1854, 19, 154, 1),
(1855, 23, 154, 1),
(1856, 1, 155, 1),
(1857, 2, 155, 1),
(1858, 4, 155, 1),
(1859, 6, 155, 1),
(1860, 8, 155, 1),
(1861, 9, 155, 1),
(1862, 10, 155, 1),
(1863, 11, 155, 1),
(1864, 12, 155, 1),
(1865, 14, 155, 1),
(1866, 15, 155, 1),
(1867, 16, 155, 1),
(1868, 17, 155, 1),
(1869, 1, 156, 1),
(1870, 2, 156, 1),
(1871, 3, 156, 1),
(1872, 4, 156, 1),
(1873, 5, 156, 1),
(1874, 6, 156, 1),
(1875, 8, 156, 1),
(1876, 10, 156, 1),
(1877, 11, 156, 1),
(1878, 12, 156, 1),
(1879, 13, 156, 1),
(1880, 15, 156, 1),
(1881, 16, 156, 1),
(1882, 17, 156, 1),
(1883, 23, 156, 1),
(1897, 1, 157, 1),
(1898, 2, 157, 1),
(1899, 4, 157, 1),
(1900, 5, 157, 1),
(1901, 6, 157, 1),
(1902, 8, 157, 1),
(1903, 9, 157, 1),
(1904, 11, 157, 1),
(1905, 12, 157, 1),
(1906, 14, 157, 1),
(1907, 15, 157, 1),
(1908, 16, 157, 1),
(1909, 17, 157, 1),
(1910, 1, 158, 1),
(1911, 2, 158, 1),
(1912, 4, 158, 1),
(1913, 5, 158, 1),
(1914, 6, 158, 1),
(1915, 8, 158, 1),
(1916, 9, 158, 1),
(1917, 11, 158, 1),
(1918, 12, 158, 1),
(1919, 14, 158, 1),
(1920, 15, 158, 1),
(1921, 16, 158, 1),
(1922, 17, 158, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gym_mobile_otp`
--

CREATE TABLE `gym_mobile_otp` (
  `otp_id` int(11) NOT NULL,
  `mobile_no` varchar(30) DEFAULT NULL,
  `otp` varchar(30) DEFAULT NULL,
  `status` smallint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gym_mobile_otp`
--

INSERT INTO `gym_mobile_otp` (`otp_id`, `mobile_no`, `otp`, `status`) VALUES
(1, '9750134440', '682413', 0),
(2, '8870103196', '923569', 0),
(3, '9698422407', '456863', 0),
(4, '7708132640', '461285', 0),
(5, '8220131335', '924876', 0),
(6, '8680996597', '859376', 0),
(7, '8939040408', '392469', 0),
(8, '8056768082', '651579', 0),
(9, '9790777116', '172791', 0),
(10, '9789398752', '463924', 0),
(11, '8122119582', '513965', 0),
(12, '7502872744', '814875', 0),
(13, '9876543210', '963529', 0),
(14, '1234567890', '741967', 0),
(15, '9976543210', '123581', 0),
(16, '9987654321', '565384', 0),
(17, '8897654321', '531831', 0),
(18, '9876543320', '376218', 0),
(19, '8870103189', '241262', 0),
(20, '1111111111', '929731', 0),
(21, '9489428707', '657873', 0),
(22, '8939040400', '853434', 0),
(23, '9952998886', '987956', 0),
(24, '8667726173', '715813', 0),
(25, '9884404014', '757617', 0),
(26, '9600134000', '362424', 0),
(27, '9790545258', '713637', 0),
(28, '9171739993', '537523', 0),
(29, '8939623971', '498948', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gym_package_master`
--

CREATE TABLE `gym_package_master` (
  `pak_id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `package_name` varchar(150) DEFAULT NULL,
  `abt_package` varchar(200) DEFAULT NULL,
  `active` smallint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gym_package_master`
--

INSERT INTO `gym_package_master` (`pak_id`, `cat_id`, `user_id`, `package_name`, `abt_package`, `active`) VALUES
(77, 1, 123, 'Economic package sample', 'Gym floor access & all equipments access', 1),
(78, 1, 91, 'Sample Pack', 'sample pack', 1),
(79, 1, 108, 'General', 'The per session is applicable for one day.', 1),
(80, 1, 112, 'General package', 'PERSONAL TRAINER FEE FOR ONE MONTH  4,500/- \r\nSPECIAL SLIMMING FOUR WEEKS PROGRAMME FOR LADIES-6000/-\r\n', 1),
(81, 1, 122, 'Regular', 'Aesthetic workout, Stability, Strengthing, Weight training, Stretching. \r\nPay pack Varma massage of south tradition included oil ingredients also.', 1),
(82, 1, 122, 'Plus Cardio', 'Cardio related, Aesthetic, Stretching, Special care at any category, \r\nPay pack for Varma massage of south tradition with includes oil ingredients.', 1),
(83, 1, 91, 'Econ-Sample', 'Sample', 1),
(84, 2, 91, 'Sample Pre', 'Sample', 1),
(85, 1, 118, 'General Package', '', 1),
(86, 1, 107, 'General ', 'Personal trainer charges will be 4000 per month ', 1),
(87, 1, 120, 'Fitness Package', '1 hour session which includes warmup, circuit training, aerobics, toning excises, stretches and cool down.\r\nFor 15 days the package charge will be Rs.1999', 1),
(88, 2, 120, 'Weight loss', 'Weight loss package with personal training and diet monitoring, circuit training, aerobics, body sculpting excises.', 1),
(89, 1, 116, 'General package', '', 1),
(90, 1, 115, 'Genarel Package', 'PERSONAL TRAINER FEE FOR ONE MONTH  4,500/- \r\nSPECIAL SLIMMING FOUR WEEKS PROGRAMME FOR LADIES-6000/-', 1),
(91, 1, 113, 'General Package', 'PERSONAL TRAINER FEE FOR ONE MONTH  4,500/- \r\nSPECIAL SLIMMING FOUR WEEKS PROGRAMME FOR LADIES-6000/-', 1),
(92, 1, 117, 'General Package', '', 1),
(94, 1, 128, 'Gym', '', 1),
(95, 1, 129, 'Gym : General Fitness', '', 1),
(96, 1, 121, 'General Package ', '', 1),
(97, 1, 104, 'General', '', 1),
(98, 1, 104, 'Cardio', '', 1),
(99, 1, 130, 'General Package', 'Special train for bodybuilding & Weight loss.', 1),
(100, 1, 131, 'Normal', 'Weight loss, weight gain and bodybuilding.', 1),
(101, 1, 131, 'Cardio', 'Swiss ball, ground, bodybuilding, weight loss and weight gain.', 1),
(103, 1, 132, 'General', '', 1),
(104, 1, 134, 'General : Gym', '', 1),
(105, 1, 135, 'General', 'We do have outdoor activities like boot camp & etc. And also we take personal  training from 500 to 1000 per session.', 1),
(106, 2, 135, 'General', 'We do have outdoor activities like boot camp & etc. And also we take personal  training from 500 to 1000 per session.', 1),
(107, 1, 136, 'General +cardio', 'Free weight loss training without any personel charges ', 1),
(108, 1, 136, 'Strength', 'Good equipments', 1),
(109, 1, 137, 'General', '', 1),
(110, 1, 137, 'Cardio+general', '', 1),
(111, 1, 138, 'Gym: General', '', 1),
(112, 1, 140, 'BADMINTON ', '', 1),
(113, 1, 140, 'BADMINTON + GYM', '', 1),
(114, 1, 128, 'Aerobics', '', 1),
(115, 1, 130, 'Cardio ', '', 1),
(116, 1, 129, 'Aerobics', 'Aerobics are only in morning section', 1),
(117, 1, 140, 'gym', '', 1),
(118, 1, 141, 'gym ', '', 1),
(119, 1, 141, 'zumba', '', 1),
(120, 1, 109, 'Weight Training', '', 1),
(121, 1, 109, 'Weight Training and Cardio', '', 1),
(122, 1, 146, 'Gym', 'Gym, Aerobics, crossfit, weight loss ', 1),
(123, 1, 146, 'Gym + Aerobics + crossfit', 'Gym, Aerobics, crossfit, weight loss ', 1),
(124, 1, 156, 'Fitness', '', 1),
(125, 1, 158, 'Gym ', '', 1),
(126, 1, 158, 'Gym  + cardio ', '', 1),
(127, 1, 158, 'Aerobics ', '', 1),
(128, 1, 158, 'Yoga ', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gym_package_price`
--

CREATE TABLE `gym_package_price` (
  `pak_price_id` int(11) NOT NULL,
  `pak_id` int(11) NOT NULL,
  `pack_desc` varchar(150) DEFAULT NULL,
  `tra_id` int(11) DEFAULT NULL,
  `dur_id` int(11) DEFAULT NULL,
  `price` double(15,2) DEFAULT NULL,
  `active` smallint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gym_package_price`
--

INSERT INTO `gym_package_price` (`pak_price_id`, `pak_id`, `pack_desc`, `tra_id`, `dur_id`, `price`, `active`) VALUES
(317, 77, 'Hourly package: With trainer', 1, 1, 0.00, 1),
(318, 77, 'Monthly package: With trainer', 1, 2, 0.00, 1),
(319, 77, 'Yearly package: With trainer', 1, 3, 0.00, 1),
(320, 77, 'Hourly package: Without trainer', 2, 1, 39.00, 1),
(321, 77, 'Monthly package: Without trainer', 2, 2, 399.00, 1),
(322, 77, 'Yearly package: Without trainer', 2, 3, 1399.00, 1),
(329, 78, 'Session : With trainer', 1, 1, 0.00, 1),
(330, 78, 'Monthly : With trainer', 1, 2, 0.00, 1),
(331, 78, 'Yearly : With trainer', 1, 3, 0.00, 1),
(332, 78, 'Session : Without trainer', 2, 1, 23.00, 1),
(333, 78, 'Monthly : Without trainer', 2, 2, 34.00, 1),
(334, 78, 'Yearly : Without trainer', 2, 3, 1000.00, 1),
(335, 79, 'Session : With trainer', 1, 1, 250.00, 1),
(336, 79, 'Monthly : With trainer', 1, 2, 1999.00, 1),
(337, 79, 'Yearly : With trainer', 1, 3, 9999.00, 1),
(338, 79, 'Session : Without trainer', 2, 1, 250.00, 1),
(339, 79, 'Monthly : Without trainer', 2, 2, 1999.00, 1),
(340, 79, 'Yearly : Without trainer', 2, 3, 9999.00, 1),
(347, 81, 'Session : With trainer', 1, 1, 200.00, 1),
(348, 81, 'Monthly : With trainer', 1, 2, 700.00, 1),
(349, 81, 'Yearly : With trainer', 1, 3, 6700.00, 1),
(350, 81, 'Session : Without trainer', 2, 1, 200.00, 1),
(351, 81, 'Monthly : Without trainer', 2, 2, 700.00, 1),
(352, 81, 'Yearly : Without trainer', 2, 3, 6700.00, 1),
(353, 82, 'Session : With trainer', 1, 1, 250.00, 1),
(354, 82, 'Monthly : With trainer', 1, 2, 900.00, 1),
(355, 82, 'Yearly : With trainer', 1, 3, 9000.00, 1),
(356, 82, 'Session : Without trainer', 2, 1, 250.00, 1),
(357, 82, 'Monthly : Without trainer', 2, 2, 900.00, 1),
(358, 82, 'Yearly : Without trainer', 2, 3, 9000.00, 1),
(359, 83, 'Session : With trainer', 1, 1, 6.00, 1),
(360, 83, 'Monthly : With trainer', 1, 2, 8.00, 1),
(361, 83, 'Yearly : With trainer', 1, 3, 600.00, 1),
(362, 83, 'Session : Without trainer', 2, 1, 2.00, 1),
(363, 83, 'Monthly : Without trainer', 2, 2, 3.00, 1),
(364, 83, 'Yearly : Without trainer', 2, 3, 300.00, 1),
(365, 84, 'Session : With trainer', 1, 1, 499.00, 1),
(366, 84, 'Monthly : With trainer', 1, 2, 599.00, 1),
(367, 84, 'Yearly : With trainer', 1, 3, 6000.00, 1),
(368, 84, 'Session : Without trainer', 2, 1, 56.00, 1),
(369, 84, 'Monthly : Without trainer', 2, 2, 12.00, 1),
(370, 84, 'Yearly : Without trainer', 2, 3, 67.00, 1),
(377, 86, 'Session : With trainer', 1, 1, 100.00, 1),
(378, 86, 'Monthly : With trainer', 1, 2, 1500.00, 1),
(379, 86, 'Yearly : With trainer', 1, 3, 9000.00, 1),
(380, 86, 'Session : Without trainer', 2, 1, 80.00, 1),
(381, 86, 'Monthly : Without trainer', 2, 2, 1300.00, 1),
(382, 86, 'Yearly : Without trainer', 2, 3, 8000.00, 1),
(389, 88, 'Session : With trainer', 1, 1, 250.00, 1),
(390, 88, 'Monthly : With trainer', 1, 2, 4999.00, 1),
(391, 88, 'Yearly : With trainer', 1, 3, 18999.00, 1),
(392, 88, 'Session : Without trainer', 2, 1, 250.00, 1),
(393, 88, 'Monthly : Without trainer', 2, 2, 4999.00, 1),
(394, 88, 'Yearly : Without trainer', 2, 3, 18999.00, 1),
(395, 87, 'Session : With trainer', 1, 1, 250.00, 1),
(396, 87, 'Monthly : With trainer', 1, 2, 3499.00, 1),
(397, 87, 'Yearly : With trainer', 1, 3, 14000.00, 1),
(398, 87, 'Session : Without trainer', 2, 1, 250.00, 1),
(399, 87, 'Monthly : Without trainer', 2, 2, 3499.00, 1),
(400, 87, 'Yearly : Without trainer', 2, 3, 14000.00, 1),
(419, 89, 'Session : With trainer', 1, 1, 250.00, 1),
(420, 89, 'Monthly : With trainer', 1, 2, 1999.00, 1),
(421, 89, 'Yearly : With trainer', 1, 3, 9999.00, 1),
(422, 89, 'Session : Without trainer', 2, 1, 250.00, 1),
(423, 89, 'Monthly : Without trainer', 2, 2, 19999.00, 1),
(424, 89, 'Yearly : Without trainer', 2, 3, 9999.00, 1),
(437, 92, 'Session : With trainer', 1, 1, 250.00, 1),
(438, 92, 'Monthly : With trainer', 1, 2, 1999.00, 1),
(439, 92, 'Yearly : With trainer', 1, 3, 9999.00, 1),
(440, 92, 'Session : Without trainer', 2, 1, 250.00, 1),
(441, 92, 'Monthly : Without trainer', 2, 2, 1999.00, 1),
(442, 92, 'Yearly : Without trainer', 2, 3, 9999.00, 1),
(467, 80, 'Session : With trainer', 1, 1, 250.00, 1),
(468, 80, 'Monthly : With trainer', 1, 2, 1999.00, 1),
(469, 80, 'Yearly : With trainer', 1, 3, 9999.00, 1),
(470, 80, 'Session : Without trainer', 2, 1, 250.00, 1),
(471, 80, 'Monthly : Without trainer', 2, 2, 1999.00, 1),
(472, 80, 'Yearly : Without trainer', 2, 3, 9999.00, 1),
(473, 96, 'Session : With trainer', 1, 1, 60.00, 1),
(474, 96, 'Monthly : With trainer', 1, 2, 800.00, 1),
(475, 96, 'Yearly : With trainer', 1, 3, 7000.00, 1),
(476, 96, 'Session : Without trainer', 2, 1, 60.00, 1),
(477, 96, 'Monthly : Without trainer', 2, 2, 800.00, 1),
(478, 96, 'Yearly : Without trainer', 2, 3, 7000.00, 1),
(479, 97, 'Session : With trainer', 1, 1, 60.00, 1),
(480, 97, 'Monthly : With trainer', 1, 2, 900.00, 1),
(481, 97, 'Yearly : With trainer', 1, 3, 9000.00, 1),
(482, 97, 'Session : Without trainer', 2, 1, 50.00, 1),
(483, 97, 'Monthly : Without trainer', 2, 2, 700.00, 1),
(484, 97, 'Yearly : Without trainer', 2, 3, 7000.00, 1),
(485, 98, 'Session : With trainer', 1, 1, 100.00, 1),
(486, 98, 'Monthly : With trainer', 1, 2, 1000.00, 1),
(487, 98, 'Yearly : With trainer', 1, 3, 10000.00, 1),
(488, 98, 'Session : Without trainer', 2, 1, 100.00, 1),
(489, 98, 'Monthly : Without trainer', 2, 2, 1000.00, 1),
(490, 98, 'Yearly : Without trainer', 2, 3, 10000.00, 1),
(491, 90, 'Session : With trainer', 1, 1, 250.00, 1),
(492, 90, 'Monthly : With trainer', 1, 2, 1999.00, 1),
(493, 90, 'Yearly : With trainer', 1, 3, 9999.00, 1),
(494, 90, 'Session : Without trainer', 2, 1, 250.00, 1),
(495, 90, 'Monthly : Without trainer', 2, 2, 1999.00, 1),
(496, 90, 'Yearly : Without trainer', 2, 3, 9999.00, 1),
(497, 91, 'Session : With trainer', 1, 1, 250.00, 1),
(498, 91, 'Monthly : With trainer', 1, 2, 1999.00, 1),
(499, 91, 'Yearly : With trainer', 1, 3, 9999.00, 1),
(500, 91, 'Session : Without trainer', 2, 1, 250.00, 1),
(501, 91, 'Monthly : Without trainer', 2, 2, 1999.00, 1),
(502, 91, 'Yearly : Without trainer', 2, 3, 9999.00, 1),
(503, 85, 'Session : With trainer', 1, 1, 300.00, 1),
(504, 85, 'Monthly : With trainer', 1, 2, 1999.00, 1),
(505, 85, 'Yearly : With trainer', 1, 3, 9999.00, 1),
(506, 85, 'Session : Without trainer', 2, 1, 250.00, 1),
(507, 85, 'Monthly : Without trainer', 2, 2, 1999.00, 1),
(508, 85, 'Yearly : Without trainer', 2, 3, 9999.00, 1),
(515, 100, 'Session : With trainer', 1, 1, 80.00, 1),
(516, 100, 'Monthly : With trainer', 1, 2, 600.00, 1),
(517, 100, 'Yearly : With trainer', 1, 3, 4500.00, 1),
(518, 100, 'Session : Without trainer', 2, 1, 80.00, 1),
(519, 100, 'Monthly : Without trainer', 2, 2, 600.00, 1),
(520, 100, 'Yearly : Without trainer', 2, 3, 4500.00, 1),
(521, 101, 'Session : With trainer', 1, 1, 80.00, 1),
(522, 101, 'Monthly : With trainer', 1, 2, 600.00, 1),
(523, 101, 'Yearly : With trainer', 1, 3, 4500.00, 1),
(524, 101, 'Session : Without trainer', 2, 1, 80.00, 1),
(525, 101, 'Monthly : Without trainer', 2, 2, 600.00, 1),
(526, 101, 'Yearly : Without trainer', 2, 3, 4500.00, 1),
(533, 103, 'Session : With trainer', 1, 1, 100.00, 1),
(534, 103, 'Monthly : With trainer', 1, 2, 350.00, 1),
(535, 103, 'Yearly : With trainer', 1, 3, 4200.00, 1),
(536, 103, 'Session : Without trainer', 2, 1, 100.00, 1),
(537, 103, 'Monthly : Without trainer', 2, 2, 350.00, 1),
(538, 103, 'Yearly : Without trainer', 2, 3, 4200.00, 1),
(545, 105, 'Session : With trainer', 1, 1, 345.00, 1),
(546, 105, 'Monthly : With trainer', 1, 2, 3738.00, 1),
(547, 105, 'Yearly : With trainer', 1, 3, 16500.00, 1),
(548, 105, 'Session : Without trainer', 2, 1, 345.00, 1),
(549, 105, 'Monthly : Without trainer', 2, 2, 3738.00, 1),
(550, 105, 'Yearly : Without trainer', 2, 3, 16500.00, 1),
(551, 106, 'Session : With trainer', 1, 1, 345.00, 1),
(552, 106, 'Monthly : With trainer', 1, 2, 3738.00, 1),
(553, 106, 'Yearly : With trainer', 1, 3, 16500.00, 1),
(554, 106, 'Session : Without trainer', 2, 1, 345.00, 1),
(555, 106, 'Monthly : Without trainer', 2, 2, 3738.00, 1),
(556, 106, 'Yearly : Without trainer', 2, 3, 16500.00, 1),
(563, 108, 'Session : With trainer', 1, 1, 150.00, 1),
(564, 108, 'Monthly : With trainer', 1, 2, 650.00, 1),
(565, 108, 'Yearly : With trainer', 1, 3, 6000.00, 1),
(566, 108, 'Session : Without trainer', 2, 1, 150.00, 1),
(567, 108, 'Monthly : Without trainer', 2, 2, 650.00, 1),
(568, 108, 'Yearly : Without trainer', 2, 3, 6000.00, 1),
(569, 107, 'Session : With trainer', 1, 1, 150.00, 1),
(570, 107, 'Monthly : With trainer', 1, 2, 900.00, 1),
(571, 107, 'Yearly : With trainer', 1, 3, 7500.00, 1),
(572, 107, 'Session : Without trainer', 2, 1, 150.00, 1),
(573, 107, 'Monthly : Without trainer', 2, 2, 900.00, 1),
(574, 107, 'Yearly : Without trainer', 2, 3, 7500.00, 1),
(575, 109, 'Session : With trainer', 1, 1, 80.00, 1),
(576, 109, 'Monthly : With trainer', 1, 2, 600.00, 1),
(577, 109, 'Yearly : With trainer', 1, 3, 6000.00, 1),
(578, 109, 'Session : Without trainer', 2, 1, 80.00, 1),
(579, 109, 'Monthly : Without trainer', 2, 2, 600.00, 1),
(580, 109, 'Yearly : Without trainer', 2, 3, 6000.00, 1),
(581, 110, 'Session : With trainer', 1, 1, 120.00, 1),
(582, 110, 'Monthly : With trainer', 1, 2, 800.00, 1),
(583, 110, 'Yearly : With trainer', 1, 3, 7000.00, 1),
(584, 110, 'Session : Without trainer', 2, 1, 120.00, 1),
(585, 110, 'Monthly : Without trainer', 2, 2, 800.00, 1),
(586, 110, 'Yearly : Without trainer', 2, 3, 7000.00, 1),
(593, 112, 'Session : With trainer', 1, 1, 0.00, 1),
(594, 112, 'Monthly : With trainer', 1, 2, 2000.00, 1),
(595, 112, 'Yearly : With trainer', 1, 3, 15000.00, 1),
(596, 112, 'Session : Without trainer', 2, 1, 200.00, 1),
(597, 112, 'Monthly : Without trainer', 2, 2, 2000.00, 1),
(598, 112, 'Yearly : Without trainer', 2, 3, 15000.00, 1),
(599, 113, 'Session : With trainer', 1, 1, 500.00, 1),
(600, 113, 'Monthly : With trainer', 1, 2, 3500.00, 1),
(601, 113, 'Yearly : With trainer', 1, 3, 25000.00, 1),
(602, 113, 'Session : Without trainer', 2, 1, 500.00, 1),
(603, 113, 'Monthly : Without trainer', 2, 2, 3500.00, 1),
(604, 113, 'Yearly : Without trainer', 2, 3, 25000.00, 1),
(605, 104, 'Session : With trainer', 1, 1, 0.00, 1),
(606, 104, 'Monthly : With trainer', 1, 2, 0.00, 1),
(607, 104, 'Yearly : With trainer', 1, 3, 0.00, 1),
(608, 104, 'Session : Without trainer', 2, 1, 100.00, 1),
(609, 104, 'Monthly : Without trainer', 2, 2, 400.00, 1),
(610, 104, 'Yearly : Without trainer', 2, 3, 4000.00, 1),
(611, 114, 'Session : With trainer', 1, 1, 0.00, 1),
(612, 114, 'Monthly : With trainer', 1, 2, 0.00, 1),
(613, 114, 'Yearly : With trainer', 1, 3, 0.00, 1),
(614, 114, 'Session : Without trainer', 2, 1, 150.00, 1),
(615, 114, 'Monthly : Without trainer', 2, 2, 799.00, 1),
(616, 114, 'Yearly : Without trainer', 2, 3, 5999.00, 1),
(623, 94, 'Session : With trainer', 1, 1, 0.00, 1),
(624, 94, 'Monthly : With trainer', 1, 2, 0.00, 1),
(625, 94, 'Yearly : With trainer', 1, 3, 0.00, 1),
(626, 94, 'Session : Without trainer', 2, 1, 150.00, 1),
(627, 94, 'Monthly : Without trainer', 2, 2, 799.00, 1),
(628, 94, 'Yearly : Without trainer', 2, 3, 5999.00, 1),
(629, 99, 'Session : With trainer', 1, 1, 0.00, 1),
(630, 99, 'Monthly : With trainer', 1, 2, 0.00, 1),
(631, 99, 'Yearly : With trainer', 1, 3, 0.00, 1),
(632, 99, 'Session : Without trainer', 2, 1, 100.00, 1),
(633, 99, 'Monthly : Without trainer', 2, 2, 600.00, 1),
(634, 99, 'Yearly : Without trainer', 2, 3, 5000.00, 1),
(635, 115, 'Session : With trainer', 1, 1, 0.00, 1),
(636, 115, 'Monthly : With trainer', 1, 2, 0.00, 1),
(637, 115, 'Yearly : With trainer', 1, 3, 0.00, 1),
(638, 115, 'Session : Without trainer', 2, 1, 100.00, 1),
(639, 115, 'Monthly : Without trainer', 2, 2, 600.00, 1),
(640, 115, 'Yearly : Without trainer', 2, 3, 5000.00, 1),
(647, 116, 'Session : With trainer', 1, 1, 0.00, 1),
(648, 116, 'Monthly : With trainer', 1, 2, 0.00, 1),
(649, 116, 'Yearly : With trainer', 1, 3, 0.00, 1),
(650, 116, 'Session : Without trainer', 2, 1, 150.00, 1),
(651, 116, 'Monthly : Without trainer', 2, 2, 1500.00, 1),
(652, 116, 'Yearly : Without trainer', 2, 3, 8800.00, 1),
(653, 95, 'Session : With trainer', 1, 1, 0.00, 1),
(654, 95, 'Monthly : With trainer', 1, 2, 0.00, 1),
(655, 95, 'Yearly : With trainer', 1, 3, 0.00, 1),
(656, 95, 'Session : Without trainer', 2, 1, 150.00, 1),
(657, 95, 'Monthly : Without trainer', 2, 2, 1500.00, 1),
(658, 95, 'Yearly : Without trainer', 2, 3, 8800.00, 1),
(665, 111, 'Session : With trainer', 1, 1, 0.00, 1),
(666, 111, 'Monthly : With trainer', 1, 2, 0.00, 1),
(667, 111, 'Yearly : With trainer', 1, 3, 0.00, 1),
(668, 111, 'Session : Without trainer', 2, 1, 60.00, 1),
(669, 111, 'Monthly : Without trainer', 2, 2, 350.00, 1),
(670, 111, 'Yearly : Without trainer', 2, 3, 3000.00, 1),
(671, 117, 'Session : With trainer', 1, 1, 0.00, 1),
(672, 117, 'Monthly : With trainer', 1, 2, 0.00, 1),
(673, 117, 'Yearly : With trainer', 1, 3, 0.00, 1),
(674, 117, 'Session : Without trainer', 2, 1, 250.00, 1),
(675, 117, 'Monthly : Without trainer', 2, 2, 2500.00, 1),
(676, 117, 'Yearly : Without trainer', 2, 3, 12000.00, 1),
(677, 118, 'Session : With trainer', 1, 1, 0.00, 1),
(678, 118, 'Monthly : With trainer', 1, 2, 0.00, 1),
(679, 118, 'Yearly : With trainer', 1, 3, 0.00, 1),
(680, 118, 'Session : Without trainer', 2, 1, 250.00, 1),
(681, 118, 'Monthly : Without trainer', 2, 2, 2500.00, 1),
(682, 118, 'Yearly : Without trainer', 2, 3, 12000.00, 1),
(683, 119, 'Session : With trainer', 1, 1, 0.00, 1),
(684, 119, 'Monthly : With trainer', 1, 2, 0.00, 1),
(685, 119, 'Yearly : With trainer', 1, 3, 0.00, 1),
(686, 119, 'Session : Without trainer', 2, 1, 250.00, 1),
(687, 119, 'Monthly : Without trainer', 2, 2, 2500.00, 1),
(688, 119, 'Yearly : Without trainer', 2, 3, 25000.00, 1),
(689, 120, 'Session : With trainer', 1, 1, 0.00, 1),
(690, 120, 'Monthly : With trainer', 1, 2, 0.00, 1),
(691, 120, 'Yearly : With trainer', 1, 3, 0.00, 1),
(692, 120, 'Session : Without trainer', 2, 1, 100.00, 1),
(693, 120, 'Monthly : Without trainer', 2, 2, 400.00, 1),
(694, 120, 'Yearly : Without trainer', 2, 3, 4000.00, 1),
(695, 121, 'Session : With trainer', 1, 1, 0.00, 1),
(696, 121, 'Monthly : With trainer', 1, 2, 0.00, 1),
(697, 121, 'Yearly : With trainer', 1, 3, 0.00, 1),
(698, 121, 'Session : Without trainer', 2, 1, 150.00, 1),
(699, 121, 'Monthly : Without trainer', 2, 2, 650.00, 1),
(700, 121, 'Yearly : Without trainer', 2, 3, 6500.00, 1),
(701, 122, 'Session : With trainer', 1, 1, 100.00, 1),
(702, 122, 'Monthly : With trainer', 1, 2, 1000.00, 1),
(703, 122, 'Yearly : With trainer', 1, 3, 8000.00, 1),
(704, 122, 'Session : Without trainer', 2, 1, 100.00, 1),
(705, 122, 'Monthly : Without trainer', 2, 2, 800.00, 1),
(706, 122, 'Yearly : Without trainer', 2, 3, 7000.00, 1),
(713, 123, 'Session : With trainer', 1, 1, 100.00, 1),
(714, 123, 'Monthly : With trainer', 1, 2, 1500.00, 1),
(715, 123, 'Yearly : With trainer', 1, 3, 9999.00, 1),
(716, 123, 'Session : Without trainer', 2, 1, 100.00, 1),
(717, 123, 'Monthly : Without trainer', 2, 2, 1500.00, 1),
(718, 123, 'Yearly : Without trainer', 2, 3, 9999.00, 1),
(719, 124, 'Session : With trainer', 1, 1, 1000.00, 1),
(720, 124, 'Monthly : With trainer', 1, 2, 3000.00, 1),
(721, 124, 'Yearly : With trainer', 1, 3, 30000.00, 1),
(722, 124, 'Session : Without trainer', 2, 1, 300.00, 1),
(723, 124, 'Monthly : Without trainer', 2, 2, 1500.00, 1),
(724, 124, 'Yearly : Without trainer', 2, 3, 6999.00, 1),
(725, 125, 'Session : With trainer', 1, 1, 100.00, 1),
(726, 125, 'Monthly : With trainer', 1, 2, 1000.00, 1),
(727, 125, 'Yearly : With trainer', 1, 3, 10000.00, 1),
(728, 125, 'Session : Without trainer', 2, 1, 100.00, 1),
(729, 125, 'Monthly : Without trainer', 2, 2, 500.00, 1),
(730, 125, 'Yearly : Without trainer', 2, 3, 5999.00, 1),
(731, 126, 'Session : With trainer', 1, 1, 100.00, 1),
(732, 126, 'Monthly : With trainer', 1, 2, 1500.00, 1),
(733, 126, 'Yearly : With trainer', 1, 3, 12000.00, 1),
(734, 126, 'Session : Without trainer', 2, 1, 100.00, 1),
(735, 126, 'Monthly : Without trainer', 2, 2, 1000.00, 1),
(736, 126, 'Yearly : Without trainer', 2, 3, 7000.00, 1),
(737, 127, 'Session : With trainer', 1, 1, 300.00, 1),
(738, 127, 'Monthly : With trainer', 1, 2, 1000.00, 1),
(739, 127, 'Yearly : With trainer', 1, 3, 5000.00, 1),
(740, 127, 'Session : Without trainer', 2, 1, 300.00, 1),
(741, 127, 'Monthly : Without trainer', 2, 2, 1000.00, 1),
(742, 127, 'Yearly : Without trainer', 2, 3, 5000.00, 1),
(743, 128, 'Session : With trainer', 1, 1, 300.00, 1),
(744, 128, 'Monthly : With trainer', 1, 2, 800.00, 1),
(745, 128, 'Yearly : With trainer', 1, 3, 4000.00, 1),
(746, 128, 'Session : Without trainer', 2, 1, 300.00, 1),
(747, 128, 'Monthly : Without trainer', 2, 2, 800.00, 1),
(748, 128, 'Yearly : Without trainer', 2, 3, 4000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gym_payment_key`
--

CREATE TABLE `gym_payment_key` (
  `secret_key` varchar(250) DEFAULT NULL,
  `assKey` varchar(200) NOT NULL,
  `vanityUrl` varchar(250) DEFAULT NULL,
  `currency` varchar(25) DEFAULT NULL,
  `postUrl` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gym_payment_key`
--

INSERT INTO `gym_payment_key` (`secret_key`, `assKey`, `vanityUrl`, `currency`, `postUrl`) VALUES
('556e33423e971f6106d5e1c68fa3ffc468ad65eb', 'FYC7172O8WC3HZXOC2YZ', 'mwmb90c6c2', 'INR', 'https://checkout.citruspay.com/ssl/checkout/mwmb90c6c2');

-- --------------------------------------------------------

--
-- Table structure for table `gym_payment_master`
--

CREATE TABLE `gym_payment_master` (
  `cus_pay_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pak_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `price_id` int(11) DEFAULT NULL,
  `pak_name` varchar(200) DEFAULT NULL,
  `cat_name` varchar(200) DEFAULT NULL,
  `price` double(15,2) DEFAULT NULL,
  `pack_desc` varchar(200) DEFAULT NULL,
  `user_mobile` varchar(50) DEFAULT NULL,
  `user_email` varchar(150) DEFAULT NULL,
  `customer_name` varchar(150) DEFAULT NULL,
  `gender` varchar(10) NOT NULL DEFAULT 'Male',
  `trans_id` varchar(100) DEFAULT NULL,
  `res_trans_id` varchar(200) DEFAULT NULL,
  `res_ref_no` varchar(100) DEFAULT NULL,
  `res_auth_id` varchar(200) DEFAULT NULL,
  `res_price` double(15,2) DEFAULT NULL,
  `request` blob,
  `response` blob,
  `req_date` datetime DEFAULT NULL,
  `pay_result` varchar(100) DEFAULT NULL,
  `status` smallint(1) DEFAULT '0',
  `cancel_status` smallint(1) DEFAULT '0',
  `cancel_res_amount` double(15,2) DEFAULT NULL,
  `cancel_res_date` datetime DEFAULT NULL,
  `cancel_res_status` varchar(200) DEFAULT NULL,
  `cancel_res_transactionId` varchar(200) DEFAULT NULL,
  `cancel_res_merchantRefundTxId` varchar(200) DEFAULT NULL,
  `pay_offline` smallint(1) NOT NULL DEFAULT '0',
  `payed_offline_dt` datetime DEFAULT NULL,
  `physical_att` smallint(1) DEFAULT '0',
  `physical_att_dt` datetime DEFAULT NULL,
  `web_app_pay` smallint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gym_payment_master`
--

INSERT INTO `gym_payment_master` (`cus_pay_id`, `user_id`, `pak_id`, `cat_id`, `price_id`, `pak_name`, `cat_name`, `price`, `pack_desc`, `user_mobile`, `user_email`, `customer_name`, `gender`, `trans_id`, `res_trans_id`, `res_ref_no`, `res_auth_id`, `res_price`, `request`, `response`, `req_date`, `pay_result`, `status`, `cancel_status`, `cancel_res_amount`, `cancel_res_date`, `cancel_res_status`, `cancel_res_transactionId`, `cancel_res_merchantRefundTxId`, `pay_offline`, `payed_offline_dt`, `physical_att`, `physical_att_dt`, `web_app_pay`) VALUES
(1, 92, 63, 1, 197, 'Economy package sample', 'Economic', 29.00, 'Hourly package: With trainer', '2147483647', 'balasrain@gmail.com', NULL, 'Male', '58cbec1ee0d921489759262', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-17 02:01:02', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(2, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'balasrain@gmail.com', NULL, 'Male', '58ccc423a008f1489814563', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-18 05:22:43', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(3, 92, 63, 1, 197, 'Economy package sample', 'Economic', 29.00, 'Hourly package: With trainer', '2147483647', 'balasrain@gmail.com', NULL, 'Male', '58ccd22df36861489818157', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-18 06:22:37', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(4, 92, 63, 1, 197, 'Economy package sample', 'Economic', 29.00, 'Hourly package: With trainer', '2147483647', 'balasrain@gmail.com', NULL, 'Male', '58ccded4aa5a41489821396', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-18 07:16:36', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(5, 92, 63, 1, 197, 'Economy package sample', 'Economic', 29.00, 'Hourly package: With trainer', '2147483647', 'balasrain@gmail.com', NULL, 'Male', '58cf883cc2c1f1489995836', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-20 07:43:56', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(6, 92, 63, 1, 197, 'Economy package sample', 'Economic', 29.00, 'Hourly package: With trainer', '2147483647', 'bala@fma.com', NULL, 'Male', '58cf898316ea01489996163', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-20 07:49:23', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(7, 92, 63, 1, 197, 'Economy package sample', 'Economic', 29.00, 'Hourly package: With trainer', '2147483647', 'deepak.mohan1589@gmail.com', NULL, 'Male', '58cf8ec28cf5d1489997506', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-20 08:11:46', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(8, 92, 63, 1, 197, 'Economy package sample', 'Economic', 29.00, 'Hourly package: With trainer', '1234567890', 'balasrain@gmail.com', NULL, 'Male', '58d3762a7b5371490253354', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-23 07:15:54', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(9, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'balasrain@gmail.com', NULL, 'Male', '58d4e6563dee41490347606', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-24 09:26:46', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(10, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '1234567890', 'balasrain@gmail.com', NULL, 'Male', '58d4f0d81184c1490350296', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-24 10:11:36', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(11, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '1234567890', 'balasrain@gmail.com', NULL, 'Male', '58d4f22dac1da1490350637', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-24 10:17:17', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(12, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'balasrain@gmail.com', NULL, 'Male', '58d4f2b8004881490350775', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-24 10:19:35', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(13, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '1234567890', 'balasrain@gmail.com', NULL, 'Male', '58d4f2eed64381490350830', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-24 10:20:30', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(14, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'balasrain@gmail.com', NULL, 'Male', '58d4f336971831490350902', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-24 10:21:42', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(15, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'balasrain@gmail.com', NULL, 'Male', '58d4f3985b7571490351000', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-24 10:23:20', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(16, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'balasrain@gmail.com', NULL, 'Male', '58d4fba93eba01490353065', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-24 10:57:45', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(17, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'balasrain@gmail.com', NULL, 'Male', '58d4fc3350f631490353203', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-24 11:00:03', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(18, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'balasrain@gmail.com', NULL, 'Male', '58d4fd213b7741490353441', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-24 11:04:01', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(19, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'balasrain@gmail.com', NULL, 'Male', '58d4fd4e868591490353486', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-24 11:04:46', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(20, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'balasrain@gmail.com', NULL, 'Male', '58d4fdffeb37c1490353663', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-24 11:07:43', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(21, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'balasrain@gmail.com', NULL, 'Male', '58d9ebe7c705f1490676711', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-28 04:51:51', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(22, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'deepak.mohan1589@gmail.com', NULL, 'Male', '58da0fb8e5dc11490685880', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-28 07:24:40', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(23, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'deepak.mohan1589@gmail.com', NULL, 'Male', '58da101d1f4e61490685981', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-28 07:26:21', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(24, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'deepak.mohan1589@gmail.com', NULL, 'Male', '58dd016a0ebfe1490878826', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-30 01:00:26', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(25, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'balasrain@gmail.com', NULL, 'Male', '58dd01b544cb51490878901', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-30 01:01:41', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(26, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'balasrain@gmail.com', NULL, 'Male', '58dd038193e181490879361', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-30 01:09:21', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(27, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'balasrain@gmail.com', NULL, 'Male', '58ddfe41d6ba11490943553', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-31 06:59:13', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(28, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'balasrain@gmail.com', NULL, 'Male', '58ddfeb500dec1490943668', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-31 07:01:08', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(29, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'balasrain2@gmail.com', NULL, 'Male', '58ddfed5bd7e11490943701', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-31 07:01:41', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(30, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'balasrain2@gmail.com', NULL, 'Male', '58ddff15ae3d71490943765', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-31 07:02:45', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(31, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'bala@fma.com', NULL, 'Male', '58ddffe2680121490943970', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-31 07:06:10', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(32, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'balasrain@gmail.com', NULL, 'Male', '58de0824153431490946084', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-31 07:41:24', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(33, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'balasrain@gmail.com', NULL, 'Male', '58de08881354f1490946184', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-31 07:43:04', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(34, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'bala@fma.com', NULL, 'Male', '58de0950121eb1490946384', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-31 07:46:24', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(35, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'bala@fma.com', NULL, 'Male', '58de0a05944ed1490946565', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-31 07:49:25', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(36, 92, 63, 1, 197, 'Economy package sample', 'Economic', 29.00, 'Hourly package: With trainer', '2147483647', 'balasrain@gmail.com', NULL, 'Male', '58de0a8c7554b1490946700', '', '', NULL, 1.00, NULL, 0x31323263373963616433643962376434656334343265623465303232306166656662366265306533, '2017-03-31 07:51:40', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(37, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'balasrain@gmail.com', NULL, 'Male', '58de0b57900561490946903', '', '', NULL, 1.00, NULL, 0x34346164343362306261313537306562396333346230303461653064386234393039653466653865, '2017-03-31 07:55:03', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(38, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'balasrain@gmail.com', NULL, 'Male', '58de0c0a5ff691490947082', '', '', NULL, 1.00, NULL, 0x65396366643662633338643062316139366237306131343661376565313763613938373435646165, '2017-03-31 07:58:02', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(39, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'balasrain@gmail.com', 'balaS', 'Male', '58de0ed98c8711490947801', '', '', NULL, 1.00, NULL, 0x30656633393830386538353363656133373861323939666538306137386663653661313966326137, '2017-03-31 08:10:01', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(40, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '2147483647', 'bala@fma.com', 'asdfasdf', 'Male', '58de0f37a89121490947895', '', '', NULL, 1.00, NULL, 0x37656131306361626131323134363334343365346366363165633565376330346333626439316237, '2017-03-31 08:11:35', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(41, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '9750134440', 'balasrain2@gmail.com', 'balaS', 'Male', '58de0faa40b6a1490948010', '', '', NULL, 1.00, NULL, 0x34353438653937373339333638333335373263326538656162326434643138346565623836623134, '2017-03-31 08:13:30', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(42, 92, 64, 2, 205, 'Premimum sample', 'Premium', 12899.00, 'Yearly package: With trainer', '9750134440', 'balasrain@gmail.com', 'balasubramanian', 'Male', '58de1e85eee161490951813', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-31 09:16:53', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(43, 92, 64, 2, 205, 'Premimum sample', 'Premium', 12899.00, 'Yearly package: With trainer', '9750134440', 'balasrain@gmail.com', 'balasubramanian', 'Male', '58de1f453eeea1490952005', '1000000003885948', '031324', '120323', 1.00, NULL, 0x32326331303561376130643234326430656365386362633063373433366637323131633032633331, '2017-03-31 09:20:05', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(44, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'balaS', 'Male', '58de425d0928d1490960989', '', '', NULL, 1.00, NULL, 0x32636333306538333063373164646235373666306137393633623562353137376263386336633564, '2017-03-31 11:49:49', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(45, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '58e1e4ec262ff1491199212', '', '', NULL, 1.00, NULL, 0x30393365623835636566363064316665353931663363646537373662653037646334333139663536, '2017-04-03 06:00:12', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(46, 91, 66, 2, 215, 'Sample premimum', 'Premium', 99.00, 'Hourly package: With trainer', '9632587412', 'test@gmail.com', 'text', 'Male', '58e2efb3e80a41491267507', '', '', NULL, 1.00, NULL, 0x61393430323462623734313235653130656635306233613233316164333437663237666466323831, '2017-04-04 12:58:27', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(47, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '58e365a31d2501491297699', '', '', NULL, 1.00, NULL, 0x62366265383261336639633530353236643566663034366634303133306264326133353330303662, '2017-04-04 09:21:39', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(48, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '8939040408', 'Deepak@gmail.com', 'Deepak', 'Male', '58e5cdf8149481491455480', '', '', NULL, 1.00, NULL, 0x38316164343064643463363561613833303262613261656136326138393736633136343130613535, '2017-04-06 05:11:20', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(49, 104, 68, 1, 229, 'Economic General', 'Economic', 8000.00, 'Yearly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '58f71b7e0a1831492589438', '', '', NULL, 1.00, NULL, 0x30616435313633346563383035653332633031386431616433323064646333633735396633316633, '2017-04-19 08:10:38', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(50, 92, 63, 1, 202, 'Economy package sample', 'Economic', 1199.00, 'Yearly package: Without trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '58f72697d60e91492592279', '', '', NULL, 1199.00, NULL, 0x33386437643336363834643537303239626135353863336463616330643931616238383537393433, '2017-04-19 08:57:59', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(51, 91, 65, 1, 214, 'Economic Sample', 'Economic', 4455.00, 'Yearly package: Without trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '58f745c0deaba1492600256', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-19 11:10:56', 'SUCCESS', 1, 1, NULL, '2017-04-25 13:00:17', 'SUCCESS', NULL, NULL, 1, '2017-04-25 13:00:04', 0, NULL, 0),
(52, 92, 63, 1, 197, 'Economy package sample', 'Economic', 29.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '58f89aa6370fc1492687526', '', '', NULL, 29.00, NULL, 0x36623836316234613562633964623635366231363764383264303861356230323535656335623665, '2017-04-20 11:25:26', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(53, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '58f89b54b8a3f1492687700', '', '', NULL, 23.00, NULL, 0x63386332386539326631643963623164303561613732623263623330626165343838666334623662, '2017-04-20 11:28:20', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(54, 91, 65, 1, 210, 'Economic Sample', 'Economic', 133.00, 'Monthly package: With trainer', '9789398752', 'shababufriend@gmail.com', 'Sham', 'Male', '58f99a086e3891492752904', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-21 05:35:04', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(55, 91, 65, 1, 210, 'Economic Sample', 'Economic', 133.00, 'Monthly package: With trainer', '9789398752', 'shababufriend@gmail.com', 'Sham', 'Male', '58f99a503885b1492752976', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-21 05:36:16', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-04-21 08:10:02', 0, NULL, 0),
(56, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '58f9acdeadc301492757726', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-21 06:55:26', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(57, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '8939040408', 'deepak.mohan1589@gmail.com', 'Deepak M', 'Male', '58f9b8999598c1492760729', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-21 07:45:29', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-04-21 07:58:09', 0, NULL, 0),
(58, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '58f9b91d456ea1492760861', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-21 07:47:41', 'SUCCESS', 1, 1, NULL, '2017-04-25 12:39:22', 'SUCCESS', NULL, NULL, 1, '2017-04-25 12:38:42', 0, NULL, 0),
(59, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '8939040408', 'deepak@ozonemotors.in', 'Deepak M', 'Male', '58f9b946527851492760902', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-21 07:48:22', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-04-21 07:58:05', 0, NULL, 0),
(60, 105, 69, 1, 239, 'Core', 'Economic', 60.00, 'Hourly package: With trainer', '8939040408', 'deepak@ozonemotors.in', 'Deepak M', 'Male', '58f9bdef5a0021492762095', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-21 08:08:15', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-04-26 09:57:47', 0, NULL, 0),
(61, 105, 69, 1, 239, 'Core', 'Economic', 60.00, 'Hourly package: With trainer', '9566106865', 'reuben.abrahammat@gmail.com', 'Reuben', 'Male', '58fafb9fb706a1492843423', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-22 06:43:43', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-04-22 06:44:43', 0, NULL, 0),
(62, 91, 65, 1, 209, 'Economic Sample', 'Economic', 23.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '58fddc979411d1493032087', '', '', NULL, 23.00, NULL, 0x30303764633230653361666531386231363834653366356565386532363038313763353536393836, '2017-04-24 11:08:07', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(63, 91, 65, 1, 251, 'Economic Sample', 'Economic', 5.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '58fddf0fba81b1493032719', '1000000004156670', '036274', '419718', 5.00, NULL, 0x61356462353735346634663734666566653237633739316236666465613462643835653431346564, '2017-04-24 11:18:39', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(64, 91, 65, 1, 257, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'Ragu', 'Male', '58fde16e8c4af1493033326', 'CTX1704241129298634275', '', '', 2.00, NULL, 0x32363930623665363234353665333332313566616331393663666532393732623838353837336230, '2017-04-24 11:28:46', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(65, 91, 65, 1, 257, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'Ragu', 'Male', '58fde1ff51b491493033471', '', '', '', 2.00, NULL, 0x31626334333030663732633065623332343962653661363938303232643237303734613135656238, '2017-04-24 11:31:11', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(66, 91, 65, 1, 257, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '58ff1ef3d44c61493114611', '1000000004170661', '036420', '356363', 2.00, NULL, 0x61663130346237303933323934373936346639396131343032373633386137393833636463363762, '2017-04-25 10:03:31', 'SUCCESS', 1, 1, 2.00, '2017-04-25 12:55:56', 'Transaction successful', 'CTX1704251004261557477', 'CRX170425125555288714', 0, NULL, 0, NULL, 0),
(67, 91, 65, 1, 259, 'Economic Sample', 'Economic', 1133.00, 'Yearly package: With trainer', '8939040408', 'deepak@ozonemotors.in', 'Deepak', 'Male', '58ff209c9ca601493115036', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-25 10:10:36', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-04-25 10:19:10', 0, NULL, 0),
(68, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590033b73b9341493185463', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-26 05:44:23', 'SUCCESS', 1, 1, NULL, '2017-04-28 07:33:52', 'SUCCESS', NULL, NULL, 1, '2017-04-28 06:26:28', 1, '2017-04-28 00:00:00', 0),
(69, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590035c4d9fcc1493185988', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-26 05:53:08', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-04-28 07:51:35', 0, NULL, 0),
(70, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590036a4996b41493186212', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-26 05:56:52', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-04-28 07:51:45', 0, NULL, 0),
(71, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59003740c725a1493186368', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-26 05:59:28', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-04-28 07:52:00', 1, '2017-04-28 08:14:55', 0),
(72, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590037466fbc51493186374', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-26 05:59:34', 'SUCCESS', 1, 1, NULL, '2017-05-02 07:25:24', 'SUCCESS', NULL, NULL, 1, '2017-05-02 05:59:33', 0, NULL, 0),
(73, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59004d066531d1493191942', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-26 07:32:22', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(74, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59004d966a5b71493192086', '', '', '', 2.00, NULL, 0x31393964306633646332656262363930656335623762313334623439383539323638353338653231, '2017-04-26 07:34:46', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(75, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59004dd5eae651493192149', '', '', '', 2.00, NULL, 0x35376464643337663834626232663164393037303630623262663763366564363931386561363436, '2017-04-26 07:35:49', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(76, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59004e2491aa31493192228', '', '', '', 2.00, NULL, 0x38653334383532363761353163343030633032303935633963336536646162656565393631616362, '2017-04-26 07:37:08', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(77, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59004e8da82b61493192333', '', '', '', 2.00, NULL, 0x63663935303661333132343965656130333535336264373335646532626663316632303366396563, '2017-04-26 07:38:53', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(78, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59004feb3df5b1493192683', '', '', '', 2.00, NULL, 0x30623662646635633530383137643239333939646366646336393536376163343934323062313338, '2017-04-26 07:44:43', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(79, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590050aac211d1493192874', '', '', '', 2.00, NULL, 0x32336133353632303130663739383536633266653839626461643239393430396136643462633362, '2017-04-26 07:47:54', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(80, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5900514395d6c1493193027', '', '', '', 2.00, NULL, 0x62343036646664346164363337303431616238303731313438393435663238336666636563343836, '2017-04-26 07:50:27', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(81, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590051ffb0f541493193215', '', '', '', 2.00, NULL, 0x33316130653130633134623461653935383365393335363235623034373763633437633566616630, '2017-04-26 07:53:35', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(82, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'Ragu', 'Male', '5900536462dc01493193572', '', '', '', 2.00, NULL, 0x35313934613638336461376136343964303138396366653535396566313438396563623863323263, '2017-04-26 07:59:32', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(83, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590054358d2261493193781', '', '', '', 2.00, NULL, 0x65343134386161633765303862333537663730656364343733666437383964623661613934613465, '2017-04-26 08:03:01', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(84, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590056ada5e6f1493194413', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-26 08:13:33', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(85, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590056f10e20d1493194481', '', '', '', 2.00, NULL, 0x38343665323335343533353736303139336164303038333735333666303639363464663166383538, '2017-04-26 08:14:41', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(86, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain22322@gmail.com', 'bala', 'Male', '59005735627161493194549', '', '', '', 2.00, NULL, 0x65666330303562323033386537333833343762626366373066373861393864326264393137656365, '2017-04-26 08:15:49', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(87, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'Ragu', 'Male', '5900581ba75331493194779', '', '', '', 2.00, NULL, 0x62373464303834393339643536353164663430393862346337383532653761356635616632316265, '2017-04-26 08:19:39', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(88, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590066bb8808c1493198523', '', '', '', 2.00, NULL, 0x35353264383733373136386562396264653033356238326638376263353035383137383139366166, '2017-04-26 09:22:03', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(89, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'Ragu', 'Male', '5900675dd3f9a1493198685', '', '', '', 2.00, NULL, 0x65323139326363643331383830303436363834626566376132666362306437646662386234653565, '2017-04-26 09:24:45', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(90, 91, 65, 1, 265, 'Economic Sample', 'Economic', 1133.00, 'Yearly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590067ba824681493198778', '', '', '', 1133.00, NULL, 0x34626465353065613961393537333938376266663733666335353664636164313162396461616532, '2017-04-26 09:26:18', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(91, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'Ram Krish ragu', 'Male', '590067f9e24901493198841', '1000000004185173', '036551', '886052', 2.00, NULL, 0x33333535613539306662313330306138343830643437636566336235663230323563373434383035, '2017-04-26 09:27:21', 'SUCCESS', 1, 1, 2.00, '2017-04-26 12:36:01', 'Transaction successful', 'CTX1704260928155798210', 'CRX1704261236003078018', 0, NULL, 0, NULL, 0),
(92, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59006fc79dec21493200839', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-26 10:00:39', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(93, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'Ram Krish ragu', 'Male', '59006fd0d49341493200848', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-26 10:00:48', 'SUCCESS', 1, 1, NULL, '2017-05-02 11:21:40', 'SUCCESS', NULL, NULL, 1, '2017-05-02 05:54:55', 0, NULL, 0),
(94, 105, 69, 1, 239, 'Core', 'Economic', 60.00, 'Hourly package: With trainer', '9566106865', 'reuben.abrahammat@gmail.com', 'Reuben', 'Male', '590179335b0a81493268787', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-27 04:53:07', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(95, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5901a1c922c3f1493279177', '1000000004197907', '036700', '106393', 2.00, NULL, 0x33373630653430336237343430373634663036306265663139653632626266346335653966326138, '2017-04-27 07:46:17', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, '2017-04-27 00:00:00', 0),
(96, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5901a32035bda1493279520', '1000000004198016', '036702', '212379', 2.00, NULL, 0x64373465303039616338393664346333383231326336393537636333363233326564393738656665, '2017-04-27 07:52:00', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, '2017-04-27 00:00:00', 0),
(97, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5901a5b94a4851493280185', '1000000004198222', '036704', '421088', 2.00, NULL, 0x33353330663465393236613963653861353632633363613162343939383730653031623636656637, '2017-04-27 08:03:05', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, '2017-04-27 00:00:00', 0),
(98, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '8939040408', 'deepak.mohan1589@gmail.com', 'Deepak M', 'Male', '5901a99a0e76f1493281178', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-27 08:19:38', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(99, 91, 65, 1, 264, 'Economic Sample', 'Economic', 133.00, 'Monthly package: With trainer', '8939040408', 'deepak@ozonemotors.in', 'Deepak M', 'Male', '5901aa30ee7701493281328', '', '', '', 133.00, NULL, 0x34393865376466343136386636376232656263636334623565303936656665363963663434633561, '2017-04-27 08:22:08', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(100, 91, 65, 1, 265, 'Economic Sample', 'Economic', 1133.00, 'Yearly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5902d9587fc9f1493358936', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-28 05:55:36', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-05-02 05:51:55', 0, NULL, 0),
(101, 105, 69, 1, 243, 'Core', 'Economic', 1200.00, 'Monthly package: Without trainer', '9500090968', 'sai@fitnessoneclub.co.in', 'sai', 'Male', '590313e3b0bbd1493373923', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-28 10:05:23', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(102, 105, 69, 1, 243, 'Core', 'Economic', 1200.00, 'Monthly package: Without trainer', '9500090968', 'sai@fitnessoneclub.co.in', 'sai', 'Male', '590313fd06eed1493373949', '', '', '', 1200.00, NULL, 0x38326662396638303531643735373833373461323966663231373233393935623063653564623435, '2017-04-28 10:05:49', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(103, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '8939040408', 'deepak.mohan1589@gmail.com', 'Deepu', 'Male', '590747a873c7a1493649320', '023534225939361', '023534225939361', '490028903', 2.00, NULL, 0x65306265303636396235303635613632636633643365303635393261643833303163353764346539, '2017-05-01 02:35:20', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, '2017-05-04 06:53:07', 0),
(104, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '8939040408', 'deepak.mohan1589@gmail.com', 'Deepu', 'Male', '59074ac7901471493650119', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-01 02:48:39', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(105, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '8939040408', 'ozonemotorsindia@gmail.com', 'ask', 'Male', '59074bd0cf2c11493650384', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-01 02:53:04', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(106, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59080fc533e431493700549', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-02 04:49:09', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-05-02 05:50:08', 0, NULL, 0),
(107, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590848288d0a21493714984', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-02 08:49:44', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(108, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59085790eb66d1493718928', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-02 09:55:28', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(109, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590858a6628451493719206', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-02 10:00:06', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(110, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59085e7c1d3f71493720700', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-02 10:25:00', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(111, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59086060440a61493721184', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-02 10:33:04', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(112, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590861a6027501493721510', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-02 10:38:30', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(113, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59086f5cd29301493725020', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-02 11:37:00', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(114, 92, 63, 1, 197, 'Economy package sample', 'Economic', 29.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59087147cc6951493725511', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-02 11:45:11', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(115, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59087ead140c11493728941', '', '', '', 2.00, NULL, 0x34323664353863353838353335316130336635666339653464653164643433313463366330623438, '2017-05-02 12:42:21', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(116, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59088273b1d741493729907', '', '', '', 2.00, NULL, 0x66373866663361333662656665663462376236663838306637663565663436336236336563393037, '2017-05-02 12:58:27', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(117, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590883a08f23d1493730208', '', '', '', 2.00, NULL, 0x32353433326431383435626236626635343731623635613766626332313233383437616134633530, '2017-05-02 01:03:28', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(118, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590883fcd33d11493730300', '1000000004289940', '000001', '520145', 2.00, NULL, 0x37306533363663663466613038393636666465333861393963353535383366303762323333373361, '2017-05-02 01:05:00', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(119, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59088801c97bf1493731329', '', '', '', 2.00, NULL, 0x64383035386638623137323131323439373365373462366264383131356463633036666563653931, '2017-05-02 01:22:09', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(120, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590888c349fe61493731523', '', '', '', 2.00, NULL, 0x31326434623962306631633462313864326661353430663230323066333134646438663663383930, '2017-05-02 01:25:23', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(121, 91, 67, 1, 221, 'Cardio Program', 'Economic', 79.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59088a9734c3a1493731991', '', '', '', 79.00, NULL, 0x32656237396632636634663835333330333330366332363839613335313034616461323233666137, '2017-05-02 01:33:11', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(122, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5909d0db9e1781493815515', '', '', '', 2.00, NULL, 0x33373163666532653934626362326439643732663164353631393864643562633531306164346637, '2017-05-03 12:45:15', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(123, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '8939174777', 'san.siv85@gmail.com', 'Santhosh', 'Male', '590ac5fec1a521493878270', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-04 06:11:10', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-05-04 06:11:52', 0, NULL, 0),
(124, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590aeb6e0a6cd1493887854', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-04 08:50:54', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(125, 112, 72, 2, 281, 'Annual', 'Premium', 100.00, 'Hourly package: With trainer', '9566106865', 'reuben.abrahammat@gmail.com', 'Reuben', 'Male', '590b00f9d38451493893369', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-04 10:22:49', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-05-04 10:28:52', 0, NULL, 0),
(126, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590c08f091bcd1493960944', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 05:09:04', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(127, 91, 65, 1, 263, 'Economic Sample', 'Economic', 2.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590c0d77cfcd41493962103', '', '', '', 2.00, NULL, 0x64656530613234633365313538343730323935323431323062393530356537663464643238326165, '2017-05-05 05:28:23', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(128, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590c106a4f1f31493962858', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 05:40:58', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(129, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '939939933', 'balasrain@gmail.com', 'bala', 'Male', '590c13e68f06a1493963750', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 05:55:50', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(130, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '759995995', 'balasrain@gmail.com', 'bala', 'Male', '590c14984d9c71493963928', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 05:58:48', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(131, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '749949004', 'balasrain@gmail.com', 'bala', 'Male', '590c266fb04831493968495', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 07:14:55', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(132, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '88484444', 'balasrain@gmail.com', 'bala', 'Male', '590c26d0783e41493968592', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 07:16:32', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(133, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '45634634', 'adsfasdf', 'sdfadfs', 'Male', '590c272fd8a2e1493968687', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 07:18:07', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(134, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '345345345', 'balasrain@gmail.com', 'bala', 'Male', '590c278da4bb01493968781', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 07:19:41', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(135, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '345345345', 'balasrain@gmail.com', 'bala', 'Male', '590c2918f2e181493969176', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 07:26:16', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(136, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '34534253425', 'DSASDSA', 'aDSAsd', 'Male', '590c2ef9811c71493970681', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 07:51:21', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(137, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '23423534', 'ZXcxzc', 'zxcZCX', 'Male', '590c302f1c0d61493970991', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 07:56:31', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(138, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '4534654', 'erwgwert', 'sxcvzcvx', 'Male', '590c30d1bdbf31493971153', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 07:59:13', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(139, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', 'sfd', 'balasrain@fdgs', 'jghdfsgkjsdf', 'Male', '590c31ba5ee471493971386', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 08:03:06', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(140, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '34532453245', 'zxcvzxcv', 'ersdfasdf', 'Male', '590c320f3c70d1493971471', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 08:04:31', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(141, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '345345345', 'adsfadsf', 'dfsadfsad', 'Male', '590c335c504731493971804', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 08:10:04', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(142, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', 'sdgasdasd', 'asdasdf', 'bala', 'Male', '590c3ef9b745e1493974777', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 08:59:37', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(143, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '5674754', 'fdhdfh', 'vzxvzxcv', 'Male', '590c44aa722761493976234', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 09:23:54', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(144, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '654745', 'sdfgsdfg', 'gfkhglhdf', 'Male', '590c451d8ae7a1493976349', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 09:25:49', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(145, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', 'r332', 'xcvzx', 'xzcvzxv', 'Male', '590c457e3ea091493976446', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 09:27:26', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(146, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '34532452', 'adssfasdf', 'xzczXc', 'Male', '590c46268ee731493976614', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 09:30:14', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(147, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '33345325', 'zXczXC', 'zxcxzCZXc', 'Male', '590c46ad4997b1493976749', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 09:32:29', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(148, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '35345345', 'zxcvxcvxcv', 'czxczxc', 'Male', '590c472ccde1b1493976876', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 09:34:36', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(149, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '57567547', 'adfgsdfgdfg', 'asfafadsf', 'Male', '590c49d8d18161493977560', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 09:46:00', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(150, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '35342523', 'ZXcZXcZXc', 'cZcZ', 'Male', '590c4cb199b3b1493978289', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 09:58:09', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(151, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmial.com', 'bala', 'Male', '590c4e41453f91493978689', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 10:04:49', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1);
INSERT INTO `gym_payment_master` (`cus_pay_id`, `user_id`, `pak_id`, `cat_id`, `price_id`, `pak_name`, `cat_name`, `price`, `pack_desc`, `user_mobile`, `user_email`, `customer_name`, `gender`, `trans_id`, `res_trans_id`, `res_ref_no`, `res_auth_id`, `res_price`, `request`, `response`, `req_date`, `pay_result`, `status`, `cancel_status`, `cancel_res_amount`, `cancel_res_date`, `cancel_res_status`, `cancel_res_transactionId`, `cancel_res_merchantRefundTxId`, `pay_offline`, `payed_offline_dt`, `physical_att`, `physical_att_dt`, `web_app_pay`) VALUES
(152, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', 'zxcZXc', 'zxcZXC', 'zXcZXc', 'Male', '590c4f85d0ee31493979013', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 10:10:13', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(153, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '345353', 'zxcZC', 'zxCzcx', 'Male', '590c530eb0db81493979918', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 10:25:18', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(154, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '74948494', 'bala@gmail..com', 'bala', 'Male', '590c555b483c61493980507', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 10:35:07', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(155, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590c574f62e911493981007', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 10:43:27', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(156, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '345345345', 'balasrain@gmail.com', 'bala', 'Male', '590c58303d0491493981232', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 10:47:12', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(157, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '474884994', 'balasrain@gmail.com', 'bala', 'Male', '590c5a0f5ba871493981711', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 10:55:11', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(158, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '788478474', 'balasrain@gmail.com', 'bala', 'Male', '590c61adc22331493983661', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 11:27:41', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(159, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590c6303a52761493984003', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 11:33:23', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(160, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590c63f5781e01493984245', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 11:37:25', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(161, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590c65cf2a2131493984719', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 11:45:19', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(162, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '590c7da74e1371493990823', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-05 01:27:03', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(163, 91, 70, 1, 269, 'General Package', 'Economic', 25.00, 'Hourly package: With trainer', '9940452013', 'sarunkumar1406@gmail.com', 'arun', 'Male', '590d6c2c3442f1494051884', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-06 06:24:44', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-05-06 06:28:26', 0, NULL, 0),
(164, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5911626c40a861494311532', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-09 06:32:12', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(165, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59116360328ba1494311776', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-09 06:36:16', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(166, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '591167d1574de1494312913', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-09 06:55:13', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(167, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59117a30c4db91494317616', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-09 08:13:36', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(168, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59117f06adb221494318854', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-09 08:34:14', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(169, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59118a43800f51494321731', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-09 09:22:11', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(170, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59118a92807881494321810', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-09 09:23:30', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(171, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '93893933', 'balasrain@gmail.com', 'bala', 'Male', '59118b0ae69741494321930', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-09 09:25:30', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(172, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '83983084', 'balasrain@gmail.com', 'balasrain', 'Male', '59118bb8687c01494322104', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-09 09:28:24', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(173, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '93893839', 'balasrain@gmial.com', 'bala', 'Male', '59118bf7e443f1494322167', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-09 09:29:27', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(174, 104, 68, 1, 227, 'Economic General', 'Economic', 60.00, 'Hourly package: With trainer', '84648474', 'balasrain@gmail.com', 'balals', 'Male', '5911ac9d4183a1494330525', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-09 11:48:45', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(175, 91, 70, 1, 269, 'General Package', 'Economic', 25.00, 'Hourly package: With trainer', '9940452013', 'sarunkumar1406@gmail.com', 'arun', 'Male', '5912dddb712a21494408667', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-10 09:31:07', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(176, 104, 68, 1, 228, 'Economic General', 'Economic', 400.00, 'Monthly package: With trainer', '9789398752', 'shammuthubabu@gmail.com', 'Sham ', 'Male', '5912e4c013ddc1494410432', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-10 10:00:32', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(177, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '591542fb3176f1494565627', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-12 05:07:07', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(178, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '591544b1dfd5c1494566065', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-12 05:14:25', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(179, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5915471b779091494566683', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-12 05:24:43', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(180, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59154adeedf921494567646', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-12 05:40:46', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(181, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59154cc4ec69a1494568132', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-12 05:48:52', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(182, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59154f7b6be901494568827', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-12 06:00:27', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(183, 118, 85, 1, 371, 'General Package', 'Economic', 250.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '591ad6c0aa1fe1494931136', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-16 10:38:56', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(184, 118, 85, 1, 371, 'General Package', 'Economic', 250.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '591ad6e7117f71494931175', '', '', '', 250.00, NULL, 0x32386361393965343336353937353832643234346338346137626434396563633536303436376538, '2017-05-16 10:39:35', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(185, 91, 84, 2, 365, 'Sample Pre', 'Premium', 499.00, 'Session : With trainer', '9876542354', 'sample@test.com', 'sample', 'Male', '591ba7ea902a71494984682', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-17 01:31:22', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(186, 91, 84, 2, 365, 'Sample Pre', 'Premium', 499.00, 'Session : With trainer', '9876542354', 'sample@test.com', 'sample', 'Male', '591ba80637acb1494984710', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-17 01:31:50', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(187, 118, 85, 1, 371, 'General Package', 'Economic', 250.00, 'Session : With trainer', '8072852401', 'kalaiselvi990@gmail.com', 'kalaiselvi s', 'Male', '591bff085bc2b1495006984', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-17 07:43:04', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(188, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'zxcvzxvxzcvzcxvzcxv', 'Male', '591d9d2ba1bf61495113003', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-18 01:10:03', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(189, 118, 85, 1, 371, 'General Package', 'Economic', 250.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '591d9d91b90de1495113105', '', '', '', 250.00, NULL, 0x30323634303232343730653134616233326261616535333335343634656565366533633161613139, '2017-05-18 01:11:45', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(190, 118, 85, 1, 371, 'General Package', 'Economic', 250.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '591d9e9136ac31495113361', '', '', '', 250.00, NULL, 0x30326131613432656233356138653335366330343338353033333330343437633839616539353061, '2017-05-18 01:16:01', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(191, 118, 85, 1, 371, 'General Package', 'Economic', 250.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '591d9eea479c41495113450', '', '', '', 250.00, NULL, 0x32386639333737636333396366343830363837623338343261383166316537613032633331353134, '2017-05-18 01:17:30', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(192, 118, 85, 1, 371, 'General Package', 'Economic', 250.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '591d9f1d6eb821495113501', '', '', '', 250.00, NULL, 0x33326566353538313239326663613961353066343836316465643065356136616239666635613362, '2017-05-18 01:18:21', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(193, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '591d9f86384121495113606', '', '', '', 6.00, NULL, 0x30336538333731316438373261346534356466643965396139326332353361376532643530313163, '2017-05-18 01:20:06', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(194, 118, 85, 1, 371, 'General Package', 'Economic', 250.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '591da04bea15f1495113803', '', '', '', 250.00, NULL, 0x36343739633436323838333032336164626631366637626630393732333437366665633565383431, '2017-05-18 01:23:23', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(195, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5921b549217c51495381321', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-21 03:42:01', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(196, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '9789398752', 'shammuthubabu@gmail.com', 'Sham', 'Male', '59229a147dcb91495439892', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-22 07:58:12', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(197, 104, 97, 1, 479, 'General', 'Economic', 60.00, 'Session : With trainer', '7502872744', 'shambabufriend@gmail.com', 'sham', 'Male', '5922a1365f20a1495441718', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-22 08:28:38', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(198, 104, 97, 1, 479, 'General', 'Economic', 60.00, 'Session : With trainer', '7502872744', 'shambabufriend@gmail.com', 'sham', 'Male', '5922a14cd90631495441740', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-22 08:29:00', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(199, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'balas', 'Male', '5922bcb73a2821495448759', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-22 10:25:59', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(200, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '975014440', 'balasrain@gmail.com', 'bala', 'Male', '5922bdf3213361495449075', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-22 10:31:15', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(201, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'bsla@gmail.com', 'bla', 'Male', '5922c66d46d001495451245', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-22 11:07:25', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(202, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmial.com', 'bala', 'Male', '5922ca7f610821495452287', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-22 11:24:47', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(203, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5922cb350b0521495452469', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-22 11:27:49', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(204, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'Bala', 'Male', '5922d7a55a79c1495455653', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-22 12:20:53', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(205, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5922d8ad1fdcc1495455917', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-22 12:25:17', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(206, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmial.com', 'bala', 'Male', '5922d90ce90ba1495456012', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-22 12:26:52', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(207, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5922d9a23f3701495456162', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-22 12:29:22', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(208, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5922da1b5b7f11495456283', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-22 12:31:23', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(209, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5922da74307831495456372', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-22 12:32:52', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(210, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5922db13238e91495456531', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-22 12:35:31', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(211, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5922def46c2bc1495457524', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-22 12:52:04', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(212, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5927b7bcf16061495775164', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-26 05:06:04', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(213, 118, 85, 1, 503, 'General Package', 'Economic', 300.00, 'Session : With trainer', 'test', 'test', 'tets', 'Male', '5927ca78883421495779960', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-26 06:26:00', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(214, 91, 84, 2, 367, 'Sample Pre', 'Premium', 6000.00, 'Yearly : With trainer', '9876543210', 'test@tet.com', 'test', 'Male', '5927cd46960981495780678', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-26 06:37:58', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(215, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5929ba40233d01495906880', NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-27 05:41:20', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(216, 118, 85, 1, 503, 'General Package', 'Economic', 300.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '593132a2dbdef1496396450', '', '', '', 300.00, NULL, 0x30313431303534333135633963353737393863306664333836323966313031376661333639303862, '2017-06-02 09:40:50', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(217, 121, 96, 1, 476, 'General Package ', 'Economic', 60.00, 'Session : Without trainer', '1234567890', 'hvhjv@gmail.com', 'hjghvhg', 'Male', '5947bce9415d61497873641', '', '', '', 60.00, NULL, 0x39386164313965313166383764313864646463646330316234663766343665376333376338653030, '2017-06-19 12:00:41', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(218, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '1234567890', 'hjbjhb@gmail.com', 'nkjjb', 'Male', '5947bd4584de71497873733', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-19 12:02:13', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(219, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '1234567890', 'hjhjv', 'ghghf', 'Male', '5947c13b4ab981497874747', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-19 12:19:07', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(220, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5948daae377ac1497946798', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-20 08:19:58', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-06-20 10:01:40', 0, NULL, 0),
(221, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5948f0b30e3e31497952435', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-20 09:53:55', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(222, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5948f178df2a91497952632', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-20 09:57:12', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(223, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '594902023663f1497956866', '', '', '', 6.00, NULL, 0x34623035303533346330616637343537643865663661633535666537613738353235653933346665, '2017-06-20 11:07:46', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(224, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '594906106782c1497957904', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-20 11:25:04', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(225, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59492175796a91497964917', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-20 01:21:57', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(226, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59492a4e815d31497967182', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-20 01:59:42', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(227, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '1234567890', 'gfgfd', 'gjhghj', 'Male', '594b5552e51d61498109266', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-22 05:27:46', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(228, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '594b55bbe2ca21498109371', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-22 05:29:31', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(229, 121, 96, 1, 476, 'General Package ', 'Economic', 60.00, 'Session : Without trainer', '1234567890', 'ffffe@gmail.com', 'wdwff`', 'Male', '594b5608bee401498109448', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-22 05:30:48', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(230, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmial.com', 'bala', 'Male', '594caee10962d1498197729', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-23 06:02:09', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(231, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmial.com', 'bala', 'Male', '594caf02405ac1498197762', '', '', '', 6.00, NULL, 0x65636565316138393063346237663837653335633862316631663037303166323265333735366463, '2017-06-23 06:02:42', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(232, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balsrain@gmail.com', 'bala', 'Male', '594e11229e14d1498288418', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-24 07:13:38', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(233, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balsrain@gmail.com', 'bala', 'Male', '594e1686592321498289798', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-24 07:36:38', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(234, 121, 96, 1, 476, 'General Package ', 'Economic', 60.00, 'Session : Without trainer', '1234567890', 'se@gmail.com', 'se', 'Male', '594e852939c941498318121', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-24 03:28:41', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(235, 121, 96, 1, 476, 'General Package ', 'Economic', 60.00, 'Session : Without trainer', '1234567890', 'se@gmail.com', 'se', 'Male', '594e852a572751498318122', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-24 03:28:42', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(236, 121, 96, 1, 476, 'General Package ', 'Economic', 60.00, 'Session : Without trainer', '1234567890', 'ss@gmail.com', 'se', 'Male', '594e85c375f9a1498318275', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-24 03:31:15', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(237, 121, 96, 1, 476, 'General Package ', 'Economic', 60.00, 'Session : Without trainer', '1234567890', 'ss@gmail.com', 'se', 'Male', '594e85c56442d1498318277', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-24 03:31:17', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(238, 121, 96, 1, 476, 'General Package ', 'Economic', 60.00, 'Session : Without trainer', '1234567890', 's@gmail.com', 's', 'Male', '594e86d1dfb561498318545', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-24 03:35:45', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(239, 121, 96, 1, 476, 'General Package ', 'Economic', 60.00, 'Session : Without trainer', '1234567890', 's@gmail.com', 's', 'Male', '594e86d2d84df1498318546', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-24 03:35:46', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(240, 121, 96, 1, 476, 'General Package ', 'Economic', 60.00, 'Session : Without trainer', '1234567890', 's@gmail.com', 'ss', 'Male', '594e8743a8f4b1498318659', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-24 03:37:39', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(241, 121, 96, 1, 476, 'General Package ', 'Economic', 60.00, 'Session : Without trainer', '1234567890', 's@gmail.com', 'ss', 'Male', '594e8744ccd1a1498318660', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-24 03:37:40', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(242, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '1234567890', 'a@gmail.com', 'w', 'Male', '594e87a792b7e1498318759', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-24 03:39:19', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(243, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '1234567890', 'a@gmail.com', 'w', 'Male', '594e87a885a721498318760', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-24 03:39:20', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(244, 91, 78, 1, 333, 'Sample Pack', 'Economic', 34.00, 'Monthly : Without trainer', '1234567890', 'ss@gmail.com', 'ss', 'Male', '594e8811ead241498318865', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-24 03:41:05', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(245, 91, 78, 1, 333, 'Sample Pack', 'Economic', 34.00, 'Monthly : Without trainer', '1234567890', 'ss@gmail.com', 'ss', 'Male', '594e8812d49bf1498318866', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-24 03:41:06', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(246, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balsrain@gmail.com', 'bala', 'Male', '5951e7b5428f41498539957', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-27 05:05:57', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(247, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8056768082', 'Shyam@mail.com', 'Shyam', 'Male', '5953566d75a301498633837', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-28 07:10:37', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(248, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '1234567890', 'Shyam', 'Shyam', 'Male', '595364abae2571498637483', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-28 08:11:23', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(249, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '964956', 'Hshh', 'Ds', 'Male', '59536b0849ebe1498639112', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-28 08:38:32', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(250, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '964956', 'Hshh', 'Ds', 'Male', '59536b1cba1491498639132', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-28 08:38:52', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(251, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '964956', 'Hshh', 'Ds', 'Male', '59536b2a4e0b11498639146', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-28 08:39:06', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(252, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '6868', 'Njx', 'Bn', 'Male', '595389d229fc81498646994', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-28 10:49:54', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(253, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '9797', 'Vb', 'Vv', 'Male', '59538a48046441498647112', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-28 10:51:52', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(254, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '55858', 'Xxc', 'Dg', 'Male', '59538ccc08f191498647756', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-28 11:02:36', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(255, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '996', 'Bbb', 'Bbb', 'Male', '5953b607a93161498658311', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-28 01:58:31', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(256, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '123', 'Ss@gmail.com', 'Fff', 'Male', '5953b97e3dd2a1498659198', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-28 02:13:18', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(257, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '123456780', 'gg', 'gg', 'Male', '5953baff2802d1498659583', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-28 02:19:43', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(258, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '123456780', 'gg@gmail.com', 'gg', 'Male', '5953bb14aad171498659604', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-28 02:20:04', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(259, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '1233', 'ss@gmail.com', 'ss', 'Male', '5953bb553b2321498659669', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-28 02:21:09', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(260, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '123', 'njjndhj@gmail.com', 'nbhjdnh', 'Male', '5953bc44af3b21498659908', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-28 02:25:08', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(261, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '111', 'Ss@gmail.com', 'Ss', 'Male', '5953c016b25e41498660886', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-28 02:41:26', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(262, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '6985699', 'vjnb@ghvv.con', 'Ghb', 'Male', '5953c068676f21498660968', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-28 02:42:48', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(263, 91, 84, 2, 365, 'Sample Pre', 'Premium', 499.00, 'Session : With trainer', '9750134440', 'balasrain@gmial.com', 'bala', 'Male', '5954a536c9f861498719542', '', '', '', 499.00, NULL, 0x33373964663935616135613062353934353835666437313335306366623133353466663464303235, '2017-06-29 06:59:02', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(264, 91, 83, 1, 362, 'Econ-Sample', 'Economic', 2.00, 'Session : Without trainer', '9750134440', 'b', 'bala', 'Male', '5954e5f2597e01498736114', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-29 11:35:14', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(265, 91, 83, 1, 362, 'Econ-Sample', 'Economic', 2.00, 'Session : Without trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5954e60c5d2a11498736140', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-29 11:35:40', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(266, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '9750134440', 'balasrain@gmail.com', 'baba', 'Male', '5954e64c7fa561498736204', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-29 11:36:44', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(267, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5954e6e9132341498736361', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-29 11:39:21', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(268, 91, 84, 2, 368, 'Sample Pre', 'Premium', 56.00, 'Session : Without trainer', '325325234', 'assdf', 'sdfasdf', 'Male', '5954f9900791a1498741136', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-29 12:58:56', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(269, 91, 84, 2, 368, 'Sample Pre', 'Premium', 56.00, 'Session : Without trainer', '325325234', 'assdf@gmail.com', 'sdfasdf', 'Male', '5954f9af0eed41498741167', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-29 12:59:27', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(270, 91, 84, 2, 368, 'Sample Pre', 'Premium', 56.00, 'Session : Without trainer', '325325234', 'ass', 'sdfasdf', 'Male', '5954f9ccee08a1498741196', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-29 12:59:56', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(271, 91, 84, 2, 368, 'Sample Pre', 'Premium', 56.00, 'Session : Without trainer', '325325234', 'ass', 'sdfasdf', 'Male', '5954f9d1295721498741201', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-29 01:00:01', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(272, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '7502872744', 'shammuthubabu@gmail.com', 'Sham', 'Male', '595b5922d493d1499158818', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-04 09:00:18', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(273, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '595b8bddf118f1499171805', '', '', '', 6.00, NULL, 0x63333963373434303666653062386238386461303666353438653434623465633337396630613266, '2017-07-04 12:36:45', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(274, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '1234567890', 'xgfdf@gmail.com', 'ddddddddfg', 'Male', '595c8f3b18e681499238203', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-05 07:03:23', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(275, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '1234567890', 'ghfghf@gmail.com', 'vhv', 'Male', '595c8fa9e167b1499238313', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-05 07:05:13', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(276, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '1234567890', 'gghc@gmail.com', 'jkgj', 'Male', '595c8feee05861499238382', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-05 07:06:22', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(277, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '1234567890', 'gghc@gmail.com', 'jkgj', 'Male', '595c900313cdd1499238403', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-05 07:06:43', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(278, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '1234567890', 'gghc@gmail.com', 'jkgj', 'Male', '595c900fc76ad1499238415', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-05 07:06:55', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(279, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '1234567890', 'gghc@gmail.com', 'jkgj', 'Male', '595c902f7177a1499238447', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-05 07:07:27', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(280, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '1234567890', 'h@gmail.com', 'hjhj', 'Male', '595c9068f19d31499238504', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-05 07:08:24', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(281, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '1234567890', 'h@gmail.com', 'hjhjggg', 'Male', '595c9076bfb481499238518', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-05 07:08:38', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(282, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '1234567890', 'ss@gmail.com', 'Ss', 'Male', '595ce9a0db1181499261344', '', '', '', 60.00, NULL, 0x36666135303737613337613939336639383337336631306165663139363135376136393030636564, '2017-07-05 01:29:04', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(283, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '965952896', 'bdhj', 'Dhbb', 'Male', '595f89019d8d21499433217', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 01:13:37', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(284, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '965952896', 'bdhj', 'Dhbb', 'Male', '595f89049c7781499433220', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 01:13:40', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(285, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '965952896', 'bdhj', 'Dhbb', 'Male', '595f8908567031499433224', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 01:13:44', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(286, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '965952896', 'bdhj', 'Dhbb', 'Male', '595f890a6d4fe1499433226', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 01:13:46', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(287, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '965952896', 'bdhj', 'Dhbb', 'Male', '595f890d28a0e1499433229', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 01:13:49', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(288, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '965952896', 'bdhj', 'Dhbb', 'Male', '595f89135cb311499433235', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 01:13:55', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(289, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '965952896', 'bdhj', 'Dhbb', 'Male', '595f891b9dc531499433243', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 01:14:03', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(290, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '965952896', 'bdhj', 'Dhbb', 'Male', '595f891ef3c321499433246', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 01:14:06', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(291, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '965952896', 'bdhj', 'Dhbb', 'Male', '595f892554b241499433253', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 01:14:13', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(292, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '965952896', 'bdhj', 'Dhbb', 'Male', '595f892c3bd641499433260', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 01:14:20', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(293, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '965952896', 'bdhj', 'Dhbb', 'Male', '595f8937219ae1499433271', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 01:14:31', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(294, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'Hdhb', 'Male', '595f8b95be0131499433877', '', '', '', 60.00, NULL, 0x35363235613838336464333064373437663137386539333736383562396637633333666533383435, '2017-07-07 01:24:37', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(295, 91, 84, 2, 368, 'Sample Pre', 'Premium', 56.00, 'Session : Without trainer', '95598', 'bsfg', 'Bfgnn', 'Male', '595f8e6f87fe41499434607', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 01:36:47', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(296, 91, 84, 2, 368, 'Sample Pre', 'Premium', 56.00, 'Session : Without trainer', '965875', 'dgbb', 'Gkfg', 'Male', '595f8e7e648621499434622', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 01:37:02', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(297, 91, 84, 2, 368, 'Sample Pre', 'Premium', 56.00, 'Session : Without trainer', '965875', 'dgbb', 'Gkfg', 'Male', '595f8ea04e8471499434656', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 01:37:36', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(298, 91, 84, 2, 368, 'Sample Pre', 'Premium', 56.00, 'Session : Without trainer', '965875', 'dgbb', 'Gkfg', 'Male', '595f8ea5d06f51499434661', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 01:37:41', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(299, 91, 84, 2, 368, 'Sample Pre', 'Premium', 56.00, 'Session : Without trainer', '965875', 'dgbb', 'Gkfg', 'Male', '595f8eabbed101499434667', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 01:37:47', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(300, 91, 84, 2, 368, 'Sample Pre', 'Premium', 56.00, 'Session : Without trainer', '965875', 'dgbb', 'Gkfg', 'Male', '595f8eaf532cd1499434671', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 01:37:51', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(301, 91, 84, 2, 368, 'Sample Pre', 'Premium', 56.00, 'Session : Without trainer', '965875', 'dgbb', 'Gkfg', 'Male', '595f8eb41f19c1499434676', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 01:37:56', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(302, 91, 84, 2, 368, 'Sample Pre', 'Premium', 56.00, 'Session : Without trainer', '965875', 'balasrain@gmail.com', 'Gkfg', 'Male', '595f8ef715be81499434743', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 01:39:03', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(303, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '111111111', 'kjnjnjk', 'kjn', 'Male', '595f9350cca7d1499435856', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 01:57:36', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(304, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '111111111', 'kjnjnjk@gmail.com', 'kjn', 'Male', '595f9367d336c1499435879', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 01:57:59', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(305, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '8220131335', 'ss@gmail.com', 'sss', 'Male', '595f9d7125a671499438449', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 02:40:49', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(306, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '9797676', 'jzj', 'Twsg', 'Male', '595fa27c964a01499439740', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 03:02:20', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(307, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '9797676', 'jzj', 'Twsg', 'Male', '595fa27eb09df1499439742', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 03:02:22', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(308, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '9797676', 'jzj', 'Twsg', 'Male', '595fa280535411499439744', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 03:02:24', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(309, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '9797676', 'jzj', 'Twsg', 'Male', '595fa281c1cb51499439745', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 03:02:25', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(310, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '9797676', 'jzj', 'Twsg', 'Male', '595fa283185791499439747', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 03:02:27', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(311, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '9797676', 'jzj', 'Twsg', 'Male', '595fa288180671499439752', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 03:02:32', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(312, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '9797676', 'jzj', 'Twsg', 'Male', '595fa288d4f551499439752', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 03:02:32', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(313, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '9797676', 'jzj', 'Twsg', 'Male', '595fa28a3d14b1499439754', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 03:02:34', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(314, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '9797676', 'jzj', 'Twsg', 'Male', '595fa28c269d31499439756', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 03:02:36', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(315, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '6767', 'bshs', 'Bshs', 'Male', '595fa2eb4c0411499439851', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 03:04:11', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(316, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '6767', 'bshs', 'Bshs', 'Male', '595fa2ed5ca3f1499439853', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 03:04:13', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(317, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '6767', 'bshs', 'Bshs', 'Male', '595fa2f00fe301499439856', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 03:04:16', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(318, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '6767', 'bshs', 'Bshs', 'Male', '595fa2f4cfd901499439860', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 03:04:20', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(319, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '1222', 'dddddde', 'sd', 'Male', '595fbec76eeef1499446983', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 05:03:03', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(320, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '1222', 'dddddde', 'sd', 'Male', '595fbecc6d8b71499446988', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 05:03:08', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(321, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '1233456777', 'fgf@gmail.com', 'ggghfgh', 'Male', '595fc58bf3c2c1499448715', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 05:31:55', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(322, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '1233333333', 'gh@g.com', 'hjghg', 'Male', '595fc5b3822da1499448755', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 05:32:35', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1);
INSERT INTO `gym_payment_master` (`cus_pay_id`, `user_id`, `pak_id`, `cat_id`, `price_id`, `pak_name`, `cat_name`, `price`, `pack_desc`, `user_mobile`, `user_email`, `customer_name`, `gender`, `trans_id`, `res_trans_id`, `res_ref_no`, `res_auth_id`, `res_price`, `request`, `response`, `req_date`, `pay_result`, `status`, `cancel_status`, `cancel_res_amount`, `cancel_res_date`, `cancel_res_status`, `cancel_res_transactionId`, `cancel_res_merchantRefundTxId`, `pay_offline`, `payed_offline_dt`, `physical_att`, `physical_att_dt`, `web_app_pay`) VALUES
(323, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '1233333333', 'gh@g.com', 'hjghgaaa', 'Male', '595fc5c21b1801499448770', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 05:32:50', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(324, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '1233333333', 'gh@g.com', 'hjghgaaa', 'Male', '595fc5ce1cb111499448782', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 05:33:02', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(325, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'hjghj@g.com', 'hgh', 'Male', '595fc91fb40921499449631', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 05:47:11', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(326, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'hjghj@g.com', 'hgh', 'Male', '595fc92736aca1499449639', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 05:47:19', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(327, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'hkjh@g.com', 'jjkbhbh', 'Male', '595fca96ee4ed1499450006', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 05:53:26', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(328, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'hkjh@g.com', 'jjkbhbh', 'Male', '595fcac8928bc1499450056', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 05:54:16', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(329, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '9698422407', 'vg@g.com', 'jghhg', 'Male', '59606cd1227de1499491537', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-08 05:25:37', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(330, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '9698422407', 'vg@g.com', 'jghhg', 'Male', '59606ce7ca95e1499491559', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-08 05:25:59', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(331, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '9698422407', 'vg@g.com', 'jghhg', 'Male', '596079d7661801499494871', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-08 06:21:11', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(332, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '9698422407', 'vg@g.com', 'jghhg', 'Male', '596079fa611311499494906', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-08 06:21:46', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(333, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '9698422407', 'vg@g.com', 'jghhg', 'Male', '59607a015978a1499494913', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-08 06:21:53', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(334, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '9698422407', 'ss@g.c', 'sss', 'Male', '596082bfe017c1499497151', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-08 06:59:11', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(335, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'hsjsj@g', 'Hssh', 'Male', '596083f4eeac91499497460', '', '', '', 60.00, NULL, 0x37663962393433616530313237306333393163383232333737643464663232653464343534643266, '2017-07-08 07:04:20', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(336, 120, 88, 2, 389, 'Weight loss', 'Premium', 250.00, 'Session : With trainer', '8220131335', 'sss@g.com', 'Senthil', 'Male', '5960d4e3423f11499518179', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-08 12:49:39', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(337, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '596648b5b1a0a1499875509', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 04:05:09', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(338, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Female', '5966490190dea1499875585', '', '', '', 6.00, NULL, 0x32653331653032666535636137643135636532356332363530356262633032613232383862613062, '2017-07-12 04:06:25', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(339, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Female', '59664eb77aa611499877047', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 04:30:47', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(340, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Female', '59664f1b056f21499877147', '', '', '', 6.00, NULL, 0x64373961323662666166393964393662313466663838316139666530393262323661623337316362, '2017-07-12 04:32:27', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(341, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '9750134440', 'balasrain@gmial.com', 'bala', 'Male', '596658c64622f1499879622', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 05:13:42', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(342, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '9750134440', 'balasrain@gmial.com', 'bala', 'Male', '596658ca7ae0f1499879626', '', '', '', 60.00, NULL, 0x30313936653335343262323536646633653435306362323139633061346461376233386233636237, '2017-07-12 05:13:46', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(343, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmial.com', 'Raji', 'Female', '59665a695ee561499880041', '', '', '', 6.00, NULL, 0x66356634306639303961373239666534313839623364393364363539306532626334613766643038, '2017-07-12 05:20:41', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(344, 91, 83, 1, 360, 'Econ-Sample', 'Economic', 8.00, 'Monthly : With trainer', '9750134440', 'balasrain@gmial.com', 'Chandral', 'Female', '59665b88c5d7b1499880328', '', '', '', 8.00, NULL, 0x33346266653138313064663862303930636435353635616635346537313633636162326635623936, '2017-07-12 05:25:28', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(345, 91, 83, 1, 361, 'Econ-Sample', 'Economic', 600.00, 'Yearly : With trainer', '9750134440', 'balasrain@gmial.com', 'Chandral', 'Female', '59665ca573cd71499880613', '', '', '', 600.00, NULL, 0x31396130656330343639376638326437313862393764623732323261663232353730336437376235, '2017-07-12 05:30:13', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(346, 91, 83, 1, 361, 'Econ-Sample', 'Economic', 600.00, 'Yearly : With trainer', '9750134440', 'balasrain@gmial.com', 'Chandral', 'Female', '59665d36815261499880758', '', '', '', 600.00, NULL, 0x38323162646464343438343539353562393035396136373239356365306561376437343464633032, '2017-07-12 05:32:38', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(347, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmial.com', 'Chandral', 'Female', '59665d75ad8981499880821', '', '', '', 6.00, NULL, 0x32646134343665623739613830373738373761653166613464313037626437313866626630343930, '2017-07-12 05:33:41', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(348, 91, 83, 1, 363, 'Econ-Sample', 'Economic', 3.00, 'Monthly : Without trainer', '9750134440', 'balasrain@gmial.com', 'Chandral', 'Female', '59665f7e3fe331499881342', '', '', '', 3.00, NULL, 0x39323864363234383339613531356162383132303134356239626538353436356132306338613131, '2017-07-12 05:42:22', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(349, 91, 83, 1, 360, 'Econ-Sample', 'Economic', 8.00, 'Monthly : With trainer', '9750134440', 'balasrain@gmial.com', 'RAAAAAAAM', 'Male', '59666038c145a1499881528', '', '', '', 8.00, NULL, 0x38316339666134353631366231396332386631633335663062353538386238366634346632646432, '2017-07-12 05:45:28', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(350, 91, 84, 2, 370, 'Sample Pre', 'Premium', 67.00, 'Yearly : Without trainer', '9750134440', 'balasrain@gmial.com', 'RAAAAAAAM', 'Male', '596660747f0ba1499881588', '', '', '', 67.00, NULL, 0x39363037353161393862653230396435303866653030306266646361656236356562383866613230, '2017-07-12 05:46:28', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(351, 91, 83, 1, 362, 'Econ-Sample', 'Economic', 2.00, 'Session : Without trainer', '9750134440', 'balasrain@gmial.com', 'bala', 'Male', '5966610a0a7351499881738', '', '', '', 2.00, NULL, 0x64353530616661633135653438623538373935343438376432626437393163663166306664343535, '2017-07-12 05:48:58', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(352, 91, 83, 1, 364, 'Econ-Sample', 'Economic', 300.00, 'Yearly : Without trainer', '9750134440', 'balasrain@gmial.com', 'Chandral', 'Female', '5966616087f3d1499881824', '', '', '', 300.00, NULL, 0x65313134303030646663633338393131626265376639613861333234623162616662643533323330, '2017-07-12 05:50:24', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(353, 91, 83, 1, 362, 'Econ-Sample', 'Economic', 2.00, 'Session : Without trainer', '9750134440', 'balasrain@gmial.com', 'Chandral', 'Female', '596661b5e2ce21499881909', '', '', '', 2.00, NULL, 0x32306335393664363139613962386336356139323061663934323137646539333664663964336136, '2017-07-12 05:51:49', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(354, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmial.com', 'Chandral', 'Female', '59666213c42681499882003', '', '', '', 6.00, NULL, 0x31656437333934656431376334633861326663343863656235383564363465373861656635343333, '2017-07-12 05:53:23', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(355, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '9750134440', 'balasrain@gmial.com', 'Chandral', 'Female', '5966624f5422b1499882063', '', '', '', 60.00, NULL, 0x38633536366463613164373061376234623538616565646236643234653432313731646666373366, '2017-07-12 05:54:23', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(356, 91, 83, 1, 361, 'Econ-Sample', 'Economic', 600.00, 'Yearly : With trainer', '9750134440', 'balasrain@gmial.com', 'Chandral', 'Female', '596664bc48dc31499882684', '', '', '', 600.00, NULL, 0x65353033353636663330303964636237336335356333306337376132336131313064323431376665, '2017-07-12 06:04:44', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(357, 91, 83, 1, 360, 'Econ-Sample', 'Economic', 8.00, 'Monthly : With trainer', '9750134440', 'balasrain@gmial.com', 'Chandral', 'Female', '5966654a8e3551499882826', '', '', '', 8.00, NULL, 0x62616466353437373537353966666136323261646136373132613838316233656461383737346361, '2017-07-12 06:07:06', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(358, 91, 83, 1, 361, 'Econ-Sample', 'Economic', 600.00, 'Yearly : With trainer', '9750134440', 'balasrain@gmial.com', 'Chandral', 'Female', '5966657270b1e1499882866', '', '', '', 600.00, NULL, 0x34653337373632343939366666393961353932383639333533343835656465353934393135633639, '2017-07-12 06:07:46', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(359, 91, 83, 1, 361, 'Econ-Sample', 'Economic', 600.00, 'Yearly : With trainer', '9750134440', 'balasrain@gmail.com', 'Chandral', 'Female', '5966659ccc5611499882908', '', '', '', 600.00, NULL, 0x38383933333062623230633565396539613962326138313234653561666433333561313663303963, '2017-07-12 06:08:28', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(360, 91, 84, 2, 370, 'Sample Pre', 'Premium', 67.00, 'Yearly : Without trainer', '9750134440', 'balasrain@gmail.com', 'Chandral', 'Female', '5966676d2ae481499883373', '', '', '', 67.00, NULL, 0x33343337386661393364666538643462376338376562313561646335373337373266326665633133, '2017-07-12 06:16:13', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(361, 91, 83, 1, 360, 'Econ-Sample', 'Economic', 8.00, 'Monthly : With trainer', '9750134440', 'balasrain@gmail.com', 'Chandral', 'Male', '596667ae65ac31499883438', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 06:17:18', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(362, 91, 83, 1, 360, 'Econ-Sample', 'Economic', 8.00, 'Monthly : With trainer', '9750134440', 'balasrain@gmail.com', 'Chandral@', 'Female', '596669d13b60e1499883985', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 06:26:25', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(363, 91, 83, 1, 361, 'Econ-Sample', 'Economic', 600.00, 'Yearly : With trainer', '9750134440', 'balasrain@gmail.com', 'Chandral', 'Female', '59666ae32291c1499884259', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 06:30:59', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(364, 91, 83, 1, 362, 'Econ-Sample', 'Economic', 2.00, 'Session : Without trainer', '9750134440', 'balasrain@gmial.com', 'Chandral', 'Female', '59666b5d0900a1499884381', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 06:33:01', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(365, 91, 83, 1, 360, 'Econ-Sample', 'Economic', 8.00, 'Monthly : With trainer', '9750134440', 'balasrain@gmail.com', 'Chandral', 'Female', '59666bb5b3a271499884469', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 06:34:29', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(366, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'Chandral', 'Female', '59666ca121a351499884705', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 06:38:25', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(367, 117, 92, 1, 438, 'General Package', 'Economic', 1999.00, 'Monthly : With trainer', '9698422407', 'ss@g.c', 'sss', 'Male', '596871892ea0b1500017033', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 07:23:53', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(368, 117, 92, 1, 438, 'General Package', 'Economic', 1999.00, 'Monthly : With trainer', '9698422407', 'ss@g.c', 'sss', 'Male', '5968718f9c90c1500017039', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 07:23:59', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(369, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '9698422407', 'ss@g.c', 'sss', 'Male', '5968720120ed11500017153', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 07:25:53', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(370, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '9698422407', 'ss@g.c', 'sss', 'Male', '596872464a4df1500017222', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 07:27:02', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(371, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '9698422407', 'ss@g.c', 'sss', 'Male', '596872474d99a1500017223', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 07:27:03', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(372, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '9698422407', 'ss@gmail.com', 'sss', 'Male', '5968725690f431500017238', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 07:27:18', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(373, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8680996597', 'gsg@hch.com', 'Dksa', 'Male', '596884a4bef091500021924', '', '', '', 60.00, NULL, 0x36656534336230643832613930323763346362633433626635386634316162616665346333313034, '2017-07-14 08:45:24', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(374, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8680996597', 'gsg@hch.com', 'Dksa', 'Male', '596884ea9831f1500021994', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 08:46:34', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(375, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8680996597', 'gsg@hch.com', 'Dksa', 'Male', '596884ef91d081500021999', '', '', '', 60.00, NULL, 0x38396133303963316438663735656661666362363162613933353031623537376261636263613365, '2017-07-14 08:46:39', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(376, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8680996597', 'gsg@hch.com', 'Dksa', 'Male', '5968856c6b4821500022124', '', '', '', 60.00, NULL, 0x66356534623766623763643839303637333265366235306637356663316235613239356437343366, '2017-07-14 08:48:44', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(377, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8680996597', 'gsg@hch.com', 'Dksa', 'Male', '596885a67a0241500022182', '', '', '', 60.00, NULL, 0x32643230636363343031343430363862326562333239663037356138363431643130303539333433, '2017-07-14 08:49:42', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(378, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8680996597', 'gsg@hch.com', 'Dksa', 'Male', '5968861450f171500022292', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 08:51:32', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(379, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8680996597', 'gsg@hch.com', 'Dksa', 'Male', '59688642582ee1500022338', '', '', '', 60.00, NULL, 0x63643962633934613730333063626437306133616363346232626630346339353936313261653438, '2017-07-14 08:52:18', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(380, 91, 84, 2, 365, 'Sample Pre', 'Premium', 499.00, 'Session : With trainer', '8680996597', 'gsg@hch.com', 'Dksa', 'Male', '59688c88e3fe31500023944', '', '', '', 499.00, NULL, 0x39666131616439346463366666353361333733316234303562643364353562313533363039656433, '2017-07-14 09:19:04', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(381, 91, 84, 2, 365, 'Sample Pre', 'Premium', 499.00, 'Session : With trainer', '8680996597', 'gsg@hch.com', 'Dksa', 'Male', '59688de7cfc1d1500024295', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 09:24:55', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(382, 91, 84, 2, 365, 'Sample Pre', 'Premium', 499.00, 'Session : With trainer', '8680996597', 'gsg@hch.com', 'Dksa', 'Male', '59688e13bd3391500024339', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 09:25:39', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(383, 91, 84, 2, 365, 'Sample Pre', 'Premium', 499.00, 'Session : With trainer', '8680996597', 'gsg@hch.com', 'Dksa', 'Male', '59688e2449d8a1500024356', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 09:25:56', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(384, 91, 84, 2, 365, 'Sample Pre', 'Premium', 499.00, 'Session : With trainer', '8680996597', 'gsg@hch.com', 'Dksa', 'Male', '59688e2f53c971500024367', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 09:26:07', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(385, 91, 84, 2, 365, 'Sample Pre', 'Premium', 499.00, 'Session : With trainer', '8680996597', 'gsg@hch.com', 'Dksa', 'Male', '59688e3f95ec51500024383', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 09:26:23', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(386, 91, 84, 2, 365, 'Sample Pre', 'Premium', 499.00, 'Session : With trainer', '8680996597', 'gsg@hch.com', 'Dksa', 'Male', '59688e49e588f1500024393', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 09:26:33', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(387, 91, 84, 2, 365, 'Sample Pre', 'Premium', 499.00, 'Session : With trainer', '8680996597', 'gsg@hch.com', 'Dksa', 'Male', '59688e5dc6ede1500024413', '', '', '', 499.00, NULL, 0x34383036663238623163616636646261333866353733666136666661383830663462383531353161, '2017-07-14 09:26:53', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(388, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8680996597', 'gsg@hch.com', 'Dksa', 'Male', '596891f1650731500025329', '', '', '', 60.00, NULL, 0x38313631366237613665626265323439383231343032363962373764636231643665633030333635, '2017-07-14 09:42:09', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(389, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8680996597', 'gsg@hch.com', 'Dksa', 'Male', '5968922ca1d2b1500025388', '', '', '', 60.00, NULL, 0x39323362303832663262626231663632326661646637306132373963616436333066363936643230, '2017-07-14 09:43:08', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(390, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5968f0698345c1500049513', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 04:25:13', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(391, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5968f364387ae1500050276', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 04:37:56', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(392, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5968f390106081500050320', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 04:38:40', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(393, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'male', '5968f4645f7b41500050532', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 04:42:12', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(394, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Female', '5968f48065b561500050560', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 04:42:40', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(395, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Female', '5968f695230811500051093', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 04:51:33', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(396, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'ss', 'Male', '596c5f2029bde1500274464', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 06:54:24', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(397, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'Sss', 'Male', '596c620694d391500275206', '', '', '', 60.00, NULL, 0x66303733663464303861393730383966396361653462353031656339323937346533313339626266, '2017-07-17 07:06:46', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(398, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'Sss', 'Male', '596c62236a5b01500275235', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 07:07:15', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(399, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'Sss', 'Male', '596c68f9be2651500276985', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 07:36:25', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(400, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'Sss', 'Male', '596c69096a9be1500277001', '', '', '', 60.00, NULL, 0x39373665616531636437626439343936366431306466623561633135653830333632326663303764, '2017-07-17 07:36:41', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(401, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'ss', 'Male', '596c6c1669fae1500277782', '', '', '', 60.00, NULL, 0x32633364613137386464393234393864616631626531306334306266623138653965316365303235, '2017-07-17 07:49:42', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(402, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8680996597', 'gsg@hch.com', 'Dksa', 'Male', '596c88cdef6541500285133', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 09:52:13', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(403, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8680996597', 'gsg@hch.com', 'Dksa', 'Male', '596c88d71c6b51500285143', '', '', '', 60.00, NULL, 0x64323437633030636330343961353533666230356533346134646630646562313731363338303031, '2017-07-17 09:52:23', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(404, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8680996597', 'gsg@hch.com', 'Dksa', 'Male', '596c88fdb522c1500285181', '', '', '', 60.00, NULL, 0x39643062306234353063346538653061636330316165663964396163653464393832366233383261, '2017-07-17 09:53:01', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(405, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8680996597', 'gsg@hch.com', 'Dksa', 'Male', '596c896970e9f1500285289', '', '', '', 60.00, NULL, 0x63643837313763643663353531313566663038393030626466653936366235306535383164323431, '2017-07-17 09:54:49', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(406, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '596c8a494f6771500285513', '', '', '', 6.00, NULL, 0x38313136316438623535323863383133663233633838353561666165323765386130653036373963, '2017-07-17 09:58:33', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(407, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'ss', 'Male', '596cabafaa37d1500294063', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 12:21:03', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(408, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'ss', 'Male', '596cac2d675311500294189', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 12:23:09', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(409, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'ss', 'Male', '596cae43ec5bd1500294723', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 12:32:03', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(410, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'ss', 'Male', '596cae5605f721500294742', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 12:32:22', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(411, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '8220131335', 'ss@gmail.com', 'ss', 'Male', '596cae80e59f31500294784', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 12:33:04', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(412, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'ss', 'Male', '596caebf216441500294847', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 12:34:07', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(413, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'ss', 'Male', '596caf18ea5831500294936', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 12:35:36', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(414, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'ss', 'Male', '596caf514ebae1500294993', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 12:36:33', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(415, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'ss', 'Male', '596caf8f90b791500295055', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 12:37:35', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(416, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'ss', 'Male', '596caf999bf191500295065', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 12:37:45', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(417, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'ss', 'Male', '596cafea3771e1500295146', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 12:39:06', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(418, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'ss', 'Male', '596cb03a63eb31500295226', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 12:40:26', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(419, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'ss', 'Male', '596cb0660c4681500295270', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 12:41:10', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(420, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'ss', 'Male', '596cb08fb29081500295311', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 12:41:51', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(421, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'ss', 'Male', '596cb0b86d2031500295352', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 12:42:32', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(422, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'ss', 'Male', '596cb0c531ec51500295365', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 12:42:45', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(423, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'ss', 'Male', '596cb0ef796711500295407', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 12:43:27', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(424, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'ss', 'Male', '596cb1281c8461500295464', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 12:44:24', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(425, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'ss', 'Male', '596cb14e4f31d1500295502', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 12:45:02', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(426, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'ss', 'Male', '596cb172515a11500295538', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 12:45:38', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(427, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'ss', 'Male', '596cb210bdacf1500295696', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 12:48:16', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(428, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'ss', 'Male', '596cb268357791500295784', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 12:49:44', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(429, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@gmail.com', 'ss', 'Male', '596cb2d2db88e1500295890', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 12:51:30', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(430, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '8939040408', 'deepak.mohan1589@gmail.com', 'Deepak', 'Male', '596d0023467b41500315683', '', '', '', 6.00, NULL, 0x31323866616561666333636231326130393831313839653632323535356263633431343431356135, '2017-07-17 06:21:23', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(431, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8056768082', 'fhhg@mail.com', 'Test', 'Male', '596de3637b6e61500373859', '', '', '', 60.00, NULL, 0x36393936636533396539613534396363353531313263646238663066656162643331363136323565, '2017-07-18 10:30:59', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(432, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8056768082', 'fhhg@mail.com', 'Test', 'Male', '596de3a9c4b161500373929', '', '', '', 60.00, NULL, 0x64623336646333336431613165366133623738616232633964636366636331643862393064633136, '2017-07-18 10:32:09', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(433, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '596f22c7678bc1500455623', 'pay_8GbEH0JhOpd7Mp', NULL, NULL, NULL, NULL, NULL, '2017-07-19 09:13:43', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(434, 91, 84, 2, 367, 'Sample Pre', 'Premium', 6000.00, 'Yearly : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '596f232c1824d1500455724', 'pay_8GbG0SjJ2fM8Rj', NULL, NULL, NULL, NULL, NULL, '2017-07-19 09:15:24', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(435, 91, 83, 1, 364, 'Econ-Sample', 'Economic', 300.00, 'Yearly : Without trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '596f237b5df961500455803', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-19 09:16:43', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(436, 91, 83, 1, 364, 'Econ-Sample', 'Economic', 300.00, 'Yearly : Without trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '596f45298da9f1500464425', 'pay_8GdjDm0Bm1AGK9', NULL, NULL, NULL, NULL, NULL, '2017-07-19 11:40:25', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(437, 135, 105, 1, 545, 'General', 'Economic', 345.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Female', '596f61fdab3b01500471805', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-19 01:43:25', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(438, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Female', '596f622a1ac3d1500471850', 'AAAAAAAAAAAAA', NULL, NULL, NULL, NULL, NULL, '2017-07-19 01:44:10', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(439, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8870103196', 'kk@kk.com', 'Dilip ', 'Male', '59703b3e4d98a1500527422', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 05:10:22', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(440, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8870103196', 'kk@kk.com', 'Dilip ', 'Male', '59703b480c1931500527432', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 05:10:32', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(441, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8870103196', 'kk@kk.com', 'dilip', 'Male', '597045711b7871500530033', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 05:53:53', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(442, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8870103196', 'kk@kk.com', 'dilip', 'Male', '597068472f5ae1500538951', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 08:22:31', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(443, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '8870103196', 'kk@kk.com', 'Dilip ', 'Male', '59708dbfd9eb01500548543', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 11:02:23', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(444, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '8870103196', 'kk@kk.com', 'Dilip ', 'Male', '59708e3ceabfb1500548668', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 11:04:28', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(445, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '8870103196', 'kk@kk.com', 'Dilip ', 'Male', '5970937fea5021500550015', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 11:26:55', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(446, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5970942c99eb01500550188', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 11:29:48', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(447, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '8870103196', 'kk@kk.com', 'Dilip ', 'Male', '59709c3e6aa831500552254', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 12:04:14', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(448, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '59709d8d4b6821500552589', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 12:09:49', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(449, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5970a0396e4fa1500553273', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 12:21:13', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(450, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5970a226752b61500553766', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 12:29:26', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(451, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5970a488a9efd1500554376', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 12:39:36', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(452, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5970a609b40621500554761', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 12:46:01', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(453, 118, 85, 1, 504, 'General Package', 'Economic', 1999.00, 'Monthly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5970a84d1807e1500555341', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 12:55:41', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(454, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5970a8f652a8f1500555510', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 12:58:30', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(455, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5970aa6348c6c1500555875', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 01:04:35', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(456, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5970ad03bf63b1500556547', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 01:15:47', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(457, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5970b2bae104f1500558010', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 01:40:10', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(458, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5970b378425031500558200', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 01:43:20', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(459, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5970b4785bb4a1500558456', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 01:47:36', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(460, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '59718fcc53cc21500614604', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 05:23:24', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(461, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '597190e9d8fef1500614889', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 05:28:09', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(462, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '597193b4112fe1500615604', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 05:40:04', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(463, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '59719c6b5567c1500617835', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 06:17:15', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(464, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '59719d6e9e8cc1500618094', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 06:21:34', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(465, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '59719dde602031500618206', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 06:23:26', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(466, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5971a16e63d2e1500619118', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 06:38:38', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(467, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5971a2131e7131500619283', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 06:41:23', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(468, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5971a4eb37e3f1500620011', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 06:53:31', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(469, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5971a5ae691f71500620206', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 06:56:46', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(470, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5971a78e7c48c1500620686', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 07:04:46', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(471, 91, 78, 1, 334, 'Sample Pack', 'Economic', 1000.00, 'Yearly : Without trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5971a879a0e201500620921', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 07:08:41', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(472, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5971a941cbb601500621121', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 07:12:01', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(473, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5971aa35a37c41500621365', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 07:16:05', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(474, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5971b2686817e1500623464', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 07:51:04', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(475, 91, 78, 1, 333, 'Sample Pack', 'Economic', 34.00, 'Monthly : Without trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5971b339367fd1500623673', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 07:54:33', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(476, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5971b690af2ca1500624528', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 08:08:48', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(477, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5971b7c6d13bf1500624838', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 08:13:58', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(478, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5971e06e02c8a1500635246', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 11:07:26', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(479, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5971e51e6d40b1500636446', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 11:27:26', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(480, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5971e6b64f9f81500636854', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 11:34:14', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(481, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5971e721c33a81500636961', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 11:36:01', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(482, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8870103196', 'kk@kk.com', 'dilip', 'Male', '5971ea6c3b0ea1500637804', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 11:50:04', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(483, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '1234567890', 'dsd@gail.com', 'wddd', 'Male', '5971eb8617d311500638086', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 11:54:46', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(484, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '1234567890', 'dff@gmail.com', 'fefdf', 'Male', '5971ecd1637281500638417', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 12:00:17', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(485, 117, 92, 1, 439, 'General Package', 'Economic', 9999.00, 'Yearly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5971ee9788a961500638871', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 12:07:51', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1);
INSERT INTO `gym_payment_master` (`cus_pay_id`, `user_id`, `pak_id`, `cat_id`, `price_id`, `pak_name`, `cat_name`, `price`, `pack_desc`, `user_mobile`, `user_email`, `customer_name`, `gender`, `trans_id`, `res_trans_id`, `res_ref_no`, `res_auth_id`, `res_price`, `request`, `response`, `req_date`, `pay_result`, `status`, `cancel_status`, `cancel_res_amount`, `cancel_res_date`, `cancel_res_status`, `cancel_res_transactionId`, `cancel_res_merchantRefundTxId`, `pay_offline`, `payed_offline_dt`, `physical_att`, `physical_att_dt`, `web_app_pay`) VALUES
(486, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5971efce6e5db1500639182', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 12:13:02', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(487, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '8870103196', 'kk@kk.com', 'dilip', 'Male', '5971f0cbe7dab1500639435', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 12:17:15', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(488, 117, 92, 1, 438, 'General Package', 'Economic', 1999.00, 'Monthly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5971f14c272cf1500639564', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 12:19:24', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(489, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '8870103196', 'kk@kk.com', 'dilip', 'Male', '5971f24c8d12d1500639820', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 12:23:40', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(490, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '1234567890', 'dsd@gail.com', 'wddd', 'Male', '5971f30cd654a1500640012', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 12:26:52', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(491, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5971f3e472b7d1500640228', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-21 12:30:28', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(492, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5971f4a8eb23c1500640424', 'pay_8HReDaLfvXHPV7', NULL, NULL, NULL, NULL, NULL, '2017-07-21 12:33:44', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(493, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5971fd29ce1b71500642601', 'pay_8HRhfX1N0xBKYA', NULL, NULL, NULL, NULL, NULL, '2017-07-21 01:10:01', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(494, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5971fe6a454cc1500642922', 'pay_8HSK0jjdXrdTIM', NULL, NULL, NULL, NULL, NULL, '2017-07-21 01:15:22', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(495, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '9876543210', 'dilip@kk.com', 'dilip', 'Male', '5972019dee07d1500643741', 'pay_8HSPocfrJ6UVZS', NULL, NULL, NULL, NULL, NULL, '2017-07-21 01:29:01', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(496, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '8870103196', 'dilip@kk.com', 'dilip', 'Male', '597202a137ee01500644001', 'pay_8HSk4yCs2EtWJg', NULL, NULL, NULL, NULL, NULL, '2017-07-21 01:33:21', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(497, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '9976543210', 'kk@kk.com', 'dilip', 'Male', '5972db979554e1500699543', 'pay_8HSe94XFhZNb2B', NULL, NULL, NULL, NULL, NULL, '2017-07-22 04:59:03', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(498, 91, 78, 1, 333, 'Sample Pack', 'Economic', 34.00, 'Monthly : Without trainer', '9876543210', 'kk@kk.com', 'kk', 'Male', '5972dd47559f21500699975', 'pay_8HiUWEeizPRdU1', NULL, NULL, NULL, NULL, NULL, '2017-07-22 05:06:15', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(499, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '9876543210', 'kk@kk.com', 'dilip ', 'Male', '5972dfd3e59b61500700627', 'pay_8Hic5ZJ0BjNQ5Y', NULL, NULL, NULL, NULL, NULL, '2017-07-22 05:17:07', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(500, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5972e253500c61500701267', 'pay_8HinbGQB0vLbLZ', NULL, NULL, NULL, NULL, NULL, '2017-07-22 05:27:47', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(501, 117, 92, 1, 439, 'General Package', 'Economic', 9999.00, 'Yearly : With trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5972f221ee1c21500705313', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 06:35:13', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(502, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '9876543210', 'kk@kk.com', 'kk', 'Male', '5972f4e59b54d1500706021', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 06:47:01', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(503, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '9987654321', 'kk@kk.com', 'dilip', 'Male', '5972f6e03a7511500706528', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 06:55:28', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(504, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '9876543210', 'kk@kk.com', 'dili', 'Male', '5972f8caa8a881500707018', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 07:03:38', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(505, 91, 78, 1, 334, 'Sample Pack', 'Economic', 1000.00, 'Yearly : Without trainer', '9876543210', 'kk@kk.com', 'dilip', 'Male', '5972f95d27c941500707165', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 07:06:05', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(506, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '8897654321', 'kk@Kk.com', 'dilip', 'Male', '5972fad6b7a1f1500707542', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 07:12:22', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(507, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '9876543210', 'kk@k.com', 'kk', 'Male', '5972fc1a77aa41500707866', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 07:17:46', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(508, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '9876543210', 'kk@k.com', 'kk', 'Male', '5973040eb959e1500709902', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 07:51:42', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(509, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '9876543210', 'kk@k.com', 'kk', 'Male', '59730424e38241500709924', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 07:52:04', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(510, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '9876543210', 'kk@k.com', 'kk', 'Male', '597304dbf22eb1500710107', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 07:55:07', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(511, 117, 92, 1, 439, 'General Package', 'Economic', 9999.00, 'Yearly : With trainer', '9876543210', 'kk@k.com', 'kk', 'Male', '59730ca39c3991500712099', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 08:28:19', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(512, 117, 92, 1, 439, 'General Package', 'Economic', 9999.00, 'Yearly : With trainer', '9876543210', 'kk@k.com', 'kk', 'Male', '597324c327e111500718275', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 10:11:15', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(513, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '9876543210', 'kk@k.com', 'kk', 'Male', '59732777861491500718967', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 10:22:47', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(514, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '9876543210', 'kk@k.com', 'kk', 'Male', '59732b5fab5301500719967', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 10:39:27', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(515, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '9876543210', 'kk@k.com', 'kk', 'Male', '59732ba600aba1500720037', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 10:40:37', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(516, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '9876543210', 'kk@k.com', 'kk', 'Male', '59732c993f4e21500720281', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 10:44:41', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(517, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '9876543210', 'kk@k.com', 'kk', 'Male', '59732d4f3f8611500720463', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 10:47:43', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(518, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '8870103196', 'kk@kk.com', 'Dilip ', 'Male', '59732e6c5850f1500720748', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 10:52:28', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(519, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '8870103196', 'kk@kk.com', 'Dilip ', 'Male', '59732efb4653d1500720891', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 10:54:51', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(520, 117, 92, 1, 439, 'General Package', 'Economic', 9999.00, 'Yearly : With trainer', '8870103196', 'kk@kk.com', 'Dilip ', 'Male', '59733281eda7e1500721793', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 11:09:53', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(521, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '8870103196', 'kk@kk.com', 'Dilip ', 'Male', '5973336c2da0c1500722028', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 11:13:48', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(522, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '8870103196', 'kk@kk.com', 'Dilip ', 'Male', '59733374f0a3f1500722036', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 11:13:56', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(523, 117, 92, 1, 438, 'General Package', 'Economic', 1999.00, 'Monthly : With trainer', '8870103196', 'kk@kk.com', 'Dilip ', 'Male', '597333a1721e61500722081', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 11:14:41', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(524, 117, 92, 1, 439, 'General Package', 'Economic', 9999.00, 'Yearly : With trainer', '8870103196', 'kk@kk.com', 'Dilip ', 'Male', '59733635d54f51500722741', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 11:25:41', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(525, 117, 92, 1, 438, 'General Package', 'Economic', 1999.00, 'Monthly : With trainer', '9876543210', 'kk@k.com', 'kk', 'Male', '59733727ae3311500722983', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 11:29:43', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(526, 117, 92, 1, 438, 'General Package', 'Economic', 1999.00, 'Monthly : With trainer', '8870103196', 'kk@kk.com', 'dilip', 'Male', '5973381403fc11500723220', 'pay_8HpDamCn4X0Zyp', NULL, NULL, NULL, NULL, NULL, '2017-07-22 11:33:40', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(527, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '9876543320', 'kk@kk.com', 'dilip', 'Male', '59733a75b65711500723829', 'pay_8HpaFOHhxnKYzB', NULL, NULL, NULL, NULL, NULL, '2017-07-22 11:43:49', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(528, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '9876543320', 'kk@kk.com', 'dilip', 'Male', '59733b83a26211500724099', 'pay_8HpaFOHhxnKYzB', NULL, NULL, NULL, NULL, NULL, '2017-07-22 11:48:19', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(529, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '9876543320', 'kk@kk.com', 'dilip', 'Male', '59733c0cc20cf1500724236', 'pay_8HpaFOHhxnKYzB', NULL, NULL, NULL, NULL, NULL, '2017-07-22 11:50:36', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(530, 117, 92, 1, 438, 'General Package', 'Economic', 1999.00, 'Monthly : With trainer', '9876543320', 'kk@kk.com', 'dilip', 'Male', '59733d23bd77b1500724515', 'pay_8HpaFOHhxnKYzB', NULL, NULL, NULL, NULL, NULL, '2017-07-22 11:55:15', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(531, 117, 92, 1, 438, 'General Package', 'Economic', 1999.00, 'Monthly : With trainer', '9876543320', 'kk@kk.com', 'dilip', 'Male', '597344e7739301500726503', 'pay_8HpaFOHhxnKYzB', NULL, NULL, NULL, NULL, NULL, '2017-07-22 12:28:23', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(532, 117, 92, 1, 438, 'General Package', 'Economic', 1999.00, 'Monthly : With trainer', '9876543320', 'kk@kk.com', 'dilip', 'Male', '59734a77a644e1500727927', 'pay_8HqYEwGU2BNGv9', NULL, NULL, NULL, NULL, NULL, '2017-07-22 12:52:07', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(533, 118, 85, 1, 503, 'General Package', 'Economic', 300.00, 'Session : With trainer', '9876543320', 'kk@kk.com', 'dilip', 'Male', '59734b9fbbb3c1500728223', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 12:57:03', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(534, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '9876543320', 'kk@kk.com', 'dilip', 'Male', '59734d48c5dd01500728648', 'pay_8HqlFUDJ2ejfCV', NULL, NULL, NULL, NULL, NULL, '2017-07-22 01:04:08', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(535, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '1234567890', 'ss@gmail.comqq', 'ss111', 'Male', '59735253543a61500729939', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-22 01:25:39', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(536, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '1234567890', 'ss@gmail.co', 'sss', 'Male', '5973539034c5e1500730256', 'pay_8HrDFxxQfgLAzl', NULL, NULL, NULL, NULL, NULL, '2017-07-22 01:30:56', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(537, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '1234567890', 'ss@gmail.co', 'sss', 'Male', '597354971c8ff1500730519', 'pay_8HrHwaaJigkDzM', NULL, NULL, NULL, NULL, NULL, '2017-07-22 01:35:19', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(538, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '8220131335', 'ss@dgg.com', 'Ss', 'Male', '597355b593ec11500730805', 'pay_8HrN75bAx21Zby', NULL, NULL, NULL, NULL, NULL, '2017-07-22 01:40:05', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(539, 118, 85, 1, 505, 'General Package', 'Economic', 9999.00, 'Yearly : With trainer', '9876543320', 'kk@kk.com', 'dilip', 'Male', '5974ab0ec26721500818190', 'pay_8IGBc74hMl71aP', NULL, NULL, NULL, NULL, NULL, '2017-07-23 01:56:30', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(540, 91, 78, 1, 334, 'Sample Pack', 'Economic', 1000.00, 'Yearly : Without trainer', '8870103196', 'dilipwk@gmail.com', 'Dilip', 'Male', '5975a41401d1a1500881940', 'pay_8IYI1QkSjhJmI1', NULL, NULL, NULL, NULL, NULL, '2017-07-24 07:39:00', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(541, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8870103196', 'kk@kk.com', 'Kk', 'Male', '5975cc992614d1500892313', 'pay_8IbGEkFDQ2zfmX', NULL, NULL, NULL, NULL, NULL, '2017-07-24 10:31:53', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(542, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8680996597', 'gsg@hch.com', 'Dksa', 'Male', '5975df63436721500897123', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-24 11:52:03', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(543, 118, 85, 1, 504, 'General Package', 'Economic', 1999.00, 'Monthly : With trainer', '8680996597', 'gsg@hch.com', 'Dksa', 'Male', '5975dfbf0036d1500897214', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-24 11:53:34', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(544, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '8680996597', 'san@ffg.com', 'Fiaz', 'Male', '5975e0a6048c01500897446', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-24 11:57:26', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(545, 118, 85, 1, 503, 'General Package', 'Economic', 300.00, 'Session : With trainer', '8680996597', 'san@ffg.com', 'Fiaz', 'Male', '5975e1c22c97a1500897730', 'pay_8Iclw8xPBoc3Qy', NULL, NULL, NULL, NULL, NULL, '2017-07-24 12:02:10', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(546, 118, 85, 1, 504, 'General Package', 'Economic', 1999.00, 'Monthly : With trainer', '8680996597', 'sankar2389@gmail.com', 'Fiaz', 'Male', '5975e268aa69c1500897896', 'pay_8IconDrwTHYTtj', NULL, NULL, NULL, NULL, NULL, '2017-07-24 12:04:56', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(547, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8870103196', 'kk@kk.com', 'Kk', 'Male', '5975e53c255d51500898620', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-24 12:17:00', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(548, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8870103196', 'kk@kk.com', 'Kk', 'Male', '5975e55dc7e6b1500898653', 'pay_8Id29xvtO7LWFc', NULL, NULL, NULL, NULL, NULL, '2017-07-24 12:17:33', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(549, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8870103196', 'kk@kk.com', 'Kktest', 'Male', '5975e569798931500898665', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-24 12:17:45', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(550, 118, 85, 1, 503, 'General Package', 'Economic', 300.00, 'Session : With trainer', '8870103196', 'kk@kk.com', 'Kktest', 'Male', '5975e5d436d8d1500898772', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-24 12:19:32', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(551, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '8870103196', 'kk@kk.com', 'kk', 'Male', '5975e6c4883d51500899012', 'pay_8Id8K2so8cHzy6', NULL, NULL, NULL, NULL, NULL, '2017-07-24 12:23:32', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(552, 118, 85, 1, 503, 'General Package', 'Economic', 300.00, 'Session : With trainer', '8870103196', 'mm@kk.com', 'mm', 'Male', '5975e709bc23a1500899081', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-24 12:24:41', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(553, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8870103196', 'mm@kk.com', 'mm', 'Male', '5975e767ab41b1500899175', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-24 12:26:15', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(554, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8870103196', 'kk@kk.com', 'kk', 'Male', '5975e7921147c1500899218', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-24 12:26:58', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(555, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '5975e7a2495571500899234', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-24 12:27:14', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(556, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8870103196', 'kk@kk.com', 'Kktest', 'Male', '5975e8679ce151500899431', 'pay_8IdHuWbWhzFuRR', NULL, NULL, NULL, NULL, NULL, '2017-07-24 12:30:31', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(557, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8870103196', 'kk@kk.com', 'Kktest', 'Male', '5975e88252e451500899458', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-24 12:30:58', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(558, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8870103196', 'kk@kk.com', 'Kktest', 'Male', '5975e89fd3e711500899487', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-24 12:31:27', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(559, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'gyuuuyh@fghh.cim', 'Hhh', 'Male', '5975f0e8ca5621500901608', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-24 01:06:48', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(560, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '1111111111', 'ss@gm.com', 'sss', 'Male', '5975f9abc2fe51500903851', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-24 01:44:11', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(561, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '1111111111', 'jknj@hbhjb.com', 'hbhjbhj', 'Male', '5975f9e9669381500903913', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-24 01:45:13', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(562, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '1111111111', 'jkhjbh@bjhb.com', 'jbbjh', 'Male', '5975fb7560cc21500904309', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-24 01:51:49', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(563, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '1111111111', 'vgh@vgghvgh.com', 'gghf', 'Male', '5975fdc1505c51500904897', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-24 02:01:37', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(564, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '1111111111', 'hjbhj@dd.com', 'nbh', 'Male', '5975fe33e76711500905011', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-24 02:03:31', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(565, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '1111111111', 'qd@eefef.com', 'xwdw', 'Male', '5975febc829c81500905148', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-24 02:05:48', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(566, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '1111111111', 'qd@eefef.com', 'xwdw', 'Male', '5975ff3c342671500905276', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-24 02:07:56', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(567, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@g.com', 'Sss', 'Male', '5976d39d4d7a91500959645', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-25 05:14:05', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(568, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@g.com', 'Sss', 'Male', '5976d499338a91500959897', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-25 05:18:17', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(569, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@g.com', 'Sss', 'Male', '5976d5407442c1500960064', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-25 05:21:04', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(570, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@g.com', 'Sss', 'Male', '5976d5c3255181500960195', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-25 05:23:15', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(571, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '8220131335', 'ss@g.com', 'Sss', 'Male', '5976d6771dda31500960375', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-25 05:26:15', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(572, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@g.com', 'Sss', 'Male', '5976ed1f141831500966175', 'pay_8IwFYYQWwTYcDq', NULL, NULL, NULL, NULL, NULL, '2017-07-25 07:02:55', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(573, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@g.com', 'Sss', 'Male', '5976ed719810b1500966257', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-25 07:04:17', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(574, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '8220131335', 'ss@g.com', 'Sss', 'Male', '5976edae621101500966318', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-25 07:05:18', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(575, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@g.com', 'Sss', 'Male', '5976f14dba2e91500967245', 'pay_8IwFYYQWwTYcDq', NULL, NULL, NULL, NULL, NULL, '2017-07-25 07:20:45', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(576, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '8220131335', 'ss@g.com', 'Sss', 'Male', '5976f17422d931500967284', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-25 07:21:24', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(577, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '8870103196', 'kk@kk.com', 'Kktest', 'Male', '5976fba5a6a631500969893', 'pay_8IdHuWbWhzFuRR', NULL, NULL, NULL, NULL, NULL, '2017-07-25 08:04:53', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(578, 118, 85, 1, 503, 'General Package', 'Economic', 300.00, 'Session : With trainer', '8870103196', 'kk@kk.com', 'Kktest', 'Male', '5976fc4c6d2a71500970060', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-25 08:07:40', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(579, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@g.com', 'Sss', 'Male', '5977187042e1d1500977264', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-25 10:07:44', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(580, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '1111111111', 'qd@eefef.com', 'xwdw', 'Male', '59772a636fd7d1500981859', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-25 11:24:19', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(581, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@g.com', 'Sss', 'Male', '59772ac6330e21500981958', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-25 11:25:58', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(582, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '8870103196', 'kk@kk.com', 'Kk@kk.com', 'Male', '59772cbaeed771500982458', 'pay_8J0qwqMnKjBbQz', NULL, NULL, NULL, NULL, NULL, '2017-07-25 11:34:18', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(583, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '8870103196', 'kk@kk.com', 'Kk@kk.com', 'Male', '59772d0767ca31500982535', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-25 11:35:35', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(584, 121, 96, 1, 475, 'General Package ', 'Economic', 7000.00, 'Yearly : With trainer', '8870103196', 'kk@kk.com', 'Kk@kk.com', 'Male', '59772d376d69a1500982583', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-25 11:36:23', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(585, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'ss@g.com', 'Sss', 'Male', '59772df4924171500982772', 'pay_8IwWLgmrBfcB7S', NULL, NULL, NULL, NULL, NULL, '2017-07-25 11:39:32', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(586, 121, 96, 1, 474, 'General Package ', 'Economic', 800.00, 'Monthly : With trainer', '8220131335', 'ss@g.com', 'Sss', 'Male', '59772e0c86b9d1500982796', 'pay_8J0vhrHLV0EeSl', NULL, NULL, NULL, NULL, NULL, '2017-07-25 11:39:56', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(587, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'Chandral', 'Male', '5977397c762431500985724', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-25 12:28:44', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(588, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'Chandral', 'Male', '59773987436071500985735', 'pay_8J1l82E5OaZyr0', NULL, NULL, NULL, NULL, NULL, '2017-07-25 12:28:55', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(589, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'Ragu', 'Male', '59773b520b59f1500986194', 'pay_8J1tN9WztBoUY5', NULL, NULL, NULL, NULL, NULL, '2017-07-25 12:36:34', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(590, 121, 96, 1, 477, 'General Package ', 'Economic', 800.00, 'Monthly : Without trainer', '8680996597', 'sankar2389@gmail.com', 'Sankar', 'Male', '59773c8d12e2e1500986509', 'pay_8J1z1buvBvq30I', NULL, NULL, NULL, NULL, NULL, '2017-07-25 12:41:49', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(591, 118, 85, 1, 503, 'General Package', 'Economic', 300.00, 'Session : With trainer', '8680996597', 'sankar2389@gmail.com', 'Sankar', 'Male', '59773ce5106451500986597', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-25 12:43:17', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(592, 131, 101, 1, 521, 'Cardio', 'Economic', 80.00, 'Session : With trainer', '8939040408', 'deesss@gmail.com', 'Deepaj', 'Male', '59776b65449791500998501', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-25 04:01:41', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(593, 118, 85, 1, 503, 'General Package', 'Economic', 300.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '59784c10ad9341501056016', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-26 08:00:16', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(594, 104, 97, 1, 479, 'General', 'Economic', 60.00, 'Session : With trainer', '7502872744', 'shammuthubabu@gmail.com', 'Sham Babu', 'Male', '5978728ba59741501065867', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-26 10:44:27', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(595, 112, 80, 1, 467, 'General package', 'Economic', 250.00, 'Session : With trainer', '7502872744', 'shammuthubabu@gmail.com', 'Sham Babu', 'Male', '5978ad6f97c7f1501080943', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-26 02:55:43', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(596, 112, 80, 1, 468, 'General package', 'Economic', 1999.00, 'Monthly : With trainer', '7502872744', 'shammuthubabu@gmail.com', 'Sham Babu', 'Male', '5978e455ac0211501094997', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-26 06:49:57', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(597, 112, 80, 1, 468, 'General package', 'Economic', 1999.00, 'Monthly : With trainer', '7502872744', 'shambabufriend@gmail.com', 'Sham Babu', 'Male', '5978e4a9f245d1501095081', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-26 06:51:21', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(598, 112, 80, 1, 468, 'General package', 'Economic', 1999.00, 'Monthly : With trainer', '7502872744', 'shambabufriend@gmail.com', 'Sham Babu', 'Male', '5978e4dfbf5751501095135', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-26 06:52:15', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(599, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'Chandral', 'Male', '597d9f8f445f71501405071', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-30 08:57:51', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(600, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '597e0b38ce6e81501432632', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-30 04:37:12', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(601, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'Chandral', 'Male', '597e0bac7d1e11501432748', '', '', '', 6.00, NULL, 0x65353932356630656163363534623933393865343035623538393365623062386365383964646237, '2017-07-30 04:39:08', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(602, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '597e0c0118bae1501432833', '', '', '', 6.00, NULL, 0x63663736373537636437646164346230306133333461303563393733373134323763626138623336, '2017-07-30 04:40:33', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(603, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'Chandral', 'Male', '597e0f8c9c3981501433740', '', '', '', 6.00, NULL, 0x33313238393866633731613664353037646630333136653238666330363539653533396335363738, '2017-07-30 04:55:40', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(604, 91, 83, 1, 361, 'Econ-Sample', 'Economic', 600.00, 'Yearly : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '597e1034a40d31501433908', 'pay_8L51lsigZCdH4q', NULL, NULL, NULL, NULL, NULL, '2017-07-30 04:58:28', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(605, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'Chandral', 'Female', '597e1078bb0be1501433976', '', '', '', 6.00, NULL, 0x38313231393130393332613962326131646633616166666566393232666465373735376238336634, '2017-07-30 04:59:36', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(606, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'Chandral', 'Female', '597e11109b2d61501434128', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-30 05:02:08', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(607, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'Chandral', 'Female', '597e1114842441501434132', '', '', '', 6.00, NULL, 0x64356134636462646132326366326564646363616565393737643935396537323630343232363431, '2017-07-30 05:02:12', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(608, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'Chandral', 'Female', '597e116e595a71501434222', '', '', '', 6.00, NULL, 0x31313062346639656538376534383335303364626433306337633562323535366261376666656238, '2017-07-30 05:03:42', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(609, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'Chandral', 'Female', '597e11d06042b1501434320', '', '', '', 6.00, NULL, 0x61663039383232303532643335333634383433313964353862643032626534663633656338346565, '2017-07-30 05:05:20', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(610, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'Chandral', 'Male', '597e12d91c1e51501434585', '', '', '', 6.00, NULL, 0x61333564333530343532613237313263393831623633323936353433623731623135333333366166, '2017-07-30 05:09:45', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(611, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '597e140b840591501434891', '', '', '', 6.00, NULL, 0x39646361333762663335306635356339623132386330663630616137626665386262373337383434, '2017-07-30 05:14:51', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(612, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '597eb88c10c151501477004', '', '', '', 6.00, NULL, 0x36353936383630366634633430343861653763343736653663303561363331633565303533613862, '2017-07-31 04:56:44', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(613, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '597eb952f077a1501477202', '', '', '', 6.00, NULL, 0x31396539313334663831336235663865613832393365343732303433613735336661333639313039, '2017-07-31 05:00:02', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(614, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '597eb98ea81ea1501477262', '', '', '', 6.00, NULL, 0x62306339663039396161346431333764383061393231653636656665643365383830656131306537, '2017-07-31 05:01:02', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(615, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'Male', '597eb9fd4f3011501477373', '', '', '', 6.00, NULL, 0x34303238633134303130316434623766393635376639633334373638333563396239333065623630, '2017-07-31 05:02:53', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0),
(616, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '1111111111', 'qd@eefef.com', 'xwdw', 'Male', '5981cf9ead0e11501679518', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-02 01:11:58', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(617, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '1111111111', 'qd@eefef.com', 'xwdw', 'Male', '5981cfd0bebe01501679568', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-02 01:12:48', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(618, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '1111111111', 'qd@eefef.com', 'xwdw', 'Male', '5981d0b58b8861501679797', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-02 01:16:37', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(619, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '1111111111', 'qd@eefef.com', 'xwdw', 'Male', '5981d15d5f9231501679965', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-02 01:19:25', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(620, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '1111111111', 'qd@eefef.com', 'xwdw', 'Male', '5981d1dd033731501680093', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-02 01:21:33', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(621, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '8220131335', 'qd@eefef.com', 'xwdw', '11', '5981d5fd0299b1501681149', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-02 01:39:09', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(622, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '1111111111', 'qd@eefef.com', 'xwdw', 'Male', '5981d633757591501681203', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-02 01:40:03', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(623, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '1111111111', 'qd@eefef.com', 'xwdw', 'Male', '5981d635ed2331501681205', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-02 01:40:05', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(624, 137, 109, 1, 575, 'General', 'Economic', 80.00, 'Session : With trainer', '7502872744', 'shambabufriend@gmail.com', 'Sham Babu', 'Male', '5981e3996f4cb1501684633', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-02 02:37:13', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(625, 91, 83, 1, 359, 'Econ-Sample', 'Economic', 6.00, 'Session : With trainer', '9750134440', 'balasrain@gmail.com', 'bala', 'female', '5982b13a3ceca1501737274', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-03 05:14:34', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(626, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '9750134440', 'balasrain@gmail.com', 'Ram', 'Male', '5982b885e4a261501739141', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-03 05:45:41', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(627, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '9750134440', 'balasrain@gmail.com', 'Ram', 'Male', '5982b88ae87031501739146', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-03 05:45:46', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(628, 135, 105, 1, 545, 'General', 'Economic', 345.00, 'Session : With trainer', '8680996597', 'sankar2389@gmail.com', 'Sankar', 'Male', '59832696546cd1501767318', 'pay_8J1z1buvBvq30I', NULL, NULL, NULL, NULL, NULL, '2017-08-03 01:35:18', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(629, 135, 105, 1, 545, 'General', 'Economic', 345.00, 'Session : With trainer', '8680996597', 'sankar2389@gmail.com', 'Sankar', 'Male', '5983342f4275b1501770799', 'pay_8McgqYFdO4yGqt', NULL, NULL, NULL, NULL, NULL, '2017-08-03 02:33:19', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(630, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '1111111111', 'qd@eefef.com', 'xwdw', 'Male', '59834d772f2081501777271', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-03 04:21:11', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(631, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '1111111111', 'qd@eefef.com', 'xwdw', 'Male', '59834d9c7acbb1501777308', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-03 04:21:48', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(632, 117, 92, 1, 437, 'General Package', 'Economic', 250.00, 'Session : With trainer', '1111111111', 'qd@eefef.com', 'xwdw', 'Male', '59834d9fee5d51501777311', '', '', '', 250.00, NULL, 0x66316364626139303939363466323033376539343061353232666438653366353262366230393335, '2017-08-03 04:21:51', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(633, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'haha@g.com', 'Jja', 'Male', '59834f2bbf7d91501777707', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-03 04:28:27', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(634, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'haha@g.com', 'Jja', 'Male', '59834f2ea028d1501777710', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-03 04:28:30', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(635, 131, 101, 1, 521, 'Cardio', 'Economic', 80.00, 'Session : With trainer', '8939040408', 'deepak.mohan1589@gmail.com', 'Deepak M', 'Male', '5983f34d05e401501819725', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-04 04:08:45', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(636, 131, 101, 1, 521, 'Cardio', 'Economic', 80.00, 'Session : With trainer', '8939040408', 'deepak.mohan1589@gmail.com', 'Deepak M', 'Male', '5983f34ff0f5c1501819727', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-04 04:08:47', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(637, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '8939040408', 'deepak.mohan1589@gmail.com', 'Deepak M', 'Male', '5983f406438ad1501819910', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-04 04:11:50', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(638, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '8939040408', 'deepak.mohan1589@gmail.com', 'Deepak M', 'Male', '5983f409bcbf71501819913', '', '', '', 23.00, NULL, 0x30613537333236656337656331626531353334326239366661353039333732363736386635656433, '2017-08-04 04:11:53', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(639, 91, 83, 1, 362, 'Econ-Sample', 'Economic', 2.00, 'Session : Without trainer', '8939040408', 'deepak.mohan1589@gmail.com', 'Deepak M', 'Male', '5983f45e401ae1501819998', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-04 04:13:18', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(640, 91, 83, 1, 362, 'Econ-Sample', 'Economic', 2.00, 'Session : Without trainer', '8939040408', 'deepak.mohan1589@gmail.com', 'Deepak M', 'Male', '5983f460eb3831501820000', '', '', '', 2.00, NULL, 0x62393835343534386266343638616664643534663563323265613364313833366433623664303333, '2017-08-04 04:13:20', 'CANCELED', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(641, 112, 80, 1, 467, 'General package', 'Economic', 250.00, 'Session : With trainer', '7502872744', 'shambabufriend@gmail.com', 'Sham Babu', 'Male', '5983f5aebb2a51501820334', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-04 04:18:54', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(642, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '7502872744', 'shambabufriend@gmail.com', 'Sham Babu', 'Male', '5983f671d5b871501820529', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-04 04:22:09', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(643, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '7502872744', 'shambabufriend@gmail.com', 'Sham Babu', 'Male', '5983f6756b9891501820533', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-04 04:22:13', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(644, 91, 78, 1, 332, 'Sample Pack', 'Economic', 23.00, 'Session : Without trainer', '7502872744', 'shambabufriend@gmail.com', 'Sham Babu', 'Male', '5983f67d1bfa91501820541', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-04 04:22:21', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(645, 104, 97, 1, 482, 'General', 'Economic', 50.00, 'Session : Without trainer', '7502872744', 'shambabufriend@gmail.com', 'Sham Babu', 'Male', '5983f6985226d1501820568', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-04 04:22:48', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(646, 104, 97, 1, 479, 'General', 'Economic', 60.00, 'Session : With trainer', '7502872744', 'shambabufriend@gmail.com', 'Sham Babu', 'Male', '5983fbe54f1291501821925', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-04 04:45:25', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(647, 104, 97, 1, 479, 'General', 'Economic', 60.00, 'Session : With trainer', '7502872744', 'shambabufriend@gmail.com', 'Sham Babu', 'Male', '5983fbf099a651501821936', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-04 04:45:36', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, 0),
(648, 104, 97, 1, 480, 'General', 'Economic', 900.00, 'Monthly : With trainer', '7502872744', 'shambabufriend@gmail.com', 'Sham Babu', 'Male', '5983fc1a7e8441501821978', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-04 04:46:18', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(649, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '1111111111', 'qd@eefef.com', 'xwdw', 'Male', '5984065447ae51501824596', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-04 05:29:56', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(650, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '1111111111', 'qd@eefef.com', 'xwdw', 'Male', '598406a09fb481501824672', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-04 05:31:12', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(651, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8220131335', 'sss@g.com', 'Sss', 'Male', '5984094859c7c1501825352', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-04 05:42:32', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(652, 136, 107, 1, 569, 'General +cardio', 'Economic', 150.00, 'Session : With trainer', '7502872744', 'shambabufriend@gmail.com', 'Sham Babu', 'Male', '598428b43d2701501833396', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-04 07:56:36', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1);
INSERT INTO `gym_payment_master` (`cus_pay_id`, `user_id`, `pak_id`, `cat_id`, `price_id`, `pak_name`, `cat_name`, `price`, `pack_desc`, `user_mobile`, `user_email`, `customer_name`, `gender`, `trans_id`, `res_trans_id`, `res_ref_no`, `res_auth_id`, `res_price`, `request`, `response`, `req_date`, `pay_result`, `status`, `cancel_status`, `cancel_res_amount`, `cancel_res_date`, `cancel_res_status`, `cancel_res_transactionId`, `cancel_res_merchantRefundTxId`, `pay_offline`, `payed_offline_dt`, `physical_att`, `physical_att_dt`, `web_app_pay`) VALUES
(653, 107, 86, 1, 377, 'General ', 'Economic', 100.00, 'Session : With trainer', '7502872744', 'shambabufriend@gmail.com', 'Sham Babu', 'Male', '598559b31bc051501911475', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-05 05:37:55', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(654, 123, 77, 1, 320, 'Economic package sample', 'Economic', 39.00, 'Hourly package: Without trainer', '8939040408', 'deepak.mohan1589@gmail.com', 'Deepak M', 'Male', '598b49a22412b1502300578', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-09 05:42:58', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(655, 121, 96, 1, 473, 'General Package ', 'Economic', 60.00, 'Session : With trainer', '8870103196', 'kk@kk.com', 'Kk@kk.com', 'Male', '59a144de264761503741150', 'pay_8J0rktx62owfzA', NULL, NULL, NULL, NULL, NULL, '2017-08-26 09:52:30', 'SUCCESS', 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(656, 112, 80, 1, 468, 'General package', 'Economic', 1999.00, 'Monthly : With trainer', '7502872744', 'shambabufriend@gmail.com', 'Sham', 'Male', '59a41f4e33bcb1503928142', NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-28 01:49:02', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(657, 140, 113, 1, 600, 'BADMINTON + GYM', 'Economic', 3500.00, 'Monthly : With trainer', '7502872744', 'shambabufriend@gmail.com', 'Sham', 'Male', '59a959ca837111504270794', NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-01 12:59:54', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(658, 131, 100, 1, 515, 'Normal', 'Economic', 80.00, 'Session : With trainer', '7502872744', 'shambabufriend@gmail.com', 'Sham', 'Male', '59acf380843811504506752', NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-04 06:32:32', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(659, 129, 95, 1, 656, 'Gym : General Fitness', 'Economic', 150.00, 'Session : Without trainer', '7502872744', 'shambabufriend@gmail.com', 'Sham', 'Male', '59ad3fb67eacc1504526262', NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-04 11:57:42', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(660, 129, 95, 1, 657, 'Gym : General Fitness', 'Economic', 1500.00, 'Monthly : Without trainer', '7502872744', 'shambabufriend@gmail.com', 'Sham', 'Male', '59ad41a81ef7d1504526760', NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-04 12:06:00', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(661, 122, 82, 1, 354, 'Plus Cardio', 'Economic', 900.00, 'Monthly : With trainer', '7502872744', 'shambabufriend@gmail.com', 'Sham', 'Male', '59ad5b7db2d8c1504533373', NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-04 01:56:13', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(662, 112, 80, 1, 468, 'General package', 'Economic', 1999.00, 'Monthly : With trainer', '7502872744', 'shambabufriend@gmail.com', 'Sham', 'Male', '59ae574a3843d1504597834', NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-05 07:50:34', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(663, 107, 86, 1, 377, 'General ', 'Economic', 100.00, 'Session : With trainer', '7502872744', 'shambabufriend@gmail.com', 'Sham', 'Male', '59aeab5b7afde1504619355', NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-05 01:49:15', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(664, 129, 95, 1, 657, 'Gym : General Fitness', 'Economic', 1500.00, 'Monthly : Without trainer', '7502872744', 'shambabufriend@gmail.com', 'Sham', 'Male', '59b7df38928511505222456', NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-12 01:20:56', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1),
(665, 129, 116, 1, 650, 'Aerobics', 'Economic', 150.00, 'Session : Without trainer', '7502872744', 'shambabufriend@gmail.com', 'Sham', 'Male', '59bbbfd9352d01505476569', NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-15 11:56:09', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gym_payment_razor_key`
--

CREATE TABLE `gym_payment_razor_key` (
  `secret_key` varchar(250) DEFAULT NULL,
  `assKey` varchar(200) NOT NULL,
  `vanityUrl` varchar(250) DEFAULT NULL,
  `currency` varchar(25) DEFAULT NULL,
  `postUrl` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gym_payment_razor_key`
--

INSERT INTO `gym_payment_razor_key` (`secret_key`, `assKey`, `vanityUrl`, `currency`, `postUrl`) VALUES
('WakOdUXWxZm2XuLkSRYKou9Z', 'rzp_test_THq2OlPtYFWWFt', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gym_profile_master`
--

CREATE TABLE `gym_profile_master` (
  `pro_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `gym_name` varchar(100) DEFAULT NULL,
  `area_location` varchar(150) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `address1` varchar(200) DEFAULT NULL,
  `address2` varchar(200) DEFAULT NULL,
  `land_mark` varchar(200) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `cell_no` varchar(50) DEFAULT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `img_path` varchar(100) DEFAULT NULL,
  `active` smallint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gym_profile_master`
--

INSERT INTO `gym_profile_master` (`pro_id`, `user_id`, `gym_name`, `area_location`, `pincode`, `address1`, `address2`, `land_mark`, `phone`, `cell_no`, `lat`, `lng`, `img_path`, `active`) VALUES
(2, 91, NULL, 'Selaiyur', 600073, 'A-1 Phase-1 , Esther garden Mohan nagar ', NULL, 'Barath University', NULL, '8939040408', 12.906106, 80.143547, NULL, 1),
(3, 92, NULL, 'Tambaram', 600073, '23 Madha kovil street', NULL, 'Flyover', NULL, '2147483647', 12.958863, 80.138672, NULL, 1),
(4, 94, NULL, 'Egmore', 600073, '23, Rajaram Street', NULL, 'DAV School', NULL, '2147483647', 13.027436, 80.189873, NULL, 1),
(5, 93, NULL, 'Barath', 600073, '34 Ramjo Nagar', NULL, 'Start Towers', NULL, '2147483647', 12.907718, 80.142090, NULL, 1),
(6, 95, NULL, 'Selaiyur', 600073, '23 Stark tower', NULL, 'Earth', NULL, '2147483647', 12.862788, 80.078445, NULL, 1),
(7, 105, NULL, 'East Tambaram', 600073, '# 145 ALS Nagar, 4th Street, Madambakkam, Chennai', NULL, 'Near Madambakkam Zion School', NULL, '2147483647', 12.902253, 80.154839, NULL, 1),
(8, 104, NULL, 'Palavanthangal', 600061, 'college road', NULL, '', NULL, '2147483647', 12.986405, 80.184601, NULL, 1),
(9, 107, NULL, 'Pallikaranai ', 600100, 'No.1 varadharajapuram ', NULL, 'Hdfc bank', NULL, '2147483647', 12.928171, 80.204262, NULL, 1),
(10, 108, NULL, 'Kovilambakkam', 600117, '207,RRK complex medavakkam main road,kovilambakkam.', NULL, 'Oop to rose nagar, near by navin\'s appartment', NULL, '2147483647', 12.945530, 80.182838, NULL, 1),
(11, 112, NULL, 'Velachery', 600042, '37 F Velachery Main road, vijaya nagar', NULL, 'Behind Adyar Anandha Bhavan Hotel', NULL, '9551299844', 12.972996, 80.220734, NULL, 1),
(12, 1121, NULL, 'Vijaya Nagar', 600042, '37 F Velachery Main road, vijaya nagar', NULL, 'Velachery', NULL, '2147483647', 0.000000, 0.000000, NULL, 1),
(13, 118, NULL, 'Sembakkam', 600073, '100A, Velachery Tambaram Road, Sembakkam', NULL, 'Sriram Furniture', NULL, '9551299866', 12.975401, 80.220795, NULL, 1),
(14, 116, NULL, 'TNagar', 600017, 'No:21,Thanikachalam Road, TNagar', NULL, 'TNagar', NULL, '9551499899', 13.039974, 80.239891, NULL, 1),
(15, 117, NULL, 'Royapettah', 600014, 'No:121, Royapettah High Road, Royapettah', NULL, 'Opposite to SBI', NULL, '9551299822', 13.050904, 80.264107, NULL, 1),
(16, 115, NULL, 'Industrial Estate', 600087, 'No:48, Kasi Industrial Estate, Voc Street,Kaikankuppam, Nesapakkam', NULL, 'Nesapakkam', NULL, '9551299855', 13.037301, 80.177666, NULL, 1),
(17, 113, NULL, 'Perumbakkam', 600100, 'No:12, 7th Street,Soumya Nagar, Perumbakkam', NULL, 'Medavakkam', NULL, '9551074411', 12.904445, 80.196312, NULL, 1),
(18, 123, NULL, 'Koturpuram', 600025, '1- GST main road koturpuram', NULL, 'Koturpuram', NULL, '8939040408', 12.944787, 80.151436, NULL, 1),
(19, 122, NULL, 'Thiruvanmiyur', 600041, '171,LB Road,', NULL, 'Near Lakshmi sagar hotel ', NULL, '9600100755', 12.984190, 80.255043, NULL, 1),
(20, 120, NULL, 'velachery', 600042, 'no 16, LIC colony, 2nd street Velachery ', NULL, 'above lakme salon', NULL, '9840671782', 12.977297, 80.222572, NULL, 1),
(21, 128, NULL, 'Sholinganallur', 600119, 'No 04 Pillayar Kovil 2nd st,Kumaranchavadi nagar', NULL, 'Opp to TCS', NULL, '9094845178', 12.968815, 80.142944, NULL, 1),
(22, 129, NULL, 'Sholinganallr', 600119, 'No.41 Rajiv Gandhi Salai (OMR)', NULL, 'Near sholinganallur signal (next to Aloft hotel )', NULL, '9566079794', 12.898787, 80.228065, NULL, 1),
(23, 121, NULL, 'Santhosapuram ', 600073, '1/191 velachery main road santhosapuram', NULL, 'Next to Ruby elite', NULL, '9840285839', 12.931605, 80.202911, NULL, 1),
(24, 130, NULL, 'Sholinganallur ', 600119, 'No.169 B-Block Vaikund Govardhan apartment ', NULL, 'Near Sholinganallur signal', NULL, '9941870401', 12.899790, 80.228027, NULL, 1),
(25, 131, NULL, 'Sithalappakkam', 600127, 'No, 1346, SVR Homes, 1st Floor, Priyadharsini Nagar.', NULL, 'Near Jothi Nagar ', NULL, '9710346046', 12.894293, 80.178207, NULL, 1),
(26, 132, NULL, 'Velachery', 600042, 'O.No 31, N.no 255, Velachery Main Road', NULL, '', NULL, '7845978883', 12.984602, 80.222984, NULL, 1),
(27, 134, NULL, 'Chemman cherry', 600119, '2/109 rajiv Gandhi salai', NULL, 'Sathyabama university opp ', NULL, '9884658234', 12.864045, 80.226288, NULL, 1),
(28, 135, NULL, 'Velachery', 600042, '52/1 1st floor,velachery main road, ', NULL, 'Near Post office', NULL, '7397406611', 12.974670, 80.220612, NULL, 1),
(29, 136, NULL, 'Madipakkam', 600091, 'No 9 balaiyagarden ', NULL, 'Near to varna play school', NULL, '8144459128', 12.964956, 80.196739, NULL, 1),
(30, 137, NULL, 'Adambakkam ', 600088, '2 Shanthi Nagar 6th street ', NULL, 'Near hp petrol bunk', NULL, '9840143991', 12.994908, 80.188019, NULL, 1),
(31, 138, NULL, 'Adambakkam', 600088, 'No: 20, Lake View Street', NULL, 'Opp to McRennet', NULL, '9940464718', 12.989757, 80.201782, NULL, 1),
(32, 140, NULL, 'Palavakkam', 600041, 'No 4/356,seashell avenue, Anna salami,pallavakkam', NULL, 'Opp to green meadows hotel', NULL, '9841336965', 12.974187, 80.261322, NULL, 1),
(33, 141, NULL, 'Neelangarai', 600115, '176 A 2nd north main road kapalesshwara nagar ', NULL, 'kapaleshwara nagar arch', NULL, '9841336965', 12.950231, 80.256577, NULL, 1),
(34, 109, NULL, 'Pallikaranai', 600100, 'No. 16A, Kamakoti Nagar', NULL, '', NULL, '9884498162', 0.000000, 0.000000, NULL, 1),
(35, 146, NULL, 'Velachery ', 600042, '26,Orandi Amman Koil Street ', NULL, 'Near: Velachery register office ', NULL, '9884404014', 0.000000, 0.000000, NULL, 1),
(36, 150, NULL, 'Palavanthangal', 600114, 'No16,4th Street', NULL, 'TamilNadu', NULL, '9952909829', 0.000000, 0.000000, NULL, 1),
(37, 152, NULL, 'C pallavaram', 600043, 'No 54, Rajendra prasad salai,', NULL, 'St Theresa school opposite', NULL, '9840094874', 0.000000, 0.000000, NULL, 1),
(38, 156, NULL, 'Pammal', 600075, 'No:3,1st street,Lakshmi Narayana Nagar ,Annanagar Pammal', NULL, 'Signal office road', NULL, '9171739993', 0.000000, 0.000000, NULL, 1),
(39, 158, NULL, 'Polichalur ', 600074, 'No3/1,theepanji Amman Koli street polichalur ', NULL, 'Siva Koli ', NULL, '8939623971', 0.000000, 0.000000, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gym_refund_duration`
--

CREATE TABLE `gym_refund_duration` (
  `online` int(11) DEFAULT NULL,
  `offline` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gym_refund_duration`
--

INSERT INTO `gym_refund_duration` (`online`, `offline`) VALUES
(15, 7);

-- --------------------------------------------------------

--
-- Table structure for table `gym_trainer_master`
--

CREATE TABLE `gym_trainer_master` (
  `tra_id` int(11) NOT NULL,
  `train_mode` varchar(50) DEFAULT NULL,
  `active` smallint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gym_trainer_master`
--

INSERT INTO `gym_trainer_master` (`tra_id`, `train_mode`, `active`) VALUES
(1, 'With trainer', 1),
(2, 'Without trainer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gym_type_mapping`
--

CREATE TABLE `gym_type_mapping` (
  `type_map_id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `active` smallint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gym_type_mapping`
--

INSERT INTO `gym_type_mapping` (`type_map_id`, `type_id`, `user_id`, `active`) VALUES
(42, 3, 95, 1),
(47, 1, 93, 1),
(48, 2, 93, 1),
(49, 3, 93, 1),
(50, 1, 94, 1),
(51, 1, 96, 1),
(52, 1, 97, 1),
(53, 1, 98, 1),
(54, 1, 99, 1),
(55, 1, 100, 1),
(59, 1, 92, 1),
(60, 1, 101, 1),
(61, 2, 101, 1),
(62, 1, 102, 1),
(63, 1, 103, 1),
(64, 2, 103, 1),
(65, 1, 104, 1),
(66, 1, 105, 1),
(67, 2, 106, 1),
(96, 1, 110, 1),
(97, 6, 110, 1),
(107, 1, 111, 1),
(108, 6, 111, 1),
(141, 1, 107, 1),
(142, 6, 107, 1),
(143, 1, 108, 1),
(144, 6, 108, 1),
(145, 1, 109, 1),
(178, 1, 121, 1),
(179, 6, 121, 1),
(194, 1, 124, 1),
(195, 2, 124, 1),
(196, 3, 124, 1),
(197, 6, 124, 1),
(215, 1, 116, 1),
(225, 1, 113, 1),
(226, 1, 114, 1),
(227, 1, 115, 1),
(228, 1, 117, 1),
(229, 1, 118, 1),
(230, 1, 122, 1),
(231, 1, 91, 1),
(232, 2, 91, 1),
(233, 3, 91, 1),
(234, 1, 119, 1),
(238, 1, 123, 1),
(239, 2, 123, 1),
(240, 3, 123, 1),
(241, 6, 123, 1),
(242, 1, 125, 1),
(243, 2, 125, 1),
(244, 3, 125, 1),
(245, 6, 125, 1),
(250, 1, 126, 1),
(251, 2, 126, 1),
(252, 3, 126, 1),
(253, 6, 126, 1),
(254, 1, 127, 1),
(255, 2, 127, 1),
(256, 3, 127, 1),
(257, 6, 127, 1),
(260, 1, 120, 1),
(261, 2, 120, 1),
(262, 1, 112, 1),
(263, 1, 128, 1),
(264, 2, 128, 1),
(265, 1, 129, 1),
(266, 2, 129, 1),
(267, 1, 130, 1),
(268, 2, 130, 1),
(269, 1, 131, 1),
(270, 1, 132, 1),
(272, 1, 133, 1),
(273, 1, 134, 1),
(275, 1, 135, 1),
(276, 1, 136, 1),
(278, 1, 138, 1),
(279, 6, 138, 1),
(284, 1, 140, 1),
(285, 2, 140, 1),
(286, 3, 140, 1),
(287, 6, 140, 1),
(288, 1, 141, 1),
(289, 1, 137, 1),
(290, 1, 142, 1),
(291, 1, 143, 1),
(292, 2, 143, 1),
(293, 3, 143, 1),
(294, 6, 143, 1),
(297, 1, 139, 1),
(298, 1, 144, 1),
(299, 6, 144, 1),
(300, 1, 145, 1),
(301, 6, 145, 1),
(302, 1, 146, 1),
(303, 2, 146, 1),
(304, 1, 147, 1),
(305, 1, 148, 1),
(306, 1, 149, 1),
(307, 1, 150, 1),
(308, 2, 150, 1),
(309, 3, 150, 1),
(310, 6, 150, 1),
(311, 1, 151, 1),
(312, 1, 152, 1),
(313, 1, 153, 1),
(314, 6, 153, 1),
(315, 1, 154, 1),
(316, 1, 155, 1),
(317, 1, 156, 1),
(321, 1, 157, 1),
(322, 2, 157, 1),
(323, 3, 157, 1),
(324, 1, 158, 1),
(325, 2, 158, 1),
(326, 3, 158, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gym_type_master`
--

CREATE TABLE `gym_type_master` (
  `type_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type_name` varchar(100) DEFAULT NULL,
  `active` smallint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gym_type_master`
--

INSERT INTO `gym_type_master` (`type_id`, `user_id`, `type_name`, `active`) VALUES
(1, 1, 'Gym / Gymnasium', 1),
(2, 1, 'Aerobics', 1),
(3, 1, 'Yoga', 1),
(4, 1, 'Dancing ', 0),
(5, 1, 'Mental Wellness', 0),
(6, 1, 'Sports', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gym_working_hour`
--

CREATE TABLE `gym_working_hour` (
  `wrk_hr_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `wrk_frm_hr` varchar(30) DEFAULT NULL,
  `wrk_to_hr` varchar(30) DEFAULT NULL,
  `peak_m_frm_hr` varchar(30) DEFAULT NULL,
  `peak_m_to_hr` varchar(30) DEFAULT NULL,
  `peak_e_frm_hr` varchar(30) DEFAULT NULL,
  `peak_e_to_hr` varchar(30) DEFAULT NULL,
  `active` smallint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gym_working_hour`
--

INSERT INTO `gym_working_hour` (`wrk_hr_id`, `user_id`, `wrk_frm_hr`, `wrk_to_hr`, `peak_m_frm_hr`, `peak_m_to_hr`, `peak_e_frm_hr`, `peak_e_to_hr`, `active`) VALUES
(2, 91, '05:00', '21:00', '06:00', '08:00', '16:00', '19:00', 1),
(3, 92, '04:00', '16:00', '07:00', '07:00', '19:00', '21:00', 1),
(4, 94, '06:00', '18:00', '08:00', '08:00', '17:00', '20:00', 1),
(5, 93, '08:00', '11:00', '06:00', '08:00', '16:00', '19:00', 1),
(6, 95, '05:00', '04:00', '04:00', '07:00', '19:00', '21:00', 1),
(7, 104, '05:00', '21:00', '05:00', '10:00', '15:00', '21:00', 1),
(8, 105, '05:00', '21:00', '06:00', '08:00', '17:00', '21:00', 1),
(9, 107, '05:00', '12:00', '06:00', '07:00', '16:00', '17:00', 1),
(10, 108, '05:00', '22:00', '06:00', '09:00', '18:00', '21:00', 1),
(11, 112, '06:00', '21:00', '06:00', '09:00', '18:00', '21:00', 1),
(12, 118, '06:00', '21:00', '06:00', '09:00', '18:00', '21:00', 1),
(13, 116, '05:00', '21:00', '06:00', '09:00', '18:00', '21:00', 1),
(14, 117, '06:00', '21:00', '06:00', '09:00', '18:00', '21:00', 1),
(15, 115, '06:00', '21:00', '06:00', '09:00', '18:00', '21:00', 1),
(16, 113, '06:00', '21:00', '06:00', '09:00', '18:00', '21:00', 1),
(17, 123, '04:00', '22:00', '06:00', '09:00', '16:00', '18:00', 1),
(18, 122, '06:00', '22:00', '07:00', '09:00', '19:00', '21:00', 1),
(19, 120, '06:00', '20:00', '07:00', '11:00', '17:00', '20:00', 1),
(20, 128, '05:00', '21:00', '06:00', '08:00', '19:00', '21:00', 1),
(21, 129, '05:00', '22:00', '06:00', '08:00', '20:00', '21:00', 1),
(22, 121, '05:00', '22:00', '05:00', '10:00', '16:00', '22:00', 1),
(23, 130, '05:00', '21:00', '07:00', '09:00', '18:00', '20:00', 1),
(24, 131, '05:00', '22:00', '06:00', '07:00', '18:00', '19:00', 1),
(25, 132, '05:00', '21:00', '06:00', '08:00', '18:00', '20:00', 1),
(26, 134, '05:00', '10:00', '05:00', '05:00', '17:00', '17:00', 1),
(27, 135, '05:00', '22:00', '05:00', '10:00', '17:00', '21:00', 1),
(28, 136, '05:00', '09:00', '07:00', '08:00', '19:00', '20:00', 1),
(29, 137, '05:00', '21:00', '07:00', '09:00', '18:00', '21:00', 1),
(30, 138, '05:00', '21:00', '05:00', '05:00', '17:00', '17:00', 1),
(31, 140, '05:00', '21:00', '07:00', '08:00', '20:00', '21:00', 1),
(32, 141, '05:00', '21:00', '07:00', '08:00', '20:00', '21:00', 1),
(33, 109, '05:00', '21:00', '06:00', '07:00', '18:00', '19:00', 1),
(34, 146, '06:00', '21:00', '00:00', '00:00', '13:00', '14:00', 1),
(35, 150, '06:00', '21:00', '07:00', '09:00', '16:00', '21:00', 1),
(36, 152, '05:00', '22:00', '05:00', '10:00', '16:00', '22:00', 1),
(37, 156, '05:00', '21:00', '05:00', '08:00', '18:00', '21:00', 1),
(38, 158, '05:00', '22:00', '05:00', '10:00', '17:00', '22:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_05_20_100419_create_admins_table', 2),
('2014_10_12_200000_create_category_table', 3),
('2016_09_17_094247_create_orderhistories_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(255) NOT NULL,
  `price_id` int(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `amount` int(255) NOT NULL,
  `mobile_number` bigint(255) NOT NULL,
  `payment_status` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `price_id`, `name`, `email`, `amount`, `mobile_number`, `payment_status`) VALUES
(3, 1, 'ss', 'ss@gmail.com', 60, 1234567890, 0),
(4, 2, 'ss', 'ss@gmail.com', 60, 1234567890, 2),
(5, 476, 'ss', 'ss@gmail.com', 60, 1234567890, 2),
(6, 476, 'ss', 'ss@gmail.com', 60, 1234567890, 2),
(7, 476, 'Ss', 'Ss@gmail.com', 60, 1234567890, 2),
(8, 476, 'Ss', 'Ss@gmail.com', 60, 1234567890, 2),
(9, 476, 'ss', 'ss@gmail.com', 60, 1234567890, 2),
(10, 503, 'Sankar', 'San@gmail.com', 300, 8680939384, 2),
(11, 473, 'Shyam', 'Shyam@mail.com', 60, 8056768082, 2),
(12, 473, 'Ss', 'Ss@gmail.com', 60, 1234566890, 2),
(13, 473, 'Shyam', 'Shyam', 60, 1234567890, 2),
(14, 473, 'Rs', 'Jz', 60, 9977, 2),
(15, 473, 'Rs', 'Jz', 60, 9977, 2),
(16, 473, 'Rs', 'Jz', 60, 9977, 2),
(17, 473, 'Rs', 'Jz@gsj.cim', 60, 9977, 2),
(18, 473, 'Ds', 'Hshh', 60, 964956, 2),
(19, 473, 'Ss', 'Ss@gmail.com', 60, 8220131335, 2),
(20, 473, 'Ss', 'Ss@gmail.com', 60, 8220131335, 2),
(21, 473, 'Ds', 'Hshh', 60, 964956, 2),
(22, 473, 'Ss', 'Ss@gmail.com', 60, 8220131335, 2),
(23, 474, 'Ss', 'Ss@gmail.com', 800, 1234567890, 0),
(24, 474, 'Ss', 'Ssa@gmail.com', 800, 1234567890, 0),
(25, 475, 'Ss', 'Ssd@gmail.com', 7000, 1235678909, 0),
(26, 475, 'Ss', 'Ssdf@gmail.com', 7000, 1235678909, 0),
(27, 5, 'ss', 'ss@gmail.com', 60, 1234567890, 0),
(28, 5, 'ss', 'dilipwk@gmail.com', 60, 1234567890, 0),
(29, 6, 'ss', 'dilipwk@gmail.com', 60, 1234567890, 0),
(30, 503, 'Kk', 'Kk@kk.com', 300, 321, 2),
(31, 505, 'Jd', 'Jd', 9999, 966, 0),
(32, 505, 'Jdhh', 'Jd', 9999, 966, 0),
(33, 6, 'ss', 'dpwk@gmail.com', 60, 1234567890, 0),
(34, 503, 'Fdg', 'Xff', 300, 5256, 2),
(35, 473, 'Bbh', 'Bbb', 60, 999, 2),
(36, 332, 'Bbb', 'Bb', 23, 99, 2),
(37, 475, 'Ghb', 'vjnb@ghvv.con', 7000, 6985699, 0),
(38, 473, 'Dh', 'djdh', 60, 8668, 2),
(39, 332, 'bala', 'balasrain@gmail.com', 23, 9750134440, 0),
(40, 332, 'Sham', 'shammuthubabu@gmail.com', 23, 7502872744, 0),
(41, 332, 'Sham', 'shammuthubabu@gmail.com', 23, 7502872744, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `status` int(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `phonenumber`, `address`, `status`, `created_at`, `updated_at`) VALUES
(3, 'test', 'test@test.com', '$2y$10$KDiOA9LDpYxBzhKAWIDxUe3CjXOMLIajqTnILKnYzH/bPgBCm.EFS', 'CWAwmQzUoSILAmT2uvftg9Kdxa8ha6Q6XZdtQfJFSP8Bwg5KUSQynKuCBcR7', '9032433253', 'test', 1, '2016-09-17 02:17:18', '2016-09-22 04:50:41'),
(4, 'surya', 'surya@systimanx.com', '$2y$10$9Xr0MNq7vdRSGSBz5kJCU.XFgvdgpSZzS6QjWOOH2v1gYytCsLgx.', '5mRSLJJPQAj28Qhdqes2OUwLRddOSnLFzoYlXzg6YRMLiewJuez5eO1UUbq3', '7899004342', 'test', 1, '2016-09-17 02:21:20', '2016-09-17 02:36:43'),
(5, 'bala', 'balasrain@gmail.com', '$2y$10$fmh1E1kNlvOK1OuB8R9Yp.OV/UYh4rW/OlQpWcaZpa9B16Jl5R.dK', 'JFNUp1tCvpoIn4PJuaps9xkRRayvaHtV0AzOH83edpbZLoO7bXKXJDfD5HQ1', '9750134440', 'adsfadsfadsfafsd', 0, '2017-01-10 05:27:26', '2017-01-10 07:19:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `gym_banner_master`
--
ALTER TABLE `gym_banner_master`
  ADD PRIMARY KEY (`ban_id`);

--
-- Indexes for table `gym_category_mapping`
--
ALTER TABLE `gym_category_mapping`
  ADD PRIMARY KEY (`cat_map_id`);

--
-- Indexes for table `gym_category_master`
--
ALTER TABLE `gym_category_master`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `gym_duration_master`
--
ALTER TABLE `gym_duration_master`
  ADD PRIMARY KEY (`dur_id`);

--
-- Indexes for table `gym_features`
--
ALTER TABLE `gym_features`
  ADD PRIMARY KEY (`fe_id`);

--
-- Indexes for table `gym_features_mapping`
--
ALTER TABLE `gym_features_mapping`
  ADD PRIMARY KEY (`fea_map_id`);

--
-- Indexes for table `gym_mobile_otp`
--
ALTER TABLE `gym_mobile_otp`
  ADD PRIMARY KEY (`otp_id`),
  ADD KEY `inx_otp_mobile_no` (`mobile_no`),
  ADD KEY `inx_otp_otp` (`otp`),
  ADD KEY `inx_otp_status` (`status`);

--
-- Indexes for table `gym_package_master`
--
ALTER TABLE `gym_package_master`
  ADD PRIMARY KEY (`pak_id`);

--
-- Indexes for table `gym_package_price`
--
ALTER TABLE `gym_package_price`
  ADD PRIMARY KEY (`pak_price_id`),
  ADD KEY `fk_gym_package_pak_id_idx` (`pak_id`);

--
-- Indexes for table `gym_payment_master`
--
ALTER TABLE `gym_payment_master`
  ADD PRIMARY KEY (`cus_pay_id`);

--
-- Indexes for table `gym_profile_master`
--
ALTER TABLE `gym_profile_master`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `gym_trainer_master`
--
ALTER TABLE `gym_trainer_master`
  ADD PRIMARY KEY (`tra_id`);

--
-- Indexes for table `gym_type_mapping`
--
ALTER TABLE `gym_type_mapping`
  ADD PRIMARY KEY (`type_map_id`);

--
-- Indexes for table `gym_type_master`
--
ALTER TABLE `gym_type_master`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `gym_working_hour`
--
ALTER TABLE `gym_working_hour`
  ADD PRIMARY KEY (`wrk_hr_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;
--
-- AUTO_INCREMENT for table `gym_banner_master`
--
ALTER TABLE `gym_banner_master`
  MODIFY `ban_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;
--
-- AUTO_INCREMENT for table `gym_category_mapping`
--
ALTER TABLE `gym_category_mapping`
  MODIFY `cat_map_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;
--
-- AUTO_INCREMENT for table `gym_category_master`
--
ALTER TABLE `gym_category_master`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `gym_duration_master`
--
ALTER TABLE `gym_duration_master`
  MODIFY `dur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `gym_features`
--
ALTER TABLE `gym_features`
  MODIFY `fe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `gym_features_mapping`
--
ALTER TABLE `gym_features_mapping`
  MODIFY `fea_map_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1923;
--
-- AUTO_INCREMENT for table `gym_mobile_otp`
--
ALTER TABLE `gym_mobile_otp`
  MODIFY `otp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `gym_package_master`
--
ALTER TABLE `gym_package_master`
  MODIFY `pak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `gym_package_price`
--
ALTER TABLE `gym_package_price`
  MODIFY `pak_price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=749;
--
-- AUTO_INCREMENT for table `gym_payment_master`
--
ALTER TABLE `gym_payment_master`
  MODIFY `cus_pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=666;
--
-- AUTO_INCREMENT for table `gym_profile_master`
--
ALTER TABLE `gym_profile_master`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `gym_trainer_master`
--
ALTER TABLE `gym_trainer_master`
  MODIFY `tra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gym_type_mapping`
--
ALTER TABLE `gym_type_mapping`
  MODIFY `type_map_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=327;
--
-- AUTO_INCREMENT for table `gym_type_master`
--
ALTER TABLE `gym_type_master`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `gym_working_hour`
--
ALTER TABLE `gym_working_hour`
  MODIFY `wrk_hr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `gym_package_price`
--
ALTER TABLE `gym_package_price`
  ADD CONSTRAINT `fk_gym_package_pak_id` FOREIGN KEY (`pak_id`) REFERENCES `gym_package_master` (`pak_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
