<?php
include "connection.php";
$projectid = $_POST['pid'];
deleteThumImg($projectid);
$sql = "DELETE FROM `project` WHERE `proj_id`= '$projectid'";
if(!mysqli_query($conn, $sql)){
		
	echo "404";
}
else{
	echo "201";
}

$conn->close();

function deleteThumImg($prjImgId){
	$conn = createConnection();
	$csql = "SELECT `project`.`thumb_img_path` FROM `project` WHERE `proj_id` = $prjImgId ";
	$cresult = $conn->query($csql);
	if ($cresult->num_rows > 0) {
		while($row = $cresult->fetch_assoc()) {
			$path = $row['thumb_img_path'];
		}
		unlink($path);
	}
	$conn->close();
}
?>