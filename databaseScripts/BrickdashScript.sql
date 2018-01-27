CREATE DATABASE Brickdash;
USE Brickdash;

CREATE TABLE users(
	name VARCHAR(20),
	userid INT NOT NULL AUTO_INCREMENT
);

CREATE TABLE groups(
	userid INT NOT NULL,
	grouptoken VARCHAR(6)
);

CREATE TABLE answers(
	userid INT NOT NULL,
	answer TEXT(300)
);

CREATE TABLE questions(
	quesid INT NOT NULL AUTO_INCREMENT,
	question TEXT(65535),
	correctanswer TEXT(300)
);