<?php
Class Salvos
{
  public $pdo;

  public function listAll()
  {
    global $pdo;
    $idUsuario = $_SESSION['ID_Usuario'];

    $sql = $pdo->prepare("SELECT * FROM questao WHERE ID_Usuario = :i");
    $sql->bindValue(":i", $idUsuario);
    $sql->execute();
    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function listAllDocumentos()
  {
    global $pdo;
    $idUsuario = $_SESSION['ID_Usuario'];

    $sql = $pdo->prepare("SELECT * FROM documento WHERE ID_Usuario = :i");
    $sql->bindValue(":i", $idUsuario);
    $sql->execute();
    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function listAllFavoritos()
  {
    global $pdo;
    $idUsuario = $_SESSION['ID_Usuario'];

    $sql = $pdo->prepare("SELECT * FROM documento WHERE ID_Usuario = :i");
    $sql->bindValue(":i", $idUsuario);
    $sql->execute();
    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }
}
?>
