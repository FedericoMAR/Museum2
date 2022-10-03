<?php
session_start();
$_SESSION['response_code'] = 666;
header("Location: ../front-end/homepage.php");
?>