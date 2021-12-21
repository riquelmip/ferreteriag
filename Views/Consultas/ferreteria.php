<?php
require('fpdf/fpdf.php');
date_default_timezone_set('America/El_Salvador');
class PDF extends FPDF
{

function Header()
{

    $this->Image('img/poli.png',25,10,33);
  
    $this->SetFont('helvetica', 'B', 13);
    // Movernos a la derecha
    $this->Cell(80);


  $this->SetTextColor(30,30,32);
  $this->Text(89, 15, 'POLICIA NACIONAL CIVIL');
  
  $this->Text(82, 20, utf8_decode('DELEGACION DE SAN VICENTE'));

   $this->Text(69, 25, utf8_decode('UNIFORMES Y EQUIPO POLICIAL ASIGNADO'));


   $this->SetLineWidth(8); //antes de dibujar la linea
    $this->setDrawColor(24,68,104);
    $this->Line(0, 0, 500, 0);
    // Salto de línea
     $this->Ln(20);
    $this->SetFont('courier', 'B', 10);
   
}

// Pie de página
function Footer()
{
        $this->SetY(-15);
        $this->SetFont('Arial','B',8);
        $this->Cell(95,5,utf8_decode('Página ').$this->PageNo().' / {nb}',0,0,'L');
        $this->Cell(95,5,date('d/m/Y | H:i:s') ,00,1,'R');
        $this->Line(10,287,200,287);
        $this->Cell(0,5,utf8_decode("Facultad Multidisciplinaria Paracentral - Universidad de El Salvador. © Todos los derechos reservados."),0,0,"C");
        
}

// ------------------------------------------------------------
var $widths;
var $aligns;

function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

function Row($data,$setX)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h,$setX);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h,'DF');
        //Print the text
        $this->MultiCell($w,5,$data[$i],0,$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function CheckPageBreak($h,$setX)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger){
        $this->AddPage($this->CurOrientation);

         }


             if($setX==100){
            $this->SetX(100);
             }else{
                $this->SetX($setX);
             }

}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}
// ----------------------------------------------------------------

}

// Creación del objeto de la clase heredada
//

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 10);//el 10 es el espacio antes que dara para el espacio jaja osea que entre mas grande mas es lo que el se hace grande
$pdf->SetTopMargin(15);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);

