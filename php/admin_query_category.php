<?php
include 'session.php';
include "connection.php";
$json_array = array();
$sql = "SELECT * FROM `category`";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	 $row_array['cat_id'] = $row['cat_id'];
	 $row_array['cat'] = $row['cat'];
	 array_push($json_array, $row_array);
}
echo json_encode($json_array);
$conn->close();
?>