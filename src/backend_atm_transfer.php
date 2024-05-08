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

// Retrieve form data
$sourceAccount = $_POST['source_account'];
$destinationAccount = $_POST['destination_account'];
$transferAmount = $_POST['amount'];

// Check if source and destination accounts are provided
if (empty($sourceAccount) || empty($destinationAccount)) {
    $transferMessage = "Error: Please select both source and destination accounts.";
} elseif ($sourceAccount == $destinationAccount) { // Check if source and destination are the same
    $transferMessage = "Error: Source and destination accounts cannot be the same.";
} else {
    // Check if transfer amount is valid
    if ($transferAmount <= 0) {
        $transferMessage = "Error: Transfer amount must be greater than zero.";
    } else {
        // Check if source account has sufficient balance
        $sourceBalanceQuery = "SELECT balance FROM checkinginfo WHERE accountname = '$sourceAccount'";
        $sourceBalanceResult = mysqli_query($conn, $sourceBalanceQuery);
        if ($sourceBalanceResult) {
            $sourceBalanceRow = mysqli_fetch_assoc($sourceBalanceResult);
            $sourceBalance = $sourceBalanceRow['balance'];
            if ($sourceBalance < $transferAmount) {
                $transferMessage = "Error: Source account does not have sufficient balance.";
            } else {
                // Update balances in the database
                $updateSourceBalanceQuery = "UPDATE checkinginfo SET balance = balance - $transferAmount WHERE accountname = '$sourceAccount'";
                $updateDestinationBalanceQuery = "UPDATE checkinginfo SET balance = balance + $transferAmount WHERE accountname = '$destinationAccount'";

                // Execute queries
                if (mysqli_query($conn, $updateSourceBalanceQuery) && mysqli_query($conn, $updateDestinationBalanceQuery)) {
                    // Transfer successful
                    $transferMessage = "Transfer of $transferAmount from $sourceAccount to $destinationAccount successful.";
                } else {
                    // Transfer failed
                    $transferMessage = "Error: " . mysqli_error($conn);
                }
            }
        } else {
            $transferMessage = "Error: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn); // Close database connection
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>ATM Interface</title>
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
        <div class="atm-title">BANK OF "" ATM</div>
        <div class="account-info"><h2>Hello <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?></h2></div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Transfer Result</h5>
                <p class="card-text"><?php echo $transferMessage; ?></p>
                <a href="atm.php" class="btn btn-primary">Back to ATM Interface</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</body>
</html>
