<?php
$hotelId = $_GET['id'];

//Build db connection
$dbconnection = mysqli_connect('localhost', 'erickper_3760usr', 'OcaC)hJzA}Wd', 'erickper_3760') or die('Connection to the database failed');

//-------------------Delete selected------------------------
if (isset($_POST['submit'])) {
	//Build query
	$query = "DELETE FROM hotel_simple WHERE id=$_POST[id]";
	
	$result = mysqli_query($dbconnection, $query) or die('Delete Query failed');
	
	//delete image from server
	@unlink($_POST['photo']);
	
	//Redirect
	header("Location: http://dgm3760.erickperezdesign.com/05manageRecords/delete.php");
	//make sure code below does not get executed when we redirect
	exit;
};
//-------------------display records------------------------

//Build query
$query = "SELECT * FROM hotel_simple WHERE id=$hotelId";

//talk to database
$result = mysqli_query($dbconnection, $query) or die('Query failed');

$found = mysqli_fetch_array($result);

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
	
	<div class="nav clearfix">
		<ul>
			<li><a href="index.php">View</a></li>
			<li><a href="add.php">Add</a></li>
			<li class="active"><a href="delete.php">Delete</a></li>
		</ul>
	</div>
</div>

<main class="ContentContact">

<h1>Delete Hotel</h1>

<div class="deleteConfirmation">
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="contactForm">
		<?php
			echo '<h2>' . $found['name'] . '</h2>';
			echo '<p>';
			echo $found['location'] . '<br>' . $found['phone']  . '<br>' . $found['rating'];
			echo '</p>';
		?>
		
		<input type="hidden" name="photo" value="images/<?php echo $found['photo']; ?>">
		<input type="hidden" name="id" value="<?php echo $found['id']; ?>">
		<input type="submit" name="submit" value="DELETE THIS HOTEL" class="submitbutton">
		<a href="delete.php" class="cancelButton">Cancel</a>
	</form>
</div>



</main>


<footer>
	<p>&copy; 2017 &bull; Erick Perez &bull; Built for DGM 3760 Web Languages 2</p>
</footer>

</body>
</html>
