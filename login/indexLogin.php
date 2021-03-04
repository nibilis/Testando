<?php

  require_once'../Classes/Login.php';
  $l = new Login;
  require_once'../Classes/DataBase.php';
  $u = new DataBase;

  session_start();
  unset($_SESSION["nome_documento"]);
  unset($_SESSION["id_documento"]);

  //verificar se clicou no botão
    if(isset($_POST['prontuario'])){

      if($_POST['prontuario'] != ""){
    	   $prontuario = addslashes($_POST['prontuario']);
    	   $senha = addslashes($_POST['senha']);
      }

      else{
         $prontuario = addslashes($_POST['prontuarioCel']);
         $senha = addslashes($_POST['senhaCel']);
      }

    		 //verificar se esta preenchido
        if(!empty($prontuario) && !empty($senha))
        {
          $u->conectar();
          if($u->msgErro == "")
          {
            if($l->logar($prontuario, $senha))
            {
              header("location: ../perfil/indexPerfil.php");
            }
            else
            {
              ?><div id="msgErro"><p>Prontuario e/ou senha estão incorretos!</p></div><?php
            }
        }
        else
        {
          echo "Erro: ".$u->msgErro;
        }}
      else
      {
          ?><div id="msgErro"><p>Por favor preencha todos os campos!</p></div><?php
      }}

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testando</title>
    <link rel="stylesheet" href="css-login/login.css">
    <!-- Materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../images/favicon (1).ico" >
  </head>

  <body>
    <!--NÃO TEM LOGIN AINDA? DESK-->
    <div class="hide-on-med-and-down center align" id="degrade">
      <h1>Não tem um login ainda?</h1>
      <div class="center-align" id = "cadastresepc">
          <a href="../cadastro/indexCadastro.php" class="waves-effect waves-light btn white hoverable center-align" id = "btnCadastresepc">Cadastre-se</a>
      </div>
    </div>

<form method="POST">
    <div class="row" id = "div">

      <!--LOGO-->
      <div class="col  s12 center-align hide-on-large-only">
        <img class= "responsive-img" id = "logo" src ="../images/LogoTestandoNome.png">
      </div>

      <!--LOGO DESK-->
      <div class="col  l7 center-align hide-on-med-and-down">
        <img class= "responsive-img" id = "logopc" src ="../images/LogoTestandoNome.png">
      </div>

      <!--IMAGEM USER ROXO-->
      <div class=" col  s3 center-align hide-on-large-only">
          <img class= "responsive-img" id = "user"src ="../images/user_roxo_borda_preta.png">
      </div>

      <!--IMAGEM USER ROXO DESK-->
      <div class=" col  l2 center-align hide-on-med-and-down">
          <img class= "responsive-img" id = "userpc"src ="../images/user_roxo_borda_preta.png">
      </div>

      <!--CAMPO PRONTUÁRIO DESK-->
      <div class="input-field col s10 center-align hide-on-large-only" id="prontuario">
          <input placeholder="Prontuário" id="Prontuário" type="text" class="validate" name="prontuarioCel">
      </div>

      <!--CAMPO PRONTUÁRIO DESK-->
      <div class="input-field col l4 center-align hide-on-med-and-down" >
          <input placeholder="Prontuário" id="Prontuário" type="text" class="validate" name="prontuario">
      </div>

      <!--IMAGEM DO CADEADO-->
      <div class="col  s3  center-align hide-on-large-only">
          <img class= "responsive-img" id = "cadeado"src ="../images/lock.png">
      </div>

      <!--IMAGEM DO CADEADO DESK-->
      <div class="col  l2 center-align hide-on-med-and-down" id="cadeado1920">
          <img class= "responsive-img" id = "cadeadopc"src ="../images/lock.png">
      </div>

      <!--CAMPO SENHA-->
      <div class="input-field col  s10 center-align hide-on-large-only" id="senha">
          <input placeholder="Senha" id="Senha" type="password" class="validate" name="senhaCel">
      </div>

      <!-- CAMPO SENHA DESK-->
      <div class="input-field col  l4 center-align hide-on-med-and-down">
          <input placeholder="Senha" id="Senha" type="password" class="validate" name="senha">
      </div>

      <!--LEMBRAR DE MIM-->
      <div class="col s12 center-align hide-on-large-only" id="checkbox">
        <form action="#">
          <p>
            <label>
              <input type="checkbox"  />
              <span>Lembrar de mim</span>
            </label>
          </p>
        </form>
      </div>

      <!--LEMBRAR DE MIM DESK-->
      <div class="col l6 center-align hide-on-med-and-down" id="checkboxpc">
        <form action="#">
          <p>
            <label>
              <input type="checkbox"  />
              <span>Lembrar de mim</span>
            </label>
          </p>
        </form>
      </div>

      <!--BOTÃO LOGIN-->
      <div class="col  s12 center-align hide-on-large-only" id = "login">
          <button class="waves-effect waves-light btn yellow darken-2 hoverable" id="btnLogin" type="submit">Login</button>
      </div>

      <!--BOTÃO LOGIN DESK-->
      <div class="col l6 center-align hide-on-med-and-down" id = "loginpc">
          <button class="waves-effect waves-light btn yellow darken-2 hoverable" id="btnLogin" type="submit" >Login</button>
      </div>

      <!--ESQUECEU SUA SENHA-->
      <div class="col  s12 center-align hide-on-large-only" id= "esqsenha">
          <a href="#erro-modal" class="waves-effect waves-light modal-trigger" id = "btnEsqsenha">Esqueceu sua senha?</a>
      </div>

      <!--MODAL ERRO CEL-->
        <div id="erro-modal" class="modal hide-on-large-only">
          <a><img class= "responsive-img modal-close" id="btn_fechar_modal_erro" src ="../images/fechar.png"></a>
          <h6><img class="responsive-img align-center" id="img_erro" src ="../images/manutencao.png"><p>Funcionalidade em desenvolvimento</p></h6>
        </div>

      <!--ESQUECEU SUA SENHA DESK-->
      <div class="col l6 center-align hide-on-med-and-down" id= "esqsenhapc">
          <a href="#erro-modal-desk" class="waves-effect waves-light modal-trigger" id="btnEsqsenha">Esqueceu sua senha?</a>
      </div>

      <!--MODAL ERRO DESK-->
      <div class="modal-content">
        <div id="erro-modal-desk" class="modal hide-on-med-and-down">
          <a><img class= "responsive-img modal-close" id="btn_fechar_modal_erro_desk" src ="../images/fechar.png"></a>
          <h6><img class="responsive-img align-center" id="img_erro_desk" src ="../images/manutencao.png"><p>Funcionalidade em desenvolvimento</p></h6>
        </div>
      </div>

    </form>

      <!--NÃO TEM LOGIN AINDA?-->
      <div class="col  s12 deep-purple lighten-2 center-align hide-on-med-and-up" id = "divRoxa">
        <img class= "responsive-img" id = "bolesq" src ="../images/bolinhadirecel.png">
          <h1 class = "flow-text center-align" id = "texto">Não tem um login ainda?</h1>
            <a href="../cadastro/indexCadastro.php" class="waves-effect waves-light btn yellow darken-2 hoverable" id = "btnCadastrese">Cadastre-se</a>
        <img class= "responsive-img" id = "boldire" src ="../images/bolinhaesqcel.png">
      </div>

    <!-- JQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- JavaScript Materialize compilado e minificado -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <script>
    //MODAL
    $(document).ready(function(){
      $('.modal').modal();
    });
  </script>

  </body>
</html>
