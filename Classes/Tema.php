<?php
Class Tema
{
  public $pdo;

  public function listAll()
  {
    global $pdo;

    $sql = $pdo->prepare("SELECT * FROM tema");
    $sql->execute();
    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }
}
?>
