<html>


<head>
    <!-- Sets the title of the webpage -->
    <title>Create an Account at Form Bank</title>
    <!-- Links to the Font Awesome library for access to icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Links the custom CSS for the registration page -->
    <link rel="stylesheet" href="css/register.css">    
</head>


<body>
<div class="container">
    <!-- Page heading -->
    <h1>Create Your Form Bank Account</h1>

    <!-- Registration form with client-side validation on submit -->
    <form method="post" action="php/register.php" onsubmit="return validateForm()">
        <!-- First name with inline validation error display -->
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" class="input-field" required>
            <span class="error" id="first_name_error"></span>
        </div>
        <!-- Last name with inline validation error display -->
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" class="input-field" required>
            <span class="error" id="last_name_error"></span>
        </div>
        <!-- Username with inline validation error display -->
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" class="input-field" required>
            <span class="error" id="username_error"></span>
        </div>
        <!-- Password with inline validation error display -->
        <div class="form-group show-password">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="input-field" required>
            <!--<i class="password-toggle fas fa-eye-slash"></i>-->
            <span class="error" id="password_error"></span>
        </div>
        <!-- Phone number with inline validation error display -->
        <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input type="tel" id="phone_number" name="phone_number" class="input-field" maxlength="10" required>
            <span class="error" id="phone_number_error"></span>
        </div>
        <!-- Address with inline validation error display -->
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" class="input-field" maxlength="20" required>
            <span class="error" id="address_error"></span>
        </div>
        <!-- City with inline validation error display -->
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" id="city" name="city" class="input-field" maxlength="20" required>
            <span class="error" id="city_error"></span>
        </div>
        <!-- Zip Code with inline validation error display -->
        <div class="form-group">
            <label for="zip">Zip Code:</label>
            <input type="tel" id="zip" name="zip" class="input-field" maxlength="5" required>
            <span class="error" id="zip_error"></span>
        </div>
        <!-- Driver License with inline validation error display -->
        <div class="form-group">
            <label for="DriverL">Driver License:</label>
            <input type="tel" id="DriverL" name="DriverL" class="input-field" maxlength="9" required>
            <span class="error" id="DriverL_error"></span>
        </div>
        <!-- Social Security Number with inline validation error display -->
        <div class="form-group">
            <label for="SSN">Social Security Number:</label>
            <!--changed name to SSN-->
            <input type="tel" id="SSN" name="SSN" class="input-field" maxlength="9" required>
            <span class="error" id="SSN_error"></span>
        </div>
        

        <!-- Submit button -->
        <button type="submit" class="button">Create Account</button>
    </form>
</div>

<!-- Links the form validation JavaScript file -->
<script src="../js/form-validation.js"></script>
<!-- Links the SSN masking JavaScript file -->
<script src="../js/ssn-masking.js"></script>
</body>