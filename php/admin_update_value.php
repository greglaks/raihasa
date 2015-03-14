<?php
include 'queryadmin.php';
$updatedValue = $_POST["updatevalue"];
$val = $_POST["val"];

include "connection.php";
$sql = "UPDATE  `values` SET val = '$updatedValue' WHERE  `dat` = '$val'";
if ($conn->query($sql) === TRUE) {
    echo "201";
} else {
    echo "404";
}

$conn->close();
?>