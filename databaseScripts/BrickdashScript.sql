CREATE DATABASE Brickdash;
USE Brickdash;

CREATE TABLE users(
	name VARCHAR(20),
	userid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	grouptoken VARCHAR(6)
);

CREATE TABLE groups(
	groupid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	grouptoken VARCHAR(6)
);

CREATE TABLE answers(
	userid INT NOT NULL,
	answer TEXT(300)
);

CREATE TABLE questions(
	quesid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	question TEXT(65535),
	correctanswer TEXT(300),
	qtype INT NOT NULL
);