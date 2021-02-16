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
