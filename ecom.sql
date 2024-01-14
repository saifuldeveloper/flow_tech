-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2024 at 06:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$aO/TNjtPPufM5GQ.r7CT/ucXWYkqKimh0nd2/Pkp23B4GbmQhgBD.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogreviews`
--

CREATE TABLE `blogreviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogreviews`
--

INSERT INTO `blogreviews` (`id`, `blog_id`, `name`, `email`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '3', 'shihab', 'shihab90@gmail.com', 'afdsfasdfsdfsadfsadfasdf', '2023-12-06 22:16:23', NULL, NULL),
(2, '3', 'afdsfasd', 'asfdfasfasd', 'afdsfasdfasdf', '2023-12-07 04:33:57', NULL, NULL),
(3, '3', 'Md Makshudul Haque', 'shihab@gmail.com', 'The best way for the Product Owner to summarize which items are accepted and considered “done,” demonstrate features completed, and review the team’s commitments, is to use a presentation-style format. Sprint Review presentations can be stored in an accessible team folder and provide a convenient, informative summation for stakeholders who are unable to attend the review. The Product Owner, or team member presenting, should always prepare and practice before the meeting. While the Scrum Master should ensure the reviews for the upcoming few sprints are scheduled ahead of time to enable stakeholders to plan their attendance.', '2023-12-07 04:36:40', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `autor_name` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `autor_name`, `meta_description`, `meta_tag`, `short_description`, `long_description`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Md shihab uddin', 'this is my choice', 'software, larave,php', 'Life of Software development', '<div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: &quot;JetBrains Mono&quot;, Consolas, &quot;Courier New&quot;, monospace; line-height: 19px; white-space: pre;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif; letter-spacing: normal; white-space: normal; background-color: rgb(255, 255, 255);\">A geyser is not just a home appliance, it\'s a lifesaver as winter approaches. No one likes a cold shower in the freezing weather. Hot water becomes very important during the season. A water heater or geyser can heat water quickly and store it for long periods of time. Buying the right geyser can be confusing and that’s where we come in. We are here to guide you in choosing the best geyser for your needs. Our experts have done all the research so that you don’t have to. In this buying guide, we will walk you through everything that you must know before buying a geyser in Bangladesh.<br style=\"margin: 0px; padding: 0px;\"></p><h2 style=\"margin: 15px 0px 5px; padding: 0px; font-weight: bold; font-size: 20px; line-height: 26px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif; letter-spacing: normal; white-space: normal; background-color: rgb(255, 255, 255);\">Why is Geyser Essential in Daily Life?</h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif; letter-spacing: normal; white-space: normal; background-color: rgb(255, 255, 255);\">A&nbsp;<a href=\"https://www.startech.com.bd/geyser-water-heater\" target=\"\" style=\"margin: 0px; padding: 0px; text-decoration: none; color: var(--s-primary);\">geyser</a>&nbsp;plays a significant role in the cold weather providing a reliable source of warmth for several household activities. These water heater geysers provide hot water for washing dishes, taking showers, and washing clothes. A geyser provides relaxation and stress relief by offering warm showers and baths. Geyser and water heaters are not just for the bathroom, they are also important for the kitchen as it makes things easier when choking and cleaning. That is why a geyser or water heater becomes an essential kitchen or home appliance in the winter season.</p><h2 style=\"margin: 15px 0px 5px; padding: 0px; font-weight: bold; font-size: 20px; line-height: 26px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif; letter-spacing: normal; white-space: normal; background-color: rgb(255, 255, 255);\">How to Choose the Right Water Heater For Your Home?</h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif; letter-spacing: normal; white-space: normal; background-color: rgb(255, 255, 255);\">Buying a geyser in Bangladesh requires careful consideration of various factors to make sure that you get the perfect geyser for your home. So let\'s dive into the world of geysers and help you make an informed buying decision:</p><img src=\"https://www.startech.com.bd/image/catalog/blog/2023/geyser-buying-guide/geyser-buying-guide-how-to-choose-a-water-heater.jpg\" alt=\"Geyser Buying Guide: Choose the Perfect Water Heater\" width=\"820\" height=\"390\" style=\"margin: 0px; padding: 0px; border-style: none; max-width: 100%; height: auto; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; letter-spacing: normal; white-space: normal; background-color: rgb(255, 255, 255);\"><h3 style=\"margin: 15px 0px 5px; padding: 0px; font-weight: bold; font-size: 18px; line-height: 24px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif; letter-spacing: normal; white-space: normal; background-color: rgb(255, 255, 255);\">Type of Geyser</h3><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif; letter-spacing: normal; white-space: normal; background-color: rgb(255, 255, 255);\">When choosing a water heater for your home first you need to determine whether you want instant heating or a continuous supply of hot water. There are two types of water heater geysers available in the market; Instant Geyser and Storage Geyser. Selecting the right type for you depends on your specific needs and preferences. If you live in a small space and require instant hot water, you should go for the Instant Geyser. This type of geyser is usually compact and heats water on demand. Or if you are looking for a geyser for continuous hot water supply for multiple family members, you might want to choose the Storage Geyser. This type of geyser comes with a storage tank and can provide hot water for longer periods of time.</p><img src=\"https://www.startech.com.bd/image/catalog/blog/2023/geyser-buying-guide/geyser-buying-guide-intant-vs-storage.jpg\" alt=\"Geyser Buying Guide: Choose the Perfect Water Heater\" width=\"820\" height=\"390\" style=\"margin: 0px; padding: 0px; border-style: none; max-width: 100%; height: auto; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; letter-spacing: normal; white-space: normal; background-color: rgb(255, 255, 255);\"><h3 style=\"margin: 15px 0px 5px; padding: 0px; font-weight: bold; font-size: 18px; line-height: 24px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif; letter-spacing: normal; white-space: normal; background-color: rgb(255, 255, 255);\">Capacity</h3><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif; letter-spacing: normal; white-space: normal; background-color: rgb(255, 255, 255);\">Remember to consider the size of your family and hot water requirements when choosing a water heater or geyser for your household. The capacity of the geyser should be enough to meet your family\'s demands. If you have a family of 2-3 members, a 10-15 liter storage geyser or 6-liter instant geyser should be perfect. For a bigger family consisting of 4-8 members, a 25 liter storage geyser is ideal. If your family is likely to expand, choose a geyser with a higher capacity to meet future requirements. To help you in determining the ideal geyser size, we have prepared a chart for easy calculation.</p><table style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; letter-spacing: normal; white-space: normal; background-color: rgb(255, 255, 255); border: none; width: 820px;\"><colgroup style=\"margin: 0px; padding: 0px;\"><col width=\"100\" style=\"margin: 0px; padding: 0px;\"><col width=\"284\" style=\"margin: 0px; padding: 0px;\"><col width=\"113\" style=\"margin: 0px; padding: 0px;\"><col width=\"127\" style=\"margin: 0px; padding: 0px;\"></colgroup><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; height: 15.75pt;\"><td colspan=\"4\" style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.38; text-align: center;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline; font-weight: bold;\">Geyser size calculator</span></p></td></tr><tr style=\"margin: 0px; padding: 0px; height: 15.75pt;\"><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.38; text-align: center;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline; font-weight: bold;\">Family Size</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.38; text-align: center;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline; font-weight: bold;\">Purpose of Hot Water</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.38; text-align: center;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline; font-weight: bold;\">Geyser Type</span></p></td><td style=\"margin: 0px; padding: 2pt; width: 245.688px; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.38; text-align: center;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline; font-weight: bold;\">Recommended Geyser Capacity</span></p></td></tr><tr style=\"margin: 0px; padding: 0px; height: 15.75pt;\"><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">2-3 members</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">For bathing using bucket</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">Instant Geyser</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">6 liters</span></p></td></tr><tr style=\"margin: 0px; padding: 0px; height: 16.5pt;\"><td style=\"margin: 0px; padding: 2pt; border-right-width: 0.75pt; border-right-color: rgb(204, 204, 204); border-bottom-width: 0.75pt; border-bottom-color: rgb(204, 204, 204); border-top-width: 0.75pt; border-top-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">2-3 members</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">For bathing using bucket</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">Storage Geyser</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">10 Liters to 15 Liters</span></p></td></tr><tr style=\"margin: 0px; padding: 0px; height: 16.5pt;\"><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">2-3 members</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">For bathing using shower</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">Storage Geyser</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">25 Liters</span></p></td></tr><tr style=\"margin: 0px; padding: 0px; height: 16.5pt;\"><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">2-3 members</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">For washing kitchen utensils or for hand wash</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">Instant Geyser</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">1 Liter to 3 Liters</span></p></td></tr><tr style=\"margin: 0px; padding: 0px; height: 15.75pt;\"><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">4-8 members</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">For bathing using bucket</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">Instant Geyser</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">6 liters</span></p></td></tr><tr style=\"margin: 0px; padding: 0px; height: 15pt;\"><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">4-8 members</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">For bathing using bucket</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">Storage Geyser</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">25 Liters</span></p></td></tr><tr style=\"margin: 0px; padding: 0px; height: 10.5pt;\"><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">4-8 members</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">For bathing using shower</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">Storage Geyser</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">25 Liters</span></p></td></tr><tr style=\"margin: 0px; padding: 0px; height: 12pt;\"><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">4-8 members</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">For washing kitchen utensils or for hand wash</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">Instant Geyser</span></p></td><td style=\"margin: 0px; padding: 2pt; border-width: 0.75pt; border-color: rgb(204, 204, 204); vertical-align: bottom; overflow: hidden; overflow-wrap: break-word;\"><p dir=\"ltr\" style=\"margin: 0pt 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 1.2;\"><span style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline;\">1 Liter to 3 Liters</span></p></td></tr></tbody></table><h3 style=\"margin: 15px 0px 5px; padding: 0px; font-weight: bold; font-size: 18px; line-height: 24px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif; letter-spacing: normal; white-space: normal; background-color: rgb(255, 255, 255);\">Wattage</h3><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif; letter-spacing: normal; white-space: normal; background-color: rgb(255, 255, 255);\">Choosing the right wattage for your water heater geyser is crucial for water heating. The time a geyser needs to heat water depends on the geyser’s wattage. The wattage of small water heaters or instant geysers can go up to 5000 watts as they heat water on demand. The standard storage geysers may have lower wattage up to 2000 watts. You should choose the wattage that aligns with your hot water needs and budget.</p><h3 style=\"margin: 15px 0px 5px; padding: 0px; font-weight: bold; font-size: 18px; line-height: 24px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif; letter-spacing: normal; white-space: normal; background-color: rgb(255, 255, 255);\">Heating Element</h3><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif; letter-spacing: normal; white-space: normal; background-color: rgb(255, 255, 255);\">When buying a water heater or geyser, consider the heating element for efficient and effective water heating. There are basically two types of heating elements used in geysers. You can choose between Copper Heating Element and Stainless Steel Heating Element. The copper heating element is known for faster heating but comes at a slightly higher cost. The stainless steel heating element is durable and offers longevity but may have a slightly slower heating time compared to copper. Choose according to your preference whether you want speed of heating or long-term durability.</p><img src=\"https://www.startech.com.bd/image/catalog/blog/2023/geyser-buying-guide/geyser-buying-guide-copper-vs-stainless-steel.jpg\" alt=\"Geyser Buying Guide: Choose the Perfect Water Heater\" width=\"820\" height=\"390\" style=\"margin: 0px; padding: 0px; border-style: none; max-width: 100%; height: auto; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; letter-spacing: normal; white-space: normal; background-color: rgb(255, 255, 255);\"><h3 style=\"margin: 15px 0px 5px; padding: 0px; font-weight: bold; font-size: 18px; line-height: 24px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif; letter-spacing: normal; white-space: normal; background-color: rgb(255, 255, 255);\">Mounting Style</h3><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif; letter-spacing: normal; white-space: normal; background-color: rgb(255, 255, 255);\">Selecting the right mounting style for your geyser is crucial for its installation and usage. There are two types of geyser mounting styles to choose from; Vertical and Horizontal. The most common type of geyser currently available in the market is mounted vertically. Vertical Mounting geysers are ideal for smaller bathrooms or areas with space constraints. If your bathroom ceiling is low, you may want to pick the Horizontal Mounting geysers as they are designed for ample ceiling space. The shape of the water heater and mounting style depends on the size and space available in your washroom.</p><h3 style=\"margin: 15px 0px 5px; padding: 0px; font-weight: bold; font-size: 18px; line-height: 24px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif; letter-spacing: normal; white-space: normal; background-color: rgb(255, 255, 255);\">Technology</h3><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif; letter-spacing: normal; white-space: normal; background-color: rgb(255, 255, 255);\">Based on various technologies and energy sources there are three types of geysers are available - Electric, Gas, and Solar water heaters. Electric water heaters geyser offer ease of installation and widespread accessibility, while gas heaters offer fast heating and are preferred for larger households. Electric power is widely available in most areas, making electric water heaters accessible. Solar water heaters use energy from the sun, providing a renewable and cost-efficient solution, especially in sunny climates. The choice between these geysers depends on factors such as location, budget, and personal preferences.</p><h3 style=\"margin: 15px 0px 5px; padding: 0px; font-weight: bold; font-size: 18px; line-height: 24px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif; letter-spacing: normal; white-space: normal; background-color: rgb(255, 255, 255);\">Budget</h3><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif; letter-spacing: normal; white-space: normal; background-color: rgb(255, 255, 255);\">Budget is a key factor when buying a geyser water heater for your home. Your budget directly influences your purchase. Selecting a geyser according to your spending limit is a good decision. It affects the initial cost and maintenance expenses. Different geyser models have different energy efficiency levels. More energy-efficient geysers might be expensive initially but can result in long-term savings.</p></div>', 'media/blog/1784512248500327.jpg', NULL, NULL),
(3, 'Magee Sherman', 'Voluptatem quia nequ', 'Iste sint ea sapient', 'Facilis accusantium', 'afdsfasdfasdfsd fasdfsdafasd asfafsdafsadfas afasdfasdfsdf', 'media/blog/1784512560437727.jpg', NULL, NULL),
(4, 'Kay Cherry', 'Ratione laboris veli', 'Sint magni nostrud', 'Totam blanditiis del', 'Nulla corporis volup. afsdfasdfdsafasdfdsafasdfasd asfasdfsd', 'media/blog/1784512690551196.jpeg', '2023-12-06 00:25:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) DEFAULT NULL,
  `brand_logo` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_logo`, `meta_tag`, `meta_description`, `created_at`, `updated_at`) VALUES
(5, 'Toshiba', 'media/brand/1786547767661036.png', NULL, NULL, '2023-12-28 17:32:01', '2023-12-28 17:32:01'),
(6, 'Canon', 'media/brand/1786547784789492.png', NULL, NULL, '2023-12-28 17:32:17', '2023-12-28 17:32:17'),
(7, 'Epson', 'media/brand/1786547799504478.png', NULL, NULL, '2023-12-28 17:32:31', '2023-12-28 17:32:31'),
(8, 'Brother', 'media/brand/1786547812216159.png', NULL, NULL, '2023-12-28 17:32:43', '2023-12-28 17:32:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `category_img` varchar(255) DEFAULT NULL,
  `meta_tag` text DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_img`, `meta_tag`, `meta_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 'laptop', 'media/category/1781890560111691.webp', NULL, NULL, '2023-10-21 05:22:21', '2023-11-07 01:47:41', NULL),
