<html>
<head>
    <title> Processing </title>
    <style>
        body {
            background-color: lightgray;
        }
        .error-message {
            color: red;
        }

        .good-message{
            color:green;
        }
    </style>
</head>
<body>
    <h1> Processing...</h1>
    <?php
    if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["address"]) && isset($_POST["city"])&& isset($_POST["zip"])&& isset($_POST["DriverL"])&& isset($_POST["SSN"])) 
    {
        if (!empty($_POST["username"]) && !empty($_POST["password"]) && 
            !empty($_POST["address"]) && !empty($_POST["city"])&& !empty($_POST["zip"])&& !empty($_POST["DriverL"])&& !empty($_POST["SSN"])) 
        {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $address = $_POST["address"];
            $city = $_POST["city"];
            $zip = $_POST["zip"];
            $driver_license = $_POST["DriverL"];
            $ssn = $_POST["SSN"];

            // Create connection
            $conn = mysqli_connect("localhost", "root", "", "users");

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Check if username already exists
            $check_query = "SELECT * FROM customers WHERE username = '$username'";
            $check_result = mysqli_query($conn, $check_query);

            if (mysqli_num_rows($check_result) > 0) {
                echo "<div class='error-message'> Error: Username already exists. <br> <img src='giphy1.gif' alt='Empty Fields GIF'> </div>";

                //nned ti fix the links
                echo "<a href='registration.php'>Redirecting to registration</a>";

            } else {
                // Register user
                $sql = "INSERT INTO customers (username, password, address, city, zip, DriverL, SSN) VALUES ('$username', '$password', '$address', '$city', '$zip', '$driver_license', '$ssn')";
                $results = mysqli_query($conn, $sql);

                if ($results) {
                    echo "<div class='good-message'> SUCCESS: User has been added. <br> <img src='giphy2.gif' alt='Empty Fields GIF'> </div>";  

                    //need to fix the link      
                    echo "<a href='login.php'> CLICK HERE for login </a>";
       
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            }
            mysqli_close($conn); // Close connection
        } else {
            echo "<div class='error-message'> Error: Username, password, address, city, zip, driver's license number, or SSN is empty. <br> <img src='giphy.gif' alt='Empty Fields GIF'> </div>";
                                //need to fix the link      
            echo "<a href='registration.php'> Redirecting to registration</a>";

        }
    } else {
        echo "Error: Form was not submitted.";
        //need to fix the link      
        echo "<a href='registration.php'>Product Redirecting to registration </a>";
    }
    ?>
</body>
</html>
