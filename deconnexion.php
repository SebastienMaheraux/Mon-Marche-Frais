<?php
session_start();
session_destroy(); //on ferme la session
header('location:Main.php');
exit();
?>