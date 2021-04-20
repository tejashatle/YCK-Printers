<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    
if (isset($_POST['submit'])) {
require 'PHPMailerAutoload.php';
require 'conmain.php';

$user=$_POST['email'];
$cod=$_POST['code'];
echo "<br>...your otp is ".$cod."...<br><br>";

$mail = new PHPMailer;
$mail->SMTPDebug = 4;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = usrname;                 // SMTP username
$mail->Password = yedare;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom( username, 'Sender');
$mail->addAddress($user);     // Add a recipient
//$mail->addAddress('telishubham09@gmail.com');               // Name is optional
//$mail->addReplyTo('tejashatle2@gmail.com','top secret');

//$mail->addAttachment('D:/xampp/htdocs/lipik/index.html','lipik.php');         // Add attachments
$mail->isHTML(true);                                  // Set email format to HTML

//$mail->Subject = 'tejas.. ;-)';
$mail->Body    = '<div style="color:blue;border:2px solid yellow;font-size:15px;"><u>Your OTP is '.$cod.' </u><b>from tejas !</b></div>';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo '****Mailer Error: ' . $mail->ErrorInfo;
} else {
    
    echo '<script type="text/javascript"> alert("message has been sent to your email");
    document.getElementById("step-1").style.display = "none";
    document.getElementById("step-3").style.display = "inline-block";</script>';
}
}

if (isset($_POST['subextbtn'])) {
	$user=$_POST['email'];
	$cod=$_POST['code'];
	echo "<br>your email is ".$user."<br>...your otp is ".$cod."...<br><br>";

}
?>
<!--  -->
<?php
// session_start(); 
$captchanumber = 'MNOPQRSTUVWXYZ1234567890mnopqrstuvwxyz';
$captchanumber = substr(str_shuffle($captchanumber), 0, 6);
$_SESSION["code"] = $captchanumber;
?>
<!-- */ -->
<html>
<head>
<script type="text/javascript">
var fno;
// function refreshCapt(){
//     fno = Math.floor(Math.random()*(9999-1000))+1000;
//     document.getElementById("dispno").value = fno;
//     $Session["code"]=fno;
}
function displayverify(){
    document.getElementById("step-1").style.display = "none";
    document.getElementById("step-3").style.display = "inline-block";

}
function checkval(){
    alert("checkval clicked");
    var unme=document.signinform.uname.value;
    var ps=document.signinform.pass.value;
    // var xhttp = new XMLHttpRequest();
    // var url="login.php?uname="+unme+"&pass="+ps;
    var userno=document.getElementById("val").value;
    if (userno==""){
        alert ('fill correct number...');
        document.getElementById("val").focus();
    }
    else{
        if (fno==userno) {
            document.getElementById("errmsg").innerHTML=null;
            alert("number is correct");
            document.getElementById("subbtn").click();
            alert("submit btn clicked");
            // xhttp.open("GET", url, true);
            // xhttp.send();
        }
        else{
            alert("incorrect number");
            document.getElementById("errmsg").innerHTML="* Incorrect Number !";
            document.getElementById("val").value='';
            rndmv();
        }
    }
}
</script>
</head>
<body onload="refreshCapt()">
	    
<form action="sendmail.php" method="post" id="step-1">
	<input readonly id="dispno" class="dispno" name="code" value="<?php echo $captchanumber ?>"/><br>
    Email :<input type="email" name="email" required title="enter your email address"><br>
    <button type="submit" id="subbtn" name="submit">send</button>
</form>
<!-- <form action="sendmail.php" method="post" id="step-1">
	<input hidden id="dispno" class="dispno" name="code" value="<?php echo $captchanumber ?>"/><br>
    Email :<input type="email" name="email" required title="enter your email address"><br>
    <button type="submit" id="subextbtn" name="subextbtn">check</button>
</form> -->

    <div id="step-3" hidden>
        <h3>verify Email</h3>
        <div class="refresh">
            <span id="errmsg" style="color:red;font-weight:bold;font-size:20px;color:red;"></span><br>
            enter OTP here send on your email :<br><input type="text" maxlength=6 id="val"><br><button onclick="checkval()" >verify</button>
        </div>
    </div>

<button onclick="displayverify()">Next</button>
</body>
</html>
<?php session_destroy() ?>