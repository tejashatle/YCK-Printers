<?php
    
    require 'dbconfig.php';
    error_reporting(0);
    $id=$_GET['id'];
    $query= "delete from customer where id='$id'";

    $data=mysqli_query($con,$query);
    if ($data)
    {
        header('location:customer_details.php?success=1');
        
    }

    else
    {
        echo '<script> alert("Record has not been deleted.") </script>';
    }
?>