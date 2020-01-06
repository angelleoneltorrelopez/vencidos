<?php
$this->widget("bootstrap.widgets.TbButtonGroup", array(
						'buttonType' => 'link',
						'encodeLabel'=>false,
						'htmlOptions'=>array('class'=>'pull-right'),
            "buttons"=>array(
								array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/pdf.png"/><strong> Pdf</strong>',
								'url'=>'generarpdf', "htmlOptions" => array("class"=>"btn btn-info")),
								array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/excel.png"/><strong> Excel</strong>',
								'url'=>'excel', "htmlOptions" => array("class"=>"btn btn-info")),
								array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/exchange.png"/><strong> Cambio</strong>',
								'url'=>'estado', "htmlOptions" => array("class"=>"btn btn-info",'confirm'=>
								'Seguro querer cambiar el estado del reporte con la fecha seleccionada?')),
								/*
								array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/delete.png"/><strong> Borrar</strong>',
								'url'=>'delete', "htmlOptions" => array("class"=>"btn btn-info",'confirm'=>
								'Seguro querer borrar este Ingreso?')),
								*/
            )
        ));

?>

<h1>Reportes de Vencidos</h1>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'reporte-grid',
'type'=>'hover',
'htmlOptions' => array('class'=>'well','style'=>'background-color: #FFFFFF;'),
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		array(
			 'name'=>'idproducto',
			 'value'=>'$data->producto->nombre_productos',
			 'filter' => false,
			 'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
			),
		array(
			 'name'=>'idcasa',
			 'value'=>'$data->casa->nombrecasa',
			 'filter' => false,
			 'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
			),
		array(
			 'name'=>'idproveedor',
			 'value'=>'$data->proveedor->nombreprov',
			 'filter' => false,
			 'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
			),
		array(
			'name' => 'Politica',
			'filter' => false,
			'value' => function($model){
				  if ($model->Politica == -1) {	$result = "No Devolucion";	}
					if ($model->Politica == 0) {	$result = "En el Mes";	}
					if ($model->Politica == 1) {	$result = "1";	}
					if ($model->Politica == 2) {	$result = "2";	}
					if ($model->Politica == 3) {	$result = "3";	}
					if ($model->Politica == 4) {	$result = "4";	}
					if ($model->Politica == 5) {	$result = "5";	}
                      return $result;

              },
				'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
		    ),
		array(
			'name' => 'Caducidad',
			'filter' => CHtml::listData(Ingreso::model()->findAll(array('condition'=>'Estado < 2','order'=>'Caducidad ASC')), 'Caducidad', 'Caducidad'),
			'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
		    ),
		array(
			'name' => 'Lote',
			'filter' => false,
			'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
		    ),
		array(
			'name' => 'Estado',
			'filter' => array('0'=>'Activo','1'=>'Inactivo'),
			'value'=> '$data["Estado"]==0?"Activo":"Inactivo"',
			'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
				),

),
'emptyText' => 'No se encontro ningun producto!',

'summaryText' => 'Mostrando {start}-{end} de {count} registro(s).',
)); ?>
