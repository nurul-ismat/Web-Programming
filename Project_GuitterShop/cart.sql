CREATE TABLE products(
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(100) NOT NULL,
    image varchar(100) NOT NULL,
    price float NOT NULL
);

INSERT INTO products (name, image, price) VALUES
('Gibson Slash #1 Les Paul – VOS w/c Hardcase, Nickel Hdwe', 'img/gibson1.jpg', 63599.00),
('FENDER AMERICAN PROFESSIONAL STRATOCASTER, ANTIQUE OLIVE', 'img/fender1.jpg', 7690.00),
('PRS Tremonti SE EL GTR – BLK', 'img/prs1.jpg', 3500.00);