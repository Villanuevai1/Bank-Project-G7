<?php
    $current_page = basename($_SERVER['PHP_SELF']);

    if($current_page != "index.php" && $current_page != 'register.php') {
        include('navbarAdmin.php');
    }
?>
