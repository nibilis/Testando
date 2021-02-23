<?php

Class Questao
{
  public $pdo;

  public function cadastrarQuestaoDissertativa($materia, $tema, $enunciado, $resposta, $correta, $dificuldade, $privacidade, $usuario)
  {
    global $pdo;

    //cadastrar a questão no banco de dados
    $sql = $pdo->prepare("INSERT INTO questao (Enunciado, ID_Usuario, PalavraChave, Privacidade, Dificuldade) VALUES (:e, :u, :r, :p, :d)");
    $sql->bindValue(":e", $enunciado);
    $sql->bindValue(":u", $usuario);
    $sql->bindValue(":r", $resposta);
    $sql->bindValue(":p", $privacidade);
    $sql->bindValue(":d", $dificuldade);
    $sql->execute();
    $idQuestao = $pdo->lastInsertId();

    //cadastrar a matéria da questão no banco de dados
    $sql = $pdo->prepare("INSERT INTO questao_materia (Materia_ID_Materia, Questao_ID_Questao_) VALUES (:m, :q)");
    $sql->bindValue(":m", $materia);
    $sql->bindValue(":q", $idQuestao);
    $sql->execute();

    $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :t, :c)");
    $sql->bindValue(":q", $idQuestao);
    $sql->bindValue(":t", $resposta);
    $sql->bindValue(":c", $correta);
    $sql->execute();

    return true;
  }

  public function listAll()
  {
    global $pdo;

    $sql = $pdo->prepare("SELECT * FROM questao");
    $sql->execute();
    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function imagem($id_usuario){

    global $pdo;

    $sql = $pdo->prepare("SELECT ID_Imagem FROM usuario_professor WHERE ID_Usuario = :i");
    $sql->bindValue(":i", $id_usuario);
    $sql->execute();
    if($sql->rowCount() > 0){
      $dado = $sql->fetch();
      $image = $dado['ID_Imagem'];

      $sql = $pdo->prepare("SELECT Imagem FROM imagem WHERE ID_Imagem = :i");
      $sql->bindValue(":i", $image);
      $sql->execute();
      if($sql->rowCount() > 0){
        $img = $sql->fetch();
        $_SESSION['imagem_usuario'] = $img['Imagem'];
      }
  }
}
}
?>
