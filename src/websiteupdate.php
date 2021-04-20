<?php
    require 'dbconfig.php';
    error_reporting(0);
    $success="";
    $error="";

    
    if($_POST['submit'])
    {
        $wid=$_POST['id'];
        $whead=$_POST['head'];
        $wdescr=$_POST['desc'];

        $filename=$_FILES["file"]["name"]; //print_r used to print the array of image gives the name and temporary name. 
         echo "filename is".$filename;
         echo print_r($_FILES);
        $tempname=$_FILES["file"]["tmp_name"]; 
        $folder= "Images/".$filename;
        //echo "foldername is".$folder;

        move_uploaded_file($tempname,$folder);

        $query="update website set head='$whead' , descr='$wdescr' , image='$folder' where id='$wid'";
        $data=mysqli_query($con,$query);

        if($data)
        {
            $success="record updated succesfully";
        }
        else
        {
            $error="record updation unsuccesfully";
        }
    }

    
    else
    {
        $success="Click on update button to save changes";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/customerphp.css">
    <title>Document</title>
</head>
<body>
        <h3 style="color: green; background:#a5fdb3;"><?php echo $success;?></h3>
        <h3 style="color:red; background:#ff8787;"><?php echo $error;?></h3>
        <br><br>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="id"  value="<?php echo $_GET['id']; ?>"required>
        <input type="text" name="head" placeholder="Enter header" value="<?php echo $_GET['head']; ?>" required>
        <input type="text" name="desc" placeholder="Enter description" value="<?php echo $_GET['descr']; ?>" required>
        <!-- <?php echo "<img src='". $_GET["img"] . "' height='100' width='100'/>" ?>    -->
        <input type="file" name="file" accept="image/*" required>
        <br><br>
        <input type="submit" name="submit" value="Submit" class="btn1">
    </form>   
    
<?php
    
?>

</body>
</html>