<html>

<head>
    <!-- Sets the title of the webpage -->
    <title>Processing</title>
    <style>
        body { background-color: lightgray; }
        .error-message { color: red; }
        .good-message { color: green; }
    </style>
</head>

<body>
    <!-- Display a message while processing the form submission-->
    <h1>Processing...</h1>

    <?php
        // Check if the form was submitted using POST method
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if all fields are provided and not empty
        $required_fields = ['username', 'password', 'address', 'city', 'zip', 'DriverL', 'SSN', 'first_name', 'last_name', 'phone_number'];
        foreach ($required_fields as $field) {
            if (empty($_POST[$field])) {
                echo "<div class='error-message'>Error: All fields are required. Missing: $field</div>";
                echo "<a href='../register.php'>Redirecting to registration</a>";
                exit; // Stop the script if any field is missing
            }
        }

        $password = $_POST["password"];
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Create connection
        $conn = new mysqli('db', 'user', 'password', 'database');
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if username already exists
        $stmt = $conn->prepare("SELECT username FROM customers WHERE username = ?");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("s", $_POST["username"]);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo "<div class='error-message'>Error: Username already exists.</div>";
            echo "<a href='../register.php'>Redirecting to registration</a>";
            $stmt->close();
            $conn->close();
            exit;
        }

        // Register user
        $stmt = $conn->prepare("INSERT INTO `customers` (`username`, `password`, `address`, `city`, `zip`, `DriverL`, `SSN`, `first_name`, `last_name`, `phone_number`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("ssssssssss", $_POST["username"], $hashed_password, $_POST["address"], $_POST["city"], $_POST["zip"], $_POST["DriverL"], $_POST["SSN"], $_POST["first_name"], $_POST["last_name"], $_POST["phone_number"]);
        if ($stmt->execute()) {
            echo "<div class='good-message'>SUCCESS: User has been added.</div>";
            echo "<a href='../../index.php'>CLICK HERE for login</a>";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
        $conn->close();
        } else {
            echo "<div class='error-message'>Error: No form submission detected.</div>";
            echo "<a href='../register.php'>Redirecting to registration</a>";
        }
    ?>
</body>

</html>
