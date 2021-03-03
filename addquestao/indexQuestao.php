<?php
  session_start();
    if(!isset($_SESSION['ID_Usuario']))
    {
      header("location: ../login/indexLogin.php");
      exit;
    }

header('Content-Type: text/html; charset=UTF-8');
  require_once'../Classes/DataBase.php';
  $u = new DataBase;
  require_once'../Classes/Materia.php';
  $m = new Materia;
  require_once'../Classes/Questao.php';
  $q = new Questao;
  require_once'../Classes/Tema.php';
  $t = new Tema;
  require_once'../Classes/Subtema.php';
  $s = new Subtema;
?>

  <!DOCTYPE html>
  <html>

      <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Testando</title>
        <link rel="stylesheet" href="./css-addquestao/addquestao.css">
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
                      <li><a id="question" class=" waves-effect center-align" href="../addquestao/indexQuestao.php">Adicionar Questão</a></li>
                      <li><div id="divider" class="divider"></div></li>
                      <li><a id="document" class="waves-effect center-align" href="../documento/indexDocumento.php">Adicionar Documento</a></li>
                      <li><div id="divider" class="divider"></div></li>
                      <li><a id="saves" class="waves-effect center-align" href="../salvos/indexSalvos.php">Salvos</a></li>
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
            <!-- Dashboard CELULAR FINAL -->


            <!-- Dashboard COMPUTADOR -->
            <nav class="hide-on-med-and-down navbar-fixed" id="retanguloroxo">
              <div class="nav-wrapper hide-on-med-and-down" id="dashboardpc">

                 <img class= "responsive-img" id = "logopc" src ="../images/logo.png"> <img class= "responsive-img" id = "nomelogopc" src ="../images/TestandoNome.png"> </a>
                <ul id="nav-pc" class=" right">
                  <li><a  id= "questao" href="../addquestao/indexQuestao.php">Adicionar <br> questão</a></li>
                  <li><a  id= "documento" href="../documento/indexDocumento.php">Adicionar <br> documento</a>
                    <img class= "responsive-img" id = "linha1" src ="../images/linha.png"></li>
                  <li><a id= "salvos" href="../salvos/indexSalvos.php">Salvos</a>
                     <img class= "responsive-img" id = "linha2" src ="../images/linha.png"></li>
                </ul>
              </div>

              <!-- foto/nome perfil -->
              <a href="../perfil/indexPerfil.php" >
                <div class="hide-on-med-and-down" id="perfil_pequeno">
                <div class="responsive-image" id= "foto_perfil_pequeno"><?php $_Imagem=base64_encode( $_SESSION['imagem'] ); echo "<img height='100%' width='100%' src='data:image/jpeg;base64,$_Imagem'> "; ?></div>
                  <p id="nome-dashboard"><?php echo $_SESSION['NickName']; ?></p></a>
                </div>
                </div>
              </nav>
            <!-- Dashboard COMPUTADOR FINAL-->

            <!-- LINHA LATERAL DEGRADE MOBILE-->
            <div class="degrade"></div>  <!-- versão 1 - padrão -->
            <div class="degrade2"></div> <!-- versão 2 - dissertativa -->
            <div class="degrade3"></div> <!-- versão 3 - alternativa -->
            <!-- LINHA LATERAL DEGRADE DESKTOP-->
            <div class="degrade4"></div> <!-- versão 4 - padrão -->
            <div class="degrade5"></div> <!-- versão 5 - dissertativa -->
            <div class="degrade6"></div> <!-- versão 6 - alternativa -->



        <!-- Formulário CELULAR-->
        <div class="row hide-on-large-only" id= "grid">

          <h2>Adicionar Questão</h2>

          <p class="button-group">
            <button href="#alternativa" id="btn-alternativa" value="ok" target="_self" class="waves-effect waves-light transparent">Alternativa</button>
            <button href="#dissertativa" id="btn-dissertativa" value="ok" target="_self" class="waves-effect waves-light transparent">Dissertativa</button>
          </p>

          <form method="POST">
          <div class="items">

          <!--<div required id="campo1" class="input-field col s9 center-align hide-on-large-only">-->
          <div required id="campo1" class="input-field col s9 center-align hide-on-large-only">
            <select name="materia-cel">
              <option value="" selected disabled>Selecione sua matéria </option>
              <?php
                $u->conectar();
                $results = $m->listAll();
                foreach($results as $row){ ?>
                  <option value="<?php echo $row['ID_Materia'] ?>"><?php echo $row['Nome'] ?></option>
              <?php } ?>
            </select>
            <label>Matéria <span style="color: red;">*</span></label>
          </div>

        <!--<div required id="campo2" class="input-field col s9 center-align hide-on-large-only">-->
          <div required id="campo2" class="input-field col s9 center-align hide-on-large-only">
            <select name="tema-cel">
              <option value="" selected disabled>Selecione seu tema </option>
              <?php
                $u->conectar();
                $results = $t->listAll();
                foreach($results as $row){ ?>
                  <option value="<?php echo $row['ID_Tema'] ?>"><?php echo $row['Nome'] ?></option>
                <?php } ?>
            </select>
            <label>Tema <span style="color: red;">*</span></label>
          </div>

          <!--<div required id="campo3" class="input-field col s9 center-align hide-on-large-only">-->
          <div required id="campo3" class="input-field col s9 center-align hide-on-large-only">
            <select name="subtema-pc">
              <option value="" selected disabled> Selecione seu subtema </option>
              <?php
                $u->conectar();
                $results = $s->listAll();
               foreach($results as $row){ ?>
                  <option value="<?php echo $row['ID_subtema'] ?>"><?php echo $row['Nome'] ?></option>
              <?php } ?>
            </select>
            <label>Subtema <span style="color: red;">*</span></label>
          </div>

          <div required id="campo4" class="col s9 center-align hide-on-large-only">
            <label for="textarea1" style= "font-family: 'Muli'; font-size: 11px; float: left;">Enunciado <span style="color: red;">*</span></label>
            <input placeholder="Escreva seu enunciado" id="textarea1" class="materialize-textarea" name="enunciado-pc">
          </div>

            <div id="simbolodiv">
              <!-- Modal Trigger -->
              <a href="#erro-modal" style="width: 52px;" class="waves-effect waves-light modal-trigger"><img class= "responsive-img" id = "simbolo" src ="../images/omega2.png"></a>
              <p href="#simbolo1" style="color: black;">&nbsp;Inserir <br> Símbolo</p>
            </div>

            <!--IMAGEM-->

              <div href="#erro-modal" class="modal-trigger waves-effect waves-light" id="divimagem">
                <div class="btn" style= "font-family: 'Muli'; color:white; background-color:#FFBC2B;">
                  <span id="spanimagem" style= "font-family: 'Muli'; color:white; background-color:#FFBC2B;">Imagem </span>
                <!-- <input type="file" multiple> -->
                </div>
                <div class="file-path-wrapper" >
                  <input class="file-path validate" type="text">
                </div>
              </div>

              <div id="erro-modal" class="modal hide-on-large-only">
                <a><img class= "responsive-img modal-close" id="btn_fechar_modal_erro" src ="../images/fechar.png"></a>
                <h6><img class="responsive-img align-center" id="img_erro" src ="../images/manutencao.png"><p>Funcionalidade em desenvolvimento</p></h6>
              </div>


            <!-- Alternativa/Dissertativa -->

        <!-- COMEÇO alternativa -->

        <div id="alternativa" class="alternativa" style="margin-top: -5%;">

          <div class="row center-align hide-on-large-only">
          </div>


          <!--CAMPOS ALTERNATIVA: ADD E RETIRAR-->


            <div id="formulario" class= "hide-on-large-only" >
              <input id="alternativa_campo" type="text" placeholder="Alternativa" name="alternativa1"/>
            </div>

          <a href="#" data-id="1" id="adicionarCampo" class="hide-on-large-only">+ Adicionar Campos</a>


              <label id="label_resposta2" for="textarea1" class= "hide-on-large-only">Resposta alternativa <span style="color: red;">*</span></label>
              <textarea id="respostaalternativa" maxlength="1" placeholder=" Ex: A..." name="correta" style= "font-family: 'Muli'; font-size: 100%;" class="materialize-textarea hide-on-large-only"></textarea>
              <div id="dificuldade2" class="input-field col s10 center-align hide-on-large-only">
              <label id="label_dificuldade2" style="font-size: 85%;">Dificuldade da questão <span style="color: red;">*</span></label>

          <div id="radio_button_dificil">
            <label>
              <div class="col s1" class= "hide-on-large-only">
                <input name="dificuldade-pc" class="with-gap" type="radio" value="FACIL"/>
                <span style="color:#77de7c;">Fácil</span>
              </div>
            </label>

            <label>
              <div class="col s2" class= "hide-on-large-only">
                <input name="dificuldade-pc" class="with-gap" type="radio" value="MEDIO"/>
                <span style="color: #FFC300;">Médio</span>
              </div>
            </label>

            <label>
                <div class="col s3" class= "hide-on-large-only">
                <input name="dificuldade-pc" class="with-gap" type="radio" value="DIFICIL"/>
                <span style="color: #FF5733;">Difícil</span>
              </div>
            </label>
          </div>
        </div>


          <div id="priv_public2" class= "hide-on-large-only">

              <label id="label_privacidade2" style="font-size: 87%;">Privacidade da questão <span style="color: red;">*</span></label>
            <div id="radio_button_priv">
             <label>
               <div class="col s1" class= "hide-on-large-only">
               <input name="privacidade-pc" class="with-gap" type="radio" value="0"/>
               <span>Público</span>
             </div>
             </label>

             <label>
               <div class="col s2" class= "hide-on-large-only">
               <input name="privacidade-pc" class="with-gap" type="radio" value="1"/>
               <span>Privado</span>
             </div>
             </label>
            </div>

         </div>
         <button id="btn_salvar" class="hide-on-large-only waves-effect waves-light btn" type="submit" name="action">Salvar</button>

           </div>

        <!-- FIM - alternativa-->

        <div id="dissertativa" class="dissertativa">
          <!-- COMEÇO - dissertativa -->

          <div class="row center-align hide-on-large-only">


                <div class="row">
                  <label for="textarea1" id="label_resposta" style= "font-family: 'Muli'; font-size: 11px; float: left;">Resposta <span style="color: red;">*</span></label>
                  <textarea id="respostadissertativa" placeholder="Escreva sua resposta" class="materialize-textarea"></textarea>
                  </div>
                </div>



              <div id="dificuldade" class="input-field col s10 center-align hide-on-large-only">
              <label id="label_dificuldade" style="font-size: 85%;">Dificuldade da questão <span style="color: red;">*</span></label>

              <div id="radio_button_dificil2">

              <label>
                <div class="col s1  hide-on-large-only">
                  <input name="dificuldade-cel" class="with-gap" type="radio"/>
                  <span style="color: #4DC535">Fácil</span>
                </div>
              </label>

              <label>
                <div  class="col s2  hide-on-large-only">
                  <input name="dificuldade-cel" class="with-gap" type="radio"/>
                  <span style="color: #FFC300;">Médio</span>
                </div>
              </label>

              <label>
                <div  class="col s3  hide-on-large-only">
                  <input name="dificuldade-cel" class="with-gap" type="radio"/>
                  <span style="color:#FF5733">Difícil</span>
                </div>
              </label>
            </div>
          </div>


          <div id="priv_public" class=" hide-on-large-only">
            <label id="label_privacidade" style="font-size: 87%;">Privacidade da questão <span style="color: red;">*</span></label>

            <div id="radio_button_priv2">
             <label>
               <div class="col s1  hide-on-large-only">
               <input name="privacidade-cel" class="with-gap" type="radio"/>
               <span>Público</span>
             </div>
             </label>

             <label>
               <div class="col s2  hide-on-large-only">
               <input name="privacidade-cel" class="with-gap" type="radio"/>
               <span>Privado</span>
             </div>

             </label>
           </div>

           <button id="btn_salvar" class=" hide-on-large-only waves-effect waves-light btn" type="submit" name="action">Salvar</button>
         </div>

        </div>
      </div>
      </form>

    </div>
      <!-- FIM - dissertativa -->

        <!--Final do formulário de CELULAR-->


        <!-- Formulário COMPUTADOR-->
        <div class="row hide-on-med-and-down">

          <h2>Adicionar Questão</h2>

          <p class="button-group">
            <button href="#alternativa" id="btn-alterna-desk" value="ok" target="_self" class="waves-effect waves-light btn transparent">Questão alternativa</button>
            <button href="#dissertativa" id="btn-dissert-desk" value="ok" target="_self" class="waves-effect waves-light btn transparent">Questão dissertativa</button>
          </p>

          <<form method="POST"> <!--fecha no ultimo form antes do JavaScript-->
          <div class="items">

          <div required id="campo1" class="input-field col s9 center-align hide-on-med-and-down">
            <select name="materia-pc">
              <option value="" disabled selected>Selecione a matéria</option>
              <?php
                $u->conectar();
                $results = $m->listAll();
               foreach($results as $row){ ?>
                  <option value="<?php echo $row['ID_Materia'] ?>"><?php echo $row['Nome'] ?></option>
              <?php } ?>
            </select>
            <label>Matéria <span style="color: red;">*</span></label>
          </div>

          <div required id="campo2" class="input-field col s9 center-align hide-on-med-and-down">
            <select name="tema-pc">
                <option value="" disabled selected>Selecione o tema</option>
                <?php
                  $u->conectar();
                  $results = $t->listAll();
                 foreach($results as $row){ ?>
                    <option value="<?php echo $row['ID_Tema'] ?>"><?php echo $row['Nome'] ?></option>
                <?php } ?>
            </select>
            <label>Tema <span style="color: red;">*</span></label>
          </div>

          <div required id="campo3" class="input-field col s9 center-align hide-on-med-and-down">
            <select name="subtema-pc">
              <option value="" selected disabled> Selecione seu subtema </option>
              <?php
                $u->conectar();
                $results = $s->listAll();
               foreach($results as $row){ ?>
                  <option value="<?php echo $row['ID_subtema'] ?>"><?php echo $row['Nome'] ?></option>
              <?php } ?>
            </select>
            <label>Subtema <span style="color: red;">*</span></label>
          </div>

          <div required id="campo4"  class="col s9 center-align hide-on-med-and-down">
            <label for="textarea1" style= "font-family: 'Muli'; font-size: 11px; float: left;">Enunciado <span style="color: red;">*</span></label>
            <input placeholder="Escreva seu enunciado" id="textarea1" class="materialize-textarea" name="enunciado-pc">
          </div>

          <!-- IMAGEM -->
            <!--Está faltando duas classes nessa div-->
            <div href="#erro-modal-desk" class="modal-trigger waves-effect waves-light" id="divimagem">
              <div class="btn" style= "font-family: 'Muli'; color:white; background-color:#FFBC2B;">
                <span id="spanimagem" style= "font-family: 'Muli'; color:white; background-color:#FFBC2B;">Imagem </span>
            <!--     <input type="textfile" multiple> -->
              </div>
                <div class="file-path-wrapper" >
                <input class="file-path validate" type="text">
              </div>
            </div>

            <div id="erro-modal-desk" class="modal hide-on-med-and-down">
              <a><img class= "responsive-img modal-close" id="btn_fechar_modal_erro_desk" src ="../images/fechar.png"></a>
              <h6><img class="responsive-img align-center" id="img_erro_desk" src ="../images/manutencao.png"><p>Funcionalidade em desenvolvimento</p></h6>
            </div>

          <!-- Modal Trigger -->

          <div id="simbolodiv-desk">
            <a href="#erro-modal-desk" class="waves-effect waves-light modal-trigger">
              <img style="width: 35px;" class="responsive-img" id="simbolo" src="../images/omega2.png">
            </a>

            <p href="#erro-modal-desk">Inserir símbolo</p>
          </div>

          <!-- Modal Structure SÍMBOLOS -->
          <div class="modal-content">
            <div id="erro-modal-desk" class="modal hide-on-med-and-down">
              <a><img class= "responsive-img modal-close" id="btn_fechar_modal_erro_desk" src ="../images/fechar.png"></a>
              <h6><img class="responsive-img align-center" id="img_erro_desk" src ="../images/manutencao.png"><p>Funcionalidade em desenvolvimento</p></h6>
            </div>
          </div>

            <!-- Alternativa/Dissertativa COMPUTADOR -->

        <!-- COMEÇO ALTERNATIVA -->
        <div id="alternativa" class="alternativa-desk">

          <!--CAMPOS ALTERNATIVA: ADD E RETIRAR-->


          <div id="formulario_desk" class= "hide-on-med-and-down" >
            <input id="alternativa_campo_desk" type="text" placeholder="Alternativa A" name="alternativa1"/>
          </div>

          <a href="#" data-id="1" id="adicionarCampo_desk" class="hide-on-med-and-down">+ Adicionar Campos</a>


          <label id="label_resposta2_desk" for="textarea1" class= "hide-on-med-and-down">Resposta alternativa <span style="color: red;">*</span></label>
          <textarea id="respostaalternativa_desk" maxlength="1" placeholder=" Ex: A..." name="correta" style= "font-family: 'Muli'; font-size: 100%;" class="materialize-textarea hide-on-med-and-down"></textarea>

              <!--CAMPOS DIFICULDADE ALTERNATIVA-->
              <div id="dificuldade-desk2" class="input-field col s10 center-align hide-on-med-and-down">

                  <label id="label_dificuldade-desk2" style="font-size: 80%;">Dificuldade da questão <span style="color: red;">*</span></label>
            <div id="radio_button_dificil_desk">
              <label>
                <div class="col s1" class= "hide-on-med-and-down">
                  <input name="dificuldade-pc" class="with-gap" type="radio" value="FACIL"/>
                  <span style="color:#77de7c;">Fácil</span>
                </div>
              </label>

              <label>
                <div class="col s2" class= "hide-on-med-and-down">
                  <input name="dificuldade-pc" class="with-gap" type="radio" value="MEDIO"/>
                  <span style="color: #FFC300;">Médio</span>
                </div>
              </label>

              <label>
                <div class="col s3" class= "hide-on-med-and-down">
                  <input name="dificuldade-pc" class="with-gap" type="radio" value="DIFICIL"/>
                  <span style="color:#FF5733">Difícil</span>
                </div>
            </label>
          </div>
        </div>

          <div id="priv_public-desk2" class="hide-on-med-and-down">

          <div id="radio_button_priv_desk">
            <label id="label_privacidade-desk2" style="font-size: 80%; margin-left: 5%; margin-bottom: -5%;">Privacidade da questão <span style="color: red;">*</span></label>
             <label>
               <div class="col s1 hide-on-med-and-down">
                 <input name="privacidade-pc" class="with-gap" type="radio" value="0"/>
                 <span>Público</span>
               </div>
             </label>

             <label>
               <div class="col s2 hide-on-med-and-down">
                 <input name="privacidade-pc" class="with-gap" type="radio" value="1"/>
                 <span>Privado</span>
               </div>
             </label>
           </div>
         </div>
         <div>
            <button id="btn_salvar-desk2" class="cadastro flow-text btn waves-effect yellow darken-2 waves-light hoverable" type="submit">Salvar</button>
         </div>
