CREATE TABLE db1_user (
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(128) NOT NULL,
	password VARCHAR(128) NOT NULL,
	email VARCHAR(128) NOT NULL
) ENGINE=innoDb  DEFAULT CHARSET=utf8;

CREATE TABLE db1_contents (
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	parent INTEGER,
	position INTEGER
) ENGINE=innoDb  DEFAULT CHARSET=utf8;

CREATE TABLE db1_article (
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	content_id INTEGER NOT NULL,
	title VARCHAR(250) NOT NULL,
	text LONGTEXT,
	CONSTRAINT FK_content_id FOREIGN KEY (content_id)
		REFERENCES db1_contents (id)	
) ENGINE=innoDb  DEFAULT CHARSET=utf8;


INSERT INTO db1_user (username, password, email) VALUES ('test1', 'pass1', 'test1@example.com');
INSERT INTO db1_user (username, password, email) VALUES ('test2', 'pass2', 'test2@example.com');
INSERT INTO db1_user (username, password, email) VALUES ('test3', 'pass3', 'test3@example.com');

