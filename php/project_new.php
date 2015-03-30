<?php
include 'session.php';
include "connection.php";

$pname = $_POST['newprojecttext'];
$cid = $_POST['categoryname'];
$enewpshortdesc = $_POST['newpshortdesc'];
$client = $_POST['projclient'];
$year = $_POST['projyear'];

$image = $_FILES['image_banner'];
$location = $_FILES['image_banner']['tmp_name'];
$fnamesafe = filename_safe($image['name']);
$TARGET_PATH = "images/".$fnamesafe;

move_uploaded_file($_FILES['image_banner']['tmp_name'],$TARGET_PATH);

$sql = "INSERT INTO `project` ( name, cat_id, client , short_desc, img_banner, year  ) VALUES ( '$pname' , '$cid' , '$client' , '$enewpshortdesc','$TARGET_PATH', '$year' )";
if(!mysqli_query($conn, $sql)){
		
	$errorMsg = "Error description: " . mysqli_error($conn);
	echo($errorMsg);
}
else{
	header("location: project.php");
}
$conn->close();


function filename_safe($filename) {
	$temp = $filename;

	// Lower case
	$temp = strtolower($temp);

	// Replace spaces with a '_'
	$temp = str_replace(" ", "_", $temp);


	// Return filename
	return $temp;
}
?>