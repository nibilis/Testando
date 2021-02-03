<?php

Class Questao
{
  public $pdo;

  public function cadastrarQuestao($materia, $tema, $enunciado)
  {
    global $pdo;

    $sql = $pdo->prepare("INSERT INTO questao (Enunciado) VALUES (:e)");
    $sql->bindValue(":e", $enunciado);
    $sql->execute();
    $idQuestao = $pdo->lastInsertId();

    echo $idQuestao;
    
    return true;
  }
}
?>