$pdf->SetY(40);
$pdf->SetX(15);
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(15,40);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(59,5,utf8_decode('Delegación/División/Unidad: '),0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(50,5,'Puesto de Verapaz',0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(39,5,'Subdeleg/Puesto:');
$pdf->SetFont('Arial','',12);
$pdf->Cell(10,5,utf8_decode('Jefatura'),0,1);



$pdf->Ln();

$pdf->SetX(15);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,0,'Nombre: ');
// $pdf->Cell(70,0,'Subdeleg/Puesto:');
$pdf->SetFont('Arial','',12);
$pdf->Cell(20,0,utf8_decode('Miguel Antonio Peréz'));
// $pdf->Cell(70,0,utf8_decode('911'));


$pdf->SetX(15);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(11,15,'ONI: ');
$pdf->SetFont('Arial','',12);
$pdf->Cell(20,15,utf8_decode('01589754'),0,1,'R');

/*-------TITULOS Y ENCABEZADOS -----------*/
$pdf->SetFont('', 'B', 12);

$pdf->Text(80, 71, 'UNIFORMES POLICIALES');

$pdf->Ln(10);
/* --- Tabla --- */

$pdf->SetX(15);
// $pdf->SetY(76);
$pdf->Cell(54, 8, 'Tipo', 0, 0, 'C', 0);
$pdf->Cell(20, 8, 'C', 0, 0, 'C', 0);
$pdf->Cell(20, 8, 'T', 0, 0, 'C', 0);
$pdf->Cell(54, 8, utf8_decode('Códigos'), 0, 0, 'C', 0);
$pdf->Cell(30, 8, utf8_decode('Fecha Enterga'), 0, 1, 'C', 0);
/* --- DIVISION --- */
$pdf->setDrawColor(24,68,104);
$pdf->Line(15, 82.5,198, 82.5);
$pdf->SetFillColor(240,240,240);

$pdf->SetDrawColor(255,255,255);
/* --- Tabla --- */

$pdf->SetWidths(array(54,20,20,54,35));
//$row[$i]
for($i=0;$i<16;$i++){
   $pdf->SetX(15); 
   $y=$pdf->Gety();
   $pdf->SetFont('Arial','',12);
    $pdf->Row(array("Camisa Blanca de Diario M/C",$y,"8","0258521645-8751226","25/06/2021"),15);

}
 $y=$pdf->Gety();

 if($y>=233){//si ya no cabe
    $pdf->AddPage();

$pdf->Ln(5);
$pdf->SetFont('', 'B', 12);
$pdf->Cell(0, 4, 'UNIFORMES POLICIALES TACTICOS', 0, 1, 'C', false);


$pdf->Ln(10);
/* --- Tabla --- */

$pdf->SetX(15);

$pdf->Cell(54, 8, 'Tipo', 0, 0, 'C', 0);
$pdf->Cell(20, 8, 'C', 0, 0, 'C', 0);
$pdf->Cell(20, 8, 'T', 0, 0, 'C', 0);
$pdf->Cell(54, 8, utf8_decode('Códigos'), 0, 0, 'C', 0);
$pdf->Cell(30, 8, utf8_decode('Fecha Enterga'), 0, 1, 'C', 0);
/* --- DIVISION --- */
$y_aqui = $pdf->Gety() -0.5;
$pdf->setDrawColor(24,68,104);
$pdf->Line(15, $y_aqui, 198, $y_aqui);
$pdf->SetFillColor(240,240,240);
$pdf->SetDrawColor(255,255,255);
/* --- Tabla --- */
$pdf->SetWidths(array(54,20,20,54,35));

for($i=0;$i<42;$i++){
   $pdf->SetX(15); 
   $pdf->SetFont('Arial','',12);
    $pdf->Row(array("Camisa Blanca de Diario M/C","2","8","0258521645-8751226","25/06/2021"),15);

}


 }else{

  $pdf->Ln(15);
$pdf->SetFont('', 'B', 12);
$pdf->Cell(0, 4, 'UNIFORMES POLICIALES TACTICOS', 0, 1, 'C', false);
// $pdf->Text(80, 71, 'UNIFORMES POLICIALES');

$pdf->Ln(10);
/* --- Tabla --- */

$pdf->SetX(15);

$pdf->Cell(54, 8, 'Tipo', 0, 0, 'C', 0);
$pdf->Cell(20, 8, 'C', 0, 0, 'C', 0);
$pdf->Cell(20, 8, 'T', 0, 0, 'C', 0);
$pdf->Cell(54, 8, utf8_decode('Códigos'), 0, 0, 'C', 0);
$pdf->Cell(30, 8, utf8_decode('Fecha Enterga'), 0, 1, 'C', 0);
/* --- DIVISION --- */
$y_aqui = $pdf->Gety() -0.5;
$pdf->setDrawColor(24,68,104);
$pdf->Line(15, $y_aqui, 198, $y_aqui);
$pdf->SetFillColor(240,240,240);
$pdf->SetDrawColor(255,255,255);
/* --- Tabla --- */
$pdf->SetWidths(array(54,20,20,54,35));

for($i=0;$i<7;$i++){
   $pdf->SetX(15); 
   $pdf->SetFont('Arial','',12);
    $pdf->Row(array("Camisa Blanca de Diario M/C","2","8","0258521645-8751226","25/06/2021"),15);

}

  
 }
// ------------------------------------------VLADYY-----------------------------------------------
//-------TITULOS Y ENCABEZADOS -----------

$pdf->Ln(10);

$pdf->SetX(15);
$y = $pdf->Gety();
if($y>=240){//en caso se pase de pagina
$pdf->AddPage();
    $pdf->SetFont('', 'B', 12);
   $pdf->Text(85, 50, 'PLACAS Y ONIS');


$pdf->Ln(20);
//ENCABEZADO TABLAS
$pdf->SetFont('Arial', 'B',9);
$pdf->SetDrawColor(95,121,182);
$pdf->SetX(15);
$pdf->Cell(65, 5, 'ONIS', 'B', 0, 'C', false);
$pdf->SetX(80);
$pdf->Cell(15, 5, 'C', 'B', 0, 'C', false);
$pdf->SetX(100);
$pdf->Cell(45, 5, 'PLACA', 'B', 0, 'C', false);
$pdf->SetX(145);
$pdf->Cell(15, 5, 'A1', 'B', 0, 'C', false);
$pdf->SetX(160);
$pdf->Cell(15, 5, 'RA', 'B', 0, 'C', false);
$pdf->SetX(175);
$pdf->Cell(20, 5, 'CATEGORIA', 'B', 1, 'C', false);
/* ---Detalles Tabla --- */

$pdf->Ln(0.5);
$pdf->SetWidths(array(65,15));
$pdf->SetDrawColor(255,255,255);
$y=$pdf->Gety();
for($i=0;$i<3;$i++){

   $pdf->SetX(15); 
   $pdf->SetFont('Arial','',9);
    $pdf->Row(array("ONI bordado con amarillo de Fondo","2"),15);


}

//Detale de la par
$pdf->SetWidths(array(65,15));
$pdf->SetDrawColor(255,255,255);
$pdf->setY($y);
for($i=0;$i<4;$i++){


$pdf->SetWidths(array(45,15,15,20));
// $pdf->SetX(100);
$pdf->Row(array("ONI bordado con amarillo de Fondo a","2","5","Basica"),100);
}




}else{//en caso no quepa en la pagina
    $pdf->SetFont('', 'B', 12);
 $pdf->Text(85, $y, 'PLACAS Y ONIS');

$pdf->Ln(15);
//ENCABEZADO TABLAS
$pdf->SetFont('Arial', 'B',9);
$pdf->SetDrawColor(95,121,182);
$pdf->SetX(15);
$pdf->Cell(65, 5, 'ONIS', 'B', 0, 'C', false);
$pdf->SetX(80);
$pdf->Cell(15, 5, 'C', 'B', 0, 'C', false);
$pdf->SetX(100);
$pdf->Cell(45, 5, 'PLACA', 'B', 0, 'C', false);
$pdf->SetX(145);
$pdf->Cell(15, 5, 'A1', 'B', 0, 'C', false);
$pdf->SetX(160);
$pdf->Cell(15, 5, 'RA', 'B', 0, 'C', false);
$pdf->SetX(175);
$pdf->Cell(20, 5, 'CATEGORIA', 'B', 1, 'C', false);
/* ---Detalles Tabla --- */

$pdf->Ln(0.5);
$pdf->SetWidths(array(65,15));
$pdf->SetDrawColor(255,255,255);
$y=$pdf->Gety();
for($i=0;$i<2;$i++){

   $pdf->SetX(15); 
   $pdf->SetFont('Arial','',10);
    $pdf->Row(array("ONI bordado con amarillo de Fondo","2"),15);

}

//Detale de la par
$pdf->SetWidths(array(65,15));
$pdf->SetDrawColor(255,255,255);
$pdf->setY($y);
for($i=0;$i<2;$i++){


$pdf->SetWidths(array(45,15,15,20));
// $pdf->SetX(100);
$pdf->Row(array("ONI bordado con amarillo de Fondo a","2","5","Basica"),100);
}

}


//PLACAS

$y = $pdf->Gety();
if($y>=250){//en caso se pase de pagina
    $pdf->AddPage();
$pdf->Ln(6);
$y=$pdf->Gety();
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(15,$y);
$pdf->Cell(30, 5, 'PORTA PLACAS', 0, 1, 'L', false);
$pdf->SetFont('Arial', '', 8);
$pdf->SetXY(45,$y);
$pdf->Cell(15, 5, '', 1, 1, 'C', true);

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(120,$y);
$pdf->Cell(20, 5, 'PORTA NOMBRE', 0, 1, 'L', false);
$pdf->SetFont('Arial', '', 8);
$pdf->SetXY(150,$y);
$pdf->Cell(15, 5, '', 1, 1, 'C', true);

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetDrawColor(0);
$pdf->SetXY(15,$y+10);
$pdf->Cell(30, 5, 'OBSERVACIONES:', 0, 1, 'L', false);
$pdf->SetFont('Arial', '', 8);
$pdf->SetXY(45,$y+10);
$pdf->Cell(150, 5, utf8_decode('Ninguna Observación por el Momento'), 'B', 1, 'L', false);
$pdf->Ln();
$pdf->Ln();
}else{
$pdf->Ln(6);
$y=$pdf->Gety();
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(15,$y);
$pdf->Cell(30, 5, 'PORTA PLACAS', 0, 1, 'L', false);
$pdf->SetFont('Arial', '', 8);
$pdf->SetXY(45,$y);
$pdf->Cell(15, 5, '', 1, 1, 'C', true);

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(120,$y);
$pdf->Cell(20, 5, 'PORTA NOMBRE', 0, 1, 'L', false);
$pdf->SetFont('Arial', '', 8);
$pdf->SetXY(150,$y);
$pdf->Cell(15, 5, '', 1, 1, 'C', true);

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetDrawColor(0);
$pdf->SetXY(15,$y+10);
$pdf->Cell(30, 5, 'OBSERVACIONES:', 0, 1, 'L', false);
$pdf->SetFont('Arial', '', 8);
$pdf->SetXY(45,$y+10);
$pdf->Cell(150, 5, utf8_decode('Ninguna Observación por el Momento'), 'B', 1, 'L', false);
$pdf->Ln();
$pdf->Ln();
}

//Equipo Policial
$y = $pdf->Gety();
if($y>=250){//en caso se pase de pagina
    $pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(70);
$pdf->Write(5, 'EQUIPO POLICIAL/ACCESORIOS');
$pdf->Ln();
//Encabezados Tablas
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetDrawColor(95,121,182);
$pdf->SetX(45);
$pdf->Cell(45, 5, 'TIPO', 'B', 1, 'C', false);
$pdf->SetX(90);
$pdf->Cell(15, 5, 'C', 'B', 1, 'C', false);

$pdf->SetX(105);
$pdf->Cell(45, 5, 'TIPO', 'B', 1, 'C', false);
$pdf->SetX(150);
$pdf->Cell(15, 5, 'C', 'B', 1, 'C', false);

//Detalles tabla 1
}else{
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(70);
$pdf->Write(5, 'EQUIPO POLICIAL/ACCESORIOS');
$pdf->Ln(10);
//Encabezados Tablas
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetDrawColor(95,121,182);
$pdf->SetX(45);
$pdf->Cell(45, 5, 'TIPO', 'B', 0, 'C', false);
$pdf->SetX(90);
$pdf->Cell(15, 5, 'C', 'B', 0, 'C', false);

$pdf->SetX(105);
$pdf->Cell(45, 5, 'TIPO', 'B', 0, 'C', false);
$pdf->SetX(150);
$pdf->Cell(15, 5, 'C', 'B', 1, 'C', false);

//Detalles tabla 1
$pdf->Ln(0.5);
$pdf->SetFont('Arial', '', 8);
$pdf->SetDrawColor(255,255,255);

for($i=0;$i<2;$i++){
$pdf->SetWidths(array(45,15,45,15));
// $pdf->SetX(100);
$pdf->Row(array("ONI bordado con amarillo de Fondo","2","ONI bordado con amarillo de Fondo a","12"),45);
}
}


//Encabezado Tabla 2
$y = $pdf->Gety();
if($y>=250){//en caso se pase de pagina
    $pdf->Ln(6);
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetDrawColor(95,121,182);
$pdf->SetX(20);
$pdf->Cell(45, 5, 'TIPO', 'B', 0, 'C', false);
$pdf->SetX(65);
$pdf->Cell(15, 5, 'C', 'B', 0, 'C', false);

$pdf->SetX(80);
$pdf->Cell(35, 5, 'SERIE', 'B', 0, 'C', false);
$pdf->SetX(115);
$pdf->Cell(55, 5, 'TIPO', 'B', 0, 'C', false);
$pdf->SetX(170);
$pdf->Cell(15, 5, 'C', 'B', 1, 'C', false);

//Detalles tabla 2
}else{
$pdf->Ln(6);
  $pdf->SetFont('Arial', 'B', 9);
$pdf->SetDrawColor(95,121,182);
$pdf->SetX(20);
$pdf->Cell(45, 5, 'TIPO', 'B', 0, 'C', false);
$pdf->SetX(65);
$pdf->Cell(15, 5, 'C', 'B',  0,'C', false);

$pdf->SetX(80);
$pdf->Cell(35, 5, 'SERIE', 'B', 0, 'C', false);
$pdf->SetX(115);
$pdf->Cell(55, 5, 'TIPO', 'B', 0, 'C', false);
$pdf->SetX(170);
$pdf->Cell(15, 5, 'C', 'B', 1, 'C', false);
  

  //Detalles tabla 1
$pdf->Ln(0.5);
$pdf->SetFont('Arial', '', 8);
$pdf->SetDrawColor(255,255,255);

for($i=0;$i<4;$i++){
$pdf->SetWidths(array(45,15,35,55,15));
// $pdf->SetX(100);
$pdf->Row(array("Accesorios","2","2015","K-464","21"),20);
}

}
$pdf->Output();
?>