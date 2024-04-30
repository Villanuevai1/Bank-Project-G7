<html lang="en">
<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatibale " content="IE=edge">
<meta name ="viewport" content= "width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<title> Account Overview  </title>


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



<br>
<br>


<body>
        <h1 class="borderexample">
        <center>Manage Accounts</center></h1>

<br>
<h3 align="right">  <a href= "#"> logout</a>  </h3>


    <nav class="dropdownmenu">
        <ul>
            <li>
                <a href="#">Accounts</a>
                 <ul class="submenu">
                     <li><a href="account_overview.php">Account overview</a></li>
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



  


<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><center>Open An Account</h5>
        <p class="card-text"><center>Choose an account that fits your needs. Open an account today.</p>
        <a href="checking.php" class="btn btn-primary">checkings</a>
                <a href="#" class="btn btn-primary">savings</a>

        <a href="#" class="btn btn-primary">credit card</a>

  

      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><center>Close An Account</h5>
        <p class="card-text"><center>OH NO! We are sad to see you go. </p>
        <a href="#" class="btn btn-primary"><center>Close An Account</a>

      </div>
    </div>
  </div>
</div>

	




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>



</html>





