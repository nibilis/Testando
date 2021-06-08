<?php

Class Estado
{

  public $pdo;

  public function listAll()
  {
    global $pdo;

    $sql = $pdo->prepare("SELECT * FROM estado");
    $sql->execute();
    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }
}
?>
