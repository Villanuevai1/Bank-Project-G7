<?php
include 'connect.php';




    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];
        
        
        $sql="delete from `customers` where id=$id";
        $result=mysqli_query($con,$sql);
        if($result)
            {
                header('location:Adminpage.php');
            }
        else{
            die(mysqli_error($con));
        }
        
        
        
        
    }

?>

