<?php
require('fpdf/fpdf.php');
date_default_timezone_set('America/El_Salvador');
class PDF extends FPDF
{
// Cabecera de página
//Numeros de paginas
//SetTextColor(255,255,255);es RGB extraer colores con GIMP
//SetFillColor()
//SetDrawColor()
//Line(derecha-izquierda, arriba-abajo,ancho,arriba-abajo)
//Color line setDrawColor(61,174,233)
//GetX() || GetY() posiciones en cm
//Grosor SetLineWidth(1)
// SetFont(tipo{COURIER, HELVETICA,ARIAL,TIMES,SYMBOL, ZAPDINGBATS}, estilo[normal,B,I ,A], tamaño)
// Cell(ancho , alto,texto,borde,salto(0/1),alineacion,rellenar, link)
//AddPage(orientacion[PORTRAIT, LANDSCAPE], tamño[A3.A4.A5.LETTER,LEGAL],rotacion)
//Image(ruta, poscisionx,pocisiony,alto,ancho,tipo,link)
//SetMargins(10,30,20,20) luego de addpage
  
function Header()
{

    $this->Image('img/logo.png',25,10,33);

    $this->SetFont('times', 'B', 13);
    // Movernos a la derecha
    $this->Cell(80);

  $this->SetTextColor(30,30,32);
  $this->Text(75, 15, utf8_decode('FERRETERIA GRANADEÑO'));
  
  $this->Text(77, 21, utf8_decode('6ª av. Jiquilisco,Usulután'));
    $this->Text(88,27, utf8_decode('Tel: 7245 8620'));

    $this->Image('img/logoosis.png',160,5,33);
    $this->SetFont('courier', 'B', 10);
    $this->Text(165,42,date('d/m/Y'));
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic vacio es normal xd
    $this->SetFont('times','',12);

    $this->Cell(0,10, utf8_decode('Derechos Reservados © 2021 - UES FMP'),0,0,'C');
    $this->Cell(0,10,utf8_decode('Página').$this->PageNo(),0,0,'R');

}



}

// Creación del objeto de la clase heredada

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 20);//el 10 es el espacio antes que dara para el espacio jaja osea que entre mas grande mas es lo que el se hace grande
$pdf->SetTopMargin(44);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);

$pdf->SetY(40);
$pdf->SetX(30);
$pdf->SetFont('Arial','B',12);

$pdf->Ln();

/*-------TITULOS Y ENCABEZADOS -----------*/
$pdf->Ln(20);
$pdf->SetFont('', 'B', 12);

$pdf->Text(80, 45,utf8_decode( 'NOMBRE REPORTE'));

$pdf->Ln(-10);
/* ---Titulo de Tabla --- */

$pdf->SetX(30);
$pdf->SetFillColor(93, 155, 155);
$pdf->SetDrawColor(44, 62, 80);

$pdf->Cell(54, 10, 'Tipo', 1, 0, 'C', 1);
$pdf->Cell(20, 10, 'C', 1, 0, 'C', 1);
$pdf->Cell(20, 10, 'T', 1, 0, 'C', 1);
$pdf->Cell(54, 10, utf8_decode('Códigos'), 1, 1, 'C', 1);

/* --- Datos de la tabla --- */
//prueba con 32
for ($i = 0; $i <30 ; $i++) {
if($i%2==0){
//240,240,240
$pdf->SetFillColor(255,255,255);
$pdf->SetDrawColor(0, 0, 0);

}else{
$pdf->SetFillColor(197, 226, 246);
// $pdf->SetDrawColor(44, 62, 80);
$pdf->SetDrawColor(0, 0, 0);
}
    $pdf->SetX(30);

$a=$pdf->Gety();

$pdf->SetFont('Arial','',12);
$pdf->Cell(54, 10, 'Camisa Tactica Azul', 1, 0, 'C', 1);
$pdf->Cell(20, 10, '20', 1, 0, 'C', 1);
$pdf->Cell(20, 10, $a, 1, 0, 'C', 1);
$pdf->Cell(54, 10, utf8_decode('4565645121545'), 1, 1, 'C', 1);

$aqui=$pdf->Gety();
if($aqui>=257){
$pdf->AddPage();
$pdf->SetX(30);
$pdf->SetFillColor(93, 155, 155);
$pdf->SetDrawColor(44, 62, 80);

$pdf->Cell(54, 10, 'Tipo', 1, 0, 'C', 1);
$pdf->Cell(20, 10, 'C', 1, 0, 'C', 1);
$pdf->Cell(20, 10, 'T', 1, 0, 'C', 1);
$pdf->Cell(54, 10, utf8_decode('Códigos'), 1, 1, 'C', 1);
}

}




$pdf->Ln(5);
/* --- GRAFICO --- */



//ESTAS LINEAS SON PARA IMPRIMIR LA IMAGEN
//   $html = $_POST["algo"];
// $aqui=$pdf->Gety();
// //if($aqui>=257){
//    if($aqui>=165){
// $pdf->AddPage();
// //$pdf->AddPage('LANDSCAPE', 'A4');
// $dataURI = $html;

// $img = explode(',',$dataURI,2)[1];
// $pic = 'data://text/plain;base64,'. $img;
// $pdf->image($pic, -20,50,0,0,'png');
// }else{

// $dataURI = $html;

// $img = explode(',',$dataURI,2)[1];
// $pic = 'data://text/plain;base64,'. $img;
// $pdf->image($pic, -20,$aqui,0,0,'png'); 
// }

//----------------------------------------
// "I" -> se entrega al navegador y se activa el plugin para mostrarlo
// "D" -> se fuerza la descarga del archivo
// */
// $modo="I";
// $pdf->Output($nombre_archivo,$modo)

$pdf->Output("Reporte Ferreteria.pdf","I");
?>