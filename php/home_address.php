<?php
include "connection.php";

$param = $_GET["param"];
if($param == 1){
	$street = getAddress('street');
	$city = getAddress('city');
	$add_address = getAddress('additional_address');
	$value = $street."<br>".$city."<br>".$add_address;	
}
else if($param == 2){
	$telp = getAddress('telp');
	$email = getAddress('email');
	$value = "<br>".$telp ."<br><br>".$email;
}
else if($param == 3){
	$telp = getAddress('telp');
	$value = $telp;
}
else if($param == 4){
	$email = getAddress('email');
	$value = $email;
}
echo $value;

	function getAddress($var){
		$conn = createConnection();
		$sql = "SELECT `val` FROM `values` WHERE `dat` ='" . $var. "'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return  $row['val'];
			}
		} else {
			return "0 results";
		}
		$conn->close();
	}
?>