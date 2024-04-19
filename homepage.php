<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Dashboard</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Arial', sans-serif;
            background: #f4f4f4;
        }

        .sidebar {
            background-color: #004165;
            color: white;
            width: 300px;
            height: 100vh;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .sidebar input[type="text"],
        .sidebar input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
        }

        .sidebar button, .sidebar a.button-link {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            background-color: #0288d1;
            color: white;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            display: block;
        }

        .sidebar a.button-link:hover {
            background-color: #007BFF;
        }

        .sidebar .registration-link {
            color: #ccc;
            font-size: 12px;
            text-decoration: underline;
        }

        .sidebar .registration-link:hover {
            color: #fff;
        }
        .image-container {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;    
        }

.image-container img {
    max-width: 100%;
    height: auto;
}
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Login</h2>
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Sign In</button>
        <button href="register.html" type="submit" >Register New User</button>
    </div>
    <div class="image-container">
        <img src="homeimage.webp" alt="Bank Building">
    </div>
</body>
</html>