(14, 'Drone', 'media/category/1781890607034347.png', NULL, NULL, '2023-10-21 05:23:56', '2023-11-07 01:48:26', NULL),
(15, 'Computer', 'media/category/1784420890800328.jpg', 'small compter,short computer,long computer', 'afdsfasdfdsaf asfdasdfasdf adfasdfds', '2023-10-22 04:20:31', '2023-12-05 00:06:13', NULL),
(16, 'Monitor', 'media/category/1784420926786628.jpg', 'asfdf adsfasf asdfasfda afddsaf,afdfds', 'adsfsafasdfsdafsadfdsfasdfsdaf', '2023-12-05 00:06:47', '2023-12-05 00:06:47', NULL),
(17, 'Offer', 'media/category/1784896946414074.jpg', 'Best Offer', NULL, '2023-12-10 06:12:55', '2023-12-10 06:12:55', NULL),
(18, 'Toshiba Photocopy machine', 'media/category/1786547342640156.jpg', NULL, NULL, '2023-12-28 17:25:15', '2023-12-28 17:25:15', NULL),
(19, 'Color Printer', 'media/category/1786547365500938.jpg', NULL, NULL, '2023-12-28 17:25:37', '2023-12-28 17:25:37', NULL),
(20, 'Photocopier Accesories', 'media/category/1786547386105178.jpg', NULL, NULL, '2023-12-28 17:25:57', '2023-12-28 17:25:57', NULL),
(21, 'Toner', 'media/category/1786547405749219.jpg', NULL, NULL, '2023-12-28 17:26:15', '2023-12-28 17:26:15', NULL),
(22, 'dfdadf', 'media/category/1786870460153579.png', NULL, 'adfadsf', '2024-01-01 00:33:31', '2024-01-01 01:01:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chlild_categories`
--

CREATE TABLE `chlild_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `category_img` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chlild_categories`
--

INSERT INTO `chlild_categories` (`id`, `sub_category_id`, `category_name`, `category_img`, `meta_description`, `meta_tag`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 10, 'Camra', 'media/category/1786869645084264.jpg', 'adsfasdfdsfadsf', 'sd', '2024-01-01 00:48:07', '2024-01-01 00:58:03', NULL),
(3, 8, 'adsf', 'media/category/1786877185394490.jpg', 'asdf', 'adsf,dfdf', '2024-01-01 02:47:58', '2024-01-01 02:47:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `combos`
--

CREATE TABLE `combos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `first_product_name` varchar(255) DEFAULT NULL,
  `first_discount_price` varchar(255) DEFAULT NULL,
  `first_selling_price` varchar(255) DEFAULT NULL,
  `image_one` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `combos`
--

INSERT INTO `combos` (`id`, `product_id`, `first_product_name`, `first_discount_price`, `first_selling_price`, `image_one`, `status`, `created_at`, `updated_at`) VALUES
(7, '2', 'hp-1', '300', '500', 'media/combo/1786425339699202.png', NULL, '2023-12-27 09:06:04', '2023-12-27 09:06:04'),
(8, '2', 'hp-2', '500', '600', 'media/combo/1786425340249103.jpeg', NULL, '2023-12-27 09:06:05', '2023-12-27 09:06:05'),
(9, '2', 'hp-3', '800', '1000', 'media/combo/1786425340354137.png', NULL, '2023-12-27 09:06:05', '2023-12-27 09:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'uddin', '100', NULL, NULL),
(2, 'shihab-12', '10', NULL, NULL);

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
-- Table structure for table `homesitesliders`
--

CREATE TABLE `homesitesliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marquee` varchar(255) DEFAULT NULL,
  `slider_img` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homesitesliders`
--

INSERT INTO `homesitesliders` (`id`, `marquee`, `slider_img`, `meta_tag`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, '30th October Thursday, our all outlets are open. Additionally, our online activities are open and operational.', 'media/slider/1785506443858051.png', 'Ipsum nulla exceptur', 'Ipsum vero veniam sdafdasfsdfasdfdsfsdafsdafsdffasdfsdaf', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `indexsitesliders`
--

CREATE TABLE `indexsitesliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marquee` varchar(255) DEFAULT NULL,
  `slider_img` varchar(255) DEFAULT NULL,
  `slider_img_one` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indexsitesliders`
--

INSERT INTO `indexsitesliders` (`id`, `marquee`, `slider_img`, `slider_img_one`, `meta_tag`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, '21th October Thursday, our all outlets are open. Additionally, our online activities are open and operational.', 'media/slider/1785509550685349.jpg', 'media/slider/1785509550722126.jpg', 'afdsf,afdsaf', 'Dolor sunt nesciuntafdsfasf', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `indexsliders`
--

CREATE TABLE `indexsliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marquee` varchar(255) DEFAULT NULL,
  `slider_img` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indexsliders`
--

INSERT INTO `indexsliders` (`id`, `marquee`, `slider_img`, `title`, `meta_description`, `meta_tag`, `created_at`, `updated_at`) VALUES
(1, 'dsgdsgsdgsdg', 'media/slider/1785505758048399.webp', 'Ut ipsum nostrum qui', 'dafsd dfasdfsdafasd afsdfasdfsdaf', 'Ullamco molestiae of,shihab', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_19_111024_create_admins_table', 2),
(6, '2023_10_21_092605_create_categories_table', 3),
(7, '2023_10_21_110718_create_sub_categories_table', 4),
(9, '2023_10_22_042959_create_brands_table', 5),
(10, '2023_10_22_041829_create_products_table', 6),
(11, '2023_10_22_074329_orders', 7),
(12, '2023_09_03_093200_create_brands_table', 8),
(14, '2023_09_15_141722_create_coupons_table', 8),
(15, '2023_09_16_075953_create_sliders_table', 9),
(16, '2023_10_02_102151_create_orders_table', 9),
(17, '2023_10_02_102505_create_orders_deatils_table', 9),
(18, '2023_09_16_094027_create_subscribes_table', 10),
(20, '2023_09_15_140334_create_settings_table', 11),
(21, '2023_10_02_102715_create_shipping_table', 12),
(24, '2023_11_26_110133_create_combos_table', 13),
(25, '2023_09_16_075953_create_indexsliders_table', 14),
(26, '2023_09_03_093200_create_blogs_table', 15),
(27, '2023_09_16_075953_create_homesitesliders_table', 16),
(28, '2023_09_16_075953_create_indexsitesliders_table', 17),
(29, '2023_10_21_110718_create_shipments_table copy', 18),
(30, '2023_10_21_092605_create_blogreviews_table', 19),
(31, '2024_01_01_053720_create_chlild_categories_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `subtotal` varchar(255) DEFAULT NULL,
  `shipping` varchar(255) DEFAULT NULL,
  `coupon_name` varchar(255) DEFAULT NULL,
  `coupon_discount` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0',
  `month` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `shipping`, `coupon_name`, `coupon_discount`, `total`, `status`, `month`, `date`, `year`, `created_at`, `updated_at`) VALUES
(8, NULL, '448432.00', '120', 'shihab-12', '10', '448542', '1', 'November', '26-11-23', '2023', '2023-11-26 02:03:28', NULL),
(9, NULL, '424239.00', '120', NULL, NULL, '424359', '0', 'November', '26-11-23', '2023', '2023-11-26 02:59:52', NULL),
(10, NULL, '424239.00', '120', 'shihab-12', '10', '424349', '0', 'November', '26-11-23', '2023', '2023-11-26 03:17:00', NULL),
(11, NULL, '4234320.00', '120', NULL, NULL, '4234440', '0', 'November', '26-11-23', '2023', '2023-11-26 03:22:28', NULL),
(12, '2', '761.00', '120', NULL, NULL, '881', '0', 'November', '26-11-23', '2023', '2023-11-26 03:24:35', NULL),
(13, NULL, '423432.00', '120', NULL, NULL, '423552', '0', 'November', '26-11-23', '2023', '2023-11-26 03:25:25', NULL),
(14, '2', '1270296.00', '120', 'shihab-12', '10', '1270406', '0', 'November', '26-11-23', '2023', '2023-11-26 03:30:55', NULL),
(15, NULL, '847142.00', '120', 'shihab-12', '10', '847252', '0', 'November', '28-11-23', '2023', '2023-11-28 06:00:13', NULL),
(16, NULL, '552', '200', 'uddin', '100', '472', '0', 'December', '07-12-23', '2023', '2023-12-07 00:15:48', NULL),
(17, NULL, '414', '60', NULL, NULL, '474', '1', 'December', '10-12-23', '2023', '2023-12-10 05:59:35', NULL),
(18, '2', '7610', '60', NULL, NULL, '7670', '1', 'December', '10-12-23', '2023', '2023-12-10 06:38:07', NULL),
(19, NULL, '423432', '200', NULL, NULL, '423632', '0', 'December', '18-12-23', '2023', '2023-12-18 04:21:53', NULL),
(20, NULL, '452', '0', NULL, NULL, '452.00', '0', 'December', '18-12-23', '2023', '2023-12-18 04:29:13', NULL),
(21, NULL, '46', '60', NULL, NULL, '106', '0', 'December', '18-12-23', '2023', '2023-12-18 04:32:55', NULL),
(22, NULL, '752', '200', NULL, NULL, '952', '0', 'December', '18-12-23', '2023', '2023-12-18 04:47:00', NULL),
(23, NULL, '652', '0', NULL, NULL, '652.00', '0', 'December', '18-12-23', '2023', '2023-12-18 04:47:31', NULL),
(24, NULL, '0', NULL, NULL, NULL, NULL, '0', 'December', '22-12-23', '2023', '2023-12-22 07:24:50', NULL),
(25, NULL, '0', NULL, NULL, NULL, NULL, '0', 'December', '22-12-23', '2023', '2023-12-22 07:24:51', NULL),
(26, NULL, '0', NULL, NULL, NULL, NULL, '0', 'December', '22-12-23', '2023', '2023-12-22 07:24:52', NULL),
(27, NULL, '452', NULL, NULL, NULL, NULL, '0', 'December', '26-12-23', '2023', '2023-12-26 01:21:34', NULL),
(28, NULL, '847464', NULL, NULL, NULL, NULL, '3', 'December', '27-12-23', '2023', '2023-12-27 01:04:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `singleprice` varchar(255) DEFAULT NULL,
  `totalprice` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`id`, `order_id`, `product_id`, `product_name`, `quantity`, `singleprice`, `totalprice`, `created_at`, `updated_at`) VALUES
(7, '7', '3', 'asus', '1', '423432', '423432', '2023-11-26 01:43:37', NULL),
(8, '7', '4', 'Britanney Bright', '1', '761', '761', '2023-11-26 01:43:37', NULL),
(9, '7', '5', 'Mark Short', '1', '46', '46', '2023-11-26 01:43:37', NULL),
(10, '8', '2', 'hp loptop', '1', '25000', '25000', '2023-11-26 02:03:28', NULL),
(11, '8', '3', 'asus', '1', '423432', '423432', '2023-11-26 02:03:28', NULL),
(12, '9', '3', 'asus', '1', '423432', '423432', '2023-11-26 02:59:52', NULL),
(13, '9', '4', 'Britanney Bright', '1', '761', '761', '2023-11-26 02:59:52', NULL),
(14, '9', '5', 'Mark Short', '1', '46', '46', '2023-11-26 02:59:52', NULL),
(15, '10', '3', 'asus', '1', '423432', '423432', '2023-11-26 03:17:00', NULL),
(16, '10', '4', 'Britanney Bright', '1', '761', '761', '2023-11-26 03:17:00', NULL),
(17, '10', '5', 'Mark Short', '1', '46', '46', '2023-11-26 03:17:00', NULL),
(18, '11', '3', 'asus', '10', '423432', '4234320', '2023-11-26 03:22:28', NULL),
(19, '12', '4', 'Britanney Bright', '1', '761', '761', '2023-11-26 03:24:35', NULL),
(20, '13', '3', 'asus', '1', '423432', '423432', '2023-11-26 03:25:25', NULL),
(21, '14', '3', 'asus', '3', '423432', '1270296', '2023-11-26 03:30:55', NULL),
(22, '15', '3', 'asus', '2', '423432', '846864', '2023-11-28 06:00:13', NULL),
(23, '15', '1', 'Kristen Reynolds', '1', '278', '278', '2023-11-28 06:00:13', NULL),
(24, '16', '6', 'Athena Odonnell', '1', '452', '452', '2023-12-07 00:15:48', NULL),
(25, '17', '5', 'Mark Short', '9', '46', '414', '2023-12-10 05:59:35', NULL),
(26, '18', '4', 'Britanney Bright', '10', '761', '7610', '2023-12-10 06:38:07', NULL),
(27, '19', '3', 'asus', '1', '423432', '423432', '2023-12-18 04:21:53', NULL),
(28, '20', '6', 'Athena Odonnell', '1', '452', '452', '2023-12-18 04:29:13', NULL),
(29, '21', '5', 'Mark Short', '1', '46', '46', '2023-12-18 04:32:55', NULL),
(30, '22', '8', 'Product-1', '1', '300', '300', '2023-12-18 04:47:00', NULL),
(31, '22', '6', 'Athena Odonnell', '1', '452', '452', '2023-12-18 04:47:00', NULL),
(32, '23', '10', 'Product-31', '1', '200', '200', '2023-12-18 04:47:31', NULL),
(33, '23', '6', 'Athena Odonnell', '1', '452', '452', '2023-12-18 04:47:31', NULL),
(34, '27', '6', 'Athena Odonnell', '1', '452', '452', '2023-12-26 01:21:34', NULL),
(35, '28', '3', 'asus', '2', '423432', '846864', '2023-12-27 01:04:53', NULL),
(36, '28', '8', 'Product-1', '2', '300', '600', '2023-12-27 01:04:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `child_category_id` bigint(20) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `product_quantity` varchar(255) DEFAULT NULL,
  `product_details` text DEFAULT NULL,
  `product_color` varchar(255) DEFAULT NULL,
  `availability` varchar(255) DEFAULT NULL,
  `product_size` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `selling_price` varchar(255) DEFAULT NULL,
  `discount_price` varchar(255) DEFAULT NULL,
  `what_is_the` text DEFAULT NULL,
  `specification` text DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `main_slider` int(11) DEFAULT NULL,
  `hot_deal` int(11) DEFAULT NULL,
  `best_rated` int(11) DEFAULT NULL,
  `mid_slider` int(11) DEFAULT NULL,
  `hot_new` int(11) DEFAULT NULL,
  `trend` int(11) DEFAULT NULL,
  `image_one` varchar(255) DEFAULT NULL,
  `image_two` varchar(255) DEFAULT NULL,
  `image_three` varchar(255) DEFAULT NULL,
  `image_four` varchar(255) DEFAULT NULL,
  `image_five` varchar(255) DEFAULT NULL,
  `image_six` varchar(255) DEFAULT NULL,
  `buyone_getone` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `child_category_id`, `brand_id`, `product_name`, `product_code`, `product_quantity`, `product_details`, `product_color`, `availability`, `product_size`, `meta_tag`, `meta_description`, `selling_price`, `discount_price`, `what_is_the`, `specification`, `long_description`, `video_link`, `main_slider`, `hot_deal`, `best_rated`, `mid_slider`, `hot_new`, `trend`, `image_one`, `image_two`, `image_three`, `image_four`, `image_five`, `image_six`, `buyone_getone`, `status`, `created_at`, `updated_at`) VALUES
(2, 12, 8, NULL, 5, 'hp loptop', '2563', '10', 'afadsfasdfsdfsdafasdfsdaf', 'red', '', '15 inch', NULL, NULL, '3000', '25000', NULL, NULL, NULL, 'https://www.youtube.com', NULL, NULL, NULL, NULL, NULL, NULL, 'media/product/1786882430804928.png', 'media/product/1781881685277052.jpg', 'media/product/1781881685340169.jpg', 'media/product/1786882430852103.png', 'media/product/1786882430890439.jpeg', 'media/product/1786882431024507.jpg', NULL, 1, '2023-11-06 23:26:38', '2023-11-06 23:26:38'),
(3, 12, 7, NULL, 6, 'asus', 'fadf', '20', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; letter-spacing: normal;\"><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">MPN: NX.KDESI.007</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Model: shihab</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Processor: AMD Ryzen 3 7320U (2.4GHz up to 4.1GHz, 4 cores)</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">RAM: 8GB DDR5, Storage: 512GB SSD</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Display: 15.6\" FHD (1920x1080) TFT LCD</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Features: Stereo Speaker, HD webcam</li><li class=\"view-more\" data-area=\"specification\" style=\"margin: 0px; padding: 0px 0px 2px; display: inline-block; line-height: 24px; color: rgb(229, 51, 11); border-bottom: 1px solid rgb(229, 51, 11); cursor: pointer;\"></li></ul>', 'fafds', 'In Stock', 'afds', NULL, NULL, '1500', '423432', NULL, NULL, NULL, 'https://www.youtube.com/watch?v=HDZbWkxW064', NULL, NULL, 1, NULL, NULL, NULL, 'media/product/1783782275069911.webp', 'media/product/1783782275204992.webp', 'media/product/1783782275302856.webp', NULL, NULL, NULL, NULL, 1, '2023-11-07 01:25:44', '2023-11-07 01:25:44'),
(4, 12, 8, NULL, 7, 'Britanney Bright', 'Optio sit dolorum e', '25', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; letter-spacing: normal;\"><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">MPN: NX.KDESI.007</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Model: shihab</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Processor: AMD Ryzen 3 7320U (2.4GHz up to 4.1GHz, 4 cores)</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">RAM: 8GB DDR5, Storage: 512GB SSD</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Display: 15.6\" FHD (1920x1080) TFT LCD</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Features: Stereo Speaker, HD webcam</li></ul>', 'Ut perferendis provi', '', 'Deserunt beatae pari', NULL, NULL, '370', '761', NULL, NULL, NULL, 'https://www.youtube.com/watch?v=DAl3dbTnAgw', NULL, 1, 1, NULL, NULL, NULL, 'media/product/1782059544360632.webp', 'media/product/1782059544847838.webp', 'media/product/1782059544895790.webp', NULL, NULL, NULL, NULL, 1, '2023-11-08 22:33:38', '2023-11-08 22:33:38'),
(5, 12, 7, NULL, 8, 'Mark Short', 'Quia possimus repre', '75', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; letter-spacing: normal;\"><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">MPN: NX.KDESI.007</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Model: shihab</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Processor: AMD Ryzen 3 7320U (2.4GHz up to 4.1GHz, 4 cores)</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">RAM: 8GB DDR5, Storage: 512GB SSD</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Display: 15.6\" FHD (1920x1080) TFT LCD</li><div><br></div></ul>', 'Nam omnis consectetu', 'Pre Order', 'Cum ducimus harum n', NULL, NULL, '176', '46', NULL, NULL, NULL, 'Totam vel nihil volu', NULL, NULL, NULL, NULL, NULL, 1, 'media/product/1782059623549719.webp', 'media/product/1782059623612526.webp', 'media/product/1782059623661070.webp', NULL, NULL, NULL, NULL, 1, '2023-11-08 22:34:53', '2023-11-08 22:34:53'),
(6, 14, 7, NULL, 5, 'Athena Odonnell', 'Ad ea vero ut sunt r', '231', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; letter-spacing: normal;\"><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">MPN: UM.HV0SS.301</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Model: Nitro VG270 M3</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Resolution: FHD (1920 x 1080)</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Display: IPS, 180Hz, 0.5ms</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Ports: 2 x HDMI, 1 x DP, 1 x Audio out</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Features: AMD FreeSync Premium technology</li></ul>', NULL, 'In Stock', NULL, 'fdsfas a  dsfasf,afsdf,afdsfa,afdsa', 'dfasdfsdfasdf', '2000', '452', '<div class=\"section-head\" style=\"margin: 0px; padding: 0px 0px 20px; font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; letter-spacing: normal;\"><h2 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-weight: bold; font-size: 20px; line-height: 26px;\">What is the price of Acer Nitro VG270 M3 27\" FHD IPS Gaming Monitor in Bangladesh?</h2></div><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif; letter-spacing: normal;\">The latest price of Acer Nitro VG270 M3 27\" FHD IPS Gaming Monitor in Bangladesh is 28,990৳. You can buy the Acer Nitro VG270 M3 27\" FHD IPS Gaming Monitor at best price from our website or visit any of our showrooms.</p>', '<table class=\"data-table flex-table\" cellpadding=\"0\" cellspacing=\"0\" style=\"margin: -20px 0px 0px; padding: 0px; display: flex; flex-direction: column; width: 920px; font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; letter-spacing: normal;\"><thead style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: var(--s-s-bg); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Display Features</td></tr></thead><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Display Size</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">27-Inch</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Display Type</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">LED</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Panel Type</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">IPS</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Resolution</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">FHD(1920 x 1080)</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Aspect Ratio</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">16:9</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Viewing Angle</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">Horizontal Viewing Angle: 178°<br style=\"margin: 0px; padding: 0px;\">Vertical Viewing Angle: 178°</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Brightness</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">250 Nit</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Contrast Ratio</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">100,000,000:1</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Refresh Rate</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">180Hz</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Color Support</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">16.7 Million Colors</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Color Gamut</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">sRGB 99% wide color gamut</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Response Time</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">0.5 ms</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">HDR</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">HDR10 support</td></tr></tbody><thead style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: var(--s-s-bg); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Video Features</td></tr></thead><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Free Sync Support</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">AMD FreeSync Premium technology</td></tr></tbody><thead style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: var(--s-s-bg); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Audio Features</td></tr></thead><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Speaker (Built In)</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">Yes</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Speaker Details</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">2Wx2 Speaker</td></tr></tbody><thead style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: var(--s-s-bg); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Connectivity</td></tr></thead><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Display Port</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">1 x DisplayPort</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">HDMI</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">2 x HDMI(2.0)</td></tr></tbody><thead style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: var(--s-s-bg); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Mechanical Design</td></tr></thead><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Tilt</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">-5° to 20°</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Vesa Wall Mount</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">100X100mm</td></tr></tbody><thead style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: var(--s-s-bg); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Physical Specification</td></tr></thead><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Color</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">Black</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Dimension</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">61.44 (W) x45.33 (H) x24.01 (D) cm<br style=\"margin: 0px; padding: 0px;\">24.19 (W) x17.85 (H) x9.45 (D) inches</td></tr></tbody><thead style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: var(--s-s-bg); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Power</td></tr></thead><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Type</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">Internal</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Voltage</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">100V-240V)</td></tr></tbody><thead style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: var(--s-s-bg); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Warranty Information</td></tr></thead><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex; background: rgb(250, 251, 252);\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Warranty</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">3 Year Warranty</td></tr></tbody></table>', '<h2 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-weight: bold; font-size: 20px; line-height: 26px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif; letter-spacing: normal;\">Acer Nitro VG270 M3 27-inch FHD 180Hz IPS Gaming LED Monitor</h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif; letter-spacing: normal;\">The Acer Nitro&nbsp;<span style=\"margin: 0px; padding: 0px; font-weight: bold;\">VG270 M3</span>&nbsp;27-inch FHD 180Hz IPS Gaming LED Monitor is a high-performance display designed to elevate your gaming experience. With a resolution of FHD (1920 x 1080), this&nbsp;<a href=\"https://www.startech.com.bd/monitor\" target=\"\" style=\"margin: 0px; padding: 0px; text-decoration: none; color: rgb(0, 0, 0);\">monitor</a>&nbsp;delivers crystal-clear visuals that bring your games to life. The IPS display technology ensures accurate color reproduction and wide viewing angles, while the 180Hz refresh rate and 0.5 ms response time provide smooth and seamless gameplay. Equipped with 2 HDMI ports, 1 DP port, and 1 Audio port, this monitor offers versatile connectivity options for your gaming setup. The AMD FreeSync Premium technology eliminates screen tearing and stuttering, ensuring a smooth and immersive gaming experience. Whether you\'re a casual gamer or a professional esports player, the Acer Nitro VG270 M3 27-inch FHD 180Hz IPS Gaming LED Monitor is the perfect choice for your gaming needs.</p><h2 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-weight: bold; font-size: 20px; line-height: 26px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif; letter-spacing: normal;\">Buy Acer Nitro VG270 M3 27-inch FHD 180Hz IPS Gaming LED Monitor from Star Tech</h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif; letter-spacing: normal;\">In Bangladesh, you can get original&nbsp;<span style=\"margin: 0px; padding: 0px; font-weight: bold;\">Acer Nitro VG270 M3 27-inch FHD 180Hz IPS Gaming LED Monitor</span>&nbsp;From Star Tech. We have a large collection of latest&nbsp;<a href=\"https://www.startech.com.bd/monitor/acer\" target=\"\" style=\"margin: 0px; padding: 0px; text-decoration: none; color: var(--s-primary);\">Acer Monitor</a>&nbsp;to purchase. Order Online Or Visit your Nearest&nbsp;<a href=\"https://www.startech.com.bd/\" target=\"\" style=\"margin: 0px; padding: 0px; text-decoration: none; color: var(--s-primary);\">Star Tech&nbsp;</a>Shop to get yours at lowest price. The Acer Nitro VG270 M3 27\" FHD IPS Gaming Monitor comes with 3 Years warranty.</p>', 'Adipisci rerum delen', NULL, NULL, NULL, NULL, NULL, 1, 'media/product/1784427750220151.jpg', 'media/product/1784427750621480.jpg', 'media/product/1784427750655201.jpg', 'media/product/1784427750688441.jpg', 'media/product/1784427750724234.jpg', 'media/product/1784427750757070.png', NULL, 1, '2023-12-05 01:43:10', '2023-12-05 01:43:10'),
(8, 12, 8, NULL, 6, 'Product-1', '45531', '10', 'sdgsggs sdgdsg sdgsdg<br>', NULL, 'In Stock', NULL, 'sadf,gfjh,ert', 'fsgsdg dsgsdg sdgsdg', '500', '300', 'dsfgdsfg sdhdfh dfhdfh<br>', 'dfsh sdsdhdf hdfh dfh<br>', 'dfhdf hfdhdfh df h<br>', 'https://www.youtube.com/embed/UtnHdyVNcgk?si=FNy7YepMAroP7v9Z', 1, NULL, NULL, NULL, NULL, NULL, 'media/product/1785349692062450.png', 'media/product/1785344407388938.webp', 'media/product/1785344407474126.jpg', 'media/product/1785344407512467.jpg', 'media/product/1785344407555423.jpg', 'media/product/1785344407590096.jpg', NULL, 1, '2023-12-15 04:45:07', '2023-12-15 04:45:07'),
(9, 12, 8, NULL, 7, 'Product-2', '545312', '20', NULL, NULL, 'In Stock', NULL, 'dsf,sdf', 'sdf dsgfdghfdg fdhgfdg', '200', '100', 'sdgdsfg tjh gf fhgk kghk<br>', 'gfjgf fgdjfj hkjhkg<br>', 'gfhk hgfhjklhjk <br>', 'https://www.youtube.com/embed/VM6N_BxzfUs?si=9HuZs3uQFo-dl1-5', 1, NULL, NULL, NULL, NULL, NULL, 'media/product/1785503543552011.webp', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-12-16 22:54:06', '2023-12-16 22:54:06'),
(10, 12, 8, NULL, 8, 'Product-31', '421325', '20', 'fgj f fgjdfj dfjg<br>', NULL, NULL, NULL, 'sdff,sdg,gf', 'dsg fgjfgj fg jfdj', '300', '200', 'fd jgfj gfjfg jgf<br>', 'fg jfgj fj fgj <br>', 'fj fgj gjfj fd<br>', 'https://www.youtube.com/embed/VM6N_BxzfUs?si=9HuZs3uQFo-dl1-5', NULL, NULL, 1, NULL, NULL, 1, 'media/product/1785504257759286.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-12-16 23:05:52', '2023-12-16 23:05:52');
INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `child_category_id`, `brand_id`, `product_name`, `product_code`, `product_quantity`, `product_details`, `product_color`, `availability`, `product_size`, `meta_tag`, `meta_description`, `selling_price`, `discount_price`, `what_is_the`, `specification`, `long_description`, `video_link`, `main_slider`, `hot_deal`, `best_rated`, `mid_slider`, `hot_new`, `trend`, `image_one`, `image_two`, `image_three`, `image_four`, `image_five`, `image_six`, `buyone_getone`, `status`, `created_at`, `updated_at`) VALUES
(11, 18, 10, NULL, 5, 'Toshiba 2523A Photocopy Machine', '456545', '20', '<ul><li>Toshiba 2523A Meta Description</li><li>Toshiba 2523A Meta Description</li><li>Toshiba 2523A Meta Description</li><li>Toshiba 2523A Meta Description</li><li><br> </li></ul>', NULL, 'In Stock', NULL, 'Toshiba ,Photocopy machine', 'Toshiba 2523A Meta Description', '1200066', '10000', 'Toshiba 2523A Price section is a very important&nbsp;<br>', '<div class=\"section-head\" style=\"margin: 0px; padding: 0px 0px 20px; font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; letter-spacing: normal;\"><h2 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-weight: bold; font-size: 20px; line-height: 26px;\"><br></h2><h2 style=\"box-sizing: border-box; margin: 0px 0px 5px; padding: 0px; font-weight: bold; font-size: 20px; line-height: 26px;\">Specification</h2><h2 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-weight: bold; font-size: 20px; line-height: 26px;\"><div class=\"section-head\" style=\"margin: 0px; padding: 0px 0px 20px; color: rgb(0, 0, 0); font-size: 15px; font-weight: 400;\"></div><table class=\"data-table flex-table\" cellpadding=\"0\" cellspacing=\"0\" style=\"margin: -20px 0px 0px; padding: 0px; display: flex; flex-direction: column; width: 920px; color: rgb(0, 0, 0); font-size: 15px; font-weight: 400;\"><colgroup style=\"margin: 0px; padding: 0px;\"><col class=\"name\" style=\"margin: 0px; padding: 0px;\"><col class=\"value\" style=\"margin: 0px; padding: 0px;\"></colgroup><thead style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: rgb(193, 204, 233); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Processor</td></tr></thead><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Processor Brand</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">AMD</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Processor Model</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">Ryzen 3 7320U</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Processor Frequency</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">2.4GHz up to 4.1GHz</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Processor Core</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">4</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Processor Thread</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">8</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">CPU Cache</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">L2 Cache: 2MB<br style=\"margin: 0px; padding: 0px;\">L3 Cache: 4MB</td></tr></tbody><thead style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: rgb(193, 204, 233); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Display</td></tr></thead><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Display Size</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">15.6 Inch</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Display Type</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">TFT LCD</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Display Resolution</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">FHD (1920x1080)</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Touch Screen</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">No</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Display Features</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">ComfyView Display</td></tr></tbody><thead style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: rgb(193, 204, 233); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Memory</td></tr></thead><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">RAM</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">8GB</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">RAM Type</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">DDR5</td></tr></tbody><thead style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: rgb(193, 204, 233); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Storage</td></tr></thead><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Storage Type</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">PCIe Gen4, 8 Gb/s SSD</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Storage Capacity</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">512GB</td></tr></tbody><thead style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: rgb(193, 204, 233); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Graphics</td></tr></thead><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Graphics Model</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">AMD Radeon</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Graphics Memory</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">Shared</td></tr></tbody><thead style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: rgb(193, 204, 233); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Keyboard &amp; TouchPad</td></tr></thead><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Keyboard Type</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">Yes</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Keyboard Features</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">99-/100-/103-key Acer keyboard layout with international language support including indicators of CapsLock and F4/Microphone mute</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">TouchPad</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">Multi-gesture touchpad</td></tr></tbody><thead style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: rgb(193, 204, 233); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Camera &amp; Audio</td></tr></thead><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">WebCam</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">HD</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Speaker</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">Stereo</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex; background: rgb(250, 251, 252);\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Microphone</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">Yes</td></tr></tbody></table></h2></div>', '<div class=\"section-head\" style=\"margin: 0px; padding: 0px 0px 20px; font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; letter-spacing: normal;\"><h2 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-weight: bold; font-size: 20px; line-height: 26px;\">Specification</h2></div><table class=\"data-table flex-table\" cellpadding=\"0\" cellspacing=\"0\" style=\"margin: -20px 0px 0px; padding: 0px; display: flex; flex-direction: column; width: 920px; font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; letter-spacing: normal;\"><colgroup style=\"margin: 0px; padding: 0px;\"><col class=\"name\" style=\"margin: 0px; padding: 0px;\"><col class=\"value\" style=\"margin: 0px; padding: 0px;\"></colgroup><thead style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: rgb(193, 204, 233); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Processor</td></tr></thead><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Processor Brand</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">AMD</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Processor Model</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">Ryzen 3 7320U</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Processor Frequency</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">2.4GHz up to 4.1GHz</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Processor Core</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">4</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Processor Thread</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">8</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">CPU Cache</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">L2 Cache: 2MB<br style=\"margin: 0px; padding: 0px;\">L3 Cache: 4MB</td></tr></tbody><thead style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: rgb(193, 204, 233); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Display</td></tr></thead><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Display Size</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">15.6 Inch</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Display Type</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">TFT LCD</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Display Resolution</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">FHD (1920x1080)</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Touch Screen</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">No</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Display Features</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">ComfyView Display</td></tr></tbody><thead style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: rgb(193, 204, 233); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Memory</td></tr></thead><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">RAM</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">8GB</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">RAM Type</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">DDR5</td></tr></tbody><thead style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: rgb(193, 204, 233); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Storage</td></tr></thead><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Storage Type</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">PCIe Gen4, 8 Gb/s SSD</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Storage Capacity</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">512GB</td></tr></tbody><thead style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: rgb(193, 204, 233); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Graphics</td></tr></thead><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Graphics Model</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">AMD Radeon</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Graphics Memory</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">Shared</td></tr></tbody><thead style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: rgb(193, 204, 233); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Keyboard &amp; TouchPad</td></tr></thead><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Keyboard Type</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">Yes</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Keyboard Features</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">99-/100-/103-key Acer keyboard layout with international language support including indicators of CapsLock and F4/Microphone mute</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">TouchPad</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">Multi-gesture touchpad</td></tr></tbody><thead style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: rgb(193, 204, 233); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Camera &amp; Audio</td></tr></thead><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">WebCam</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">HD</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Speaker</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">Stereo</td></tr><tr style=\"margin: 0px; padding: 0px; display: flex; background: rgb(250, 251, 252);\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239); color: rgb(102, 102, 102);\">Microphone</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom-color: rgb(236, 237, 239);\">Yes</td></tr></tbody></table>', 'https://www.youtube.com/embed/VM6N_BxzfUs?si=9HuZs3uQFo-dl1-5', 1, NULL, 1, NULL, NULL, 1, 'media/product/1786815051659355.png', 'media/product/1786815051865232.jpg', 'media/product/1786815052011627.jpg', 'media/product/1786815052079811.jpg', 'media/product/1786815052130575.png', 'media/product/1786815052278610.png', NULL, 1, '2023-12-16 23:12:02', '2023-12-16 23:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_charge` varchar(255) DEFAULT '0',
  `shopname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `hotlinephone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `google_maps` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `linkedIn` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `computer_laptop_gameingPc` text DEFAULT NULL,
  `Best_laptop` text DEFAULT NULL,
  `Best_desktop` text DEFAULT NULL,
  `emipage` text DEFAULT NULL,
  `policypage` text DEFAULT NULL,
  `contactpage` text DEFAULT NULL,
  `aboutpage` text DEFAULT NULL,
  `conditionpage` text DEFAULT NULL,
  `refundpage` text DEFAULT NULL,
  `delivery` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `shipping_charge`, `shopname`, `email`, `phone`, `hotlinephone`, `address`, `message`, `google_maps`, `facebook`, `twitter`, `youtube`, `linkedIn`, `instagram`, `computer_laptop_gameingPc`, `Best_laptop`, `Best_desktop`, `emipage`, `policypage`, `contactpage`, `aboutpage`, `conditionpage`, `refundpage`, `delivery`, `logo`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Aileen Middleton', 'flowtech@gmail.com', '01611482988', '01843209242', '55/B Noakhali Tower 3rd floor, Purana Palton,', '12th October Thursday, our all outlets are open. Additionally, our online activities are open and operational.', 'https://maps.app.goo.gl/JxuLdUKN6Nc67xMQ7', 'https://www.facebook.com/iktechnologybdofficial', 'https://www.facebook.com/iktechnologybdofficial', 'https://www.facebook.com/iktechnologybdofficial', 'https://www.facebook.com/iktechnologybdofficial', 'https://www.facebook.com/iktechnologybdofficial', '<span style=\"color: rgb(1, 19, 45); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(242, 244, 248);\">Technology has become a part of our daily lives, and we depend on tech products daily for a vast portion of our lives. There is hardly a home in Bangladesh without a tech product. This is where we come in. </span><a href=\"https://www.startech.com.bd/\" target=\"\" style=\"margin: 0px; padding: 0px; text-decoration: none; background-color: rgb(242, 244, 248); color: var(--s-primary); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; font-weight: 400; letter-spacing: normal;\">Star Tech Ltd.</a><span style=\"color: rgb(1, 19, 45); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(242, 244, 248);\"> started as a Tech Product Shop  in March 2007. We focus on giving the best customer service in Bangladesh, following our motto of “Customer Comes First.” This is why Star Tech is the most trusted computer shop in Bangladesh today, capturing the loyalty of a large customer base. After a long 16-year journey, Star Tech Ltd. was certified with the renowned \"ISO 9001:2015 certification\" as a recognition for the best Quality Control Management System. As an ISO-certified organization, Star Tech Ltd. is now up to the international standards that specify a Quality Management System (QMS). This Certification denotes that the organization strictly maintains all sorts of regulatory requirements to provide customers with products and services of a global standard.</span>', '<span style=\"color: rgb(1, 19, 45); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(242, 244, 248);\">Star Tech is the most popular </span><a href=\"https://www.startech.com.bd/laptop-notebook/laptop\" target=\"\" style=\"margin: 0px; padding: 0px; text-decoration: none; background-color: rgb(242, 244, 248); color: var(--s-primary); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; font-weight: 400; letter-spacing: normal;\">Laptop Brand Shop in BD</a><span style=\"color: rgb(1, 19, 45); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(242, 244, 248);\">. Star Tech </span><a href=\"https://www.startech.com.bd/laptop-notebook/laptop\" target=\"\" style=\"margin: 0px; padding: 0px; text-decoration: none; background-color: rgb(242, 244, 248); color: var(--s-primary); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; font-weight: 400; letter-spacing: normal;\">Laptop</a><span style=\"color: rgb(1, 19, 45); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(242, 244, 248);\"> Shop has the perfect device, whether you are a freelancer, officegoer, or student. Gamers love our collection of </span><a href=\"https://www.startech.com.bd/laptop-notebook/Gaming-Laptop\" target=\"\" style=\"margin: 0px; padding: 0px; text-decoration: none; background-color: rgb(242, 244, 248); color: var(--s-primary); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; font-weight: 400; letter-spacing: normal;\">Gaming Laptops</a><span style=\"color: rgb(1, 19, 45); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(242, 244, 248);\"> because we always bring the latest laptops in Bangladesh. As the best laptop shop in BD, a customer’s budget is our first concern. We bring the latest Intel Laptop and AMD Laptop under budget for every customer - from starters to expert users. Star Tech is considered the most trusted laptop shop in BD, allowing you to buy the best laptops from top laptop brands in the world. Along with the best laptop brands, our experts provide you with the best buying decisions base on your needs and budget - making Star Tech the most trusted laptop shop in Bangladesh. Star Tech lets you buy an official Apple </span><a href=\"https://www.startech.com.bd/laptop-notebook/laptop/apple-macbook\" target=\"\" style=\"margin: 0px; padding: 0px; text-decoration: none; background-color: rgb(242, 244, 248); color: var(--s-primary); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; font-weight: 400; letter-spacing: normal;\">MacBook</a><span style=\"color: rgb(1, 19, 45); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(242, 244, 248);\"> Air or MacBook Pro from </span><a href=\"https://www.startech.com.bd/apple\" target=\"\" style=\"margin: 0px; padding: 0px; text-decoration: none; background-color: rgb(242, 244, 248); color: var(--s-primary); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; font-weight: 400; letter-spacing: normal;\">Apple Store in Bangladesh.</a><span style=\"color: rgb(1, 19, 45); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(242, 244, 248);\"> Star Tech sells the latest models of the most popular laptop brands, such as - </span><a href=\"https://www.startech.com.bd/laptop-notebook/laptop/razer-laptop\" target=\"\" style=\"margin: 0px; padding: 0px; text-decoration: none; background-color: rgb(242, 244, 248); color: var(--s-primary); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; font-weight: 400; letter-spacing: normal;\">Razer</a><span style=\"color: rgb(1, 19, 45); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(242, 244, 248);\">, </span><a href=\"https://www.startech.com.bd/laptop-notebook/laptop/hp-laptop\" target=\"\" style=\"margin: 0px; padding: 0px; text-decoration: none; background-color: rgb(242, 244, 248); color: var(--s-primary); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; font-weight: 400; letter-spacing: normal;\">HP</a><span style=\"color: rgb(1, 19, 45); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(242, 244, 248);\">, Dell, </span><a href=\"https://www.startech.com.bd/laptop-notebook/laptop/apple-macbook\" target=\"\" style=\"margin: 0px; padding: 0px; text-decoration: none; background-color: rgb(242, 244, 248); color: var(--s-primary); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; font-weight: 400; letter-spacing: normal;\">Apple MacBook</a><span style=\"color: rgb(1, 19, 45); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(242, 244, 248);\">, </span><a href=\"https://www.startech.com.bd/laptop-notebook/laptop/asus-laptop\" target=\"\" style=\"margin: 0px; padding: 0px; text-decoration: none; background-color: rgb(242, 244, 248); color: var(--s-primary); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; font-weight: 400; letter-spacing: normal;\">Asus</a><span style=\"color: rgb(1, 19, 45); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(242, 244, 248);\">, Acer, </span><a href=\"https://www.startech.com.bd/laptop-notebook/laptop/lenovo-laptop\" target=\"\" style=\"margin: 0px; padding: 0px; text-decoration: none; background-color: rgb(242, 244, 248); color: var(--s-primary); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; font-weight: 400; letter-spacing: normal;\">Lenovo</a><span style=\"color: rgb(1, 19, 45); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(242, 244, 248);\">, Microsoft Surface, MSI, Gigabyte, i-Life, </span><a href=\"https://www.startech.com.bd/walton-laptop\" target=\"\" style=\"margin: 0px; padding: 0px; text-decoration: none; background-color: rgb(242, 244, 248); color: var(--s-primary); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; font-weight: 400; letter-spacing: normal;\">Walton</a><span style=\"color: rgb(1, 19, 45); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(242, 244, 248);\">, Xiaomi MI, Huawei, Chuwi, e</span>', '<p><div class=\"tnc-desc\" style=\"margin: 0px 0px 30px; padding: 0px; font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(255, 255, 255);\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 26px;\">সম্মানিত ক্রেতাবৃন্দ, স্টার টেক সব সময় কাস্টমারদের সর্বোচ্চ গুরুত্ব দিয়ে থাকে। এতদসত্বেও গ্রাহক সেবার মান উন্নত, সময়োপযোগী এবং দ্রুততর করার জন্যে কিছু নিয়ম কানুন মেনে কার্য পরিচালনা করতে হয়। সন্মানিত গ্রাহকগনের প্রতি বিশেষভাবে অনুরোধ Star Tech Ltd থেকে কম্পিউটার পণ্য কেনার পূর্বে <strong style=\"margin: 0px; padding: 0px;\">নিন্ম উল্লেখিত নিয়মাবলি ভালোভাবে অনুসরণ করবেন। ধন্যবাদ।</strong></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 26px;\">বিক্রয়ের সময় যে সমস্ত প্রোডাক্টের ওয়ারেন্টি ঘোষণা করা হয় সেগুলো মূলত পন্য প্রস্তুতকারক কর্তৃক প্রদান করা ওয়ারেন্টি । অর্থাৎ বিক্রিত পণ্যের ওয়ারেন্টি সেবা মূলত নির্দিষ্ট ব্রান্ডের মূল কোম্পানী বহন করে থাকে। ওয়ারেন্টি সেবার ভিন্নতার দিক থেকে প্রত্যেকটি ব্র্যান্ড সতন্ত্র এবং তাঁদের বিভিন্ন শর্তাবলী নিজস্ব অফিশিয়াল ওয়েবসাইটে উল্লেখ করা আছে। এক্ষেত্রে সাহায্যকারী প্রতিষ্ঠান Star Tech Ltd মূল ব্রান্ডের কোম্পানি গুলোর ওয়ারেন্টি সেবার শর্তাবলী কার্যকর করার মাধ্যম হিসেবে কাজ করছে।</p></div><h1 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-weight: 700; font-size: 18px; line-height: 27px; color: rgb(1, 19, 45); font-family: \"Trebuchet MS\", sans-serif; letter-spacing: normal; background-color: rgb(255, 255, 255);\">প্রস্তুতকারী প্রতিষ্ঠান নির্ধারিত ওয়ারেন্টি শর্তাবলী নিম্নরূপঃ</h1><hr style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; background-color: rgb(214, 214, 214); border-width: initial; border-style: none; color: rgb(0, 0, 0); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal;\"><ul style=\"margin: 20px 0px 30px; padding: 0px; font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(255, 255, 255);\"><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">Star Tech Ltd প্রতিটি প্রোডাক্ট এর <strong style=\"margin: 0px; padding: 0px;\">আন্তর্জাতিক, দেশীয় ও বাংলাদেশ কম্পিউটার সমিতি (BCS) কর্তৃক প্রদত্ত </strong><a rel=\"”nofollow”\" href=\"https://bcs.org.bd/page/publication/Warranty-Policy-GpxT5\" target=\"_blank\" style=\"margin: 0px; padding: 0px; text-decoration: none; color: var(--s-primary);\">ওয়ারেন্টি নীতিমালা</a><strong style=\"margin: 0px; padding: 0px;\"> অনুসরন করে।</strong></li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টি হল এমন একটি সেবা যা উৎপাদনকারী বা আমদানীকারক এবং ক্রেতা উভয় পক্ষের মধ্যে একটি চুক্তি। এই চুক্তির মাধ্যমে ক্রেতা উৎপাদনকারী বা আমদানীকারকের উপর বিক্রিত পণ্যের মেরামত বা প্রতিস্থাপনের দায়িত্ব বর্তায়। ক্রয়ক্রিত পণ্যের ওয়ারেন্টি সেবা পেতে স্টার টেক ক্রেতাকে সার্বিক সহযোগিতা করে থাকেন এবং ক্রেতা ও উৎপাদনকারী বা আমদানীকারক এর মধ্যে স্টার টেক মধ্যস্থতাকারী হিসেবে কাজ করে।<br style=\"margin: 0px; padding: 0px;\"></li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">Star Tech Ltd কর্তৃক আমদানিকৃ্ত অধিকাংশ প্রোডাক্ট এর ওয়ারেন্টি স্বল্প সময়ের মধ্যে প্রধান করা হয় এবং বেশকিছু প্রোডাক্ট এর অভিযোগ আসা মাত্র তা পরিবর্তন করে দেওয়া হয়।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">বিক্রিত সকল প্রোডাক্ট এ ওয়ারেন্টি প্রদান করা হয় না। শুধুমাত্র যেসকল প্রোডাক্ট গুলোতে মূল কোম্পানি ওয়ারেন্টি মেয়াদ ঘোষণা করে থাকে সেগুলোর ক্ষেত্রে ওয়ারেন্টি কার্যকর হয়ে থাকে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ল্যাপটপের <strong style=\"margin: 0px; padding: 0px;\">ব্র্যান্ড ও মডেল ভেদে ওয়ারেন্টি ১-৩ বছর হয়।</strong> কিন্তু সকল ল্যাপটপ <strong style=\"margin: 0px; padding: 0px;\">ব্যাটারি ও এডাপ্টারের ওয়ারেন্টি শুধমাত্র ১ বছর</strong>।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টির আওতাভুক্ত কোন প্রোডাক্ট বিক্রির পর যদি তাতে ত্রুটি ধরা পড়ে, তবে মেরামতের মাধ্যমে সেই ত্রুটি দূর করা হয় এবং পন্যের প্রকারভেদে তা সাথে সাথে পরিবর্তন করে দেওয়া হয়ে থাকে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট বদলে দেয়ার মতন না থেকে থাকলে Star Tech Ltd নিজস্ব স্টকে বর্তমান অন্য কোন ব্র্যান্ডের সমমানের পণ্য দিয়ে বদল করে দিতে পারে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট মেরামতের অযোগ্য ও বদলে দেয়ার মতন একই কিংবা সমমানের পণ্য যদি আমাদের স্টকে বর্তমান না থাকে সেক্ষেত্রে উক্ত মডেল থেকে ভাল কোন প্রোডাক্ট অবচয় ও মূল্য সমন্বয় এর মাধ্যমে বদলে দেয়া যেতে পারে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট মেরামত বা বদলে দেয়ার অযোগ্য Star Tech Ltd এর কাছে বর্তমান না থাকলে, বিক্রয় অবচয় সমন্বয় এর মাধ্যমে মূল্যের অর্থ ফেরত দেওয়া যেতে পারে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">প্রোডাক্ট ব্যাবহারের সময় কিংবা Star Tech Ltd এর সার্ভিসের সময় <strong style=\"margin: 0px; padding: 0px;\">যদি কোন সফটওয়্যার বা ডাটা নষ্ট কিংবা হারিয়ে যায় এর দায়ভার Star Tech Ltd বহন করবে না</strong>। উল্লেখ্য যে, এক্ষেত্রে ডাটা পুনরুদ্ধার বা সফটওয়্যার পুনস্থাপনের কাজের দায়িত্ত্বও Star Tech Ltd এর উপর বর্তাবে না।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট ওয়ারেন্টির আওতায় নেয়ার পর সার্ভিসের কাজ শেষ করে প্রোডাক্টটি ফেরত দেয়ার সময় নির্দিষ্ট নয়, <strong style=\"margin: 0px; padding: 0px;\">এই সময় ৫-৭ দিন থেকে সর্বোচ্চ ৩৫-৪০ দিন কিংবা আরো বেশী হতে পারে</strong>; কারণ অধিকাংশ ক্ষেত্রে মেরামতের জন্য প্রয়োজনীয় যন্ত্রাংশ দেশে পর্যাপ্ত বাফার স্টক না থাকায় তা বিশেষভাবে আমদানী করে আনতে হয় যা অনেক সময় সাপেক্ষ।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ক্রেতাসাধারনের অবগতির জানানো যাচ্ছে যে বেশীরভাগ ওয়ারেন্টি প্রোডাক্ট রিপেয়ার হয় না, যে পার্টস টি নস্ট হয় সেটা পরিবর্তন করা হয় বরং অধিকাংশ ক্ষেত্রে বিদেশ থেকে আমদানি করা হয়।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">বিক্রয়ের সময় যে কম্পিউটার সেটআপ ও অপারেটিং সিস্টেম কাস্টমাইজ করে দেয়া হয় তা ওয়ারেন্টির আওতায় থাকে না।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">লাইফ টাইম ওয়ারেন্টি মূলত বাজারে প্রচলিত পণ্য হিসেবে বিবেচিত হওয়ার সময়কাল পর্যন্ত ঐ পণ্যের ওয়ারেন্টি সেবা প্রদানকে লাইফ টাইম ওয়ারেন্টি বুঝাবে। কোনো পণ্যের ‘লাইফ টাইম’ ওয়ারেন্টির আওতায় ওই পণ্যটি মার্কেটে প্রচলিত পণ্য হলে, ক্রেতা ওয়ারেন্টি সেবা প্রাপ্ত হবে। কোনো পণ্য বাজারে EOL(End of Life) হিসেবে গণ্য হলে অর্থাৎ পণ্যটি যদি অপ্রচলিত হয়ে পড়ে তবে তা আর ওয়ারেন্টির আওতায় আসবে না। পণ্যের নতুন সংস্করণ বাজারে আসলে তা পুরাতন সংস্করণের সাথে ওয়ারেন্টি সেবা পাবে না। উল্লেখ্য, লাইফ টাইম ওয়ারেন্টির ক্ষেত্রে বিসিএর এর নীতিমালা অনুযায়ী গ্রাহক বা ক্রেতা সর্বোচ্চ ২(দুই) বছর এ সেবা উপভোগ করতে পারবেন।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টির আওতা বহির্ভূত যেকোন সার্ভিসের জন্য Star Tech মূল্য ধার্য করতে পারবে যা ক্রেতার সম্মতি সাপেক্ষে কার্যকর হবে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">সার্ভিস ওয়ারেন্টির ক্ষেত্রে যদি কোন যন্ত্রাংশ পরিবর্তন বা সংযোজনের প্রয়োজন হয় তাহলে ক্রেতা সাধারন তা নিজ দায়িত্বে সংগ্রহ করবেন অথবা ক্রেতাগনের সম্মতিতে অগ্রিম মূল্য পরিশোধ সাপেক্ষে Star Tech এর মাধ্যমে সংগ্রহ করতে পারবেন।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টির নির্ধারিত মেয়াদ থাকাকালীন বা উত্তীর্ণ হওয়ার পরে Star Tech কর্তৃক প্রদত্ত ফ্রি সফটওয়্যার বা হার্ডওয়্যার টিউনিংএ যদি প্রোডাক্ট এ কোন সমস্যা ধরা পড়ে বা নতুন কোন সমস্যার সৃষ্টি হয় তার দায়ভার Star Tech এর উপর বর্তাবে না।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">মনিটরের <strong style=\"margin: 0px; padding: 0px;\">ডেড পিক্সেল (Dead Pixel)</strong> জনিত ওয়ারেন্টি ক্লেইমের জন্য তাতে ন্যূনতম ৩ বা তার বেশি ডেড পিক্সেল দৃশ্যমান হতে হবে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">প্রোডাক্টের ওয়ারেন্টি ক্লেইমের সময় ক্রেতাকে প্রোডাক্টের বক্স সাথে নিয়ে আসা বাধ্যতামূলক।</span></li></ul> <br></p>', '<p><span style=\"color: rgb(1, 19, 45);\">সম্মানিত ক্রেতাবৃন্দ, স্টার টেক সব সময় কাস্টমারদের সর্বোচ্চ গুরুত্ব দিয়ে থাকে। এতদসত্বেও গ্রাহক সেবার মান উন্নত, সময়োপযোগী এবং দ্রুততর করার জন্যে কিছু নিয়ম কানুন মেনে কার্য পরিচালনা করতে হয়। সন্মানিত গ্রাহকগনের প্রতি বিশেষভাবে অনুরোধ Star Tech Ltd থেকে কম্পিউটার পণ্য কেনার পূর্বে </span><span style=\"font-weight: bolder; color: rgb(1, 19, 45); margin: 0px; padding: 0px;\">নিন্ম উল্লেখিত নিয়মাবলি ভালোভাবে অনুসরণ করবেন। ধন্যবাদ।</span><br></p>', '<div class=\"tnc-desc\" style=\"margin: 0px 0px 30px; padding: 0px; font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(255, 255, 255);\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 26px;\">সম্মানিত ক্রেতাবৃন্দ, স্টার টেক সব সময় কাস্টমারদের সর্বোচ্চ গুরুত্ব দিয়ে থাকে। এতদসত্বেও গ্রাহক সেবার মান উন্নত, সময়োপযোগী এবং দ্রুততর করার জন্যে কিছু নিয়ম কানুন মেনে কার্য পরিচালনা করতে হয়। সন্মানিত গ্রাহকগনের প্রতি বিশেষভাবে অনুরোধ Star Tech Ltd থেকে কম্পিউটার পণ্য কেনার পূর্বে <strong style=\"margin: 0px; padding: 0px;\">নিন্ম উল্লেখিত নিয়মাবলি ভালোভাবে অনুসরণ করবেন। ধন্যবাদ।</strong></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 26px;\">বিক্রয়ের সময় যে সমস্ত প্রোডাক্টের ওয়ারেন্টি ঘোষণা করা হয় সেগুলো মূলত পন্য প্রস্তুতকারক কর্তৃক প্রদান করা ওয়ারেন্টি । অর্থাৎ বিক্রিত পণ্যের ওয়ারেন্টি সেবা মূলত নির্দিষ্ট ব্রান্ডের মূল কোম্পানী বহন করে থাকে। ওয়ারেন্টি সেবার ভিন্নতার দিক থেকে প্রত্যেকটি ব্র্যান্ড সতন্ত্র এবং তাঁদের বিভিন্ন শর্তাবলী নিজস্ব অফিশিয়াল ওয়েবসাইটে উল্লেখ করা আছে। এক্ষেত্রে সাহায্যকারী প্রতিষ্ঠান Star Tech Ltd মূল ব্রান্ডের কোম্পানি গুলোর ওয়ারেন্টি সেবার শর্তাবলী কার্যকর করার মাধ্যম হিসেবে কাজ করছে।</p></div><h1 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-weight: 700; font-size: 18px; line-height: 27px; color: rgb(1, 19, 45); font-family: \"Trebuchet MS\", sans-serif; letter-spacing: normal; background-color: rgb(255, 255, 255);\">প্রস্তুতকারী প্রতিষ্ঠান নির্ধারিত ওয়ারেন্টি শর্তাবলী নিম্নরূপঃ</h1><hr style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; background-color: rgb(214, 214, 214); border-width: initial; border-style: none; color: rgb(0, 0, 0); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal;\"><ul style=\"margin: 20px 0px 30px; padding: 0px; font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(255, 255, 255);\"><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">Star Tech Ltd প্রতিটি প্রোডাক্ট এর <strong style=\"margin: 0px; padding: 0px;\">আন্তর্জাতিক, দেশীয় ও বাংলাদেশ কম্পিউটার সমিতি (BCS) কর্তৃক প্রদত্ত </strong><a rel=\"”nofollow”\" href=\"https://bcs.org.bd/page/publication/Warranty-Policy-GpxT5\" target=\"_blank\" style=\"margin: 0px; padding: 0px; text-decoration: none; color: var(--s-primary);\">ওয়ারেন্টি নীতিমালা</a><strong style=\"margin: 0px; padding: 0px;\"> অনুসরন করে।</strong></li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টি হল এমন একটি সেবা যা উৎপাদনকারী বা আমদানীকারক এবং ক্রেতা উভয় পক্ষের মধ্যে একটি চুক্তি। এই চুক্তির মাধ্যমে ক্রেতা উৎপাদনকারী বা আমদানীকারকের উপর বিক্রিত পণ্যের মেরামত বা প্রতিস্থাপনের দায়িত্ব বর্তায়। ক্রয়ক্রিত পণ্যের ওয়ারেন্টি সেবা পেতে স্টার টেক ক্রেতাকে সার্বিক সহযোগিতা করে থাকেন এবং ক্রেতা ও উৎপাদনকারী বা আমদানীকারক এর মধ্যে স্টার টেক মধ্যস্থতাকারী হিসেবে কাজ করে।<br style=\"margin: 0px; padding: 0px;\"></li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">Star Tech Ltd কর্তৃক আমদানিকৃ্ত অধিকাংশ প্রোডাক্ট এর ওয়ারেন্টি স্বল্প সময়ের মধ্যে প্রধান করা হয় এবং বেশকিছু প্রোডাক্ট এর অভিযোগ আসা মাত্র তা পরিবর্তন করে দেওয়া হয়।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">বিক্রিত সকল প্রোডাক্ট এ ওয়ারেন্টি প্রদান করা হয় না। শুধুমাত্র যেসকল প্রোডাক্ট গুলোতে মূল কোম্পানি ওয়ারেন্টি মেয়াদ ঘোষণা করে থাকে সেগুলোর ক্ষেত্রে ওয়ারেন্টি কার্যকর হয়ে থাকে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ল্যাপটপের <strong style=\"margin: 0px; padding: 0px;\">ব্র্যান্ড ও মডেল ভেদে ওয়ারেন্টি ১-৩ বছর হয়।</strong> কিন্তু সকল ল্যাপটপ <strong style=\"margin: 0px; padding: 0px;\">ব্যাটারি ও এডাপ্টারের ওয়ারেন্টি শুধমাত্র ১ বছর</strong>।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টির আওতাভুক্ত কোন প্রোডাক্ট বিক্রির পর যদি তাতে ত্রুটি ধরা পড়ে, তবে মেরামতের মাধ্যমে সেই ত্রুটি দূর করা হয় এবং পন্যের প্রকারভেদে তা সাথে সাথে পরিবর্তন করে দেওয়া হয়ে থাকে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট বদলে দেয়ার মতন না থেকে থাকলে Star Tech Ltd নিজস্ব স্টকে বর্তমান অন্য কোন ব্র্যান্ডের সমমানের পণ্য দিয়ে বদল করে দিতে পারে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট মেরামতের অযোগ্য ও বদলে দেয়ার মতন একই কিংবা সমমানের পণ্য যদি আমাদের স্টকে বর্তমান না থাকে সেক্ষেত্রে উক্ত মডেল থেকে ভাল কোন প্রোডাক্ট অবচয় ও মূল্য সমন্বয় এর মাধ্যমে বদলে দেয়া যেতে পারে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট মেরামত বা বদলে দেয়ার অযোগ্য Star Tech Ltd এর কাছে বর্তমান না থাকলে, বিক্রয় অবচয় সমন্বয় এর মাধ্যমে মূল্যের অর্থ ফেরত দেওয়া যেতে পারে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">প্রোডাক্ট ব্যাবহারের সময় কিংবা Star Tech Ltd এর সার্ভিসের সময় <strong style=\"margin: 0px; padding: 0px;\">যদি কোন সফটওয়্যার বা ডাটা নষ্ট কিংবা হারিয়ে যায় এর দায়ভার Star Tech Ltd বহন করবে না</strong>। উল্লেখ্য যে, এক্ষেত্রে ডাটা পুনরুদ্ধার বা সফটওয়্যার পুনস্থাপনের কাজের দায়িত্ত্বও Star Tech Ltd এর উপর বর্তাবে না।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট ওয়ারেন্টির আওতায় নেয়ার পর সার্ভিসের কাজ শেষ করে প্রোডাক্টটি ফেরত দেয়ার সময় নির্দিষ্ট নয়, <strong style=\"margin: 0px; padding: 0px;\">এই সময় ৫-৭ দিন থেকে সর্বোচ্চ ৩৫-৪০ দিন কিংবা আরো বেশী হতে পারে</strong>; কারণ অধিকাংশ ক্ষেত্রে মেরামতের জন্য প্রয়োজনীয় যন্ত্রাংশ দেশে পর্যাপ্ত বাফার স্টক না থাকায় তা বিশেষভাবে আমদানী করে আনতে হয় যা অনেক সময় সাপেক্ষ।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ক্রেতাসাধারনের অবগতির জানানো যাচ্ছে যে বেশীরভাগ ওয়ারেন্টি প্রোডাক্ট রিপেয়ার হয় না, যে পার্টস টি নস্ট হয় সেটা পরিবর্তন করা হয় বরং অধিকাংশ ক্ষেত্রে বিদেশ থেকে আমদানি করা হয়।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">বিক্রয়ের সময় যে কম্পিউটার সেটআপ ও অপারেটিং সিস্টেম কাস্টমাইজ করে দেয়া হয় তা ওয়ারেন্টির আওতায় থাকে না।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">লাইফ টাইম ওয়ারেন্টি মূলত বাজারে প্রচলিত পণ্য হিসেবে বিবেচিত হওয়ার সময়কাল পর্যন্ত ঐ পণ্যের ওয়ারেন্টি সেবা প্রদানকে লাইফ টাইম ওয়ারেন্টি বুঝাবে। কোনো পণ্যের ‘লাইফ টাইম’ ওয়ারেন্টির আওতায় ওই পণ্যটি মার্কেটে প্রচলিত পণ্য হলে, ক্রেতা ওয়ারেন্টি সেবা প্রাপ্ত হবে। কোনো পণ্য বাজারে EOL(End of Life) হিসেবে গণ্য হলে অর্থাৎ পণ্যটি যদি অপ্রচলিত হয়ে পড়ে তবে তা আর ওয়ারেন্টির আওতায় আসবে না। পণ্যের নতুন সংস্করণ বাজারে আসলে তা পুরাতন সংস্করণের সাথে ওয়ারেন্টি সেবা পাবে না। উল্লেখ্য, লাইফ টাইম ওয়ারেন্টির ক্ষেত্রে বিসিএর এর নীতিমালা অনুযায়ী গ্রাহক বা ক্রেতা সর্বোচ্চ ২(দুই) বছর এ সেবা উপভোগ করতে পারবেন।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টির আওতা বহির্ভূত যেকোন সার্ভিসের জন্য Star Tech মূল্য ধার্য করতে পারবে যা ক্রেতার সম্মতি সাপেক্ষে কার্যকর হবে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">সার্ভিস ওয়ারেন্টির ক্ষেত্রে যদি কোন যন্ত্রাংশ পরিবর্তন বা সংযোজনের প্রয়োজন হয় তাহলে ক্রেতা সাধারন তা নিজ দায়িত্বে সংগ্রহ করবেন অথবা ক্রেতাগনের সম্মতিতে অগ্রিম মূল্য পরিশোধ সাপেক্ষে Star Tech এর মাধ্যমে সংগ্রহ করতে পারবেন।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টির নির্ধারিত মেয়াদ থাকাকালীন বা উত্তীর্ণ হওয়ার পরে Star Tech কর্তৃক প্রদত্ত ফ্রি সফটওয়্যার বা হার্ডওয়্যার টিউনিংএ যদি প্রোডাক্ট এ কোন সমস্যা ধরা পড়ে বা নতুন কোন সমস্যার সৃষ্টি হয় তার দায়ভার Star Tech এর উপর বর্তাবে না।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">মনিটরের <strong style=\"margin: 0px; padding: 0px;\">ডেড পিক্সেল (Dead Pixel)</strong> জনিত ওয়ারেন্টি ক্লেইমের জন্য তাতে ন্যূনতম ৩ বা তার বেশি ডেড পিক্সেল দৃশ্যমান হতে হবে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">প্রোডাক্টের ওয়ারেন্টি ক্লেইমের সময় ক্রেতাকে প্রোডাক্টের বক্স সাথে নিয়ে আসা বাধ্যতামূলক।</span></li></ul>', '<div class=\"tnc-desc\" style=\"margin: 0px 0px 30px; padding: 0px; font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(255, 255, 255);\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 26px;\">সম্মানিত ক্রেতাবৃন্দ, স্টার টেক সব সময় কাস্টমারদের সর্বোচ্চ গুরুত্ব দিয়ে থাকে। এতদসত্বেও গ্রাহক সেবার মান উন্নত, সময়োপযোগী এবং দ্রুততর করার জন্যে কিছু নিয়ম কানুন মেনে কার্য পরিচালনা করতে হয়। সন্মানিত গ্রাহকগনের প্রতি বিশেষভাবে অনুরোধ Star Tech Ltd থেকে কম্পিউটার পণ্য কেনার পূর্বে <strong style=\"margin: 0px; padding: 0px;\">নিন্ম উল্লেখিত নিয়মাবলি ভালোভাবে অনুসরণ করবেন। ধন্যবাদ।</strong></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 26px;\">বিক্রয়ের সময় যে সমস্ত প্রোডাক্টের ওয়ারেন্টি ঘোষণা করা হয় সেগুলো মূলত পন্য প্রস্তুতকারক কর্তৃক প্রদান করা ওয়ারেন্টি । অর্থাৎ বিক্রিত পণ্যের ওয়ারেন্টি সেবা মূলত নির্দিষ্ট ব্রান্ডের মূল কোম্পানী বহন করে থাকে। ওয়ারেন্টি সেবার ভিন্নতার দিক থেকে প্রত্যেকটি ব্র্যান্ড সতন্ত্র এবং তাঁদের বিভিন্ন শর্তাবলী নিজস্ব অফিশিয়াল ওয়েবসাইটে উল্লেখ করা আছে। এক্ষেত্রে সাহায্যকারী প্রতিষ্ঠান Star Tech Ltd মূল ব্রান্ডের কোম্পানি গুলোর ওয়ারেন্টি সেবার শর্তাবলী কার্যকর করার মাধ্যম হিসেবে কাজ করছে।</p></div><h1 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-weight: 700; font-size: 18px; line-height: 27px; color: rgb(1, 19, 45); font-family: \"Trebuchet MS\", sans-serif; letter-spacing: normal; background-color: rgb(255, 255, 255);\">প্রস্তুতকারী প্রতিষ্ঠান নির্ধারিত ওয়ারেন্টি শর্তাবলী নিম্নরূপঃ</h1><hr style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; background-color: rgb(214, 214, 214); border-width: initial; border-style: none; color: rgb(0, 0, 0); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal;\"><ul style=\"margin: 20px 0px 30px; padding: 0px; font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(255, 255, 255);\"><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">Star Tech Ltd প্রতিটি প্রোডাক্ট এর <strong style=\"margin: 0px; padding: 0px;\">আন্তর্জাতিক, দেশীয় ও বাংলাদেশ কম্পিউটার সমিতি (BCS) কর্তৃক প্রদত্ত </strong><a rel=\"”nofollow”\" href=\"https://bcs.org.bd/page/publication/Warranty-Policy-GpxT5\" target=\"_blank\" style=\"margin: 0px; padding: 0px; text-decoration: none; color: var(--s-primary);\">ওয়ারেন্টি নীতিমালা</a><strong style=\"margin: 0px; padding: 0px;\"> অনুসরন করে।</strong></li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টি হল এমন একটি সেবা যা উৎপাদনকারী বা আমদানীকারক এবং ক্রেতা উভয় পক্ষের মধ্যে একটি চুক্তি। এই চুক্তির মাধ্যমে ক্রেতা উৎপাদনকারী বা আমদানীকারকের উপর বিক্রিত পণ্যের মেরামত বা প্রতিস্থাপনের দায়িত্ব বর্তায়। ক্রয়ক্রিত পণ্যের ওয়ারেন্টি সেবা পেতে স্টার টেক ক্রেতাকে সার্বিক সহযোগিতা করে থাকেন এবং ক্রেতা ও উৎপাদনকারী বা আমদানীকারক এর মধ্যে স্টার টেক মধ্যস্থতাকারী হিসেবে কাজ করে।<br style=\"margin: 0px; padding: 0px;\"></li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">Star Tech Ltd কর্তৃক আমদানিকৃ্ত অধিকাংশ প্রোডাক্ট এর ওয়ারেন্টি স্বল্প সময়ের মধ্যে প্রধান করা হয় এবং বেশকিছু প্রোডাক্ট এর অভিযোগ আসা মাত্র তা পরিবর্তন করে দেওয়া হয়।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">বিক্রিত সকল প্রোডাক্ট এ ওয়ারেন্টি প্রদান করা হয় না। শুধুমাত্র যেসকল প্রোডাক্ট গুলোতে মূল কোম্পানি ওয়ারেন্টি মেয়াদ ঘোষণা করে থাকে সেগুলোর ক্ষেত্রে ওয়ারেন্টি কার্যকর হয়ে থাকে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ল্যাপটপের <strong style=\"margin: 0px; padding: 0px;\">ব্র্যান্ড ও মডেল ভেদে ওয়ারেন্টি ১-৩ বছর হয়।</strong> কিন্তু সকল ল্যাপটপ <strong style=\"margin: 0px; padding: 0px;\">ব্যাটারি ও এডাপ্টারের ওয়ারেন্টি শুধমাত্র ১ বছর</strong>।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টির আওতাভুক্ত কোন প্রোডাক্ট বিক্রির পর যদি তাতে ত্রুটি ধরা পড়ে, তবে মেরামতের মাধ্যমে সেই ত্রুটি দূর করা হয় এবং পন্যের প্রকারভেদে তা সাথে সাথে পরিবর্তন করে দেওয়া হয়ে থাকে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট বদলে দেয়ার মতন না থেকে থাকলে Star Tech Ltd নিজস্ব স্টকে বর্তমান অন্য কোন ব্র্যান্ডের সমমানের পণ্য দিয়ে বদল করে দিতে পারে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট মেরামতের অযোগ্য ও বদলে দেয়ার মতন একই কিংবা সমমানের পণ্য যদি আমাদের স্টকে বর্তমান না থাকে সেক্ষেত্রে উক্ত মডেল থেকে ভাল কোন প্রোডাক্ট অবচয় ও মূল্য সমন্বয় এর মাধ্যমে বদলে দেয়া যেতে পারে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট মেরামত বা বদলে দেয়ার অযোগ্য Star Tech Ltd এর কাছে বর্তমান না থাকলে, বিক্রয় অবচয় সমন্বয় এর মাধ্যমে মূল্যের অর্থ ফেরত দেওয়া যেতে পারে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">প্রোডাক্ট ব্যাবহারের সময় কিংবা Star Tech Ltd এর সার্ভিসের সময় <strong style=\"margin: 0px; padding: 0px;\">যদি কোন সফটওয়্যার বা ডাটা নষ্ট কিংবা হারিয়ে যায় এর দায়ভার Star Tech Ltd বহন করবে না</strong>। উল্লেখ্য যে, এক্ষেত্রে ডাটা পুনরুদ্ধার বা সফটওয়্যার পুনস্থাপনের কাজের দায়িত্ত্বও Star Tech Ltd এর উপর বর্তাবে না।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট ওয়ারেন্টির আওতায় নেয়ার পর সার্ভিসের কাজ শেষ করে প্রোডাক্টটি ফেরত দেয়ার সময় নির্দিষ্ট নয়, <strong style=\"margin: 0px; padding: 0px;\">এই সময় ৫-৭ দিন থেকে সর্বোচ্চ ৩৫-৪০ দিন কিংবা আরো বেশী হতে পারে</strong>; কারণ অধিকাংশ ক্ষেত্রে মেরামতের জন্য প্রয়োজনীয় যন্ত্রাংশ দেশে পর্যাপ্ত বাফার স্টক না থাকায় তা বিশেষভাবে আমদানী করে আনতে হয় যা অনেক সময় সাপেক্ষ।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ক্রেতাসাধারনের অবগতির জানানো যাচ্ছে যে বেশীরভাগ ওয়ারেন্টি প্রোডাক্ট রিপেয়ার হয় না, যে পার্টস টি নস্ট হয় সেটা পরিবর্তন করা হয় বরং অধিকাংশ ক্ষেত্রে বিদেশ থেকে আমদানি করা হয়।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">বিক্রয়ের সময় যে কম্পিউটার সেটআপ ও অপারেটিং সিস্টেম কাস্টমাইজ করে দেয়া হয় তা ওয়ারেন্টির আওতায় থাকে না।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">লাইফ টাইম ওয়ারেন্টি মূলত বাজারে প্রচলিত পণ্য হিসেবে বিবেচিত হওয়ার সময়কাল পর্যন্ত ঐ পণ্যের ওয়ারেন্টি সেবা প্রদানকে লাইফ টাইম ওয়ারেন্টি বুঝাবে। কোনো পণ্যের ‘লাইফ টাইম’ ওয়ারেন্টির আওতায় ওই পণ্যটি মার্কেটে প্রচলিত পণ্য হলে, ক্রেতা ওয়ারেন্টি সেবা প্রাপ্ত হবে। কোনো পণ্য বাজারে EOL(End of Life) হিসেবে গণ্য হলে অর্থাৎ পণ্যটি যদি অপ্রচলিত হয়ে পড়ে তবে তা আর ওয়ারেন্টির আওতায় আসবে না। পণ্যের নতুন সংস্করণ বাজারে আসলে তা পুরাতন সংস্করণের সাথে ওয়ারেন্টি সেবা পাবে না। উল্লেখ্য, লাইফ টাইম ওয়ারেন্টির ক্ষেত্রে বিসিএর এর নীতিমালা অনুযায়ী গ্রাহক বা ক্রেতা সর্বোচ্চ ২(দুই) বছর এ সেবা উপভোগ করতে পারবেন।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টির আওতা বহির্ভূত যেকোন সার্ভিসের জন্য Star Tech মূল্য ধার্য করতে পারবে যা ক্রেতার সম্মতি সাপেক্ষে কার্যকর হবে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">সার্ভিস ওয়ারেন্টির ক্ষেত্রে যদি কোন যন্ত্রাংশ পরিবর্তন বা সংযোজনের প্রয়োজন হয় তাহলে ক্রেতা সাধারন তা নিজ দায়িত্বে সংগ্রহ করবেন অথবা ক্রেতাগনের সম্মতিতে অগ্রিম মূল্য পরিশোধ সাপেক্ষে Star Tech এর মাধ্যমে সংগ্রহ করতে পারবেন।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টির নির্ধারিত মেয়াদ থাকাকালীন বা উত্তীর্ণ হওয়ার পরে Star Tech কর্তৃক প্রদত্ত ফ্রি সফটওয়্যার বা হার্ডওয়্যার টিউনিংএ যদি প্রোডাক্ট এ কোন সমস্যা ধরা পড়ে বা নতুন কোন সমস্যার সৃষ্টি হয় তার দায়ভার Star Tech এর উপর বর্তাবে না।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">মনিটরের <strong style=\"margin: 0px; padding: 0px;\">ডেড পিক্সেল (Dead Pixel)</strong> জনিত ওয়ারেন্টি ক্লেইমের জন্য তাতে ন্যূনতম ৩ বা তার বেশি ডেড পিক্সেল দৃশ্যমান হতে হবে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">প্রোডাক্টের ওয়ারেন্টি ক্লেইমের সময় ক্রেতাকে প্রোডাক্টের বক্স সাথে নিয়ে আসা বাধ্যতামূলক।</span></li></ul>', '<div class=\"tnc-desc\" style=\"margin: 0px 0px 30px; padding: 0px; font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(255, 255, 255);\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 26px;\">সম্মানিত ক্রেতাবৃন্দ, স্টার টেক সব সময় কাস্টমারদের সর্বোচ্চ গুরুত্ব দিয়ে থাকে। এতদসত্বেও গ্রাহক সেবার মান উন্নত, সময়োপযোগী এবং দ্রুততর করার জন্যে কিছু নিয়ম কানুন মেনে কার্য পরিচালনা করতে হয়। সন্মানিত গ্রাহকগনের প্রতি বিশেষভাবে অনুরোধ Star Tech Ltd থেকে কম্পিউটার পণ্য কেনার পূর্বে <strong style=\"margin: 0px; padding: 0px;\">নিন্ম উল্লেখিত নিয়মাবলি ভালোভাবে অনুসরণ করবেন। ধন্যবাদ।</strong></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 26px;\">বিক্রয়ের সময় যে সমস্ত প্রোডাক্টের ওয়ারেন্টি ঘোষণা করা হয় সেগুলো মূলত পন্য প্রস্তুতকারক কর্তৃক প্রদান করা ওয়ারেন্টি । অর্থাৎ বিক্রিত পণ্যের ওয়ারেন্টি সেবা মূলত নির্দিষ্ট ব্রান্ডের মূল কোম্পানী বহন করে থাকে। ওয়ারেন্টি সেবার ভিন্নতার দিক থেকে প্রত্যেকটি ব্র্যান্ড সতন্ত্র এবং তাঁদের বিভিন্ন শর্তাবলী নিজস্ব অফিশিয়াল ওয়েবসাইটে উল্লেখ করা আছে। এক্ষেত্রে সাহায্যকারী প্রতিষ্ঠান Star Tech Ltd মূল ব্রান্ডের কোম্পানি গুলোর ওয়ারেন্টি সেবার শর্তাবলী কার্যকর করার মাধ্যম হিসেবে কাজ করছে।</p></div><h1 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-weight: 700; font-size: 18px; line-height: 27px; color: rgb(1, 19, 45); font-family: \"Trebuchet MS\", sans-serif; letter-spacing: normal; background-color: rgb(255, 255, 255);\">প্রস্তুতকারী প্রতিষ্ঠান নির্ধারিত ওয়ারেন্টি শর্তাবলী নিম্নরূপঃ</h1><hr style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; background-color: rgb(214, 214, 214); border-width: initial; border-style: none; color: rgb(0, 0, 0); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal;\"><ul style=\"margin: 20px 0px 30px; padding: 0px; font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(255, 255, 255);\"><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">Star Tech Ltd প্রতিটি প্রোডাক্ট এর <strong style=\"margin: 0px; padding: 0px;\">আন্তর্জাতিক, দেশীয় ও বাংলাদেশ কম্পিউটার সমিতি (BCS) কর্তৃক প্রদত্ত </strong><a rel=\"”nofollow”\" href=\"https://bcs.org.bd/page/publication/Warranty-Policy-GpxT5\" target=\"_blank\" style=\"margin: 0px; padding: 0px; text-decoration: none; color: var(--s-primary);\">ওয়ারেন্টি নীতিমালা</a><strong style=\"margin: 0px; padding: 0px;\"> অনুসরন করে।</strong></li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টি হল এমন একটি সেবা যা উৎপাদনকারী বা আমদানীকারক এবং ক্রেতা উভয় পক্ষের মধ্যে একটি চুক্তি। এই চুক্তির মাধ্যমে ক্রেতা উৎপাদনকারী বা আমদানীকারকের উপর বিক্রিত পণ্যের মেরামত বা প্রতিস্থাপনের দায়িত্ব বর্তায়। ক্রয়ক্রিত পণ্যের ওয়ারেন্টি সেবা পেতে স্টার টেক ক্রেতাকে সার্বিক সহযোগিতা করে থাকেন এবং ক্রেতা ও উৎপাদনকারী বা আমদানীকারক এর মধ্যে স্টার টেক মধ্যস্থতাকারী হিসেবে কাজ করে।<br style=\"margin: 0px; padding: 0px;\"></li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">Star Tech Ltd কর্তৃক আমদানিকৃ্ত অধিকাংশ প্রোডাক্ট এর ওয়ারেন্টি স্বল্প সময়ের মধ্যে প্রধান করা হয় এবং বেশকিছু প্রোডাক্ট এর অভিযোগ আসা মাত্র তা পরিবর্তন করে দেওয়া হয়।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">বিক্রিত সকল প্রোডাক্ট এ ওয়ারেন্টি প্রদান করা হয় না। শুধুমাত্র যেসকল প্রোডাক্ট গুলোতে মূল কোম্পানি ওয়ারেন্টি মেয়াদ ঘোষণা করে থাকে সেগুলোর ক্ষেত্রে ওয়ারেন্টি কার্যকর হয়ে থাকে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ল্যাপটপের <strong style=\"margin: 0px; padding: 0px;\">ব্র্যান্ড ও মডেল ভেদে ওয়ারেন্টি ১-৩ বছর হয়।</strong> কিন্তু সকল ল্যাপটপ <strong style=\"margin: 0px; padding: 0px;\">ব্যাটারি ও এডাপ্টারের ওয়ারেন্টি শুধমাত্র ১ বছর</strong>।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টির আওতাভুক্ত কোন প্রোডাক্ট বিক্রির পর যদি তাতে ত্রুটি ধরা পড়ে, তবে মেরামতের মাধ্যমে সেই ত্রুটি দূর করা হয় এবং পন্যের প্রকারভেদে তা সাথে সাথে পরিবর্তন করে দেওয়া হয়ে থাকে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট বদলে দেয়ার মতন না থেকে থাকলে Star Tech Ltd নিজস্ব স্টকে বর্তমান অন্য কোন ব্র্যান্ডের সমমানের পণ্য দিয়ে বদল করে দিতে পারে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট মেরামতের অযোগ্য ও বদলে দেয়ার মতন একই কিংবা সমমানের পণ্য যদি আমাদের স্টকে বর্তমান না থাকে সেক্ষেত্রে উক্ত মডেল থেকে ভাল কোন প্রোডাক্ট অবচয় ও মূল্য সমন্বয় এর মাধ্যমে বদলে দেয়া যেতে পারে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট মেরামত বা বদলে দেয়ার অযোগ্য Star Tech Ltd এর কাছে বর্তমান না থাকলে, বিক্রয় অবচয় সমন্বয় এর মাধ্যমে মূল্যের অর্থ ফেরত দেওয়া যেতে পারে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">প্রোডাক্ট ব্যাবহারের সময় কিংবা Star Tech Ltd এর সার্ভিসের সময় <strong style=\"margin: 0px; padding: 0px;\">যদি কোন সফটওয়্যার বা ডাটা নষ্ট কিংবা হারিয়ে যায় এর দায়ভার Star Tech Ltd বহন করবে না</strong>। উল্লেখ্য যে, এক্ষেত্রে ডাটা পুনরুদ্ধার বা সফটওয়্যার পুনস্থাপনের কাজের দায়িত্ত্বও Star Tech Ltd এর উপর বর্তাবে না।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট ওয়ারেন্টির আওতায় নেয়ার পর সার্ভিসের কাজ শেষ করে প্রোডাক্টটি ফেরত দেয়ার সময় নির্দিষ্ট নয়, <strong style=\"margin: 0px; padding: 0px;\">এই সময় ৫-৭ দিন থেকে সর্বোচ্চ ৩৫-৪০ দিন কিংবা আরো বেশী হতে পারে</strong>; কারণ অধিকাংশ ক্ষেত্রে মেরামতের জন্য প্রয়োজনীয় যন্ত্রাংশ দেশে পর্যাপ্ত বাফার স্টক না থাকায় তা বিশেষভাবে আমদানী করে আনতে হয় যা অনেক সময় সাপেক্ষ।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ক্রেতাসাধারনের অবগতির জানানো যাচ্ছে যে বেশীরভাগ ওয়ারেন্টি প্রোডাক্ট রিপেয়ার হয় না, যে পার্টস টি নস্ট হয় সেটা পরিবর্তন করা হয় বরং অধিকাংশ ক্ষেত্রে বিদেশ থেকে আমদানি করা হয়।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">বিক্রয়ের সময় যে কম্পিউটার সেটআপ ও অপারেটিং সিস্টেম কাস্টমাইজ করে দেয়া হয় তা ওয়ারেন্টির আওতায় থাকে না।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">লাইফ টাইম ওয়ারেন্টি মূলত বাজারে প্রচলিত পণ্য হিসেবে বিবেচিত হওয়ার সময়কাল পর্যন্ত ঐ পণ্যের ওয়ারেন্টি সেবা প্রদানকে লাইফ টাইম ওয়ারেন্টি বুঝাবে। কোনো পণ্যের ‘লাইফ টাইম’ ওয়ারেন্টির আওতায় ওই পণ্যটি মার্কেটে প্রচলিত পণ্য হলে, ক্রেতা ওয়ারেন্টি সেবা প্রাপ্ত হবে। কোনো পণ্য বাজারে EOL(End of Life) হিসেবে গণ্য হলে অর্থাৎ পণ্যটি যদি অপ্রচলিত হয়ে পড়ে তবে তা আর ওয়ারেন্টির আওতায় আসবে না। পণ্যের নতুন সংস্করণ বাজারে আসলে তা পুরাতন সংস্করণের সাথে ওয়ারেন্টি সেবা পাবে না। উল্লেখ্য, লাইফ টাইম ওয়ারেন্টির ক্ষেত্রে বিসিএর এর নীতিমালা অনুযায়ী গ্রাহক বা ক্রেতা সর্বোচ্চ ২(দুই) বছর এ সেবা উপভোগ করতে পারবেন।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টির আওতা বহির্ভূত যেকোন সার্ভিসের জন্য Star Tech মূল্য ধার্য করতে পারবে যা ক্রেতার সম্মতি সাপেক্ষে কার্যকর হবে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">সার্ভিস ওয়ারেন্টির ক্ষেত্রে যদি কোন যন্ত্রাংশ পরিবর্তন বা সংযোজনের প্রয়োজন হয় তাহলে ক্রেতা সাধারন তা নিজ দায়িত্বে সংগ্রহ করবেন অথবা ক্রেতাগনের সম্মতিতে অগ্রিম মূল্য পরিশোধ সাপেক্ষে Star Tech এর মাধ্যমে সংগ্রহ করতে পারবেন।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টির নির্ধারিত মেয়াদ থাকাকালীন বা উত্তীর্ণ হওয়ার পরে Star Tech কর্তৃক প্রদত্ত ফ্রি সফটওয়্যার বা হার্ডওয়্যার টিউনিংএ যদি প্রোডাক্ট এ কোন সমস্যা ধরা পড়ে বা নতুন কোন সমস্যার সৃষ্টি হয় তার দায়ভার Star Tech এর উপর বর্তাবে না।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">মনিটরের <strong style=\"margin: 0px; padding: 0px;\">ডেড পিক্সেল (Dead Pixel)</strong> জনিত ওয়ারেন্টি ক্লেইমের জন্য তাতে ন্যূনতম ৩ বা তার বেশি ডেড পিক্সেল দৃশ্যমান হতে হবে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">প্রোডাক্টের ওয়ারেন্টি ক্লেইমের সময় ক্রেতাকে প্রোডাক্টের বক্স সাথে নিয়ে আসা বাধ্যতামূলক।</span></li></ul>', '<div class=\"tnc-desc\" style=\"margin: 0px 0px 30px; padding: 0px; font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(255, 255, 255);\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 26px;\">সম্মানিত ক্রেতাবৃন্দ, স্টার টেক সব সময় কাস্টমারদের সর্বোচ্চ গুরুত্ব দিয়ে থাকে। এতদসত্বেও গ্রাহক সেবার মান উন্নত, সময়োপযোগী এবং দ্রুততর করার জন্যে কিছু নিয়ম কানুন মেনে কার্য পরিচালনা করতে হয়। সন্মানিত গ্রাহকগনের প্রতি বিশেষভাবে অনুরোধ Star Tech Ltd থেকে কম্পিউটার পণ্য কেনার পূর্বে <strong style=\"margin: 0px; padding: 0px;\">নিন্ম উল্লেখিত নিয়মাবলি ভালোভাবে অনুসরণ করবেন। ধন্যবাদ।</strong></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 26px;\">বিক্রয়ের সময় যে সমস্ত প্রোডাক্টের ওয়ারেন্টি ঘোষণা করা হয় সেগুলো মূলত পন্য প্রস্তুতকারক কর্তৃক প্রদান করা ওয়ারেন্টি । অর্থাৎ বিক্রিত পণ্যের ওয়ারেন্টি সেবা মূলত নির্দিষ্ট ব্রান্ডের মূল কোম্পানী বহন করে থাকে। ওয়ারেন্টি সেবার ভিন্নতার দিক থেকে প্রত্যেকটি ব্র্যান্ড সতন্ত্র এবং তাঁদের বিভিন্ন শর্তাবলী নিজস্ব অফিশিয়াল ওয়েবসাইটে উল্লেখ করা আছে। এক্ষেত্রে সাহায্যকারী প্রতিষ্ঠান Star Tech Ltd মূল ব্রান্ডের কোম্পানি গুলোর ওয়ারেন্টি সেবার শর্তাবলী কার্যকর করার মাধ্যম হিসেবে কাজ করছে।</p></div><h1 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-weight: 700; font-size: 18px; line-height: 27px; color: rgb(1, 19, 45); font-family: \"Trebuchet MS\", sans-serif; letter-spacing: normal; background-color: rgb(255, 255, 255);\">প্রস্তুতকারী প্রতিষ্ঠান নির্ধারিত ওয়ারেন্টি শর্তাবলী নিম্নরূপঃ</h1><hr style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; background-color: rgb(214, 214, 214); border-width: initial; border-style: none; color: rgb(0, 0, 0); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal;\"><ul style=\"margin: 20px 0px 30px; padding: 0px; font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(255, 255, 255);\"><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">Star Tech Ltd প্রতিটি প্রোডাক্ট এর <strong style=\"margin: 0px; padding: 0px;\">আন্তর্জাতিক, দেশীয় ও বাংলাদেশ কম্পিউটার সমিতি (BCS) কর্তৃক প্রদত্ত </strong><a rel=\"”nofollow”\" href=\"https://bcs.org.bd/page/publication/Warranty-Policy-GpxT5\" target=\"_blank\" style=\"margin: 0px; padding: 0px; text-decoration: none; color: var(--s-primary);\">ওয়ারেন্টি নীতিমালা</a><strong style=\"margin: 0px; padding: 0px;\"> অনুসরন করে।</strong></li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টি হল এমন একটি সেবা যা উৎপাদনকারী বা আমদানীকারক এবং ক্রেতা উভয় পক্ষের মধ্যে একটি চুক্তি। এই চুক্তির মাধ্যমে ক্রেতা উৎপাদনকারী বা আমদানীকারকের উপর বিক্রিত পণ্যের মেরামত বা প্রতিস্থাপনের দায়িত্ব বর্তায়। ক্রয়ক্রিত পণ্যের ওয়ারেন্টি সেবা পেতে স্টার টেক ক্রেতাকে সার্বিক সহযোগিতা করে থাকেন এবং ক্রেতা ও উৎপাদনকারী বা আমদানীকারক এর মধ্যে স্টার টেক মধ্যস্থতাকারী হিসেবে কাজ করে।<br style=\"margin: 0px; padding: 0px;\"></li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">Star Tech Ltd কর্তৃক আমদানিকৃ্ত অধিকাংশ প্রোডাক্ট এর ওয়ারেন্টি স্বল্প সময়ের মধ্যে প্রধান করা হয় এবং বেশকিছু প্রোডাক্ট এর অভিযোগ আসা মাত্র তা পরিবর্তন করে দেওয়া হয়।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">বিক্রিত সকল প্রোডাক্ট এ ওয়ারেন্টি প্রদান করা হয় না। শুধুমাত্র যেসকল প্রোডাক্ট গুলোতে মূল কোম্পানি ওয়ারেন্টি মেয়াদ ঘোষণা করে থাকে সেগুলোর ক্ষেত্রে ওয়ারেন্টি কার্যকর হয়ে থাকে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ল্যাপটপের <strong style=\"margin: 0px; padding: 0px;\">ব্র্যান্ড ও মডেল ভেদে ওয়ারেন্টি ১-৩ বছর হয়।</strong> কিন্তু সকল ল্যাপটপ <strong style=\"margin: 0px; padding: 0px;\">ব্যাটারি ও এডাপ্টারের ওয়ারেন্টি শুধমাত্র ১ বছর</strong>।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টির আওতাভুক্ত কোন প্রোডাক্ট বিক্রির পর যদি তাতে ত্রুটি ধরা পড়ে, তবে মেরামতের মাধ্যমে সেই ত্রুটি দূর করা হয় এবং পন্যের প্রকারভেদে তা সাথে সাথে পরিবর্তন করে দেওয়া হয়ে থাকে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট বদলে দেয়ার মতন না থেকে থাকলে Star Tech Ltd নিজস্ব স্টকে বর্তমান অন্য কোন ব্র্যান্ডের সমমানের পণ্য দিয়ে বদল করে দিতে পারে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট মেরামতের অযোগ্য ও বদলে দেয়ার মতন একই কিংবা সমমানের পণ্য যদি আমাদের স্টকে বর্তমান না থাকে সেক্ষেত্রে উক্ত মডেল থেকে ভাল কোন প্রোডাক্ট অবচয় ও মূল্য সমন্বয় এর মাধ্যমে বদলে দেয়া যেতে পারে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট মেরামত বা বদলে দেয়ার অযোগ্য Star Tech Ltd এর কাছে বর্তমান না থাকলে, বিক্রয় অবচয় সমন্বয় এর মাধ্যমে মূল্যের অর্থ ফেরত দেওয়া যেতে পারে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">প্রোডাক্ট ব্যাবহারের সময় কিংবা Star Tech Ltd এর সার্ভিসের সময় <strong style=\"margin: 0px; padding: 0px;\">যদি কোন সফটওয়্যার বা ডাটা নষ্ট কিংবা হারিয়ে যায় এর দায়ভার Star Tech Ltd বহন করবে না</strong>। উল্লেখ্য যে, এক্ষেত্রে ডাটা পুনরুদ্ধার বা সফটওয়্যার পুনস্থাপনের কাজের দায়িত্ত্বও Star Tech Ltd এর উপর বর্তাবে না।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট ওয়ারেন্টির আওতায় নেয়ার পর সার্ভিসের কাজ শেষ করে প্রোডাক্টটি ফেরত দেয়ার সময় নির্দিষ্ট নয়, <strong style=\"margin: 0px; padding: 0px;\">এই সময় ৫-৭ দিন থেকে সর্বোচ্চ ৩৫-৪০ দিন কিংবা আরো বেশী হতে পারে</strong>; কারণ অধিকাংশ ক্ষেত্রে মেরামতের জন্য প্রয়োজনীয় যন্ত্রাংশ দেশে পর্যাপ্ত বাফার স্টক না থাকায় তা বিশেষভাবে আমদানী করে আনতে হয় যা অনেক সময় সাপেক্ষ।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ক্রেতাসাধারনের অবগতির জানানো যাচ্ছে যে বেশীরভাগ ওয়ারেন্টি প্রোডাক্ট রিপেয়ার হয় না, যে পার্টস টি নস্ট হয় সেটা পরিবর্তন করা হয় বরং অধিকাংশ ক্ষেত্রে বিদেশ থেকে আমদানি করা হয়।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">বিক্রয়ের সময় যে কম্পিউটার সেটআপ ও অপারেটিং সিস্টেম কাস্টমাইজ করে দেয়া হয় তা ওয়ারেন্টির আওতায় থাকে না।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">লাইফ টাইম ওয়ারেন্টি মূলত বাজারে প্রচলিত পণ্য হিসেবে বিবেচিত হওয়ার সময়কাল পর্যন্ত ঐ পণ্যের ওয়ারেন্টি সেবা প্রদানকে লাইফ টাইম ওয়ারেন্টি বুঝাবে। কোনো পণ্যের ‘লাইফ টাইম’ ওয়ারেন্টির আওতায় ওই পণ্যটি মার্কেটে প্রচলিত পণ্য হলে, ক্রেতা ওয়ারেন্টি সেবা প্রাপ্ত হবে। কোনো পণ্য বাজারে EOL(End of Life) হিসেবে গণ্য হলে অর্থাৎ পণ্যটি যদি অপ্রচলিত হয়ে পড়ে তবে তা আর ওয়ারেন্টির আওতায় আসবে না। পণ্যের নতুন সংস্করণ বাজারে আসলে তা পুরাতন সংস্করণের সাথে ওয়ারেন্টি সেবা পাবে না। উল্লেখ্য, লাইফ টাইম ওয়ারেন্টির ক্ষেত্রে বিসিএর এর নীতিমালা অনুযায়ী গ্রাহক বা ক্রেতা সর্বোচ্চ ২(দুই) বছর এ সেবা উপভোগ করতে পারবেন।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টির আওতা বহির্ভূত যেকোন সার্ভিসের জন্য Star Tech মূল্য ধার্য করতে পারবে যা ক্রেতার সম্মতি সাপেক্ষে কার্যকর হবে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">সার্ভিস ওয়ারেন্টির ক্ষেত্রে যদি কোন যন্ত্রাংশ পরিবর্তন বা সংযোজনের প্রয়োজন হয় তাহলে ক্রেতা সাধারন তা নিজ দায়িত্বে সংগ্রহ করবেন অথবা ক্রেতাগনের সম্মতিতে অগ্রিম মূল্য পরিশোধ সাপেক্ষে Star Tech এর মাধ্যমে সংগ্রহ করতে পারবেন।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টির নির্ধারিত মেয়াদ থাকাকালীন বা উত্তীর্ণ হওয়ার পরে Star Tech কর্তৃক প্রদত্ত ফ্রি সফটওয়্যার বা হার্ডওয়্যার টিউনিংএ যদি প্রোডাক্ট এ কোন সমস্যা ধরা পড়ে বা নতুন কোন সমস্যার সৃষ্টি হয় তার দায়ভার Star Tech এর উপর বর্তাবে না।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">মনিটরের <strong style=\"margin: 0px; padding: 0px;\">ডেড পিক্সেল (Dead Pixel)</strong> জনিত ওয়ারেন্টি ক্লেইমের জন্য তাতে ন্যূনতম ৩ বা তার বেশি ডেড পিক্সেল দৃশ্যমান হতে হবে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">প্রোডাক্টের ওয়ারেন্টি ক্লেইমের সময় ক্রেতাকে প্রোডাক্টের বক্স সাথে নিয়ে আসা বাধ্যতামূলক।</span></li></ul>', '<div class=\"tnc-desc\" style=\"margin: 0px 0px 30px; padding: 0px; font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(255, 255, 255);\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 26px;\">সম্মানিত ক্রেতাবৃন্দ, স্টার টেক সব সময় কাস্টমারদের সর্বোচ্চ গুরুত্ব দিয়ে থাকে। এতদসত্বেও গ্রাহক সেবার মান উন্নত, সময়োপযোগী এবং দ্রুততর করার জন্যে কিছু নিয়ম কানুন মেনে কার্য পরিচালনা করতে হয়। সন্মানিত গ্রাহকগনের প্রতি বিশেষভাবে অনুরোধ Star Tech Ltd থেকে কম্পিউটার পণ্য কেনার পূর্বে <strong style=\"margin: 0px; padding: 0px;\">নিন্ম উল্লেখিত নিয়মাবলি ভালোভাবে অনুসরণ করবেন। ধন্যবাদ।</strong></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 26px;\">বিক্রয়ের সময় যে সমস্ত প্রোডাক্টের ওয়ারেন্টি ঘোষণা করা হয় সেগুলো মূলত পন্য প্রস্তুতকারক কর্তৃক প্রদান করা ওয়ারেন্টি । অর্থাৎ বিক্রিত পণ্যের ওয়ারেন্টি সেবা মূলত নির্দিষ্ট ব্রান্ডের মূল কোম্পানী বহন করে থাকে। ওয়ারেন্টি সেবার ভিন্নতার দিক থেকে প্রত্যেকটি ব্র্যান্ড সতন্ত্র এবং তাঁদের বিভিন্ন শর্তাবলী নিজস্ব অফিশিয়াল ওয়েবসাইটে উল্লেখ করা আছে। এক্ষেত্রে সাহায্যকারী প্রতিষ্ঠান Star Tech Ltd মূল ব্রান্ডের কোম্পানি গুলোর ওয়ারেন্টি সেবার শর্তাবলী কার্যকর করার মাধ্যম হিসেবে কাজ করছে।</p></div><h1 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-weight: 700; font-size: 18px; line-height: 27px; color: rgb(1, 19, 45); font-family: \"Trebuchet MS\", sans-serif; letter-spacing: normal; background-color: rgb(255, 255, 255);\">প্রস্তুতকারী প্রতিষ্ঠান নির্ধারিত ওয়ারেন্টি শর্তাবলী নিম্নরূপঃ</h1><hr style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; background-color: rgb(214, 214, 214); border-width: initial; border-style: none; color: rgb(0, 0, 0); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal;\"><ul style=\"margin: 20px 0px 30px; padding: 0px; font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(255, 255, 255);\"><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">Star Tech Ltd প্রতিটি প্রোডাক্ট এর <strong style=\"margin: 0px; padding: 0px;\">আন্তর্জাতিক, দেশীয় ও বাংলাদেশ কম্পিউটার সমিতি (BCS) কর্তৃক প্রদত্ত </strong><a rel=\"”nofollow”\" href=\"https://bcs.org.bd/page/publication/Warranty-Policy-GpxT5\" target=\"_blank\" style=\"margin: 0px; padding: 0px; text-decoration: none; color: var(--s-primary);\">ওয়ারেন্টি নীতিমালা</a><strong style=\"margin: 0px; padding: 0px;\"> অনুসরন করে।</strong></li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টি হল এমন একটি সেবা যা উৎপাদনকারী বা আমদানীকারক এবং ক্রেতা উভয় পক্ষের মধ্যে একটি চুক্তি। এই চুক্তির মাধ্যমে ক্রেতা উৎপাদনকারী বা আমদানীকারকের উপর বিক্রিত পণ্যের মেরামত বা প্রতিস্থাপনের দায়িত্ব বর্তায়। ক্রয়ক্রিত পণ্যের ওয়ারেন্টি সেবা পেতে স্টার টেক ক্রেতাকে সার্বিক সহযোগিতা করে থাকেন এবং ক্রেতা ও উৎপাদনকারী বা আমদানীকারক এর মধ্যে স্টার টেক মধ্যস্থতাকারী হিসেবে কাজ করে।<br style=\"margin: 0px; padding: 0px;\"></li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">Star Tech Ltd কর্তৃক আমদানিকৃ্ত অধিকাংশ প্রোডাক্ট এর ওয়ারেন্টি স্বল্প সময়ের মধ্যে প্রধান করা হয় এবং বেশকিছু প্রোডাক্ট এর অভিযোগ আসা মাত্র তা পরিবর্তন করে দেওয়া হয়।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">বিক্রিত সকল প্রোডাক্ট এ ওয়ারেন্টি প্রদান করা হয় না। শুধুমাত্র যেসকল প্রোডাক্ট গুলোতে মূল কোম্পানি ওয়ারেন্টি মেয়াদ ঘোষণা করে থাকে সেগুলোর ক্ষেত্রে ওয়ারেন্টি কার্যকর হয়ে থাকে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ল্যাপটপের <strong style=\"margin: 0px; padding: 0px;\">ব্র্যান্ড ও মডেল ভেদে ওয়ারেন্টি ১-৩ বছর হয়।</strong> কিন্তু সকল ল্যাপটপ <strong style=\"margin: 0px; padding: 0px;\">ব্যাটারি ও এডাপ্টারের ওয়ারেন্টি শুধমাত্র ১ বছর</strong>।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টির আওতাভুক্ত কোন প্রোডাক্ট বিক্রির পর যদি তাতে ত্রুটি ধরা পড়ে, তবে মেরামতের মাধ্যমে সেই ত্রুটি দূর করা হয় এবং পন্যের প্রকারভেদে তা সাথে সাথে পরিবর্তন করে দেওয়া হয়ে থাকে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট বদলে দেয়ার মতন না থেকে থাকলে Star Tech Ltd নিজস্ব স্টকে বর্তমান অন্য কোন ব্র্যান্ডের সমমানের পণ্য দিয়ে বদল করে দিতে পারে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট মেরামতের অযোগ্য ও বদলে দেয়ার মতন একই কিংবা সমমানের পণ্য যদি আমাদের স্টকে বর্তমান না থাকে সেক্ষেত্রে উক্ত মডেল থেকে ভাল কোন প্রোডাক্ট অবচয় ও মূল্য সমন্বয় এর মাধ্যমে বদলে দেয়া যেতে পারে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট মেরামত বা বদলে দেয়ার অযোগ্য Star Tech Ltd এর কাছে বর্তমান না থাকলে, বিক্রয় অবচয় সমন্বয় এর মাধ্যমে মূল্যের অর্থ ফেরত দেওয়া যেতে পারে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">প্রোডাক্ট ব্যাবহারের সময় কিংবা Star Tech Ltd এর সার্ভিসের সময় <strong style=\"margin: 0px; padding: 0px;\">যদি কোন সফটওয়্যার বা ডাটা নষ্ট কিংবা হারিয়ে যায় এর দায়ভার Star Tech Ltd বহন করবে না</strong>। উল্লেখ্য যে, এক্ষেত্রে ডাটা পুনরুদ্ধার বা সফটওয়্যার পুনস্থাপনের কাজের দায়িত্ত্বও Star Tech Ltd এর উপর বর্তাবে না।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট ওয়ারেন্টির আওতায় নেয়ার পর সার্ভিসের কাজ শেষ করে প্রোডাক্টটি ফেরত দেয়ার সময় নির্দিষ্ট নয়, <strong style=\"margin: 0px; padding: 0px;\">এই সময় ৫-৭ দিন থেকে সর্বোচ্চ ৩৫-৪০ দিন কিংবা আরো বেশী হতে পারে</strong>; কারণ অধিকাংশ ক্ষেত্রে মেরামতের জন্য প্রয়োজনীয় যন্ত্রাংশ দেশে পর্যাপ্ত বাফার স্টক না থাকায় তা বিশেষভাবে আমদানী করে আনতে হয় যা অনেক সময় সাপেক্ষ।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ক্রেতাসাধারনের অবগতির জানানো যাচ্ছে যে বেশীরভাগ ওয়ারেন্টি প্রোডাক্ট রিপেয়ার হয় না, যে পার্টস টি নস্ট হয় সেটা পরিবর্তন করা হয় বরং অধিকাংশ ক্ষেত্রে বিদেশ থেকে আমদানি করা হয়।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">বিক্রয়ের সময় যে কম্পিউটার সেটআপ ও অপারেটিং সিস্টেম কাস্টমাইজ করে দেয়া হয় তা ওয়ারেন্টির আওতায় থাকে না।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">লাইফ টাইম ওয়ারেন্টি মূলত বাজারে প্রচলিত পণ্য হিসেবে বিবেচিত হওয়ার সময়কাল পর্যন্ত ঐ পণ্যের ওয়ারেন্টি সেবা প্রদানকে লাইফ টাইম ওয়ারেন্টি বুঝাবে। কোনো পণ্যের ‘লাইফ টাইম’ ওয়ারেন্টির আওতায় ওই পণ্যটি মার্কেটে প্রচলিত পণ্য হলে, ক্রেতা ওয়ারেন্টি সেবা প্রাপ্ত হবে। কোনো পণ্য বাজারে EOL(End of Life) হিসেবে গণ্য হলে অর্থাৎ পণ্যটি যদি অপ্রচলিত হয়ে পড়ে তবে তা আর ওয়ারেন্টির আওতায় আসবে না। পণ্যের নতুন সংস্করণ বাজারে আসলে তা পুরাতন সংস্করণের সাথে ওয়ারেন্টি সেবা পাবে না। উল্লেখ্য, লাইফ টাইম ওয়ারেন্টির ক্ষেত্রে বিসিএর এর নীতিমালা অনুযায়ী গ্রাহক বা ক্রেতা সর্বোচ্চ ২(দুই) বছর এ সেবা উপভোগ করতে পারবেন।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টির আওতা বহির্ভূত যেকোন সার্ভিসের জন্য Star Tech মূল্য ধার্য করতে পারবে যা ক্রেতার সম্মতি সাপেক্ষে কার্যকর হবে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">সার্ভিস ওয়ারেন্টির ক্ষেত্রে যদি কোন যন্ত্রাংশ পরিবর্তন বা সংযোজনের প্রয়োজন হয় তাহলে ক্রেতা সাধারন তা নিজ দায়িত্বে সংগ্রহ করবেন অথবা ক্রেতাগনের সম্মতিতে অগ্রিম মূল্য পরিশোধ সাপেক্ষে Star Tech এর মাধ্যমে সংগ্রহ করতে পারবেন।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টির নির্ধারিত মেয়াদ থাকাকালীন বা উত্তীর্ণ হওয়ার পরে Star Tech কর্তৃক প্রদত্ত ফ্রি সফটওয়্যার বা হার্ডওয়্যার টিউনিংএ যদি প্রোডাক্ট এ কোন সমস্যা ধরা পড়ে বা নতুন কোন সমস্যার সৃষ্টি হয় তার দায়ভার Star Tech এর উপর বর্তাবে না।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">মনিটরের <strong style=\"margin: 0px; padding: 0px;\">ডেড পিক্সেল (Dead Pixel)</strong> জনিত ওয়ারেন্টি ক্লেইমের জন্য তাতে ন্যূনতম ৩ বা তার বেশি ডেড পিক্সেল দৃশ্যমান হতে হবে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">প্রোডাক্টের ওয়ারেন্টি ক্লেইমের সময় ক্রেতাকে প্রোডাক্টের বক্স সাথে নিয়ে আসা বাধ্যতামূলক।</span></li></ul>', '<div class=\"tnc-desc\" style=\"margin: 0px 0px 30px; padding: 0px; font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(255, 255, 255);\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 26px;\">সম্মানিত ক্রেতাবৃন্দ, স্টার টেক সব সময় কাস্টমারদের সর্বোচ্চ গুরুত্ব দিয়ে থাকে। এতদসত্বেও গ্রাহক সেবার মান উন্নত, সময়োপযোগী এবং দ্রুততর করার জন্যে কিছু নিয়ম কানুন মেনে কার্য পরিচালনা করতে হয়। সন্মানিত গ্রাহকগনের প্রতি বিশেষভাবে অনুরোধ Star Tech Ltd থেকে কম্পিউটার পণ্য কেনার পূর্বে <strong style=\"margin: 0px; padding: 0px;\">নিন্ম উল্লেখিত নিয়মাবলি ভালোভাবে অনুসরণ করবেন। ধন্যবাদ।</strong></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 26px;\">বিক্রয়ের সময় যে সমস্ত প্রোডাক্টের ওয়ারেন্টি ঘোষণা করা হয় সেগুলো মূলত পন্য প্রস্তুতকারক কর্তৃক প্রদান করা ওয়ারেন্টি । অর্থাৎ বিক্রিত পণ্যের ওয়ারেন্টি সেবা মূলত নির্দিষ্ট ব্রান্ডের মূল কোম্পানী বহন করে থাকে। ওয়ারেন্টি সেবার ভিন্নতার দিক থেকে প্রত্যেকটি ব্র্যান্ড সতন্ত্র এবং তাঁদের বিভিন্ন শর্তাবলী নিজস্ব অফিশিয়াল ওয়েবসাইটে উল্লেখ করা আছে। এক্ষেত্রে সাহায্যকারী প্রতিষ্ঠান Star Tech Ltd মূল ব্রান্ডের কোম্পানি গুলোর ওয়ারেন্টি সেবার শর্তাবলী কার্যকর করার মাধ্যম হিসেবে কাজ করছে।</p></div><h1 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-weight: 700; font-size: 18px; line-height: 27px; color: rgb(1, 19, 45); font-family: \"Trebuchet MS\", sans-serif; letter-spacing: normal; background-color: rgb(255, 255, 255);\">প্রস্তুতকারী প্রতিষ্ঠান নির্ধারিত ওয়ারেন্টি শর্তাবলী নিম্নরূপঃ</h1><hr style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; background-color: rgb(214, 214, 214); border-width: initial; border-style: none; color: rgb(0, 0, 0); font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal;\"><ul style=\"margin: 20px 0px 30px; padding: 0px; font-family: \"Trebuchet MS\", sans-serif; font-size: 15px; letter-spacing: normal; background-color: rgb(255, 255, 255);\"><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">Star Tech Ltd প্রতিটি প্রোডাক্ট এর <strong style=\"margin: 0px; padding: 0px;\">আন্তর্জাতিক, দেশীয় ও বাংলাদেশ কম্পিউটার সমিতি (BCS) কর্তৃক প্রদত্ত </strong><a rel=\"”nofollow”\" href=\"https://bcs.org.bd/page/publication/Warranty-Policy-GpxT5\" target=\"_blank\" style=\"margin: 0px; padding: 0px; text-decoration: none; color: var(--s-primary);\">ওয়ারেন্টি নীতিমালা</a><strong style=\"margin: 0px; padding: 0px;\"> অনুসরন করে।</strong></li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টি হল এমন একটি সেবা যা উৎপাদনকারী বা আমদানীকারক এবং ক্রেতা উভয় পক্ষের মধ্যে একটি চুক্তি। এই চুক্তির মাধ্যমে ক্রেতা উৎপাদনকারী বা আমদানীকারকের উপর বিক্রিত পণ্যের মেরামত বা প্রতিস্থাপনের দায়িত্ব বর্তায়। ক্রয়ক্রিত পণ্যের ওয়ারেন্টি সেবা পেতে স্টার টেক ক্রেতাকে সার্বিক সহযোগিতা করে থাকেন এবং ক্রেতা ও উৎপাদনকারী বা আমদানীকারক এর মধ্যে স্টার টেক মধ্যস্থতাকারী হিসেবে কাজ করে।<br style=\"margin: 0px; padding: 0px;\"></li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">Star Tech Ltd কর্তৃক আমদানিকৃ্ত অধিকাংশ প্রোডাক্ট এর ওয়ারেন্টি স্বল্প সময়ের মধ্যে প্রধান করা হয় এবং বেশকিছু প্রোডাক্ট এর অভিযোগ আসা মাত্র তা পরিবর্তন করে দেওয়া হয়।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">বিক্রিত সকল প্রোডাক্ট এ ওয়ারেন্টি প্রদান করা হয় না। শুধুমাত্র যেসকল প্রোডাক্ট গুলোতে মূল কোম্পানি ওয়ারেন্টি মেয়াদ ঘোষণা করে থাকে সেগুলোর ক্ষেত্রে ওয়ারেন্টি কার্যকর হয়ে থাকে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ল্যাপটপের <strong style=\"margin: 0px; padding: 0px;\">ব্র্যান্ড ও মডেল ভেদে ওয়ারেন্টি ১-৩ বছর হয়।</strong> কিন্তু সকল ল্যাপটপ <strong style=\"margin: 0px; padding: 0px;\">ব্যাটারি ও এডাপ্টারের ওয়ারেন্টি শুধমাত্র ১ বছর</strong>।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টির আওতাভুক্ত কোন প্রোডাক্ট বিক্রির পর যদি তাতে ত্রুটি ধরা পড়ে, তবে মেরামতের মাধ্যমে সেই ত্রুটি দূর করা হয় এবং পন্যের প্রকারভেদে তা সাথে সাথে পরিবর্তন করে দেওয়া হয়ে থাকে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট বদলে দেয়ার মতন না থেকে থাকলে Star Tech Ltd নিজস্ব স্টকে বর্তমান অন্য কোন ব্র্যান্ডের সমমানের পণ্য দিয়ে বদল করে দিতে পারে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট মেরামতের অযোগ্য ও বদলে দেয়ার মতন একই কিংবা সমমানের পণ্য যদি আমাদের স্টকে বর্তমান না থাকে সেক্ষেত্রে উক্ত মডেল থেকে ভাল কোন প্রোডাক্ট অবচয় ও মূল্য সমন্বয় এর মাধ্যমে বদলে দেয়া যেতে পারে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট মেরামত বা বদলে দেয়ার অযোগ্য Star Tech Ltd এর কাছে বর্তমান না থাকলে, বিক্রয় অবচয় সমন্বয় এর মাধ্যমে মূল্যের অর্থ ফেরত দেওয়া যেতে পারে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">প্রোডাক্ট ব্যাবহারের সময় কিংবা Star Tech Ltd এর সার্ভিসের সময় <strong style=\"margin: 0px; padding: 0px;\">যদি কোন সফটওয়্যার বা ডাটা নষ্ট কিংবা হারিয়ে যায় এর দায়ভার Star Tech Ltd বহন করবে না</strong>। উল্লেখ্য যে, এক্ষেত্রে ডাটা পুনরুদ্ধার বা সফটওয়্যার পুনস্থাপনের কাজের দায়িত্ত্বও Star Tech Ltd এর উপর বর্তাবে না।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">নির্দিষ্ট মডেলের প্রোডাক্ট ওয়ারেন্টির আওতায় নেয়ার পর সার্ভিসের কাজ শেষ করে প্রোডাক্টটি ফেরত দেয়ার সময় নির্দিষ্ট নয়, <strong style=\"margin: 0px; padding: 0px;\">এই সময় ৫-৭ দিন থেকে সর্বোচ্চ ৩৫-৪০ দিন কিংবা আরো বেশী হতে পারে</strong>; কারণ অধিকাংশ ক্ষেত্রে মেরামতের জন্য প্রয়োজনীয় যন্ত্রাংশ দেশে পর্যাপ্ত বাফার স্টক না থাকায় তা বিশেষভাবে আমদানী করে আনতে হয় যা অনেক সময় সাপেক্ষ।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ক্রেতাসাধারনের অবগতির জানানো যাচ্ছে যে বেশীরভাগ ওয়ারেন্টি প্রোডাক্ট রিপেয়ার হয় না, যে পার্টস টি নস্ট হয় সেটা পরিবর্তন করা হয় বরং অধিকাংশ ক্ষেত্রে বিদেশ থেকে আমদানি করা হয়।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">বিক্রয়ের সময় যে কম্পিউটার সেটআপ ও অপারেটিং সিস্টেম কাস্টমাইজ করে দেয়া হয় তা ওয়ারেন্টির আওতায় থাকে না।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">লাইফ টাইম ওয়ারেন্টি মূলত বাজারে প্রচলিত পণ্য হিসেবে বিবেচিত হওয়ার সময়কাল পর্যন্ত ঐ পণ্যের ওয়ারেন্টি সেবা প্রদানকে লাইফ টাইম ওয়ারেন্টি বুঝাবে। কোনো পণ্যের ‘লাইফ টাইম’ ওয়ারেন্টির আওতায় ওই পণ্যটি মার্কেটে প্রচলিত পণ্য হলে, ক্রেতা ওয়ারেন্টি সেবা প্রাপ্ত হবে। কোনো পণ্য বাজারে EOL(End of Life) হিসেবে গণ্য হলে অর্থাৎ পণ্যটি যদি অপ্রচলিত হয়ে পড়ে তবে তা আর ওয়ারেন্টির আওতায় আসবে না। পণ্যের নতুন সংস্করণ বাজারে আসলে তা পুরাতন সংস্করণের সাথে ওয়ারেন্টি সেবা পাবে না। উল্লেখ্য, লাইফ টাইম ওয়ারেন্টির ক্ষেত্রে বিসিএর এর নীতিমালা অনুযায়ী গ্রাহক বা ক্রেতা সর্বোচ্চ ২(দুই) বছর এ সেবা উপভোগ করতে পারবেন।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টির আওতা বহির্ভূত যেকোন সার্ভিসের জন্য Star Tech মূল্য ধার্য করতে পারবে যা ক্রেতার সম্মতি সাপেক্ষে কার্যকর হবে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">সার্ভিস ওয়ারেন্টির ক্ষেত্রে যদি কোন যন্ত্রাংশ পরিবর্তন বা সংযোজনের প্রয়োজন হয় তাহলে ক্রেতা সাধারন তা নিজ দায়িত্বে সংগ্রহ করবেন অথবা ক্রেতাগনের সম্মতিতে অগ্রিম মূল্য পরিশোধ সাপেক্ষে Star Tech এর মাধ্যমে সংগ্রহ করতে পারবেন।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">ওয়ারেন্টির নির্ধারিত মেয়াদ থাকাকালীন বা উত্তীর্ণ হওয়ার পরে Star Tech কর্তৃক প্রদত্ত ফ্রি সফটওয়্যার বা হার্ডওয়্যার টিউনিংএ যদি প্রোডাক্ট এ কোন সমস্যা ধরা পড়ে বা নতুন কোন সমস্যার সৃষ্টি হয় তার দায়ভার Star Tech এর উপর বর্তাবে না।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\">মনিটরের <strong style=\"margin: 0px; padding: 0px;\">ডেড পিক্সেল (Dead Pixel)</strong> জনিত ওয়ারেন্টি ক্লেইমের জন্য তাতে ন্যূনতম ৩ বা তার বেশি ডেড পিক্সেল দৃশ্যমান হতে হবে।</li><li style=\"margin: 0px 0px 10px 16px; padding: 0px; color: rgb(1, 19, 45); line-height: 24.5px; font-size: 14px; list-style-type: circle;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">প্রোডাক্টের ওয়ারেন্টি ক্লেইমের সময় ক্রেতাকে প্রোডাক্টের বক্স সাথে নিয়ে আসা বাধ্যতামূলক।</span></li></ul>', 'media/logo/1786815737762936.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `home_delivery` varchar(255) DEFAULT NULL,
  `store_pickup` varchar(255) DEFAULT NULL,
  `request_express` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`id`, `home_delivery`, `store_pickup`, `request_express`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '120', '60', '200', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zone` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `shipping_method` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `order_id`, `name`, `phone`, `email`, `address`, `city`, `zone`, `notes`, `payment`, `shipping_method`, `created_at`, `updated_at`) VALUES
(4, '8', 'Tarik', '+1 (756) 473-5714', 'giqebil@mailinator.com', 'Suscipit dolor duis', 'Maxime molestias cor', 'Dhaka', 'Id exercitationem fu', 'Cash on Delivery', 'Home Delivery', '2023-11-26 02:03:28', NULL),
(5, '9', 'Bryar', '+1 (526) 168-9812', 'cygadevi@mailinator.com', 'Ad beatae mollitia d', 'Tenetur suscipit ea', 'Khulna', 'Aut ad ipsum qui ad', 'Cash on Delivery', 'Home Delivery', '2023-11-26 02:59:52', NULL),
(6, '10', 'Oprah', '+1 (979) 579-2573', 'gulo@mailinator.com', 'Molestias omnis volu', 'Labore perferendis e', 'Gazipur', 'Ut velit unde molest', 'Cash on Delivery', 'Home Delivery', '2023-11-26 03:17:00', NULL),
(7, '11', 'Davis', '+1 (167) 723-5365', 'feki@mailinator.com', 'Corporis cillum iure', 'Fugiat et tenetur et', 'Others', 'Quod recusandae Mol', 'Cash on Delivery', 'Home Delivery', '2023-11-26 03:22:28', NULL),
(8, '12', 'Ria', '+1 (319) 546-6938', 'xehylag@mailinator.com', 'Minus cum eos aut no', 'Proident debitis op', 'Khulna', 'Perspiciatis in dic', 'Cash on Delivery', 'Home Delivery', '2023-11-26 03:24:35', NULL),
(9, '13', 'Nolan', '+1 (611) 434-4469', 'pavupopo@mailinator.com', 'Autem dignissimos po', 'Libero hic rerum nec', 'Chittagong', 'Et a qui dolores min', 'Cash on Delivery', 'Home Delivery', '2023-11-26 03:25:25', NULL),
(10, '14', 'Kimberley', '+1 (786) 119-9368', 'kawyxil@mailinator.com', 'Laborum Similique d', 'Dolores duis placeat', 'Gazipur', 'Pariatur Autem solu', 'Cash on Delivery', 'Home Delivery', '2023-11-26 03:30:55', NULL),
(11, '15', 'Clarke', '+1 (731) 875-6676', 'lixafymuku@mailinator.com', 'Quis consectetur eni', 'Elit quaerat labore', 'Others', 'Error qui duis rerum', 'Cash on Delivery', 'Home Delivery', '2023-11-28 06:00:13', NULL),
(12, '16', 'Md Makshudul haque', '01796382625', 'shihab90@gmail.com', 'Dhaka,bangladesh', 'Bonarapara', 'Others', 'afdsfasdfdsf', 'Cash on Delivery', 'Request Express', '2023-12-07 00:15:48', NULL),
(13, '17', 'Shihab', '01571164542', 'shihab@gmail.com', 'Dhaka,bangladesh', 'afsd', 'Rangpur', 'v', 'Cash on Delivery', 'Store Pickup', '2023-12-10 05:59:35', NULL),
(14, '18', 'Shihab', '01571164542', 'admin@gmail.com', 'dhaka', 'afsd', 'Dhaka', 'gfhgh', 'Cash on Delivery', 'Store Pickup', '2023-12-10 06:38:07', NULL),
(15, '19', 'limon', '01876528145', 'nurulalam7771@gmail.com', 'Uttara 10 Sector house 20', 'Dhaka', 'Dhaka', 'dfadfasfda', NULL, 'Request Express', '2023-12-18 04:21:53', NULL),
(18, '22', 'Ruku Vai', '019882723736', 'ruku@gmail.com', 'Uttara 10 Sector house 20', 'Dhaka', 'Dhaka', 'rrrrr', 'Request Express', NULL, '2023-12-18 04:47:00', NULL),
(19, '23', 'arafat', '231123123', 'arafat@gmail.com', 'Uttara 10 Sector house 20', 'Dhaka', 'Dhaka', 'aaaaaaa', 'Cash on Deliver', NULL, '2023-12-18 04:47:31', NULL),
(20, '24', 'GwmRcaTeCnq', '2848724714', 'jaydenvoueclark@outlook.com', 'FrthuPpIlqkNOHm', 'ZfqvwVcpNPJgdY', 'Others', 'bOecFWmG', 'Request Express', NULL, '2023-12-22 07:24:50', NULL),
(21, '25', 'SafeLsPzUgltR', '9833043622', 'jaydenvoueclark@outlook.com', 'wiqQRzTWDYnpHBXc', 'deVYjITZakPMCDN', 'Others', 'UdGSltWqbpRLhE', 'Request Express', NULL, '2023-12-22 07:24:51', NULL),
(22, '26', 'GwmRcaTeCnq', '2848724714', 'jaydenvoueclark@outlook.com', 'FrthuPpIlqkNOHm', 'ZfqvwVcpNPJgdY', 'Others', 'bOecFWmG', 'Request Express', NULL, '2023-12-22 07:24:53', NULL),
(23, '27', 'IBRAHIM KHALIL', '+8801611482988', 'ibrahimk061@gmail.com', '55/B Noakhali Tower 3rd floor, Purana Palton,', 'Dhaka', 'Dhaka', NULL, 'Request Express', NULL, '2023-12-26 01:21:34', NULL),
(24, '28', 'IBRAHIM KHALIL', '+8801611482988', 'ibrahimk061@gmail.com', '55/B Noakhali Tower 3rd floor, Purana Palton,', 'Dhaka', 'Dhaka', NULL, 'Cash on Deliver', NULL, '2023-12-27 01:04:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marquee` varchar(255) DEFAULT NULL,
  `slider_img` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `marquee`, `slider_img`, `title`, `meta_tag`, `meta_description`, `created_at`, `updated_at`) VALUES
(4, NULL, 'media/slider/1785509422204882.jpg', 'first Banner', 'afsdfads,afdsafsd,asfdasfsdf', 'first Banner  adfasfsdfasdfsadfasdasdfasfsdf', NULL, NULL),
(5, NULL, 'media/slider/1785509398140920.jpg', 'second banner', 'sdf,sdfs', 'sdfdsfsdf sdgsdfg', NULL, NULL),
(6, NULL, 'media/slider/1781890702401316.png', 'fafasdf', 'gfh,hhf', 'hfd hfd hgfh', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribes`
--

INSERT INTO `subscribes` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'shihab90@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_name` varchar(255) DEFAULT NULL,
  `subcategory_img` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name`, `subcategory_img`, `meta_description`, `meta_tag`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 12, 'Ssd', NULL, NULL, NULL, '2023-10-21 05:32:01', NULL, NULL),
(3, 10, 'abbur Razzak', NULL, NULL, NULL, '2023-10-21 05:32:09', NULL, NULL),
(4, 10, 'abbur Razzak', NULL, NULL, NULL, '2023-10-21 22:40:36', NULL, NULL),
(5, 10, 'Ssd', NULL, NULL, NULL, '2023-10-21 22:40:43', NULL, NULL),
(6, 10, 'shihab', NULL, NULL, NULL, '2023-10-21 22:40:50', NULL, NULL),
(7, 12, 'abbur Razzak', NULL, NULL, NULL, '2023-10-22 04:20:57', NULL, NULL),
(8, 12, 'Asus', NULL, NULL, NULL, '2023-11-06 23:23:40', NULL, NULL),
(9, 16, '21', NULL, NULL, NULL, '2023-12-05 01:41:51', NULL, NULL),
(10, 18, 'Heavy Duty Machine', NULL, NULL, NULL, '2023-12-28 17:27:00', NULL, NULL),
(11, 21, 'Original Toner', NULL, NULL, NULL, '2023-12-28 17:30:22', NULL, NULL),
(12, 21, 'Master Copy Toner', NULL, NULL, NULL, '2023-12-28 17:30:35', NULL, NULL),
(13, 7, 'asdf', NULL, NULL, NULL, '2024-01-01 00:25:12', NULL, NULL),
(14, 15, 'asdf', NULL, NULL, NULL, '2024-01-01 01:16:08', '2024-01-01 01:16:08', NULL),
(15, 15, 'asus', NULL, NULL, NULL, '2024-01-01 01:18:50', '2024-01-01 01:18:50', NULL),
(16, 21, 'asdfasdfasdf', NULL, NULL, NULL, '2024-01-01 01:19:25', '2024-01-01 01:19:25', NULL),
(17, 16, 'kkkkkkkkkkk', 'media/subcategory/1786953626682665.jpg', 'asdfadsf', 'ad,d,c', '2024-01-01 01:21:06', '2024-01-01 23:02:58', NULL),
(18, 15, 'asdf', NULL, 'asdf', 's,d,c', '2024-01-01 01:24:51', '2024-01-01 01:24:51', NULL),
(19, 12, 'DSDDDDDDDDDDDDDDDDD', NULL, 'asdf', 'adf', '2024-01-01 01:26:53', '2024-01-01 01:26:53', NULL),
(20, 12, 'oooooooooooo', NULL, 'asdfadsf', 'ad,d', '2024-01-01 01:29:20', '2024-01-01 01:29:20', NULL),
(21, 16, 'mmmmmm', NULL, 'asdf', 'asdf', '2024-01-01 01:31:49', '2024-01-01 01:31:49', NULL),
(22, 16, 'Lunea Salazar', 'media/subcategory/1786953614457862.jpg', 'Quia voluptate qui e', 'Mollit alias dolores', '2024-01-01 23:02:35', '2024-01-01 23:02:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shihab', 'admin@gmail.com', NULL, '$2y$10$1K6I32PF5EP1eBlJgmVZXeVQ1MvfewmPTCnd3Cmn2FrgVYQnrQzEK', NULL, '2023-10-19 04:15:12', '2023-10-19 04:15:12'),
(2, 'Shihab', 'shihab@gmail.com', NULL, '$2y$10$aO/TNjtPPufM5GQ.r7CT/ucXWYkqKimh0nd2/Pkp23B4GbmQhgBD.', NULL, '2023-10-19 06:07:27', '2023-10-19 06:07:27'),
(3, 'Shihab', 'superadmin@gmail.com', NULL, '$2y$10$lgFeP6ixvbZqqeP3K0oCAO41zR2j0q0ZNwU.VtIGWi01Ijew871s6', NULL, '2023-11-07 06:27:24', '2023-11-07 06:27:24'),
(4, 'afdfasd', 'admin@gmil.com', NULL, '$2y$10$uSDlwyobScRUM7.2Y9BUgOpVQFYSpHD5n2ZUfY.N8S9Q27u8Nj.wy', NULL, '2023-11-07 06:41:16', '2023-11-07 06:41:16'),
(5, 'Sagar', 'sagar@gmail.com', NULL, '$2y$10$Ow./HKBFuiZOrAFEloyQYOSU1lYBqWLuc1omA0gGRrN3OOdD2/1B2', NULL, '2023-11-07 22:37:55', '2023-11-07 22:37:55'),
(6, 'MD Makshudul Haque', 'makshudul@gmail.com', NULL, '$2y$10$AXKMwgB7yvsEKvieO94pc.m7PMobfKQqITua6KjrO6lM9NqfEKaK.', NULL, '2023-11-11 22:23:59', '2023-11-11 22:23:59'),
(7, 'User1', 'user1@gmail.com', NULL, '$2y$10$Kj555/79RFFzopd8uSnLM.IyEAkZtNzqSVeREX3Xo2fYeaEW7G7Ha', NULL, '2023-12-15 04:17:13', '2023-12-15 04:17:13'),
(8, 'UpQnAsOfJ', 'jaydenvoueclark@outlook.com', NULL, '$2y$10$I/pl/xz5VwBpgmujGHgiHuXsaWGyIS3yvtp38UXokAfUfDDloqOP6', NULL, '2023-12-22 07:25:04', '2023-12-22 07:25:04'),
(9, 'Paola', 'KJDWFR.qmhmcwb@wisefoot.club', NULL, '$2y$10$CWbM9PvqDYh4179R2FHpPex23vkK6aqwKWKhg5arkqg8JuIDfYZRC', NULL, '2023-12-22 22:57:20', '2023-12-22 22:57:20'),
(10, 'Milan', 'RIpTup.djcbpmh@rottack.autos', NULL, '$2y$10$PP2Z.nm4TQrfXOhWE6R8Yexpm/Y6BEOfmzUxCzdgnB1J93T2LClOG', NULL, '2023-12-25 17:26:14', '2023-12-25 17:26:14'),
(11, 'limon', 'limon@gmail.com', NULL, '$2y$10$/Gvc/C8Fq/jFHmHvBIahS.30NCBz8JTdZRmyhGh/Dcsdi3tNbeG.W', NULL, '2023-12-26 07:57:14', '2023-12-26 07:57:14'),
(12, 'Corporate office Equipment', 'corporateofficeequipment@gmail.com', NULL, '$2y$10$U8dFaSRiUmeauq2tIa3OEOGfuUgCy6NfNLJw/8R4Me27rbfO20vTm', NULL, '2023-12-27 01:18:45', '2023-12-27 01:18:45'),
(13, 'Poppy', 'YKfXto.bqqqwdh@carnana.art', NULL, '$2y$10$vx0NNV4ZraPAZ4w1aSle6uuHxPomWDs0n3J3lE1Jzf3sRE.lCOhVi', NULL, '2023-12-31 03:47:25', '2023-12-31 03:47:25');

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
-- Indexes for table `blogreviews`
--
ALTER TABLE `blogreviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chlild_categories`
--
ALTER TABLE `chlild_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `combos`
--
ALTER TABLE `combos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `homesitesliders`
--
ALTER TABLE `homesitesliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indexsitesliders`
--
ALTER TABLE `indexsitesliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indexsliders`
--
ALTER TABLE `indexsliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogreviews`
--
ALTER TABLE `blogreviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `chlild_categories`
--
ALTER TABLE `chlild_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `combos`
--
ALTER TABLE `combos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homesitesliders`
--
ALTER TABLE `homesitesliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `indexsitesliders`
--
ALTER TABLE `indexsitesliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `indexsliders`
--
ALTER TABLE `indexsliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
