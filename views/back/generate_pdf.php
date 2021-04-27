<?php

include_once("C:/wamp64/www/allfolders/config.php");
include_once('pdf/fpdf.php');
 
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
   // $this->Image('C:/wamp64/www/LSM/front/views/img/logo.png',10,-1,70);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'LISTE DES COMMANDES ',1,0,'C');
    // Line break
    $this->Ln(20);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
 
$dbConnection = mysqli_connect('localhost', 'root', '', 'projet');

$query  = "SELECT * FROM commande";
$result = mysqli_query($dbConnection, $query);
$e=0;
$i=0;
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',7);
if (mysqli_num_rows($result) > 0) {
    $pdf->Cell(30,10,"id",1,0);
    $pdf->Cell(30,10,"nom",1,0);
    $pdf->Cell(30,10,"adresse",1,0);
	$pdf->Cell(30,10,"date",1,0);	
	
     
  
      } 
$pdf->Output();
?>