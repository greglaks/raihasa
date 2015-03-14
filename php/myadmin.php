<?php

include 'session.php';
include 'queryadmin.php';
include "connection.php";
 $ob = new QVal;
 
 $street = $ob->getQuery($conn, 'street');
 $city = $ob->getQuery($conn, 'city');
 $addaddress = $ob->getQuery($conn, 'additional_address');
 $telp = $ob->getQuery($conn, 'telp');
 $email = $ob->getQuery($conn, 'email');
 
 $who_we_are = $ob->getQuery($conn, 'who_we_are');
 $wwd_graphic_design = $ob->getQuery($conn, 'wwd_graphic_design');
 $wwd_corporate_design = $ob->getQuery($conn, 'wwd_corporate_design');
 $wwd_branding = $ob->getQuery($conn, 'wwd_branding');
 $wwd_publishing_desig = $ob->getQuery($conn, 'wwd_publishing_desig');
 $wwd_ilustration = $ob->getQuery($conn, 'wwd_ilustration');
 
 $about_us_general = $ob->getQuery($conn, 'about_us_general');
 $about_us_synergy = $ob->getQuery($conn, 'about_us_synergy');
 $about_us_critical = $ob->getQuery($conn, 'about_us_critical');
 $about_us_integrity = $ob->getQuery($conn, 'about_us_integrity');
 $about_us_service = $ob->getQuery($conn, 'about_us_service');
 $cu_contact_us = $ob->getQuery($conn, 'cu_contact_us');
 
 $conn->close();
 
 $streetid = 'street';
 
 $cityid = 'city';
 $addaddressid = 'additional_address';
 $telpid = 'telp';
 $emailid = 'email';
 
 $who_we_areid = 'who_we_are';
 $wwd_graphic_designid = 'wwd_graphic_design';
 $wwd_corporate_designid = 'wwd_corporate_design';
 $wwd_brandingid = 'wwd_branding';
 $wwd_publishing_desigid = 'wwd_publishing_desig';
 
 
 $about_us_generalid = 'about_us_general';
 $about_us_synergyid = 'about_us_synergy';
 $about_us_criticalid = 'about_us_critical';
 $about_us_integrityid = 'about_us_integrity';
 $about_us_serviceid = 'about_us_service';
 $about_us_serviceid = 'about_us_service';
 $wwd_ilustrationid = 'wwd_ilustration';
 $cu_contact_usid = 'cu_contact_us';
 
 $logout = 'logout';
 $category = 'category';
 $project = 'project';
 
echo "<link href='../general.css' rel='stylesheet' type='text/css' />
<title>My Admin</title>
<script src='admin.js'></script>
<button style='position:relative; margin:20px 40px;' onclick='logout()' class='logoutbutton'>Logout</button>
<a href='myadmin.php' style='margin:20px 40px;' class='defaultlink'>General</a>
<a href='category.php' style='margin:20px 40px;' class='defaultlink'>Category</a>
<a href='project.php' style='margin:20px 40px;' class='defaultlink'>Project</a>
<a href='projectimage.php' style='margin:20px 40px;' class='defaultlink'>Project image</a>
<div class='adminwrapper'>

<div class='sectiondiv'>

