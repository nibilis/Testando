<?php
header('Content-Type: text/html; charset=UTF-8');
  require_once'../Classes/Usuario.php';
  $c = new Usuario;
  require_once'../Classes/DataBase.php';
  $u = new DataBase;
  require_once'../Classes/Cidade.php';
  $city = new Cidade;
  require_once'../Classes/Estado.php';
  $est = new Estado;
  require_once'../Classes/Materia.php';
  $m = new Materia;
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
  <link rel="stylesheet" href="css-cadastro/cadastro.css">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Muli:wght@700&display=swap" rel="stylesheet">
  <!--ícone no navegador-->
  <link rel="shortcut icon" href="../images/favicon (1).ico" >
  <meta name="theme-color" content="black">
</head>

<body>

<!--CELULAR-->
  <!--LINHA LATERAL ROXA-->
  <div class="row">
      <div class="linha_lateral col s1 l1"></div>

      <!--LOGO-->
        <div class="logo">
          <img class="img-logo responsive-img" src="../images/LogoTestandoNome.png">
        </div>

<!--CAMPOS-->
<form method="POST">

<div class="input-field col s10 l8" id="nome" >
  <input class="flow-text validate" placeholder="Como se chama?" id="first_name" type="text" style="color:black; font-family: 'Muli';" name="nome">
</div>

<div class="input-field col s10 l8" id="cpf" >
  <input class="flow-text validate" placeholder="CPF" id="numero" type="number" data-length="11" name="CPF">
</div>

<div class="input-field col s10 l4" id="materia">
  <select id="materiafonte" name="materia">
      <option value="" disabled selected>Matéria que leciona</option>
      <?php
        $u->conectar("testando", "localhost", "root", "");
        $results = $m->listAll();
       foreach($results as $row){ ?>
          <option value="<?php echo $row['ID_Materia'] ?>"><?php echo $row['Nome'] ?></option>
      <?php } ?>
    </select>
</div>

<div class="input-field col s9 l8 " id="email">
  <!-- <input class="flow-text" id="email" placeholder="E-mail" type="email" class="validate" style="font-size: 75%;">
   <label data-error="E-mail inválido" for="email"></label>-->
    <input class="flow-text validate" placeholder="E-mail" id="email" type="email" name="email">
</div>

<div class="input-field col s10 l4" id="estado">
  <select id="estadofonte" name="estado">
      <option value="" disabled selected>Selecione o seu estado</option>
      <?php
        $u->conectar("testando", "localhost", "root", "");
        $results = $est->listAll();
       foreach($results as $row){ ?>
          <option value="<?php echo $row['Sigla'] ?>"><?php echo $row['Nome'] ?></option>
      <?php } ?>
    </select>
    <label>Estado</label>
  </div>

  <div class="input-field col s10 l4" id="cidade">

  <select id="cidadefonte" name="cidade">
     <option value="" disabled >Selecione a sua cidade</option>
<?php
  $u->conectar("testando", "localhost", "root", "");
  $results = $city->listAll();

 foreach($results as $row){ ?>
    <option value="<?php echo $row['Cod'] ?>"><?php echo $row['Nome'] ?></option>
<?php } ?>
</select>
<label>Cidade</label>
</div>


    <div class="input-field col s9 l8" id="endereço">
      <input class="flow-text validate" placeholder="Endereço" id="localização" type="text" name="endereço">
    </div>

    <div class="input-field col s9 l8" id="senha">
      <input class="flow-text validate" placeholder="Senha" id="senhas" type="password" name="senha">
    </div>

    <div class="input-field col s9 l8" id="confirmasenha">
      <input class="flow-text validate" placeholder="Confirmação de senha" id="confirmasenhas" type="password" name="confSenha">
  </div>

  <div>
      <button class="cadastro flow-text waves-effect yellow darken-2 waves-light hoverable" type="submit">Cadastrar</button>
  </div>
</form>

<?php

//verificar se clicou no botão
	if(isset($_POST['nome'])){

		$nome = addslashes($_POST['nome']);
		$CPF_Usuario = addslashes($_POST['CPF']);
		$materia = addslashes($_POST['materia']);
		$email = addslashes($_POST['email']);
    $cidade = addslashes($_POST['cidade']);
		$endereço = addslashes($_POST['endereço']);
		$senha = addslashes($_POST['senha']);
		$confSenha = addslashes($_POST['confSenha']);

	//verificar se esta preenchido
  if(!empty($nome) && !empty($CPF_Usuario) && !empty($materia) && !empty($email) && !empty($cidade) && !empty($endereço) && !empty($senha) && !empty($confSenha))
  {
      $u->conectar();
      if($u->msgErro == ""){
        if($senha == $confSenha)
        {
          if($c->cadastrar($nome, $CPF_Usuario, $materia, $email, $cidade, $endereço, $senha))
          {
            echo "Cadastrado com sucesso!";
          }
          else{
            echo "email ja cadastrado";
          }
        }
        else{
          echo "Senha incorreta";
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

    </div>



<!-- JQuery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- JavaScript Materialize compilado e minificado -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


<!--INICIALIZAÇÃO DOS CAMPOS "CIDADE" E "ESTADO"-->
<script>
  $(document).ready(function(){
    $('select').formSelect();
  });
</script>


<!-- INICIALIZAÇÃO DO CAMPO "MATERIAS QUE LECIONA" -->
<!--<script>
$('#materia').chips({
   placeholder:'Matérias que leciona',
   secondaryPlaceholder:'+Matéria',
 });
</script>
-->
</body>
</html>
