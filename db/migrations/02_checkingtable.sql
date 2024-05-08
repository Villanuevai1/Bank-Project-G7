CREATE TABLE IF NOT EXISTS checkinginfo (
    `accountname` VARCHAR(255) NOT NULL,
    `balance` INT NOT NULL,
    `pin` VARCHAR(4) NOT NULL,
    `credit_card_number` BIGINT NOT NULL,
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `account_number` BIGINT NOT NULL,
    `username` VARCHAR(255) NOT NULL,
    FOREIGN KEY (`username`) REFERENCES `customers`(`username`)
);