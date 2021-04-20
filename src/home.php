<?php
    session_start();
    require 'dbconfig/config.php';
    mysqli_set_charset($con,'utf-8');
    $sql="select * from content where title='tejas'";
    // $result= mysqli_query($con,$query);
    $result = $con->query($sql);
if ($result->num_rows > 0) {
	// $showdata='';
	echo '<table border>';
    while($row = $result->fetch_assoc()) {
        echo"<tr><td>id: " . $row["id"]. "</td><td> Name: " . $row["title"]. "</td><td>" . $row["author"]."</td><td>".$row["content"]. "</td></tr><br>";
    }
    echo '<table>';
}
    // if ($result->num_rows>0) {
    // 	while ($row = $result->fetch_assoc()) {
    // 		$showdata= "<table><tr><td>". $row['title']."</td><td>".$row['author']."</td><td>".$row['content']."</td></tr></table>";
    // 	}
    // }
?>
<!DOCTYPE html>
<html>
<title>homepage</title><head>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta charset="utf-8">
<link rel="shortcut icon" href="../images/logo.png" type="image/png">
<link rel="stylesheet" type="text/css" href="../css/style4.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style type="text/css"> 
.main-wrapper ul .uimg .userimg:hover{
	cursor: pointer;
 }
 .profile-option{
 	position: relative;
 	top: 18%;
 	right: 0px;
	width: 18%;
	height: 40%;
	display: none;
	border-radius:6px; 
	margin-right: 6px;
	background-color: #ffdb36;
}
.log input[type=submit]{
	font-size: 20px;
	padding: 0.5px;
	border-color: olive;
}
.log input[type=submit]:hover{
	box-shadow:0 4px #e4e4e4;
	transform : translateY(4px);
}
.showeditor{
	position: relative;
	width: 40%;
	top: 2%;
	background-color: transparent;
}
.tbleditor{width: 100%;background-color: #f3e5ab;color: #3684e8;border:5px solid #990012; }
.c1{background-color:turquoise;font-variant:small-caps;}
td:nth-child(1){width: 2%;}
td:nth-child(2),td:nth-child(3){width: 6%;}
td:nth-child(4){width: 10%;}
</style>
<script type="text/javascript">
function act(){
	var prop=document.getElementById("profile");
	if(prop.style.display==="none"){
		prop.style.display="inline-block";}
	else{
		prop.style.display="none";}
}''
</script>
<script type="text/javascript">
var selvar;
	function seltitle() {
		selvar=document.getElementById("seltitle").value;
		document.cookie="selectedelement="+selvar;
		alert ("title :"+selvar);
	}
	function random(){
		var characters=parseInt(6);
		var letters = '23456789bcdfghjkmnpqrstvwxyz';
		var str='';
		for (i=0; i<characters; i++) {
		alert(i+' in loop'); 
			str += substr(letters);
			// str += substr(letters, mt_rand(0, strlen(letters)-1), 1);
		}
		alert (str);
	}
	/*$(document).ready(function(){
		$("#seltitle").change(function(){
			alert (document.getElementById("seltitle").value);
		});
	});*/
</script>
<?php 
	$sel= $_COOKIE["selectedelement"];
?>
</head><body>
    <div class="main-wrapper">
	    <ul >
			<li ><a href="../index.html" >Home</a></li>
			<li ><a href="editor.php" >Editor </a></li>
			<li ><a href="home.php" >Profile</a></li>
			<li class="uimg" > <?php echo '<img src="'.$_SESSION["imglink"].'" class="userimg" onmouseover="act()">';?></li>
			<ul class="profile-option" id="profile">
				<li><a href="#">Profile</a></li>
				<li><a href="#">update</a></li>
				<form method="post" action="logout.php" class="log"><input type="submit" style="cursor:pointer;border-radius:8px;background-color:#f4f4f4;color:blue;float:right;" name="subLogout" value="Sign Out"></form>
			</ul>
			<li class="uimg"><h3 style="color: white;"> welcome <?php echo $_SESSION['username'] ?></h3></li>
			</li>
			</li>
		</ul>
			<div class="showeditor">
				<select style='width:40%;' id='seltitle' onchange='seltitle()'><option value='none'>select title..</option>
			<?php
			$titlelist="select * from content";
			$list=$con->query($titlelist);
			if ($list->num_rows > 0) {
				// echo "<select style='width:40%;' id='seltitle' onchange='seltitle()'><option value='none'>select title..</option>";
				while ($lirow=$list->fetch_assoc()) {
					$inc+=1;
					echo "<option value=".$lirow["title"].">".$lirow["title"]."</option>";
				}
			}
			?>
		</select>
		<!-- <?php echo $settitle;?> -->
		<div id='listtable'>
		<table border class="tbleditor"><tr class="c1"><th>Id</th><th>Title</th><th>Author</th></tr>
		<?php
		$sql="select * from content where title='$sel'";
		$result = $con->query($sql);
		if ($result->num_rows > 0){
			// echo '<table border class="tbleditor"><tr class="c1"><th>Id</th><th>Title</th><th>Author</th></tr>';
			while($row = $result->fetch_assoc()) {
				echo"<tr><td>" . $row["id"]. "</td><td>" . $row["title"]. "</td><td>" . $row["author"]."</td></tr><br>";
			}
			echo '<table>';}
		?></div>
		</div>
	</div>
	
</body>
</html>