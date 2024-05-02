<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags for character encoding, browser compatibility, and responsive behavior -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS for styling and grid layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link to custom stylesheet for additional styling -->
    <link rel="stylesheet" href="src/index.css">
     <!-- Title of the webpage -->
    <title>Bank Login</title>
</head>

<body>
    <!-- Main section covering the full height of the viewport, with a custom background gradient -->
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card text-white" style="border-radius: 1rem; background-color: #183C67;"> <!-- changed bg -->
                <!-- Card for the login form -->    
                <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                            <img src="src/images/logo_transparent.png" style="max-width: 300px; height: auto;"> <!-- added logo -->
                            <!-- Login form header -->
                            <h2 class="fw-bold mb-2 pt-5 text-uppercase">Login</h2>
                            <p class="text-white-50 mb-5">Please enter your login and password!</p>

                            <!-- PHP code to handle form submission -->
                            <form action="src/php/backend_index.php" method="post">
                                <!-- Username -->
                                <div class="form-outline form-white">
                                    <input type="text" id="username" name="username" class="form-control form-control-lg" required>
                                    <label for="username" class="form-label">Username</label>
                                </div>
                                <!-- Password -->
                                <div class="form-outline form-white">
                                    <input type="password" id="password" name="password" class="form-control form-control-lg" required>
                                    <label for="password" class="form-label">Password</label>
                                </div>
                                <!-- Submit button -->
                                <button type="submit" class="btn btn-outline-light btn-lg px-5">Login</button>
                            </form>

                            <!-- Link to registration page -->
                            <p class="mb-0">Don't have an account? <a href="src/register.php" class="text-white fw-bold">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS bundle which includes Popper for tooltips and popovers -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
