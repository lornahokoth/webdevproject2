<?php

	setcookie ("name","",time()+ -8700);
	setcookie ("score","",time()+ -8700);
	setcookie ("difficulty","",time()+ -8700);
	header("Location: login.php");
	//add title php here
//For refrence how to change score
//setcookie ("score",$_COOKIE["score"]-5,time()+ 8700);
?>
