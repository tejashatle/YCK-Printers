<?php
    
    require 'dbconfig.php';
    error_reporting(0);
    $id=$_GET['id'];
    $query= "delete from bill_details where id='$id'";

    $data=mysqli_query($con,$query);
    if ($data)
    {
        header('location:bill.php?success=1');
        
    }

    else
    {
        echo '<script> alert("Record has not been deleted.") </script>';
    }
?>