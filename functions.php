<?php // functions.php
include_once '../conn.php';
/*
$dbhost = 'localhost'; // Unlikely to require changing
$dbname = 'workforce'; // Modify these...
$dbuser = 'bewket'; // ...variables according
$dbpass = 'amoraw'; // ...to your installation
mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());
*/
$appname = "እኛሳ ፕሮጀክት"; // ...and preference
function createTable($name, $query)
{
queryMysql("CREATE TABLE IF NOT EXISTS $name ($query)");
echo "Table '$name' created or already exists.<br />";
}
function queryMysql($query)
{
mysql_query("SET NAMES 'utf8'");
$result = mysql_query($query) or die(mysql_error());
mysql_query("SET NAMES 'utf8'");
return $result;
}
function destroySession()
{
$_SESSION=array();
if (session_id() != "" || isset($_COOKIE[session_name()]))
setcookie(session_name(), '', time()-2592000, '/');
session_destroy();}

function sanitizeString($var)
{
$var = strip_tags($var);

$var = htmlspecialchars($var, ENT_QUOTES, "UTF-8");

$var = stripslashes($var);
return mysql_real_escape_string($var);
}

function showProfile($user)
{
$im= md5($user).".jpg";
if (file_exists($im))
echo "<img src='$im' align='left' />";
$result = queryMysql("SELECT * FROM profile WHERE username ='$user'");
if (mysql_num_rows($result))
{
$row = mysql_fetch_row($result);
echo stripslashes($row[1]) . "<br clear=left /><br/>";
}
}
?>
