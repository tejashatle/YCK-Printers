<?php
    
    require 'dbconfig.php';
    error_reporting(0);
    $id=$_GET['id'];
    $query= "delete from website where id='$id'";

    $data=mysqli_query($con,$query);
    if ($data)
    {
        header('location:website.php?success=1');
    }

    else
    {
        echo "record has not been deleted";
    }
?>