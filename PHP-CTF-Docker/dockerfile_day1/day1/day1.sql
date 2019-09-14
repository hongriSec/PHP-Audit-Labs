create database day1;
use day1;
create table users (
id int(6) unsigned auto_increment primary key,
name varchar(20) not null,
email varchar(30) not null,
salary int(8) unsigned not null );

INSERT INTO users VALUES(1,'Lucia','Lucia@hongri.com',3000);
INSERT INTO users VALUES(2,'Danny','Danny@hongri.com',4500);
INSERT INTO users VALUES(3,'Alina','Alina@hongri.com',2700);
INSERT INTO users VALUES(4,'Jameson','Jameson@hongri.com',10000);
INSERT INTO users VALUES(5,'Allie','Allie@hongri.com',6000);

create table flag(flag varchar(30) not null);
INSERT INTO flag VALUES('HRCTF{1n0rrY_i3_Vu1n3rab13}');