<?php
  require_once "../Classes/ControleDadosUsuario.php";

  if(!isset($_SESSION['email']))
  {
    header("location: indexLogin.php");
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Code Verification</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4 form">
        <form action="indexCodigoSenha.php" method="POST" autocomplete="off">
          <h2 class="text-center">Verificação do Código</h2>
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
              <input class="form-control" type="number" name="codigo" placeholder="Insira o código enviado" required>
            </div>
            <div class="form-group">
              <input class="form-control button" type="submit" name="check" value="Verificar">
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
