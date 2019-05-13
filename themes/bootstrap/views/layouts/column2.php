<?php $this->beginContent('//layouts/main'); ?>
 <div class="row">
 <div class="span3">

 <?php
 /*$this->widget('ext.bootstrap.widgets.TbBox', array(
 //'title'=>'Menu',
 //'headerIcon' => 'glyphicon glyphicon-th-list',
 //'htmlOptions'=>array('style'=>'background-color:#64b5f6;'),
 //'htmlHeaderOptions'=>array('style'=>'background:#64b5f6; padding: 10px;  border-radius: 25px;'),
  'htmlContentOptions'=> array('style'=>'background:#64b5f6;

     padding: 10px;
     border-radius: 25px;'),
 'headerButtons'=>array(
         array(
           'class' => 'bootstrap.widgets.TbButton',
           'encodeLabel' => false,
           'buttonType' => 'link',
           'context'=>'danger',
           'label' => 'Crear',
           'icon' =>'icon-arrow-down',
           'url' => 'create',
         ),
         array(
           'class' => 'bootstrap.widgets.TbButton',
           'encodeLabel' => false,
           'buttonType' => 'link',
           'context'=>'success',
           'label' => 'Buscar',
           'url' => 'admin',
         ),
         array(
           'class' => 'bootstrap.widgets.TbButton',
           'encodeLabel' => false,
           'buttonType' => 'link',
           'label' => '<img src="'.Yii::app()->baseUrl.'/images/pdf.png"/>',
           'url' => 'generarpdf',
         ),
         array(
           'class' => 'bootstrap.widgets.TbButton',
           'encodeLabel' => false,
           'buttonType' => 'link',
           'label' => '<img src="'.Yii::app()->baseUrl.'/images/excel.png"/>',
           'url' => 'excel',
         ),

       ),

 'content'=> */
 $this->widget('ext.bootstrap.widgets.TbMenu', array(
   'htmlOptions'=>array('class'=>'pull-right','style'=>' padding: 1px;  border-radius: 25px;'),
 'type'=>'navbar',
 'encodeLabel'=>false,
 'items'=>$this->menu,
));
 //));
 ?>

 </div>
 <div class="span9">
 <?php echo $content; ?>
 </div>
 </div>
<?php $this->endContent(); ?>
