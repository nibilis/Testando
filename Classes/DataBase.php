<?php

Class DataBase{

  public $msgErro = "";

  public function conectar(){

    global $pdo;
    $nome = "testando";
    $host = "localhost";
    $usuario = "root";
    $senha = "";

      try {
        $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
    }
    catch (PDOException $e) {
        $msgErro = $e->getMessage();
    }
  }
}
?>
