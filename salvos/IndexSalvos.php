<?php
    session_start();
    if(!isset($_SESSION['ID_Usuario']))
    {
      header("location: ../login/indexLogin.php");
      exit;
    }

    require_once'../Classes/Salvos.php';
    $s = new Salvos;
    require_once'../Classes/DataBase.php';
    $u = new DataBase;
    $u->conectar();
?>

<!DOCTYPE html>
<html>

    <head>

      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tela de Salvos</title>
      <link rel="stylesheet" href="./css-salvos/salvos.css">
      <link rel="shortcut icon" href="../images/favicon (1).ico" >

      <!-- Materialize -->

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Muli:wght@700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@800;900&display=swap" rel="stylesheet">

      <link rel="shortcut icon" href="../images/favicon (1).ico" >

      </head>

    <body>
  <!-- Dashboard CELULAR -->

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
              <li><a id="perfil" class=" waves-effect center-align" href="../perfil/indexPerfil.php">Perfil</a></li>
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
    <!-- Dashboard CELULAR FINAL -->

    <!-- Dashboard COMPUTADOR -->
    <nav class="hide-on-med-and-down navbar-fixed" id="retanguloroxo">
      <div class="nav-wrapper hide-on-med-and-down" id="dashboardpc">

         <img class= "responsive-img" id = "logopc" src ="../images/logo.png"> <img class= "responsive-img" id = "nomelogopc" src ="../images/TestandoNome.png"> </a>
        <ul id="nav-pc" class=" right">
          <li><a  id= "questao" href="../addquestao/indexAddQuestao.html" >Adicionar <br> questão</a></li>
          <li><a  id= "documento" href="../documento/indexDocumento.php">Adicionar <br> documento</a>
            <img class= "responsive-img" id = "linha1" src ="../images/linha.png"></li>
          <li><a id= "salvos" href="#!">Salvos</a>
             <img class= "responsive-img" id = "linha2" src ="../images/linha.png"></li>
        </ul>
      </div>

      <!-- foto/nome perfil -->
      <div class="hide-on-med-and-down" id="perfil_pequeno">
          <div class="responsive-image" id= "foto_perfil_pequeno"><?php $_Imagem=base64_encode( $_SESSION['imagem'] ); echo "<img height='100%' width='100%' src='data:image/jpeg;base64,$_Imagem'> "; ?></div>
          <p id="nome-dashboard"><?php echo $_SESSION['NickName']; ?></p>
      </div>
    </nav>
    <!-- Dashboard COMPUTADOR FINAL-->

    <!-- MOBILE -->

    <!--RODAPÉ-->

    <div class="rodape hide-on-large-only">
      <footer class="page-footer " id="rodape">
        <div class="container">
          <div class="row">
            <div class="col l4 offset-l2 s12">
              <ul>
                <li><button href="#documento1" value="ok" target="_self" id="btn-documento1" class="btn waves-effect waves-light transparent" style="height:80%; box-shadow: none;"><img class= "responsive-img" id="doc" src ="../images/documento1.png"></button></li>
                <li><button href="#gabarito" value="ok" target="_self" id="btn-gabarito" class="btn waves-effect waves-light transparent" style="height:80%; box-shadow: none;"><img class= "responsive-img" id="gaba" src ="../images/questao.png"></button></li>
                <li><button href="#add_questoes" value="ok" target="_self" id="btn-add_questoes" class="btn waves-effect waves-light transparent" style="height:80%; box-shadow: none;"><img class= "responsive-imgt" id="quest" src ="../images/coracao.png"></button></li>
              </ul>
            </div>
          </div>
     </div>
   </div>

   <!--FINAL RODAPÉ-->


      <!-- MEUS DOCUMENTOS PARA CELULAR-->
      <div class="documento1" id="documento1">

        <!-- Títulos -->

        <h1 class="center-align hide-on-large-only" id="titulodoc"> Meus documentos </h1>

        <!-- Fim títulos -->

        <!-- Documentos salvos -->

        <div class="row hide-on-large-only">
          <?php
            $results = $s->listAllDocumentos();
            foreach($results as $row){ ?>
        <div class="col s12 ">
          <div class="card white">
            <div class="card-content black-text" id="backgroundcard">
              <div class="row">
              <div class="col s4">
              <img class="responsive-img" id="documentoimg" src="../images/documento.png">
              </div>

              <!-- Nome do documento -->
              <div class="col s8 center">
              <p id="documentonome"><?php echo $row['Nome_Documento'];?></p>
              </div>
              <div>

                <!-- Botões -->

                <!-- Modal Trigger -->
                <a class="waves-effect waves-light btn modal-trigger" id="botao1" href="#modal1"> PDF </a>

                <!-- Modal Structure -->
                <div id="modal1" class="modal">
                  <div class="modal-content">
                    <h4 id="gerarpdf" class="center-align" >Gerar PDF</h4>

                      <div class="row">
                      <div class="input-field col s12">
                          <input id="input_text" type="number" data-length="1">
                            <label id="labelversoes"for="input_text">Insira o número de versões:</label>
                      </div>
                      </div>

                       <form action="#">
                         <p class="center-align" id="gerargabarito">Gerar gabarito?</p>
                         <p>
                           <label>
                             <input class="with-gap" name="group1" type="radio"  />
                             <span>Sim</span>
                           </label>
                         </p>
                         <p>
                           <label>
                             <input class="with-gap" name="group1" type="radio"  />
                            <span>Não</span>
                          </label>
                        </p>
                       </form>

                  </div>
                  <div class="modal-footer">
                    <a href="#!" id="btn1salvar" class="modal-close waves-effect waves-green btn-flat">Salvar</a>
                  </div>
                </div>

                <!-- Modal Trigger 2 -->
                <a class="waves-effect waves-light btn modal-trigger" id="botão2" href="#modal2">Moodle</a>

                <!-- Modal Structure 2 -->
                <div id="modal2" class="modal" >
                  <div class="modal-content">

                    <form action="#">
                      <p class="center-align" id="XML"> Deseja baixar o documento em formato XML? </p>
                      <p>
                        <label>
                          <input class="with-gap" name="group1" type="radio"  />
                          <span>Sim</span>
                        </label>
                      </p>
                      <p>
                        <label>
                          <input class="with-gap" name="group1" type="radio"  />
                         <span>Não</span>
                       </label>
                     </p>
                    </form>

                  </div>
                  <div class="modal-footer">
                    <a href="#!" id="btn2salvar" class="modal-close waves-effect waves-green btn-flat">Salvar</a>
                  </div>
                </div>

              </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>


      </div>

      <!-- MINHAS QUESTOES CELULAR-->
      <div class="gabarito" id="gabarito">

        <!-- Títulos -->

        <h1 class="center-align hide-on-large-only" id="tituloquest"> Minhas questões </h1>

        <!-- Fim títulos -->

        <!-- Documentos salvos -->
          <div class="row hide-on-large-only">
            <?php
              $results = $s->listAll();
              foreach($results as $row){ ?>
            <div class="col s12">
              <div class="card white">
                <div class="card-content black-text" id="backgroundcard">

                  <!-- Matéria questão -->

                  <p id="materiaquest" style:"color: purple;"> Matemática - Trigonometria</p>
                  <!-- Conteudo questão -->
                  <p id="conteudoquest2"><?php echo $row['Enunciado'] ?></p>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
      </div>

      <!-- FAVORITADOS CELULAR-->
      <div class="add_questoes" id="add_questoes">

        <!-- Títulos -->

        <h1 class="center-align hide-on-large-only" id="titulofavori">Favoritos</h1>

        <!-- Fim títulos -->

        <!-- Documentos salvos -->

        <div class="row hide-on-med-and-down">
          <?php
            $results = $s->listAll();
            foreach($results as $row){ ?>

          <div class="col s12">
            <div class="card white" id="cardfavoritos">
              <div class="card-content black-text" id="backgroundcard" style="padding-bottom: 2%; padding-top: -1%;">

                <img class="responsive-img" id="favoritarimg" src="../images/favoritar.png">

                <div class="row">
                  <div class="col s3">
                    <img class="responsive-img" id="iconeimg" src="../images/icone.png">
                  </div>

                    <div class="col s9">
                    <!-- Matéria questão -->
                    <p id="materiafavori" style:"color: purple;"> Matemática - Trigonometria</p>

                    <!-- Conteudo questão -->
                    <p id="conteudofavori2"><?php echo $row['Enunciado'] ?></p>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
    </div>

    <!-- FINAL MOBILE -->

    <!-- DESKTOP -->

    <!-- "RODAPÉ"-->
    <nav class="hide-on-med-and-down transparent"style="box-shadow: none; ">
        <div class="nav-wrapper rodape hide-on-med-and-down" style="box-shadow: none; ">
            <div class="row" id="row23" >
              <div class="col l12" >
                <ul id="nav-mobile" class="hide-on-med-and-down" style="box-shadow: none; ">
                  <div class="row" id="row2" >
                    <div class="col l4 center-align" >
                  <li><button href="#documento2" value="ok" target="_self"  id="btn-documento2" class="btn transparent" style="box-shadow: none; color: #414141;">Meus Documentos</button></li>
                    </div>
                    <div class="col l4 center-align" >
                  <li><button href="#gabarito2" value="ok" target="_self" id="btn-gabarito2" class="btn transparent" style="box-shadow: none; color: #414141;">Minhas Questões</button></li>
                    </div>
                    <div class="col l4 center-align" >
                  <li ><button href="#add_questoes2" value="ok" target="_self" id="btn-add_questoes2" class="btn transparent" style="box-shadow: none; color: #414141;">Favoritos</button></li>
                    </div>
                </ul>
              </div>
          </div>
        </div>
  </nav>


   <!--FINAL "RODAPÉ""-->

    <!-- MEUS DOCUMENTOS PARA COMPUTADOR-->
    <div class="documento2" id="documento2">

      <!-- Documentos salvos computador-->

      <div class="row hide-on-med-and-down">
        <?php
          $results = $s->listAllDocumentos();
          foreach($results as $row){ ?>
      <div class="col l4 ">
        <div class="card white">
          <div class="card-content black-text" id="backgroundcard2">
            <div class="row">
            <div class="col l3">

            <img class="responsive-img" id="documentoimg2" src="../images/documento.png">

            </div>

            <!-- Nome do documento -->
            <div class="col l9 center-align">
            <p id="documentonome2"><?php echo $row['Nome_Documento'];?></p>
            </div>
            <div>

              <!-- Botões -->

              <!-- Modal Trigger -->
              <div class="col l9">
              <a class="waves-effect waves-light btn modal-trigger center-align" id="botao1desk" href="#modal1desk"> PDF </a>

              <!-- Modal Structure -->
              <div id="modal1desk" class="modal">

                <div class="modal-content">
                  <h4 id="gerarpdf2" class="center-align" >Gerar PDF</h4>

                    <div class="row">
                    <div class="input-field col s12">
                        <input id="input_text2" type="number" data-length="1">
                          <label id="labelversoes2"for="input_text">Insira o número de versões:</label>
                    </div>
                    </div>

                     <form action="#">
                       <p class="center-align" id="gerargabarito2">Gerar gabarito?</p>
                       <p>
                         <label>
                           <input class="with-gap" name="group1" type="radio"  />
                           <span>Sim</span>
                         </label>
                       </p>
                       <p>
                         <label>
                           <input class="with-gap" name="group1" type="radio"  />
                          <span>Não</span>
                        </label>
                      </p>
                     </form>

                </div>
                <div class="modal-footer">
                  <a href="#!" id="btn1salvar2" class="modal-close waves-effect waves-green btn-flat">Salvar</a>
                </div>
              </div>

              <!-- Modal Trigger 2 -->
              <a class="waves-effect waves-light btn modal-trigger center-align" id="botão2desk" href="#modal2desk">Moodle</a>

              <!-- Modal Structure 2 -->
              <div id="modal2desk" class="modal" >
                <div class="modal-content">

                  <form action="#">
                    <p class="center-align" id="XML2"> Deseja baixar o documento em formato XML? </p>
                    <p>
                      <label>
                        <input class="with-gap" name="group1" type="radio"  />
                        <span>Sim</span>
                      </label>
                    </p>
                    <p>
                      <label>
                        <input class="with-gap" name="group1" type="radio"  />
                       <span>Não</span>
                     </label>
                   </p>
                  </form>

                </div>
                <div class="modal-footer">
                  <a href="#!" id="btn2salvar2" class="modal-close waves-effect waves-green btn-flat">Salvar</a>
                </div>
              </div>

              </div>

              </div>
            </div>
          </div>
        </div>
      </div>
        <?php } ?>
    </div>
      </div>

    <!-- MINHAS QUESTOES COMPUTADOR-->
    <div class="gabarito2" id="gabarito2">

      <!-- Títulos

      <h1 class="center-align hide-on-med-and-down" id="tituloquest2"> Minhas questões </h1>

      -->

      <!-- Fim títulos -->

      <!-- Documentos salvos -->
      <?php
        $results = $s->listAll();
        foreach($results as $row){ ?>
        <div class="row hide-on-med-and-down">
          <div class="col l4">
            <div class="card white">
              <div class="card-content black-text" id="backgroundcard2">

                <!-- Matéria questão -->

                <p id="materiaquest2" style:"color: purple;"> Matemática - Trigonometria</p>
                <!-- Conteudo questão -->
                <p id="conteudoquest2"><?php echo $row['Enunciado'] ?></p>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

    <!-- FAVORITADOS COMPUTADOR-->
    <div class="add_questoes2" id="add_questoes2">



      <!-- Títulos

      <h1 class="center-align hide-on-med-and-down" id="titulofavori2">Favoritos</h1>

      -->

      <!-- Fim títulos -->

      <!-- Documentos salvos -->
      <?php
        $results = $s->listAll();
        foreach($results as $row){ ?>
      <div class="row hide-on-med-and-down">

        <div class="col l4">
          <div class="card white" id="cardfavoritos2">
            <div class="card-content black-text" id="backgroundcard2" style="padding-bottom: 2%; padding-top: -1%;">

              <img class="responsive-img" id="favoritarimg2" src="../images/favoritar.png">

              <div class="row">
                <div class="col l3">
                  <img class="responsive-img" id="iconeimg2" src="../images/icone.png">
                </div>

                  <div class="col l9">
                  <!-- Matéria questão -->
                  <p id="materiafavori2" style:"color: purple;"> Matemática - Trigonometria</p>

                  <!-- Conteudo questão -->
                  <p id="conteudofavori2"><?php echo $row['Enunciado'] ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>




    <!-- FINAL DESKTOP -->

<!-- JQuery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- JavaScript Materialize compilado e minificado -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>



<!--INICIALIZAÇÃO MENU (sanduiche) CELULAR (JQuery)-->

<script>

$(document).ready(function(){
  $('.sidenav').sidenav();});

$(document).ready(function(){
  $('.modal').modal();
});

$(document).ready(function() {
  $('input#input_text, textarea#textarea2').characterCounter();
});

$(document).ready(function() {
  $('input#input_text2, textarea#textarea2').characterCounter();
});


  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
  });



//CÓDIGO BOTÃO documento/questões/favoritos (DESKTOP - JavaScript)

       //DOCUMENTO MOBILE
       var btn1 = document.getElementById('btn-documento1');
       var gabarito = document.querySelector('.gabarito');
       var add_questoes = document.querySelector('.add_questoes');

       btn1.addEventListener('click', function() {

       if (documento1.style.display = 'block') {
           gabarito.style.display = 'none';
           add_questoes.style.display = 'none';
       }

       else {
         documento1.style.display = 'none';
       }

         });

         //GABARITO MOBILE
         var btn2 = document.getElementById('btn-gabarito');
         var documento1 = document.querySelector('.documento1');
         var add_questoes = document.querySelector('.add_questoes');

         btn2.addEventListener('click', function() {

         if (gabarito.style.display = 'block') {
             documento1.style.display = 'none';
             add_questoes.style.display = 'none';
         }

         else {
           gabarito.style.display = 'none';
         }
           });

          //ADD_QUESTÃO MOBILE
          var btn3 = document.getElementById('btn-add_questoes');
          var documento1 = document.querySelector('.documento1');
          var gabarito = document.querySelector('.gabarito');

          btn3.addEventListener('click', function() {

          if (add_questoes.style.display = 'block') {
              documento1.style.display = 'none';
              gabarito.style.display = 'none';
          }

          else {
            add_questoes.style.display = 'none';
          }
            });

</script>

<!-- CÓDIGO BOTÃO documento/questões/favoritos (DESKTOP - JavaScript) -->

   <script>

       //DOCUMENTO DESKTOP
       var btn1desk = document.getElementById('btn-documento2');
       var gabarito2 = document.querySelector('.gabarito2');
       var add_questoes2 = document.querySelector('.add_questoes2');

       btn1desk.addEventListener('click', function() {

       if (documento2.style.display = 'block') {
           gabarito2.style.display = 'none';
           add_questoes2.style.display = 'none';
       }

       else {
         documento2.style.display = 'none';
       }

         });

         //MINHAS QUESTÕES DESKTOP
         var btn2desk = document.getElementById('btn-gabarito2');
         var documento2 = document.querySelector('.documento2');
         var add_questoes2 = document.querySelector('.add_questoes2');

         btn2desk.addEventListener('click', function() {

         if (gabarito2.style.display = 'block') {
             documento2.style.display = 'none';
             add_questoes2.style.display = 'none';
         }

         else {
           gabarito2.style.display = 'none';
         }
           });

          //FAVORITOS DESKTOP
          var btn3desk = document.getElementById('btn-add_questoes2');
          var documento2 = document.querySelector('.documento2');
          var gabarito2 = document.querySelector('.gabarito2');

          btn3desk.addEventListener('click', function() {

          if (add_questoes2.style.display = 'block') {
              documento2.style.display = 'none';
              gabarito2.style.display = 'none';
          }

          else {
            add_questoes2.style.display = 'none';
          }
            });

   </script>

</body>

</html>
