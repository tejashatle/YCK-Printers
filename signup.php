<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>
<!DOCTYPE html>
<html>

<title>Sign Up</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<!-- <link rel="icon" href="img/img10.jpg" type="image/jpg"> -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/jsfunc.js"></script>
<style type="text/css">
body 
{
    margin: 0px;
    padding: 0px;
    background: linear-gradient(60deg,#ffeb27,#ff146a);
}
h1
{
    color: white;
}
.form
{
    margin-top: 15px; 
    height: fit-content;
    width: 300px;
    background: white;
    border-radius: 8px;
    text-align: center;
    justify-content: center;
    box-shadow: 6px 8px 20px 0px black;
}
input[type=text],
input[type=password],
input[type=email]
{
    height: 30px;
    width: 250px;
    border-radius: 3px;
    border-color: #32A6FE;
}
input[type=submit]
{
    height: 30px;
    width: 260px;
    background:  white;
    color: #32A6FE;
    font-size: 24px;
    border-color: #32A6FE;
    border-radius: 8px;
}
input[type=submit]:hover
{
    background: #32A6FE;
    color: white;
}
img
{
    heigth: 80px;
    width: 80px;
}
input[type=submit],button{
    height: 30px;
    background:  white;
    color: #32A6FE;
    font-size: 24px;
    border-color: #32A6FE;
    border-radius: 8px;
    cursor: pointer;
}
input[type=submit]:hover{
    background: #32A6FE;
    color: white;
    cursor: pointer;
}
.dispbk{
    pointer-events:none;
}
.dispno{         /*captcha*/
    background: #c6c6c6;
    /*background-image: url("img/bckk.png");*/
    display: inline-block;
    margin: 0;
    padding-right: 6px;
    color: salmon;
    font: bold 25px system-ui;
    /*padding: 20px;*/
    height: 30px;
    width: 34%;
    line-height: 30px;
    pointer-events:none;
}
#cptimg{
    height: 6vh;
    width: 6vh;
}
.refresh{
    color: lime;
    font-size: 6vh;
}
#step-3{
    border: .3vh solid red;
    background-image: url("img/img6.jpeg");
}
</style>
<script type="text/javascript">
function PreviewImage()
{
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("imglink").files[0]);
    oFReader.onload = function (oFREvent)
    {
        document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
};
</script>
<script type="text/javascript">
/*var fno;
function refreshCapt(){
    fno = Math.floor(Math.random()*(9999-1000))+1000;
    document.getElementById("dispno").value = fno;
    Session["code"]=fno;
}
function displayverify(){
    document.getElementById("step-1").style.display = "none";
    document.getElementById("step-3").style.display = "inline-block";

}*/
function ck() {
    var xv=document.getElementById("dispno").value;
    alert("value is "+xv);
}
/*function checkval(){
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
            document.getElementById("submitbtn").click();
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
}*/
/**/
$(document).ready(function() {
//validation function
$('#subextbtn').click(function() {
    var name = $("#name").val();
    var email = $("#email").val();
    var captcha = $("#dispno").val();
    var pwd = $("#pass").val();
    var cpwd = $("#rpass").val();

if (name == '' || email == '' || captcha == ''){
    alert("Fill All Fields");
}
else{
    if (pwd==cpwd) {
        //validating CAPTCHA with user input text
        var dataString = 'captcha=' + captcha;
        $.ajax({
        type: "POST",
        url: "mailer.php",
        data: dataString,
        success: function(html) {
        alert(html);
        }
        });
        }
        else{
            alert("incorrect number");
            document.getElementById("errmsg").innerHTML="* Incorrect Number !";
        }
    }
        });
});
/**/
</script>
<!--  -->
<?php 
$captchanumber = 'MNOPQRSTUVWXYZ1234567890mnopqrstuvwxyz';
$captchanumber = substr(str_shuffle($captchanumber), 0, 6);
$_SESSION["code"] = $captchanumber;
?>
<!-- */ -->
<body onload="refreshCapt()">
    <center>
    <div class="form" id="step-1">
    <h1>Sign Up</h1>
    <form action="./js/mailer.php" id="regifrom" name="regiform" method="post" enctype="multipart/form-data">

    <img id="uploadPreview" src="avtar.png" alt="image">
    <input type="file" id="imglink" name="imglink" accept=".jpg,.jpeg,.png" onchange=PreviewImage();>
    <br>
    DO NOT CHANGE NUMBER HERE: <br>
    <input id="dispno" class="dispno" name="code" value="<?php echo $captchanumber; ?>"/><br>
    <i class="fa fa-user-circle" aria-hidden="true"></i><input type="text" name="name" id="name" placeholder="Enter your full name" required>
    <br> <br>
    <i class="fa fa-lock" aria-hidden="true"></i><input type="text" name="uname" placeholder="Enter your username" required>
    <br><br>
    <i class="fa fa-key" aria-hidden="true"></i><input type="password" name="pass" id="pass" min-length=8 max-length=10 placeholder="Enter your password" title="Must contain at least 1 number and 1 uppercase and 1 special characters(@/#/$/./_)" onblur="pwd_check()" required>
    <br><br>
    <i class="fa fa-key" aria-hidden="true"></i><input type="password" name="rpass" id="rpass"placeholder="Re-Enter your password" min-length=8 max-length=10 onblur="repwd_check()" required>
    <br><br>
    <i class="fa fa-envelope" aria-hidden="true"></i><input type="email" name="email" id="email" placeholder="Enter your email" title="example@sample.com"  accept="\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*" required >
    <br><br><br>
    <a href="signin.html"><input type="submit" id="submitbtn" value="SUBMIT" name="Submit"></a>
    
    </form>
    <input type="button" onclick="ck()" id="submitbtn" value="SUBMIT Mailer" name="subextbtn">
    <!-- <button onclick="displayverify()">Next</button> -->
    </div> 
<!--     <div align="center" class="captcha">
        <div class="dispbk" id="dispbk"><input id="dispno" class="dispno" /></div>
            
        <div class="refresh">
                click here <img style="cursor:pointer;" id="cptimg" onclick='javascript: refreshCapt();' src="img/reload.png">
 to refresh code.</div><br>
            
    </div> -->
    <div id="step-3" hidden>
        <h3>verify Email</h3>
        <div class="refresh">
            <span id="errmsg" style="color:red;font-weight:bold;font-size:20px;color:red;"></span><br>
            enter OTP here send on your email :<br><input type="text" maxlength=6 id="val"><br>
            <button onclick="checkval()" >verify</button>
        </div>
    </div>
	</center>
</html>
</body>