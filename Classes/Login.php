<?php
include ('CadastroUsuario.php');

Class Login{

  public $pdo;


  public function logar($prontuario, $senha){

    global $pdo;
    //verificar se o prontuario e senha estao cadastrados
    $sql = $pdo->prepare("SELECT * FROM usuario_professor WHERE Prontuario_Professor = :p AND Senha = :s");
    $sql->bindValue(":p", $prontuario);
    $sql->bindValue(":s", md5($senha));
    $sql->execute();
    if($sql->rowCount() > 0){
      //entrar no sistema
      $dado = $sql->fetch();
      session_start();
      $_SESSION['ID_Usuario'] = $dado['ID_Usuario'];
      $_SESSION['NickName'] = $dado['NickName'];
      $image = $dado['ID_Imagem'];

      $sql = $pdo->prepare("SELECT Imagem FROM imagem WHERE ID_Imagem = :i");
      $sql->bindValue(":i", $image);
      $sql->execute();
      if($sql->rowCount() > 0){
        $img = $sql->fetch();
        $_SESSION['imagem'] = $img['Imagem'];
      }

      return true; //logado com sucesso
    }
    else{
      return false; //não foi possivel logar
    }
}
}

 ?>
