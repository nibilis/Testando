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
      $idUsuario = $dado['ID_Usuario'];
      $image = $dado['ID_Imagem'];

      $sql = $pdo->prepare("SELECT Materia_ID_Materia FROM usuario_materia WHERE Usuario_Professor_ID_Usuario_ = :id");
      $sql->bindValue(":id", $idUsuario);
      $sql->execute();
        if($sql->rowCount() > 0){
          $dado = $sql->fetch();
          $idMateria = $dado['Materia_ID_Materia'];
          $sql = $pdo->prepare("SELECT Nome FROM materia WHERE ID_Materia = :idM");
          $sql->bindValue(":idM", $idMateria);
          $sql->execute();
            if($sql->rowCount() > 0){
              $materia = $sql->fetch();
              $_SESSION['Nome'] = $materia['Nome'];
            }
      }

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
