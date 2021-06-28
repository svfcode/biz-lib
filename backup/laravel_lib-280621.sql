-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 28 2021 г., 10:21
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravel_lib`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgalt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `downloads` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `cat_id`, `year`, `author`, `book`, `img`, `imgalt`, `title`, `keywords`, `description`, `slug`, `downloads`, `created_at`, `updated_at`) VALUES
(1, 1, 2019, 'Гегель Георг', 'Гегель Георг - Наука логики. С комментариями и объяснениями (Философия на пальцах) - 2019.fb2', '1624695977.jpg', 'обложка книги', 'Наука логики. С комментариями и объяснениями (Философия на пальцах)', 'Гегель Георг, логика, Наука логики', 'Георг Вильгельм Фридрих Гегель – основоположник немецкой классической философии, вошедший в историю как выдающийся реформатор науки о мышлении, разработавший и развивший его диалектические формы. Основная задача логики, по Гегелю, – познание истины. И он исследовал пути, ведущие к истине, и эволюцию этих путей в работе «Наука логики», созданной на основе собственных лекций. Сама же логика не может быть законченной наукой – она всегда оставляет свои двери открытыми для новых выводов и понятий. Поэтому учение Гегеля всегда современно и вызывает неизменный интерес.', 'gegel-logica-nauka', 0, '2021-06-26 08:26:17', '2021-06-26 14:40:55'),
(2, 3, 2018, 'Джозеф Меркола', 'Джозеф Меркола - Кето-диета (Жизнь в стиле кето) - 2018.pdf', '1624719986.jpg', 'обложка книги Кето-диета', 'Кето-диета (Жизнь в стиле кето)', 'диета Кето питание', 'Эта книга рассказывает о кето-диете – революционной системе питания, которая позволяет научить организм перерабатывать жиры (а не сахар!) в энергию. В результате вы гарантированно начнете терять от 0,5 до 2,5 кг в неделю, ваше тело станет рельефным, а ум – острым.', 'keto-dieta', 0, '2021-06-26 15:06:26', '2021-06-26 15:06:26'),
(3, 2, 2017, 'Петрановская Людмила', 'Людмила Петрановская - Большая книга про вас и вашего ребенка -2017.fb2', '1624720294.jpg', 'Большая книга про вас и вашего ребенка', 'Большая книга про вас и вашего ребенка', 'воспитание Петрановская Людмила', 'Эту книгу стоило бы прочесть всем родителям. И тем, кого заботит легкое недопонимание, и тем, кто уже было отчаялся найти общий язык с детьми. В ней мы собрали две книги в одной: «Тайная опора: привязанность в жизни ребенка» и «Если с ребенком трудно» – книги, которые могут избавить вас и вашего ребенка от тонн психологической макулатуры.\r\nНередко, став взрослыми, мы забываем, что некогда и сами были детьми. В первой части книги, основываясь на научной теории привязанности, Людмила Петрановская легко и доступно рассказывает о роли родителей на пути к взрослению: «Как зависимость и беспомощность превращаются в зрелость?» и «Как наши любовь и забота год за годом формируют в ребенке тайную опору, на которой, как на стержне, держится его личность?» Вы сможете увидеть, что на самом деле стоит за детскими «капризами», «избалованностью», «агрессией», «вредным характером».\r\nВо второй части книги Людмила расскажет о том, как научиться ориентироваться в сложных ситуациях, решать конфликты и достойно выходить из них. Вы сможете понять, чем помочь своему ребенку, чтобы он рос и развивался, не тратя силы на борьбу за вашу любовь.', 'vospitanie-petrovskaya', 0, '2021-06-26 15:11:34', '2021-06-26 15:11:34'),
(4, 1, 2008, 'В.А. Бочаров', 'Основы логики В.А.Бочаров 2008-600.pdf', '1624864528.jpg', 'Обложка книги В.А. Бочаров Основы логики - 2008', 'Основы логики - 2008', 'Бочаров, Основы логики', 'учебник, четвертое издание которого предлагается вниманию читателей, представляет собой введение в проблематику современной логики содержит изложение ее основных разделов. знакомство с учебником позволит получить представление о предмете логики, природе и специфике логического знания, о наиболее известных логических теориях, а также о той методической роли, которую играет логика в познавательной деятельности человека.', 'osnovy-logiki-2008', 0, '2021-06-28 07:15:28', '2021-06-28 07:15:28');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `part_id` int(11) NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgalt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `part_id`, `img`, `imgalt`, `title`, `subtitle`, `description`, `slug`, `created_at`, `updated_at`) VALUES
(1, 2, '1624267023.jpg', 'картина Афинская школа', 'Логика', 'Законы мышления', 'Удивительно что логика работает всегда. Мы все разные, разные континенты и страны, менталитет. Разговариваем на разных языках, но законы мышления у всех людей одни и те же.', 'logica', '2021-06-21 09:17:03', '2021-06-21 09:17:03'),
(2, 1, '1624440137.jpg', 'puzzle', 'Воспитание детей', 'Взрослая жизнь является отражением детских переживаний', 'Шаблоны поведения к которым мы приучены с детства являются основой нашего поведения. Именно от них зависит кем мы станем.', 'upbringing', '2021-06-23 09:22:17', '2021-06-23 09:22:17'),
(3, 6, '1624440545.jpg', 'food', 'Питание', 'Мы то - что мы едим', 'Мы не можем вспомнить все что ели в течении жизнь, но все что мы ели оставило на нас след. От здорового рациона зависит качество нашей жизни.', 'nutrition', '2021-06-23 09:29:05', '2021-06-23 09:29:05');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '2014_10_12_000000_create_users_table', 1),
(22, '2014_10_12_100000_create_password_resets_table', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2021_06_14_095759_create_parts_table', 1),
(25, '2021_06_20_083333_create_myauth_table', 2),
(27, '2021_06_20_091406_create_categories_table', 3),
(28, '2021_06_23_093336_create_books_table', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `myauth`
--

CREATE TABLE `myauth` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `myauth`
--

INSERT INTO `myauth` (`id`, `name`, `password`, `created_at`, `updated_at`) VALUES
(1, 'libadmin', '1e11e7baa46b5b0916d36f14691b18f1', '2021-06-20 08:39:05', '2021-06-26 16:09:35');

-- --------------------------------------------------------

--
-- Структура таблицы `parts`
--

CREATE TABLE `parts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgalt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `parts`
--

