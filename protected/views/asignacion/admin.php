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
$.fn.yiiGridView.update('asignacion-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Buscar Politica</h1>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'asignacion-grid',
'type'=>'hover',
'htmlOptions' => array('class'=>'well','style'=>'background-color: #FFFFFF;'),
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		array(
				 'name'=>'idasignacion',
				 'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688; width: 20%'),
				),
		array(
				 'name'=>'idcasa',
				 'value'=>'$data->casa->nombrecasa',
				 'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
				),
		array(
		     'name'=>'idproveedor',
		     'value'=>'$data->proveedor->nombreprov',
				 'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
			  ),
				array(
					'name' => 'politica',
					'filter' => array(
							'-1'  => 'No Devolucion',
							'0'  => 'En el mes',
							'1' => '1',
							'2' => '2',
							'3' => '3',
							'4' => '4',
							'5' => '5'
					),
					'value' => function($model){
						  if ($model->politica == -1) {	$result = "No Devolucion";	}
							if ($model->politica == 0) {	$result = "En el Mes";	}
							if ($model->politica == 1) {	$result = "1";	}
							if ($model->politica == 2) {	$result = "2";	}
							if ($model->politica == 3) {	$result = "3";	}
							if ($model->politica == 4) {	$result = "4";	}
							if ($model->politica == 5) {	$result = "5";	}
		                      return $result;

		              },
									'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
				    ),

array(
'class'=>'booster.widgets.TbButtonColumn',
'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
),
),
'emptyText' => 'No se encontro ninguna politica!',

'summaryText' => 'Mostrando {start}-{end} de {count} registro(s).',
)); ?>
