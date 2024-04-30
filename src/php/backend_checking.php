<?php

// Create connection
$conn = new mysqli("localhost", "root", "", "users");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function generateCreditCardNumber() {
    
    return mt_rand(1000000000000000, 9999999999999999);
}

function generateAccountNumber() {
    return mt_rand(1000000000, 9999999999);
}

$accountname = $_POST['accountname'];
$balance = $_POST['balance'];
$pin = $_POST['pin'];

$creditCardNumber = generateCreditCardNumber();
$accountNumber = generateAccountNumber();

$sql = "INSERT INTO checkinginfo (accountname, balance, pin, credit_card_number, account_number)
        VALUES ('$accountname', '$balance', '$pin', '$creditCardNumber', '$accountNumber')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    echo "<a href='homepage.php'> CLICK HERE for homepage </a>";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>