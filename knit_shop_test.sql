-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-02-08 07:31:05
-- サーバのバージョン： 10.4.21-MariaDB
-- PHP のバージョン: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `knit_shop`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL COMMENT 'カテゴリーID',
  `name` varchar(255) NOT NULL COMMENT 'カテゴリー名',
  `is_deleted` int(11) NOT NULL DEFAULT 0 COMMENT '削除フラグ',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '登録日付',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新日付'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='カテゴリー';

--
-- テーブルのデータのダンプ `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'socks', 0, '2022-02-07 14:53:50', '2022-02-07 15:35:36'),
(2, 'knit hat', 0, '2022-02-07 15:37:03', '2022-02-07 15:37:03'),
(3, 'gloves', 0, '2022-02-07 15:39:28', '2022-02-07 15:39:28'),
(4, 'bag', 0, '2022-02-07 15:39:28', '2022-02-07 15:39:28'),
(5, 'stall', 0, '2022-02-07 15:39:28', '2022-02-07 15:39:28');

-- --------------------------------------------------------

--
-- テーブルの構造 `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL COMMENT 'お問い合わせID',
  `name` varchar(255) DEFAULT NULL COMMENT '名前',
  `tel` varchar(255) DEFAULT NULL COMMENT '電話番号',
  `mail` varchar(255) DEFAULT NULL COMMENT 'メールアドレス',
  `title` varchar(255) DEFAULT NULL COMMENT '件名',
  `message` text DEFAULT NULL COMMENT 'お問い合わせ内容',
  `is_deleted` int(11) NOT NULL DEFAULT 0 COMMENT '削除フラグ',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '登録日付',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新日付'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='お問い合わせ';

-- --------------------------------------------------------

--
-- テーブルの構造 `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL COMMENT 'ニュースID',
  `date` datetime DEFAULT NULL COMMENT '日付',
  `title` varchar(255) DEFAULT NULL COMMENT 'タイトル',
  `text` text DEFAULT NULL COMMENT '内容',
  `image_path` varchar(255) DEFAULT NULL COMMENT '画像パス',
  `url` varchar(255) DEFAULT NULL COMMENT 'リンク',
  `is_deleted` int(11) NOT NULL DEFAULT 0 COMMENT '削除フラグ',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '登録日付',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新日付'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ニュース';

--
-- テーブルのデータのダンプ `news`
--

INSERT INTO `news` (`news_id`, `date`, `title`, `text`, `image_path`, `url`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '2021-12-01 00:00:00', 'instgram開始', 'instgram公式アカウント始めました！', 'C:/xampp/htdocs/Light_Knitting/img/news_pic1.png', NULL, 0, '2022-02-08 02:37:52', '2022-02-08 06:21:51'),
(2, '2021-11-01 00:00:00', 'socks追加', 'socks追加しました！', 'C:/xampp/htdocs/Light_Knitting/img/news_pic2.jpg', NULL, 0, '2022-02-08 03:13:40', '2022-02-08 06:22:05'),
(3, '2021-10-01 00:00:00', 'bag追加', 'bag追加しました！', 'C:/xampp/htdocs/Light_Knitting/img/news_pic3.jpg', NULL, 0, '2022-02-08 03:26:09', '2022-02-08 06:22:20'),
(4, '2021-09-01 00:00:00', 'gloves追加', 'gloves追加しました！', 'C:/xampp/htdocs/Light_Knitting/img/news_pic4.jpg', NULL, 0, '2022-02-08 03:29:26', '2022-02-08 06:22:35'),
(5, '2021-08-01 00:00:00', 'knit hat追加', 'knit hat追加しました！', 'C:/xampp/htdocs/Light_Knitting/img/news_pic5.jpg', NULL, 0, '2022-02-08 03:31:47', '2022-02-08 06:23:05'),
(6, '2021-07-01 00:00:00', 'twitter開始', 'Twitter公式アカウント始めました！', 'C:/xampp/htdocs/Light_Knitting/img/news_pic6.png', NULL, 0, '2022-02-08 03:31:47', '2022-02-08 06:23:21');

-- --------------------------------------------------------

--
-- テーブルの構造 `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL COMMENT '注文ID',
  `customer_name` varchar(255) NOT NULL COMMENT 'お客様名',
  `mail` varchar(255) NOT NULL COMMENT 'メールアドレス',
  `post_code` int(11) DEFAULT NULL COMMENT '郵便番号',
  `addres` varchar(255) DEFAULT NULL COMMENT '住所',
  `tel` varchar(255) DEFAULT NULL COMMENT '電話番号',
  `is_deleted` int(11) NOT NULL DEFAULT 0 COMMENT '削除フラグ',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '登録日付',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新日付'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='注文';

-- --------------------------------------------------------

