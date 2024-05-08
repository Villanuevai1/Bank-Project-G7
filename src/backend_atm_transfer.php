<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect user to login page if not logged in
    header("Location: login.php");
    exit();
}

// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "users");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$sourceAccount = $_POST['source_account'];
$destinationAccount = $_POST['destination_account'];
$transferAmount = $_POST['amount'];

// Update balances in the database
$updateSourceBalanceQuery = "UPDATE checkinginfo SET balance = balance - $transferAmount WHERE accountname = '$sourceAccount'";
$updateDestinationBalanceQuery = "UPDATE checkinginfo SET balance = balance + $transferAmount WHERE accountname = '$destinationAccount'";

// Execute queries
if (mysqli_query($conn, $updateSourceBalanceQuery) && mysqli_query($conn, $updateDestinationBalanceQuery)) {
    // Transfer successful
    echo "Transfer of $transferAmount from $sourceAccount to $destinationAccount successful. <br>";
    echo '<a href="atm.php">Back to ATM Interface</a>';
} else {
    // Transfer failed
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn); // Close database connection
?>
