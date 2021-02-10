<?php
    session_start();
    if(!isset($_SESSION['ID_Usuario']))
    {
      header("location: ../login/indexLogin.php");
      exit;
    }

    require_once'../Classes/Questao.php';
    $q = new Questao;
    require_once'../Classes/DataBase.php';
    $u = new DataBase;
 ?>


 <!DOCTYPE html>
 <html lang="pt-br">

   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Documento</title>
     <link rel="stylesheet" href="css-documento/documento.css">
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
                   <a id="sair" href="../Classes/Sair.php"><i class="material-icons" id="sair2" >exit_to_app</i> Sair </a>
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
               <div id= "foto_perfil_pequeno"><?php $_Imagem=base64_encode( $_SESSION['imagem'] ); echo "<img height='100%' width='100%' src='data:image/jpeg;base64,$_Imagem'> "; ?></div>
             <p id="nome-dashboard"><?php echo $_SESSION['NickName']; ?></p>
           </div>
           </div>
         </nav>


         <!--FORMATAÇÃO CELULAR-->

         <!--RODAPÉ--> <!--NÃO TIRAR ESSE CÓDIGO DO LUGAR, MESMO QUE ELE DEVERIA FICAR EM ÚLTIMO POR SER O RODAPÉ-->
        <div class="rodape hide-on-large-only">
          <footer class="page-footer " id="rodape">
         <div class="container">
           <div class="row">
             <div class="col l4 offset-l2 s12">
               <ul>
                 <li><button href="#documento1" value="ok" target="_self" id="btn-documento1" class="btn waves-effect waves-light transparent" style="height:80%; box-shadow: none;"><img class= "responsive-img" id="doc" src ="../images/documento1.png"></button></li>
                 <li><button href="#gabarito" value="ok" target="_self" id="btn-gabarito" class="btn waves-effect waves-light transparent" style="height:80%; box-shadow: none;"><img class= "responsive-img" id="gaba" src ="../images/gabarito.png"></button></li>
                 <li><button href="#add_questoes" value="ok" target="_self" id="btn-add_questoes" class="btn waves-effect waves-light transparent" style="height:80%; box-shadow: none;"><img class= "responsive-imgt" id="quest" src ="../images/add_questoes.png"></button></li>
               </ul>
             </div>
           </div>
         </div>
        </div>
        <!--FINAL RODAPÉ-->


         <!-- DOCUMENTO -->
         <div class="documento1" id="documento1">
           <div class="row hide-on-large-only">
            <form class="col s12">
              <div class="row">
                <div class="input-field">
                  <input placeholder="Insira o nome do documento" id="nome_documento" style = "text-align: center;" type="text">
                </div>
              </div>
              <textarea  rows="8" cols="80"></textarea>
              <img class= "responsive-img" id = "seta_esquerda" src ="../images/seta_esquerda.png">
              <button id="btn_salvar" class="hide-on-large-only waves-effect waves-light btn" type="submit" name="action">Salvar</button>
              <img class= "responsive-img" id = "seta_direita" src ="../images/seta_direita.png">
            </div>
          </div>
          <!-- FINAL DOCUMENTO -->

          <!-- GABARITO -->
          <div class="gabarito" id="gabarito">
            <div class="row hide-on-large-only">
             <form class="col s12">
               <div class="row">
                 <div class="input-field">
                   <center><h4 id="título_gabarito">Gabarito</h4></center>
                 </div>
               </div>
               <textarea rows="8" cols="80"></textarea>
               <img class= "responsive-img" id = "seta_esquerda2" src ="../images/seta_esquerda.png">
               <button id="btn_salvar2" class="hide-on-large-only waves-effect waves-light btn" type="submit" name="action">Salvar</button>
               <img class= "responsive-img" id = "seta_direita2" src ="../images/seta_direita.png">
             </div>
          </div>
          <!-- FINAL GABARITO -->


          <!-- ADD_QUESTÕES -->
          <div class="add_questoes" id="add_questoes">

            <!-- CAMPOS FILTRO -->
            <div id="filtro_parte1">
              <div class="input-field" id="materia">
                <select>
                  <option value="" disabled selected>Matéria</option>
                  <optgroup label="Ensino médio" style= "font-family: 'Muli'; font-size: 11px; float: left;">
                    <option value="1">Matemática</option>
                    <option value="2">Biologia</option>
                    <option value="3">Geografia</option>
                  </optgroup>
                  <optgroup label="Ensino técnico" style= "font-family: 'Muli'; font-size: 11px; float: left;">
                    <option value="1">Banco de Dados</option>
                    <option value="2">Lógica de Programação</option>
                    <option value="3">Alguma matéria de algum outro curso</option>
                  </optgroup>
                </select>
              </div>
              <div class="input-field" id="tema">
                <select>
                  <option value="" disabled selected>Tema</option>
                  <option value="1">Hidrografia</option>
                  <option value="2">Paisagem</option>
                  <option value="3">Rondônia</option>
                </select>
              </div>
            <div id="filtro_parte2">
              <div class="input-field" id="subtema">
                <select>
                  <option value="" disabled selected>Subtema</option>
                  <option value="1">Águas do pacífico</option>
                  <option value="2">Perca do status salino</option>
                  <option value="3">Qualificador de PH neutro</option>
                </select>
              </div>
              <div class="input-field" id="modalidade">
                <select>
                  <option value="" disabled selected>Modalidade</option>
                  <option value="1">Alternativa</option>
                  <option value="2">Dissertativa</option>
                </select>
              </div>
            </div>
            <div id="filtro_parte3">
              <div class="input-field" id="dificuldade">
                <select>
                  <option value="" disabled selected>Dificuldade</option>
                  <option value="1">Fácil</option>
                  <option value="2">Médio</option>
                  <option value="3">Difícil</option>
                </select>
              </div>
              <div class="input-field" id="origem">
                <select>
                  <option value="" disabled selected>Origem</option>
                  <option value="1">Vestibular</option>
                  <option value="2">Outros professores</option>
                </select>
              </div>
            </div>
            </div>
            <div id="filtro_parte4">
              <form action="#">
                <p id="quest_favorito">
                  <label>
                    <input type="checkbox"/>
                    <span style="font-size: 100%;">Favoritos</span>
                  </label>
                </p>
                <p id="my_quest">
                  <label>
                    <input type="checkbox"/>
                    <span style="font-size: 100%;">Minhas Questões</span>
                  </label>
                </p>
              </form>
            </div>

            <!-- QUESTÕES DOS PROFESSORES -->
        <div id="scroll">
            <?php
            $u->conectar();
            $results = $q->listAll();
             foreach($results as $row){
              $q->imagem($row['ID_Usuario']);?>
              <div class="responsive-image" id= "foto_prof"><?php $_Imagem=base64_encode( $_SESSION['imagem'] ); echo "<img height='100%' width='100%' src='data:image/jpeg;base64,$_Imagem'> "; ?></div>
              <div id="quest_profs">
                <p><?php echo $row['Enunciado']?></p>
              </div>
              <!-- Modal Trigger engrenagem -->
                <a href="#engrenagem-modal" style="width: 52px;" class="waves-effect waves-light modal-trigger"><img class="responsive-img" id="engrenagem" src ="../images/Engrenagem.png"></a>
            <?php } ?>

            <!-- Modal Structure engrenagem -->
            <div id="engrenagem-modal" class="modal">

              <div class="modal-content">
                <div id="addquest_documento">
                  <button id="btn_addquest" style="margin-bottom: 7%; margin-top: 10%;" class="hide-on-large-only waves-effect waves-light btn transparent" type="submit" name="action"><img class="responsive-img" id="img_addquest" src ="../images/denunciar.png"><p id="palavra_addquestao">Denunciar</p></button>
                  <button id="btn_addquest" style="margin-bottom: 7%;" class="hide-on-large-only waves-effect waves-light btn transparent" type="submit" name="action"><img class="responsive-img" id="img_addquest" src ="../images/favoritar.png"><p id="palavra_addquestao">Favoritar</p></button>
                  <button id="btn_addquest" style="margin-bottom: 7%;" class="hide-on-large-only waves-effect waves-light btn transparent" type="submit" name="action"><img class="responsive-img" id="img_addquest" src ="../images/avaliar.png"><p id="palavra_addquestao">Avaliar</p></button>
                  <button id="btn_addquest" class="hide-on-large-only waves-effect waves-light btn transparent" type="submit" name="action"><img class="responsive-img" id="img_addquest" src ="../images/nivel_dificuldade.png"><p id="palavra_addquestao">Dificuldade</p></button>
                </div>
              </div>
            </div>


          </div>


          <!-- FINAL ADD_QUESTÕES -->


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


   <!-- CÓDIGO BOTÃO documento/gabarito/add_questoes (mobile - JavaScript) -->
   <script>

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

   <!-- CAMPOS FILTRO: ADD_QUESTÕES MOBILE-->
   <script>
      $(document).ready(function(){
      $('select').formSelect();
      });
   </script>

   <!-- MODAL DAS ENGRENAGENS (JQuery) -->
   <script>
     $(document).ready(function(){
     $('.modal').modal();
     });
   </script>


    </body>

  </html>
