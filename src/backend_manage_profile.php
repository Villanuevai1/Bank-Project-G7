<?php
// Create connection
$conn = mysqli_connect("localhost", "root", "", "users");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $zip = $_POST["zip"];
    $driverLicense = $_POST["DriverL"];
    $ssn = $_POST["SSN"];

    if (empty($username) || empty($zip) || empty($driverLicense) || empty($ssn)) {
        echo "All fields are required.";
        echo "<a href='manage_profile.php'>Back to manage profile</a>";
        exit();
    }

    // Check if the user exists
    $query = "SELECT customer_id FROM customers WHERE username = ? AND zip = ? AND DriverL = ? AND SSN = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $username, $zip, $driverLicense, $ssn);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        echo "User not found or invalid credentials.";
        echo "<a href='manage_profile.php'>Back to manage profile</a>";

    } else {
        $row = $result->fetch_assoc();
        $customerId = $row["customer_id"];

        // Check if the user has a positive balance
        $balanceQuery = "SELECT balance FROM checkinginfo WHERE customer_id = ?";
        $balanceStmt = $conn->prepare($balanceQuery);
        $balanceStmt->bind_param("i", $customerId);
        $balanceStmt->execute();
        $balanceResult = $balanceStmt->get_result();

        $canDelete = true;
        while ($balanceRow = $balanceResult->fetch_assoc()) {
            if ($balanceRow["balance"] > 0) {
                $canDelete = false;
                break;
            }
        }

        if (!$canDelete) {
            echo "User cannot be deleted because they have money in their account.";
            echo "<a href='withdraw.php'>to withdraw page <br> </a>";
            echo "<a href='manage_profile.php'>Back to manage profile</a>";

        } else {
            // Check if the user has a negative balance
            $negativeBalanceQuery = "SELECT balance FROM checkinginfo WHERE customer_id = ? AND balance < 0";
            $negativeBalanceStmt = $conn->prepare($negativeBalanceQuery);
            $negativeBalanceStmt->bind_param("i", $customerId);
            $negativeBalanceStmt->execute();
            $negativeBalanceResult = $negativeBalanceStmt->get_result();

            if ($negativeBalanceResult->num_rows > 0) {
                echo "User cannot be deleted because they have a negative balance in one or more accounts.";
                echo "<a href='deposit.php'>to deposit funds page <br></a>";
                echo "<a href='transfer.php'>to transfer  fundspage <br></a>";
                echo "<a href='manage_profile.php'>Back to manage profile</a>";

            } else {
                // Delete checking info
                $deleteCheckingQuery = "DELETE FROM checkinginfo WHERE customer_id = ?";
                $deleteCheckingStmt = $conn->prepare($deleteCheckingQuery);
                $deleteCheckingStmt->bind_param("i", $customerId);
                $deleteCheckingStmt->execute();

                // Delete customer
                $deleteCustomerQuery = "DELETE FROM customers WHERE customer_id = ?";
                $deleteCustomerStmt = $conn->prepare($deleteCustomerQuery);
                $deleteCustomerStmt->bind_param("i", $customerId);
                $deleteCustomerStmt->execute();

                echo "Account deleted successfully. <br>";
                echo "All confidential information has been scrubbed from our database. <br>";
                echo "<a href='login.php'>Back to login profile</a>";

            }
        }
    }
} else {
    // Handle invalid request method
    echo "Invalid request method.";
}
?>
