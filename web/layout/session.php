<?php

session_start();
if (!isset($_SESSION['nickname'])) {
  $_SESSION['nickname'] = 'Invité';
};

var_dump($_SESSION['nickname']);
?>