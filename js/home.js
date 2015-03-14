function getHomeWhoWeAre() {
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
  xmlhttp.open("GET","php/home_who_we_are.php",true);
  xmlhttp.send();
  return xmlhttp.responseText;
}

function getWWDBranding() {
	var xmlhttp;
  	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
 //     document.getElementById(id).innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","php/home_wwd_branding.php",true);
  xmlhttp.send();
  return xmlhttp.responseText;
}
function getWWDCorporateDesign() {
	var xmlhttp;
  	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
 //     document.getElementById(id).innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","php/home_wwd_corporate_design.php",true);
  xmlhttp.send();
  return xmlhttp.responseText;
}

function getWWDGraphicDesign() {
	var xmlhttp;
  	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
 //     document.getElementById(id).innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","php/home_wwd_graphic_design.php",true);
  xmlhttp.send();
  return xmlhttp.responseText;
}

function getWWDIlustration() {
	var xmlhttp;
  	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
 //     document.getElementById(id).innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","php/home_wwd_ilustration.php",true);
  xmlhttp.send();
  return xmlhttp.responseText;
}

function getWWDPublishingDesign() {
	var xmlhttp;
  	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
 //     document.getElementById(id).innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","php/home_wwd_publishing_desig.php",true);
  xmlhttp.send();
  return xmlhttp.responseText;
}
function getAddress(query) {
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
  xmlhttp.open("GET","php/home_address.php?queryaddress="+query,true);
  xmlhttp.send();
  return xmlhttp.responseText;
}
