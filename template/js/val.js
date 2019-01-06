xmlHttp = false;

if(window.ActiveXObject){

	xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");

} else if(window.XMLHttpRequest) {

	try{

		xmlHttp = new XMLHttpRequest();

	} catch(e) {

		alert('unable to Connect to the server');
	}
} 

function getVal() {

	    
	xmlHttp.open("GET", "val.php");
	
	xmlHttp.onreadystatechange = function() {

		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {

			Response = xmlHttp.responseText;

		} else {

	        setTimeout('getVal()', 3000);
	    }
    }

    xmlHttp.send(null);
}

function putVal() {

	var xmlhttp

    if (window.ActiveXObject)
    {
     	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    else if (window.XMLHttpRequest)
    {
     	xmlhttp = new XMLHttpRequest();
    }

	var val = document.getElementById("value");

	var eauVal = Math.floor(Math.random() * 6) + 1;
	var gazVal = Math.floor(Math.random() * 6) + 1;
	var eleVal = Math.floor(Math.random() * 6) + 1;

	var data = {"eau":eauVal, "gaz":gazVal,"elec":eleVal};

	xmlhttp.open("get", "put.php?data="+JSON.stringify(data), "/json-handler");

	xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
	
	xmlhttp.onreadystatechange = function() {

		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

			val.innerHTML = xmlhttp.responseText;

		} else {

	        setTimeout('putVal()', 3000);
	    }
    }

    xmlhttp.send();
}
