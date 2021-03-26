<?php
function clear_cookie()
{
	foreach ($_COOKIE as $key => $value) {
		setcookie($key, false);
	}
	header("Location: ./title.php");
	die();
}
