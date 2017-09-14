<?php
require_once('connectvars.php');

$hotelId = $_GET[id];


//Build db connection
$dbconnection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ('connection failed');
//Build query
$query = "SELECT * FROM hotel_simple WHERE id=$hotelId";
//talk to database
$result = mysqli_query($dbconnection, $query) or die('Query failed');
$found = mysqli_fetch_array($result);






mysqli_close($dbconnection);

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<!-- TELLS PHONES NOT TO LIE ABOUT THEIR WIDTH & stops the font from enlarging whena phone is turned sideways-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>Travel Hotel</title>
<link href="styles/mainstyle.css" type="text/css" rel="stylesheet">
<!--Google Fonts-->
<link href="https://fonts.googleapis.com/css?family=Francois+One" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Mukta+Mahee:300,700" rel="stylesheet"> 
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>

<body>

<div class="headerWrapper clearfix">
	<h1>Travel Hotel</h1>
</div>

<div class="nav clearfix">
	<ul>
		<li><a href="index.php">View</a></li>
		<li><a href="add.php">Add</a></li>
		<li><a href="delete.php">Delete</a></li>
	</ul>
</div>
<main class="ContentContact">
	<h1>Update Hotel</h1>
	
	<form action="updateDatabase.php" method="POST" enctype="multipart/form-data" class="contactForm">
	
		<fieldset>
			<legend>General Information</legend>
			
			<label><span>Hotel Name:</span><input name="hotelName" type="text" pattern="[a-zA-Z -.,'/0-9]{3,999}"  class="userInput" value="<?php echo $found['name']; ?>" required></label>
			<label><span>Location:</span><input name="location" type="text" pattern="[a-zA-Z -.,'/0-9]{3,999}" class="userInput" value="<?php echo $found['location']; ?>" required></label>
			<label><span>Phone:</span><input name="phone" type="tel" class="userInput" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?php echo $found['phone']; ?>" required></label>
		</fieldset>
		
		<fieldset>
			<legend>Rating</legend>
			
			<label><span>Please Select:</span>
			<select name="rating">
				<option ><?php echo $found['rating']; ?></option>
				<option>--------</option>
				<option>1 Star</option>
				<option>2 Star</option>
				<option>3 Star</option>
				<option>4 Star</option>
				<option>5 Star</option>
			</select>
			</label>
		</fieldset>
		
		<input name="id" value="<?php echo $found['id']; ?>" type="hidden">
	<input class="submitbutton" name="submitbutton" value="Update Hotel" type="submit">
	</form>
</main>


<footer>
	<p>&copy; 2017 &bull; Erick Perez &bull; Built for DGM 3760 Web Languages 2</p>
</footer>

</body>
</html>
