<?php
class QVal{
	

	function getQuery($conn, $var){
		$query = "SELECT * FROM `values` WHERE `dat` = '$var'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		$retvalue = $row['val'];
		return $retvalue;
	}
}

?>