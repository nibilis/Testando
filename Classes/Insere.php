<?php

require_once'../Classes/DataBase.php';

Class Insere{

  public $pdo;

  public function inserirDocumento(){


  global $pdo;
  if (isset($_GET['id'])){
    $id = $_GET['id'];
}

  if (isset($_GET['doc'])){
    $doc = $_GET['doc'];
}

  $sql = $pdo->prepare("INSERT INTO questao_documento (Questao_ID_Questao_, Documento_ID_Documento) VALUES (:i, :d)");
  $sql->bindValue(":i", $id);
  $sql->bindValue(":d", $doc);
  $sql->execute();

  echo "Recarregue a pagina para ver a questão selecionada!";
}
}

$i = new Insere;
$u = new DataBase;
$u->conectar();
$i->inserirDocumento();
 ?>
