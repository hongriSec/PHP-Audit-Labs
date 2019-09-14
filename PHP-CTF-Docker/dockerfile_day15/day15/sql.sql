DROP DATABASE IF EXISTS day15;
CREATE DATABASE day15;
USE day15;
CREATE TABLE users (
    id int(6) unsigned auto_increment primary key,
    user varchar(20) not null,
    pwd varchar(40) not null
);

INSERT INTO users(user,pwd) VALUES('Lucia','82ebeafb2b5dede380a0d2e1323d6d0b');
INSERT INTO users(user,pwd) VALUES('Admin','c609b5eda02acd7b163f500cb23b06b1');