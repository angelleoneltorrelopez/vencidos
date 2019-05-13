<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'users-form',
	'enableAjaxValidation'=>true,
	'focus'=>array($model,'username'),
	'htmlOptions' => array('class'=>'well','style'=>'background-color:#FFFFFF;'),
)); ?>

<blockquote>Campos con <span class="required">*</span> son requeridos.</blockquote>

<?php echo $form->errorSummary($model); ?>

<div class="row">
	<div class="form-group col-md-1"></div>
    <div class="form-group col-md-4">
	<?php echo $form->textFieldGroup($model,'username',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>128)))); ?>
	</div>
<div class="form-group col-md-4"></div>
	</div>

<div class="row">
	<div class="form-group col-md-1"></div>
    <div class="form-group col-md-4">
	<?php echo $form->passwordFieldGroup($model,'password',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>128)))); ?>
</div>
<div class="form-group col-md-4"></div>
	</div>

<div class="row">
	<div class="form-group col-md-1"></div>
    <div class="form-group col-md-4">
	<?php echo $form->textFieldGroup($model,'email',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>128)))); ?>
</div>
<div class="form-group col-md-4"></div>
	</div>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
