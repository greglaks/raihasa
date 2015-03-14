/**
 * 
 */

function getAdminQuery() {
	var xmlhttp;
  	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
//      document.getElementById(id).innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","admin_query_category.php",false);
  xmlhttp.send();
  return xmlhttp.responseText;
}
function insertProjectImage(projectId, fileImage){
	
	var file = document.getElementById("fileToUpload"); 
	var data = file.files[0];
	var formdata = new FormData();
    formdata.append("fileimage", data);
    formdata.append("projectid", projectId);
	var xmlhttp;
  	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
//      document.getElementById(id).innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("POST","admin_upload_project_image.php", false);
  xmlhttp.send(formdata);
  return xmlhttp.responseText;
}
function initProjectCombobox(){
	var select = document.getElementById('projectselectlist');
	var projectlist = getAdminQuery();
	var json = JSON.parse(projectlist);
	for(var i=0; i<json.length; i++){
		var cat = json[i].cat;
		var cat_id = json[i].cat_id;
		select.options[select.options.length] = new Option(cat,cat_id); 
	}
}

function submitProjectImage(){
	var projectId = document.getElementById('projectlist').value;
	var imagefile = document.getElementById('fileToUpload').value;
	
	if(imagefile == ""){
		alert("Please upload a file image");
		return;
	}
	
	var re=insertProjectImage(projectId, imagefile);
	alert(re);
}

function saveValue(val){
	var updatedValue = val.value;
	var id = val.id;
	var result = doUpdateValue(id, updatedValue);
	if(result == 201){
		alert("Update is success");
	}
	else{
		alert("Update is fail. Please try again");
	}
}

function doUpdateValue(val, updatedValue){

	var xmlhttp;
	var params = "updatevalue="+updatedValue+"&val="+val;
  	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
//      document.getElementById(id).innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("POST","admin_update_value.php", false);
  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xmlhttp.send(params);
  
  return xmlhttp.responseText;
}

function logout(){

	var xmlhttp;
  	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
//      document.getElementById(id).innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("POST","logout.php", false);
  xmlhttp.send();
 window.location.href ="../login.html";
}

function categoryOp(val, categoryid, type){

	var updatedValue = val.value;
	if(type == 3){
		if(confirm("Are you sure to delete?")){
			categoryOperation(type, updatedValue, categoryid);
			location.reload();			
		}else{
			return;
		}
	}
	categoryOperation(type, updatedValue, categoryid);
	location.reload();	
}
function addCategory(val){
	var updatedValue = val.value;
	categoryOperation(2, updatedValue, null);
	location.reload();
}
function categoryOperation(type, val, categoryid){
	var xmlhttp;
	var params = "";
  	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
//      document.getElementById(id).innerHTML=xmlhttp.responseText;
    }
  }
  if(type == 1){
	  params = "catid="+categoryid+"&value="+val;
	  xmlhttp.open("POST","category_update.php", false);
  }
  else if(type == 2){
	  params = "value="+val;
	  xmlhttp.open("POST","category_add.php", false);
  }else{
	  params = "catid="+categoryid;
	  xmlhttp.open("POST","category_delete.php", false);
  }
 
  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xmlhttp.send(params);
  
  return xmlhttp.responseText;
}
function triggerUpload(){
	document.getElementById("projectitemhumbimg").submit();
	location.reload();
}

function saveProjectVal(pid, projclient, pshortdesc, projectselectid,projectname,projectdescription, title1, title2, title3){
	var category = projectselectid.value;
	var name = projectname.value;
	var description = projectdescription.value;
	var shortdesc = pshortdesc.value;
	var client = projclient.value;
	var t1 = title1.value;
	var t2 = title2.value;
	var t3 = title3.value;
	if(name.length == 0 || client.length == 0){
		alert("Project name or client is missing");
		return;
	}
	
	var respond = saveProjectToServer(pid, client, shortdesc, category, name, description, t1, t2, t3);
	location.reload();
	
}
function deleteProject(pid){
	var projectId = pid.value;
	if(confirm("Are you sure to delete this project")){
		deleteProjectOperation(pid);
		location.reload();
	}
}
function deleteProjectOperation(pid){
	var xmlhttp;
	var params = "pid="+pid;
  	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
//      document.getElementById(id).innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("POST","project_delete.php", false);
  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xmlhttp.send(params);
  
  return xmlhttp.responseText;
}
function saveProjectToServer(pid, client, shortdesc, category, name, description, t1, t2, t3){
	var xmlhttp;
	var params = "pid="+pid+"&client="+client+"&psdesc="+shortdesc+"&catid="+category+"&projectname="+name+"&desc="+description+"&t1="+t1+"&t2="+t2+"&t3="+t3;
  	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
//      document.getElementById(id).innerHTML=xmlhttp.responseText;
    }
  }
	
  xmlhttp.open("POST","project_save.php", false);

  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xmlhttp.send(params);
  
  return xmlhttp.responseText;
}
function newProject(newprojecttext,newprojectclient, newpshortdesc, categoryselect,newprojectdescription, ptitle1, ptitle2, ptitle3){
	var enewprojecttext = newprojecttext.value;
	var ecategoryselect = categoryselect.value;
	var enewprojectdescription = newprojectdescription.value;
	var enewpshortdesc = newpshortdesc.value;
	var client = newprojectclient.value
	var title1 = ptitle1.value;
	var title2 = ptitle2.value;
	var title3 = ptitle3.value;
	
	newProjectOperation(enewprojecttext, client, enewpshortdesc,ecategoryselect,enewprojectdescription, title1, title2, title3);
	location.reload();
}

function newProjectOperation(enewprojecttext, newprojectclient, enewpshortdesc,ecategoryselect,enewprojectdescription, title1, title2, title3){
	var xmlhttp;
	var params = "catid="+ecategoryselect+"&client="+newprojectclient+"&enewpshortdesc="+enewpshortdesc+"&enewprojecttext="+enewprojecttext+"&desc="+enewprojectdescription+"&t1="+title1+"&t2="+title2+"&t3="+title3;
  	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
//      document.getElementById(id).innerHTML=xmlhttp.responseText;
    }
  }
	
  xmlhttp.open("POST","project_new.php", false);

  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xmlhttp.send(params);
  
  return xmlhttp.responseText;
}

function deleteProjectImage(pimgid){
	if(confirm("Are you sure to delete this image")){
		deleteProjectImageOp(pimgid);
		location.reload();		
	}
}

function deleteProjectImageOp(id){
	var xmlhttp;
	var params = "pimgid="+id;
  	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
//      document.getElementById(id).innerHTML=xmlhttp.responseText;
    }
  }
	
  xmlhttp.open("POST","project_image_delete.php", false);

  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xmlhttp.send(params);
  
  return xmlhttp.responseText;
}

function uploadProjectImageFile(t,  projImgId){
	var myFormData = new FormData();
	var file = t.files[0];
	myFormData.append('projectimagefile', file);
	myFormData.append('projImgId', projImgId);
	saveImage(myFormData);
	location.reload();
}

function saveImage(image){
	var xmlhttp;
  	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
//      document.getElementById(id).innerHTML=xmlhttp.responseText;
    }
  }
	
  xmlhttp.open("POST","saveImageProjectImage.php", false);
  xmlhttp.send(image);
  
  return xmlhttp.responseText;
}