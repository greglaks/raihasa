<?php
include "connection.php";

$ardata = Array();
$cress = "";
$csql = "SELECT * FROM `project`";
$cresult = $conn->query($csql);
if ($cresult->num_rows > 0) {
	while($row = $cresult->fetch_assoc()) {
		$projid = $row['proj_id'];
		$projcname = $row['name'];
		$aritem = array($projid => $projcname);
		$ardata = $ardata + $aritem;

	}
} 
$conn->close();

class ProjectQuery{
	function getResult(){
		$conn = createConnection();
		$sql = "SELECT * FROM `proj_img` INNER JOIN `project` ON `proj_img`.`proj_id` = `project`.`proj_id` ORDER BY id_img DESC";
		$result = $conn->query($sql);
		$conn->close();
		return $result;
	}
}
?>