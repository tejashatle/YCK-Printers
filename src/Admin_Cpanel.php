<?php
    session_start();
    
    error_reporting(0);
    
    if(isset($_POST['logout']))
        {
            session_destroy();
            header('location:login.php');
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../images/logo.png" type="image/png">
    <title>Admin Control Panel</title>
    <link rel="stylesheet" type="text/css" href="../css/ACpanel_php.css">
    
        
</head>
<body>
    <div class="main-wrapper">
        <h1>Admin Cpanel</h1>
        <h3>welcome <?php echo $_SESSION['uname'] ?></h3> 
        <div class="buttons">
            <button type="submit" name="customer" value="Edit Customer" class="btn"  id="btn" onclick="customer_page()">Edit Customer</button>
            <button type="submit" name="bill" value="Edit Bill" class="btn" id="btn" onclick="billing_page()">Edit Bill</button>
            <button type="submit" name="website" value="Edit Website" class="btn" id="btn" onclick="website_page()">Edit Website</button>
            <button type="submit" name="progress" value="Edit Progress Bar" class="btn" id="btn" onclick="progressbar_page()">Edit Progress Bar</button>
            <form action="Admin_Cpanel.php" method="post"><button type="submit" name="logout" value="Logout"  class="btn" onclick="logout()">Logout</button></form>
        </div>
        <center>
        <div id="main-iframe">
            
        </div>
        </center>
    </div>
    <script>
        function customer_page()
        {
            document.getElementById("main-iframe").innerHTML = "<iframe src=\"customer_details.php\" height=\"600px\" width=\"1250\" id=\"diframe\"></iframe>";
        }

        function website_page()
        {
            document.getElementById("main-iframe").innerHTML = "<iframe src=\"website.php\" height=\"600px\" width=\"1250\" id=\"diframe\"></iframe>";
        }

        
        function billing_page()
        {
            document.getElementById("main-iframe").innerHTML = "<iframe src=\"bill.php\" height=\"600px\" width=\"1250\" id=\"diframe\"></iframe>";
        }

        function progressbar_page()
        {
            document.getElementById("main-iframe").innerHTML = "<iframe src=\"progressbar.php\" height=\"600px\" width=\"1250\" id=\"diframe\"></iframe>";
        }

        

        function disable()
        {
            document.getElementById("btn").disable=true;
            alert("hey");
        }
        
        
     
   
    </script>

       <?php

            

        ?>    
</body>
</html>