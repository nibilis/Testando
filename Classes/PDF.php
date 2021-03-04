<?php
session_start();

// Include da biblioteca TCPFD
require_once('TCPDF/tcpdf.php');
require_once('TCPDF/config/tcpdf_config.php');
require_once'../Classes/Documento.php';
$d = new Documento;
require_once'../Classes/DataBase.php';
$u = new DataBase;

//Criando um documento PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//Colocando informações no documento
$pdf->SetCreator($_SESSION["NickName"]);
$pdf->SetAuthor($_SESSION["NickName"]);
$pdf->SetTitle($_SESSION["nome_documento"]);
$pdf->setPrintHeader(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

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

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

//cabeçalho do documento
$html = <<<EOD
<p>Nome: </p>
<p>Prontuário: Turma:</p>
<p>Professor: $_SESSION[NickName] Data:</p>
EOD;

//inserindo o cabeçalho no documento
$pdf->writeHTMLCell(0, 0, '', '', $html, 1, 1, 0, true, '', true);

// ---------------------------------------------------------
//inserindo as questões no documento
$u->conectar();
global $pdo;
$i = 0;

if (isset($_SESSION['id_documento'])){

  $idDocumento = $_SESSION['id_documento'];

  //Buscar as questões cadastradas em um documento
  $sql = $pdo->prepare("SELECT Enunciado FROM questao as q INNER JOIN questao_documento as qd ON qd.Documento_ID_Documento = :d AND q.ID_Questao_ = qd.Questao_ID_Questao_");
  $sql->bindValue(":d", $idDocumento);
  $sql->execute();
  $results = $sql->fetchAll(\PDO::FETCH_ASSOC);
  foreach($results as $row){

    $i++;
    $html ="<p style=text-align: justify;><b>" .$i.".". "</b> ".$row['Enunciado']."</br></br></p>";
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

   }
  }

//verificando se o usuário quer gabarito ou não

if ($_SESSION["gabarito"]==1){

  //adicionando a página do gabarito
  $pdf->addPage();

  global $pdo;
  $i = 0;

  if (isset($_SESSION['id_documento'])){

    $idDocumento = $_SESSION['id_documento'];

    $sql = $pdo->prepare("SELECT Texto FROM alternativa as alt INNER JOIN questao as q ON alt.Questao_ID_Questao_ = q.ID_Questao_ AND q.ID_Questao_ IN (SELECT Questao_ID_Questao_ FROM questao_documento WHERE Documento_ID_Documento = :d)");
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
}

//$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output($_SESSION["nome_documento"].'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>