<div class='sectionitem'>
<h1 style='color:#555555'>Contact</h1>
<table style='border-spacing:10px;'>
<tr>
<td>Street</td>
<td style='width:200px'></td>
<td><input type='text' value='$street' id='street' class='defaulttext'></td>
<td><button onClick='saveValue($streetid);'>Save</button></td>
</tr>
<tr>
<td>City</td>
<td style='width:200px'></td>
<td><input type='text' value='$city' id='city' class='defaulttext'></td>
<td><button onClick='saveValue($cityid);'>Save</button></td>
</tr>
<tr>
<td>Additional address</td>
<td style='width:200px'></td>
<td><input type='text' value='$addaddress' id='additional_address' class='defaulttext'></td>
<td><button onClick='saveValue($addaddressid);'>Save</button></td>
</tr>
<tr>
<td>Telp</td>
<td style='width:200px'></td>
<td><input type='text' value='$telp' id='telp' class='defaulttext'></td>
<td><button onClick='saveValue($telpid);'>Save</button></td>
</tr>
<tr>
<td>Email</td>
<td style='width:200px'></td>
<td><input type='text' value='$email' id='email' class='defaulttext'></td>
<td><button  onClick='saveValue($emailid);'>Save</button></td>
</tr>
</table>
</div>
<div class='sectionitem'>
<h1 style='color:#555555'>Home</h1>
<table style='border-spacing:10px;'>
<tr>
<td>Who we are</td>
<td style='width:200px'></td>
<td><textarea rows='4' cols='80' id='who_we_are' class='defaulttext'>$who_we_are</textarea></td>
<td><button onClick='saveValue($who_we_areid);'>Save</button></td>
</tr>
<tr>
<td>Graphic design</td>
<td style='width:200px'></td>
<td><textarea rows='4' cols='80' id='wwd_graphic_design' class='defaulttext'>$wwd_graphic_design</textarea></td>
<td><button onClick='saveValue($wwd_graphic_designid);'>Save</button></td>
</tr>
<tr>
<td>Corporate design</td>
<td style='width:200px'></td>
<td><textarea rows='4' cols='80' id='wwd_corporate_design' class='defaulttext'>$wwd_corporate_design</textarea></td>
<td><button onClick='saveValue($wwd_corporate_designid);'>Save</button></td>
</tr>
<tr>
<td>Branding design</td>
<td style='width:200px'></td>
<td><textarea rows='4' cols='80' id='wwd_branding'  class='defaulttext'>$wwd_branding</textarea></td>
<td><button onClick='saveValue($wwd_brandingid);'>Save</button></td>
</tr>
<tr>
<td>Publishing design</td>
<td style='width:200px'></td>
<td><textarea rows='4' cols='80' id='wwd_publishing_desig' class='defaulttext'>$wwd_publishing_desig</textarea></td>
<td><button onClick='saveValue($wwd_publishing_desigid);'>Save</button></td>
</tr>
<tr>
<td>Ilustration</td>
<td style='width:200px'></td>
<td><textarea rows='4' cols='80' id='wwd_ilustration' class='defaulttext'>$wwd_ilustration</textarea></td>
<td><button onClick='saveValue($wwd_ilustrationid);'>Save</button></td>
</tr>
</table>
</div>

<div class='sectionitem'>
<h1 style='color:#555555'>About us</h1>
<table style='border-spacing:10px;'>
<tr>
<td>About us</td>
<td style='width:200px'></td>
<td><textarea rows='4' cols='80' id='about_us_general' class='defaulttext'>$about_us_general</textarea></td>
<td><button onClick='saveValue($about_us_generalid);'>Save</button></td>
</tr>
<tr>
<td>About us synergy</td>
<td style='width:200px'></td>
<td><textarea rows='4' cols='80' id='about_us_synergy' class='defaulttext'>$about_us_synergy</textarea></td>
<td><button onClick='saveValue($about_us_synergyid);'>Save</button></td>
</tr>
<tr>
<td>About us critical</td>
<td style='width:200px'></td>
<td><textarea rows='4' cols='80' id='about_us_critical' class='defaulttext'>$about_us_critical</textarea></td>
<td><button onClick='saveValue($about_us_criticalid);'>Save</button></td>
</tr>
<tr>
<td>About us integrity</td>
<td style='width:200px'></td>
<td><textarea rows='4' cols='80' id='about_us_integrity' class='defaulttext'>$about_us_integrity</textarea></td>
<td><button onClick='saveValue($about_us_integrityid);'>Save</button></td>
</tr>
<tr>
<td>About us service</td>
<td style='width:200px'></td>
<td><textarea rows='4' cols='80' id='about_us_service' class='defaulttext'>$about_us_service</textarea></td>
<td><button onClick='saveValue($about_us_serviceid);'>Save</button></td>
</tr>
</table>
</div>
<div class='sectionitem'>

<h1 style='color:#555555'>Contact us</h1>
<table>
<tr>
<td style='width:117px;padding-left:20px;'>Contact us</td>
<td style='width:200px'></td>
<td><textarea rows='4' cols='80' id='cu_contact_us' class='defaulttext'>$cu_contact_us</textarea></td>
<td><button onClick='saveValue($cu_contact_usid);'>Save</button></td>
</tr>
</table>
</div>
</div>
</div>";
?>