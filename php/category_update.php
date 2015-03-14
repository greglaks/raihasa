<?php
include 'session.php';
include 'categoryoperation.php';

$catid = $_POST["catid"];
$value = $_POST["value"];

$catobj = new CatOperation();
$catobj->update($catid, $value);
?>