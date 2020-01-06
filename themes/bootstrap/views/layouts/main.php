<!DOCTYPE html>

<html lang="<?php echo Yii::app()->language;?>">

<head>

<title><?php echo CHtml::encode($this->pageTitle); ?></title>

 <meta charset="<?php echo Yii::app()->charset;?>">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">

</head>

<body style=" font-family: 'Varela Round', sans-serif;
		font-size: 13px;
    background-color: #EEEEEE;
    ">
<header>
<?php
$this->widget('ext.bootstrap.widgets.TbNavbar', array(
// 'type'=>'top', // null or 'inverse'
//'htmlOptions'=>array('class'=>'primary'),
'brand'=>CHtml::encode(Yii::app()->name),
'htmlOptions'=>array('style'=>'background-color: #1565C0;'),
'fixed'=>'false',
 'collapse'=>true, // requires bootstrap-responsive.css
 'fluid' => true,
 'items'=>array(
 array(
 'class'=>'ext.bootstrap.widgets.TbMenu',
 'type'=>'navbar',
 'items'=>array(
 array('label'=>'Ingreso', 'icon'=>'list-alt', 'url'=>array('/ingreso/admin'),
'visible'=>!Yii::app()->user->isGuest),
 array('label'=>'Reporte', 'icon'=>'check', 'url'=>array('/reporte/admin'),
'visible'=>!Yii::app()->user->isGuest),
 array('label'=>'Admin', 'icon'=>'star', 'url'=>array('/admin/admin'),'visible'=>strtolower(Yii::app()->user->name) == 'angel' || strtolower(Yii::app()->user->name) =='keyla'),
 array('label'=>'Estado', 'icon'=>'star', 'url'=>array('/estado/admin'),'visible'=>strtolower(Yii::app()->user->name) == 'angel' || strtolower(Yii::app()->user->name) =='keyla'),
 array('label'=>'Politicas', 'icon'=>'indent-left', 'url'=>array('/asignacion/admin'),
'visible'=>!Yii::app()->user->isGuest),
 array('label'=>'Proveedores', 'icon'=>'briefcase', 'url'=>array('/proveedores/admin'),
'visible'=>!Yii::app()->user->isGuest),
 array('label'=>'Productos', 'icon'=>'plus', 'url'=>array('/productos/admin'),
'visible'=>!Yii::app()->user->isGuest),
 array('label'=>'Casas', 'icon'=>'home', 'url'=>array('/casa/admin'),
'visible'=>!Yii::app()->user->isGuest),
 array('label'=>'Usuarios', 'icon'=>'user', 'url'=>array('/users/admin'),
 'visible'=>strtolower(Yii::app()->user->name) == 'angel' || strtolower(Yii::app()->user->name) == 'keyla'),


 ),
 ),
 array(
 'class'=>'ext.bootstrap.widgets.TbMenu',
 'htmlOptions'=>array('class'=>'pull-right'),
 'items'=>array(

 //array('label'=>'Iniciar sesión' , 'url'=>Yii::app()->user->ui->loginUrl , 'visible'=>Yii::app()->user->isGuest),
 array('label'=>'Iniciar Session', 'icon'=>'user', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
 //array('label'=>Yii::app()->user->name, 'url'=>array('/cruge/ui/editprofile/'), 'visible'=>!Yii::app()->user->isGuest),
 //array('label'=>'Cerrar sesión ('.Yii::app()->user->name.')' , 'url'=>Yii::app()->user->ui->logoutUrl , 'visible'=>!Yii::app()->user->isGuest),
 // array('label'=>'Logout', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest, 'htmlOptions'=>array('class'=>'btn'))
 array('label'=>'Cerrar Session ('.Yii::app()->user->name.')', 'icon'=>'user', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
 ),
 ),
 ),
));
?>
</header>
<div class="container" id="main">
 <?php if(isset($this->breadcrumbs)):?>
 <?php $this->widget('ext.bootstrap.widgets.TbBreadcrumbs', array(
 'links'=>$this->breadcrumbs,
 )); ?>
 <?php endif?>
 <?php echo $content; ?>
 <hr>
 <footer>
 	<div align="center">
 Copyright &copy; <?php echo date('Y'); ?> <?php echo CHtml::encode(Yii::app()->params['empresa']); ?> | <a href="http://www.angelleoneltorrelopez.com">angeltorrelopez@hotmail.com - angelleoneltorrelopez@gmail.com</a> - All Rights Reserved.<br/>
 </div>
 </footer>

</div>
</body>
</html>
