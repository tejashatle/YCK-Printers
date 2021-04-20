<?php
    
    require 'dbconfig.php';   
    session_start();
    $message="";
    if(isset($_POST['submit']))
        {
            
            
            $username=$_REQUEST['uname'];
            $password=$_REQUEST['pwd'];

            if($username != ' ' && $password != ' ' )
            {
            $query ="select * from login_details where username='$username' AND password='$password'";
            $query_run = mysqli_query($con,$query);

                if(mysqli_num_rows($query_run) > 0)
                {
                
                    
                
                    $row= mysqli_fetch_assoc($query_run);
                    $_SESSION['uname']=$row['username'];
                    $_SESSION['upass']=$row['password'];
                    
                    header('location:Admin_Cpanel.php');
                    
                }

                else
                {
                    $message="Invalid Credintials.";
                }
                
                }

            else
            {
                echo"<script> alert('input fields are empty.');</script>";
            }
        }
            
        if(isset($_POST['back']))
        {
            header('location:../index.php');
        }         

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login Panel</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link rel="stylesheet" type="text/css" href="../css/login_php.css">
    
</head>
<body>
    <div class="main">
        <br><br><br><br>
        <h1>Admin Login Panel</h1>    
            
            <div class="main-form">
                <br><br>
                <h2>Admin Login</h2>
                <p style="margin-top: 20px; color: red;"><?php echo $message; ?></p>
                <form action="login.php" method="POST">
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    <input type="text" name="uname" placeholder="Enter Username" class="txt1" autofocus>
                    <br><br>
                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                    <input type="password" name="pwd" placeholder="Enter Password" class="txt2">
                    <br><br><br>
                    <input type="submit" name="submit" value="Login" class="btn1">
                    <br><br>
                    <input type="submit" name="back" value="Back" class="btn2">
                    <br><br>
                </form>
                <a href="forgetpass.php" class="fp"> Forget Password?</a>
            </div>


    </div>    
</body>
</html>