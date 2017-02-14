<html><head><title>ዳታቤዙን ማስነሻ</title></head><body>
<h3>እየተዘጋጀ ነው...</h3>
<?php // setup.php
include_once 'functions.php';

createTable('members','username VARCHAR(16), password VARCHAR(16)');

createTable('message',
'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
sender VARCHAR(16),
receiver VARCHAR(16),
pm CHAR(1),
timewriten INT UNSIGNED,
content VARCHAR(4096)');

createTable('friends',
'username VARCHAR(16),
friend VARCHAR(16),
INDEX(username(6)),
INDEX(friend(6))');

createTable('profile',
'username VARCHAR(16),
textwritten VARCHAR(4096)');

?>

<br />...አለቀ::
</body></html>
