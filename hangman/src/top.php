<html>
	
	<head>
		<title>Hangman</title>
		
		<meta charset="utf-8" />
		
		<link href="../assets/noose.png" type="image/png" rel="shortcut icon" />
	<!--	<link href="login.css" type="text/css" rel="stylesheet" /> -->
		
	</head>

	<body>
		<div id="bannerarea">
		<a href="title.php">
			<img src="../assets/Title.JPG" alt="banner logo" /> <br />
			</a>
		</div>
		<?php
if(!isset($_COOKIE["name"])) {
  echo "Username is not set!";
} else {
  echo "Logged in as '" .$_COOKIE["name"]. "'<br>";
  echo "Difficulty is: " . $_COOKIE["difficulty"];
}
?>
</body>
</html>