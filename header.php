<?php // header.php
session_start();
echo "<!DOCTYPE html>\n<html><head><meta charset='utf-8'/><script src='trans.js'></script>";

include 'functions.php';
$userstr = " ";
$acf=0;
$pass='';
if (isset($_SESSION['user']))
{
$user = $_SESSION['user'];
 $loggedin=TRUE;
$userstr = " ($user)";
if(isset($_SESSION['account_id'])){ $acf=1;
print('');
}
$pass=$_SESSION['pass'];
$res=queryMysql("select count(*) from members where username='$user'");
$row=mysql_fetch_row($res);
if($acf==1 && $row[0]==0) queryMysql("INSERT INTO members  values ('$user','$pass')");

}
else 	
   $loggedin = FALSE;

echo "<title>$appname$userstr $loggedin</title><link rel='stylesheet'"." href='styles.css'  />" . "</head><body><div class='appname'>$appname$userstr</div>";
print("<a style='text-decoration:none;position:absolute; left:14%; top:15%;' href='../welcome.php'><-..ወደ ስራ</a>");
if ($loggedin)
{
echo "<br ><ul class='menu'>" .
"<li><a href='members.php?view=$user'>ቤት</a></li>" .
"<li><a href='members.php'>አባላት</a></li>" .
"<li><a href='friends.php'>ጓደኞች</a></li>".
"<li><a href='messages.php'>መልእክት</a></li>" .
"<li><a href='profile.php'>ፕሮፋይልዎን ማደሻ</a></li>" .
"<li><a href='logout.php'>መዉጫ</a></li></ul><br />";
}
else
{

echo ("<br /><ul class='menu'>" .
"<li><a href='index.php'>ቤት</a></li>" .
"<li><a href='signup.php'>ይመዝገቡ</a></li>" .
"<li><a href='login.php'>መግቢያ</a></li></ul><br />" .
"<span class='info'>&#8658; ገፁን ለማየት መግባት አለብዎት:: " .
"</span><br /><br />");
}
?>
