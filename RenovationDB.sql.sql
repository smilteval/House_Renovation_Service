CREATE DATABASE renovation;

USE renovation;

CREATE TABLE contractor
(contractor_id integer AUTO_INCREMENT PRIMARY KEY,
company_name varchar(50),
specialization varchar(50),
cost_for_hire  decimal(8,2),
zipcode varchar(5),
phone varchar(10),
email varchar(50),
website varchar(50) );

CREATE TABLE customer
(customer_id integer AUTO_INCREMENT PRIMARY KEY,
first_name varchar(15),
last_name varchar(15),
address varchar(50),
zipcode varchar(5),
budget decimal(8,2) );

CREATE TABLE order_info
(order_id integer AUTO_INCREMENT PRIMARY KEY,
customer_id_fk integer, 
contractor_id_fk integer,
total_price decimal (8,2),
order_date date,
project_duration varchar(10),
FOREIGN KEY (customer_id_fk) REFERENCES customer(customer_id),
FOREIGN KEY (contractor_id_fk) REFERENCES contractor(contractor_id) );

CREATE TABLE service
(service_id integer AUTO_INCREMENT PRIMARY KEY,
service_name varchar(20),
price decimal(8,2),
order_id_fk integer,
FOREIGN KEY (order_id_fk) REFERENCES order_info(order_id) );


CREATE TABLE room
(room_id integer AUTO_INCREMENT PRIMARY KEY,
room_name varchar(20),
service_id_fk integer,
room_price decimal (8,2),
FOREIGN KEY (service_id_fk) REFERENCES service(service_id) );



INSERT INTO customer (first_name,last_name,address,zipcode,budget) VALUES ('Smilte','Valasinaite','123 Main St.','12345','50000');
INSERT INTO customer (first_name,last_name,address,zipcode,budget) VALUES ('Vincenzo','Mezzio','456 Home Ave.','67891','100000');

INSERT INTO contractor (company_name,specialization,cost_for_hire,zipcode,phone,email,website) VALUES ('Your Home Inc.','Full Room','10000','11111','1112223333','yourhome@gmail.com','www.yourhome.com');
INSERT INTO contractor (company_name,specialization,cost_for_hire,zipcode,phone,email,website) VALUES ('The Best in Town','Electrical','5000','67891','6460002334','bestintown@gmail.com','www.bestintown.com');
INSERT INTO contractor (company_name,specialization,cost_for_hire,zipcode,phone,email,website) VALUES ('Make Magic Happen','Flooring','7000','50214','1542227849','magichome@gmail.com','www.makemagichappen.org');
INSERT INTO contractor (company_name,specialization,cost_for_hire,zipcode,phone,email,website) VALUES ('Interni Lucidi','Interior Design','6000','11111','6461239876','internilucidi@gmail.com','www.internilucidi.com');
INSERT INTO contractor (company_name,specialization,cost_for_hire,zipcode,phone,email,website) VALUES ('Brush Brothers','Painting','5000','67891','3471239876','brushbrothers@gmail.com','www.brushbrothers.com');
INSERT INTO contractor (company_name,specialization,cost_for_hire,zipcode,phone,email,website) VALUES ('Lit Up','Lighting','4000','50214','2019873456','litup@gmail.com','www.litup.com');

INSERT INTO order_info (customer_id_fk,contractor_id_fk,total_price,order_date,project_duration) VALUES ('3','1','30000','2021-1-1','20 weeks');

INSERT INTO service(service_name,price,order_id_fk) VALUES ('Renovation','7000','1');

INSERT INTO room(room_name,service_id_fk,room_price) VALUES ('Bathroom','1','7000');

alter table customer add password varchar(255);
alter table customer add username varchar(255) ;
ALTER TABLE `customer` ADD UNIQUE(`username`)
