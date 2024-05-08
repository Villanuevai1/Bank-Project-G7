CREATE TABLE IF NOT EXISTS customers (
    `customer_id` INT AUTO_INCREMENT PRIMARY KEY,
    `first_name` VARCHAR(255) NOT NULL,
    `last_name` VARCHAR(255) NOT NULL,
    `phone_number` INT(10) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `address` VARCHAR(255) NOT NULL,
    `city` VARCHAR(255) NOT NULL,
    `zip` VARCHAR(5) NOT NULL,
    `DriverL` VARCHAR(20) NOT NULL,
    `SSN` VARCHAR(9) NOT NULL,
    UNIQUE (`username`)
);