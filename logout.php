<?php
include('function.php');
session_start();
session_unset();
session_destroy();
redirect('index.php');
exit();
?>