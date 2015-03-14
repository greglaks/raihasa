<?php
include 'connection.php';

$json_array = array();
//$sql = "SELECT * FROM `proj_img` INNER JOIN `project` ON `project`.`proj_id` = `proj_img`.`proj_id`";
//$sql = "SELECT * FROM `project` INNER JOIN `proj_img` ON `proj_img`.`proj_id` = `project`.`proj_id`";
$sql = "SELECT * FROM `project`";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
	$json_array[] = $row ;
}



echo json_encode($json_array);
$conn->close();


?>