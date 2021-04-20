<!DOCTYPE html>
<html>
	<head>
			<title>YCK Printers</title>
			<link rel="stylesheet" type="text/css" href="css/style.css">
		
			<link rel="stylesheet" media="screen and (max-width: 700px)" href="css media/media1.css"> 
			<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
			<script>
				$(document).ready(function(){
					$('#menu-toggle').click(function(){
						$('#menu-toggle').toggleClass('active');
						$('nav').toggleClass('active');
					});
				});
			</script>
			<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
			
	</head>		

	<body>
		<div id="background">
<!-- ========================================Navigation Bar========================================== -->		
		<div class="main-header">

			<div id="nav-bar">
					
					<nav>
							<div id="menu-toggle"></div>	
						<ul>
								
								<li><a href="src/contact.php" >Contact</a></li>
								<li><a href="src/work.php">Work</a></li>
								<li><a href="index.php" class="active">Home</a></li>
						</ul>	
						<a href="src/login.php"><img src="images/name.jpeg" id="head-img"></a>
					</nav>
			</div>
		</div>

<!-- ========================================Aboout Us========================================== -->

		<div class="container">
			<div class="abt-us">
				<h1>About Us</h1>
				Launched in 1994, YCK Enterprises deals with the customers who wants banner for Advertisement,Election banner,Social Awareness banner,etc.We use latest tools to design and print the banner.Our company not only deals with the banner designing but also deals with the Computer Stationery,Gift,Hardware,Labour Work Painting,Courier and Fire Fighting Services and many more things.<br><br>
				Our customer can see the progress of their assigned work from <span class="imp">Work In Progress Section</span>.New customer can contact with us using <span class="imp">Contact Us</span> form.   
			</div>
			<div class="main-image">
					<img src="images/printer-human.png" id="abt-img">
			</div>

		</div>
	</div>
	<br><br><br>
<!-- ========================================What we do========================================== -->	
	<div class="wwd">
		<h2>Work we do</h2>
			<div class="wwd-main-cont">
				<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium, reiciendis quod temporibus, odio harum accusantium officia minima soluta amet ducimus, ullam laboriosam quasi. Voluptates aliquid sed quia inventore repellendus saepe</p>
			<div class="wwd-cont">
				<div class="wwd-cont1">
					<center><img src="images/ux.png" id="head-wwd-img" ></center>
					<h3>Design</h3>
						<p>We design best Products.As per your specifications.We design best Products.As per your specifications. </p>
				</div>
				<div class="wwd-cont2">
					<center><img src="images/ux.png" id="head-wwd-img"></center>
					<h3>Design</h3>
						<p>We design best Products.As per your specifications We design best Products.As per your specifications.</p>
				</div>
				<div class="wwd-cont3">
					<center><img src="images/ux.png" id="head-wwd-img"></center>
					<h3>Design</h3>
						<p>We design best Products.As per your specifications We design best Products.As per your specifications.</p>
				</div>
				<div class="wwd-cont4">
					<center><img src="images/ux.png" id="head-wwd-img"></center>
					<h3>Design</h3>
						<p>We design best Products.As per your specifications We design best Products.As per your specifications.</p>
				</div>
			</div>	
			</div>
	</div>

	<br><br><br><br><br><br>
	<div>

	</div>	

<!-- ========================================Work In Progress========================================== -->	
	<div class="main-wrapper">
		<h2>Work In Progress</h2>
		<p>Here you can trace the progress of your given work.</p>
		<div class="progress-wrapper">		
		<?php
        	require 'src/dbconfig.php';
        
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
						
						else
						{
							$Progress=0;
						}

                	echo "<div class='progress-head'>Progress of ".$row['name']." Work is ".$Progress."%</div>";
					// echo "name is ".$row['name']."<br>";
					echo "<center><progress value=".$Progress." max=".$Total." class='progress-bar'></progress><br><br></center>";    
                	}
            	}    
			}    
			
			else
			{
				echo "<div class='progress-head' style='color: red'><h2>Currenty no works are pending.</h2></div>";
			}
						
    	?>
		</div>

	</div>	
<br><br><br>
<!-- ========================================Footer========================================== -->	

	<div class="foot-main">
		<div class="heading">
			<h2>Contact Us</h2>
		</div>

		<div class="content">
			<div class="sm">
				<p>Social Media</p>
				<br><br>
					<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-google" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
			</div>

			<div class="email-cont-copyright">
				<br><br>
					<p class="email"><i class="fa fa-envelope-open" aria-hidden="true"></i>  yckprinters@gmail.com </p>
				
				<br><br>
					<p class="cont"><i class="fa fa-phone-square" aria-hidden="true"></i> +91 1234567890 </p>
				
				<br><br>
					<p class="copyright"><p><i class="fa fa-copyright" aria-hidden="true"></i> Copyright yck printers, All Right Reserves. </p>
				
			</div>

			<div class="addr">
				<br><br>
					<p class="addr"><i class="fa fa-map-marker" aria-hidden="true"></i> Lorem ipsum dolor sit amet consectetur,<br> adipisicing elit. </p>

			</div>
		</div>
	</div>

	
</body>
</html>