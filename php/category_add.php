<?php
include 'session.php';
include 'categoryoperation.php';

$value = $_POST["value"];

$catobj = new CatOperation();
$catobj->addNew($value);
?>