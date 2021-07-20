/*Users Table*/
DROP TABLE IF EXISTS `users`;

CREATE TABLE users(
	id INT(6) AUTO_INCREMENT PRIMARY KEY,
    usertype int(1) not null,
    firstname varchar(50) not null,
    lastname varchar(50) not null,
    email varchar(50) not null,
    mobile varchar(15) not null,
    pwd varchar(30) not null,
    abn varchar(15),
    userAddress text,
    active varchar(10)
   );

/*Accommodation Table*/

DROP TABLE IF EXISTS `accommodation`;

CREATE TABLE accommodation(
	id INT(6) AUTO_INCREMENT PRIMARY KEY,
    accomLocation varchar(50) not null,
    availFrom date not null,
    availTo date not null,
    guests int(3),
    price decimal(10,2) not null,
    rooms int not null,
    bathrooms int not null,
    smoking varchar(5) not null,
    garage varchar(5) not null,
    pet varchar(5) not null,
    internet varchar(5) not null,
    accomAddress text not null,
    houseRating decimal(2,1) not null,
    hostRating decimal(2,1) not null,
    hostID int(6) not null,
    FOREIGN KEY (hostID) REFERENCES users(ID),
    accomName varchar(50),
    accomDesc text,
    city varchar(50),
    entireHouse varchar(5),
    active varchar(5)
    );

/*Accommodation data*/
INSERT INTO accommodation (`accomLocation`, `availFrom`, `availTo`, `guests`, `price`, `rooms`, `bathrooms`, `smoking`, `garage`, `pet`, `internet`, `accomAddress`, `houseRating`,`hostRating`,`hostID`) 
VALUES 
('Hobart','2021/01/01','2021/10/15','10','1000','3','1','No','Yes','No','Yes','1 Swan St Hobart TAS 7000','4.0','4.4','11'),
('Hobart','2021/05/01','2022/10/15','9','750','4','2','Yes','Yes','Yes','Yes','8 Brooke St Hobart TAS 7008','3.5','2.4','11'),
('Greater Hobart','2021/03/01','2022/05/10','7','500','2','3','No','No','No','Yes','1 Queens Rd Cygnet TAS 7112','3.9','4.3','11'),
('Greater Hobart','2021/01/01','2021/05/15','9','2000','4','3','No','Yes','Yes','Yes','31 Bruny Rd Bruny Island TAS 7117','4.0','4.4','11'),
('Launceston','2021/03/01','2021/12/15','4','1500','3','4','Yes','Yes','No','Yes','16 Swan St Launceston TAS 7250','4.1','4.5','11'),
('Greater Hobart','2021/05/01','2021/12/15','8','300','2','1','No','Yes','No','Yes','31 King St Westwood TAS 7292','4.0','4.4','11'),
('Greater Hobart','2021/02/01','2022/03/15','9','800','3','Yes','No','Yes','No','Yes','25 Church St Deloraine TAS 7304','4.0','4.4','11'),
('Launceston','2021/02/01','2022/05/15','15','700','5','4','No','Yes','No','Yes','1 Invermay Rd Launceston TAS 7250','4.0','4.4','13'),
('Hobart','2021/04/01','2021/11/15','7','2000','7','1','No','Yes','No','Yes','1 Elizabeth St Hobart TAS 7000','4.0','4.4','11'),
('Launceston','2021/06/01','2022/10/15','4','300','8','3','No','Yes','No','Yes','50 Huon Hwy Huonville TAS 7109','4.0','4.4','13'),
('Greater Launceston','2021/02/01','2022/10/15','5','3500','8','2','No','Yes','No','Yes','1000 Huon Hwy Huonville TAS 7209','4.0','4.4','13'),
('Greater Launceston','2021/01/01','2022/10/15','7','500','8','1','No','Yes','No','Yes','7 Huon Hwy Huonville TAS 7309','4.0','4.4','13'),
('Greater Launceston','2021/03/01','2022/10/15','10','750','8','7','No','Yes','No','Yes','350 Huon Hwy Huonville TAS 7509','4.0','4.4','13')


/*Booking Table*/
DROP TABLE IF EXISTS `bookings`;

CREATE TABLE bookings(
	bid INT(6) AUTO_INCREMENT PRIMARY KEY,
    accomID int(6) not null,
    FOREIGN KEY (accomID) REFERENCES Accommodation(ID),
    users int(6) not null,
    FOREIGN KEY (users) REFERENCES users(ID),
    bookFrom date not null,
    bookTo date not null,
    bstatus varchar(50) not null
    noofguests int(3) not null,
    totalprice decimal(10,2) not null,
    comments text
    );

INSERT INTO bookings (`accomid`,`users`,`bookFrom`,`bookTo`,`bstatus`)
VALUES
('1','10','2021/02/01','2021/03/01'),
('3','9','2021/03/05','2021/03/10'),
('10','12','2021/10/01','2021/12/01')

/*FailedBooking Table*/
DROP TABLE IF EXISTS `failedBooking`;

CREATE TABLE failedBooking(
	id INT(6) AUTO_INCREMENT PRIMARY KEY,
    bid int(6) not null,
    accomID int(6) not null,
    FOREIGN KEY (accomID) REFERENCES Accommodation(ID),
    users int(6) not null,
    FOREIGN KEY (users) REFERENCES users(ID),
    bookFrom date not null,
    bookTo date not null,
    bstatus varchar(50) not null
    noofguests int(3) not null,
    totalprice decimal(10,2) not null,
    comments text
    );

/*Inbox Table*/
DROP TABLE IF EXISTS `inbox`;

CREATE TABLE inbox(
	id INT(6) AUTO_INCREMENT PRIMARY KEY,
    fromID int(6) not null,
    FOREIGN KEY (fromID) REFERENCES users(ID),
    toID int(6) not null,
    FOREIGN KEY (toID) REFERENCES users(ID),
    msg text,
    bookingID int(6) not null,
    FOREIGN KEY (bookingID) REFERENCES bookings(bid),
    inputTime DATETIME DEFAULT CURRENT_TIMESTAMP
    );

INSERT INTO inbox (`fromID`,`toID`,`msg`)
VALUES
('13','11','HELLLOOOOOO'),
('10','13','12321321asdsad'),
('11','11','77'),
('9','10','91'),
('13','13','9'),
('9','12','76'),
('13','9','75'),
('10','13','20'),
('11','9','35'),
('11','11','53'),
('11','13','30'),
('12','10','41'),
('9','12','27'),
('9','12','56'),
('13','10','36'),
('9','12','45'),
('9','13','86'),
('13','9','76'),
('11','12','9'),
('12','10','65'),
('13','12','50'),
('12','10','61'),

/*Inbox Table*/
DROP TABLE IF EXISTS `reviews`;

CREATE TABLE reviews(
	id INT(6) AUTO_INCREMENT PRIMARY KEY,
    bid int(6) not null,
    FOREIGN KEY (bid) REFERENCES bookings(bid),
    hostID int(6) not null,
    FOREIGN KEY (hostID) REFERENCES users(ID),
    reviewerID int(6) not null,
    FOREIGN KEY (reviewerID) REFERENCES users(ID),
    accomID int(6) not null,
    FOREIGN KEY (accomID) REFERENCES accommodation(ID),
    accomRating int(1) not null,
    hostRating int(1) not null,
    review text,
    inputTime DATETIME DEFAULT CURRENT_TIMESTAMP
    );
