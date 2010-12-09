CREATE TABLE db1_user (
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(128) NOT NULL,
	password VARCHAR(128) NOT NULL,
	email VARCHAR(128) NOT NULL
) ENGINE=innoDb  DEFAULT CHARSET=utf8;

CREATE TABLE db1_type (
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	type VARCHAR(250) NOT NULL
) ENGINE=innoDb  DEFAULT CHARSET=utf8;

CREATE TABLE db1_contents (
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	parent INTEGER,
	type_id INTEGER NOT NULL,
	position INTEGER,
  title VARCHAR(250) NOT NULL,	
  CONSTRAINT FK_type_id FOREIGN KEY (type_id)
		REFERENCES db1_type (id)
) ENGINE=innoDb  DEFAULT CHARSET=utf8;

CREATE TABLE db1_article (
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	content_id INTEGER NOT NULL,
	text LONGTEXT,
	CONSTRAINT FK_content_id FOREIGN KEY (content_id)
		REFERENCES db1_contents (id)	
) ENGINE=innoDb  DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `db1_article`
--

INSERT INTO `db1_article` (`id`, `content_id`, `text`) VALUES
(2, 1, 'test article'),
(3, 1, 'gss sdf sfsd\r\nafs\r\naf\r\nsaf\r\nsda\r\nf \r\nsaf\r\ndsafsafsadfdsafsadfsadfsaf'),
(6, 1, 'sdfdsafasfsdaf'),
(7, 5, 'ыаыфаыфваыва раздела 1\r\n'),
(8, 1, '<p>Untitled document</p>\r\n<h2>Initialization of TinyMCE</h2>\r\n<p>In order to initialize the TinyMCE the following code must be placed  within HEAD element of a document. The following example is configured  to convert all TEXTAREA elements into editors when the page loads.   There are other <a title="TinyMCE:Configuration/mode" href="http://wiki.moxiecode.com/index.php/TinyMCE:Configuration/mode">modes</a> as well.</p>'),
(9, 1, '<p>sadfsdafsafdasfasf</p>\r\n<p>asdf</p>\r\n<p>dsf</p>\r\n<p>asd</p>\r\n<p>fas</p>\r\n<p>f</p>\r\n<p>asf</p>\r\n<p>af</p>\r\n<p>aaaaaaaaaaaaaaaaaaaa</p>');

--
-- Дамп данных таблицы `db1_contents`
--

INSERT INTO `db1_contents` (`id`, `parent`, `position`, `title`) VALUES
(1, 0, 0, '/'),
(2, 0, 1, 'Введение'),
(3, 1, 3, 'Глава 1'),
(4, 1, 4, 'Глава 2'),
(5, 3, 4, 'Раздел 1');

--
-- Дамп данных таблицы `db1_type`
--


--
-- Дамп данных таблицы `db1_user`
--

INSERT INTO `db1_user` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'admin@mail.com');
