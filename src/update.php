
<?php include('php/backend_Adminnavbar.php'); 



?>

<?php

include 'connect.php';

    $id = $_GET['updateid'];
    $sql="Select * from `customers` where id=$id";
    $result = mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);

    $id=$row['id'];
    $username=$row['username'];
    $password=$row['password'];
    $first_name=$row['first_name'];
    $last_name=$row['last_name'];
    $address=$row['address'];
    $city=$row['city'];
    $zip=$row['zip'];
    $DriverL=$row['DriverL'];
    $SSN=$row['SSN'];

if(isset($_POST['submit']))
{
    $id=$_POST['id'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $zip=$_POST['zip'];
    $DriverL=$_POST['DriverL'];
    $SSN=$_POST['SSN'];

    
    
    $sql="update `customers` set id= $id,username='$username',password='$password',first_name='$first_name',last_name ='$last_name',address='$address',city='$city',zip='$zip',DriverL='$DriverL',SSN='$SSN'
        where id=$id";
    
    $result = mysqli_query($con,$sql);
    if($result)
    {
        header("location:Adminpage.php");
    }
    else{
        die(mysqli_error($con));
    }
    
}
    



  




   

?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"

  </head>
  <body>

<div class= "container my-5">


<form method = "post" >

  <div class="form-group">
    <label>ID</label>
    <input type="text" class="form-control"
    placeholder=""
    name="id" autocomplete ="off" value= <?php echo $id;?>>

  </div>
  
<div class="form-group">
  <label>Username</label>
  <input type="text" class="form-control"
  placeholder=""
    name="username" autocomplete ="off" value= <?php echo $username;?>>
</div>

<div class="form-group">
  <label>Password</label>
  <input type="text" class="form-control"
  placeholder=""
    name="password"autocomplete ="off" value= <?php echo $password;?>>
</div>

<div class="form-group">
  <label>Name</label>
  <input type="text" class="form-control"
  placeholder=""
    name="first_name"autocomplete ="off" value= <?php echo $first_name;?>>
</div>
<div class="form-group">
  <label>LastName</label>
  <input type="text" class="form-control"
  placeholder=""
    name="last_name"autocomplete ="off" value= <?php echo $last_name;?>>
</div>



<div class="form-group">
  <label>Address</label>
  <input type="text" class="form-control"
  placeholder=""
    name="address"autocomplete ="off" value= <?php echo $address;?>>
</div>

<div class="form-group">
  <label>City</label>
  <input type="text" class="form-control"
  placeholder=""
    name="city" autocomplete ="off" value= <?php echo $city;?>>
</div>

<div class="form-group">
  <label>Zip</label>
  <input type="text" class="form-control"
  placeholder=""
    name= "zip"autocomplete ="off" value= <?php echo $zip;?>>
</div>

<div class="form-group">
  <label>DriverL</label>
  <input type="text" class="form-control"
  placeholder=""
    name="DriverL"autocomplete ="off" value= <?php echo $DriverL;?>>
</div>
  
<div class="form-group">
  <label>SSN</label>
  <input type="password" class="form-control"
  placeholder=""
  name="SSN"autocomplete ="off" value= <?php echo $SSN;?>>
</div>
  <button type="submit" class="btn btn-primary" name ="submit"> Update</button>
</form>

</<div


  </body>
</html>

