-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2024 年 6 月 04 日 08:17
-- サーバのバージョン： 5.7.39
-- PHP のバージョン: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- データベース: `iw13`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `contacts`
--

CREATE TABLE `contacts` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `genres`
--

CREATE TABLE `genres` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `genres`
--

INSERT INTO `genres` (`id`, `name`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'オーダーケーキ', 'https://images.unsplash.com/photo-1588195538326-c5b1e9f80a1b?q=80&w=1650&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '2024-06-04 08:01:14', '2024-06-04 08:01:14'),
(2, 'ショートケーキ', 'https://images.unsplash.com/photo-1602663491496-73f07481dbea?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '2024-06-04 08:02:26', '2024-06-04 08:02:26'),
(3, 'チョコレートケーキ', 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?q=80&w=1689&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '2024-06-04 08:03:04', '2024-06-04 08:03:04'),
(4, 'チーズケーキ', 'https://images.unsplash.com/photo-1695088957322-e253097aa640?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '2024-06-04 08:05:44', '2024-06-04 08:05:44'),
(5, 'モンブラン', 'https://images.unsplash.com/photo-1601275875269-c48cd2c46546?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '2024-06-04 08:10:16', '2024-06-04 08:10:16'),
(6, 'タルト', 'https://images.unsplash.com/photo-1591441830800-5a6ae713899c?q=80&w=1674&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '2024-06-04 08:10:59', '2024-06-04 08:10:59'),
(7, 'アイスケーキ', 'https://images.unsplash.com/photo-1514424350208-755887f7b374?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '2024-06-04 08:12:21', '2024-06-04 08:12:21');

-- --------------------------------------------------------

--
-- テーブルの構造 `products`
--

CREATE TABLE `products` (
  `id` int(20) NOT NULL,
  `genre_id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `products`
--

INSERT INTO `products` (`id`, `genre_id`, `name`, `price`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'まるごとメロンケーキ', 8900, 'メロン丸ごと一個を贅沢に\r\n中身をくり抜いたメロンの中に自家製のふわふわスポンジケーキ、メロン風味の生クリーム、マスクメロンの果肉、苺がミルフィーユ状に丁寧に重なり合って詰め込まれています！\r\n\r\nこの度、メロンケーキの断面をより一層綺麗な状態でお届け出来るよう、クリームの品質を保つ為に寒天パウダーを使用するマイナーチェンジを行いました。\r\nカットした時のインパクトをお楽しみください。', '2024-06-04 08:14:35', '2024-06-04 08:14:35'),
(2, 2, 'イチゴ生デコレーションケーキ', 2960, '＼ 人気ランキングTOP10位殿堂入り！『王様のブランチ』で紹介されました ／\r\n\r\n都内にある有名店で修業し、独立したパティシエの自慢の一品です。\r\nケーキの原点であるショートケーキだからこそ、素材を活かして丁寧に仕上げました。\r\n100％北海道産の甘さ控えめで口当たりのよい生クリームの味わい、卵本来の風味を活かしたふわっふわのスポンジの食感をぜひお楽しみください。\r\n', '2024-06-04 08:14:41', '2024-06-04 08:15:33'),
(3, 3, 'くまちゃんのチョコレートムースケーキ', 6300, '可愛いくまちゃんがあなたの想いをお届けします。\r\nベルギー産の高級チョコレートを使ったしっとり濃厚なムースに甘酸っぱいラズベリーをアクセントにしています。\r\nくまちゃんの中にはクレームブリュレのババロア、周りにはミルクチョコレートのムースで優しい組み合わせをご堪能下さい。\r\n\r\n', '2024-06-04 08:16:44', '2024-06-04 08:16:44');

-- --------------------------------------------------------

--
-- テーブルの構造 `product_images`
--

CREATE TABLE `product_images` (
  `id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `recommends`
--

CREATE TABLE `recommends` (
  `id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- テーブルのインデックス `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- テーブルのインデックス `recommends`
--
ALTER TABLE `recommends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- テーブルの AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `recommends`
--
ALTER TABLE `recommends`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE;

--
-- テーブルの制約 `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- テーブルの制約 `recommends`
--
ALTER TABLE `recommends`
  ADD CONSTRAINT `recommends_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;
