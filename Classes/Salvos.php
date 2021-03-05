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

    $sql = $pdo->prepare("SELECT Questao_ID_Questao_ FROM favoritar WHERE Usuario_Professor_ID_Usuario = :i");
    $sql->bindValue(":i", $idUsuario);
    $sql->execute();

    $result = $sql->fetchAll(\PDO::FETCH_ASSOC);

    foreach($result as $row){
      $idquest = $row['Questao_ID_Questao_'];
      $sql = $pdo->prepare("SELECT * FROM questao WHERE ID_Questao_ = :id");
      $sql->bindValue(":id", $idquest);
      $sql->execute();
      return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
  }

  public function gerarPDF($versoes, $gabarito, $idDocumento){
    global $pdo;

    $_SESSION['id_documento'] = $idDocumento;
    $_SESSION['versoes'] = $versoes;
    $_SESSION['gabarito'] = $gabarito;

    return true;
  }
}
?>
