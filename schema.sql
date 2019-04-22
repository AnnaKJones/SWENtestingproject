create database hoteldb;
use hoteldb;

create table available_rooms(
room_type varchar(30),
availability int(3)
);

create table bookings(
customer_id int auto_increment not null PRIMARY KEY,
full_name varchar(50),
email varchar(100),
telephone varchar(20),
start_date date,
end_date date,
num_nights int(3),
totalcharge decimal(8,2),
booking_type varchar(50),
num_adults int(3),
num_child int(3),
paymentname varchar(50),
cardnum varchar(30),
cvnum varchar(3),
paymentexp date,
token varchar(20),
confirmation int(1));

create table users(
username varchar(30),
password varchar(32) not null);

create table checkedinUsers(
guest_id int PRIMARY KEY,
name varchar(30),
date_checkin DATETIME NOT NULL
);

create table checkedoutUsers(
guest_id int PRIMARY KEY,
name varchar(30),
date_checkout DATETIME NOT NULL
);


create table roomrates(
room varchar(30),
nightly_rate decimal(8,2));

insert into available_rooms(room_type,availability) values('Pent House', 10);
insert into available_rooms(room_type,availability) values('Family Suite', 10);
insert into available_rooms(room_type,availability) values('Double Room', 10);
insert into available_rooms(room_type,availability) values('Single Room', 10);

insert into roomrates(room,nightly_rate) values('Pent House',1000);
insert into roomrates(room,nightly_rate) values('Family Suite',750);
insert into roomrates(room,nightly_rate) values('Double Room',500);
insert into roomrates(room,nightly_rate) values('Single Room',250);




insert into users (username, password) 
    VALUES ('Admin', MD5('password123')); 
    
    