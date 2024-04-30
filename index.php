<html>

<head>

    <title>Registration</title>

    <style>
        h1 {
            color: darkgreen;
        }

        body {
            background-color: lightgray;
        }

        input[type=button],
        input[type=submit] {
            background-color: darkblue;
            border: none;
            color: #fff;
            padding: 15px 30px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>

</head>

<body>

    <h1><center>Registration</h1>

    <form action="/process.php" method="post">



        <h3>Username: <input type="text" name="username"></h3>

        <h3>Password: <input type="password" name="password"></h3>

        <h3>Address: <input type="text" name="address"></h3>

        <h3>City: <input type="text" name="city"></h3>

        <h3>Zip Code: <input type="text" name="zip"></h3>

        <h3>Driver's License Number: <input type="text" name="DriverL"></h3>

        <h3>Social Security Number (SSN): <input type="text" name="SSN"></h3>

        <br>

        <input type="submit" value="Register">
    </form>

</body>

</html>