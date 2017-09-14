<?php
require_once('connectvars.php');

$hotelName = $_POST['hotelName'];
$location = $_POST['location'];
$phone = $_POST['phone'];
$rating = $_POST['rating'];
$id = $_POST['id'];


//Build db connection
$dbconnection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ('connection failed');
	//Build query
	$query = "UPDATE hotel_simple SET name='$hotelName', location='$location', phone='$phone', rating='$rating' WHERE id=$id";

	//talk to database
	$result = mysqli_query($dbconnection, $query) or die('Query failed');

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
	<h1>Hotel successfuly updated</h1>
	
	<a href="index.php" class="linkButton">View All Hotels</a>
</main>


<footer>
	<p>&copy; 2017 &bull; Erick Perez &bull; Built for DGM 3760 Web Languages 2</p>
</footer>

</body>
</html>
