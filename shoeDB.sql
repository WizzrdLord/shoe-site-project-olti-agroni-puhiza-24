--SQL Code used for shoedb

CREATE DATABASE shoeDB;

CREATE TABLE shoes(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    brand VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    image2 VARCHAR(255) NOT NULL,
    image3 VARCHAR(255) NOT NULL,
    image4 VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    color_id INT NOT NULL,                            --Key referencing colors table
    material_id INT NOT NULL,                         --Key referencing materials table
    gender ENUM('Men', 'Women', 'Children') NOT NULL, --Gender category for the shoe
    discount DECIMAL(5, 2) DEFAULT 0.00,              --Discount percentage
    date_added DATE DEFAULT CURRENT_DATE,
    FOREIGN KEY (color_id) REFERENCES colors(id),
    FOREIGN KEY (material_id) REFERENCES materials(id)
);

CREATE TABLE colors(
    id INT AUTO_INCREMENT PRIMARY KEY,
    color_name VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE materials(
    id INT AUTO_INCREMENT PRIMARY KEY,
    material_name VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE sizes(
    id INT AUTO_INCREMENT PRIMARY KEY,
    size_value VARCHAR(10) NOT NULL UNIQUE
);

CREATE TABLE shoe_sizes(
    shoe_id INT NOT NULL,                              --Key referencing shoes table
    size_id INT NOT NULL,                              --Key referencing sizes table
    PRIMARY KEY (shoe_id, size_id),
    FOREIGN KEY (shoe_id) REFERENCES shoes(id),
    FOREIGN KEY (size_id) REFERENCES sizes(id)
);

CREATE TABLE stock(
    id INT AUTO_INCREMENT PRIMARY KEY,                 --Unique ID for record
    shoe_id INT NOT NULL,                              --Key referencing shoes table
    size_id INT NOT NULL,                              --Key referencing sizes table
    quantity INT NOT NULL DEFAULT 0,                   --Nr of shoes available in this size
    FOREIGN KEY (shoe_id) REFERENCES shoes(id),
    FOREIGN KEY (size_id) REFERENCES sizes(id)
);