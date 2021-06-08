<?php
Class Materia
{
  public $pdo;

  public function listAll()
  {
    global $pdo;

    $sql = $pdo->prepare("SELECT * FROM materia");
    $sql->execute();
    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }
}
?>
