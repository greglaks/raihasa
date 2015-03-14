<?php

$uname = $_POST['username'];
$pwd = $_POST['password'];

include "connection.php";

$sql = "SELECT * FROM `user` WHERE `username` = '$uname' AND `password` = '$pwd' LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$uname =  $row['username'];
		session_start();
		$_SESSION['login_user'] = $uname;
		$test = $_SESSION['login_user'];
		header("Location: myadmin.php");
		die();
	}
} else {
	echo "Username / password is wrong. You can try again";
}
$conn->close();

?>