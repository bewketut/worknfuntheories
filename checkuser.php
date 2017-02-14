<?php // checkuser.php
include_once 'functions.php';
if (isset($_POST['user']))
{
$user = sanitizeString($_POST['user']);
if (mysql_num_rows(queryMysql("SELECT * FROM  አባላት WHERE ተጠቃሚ='$user'")))
echo "<span class='taken'>&nbsp;&#x2718; " .
"ይቅርታ ይሄ መጠቀሚያ ስም ተይዟል/span>";
else echo "<span class='available'>&nbsp;&#x2714; ".
"ይሄ መጠቀሚያ ስም አልተያዘም::</span>";
}
?>