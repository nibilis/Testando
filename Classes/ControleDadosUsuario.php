<?php
require_once'DataBase.php';
$u = new DataBase;

$email = "";
$name = "";
$erros = array();
$con = mysqli_connect("localhost","root","","testando");

session_start();

    //Caso o usuário clique no botão "enviar" na tela de inserir o código
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $codigo_otp = mysqli_real_escape_string($con, $_POST['codigo']);
        $check_codigo = "SELECT * FROM usuario_professor WHERE codigo = $codigo_otp";
        $run_sql = mysqli_query($con, $check_codigo);
        if(mysqli_num_rows($run_sql) > 0){
            $fetch_dados = mysqli_fetch_assoc($run_sql);
            $fetch_codigo = $fetch_dados['Codigo'];
            $email = $fetch_dados['Email'];
            $codigo = 0;
            $update_otp = "UPDATE usuario_professor SET Codigo = $codigo WHERE Codigo = $fetch_codigo";
            $update_sql = mysqli_query($con, $update_otp);
            if($update_sql){
                $_SESSION['email'] = $email;
                header('location: ../login/indexLogin.php');
                exit();
            }else{
                $erros['otp-erro'] = "Falha ao atualizar o código!";
            }
        }else{
            $erros['otp-erro'] = "Você inseriu o código errado!";
        }
    }

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

    /*if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $erros['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $erros['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE usertable SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $erros['db-error'] = "Failed to change your password!";
            }
        }
    }*/
?>
