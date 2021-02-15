<?php
function testeOnclick() {
  if (isset($_GET['id'])){
    $id = $_GET['id'];
}
    echo $id;
}

testeOnclick();
 ?>
