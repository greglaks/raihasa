function selectMenuButton(id){
	var element = document.getElementById(id);
	
	var menu1 = document.getElementById('m1');
	var menu2 = document.getElementById('m2');
	var menu3 = document.getElementById('m3');
	var menu4 = document.getElementById('m4');
	
	menu1.className = 'mainmenubutton';
	menu2.className = 'mainmenubutton';
	menu3.className = 'mainmenubutton';
	menu4.className = 'mainmenubutton';
	element.className = menu1.className + " mainmenubuttonselected";

	navigateToPage(id);
}
function navigateToPage(id){
	if(id == 'm1'){
		$("#content").load("home.html");
		window.location.hash = "#home";
	}
	else if(id == 'm2'){
		$("#content").load("aboutus.html");
		window.location.hash = "#aboutus";
	}
	else if(id == 'm3'){
		$("#content").load("portfolio.html");
		window.location.hash = "#portfolio";
	}	
	else{
		$("#content").load("contactus.html");
		window.location.hash = "#contactus";
	}
	
	
}

function initAddress(){
	var street = getAddress('street');
	var city = getAddress('city');
	var add_address = getAddress('additional_address');

	var element = document.getElementById('address');
	var result = street +"<br>"+city+"<br>"+add_address;
	element.innerHTML = result;
}

function initContactInfo(){
	var telp = getAddress('telp');
	var email = getAddress('email');
	
	var element = document.getElementById('infotelpemail');
	var result = "<br>"+telp +"<br>"+email;
	element.innerHTML = result;
}