<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'proveedores-form',
	'enableAjaxValidation'=>true,
	'focus'=>array($model,'nombreprov'),
	'htmlOptions' => array('class'=>'well','style'=>'background-color:#FFFFFF;'),
)); ?>

<blockquote>Campos con <span class="required">*</span> son requeridos.</blockquote>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'nombreprov',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>75,)))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar',
			'icon'=>$model->isNewRecord ? 'plus-sign' : 'refresh',
		)); ?>
</div>

<?php $this->endWidget(); ?>
