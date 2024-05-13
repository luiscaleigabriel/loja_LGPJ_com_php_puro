create database if not exists lojaljpg default collate utf8_general_ci default charset utf8;

use lojaljpg;

create table if not exists user (
	id int not null auto_increment,
    name varchar(40) not null,
    email varchar(250) unique not null,
    phone varchar(15) not null,
    gender set('M', 'F') not null,
    address text not null,
    password varchar(255) not null,
    image varchar(255),
    is_admin boolean not null,
    created_at datetime not null default current_timestamp,
    updated_at datetime not null default current_timestamp,
    primary key(id)
)default charset utf8;

create table if not exists category (
	id int not null auto_increment,
    name varchar(40) not null,
    slug varchar(255) not null,
    created_at datetime not null default current_timestamp,
    updated_at datetime not null default current_timestamp,
    primary key(id)
)default charset utf8;

create table if not exists subcategory (
	id int not null auto_increment,
    name varchar(40) not null,
    slug varchar(255) not null,
    idcategory int not null,
    created_at datetime not null default current_timestamp,
    updated_at datetime not null default current_timestamp,
    primary key(id)
)default charset utf8;

create table if not exists product (
	id int not null auto_increment,
    name varchar(40) not null,
    slug varchar(255) not null,
    description text not null,
    price decimal(10, 2) not null,
    quantity int not null,
    image varchar(255),
    status boolean not null,
    idcategory int not null,
    idsubcategory int not null,
    created_at datetime not null default current_timestamp,
    updated_at datetime not null default current_timestamp,
    primary key(id)
)default charset utf8;



alter table product add foreign key(idcategory) references category(id);
alter table product add foreign key(idsubcategory) references subcategory(id);

alter table subcategory add foreign key(idcategory) references category(id);


insert into user (name, email, phone, gender, address, password, is_admin) values 
('Luís Gabriel', 'luisgabriel@gmail.com', '929379920', 'M', 'Benfica/Mundial','$2y$10$uCigVcGiLYG3kd2WcyuI9.f1JUKX7rdTd.VfCS23gi1VDwkBdoARu', true),
('Manuel Silva', 'manuel@gmail.com', '999999999', 'M', 'Mundial', '$2y$10$uCigVcGiLYG3kd2WcyuI9.f1JUKX7rdTd.VfCS23gi1VDwkBdoARu', false);

