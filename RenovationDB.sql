-- command line statements that we used to make the database

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
website varchar(50),
city varchar(50),
state varchar(50) );

CREATE TABLE customer
(customer_id integer AUTO_INCREMENT PRIMARY KEY,
username varchar(255) UNIQUE,
password varchar(255),
first_name varchar(15),
last_name varchar(15),
address varchar(50),
zipcode varchar(5),
budget decimal(8,2),
city varchar(50),
state varchar(50) );

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
order_id_fk integer,
FOREIGN KEY (order_id_fk) REFERENCES order_info(order_id) );


CREATE TABLE room
(room_id integer AUTO_INCREMENT PRIMARY KEY,
room_name varchar(20),
service_id_fk integer,
FOREIGN KEY (service_id_fk) REFERENCES service(service_id) );

INSERT INTO contractor (company_name,specialization,cost_for_hire,zipcode,phone,email,website,city,state) VALUES ('Your Home Inc.','Plumbing','10000','11111','1112223333','yourhome@gmail.com','www.yourhome.com','New York City','New York');
INSERT INTO contractor (company_name,specialization,cost_for_hire,zipcode,phone,email,website,city,state) VALUES ('The Best in Town','Cleaning','5000','67891','6460002334','bestintown@gmail.com','www.bestintown.com','Brooklyn','New York');
INSERT INTO contractor (company_name,specialization,cost_for_hire,zipcode,phone,email,website,city,state) VALUES ('Make Magic Happen','Flooring','7000','50214','1542227849','magichome@gmail.com','www.makemagichappen.org','Staten Island','New York');
INSERT INTO contractor (company_name,specialization,cost_for_hire,zipcode,phone,email,website,city,state) VALUES ('Interni Lucidi','Decoration','6000','11111','6461239876','internilucidi@gmail.com','www.internilucidi.com','New York City','New York');
INSERT INTO contractor (company_name,specialization,cost_for_hire,zipcode,phone,email,website,city,state) VALUES ('Brush Brothers','Painting','5000','67891','3471239876','brushbrothers@gmail.com','www.brushbrothers.com','Brooklyn','New York');
INSERT INTO contractor (company_name,specialization,cost_for_hire,zipcode,phone,email,website,city,state) VALUES ('Amogus','Electrical','4000','50214','2019873456','amogus@gmail.com','www.amogus.com','Staten Island','New York');