--
-- テーブルの構造 `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(11) NOT NULL COMMENT '注文明細ID',
  `order_id` int(11) NOT NULL COMMENT '注文ID',
  `product_id` int(11) NOT NULL COMMENT '商品ID',
  `product_size_id` int(11) NOT NULL COMMENT '商品サイズID',
  `quantity` int(11) NOT NULL COMMENT '数量',
  `is_deleted` int(11) NOT NULL DEFAULT 0 COMMENT '削除フラグ',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '登録日付',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新日付'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='注文明細';

-- --------------------------------------------------------

--
-- テーブルの構造 `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL COMMENT '商品ID',
  `name` varchar(255) NOT NULL COMMENT '商品名',
  `price` int(11) NOT NULL COMMENT '値段',
  `category_id` int(11) NOT NULL COMMENT 'カテゴリID',
  `image_path` varchar(255) DEFAULT NULL COMMENT '商品画像パス',
  `description` varchar(255) DEFAULT NULL COMMENT '説明',
  `is_line_up` int(11) NOT NULL DEFAULT 0 COMMENT 'ラインナップフラグ',
  `is_deleted` int(11) NOT NULL DEFAULT 0 COMMENT '削除フラグ',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '登録日付',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新日付'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品';

--
-- テーブルのデータのダンプ `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `category_id`, `image_path`, `description`, `is_line_up`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'red socks', 2000, 1, 'C:/xampp/htdocs/Light_Knitting/img/red_socks.jpg', '赤い靴下', 0, 0, '2022-02-08 05:03:10', '2022-02-08 06:17:04'),
(2, ' border socks', 2000, 1, 'C:/xampp/htdocs/Light_Knitting/img/border_socks.jpg', 'ボーダー靴下', 0, 0, '2022-02-08 05:09:07', '2022-02-08 06:17:31'),
(3, ' orange socks', 2000, 1, 'C:/xampp/htdocs/Light_Knitting/img/orange_socks.jpg', 'オレンジ色の靴下', 0, 0, '2022-02-08 05:18:33', '2022-02-08 06:17:50'),
(4, ' chameleon socks', 2000, 1, 'C:/xampp/htdocs/Light_Knitting/img/chameleon_socks.jpg', '赤と青の靴下', 0, 0, '2022-02-08 05:18:33', '2022-02-08 06:18:09'),
(5, ' blue socks', 2000, 1, 'C:/xampp/htdocs/Light_Knitting/img/blue_socks.jpg', '青の靴下', 0, 0, '2022-02-08 05:18:33', '2022-02-08 06:18:23'),
(6, ' purple socks', 2000, 1, 'C:/xampp/htdocs/Light_Knitting/img/purple_socks.jpg', '紫の靴下', 0, 0, '2022-02-08 05:18:33', '2022-02-08 06:18:41'),
(7, 'green&white knit hat', 4000, 2, 'C:/xampp/htdocs/Light_Knitting/img/green&white_knit_hat.jpg', '緑のニット帽と白のニット帽', 0, 0, '2022-02-08 05:37:50', '2022-02-08 06:18:56'),
(8, 'Brown&purple gloves', 4000, 3, 'C:/xampp/htdocs/Light_Knitting/img/Brown&purple_gloves.jpg', '茶色の手袋と紫の手袋', 0, 0, '2022-02-08 05:42:25', '2022-02-08 06:19:11'),
(9, 'green bag', 3000, 4, 'C:/xampp/htdocs/Light_Knitting/img/green_bag.jpg', '緑色のカバン', 0, 0, '2022-02-08 05:48:30', '2022-02-08 06:19:27'),
(10, 'border bag', 3000, 4, 'C:/xampp/htdocs/Light_Knitting/img/border_bag.jpg', 'ボーダー柄のカバン', 0, 0, '2022-02-08 05:48:30', '2022-02-08 06:19:41'),
(11, ' colorful bag', 3000, 4, 'C:/xampp/htdocs/Light_Knitting/img/colorful_bag.jpg', 'カラフル色のカバン', 0, 0, '2022-02-08 05:48:30', '2022-02-08 06:20:02'),
(12, ' wood bag', 3000, 4, 'C:/xampp/htdocs/Light_Knitting/img/wood_bag.jpg', '麻のカバン', 0, 0, '2022-02-08 05:48:30', '2022-02-08 06:20:16'),
(13, ' white bag', 3000, 4, 'C:/xampp/htdocs/Light_Knitting/img/white_bag.jpg', '白いカバン', 0, 0, '2022-02-08 05:48:30', '2022-02-08 06:20:35'),
(14, ' colorful stall', 3500, 5, 'C:/xampp/htdocs/Light_Knitting/img/colorful_stall.jpg', 'カラフル色のストール', 0, 0, '2022-02-08 05:50:38', '2022-02-08 06:20:47');

-- --------------------------------------------------------

--
-- テーブルの構造 `product_sizes`
--

CREATE TABLE `product_sizes` (
  `product_size_id` int(11) NOT NULL COMMENT '商品サイズID',
  `product_id` int(11) NOT NULL COMMENT '商品ID',
  `size_id` int(11) NOT NULL COMMENT 'サイズID',
  `is_deleted` int(11) NOT NULL DEFAULT 0 COMMENT '削除フラグ',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '登録日付',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新日付'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品サイズ';

--
-- テーブルのデータのダンプ `product_sizes`
--

INSERT INTO `product_sizes` (`product_size_id`, `product_id`, `size_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, '2022-02-08 05:57:59', '2022-02-08 05:57:59'),
(2, 1, 2, 0, '2022-02-08 05:58:36', '2022-02-08 05:58:36'),
(3, 1, 3, 0, '2022-02-08 05:59:51', '2022-02-08 05:59:51'),
(4, 1, 4, 0, '2022-02-08 05:59:51', '2022-02-08 05:59:51'),
(5, 1, 5, 0, '2022-02-08 05:59:52', '2022-02-08 05:59:52'),
(6, 1, 6, 0, '2022-02-08 05:59:52', '2022-02-08 05:59:52'),
(7, 1, 7, 0, '2022-02-08 05:59:52', '2022-02-08 05:59:52'),
(8, 1, 8, 0, '2022-02-08 05:59:52', '2022-02-08 05:59:52'),
(9, 1, 9, 0, '2022-02-08 05:59:52', '2022-02-08 05:59:52'),
(10, 1, 10, 0, '2022-02-08 05:59:52', '2022-02-08 05:59:52'),
(11, 1, 11, 0, '2022-02-08 05:59:52', '2022-02-08 05:59:52'),
(12, 2, 1, 0, '2022-02-08 06:01:14', '2022-02-08 06:01:14'),
(13, 2, 2, 0, '2022-02-08 06:01:14', '2022-02-08 06:01:14'),
(14, 2, 3, 0, '2022-02-08 06:01:14', '2022-02-08 06:01:14'),
(15, 2, 4, 0, '2022-02-08 06:01:14', '2022-02-08 06:01:14'),
(16, 2, 5, 0, '2022-02-08 06:01:14', '2022-02-08 06:01:14'),
(17, 2, 6, 0, '2022-02-08 06:01:14', '2022-02-08 06:01:14'),
(18, 2, 7, 0, '2022-02-08 06:01:14', '2022-02-08 06:01:14'),
(19, 2, 8, 0, '2022-02-08 06:01:14', '2022-02-08 06:01:14'),
(20, 2, 9, 0, '2022-02-08 06:01:14', '2022-02-08 06:01:14'),
(21, 2, 10, 0, '2022-02-08 06:01:14', '2022-02-08 06:01:14'),
(22, 2, 11, 0, '2022-02-08 06:01:14', '2022-02-08 06:01:14'),
(23, 3, 1, 0, '2022-02-08 06:02:19', '2022-02-08 06:02:19'),
(24, 3, 2, 0, '2022-02-08 06:02:19', '2022-02-08 06:02:19'),
(25, 3, 3, 0, '2022-02-08 06:02:19', '2022-02-08 06:02:19'),
(26, 3, 4, 0, '2022-02-08 06:02:19', '2022-02-08 06:02:19'),
(27, 3, 5, 0, '2022-02-08 06:02:19', '2022-02-08 06:02:19'),
(28, 3, 6, 0, '2022-02-08 06:02:19', '2022-02-08 06:02:19'),
(29, 3, 7, 0, '2022-02-08 06:02:19', '2022-02-08 06:02:19'),
(30, 3, 8, 0, '2022-02-08 06:02:19', '2022-02-08 06:02:19'),
(31, 3, 9, 0, '2022-02-08 06:02:20', '2022-02-08 06:02:20'),
(32, 3, 10, 0, '2022-02-08 06:02:20', '2022-02-08 06:02:20'),
(33, 3, 11, 0, '2022-02-08 06:02:20', '2022-02-08 06:02:20'),
(34, 4, 1, 0, '2022-02-08 06:03:36', '2022-02-08 06:03:36'),
(35, 4, 2, 0, '2022-02-08 06:03:36', '2022-02-08 06:03:36'),
(36, 4, 3, 0, '2022-02-08 06:03:36', '2022-02-08 06:03:36'),
(37, 4, 4, 0, '2022-02-08 06:03:36', '2022-02-08 06:03:36'),
(38, 4, 5, 0, '2022-02-08 06:03:36', '2022-02-08 06:03:36'),
(39, 4, 6, 0, '2022-02-08 06:03:36', '2022-02-08 06:03:36'),
(40, 4, 7, 0, '2022-02-08 06:03:36', '2022-02-08 06:03:36'),
(41, 4, 8, 0, '2022-02-08 06:03:36', '2022-02-08 06:03:36'),
(42, 4, 9, 0, '2022-02-08 06:03:36', '2022-02-08 06:03:36'),
(43, 4, 10, 0, '2022-02-08 06:03:36', '2022-02-08 06:03:36'),
(44, 4, 11, 0, '2022-02-08 06:03:37', '2022-02-08 06:03:37'),
(45, 5, 1, 0, '2022-02-08 06:05:33', '2022-02-08 06:05:33'),
(46, 5, 2, 0, '2022-02-08 06:05:33', '2022-02-08 06:05:33'),
(47, 5, 3, 0, '2022-02-08 06:05:33', '2022-02-08 06:05:33'),
(48, 5, 4, 0, '2022-02-08 06:05:33', '2022-02-08 06:05:33'),
(49, 5, 5, 0, '2022-02-08 06:05:33', '2022-02-08 06:05:33'),
(50, 5, 6, 0, '2022-02-08 06:05:33', '2022-02-08 06:05:33'),
(51, 5, 7, 0, '2022-02-08 06:05:33', '2022-02-08 06:05:33'),
(52, 5, 8, 0, '2022-02-08 06:05:33', '2022-02-08 06:05:33'),
(53, 5, 9, 0, '2022-02-08 06:05:33', '2022-02-08 06:05:33'),
(54, 5, 10, 0, '2022-02-08 06:05:33', '2022-02-08 06:05:33'),
(55, 5, 11, 0, '2022-02-08 06:05:33', '2022-02-08 06:05:33'),
(56, 6, 1, 0, '2022-02-08 06:06:21', '2022-02-08 06:06:21'),
(57, 6, 2, 0, '2022-02-08 06:06:21', '2022-02-08 06:06:21'),
(58, 6, 3, 0, '2022-02-08 06:06:21', '2022-02-08 06:06:21'),
(59, 6, 4, 0, '2022-02-08 06:06:21', '2022-02-08 06:06:21'),
(60, 6, 5, 0, '2022-02-08 06:06:22', '2022-02-08 06:06:22'),
(61, 6, 6, 0, '2022-02-08 06:06:22', '2022-02-08 06:06:22'),
(62, 6, 7, 0, '2022-02-08 06:06:22', '2022-02-08 06:06:22'),
(63, 6, 8, 0, '2022-02-08 06:06:22', '2022-02-08 06:06:22'),
(64, 6, 9, 0, '2022-02-08 06:06:22', '2022-02-08 06:06:22'),
(65, 6, 10, 0, '2022-02-08 06:06:22', '2022-02-08 06:06:22'),
(66, 6, 11, 0, '2022-02-08 06:06:22', '2022-02-08 06:06:22');

