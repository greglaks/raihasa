<?php
include 'session.php';
include 'projectquery.php';

$ress = "";
$cpnse = "";
$cress = "";
foreach ($ardata as $key => $arval){
	$cress = $cress."<OPTION VALUE=".$key.">".$arval."</OPTION>" ;
}
$cpnse = "<SELECT name='projectselect' class='defaulttext'>".$cress."</SELECT>";

$logout = "logout";

echo "<link href='../general.css' rel='stylesheet' type='text/css' />";
echo "<script src='admin.js'></script>";
echo "<button style='position:relative; margin:20px 40px;' onclick='logout()' class='logoutbutton'>Logout</button>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js'></script>
<a href='myadmin.php' style='margin:20px 40px;' class='defaultlink'>General</a>
<a href='category.php' style='margin:20px 40px;' class='defaultlink'>Category</a>
<a href='project.php' style='margin:20px 40px;' class='defaultlink'>Project</a>
<a href='projectimage.php' style='margin:20px 40px;' class='defaultlink'>Project image</a>";

echo "<div class='adminprojectitem'>
		<h3>Add new image</h1>
		
			<table class='tablespacing'>		
				
		
				<form action='newfile.php' method='post' enctype='multipart/form-data' id='projectitemhumbimg'>
				
				<tr>
					<td>File photo</td>					
					<td><input type='file' name='upload' style='display:block;'/></td>
				</tr>
				
				<tr>
				<td>Project</td>
				<td>$cpnse</td>
				</tr>
				
				<tr>
					<td>Title</td>
					<td><input type='text' name='title'/></td>
				</tr>
				<tr>
					<td>Image title:</td>
					<td><input type='text' name='img_title'/></td>
				</tr>
				<tr>
					<td>Image description:</td>
					<td><textarea rows='4' cols='50' name='img_description' class='defaulttext'></textarea></td>
				</tr>

				<tr>
					<td></td>
					<td><input type='submit' value='submit'></td>
				</tr>
				</form>
				
				<td></td>
				</tr>
			</table>
		
	</div>";
$pq = new ProjectQuery();
$result = $pq->getResult();
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$finalcategory = "";
		$ress = "";
		$projectid = $row['proj_id'];
		$projimgid = $row['id_img'];
		$projectname = $row['name'];
		$img = $row['img'];
		$img_title =$row['img_title'];
		$img_description =$row['img_description'];
		$title = $row['ptitle'];
		$projectfile = "ptfileid".$projectid;
		$projectselectid = "psid".$projectid;

		foreach ($ardata as $key => $arval){
			$prId = $key;
			$prname = $arval;
			$fieldid = "fieldid" . $prId;
			if($projectid == $prId){
				$ress = $ress."<OPTION VALUE=".$prId." selected>".$prname."</OPTION>" ;
			}else{
				$ress = $ress."<OPTION VALUE=".$prId.">".$prname."</OPTION>" ;
			}
		}

		$finalcategory = "<SELECT id=$projectselectid  name='projectselected' class='defaulttext'>".$ress."</SELECT>";

		echo "
		<div class='adminprojectitem'>
		<form class='adminprojectform' method='post' action='proj_img_update.php'>
		<table class='tablespacing'>
		<input type='hidden' value='$projimgid' name='imgid'>
		<tr>
		<td>Project: </td>
		<td>
		$finalcategory
		</td>
		</tr>
		
		<tr>
		<td></td>
		<td><img alt='' src=$img width='200px' height='200px'></td>
		</tr>
		
		<tr>
		<td></td>
			<td> <input type='file' name='projectimagefile' id='projectimagefile' onchange='uploadProjectImageFile(this,$projimgid )'></td>
		</tr>
		
		<tr>
		<td>Title</td>
		<td><input type='text' name='title' value='$title'/></td>
		</tr>

		<tr>
			<td>Image title:</td>
			<td><input type='text' name='img_title' value='$img_title'/></td>
		</tr>
		<tr>
			<td>Image description:</td>
			<td><textarea rows='4' cols='50' name='img_description' class='defaulttext'>$img_description</textarea></td>
		</tr>

		<tr>
			<input type ='hidden' name='projectid'/>
			<td></td>
			<td><input type='submit' value='Update'></td>
		</tr>			
		
		<tr>
			<input type ='hidden' name='projectid'/>
			<td></td>
			<td><button onclick='deleteProjectImage($projimgid)'>Delete</button></td>
		</tr>
		
		<tr>
		<td></td>
		</tr>
		
		
		
		

		</table>
		</form>
		</div>";


	}
	}
?>