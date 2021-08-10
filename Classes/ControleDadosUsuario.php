<?php
require_once'DataBase.php';
$u = new DataBase;

$email = "";
$name = "";
$erros = array();
$con = mysqli_connect("localhost","root","","testando");

session_start();

    //Caso o usuário clique no botão enviar no formulario da tela de "esqueceu sua senha"
    if(isset($_POST['email'])){
        $u->conectar();
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM usuario_professor WHERE Email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $codigo = rand(999999, 111111);
            $insert_codigo = "UPDATE usuario_professor SET Codigo = $codigo WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_codigo);
            if($run_query){
                $assunto = "Código para mudança de senha";
                $mensagem = "O seu código para mudar a senha é: $codigo";
                $remetente = "De: EquipeTestando@gmail.com";
                //if(mail($email, $assunto, $mensagem, $remetente)){
                if(isset($email)){
                    $info = "Nós enviamos um código para o seu e-mail. - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: ../login/indexCodigoSenha.php');
                    exit();
                }else{
                    echo "Erro ao enviar o código.";
                }
            }else{
                echo "Algo deu errado :(";
            }
        }else{
            echo "Esse endereço de email não existe.";
        }
    }

    //Caso o usuário clique no botão "enviar" na tela de inserir o código
    if(isset($_POST['check'])){
      $_SESSION['info'] = "";
      $codigo_otp = mysqli_real_escape_string($con, $_POST['codigo']);
      $check_codigo = "SELECT * FROM usuario_professor WHERE codigo = $codigo_otp";
      $run_sql = mysqli_query($con, $check_codigo);
      if(mysqli_num_rows($run_sql) > 0){
          $fetch_dados = mysqli_fetch_assoc($run_sql);
          $email = $fetch_dados['Email'];
          $_SESSION['email'] = $email;
          $info = "Por favor, coloque uma senha que você não use em outro site.";
          $_SESSION['info'] = $info;

          header('location: ../login/indexNovaSenha.php');
          exit();
      }else{
          $erros['otp-erro'] = "Você inseriu o código errado!";
      }
    }

    //Caso o usuário clique no botão de mudar senha
    if(isset($_POST['mudar-senha'])){
      $_SESSION['info'] = "";
      $senha = mysqli_real_escape_string($con, $_POST['senha']);
      $csenha = mysqli_real_escape_string($con, $_POST['csenha']);
      if($senha !== $csenha){
        $erros['senha'] = "As duas senhas são diferentes.";
      }
      else{
        $codigo = 0;
        $email = $_SESSION['email']; //getting this email using session
        $senhaenc = md5($senha);
        $update_senha = "UPDATE usuario_professor SET codigo = $codigo, senha = '$senhaenc' WHERE email = '$email'";
        $run_query = mysqli_query($con, $update_senha);
        if($run_query){
          $info = "A sua senha foi mudada.";
          $_SESSION['info'] = $info;
          header('Location: ../login/indexLogin.php');
        }else{
          $erros['db-error'] = "Falha ao mudar de senha!";
        }
      }
    }
?>
