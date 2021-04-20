<?php
    if(isset($_GET['success']) && $_GET['success']==1 )
    {
        echo "<p style='color : red;background: #ff8787;text-align:center;height: 30px;font-size: 20px; margin-bottom: 20px;'>Record has been deleted.</p>";
    }
?>
<!-- <?php

    require 'dbconfig.php';
    
    if(isset($_POST['submit']))
    {
        
        $descr=$_POST['description'];
        $value=$_POST['value'];
        $gross_amt=$_POST['gross_amt'];
        $paid=$_POST['paid'];      
             
        $query="insert into bill values(NULL,'$descr','$value','$gross_amt', now() ,'$paid')";
        $query_run = mysqli_query($con,$query);

        if ($query_run)
        {
            echo "<p style='color : green;background: #a5fdb3;text-align:center;height: 30px;font-size: 20px;margin-bottom: 20px;'>Record inserted successfully.</p>";
        }

        else
        {
            echo "<p style='color : red;background: #ff8787;text-align:center;height: 30px;font-size: 20px; margin-bottom: 20px;'>Record not got inserted.</p>";
            
        }

    }

?> -->
<?php

require 'dbconfig.php';

if(isset($_POST['submit']))
{
    $cust_no=$_POST['cust_num'];
    $invoiceno=$_POST['invnum'];
    $invoicedate=$_POST['invdate'];
    $customer_name=$_POST['customer'];
    $customer_addr=$_POST['addr'];
    $customer_gstn=$_POST['gstn'];
    $customer_statecode=$_POST['statecode'];
    $customer_iocl=$_POST['iocl'];
    $sr_no1=$_POST['srno1'];
    $descr1=$_POST['descr1'];      
    $hsn1=$_POST['hsn1'];      
    $size1=$_POST['size1'];      
    $qty1=$_POST['qty1'];    
    $rate1=$_POST['rate1'];    
    $amount1=$_POST['amount1'];
    $sr_no2=$_POST['srno2'];
    $descr2=$_POST['descr2'];      
    $hsn2=$_POST['hsn2'];      
    $size2=$_POST['size2'];      
    $qty2=$_POST['qty2'];    
    $rate2=$_POST['rate2'];    
    $amount2=$_POST['amount2'];    
    $net_amt=$_POST['net_amt'];
    $sgst=$_POST['sgst'];
    $cgst=$_POST['cgst'];
    $rsword=$_POST['rsword'];  
    $total=$_POST['total'];      
         
    $query="insert into bill_details values(NULL,'$cust_no','$invoiceno','$invoicedate','$customer_name','$customer_addr','$customer_gstn','$customer_statecode','$customer_iocl',
            '$sr_no1','$descr1','$hsn1','$size1','$qty1','$rate1','$amount1','$sr_no2','$descr2','$hsn2','$size2','$qty2','$rate2','$amount2',
            '$net_amt','$sgst','$cgst','$rsword','$total')";
    $query_run = mysqli_query($con,$query);

    if ($query_run)
    {
        echo "<p style='color : green;background: #a5fdb3;text-align:center;height: 30px;font-size: 20px;margin-bottom: 20px;'>Record inserted successfully.</p>";
    }

    else
    {
        echo "<p style='color : red;background: #ff8787;text-align:center;height: 30px;font-size: 20px; margin-bottom: 20px;'>Record not got inserted.</p>";
        
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../images/logo.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="../css/customerphp.css">
    <title>Bill Details</title>

    <style>
            img
    {
        height:130px;
        height:100px;
    }

    th
    {
        text-align: left;
    }

    h2,p
    {
        text-align: center;
        color: blue;
    }

    span
    {
        color: orange;
    }
                
        .display-btn
        {
            height: 30px;
            width: 60px;
            background: #8400ff;
            color: white;
        }

        textarea
        {
            width: 150px;
        }
        
        input[type=text]
        {
            width: 150px;
        }
    </style>    
    <script>
        var netamt=document.getElementById("netamt");
        var sgst= (netamt*9)/100;
        var cgst= (netamt*9)/100;

        document.getElementById("sgst").innerHTML=(sgst);
        document.getElementById("cgst").innerHTML=(cgst);
    </script>    
</head>
<body>
<form action="bill.php" method="POST">
    <table border="2" width="400">
        <tr>
            <th><img src="../images/logo.png"></th>
            <th colspan="6" width="300"><h2>Y.C.K ENTERPRISES</h2> <br><p>Specialist in<span>: Graphic Designing,Printer,computer stationery, Gift,Hardware,Labour Work Painting, Courier & Fire,Fighting,Services & More .</span></p></th>
            
        </tr>    

        <tr>
            <th colspan="7"><center><h3>Tax Invoice</h3></center></th>

        </tr>    

        
        <tr>
            <th width="175" colspan="2">Invoice No.</th>
            <th width="175" colspan="3"><input type="text" name="invnum" placeholder="Enter Invoice no." required ></th>
            <th width="175">Customer Id</th>
            <th width="175"><input type="text" name="cust_num" placeholder="Enter Customer Id." required></th>
        </tr>    

        <tr>
            <th width="175" colspan="2">Invoice Date</th>
            <th width="175" colspan="3"><input type="text" name="invdate" placeholder="Enter Invoice date." required></th>
            <th width="175" ></th>
            <th width="175" ></th>
        </tr>    

        <tr>
            <th colspan="4" >From: YCK Enterprises <br> Address: Room no. 3,rane chawl,Navpada,Marol Naka,A. K. Road,Andheri(E),Mumbai 59 </th>
            
            <th colspan="4" width="350">To:<input type="text" name="customer" placeholder="Enter customer name" required><br> Address: <textarea name="addr" placeholder="Enter customer addr"></textarea></th>
            
        </tr>    

        <tr>
            <th colspan="4" >Mobile No. :9930056612/9223398128</th>
            
            <th colspan="4"><span>GSTN: <input type="text" name="gstn" placeholder="Enter GSTN no." required></span> </th>
            
        </tr>    

        <tr>
            <th colspan="4" >PAN No. :APUPK5409A</th>
            
            <th colspan="4">State Code:<input type="text" name="statecode" placeholder="Enter state code." required></th>
            
        </tr>    

        <tr>
            <th colspan="4" ><span>GST No. :27APUPK5409A12V</span></th>
            
            <th colspan="4">IOCL Vendor Code:<input type="text" name="iocl" placeholder="Enter IOCL" required></th>
            
        </tr>    

        
        <tr>
            <th width="50">Sr.No</th>
            <th width="170">Description</th>
            <th >HSN Code </th>
            <th>Size</th>
            <th>QTY</th>
            <th>Rate</th>
            <th>Amount(Rs.)</th>
        </tr>    

        <tr>
            <th width="50"><input type="text" name="srno1" placeholder="Enter Sr no." required></th>
            <th width="170"><textarea name="descr1" placeholder="Enter description1" required></textarea></th>
            <th ><input type="text" name="hsn1" placeholder="Enter HSN no." required></th>
            <th><input type="text" name="size1" placeholder="Enter size" required></th>
            <th><input type="text" name="qty1" placeholder="Enter qty" required></th>
            <th><input type="text" name="rate1" placeholder="Enter rate" required></th>
            <th><input type="text" name="amount1" placeholder="Enter amount" required></th>
        </tr> 
        
        <tr>
            <th width="50"><input type="text" name="srno2" placeholder="Enter Sr no."></th>
            <th width="170"><textarea name="descr2" placeholder="Enter description2"></textarea></th>
            <th ><input type="text" name="hsn2" placeholder="Enter HSN no."></th>
            <th><input type="text" name="size2" placeholder="Enter size"></th>
            <th><input type="text" name="qty2" placeholder="Enter qty"></th>
            <th><input type="text" name="rate2"  placeholder="Enter rate"></th>
            <th><input type="text" name="amount2" placeholder="Enter amount"></th>
        </tr> 


        <tr>
            <th colspan="6" style="text-align: right;">Net Amount</th>
            <th><input type="text" name="net_amt" placeholder="Enter net amount" id="netamt" required></th>
        </tr>    

        <tr>
            <th colspan="6" style="text-align: right;">SGST 9%</th>
            <th><input type="text" name="sgst" id="sgst" required></th>
        </tr>    

        <tr>
            <th colspan="6" style="text-align: right;">CGST 9%</th>
            <th><input type="text" name="cgst" id="cgst" required></th>
        </tr>    

        <tr>
            <th >Rupees(Word):-</th>
            <th colspan="4"><input type="text" name="rsword" placeholder="Enter amount (words)" width="400px" required></th>
            <th>Total</th>
            <th><input type="text" name="total" placeholder="Enter total amount" required></th>
        </tr>    

        <tr>
            <th >BANK Details <br> Y.C.K Enterprises</th>
            <th colspan="5" >Bank Name: ABC Bank Ltd <br> A/C No.: 05753657587696 </th>
            <th >Branch: XYZ <br> IFSC Code: JSBL065671</th>
            
        </tr>    


        <tr>
            <th colspan="7" style="text-align:right;" height="100">For Y.C.K Enterprises <br><br><br><br><br>Proprietor</th>
            
        </tr> 

        <tr>
            <th colspan="7" style="text-align:center;" ><input type="submit" name="submit" value="submit" class="btn1"></th>
            
        </tr> 
        
    </table>
</form>
    <!-- <div class="main-wrapper">
    <center><h1>Edit Bills</h1></center>
        <center>
            <form action="bill.php" method="post">
                <input type="text" name="description" placeholder="Enter description" required>
                <input type="text" name="value" placeholder="Enter corresponding value" required><br><br>
                <input type="text" name="gross_amt" placeholder="Enter gross amount" required>
                <input type="text" name="paid" placeholder="bill paid or not(yes/no)" required><br><br>
                <input type="submit" name="submit" value="Submit" class="btn1">
                <input type="reset" name="reset" value="Reset" class="btn2">
            </form>
        </center>
    </div> -->
<!-- 
    <div class="main-wrapper2">
        <center>
        <div class="table" >
            <table border="1">
                <tr>
                    <th>Id</th>
                    <th>Description</th>
                    <th>Value</th>
                    <th>Gross Amount</th>
                    <th>Date Time </th>
                    <th>Paid or not</th>
                    <th colspan="3">Operations</th>
                </tr>   
                <?php
                    require 'dbconfig.php';

                    $sql= "Select * from bill";
                    $result= $con-> query($sql);

                    if($result-> num_rows > 0)
                    {
                        while($row = $result -> fetch_assoc())
                        {
                            echo "<tr>
                                    <td>". $row["id"] ."</td>
                                    <td>". $row["description"] . "</td>
                                    <td>". $row["value"]."</td>
                                    <td>". $row["gross_amt"]."</td>
                                    <td>". $row["datetime"]."</td>
                                    <td>". $row["paid_or_not"]."</td>
                                    <td><a href='billupdate.php?id=$row[id]&des=$row[description]&val=$row[value]&g_amt=$row[gross_amt]&dt=$row[datetime]&pon=$row[paid_or_not]' class='edit-btn'> Edit</a></td>
                                    <td><a href='billdelete.php?id=$row[id]' class='delete-btn' onclick='return checkdelete()'>Delete</a></td>
                                    <td><a href='table2.php?id=$row[id]' class='display-btn' >Display Bill</a></td>
                                  </tr>";
                        }
                        echo"</table><br><br><br>";    
                    }
                    else
                    {
                        echo "<p style='color : red;background: #ff8787;text-align:center;height: 30px;font-size: 20px; margin-bottom: 20px;'>Nothing to show in database.Insert record using above form.</p>";
                        echo "";
                    }

                    $con -> close();
                ?>
            
        </div> -->

    <br><br>    
    <div class="main-wrapper2">
        <center>
        <div class="table" >
            <table border="1">
                <tr>
                    <th>Id</th>
                    <th>Cust_ID</th>
                    <th>Invoice no</th>
                    <th>Invoice Date(yy/mm/dd)</th>
                    <th>Customer Date</th>
                    <th>Customer addr</th>
                    <th>GSTN no</th>
                    <th>State code</th>
                    <th>IOCL</th>
                    <th>Sr.no1</th>
                    <th>Descr1</th>
                    <th>HSN1</th>
                    <th>Size1</th>
                    <th>QTY1</th>
                    <th>Rate1</th>
                    <th>Amount1</th>
                    <th>Sr.no2</th>
                    <th>Descr2</th>
                    <th>HSN2</th>
                    <th>Size2</th>
                    <th>QTY2</th>
                    <th>Rate2</th>
                    <th>Amount2</th>
                    <th>Net amt</th>
                    <th>SGST</th>
                    <th>CGST</th>
                    <th>Totalamt(words)</th>
                    <th>Totalamt</th>
                    <th colspan="3">Operations</th>
                </tr>   
                <?php
                    require 'dbconfig.php';

                    $sql= "Select * from bill_details";
                    $result= $con-> query($sql);

                    if($result-> num_rows > 0)
                    {
                        while($row = $result -> fetch_assoc())
                        {
                            echo "<tr>
                                    <td>". $row["id"] ."</td>
                                    <td>". $row["cust_id"] ."</td>
                                    <td>". $row["invoice_no"] . "</td>
                                    <td>". $row["invoice_date"]."</td>
                                    <td>". $row["customer_name"]."</td>
                                    <td>". $row["customer_addr"]."</td>
                                    <td>". $row["customer_gstn"]."</td>
                                    <td>". $row["customer_statecode"] ."</td>
                                    <td>". $row["customer_iocl"] . "</td>
                                    <td>". $row["srno1"]."</td>
                                    <td>". $row["descr1"]."</td>
                                    <td>". $row["hsn1"]."</td>
                                    <td>". $row["size1"]."</td>
                                    <td>". $row["qty1"] ."</td>
                                    <td>". $row["rate1"] . "</td>
                                    <td>". $row["amount1"]."</td>
                                    <td>". $row["srno2"]."</td>
                                    <td>". $row["descr2"]."</td>
                                    <td>". $row["hsn2"]."</td>
                                    <td>". $row["size2"]."</td>
                                    <td>". $row["qty2"] ."</td>
                                    <td>". $row["rate2"] . "</td>
                                    <td>". $row["amount2"]."</td>
                                    <td>". $row["net_amt"]."</td>
                                    <td>". $row["sgst"]."</td>
                                    <td>". $row["cgst"]."</td>
                                    <td>". $row["totalwords"]."</td>
                                    <td>". $row["total"]."</td>
                                    <td><a href='billupdate.php?id=$row[id]&invno=$row[invoice_no]&invdt=$row[invoice_date]&cnm=$row[customer_name]&adr=$row[customer_addr]&gstn=$row[customer_gstn]&stc=$row[customer_statecode]&iocl=$row[customer_iocl]
                                        &sr1=$row[srno1]&des1=$row[descr1]&hsn1=$row[hsn1]&sz1=$row[size1]&qt1=$row[qty1]&rt1=$row[rate1]&amt1=$row[amount1]&sr2=$row[srno2]&des2=$row[descr2]&hsn2=$row[hsn2]&sz2=$row[size2]&qt2=$row[qty2]&rt2=$row[rate2]&amt2=$row[amount2]
                                        &nm=$row[net_amt]&sg=$row[sgst]&cg=$row[cgst]&tw=$row[totalwords]&to=$row[total]' class='edit-btn'> Edit</a></td>
                                    
                                    <td><a href='billdelete.php?id=$row[id]' class='delete-btn' onclick='return checkdelete()'>Delete</a></td>
                                    
                                    <td><a href='table2.php?id=$row[id]&invno=$row[invoice_no]&invdt=$row[invoice_date]&cnm=$row[customer_name]&adr=$row[customer_addr]&gstn=$row[customer_gstn]&stc=$row[customer_statecode]&iocl=$row[customer_iocl]
                                    &sr1=$row[srno1]&des1=$row[descr1]&hsn1=$row[hsn1]&sz1=$row[size1]&qt1=$row[qty1]&rt1=$row[rate1]&amt1=$row[amount1]&sr2=$row[srno2]&des2=$row[descr2]&hsn2=$row[hsn2]&sz2=$row[size2]&qt2=$row[qty2]&rt2=$row[rate2]&amt2=$row[amount2]
                                    &nm=$row[net_amt]&sg=$row[sgst]&cg=$row[cgst]&tw=$row[totalwords]&to=$row[total]' class='display-btn' >Display Bill</a></td>
                                  </tr>";
                        }
                        echo"</table><br><br><br>";    
                    }
                    else
                    {
                        echo "<p style='color : red;background: #ff8787;text-align:center;height: 30px;font-size: 20px; margin-bottom: 20px;'>Nothing to show in database.Insert record using above form.</p>";
                        echo "";
                    }

                    $con -> close();
                ?>
            
        </div>

        
        <script>
        function checkdelete()
        {
            return confirm('Are you sure that you want to delete the data????');
        }
        </script>
</body>
</html>