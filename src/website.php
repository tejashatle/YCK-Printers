<?php
    if(isset($_GET['success']) && $_GET['success']==1 )
    {
        echo "<p style='color : red;background: #ff8787;text-align:center;height: 30px;font-size: 20px; margin-bottom: 20px;'>Record has been deleted.</p>";
    }
?>

<?php
error_reporting(0);

$con=mysqli_connect("localhost","root","") or die("unable to connect");
mysqli_select_db($con,"yck");


    
if($_POST['submit'])
{
    $head = $_POST['head'];
    $desc = $_POST['desc'];

    
    $filename=$_FILES["upfile"]["name"]; //print_r used to print the array of image gives the name and temporary name.
    $tempname=$_FILES["upfile"]["tmp_name"]; 
    $folder= "Images/".$filename;

    move_uploaded_file($tempname,$folder);

    if($head != ' ' && $desc != ' ' && $filename != ' ')
    {
        $query = "insert into website values (NULL,'$folder','$head' , '$desc')";
        $data = mysqli_query($con,$query);

        if($data)
        {
            echo "<p style='color : green;background: #a5fdb3;text-align:center;height: 30px;font-size: 20px;margin-bottom: 20px;'>Record inserted successfully.</p>";
        }

        else
        {
            echo "<p style='color : red;background: #ff8787;text-align:center;height: 30px;font-size: 20px; margin-bottom: 20px;'>Record not got inserted.</p>";
        }

    }

    else
    {
        echo "<p style='color : red;background: #ff8787;text-align:center;height: 30px;font-size: 20px; margin-bottom: 20px;'>Fill all the fields.</p>";
    }
}
    // echo "<img src='$folder' height='100' width='100' />";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/customerphp.css">
    <link rel="stylesheet" type="text/css" href="../css/websitephp.css">
</head>
<body>
    <center><h1>Edit Website</h1></center>
    <form action="website.php" method="post" enctype="multipart/form-data">
        
        <input type="text" name="head" placeholder="Enter header" required>
        <input type="text" name="desc" placeholder="Enter description" required>
        <input type="file" name="upfile" value="" required>
        <br><br>
        <input type="submit" name="submit" value="Submit" class="btn1">
    </form>   
    
    <div >
            <table border="1" class="table1">
                <tr>
                    <th>Id</th>
                    <th>image</th>
                    <th>Head</th>
                    <th width="250">desription</th>
                    <th colspan="2">Operations</th>
                </tr>   
                <?php
                    require 'dbconfig.php';

                    $sql= "Select id,image,head,descr from website";
                    $result= $con-> query($sql);

                    if($result-> num_rows > 0)
                    {
                        while($row = $result -> fetch_assoc())
                        {
                            echo "<tr>
                                    <td>". $row["id"] ."</td>
                                    <td><img src='". $row["image"] . "' height='100' width='100'/></td>
                                    <td>". $row["head"]."</td>
                                    <td>". $row["descr"]."</td>
                                    <td><a href='websiteupdate.php?id=$row[id]&img=$row[image]&head=$row[head]&descr=$row[descr] ' class='edit-btn'> Edit </a></td>
                                    <td><a href='websitedelete.php?id=$row[id]' class='delete-btn' onclick='return checkdelete()'>Delete</a></td>
                                  </tr>";
                        }
                        echo"</table><br><br><br>";    
                    }
                    else
                    {
                        echo '<script> alert(" Nothing to show in database.") </script>';
                        echo "";
                    }

                    
                ?>
            
        </div>

        
        <script>
        function checkdelete()
        {
            return confirm('Are you sure that you want to delete the data????');
        }
        </script>       
</body>
</html>

