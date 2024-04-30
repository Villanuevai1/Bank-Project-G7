<?php
// Establish database connection
require_once 'config.php';
$conn = new mysqli("db", "user", "password", "database");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to generate a random 16-digit credit card number
function generateCreditCardNumber() {
    return mt_rand(1000000000000000, 9999999999999999);
}

// Function to generate a random 10-digit account number
function generateAccountNumber() {
    return mt_rand(1000000000, 9999999999);
}

// Retrieve form data
$accountname = $_POST['accountname'];
$balance = $_POST['balance'];
$pin = $_POST['pin'];

// Check if all required fields are provided
if (!empty($accountname) && !empty($balance) && !empty($pin)) {
    // Generate credit card number and account number
    $creditCardNumber = generateCreditCardNumber();
    $accountNumber = generateAccountNumber();

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("INSERT INTO checkinginfo (accountname, balance, pin, credit_card_number, account_number) VALUES (?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die('MySQL prepare error: ' . $conn->error);
    }
    $stmt->bind_param("sisiii", $accountname, $balance, $pin, $creditCardNumber, $accountNumber);
    
    if ($stmt->execute()) {
        // Success message
        echo "<div class='good-message'>SUCCESS: New record created successfully. <br> <img src='../images/giphy2.gif' alt='Success GIF'></div>";
        echo "<a href='../homepage.php'>CLICK HERE for homepage</a>";
    } else {
        // Error message for database insertion failure
        echo "<div class='error-message'>Error: " . $stmt->error . "</div>";
        echo "<a href='../../index.php'>Redirecting to registration</a>";
    }
    $stmt->close();
} else {
    // Error message for empty fields
    echo "<div class='error-message'>Error: Account name, balance, or pin is empty. <br> <img src='../images/giphy.gif' alt='Empty Fields GIF'></div>";
    echo "<a href='../../index.php'>Redirecting to registration</a>";
}

// Close database connection
$conn->close();
?>
