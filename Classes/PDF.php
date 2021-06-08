<?php

require_once'DataBase.php';

Class PDF{

  public $pdo;

  public function gerarPDF(){

  global $pdo;
  if (isset($_GET['id'])){
    $id = $_GET['id'];
    $_SESSION['id_documento'] = $id;
  }

  echo "PDF gerado!";

  return true;
  }
}

$i = new PDF;
$u = new DataBase;
$u->conectar();
$i->gerarPDF();
?>
