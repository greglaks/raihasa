<?php
include "connection.php";
class Project{
	
	public function getProjectProperty($pid){
		
		$cress = "";
		$csql = "SELECT * FROM `project` JOIN `category` ON `project`.`cat_id` = `category`.`cat_id` WHERE `project`.`proj_id` = '$pid'";
		$conn = createConnection();
		$cresult = $conn->query($csql);
		
		while($row = $cresult->fetch_assoc()) {
				$myarray = Array("cat" => $row['cat'],
								 "cat_id" => $row['cat_id'],
							 	 "proj_id" => $row['proj_id'], 
								 "projname" => $row['name'],
								 "client" => $row['client'],
								 "img_banner" =>$row['img_banner']);
			}
		mysqli_close($conn);
		return $myarray;
	}
	
	public function getProjectImages($id){
		$cress = "";
		$conn = createConnection();
		$csql = "SELECT * FROM `proj_img` JOIN `project` ON `project`.`proj_id` = `proj_img`.`proj_id` WHERE `project`.`proj_id` = '$id'";
		$cresult = $conn->query($csql);
		$ardata = array();
		$index = 1;
		while($row = $cresult->fetch_assoc()) {
			$myarray = Array("img".$index => $row['img'],
							 "ptitle".$index => $row['ptitle'],
							 "img_title".$index => $row['img_title'],
							 "img_description".$index => $row['img_description']) + $ardata;
			$ardata = $ardata + $myarray;
			++$index;
		}
		mysqli_close($conn);
		return $ardata;
	}

	public function getProjectTitles($id){
		$cress = "";
		$conn = createConnection();
		$csql = "SELECT * FROM `proj_img` JOIN `project` ON `project`.`proj_id` = `proj_img`.`proj_id` WHERE `project`.`proj_id` = '$id'";
		$cresult = $conn->query($csql);
		$ardata = array();
		$index = 1;
		while($row = $cresult->fetch_assoc()) {
			$myarray = Array("title".$index => $row['title']) + $ardata;
			$ardata = $ardata + $myarray;
			++$index;
		}
		mysqli_close($conn);
		return $ardata;
	}
	
}

?>