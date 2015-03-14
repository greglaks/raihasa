function toPortfolioCat(catId) {
	var id = catId;
	window.location = "../#portfolio?cat="+catId;
}
function gotoHome(){
	window.location = "../index.html#home";
}
function initAllPictures(){
	
	var result = getAllPortfolioPictures();
	fillInTable(result );
}
function fillInTable(result){
	var tableElement = document.getElementById('portfolioitemcontent');
	var t = JSON.parse(result);
	var obj;
	var catlink;
	var index = 1;
	var content = "<tr>";
	for(obj of t){
		var proj_id = obj.proj_id;
		var name = obj.name;
		var short_desc = obj.short_desc;
		var thumb_img_path = "";
		if(obj.thumb_img_path.length > 0){
			thumb_img_path = "php/"+obj.thumb_img_path;		
			content = content + "<td><div class='portfolioitem' onclick='viewProjectPortfolio("+proj_id+")' style='background-image:url("+thumb_img_path+");'><div class='portfoliobg'><p class='pfitempname'>"+name+"</p><p class='pfitemdesc'>"+short_desc+"</p></div></div></td>";
		}
		if(index<4){			
			index++;
		}
		else{
			content = content +"</tr>";
			content = content +"<tr>";
			index = 1;
//			content = content + "<td><div class='portfolioitem' onclick='viewProjectPortfolio("+proj_id+")' style='background-image:url("+thumb_img_path+");'><div class='portfoliobg'><p class='pfitempname'>"+name+"</p><p class='pfitemdesc'>"+short_desc+"</p></div></div></td>";
		}
		var projid = obj.proj_id;
//		var img = obj.img;
//		var id_img = obj.id_img;
//		var cat_id = obj.cat_id;
		
		var description = obj.description;
	}
	tableElement.innerHTML = "";
	tableElement.innerHTML = content;
}
function initCategory(){
	var catlist = document.getElementById('portfoliocategory');
	var result = getAllCategories();
	var t = JSON.parse(result);

	var c = "<li><button class='categorybutton' onclick='initAllPictures()' style='border-right:1px solid #959595'>All categories</button></li>";
	for(var i = 0;i<t.length; i++){
		var obj = t[i];
		var cat = obj.cat;
		var cat_id = obj.cat_id;
		if(i == (t.length)-1){
			c = c + "<li><button class='categorybutton' onclick='viewProjectonCategory("+cat_id+")' >"+cat+"</button></li>"			
		}
		else{
			c = c + "<li><button class='categorybutton' onclick='viewProjectonCategory("+cat_id+")' style='border-right:1px solid #959595'>"+cat+"</button></li>"
		}
	}
	catlist.innerHTML = "";
	catlist.innerHTML = c;
}
function viewProjectonCategory(catid){

	var result = "";
	$.get('php/portfolioquerycategory.php?catid='+catid ,function(data) {
		fillInTable(data);
	});

}
function getPictureByCategory(catid){
//	var value = "";
//	var request = $.ajax({
//		  url: "php/home_address.php?param=2",
//		  type: "GET"
//		});
//		request.done(function(msg) {
//		var element = document.getElementById('infotelpemail');
//		element.innerHTML = msg;
//	});
	var xmlhttp;
	var params = "catid="+catid;
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	} else { 
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	
		}
	}
	xmlhttp.open("GET","php/portfolioquerycategory.php",true);
	xmlhttp.send(params);
	return xmlhttp.responseText;
}
function getAllPortfolioPictures(){
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	} else { 
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	
		}
	}
	xmlhttp.open("GET","php/portfolio_allpictures.php",true);
	xmlhttp.send();
	return xmlhttp.responseText;
}
function getAllCategories(){
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	} else { 
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	
		}
	}
	xmlhttp.open("GET","php/categoryqueryjson.php",true);
	xmlhttp.send();
	return xmlhttp.responseText;
}
function selectpf(id){
	
	var vid = id.id;
	if(vid == "m1"){
		window.location = "../index.html#home";
	}else if(vid == "m2"){
		window.location = "../index.html#aboutus";
	}else if(vid == "m3"){
		//raihasaa/#portfolio
		window.location = "../index.html#portfolio";
	}else if(vid == "m4"){
		window.location = "../index.html#contactus";
	}else{
		window.location.hash = "#home"
		selectMenuButton('m1');
	}
}
function viewProjectPortfolio(projid){
	window.location.href = "php/portfolio.php?id="+projid;
}
function prevButton(pid){
	var org = pid;
	var projectId = --pid;
	if(projectId < 0)
		projectId = org;
	var projectindex = getProjectIndex(projectId);
	var newProjId = getProjectIdByIndex(projectindex);
	window.location.href = "portfolio.php?id="+newProjId;
	//viewProjectPortfolio(newProjId);
}
function nextButton(pid){
	var projectId = ++pid;
	var projectindex = getProjectIncIndex(projectId);
	var newProjId = getProjectIdByIndex(projectindex);
	window.location.href = "portfolio.php?id="+newProjId;
}
function getProjectIndex(pid){
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	} else { 
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	
		}
	}
	xmlhttp.open("GET","project_index_dec.php?pid="+pid,true);
	xmlhttp.send();
	return xmlhttp.responseText;
}
function getProjectIncIndex(pid){
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	} else { 
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	
		}
	}
	xmlhttp.open("GET","project_index_inc.php?pid="+pid,true);
	xmlhttp.send();
	return xmlhttp.responseText;
}
function getProjectIdByIndex(pindex){
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	} else { 
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	
		}
	}
	xmlhttp.open("GET","project_id_index.php?pindex="+pindex,true);
	xmlhttp.send();
	return xmlhttp.responseText;
}