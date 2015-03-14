<?php
include 'session.php';
include "connection.php";
$allowed = array('png', 'jpg', 'gif');
//if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}

//}
$projectid =$_POST['projectselect'];
$title =$_POST['title'];
$img_title =$_POST['img_title'];
$img_description =$_POST['img_description'];
$image = $_FILES['upload'];
$location = $_FILES['upload']['tmp_name'];
$fnamesafe = filename_safe($image['name']);
$TARGET_PATH = "images/".$fnamesafe;

//move_uploaded_file($image['name'],$TARGET_PATH);
if(move_uploaded_file($_FILES['upload']['tmp_name'],$TARGET_PATH)){
	
	
	$sql = "INSERT INTO `proj_img` ( proj_id, img, ptitle, img_title, img_description ) VALUES ('$projectid', '$TARGET_PATH', '$title', '$img_title', '$img_description')";
	if(!mysqli_query($conn, $sql)){
		echo("Error description: " . mysqli_error($conn));
	}
	mysqli_close($conn);
}
else{
	echo "false";
}

function filename_safe($filename) {
	$temp = $filename;

	// Lower case
	$temp = strtolower($temp);

	// Replace spaces with a '_'
	$temp = str_replace(" ", "_", $temp);
	$temp = str_replace("(", "_", $temp);
	$temp = str_replace(")", "_", $temp);

	// Return filename
	return $temp;
}
header("Location: projectimage.php");
exit;
?>