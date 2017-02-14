<?php // signup.php
include_once 'header.php';
echo <<<_END
<script>
function checkUser(user)
{
if (user.value == '')
{
O('info').innerHTML = ''
return
}
params = "user=" + user.value
request = new ajaxRequest()
request.open("POST", "checkuser.php", true)
request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
request.setRequestHeader("Content-length", params.length)
request.setRequestHeader("Connection", "close")
request.onreadystatechange = function()
{
if (this.readyState == 4)
if (this.status == 200)
if (this.responseText != null)
O('info').innerHTML = this.responseText
}
request.send(params)
}
function ajaxRequest()
{
try { var request = new XMLHttpRequest() }
catch(e1) {
try { request = new ActiveXObject("Msxml2.XMLHTTP") }
catch(e2) {
try { request = new ActiveXObject("Microsoft.XMLHTTP") }
catch(e3) {
request = false
} } }
return request
}
</script>
<div class='main'><h3>ለመመዝገብ አስፈላጊዉን መረጃ ይስጡ</h3>
_END;
$error = $user = $pass = "";
if (isset($_SESSION['user'])) destroySession();
if (isset($_POST['user']))
{
$user = sanitizeString($_POST['user']);
$pass = sanitizeString($_POST['pass']);
if ($user == "" || $pass == "")
$error = "Not all fields were entered<br /><br />";
else
{
if (mysql_num_rows(queryMysql("SELECT * FROM  አባላት WHERE ተጠቃሚ='$user'")))
$error = "ስሙ ተይዟል ሌላ ይሞክሩ<br /><br />";
else
{
queryMysql("INSERT INTO አባላት VALUES('$user', '$pass')");
die("<h4>አካውንት ተክፍቷል </h4>ይግቡ::<br /><br />");
}
}
}
echo <<<_END
<form method='post' action='signup.php'>$error
<span class='fieldname'>መግቢያ ስም</span>
<input type='text' id='uname1' onkeyup="transliterate('uname1')" maxlength='16' name='user' value='$user'
onBlur='checkUser(this)'/><span id='info'></span><br />
<span class='fieldname'>ፓስወርድ</span>
<input type='password' maxlength='16' name='pass'
value='$pass' /><br />
_END;
?>
<span class='fieldname'>&nbsp;</span>
<input type='submit' value='ይመዝገቡ' />
</form></div><br /></body></html>