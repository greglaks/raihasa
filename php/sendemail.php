<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$body = $_POST['body'];

$raihasaEmail = getAddress('email');
$message = wordwrap($body);
$sbj = " Email from Name: ".$name."Email: ".$email." Phone:".$phone;
mail($raihasaEmail,$sbj,$message);
header("Location: ../index.html");
exit;


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
