<?php
include "connection.php";
$projId = $_GET['pid'];
$projObj = new ProjectIndex();
$array = $projObj->getProjectIndex();
$pid = array_search($projId, $array);
$max = $projObj->getMax($array);
while($pid == false){
	++$projId;
	if($projId >= $max){
		$pid = 1;
	}else{
		$pid = array_search($projId, $array);;	
	}
}
echo $pid;





class ProjectIndex{
	
	function getMax($array){
		$int = 0;
		foreach($array as $val){
			if($val > $int){
				$int = $val;
			}

		}
		return $int;
	}

	function getProjectIndex(){
		
		$index = 1;
		$ardata = array();
		$cress = "";
		$csql = "SELECT * FROM `project`";
		$conn = createConnection();
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