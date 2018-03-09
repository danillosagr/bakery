create database bakery default character set utf8 collate utf8_unicode_ci;

create user ubakery@localhost identified by 'ubakerypass';

grant all on bakery.* to ubakery@localhost;

flush privileges;

use bakery;

create table member (
    id int auto_increment primary key,
    login varchar(40) not null unique,
    password varchar(256) not null
) engine=innodb default charset=utf8 collate=utf8_unicode_ci;

create table client (
    id int auto_increment primary key,
    name varchar(40),
    surname varchar(60),
    tin varchar(20),
    address varchar(10),
    location varchar(10) null,
    postalcode varchar(5) null,
    province varchar(30) null,
    email varchar(100) null,
    unique(name, surname, tin)
) engine=innodb default charset=utf8 collate=utf8_unicode_ci;

create table ticket (
    id int auto_increment primary key,
    fecha datetime,
    idmember int not null,
    idcliente int null,
    total decimal(5,2),
    foreign key(idmember) references member(id) on delete cascade on update cascade,
    foreign key(idcliente) references client(id) on delete cascade on update cascade 
) engine=innodb default charset=utf8 collate=utf8_unicode_ci;

create table family(
    id int auto_increment primary key,
    familia varchar(100) unique
)engine=innodb default charset=utf8 collate=utf8_unicode_ci;

create table product(
    id int auto_increment primary key,
    idfamilia int not null,
    product varchar(100),
    price decimal(10,2),
    unique(idfamilia, product),
    foreign key(idfamilia) references family(id) on delete cascade on update cascade
)engine=innodb default charset=utf8 collate=utf8_unicode_ci;

create table ticketdetail(
    id int auto_increment primary key,
    idticket int not null,
    idproduct int not null,
    quantity int,
    price decimal(10,2),
    foreign key(idticket) references ticket(id) on delete cascade on update cascade,
    foreign key(idproduct) references product(id) on delete cascade on update cascade
)engine=innodb default charset=utf8 collate=utf8_unicode_ci;

INSERT INTO `family`(`id`, `familia`) VALUES  (1, 'Bolleria');
INSERT INTO `family`(`id`, `familia`) VALUES  (2, 'Gourmet');
INSERT INTO `family`(`id`, `familia`) VALUES  (3, 'Panaderia');
INSERT INTO `family`(`id`, `familia`) VALUES  (4, 'Pasteleria');
INSERT INTO `family`(`id`, `familia`) VALUES  (5, 'Dulces de Navidad');
INSERT INTO `family`(`id`, `familia`) VALUES  (6, 'Dulces de Semana Santa');

INSERT INTO `product`(`id`, `idfamilia`, `product`, `price`, `imagen`) VALUES (NULL, '1', 'Croissant chocolate', '3.20', null);
INSERT INTO `product`(`id`, `idfamilia`, `product`, `price`, `imagen`) VALUES (NULL, '2', 'Tarta fina de maney', '16.20', null);
INSERT INTO `product`(`id`, `idfamilia`, `product`, `price`, `imagen`) VALUES (NULL, '3', 'Pan blanco', '1.00', null);
INSERT INTO `product`(`id`, `idfamilia`, `product`, `price`, `imagen`) VALUES (NULL, '4', 'Tarta de manzana', '5.00', null);
INSERT INTO `product`(`id`, `idfamilia`, `product`, `price`, `imagen`) VALUES (NULL, '1', 'Palmera de chocolate', '1.20', null);
INSERT INTO `product`(`id`, `idfamilia`, `product`, `price`, `imagen`) VALUES (NULL, '2', 'Tarta de fruta de la pasión', '10.20', null);
INSERT INTO `product`(`id`, `idfamilia`, `product`, `price`, `imagen`) VALUES (NULL, '3', 'Pan integral', '3.20', null);
INSERT INTO `product`(`id`, `idfamilia`, `product`, `price`, `imagen`) VALUES (NULL, '4', 'Tarta de chocolate', '3.20', null);
INSERT INTO `product`(`id`, `idfamilia`, `product`, `price`, `imagen`) VALUES (NULL, '1', 'Croissant crema', '3.20', null);
INSERT INTO `product`(`id`, `idfamilia`, `product`, `price`, `imagen`) VALUES (NULL, '2', 'Croissant chocolate', '3.20', null);
INSERT INTO `product`(`id`, `idfamilia`, `product`, `price`, `imagen`) VALUES (NULL, '3', 'Croissant chocolate', '3.20', null);
INSERT INTO `product`(`id`, `idfamilia`, `product`, `price`, `imagen`) VALUES (NULL, '4', 'Croissant chocolate', '3.20', null);
INSERT INTO `product`(`id`, `idfamilia`, `product`, `price`, `imagen`) VALUES (NULL, '1', 'Croissant chocolate', '3.20', null);
INSERT INTO `product`(`id`, `idfamilia`, `product`, `price`, `imagen`) VALUES (NULL, '2', 'Croissant de crema', '3.20', null);
INSERT INTO `product`(`id`, `idfamilia`, `product`, `price`, `imagen`) VALUES (NULL, '3', 'Croissant de trufa', '3.20', null);
INSERT INTO `product`(`id`, `idfamilia`, `product`, `price`, `imagen`) VALUES (NULL, '6', 'Torrijas', '3.20', null);
INSERT INTO `product`(`id`, `idfamilia`, `product`, `price`, `imagen`) VALUES (NULL, '5', 'Roscón de Reyes', '3.20', null);
INSERT INTO `product`(`id`, `idfamilia`, `product`, `price`, `imagen`) VALUES (NULL, '2', 'Croissant de nata', '3.20', null);
INSERT INTO `product`(`id`, `idfamilia`, `product`, `price`, `imagen`) VALUES (NULL, '3', 'Pan de Alfacar', '0.65', null);
INSERT INTO `product`(`id`, `idfamilia`, `product`, `price`, `imagen`) VALUES (NULL, '3', 'Baguette', '0.70', null);


INSERT INTO `client`(`id`, `name`, `surname`, `tin`, `address`, `location`, `postalcode`, `province`, `email`, `telephone`) VALUES ('1', 'Cafeteria Jamaica', '', 'A63192272', 'Av. de Salobreña 26', 'Motril', '18600', 'Granada', 'info@cafeteriajamailca.es', '958822020');
INSERT INTO `client`(`id`, `name`, `surname`, `tin`, `address`, `location`, `postalcode`, `province`, `email`, `telephone`) VALUES ('2', 'Asador de Navarra', '', 'E12698015', 'Calle Ancha 3', 'Albolote', '18220', 'Granada', 'asadordenavarra@gmail.com', '958412020');
INSERT INTO `client`(`id`, `name`, `surname`, `tin`, `address`, `location`, `postalcode`, `province`, `email`, `telephone`) VALUES ('3', 'Rafael', 'Fernandez Piñar', '54369086F', 'Calle Alhamar 30 (Bar La Blanca Paloma)', 'Granada', '18006', 'Granada', 'lbp@hotmail.com', '958252525');
INSERT INTO `client`(`name`) VALUES ('Tienda');
