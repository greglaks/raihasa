<?php
include "connection.php";

$ardata = Array();
$cress = "";
$csql = "SELECT * FROM `category`";
$cresult = $conn->query($csql);
if ($cresult->num_rows > 0) {
	while($row = $cresult->fetch_assoc()) {
		$ccatid = $row['cat_id'];
		$ccname = $row['cat'];
		$aritem = array($ccatid => $ccname);
		$ardata = $ardata + $aritem;

	}
} 
$conn->close();

class QueryCat{
	
		function getResult(){
			$conn = createConnection();
			$sql = "SELECT * FROM `project` INNER JOIN `category` ON `project`.`cat_id` = `category`.`cat_id`";
			$result = $conn->query($sql);
			$conn->close();
			return $result;
		}
}

?>