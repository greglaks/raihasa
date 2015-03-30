<?php
include "connection.php";
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$body = $_POST['body'];

$raihasaEmail = getAddress('email');
$message = wordwrap($body);
$message = "Email: ".$email."\n"."Name:".$name."\n"."Phone:".$phone."\n\n".$message;
$sbj = "Subject from ".$name;


if (mail($raihasaEmail,$sbj,$message)) {
	echo "0";
	exit;
}
else{
	echo "-1";
	exit;
}



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
