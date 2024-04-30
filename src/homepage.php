
<html>

<head>
    <title>Bank Dashboard</title>

    <style>

body {
            background: lightgray;
        }



        .borderexample {
            border-width: 3px;
            border-style: solid;
            border-color: black;
            background-color: lightblue;
        }


        .dropdownmenu ul {
            list-style: none;
            width: 100%;
            text-align: center; /* Center the parent menu */
            padding: 0;
        }

        .dropdownmenu li {
            display: inline-block; /* Display as inline-block */
            position: relative;
        }

        .dropdownmenu a {
            background: #30a6e6;
            color: white;
            display: block;
            font-weight: bold;
            font-size: 13px;
            font-family: 'Poppins', 'sans-serif';
            padding: 15px 55px;
            text-align: center;
            text-decoration: none;
            transition: all 0.25s ease;
        }

        .dropdownmenu li:hover a {
            background: #34495e;
        }

        .dropdownmenu ul.submenu {
            position: absolute;
            left: 50%;
            top: 100%;
            transform: translateX(-50%);
            opacity: 0;
            visibility: hidden;
            list-style: none;
            width: 100%;
            transition: opacity 0.25s ease;
            z-index: 1;
        }

        .dropdownmenu li:hover ul.submenu {
            opacity: 1;
            visibility: visible;
        }

        .dropdownmenu ul.submenu li {
            width: 100%;
        }

        .dropdownmenu ul.submenu a {
            padding: 10px 15px;
        }

        .dropdownmenu ul.submenu a:hover {
            background: #df3b0f;
        }
    </style>
</head>

<body>
    <h1 class="borderexample">
        <center>Dashboard</center></h1>

<br>
<h3 align="right">  <a href= "#"> logout</a>  </h3>


    <nav class="dropdownmenu">
        <ul>
            <li>
                <a href="#">Accounts</a>
                 <ul class="submenu">
                     <li><a href="account_overview.html">Account overview</a></li>
                    <li><a href="#">Transaction History</a></li>
                    <li><a href="manage_account.php"> manage account </a></li>

                 </ul>
            </li>

            <li>
                <a href="#">Pay & Transfer</a>
                <ul class="submenu">
                    <li><a href="#">transfer</a></li>
                    <li><a href="#">view/manage transfer</a></li>
                    <li><a href="#">deposit</a></li>
                </ul>
            </li>

            <li>
                <a href="#">Profile and Settings</a>
                <ul class="submenu">
                    <li><a href="#">Contact Information</a></li>
                    <li><a href="#">Security</a></li>
                    <li><a href="#">Manage Profile</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</body>

<br>
<br>
<br>

 <h2>Hello <?php echo $_SESSION['username']; ?></h2> 


<h2> Hello "user" </h2>

<hr>

<br>


<h3> Personal accounts </h3>

<h3> <a href= "#"> accounts 1:</a> $xxxxxx </h3>
<h3> <a href= "#"> accounts 2:</a> $xxxxxx </h3>
<h3> <a href= "#"> accounts 3:</a> $xxxxxx </h3>


<hr>




</html>




