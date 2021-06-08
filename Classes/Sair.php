<?php
session_start();
unset($_SESSION["ID_Usuario"]);
header("location: ../login/indexLogin.php");

 ?>
