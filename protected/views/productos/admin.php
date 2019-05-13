<?php

$this->widget("bootstrap.widgets.TbButtonGroup", array(
						'buttonType' => 'link',
						'encodeLabel'=>false,
						'htmlOptions'=>array('class'=>'pull-right'),
            "buttons"=>array(
                array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/add.png"/><strong> Crear</strong>',
								'url'=>'create', "htmlOptions" => array("class"=>"btn btn-info")),
								array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/pdf.png"/><strong> Pdf</strong>',
								'url'=>'generarpdf', "htmlOptions" => array("class"=>"btn btn-info")),
								array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/excel.png"/><strong> Excel</strong>',
								'url'=>'excel', "htmlOptions" => array("class"=>"btn btn-info")),
            )
        ));


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('productos-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Buscar Productos</h1>

<?php $this->widget('booster.widgets.TbGridView',array(
	'type' => 'hover ',
'htmlOptions' => array('class'=>'well','style'=>'background-color: #FFFFFF;'),
'id'=>'productos-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	array(
			 'name'=>'idproductos',
			 'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688; width: 20%;'),
			),
	array(
			 'name'=>'nombre_productos',
			 'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
			),
		array(
		'class'=>'booster.widgets.TbButtonColumn',
		'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
			  ),
					), //end columns
'emptyText' => 'No se encontro ningun producto!',

'summaryText' => 'Mostrando {start}-{end} de {count} registro(s).',
)); ?>
