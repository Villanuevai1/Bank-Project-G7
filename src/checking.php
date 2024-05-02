<?php include('php/backend_navbar.php'); ?>
<html>
<head>
    <!-- Sets the title of the webpage -->
    <title>Checking Account</title>
    <!-- Links the custom CSS for the checking page -->
    <link rel="stylesheet" href="css/checking.css">  
</head>

<body>
    <!-- Page heading -->
    <h1>Checking Account Creation</h1>

    <!-- Form for submitting checking account data to a backend PHP script -->
    <form method="post" action="php/backend_checking.php">
        <!-- Input for account name with 'required' attribute to ensure it is filled -->
        <h3>name of account?: <input type="text" name="accountname" required></h3>
        <!-- Input for initial balance without 'required' attribute-->
        <h3>how much would you like to add?: <input type="text" name="balance"></h3>
        <!-- Input for PIN with 'required' attribute to ensure it is filled -->
        <h3>create pin (4 number): <input type="password" name="pin" id="pinInput"  pattern="\d{4}" required title="PIN must be 4 digits">
        
        <button type="button" id="togglePassword">Show PIN</button>
        </h3>
        <!-- Line break for spacing -->
        <br>
        <!-- Submit button for the form -->
        <input type="submit" value="Register">
    </form>

    <!-- Link to the external JavaScript file -->
    <script src="../js/toggle-pin.js"></script>
</body>

</html>