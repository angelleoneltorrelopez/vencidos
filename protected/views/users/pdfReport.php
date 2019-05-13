<?php $contador=count($model); if ($model !== null):?>
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
  <td width="50%" style="text-align: right;"><b>Listado de Usuarios</b></td>
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
 <table class="items" width="100%" style="font-size: 11pt; border-collapse: collapse;" cellpadding="5">
 <thead>
 <tr>
 <td width="9.666666666667%"><b>ID</b></td>
 <td width="29.666666666667%"><b>Usuario</b></td>
 <td width="29.666666666667%"><b>Password</b></td>
 <td width="29.666666666667%"><b>Email</b></td>
 </tr>
 </thead>
 <tbody>
 <!-- ITEMS -->
 <?php foreach($model as $row): ?>
 <tr>
 <td align="center">
 <?php echo $row->id; ?>
 </td>
 <td align="center">
 <?php echo $row->username; ?>
 </td>
 <td align="center">
 <?php echo $row->password; ?>
 </td>
 <td align="center">
 <?php echo $row->email; ?>
 </td>
 </tr>
 <?php endforeach; ?>
 <!-- FIN ITEMS -->
 <tr>
 <td class="blanktotal" colspan="4" rowspan="2"></td>
 </tr>
 </tbody>
 </table>
 </body>
 </html>
<?php endif; ?>
