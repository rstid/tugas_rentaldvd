<?php
if (isset($_GET['action'])) {
	$path = "pages/action/".$_GET['action'].".php";
	if (file_exists($path)) {
		require_once($path);
	}
	else {
		require_once("pages/404.php");
	}
}
else {
	require_once("pages/home.php");
}

 ?>