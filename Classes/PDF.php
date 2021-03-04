<?php
session_start();
// Include the main TCPDF library (search for installation path).
require_once('TCPDF/tcpdf.php');
require_once('TCPDF/config/tcpdf_config.php');
require_once'../Classes/Documento.php';
$d = new Documento;
require_once'../Classes/DataBase.php';
$u = new DataBase;

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

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
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
$html = <<<EOD
<p>Nome: </p>
<p>Prontuário: Turma:</p>
<p>Professor: $_SESSION[NickName] Data:</p>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------
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

     $html ="<p>".$row['Enunciado']."</p>";
     $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
   }
  }


$html ="<p>".$i."</p>";

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>
