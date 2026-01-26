create database if not exists VYNOTesting;
use VYNOTesting;

create table User (
   userID int auto_increment primary key,
   nome varchar(32) not null,
   cognome varchar(32) not null,
   email varchar(254) not null unique,
   password varchar(64) not null check (length(password) > 12),
   usernameProfile varchar(165) not null unique default concat(nome, "_", cognome, FLOOR(RAND()*(1000-1+1)+5)),
   descrizione varchar(64) not null,
   imgUrl varchar(255) not null,
   dataNascita date not null
);
