<?php
session_start();

// Include da biblioteca TCPFD
require_once('tcpdf.php');
require_once('config/tcpdf_config.php');
require_once'../DataBase.php';
$u = new DataBase;

//Criando um documento PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$sql = $pdo->prepare("SELECT Nome_Documento FROM documento WHERE ID_Documento = :d");
$sql->bindValue(":d", $id);
$sql->execute();
$aux = $sql->fetch();

$_SESSION['nome_documento'] = $aux['Nome_Documento'];

//Colocando informações no documento
$pdf->SetCreator($_SESSION["NickName"]);
$pdf->SetAuthor($_SESSION["NickName"]);
$pdf->SetTitle($_SESSION["nome_documento"]);
$pdf->setPrintHeader(false);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font

$pdf->SetFont('helvetica', '', 14, '', true);

//Adicionando a página de questões do documento
$pdf->AddPage();

//cabeçalho do documento
$pdf->setCellHeightRatio(3);
$html = '
<span style="text-align: justify;"><b>Nome:</b>__________________________________________________________</span>
&nbsp; &nbsp; <span style="text-align: justify;"><b>Prontuário:</b>_____________________<b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Turma:</b>_______________________</span>
<span style="text-align: justify;">&nbsp;<b>Professor:</b>__________________________________ &nbsp; <b>Data:</b>____/____/______</span>
';

//inserindo o cabeçalho no documento
$pdf->writeHTMLCell(0, 0, '', '', $html, 1, 1, 0, true, '', true);


//titulo do documento
$pdf->SetFont('helvetica', '', 18, '', true);
$pdf->setCellHeightRatio(1.1);
$html = "
<br><br>
<h1>".$_SESSION['nome_documento']."</h1>
<br>
";

//inserindo o titulo no documento
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'C', true);
// ---------------------------------------------------------

//questoes do documento
$pdf->setCellHeightRatio(1.5);
$pdf->SetFont('helvetica', '', 16, '', true);

$u->conectar();
global $pdo;
$i = 0;
$letra = 65;

if (isset($_SESSION['documento'])){

  $idDocumento = $_SESSION['documento'];

  //Buscar as questões cadastradas em um documento
  $sql = $pdo->prepare("SELECT * FROM questao as q INNER JOIN questao_documento as qd ON qd.Documento_ID_Documento = :d AND q.ID_Questao_ = qd.Questao_ID_Questao_");
  $sql->bindValue(":d", $idDocumento);
  $sql->execute();
  $results = $sql->fetchAll(\PDO::FETCH_ASSOC);

  foreach($results as $row){

    if($row['Dissertativa']==0){
      $i++;
      $letra = 65;
      $html ='<br><span style="text-align:justify;"><b>' .$i.'.'. '</b> '.$row["Enunciado"].'</br></br></p><br></span>';
      $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

      $sql = $pdo->prepare("SELECT Texto FROM alternativa as alt INNER JOIN questao as q ON alt.Questao_ID_Questao_ = q.ID_Questao_ AND q.ID_Questao_ IN (SELECT Questao_ID_Questao_ FROM questao_documento WHERE Documento_ID_Documento = :d) WHERE Questao_ID_Questao_ = :q");
      $sql->bindValue(":d", $idDocumento);
      $sql->bindValue(":q", $row['ID_Questao_']);
      $sql->execute();
      if($sql->rowCount() > 0){
        while($m = $sql->fetch()){
          $html ="<p style=text-align: justify;><b>". chr($letra).") </b>".$m['Texto']."</p>";
          $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
          $letra++;
        }
      }
    }

    else{
      $i++;
      $html ='<span style="text-align:justify;"><b><br>' .$i.".". "</b> ".$row["Enunciado"]."</br></br></p><br></span>";
      $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
    }


   }
  }

//verificando se o usuário quer gabarito ou não



  //adicionando a página do gabarito
  $pdf->addPage();

  //titulo do gabarito
  $pdf->SetFont('helvetica', '', 18, '', true);
  $pdf->setCellHeightRatio(1.1);
  $html = "
  <h1>Gabarito</h1>
  <br>
  <br>
  ";
  //inserindo o titulo no documento
  $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'C', true);

  global $pdo;
  $i = 0;

  if (isset($_SESSION['documento'])){

    $idDocumento = $_SESSION['documento'];

    $sql = $pdo->prepare("SELECT Texto FROM alternativa as alt INNER JOIN questao as q ON alt.Questao_ID_Questao_ = q.ID_Questao_ AND q.ID_Questao_ IN (SELECT Questao_ID_Questao_ FROM questao_documento WHERE Documento_ID_Documento = :d) WHERE Correta = 1");
    $sql->bindValue(":d", $idDocumento);
    $sql->execute();
    if($sql->rowCount() > 0){
      while($m = $sql->fetch()){
      $i++;
      $html =" <p style=text-align: justify;><b>" .$i.". ". "</b>" .$m['Texto']."</br></br></p>";
      $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
      }
    }
  }


//$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output($_SESSION["nome_documento"].'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>
