<?php
    require 'dbconfig.php';
    error_reporting(0);
    $success="";
    $error="";

    
    require 'dbconfig.php';
    if($_POST['submit'])
    {
        $tbid=$_POST['tbid'];
        $tbdc=$_POST['tbdata_collection'];
        $tbdesc=$_POST['tbdesign'];
        $tbprin=$_POST['tbprinting'];
        $tbdel=$_POST['tbdelivery'];

        $query="update work_tracing_bar set data_collection='$tbdc' , designing='$tbdesc' ,printing='$tbprin', delivery='$tbdel' where id='$tbid'";
        $data=mysqli_query($con,$query);

        if($data)
        {
            $success= "record updated successfully";
        }

        else
        {
            $error="record can not updated successfully";
        }
    }

    else
    {
        $success= "Click on update button to save the changes.";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/progressbar.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/customerphp.css">
    <title>Document</title>
</head>
<body>
    
    <div class="main">
        <h3 style="color:green; background:#a5fdb3;"><?php echo $success; ?></h3>
        <h3 style="color:red; background:#ff8787;"><?php echo $error; ?></h3>
        <br><br>
        <div class="form">
            <form action="" method="post">
               1) Is Data Collection done?<br>
                <input type="text" name="tbid" value="<?php echo $_GET['id']; ?>" ><br><br>
                
                2) Is Data Collection done?<br>
                <input type="text" name="tbdata_collection" value="<?php echo $_GET['dc']; ?>" placeholder="Enter yes/no"><br><br>
            
                3) Is Designing done?<br>
                <input type="text" name="tbdesign" value="<?php echo $_GET['des']; ?>" placeholder="Enter yes/no"><br><br>
            
                4) Is Printing done?<br>
                <input type="text" name="tbprinting" value="<?php echo $_GET['print']; ?>" placeholder="Enter yes/no"><br><br>
            
                5) Is Delivery done?<br>
                <input type="text" name="tbdelivery" value="<?php echo $_GET['del']; ?>"placeholder="Enter yes/no"><br><br>

                <input type="submit" name="submit" value="UPDATE" class="btn1">
                
            </form>    
        </div>
    </div>

<?php

?>

    
</body>
</html>