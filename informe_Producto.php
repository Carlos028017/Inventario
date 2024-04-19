<?php 

require '../fpdf186/fpdf.php';

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // $this->SetFont('Times','B',20);
    $this->SetFont('Times','',12);
     //$this->Image('../inventario/imagen/saikel.jpg',10,10,15); //imagen(archivo, png/jpg || x,y,tamaño)
    $this->setXY(60,15);
    $this->Cell(80,8,'Informe de Producto',0,1,'C',0);
    $this->Cell(80,7,'Fecha:',0,1,'C',0);
    $this->Cell(81,7,'Nombre:',0,1,'C',0);
    $this->Cell(80,7,'Identificacion:',0,1,'C',0);
    $this->Cell(80,7,'Correo:',0,1,'C',0);
    $this->Cell(200,-30,'Rol:',0,1,'C',0);
    
    // $this->Image('imgenes/img.png',150,10,35); //imagen(archivo, png/jpg || x,y,tamaño)
    $this->Ln(40);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','B',10);
    // Número de página
    $this->Cell(170,10,'Todos los derechos reservados',0,0,'C',0);
    $this->Cell(25,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();//hacemos una instancia de la clase
$pdf->AliasNbPages();
$pdf->AddPage();//añade l apagina / en blanco
$pdf->SetMargins(10,10,10);
$pdf->SetAutoPageBreak(true,20);//salto de pagina automatico
$pdf->SetX(50);
$pdf->SetFont('Helvetica','B',15);
$pdf->Cell(10,8,'Codigo','B',0,'C',0);
$pdf->Cell(40,8,'Producto','B',0,'C',0);
$pdf->Cell(25,8,'Marca','B',0,'C',0);
$pdf->Cell(30,8,'Precio','B',1,'C',0);

$pdf->SetFillColor(233, 229, 235);//color de fondo rgb
$pdf->SetDrawColor(61, 61, 61);//color de linea  rgb

$pdf->SetFont('Arial','',12);
for($i=1;$i<=10;$i++){
    
    $pdf->Ln(0.6);
    $pdf->setX(50);
$pdf->Cell(10,8,'...','B',0,'C',1);
$pdf->Cell(40,8,'...','B',0,'C',1);
$pdf->Cell(25,8,'.............','B',0,'C',1);
$pdf->Cell(30,8,'$'.'...','B',1,'C',1);

}
// cell(ancho, largo, contenido,borde?, salto de linea?)

$pdf->Output();
?>