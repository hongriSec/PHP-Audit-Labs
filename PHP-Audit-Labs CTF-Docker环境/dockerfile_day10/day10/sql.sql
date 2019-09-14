create database day10;
use day10;
create table students (
id int(6) unsigned auto_increment primary key,
name varchar(20) not null,
email varchar(30) not null,
score int(8) unsigned not null );

INSERT INTO students VALUES(1,'Lucia','Lucia@hongri.com',100);
INSERT INTO students VALUES(2,'Danny','Danny@hongri.com',59);
INSERT INTO students VALUES(3,'Alina','Alina@hongri.com',66);
INSERT INTO students VALUES(4,'Jameson','Jameson@hongri.com',13);
INSERT INTO students VALUES(5,'Allie','Allie@hongri.com',88);

create table flag(flag varchar(30) not null);
INSERT INTO flag VALUES('HRCTF{tim3_blind_Sql}');