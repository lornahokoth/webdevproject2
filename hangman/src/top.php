<header>
	<div class="row">
		<div class="col">

		</div>
		<div class="extraWide">
			<a href="title.php">
				<img src="../assets/Title.png" alt="banner logo" />
			</a>
		</div>
		<div class="col">
			<div class="row">
				<?php
					if(!isset($_COOKIE["name"])) {?>
						<div class="col right">
							<a class="login" href="login.php">Login</a>
						</div>
					<?php } else {?>
							<div class="infoColLeft">
								<div class="text"><label class="leftLab">User:&nbsp;</label><label class="rightLab"><?php echo $_COOKIE["name"] ?></label></div>
								<div class="text"><label class="leftLab">Difficulty:&nbsp;</label><label class="rightLab"><?php echo $_COOKIE["difficulty"] ?></label></div>
							</div>
							<div class="infoColRight">
								<a class="logout" href="cookie-delete.php">Logout</a>
							</div>
					<?php }
				?>
			</div>
		</div>
	</div>
</header>