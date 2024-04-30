
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

    <h1><center>checking account creation</h1>


    <form action="backend_checking.php" method="post">

<h3>name of account?: <input type="text" name="accountname"></h3>

        <h3>how much would you like to add?: <input type="text" name="balance"></h3>


        <h3>create pin (4 number): <input type="password" name="pin" id="pinInput">  <button type="button" id="togglePassword">Show PIN</button></h3>


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










