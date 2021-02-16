<?php
session_start();
unset($_SESSION["nome_documento"]);
header("location: ../documento/indexDocumento.php");
 ?>
