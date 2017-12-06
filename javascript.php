<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<script>
function onload()
{
alert("hii");
var alphabet = "A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z";
var key = document.getElementById('number').value;
alert(key);
	if(key == alphabet)
	{
	alert("alphbet");
	}
}
</script>
<body>
<input type="text" value="" name="number" onkeyup="onload();" />
</body>
</html>
