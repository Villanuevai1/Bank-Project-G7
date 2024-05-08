CREATE TABLE credit (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    accountname VARCHAR(255) NOT NULL,
    credit_limit DECIMAL(10,2) NOT NULL,
    username VARCHAR(255) NOT NULL,
    FOREIGN KEY (`username`) REFERENCES `customers`(`username`)
);
