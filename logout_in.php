<?php
session_start();
session_unset();
session_destroy();
$_SESSION['valid']=0;
header("Location: login.php");