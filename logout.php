<?php
session_start();
unset($_SESSION['Username']);
unset($_SESSION['Password']);
session_destroy();

header("Location:index.php");
exit;
?>