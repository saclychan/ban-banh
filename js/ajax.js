var xmlHttp

function showHint(str)
{
if (str.length==0)
  { 
  document.getElementById("checkUser").innerHTML="";
  return;
  }
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  } 
var url="customer/customer_checkuser.php";
url=url+"?CusUser="+str;
xmlHttp.onreadystatechange=stateChanged;
xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}  

function stateChanged() 
{ 
	if (xmlHttp.readyState==4)
	{ 
		ex=xmlHttp.responseText;
		document.getElementById("checkUser").innerHTML=ex;
	if(ex=='This username existed.')
		existed=true;
	else
		existed=false;
	}
}

function GetXmlHttpObject()
{
var xmlHttp=null;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
return xmlHttp;
}