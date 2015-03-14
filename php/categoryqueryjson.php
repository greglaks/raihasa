<?php

include "connection.php";
$ardata = Array();
$cress = "";
$csql = "SELECT * FROM `category`";
$cresult = $conn->query($csql);
$data = array();

while($row = $cresult->fetch_assoc()) {
	$data[] = $row ;

}
 


echo json_encode($data);

$conn->close();
?>