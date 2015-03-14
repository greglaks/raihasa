<?php
session_start();
if (!isset($_SESSION['login_user'])){
	echo "you are not authorized";
	header("Location: ../index.html");
	exit;
}

?>