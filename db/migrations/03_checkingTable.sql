CREATE TABLE IF NOT EXISTS checking (
    `accountname` VARCHAR(255) NOT NULL,
    `balance` DECIMAL(10,2) NOT NULL,
    `pin` VARCHAR(4) NOT NULL,
    `credit_card_number` BIGINT NOT NULL,
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `account_number` BIGINT NOT NULL,
    `username` VARCHAR(255) NOT NULL,
    FOREIGN KEY (`username`) REFERENCES `customers`(`username`)
);