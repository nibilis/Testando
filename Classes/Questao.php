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
