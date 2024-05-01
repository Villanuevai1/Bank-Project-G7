<?php
$logged_in = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        // create connection
        $conn = new mysqli("db", "user", "password", "database");

        // check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // register user
        $stmt = $conn->prepare("SELECT password FROM customers WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $results = $stmt->get_result();

        if ($results->num_rows > 0) {
            $row = $results->fetch_assoc();
            if (password_verify($password, $row["password"])) {
                $logged_in = true;
                // Redirect to the dashboard page
                header("Location: ../homepage.php");
                exit();
            } else {
                echo "Password incorrect";
            }
        } else {
            echo "Username doesn't exist";
        }
        $stmt->close(); // close statement
        $conn->close(); // close connection
    } else {
        echo "Username or password not provided.";
    }
}
?>