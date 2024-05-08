CREATE TABLE IF NOT EXISTS accounts (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    accountname VARCHAR(255) NOT NULL,
    account_type ENUM('checking', 'savings', 'credit') NOT NULL,
    balance DECIMAL(10,2) NOT NULL,
    username VARCHAR(255) NOT NULL,
    FOREIGN KEY (`username`) REFERENCES `customers`(`username`)
);
