<?php

    require 'dbconfig.php';
    $result="";
    $error="";
    if(isset($_POST['submit']))
    {
        
        $name=$_POST['name'];
        $email=$_POST['email'];
        $contact=$_POST['contact'];
        $subject=$_POST['subject'];
        $message=$_POST['message'];
        

        $contact_length = strlen((string)$contact);
        
        if( !($name=='') && !($email=='') && !($contact=='') &&!($subject=='') &&!($message=='') )
        { 
            if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$name) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$contact) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$subject) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$message))
            {
                $error="Name OR subject OR Message is invalid .";
            }
            
            else
            {
            if($contact_length == 10)
            {
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
            //chitrakruti260999@kokanratna.epizy.com
            $mail->setFrom($_POST['email'],$_POST['name']);
            $mail->addAddress('tejashatle3@gmail.com'); // receiver
            $mail-> addReplyTo($_POST['email'],$_POST['name']);

            $mail->isHTML(true);
            $mail->Subject='Subject:'.$_POST['subject'];
            $mail->Body='<h1 align=center>Name :'.$_POST['name'].'<br>Contact: '.$_POST['contact'].'<br>Email: '.$_POST['email'].'<br>Message:'.$_POST['message'].'</h1>';

                if(!$mail->send())
                {
                    $error="Something went wrong.Please try again.";
                }

                else
                {
                    $result="Thanks ".$_POST['name'].", for contacting us.We'll get back to you soon!";

                
                    $query="insert into sent_records values(NULL,'$name','$email','$contact','$subject','$message')";
                    $query_run=mysqli_query($con,$query);

                    if($query_run)
                    {
                    
                    }

                    else
                    {
                        $error="Something went wrong could not inserted.";
                    }

                
                }
            
            
            }

            
            else
            {
                $error="Contact number is not valid";
            }

            }
            
   
    
        }

        else
        {
            $error="Fields empty";
        }
    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../images/logo.png" type="image/png">
    <link rel="stylesheet" href="../css/contact.css">
    <title>Document</title>
   
</head>
<body>
    <div class="main-wrapper">
        <h2>Quick Contact Form</h2>
        <h3 style="color:green;"><?php echo $result; ?></h3>    
        <h3 style="color:red;"><?php echo $error; ?></h3>    
        <center>
                
            <div class="form" name="myForm">
                <form action="contact.php" method="POST" class="main-form">
                    <input type="text" name="name" placeholder="NAME" ><br><br>
                    <input type="email" name="email" placeholder="EMAIL" ><br><br>
                    <input type="number" name="contact" placeholder="CONTACT" maxlength="10"><br><br>
                    <input type="text" name="subject" placeholder="SUBJECT" ><br><br>
                    <textarea name="message" placeholder="MESSAGE" class="msg"></textarea><br><br>
                    <button name="submit" ><i class="fa fa-paper-plane" aria-hidden="true"></i>SEND</button>
                </form>
            </div>
            </center>
    </div>
</body>
</html>