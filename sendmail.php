
<!-- */ -->
<html>
<head>
</head>
<body onload="refreshCapt()">
	    
<form action="" method="post" id="step-1">
	<input readonly id="dispno" class="dispno" name="code" value="<?php echo $captchanumber ?>"/><br>
    Email :<input type="email" name="email" required title="enter your email address"><br>
    <button type="submit" id="subbtn" name="submit">send</button>
</form>
<!-- <form action="sendmail.php" method="post" id="step-1">
	<input hidden id="dispno" class="dispno" name="code" value="<?php echo $captchanumber ?>"/><br>
    Email :<input type="email" name="email" required title="enter your email address"><br>
    <button type="submit" id="subextbtn" name="subextbtn">check</button>
</form> -->

    
</body>
</html>
