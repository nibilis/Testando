<?php require_once "../Classes/ControleDadosUsuario.php"; ?>

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
    <!--<header>
       DASHBOARD COMPUTADOR
      <nav class="hide-on-med-and-down navbar-fixed" id="retanguloroxo">
        <div class="nav-wrapper hide-on-med-and-down" id="dashboardpc">

           <img class= "responsive-img" id = "logopc" src ="../images/logo.png">
           <img class= "responsive-img" id = "nomelogopc" src ="../images/TestandoNome.png"> </a>

          <ul id="nav-pc" class=" right">
          </ul>

        </div>
      </nav>
    </header> -->

    <form action="indexEsqueceuSenha.php" class="login-form" method="post">
		<h2 class="form-title">Mudança de Senha</h2>
    <div class="input-field col  l4 center-align hide-on-med-and-down">
      <input placeholder="E-mail" id="Email" type="email" name="email">
    </div>
    <div class="col l6 center-align hide-on-med-and-down">
      <button class="waves-effect waves-light btn yellow darken-2 hoverable" type="submit">Enviar</button>
    </div>
	 </form>
  </body>
</html>