INSERT INTO `parts` (`id`, `img`, `imgalt`, `title`, `subtitle`, `description`, `slug`, `created_at`, `updated_at`) VALUES
(1, '1623843491.jpg', 'семья на пристани', 'Семья', 'О самом важном', 'То место где мы появляемся, впитываем все то что нас окружает. Повзрослев стремимся создать подобие того волшебного мира из которого мы родом.', 'family', '2021-06-16 11:38:11', '2021-06-17 06:36:36'),
(2, '1623843701.jpg', 'рука пишет на доске фломастером', 'Наука', 'Понимание окружающего мира через открытые законы', 'Системный подход к сбору и анализу объективных знаний, независящих от воли и желаний человека.', 'science', '2021-06-16 11:41:41', '2021-06-16 11:41:41'),
(6, 'parts1624366049.jpg', 'stones', 'Здоровье', 'Болен - лечись, а здоров - берегись.', 'Когда человек болен, он не может ни о чем больше думать. Заботит его только несмолкающая боль. А беречь то его лучше с молоду.', 'health', '2021-06-22 12:47:29', '2021-06-22 12:47:29');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `myauth`
--
ALTER TABLE `myauth`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `myauth`
--
ALTER TABLE `myauth`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `parts`
--
ALTER TABLE `parts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
