<?php
$test = pg_query($dbconn, 'select * from admin');
$row = pg_fetch_row($test);
$nick = htmlspecialchars($_SESSION['nickname']);
?>