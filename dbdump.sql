
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(1, 'Sarah Suppe', 'ilovemesomesoups', 'sarahlovessoup@mail.de'),
(2, 'Cotton Eye Joe', 'wheredidyoucomefrom', 'wheredidyougo@email.com');

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE i217w_boox.`books` (
   `title` VARCHAR(255) NOT NULL,
   `author` VARCHAR(255) NOT NULL,
   `ISBN` CHAR(20) NOT NULL,
   `price` FLOAT(10) NOT NULL
 ) ENGINE = InnoDB;

INSERT INTO `books` (`title`, `author`, `ISBN`, `price`) VALUES
  ('Hans im Glück', 'Gebrüder Grimm', '123-456-78-910', 10.00),
  ('Why Does It Hurt When IP','Frank Zappa', '109-8765-43-21', 3.1415);
