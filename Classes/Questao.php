<?php

Class Questao
{
  public $pdo;

  public function cadastrarQuestao($materia, $tema, $enunciado, $usuario)
  {
    global $pdo;

    //cadastrar a questão no banco de dados
    $sql = $pdo->prepare("INSERT INTO questao (Enunciado, ID_Usuario) VALUES (:e, :u)");
    $sql->bindValue(":e", $enunciado);
    $sql->bindValue(":u", $usuario);
    $sql->execute();
    $idQuestao = $pdo->lastInsertId();

    $sql = $pdo->prepare("INSERT INTO questao_materia (Materia_ID_Materia, Questao_ID_Questao_) VALUES (:m, :q)");
    $sql->bindValue(":m", $materia);
    $sql->bindValue(":q", $idQuestao);
    $sql->execute();

    return true;
  }
}
?>
