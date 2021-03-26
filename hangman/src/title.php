<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hangman Game</title>
	<link rel="stylesheet" href="../css/format.css" />
</head>

<body class="background">
	<?php
	include("top.php");
	?>
	<div class="gamespace">
		<div class="tdisplay">
			<a href="./play.php" class="button level btn"> PLAY </a>
			<a class=" button level btn" href="#popup">RULES</a>
			<div id="popup" class="overlay1">
				<div class="popup popup1">
					<div class="alignRight">
						<a class="close" href="#">&times;</a>
					</div>
					<div class="rules">
						<p>Rules for Hangman: Player will try to guess <br>the letter that belongs in a word or phrase that has <br>been chosen at random. With each correct letter, your<br> word will start filling in. Each wrong letter, a piece<br> of the figure gets placed. Try your best to win by <br> filling the correct word/phrase before the stick figure <br>is completed!</p>
					</div>
				</div>
			</div>
			<a href="./leaderboard.php" class="button level btn"> LEADERBOARD </a>
			<a href="./credits.php" class="button level btn"> CREDITS </a>
		</div>
	</div>
	<?php include("bottom.html"); ?>
</body>

</html>
