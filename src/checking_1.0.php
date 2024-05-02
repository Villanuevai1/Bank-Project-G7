<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Checking Account Creation</title>
    <style>
        body {
            background-color: silver;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 350px;
            margin: 100px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            color: #183C67;
        }

        form {
            margin-top: 20px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #008000;
            color: #fff;
            border: none;
            padding: 15px 0;
            width: 100%;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }

        input[type="submit"]:hover {
            background-color: #005000;
        }

        #togglePassword {
            background-color: transparent;
            color: blue;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 14px;
            margin-right: 2px;
            text-decoration: underline;
            outline: none;
        }

        #togglePassword:hover {
            color: #005000;
        }
    </style>
</head>

<body>
    <header>
        <img src="logo_transparent.png">
    </header>

    <div class="container">
        <h2>Checking Account Creation</h2>
        <form action="backend_checking.php" method="post">
            <label style="color: #333;" for="accountname"><b>Account Name:</b></label>
            <input type="text" name="accountname" id="accountname" required>

            <label style="color: #333;" for="balance"><b>Initial Balance: </b></label>
            <input type="text" name="balance" id="balance" required>

            <label style="color: #333;" for="pin"><b>Create PIN (4 digits): </b></label>
            <input type="password" name="pin" id="pinInput" maxlength="4" required>
            <span id="togglePassword">Show PIN</span>

            <input type="submit" value="Register">
        </form>
    </div>

    <script>
        const toggle = document.getElementById('togglePassword');
        const pinInput = document.getElementById('pinInput');

        toggle.addEventListener('click', function() {
        // Toggle between password and text type on click
            if (pinInput.type == "password") {
                pinInput.type = "text";
                toggle.textContent = "Hide PIN";
            } else {
                pinInput.type = "password";
                toggle.textContent = "Show PIN";
            }
        });
    </script>

</body>

</html>
