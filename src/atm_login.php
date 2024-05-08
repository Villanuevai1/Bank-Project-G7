<?php
$logged_in = false;

session_start(); // Start the session


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // create connection
        $conn = mysqli_connect("localhost", "root", "", "users");

        // check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // register user
        $sql = "SELECT password FROM customers WHERE username = '$username'";
        $results = mysqli_query($conn, $sql);

        if ($results) {
            $row = mysqli_fetch_assoc($results);
            if ($row["password"] === $password) {
                $logged_in = true;
                // Set the session username
                      $_SESSION['username'] = $username;
                // Redirect to the ATM page
                header("Location: atm.php");
                exit();
            } else {
                echo "Password incorrect";
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        mysqli_close($conn); // close connection
    } else {
        echo "Username or password not provided.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>ATM Login</title>
    <style>
        body {
            background-color: lightgray;
        }
    </style>
</head>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <div class="form-outline form-white mb-4">
                                        <input type="text" id="username" class="form-control form-control-lg"
                                            name="username" required>
                                        <label class="form-label" for="username">Username</label>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="password" id="password" class="form-control form-control-lg"
                                            name="password" required>
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                                </form>
                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                </div>
                                <div>
                                    <p class="mb-0">Don't have an account? <a href="index.php"
                                            class="text-white-50 fw-bold">Sign Up</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
