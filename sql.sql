create database management_persona;

use management_persona;

create table tasks (
    id int auto_increment not null PRIMARY KEY,
    name varchar(70) not null,
    description varchar(255),
    person json not null,
    submit_date date default current_date,
    status boolean not null default 1
);

create table users(
    id int auto_increment not null PRIMARY KEY,
    login varchar(255) not null,
    password varchar(255) not null,
    status boolean not null default 1
)