<?php // messages.php
include_once 'header.php';
if (!$loggedin) die();
if (isset($_GET['view'])) $view = sanitizeString($_GET['view']);
else $view = $user;
if (isset($_POST['text']))
{
$text = sanitizeString($_POST['text']);
if ($text != "")
{
$pm = substr(sanitizeString($_POST['pm']),0,1);
$time = time();
queryMysql("INSERT INTO message VALUES(NULL, '$user',
'$view', '$pm', $time, '$text')");
}
}
if ($view != "")
{
if ($view == $user) $name1 = $name2 = "የአንተ/ቺን";
else
{
$name1 = "<a href='members.php?view=$view'>የ$view</a>";
$name2 = "የ$viewን";
}
echo "<div class='main'><h3>$name1 መልእክት</h3>";
showProfile($view);
echo <<<_END
<form method='post' action='messages.php?view=$view'>
እዚህ ጋ መልእክት በመጻፍ ይተዉ:<br />
<textarea name='text' id='melkt' onkeyup="transliterate('melkt')" cols='40' rows='3'></textarea><br />
ሁሉም የሚያየው<input type='radio' name='pm' value='0' checked='checked' />
የግል <input type='radio' name='pm' value='1' />
<input type='submit' value='መልእክት ይጻፉ' /></form><br />
_END;
if (isset($_GET['erase']))
{
$erase = sanitizeString($_GET['erase']);
queryMysql("DELETE FROM message WHERE id=$erase AND receiver ='$user'");
}
$query = "SELECT * FROM message WHERE receiver ='$view' ORDER BY timewriten DESC";
$result = queryMysql($query);
$num = mysql_num_rows($result);
for ($j = 0 ; $j < $num ; ++$j)
{
$row = mysql_fetch_row($result);
if ($row[3] == 0 || $row[1] == $user || $row[2] == $user)
{
echo date('M jS \'y g:ia:', $row[4]);
echo " <a href='messages.php?view=$row[1]'>$row[1]</a> ";
if ($row[3] == 0)
echo "ይህን ጻፈ: &quot;$row[5]&quot; ";
else echo "አንሾካሾከ: <span class='whisper'>" .
"&quot;$row[5]&quot;</span> ";
if ($row[2] == $user)
echo "[<a href='messages.php?view=$view" .
"&erase=$row[0]'>አጥፋ</a>]";
echo "<br />";
}
}
}
if (!$num) echo "<br /><span class='info'>መልእክት ገና የለም </span><br /><br />";
echo "<br /><a class='button' href='messages.php?view=$view'>እንደገና ይዩ</a>".
"<a class='button' href='friends.php?view=$view'> $name2 ጓደኞች ይመልከቱ</a>";?>
</div><br /></body></html>