-- --------------------------------------------------------

--
-- テーブルの構造 `sizes`
--

CREATE TABLE `sizes` (
  `size_id` int(11) NOT NULL COMMENT 'サイズID',
  `size_name` varchar(255) NOT NULL COMMENT 'サイズ名',
  `is_deleted` int(11) NOT NULL DEFAULT 0 COMMENT '削除フラグ',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '登録日付',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新日付'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='サイズ';

--
-- テーブルのデータのダンプ `sizes`
--

INSERT INTO `sizes` (`size_id`, `size_name`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '23.0', 0, '2022-02-08 04:50:47', '2022-02-08 04:50:47'),
(2, '23.5', 0, '2022-02-08 04:52:55', '2022-02-08 04:52:55'),
(3, '24.0', 0, '2022-02-08 04:52:55', '2022-02-08 04:52:55'),
(4, '24.5', 0, '2022-02-08 04:52:55', '2022-02-08 04:52:55'),
(5, '25.0', 0, '2022-02-08 04:52:55', '2022-02-08 04:52:55'),
(6, '25.5', 0, '2022-02-08 04:52:55', '2022-02-08 04:52:55'),
(7, '26.0', 0, '2022-02-08 04:52:56', '2022-02-08 04:52:56'),
(8, '26.5', 0, '2022-02-08 04:52:56', '2022-02-08 04:52:56'),
(9, '27.0', 0, '2022-02-08 04:52:56', '2022-02-08 04:52:56'),
(10, '27.5', 0, '2022-02-08 04:52:56', '2022-02-08 04:52:56'),
(11, '28.0', 0, '2022-02-08 04:52:56', '2022-02-08 04:52:56');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- テーブルのインデックス `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- テーブルのインデックス `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- テーブルのインデックス `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- テーブルのインデックス `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- テーブルのインデックス `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- テーブルのインデックス `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`product_size_id`);

--
-- テーブルのインデックス `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `sizes`
--
ALTER TABLE `sizes`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'サイズID', AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
