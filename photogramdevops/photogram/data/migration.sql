CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `active` tinyint(4) NOT NULL,
  `block` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `bio` longtext NOT NULL,
  `avatar` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `dob` date NOT NULL,
  `instagram` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `twitter` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


