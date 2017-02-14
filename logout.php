<?php // logout.php
include_once 'header.php';
if (isset($_SESSION['user']))
{
destroySession();
echo "<div class='main'>ወጥተዋል::  " .
"<a href='index.php'>እዚህ ጋ</a> እንደገና ለመግባት ሪፍሬሽ ያድርጉ::";
}
else echo "<div class='main'><br />" .
"ሳይገቡ መዉጣት ይቻላል እንዴ?";
?>
<br /><br /></div></body></html> 