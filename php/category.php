<?php
include 'session.php';
include "connection.php";
$logout = "logout";
$sql = "SELECT * FROM `category`";
$result = $conn->query($sql);

echo "<link href='../general.css' rel='stylesheet' type='text/css' />";
echo "<script src='admin.js'></script>";
echo "<button style='position:relative; margin:20px 40px;' onclick='logout()' class='logoutbutton'>Logout</button>
<a href='myadmin.php' style='margin:20px 40px;' class='defaultlink'>General</a>
<a href='category.php' style='margin:20px 40px;' class='defaultlink'>Category</a>
<a href='project.php' style='margin:20px 40px;' class='defaultlink'>Project</a>
<a href='projectimage.php' style='margin:20px 40px;' class='defaultlink'>Project image</a>";
echo "<table class='categorytable'>";
echo "<tr>";
echo "<td>Category</td>";
echo "<td>Edit name</td>";
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$categoryId = $row['cat_id'];
		$categoryname = $row['cat'];
		$fieldid = "fieldid" . $categoryId;
	  echo "<tr>";
	  echo "<td>$categoryname</td>";
	  echo "<td><input type='text' id=$fieldid class='defaulttext'></td>";
	  echo "<td><button onclick='categoryOp($fieldid, $categoryId,1)'>Update</button></td>";
	  echo "<td><button onclick='categoryOp($fieldid, $categoryId,3)'>Delete</button></td>";
	  echo "</tr>";
	}
} 
$conn->close();
echo "<tr>";
echo "<td></td>";
echo "<td><input type='text' id='newcategory' class='defaulttext'></td>";
echo "<td><button onclick='addCategory(newcategory)'>Add </button></td>";
echo "</tr>";
echo "</table>";


?>