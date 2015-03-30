<?php
include 'portfolioproject.php';

$id = $_GET['id'];
if(!isset($id)){
	header("Location: ../index.html");
	exit;
}
$ppobj = new Project();

$ardata = $ppobj->getProjectProperty($id);

$category = $ardata['cat'];
$catId = $ardata['cat_id'];
$pname = $ardata['projname'];
$client = $ardata['client'];
$img_banner = $ardata['img_banner'];
$year = $ardata['year'];
$dest = "<button class='buttonnostyle' onClick='gotoHome()'>Home</button> > "."<button class='buttonnostyle' onClick='toPortfolioCat($catId)'>".$category."</button>"." > "."<button class='buttonnostyle'>".$pname."</button>";

$arimgs = $ppobj->getProjectImages($id);
$counts = count($arimgs);
$imgitems = "";
$img = "";
$title = "";
$img_title = "";
$img_description = "";

for($i=1; $i<=$counts; $i++){
	if(empty($arimgs["img".$i])){
		$img = "";
	}
	else{
		$img = $arimgs["img".$i];
	}
	
	if(empty($arimgs["ptitle".$i])){
		$title = "";
	}
	else{
		$title = $arimgs["ptitle".$i];
	}
	
	if(empty($arimgs["img_title".$i])){
		$img_title = "";
	}
	else{
		$img_title = $arimgs["img_title".$i];
	}
	
	if(empty($arimgs["img_description".$i])){
		$img_description = "";
	}else{
		$img_description = $arimgs["img_description".$i];
	}

	
	if(!empty($img)){
		$imgitems =
		"<p class='projectmaintitle' style='color:#898989'>$title</p>
		 <p class='parcontent'>$img_description</p>
		 <p class='pfitemtitle'>$img_title</p>
		 <img src=$img  style='width:600px;'/>".$imgitems;		
	}
	
	
}

echo "
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js'></script>
<script src='../js/portfolio.js'></script>
<script src='../js/myfunctions.js'></script>
<script type='text/javascript'>
document.addEventListener('contextmenu', function(e){
    e.preventDefault();
}, false);
$(function(){
	
	var value = '';
	var request = $.ajax({
		  url: 'home_address.php?param=2',
		  type: 'GET'
		});
		request.done(function(msg) {
		var element = document.getElementById('infotelpemail');
		element.innerHTML = msg;
	});
});
</script>
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600,700' rel='stylesheet' type='text/css'>
<link href='../general.css' rel='stylesheet' type='text/css' />
<link href='../home.css' rel='stylesheet' type='text/css' />
<link href='../portfolio.css' rel='stylesheet' type='text/css' />
<img alt='logo' src='../pagehome/logo.png' width='200px' height='200px' style='position:absolute;left:0;right:600px;top:7px;margin:0 auto;z-index:20;'>		
<div id='headermenu' class='basebackgroundcolor'>
<button class='mainmenubutton' id='m1' onclick='selectpf(m1);'>home</button>
<button class='mainmenubutton' id='m2' onclick='selectpf(m2);'>about us</button>
<button class='mainmenubutton' id='m3' onclick='selectpf(m3);'>portfolio</button>
<button class='mainmenubutton' id='m4' onclick='selectpf(m4);'>contact us</button>
</div>
<img  src='$img_banner' class='portfoliosingbg'>

<div id='pfoliodetailcontent'>
<input type='hidden'  id='ptid' >
<div class='middlepagesection' >

<p class='portfoliodest'>$dest</p>
<div class='pptitlediv'>
	<p class='porttitfolioproject'>$pname</p>
	<p style='margin:0px;'><span class='textnormal basecolor'>Client : </span> <span class='textbold basecolor'>$client</span></p>
	<p style='margin:0px;'><span class='textnormal basecolor'>Category : </span> <span class='textbold basecolor'>$category</span></p>
	<p style='margin:0px;'><span class='textnormal basecolor'>Year : </span> <span class='textbold basecolor'>$year</span></p>

</div>

<div class='pfmaincontent'>
<div class='parcontent'>

</div>

<div id='pfpicture' class='textnormal basecolor'>
$imgitems
</div>
</div>
</div>
	<div id='footer'>
		
		<div class='middlepagesection' style='padding:0px;'>
			<div id='socialmediacontact'>
			
				
					<a href='https://www.facebook.com/raihasa' class='sosmedlink' style='border-right:none;'><i class='fa fa-facebook'></i></a>
					<a href='https://twitter.com/RaihasaVisual' class='sosmedlink' style='border-right:none;'><i class='fa fa-twitter'></i></a>
					<a href='mailto:info@raihasa.com' class='sosmedlink' ><i class='fa fa-envelope'></i></a>
				<p style='font-weight:bold;margin:5px 0px;line-height:30px;'>Terms and conditions - Privacy Policy</p>
				<p style='color: rgb(111,111,111);font-weight:bold;margin:5px 0px;line-height:30px;' class='textnormal'>
					2012 Copyright. Raihasa Media. All rights reserved.
				</p>
				
				<p style='color:rgb(117,117,117);text-align:left;line-height:0px;font-weight:bold;'>Contact:</p>
				<p id='address' style='color: rgb(111,111,111);margin:0px;text-align:left;' class='textnormal' >
				<p id='infotelpemail' style='color: rgb(111,111,111);line-height:10px !important;margin:0px;text-align:left;'  class='textnormal'>	
				
				
			</div>
		</div>	

		
	<div class='ilustrationfooter'>
	</div>
	
	</div>
	<link href='../font-awesome/css/font-awesome.css' rel='stylesheet'>
	<link href='../font-awesome/css/font-awesome.min.css' rel='stylesheet'>
";
?>