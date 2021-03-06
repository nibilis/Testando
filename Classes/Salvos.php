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

    $sql = $pdo->prepare("SELECT Enunciado FROM questao AS q INNER JOIN favoritar AS f ON q.ID_Questao_ = f.Questao_ID_Questao_ WHERE f.Usuario_Professor_ID_Usuario = :i");
    $sql->bindValue(":i", $idUsuario);
    $sql->execute();
    return $sql->fetchAll(\PDO::FETCH_ASSOC);
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
