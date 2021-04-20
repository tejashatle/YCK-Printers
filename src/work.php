<!DOCTYPE html>
<html>
	<head>
			<title>YCK Printers</title>
			<metadata name=></metadata>
            <link rel="stylesheet" type="text/css" href="../css/style.css">
            <link rel="stylesheet" type="text/css" href="../css/style2.css">
			<link rel="shortcut icon" href="../images/logo.png" type="image/png">
			<link rel="stylesheet" media="screen and (max-width: 700px)" href="../css media/media1.css"> 
			<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
			<script>
				$(document).ready(function(){
					$('.menu-toggle').click(function(){
						$('.menu-toggle').toggleClass('active')
						$('nav').toggleClass('active')
					})
				})
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
								
								<li><a href="contact.php">Contact</a></li>
								<li><a href="work.php" class="active">Work</a></li>
								<li><a href="../index.php">Home</a></li>
						</ul>	
						<a href="login.php"><img src="../images/name.jpeg" id="head-img"></a>
					</nav>
			</div>
        </div>
        
<!-- ========================================Tools we uses========================================== -->

        <div class="twu">
            <div class="heading">
				<h2>What Tools We Use?</h2>
				<h3>Following are some of the tools we use to design the Projects.We use latest tools to design the work.We trust in making plain and attractive design for your work. <br><br> Our team is well trained to complete perticular task.<span class="slogan">Together We Build Great Products.</span></h3>
            </div>

            <div class="main-content">        
                <div class="content1">
                    <div class="img"><img src="../images/coreldraw.png"></div>
                    <div class="description">Coreldraw is vector based designing software which is used for creating logos, flexes, brochures, invitation cards and any kind of vector designing based on the lining. </div>
                </div>
            
                <div class="content2">
                    <div class="img"><img src="../images/photoshop.jpeg"></div>
                    <div class="description">Photoshop is Adobe's photo editing, image creation and graphic design software.The software provides many image editing features for raster (pixel-based) images as well as vector graphics. </div>
                </div>
            
                <div class="content3">
                    <div class="img"><img src="../images/adobe illustrator.png"></div>
                    <div class="description">Adobe Illustrator is graphic-driven software used primarily for creating vector graphics. Developed alongside with Adobe Photoshop as a companion product, Adobe illustrator is used for creating logos, graphics, cartoons and fonts for the photo-realistic layouts of Adobe Photoshop.</div>
                </div>
            </div>    
        </div>        
        </div>        


<!-- ========================================Projects we did till now========================================== -->

        <div class="ptn">
            <div class="heading">
                <h2>Projects we did till now  </h2>
            </div>
        
        </div>  
        <div class="container">
        <?php
            require 'dbconfig.php';

                $sql= "Select image,head,descr from website";
                $result= $con-> query($sql);

                if($result-> num_rows > 0)
                {
                    while ($row = $result -> fetch_assoc())
                    {
						echo "<div class='main-container'>
								<div class='image' ><img src='". $row["image"] . "' height='100' width='100'/></div>
							  	<div class='content-head'><h3>". $row["head"]."</h3></div>
								<div class='content-desc'>". $row["descr"]."</div>
							  </div>";
                    }
                           
                }
                else
                {
                    echo '<script> alert(" Nothing to show in database.") </script>';
                    echo "";
                }

                    
        ?>
        </div>
            
        
    
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