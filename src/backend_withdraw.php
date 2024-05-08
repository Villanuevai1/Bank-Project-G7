<?php 
session_start(); 

// Check if user is logged in
if(!isset($_SESSION['username'])) {
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

// get account information for the logged-in user
$username = $_SESSION['username'];
$get_account_info_query = "SELECT * FROM checkinginfo WHERE customer_id = (SELECT customer_id FROM customers WHERE username = '$username')";
$get_account_info_result = mysqli_query($conn, $get_account_info_query);

// Store  account data in an array
$accounts = array();
if(mysqli_num_rows($get_account_info_result) > 0) {
    while($row = mysqli_fetch_assoc($get_account_info_result)) {
        $accounts[] = $row;
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>wihdraw Interface</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .atm-container {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
        }

        .atm-title {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .account-info {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .account-details {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .options {
            text-align: left;
        }

        .option {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .quick-cash {
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>

     <div class="atm-container">
        <div class="atm-title">BANK OF "" withdraw</div>
        <div class="account-info"><h2>Hello <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?></h2></div>



<?php 
// Process withdraw if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if an account is selected for deposit
    if (!isset($_POST['account'])) {
        // No account selected, display error message
        $withdrawMessage = "Please select an account to withdraw into. <br>";

    } else {
    // Retrieve form data
    $selectedAccount = $_POST['account'];
    $withdrawAmount = $_POST['amount'];

    // Update balance in the database
    $updateBalanceQuery = "UPDATE checkinginfo SET balance = balance - $withdrawAmount WHERE accountname = '$selectedAccount'";
   if (mysqli_query($conn, $updateBalanceQuery)) {
    // Check if balance becomes negative
    $checkBalanceQuery = "SELECT balance FROM checkinginfo WHERE accountname = '$selectedAccount'";
    $checkBalanceResult = mysqli_query($conn, $checkBalanceQuery);
    $balanceRow = mysqli_fetch_assoc($checkBalanceResult);
    $newBalance = $balanceRow['balance'];
    
    if ($newBalance < 0) {
        // Balance becomes negative
        $withdrawMessage = "Withdrawal of $withdrawAmount from $selectedAccount successful, but the balance is now negative.";
    } else {
        // Balance remains non-negative
        $withdrawMessage = "Withdrawal of $withdrawAmount from $selectedAccount successful.";
    }
    
} else {
    // withdraw failed
    $withdrawMessage = "Error: " . mysqli_error($conn);
}

}

}

mysqli_close($conn); // Close database connection
?>


   
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Withdrawal Result</h5>
                <p class="card-text"><?php echo $withdrawMessage ?? ''; ?></p>
                <a href="withdraw.php" class="btn btn-primary">Back to withdraw Interface</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</body>
</html>
