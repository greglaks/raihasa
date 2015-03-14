<?php
include 'session.php';
include 'categoryoperation.php';
$catid = $_POST["catid"];

$catobj = new CatOperation();
$catobj->delete($catid);
?>