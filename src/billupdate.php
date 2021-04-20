<?php
    require 'dbconfig.php';
    error_reporting(0);
    $success="";
    $error="";

    
    require 'dbconfig.php';
    if($_POST['submit'])
    {
        $id=$_POST['id'];
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
        
        $query="update bill_details set invoice_no='$invoiceno' , invoice_date='$invoicedate' ,customer_name='$customer_name', customer_addr='$customer_addr',customer_gstn='$customer_gstn' , customer_statecode='$customer_statecode' ,customer_iocl='$customer_iocl',
             srno1='$sr_no1',descr1='$descr1' , hsn1='$hsn1' ,size1='$size1', qty1='$qty1',rate1='$rate1' , amount1='$amount1' ,
             srno2='$sr_no2',descr2='$descr2' , hsn2='$hsn2' ,size2='$size2', qty2='$qty2',rate2='$rate2' , amount2='$amount2' ,
             net_amt='$net_amt',sgst='$sgst' , cgst='$cgst' ,totalwords='$rsword', total='$total' where id='$id'";
        
        $data=mysqli_query($con,$query);

        if($data)
        {
            $success="record updated successfully";
        }

        else
        {
            $error="record can not updated successfully";
        }
    }

    else
    {
        $success="Click on update button to save the changes.";
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
</head>
<body>
<!-- <div class="main-wrapper">
        <center>
            <form action="" method="post">
            <input type="text" name="id" value="<?php echo $_GET['id']; ?> ">
                <input type="text" name="description" placeholder="Enter description" value="<?php echo $_GET['des']; ?> " required>
                <input type="text" name="value" placeholder="Enter corresponding value" value="<?php echo $_GET['val']; ?> " required><br><br>
                <input type="text" name="gross_amt" placeholder="Enter gross amount" value="<?php echo $_GET['g_amt']; ?> " required>
                <input type="text" name="paid" placeholder="bill paid or not(yes/no)" value="<?php echo $_GET['pon']; ?> " required><br><br>
                <input type="submit" name="submit" value="Submit" class="btn1">
                <input type="reset" name="reset" value="Reset" class="btn2">
            </form>
        </center>
</div> -->

<h3 style="color: green; background:#a5fdb3;"><?php echo $success;?></h3>
<h3 style="color:red; background:#ff8787;"><?php echo $error;?></h3>
<br><br>
<form action="" method="POST">
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
            <th width="175" colspan="3"><input type="text" name="invnum" placeholder="Enter Invoice no." value="<?php echo $_GET['invno']; ?> "></th>
            <th width="175">ID</th>
            <th width="175"><input type="text" name="id" placeholder="Enter Invoice no." value="<?php echo $_GET['id']; ?> "></th>
        </tr>    

        <tr>
            <th width="175" colspan="2">Invoice Date</th>
            <th width="175" colspan="3"><input type="text" name="invdate" placeholder="Enter Invoice date." value="<?php echo $_GET['invdt']; ?> "></th>
            <th width="175" ></th>
            <th width="175" ></th>
        </tr>    

        <tr>
            <th colspan="4" >From: YCK Enterprises <br> Address: Room no. 3,rane chawl,Navpada,Marol Naka,A. K. Road,Andheri(E),Mumbai 59 </th>
            
            <th colspan="4" width="350">To:<input type="text" name="customer" placeholder="Enter customer name" value="<?php echo $_GET['cnm']; ?> "><br> Address: <textarea name="addr" placeholder="Enter customer addr"  ><?php echo $_GET['adr']; ?></textarea></th>
            
        </tr>    

        <tr>
            <th colspan="4" >Mobile No. :9930056612/9223398128</th>
            
            <th colspan="4"><span>GSTN: <input type="text" name="gstn" placeholder="Enter GSTN no." value="<?php echo $_GET['gstn']; ?> "></span> </th>
            
        </tr>    

        <tr>
            <th colspan="4" >PAN No. :APUPK5409A</th>
            
            <th colspan="4">State Code:<input type="text" name="statecode" placeholder="Enter state code." value="<?php echo $_GET['stc']; ?> "></th>
            
        </tr>    

        <tr>
            <th colspan="4" ><span>GST No. :27APUPK5409A12V</span></th>
            
            <th colspan="4">IOCL Vendor Code:<input type="text" name="iocl" placeholder="Enter IOCL" value="<?php echo $_GET['iocl']; ?> "></th>
            
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
            <th width="50"><input type="text" name="srno1" placeholder="Enter Sr no." value="<?php echo $_GET['sr1']; ?> "></th>
            <th width="170"><textarea name="descr1" placeholder="Enter description1" ><?php echo $_GET['des1']; ?> </textarea></th>
            <th ><input type="text" name="hsn1" placeholder="Enter HSN no." value="<?php echo $_GET['hsn1']; ?> "></th>
            <th><input type="text" name="size1" placeholder="Enter size" value="<?php echo $_GET['sz1']; ?> "></th>
            <th><input type="text" name="qty1" placeholder="Enter qty" value="<?php echo $_GET['qt1']; ?> "></th>
            <th><input type="text" name="rate1" placeholder="Enter rate" value="<?php echo $_GET['rt1']; ?> "></th>
            <th><input type="text" name="amount1" placeholder="Enter amount" value="<?php echo $_GET['amt1']; ?> "></th>
        </tr> 
        
        <tr>
        <th width="50"><input type="text" name="srno2" placeholder="Enter Sr no." value="<?php echo $_GET['sr2']; ?> "></th>
            <th width="170"><textarea name="descr2" placeholder="Enter description1" ><?php echo $_GET['des2']; ?> </textarea></th>
            <th ><input type="text" name="hsn2" placeholder="Enter HSN no." value="<?php echo $_GET['hsn2']; ?> "></th>
            <th><input type="text" name="size2" placeholder="Enter size" value="<?php echo $_GET['sz2']; ?> "></th>
            <th><input type="text" name="qty2" placeholder="Enter qty" value="<?php echo $_GET['qt2']; ?> "></th>
            <th><input type="text" name="rate2" placeholder="Enter rate" value="<?php echo $_GET['rt2']; ?> "></th>
            <th><input type="text" name="amount2" placeholder="Enter amount" value="<?php echo $_GET['amt2']; ?> "></th>
        </tr> 


        <tr>
            <th colspan="6" style="text-align: right;">Net Amount</th>
            <th><input type="text" name="net_amt" placeholder="Enter net amount" id="netamt" value="<?php echo $_GET['nm']; ?> "></th>
        </tr>    

        <tr>
            <th colspan="6" style="text-align: right;">SGST 9%</th>
            <th><input type="text" name="sgst" id="sgst" value="<?php echo $_GET['sg']; ?> "></th>
        </tr>    

        <tr>
            <th colspan="6" style="text-align: right;">CGST 9%</th>
            <th><input type="text" name="cgst" id="cgst" value="<?php echo $_GET['cg']; ?> "></th>
        </tr>    

        <tr>
            <th >Rupees(Word):-</th>
            <th colspan="4"><input type="text" name="rsword" placeholder="Enter amount (words)" width="400px" value="<?php echo $_GET['tw']; ?> "></th>
            <th>Total</th>
            <th><input type="text" name="total" placeholder="Enter total amount" value="<?php echo $_GET['to']; ?> "></th>
        </tr>    

        <tr>
            <th >BANK Details <br> Y.C.K Enterprises</th>
            <th colspan="5" >Bank Name: ABC Bank Ltd <br> A/C No.: 0576567580007296 </th>
            <th >Branch: XYZ <br> IFSC Code: JSBL5675761</th>
            
        </tr>    


        <tr>
            <th colspan="7" style="text-align:right;" height="100">For Y.C.K Enterprises <br><br><br><br><br>Proprietor</th>
            
        </tr> 

        <tr>
            <th colspan="7" style="text-align:center;" ><input type="submit" name="submit" value="Update" class="btn1"></th>
            
        </tr> 
        
    </table>
</form>
<br><br>
<?php
?>

</body>
</html>