<?php $contador=count($model); if ($model !== null):?>
<?php $fe[$contador];
$i=0;?>
<?php foreach($model as $fec): ?>
<?php $fe[$i]=$fec->Caducidad;
$i++;?>
<?php endforeach; ?>
<?php if($fe[0]==date(Y)."-01-01"){$date = "ENERO";}?>
<?php if($fe[0]==date(Y)."-02-01"){$date = "FEBRERO";}?>
<?php if($fe[0]==date(Y)."-03-01"){$date = "MARZO";}?>
<?php if($fe[0]==date(Y)."-04-01"){$date = "ABRIL";}?>
<?php if($fe[0]==date(Y)."-05-01"){$date = "MAYO";}?>
<?php if($fe[0]==date(Y)."-06-01"){$date = "JUNIO";}?>
<?php if($fe[0]==date(Y)."-07-01"){$date = "JULIO";}?>
<?php if($fe[0]==date(Y)."-08-01"){$date = "AGOSTO";}?>
<?php if($fe[0]==date(Y)."-09-01"){$date = "SEPTIEMBRE";}?>
<?php if($fe[0]==date(Y)."-10-01"){$date = "OCTUBRE";}?>
<?php if($fe[0]==date(Y)."-11-01"){$date = "NOVIEMBRE";}?>
<?php if($fe[0]==date(Y)."-12-01"){$date = "DICIEMBRE";}
else {$date = $fe[0];}?>
<html>
<head>
<style>
 body {font-family: sans-serif;
 font-size: 10pt;
 }
 p { margin: 0pt;
 }
 td { vertical-align: top; }
 .items td {

 border: 0.1mm solid #000000;
 }
 table thead td { background-color: #EEEEEE;
 text-align: center;
 border: 0.1mm solid #000000;
 }
 .items td.blanktotal {
 background-color: #FFFFFF;
 border: 0mm none #000000;
 border-top: 0.1mm solid #000000;
 }
 .items td.totals {
 text-align: right;
 border: 0.1mm solid #000000;
 }
</style>
</head>
<body>

<!--mpdf
 <htmlpageheader name="myheader">
 <table width="100%"><tr>
 <td width="50%" style="color:#0000BB;"><span style="font-weight: bold; font-size: 14pt;">Farmacia Acevedo</span>
 <br /> <span style="font-weight: bold; font-style: oblique; font-size: 14pt;"><?php echo Yii::app()->user->name; ?></span>
 <br /><span style="font-size: 15pt;">&#9990;</span> 7933-2578</td>
 <td width="50%" style="text-align: right;"><b>Listado de Vencidos de
 <FONT Size="5" COLOR="maroon"><?php echo $date;  ?></FONT>
 </b></td>
 </tr></table>
 </htmlpageheader>

<htmlpagefooter name="myfooter">
 <div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
 Página {PAGENO} de {nb}
 </div>
 </htmlpagefooter>

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
 <sethtmlpagefooter name="myfooter" value="on" />
 mpdf-->
<div style="text-align: right"><b>Fecha: </b><?php echo date("d/m/Y"); ?> </div>
<b>Total Resultados:</b> <?php echo $contador; ?>
 <table class="items" width="100%" style="font-size: 11pt; border-collapse: collapse;" cellpadding="3">
 <thead>
 <tr>
 <td width="4.666666666667%"><b>VERIF</b></td>
 <td width="4.666666666667%"><b>SIS</b></td>
 <td width="4.666666666667%"><b>IV</b></td>
 <td width="30.666666666667%"><b>Nombre</b></td>
 <td width="16.666666666667%"><b>Casa</b></td>
 <td width="10.666666666667%"><b>Proveedor</b></td>
 <td width="4.666666666667%"><b>Politica</b></td>
 <td width="10.666666666667%"><b>Caducidad</b></td>
 <td width="5.666666666667%"><b>Lote</b></td>
 </tr>
 </thead>
 <tbody>
 <!-- ITEMS -->
 <?php foreach($model as $row): ?>
 <tr>
 <td align="center">
 <?php    ?>
 </td>
 <td align="center">
 <?php    ?>
 </td>
 <td align="center">
 <?php    ?>
 </td>
 <td align="center">
 <?php $produc = Productos::model()->find('idproductos='.$row->idproducto);
 echo $produc->nombre_productos; ?>
 </td>
 <td align="center">
 <?php $casa = Casa::model()->find('idcasa='.$row->idcasa);
 echo $casa->nombrecasa; ?>
 </td>
 <td align="center">
 <?php $casa = Proveedores::model()->find('idproveedor='.$row->idproveedor);
 echo $casa->nombreprov; ?>
 </td>
 <td align="center">
 <?php
 if($row->Politica == -1){echo $pol = 'No Devolucion';}
 if($row->Politica == 0){echo $pol = 'En el Mes';}
 if($row->Politica > 0){echo $row->Politica;}
 ?>
 </td>
 <td align="center">
 <?php echo $row->Caducidad; ?>
 </td>
  <td align="center">
 <?php echo $row->Lote; ?>
 </td>


 </tr>
 <?php endforeach; ?>
 <!-- FIN ITEMS -->
 <tr>
 <td class="blanktotal" colspan="8" rowspan="3"></td>
 </tr>
 </tbody>
 </table>
 </body>
 </html>
<?php endif; ?>
