<?php
    require 'dbconfig.php';
    $message="";
    $id=$_GET['id'];
    
    $query="delete from work_tracing_bar where id='$id'";
    $data=mysqli_query($con,$query);

    if($data)
    {
        header('location:progressbar.php?success=1');
    }
    else
    {
        echo '<script> alert("Record has not been deleted")</script>';
    }
?>