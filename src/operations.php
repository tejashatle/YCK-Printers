<?php

    require 'dbconfig.php';

    if(isset($_GET['delete']))
    {
        $id= $_GET['delete'];
        $mysqli-> query("Delete from customer where id=$id") or die($mysqli-> error());
        echo '<script> alert("Successfully deleted one record.") </script>';
    }    

?>