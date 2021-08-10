<?php
  require_once "../Classes/ControleDadosUsuario.php";

  if(!isset($_SESSION['email']))
  {
    header("location: indexLogin.php");
    exit;
  }
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
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4 form">
        <form action="indexNovaSenha.php" method="POST" autocomplete="off">
          <h2 class="text-center">Nova Senha</h2>
            <?php
              if(isset($_SESSION['info'])){
            ?>
              <div class="alert alert-success text-center">
                <?php echo $_SESSION['info']; ?>
              </div>
            <?php
              }
            ?>
            <?php
              if(count($erros) > 0){
            ?>
              <div class="alert alert-danger text-center">
            <?php
                foreach($erros as $mostrarErros){
                  echo $mostrarErros;
                }
            ?>
              </div>
            <?php
              }
            ?>
            <div class="form-group">
              <input class="form-control" type="password" name="senha" placeholder="Crie uma nova senha" required>
            </div>
            <div class="form-group">
              <input class="form-control" type="password" name="csenha" placeholder="Confirme sua senha" required>
            </div>
            <div class="form-group">
              <input class="form-control button" type="submit" name="mudar-senha" value="Mudar">
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
