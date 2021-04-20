<?php
    $result="";
    if(isset($_POST['submit'])){
        
        $name=$_POST['name'];
        $email=$_POST['email'];
        $contact=$_POST['contact'];
        $subject=$_POST['subject'];
        $message=$_POST['message'];
        
        require 'PHPMailerAutoload.php';
        //require 'conmain.php';
        $mail = new PHPMailer;
        $mail->SMTPDebug = 4; 
        $mail->isSMTP();      
        $mail-> Host = 'smtp.gmail.com';
        $mail-> Port=587;
        $mail-> SMTPAuth=true;
        $mail-> SMTPSecure='tls';
        $mail-> Username='tejashatle3@gmail.com';
        $mail-> Password= 'tejas123@';

        $mail->setFrom($_POST['email'],$_POST['name']);
        $mail->addAddress('tejashatle3@gmail.com'); // receiver
        $mail-> addReplyTo($_POST['email'],$_POST['name']);

        $mail->isHTML(true);
        //$mail->Subject='From Submssion:'.$_POST['subject'];
        $mail->Body='<h1 align=center>Name :'.$_POST['name'].'<br>Email: '.$_POST['email'].'<br>Message:'.$_POST['message'].'</h1>';

        if(!$mail->send()){
            $result="Something went wrong.Please try again.";
        }

        else{
            $result="Thanks".$_POST['name']."for contacting us.We'll get back to you soon!";
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
    <link rel="stylesheet" href="../css/contact.css">
    <title>Document</title>
</head>
<body>
    <div class="main-wrapper">
        <h2>Quick Contact Form</h2>
        <?php echo $result; ?>    
        <center>
                
            <div class="form">
                <form action="contact.php" method="POST" class="main-form">
                    <input type="text" name="name" placeholder="NAME" ><br><br>
                    <input type="email" name="email" placeholder="EMAIL" ><br><br>
                    <input type="text" name="contact" placeholder="CONTACT" ><br><br>
                    <input type="text" name="subject" placeholder="SUBJECT" ><br><br>
                    <textarea name="message" placeholder="MESSAGE" class="msg"></textarea><br><br>
                    <button name="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>SEND</button>
                </form>
            </div>
            </center>
    </div>
</body>
</html>