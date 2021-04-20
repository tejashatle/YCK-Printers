<?php
    session_start();
    $email=$_SESSION['email'];
    error_reporting(0);
    $success="";
    $fail="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/forgetpass.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="main-wrapper">
        <div class="outer">
            <center>
            <h3>Enter valid OTP(One Time Password). </h3>
            <h4 style="color: red; font-family: 'Roboto', sans-serif;"><?php echo $fail;?></h4>
            <h4 style="color: green; "><?php echo $success;?></h4>
            <div class="form">
                <form action="OTP.php" method="post" id="step-1">
                    <input type="text" name="otp" placeholder="Enter OTP" autofocus><br><br>
                    <input type="submit" name="submit" value="VERIFY"  class="btn1">
                    <input type="submit" name="resend" value="RESEND OTP" class="btn2">
                </form>    
            </div>
            </center>
        </div>    
</div>
<?php
    if(isset($_POST['submit']))
    {
        $OTP = $_POST['otp'];
        if($OTP == $_SESSION["code"])
        {
            $success= " matching";
            header('location:reset.php');
        }
        else
        {
            $fail= "not matching";
        }
    }

    else
    {
        $fail= " something went wrong.";
    }

     
    if(isset($_POST['resend']))
    {
        header('location:forgetpass.php');
    }
?>


    
</body>
</html>