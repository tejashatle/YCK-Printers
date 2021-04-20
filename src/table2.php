<?php
    require 'dbconfig.php'; 
    
    // echo $_GET['id'];
    // echo $_GET['invno'];
    // echo $_GET['invdt'];
    // echo $_GET['cnm'];
    // echo $_GET['adr'];
    // echo $_GET['gstn'];
    // echo $_GET['stc'];
    // echo $_GET['iocl'];
    // echo $_GET['sr1'];
    // echo $_GET['des1'];
    // echo $_GET['hsn1'];
    // echo $_GET['sz1'];
    // echo $_GET['qt1'];
    // echo $_GET['rt1'];
    // echo $_GET['amt1'];
    // echo $_GET['sr2'];
    // echo $_GET['des2'];
    // echo $_GET['hsn2'];
    // echo $_GET['sz2'];
    // echo $_GET['qt2'];
    // echo $_GET['rt2'];
    // echo $_GET['amt2'];
    // echo $_GET['nm'];
    // echo $_GET['sg'];
    // echo $_GET['cg'];
    // echo $_GET['tw'];
    // echo $_GET['to'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Table</title>
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
    </style>
</head>
<body>
    <table border="2" width="700">
        <tr>
            <th><img src="../images/logo.png"></th>
            <th colspan="6" width="300"><h2>Y.C.K ENTERPRISES</h2> <br><p>Specialist in<span>: Graphic Designing,Printer,computer stationery, Gift,Hardware,Labour Work Painting, Courier & Fire,Fighting,Services & More .</span></p></th>
            
        </tr>    

        <tr>
            <th colspan="7"><center><h3>Tax Invoice</h3></center></th>

        </tr>    

        
        <tr>
            <th width="175" colspan="2">Invoice No.</th>
            <th width="175" colspan="3"><?php echo $_GET['invno']; ?></th>
            <th width="175"></th>
            <th width="175"></th>
        </tr>    

        <tr>
            <th width="175" colspan="2">Invoice Date</th>
            <th width="175" colspan="3"><?php echo $_GET['invdt']; ?></th>
            <th width="175" ></th>
            <th width="175" ></th>
        </tr>    

        <tr>
            <th colspan="4" >From: YCK Enterprises <br> Address: Room no. 3,rane chawl,Navpada,Marol Naka,A. K. Road,Andheri(E),Mumbai 59 </th>
            
            <th colspan="4" width="350">To: <?php echo $_GET['cnm']; ?> <br> Address:<?php echo $_GET['adr']; ?></th>
            
        </tr>    

        <tr>
            <th colspan="4" >Mobile No. :9930056612/9223398128</th>
            
            <th colspan="4"><span>GSTN: <?php echo $_GET['gstn']; ?></span> </th>
            
        </tr>    

        <tr>
            <th colspan="4" >PAN No. :APUPK5409A</th>
            
            <th colspan="4">State Code: <?php echo $_GET['stc']; ?></th>
            
        </tr>    

        <tr>
            <th colspan="4" ><span>GST No. :27APUPK5409A12V</span></th>
            
            <th colspan="4">IOCL Vendor Code:<?php echo $_GET['iocl']; ?></th>
            
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
            <th width="50"><?php echo $_GET['sr1']; ?></th>
            <th width="170"><?php echo $_GET['des1']; ?></th>
            <th ><?php echo $_GET['hsn1']; ?></th>
            <th><?php echo $_GET['sz1']; ?></th>
            <th><?php echo $_GET['qt1']; ?></th>
            <th><?php echo $_GET['rt1']; ?></th>
            <th><?php echo $_GET['amt1']; ?></th>
        </tr> 
        
        <tr>
            <th width="50"><?php echo $_GET['sr2']; ?></th>
            <th width="170"><?php echo $_GET['des2']; ?></th>
            <th ><?php echo $_GET['hsn2']; ?></th>
            <th><?php echo $_GET['sz2']; ?></th>
            <th><?php echo $_GET['qt2']; ?></th>
            <th><?php echo $_GET['rt2']; ?></th>
            <th><?php echo $_GET['amt2']; ?></th>
        </tr> 


        <tr>
            <th colspan="6" style="text-align: right;">Net Amount</th>
            <th><?php echo $_GET['nm']; ?></th>
        </tr>    

        <tr>
            <th colspan="6" style="text-align: right;">SGST 9%</th>
            <th><?php echo $_GET['sg']; ?></th>
        </tr>    

        <tr>
            <th colspan="6" style="text-align: right;">CGST 9%</th>
            <th><?php echo $_GET['cg']; ?></th>
        </tr>    

        <tr>
            <th >Rupees(Word):-</th>
            <th colspan="4"><?php echo $_GET['tw']; ?></th>
            <th>Total</th>
            <th><?php echo $_GET['to']; ?></th>
        </tr>    

        <tr>
            <th >BANK Details <br> Y.C.K Enterprises</th>
            <th colspan="5" >Bank Name: Janklyan Sahkari Bank Ltd <br> A/C No.: 010011300007296 </th>
            <th >Branch: Sahar <br> IFSC Code: JSBL0000001</th>
            
        </tr>    


        <tr>
            <th colspan="7" style="text-align:right;" height="100">For Y.C.K Enterprises <br><br><br><br><br>Proprietor</th>
            
        </tr> 
        
    </table>
    
    
    <button onclick="wholepage()">Print</button>


        
    <script>
    function wholepage()
    {
        window.print();
    }
    </script>
</body>
</html>