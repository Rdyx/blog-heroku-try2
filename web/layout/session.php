<?php

session_start();
if (!isset($_SESSION['nickname'])) {
  $_SESSION['nickname'] = 'Invité';
};

?>