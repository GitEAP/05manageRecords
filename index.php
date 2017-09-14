<?php
require_once('connectvars.php');
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
		<li class="active"><a href="index.php">View</a></li>
		<li><a href="add.php">Add</a></li>
		<li><a href="delete.php">Delete</a></li>
	</ul>
</div>

<main class="default">
	<h1>View Hotels</h1>
	<?php
	//Build db connection
$dbconnection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ('connection failed');

//Build query
$query = "SELECT * FROM hotel_simple";

//talk to database
$result = mysqli_query($dbconnection, $query) or die('Query failed');

//Display table data
while ($row = mysqli_fetch_array($result)) {
	
	
	echo '<p><a href="detail.php?id=' . $row['id'] . '">';
	echo $row['name'] . ' - ' . $row['location'];
	echo '</a>';
	echo '<a href="update.php?id='. $row['id'] .'"> --- UPDATE</a>';
	echo '</p>';
}
	
mysqli_close($dbconnection);
?>
	
	
</main>


<footer>
	<p>&copy; 2017 &bull; Erick Perez &bull; Built for DGM 3760 Web Languages 2</p>
</footer>

</body>
</html>
