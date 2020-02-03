<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Bienvenido a <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<div class="text-center">
  <img src="<?php echo Yii:: app() ->baseUrl.'/images/avatar.png' ?> " class="img-fluid" width="50%" height="50%">
</div>
