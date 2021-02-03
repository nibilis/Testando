<?php
    session_start();
    if(!isset($_SESSION['ID_Usuario']))
    {
      header("location: ../login/indexLogin.php");
      exit;
    }
 ?>


<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="css-perfil/perfil.css">
    <link rel="shortcut icon" href="../images/favicon (1).ico" >

    <!-- Materialize -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@800;900&display=swap" rel="stylesheet">

    </head>

    <body>

      <!--DASHBOARD CELULAR-->

      <div class= "row hide-on-large-only" id= "dashboardcel">

        <div class="col s2">
          <ul id="slide-out" class="hide-on-large-only sidenav" style="width:200px;">
            <li><div class="user-view">
              <div class="sanduiche">
                <img src="../images/logoTestandoNome.png" id="logo">

                <ul id="slide-out" class="sidenavClose">
                  <li><a class="sidenav-close" href="#!" style="position: absolute;"><i class="material-icons" style="position: absolute; margin-left: 160%;font-size: 220%;">menu</i></a></li>
                </ul>
              <a href="#" data-target="slide-out" class="sidenav-trigger"></a>

                <img src="../images/circulo_amarelo_pequeno.png" id="amarelo_pequeno">
                <img src="../images/circulo_roxo.png" id="roxo">
                <img src="../images/circulo_roxo_claro.png" id="roxo_claro">
                <img src="../images/circulo_amarelo_grande.png" id="amarelo_grande">
                <ul id="links_menucel">
                  <li><a id="perfil" class=" waves-effect center-align" href="../perfil/indexPerfil.html">Perfil</a></li>
                  <li><div id="divider" class="divider"></div></li>
                  <li><a id="question" class=" waves-effect center-align" href="../addquestao/indexAddQuestao.html">Adicionar Questão</a></li>
                  <li><div id="divider" class="divider"></div></li>
                  <li><a id="document" class="waves-effect center-align" href="../documento/indexDocumento.php">Adicionar Documento</a></li>
                  <li><div id="divider" class="divider"></div></li>
                  <li><a id="saves" class="waves-effect center-align" href="#!">Salvos</a></li>
                  <li><div id="divider" class="divider"></div></li>
                  <a id="sair" href="../Classes/Sair.php"><i class="material-icons" id="sair2">exit_to_app</i> Sair </a>
                </ul>
              </div>
            </div>
          </ul>
          <a href="#" data-target="slide-out" class="menu sidenav-trigger"><i class=" material-icons" style="font-size: 220%;">menu</i></a>
        </div>

        <div class="col s1">
        </div>
        <div class="col s1">
        </div>
        <div class="col s4" >
          <img class= "responsive-img" id = "nomelogocel" src ="../images/TestandoNome.png">
        </div>
        <div class="col s3">
          <img class= "responsive-img" id = "logocel" src ="../images/logo.png">
        </div>
      </div>

      <!--DASHBOARD COMPUTADOR-->

        <nav class="hide-on-med-and-down navbar-fixed" id="retanguloroxo">
          <div class="nav-wrapper hide-on-med-and-down" id="dashboardpc">

             <img class= "responsive-img" id = "logopc" src ="../images/logo.png"> <img class= "responsive-img" id = "nomelogopc" src ="../images/TestandoNome.png">
            <ul id="nav-pc" class=" right">
              <li><a  id= "questao" href="../addquestao/indexAddQuestao.php" >Adicionar <br> questão</a></li>
              <li><a  id= "documento" href="../documento/indexDocumento.php">Adicionar <br> documento</a>
                <img class= "responsive-img" id = "linha1" src ="../images/linha.png"></li>
              <li><a id= "salvos" href="#!">Salvos</a>
                 <img class= "responsive-img" id = "linha2" src ="../images/linha.png"></li>
            </ul>

          <div class="hide-on-med-and-down" id="perfil_pequeno">
              <div class="responsive-image" id= "foto_perfil_pequeno"><?php $_Imagem=base64_encode( $_SESSION['imagem'] ); echo "<img height='100%' width='100%' src='data:image/jpeg;base64,$_Imagem'> "; ?></div>
            <p id="nome-dashboard"><?php echo $_SESSION['NickName']; ?></p>
          </div>
          </div>
        </nav>

      <!--TELA DE PERFIL CELULAR-->

      <div>
        <div id= "img-perfil"><?php $_Imagem=base64_encode( $_SESSION['imagem'] ); echo "<img height='100%' width='100%' src='data:image/jpeg;base64,$_Imagem'> "; ?></div>
        <p id="nome-perfil" style="overflow: hidden; text-overflow: ellipsis;"> Nome: <span> <?php echo $_SESSION['NickName']; ?></span> </p>
        <p id="materia-perfil"> Matérias que leciona: <span><?php echo $_SESSION['Nome'] ?></span> </p>
        <a id="btn-sair-pc" class=" hide-on-small-only" href="../Classes/Sair.php"><i class="material-icons" id="btn-sair2-pc">exit_to_app</i> Sair </a>
      </div>

      <div>
        <!-- Compartilhar -->
        <div id="divisão" class="divider hide-on-large-only" ></div>
        <img class= "responsive-img hide-on-large-only" id = "compartilhar" src ="../images/compartilhar.png"></li>

        <!-- Modal Trigger COMP-->
          <a class="waves-effect waves-light modal-trigger center-align hide-on-large-only" id="compartilhartexto" href="#comp">Compartilhar</a>
          <h1 class= "hide-on-large-only" id="compartilhardescricao">Gostou? Repasse  para seus amigos!</h1>

          <!-- Ajuda -->

          <div id="divisão2" class="divider  hide-on-large-only" ></div>
          <img class= "responsive-img hide-on-large-only" id = "ajuda" src ="../images/ajuda.png"></li>

          <!-- Modal Trigger AJUDA-->
            <a class="waves-effect waves-light modal-trigger center-align hide-on-large-only" id="ajudatexto" href="../ticket/indexTicket.html">Ajuda</a>
            <h1 class= "hide-on-large-only" id="ajudadescricao">Alguma atitude inesperada do site? Nos contacte!</h1>

            <!-- Tutorial -->

            <div id="divisão3" class="divider  hide-on-large-only" ></div>
            <img class= "responsive-img hide-on-large-only" id = "tutorial" src ="../images/tutorial.png"></li>

            <!-- Modal Trigger TUTOR-->
              <a class="waves-effect waves-light modal-trigger center-align hide-on-large-only" id="tutorialtexto" href="#tutor">Tutorial</a>
              <h1 class= "hide-on-large-only" id="tutorialdescricao">Aprenda a mexer como um profissional!</h1>

          <!-- Modal Structure -->

          <!--Tutorial-->
          <div id="tutor" class="modal">
            <div class="modal-content">
              <h6 style="text-align: center;"><b>Link do tutorial no Youtube</b></h6>
              <a><img class= "responsive-img modal-close" src ="../images/fechar.png"></a>
            </div>
            <div class="modal-footer">
              <input id="inputTest" style="text-align: center;" value="https://youtu.be/Z9jrIKcTwxU"/>
              <button style="margin-top: 5%; margin-bottom: 5%;" class="waves-effect waves-light yellow darken-2 btn" onclick="copiarTexto()">Copiar</button>

              <a href="https://youtu.be/Z9jrIKcTwxU" style="margin-left: 9%; margin-right: 10%; margin-top: 5%; margin-bottom: 5%;" class="modal-close center-align waves-effect yellow darken-2 btn">Acessar</a>
            </div>
          </div>

          <!--Compartilhar-->
          <div id="comp" class="modal">
            <div class="modal-content">
              <h6 style="text-align: center;"><b>Link do Site</b></h6>
              <a><img class= "responsive-img modal-close" src ="../images/fechar.png"></a>
            </div>
            <div class="modal-footer">
              <input id="inputTest2" style="text-align: center;" value="https://testando.com"/>
              <button style="margin-top: 5%; margin-bottom: 5%;" class="waves-effect waves-light yellow darken-2 btn" onclick="copiarTexto2()">Copiar</button>
            </div>
          </div>

          <!--TELA DE PERFIL COMPUTADOR-->

          <div id="divisão4" class="divider hide-on-small-and-down" ></div>

          <img class= "responsive-img hide-on-small-and-down" id = "tutorialpc" src ="../images/tutorial.png"></li>
          <img class= "responsive-img hide-on-small-and-down" id = "ajudapc" src ="../images/ajuda.png"></li>
          <img class= "responsive-img hide-on-small-and-down" id = "compartilharpc" src ="../images/compartilhar.png"></li>

          <a class="waves-effect waves-light modal-trigger center-align hide-on-small-and-down" id="tutorialtextopc" href="#tutor">Tutorial</a>
          <a class="waves-effect waves-light modal-trigger center-align hide-on-small-and-down" id="ajudatextopc" href="../ticket/indexTicket.html">Ajuda</a>
          <a class="waves-effect waves-light modal-trigger center-align hide-on-small-and-down" id="compartilhartextopc" href="#comp">Compartilhar</a>

          <h1 class= "hide-on-small-and-down" id="tutorialdescricaopc">Aprenda a mexer como <br>um profissional!</h1>
          <h1 class= "hide-on-small-and-down" id="ajudadescricaopc">Alguma atitude inesperada do <br> site? Nos contacte!</h1>
          <h1 class= "hide-on-small-and-down" id="compartilhardescricaopc">Gostou? Repasse para <br>seus amigos!</h1>



      </div>

      <!-- JQuery CDN -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <!-- JavaScript Materialize compilado e minificado -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <script>
  //INICIALIZAÇÃO MENU CELULAR

  $(document).ready(function(){
    $('.sidenav').sidenav();});
  </script>

<script>
   instance.close();
</script>


<script>
//POP UP TUTORIAL
    $(document).ready(function(){
    $('.modal').modal();
    });
</script>


<script>
//COPIAR
        let copiarTexto = () =>{
            //captura o elemento input
            const inputTest = document.querySelector("#inputTest");

            //seleciona todo o texto do elemento
            inputTest.select();
            //executa o comando copy
            //aqui é feito o ato de copiar para a area de trabalho com base na seleção
            document.execCommand('copy');
        };
    </script>

    <script>
    //COPIAR
            let copiarTexto2 = () =>{
                //captura o elemento input
                const inputTest = document.querySelector("#inputTest2");

                //seleciona todo o texto do elemento
                inputTest.select();
                //executa o comando copy
                //aqui é feito o ato de copiar para a area de trabalho com base na seleção
                document.execCommand('copy');
            };
        </script>

    </body>
  </html>
