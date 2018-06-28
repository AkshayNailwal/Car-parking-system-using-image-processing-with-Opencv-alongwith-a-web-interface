<!DOCTYPE html>
	<html>
		<head>
			<title>BOOKING</title>
			<meta charset ="UTF-8">
		
				<!-- CSSReference -->
		<link rel = "stylesheet" href ="style2.css" type ="text/css">

		</head>
			<!-- BODY SECTION ---------------------------------------------------------------------------------- -->
	
	<body>

	
			<!-- HEADER SECTION ---------------------------------------------------------------------------------- -->	
			

			<header>
				<div class="helements">
					<a href ="welcomepage.php" class ="element1">Home</a>
					<a href ="#" class ="element2">Info.</a>
					<a href ="search.php" class ="element3">Parkings</a>
					<a href ="booking.php" class ="element4">Booking</a>
					<a href ="contactus.php" class ="element5">Contact Us</a>
				</div>
			</header>


	
	<!-- FORM FOR BOOKING -->
<?php
$con=mysqli_connect("127.0.0.1","root","","Project1");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$owner="";
$car="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
$owner = $_POST["ownername"];
$car = $_POST["carnumber"];
}
$sql = "INSERT INTO parking(owner_name,car_number) VALUES ('$owner','$car')";
mysqli_query($con, $sql);
	
?>

	<form name="register" method="post" enctype = "multipart/form-data" action ="Page1.php" >

	<div  id="fheading">
	<h1>Booking</h1>
	<p>Owner Name:  <input type="text" name="ownername" placeholder="Enter name" required></input></p></br>

	<p>Car Number:  <input type="text" name="carnumber" placeholder="Car Number" required></input></p></br>

	<input type="submit" id ="dsubmit" value ="Submit"></input>


		
	</div>

			</form>

			<!-- FOOTER SECTION ---------------------------------------------------------------------------------- -->
			
			
			<div>
				<footer>
					<div class = "felementstxt">
						&#169;  Copyright : ACPS corps. ltd.</br>
								Since 2017- until dead
					</div>
					<div class="felementsicons">
					
						<a href ="http://www.facebook.com"><div id="facebook">
							f
						</div></a>
						<a href ="http://www.twitter.com"><div id="twitter">
							t
						</div></a>
						<a href ="http://www.google.com/gmail"><div id="gmail">
							G+
						</div></a>
						
					</div>
				</footer>
			</div>
		</body>
	</html>					
 
