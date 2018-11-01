CREATE TABLE admin (
  username varchar(100) PRIMARY KEY NOT NULL,
  password varchar(100) NOT NULL,
  firstName varchar(100) NOT NULL,
  lastName varchar(100) NOT NULL,
  email varchar(100) NOT NULL
);

CREATE TABLE product (
  productID int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  productName varchar(100) NOT NULL,
  productDiscription varchar(255),
  productStock int NOT NULL,
  username varchar(100) NOT NULL,
  FOREIGN KEY (username) REFERENCES admin(username)
);



INSERT INTO admin (username, password, firstName, lastName, email) VALUES
('admin', 'admin', 'Amal', 'Thomas', 'amalthomas587@gmail');

INSERT INTO product (productName, productDiscription, productStock, username) VALUES
('Flute', 'A wood wind instrument.', 100, 'admin');
