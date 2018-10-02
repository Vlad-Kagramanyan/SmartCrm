-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 02 2018 г., 10:21
-- Версия сервера: 5.7.20
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `SmartCrm`
--

-- --------------------------------------------------------

--
-- Структура таблицы `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `time` time NOT NULL,
  `course_start` date NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `week_day` text NOT NULL,
  `show_course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `courses`
--

INSERT INTO `courses` (`course_id`, `time`, `course_start`, `course_name`, `week_day`, `show_course`) VALUES
(1, '07:00:00', '2018-08-01', 'HTML/CSS/BOOTSTRAP', '{\"երք\":\"on\",\"հնգ\":\"on\",\"շբթ\":\"on\"}', 1),
(2, '06:00:00', '2018-08-01', 'JAVASCRIPT/JQUERY', '{\"երկ\":\"on\",\"չրք\":\"on\",\"ուրբ\":\"on\"}', 1),
(3, '01:00:00', '2018-08-11', 'PHP/MYSQL', '{\"չրք\":\"on\",\"ուրբ\":\"on\",\"կիր\":\"on\"}', 1),
(4, '01:00:00', '2018-09-30', 'JAVASCRIPT/JQUERY', '{\"երք\":\"on\",\"հնգ\":\"on\",\"շբթ\":\"on\"}', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `notes`
--

CREATE TABLE `notes` (
  `note_id` int(11) NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `position` varchar(128) NOT NULL,
  `name_lastName` varchar(64) NOT NULL,
  `telephone` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `topic` text NOT NULL,
  `other_notes` text NOT NULL,
  `where_we_found` text NOT NULL,
  `date_of_apply` date NOT NULL,
  `show_note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `notes`
--

INSERT INTO `notes` (`note_id`, `org_name`, `position`, `name_lastName`, `telephone`, `email`, `topic`, `other_notes`, `where_we_found`, `date_of_apply`, `show_note`) VALUES
(1, 'smartcode', 'manager', '', '+37496999419', 'ebgo@mail.ru', 'dsfsdf', 'sdfsdfs', 'instagram', '2018-08-08', 1),
(2, 'butik', 'manager', '', '+37496999419', 'ebgo@mail.ru', 'dsf', 'sdfsd', 'instagram', '2018-08-23', 1),
(3, 'company', 'manager', 'Vlad Kagramanyan', '+37496999419', 'ebgo@mail.ru', 'ssss', 'ddddd', 'tweeter', '2018-08-23', 1),
(4, 'microsoft', 'seo', 'Ազատ Հակոբյան', '+37496999419', 'ebgo@mail.ru', 'ssss', 'dddd', 'facebook', '2018-08-23', 1),
(5, 'apple', 'manager', 'Vlad Kagramanyan', '+37496999419', 'ebgo@mail.ru', 'ssss', 'dddd', 'instagram', '2018-08-30', 1),
(6, 'netfilx', 'manager', 'Ազատ Հակոբյան', '+37496999419', 'ebgo@mail.ru', 'ssss', 'ddddd', 'instagram', '2018-08-30', 1),
(7, 'company', 'seo', 'Ազատ Հակոբյան', '+37496999419', 'ebgo@mail.ru', 'ssss', 'ssss', 'instagram', '2018-09-12', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `organizations`
--

CREATE TABLE `organizations` (
  `organization_id` int(11) NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `name_lastName` varchar(128) NOT NULL,
  `telephone` varchar(24) NOT NULL,
  `email` varchar(64) NOT NULL,
  `address` varchar(255) NOT NULL,
  `work_status` varchar(128) NOT NULL,
  `where_we_found` varchar(64) NOT NULL,
  `date_of_apply` date NOT NULL,
  `other_notes` text NOT NULL,
  `messengers` text NOT NULL,
  `social_networks` text NOT NULL,
  `show_organization` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `organizations`
--

INSERT INTO `organizations` (`organization_id`, `org_name`, `position`, `name_lastName`, `telephone`, `email`, `address`, `work_status`, `where_we_found`, `date_of_apply`, `other_notes`, `messengers`, `social_networks`, `show_organization`) VALUES
(1, 'company', 'manager', 'Ազատ Հակոբյան', '+37496999419', 'ebgo@mail.ru', 'baxramyan 27', '1', 'facebook', '2018-08-22', 'ohter notes', '[\"viber\",\"whatsapp\"]', '[\"facebook\",\"instagram\"]', 1),
(2, 'smartcode', 'PR manager', 'աննա աթոյան', '+37496999419', 'ebgo@mail.ru', 'baxramyan 27', '2', 'mailing', '2018-08-25', 'ohter notes', '[\"viber\",\"whatsapp\",\"telegram\"]', '[\"facebook\",\"linkedin\",\"instagram\"]', 1),
(3, 'office', 'gorcavar', 'gago', '+37496999419', 'ebgoeee@mail.ru', 'manandyan', '4', 'facebook', '2018-08-16', 'nshummmm', '[\"viber\",\"whatsapp\"]', '[\"facebook\",\"linkedin\"]', 1),
(4, 'Իմպերիա գրուպ ՍՊԸ', 'տնօրեն', 'Էդգար', '+37496999419', 'ebgo@mail.ru', 'baxramyan 27', '3', 'mailing', '2018-08-22', 'հանդիպել', '[\"viber\",\"whatsapp\"]', '[\"facebook\",\"linkedin\"]', 1),
(5, 'company', 'manager', 'Vlad Kagramanyan', '+37496999419', 'ebgo@mail.ru', 'baxramyan 27', '4', 'linkedin', '2018-09-28', 'good desgin', '[\"viber\"]', '[\"facebook\"]', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `name` varchar(64) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`name`, `role`) VALUES
('admin', 1),
('user', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `name_lastName` varchar(128) NOT NULL,
  `telephone` text NOT NULL,
  `email` varchar(64) NOT NULL,
  `amount_to_be_pay` int(11) NOT NULL,
  `phase_graph` int(11) NOT NULL,
  `student_status` text NOT NULL,
  `payment_status` text NOT NULL,
  `where_we_found` varchar(64) NOT NULL,
  `date_of_apply` date NOT NULL,
  `date_of_pay` date NOT NULL,
  `other_notes` text NOT NULL,
  `show_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`student_id`, `name_lastName`, `telephone`, `email`, `amount_to_be_pay`, `phase_graph`, `student_status`, `payment_status`, `where_we_found`, `date_of_apply`, `date_of_pay`, `other_notes`, `show_student`) VALUES
(4, 'Ազատ Հակոբյան', '+37496999419', 'ebgo@mail.ru', 35000, 1, 'ՆԵՐԿԱ ՈՒՍԱՆՈՂ', 'վճարված է', 'դիմելու վայրը', '2018-08-01', '2018-08-04', 'ohter notes', 1),
(5, 'Vlad Kagramanyan', '+37496999419', 'ebgo@mail.ru', 35000, 1, 'ՆԵՐԿԱ ՈՒՍԱՆՈՂ', 'վճարված չէ', 'linkedin', '2018-08-17', '2018-08-25', 'asdfasdfa', 1),
(6, 'Vlad Kagramanyan', '+37496999419', 'ebgo@mail.ru', 35000, 1, 'ՆԵՐԿԱ ՈՒՍԱՆՈՂ', 'վճարված է', 'vkontake', '2018-08-01', '2018-08-04', 'ayl nshumner', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `task_parent` int(11) NOT NULL,
  `task_doer` int(11) NOT NULL,
  `task_description` text NOT NULL,
  `task_Process` text NOT NULL,
  `work_price` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `payment_day` date NOT NULL,
  `work_start` date NOT NULL,
  `work_end` date NOT NULL,
  `task_status` int(11) NOT NULL,
  `other_notes` text NOT NULL,
  `show_task` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_parent`, `task_doer`, `task_description`, `task_Process`, `work_price`, `payment`, `payment_day`, `work_start`, `work_end`, `task_status`, `other_notes`, `show_task`) VALUES
(1, 1, 6, 'task desc', 'task proccess', 55000, 10000, '2018-09-24', '2018-09-18', '2018-09-26', 2, 'other notes', 1),
(2, 2, 5, 'task desc', 'task proccess', 35000, 20000, '2018-09-24', '2018-09-18', '2018-09-26', 1, 'other notes', 1),
(3, 2, 4, 'some task', 'norm procces', 250000, 100000, '2018-09-29', '2018-09-23', '2018-09-29', 2, 'other notes', 1),
(4, 3, 4, 'some desc', 'some proccess', 78000, 15000, '2018-09-21', '2018-09-24', '2018-09-29', 1, 'other notes', 1),
(5, 4, 5, 'some desc', 'some proccess', 78000, 15000, '2018-09-21', '2018-09-24', '2018-09-29', 3, 'other notes', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `position` varchar(128) NOT NULL,
  `name_lastName` varchar(64) NOT NULL,
  `telephone` varchar(64) NOT NULL,
  `email` varchar(42) NOT NULL,
  `password` varchar(60) NOT NULL,
  `salary` int(11) NOT NULL,
  `messengers` text NOT NULL,
  `social_networks` text NOT NULL,
  `role` int(11) NOT NULL,
  `show_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `position`, `name_lastName`, `telephone`, `email`, `password`, `salary`, `messengers`, `social_networks`, `role`, `show_student`) VALUES
(1, 'իրավաբան', 'Սարգիս Կալաջյան', '+37496000100', 'saqo@mail.ru', '132456', 140000, '[\"viber\",\"whatsapp\"]', '[\"facebook\",\"instagram\"]', 1, 1),
(2, 'Frontend developer', 'Վլադ Կագրամանյան', '+37496999419', 'ebgo@mail.ru', '12345', 1000, '[\"viber\",\"telegram\"]', '[\"vk\",\"linkedin\"]', 1, 1),
(3, 'Backend developer', 'Նարեկ Պողոսյան', '+37498591176', 'narek@mail.ru', '12345', 150000, '[\"viber\",\"telegram\"]', '[\"facebook\",\"linkedin\",\"instagram\"]', 1, 1),
(4, 'PR Manager', 'Աննա Աթոյան', '+37496999419', 'anna@mail.ru', '13245', 150000, '[\"viber\",\"telegram\"]', '[\"facebook\",\"instagram\"]', 1, 1),
(5, 'PR Manager', 'Անդրանիկ Հովհանիսյան', '+37496999419', 'ebgo@mail.ru', '123456', 150000, '[\"viber\",\"whatsapp\"]', '[\"facebook\"]', 1, 1),
(6, 'Trener', 'Ֆռուժետա Գեվորգյան', '+37496999419', 'frujeta@mail.ru', '12345', 150000, '[\"viber\",\"whatsapp\"]', '[\"facebook\",\"linkedin\",\"instagram\"]', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `work_status`
--

CREATE TABLE `work_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `work_status`
--

INSERT INTO `work_status` (`status_id`, `status_name`) VALUES
(1, 'ընթացքում է'),
(2, 'մոտենում է վերջնաժամկետը'),
(3, 'կատարված է'),
(4, 'կատարված չէ'),
(5, 'ժամանակավորապես դադարեցված է');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Индексы таблицы `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`note_id`);

--
-- Индексы таблицы `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`organization_id`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `work_status`
--
ALTER TABLE `work_status`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `organizations`
--
ALTER TABLE `organizations`
  MODIFY `organization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `work_status`
--
ALTER TABLE `work_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
