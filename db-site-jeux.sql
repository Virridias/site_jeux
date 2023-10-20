
CREATE TABLE `User` (
  `id` BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `billing_address_id` int(11) NOT NULL,
  `shipping_address_id` int(11) NOT NULL,
  `role_id` BIGINT
);

CREATE TABLE `Role` (
  `id` BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(255)
);

CREATE TABLE `Address` (
  `id` BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `street_nb` int(11) NOT NULL,
  `street_name` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `country` varchar(50) NOT NULL
);

CREATE TABLE `Order` (
  `id` BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `date_order` date NOT NULL
);

CREATE TABLE `Order_as_product` (
  `order_id` BIGINT NOT NULL,
  `product_id`BIGINT NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY(order_id, product_id)
);

CREATE TABLE `Product` (
  `id` BIGINT PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `qty` int(11)NOT NULL DEFAULT 0,
  `price` DECIMAL(4,2) NOT NULL,
  `url_img`varchar(255),
  `description` varchar(255) NOT NULL,
  `console` varchar(50) NOT NULL,
  `year` int(11)
);

alter table `user`
add constraint fk_role_id
foreign key (role_id)
references role(id);

alter table Order_as_product
add constraint fk_order_id
foreign key (order_id)
references `Order`(id);

alter table Order_as_product
add constraint fk_product_id
foreign key (product_id)
references Product(id);
