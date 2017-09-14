<?php
require_once('connectvars.php');

$hotelId = $_GET['id'];


//Build db connection
$dbconnection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ('connection failed');
//Build query
$query = "SELECT * FROM hotel_simple WHERE id=$hotelId";
//talk to database
$result = mysqli_query($dbconnection, $query) or die('Query failed');
$found = mysqli_fetch_array($result);

//Verify the photo exits
if (file_exists('images/' . $found['photo']) && $found['photo'] <> '') {
	$photoPath = 'images/' . $found['photo'];
} else {
	$photoPath = 'images/noimagefound.jpg';
}

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

<main class="ContentContact clearfix">
	<h1>Hotel Details</h1>
	
<?php
	
	echo '<div class="detailPicContainer">';
	echo '<img src="' . $photoPath . '" alt="Photo of Hotel">';
	echo '</div>';
	
	
	echo '<div class="detailContainer">';
	echo '<h2>' . $found['name'] . '</h2>';
	echo '<p>' . $found['location'] . '</p>';
	echo '<p>' . $found['phone'] . '</p>';
	echo '<p>' . $found['rating'] . '</p>';
	echo '<a href="index.php" class="backButton">Back</a>';
	echo '</div>';
	
	

	
mysqli_close($dbconnection);
?>


	
	
</main>


<footer>
	<p>&copy; 2017 &bull; Erick Perez &bull; Built for DGM 3760 Web Languages 2</p>
</footer>

</body>
</html>
