<?php
session_start();
unset($_SESSION["nome_documento"]);
unset($_SESSION["id_documento"]);
header("location: ../documento/indexDocumento.php");
 ?>
