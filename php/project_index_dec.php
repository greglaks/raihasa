<?php
include "connection.php";
$projId = $_GET['pid'];
$projObj = new ProjectIndex();
$array = $projObj->getProjectIndex();
$pid = array_search($projId, $array);
while($pid == false){
	--$projId;
	if($projId <= 0){
		$pid = sizeof($array);
	}else{
		$pid = array_search($projId, $array);;	
	}
}
echo $pid;




class ProjectIndex{
	
	
	function getProjectIndex(){
		$index = 1;
		$ardata = array();
		$cress = "";
		$conn = createConnection();
		$csql = "SELECT * FROM `project`";
		$cresult = $conn->query($csql);
		if ($cresult->num_rows > 0) {
			while($row = $cresult->fetch_assoc()) {
				$project_id = $row['proj_id'];
				$currentArray = array($index => $project_id);
				$ardata = $currentArray + $ardata;
				$index++;
			}
		}
		
		//$indexOf = array_search($pid, $ardata);
		$conn->close();
		return $ardata;
	}
	

}
?>