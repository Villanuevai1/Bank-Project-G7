<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];


        $correctUsername = 'admin';
        $correctPassword = 'password123';

        if ($username == $correctUsername && $password == $correctPassword)
        {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("Location: /homepage.php");
            exit();
        }
        else if($username!=NULL){
            echo "Password incorrect";
        }
        else {
        echo "Username or password not provided.";
        }
    }
}
?>

