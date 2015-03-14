<?php
include 'session.php';
include 'image.php';

$primgid = $_POST['pimgid'];

$obj = new MyImage();
$obj->delProjImgPath($primgid);
$obj->deleteProjImage($primgid);


?>