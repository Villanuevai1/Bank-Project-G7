<?php
// Retrieve the customer_id of the record to edit
if (isset($_GET['id'])) {
    $customer_id = $_GET['id'];

    // Database connection parameters
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "yt_test"; // Update the database name here

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to fetch user data by customer_id
    $sql = "SELECT * FROM users WHERE customer_id = ?";
    
    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $customer_id); // "i" specifies integer type for customer_id
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Record found, fetch data
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit User</title>
        </head>
        <body>
            <h2>Edit User</h2>
            <form action="update_data.php" method="post">
                <input type="hidden" name="customer_id" value="<?php echo $row['customer_id']; ?>">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>"><br><br>
                <label for="password">Password:</label>
                <input type="text" id="password" name="password" value="<?php echo $row['password']; ?>"><br><br>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>"><br><br>
                <label for="city">City:</label>
                <input type="text" id="city" name="city" value="<?php echo $row['city']; ?>"><br><br>
                <label for="zip">ZIP:</label>
                <input type="text" id="zip" name="zip" value="<?php echo $row['zip']; ?>"><br><br>
                <label for="DriverL">Driver's License:</label>
                <input type="text" id="DriverL" name="DriverL" value="<?php echo $row['DriverL']; ?>"><br><br>
                <label for="SSN">SSN:</label>
                <input type="text" id="SSN" name="SSN" value="<?php echo $row['SSN']; ?>"><br><br>
                <input type="submit" value="Update">
            </form>
        </body>
        </html>
        <?php
    } else {
        // Record not found
        echo "Record not found";
    }

    // Close prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // Invalid customer_id
    echo "Invalid customer_id";
}
?>

