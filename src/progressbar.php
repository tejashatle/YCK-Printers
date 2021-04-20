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
        $customer_id=$_POST['cust_id'];
        $data_col=$_POST['data_collection'];
        $design=$_POST['design'];
        $print=$_POST['printing'];
        $delv=$_POST['delivery'];
        $query="insert into work_tracing_bar values (NULL,$customer_id,'$data_col','$design','$print','$delv')";
            $query_run = mysqli_query($con,$query);

            if($query_run)
            {
                // Record inserted successfully.
                echo "<p style='color : green;background: #a5fdb3;text-align:center;height: 30px;font-size: 20px;margin-bottom: 20px;'>Record inserted successfully.</p>";        
            }

            else
            {
                // Record not got inserted.
                echo "<p style='color : red;background: #ff8787;text-align:center;height: 30px;font-size: 20px; margin-bottom: 20px;'>Record not got inserted.</p>";
            }
        }

        
    

    else
    {
        // Something went wrong.
        //echo "<p style='color : red;background: #ff8787;text-align:center;height: 30px;font-size: 20px; margin-bottom: 20px;'>Something went wrong.Insert record</p>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/progressbar.css">
    <link rel="stylesheet" type="text/css" href="../css/customerphp.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Work Tracing Bar </title>
</head>
<body>
    <div class="main">
        <center><h1>Edit Progress Bar</h1></center>
        <div class="form">
            <form action="progressbar.php" method="post">
                1) Insert Customer ID that you have got while inserting the customer details. <br>
                <input type="text" name="cust_id" placeholder="Enter customer id." required><br><br>

                2) Is Data Collection done?<br>
                <input type="text" name="data_collection" placeholder="Enter yes/no" required> <br><br>
            
                3) Is Designing done?<br>
                <input type="text" name="design" placeholder="Enter yes/no" required><br><br>
            
                4) Is Printing done?<br>
                <input type="text" name="printing" placeholder="Enter yes/no" required><br><br>
            
                5) Is Delivery done?<br>
                <input type="text" name="delivery" placeholder="Enter yes/no" required><br><br>

                <input type="submit" name="submit" value="SUBMIT" class="btn1" required>
                
            </form>    
        </div>
<br><br>
        <div class="main-table">
            <center>
            <div class="table">
                <table border="1">
                    <tr>
                        <th>Id</th>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Data Collection</th>
                        <th>Designing</th>
                        <th>Printing</th>
                        <th>Delivery</th>
                        <th colspan="2">Operations</th>
                    </tr>

                    <?php
                        require 'dbconfig.php';

                        $sql="SELECT work_tracing_bar.id,work_tracing_bar.cust_id,work_tracing_bar.data_collection,work_tracing_bar.designing,work_tracing_bar.printing,work_tracing_bar.delivery,customer.name FROM work_tracing_bar,customer WHERE work_tracing_bar.cust_id=customer.id ORDER BY work_tracing_bar.id ";
                        $result = $con -> query($sql);

                        if($result -> num_rows > 0)
                        {
                            while($row= $result -> fetch_assoc())
                            {
                                echo "<tr>
                                        <td>" .$row["id"]. "</td>
                                        <td>" .$row["cust_id"]. "</td>
                                        <td>" .$row["name"]. "</td>
                                        <td>" .$row["data_collection"]. "</td>
                                        <td>" .$row["designing"]. "</td>
                                        <td>" .$row["printing"]. "</td>
                                        <td>" .$row["delivery"]. "</td>
                                        <td><a href='progressbarupdate.php?id=$row[id]&dc=$row[data_collection]&des=$row[designing]&print=$row[printing]&del=$row[delivery]' class='edit-btn'> Edit</a></td>
                                        <td><a href='progressbardelete.php?id=$row[id]' class='delete-btn' onclick='return checkdelete()'>Delete</a></td>
                                      </tr>";
                            }
                            echo "</table><br>";
                        }

                        else{
                            echo "<p style='color : red;background: #ff8787;text-align:center;height: 30px;font-size: 20px; margin-bottom: 20px;'>Nothing to show in database.Insert record using above form.</p>";
                        }
                        $con -> close();
                    ?>
                </table>
            </div>
            </center>
        </div>

    </div>

    <script>
        function checkdelete()
        {
            return confirm('Are you sure that you want to delete the data????');
        }
    </script>
</body>
</html>