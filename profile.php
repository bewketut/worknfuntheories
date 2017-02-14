<?php // profile.php
include_once 'header.php';
if (!$loggedin) die();
echo "<div class='main'><h3>የአንተ/አንቺ ፕሮፋይል</h3>";
if (isset($_POST['text']))
{
$text = sanitizeString($_POST['text']);
$text = preg_replace('/\s\s+/', ' ', $text);
if (mysql_num_rows(queryMysql("SELECT * FROM profile WHERE username='$user'")))
queryMysql("UPDATE profile SET text ='$text' where username='$user'");
else queryMysql("INSERT INTO profile  VALUES('$user', '$text')");
}
else
{
$result = queryMysql("SELECT * FROM profile  WHERE username='$user'");
if (mysql_num_rows($result))
{
$row = mysql_fetch_row($result);
$text = stripslashes($row[1]);
}
else $text = "";
}
$text = stripslashes(preg_replace('/\s\s+/', ' ', $text));
if (isset($_FILES['image']['name']))
{

$saveto = md5($user).".jpg";
move_uploaded_file($_FILES['image']['tmp_name'], $saveto);
$typeok = TRUE;
switch($_FILES['image']['type'])
{
case "image/gif": $src = imagecreatefromgif($saveto); break;
case "image/jpeg": // Allow both regular and progressive jpegs
case "image/pjpeg": $src = imagecreatefromjpeg($saveto); break;
case "image/png": $src = imagecreatefrompng($saveto); break;
default: $typeok = FALSE; break;
}
if ($typeok)
{
list($w, $h) = getimagesize($saveto);
$max = 100;
$tw = $w;
$th = $h;
if ($w > $h && $max < $w)
{
$th = $max / $w * $h;
$tw = $max;
}
elseif ($h > $w && $max < $h)
{
$tw = $max / $h * $w;
$th = $max;
}
elseif ($max < $w)
{
$tw = $th = $max;
}
$tmp = imagecreatetruecolor($tw, $th);
imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tw, $th, $w, $h);
imageconvolution($tmp, array(array(-1, -1, -1),
array(-1, 16, -1), array(-1, -1, -1)), 8, 0);
imagejpeg($tmp, $saveto);
imagedestroy($tmp);
imagedestroy($src);
}
}
showProfile($user);
echo <<<_END
<form method='post' action='profile.php' enctype='multipart/form-data'>
<h3>እዚህ ዉስጥ ስለእርስዎ ይጻፉ እና ፎቶዎን ደግሞ ይጫኑ</h3>
<textarea name='text' id='myprof' onkeyup="transliterate('myprof')" cols='50' rows='3'>$text</textarea><br />
_END;
?>
ፎቶ: <input value="ወደ ፋይልዎ ይሂዱ..." type='file' name='image' size='14' maxlength='32' />
<input type='submit' value='ፕሮፋይልዎን ሴቭ ያድርጉ' />
</form></div><br /></body></html>
