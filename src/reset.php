<?php
    session_start();
    require 'dbconfig.php';
    $email= $_SESSION['email'];
    error_reporting(0);
    $show="";
    $message="";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/forgetpass.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="main-wrapper">
        <center>
        <div class="outer">
        
                
                <h3>Enter Password Here</h3>
                <h4 style="color: red; font-family: 'Roboto', sans-serif;"><?php echo $show;?></h4>
                <h4 style="color: green;"><?php echo $message;?></h4>
                    <div class="form">
                        <form action="reset.php" method="post" id="step-1">
                        <i class="fa fa-key" aria-hidden="true"></i><input type="password" name="password" placeholder="Enter Password" required autofocus><br><br>
                        <i class="fa fa-key" aria-hidden="true"></i><input type="password" name="re-password" placeholder="Re-enter Password" required><br><br>
                            <input type="submit" name="submit" value="SUBMIT" class="btn1">
                            
                        </form>    
                    </div>

                
        </div>
        </center>
    </div>    
<?php
    if(isset($_POST['submit']))
    {
        $pass=$_POST['password'];
        $re_pass=$_POST['re-password'];

        if($pass==$re_pass)
        {
            // echo $_SESSION['email'];
            // echo "both are same ";
            // UPDATE login_details set login_details.password='chaitanya123' WHERE A_id=(SELECT id FROM admin WHERE email='tejashatle3@gmail.com' )
            $sql="select id FROM admin where email='$email'";
            $data=mysqli_query($con,$sql);

            if($data -> num_rows > 0)
            {
                while($row= $data -> fetch_assoc())
                {
                    $row_id=$row['id'];
                    // echo "row id is".$row_id;
                    $query="update login_details set password='$pass' where A_id='$row_id'";
                    $res=mysqli_query($con,$query);

                    if($res)
                    {
                            
                            header('location:login.php');
                    }

                        else
                    {
                            $show="Record updatation failed."; 
                    }
                }
              
            }

            else
            {
                $show="There is no such data in database. ";
            }

        }    

        else
        {
            $show="Password and Re-type Password are not matching. ";
        }
    }

    else
            {
                $show="Something went wrong.";
            }

?>
</body>
</html>