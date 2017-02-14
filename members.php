<?php // members.php
include_once 'header.php';
if (!$loggedin) die();

echo "<div class='main'>";
if (isset($_GET['view']))
{
$view = sanitizeString($_GET['view']);
echo $view;
if ($view == $user) $name = "የእርስዎ";
else $name = "የ$view";
echo "<h3>$name ፕሮፋይል</h3>";
showProfile($view);
$n="ን";
echo "<a class='button' href='messages.php?view=$view'>" .
"$name$n መልእክቶች ይመልከቱ</a><br /><br />";
die("</div></body></html>");
}
if (isset($_GET['add']))
{
$add = sanitizeString($_GET['add']);
if (!mysql_num_rows(queryMysql("SELECT * FROM friends
WHERE username='$add' AND friend='$user'")))
queryMysql("INSERT INTO friends VALUES ('$add', '$user')");
}
elseif (isset($_GET['remove']))
{
$remove = sanitizeString($_GET['remove']);
queryMysql("DELETE FROM friends WHERE username='$remove' AND friend='$user'");
}
$result = queryMysql("SELECT username FROM members ORDER BY username");
$num = mysql_num_rows($result);
echo "<h3>ሌሎች አባላት</h3><ul>";
for ($j = 0 ; $j < $num ; ++$j)
{
$row = mysql_fetch_row($result);
if ($row[0] == $user) continue;
echo "<li><a href='members.php?view=$row[0]'>$row[0]</a>";
$follow = "ተከተል";
$t1 = mysql_num_rows(queryMysql("SELECT * FROM friends
WHERE username='$row[0]' AND friend='$user'"));
$t2 = mysql_num_rows(queryMysql("SELECT * FROM friends
WHERE username='$user' AND friend='$row[0]'"));
if (($t1 + $t2) > 1) echo " &harr; ጓደኛማችህ ነው ";
elseif ($t1) echo " &larr; እያየኽው ነው";
elseif ($t2) { echo " &rarr; እያየህ ነው";
$follow = "recip"; }
if (!$t1) echo " [<a href='members.php?add=".$row[0] . "'>$follow</a>]";
else echo " [<a href='members.php?remove=".$row[0] . "'>ተወው</a>]";
}
?>
<br /></div></body></html>
