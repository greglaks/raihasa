<?php
include "connection.php";
$catid = $_GET['catid'];

$json_array = array();
//$sql = "SELECT * FROM `proj_img` INNER JOIN `project` ON `project`.`proj_id` = `proj_img`.`proj_id`";
$sql = "SELECT * FROM `project` WHERE `cat_id` = '$catid' ";
//$sql = "SELECT * FROM `proj_img` INNER JOIN `project` ON `proj_img`.`proj_id` = `project`.`proj_id` INNER JOIN `category` ON `category`.`cat_id` = `project`.`cat_id` WHERE `category`.`cat_id` = '$catid'";
$result = $conn->query($sql);



	while($row = $result->fetch_assoc()) {
		$json_array[] = $row ;
	}


// $sql = "SELECT * FROM `proj_img` INNER JOIN `project` ON `proj_img`.`proj_id` = `project`.`proj_id`";
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
// 	while($row = $result->fetch_assoc()) {
// 		$finalcategory = "";
// 		$ress = "";
// 		$projectid = $row['proj_id'];
// 		$projimgid = $row['id_img'];
// 		$projectname = $row['name'];
// 		$img = $row['img'];
// 		$projectfile = "ptfileid".$projectid;
// 		$projectselectid = "psid".$projectid;

// 	}
// }
echo json_encode($json_array);
$conn->close();
?>