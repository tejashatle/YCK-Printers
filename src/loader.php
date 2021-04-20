<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    /* progress::-moz-progress-bar
    {
        background: linear-gradient(57deg,#00ff80,#1e4d92); 
        height: 15px;
        width: 400px;


    } */

    
    progress
    {
         
        height: 25px;
        width: 500px;


    }
    </style>
</head>
<body>
    <?php
        require 'dbconfig.php';
        
        $Total=100;
        $Progress=0;
        
        $sql = "SELECT work_tracing_bar.data_collection,work_tracing_bar.designing,work_tracing_bar.printing,work_tracing_bar.delivery,customer.name FROM work_tracing_bar,customer WHERE work_tracing_bar.cust_id=customer.id ORDER BY work_tracing_bar.id ";

        $result =mysqli_query($con,$sql);
        $lenresult=count($result);
        
        // echo $lenresult;
        if($result -> num_rows > 0)
		{
            $length=($result -> num_rows);
            //echo "length is".$length;
            for($x=$length ; $x>0 ;$x--)
            {

			    while($row= $result -> fetch_assoc())
		        {

                    // echo $row["data_collection"];
                    // echo $row["designing"];
                    // echo $row["printing"];
                    // echo $row["delivery"];
                    // echo $row["name"];

                    if($row["delivery"] == "yes")
                    {
                        $Progress=100;
                    }

                    elseif($row["printing"] == "yes")
                    {
                        $Progress=75;
                    }

                    elseif($row["designing"] == "yes")
                    {
                        $Progress=50;
                    }

                    elseif($row["data_collection"] == "yes")
                    {
                        $Progress=25;
                    }

                echo "progress is".$Progress."%<br>";
                echo "name is ".$row['name']."<br>";
                echo "<progress value=".$Progress." max=".$Total."></progress><br><br>";    
                }
            }    
        }    
						
    ?>
    
</body>
</html>
