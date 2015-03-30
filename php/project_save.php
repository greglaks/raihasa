<?php
include "connection.php";

$category = $_POST['categoryname'];
$projectname = $_POST['projectname'];
$projectid = $_POST['pid'];
$pshortdesc = $_POST['shortdescription'];
$client = $_POST['client'];
$year = $_POST['year'];
$img_banner = $_FILES['image_banner']['name'];

if(empty($img_banner)){
	$sql = "UPDATE `project` SET name = '$projectname' , cat_id = '$category' , client = '$client' , short_desc = '$pshortdesc', year = '$year' WHERE proj_id = '$projectid'";
}
else{
	$image = $_FILES['image_banner'];
	$location = $_FILES['image_banner']['tmp_name'];
	$fnamesafe = filename_safe($image['name']);
	$TARGET_PATH = "images/".$fnamesafe;
	move_uploaded_file($_FILES['image_banner']['tmp_name'],$TARGET_PATH);
	
	$sql = "UPDATE `project` SET name = '$projectname' , cat_id = '$category' , client = '$client' , short_desc = '$pshortdesc' ,  img_banner = '$TARGET_PATH', year = '$year' WHERE proj_id = '$projectid'";
}


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