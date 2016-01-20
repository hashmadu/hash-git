//var xmlhttp = createxmlhttprequest();

/*function createxmlhttprequest() {
	var xmlhttp;
	
	if (window.ActiveXObject) {
		try{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch (e){
			xmlhttp = false;
		}
	}
	else{
		try{
			xmlhttp = new XMLHttpRequest();
		}
		catch(e){
			xmlhttp = false;			
		}
	}	
	if (!xmlhttp) {	
		alert("Sorry.com :) :)")
	}
	else{		
		return xmlhttp;		
	}
}*/

function process() {
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();

	if(xmlhttp.readyState == 4 || xmlhttp.readyState == 0){
		food = encodeURIComponent(document.getElementById("userinput").value);
		xmlhttp.open("GET","ajax.php?food="+food,true);
		xmlhttp.onreadystatechange = server_response(xmlhttp);
		xmlhttp.send(null);
	}
	else{
		setTimeout('process()',1000);
		
	}
}

function server_response(xmlhttp) {
	
		if (xmlhttp.readyState == 4){
			if (xmlhttp.status == 200) {
				xmlResponse = xmlhttp.responseXML;
				xmlDocumentElement = xmlResponse.documentElement;				
				message = xmlDocumentElement.firstChild.data;
				message = xmlResponse.documentElement.firstChild.data;
				document.getElementById("underinput").innerHTML = '<span style="color:blue">'+ message+'</span>';
				setTimeout('server_response',1000);				
			}
			else{
				alert("Sorry .. Cannot create a request..");
			}
		}	
		
}

