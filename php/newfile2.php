<?php
include 'session.php';
include "image.php";
$allowed = array('png', 'jpg', 'gif');
//if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

$extension = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);

if(!in_array(strtolower($extension), $allowed)){
	echo '{"status":"error"}';
	exit;
}

//}
$projectid = $_POST['projectid'];
$image = $_FILES['upload'];
$location = $_FILES['upload']['tmp_name'];

$newfilename = filename_safe($image['name']);
$TARGET_PATH = "images/".$newfilename;

if(!empty($TARGET_PATH)){
	$im = new MyImage();
	$im->deleteProjThumImg($projectid);
}

//move_uploaded_file($image['name'],$TARGET_PATH);
if(move_uploaded_file($_FILES['upload']['tmp_name'],$TARGET_PATH)){

	$sql = "UPDATE `project` SET  thumb_img_path = '$TARGET_PATH' WHERE `proj_id` =  '$projectid' ";
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
header("Location: project.php");
exit;

?>