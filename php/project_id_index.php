<?php
include "connection.php";
$projIndex = $_GET['pindex'];
$projObj = new ProjectIdIndex();
$pid = $projObj->getIdByProjectIndex($projIndex);
echo $pid;
class ProjectIdIndex{
	function getIdByProjectIndex($pindex){
		
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

		$pid = $ardata[$pindex];
		$conn->close();
		return $pid;
	}

	function getMaxProjectCount(){
		
		$index = 1;
		$ardata = array();
		$cress = "";
		$csql = "SELECT * FROM `project`";
		$conn = createConnection();
		$cresult = $conn->query($csql);
		$count = mysqli_num_rows($cresult);
		$conn->close();
		return $count;
	}
}

?>