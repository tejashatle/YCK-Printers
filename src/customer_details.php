<?php
    if(isset($_GET['success']) && $_GET['success']==1 )
    {
        echo "<p style='color : red;background: #ff8787;text-align:center;height: 30px;font-size: 20px; margin-bottom: 20px;'>Record has been deleted.</p>";
    }
?>
<?php

    require 'dbconfig.php';
    error_reporting(0);
    if(isset($_POST['submit']))
    {
        
        $name=$_POST['cust_name'];
        $cont=$_POST['cust_cont'];
        $email=$_POST['cust_email'];
        $addr=$_POST['cust_addr'];
        $work=$_POST['cust_work'];
        $deadline=$_POST['cust_deadline'];
        
        $query="insert into customer values(NULL,'$name','$cont','$email','$addr','$work','$deadline')";
        $query_run = mysqli_query($con,$query);

        if ($query_run)
        {
            echo '<script> alert("Successfully inserted one record.") </script>';
            $sql= "Select id from customer";
            $result= $con-> query($sql);

                    if($result-> num_rows > 0)
                    {
                        while ($row = $result -> fetch_assoc())
                        {
                            $custid=$row["id"];    
                        }
                    }        
            echo "<p style='color : green;background: #a5fdb3;text-align:center;height: 30px;font-size: 20px;margin-bottom: 20px;'>Customer ID is ".$custid.". This can be later used to insert a record in Work Tracing Bar Table.</p>";        
        }

        else
        {
            echo '<script> alert("Record is not inserted.") </script>';
            
        }

    }




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cusotmer Details</title>
    <link rel="stylesheet" type="text/css" href="../css/customerphp.css">
</head>
<body>    
        <center><h1>Edit Customer</h1></center>     
        <center>
        <div class="form">
            <form action="customer_details.php" method="post" class="cust_form">
                <input type="text" name="cust_name" placeholder="Enter Customer Name" required >
                <input type="text" name="cust_cont" placeholder="Enter Customer Contact" required>
                <input type="email" name="cust_email" placeholder="Enter Customer Email" required><br><br>
                <input type="text" name="cust_addr" placeholder="Enter Customer Address" required>
                <input type="text" name="cust_work" placeholder="Enter Customer Work" required>
                <input type="text" name="cust_deadline" placeholder="Deadline Date Format:YYYY/MM/DD" required><br><br>
                <input type="submit" name="submit" value="Submit Details" class="btn1">
                <input type="reset" name="reset" value="Reset Form" class="btn2">
            </form>   
        </div> 
        </center>
    </div>

    
    <div class="main-wrapper">
        <center>
        <div class="table" >
            <table border="1">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Work</th>
                    <th>Deadline</th>
                    <th colspan="2">Operations</th>
                </tr>   
                <?php
                    require 'dbconfig.php';

                    $sql= "Select id,name,contact,email,address,work,deadline from customer";
                    $result= $con-> query($sql);

                    if($result-> num_rows > 0)
                    {
                        while ($row = $result -> fetch_assoc())
                        {
                            echo "<tr>
                                    <td>". $row["id"] ."</td>
                                    <td>". $row["name"] . "</td>
                                    <td>". $row["contact"]."</td>
                                    <td>". $row["email"]."</td>
                                    <td>". $row["address"]."</td>
                                    <td>".$row["work"]."</td>
                                    <td>".$row["deadline"]."</td>
                                    <td><a href='customerupdate.php?id=$row[id]&nm=$row[name]&contno=$row[contact]&eml=$row[email]&addr=$row[address]&wr=$row[work]&dl=$row[deadline]' class='edit-btn'> Edit</a></td>
                                    <td><a href='customerdelete.php?id=$row[id]' class='delete-btn' onclick='return checkdelete()'>Delete</a></td>
                                  </tr>";
                        }
                        echo"</table><br><br><br>";    
                    }
                    else
                    {
                        echo "<p style='color : red;background: #ff8787;text-align:center;height: 30px;font-size: 20px; margin-bottom: 20px;'>Nothing to show in database.Insert record using above form.</p>";
                        
                    }

                    $con -> close();
                ?>
            
        <!-- <button onclick="wholepage()">Print</button> -->


    
        </div>

        <script>
        function checkdelete()
        {
            return confirm('Are you sure that you want to delete the data????');
        }
        </script>
      
      
        <!-- <script>
            function wholepage()
            {
                window.print();
            }
        </script> -->
</body>
</html>