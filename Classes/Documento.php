<?php

Class Documento
{

  public $pdo;

  public function cadastrarDocumento($nome, $usuario)
  {
    global $pdo;

    $_SESSION['nome_documento'] = $nome;

    //cadastrar o documento no banco de dados
    $sql = $pdo->prepare("INSERT INTO Documento (Nome_Documento, ID_Usuario) VALUES (:d, :u)");
    $sql->bindValue(":d", $nome);
    $sql->bindValue(":u", $usuario);
    $sql->execute();

    $sql = $pdo->prepare("SELECT ID_Documento FROM documento WHERE Nome_Documento = :n");
    $sql->bindValue(":n", $nome);
    $sql->execute();
    if($sql->rowCount() > 0){
      $dado = $sql->fetch();
      $_SESSION['id_documento'] = $dado['ID_Documento'];
    }

    return true;
  }


  public function listAll()
  {
    global $pdo;

    $sql = $pdo->prepare("SELECT * FROM documento");
    $sql->execute();
    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }
}
?>