<!-- FIM ALTERNATIVA -->
        </div>

        <!-- COMEÇO DISSERTATIVA -->
        <div id="dissertativa" class="dissertativa-desk">

          <div class="row center-align hide-on-med-and-down">
                  <div class="input-field col s9" id="respostadissert-desk">
                    <input placeholder=Resposta id="textarea1" type="text" class="materialize-textarea" name="resposta-pc">
                  </div>

              <div id="dificuldade-desk" class="input-field col s10 center-align hide-on-med-and-down">
            <div>
              <label id="label_dificuldade-desk" style="font-size: 85%;">Dificuldade da questão <span style="color: red;">*</span></label>
              <label>
                <div class="col s1" class= "hide-on-med-and-down">
                  <input name="dificuldade-pc" class="with-gap" type="radio" value="FACIL"/>
                  <span style="color: #4DC535">Fácil</span>
                </div>
              </label>

              <label>
                <div class="col s2" class= "hide-on-med-and-down">
                  <input name="dificuldade-pc" class="with-gap" type="radio" value="MEDIO"/>
                  <span style="color: #FFC300;">Médio</span>
                </div>
              </label>

              <label>
                <div class="col s3" class= "hide-on-med-and-down">
                  <input name="dificuldade-pc" class="with-gap" type="radio" value="DIFICIL"/>
                  <span style="color:#FF5733">Difícil</span>
                </div>
            </label>
          </div>
          </div>
          </div>

        <div id="priv_public-desk" class="hide-on-med-and-down">
          <div>
           <label id="label_privacidade-desk" style="font-size: 87%;">Privacidade da questão <span style="color: red;">*</span></label>

           <label>
             <div class="col s1 hide-on-med-and-down">
               <input name="privacidade-pc" class="with-gap" type="radio" value="0"/>
               <span>Público</span>
             </div>
           </label>

           <label id="privado_desk">
             <div class="col s1 hide-on-med-and-down">
               <input name="privacidade-pc" class="with-gap" type="radio" value="1"/>
               <span>Privado</span>
             </div>
           </label>
         </div>
       </div>

       <div>
          <button id="btn_salvar-desk2" class="cadastro flow-text btn waves-effect yellow darken-2 waves-light hoverable" type="submit">Salvar</button>
       </div>
     </div>
    </div>
  </form>

  <?php
  //verificar se clicou no botão
    if(isset($_POST['enunciado-pc'])){

      $materia = addslashes($_POST['materia-pc']);
      $tema = addslashes($_POST['tema-pc']);
      $subtema = addslashes($_POST['subtema-pc']);
      $enunciado = addslashes($_POST['enunciado-pc']);
      $resposta = addslashes($_POST['resposta-pc']);
      $dificuldade = addslashes($_POST['dificuldade-pc']);
      $privacidade = addslashes($_POST['privacidade-pc']);

      $alt1 = addslashes($_POST['alternativa1']);
      $alt2 = addslashes($_POST['alternativa2']);
      $alt3 = addslashes($_POST['alternativa3']);
      $alt4 = addslashes($_POST['alternativa4']);
      $alt5 = addslashes($_POST['alternativa5']);
      $correta = addslashes($_POST['correta']);

    //verificar se esta preenchido
    if(!empty($materia) && !empty($tema) && !empty($enunciado) && !empty($dificuldade))
    {
        $u->conectar();
        if($u->msgErro == ""){
          if($resposta == ""){
              if($alt1!=""){
                if($q->cadastrarQuestaoAlternativa($materia, $tema, $enunciado, 0, $alt1, $alt2, $alt3, $alt4, $alt5, $correta, $dificuldade, $privacidade, $_SESSION['ID_Usuario']))
                {
                  echo "Cadastrado com sucesso!";
                }
              }
              else{
                echo "Preencha as alternativas";
              }
            }
          else {
            if($q->cadastrarQuestaoDissertativa($materia, $tema, $enunciado, 1, $resposta, 1, $dificuldade, $privacidade, $_SESSION['ID_Usuario']))
            {
              echo "Cadastrado com sucesso!";
            }
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

      <!--INICIALIZAÇÃO MENU (sanduiche) CELULAR (JQuery)-->
      <script>
        $(document).ready(function(){
          $('.sidenav').sidenav();});
      </script>

        <!--INICIALIZAÇÃO CAMPO LISTA MATÉRIA (JQuery)-->
      <script>
        $(document).ready(function(){
          $('select').formSelect();
            });
        </script>
      </body>

      <!-- MODAL DOS SÍMBOLOS (JQuery) -->
      <script>
      $(document).ready(function(){
      $('.modal').modal();
      });
      </script>

      <!--CÓDIGO BOTÃO ALTERNATIVA/DISSERTATIVA (mobile - JavaScript)-->
      <script>
          var btn1 = document.getElementById('btn-dissertativa');
          var alternativa = document.querySelector('.alternativa');
          var degrade = document.querySelector('.degrade');
          var degrade2 = document.querySelector('.degrade2');
          var degrade3 = document.querySelector('.degrade3');
          btn1.addEventListener('click', function() {

          if (dissertativa.style.display = 'block') {
              alternativa.style.display = 'none';
              degrade2.style.display = 'block';
              degrade3.style.display = 'none';
              degrade.style.display = 'none';
          }
          else {
              alternativa.style.display = 'block';
              degrade3.style.display = 'block';
              degrade.style.display = 'none';
              }
            });

         var btn2 = document.getElementById('btn-alternativa');
         var dissertativa = document.querySelector('.dissertativa');
         var divdegrade = document.querySelector('.degrade');
         var divdegrade2 = document.querySelector('.degrade2');
         var divdegrade3 = document.querySelector('.degrade3');
         btn2.addEventListener('click', function() {

         if (alternativa.style.display = 'block') {
             dissertativa.style.display = 'none';
             divdegrade2.style.display = 'none';
             divdegrade3.style.display = 'block';
             divdegrade.style.display = 'none';
         }
         else {
             dissertativa.style.display = 'block';
             divdegrade2.style.display = 'block';
             divdegrade.style.display = 'none';
         }
       });
      </script>
      <!--FINAL CÓDIGO BOTÃO ALTERNATIVA/DISSERTATIVA (mobile - JavaScript)-->

      <!--CÓDIGO BOTÃO ALTERNATIVA/DISSERTATIVA (desktop - JavaScript)-->
      <script>
          var btn3 = document.getElementById('btn-dissert-desk');
          var alternativa2 = document.querySelector('.alternativa-desk');
          var degrade4 = document.querySelector('.degrade4');
          var degrade5 = document.querySelector('.degrade5');
          var degrade6 = document.querySelector('.degrade6');
          btn3.addEventListener('click', function() {

          if (dissertativa2.style.display = 'block') {
              alternativa2.style.display = 'none';
              degrade5.style.display = 'block';
              degrade6.style.display = 'none';
              degrade4.style.display = 'none';
          }
          else {
              alternativa2.style.display = 'block';
              degrade6.style.display = 'block';
              degrade4.style.display = 'none';
              }
            });

         var btn4 = document.getElementById('btn-alterna-desk');
         var dissertativa2 = document.querySelector('.dissertativa-desk');
         var divdegrade4 = document.querySelector('.degrade4');
         var divdegrade5 = document.querySelector('.degrade5');
         var divdegrade6 = document.querySelector('.degrade6');
         btn4.addEventListener('click', function() {

         if (alternativa2.style.display = 'block') {
             dissertativa2.style.display = 'none';
             divdegrade5.style.display = 'none';
             divdegrade6.style.display = 'block';
             divdegrade4.style.display = 'none';
         }
         else {
             dissertativa2.style.display = 'block';
             divdegrade5.style.display = 'block';
             divdegrade4.style.display = 'none';
         }
       });
     </script>
     <!--FINAL CÓDIGO BOTÃO ALTERNATIVA/DISSERTATIVA (desktop - JavaScript)-->

      <!--TRANSIÇÃO COR BOTÃO ALTERNATIVA E DISSERTATIVA-->
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
      <!--FINAL TRANSIÇÃO COR BOTÃO ALTERNATIVA E DISSERTATIVA-->


      <!-- CAMPO ALTERNATIVA: ADD E RETIRAR CEL-->
      <script>
      $(function () {
          var divContent = $('#formulario');
          var botaoAdicionar = $('a[data-id="1"]');
          var i = 1;
          //66 - B
          var letra = 66;

          //Ao clicar em adicionar ele cria uma linha com novos campos

            $(botaoAdicionar).click(function () {

                if(i <= 4) {
                    $('<div class="conteudoIndividual"><br><input id="alternativa_campo '+ String.fromCharCode(letra) +'" type="text" placeholder="Alternativa ' + String.fromCharCode(letra) +'" name="alternativa' + i + '"   style="width:96%; margin-top: 5%;"/><a href="#" class="linkRemover">X</a></div>').appendTo(divContent);
                    $('#removehidden').remove();
                    letra++;
                    i++;
                    $('<input type="hidden" name="quantidadeCampos" value="' + i + '" id="removehidden">').appendTo(divContent);
                }
            });

          //Cliquando em remover a linha é eliminada

          $('#formulario').on('click', '.linkRemover', function () {
              $(this).parents('.conteudoIndividual').remove();
              letra--;
              i--;

              });
            });
      </script>
      <!-- FINAL CAMPO ALTERNATIVA: ADD E RETIRAR CEL-->

      <!-- CAMPO ALTERNATIVA: ADD E RETIRAR DESK-->
      <script>
      $(function () {
          var divContent_desk = $('#formulario_desk');
          var botaoAdicionar_desk = $('a[data-id="1"]');
          var i = 2;
          //66 - B
          var letra = 66;

          //Ao clicar em adicionar ele cria uma linha com novos campos

            $(botaoAdicionar_desk).click(function () {

                if(i <= 5) {
                    $('<div class="conteudoIndividual_desk"><br><input id="alternativa_campo_desk '+ String.fromCharCode(letra) +'" type="text" placeholder="Alternativa ' + String.fromCharCode(letra) +'" name="alternativa' + i + '"   style="width: 98%; margin-left: 0%; margin-top: 5%;"/><a href="#" class="linkRemover_desk">X</a></div>').appendTo(divContent_desk);
                    $('#removehidden_desk').remove();
                    letra++;
                    i++;
                    $('<input type="hidden" name="quantidadeCampos" value="' + i + '" id="removehidden_desk">').appendTo(divContent_desk);
                }
            });

          //Cliquando em remover a linha é eliminada

          $('#formulario_desk').on('click', '.linkRemover_desk', function () {
              $(this).parents('.conteudoIndividual_desk').remove();
              letra--;
              i--;

              });
            });
      </script>
      <!-- FINAL CAMPO ALTERNATIVA: ADD E RETIRAR DESK-->


  </html>
