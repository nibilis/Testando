<?php

Class CadastroUsuario
{
  private $pdo;


  public function cadastrar($nome, $CPF, $email, $endereço, $senha){

    global $pdo;

    //verificar se ja existe o email cadastrado
    $sql = $pdo->prepare("SELECT id_usuario FROM usuario_professor WHERE email =:e");
    $sql->bindValue(":e", $email);
    $sql->execute();
    if($sql->rowCount() > 0){
      return false; //ja esta cadastrada
    }
    else{
      //caso nao exista, cadastrar
      $sql = $pdo->prepare("INSERT INTO usuario_professor (Nome, CPF_Usuario, Email, Endereço, Senha) VALUES (:n, :c, :e, :en, :s)");
        $sql->bindValue(":n", $nome);
        $sql->bindValue(":c", $CPF);
        /* $sql->bindValue(":m", $materia); */
        $sql->bindValue(":e", $email);
        $sql->bindValue(":en", $endereço);
        $sql->bindValue(":s", md5($senha));
        $sql->execute();

      return true;
    }

  }

  public function logar(){

    global $pdo;
    //verificar se o email e senha estao cadastrados
    $sql = $pdo->prepare("SELECT id_usuario FROM usuario_professor WHERE email = :e AND senha = :s");
    $sql->bindValue(":e", $email);
    $sql->bindValue(":s", md5($senha));
    $sql->execute();
    if($sql->rowCount() > 0){
      //entrar no sistema
      $dado = $sql->fetch();
      session_start();
      $_SESSION['id_usuario'] = $dado['id_usuario'];
      return true; //logado com sucesso
    }
    else{
      return false; //não foi possivel logar
    }
  }
}



?>
