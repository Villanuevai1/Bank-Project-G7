
<html>

<head>

    <title>Registration</title>

    <style>
        h1 {
            color: darkgreen;
            text-align: center;
        }

        body {
            background-color: lightgray;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
        }

        input[type=button],
        input[type=submit] {
            background-color: blue;
            border: none;
            color: #fff;
            padding: 15px 30px;
            text-decoration: none;
            margin: 0px 2px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: darkblue;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }


        #togglePassword {
            background-color: transparent;
            color: blue;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 14px;
            margin-right: 5px;
            text-decoration: underline;
            outline: none;
            float: right;
        }
    </style>

</head>

<body>
<div class = "container">
    <h1><center>Checking Account Creation</h1>

    <form action="php/backend_checking.php" method="post">


        <label for="accountname">Account Name:</label>
        <input type="text" name="accountname" id="accountname" required>

        <label for="balance">Initial Balance:</label>
        <input type="text" name="balance" id="balance" required>

        <label for="pin">Create PIN (4 Digits):</label>
        <input type="password" name="pin" id="pinInput" maxlength="4" required>
        <span id="togglePassword">Show PIN</span>

        <br>

        <input type="submit" value="Register">
    </form>
</div>
</body>
<script>
    const toggle = document.getElementById('togglePassword');
    const pinInput = document.getElementById('pinInput');

    toggle.addEventListener('click', function() {
        // Toggle between password and text type on click
        if (pinInput.type === "password") {
            pinInput.type = "text";
            toggle.textContent = "Hide PIN";
        } else {
            pinInput.type = "password";
            toggle.textContent = "Show PIN";
        }
    });
</script>
</html>











