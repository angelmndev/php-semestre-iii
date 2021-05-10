<?php
require_once("../recursos/tcpdf/tcpdf.php");
include_once("../modelo/Salida.php");
//=========================================================
$nombre = $_GET['n'];
$fecha = $_GET['f'];

//=====================================================
$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
 
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Miguel Angel');
$pdf->SetTitle("reporte salida producto");

$pdf->setPrintHeader(false); 
$pdf->setPrintFooter(false);
$pdf->SetMargins(20, 20, 20, false); 
$pdf->SetAutoPageBreak(true, 20); 
$pdf->SetFont('Helvetica', '', 10);
$pdf->addPage();

$html = '';
?>
<?php 
$html = '
<html>
<head>
<title></title>';
$html .= '<style>'.file_get_contents('../recursos/css/reportes.css').'</style>';

$html .='</head>
<h1 class="titulo">REPORTE SALIDA DE PRODUCTO</h1>
<table class="tabla" border="1" whidth="100%">
            <thead>
                <tr>
                    <th width="20">N&deg;</th>
                    <th  width="200">NOMBRE</th>
                    <th>DESCRIPCION</th>
                    <th >MARCA</th>
                    <th >PRECIO</th>
                    <th >STOCK</th>
                    <th >FECHA</th>
                </tr>
            </thead>
            <tbody>';
                $obj = new Salida();
                $condicion = "= '$nombre' and fecha = '$fecha'";
                $datos = $obj->listar($condicion);
                $numero = 1;
                while($fila = $datos->fetch_array(MYSQLI_ASSOC)){
            
                $html .= '<tr>
                    <td width="20" class="tc">'.$numero++.'</td>
                    <td  width="200" class="tl">'.$fila['nombre_e'].'</td>
                    <td class="tc ">'.$fila['descripcion'].'</td>
                    <td class="tc">'.$fila['marca'].'</td>
                    <td class="tl">'.$fila['precio'].'</td>
                    <td class="tl">'.$fila['stock'].'</td>
                    <td class="tr">'.$fila['fecha'].'</td>
                </tr>';  
                }//fin de while
                $html .= '</tbody>
        </table>
        </html>
        ';
        ?>
<?php
 $pdf->writeHTML($html, true, 0, true, 0);
 $pdf->lastPage();
 //ob_end_clean();
 $pdf->output('Reporte.pdf', 'I');
?>