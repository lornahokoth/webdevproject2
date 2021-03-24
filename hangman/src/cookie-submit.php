<?php
if(!empty($_POST["name"])) {
	setcookie ("name",$_POST["name"],time()+ 8700);
	setcookie ("score",100,time()+ 8700);
	setcookie ("difficulty","Easy",time()+ 8700);
	header("Location: game.php");
	//add game php here
}else{
	header("Location: login.php");
}//For refrence how to change score
//setcookie ("score",$_COOKIE["score"]-5,time()+ 8700);
?>
