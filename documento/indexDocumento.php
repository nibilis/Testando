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
    require_once'../Classes/Documento.php';
    $d = new Documento;
 ?>


 <!DOCTYPE html>
 <html lang="pt-br">

   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Testando</title>
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
                   <li><a id="perfil" class=" waves-effect center-align" href="../perfil/indexPerfil.php">Perfil</a></li>
                   <li><div id="divider" class="divider"></div></li>
                   <li><a id="question" class=" waves-effect center-align" href="../addquestao/indexQuestao.html">Adicionar Questão</a></li>
                   <li><div id="divider" class="divider"></div></li>
                   <li><a id="document" class="waves-effect center-align" href="../documento/indexDocumento.php">Adicionar Documento</a></li>
                   <li><div id="divider" class="divider"></div></li>
                   <li><a id="saves" class="waves-effect center-align" href="../salvos/indexSalvos">Salvos</a></li>
                   <li><div id="divider" class="divider"></div></li>
                   <a id="sair" href="../login/indexLogin.php"><i class="material-icons" id="sair2">exit_to_app</i> Sair </a>
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
               <li><a  id= "questao" href="../addquestao/indexQuestao.php">Adicionar <br> questão</a></li>
               <li><a  id= "documento" href="../documento/indexDocumento.php">Adicionar <br> documento</a>
                 <img class= "responsive-img" id = "linha1" src ="../images/linha.png"></li>
               <li><a id= "salvos" href="../salvos/indexSalvos.php">Salvos</a>
                  <img class= "responsive-img" id = "linha2" src ="../images/linha.png"></li>
             </ul>
             <a href="../perfil/indexPerfil.php" >
             <div class="hide-on-med-and-down" id="perfil_pequeno">
                <div id= "foto_perfil_pequeno"><?php $_Imagem=base64_encode( $_SESSION['imagem'] ); echo "<img height='66%' width='66%' src='data:image/jpeg;base64,$_Imagem'> "; ?></div>
                <p id="nome-dashboard"><?php echo $_SESSION['NickName']; ?></p></a>
             </div>
           </div>
         </nav>

      <p class="button-group">
         <button id="btn_documento_desk" class=" transparent hide-on-med-and-down waves-effect waves-light btn" type="submit" name="action">Documento</button>
         <button id="btn_gabarito_desk" class="transparent hide-on-med-and-down waves-effect waves-light btn" type="submit" name="action">Gabarito</button>
       </p>

         <!--RODAPÉ CEL--> <!--NÃO TIRAR ESSE CÓDIGO DO LUGAR, SE TIRAR VAI DAR ERRO PARA O CELULAR-->
         <div class="rodape hide-on-large-only">
          <footer class="page-footer " id="rodape">
           <div class="container">
             <div class="row">
               <div class="col l4 offset-l2 s12">
                 <ul>
                   <li><button href="#documento1" value="ok" target="_self" id="btn-documento1" class="btn waves-effect waves-light transparent" style="height:80%; box-shadow: none;"><img class= "responsive-img" id="doc" src ="../images/documento1.png"></button></li>
                   <li><button href="#gabarito" value="ok" target="_self" id="btn-gabarito" class="btn waves-effect waves-light transparent" style="height:80%; box-shadow: none;"><img class= "responsive-img" id="gaba" src ="../images/gabarito.png"></button></li>
                   <?php
                     if(isset($_SESSION['nome_documento'])){
                       ?><li><button href="#add_questoes" value="ok" target="_self" id="btn-add_questoes" class="btn waves-effect waves-light transparent" style="height:80%; box-shadow: none;"><img class= "responsive-imgt" id="quest" src ="../images/add_questoes.png"></button></li><?php
                     }
                     else{
                       ?><li><button onclick="alertDocumento()" class="btn waves-effect waves-light transparent" style="height:80%; box-shadow: none;"><img class= "responsive-imgt" id="quest" src ="../images/add_questoes.png"></button></li><?php
                     }
                   ?>
                 </ul>
               </div>
             </div>
           </div>
          </footer>
         </div>
         <!--FINAL RODAPÉ CEL-->


         <!--FORMATAÇÃO COMPUTADOR-->

         <!-- DOCUMENTO DESK -->
         <div class="documento1_desk" id="documento1_desk">
           <div class="row hide-on-med-and-down">
             <form class="col s12" method="POST">
              <div class="row" style="width: 60%; margin-top: 4%;">
                <div class="input-field">
                  <?php
                    if(isset($_SESSION['nome_documento'])){
                      ?> <p id="documento-nome-php"><?php echo $_SESSION['nome_documento'];?><p> <?php
                    }
                    else{
                      ?><input placeholder="Insira o nome do documento" id="nome_documento_desk" style = "text-align: center;" name="nome_documento_desk" type="text" maxlength= "25"><?php
                    }
                  ?>
                </div>
              </div>
              <div id="quadrado_desk" style="overflow: auto;" rows="8" cols="80">
                <div>
                  <p style="margin-left: -3%;"><b>Nome:</b><br></p>
                </div>
              <div class="row" id="cabecalho1_desk">
                <div>
                  <p><b>Prontuário:</b></p>
                </div>
                <div>
                  <p id="turma"><b>Turma:</b></p>
                </div>
              </div>
              <div class="row" id="cabecalho2_desk">
                <div>
                  <p><b>Professor:</b></p>
                </div>
                <div>
                  <p id="data" ><b>Data:</b></p>
                </div>
              </div>
              <div class="divider" id="divider2" style="margin-bottom: 4%;"></div>
                <?php $u->conectar(); $d->exibirQuestoes();?><br>
              </div>
              <!--BOTÃO SALVAR-->
              <?php
                if(isset($_SESSION['nome_documento'])){
                  ?><a id="btn_salvar_desk" class="hide-on-med-and-down waves-effect waves-light btn"  href="../Classes/NovoDocumento.php" name="action">Salvar</a><?php
                }
                else{
                  ?><button id="btn_salvar_desk" class="hide-on-med-and-down waves-effect waves-light btn" type="submit" name="action">Criar</button><?php
                }
              ?>
            </form>
          </div>
        </div>
       <!-- FINAL DOCUMENTO DESK -->

      <!-- GABARITO DESK -->
      <div class="gabarito_desk" id="gabarito_desk">
        <div class="row hide-on-med-and-down">
         <form class="col s12">
           <div class="row">
             <div class="input-field">
               <center><h4 id="título_gabarito_desk">Gabarito</h4></center>
             </div>
           </div>
           <div id="quadrado_desk" style="overflow: auto;" rows="8" cols="80"><br>
             <?php $u->conectar(); $d->exibirRespostas();?><br>
           </div>
         </form>
        </div>
      </div>
      <!-- FINAL GABARITO DESK -->

      <!-- ADD_QUESTÕES DESK-->
      <div class="add_questoes_desk" id="add_questoes_desk" class="hide-on-med-and-down">

        <!-- CAMPOS FILTRO PARTE 1 DESK -->
        <div id="filtro_parte1_desk" class="hide-on-med-and-down">
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
          <div class="input-field" id="subtema">
            <select>
              <option value="" disabled selected>Subtema</option>
              <option value="1">Águas do pacífico</option>
              <option value="2">Perca do status salino</option>
              <option value="3">Qualificador de PH neutro</option>
            </select>
          </div>
        </div>

        <!-- CAMPOS FILTRO PARTE 2 DESK -->
        <div id="filtro_parte2_desk">
          <div class="input-field hide-on-med-and-down" id="modalidade">
            <select>
              <option value="" disabled selected>Modalidade</option>
              <option value="1">Alternativa</option>
              <option value="2">Dissertativa</option>
            </select>
          </div>
          <div class="input-field hide-on-med-and-down" id="dificuldade">
            <select>
              <option value="" disabled selected>Dificuldade</option>
              <option value="1">Fácil</option>
              <option value="2">Médio</option>
              <option value="3">Difícil</option>
            </select>
          </div>
          <div class="input-field hide-on-med-and-down" id="origem">
            <select>
              <option value="" disabled selected>Origem</option>
              <option value="1">Vestibular</option>
              <option value="2">Outros professores</option>
            </select>
          </div>
        </div>

        <!-- CAMPOS FILTRO PARTE 3 DESK -->
        <div>
          <form action="#" id="filtro_parte3_desk" class="hide-on-med-and-down">
            <p>
              <label>
                <input type="checkbox"/>
                <span id="quest_favorito" style="font-size: 100%;">Favoritos</span>
              </label>
            </p>
            <p>
              <label>
                <input type="checkbox"/>
                <span id="my_quest" style="font-size: 100%;">Minhas Questões</span>
              </label>
            </p>
          </form>
        </div>

        <!-- DIV QUESTÕES DOS PROFESSORES DESK -->
        <div id="scroll_desk" class="hide-on-med-and-down">
        <?php
          $u->conectar();
          $results = $q->listAll();
            foreach($results as $row){
              $q->imagem($row['ID_Usuario']);?>
        <!-- IMAGEM USUÁRIO DESK -->
        <div class="responsive-image" id= "foto_prof_desk"><?php $_Imagem=base64_encode( $_SESSION['imagem_usuario'] ); echo "<img height='100%' width='100%' src='data:image/jpeg;base64,$_Imagem'> "; ?></div>

        <!-- QUESTÕES E RESPOSTA DESK -->

        <!-- TRANSIÇÃO: MUDAR A QUESTÃO P/ RESPOSTA DESK -->
            <input type="checkbox" id="switch_desk" />

              <label class="flip-container_desk" for="switch_desk" >
                <div class="flipper_desk">
                  <div class="front_desk">
                    <div id="quest_profs_desk" style="overflow: auto;">
                      <p><?php echo $row['Enunciado']?></p>
                    </div>
                  </div>
                  <div class="back_desk">
                    <div id="quest_profs_desk" style="overflow: auto;">
                      <p><?php echo $q->resposta($row['ID_Questao_']);?></p>
                    </div>
                  </div>
                </div>
              </label>
            <!-- FINAL TRANSIÇÃO: MUDAR A QUESTÃO P/ RESPOSTA DESK -->

          <!-- Modal Trigger engrenagem DESK -->
            <a id="eng" href="#engrenagem-modal_desk" style="width: 37px;" class="waves-effect waves-light modal-trigger hide-on-med-and-down"><img class="responsive-img" id="engrenagem_desk" src ="../images/Engrenagem.png"></a>
            <?php
              if(isset($_SESSION['nome_documento'])){
                ?><button id="btn-teste_desk" style="margin-top: 40px;" class="hide-on-med-and-down waves-effect waves-light btn transparent" type="submit" name="action" onclick="return addUsuarioDesk(<?php echo $row['ID_Questao_']?>, <?php echo $_SESSION['id_documento']?>);"><img id="add_desk" src ="../images/mais.png"></button><?php
              }
              else{
                ?><button id="btn-teste_desk" style="margin-top: 40px;" class="hide-on-med-and-down waves-effect waves-light btn transparent" type="submit" name="action" onclick="alertDocumento()"><img id="add_desk" src ="../images/mais.png"></button><?php
              }
            ?>
            <script>
              function addUsuarioDesk(id, doc) {
                <?php $u->conectar(); ?>
                  $.ajax({
                   method: "GET",
                   url:'../Classes/Insere.php',
                   data: { id: id, doc:doc},
                   complete: function (response) {
                     alert(response.responseText);},
                   error: function () {
                     alert('Erro');}
                   });
              return false;}
            </script>
        <?php } ?>

        <!-- Modal Structure engrenagem DESK -->
        <div id="engrenagem-modal_desk" class="modal hide-on-med-and-down">

          <div class="modal-content">
            <div id="addquest_documento_desk">
              <a><img class= "responsive-img modal-close" id="btn_fechar_modal" src ="../images/fechar.png"></a>
              <button href="#denunciar-modal-desk" id="btn_addquest_desk" style="margin-bottom: 7%;" class="hide-on-med-and-down waves-effect waves-light btn transparent modal-trigger" type="submit" name="action"><img class="responsive-img" id="img_addquest_desk" src ="../images/denunciar.png"><p id="palavra_addquestao_desk">Denunciar</p></button>
              <button href="#favoritar-modal-desk" id="btn_addquest_desk" style="margin-bottom: 7%;" class="hide-on-med-and-down waves-effect waves-light btn transparent modal-trigger" type="submit" name="action"><img class="responsive-img" id="img_addquest_desk" src ="../images/favoritar.png"><p id="palavra_addquestao_desk">Favoritar</p></button>
              <button href="#avaliar-modal-desk" id="btn_addquest_desk" style="margin-bottom: 7%;" class="hide-on-med-and-down waves-effect waves-light btn transparent modal-trigger" type="submit" name="action"><img class="responsive-img" id="img_addquest_desk" src ="../images/avaliar.png"><p id="palavra_addquestao_desk">Avaliar</p></button>
              <button href="#dificuldade-modal-desk" id="btn_addquest_desk" class="hide-on-med-and-down waves-effect waves-light btn transparent modal-trigger" type="submit" name="action"><img class="responsive-img" id="img_addquest_desk" src ="../images/nivel_dificuldade.png"><p id="palavra_addquestao_desk">Dificuldade</p></button>
            </div>
          </div>
        </div>

        <!--MODAL DENUNCIAR DESK-->
        <div id="denunciar-modal-desk" class="modal hide-on-med-and-down">
          <div class="modal-content">
              <a><img class= "responsive-img modal-close" id="btn_fechar_modal_denunciar_desk" src ="../images/fechar.png"></a>
              <h6><img class="responsive-img" id="img_denunciar_desk" src ="../images/denunciar.png"><p>Denúncia</p></h6>

              <div class="input-field col s11 center-align" id="motivo_desk" style= "margin-top: 10%; font-family: 'Muli'; color:black;">
                <select>
                  <option value="" disabled selected>Motivo</option>
                  <option value="1">Erro ortográfico</option>
                  <option value="2">Conteúdo incoerente ou incorreto</option>
                  <option value="3">Conteúdo inapropriado</option>
                  <option value="4">Dificuldade improcedente</option>
                  <option value="5">Plágio</option>
                  <option value="6">Outros</option>
                </select>
              </div>
              <div class="input-field col s11 center-align">
                <textarea placeholder="Comentário" id="descrição_desk" class="materialize-textarea" style="margin-top: 5%;"></textarea>
              </div>
              <div class="col s11 center-align" id="Enviarcel_desk">
                <button href="#erro-modal-desk" class="waves-effect waves-light btn yellow darken-2 hoverable modal-trigger" id="btnEnviar_desk" style="border-radius: 20px 20px; margin-top: 10%; font-family: 'Muli';">Enviar</button>
              </div>
            </div>

              </div>

          </div>
        </div>


        <!--MODAL FAVORITAR DESK-->
        <div id="favoritar-modal-desk" class="modal hide-on-med-and-down">
          <a><img class= "responsive-img modal-close" id="btn_fechar_modal_favoritar_desk" src ="../images/fechar.png"></a>
          <h6><img class="responsive-img align-center" id="img_favoritar_desk" src ="../images/manutencao.png"><p>Funcionalidade em desenvolvimento</p></h6>
        </div>

        <!--MODAL AVALIAR DESK-->
        <div id="avaliar-modal-desk" class="modal hide-on-med-and-down">
            <a><img class= "responsive-img modal-close" id="btn_fechar_modal_avaliar_desk" src ="../images/fechar.png"></a>
          <h6><img class="responsive-img align-center" id="img_avaliar_desk" src ="../images/avaliar.png"><p>Avalie a questão:</p></h6>
          <div id="div_estrela_desk">
            <p>Deseja colocar quantas estrelas para esta questão? <br><br><center>(Insira no <font color="#48bf45">mínimo 1</font> e no <font color="#c71100">máximo 5</font>)</center></p>
            <input id="input_text" type="text" maxlength="1" pattern="([1-5]{1})"/>
          </div>
          <div class="col s11 center-align" id = "Enviardesk">
            <button href="#erro-modal-desk" onclick="Avaliar(0)" class="waves-effect waves-light btn yellow darken-2 hoverable modal-trigger" id="s0" id="btnEnviar_desk" style="border-radius: 20px 20px; margin-top: 10%; font-family: 'Muli';">Enviar</button>
          </div>
        </div>

        <!-- MODAL DIFICULDADE DESK -->
        <div id="dificuldade-modal-desk" class="modal hide-on-med-and-down">
          <a><img class= "responsive-img modal-close" id="btn_fechar_modal_avaliar_desk" src ="../images/fechar.png"></a>
          <h6><img class="responsive-img align-center" id="img_dificuldade_desk" src ="../images/nivel_dificuldade.png"><p>Defina a dificuldade da questão:</p></h6>
          <div id="radio_button_dificil_desk">
            <label>
              <div class="col s1" class= "hide-on-med-and-down">
                <input name="group1" class="with-gap" type="radio"  />
                <span style="color:#77de7c;">Fácil</span>
              </div>
            </label>
            <label>
              <div class="col s2" class= "hide-on-med-and-down">
                <input name="group1" class="with-gap" type="radio"  />
                <span style="color: #FFC300;">Médio</span>
              </div>
            </label>
            <label>
                <div class="col s3" class= "hide-on-med-and-down">
                <input name="group1" class="with-gap" type="radio" />
                <span style="color: #FF5733;">Difícil</span>
              </div>
            </label>
          </div>
          <button id="btn_salvar_dificil_desk" href="#erro-modal-desk" class="hide-on-med-and-down waves-effect waves-light btn modal-trigger" type="submit" name="action">Enviar</button>
        </div>

        <!--MODAL ERRO DESK-->
        <div id="erro-modal-desk" class="modal hide-on-med-and-down">
          <a><img class= "responsive-img modal-close" id="btn_fechar_modal_erro_desk" src ="../images/fechar.png"></a>
          <h6><img class="responsive-img align-center" id="img_erro_desk" src ="../images/manutencao.png"><p>Funcionalidade em desenvolvimento</p></h6>
        </div>
      </div>
         <!-- FINAL ADD_QUESTÕES DESK-->

         <!-- FINAL FORMATAÇÃO COMPUTADOR-->


         <!--FORMATAÇÃO CELULAR-->

         <!-- DOCUMENTO CEL -->
         <div class="documento1" id="documento1">
           <div class="row hide-on-large-only">
             <form class="col s12" method="POST" id="form-documento">
              <div class="row">
                <div class="input-field">
                  <?php
                    if(isset($_SESSION['nome_documento'])){
                      ?> <p id="documento-nome-php"><?php echo $_SESSION['nome_documento'];?><p> <?php
                    }
                    else{
                      ?><input placeholder="Insira o nome do documento" id="nome_documento" style = "text-align: center;" type="text" name="nome_documento" maxlength="25"><?php
                    }
                  ?>
                </div>
              </div>
              <div id="quadrado" style="overflow: auto;" rows="8" cols="80">
                  <div>
                    <p style="margin-left: -3%;"><b>Nome:</b><br></p>
                  </div>
                <div class="row" id="cabecalho1">
                  <div>
                    <p><b>Prontuário:</b></p>
                  </div>
                  <div>
                    <p><b>Turma:</b></p>
                  </div>
                </div>
                <div class="row" id="cabecalho2">
                  <div>
                    <p><b>Professor:</b></p>
                  </div>
                  <div>
                    <p><b>Data:</b></p>
                  </div>
                </div>
                <div class="divider" id="divider1"></div>
                <?php $d->exibirQuestoes();?><br>
              </div>
              <!--<img class= "responsive-img" id = "seta_esquerda" src ="../images/seta_esquerda.png">-->
              <?php
                if(isset($_SESSION['nome_documento'])){
                  ?><a id="btn_salvar" class="hide-on-large-only waves-effect waves-light btn"  href="../Classes/NovoDocumento.php" name="action">Salvar</a><?php
                }
                else{
                  ?><a id="btn_salvar" class="hide-on-large-only waves-effect waves-light btn" type="submit" name="action">Criar</a><?php
                }
              ?>
              <!--<img class= "responsive-img" id = "seta_direita" src ="../images/seta_direita.png">-->
            </form>
            </div>
          </div>
          <!-- FINAL DOCUMENTO CEL -->


          <!-- GABARITO CEL -->
          <div class="gabarito" id="gabarito">
            <div class="row hide-on-large-only">
             <form class="col s12">
               <div class="row">
                 <div class="input-field">
                   <center><h4 id="título_gabarito">Gabarito</h4></center>
                 </div>
               </div>
               <div id="quadrado" style="overflow: auto;" rows="8" cols="80"><br></div>
               <!--<img class= "responsive-img" id = "seta_esquerda2" src ="../images/seta_esquerda.png">-->
               <button id="btn_salvar2" class="hide-on-large-only waves-effect waves-light btn" type="submit" name="action">Salvar</button>
               <!--<img class= "responsive-img" id = "seta_direita2" src ="../images/seta_direita.png">-->
             </form>
            </div>
          </div>
          <!-- FINAL GABARITO CEL-->


          <!-- ADD_QUESTÕES CEL-->
          <div class="add_questoes" id="add_questoes" class="hide-on-large-only">

            <!-- CAMPOS FILTRO PARTE 1 CEL -->
            <div id="filtro_parte1" class="hide-on-large-only">
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

            <!-- CAMPOS FILTRO PARTE 2 CEL -->
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

            <!-- CAMPOS FILTRO PARTE 3 CEL -->
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

            <!-- CAMPOS FILTRO PARTE 4 CEL -->
            <div>
              <form action="#" id="filtro_parte4" class="hide-on-large-only">
                <p>
                  <label>
                    <input type="checkbox"/>
                    <span id="quest_favorito" style="font-size: 100%;">Favoritos</span>
                  </label>
                </p>
                <p>
                  <label>
                    <input type="checkbox"/>
                    <span id="my_quest" style="font-size: 100%;">Minhas Questões</span>
                  </label>
                </p>
              </form>
            </div>

            <!-- TÍTULO ADD_QUESTÕES CEL -->
            <h5 class="hide-on-large-only" id="título_addquest">Adicionar Questões</h5>

            <!-- DIV QUESTÕES DOS PROFESSORES CEL -->
        <div id="scroll" class="hide-on-large-only">
            <?php
            $u->conectar();
            $results = $q->listAll();
             foreach($results as $row){
              $q->imagem($row['ID_Usuario']);?>
              <!-- IMAGEM USUÁRIO CEL -->
              <div class="responsive-image" id= "foto_prof"><?php $_Imagem=base64_encode( $_SESSION['imagem_usuario'] ); echo "<img height='100%' width='100%' src='data:image/jpeg;base64,$_Imagem'> "; ?></div>

                <!-- QUESTÕES E RESPOSTA CEL -->

                <!-- TRANSIÇÃO: MUDAR A QUESTÃO P/ RESPOSTA CEL -->
                <input type="checkbox" id="switch" />

                  <label class="flip-container" for="switch" >
                    <div class="flipper">
                      <div class="front">
                        <div style="overflow: auto;" id="quest_profs">
                          <span><?php echo $row['Enunciado']?></span>
                        </div>
                      </div>
                      <div class="back">
                        <div style="overflow: auto;" id="quest_profs">
                          <span style="text-align: justify;">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                          </span>
                        </div>
                      </div>
                    </div>
                  </label>
                <!-- FINAL TRANSIÇÃO: MUDAR A QUESTÃO P/ RESPOSTA CEL -->

              <!-- Modal Trigger engrenagem CEL -->
                <a href="#engrenagem-modal" style="width: 37px;" class="waves-effect waves-light modal-trigger hide-on-large-only"><img class="responsive-img" id="engrenagem" src ="../images/Engrenagem.png"></a>
                <button id="btn-teste" style="margin-top: 40px; margin-left: -90%;" class="hide-on-large-only waves-effect waves-light btn transparent" type="submit" name="action" onclick="return addUsuario(<?php echo $row['ID_Questao_']?>, <?php echo $_SESSION['id_documento']?>);"><img id="add" src ="../images/mais.png"></button>
                <script>
                  function addUsuario(id, doc) {
                    <?php $u->conectar(); ?>
                      $.ajax({
                       method: "GET",
                       url:'../Classes/Insere.php',
                       data: { id: id, doc:doc},
                       complete: function (response) {
                         alert(response.responseText);},
                       error: function () {
                         alert('Erro');}
                       });
                  return false;}
                </script>
            <?php } ?>

            <!-- Modal Structure engrenagem CEL -->
            <div id="engrenagem-modal" class="modal hide-on-large-only">

              <div class="modal-content">
                <div id="addquest_documento">
                  <a><img class= "responsive-img modal-close" id="btn_fechar_modal" src ="../images/fechar.png"></a>
                  <button href="#denunciar-modal" id="btn_addquest" style="margin-bottom: 7%;" class="hide-on-large-only waves-effect waves-light btn transparent modal-trigger" type="submit" name="action"><img class="responsive-img" id="img_addquest" src ="../images/denunciar.png"><p id="palavra_addquestao">Denunciar</p></button>
                  <button href="#favoritar-modal" id="btn_addquest" style="margin-bottom: 7%;" class="hide-on-large-only waves-effect waves-light btn transparent modal-trigger" type="submit" name="action"><img class="responsive-img" id="img_addquest" src ="../images/favoritar.png"><p id="palavra_addquestao">Favoritar</p></button>
                  <button href="#avaliar-modal" id="btn_addquest" style="margin-bottom: 7%;" class="hide-on-large-only waves-effect waves-light btn transparent modal-trigger" type="submit" name="action"><img class="responsive-img" id="img_addquest" src ="../images/avaliar.png"><p id="palavra_addquestao">Avaliar</p></button>
                  <button href="#dificuldade-modal" id="btn_addquest" class="hide-on-large-only waves-effect waves-light btn transparent modal-trigger" type="submit" name="action"><img class="responsive-img" id="img_addquest" src ="../images/nivel_dificuldade.png"><p id="palavra_addquestao">Dificuldade</p></button>
                </div>
              </div>
            </div>

            <!--MODAL DENUNCIAR-->
            <div id="denunciar-modal" class="modal hide-on-large-only">
              <div class="modal-content">
                  <a><img class= "responsive-img modal-close" id="btn_fechar_modal_denunciar" src ="../images/fechar.png"></a>
                  <h6><img class="responsive-img" id="img_denunciar" src ="../images/denunciar.png"><p>Denúncia</p></h6>

                  <div class="input-field col s11 center-align" id="motivo" style= "margin-top: 10%; font-family: 'Muli'; color:black;">
                    <select>
                      <option value="" disabled selected>Motivo</option>
                      <option value="1">Erro ortográfico</option>
                      <option value="2">Conteúdo incoerente ou incorreto</option>
                      <option value="3">Conteúdo inapropriado</option>
                      <option value="4">Dificuldade improcedente</option>
                      <option value="5">Plágio</option>
                      <option value="6">Outros</option>
                    </select>
                  </div>
                  <div class="input-field col s11 center-align">
                    <textarea placeholder="Comentário" id="descrição" class="materialize-textarea" style="margin-top: 5%;"></textarea>
                  </div>
                  <div class="col s11 center-align" id = "Enviarcel">
                    <button href="#erro-modal" class="waves-effect waves-light btn yellow darken-2 hoverable modal-trigger" id="btnEnviar" style="border-radius: 20px 20px; margin-top: 10%; font-family: 'Muli';">Enviar</button>
                  </div>
              </div>
            </div>

            <!--MODAL FAVORITAR-->
        <div id="favoritar-modal" class="modal hide-on-lrge-only">
          <a><img class= "responsive-img modal-close" id="btn_fechar_modal_favoritar" src ="../images/fechar.png"></a>
          <h6><img class="responsive-img align-center" id="img_favoritar" src ="../images/manutencao.png"><p>Funcionalidade em desenvolvimento</p></h6>
        </div>

            <!--MODAL AVALIAR-->
            <div id="avaliar-modal" class="modal hide-on-large-only">
                <a><img class= "responsive-img modal-close" id="btn_fechar_modal_avaliar" src ="../images/fechar.png"></a>
              <h6><img class="responsive-img align-center" id="img_avaliar" src ="../images/avaliar.png"><p>Avalie a questão:</p></h6>
              <div id="div_estrela">
                <a href="javascript:void(0)" onclick="Avaliar(1)"><img src="../images/avaliar_vazio.png" id="s1"></a>
                <a href="javascript:void(0)" onclick="Avaliar(2)"><img src="../images/avaliar_vazio.png" id="s2"></a>
                <a href="javascript:void(0)" onclick="Avaliar(3)"><img src="../images/avaliar_vazio.png" id="s3"></a>
                <a href="javascript:void(0)" onclick="Avaliar(4)"><img src="../images/avaliar_vazio.png" id="s4"></a>
                <a href="javascript:void(0)" onclick="Avaliar(5)"><img src="../images/avaliar_vazio.png" id="s5"></a>
                <p id="rating">0</p>
              </div>
              <div class="col s11 center-align" id = "Enviarcel">
                <button href="#erro-modal" onclick="Avaliar(0)" class="waves-effect waves-light btn yellow darken-2 hoverable modal-trigger" id="s0" id="btnEnviar" style="border-radius: 20px 20px; margin-top: 10%; font-family: 'Muli';">Enviar</button>
              </div>
            </div>

            <!--MODAL DIFICULDADE-->
            <div id="dificuldade-modal" class="modal hide-on-large-only">
              <a><img class= "responsive-img modal-close" id="btn_fechar_modal_avaliar" src ="../images/fechar.png"></a>
              <h6><img class="responsive-img align-center" id="img_dificuldade" src ="../images/nivel_dificuldade.png"><p>Defina a dificuldade da questão:</p></h6>
              <div id="radio_button_dificil">
                <label>
                  <div class="col s1" class= "hide-on-large-only">
                    <input name="group1" class="with-gap" type="radio"  />
                    <span style="color:#77de7c;">Fácil</span>
                  </div>
                </label>
                <label>
                  <div class="col s2" class= "hide-on-large-only">
                    <input name="group1" class="with-gap" type="radio"  />
                    <span style="color: #FFC300;">Médio</span>
                  </div>
                </label>
                <label>
                    <div class="col s3" class= "hide-on-large-only">
                    <input name="group1" class="with-gap" type="radio" />
                    <span style="color: #FF5733;">Difícil</span>
                  </div>
                </label>
              </div>
              <button href="#erro-modal" id="btn_salvar_dificil" class="hide-on-large-only waves-effect waves-light btn modal-trigger" type="submit" name="action">Salvar</button>
            </div>

            <!--MODAL ERRO CEL-->
            <div id="erro-modal" class="modal hide-on-large-only">
              <a><img class= "responsive-img modal-close" id="btn_fechar_modal_erro" src ="../images/fechar.png"></a>
              <h6><img class="responsive-img align-center" id="img_erro" src ="../images/manutencao.png"><p>Funcionalidade em desenvolvimento</p></h6>
            </div>
          </div>

          <!-- FINAL ADD_QUESTÕES CEL -->

          <!--Código POST Celular documento-->
          <?php
          //verificar se clicou no botão
            if(isset($_POST['nome_documento'])){
              $nome = addslashes($_POST['nome_documento']);

            //verificar se esta preenchido
            if(!empty($nome))
            {
                $u->conectar();
                if($u->msgErro == ""){
                    if($d->cadastrarDocumento($nome, $_SESSION['ID_Usuario']))
                    {
                      echo "";
                    }
                }
                else {
                  echo "Erro: ".$u->msgErro;
                }
            }
            else{
              echo "";
            }
          }
          ?>
          <!-- FINAL código POST Celular documento -->

          <!--Código POST Desktop documento-->
          <?php
          //verificar se clicou no botão
            if(isset($_POST['nome_documento_desk'])){
              $nome = addslashes($_POST['nome_documento_desk']);

            //verificar se esta preenchido
            if(!empty($nome))
            {
                $u->conectar();
                if($u->msgErro == ""){
                    if($d->cadastrarDocumento($nome, $_SESSION['ID_Usuario']))
                    {
                      echo "cadastrou";
                    }
                }
                else {
                  echo "Erro: ".$u->msgErro;
                }
            }
            else{
              echo "";
            }
          }
          ?>
          <!-- FINAL código POST Desktop documento -->


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

   <!-- Alert de aviso ao usuario para criar documento -->
   <script>
    function alertDocumento()
    {
      alert("Crie um documento antes de adicionar questões.");
    }
    </script>


   <!-- CÓDIGO BOTÃO documento/gabarito (desktop - JavaScript) -->
   <script>

       //DOCUMENTO DESK
       var btn1_desk = document.getElementById('btn_documento_desk');
       var gabarito_desk = document.querySelector('.gabarito_desk');

       btn1_desk.addEventListener('click', function() {

       if (documento1_desk.style.display = 'block') {
           gabarito_desk.style.display = 'none';
       }

       else {
         documento1_desk.style.display = 'none';
       }

         });

         //GABARITO DESK
         var btn2_desk = document.getElementById('btn_gabarito_desk');
         var documento1_desk = document.querySelector('.documento1_desk');

         btn2_desk.addEventListener('click', function() {

         if (gabarito_desk.style.display = 'block') {
             documento1_desk.style.display = 'none';
         }

         else {
           gabarito_desk.style.display = 'none';
         }
           });
    </script>

    <!--LER MAIS E LER MENOS-->
  <!--  <script>

    $(document).ready(function() {

        var showChar = 70;
        var ellipsestext = "...";
        var moretext = "Ler Mais";
        var lesstext = "Ler Menos";


        $('.more').each(function() {
            var content = $(this).html();

            if(content.length > showChar) {

                var c = content.substr(0, showChar);
                var h = content.substr(showChar, content.length - showChar);

                var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

                $(this).html(html);
            }

        });

        $(".morelink").click(function(){
            if($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });
    });
  </script>-->

  <!-- AVALIAR MODAL - brilha brilha estrelinha -->
  <script>
    function Avaliar(estrela) {
     var url = window.location;
     url = url.toString()
     url = url.split("index.html");
     url = url[0];

     var s0 = document.getElementById("s0").src;
     var s1 = document.getElementById("s1").src;
     var s2 = document.getElementById("s2").src;
     var s3 = document.getElementById("s3").src;
     var s4 = document.getElementById("s4").src;
     var s5 = document.getElementById("s5").src;
     var avaliacao = 0;

    //ESTRELA 5
    if (estrela == 5) {
     if (s5 == url + "../images/avaliar_vazio.png") {
       document.getElementById("s1").src = "../images/avaliar.png";
       document.getElementById("s2").src = "../images/avaliar.png";
       document.getElementById("s3").src = "../images/avaliar.png";
       document.getElementById("s4").src = "../images/avaliar.png";
       document.getElementById("s5").src = "../images/avaliar.png";
       avaliacao = 5;
     }

     else {
       document.getElementById("s1").src = "../images/avaliar.png";
       document.getElementById("s2").src = "../images/avaliar.png";
       document.getElementById("s3").src = "../images/avaliar.png";
       document.getElementById("s4").src = "../images/avaliar.png";
       document.getElementById("s5").src = "../images/avaliar.png";
       avaliacao = 5;
    }}

     //ESTRELA 4
    if (estrela == 4) {
     if (s4 == url + "../images/avaliar_vazio.png") {
       document.getElementById("s1").src = "../images/avaliar.png";
       document.getElementById("s2").src = "../images/avaliar.png";
       document.getElementById("s3").src = "../images/avaliar.png";
       document.getElementById("s4").src = "../images/avaliar.png";
       document.getElementById("s5").src = "../images/avaliar.png";
       avaliacao = 4;
     }

     else {
       document.getElementById("s1").src = "../images/avaliar.png";
       document.getElementById("s2").src = "../images/avaliar.png";
       document.getElementById("s3").src = "../images/avaliar.png";
       document.getElementById("s4").src = "../images/avaliar.png";
       document.getElementById("s5").src = "../images/avaliar_vazio.png";
       avaliacao = 4;
    }}

    //ESTRELA 3
    if (estrela == 3) {
     if (s3 == url + "../images/avaliar_vazio.png") {
       document.getElementById("s1").src = "../images/avaliar.png";
       document.getElementById("s2").src = "../images/avaliar.png";
       document.getElementById("s3").src = "../images/avaliar.png";
       document.getElementById("s4").src = "../images/avaliar.png";
       document.getElementById("s5").src = "../images/avaliar_vazio.png";
       avaliacao = 3;
     }

     else {
       document.getElementById("s1").src = "../images/avaliar.png";
       document.getElementById("s2").src = "../images/avaliar.png";
       document.getElementById("s3").src = "../images/avaliar.png";
       document.getElementById("s4").src = "../images/avaliar_vazio.png";
       document.getElementById("s5").src = "../images/avaliar_vazio.png";
       avaliacao = 3;
    }}

    //ESTRELA 2
    if (estrela == 2) {
     if (s2 == url + "../images/avaliar_vazio.png") {
       document.getElementById("s1").src = "../images/avaliar.png";
       document.getElementById("s2").src = "../images/avaliar.png";
       document.getElementById("s3").src = "../images/avaliar.png";
       document.getElementById("s4").src = "../images/avaliar_vazio.png";
       document.getElementById("s5").src = "../images/avaliar_vazio.png";
       avaliacao = 2;
     }

     else {
       document.getElementById("s1").src = "../images/avaliar.png";
       document.getElementById("s2").src = "../images/avaliar.png";
       document.getElementById("s3").src = "../images/avaliar_vazio.png";
       document.getElementById("s4").src = "../images/avaliar_vazio.png";
       document.getElementById("s5").src = "../images/avaliar_vazio.png";
       avaliacao = 2;
    }}

     //ESTRELA 1
    if (estrela == 1) {
     if (s1 == url + "../images/avaliar_vazio.png") {
       document.getElementById("s1").src = "../images/avaliar.png";
       document.getElementById("s2").src = "../images/avaliar.png";
       document.getElementById("s3").src = "../images/avaliar_vazio.png";
       document.getElementById("s4").src = "../images/avaliar_vazio.png";
       document.getElementById("s5").src = "../images/avaliar_vazio.png";
       avaliacao = 1;
     }

     else {
       document.getElementById("s1").src = "../images/avaliar.png";
       document.getElementById("s2").src = "../images/avaliar_vazio.png";
       document.getElementById("s3").src = "../images/avaliar_vazio.png";
       document.getElementById("s4").src = "../images/avaliar_vazio.png";
       document.getElementById("s5").src = "../images/avaliar_vazio.png";
       avaliacao = 1;
    }}

    //BTN SALVAR
    if (estrela == 0) {
     if (s0 == url + "../images/avaliar_vazio.png") {
       document.getElementById("s1").src = "../images/avaliar_vazio.png";
       document.getElementById("s2").src = "../images/avaliar_vazio.png";
       document.getElementById("s3").src = "../images/avaliar_vazio.png";
       document.getElementById("s4").src = "../images/avaliar_vazio.png";
       document.getElementById("s5").src = "../images/avaliar_vazio.png";
       avaliacao = 0;
     }

     else {
       document.getElementById("s1").src = "../images/avaliar_vazio.png";
       document.getElementById("s2").src = "../images/avaliar_vazio.png";
       document.getElementById("s3").src = "../images/avaliar_vazio.png";
       document.getElementById("s4").src = "../images/avaliar_vazio.png";
       document.getElementById("s5").src = "../images/avaliar_vazio.png";
       avaliacao = 0;
    }}

     document.getElementById('rating').innerHTML = avaliacao;
    }
  </script>

  <!-- FINAL AVALIAR MODAL -->

  <!-- LIMITAR QUANTAS ESTRELAS COLOCAR DESK -->
<script>
$(document).ready(function() {
  $("#input_text").keyup(function() {
      $("#input_text").val(this.value.match(/[1-5]*/));
    });
  });
</script>

<!--TRANSIÇÃO COR BOTÃO DOCUMENTO E GARABITO-->
<script>
let myButton = document.querySelectorAll('.button-group > button');

myButton.forEach(function(key){
    key.addEventListener('click', function(){
        removeStyles();
        this.setAttribute('class', 'buttonClicked');
    });
})

function removeStyles(){
    for(let i = 0; i < myButton.length; i++){
        document.querySelectorAll('.button-group > button') [i].removeAttribute('class');
    }
}
</script>
<!--FINAL TRANSIÇÃO COR BOTÃO DOCUMENTO E GARABITO-->

    </body>

</html>
