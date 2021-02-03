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

          <a href="../perfil/indexPerfil.php" >
           <div class="hide-on-med-and-down" id="perfil_pequeno">
              <div class="responsive-image" id= "foto_perfil_pequeno"><?php $_Imagem=base64_encode( $_SESSION['imagem'] ); echo "<img height='100%' width='100%' src='data:image/jpeg;base64,$_Imagem'> "; ?></div>
             <p id="nome-dashboard"><?php echo $_SESSION['NickName']; ?></p></a>
           </div>
           </div>
         </nav>

    </body>
  </html>
