<?php
    require 'dbconfig.php';
    error_reporting(0);
    $success="";
    $error="";

    if($_POST['submit'])
    {
        $cid=$_POST['cust_id'];
        $cname=$_POST['cust_name'];
        $ccontact=$_POST['cust_contact'];
        $cemail=$_POST['cust_email'];
        $caddr=$_POST['cust_addr'];
        $cwork=$_POST['cust_work'];
        $cdl=$_POST['cust_deadline'];
        
        $query = "update customer set name='$cname' , contact='$ccontact' , email='$cemail' ,address='$caddr' ,work='$cwork', deadline='$cdl' where id='$cid' ";
        $data=mysqli_query($con,$query);
        if($data)
        {
            $success="record updated successfully";
        }
        
        else
        {
            $error="record not updated ";
        }


    }

    else
    {
        $success="Make the changes and Click on update button to save changes";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/customerphp.css">
    <title>Document</title>
</head>
<body>
        <h3 style="color: green; background:#a5fdb3;"><?php echo $success;?></h3>
        <h3 style="color:red; background:#ff8787;"><?php echo $error;?></h3>
        <br><br>
            <form action="" method="post" class="cust_form">
            <input type="text" name="cust_id" value="<?php echo $_GET['id']; ?>" >
                <input type="text" name="cust_name" placeholder="Enter Customer Name" value="<?php echo $_GET['nm']; ?>" required >
                <input type="text" name="cust_contact" placeholder="Enter Customer Contact" value="<?php echo $_GET['contno']; ?>" required>
                <input type="email" name="cust_email" placeholder="Enter Customer Email" value="<?php echo $_GET['eml']; ?>" required><br><br>
                <input type="text" name="cust_addr" placeholder="Enter Customer Address" value="<?php echo $_GET['addr']; ?>" required>
                <input type="text" name="cust_work" placeholder="Enter Customer Work"  value="<?php echo $_GET['wr']; ?>" required>
                <input type="text" name="cust_deadline" placeholder="Deadline Date Format:YYYY/MM/DD" value="<?php echo $_GET['dl']; ?>"required><br><br>
                <input type="submit" name="submit" value="Update" class="btn1">
            </form>

<?php
?>            
</body>
</html>
