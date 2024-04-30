<html>

<head>
    <script src="../js/form-validation.js"></script>
    <title>Create an Account at Form Bank</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body {
            background: lightgray;
        }

        .container {
            width: 500px;
            margin: 50px auto;
            border: 3px solid black;
            border-radius: 5px;
            padding: 20px;
            background-color: lightblue;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }

        .button {
            background-color: #30a6e6;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .button:hover {
            background-color: #34495e;
        }

        .show-password {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>

<body>
<div class="container">
    <h1>Create Your Form Bank Account</h1>
    <!--onsubmit="return validateForm()"-->
    <form method="post" action="php/process.php" onsubmit="return validateForm()">

        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" class="input-field" required>
            <span class="error" id="first_name_error"></span>
        </div>

        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" class="input-field" required>
            <span class="error" id="last_name_error"></span>
        </div>

        <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input type="tel" id="phone_number" name="phone_number" class="input-field" maxlength="10" required>
            <span class="error" id="phone_number_error"></span>
        </div>
        <!--added-->
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" class="input-field" maxlength="20" required>
            <span class="error" id="address_error"></span>
        </div>

        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" id="city" name="city" class="input-field" maxlength="20" required>
            <span class="error" id="city_error"></span>
        </div>

        <div class="form-group">
            <label for="zip">Zip Code:</label>
            <input type="tel" id="zip" name="zip" class="input-field" maxlength="5" required>
            <span class="error" id="zip_error"></span>
        </div>
        <!--end of change-->

        <div class="form-group">
            <label for="SSN">Social Security Number:</label>
            <!--changed name to SSN-->
            <input type="tel" id="SSN" name="SSN" class="input-field" maxlength="9" required>
            <span class="error" id="SSN_error"></span>
        </div>

        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" class="input-field" required>
            <span class="error" id="username_error"></span>
        </div>

        <div class="form-group show-password">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="input-field" required>
            <!--<i class="password-toggle fas fa-eye-slash"></i>-->
            <span class="error" id="password_error"></span>
        </div>

        <button type="submit" class="button">Create Account</button>
    </form>
</div>

<script src="../js/form-validation.js"></script>
<script src="../js/ssn-masking.js"></script>
</body>