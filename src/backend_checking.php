<?php
// Create connection
$conn = mysqli_connect("localhost", "root", "", "users");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// get customer_id based on the provided username
$username = $_POST['username'];
$get_customer_id_query = "SELECT customer_id FROM customers WHERE username = '$username'";
$get_customer_id_result = mysqli_query($conn, $get_customer_id_query);

if(mysqli_num_rows($get_customer_id_result) > 0) {
    $row = mysqli_fetch_assoc($get_customer_id_result);
    $customer_id = $row['customer_id'];

    $accountname = $_POST['accountname'];
    $balance = $_POST['balance'];
    $pin = $_POST['pin'];

    // Insert checking account information into the database
    $creditCardNumber = generateCreditCardNumber();
    $accountNumber = generateAccountNumber();

    $sql = "INSERT INTO checkinginfo (customer_id, accountname, balance, pin, credit_card_number, account_number)
            VALUES ('$customer_id', '$accountname', '$balance', '$pin', '$creditCardNumber', '$accountNumber')";

    if (mysqli_query($conn, $sql)) {
        echo "<div class='good-message'>SUCCESS: New record created successfully. <br> <img src='giphy2.gif' alt='Success GIF'></div>";
        echo "<a href='homepage.php'>CLICK HERE for homepage</a>";
    } else {
        echo "<div class='error-message'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</div>";
        echo "<a href='index.php'>Redirecting to registration</a>";
    }
} else {
    echo "<div class='error-message'>Error: Username not found.</div>";
}

mysqli_close($conn);

function generateCreditCardNumber() {
    return mt_rand(1000000000000000, 9999999999999999);
}

function generateAccountNumber() {
    return mt_rand(1000000000, 9999999999);
}
?>
