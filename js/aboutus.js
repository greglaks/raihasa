function getAbGeneral() {
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
  xmlhttp.open("GET","php/ab_general.php",true);
  xmlhttp.send();
  return xmlhttp.responseText;
}
function getAbCritical() {
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
  xmlhttp.open("GET","php/ab_critical.php",true);
  xmlhttp.send();
  return xmlhttp.responseText;
}
function getAbIntegrity() {
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
  xmlhttp.open("GET","php/ab_integrity.php",true);
  xmlhttp.send();
  return xmlhttp.responseText;
}
function getAbService() {
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
  xmlhttp.open("GET","php/ab_service.php",true);
  xmlhttp.send();
  return xmlhttp.responseText;
}
function getAbSynergy() {
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
  xmlhttp.open("GET","php/ab_synergy.php",true);
  xmlhttp.send();
  return xmlhttp.responseText;
}