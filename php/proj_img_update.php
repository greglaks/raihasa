<?php
include 'session.php';
include "connection.php";

$img_id = $_POST['imgid'];
$title = $_POST['title'];
$img_title = $_POST['img_title'];
$img_description = $_POST['img_description'];
$project_selected = $_POST['projectselected'];

$sql = "UPDATE  `proj_img` SET proj_id = '$project_selected' , ptitle = '$title', img_title = '$img_title', img_description = '$img_description' WHERE  id_img = '$img_id'";
if(!mysqli_query($conn, $sql)){
	$errorMsg = "Error description: " . mysqli_error($conn);
	echo($errorMsg);
}
header("location: projectimage.php");
$conn->close();
?>