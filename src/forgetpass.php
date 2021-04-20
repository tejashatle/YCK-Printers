<?php
    session_start();
    require 'dbconfig.php';
    error_reporting(0);
    $success="";
    $fail="";
    $show="";
    $message="";
    $subject="Verify OTP(One Time Password)";
    $name="Y.C.K Enterprises";


    if(isset($_POST['submit']))
    {
        $email=$_POST['email'];
        $_SESSION['email']=$email;
        $query="select * from admin";

        $result=mysqli_query($con,$query);
        if($result -> num_rows >0)
        {
            
            while($row = $result -> fetch_assoc())
            {
                
                if($row['email'] == $email)
                {
                    
                    
                    $captchanumber = 'MNOPQRSTUVWXYZ1234567890mnopqrstuvwxyz';
                    $captchanumber = substr(str_shuffle($captchanumber), 0, 6);
                    $_SESSION["code"] = $captchanumber;
                    require 'phpmailer/PHPMailerAutoload.php';
                    //require 'phpmailer/conmain.php';
                    $mail = new PHPMailer;
                    //$mail->SMTPDebug = 4; 
                    $mail->isSMTP();      
                    $mail-> Host = 'smtp.gmail.com';
                    $mail-> Port=587;
                    $mail-> SMTPAuth=true;
                    $mail-> SMTPSecure='tls';
                    $mail-> Username='tejashatle3@gmail.com';
                    $mail-> Password= 'Tejashatle123';

                    $mail->setFrom($_POST['email'],$name);
                    $mail->addAddress('tejashatle3@gmail.com'); // receiver
                    $mail-> addReplyTo($_POST['email'],$_POST['name']);

                    $mail->isHTML(true);
                    $mail->Subject='Subject:'.$subject;
                    $mail->Body='<h1 align=center> Email: '.$_POST['email'].'Captchanumber is: '.$captchanumber.'</h1>';

                                        
                    if(!$mail->send()){
                        $show="OTP could not send.Check your connection.";
                    }

                    else{
                        $message="OTP successfully sent ,click on Verify OTP and verify it.";
                        //echo "<script type='javascript/text'>alert('otp== ');<script>";
                        header('location:OTP.php');
                        
                    }
                    
                }
                else
                {
                    $show="Invalid Email Address";
                }
            }
        }
        else
        {
            echo "unsuccessfull";
        }

    }

    
    if(isset($_POST['verify']))
    {
        header('location:OTP.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/forgetpass.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- <script>

        function iframe()
        {
            document.getElementById("main-iframe").innerHTML = "<iframe src=\"customer_details.php\" height=\"600px\" width=\"1250\" id=\"diframe\"></iframe>";
        }
    </script>     -->

</head>
<body>
    <div class="main-wrapper">
        <center>
        <div class="outer">
        
                
                <h3>Enter your valid email address to receive the OTP.</h3>
                <h4 style="color: red; font-family: 'Roboto', sans-serif;"><?php echo $show;?></h4>
                <h4 style="color: green; "><?php echo $message;?></h4>
                    <div class="form">
                        <form action="forgetpass.php" method="post" id="step-1">
                            <input type="email" name="email" placeholder="Enter Email" autofocus><br><br>
                            <input type="submit" name="submit" value="SUBMIT" class="btn1">
                            
                        </form>    
                    </div>

                
        </div>
        </center>
    </div>    
        
</body>
</html>
