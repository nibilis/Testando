<?php

function inserirVariveis() {
  if (isset($_GET['id'])){
    $id = $_GET['id'];
}
  echo $id;

  if (isset($_GET['doc'])){
    $doc = $_GET['doc'];
}
  echo $doc;
}

Class Insere{

  public $pdo;

  public function inserirDocumento(){

  global $pdo;

  $sql = $pdo->prepare("INSERT INTO questao_documento (Questao_ID_Questao_, Documento_ID_Documento) VALUES (:i, :d)");
  $sql->bindValue(":i", $id);
  $sql->bindValue(":d", $doc);
  $sql->execute();

  echo "ok";
}
}

$i = new Insere;

inserirVariveis();
$i->inserirDocumento();
 ?>
