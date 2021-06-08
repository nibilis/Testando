<?php

Class Subtema
{

  public $pdo;

  public function listAll()
  {
    global $pdo;

    $sql = $pdo->prepare("SELECT * FROM subtema");
    $sql->execute();
    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }
}
?>
