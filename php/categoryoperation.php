<?php
include 'session.php';
include "connection.php";
class CatOperation{
//$sql = "UPDATE  `values` SET val = '$updatedValue' WHERE  `dat` = '$val'";
	function addNew($val){
		
		$conn = createConnection();
		$sql = "INSERT INTO `category` ( cat ) VALUES ( '$val' )";
		if(!mysqli_query($conn, $sql)){
			
			echo "404";
		}
		else{
			echo "201";
		}
		$conn->close();
	}
	
	function update($cat_id, $val){
		$conn = createConnection();
		
		$sql = "UPDATE `category` SET cat = '$val' WHERE `cat_id` = '$cat_id'";
		if(!mysqli_query($conn, $sql)){
			echo "404";
		}
		else{
			echo "201";
		}	
		$conn->close();
	}
	
	function delete($cat_id){
		$conn = createConnection();
		
		$sql = "DELETE FROM `category` WHERE `cat_id`= '$cat_id'";
		if(!mysqli_query($conn, $sql)){
			echo "404";
		}
		else{
			echo "201";
		}	
		$conn->close();
	}
}
?>