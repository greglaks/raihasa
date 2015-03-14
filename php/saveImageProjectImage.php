<?php
include 'session.php';
include "image.php";
$allowed = array('png', 'jpg', 'gif');
//if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
$image = $_FILES['projectimagefile'];
$filename = $image['name'];
$projectImageId = $_POST['projImgId'];
$extension = pathinfo($_FILES['projectimagefile']['name'], PATHINFO_EXTENSION);

if(!in_array(strtolower($extension), $allowed)){
	echo '{"status":"error"}';
	exit;
}

$newfilename = filename_safe($image['name']);
$TARGET_PATH = "images/".$newfilename;

if(!empty($TARGET_PATH)){
	$im = new MyImage();
	$im->delProjImgPath($projectImageId);
}

if(move_uploaded_file($_FILES['projectimagefile']['tmp_name'], $TARGET_PATH)){
	$sql = "UPDATE  `proj_img` SET img = '$TARGET_PATH'  WHERE  id_img = '$projectImageId'";
//	$sql = "UPDATE `project` SET  thumb_img_path = '$TARGET_PATH' WHERE `proj_id` =  '$projectid' ";
	if(!mysqli_query($conn, $sql)){
		echo("Error description: " . mysqli_error($conn));
	}
	mysqli_close($conn);
	
}
else{
	$error = $_FILES['projectimagefile']['error'];
	
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
?>