create database if not exists VYNOTesting;
use VYNOTesting;

create table if not exists Users (
   userID int auto_increment primary key,
   nome varchar(32) not null,
   cognome varchar(32) not null,
   email varchar(254) not null unique,
   passwd varchar(255) not null check (length(password) > 12),
   usernameProfile varchar(32) not null unique,
   descrizione varchar(64),
   /* imgUrl varchar(255) not null, */
   dataNascita date not null
);
