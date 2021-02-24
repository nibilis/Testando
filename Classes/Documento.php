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


    if (isset($_SESSION['id_documento'])){
      $idDocumento = $_SESSION['id_documento'];

      //Buscar as questões cadastradas em um documento
      $sql = $pdo->prepare("SELECT Questao_ID_Questao_ FROM questao_documento WHERE Documento_ID_Documento = :d");
      $sql->bindValue(":d", $idDocumento);
      $sql->execute();
      if($sql->rowCount() > 0){
        while($dado = $sql->fetch()) {
          echo $dado['Questao_ID_Questao_'];
          $sql = $pdo->prepare("SELECT Enunciado FROM questao WHERE ID_Questao_ = :q");
          $sql->bindValue(":q", $dado['Questao_ID_Questao_']);
          $sql->execute();
          while($m = $sql->fetch()) {
          echo $m['Enunciado'];}
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
}
?>
