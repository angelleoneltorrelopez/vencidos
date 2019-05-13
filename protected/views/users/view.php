<?php

$this->menu=array(
array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/add.png"/> Crear', 'url'=>array('create')),
array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/delete.png"/> Borrar', 'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro que quieres eliminar este usuario?')),
array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/exchange.png"/> Actualizar','url'=>array('update','id'=>$model->id)),
array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/search.png"/> Buscar', 'url'=>array('admin')),
);
?>

<h1>Ver Usuario #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'htmlOptions' => array('class'=>'detail-view','style'=>'background-color:#FFFFFF; box-shadow: 0px 0px 2px 0 black;'),
'type'=>'striped',
'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
),
)); ?>
