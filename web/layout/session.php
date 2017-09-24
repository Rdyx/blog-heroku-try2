<?php

session_start();
if (!isset($_SESSION['nickname'])) {
  $_SESSION['nickname'] = 'Invité';
};

$test = pg_query($dbconn, 'select * from admin');
$row = pg_fetch_row($test);

?>