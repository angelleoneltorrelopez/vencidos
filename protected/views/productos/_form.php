<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'productos-form',
	'enableAjaxValidation'=>true,
	'focus'=>array($model,'nombre_productos'),
	'htmlOptions' => array('class'=>'well','style'=>'background-color:#FFFFFF;'),
)); ?>

<blockquote>Campos con <span class="required">*</span> son requeridos.</blockquote>

<?php echo $form->errorSummary($model); ?>
<div class="row">
    <div class="form-group col-md-6">
	<?php echo $form->textFieldGroup($model,'nombre_productos',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255,'placeholder'=>'Nombre',)))); ?>

</div>
</div>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar',
			'icon'=>$model->isNewRecord ? 'plus-sign' : 'refresh',
		)); ?>
</div>

<?php $this->endWidget(); ?>
