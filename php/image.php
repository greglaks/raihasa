<?php
include "connection.php";
class MyImage{
	
	function deleteProjThumImg($prId){

		
		$conn = createConnection();
		$csql = "SELECT * FROM `project` WHERE `proj_id` = $prId ";
		$cresult = $conn->query($csql);
		if ($cresult->num_rows > 0) {
			while($row = $cresult->fetch_assoc()) {
				$path = $row['thumb_img_path'];
			}
		}
		
		if(strlen($path)>0){
			unlink($path);
		}
		mysqli_close($conn);
	}
	
	function deleteProjImageBanner($prId){
	
	
		$conn = createConnection();
		$csql = "SELECT * FROM `project` WHERE `proj_id` = $prId ";
		$cresult = $conn->query($csql);
		if ($cresult->num_rows > 0) {
			while($row = $cresult->fetch_assoc()) {
				$path = $row['img_banner'];
			}
		}
	
		if(strlen($path)>0){
			unlink($path);
		}
		mysqli_close($conn);
	}	
	
	function delProjImgPath($prjImgId){
		$conn = createConnection();
		$csql = "SELECT * FROM `proj_img` WHERE `id_img` = $prjImgId ";
		$cresult = $conn->query($csql);
		if ($cresult->num_rows > 0) {
			while($row = $cresult->fetch_assoc()) {
				$path = $row['img'];
			}
		}
	
		if(strlen($path)>0){
			unlink($path);
		}
		mysqli_close($conn);
	}
	
	function deleteProjImage($primgid){
		$conn = createConnection();
		$sql = "DELETE FROM `proj_img` WHERE `id_img`= '$primgid'";
		if(!mysqli_query($conn, $sql)){
			echo "404";
		}
		else{
			echo "201";
		}
		mysqli_close($conn);
	}
}