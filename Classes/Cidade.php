<?php

Class Cidade
{

  public $pdo;

  public function listAll()
  {
    global $pdo;

    $sql = $pdo->prepare("SELECT * FROM cidade");
    $sql->execute();
    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }
}
?>
