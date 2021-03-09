<?php

require_once'DataBase.php';

Class PDF{

  public $pdo;

  public function gerarPDF(){

  global $pdo;
  if (isset($_GET['id'])){
    $id = $_GET['id'];
  }

  $sql = $pdo->prepare("SELECT Nome_Documento FROM documento WHERE ID_Documento = :d");
  $sql->bindValue(":d", $id);
  $sql->execute();
  $aux = $sql->fetch();

  $_SESSION['nome_documento'] = $aux['Nome_Documento'];
  $_SESSION['documento'] = $id;

  echo "PDF gerado!";

  return true;
  }
}

$i = new PDF;
$u = new DataBase;
$u->conectar();
$i->gerarPDF();
?>
