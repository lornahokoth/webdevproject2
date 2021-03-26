<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hangman Game</title>
    <link rel="stylesheet" href="../css/format.css" />
</head>
<body class="background">
	<?php include("top.php"); ?>
	<div class="gamespace">
		<div class="tdisplay">
			<a href="./play.php" class="button level btn"> PLAY </a>
			<a class=" button level btn" href="#popup">RULES</a>
				<div id="popup" class="overlay">
					<div class="popup1">
						<a class="close" href="#">&times;</a>
							<div class="rules">
								<p>Rules for Hangman: You (the player) will try to guess <br>the letter that belongs in a word or phrase that has <br>been chosen at random. With each correct letter, your<br> word will start filling in. Each wrong letter, a piece<br> of the figure gets placed. Try your best to win by <br> getting filling in the whole word before the stick <br>is drawn out!</p>
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
