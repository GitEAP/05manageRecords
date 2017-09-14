<?php
$hotelName = $_POST['hotelName'];
$location = $_POST['location'];
$phone = $_POST['phone'];
$rating = $_POST['rating'];
$photo = $_POST['photo'];

$hotelNameNoSp = str_replace(' ','_',"$hotelName");//Removes spaces from the name and replaces with _

//Make photo path and name
$ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);//returns extension of file
$filename = $hotelNameNoSp . time() . '.' . $ext;//renames file
$filepath = 'images/'; 


//------------------verify image is valid ------------------
$validImage = true;
//check image is missing
if ($_FILES['photo']['size'] == 0) {
	echo 'Oops, you did not select an image!';
	$validImage = false;
};
//check image is too large
if ($_FILES['photo']['size'] > 204800) {
	echo 'Oops, That file was larger than 200KB.';
	$validImage = false;
};
//check file type
if ($_FILES['photo']['type'] == 'image/gif' || $_FILES['photo']['type'] == 'image/jpeg' || $_FILES['photo']['type'] == 'image/pjpeg' || $_FILES['photo']['type'] == 'image/png'){
	//everything is good.
} else {
	//not correct
	echo 'Oops, That file is the wrong format.';
	$validImage = false;
};

//---------------------if the image is valid
if ($validImage == true) {
	//upload file
	$tmp_name = $_FILES['photo']['tmp_name'];
	move_uploaded_file($tmp_name, $filepath.$filename);//moves file from temp to new folder
	@unlink($_FILES['photo']['tmp_name']);//deletes temp file
	
	
	//Build db connection
	$dbconnection = mysqli_connect('localhost', 'erickper_3760usr', 'OcaC)hJzA}Wd', 'erickper_3760') or die('Connection to the database failed');

	//Build query
	$query = "INSERT INTO hotel_simple (name, location, phone, rating, photo)" . "VALUES ('$hotelName', '$location', '$phone', '$rating', '$filename')";

	//talk to database
	$result = mysqli_query($dbconnection, $query) or die('Query failed');

	mysqli_close($dbconnection);
	
	
}else {
	echo '<a href="index.html" class="linkButton">Please try agian.</a>';
};
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
	<h1>Hotel successfuly added</h1>
<?php
	echo '<p>' . $hotelName . '</p>';
	echo '<img src="' . $filepath . $filename . '" alt="photo">';
?>

</main>


<footer>
	<p>&copy; 2017 &bull; Erick Perez &bull; Built for DGM 3760 Web Languages 2</p>
</footer>

</body>
</html>
