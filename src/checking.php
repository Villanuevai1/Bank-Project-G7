<?php include('php/backend_navbar.php'); ?>


<html>
<head>
    <title>Checking Account Creation</title>
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
    <h1><center>Checking Account Creation</h1>
    <form action="backend_checking.php" method="post">
        <h3>Username: <input type="text" name="username"></h3>
        <h3>Account Name: <input type="text" name="accountname"></h3>
        <h3>Initial Balance: <input type="text" name="balance"></h3>
        <h3>Create PIN (4 digits): <input type="text" name="pin"></h3>
        <br>
        <input type="submit" value="Create Account">
    </form>
</body>
</html>
