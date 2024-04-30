<html>

<head>

    <title>Checking Account</title>

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


    <form method="post" action="php/backend_checking.php">
        <!--added required-->
        <h3>name of account?: <input type="text" name="accountname" required></h3>
        <!--added required and min-->
        <h3>how much would you like to add?: <input type="text" name="balance"></h3>

        <!--added required, pattern, title and min-->
        <h3>create pin (4 number): <input type="password" name="pin" id="pinInput"  pattern="\d{4}" required title="PIN must be 4 digits">
        <button type="button" id="togglePassword">Show PIN</button>
        </h3>


        <br>

        <input type="submit" value="Register">
    </form>

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