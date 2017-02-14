<?php // login.php
include_once 'header.php';
echo "<div class='main'><h3>እዝህ ውስጥ የይለፍ መረጃዎን ያስገቡ</h3>";
$error = $user = $pass = "";
if (isset($_POST['user']))
{
$user = sanitizeString($_POST['user']);
$pass = sanitizeString($_POST['pass']);

if ($user == "" || $pass == "")
{
$error = "ሁሉም ቦታዎች አልተሞሉም <br />";
}
else
{
$query = "SELECT ተጠቃሚ,ፓስወርድ  FROM አባላት
WHERE ተጠቃሚ='$user' AND ፓስወርድ='$pass';";
if (mysql_num_rows(queryMysql($query)) == 0)
{

$error = "<span class='error'>መግቢያ ስም/ፓስወርድ
ልክ አይደለም</span><br /><br />";
}
else
{

$_SESSION['user'] = $user; 
$_SESSION['pass'] = $pass;
                
              
die("አሁን ገብተዋል:: እባክዎ  <a href='./members.php?view=$user'>" .
"እዚጋ ክሊክ ያድርጉ</a>  ለመቀጠል<br /><br />");
}
}
}
echo <<<_END
<form method='post' action='login.php'>$error
<span class='fieldname'>መግቢያ ስም</span><input type='text' id='uname2' onkeyup="transliterate('uname2')" maxlength='16' name='user' value='$user' /><br />
<span class='fieldname'>ፓስወርድ</span><input type='password' maxlength='16' name='pass' value='$pass' />
_END;
?>
<br />
<span class='fieldname'>&nbsp;</span>
<input type='submit' value='ይግቡ' />
</form><br /></div></body></html>