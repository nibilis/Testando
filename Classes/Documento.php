<?php

Class Documento
{

  public $pdo;

  public function cadastrarDocumento($nome, $usuario)
  {
    global $pdo;

    $_SESSION['nome_documento'] = $nome;

    //cadastrar o documento no banco de dados
    $sql = $pdo->prepare("INSERT INTO Documento (Nome_Documento, ID_Usuario) VALUES (:d, :u)");
    $sql->bindValue(":d", $nome);
    $sql->bindValue(":u", $usuario);
    $sql->execute();

    $sql = $pdo->prepare("SELECT ID_Documento FROM documento WHERE Nome_Documento = :n");
    $sql->bindValue(":n", $nome);
    $sql->execute();
    if($sql->rowCount() > 0){
      $dado = $sql->fetch();
      $_SESSION['id_documento'] = $dado['ID_Documento'];
    }

    return true;
  }

  public function listAll()
  {
    global $pdo;

    $sql = $pdo->prepare("SELECT * FROM documento");
    $sql->execute();
    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function exibirQuestoes(){

    global $pdo;
    $i = 0;


    if (isset($_SESSION['id_documento'])){

      $idDocumento = $_SESSION['id_documento'];

      //Buscar as questões cadastradas em um documento
      $sql = $pdo->prepare("SELECT Enunciado FROM questao as q INNER JOIN questao_documento as qd ON qd.Documento_ID_Documento = :d AND q.ID_Questao_ = qd.Questao_ID_Questao_");
      $sql->bindValue(":d", $idDocumento);
      $sql->execute();
      if($sql->rowCount() > 0){
        while($m = $sql->fetch()){
        $i++;
        ?> <p style="text-align: justify;"><b><?php echo $i.". "?></b> <?php echo $m['Enunciado']."</br></br>"; ?></p> <?php
        }
      }
      else{
        //acho que não vai precisar disso depois
        echo "";
      }
    }
    else{
      //Para não dar o erro de variavel indefinida
      echo "";
    }
  }

  public function exibirRespostas(){

    global $pdo;
    $i = 0;


    if (isset($_SESSION['id_documento'])){

      $idDocumento = $_SESSION['id_documento'];

      //Buscar as questões cadastradas em um documento
      $sql = $pdo->prepare("SELECT ID_Questao_ FROM questao as q INNER JOIN questao_documento as qd ON qd.Documento_ID_Documento = :d AND q.ID_Questao_ = qd.Questao_ID_Questao_");
      $sql->bindValue(":d", $idDocumento);
      $sql->execute();
      $m = $sql->fetch();

      while($sql->rowCount() > 0){
        $sql = $pdo->prepare("SELECT Texto FROM alternativa WHERE Questao_ID_Questao_ = :q AND Correta = 1");
        $sql->bindValue(":q", $m[$i]);
        $sql->execute();
        $r = $sql->fetch();
        $i++;
        ?> <p style="text-align: justify;"><b><?php echo $i.". "?></b> <?php echo $r['Texto']."</br></br>"; ?></p> <?php

        }
    }
    else{
      //Para não dar o erro de variavel indefinida
      echo "";
    }
  }
}
?>
