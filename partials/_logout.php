<?php
session_start();

session_unset();
session_destroy();

header("location: /PHP_LEARNING/46_FORUM/index.php");
exit;
?>