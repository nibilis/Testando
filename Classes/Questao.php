<?php

Class Questao
{
  public $pdo;

  public function cadastrarQuestao($materia, $tema, $enunciado)
  {
    global $pdo;

    $sql = $pdo->prepare("INSERT INTO questao (Enunciado, ID_Usuario) VALUES (:e, :u)");
    $sql->bindValue(":e", $enunciado);
    $sql->bindValue(":u", $_SESSION["ID_Usuario"]);
    $sql->execute();
    $idQuestao = $pdo->lastInsertId();

    return true;

  }
}
?>
