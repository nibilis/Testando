<?php

Class Questao
{
  public $pdo;

  public function cadastrarQuestao($materia, $tema, $enunciado)
  {
    global $pdo;

    //cadastrar a questão no banco de dados
    $sql = $pdo->prepare("INSERT INTO questao (Enunciado) VALUES (:e)");
    $sql->bindValue(":e", $enunciado);
    $sql->execute();
    $idQuestao = $pdo->lastInsertId();

    /*verificar qual o id da materia
    $sql = $pdo->prepare("SELECT ID_Materia FROM Materia WHERE Nome = :m");
    $sql->bindValue(":m", $materia);
    $sql->execute();
    $idMateria = $sql->fetch(\PDO::FETCH_ASSOC);*/

    $sql = $pdo->prepare("INSERT INTO questao_materia (Materia_ID_Materia, Questao_ID_Questao_) VALUES (:m, :q)");
    $sql->bindValue(":m", $materia);
    $sql->bindValue(":q", $idQuestao);
    $sql->execute();

    return true;
  }
}
?>
