<?php

Class Documento
{

  public $pdo;

  public function cadastrarQuestao($nome, $usuario)
  {
    global $pdo;

    //cadastrar o documento no banco de dados
    $sql = $pdo->prepare("INSERT INTO Documento (Nome_Documento, ID_Usuario) VALUES (:d, :u)");
    $sql->bindValue(":e", $nome);
    $sql->bindValue(":u", $usuario);
    $sql->execute();

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
