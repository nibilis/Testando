<?php
  include ("../Classes/DataBase.php");
  require_once'../Classes/DataBase.php';
  $u = new DataBase;

  $u->conectar("testando", "localhost", "root", "");

  require_once'../Classes/Usuario.php';
  $c = new Usuario;

  $consulta = "SELECT * FROM professor ORDER BY Nome ASC";
  $con = $pdo->query($consulta) or die($pdo->error);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <!-- Font web de ícones -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- CSS compilado e minificado -->
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" media="screen"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Testando</title>
  <link rel="stylesheet" href="css-validprontuario/validprontuario.css">
  <link href="https://fonts.googleapis.com/css2?family=Muli:wght@700&display=swap" rel="stylesheet">
  <!--ícone no navegador-->
  <link rel="shortcut icon" href="../images/favicon (1).ico" >
  <meta name="theme-color" content="black">
</head>

<body>
  <header>


    <!-- DASHBOARD COMPUTADOR -->
    <nav class="hide-on-med-and-down navbar-fixed" id="retanguloroxo">
      <div class="nav-wrapper hide-on-med-and-down" id="dashboardpc">

         <img class= "responsive-img" id = "logopc" src ="../images/logo.png">
         <img class= "responsive-img" id = "nomelogopc" src ="../images/TestandoNome.png"> </a>

        <ul id="nav-pc" class=" right">
        </ul>

      </div>
    </nav>

    <!-- FINAL DASHBOARD COMPUTADOR -->

<form method= "POST">
  <div id="campos">
      <!-- acho que isso aqui só funciona com looping-->
      <input class="flow-text validate" type="text" size="30" id="nome" placeholder="Nome" name="nome">
      <input class="flow-text validate" type="text" size="9" id="prontuario" placeholder="Prontuário" name="prontuario">
      <input class="flow-text validate" type="number" data-length="11" id="cpf" placeholder="CPF" name="CPF">
      <input class="btn-floating btn-large waves-effect waves-light  teal accent-4 " id="botaoadd" type="submit" value="+">
  </div>

</form>

<?php

  if(isset($_POST['nome'])){

		$nome = addslashes($_POST['nome']);
    $prontuario = addslashes($_POST['prontuario']);
		$CPF= addslashes($_POST['CPF']);
		//verificar se esta preenchido

  if(!empty($nome) && !empty($prontuario) && !empty($CPF))
  {
      $u->conectar();
      if($u->msgErro == ""){
          if($c->validprontuario($nome, $prontuario, $CPF))
          {
            echo "Cadastrado com sucesso!";
            if($c->verification($CPF, $prontuario)){
              echo "CPF existente";
            }
            else{
              echo "";
            }
          }
          else{
            echo "CPF ja cadastrado";
          }
      }
      else {
        echo "Erro: ".$u->msgErro;
      }
  }
  else{
    echo "Preencha todos os campos";
  }
}
?>


  <table class="centered responsive-table highlight">
    <thead>
        <tr>
          <th>Nome</th>
          <th>Prontuário</th>
          <th>CPF</th>
        </tr>
      </thead>
      <?php while($dado = $con->fetch()) { ?>
      <tbody>
      <tr>
          <td><?php echo $dado["Nome"];?></td>
          <td><?php echo $dado["Prontuario"];?></td>
          <td><?php echo $dado["CPF"];?></td>
        </tr>
      </tbody><?php } ?>
    </table>

  </header>
</body>
