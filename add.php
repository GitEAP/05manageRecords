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
		<li class="active"><a href="add.php">Add</a></li>
		<li><a href="delete.php">Delete</a></li>
	</ul>
</div>
<main class="ContentContact">
	<h1>Add a Hotel</h1>
	
	<form action="saveToDB.php" method="POST" enctype="multipart/form-data" class="contactForm">
	
		<fieldset>
			<legend>General Information</legend>
			
			<label><span>Hotel Name:</span><input name="hotelName" type="text" placeholder="John" pattern="[a-zA-Z -.,'/0-9]{3,999}"  class="userInput" required></label>
			<label><span>Location:</span><input name="location" type="text" placeholder="City, State" pattern="[a-zA-Z -.,'/0-9]{3,999}" class="userInput" required></label>
			<label><span>Phone:</span><input name="phone" type="tel" placeholder="123-555-9876"  class="userInput" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required></label>
		</fieldset>
		
		<fieldset>
			<legend>Rating</legend>
			
			<label><span>Please Select:</span>
			<select name="rating">
				<option>1 Star</option>
				<option>2 Star</option>
				<option>3 Star</option>
				<option>4 Star</option>
				<option>5 Star</option>
			</select>
			</label>
		</fieldset>
		
		<fieldset>
			<legend>Photo</legend>
			
			<label>
			<span>Upload photo of hotel:</span>
			<input name="photo" type="file"><br>
			<span>File must be saved as a .jpg file.</span>
			<span>Please crop to 300px x 200px, before uploading.</span>
			</label>
		</fieldset>
	
	<input class="submitbutton" name="submitbutton" value="Add Hotel" type="submit">
	<input type="hidden" value="saveToDB.php" name="redirect">
	</form>
</main>


<footer>
	<p>&copy; 2017 &bull; Erick Perez &bull; Built for DGM 3760 Web Languages 2</p>
</footer>

</body>
</html>
