CREATE DATABASE Brickdash;
USE Brickdash;

CREATE TABLE users(
	name VARCHAR(20),
	userid INT NOT NULL AUTO_INCREMENT
);

CREATE TABLE groups(
	userid INT NOT NULL,
	token VARCHAR(6),
	q_used TEXT(65535)
);

CREATE TABLE answers(
	userid INT NOT NULL,
	token VARCHAR(6),
	answer TEXT(300)
);

CREATE TABLE questions(
	question TEXT(65535)
);