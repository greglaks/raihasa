<?php
include 'session.php';
include 'categoryquery.php';

$ress = "";
$cpnse = "";
$cress = "";
foreach ($ardata as $key => $arval){
	$cress = $cress."<OPTION VALUE=".$key.">".$arval."</OPTION>" ;
}

$cpnse = "<SELECT name='categoryname' class='defaulttext'>".$cress."</SELECT>";
$qcat = new QueryCat();
$result = $qcat->getResult();


echo "<link href='../general.css' rel='stylesheet' type='text/css' />";
echo "<script src='admin.js'></script>";
echo "<button style='position:relative; margin:20px 40px;' onclick='logout()' class='logoutbutton'>Logout</button>
<a href='myadmin.php' style='margin:20px 40px;' class='defaultlink'>General</a>
<a href='category.php' style='margin:20px 40px;' class='defaultlink'>Category</a>
<a href='project.php' style='margin:20px 40px;' class='defaultlink'>Project</a>
<a href='projectimage.php' style='margin:20px 40px;' class='defaultlink'>Project image</a>";



echo "<div class='adminprojectitem'>
		<form class='adminprojectform' action='project_new.php' method='post' enctype='multipart/form-data'>
			<table class='tablespacing'>
				<tr>
				<td>Project</td>
				<td><input type='text' name='newprojecttext' class='defaulttext'></td>
				</tr>
			
				<tr>
				<td>Category</td>
				<td>".$cpnse."<td>
				</tr>

				<tr>
				<td>Short description:</td>
				<td><input type='text' maxlength='40' name='newpshortdesc' class='defaulttext'/></td>						
				</tr>

				<tr>
				<td>Image banner:</td>
				<td><input type='file' name='image_banner'  /></td>				
				</tr>
						
				<tr>
				<td>Client:</td>
				<td><input type='text' maxlength='40' name='projclient' class='defaulttext'/></td>						
				</tr>	

				<tr>
				<td>Client:</td>
				<td><input type='text' maxlength='40' name='projyear' class='defaulttext'/></td>						
				</tr>

				<tr>
				<td></td>
				<td><input type='submit' value='Create new project'></td>
				</tr>
			</table>
		</form>
	</div>";

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$finalcategory = "";
		$ress = "";
		$projectid = $row['proj_id'];
		$projectname = $row['name'];
		$category = $row['cat'];
		$projclient = $row['client'];
		$categoryid = $row['cat_id'];
		$thumb_img = $row['thumb_img_path'];
		$pshort_description = $row['short_desc'];
		$img_src = $row['img_banner'];
		$projyear = $row['year'];
		
		$projecttextfieldid = "ptfid".$projectid;
		$projectselectid = "psid".$projectid;
		$projectdescriptionid = "pdescid".$projectid;
		$projectshdescriptioid = "psdescid".$projectid;
		$projectclientid = "pclientid".$projectid;
		$projecttitle1id = "ptitle1".$projectid;
		$projecttitle2id = "ptitle2".$projectid;
		$projecttitle3id = "ptitle3".$projectid;
		$projyearid = "projyear".$projectid;
	
		foreach ($ardata as $key => $arval){
			$categoryId = $key;
			$categoryname = $arval;
			$fieldid = "fieldid" . $categoryId;
			if($categoryid == $categoryId){
				$ress = $ress."<OPTION VALUE=".$categoryId." selected>".$categoryname."</OPTION>" ;
			}else{
				$ress = $ress."<OPTION VALUE=".$categoryId.">".$categoryname."</OPTION>" ;
			}
		}
		
		$finalcategory = "<SELECT id=$projectselectid name='categoryname' class='defaulttext'>".$ress."</SELECT>";
		
		echo "
			<div class='adminprojectitem'>
				<form class='adminprojectform' action='project_save.php' method='post' enctype='multipart/form-data'>
					<input type='hidden' name='pid' value='$projectid'>
					<table class='tablespacing'>
						<tr>
							<td>Project: </td>
							<td><input type='text' name='projectname' value='$projectname' id=$projecttextfieldid  class='defaulttext'></td>
						</tr>
						<tr>
							<td>Category: </td>
							<td>
								$finalcategory
							</td>
						</tr>
						<tr>
						<td>Short description:</td>
						<td><input type='text' maxlength='40' name='shortdescription' value='$pshort_description' id='$projectshdescriptioid' class='defaulttext'/></td>						
						</tr>
						
						<tr>
						<td></td>
						<td><img src='$img_src' style='width:250px; height:100px; background:grey'/></td>
						</tr>
						
						<tr>
						<td>Image banner:</td>
						<td><input type='file' name='image_banner'  /></td>				
						</tr>						
						
						<tr>
						<td>Client:</td>
						<td><input type='text' name='client' maxlength='40' value ='$projclient' id='$projectclientid' class='defaulttext'/></td>						
						</tr>					

						<tr>
						<td>Year:</td>
						<td><input type='text' maxlength='40' value ='$projyear' id='$projyearid' name='year' class='defaulttext'/></td>						
						</tr>
						
						<tr>
						<td></td>
						<td><input type='submit' value='Update'></td>
						</tr>			
						<tr>
						<td></td>
						<td><button onclick='deleteProject($projectid)'>Delete</button></td>
						</tr>
						
					</table>
				</form>
				<div class='adminprojitemimage'>
					<img alt='$thumb_img' src='$thumb_img' width='200px' height='200px' style='background:grey;'>
					<form action='newfile2.php' method='post' enctype='multipart/form-data' id='projectitemhumbimg'>
					<input type ='hidden' value=$projectid name='projectid'/>
					<input type='file' name='upload'  style='display:block; margin:0 auto;'/>
					<input type='submit' value='Submit' style='margin-top:10px;'>
					</form>
				</div>
			</div>";
		

	}
}

?>