drop database if exists test;
create database test;
use test;
create table user(
id int not null primary key auto_increment,
username varchar(50) not null,
password varchar(50) not null
);

create table content(
id int not null primary key auto_increment,
title varchar(50) not null,
content varchar(50) not null,
user_id varchar(10) not null
);

create table flag(
flag varchar(50) not null
);

insert into flag values("HRCTF{sql_injection}");