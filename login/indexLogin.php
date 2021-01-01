<?php

  require_once'../Classes/Login.php';
  $l = new Login;

  require_once'../Classes/DataBase.php';
  $u = new DataBase;

  //verificar se clicou no botão
    if(isset($_POST['prontuario'])){

    	$prontuario = addslashes($_POST['prontuario']);
    	$senha = addslashes($_POST['senha']);

    		 //verificar se esta preenchido
        if(!empty($prontuario) && !empty($senha))
        {
            $u->conectar("testando", "localhost", "root", "");
            if($u->msgErro == "")
            {
              if($l->logar($prontuario, $senha))
              {
                  header("location: ../perfil/indexPerfil.php");
              }
              else
              {
                echo "Prontuario e/ou senha estão incorretos";
              }
        }
        else
        {
          echo "Erro: ".$u->msgErro;
        }}
      else
      {
          echo "Preencha todos os campos";
      }}

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="css-login/login.css">
    <!-- Materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../images/favicon (1).ico" >
  </head>

  <body>

    <div class="hide-on-med-and-down center align" id="degrade">
      <h1>Não tem um login ainda?</h1>
      <div class="center-align" id = "cadastresepc">
          <a href="../cadastro/indexCadastro.php" class="waves-effect waves-light btn white hoverable" id = "btnCadastresepc">Cadastre-se</a>
      </div>
    </div>

<form method="POST">
    <div class="row" id = "div">

      <div class="col  s12 center-align hide-on-large-only">
        <img class= "responsive-img" id = "logo" src ="../images/LogoTestandoNome.png">
      </div>

      <div class="col  l7 center-align hide-on-med-and-down">
        <img class= "responsive-img" id = "logopc" src ="../images/LogoTestandoNome.png">
      </div>

      <div class=" col  s3 center-align hide-on-large-only">
          <img class= "responsive-img" id = "user"src ="../images/user_roxo_borda_preta.png">
      </div>

      <div class=" col  l2 center-align hide-on-med-and-down">
          <img class= "responsive-img" id = "userpc"src ="../images/user_roxo_borda_preta.png">
      </div>

      <div class="input-field col  s10 center-align hide-on-large-only" id="prontuario">
          <input placeholder="Prontuário" id="Prontuário" type="text" class="validate" name="prontuario">
      </div>

      <div class="input-field col l4 center-align hide-on-med-and-down" >
          <input placeholder="Prontuário" id="Prontuário" type="text" class="validate" name="prontuario">
      </div>


      <div class="col  s3  center-align hide-on-large-only">
          <img class= "responsive-img" id = "cadeado"src ="../images/lock.png">
      </div>

      <div class="col  l2 center-align hide-on-med-and-down">
          <img class= "responsive-img" id = "cadeadopc"src ="../images/lock.png">
      </div>


      <div class="input-field col  s10 center-align hide-on-large-only" id="senha">
          <input placeholder="Senha" id="Senha" type="text" class="validate" name="senha">
      </div>

      <div class="input-field col  l4 center-align hide-on-med-and-down">
          <input placeholder="Senha" id="Senha" type="text" class="validate" name="senha">
      </div>


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

      <div class="col  s12 center-align hide-on-large-only" id = "login">
          <input class="waves-effect waves-light btn yellow darken-2 hoverable" id="btnLogin" type="submit" value="Login" >
      </div>

      <div class="col l6 center-align hide-on-med-and-down" id = "loginpc">
          <input class="waves-effect waves-light btn yellow darken-2 hoverable" id="btnLogin" type="submit" value="Login" >
      </div>

      <div class="col  s12 center-align hide-on-large-only" id= "esqsenha">
          <a href="https://www.youtube.com/watch?v=m2B6ayYla3g" class="" id = "btnEsqsenha">Esqueceu sua senha?</a>
      </div>

      <div class="col l6 center-align hide-on-med-and-down" id= "esqsenhapc">
          <a href="https://www.youtube.com/watch?v=m2B6ayYla3g" class="" id = "btnEsqsenha">Esqueceu sua senha?</a>
      </div>
</form>

      <div class="col  s12 deep-purple lighten-2 center-align hide-on-med-and-up" id = "divRoxa">
        <img class= "responsive-img" id = "bolesq" src ="../images/bolinhadirecel.png">
          <h1 class = "flow-text center-align" id = "texto">Não tem um login ainda?</h1>
            <a href="https://www.youtube.com/watch?v=m2B6ayYla3g" class="waves-effect waves-light btn yellow darken-2 hoverable" id = "btnCadastrese">Cadastre-se</a>
        <img class= "responsive-img" id = "boldire" src ="../images/bolinhaesqcel.png">
    </div>
    <!-- JQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- JavaScript Materialize compilado e minificado -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </body>
</html>
