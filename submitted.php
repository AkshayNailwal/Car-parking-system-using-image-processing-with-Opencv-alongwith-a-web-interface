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
			<div style="background:pink">
				<div class="helements">
					<a href ="welcomepage.php" class ="element1">Home</a>
					<a href ="#" class ="element2">Info.</a>
					<a href ="search.php" class ="element3">Parkings</a>
					<a href ="booking.php" class ="element4">Booking</a>
					<a href ="contactus.php" class ="element5">Contact Us</a>
				</div></div>
			</header>
	<div  id="fheading">
	<?php 
		$con=mysqli_connect("127.0.0.1","root","","Project1");
		if (mysqli_connect_errno())
		{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		$slot="";
		if($_SERVER["REQUEST_METHOD"]=="POST"){
			foreach($_POST['book'] as $select){
			$slot=$slot.$select.",";
		}
		}
		$sql = "update parking set parkingslot = '$slot' where parkingslot is null";
		mysqli_query($con, $sql);
		$sql2 = "delete from parking where owner_name=''";
		mysqli_query($con,$sql2);
		mysqli_close($con);
		print("Your form is successfully submitted.");
	?>
	</div>
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
